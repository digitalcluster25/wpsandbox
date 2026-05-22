<?php
class OhioLayout {

	/* Footer buffer content data */
	static private $footer_buffer_content = array();

	/* Custom CSS buffer content data */
	static private $dynamic_css_buffer_code = array();
	static private $dynamic_desktop_css_buffer_code = array();
	static private $dynamic_tablet_css_buffer_code = array();
	static private $dynamic_mobile_css_buffer_code = array();
	static private $dynamic_extrasmall_css_buffer_code = array();
	static private $dynamic_retina_css_buffer_code = array();
	static private $dynamic_shortcodes_css_buffer_code = array();

	/* Append content to footer buffer data */
	static function append_to_footer_buffer_content( $append_string = '' ) {
		$append_string = trim( $append_string );
		if ( strlen( $append_string ) == 0 ) { return false; }
		self::$footer_buffer_content[] = $append_string;
		return true;
	}

	/* Show or return footer buffer content data */
	static function get_footer_buffer_content( $print = false ) {
		if ( $print ) {
			echo implode( "\n\n", self::$footer_buffer_content );
			return true;
		} else {
			return implode( "\n\n", self::$footer_buffer_content );
		}
	}

	/* Append dynamic CSS to buffer code */
	static function append_to_dynamic_css_buffer( $append_string = '', $type = false ) {
		$append_string = trim( @strval( $append_string ) );
		if ( strlen( $append_string ) == 0 ) { return false; }
		$append_array = preg_split( "/((\r?\n)|(\r\n?))/", $append_string );
		$new_append_string = '';
		foreach( $append_array as $index => $append_line ){
			$append_line = trim( $append_line );
			if ( strlen( $append_line ) == 0 ) { continue; }
			$new_append_string .= $append_line;
		}
		switch ( $type ) {
			case 'desktop':
				self::$dynamic_desktop_css_buffer_code[] = $new_append_string;
				break;
			case 'tablet':
				self::$dynamic_tablet_css_buffer_code[] = $new_append_string;
				break;
			case 'mobile':
				self::$dynamic_mobile_css_buffer_code[] = $new_append_string;
				break;
			case 'extrasmall':
				self::$dynamic_extrasmall_css_buffer_code[] = $new_append_string;
				break;
			default:
				self::$dynamic_css_buffer_code[] = $new_append_string;
		}
		return true;
	}

	/* Append dynamic CSS for retina to buffer code */
	static function append_to_dynamic_retina_css_buffer( $append_string = '' ) {
		$append_string = trim( $append_string );
		if ( strlen( $append_string ) == 0 ) { return false; }
		$append_array = preg_split( "/((\r?\n)|(\r\n?))/", $append_string );
		$new_append_string = '';
		foreach( $append_array as $index => $append_line ){
			$append_line = trim( $append_line );
			if ( strlen( $append_line ) == 0 ) { continue; }
			$new_append_string .= $append_line;
		}
		self::$dynamic_retina_css_buffer_code[] = preg_replace( '/\s+/', '', $new_append_string );
		return true;
	}

	/* Shortcodes dynamic CSS to buffer code */
	static function append_to_shortcodes_css_buffer( $append_string = '' ) {
		$append_string = trim( $append_string );
		if ( strlen( $append_string ) == 0 ) { return false; }
		$append_array = preg_split( "/((\r?\n)|(\r\n?))/", $append_string );
		$new_append_string = '';
		foreach( $append_array as $index => $append_line ){
			$append_line = trim( $append_line );
			if ( strlen( $append_line ) == 0 ) { continue; }
			$new_append_string .= $append_line;
		}
		self::$dynamic_shortcodes_css_buffer_code[] = $new_append_string;
		return true;
	}

	/* Show or return dynamic CSS code */
	static function get_dynamic_css_buffer( $print = false ) {
		$dynamic_css_buffer = implode( '', self::$dynamic_css_buffer_code );

		if ( self::$dynamic_desktop_css_buffer_code ) {
			$dynamic_css_buffer .= '@media screen and (min-width: 1181px){' . (implode( '', self::$dynamic_desktop_css_buffer_code )) . '}';
		}
		if ( self::$dynamic_tablet_css_buffer_code ) {
			$dynamic_css_buffer .= '@media screen and (min-width: 769px) and (max-width: 1180px){' . implode( '', self::$dynamic_tablet_css_buffer_code ) . '}';
		}
		if ( self::$dynamic_mobile_css_buffer_code ) {
			$dynamic_css_buffer .= '@media screen and (max-width: 768px){' . implode( '', self::$dynamic_mobile_css_buffer_code ) . '}';
		}

		if ( $print ) {
			echo esc_html($dynamic_css_buffer);
			return true;
		} else {
			return $dynamic_css_buffer;
		}
	}

	/* Show or return dynamic retina CSS code */
	static function get_dynamic_retina_css_buffer( $print = false ) {
		if ( $print ) {
			echo implode( '', self::$dynamic_retina_css_buffer_code );
			return true;
		} else {
			return implode( '', self::$dynamic_retina_css_buffer_code );
		}
	}

	/* Show or return dynamic CSS code */
	static function get_shortcodes_css_buffer( $print = false ) {
		if ( $print ) {
			echo implode( '', self::$dynamic_shortcodes_css_buffer_code );
			return true;
		} else {
			return implode( '', self::$dynamic_shortcodes_css_buffer_code );
		}
	}

	static function show_shortcodes_inline_css() {
		$shortcodes_css = OhioLayout::get_shortcodes_css_buffer(false);

		if ( $shortcodes_css ) {
			echo '<style type="text/css">';
			echo $shortcodes_css;
			echo '</style>';
		}
	}

	static function the_paginator_layout( $current_page, $all_pages, $align = 'left', $type = 'default', $size = 'medium' ) {
		$current_page = (int) $current_page;
		$all_pages = (int) $all_pages;
		if ( $current_page < 1 ) {
			$current_page = 1;
		}
		if ( $current_page > $all_pages ) {
			$current_page = $all_pages;
		}

		$_range = array();
		if ( $all_pages > 5 ) {
			// first item
			$_range[] = 1;
			// border ranges
			if ( $current_page <= 4 ) {
				$_range[] = 2;
				$_range[] = 3;
			}
			if ( $current_page >= $all_pages - 3 ) {
				$_range[] = $all_pages - 2;
				$_range[] = $all_pages - 1;
			}
			// inner ranges
			$_range[] = $current_page;
			if ( $current_page > 1 ) {
				$_range[] = $current_page - 1;
			}
			if ( $current_page < $all_pages ) {
				$_range[] = $current_page + 1;
			}
			// first item
			$_range[] = $all_pages;

			sort( $_range );
			$new_range = array_values( array_unique( $_range ) );
			$ranges = array();
			foreach ($new_range as $_range_key => $_range_value) {
				$ranges[] = $_range_value;
				if ( $_range_key < count( $new_range ) - 1 && $_range_value + 1 != $new_range[ $_range_key + 1 ] ) {
					$ranges[] = '...';
				}
			}
		} else { // fast variant
			for ($i=1; $i <= $all_pages; $i++) {
				$ranges[] = $i;
			}
		}

		$additional_classes = [];
		if ( in_array( $align, [ 'center', 'right' ], true ) ) {
			$additional_classes[] = '-' . $align . '-flex';
		}
		if ( in_array( $type, [ 'default', 'outlined', 'flat' ], true ) ) {
			$additional_classes[] = '-' . $type;
		}
		if ( in_array( $size, [ 'large', 'small' ], true ) ) {
			$additional_classes[] = '-' . $size;
		}

		$style_class = [];
		if ( in_array( $type, [ 'default', 'outlined' ], true ) ) {
			$style_class[] = '-' . $type;
		}


		$layout = '<ul class="pagination ' . implode( ' ', $additional_classes ) . ' -unlist">';

		// prev button layout
		if ( $current_page > 1 ) {
			$layout .= '<li class="page-item"><a href="' . esc_url( get_pagenum_link( $current_page - 1 ) ) . '" class="page-link button -unlink -pagination -flat" aria-label="' . esc_attr( 'Previous', 'ohio' ) . '">';
			$layout .= '<i class="icon">
					    	<svg class="default" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M646-442.5H170v-75h476L426.5-737l53.5-53 310 310-310 310-53.5-53L646-442.5Z"/></svg>
					    </i>';
			$layout .= '</a></li>';
		}

		// button layout
		if ( isset( $ranges ) ) {
			foreach ( $ranges as $value ) {
				if ( $value == '...' ) {
					$layout .= '<li class="page-item"><span class="page-link button -flat">...</span></li>';
				} else {
					$layout .= '<li class="page-item"><a href="' . esc_url( get_pagenum_link( $value ) ) . '" class="page-link button -unlink -pagination ' . implode( ' ', $style_class ) . ( ( $current_page == $value ) ? '' : ' -flat' ) . '" aria-label="' . esc_attr( 'Page', 'ohio' ) . '">' . esc_html( $value ) . '</a></li>';
				}
			}
		}
		// next button layout
		if ( $current_page < $all_pages ) {
			$layout .= '<li class="page-item"><a href="' . esc_url( get_pagenum_link( $current_page + 1 ) ) . '" class="page-link button -unlink -pagination -flat" aria-label="' . esc_attr( 'Next', 'ohio' ) . '">';
			$layout .= '<i class="icon">
					    	<svg class="default" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M646-442.5H170v-75h476L426.5-737l53.5-53 310 310-310 310-53.5-53L646-442.5Z"/></svg>
					    </i>';
			$layout .= '</a></li>';
		}

		$layout .= '</ul>';
		echo $layout;
	}
}
