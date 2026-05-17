<?php
/**
 * Plugin Name: Warsaw Rentals — Elementor Widgets
 * Description: Atomic widget library для Warsaw Rentals. Два уровня: Атомы (Badge, Heading, Button...) и Блоки (Hero, Features...).
 * Version: 3.0.0
 */
defined('ABSPATH') || exit;

/* ── Категории ─────────────────────────────────────────── */
add_action('elementor/elements/categories_registered', function($m) {
    // Атомарные виджеты — строительные блоки
    $m->add_category('warsaw-atoms', [
        'title' => '⚛ Warsaw — Atoms',
        'icon'  => 'fa fa-atom',
    ]);
    // Готовые секции — комбинации атомов
    $m->add_category('warsaw-rentals', [
        'title' => '🏠 Warsaw — Sections',
        'icon'  => 'fa fa-home',
    ]);
});

/* ── CSS темы в редакторе и превью ─────────────────────── */
add_action('elementor/editor/before_enqueue_styles', function() {
    wp_enqueue_style('warsaw-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('warsaw-fonts', 'https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600&family=Syne:wght@600;700;800&display=swap');
});
add_action('elementor/preview/enqueue_styles', function() {
    wp_enqueue_style('warsaw-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('warsaw-fonts', 'https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600&family=Syne:wght@600;700;800&display=swap');
});

/* ── Регистрация виджетов ───────────────────────────────── */
add_action('elementor/widgets/register', function($manager) {

    // ATOMS
    require_once __DIR__ . '/widgets/atoms/badge.php';
    require_once __DIR__ . '/widgets/atoms/heading.php';
    require_once __DIR__ . '/widgets/atoms/subheading.php';
    require_once __DIR__ . '/widgets/atoms/button.php';
    require_once __DIR__ . '/widgets/atoms/stats.php';
    require_once __DIR__ . '/widgets/atoms/section-bg.php';

    $manager->register(new \Warsaw_Atom_Badge());
    $manager->register(new \Warsaw_Atom_Heading());
    $manager->register(new \Warsaw_Atom_Subheading());
    $manager->register(new \Warsaw_Atom_Button());
    $manager->register(new \Warsaw_Atom_Stats());
    $manager->register(new \Warsaw_Atom_Section_BG());

    // SECTIONS (готовые блоки)
    require_once __DIR__ . '/widgets/hero.php';
    require_once __DIR__ . '/widgets/features.php';
    require_once __DIR__ . '/widgets/apartments.php';
    require_once __DIR__ . '/widgets/cta.php';

    $manager->register(new \Warsaw_Widget_Hero());
    $manager->register(new \Warsaw_Widget_Features());
    $manager->register(new \Warsaw_Widget_Apartments());
    $manager->register(new \Warsaw_Widget_CTA());
});
