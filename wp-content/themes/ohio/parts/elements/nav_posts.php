<?php
	// Settings
	$prev_post = get_adjacent_post( false, '', false );
	$next_post = get_adjacent_post( false, '', true );

	$first_post = get_posts( array( 'numberposts' => 1) );

	if (!$next_post) $next_post = $first_post[0];

	$toggle_post_column = ( !empty( $prev_post ) && !empty( $next_post ) ) ? '6' : '12';

	$show_prev_n_next = OhioOptions::get( 'post_previous_n_next_visibility', true );

	if ( ( $prev_post || $next_post ) && $show_prev_n_next ) :
?>

<a href="<?php echo esc_url( get_permalink( $next_post ) ); ?>" data-js="sticky-nav" class="sticky-nav -unlink -fade-up">
	<div class="sticky-nav-thumbnail"
		<?php 
			$next_image_thumb = get_the_post_thumbnail_url( $next_post, 'medium_large' );
			if ( $next_image_thumb) {
				echo 'style="background-image: url(\'' . $next_image_thumb . '\');"';
			}
		?>
		>
	</div>
	<div class="sticky-nav-holder">
		<div class="heading">
			<div class="subtitle">
				<?php esc_html_e( 'Next Post', 'ohio' ); ?>
			</div>
			<h5 class="title">
				<?php
					$next_title = get_the_title( $next_post->ID );
					if ( empty( $next_title ) ) {
						echo wp_kses( '[' . get_the_date( false, $next_post->ID ) . ']', 'default' );
					} else {
						echo wp_kses( $next_title, 'default' );
					}
				?>
			</h5>
		</div>
	</div>
</a>
<?php endif; ?>