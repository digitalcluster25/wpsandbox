<?php
	// Settings
	$use_wrapper = OhioOptions::get( 'page_header_menu_use_wrapper', true );
	$show_subheader = OhioSettings::subheader_is_displayed();
	$hamburger_position = OhioOptions::get( 'page_header_menu_position', 'left' );
	$mobile_hamburger_position = OhioOptions::get_global( 'page_header_mobile_menu_position', 'left' );
	$menu_type = OhioOptions::get( 'page_header_menu_type', 'full' );
	$header_dynamic_typo = OhioOptions::get( 'page_header_dynamic_typography_color', false );
	$header_fixed = OhioOptions::get( 'page_header_fixed_position', false );

	if ( ! $header_fixed ) {
		$header_sticky = OhioOptions::get( 'page_header_sticky', true );
		$header_sticky_mobile = OhioOptions::get_global( 'page_header_mobile_sticky' );
		$header_sticky_initial_offset = OhioOptions::get_global( 'page_header_sticky_initial_offset' );

		$header_sticky_attr = '';
		if ( $header_sticky ) {
			$header_sticky_attr .= ' data-header-fixed=true';
		}
		if ( $header_sticky_mobile ) {
			$header_sticky_attr .= ' data-mobile-header-fixed=true';
		}
		if ( $header_sticky_initial_offset ) {
			$header_sticky_attr .= ' data-fixed-initial-offset=' . $header_sticky_initial_offset . '';
		}
	}

	$header_classes = '';
	if ( $header_fixed ) { 
		$header_classes .= ' -fixed'; 
	}
	if ( $show_subheader ) { 
		$header_classes .= ' subheader_included'; 
	}
	if ( $header_dynamic_typo ) {
		$header_classes .= ' header-dynamic-typo';
	}
	if ( $mobile_hamburger_position != $hamburger_position ) {
		$header_classes .= ' hamburger-position-' . $hamburger_position  . ' mobile-hamburger-position-' . $mobile_hamburger_position; 
	}
	
	$is_hamburger = $menu_type == 'full' ? false : true;

	if ( $menu_type == 'both' ) {
		$header_classes .= ' both-types';
	} else if ( $menu_type == 'full' ) {
		$header_classes .= ' extended-menu';
	}
?>

<header id="masthead" class="header header-8<?php echo esc_attr( $header_classes ); ?>"<?php if ( ! $header_fixed ) { echo esc_attr( $header_sticky_attr ); } ?>>
	<div class="header-wrap<?php if ( $use_wrapper ) { echo ' page-container'; } ?>">
		<div class="header-wrap-inner">
			<div class="left-part">

				<?php if ( $hamburger_position == 'left' && $is_hamburger) : ?>
					<div class="desktop-hamburger -left">
						<?php get_template_part( 'parts/elements/menu_hamburger' ); ?>
					</div>
				<?php endif; ?>

				<?php if ( $mobile_hamburger_position == 'left' ) : ?>
					<div class="mobile-hamburger -left">
						<?php get_template_part( 'parts/elements/menu_hamburger' ); ?>
					</div>
				<?php endif; ?>

				<?php get_template_part( 'parts/elements/menu_logo' ); ?>	
			</div>
	        <div class="right-part">
	        	
	            <?php get_template_part( 'parts/elements/menu_nav' ); ?>
	            <?php get_template_part( 'parts/elements/menu_optional' ); ?>

				<?php if ( $hamburger_position == 'right' && $is_hamburger ) : ?>
					<div class="desktop-hamburger -right">
						<?php get_template_part( 'parts/elements/menu_hamburger' ); ?>
					</div>
				<?php endif; ?>

				<?php if ( $mobile_hamburger_position == 'right' ) : ?>
					<div class="mobile-hamburger -right">
						<?php get_template_part( 'parts/elements/menu_hamburger' ); ?>
					</div>
				<?php endif; ?>

	        </div>
    	</div>
	</div>
</header>

<?php get_template_part( 'parts/elements/menu_hamburger_fullscreen' ); ?>