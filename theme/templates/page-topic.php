<?php
/**
 * Template Name: Topic Page
 *
 * AEO/SEO-optimised topic page for Workday subject-matter content.
 * Designed for zero-click answer capture, FAQ schema, breadcrumb schema.
 *
 * ACF field group: key=group_topic, location: page_template == templates/page-topic.php
 * Fields:
 *   topic_eyebrow      (text)    — short category label, e.g. "Workday AMS"
 *   topic_headline     (text)    — H1, e.g. "What is Workday AMS Support?"
 *   topic_answer       (textarea)— 2–3 sentence definitive answer (AEO lede)
 *   topic_intro        (textarea)— longer intro paragraph(s)
 *   topic_sections     (repeater)— section_heading (text), section_body (textarea)
 *   topic_faq          (repeater)— faq_q (text), faq_a (textarea)
 *   topic_related_svc  (text)    — slug of related service page (implementation/ams-support/maximise)
 *   topic_related_label(text)    — CTA label override
 *   topic_color        (text)    — accent hex e.g. #1E3A8A (falls back to navy)
 *   topic_stat_1_num   (text)
 *   topic_stat_1_label (text)
 *   topic_stat_2_num   (text)
 *   topic_stat_2_label (text)
 *   topic_stat_3_num   (text)
 *   topic_stat_3_label (text)
 */

get_header();

// ── ACF fields ──────────────────────────────────────────────────────────────
$eyebrow      = zf( 'topic_eyebrow',      'Workday' );
$headline     = zf( 'topic_headline',     get_the_title() );
$answer       = zf( 'topic_answer',       '' );
$intro        = zf( 'topic_intro',        '' );
$sections     = get_field( 'topic_sections' ) ?: [];
$faq_raw      = get_field( 'topic_faq' )     ?: [];
$related_svc  = zf( 'topic_related_svc',  'ams-support' );
$related_label= zf( 'topic_related_label','See our Workday services' );
$accent       = zf( 'topic_color',        '#1E3A8A' );

// Stats (optional — only shown if at least stat_1_num is set)
$stats = [];
for ( $n = 1; $n <= 3; $n++ ) {
    $num   = zf( "topic_stat_{$n}_num",   '' );
    $label = zf( "topic_stat_{$n}_label", '' );
    if ( $num ) {
        $stats[] = [ 'num' => $num, 'label' => $label ];
    }
}

// Related service page URL
$related_url = home_url( '/' . ltrim( $related_svc, '/' ) . '/' );

// ── Unsplash hero images — keyed by topic slug, fallback by related_svc ──
$slug = get_post_field( 'post_name', get_the_ID() );
$img_base = 'https://images.unsplash.com/';
$topic_imgs = [
    'workday-hcm-uk'           => $img_base . 'photo-1521737711867-e3b97375f902?w=1400&h=613&q=75&auto=format&fit=crop', // people analytics / team
    'workday-ams'              => $img_base . 'photo-1558494949-ef010cbdcc31?w=1400&h=613&q=75&auto=format&fit=crop', // server room / support
    'workday-data-migration'   => $img_base . 'photo-1460925895917-afdab827c52f?w=1400&h=613&q=75&auto=format&fit=crop', // data / spreadsheets
    'workday-mid-market'       => $img_base . 'photo-1556761175-4b46a572b786?w=1400&h=613&q=75&auto=format&fit=crop', // mid-size business office
    'workday-finance-training' => $img_base . 'photo-1454165804606-c3d57bc86b40?w=1400&h=613&q=75&auto=format&fit=crop', // finance / training
    'workday-ai'               => $img_base . 'photo-1677442135703-1787eea5ce01?w=1400&h=613&q=75&auto=format&fit=crop', // AI / machine learning
];
// Fallback by related_svc
$svc_fallbacks = [
    'implementation' => $img_base . 'photo-1518770660439-4636190af475?w=1400&h=613&q=75&auto=format&fit=crop',
    'ams-support'    => $img_base . 'photo-1558494949-ef010cbdcc31?w=1400&h=613&q=75&auto=format&fit=crop',
    'maximise'       => $img_base . 'photo-1551288049-bebda4e38f71?w=1400&h=613&q=75&auto=format&fit=crop',
];
$hero_img = $topic_imgs[ $slug ] ?? $svc_fallbacks[ $related_svc ] ?? $img_base . 'photo-1486325212027-8081e485255e?w=1400&h=613&q=75&auto=format&fit=crop';

// Breadcrumb trail
$breadcrumbs = [
    [ 'name' => 'Home',      'url' => home_url('/') ],
    [ 'name' => 'Resources', 'url' => home_url('/resources/') ],
    [ 'name' => get_the_title(), 'url' => get_permalink() ],
];
?>

<!-- FAQ Schema JSON-LD -->
<?php if ( ! empty( $faq_raw ) ) : ?>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    <?php
    $schema_items = [];
    foreach ( $faq_raw as $item ) {
        $schema_items[] = '{
      "@type": "Question",
      "name": ' . wp_json_encode( $item['faq_q'] ) . ',
      "acceptedAnswer": {
        "@type": "Answer",
        "text": ' . wp_json_encode( $item['faq_a'] ) . '
      }
    }';
    }
    echo implode( ",\n    ", $schema_items );
    ?>

  ]
}
</script>
<?php endif; ?>

<!-- Article Schema -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Article",
  "headline": <?php echo wp_json_encode( $headline ); ?>,
  "description": <?php echo wp_json_encode( $answer ?: $intro ); ?>,
  "author": {
    "@type": "Organization",
    "name": "Zeneesha",
    "url": "<?php echo esc_url( home_url('/') ); ?>"
  },
  "publisher": {
    "@type": "Organization",
    "name": "Zeneesha",
    "url": "<?php echo esc_url( home_url('/') ); ?>"
  },
  "dateModified": "<?php echo esc_html( get_the_modified_date( 'c' ) ); ?>"
}
</script>

<!-- Breadcrumb Schema -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": [
    <?php
    $bc_items = [];
    foreach ( $breadcrumbs as $pos => $bc ) {
        $bc_items[] = '{"@type":"ListItem","position":' . ( $pos + 1 ) . ',"name":' . wp_json_encode( $bc['name'] ) . ',"item":"' . esc_url( $bc['url'] ) . '"}';
    }
    echo implode( ', ', $bc_items );
    ?>

  ]
}
</script>

<!-- Reading progress bar -->
<div id="progress" class="reading-progress" aria-hidden="true"></div>

<main id="main" tabindex="-1">


<!-- ════════════════════════════════════════════════════════════
     1+2. HERO — breadcrumb + definitive H1 + AEO lede
════════════════════════════════════════════════════════════ -->
<section class="page-hero-fullbg topic-hero" style="--topic-accent:<?php echo esc_attr( $accent ); ?>">
  <img
    src="<?php echo esc_url( $hero_img ); ?>"
    class="hero-bg-img-el"
    alt=""
    aria-hidden="true"
    loading="eager"
    decoding="async"
    width="1400" height="613">
  <div class="hero-overlay" aria-hidden="true"></div>
  <div class="container">

    <!-- Breadcrumb — lives inside hero so fixed header is never obscured -->
    <nav class="topic-bc-in-hero" aria-label="Breadcrumb">
      <ol>
        <?php foreach ( $breadcrumbs as $pos => $bc ) : ?>
          <li>
            <?php if ( $pos < count( $breadcrumbs ) - 1 ) : ?>
              <a href="<?php echo esc_url( $bc['url'] ); ?>"><?php echo esc_html( $bc['name'] ); ?></a>
              <span aria-hidden="true">/</span>
            <?php else : ?>
              <span aria-current="page"><?php echo esc_html( $bc['name'] ); ?></span>
            <?php endif; ?>
          </li>
        <?php endforeach; ?>
      </ol>
    </nav>

    <div class="topic-hero-inner">

      <div class="section-label reveal">
        <span class="section-label-line"></span>
        <?php echo esc_html( $eyebrow ); ?>
      </div>

      <h1 class="topic-h1 reveal delay-1"><?php echo esc_html( $headline ); ?></h1>

      <?php if ( $answer ) : ?>
        <!-- AEO lede — featured snippet target -->
        <div class="topic-answer-box reveal delay-2">
          <p><?php echo nl2br( esc_html( $answer ) ); ?></p>
        </div>
      <?php endif; ?>

    </div>
  </div>
</section>


<!-- ════════════════════════════════════════════════════════════
     3. STATS BAND (conditional)
════════════════════════════════════════════════════════════ -->
<?php if ( ! empty( $stats ) ) : ?>
<section class="svc-stats-band topic-stats-band" aria-label="Key statistics">
  <div class="container">
    <div class="svc-stats-row">
      <?php foreach ( $stats as $stat ) : ?>
        <div class="svc-stat reveal">
          <div class="svc-stat-top">
            <span class="svc-stat-num" data-count="<?php echo esc_attr( preg_replace( '/[^0-9]/', '', $stat['num'] ) ); ?>"><?php echo esc_html( $stat['num'] ); ?></span>
          </div>
          <span class="svc-stat-label"><?php echo esc_html( $stat['label'] ); ?></span>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>


<!-- ════════════════════════════════════════════════════════════
     4. INTRO + BODY SECTIONS
════════════════════════════════════════════════════════════ -->
<section class="topic-body-section">
  <div class="container">
    <div class="topic-body-grid">

      <!-- Main content column -->
      <div class="topic-content-col">

        <?php if ( $intro ) : ?>
          <div class="topic-intro reveal">
            <?php echo nl2br( esc_html( $intro ) ); ?>
          </div>
        <?php endif; ?>

        <?php foreach ( $sections as $i => $sec ) : ?>
          <div class="topic-section reveal" style="transition-delay:<?php echo esc_attr( $i * 80 ); ?>ms">
            <h2 class="topic-section-heading"><?php echo esc_html( $sec['section_heading'] ); ?></h2>
            <div class="topic-section-body">
              <?php echo nl2br( esc_html( $sec['section_body'] ) ); ?>
            </div>
          </div>
        <?php endforeach; ?>

      </div>

      <!-- Sidebar: related service CTA -->
      <aside class="topic-sidebar">
        <div class="topic-sidebar-card reveal" style="--topic-accent:<?php echo esc_attr( $accent ); ?>">
          <div class="topic-sidebar-label" style="color:<?php echo esc_attr( $accent ); ?>">Related service</div>
          <h3 class="topic-sidebar-heading">Need expert Workday support?</h3>
          <p class="topic-sidebar-body">Zeneesha is a Workday Sales &amp; Services Partner. We help mid-market and enterprise organisations implement, support, and maximise Workday.</p>
          <a href="<?php echo esc_url( $related_url ); ?>" class="btn-primary topic-sidebar-cta" style="background:<?php echo esc_attr( $accent ); ?>;border-color:<?php echo esc_attr( $accent ); ?>">
            <?php echo esc_html( $related_label ); ?> <?php echo z_arrow( 14 ); ?>
          </a>
          <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="topic-sidebar-secondary">
            Or book a free Health Check <?php echo z_arrow( 13 ); ?>
          </a>
        </div>

        <!-- At-a-glance credentials -->
        <div class="topic-sidebar-creds reveal delay-2">
          <div class="topic-cred-item">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="<?php echo esc_attr( $accent ); ?>" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 6L9 17l-5-5"/></svg>
            Workday Sales &amp; Services Partner
          </div>
          <div class="topic-cred-item">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="<?php echo esc_attr( $accent ); ?>" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 6L9 17l-5-5"/></svg>
            Cyber Essentials Certified
          </div>
          <div class="topic-cred-item">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="<?php echo esc_attr( $accent ); ?>" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 6L9 17l-5-5"/></svg>
            UK HQ &mdash; EMEA delivery
          </div>
        </div>
      </aside>

    </div>
  </div>
</section>


<!-- ════════════════════════════════════════════════════════════
     5. FAQ ACCORDION — AEO-optimised
════════════════════════════════════════════════════════════ -->
<?php if ( ! empty( $faq_raw ) ) : ?>
<section class="topic-faq-section" id="faq">
  <div class="container">

    <div class="contact-faq-intro">
      <div class="section-label reveal">
        <span class="section-label-line" style="background:<?php echo esc_attr( $accent ); ?>"></span>
        Questions &amp; Answers
      </div>
      <h2 class="contact-faq-heading reveal delay-1">Frequently asked questions</h2>
    </div>

    <div class="contact-faq-list topic-faq-list">
      <?php foreach ( $faq_raw as $i => $item ) : ?>
        <div class="faq-item reveal" style="transition-delay:<?php echo esc_attr( $i * 60 ); ?>ms">
          <button class="faq-btn" aria-expanded="false" aria-controls="tfaq-<?php echo esc_attr( $i ); ?>">
            <span><?php echo esc_html( $item['faq_q'] ); ?></span>
            <svg class="faq-chevron" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="6 9 12 15 18 9"/></svg>
          </button>
          <div class="faq-body" id="tfaq-<?php echo esc_attr( $i ); ?>">
            <p><?php echo esc_html( $item['faq_a'] ); ?></p>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

  </div>
</section>
<?php endif; ?>


<!-- ════════════════════════════════════════════════════════════
     6. RELATED TOPICS
════════════════════════════════════════════════════════════ -->
<section class="topic-related-section">
  <div class="container">
    <div class="section-label reveal">
      <span class="section-label-line" style="background:var(--navy)"></span>
      Explore More
    </div>
    <h2 class="topic-related-heading reveal delay-1">Related topics</h2>
    <div class="topic-related-grid">
      <?php
      // Get other topic pages (same template, exclude current)
      $topic_pages = get_posts( [
          'post_type'      => 'page',
          'posts_per_page' => 4,
          'post__not_in'   => [ get_the_ID() ],
          'meta_key'       => '_wp_page_template',
          'meta_value'     => 'templates/page-topic.php',
          'orderby'        => 'rand',
      ] );
      foreach ( $topic_pages as $tp ) :
          $tp_eyebrow = get_field( 'topic_eyebrow', $tp->ID ) ?: 'Workday';
          $tp_answer  = get_field( 'topic_answer',  $tp->ID ) ?: '';
          $tp_accent  = get_field( 'topic_color',   $tp->ID ) ?: '#1E3A8A';
      ?>
        <a href="<?php echo esc_url( get_permalink( $tp->ID ) ); ?>" class="topic-related-card reveal">
          <div class="topic-related-card-eyebrow" style="color:<?php echo esc_attr( $tp_accent ); ?>"><?php echo esc_html( $tp_eyebrow ); ?></div>
          <h3 class="topic-related-card-title"><?php echo esc_html( get_the_title( $tp->ID ) ); ?></h3>
          <?php if ( $tp_answer ) : ?>
            <p class="topic-related-card-excerpt"><?php echo esc_html( wp_trim_words( $tp_answer, 18 ) ); ?></p>
          <?php endif; ?>
          <span class="topic-related-card-arrow"><?php echo z_arrow( 13 ); ?></span>
        </a>
      <?php endforeach; ?>
      <?php if ( empty( $topic_pages ) ) : ?>
        <!-- Fallback static links if no topic pages exist yet -->
        <?php
        $fallback_topics = [
            [ 'url' => home_url('/workday-hcm-uk/'),           'eyebrow' => 'HCM', 'title' => 'Workday HCM in the UK',                  'color' => '#1E3A8A' ],
            [ 'url' => home_url('/workday-ams/'),              'eyebrow' => 'AMS', 'title' => 'What is Workday AMS Support?',           'color' => '#3B9EDB' ],
            [ 'url' => home_url('/workday-data-migration/'),   'eyebrow' => 'Data', 'title' => 'Workday Data Migration Guide',          'color' => '#F57C1F' ],
            [ 'url' => home_url('/workday-mid-market/'),       'eyebrow' => 'Mid-market', 'title' => 'Workday for Mid-Market',          'color' => '#E8472C' ],
        ];
        foreach ( $fallback_topics as $ft ) : ?>
          <a href="<?php echo esc_url( $ft['url'] ); ?>" class="topic-related-card reveal">
            <div class="topic-related-card-eyebrow" style="color:<?php echo esc_attr( $ft['color'] ); ?>"><?php echo esc_html( $ft['eyebrow'] ); ?></div>
            <h3 class="topic-related-card-title"><?php echo esc_html( $ft['title'] ); ?></h3>
            <span class="topic-related-card-arrow"><?php echo z_arrow( 13 ); ?></span>
          </a>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
  </div>
</section>


<!-- ════════════════════════════════════════════════════════════
     7. BOTTOM CTA BAND
════════════════════════════════════════════════════════════ -->
<section class="section-cta" id="topic-cta">
  <div aria-hidden="true" style="position:absolute;inset:0;overflow:hidden;pointer-events:none">
    <div class="cta-blob-1"></div>
    <div class="cta-blob-2"></div>
  </div>
  <div class="cta-inner">
    <div>
      <div class="section-label reveal cta-label">
        <span class="section-label-line" style="background:var(--redorange)"></span>
        Talk to an Expert
      </div>
      <h2 class="cta-heading reveal delay-1">Ready to get more from Workday?<span> Let&rsquo;s talk.</span></h2>
      <p class="cta-body reveal delay-2">
        We offer a complimentary 60-minute Workday Health Check. No cost, no obligation — just an honest assessment of where value is being lost and how to recover it.
      </p>
      <div class="cta-note reveal delay-3">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#10b981" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 6L9 17l-5-5"/></svg>
        No cost &middot; No obligation &middot; Reply within one working day
      </div>
    </div>
    <div class="reveal delay-3">
      <div class="cta-form-wrap">
        <div class="cta-form-label">Book your Health Check</div>
        <form id="topic-cta-form" novalidate>
          <?php wp_nonce_field( 'zeneesha_contact_nonce', 'zeneesha_nonce' ); ?>
          <input type="hidden" name="action" value="zeneesha_contact">
          <div class="form-row">
            <div>
              <label class="field-label" for="topic_cta_name">Name <span>*</span></label>
              <input class="form-input" type="text" id="topic_cta_name" name="contact_name" placeholder="Your full name" required autocomplete="name">
            </div>
            <div>
              <label class="field-label" for="topic_cta_email">Work email <span>*</span></label>
              <input class="form-input" type="email" id="topic_cta_email" name="contact_email" placeholder="you@company.com" required autocomplete="email">
            </div>
          </div>
          <div class="form-group">
            <label class="field-label" for="topic_cta_message">What are you working on?</label>
            <textarea class="form-input form-textarea" id="topic_cta_message" name="contact_message" rows="3" placeholder="Tell us about your Workday setup..."></textarea>
          </div>
          <div class="form-group">
            <button type="submit" class="form-submit">Book Health Check <?php echo z_arrow( 14 ); ?></button>
          </div>
          <div id="topic-form-message" class="form-msg" role="alert" aria-live="polite"></div>
        </form>
      </div>
    </div>
  </div>
</section>


</main>

<?php get_footer(); ?>
