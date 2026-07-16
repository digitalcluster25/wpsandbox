<?php if ( function_exists( 'acf_add_local_field_group' ) ) :

	acf_add_local_field_group( [
		"key" => "group_593be7a6c2017",
		"title" => __( 'Shop Settings', 'ohio' ),
		"private" => true,
		"fields" => [
			[
				"key" => "field_591b4f20ed84e",
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
				"key" => "field_5937e0a51b48cexmod155",
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
                "key" => "field_472390523579235",
                "label" => __( 'Layout', 'ohio' ),
                "name" => "global_shop_layout_type",
                "type" => "image_option",
                "instructions" => __( 'Choose a shop layout type for the entire site.', 'ohio' ),
                "conditional_logic" => 0,
                "default_value" => "type1",
                "image_option_value" => [
                    [
                        "name" => "type1",
                        "description" => __( 'Classic', 'ohio' ),
                        "src" => "acf__image_51.svg"
                    ],
                    [
                        "name" => "type2",
                        "description" => __( 'Minimal', 'ohio' ),
                        "src" => "acf__image_52.svg"
                    ]
                ]
            ],
            [
				"key" => "field_58383c7ed01ae_shop_count",
				"label" => __( 'Items Per Page', 'ohio' ),
				"name" => "global_woocommerce_products_on_page",
				"type" => "text",
				"instructions" => __( 'Set a number of product items per page.', 'ohio' ),
				"required" => 0,
				"append" => __( 'products', 'ohio' ),
				"conditional_logic" => [
					[
						[
							"field" => "field_58539i234317ae",
							"operator" => "!=",
							"value" => "type_4"
						]
					]
				],
				"allow_null" => 0,
				"multiple" => 0,
				"ui" => 0,
				"ajax" => 0,
				"maxlength" => "2",
				"placeholder" => ""
			],
			[
				"key" => "field_58383c7ed02ae",
				"label" => __( 'Items Per Row', 'ohio' ),
				"name" => "global_woocommerce_products_in_row",
				"type" => "ohio_ecommerce_columns",
				"instructions" => __( 'Set a number of product items per row.', 'ohio' ),
				"default_value" => [
					"large" => "3",
					"medium" => "2",
					"small" => "2"
				]
			],
			[
				"key" => "field_592dlf5682l57",
				"label" => '<h4>' . __( 'Thumbnails', 'ohio' ) . '</h4>',
				"name" => "",
				"type" => "message"
			],
			[
				"key" => "field_593be7afs51sfg",
				"label" => __( 'Images per Gallery', 'ohio' ),
				"name" => "global_woocommerce_product_images_count",
				"type" => "text",
				"instructions" => __( 'Set a number of product images displayed in a gallery.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => 0,
				"default_value" => "2",
				"placeholder" => "",
				"prepend" => "",
				"append" => __( 'images', 'ohio' ),
				"formatting" => "html",
				"maxlength" => ""
			],
			[
				"key" => "field_592d60bf8b3f9",
				"label" => __( 'Hover Effect', 'ohio' ),
				"name" => "global_shop_item_hover_type",
				"type" => "select",
				"instructions" => __( 'Choose the type of the featured image hover effect.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => 0,
				"choices" => [
					"none" => __( 'None', 'ohio' ),
					"scale" => __( 'Image Scaling', 'ohio' ),
					"overlay" => __( 'Image Overlay', 'ohio' ),
					"greyscale" => __( 'Image Greyscale', 'ohio' ),
					"transition" => __( 'Image Transition', 'ohio' ),
				],
				"default_value" => "none",
				"allow_null" => 0,
				"multiple" => 0,
				"ui" => 0,
				"ajax" => 0,
				"return_format" => "value",
				"placeholder" => ""
			],
			[
				"key"=> "field_59fb4w121284912hjs",
				"label" => __( 'Tilt Effect', 'ohio' ),
				"name"=> "global_shop_tilt_effect",
				"type"=> "true_false",
				"instructions" => __( 'Enable parallax hover tilt effect for product items.', 'ohio' ),
				"required"=> 0,
				"conditional_logic"=> 0,
				"message"=> "",
				"default_value"=> 1,
				"ui"=> 1,
				"ui_on_text"=> "",
				"ui_off_text"=> ""
			],
			[
				"key" => "field_59fb4w121284912hjg",
				"label" => __( 'Tilt Effect Perspective', 'ohio' ),
				"name" => "global_shop_tilt_effect_perspective",
				"type" => "number",
				"instructions" => __( 'Set the perspective value for the tilt hover effect.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_59fb4w121284912hjs",
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
				"key" => "field_59372039678l98",
				"label" => '<h4>' . __( 'Entrance Animation <mark></mark>', 'ohio' ) . '</h4>',
				"name" => "",
				"type" => "message"
			],
			[
				"key" => "field_592d60af8a7feq21",
				"label" => __( 'Animation Type', 'ohio' ),
				"name" => "global_woocommerce_page_animation_type",
				"type" => "select",
				"instructions" => __( 'Choose the type of the grid entrance animation.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => 0,
				"choices" => [
					"default" => __( 'Disable', 'ohio' ),
					"sync" => __( 'Synchronous', 'ohio' ),
					"async" => __( 'Asynchronous', 'ohio' )
				],
				"allow_null" => 0,
				"other_choice" => 0,
				"save_other_choice" => 0,
				"default_value" => "default",
				"layout" => "horizontal",
				"return_format" => "value"
			],
			[
				"key" => "field_592d60af8ac1asdasdl",
				"label" => __( 'Animation Effect', 'ohio' ),
				"name" => "global_woocommerce_page_animation_effect",
				"type" => "select",
				"instructions" => __( 'Choose the type of the grid entrance animation effect.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_592d60af8a7feq21",
							"operator" => "!=",
							"value" => "default"
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
				"key" => "field_59fb4332b34323f983w4hefiuj",
				"label" => __( 'Animation Repeat', 'ohio' ),
				"name" => "global_woocommerce_page_animation_once",
				"type" => "true_false",
				"instructions" => __( 'Repeat animation while scrolling page up and down', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_592d60af8a7feq21",
							"operator" => "!=",
							"value" => "default"
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
				"key" => "field_592d60af8b80c233",
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
				"key" => "field_593be8a6dfc31e",
				"label" => __( 'Masonry Layout', 'ohio' ),
				"name" => "global_woocommerce_masonry_layout",
				"type" => "true_false",
				"instructions" => __( 'Enable masonry layout to set the grid items in the following row rise up to completely fill the gaps.', 'ohio' ),
				"required" => 0,
				"message" => "",
				"default_value" => 1,
				"ui" => 1,
				"ui_on_text" => __( 'Yes', 'ohio' ),
				"ui_off_text" => __( 'No', 'ohio' )
			],
			[
				"key" => "field_5ghpd60af8ac1asf1245gf",
				"label" => __( 'Alignment', 'ohio' ),
				"name" => "global_woocommerce_text_alignment",
				"type" => "button_group",
				"instructions" => __( 'Choose the grid content alignment for the entire site.', 'ohio' ),
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
				"key" => "field_592d60af8b80c234",
				"label" => __( 'Equal Height', 'ohio' ),
				"name" => "global_product_items_equal_height",
				"type" => "true_false",
				"instructions" => __( 'Convert a rectangular image thumbnails into a cropped square.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => 0,
				"message" => "",
				"default_value" => 0,
				"ui" => 1,
				"ui_on_text" => "",
				"ui_off_text" => ""
			],
			[
				"key" => "field_592d60af8b80cf5",
				"label" => __( 'Contained Layout', 'ohio' ),
				"name" => "global_product_items_boxed_style",
				"type" => "true_false",
				"instructions" => __( 'Wrap a single grid item into a filled container.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => 0,
				"ui" => 1,
				"ui_on_text" => __( 'Yes', 'ohio' ),
				"ui_off_text" => __( 'No', 'ohio' ),
				"message" => "",
				"default_value" => 0
			],
			[
				"key" => "field_5937203496723",
				"label" => '<h4>' . __( 'Styles and Display', 'ohio' ) . '</h4>',
				"name" => "",
				"type" => "message"
			],
			[
				"key" => "field_59gb29bda32b3as15",
				"label" => __( 'Contained Layout Background', 'ohio' ),
				"name" => "global_woocommerce_shop_title_wrap_background_color",
				"type" => "ohio_color",
				"instructions" => __( 'Set the background color of the contained product card item.', 'ohio' ),
				"conditional_logic" => [
					[
						[
							"field" => "field_592d60af8b80cf5",
							"operator" => "==",
							"value" => "1"
						]
					]
				],
				"required" => 0,
				"default_value" => ""
			],
			[
				"key" => "field_59gb29bda32b3a",
				"label" => __( 'Sale Tag Color', 'ohio' ),
				"name" => "global_woocommerce_shop_sale_tag_background_color",
				"type" => "ohio_color",
				"instructions" => __( 'Set the color of the "Sale" tag fill color.', 'ohio' ),
				"conditional_logic" => 0,
				"required" => 0,
				"default_value" => ""
			],
			[
				"key" => "field_59gb29bda32b3b",
				"label" => __( 'Out of Stock Tag Color', 'ohio' ),
				"name" => "global_woocommerce_shop_out_stock_tag_background_color",
				"type" => "ohio_color",
				"instructions" => __( 'Set the color of the "Out of Stock" tag fill color.', 'ohio' ),
				"conditional_logic" => 0,
				"required" => 0,
				"default_value" => ""
			],
			[
				"key" => "field_593f4haf12422a",
				"label" => __( 'Title Typography', 'ohio' ),
				"name" => "global_woocommerce_shop_product_title_typo",
				"type" => "ohio_typo",
				"instructions" => __( 'Set the typography and color for the product title.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => 0,
				"add_theme_inherited" => false
			],
			[
				"key" => "field_59gfsdfsda433as15",
				"label" => __( 'Categories', 'ohio' ),
				"name" => "global_woocommerce_shop_category_visibility",
				"type" => "true_false",
				"instructions" => __( 'Show categories on product items.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => 0,
				"message" => "",
				"default_value" => 1,
				"ui" => 1,
				"ui_on_text" => __( 'Yes', 'ohio' ),
				"ui_off_text" => __( 'No', 'ohio' )
			],
			[
				"key" => "field_593f4haf12422b",
				"label" => __( 'Categories Typography', 'ohio' ),
				"name" => "global_woocommerce_shop_product_category_typo",
				"type" => "ohio_typo",
				"instructions" => __( 'Set the typography and color for product categories.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_59gfsdfsda433as15",
							"operator" => "==",
							"value" => "1"
						]
					]
				],
				"add_theme_inherited" => false
			],
			[
				"key" => "field_59gfsdfsga433as15",
				"label" => __( 'Price', 'ohio' ),
				"name" => "global_woocommerce_shop_price_visibility",
				"type" => "true_false",
				"instructions" => __( 'Show prices on product items.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => 0,
				"message" => "",
				"default_value" => 1,
				"ui" => 1,
				"ui_on_text" => __( 'Yes', 'ohio' ),
				"ui_off_text" => __( 'No', 'ohio' )
			],
			[
				"key" => "field_59af4haf12422c",
				"label" => __( 'Price Typography', 'ohio' ),
				"name" => "global_woocommerce_shop_product_price_typo",
				"type" => "ohio_typo",
				"instructions" => __( 'Set the typography and color for product prices.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_59gfsdfsga433as15",
							"operator" => "==",
							"value" => "1"
						]
					]
				],
				"add_theme_inherited" => false
			],
			[
				"key" => "field_592350972305982",
				"label" => __( 'Product Rating', 'ohio' ),
				"name" => "global_woocommerce_shop_rating_visibility",
				"type" => "true_false",
				"instructions" => __( 'Show a rating on product items.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => 0,
				"message" => "",
				"default_value" => 0,
				"ui" => 1,
				"ui_on_text" => __( 'Yes', 'ohio' ),
				"ui_off_text" => __( 'No', 'ohio' )
			],
			[
				"key" => "field_59gfsdfsda32b3as15",
				"label" => __( 'Quickview Button', 'ohio' ),
				"name" => "global_woocommerce_quickview_button",
				"type" => "true_false",
				"instructions" => __( 'Show a quickview button on product items.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => 0,
				"message" => "",
				"default_value" => 1,
				"ui" => 1,
				"ui_on_text" => __( 'Yes', 'ohio' ),
				"ui_off_text" => __( 'No', 'ohio' )
			],
			[
				"key" => "field_59373253d2935867",
				"label" => __( 'Filters <span class="new-badge"></span>', 'ohio' ),
				"name" => "",
				"type" => "tab",
				"instructions" => "",
				"required" => 0,
				"conditional_logic" => 0,
				"placement" => "top",
				"endpoint" => 0
			],
			[
				"key" => "field_59373253d2935868",
				"label" => __( 'Filter Widgets', 'ohio' ),
				"name" => "global_woocommerce_show_filters",
				"type" => "true_false",
				"instructions" => __( 'Display available filter widgets in the slide-in sidebar area. <br><em>Go to <a target="_blank" href="./widgets.php">Widgets</a> > Shop tab to add or modify filter widgets.</em>', 'ohio' ),
				"required" => 0,
				"conditional_logic" => 0,
				"message" => "",
				"default_value" => 1,
				"ui" => 1,
				"ui_on_text" => "",
				"ui_off_text" => ""
			],

			[
				"key" => "field_59373253d2935869",
				"label" => __( 'Sort By', 'ohio' ),
				"name" => "global_woocommerce_show_sort_by",
				"type" => "true_false",
				"instructions" => __( 'Display the sort by dropdown menu.</em>', 'ohio' ),
				"required" => 0,
				"conditional_logic" => 0,
				"message" => "",
				"default_value" => 1,
				"ui" => 1,
				"ui_on_text" => "",
				"ui_off_text" => ""
			],
			[
				"key" => "field_593be7a6d2429",
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
				"key" => "field_59374323b383615",
				"label" => __( 'Type', 'ohio' ),
				"name" => "global_woocommerce_pagination_type",
				"type" => "select",
				"instructions" => __( 'Choose the type of the pagination for the entire site.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => 0,
				"choices" => [
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
				"key" => "field_592d60af8b002f03",
				"label" => __( 'Style', 'ohio' ),
				"name" => "global_woocommerce_pagination_style",
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
				"key" => "field_592d60af8b003f04",
				"label" => __( 'Size', 'ohio' ),
				"name" => "global_woocommerce_pagination_size",
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
				"key" => "field_593743237383615",
				"label" => __( 'Position', 'ohio' ),
				"name" => "global_woocommerce_pagination_position",
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
				"key" => "field_593beba6d4b64",
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
				"key" => "field_592d60lf8al0823f",
				"label" => '<h4>' . __( 'Breadcrumbs', 'ohio' ) . '</h4>',
				"name" => "",
				"type" => "message"
			],
			[
				"key" => "field_59fb433sbgd33615",
				"label" => __( 'Home Slug', 'ohio' ),
				"name" => "global_woocommerce_breadcrumbs_slug",
				"type" => "text",
				"instructions" => __( 'Add a custom value for the breadcrumbs home slug.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => 0,
				"new_lines" => "",
				"esc_html" => 0
			],
			[
				"key" => "field_59372352352143",
				"label" => '<h4>' . __( 'Cart Icon', 'ohio' ) . '</h4>',
				"name" => "",
				"type" => "message",
				"required" => 0,
				"conditional_logic" => 0,
			],
			[
				"key" => "field_593743234457tr",
				"label" => __( 'Cart Icon', 'ohio' ),
				"name" => "global_woocommerce_cart_icon",
				"type" => "true_false",
				"instructions" => __( 'Show the cart icon in the header of the entire site.', 'ohio' ),
				"default_value" => 1,
				"ui" => 1
			],
			[
                "key" => "field_59374395380",
                "label" => __( 'Custom Icon', 'ohio' ),
                "name" => "global_woocommerce_cart_custom_image",
                "type" => "image",
                "instructions" => __( 'Upload a custom cart icon image.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
					[
						[
							"field" => "field_593743234457tr",
							"operator" => "==",
							"value" => "1"
						]
					]
				],
                "return_format" => "url",
                "preview_size" => "thumbnail",
                "library" => "all",
                "min_width" => "",
                "min_height" => "",
                "min_size" => "",
                "max_width" => "",
                "max_height" => "",
                "max_size" => "",
                "mime_types" => ""
            ],
			[
				"key" => "field_5937432344525235",
				"label" => __( 'Empty Cart Icon', 'ohio' ),
				"name" => "global_woocommerce_cart_icon_empty_visibility",
				"type" => "true_false",
				"instructions" => __( 'Show the empty cart icon in the header of the entire site.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_593743234457tr",
							"operator" => "==",
							"value" => "1"
						]
					]
				],
				"default_value" => 1,
				"ui" => 1
			],
			[

				"key" => "field_592d43df9e26chkug",
				"label" => __( 'Cart Totals', 'ohio' ),
				"name" => "global_page_header_cart_sum_visibility",
				"type" => "true_false",
				"instructions" => __( 'Show the cart totals counter in the header of the entire site.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_593743234457tr",
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
				"key" => "field_59372352352144",
				"label" => '<h4>' . __( 'My Account Icon', 'ohio' ) . '</h4>',
				"name" => "",
				"type" => "message",
				"required" => 0,
				"conditional_logic" => 0,
			],
			[
				"key" => "field_593743234457ta",
				"label" => __( 'My Account Icon', 'ohio' ),
				"name" => "global_woocommerce_account_icon",
				"type" => "true_false",
				"instructions" => __( 'Show the "My Account" icon in the header of the entire site.', 'ohio' ),
				"default_value" => 0,
				"ui" => 1
			],
			[
                "key" => "field_59374395383",
                "label" => __( 'Custom Icon', 'ohio' ),
                "name" => "global_woocommerce_account_custom_image",
                "type" => "image",
                "instructions" => __( 'Upload a custom "My Account" icon image.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
					[
						[
							"field" => "field_593743234457ta",
							"operator" => "==",
							"value" => "1"
						]
					]
				],
                "return_format" => "url",
                "preview_size" => "thumbnail",
                "library" => "all",
                "min_width" => "",
                "min_height" => "",
                "min_size" => "",
                "max_width" => "",
                "max_height" => "",
                "max_size" => "",
                "mime_types" => ""
            ],
            [
				"key" => "field_593l230597hj",
				"label" => '<h4>' . __( 'Page Builder', 'ohio' ) . '</h4>',
				"name" => "",
				"type" => "message",
				"required" => 0,
				"conditional_logic" => 0,
			],
			[
				"key" => "field_593be7fasa6dfq41",
				"label" => __( 'Page Builder Content Position', 'ohio' ),
				"name" => "global_shop_content_position",
				"type" => "select",
				"instructions" => __( 'Choose WPBakery/Elementor custom content position.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => false,
				"choices" => [
					"top" => __( 'Above - Before Products', 'ohio' ),
					"bottom" => __( 'Below - After Products', 'ohio' )
				],
				"allow_null" => 0,
				"other_choice" => 0,
				"save_other_choice" => 0,
				"default_value" => "inherit",
				"layout" => "horizontal",
				"return_format" => "value"
			]
		],
		"location" => [
			[
				[
					"param" => "options_page",
					"operator" => "==",
					"value" => "theme-general-woocommerce"
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
