<?php
/**
 * Template Name: About Page
 *
 * Full About page for Zeneesha — story, mission, directors, values, CTA.
 * ACF field group: key=group_about, location: page_template == templates/page-about.php
 * Fields: about_tagline (text), about_mission (textarea), about_story (textarea),
 *         about_director_bio_1 through about_director_bio_4 (textarea each).
 */

get_header();

// ── ACF fields ──────────────────────────────────────────────────────────────
$tagline = zf( 'about_tagline', 'We don\'t just implement Workday — we walk with you through every phase of the journey.' );
$mission = zf( 'about_mission', 'To transform HCM and Finance through the power of Workday — enabling every organisation to fully realise the value of their investment. As the partner of choice, we deliver expert guidance, measurable value, and strategic support.' );
$story   = zf( 'about_story',   "Zeneesha was founded by practitioners who lived through the frustration of ERP implementations delivered as projects rather than partnerships. We saw organisations go-live and then struggle — with adoption, with configuration debt, with releases that nobody tested, and with reports that leadership couldn't trust.\n\nWe built Zeneesha to be different. Not a bench of contractors but a named team. Not a ticket queue but a partnership with SLAs. Not implementation and move on, but a continuous relationship built around your outcomes.\n\nToday, Zeneesha is a Workday Sales and Services Partner, Cyber Essentials certified, and trusted by organisations from mid-market to enterprise across the UK and EMEA." );

// ── Directors (hardcoded fallbacks, overridable via ACF) ───────────────────
$directors = [
    [
        'name'    => zf( 'director_1_name',  'Rajesh Kumar' ),
        'title'   => zf( 'director_1_title', 'Managing Director' ),
        'bio'     => zf( 'about_director_bio_1', 'A self-motivated leader with deep expertise in analytics and communication, Rajesh has led ERP programmes across Pharma, Automotive, FMCG, and Insurance verticals throughout the EMEA region. He founded Zeneesha with a conviction that Workday clients deserve a partner — not just a supplier.' ),
        'initial' => 'R',
        'color'   => 'var(--navy)',
    ],
    [
        'name'    => zf( 'director_2_name',  'Ranjan Singh' ),
        'title'   => zf( 'director_2_title', 'Executive Director' ),
        'bio'     => zf( 'about_director_bio_2', 'With 15 years of experience spanning business transformation and ERP implementation, Ranjan brings rigorous project management discipline and a genuine commitment to corporate social responsibility. He ensures every Zeneesha engagement delivers lasting change.' ),
        'initial' => 'R',
        'color'   => 'var(--sky2)',
    ],
    [
        'name'    => zf( 'director_3_name',  'Keshav Kolla' ),
        'title'   => zf( 'director_3_title', 'Finance Director' ),
        'bio'     => zf( 'about_director_bio_3', 'Keshav brings 20 years of Finance and Telecoms experience, having operated at Fortune 500 level with Arcelor Mittal, BAT, IBM, and BP. A change management advocate, he ensures Zeneesha\'s financial operations and client investment cases are always grounded in measurable outcomes.' ),
        'initial' => 'K',
        'color'   => 'var(--orange)',
    ],
    [
        'name'    => zf( 'director_4_name',  'Karen Mayo' ),
        'title'   => zf( 'director_4_title', 'Sales Director' ),
        'bio'     => zf( 'about_director_bio_4', 'Karen brings 35 years of ERP and IT sales leadership, with senior roles at Kainos, Capita, and CGI. A Workday specialist for over a decade, she has led enterprise-scale engagements across the UK, Europe, and globally — and understands exactly what clients need before they ask.' ),
        'initial' => 'K',
        'color'   => 'var(--redorange)',
    ],
];

// ── Values ─────────────────────────────────────────────────────────────────
$values = [
    [
        'title' => 'Proven Expertise &amp; Global Reach',
        'desc'  => 'Senior practitioners with Fortune 500 and EMEA delivery experience across every major Workday module.',
        'icon'  => '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 014 10 15.3 15.3 0 01-4 10 15.3 15.3 0 01-4-10 15.3 15.3 0 014-10z"/></svg>',
    ],
    [
        'title' => 'Strategic &amp; Agile Approach',
        'desc'  => 'We combine long-term roadmap thinking with the flexibility to respond quickly when your priorities shift.',
        'icon'  => '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>',
    ],
    [
        'title' => 'Cost-Effective &amp; AI-Enhanced',
        'desc'  => 'Lean delivery models and AI tooling mean you get senior expertise at a price that makes commercial sense.',
        'icon'  => '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6"/></svg>',
    ],
    [
        'title' => 'Rapid Execution',
        'desc'  => 'Named teams, no internal handoffs, and a structured onboarding that gets us productive in days — not weeks.',
        'icon'  => '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>',
    ],
    [
        'title' => 'Human&#8209;AI Collaboration',
        'desc'  => 'We blend practitioner judgement with AI acceleration — so your outcomes are faster and more consistent.',
        'icon'  => '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>',
    ],
    [
        'title' => 'Ethics &amp; Transparency',
        'desc'  => 'We tell you what we find, even when it\'s not what you hoped to hear. No upsell, no ambiguity, no small print.',
        'icon'  => '<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>',
    ],
];
?>

<!-- Reading progress bar -->
<div id="progress" class="reading-progress" aria-hidden="true"></div>

<main id="main" tabindex="-1">


<!-- ════════════════════════════════════════════════════════════
     1. HERO
════════════════════════════════════════════════════════════ -->
<section class="svc-ams-hero about-hero">
  <div class="svc-hero-blobs" aria-hidden="true">
    <div class="svc-hero-blob svc-hero-blob--1" style="background:rgba(30,58,138,.07)"></div>
    <div class="svc-hero-blob svc-hero-blob--2"></div>
  </div>
  <div class="container">
    <div class="svc-ams-hero-split about-hero-split">

      <!-- Left: headline + tagline + CTAs -->
      <div class="svc-ams-hero-left hero-relative">
        <div class="section-label reveal">
          <span class="section-label-line" style="background:var(--navy)"></span>
          About Zeneesha
        </div>

        <h1 class="svc-hero-title reveal delay-1">Partners in Growth.</h1>

        <p class="svc-ams-tagline reveal delay-2"><?php echo esc_html( $tagline ); ?></p>

        <div class="svc-ams-ctas reveal delay-3">
          <a href="#directors" class="btn-primary">
            Work with us <?php echo z_arrow( 14 ); ?>
          </a>
          <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn-ghost">
            Book a consultation <?php echo z_arrow( 14 ); ?>
          </a>
        </div>
      </div>

      <!-- Right: credentials panel -->
      <div class="svc-typical-shape about-creds-panel reveal delay-2">
        <div class="svc-shape-header">Zeneesha at a Glance</div>
        <div class="svc-shape-row">
          <span class="svc-shape-key">Founded</span>
          <span class="svc-shape-val">2015 &mdash; London, UK</span>
        </div>
        <div class="svc-shape-row">
          <span class="svc-shape-key">Reg. No.</span>
          <span class="svc-shape-val">09579625</span>
        </div>
        <div class="svc-shape-row">
          <span class="svc-shape-key">Partner Status</span>
          <span class="svc-shape-val">Workday Sales &amp; Services Partner</span>
        </div>
        <div class="svc-shape-row">
          <span class="svc-shape-key">Certification</span>
          <span class="svc-shape-val">Cyber Essentials Certified</span>
        </div>
        <div class="svc-shape-row">
          <span class="svc-shape-key">Coverage</span>
          <span class="svc-shape-val">UK HQ &mdash; EMEA delivery</span>
        </div>
      </div>

    </div>
  </div>
</section>


<!-- ════════════════════════════════════════════════════════════
     2. MISSION
════════════════════════════════════════════════════════════ -->
<section class="about-mission-section">
  <div class="container">
    <div class="about-mission-split">

      <!-- Left: heading + body -->
      <div class="about-mission-left">
        <div class="section-label reveal">
          <span class="section-label-line" style="background:var(--navy)"></span>
          Our Mission
        </div>
        <h2 class="about-mission-heading reveal delay-1">Our Mission</h2>
        <p class="about-mission-body reveal delay-2"><?php echo esc_html( $mission ); ?></p>
      </div>

      <!-- Right: value pills -->
      <div class="about-mission-pills reveal delay-2">
        <div class="about-value-pill">
          <span class="about-value-pill-dot" style="background:var(--navy)"></span>
          People first
        </div>
        <div class="about-value-pill">
          <span class="about-value-pill-dot" style="background:var(--sky2)"></span>
          Measurable outcomes
        </div>
        <div class="about-value-pill">
          <span class="about-value-pill-dot" style="background:var(--orange)"></span>
          Trusted partnership
        </div>
      </div>

    </div>
  </div>
</section>


<!-- ════════════════════════════════════════════════════════════
     3. STORY — cream2 background
════════════════════════════════════════════════════════════ -->
<section class="about-story-section">
  <div class="container">
    <div class="about-story-inner">

      <div class="about-story-label-col">
        <div class="section-label reveal" style="flex-direction:column;align-items:flex-start;gap:.5rem">
          <span class="section-label-line" style="background:var(--navy);width:32px;height:2px;display:block"></span>
          Our Story
        </div>
      </div>

      <div class="about-story-text-col">
        <h2 class="about-story-heading reveal delay-1">Our Story</h2>
        <div class="about-story-body reveal delay-2">
          <?php echo nl2br( esc_html( $story ) ); ?>
        </div>
      </div>

    </div>
  </div>
</section>


<!-- ════════════════════════════════════════════════════════════
     4. DIRECTORS
════════════════════════════════════════════════════════════ -->
<section id="directors" class="about-directors-section">
  <div class="container">

    <div class="about-directors-intro">
      <div class="section-label reveal">
        <span class="section-label-line" style="background:var(--navy)"></span>
        Leadership
      </div>
      <h2 class="about-directors-heading reveal delay-1">Leadership</h2>
      <p class="about-directors-sub reveal delay-2">
        Our directors are practitioners first. Each one has spent their career inside Workday projects &mdash; not managing them from a distance.
      </p>
    </div>

    <div class="about-directors-grid">
      <?php foreach ( $directors as $i => $dir ) :
        $delay = ( $i % 2 ) * 100;
      ?>
        <div class="about-director-card reveal" style="transition-delay:<?php echo esc_attr( $delay ); ?>ms">
          <div class="about-director-avatar" style="background:<?php echo esc_attr( $dir['color'] ); ?>">
            <?php echo esc_html( $dir['initial'] ); ?>
          </div>
          <div class="about-director-meta">
            <div class="about-director-name"><?php echo esc_html( $dir['name'] ); ?></div>
            <div class="about-director-title"><?php echo esc_html( $dir['title'] ); ?></div>
          </div>
          <p class="about-director-bio"><?php echo esc_html( $dir['bio'] ); ?></p>
        </div>
      <?php endforeach; ?>
    </div>

  </div>
</section>


<!-- ════════════════════════════════════════════════════════════
     5. VALUES — dark navy background
════════════════════════════════════════════════════════════ -->
<section class="about-values-section">
  <div class="container">

    <div class="about-values-intro">
      <div class="section-label reveal" style="color:rgba(255,255,255,.55)">
        <span class="section-label-line" style="background:rgba(255,255,255,.35)"></span>
        Why Zeneesha
      </div>
      <h2 class="about-values-heading reveal delay-1">Why Zeneesha</h2>
      <p class="about-values-sub reveal delay-2">Six principles that shape every engagement we take on.</p>
    </div>

    <div class="about-values-grid">
      <?php foreach ( $values as $i => $val ) :
        $d = ( $i % 3 ) * 80;
      ?>
        <div class="about-value-card reveal" style="transition-delay:<?php echo esc_attr( $d ); ?>ms">
          <div class="about-value-card-icon"><?php echo $val['icon']; // phpcs:ignore ?></div>
          <h3 class="about-value-card-title"><?php echo wp_kses_post( $val['title'] ); ?></h3>
          <p class="about-value-card-desc"><?php echo esc_html( $val['desc'] ); ?></p>
        </div>
      <?php endforeach; ?>
    </div>

  </div>
</section>


<!-- ════════════════════════════════════════════════════════════
     6. CTA FORM
════════════════════════════════════════════════════════════ -->
<section class="section-cta" id="about-contact">

  <div aria-hidden="true" style="position:absolute;inset:0;overflow:hidden;pointer-events:none">
    <div class="cta-blob-1"></div>
    <div class="cta-blob-2"></div>
  </div>

  <div class="cta-inner">
    <div>
      <div class="section-label reveal cta-label">
        <span class="section-label-line" style="background:var(--redorange)"></span>
        Get in Touch
      </div>
      <h2 class="cta-heading reveal delay-1">
        Ready to start your Workday journey?
        <span> Let&rsquo;s talk.</span>
      </h2>
      <p class="cta-body reveal delay-2">
        Tell us about your organisation and where Workday is letting you down. We&rsquo;ll come back with a clear, honest assessment of what&rsquo;s possible.
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
          <?php wp_nonce_field( 'zeneesha_contact_nonce', 'zeneesha_nonce' ); ?>
          <input type="hidden" name="action" value="zeneesha_contact">
          <div class="form-row">
            <div>
              <label class="field-label" for="about_contact_name">Name <span>*</span></label>
              <input class="form-input" type="text" id="about_contact_name" name="contact_name" placeholder="Your full name" required autocomplete="name">
            </div>
            <div>
              <label class="field-label" for="about_contact_phone">Phone</label>
              <input class="form-input" type="tel" id="about_contact_phone" name="contact_phone" placeholder="+44 ..." autocomplete="tel">
            </div>
          </div>
          <div class="form-group">
            <label class="field-label" for="about_contact_email">Work email <span>*</span></label>
            <input class="form-input" type="email" id="about_contact_email" name="contact_email" placeholder="you@company.com" required autocomplete="email">
          </div>
          <div class="form-group">
            <label class="field-label" for="about_contact_message">Message</label>
            <textarea class="form-input form-textarea" id="about_contact_message" name="contact_message" rows="4" placeholder="Tell us about your Workday setup..."></textarea>
          </div>
          <div class="form-group">
            <button type="submit" class="form-submit">
              Send Message <?php echo z_arrow( 14 ); ?>
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
