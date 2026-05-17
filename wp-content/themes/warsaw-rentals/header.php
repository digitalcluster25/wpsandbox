<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Variant banner if on demo pages -->
<?php
$tpl = get_page_template_slug();
if ($tpl === 'page-variant1-acf.php') echo '<div class="variant-banner v1">🟢 Вариант 1 — React + REST API + ACF поля</div>';
if ($tpl === 'page-variant2-elementor.php') echo '<div class="variant-banner v2">🟡 Вариант 2 — Шаблон + Elementor для контента</div>';
if ($tpl === 'page-variant3-gutenberg.php') echo '<div class="variant-banner v3">🟣 Вариант 3 — Шаблон + Gutenberg блоки</div>';
?>

<header class="site-header">
  <div class="container">
    <div class="header-inner">
      <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo">
        Warsaw<span>Rent</span>
      </a>

      <button class="menu-toggle" id="menu-toggle" aria-label="Открыть меню">
        <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
          <line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="18" x2="21" y2="18"/>
        </svg>
      </button>

      <nav class="main-nav" id="main-nav">
        <?php wp_nav_menu([
          'theme_location' => 'primary',
          'container'      => false,
          'menu_class'     => '',
          'fallback_cb'    => function() {
              echo '<ul>
                <li><a href="' . home_url('/') . '">Главная</a></li>
                <li><a href="' . home_url('/variant-1-acf/') . '">Вариант 1 — ACF</a></li>
                <li><a href="' . home_url('/variant-2-elementor/') . '">Вариант 2 — Elementor</a></li>
                <li><a href="' . home_url('/variant-3-gutenberg/') . '">Вариант 3 — Gutenberg</a></li>
              </ul>';
          },
        ]); ?>
      </nav>

      <a href="#contact" class="btn btn-primary header-cta">Снять квартиру</a>
    </div>
  </div>
</header>
