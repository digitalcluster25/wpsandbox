<?php
/**
 * Ohio WordPress Theme
 *
 * Search results page template
 *
 * @author Colabrio
 * @link   https://ohio.clbthemes.com
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$wrap_container = OhioOptions::get( 'page_add_wrapper', true );
$wrap_container_class = '';
if ( ! $wrap_container ) {
	$wrap_container_class .= ' -full-w';
}

get_template_part( 'parts/elements/page_headline' );

?>

<div class="page-container<?php echo esc_attr( $wrap_container_class ); ?>">
	<div class="empty-state">
		<h3 class="title">
			<?php esc_html_e( 'Sorry, but nothing matched your search terms.', 'ohio' ); ?>
		</h3>
		<p>
			<?php esc_html_e( 'Try using other search criteria', 'ohio' ); ?>
		</p>
		<?php get_search_form( true ); ?>
	</div>
</div>