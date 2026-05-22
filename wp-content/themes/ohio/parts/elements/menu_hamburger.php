<?php
/**
 * Ohio WordPress Theme
 *
 * Hamburger menu template
 *
 * @author Colabrio
 * @link   https://ohio.clbthemes.com
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Get theme options
$hamburger_caption_visibility = OhioOptions::get( 'page_hamburger_menu_caption', false );

$extra_classes = '';
if ( $hamburger_caption_visibility ) {
    $extra_classes = ' hamburger-outer';
}

?>

<button class="hamburger-button<?php echo esc_attr( $extra_classes ); ?>" data-js="hamburger" aria-label="<?php esc_html_e( 'Hamburger', 'ohio' ); ?>">
    <div class="hamburger icon-button" tabindex="0">
        <i class="icon"></i>
    </div>
    <?php if ( $hamburger_caption_visibility ) : ?> 
        <span class="hamburger-caption"><?php esc_html_e( 'Menu', 'ohio' ); ?></span>
    <?php endif; ?>
</button>