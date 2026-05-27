<?php
/**
 * Template Name: Partnership Page
 *
 * Partnership page for Zeneesha — partner models, current partners, application form.
 * ACF fields: partner_headline (text), partner_tagline (text)
 * Form uses existing zeneesha_contact AJAX handler — no new handler needed.
 */

get_header();

// ── ACF fields ──────────────────────────────────────────────────────────────
$headline = zf( 'partner_headline', "Grow Together.\nDeliver More." );
$tagline  = zf( 'partner_tagline',  "We partner with technology vendors, consultancies, and advisory firms who share our commitment to client outcomes. Together we deliver more value than either of us could alone." );

// ── Partner models ─────────────────────────────────────────────────────────
$models = [
    [
        'title'    => 'Referral Partner',
        'desc'     => 'Introduce us to organisations navigating a Workday implementation or support challenge. You earn a referral fee; they get the best Workday team.',
        'benefits' => [ 'Simple agreement', 'Transparent fees', 'No delivery obligations' ],
        'icon'     => '<svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="18" cy="5" r="3"/><circle cx="6" cy="12" r="3"/><circle cx="18" cy="19" r="3"/><line x1="8.59" y1="13.51" x2="15.42" y2="17.49"/><line x1="15.41" y1="6.51" x2="8.59" y2="10.49"/></svg>',
        'color'    => 'var(--navy)',
        'value'    => 'referral',
    ],
    [
        'title'    => 'Technology Partner',
        'desc'     => 'Build integrations, extend capabilities, or co-develop solutions on the Workday platform. We bring the functional expertise, you bring the technology.',
        'benefits' => [ 'Joint GTM', 'Technical collaboration', 'Shared clients' ],
        'icon'     => '<svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="4" y="4" width="16" height="16" rx="2"/><rect x="9" y="9" width="6" height="6"/><line x1="9" y1="1" x2="9" y2="4"/><line x1="15" y1="1" x2="15" y2="4"/><line x1="9" y1="20" x2="9" y2="23"/><line x1="15" y1="20" x2="15" y2="23"/><line x1="20" y1="9" x2="23" y2="9"/><line x1="20" y1="14" x2="23" y2="14"/><line x1="1" y1="9" x2="4" y2="9"/><line x1="1" y1="14" x2="4" y2="14"/></svg>',
        'color'    => 'var(--sky2)',
        'value'    => 'technology',
    ],
    [
        'title'    => 'Delivery Partner',
        'desc'     => 'Staff augmentation, subcontracting, or co-delivery. Zeneesha clients benefit from your specialist capability; your clients benefit from ours.',
        'benefits' => [ 'Resource sharing', 'Capability extension', 'Cross-referral' ],
        'icon'     => '<svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 7V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v2"/><line x1="12" y1="12" x2="12" y2="16"/><line x1="10" y1="14" x2="14" y2="14"/></svg>',
        'color'    => 'var(--orange)',
        'value'    => 'delivery',
    ],
];

// ── Current partners ───────────────────────────────────────────────────────
$partners = [
    'Quadient',
    'Datamatics',
    'System C',
    'Baringa',
    'KION Group',
    'AWA',
];
?>

<!-- Reading progress bar -->
<div id="progress" class="reading-progress" aria-hidden="true"></div>

<main id="main" tabindex="-1">


<!-- ════════════════════════════════════════════════════════════
     1. HERO
════════════════════════════════════════════════════════════ -->
<section class="svc-ams-hero partner-hero">
  <div class="svc-hero-blobs" aria-hidden="true">
    <div class="svc-hero-blob svc-hero-blob--1" style="background:rgba(30,58,138,.07)"></div>
    <div class="svc-hero-blob svc-hero-blob--2"></div>
  </div>
  <div class="container">
    <div class="partner-hero-inner">

      <div class="section-label reveal">
        <span class="section-label-line" style="background:var(--navy)"></span>
        Partner with Zeneesha
      </div>

      <h1 class="svc-hero-title partner-headline reveal delay-1">
        <?php echo nl2br( esc_html( $headline ) ); ?>
      </h1>

      <p class="svc-ams-tagline partner-tagline reveal delay-2">
        <?php echo esc_html( $tagline ); ?>
      </p>

      <div class="svc-ams-ctas reveal delay-3">
        <a href="#partner-form" class="btn-primary">
          Explore partnership <?php echo z_arrow( 14 ); ?>
        </a>
      </div>

    </div>
  </div>
</section>


<!-- ════════════════════════════════════════════════════════════
     2. PARTNER MODELS — 3-col cards
════════════════════════════════════════════════════════════ -->
<section class="partner-models-section">
  <div class="container">

    <div class="partner-models-intro">
      <div class="section-label reveal">
        <span class="section-label-line" style="background:var(--navy)"></span>
        How We Partner
      </div>
      <h2 class="partner-models-heading reveal delay-1">Three Ways to Work Together</h2>
      <p class="partner-models-sub reveal delay-2">
        Choose the model that fits your business. All partnerships start with a simple conversation.
      </p>
    </div>

    <div class="partner-models-grid">
      <?php foreach ( $models as $i => $model ) :
        $d = $i * 80;
      ?>
        <div class="partner-model-card reveal" style="transition-delay:<?php echo esc_attr( $d ); ?>ms">
          <div class="partner-model-icon" style="color:<?php echo esc_attr( $model['color'] ); ?>">
            <?php echo $model['icon']; // phpcs:ignore ?>
          </div>
          <h3 class="partner-model-title"><?php echo esc_html( $model['title'] ); ?></h3>
          <p class="partner-model-desc"><?php echo esc_html( $model['desc'] ); ?></p>
          <div class="partner-model-sep"></div>
          <ul class="partner-model-benefits">
            <?php foreach ( $model['benefits'] as $benefit ) : ?>
              <li class="partner-model-benefit">
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="<?php echo esc_attr( $model['color'] ); ?>" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 6L9 17l-5-5"/></svg>
                <?php echo esc_html( $benefit ); ?>
              </li>
            <?php endforeach; ?>
          </ul>
          <a href="#partner-form" class="partner-model-cta" data-type="<?php echo esc_attr( $model['value'] ); ?>">
            Apply as <?php echo esc_html( $model['title'] ); ?> <?php echo z_arrow( 13 ); ?>
          </a>
        </div>
      <?php endforeach; ?>
    </div>

  </div>
</section>


<!-- ════════════════════════════════════════════════════════════
     3. CURRENT PARTNERS — logo grid (text boxes)
════════════════════════════════════════════════════════════ -->
<section class="partner-logos-section">
  <div class="container">

    <div class="section-label reveal" style="justify-content:center">
      <span class="section-label-line" style="background:var(--navy)"></span>
      Our Partners
      <span class="section-label-line" style="background:var(--navy)"></span>
    </div>
    <h2 class="partner-logos-heading reveal delay-1">Our Partners</h2>
    <p class="partner-logos-sub reveal delay-2">
      We work alongside best-in-class organisations who share our values and our commitment to client outcomes.
    </p>

    <div class="partner-logos-grid reveal delay-2">
      <?php foreach ( $partners as $i => $partner ) :
        $d = ( $i % 3 ) * 60;
      ?>
        <div class="partner-logo-box reveal" style="transition-delay:<?php echo esc_attr( $d ); ?>ms">
          <?php echo esc_html( $partner ); ?>
        </div>
      <?php endforeach; ?>
    </div>

  </div>
</section>


<!-- ════════════════════════════════════════════════════════════
     4. PARTNER APPLICATION FORM
════════════════════════════════════════════════════════════ -->
<section id="partner-form" class="section-cta partner-form-section">

  <div aria-hidden="true" style="position:absolute;inset:0;overflow:hidden;pointer-events:none">
    <div class="cta-blob-1"></div>
    <div class="cta-blob-2"></div>
  </div>

  <div class="cta-inner">
    <div>
      <div class="section-label reveal cta-label">
        <span class="section-label-line" style="background:var(--redorange)"></span>
        Apply to Partner
      </div>
      <h2 class="cta-heading reveal delay-1">
        Apply to Partner
        <span> with Zeneesha.</span>
      </h2>
      <p class="cta-body reveal delay-2">
        Tell us about your organisation and the partnership model you&rsquo;re interested in. We aim to respond within two working days.
      </p>
      <ul class="partner-form-assurances reveal delay-3">
        <li>
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#10b981" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 6L9 17l-5-5"/></svg>
          Simple, straightforward partnership agreements
        </li>
        <li>
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#10b981" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 6L9 17l-5-5"/></svg>
          Reviewed by a director, not a sales team
        </li>
        <li>
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#10b981" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 6L9 17l-5-5"/></svg>
          Response within two working days
        </li>
      </ul>
    </div>

    <div class="reveal delay-3">
      <div class="cta-form-wrap">
        <div class="cta-form-label">Partnership enquiry</div>
        <form id="cta-contact-form" novalidate>
          <?php wp_nonce_field( 'zeneesha_contact_nonce', 'zeneesha_nonce' ); ?>
          <input type="hidden" name="action" value="zeneesha_contact">
          <input type="hidden" name="form_source" value="partnership">

          <div class="form-row">
            <div class="form-group">
              <label class="field-label" for="partner_company">Company name <span>*</span></label>
              <input class="form-input" type="text" id="partner_company" name="contact_company" placeholder="Acme Ltd" required autocomplete="organization">
            </div>
            <div class="form-group">
              <label class="field-label" for="partner_name">Contact name <span>*</span></label>
              <input class="form-input" type="text" id="partner_name" name="contact_name" placeholder="Your full name" required autocomplete="name">
            </div>
          </div>

          <div class="form-group">
            <label class="field-label" for="partner_email">Email <span>*</span></label>
            <input class="form-input" type="email" id="partner_email" name="contact_email" placeholder="you@company.com" required autocomplete="email">
          </div>

          <div class="form-group">
            <label class="field-label" for="partner_type">Partnership type</label>
            <select class="form-input form-select" id="partner_type" name="partner_type">
              <option value="">Please select&hellip;</option>
              <option value="referral">Referral Partner</option>
              <option value="technology">Technology Partner</option>
              <option value="delivery">Delivery Partner</option>
              <option value="other">Other</option>
            </select>
          </div>

          <div class="form-group">
            <label class="field-label" for="partner_message">Message</label>
            <textarea class="form-input form-textarea" id="partner_message" name="contact_message" rows="4" placeholder="Tell us about your organisation and how you see the partnership working..."></textarea>
          </div>

          <div class="form-group">
            <button type="submit" class="form-submit">
              Submit Application <?php echo z_arrow( 14 ); ?>
            </button>
          </div>

          <div id="form-message" class="form-msg" role="alert" aria-live="polite"></div>
        </form>
      </div>
    </div>
  </div>

</section>


</main>

<?php get_footer(); ?>
