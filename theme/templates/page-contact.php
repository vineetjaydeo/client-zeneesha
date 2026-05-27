<?php
/**
 * Template Name: Contact Page
 *
 * Full Contact page for Zeneesha — hero, 2-col form+info, FAQ accordion.
 * ACF field group: key=group_contact, location: page_template == templates/page-contact.php
 * Fields: contact_tagline (text), contact_faq (repeater → faq_q / faq_a)
 */

get_header();

// ── ACF fields ──────────────────────────────────────────────────────────────
$tagline = zf( 'contact_tagline', "A complimentary 60-minute session where we review your Workday setup and give you a clear picture of where value is being lost — and how to recover it." );

// FAQ items — fallback to 5 common questions
$faq_raw = get_field( 'contact_faq' );
if ( empty( $faq_raw ) ) {
    $faq_raw = [
        [
            'faq_q' => 'What does the free Workday Health Check involve?',
            'faq_a' => 'We spend 60 minutes reviewing your current Workday configuration, asking targeted questions about pain points, and benchmarking your setup against similar organisations. You leave with a clear written summary of findings and a prioritised list of improvements — at no cost and with no obligation to proceed.',
        ],
        [
            'faq_q' => 'How quickly can Zeneesha start work after an engagement is agreed?',
            'faq_a' => 'For AMS retainers we typically onboard within two weeks of contract signature. For project work, we schedule a structured discovery sprint in the first week. Named consultants are assigned before day one — there is no warm-up period.',
        ],
        [
            'faq_q' => 'Do you work with organisations outside the UK?',
            'faq_a' => 'Yes. We are headquartered in London but deliver across EMEA. Many of our clients have multi-country Workday tenants spanning the UK, EU, Middle East, and Africa. Our consultants have worked across all major EMEA markets.',
        ],
        [
            'faq_q' => 'We already have an internal Workday team — can you work alongside them?',
            'faq_a' => 'Absolutely. Most of our clients have internal Workday administrators or analysts. We integrate cleanly into your team, handle the specialist or high-complexity work, and actively upskill your internal people over the course of the engagement.',
        ],
        [
            'faq_q' => 'What is the minimum engagement size you work with?',
            'faq_a' => 'Our AMS retainers start from ten days per month, making them accessible for mid-market organisations. For project work there is no fixed minimum — if you have a well-scoped, high-value problem, we can help. Reach out and we will be honest about whether we are the right fit.',
        ],
    ];
}
?>

<!-- FAQ Schema JSON-LD -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    <?php
    $schema_items = [];
    foreach ( $faq_raw as $item ) {
        $schema_items[] = '{
      "@type": "Question",
      "name": ' . wp_json_encode( $item['faq_q'] ) . ',
      "acceptedAnswer": {
        "@type": "Answer",
        "text": ' . wp_json_encode( $item['faq_a'] ) . '
      }
    }';
    }
    echo implode( ",\n    ", $schema_items );
    ?>

  ]
}
</script>

<!-- Breadcrumb Schema -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": [
    {"@type":"ListItem","position":1,"name":"Home","item":"<?php echo esc_url( home_url('/') ); ?>"},
    {"@type":"ListItem","position":2,"name":"Contact","item":"<?php echo esc_url( get_permalink() ); ?>"}
  ]
}
</script>

<!-- Reading progress bar -->
<div id="progress" class="reading-progress" aria-hidden="true"></div>

<main id="main" tabindex="-1">


<!-- ════════════════════════════════════════════════════════════
     1. HERO
════════════════════════════════════════════════════════════ -->
<section class="contact-hero">
  <div class="svc-hero-blobs" aria-hidden="true">
    <div class="svc-hero-blob svc-hero-blob--1" style="background:rgba(30,58,138,.07)"></div>
    <div class="svc-hero-blob svc-hero-blob--2" style="background:rgba(59,158,219,.05)"></div>
  </div>
  <div class="container">
    <div class="contact-hero-inner">

      <div class="contact-hero-text">
        <div class="section-label reveal">
          <span class="section-label-line" style="background:var(--navy)"></span>
          Get in touch
        </div>
        <h1 class="svc-hero-title reveal delay-1">Let&rsquo;s talk about your<br>Workday environment.</h1>
        <p class="contact-hero-sub reveal delay-2"><?php echo esc_html( $tagline ); ?></p>

        <!-- Trust badges -->
        <div class="contact-hero-badges reveal delay-3">
          <div class="contact-badge">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 6L9 17l-5-5"/></svg>
            No cost, no obligation
          </div>
          <div class="contact-badge">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
            Reply within one working day
          </div>
          <div class="contact-badge">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
            Workday Sales &amp; Services Partner
          </div>
        </div>
      </div>

      <!-- Booking status chip -->
      <div class="contact-hero-status reveal delay-2">
        <span class="status-dot"></span>
        Currently booking Q3 engagements
      </div>

    </div>
  </div>
</section>


<!-- ════════════════════════════════════════════════════════════
     2. CONTACT BODY — 2-col: form + info
════════════════════════════════════════════════════════════ -->
<section class="contact-body-section">
  <div class="container">
    <div class="contact-body-grid">

      <!-- ── LEFT: Form ── -->
      <div class="contact-form-col reveal">
        <div class="contact-form-card">
          <div class="contact-form-header">
            <h2 class="contact-form-title">Send us a message</h2>
            <p class="contact-form-subtitle">Tell us what you&rsquo;re working with and we&rsquo;ll come back with honest, specific advice.</p>
          </div>

          <form id="contact-page-form" class="contact-page-form" novalidate>
            <?php wp_nonce_field( 'zeneesha_contact_nonce', 'zeneesha_nonce' ); ?>
            <input type="hidden" name="action" value="zeneesha_contact">

            <div class="form-row form-row--2col">
              <div class="form-group">
                <label for="cp_name" class="field-label">Full name <span aria-hidden="true">*</span></label>
                <input type="text" id="cp_name" name="contact_name" class="form-input" placeholder="Jane Smith" required autocomplete="name">
              </div>
              <div class="form-group">
                <label for="cp_phone" class="field-label">Phone</label>
                <input type="tel" id="cp_phone" name="contact_phone" class="form-input" placeholder="+44 20 0000 0000" autocomplete="tel">
              </div>
            </div>

            <div class="form-group">
              <label for="cp_email" class="field-label">Work email <span aria-hidden="true">*</span></label>
              <input type="email" id="cp_email" name="contact_email" class="form-input" placeholder="jane@company.com" required autocomplete="email">
            </div>

            <div class="form-group">
              <label for="cp_company" class="field-label">Company</label>
              <input type="text" id="cp_company" name="contact_company" class="form-input" placeholder="Acme Ltd" autocomplete="organization">
            </div>

            <div class="form-group">
              <label for="cp_interest" class="field-label">What are you looking for?</label>
              <select id="cp_interest" name="contact_interest" class="form-input form-select">
                <option value="">— Please select —</option>
                <option value="health-check">Free Workday Health Check</option>
                <option value="implementation">Implementation support</option>
                <option value="ams">AMS &amp; ongoing support</option>
                <option value="maximise">Maximise ROI / optimisation</option>
                <option value="partnership">Partnership enquiry</option>
                <option value="other">Something else</option>
              </select>
            </div>

            <div class="form-group">
              <label for="cp_message" class="field-label">Tell us about your Workday environment</label>
              <textarea id="cp_message" name="contact_message" class="form-input form-textarea" rows="5" placeholder="Which modules are you running? What is the challenge you are facing?"></textarea>
            </div>

            <button type="submit" class="form-submit contact-submit">
              Send Enquiry <?php echo z_arrow( 14 ); ?>
            </button>
            <div class="form-message" id="contact-form-message" role="alert" aria-live="polite"></div>
          </form>
        </div>
      </div>

      <!-- ── RIGHT: Info cards ── -->
      <div class="contact-info-col">

        <div class="contact-info-card reveal delay-1">
          <div class="contact-info-icon" style="background:rgba(30,58,138,.07);color:var(--navy)">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
          </div>
          <div>
            <div class="contact-info-label">Office</div>
            <div class="contact-info-value">Zeneesha Ltd.<br>14 Finsbury Circus<br>London EC2M 7EB</div>
          </div>
        </div>

        <div class="contact-info-card reveal delay-1">
          <div class="contact-info-icon" style="background:rgba(59,158,219,.08);color:var(--sky2)">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.81a19.79 19.79 0 01-3.07-8.63A2 2 0 012 .18h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.09 7.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 14.92l-.08 2z"/></svg>
          </div>
          <div>
            <div class="contact-info-label">Phone</div>
            <div class="contact-info-value">
              <a href="tel:+442080904040">+44 (0) 20 8090 4040</a>
            </div>
          </div>
        </div>

        <div class="contact-info-card reveal delay-2">
          <div class="contact-info-icon" style="background:rgba(245,124,31,.08);color:var(--orange)">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
          </div>
          <div>
            <div class="contact-info-label">Email</div>
            <div class="contact-info-value">
              <a href="mailto:hello@zeneesha.co.uk">hello@zeneesha.co.uk</a>
            </div>
          </div>
        </div>

        <div class="contact-info-card reveal delay-2">
          <div class="contact-info-icon" style="background:rgba(232,71,44,.07);color:var(--redorange)">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
          </div>
          <div>
            <div class="contact-info-label">Office hours</div>
            <div class="contact-info-value">Monday – Friday<br>09:00 – 17:00 GMT</div>
          </div>
        </div>

        <!-- Certifications strip -->
        <div class="contact-certs-strip reveal delay-3">
          <div class="contact-cert-badge">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
            Cyber Essentials Certified
          </div>
          <div class="contact-cert-badge">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="8" r="7"/><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"/></svg>
            Workday Sales &amp; Services Partner
          </div>
        </div>

        <!-- LinkedIn -->
        <div class="contact-social-row reveal delay-3">
          <a href="https://www.linkedin.com/company/zeneesha/" target="_blank" rel="noopener" class="contact-social-link" aria-label="Zeneesha on LinkedIn">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"/><circle cx="4" cy="4" r="2"/></svg>
            Follow on LinkedIn
          </a>
        </div>

      </div>

    </div>
  </div>
</section>


<!-- ════════════════════════════════════════════════════════════
     3. FAQ ACCORDION
════════════════════════════════════════════════════════════ -->
<section class="contact-faq-section">
  <div class="container">

    <div class="contact-faq-intro">
      <div class="section-label reveal">
        <span class="section-label-line" style="background:var(--navy)"></span>
        Frequently Asked
      </div>
      <h2 class="contact-faq-heading reveal delay-1">Common questions</h2>
      <p class="contact-faq-sub reveal delay-2">
        If your question is not here, use the form above — we reply within one working day.
      </p>
    </div>

    <div class="contact-faq-list">
      <?php foreach ( $faq_raw as $i => $item ) : ?>
        <div class="faq-item reveal" style="transition-delay:<?php echo esc_attr( $i * 60 ); ?>ms">
          <button class="faq-btn" aria-expanded="false" aria-controls="cfaq-<?php echo esc_attr( $i ); ?>">
            <span><?php echo esc_html( $item['faq_q'] ); ?></span>
            <svg class="faq-chevron" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="6 9 12 15 18 9"/></svg>
          </button>
          <div class="faq-body" id="cfaq-<?php echo esc_attr( $i ); ?>">
            <p><?php echo esc_html( $item['faq_a'] ); ?></p>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

  </div>
</section>


</main>

<?php get_footer(); ?>
