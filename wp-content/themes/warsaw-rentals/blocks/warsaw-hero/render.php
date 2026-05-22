<?php
$badge    = $attributes['badge']    ?? '📍 Варшава · Аренда квартир';
$title    = $attributes['title']    ?? 'Найди идеальную квартиру в Варшаве';
$subtitle = $attributes['subtitle'] ?? 'Проверенные квартиры в центре Варшавы.';
$cta      = $attributes['ctaText']  ?? 'Смотреть квартиры';
$cta2     = $attributes['cta2Text'] ?? 'Узнать цены';
$s1n      = $attributes['stat1N']   ?? '200+';
$s1l      = $attributes['stat1L']   ?? 'квартир';
$s2n      = $attributes['stat2N']   ?? '5 лет';
$s2l      = $attributes['stat2L']   ?? 'на рынке';
$s3n      = $attributes['stat3N']   ?? '98%';
$s3l      = $attributes['stat3L']   ?? 'довольных жильцов';
?>
<section class="hero-block wp-block-warsaw-rentals-hero">
  <div class="container">
    <div class="hero-content">
      <div class="hero-badge"><span class="badge badge-primary"><?php echo esc_html($badge); ?></span></div>
      <h1 class="hero-title"><?php echo wp_kses_post($title); ?></h1>
      <p class="hero-subtitle"><?php echo esc_html($subtitle); ?></p>
      <div class="hero-actions">
        <a href="#apartments" class="btn btn-white btn-lg"><?php echo esc_html($cta); ?></a>
        <a href="#contact"    class="btn btn-ghost-white btn-lg"><?php echo esc_html($cta2); ?></a>
      </div>
      <div class="hero-stats">
        <div><div class="stat-number"><?php echo esc_html($s1n); ?></div><div class="stat-label"><?php echo esc_html($s1l); ?></div></div>
        <div><div class="stat-number"><?php echo esc_html($s2n); ?></div><div class="stat-label"><?php echo esc_html($s2l); ?></div></div>
        <div><div class="stat-number"><?php echo esc_html($s3n); ?></div><div class="stat-label"><?php echo esc_html($s3l); ?></div></div>
      </div>
    </div>
  </div>
</section>
