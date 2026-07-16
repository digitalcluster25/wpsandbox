<?php
/*
    Page

    Table of contents: (use search)

    # General
        ## 1. Hamburger Menu Overlay
        ## 2. Hamburger Caption Fill
        ## 3. Standard Menu Typography
        ## 4. Standard Submenu Typography
        ## 5. Hamburger Menu Typography
        ## 6. Overlay Details Typography
        ## 7. Overlay Social Accounts Typography

    # Mobile Menu
        ## 8. Initial Resolution
        ## 9. Background
        ## 10. Mobile Menu Typography
*/

OhioOptions::get( 'page_header_menu_style_settings' ); // trigger selection chain
$style_settings_select_type = OhioOptions::get_last_select_type();


# General

## 1. Hamburger Menu Overlay
$background_type = OhioOptions::get( 'page_header_overlay_menu_background_type' );
$background_select_type = OhioOptions::get_last_select_type();
$background_color = OhioOptions::get_by_type( 'page_header_overlay_menu_background_color', $background_select_type );
$background_image = OhioHelper::get_background_image_css_by_type( 'page_header_overlay_menu', $background_select_type );
if ( $background_color || $background_image ) {
	$_selector = '.clb-popup.hamburger-nav';
	$_css = '';
	$_css .= 'background-color:' . $background_color . ';';

	if ( $background_type == 'image' ) {
		$_css .= $background_image;
	}
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 2. Hamburger Caption Fill
$hamburger_caption_background = OhioOptions::get_global( 'page_hamburger_menu_caption_background' );
if ( $hamburger_caption_background ) {
	$_selector = '.hamburger-outer';
	$_css = 'background-color:' . $hamburger_caption_background . ';';
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 3. Standard Menu Typography
$standard_menu_typo = OhioOptions::get( 'page_standard_menu_text_typo' );
if ( $standard_menu_typo ) {
	$_selector = '.header:not(.-mobile) .menu';
	$_css = OhioHelper::parse_acf_typo_to_css( $standard_menu_typo );
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 4. Standard Submenu Typography
$standard_submenu_typo = OhioOptions::get( 'page_standard_submenu_text_typo' );
if ( $standard_submenu_typo ) {
	$_selector = '.header:not(.-mobile) .menu ul';
	$_css = OhioHelper::parse_acf_typo_to_css( $standard_submenu_typo );
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 5. Hamburger Menu Typography
$hamburger_menu_typo = OhioOptions::get( 'page_fullscreen_menu_text_typo' );
if ( $hamburger_menu_typo ) {
	$_selector = '.hamburger-nav .menu .mega-menu-item > a';
	$_css = OhioHelper::parse_acf_typo_to_css( $hamburger_menu_typo );
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 6. Overlay Details Typography
$hamburger_overlay_details_typo = OhioOptions::get( 'page_fullscreen_menu_details_text_typo' );
if ( $hamburger_overlay_details_typo ) {
	$_selector = [
		'.hamburger-nav .details-column:not(.social-networks)',
		'.hamburger-nav .details-column:not(.social-networks) b'
	];
	$_css = OhioHelper::parse_acf_typo_to_css( $hamburger_overlay_details_typo );
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 7. Overlay Social Accounts Typography
$hamburger_overlay_socials_typo = OhioOptions::get( 'page_fullscreen_menu_social_networks_typo' );
if ( $hamburger_overlay_socials_typo ) {
	$_selector = '.hamburger-nav .social-networks .network';
	$_css = OhioHelper::parse_acf_typo_to_css( $hamburger_overlay_socials_typo );
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}


# Mobile Menu

## 8. Initial Resolution
$mobile_menu_initial_resolution = OhioOptions::get_global( 'page_mobile_menu_initial_resolution' );
if ( $mobile_menu_initial_resolution ) {
	$_selector = [
		'@media screen and (max-width: ' . $mobile_menu_initial_resolution . 'px) { .header',
		'.slide-in-overlay'
	];
	$_css = '';
	$_css .= 'opacity: 0;';
	$_css .= '}';
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 9. Background
$background_type = OhioOptions::get( 'page_mobile_header_menu_background_type' );
$background_select_type = OhioOptions::get_last_select_type();
$background_color = OhioOptions::get_by_type( 'page_mobile_header_menu_background_color', $background_select_type );
$background_image = OhioHelper::get_background_image_css_by_type( 'page_mobile_header_menu', $background_select_type );
if ( $background_color || $background_image ) {
	$_selector = '.header.-mobile .nav .holder';
	$_css = '';
	$_css .= 'background-color:' . $background_color . ';';

	if ( $background_type == 'image' ) {
		$_css .= $background_image;
	}
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 10. Mobile Menu Typography
$mobile_menu_typo = OhioOptions::get_global( 'mobile_header_menu_typo' );
if ( $mobile_menu_typo ) {
    $_selector = [
		'.header.-mobile .nav',
		'.header.-mobile .slide-in-overlay .copyright',
		'.header.-mobile .slide-in-overlay .lang-dropdown',
		'.header.-mobile .slide-in-overlay .close-bar .icon-button:not(.-small)'
	];
    $_css = OhioHelper::parse_acf_typo_to_css( $mobile_menu_typo );
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );

    // Select chevron color
	preg_match_all( "/(?=color\:([^\s]+))/", $_css, $matches );
	$chevron_color = substr( implode( '', $matches[1] ), 1, -1 );

    if ( $chevron_color ) {
    	$_selector = [
			'.header.-mobile .slide-in-overlay .lang-dropdown'
		];
	    $_css = 'background-image: url("data:image/svg+xml,%3csvg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 16 16\'%3e%3cpath fill=\'none\' stroke=\'%23' . $chevron_color . '\' stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'2\' d=\'M2 5l6 6 6-6\'/%3e%3c/svg%3e");';
	    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
    }    
}
