<?php
$title   = $attributes['title']    ?? 'Готов к переезду в Варшаву?';
$desc    = $attributes['desc']     ?? '';
$btn     = $attributes['btnText']  ?? 'Оставить заявку';
$btn2    = $attributes['btn2Text'] ?? 'Позвонить нам';
?>
<section class="cta-block section wp-block-warsaw-rentals-cta" id="contact">
  <div class="container">
    <div class="section-header">
      <h2 class="section-title"><?php echo esc_html($title); ?></h2>
      <p class="section-desc"><?php echo esc_html($desc); ?></p>
    </div>
    <div class="cta-actions">
      <a href="mailto:info@warsawrent.pl" class="btn btn-white btn-lg"><?php echo esc_html($btn); ?></a>
      <a href="tel:+48222345678"          class="btn btn-ghost-white btn-lg"><?php echo esc_html($btn2); ?></a>
    </div>
  </div>
</section>
