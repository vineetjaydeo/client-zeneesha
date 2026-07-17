<?php
/**
 * Template Name: Partnership Page
 * Client copy sourced from Zeneesha Services.pdf, pages 24-25.
 */

get_header();

$benefits = [
    [ 'title' => 'Shared Expertise', 'body' => 'Leverage our deep bench of Workday consultants and advisory specialists to augment your own service offerings.' ],
    [ 'title' => 'Joint Go-To-Market (GTM) Synergy', 'body' => 'Benefit from our streamlined lead generation funnels, technical marketing insights, and co-branded content initiatives.' ],
    [ 'title' => 'Unmatched Implementation Quality', 'body' => 'Our rigorous, performance-driven approach ensures higher client satisfaction and retention, reflecting positively on your brand.' ],
    [ 'title' => 'Dedicated Support', 'body' => 'Gain direct access to our leadership team for collaborative deal-closing and strategic project alignment.' ],
];

$partners = [
    [ 'name' => 'Quadient', 'image' => 'quadient.jpg' ],
    [ 'name' => 'Datamatics', 'image' => 'datamatics.jpg' ],
    [ 'name' => 'System C', 'image' => 'system-c.jpg' ],
    [ 'name' => 'Market Cloud', 'image' => 'market-cloud.jpg' ],
    [ 'name' => 'Baringa', 'image' => 'baringa.jpg' ],
    [ 'name' => 'KION Group', 'image' => 'kion.jpg' ],
    [ 'name' => 'AWA', 'image' => 'awa.jpg' ],
    [ 'name' => 'UKRI', 'image' => 'ukri.jpg' ],
];
?>

<main id="main" class="ams-next-root utility-next-root partnership-next-root" tabindex="-1">

  <section class="utility-next-hero partnership-next-hero">
    <div class="container utility-next-hero-grid">
      <div class="utility-next-hero-copy">
        <p class="ams-next-eyebrow reveal">Workday Partner</p>
        <h1 class="reveal delay-1">Unlock Exponential Growth with <span>Zeneesha</span></h1>
        <p class="utility-next-hero-intro reveal delay-2">In an era where Workday efficiency determines business agility, our partners are the catalysts that turn potential into performance. Join a collaborative ecosystem designed to solve complex HCM and financial challenges, deliver superior client value, and drive sustainable, long-term revenue.</p>
        <a href="#partner-contact" class="ams-next-button ams-next-button--primary reveal delay-3">Become a Partner <?php echo z_arrow( 14 ); ?></a>
      </div>
      <div class="partnership-next-logo-mosaic reveal delay-2">
        <?php foreach ( array_slice( $partners, 0, 6 ) as $partner ) : ?>
          <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/partners/' . $partner['image'] ); ?>" width="400" height="250" alt="<?php echo esc_attr( $partner['name'] ); ?>">
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="partnership-next-benefits">
    <div class="container">
      <div class="utility-next-heading reveal">
        <h2>Why Partner with Zeneesha?</h2>
        <p>We believe in a "Strategy Before Configuration" approach. When you partner with us, you don't just gain a vendor; you gain a team of specialists dedicated to operational excellence.</p>
      </div>
      <div class="partnership-next-benefit-grid">
        <?php foreach ( $benefits as $i => $benefit ) : ?>
          <article class="partnership-next-benefit reveal" style="transition-delay:<?php echo esc_attr( $i * 80 ); ?>ms"><span><?php printf( '%02d', $i + 1 ); ?></span><h3><?php echo esc_html( $benefit['title'] ); ?></h3><p><?php echo esc_html( $benefit['body'] ); ?></p></article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="partnership-next-who">
    <div class="container partnership-next-who-grid">
      <h2 class="reveal">Who Can Partner?</h2>
      <p class="reveal delay-1">We are looking to collaborate with forward-thinking organisations across the Workday ecosystem, whether you specialise in cutting-edge AI innovations, expert implementation services, or any other complementary capability. By partnering with us, you can expand your market reach, enhance your service offerings, and unlock new revenue streams. If you are ready to combine forces to accelerate technological transformation and deliver unmatched value to clients, we are ready to build a mutually beneficial partnership with you.</p>
    </div>
  </section>

  <section class="partnership-next-partners">
    <div class="container">
      <div class="utility-next-heading reveal">
        <h2>Our Trusted Partners</h2>
        <p>We are proud to collaborate with industry-leading organisations that share our commitment to excellence and transformation.</p>
      </div>
      <div class="partnership-next-partner-grid reveal delay-1">
        <?php foreach ( $partners as $partner ) : ?>
          <div><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/partners/' . $partner['image'] ); ?>" width="400" height="250" alt="<?php echo esc_attr( $partner['name'] ); ?>" loading="lazy"></div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <?php
  $cta_section_id = 'partner-contact';
  $cta_inner_id   = '';
  $cta_eyebrow    = 'Schedule a Partnership Discovery Call';
  $cta_heading    = 'Ready to Scale?';
  $cta_body       = "Let's discuss how we can build a mutually beneficial partnership that delivers tangible, high-impact results for your clients and your bottom line.";
  $cta_submit     = 'Schedule a Partnership Discovery Call';
  require __DIR__ . '/partials/form-cta.php';
  ?>

</main>

<?php get_footer(); ?>
