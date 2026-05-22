<?php
    // Settings
    $menu_type = OhioOptions::get( 'page_header_menu_type', 'full' );
    $have_woocomerce = function_exists( 'WC' );
    $have_woocomerce_wl = function_exists( 'YITH_WCWL' );
    $have_wpml = function_exists( 'icl_get_languages' );
    $wpml_show_in_header = OhioOptions::get_global( 'wpml_show_in_header', true );
    $mobile_menu_position = OhioOptions::get_global( 'page_mobile_header_menu_position', 'left' );
    $dropdown_carets_visibility = OhioOptions::get_global( 'page_header_counters_visibility', true );
    $social_icons_mobile = OhioOptions::get_global( 'page_mobile_social_networks_visibility', true );
    $mobile_menu = OhioOptions::get_global( 'page_extended_mobile_menu' );
    $mobile_second_click_link = OhioOptions::get_global( 'page_mobile_second_click_link', false );
    $copyright_text_left = OhioOptions::get_global( 'footer_copyright_left' );
    $copyright_text_right = OhioOptions::get_global( 'footer_copyright_right' );
    $mobile_menu_details = OhioOptions::get_global( 'page_mobile_header_menu_details' );
    $search_visible_mobile = OhioOptions::get( 'page_mobile_search_visibility', false );
    $multilevel_indicators = OhioOptions::get( 'page_header_indicator_visibility', true );
    $menu_highlighted = OhioOptions::get( 'page_header_active_menu_highlight', true );
    $menu_images_mobile_visibility = OhioOptions::get( 'page_mobile_menu_items_image', false );
    $menu_description_mobile_visibility = OhioOptions::get( 'page_mobile_menu_items_description', false );

    $site_navigation_class = '';
    if ( $menu_type == 'hamburger' ) {
        $site_navigation_class .= ' hidden';
    }
    if ( $mobile_menu_position == 'right' ) {
        $site_navigation_class .= ' slide-right';
    }
    if ( $dropdown_carets_visibility ) {
        $site_navigation_class .= ' with-counters';
    }
    if ( $mobile_menu ) {
        $site_navigation_class .= ' with-mobile-menu';
    }
    if ( $multilevel_indicators ) {
        $site_navigation_class .= ' with-multi-level-indicators';
    }
    if ( $menu_highlighted ) {
        $site_navigation_class .= ' with-highlighted-menu';
    }
    if ( ! $menu_images_mobile_visibility ) {
        $site_navigation_class .= ' hide-mobile-menu-images';
    }
    if ( ! $menu_description_mobile_visibility ) {
        $site_navigation_class .= ' hide-mobile-menu-descriptions';
    }
?>

<nav id="site-navigation" class="nav<?php echo esc_attr( $site_navigation_class ); ?>" data-mobile-menu-second-click-link="<?php echo esc_attr( $mobile_second_click_link ); ?>">

    <div class="slide-in-overlay menu-slide-in-overlay">
        <div class="overlay"></div>
        <div class="close-bar">
            <button class="icon-button -overlay-button" data-js="close-popup" aria-label="<?php esc_html_e( 'Close', 'ohio' ); ?>">
                <?php get_template_part( 'parts/elements/icon_close' ); ?>
            </button>

            <?php if ( ! $search_visible_mobile ) {
                get_template_part( 'parts/elements/search' );
            } ?>

        </div>
        <div class="holder">
            <div id="mega-menu-wrap" class="nav-container">

                <?php
                    $menu = OhioOptions::get_global( 'page_extended_menu' );

                    if ( $menu ) {
                        $menu_exists = false;
                        $available_menus = wp_get_nav_menus();

                        foreach ( $available_menus as $available_menu) {

                            if ( $menu == $available_menu->term_id) {
                                $menu_exists = true;
                                break;
                            }
                        }

                        if ( !$menu_exists ) {
                            $menu = false;
                        }
                    }

                    if ( $menu ) {
                        wp_nav_menu( [ 'menu' => $menu, 'menu_id' => 'menu-primary' ] );
                    } else {
                        if ( has_nav_menu( 'primary' ) ) {
                            wp_nav_menu( [ 'theme_location' => 'primary', 'menu_id' => 'menu-primary' ] );
                        } else {
                            echo '<a href="' . esc_url( home_url( '/' ) ) . 'wp-admin/nav-menus.php" class="menu-blank button -outlined" target="_blank" id="menu-primary">' . esc_html__( 'Please, assign a menu', 'ohio' ) . ' <i class="icon -right"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up-right-square" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm5.854 8.803a.5.5 0 1 1-.708-.707L9.243 6H6.475a.5.5 0 1 1 0-1h3.975a.5.5 0 0 1 .5.5v3.975a.5.5 0 1 1-1 0V6.707l-4.096 4.096z"/></svg></i></a>';
                        }
                    }

                    if ( $mobile_menu ) {
                        wp_nav_menu( [ 'menu' => $mobile_menu, 'menu_id' => 'mobile-menu', 'menu_class' => 'mobile-menu menu' ] );
                    }
                ?>



            </div>
            <div class="copyright">

                <?php
                    if ( empty( $mobile_menu_details ) ) {
                        if ( $copyright_text_left ) {
                            echo '<p>' . wp_kses( do_shortcode( $copyright_text_left ), 'post' ) . '</p>';
                        }

                        if ( $copyright_text_right ) {
                            echo '<p>' . wp_kses( do_shortcode( $copyright_text_right ), 'post' ) . '</p>';
                        }
                    } else {
                        echo '<p>' . wp_kses( do_shortcode( $mobile_menu_details ), 'post' ) . '</p>';
                    }
                ?>

            </div>

            <?php get_template_part( 'parts/elements/lang_dropdown' ); ?>
        </div>

        <?php if ( $social_icons_mobile ) {
            get_template_part( 'parts/elements/social_bar' );
        } ?>

    </div>
</nav>
