<?php
/*
    Page

    Table of contents: (use search)

    # General
        ## 1. Wrap Container Width
        ## 2. Upper Gap
        ## 3. Lower Gap
        ## 4. Side Gaps
        ## 5. Boxed Layout Indent
        ## 6. Background

    # Page Headline
    	## 7. Height
    	## 8. Background
    	## 9. Overlay
    	## 10. Heading Typography
    	## 11. Subtitle Typography
	
	# Back Button
    	## 12. Caption Typography
	
	# Sidebar
    	## 13. Sidebar Gaps
    	## 14. Sidebar Width
    	## 15. Sidebar Background
    	## 16. Widget Titles Typography
        ## 17. Widget Content Typography
	
	# Breadcrumbs
    	## 18. Slugs Typography
*/


# General

## 1. Wrap Container Width
$_wrap_container_select_type = OhioOptions::get_select_type( 'page_add_wrapper' ); // Global Inheritance. Define local styles
$wrap_container_width = OhioOptions::get_by_type( 'page_content_wrapper_width', $_wrap_container_select_type );
$wrap_container = OhioOptions::get( 'page_add_wrapper', true );

// Convert "%" to "vw" for proper calculation
if ( $wrap_container_width && str_contains( $wrap_container_width, '%' ) ) {
	$wrap_container_width = str_replace( '%', 'vw', $wrap_container_width );
}

if ( $wrap_container && $wrap_container_width ) {
	$_selector = [
		':root'
	];
    $_css = '--clb-container-width:' . $wrap_container_width . ';';
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 2. Upper Gap
$_gap_select_type = OhioOptions::get_select_type( 'page_add_top_padding' ); // Global Inheritance. Define local styles
$upper_gap = OhioOptions::get_by_type( 'page_top_padding_spacing', $_gap_select_type );
if ( $upper_gap ) {
	$_selector = '.page-container.top-offset';
    $_css = 'padding-top:' . $upper_gap . ';';
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 3. Lower Gap
$lower_gap = OhioOptions::get_by_type( 'page_bottom_padding_spacing', $_gap_select_type );
if ( $lower_gap ) {
	$_selector = '.page-container.bottom-offset';
    $_css = 'padding-bottom:' . $lower_gap . ';';
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 4. Side Gaps
$side_gaps = OhioOptions::get( 'page_full_width_margins_size', null, false, true );

// Convert "%" to "vw" for proper calculation
if ( $side_gaps && str_contains( $side_gaps, '%' ) ) {
	$side_gaps = str_replace( '%', 'vw', $side_gaps );
}

if ( ! $wrap_container && $side_gaps ) {
	$_selector = [
		'.page-container.-full-w',
		'.project.-layout10.-full-w'
	];
    $_css = '--clb-container-side-gutter:' . $side_gaps . ';';
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css, 'desktop' );
}

## 5. Boxed Layout Indent
$boxed_layout = OhioOptions::get( 'page_use_boxed_wrapper', false );
$_boxed_layout_select_type = OhioOptions::get_select_type( 'page_use_boxed_wrapper' ); // Global Inheritance. Define local styles
$boxed_layout_indent = OhioOptions::get_by_type( 'page_boxed_wrapper_margins_size', $_boxed_layout_select_type );
if ( $boxed_layout && $boxed_layout_indent ) {
	$_selector = [
		':root'
	];
    $_css = '--clb-container-side-spacer:' . $boxed_layout_indent . ';';
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css, 'desktop' );
}

## 6. Background
$background_type = OhioOptions::get( 'page_background_type' );
$background_select_type = OhioOptions::get_last_select_type();
$background_color = OhioOptions::get_by_type( 'page_background_color', $background_select_type );
$background_image = OhioHelper::get_background_image_css_by_type( 'page', $background_select_type );
if ( $background_color || $background_image ) {
    $_selector = [
        '.site-content',
        '.page-headline:before'
    ];
    $_css = '';
    $_css .= 'background-color:' . $background_color . ';';

    if ( $background_type == 'image' ) {
        $_css .= $background_image;
    }
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}


# Page Headline

## 7. Height
$page_headline_height = OhioOptions::get( 'page_header_title_height', null, false, true );
$page_headline_fullscreen = OhioOptions::get( 'page_header_title_fullscreen', false );
if ( $page_headline_height && ! $page_headline_fullscreen ) {
	$_selector = [
        '.page-headline'
    ];
    $_css = 'min-height:${height}px;';
	$_css = OhioHelper::parse_responsive_height_to_css( $page_headline_height, $_css );
	if ( $_css['desktop'] ) {
		$_style_block = implode( ',', $_selector ) . '{' . $_css['desktop'] . '}';
		OhioBuffer::append_to_dynamic_css_buffer( $_style_block, 'desktop' );
	}
	if ( $_css['tablet'] ) {
		$_style_block = implode( ',', $_selector ) . '{' . $_css['tablet'] . '}';
		OhioBuffer::append_to_dynamic_css_buffer( $_style_block, 'tablet' );
	}
	if ( $_css['mobile'] ) {
		$_style_block = implode( ',', $_selector ) . '{' . $_css['mobile'] . '}';
		OhioBuffer::append_to_dynamic_css_buffer( $_style_block, 'mobile' );
	}
}

## 8. Background
$background_type = OhioOptions::get( 'page_header_title_background_type' );
$background_select_type = OhioOptions::get_last_select_type();
$background_color = OhioOptions::get_by_type( 'page_header_title_background_color', $background_select_type );

if ( $background_type == 'featured' ) {
	$background_image = wp_get_attachment_image_url( get_post_thumbnail_id(), 'full' );
	
	if ( ! $background_image ) { // get the background image if the featured image is missing
		$background_image = OhioOptions::get_by_type( 'page_header_title_background_image', $background_select_type );
	}

} elseif ( $background_type == 'image' ) {
	$background_image = OhioHelper::get_background_image_css_by_type( 'page_header_title', $background_select_type );
}

if ( $background_color || $background_image ) {
	$_selector = '.page-headline .bg-image';
	$_css = '';
	$_css .= 'background-color:' . $background_color . ';';

	if ( $background_type == 'featured' ) {
		$_css .= 'background-image:url(\'' . esc_url( $background_image ) . '\');';
		// Image size, position, repeat
		$_css .= OhioHelper::get_background_image_css_by_type( 'page_header_title', $background_select_type, true );

	} elseif ( $background_type == 'image' ) {
		$_css .= $background_image;
	}
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 9. Overlay
$page_headline_overlay = OhioOptions::get( 'page_header_title_use_overlay' );

// Get the color value from global Theme Settings if the overlay is inherited
$page_headline_overlay_type = OhioOptions::get_last_select_type();

if ( $page_headline_overlay ) {
	$page_headline_overlay_color = OhioOptions::get_by_type( 'page_header_title_overlay_color', $page_headline_overlay_type );

	if ( substr( trim( $page_headline_overlay ), 0, 4 ) != 'rgba' ) {
		$page_headline_overlay = OhioHelper::hex_to_rgba( $page_headline_overlay_color, .5 );
	}
    $_selector = '.page-headline::after';
    $_css = 'background-color:' . $page_headline_overlay_color . ';';
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

// Global Inheritance. Define custom local styles
OhioOptions::get( 'page_typography_settings' ); // trigger select chain
$typography_settings_select_type = OhioOptions::get_last_select_type();

## 10. Heading Typography
$page_headline_title_typo = json_decode( OhioOptions::get_by_type( 'page_header_title_typo', $typography_settings_select_type, '' ) );
if ( $page_headline_title_typo ) {
    $_selector = '.page-headline .title';
    $_css = OhioHelper::parse_acf_typo_to_css( $page_headline_title_typo );
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 11. Subtitle Typography
$page_headline_subtitle_typo = json_decode( OhioOptions::get_by_type( 'page_header_subtitle_typo', $typography_settings_select_type, '' ) );
if ( $page_headline_subtitle_typo ) {
	$_selector = [
		'.page-headline .post-meta-holder',
		'.page-headline .headline-meta'
	];
    $_css = OhioHelper::parse_acf_typo_to_css( $page_headline_subtitle_typo );
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}


# Back Button

## 12. Caption Typography
$back_button_caption_typo = json_decode( OhioOptions::get_by_type( 'page_header_previous_button_typo', $typography_settings_select_type, '' ) );
if ( $back_button_caption_typo ) {
	$_selector = '.back-link:not(.light-typo):not(.dark-typo)';
    $_css = OhioHelper::parse_acf_typo_to_css( $back_button_caption_typo );
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}


# Sidebar

## 13. Sidebar Gaps
$sidebar_gaps = OhioOptions::get( 'page_sidebar_gaps', null, false, true );
if ( $sidebar_gaps ) {
    OhioBuffer::append_to_variables_css_buffer( '--clb-spacer-sidebar', $sidebar_gaps );
}

## 14. Sidebar Width
$sidebar_width = OhioOptions::get_global( 'page_sidebar_width' );
if ( $sidebar_width ) {
	$_selector = [
        ':root'
    ];
    $_css = '--clb-sidebar-width:${height}px;';
	$_css = OhioHelper::parse_responsive_height_to_css( $sidebar_width, $_css );
	if ( $_css['desktop'] ) {
		$_style_block = implode( ',', $_selector ) . '{' . $_css['desktop'] . '}';
		OhioBuffer::append_to_dynamic_css_buffer( $_style_block, 'desktop' );
	}
	if ( $_css['tablet'] ) {
		$_style_block = implode( ',', $_selector ) . '{' . $_css['tablet'] . '}';
		OhioBuffer::append_to_dynamic_css_buffer( $_style_block, 'tablet' );
	}
	if ( $_css['mobile'] ) {
		$_style_block = implode( ',', $_selector ) . '{' . $_css['mobile'] . '}';
		OhioBuffer::append_to_dynamic_css_buffer( $_style_block, 'mobile' );
	}
}

## 15. Sidebar Background
$background_type = OhioOptions::get( 'page_sidebar_background_type' );
$background_select_type = OhioOptions::get_last_select_type();
$background_color = OhioOptions::get_by_type( 'page_sidebar_background_color', $background_select_type );
$background_image = OhioHelper::get_background_image_css_by_type( 'page_sidebar', $background_select_type );
if ( $background_color || $background_image ) {
    $_selector = '.page-sidebar.-boxed';
    $_css = '';
    $_css .= 'background-color:' . $background_color . ';';

    if ( $background_type == 'image' ) {
        $_css .= $background_image;
    }
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 16. Widget Titles Typography
$widgets_title_typo = OhioOptions::get_global( 'widgets_heading_typo' );
if ( $widgets_title_typo ) {
	$_selector = [
		'.widget-title',
		'.widget h2',
		'.widget .wp-block-search__label',
		'.widget .wc-block-product-search__label'
	];
	$_css = OhioHelper::parse_acf_typo_to_css( $widgets_title_typo );
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 17. Widget Content Typography
$widgets_content_typo = OhioOptions::get_global( 'widgets_content_typo' );
if ( $widgets_content_typo ) {
	$_selector = [
		'.widget',
		'.widget a',
		'.widget input',
		'.widget select',
		'.widget_recent_entries ul a',
		'.widget_recent_comments ul span',
		'.widget_recent_comments ul a'
	];
	$_css = OhioHelper::parse_acf_typo_to_css( $widgets_content_typo );
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}


# Breadcrumbs

## 18. Slugs Typography
$_slugs_typo_select_type = OhioOptions::get_select_type( 'page_breadcrumbs_visibility' ); // Global Inheritance. Define local styles
$slugs_typo = OhioOptions::get_by_type( 'page_breadcrumbs_text_typo', $_slugs_typo_select_type );
if ( $slugs_typo ) {
    $_selector = [
        '.breadcrumb',
        '.filter-holder',
        '.filter-holder select'
    ];
    $_css = OhioHelper::parse_acf_typo_to_css( $slugs_typo );
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}
