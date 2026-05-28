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

  <div class="container hero-relative">
    <div class="hero-grid">

      <!-- Left: copy -->
      <div class="hero-left">
        <div class="hero-eyebrow">
          <span class="pulse-dot redorange"></span>
          Your All-in-One Workday Partner
        </div>

        <h1 class="hero-headline">
          <span class="kline">
            <span class="kline-inner kline-light"><?php echo esc_html( zf( 'hero_h1', 'Transforming Workday Into' ) ); ?></span>
          </span>
          <span class="kline">
            <span class="kline-inner kline-bold"><?php echo esc_html( zf( 'hero_h2', 'Business Value.' ) ); ?></span>
          </span>
        </h1>

        <p class="hero-body">
          <?php echo esc_html( zf( 'hero_body', 'Go-live is just the beginning. Zeneesha partners with you from pre-deployment through long-term support - so Workday keeps delivering as your business grows and changes.' ) ); ?>
        </p>

        <div class="hero-ctas">
          <div class="cta-with-note">
            <a href="#talk" class="btn-primary">
              <?php echo esc_html( zf( 'hero_cta', 'Request a Complimentary Workday Health Checkup' ) ); ?>
              <?php echo z_arrow( 14 ); ?>
            </a>
            <p class="cta-note-tag">Actionable insights. Zero sales pitch.</p>
          </div>
          <a href="#solutions" class="btn-ghost">
            See How We Help
            <?php echo z_arrow( 13 ); ?>
          </a>
        </div>
      </div>

      <!-- Right: hero image with vanilla-tilt -->
      <div class="hero-right">
        <div class="hero-img-tilt"
             data-tilt
             data-tilt-max="8"
             data-tilt-speed="600"
             data-tilt-perspective="1000"
             data-tilt-glare
             data-tilt-max-glare="0.12">
          <img src="https://images.unsplash.com/photo-1542744094-3a31f272c490?auto=format&fit=crop&w=900&q=80"
               alt="Professional team working together"
               class="hero-img" loading="eager">
          <div class="hero-img-badge">
            <span class="pulse-dot redorange" style="flex-shrink:0"></span>
            <span>Your All-in-One Workday Partner</span>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>


<!-- ══════════════════════════════════════════════════════
     TRUST
══════════════════════════════════════════════════════ -->
<section id="trust" class="section-trust" style="border-bottom:1px solid rgba(30,58,138,.07)">
  <div class="trust-badge-wrap">
    <h2 class="trust-heading reveal">
      <?php echo esc_html( zf( 'trust_heading', 'Designed for Businesses That Run on Workday.' ) ); ?>
    </h2>
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
    $stats = [
      [ '15+',   "Senior Consultant\nExperience", '<rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 21V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v16"/>' ],
      [ '100%',  "Certified\nConsultants",        '<circle cx="12" cy="8" r="6"/><path d="M15.477 12.89L17 22l-5-3-5 3 1.523-9.11"/>' ],
      [ '50K+',  "Global Employees\nSupported",   '<path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87"/><path d="M16 3.13a4 4 0 010 7.75"/>' ],
      [ '95%',   "Client\nRetention Rate",        '<polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/><polyline points="17 6 23 6 23 12"/>' ],
      [ '200K+', "AMS Hours\nDelivered",          '<circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>' ],
    ];
    foreach ( $stats as $i => $s ) : ?>
      <div class="stat-item reveal" style="transition-delay:<?php echo $i * 60; ?>ms">
        <div class="stat-icon" aria-hidden="true">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><?php echo $s[2]; ?></svg>
        </div>
        <div class="stat-value"><?php echo esc_html( $s[0] ); ?></div>
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

    <div class="reveal delay-1" style="display:grid;grid-template-columns:6fr 5fr;gap:1.5rem;margin-bottom:2.5rem;align-items:end">
      <h2 class="section-heading">When Workday starts creating more work.</h2>
      <p class="section-sub">Choose what your team is facing. See how Zeneesha turns Workday friction into a clearer way forward.</p>
    </div>

    <!-- Gartner stat bar -->
    <div class="challenges-stat-bar reveal delay-2">
      <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="var(--navy)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="flex-shrink:0;margin-top:2px" aria-hidden="true"><circle cx="12" cy="12" r="10"/><path d="M12 8v4M12 16h.01"/></svg>
      <p>By 2027, more than 70% of recently implemented ERP initiatives are expected to fall short of their original business case goals. <a href="https://www.gartner.com/" target="_blank" rel="noopener noreferrer" style="color:var(--sky2);font-style:italic;font-size:13px">source: Gartner</a></p>
    </div>

  </div>

  <!-- Parallax sticky-stack cards -->
  <?php
  $challenge_cards = [
    [
      'tag'   => 'Recurring tickets',
      'title' => 'Recurring tickets',
      'sub'   => 'The same issues keep coming back, draining time and attention.',
      'desc'  => 'Zeneesha helps identify the root cause behind repeat tickets, so teams can fix the pattern - not just the symptom.',
      'color' => '#E8472C',
      'img'   => 'https://images.unsplash.com/photo-1553484771-371a605b060b?auto=format&fit=crop&w=1200&q=80',
      'icon'  => '<path d="M1 4v6h6"/><path d="M23 20v-6h-6"/><path d="M20.49 9A9 9 0 005.64 5.64L1 10m22 4l-4.64 4.36A9 9 0 013.51 15"/>',
    ],
    [
      'tag'   => 'Manual workarounds',
      'title' => 'Manual workarounds',
      'sub'   => 'Teams build side processes when Workday no longer fits how work happens.',
      'desc'  => 'Zeneesha reviews workflows and helps bring processes back into Workday, reducing reliance on spreadsheets, side tools, and manual fixes.',
      'color' => '#1E3A8A',
      'img'   => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=1200&q=80',
      'icon'  => '<path d="M14.7 6.3a1 1 0 000 1.4l1.6 1.6a1 1 0 001.4 0l3.77-3.77a6 6 0 01-7.94 7.94l-6.91 6.91a2.12 2.12 0 01-3-3l6.91-6.91a6 6 0 017.94-7.94l-3.76 3.76z"/>',
    ],
    [
      'tag'   => 'Reporting delays',
      'title' => 'Reporting delays',
      'sub'   => 'Decisions get made on instinct because the data is not ready in time.',
      'desc'  => 'Zeneesha improves reporting visibility and data flow, so leaders can access clearer answers when they need them.',
      'color' => '#F57C1F',
      'img'   => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=1200&q=80',
      'icon'  => '<line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/>',
    ],
    [
      'tag'   => 'Low adoption',
      'title' => 'Low adoption',
      'sub'   => 'Employees have access, but not the confidence to use Workday effectively.',
      'desc'  => 'Zeneesha strengthens adoption through better guidance, practical enablement and processes that fit how people actually work.',
      'color' => '#1E3A8A',
      'img'   => 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=1200&q=80',
      'icon'  => '<path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87"/><path d="M16 3.13a4 4 0 010 7.75"/>',
    ],
    [
      'tag'   => 'Release fatigue',
      'title' => 'Release fatigue',
      'sub'   => 'New updates arrive faster than teams can assess and adopt them.',
      'desc'  => 'Zeneesha helps prioritise the releases that matter, turning Workday updates into planned improvements instead of disruption.',
      'color' => '#E8472C',
      'img'   => 'https://images.unsplash.com/photo-1504868584819-f8e8b4b6d7e3?auto=format&fit=crop&w=1200&q=80',
      'icon'  => '<polyline points="1 4 1 10 7 10"/><path d="M3.51 15a9 9 0 102.13-9.36L1 10"/>',
    ],
    [
      'tag'   => 'Underutilised capability',
      'title' => 'Underutilised capability',
      'sub'   => 'Features you already own sit dormant while teams consider new tools.',
      'desc'  => 'Zeneesha helps uncover underused Workday capabilities that can improve performance, efficiency and business value.',
      'color' => '#3B9EDB',
      'img'   => 'https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&w=1200&q=80',
      'icon'  => '<path d="M21 16V8a2 2 0 00-1-1.73l-7-4a2 2 0 00-2 0l-7 4A2 2 0 003 8v8a2 2 0 001 1.73l7 4a2 2 0 002 0l7-4A2 2 0 0021 16z"/><polyline points="3.27 6.96 12 12.01 20.73 6.96"/><line x1="12" y1="22.08" x2="12" y2="12"/>',
    ],
  ];
  ?>

  <!-- Flip cards grid — click to reveal how Zeneesha helps -->
  <div class="container">
    <div class="cflip-grid">
      <?php foreach ( $challenge_cards as $i => $card ) : ?>
        <div class="cflip-wrap reveal-card" style="--reveal-delay:<?php echo $i % 2 === 0 ? '0s' : '.12s'; ?>">
          <div class="cflip" id="cflip-<?php echo $i; ?>">

            <!-- FRONT -->
            <div class="cflip-front" aria-hidden="false">
              <img src="<?php echo esc_url( $card['img'] ); ?>"
                   alt="" class="cstack-bg"
                   loading="<?php echo $i < 2 ? 'eager' : 'lazy'; ?>"
                   aria-hidden="true">
              <div class="cstack-overlay" style="background:linear-gradient(160deg,<?php echo esc_attr( $card['color'] ); ?>dd 0%,<?php echo esc_attr( $card['color'] ); ?>66 40%,rgba(13,30,74,.75) 100%)"></div>
              <div class="cstack-icon-chip">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><?php echo $card['icon']; ?></svg>
              </div>
              <div class="cstack-front-body">
                <span class="cstack-tag"><?php echo esc_html( $card['tag'] ); ?></span>
                <h3 class="cstack-title"><?php echo esc_html( $card['title'] ); ?></h3>
                <p class="cstack-sub"><?php echo esc_html( $card['sub'] ); ?></p>
                <button class="cstack-flip-btn" data-flip="cflip-<?php echo $i; ?>" aria-label="How Zeneesha helps with <?php echo esc_attr( $card['title'] ); ?>">
                  How Zeneesha helps
                  <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </button>
              </div>
            </div>

            <!-- BACK -->
            <div class="cflip-back" style="background:<?php echo esc_attr( $card['color'] ); ?>" aria-hidden="true">
              <div class="cflip-back-inner">
                <div class="cflip-back-icon">
                  <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><?php echo $card['icon']; ?></svg>
                </div>
                <h3 class="cflip-back-title"><?php echo esc_html( $card['title'] ); ?></h3>
                <p class="cflip-back-desc"><?php echo esc_html( $card['desc'] ); ?></p>
                <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="cflip-back-cta">
                  Talk to Zeneesha
                  <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
              </div>
              <button class="cflip-back-close" data-flip="cflip-<?php echo $i; ?>" aria-label="Back to <?php echo esc_attr( $card['title'] ); ?>">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
                Back
              </button>
            </div>

          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>

  <script>
  (function(){
    // Scroll-reveal: cards fade + slide up as they enter viewport
    if('IntersectionObserver' in window){
      var obs = new IntersectionObserver(function(entries){
        entries.forEach(function(e){
          if(e.isIntersecting){ e.target.classList.add('is-visible'); obs.unobserve(e.target); }
        });
      }, {threshold:0.12, rootMargin:'0px 0px -40px 0px'});
      document.querySelectorAll('.reveal-card').forEach(function(el){ obs.observe(el); });
    } else {
      document.querySelectorAll('.reveal-card').forEach(function(el){ el.classList.add('is-visible'); });
    }

    // Flip on button click
    document.querySelectorAll('[data-flip]').forEach(function(btn){
      btn.addEventListener('click', function(e){
        e.stopPropagation();
        var card = document.getElementById(this.dataset.flip);
        if(!card) return;
        var isFlipped = card.classList.toggle('is-flipped');
        card.querySelector('.cflip-front').setAttribute('aria-hidden', isFlipped ? 'true' : 'false');
        card.querySelector('.cflip-back').setAttribute('aria-hidden',  isFlipped ? 'false' : 'true');
      });
    });

    // Also allow clicking anywhere on the front face to flip (robustness fix)
    document.querySelectorAll('.cflip').forEach(function(card){
      card.addEventListener('click', function(e){
        if(e.target.closest('[data-flip]')) return;
        if(e.target.closest('.cflip-back-cta')) return;
        if(card.classList.contains('is-flipped')) return;
        card.classList.add('is-flipped');
        card.querySelector('.cflip-front').setAttribute('aria-hidden', 'true');
        card.querySelector('.cflip-back').setAttribute('aria-hidden', 'false');
      });
    });
  })();
  </script>

  <div class="container">
    <p class="challenges-footer reveal delay-3">
      Small signs often reveal bigger opportunities. Zeneesha uncover gaps, reduce friction and shape a practical roadmap for improvement.
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
      <h2 class="section-heading">Wherever you are with Workday today, Zeneesha connects the next step with the right expertise.</h2>
      <p class="section-sub">Zeneesha brings the expertise, innovation, and strategic guidance needed to maximise the value of Workday at every stage.</p>
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
        'slug'     => 'sol-01-implementation',
        'title'    => 'Implementation',
        'color'    => '#1E3A8A',
        'tagline'  => 'Advisory, planning, migration, and go-live support to start Workday with confidence.',
        'desc'     => 'A Workday implementation sets the rules your organisation will live by for years. Zeneesha ensures those rules are right — configured for how your business actually works, not how the default template assumes it does.',
        'tags'     => [ 'Workday HCM', 'Finance', 'Adaptive Planning', 'Data Migration' ],
        'outcomes' => [
          'Configured for your processes, not just the defaults.',
          'Data migrated cleanly — no surprises in month one.',
          'Team trained and genuinely confident at go-live.',
        ],
      ],
      [
        'num'      => '02',
        'slug'     => 'sol-02-ams-support',
        'title'    => 'AMS & Support',
        'color'    => '#3B9EDB',
        'tagline'  => 'Health checks, releases, reporting, and enhancements to keep Workday improving.',
        'desc'     => "After go-live, the real work starts. Change requests accumulate, releases introduce complexity, and your team can't be Workday experts on top of everything else. Zeneesha absorbs that pressure, fast, reliably, every time.",
        'tags'     => [ 'Incident Resolution', 'Release Management', 'Change Requests', 'Integrations' ],
        'outcomes' => [
          'Fast resolution for incidents and change requests.',
          'Workday release management handled end-to-end.',
          'A specialist team available when your team isn\'t.',
        ],
      ],
      [
        'num'      => '03',
        'slug'     => 'sol-03-maximise',
        'title'    => 'Maximise',
        'color'    => '#F57C1F',
        'tagline'  => 'Automation, analytics, integrations, and adoption to unlock more from Workday.',
        'desc'     => "There's a version of Workday that your organisation hasn't reached yet — one that answers leadership's questions instantly, eliminates manual work, and reflects how your business operates today. Zeneesha helps you get there.",
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

        <!-- Right: media panel -->
        <div class="sol-media-panel">
          <?php $tdir = get_template_directory_uri(); $slug = esc_attr( $svc['slug'] ); ?>
          <video class="sol-vid" autoplay loop muted playsinline>
            <source src="<?php echo $tdir; ?>/assets/vid/<?php echo $slug; ?>.mp4" type="video/mp4">
          </video>
          <img class="sol-img" src="<?php echo $tdir; ?>/assets/img/<?php echo $slug; ?>.webp" alt="<?php echo esc_attr( $svc['title'] ); ?> service" loading="lazy">
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
        <?php echo esc_html( zf( 'ai_h1', 'Workday AI: Hype or' ) ); ?>
        <span><?php echo esc_html( zf( 'ai_h2', 'Business Value?' ) ); ?></span>
      </h2>

      <p class="ai-body ai-body-1 reveal delay-2">
        <?php echo esc_html( zf( 'ai_body1', 'Most of the AI capability your organisation needs is already inside Workday. Zeneesha helps you find it, activate it and make it work for your business - responsibly and at the right pace.' ) ); ?>
      </p>

      <div class="ai-cta-row reveal delay-3">
        <a href="#talk" class="ai-btn">
          Explore AI-led Workday Improvement
          <?php echo z_arrow( 14 ); ?>
        </a>
      </div>
    </div>

    <!-- Right: module labels (no unapproved descriptions) -->
    <div class="reveal delay-2">
      <div class="ai-modules">
        <?php
        $modules = [
          [
            'label'   => 'HCM',
            'tagline' => 'Bring AI intelligence to every stage of the talent lifecycle.',
            'desc'    => 'We identify where AI can reduce manual effort across hiring, onboarding, workforce planning and manager workflows - then configure Workday to make it happen.',
            'color'   => '#3B9EDB',
          ],
          [
            'label'   => 'Finance',
            'tagline' => 'Unlock AI within your financial core.',
            'desc'    => "We surface where Workday's AI can improve close cycles, flag anomalies and sharpen spend visibility - so your Finance team acts on insight, not instinct.",
            'color'   => '#F57C1F',
          ],
          [
            'label'   => 'Adaptive Planning',
            'tagline' => 'Plan smarter with AI-driven forecasting.',
            'desc'    => "We help you unlock Workday Adaptive Planning's AI-driven scenario planning - so leadership has a single, trusted view that holds up in the boardroom, not three spreadsheets and a conversation.",
            'color'   => '#E8472C',
          ],
        ];
        foreach ( $modules as $m ) : ?>
          <div class="ai-module" style="border-left:3px solid <?php echo esc_attr( $m['color'] ); ?>">
            <div class="ai-module-label" style="color:<?php echo esc_attr( $m['color'] ); ?>"><?php echo esc_html( $m['label'] ); ?></div>
            <div class="ai-module-tagline"><?php echo esc_html( $m['tagline'] ); ?></div>
            <div class="ai-module-desc"><?php echo esc_html( $m['desc'] ); ?></div>
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
     TESTIMONIALS
══════════════════════════════════════════════════════ -->
<section id="testimonials" class="section-testimonials py-28">
  <div class="container">

    <div class="section-label reveal text-navy">
      <span class="section-label-line" style="background:var(--navy)"></span>
      Client Feedback
    </div>

    <h2 class="section-heading reveal delay-1">What clients say about Zeneesha.</h2>

    <?php
    $testimonials = [
      [
        'quote'   => 'Zeneesha helped us navigate a complex Workday rollout with the right expertise, flexibility and support. Their team was invaluable in helping make our Workday adoption a success.',
        'name'    => 'Georgina Taitt',
        'role'    => 'Head of Enterprise Apps',
        'company' => 'AQA',
        'color'   => '#E8472C',
      ],
      [
        'quote'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.',
        'name'    => 'Global HR Lead',
        'role'    => 'Global Talent Framework',
        'company' => 'Warner Music Group',
        'color'   => '#1E3A8A',
      ],
      [
        'quote'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.',
        'name'    => 'HR Technology Lead',
        'role'    => 'Workday Production Continuity',
        'company' => 'Booking.com',
        'color'   => '#3B9EDB',
      ],
      [
        'quote'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.',
        'name'    => 'Senior People Ops Director',
        'role'    => 'Skills-Led Workday Transformation',
        'company' => 'LEGO',
        'color'   => '#F57C1F',
      ],
    ];
    ?>

    <!-- Testimonial carousel — 2 cards visible, advances 1 at a time -->
    <div class="t-carousel-wrap">
      <div class="t-carousel-viewport">
        <div class="t-carousel-track" id="t-carousel-track">
          <?php foreach ( $testimonials as $i => $t ) : ?>
            <div class="t-card">
              <div class="t-card-top-bar" style="background:<?php echo esc_attr( $t['color'] ); ?>"></div>
              <div class="t-card-body">
                <div class="t-quote-mark" style="color:<?php echo esc_attr( $t['color'] ); ?>" aria-hidden="true">&#8220;</div>
                <p class="t-text"><?php echo esc_html( $t['quote'] ); ?></p>
                <div class="t-author">
                  <div class="t-avatar" style="background:<?php echo esc_attr( $t['color'] ); ?>20;color:<?php echo esc_attr( $t['color'] ); ?>">
                    <?php echo esc_html( mb_substr( $t['name'], 0, 1 ) ); ?>
                  </div>
                  <div>
                    <div class="t-name"><?php echo esc_html( $t['name'] ); ?></div>
                    <div class="t-role"><?php echo esc_html( $t['role'] ); ?> &middot; <?php echo esc_html( $t['company'] ); ?></div>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>

      <div class="t-carousel-nav">
        <button class="t-carousel-btn" id="t-prev" aria-label="Previous testimonial">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
        </button>
        <div class="t-carousel-dots" id="t-dots"></div>
        <button class="t-carousel-btn" id="t-next" aria-label="Next testimonial">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </button>
      </div>
    </div>

  </div>

  <script>
  (function(){
    var viewport  = document.querySelector('.t-carousel-viewport');
    var track     = document.getElementById('t-carousel-track');
    var prev      = document.getElementById('t-prev');
    var next      = document.getElementById('t-next');
    var dotsEl    = document.getElementById('t-dots');
    if(!track) return;

    // Build infinite-loop clone blocks
    var origCards = Array.from(track.querySelectorAll('.t-card'));
    var N = origCards.length;
    if(N < 2) return;

    // Prepend clones of all originals (reversed so order is correct)
    origCards.slice().reverse().forEach(function(c){
      track.insertBefore(c.cloneNode(true), track.firstChild);
    });
    // Append clones of all originals
    origCards.forEach(function(c){
      track.appendChild(c.cloneNode(true));
    });

    var vOff     = N; // start at first original card
    var autoTimer;
    var snapping = false;

    // Build dots (N dots for original cards only)
    for(var d = 0; d < N; d++){
      var dot = document.createElement('button');
      dot.className = 't-dot' + (d === 0 ? ' active' : '');
      dot.setAttribute('aria-label', 'Go to testimonial ' + (d + 1));
      dot.dataset.idx = d;
      dotsEl.appendChild(dot);
    }

    function getCardWidth(){
      var all  = track.querySelectorAll('.t-card');
      var card = all[N];
      if(!card) return 400;
      var gap = parseFloat(window.getComputedStyle(track).columnGap) || 24;
      return card.offsetWidth + gap;
    }

    function updateDots(){
      var realIdx = ((vOff - N) % N + N) % N;
      dotsEl.querySelectorAll('.t-dot').forEach(function(d, i){
        d.classList.toggle('active', i === realIdx);
      });
    }

    function setTranslate(animated){
      if(!animated) track.style.transition = 'none';
      track.style.transform = 'translateX(-' + (vOff * getCardWidth()) + 'px)';
      if(!animated){ track.offsetHeight; track.style.transition = ''; }
    }

    function goTo(newVOff){
      vOff = newVOff;
      setTranslate(true);
      updateDots();
    }

    track.addEventListener('transitionend', function(){
      if(snapping) return;
      if(vOff >= 2 * N){
        snapping = true; vOff -= N; setTranslate(false); snapping = false;
      } else if(vOff < N){
        snapping = true; vOff += N; setTranslate(false); snapping = false;
      }
    });

    function startAuto(){ clearInterval(autoTimer); autoTimer = setInterval(function(){ goTo(vOff + 1); }, 5000); }

    prev.addEventListener('click', function(){ goTo(vOff - 1); startAuto(); });
    next.addEventListener('click', function(){ goTo(vOff + 1); startAuto(); });
    dotsEl.addEventListener('click', function(e){
      if(e.target.classList.contains('t-dot')){ goTo(N + parseInt(e.target.dataset.idx)); startAuto(); }
    });
    if(viewport){
      viewport.addEventListener('mouseenter', function(){ clearInterval(autoTimer); });
      viewport.addEventListener('mouseleave', startAuto);
    }
    window.addEventListener('resize', function(){ setTranslate(false); });

    setTranslate(false);
    startAuto();
  })();
  </script>

</section>


<!-- ══════════════════════════════════════════════════════
     RESULTS / CASE STUDIES
══════════════════════════════════════════════════════ -->
<section id="results" class="section-results py-28">
  <div class="container">

    <div class="section-label reveal text-redorange">
      <span class="section-label-line" style="background:var(--redorange)"></span>
      Client Outcomes
    </div>

    <div class="results-header reveal delay-1">
      <h2 class="section-heading">Proof that Workday can work harder.</h2>
      <p class="section-sub">Explore how Zeneesha supports complex Workday programmes across reporting, talent, payroll, transformation and global HR operations.</p>
    </div>

    <!-- Case study carousel -->
    <div class="cs-carousel-wrap">
      <div class="cs-carousel-viewport">
        <div class="cs-carousel-track" id="cs-carousel-track">

          <!-- Card 1: KION Group -->
          <div class="cs-card">
            <div class="cs-card-top-bar" style="background:#1E3A8A"></div>
            <div class="cs-card-body">
              <div class="cs-card-header">
                <div class="cs-logo-badge" style="background:#1E3A8A" aria-hidden="true">KI</div>
                <div>
                  <div class="cs-client-name">KION Group</div>
                  <div class="cs-client-type">Manufacturing &middot; Global Enterprise</div>
                </div>
              </div>
              <p class="cs-card-lead"><strong style="color:var(--navy);font-weight:500">Turning fragmented HR data into one trusted Workday reporting layer.</strong></p>
              <p class="cs-card-body-text">KION needed clearer workforce, headcount and engagement insights across a complex global HR environment spanning over 100 countries. Zeneesha supported the move to Workday PRISM Analytics, including ETL flow, security design, executive dashboards and discovery boards.</p>
              <div class="cs-impact-row">
                <div class="cs-impact-label">Impact</div>
                <p class="cs-impact-text">A centralised Workday reporting foundation with stronger leadership visibility, reduced data duplication and improved stakeholder engagement.</p>
              </div>
              <div class="cs-card-footer">
                <a href="#talk" class="cs-read-more">Read KION Story <?php echo z_arrow( 13 ); ?></a>
              </div>
            </div>
          </div>

          <!-- Card 2: Warner Music Group -->
          <div class="cs-card">
            <div class="cs-card-top-bar" style="background:#E8472C"></div>
            <div class="cs-card-body">
              <div class="cs-card-header">
                <div class="cs-logo-badge" style="background:#E8472C" aria-hidden="true">WM</div>
                <div>
                  <div class="cs-client-name">Warner Music Group</div>
                  <div class="cs-client-type">Media &middot; Global Enterprise</div>
                </div>
              </div>
              <p class="cs-card-lead"><strong style="color:var(--navy);font-weight:500">Bringing structure to a global talent transformation.</strong></p>
              <p class="cs-card-body-text">Warner Music Group needed to launch a global Talent Framework across job architecture, pay architecture, performance, learning and talent acquisition, while keeping business, technology and delivery partners aligned. Zeneesha acted as the technology lead, translating business requirements into scalable Workday configuration and reducing delivery risk.</p>
              <div class="cs-impact-row">
                <div class="cs-impact-label">Impact</div>
                <p class="cs-impact-text">A successful rollout of global job and pay architecture, stronger talent processes and a more future-ready Workday foundation.</p>
              </div>
              <div class="cs-card-footer">
                <a href="#talk" class="cs-read-more">Read WMG Story <?php echo z_arrow( 13 ); ?></a>
              </div>
            </div>
          </div>

          <!-- Card 3: Slaughter and May -->
          <div class="cs-card">
            <div class="cs-card-top-bar" style="background:#3B9EDB"></div>
            <div class="cs-card-body">
              <div class="cs-card-header">
                <div class="cs-logo-badge" style="background:#3B9EDB" aria-hidden="true">SM</div>
                <div>
                  <div class="cs-client-name">Slaughter and May</div>
                  <div class="cs-client-type">Legal &middot; Professional Services</div>
                </div>
              </div>
              <p class="cs-card-lead"><strong style="color:var(--navy);font-weight:500">Keeping a Workday HCM migration on track without extending go-live.</strong></p>
              <p class="cs-card-body-text">During the move from SelectHR to Workday HCM, Slaughter and May needed reliable payroll reporting, secure data feeds, testing support and downstream system readiness. Zeneesha supported reporting, integrations, data validation, regression testing and process guidance across HCM and Absence.</p>
              <div class="cs-impact-row">
                <div class="cs-impact-label">Impact</div>
                <p class="cs-impact-text">End-to-end testing and regression activities were completed within the planned timeline, keeping the project on track for go-live with no extension.</p>
              </div>
              <div class="cs-card-footer">
                <a href="#talk" class="cs-read-more">Read Slaughter and May Story <?php echo z_arrow( 13 ); ?></a>
              </div>
            </div>
          </div>

          <!-- Card 4: AQA -->
          <div class="cs-card">
            <div class="cs-card-top-bar" style="background:#E8472C"></div>
            <div class="cs-card-body">
              <div class="cs-card-header">
                <div class="cs-logo-badge" style="background:#E8472C" aria-hidden="true">AQ</div>
                <div>
                  <div class="cs-client-name">AQA</div>
                  <div class="cs-client-type">Education &middot; Non-profit</div>
                </div>
              </div>
              <p class="cs-card-lead"><strong style="color:var(--navy);font-weight:500">From Workday backlog to faster delivery.</strong></p>
              <p class="cs-card-body-text">AQA's HCM support team was facing a growing backlog of Workday requests and defects across recruitment and absence. Zeneesha introduced a clearer prioritisation and intake process to improve triage, communication and delivery focus.</p>
              <div class="cs-impact-row">
                <div class="cs-impact-label">Impact</div>
                <p class="cs-impact-text">Sprint turnaround increased by 700%, from 2 to 16 tickets per sprint.</p>
              </div>
              <div class="cs-card-footer">
                <a href="#talk" class="cs-read-more">Read AQA Story <?php echo z_arrow( 13 ); ?></a>
              </div>
            </div>
          </div>

        </div>
      </div>

      <!-- Carousel nav -->
      <div class="cs-carousel-nav">
        <button class="cs-carousel-btn" id="cs-prev" aria-label="Previous case study">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
        </button>
        <div class="cs-carousel-dots" id="cs-dots"></div>
        <button class="cs-carousel-btn" id="cs-next" aria-label="Next case study">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </button>
      </div>
    </div>

  </div>
</section>

<script>
(function(){
  var viewport = document.querySelector('.cs-carousel-viewport');
  var track    = document.getElementById('cs-carousel-track');
  var prev     = document.getElementById('cs-prev');
  var next     = document.getElementById('cs-next');
  var dotsEl   = document.getElementById('cs-dots');
  if(!track) return;

  // Build infinite-loop clone blocks
  var origCards = Array.from(track.querySelectorAll('.cs-card'));
  var N = origCards.length;
  if(N < 2) return;

  origCards.slice().reverse().forEach(function(c){
    track.insertBefore(c.cloneNode(true), track.firstChild);
  });
  origCards.forEach(function(c){
    track.appendChild(c.cloneNode(true));
  });

  var vOff     = N;
  var autoTimer;
  var snapping = false;

  // Build dots
  for(var d=0;d<N;d++){
    var dot = document.createElement('button');
    dot.className = 'cs-dot' + (d===0?' active':'');
    dot.setAttribute('aria-label','Go to case study '+(d+1));
    dot.dataset.idx = d;
    dotsEl.appendChild(dot);
  }

  function getCardWidth(){
    var all  = track.querySelectorAll('.cs-card');
    var card = all[N];
    if(!card) return 500;
    var gap = parseFloat(window.getComputedStyle(track).columnGap) || 24;
    return card.offsetWidth + gap;
  }

  function updateDots(){
    var realIdx = ((vOff - N) % N + N) % N;
    dotsEl.querySelectorAll('.cs-dot').forEach(function(d,i){
      d.classList.toggle('active', i===realIdx);
    });
  }

  function setTranslate(animated){
    if(!animated) track.style.transition = 'none';
    track.style.transform = 'translateX(-' + (vOff * getCardWidth()) + 'px)';
    if(!animated){ track.offsetHeight; track.style.transition = ''; }
  }

  function goTo(newVOff){
    vOff = newVOff;
    setTranslate(true);
    updateDots();
  }

  track.addEventListener('transitionend', function(){
    if(snapping) return;
    if(vOff >= 2 * N){
      snapping = true; vOff -= N; setTranslate(false); snapping = false;
    } else if(vOff < N){
      snapping = true; vOff += N; setTranslate(false); snapping = false;
    }
  });

  function startAuto(){
    clearInterval(autoTimer);
    autoTimer = setInterval(function(){ goTo(vOff+1); }, 4500);
  }

  prev.addEventListener('click', function(){ goTo(vOff-1); startAuto(); });
  next.addEventListener('click', function(){ goTo(vOff+1); startAuto(); });
  dotsEl.addEventListener('click', function(e){
    if(e.target.classList.contains('cs-dot')){ goTo(N + parseInt(e.target.dataset.idx)); startAuto(); }
  });
  if(viewport){
    viewport.addEventListener('mouseenter', function(){ clearInterval(autoTimer); });
    viewport.addEventListener('mouseleave', startAuto);
  }

  window.addEventListener('resize', function(){ setTranslate(false); });
  setTranslate(false);
  startAuto();
})();
</script>


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
            'a' => 'If you are seeing recurring issues, manual workarounds, reporting delays or low adoption, it may be time to review the causes of friction.',
          ],
          [
            'q' => 'Can Zeneesha support Workday after implementation?',
            'a' => 'Yes. Zeneesha supports post-go-live Workday environments through AMS, optimisation, reporting, releases, integrations, automation and adoption support.',
          ],
          [
            'q' => 'We already have an internal Workday team. Can Zeneesha still support us?',
            'a' => 'Yes. Zeneesha works alongside internal teams with specialist expertise, extra capacity and a clearer improvement roadmap.',
          ],
          [
            'q' => 'Which Workday modules does Zeneesha support?',
            'a' => 'Zeneesha supports key Workday modules including HCM, Finance, Adaptive Planning and Analytics, with expertise across reporting and integrations.',
          ],
          [
            'q' => 'What happens during a Workday Health Checkup?',
            'a' => 'Zeneesha reviews your setup, processes, data, reporting, integrations and adoption to identify gaps, risks and opportunities — then provides a practical optimisation roadmap.',
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
        <?php echo esc_html( zf( 'cta_heading', 'How optimised is your Workday performance?' ) ); ?>
      </h2>

      <p class="cta-body reveal delay-2">
        <?php echo esc_html( zf( 'cta_body', 'Zeneesha uncovers operational gaps, reduces friction, and shapes a clear roadmap for continuous improvement.' ) ); ?>
      </p>

      <div class="cta-note reveal delay-3">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#10b981" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 6L9 17l-5-5"/></svg>
        No cost &middot; No obligation &middot; Typical reply within one working day
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
            <div class="cta-with-note">
              <button type="submit" class="form-submit">
                Request a Workday Health Checkup
                <?php echo z_arrow( 14 ); ?>
              </button>
              <p class="cta-note-tag">Actionable insights. Zero sales pitch.</p>
            </div>
          </div>
          <div id="form-message" class="form-msg" role="alert"></div>
        </form>
      </div>
    </div>

  </div>
</section>

<!-- vanilla-tilt for hero image -->
<script src="https://cdn.jsdelivr.net/npm/vanilla-tilt@1.8.1/dist/vanilla-tilt.min.js" defer></script>

</main>
<?php get_footer(); ?>
