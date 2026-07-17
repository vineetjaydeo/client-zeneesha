<?php
/**
 * Shared Home V3 conversion section.
 *
 * Expected variables: $cta_eyebrow, $cta_heading, $cta_body, $cta_submit.
 * Optional variables: $cta_section_id, $cta_inner_id.
 */
$cta_section_id = $cta_section_id ?? 'page-contact-form';
$cta_inner_id   = $cta_inner_id ?? '';
?>
<section id="<?php echo esc_attr( $cta_section_id ); ?>" class="section-cta shared-form-cta">
  <div class="cta-inner"<?php echo $cta_inner_id ? ' id="' . esc_attr( $cta_inner_id ) . '"' : ''; ?>>
    <div class="shared-form-cta-copy">
      <div class="section-label reveal cta-label">
        <span class="section-label-line" style="background:var(--redorange)"></span>
        <?php echo esc_html( $cta_eyebrow ); ?>
      </div>
      <h2 class="cta-heading reveal delay-1"><?php echo esc_html( $cta_heading ); ?></h2>
      <p class="cta-body reveal delay-2"><?php echo esc_html( $cta_body ); ?></p>
    </div>

    <div class="reveal delay-3">
      <div class="cta-form-wrap">
        <form id="cta-contact-form" novalidate>
          <div class="form-row">
            <div>
              <label class="field-label" for="contact_name">Name <span>*</span></label>
              <input class="form-input" type="text" id="contact_name" name="contact_name" required autocomplete="name">
            </div>
            <div>
              <label class="field-label" for="contact_phone">Phone</label>
              <input class="form-input" type="tel" id="contact_phone" name="contact_phone" autocomplete="tel">
            </div>
          </div>
          <div class="form-group">
            <label class="field-label" for="contact_email">Email <span>*</span></label>
            <input class="form-input" type="email" id="contact_email" name="contact_email" required autocomplete="email">
          </div>
          <div class="form-group">
            <label class="field-label" for="contact_message">Message</label>
            <textarea class="form-textarea" id="contact_message" name="contact_message" rows="4"></textarea>
          </div>
          <div class="form-group">
            <button type="submit" class="form-submit"><?php echo esc_html( $cta_submit ); ?> <?php echo z_arrow( 14 ); ?></button>
          </div>
          <div id="form-message" class="form-msg" role="alert" aria-live="polite"></div>
        </form>
      </div>
    </div>
  </div>
</section>
