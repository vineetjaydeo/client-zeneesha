<?php
/**
 * Template Name: Homepage V3
 */
$theme_uri = get_template_directory_uri();
$hero_kicker = zf( 'home_v3_hero_kicker', 'Workday Advisory, AMS & AI Enablement' );
$hero_title = zf( 'home_v3_hero_title', 'Maximise Every Workday Investment' );
$hero_body = zf( 'home_v3_hero_body', 'Enterprise-grade expertise for HCM and Finance, delivered faster and without the complexity or cost of a Tier 1 firm. From strategy to deployment and recovery, we help you maximise your Workday investment.' );
$hero_cta = zf( 'hero_cta', 'Book your free Workday Health Check' );
$hero_secondary_cta = zf( 'home_v3_secondary_cta', 'Talk to a Workday Expert' );
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
          <?php echo esc_html( $hero_kicker ); ?>
        </div>

        <h1 class="hero-headline">
          <span class="kline">
            <span class="kline-inner kline-bold"><?php echo esc_html( $hero_title ); ?></span>
          </span>
        </h1>

        <div class="hero-body">
          <p><?php echo esc_html( $hero_body ); ?></p>
        </div>

        <div class="home-hero-ctas">
          <a href="#talk" class="btn-primary home-hero-cta">
            <?php echo esc_html( $hero_cta ); ?> <?php echo z_arrow( 14 ); ?>
          </a>
          <a href="#talk" class="btn-ghost home-hero-cta">
            <?php echo esc_html( $hero_secondary_cta ); ?> <?php echo z_arrow( 14 ); ?>
          </a>
        </div>

        <div class="hero-partner-badges" aria-label="Workday partner badges">
          <img src="https://www.zeneesha.com/wp-content/uploads/2025/08/wday-partners-logo-services-partner@4x.png" alt="Workday Services Partner">
          <img src="https://www.zeneesha.com/wp-content/uploads/2025/08/wday-partners-logo-sales-partner@4x.png" alt="Workday Sales Partner">
        </div>
      </div>

      <!-- Right: animated value graph -->
      <div class="hero-right">
        <div class="hero-graph-card" aria-label="Workday value improvement visual">
          <div class="hero-graph-panel">
            <div class="hero-graph-top">
              <div>
                <span>Workday value recovery</span>
                <strong>Quarterly momentum</strong>
              </div>
              <div class="hero-graph-score">
                <span>ROI</span>
                <strong>+38%</strong>
              </div>
            </div>

            <div class="hero-graph-canvas" aria-hidden="true">
              <div class="hero-graph-grid"></div>
              <span class="hero-graph-axis-line hero-graph-axis-line--y"></span>
              <span class="hero-graph-axis-line hero-graph-axis-line--x"></span>
              <span class="hero-graph-axis-label hero-graph-axis-label--y">Business Value</span>
              <span class="hero-graph-axis-label hero-graph-axis-label--x">Time</span>
              <svg class="hero-graph-svg" viewBox="0 0 520 250" preserveAspectRatio="none">
                <defs>
                  <linearGradient id="heroGraphFill" x1="0" x2="0" y1="0" y2="1">
                    <stop offset="0%" stop-color="#F57C1F" stop-opacity=".28"/>
                    <stop offset="100%" stop-color="#F57C1F" stop-opacity="0"/>
                  </linearGradient>
                  <linearGradient id="heroGraphStroke" x1="0" x2="1" y1="0" y2="0">
                    <stop offset="0%" stop-color="#E8472C"/>
                    <stop offset="52%" stop-color="#F57C1F"/>
                    <stop offset="100%" stop-color="#1E3A8A"/>
                  </linearGradient>
                </defs>
                <path class="hero-graph-area" d="M44 205 C85 190 118 178 150 181 C193 185 218 126 260 133 C304 140 324 96 364 104 C414 113 438 60 482 45 L482 222 L44 222 Z"/>
                <path class="hero-graph-line" d="M44 205 C85 190 118 178 150 181 C193 185 218 126 260 133 C304 140 324 96 364 104 C414 113 438 60 482 45"/>
              </svg>
              <span class="hero-graph-dot hero-graph-dot--advisory"></span>
              <span class="hero-graph-dot hero-graph-dot--deployment"></span>
              <span class="hero-graph-dot hero-graph-dot--optimization"></span>
              <span class="hero-graph-dot hero-graph-dot--ai"></span>
              <span class="hero-graph-dot hero-graph-dot--ams"></span>
              <span class="hero-graph-label hero-graph-label--advisory">Advisory</span>
              <span class="hero-graph-label hero-graph-label--deployment">Deployment</span>
              <span class="hero-graph-label hero-graph-label--optimization">Optimization</span>
              <span class="hero-graph-label hero-graph-label--ai">AI</span>
              <span class="hero-graph-label hero-graph-label--ams">AMS</span>
              <span class="hero-graph-pulse"></span>
            </div>

            <p class="hero-graph-caption">Your Workday value keeps increasing with Zeneesha.</p>

          </div>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ══════════════════════════════════════════════════════
     TRUST
══════════════════════════════════════════════════════ -->
<section id="trust" class="section-trust home-logo-row" aria-label="Selected Zeneesha clients">
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
     STATS
══════════════════════════════════════════════════════ -->
<section class="section-hero-stats" aria-label="Zeneesha outcomes at a glance">
  <div class="stats-grid">
    <?php
    $stats = [
      [ '15+',   "Years Senior\nConsultant Experience", '<rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 21V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v16"/>' ],
      [ '100%',  "Certified\nConsultants",        '<circle cx="12" cy="8" r="6"/><path d="M15.477 12.89L17 22l-5-3-5 3 1.523-9.11"/>' ],
      [ '50K+',  "Global Employees\nSupported",   '<path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87"/><path d="M16 3.13a4 4 0 010 7.75"/>' ],
      [ '95%',   "Client\nRetention Rate",        '<polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/><polyline points="17 6 23 6 23 12"/>' ],
      [ '200K+', "AMS Hours\nDelivered",          '<circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>' ],
    ];
    foreach ( $stats as $i => $s ) : ?>
      <div class="stat-item reveal" style="transition-delay:<?php echo esc_attr( $i * 60 ); ?>ms">
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

    <div class="framework-intro home-section-intro home-section-intro--challenges reveal delay-1">
      <div class="framework-intro-heading">
        <div class="section-label text-redorange">
          <span class="section-label-line" style="background:var(--redorange)"></span>
          Common Workday Challenges
        </div>
        <h2 class="section-heading home-challenges-heading">
          <?php
          $challenges_heading = esc_html( zf( 'home_v3_challenges_heading', "Workday is powerful. But right now, it probably just feels frustrating." ) );
          $challenges_heading = str_replace( 'Workday is powerful. But', 'Workday is powerful.<br>But', $challenges_heading );
          echo wp_kses_post( preg_replace( '/(frustrating\.?)/i', '<span>$1</span>', $challenges_heading ) );
          ?>
        </h2>
      </div>
      <p class="section-sub framework-intro-copy"><?php echo esc_html( zf( 'home_v3_challenges_intro', 'Digital transformation opens the door to incredible possibilities, and turning that potential into lasting value is where the real magic happens.' ) ); ?></p>
    </div>

    <?php
    $timeline_signals = [
      [ 'title' => 'Paying for a strategy you never got?', 'body' => 'Without expert advisory, you overpay for generic configurations that fail to match your actual business needs.' ],
      [ 'title' => 'Are workflows fighting your business?', 'body' => 'Slow approvals push managers back to using offline spreadsheets and emails.' ],
      [ 'title' => 'HR acting like IT support?', 'body' => 'Your team wastes time fixing user access and permission errors instead of driving strategy.' ],
      [ 'title' => 'Is your data impossible to trust?', 'body' => 'Broken integrations and duplicate records leave leaders questioning every report.' ],
      [ 'title' => 'Still paying for unused capabilities?', 'body' => 'AI and advanced Workday features remain switched off while costs keep rising.' ],
      [ 'title' => 'Dreading system updates?', 'body' => 'Your team scrambles to fix broken processes during Workday releases instead of activating new features.' ],
    ];
    ?>
    <div class="problem-timeline reveal delay-2" aria-label="Common Workday frustration timeline">
      <span class="problem-timeline-line" aria-hidden="true"></span>
      <?php foreach ( $timeline_signals as $i => $signal ) : ?>
        <?php $timeline_side = $i % 2 === 0 ? 'up' : 'down'; ?>
        <div class="problem-timeline-item problem-timeline-item--<?php echo esc_attr( $timeline_side ); ?>" style="--timeline-delay:<?php echo esc_attr( $i * 110 ); ?>ms">
          <span class="problem-timeline-num"><?php echo esc_html( (string) ( $i + 1 ) ); ?></span>
          <span class="problem-timeline-stem" aria-hidden="true"></span>
          <span class="problem-timeline-dot" aria-hidden="true"></span>
          <article class="problem-timeline-card">
            <h3><?php echo esc_html( $signal['title'] ); ?></h3>
            <p><?php echo esc_html( $signal['body'] ); ?></p>
          </article>
        </div>
      <?php endforeach; ?>
    </div>
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
        Workday ROI Calculator
      </div>
      <h2 class="section-heading"><?php echo esc_html( zf( 'home_v3_calculator_heading', 'The hidden cost of your Workday value gap.' ) ); ?></h2>
      <p class="section-sub"><?php echo esc_html( zf( 'home_v3_calculator_body', 'Use the slider to estimate the hidden cost of inefficient workflows, poor adoption and underused capabilities based on your headcount.' ) ); ?></p>
      <p class="calculator-copy-note">Based on industry benchmarks from active Workday environments. A free Health Check provides a tailored assessment.</p>
      <a href="#talk" class="calculator-cta">
        Validate with a Free Health Check <?php echo z_arrow( 13 ); ?>
      </a>
    </div>

    <div class="calculator-panel reveal delay-1">
      <div class="calculator-control">
        <label for="employeeSlider">
          Number of employees
          <strong data-calc-employee-count>3,000</strong>
        </label>
        <input type="range" id="employeeSlider" min="0" max="24" step="1" value="10" data-calc-slider>
        <div class="calculator-slider-labels">
          <span>500</span>
          <span>3,000</span>
          <span>10,000+</span>
        </div>
      </div>

      <div class="calculator-result">
        <span>Estimated annual value gap</span>
        <strong data-calc-total-cost>£1,174,000</strong>
      </div>

      <div class="calculator-breakdown" aria-label="Estimated Annual Impact By Area">
        <div class="calculator-impact">
          <span>Implementation &amp; Configuration Debt</span>
          <strong data-calc-implementation-debt>£352,200</strong>
        </div>
        <div class="calculator-impact">
          <span>Reactive Support &amp; HR Inefficiency</span>
          <strong data-calc-reactive-support>£469,600</strong>
        </div>
        <div class="calculator-impact">
          <span>Data Latency &amp; Reporting Delays</span>
          <strong data-calc-data-latency>£176,100</strong>
        </div>
        <div class="calculator-impact">
          <span>Unutilized AI &amp; License Value</span>
          <strong data-calc-ai-license-value>£176,100</strong>
        </div>
      </div>

      <p class="calculator-disclaimer">
        Indicative estimate only, based on common Workday adoption, governance, reporting and support challenges. A Workday Health Check can validate the actual impact for your organisation.
      </p>
    </div>

  </div>
</section>


<!-- ══════════════════════════════════════════════════════
     DELIVERY FRAMEWORK
══════════════════════════════════════════════════════ -->
<section id="delivery-framework" class="section-delivery-framework py-28">
  <div class="container">
    <div class="framework-intro home-section-intro reveal">
      <div class="framework-intro-heading">
        <div class="section-label text-redorange">
          <span class="section-label-line" style="background:var(--redorange)"></span>
          How We Deliver Differently
        </div>
        <h2 class="section-heading">We start with the business, not the system.</h2>
      </div>
      <p class="section-sub framework-intro-copy">Every organisation uses Workday differently. We combine strategic thinking with senior-led delivery to solve today&apos;s challenges while preparing you for what&apos;s next.</p>
    </div>

    <div class="framework-grid">
      <?php
      $framework_items = [
        [ 'num'=>'01', 'title'=>'Business-first advisory', 'body'=>'We prioritise the right initiatives, reduce risk and build a practical roadmap before you invest in complex change.' ],
        [ 'num'=>'02', 'title'=>'Senior-led agile delivery', 'body'=>'The experts who design your strategy stay with you through testing and go-live, keeping decisions faster and accountability clear.' ],
        [ 'num'=>'03', 'title'=>'Zero-hour AMS', 'body'=>'No fixed monthly support hours or use-it-or-lose-it retainers. Just proactive optimisation and pay-as-you-need support.' ],
        [ 'num'=>'04', 'title'=>'Continuous value evolution', 'body'=>'Workday is never done. We manage releases, activate advanced features and ensure operational ROI compounds over time.' ],
      ];
      foreach ( $framework_items as $i => $item ) : ?>
        <article class="framework-card reveal" style="transition-delay:<?php echo esc_attr( $i * 80 ); ?>ms">
          <span><?php echo esc_html( $item['num'] ); ?></span>
          <h3><?php echo esc_html( $item['title'] ); ?></h3>
          <p><?php echo esc_html( $item['body'] ); ?></p>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>


<!-- ══════════════════════════════════════════════════════
     TESTIMONIALS
══════════════════════════════════════════════════════ -->
<section id="testimonials" class="section-home-testimonials py-28">
  <div class="container">
    <div class="section-label reveal text-redorange">
      <span class="section-label-line" style="background:var(--redorange)"></span>
      Testimonials
    </div>
    <h2 class="section-heading reveal delay-1">Don&apos;t Just Take Our Word For It</h2>
  </div>

  <?php
  $testimonials = [
    [
      'quote'    => 'Zeneesha helped us navigate a complex Workday rollout with the right expertise, flexibility, and support. Their team was invaluable in helping make our Workday adoption a success.',
      'name'     => 'Georgina Taitt',
      'role'     => 'Head of Enterprise Apps · AQA',
      'avatar'   => $theme_uri . '/assets/img/testimonials/georgina-taitt.png',
      'gradient' => 'linear-gradient(135deg,#FFF7EA 0%,#F8FBFF 54%,#FFFFFF 100%)',
    ],
    [
      'quote'    => 'We had zero tolerance for delay or data loss during our live legacy migration to Workday HCM. Zeneesha\'s end-to-end testing and automated data validation were critical, ensuring we hit our final cutover exactly on deadline with zero overruns.',
      'name'     => 'David M.',
      'role'     => 'VP of Enterprise Systems',
      'avatar'   => $theme_uri . '/assets/img/testimonials/david-m.jpg',
      'gradient' => 'linear-gradient(135deg,#F3F7FF 0%,#FFFFFF 50%,#FFF6F1 100%)',
    ],
    [
      'quote'    => 'They didn\'t just hand us an AI model; they got it production-ready and fully deployed in weeks. Outstanding execution.',
      'name'     => 'Marcus Vance',
      'role'     => 'VP of Enterprise HR Technology',
      'avatar'   => 'https://i.pravatar.cc/120?u=zeneesha-marcus-vance',
      'gradient' => 'linear-gradient(135deg,#F8FAFC 0%,#EEF7F9 48%,#FFFFFF 100%)',
    ],
    [
      'quote'    => 'Invaluable advisory work. They helped us cut through the AI hype and build a practical roadmap that actually aligned with our business goals.',
      'name'     => 'Elena Rostova',
      'role'     => 'Chief Financial Officer',
      'avatar'   => 'https://i.pravatar.cc/120?u=zeneesha-elena-rostova',
      'gradient' => 'linear-gradient(135deg,#FFFFFF 0%,#FFF3E8 46%,#F5F7FB 100%)',
    ],
    [
      'quote'    => 'Data migration is usually a nightmare, but their team handled ours with zero downtime and total integrity. Impeccable execution.',
      'name'     => 'Sarah Jenkins',
      'role'     => 'Director of Global Data Operations & Analytics',
      'avatar'   => $theme_uri . '/assets/img/testimonials/sarah-jenkins-v2.jpg',
      'gradient' => 'linear-gradient(135deg,#F9FAF5 0%,#FFFFFF 44%,#EEF4FF 100%)',
    ],
    [
      'quote'    => 'The integration work connected our legacy stack and new AI tools cleanly, without disruption to live operations.',
      'name'     => 'Devon Brooks',
      'role'     => 'Global Head of Systems Architecture & Integrations',
      'avatar'   => 'https://i.pravatar.cc/120?u=zeneesha-devon-brooks',
      'gradient' => 'linear-gradient(135deg,#F4F8FF 0%,#FFFFFF 42%,#FFF5EC 100%)',
    ],
  ];
  ?>

  <div class="home-testimonial-carousel reveal delay-2" data-loop-carousel data-loop-card-class="home-testimonial-card" data-loop-dot-class="home-carousel-dot" aria-label="Client testimonials">
    <div class="home-testimonial-viewport">
      <div class="home-testimonial-track" data-loop-track>
        <?php foreach ( $testimonials as $t ) : ?>
          <blockquote class="home-testimonial-card" style="--testimonial-gradient:<?php echo esc_attr( $t['gradient'] ); ?>">
            <div class="home-testimonial-quote-mark" aria-hidden="true">&ldquo;</div>
            <p><?php echo esc_html( $t['quote'] ); ?></p>
            <footer>
              <img src="<?php echo esc_url( $t['avatar'] ); ?>" alt="Profile photo of <?php echo esc_attr( $t['name'] ); ?>" loading="lazy">
              <span>
                <strong><?php echo esc_html( $t['name'] ); ?></strong>
                <em><?php echo esc_html( $t['role'] ); ?></em>
              </span>
            </footer>
          </blockquote>
        <?php endforeach; ?>
      </div>
    </div>
    <div class="home-carousel-nav">
      <button class="home-carousel-btn" type="button" data-loop-prev aria-label="Previous testimonial">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
      </button>
      <div class="home-carousel-dots" data-loop-dots></div>
      <button class="home-carousel-btn" type="button" data-loop-next aria-label="Next testimonial">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
      </button>
    </div>
  </div>
</section>


<!-- ══════════════════════════════════════════════════════
     SOLUTIONS
══════════════════════════════════════════════════════ -->
<section id="solutions" class="section-solutions py-28">
  <div class="container">

    <div class="framework-intro home-section-intro solutions-header solutions-header--journey reveal">
      <div class="framework-intro-heading">
        <div class="section-label text-redorange">
          <span class="section-label-line" style="background:var(--redorange)"></span>
          Workday Advisory, Deployment, AMS & AI Services
        </div>
        <h2 class="section-heading"><span>Your Workday Journey.</span><span>One Trusted Partner.</span></h2>
      </div>
      <p class="section-sub framework-intro-copy">Whether you&apos;re planning, optimising, expanding, or solving complex challenges, our specialists support every stage of your Workday journey.</p>
    </div>

    <?php
    $service_capabilities = [
      [
        'num' => '01',
        'label' => 'Advisory',
        'tagline' => "Not sure where to start, or what's actually broken?",
        'body' => 'We deliver independent guidance and strategic roadmaps — an honest assessment of your Workday setup and a practical plan to fix it, before you spend on implementation.',
        'href' => '/advisory/',
        'accent' => '#E8472C',
        'tags' => [ 'Roadmap', 'Business case', 'Fit-gap', 'Governance' ],
        'outcomes' => [ 'Prioritise the right Workday initiatives.', 'Reduce delivery risk before spend commits.', 'Turn uncertainty into a practical action plan.' ],
      ],
      [
        'num' => '02',
        'label' => 'Deployment',
        'tagline' => 'Rolling out Workday or adding a new module?',
        'body' => 'From solution validation and user testing through go-live and Hypercare, we configure Workday around how your business actually works — and stay hands-on so nothing breaks on day one.',
        'href' => '/deployment/',
        'accent' => '#1E3A8A',
        'tags' => [ 'HCM', 'Finance', 'Testing', 'Migration' ],
        'outcomes' => [ 'Configuration reflects real business processes.', 'Data migration lands cleanly.', 'Teams are ready before go-live.' ],
      ],
      [
        'num' => '03',
        'label' => 'AMS & Support',
        'tagline' => 'Tired of tickets sitting untouched for days?',
        'body' => "Ongoing support, proactive enhancements, and release readiness mean issues get fixed fast — and Workday releases don't break what you've already built.",
        'href' => '/ams-support/',
        'accent' => '#3B9EDB',
        'tags' => [ 'Incidents', 'Releases', 'Enhancements', 'SLA' ],
        'outcomes' => [ 'Issues move faster than internal queues.', 'Releases stop becoming fire drills.', 'Support reduces dependency over time.' ],
      ],
      [
        'num' => '04',
        'label' => 'Maximise',
        'tagline' => 'Paying for features nobody uses?',
        'body' => 'We connect your systems through smart integrations, build real-time analytics your leaders actually trust, and drive the adoption improvements that get people using Workday properly.',
        'href' => '/maximise/',
        'accent' => '#F57C1F',
        'tags' => [ 'Automation', 'Adoption', 'Reporting', 'Integrations' ],
        'outcomes' => [ 'Manual work drops across HR and finance.', 'Reports answer leadership questions faster.', 'Users adopt the workflows you paid for.' ],
      ],
      [
        'num' => '05',
        'label' => 'AI & Enablement',
        'tagline' => "Want to turn on Workday's AI features without breaking anything?",
        'body' => 'We get your data, security, and governance ready first — so when you switch on AI, it works properly from day one.',
        'href' => '/ai-enablement/',
        'accent' => '#1E3A8A',
        'tags' => [ 'AI readiness', 'Data quality', 'Security', 'Automation' ],
        'outcomes' => [ 'Foundations are ready before AI investment.', 'Security and governance are built in.', 'Automation starts from clean, usable data.' ],
      ],
    ];
    ?>
    <div class="service-tabs reveal delay-1" data-service-tabs>
      <div class="service-tab-nav">
        <button class="service-tab-arrow service-tab-arrow--prev" type="button" aria-label="Previous service" data-service-tab-prev>
          <?php echo z_arrow( 18 ); ?>
        </button>
        <div class="service-tab-list" role="tablist" aria-label="Zeneesha Workday services">
          <?php foreach ( $service_capabilities as $i => $capability ) : ?>
            <button
              class="service-tab<?php echo $i === 0 ? ' is-active' : ''; ?>"
              type="button"
              role="tab"
              id="service-tab-<?php echo esc_attr( $i ); ?>"
              aria-controls="service-panel-<?php echo esc_attr( $i ); ?>"
              aria-selected="<?php echo $i === 0 ? 'true' : 'false'; ?>"
              data-service-tab="<?php echo esc_attr( $i ); ?>"
              style="--svc-accent:<?php echo esc_attr( $capability['accent'] ); ?>"
            >
              <span><?php echo esc_html( $capability['num'] ); ?></span>
              <?php echo esc_html( $capability['label'] ); ?>
            </button>
          <?php endforeach; ?>
        </div>
        <button class="service-tab-arrow service-tab-arrow--next" type="button" aria-label="Next service" data-service-tab-next>
          <?php echo z_arrow( 18 ); ?>
        </button>
      </div>

      <div class="service-tab-panels">
        <?php foreach ( $service_capabilities as $i => $capability ) : ?>
          <article
            class="service-tab-panel<?php echo $i === 0 ? ' is-active' : ''; ?>"
            id="service-panel-<?php echo esc_attr( $i ); ?>"
            role="tabpanel"
            aria-labelledby="service-tab-<?php echo esc_attr( $i ); ?>"
            data-service-panel="<?php echo esc_attr( $i ); ?>"
            data-service-num="<?php echo esc_attr( $capability['num'] ); ?>"
            style="--svc-accent:<?php echo esc_attr( $capability['accent'] ); ?>"
          >
            <div class="service-tab-copy">
              <div class="service-tab-kicker">Service <?php echo esc_html( $capability['num'] ); ?></div>
              <h3><?php echo esc_html( $capability['label'] ); ?></h3>
              <p class="service-tab-tagline"><?php echo esc_html( $capability['tagline'] ); ?></p>
              <p><?php echo esc_html( $capability['body'] ); ?></p>
              <div class="service-tab-tags" aria-label="<?php echo esc_attr( $capability['label'] ); ?> capabilities">
                <?php foreach ( $capability['tags'] as $tag ) : ?>
                  <span><?php echo esc_html( $tag ); ?></span>
                <?php endforeach; ?>
              </div>
              <a href="<?php echo esc_url( home_url( $capability['href'] ) ); ?>" class="service-tab-cta">
                <span>Know more</span>
                <?php echo z_arrow( 14 ); ?>
              </a>
            </div>
            <div class="service-tab-outcomes">
              <div>What this means for you</div>
              <ul>
                <?php foreach ( $capability['outcomes'] as $outcome ) : ?>
                  <li><?php echo esc_html( $outcome ); ?></li>
                <?php endforeach; ?>
              </ul>
            </div>
          </article>
        <?php endforeach; ?>
      </div>
    </div>

  </div>
</section>


<!-- ══════════════════════════════════════════════════════
     CLIENT SUCCESS STORIES
══════════════════════════════════════════════════════ -->
<section id="case-studies" class="section-home-case-studies py-28">
  <div class="container">
    <div class="case-studies-header reveal">
      <div class="section-label text-redorange">
        <span class="section-label-line" style="background:var(--redorange)"></span>
        Workday Client Success Stories
      </div>
      <h2 class="section-heading"><span>Real Outcomes.</span><span>Real Impact.</span></h2>
    </div>

    <?php
    $home_success_icon = static function ( $name ) {
      $icons = [
        'chart' => '<svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M4 19V9" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><path d="M10 19V5" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><path d="M16 19v-8" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><path d="M4 19h16" stroke="currentColor" stroke-width="2" stroke-linecap="round"/><path d="M5 8l5-5 4 4 5-5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>',
        'check' => '<svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle cx="12" cy="12" r="8.5" stroke="currentColor" stroke-width="2"/><path d="M8.5 12.2l2.3 2.3 4.9-5.1" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg>',
        'star'  => '<svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 3.8l2.25 4.56 5.03.73-3.64 3.55.86 5.01L12 15.28l-4.5 2.37.86-5.01-3.64-3.55 5.03-.73L12 3.8z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg>',
        'up'    => '<svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 19V5" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"/><path d="M6.5 10.5L12 5l5.5 5.5" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg>',
        'down'  => '<svg viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 5v14" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"/><path d="M6.5 13.5L12 19l5.5-5.5" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg>',
      ];
      return $icons[ $name ] ?? '';
    };

    $home_cases = [
      [
        'client'  => 'AQA',
        'type'    => 'Global Education Provider',
        'icon'    => 'chart',
        'metrics' => [
          [ 'value' => '86', 'suffix' => '%', 'trend' => 'up', 'label' => 'Self-service adoption' ],
          [ 'value' => '3', 'suffix' => 'd', 'trend' => 'down', 'label' => 'Reporting time (down)' ],
        ],
        'impact'  => [ 'Adoption soared,', 'admin time nearly disappeared.' ],
      ],
      [
        'client'  => 'Slaughter and May',
        'type'    => 'Elite Legal Enterprise',
        'icon'    => 'check',
        'metrics' => [
          [ 'value' => '100', 'suffix' => '%', 'trend' => 'up', 'label' => 'On-schedule deployment' ],
          [ 'value' => '0', 'suffix' => 'x', 'trend' => 'down', 'label' => 'Overruns' ],
        ],
        'impact'  => [ 'A textbook legacy migration,', 'delivered flawlessly.' ],
      ],
    ];
    ?>

    <div class="home-success-list reveal delay-1" aria-label="Client success stories">
      <?php foreach ( $home_cases as $case ) : ?>
        <article class="home-success-card">
          <header class="home-success-client">
            <h3><?php echo esc_html( $case['client'] ); ?></h3>
            <p><?php echo esc_html( $case['type'] ); ?></p>
          </header>
          <div class="home-success-story">
            <div class="home-success-metrics">
              <?php foreach ( $case['metrics'] as $metric ) : ?>
                <div class="home-success-stat">
                  <div class="home-success-stat-value">
                    <strong><?php echo esc_html( $metric['value'] ); ?><em><?php echo esc_html( $metric['suffix'] ); ?></em></strong>
                    <span class="home-success-trend home-success-trend--<?php echo esc_attr( $metric['trend'] ); ?>">
                      <?php echo $home_success_icon( $metric['trend'] ); ?>
                    </span>
                  </div>
                  <span class="home-success-stat-label"><?php echo esc_html( $metric['label'] ); ?></span>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
          <div class="home-success-quote">
            <span class="home-success-impact-icon home-success-impact-icon--<?php echo esc_attr( $case['icon'] ); ?>">
              <?php echo $home_success_icon( $case['icon'] ); ?>
            </span>
            <p>
              <?php foreach ( $case['impact'] as $line ) : ?>
                <span><?php echo esc_html( $line ); ?></span>
              <?php endforeach; ?>
            </p>
          </div>
        </article>
      <?php endforeach; ?>
    </div>

    <div class="home-success-footer reveal delay-2">
      <span class="home-success-footer-icon"><?php echo $home_success_icon( 'star' ); ?></span>
      <div class="home-success-footer-copy">
        <h3>Your success story could be next.</h3>
        <p>Let&rsquo;s unlock more from your Workday.</p>
      </div>
      <a href="#talk" class="home-success-footer-cta">
        Talk to a Workday Expert <?php echo z_arrow( 15 ); ?>
      </a>
    </div>
  </div>
</section>


<!-- ══════════════════════════════════════════════════════
     INSIGHTS
══════════════════════════════════════════════════════ -->
<section id="insights" class="section-home-insights py-28">
  <div class="container">
    <div class="framework-intro home-section-intro home-insights-header reveal">
      <div class="framework-intro-heading">
        <div class="section-label text-redorange">
          <span class="section-label-line" style="background:var(--redorange)"></span>
          Workday Deployment, AMS &amp; AI Insights
        </div>
        <h2 class="section-heading">From the Zeneesha Workday lifecycle playbook.</h2>
      </div>
      <p class="section-sub framework-intro-copy">Actionable insights across deployment, operations and AI to help you unlock the full value of Workday.</p>
    </div>
    <div class="home-insight-grid">
      <?php
      $insights = [
        [ 'icon'=>'deployment', 'topic'=>'Workday Deployment Advisory', 'title'=>'The generic ERP deployment trap: why enterprise HCM strategy must dictate Workday tenant configuration.' ],
        [ 'icon'=>'ams', 'topic'=>'Workday AMS Transformation', 'title'=>'The legacy HRIS support model is broken. Discover outcome-driven Workday AMS and proactive tenant optimisation.' ],
        [ 'icon'=>'ai', 'topic'=>'Workday AI & Automation', 'title'=>'Unlock stranded ROI: safely activate Workday Illuminate AI and HCM automation without disrupting live operations.' ],
      ];
      foreach ( $insights as $i => $insight ) : ?>
        <article class="home-insight-card reveal" style="transition-delay:<?php echo esc_attr( $i * 80 ); ?>ms">
          <span class="home-insight-icon home-insight-icon--<?php echo esc_attr( $insight['icon'] ); ?>" aria-hidden="true">
            <?php if ( 'deployment' === $insight['icon'] ) : ?>
              <svg viewBox="0 0 64 64" fill="none">
                <rect x="12" y="13" width="34" height="27" rx="3"></rect>
                <path d="M12 22h34M20 18h.2M26 18h.2M32 18h.2M25 50h14M32 40v10"></path>
                <circle cx="45" cy="43" r="8"></circle>
                <path d="M45 38.5v9M40.5 43h9"></path>
              </svg>
            <?php elseif ( 'ams' === $insight['icon'] ) : ?>
              <svg viewBox="0 0 64 64" fill="none">
                <circle cx="24" cy="21" r="6"></circle>
                <circle cx="41" cy="19" r="5"></circle>
                <path d="M13 41c1.5-8 6-12 11-12s9.5 4 11 12M34 31c6 .6 10 4.5 11 11"></path>
                <path d="M14 50h38M19 45v5M29 39v11M39 34v16M49 27v23"></path>
                <path d="M43 28l6-6 4 4"></path>
              </svg>
            <?php else : ?>
              <svg viewBox="0 0 64 64" fill="none">
                <path d="M29 13c-6.5 0-11 4.8-11 11 0 1 .1 1.9.4 2.8A10.5 10.5 0 0 0 21 48c2 0 3.9-.5 5.6-1.6V17.2A9 9 0 0 1 29 13Z"></path>
                <path d="M35 17.2v29.2A10.5 10.5 0 0 0 40.6 48a10.5 10.5 0 0 0 2.9-20.6c.3-1 .5-2.1.5-3.2 0-6.4-4.5-11.2-11-11.2"></path>
                <path d="M27 23h-6M37 23h6M27 33h-8M37 33h8M27 43h-6M37 43h6"></path>
                <circle cx="18" cy="23" r="1.8"></circle><circle cx="46" cy="23" r="1.8"></circle>
                <circle cx="16" cy="33" r="1.8"></circle><circle cx="48" cy="33" r="1.8"></circle>
                <circle cx="18" cy="43" r="1.8"></circle><circle cx="46" cy="43" r="1.8"></circle>
              </svg>
            <?php endif; ?>
          </span>
          <div class="home-insight-card-body">
            <div class="home-insight-meta">
              <span class="home-insight-num"><?php echo esc_html( sprintf( '%02d', $i + 1 ) ); ?></span>
              <span class="home-insight-topic"><?php echo esc_html( $insight['topic'] ); ?></span>
            </div>
            <h3><?php echo esc_html( $insight['title'] ); ?></h3>
            <a class="home-insight-link" href="<?php echo esc_url( home_url( '/resources/' ) ); ?>">Read insight <?php echo z_arrow( 18 ); ?></a>
          </div>
        </article>
      <?php endforeach; ?>
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
            'q' => 'We\'re already paying a fortune for Workday. Why would we need a partner?',
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
        ];
        $faq_columns = array_chunk( $faqs, 4, true );
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
      <div class="section-label reveal cta-label">
        <span class="section-label-line" style="background:var(--redorange)"></span>
        Book a Free Workday Health Check
      </div>
      <h2 class="cta-heading reveal delay-1">Ready for complete Workday confidence?</h2>

      <p class="cta-body reveal delay-2">Stop settling for operational bottlenecks and generic advice. Get senior-led delivery, commercial flexibility and practical support your business deserves.</p>
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
