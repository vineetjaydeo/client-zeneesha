<?php
/**
 * Template Name: Homepage V3
 */
get_header(); ?>
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
          Workday optimisation and support
        </div>

        <h1 class="hero-headline">
          <span class="kline">
            <span class="kline-inner kline-bold">Make Workday Work.</span>
          </span>
        </h1>

        <div class="hero-body hero-body-stack">
          <p>You invested in Workday to make life easier.</p>
          <p>If you're still wrestling with adoption, support tickets, reporting headaches or governance challenges, something has gone wrong.</p>
          <p>Zeneesha helps organisations optimise, support and evolve Workday so it delivers the value it promised in the first place.</p>
        </div>

      </div>

      <!-- Right: CTAs -->
      <div class="hero-right">
        <div class="hero-action-panel">
          <a href="#talk" class="hero-action hero-action-primary">
            <span>
              <strong>Book Your Free Workday Health Check</strong>
            </span>
            <?php echo z_arrow( 16 ); ?>
          </a>
          <a href="#workday-calculator" class="hero-action hero-action-secondary">
            <span>
              <strong>Calculate The Cost Of Workday Inefficiency</strong>
            </span>
            <?php echo z_arrow( 16 ); ?>
          </a>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ══════════════════════════════════════════════════════
     CERTIFICATIONS
══════════════════════════════════════════════════════ -->
<section class="section-certs section-certs-home-v3 py-12" style="border-top:1px solid rgba(30,58,138,.08);border-bottom:1px solid rgba(30,58,138,.06)">
  <div class="container">
    <p class="certs-title">Accredited <span>&middot;</span> Certified <span>&middot;</span> Trusted</p>
    <div class="certs-grid">
      <?php
      $certs = [
        [ 'name'=>'Workday Sales Partner',    'img'=>'https://www.zeneesha.com/wp-content/uploads/2025/08/wday-partners-logo-sales-partner@4x.png',    'h'=>74 ],
        [ 'name'=>'Workday Services Partner', 'img'=>'https://www.zeneesha.com/wp-content/uploads/2025/08/wday-partners-logo-services-partner@4x.png', 'h'=>74 ],
        [ 'name'=>'IAF Member',               'img'=>'https://www.zeneesha.com/wp-content/uploads/2021/12/IAF-Logo.png',                                'h'=>68 ],
        [ 'name'=>'MSDUK',                    'img'=>'https://www.zeneesha.com/wp-content/uploads/2024/01/MSDNUK.png',                                  'h'=>48 ],
        [ 'name'=>'Cyber Essentials',         'img'=>'https://www.zeneesha.com/wp-content/uploads/2021/12/Cyber-Essentials-Logo_1.png',                 'h'=>74 ],
      ];
      foreach ( $certs as $c ) : ?>
        <div class="cert-item">
          <img src="<?php echo esc_url( $c['img'] ); ?>" alt="<?php echo esc_attr( $c['name'] ); ?>"
               style="height:<?php echo $c['h']; ?>px" loading="eager">
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ══════════════════════════════════════════════════════
     TRUST
══════════════════════════════════════════════════════ -->
<section id="trust" class="section-trust" style="border-bottom:1px solid rgba(30,58,138,.07)">
  <!-- Logo carousel -->
  <?php
  $ldir = get_template_directory_uri() . '/assets/img/logos/';
  $logo_items = [
    '<img src="' . $ldir . 'kion.png" alt="KION Group">',
    '<img src="' . $ldir . 'warner.svg" alt="Warner Music Group">',
    '<svg height="28" viewBox="0 0 160 28" fill="none" xmlns="http://www.w3.org/2000/svg" aria-label="Howdens"><text x="0" y="22" font-family="Jost,sans-serif" font-size="22" font-weight="600" letter-spacing="1" fill="currentColor">HOWDENS</text></svg>',
    '<img src="' . $ldir . 'aqa.svg" alt="AQA">',
    '<img src="' . $ldir . 'quadient.png" alt="Quadient">',
    '<img src="' . $ldir . 'slaughter.png" alt="Slaughter and May">',
  ];
  ?>
  <div class="logo-carousel-wrap">
    <div class="logo-track" id="logo-track">
      <?php foreach ( [ 1, 2, 3, 4 ] as $set ) : ?>
        <?php foreach ( $logo_items as $logo ) : ?>
          <div class="logo-item"<?php echo $set > 1 ? ' aria-hidden="true"' : ''; ?>><?php echo $logo; ?></div>
        <?php endforeach; ?>
      <?php endforeach; ?>
    </div>
  </div>
</section>


<!-- ══════════════════════════════════════════════════════
     CHALLENGES
══════════════════════════════════════════════════════ -->
<section id="challenges" class="section-challenges py-28">
  <div class="container">

    <div class="section-label reveal text-redorange">
      <span class="section-label-line" style="background:var(--redorange)"></span>
      Problem Section
    </div>

    <div class="problem-intro reveal delay-1">
      <h2 class="section-heading">Workday isn't the problem. The way it's being used probably is.</h2>
      <div class="problem-copy">
        <p class="section-sub">Most organisations don't wake up one morning and decide to optimise Workday. They usually reach that point after months or years of:</p>
        <ul class="problem-signals" aria-label="Common Workday warning signs">
          <li>Growing frustration</li>
          <li>Endless tickets</li>
          <li>Confusing processes</li>
          <li>Reporting issues</li>
          <li>"We'll look at that next quarter"</li>
        </ul>
        <p class="problem-familiar">Sounds familiar?</p>
      </div>
    </div>

  </div>

  <!-- Parallax sticky-stack cards -->
  <?php
  $challenge_cards = [
    [
      'title'   => 'Low Adoption',
      'lead'    => 'Employees have access to Workday.',
      'body'    => "That doesn't mean they're actually using it properly.",
      'bullets' => [
        'HR becomes the unofficial helpdesk',
        'Employees create workarounds',
        'Self-service never quite takes off',
        'Every process takes longer than it should',
      ],
      'color'   => '#1E3A8A',
      'img'     => 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=1200&q=80',
      'icon'    => '<path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87"/><path d="M16 3.13a4 4 0 010 7.75"/>',
    ],
    [
      'title'   => 'HR Operational Inefficiency',
      'lead'    => "Your HR team didn't sign up to spend their week fixing processes.",
      'body'    => 'Yet here we are.',
      'bullets' => [
        'Higher HR workload',
        'Slower service delivery',
        'Reduced strategic focus',
        'Increased operating costs',
      ],
      'color'   => '#E8472C',
      'img'     => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=1200&q=80',
      'icon'    => '<path d="M14.7 6.3a1 1 0 000 1.4l1.6 1.6a1 1 0 001.4 0l3.77-3.77a6 6 0 01-7.94 7.94l-6.91 6.91a2.12 2.12 0 01-3-3l6.91-6.91a6 6 0 017.94-7.94l-3.76 3.76z"/>',
    ],
    [
      'title'   => 'Reporting Delays',
      'lead'    => "If every report requires detective work, something isn't working.",
      'body'    => '',
      'bullets' => [
        'Slow decision making',
        'Manual reporting effort',
        'Reduced visibility',
        'Leadership flying partially blind',
      ],
      'color'   => '#F57C1F',
      'img'     => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=1200&q=80',
      'icon'    => '<line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/>',
    ],
    [
      'title'   => 'Governance Challenges',
      'lead'    => "Workday environments don't become messy overnight.",
      'body'    => 'They drift.',
      'bullets' => [
        'Duplicate processes',
        'Security risks',
        'Configuration inconsistency',
        'Delayed projects',
      ],
      'color'   => '#1E3A8A',
      'img'     => 'https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&w=1200&q=80',
      'icon'    => '<path d="M21 16V8a2 2 0 00-1-1.73l-7-4a2 2 0 00-2 0l-7 4A2 2 0 003 8v8a2 2 0 001 1.73l7 4a2 2 0 002 0l7-4A2 2 0 0021 16z"/><polyline points="3.27 6.96 12 12.01 20.73 6.96"/><line x1="12" y1="22.08" x2="12" y2="12"/>',
    ],
    [
      'title'   => 'Ticket Backlogs',
      'lead'    => 'Constant firefighting is not a support strategy.',
      'body'    => '',
      'bullets' => [
        'Delayed improvements',
        'Burnout risk',
        'Reactive teams',
        'Lost optimisation opportunities',
      ],
      'color'   => '#E8472C',
      'img'     => 'https://images.unsplash.com/photo-1553484771-371a605b060b?auto=format&fit=crop&w=1200&q=80',
      'icon'    => '<path d="M1 4v6h6"/><path d="M23 20v-6h-6"/><path d="M20.49 9A9 9 0 005.64 5.64L1 10m22 4l-4.64 4.36A9 9 0 013.51 15"/>',
    ],
    [
      'title'   => 'Poor Manager Self-Service',
      'lead'    => 'Managers have enough on their plate already.',
      'body'    => '',
      'bullets' => [
        'Slower approvals',
        'Increased HR dependency',
        'Reduced productivity',
        'Frustrated teams',
      ],
      'color'   => '#3B9EDB',
      'img'     => 'https://images.unsplash.com/photo-1504868584819-f8e8b4b6d7e3?auto=format&fit=crop&w=1200&q=80',
      'icon'    => '<polyline points="1 4 1 10 7 10"/><path d="M3.51 15a9 9 0 102.13-9.36L1 10"/>',
    ],
  ];
  ?>

  <!-- Flip cards grid: click to reveal how Zeneesha helps -->
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
              <div class="cstack-overlay" style="background:linear-gradient(160deg,<?php echo esc_attr( $card['color'] ); ?>f2 0%,<?php echo esc_attr( $card['color'] ); ?>bb 45%,rgba(13,30,74,.92) 100%)"></div>
              <div class="cstack-icon-chip">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><?php echo $card['icon']; ?></svg>
              </div>
              <div class="cstack-front-body">
                <h3 class="cstack-title"><?php echo esc_html( $card['title'] ); ?></h3>
                <div class="cstack-intro">
                  <?php if ( ! empty( $card['body'] ) ) : ?>
                    <?php $body_is_short = strlen( $card['body'] ) <= 22; ?>
                    <?php if ( $body_is_short ) : ?>
                      <p class="cstack-lead"><?php echo esc_html( $card['lead'] ); ?> <span class="cstack-sub-inline"><?php echo esc_html( $card['body'] ); ?></span></p>
                    <?php else : ?>
                      <p class="cstack-lead"><?php echo esc_html( $card['lead'] ); ?></p>
                      <p class="cstack-sub"><?php echo esc_html( $card['body'] ); ?></p>
                    <?php endif; ?>
                  <?php else : ?>
                    <p class="cstack-lead"><?php echo esc_html( $card['lead'] ); ?></p>
                  <?php endif; ?>
                </div>
                <button class="cstack-flip-btn" data-flip="cflip-<?php echo $i; ?>" aria-label="See consequences for <?php echo esc_attr( $card['title'] ); ?>">
                  See consequences
                  <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </button>
              </div>
            </div>

            <!-- BACK -->
            <div class="cflip-back" style="background:<?php echo esc_attr( $card['color'] ); ?>" aria-hidden="true">
              <div class="cflip-back-inner">
                <h3 class="cflip-back-title"><?php echo esc_html( $card['title'] ); ?></h3>
                <div class="cflip-back-content">
                  <div class="cflip-section-title">Consequences</div>
                  <ul class="cflip-back-list">
                    <?php foreach ( $card['bullets'] as $bullet ) : ?>
                      <li><?php echo esc_html( $bullet ); ?></li>
                    <?php endforeach; ?>
                  </ul>
                </div>
                <div class="cflip-back-actions">
                  <a href="#talk" class="cflip-back-cta">
                    Book health check
                    <?php echo z_arrow( 13 ); ?>
                  </a>
                  <button class="cflip-back-close" type="button" aria-label="Flip back to <?php echo esc_attr( $card['title'] ); ?>">Back</button>
                </div>
              </div>
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

    // Desktop flip handled by CSS hover, no JS needed.
    // Mobile: tap to toggle.
    if(window.matchMedia('(hover:none) and (pointer:coarse)').matches){
      function setFlipState(card, on){
        card.classList.toggle('is-flipped', on);
        card.querySelector('.cflip-front').setAttribute('aria-hidden', on ? 'true' : 'false');
        card.querySelector('.cflip-back' ).setAttribute('aria-hidden', on ? 'false': 'true');
      }
      document.querySelectorAll('.cflip').forEach(function(card){
        card.addEventListener('click', function(e){
          if(e.target.closest('.cflip-back-cta')) return;
          if(e.target.closest('.cflip-back-close')){
            e.preventDefault();
            setFlipState(card, false);
            return;
          }
          setFlipState(card, !card.classList.contains('is-flipped'));
        });
      });
    }
  })();
  </script>

  <div class="container">
    <p class="challenges-footer reveal delay-3">
      Small signs often reveal bigger opportunities. Zeneesha uncovers gaps, reduces friction and shapes a practical roadmap for improvement.
    </p>
  </div>
</section>


<!-- ══════════════════════════════════════════════════════
     WORKDAY INEFFICIENCY CALCULATOR
══════════════════════════════════════════════════════ -->
<section id="workday-calculator" class="section-calculator py-28">
  <div class="container calculator-grid" data-workday-calculator>

    <div class="calculator-copy reveal">
      <div class="section-label text-redorange">
        <span class="section-label-line" style="background:var(--redorange)"></span>
        Workday Inefficiency Calculator
      </div>
      <h2 class="section-heading">Curious What Workday Inefficiency Is Costing You?</h2>
      <p class="section-sub">Most organisations can tell you exactly what Workday costs. Far fewer can tell you what inefficient Workday usage costs.</p>
      <p class="calculator-copy-note">Use our Workday Inefficiency Calculator to estimate the hidden operational costs affecting your organisation.</p>
      <a href="#talk" class="calculator-cta">
        Validate this with a free health check <?php echo z_arrow( 13 ); ?>
      </a>
    </div>

    <div class="calculator-panel reveal delay-1">
      <div class="calculator-control">
        <label for="employeeSlider">
          Number of Employees
          <strong data-calc-employee-count>3,000</strong>
        </label>
        <input type="range" id="employeeSlider" min="0" max="24" step="1" value="10" data-calc-slider>
        <div class="calculator-slider-labels">
          <span>500</span>
          <span>3,000</span>
          <span>10,000</span>
        </div>
      </div>

      <div class="calculator-result">
        <span>Estimated Annual Cost</span>
        <strong data-calc-total-cost>£1,174,000</strong>
      </div>

      <div class="calculator-breakdown" aria-label="Estimated Annual Impact By Area">
        <div class="calculator-impact">
          <span>Low Adoption</span>
          <strong data-calc-low-adoption>£390,000</strong>
        </div>
        <div class="calculator-impact">
          <span>HR Operational Inefficiency</span>
          <strong data-calc-hr-inefficiency>£300,000</strong>
        </div>
        <div class="calculator-impact">
          <span>Reporting Delays</span>
          <strong data-calc-reporting-delays>£104,000</strong>
        </div>
        <div class="calculator-impact">
          <span>Governance Challenges</span>
          <strong data-calc-governance-failures>£200,000</strong>
        </div>
        <div class="calculator-impact">
          <span>Ticket Backlog</span>
          <strong data-calc-ticket-backlog>£105,000</strong>
        </div>
        <div class="calculator-impact">
          <span>Poor Manager Self-Service</span>
          <strong data-calc-manager-self-service>£75,000</strong>
        </div>
      </div>

      <p class="calculator-disclaimer">
        This calculator provides an indicative estimate only, based on common Workday adoption, governance, reporting and support challenges. A Workday Health Check can validate the actual impact for your organisation.
      </p>
    </div>

  </div>
</section>


<!-- ══════════════════════════════════════════════════════
     SOLUTIONS
══════════════════════════════════════════════════════ -->
<section id="solutions" class="section-solutions py-28">
  <div class="container">

    <div class="solutions-header solutions-header--stacked reveal">
      <h2 class="section-heading">Our Services</h2>
      <p class="section-sub">We help organisations optimise, support and improve Workday through:</p>
    </div>

    <?php
    $service_capabilities = [
      [ 'label' => 'Global Project Delivery', 'accent' => '#1E3A8A', 'icon' => '<path d="M3 7h18"/><path d="M7 3v18"/><path d="M17 3v18"/><path d="M3 17h18"/>' ],
      [ 'label' => 'AMS Support', 'accent' => '#3B9EDB', 'icon' => '<path d="M4 14a8 8 0 1116 0"/><path d="M4 14v3a2 2 0 002 2h2"/><path d="M20 14v3a2 2 0 01-2 2h-2"/><path d="M9 19h6"/>' ],
      [ 'label' => 'Workday Optimisation', 'accent' => '#E8472C', 'icon' => '<path d="M4 19V5"/><path d="M4 19h16"/><path d="M8 15l3-3 3 2 5-7"/>' ],
      [ 'label' => 'Integrations', 'accent' => '#F57C1F', 'icon' => '<path d="M8 12h8"/><path d="M6 8a4 4 0 100 8"/><path d="M18 8a4 4 0 110 8"/>' ],
      [ 'label' => 'Release Readiness', 'accent' => '#E8472C', 'icon' => '<path d="M12 3l7 4v5c0 4.5-3 7.5-7 9-4-1.5-7-4.5-7-9V7l7-4z"/><path d="M9 12l2 2 4-5"/>' ],
      [ 'label' => 'Governance Reviews', 'accent' => '#1E3A8A', 'icon' => '<path d="M12 3l8 4-8 4-8-4 8-4z"/><path d="M4 11l8 4 8-4"/><path d="M4 15l8 4 8-4"/>' ],
      [ 'label' => 'Adoption Improvement', 'accent' => '#3B9EDB', 'icon' => '<path d="M16 21v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M19 8v6"/><path d="M16 11h6"/>' ],
      [ 'label' => 'Health Checks', 'accent' => '#F57C1F', 'icon' => '<path d="M20 6L9 17l-5-5"/><path d="M21 12a9 9 0 11-3-6.7"/>' ],
    ];
    ?>
    <div class="service-capability-grid reveal delay-1">
      <?php foreach ( $service_capabilities as $capability ) : ?>
        <article class="service-capability-item" style="--svc-accent:<?php echo esc_attr( $capability['accent'] ); ?>">
          <div class="service-capability-top">
            <div class="service-capability-icon">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><?php echo $capability['icon']; ?></svg>
            </div>
          </div>
          <div class="service-capability-body">
            <strong><?php echo esc_html( $capability['label'] ); ?></strong>
            <a href="#talk" class="service-capability-cta">
              Let&rsquo;s talk <?php echo z_arrow( 12 ); ?>
            </a>
          </div>
        </article>
      <?php endforeach; ?>
    </div>

  </div>
</section>


<!-- ══════════════════════════════════════════════════════
     WHY ZENEESHA
══════════════════════════════════════════════════════ -->
<section id="why-zeneesha" class="section-why py-28">
  <div class="container">
    <div class="why-hero reveal">
      <div>
        <div class="section-label text-redorange">
          <span class="section-label-line" style="background:var(--redorange)"></span>
          Why Zeneesha
        </div>
        <h2 class="section-heading">Workday Expertise. Without The Consultancy Theatre.</h2>
      </div>
      <div class="why-copy">
        <ul>
          <li>No unnecessary complexity.</li>
          <li>No oversized programmes.</li>
          <li>No surprises.</li>
        </ul>
      </div>
    </div>

    <?php
    $why_items = [
      [
        'title' => 'Dedicated Senior Ownership',
        'body'  => 'No rotating account managers or ticket voids. You get direct access to a named, senior Workday consultant who thoroughly understands your configuration baseline.',
      ],
      [
        'title' => 'Pre-emptive Risk Mapping',
        'body'  => 'We audit your environment and isolate hidden configuration gaps before major delivery begins. You will never have to explain a system surprise to your board.',
      ],
      [
        'title' => 'Deliberate Self-Sufficiency',
        'body'  => 'We engineer ourselves out of a job. Every engagement includes thorough documentation and hands-on knowledge transfer to make your internal team completely independent.',
      ],
      [
        'title' => 'Real, Board-Level ROI',
        'body'  => 'We have helped global enterprises like AQA and LEGO turn vague optimization stories into real, quantifiable business metrics.',
      ],
    ];
    ?>
    <div class="why-grid">
      <?php foreach ( $why_items as $i => $item ) : ?>
        <article class="why-card reveal" style="transition-delay:<?php echo esc_attr( ( $i + 1 ) * 80 ); ?>ms">
          <h3><?php echo esc_html( $item['title'] ); ?></h3>
          <p><?php echo wp_kses_post( $item['body'] ); ?></p>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>


<!-- ══════════════════════════════════════════════════════
     OUR APPROACH
══════════════════════════════════════════════════════ -->
<section id="approach" class="section-approach py-28">
  <div class="container approach-grid">
    <div class="approach-copy reveal">
      <div class="section-label text-redorange">
        <span class="section-label-line" style="background:var(--redorange)"></span>
        Our Approach
      </div>
      <h2 class="section-heading">Find The Iceberg Before You Hit It.</h2>
      <p>Most Workday projects look straightforward until someone uncovers six years of undocumented configuration.</p>
      <p>That's why we front-load discovery, validation and scope mapping before major delivery begins.</p>
      <p>Because we'd rather find the problems early than invoice you for finding them later.</p>
    </div>
    <div class="approach-result reveal delay-1">
      <span>The Result</span>
      <ul>
        <li>Reduced delivery risk</li>
        <li>Better planning</li>
        <li>Fewer surprises</li>
        <li>More predictable outcomes</li>
      </ul>
    </div>
  </div>
</section>


<!-- ══════════════════════════════════════════════════════
     WORKDAY HEALTH CHECK
══════════════════════════════════════════════════════ -->
<section id="health-check" class="section-health-check py-28">
  <div class="container health-check-grid">
    <div class="health-check-copy reveal">
      <div class="section-label text-redorange">
        <span class="section-label-line" style="background:var(--redorange)"></span>
        Workday Health Check
      </div>
      <h2 class="section-heading">Find The Value You're Already Paying For.</h2>
      <p>Most organisations invest heavily in Workday.</p>
      <p>Our Health Check helps identify where adoption, governance, reporting and support challenges are preventing you from getting the return you expected.</p>
      <p>You'll leave with practical recommendations and a clearer understanding of where value may be leaking from your Workday environment, before committing to anything.</p>
      <a href="#talk" class="health-check-cta">
        Book Your Free Health Check <?php echo z_arrow( 13 ); ?>
      </a>
    </div>
    <div class="health-check-panel reveal delay-1">
      <span>The free Workday Health Check helps identify:</span>
      <ul>
        <li>Adoption challenges</li>
        <li>Governance risks</li>
        <li>Reporting inefficiencies</li>
        <li>Support bottlenecks</li>
        <li>Optimisation opportunities</li>
      </ul>
    </div>
  </div>
</section>

<!-- ══════════════════════════════════════════════════════
     FAQ
══════════════════════════════════════════════════════ -->
<section id="faq" class="section-faq py-28">
  <div class="container">
    <div class="faq-grid">

      <div class="faq-sticky">
        <h2 class="section-heading reveal delay-1" style="font-size:clamp(36px,4.4vw,58px)">FAQs</h2>
      </div>

      <div class="faq-accordion reveal delay-2">
        <?php
        $faqs = [
          [
            'q' => 'Do you provide Workday AMS services?',
            'a' => [
              "Yes. But we'd rather help you need less support, not more.",
              "We provide Workday AMS services for organisations that need additional expertise, capacity or specialist support. Our goal isn't to keep you dependent on us forever. It is to help your Workday environment become more efficient, more stable and easier to manage over time.",
            ],
          ],
          [
            'q' => "We're already paying a fortune for Workday. Why would we need a partner as well?",
            'a' => [
              "Because buying a gym membership doesn't automatically make you fit.",
              "Workday is a powerful platform, but most organisations don't have a team of Workday specialists sitting around waiting for problems to appear.",
              'We help bridge the gap between what Workday can do and what your organisation actually needs it to do.',
              'The good news? Working with a specialist partner is often significantly more cost-effective than relying solely on premium vendor resources or hiring a large in-house team.',
            ],
          ],
          [
            'q' => 'How do I know if my Workday environment needs optimising?',
            'a' => [
              "If you're asking the question, there's a decent chance it does.",
              'Some common signs include:',
            ],
            'bullets' => [
              'Growing support backlogs',
              'Low user adoption',
              'Reporting frustrations',
              'Manual workarounds',
              'Governance concerns',
              'Endless "we\'ll fix that later" lists',
            ],
            'after' => [
              'Our Workday Health Check helps identify where value may be leaking from your environment and where improvements can be made.',
            ],
          ],
          [
            'q' => "What's included in the Workday Health Check?",
            'a' => [
              'Think of it as an MOT for your Workday environment.',
              "We'll review areas such as:",
            ],
            'bullets' => [
              'Adoption',
              'Governance',
              'Reporting',
              'Support processes',
              'Optimisation opportunities',
            ],
            'after' => [
              "You'll receive practical recommendations and a clearer understanding of where inefficiencies may be costing time, money and patience.",
              'No jargon. No scary consultant slide deck. Just useful insights.',
            ],
          ],
          [
            'q' => 'We only need help with one small issue. Is that something you do?',
            'a' => [
              "Absolutely. We don't insist on turning every conversation into a six-month programme.",
              "Whether it's a small integration, a reporting challenge, a security review or a wider optimisation project, we're happy to help.",
              'Sometimes fixing one problem creates more value than launching a massive transformation programme.',
            ],
          ],
          [
            'q' => 'What size organisations do you work with?',
            'a' => [
              "If you're running Workday, we're interested in talking.",
              "We've supported organisations ranging from focused projects worth a few thousand pounds through to global programmes and long-term Workday support engagements.",
              "The common theme isn't size.",
              'It\'s organisations that want to get more value from Workday.',
            ],
          ],
          [
            'q' => 'Do you only work in the UK?',
            'a' => [
              "No. Workday doesn't stop at borders and neither do we.",
              'We support organisations globally across multiple industries, delivering projects, optimisation services and AMS support wherever Workday is being used.',
            ],
          ],
          [
            'q' => 'How quickly can you start?',
            'a' => [
              'Usually much quicker than your internal approval process.',
              "Timeframes vary depending on scope and availability, but we're often able to engage quickly for health checks, advisory work and smaller projects.",
              "For larger programmes, we'll work with you to establish realistic timelines and delivery plans.",
            ],
          ],
          [
            'q' => 'What makes Zeneesha different from other Workday consultancies?',
            'a' => [
              "We'd rather find the iceberg before you hit it.",
              "Many Workday projects become frustrating because hidden complexity isn't identified until halfway through delivery.",
              'We place a strong emphasis on discovery, validation and transparency so that expectations, scope and risks are understood early.',
              "We also believe consultancy doesn't have to feel like consultancy.",
              "You won't find unnecessary jargon, endless PowerPoints or vague recommendations here.",
              'Just practical expertise focused on helping you get more value from Workday.',
            ],
          ],
          [
            'q' => 'Can you help if our Workday implementation is already live?',
            'a' => [
              "Honestly, that's where many of our conversations start.",
              "Most organisations don't need help implementing Workday forever.",
              'They need help after implementation.',
              'Once the project team disappears and real users start using the system, new challenges often emerge around adoption, reporting, governance and support.',
              "That's exactly where we help.",
            ],
          ],
          [
            'q' => "Will you tell us if Workday isn't actually the problem?",
            'a' => [
              'Yes. Even if it costs us work.',
              "Sometimes the issue isn't Workday.",
              "Sometimes it's:",
            ],
            'bullets' => [
              'Process design',
              'Governance',
              'Data quality',
              'Change management',
              'Internal ownership',
            ],
            'after' => [
              "If the problem sits outside Workday, we'll tell you.",
              'Because solving the right problem is more important than selling the wrong service.',
            ],
          ],
          [
            'q' => 'Lorem ipsum dolor sit amet?',
            'a' => [
              'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer non turpis vitae neque facilisis porta.',
            ],
          ],
        ];
        $faq_columns = array_chunk( $faqs, 6, true );
        foreach ( $faq_columns as $col_i => $faq_column ) : ?>
          <div class="faq-column">
            <?php foreach ( $faq_column as $i => $faq ) :
              $faq_lazy  = $i >= 5;
              $faq_class = 'faq-item' . ( $faq_lazy ? ' faq-item--lazy' : '' );
              $faq_style = $faq_lazy ? ' style="--faq-delay:' . esc_attr( ( $i - 5 ) * 90 ) . 'ms"' : '';
              ?>
              <div class="<?php echo esc_attr( $faq_class ); ?>"<?php echo $faq_style; ?>>
                <button class="faq-btn" aria-expanded="false" aria-controls="faq-answer-<?php echo $i; ?>">
                  <span class="faq-question"><?php echo esc_html( $faq['q'] ); ?></span>
                  <svg class="faq-chevron" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#E8472C" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6 9l6 6 6-6"/></svg>
                </button>
                <div class="faq-answer" id="faq-answer-<?php echo $i; ?>" role="region">
                  <div class="faq-answer-inner">
                    <?php foreach ( $faq['a'] as $para ) : ?>
                      <p><?php echo wp_kses_post( $para ); ?></p>
                    <?php endforeach; ?>
                    <?php if ( ! empty( $faq['bullets'] ) ) : ?>
                      <ul>
                        <?php foreach ( $faq['bullets'] as $bullet ) : ?>
                          <li><?php echo esc_html( $bullet ); ?></li>
                        <?php endforeach; ?>
                      </ul>
                    <?php endif; ?>
                    <?php if ( ! empty( $faq['after'] ) ) : ?>
                      <?php foreach ( $faq['after'] as $para ) : ?>
                        <p><?php echo wp_kses_post( $para ); ?></p>
                      <?php endforeach; ?>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        <?php endforeach; ?>
      </div>

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
      <h2 class="cta-heading reveal delay-1">Stop Fighting Workday. Start Getting Value From It.</h2>

      <p class="cta-body reveal delay-2">Workday shouldn't feel harder than the problems it was supposed to solve.</p>
      <p class="cta-body reveal delay-2">Whether you need optimisation, support, integration expertise or a trusted partner, we're here to help.</p>
    </div>

    <!-- Right: contact form -->
    <div class="reveal delay-3">
      <div class="cta-form-wrap">
        <form id="cta-contact-form" novalidate>
          <div class="form-row">
            <div>
              <label class="field-label" for="contact_name">Name <span>*</span></label>
              <input class="form-input" type="text" id="contact_name" name="contact_name" required>
            </div>
            <div>
              <label class="field-label" for="contact_phone">Phone</label>
              <input class="form-input" type="tel" id="contact_phone" name="contact_phone">
            </div>
          </div>
          <div class="form-group">
            <label class="field-label" for="contact_email">Email <span>*</span></label>
            <input class="form-input" type="email" id="contact_email" name="contact_email" required>
          </div>
          <div class="form-group">
            <label class="field-label" for="contact_message">Message</label>
            <textarea class="form-textarea" id="contact_message" name="contact_message" rows="4"></textarea>
          </div>
          <div class="form-group">
            <div class="cta-with-note">
              <button type="submit" class="form-submit">
                Book Your Free Health Check
                <?php echo z_arrow( 14 ); ?>
              </button>
            </div>
          </div>
          <div id="form-message" class="form-msg" role="alert"></div>
        </form>
      </div>
    </div>

  </div>
</section>

</main>
<?php get_footer(); ?>
