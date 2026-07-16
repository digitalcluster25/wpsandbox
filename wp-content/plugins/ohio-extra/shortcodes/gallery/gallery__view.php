<?php

/**
* WPBakery Page Builder Ohio Gallery shortcode view
*/

?>
<div class="ohio-widget clb-gallery<?php echo esc_attr( $wrapper_classes ); ?>" id="<?php echo esc_attr( $wrapper_id ); ?>" <?php echo esc_attr( $animation_attrs ); ?>>

	<?php 
		if (is_front_page()) {
			$pagination_page = (get_query_var('page')) ? get_query_var('page') : 1;
		} else {
			$pagination_page = (get_query_var('paged')) ? get_query_var('paged') : 1;
		}

		$items_per_page = intval( $pagination_items_per_page );
		$_image_start = 0;
		$_image_end = count( $gallery );
		$_gallery_item = 0;

		if ( $use_pagination ) {
			$_image_start = $_gallery_item = $pagination_page * $items_per_page - $items_per_page;
			$_image_end = count( $gallery );

			if ( $pagination_type == 'simple' || $pagination_type == 'standard') {
				$_gallery_item = 0;
			}

			if ( $_image_end > $_image_start + $items_per_page ) {
				$_image_end = $_image_start + $items_per_page;
			}
		}
	?>

	<div
		class="vc_row<?php if ( $masonry_grid ) { echo ' ohio-masonry'; } ?>"
		data-lazy-container="gallery"
		data-masonry-alignment="<?php echo $masonry_grid_alignment ?>"
	>

		<?php for ( $_image_i = $_image_start; $_image_i < $_image_end; $_image_i++, $_gallery_item++ ) : ?>

		<?php $image = $gallery[ $_image_i ]; ?>
	
		<div class="masonry-block gallery-item card cursor-as-pointer<?php echo esc_attr( $column_class . $grid_classes ); ?>" data-gallery-item="<?php echo $_gallery_item; ?>" data-lazy-item="" data-lazy-scope="gallery">
			<div class="image-holder cursor-plus" data-cursor-class="cursor-link" <?php echo esc_attr($tilt_attrs); ?>>
			    <img class="gimg gallery-archive-image hidden-image" src="<?php echo ($image['full']) ? $image['full'] : '#'; ?>" alt="<?php echo ( $image['alt']) ?  $image['alt'] : 'Alt'; ?>">

			    <?php if ( $gallery_grid == 'minimal' && $show_title ) : ?>
				    <div class="overlay-details -fade-up">
				        <div class="heading">
				            <h5 class="title"><?php echo esc_html($image['title']); ?></h5>
				        </div>
				    </div>
			    <?php endif; ?>

			</div>

			<?php if ( $show_title ) : ?>
				<div class="card-details">
				    <div class="heading">
				        <h5 class="title"><?php echo esc_html($image['title']); ?></h5>
				        <p class="caption -unspace -small-t"><?php echo esc_html($image['caption']); ?></p>
				    </div>
				</div>
			<?php endif; ?>

		</div>

		<?php endfor; ?>

	</div>

	<?php
		if ( $use_pagination ) {
			$pages_count = ceil( count( $gallery ) / $items_per_page );
			
			if ( $pagination_type == 'standard' ) {

				OhioLayout::the_paginator_layout( $pagination_page, $pages_count, $pagination_position, $pagination_style, $pagination_size );

			} elseif ( $pagination_type == 'lazy_scroll' ) {

				echo '<div class="lazy-load loading ' . implode( ' ', $additional_classes ) . '" data-lazy-load="scroll" ';
					echo 'data-lazy-pages-count="' . esc_attr( $pages_count ) . '" ';
					echo 'data-lazy-load-shortcode="' . esc_attr( $shortcode ) . '" ';
					echo 'data-lazy-load-params="' . esc_attr( $sc64 ) . '" ';
					echo 'data-lazy-load-rest="' . esc_url( get_rest_url( null, 'wp/v2/ohio_lazy_load_shortcodes' ) ) . '" ';
					echo 'data-lazy-load-scope="gallery">';
					echo '<button class="button -pagination ' . implode( ' ', $style_class ) . '">';
						echo '<span class="loading-text">' . esc_html__( 'Loading', 'ohio-extra' ) . '</span>';
					echo '</button>';
				echo '</div>';

			} elseif ( $pagination_type == 'lazy_button' ) {

				echo '<div class="lazy-load load-more ' . implode( ' ', $additional_classes ) . '" data-lazy-load="click" ';
					echo 'data-lazy-pages-count="' . esc_attr( $pages_count ) . '" ';
					echo 'data-lazy-load-shortcode="' . esc_attr( $shortcode ) . '" ';
					echo 'data-lazy-load-params="' . esc_attr( $sc64 ) . '" ';
					echo 'data-lazy-load-rest="' . esc_url( get_rest_url( null, 'wp/v2/ohio_lazy_load_shortcodes' ) ) . '" ';
					echo 'data-lazy-load-scope="gallery">';
					echo '<button class="button -pagination ' . implode( ' ', $style_class ) . '">';
						echo '<span class="loadmore-text">' . esc_html__( 'Load More', 'ohio-extra' ) . '</span>';
						echo '<span class="loading-text">' . esc_html__( 'Loading', 'ohio-extra' ) . '</span>';
					echo '</button>';
				echo '</div>';
			}
		}
	?>

</div>

<?php
	ob_start();
?>

<div class="clb-popup ohio-gallery-opened-sc clb-gallery-lightbox" id="<?php echo esc_attr( $wrapper_gallery_id ); ?>" data-options='<?php echo $gallery_json; ?>'>
	<div class="close-bar">
	    <button class="icon-button -light" data-js="close-popup" aria-label="<?php esc_html_e( 'Close', 'ohio' ); ?>">
		    <i class="icon">
		    	<svg class="default" width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg"><path d="M14 1.41L12.59 0L7 5.59L1.41 0L0 1.41L5.59 7L0 12.59L1.41 14L7 8.41L12.59 14L14 12.59L8.41 7L14 1.41Z"></path></svg>
		    </i>
		</button>
	</div>
    <div class="clb-popup-holder"></div>
</div>

<?php
	OhioLayout::append_to_footer_buffer_content( ob_get_clean() );
