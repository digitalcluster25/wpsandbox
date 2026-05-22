<?php
/*
    General

    Table of contents: (use search)

    # Logo
        ## 1. Text Logo Typography
        ## 2. Logo Height
        ## 3. Secondary Logo Height (for Sticky Header)

    # Preloader
        ## 4. Spinner Color
        ## 5. Background Color

    # Cursor
        ## 6. Cursor Color

    # Scroll to Top
        ## 7. Button Typography

    # Search
        ## 8. Search Icon Color
*/


# Logo

## 1. Text Logo Typography

$logo_typo_global = OhioOptions::get_global( 'page_header_sitename_typo' );
$logo_typo_local = OhioOptions::get( 'page_header_sitename_typo' );

if ( $logo_typo_local != '{}' ) {
    $logo_typo = $logo_typo_local;
} else {
    $logo_typo = $logo_typo_global;
}

$logo_style = OhioOptions::get( 'page_header_logo_style' );
if ( $logo_typo && $logo_style == 'sitename' ) {
    $_selector = '.branding-title';
    $_css = OhioHelper::parse_acf_typo_to_css( $logo_typo );
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 2. Logo Height
$logo_height = OhioOptions::get( 'page_header_logo_height' );
if ( $logo_height ) {
    $_selector = [
        '.header .branding .logo img',
        '.header .branding .logo-mobile img',
        '.header .branding .logo-sticky-mobile img',
        '.header .branding .logo-dynamic img'
    ];
    $_css = 'min-height:${height}px; height:${height}px;';
    $_css = OhioHelper::parse_responsive_height_to_css( $logo_height, $_css );
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

## 3. Secondary Logo Height (for Sticky Header)
$secondary_logo_height = OhioOptions::get( 'page_sticky_header_logo_height' );
if ( $secondary_logo_height ) {
    $_selector = [
        '.header.-sticky .branding .logo img',
        '.header.-sticky .branding .logo-mobile img',
        '.header.-sticky .branding .logo-sticky img',
        '.header.-sticky .branding .logo-sticky-mobile img',
        '.header.-sticky .branding .logo-dynamic img'
    ];
    $_css = 'min-height:${height}px; height:${height}px;';
    $_css = OhioHelper::parse_responsive_height_to_css( $secondary_logo_height, $_css );
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


# Preloader

## 4. Spinner Color
$preloader_spinner_color = OhioOptions::get( 'page_preloader_shapes_color' );
if ( $preloader_spinner_color ) {
    OhioBuffer::append_to_variables_css_buffer( '--clb-color-preloader-spinner', $preloader_spinner_color );
}

## 5. Background Color
$preloader_color = OhioOptions::get( 'page_preloader_background' );
if ( $preloader_color ) {
    OhioBuffer::append_to_variables_css_buffer( '--clb-color-preloader', $preloader_color );
}


# Cursor

## 6. Cursor Color
$cursor_color = OhioOptions::get( 'page_custom_cursor_color' );
if ( $cursor_color ) {
    $_selector = [
        'body.custom-cursor .circle-cursor-inner',
        'body.custom-cursor .circle-cursor-inner.cursor-link-hover'
    ];
    $_css = 'background-color:' . $cursor_color . ';';
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );

    $_selector = [
        'body.custom-cursor .circle-cursor-outer',
        'body.custom-cursor .circle-cursor-outer.cursor-link-hover'
    ];
    $_css = 'border-color:' . $cursor_color . ';';
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}


# Scroll to Top

## 7. Button Typography
$_scroll_to_top_select_type = OhioOptions::get_select_type( 'page_show_arrow' ); // Global Inheritance. Define local styles
$scroll_to_top_typo = OhioOptions::get_by_type( 'page_arrow_typo', $_scroll_to_top_select_type );
if ( $scroll_to_top_typo ) {
    $_selector = '.elements-bar:not(.light-typo):not(.dark-typo) .scroll-top';
    $_css = OhioHelper::parse_acf_typo_to_css( $scroll_to_top_typo );
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

# Search

## 8. Search Icon Color
$_search_icon_select_type = OhioOptions::get_select_type( 'page_header_search_visibility' ); // Global Inheritance. Define local styles
$search_icon_color = OhioOptions::get_by_type( 'page_header_search_color', $_search_icon_select_type );
if ( $search_icon_color ) {
    $_selector = '.search-global.fixed:not(.light-typo):not(.dark-typo)';
    $_css = 'color:' . $search_icon_color . ';';
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}
