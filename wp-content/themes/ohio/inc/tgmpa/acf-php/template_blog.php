<?php if ( function_exists( 'acf_add_local_field_group' ) ) :

	acf_add_local_field_group( [
		"key" => "group_593dd5f5615b0",
		"title" => __( 'Blog Settings', 'ohio' ),
		"private" => true,
		"fields" => [
			[
				"key" => "field_591b002d4818sffmod",
				"label" => __( 'General', 'ohio' ),
				"name" => "",
				"type" => "tab",
				"instructions" => "",
				"required" => 0,
				"conditional_logic" => 0,
				"placement" => "top",
				"endpoint" => 0
			],
			[
				"key" => "field_593dd5f56ca9d",
				"label" => "",
				"name" => "",
				"type" => "message",
				"instructions" => "",
				"required" => 0,
				"conditional_logic" => 0,
				"message" => '<p class="message">' . '<i class="bi bi-question-circle"></i>' . __( 'To find more blog page settings navigate to', 'ohio' ) . '&nbsp;<a target="_blank" href="./admin.php?page=ohio_hub_settings&options_page=theme-general-blog">' . __( 'Global Theme Settings', 'ohio' ) . '</a></p>',
				"new_lines" => "wpautop",
				"esc_html" => 0
			],
			[
				"key" => "field_593dd5f56bae0",
				"label" => __( 'Layout', 'ohio' ),
				"name" => "blog_item_layout_type",
				"type" => "image_option",
				"instructions" => __( 'Choose a blog layout type for this page.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => 0,
				"image_option_value" => [
					[
						"name" => "inherit",
						"description" => __( 'Use from Theme Settings', 'ohio' ),
						"src" => "acf__image_inherited.svg"
					],
					[
						"name" => "blog_grid_1",
						"description" => __( 'Classic Grid', 'ohio' ),
						"src" => "acf__image_portfolio_01.svg"
					],
					[
						"name" => "blog_grid_2",
						"description" => __( 'Minimal Grid', 'ohio' ),
						"src" => "acf__image_portfolio_02.svg"
					],
					[
						"name" => "blog_grid_3",
						"description" => __( 'Split Grid', 'ohio' ),
						"src" => "acf__image_portfolio_39.svg"
					],
					[
						"name" => "blog_grid_4",
						"description" => __( 'Inner Grid', 'ohio' ),
						"src" => "acf__image_portfolio_40.svg"
					],
					[
						"name" => "blog_grid_5",
						"description" => __( 'Compact Grid', 'ohio' ),
						"src" => "acf__image_portfolio_41.svg"
					],
					[
						"name" => "blog_grid_6",
						"description" => __( 'Simple Grid', 'ohio' ),
						"src" => "acf__image_portfolio_44.svg"
					],
					[
						"name" => "blog_grid_7",
						"description" => __( 'Wide Grid', 'ohio' ),
						"src" => "acf__image_53.svg"
					]
				],
				"default_value" => "inherit",
				"allow_null" => 0,
				"multiple" => 0,
				"ui" => 0,
				"ajax" => 0,
				"return_format" => "value",
				"placeholder" => ""
			],
			[
				"key" => "field_59ccb100ba6f7nomod",
				"label" => __( 'Categories', 'ohio' ),
				"name" => "blog_categories",
				"type" => "taxonomy",
				"instructions" => __( 'Leave empty to output all categories.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => 0,
				"taxonomy" => "category",
				"field_type" => "multi_select",
				"allow_null" => 0,
				"add_term" => 0,
				"save_terms" => 0,
				"load_terms" => 0,
				"return_format" => "object",
				"multiple" => 1
			],
			[
				"key" => "field_593dd5f56b70f",
				"label" => __( 'Items Per Page', 'ohio' ),
				"name" => "blog_posts_per_page",
				"type" => "number",
				"instructions" => __( 'Set a number of blog post items per page.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => 0,
				"default_value" => 24,
				"placeholder" => "",
				"prepend" => "",
				"append" => "posts",
				"min" => 1,
				"max" => 100,
				"step" => 1
			],
			[
				"key" => "field_593dd5f56b310",
				"label" => __( 'Items Per Row', 'ohio' ),
				"name" => "blog_columns_in_row",
				"type" => "ohio_columns",
				"instructions" => __( 'Set a number of blog post items per row.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_593dd5f56bae0",
							"operator" => "!=",
							"value" => "blog_grid_6"
						]
					]
				],
				"default_value" => "i-i-i",
				"allow_null" => 0,
				"multiple" => 0,
				"ui" => 0,
				"ajax" => 0,
				"return_format" => "value",
				"placeholder" => "",
				"use_inherit" => true
			],
			[
				"key" => "field_592dlf5682k545",
				"label" => '<h4>' . __( 'Thumbnails', 'ohio' ) . '</h4>',
				"name" => "",
				"type" => "message"
			],
			[
				"key" => "field_592d60af8b3f9afs",
				"label" => __( 'Hover Effect', 'ohio' ),
				"name" => "blog_item_hover_type",
				"type" => "select",
				"instructions" => __( 'Choose the type of the featured image hover effect.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => 0,
				"choices" => [
					"inherit" => __( 'Use from Theme Settings', 'ohio' ),
					"none" => __( 'None', 'ohio' ),
					"scale" => __( 'Image Scaling', 'ohio' ),
					"overlay" => __( 'Image Overlay', 'ohio' ),
					"greyscale" => __( 'Image Greyscale', 'ohio' ),
				],
				"default_value" => "inherit",
				"allow_null" => 0,
				"multiple" => 0,
				"ui" => 0,
				"ajax" => 0,
				"return_format" => "value",
				"placeholder" => ""
			],
			[
				"key" => "field_592d60af8bc078743fgw",
				"label" => __( 'Tilt Effect', 'ohio' ),
				"name" => "blog_tilt_effect",
				"type" => "inherited_checkbox",
				"instructions" => __( 'Enable parallax hover tilt effect for blog post items.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => 0,
				"custom_labels" => [
					"inherit" => __( 'Use from Theme Settings', 'ohio' ),
					"yes" => __( 'Yes', 'ohio' ),
					"no" => __( 'No', 'ohio' )
				],
				"default_value" => "inherit",
				"ui" => 1,
				"ui_on_text" => __( 'Yes', 'ohio' ),
				"ui_off_text" => __( 'No', 'ohio' ),
				"message" => "",
				"default_value" => 0
			],


			[
				"key" => "field_5937a0a253d23s15l",
				"label" => '<h4>' . __( 'Entrance Animation', 'ohio' ) . '</h4>',
				"name" => "",
				"type" => "message"
			],
			[
				"key" => "field_592d60af8a7ffmo7ds",
				"label" => __( 'Animation Type', 'ohio' ),
				"name" => "page_animation_type",
				"type" => "radio",
				"instructions" => __( 'Choose the type of the grid entrance animation.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => 0,
				"choices" => [
					"inherit" => __( 'Use from Theme Settings', 'ohio' ),
					"default" => __( 'Disable', 'ohio' ),
					"sync" => __( 'Synchronous', 'ohio' ),
					"async" => __( 'Asynchronous', 'ohio' )
				],
				"allow_null" => 0,
				"other_choice" => 0,
				"save_other_choice" => 0,
				"default_value" => "inherit",
				"layout" => "horizontal",
				"return_format" => "value"
			],
			[
				"key" => "field_592d60af8ac17d27mo7ds",
				"label" => __( 'Animation Effect', 'ohio' ),
				"name" => "page_animation_effect",
				"type" => "select",
				"instructions" => __( 'Choose the type of the grid entrance animation effect.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => 0,
				"choices" => [
					"inherit" => __( 'Use from Theme Settings', 'ohio' ),
					"fade-up" => __( 'Fade up', 'ohio' ),
					"fade-left" => __( 'Fade left', 'ohio' ),
					"fade-right" => __( 'Fade right', 'ohio' ),
					"slide-up" => __( 'Slide up', 'ohio' ),
					"flip-up" => __( 'Flip up', 'ohio' ),
					"zoom-in" => __( 'Zoom in', 'ohio' )
				],
				"default_value" => [
					"inherit"
				],
				"allow_null" => 0,
				"multiple" => 0,
				"ui" => 0,
				"ajax" => 0,
				"return_format" => "value",
				"placeholder" => ""
			],
			[
				"key" => "field_592daf568hdgf8a413",
				"label" => __( 'Grid', 'ohio' ),
				"name" => "",
				"type" => "tab",
				"instructions" => "",
				"required" => 0,
				"conditional_logic" => 0,
				"placement" => "top",
				"endpoint" => 0
			],
			[
				"key" => "field_593dd5f56af4c",
				"label" => __( 'Masonry Layout', 'ohio' ),
				"name" => "blog_page_layout",
				"type" => "inherited_checkbox",
				"instructions" => __( 'Enable masonry layout to set the grid items in the following row rise up to completely fill the gaps.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => 0,
				"custom_labels" => [
					"inherit" => __( 'Use from Theme Settings', 'ohio' ),
					"yes" => __( 'Yes', 'ohio' ),
					"no" => __( 'No', 'ohio' )
				],
				"allow_null" => 0,
				"other_choice" => 0,
				"save_other_choice" => 0,
				"default_value" => "inherit",
				"layout" => "horizontal",
				"return_format" => "value"
			],
			[
				"key" => "field_593ffgll21g5g412",
				"label" => __( 'Alignment', 'ohio' ),
				"name" => "posts_text_alignment",
				"type" => "button_group",
				"instructions" => __( 'Choose the grid content alignment for this page.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => 0,
				"choices" => [
					"inherit" => __( '<em class="acf-js-tooltip" title="Use from Theme Settings"><i class="bi bi-globe"></i></em>', 'ohio' ),
                    "left" => __( '<i class="bi bi-text-left"></i> Left', 'ohio' ),
                    "center" => __( '<i class="bi bi-text-center"></i> Center', 'ohio' ),
                    "right" => __( '<i class="bi bi-text-right"></i> Right', 'ohio' )
                ],
				"default_value" => "inherit",
				"allow_null" => 0,
				"multiple" => 0,
				"ui" => 0,
				"ajax" => 0,
				"return_format" => "value",
				"placeholder" => ""
			],
			[
				"key" => "field_593dd5f56c2b2",
				"label" => __( 'Gutters', 'ohio' ),
				"name" => "grid_items_without_padding",
				"type" => "inherited_checkbox",
				"instructions" => __( 'Remove gutters between the blog posts items.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => 0,
				"custom_labels" => [
					"inherit" => __( 'Use from Theme Settings', 'ohio' ),
					"yes" => __( 'Yes', 'ohio' ),
					"no" => __( 'No', 'ohio' )
				],
				"default_value" => "inherit",
				"layout" => "horizontal",
				"return_format" => "value"
			],
			[
				"key" => "field_59f2342343g531f",
				"label" => __( 'Equal Height', 'ohio' ),
				"name" => "blog_equal_height",
				"type" => "inherited_checkbox",
				"instructions" => __( 'Convert a rectangular image thumbnails into a cropped square.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_593dd5f56bae0",
							"operator" => "!=",
							"value" => "blog_grid_6"
						]
					]
				],
				"custom_labels" => [
					"inherit" => __( 'Use from Theme Settings', 'ohio' ),
					"yes" => __( 'Show', 'ohio' ),
					"no" => __( 'Hide', 'ohio' )
				],
				"allow_null" => 0,
				"other_choice" => 0,
				"save_other_choice" => 0,
				"default_value" => "inherit",
				"layout" => "horizontal",
				"return_format" => "value"
			],
			[
				"key" => "field_592d60affsafr4gdt25",
				"label" => __( 'Contained Layout', 'ohio' ),
				"name" => "blog_items_boxed_style",
				"type" => "inherited_checkbox",
				"instructions" => __( 'Wrap a single grid item into a filled container.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => 0,
				"custom_labels" => [
					"inherit" => __( 'Use from Theme Settings', 'ohio' ),
					"yes" => __( 'Show', 'ohio' ),
					"no" => __( 'Hide', 'ohio' )
				],
				"allow_null" => 0,
				"other_choice" => 0,
				"save_other_choice" => 0,
				"default_value" => "inherit",
				"layout" => "horizontal",
				"return_format" => "value"
			],
			[
				"key" => "field_593f23hmnty31",
				"label" => __( 'Contained Layout Background', 'ohio' ),
				"name" => "posts_card_background_color",
				"type" => "ohio_color",
				"instructions" => __( 'Set the background color of the contained blog card item.', 'ohio' ),
				"conditional_logic" => [
					[
						[
							"field" => "field_592d60affsafr4gdt25",
							"operator" => "==",
							"value" => "1"
						]
					]
				],
				"required" => 0,
				"default_value" => ""
			],
			[
				"key" => "field_592d60af8b235235",
				"label" => __( 'Drop Shadow', 'ohio' ),
				"name" => "blog_drop_shadow",
				"type" => "inherited_checkbox",
				"instructions" => __( 'Enable a drop shadow effect for blog post items.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => 0,
				"custom_labels" => [
					"inherit" => __( 'Use from Theme Settings', 'ohio' ),
					"yes" => __( 'Yes', 'ohio' ),
					"no" => __( 'No', 'ohio' )
				],
				"default_value" => "inherit",
				"ui" => 1,
				"ui_on_text" => __( 'Yes', 'ohio' ),
				"ui_off_text" => __( 'No', 'ohio' ),
				"message" => "",
				"default_value" => 0
			],
			[
				"key" => "field_591b002d4817sffmod",
				"label" => __( 'Pagination', 'ohio' ),
				"name" => "",
				"type" => "tab",
				"instructions" => "",
				"required" => 0,
				"conditional_logic" => 0,
				"placement" => "top",
				"endpoint" => 0
			],
			[
				"key" => "field_593dd5f56ba30",
				"label" => __( 'Type', 'ohio' ),
				"name" => "pagination_type",
				"type" => "select",
				"instructions" => __( 'Choose the type of the pagination for this page.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => 0,
				"choices" => [
					"inherit" => __( 'Use from Theme Settings', 'ohio' ),
					"standard" => __( 'Standard', 'ohio' ),
					"lazy_scroll" => __( 'Lazy Load', 'ohio' ),
					"lazy_button" => __( 'Load More', 'ohio' )
				],
				"default_value" => [
					"standard"
				],
				"allow_null" => 0,
				"multiple" => 0,
				"ui" => 0,
				"ajax" => 0,
				"return_format" => "value",
				"placeholder" => ""
			],
			[
				"key" => "field_593dd5f56ba32",
				"label" => __( 'Style', 'ohio' ),
				"name" => "pagination_style",
				"type" => "select",
				"instructions" => __( 'Choose the style of the pagination for this page.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => 0,
				"choices" => [
					"inherit" => __( 'Use from Theme Settings', 'ohio' ),
					"default" => __( 'Default', 'ohio' ),
					"outlined" => __( 'Outlined', 'ohio' ),
					"flat" => __( 'Text', 'ohio' )
				],
				"default_value" => [
					"standard"
				],
				"allow_null" => 0,
				"multiple" => 0,
				"ui" => 0,
				"ajax" => 0,
				"return_format" => "value",
				"placeholder" => ""
			],
			[
				"key" => "field_593dd523442331",
				"label" => __( 'Size', 'ohio' ),
				"name" => "pagination_size",
				"type" => "select",
				"instructions" => __( 'Choose the size of the pagination buttons for this page.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => 0,
				"choices" => [
					"inherit" => __( 'Use from Theme Settings', 'ohio' ),
					"default" => __( 'Default', 'ohio' ),
					"small" => __( 'Small', 'ohio' ),
					"large" => __( 'Large', 'ohio' )
				],
				"default_value" => [
					"default"
				],
				"allow_null" => 0,
				"multiple" => 0,
				"ui" => 0,
				"ajax" => 0,
				"return_format" => "value",
				"placeholder" => ""
			],
			[
				"key" => "field_593dd523442330",
				"label" => __( 'Position', 'ohio' ),
				"name" => "pagination_position",
				"type" => "button_group",
				"instructions" => __( 'Choose the position of the pagination for this page.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => 0,
				"choices" => [
					"inherit" => __( '<em class="acf-js-tooltip" title="Use from Theme Settings"><i class="bi bi-globe"></i></em>', 'ohio' ),
                    "left" => __( '<i class="bi bi-text-left"></i> Left', 'ohio' ),
                    "center" => __( '<i class="bi bi-text-center"></i> Center', 'ohio' ),
                    "right" => __( '<i class="bi bi-text-right"></i> Right', 'ohio' )
                ],
				"default_value" => [
					"left"
				],
				"allow_null" => 0,
				"multiple" => 0,
				"ui" => 0,
				"ajax" => 0,
				"return_format" => "value",
				"placeholder" => ""
			]
		],
		"location" => [
			[
				[
					"param" => "page_template",
					"operator" => "==",
					"value" => "page_templates/page_for-posts.php"
				],
				[
					"param" => "post_type",
					"operator" => "==",
					"value" => "page"
				]
			]
		],
		"menu_order" => 0,
		"position" => "normal",
		"style" => "default",
		"label_placement" => "left",
		"instruction_placement" => "label",
		"hide_on_screen" => "",
		"active" => 1,
		"description" => ""
	] );

endif;
