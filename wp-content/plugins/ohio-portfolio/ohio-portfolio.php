<?php
/*
	Plugin Name: Ohio Portfolio
	Plugin URI: https://clbthemes.com
	Description: Supercharge your WordPress site with extended portfolio features.
	Version: 1.1.3
	Author: Colabrio
	Author URI: https://clbthemes.com

	Copyright 2020 Colabrio (email: team@clbthemes.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301 USA
*/

add_action( 'plugins_loaded', 'ohio_portfolio_load_plugin_textdomain' );

function ohio_portfolio_load_plugin_textdomain() {
    load_plugin_textdomain( 'ohio-portfolio', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}

add_action( 'init', 'ohio_portfolio_register_my_cpts_portfolio' );

function ohio_portfolio_register_my_cpts_portfolio() {
    $labels = array(
        'name' => __( 'Portfolio', 'ohio-portfolio' ),
        'singular_name' => __( 'Project', 'ohio-portfolio' ),
        'menu_name' => __( 'Portfolio', 'ohio-portfolio' ),
        'all_items' => __( 'All Projects', 'ohio-portfolio' ),
        'add_new' => __( 'Add New', 'ohio-portfolio' ),
        'add_new_item' => __( 'Add New Portfolio Project', 'ohio-portfolio' ),
        'edit_item' => __( 'Edit Project', 'ohio-portfolio' ),
        'new_item' => __( 'New Portfolio Project', 'ohio-portfolio' ),
        'view_item' => __( 'View Project', 'ohio-portfolio' ),
        'search_items' => __( 'Search Projects', 'ohio-portfolio' ),
        'not_found' => __( 'No projects found', 'ohio-portfolio' ),
        'not_found_in_trash' => __( 'No projects found in Trash', 'ohio-portfolio' ),
        'parent_item_colon' => __( 'Parent Portfolio:', 'ohio-portfolio' ),
        'featured_image' => __( 'Featured image for this project', 'ohio-portfolio' ),
        'set_featured_image' => __( 'Set featured image for this project', 'ohio-portfolio' ),
        'remove_featured_image' => __( 'Remove featured image for this project', 'ohio-portfolio' ),
        'use_featured_image' => __( 'Use featured image for this project', 'ohio-portfolio' ),
        'archives' => __( 'Portfolio projects archive', 'ohio-portfolio' ),
        'insert_into_item' => __( 'Insert into project', 'ohio-portfolio' ),
        'uploaded_to_this_item' => __( 'Upload to this project', 'ohio-portfolio' ),
        'filter_items_list' => __( 'Filter projects', 'ohio-portfolio' ),
        'items_list_navigation' => __( 'Portfolio projects list navigation', 'ohio-portfolio' ),
        'items_list' => __( 'Portfolio projects list', 'ohio-portfolio' ),
        'parent_item_colon' => __( 'Parent Portfolio:', 'ohio-portfolio' ),
    );

    if ( class_exists( 'OhioOptions' ) ) {
        $slug = OhioOptions::get_global( 'portfolio_slug' );
    }

    if ( empty( $slug ) ) {
        $slug = 'project';
    }

    $args = array(
        'label' => __( 'Portfolio', 'ohio-portfolio' ),
        'labels' => $labels,
        'description' => __( 'Portfolio post type for ohio theme.', 'ohio-portfolio' ),
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_rest' => true,
        'rest_base' => '',
        'has_archive' => false,
        'show_in_menu' => true,
        'exclude_from_search' => false,
        'capability_type' => 'post',
        'map_meta_cap' => true,
        'hierarchical' => false,
        'rewrite' => array( 'slug' => $slug, 'with_front' => true ),
        'query_var' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-portfolio',
        'supports' => array( 'title', 'comments', 'editor', 'thumbnail', 'revisions' ),
    );
    register_post_type( 'ohio_portfolio', $args );
}

function ohio_portfolio_category_init() {
    $labels = array(
        'name' => _x( 'Portfolio categories', 'taxonomy general name', 'ohio-portfolio' ),
        'singular_name' => _x( 'Portfolio category', 'taxonomy singular name', 'ohio-portfolio' ),
        'search_items' => __( 'Search Categories', 'ohio-portfolio' ),
        'popular_items' => __( 'Popular Categories', 'ohio-portfolio' ),
        'all_items' => __( 'Categories', 'ohio-portfolio' ),
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __( 'Edit Category', 'ohio-portfolio' ),
        'update_item' => __( 'Update Category', 'ohio-portfolio' ),
        'add_new_item' => __( 'Add New Category', 'ohio-portfolio' ),
        'new_item_name' => __( 'New Portfolio Category', 'ohio-portfolio' ),
        'separate_items_with_commas' => __( 'Separate categories with commas', 'ohio-portfolio' ),
        'add_or_remove_items' => __( 'Add or remove categories', 'ohio-portfolio' ),
        'choose_from_most_used' => __( 'Choose from the most used categories', 'ohio-portfolio' ),
        'not_found' => __( 'No categories found.', 'ohio-portfolio' ),
        'menu_name' => __( 'Categories', 'ohio-portfolio' ),
    );

    $args = array(
        'hierarchical' => false,
        'labels' => $labels,
        'show_ui' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var' => true,
        'rewrite' => array( 'slug' => 'portfolio-category' ),
    );

    register_taxonomy( 'ohio_portfolio_category', array( 'ohio_portfolio' ), $args );

    $labels = array(
        'name' => _x( 'Portfolio tags', 'taxonomy general name', 'ohio-portfolio' ),
        'singular_name' => _x( 'Portfolio tag', 'taxonomy singular name', 'ohio-portfolio' ),
        'search_items' => __( 'Search Tags', 'ohio-portfolio' ),
        'popular_items' => __( 'Popular Tags', 'ohio-portfolio' ),
        'all_items' => __( 'Tags', 'ohio-portfolio' ),
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __( 'Edit Tag', 'ohio-portfolio' ),
        'update_item' => __( 'Update Tag', 'ohio-portfolio' ),
        'add_new_item' => __( 'Add New Tag', 'ohio-portfolio' ),
        'new_item_name' => __( 'New Portfolio Tag', 'ohio-portfolio' ),
        'separate_items_with_commas' => __( 'Separate tags with commas', 'ohio-portfolio' ),
        'add_or_remove_items' => __( 'Add or remove tags', 'ohio-portfolio' ),
        'choose_from_most_used' => __( 'Choose from the most used tags', 'ohio-portfolio' ),
        'not_found' => __( 'No tags found.', 'ohio-portfolio' ),
        'menu_name' => __( 'Tags', 'ohio-portfolio' ),
    );
    $args = array(
        'hierarchical' => false,
        'labels' => $labels,
        'show_ui' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var' => true,
        'rewrite' => array( 'slug' => 'portfolio-tag' ),
    );

    register_taxonomy( 'ohio_portfolio_tags', array( 'ohio_portfolio' ), $args );
}

add_action( 'init', 'ohio_portfolio_category_init' );

function ohio_portfolio_flush() {
    flush_rewrite_rules(); // Fix 404 page on projects. Flush rules
}

register_activation_hook( __FILE__, 'ohio_portfolio_flush' );

?>
