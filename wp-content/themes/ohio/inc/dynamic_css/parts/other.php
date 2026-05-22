<?php
/*
    Page

    Table of contents: (use search)

	# Social Media
		## 1. Social Media Typography

    # Subscribe Popup
    	## 2. Background (Featured Image)
        ## 3. Popup Height
        ## 4. Popup Width
        ## 5. Background Color
        ## 6. Overlay Color
        ## 7. Close Button Color
        ## 8. Close Text Typography
        ## 9. Heading Typography
        ## 10. Description Typography
        ## 11. Form Typography
	
	# Notices
    	## 12. Background
    	## 13. Button Color
    	## 14. Notice Typography
    	## 15. Notice Link Typography

    # Offer Banner
        ## 16. Scrolling Speed
        ## 17. Background
        ## 18. Button Color
        ## 19. Banner Typography
*/


# Social Media

## 1. Social Media Typography
$_social_networks_select_type = OhioOptions::get_select_type( 'page_social_links_visibility' ); // Global Inheritance. Define local styles
$social_networks_typo = OhioOptions::get_by_type( 'page_social_networks_typo', $_social_networks_select_type );
if ( $social_networks_typo ) {
	$_selector = '.elements-bar:not(.light-typo):not(.dark-typo) .social-bar';
	$_css = OhioHelper::parse_acf_typo_to_css( $social_networks_typo );
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

# Subscribe Popup

## 2. Background (Featured Image)
$background_type = OhioOptions::get( 'subscribe_popup_background_type' );
$background_select_type = OhioOptions::get_last_select_type();
$background_color = OhioOptions::get_by_type( 'subscribe_popup_background_color', $background_select_type );
$background_image = OhioHelper::get_background_image_css_by_type( 'subscribe_popup', $background_select_type );
if ( $background_color || $background_image ) {
	$_selector = [
		'.popup-subscribe .thumbnail'
	];
	$_css = '';
	$_css .= 'background-color:' . $background_color . ';';

	if ( $background_type == 'image' ) {
		$_css .= $background_image;
	}
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 3. Popup Height
$subscribe_popup_height = OhioOptions::get_global( 'subscribe_popup_height' );
if ( $subscribe_popup_height ) {
    $_selector = [
        '.popup-subscribe'
    ];
    $_css = 'height:${height}px;';
    $_css = OhioHelper::parse_responsive_height_to_css( $subscribe_popup_height, $_css );
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

## 4. Popup Width
$subscribe_popup_width = OhioOptions::get_global( 'subscribe_popup_width' );
if ( $subscribe_popup_width ) {
    $_selector = [
        '.popup-subscribe'
    ];
    $_css = 'width:${height}px;';
    $_css = OhioHelper::parse_responsive_height_to_css( $subscribe_popup_width, $_css );
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

## 5. Background Color
$popup_background_color = OhioOptions::get_global( 'subscribe_popup_window_background_color' );
if ( $popup_background_color ) {
    $_selector = '.popup-subscribe';
    $_css = 'background-color:' . $popup_background_color . ';';
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 6. Overlay Color
$overlay_color = OhioOptions::get_global( 'subscribe_popup_overlay_color', null, false, true );
if ( $overlay_color ) {
    $_selector = '.clb-popup.subscribe-popup:not(.-slide-in)';
    $_css = 'background-color:' . $overlay_color . ';';
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 7. Close Button Color
$close_button_color = OhioOptions::get_global( 'subscribe_popup_close_button_color', null, false, true );
if ( $close_button_color ) {
    $_selector = [
        '.clb-popup.subscribe-popup .close-bar .icon-button .icon',
        '.clb-popup.subscribe-popup.-slide-in .close-bar .icon-button .icon'
    ];
    $_css = 'color:' . $close_button_color . ';';
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 8. Close Text Typography
$close_text_typo = OhioOptions::get_global( 'subscribe_popup_close_typo' );
if ( $close_text_typo ) {
    $_close_text_typo_css = OhioHelper::parse_acf_typo_to_css( $close_text_typo );

    if ( $_close_text_typo_css ) {
        $_selector = '.popup-subscribe .close-link';
        $_css = $_close_text_typo_css;
        OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
    }
}

## 9. Heading Typography
$heading_typo = OhioOptions::get_global( 'subscribe_popup_title_typo' );
if ( $heading_typo ) {
    $_heading_typo_css = OhioHelper::parse_acf_typo_to_css( $heading_typo );

    if ( $_heading_typo_css ) {
        $_selector = '.popup-subscribe .title';
        $_css = $_heading_typo_css;
        OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
    }
}

## 10. Description Typography
$description_typo = OhioOptions::get_global( 'subscribe_popup_details_typo' );
if ( $description_typo ) {
    $_description_typo_css = OhioHelper::parse_acf_typo_to_css( $description_typo );

    if ( $_description_typo_css ) {
        $_selector = '.popup-subscribe p';
        $_css = $_description_typo_css;
        OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
    }
}

## 11. Form Typography
$form_typo = OhioOptions::get_global( 'subscribe_popup_form_typo' );
if ( $form_typo ) {
    $_form_typo_css = OhioHelper::parse_acf_typo_to_css( $form_typo );

    if ( $_form_typo_css ) {
        $_selector = [
            '.popup-subscribe .contact-form .wpcf7-list-item-label',
            '.popup-subscribe .contact-form textarea',
            '.popup-subscribe .contact-form select',
            '.popup-subscribe .contact-form input',
            '.popup-subscribe .contact-form input::placeholder'
        ];
        $_css = $_form_typo_css;
        OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
    }
}

# Notices

## 12. Background
$notice_background_color = OhioOptions::get_global( 'notification_background_color' );
if ( $notice_background_color ) {
	$_selector = [
		'.notification .alert',
		'.notification .alert.-blur'
	];
	$_css = 'background-color:' . $notice_background_color . ';';
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 13. Button Color
$notice_button_color = OhioOptions::get_global( 'notification_button_background_color' );
if ( $notice_button_color ) {
	$_selector = '.notification .button';
	$_css = 'background-color:' . $notice_button_color . ';';
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 14. Notice Typography
$notice_typo = OhioOptions::get_global( 'notification_details_typo' );
if ( $notice_typo ) {
	$_selector = '.notification .alert';
	$_css = OhioHelper::parse_acf_typo_to_css( $notice_typo );
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 15. Notice Link Typography
$notice_link_typo = OhioOptions::get_global( 'notification_link_typo' );
if ( $notice_link_typo ) {
	$_selector = '.notification .alert a';
	$_css = OhioHelper::parse_acf_typo_to_css( $notice_link_typo );
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

# Offer Banner

## 16. Scrolling Speed
$offer_banner_scrolling_speed = OhioOptions::get_global( 'page_offer_banner_scrolling_effect_speed' );
$offer_banner_scrolling_speed_sec = $offer_banner_scrolling_speed . esc_html( 's' ) ;
if ( $offer_banner_scrolling_speed ) {
    OhioBuffer::append_to_variables_css_buffer( '--clb-infinit-scrolling-transition-duration', $offer_banner_scrolling_speed_sec );
}

## 17. Background
$background_type = OhioOptions::get( 'page_banner_background_type' );
$background_select_type = OhioOptions::get_last_select_type();
$background_color = OhioOptions::get_by_type( 'page_banner_background_color', $background_select_type );
$background_image = OhioHelper::get_background_image_css_by_type( 'page_banner', $background_select_type );
if ( $background_color || $background_image ) {
    $_selector = [
        '.offer-banner',
        '.offer-banner.flipping .offer-banner-item'
    ];
    $_css = '';
    $_css .= 'background:' . $background_color . ';';

    if ( $background_type == 'image' ) {
        $_css .= $background_image;
    }
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 18. Button Color
$offer_banner_button_color = OhioOptions::get( 'page_offer_banner_button_color' );
if ( $offer_banner_button_color ) {
    $_selector = '.offer-banner .button';
    $_css = 'background-color:' . $offer_banner_button_color . ';';
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 19. Banner Typography
$offer_banner_link_typo = OhioOptions::get( 'page_offer_banner_typo' );
if ( $offer_banner_link_typo ) {
    $_selector = '.offer-banner';
    $_css = OhioHelper::parse_acf_typo_to_css( $offer_banner_link_typo );
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}
