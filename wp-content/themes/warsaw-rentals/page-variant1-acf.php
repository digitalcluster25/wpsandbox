<?php
/**
 * Template Name: Вариант 1 — ACF + React
 * Template Post Type: page
 */
get_header(); ?>

<!-- Контент рендерится React-приложением через WP REST API -->
<main id="react-landing-root">
  <div class="react-loading">
    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="animation: spin 1s linear infinite">
      <path d="M21 12a9 9 0 11-6.219-8.56"/>
    </svg>
    Загрузка контента из WordPress API...
  </div>
</main>

<style>
@keyframes spin { to { transform: rotate(360deg); } }
</style>

<?php get_footer(); ?>
