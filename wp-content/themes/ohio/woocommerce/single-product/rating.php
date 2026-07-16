<?php
/**
 * Single Product Rating
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/rating.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

global $product;

if ( ! wc_review_ratings_enabled() ) {
	return;
}

$rating_count              = $product->get_rating_count();
$review_count              = $product->get_review_count();
$average                   = $product->get_average_rating();
$recommendation_percentage = 0;
global $wpdb;

if ( $review_count > 0 ) {
	$recommend_threshold = 4;
	$recommended_count = $wpdb->get_results( 
		$wpdb->prepare( "SELECT COUNT(*) as count FROM $wpdb->comments JOIN $wpdb->commentmeta ON $wpdb->comments.comment_ID = $wpdb->commentmeta.comment_id WHERE comment_post_ID = %d AND comment_approved = 1 AND comment_type = 'review' AND $wpdb->commentmeta.meta_key = 'rating' AND $wpdb->commentmeta.meta_value + 0 >= %d", $product->get_id(), $recommend_threshold ) 
	)[0]->count;
	
	$recommendation_percentage = ( $recommended_count / $review_count ) * 100;
}

if ( $rating_count > 0 ) : ?>

	<div class="woocommerce-product-rating" itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
		<?php if ( $recommendation_percentage > 0 ) : ?>
			<p class="caption -unspace">
				<?php printf( esc_html__( '%d%% Customers Recommended', 'ohio' ), $recommendation_percentage ); ?>
			</p>
		<?php endif; ?>
		<div class="holder -flex">
			<div class="star-rating" title="<?php printf( esc_attr__( 'Rated %s out of 5', 'ohio' ), $average ); ?>">
				<span style="width:<?php echo ( ( $average / 5 ) * 100 ); ?>%">
					<strong itemprop="ratingValue" class="rating"><?php echo esc_html( $average ); ?></strong> <?php printf( esc_html__( 'out of %1$s5%2$s', 'ohio' ), '<span itemprop="bestRating">', '</span>' ); ?>
					<?php printf( _n( 'based on %s customer rating', 'based on %s customer ratings', $rating_count, 'ohio' ), '<span itemprop="ratingCount" class="rating">' . $rating_count . '</span>' ); ?>
				</span>
			</div>
			<span class="average"><?php echo esc_html( $average ); ?></span>

			<?php if ( comments_open() ) : ?>
				<a href= "#" class="woo-review-link -unlink" rel="nofollow">
					<?php
						printf( _n( '%s', '%s', $review_count, 'ohio' ), '<span itemprop="reviewCount" class="count">' . $review_count . '</span>' );

						if ( intval( $review_count > 1 ) ) {
							echo ' ', esc_attr_e( 'Reviews', 'ohio' );
						}
						else {
							echo ' ', esc_attr_e( 'Review', 'ohio' );
						}
					?>
				</a>
			<?php endif; ?>
		</div>
	</div>

<?php endif; ?>
