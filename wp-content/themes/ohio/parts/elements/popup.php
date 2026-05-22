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
?>

<div class="clb-popup container-loading custom-popup">
    <div class="close-bar">
        <button class="icon-button -light" data-js="close-popup" aria-label="<?php esc_html_e( 'Close', 'ohio' ); ?>">
            <?php get_template_part( 'parts/elements/icon_close' ); ?>
        </button>
    </div>
    <div class="clb-popup-holder"></div>
</div>