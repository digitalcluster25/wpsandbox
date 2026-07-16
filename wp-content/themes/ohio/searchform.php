<form role="search" class="search search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="GET">
	<label>
		<span class="screen-reader-text"><?php esc_html_e( 'Search for', 'ohio' ) . ':'; ?></span>
		<input autocomplete="off" type="text" class="search-field" name="s" placeholder="<?php esc_attr_e( 'Search...', 'ohio' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>">
	</label>
	<button aria-label="search" class="button -text search search-submit">
        <i class="icon -right">
        	<svg class="default" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m779-128.5-247.979-248Q501.5-352.5 463-339.25T381.658-326q-106.132 0-179.645-73.454t-73.513-179.5Q128.5-685 201.954-758.5q73.454-73.5 179.5-73.5T561-758.487q73.5 73.513 73.5 179.645 0 42.842-13.5 81.592T584-429l248 247.5-53 53ZM381.5-401q74.5 0 126.25-51.75T559.5-579q0-74.5-51.75-126.25T381.5-757q-74.5 0-126.25 51.75T203.5-579q0 74.5 51.75 126.25T381.5-401Z"/></svg>
        </i>
	</button>
</form>