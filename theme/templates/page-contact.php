<?php
/**
 * Template Name: Contact Page
 * Client copy sourced from Zeneesha Services.pdf, pages 30-32.
 */

get_header();

$contact_areas = [
    [
        'title' => 'Corporate Inquiries & General Admin',
        'body' => 'For corporate partnerships, general vendor inquiries, or overview questions.',
        'email' => 'info@zeneesha.com',
    ],
    [
        'title' => 'Workday Solutions & Advisory Services',
        'body' => 'Connect directly with our advisory team to discuss system evaluation, pricing, integrations, or strategic rollouts.',
        'email' => 'sales@zeneesha.com',
    ],
    [
        'title' => 'Marketing & Growth Inquiries',
        'body' => 'For media relations, brand collaborations, corporate events, or digital marketing inquiries.',
        'email' => 'marketing@zeneesha.org',
    ],
    [
        'title' => 'Global Careers & HR',
        'body' => 'Looking to join an elite, values-driven team of Workday implementation experts? Reach out to our human resources department.',
        'email' => 'hr@zeneesha.com',
    ],
];
?>

<main id="main" class="ams-next-root utility-next-root contact-next-root" tabindex="-1">

  <section class="utility-next-hero contact-next-hero">
    <div class="container utility-next-hero-grid contact-next-hero-grid">
      <div class="utility-next-hero-copy">
        <p class="ams-next-eyebrow reveal">Contact Us</p>
        <h1 class="reveal delay-1">Let's Build a Secure, Optimised Blueprint for Your <span>Growth.</span></h1>
        <p class="utility-next-hero-intro reveal delay-2">Whether you are looking to run a comprehensive tenant health audit, execute a global Phase X deployment, or architect your infrastructure for enterprise AI, our team of senior architects is ready to assist you. Reach out to start a precise, outcome-focused conversation.</p>
        <a href="#inquire" class="ams-next-button ams-next-button--primary reveal delay-3">Submit Inquiry <?php echo z_arrow( 14 ); ?></a>
      </div>
      <div class="contact-next-hero-panel reveal delay-2">
        <h2>Our Global Offices</h2>
        <div><span>Headquarters</span><strong>Sunningdale, Berkshire, United Kingdom</strong></div>
        <div><span>Global Delivery Centers</span><strong>Europe & India</strong></div>
      </div>
    </div>
  </section>

  <section class="contact-next-areas">
    <div class="container">
      <div class="utility-next-heading reveal"><h2>Get in Touch With Our Specialists</h2></div>
      <div class="contact-next-area-grid">
        <?php foreach ( $contact_areas as $i => $area ) : ?>
          <article class="contact-next-area reveal" style="transition-delay:<?php echo esc_attr( $i * 80 ); ?>ms">
            <span><?php printf( '%02d', $i + 1 ); ?></span>
            <h3><?php echo esc_html( $area['title'] ); ?></h3>
            <p><?php echo esc_html( $area['body'] ); ?></p>
            <a href="mailto:<?php echo esc_attr( $area['email'] ); ?>"><?php echo esc_html( $area['email'] ); ?> <?php echo z_arrow( 12 ); ?></a>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section id="inquire" class="contact-next-form-section">
    <div class="container contact-next-form-grid">
      <div class="contact-next-form-copy reveal">
        <h2>Inquire Online</h2>
        <p>Please complete the brief diagnostic form below. A senior Workday consultant will review your operational requirements and follow up within one business day.</p>
      </div>
      <div class="contact-next-form-card reveal delay-1">
        <form id="cta-contact-form" class="form--light" novalidate>
          <?php wp_nonce_field( 'zeneesha_contact_nonce', 'zeneesha_nonce' ); ?>
          <input type="hidden" name="action" value="zeneesha_contact">
          <div class="form-row">
            <div class="form-group">
              <label class="field-label" for="contact_name">First & Last Name <span>*</span></label>
              <input class="form-input" type="text" id="contact_name" name="contact_name" required autocomplete="name">
            </div>
            <div class="form-group">
              <label class="field-label" for="contact_email">Corporate Email Address <span>*</span></label>
              <input class="form-input" type="email" id="contact_email" name="contact_email" required autocomplete="email">
            </div>
          </div>
          <div class="form-group">
            <label class="field-label" for="contact_company">Company Name</label>
            <input class="form-input" type="text" id="contact_company" name="contact_company" autocomplete="organization">
          </div>
          <div class="form-group">
            <label class="field-label" for="contact_interest">Primary Area of Interest</label>
            <select class="form-input form-select" id="contact_interest" name="contact_interest">
              <option value="">Please select</option>
              <option value="ai-enablement">Workday AI Enablement & Readiness Assessment</option>
              <option value="maximise">Tenant Optimisation & Maximise Services</option>
              <option value="phase-x">Phase X Deployments & Global Rollouts</option>
              <option value="ams">Application Management Services (AMS) Support</option>
              <option value="integrations">Custom Integrations & Extend Apps</option>
            </select>
          </div>
          <div class="form-group">
            <label class="field-label" for="contact_message">Brief Description of Your System Environment or Goals</label>
            <textarea class="form-input form-textarea" id="contact_message" name="contact_message" rows="5"></textarea>
          </div>
          <button type="submit" class="form-submit">Submit Inquiry <?php echo z_arrow( 14 ); ?></button>
          <div id="form-message" class="form-msg" role="alert" aria-live="polite"></div>
        </form>
      </div>
    </div>
  </section>

  <section class="contact-next-security">
    <div class="container contact-next-security-inner reveal">
      <h2>Our Commitment to Security & Compliance</h2>
      <p>Because we operate as a secure enterprise partner, any data or architecture details shared during our discovery phases are protected under strict corporate frameworks. Zeneesha is ISO 27001-certified, Cyber Essentials-accredited, and strictly compliant with global GDPR and data privacy requirements.</p>
    </div>
  </section>

</main>

<?php get_footer(); ?>
