<?php
/**
 * Template Name: Resources Page
 *
 * ACF-driven resources and insights hub for Zeneesha.
 * ACF fields: resources_headline (text), resources_tagline (text),
 *             resources_featured_title (text), resources_featured_excerpt (textarea),
 *             resources_featured_author (text), resources_featured_date (text),
 *             resources_featured_url (url),
 *             resources_articles (repeater): title, category, excerpt, url, date, author
 *             resources_newsletter_heading (text)
 */

get_header();

// ── ACF fields ──────────────────────────────────────────────────────────────
$headline            = zf( 'resources_headline', 'Thinking Clearly About Workday.' );
$tagline             = zf( 'resources_tagline',  'Practical insights from practitioners. No filler, no fluff — just what actually helps.' );
$newsletter_heading  = zf( 'resources_newsletter_heading', 'Stay Ahead of the Workday Curve' );

// ── Featured article ───────────────────────────────────────────────────────
$featured_title   = zf( 'resources_featured_title',   '' );
$featured_excerpt = zf( 'resources_featured_excerpt', '' );
$featured_author  = zf( 'resources_featured_author',  '' );
$featured_date    = zf( 'resources_featured_date',    '' );
$featured_url     = zf( 'resources_featured_url',     '' );

// ── Articles (ACF repeater with fallback hardcoded articles) ──────────────
$acf_articles = [];
if ( function_exists( 'get_field' ) ) {
    $acf_articles = get_field( 'resources_articles' ) ?: [];
}

$fallback_articles = [
    [
        'title'    => 'Zeneesha is now officially a Workday AMS Partner',
        'category' => 'Partnership',
        'excerpt'  => 'From vision to validation — how Zeneesha earned its place as a certified Workday AMS Partner, and what this means for clients navigating post-go-live support.',
        'url'      => 'https://www.zeneesha.com/from-vision-to-validation-zeneesha-is-now-officially-a-workday-ams-partner/',
        'date'     => 'September 2025',
        'author'   => 'Zeneesha Team',
    ],
    [
        'title'    => 'Navigating the Complexities of Workday Data Migration: A Step-by-Step Guide',
        'category' => 'Data Migration',
        'excerpt'  => 'Data migration remains one of the highest-risk phases of any Workday programme. This guide walks through the key stages, common failure points, and how to protect data integrity throughout.',
        'url'      => 'https://www.zeneesha.com/navigating-the-complexities-of-workday-data-migration-a-step-by-step-guide/',
        'date'     => 'January 2025',
        'author'   => 'Zeneesha Team',
    ],
    [
        'title'    => 'Workday AMS in the Age of AI: Enhancing Efficiency and Innovation',
        'category' => 'AMS',
        'excerpt'  => 'AI is reshaping what\'s possible in Workday AMS. From intelligent ticket routing to predictive maintenance, we explore how AI-enhanced support is changing the economics of post-go-live care.',
        'url'      => 'https://www.zeneesha.com/workday-ams-in-the-age-of-ai-enhancing-efficiency-and-innovation/',
        'date'     => 'January 2025',
        'author'   => 'Zeneesha Team',
    ],
];

$articles = ! empty( $acf_articles ) ? $acf_articles : $fallback_articles;

// ── Topic links ────────────────────────────────────────────────────────────
$topics = [
    [ 'label' => 'Workday HCM',        'slug' => 'workday-hcm' ],
    [ 'label' => 'Workday AMS',        'slug' => 'workday-ams' ],
    [ 'label' => 'Data Migration',     'slug' => 'data-migration' ],
    [ 'label' => 'Mid-Market',         'slug' => 'workday-mid-market' ],
    [ 'label' => 'Finance Training',   'slug' => 'workday-finance-training' ],
    [ 'label' => 'Workday AI',         'slug' => 'workday-ai' ],
];
?>

<!-- Reading progress bar -->
<div id="progress" class="reading-progress" aria-hidden="true"></div>

<main id="main" tabindex="-1">


<!-- ════════════════════════════════════════════════════════════
     1. HERO
════════════════════════════════════════════════════════════ -->
<section class="svc-ams-hero resources-hero">
  <div class="svc-hero-blobs" aria-hidden="true">
    <div class="svc-hero-blob svc-hero-blob--1" style="background:rgba(30,58,138,.07)"></div>
    <div class="svc-hero-blob svc-hero-blob--2"></div>
  </div>
  <div class="container">
    <div class="resources-hero-inner">

      <div class="section-label reveal">
        <span class="section-label-line" style="background:var(--navy)"></span>
        Resources &amp; Insights
      </div>

      <h1 class="svc-hero-title reveal delay-1"><?php echo esc_html( $headline ); ?></h1>

      <p class="svc-ams-tagline resources-tagline reveal delay-2">
        <?php echo esc_html( $tagline ); ?>
      </p>

    </div>
  </div>
</section>


<!-- ════════════════════════════════════════════════════════════
     2. FEATURED ARTICLE (only if ACF field is set)
════════════════════════════════════════════════════════════ -->
<?php if ( $featured_title ) : ?>
<section class="resources-featured-section">
  <div class="container">

    <div class="section-label reveal">
      <span class="section-label-line" style="background:var(--navy)"></span>
      Featured
    </div>

    <a href="<?php echo esc_url( $featured_url ?: '#' ); ?>" class="resources-featured-card reveal delay-1" <?php echo $featured_url ? '' : 'aria-disabled="true"'; ?>>
      <div class="resources-featured-inner">
        <div class="resources-featured-body">
          <h2 class="resources-featured-title"><?php echo esc_html( $featured_title ); ?></h2>
          <?php if ( $featured_excerpt ) : ?>
            <p class="resources-featured-excerpt"><?php echo esc_html( $featured_excerpt ); ?></p>
          <?php endif; ?>
          <div class="resources-featured-meta">
            <?php if ( $featured_author ) : ?>
              <span class="resources-meta-author"><?php echo esc_html( $featured_author ); ?></span>
            <?php endif; ?>
            <?php if ( $featured_date ) : ?>
              <span class="resources-meta-sep" aria-hidden="true">&middot;</span>
              <span class="resources-meta-date"><?php echo esc_html( $featured_date ); ?></span>
            <?php endif; ?>
          </div>
        </div>
        <div class="resources-featured-cta">
          Read more <?php echo z_arrow( 14 ); ?>
        </div>
      </div>
    </a>

  </div>
</section>
<?php endif; ?>


<!-- ════════════════════════════════════════════════════════════
     3. ARTICLES GRID
════════════════════════════════════════════════════════════ -->
<section class="resources-articles-section">
  <div class="container">

    <div class="resources-articles-intro">
      <div class="section-label reveal">
        <span class="section-label-line" style="background:var(--navy)"></span>
        Latest Articles
      </div>
      <h2 class="resources-articles-heading reveal delay-1">Latest Articles</h2>
    </div>

    <div class="resources-grid">
      <?php foreach ( $articles as $i => $article ) :
        $d     = ( $i % 3 ) * 80;
        $title    = isset( $article['title'] )    ? $article['title']    : '';
        $category = isset( $article['category'] ) ? $article['category'] : '';
        $excerpt  = isset( $article['excerpt'] )  ? $article['excerpt']  : '';
        $url      = isset( $article['url'] )      ? $article['url']      : '#';
        $date     = isset( $article['date'] )     ? $article['date']     : '';
        $author   = isset( $article['author'] )   ? $article['author']   : '';
      ?>
        <article class="resource-card reveal" style="transition-delay:<?php echo esc_attr( $d ); ?>ms">
          <div class="resource-card-top">
            <?php if ( $category ) : ?>
              <span class="resource-card-category"><?php echo esc_html( $category ); ?></span>
            <?php endif; ?>
          </div>
          <h3 class="resource-card-title"><?php echo esc_html( $title ); ?></h3>
          <?php if ( $excerpt ) : ?>
            <p class="resource-card-excerpt"><?php echo esc_html( $excerpt ); ?></p>
          <?php endif; ?>
          <div class="resource-card-footer">
            <div class="resource-card-meta">
              <?php if ( $author ) : ?>
                <span><?php echo esc_html( $author ); ?></span>
              <?php endif; ?>
              <?php if ( $date ) : ?>
                <span class="resource-card-date"><?php echo esc_html( $date ); ?></span>
              <?php endif; ?>
            </div>
            <a href="<?php echo esc_url( $url ); ?>" class="resource-card-link" target="_blank" rel="noopener noreferrer">
              Read article <?php echo z_arrow( 13 ); ?>
            </a>
          </div>
        </article>
      <?php endforeach; ?>
    </div>

  </div>
</section>


<!-- ════════════════════════════════════════════════════════════
     4. TOPIC LINKS
════════════════════════════════════════════════════════════ -->
<section class="resources-topics-section">
  <div class="container">

    <div class="section-label reveal" style="justify-content:center">
      <span class="section-label-line" style="background:var(--navy)"></span>
      Explore by Topic
      <span class="section-label-line" style="background:var(--navy)"></span>
    </div>
    <h2 class="resources-topics-heading reveal delay-1">Explore by Topic</h2>

    <div class="resources-topics-pills reveal delay-2">
      <?php foreach ( $topics as $topic ) : ?>
        <a href="<?php echo esc_url( home_url( '/' . $topic['slug'] . '/' ) ); ?>" class="resources-topic-pill">
          <?php echo esc_html( $topic['label'] ); ?>
        </a>
      <?php endforeach; ?>
    </div>

  </div>
</section>


<!-- ════════════════════════════════════════════════════════════
     5. NEWSLETTER BAND — dark navy background
════════════════════════════════════════════════════════════ -->
<section class="resources-newsletter-section">
  <div class="container">
    <div class="resources-newsletter-inner">

      <div class="resources-newsletter-copy">
        <div class="section-label reveal" style="color:rgba(255,255,255,.55)">
          <span class="section-label-line" style="background:rgba(255,255,255,.35)"></span>
          Newsletter
        </div>
        <h2 class="resources-newsletter-heading reveal delay-1">
          <?php echo esc_html( $newsletter_heading ); ?>
        </h2>
        <p class="resources-newsletter-sub reveal delay-2">
          Occasional emails when we publish something worth reading. No cadence quota. Unsubscribe any time.
        </p>
      </div>

      <div class="resources-newsletter-form reveal delay-2">
        <form class="newsletter-form" action="mailto:hello@zeneesha.co.uk" method="post" enctype="text/plain">
          <div class="newsletter-form-row">
            <input
              class="form-input newsletter-input"
              type="email"
              name="email"
              placeholder="your@email.com"
              required
              autocomplete="email"
              aria-label="Your email address"
            >
            <button type="submit" class="newsletter-submit">
              Subscribe <?php echo z_arrow( 14 ); ?>
            </button>
          </div>
          <p class="newsletter-privacy">
            We respect your privacy. No spam, ever.
            See our <a href="<?php echo esc_url( home_url( '/privacy-policy/' ) ); ?>">Privacy Policy</a>.
          </p>
        </form>
      </div>

    </div>
  </div>
</section>


</main>

<?php get_footer(); ?>
