<?php

if ( ! class_exists( 'Ohio_Nav_Menu_Walker' ) ) {
	class Ohio_Nav_Menu_Walker extends Walker_Nav_Menu {
		private $_last_ul = '';
		private $next_lvl_prefix = '';

		function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
			$id_field = $this->db_fields['id'];

			if ( is_object( $args[0] ) ) {
				$args[0]->has_children = !empty( $children_elements[$element->$id_field] );
				$args[0]->wide_menu = ( $depth == 0 && !empty( $element->ohio_wide_menu_enabled ) && $element->ohio_wide_menu_enabled==1 );
				$args[0]->full_width_menu = ( $depth == 0 && !empty( $element->ohio_full_width_menu_enabled ) && $element->ohio_full_width_menu_enabled==1 );
				$args[0]->ohio_mega_menu_image = ( $depth == 0 && !empty( $element->ohio_mega_menu_image ) ) ? $element->ohio_mega_menu_image : '';
				$args[0]->ohio_mega_menu_bg_position = ( $depth == 0 && !empty( $element->ohio_mega_menu_bg_position ) ) ? $element->ohio_mega_menu_bg_position : '';
				$args[0]->ohio_mega_menu_bg_repeat = ( $depth == 0 && !empty( $element->ohio_mega_menu_bg_repeat ) ) ? $element->ohio_mega_menu_bg_repeat : '';
			}

			return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
		}

		function start_lvl( &$output, $depth = 0, $args = array( ) ) {
			// depth dependent classes
			$indent = ( $depth > 0 ? str_repeat("\t", $depth ) : '' ); // code indent
			$display_depth = ( $depth + 1 ); // because it counts the first submenu as 0

			$classes = array(
				'menu-depth-' . $display_depth
			);

			if ( $display_depth == 1 ) {
				$classes[] = 'sub-menu';

				if ( $args->wide_menu ) {
					$classes[] = 'sub-menu-wide';
				}

				if ( $args->full_width_menu ) {
					$classes[] = 'sub-menu-full-width';
				}

			} else if ( $display_depth >= 2 ) {
				$classes[] = 'sub-sub-menu';
			}

			$prefix = '';

			$class_names = implode( ' ', $classes );

			// build html output
			$output .= "\n" . $indent . $prefix . '<ul class="' . $class_names . '">' . "\n";
		}

		function end_lvl( &$output, $depth = 0, $args = array() ) {
			$indent = str_repeat("\t", $depth );
			$postfix = '';

			$output .= "{$indent}</ul>{$postfix}\n";
		}

		function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
			global $wp_query;

			// code indent
			$indent = ( $depth > 0 ? str_repeat("\t", $depth ) : '' );
			$is_wide = (bool) $item->ohio_wide_menu_enabled;

			// depth dependent classes
			$depth_classes = array(
				( $depth == 0 ? 'nav-item' : 'sub-nav-item' ),
				'menu-item-depth-' . $depth,
			);

			if ( ! empty( $item->description )  && ( $depth > 0 ) ) {
				$depth_classes[] = 'mega-menu-item-has-subtitle';
			}

			if ( is_array( $item->classes ) ) {
				if ( in_array("current-menu-ancestor", $item->classes ) ) {
					$depth_classes[] = 'current-menu-ancestor';
				}

				if ( in_array("current-menu-item", $item->classes ) ) {
					$depth_classes[] = 'current-menu-item';
				}

				if ( in_array("current-menu-parent", $item->classes ) ) {
					$depth_classes[] = 'current-menu-parent';
				}
			}

			$btnPlus = '';
			// build html
			if ( is_object( $args ) && $args->has_children ) {
				$depth_classes[] = 'has-submenu';
				$multilevel_indicators = OhioOptions::get_global( 'page_header_indicator_visibility', true );

				$btnPlus .= '<div class="has-submenu-icon">
				<i class="icon menu-plus">
					<svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M14 8H8V14H6V8H0V6H6V0H8V6H14V8Z"/>
					</svg>
				</i>';
				if ( $multilevel_indicators ) {
					$btnPlus .= '<i class="menu-chevron"><svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24"><path d="M0 7.33l2.829-2.83 9.175 9.339 9.167-9.339 2.829 2.83-11.996 12.17z"/></svg></i>';
				}
				$btnPlus .= '</div>';

			}

			if ( $depth == 0 ) {
				if ( is_object( $args ) && $args->full_width_menu ) {
					$depth_classes[] = 'sub-menu-full-width';
				}
			}

			$depth_class_names = esc_attr( implode( ' ', $depth_classes ) );

			$custom_class_names = '';

			if ( is_array( $item->classes ) ) {
				foreach ( $item->classes as $class ) {
					if ( $class == 'menu-item' ) {
						break;
					}
					$custom_class_names .= ' ' . $class;
				}
			}

			if ( $is_wide && $depth === 0 && ( ! empty( $item->icon_img ) || ! empty ( $item->description ) ) ) {
				ob_start();
				?>
					<li class="mega-menu-item sub-nav-item menu-item-depth-1 wide-menu-parent-meta">
						<?php if ( ! empty( $item->icon_img ) ) : ?>
							<img class="wide-menu-image" src="<?php echo $item->icon_img; ?>">
						<?php endif; ?>
						<?php if ( ! empty( $item->description ) ) : ?>
							<p class="wide-menu-description -unspace">
								<?php echo $item->description; ?>
							</p>
						<?php endif; ?>
					</li>
				<?php
				$this->next_lvl_prefix .= ob_get_clean();
			}

			if ( $depth === 1 && $is_wide && $this->next_lvl_prefix ) {
				$output .= $this->next_lvl_prefix;
				$this->next_lvl_prefix = '';
			}

			$output .= $indent . '<li id="nav-menu-item-' . $item->ID . '-' . uniqid() . '" class="mega-menu-item ' . $depth_class_names . $custom_class_names . '">';

			// link attributes
			$attributes  = !empty( $item->attr_title ) ? ' title="' . esc_attr( $item->attr_title ) . '"' : '';
			$attributes .= !empty( $item->target ) ? ' target="' . esc_attr( $item->target ) . '"' : '';
			$attributes .= !empty( $item->xfn ) ? ' rel="' . esc_attr( $item->xfn ) . '"' : '';
			$attributes .= !empty( $item->url ) ? ' href="' . esc_attr( $item->url ) . '"' : '';
			$attributes .= ' class="menu-link -undash -unlink ' . ( $depth > 0 ? 'sub-menu-link ' : 'main-menu-link item-title' ) . '"';

			$icon = !empty( $item->_ohio_mega_menu_icon ) ? '<i class="'.$item->_ohio_mega_menu_icon.'"></i>' : '';

			$title_before = '';
			if ( ! empty( $item->icon_img ) && ! $is_wide ) {
				$title_before = "<img class=\"menu-link-icon-image\" src=\"$item->icon_img\" />";
			}

			$subtitle = '';
			if ( ! empty( $item->description ) && ( $depth !== 0 ) && ! $is_wide ) {
				$subtitle = !empty( $item->icon_img ) ? '<span class="menu-link-subtitle has-icon">'.$item->description.'</span>' : '<span class="menu-link-subtitle">'.$item->description.'</span>';
			}

			switch( true ) {
				case ( $depth == 0 ):
					$item_output = sprintf( '%1$s<a%2$s><span>',
						( ( is_object( $args ) ) ? $args->before : '' ), $attributes
					);

					$item_output .= sprintf( '%s'.$subtitle,
						apply_filters( 'the_title', $icon.$item->title, $item->ID )
					);

					$item_output .= sprintf( '</span>%2$s</a>%1$s',
						( ( is_object( $args ) ) ? $args->after : '' ), $btnPlus
					);
					$item_output .= sprintf( '%s'.$subtitle,
						$indent
					);
					break;
				default:
					$item_output = sprintf( '%1$s<a%2$s>%3$s<span>%4$s%5$s%6$s</span>%8$s</a>%7$s',
						$args->before,
						$attributes,
						$title_before,
						$args->link_before,
						apply_filters( 'the_title', $icon.$item->title, $item->ID ).$subtitle,
						$args->link_after,
						$args->after,
						$btnPlus
					);
			}

			// build html
			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}

		function end_el( &$output, $item, $depth = 0, $args = array() ) {
			$is_wide = (bool) $item->ohio_wide_menu_enabled;

			if ( $is_wide && $depth === 1 ) {
				if ( ! empty( $item->icon_img ) ) {
					$output .= "<img class=\"wide-menu-image\" src=\"$item->icon_img\" />";
				}

				if ( ! empty ( $item->description ) ) {
					$output .= "<p class=\"wide-menu-description -unspace\">$item->description</p>";
				}
			}

			$output .= "</li>\n";
		}
	}
}
