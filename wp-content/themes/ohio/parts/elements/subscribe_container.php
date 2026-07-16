<?php
/**
 * Ohio WordPress Theme
 *
 * Popup template
 *
 * @author Colabrio
 * @link   https://ohio.clbthemes.com
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$is_subscribe_popup_enabled = OhioOptions::get_global( 'subscribe_popup_switch', false );

if ( ! $is_subscribe_popup_enabled ) {
    return;
}

$popup_position = OhioOptions::get_global( 'subscribe_popup_position' );
$popup_extra_classes = '';
switch ( $popup_position ) {
    case 'slidein_left':
        $popup_extra_classes .= ' -slide-in -left-bottom';
        break;
    case 'slidein_right':
        $popup_extra_classes .= ' -slide-in -right-bottom';
        break;
}
?>


<div class="clb-popup subscribe-popup container-loading<?php echo esc_attr( $popup_extra_classes ); ?>">
    <div class="close-bar">
        <button class="icon-button -light" data-js="close-popup" aria-label="<?php esc_html_e( 'Close', 'ohio' ); ?>">
            <?php get_template_part( 'parts/elements/icon_close' ); ?>
        </button>
    </div>
    <div class="clb-popup-holder"></div>
</div>
