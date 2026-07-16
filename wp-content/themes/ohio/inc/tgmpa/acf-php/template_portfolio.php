<?php if ( function_exists( 'acf_add_local_field_group' ) ) :

	acf_add_local_field_group( [
		"key" => "group_592fd650bf099",
		"title" => __( 'Portfolio Settings', 'ohio' ),
		"private" => true,
		"fields" => [
			[
				"key" => "field_591b002d4818cffmod",
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
				"key" => "field_5937e0a52b48ce86od152",
				"label" => "",
				"name" => "",
				"type" => "message",
				"instructions" => "",
				"required" => 0,
				"conditional_logic" => 0,
				"message" => '<p class="message">' . '<i class="bi bi-question-circle"></i>' . __( 'To find more portfolio page settings navigate to', 'ohio' ) . '&nbsp;<a target="_blank" href="./admin.php?page=ohio_hub_settings&options_page=theme-general-portfolio">' . __( 'Global Theme Settings', 'ohio' ) . '</a></p>',
				"new_lines" => "",
				"esc_html" => 0
			],
			[
				"key" => "field_59fa4344b383615p",
				"label" => __( 'Layout', 'ohio' ),
				"name" => "portfolio_item_layout_type",
				"type" => "image_option",
				"instructions" => __( 'Choose a portfolio layout type for this page.', 'ohio' ),
				"conditional_logic" => 0,
				"default_value" => "inherit",
				"image_option_value" => [
					[
						"name" => "inherit",
						"description" => __( 'Use from Theme Settings', 'ohio' ),
						"src" => "acf__image_inherited.svg"
					],
					[
						"name" => "grid_1",
						"description" => __( 'Classic Grid', 'ohio' ),
						"src" => "acf__image_portfolio_01.svg"
					],
					[
						"name" => "grid_2",
						"description" => __( 'Minimal Grid', 'ohio' ),
						"src" => "acf__image_portfolio_02.svg"
					],
					[
						"name" => "grid_13",
						"description" => __( 'Sticky Grid', 'ohio' ),
						"src" => "acf__image_portfolio_46.svg"
					],
					[
						"name" => "grid_11",
						"description" => __( 'Caption Cursor Grid', 'ohio' ),
						"src" => "acf__image_portfolio_43.svg"
					],
					[
						"name" => "grid_3",
						"description" => __( 'Slider: Horizontal', 'ohio' ),
						"src" => "acf__image_portfolio_03.svg"
					],
					[
						"name" => "grid_4",
						"description" => __( 'Slider: Vertical', 'ohio' ),
						"src" => "acf__image_portfolio_04.svg"
					],
					[
						"name" => "grid_6",
						"description" => __( 'Carousel: Horizontal', 'ohio' ),
						"src" => "acf__image_portfolio_06.svg"
					],
					[
						"name" => "grid_5",
						"description" => __( 'Smooth Scroll: Split Screen', 'ohio' ),
						"src" => "acf__image_portfolio_05.svg"
					],
					[
						"name" => "grid_7",
						"description" => __( 'Smooth Scroll: Fullscreen', 'ohio' ),
						"src" => "acf__image_portfolio_07.svg"
					],
					[
						"name" => "grid_9",
						"description" => __( 'Smooth Scroll: Scattered', 'ohio' ),
						"src" => "acf__image_portfolio_37.svg"
					],
					[
						"name" => "grid_10",
						"description" => __( 'Smooth Scroll: Centered', 'ohio' ),
						"src" => "acf__image_portfolio_38.svg"
					],
					[
						"name" => "grid_8",
						"description" => __( 'Interactive: Links', 'ohio' ),
						"src" => "acf__image_portfolio_42.svg"
					],
					[
						"name" => "grid_12",
						"description" => __( 'Interactive: Vertical Links', 'ohio' ),
						"src" => "acf__image_portfolio_45.svg"
					]
				]
			],
			[
				"key" => "field_5d5313712d7c3",
				"label" => __( 'Categories', 'ohio' ),
				"name" => "portfolio_categories",
				"type" => "taxonomy",
 				"instructions" => __( 'Leave empty to output all categories.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => 0,
				"taxonomy" => "ohio_portfolio_category",
				"field_type" => "multi_select",
				"add_term" => 0,
				"save_terms" => 0,
				"load_terms" => 0,
				"return_format" => "object",
				"multiple" => 1,
				"allow_null" => 0
			],
			[
				"key" => "field_59fb4334a433615p",
				"label" => __( 'Items Per Page', 'ohio' ),
				"name" => "portfolio_projects_per_page",
				"type" => "number",
				"instructions" => __( 'Set a number of portfolio items per page.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => 0,
				"default_value" => 12,
				"placeholder" => "",
				"prepend" => "",
				"append" => __( 'projects', 'ohio' ),
				"min" => 1,
				"max" => 250,
				"step" => 1
			],
			[
				"key" => "field_59fb4313b343615p",
				"label" => __( 'Items Per Row', 'ohio' ),
				"name" => "portfolio_columns_in_row",
				"type" => "ohio_columns",
				"instructions" => __( 'Set a number of portfolio items per row.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_3"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_4"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_5"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_7"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_8"
						]
					]
				],
				"default_value" => "i-i-i",
				"use_inherit" => true
			],
			[
				"key" => "field_59jg40ll21sdcs",
				"label" => __( 'Randomized Order', 'ohio' ),
				"name" => "portfolio_randomized_order",
				"type" => "inherited_checkbox",
				"instructions" => __( 'Randomize the order of project items on each page reloading.', 'ohio' ),
				"required" => 0,
				"custom_labels" => [
					"inherit" => __( 'Use from Theme Settings', 'ohio' ),
					"yes" => __( 'Yes', 'ohio' ),
					"no" => __( 'No', 'ohio' )
				],
				"default_value" => "inherit",
				"allow_null" => 0,
				"other_choice" => 0,
				"save_other_choice" => 0,
				"layout" => "horizontal",
				"return_format" => "value"
			],
			[
				"key" => "field_592dlf5682k57l98",
				"label" => '<h4>' . __( 'Thumbnails', 'ohio' ) . '</h4>',
				"name" => "",
				"type" => "message"
			],
			[
				"key" => "field_59fa41123412345p",
				"label" => __( 'Hover Effect', 'ohio' ),
				"name" => "portfolio_grid_hover",
				"type" => "select",
				"instructions" => __( 'Choose the type of the featured image hover effect.', 'ohio' ),
				"default_value" => "inherit",
				"conditional_logic" => [
					[
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_3"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_4"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_5"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_6"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_7"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_8"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_9"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_10"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_12"
						]
					]
				],
				"choices" => [
					"inherit" => __( 'Use from Theme Settings', 'ohio' ),
					"none" => __( 'None', 'ohio' ),
					"scale" => __( 'Image Scaling', 'ohio' ),
					"overlay" => __( 'Image Overlay', 'ohio' ),
					"greyscale" => __( 'Image Greyscale', 'ohio' ),
					"transition" => __( 'Image Transition', 'ohio' ),
				],
			],
			[
				"key" => "field_59fb4n52l433",
				"label" => __( 'Tilt Effect', 'ohio' ),
				"name" => "portfolio_tilt_effect",
				"type" => "inherited_checkbox",
				"instructions" => __( 'Enable parallax hover tilt effect for portfolio items.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => 0,
				"custom_labels" => [
					"inherit" => __( 'Use from Theme Settings', 'ohio' ),
					"show" => __( 'Show', 'ohio' ),
					"hide" => __( 'Hide', 'ohio' )
				],
				"allow_null" => 0,
				"other_choice" => 0,
				"save_other_choice" => 0,
				"default_value" => "inherit",
				"layout" => "horizontal",
				"return_format" => "value"
			],
			[
				"key" => "field_5937a0a25fd23s15p",
				"label" => '<h4>' . __( 'Entrance Animation', 'ohio' ) . '</h4>',
				"name" => "",
				"conditional_logic" => [
					[
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_3"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_4"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_5"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_6"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_7"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_8"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_9"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_10"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_12"
						]
					]
				],
				"type" => "message"
			],
			[
				"key" => "field_59fb4312b343615p",
				"label" => __( 'Animation Type', 'ohio' ),
				"name" => "page_animation_type",
				"type" => "select",
				"instructions" => __( 'Choose the type of the grid entrance animation.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_3"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_4"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_5"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_6"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_7"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_8"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_9"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_10"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_12"
						]
					]
				],
				"choices" => [
					"inherit" => __( 'Use from Theme Settings', 'ohio' ),
					"default" => __( 'Disable', 'ohio' ),
					"sync" => __( 'Synchronous', 'ohio' ),
					"async" => __( 'Asynchronous', 'ohio' )
				],
				"default_value" => [
					"inherit"
				],
				"allow_null" => 0,
				"other_choice" => 0,
				"save_other_choice" => 0,
				"layout" => "horizontal",
				"return_format" => "value"
			],
			[
				"key" => "field_59fb4332b343615p",
				"label" => __( 'Animation Effect', 'ohio' ),
				"name" => "page_animation_effect",
				"type" => "select",
				"instructions" => __( 'Choose the type of the grid entrance animation effect.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_59fb4312b343615p",
							"operator" => "!=",
							"value" => "inherit"
						],
						[
							"field" => "field_59fb4312b343615p",
							"operator" => "!=",
							"value" => "default"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_3"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_4"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_5"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_6"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_7"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_8"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_9"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_10"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_12"
						]
					]
				],
				"choices" => [
					"fade-up" => __( 'Fade up', 'ohio' ),
					"fade-left" => __( 'Fade left', 'ohio' ),
					"fade-right" => __( 'Fade right', 'ohio' ),
					"slide-up" => __( 'Slide up', 'ohio' ),
					"flip-down" => __( 'Flip down', 'ohio' ),
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
				"key" => "field_591b002d4818cffmodpcs",
				"label" => __( 'Grid / Slides', 'ohio' ),
				"name" => "",
				"type" => "tab",
				"instructions" => "",
				"required" => 0,
				"conditional_logic" => 0,
				"placement" => "top",
				"endpoint" => 0
			],
			[
				"key" => "field_59fb4313b383615p",
				"label" => __( 'Gutters', 'ohio' ),
				"name" => "grid_items_without_padding",
				"type" => "inherited_checkbox",
				"instructions" => __( 'Remove gutters between the portfolio items.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_3"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_4"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_5"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_6"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_7"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_8"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_9"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_10"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_12"
						]
					]
				],
				"custom_labels" => [
					"inherit" => __( 'Use from Theme Settings', 'ohio' ),
					"yes" => __( 'Yes', 'ohio' ),
					"no" => __( 'No', 'ohio' )
				],
				"default_value" => "inherit",
				"allow_null" => 0,
				"other_choice" => 0,
				"save_other_choice" => 0,
				"layout" => "horizontal",
				"return_format" => "value"
			],
			[
				"key" => "field_59f2342343s83615p",
				"label" => __( 'Equal Height', 'ohio' ),
				"name" => "portfolio_equal_height",
				"type" => "inherited_checkbox",
				"instructions" => __( 'Convert a rectangular image thumbnails into a cropped square.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_3"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_4"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_5"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_6"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_7"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_8"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_9"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_10"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_12"
						]
					]
				],
				"custom_labels" => [
					"inherit" => __( 'Use from Theme Settings', 'ohio' ),
					"yes" => __( 'Yes', 'ohio' ),
					"no" => __( 'No', 'ohio' )
				],
				"default_value" => "inherit",
				"allow_null" => 0,
				"other_choice" => 0,
				"save_other_choice" => 0,
				"layout" => "horizontal",
				"return_format" => "value"
			],
			[
				"key" => "field_592d60af8fb80d",
				"label" => __( 'Contained Layout', 'ohio' ),
				"name" => "portfolio_items_boxed_style",
				"type" => "inherited_checkbox",
				"instructions" => __( 'Wrap a single grid item into a filled container.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[	
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_2"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_3"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_4"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_5"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_6"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_7"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_8"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_9"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_10"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_11"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_12"
						]
					]
				],
				"custom_labels" => [
					"inherit" => __( 'Use from Theme Settings', 'ohio' ),
					"yes" => __( 'Yes', 'ohio' ),
					"no" => __( 'No', 'ohio' )
				],
				"default_value" => "inherit",
				"allow_null" => 0,
				"other_choice" => 0,
				"save_other_choice" => 0,
				"layout" => "horizontal",
				"return_format" => "value"
			],
			[
				"key" => "field_593923234234235235236weq",
				"label" => __( 'Reversed Layout', 'ohio' ),
				"name" => "portfolio_grid_reversed",
				"type" => "inherited_checkbox",
				"instructions" => __( 'Make all even grid items reversed.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "==",
							"value" => "grid_13"
						]
					]
				],
				"custom_labels" => [
					"inherit" => __( 'Use from Theme Settings', 'ohio' ),
					"yes" => __( 'Yes', 'ohio' ),
					"no" => __( 'No', 'ohio' )
				],
				"default_value" => "inherit",
				"allow_null" => 0,
				"other_choice" => 0,
				"save_other_choice" => 0,
				"layout" => "horizontal",
				"return_format" => "value"
			],
			[
				"key" => "field_592d60af8b235456",
				"label" => __( 'Drop Shadow', 'ohio' ),
				"name" => "portfolio_drop_shadow",
				"type" => "inherited_checkbox",
				"instructions" => __( 'Drop shadow for portfolio items', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_3"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_4"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_5"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_6"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_7"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_8"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_9"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_10"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_12"
						]
					]
				],
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
				"key" => "field_59fb4n5asfol434",
				"label" => __( 'Slider Direction', 'ohio' ),
				"name" => "portfolio_slider_direction",
				"type" => "select",
				"instructions" => __( 'Set the slider scroll direction.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_1"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_2"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_5"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_6"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_7"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_8"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_9"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_10"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_11"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_12"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_13"
						]
					]
				],
				"custom_labels" => [
					"inherit" => __( 'Use from Theme Settings', 'ohio' ),
					"show" => __( 'Show', 'ohio' ),
					"hide" => __( 'Hide', 'ohio' )
				],
				"choices" => [
					"inherit" => __( 'Use from Theme Settings', 'ohio' ),
					"horizontal" => __( 'Horizontal', 'ohio' ),
					"vertical" => __( 'Vertical', 'ohio' )
				],
				"allow_null" => 0,
				"other_choice" => 0,
				"save_other_choice" => 0,
				"default_value" => "inherit",
				"layout" => "horizontal",
				"return_format" => "value"
			],
			[
				"key" => "field_59fb4n5asfol434b",
				"label" => __( 'Slider Direction (Mobiles)', 'ohio' ),
				"name" => "portfolio_slider_direction_mobile",
				"type" => "select",
				"instructions" => __( 'Set the slider scroll direction on mobile devices.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_1"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_2"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_5"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_6"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_7"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_8"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_9"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_10"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_11"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_12"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_13"
						]
					]
				],
				"custom_labels" => [
					"inherit" => __( 'Use from Theme Settings', 'ohio' ),
					"show" => __( 'Show', 'ohio' ),
					"hide" => __( 'Hide', 'ohio' )
				],
				"choices" => [
					"inherit" => __( 'Use from Theme Settings', 'ohio' ),
					"horizontal" => __( 'Horizontal', 'ohio' ),
					"vertical" => __( 'Vertical', 'ohio' )
				],
				"allow_null" => 0,
				"other_choice" => 0,
				"save_other_choice" => 0,
				"default_value" => "inherit",
				"layout" => "horizontal",
				"return_format" => "value"
			],
			[
				"key" => "field_59fb4w123s9823058",
				"label" => __( 'Fullscreen Mode', 'ohio' ),
				"name" => "portfolio_fullscreen_mode",
				"type" => "inherited_checkbox",
				"instructions" => __( 'Enable a fullscreen mode for the portfolio slider / interactive links.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_1"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_2"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_11"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_13"
						]
					]
				],
				"custom_labels" => [
					"inherit" => __( 'Use from Theme Settings', 'ohio' ),
					"show" => __( 'Show', 'ohio' ),
					"hide" => __( 'Hide', 'ohio' )
				],
				"allow_null" => 0,
				"other_choice" => 0,
				"save_other_choice" => 0,
				"default_value" => "inherit",
				"layout" => "horizontal",
				"return_format" => "value"
			],
			[
				"key" => "field_59fbl4lphpoy244",
				"label" => __( 'Loop Mode', 'ohio' ),
				"name" => "portfolio_loop_mode",
				"type" => "inherited_checkbox",
				"instructions" => __( 'Enable a loop mode for the portfolio slider elements.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_1"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_2"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_11"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_13"
						]
					]
				],
				"custom_labels" => [
					"inherit" => __( 'Use from Theme Settings', 'ohio' ),
					"show" => __( 'Show', 'ohio' ),
					"hide" => __( 'Hide', 'ohio' )
				],
				"allow_null" => 0,
				"other_choice" => 0,
				"save_other_choice" => 0,
				"default_value" => "inherit",
				"layout" => "horizontal",
				"return_format" => "value"
			],
			[
				"key" => "field_59fb4n52n3lool433",
				"label" => __( 'Mouse-Wheel Scrolling', 'ohio' ),
				"name" => "portfolio_mousewheel_mode",
				"type" => "inherited_checkbox",
				"instructions" => __( 'Enable a mouse-wheel scrolling for portfolio sliders.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_1"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_2"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_11"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_13"
						]
					]
				],
				"custom_labels" => [
					"inherit" => __( 'Use from Theme Settings', 'ohio' ),
					"show" => __( 'Show', 'ohio' ),
					"hide" => __( 'Hide', 'ohio' )
				],
				"allow_null" => 0,
				"other_choice" => 0,
				"save_other_choice" => 0,
				"default_value" => "inherit",
				"layout" => "horizontal",
				"return_format" => "value"
			],
			[
				"key" => "field_59fb4n52n3lool434",
				"label" => __( 'Drag Scrolling', 'ohio' ),
				"name" => "portfolio_dragscroll_mode",
				"type" => "inherited_checkbox",
				"instructions" => __( 'Enable a drag scrolling for portfolio sliders.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_1"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_2"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_8"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_11"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_12"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_13"
						]
					]
				],
				"custom_labels" => [
					"inherit" => __( 'Use from Theme Settings', 'ohio' ),
					"show" => __( 'Show', 'ohio' ),
					"hide" => __( 'Hide', 'ohio' )
				],
				"allow_null" => 0,
				"other_choice" => 0,
				"save_other_choice" => 0,
				"default_value" => "inherit",
				"layout" => "horizontal",
				"return_format" => "value"
			],
			[
				"key" => "field_59lbl52lkfkf032",
				"label" => __( 'Autoplay Mode', 'ohio' ),
				"name" => "portfolio_autoplay_mode",
				"type" => "inherited_checkbox",
				"instructions" => __( 'Enable an autoplay mode for portfolio sliders.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_1"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_2"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_8"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_11"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_12"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_13"
						]
					]
				],
				"custom_labels" => [
					"inherit" => __( 'Use from Theme Settings', 'ohio' ),
					"show" => __( 'Show', 'ohio' ),
					"hide" => __( 'Hide', 'ohio' )
				],
				"allow_null" => 0,
				"other_choice" => 0,
				"save_other_choice" => 0,
				"default_value" => "inherit",
				"layout" => "horizontal",
				"return_format" => "value"
			],
			[
				"key" => "field_5kj23bk5n43345kjb",
				"label" => __( 'Autoplay Interval Timeout', 'ohio' ),
				"name" => "portfolio_autoplay_interval",
				"type" => "number",
				"instructions" => __( 'Set an interval timeout for the autoplay mode.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_59lbl52lkfkf032",
							"operator" => "==",
							"value" => "1"
						]
					]
				],
				"allow_null" => 0,
				"other_choice" => 0,
				"save_other_choice" => 0,
				"default_value" => "inherit",
				"layout" => "horizontal",
				"return_format" => "value",
				"append" => __( 'Ms', 'ohio' )
			],
			[
				"key" => "field_5937203468970325t",
				"label" => '<h4>' . __( 'Styles and Display', 'ohio' ) . '</h4>',
				"name" => "",
				"conditional_logic" => 0,
				"type" => "message"
			],
			[
				"key" => "field_59fb433432gnr1f",
				"label" => __( 'Navigation', 'ohio' ),
				"name" => "portfolio_nav_visibility",
				"type" => "inherited_checkbox",
				"instructions" => __( 'Show navigation buttons on portfolio sliders.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_1"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_2"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_11"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_13"
						]
					]
				],
				"custom_labels" => [
					"inherit" => __( 'Use from Theme Settings', 'ohio' ),
					"show" => __( 'Show', 'ohio' ),
					"hide" => __( 'Hide', 'ohio' )
				],
				"allow_null" => 0,
				"other_choice" => 0,
				"save_other_choice" => 0,
				"default_value" => "inherit",
				"layout" => "horizontal",
				"return_format" => "value"
			],
			[
				"key" => "field_59fb43lh421g23",
				"label" => __( 'Bullets', 'ohio' ),
				"name" => "portfolio_bullets_visibility",
				"type" => "inherited_checkbox",
				"instructions" => __( 'Show bullets bar on portfolio sliders.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_1"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_2"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_11"
						],
						[
							"field" => "field_59fa4344b383615p",
							"operator" => "!=",
							"value" => "grid_13"
						]
					]
				],
				"custom_labels" => [
					"inherit" => __( 'Use from Theme Settings', 'ohio' ),
					"show" => __( 'Show', 'ohio' ),
					"hide" => __( 'Hide', 'ohio' )
				],
				"allow_null" => 0,
				"other_choice" => 0,
				"save_other_choice" => 0,
				"default_value" => "inherit",
				"layout" => "horizontal",
				"return_format" => "value"
			],
			[
				"key" => "field_5436we346g6vdf6",
				"label" => __( 'Video Button', 'ohio' ),
				"name" => "portfolio_video_visibility",
				"type" => "inherited_checkbox",
				"instructions" => __( 'Show a play video button on the portfolio items.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => 0,
				"custom_labels" => [
					"inherit" => __( 'Use from Theme Settings', 'ohio' ),
					"show" => __( 'Show', 'ohio' ),
					"hide" => __( 'Hide', 'ohio' )
				],
				"allow_null" => 0,
				"other_choice" => 0,
				"save_other_choice" => 0,
				"default_value" => "inherit",
				"layout" => "horizontal",
				"return_format" => "value"
			],
			[
				"key" => "field_59fb4312b343615asdasdx",
				"label" => __( 'Video Button Style', 'ohio' ),
				"name" => "portfolio_video_button_style",
				"type" => "select",
				"instructions" => __( 'Choose a video button style.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_5436we346g6vdf6",
							"operator" => "==",
							"value" => "1"
						]
					]
				],
				"choices" => [
					"inherit" => __( 'Use from Theme Settings', 'ohio' ),
					"default" => __( 'Default', 'ohio' ),
					"outlined" => __( 'Outlined', 'ohio' ),
					"blurred" => __( 'Blurred', 'ohio' )
				],
				"default_value" => [
					"inherit"
				],
				"allow_null" => 0,
				"other_choice" => 0,
				"save_other_choice" => 0,
				"layout" => "horizontal",
				"return_format" => "value"
			],
			[
				"key" => "field_59fb4312b343615ajhlk",
				"label" => __( 'Video Button Size', 'ohio' ),
				"name" => "portfolio_video_button_size",
				"type" => "select",
				"instructions" => __( 'Choose a video button size.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_5436we346g6vdf6",
							"operator" => "==",
							"value" => "1"
						]
					]
				],
				"choices" => [
					"inherit" => __( 'Use from Theme Settings', 'ohio' ),
					"default" => __( 'Default', 'ohio' ),
					"small" => __( 'Small', 'ohio' ),
					"large" => __( 'Large', 'ohio' )
				],
				"default_value" => [
					"inherit"
				],
				"allow_null" => 0,
				"other_choice" => 0,
				"save_other_choice" => 0,
				"layout" => "horizontal",
				"return_format" => "value"
			],
			[
				"key" => "field_59392398832343d99asdasdw",
				"label" => __( 'Video Button Color', 'ohio' ),
				"name" => "portfolio_grid_video_btn_bg",
				"type" => "ohio_color",
				"instructions" => __( 'Set a video button color.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_5436we346g6vdf6",
							"operator" => "==",
							"value" => "1"
						]
					]
				],
			],
			[
				"key" => "field_591b002d4819cffmod",
				"label" => __( 'Filters', 'ohio' ),
				"name" => "",
				"type" => "tab",
				"instructions" => "",
				"required" => 0,
				"conditional_logic" => 0,
				"placement" => "top",
				"endpoint" => 0
			],
			[
				"key" => "field_59fb4334b343615p",
				"label" => __( 'Filters', 'ohio' ),
				"name" => "project_page_filter_visibility",
				"type" => "inherited_checkbox",
				"instructions" => __( 'Show the category filters on the portfolio page.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => 0,
				"custom_labels" => [
					"inherit" => __( 'Use from Theme Settings', 'ohio' ),
					"show" => __( 'Show', 'ohio' ),
					"hide" => __( 'Hide', 'ohio' )
				],
				"allow_null" => 0,
				"other_choice" => 0,
				"save_other_choice" => 0,
				"default_value" => "inherit",
				"layout" => "horizontal",
				"return_format" => "value"
			],
			[
				"key" => "field_5937a54r323552p",
				"label" => __( 'Layout', 'ohio' ),
				"name" => "project_filter_layout",
				"type" => "select",
				"instructions" => __( 'Choose the category filters layout.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_592fd651222a5",
							"operator" => "!=",
							"value" => "hide"
						]
					]
				],
				"choices" => [
					"inherit" => __( 'Use from Theme Settings', 'ohio' ),
					"default" => __( 'Default', 'ohio' ),
					"button" => __( 'Button', 'ohio' )
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
				"key" => "field_592fd6512267d",
				"label" => __( 'Position', 'ohio' ),
				"name" => "project_filter_align",
				"type" => "button_group",
				"instructions" => __( 'Choose the position of the category filters on this page.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_592fd651222a5",
							"operator" => "!=",
							"value" => "hide"
						]
					]
				],
				"choices" => [
					"inherit" => __( '<em class="acf-js-tooltip" title="Use from Theme Settings"><i class="bi bi-globe"></i></em>', 'ohio' ),
                    "left" => __( '<i class="bi bi-text-left"></i> Left', 'ohio' ),
                    "center" => __( '<i class="bi bi-text-center"></i> Center', 'ohio' ),
                    "right" => __( '<i class="bi bi-text-right"></i> Right', 'ohio' )
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
				"key" => "field_593235w353s15b",
				"label" => '<h4>' . __( 'Styles and Display', 'ohio' ) . '</h4>',
				"name" => "",
				"type" => "message"
			],
			[
				"key" => "field_5ewf4dx8b11fg36q5",
				"label" => __( 'Empty Categories ', 'ohio' ),
				"name" => "project_filter_show_empty_categories",
				"type" => "inherited_checkbox",
				"instructions" => __( 'Show empty categories that have no associated projects.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_592fd651222a5",
							"operator" => "!=",
							"value" => "hide"
						]
					]
				],
				"custom_labels" => [
					"inherit" => __( 'Use from Theme Settings', 'ohio' ),
					"show" => __( 'Show', 'ohio' ),
					"hide" => __( 'Hide', 'ohio' )
				],
				"allow_null" => 0,
				"other_choice" => 0,
				"save_other_choice" => 0,
				"default_value" => "inherit",
				"layout" => "horizontal",
				"return_format" => "value"
			],
			[
				"key" => "field_592fd651222a5_tcol",
				"label" => __( 'Filters Typography', 'ohio' ),
				"name" => "project_filter_text_typo",
				"type" => "ohio_typo",
				"instructions" => __( 'Set the typography and color for the category filters.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_592fd651222a5",
							"operator" => "!=",
							"value" => "hide"
						]
					]
				],
				"default_value" => "inherit",
				"add_theme_inherited" => false
			],
			[
				"key" => "field_592fd651222a5_acol",
				"label" => __( 'Active Filters Typography', 'ohio' ),
				"name" => "project_filter_accent_typo",
				"type" => "ohio_typo",
				"instructions" => __( 'Set the typography and color for the active category filters.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_592fd651222a5",
							"operator" => "!=",
							"value" => "hide"
						]
					]
				],
				"default_value" => "inherit",
				"add_theme_inherited" => false
			],
			[
				"key" => "field_5937a54r3hs231p",
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
				"key" => "field_592fd65121624",
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
				"key" => "field_593dd5f56ba32s",
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
				"key" => "field_593dd523442331s",
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
				"key" => "field_59fb4334bgd33615",
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
					"inherit"
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
					"value" => "page_templates/page_for-projects.php"
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
