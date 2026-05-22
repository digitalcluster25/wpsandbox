<?php
/**
 * Pagination - Show numbered pagination for catalog pages
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/pagination.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$total   = isset( $total ) ? $total : wc_get_loop_prop( 'total_pages' );
$current = isset( $current ) ? $current : wc_get_loop_prop( 'current_page' );
// $base    = isset( $base ) ? $base : esc_url_raw( str_replace( 999999999, '%#%', remove_query_arg( 'add-to-cart', get_pagenum_link( 999999999, false ) ) ) );
// $format  = isset( $format ) ? $format : '';

if ( $total <= 1 ) {
	return;
}

// Pagination
$pagination_type = OhioOptions::get( 'pagination_type', 'standard' );
$pagination_style = OhioOptions::get( 'pagination_style', 'default' );
$pagination_position = OhioOptions::get( 'pagination_position', 'left' );
$pagination_size = OhioOptions::get( 'pagination_size', 'medium' );
?>
<nav class="pagination text-<?php echo esc_attr( $pagination_position ); ?>">
	<?php OhioHelper::show_pagination( $pagination_type, $total, $current, $pagination_position, $pagination_style, $pagination_size, 'products' ); ?>
</nav>
