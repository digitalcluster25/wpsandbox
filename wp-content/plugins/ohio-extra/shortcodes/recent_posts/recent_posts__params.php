<?php

/**
* WPBakery Page Builder Ohio Recent Posts shortcode params
*/

vc_lean_map( 'ohio_recent_posts', 'ohio_recent_posts_sc_map' );

function ohio_recent_posts_sc_map() {
	return array(
		'name' => __( 'Blog Posts', 'ohio-extra' ),
		'description' => __( 'Blog posts archive', 'ohio-extra' ),
		'base' => 'ohio_recent_posts',
		'category' => __( 'Ohio', 'ohio-extra' ),
		'icon' => OHIO_EXTRA_DIR_URL . 'assets/images/shortcodes/recent_posts_icon.svg',
		'params' => array(

			// General.
			array(
				'type' => 'ohio_choose_box',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Layout', 'ohio-extra' ),
				'param_name' => 'card_layout',
				'value' => array(
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/acf__image_portfolio_01.svg',
						'key' => 'blog_grid_1',
						'title' => __( 'Classic', 'ohio-extra' )
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/acf__image_portfolio_02.svg',
						'key' => 'blog_grid_2',
						'title' => __( 'Minimal', 'ohio-extra' )
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/acf__image_portfolio_39.svg',
						'key' => 'blog_grid_3',
						'title' => __( 'Split', 'ohio-extra' )
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/acf__image_portfolio_40.svg',
						'key' => 'blog_grid_4',
						'title' => __( 'Inner', 'ohio-extra' )
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/acf__image_portfolio_41.svg',
						'key' => 'blog_grid_5',
						'title' => __( 'Compact', 'ohio-extra' )
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/acf__image_portfolio_44.svg',
						'key' => 'blog_grid_6',
						'title' => __( 'Simple', 'ohio-extra' )
					),
					array(
						'icon' => plugin_dir_url( __FILE__ ) . 'images/acf__image_53.svg',
						'key' => 'blog_grid_7',
						'title' => __( 'Wide', 'ohio-extra' )
					)
				)
			),

			array(
				'type' => 'ohio_posts',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Posts', 'ohio-extra' ),
				'description' => __( 'Leave empty to choose all posts.', 'ohio-extra' ),
				'param_name' => 'posts',
				'value' => '',

				'post_type' => 'post',
			),

			array(
				'type' => 'ohio_post_types',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Categories', 'ohio-extra' ),
				'description' => __( 'Leave empty to choose all categories.', 'ohio-extra' ),
				'param_name' => 'post_category',
				'value' => ''
			),
			array(
				'type'        => 'dropdown',
				'group' => __( 'General', 'ohio-extra' ),
				'heading'     => __( 'Order By', 'ohio-extra' ),
				'param_name'  => 'orderby',
				'value'       => [
					__( 'Published Date', 'ohio-extra' ) => 'date',
					__( 'ID', 'ohio-extra' )             => 'ID',
					__( 'Author', 'ohio-extra' )         => 'author',
					__( 'Title', 'ohio-extra' )          => 'title',
					__( 'Post Slug', 'ohio-extra' )      => 'name',
					__( 'Post Type', 'ohio-extra' )      => 'type',
					__( 'Modified Date', 'ohio-extra' )  => 'modified',
					__( 'Parent ID', 'ohio-extra' )      => 'parent',
					__( 'Random', 'ohio-extra' )         => 'rand',
					__( 'Comment Count', 'ohio-extra' )  => 'comment_count',
					__( 'Menu Order', 'ohio-extra' )     => 'menu_order',
				],
				'std'         => 'date',
				'description' => __( 'For masonry layouts the resulting layout might not match the sorting order.', 'ohio-extra' ),
			),
			array(
				'type'       => 'dropdown',
				'group' => __( 'General', 'ohio-extra' ),
				'heading'    => __( 'Order', 'ohio-extra' ),
				'param_name' => 'order',
				'value'      => [
					__( 'Descending', 'ohio-extra' ) => 'DESC',
					__( 'Ascending', 'ohio-extra' )  => 'ASC',
				],
				'std'        => 'DESC',
			),
			array(
				'type' => 'dropdown',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Thumbnail Size', 'ohio-extra' ),
				'param_name' => 'blog_images_size',
				'value' => array(
					__( 'Inherit from Theme Settings', 'ohio-extra' ) => 'inherit',
					__( 'Thumbnail', 'ohio-extra' ) => 'thumbnail',
					__( 'Small', 'ohio-extra' ) => 'medium',
					__( 'Medium', 'ohio-extra' ) => 'medium_large',
					__( 'Large', 'ohio-extra' ) => 'large',
					__( 'Original', 'ohio-extra' ) => 'ohio_full',
				)
			),
			array(
				'type' => 'dropdown',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Hover Effect', 'ohio-extra' ),
				'param_name' => 'card_effect',
				'value' => array(
					__( 'None', 'ohio-extra' ) => 'none',
					__( 'Image Scaling', 'ohio-extra' ) => 'scale',
					__( 'Image Overlay', 'ohio-extra' ) => 'overlay',
					__( 'Image Greyscale', 'ohio-extra' ) => 'greyscale',
				),
				'std' => 'none',
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Tilt Effect', 'ohio-extra' ),
				'param_name' => 'tilt_effect',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '0'
				)
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Drop Shadow', 'ohio-extra' ),
				'param_name' => 'drop_shadow',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '0'
				)
			),
			array(
				'type' => 'ohio_range',
				'holder' => 'em',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Shadow Intensity', 'ohio-extra' ),
				'param_name' => 'drop_shadow_intensity',
				'description' => __( '<a target="_blank" href="https://www.w3schools.com/cssref/css_units.asp">Use % units&nbsp;<i title="Use CSS unit value." class="far fa-question-circle"></i></a>', 'ohio-extra' ),
				'value' => '10',
				'dependency' => array(
					'element' => 'drop_shadow',
					'value' => array(
						'1'
					)
				),
			),
			array(
				'type' => 'ohio_range',
				'holder' => 'em',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Cards Corners', 'ohio-extra' ),
				'param_name' => 'border_radius',
				'description' => __( '<a target="_blank" href="https://www.w3schools.com/cssref/css_units.asp">Use px units&nbsp;<i title="Use CSS unit value." class="far fa-question-circle"></i></a>', 'ohio-extra' ),
				'value' => '5'
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Equal Height', 'ohio-extra' ),
				'param_name' => 'metro_style',
				'description' => __( 'Convert a rectangular image into a cropped square.', 'ohio-extra' ),
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '1'
				),
				'dependency' => array(
					'element' => 'card_layout',
					'value' => array(
						'blog_grid_1',
						'blog_grid_2',
						'blog_grid_3',
						'blog_grid_4',
						'blog_grid_5',
						'blog_grid_6'
					)
				)
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Contained Layout', 'ohio-extra' ),
				'param_name' => 'card_boxed',
				'description' => __( 'Add side gaps for blog cards.', 'ohio-extra' ),
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '0'
				)
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Show Excerpt?', 'ohio-extra' ),
				'param_name' => 'short_description',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '0'
				)
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Show "Read More"?', 'ohio-extra' ),
				'param_name' => 'show_read_more',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '0'
				)
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Show Author?', 'ohio-extra' ),
				'param_name' => 'show_author',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '1'
				)
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Show Categories?', 'ohio-extra' ),
				'param_name' => 'show_categories',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '1'
				)
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Show Reading Time?', 'ohio-extra' ),
				'param_name' => 'show_reading_time',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '1'
				)
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'General', 'ohio-extra' ),
				'heading' => __( 'Show Date?', 'ohio-extra' ),
				'param_name' => 'show_date',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '1'
				)
			),

			// Grid.
			array(
				'type' => 'ohio_check',
				'group' => __( 'Grid', 'ohio-extra' ),
				'heading' => __( 'Use Masonry?', 'ohio-extra' ),
				'param_name' => 'masonry_grid',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '0'
				)
			),
			array(
				'type' => 'ohio_range',
				'holder' => 'em',
				'group' => __( 'Grid', 'ohio-extra' ),
				'heading' => __( 'Output Limit', 'ohio-extra' ),
				'param_name' => 'posts_in_block',
				'description' => __( 'Set the maximum number of posts per shortcode.', 'ohio-extra' ),
				'value' => '12'
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Grid', 'ohio-extra' ),
				'heading' => __( 'Gutters', 'ohio-extra' ),
				'param_name' => 'card_gap',
				'description' => __( '<a target="_blank" href="https://www.w3schools.com/cssref/css_units.asp">Use CSS units&nbsp;<i title="Use CSS unit value." class="far fa-question-circle"></i></a> Go to Theme Settings to <a target="_blank" href="./admin.php?page=ohio_hub_settings&options_page=theme-appearance">set gutters value</a> for the entire site.', 'ohio-extra' ),
				'value' => '16px',
			),

			array(
				'type' => 'dropdown',
				'group' => __( 'Grid', 'ohio-extra' ),
				'heading' => __( 'Use Animation?', 'ohio-extra' ),
				'param_name' => 'animation_type',
				'value' => array(
					__( 'Disable', 'ohio-extra' ) => 'default',
					__( 'Synchronous', 'ohio-extra' ) => 'sync',
					__( 'Asynchronous', 'ohio-extra' ) => 'async'
				)
			),
			array(
				'type' => 'dropdown',
				'group' => __( 'Grid', 'ohio-extra' ),
				'heading' => __( 'Animation Effect', 'ohio-extra' ),
				'dependency' => array(
					'element' => 'animation_type',
					'value' => array(
						'sync',
						'async'
					)
				),
				'param_name' => 'animation_effect',
				'value' => array(
					__( 'Fade Up', 'ohio-extra' ) => 'fade-up',
					__( 'Fade Down', 'ohio-extra' ) => 'fade-down',
					__( 'Fade Down', 'ohio-extra' ) => 'fade-down',
					__( 'Fade Right', 'ohio-extra' ) => 'fade-right',
					__( 'Fade Left', 'ohio-extra' ) => 'fade-left',
					__( 'Flip Up', 'ohio-extra' ) => 'flip-up',
					__( 'Flip Down', 'ohio-extra' ) => 'flip-down',
					__( 'Zoom In', 'ohio-extra' ) => 'zoom-in',
					__( 'Zoom Out', 'ohio-extra' ) => 'zoom-out'
				)
			),
			array(
				'type' => 'ohio_divider',
				'group' => __( 'Grid', 'ohio-extra' ),
				'param_name' => 'row_items_title',
				'value' => __( 'Items Per Row', 'ohio-extra' ),
				'dependency' => array(
					'element' => 'card_layout',
					'value' => array(
						'blog_grid_1',
						'blog_grid_2',
						'blog_grid_3',
						'blog_grid_4',
						'blog_grid_5'
					)
				)
			),
			array(
				'type' => 'ohio_columns',
				'group' => __( 'Grid', 'ohio-extra' ),
				'param_name' => 'columns_in_row',
				'std' => '2-2-1',
				'dependency' => array(
					'element' => 'card_layout',
					'value' => array(
						'blog_grid_1',
						'blog_grid_2',
						'blog_grid_3',
						'blog_grid_4',
						'blog_grid_5'
					)
				)
			),

			// Pagination.
			array(
				'type' => 'ohio_check',
				'group' => __( 'Pagination', 'ohio-extra' ),
				'heading' => __( 'Use Pagination?', 'ohio-extra' ),
				'param_name' => 'use_pagination',
				'description' => '',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '0'
				)
			),
			array(
				'type' => 'ohio_range',
				'holder' => 'em',
				'group' => __( 'Pagination', 'ohio-extra' ),
				'heading' => __( 'Items Per Page', 'ohio-extra' ),
				'param_name' => 'pagination_items_per_page',
				'description' => __( 'Set a number of grid items output per page.', 'ohio-extra' ),
				'value' => '6',
				'dependency' => array(
					'element' => 'use_pagination',
					'value' => array(
						'1'
					)
				)
			),
			array(
				'type' => 'dropdown',
				'group' => __( 'Pagination', 'ohio-extra' ),
				'heading' => __( 'Type', 'ohio-extra' ),
				'param_name' => 'pagination_type',
				'value' => array(
					__( 'Standard', 'ohio-extra' ) => 'standard',
					__( 'Lazy Load', 'ohio-extra' ) => 'lazy_scroll',
					__( 'Load More', 'ohio-extra' ) => 'lazy_button',
				),
				'std' => 'simple',
				'dependency' => array(
					'element' => 'use_pagination',
					'value' => array(
						'1'
					)
				)
			),
			array(
				'type' => 'dropdown',
				'group' => __( 'Pagination', 'ohio-extra' ),
				'heading' => __( 'Style', 'ohio-extra' ),
				'param_name' => 'pagination_style',
				'value' => array(
					__( 'Default', 'ohio-extra' ) => 'default',
					__( 'Outlined', 'ohio-extra' ) => 'outlined',
					__( 'Text', 'ohio-extra' ) => 'flat',
				),
				'std' => 'simple',
				'dependency' => array(
					'element' => 'use_pagination',
					'value' => array(
						'1'
					)
				)
			),
			array(
				'type' => 'dropdown',
				'group' => __( 'Pagination', 'ohio-extra' ),
				'heading' => __( 'Size', 'ohio-extra' ),
				'param_name' => 'pagination_size',
				'value' => array(
					__( 'Default', 'ohio-extra' ) => 'default',
					__( 'Small', 'ohio-extra' ) => 'small',
					__( 'Large', 'ohio-extra' ) => 'large',
				),
				'std' => 'simple',
				'dependency' => array(
					'element' => 'use_pagination',
					'value' => array(
						'1'
					)
				)
			),
			array(
				'type' => 'dropdown',
				'group' => __( 'Pagination', 'ohio-extra' ),
				'heading' => __( 'Position', 'ohio-extra' ),
				'param_name' => 'pagination_position',
				'value' => array(
					__( 'Left', 'ohio-extra' ) => 'left',
					__( 'Center', 'ohio-extra' ) => 'center',
					__( 'Right', 'ohio-extra' ) => 'right',
				),
				'std' => 'simple',
				'dependency' => array(
					'element' => 'use_pagination',
					'value' => array(
						'1'
					)
				)
			),

			// Styles.
			array(
				'type' => 'ohio_typography',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Title Typography', 'ohio-extra' ),
				'param_name' => 'heading_typo',
			),

			array(
				'type' => 'ohio_typography',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Excerpt Typography', 'ohio-extra' ),
				'param_name' => 'excerpt_typo',
			),
			array(
				'type' => 'ohio_typography',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Category Typography', 'ohio-extra' ),
				'param_name' => 'category_typo',
			),
			array(
				'type' => 'ohio_typography',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( '"Read More" Typography', 'ohio-extra' ),
				'param_name' => 'read_more_typo',
			),
			array(
				'type' => 'ohio_typography',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Published Date Typography', 'ohio-extra' ),
				'param_name' => 'date_typo',
			),
			array(
				'type' => 'ohio_typography',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Reading Time Typography', 'ohio-extra' ),
				'param_name' => 'reading_time_typo',
			),
			array(
				'type' => 'ohio_typography',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Author Typography', 'ohio-extra' ),
				'param_name' => 'author_typo',
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Category Badge Color', 'ohio-extra' ),
				'param_name' => 'category_badge_color',
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Background Color', 'ohio-extra' ),
				'param_name' => 'card_background_color',
				'dependency' => array(
					'element' => 'card_boxed',
					'value' => '1',
				)
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Overlay Color', 'ohio-extra' ),
				'param_name' => 'overlay_color',
				'dependency' => array(
					'element' => 'card_effect',
					'value' => 'overlay',
				)
			),
			array(
                'type' => 'ohio_divider',
                'group' => __( 'Styles', 'ohio-extra' ),
                'param_name' => 'pagination_settings_title',
                'value' => __( 'Pagination', 'ohio-extra' ),
                'dependency' => array(
					'element' => 'use_pagination',
					'value' => '1',
				)
            ),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Pagination Color', 'ohio-extra' ),
				'param_name' => 'pagination_color',
				'dependency' => array(
					'element' => 'use_pagination',
					'value' => '1',
				)
			),
			array(
				'type' => 'ohio_colorpicker',
				'group' => __( 'Styles', 'ohio-extra' ),
				'heading' => __( 'Pagination Color (Hover)', 'ohio-extra' ),
				'param_name' => 'pagination_active_color',
				'dependency' => array(
					'element' => 'use_pagination',
					'value' => '1',
				)
			),

			// Design Options.
            array(
                'type' => 'css_editor',
                'heading' => __( 'CSS', 'ohio-extra' ),
                'param_name' => 'content_styles',
                'group' => __( 'Design Options', 'ohio-extra' ),
            ),
            array(
                'type' => 'ohio_divider',
                'group' => __( 'Design Options', 'ohio-extra' ),
                'param_name' => 'other_settings_title',
                'value' => __( 'Other', 'ohio-extra' ),
            ),
            array(
                'type' => 'textfield',
                'group' => __( 'Design Options', 'ohio-extra' ),
                'heading' => __( 'CSS Class', 'ohio-extra' ),
                'param_name' => 'css_class',
                'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'ohio-extra' ),
            ),

			// Appear Effect.
			array(
				'type' => 'dropdown',
				'group' => __( 'Appear Effect', 'ohio-extra' ),
				'heading' => __( 'Appear Effect', 'ohio-extra' ),
				'param_name' => 'appearance_effect',
				'value' => array(
					__( 'None', 'ohio-extra' ) => 'none',
					__( 'Fade Up', 'ohio-extra' ) => 'fade-up',
__( 'Fade Down', 'ohio-extra' ) => 'fade-down',
					__( 'Fade Left', 'ohio-extra' ) => 'fade-left',
					__( 'Fade Right', 'ohio-extra' ) => 'fade-right',
					__( 'Flip Up', 'ohio-extra' ) => 'flip-up',
					__( 'Flip Down', 'ohio-extra' ) => 'flip-down',
					__( 'Zoom In', 'ohio-extra' ) => 'zoom-in',
					__( 'Zoom Out', 'ohio-extra' ) => 'zoom-out'
				)
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Appear Effect', 'ohio-extra' ),
				'heading' => __( 'Animation Duration', 'ohio-extra' ),
				'param_name' => 'appearance_duration',
				'description' => __( 'Duration accept values from 50 to 3000 (ms), with step 50.', 'ohio-extra' ),
			),
			array(
				'type' => 'textfield',
				'group' => __( 'Appear Effect', 'ohio-extra' ),
				'heading' => __( 'Animation Delay', 'ohio-extra' ),
				'param_name' => 'appearance_delay',
				'description' => __( 'A delay before animation, accepted values are in range from 50 to 3000 (ms), with a step of 50.', 'ohio-extra' ),
			),
			array(
				'type' => 'ohio_check',
				'group' => __( 'Appear Effect', 'ohio-extra' ),
				'heading' => __( 'Animation Repeat', 'ohio-extra' ),
				'description' => 'Repeat animation while scrolling page up and down',
				'param_name' => 'appearance_once',
				'value' => array(
					__( 'Yes', 'ohio-extra' ) => '1'
				)
			),
		)
	);
}