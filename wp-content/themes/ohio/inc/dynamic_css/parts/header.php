<?php
/*
    Page

    Table of contents: (use search)

    # General
        ## 1. Wrap Container Width
        ## 2. Side Gaps
        ## 3. Height
        ## 4. Background
        ## 5. Corner Radius
        ## 6. Border Style
        ## 7. Border Color
        ## 8. Header Typography

    # Sticky Header
        ## 9. Height
        ## 10. Background
        ## 11. Border Style
        ## 12. Border Color
        ## 13. Sticky Header Typography

    # Mobile Header
        ## 14. Mobile Header Typography

    # Subheader
        ## 15. Height
        ## 16. Background
        ## 17. Content Typography

    # CTA Buttons
        ## 18. Button Text Color
        ## 19. Button Fill Color
*/

// Get header layout
$header_layout = OhioOptions::get( 'page_header_menu_style', 'style1' );

# General

## 1. Wrap Container Width
$wrap_container_width = OhioOptions::get( 'page_header_content_wrapper_width', null, false, true );
if ( $wrap_container_width ) {
	$_selector = [
		'.header-wrap.page-container:not(.-full-w)'
	];
    $_css = '--clb-container-width:' . $wrap_container_width . ';';
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 2. Side Gaps
$side_gaps = OhioOptions::get( 'page_header_full_width_margins_size', null, false, true );
if ( $side_gaps ) {
	$_selector = [
        '.header:not(.header-sidebar) .header-wrap:not(.page-container)',
        ':not(.boxed-container) .hamburger-nav .close-bar',
    ];
    $_css = 'padding-left:' . $side_gaps . '; padding-right:' . $side_gaps . ';';
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css, 'desktop' );
}

// Global Inheritance. Define custom local styles
OhioOptions::get( 'page_header_menu_style_settings' ); // trigger selection chain
$header_style_select_type = OhioOptions::get_last_select_type();

## 3. Height
$header_height = OhioOptions::get_by_type( 'page_header_menu_height', $header_style_select_type );
if ( $header_height ) {
	$_selector = [
        ':root'
    ];
    if ( $header_layout == 'style2' ) {
    	$_css = '--clb-header-height-2:${height}px;';
    } elseif ( $header_layout == 'style5' ) {
    	$_css = '--clb-header-height-5:${height}px;';
    } elseif ( $header_layout == 'style6' || $header_layout == 'style7' ) {
    	$_css = '--clb-header-height-6:${height}px;';
    } elseif ( $header_layout == 'style8' || $header_layout == 'style7' ) {
    	$_css = '--clb-header-height-8:${height}px;';
    } else {
    	$_css = '--clb-header-height:${height}px;';
    }

	$_css = OhioHelper::parse_responsive_height_to_css( $header_height, $_css );
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

## 4. Background
$background_type = OhioOptions::get( 'page_header_menu_background_type' );
$background_select_type = OhioOptions::get_last_select_type();
$background_color = OhioOptions::get_by_type( 'page_header_menu_background_color', $background_select_type );
$background_image = OhioHelper::get_background_image_css_by_type( 'page_header_menu', $background_select_type );
if ( $background_color || $background_image ) {

	if ( $header_layout != 'style8' ) {
		$_selector = '.header:not(.-sticky)';
	} else {
		$_selector = '.header:not(.-sticky) .header-wrap-inner';
	}

	$_css = '';
	$_css .= 'background-color:' . $background_color . ';';

	if ( $background_type == 'image' ) {
		$_css .= $background_image;
	}
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 5. Corner Radius
$header_corner_radius = OhioOptions::get( 'page_header_corner_radius', null, false, true );
if ( $header_corner_radius && $header_layout == 'style8' ) {
	$_selector = '.header.header-8 .header-wrap-inner';
    $_css = 'border-radius:' . $header_corner_radius . ';';
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 6. Border Style
$header_border_visibility = OhioOptions::get( 'page_header_menu_border_visibility' );
$header_border_select_type = OhioOptions::get_last_select_type();
$header_border_style = OhioOptions::get_by_type( 'page_header_menu_border_type', $header_border_select_type );
if ( $header_border_style && $header_border_visibility ) {
    OhioBuffer::append_to_variables_css_buffer( '--clb-header-border-style', $header_border_style );
}

## 7. Border Color
$header_border_color = OhioOptions::get_by_type( 'page_header_menu_border_color', $header_border_select_type );
if ( $header_border_color && $header_border_visibility ) {
    OhioBuffer::append_to_variables_css_buffer( '--clb-header-border-color', $header_border_color );
}

## 8. Header Typography
$header_typo = OhioOptions::get_by_type( 'page_header_menu_text_typo', $header_style_select_type );
if ( $header_typo ) {
    $_selector = [
        '.header:not(.-sticky):not(.-mobile) .menu-blank',
        '.header:not(.-sticky):not(.-mobile) .menu > li > a',
		'.header:not(.-sticky) .hamburger-outer',
        '.header:not(.-sticky) .branding-title',
        '.header:not(.-sticky) .icon-button:not(.-overlay-button):not(.-small):not(.-extra-small)',
        '.header:not(.-sticky) .cart-button-total a',
        '.header:not(.-sticky) .lang-dropdown'
	];
    $_css = OhioHelper::parse_acf_typo_to_css( $header_typo );
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );

    // Select chevron color
	preg_match_all( "/(?=color\:([^\s]+))/", $_css, $matches );
	$chevron_color = substr( implode( '', $matches[1] ), 1, -1 );

    if ( $chevron_color ) {
    	$_selector = '.header:not(.-sticky):not(.-mobile):not(.light-typo):not(.dark-typo) .lang-dropdown';
	    $_css = 'background-image: url("data:image/svg+xml,%3csvg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 16 16\'%3e%3cpath fill=\'none\' stroke=\'%23' . $chevron_color . '\' stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'2\' d=\'M2 5l6 6 6-6\'/%3e%3c/svg%3e");';
	    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
    }    
}


# Sticky Header

## 9. Height
$sticky_header_height = OhioOptions::get( 'page_header_sticky_height' );
if ( $sticky_header_height ) {

	if ( $header_layout != 'style8' ) {
		$_selector = [
	        '.header.-sticky:not(.-fixed):not(.header-8) .header-wrap'
	    ];
	} else {
		$_selector = [
	        '.header.-sticky:not(.-fixed) .header-wrap-inner'
	    ];
	}

    $_css = 'height:${height}px;';
	$_css = OhioHelper::parse_responsive_height_to_css( $sticky_header_height, $_css );
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

## 10. Background
$background_type = OhioOptions::get_by_type( 'page_header_fixed_background_type', 'global' );
$background_color = OhioOptions::get_by_type( 'page_header_fixed_background_color', 'global' );
$background_image = OhioHelper::get_background_image_css_by_type( 'page_header_fixed', 'global' );
if ( $background_color || $background_image ) {

    if ( $header_layout != 'style8' ) {
		$_selector = '.header.-sticky:not(.header-8)';
	} else {
		$_selector = '.header.header-8.-sticky .header-wrap-inner';
	}

	$_css = '';
	$_css .= 'background-color:' . $background_color . ';';

	if ( $background_type == 'image' ) {
		$_css .= $background_image;
	}
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 11. Border Style
$sticky_header_border_visibility = OhioOptions::get_by_type( 'page_header_sticky_menu_border_visibility' );
$header_border_style = OhioOptions::get( 'page_header_sticky_menu_border_type' );
if ( $header_border_style && $sticky_header_border_visibility ) {
    OhioBuffer::append_to_variables_css_buffer( '--clb-sticky-header-border-style', $header_border_style );
}

## 12. Border Color
$header_border_color = OhioOptions::get( 'page_header_sticky_menu_border_color' );
if ( $header_border_color && $sticky_header_border_visibility ) {
    OhioBuffer::append_to_variables_css_buffer( '--clb-sticky-header-border-color', $header_border_color );
}

## 13. Sticky Header Typography
$sticky_header_typo = OhioOptions::get( 'page_header_sticky_text_typo' );
if ( $sticky_header_typo ) {
	$_selector = [
        '.-sticky:not(.-mobile) .menu-blank',
        '.-sticky:not(.-mobile) .menu > li > a',
		'.-sticky .hamburger-outer',
        '.-sticky .branding-title',
        '.-sticky .icon-button:not(.-overlay-button):not(.-small):not(.-extra-small)',
        '.-sticky .cart-button-total a',
        '.-sticky .lang-dropdown'
	];
    $_css = OhioHelper::parse_acf_typo_to_css( $sticky_header_typo );
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );

    // Select chevron color
	preg_match_all( "/(?=color\:([^\s]+))/", $_css, $matches );
	$chevron_color = substr( implode( '', $matches[1] ), 1, -1 );

    if ( $chevron_color ) {
    	$_selector = '.-sticky .menu-optional .lang-dropdown';
	    $_css = 'background-image: url("data:image/svg+xml,%3csvg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 16 16\'%3e%3cpath fill=\'none\' stroke=\'%23' . $chevron_color . '\' stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'2\' d=\'M2 5l6 6 6-6\'/%3e%3c/svg%3e");';
	    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
    }    
}


# Mobile Header

## 14. Mobile Header Typography
$mobile_header_typo = OhioOptions::get( 'page_mobile_header_menu_color' );
if ( $mobile_header_typo ) {
	$_selector = [
		'.header.-mobile:not(.-sticky) .hamburger-outer',
		'.header.-mobile:not(.-sticky) .branding-title',
		'.header.-mobile:not(.-sticky) .icon-button:not(.-overlay-button):not(.-small):not(.-extra-small)',
        '.header.-mobile:not(.-sticky) .cart-button-total a',
        '.header.-mobile:not(.-sticky) .lang-dropdown',
	];
	$_css = OhioHelper::parse_acf_typo_to_css( $mobile_header_typo );
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}


# Subheader

// Global Inheritance. Define custom local styles
OhioOptions::get( 'page_subheader_style' ); // trigger select chain
$subheader_style_select_type = OhioOptions::get_last_select_type();

## 15. Height
$subheader_height = OhioOptions::get_by_type( 'page_subheader_height', $subheader_style_select_type );
if ( $subheader_height ) {
	$_selector = [
        ':root'
    ];
    $_css = '--clb-subheader-height:${height}px;';
	$_css = OhioHelper::parse_responsive_height_to_css( $subheader_height, $_css );
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

## 16. Background
$background_type = OhioOptions::get( 'page_subheader_background_type' );
$background_select_type = OhioOptions::get_last_select_type();
$background_color = OhioOptions::get_by_type( 'page_subheader_background_color', $background_select_type );
$background_image = OhioHelper::get_background_image_css_by_type( 'page_subheader', $background_select_type );
if ( $background_color || $background_image ) {
	$_selector = '.subheader';
	$_css = '';
	$_css .= 'background-color:' . $background_color . ';';

	if ( $background_type == 'image' ) {
		$_css .= $background_image;
	}
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 17. Content Typography
$content_typo = OhioOptions::get_by_type( 'page_subheader_text_typo', $subheader_style_select_type );
if ( $content_typo ) {
    $_content_typo_css = OhioHelper::parse_acf_typo_to_css( $content_typo );

    if ( $_content_typo_css ) {
        $_selector = [
			'.subheader',
			'.subheader a'
		];
        $_css = $_content_typo_css;
        OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
    }
}

# CTA Buttons

## 18. Button Text Color
$cta_button_color = OhioOptions::get( 'custom_button_for_header_color' );
if ( $cta_button_color ) {
	$_selector = '.menu-optional .button-group .button:not(:hover)';
	$_css = '--clb-color-white:' . $cta_button_color . ';';
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 19. Button Fill Color
$cta_button_background = OhioOptions::get( 'custom_button_for_header_background' );
if ( $cta_button_background ) {
	$_selector = '.menu-optional .button-group .button:not(.page-link):not(.-dm-ignore):not(:hover)';
	$_css = '--clb-color-button:' . $cta_button_background . ';';
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

