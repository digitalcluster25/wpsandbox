<?php
	$footer_is_visible = OhioOptions::get( 'page_footer_visibility', true );
	$footer_color_scheme = OhioOptions::get( 'page_footer_fixed_typography_color', false );
	$copyright_is_visible = OhioOptions::get( 'page_footer_copyright_visibility', true );
	$scroll_to_top_visibility = OhioOptions::get( 'page_show_arrow', true );
	$scroll_to_top_position = OhioOptions::get( 'page_arrow_position', 'left' );
	$color_switcher_visibility = OhioOptions::get( 'page_dark_mode_switcher', false );
	$color_switcher_position = OhioOptions::get( 'page_dark_mode_switcher_position', 'left' );
	$project_layout_type = OhioOptions::get( 'project_layout_type' );

	if ( !$footer_is_visible && !$copyright_is_visible ) return; // exit if not visible

	$copyright_alignment = OhioOptions::get_global( 'footer_copyright_alignment', 'left_and_right' );
	$copyright_text_left = OhioOptions::get_global( 'footer_copyright_left' );
	$copyright_text_right = OhioOptions::get_global( 'footer_copyright_right' );
	$copyright_text_center = OhioOptions::get_global( 'footer_copyright_center' );
	$footer_background_text = OhioOptions::get( 'page_footer_background_text' );
	$footer_background_text_align = OhioOptions::get( 'page_footer_background_text_align' );

	if ( !$copyright_text_right && !$copyright_text_left ) {
		$copyright_text_left = '&copy; [ohio_current_year], [ohio_site_name]. Made with passion by <a target="_blank" href="https://clbthemes.com/">Colabrio</a>';
		$copyright_text_right = '<a target="_blank" href="#">Privacy & Cookie Policy</a> | <a target="_blank" href="#">Terms of Service</a>';
	}

	$footer_widgets_count = 0;
	if ( is_active_sidebar( 'ohio-sidebar-footer-1' ) ) { 
		$footer_widgets_count++; 
	}
	if ( is_active_sidebar( 'ohio-sidebar-footer-2' ) ) { 
		$footer_widgets_count++; 
	}
	if ( is_active_sidebar( 'ohio-sidebar-footer-3' ) ) { 
		$footer_widgets_count++; 
	}
	if ( is_active_sidebar( 'ohio-sidebar-footer-4' ) ) { 
		$footer_widgets_count++; 
	}

	$footer_classes = [ 'site-footer' ];
	if ( OhioOptions::get( 'page_footer_is_sticky', false ) ) {
		$footer_classes[] = 'sticky';
	}

	if ( $footer_color_scheme ) {
		$footer_classes[] = 'clb__dark_section';
	} else {
	  	$footer_classes[] = 'clb__light_section';
	}

	$page_container_classes = [ 'page-container' ];
	if ( !OhioOptions::get( 'page_footer_is_wrapped', true ) ) {
		$page_container_classes[] = '-full-w';
	}

?>
<footer id="colophon" class="<?php echo esc_attr( implode( ' ', $footer_classes ) ); ?>">

	<?php if ( $footer_is_visible && $footer_widgets_count > 0 ) : ?>

	<div class="<?php echo esc_attr( implode( ' ', $page_container_classes ) ); ?>">
		<div class="widgets vc_row">

			<?php if ( is_active_sidebar( 'ohio-sidebar-footer-1' ) ) : ?>
				<div class="vc_col-md-<?php echo esc_attr( intval( 12 / $footer_widgets_count ) ); ?> vc_col-sm-6 widgets-column">
					<ul><?php dynamic_sidebar( 'ohio-sidebar-footer-1' ); ?></ul>
				</div>
			<?php endif; ?>

			<?php if ( is_active_sidebar( 'ohio-sidebar-footer-2' ) ) : ?>
				<div class="vc_col-md-<?php echo esc_attr( intval( 12 / $footer_widgets_count ) ); ?> vc_col-sm-6 widgets-column">
					<ul><?php dynamic_sidebar( 'ohio-sidebar-footer-2' ); ?></ul>
				</div>
			<?php endif; ?>

			<?php if ( is_active_sidebar( 'ohio-sidebar-footer-3' ) ) : ?>
				<div class="vc_col-md-<?php echo esc_attr( intval( 12 / $footer_widgets_count ) ); ?> vc_col-sm-6 widgets-column">
					<ul><?php dynamic_sidebar( 'ohio-sidebar-footer-3' ); ?></ul>
				</div>
			<?php endif; ?>

			<?php if ( is_active_sidebar( 'ohio-sidebar-footer-4' ) ) : ?>
				<div class="vc_col-md-<?php echo esc_attr( intval( 12 / $footer_widgets_count ) ); ?> vc_col-sm-6 widgets-column">
					<ul><?php dynamic_sidebar( 'ohio-sidebar-footer-4' ); ?></ul>
				</div>
			<?php endif; ?>
		</div>
	</div>

	<?php if ( !empty( $footer_background_text ) ) : ?>
						
		<div class="<?php echo esc_attr( implode( ' ', $page_container_classes ) ); ?>">
			<div class="site-footer-text -<?php echo esc_attr( $footer_background_text_align ); ?>">
				<p class="-unspace">
					<?php echo esc_html( $footer_background_text ); ?>
				</p>
			</div>
		</div>

	<?php endif; ?>

	<?php endif; ?>

	<?php if ( 
		$scroll_to_top_visibility && $scroll_to_top_position == 'bottom_left'
		|| $scroll_to_top_visibility && $scroll_to_top_position == 'bottom_right'
		|| $color_switcher_visibility && $color_switcher_position == 'bottom_left'
		|| $color_switcher_visibility && $color_switcher_position == 'bottom_right' ) : 
		?>

		<div class="<?php echo esc_attr( implode( ' ', $page_container_classes ) ); ?>">
			<div class="vc_row holder">
				<div class="vc_col-md-6 vc_col-xs-6 -left-bar">
					<?php if ( $scroll_to_top_position == 'bottom_left' ) : ?>
						<?php get_template_part( 'parts/elements/scroll_top' ); ?>
					<?php endif; ?>

					<?php if ( $color_switcher_position == 'bottom_left' ) : ?>
						<?php get_template_part( 'parts/elements/light_dark_switcher' ); ?>
					<?php endif; ?>
				</div>
				<div class="vc_col-md-6 vc_col-xs-6 -right-bar">
					<?php if ( $scroll_to_top_position == 'bottom_right' ) : ?>
						<?php get_template_part( 'parts/elements/scroll_top' ); ?>
					<?php endif; ?>

					<?php if ( $color_switcher_position == 'bottom_right' ) : ?>
						<?php get_template_part( 'parts/elements/light_dark_switcher' ); ?>
					<?php endif; ?>
				</div>
			</div>
		</div>

	<?php endif; ?>

	<?php if ( $copyright_is_visible ) : ?>

		<div class="site-footer-copyright">
			<div class="<?php echo esc_attr( implode( ' ', $page_container_classes ) ); ?>">
				<div class="vc_row">
					<div class="vc_col-md-12">
						<?php if ( $copyright_alignment == 'center' ) : ?>
							<div class="holder -center">
								<?php echo wp_kses( do_shortcode( $copyright_text_center ), 'post' ); ?>
							</div>
						<?php else : ?>
							<div class="holder">
								<div class="-left">
									<?php echo wp_kses( do_shortcode( $copyright_text_left ), 'post' ); ?>
								</div>
								<div class="-right">
									<?php echo wp_kses( do_shortcode( $copyright_text_right ), 'post' ); ?>
								</div>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>

	<?php endif; ?>
</footer>