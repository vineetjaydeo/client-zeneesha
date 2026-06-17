<?php
/**
 * iKawn WP ZEN — Zeneesha Theme functions.php
 * v1.3.4
 */

// ── Theme Setup ────────────────────────────────────────────────
function zeneesha_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'custom-logo', [ 'height' => 80, 'width' => 280, 'flex-height' => true ] );
    add_theme_support( 'html5', [ 'search-form','comment-form','comment-list','gallery','caption','style','script' ] );
    register_nav_menus( [
        'primary' => 'Primary Menu',
        'footer'  => 'Footer Menu',
    ] );
}
add_action( 'after_setup_theme', 'zeneesha_setup' );

// ── Remove Bloat ───────────────────────────────────────────────
function zeneesha_remove_bloat() {
    // Emoji
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    // Block library CSS
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
    wp_dequeue_style( 'global-styles' );
    wp_dequeue_style( 'classic-theme-styles' );
    // Dashicons on frontend
    if ( ! is_admin() ) wp_deregister_style( 'dashicons' );
    // jQuery — we don't use it
    wp_deregister_script( 'jquery' );
    wp_deregister_script( 'jquery-core' );
    wp_deregister_script( 'jquery-migrate' );
    // WP embed
    wp_deregister_script( 'wp-embed' );
}
add_action( 'wp_enqueue_scripts', 'zeneesha_remove_bloat', 100 );

function zeneesha_clean_head() {
    remove_action( 'wp_head', 'feed_links', 2 );
    remove_action( 'wp_head', 'feed_links_extra', 3 );
    remove_action( 'wp_head', 'wlwmanifest_link' );
    remove_action( 'wp_head', 'rsd_link' );
    remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );
    remove_action( 'wp_head', 'wp_generator' );
    remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
    remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
    remove_action( 'template_redirect', 'rest_output_link_header', 11, 0 );
}
add_action( 'after_setup_theme', 'zeneesha_clean_head' );

// Disable XML-RPC
add_filter( 'xmlrpc_enabled', '__return_false' );
// Disable admin bar on frontend
add_filter( 'show_admin_bar', '__return_false' );

// ── Enqueue Assets ─────────────────────────────────────────────
function zeneesha_enqueue_assets() {
    $v   = '2.1.53';
    $uri = get_template_directory_uri();

    // Main CSS — preload / deferred
    wp_enqueue_style( 'zeneesha-main', $uri . '/assets/css/main.css', [], $v );

    // Main JS — deferred via filter below
    wp_enqueue_script( 'zeneesha-main', $uri . '/assets/js/main.js', [], $v, true );

    // Pass AJAX URL + nonce to JS
    wp_localize_script( 'zeneesha-main', 'zeneesha_ajax', [
        'url'           => admin_url( 'admin-ajax.php' ),
        'nonce'         => wp_create_nonce( 'zeneesha_contact_nonce' ),
        'careers_nonce' => wp_create_nonce( 'zeneesha_careers_nonce' ),
    ] );
}
add_action( 'wp_enqueue_scripts', 'zeneesha_enqueue_assets' );

// Defer zeneesha-main script tag
add_filter( 'script_loader_tag', function ( $tag, $handle ) {
    if ( 'zeneesha-main' === $handle ) {
        return str_replace( '<script ', '<script defer ', $tag );
    }
    return $tag;
}, 10, 2 );

// ── Inline Critical CSS ────────────────────────────────────────
add_action( 'wp_head', function () {
    $f = get_template_directory() . '/assets/css/critical.css';
    if ( file_exists( $f ) ) {
        echo '<style id="zeneesha-critical">' . file_get_contents( $f ) . '</style>' . "\n"; // phpcs:ignore
    }
}, 5 );

// ── Google Fonts preconnect ────────────────────────────────────
add_action( 'wp_head', function () {
    echo '<link rel="preconnect" href="https://fonts.googleapis.com">' . "\n";
    echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n";
    echo '<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;500;600&display=swap">' . "\n";
}, 2 );

// ── Organization Schema (sitewide) ────────────────────────────
add_action( 'wp_head', function () {
    $schema = [
        '@context'    => 'https://schema.org',
        '@type'       => 'ProfessionalService',
        'name'        => 'Zeneesha',
        'url'         => home_url('/'),
        'logo'        => get_template_directory_uri() . '/assets/img/zeneesha-logo.png',
        'description' => 'Independent Workday practice delivering implementation, AMS support, and optimisation across the UK and EMEA.',
        'areaServed'  => [ 'GB', 'EMEA' ],
        'address'     => [
            '@type'           => 'PostalAddress',
            'streetAddress'   => '14 Finsbury Circus',
            'addressLocality' => 'London',
            'postalCode'      => 'EC2M 7EB',
            'addressCountry'  => 'GB',
        ],
        'telephone'   => '+442080904040',
        'email'       => 'hello@zeneesha.co.uk',
        'knowsAbout'  => [ 'Workday', 'Workday HCM', 'Workday Finance', 'Workday AMS', 'ERP Implementation', 'HCM' ],
        'sameAs'      => [ 'https://www.linkedin.com/company/zeneesha/' ],
    ];
    echo '<script type="application/ld+json">' . wp_json_encode( $schema, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES ) . '</script>' . "\n";
}, 10 );

// ── Contact Form AJAX ──────────────────────────────────────────
function zeneesha_handle_contact() {
    check_ajax_referer( 'zeneesha_contact_nonce', 'nonce' );

    $name     = sanitize_text_field( $_POST['contact_name']    ?? '' );
    $email    = sanitize_email( $_POST['contact_email']        ?? '' );
    $phone    = sanitize_text_field( $_POST['contact_phone']   ?? '' );
    $company  = sanitize_text_field( $_POST['contact_company'] ?? '' );
    $interest = sanitize_text_field( $_POST['contact_interest']?? '' );
    $message  = sanitize_textarea_field( $_POST['contact_message'] ?? '' );

    if ( empty( $name ) || ! is_email( $email ) ) {
        wp_send_json_error( 'Invalid input.' );
    }

    $to      = 'hello@zeneesha.co.uk';
    $subject = 'New Enquiry: ' . $name . ( $interest ? ' [' . $interest . ']' : '' );
    $body    = "Name: {$name}\nEmail: {$email}\nPhone: {$phone}\nCompany: {$company}\nInterest: {$interest}\n\nMessage:\n{$message}";
    $headers = [ 'Content-Type: text/plain; charset=UTF-8', "Reply-To: {$name} <{$email}>" ];

    $sent = wp_mail( $to, $subject, $body, $headers );
    $sent ? wp_send_json_success() : wp_send_json_error( 'Mail failed.' );
}
add_action( 'wp_ajax_zeneesha_contact',        'zeneesha_handle_contact' );
add_action( 'wp_ajax_nopriv_zeneesha_contact', 'zeneesha_handle_contact' );

// ── Careers CV Upload AJAX ─────────────────────────────────────
function zeneesha_handle_careers() {
    check_ajax_referer( 'zeneesha_careers_nonce', 'zeneesha_careers_nonce' );

    $name     = sanitize_text_field( $_POST['careers_name']          ?? '' );
    $email    = sanitize_email( $_POST['careers_email']              ?? '' );
    $phone    = sanitize_text_field( $_POST['careers_phone']         ?? '' );
    $role     = sanitize_text_field( $_POST['careers_role_interest'] ?? '' );
    $message  = sanitize_textarea_field( $_POST['careers_message']   ?? '' );

    if ( empty( $name ) || ! is_email( $email ) ) {
        wp_send_json_error( 'Please provide your name and a valid email address.' );
    }

    $to      = 'hello@zeneesha.co.uk';
    $subject = "CV Application: {$name}" . ( $role ? " [{$role}]" : '' );
    $body    = "Name: {$name}\nEmail: {$email}\nPhone: {$phone}\nRole of interest: {$role}\n\nCover note:\n{$message}";
    $headers = [ 'Content-Type: text/plain; charset=UTF-8', "Reply-To: {$name} <{$email}>" ];

    // Handle CV file upload
    $attachments = [];
    if ( ! empty( $_FILES['careers_cv']['name'] ) ) {
        // Validate file type
        $allowed_types = [ 'application/pdf', 'application/msword',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document' ];
        $file_type = $_FILES['careers_cv']['type'];
        $file_size = $_FILES['careers_cv']['size'];
        $max_size  = 5 * 1024 * 1024; // 5 MB

        if ( ! in_array( $file_type, $allowed_types, true ) ) {
            wp_send_json_error( 'Please attach a PDF or Word document.' );
        }
        if ( $file_size > $max_size ) {
            wp_send_json_error( 'File is too large. Maximum size is 5MB.' );
        }

        // Save to uploads using WP handling
        if ( ! function_exists( 'wp_handle_upload' ) ) {
            require_once ABSPATH . 'wp-admin/includes/file.php';
        }
        $upload = wp_handle_upload( $_FILES['careers_cv'], [ 'test_form' => false ] );
        if ( ! isset( $upload['error'] ) && isset( $upload['file'] ) ) {
            $attachments[] = $upload['file'];
        }
    }

    $sent = wp_mail( $to, $subject, $body, $headers, $attachments );

    // Clean up temp upload if sent successfully
    if ( $sent && ! empty( $attachments[0] ) && file_exists( $attachments[0] ) ) {
        // Keep file for audit trail — do not delete
    }

    $sent ? wp_send_json_success( 'Thank you. Your CV has been received.' )
          : wp_send_json_error( 'Submission failed. Please email us directly at hello@zeneesha.co.uk' );
}
add_action( 'wp_ajax_zeneesha_careers',        'zeneesha_handle_careers' );
add_action( 'wp_ajax_nopriv_zeneesha_careers', 'zeneesha_handle_careers' );

// ── Page Templates ─────────────────────────────────────────────
add_filter( 'theme_page_templates', function ( $t ) {
    $t['templates/page-service.php']     = 'Service Page';
    $t['templates/page-ams-support.php'] = 'AMS & Support Page';
    $t['templates/page-about.php']       = 'About Page';
    $t['templates/page-contact.php']     = 'Contact Page';
    $t['templates/page-careers.php']     = 'Careers Page';
    $t['templates/page-resources.php']   = 'Resources Hub';
    $t['templates/page-partnership.php'] = 'Partnership Page';
    $t['templates/page-topic.php']       = 'Topic Page (AEO/SEO)';
    return $t;
} );

// ── ACF Field Groups ───────────────────────────────────────────
add_action( 'acf/init', function () {
    if ( ! function_exists( 'acf_add_local_field_group' ) ) return;

    // ── Homepage ──────────────────────────────────────────────
    acf_add_local_field_group( [
        'key'    => 'group_home',
        'title'  => 'Homepage Content',
        'fields' => [
            [ 'key'=>'field_hero_h1',       'label'=>'Hero — Line 1 (small)',    'name'=>'hero_h1',       'type'=>'text',     'default_value'=>'Make Workday Work.' ],
            [ 'key'=>'field_hero_h2',       'label'=>'Hero — Line 2 (large)',    'name'=>'hero_h2',       'type'=>'text',     'default_value'=>'' ],
            [ 'key'=>'field_hero_body',     'label'=>'Hero — Body text',         'name'=>'hero_body',     'type'=>'textarea', 'default_value'=>'Optimise, support and evolve Workday so it delivers the value it promised.', 'rows'=>3 ],
            [ 'key'=>'field_hero_cta',      'label'=>'Hero — Primary CTA text',  'name'=>'hero_cta',      'type'=>'text',     'default_value'=>'Book Your Free Workday Health Check' ],
            [ 'key'=>'field_trust_heading', 'label'=>'Trust — Heading',          'name'=>'trust_heading', 'type'=>'text',     'default_value'=>'Trusted by organisations running Workday around the world.' ],
            [ 'key'=>'field_trust_sub',     'label'=>'Trust — Subtext',          'name'=>'trust_sub',     'type'=>'text',     'default_value'=>'We help you bring clarity to your most critical business decisions.' ],
            [ 'key'=>'field_ai_h1',         'label'=>'AI — Heading',             'name'=>'ai_h1',         'type'=>'text',     'default_value'=>'Still Talking About AI' ],
            [ 'key'=>'field_ai_h2',         'label'=>'AI — Heading (highlight)', 'name'=>'ai_h2',         'type'=>'text',     'default_value'=>'or Using It?' ],
            [ 'key'=>'field_ai_body1',      'label'=>'AI — Body para 1',         'name'=>'ai_body1',      'type'=>'textarea', 'default_value'=>"Workday's AI roadmap is accelerating. Natural language queries, intelligent automation, and predictive analytics are live in select modules today and expanding fast.", 'rows'=>3 ],
            [ 'key'=>'field_ai_body2',      'label'=>'AI — Body para 2',         'name'=>'ai_body2',      'type'=>'textarea', 'default_value'=>"Organisations with clean data, optimised configuration, and adopted processes will benefit immediately. Those without will spend their AI budget fixing the foundations first.", 'rows'=>3 ],
            [ 'key'=>'field_cta_heading',   'label'=>'CTA Band — Heading',       'name'=>'cta_heading',   'type'=>'text',     'default_value'=>'Your Complimentary Workday Health Check.' ],
            [ 'key'=>'field_cta_body',      'label'=>'CTA Band — Body',          'name'=>'cta_body',      'type'=>'textarea', 'default_value'=>"In 60 minutes, we'll review your Workday setup and give you a clear picture of where value is being lost, and how to recover it.", 'rows'=>3 ],
        ],
        'location' => [ [ [ 'param'=>'page_template', 'operator'=>'==', 'value'=>'front-page.php' ] ] ],
        'position' => 'normal',
        'style'    => 'default',
    ] );

    // ── Service Page ──────────────────────────────────────────
    acf_add_local_field_group( [
        'key'    => 'group_service',
        'title'  => 'Service Page Content',
        'fields' => [
            [ 'key'=>'field_svc_eyebrow',       'label'=>'Eyebrow (e.g. "Start right")',              'name'=>'svc_eyebrow',       'type'=>'text' ],
            [ 'key'=>'field_svc_tagline',        'label'=>'Tagline',                                   'name'=>'svc_tagline',       'type'=>'text' ],
            [ 'key'=>'field_svc_description',    'label'=>'Description',                               'name'=>'svc_description',   'type'=>'textarea', 'rows'=>5 ],
            [ 'key'=>'field_svc_color',          'label'=>'Accent colour (hex)',                       'name'=>'svc_color',         'type'=>'text',     'default_value'=>'#1E3A8A' ],
            [ 'key'=>'field_svc_outcomes',       'label'=>'Outcomes (one per line)',                   'name'=>'svc_outcomes',      'type'=>'textarea', 'rows'=>4 ],
            [ 'key'=>'field_svc_deliverables',   'label'=>'Deliverables (one per line)',               'name'=>'svc_deliverables',  'type'=>'textarea', 'rows'=>8 ],
            [ 'key'=>'field_svc_cs_metric',      'label'=>'Client outcome — metric',                  'name'=>'svc_cs_metric',     'type'=>'text' ],
            [ 'key'=>'field_svc_cs_client',      'label'=>'Client outcome — client name',             'name'=>'svc_cs_client',     'type'=>'text' ],
            [ 'key'=>'field_svc_cs_result',      'label'=>'Client outcome — result text',             'name'=>'svc_cs_result',     'type'=>'textarea', 'rows'=>2 ],
            [ 'key'=>'field_svc_pain_points',    'label'=>'V1 — Pain points (one per line)',          'name'=>'svc_pain_points',   'type'=>'textarea', 'rows'=>5 ],
            [ 'key'=>'field_svc_process_steps',  'label'=>'V3 — Process steps (Title | Desc)',        'name'=>'svc_process_steps', 'type'=>'textarea', 'rows'=>6 ],
        ],
        'location' => [ [ [ 'param'=>'page_template', 'operator'=>'==', 'value'=>'templates/page-service.php' ] ] ],
        'position' => 'normal',
        'style'    => 'default',
    ] );

    // ── About Page ────────────────────────────────────────────
    acf_add_local_field_group( [
        'key'    => 'group_about',
        'title'  => 'About Page Content',
        'fields' => [
            [ 'key'=>'field_about_tagline',       'label'=>'Hero Tagline',              'name'=>'about_tagline',       'type'=>'text',     'instructions'=>'One-liner under the H1.' ],
            [ 'key'=>'field_about_mission',       'label'=>'Mission statement',         'name'=>'about_mission',       'type'=>'textarea', 'rows'=>3 ],
            [ 'key'=>'field_about_story',         'label'=>'Our Story (paragraphs)',    'name'=>'about_story',         'type'=>'textarea', 'rows'=>8, 'instructions'=>'Use blank lines to separate paragraphs.' ],
            [ 'key'=>'field_director_1_name',     'label'=>'Director 1 — Name',         'name'=>'director_1_name',     'type'=>'text',     'default_value'=>'Rajesh Kumar' ],
            [ 'key'=>'field_director_1_title',    'label'=>'Director 1 — Title',        'name'=>'director_1_title',    'type'=>'text',     'default_value'=>'Managing Director' ],
            [ 'key'=>'field_about_director_bio_1','label'=>'Director 1 — Bio',          'name'=>'about_director_bio_1','type'=>'textarea', 'rows'=>4 ],
            [ 'key'=>'field_director_2_name',     'label'=>'Director 2 — Name',         'name'=>'director_2_name',     'type'=>'text',     'default_value'=>'Ranjan Singh' ],
            [ 'key'=>'field_director_2_title',    'label'=>'Director 2 — Title',        'name'=>'director_2_title',    'type'=>'text',     'default_value'=>'Executive Director' ],
            [ 'key'=>'field_about_director_bio_2','label'=>'Director 2 — Bio',          'name'=>'about_director_bio_2','type'=>'textarea', 'rows'=>4 ],
            [ 'key'=>'field_director_3_name',     'label'=>'Director 3 — Name',         'name'=>'director_3_name',     'type'=>'text',     'default_value'=>'Keshav Kolla' ],
            [ 'key'=>'field_director_3_title',    'label'=>'Director 3 — Title',        'name'=>'director_3_title',    'type'=>'text',     'default_value'=>'Finance Director' ],
            [ 'key'=>'field_about_director_bio_3','label'=>'Director 3 — Bio',          'name'=>'about_director_bio_3','type'=>'textarea', 'rows'=>4 ],
            [ 'key'=>'field_director_4_name',     'label'=>'Director 4 — Name',         'name'=>'director_4_name',     'type'=>'text',     'default_value'=>'Karen Mayo' ],
            [ 'key'=>'field_director_4_title',    'label'=>'Director 4 — Title',        'name'=>'director_4_title',    'type'=>'text',     'default_value'=>'Sales Director' ],
            [ 'key'=>'field_about_director_bio_4','label'=>'Director 4 — Bio',          'name'=>'about_director_bio_4','type'=>'textarea', 'rows'=>4 ],
        ],
        'location' => [ [ [ 'param'=>'page_template', 'operator'=>'==', 'value'=>'templates/page-about.php' ] ] ],
        'position' => 'normal',
        'style'    => 'default',
    ] );

    // ── Contact Page ──────────────────────────────────────────
    acf_add_local_field_group( [
        'key'    => 'group_contact',
        'title'  => 'Contact Page Content',
        'fields' => [
            [ 'key'=>'field_contact_tagline', 'label'=>'Hero tagline', 'name'=>'contact_tagline', 'type'=>'text',
              'default_value'=>'A complimentary 60-minute session where we review your Workday setup and give you a clear picture of where value is being lost, and how to recover it.' ],
            [
                'key'        => 'field_contact_faq',
                'label'      => 'FAQ items',
                'name'       => 'contact_faq',
                'type'       => 'repeater',
                'min'        => 0,
                'max'        => 10,
                'layout'     => 'block',
                'button_label' => 'Add FAQ item',
                'sub_fields' => [
                    [ 'key'=>'field_contact_faq_q', 'label'=>'Question', 'name'=>'faq_q', 'type'=>'text' ],
                    [ 'key'=>'field_contact_faq_a', 'label'=>'Answer',   'name'=>'faq_a', 'type'=>'textarea', 'rows'=>3 ],
                ],
            ],
        ],
        'location' => [ [ [ 'param'=>'page_template', 'operator'=>'==', 'value'=>'templates/page-contact.php' ] ] ],
        'position' => 'normal',
        'style'    => 'default',
    ] );

    // ── Careers Page ──────────────────────────────────────────
    acf_add_local_field_group( [
        'key'    => 'group_careers',
        'title'  => 'Careers Page Content',
        'fields' => [
            [ 'key'=>'field_careers_headline', 'label'=>'Headline',    'name'=>'careers_headline', 'type'=>'text',
              'default_value'=>'Work Where It Matters.' ],
            [ 'key'=>'field_careers_tagline',  'label'=>'Tagline',     'name'=>'careers_tagline',  'type'=>'text',
              'default_value'=>'Join a specialist Workday practice where your expertise goes directly into client outcomes. No bench, no bureaucracy.' ],
            [
                'key'          => 'field_careers_roles',
                'label'        => 'Open roles',
                'name'         => 'careers_roles',
                'type'         => 'repeater',
                'min'          => 0,
                'max'          => 20,
                'layout'       => 'block',
                'button_label' => 'Add role',
                'instructions' => 'Leave empty if no current openings — the template shows a "no openings" state with CV upload form.',
                'sub_fields'   => [
                    [ 'key'=>'field_careers_role_title',    'label'=>'Role title',    'name'=>'role_title',    'type'=>'text',
                      'instructions'=>'e.g. Workday HCM Consultant' ],
                    [ 'key'=>'field_careers_role_type',     'label'=>'Type',          'name'=>'role_type',     'type'=>'select',
                      'choices'=>['Full-time'=>'Full-time','Contract'=>'Contract','Part-time'=>'Part-time'], 'default_value'=>'Full-time' ],
                    [ 'key'=>'field_careers_role_location', 'label'=>'Location',      'name'=>'role_location', 'type'=>'text', 'default_value'=>'Remote / London' ],
                    [ 'key'=>'field_careers_role_desc',     'label'=>'Short description (shown on card)',
                      'name'=>'role_desc',     'type'=>'textarea', 'rows'=>3,
                      'instructions'=>'1–2 sentences summarising the role. Shown beneath the title on the listing.' ],
                    [ 'key'=>'field_careers_role_jd',       'label'=>'Full job description (expandable)',
                      'name'=>'role_jd',       'type'=>'wysiwyg',   'tabs'=>'all', 'toolbar'=>'basic', 'media_upload'=>0,
                      'instructions'=>'Full JD shown when candidate clicks "View full role details". Use headings and bullet points.' ],
                    [ 'key'=>'field_careers_role_url',      'label'=>'Apply URL (optional)',
                      'name'=>'role_url',      'type'=>'url',
                      'instructions'=>'Leave blank to default to the CV form on this page (#careers-form).' ],
                ],
            ],
        ],
        'location' => [ [ [ 'param'=>'page_template', 'operator'=>'==', 'value'=>'templates/page-careers.php' ] ] ],
        'position' => 'normal',
        'style'    => 'default',
    ] );

    // ── Resources Hub ─────────────────────────────────────────
    acf_add_local_field_group( [
        'key'    => 'group_resources',
        'title'  => 'Resources Page Content',
        'fields' => [
            [ 'key'=>'field_resources_headline', 'label'=>'Headline',            'name'=>'resources_headline', 'type'=>'text', 'default_value'=>'Workday Intelligence.' ],
            [ 'key'=>'field_resources_tagline',  'label'=>'Tagline',             'name'=>'resources_tagline',  'type'=>'text', 'default_value'=>'Practical guides, case studies, and insights for organisations that run on Workday.' ],
            [ 'key'=>'field_resources_featured_title', 'label'=>'Featured article — title', 'name'=>'resources_featured_title', 'type'=>'text' ],
            [ 'key'=>'field_resources_featured_date',  'label'=>'Featured article — date',  'name'=>'resources_featured_date',  'type'=>'text' ],
            [ 'key'=>'field_resources_featured_type',  'label'=>'Featured article — type (e.g. Guide)', 'name'=>'resources_featured_type', 'type'=>'text', 'default_value'=>'Guide' ],
            [ 'key'=>'field_resources_featured_intro', 'label'=>'Featured article — intro paragraph', 'name'=>'resources_featured_intro', 'type'=>'textarea', 'rows'=>3 ],
            [ 'key'=>'field_resources_featured_url',   'label'=>'Featured article — URL', 'name'=>'resources_featured_url', 'type'=>'url' ],
            [
                'key'          => 'field_resources_articles',
                'label'        => 'Articles grid',
                'name'         => 'resources_articles',
                'type'         => 'repeater',
                'min'          => 0,
                'max'          => 12,
                'layout'       => 'block',
                'button_label' => 'Add article',
                'sub_fields'   => [
                    [ 'key'=>'field_res_art_type',  'label'=>'Type',    'name'=>'article_type',  'type'=>'text', 'default_value'=>'Article' ],
                    [ 'key'=>'field_res_art_date',  'label'=>'Date',    'name'=>'article_date',  'type'=>'text' ],
                    [ 'key'=>'field_res_art_title', 'label'=>'Title',   'name'=>'article_title', 'type'=>'text' ],
                    [ 'key'=>'field_res_art_intro', 'label'=>'Excerpt', 'name'=>'article_intro', 'type'=>'textarea', 'rows'=>2 ],
                    [ 'key'=>'field_res_art_url',   'label'=>'URL',     'name'=>'article_url',   'type'=>'url' ],
                ],
            ],
        ],
        'location' => [ [ [ 'param'=>'page_template', 'operator'=>'==', 'value'=>'templates/page-resources.php' ] ] ],
        'position' => 'normal',
        'style'    => 'default',
    ] );

    // ── Partnership Page ──────────────────────────────────────
    acf_add_local_field_group( [
        'key'    => 'group_partnership',
        'title'  => 'Partnership Page Content',
        'fields' => [
            [ 'key'=>'field_partner_headline', 'label'=>'Headline', 'name'=>'partner_headline', 'type'=>'text', 'default_value'=>'Build Together.' ],
            [ 'key'=>'field_partner_tagline',  'label'=>'Tagline',  'name'=>'partner_tagline',  'type'=>'text', 'default_value'=>'We partner with organisations who share our commitment to Workday excellence. Three models, one goal: helping clients get more from Workday.' ],
        ],
        'location' => [ [ [ 'param'=>'page_template', 'operator'=>'==', 'value'=>'templates/page-partnership.php' ] ] ],
        'position' => 'normal',
        'style'    => 'default',
    ] );

    // ── Topic Page (AEO) ──────────────────────────────────────
    acf_add_local_field_group( [
        'key'    => 'group_topic',
        'title'  => 'Topic Page Content',
        'fields' => [
            [ 'key'=>'field_topic_eyebrow',       'label'=>'Eyebrow / category label', 'name'=>'topic_eyebrow',       'type'=>'text', 'default_value'=>'Workday', 'instructions'=>'Short category label, e.g. "Workday AMS"' ],
            [ 'key'=>'field_topic_headline',      'label'=>'H1 Headline',              'name'=>'topic_headline',      'type'=>'text', 'instructions'=>'The definitive question or topic heading, e.g. "What is Workday AMS Support?"' ],
            [ 'key'=>'field_topic_answer',        'label'=>'Definitive answer (AEO lede)', 'name'=>'topic_answer',    'type'=>'textarea', 'rows'=>4, 'instructions'=>'2-3 sentences answering the headline question directly. This is what engines may feature as a snippet.' ],
            [ 'key'=>'field_topic_intro',         'label'=>'Introduction (longer)',    'name'=>'topic_intro',         'type'=>'textarea', 'rows'=>6 ],
            [ 'key'=>'field_topic_color',         'label'=>'Accent colour (hex)',      'name'=>'topic_color',         'type'=>'text', 'default_value'=>'#1E3A8A' ],
            [ 'key'=>'field_topic_related_svc',   'label'=>'Related service page slug','name'=>'topic_related_svc',   'type'=>'text', 'default_value'=>'ams-support', 'instructions'=>'Slug of related service: implementation, ams-support, or maximise' ],
            [ 'key'=>'field_topic_related_label', 'label'=>'Related service CTA label','name'=>'topic_related_label', 'type'=>'text', 'default_value'=>'See our Workday services' ],
            [ 'key'=>'field_topic_stat_1_num',    'label'=>'Stat 1 — Number',          'name'=>'topic_stat_1_num',    'type'=>'text', 'instructions'=>'e.g. "700%" or "90"' ],
            [ 'key'=>'field_topic_stat_1_label',  'label'=>'Stat 1 — Label',           'name'=>'topic_stat_1_label',  'type'=>'text' ],
            [ 'key'=>'field_topic_stat_2_num',    'label'=>'Stat 2 — Number',          'name'=>'topic_stat_2_num',    'type'=>'text' ],
            [ 'key'=>'field_topic_stat_2_label',  'label'=>'Stat 2 — Label',           'name'=>'topic_stat_2_label',  'type'=>'text' ],
            [ 'key'=>'field_topic_stat_3_num',    'label'=>'Stat 3 — Number',          'name'=>'topic_stat_3_num',    'type'=>'text' ],
            [ 'key'=>'field_topic_stat_3_label',  'label'=>'Stat 3 — Label',           'name'=>'topic_stat_3_label',  'type'=>'text' ],
            [
                'key'          => 'field_topic_sections',
                'label'        => 'Body sections',
                'name'         => 'topic_sections',
                'type'         => 'repeater',
                'min'          => 0,
                'max'          => 8,
                'layout'       => 'block',
                'button_label' => 'Add section',
                'sub_fields'   => [
                    [ 'key'=>'field_topic_sec_h2',   'label'=>'Section heading (H2)', 'name'=>'section_heading', 'type'=>'text' ],
                    [ 'key'=>'field_topic_sec_body',  'label'=>'Section body',         'name'=>'section_body',    'type'=>'textarea', 'rows'=>5 ],
                ],
            ],
            [
                'key'          => 'field_topic_faq',
                'label'        => 'FAQ items',
                'name'         => 'topic_faq',
                'type'         => 'repeater',
                'min'          => 0,
                'max'          => 10,
                'layout'       => 'block',
                'button_label' => 'Add FAQ',
                'instructions' => 'These generate FAQ schema. Use real questions people search for.',
                'sub_fields'   => [
                    [ 'key'=>'field_topic_faq_q', 'label'=>'Question', 'name'=>'faq_q', 'type'=>'text' ],
                    [ 'key'=>'field_topic_faq_a', 'label'=>'Answer',   'name'=>'faq_a', 'type'=>'textarea', 'rows'=>3 ],
                ],
            ],
        ],
        'location' => [ [ [ 'param'=>'page_template', 'operator'=>'==', 'value'=>'templates/page-topic.php' ] ] ],
        'position' => 'normal',
        'style'    => 'default',
    ] );

} ); // end acf/init

// ── Helper: get ACF field with fallback ───────────────────────
function zf( $name, $fallback = '' ) {
    if ( function_exists( 'get_field' ) ) {
        $v = get_field( $name );
        return ( $v !== null && $v !== '' ) ? $v : $fallback;
    }
    return $fallback;
}

// ── Wordmark logo (inline SVG) ────────────────────────────────
function z_logo( $variant = 'dark' ) {
    $fill = ( $variant === 'light' ) ? '#ffffff' : '#1E3A8A';
    return '<svg width="130" height="32" viewBox="0 0 130 32" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">'
        . '<text y="24" font-family="Jost,-apple-system,BlinkMacSystemFont,sans-serif" font-size="21" font-weight="600" fill="' . esc_attr( $fill ) . '" letter-spacing="-0.3">Zeneesha</text>'
        . '<circle cx="124" cy="6" r="3.5" fill="#E8472C"/>'
        . '</svg>';
}

// ── Arrow SVG icon ─────────────────────────────────────────────
function z_arrow( $size = 14 ) {
    return '<svg class="icon-arrow" width="' . $size . '" height="' . $size . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M12 5l7 7-7 7"/></svg>';
}

// ── Check SVG icon ─────────────────────────────────────────────
function z_check( $size = 10 ) {
    return '<svg width="' . $size . '" height="' . $size . '" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 6L9 17l-5-5"/></svg>';
}

// ── SEO: canonical + breadcrumb helpers ───────────────────────
function z_breadcrumb_schema( array $crumbs ) {
    $items = [];
    foreach ( $crumbs as $i => $crumb ) {
        $items[] = [
            '@type'    => 'ListItem',
            'position' => $i + 1,
            'name'     => $crumb['name'],
            'item'     => $crumb['url'],
        ];
    }
    return [
        '@context'        => 'https://schema.org',
        '@type'           => 'BreadcrumbList',
        'itemListElement' => $items,
    ];
}

// ── WP Super Cache compatibility ──────────────────────────────
// WP Super Cache is already installed & activated; no extra config needed here.

// ══════════════════════════════════════════════════════════════
//  iKawn WP ZEN — Admin-only branding
//  Shows iKawn identity in WP admin / login. Never on frontend.
// ══════════════════════════════════════════════════════════════

// ── Login page: replace WP logo with iKawn wordmark ──────────
add_action( 'login_enqueue_scripts', function () {
    $logo_url = get_template_directory_uri() . '/assets/img/admin/ikawn-wordmark.svg';
    ?>
    <style>
        body.login { background: #f5f5f3; }
        body.login #login { padding-top: 40px; }
        #login h1 a {
            background-image: url('<?php echo esc_url( $logo_url ); ?>');
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center center;
            width: 220px;
            height: 64px;
            display: block;
            margin: 0 auto 8px;
        }
        #login form { border-top: 3px solid #F5A623; box-shadow: 0 4px 24px rgba(0,0,0,.08); border-radius: 0 0 10px 10px; }
        #wp-submit { background: #2C2C2C !important; border-color: #2C2C2C !important; text-shadow: none !important; }
        #wp-submit:hover { background: #F5A623 !important; border-color: #F5A623 !important; color: #2C2C2C !important; }
        .login #backtoblog a, .login #nav a { color: #2C2C2C !important; }
        .login #backtoblog a:hover, .login #nav a:hover { color: #F5A623 !important; }
        body.login:after {
            content: 'Built by iKawn · ikawn.com';
            display: block; text-align: center; font-size: 11px;
            color: rgba(44,44,44,.4); letter-spacing: .08em; margin-top: 16px;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
        }
    </style>
    <?php
} );

add_filter( 'login_headerurl',  fn() => home_url( '/' ) );
add_filter( 'login_headertext', fn() => 'iKawn WP ZEN — Zeneesha' );

// ── Admin footer ──────────────────────────────────────────────
add_filter( 'admin_footer_text', function () {
    $icon_url = get_template_directory_uri() . '/assets/img/admin/ikawn-icon.svg';
    return '<span style="display:inline-flex;align-items:center;gap:8px;font-size:12px;color:#555">
        <img src="' . esc_url( $icon_url ) . '" width="20" height="20" alt="iKawn" style="vertical-align:middle;border-radius:4px">
        Built &amp; maintained by <a href="https://ikawn.com" target="_blank" rel="noopener" style="color:#F5A623;font-weight:600;text-decoration:none">iKawn</a>
        &nbsp;&middot;&nbsp; iKawn WP ZEN v1.3.4
    </span>';
} );
add_filter( 'update_footer', fn() => '', 11 );

// ── Admin head: iKawn accent + icon ──────────────────────────
add_action( 'admin_head', function () {
    $icon_url = get_template_directory_uri() . '/assets/img/admin/ikawn-icon.svg';
    ?>
    <style>
        #wpadminbar { border-bottom: 2px solid #F5A623; }
        #wpadminbar .ab-top-menu > li.hover > .ab-item,
        #wpadminbar .ab-top-menu > li > .ab-item:focus,
        #wpadminbar:not(.mobile) .ab-top-menu > li:hover > .ab-item { color: #F5A623 !important; }
        #wp-admin-bar-site-name > .ab-item::before {
            content: '';
            display: inline-block; width: 16px; height: 16px;
            background-image: url('<?php echo esc_url( $icon_url ); ?>');
            background-size: contain; background-repeat: no-repeat;
            vertical-align: middle; margin-right: 6px; border-radius: 3px;
        }
        [id^="acf-group_"] .acf-box { border-top: 3px solid #F5A623 !important; }
    </style>
    <?php
} );
