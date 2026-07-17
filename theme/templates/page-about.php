<?php
/**
 * Template Name: About Page
 * Client copy sourced from Zeneesha Services.pdf, pages 27-29.
 */

get_header();

$journey = [
    [
        'year' => '2017',
        'title' => 'The Genesis',
        'body' => 'Five visionary founders united with a bold mission to redefine enterprise consulting. Acquiring Sunni Infotec Ltd., they established a fresh corporate identity: Zeneesha, a brand built to stand for grace, elegance, and premium execution.',
    ],
    [
        'year' => '2018-2019',
        'title' => 'The Pressure Test & Core Conviction',
        'body' => "Every great vision faces its defining crossroads. Early on, structural shifts and leadership departures tested the very foundation of our young company. While the path ahead grew demanding, the remaining core leaders refused to compromise. Instead, they forged a deeper pact of long-term dedication, proving that true resilience isn't just about surviving change, but using it to solidify an unbreakable foundation of trust.",
    ],
    [
        'year' => '2020',
        'title' => 'The Pivotal Shift',
        'body' => 'Battle-tested and highly aligned, our leadership engineered a profound strategic pivot. Recognizing macro-level market shifts, we chose to specialize exclusively in Workday technology, a bold move that permanently transformed our corporate trajectory.',
    ],
    [
        'year' => '2021-2025',
        'title' => 'Ecosystem Leadership',
        'body' => 'Focus breeds dominance. By dedicating ourselves entirely to premium enterprise consultancy, Zeneesha rapidly secured prestigious designations, capturing both our Workday Services and Sales Partnership.',
    ],
];

$credentials = [
    'Workday Service and Sales Partner',
    'ISO 27001 Certified Organisation',
    'Cyber Essentials Accredited',
    'Certified Member of MSDUK',
    'Crown Commercial Services G-Cloud 14 Framework Registered Supplier (Equipped to serve both public sector and private enterprise clients seamlessly)',
];

$values = [
    [ 'title' => 'Client Success Dedication', 'body' => 'Our clients are the anchor of our purpose. Whether collaborating with global enterprises or scaling mid-market companies, we dedicate deep technical expertise to ensure their long-term growth.' ],
    [ 'title' => 'Collaborative Partnership', 'body' => 'We do not consult from a distance, we build together. In a rapidly moving digital economy, we work side by side with your team to co-create custom integration, automation, and core architecture strategies.' ],
    [ 'title' => 'Uncompromising Integrity', 'body' => 'Radical transparency guides every configuration, migration, and business roadmap we produce. We maintain a strict zero-tolerance policy for hidden agendas or internal corporate politics.' ],
    [ 'title' => 'Brand Ambassadorship', 'body' => 'Every member of the Zeneesha team represents a commitment to high-impact problem-solving, professionalism, and mutual respect.' ],
];

$leaders = [
    [
        'name' => 'Rajesh Kumar',
        'title' => 'Managing Director',
        'image' => 'rajesh-kumar.jpg',
        'url' => 'https://www.linkedin.com/in/rajeshkumarmanagementconsultant/',
    ],
    [
        'name' => 'Ranjan Singh',
        'title' => 'Executive Director',
        'image' => 'ranjan-singh.jpg',
        'url' => 'https://www.linkedin.com/in/ranjan-singh-digitaltransformation/',
    ],
    [
        'name' => 'Keshav Kolla',
        'title' => 'Finance Director',
        'image' => 'keshav-kolla.jpg',
        'url' => 'https://www.linkedin.com/in/keshavkollas4financeconsultant/',
    ],
];
?>

<main id="main" class="ams-next-root utility-next-root about-next-root" tabindex="-1">

  <section class="utility-next-hero">
    <div class="container utility-next-hero-grid">
      <div class="utility-next-hero-copy">
        <p class="ams-next-eyebrow reveal">About Us</p>
        <h1 class="reveal delay-1">More Than a <span>Workday Partner</span></h1>
        <div class="utility-next-hero-body reveal delay-2">
          <p>Headquartered in Sunningdale, United Kingdom, with a strong operational presence spanning Europe and India, Zeneesha Limited is an elite IT consulting firm specialising in end-to-end Workday solutions.</p>
          <p>We don't just configure enterprise software; we transform complex Human Capital Management (HCM), Financial Operations, and advanced analytics platforms into streamlined engines for sustainable growth. By prioritising business outcomes over rigid, checklist-driven implementations, we help global Organisations unlock the maximum return on their strategic software investments.</p>
        </div>
        <a href="#leadership" class="ams-next-button ams-next-button--primary reveal delay-3">Meet Our Team <?php echo z_arrow( 14 ); ?></a>
      </div>
      <figure class="utility-next-hero-media reveal delay-2">
        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/about-zeneesha.jpg' ); ?>" width="1000" height="660" alt="Enterprise team in a business strategy meeting" fetchpriority="high">
      </figure>
    </div>
  </section>

  <section class="about-next-journey">
    <div class="container">
      <div class="utility-next-heading reveal">
        <h2>The Zeneesha Journey: Built on Resilience</h2>
        <p>Our story is defined by intentional choices, relentless grit, and an unwavering commitment to premium execution.</p>
      </div>
      <div class="about-next-timeline">
        <?php foreach ( $journey as $i => $item ) : ?>
          <article class="about-next-timeline-item reveal" style="transition-delay:<?php echo esc_attr( $i * 80 ); ?>ms">
            <span><?php echo esc_html( $item['year'] ); ?></span>
            <div><h3><?php echo esc_html( $item['title'] ); ?></h3><p><?php echo esc_html( $item['body'] ); ?></p></div>
          </article>
        <?php endforeach; ?>
      </div>
      <p class="about-next-today reveal">Today, Zeneesha stands as a comprehensive, globally distributed consultancy trusted by enterprise leaders worldwide.</p>
    </div>
  </section>

  <section class="about-next-credentials">
    <div class="container">
      <div class="utility-next-heading reveal">
        <h2>Enterprise Security & Compliance Credentials</h2>
        <p>Trust is non-negotiable when optimising business-critical corporate ecosystems. Zeneesha operates under strict information security management practices and holds major credentials, including:</p>
      </div>
      <div class="about-next-credential-grid">
        <?php foreach ( $credentials as $i => $credential ) : ?>
          <div class="about-next-credential reveal" style="transition-delay:<?php echo esc_attr( $i * 70 ); ?>ms"><span><?php printf( '%02d', $i + 1 ); ?></span><p><?php echo esc_html( $credential ); ?></p></div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="about-next-vision">
    <div class="container">
      <div class="utility-next-heading reveal"><h2>Our Strategic Vision & Mission</h2></div>
      <div class="about-next-vision-grid">
        <article class="about-next-vision-card reveal delay-1">
          <h3>Our Vision</h3>
          <p>To transform corporate HCM and Finance architectures through the power of Workday, enabling organisations to completely maximise platform value. As the enterprise partner of choice, we provide expert guidance and strategic, post-deployment support to elevate the employee experience, eliminate process friction, and maximise fiscal return on investment.</p>
        </article>
        <article class="about-next-vision-card reveal delay-2">
          <h3>Our Mission</h3>
          <p>To turn our clients' operational aspirations into predictable realities through reliable, innovative, and tailored Workday engineering. By matching unique organisational needs with precise technical solutions, we build frameworks based on quality, trust, and continuous optimisation.</p>
        </article>
      </div>
    </div>
  </section>

  <section class="about-next-values">
    <div class="container">
      <div class="utility-next-heading reveal"><h2>The Values That Govern Us</h2></div>
      <div class="about-next-values-grid">
        <?php foreach ( $values as $i => $value ) : ?>
          <article class="about-next-value reveal" style="transition-delay:<?php echo esc_attr( $i * 80 ); ?>ms"><span><?php printf( '%02d', $i + 1 ); ?></span><h3><?php echo esc_html( $value['title'] ); ?></h3><p><?php echo esc_html( $value['body'] ); ?></p></article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section id="leadership" class="about-next-leadership">
    <div class="container">
      <div class="utility-next-heading reveal">
        <h2>Meet Our Team</h2>
        <p>Our growth and delivery excellence are driven by a senior-led executive team with decades of combined experience in the global enterprise software landscape:</p>
      </div>
      <div class="about-next-leader-grid">
        <?php foreach ( $leaders as $i => $leader ) : ?>
          <article class="about-next-leader reveal" style="transition-delay:<?php echo esc_attr( $i * 90 ); ?>ms">
            <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/leadership/' . $leader['image'] . '?ver=2.1.173' ); ?>" width="500" height="625" alt="<?php echo esc_attr( $leader['name'] ); ?>" loading="lazy">
            <div><h3><?php echo esc_html( $leader['name'] ); ?></h3><p><?php echo esc_html( $leader['title'] ); ?></p><a href="<?php echo esc_url( $leader['url'] ); ?>" target="_blank" rel="noopener noreferrer">LinkedIn <?php echo z_arrow( 12 ); ?></a></div>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <?php
  $cta_section_id = 'about-contact';
  $cta_inner_id   = '';
  $cta_eyebrow    = 'Partner with Zeneesha';
  $cta_heading    = 'Ready to Evolve Your Tenant?';
  $cta_body       = "Stop treating your enterprise software as a mere system of record. Let's clean your data pipelines, secure your workflows, and build an agile digital architecture ready for the next wave of business innovation.";
  $cta_submit     = 'Partner with Zeneesha';
  require __DIR__ . '/partials/form-cta.php';
  ?>

</main>

<?php get_footer(); ?>
