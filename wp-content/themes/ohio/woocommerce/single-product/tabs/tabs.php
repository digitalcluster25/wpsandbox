<?php
/**
 * Single Product tabs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/tabs.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.8.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Filter tabs and allow third parties to add their own.
 *
 * Each tab is an array containing title, callback and priority.
 *
 * @see woocommerce_default_product_tabs()
 */
$product_tabs = apply_filters( 'woocommerce_product_tabs', array() );

$wrap_container = OhioOptions::get( 'page_add_wrapper', true );
$wrap_container_class = '';
if ( ! $wrap_container ) {
	$wrap_container_class .= ' -full-w';
}

if ( ! empty( $product_tabs ) ) : ?>

	<div class="woocommerce single-product-tabs">
		<div class="page-container<?php echo esc_attr( $wrap_container_class ); ?>">
			<div class="tabs" data-ohio-tabs="true" data-options="[]">
				<ul class="tabs-nav -unlist titles-typo title" role="tablist">
					<li class="tabs-nav-line" role="tab"></li>
					<?php
		                $i = 0;
		                foreach ( $product_tabs as $key => $product_tab ) : ?>
		                    <li class="tabs-nav-link <?php echo esc_attr( $i == 0 ? 'active ' : '' ) . esc_attr( $key ); ?>_tab" id="tab-title-<?php echo esc_attr( $key ); ?>" data-ohio-tab="<?php echo esc_attr( $key ) ?>" role="tab">
		                        <div class="title titles-typo"<?php if ( $product_tab['callback'] == 'comments_template' ) { echo ' id="accordion-reviews"'; } ?>>
		                            <?php echo wp_kses_post( apply_filters( 'woocommerce_product_' . $key . '_tab_title', $product_tab['title'], $key ) ); ?>
		                        </div>
		                    </li>
	                <?php
		                $i++;
		                endforeach; ?>
				</ul>
				<div class="tabs-content">
					<?php
					$i = 0;
					foreach ( $product_tabs as $key => $product_tab ) : ?>
						<div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--<?php echo esc_attr( $key ); ?> panel entry-content wc-tab tabs-content-item<?php echo esc_attr( $i == 0 ? ' active' : '' ); ?>" data-ohio-tab-content="<?php echo esc_attr( $key )?>" id="tab-<?php echo esc_attr( $key ); ?>" role="tabpanel" aria-labelledby="tab-title-<?php echo esc_attr( $key ); ?>">
							<div class="wrap">
								<?php
								if ( isset( $product_tab['callback'] ) ) {
									call_user_func( $product_tab['callback'], $key, $product_tab );
								}
								?>
							</div>
						</div>
					<?php
					$i++;
					endforeach; ?>

					<?php do_action( 'woocommerce_product_after_tabs' ); ?>
				</div>
			</div>
		</div>
	</div>

<?php endif; ?>