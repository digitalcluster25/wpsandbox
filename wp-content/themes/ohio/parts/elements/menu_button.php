<?php
	$header_button = OhioOptions::get( 'custom_button_for_header', false );
	$header_button_size = OhioOptions::get( 'custom_button_size' );
	$button_link = OhioOptions::get( 'custom_button_for_header_link' );
	$size_class = '';

	if ( $header_button_size ) {
		$size_class .= ' -' . $header_button_size;
	}
?>

<?php if ( $header_button ) : ?>

	<?php if ( $button_link ) : ?>
		<a href="<?php echo esc_url( $button_link['url'] ); ?>" class="button btn-optional<?php echo esc_attr( $size_class ); ?>" target="<?php echo esc_html( $button_link['target'] ); ?>">
			<?php echo esc_html( $button_link['title'] ); ?>
		</a>
	<?php endif; ?>

	<?php if ( have_rows( 'global_custom_button_extra', 'option' ) ) : ?>

		<?php while ( have_rows( 'global_custom_button_extra', 'option' ) ) : the_row(); ?>

			<?php
				$button_link = get_sub_field( 'button_extra_link', 'option' );
				if ( ! $button_link ) {
					continue;
				}

				$button_mobile_visibility = get_sub_field( 'button_mobile_visibility', 'option' );
				$mobile_visibility_class = '';
				if ( ! $button_mobile_visibility ) {
					$mobile_visibility_class = ' vc_hidden-xs vc_hidden-sm';
				}

				$button_type = get_sub_field( 'button_extra_type', 'option' );
				if ( $button_type ) {

					$extra_classes = $size_class;

					switch ( $button_type ) {
						case 'default':
							$extra_classes .= '';
							break;
						case 'outlined':
							$extra_classes .= ' -outlined';
							break;
						case 'flat':
							$extra_classes .= ' -flat';
							break;
						case 'text':
							$extra_classes .= ' -text';
							break;
					}
				}
			?>

			<a href="<?php echo esc_url( $button_link['url'] ); ?>" class="button btn-optional<?php echo esc_attr( $extra_classes . $mobile_visibility_class ); ?>" target="<?php echo esc_html( $button_link['target'] ); ?>">
				<?php echo esc_html( $button_link['title'] ); ?>
			</a>

		<?php endwhile; ?>

	<?php endif; ?>

<?php endif; ?>
