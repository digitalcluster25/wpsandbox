<?php

add_action('acf/init', 'load_exported_fields');

add_filter('acf/settings/show_updates', '__return_false', 100);

function load_exported_fields(){
	require 'acf-php/bootstrap.php';
}

function ohio_acf_add_option_pages() {
	if ( function_exists( 'acf_add_options_page' ) && function_exists( 'acf_add_options_sub_page' ) ) {

		acf_add_options_sub_page(array(
			'page_title' => esc_html__( 'General', 'ohio' ),
			'menu_title' => esc_html__( 'General', 'ohio' ),
			'menu_slug' => 'theme-general',
			'parent_slug' => '_ohio_fake'
		));

		acf_add_options_sub_page(array(
			'page_title' => esc_html__( 'Appearance', 'ohio' ),
			'menu_title' => esc_html__( 'Appearance', 'ohio' ),
			'menu_slug' => 'theme-appearance',
			'parent_slug' => '_ohio_fake'
		));

		acf_add_options_sub_page(array(
			'page_title' => esc_html__( 'Typography', 'ohio' ),
			'menu_title' => esc_html__( 'Typography', 'ohio' ),
			'menu_slug' => 'theme-general-typography',
			'parent_slug' => '_ohio_fake'
		));

		acf_add_options_sub_page(array(
			'page_title' => esc_html__( 'Menu', 'ohio' ),
			'menu_title' => esc_html__( 'Menu', 'ohio' ),
			'menu_slug' => 'theme-general-menu',
			'parent_slug' => '_ohio_fake'
		));

		acf_add_options_sub_page(array(
			'page_title' => esc_html__( 'Header', 'ohio' ),
			'menu_title' => esc_html__( 'Header', 'ohio' ),
			'menu_slug' => 'theme-general-header',
			'parent_slug' => '_ohio_fake'
		));

		acf_add_options_sub_page(array(
			'page_title' => esc_html__( 'Pages', 'ohio' ),
			'menu_title' => esc_html__( 'Pages', 'ohio' ),
			'menu_slug' => 'theme-general-pages',
			'parent_slug' => '_ohio_fake'
		));

		acf_add_options_sub_page(array(
			'page_title' => esc_html__( 'Footer', 'ohio' ),
			'menu_title' => esc_html__( 'Footer', 'ohio' ),
			'menu_slug' => 'theme-general-footer',
			'parent_slug' => '_ohio_fake'
		));

		acf_add_options_sub_page(array(
			'page_title' => esc_html__( 'Blog', 'ohio' ),
			'menu_title' => esc_html__( 'Blog', 'ohio' ),
			'menu_slug' => 'theme-general-blog',
			'parent_slug' => '_ohio_fake'
		));

		acf_add_options_sub_page(array(
			'page_title' => esc_html__( 'Single Post', 'ohio' ),
			'menu_title' => esc_html__( 'Single Post', 'ohio' ),
			'menu_slug' => 'theme-general-post',
			'parent_slug' => '_ohio_fake'
		));

		acf_add_options_sub_page(array(
			'page_title' => esc_html__( 'Portfolio', 'ohio' ),
			'menu_title' => esc_html__( 'Portfolio', 'ohio' ),
			'menu_slug' => 'theme-general-portfolio',
			'parent_slug' => '_ohio_fake'
		));

		acf_add_options_sub_page(array(
			'page_title' => esc_html__( 'Single Project', 'ohio' ),
			'menu_title' => esc_html__( 'Single Project', 'ohio' ),
			'menu_slug' => 'theme-general-project',
			'parent_slug' => '_ohio_fake'
		));

		acf_add_options_sub_page(array(
			'page_title' => esc_html__( 'Shop', 'ohio' ),
			'menu_title' => esc_html__( 'Shop', 'ohio' ),
			'menu_slug' => 'theme-general-woocommerce',
			'parent_slug' => '_ohio_fake'
		));

		acf_add_options_sub_page(array(
			'page_title' => esc_html__( 'Single Product', 'ohio' ),
			'menu_title' => esc_html__( 'Single Product', 'ohio' ),
			'menu_slug' => 'theme-general-product',
			'parent_slug' => '_ohio_fake'
		));

		acf_add_options_sub_page(array(
			'page_title' => esc_html__( 'Custom CSS & JS', 'ohio' ),
			'menu_title' => esc_html__( 'Custom CSS & JS', 'ohio' ),
			'menu_slug' => 'theme-general-custom',
			'parent_slug' => '_ohio_fake'
		));

		acf_add_options_sub_page(array(
			'page_title' => esc_html__( 'Maintenance', 'ohio' ),
			'menu_title' => esc_html__( 'Maintenance', 'ohio' ),
			'menu_slug' => 'theme-general-maintenance',
			'parent_slug' => '_ohio_fake'
		));

		acf_add_options_sub_page(array(
			'page_title' => esc_html__( 'Performance', 'ohio' ),
			'menu_title' => esc_html__( 'Performance', 'ohio' ),
			'menu_slug' => 'theme-general-performance',
			'parent_slug' => '_ohio_fake'
		));

		acf_add_options_sub_page(array(
			'page_title' => esc_html__( 'Other', 'ohio' ),
			'menu_title' => esc_html__( 'Other', 'ohio' ),
			'menu_slug' => 'theme-general-other',
			'parent_slug' => '_ohio_fake'
		));

		acf_add_options_sub_page(array(
			'page_title' => esc_html__( 'Backup', 'ohio' ),
			'menu_title' => esc_html__( 'Backup', 'ohio' ),
			'menu_slug' => 'theme-general-backup',
			'parent_slug' => '_ohio_fake'
		));
	}
}
add_action( 'acf/init', 'ohio_acf_add_option_pages' );

// Hide "inherit" option for global background types

add_filter('acf/load_field/name=background_type', function( $field ) {
	if ( function_exists( 'get_current_screen' ) ) {
		$screen = get_current_screen();
		if ( isset( $screen->base ) ) {
			if ( in_array( $screen->base, [
				'theme-settings_page_theme-general-pages',
				'theme-settings_page_theme-general-header',
				'theme-settings_page_theme-general-footer'
			] ) ) {
				unset($field['choices']['inherit']);
			}
		}
	}

	// Fallback for new code

	if ( !empty( $_GET['options_page'] ) ) {
		if ( in_array( $_GET['options_page'], [
			'theme-general-pages',
			'theme-general-header',
			'theme-general-footer',
			'theme-general-menu',
			'theme-general-maintenance'
		] ) ) {
			unset($field['choices']['inherit']);
		}
	}

	return $field;
});

// Hide options from Page Settings if not Post Page

add_filter('acf/get_fields', function( $fields, $parent ) {
	if ( ! function_exists( 'get_current_screen' ) ) {
		return $fields;
	}

	$screen = get_current_screen();
	if ( isset( $screen->base ) ) {
		if ( $screen->post_type == 'post' ) {
			return $fields;
		}

		foreach ( $fields as $key => $field ) {
			if ( $field['name'] == 'page_post_style_in_grid' ) unset( $fields[$key] );
			if ( $field['name'] == 'post_layout_type' ) unset( $fields[$key] );

			if ( $screen->base != 'theme-settings_page_theme-general-post' ) {
				if ( $field['name'] == 'header_title_subtitle_type' ) unset( $fields[$key] );
				if ( $field['name'] == 'header_title_author_visibility' ) unset( $fields[$key] );
				if ( $field['name'] == 'header_title_date_visibility' ) unset( $fields[$key] );
				if ( $field['name'] == 'header_title_comments_visibility' ) unset( $fields[$key] );
			}
		}
	}

	return $fields;
}, 20, 2);

// Header title additional "Featured image" option

add_filter('acf/prepare_field/name=page_header_title', function( $field ) {
	$field['sub_fields'][0]['choices']['featured'] = 'Featured Image';
	return $field;
});

// Global post header title additional "Featured image" option

add_filter('acf/prepare_field/name=global_post_page_header_title', function( $field ) {
	$field['sub_fields'][0]['choices']['featured'] = 'Featured Image';
	return $field;
});

// Inherited slug field apply

add_filter('acf/prepare_field/type=clone', function( $field ) {
	$background_group_key = 'group_982e082a3bcfcf81b766eaa1ec2df4f11e0f5cd3';
	if ( $field['clone'] && $field['clone'][0] == $background_group_key ) {

		if ( isset( $field['inherited_slug'] ) && isset( $field['sub_fields'][0]['choices']['inherit'] ) ) {
			$field['sub_fields'][0]['choices']['inherit'] = $field['inherited_slug'];
		}
	}

	return $field;
});

// ACF fallbacks

if ( ! is_admin() ) {

	if ( ! function_exists( 'have_rows' ) ) {
		function have_rows() { return false; }
	}

	if ( ! function_exists( 'the_row' ) ) {
		function the_row() { return false; }
	}
}

// Refresh permalinks after options update

function ohio_acf_update_project_slug_value( $value, $post_id, $field ) {
	$value = OhioHelper::slug_from_string( $value );
	if ( empty( $value ) ) {
		$value = 'project';
	}

	delete_option( 'rewrite_rules' );

	return $value;
}

add_filter('acf/update_value/key=field_59fb4ad44a1dtd336sl', 'ohio_acf_update_project_slug_value', 10, 3);

// Update with short param ids

add_filter( 'option__options_global_header_menu_social_links', function( $value ) {
	return 'field_snlid';
});

// Override ACF escaping

add_filter( 'acf/get_field_label', function( $label, $field, $context ) {
    if ( isset( $field['label'] ) ) {
        $label = wp_kses( $field['label'], array( 'h4' => array() ) );
    }
    return $label;
}, 10, 3 );
