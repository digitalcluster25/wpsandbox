<?php
    // Settings
    $show_subheader = OhioSettings::subheader_is_displayed();
    $mobile_hamburger_position = OhioOptions::get_global( 'page_header_mobile_menu_position', 'left' );
    $menu_type = OhioOptions::get( 'page_header_menu_type', 'full' );
    $header_dynamic_typo = OhioOptions::get( 'page_header_dynamic_typography_color', false );
    $header_fixed = OhioOptions::get( 'page_header_fixed_position', false );
    $header_sticky_mobile = OhioOptions::get_global( 'page_header_mobile_sticky' );

    if ( ! $header_fixed ) {
        $header_sticky_initial_offset = OhioOptions::get_global( 'page_header_sticky_initial_offset' );

        $header_sticky_attr = '';
        if ( $header_sticky_mobile ) {
            $header_sticky_attr .= ' data-mobile-header-fixed=true';
        }
        if ( $header_sticky_initial_offset ) {
            $header_sticky_attr .= ' data-fixed-initial-offset=' . $header_sticky_initial_offset . '';
        }
    }

    $header_classes = '';
    if ( $header_sticky_mobile ) {
        $header_classes .= ' -sticky-with-dynamic-typo';
    }
    if ( $header_fixed ) { 
        $header_classes .= ' -fixed'; 
    }
    if ( $show_subheader ) {
        $header_classes .= ' subheader_included';
    }
    $header_classes .= ' mobile-hamburger-position-' . $mobile_hamburger_position .' hamburger-position-left';
    if ( $menu_type == 'both' ) {
        $header_classes .= ' both-types';
    }

    $dynamic_typo_class = '';
    if ( $header_dynamic_typo ) {
        $dynamic_typo_class = ' header-dynamic-typo';
    }
?>

<header id="masthead" class="header header-sidebar header-6<?php echo esc_attr( $header_classes ); ?>"<?php if ( ! $header_fixed ) { echo esc_attr( $header_sticky_attr ); } ?>>
    <div class="header-wrap">
        <div class="header-wrap-inner vertical-inner">
            <div class="top-part<?php echo esc_attr( $dynamic_typo_class ); ?>">
                <div class="top-part-inner -left">
					<?php get_template_part( 'parts/elements/menu_hamburger' ); ?>
                    <?php get_template_part( 'parts/elements/menu_nav' ); ?>
                    <?php get_template_part( 'parts/elements/menu_logo' ); ?>
                </div>
            </div>
            <div class="bottom-part">
                <?php get_template_part( 'parts/elements/menu_optional' ); ?>

                <?php if ( $mobile_hamburger_position == 'right') : ?>
                    <div class="mobile-hamburger -right">
                        <?php get_template_part( 'parts/elements/menu_hamburger' ); ?>
                    </div>
                <?php endif; ?>

                <div class="close-menu"></div>
            </div>
        </div>
    </div>
</header>

<?php get_template_part( 'parts/elements/menu_hamburger_fullscreen' ); ?>