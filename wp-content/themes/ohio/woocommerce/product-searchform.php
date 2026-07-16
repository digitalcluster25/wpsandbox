<?php
/**
 * The template for displaying product search form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/product-searchform.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$action = get_permalink( wc_get_page_id('shop') );
$current_term = 0;
if (is_tax('product_cat')) {
    $current_term = get_queried_object_id();
    $action = get_term_link($current_term, 'product_cat');
}
?>

<form role="search" method="get" class="search search-woocommerce woocommerce-product-search" action="<?php echo esc_url($action) ?>">
	<label>
		<span class="screen-reader-text"><?php esc_html_e( 'Search for', 'ohio' ) . ':'; ?></span>
		<input type="search" id="woocommerce-product-search-field-<?php echo isset( $index ) ? absint( $index ) : 0; ?>" class="search-field" placeholder="<?php echo esc_attr__( 'Search...', 'ohio' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />

		<?php
		$names = get_terms('product_cat', 'fields=id=>name');
		?>
	</label>
	<select name="search_term" aria-label="<?php esc_html_e( 'Categories', 'ohio' ); ?>">
		<option value=""><?php esc_html_e( 'Category', 'ohio' ); ?></option>
		<?php foreach ($names as $id => $name) { ?>
			<option value="<?php echo esc_attr( $id ) ?>"<?php echo selected($id, $current_term) ?>><?php echo esc_attr( $name ) ?></option>
		<?php } ?>
	</select>
	<button class="button -text search search-submit <?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ); ?>" aria-label="<?php esc_html_e( 'Search', 'ohio' ); ?>">
        <i class="icon -right">
        	<svg class="default" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m779-128.5-247.979-248Q501.5-352.5 463-339.25T381.658-326q-106.132 0-179.645-73.454t-73.513-179.5Q128.5-685 201.954-758.5q73.454-73.5 179.5-73.5T561-758.487q73.5 73.513 73.5 179.645 0 42.842-13.5 81.592T584-429l248 247.5-53 53ZM381.5-401q74.5 0 126.25-51.75T559.5-579q0-74.5-51.75-126.25T381.5-757q-74.5 0-126.25 51.75T203.5-579q0 74.5 51.75 126.25T381.5-401Z"/></svg>
        </i>
	</button>
	<input type="hidden" name="post_type" value="product" />
</form>
<div class="search-results"></div>