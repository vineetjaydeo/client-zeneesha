<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- ── Navigation ── -->
<header class="site-nav" id="site-nav" role="banner">
  <div class="nav-inner">

    <!-- Logo -->
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="nav-logo" aria-label="Zeneesha home">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/zeneesha-logo.png" alt="Zeneesha" class="nav-brand-logo">
    </a>

    <!-- Desktop nav links -->
    <nav class="nav-links" aria-label="Main navigation">

      <!-- Services dropdown -->
      <li class="nav-has-dropdown">
        <button class="nav-dropdown-trigger" aria-expanded="false" aria-haspopup="true">
          Services
          <svg class="nav-chevron" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="6 9 12 15 18 9"/></svg>
        </button>
        <div class="nav-dropdown" role="menu">
          <a href="<?php echo esc_url( home_url( '/deployment/' ) ); ?>" class="nav-dropdown-item" role="menuitem">
            <div class="nav-dropdown-icon" style="background:rgba(30,58,138,.08);color:#1E3A8A">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>
            </div>
            <div>
              <div class="nav-dropdown-title">Deployment</div>
              <div class="nav-dropdown-desc">Build the right foundation from day one</div>
            </div>
          </a>
          <a href="<?php echo esc_url( home_url( '/ams-support/' ) ); ?>" class="nav-dropdown-item" role="menuitem">
            <div class="nav-dropdown-icon" style="background:rgba(59,158,219,.08);color:#3B9EDB">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
            </div>
            <div>
              <div class="nav-dropdown-title">AMS &amp; Support</div>
              <div class="nav-dropdown-desc">Your Workday, always working</div>
            </div>
          </a>
          <a href="<?php echo esc_url( home_url( '/maximise/' ) ); ?>" class="nav-dropdown-item" role="menuitem">
            <div class="nav-dropdown-icon" style="background:rgba(245,124,31,.08);color:#F57C1F">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="22 7 13.5 15.5 8.5 10.5 2 17"/><polyline points="16 7 22 7 22 13"/></svg>
            </div>
            <div>
              <div class="nav-dropdown-title">Maximise</div>
              <div class="nav-dropdown-desc">Turn your Workday from operational to exceptional</div>
            </div>
          </a>
          <a href="<?php echo esc_url( home_url( '/advisory/' ) ); ?>" class="nav-dropdown-item" role="menuitem">
            <div class="nav-dropdown-icon" style="background:rgba(232,71,44,.08);color:#E8472C">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 19V5"/><path d="M4 19h16"/><path d="M8 15l3-3 3 2 5-7"/></svg>
            </div>
            <div>
              <div class="nav-dropdown-title">Advisory</div>
              <div class="nav-dropdown-desc">Strategy before configuration</div>
            </div>
          </a>
          <a href="<?php echo esc_url( home_url( '/ai-enablement/' ) ); ?>" class="nav-dropdown-item" role="menuitem">
            <div class="nav-dropdown-icon" style="background:rgba(245,124,31,.08);color:#F57C1F">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 2v4"/><path d="M12 18v4"/><path d="M4.93 4.93l2.83 2.83"/><path d="M16.24 16.24l2.83 2.83"/><path d="M2 12h4"/><path d="M18 12h4"/><path d="M4.93 19.07l2.83-2.83"/><path d="M16.24 7.76l2.83-2.83"/><circle cx="12" cy="12" r="3"/></svg>
            </div>
            <div>
              <div class="nav-dropdown-title">AI Enablement</div>
              <div class="nav-dropdown-desc">Make Workday AI-ready</div>
            </div>
          </a>
          <div class="nav-dropdown-divider"></div>
          <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="nav-dropdown-item nav-dropdown-health-check" role="menuitem">
            <div class="nav-dropdown-icon" style="background:rgba(16,185,129,.08);color:#10b981">
              <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 6L9 17l-5-5"/></svg>
            </div>
            <div>
              <div class="nav-dropdown-title">Free Health Check</div>
              <div class="nav-dropdown-desc">60-min complimentary review</div>
            </div>
          </a>
        </div>
      </li>

      <li><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>">About</a></li>
      <li><a href="<?php echo esc_url( home_url( '/resources/' ) ); ?>">Resources</a></li>
      <li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Contact</a></li>
    </nav>

    <!-- Right cluster -->
    <div class="nav-right">
      <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn-nav btn-nav-health">
        Health Check <?php echo z_arrow( 13 ); ?>
      </a>
      <!-- Mobile burger -->
      <button class="nav-hamburger" id="nav-hamburger" aria-label="Open menu" aria-expanded="false" aria-controls="mobile-menu">
        <span></span><span></span><span></span>
      </button>
    </div>

  </div>

  <!-- Mobile menu drawer -->
  <div class="mobile-menu" id="mobile-menu" role="navigation" aria-label="Mobile navigation">
    <nav>
      <!-- Services group -->
      <div class="mobile-nav-group">
        <button class="mobile-nav-toggle" type="button" aria-expanded="false" aria-controls="mobile-services-menu">
          Services
          <svg class="mobile-nav-chevron" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="6 9 12 15 18 9"/></svg>
        </button>
        <div class="mobile-nav-submenu" id="mobile-services-menu">
          <a href="<?php echo esc_url( home_url( '/deployment/' ) ); ?>">Deployment</a>
          <a href="<?php echo esc_url( home_url( '/ams-support/' ) ); ?>">AMS &amp; Support</a>
          <a href="<?php echo esc_url( home_url( '/maximise/' ) ); ?>">Maximise</a>
          <a href="<?php echo esc_url( home_url( '/advisory/' ) ); ?>">Advisory</a>
          <a href="<?php echo esc_url( home_url( '/ai-enablement/' ) ); ?>">AI Enablement</a>
        </div>
      </div>
      <div class="mobile-nav-divider"></div>
      <a href="<?php echo esc_url( home_url( '/about/' ) ); ?>">About</a>
      <a href="<?php echo esc_url( home_url( '/resources/' ) ); ?>">Resources</a>
      <a href="<?php echo esc_url( home_url( '/careers/' ) ); ?>">Careers</a>
      <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Contact</a>
      <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn-mobile-cta">
        Health Check <?php echo z_arrow( 14 ); ?>
      </a>
    </nav>
  </div>
</header>

<!-- Mobile sticky bottom CTA -->
<a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="mobile-bottom-cta" aria-label="Book a consultation">
  Health Check <?php echo z_arrow( 13 ); ?>
</a>
