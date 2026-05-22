<?php
$have_wpml = function_exists( 'icl_get_languages' );
$wpml_show_in_header = OhioOptions::get_global( 'wpml_show_in_header', true );
$fullscreen_have_social = OhioOptions::get_global( 'page_hamburger_social_networks_visibility', true );
$fullscreen_have_lang = OhioOptions::get_global( 'page_hamburger_lang_switcher_visibility', true );
$menu_position = OhioOptions::get_global( 'page_header_menu_position', 'left', true );
$in_new_tab = OhioOptions::get_global( 'social_network_target_blank', true );
$links_target = ( $in_new_tab ) ? '_blank' : '_self';
$social_link_type = OhioOptions::get_global( 'page_hamburger_menu_social_networks_type', 'default', true );
$social_link_type_class = '';

if ( $social_link_type != 'default' ) {
	$social_link_type_class = '-'.$social_link_type;
}
?>

<div class="clb-popup hamburger-nav type2">
    <div class="close-bar<?php if ( $menu_position == 'right' ) { echo esc_attr( ' -flex-just-end' ); } ?>">
        <button class="icon-button -light" data-js="close-hamburger-menu" aria-label="<?php esc_html_e( 'Close', 'ohio' ); ?>">
		    <?php get_template_part( 'parts/elements/icon_close' ); ?>
		</button>
    </div>
    <div class="page-container">
        <div class="hamburger-nav-holder">
            <?php
	            $menu = OhioOptions::get_global( 'page_hamburger_menu' );

	            if ( is_nav_menu( $menu ) ) {
	                wp_nav_menu( [ 'menu' => $menu, 'menu_id' => 'secondary-menu' ] );
	            } else {
	                if ( has_nav_menu( 'primary' ) ) {
	                    wp_nav_menu( [ 'theme_location' => 'primary', 'menu_id' => 'secondary-menu' ] );
	                } else {
	                    echo '<a href="' . esc_url( home_url( '/' ) ) . 'wp-admin/nav-menus.php" class="menu-blank button -outlined" target="_blank" id="menu-primary">' . esc_html__( 'Please, assign a menu', 'ohio' ) . ' <i class="icon -right"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up-right-square" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm5.854 8.803a.5.5 0 1 1-.708-.707L9.243 6H6.475a.5.5 0 1 1 0-1h3.975a.5.5 0 0 1 .5.5v3.975a.5.5 0 1 1-1 0V6.707l-4.096 4.096z"/></svg></i></a>';
	                }
	            }
	        ?>
        </div>
        <div class="hamburger-nav-details">
			<?php if ( $have_wpml && $wpml_show_in_header && $fullscreen_have_lang ) : ?>
				<div class="details-column">
					<?php get_template_part( 'parts/elements/lang_dropdown' ); ?>
				</div>
			<?php endif; ?>

			<?php while ( have_rows( 'global_page_overlay_menu_footer_items_left', 'option' ) ): the_row(); ?>
				<div class="details-column">
					<?php echo wp_kses( get_sub_field( 'items' ), 'post' ); ?>
				</div>
			<?php endwhile; ?>

			<?php if ( $fullscreen_have_social ) : ?>
				<div class="details-column social-networks <?php echo esc_attr( $social_link_type_class ); ?>">
					<?php get_template_part( 'parts/elements/social_networks' ); ?>
				</div>
			<?php endif; ?>
        </div>
    </div>
</div>