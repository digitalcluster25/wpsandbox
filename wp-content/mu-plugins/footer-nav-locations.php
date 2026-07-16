<?php
add_action('after_setup_theme', function() {
    register_nav_menus([
        'footer_products' => 'Footer: Products',
        'footer_company'  => 'Footer: Company',
        'footer_help'     => 'Footer: Help',
    ]);
}, 20);
