<?php
/*
    General

    Table of contents: (use search)

    # General
        ## 1. Primary Color
        ## 2. Primary Fill Color
        ## 3. Badge Fill Color
        ## 4. Overlay Color
        ## 5. Highlight Color
        ## 6. Lines & Dividers Color
        ## 7. Links Color
        ## 8. Links Color (Hover)
        ## 9. Corner Radius
        ## 10. Grid Corner Radius
        ## 11. Grid Gutters

    # Buttons
        ## 12. Button Fill Color
        ## 13. Button Fill Color (Hover)
        ## 14. Button Corner Radius

    # Forms
        ## 15. Form Corner Radius

    # Color Mode
        ## 16. Dark Mode Fill Color
        ## 17. Dark Mode Text Color
*/


# General

## 1. Primary Color
$brand_color = OhioOptions::get_global( 'page_brand_color' );
if ( $brand_color ) {
    OhioBuffer::append_to_variables_css_buffer( '--clb-color-primary', $brand_color );

    // Heading Widget highlighted text gradient color
    $brand_color_highlighted = OhioHelper::hex_to_rgba( $brand_color, .5 );
    $_selector = [
        '.heading .title .highlighted-text'
    ];
    $_css = 'background-image: linear-gradient(' . $brand_color_highlighted . ', ' . $brand_color_highlighted . ');';
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 2. Primary Fill Color
$fill_color = OhioOptions::get_global( 'page_backgrounds_color' );
if ( $fill_color ) {
    OhioBuffer::append_to_variables_css_buffer( '--clb-color-fill', $fill_color );
}

## 3. Badge Fill Color
$badge_fill_color = OhioOptions::get_global( 'page_badge_fill_color' );
if ( $badge_fill_color ) {
    OhioBuffer::append_to_variables_css_buffer( '--clb-color-badge-fill', $badge_fill_color );
}

## 4. Overlay Color
$overlay_color = OhioOptions::get_global( 'page_overlay_color' );
if ( $overlay_color ) {
    OhioBuffer::append_to_variables_css_buffer( '--clb-color-overlay', $overlay_color );
}

## 5. Highlight Color
$selection_color = OhioOptions::get_global( 'page_selection_color' );
if ( $selection_color ) {
    OhioBuffer::append_to_variables_css_buffer( '--clb-color-selection', $selection_color );
}

## 6. Lines & Dividers Color
$borders_color = OhioOptions::get_global( 'page_borders_color' );
if ( $borders_color ) {
    OhioBuffer::append_to_variables_css_buffer( '--clb-color-border', $borders_color );
}

## 7. Links Color
$links_color = OhioOptions::get_global( 'page_links_color' );
if ( $links_color ) {
    $_selector = [
        '.page-content a:not(.-unlink):not(.tag)',
        '.comment-form a:not(.-unlink):not(.tag)',
        '.comment-content a:not(.-unlink):not(.tag)',
        '.project-content a:not(.-unlink):not(.tag)',
        '.woocommerce-product-details__short-description a:not(.-unlink):not(.tag)',
        '.wpb-content-wrapper a:not(.-unlink):not(.tag)',
        '.elementor a:not(.-unlink):not(.tag)'
    ];
    $_css = '--clb-color-link:' . $links_color . ';';
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 8. Links Color (Hover)
$links_hover_color = OhioOptions::get_global( 'page_links_hover_color' );
if ( $links_hover_color ) {
    OhioBuffer::append_to_variables_css_buffer( '--clb-color-link-hover', $links_hover_color );
}

## 9. Corner Radius
$container_corners = OhioOptions::get_global( 'page_container_corners' );
if ( $container_corners ) {
    OhioBuffer::append_to_variables_css_buffer( '--clb-border-radius', $container_corners );
}

## 10. Grid Corner Radius
$grid_corners = OhioOptions::get_global( 'page_grid_corners' );
if ( $grid_corners ) {
    OhioBuffer::append_to_variables_css_buffer( '--clb-grid-border-radius', $grid_corners );
}

## 11. Grid Gutters
$grid_gutter = OhioOptions::get_global( 'page_grid_gutter' );
if ( $grid_gutter ) {
    OhioBuffer::append_to_variables_css_buffer( '--clb-grid-gutter', $grid_gutter );
}


# Buttons

## 12. Button Fill Color
$buttons_color = OhioOptions::get_global( 'page_buttons_color' );
if ( $buttons_color ) {
    OhioBuffer::append_to_variables_css_buffer( '--clb-color-button', $buttons_color );
}

## 13. Button Fill Color (Hover)
$buttons_hover_color = OhioOptions::get_global( 'page_buttons_hover_color' );
if ( $buttons_hover_color ) {
    OhioBuffer::append_to_variables_css_buffer( '--clb-color-button-hover', $buttons_hover_color );
}

## 14. Button Corner Radius
$buttons_corners = OhioOptions::get_global( 'page_buttons_corners' );
if ( $buttons_corners ) {
    OhioBuffer::append_to_variables_css_buffer( '--clb-button-border-radius', $buttons_corners );
}


# Forms

## 15. Form Corner Radius
$forms_corners = OhioOptions::get_global( 'page_forms_corners' );
if ( $forms_corners ) {
    OhioBuffer::append_to_variables_css_buffer( '--clb-text-field-border-radius', $forms_corners );
}


# Color Mode

## 16. Dark Mode Fill Color
$dark_mode_fill_color = OhioOptions::get_global( 'page_dark_mode_background_color' );
if ( $dark_mode_fill_color ) {
    OhioBuffer::append_to_variables_css_buffer( '--clb-color-fill-dark-mode', $dark_mode_fill_color );
}

## 17. Dark Mode Text Color
$dark_mode_text_color = OhioOptions::get_global( 'page_dark_mode_text_color' );
if ( $dark_mode_text_color ) {
    OhioBuffer::append_to_variables_css_buffer( '--clb-color-white-dark-mode', $dark_mode_text_color );
}