<?php
require_once '/var/www/html/wp-load.php';

$menu_name = 'Футер: Товары';
$menu = wp_get_nav_menu_object($menu_name);

if (!$menu) {
    $menu_id = wp_create_nav_menu($menu_name);
    if (is_wp_error($menu_id)) {
        fwrite(STDERR, $menu_id->get_error_message() . PHP_EOL);
        exit(1);
    }
} else {
    $menu_id = (int) $menu->term_id;
    $items = wp_get_nav_menu_items($menu_id);
    if ($items) {
        foreach ($items as $item) {
            wp_delete_post($item->ID, true);
        }
    }
}

$category_slugs = [
    'russian-bath-stoves',
    'sauna-stoves',
    'hammam-stoves',
    'commercial-bath-stoves',
    'steam-generators',
    'bath-accessories',
];

foreach ($category_slugs as $slug) {
    $term = get_term_by('slug', $slug, 'product_cat');
    if (!$term || is_wp_error($term)) {
        continue;
    }

    wp_update_nav_menu_item($menu_id, 0, [
        'menu-item-title' => $term->name,
        'menu-item-object' => 'product_cat',
        'menu-item-object-id' => $term->term_id,
        'menu-item-type' => 'taxonomy',
        'menu-item-status' => 'publish',
    ]);
}

$nav_widgets = get_option('widget_nav_menu', []);
if (!is_array($nav_widgets)) {
    $nav_widgets = [];
}

$widget_id = 2;
while (isset($nav_widgets[$widget_id])) {
    $widget_id++;
}

$nav_widgets[$widget_id] = [
    'title' => 'Товары',
    'nav_menu' => $menu_id,
];
$nav_widgets['_multiwidget'] = 1;
update_option('widget_nav_menu', $nav_widgets);

$sidebars = get_option('sidebars_widgets', []);
if (is_array($sidebars)) {
    $footer = $sidebars['ohio-sidebar-footer-1'] ?? [];
    $footer = array_values(array_filter($footer, function($widget) {
        return $widget !== 'block-17';
    }));
    array_unshift($footer, 'nav_menu-' . $widget_id);
    $sidebars['ohio-sidebar-footer-1'] = array_values(array_unique($footer));
    update_option('sidebars_widgets', $sidebars);
}

wp_cache_flush();

echo 'Updated footer products menu #' . $menu_id . ' with widget nav_menu-' . $widget_id . PHP_EOL;

