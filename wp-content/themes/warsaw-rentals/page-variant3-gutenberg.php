<?php
/**
 * Template Name: Вариант 3 — Gutenberg
 * Template Post Type: page
 */
get_header(); ?>

<main>
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <?php if (has_blocks(get_the_content())) : ?>
      <!-- Gutenberg blocks рендерятся через the_content() -->
      <div class="gutenberg-content">
        <?php the_content(); ?>
      </div>
    <?php else : ?>
      <!-- Fallback — если блоки ещё не добавлены через редактор -->
      <?php get_template_part('template-parts/block', 'hero'); ?>
      <?php get_template_part('template-parts/block', 'features'); ?>
      <?php get_template_part('template-parts/block', 'apartments'); ?>
      <?php get_template_part('template-parts/block', 'cta'); ?>

      <section class="section-sm" style="background:#f3f0ff; border-top:1px solid #ddd6fe;">
        <div class="container" style="text-align:center">
          <p style="color:#5b21b6; font-size:0.9rem;">
            <strong>💡 Gutenberg режим:</strong> Нажмите «Редактировать страницу» и добавьте блоки 
            Warsaw Hero, Warsaw Features, Warsaw Apartments, Warsaw CTA из категории «Warsaw Rentals».
          </p>
        </div>
      </section>
    <?php endif; ?>

  <?php endwhile; endif; ?>
</main>

<?php get_footer(); ?>
