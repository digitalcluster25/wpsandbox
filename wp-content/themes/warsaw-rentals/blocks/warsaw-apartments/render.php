<?php
$eyebrow    = $attributes['eyebrow']    ?? 'Наши предложения';
$title      = $attributes['title']      ?? 'Популярные квартиры';
$desc       = $attributes['desc']       ?? '';
$apartments = $attributes['apartments'] ?? [];
?>
<section class="apartments-block section wp-block-warsaw-rentals-apartments" id="apartments">
  <div class="container">
    <div class="section-header">
      <p class="section-eyebrow"><?php echo esc_html($eyebrow); ?></p>
      <h2 class="section-title"><?php echo esc_html($title); ?></h2>
      <p class="section-desc"><?php echo esc_html($desc); ?></p>
    </div>
    <div class="grid-3">
      <?php foreach ($apartments as $apt): ?>
        <div class="card apartment-card">
          <div class="apt-image">
            <div class="apt-img-placeholder"><?php echo esc_html($apt['emoji'] ?? '🏠'); ?></div>
            <span class="apt-price"><?php echo esc_html($apt['price'] ?? ''); ?></span>
          </div>
          <div class="card-content">
            <h3 class="apt-title"><?php echo esc_html($apt['title'] ?? ''); ?></h3>
            <p class="apt-location">📍 <?php echo esc_html($apt['location'] ?? ''); ?></p>
            <div class="apt-meta">
              <span>🛏 <?php echo esc_html($apt['rooms'] ?? ''); ?> комн.</span>
              <span>📐 <?php echo esc_html($apt['area'] ?? ''); ?></span>
              <span>🏢 <?php echo esc_html($apt['floor'] ?? ''); ?></span>
            </div>
          </div>
          <div class="card-footer">
            <a href="#contact" class="btn btn-primary" style="width:100%;justify-content:center">Узнать подробнее</a>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
