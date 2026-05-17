<?php
$eyebrow = $attributes['eyebrow'] ?? 'Почему мы';
$title   = $attributes['title']   ?? 'Аренда без стресса';
$desc    = $attributes['desc']    ?? 'Мы берём на себя всё — от поиска до заключения договора.';
$items   = $attributes['items']   ?? [];
?>
<section class="features-block section wp-block-warsaw-rentals-features" id="features">
  <div class="container">
    <div class="section-header">
      <p class="section-eyebrow"><?php echo esc_html($eyebrow); ?></p>
      <h2 class="section-title"><?php echo esc_html($title); ?></h2>
      <p class="section-desc"><?php echo esc_html($desc); ?></p>
    </div>
    <div class="grid-4">
      <?php foreach ($items as $item): ?>
        <div class="card feature-card">
          <div class="card-content">
            <div class="feature-icon"><?php echo esc_html($item['icon'] ?? '✨'); ?></div>
            <h3><?php echo esc_html($item['title'] ?? ''); ?></h3>
            <p><?php echo esc_html($item['desc'] ?? ''); ?></p>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
