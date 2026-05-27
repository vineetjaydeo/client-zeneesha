<!-- ── Footer ── -->
<footer class="site-footer" role="contentinfo">
  <div class="footer-inner">

    <!-- Brand column -->
    <div class="footer-brand">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="Zeneesha home">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/zeneesha-logo-light.png" alt="Zeneesha" height="44" style="height:44px;width:auto">
      </a>
      <p>An independent Workday practice focused entirely on post-go-live value.</p>
      <div class="footer-contact-details">
        <div>Zeneesha Ltd.</div>
        <div>14 Finsbury Circus, London EC2M 7EB</div>
        <div style="margin-top:.75rem"><span class="contact-type">T</span> &nbsp;<a href="tel:+442080904040" style="color:inherit">+44 (0) 20 8090 4040</a></div>
        <div><span class="contact-type">E</span> &nbsp;<a href="mailto:hello@zeneesha.co.uk" style="color:inherit">hello@zeneesha.co.uk</a></div>
      </div>
      <div class="footer-social">
        <a href="https://www.linkedin.com/company/zeneesha/" target="_blank" rel="noopener" aria-label="Zeneesha on LinkedIn">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"/><circle cx="4" cy="4" r="2"/></svg>
        </a>
        <a href="#" aria-label="Zeneesha on X / Twitter">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.744l7.73-8.835L1.254 2.25H8.08l4.259 5.63zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
        </a>
      </div>
    </div>

    <!-- Company column -->
    <div class="footer-col">
      <div class="footer-col-title">Company</div>
      <ul>
        <li><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>">About</a></li>
        <li><a href="<?php echo esc_url( home_url( '/about/#directors' ) ); ?>">Leadership</a></li>
        <li><a href="<?php echo esc_url( home_url( '/careers/' ) ); ?>">Careers</a></li>
        <li><a href="<?php echo esc_url( home_url( '/partnership/' ) ); ?>">Partner with Us</a></li>
      </ul>
    </div>

    <!-- Services column -->
    <div class="footer-col">
      <div class="footer-col-title">Services</div>
      <ul>
        <li><a href="<?php echo esc_url( home_url( '/implementation/' ) ); ?>">Implementation</a></li>
        <li><a href="<?php echo esc_url( home_url( '/ams-support/' ) ); ?>">AMS &amp; Support</a></li>
        <li><a href="<?php echo esc_url( home_url( '/maximise/' ) ); ?>">Maximise</a></li>
        <li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Free Health Check</a></li>
      </ul>
    </div>

    <!-- Topics / Insights column -->
    <div class="footer-col">
      <div class="footer-col-title">Topics</div>
      <ul>
        <li><a href="<?php echo esc_url( home_url( '/workday-hcm-uk/' ) ); ?>">Workday HCM UK</a></li>
        <li><a href="<?php echo esc_url( home_url( '/workday-ams/' ) ); ?>">Workday AMS</a></li>
        <li><a href="<?php echo esc_url( home_url( '/workday-data-migration/' ) ); ?>">Data Migration</a></li>
        <li><a href="<?php echo esc_url( home_url( '/workday-mid-market/' ) ); ?>">Workday Mid-Market</a></li>
        <li><a href="<?php echo esc_url( home_url( '/workday-finance-training/' ) ); ?>">Finance Training</a></li>
        <li><a href="<?php echo esc_url( home_url( '/workday-ai/' ) ); ?>">Workday AI</a></li>
        <li><a href="<?php echo esc_url( home_url( '/resources/' ) ); ?>">All Resources</a></li>
      </ul>
    </div>

    <!-- Contact column -->
    <div class="footer-col">
      <div class="footer-col-title">Contact</div>
      <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" style="display:inline-flex;align-items:center;gap:8px;font-size:18px;font-weight:300;color:rgba(255,255,255,.85)">
        Book a Consultation <?php echo z_arrow( 12 ); ?>
      </a>
      <div class="footer-hours">
        Office hours.<br>Mon to Fri, 09:00 to 17:00 GMT.
      </div>
      <div style="margin-top:1.25rem">
        <div class="footer-cert-badge">Workday Sales &amp; Services Partner</div>
        <div class="footer-cert-badge" style="margin-top:.5rem">Cyber Essentials Certified</div>
      </div>
    </div>

  </div>

  <div class="footer-bottom">
    <div class="footer-bottom-inner">
      <div>&copy; <?php echo esc_html( date( 'Y' ) ); ?> Zeneesha Ltd. Registered in England &amp; Wales, No. 14872091. VAT GB 412 8837 54.</div>
      <div class="footer-legal-links">
        <a href="#">Privacy Policy</a>
        <a href="#">Terms of Use</a>
        <a href="#">Cookie Policy</a>
      </div>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
