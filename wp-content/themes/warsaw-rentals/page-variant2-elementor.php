<?php
/**
 * Template Name: Вариант 2 — Elementor
 * Template Post Type: page
 */
// Проверяем — если страница редактируется Elementor, он сам рендерит контент
// Если нет — показываем инструкцию
get_header();

$is_built_with_elementor = get_post_meta(get_the_ID(), '_elementor_edit_mode', true) === 'builder';
?>

<main>
  <?php if ($is_built_with_elementor): ?>
    <?php
      // Elementor рендерит свой контент — просто выводим the_content()
      while (have_posts()) : the_post();
        the_content();
      endwhile;
    ?>
  <?php else: ?>
    <!-- Fallback: PHP-рендер пока Elementor не настроен -->
    <?php
      $page_id = get_the_ID();
      // Hero
    ?>
    <section class="hero-block">
      <div class="container">
        <div class="hero-content">
          <div class="hero-badge"><span class="badge badge-primary">📍 Варшава · Аренда квартир</span></div>
          <h1 class="hero-title">Найди идеальную квартиру <span>в Варшаве</span></h1>
          <p class="hero-subtitle">Проверенные квартиры в центре Варшавы. Без скрытых платежей, без агентских сборов. Въезд с первого дня.</p>
          <div class="hero-actions">
            <a href="#apartments" class="btn btn-white btn-lg">Смотреть квартиры</a>
            <a href="#contact" class="btn btn-ghost-white btn-lg">Узнать цены</a>
          </div>
          <div class="hero-stats">
            <div><div class="stat-number">200+</div><div class="stat-label">квартир</div></div>
            <div><div class="stat-number">5 лет</div><div class="stat-label">на рынке</div></div>
            <div><div class="stat-number">98%</div><div class="stat-label">довольных жильцов</div></div>
          </div>
        </div>
      </div>
    </section>

    <!-- Elementor Notice -->
    <section class="section-sm" style="background: #fffbeb; border-bottom: 1px solid #fde68a;">
      <div class="container" style="text-align:center">
        <p style="color:#92400e; font-size:0.9rem;">
          <strong>💡 Elementor режим:</strong> Нажмите «Редактировать страницу» → Elementor для управления контентом.
          Перетащите виджеты Warsaw Rentals из панели слева.
        </p>
      </div>
    </section>

    <?php get_template_part('template-parts/block', 'features'); ?>
    <?php get_template_part('template-parts/block', 'apartments'); ?>
    <?php get_template_part('template-parts/block', 'cta'); ?>
  <?php endif; ?>
</main>

<?php get_footer(); ?>
