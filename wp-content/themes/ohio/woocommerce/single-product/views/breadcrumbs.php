<?php
    if ( ! OhioOptions::get( 'page_breadcrumbs_visibility', true ) ) return;

    $delimiter_symbol = OhioOptions::get_global( 'breadcrumbs_separator' );
    if ( ! $delimiter_symbol ) {
        $delimiter_symbol = '<svg class="default" width="5" height="9" viewBox="0 0 9 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 14.5697L1.36504 16L9 8L1.36504 0L0 1.4303L6.26992 8L0 14.5697V14.5697Z"></path></svg>';
    }

    $category_in_breadcrumb = OhioOptions::get( 'page_show_category_breadcrumbs', true );
?>

<div class="breadcrumb-holder">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb -flex -flex-align-center -flex-just-start -flex-wrap -unlist" itemscope itemtype="http://schema.org/BreadcrumbList">
            <?php
				$breadcrumbs = (new WC_Breadcrumb())->generate();
				$breadcrumbs = $category_in_breadcrumb ? $breadcrumbs : [ $breadcrumbs[ count( $breadcrumbs ) - 1 ] ];
				$shop_page_id = wc_get_page_id( 'shop' );

				if ( $shop_page_id !== -1 ) {
					$shop_page_status = get_post_status( $shop_page_id );
					if ( $shop_page_status && $shop_page_status === 'publish' ) {
						array_unshift( $breadcrumbs, [ OhioSettings::breadcrumbs_woocommerce_slug(), get_permalink( $shop_page_id ) ] );
					}
				}

				$breadcrumb_count = count( $breadcrumbs );

				for( $i = 0; $i < $breadcrumb_count; $i++ ) {
					$breadcrumb = $breadcrumbs[ $i ];
					?>
						<li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
							<?php if ( $i > 0 ) echo $delimiter_symbol; ?>
							<?php
								if ( $i !== $breadcrumb_count - 1 ) :
							?>
								<a itemprop="item" class="-unlink" href="<?php echo esc_url( $breadcrumb[1] ); ?>">
									<span itemprop="name"><?php echo esc_html( $breadcrumb[0] ); ?></span>
								</a>
							<?php else: ?>
								<span itemprop="name" class="active"><?php echo esc_html( $breadcrumb[0] ); ?></span>
							<?php endif; ?>
							<meta itemprop="position" content="<?php echo esc_attr( $i + 1 ); ?>" />
						</li>
					<?php
				}
            ?>
        </ol>
    </nav>
</div>
