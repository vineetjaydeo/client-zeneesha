<?php
/**
 * Template Name: Service Page
 *
 * Supports ?v=1 (problem-led, form fold-2), ?v=2 (outcome-led), ?v=3 (methodology-led).
 * Defaults to v=1 when no parameter is set.
 */

get_header();

// ── Variant ──────────────────────────────────────────────────
$v = max( 1, min( 3, (int) ( $_GET['v'] ?? 1 ) ) );

// ── ACF fields ───────────────────────────────────────────────
$eyebrow          = zf( 'svc_eyebrow',      '' );
$tagline          = zf( 'svc_tagline',      '' );
$description      = zf( 'svc_description',  '' );
$color            = zf( 'svc_color',        '#1E3A8A' );
$outcomes_raw     = zf( 'svc_outcomes',     '' );
$deliverables_raw = zf( 'svc_deliverables', '' );
$pain_raw         = zf( 'svc_pain_points',  '' );
$process_raw      = zf( 'svc_process_steps','' );
$cs_metric        = zf( 'svc_cs_metric',    '' );
$cs_client        = zf( 'svc_cs_client',    '' );
$cs_result        = zf( 'svc_cs_result',    '' );

$outcomes      = array_filter( array_map( 'trim', explode( "\n", $outcomes_raw ) ) );
$deliverables  = array_filter( array_map( 'trim', explode( "\n", $deliverables_raw ) ) );
$pain_points   = array_filter( array_map( 'trim', explode( "\n", $pain_raw ) ) );
$process_steps = array_filter( array_map( 'trim', explode( "\n", $process_raw ) ) );

$title   = get_the_title();
$slug    = get_post_field( 'post_name', get_the_ID() );
$num_map = [ 'implementation' => '01', 'ams-support' => '02', 'maximise' => '03' ];

// ── Service hero background images (B&W texture) ─────────────────
$svc_hero_imgs = [
    'implementation' => 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=1400&q=60&auto=format&fit=crop',
    'ams-support'    => 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?w=1400&q=60&auto=format&fit=crop',
    'maximise'       => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=1400&q=60&auto=format&fit=crop',
];
$svc_hero_img = $svc_hero_imgs[ $slug ] ?? $svc_hero_imgs['implementation'];
$num     = $num_map[ $slug ] ?? '';

// ── Default pain points (v1 fallback) ────────────────────────
$default_pain = [
    'Your team is managing the same Workday issues sprint after sprint with no lasting fix.',
    'Support is reactive. Every release creates more work, not less.',
    'Workday is not being used to its full capability but the roadmap to get there is unclear.',
    'Business decisions are being made without reliable data from the platform.',
];

// ── Default process steps (v3 fallback) ──────────────────────
$default_process = [
    [ 'title' => 'Discovery',      'desc' => 'We review your current Workday configuration, support model, and business requirements in a focused kick-off session.' ],
    [ 'title' => 'Assessment',     'desc' => 'We identify gaps, risks, and opportunities across your setup, data, and processes and document what is working and what is not.' ],
    [ 'title' => 'Prioritisation', 'desc' => 'We agree a clear roadmap: quick wins first, strategic improvements structured around your release calendar and business priorities.' ],
    [ 'title' => 'Delivery',       'desc' => 'We execute against the plan with dedicated Workday expertise, keeping you informed at every stage with regular progress updates.' ],
    [ 'title' => 'Review',         'desc' => 'We measure outcomes against agreed targets and hand over documentation that supports your team going forward.' ],
];
?>

<!-- Reading progress bar -->
<div id="progress" class="reading-progress" aria-hidden="true"></div>

<main id="main" tabindex="-1">

<?php if ( $v === 1 ) : ?>
<!-- ════════════════════════════════════════════════════════════
     V1 — PROBLEM-LED  |  Form in fold 2
     Ad message: "Here is the problem. Let us fix it now."
════════════════════════════════════════════════════════════ -->

  <!-- V1 HERO ─────────────────────────────────────────────── -->
  <section class="page-hero-fullbg svc-hero" style="--svc-color:<?php echo esc_attr( $color ); ?>">
    <img src="<?php echo esc_url( $svc_hero_img ); ?>" class="svc-hero-bg-img" alt="" aria-hidden="true" loading="lazy" decoding="async" width="1400" height="613">
  <div class="hero-overlay" aria-hidden="true"></div>
  <div class="svc-hero-blobs" aria-hidden="true">
      <div class="svc-hero-blob svc-hero-blob--1" style="background:<?php echo esc_attr( $color ); ?>12"></div>
      <div class="svc-hero-blob svc-hero-blob--2"></div>
    </div>
    <div class="container">
      <div class="svc-hero-inner">

        <div class="svc-hero-eyebrow reveal">
          <span class="status-dot"></span>
          <?php if ( $num ) : ?>
            <span class="svc-num"><?php echo esc_html( $num ); ?></span>
            <span style="opacity:.35">/</span>
          <?php endif; ?>
          <?php echo esc_html( $eyebrow ); ?>
        </div>

        <h1 class="svc-hero-title reveal delay-1"><?php echo esc_html( $title ); ?></h1>

        <p class="svc-v1-hook reveal delay-2">
          Most organisations realise post go-live that their Workday setup is working against them, not for them. The signs are easy to miss until they become expensive.
        </p>

        <a href="#svc-form" class="svc-v1-anchor reveal delay-3">
          See if this applies to you <?php echo z_arrow( 14 ); ?>
        </a>

      </div>
    </div>
  </section>


  <!-- V1 FOLD 2: Pain points + Form ──────────────────────── -->
  <section class="svc-v1-body" id="svc-form">
    <div class="container">
      <div class="svc-v1-split">

        <!-- Left: pain points -->
        <div>
          <div class="section-label reveal" style="color:<?php echo esc_attr( $color ); ?>;margin-bottom:1.75rem">
            <span class="section-label-line" style="background:<?php echo esc_attr( $color ); ?>"></span>
            Sound familiar?
          </div>

          <ul class="svc-pain-list">
            <?php
            $pts = $pain_points ?: $default_pain;
            foreach ( $pts as $i => $p ) :
            ?>
              <li class="svc-pain-item reveal" style="transition-delay:<?php echo $i * 80; ?>ms">
                <span class="svc-pain-dot"></span>
                <span><?php echo esc_html( $p ); ?></span>
              </li>
            <?php endforeach; ?>
          </ul>

          <?php if ( $description ) : ?>
            <p class="svc-v1-extra-desc reveal" style="margin-top:2.5rem"><?php echo esc_html( $description ); ?></p>
          <?php endif; ?>
        </div>

        <!-- Right: form -->
        <div class="reveal delay-2">
          <div class="svc-v1-form-wrap">
            <div class="svc-v1-form-label">Book a complimentary health check</div>
            <p class="svc-v1-form-sub">60 minutes. No cost. A clear picture of where value is being lost.</p>

            <form id="cta-contact-form" class="form--light" novalidate>
              <div class="form-row">
                <div>
                  <label class="field-label" for="contact_name">Name <span>*</span></label>
                  <input class="form-input" type="text" id="contact_name" name="contact_name"
                         placeholder="Your full name" required autocomplete="name">
                </div>
                <div>
                  <label class="field-label" for="contact_phone">Phone</label>
                  <input class="form-input" type="tel" id="contact_phone" name="contact_phone"
                         placeholder="+44 ..." autocomplete="tel">
                </div>
              </div>
              <div class="form-group">
                <label class="field-label" for="contact_email">Work email <span>*</span></label>
                <input class="form-input" type="email" id="contact_email" name="contact_email"
                       placeholder="you@company.com" required autocomplete="email">
              </div>
              <div class="form-group">
                <label class="field-label" for="contact_message">What is the main challenge?</label>
                <textarea class="form-input form-textarea" id="contact_message" name="contact_message"
                          rows="3" placeholder="Briefly describe your current Workday situation..."></textarea>
              </div>
              <div class="form-group">
                <button type="submit" class="form-submit">
                  Book My Complimentary Health Check <?php echo z_arrow( 14 ); ?>
                </button>
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


  <!-- V1 FOLD 3: Outcomes + Deliverables ─────────────────── -->
  <?php if ( $outcomes || $deliverables || $cs_metric ) : ?>
  <section class="svc-body svc-v1-outcomes">
    <div class="container">
      <div class="svc-body-grid">

        <div class="svc-body-left">
          <?php if ( $outcomes ) : ?>
            <div class="svc-outcomes reveal">
              <div class="section-label" style="color:<?php echo esc_attr( $color ); ?>;margin-bottom:1.25rem">
                <span class="section-label-line" style="background:<?php echo esc_attr( $color ); ?>"></span>
                What changes when you work with us
              </div>
              <ul class="svc-outcomes-list">
                <?php foreach ( $outcomes as $o ) : ?>
                  <li class="svc-outcome-item">
                    <span class="svc-outcome-dot" style="background:<?php echo esc_attr( $color ); ?>"><?php echo z_check( 10 ); ?></span>
                    <span><?php echo esc_html( $o ); ?></span>
                  </li>
                <?php endforeach; ?>
              </ul>
            </div>
          <?php endif; ?>
        </div>

        <div class="svc-body-right">
          <?php if ( $deliverables ) : ?>
            <div class="svc-deliverables reveal" style="border-top-color:<?php echo esc_attr( $color ); ?>">
              <div class="section-label" style="margin-bottom:1.25rem">
                <span class="section-label-line" style="background:var(--slate2)"></span>
                Deliverables
              </div>
              <ul class="svc-deliverables-list">
                <?php foreach ( $deliverables as $d ) : ?>
                  <li class="svc-deliverable-item">
                    <span class="svc-deliverable-dot" style="background:<?php echo esc_attr( $color ); ?>"></span>
                    <span><?php echo esc_html( $d ); ?></span>
                  </li>
                <?php endforeach; ?>
              </ul>
            </div>
          <?php endif; ?>
          <?php if ( $cs_metric || $cs_client ) : ?>
            <div class="svc-case-study reveal delay-1"
                 style="border-left-color:<?php echo esc_attr( $color ); ?>;background:<?php echo esc_attr( $color ); ?>08">
              <div class="svc-cs-label" style="color:<?php echo esc_attr( $color ); ?>">Client outcome</div>
              <?php if ( $cs_metric ) : ?><div class="svc-cs-metric" style="color:<?php echo esc_attr( $color ); ?>"><?php echo esc_html( $cs_metric ); ?></div><?php endif; ?>
              <?php if ( $cs_client ) : ?><div class="svc-cs-client"><?php echo esc_html( $cs_client ); ?></div><?php endif; ?>
              <?php if ( $cs_result ) : ?><p class="svc-cs-result"><?php echo esc_html( $cs_result ); ?></p><?php endif; ?>
            </div>
          <?php endif; ?>
        </div>

      </div>
    </div>
  </section>
  <?php endif; ?>


<?php elseif ( $v === 2 ) : ?>
<!-- ════════════════════════════════════════════════════════════
     V2 — OUTCOME-LED  |  Proof first, then methodology
     Ad message: "Here is what we achieved. We can do it for you."
════════════════════════════════════════════════════════════ -->

  <!-- V2 HERO: metric as headline ────────────────────────── -->
  <section class="page-hero-fullbg svc-hero" style="--svc-color:<?php echo esc_attr( $color ); ?>">
    <img src="<?php echo esc_url( $svc_hero_img ); ?>" class="svc-hero-bg-img" alt="" aria-hidden="true" loading="lazy" decoding="async" width="1400" height="613">
  <div class="hero-overlay" aria-hidden="true"></div>
  <div class="svc-hero-blobs" aria-hidden="true">
      <div class="svc-hero-blob svc-hero-blob--1" style="background:<?php echo esc_attr( $color ); ?>12"></div>
      <div class="svc-hero-blob svc-hero-blob--2"></div>
    </div>
    <div class="container">
      <div class="svc-hero-inner">

        <div class="svc-hero-eyebrow reveal">
          <span class="status-dot"></span>
          <?php if ( $num ) : ?>
            <span class="svc-num"><?php echo esc_html( $num ); ?></span>
            <span style="opacity:.35">/</span>
          <?php endif; ?>
          <?php echo esc_html( $eyebrow ); ?>
        </div>

        <?php if ( $cs_metric ) : ?>
          <div class="svc-v2-metric reveal delay-1" style="color:<?php echo esc_attr( $color ); ?>"><?php echo esc_html( $cs_metric ); ?></div>
          <h1 class="svc-v2-metric-sub reveal delay-2"><?php echo esc_html( $title ); ?></h1>
          <?php if ( $cs_result ) : ?>
            <p class="svc-v2-proof reveal delay-3"><?php echo esc_html( $cs_result ); ?></p>
          <?php endif; ?>
        <?php else : ?>
          <h1 class="svc-hero-title reveal delay-1"><?php echo esc_html( $title ); ?></h1>
          <?php if ( $tagline ) : ?>
            <p class="svc-hero-tagline reveal delay-2" style="color:<?php echo esc_attr( $color ); ?>"><?php echo esc_html( $tagline ); ?></p>
          <?php endif; ?>
        <?php endif; ?>

        <div class="reveal delay-3" style="margin-top:1.75rem">
          <a href="#talk" class="svc-btn-primary">
            See how we deliver this <?php echo z_arrow( 14 ); ?>
          </a>
        </div>

      </div>
    </div>
  </section>


  <!-- V2 FOLD 2: Case study panel ────────────────────────── -->
  <?php if ( $cs_metric || $cs_client || $cs_result || $outcomes ) : ?>
  <section class="svc-v2-cs-section">
    <div class="container">
      <div class="svc-v2-cs-panel reveal" style="border-top-color:<?php echo esc_attr( $color ); ?>">

        <div class="svc-v2-cs-left">
          <div class="section-label" style="color:<?php echo esc_attr( $color ); ?>;margin-bottom:1.5rem">
            <span class="section-label-line" style="background:<?php echo esc_attr( $color ); ?>"></span>
            Proven result
          </div>
          <?php if ( $cs_client ) : ?><div class="cs-client-badge"><?php echo esc_html( $cs_client ); ?></div><?php endif; ?>
          <?php if ( $cs_metric ) : ?><div class="svc-v2-big-metric reveal" style="color:<?php echo esc_attr( $color ); ?>"><?php echo esc_html( $cs_metric ); ?></div><?php endif; ?>
          <?php if ( $cs_result ) : ?><p class="svc-v2-cs-body reveal delay-1"><?php echo esc_html( $cs_result ); ?></p><?php endif; ?>
        </div>

        <div class="svc-v2-cs-right">
          <?php if ( $outcomes ) : ?>
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
          <?php endif; ?>
        </div>

      </div>
    </div>
  </section>
  <?php endif; ?>


  <!-- V2 FOLD 3: Description + Deliverables ──────────────── -->
  <section class="svc-body">
    <div class="container">
      <div class="svc-body-grid">

        <div class="svc-body-left">
          <?php if ( $description ) : ?>
            <p class="svc-body-desc reveal"><?php echo esc_html( $description ); ?></p>
          <?php endif; ?>
          <div class="svc-cta-block reveal delay-1">
            <a href="#talk" class="svc-btn-primary">
              Discuss <?php echo esc_html( $title ); ?> <?php echo z_arrow( 14 ); ?>
            </a>
          </div>
        </div>

        <div class="svc-body-right">
          <?php if ( $deliverables ) : ?>
            <div class="svc-deliverables reveal" style="border-top-color:<?php echo esc_attr( $color ); ?>">
              <div class="section-label" style="margin-bottom:1.25rem">
                <span class="section-label-line" style="background:var(--slate2)"></span>
                Deliverables
              </div>
              <ul class="svc-deliverables-list">
                <?php foreach ( $deliverables as $d ) : ?>
                  <li class="svc-deliverable-item">
                    <span class="svc-deliverable-dot" style="background:<?php echo esc_attr( $color ); ?>"></span>
                    <span><?php echo esc_html( $d ); ?></span>
                  </li>
                <?php endforeach; ?>
              </ul>
            </div>
          <?php endif; ?>
        </div>

      </div>
    </div>
  </section>


<?php else : ?>
<!-- ════════════════════════════════════════════════════════════
     V3 — METHODOLOGY-LED  |  Process + deliverables upfront
     Ad message: "Here is exactly how we work. No ambiguity."
════════════════════════════════════════════════════════════ -->

  <!-- V3 HERO ─────────────────────────────────────────────── -->
  <section class="page-hero-fullbg svc-hero" style="--svc-color:<?php echo esc_attr( $color ); ?>">
    <img src="<?php echo esc_url( $svc_hero_img ); ?>" class="svc-hero-bg-img" alt="" aria-hidden="true" loading="lazy" decoding="async" width="1400" height="613">
  <div class="hero-overlay" aria-hidden="true"></div>
  <div class="svc-hero-blobs" aria-hidden="true">
      <div class="svc-hero-blob svc-hero-blob--1" style="background:<?php echo esc_attr( $color ); ?>12"></div>
      <div class="svc-hero-blob svc-hero-blob--2"></div>
    </div>
    <div class="container">
      <div class="svc-hero-inner">

        <div class="svc-hero-eyebrow reveal">
          <span class="status-dot"></span>
          <?php if ( $num ) : ?>
            <span class="svc-num"><?php echo esc_html( $num ); ?></span>
            <span style="opacity:.35">/</span>
          <?php endif; ?>
          <?php echo esc_html( $eyebrow ); ?>
        </div>

        <h1 class="svc-hero-title reveal delay-1"><?php echo esc_html( $title ); ?></h1>

        <p class="svc-v3-hook reveal delay-2" style="color:<?php echo esc_attr( $color ); ?>">
          A structured approach. Measurable outcomes. No ambiguity.
        </p>

        <?php if ( $description ) : ?>
          <p class="svc-v3-desc reveal delay-3"><?php echo esc_html( $description ); ?></p>
        <?php endif; ?>

      </div>
    </div>
  </section>


  <!-- V3 FOLD 2: Process steps ───────────────────────────── -->
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


  <!-- V3 FOLD 3: Outcomes + Deliverables + Case study ────── -->
  <section class="svc-body">
    <div class="container">
      <div class="svc-body-grid">

        <div class="svc-body-left">
          <?php if ( $outcomes ) : ?>
            <div class="svc-outcomes reveal">
              <div class="section-label" style="color:<?php echo esc_attr( $color ); ?>;margin-bottom:1.25rem">
                <span class="section-label-line" style="background:<?php echo esc_attr( $color ); ?>"></span>
                What this means for you
              </div>
              <ul class="svc-outcomes-list">
                <?php foreach ( $outcomes as $o ) : ?>
                  <li class="svc-outcome-item">
                    <span class="svc-outcome-dot" style="background:<?php echo esc_attr( $color ); ?>"><?php echo z_check( 10 ); ?></span>
                    <span><?php echo esc_html( $o ); ?></span>
                  </li>
                <?php endforeach; ?>
              </ul>
            </div>
          <?php endif; ?>
          <div class="svc-cta-block reveal delay-2">
            <a href="#talk" class="svc-btn-primary">
              Discuss <?php echo esc_html( $title ); ?> <?php echo z_arrow( 14 ); ?>
            </a>
          </div>
        </div>

        <div class="svc-body-right">
          <?php if ( $deliverables ) : ?>
            <div class="svc-deliverables reveal" style="border-top-color:<?php echo esc_attr( $color ); ?>">
              <div class="section-label" style="margin-bottom:1.25rem">
                <span class="section-label-line" style="background:var(--slate2)"></span>
                Deliverables
              </div>
              <ul class="svc-deliverables-list">
                <?php foreach ( $deliverables as $d ) : ?>
                  <li class="svc-deliverable-item">
                    <span class="svc-deliverable-dot" style="background:<?php echo esc_attr( $color ); ?>"></span>
                    <span><?php echo esc_html( $d ); ?></span>
                  </li>
                <?php endforeach; ?>
              </ul>
            </div>
          <?php endif; ?>
          <?php if ( $cs_metric || $cs_client ) : ?>
            <div class="svc-case-study reveal delay-1"
                 style="border-left-color:<?php echo esc_attr( $color ); ?>;background:<?php echo esc_attr( $color ); ?>08">
              <div class="svc-cs-label" style="color:<?php echo esc_attr( $color ); ?>">Client outcome</div>
              <?php if ( $cs_metric ) : ?><div class="svc-cs-metric" style="color:<?php echo esc_attr( $color ); ?>"><?php echo esc_html( $cs_metric ); ?></div><?php endif; ?>
              <?php if ( $cs_client ) : ?><div class="svc-cs-client"><?php echo esc_html( $cs_client ); ?></div><?php endif; ?>
              <?php if ( $cs_result ) : ?><p class="svc-cs-result"><?php echo esc_html( $cs_result ); ?></p><?php endif; ?>
            </div>
          <?php endif; ?>
        </div>

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
          <a href="<?php echo esc_url( home_url( '/' . $n['slug'] . '/' ) ); ?>?v=<?php echo $v; ?>"
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
     CTA FORM BAND — V2 and V3 only
     (V1 has form in fold 2 above)
════════════════════════════════════════════════════════════ -->
<?php if ( $v !== 1 ) : ?>
<section id="talk" class="section-cta">

  <div aria-hidden="true" style="position:absolute;inset:0;overflow:hidden;pointer-events:none">
    <div class="cta-blob-1"></div>
    <div class="cta-blob-2"></div>
  </div>

  <div class="cta-inner">

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
        In 60 minutes, we'll review your Workday setup and give you a clear picture of where value is being lost, and how to recover it.
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
              <input class="form-input" type="text" id="contact_name" name="contact_name"
                     placeholder="Your full name" required autocomplete="name">
            </div>
            <div>
              <label class="field-label" for="contact_phone">Phone</label>
              <input class="form-input" type="tel" id="contact_phone" name="contact_phone"
                     placeholder="+44 ..." autocomplete="tel">
            </div>
          </div>
          <div class="form-group">
            <label class="field-label" for="contact_email">Email <span>*</span></label>
            <input class="form-input" type="email" id="contact_email" name="contact_email"
                   placeholder="you@company.com" required autocomplete="email">
          </div>
          <div class="form-group">
            <label class="field-label" for="contact_message">Message</label>
            <textarea class="form-input form-textarea" id="contact_message" name="contact_message"
                      rows="4" placeholder="Tell us about your Workday environment..."></textarea>
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
