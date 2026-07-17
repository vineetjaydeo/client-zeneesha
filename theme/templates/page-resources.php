<?php
/**
 * Template Name: Resources Page
 * ACF-driven insights hub with client-owned article imagery.
 */

get_header();

$acf_articles = [];
if ( function_exists( 'get_field' ) ) {
    $acf_articles = get_field( 'resources_articles' ) ?: [];
}

$fallback_articles = [
    [
        'title' => 'Zeneesha is now officially a Workday AMS Partner',
        'category' => 'Partnership',
        'url' => 'https://www.zeneesha.com/from-vision-to-validation-zeneesha-is-now-officially-a-workday-ams-partner/',
        'date' => 'September 2025',
        'image' => 'workday-ams-partner.png',
    ],
    [
        'title' => 'Navigating the Complexities of Workday Data Migration: A Step-by-Step Guide',
        'category' => 'Data Migration',
        'url' => 'https://www.zeneesha.com/navigating-the-complexities-of-workday-data-migration-a-step-by-step-guide/',
        'date' => 'January 2025',
        'image' => 'data-migration.png',
    ],
    [
        'title' => 'Workday AMS in the Age of AI: Enhancing Efficiency and Innovation',
        'category' => 'AMS',
        'url' => 'https://www.zeneesha.com/workday-ams-in-the-age-of-ai-enhancing-efficiency-and-innovation/',
        'date' => 'January 2025',
        'image' => 'workday-ams-ai.png',
    ],
];

$articles = $acf_articles ?: $fallback_articles;
$topics = [
    [ 'label' => 'AMS & Continuous Improvement', 'slug' => 'workday-ams' ],
    [ 'label' => 'Secure Data Migration', 'slug' => 'workday-data-migration' ],
    [ 'label' => 'Mid-Market Support', 'slug' => 'workday-mid-market' ],
    [ 'label' => 'Release Management', 'slug' => 'workday-release-management-r1-r2' ],
    [ 'label' => 'Post-Go-Live Deployment', 'slug' => 'post-go-live-deployment' ],
    [ 'label' => 'The Future of Workday with AI', 'slug' => 'workday-ai' ],
];
?>

<main id="main" class="ams-next-root utility-next-root resources-next-root" tabindex="-1">

  <section class="utility-next-hero resources-next-hero">
    <div class="container utility-next-hero-grid resources-next-hero-grid">
      <div class="utility-next-hero-copy">
        <p class="ams-next-eyebrow reveal">Resources & Insights</p>
        <h1 class="reveal delay-1">Workday Deployment, AMS & <span>AI Insights</span></h1>
        <p class="utility-next-hero-intro reveal delay-2">From The Zeneesha Workday Lifecycle Playbook</p>
        <a href="#latest-insights" class="ams-next-button ams-next-button--primary reveal delay-3">Read Insights <?php echo z_arrow( 14 ); ?></a>
      </div>
      <a href="<?php echo esc_url( $articles[0]['url'] ?? '#' ); ?>" class="resources-next-featured reveal delay-2" target="_blank" rel="noopener noreferrer">
        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/resources/' . ( $articles[0]['image'] ?? 'workday-ams-partner.png' ) ); ?>" width="1200" height="627" alt="<?php echo esc_attr( $articles[0]['title'] ?? 'Zeneesha Workday insight' ); ?>" fetchpriority="high">
      </a>
    </div>
  </section>

  <section id="latest-insights" class="resources-next-articles">
    <div class="container">
      <div class="utility-next-heading reveal"><h2>Latest Articles</h2></div>
      <div class="resources-next-grid">
        <?php foreach ( $articles as $i => $article ) :
          $title = $article['title'] ?? '';
          $category = $article['category'] ?? '';
          $url = $article['url'] ?? '#';
          $date = $article['date'] ?? '';
          $image = $article['image'] ?? $fallback_articles[ $i % count( $fallback_articles ) ]['image'];
        ?>
          <article class="resources-next-card reveal" style="transition-delay:<?php echo esc_attr( $i * 90 ); ?>ms">
            <a href="<?php echo esc_url( $url ); ?>" target="_blank" rel="noopener noreferrer" class="resources-next-card-image"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/img/resources/' . $image ); ?>" width="1920" height="1080" alt="<?php echo esc_attr( $title ); ?>" loading="lazy"></a>
            <div class="resources-next-card-body">
              <div class="resources-next-card-meta"><span><?php echo esc_html( $category ); ?></span><span><?php echo esc_html( $date ); ?></span></div>
              <h3><a href="<?php echo esc_url( $url ); ?>" target="_blank" rel="noopener noreferrer"><?php echo esc_html( $title ); ?></a></h3>
              <a href="<?php echo esc_url( $url ); ?>" target="_blank" rel="noopener noreferrer" class="resources-next-card-link">Read article <?php echo z_arrow( 12 ); ?></a>
            </div>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="resources-next-topics">
    <div class="container">
      <div class="utility-next-heading reveal"><h2>Explore by Topic</h2></div>
      <div class="resources-next-topic-grid reveal delay-1">
        <?php foreach ( $topics as $topic ) : ?><a href="<?php echo esc_url( home_url( '/' . $topic['slug'] . '/' ) ); ?>"><?php echo esc_html( $topic['label'] ); ?> <?php echo z_arrow( 12 ); ?></a><?php endforeach; ?>
      </div>
    </div>
  </section>

  <?php
  $cta_section_id = 'resources-contact';
  $cta_inner_id   = '';
  $cta_eyebrow    = 'Book a Free Workday Health Check';
  $cta_heading    = 'Ready to build absolute confidence in your Workday investment?';
  $cta_body       = 'Stop settling for operational bottlenecks and generic advice. Get the senior-led delivery, commercial flexibility, and practical support your business deserves.';
  $cta_submit     = 'Book a Free Workday Health Check';
  require __DIR__ . '/partials/form-cta.php';
  ?>

</main>

<?php get_footer(); ?>
