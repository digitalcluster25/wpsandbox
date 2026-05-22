<?php
/**
 * Ohio WordPress Theme
 *
 * Back link template
 *
 * @author Colabrio
 * @link   https://ohio.clbthemes.com
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Get theme options
$previous_btn_text = OhioOptions::get( 'page_header_previous_button_text', esc_html__( 'Back', 'ohio' ), null, true );

?>

<a href="<?php echo wp_get_referer(); ?>" class="back-link dynamic-typo -unlink vc_hidden-md vc_hidden-sm vc_hidden-xs">
	<button class="icon-button" aria-controls="site-navigation" aria-label="<?php esc_html_e( 'Back', 'ohio' ); ?>">
	    <i class="icon">
			<svg class="default" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M314-442.5 533.5-223 480-170 170-480l310-310 53.5 53L314-517.5h476v75H314Z"/></svg>
	    </i>
	</button>
    <span class="caption">
        <?php echo esc_html( $previous_btn_text); ?>
    </span>
</a>