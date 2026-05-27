<?php
/**
 * Template Name: Careers Page
 *
 * Careers page for Zeneesha — open roles, why join, CV upload form.
 *
 * AJAX handler registered in functions.php:
 *   wp_ajax_zeneesha_careers / wp_ajax_nopriv_zeneesha_careers → zeneesha_handle_careers()
 * Nonce: zeneesha_careers_nonce (field name: zeneesha_careers_nonce)
 */

get_header();

// ── ACF fields ───────────────────────────────────────────────────────────────
$headline = zf( 'careers_headline', "Work With the Best.\nBe Your Best." );
$tagline  = zf( 'careers_tagline',  "We're always looking for exceptional Workday talent. If you're passionate about delivering real outcomes for real clients, we want to hear from you." );

// ── Why cards ────────────────────────────────────────────────────────────────
$why_cards = [
    [
        'title' => 'Named accounts, not bench work',
        'desc'  => "You'll work on long-term engagements with clients you know, not be parachuted from project to project.",
        'icon'  => '<svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87"/><path d="M16 3.13a4 4 0 010 7.75"/></svg>',
        'color' => 'var(--navy)',
    ],
    [
        'title' => 'Senior practitioners around you',
        'desc'  => 'Learn from directors and leads who have each delivered 20+ Workday projects across multiple verticals.',
        'icon'  => '<svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="8" r="6"/><path d="M15.477 12.89L17 22l-5-3-5 3 1.523-9.11"/></svg>',
        'color' => 'var(--sky2)',
    ],
    [
        'title' => 'UK-based with global exposure',
        'desc'  => 'London headquarters, EMEA delivery &mdash; you\'ll gain international experience without leaving home.',
        'icon'  => '<svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 014 10 15.3 15.3 0 01-4 10 15.3 15.3 0 01-4-10 15.3 15.3 0 014-10z"/></svg>',
        'color' => 'var(--orange)',
    ],
    [
        'title' => 'Outcomes that matter',
        'desc'  => 'We measure ourselves by client results, not activity. Your work will have visible, lasting impact.',
        'icon'  => '<svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/><polyline points="17 6 23 6 23 12"/></svg>',
        'color' => 'var(--redorange)',
    ],
];

// ── Open roles — ACF repeater: careers_roles ─────────────────────────────────
$roles = [];
if ( function_exists( 'get_field' ) ) {
    $roles = get_field( 'careers_roles' ) ?: [];
}

// Fallback demo roles (shown when no CMS data set yet)
if ( empty( $roles ) ) {
    $roles = [
        [
            'role_title'    => 'Workday HCM Consultant',
            'role_type'     => 'Full-time',
            'role_location' => 'London / Remote',
            'role_desc'     => 'Join our HCM practice working on post go-live optimisation, AMS retainers, and new implementations across financial services, professional services, and education.',
            'role_url'      => '#careers-form',
            'role_jd'       => "<strong>About the role</strong>\nWe're looking for a mid-to-senior Workday HCM Consultant to join our growing practice. You'll work directly with clients across the UK and EMEA, leading configuration workstreams and driving adoption.\n\n<strong>What you'll do</strong>\n&bull; Lead Workday HCM configuration across Core HCM, Absence, Compensation, and Talent\n&bull; Support post go-live clients on AMS retainers — resolving incidents, managing change requests, and owning quarterly optimisation roadmaps\n&bull; Contribute to new implementations as a senior configuration lead\n&bull; Work directly with client HR and IT stakeholders at director level\n\n<strong>What we're looking for</strong>\n&bull; 3+ years Workday HCM configuration experience (Core HCM essential; Absence/Compensation/Talent advantageous)\n&bull; UK client-facing consulting experience\n&bull; Strong communicator — comfortable presenting to senior stakeholders\n&bull; Workday Pro certifications desirable\n&bull; Right to work in the UK\n\n<strong>What we offer</strong>\n&bull; Competitive base salary benchmarked to your experience\n&bull; Fully remote with occasional client travel\n&bull; Direct exposure to senior leadership and real decision-making\n&bull; 25 days holiday + bank holidays",
        ],
        [
            'role_title'    => 'Workday Integration Developer',
            'role_type'     => 'Full-time',
            'role_location' => 'Remote / London',
            'role_desc'     => 'Build and maintain Workday integrations using Studio, EIB, and Prism for our AMS clients and implementation projects across multiple industries.',
            'role_url'      => '#careers-form',
            'role_jd'       => "<strong>About the role</strong>\nWe're looking for a Workday Integration Developer to own integration workstreams across AMS retainers and implementation projects. You'll design, build, and monitor integrations from requirements through to production.\n\n<strong>What you'll do</strong>\n&bull; Design, build, and maintain Workday Studio integrations and EIB templates\n&bull; Support Prism Analytics data integrations for reporting clients\n&bull; Own integration monitoring and incident response for AMS clients\n&bull; Collaborate with functional consultants and client IT teams on data mapping and testing\n\n<strong>What we're looking for</strong>\n&bull; 2+ years Workday integration development (Studio essential; BIRT/Prism advantageous)\n&bull; Strong understanding of REST/SOAP APIs and XML/XSLT\n&bull; Experience with Workday data models (Worker, Position, Financials)\n&bull; Right to work in the UK\n\n<strong>What we offer</strong>\n&bull; Competitive salary aligned to experience\n&bull; Remote-first with occasional client travel\n&bull; Technical mentorship from senior leads with 150+ project backgrounds\n&bull; 25 days holiday + bank holidays",
        ],
    ];
}
?>

<!-- Reading progress bar -->
<div id="progress" class="reading-progress" aria-hidden="true"></div>

<main id="main" tabindex="-1">


<!-- ════════════════════════════════════════════════════════════
     1. HERO
════════════════════════════════════════════════════════════ -->
<section class="page-hero-fullbg careers-hero">
  <img
    src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d?w=1400&h=613&q=75&auto=format&fit=crop"
    class="hero-bg-img-el"
    alt=""
    aria-hidden="true"
    loading="eager"
    decoding="async"
    width="1400" height="613">
  <div class="hero-overlay" aria-hidden="true"></div>
  <div class="container">
    <div class="careers-hero-inner">

      <div class="section-label reveal">
        <span class="section-label-line"></span>
        Careers at Zeneesha
      </div>

      <h1 class="svc-hero-title careers-headline reveal delay-1">
        <?php echo nl2br( esc_html( $headline ) ); ?>
      </h1>

      <p class="svc-ams-tagline careers-tagline reveal delay-2">
        <?php echo esc_html( $tagline ); ?>
      </p>

      <div class="svc-ams-ctas reveal delay-3">
        <a href="#careers-form" class="btn-primary">
          Send us your CV <?php echo z_arrow( 14 ); ?>
        </a>
      </div>

    </div>
  </div>
</section>


<!-- ════════════════════════════════════════════════════════════
     2. WHY ZENEESHA
════════════════════════════════════════════════════════════ -->
<section class="careers-why-section">
  <div class="container">

    <div class="careers-why-intro">
      <div class="section-label reveal">
        <span class="section-label-line" style="background:var(--navy)"></span>
        Why Zeneesha?
      </div>
      <h2 class="careers-why-heading reveal delay-1">A Small Team. Consequential Work.</h2>
      <p class="careers-why-sub reveal delay-2">
        We&rsquo;re a small team doing consequential work. Here&rsquo;s what that means for you.
      </p>
    </div>

    <div class="careers-why-grid">
      <?php foreach ( $why_cards as $i => $card ) :
        $d = ( $i % 2 ) * 80;
      ?>
        <div class="careers-why-card reveal" style="transition-delay:<?php echo esc_attr( $d ); ?>ms">
          <div class="careers-why-icon site-icon" style="color:<?php echo esc_attr( $card['color'] ); ?>">
            <?php echo $card['icon']; // phpcs:ignore ?>
          </div>
          <h3 class="careers-why-title"><?php echo esc_html( $card['title'] ); ?></h3>
          <p class="careers-why-desc"><?php echo wp_kses_post( $card['desc'] ); ?></p>
        </div>
      <?php endforeach; ?>
    </div>

  </div>
</section>


<!-- ════════════════════════════════════════════════════════════
     3. OPEN ROLES
════════════════════════════════════════════════════════════ -->
<section class="careers-roles-section">
  <div class="container">

    <div class="careers-roles-intro">
      <div class="section-label reveal">
        <span class="section-label-line" style="background:var(--navy)"></span>
        Current Openings
      </div>
      <h2 class="careers-roles-heading reveal delay-1">Roles We&rsquo;re Hiring For</h2>
    </div>

    <div class="careers-roles-list">
      <?php foreach ( $roles as $i => $role ) :
        $d = $i * 70;
        $role_title    = isset( $role['role_title'] )    ? $role['role_title']    : '';
        $role_type     = isset( $role['role_type'] )     ? $role['role_type']     : 'Full-time';
        $role_location = isset( $role['role_location'] ) ? $role['role_location'] : 'London / Remote';
        $role_desc     = isset( $role['role_desc'] )     ? $role['role_desc']     : '';
        $role_url      = isset( $role['role_url'] )      ? $role['role_url']      : '#careers-form';
        $role_jd       = isset( $role['role_jd'] )       ? $role['role_jd']       : '';
        $role_id       = 'role-' . $i;
      ?>
        <div class="careers-role-card reveal" style="transition-delay:<?php echo esc_attr( $d ); ?>ms">

          <div class="careers-role-header">
            <div class="careers-role-left">
              <div class="careers-role-meta">
                <span class="careers-role-type"><?php echo esc_html( $role_type ); ?></span>
                <span class="careers-role-location">
                  <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
                  <?php echo esc_html( $role_location ); ?>
                </span>
              </div>
              <h3 class="careers-role-title"><?php echo esc_html( $role_title ); ?></h3>
              <?php if ( $role_desc ) : ?>
                <p class="careers-role-desc"><?php echo esc_html( $role_desc ); ?></p>
              <?php endif; ?>
            </div>
            <div class="careers-role-cta">
              <a href="<?php echo esc_url( $role_url ); ?>"
                 class="btn-primary careers-apply-btn"
                 data-role="<?php echo esc_attr( $role_title ); ?>">
                Apply now <?php echo z_arrow( 14 ); ?>
              </a>
            </div>
          </div>

          <?php if ( $role_jd ) : ?>
            <div class="careers-role-jd-toggle">
              <button type="button" class="careers-jd-btn" aria-expanded="false" aria-controls="<?php echo esc_attr( $role_id ); ?>-jd">
                <svg class="careers-jd-chevron" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="6 9 12 15 18 9"/></svg>
                <span class="careers-jd-btn-label">View full role details</span>
              </button>
            </div>
            <div class="careers-role-jd" id="<?php echo esc_attr( $role_id ); ?>-jd" hidden>
              <div class="careers-role-jd-body">
                <?php echo nl2br( wp_kses( $role_jd, [ 'strong'=>[], 'em'=>[], 'br'=>[] ] ) ); // phpcs:ignore ?>
              </div>
              <div class="careers-role-jd-apply">
                <a href="<?php echo esc_url( $role_url ); ?>"
                   class="btn-primary careers-apply-btn"
                   data-role="<?php echo esc_attr( $role_title ); ?>">
                  Apply for this role <?php echo z_arrow( 14 ); ?>
                </a>
              </div>
            </div>
          <?php endif; ?>

        </div>
      <?php endforeach; ?>
    </div>

    <p class="careers-speculative reveal delay-2">
      <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="var(--sky2)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 6L9 17l-5-5"/></svg>
      Speculative applications are always welcome &mdash; <a href="#careers-form">send us your CV below</a>.
    </p>

  </div>
</section>


<!-- ════════════════════════════════════════════════════════════
     4. CV UPLOAD FORM
════════════════════════════════════════════════════════════ -->
<section id="careers-form" class="careers-form-section">
  <div class="container">
    <div class="careers-form-inner">

      <!-- Left: heading + context -->
      <div class="careers-form-copy">
        <div class="section-label reveal">
          <span class="section-label-line" style="background:var(--navy)"></span>
          Send Us Your CV
        </div>
        <h2 class="careers-form-heading reveal delay-1">Get on Our Radar</h2>
        <p class="careers-form-sub reveal delay-2">
          No openings that match? We keep all applications on file and reach out when the right opportunity arises.
        </p>
        <ul class="careers-form-perks reveal delay-3">
          <li>
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#10b981" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 6L9 17l-5-5"/></svg>
            All applications reviewed by a director
          </li>
          <li>
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#10b981" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 6L9 17l-5-5"/></svg>
            We reply to every application within 5 working days
          </li>
          <li>
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#10b981" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 6L9 17l-5-5"/></svg>
            Your data is held securely and never shared
          </li>
        </ul>
      </div>

      <!-- Right: form -->
      <div class="careers-form-wrap reveal delay-2">
        <form id="careers-contact-form" class="form--light" enctype="multipart/form-data" novalidate>
          <?php wp_nonce_field( 'zeneesha_careers_nonce', 'zeneesha_careers_nonce' ); ?>
          <input type="hidden" name="action" value="zeneesha_careers">

          <div class="form-row">
            <div class="form-group">
              <label class="field-label" for="careers_name">Name <span>*</span></label>
              <input class="form-input" type="text" id="careers_name" name="careers_name" placeholder="Your full name" required autocomplete="name">
            </div>
            <div class="form-group">
              <label class="field-label" for="careers_email">Email <span>*</span></label>
              <input class="form-input" type="email" id="careers_email" name="careers_email" placeholder="you@company.com" required autocomplete="email">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group">
              <label class="field-label" for="careers_phone">Phone</label>
              <input class="form-input" type="tel" id="careers_phone" name="careers_phone" placeholder="+44 ..." autocomplete="tel">
            </div>
            <div class="form-group">
              <label class="field-label" for="careers_role_interest">Role interest</label>
              <input class="form-input" type="text" id="careers_role_interest" name="careers_role_interest" placeholder="e.g. Workday HCM Consultant">
            </div>
          </div>

          <div class="form-group">
            <label class="field-label" for="careers_message">Cover note / message</label>
            <textarea class="form-input form-textarea" id="careers_message" name="careers_message" rows="4" placeholder="Tell us about yourself, your Workday experience, and what you're looking for..."></textarea>
          </div>

          <div class="form-group">
            <label class="field-label" for="careers_cv">
              CV / Resume
              <span class="field-label-hint">(PDF or DOC, max 5 MB)</span>
            </label>
            <label class="careers-file-wrap" for="careers_cv">
              <input class="careers-file-input" type="file" id="careers_cv" name="careers_cv" accept=".pdf,.doc,.docx">
              <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" y1="3" x2="12" y2="15"/></svg>
              <span class="careers-file-label">Choose file</span>
              <span class="careers-file-hint">or drag &amp; drop here (PDF or DOC, max 5 MB)</span>
            </label>
            <p class="careers-file-name" id="careers-file-name"></p>
          </div>

          <div class="form-group">
            <button type="submit" class="form-submit" id="careers-submit-btn">
              Send Application <?php echo z_arrow( 14 ); ?>
            </button>
          </div>

          <div id="careers-form-message" class="form-msg" role="alert" aria-live="polite"></div>

          <p class="form-privacy-note">
            By submitting this form you agree to us storing your details for recruitment purposes. We will never share your information with third parties. See our
            <a href="<?php echo esc_url( home_url( '/privacy-policy/' ) ); ?>">Privacy Policy</a>.
          </p>
        </form>
      </div>

    </div>
  </div>
</section>


</main>

<?php get_footer(); ?>
