<?php
	// Settings
	$prev_post = get_adjacent_post( false, '', false );
	$next_post = get_adjacent_post( false, '', true );
	if (!$next_post) $next_post = $prev_post;

	$show_prev_n_next = OhioOptions::get( 'woocommerce_product_navigation', true );
	if ( ( $prev_post || $next_post ) && $show_prev_n_next ) :
?>

<a href="<?php echo esc_url( get_permalink( $next_post ) ); ?>" data-js="sticky-nav-product" class="sticky-nav -unlink">
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
				<?php esc_html_e( 'Next Product', 'ohio' ); ?>
			</div>
			<h5 class="title">
				<?php
					$next_title = get_the_title( $next_post->ID );
					if ( empty( $next_title ) ) {
						echo esc_html( '[' . get_the_date( false, $next_post->ID ) . ']' );
					} else {
						echo esc_html( $next_title );
					}
				?>
			</h5>
		</div>
	</div>
</a>
<?php endif; ?>