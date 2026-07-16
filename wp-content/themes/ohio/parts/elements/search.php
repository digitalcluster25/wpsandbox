<?php
	$search_visible = OhioOptions::get( 'page_header_search_visibility', true ) && ! OhioSettings::is_coming_soon_page();
	$search_visible_mobile = OhioOptions::get( 'page_mobile_search_visibility', false );
	
	OhioOptions::get( 'page_header_search_visibility' ); // trigger selection chain
	$style_settings_select_type = OhioOptions::get_last_select_type();
	$search_position = OhioOptions::get_by_type( 'page_header_search_position', $style_settings_select_type );

	$extra_classes = '';
	if ( $search_position == 'fixed' ) {
		$extra_classes .= ' fixed';
		$extra_classes .= ' dynamic-typo';
		$extra_classes .= ' btn-round-light';
	}
	if ( $search_visible_mobile ) {
		$extra_classes .= ' -mobile-visible';
	}
?>

<?php if ( $search_visible ) : ?>
    <button class="icon-button search-global<?php echo esc_attr( $extra_classes ); ?>" data-js="open-search" aria-label="<?php esc_html_e( 'Search', 'ohio' ); ?>">
	    <i class="icon">
	    	<svg class="default" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m779-128.5-247.979-248Q501.5-352.5 463-339.25T381.658-326q-106.132 0-179.645-73.454t-73.513-179.5Q128.5-685 201.954-758.5q73.454-73.5 179.5-73.5T561-758.487q73.5 73.513 73.5 179.645 0 42.842-13.5 81.592T584-429l248 247.5-53 53ZM381.5-401q74.5 0 126.25-51.75T559.5-579q0-74.5-51.75-126.25T381.5-757q-74.5 0-126.25 51.75T203.5-579q0 74.5 51.75 126.25T381.5-401Z"/></svg>
	    </i>
	</button>
<?php endif; ?>
