<?php
/**
 * Ohio WordPress Theme
 *
 * Error 404 page template
 *
 * @author Colabrio
 * @link   https://ohio.clbthemes.com
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Get theme options

$header_type = OhioOptions::get( 'page_header_menu_style', 'style1' );
$wrapper_boxed = OhioOptions::get( 'page_use_boxed_wrapper', false ) && !OhioSettings::is_coming_soon_page();
$show_footer = !OhioHelper::is_optimized_flow( 'footer' ) && !OhioSettings::is_coming_soon_page();
$search_visible = OhioOptions::get( 'page_header_search_visibility', true ) && !OhioSettings::is_coming_soon_page();

OhioOptions::get( 'page_header_search_visibility' ); // trigger selection chain
$style_settings_select_type = OhioOptions::get_last_select_type();
$search_position = OhioOptions::get_by_type( 'page_header_search_position', $style_settings_select_type );

?>

			</div>
			<?php
				if ( function_exists( 'elementor_theme_do_location' ) ) {
					$elementor_footer = elementor_theme_do_location( 'footer' );
					$show_footer = $show_footer && ! $elementor_footer;
				}
			?>

			<?php 
				if ( $show_footer ) {
					get_template_part( 'parts/elements/footer' );
				}
			?>

			<?php if ( $search_position == 'fixed' ) : ?>

			<div class="search-holder vc_hidden-xs">
				<?php get_template_part( 'parts/elements/search' ); ?>
			</div>

			<?php endif; ?>
		</div>

	<?php if ( $header_type == 'style6' ) : ?>

		</div>

	<?php endif; ?>

	<?php if ( $wrapper_boxed ) : ?>

		</div>

	<?php endif; ?>

	<?php get_template_part( 'parts/elements/notification' ); ?>
	<?php get_template_part( 'parts/elements/preloader' ); ?>
	<?php get_template_part( 'parts/elements/popup' ); ?>
	<?php get_template_part( 'parts/elements/subscribe_container' ); ?>

	<?php 
		if ( $search_visible ) {
			get_template_part( 'parts/elements/search_form' );
		}
	?>

	<?php
		// Some dynamic code place: popups, client JS, snippets...
		OhioLayout::get_footer_buffer_content( true );
		//OhioBuffer::stop_content_bufferization();
		OhioHelper::calculate_custom_fonts_inline();
		OhioLayout::show_shortcodes_inline_css(); // Include collected dynamic CSS to head
		//OhioBuffer::get_content_buffer(); // Return the rest of page code

		wp_footer();

		do_action( 'ohio_additional_page_layout', 10, 0 );
	?>

	</body>
</html>