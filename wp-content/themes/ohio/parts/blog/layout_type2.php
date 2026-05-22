<?php

# Post settings
$show_breadcrumbs = OhioOptions::get( 'page_breadcrumbs_visibility', true );
$page_headline = OhioOptions::get( 'page_header_title' );
$show_headline = OhioOptions::get( 'page_header_title_visibility', true );
$sidebar_position = OhioOptions::get( 'page_sidebar_position', 'without' );
$sidebar_layout = OhioOptions::get( 'page_sidebar_layout', 'default' );
$sharing = OhioOptions::get( 'post_social_visibility', true );
$sharing_networks = OhioOptions::get( 'post_sharing_networks' );

$post_classes = '';
if ( $page_headline['background_type'] != 'inherit' ) {
    $post_classes .= ' -with-featured-image';
}
if ( $show_breadcrumbs ) {
    $post_classes .= ' -with-breadcrumbs';
}
if ( $sharing && isset( $sharing_networks ) ) {
    $post_classes .= ' -with-sharing';
}

$sidebar_class = '';
if ( $sidebar_layout ) {
    $sidebar_class .= ' -' . $sidebar_layout;
}

$sidebar_row_class = '';
if ( $sidebar_position == 'right' ) {
    $sidebar_row_class .= ' -with-right-sidebar';
} elseif ( $sidebar_position == 'left' ) {
    $sidebar_row_class .= ' -with-left-sidebar';
}

$page_container_classes = '';
if ( ! $show_breadcrumbs && $show_headline ) {
    $page_container_classes .= ' top-offset';
}
// if ( ! $wrap_container ) {
//     $page_container_classes .= ' -full-w';
// }

?>

<div class="single-post-layout -layout2<?php echo esc_attr( $post_classes ); ?>">
    <div class="single-post-inner">
        <div class="-sticky-block page-headline-holder vc_col-lg-6">

            <?php get_template_part( 'parts/elements/page_headline' ); ?>

        </div>
        <div class="page-container post-page-container vc_col-lg-6<?php echo esc_attr( $page_container_classes ); ?>">
            <div class="post-share -sticky-block" >
                <?php 
                    if ( $sharing ) {
                        do_shortcode( '[ohio_share_blog]' );
                    }
                ?>
            </div>
            <div class="holder">

                <?php get_template_part( 'parts/elements/breadcrumbs' ); ?>
            
                <?php if ( is_active_sidebar( 'ohio-sidebar-blog' ) && $sidebar_position == 'left' ) : ?>
                    <div class="page-sidebar -left<?php echo esc_attr( $sidebar_class ); ?>">
                        <aside id="secondary" class="widgets">
                            <?php dynamic_sidebar( 'ohio-sidebar-blog' ); ?>
                        </aside>
                    </div>
                <?php endif; ?>

                <div class="page-content<?php echo esc_attr( $sidebar_row_class ); ?>">
                    <div id="primary" class="content-area">
                        <main id="main" class="site-main page-offset-bottom">
                            <div class="vc_row">
                                <div class="vc_col-lg-12">
                                <?php get_template_part( 'parts/content', get_post_format() ); ?>
                                </div>
                            </div>
                        </main>
                    </div>
                </div>

                <?php if ( is_active_sidebar( 'ohio-sidebar-blog' ) && $sidebar_position == 'right' ) : ?>
                    <div class="page-sidebar sidebar-right<?php echo esc_attr( $sidebar_class ); ?>">
                        <aside id="secondary" class="widgets">
                            <?php dynamic_sidebar( 'ohio-sidebar-blog' ); ?>
                        </aside>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
</div>
