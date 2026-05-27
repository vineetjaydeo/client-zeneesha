<?php
/**
 * Template Name: AMS & Support Page
 *
 * Rich design template for AMS & Support service page.
 * Default (no ?v): full infographic layout — form at end before footer.
 * ?v=1 : Problem-led  — form in fold 2.
 * ?v=2 : Outcome-led  — proof first, form at end.
 * ?v=3 : Methodology  — process steps, form at end.
 */

get_header();

// ── Variant: 0 = default rich layout, 1/2/3 = A/B ───────────
$v = isset( $_GET['v'] ) ? max( 1, min( 3, (int) $_GET['v'] ) ) : 0;

// ── ACF fields (with AMS-specific fallbacks) ─────────────────
$eyebrow     = zf( 'svc_eyebrow',      '02 — Stay operational' );
$description = zf( 'svc_description',  "Post go-live, Workday doesn't run itself. Releases land twice a year. Tickets arrive without warning. Without a named team watching your tenant, value quietly erodes." );
$color       = zf( 'svc_color',        '#3B9EDB' );
$outcomes_raw= zf( 'svc_outcomes',     '' );
$pain_raw    = zf( 'svc_pain_points',  '' );
$process_raw = zf( 'svc_process_steps','');
$cs_metric   = zf( 'svc_cs_metric',   '' );
$cs_client   = zf( 'svc_cs_client',   '' );
$cs_result   = zf( 'svc_cs_result',   '' );

$outcomes      = array_filter( array_map( 'trim', explode( "\n", $outcomes_raw ) ) );
$pain_points   = array_filter( array_map( 'trim', explode( "\n", $pain_raw ) ) );
$process_steps = array_filter( array_map( 'trim', explode( "\n", $process_raw ) ) );

$title = get_the_title();
$slug  = 'ams-support';

// ── V1 fallback pain points ───────────────────────────────────
$default_pain = [
    'Your team is still firefighting the same Workday issues sprint after sprint.',
    'Every release creates a backlog of untested changes and unplanned work.',
    'Workday capabilities your business paid for remain switched off or misconfigured.',
    'Business decisions are made without reliable data because reporting has not kept pace.',
];

// ── V3 fallback process steps ─────────────────────────────────
$default_process = [
    [ 'title' => 'Onboarding',       'desc' => 'We take handover of your tenant, review configuration, agree SLAs, and introduce the named team members who will manage your Workday environment.' ],
    [ 'title' => 'BAU Support',      'desc' => 'Day-to-day ticket triage and resolution, release monitoring, and a monthly check-in to keep your environment stable and your team unblocked.' ],
    [ 'title' => 'Quarterly Sprint', 'desc' => 'Every three months we run a focused sprint to improve configuration, clean data, and adopt features from the latest Workday release.' ],
    [ 'title' => 'Annual Review',    'desc' => 'A full performance review, roadmap planning session, and contract renewal discussion to set priorities for the year ahead.' ],
];

// ── AMS Scope cards (hardcoded — AMS specific) ───────────────
$scope_cards = [
    [
        'icon'    => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>',
        'title'   => 'Release Management',
        'desc'    => "Workday's two annual releases managed end to end — so your team is never caught off-guard by untested changes.",
        'bullets' => [ 'Regression testing', 'Feature impact review', 'Release readiness sign-off', 'Adoption planning' ],
        'counter' => '01 / 04',
    ],
    [
        'icon'    => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 18v-6a9 9 0 0118 0v6"/><path d="M21 19a2 2 0 01-2 2h-1a2 2 0 01-2-2v-3a2 2 0 012-2h3zM3 19a2 2 0 002 2h1a2 2 0 002-2v-3a2 2 0 00-2-2H3z"/></svg>',
        'title'   => 'Helpdesk & Ticket Support',
        'desc'    => 'Tier 1 and 2 support handled by named Workday consultants. No call centres. No queues. No handoffs to someone who has never seen your tenant.',
        'bullets' => [ 'Break-fix resolution', 'Configuration changes', 'Escalation management', 'User support queries' ],
        'counter' => '02 / 04',
    ],
    [
        'icon'    => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/><polyline points="17 6 23 6 23 12"/></svg>',
        'title'   => 'Optimisation Sprints',
        'desc'    => 'Quarterly sprints that improve your configuration, clean data, and drive adoption of features your business has already paid for.',
        'bullets' => [ 'Sprint planning', 'Config improvements', 'Data quality work', 'Feature adoption' ],
        'counter' => '03 / 04',
    ],
    [
        'icon'    => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg>',
        'title'   => 'Analytics & Reporting',
        'desc'    => 'One version of the number. Prism datasets, custom dashboards, and management reports your leadership team actually trusts on Monday mornings.',
        'bullets' => [ 'Prism datasets', 'Custom dashboards', 'Management report suite', 'Self-service governance' ],
        'counter' => '04 / 04',
    ],
];

// ── Rhythm phases (infographic — hardcoded) ───────────────────
$rhythm_phases = [
    [
        'icon'   => '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 16V8a2 2 0 00-1-1.73l-7-4a2 2 0 00-2 0l-7 4A2 2 0 003 8v8a2 2 0 001 1.73l7 4a2 2 0 002 0l7-4A2 2 0 0021 16z"/></svg>',
        'label'  => 'Onboarding',
        'period' => 'Weeks 1 – 2',
        'items'  => [ 'Tenant handover', 'Knowledge transfer', 'SLA agreed' ],
    ],
    [
        'icon'   => '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>',
        'label'  => 'BAU Support',
        'period' => 'Ongoing',
        'items'  => [ 'Ticket resolution', 'Release monitoring', 'Monthly check-in' ],
    ],
    [
        'icon'   => '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>',
        'label'  => 'Quarterly Sprint',
        'period' => 'Every 3 months',
        'items'  => [ 'Sprint planning', 'Config &amp; data work', 'Adoption review' ],
    ],
    [
        'icon'   => '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="8" r="6"/><path d="M15.477 12.89L17 22l-5-3-5 3 1.523-9.11"/></svg>',
        'label'  => 'Annual Review',
        'period' => 'Year-end',
        'items'  => [ 'Performance review', 'Roadmap planning', 'Contract renewal' ],
    ],
];
?>

<!-- Reading progress bar -->
<div id="progress" class="reading-progress" aria-hidden="true"></div>

<main id="main" tabindex="-1" style="--svc-color:<?php echo esc_attr( $color ); ?>">


<?php if ( $v === 0 ) : ?>
<!-- ════════════════════════════════════════════════════════════
     DEFAULT — Full rich layout, form at end
════════════════════════════════════════════════════════════ -->

<!-- HERO: content left + typical shape right ──────────────── -->
<section class="page-hero-fullbg svc-ams-hero">
  <img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?w=1400&q=60&auto=format&fit=crop" class="svc-hero-bg-img" alt="" aria-hidden="true" loading="eager" decoding="async" width="1400" height="613">
  <div class="hero-overlay" aria-hidden="true"></div>
  <div class="svc-hero-blobs" aria-hidden="true">
    <div class="svc-hero-blob svc-hero-blob--1" data-parallax="0.14" style="background:<?php echo esc_attr( $color ); ?>12"></div>
    <div class="svc-hero-blob svc-hero-blob--2" data-parallax="0.07"></div>
  </div>
  <div class="container">
    <div class="svc-ams-hero-split">

      <!-- Left: headline + description + CTAs -->
      <div class="svc-ams-hero-left hero-relative">
        <div class="svc-hero-eyebrow reveal">
          <span class="status-dot"></span>
          <span class="svc-num">02</span>
          <span style="opacity:.35">/</span>
          <?php echo esc_html( $eyebrow ); ?>
        </div>

        <h1 class="svc-hero-title reveal delay-1"><?php echo esc_html( $title ); ?></h1>

        <p class="svc-ams-tagline reveal delay-2"><?php echo esc_html( $description ); ?></p>

        <div class="svc-ams-ctas reveal delay-3">
          <a href="#ams-form" class="btn-primary">
            Book a Health Check <?php echo z_arrow( 14 ); ?>
          </a>
          <a href="#ams-scope" class="btn-ghost">
            See what's covered <?php echo z_arrow( 14 ); ?>
          </a>
        </div>

        <p class="svc-ams-note reveal delay-4">
          <svg width="6" height="6" viewBox="0 0 6 6" aria-hidden="true"><circle cx="3" cy="3" r="3" fill="#10b981"/></svg>
          Booking Q3 engagements &nbsp;&middot;&nbsp; Typical reply within one working day
        </p>
      </div>

      <!-- Right: typical shape panel -->
      <div class="svc-typical-shape reveal delay-2">
        <div class="svc-shape-header">Typical Shape</div>
        <div class="svc-shape-row">
          <span class="svc-shape-key">Duration</span>
          <span class="svc-shape-val">Rolling, 12-month minimum</span>
        </div>
        <div class="svc-shape-row">
          <span class="svc-shape-key">Team</span>
          <span class="svc-shape-val">Named partner&nbsp;+ dedicated consultant</span>
        </div>
        <div class="svc-shape-row">
          <span class="svc-shape-key">SLA</span>
          <span class="svc-shape-val">4-hour response, next business day resolution</span>
        </div>
        <div class="svc-shape-row">
          <span class="svc-shape-key">Cadence</span>
          <span class="svc-shape-val">Monthly check-in, quarterly optimisation sprint</span>
        </div>
      </div>

    </div>
  </div>
</section>


<!-- SCOPE: 2×2 deliverable cards ──────────────────────────── -->
<section id="ams-scope" class="svc-scope-section">
  <div class="container">

    <div class="svc-scope-intro">
      <div>
        <div class="section-label reveal" style="color:<?php echo esc_attr( $color ); ?>">
          <span class="section-label-line" style="background:<?php echo esc_attr( $color ); ?>"></span>
          01 &middot; Scope
        </div>
        <h2 class="svc-scope-heading reveal delay-1">What&rsquo;s covered,<br>end to end.</h2>
      </div>
      <p class="svc-scope-sub reveal delay-1">A real AMS engagement, not a ticket queue. Every area of your Workday tenant covered by a team that is named on your contract.</p>
    </div>

    <div class="svc-scope-grid">
      <?php foreach ( $scope_cards as $i => $card ) : ?>
        <div class="svc-scope-card reveal" style="transition-delay:<?php echo $i * 80; ?>ms">
          <div class="svc-scope-card-top">
            <div class="svc-scope-icon"><?php echo $card['icon']; // phpcs:ignore ?></div>
            <span class="svc-scope-counter"><?php echo esc_html( $card['counter'] ); ?></span>
          </div>
          <h3 class="svc-scope-title"><?php echo esc_html( $card['title'] ); ?></h3>
          <p class="svc-scope-desc"><?php echo esc_html( $card['desc'] ); ?></p>
          <div class="svc-scope-sep"></div>
          <div class="svc-scope-bullets">
            <?php foreach ( $card['bullets'] as $b ) : ?>
              <span class="svc-scope-bullet"><?php echo esc_html( $b ); ?></span>
            <?php endforeach; ?>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

  </div>
</section>


<!-- STATS BAND ─────────────────────────────────────────────── -->
<section class="svc-stats-band" aria-label="AMS outcomes at a glance">
  <div class="container">
    <div class="svc-stats-row">
      <div class="svc-stat reveal">
        <div class="svc-stat-top">
          <span class="svc-stat-num" data-count="700">700</span><span class="svc-stat-suffix">%</span>
        </div>
        <span class="svc-stat-label">Faster ticket resolution</span>
        <span class="svc-stat-source">AQA Education</span>
      </div>
      <div class="svc-stat-div"></div>
      <div class="svc-stat reveal delay-1">
        <div class="svc-stat-top">
          <span class="svc-stat-num" data-count="90">90</span><span class="svc-stat-suffix"> days</span>
        </div>
        <span class="svc-stat-label">Backlog cleared</span>
        <span class="svc-stat-source">AQA Education</span>
      </div>
      <div class="svc-stat-div"></div>
      <div class="svc-stat reveal delay-2">
        <div class="svc-stat-top">
          <span class="svc-stat-num" data-count="95">95</span><span class="svc-stat-suffix">%</span>
        </div>
        <span class="svc-stat-label">Platform adoption</span>
        <span class="svc-stat-source">AQA Education</span>
      </div>
    </div>
  </div>
</section>


<!-- RHYTHM: horizontal timeline infographic ────────────────── -->
<section class="svc-rhythm-section">
  <div class="container">

    <div class="svc-rhythm-intro">
      <div class="section-label reveal" style="color:<?php echo esc_attr( $color ); ?>">
        <span class="section-label-line" style="background:<?php echo esc_attr( $color ); ?>"></span>
        02 &middot; Rhythm
      </div>
      <h2 class="svc-rhythm-heading reveal delay-1">Your support rhythm.</h2>
      <p class="svc-rhythm-sub reveal delay-2">Not reactive firefighting. A structured cadence that keeps your Workday tenant stable, current, and improving — month after month.</p>
    </div>

    <div class="svc-rhythm-wrap reveal delay-1">
      <div class="svc-rhythm-line" aria-hidden="true"></div>
      <div class="svc-rhythm-track">
        <?php foreach ( $rhythm_phases as $ph ) : ?>
          <div class="svc-rhythm-phase">
            <div class="svc-rhythm-dot">
              <?php echo $ph['icon']; // phpcs:ignore ?>
            </div>
            <div class="svc-rhythm-label"><?php echo esc_html( $ph['label'] ); ?></div>
            <div class="svc-rhythm-period"><?php echo esc_html( $ph['period'] ); ?></div>
            <ul class="svc-rhythm-items">
              <?php foreach ( $ph['items'] as $item ) : ?>
                <li class="svc-rhythm-item"><?php echo wp_kses_post( $item ); ?></li>
              <?php endforeach; ?>
            </ul>
          </div>
        <?php endforeach; ?>
      </div>
    </div>

  </div>
</section>


<!-- CLIENT OUTCOME ─────────────────────────────────────────── -->
<?php if ( $cs_metric || $cs_client || $cs_result ) : ?>
<section class="svc-v2-cs-section" style="background:var(--cream2)">
  <div class="container">
    <div class="svc-v2-cs-panel reveal" style="border-top-color:<?php echo esc_attr( $color ); ?>">
      <div>
        <div class="section-label" style="color:<?php echo esc_attr( $color ); ?>;margin-bottom:1.5rem">
          <span class="section-label-line" style="background:<?php echo esc_attr( $color ); ?>"></span>
          03 &middot; Outcome
        </div>
        <?php if ( $cs_client ) : ?><div class="cs-client-badge"><?php echo esc_html( $cs_client ); ?></div><?php endif; ?>
        <?php if ( $cs_metric ) : ?><div class="svc-v2-big-metric reveal delay-1" style="color:<?php echo esc_attr( $color ); ?>"><?php echo esc_html( $cs_metric ); ?></div><?php endif; ?>
        <?php if ( $cs_result ) : ?><p class="svc-v2-cs-body reveal delay-2"><?php echo esc_html( $cs_result ); ?></p><?php endif; ?>
      </div>
      <?php if ( $outcomes ) : ?>
      <div>
        <div class="section-label reveal" style="margin-bottom:1.25rem">
          <span class="section-label-line" style="background:var(--slate2)"></span>
          What changes
        </div>
        <ul class="svc-outcomes-list">
          <?php foreach ( $outcomes as $o ) : ?>
            <li class="svc-outcome-item reveal">
              <span class="svc-outcome-dot" style="background:<?php echo esc_attr( $color ); ?>"><?php echo z_check( 10 ); ?></span>
              <span><?php echo esc_html( $o ); ?></span>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
      <?php endif; ?>
    </div>
  </div>
</section>
<?php endif; ?>


<?php elseif ( $v === 1 ) : ?>
<!-- ════════════════════════════════════════════════════════════
     V1 — PROBLEM-LED  |  Form in fold 2
════════════════════════════════════════════════════════════ -->

<section class="svc-hero" style="--svc-color:<?php echo esc_attr( $color ); ?>">
  <div class="svc-hero-blobs" aria-hidden="true">
    <div class="svc-hero-blob svc-hero-blob--1" style="background:<?php echo esc_attr( $color ); ?>12"></div>
    <div class="svc-hero-blob svc-hero-blob--2"></div>
  </div>
  <div class="container">
    <div class="svc-hero-inner">
      <div class="svc-hero-eyebrow reveal">
        <span class="status-dot"></span>
        <span class="svc-num">02</span><span style="opacity:.35">/</span>
        <?php echo esc_html( $eyebrow ); ?>
      </div>
      <h1 class="svc-hero-title reveal delay-1"><?php echo esc_html( $title ); ?></h1>
      <p class="svc-v1-hook reveal delay-2">Most organisations live with the same Workday issues for months before they become expensive. See if any of these sound familiar.</p>
      <a href="#svc-form" class="svc-v1-anchor reveal delay-3">See if this applies to you <?php echo z_arrow( 14 ); ?></a>
    </div>
  </div>
</section>

<section class="svc-v1-body" id="svc-form">
  <div class="container">
    <div class="svc-v1-split">
      <div>
        <div class="section-label reveal" style="color:<?php echo esc_attr( $color ); ?>;margin-bottom:1.75rem">
          <span class="section-label-line" style="background:<?php echo esc_attr( $color ); ?>"></span>
          Sound familiar?
        </div>
        <ul class="svc-pain-list">
          <?php $pts = $pain_points ?: $default_pain;
          foreach ( $pts as $i => $p ) : ?>
            <li class="svc-pain-item reveal" style="transition-delay:<?php echo $i * 80; ?>ms">
              <span class="svc-pain-dot"></span>
              <span><?php echo esc_html( $p ); ?></span>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
      <div class="reveal delay-2">
        <div class="svc-v1-form-wrap">
          <div class="svc-v1-form-label">Book a complimentary health check</div>
          <p class="svc-v1-form-sub">60 minutes. No cost. A clear picture of what needs fixing.</p>
          <form id="cta-contact-form" class="form--light" novalidate>
            <div class="form-row">
              <div>
                <label class="field-label" for="contact_name">Name <span>*</span></label>
                <input class="form-input" type="text" id="contact_name" name="contact_name" placeholder="Your full name" required autocomplete="name">
              </div>
              <div>
                <label class="field-label" for="contact_phone">Phone</label>
                <input class="form-input" type="tel" id="contact_phone" name="contact_phone" placeholder="+44 ..." autocomplete="tel">
              </div>
            </div>
            <div class="form-group">
              <label class="field-label" for="contact_email">Work email <span>*</span></label>
              <input class="form-input" type="email" id="contact_email" name="contact_email" placeholder="you@company.com" required autocomplete="email">
            </div>
            <div class="form-group">
              <label class="field-label" for="contact_message">Main challenge?</label>
              <textarea class="form-input form-textarea" id="contact_message" name="contact_message" rows="3" placeholder="Briefly describe your current Workday situation..."></textarea>
            </div>
            <div class="form-group">
              <button type="submit" class="form-submit">Book My Health Check <?php echo z_arrow( 14 ); ?></button>
            </div>
            <div id="form-message" class="form-msg" role="alert"></div>
          </form>
          <p class="svc-v1-form-note">
            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="#10b981" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 6L9 17l-5-5"/></svg>
            No cost &middot; No obligation &middot; Typical reply within one working day
          </p>
        </div>
      </div>
    </div>
  </div>
</section>


<?php elseif ( $v === 2 ) : ?>
<!-- ════════════════════════════════════════════════════════════
     V2 — OUTCOME-LED  |  Proof first
════════════════════════════════════════════════════════════ -->

<section class="svc-hero" style="--svc-color:<?php echo esc_attr( $color ); ?>">
  <div class="svc-hero-blobs" aria-hidden="true">
    <div class="svc-hero-blob svc-hero-blob--1" style="background:<?php echo esc_attr( $color ); ?>12"></div>
    <div class="svc-hero-blob svc-hero-blob--2"></div>
  </div>
  <div class="container">
    <div class="svc-hero-inner">
      <div class="svc-hero-eyebrow reveal">
        <span class="status-dot"></span>
        <span class="svc-num">02</span><span style="opacity:.35">/</span>
        <?php echo esc_html( $eyebrow ); ?>
      </div>
      <?php if ( $cs_metric ) : ?>
        <div class="svc-v2-metric reveal delay-1" style="color:<?php echo esc_attr( $color ); ?>"><?php echo esc_html( $cs_metric ); ?></div>
        <h1 class="svc-v2-metric-sub reveal delay-2"><?php echo esc_html( $title ); ?></h1>
        <?php if ( $cs_result ) : ?><p class="svc-v2-proof reveal delay-3"><?php echo esc_html( $cs_result ); ?></p><?php endif; ?>
      <?php else : ?>
        <h1 class="svc-hero-title reveal delay-1"><?php echo esc_html( $title ); ?></h1>
        <p class="svc-ams-tagline reveal delay-2"><?php echo esc_html( $description ); ?></p>
      <?php endif; ?>
      <div class="reveal delay-3" style="margin-top:1.75rem">
        <a href="#talk" class="svc-btn-primary">See how we deliver this <?php echo z_arrow( 14 ); ?></a>
      </div>
    </div>
  </div>
</section>

<?php if ( $cs_metric || $cs_client || $cs_result ) : ?>
<section class="svc-v2-cs-section">
  <div class="container">
    <div class="svc-v2-cs-panel reveal" style="border-top-color:<?php echo esc_attr( $color ); ?>">
      <div>
        <div class="section-label" style="color:<?php echo esc_attr( $color ); ?>;margin-bottom:1.5rem">
          <span class="section-label-line" style="background:<?php echo esc_attr( $color ); ?>"></span>
          Proven result
        </div>
        <?php if ( $cs_client ) : ?><div class="cs-client-badge"><?php echo esc_html( $cs_client ); ?></div><?php endif; ?>
        <?php if ( $cs_metric ) : ?><div class="svc-v2-big-metric reveal" style="color:<?php echo esc_attr( $color ); ?>"><?php echo esc_html( $cs_metric ); ?></div><?php endif; ?>
        <?php if ( $cs_result ) : ?><p class="svc-v2-cs-body reveal delay-1"><?php echo esc_html( $cs_result ); ?></p><?php endif; ?>
      </div>
      <?php if ( $outcomes ) : ?>
      <div>
        <div class="section-label reveal" style="margin-bottom:1.25rem">
          <span class="section-label-line" style="background:var(--slate2)"></span>
          What you get
        </div>
        <ul class="svc-outcomes-list">
          <?php foreach ( $outcomes as $o ) : ?>
            <li class="svc-outcome-item reveal">
              <span class="svc-outcome-dot" style="background:<?php echo esc_attr( $color ); ?>"><?php echo z_check( 10 ); ?></span>
              <span><?php echo esc_html( $o ); ?></span>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
      <?php endif; ?>
    </div>
  </div>
</section>
<?php endif; ?>


<?php else : ?>
<!-- ════════════════════════════════════════════════════════════
     V3 — METHODOLOGY-LED  |  Process steps
════════════════════════════════════════════════════════════ -->

<section class="svc-hero" style="--svc-color:<?php echo esc_attr( $color ); ?>">
  <div class="svc-hero-blobs" aria-hidden="true">
    <div class="svc-hero-blob svc-hero-blob--1" style="background:<?php echo esc_attr( $color ); ?>12"></div>
    <div class="svc-hero-blob svc-hero-blob--2"></div>
  </div>
  <div class="container">
    <div class="svc-hero-inner">
      <div class="svc-hero-eyebrow reveal">
        <span class="status-dot"></span>
        <span class="svc-num">02</span><span style="opacity:.35">/</span>
        <?php echo esc_html( $eyebrow ); ?>
      </div>
      <h1 class="svc-hero-title reveal delay-1"><?php echo esc_html( $title ); ?></h1>
      <p class="svc-v3-hook reveal delay-2" style="color:<?php echo esc_attr( $color ); ?>">A structured approach. Measurable outcomes. No ambiguity.</p>
      <p class="svc-v3-desc reveal delay-3"><?php echo esc_html( $description ); ?></p>
    </div>
  </div>
</section>

<section class="svc-v3-process">
  <div class="container">
    <div class="section-label reveal" style="color:<?php echo esc_attr( $color ); ?>;margin-bottom:.5rem">
      <span class="section-label-line" style="background:<?php echo esc_attr( $color ); ?>"></span>
      How it works
    </div>
    <ol class="svc-process-list">
      <?php if ( $process_steps ) :
        $i = 1;
        foreach ( $process_steps as $step ) : ?>
          <li class="svc-process-step reveal" style="transition-delay:<?php echo $i * 70; ?>ms">
            <span class="svc-process-num" style="color:<?php echo esc_attr( $color ); ?>"><?php printf( '%02d', $i ); ?></span>
            <div><span class="svc-process-title"><?php echo esc_html( $step ); ?></span></div>
          </li>
        <?php $i++; endforeach;
      else :
        foreach ( $default_process as $i => $s ) : ?>
          <li class="svc-process-step reveal" style="transition-delay:<?php echo $i * 70; ?>ms">
            <span class="svc-process-num" style="color:<?php echo esc_attr( $color ); ?>"><?php printf( '%02d', $i + 1 ); ?></span>
            <div>
              <span class="svc-process-title"><?php echo esc_html( $s['title'] ); ?></span>
              <p class="svc-process-desc"><?php echo esc_html( $s['desc'] ); ?></p>
            </div>
          </li>
        <?php endforeach;
      endif; ?>
    </ol>
  </div>
</section>

<?php endif; ?>


<!-- ════════════════════════════════════════════════════════════
     SCOPE CARDS — shown in all variants (after variant-specific fold)
     Hidden in default ($v=0) as it's already above ════════════════════════════════════════════════════════════ -->
<?php if ( $v !== 0 ) : ?>
<section id="ams-scope" class="svc-scope-section" style="--svc-color:<?php echo esc_attr( $color ); ?>">
  <div class="container">
    <div class="svc-scope-intro">
      <div>
        <div class="section-label reveal" style="color:<?php echo esc_attr( $color ); ?>">
          <span class="section-label-line" style="background:<?php echo esc_attr( $color ); ?>"></span>
          What&rsquo;s covered
        </div>
        <h2 class="svc-scope-heading reveal delay-1">Everything your Workday<br>tenant needs.</h2>
      </div>
      <p class="svc-scope-sub reveal delay-1">A named team. A clear scope. Every area covered from the day you sign.</p>
    </div>
    <div class="svc-scope-grid">
      <?php foreach ( $scope_cards as $i => $card ) : ?>
        <div class="svc-scope-card reveal" style="transition-delay:<?php echo $i * 80; ?>ms">
          <div class="svc-scope-card-top">
            <div class="svc-scope-icon"><?php echo $card['icon']; // phpcs:ignore ?></div>
            <span class="svc-scope-counter"><?php echo esc_html( $card['counter'] ); ?></span>
          </div>
          <h3 class="svc-scope-title"><?php echo esc_html( $card['title'] ); ?></h3>
          <p class="svc-scope-desc"><?php echo esc_html( $card['desc'] ); ?></p>
          <div class="svc-scope-sep"></div>
          <div class="svc-scope-bullets">
            <?php foreach ( $card['bullets'] as $b ) : ?>
              <span class="svc-scope-bullet"><?php echo esc_html( $b ); ?></span>
            <?php endforeach; ?>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>


<!-- ════════════════════════════════════════════════════════════
     LIFECYCLE STRIP — shared, preserves ?v= across pages
════════════════════════════════════════════════════════════ -->
<section class="svc-lifecycle">
  <div class="container">
    <div class="svc-lifecycle-inner">
      <div class="section-label reveal" style="justify-content:center;color:var(--redorange);margin-bottom:.75rem">
        <span class="section-label-line" style="background:var(--redorange)"></span>
        The Bigger Picture
        <span class="section-label-line" style="background:var(--redorange)"></span>
      </div>
      <p class="svc-lifecycle-text reveal delay-1">
        Each Zeneesha service builds on the last.
        Implementation feeds clean data into AMS &amp; Support.
        AMS &amp; Support stabilises the platform for Maximise.
        Maximise unlocks the full return on your Workday investment.
      </p>
      <div class="svc-lifecycle-nodes reveal delay-2">
        <?php
        $nodes = [
          [ 'num' => '01', 'label' => 'Implementation', 'color' => '#1E3A8A', 'slug' => 'implementation' ],
          [ 'num' => '02', 'label' => 'AMS &amp; Support',  'color' => '#3B9EDB', 'slug' => 'ams-support' ],
          [ 'num' => '03', 'label' => 'Maximise',           'color' => '#F57C1F', 'slug' => 'maximise' ],
        ];
        foreach ( $nodes as $n ) :
          $is_current = ( $slug === $n['slug'] );
        ?>
          <a href="<?php echo esc_url( home_url( '/' . $n['slug'] . '/' ) ); ?><?php echo $v > 0 ? '?v=' . $v : ''; ?>"
             class="svc-lifecycle-node<?php echo $is_current ? ' is-current' : ''; ?>"
             style="--node-color:<?php echo esc_attr( $n['color'] ); ?>">
            <span class="svc-node-circle" style="background:<?php echo esc_attr( $n['color'] ); ?>"><?php echo esc_html( $n['num'] ); ?></span>
            <span class="svc-node-label"><?php echo wp_kses_post( $n['label'] ); ?></span>
          </a>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>


<!-- ════════════════════════════════════════════════════════════
     CTA FORM BAND — default (0), v2, v3 only
     (v1 has form embedded in fold 2 above)
════════════════════════════════════════════════════════════ -->
<?php if ( $v !== 1 ) : ?>
<section id="ams-form" class="section-cta">

  <div aria-hidden="true" style="position:absolute;inset:0;overflow:hidden;pointer-events:none">
    <div class="cta-blob-1"></div>
    <div class="cta-blob-2"></div>
  </div>

  <div class="cta-inner" id="talk">
    <div>
      <div class="section-label reveal cta-label">
        <span class="section-label-line" style="background:var(--redorange)"></span>
        Complimentary Health Check
      </div>
      <h2 class="cta-heading reveal delay-1">
        Your Complimentary Workday Health Check.
        <span> No Obligation.</span>
      </h2>
      <p class="cta-body reveal delay-2">
        In 60 minutes we&rsquo;ll review your Workday setup and give you a clear picture of where value is being lost, and how to recover it.
      </p>
      <div class="cta-note reveal delay-3">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#10b981" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 6L9 17l-5-5"/></svg>
        No cost &middot; No obligation &middot; Typical reply within one working day
      </div>
    </div>

    <div class="reveal delay-3">
      <div class="cta-form-wrap">
        <div class="cta-form-label">Send a message</div>
        <form id="cta-contact-form" novalidate>
          <div class="form-row">
            <div>
              <label class="field-label" for="contact_name">Name <span>*</span></label>
              <input class="form-input" type="text" id="contact_name" name="contact_name" placeholder="Your full name" required autocomplete="name">
            </div>
            <div>
              <label class="field-label" for="contact_phone">Phone</label>
              <input class="form-input" type="tel" id="contact_phone" name="contact_phone" placeholder="+44 ..." autocomplete="tel">
            </div>
          </div>
          <div class="form-group">
            <label class="field-label" for="contact_email">Email <span>*</span></label>
            <input class="form-input" type="email" id="contact_email" name="contact_email" placeholder="you@company.com" required autocomplete="email">
          </div>
          <div class="form-group">
            <label class="field-label" for="contact_message">Message</label>
            <textarea class="form-input form-textarea" id="contact_message" name="contact_message" rows="4" placeholder="Tell us about your Workday environment..."></textarea>
          </div>
          <div class="form-group">
            <button type="submit" class="form-submit">
              Book My Complimentary Health Check <?php echo z_arrow( 14 ); ?>
            </button>
          </div>
          <div id="form-message" class="form-msg" role="alert"></div>
        </form>
      </div>
    </div>
  </div>

</section>
<?php endif; ?>


</main>

<?php get_footer(); ?>
