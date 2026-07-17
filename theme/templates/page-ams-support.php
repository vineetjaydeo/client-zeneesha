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
$eyebrow     = zf( 'svc_eyebrow',      'Workday AMS & Support Services' );
$description = zf( 'svc_description',  "Your Workday implementation is live, but if your team is drowning in support tickets, you are not getting the ROI you paid for. We handle the heavy lifting so your team can move from reactive firefighting to proactive optimisation." );
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
        'desc'    => "Workday's two annual releases managed end to end - so your team is never caught off-guard by untested changes.",
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
        'period' => 'Weeks 1 - 2',
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

$ams_framework = [
    [
        'num' => '01',
        'kicker' => 'Stop Chasing Issues',
        'title' => 'Stabilise',
        'body' => 'We immediately reduce your operational risk by untangling fragile integrations, fixing stuck Business Processes (BPs), and clearing the overwhelming ticket backlog that is draining your internal team.',
    ],
    [
        'num' => '02',
        'kicker' => 'Eliminate the Technical Debt',
        'title' => 'Optimise',
        'body' => 'We reverse configuration drift by securing your tangled security domains, simplifying complex calculated fields to speed up reporting, and removing the system friction that causes low user adoption.',
    ],
    [
        'num' => '03',
        'kicker' => 'Drive the ROI',
        'title' => 'Evolve',
        'body' => "We shift your system from reactive maintenance to proactive growth. By safely managing Workday's biannual releases and rolling out new modules, we ensure the platform scales smoothly with your business without disrupting existing processes.",
    ],
];

$ams_case_studies = [
    [
        'title' => 'Continuous Security & Workflow Optimisation',
        'body' => 'Delivered agile functional support across complex multi-tenant environments, optimising security configurations and automating business processes. Replaced cumbersome custom setups with rule-based security to ensure ongoing data compliance.',
    ],
    [
        'title' => '100% Business Continuity During Leadership Transition',
        'body' => 'Managed the Workday production support team during a critical leadership absence. Ensured seamless execution of high-stakes year-end compensation and performance cycles while maintaining full team velocity and closing pending technical debt.',
    ],
];

$ams_failure_points = [
    [ 'title' => 'The Ticket Backlog Trap', 'body' => 'If your Business Processes (BPs) are over-engineered with too much conditional logic, approval routings get stuck in endless loops. Internal teams get overwhelmed with daily fixes, causing strategic improvements to stall.' ],
    [ 'title' => 'Stagnant ROI & System Bloat', 'body' => 'Building reports by endlessly stacking complex Calculated Fields degrades system performance and causes reports to time out. Executives lose trust in the data, and you miss out on new capabilities.' ],
    [ 'title' => 'User Rebellion & Shadow IT', 'body' => 'When custom Workday Studio integrations or EIBs break due to downstream vendor updates, critical data gaps appear. Frustrated employees give up on the system and return to manual spreadsheets.' ],
    [ 'title' => 'Governance & Security Risks', 'body' => 'Making quick, undocumented patches directly in production creates Configuration Drift. Your Security Groups become a tangled maze, triggering compliance risks and making bi-annual updates dangerous to test.' ],
];

$ams_faqs = [
    [ 'q' => 'What is AMS?', 'a' => 'Application Management Services (AMS) is how we ensure your system keeps working operationally, strategically, and efficiently, without the cost of an oversized in-house team. We provide the exact flexibility you need, applying a proven framework to continually optimise your tenant.' ],
    [ 'q' => 'What does a Workday AMS partner do?', 'a' => 'An AMS partner provides ongoing technical and strategic support, handling everything from daily break-fix tickets to bi-annual release testing, change management, and long-term system Optimisation.' ],
    [ 'q' => 'We just went live. Do we really need AMS right now?', 'a' => 'Yes. The period immediately following go-live (Hypercare) is when users struggle the most, and technical debt begins to accumulate rapidly. Immediate, structured support ensures smooth adoption and system stability.' ],
    [ 'q' => 'What causes Workday support models to fail?', 'a' => 'Common causes include treating support purely as an IT helpdesk ticketing system, failing to strategically manage bi-annual Workday releases, and ignoring continuous user training.' ],
    [ 'q' => 'Can you help us fix a system that was poorly implemented?', 'a' => 'Absolutely. Our Optimisation services are explicitly designed to untangle complex, broken configurations and align the system back to your real-world business processes.' ],
    [ 'q' => 'Is it difficult to transition to a new AMS provider?', 'a' => 'Not at all. We utilise a structured onboarding process to audit your current tenant, document existing configurations, and seamlessly take over support without operational disruption.' ],
];

$ams_dial_items = [
    [
        'label' => 'Application Management (AMS)',
        'title' => 'Application Management (AMS)',
        'body'  => 'We provide proactive day-to-day Workday support, resolving issues, monitoring system health, and recommending continuous improvements to keep your tenant performing at its best.',
    ],
    [
        'label' => 'System Health Check & Advisory',
        'title' => 'System Health Check & Advisory',
        'body'  => 'We conduct a deep-dive assessment of your setup to uncover inefficiencies and underutilised capabilities. You receive a practical, clear roadmap for immediate system optimisation.',
    ],
    [
        'label' => 'Continuous Optimisation & Enhancements',
        'title' => 'Continuous Optimisation & Enhancements',
        'body'  => 'As your business evolves, so should your Workday. We continuously refine business processes, configure new capabilities, and implement enhancements that maximise value.',
    ],
    [
        'label' => 'Adoption & Governance',
        'title' => 'Adoption & Governance',
        'body'  => 'We help establish governance, improve user adoption, and ensure Workday is used consistently and effectively across your organisation.',
    ],
    [
        'label' => 'Release Management',
        'title' => 'Release Management',
        'body'  => "We proactively manage Workday's bi-annual updates from testing through deployment. We guarantee your team safely adopts powerful new features without disrupting existing daily processes.",
    ],
    [
        'label' => 'Talent Management',
        'title' => 'Talent Management',
        'body'  => 'We provide certified Workday professionals on demand to fill your critical resource gaps. Whether you need short-term project support or a long-term engagement, we scale with you.',
    ],
    [
        'label' => 'Reporting & Insights',
        'title' => 'Reporting & Insights',
        'body'  => 'We enhance your reporting capabilities to translate complex data into clear, actionable dashboards. This gives your leadership the deep insights required to make faster, smarter decisions.',
    ],
];
?>

<!-- Reading progress bar -->
<div id="progress" class="reading-progress" aria-hidden="true"></div>

<main id="main" tabindex="-1" style="--svc-color:<?php echo esc_attr( $color ); ?>">


<?php if ( $v === 0 ) : ?>
<!-- Default AMS design. This block is the proposed service-page system. -->
<div class="ams-next-root">

  <section class="ams-next-hero">
    <div class="container ams-next-hero-grid">
      <div class="ams-next-hero-copy">
        <p class="ams-next-eyebrow reveal">Workday AMS &amp; Support Services</p>
        <h1 class="reveal delay-1">Beyond Support. <span>Continuous Workday Improvement.</span></h1>
        <p class="ams-next-hero-intro reveal delay-2">Your Workday implementation is live, but if your team is drowning in support tickets, you aren't getting the ROI you paid for. We handle the heavy lifting of your Workday support, so your team can move from reactive firefighting to proactive optimisation.</p>
        <div class="ams-next-actions reveal delay-3">
          <a href="#ams-form" class="ams-next-button ams-next-button--primary">Book a Free Health Check <?php echo z_arrow( 14 ); ?></a>
          <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="ams-next-button ams-next-button--secondary">Talk to a Workday Support Expert <?php echo z_arrow( 14 ); ?></a>
        </div>
      </div>
      <figure class="ams-next-hero-media ams-next-hero-media--photo reveal delay-2">
        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/sol-02-ams-support.webp' ); ?>" width="1400" height="933" alt="Support consultants monitoring enterprise systems" fetchpriority="high">
      </figure>
    </div>
  </section>

  <section class="ams-next-logos" aria-label="Selected Zeneesha clients">
    <div class="container">
      <div class="ams-next-logo-row">
        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/logos/kion.png' ); ?>" alt="KION Group" loading="lazy">
        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/logos/warner.svg' ); ?>" alt="Warner Music Group" loading="lazy">
        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/logos/aqa.svg' ); ?>" alt="AQA" loading="lazy">
        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/logos/quadient.png' ); ?>" alt="Quadient" loading="lazy">
        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/logos/slaughter.png' ); ?>" alt="Slaughter and May" loading="lazy">
      </div>
    </div>
  </section>

  <section class="ams-next-problem">
    <div class="container">
      <div class="ams-next-problem-heading reveal">
        <h2>Why Standard Workday AMS Fails to Fix Root Causes</h2>
        <p>Most Workday environments don't struggle because of the software. They struggle because standard support models focus purely on closing tickets, ignoring the deep technical debt building under the hood.</p>
        <p>When you treat support as just "break-fix", technical debt creates real business damage:</p>
      </div>
      <div class="ams-next-problem-grid">
        <figure class="ams-next-problem-media reveal delay-1">
          <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/workday-laptop-hover.png' ); ?>" width="6251" height="4501" alt="Workday workflow issue visual shown on a laptop" loading="lazy">
        </figure>
        <div class="ams-next-problem-list">
          <?php foreach ( $ams_failure_points as $i => $point ) : ?>
            <article class="ams-next-problem-item reveal" style="transition-delay:<?php echo esc_attr( $i * 90 ); ?>ms">
              <span><?php printf( '%02d', $i + 1 ); ?></span>
              <div>
                <h3><?php echo esc_html( $point['title'] ); ?></h3>
                <p><?php echo esc_html( $point['body'] ); ?></p>
              </div>
            </article>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </section>

  <section id="ams-model" class="ams-next-model" data-ams-dial>
    <div class="container">
      <script type="application/json" data-ams-dial-json><?php echo wp_json_encode( $ams_dial_items ); ?></script>
      <div class="ams-next-model-heading reveal">
        <h2>How We Keep Workday Moving Forward</h2>
        <p>Here is how we deliver ongoing support to grow your Workday value:</p>
      </div>
      <div class="ams-next-model-grid">
        <div class="ams-next-model-nav reveal delay-1" role="group" aria-label="AMS service areas">
          <?php foreach ( $ams_dial_items as $i => $item ) : ?>
            <button type="button" data-ams-dial-node data-index="<?php echo esc_attr( $i ); ?>" aria-pressed="<?php echo 0 === $i ? 'true' : 'false'; ?>">
              <span><?php printf( '%02d', $i + 1 ); ?></span>
              <?php echo esc_html( $item['label'] ); ?>
            </button>
          <?php endforeach; ?>
        </div>
        <div class="ams-next-model-panel reveal delay-2" aria-live="polite">
          <span data-ams-dial-count>01 / 07</span>
          <h3 data-ams-dial-title><?php echo esc_html( $ams_dial_items[0]['title'] ); ?></h3>
          <p data-ams-dial-body><?php echo esc_html( $ams_dial_items[0]['body'] ); ?></p>
        </div>
      </div>
      <div class="ams-next-section-actions reveal">
        <a href="#ams-form" class="ams-next-button ams-next-button--primary">Book a Free Health Check <?php echo z_arrow( 14 ); ?></a>
        <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="ams-next-button ams-next-button--secondary">Talk to a Workday Support Expert <?php echo z_arrow( 14 ); ?></a>
      </div>
    </div>
  </section>

  <section id="ams-framework" class="ams-next-framework">
    <div class="container">
      <div class="ams-next-framework-heading reveal">
        <h2>The Zeneesha AMS Framework</h2>
        <p>Application Management Services (AMS) is how we ensure your system keeps working operationally and strategically. We don't just treat the symptoms; we engineer permanent solutions using a clear framework:</p>
      </div>
      <div class="ams-next-framework-grid">
        <?php foreach ( $ams_framework as $i => $item ) : ?>
          <article class="ams-next-framework-card ams-next-framework-card--<?php echo esc_attr( $i + 1 ); ?> reveal" style="transition-delay:<?php echo esc_attr( $i * 90 ); ?>ms">
            <span><?php echo esc_html( $item['num'] ); ?></span>
            <p><?php echo esc_html( $item['kicker'] ); ?></p>
            <h3><?php echo esc_html( $item['title'] ); ?></h3>
            <div><?php echo esc_html( $item['body'] ); ?></div>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="ams-next-proof">
    <div class="container">
      <div class="ams-next-proof-grid">
        <div class="ams-next-proof-lead reveal">
          <p>Case Study</p>
          <h2>Real Outcomes. Real Impact.</h2>
          <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="ams-next-button ams-next-button--secondary">Talk to a Workday Support Expert <?php echo z_arrow( 14 ); ?></a>
        </div>
        <div class="ams-next-proof-stories">
          <?php foreach ( $ams_case_studies as $i => $case ) : ?>
            <article class="reveal" style="transition-delay:<?php echo esc_attr( $i * 90 ); ?>ms">
              <span><?php printf( '%02d', $i + 1 ); ?></span>
              <h3><?php echo esc_html( $case['title'] ); ?></h3>
              <p><?php echo esc_html( $case['body'] ); ?></p>
            </article>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </section>

  <section class="ams-next-faq">
    <div class="container ams-next-faq-grid">
      <div class="ams-next-faq-heading reveal">
        <h2>Frequently Asked Questions</h2>
      </div>
      <div class="ams-next-faq-list">
        <?php foreach ( $ams_faqs as $i => $faq ) : ?>
          <details class="ams-next-faq-item reveal" style="transition-delay:<?php echo esc_attr( $i * 70 ); ?>ms" <?php echo 0 === $i ? 'open' : ''; ?>>
            <summary><?php echo esc_html( $faq['q'] ); ?></summary>
            <p><?php echo esc_html( $faq['a'] ); ?></p>
          </details>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

</div>


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
              <div class="cta-with-note">
                <button type="submit" class="form-submit">Book My Health Check <?php echo z_arrow( 14 ); ?></button>
                <p class="cta-note-tag">Actionable insights. Zero sales pitch.</p>
              </div>
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


<?php if ( $v !== 1 ) : ?>
<?php
$cta_section_id = 'ams-form';
$cta_inner_id   = 'talk';
$cta_eyebrow    = 'Workday Tenant Health Check';
$cta_heading    = 'Stop Struggling With Workday. Start Getting Value From It.';
$cta_body       = "If Workday isn't working the way it should, we'll show you why. Our Free Workday Tenant Health Check identifies issues, prioritises improvements, and gives you a clear path to a better-performing Workday.";
$cta_submit     = 'Book Your Free Health Check';
require __DIR__ . '/partials/form-cta.php';
?>
<?php endif; ?>


</main>

<?php get_footer(); ?>
