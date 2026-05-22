<?php if ( function_exists( 'acf_add_local_field_group' ) ) :

	acf_add_local_field_group( [
		"key" => "group_592fd665c6552",
		"title" => __( 'Portfolio Settings', 'ohio' ),
		"private" => true,
		"fields" => [
			[
				"key" => "field_592fe6046937d",
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
				"key" => "field_5937e0a52b48cexmod155",
				"label" => "",
				"name" => "",
				"type" => "message",
				"instructions" => "",
				"required" => 0,
				"conditional_logic" => 0,
				"message" => '<p class="message">' . '<i class="bi bi-question-circle"></i>' . __( 'When you edit Theme Settings, the changes apply to your entire site. Use local Page Settings to override options for individual pages.', 'ohio' ) . '</p>',
				"new_lines" => "",
				"esc_html" => 0
			],
			[
				"key" => "field_59fa4344b383615",
				"label" => __( 'Layout', 'ohio' ),
				"name" => "global_portfolio_item_layout_type",
				"type" => "image_option",
				"instructions" => __( 'Choose a portfolio layout type for the entire site.', 'ohio' ),
				"conditional_logic" => 0,
				"default_value" => "grid_1",
				"image_option_value" => [
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
						"name" => "grid_11",
						"description" => __( 'Caption Cursor Grid', 'ohio' ),
						"src" => "acf__image_portfolio_43.svg"
					],
					[
						"name" => "grid_13",
						"description" => __( 'Sticky Grid', 'ohio' ),
						"src" => "acf__image_portfolio_46.svg"
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
						"name" => "grid_5",
						"description" => __( 'Smooth Scroll: Split Screen', 'ohio' ),
						"src" => "acf__image_portfolio_05.svg"
					],
					[
						"name" => "grid_6",
						"description" => __( 'Carousel: Horizontal', 'ohio' ),
						"src" => "acf__image_portfolio_06.svg"
					],
					[
						"name" => "grid_7",
						"description" => __( 'Smooth Scroll: Fullscreen', 'ohio' ),
						"src" => "acf__image_portfolio_07.svg"
					],
					[
						"name" => "grid_8",
						"description" => __( 'Interactive: Links', 'ohio' ),
						"src" => "acf__image_portfolio_42.svg"
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
						"name" => "grid_12",
						"description" => __( 'Interactive: Vertical Links', 'ohio' ),
						"src" => "acf__image_portfolio_45.svg"
					]
				]
			],
			[
				"key" => "field_592fd666241be",
				"label" => __( 'Portfolio Page', 'ohio' ),
				"name" => "global_portfolio_page",
				"type" => "page_link",
				"instructions" => __( 'Set the base portfolio page for entire site.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => 0,
				"post_type" => [
					"page"
				],
				"taxonomy" => [],
				"allow_null" => 0,
				"allow_archives" => 0,
				"multiple" => 0
			],
			[
				"key" => "field_59fb4334a433615",
				"label" => __( 'Items Per Page', 'ohio' ),
				"name" => "global_portfolio_projects_per_page",
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
				"key" => "field_59fb4313b343615",
				"label" => __( 'Items Per Row', 'ohio' ),
				"name" => "global_portfolio_columns_in_row",
				"type" => "ohio_columns",
				"instructions" => __( 'Set a number of portfolio items per row.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_3"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_4"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_5"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_6"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_7"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_8"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_9"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_10"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_12"
						]
					]
				],
				"default_value" => "2-2-1"
			],
			[
				"key" => "field_59jg40ll21sdcc",
				"label" => __( 'Randomized Order', 'ohio' ),
				"name" => "global_portfolio_randomized_order",
				"type" => "true_false",
				"instructions" => __( 'Randomize the order of project items on each page reloading.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => 0,
				"message" => "",
				"default_value" => 0,
				"ui" => 1,
				"ui_on_text" => "",
				"ui_off_text" => ""
			],
			[
				"key" => "field_592dlf5682k57t",
				"label" => '<h4>' . __( 'Thumbnails', 'ohio' ) . '</h4>',
				"name" => "",
				"type" => "message"
			],
			[
				"key" => "field_592fd66v12ffaqwba22c",
				"label" => __( 'Thumbnail Size', 'ohio' ),
				"name" => "global_portfolio_images_size",
				"type" => "select",
				"instructions" => __( 'Choose the size of the featured image thumbnail.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => 0,
				"choices" => [
					"thumbnail" => __( 'Thumbnail', 'ohio' ),
					"medium" => __( 'Small', 'ohio' ),
					"medium_large" => __( 'Medium', 'ohio' ),
					"large" => __( 'Large', 'ohio' ),
					"ohio_full" => __( 'Original', 'ohio' )
				],
				"allow_null" => 0,
				"other_choice" => 0,
				"save_other_choice" => 0,
				"default_value" => "medium_large",
				"layout" => "horizontal",
				"return_format" => "value"
			],
			[
				"key" => "field_59fa41123412345",
				"label" => __( 'Hover Effect', 'ohio' ),
				"name" => "global_portfolio_grid_hover",
				"type" => "select",
				"instructions" => __( 'Choose the type of the featured image hover effect.', 'ohio' ),
				"default_value" => "type1",
				"conditional_logic" => [
					[
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_3"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_4"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_5"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_6"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_7"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_8"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_9"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_10"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_12"
						]
					]
				],
				"choices" => [
					"none" => __( 'None', 'ohio' ),
					"scale" => __( 'Image Scaling', 'ohio' ),
					"overlay" => __( 'Image Overlay', 'ohio' ),
					"greyscale" => __( 'Image Greyscale', 'ohio' ),
					"transition" => __( 'Image Transition', 'ohio' ),
				],
			],
			[
				"key"=> "field_59fb4w121284912hjfol",
				"label" => __( 'Tilt Effect', 'ohio' ),
				"name"=> "global_portfolio_tilt_effect",
				"type"=> "true_false",
				"instructions" => __( 'Enable parallax hover tilt effect for portfolio items.', 'ohio' ),
				"required"=> 0,
				"conditional_logic"=> 0,
				"message"=> "",
				"default_value"=> 1,
				"ui"=> 1,
				"ui_on_text"=> "",
				"ui_off_text"=> ""
			],
			[
				"key" => "field_59fb4334a433615asrt3t2",
				"label" => __( 'Tilt Effect Perspective', 'ohio' ),
				"name" => "global_portfolio_tilt_effect_perspective",
				"type" => "number",
				"instructions" => __( 'Set the perspective value for the tilt hover effect.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_59fb4w121284912hjfol",
							"operator" => "==",
							"value" => "1"
						]
					]
				],
				"default_value" => 6000,
				"placeholder" => "",
				"prepend" => "",
			],
			[
				"key" => "field_5937a0a25fd23s15gh",
				"label" => '<h4>' . __( 'Entrance Animation', 'ohio' ) . '</h4>',
				"name" => "",
				"conditional_logic" => [
					[
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_3"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_4"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_5"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_6"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_7"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_8"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_9"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_10"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_12"
						]
					]
				],
				"type" => "message"
			],
			[
				"key" => "field_59fb4312b343615",
				"label" => __( 'Animation Type', 'ohio' ),
				"name" => "global_portfolio_page_animation_type",
				"type" => "select",
				"instructions" => __( 'Choose the type of the grid entrance animation.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_3"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_4"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_5"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_6"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_7"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_8"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_9"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_10"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_12"
						]
					]
				],
				"choices" => [
					"default" => __( 'Disable', 'ohio' ),
					"sync" => __( 'Synchronous', 'ohio' ),
					"async" => __( 'Asynchronous', 'ohio' )
				],
				"default_value" => [
					"default"
				],
				"allow_null" => 0,
				"other_choice" => 0,
				"save_other_choice" => 0,
				"layout" => "horizontal",
				"return_format" => "value"
			],
			[
				"key" => "field_59fb4332b343615",
				"label" => __( 'Animation Effect', 'ohio' ),
				"name" => "global_portfolio_page_animation_effect",
				"type" => "select",
				"instructions" => __( 'Choose the type of the grid entrance animation effect.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_59fb4312b343615",
							"operator" => "!=",
							"value" => "default"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_3"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_4"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_5"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_6"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_7"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_8"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_9"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_10"
						],
						[
							"field" => "field_59fa4344b383615",
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
					"flip-up" => __( 'Flip up', 'ohio' ),
					"zoom-in" => __( 'Zoom in', 'ohio' )
				],
				"default_value" => [
					"fade-up"
				],
				"allow_null" => 0,
				"multiple" => 0,
				"ui" => 0,
				"ajax" => 0,
				"return_format" => "value",
				"placeholder" => ""
			],
			[
				"key" => "field_59fb4332b34323fresdaw",
				"label" => __( 'Animation Repeat', 'ohio' ),
				"name" => "global_portfolio_page_animation_once",
				"type" => "true_false",
				"instructions" => __( 'Repeat the animation while scrolling page up and down.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_59fb4312b343615",
							"operator" => "!=",
							"value" => "default"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_3"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_4"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_5"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_6"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_7"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_8"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_9"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_10"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_12"
						]
					]
				],
				"message" => "",
				"default_value" => 1,
				"ui" => 1,
				"ui_on_text" => "",
				"ui_off_text" => ""
			],
			[
				"key" => "field_592d2039523l8",
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
				"key" => "field_592d2039523l9",
				"label" => '<h4>' . __( 'Grid', 'ohio' ) . '</h4>',
				"name" => "",
				"conditional_logic" => [
					[
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_3"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_4"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_5"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_6"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_7"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_8"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_9"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_10"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_12"
						]
					]
				],
				"type" => "message"
			],
			[
				"key" => "field_593f2445fbsdf2",
				"label" => __( 'Alignment', 'ohio' ),
				"name" => "global_projects_text_alignment",
				"type" => "button_group",
				"instructions" => __( 'Choose the grid content alignment for the entire site.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_3"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_4"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_5"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_6"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_7"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_8"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_9"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_10"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_12"
						]
					]
				],
				"choices" => [
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
			],
			[
				"key" => "field_59fb4313b383615",
				"label" => __( 'Gutters', 'ohio' ),
				"name" => "global_portfolio_grid_items_without_padding",
				"type" => "true_false",
				"instructions" => __( 'Remove gutters between the portfolio items.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_3"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_4"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_5"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_6"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_7"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_8"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_9"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_10"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_12"
						]
					]
				],
				"message" => "",
				"default_value" => 0,
				"ui" => 1,
				"ui_on_text" => "",
				"ui_off_text" => ""
			],
			[
				"key" => "field_59f2342343s83615",
				"label" => __( 'Equal Height', 'ohio' ),
				"name" => "global_portfolio_equal_height",
				"type" => "true_false",
				"instructions" => __( 'Convert a rectangular image thumbnails into a cropped square.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_3"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_4"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_5"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_6"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_7"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_8"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_9"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_10"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_12"
						]
					]
				],
				"message" => "",
				"default_value" => 0,
				"ui" => 1,
				"ui_on_text" => "",
				"ui_off_text" => ""
			],
			[
				"key" => "field_592d60af8fb80c",
				"label" => __( 'Contained Layout', 'ohio' ),
				"name" => "global_portfolio_items_boxed_style",
				"type" => "true_false",
				"instructions" => __( 'Wrap a single grid item into a filled container.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[	
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_2"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_3"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_4"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_5"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_6"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_7"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_8"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_9"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_10"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_11"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_12"
						]
					]
				],
				"ui" => 1,
				"ui_on_text" => __( 'Yes', 'ohio' ),
				"ui_off_text" => __( 'No', 'ohio' ),
				"message" => "",
				"default_value" => 1
			],
			[
				"key" => "field_593923234234235235236",
				"label" => __( 'Reversed Layout', 'ohio' ),
				"name" => "global_portfolio_grid_reversed",
				"type" => "true_false",
				"instructions" => __( 'Make all even grid items reversed.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_59fa4344b383615",
							"operator" => "==",
							"value" => "grid_13"
						]
					]
				],
				"ui" => 1,
				"ui_on_text" => __( 'Yes', 'ohio' ),
				"ui_off_text" => __( 'No', 'ohio' ),
				"message" => "",
				"default_value" => 1
			],
			[
				"key" => "field_592d60af8bc02124",
				"label" => __( 'Drop Shadow', 'ohio' ),
				"name" => "global_portfolio_drop_shadow",
				"type" => "true_false",
				"instructions" => __( 'Enable a drop shadow effect for the portfolio items.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_3"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_4"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_5"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_6"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_7"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_8"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_9"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_10"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_12"
						]
					]
				],
				"ui" => 1,
				"ui_on_text" => __( 'Yes', 'ohio' ),
				"ui_off_text" => __( 'No', 'ohio' ),
				"message" => "",
				"default_value" => 0
			],
			[
				"key" => "field_592d2039523l10",
				"label" => '<h4>' . __( 'Slides', 'ohio' ) . '</h4>',
				"name" => "",
				"conditional_logic" => [
					[
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_1"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_2"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_11"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_13"
						]
					]
				],
				"type" => "message"
			],
			[
				"key" => "field_59fb4w1124124215asdasgw",
				"label" => __( 'Slider Direction', 'ohio' ),
				"name" => "global_portfolio_slider_direction",
				"type" => "select",
				"instructions" => __( 'Set the slider scroll direction.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_1"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_2"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_5"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_6"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_7"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_8"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_9"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_10"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_11"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_12"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_13"
						]
					]
				],
				"choices" => [
					"horizontal" => __( 'Horizontal', 'ohio' ),
					"vertical" => __( 'Vertical', 'ohio' )
				],
				"default_value" => [
					"horizontal"
				],
				"allow_null" => 0,
				"multiple" => 0,
				"ui" => 0,
				"ajax" => 0,
				"return_format" => "value",
				"placeholder" => ""
			],
			[
				"key" => "field_59fb4w1124124215asdasgwb",
				"label" => __( 'Slider Direction (Mobiles)', 'ohio' ),
				"name" => "global_portfolio_slider_direction_mobile",
				"type" => "select",
				"instructions" => __( 'Set the slider scroll direction on mobile devices.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_1"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_2"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_5"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_6"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_7"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_8"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_9"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_10"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_11"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_12"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_13"
						]
					]
				],
				"choices" => [
					"horizontal" => __( 'Horizontal', 'ohio' ),
					"vertical" => __( 'Vertical', 'ohio' )
				],
				"default_value" => [
					"horizontal"
				],
				"allow_null" => 0,
				"multiple" => 0,
				"ui" => 0,
				"ajax" => 0,
				"return_format" => "value",
				"placeholder" => ""
			],
			[
				"key" => "field_59fb4w123s9823057",
				"label" => __( 'Fullscreen Mode', 'ohio' ),
				"name" => "global_portfolio_fullscreen_mode",
				"type" => "true_false",
				"instructions" => __( 'Enable a fullscreen mode for the portfolio slider / interactive links.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_1"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_2"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_11"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_13"
						]
					]
				],
				"message" => "",
				"default_value" => 1,
				"ui" => 1,
				"ui_on_text" => "",
				"ui_off_text" => ""
			],
			[
				"key" => "field_59fb4w123s2g3g42",
				"label" => __( 'Loop Mode', 'ohio' ),
				"name" => "global_portfolio_loop_mode",
				"type" => "true_false",
				"instructions" => __( 'Enable a loop mode for the portfolio slider elements.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_1"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_2"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_8"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_11"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_12"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_13"
						]
					]
				],
				"message" => "",
				"default_value" => 1,
				"ui" => 1,
				"ui_on_text" => "",
				"ui_off_text" => ""
			],
			[
				"key" => "field_59fb4w123s2g6",
				"label" => __( 'Mouse-Wheel Scrolling', 'ohio' ),
				"name" => "global_portfolio_mousewheel_mode",
				"type" => "true_false",
				"instructions" => __( 'Enable a mouse-wheel scrolling for portfolio sliders.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_1"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_2"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_8"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_11"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_12"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_13"
						]
					]
				],
				"message" => "",
				"default_value" => 1,
				"ui" => 1,
				"ui_on_text" => "",
				"ui_off_text" => ""
			],
			[
				"key" => "field_59fb4w123s2g7",
				"label" => __( 'Drag Scrolling', 'ohio' ),
				"name" => "global_portfolio_dragscroll_mode",
				"type" => "true_false",
				"instructions" => __( 'Enable a drag scrolling for portfolio sliders.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_1"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_2"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_8"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_11"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_12"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_13"
						]
					]
				],
				"message" => "",
				"default_value" => 1,
				"ui" => 1,
				"ui_on_text" => "",
				"ui_off_text" => ""
			],
			[
				"key" => "field_59fb4w123s2g4g43",
				"label" => __( 'Autoplay Mode', 'ohio' ),
				"name" => "global_portfolio_autoplay_mode",
				"type" => "true_false",
				"instructions" => __( 'Enable an autoplay mode for portfolio sliders.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_1"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_2"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_8"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_11"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_12"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_13"
						]
					]
				],
				"message" => "",
				"default_value" => 1,
				"ui" => 1,
				"ui_on_text" => "",
				"ui_off_text" => ""
			],
			[
				"key" => "field_59fb4w123s2g5",
				"label" => __( 'Autoplay Interval Timeout', 'ohio' ),
				"name" => "global_portfolio_autoplay_interval",
				"type" => "number",
				"instructions" => __( 'Set an interval timeout for the autoplay mode.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_59fb4w123s2g4g43",
							"operator" => "==",
							"value" => "1"
						]
					]
				],
				"default_value" => 5000,
				"placeholder" => "",
				"prepend" => "",
				"append" => "Ms"
			],
			[
				"key" => "field_5937a0a25ff35gh",
				"label" => '<h4>' . __( 'Styles and Display', 'ohio' ) . '</h4>',
				"name" => "",
				"conditional_logic" => 0,
				"type" => "message"
			],
			// [
			// 	"key" => "field_59391f24598db5182jglb",
			// 	"label" => __( 'Featured Image', 'ohio' ),
			// 	"name" => "global_project_add_featured_to_gallery",
			// 	"type" => "true_false",
			// 	"instructions" => __( 'Show featured image on the project items.', 'ohio' ),
			// 	"required" => 0,
			// 	"conditional_logic" => [
			// 		[
			// 			[
			// 				"field" => "field_59fb44344asdd33615",
			// 				"operator" => "!=",
			// 				"value" => "0"
			// 			]
			// 		]
			// 	],
			// 	"default_value" => 1,
			// 	"ui" => 1
			// ],
			[
				"key" => "field_59fb4w123s2g2f4w",
				"label" => __( 'Pagination', 'ohio' ),
				"name" => "global_portfolio_bullets_visibility",
				"type" => "true_false",
				"instructions" => __( 'Show the pagination bar on portfolio sliders.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_1"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_2"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_8"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_11"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_12"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_13"
						]
					]
				],
				"message" => "",
				"default_value" => 1,
				"ui" => 1,
				"ui_on_text" => "",
				"ui_off_text" => ""
			],
			[
				"key" => "field_59fb4w1124124215f4w",
				"label" => __( 'Pagination Type', 'ohio' ),
				"name" => "global_portfolio_bullets_type",
				"type" => "select",
				"instructions" => __( 'Select slider pagination type.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_59fb4w123s2g2f4w",
							"operator" => "==",
							"value" => "1"
						]
					]
				],
				"choices" => [
					"pagination" => __( 'Default', 'ohio' ),
					"boxed" => __( 'Boxed', 'ohio' ),
					"bullets" => __( 'Bullets', 'ohio' )
				],
				"default_value" => [
					"pagination"
				],
				"allow_null" => 0,
				"multiple" => 0,
				"ui" => 0,
				"ajax" => 0,
				"return_format" => "value",
				"placeholder" => ""
			],
			[
				"key" => "field_eg345345sdafas2342",
				"label" => __( 'Pagination Color', 'ohio' ),
				"name" => "global_portfolio_bullets_color",
				"type" => "ohio_color",
				"instructions" => __( 'Set the pagination color for portfolio sliders.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_59fb4w123s2g2f4w",
							"operator" => "==",
							"value" => "1"
						]
					]
				],
				"message" => "",
				"ui" => 1,
				"ui_on_text" => "",
				"ui_off_text" => ""
			],
			[
				"key" => "field_59fb4w123s2g1ase2",
				"label" => __( 'Navigation', 'ohio' ),
				"name" => "global_portfolio_nav_visibility",
				"type" => "true_false",
				"instructions" => __( 'Show navigation buttons on portfolio sliders.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_1"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_2"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_8"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_11"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_12"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_13"
						]
					]
				],
				"message" => "",
				"default_value" => 1,
				"ui" => 1,
				"ui_on_text" => "",
				"ui_off_text" => ""
			],
			[
				"key" => "field_eg345345sdafasf",
				"label" => __( 'Navigation Color', 'ohio' ),
				"name" => "global_portfolio_nav_color",
				"type" => "ohio_color",
				"instructions" => __( 'Set the navigation color for portfolio sliders.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_59fb4w123s2g1ase2",
							"operator" => "==",
							"value" => "1"
						]
					]
				],
				"message" => "",
				"ui" => 1,
				"ui_on_text" => "",
				"ui_off_text" => ""
			],
			[
				"key" => "field_59392323423423523",
				"label" => __( 'Contained Layout Background', 'ohio' ),
				"name" => "global_portfolio_grid_background_color",
				"type" => "ohio_color",
				"instructions" => __( 'Set the background color of the contained portfolio card item.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[	
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_2"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_3"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_4"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_5"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_6"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_7"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_8"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_9"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_10"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_11"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_12"
						]
					]
				],
			],
			[
				"key" => "field_59392398832343d98",
				"label" => __( 'Overlay Color', 'ohio' ),
				"name" => "global_portfolio_grid_overlay_color",
				"type" => "ohio_color",
				"instructions" => __( 'Set the portfolio grid/slides overlay background color.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[	
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_1"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_8"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_9"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_12"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_13"
						]
					]
				],
			],
			[
				"key" => "field_593f2345f6vdf6",
				"label" => __( 'Video Button', 'ohio' ),
				"name" => "global_portfolio_video_visibility",
				"type" => "true_false",
				"instructions" => __( 'Show a play video button on the portfolio items.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[	
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_8"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_12"
						]
					]
				],
				"message" => "",
				"default_value" => 1,
				"ui" => 1,
				"ui_on_text" => "",
				"ui_off_text" => ""
			],
			[
				"key" => "field_59fb4312b343615asdasd",
				"label" => __( 'Video Button Style', 'ohio' ),
				"name" => "global_portfolio_video_button_style",
				"type" => "select",
				"instructions" => __( 'Choose a video button style.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_593f2345f6vdf6",
							"operator" => "==",
							"value" => "1"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_8"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_12"
						]
					]
				],
				"choices" => [
					"default" => __( 'Default', 'ohio' ),
					"outlined" => __( 'Outlined', 'ohio' ),
					"blurred" => __( 'Blurred', 'ohio' )
				],
				"default_value" => [
					"default"
				],
				"allow_null" => 0,
				"other_choice" => 0,
				"save_other_choice" => 0,
				"layout" => "horizontal",
				"return_format" => "value"
			],
			[
				"key" => "field_59fb4312b3436asf",
				"label" => __( 'Video Button Size', 'ohio' ),
				"name" => "global_portfolio_video_button_size",
				"type" => "select",
				"instructions" => __( 'Choose a video button size.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_593f2345f6vdf6",
							"operator" => "==",
							"value" => "1"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_8"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_12"
						]
					]
				],
				"choices" => [
					"default" => __( 'Default', 'ohio' ),
					"small" => __( 'Small', 'ohio' ),
					"large" => __( 'Large', 'ohio' )
				],
				"default_value" => [
					"default"
				],
				"allow_null" => 0,
				"other_choice" => 0,
				"save_other_choice" => 0,
				"layout" => "horizontal",
				"return_format" => "value"
			],
			[
				"key" => "field_59392398832343d99",
				"label" => __( 'Video Button Color', 'ohio' ),
				"name" => "global_portfolio_grid_video_btn_bg",
				"type" => "ohio_color",
				"instructions" => __( 'Set a video button color.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_593f2345f6vdf6",
							"operator" => "==",
							"value" => "1"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_8"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_12"
						]
					]
				],
			],
			[
				"key" => "field_59fb4312383615f",
				"label" => __( 'Publication Date', 'ohio' ),
				"name" => "global_portfolio_date_visibility",
				"type" => "true_false",
				"instructions" => __( 'Show the date of publication on portfolio project items.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_1"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_2"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_8"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_11"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_12"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_13"
						]
					]
				],
				"message" => "",
				"default_value" => 1,
				"ui" => 1,
				"ui_on_text" => "",
				"ui_off_text" => ""
			],
			[
				"key" => "field_593f2s45fbsdf5f",
				"label" => __( 'Publication Date Typography', 'ohio' ),
				"name" => "global_portfolio_date_typo",
				"type" => "ohio_typo",
				"instructions" => __( 'Set the typography and color for the publication date.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_59fb4312383615f",
							"operator" => "==",
							"value" => "1"
						]
					]
				],
				"add_theme_inherited" => false
			],
			[
				"key" => "field_593f2345f6sdf6",
				"label" => __( 'Title Typography', 'ohio' ),
				"name" => "global_portfolio_title_typo",
				"type" => "ohio_typo",
				"instructions" => __( 'Set the typography and color for the portfolio project title.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => 0,
				"add_theme_inherited" => false
			],
			[
				"key" => "field_59f235234383615",
				"label" => __( 'Excerpt', 'ohio' ),
				"name" => "global_portfolio_descr_visibility",
				"type" => "true_false",
				"instructions" => __( 'Show a publication excerpt on portfolio project items.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_2"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_8"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_11"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_12"
						]
					]
				],
				"message" => "",
				"default_value" => 1,
				"ui" => 1,
				"ui_on_text" => "",
				"ui_off_text" => ""
			],
			[
				"key" => "field_593f2j1s41df52as5",
				"label" => __( 'Excerpt Length', 'ohio' ),
				"name" => "global_portfolio_descr_length",
				"type" => "number",
				"instructions" => __( 'Set the length of the project excerpt for the entire site.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_59f235234383615",
							"operator" => "==",
							"value" => "1"
						]
					]
				],
				"default_value" => 24,
				"placeholder" => "",
				"prepend" => "",
				"append" => __( 'words', 'ohio' )
			],
			[
				"key" => "field_593f2j45fbsdf5",
				"label" => __( 'Excerpt Typography', 'ohio' ),
				"name" => "global_portfolio_descr_typo",
				"type" => "ohio_typo",
				"instructions" => __( 'Set the typography and color for the portfolio project excerpt.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_59f235234383615",
							"operator" => "==",
							"value" => "1"
						]
					]
				],
				"add_theme_inherited" => false
			],
			[
				"key" => "field_59fb4312383615",
				"label" => __( 'Categories', 'ohio' ),
				"name" => "global_portfolio_page_category_visibility",
				"type" => "true_false",
				"instructions" => __( 'Show categories on portfolio projects.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => 0,
				"message" => "",
				"default_value" => 1,
				"ui" => 1,
				"ui_on_text" => "",
				"ui_off_text" => ""
			],
			[
				"key" => "field_593f2s45fbsdf5",
				"label" => __( 'Categories Typography', 'ohio' ),
				"name" => "global_portfolio_category_typo",
				"type" => "ohio_typo",
				"instructions" => __( 'Set the typography and color for the portfolio categories.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_59fb4312383615",
							"operator" => "==",
							"value" => "1"
						]
					]
				],
				"add_theme_inherited" => false
			],
			[
				"key" => "field_59f234234383615",
				"label" => __( 'Project Link', 'ohio' ),
				"name" => "global_portfolio_page_more_visibility",
				"type" => "true_false",
				"instructions" => __( 'Show the "Show Project" button on the portfolio items.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_1"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_2"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_8"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_11"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_12"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_13"
						]
					]
				],
				"message" => "",
				"default_value" => 1,
				"ui" => 1,
				"ui_on_text" => "",
				"ui_off_text" => ""
			],
			[
				"key" => "field_593f2j45fb435df5",
				"label" => __( 'Project Link Typography', 'ohio' ),
				"name" => "global_portfolio_show_more_button_typo",
				"type" => "ohio_typo",
				"instructions" => __( 'Set the typography and color for the "Show Project" button.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_59f234234383615",
							"operator" => "==",
							"value" => "1"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_11"
						],
						[
							"field" => "field_59fa4344b383615",
							"operator" => "!=",
							"value" => "grid_12"
						],
					]
				],
				"add_theme_inherited" => false
			],
			[
				"key" => "field_592f4a166937e",
				"label" => __( 'Lightbox', 'ohio' ),
				"name" => "",
				"type" => "tab",
				"instructions" => "",
				"required" => 0,
				"conditional_logic" => 0,
				"placement" => "top",
				"endpoint" => 0
			],
			[
				"key" => "field_59fb44344asdd33615",
				"label" => __( 'Lightbox', 'ohio' ),
				"name" => "global_portfolio_projects_in_popup",
				"type" => "true_false",
				"instructions" => __( 'Enable a lightbox preview feature for portfolio projects.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => 0,
				"ui" => 1,
				"default_value" => 1,
				"new_lines" => "",
				"esc_html" => 0
			],
			[
				"key" => "field_59fb4w123s2g3l",
				"label" => __( 'Loop Mode', 'ohio' ),
				"name" => "global_lightbox_loop_mode",
				"type" => "true_false",
				"instructions" => __( 'Enable a loop mode for the portfolio slider elements.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_59fb44344asdd33615",
							"operator" => "==",
							"value" => "1"
						]
					]
				],
				"message" => "",
				"default_value" => 1,
				"ui" => 1,
				"ui_on_text" => "",
				"ui_off_text" => ""
			],
			[
				"key" => "field_59fb4w123s2g6l",
				"label" => __( 'Mouse-Wheel Scrolling', 'ohio' ),
				"name" => "global_lightbox_mousewheel_mode",
				"type" => "true_false",
				"instructions" => __( 'Enable a mouse-wheel scrolling for portfolio sliders.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_59fb44344asdd33615",
							"operator" => "==",
							"value" => "1"
						]
					]
				],
				"message" => "",
				"default_value" => 1,
				"ui" => 1,
				"ui_on_text" => "",
				"ui_off_text" => ""
			],
			[
				"key" => "field_59fb4w123s2g4l",
				"label" => __( 'Autoplay Mode', 'ohio' ),
				"name" => "global_lightbox_autoplay_mode",
				"type" => "true_false",
				"instructions" => __( 'Enable an autoplay mode for portfolio sliders.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_59fb44344asdd33615",
							"operator" => "==",
							"value" => "1"
						]
					]
				],
				"message" => "",
				"default_value" => 1,
				"ui" => 1,
				"ui_on_text" => "",
				"ui_off_text" => ""
			],
			[
				"key" => "field_59fb4w123s2g5l",
				"label" => __( 'Autoplay Interval Timeout', 'ohio' ),
				"name" => "global_lightbox_autoplay_interval",
				"type" => "number",
				"instructions" => __( 'Set an interval timeout for the autoplay mode.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_59fb4w123s2g4l",
							"operator" => "==",
							"value" => "1"
						]
					]
				],
				"default_value" => 5000,
				"placeholder" => "",
				"prepend" => "",
				"append" => __( 'Ms', 'ohio' )
			],
			[
				"key" => "field_593723425ff35gh",
				"label" => '<h4>' . __( 'Styles and Display', 'ohio' ) . '</h4>',
				"name" => "",
				"conditional_logic" => 0,
				"type" => "message"
			],
			[
				"key" => "field_59qd89qws2354d24",
				"label" => __( 'Lightbox Icon Color', 'ohio' ),
				"name" => "global_lightbox_trigger_color",
				"type" => "ohio_color",
				"instructions" => __( 'Set the color of the lightbox icon button.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_59fb44344asdd33615",
							"operator" => "==",
							"value" => "1"
						]
					]
				]
			],
			[
				"key" => "field_59fb4w123s2g2l",
				"label" => __( 'Pagination', 'ohio' ),
				"name" => "global_lightbox_bullets_visibility",
				"type" => "true_false",
				"instructions" => __( 'Show the pagination bar on portfolio sliders within the lightbox.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_59fb44344asdd33615",
							"operator" => "==",
							"value" => "1"
						]
					]
				],
				"message" => "",
				"default_value" => 1,
				"ui" => 1,
				"ui_on_text" => "",
				"ui_off_text" => ""
			],
			[
				"key" => "field_59fb4w123s2g245",
				"label" => __( 'Pagination Type', 'ohio' ),
				"name" => "global_lightbox_bullets_type",
				"type" => "select",
				"instructions" => __( 'Select slider pagination type.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_59fb4w123s2g2l",
							"operator" => "==",
							"value" => "1"
						]
					]
				],
				"choices" => [
					"default" => __( 'Default', 'ohio' ),
					"boxed" => __( 'Boxed', 'ohio' )
				],
				"default_value" => [
					"default"
				],
				"allow_null" => 0,
				"other_choice" => 0,
				"save_other_choice" => 0,
				"layout" => "horizontal",
				"return_format" => "value"
			],
			[
				"key" => "field_59fb4w123s2g1l",
				"label" => __( 'Navigation', 'ohio' ),
				"name" => "global_lightbox_nav_visibility",
				"type" => "true_false",
				"instructions" => __( 'Show the navigation buttons on portfolio sliders within the lightbox.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_59fb44344asdd33615",
							"operator" => "==",
							"value" => "1"
						]
					]
				],
				"message" => "",
				"default_value" => 1,
				"ui" => 1,
				"ui_on_text" => "",
				"ui_off_text" => ""
			],
			[
				"key" => "field_59fb4ad4456f45",
				"label" => __( 'Categories', 'ohio' ),
				"name" => "global_lightbox_category_visibility",
				"type" => "true_false",
				"instructions" => __( 'Show project categories within the lightbox.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_59fb44344asdd33615",
							"operator" => "==",
							"value" => "1"
						]
					]
				],
				"ui" => 1,
				"default_value" => 1,
				"new_lines" => "",
				"esc_html" => 0
			],
			[
				"key" => "field_593d2745h6sdf6",
				"label" => __( 'Categories Typography', 'ohio' ),
				"name" => "global_lightbox_category_typo",
				"type" => "ohio_typo",
				"instructions" => __( 'Set the typography and color for the portfolio categories.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_59fb4ad4456f45",
							"operator" => "==",
							"value" => "1"
						]
					]
				],
				"add_theme_inherited" => false
			],
			[
				"key" => "field_59fb4ad4456s34",
				"label" => __( 'Publication Date', 'ohio' ),
				"name" => "global_lightbox_date_visibility",
				"type" => "true_false",
				"instructions" => __( 'Show the date of publication within the lightbox.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_59fb44344asdd33615",
							"operator" => "==",
							"value" => "1"
						]
					]
				],
				"ui" => 1,
				"default_value" => 1,
				"new_lines" => "",
				"esc_html" => 0
			],
			[
				"key" => "field_59fb4ad4456s35",
				"label" => __( 'Publication Date Typography', 'ohio' ),
				"name" => "global_lightbox_date_typo",
				"type" => "ohio_typo",
				"instructions" => __( 'Set the typography and color for the publication date.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_59fb4ad4456s34",
							"operator" => "==",
							"value" => "1"
						]
					]
				],
				"add_theme_inherited" => false
			],
			[
				"key" => "field_593f2745h6sdf6",
				"label" => __( 'Title Typography', 'ohio' ),
				"name" => "global_lightbox_title_typo",
				"type" => "ohio_typo",
				"instructions" => __( 'Set the typography and color for the portfolio project title.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_59fb44344asdd33615",
							"operator" => "==",
							"value" => "1"
						]
					]
				],
				"add_theme_inherited" => false
			],
			[
				"key" => "field_59fb4ad44567d33615",
				"label" => __( 'Excerpt', 'ohio' ),
				"name" => "global_portfolio_gallery_description",
				"type" => "true_false",
				"instructions" => __( 'Show the project excerpt within the lightbox.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_59fb44344asdd33615",
							"operator" => "==",
							"value" => "1"
						]
					]
				],
				"ui" => 1,
				"default_value" => 1,
				"new_lines" => "",
				"esc_html" => 0
			],
			[
				"key" => "field_59fb4ad44567d33615sfdry",
				"label" => __( 'Excerpt Length', 'ohio' ),
				"name" => "global_portfolio_gallery_descr_length",
				"type" => "number",
				"instructions" => __( 'Set the length of the project excerpt within the lightbox.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_59fb4ad44567d33615",
							"operator" => "==",
							"value" => "1"
						]
					]
				],
				"default_value" => 24,
				"placeholder" => "",
				"prepend" => "",
				"append" => __( 'words', 'ohio' )
			],
			[
				"key" => "field_593f2345h6sdf6",
				"label" => __( 'Excerpt Typography', 'ohio' ),
				"name" => "global_lightbox_description_typo",
				"type" => "ohio_typo",
				"instructions" => __( 'Set the typography and color for the portfolio project excerpt.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_59fb4ad44567d33615",
							"operator" => "==",
							"value" => "1"
						]
					]
				],
				"add_theme_inherited" => false
			],
			[
				"key" => "field_59fb4ad44566d33615",
				"label" => __( 'Meta', 'ohio' ),
				"name" => "global_portfolio_gallery_details",
				"type" => "true_false",
				"instructions" => __( 'Show the portfolio meta (e.g. client, tags, tools, etc.) in the lightbox', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_59fb44344asdd33615",
							"operator" => "==",
							"value" => "1"
						]
					]
				],
				"ui" => 1,
				"default_value" => 1,
				"new_lines" => "",
				"esc_html" => 0
			],
			[
				"key" => "field_593f2945h6sdf6",
				"label" => __( 'Meta Typography', 'ohio' ),
				"name" => "global_lightbox_details_typo",
				"type" => "ohio_typo",
				"instructions" => __( 'Set the typography and color for the portfolio meta.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_59fb4ad44566d33615",
							"operator" => "==",
							"value" => "1"
						]
					]
				],
				"add_theme_inherited" => false
			],
			[
				"key" => "field_59fb4ad44asdtd33615",
				"label" => __( 'Project Link', 'ohio' ),
				"name" => "global_portfolio_lightbox_link",
				"type" => "true_false",
				"instructions" => __( 'Show the "Show Project" button in the lightbox.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_59fb44344asdd33615",
							"operator" => "==",
							"value" => "1"
						]
					]
				],
				"ui" => 1,
				"default_value" => 1,
				"new_lines" => "",
				"esc_html" => 0
			],
			[
				"key" => "field_59fb4ad44a1dtd33615",
				"label" => __( 'Custom Project Link', 'ohio' ),
				"name" => "global_portfolio_lightbox_link_text",
				"type" => "text",
				"instructions" => __( 'Add a custom value for the "Show Project" link.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_59fb4ad44asdtd33615",
							"operator" => "==",
							"value" => "1"
						]
					]
				],
				"default_value" => "View Project",
				"new_lines" => "",
				"esc_html" => 0
			],
			[
				"key" => "field_592f2945h6sdf6",
				"label" => __( 'Project Link Typography', 'ohio' ),
				"name" => "global_lightbox_link_typo",
				"type" => "ohio_typo",
				"instructions" => __( 'Set the typography and color for the "Show Project" button.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_59fb4ad44asdtd33615",
							"operator" => "==",
							"value" => "1"
						]
					]
				],
				"add_theme_inherited" => false
			],
			[
				"key" => "field_592fe4346937d",
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
				"key" => "field_59fb4334b343615",
				"label" => __( 'Filters', 'ohio' ),
				"name" => "global_project_page_filter_visibility",
				"type" => "true_false",
				"instructions" => __( 'Show the category filters on the portfolio page.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => 0,
				"message" => "",
				"default_value" => 1,
				"ui" => 1,
				"ui_on_text" => "",
				"ui_off_text" => ""
			],
			[
				"key" => "field_59fb4334b433623",
				"label" => __( 'Layout', 'ohio' ),
				"name" => "global_portfolio_project_filter_layout",
				"type" => "select",
				"instructions" => __( 'Choose the category filters layout.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_59fb4334b343615",
							"operator" => "==",
							"value" => "1"
						]
					]
				],
				"choices" => [
					"default" => __( 'Default', 'ohio' ),
					"button" => __( 'Button', 'ohio' )
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
				"key" => "field_59fb4334b433615",
				"label" => __( 'Position', 'ohio' ),
				"name" => "global_portfolio_project_filter_align",
				"type" => "button_group",
				"instructions" => __( 'Choose the position of the category filters for the entire site.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_59fb4334b343615",
							"operator" => "==",
							"value" => "1"
						]
					]
				],
				"choices" => [
                    "left" => __( '<i class="bi bi-text-left"></i> Left', 'ohio' ),
                    "center" => __( '<i class="bi bi-text-center"></i> Center', 'ohio' ),
                    "right" => __( '<i class="bi bi-text-right"></i> Right', 'ohio' )
                ],
				"default_value" => [
					"center"
				],
				"allow_null" => 0,
				"multiple" => 0,
				"ui" => 0,
				"ajax" => 0,
				"return_format" => "value",
				"placeholder" => ""
			],
			[
				"key" => "field_5937a0s253d23s15b",
				"label" => '<h4>' . __( 'Styles and Display', 'ohio' ) . '</h4>',
				"name" => "",
				"type" => "message"
			],
			[
				"key" => "field_5ewff4364b4fg36q5",
				"label" => __( 'Empty Categories', 'ohio' ),
				"name" => "global_portfolio_project_filter_show_empty_categories",
				"type" => "true_false",
				"instructions" => __( 'Show empty categories that have no associated projects.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_59fb4334b343615",
							"operator" => "==",
							"value" => "1"
						]
					]
				],
				"message" => "",
				"default_value" => 1,
				"ui" => 1,
				"ui_on_text" => "",
				"ui_off_text" => ""
			],
			[
				"key" => "field_59fb43341343615",
				"label" => __( 'Filters Typography', 'ohio' ),
				"name" => "global_project_filter_text_typo",
				"type" => "ohio_typo",
				"instructions" => __( 'Set the typography and color for the category filters.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_59fb4334b343615",
							"operator" => "==",
							"value" => "1"
						]
					]
				]
			],
			[
				"key" => "field_59fb43342343615",
				"label" => __( 'Active Filters Typography', 'ohio' ),
				"name" => "global_project_filter_accent_typo",
				"type" => "ohio_typo",
				"instructions" => __( 'Set the typography and color for the active category filters.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_59fb4334b343615",
							"operator" => "==",
							"value" => "1"
						]
					]
				]
			],
			[
				"key" => "field_592fe4346937l324",
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
				"key" => "field_59fb4334fd33615",
				"label" => __( 'Type', 'ohio' ),
				"name" => "global_portfolio_pagination_type",
				"type" => "select",
				"instructions" => __( 'Choose the type of the pagination for the entire site.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => 0,
				"choices" => [
					"none" => __( 'None', 'ohio' ),
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
				"key" => "field_592d60af8b002f",
				"label" => __( 'Style', 'ohio' ),
				"name" => "global_portfolio_pagination_style",
				"type" => "select",
				"instructions" => __( 'Choose the style of the pagination for the entire site.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => 0,
				"choices" => [
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
				"key" => "field_592d60af8b003f",
				"label" => __( 'Size', 'ohio' ),
				"name" => "global_portfolio_pagination_size",
				"type" => "select",
				"instructions" => __( 'Choose the size of the pagination buttons for the entire site.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => 0,
				"choices" => [
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
				"key" => "field_59fb4334bgdasdf33615",
				"label" => __( 'Position', 'ohio' ),
				"name" => "global_portfolio_pagination_position",
				"type" => "button_group",
				"instructions" => __( 'Choose the position of the pagination for the entire site.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => 0,
				"choices" => [
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
			],
			[
				"key" => "field_592fl434kl324",
				"label" => __( 'Other', 'ohio' ),
				"name" => "",
				"type" => "tab",
				"instructions" => "",
				"required" => 0,
				"conditional_logic" => 0,
				"placement" => "top",
				"endpoint" => 0
			],
			[
				"key" => "field_5937a54r3hs152s",
				"label" => '<h4>' . __( 'Breadcrumbs', 'ohio' ) . '</h4>',
				"name" => "",
				"type" => "message"
			],
			[
				"key" => "field_592fd66622e2f",
				"label" => __( 'Home Slug', 'ohio' ),
				"name" => "global_project_breadcrumb_slug",
				"type" => "text",
				"instructions" => __( 'Add a custom value for the breadcrumbs home slug.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => 0,
				"allow_null" => 0,
				"other_choice" => 0,
				"save_other_choice" => 0,
				"default_value" => "Portfolio",
				"layout" => "horizontal",
				"return_format" => "value"
			],
			[
				"key" => "field_593l230597k2j",
				"label" => '<h4>' . __( 'Page Builder', 'ohio' ) . '</h4>',
				"name" => "",
				"type" => "message",
				"required" => 0,
				"conditional_logic" => 0,
			],
			[
				"key" => "field_592fd66vba22c",
				"label" => __( 'Page Builder Content Position', 'ohio' ),
				"name" => "global_portfolio_content_position",
				"type" => "select",
				"instructions" => __( 'Choose WPBakery/Elementor custom content position.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => 0,
				"choices" => [
					"top" => __( 'Top - Before portfolio', 'ohio' ),
					"bottom" => __( 'Bottom - After portfolio', 'ohio' )
				],
				"allow_null" => 0,
				"other_choice" => 0,
				"save_other_choice" => 0,
				"default_value" => "top",
				"layout" => "horizontal",
				"return_format" => "value"
			]
		],
		"location" => [
			[
				[
					"param" => "options_page",
					"operator" => "==",
					"value" => "theme-general-portfolio"
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
