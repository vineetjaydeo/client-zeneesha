<?php get_header(); ?>
<main>

<!-- ══════════════════════════════════════════════════════
     HERO
══════════════════════════════════════════════════════ -->
<section id="top" class="section-hero">
  <!-- Ambient blobs -->
  <div class="hero-blobs" aria-hidden="true">
    <div class="blob blob-1"></div>
    <div class="blob blob-2"></div>
    <div class="blob blob-3"></div>
  </div>
  <div class="hero-dotgrid" aria-hidden="true"></div>

  <div class="container hero-relative">
    <div class="hero-grid">

      <!-- Left: copy -->
      <div class="hero-left">
        <div class="hero-eyebrow">
          <span class="pulse-dot redorange"></span>
          Workday Post Go-Live Specialists
        </div>

        <h1 class="hero-headline">
          <span class="kline">
            <span class="kline-inner kline-light"><?php echo esc_html( zf( 'hero_h1', 'Transforming Workday' ) ); ?></span>
          </span>
          <span class="kline">
            <span class="kline-inner kline-bold"><?php echo esc_html( zf( 'hero_h2', 'Into Business Value.' ) ); ?></span>
          </span>
        </h1>

        <p class="hero-body">
          <?php echo esc_html( zf( 'hero_body', "Post go-live is where most organisations lose their Workday ROI. Zeneesha ensures that doesn't happen, from implementation to AI-led optimisation." ) ); ?>
        </p>

        <div class="hero-ctas">
          <a href="#talk" class="btn-primary">
            <?php echo esc_html( zf( 'hero_cta', 'Book Your Complimentary Health Check' ) ); ?>
            <?php echo z_arrow( 14 ); ?>
          </a>
          <a href="#solutions" class="btn-ghost">
            See How We Help
            <?php echo z_arrow( 13 ); ?>
          </a>
        </div>

        <div class="hero-note">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#10b981" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 6L9 17l-5-5"/></svg>
          <?php echo esc_html( zf( 'hero_note', 'Actionable Insights. Zero Sales Pitch.' ) ); ?>
        </div>
      </div>

      <!-- Right: animated feed ticker -->
      <div class="hero-right">
        <div class="ticker-header">
          <div class="ticker-label">
            <span class="pulse-dot redorange"></span>
            Where Zeneesha Helps
          </div>
          <span class="ticker-label-right">Common gaps</span>
        </div>

        <div class="hero-ticker-container" aria-hidden="true"></div>

        <div class="ticker-footer">
          HCM &middot; Finance &middot; Planning &middot; Reporting &middot; Integrations
        </div>
      </div>

    </div>
  </div>

  <!-- Bottom bar -->
  <div class="hero-bottom-bar">
    <div class="container hero-bottom-inner">
      <span>Implementation &middot; AMS &amp; Support &middot; Maximise &middot; AI</span>
      <span class="scroll-hint">Scroll to explore <span class="text-redorange">↓</span></span>
      <span class="ws-hint">Workday Specialists</span>
    </div>
  </div>
</section>


<!-- ══════════════════════════════════════════════════════
     TRUST
══════════════════════════════════════════════════════ -->
<section id="trust" class="section-trust" style="border-bottom:1px solid rgba(30,58,138,.07)">
  <div class="trust-badge-wrap">
    <div class="trust-partner-label">Verified Partner Status</div>
    <img src="https://www.zeneesha.com/wp-content/uploads/2025/08/wday-partners-logo-services-partner@4x.png"
         alt="Workday Services Partner" class="trust-partner-badge" loading="lazy">
    <h2 class="trust-heading reveal">
      <?php echo esc_html( zf( 'trust_heading', 'Designed for Businesses That Run on Workday.' ) ); ?>
    </h2>
    <p class="trust-subtext reveal delay-1">
      <?php echo esc_html( zf( 'trust_sub', 'We help you bring clarity to your most critical business decisions.' ) ); ?>
    </p>
  </div>

  <!-- Logo carousel -->
  <?php
  $ldir = get_template_directory_uri() . '/assets/img/logos/';
  $logo_items = [
    '<img src="' . $ldir . 'kion.png" alt="KION Group" style="height:30px;width:auto;object-fit:contain">',
    '<svg height="36" viewBox="0 0 180 36" fill="none" xmlns="http://www.w3.org/2000/svg" aria-label="Warner Music Group"><text x="0" y="14" font-family="Jost,sans-serif" font-size="11" font-weight="600" letter-spacing="2" fill="currentColor">WARNER</text><text x="0" y="26" font-family="Jost,sans-serif" font-size="11" font-weight="400" letter-spacing="2" fill="currentColor">MUSIC GROUP</text></svg>',
    '<svg height="28" viewBox="0 0 150 28" fill="none" xmlns="http://www.w3.org/2000/svg" aria-label="HelloFresh"><text x="0" y="22" font-family="Jost,sans-serif" font-size="22" font-weight="500" fill="currentColor">HelloFresh</text></svg>',
    '<svg height="28" viewBox="0 0 160 28" fill="none" xmlns="http://www.w3.org/2000/svg" aria-label="Howdens"><text x="0" y="22" font-family="Jost,sans-serif" font-size="22" font-weight="600" letter-spacing="1" fill="currentColor">HOWDENS</text></svg>',
    '<svg height="36" viewBox="0 0 100 36" fill="none" xmlns="http://www.w3.org/2000/svg" aria-label="AQA"><text x="0" y="28" font-family="Jost,sans-serif" font-size="30" font-weight="700" fill="currentColor">AQA</text></svg>',
    '<svg height="28" viewBox="0 0 140 28" fill="none" xmlns="http://www.w3.org/2000/svg" aria-label="Quadient"><text x="0" y="22" font-family="Jost,sans-serif" font-size="22" font-weight="300" fill="currentColor">quadient</text></svg>',
    '<svg height="36" viewBox="0 0 160 36" fill="none" xmlns="http://www.w3.org/2000/svg" aria-label="Slaughter and May"><text x="0" y="14" font-family="Jost,sans-serif" font-size="12" font-weight="600" letter-spacing="1.5" fill="currentColor">SLAUGHTER</text><text x="0" y="30" font-family="Jost,sans-serif" font-size="12" font-weight="300" letter-spacing="1.5" fill="currentColor">AND MAY</text></svg>',
    '<svg height="36" viewBox="0 0 160 36" fill="none" xmlns="http://www.w3.org/2000/svg" aria-label="UK Research and Innovation"><rect x="0" y="2" width="30" height="30" rx="2" fill="currentColor"/><text x="3" y="14" font-family="Jost,sans-serif" font-size="9" font-weight="700" fill="white">UK</text><text x="3" y="28" font-family="Jost,sans-serif" font-size="7" font-weight="400" fill="white">RI</text><text x="36" y="14" font-family="Jost,sans-serif" font-size="10" font-weight="500" fill="currentColor">UK Research</text><text x="36" y="28" font-family="Jost,sans-serif" font-size="10" font-weight="300" fill="currentColor">and Innovation</text></svg>',
  ];
  ?>
  <div class="logo-carousel-wrap">
    <div class="logo-track" id="logo-track">
      <?php foreach ( [ 1, 2 ] as $set ) : ?>
        <?php foreach ( $logo_items as $logo ) : ?>
          <div class="logo-item"<?php echo $set === 2 ? ' aria-hidden="true"' : ''; ?>><?php echo $logo; ?></div>
        <?php endforeach; ?>
      <?php endforeach; ?>
    </div>
  </div>

  <!-- Stats -->
  <div class="stats-grid">
    <?php
    $stat_icons = [
      '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 8 14"/></svg>',
      '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>',
      '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>',
      '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>',
      '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 18v-6a9 9 0 0 1 18 0v6"/><path d="M21 19a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3zM3 19a2 2 0 0 0 2 2h1a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2H3z"/></svg>',
    ];
    $stats = [
      [ '15+',   "Years Workday\nexperience" ],
      [ '100%',  "Certified\nconsultants"   ],
      [ '50K+',  "Employees\nsupported"     ],
      [ '95%',   "Client\nretention rate"   ],
      [ '200K+', "AMS hours\ndelivered"     ],
    ];
    foreach ( $stats as $i => $s ) : ?>
      <div class="stat-item reveal" style="transition-delay:<?php echo $i * 60; ?>ms">
        <div class="stat-icon"><?php echo $stat_icons[$i]; ?></div>
        <div class="stat-value count-up"><?php echo esc_html( $s[0] ); ?></div>
        <div class="stat-label"><?php echo esc_html( $s[1] ); ?></div>
      </div>
    <?php endforeach; ?>
  </div>
</section>


<!-- ══════════════════════════════════════════════════════
     CHALLENGES
══════════════════════════════════════════════════════ -->
<section id="challenges" class="section-challenges py-28">
  <div class="container">

    <div class="section-label reveal text-redorange">
      <span class="section-label-line" style="background:var(--redorange)"></span>
      After Go-Live Reality
    </div>

    <div class="reveal delay-1" style="display:grid;grid-template-columns:6fr 5fr;gap:1.5rem;margin-bottom:1.5rem;align-items:end">
      <h2 class="section-heading">Six signs your Workday investment isn't paying off.</h2>
      <p class="section-sub">Recognise any of these? Each one is a signal that your Workday environment needs attention and an opportunity Zeneesha can help you act on.</p>
    </div>

    <!-- Gartner stat bar -->
    <div class="challenges-stat-bar reveal delay-2">
      <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="var(--navy)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="flex-shrink:0;margin-top:2px" aria-hidden="true"><circle cx="12" cy="12" r="10"/><path d="M12 8v4M12 16h.01"/></svg>
      <p>By 2027, more than 70% of recently implemented ERP initiatives are expected to fall short of their original business case goals. <a href="https://www.gartner.com/" target="_blank" rel="noopener noreferrer" style="color:var(--sky2);font-style:italic;font-size:13px">source: Gartner</a></p>
    </div>

    <!-- Signal cards -->
    <div class="signal-cards">
      <?php
      $cards = [
        [ 'tag'=>'Recurring Tickets',       'headline'=>'The same issues keep coming back.',                                                      'desc'=>'Fixing symptoms isn\'t a support model. Zeneesha identifies the root cause so you stop firefighting and start improving.',                 'color'=>'#E8472C' ],
        [ 'tag'=>'Manual Workarounds',      'headline'=>'Your team has built a shadow process around Workday.',                                   'desc'=>'If people are going around the system, the system isn\'t working for them. We close the gap between what Workday does and what you need.', 'color'=>'#1E3A8A' ],
        [ 'tag'=>'Reporting Delays',        'headline'=>"Decisions get made on gut feel because the data isn't ready in time.",                   'desc'=>'Clean data, right structure, faster reports. Zeneesha rebuilds the reporting foundation so leadership gets answers, not excuses.',          'color'=>'#F57C1F' ],
        [ 'tag'=>'Low Adoption',            'headline'=>"You're paying for a platform your people have learned to work around.",                  'desc'=>'Adoption isn\'t a training problem. It\'s a confidence problem. We redesign the experience so Workday feels intuitive, not imposed.',      'color'=>'#1E3A8A' ],
        [ 'tag'=>'Release Fatigue',         'headline'=>'Workday releases arrive faster than you can evaluate them.',                             'desc'=>'We manage the release cycle: triaging what matters, testing what affects you, and deploying what adds value.',                            'color'=>'#E8472C' ],
        [ 'tag'=>'Underutilised Features',  'headline'=>"Features you already own are sitting dormant while you consider buying point solutions.", 'desc'=>'Before you buy, we audit. More often than not, the capability you need is already in your tenant, just not switched on.',                    'color'=>'#3B9EDB' ],
      ];
      $card_icons = [
        '<svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M23 4v6h-6"/><path d="M1 20v-6h6"/><path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"/></svg>',
        '<svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>',
        '<svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>',
        '<svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><line x1="17" y1="8" x2="23" y2="14"/><line x1="23" y1="8" x2="17" y2="14"/></svg>',
        '<svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>',
        '<svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polygon points="12 2 2 7 12 12 22 7 12 2"/><polyline points="2 17 12 22 22 17"/><polyline points="2 12 12 17 22 12"/></svg>',
      ];
      foreach ( $cards as $i => $c ) : ?>
        <div class="reveal" style="transition-delay:<?php echo $i * 60; ?>ms">
          <div class="signal-card" style="border-top:3px solid <?php echo esc_attr( $c['color'] ); ?>">
            <div class="signal-card-icon" style="color:<?php echo esc_attr( $c['color'] ); ?>"><?php echo $card_icons[$i]; ?></div>
            <span class="signal-card-tag" style="color:<?php echo esc_attr( $c['color'] ); ?>;background:<?php echo esc_attr( $c['color'] ); ?>18"><?php echo esc_html( $c['tag'] ); ?></span>
            <p class="signal-card-headline"><?php echo esc_html( $c['headline'] ); ?></p>
            <?php if ( $c['desc'] ) : ?><p class="signal-card-desc"><?php echo esc_html( $c['desc'] ); ?></p><?php endif; ?>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <p class="challenges-footer reveal delay-3">
      These aren't edge cases. They're the most common patterns we see in post-go-live Workday environments. Zeneesha uncovers the root cause, eliminates the friction, and builds a roadmap for what comes next.
    </p>

  </div>
</section>


<!-- ══════════════════════════════════════════════════════
     SOLUTIONS
══════════════════════════════════════════════════════ -->
<section id="solutions" class="section-solutions py-28">
  <div class="container">

    <div class="section-label reveal text-redorange">
      <span class="section-label-line" style="background:var(--redorange)"></span>
      How Zeneesha Helps
    </div>

    <div class="solutions-header reveal delay-1">
      <h2 class="section-heading">One Workday journey. Three ways to move it forward.</h2>
      <p class="section-sub">From first configuration to ongoing optimisation, Zeneesha covers the full lifecycle with specialist expertise at every stage.</p>
    </div>

    <!-- 4R Methodology strip -->
    <div class="methodology-strip reveal delay-2">
      <?php
      $steps = [
        [ 'num'=>'01', 'label'=>'Review',    'desc'=>'Audit your current Workday environment: config, data, adoption, and reporting.',   'color'=>'#1E3A8A', 'icon'=>'<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>' ],
        [ 'num'=>'02', 'label'=>'Reveal',    'desc'=>'Surface what\'s holding you back: gaps, inefficiencies, unused capability.',          'color'=>'#3B9EDB', 'icon'=>'<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>' ],
        [ 'num'=>'03', 'label'=>'Recommend', 'desc'=>'A prioritised, actionable roadmap tailored to your business, not a template.',        'color'=>'#F57C1F', 'icon'=>'<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76"/></svg>' ],
        [ 'num'=>'04', 'label'=>'Refine',    'desc'=>'Implement, measure, and continuously improve. Workday should get better over time.',  'color'=>'#E8472C', 'icon'=>'<svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="23 4 23 10 17 10"/><polyline points="1 20 1 14 7 14"/><path d="M3.51 9a9 9 0 0 1 14.85-3.36L23 10M1 14l4.64 4.36A9 9 0 0 0 20.49 15"/></svg>' ],
      ];
      foreach ( $steps as $i => $s ) : ?>
        <div class="methodology-step reveal" style="transition-delay:<?php echo $i * 80; ?>ms">
          <div class="ms-step-icon" style="color:<?php echo esc_attr( $s['color'] ); ?>"><?php echo $s['icon']; ?></div>
          <div class="ms-num" style="color:<?php echo esc_attr( $s['color'] ); ?>"><?php echo esc_html( $s['num'] ); ?></div>
          <div class="ms-connector" style="background:<?php echo esc_attr( $s['color'] ); ?>22" aria-hidden="true">
            <div class="ms-connector-fill" style="background:<?php echo esc_attr( $s['color'] ); ?>"></div>
          </div>
          <div class="ms-label" style="color:<?php echo esc_attr( $s['color'] ); ?>"><?php echo esc_html( $s['label'] ); ?></div>
          <p class="ms-desc"><?php echo esc_html( $s['desc'] ); ?></p>
        </div>
      <?php endforeach; ?>
    </div>

    <!-- Lifecycle SVG -->
    <div class="lifecycle-wrap reveal delay-2">
      <svg class="lifecycle-svg" viewBox="0 0 560 100" fill="none" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Workday lifecycle: Implementation, AMS and Support, Maximise">
        <defs>
          <marker id="arr-to-2" markerWidth="9" markerHeight="9" refX="7" refY="4.5" orient="auto">
            <path d="M1 1.5 L8 4.5 L1 7.5 Z" fill="#3B9EDB"/>
          </marker>
          <marker id="arr-to-3" markerWidth="9" markerHeight="9" refX="7" refY="4.5" orient="auto">
            <path d="M1 1.5 L8 4.5 L1 7.5 Z" fill="#F57C1F"/>
          </marker>
        </defs>
        <line x1="103" y1="40" x2="255" y2="40" stroke="#3B9EDB" stroke-width="1.5" stroke-opacity=".55" marker-end="url(#arr-to-2)"/>
        <line x1="303" y1="40" x2="455" y2="40" stroke="#F57C1F" stroke-width="1.5" stroke-opacity=".55" marker-end="url(#arr-to-3)"/>
        <g class="lc-node" data-sol-node="0" tabindex="0" role="button" aria-label="Implementation">
          <circle class="lc-ring" cx="80" cy="40" r="32" fill="#1E3A8A" opacity=".08"/>
          <circle class="lc-main" cx="80" cy="40" r="22" fill="#1E3A8A"/>
          <text x="80" y="45" text-anchor="middle" font-family="Jost,sans-serif" font-size="13" font-weight="600" fill="#fff">01</text>
          <text x="80" y="82" text-anchor="middle" font-family="Jost,sans-serif" font-size="11.5" font-weight="600" fill="#1E3A8A" letter-spacing=".02em">Implementation</text>
        </g>
        <g class="lc-node" data-sol-node="1" tabindex="0" role="button" aria-label="AMS and Support">
          <circle class="lc-ring" cx="280" cy="40" r="32" fill="#3B9EDB" opacity="0"/>
          <circle class="lc-main" cx="280" cy="40" r="22" fill="#fff" stroke="#3B9EDB" stroke-width="2"/>
          <text x="280" y="45" text-anchor="middle" font-family="Jost,sans-serif" font-size="13" font-weight="600" fill="#3B9EDB">02</text>
          <text x="280" y="82" text-anchor="middle" font-family="Jost,sans-serif" font-size="11.5" font-weight="500" fill="#475569" letter-spacing=".02em">AMS / Support</text>
        </g>
        <g class="lc-node" data-sol-node="2" tabindex="0" role="button" aria-label="Maximise">
          <circle class="lc-ring" cx="480" cy="40" r="32" fill="#F57C1F" opacity="0"/>
          <circle class="lc-main" cx="480" cy="40" r="22" fill="#fff" stroke="#F57C1F" stroke-width="2"/>
          <text x="480" y="45" text-anchor="middle" font-family="Jost,sans-serif" font-size="13" font-weight="600" fill="#F57C1F">03</text>
          <text x="480" y="82" text-anchor="middle" font-family="Jost,sans-serif" font-size="11.5" font-weight="500" fill="#475569" letter-spacing=".02em">Maximise</text>
        </g>
      </svg>
    </div>

    <!-- Tab buttons -->
    <div class="solutions-tabs reveal delay-2">
      <?php
      $services = [
        [ 'id'=>'implementation', 'num'=>'01', 'title'=>'Implementation', 'color'=>'#1E3A8A' ],
        [ 'id'=>'ams',            'num'=>'02', 'title'=>'AMS & Support',  'color'=>'#3B9EDB' ],
        [ 'id'=>'maximise',       'num'=>'03', 'title'=>'Maximise',       'color'=>'#F57C1F' ],
      ];
      foreach ( $services as $i => $s ) : ?>
        <button class="sol-tab-btn" data-sol-tab="<?php echo $i; ?>" data-color="<?php echo esc_attr( $s['color'] ); ?>" aria-controls="sol-panel-<?php echo $i; ?>">
          <span class="tab-num"><?php echo esc_html( $s['num'] ); ?></span>
          <?php echo esc_html( $s['title'] ); ?>
        </button>
      <?php endforeach; ?>
    </div>

    <!-- Solution panels -->
    <?php
    $sol_data = [
      [
        'num'      => '01',
        'title'    => 'Implementation',
        'color'    => '#1E3A8A',
        'tagline'  => 'Build the right foundation from day one.',
        'desc'     => 'A Workday implementation sets the rules your organisation will live by for years. Zeneesha ensures those rules are right, configured for how your business actually works, not how the default template assumes it does.',
        'tags'     => [ 'Workday HCM', 'Finance', 'Adaptive Planning', 'Data Migration' ],
        'outcomes' => [
          'Configured for your processes, not just the defaults.',
          'Data migrated cleanly, with no surprises in month one.',
          'Team trained and genuinely confident at go-live.',
        ],
      ],
      [
        'num'      => '02',
        'title'    => 'AMS & Support',
        'color'    => '#3B9EDB',
        'tagline'  => 'Your Workday, always working. We keep it that way.',
        'desc'     => "After go-live, the real work starts. Change requests accumulate, releases introduce complexity, and your team can't be Workday experts on top of everything else. Zeneesha absorbs that pressure. Fast, reliably, every time.",
        'tags'     => [ 'Incident Resolution', 'Release Management', 'Change Requests', 'Integrations' ],
        'outcomes' => [
          'Fast resolution for incidents and change requests.',
          'Workday release management handled end-to-end.',
          'A specialist team available when your team isn\'t.',
        ],
      ],
      [
        'num'      => '03',
        'title'    => 'Maximise',
        'color'    => '#F57C1F',
        'tagline'  => 'Turn your Workday from operational to exceptional.',
        'desc'     => "There's a version of Workday your organisation hasn't reached yet. One that answers leadership's questions instantly, eliminates manual work, and reflects how your business operates today. Zeneesha helps you get there.",
        'tags'     => [ 'Automation', 'Reporting', 'Configuration Review', 'Adoption' ],
        'outcomes' => [
          'Automation that eliminates manual intervention.',
          'Reporting that answers the questions leadership actually asks.',
          'Configuration that reflects how your business works today.',
        ],
      ],
    ];
    foreach ( $sol_data as $i => $svc ) : ?>
      <div class="sol-panel" data-sol-panel="<?php echo $i; ?>" id="sol-panel-<?php echo $i; ?>">

        <!-- Left: copy -->
        <div>
          <div class="sol-service-num" style="color:<?php echo esc_attr( $svc['color'] ); ?>">Service <?php echo esc_html( $svc['num'] ); ?></div>
          <h3 class="sol-service-title"><?php echo esc_html( $svc['title'] ); ?></h3>
          <p class="sol-tagline" style="color:<?php echo esc_attr( $svc['color'] ); ?>"><?php echo esc_html( $svc['tagline'] ); ?></p>
          <p class="sol-desc"><?php echo esc_html( $svc['desc'] ); ?></p>
          <div class="sol-tags">
            <?php foreach ( $svc['tags'] as $tag ) : ?>
              <span class="sol-tag" style="color:<?php echo esc_attr( $svc['color'] ); ?>;background:<?php echo esc_attr( $svc['color'] ); ?>10;border:1px solid <?php echo esc_attr( $svc['color'] ); ?>25"><?php echo esc_html( $tag ); ?></span>
            <?php endforeach; ?>
          </div>
        </div>

        <!-- Right: outcomes panel -->
        <div class="sol-outcomes-panel" style="border-top:4px solid <?php echo esc_attr( $svc['color'] ); ?>">
          <div class="sol-outcomes-label">What this means for you</div>
          <ul class="sol-outcomes-list">
            <?php foreach ( $svc['outcomes'] as $o ) : ?>
              <li class="sol-outcome">
                <span class="outcome-dot" style="background:<?php echo esc_attr( $svc['color'] ); ?>"><?php echo z_check( 10 ); ?></span>
                <span class="sol-outcome-text"><?php echo esc_html( $o ); ?></span>
              </li>
            <?php endforeach; ?>
          </ul>
          <div class="sol-cta-row">
            <a href="#talk" class="sol-cta-link" style="color:<?php echo esc_attr( $svc['color'] ); ?>">
              Discuss this with us <?php echo z_arrow( 13 ); ?>
            </a>
          </div>
        </div>

      </div>
    <?php endforeach; ?>

  </div>
</section>


<!-- ══════════════════════════════════════════════════════
     AI & AUTOMATION
══════════════════════════════════════════════════════ -->
<section id="ai" class="section-ai" style="position:relative">
  <div style="position:absolute;inset:0;pointer-events:none;overflow:hidden" aria-hidden="true">
    <div class="ai-blob-1"></div>
    <div class="ai-blob-2"></div>
  </div>
  <div class="ai-section-inner">

    <!-- Left: copy -->
    <div>
      <div class="section-label reveal ai-label">
        <span class="section-label-line" style="background:var(--sky2)"></span>
        AI &amp; Automation
      </div>

      <h2 class="ai-heading reveal delay-1">
        Workday AI:
        <span><?php echo esc_html( zf( 'ai_h2', 'Hype or Business Value?' ) ); ?></span>
      </h2>

      <p class="ai-body ai-body-1 reveal delay-2">
        <?php echo esc_html( zf( 'ai_body1', "Workday's AI capability is real, but it only works when your data is clean, your configuration is solid, and your processes are adopted. Without that foundation, AI generates noise, not insight." ) ); ?>
      </p>
      <p class="ai-body ai-body-2 reveal delay-3">
        <?php echo esc_html( zf( 'ai_body2', "Zeneesha prepares your Workday environment for AI by fixing the foundations, identifying the highest-value use cases, and helping you deploy capabilities that actually move the needle for your business." ) ); ?>
      </p>

      <div class="ai-cta-row reveal delay-4">
        <a href="#talk" class="ai-btn">
          <?php echo esc_html( zf( 'ai_cta', 'Explore Workday AI with Zeneesha' ) ); ?>
          <?php echo z_arrow( 14 ); ?>
        </a>
      </div>
    </div>

    <!-- Right: module panels + foundations diagram -->
    <div class="reveal delay-2">
      <div class="ai-foundations-diagram" aria-label="AI readiness pyramid: Clean Data, Configuration, Process Adoption, AI Features">
        <div class="ai-layer ai-layer-4 reveal-layer">
          <span class="ai-layer-icon">✦</span>
          <span class="ai-layer-text">AI Features</span>
        </div>
        <div class="ai-layer ai-layer-3 reveal-layer">
          <span class="ai-layer-text">Process Adoption</span>
        </div>
        <div class="ai-layer ai-layer-2 reveal-layer">
          <span class="ai-layer-text">Configuration</span>
        </div>
        <div class="ai-layer ai-layer-1 reveal-layer">
          <span class="ai-layer-text">Clean Data</span>
        </div>
        <p class="ai-foundations-caption">The four foundations Zeneesha builds before AI can deliver value</p>
      </div>
      <div class="ai-modules">
        <?php
        $modules = [
          [ 'label'=>'HCM',              'color'=>'#3B9EDB', 'desc'=>'Bring AI to every stage of the talent lifecycle. We identify where Workday AI can reduce manual effort across hiring, onboarding, workforce planning and manager workflows, then configure Workday to make it happen.' ],
          [ 'label'=>'Finance',          'color'=>'#F57C1F', 'desc'=>"Unlock AI within your financial core. We surface where Workday's AI can improve close cycles, flag anomalies and sharpen spend visibility, so your Finance team acts on insight, not instinct." ],
          [ 'label'=>'Adaptive Planning','color'=>'#E8472C', 'desc'=>"Plan smarter with AI-driven forecasting. We help you unlock Workday Adaptive Planning's scenario modelling, so leadership has one trusted view that holds up in the boardroom, not three spreadsheets and a conversation." ],
        ];
        foreach ( $modules as $m ) : ?>
          <div class="ai-module" style="border-left:3px solid <?php echo esc_attr( $m['color'] ); ?>">
            <div class="ai-module-label" style="color:<?php echo esc_attr( $m['color'] ); ?>"><?php echo esc_html( $m['label'] ); ?></div>
            <p class="ai-module-desc"><?php echo esc_html( $m['desc'] ); ?></p>
          </div>
        <?php endforeach; ?>
      </div>

      <!-- Use case pills -->
      <div class="ai-use-cases" style="margin-top:1rem">
        <span class="ai-uc-label">Use cases</span>
        <?php
        $ucs = [ 'Automate headcount planning approvals', 'Surface financial close anomalies', 'Enable manager self-service at scale' ];
        foreach ( $ucs as $uc ) : ?>
          <span class="ai-uc-pill"><?php echo esc_html( $uc ); ?></span>
        <?php endforeach; ?>
      </div>
    </div>

  </div>
</section>


<!-- ══════════════════════════════════════════════════════
     RESULTS — 3-tile case studies
══════════════════════════════════════════════════════ -->
<section id="results" class="section-results py-28">
  <div class="container">

    <div class="section-label reveal text-redorange">
      <span class="section-label-line" style="background:var(--redorange)"></span>
      Client Outcomes
    </div>

    <div class="results-header reveal delay-1">
      <h2 class="section-heading">Real results. Real organisations. Real Workday environments.</h2>
      <p class="section-sub">Every engagement is different. These are the kinds of outcomes organisations achieve when Workday is working the way it should.</p>
    </div>

    <!-- 3-tile case studies -->
    <div class="cs-tiles-grid reveal delay-2">

      <!-- Tile 1: AQA -->
      <div class="cs-tile" style="border-top:4px solid #1E3A8A">
        <div class="cs-tile-client">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logos/aqa.png" alt="AQA" class="cs-tile-logo">
          <div class="cs-tile-name">AQA Education</div>
          <div class="cs-tile-type">Education &middot; Non-profit</div>
        </div>
        <div class="cs-tile-metric-row">
          <div class="cs-tile-metric">
            <span class="cs-tile-value">700%</span>
            <span class="cs-tile-label">Faster sprint turnaround</span>
          </div>
          <div class="cs-tile-metric">
            <span class="cs-tile-value">2&#8594;16</span>
            <span class="cs-tile-label">Tickets per sprint</span>
          </div>
          <div class="cs-arc-wrap" aria-hidden="true">
            <svg class="cs-arc-svg" viewBox="0 0 56 56" fill="none">
              <circle cx="28" cy="28" r="22" stroke="#1E3A8A14" stroke-width="5"/>
              <circle cx="28" cy="28" r="22" stroke="#1E3A8A" stroke-width="5" stroke-linecap="round"
                      stroke-dasharray="138.2" stroke-dashoffset="138.2"
                      class="cs-arc-fill" data-pct="100" transform="rotate(-90 28 28)"/>
            </svg>
            <span class="cs-arc-label">7×</span>
          </div>
        </div>
        <p class="cs-tile-summary">
          AQA's Workday HCM support model was overwhelmed with unstructured change requests. Zeneesha introduced a sprint-based intake model. Sprint capacity jumped from 2 to 16 tickets, and platform adoption reached 95%.
        </p>
        <div class="cs-tile-attribution">Georgina Taitt, Head of Enterprise Apps &middot; AQA</div>
      </div>

      <!-- Tile 2: KION Group -->
      <div class="cs-tile" style="border-top:4px solid #3B9EDB">
        <div class="cs-tile-client">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logos/kion.png" alt="KION Group" class="cs-tile-logo">
          <div class="cs-tile-name">KION Group</div>
          <div class="cs-tile-type">Industrial &middot; Global Manufacturing</div>
        </div>
        <div class="cs-tile-metric-row">
          <div class="cs-tile-metric">
            <span class="cs-tile-value">40%</span>
            <span class="cs-tile-label">Reduction in manual HR tasks</span>
          </div>
          <div class="cs-tile-metric">
            <span class="cs-tile-value">Multi-country</span>
            <span class="cs-tile-label">Deployment supported</span>
          </div>
          <div class="cs-arc-wrap" aria-hidden="true">
            <svg class="cs-arc-svg" viewBox="0 0 56 56" fill="none">
              <circle cx="28" cy="28" r="22" stroke="#3B9EDB14" stroke-width="5"/>
              <circle cx="28" cy="28" r="22" stroke="#3B9EDB" stroke-width="5" stroke-linecap="round"
                      stroke-dasharray="138.2" stroke-dashoffset="138.2"
                      class="cs-arc-fill" data-pct="40" transform="rotate(-90 28 28)"/>
            </svg>
            <span class="cs-arc-label">40%</span>
          </div>
        </div>
        <p class="cs-tile-summary">
          Zeneesha supported KION's Workday HCM rollout across multiple European markets, delivering configuration, data migration, and localisation to keep a complex programme on track and on time.
        </p>
        <div class="cs-tile-attribution">Zeneesha Implementation Team &middot; KION Group</div>
      </div>

      <!-- Tile 3: Slaughter and May -->
      <div class="cs-tile" style="border-top:4px solid #F57C1F">
        <div class="cs-tile-client">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logos/slaughter.png" alt="Slaughter and May" class="cs-tile-logo">
          <div class="cs-tile-name">Slaughter and May</div>
          <div class="cs-tile-type">Professional Services &middot; Legal</div>
        </div>
        <div class="cs-tile-metric-row">
          <div class="cs-tile-metric">
            <span class="cs-tile-value">60%</span>
            <span class="cs-tile-label">Faster reporting cycles</span>
          </div>
          <div class="cs-tile-metric">
            <span class="cs-tile-value">AMS</span>
            <span class="cs-tile-label">Ongoing managed support</span>
          </div>
          <div class="cs-arc-wrap" aria-hidden="true">
            <svg class="cs-arc-svg" viewBox="0 0 56 56" fill="none">
              <circle cx="28" cy="28" r="22" stroke="#F57C1F14" stroke-width="5"/>
              <circle cx="28" cy="28" r="22" stroke="#F57C1F" stroke-width="5" stroke-linecap="round"
                      stroke-dasharray="138.2" stroke-dashoffset="138.2"
                      class="cs-arc-fill" data-pct="60" transform="rotate(-90 28 28)"/>
            </svg>
            <span class="cs-arc-label">60%</span>
          </div>
        </div>
        <p class="cs-tile-summary">
          Zeneesha restructured Slaughter and May's Workday reporting architecture and took over their AMS function, reducing report production time and giving the internal team capacity to focus on strategic priorities.
        </p>
        <div class="cs-tile-attribution">Zeneesha AMS Team &middot; Slaughter and May</div>
      </div>

    </div>

    <div style="text-align:center;margin-top:2.5rem" class="reveal delay-3">
      <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn-ghost" style="display:inline-flex">
        Discuss your Workday challenges <?php echo z_arrow( 13 ); ?>
      </a>
    </div>

  </div>
</section>


<!-- ══════════════════════════════════════════════════════
     TESTIMONIALS
══════════════════════════════════════════════════════ -->
<section id="testimonials" class="section-testimonials py-28">
  <div class="container">

    <div class="section-label reveal text-redorange">
      <span class="section-label-line" style="background:var(--redorange)"></span>
      What Clients Say
    </div>

    <h2 class="section-heading reveal delay-1" style="margin-bottom:2.5rem">Straight from the people we work with.</h2>

    <div class="testimonials-4-grid">

      <div class="testimonial-card reveal">
        <div class="testimonial-quote-mark">&ldquo;</div>
        <p class="testimonial-text">Zeneesha didn't just fix our Workday support. They gave us a proper operating model for managing change. Sprint capacity went from 2 tickets to 16. That's transformational for a team our size.</p>
        <div class="testimonial-divider">
          <div class="testimonial-name">Georgina Taitt</div>
          <div class="testimonial-role">Head of Enterprise Applications &middot; AQA Education</div>
          <div class="testimonial-logo"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/logos/aqa.png" alt="AQA Education" loading="lazy"></div>
        </div>
      </div>

      <div class="testimonial-card reveal delay-1">
        <div class="testimonial-quote-mark">&ldquo;</div>
        <p class="testimonial-text">What impressed us most was how quickly Zeneesha got up to speed with our environment. They felt like an extension of our team, not a vendor. Pragmatic, responsive, and genuinely invested in outcomes.</p>
        <div class="testimonial-divider">
          <div class="testimonial-name">Senior HRIS Manager</div>
          <div class="testimonial-role">Warner Music Group</div>
          <div class="testimonial-logo"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/logos/warner.png" alt="Warner Music Group" loading="lazy"></div>
        </div>
      </div>

      <div class="testimonial-card reveal delay-2">
        <div class="testimonial-quote-mark">&ldquo;</div>
        <p class="testimonial-text">We needed a partner who could work at pace without compromising quality. Zeneesha delivered on time, across multiple workstreams, with a level of Workday expertise that made a real difference to our rollout.</p>
        <div class="testimonial-divider">
          <div class="testimonial-name">Global Workday Programme Lead</div>
          <div class="testimonial-role">Booking.com</div>
          <div class="testimonial-logo"><svg height="18" viewBox="0 0 160 18" xmlns="http://www.w3.org/2000/svg" aria-label="Booking.com"><text y="14" font-family="Jost,BlinkMacSystemFont,sans-serif" font-size="14" font-weight="700" fill="currentColor">Booking.com</text></svg></div>
        </div>
      </div>

      <div class="testimonial-card reveal delay-3">
        <div class="testimonial-quote-mark">&ldquo;</div>
        <p class="testimonial-text">Zeneesha helped us understand what we had, what we were missing, and what we should prioritise. The health check alone surfaced three months of roadmap. Clear, commercial, no fluff.</p>
        <div class="testimonial-divider">
          <div class="testimonial-name">Director of People Technology</div>
          <div class="testimonial-role">LEGO Group</div>
          <div class="testimonial-logo"><svg height="18" viewBox="0 0 70 18" xmlns="http://www.w3.org/2000/svg" aria-label="LEGO Group"><text y="14" font-family="Jost,BlinkMacSystemFont,sans-serif" font-size="14" font-weight="800" letter-spacing="2" fill="currentColor">LEGO</text></svg></div>
        </div>
      </div>

    </div>

  </div>
</section>


<!-- ══════════════════════════════════════════════════════
     FAQ
══════════════════════════════════════════════════════ -->
<section id="faq" class="section-faq py-28">
  <div class="container">
    <div class="faq-grid">

      <!-- Left: heading (sticky) -->
      <div class="faq-sticky">
        <div class="section-label reveal text-redorange">
          <span class="section-label-line" style="background:var(--redorange)"></span>
          Common Questions
        </div>
        <h2 class="section-heading reveal delay-1" style="font-size:clamp(36px,4.4vw,58px)">FAQ</h2>
        <p class="section-sub reveal delay-2" style="max-width:340px;margin-top:1.5rem">
          Answers to the questions we hear most from organisations evaluating Workday AMS and optimisation support.
        </p>
        <a href="#talk" class="faq-cta reveal delay-3">
          Ask us directly <?php echo z_arrow( 13 ); ?>
        </a>
      </div>

      <!-- Right: accordion -->
      <div class="faq-accordion reveal delay-2">
        <?php
        $faqs = [
          [
            'q' => 'How do I know if our Workday system needs a health check?',
            'a' => 'If you are seeing recurring issues, manual workarounds, reporting delays or low adoption, those are clear signals something needs attention. A health check is the fastest way to understand what\'s happening and what to prioritise.',
          ],
          [
            'q' => 'We already have Workday live. Can Zeneesha still help?',
            'a' => 'Yes, and this is where we spend most of our time. Post-go-live is where the real complexity lives. Zeneesha supports live environments through AMS, optimisation, reporting improvements, release management, integrations, automation, and adoption programmes.',
          ],
          [
            'q' => 'We already have an internal Workday team. Can you still help?',
            'a' => 'Yes. Zeneesha works alongside internal teams to add specialist depth, extra capacity, and an independent view of your roadmap. We complement your team. We don\'t replace them.',
          ],
          [
            'q' => 'Which Workday modules does Zeneesha support?',
            'a' => 'We support HCM, Finance, Adaptive Planning and Analytics, with deep expertise across reporting, integrations and business process configuration.',
          ],
          [
            'q' => 'What happens during a Workday Health Check?',
            'a' => 'We review your configuration, data quality, reporting structure, integrations, business processes and adoption in a structured 60-minute session. You come away with a clear picture of where value is being lost and what to do about it.',
          ],
        ];
        foreach ( $faqs as $i => $faq ) : ?>
          <div class="faq-item">
            <button class="faq-btn" aria-expanded="false" aria-controls="faq-answer-<?php echo $i; ?>">
              <span class="faq-question"><?php echo esc_html( $faq['q'] ); ?></span>
              <svg class="faq-chevron" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#E8472C" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6 9l6 6 6-6"/></svg>
            </button>
            <div class="faq-answer" id="faq-answer-<?php echo $i; ?>" role="region">
              <p class="faq-answer-inner"><?php echo esc_html( $faq['a'] ); ?></p>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

    </div>
  </div>
</section>


<!-- ══════════════════════════════════════════════════════
     CERTIFICATIONS
══════════════════════════════════════════════════════ -->
<section class="section-certs py-12" style="border-top:1px solid rgba(30,58,138,.1)">
  <div class="container">
    <p class="certs-title">Accredited <span>&middot;</span> Certified <span>&middot;</span> Trusted</p>
    <div class="certs-grid">
      <?php
      $certs = [
        [ 'name'=>'Workday Sales Partner',    'img'=>'https://www.zeneesha.com/wp-content/uploads/2025/08/wday-partners-logo-sales-partner@4x.png',    'h'=>64 ],
        [ 'name'=>'Workday Services Partner', 'img'=>'https://www.zeneesha.com/wp-content/uploads/2025/08/wday-partners-logo-services-partner@4x.png', 'h'=>64 ],
        [ 'name'=>'IAF Member',               'img'=>'https://www.zeneesha.com/wp-content/uploads/2021/12/IAF-Logo.png',                                'h'=>60 ],
        [ 'name'=>'MSDUK',                    'img'=>'https://www.zeneesha.com/wp-content/uploads/2024/01/MSDNUK.png',                                  'h'=>41 ],
        [ 'name'=>'Cyber Essentials',         'img'=>'https://www.zeneesha.com/wp-content/uploads/2021/12/Cyber-Essentials-Logo_1.png',                 'h'=>64 ],
      ];
      foreach ( $certs as $c ) : ?>
        <div class="cert-item">
          <img src="<?php echo esc_url( $c['img'] ); ?>" alt="<?php echo esc_attr( $c['name'] ); ?>"
               style="height:<?php echo $c['h']; ?>px" loading="lazy">
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>


<!-- ══════════════════════════════════════════════════════
     CTA BAND
══════════════════════════════════════════════════════ -->
<section id="talk" class="section-cta">
  <div aria-hidden="true" style="position:absolute;inset:0;overflow:hidden;pointer-events:none">
    <div class="cta-blob-1"></div>
    <div class="cta-blob-2"></div>
    <svg viewBox="0 0 600 400" style="position:absolute;inset:0;width:100%;height:100%;opacity:.04" preserveAspectRatio="xMidYMid slice" aria-hidden="true">
      <path d="M60 80 L540 80 L60 320 L540 320" fill="none" stroke="#E8472C" stroke-width="3"/>
    </svg>
  </div>

  <div class="cta-inner">

    <!-- Left: copy -->
    <div>
      <div class="section-label reveal cta-label">
        <span class="section-label-line" style="background:var(--redorange)"></span>
        Complimentary Health Check
      </div>

      <h2 class="cta-heading reveal delay-1">
        <?php echo esc_html( zf( 'cta_heading', 'Find out exactly where your Workday investment is leaking value.' ) ); ?>
      </h2>

      <p class="cta-body reveal delay-2">
        <?php echo esc_html( zf( 'cta_body', "In 60 minutes, we'll review your Workday setup and give you a clear picture of where value is being lost, and a practical view of how to recover it. No preparation needed on your side." ) ); ?>
      </p>

      <div class="cta-note reveal delay-3">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#10b981" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 6L9 17l-5-5"/></svg>
        Actionable Insights. Zero Sales Pitch. No obligation.
      </div>
    </div>

    <!-- Right: contact form -->
    <div class="reveal delay-3">
      <div class="cta-form-wrap">
        <div class="cta-form-label">Send a message</div>
        <form id="cta-contact-form" novalidate>
          <div class="form-row">
            <div>
              <label class="field-label" for="contact_name">Name <span>*</span></label>
              <input class="form-input" type="text" id="contact_name" name="contact_name" placeholder="Your full name" required>
            </div>
            <div>
              <label class="field-label" for="contact_phone">Phone</label>
              <input class="form-input" type="tel" id="contact_phone" name="contact_phone" placeholder="+44 ...">
            </div>
          </div>
          <div class="form-group">
            <label class="field-label" for="contact_email">Email <span>*</span></label>
            <input class="form-input" type="email" id="contact_email" name="contact_email" placeholder="you@company.com" required>
          </div>
          <div class="form-group">
            <label class="field-label" for="contact_message">Message</label>
            <textarea class="form-textarea" id="contact_message" name="contact_message" rows="4" placeholder="Tell us about your Workday environment..."></textarea>
          </div>
          <div class="form-group">
            <button type="submit" class="form-submit">
              Book My Complimentary Health Check
              <?php echo z_arrow( 14 ); ?>
            </button>
          </div>
          <div id="form-message" class="form-msg" role="alert"></div>
        </form>
      </div>
    </div>

  </div>
</section>

<script>
(function(){
  function animateCount(el){
    var orig = el.textContent, num = parseInt(orig);
    if(isNaN(num)||num<5) return;
    var suffix = orig.replace(/^\d+/,''), dur = 1100, t0 = performance.now();
    (function step(t){
      var p = Math.min((t-t0)/dur,1), e = 1-Math.pow(1-p,3);
      el.textContent = Math.round(e*num)+suffix;
      if(p<1) requestAnimationFrame(step); else el.textContent = orig;
    })(performance.now());
  }
  var obs = new IntersectionObserver(function(entries){
    entries.forEach(function(en){
      if(en.isIntersecting){
        en.target.querySelectorAll('.count-up').forEach(animateCount);
        obs.unobserve(en.target);
      }
    });
  },{threshold:0.4});
  document.querySelectorAll('.stats-grid').forEach(function(g){ obs.observe(g); });

  // Arc animations
  var circum = 138.2;
  var arcObs = new IntersectionObserver(function(entries){
    entries.forEach(function(en){
      if(!en.isIntersecting) return;
      en.target.querySelectorAll('.cs-arc-fill').forEach(function(arc){
        var pct = parseFloat(arc.dataset.pct)||0;
        var offset = circum - (pct/100)*circum;
        arc.style.transition = 'stroke-dashoffset 1.2s cubic-bezier(0.22,1,0.36,1)';
        arc.style.strokeDashoffset = offset;
      });
      arcObs.unobserve(en.target);
    });
  },{threshold:0.3});
  document.querySelectorAll('.cs-tiles-grid').forEach(function(g){ arcObs.observe(g); });

  // AI foundations layer stagger
  var layerObs = new IntersectionObserver(function(entries){
    entries.forEach(function(en){
      if(!en.isIntersecting) return;
      var layers = en.target.querySelectorAll('.reveal-layer');
      layers.forEach(function(l,i){
        setTimeout(function(){ l.classList.add('layer-visible'); }, i*120);
      });
      layerObs.unobserve(en.target);
    });
  },{threshold:0.2});
  document.querySelectorAll('.ai-foundations-diagram').forEach(function(d){ layerObs.observe(d); });
})();
</script>

</main>
<?php get_footer(); ?>
