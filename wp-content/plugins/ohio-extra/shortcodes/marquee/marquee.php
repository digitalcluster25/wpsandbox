<?php 

/**
* WPBakery Page Builder Ohio Message box shortcode
*/

add_shortcode( 'ohio_marquee', 'ohio_marquee_func' );

function ohio_marquee_func( $atts ) {
	if ( isset( $atts ) && is_array( $atts ) ) extract( $atts );

    $content_type = isset( $content_type ) ? OhioExtraFilter::string( $content_type, 'string', 'gallery' ) : 'gallery';
	$images = isset( $images ) ? OhioExtraFilter::string( $images, 'string', '' ) : '';
	$text = isset( $marquee_text ) ? rawurldecode( base64_decode( $marquee_text ) ) : 'Your marquee text';
	$text = OhioExtraFilter::string( $text, 'string', '' );
    $direction = isset( $direction ) ? OhioExtraFilter::string( $direction, 'string', 'ltr' ) : 'ltr';
    $speed = isset( $speed ) ? OhioExtraFilter::string( $speed, 'string', '0.3' ) : '0.3';
    $slow_on_scroll = isset( $slow_on_scroll ) ? OhioExtraFilter::boolean( $slow_on_scroll, false ) : false;
    $gap_right = isset( $gap_right ) ? OhioExtraFilter::string( $gap_right, 'string', '16px' ) : false;
    $height = isset( $height ) ? OhioExtraFilter::string( $height, 'string', '200px' ) : false;
	$text_typo = isset( $text_typo ) ? OhioExtraFilter::string( $text_typo ) : false;

	// Appear effect
	$appearance_effect = isset( $appearance_effect ) ? OhioExtraFilter::string( $appearance_effect, 'attr', 'none' )  : 'none';
	$appearance_once = isset( $appearance_once ) ? OhioExtraFilter::boolean( $appearance_once ) : true;
	$appearance_duration = isset( $appearance_duration ) ? OhioExtraFilter::string( $appearance_duration, 'attr', false )  : false;
	$appearance_delay = isset( $appearance_delay ) ? OhioExtraFilter::string( $appearance_delay, 'attr', false ) : false;
	
	$animation_attrs = '';
	if ( $appearance_effect != 'none' ) {
		OhioHelper::add_required_script( 'aos' );
	}
	if ( $appearance_effect != 'none' ) {
		$animation_attrs .= ' data-aos=' . esc_attr( $appearance_effect ) . '';
	}
	if ( !$appearance_once ) {
		$animation_attrs .= ' data-aos-once=true';
	}
	if ( !empty( $appearance_duration ) ) {
		$animation_attrs .= ' data-aos-duration=' . intval( $appearance_duration ) . '';
	}
	if ( !empty( $appearance_delay ) ) {
		$animation_attrs .= ' data-aos-delay=' . intval( $appearance_delay ) . '';
	}

	// Wrapper ID
	$wrapper_id = uniqid( 'ohio-custom-' );
	$wrapper_classes = [
        isset( $css_class ) ? ' ' . OhioExtraFilter::string( $css_class, 'attr', '' )  : '',
    ];

	/**
	* Assembling styles
	*/

	$_style_block = '';

	$marquee_text_typo = OhioExtraParser::VC_typo_to_CSS( $text_typo );
	OhioExtraParser::VC_typo_custom_font( $text_typo );

	if ( $text_typo ) {
		$_selector = '#' . $wrapper_id . ' .marquee-line-stage{';
		$_block_typo = $marquee_text_typo;
		if ( !empty( $_block_typo['desktop'] ) ) {
			$_style_block .= $_selector . $_block_typo['desktop'] . '}';
		}
		if ( !empty( $_block_typo['tablet'] ) ) {
		    $_style_block .= '@media screen and (min-width: 769px) and (max-width: 1180px){';
		    $_style_block .= $_selector . $_block_typo['tablet'] . '}';
		    $_style_block .= '}';
		}
		if ( !empty( $_block_typo['mobile'] ) ) {
		    $_style_block .= '@media screen and (max-width: 768px){';
		    $_style_block .= $_selector . $_block_typo['mobile'] . '}';
		    $_style_block .= '}';
		}
	}

    if ( $height ) {
        $_style_block .= '#' . $wrapper_id . ' .marquee-line-stage{';
        $_style_block .= "height: $height;";
        $_style_block .= '}';
    }

    if ( $gap_right ) {
        $_style_block .= '#' . $wrapper_id . ' .marquee-line-el{';
        $_style_block .= "padding-right: $gap_right;";
        $_style_block .= '}';
    }

	$image_ids = explode( ',', $images );
	$images = array();
	foreach ( $image_ids as $media_id ) {
		$_image = wp_prepare_attachment_for_js( $media_id );
		if ( !$_image ) continue;
		$images[] = array(
			'url' => $_image['url'],
			'full' => $_image['url'],
			'title' => $_image['title'],
			'caption' => $_image['caption'],
			'alt' => get_post_meta( $media_id, '_wp_attachment_image_alt', true)
		);
	}

	OhioLayout::append_to_shortcodes_css_buffer( $_style_block );

	ob_start();
	include( plugin_dir_path( __FILE__ ) . 'marquee__view.php' );
	return ob_get_clean();
}
