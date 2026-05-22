<?php
/**
 * Ohio WordPress Theme
 *
 * Scroll to the top template
 *
 * @author Colabrio
 * @link   https://ohio.clbthemes.com
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Get theme options
$scroll_to_top_visibility = OhioOptions::get( 'page_show_arrow', true );
$scroll_to_top_visibility_mobile = OhioOptions::get( 'page_show_arrow_tablet', false );
$scroll_to_top_position = OhioOptions::get( 'page_arrow_position' );

$extra_classes = '';
if ( !$scroll_to_top_visibility_mobile ) {
	$extra_classes .= ' vc_hidden-md vc_hidden-sm vc_hidden-xs';
}
if ( $scroll_to_top_position == 'bottom_left' ) {
	$extra_classes .= ' -left';
}
if ( $scroll_to_top_position == 'bottom_right' ) {
	$extra_classes .= ' -right';
}

?>

<?php if ( $scroll_to_top_visibility ) : ?>

<a href="#" class="scroll-top -undash -unlink -small-t<?php echo esc_attr( $extra_classes ); ?>">

	<?php if ( $scroll_to_top_position == 'bottom_left' || $scroll_to_top_position == 'bottom_right' ) : ?>

		<button class="icon-button -small" aria-label="Scroll" aria-controls="site-navigation" aria-expanded="false">
		    <i class="icon -no-transition">
		    	<svg class="default" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M442.5-170v-476L223-426.5 170-480l310-310 310 310-53 53.5L517.5-646v476h-75Z"/></svg>
		    </i>
		</button>

	<?php else : ?>

		<div class="scroll-top-bar">
			<div class="scroll-track"></div>
		</div>

	<?php endif; ?>

	<div class="scroll-top-holder titles-typo">
		<?php esc_html_e( 'Scroll to top', 'ohio' ); ?>
	</div>
</a>

<?php endif; ?>