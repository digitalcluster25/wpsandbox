<?php
/**
 * Ohio WordPress Theme
 *
 * Search form template template
 *
 * @author Colabrio
 * @link   https://ohio.clbthemes.com
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Get theme options
$search_type = OhioSettings::get( 'page_header_search_type', 'global' );

?>

<div class="clb-popup search-popup">
	<div class="close-bar">
		<button class="icon-button -light" data-js="close-popup" aria-label="<?php esc_html_e( 'Close', 'ohio' ); ?>">
		    <?php get_template_part( 'parts/elements/icon_close' ); ?>
		</button>
	</div>
	<div class="holder">
		<?php
			if ( $search_type == 'woo' ) {
				if ( function_exists( 'get_product_search_form' ) ) {
					get_product_search_form( true );
				} else {
					get_search_form();
				}
			} else {
				get_search_form();
			}
		?>
	</div>
</div>