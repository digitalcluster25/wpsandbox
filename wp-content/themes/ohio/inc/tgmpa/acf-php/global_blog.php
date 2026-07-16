<?php if ( function_exists( 'acf_add_local_field_group' ) ) :

	acf_add_local_field_group( [
		"key" => "group_592d60af343cf",
		"title" => __( 'Blog Settings', 'ohio' ),
		"private" => true,
		"fields" => [
			[
				"key" => "field_592d60ah8a413",
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
				"key" => "field_5937e0a52b488qw",
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
				"key" => "field_592d60af8b3f8",
				"label" => __( 'Layout', 'ohio' ),
				"name" => "global_blog_item_layout_type",
				"type" => "image_option",
				"instructions" => __( 'Choose a blog layout type for the entire site.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => 0,
				"image_option_value" => [
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
				"default_value" => "blog_grid_1",
				"allow_null" => 0,
				"multiple" => 0,
				"ui" => 0,
				"ajax" => 0,
				"return_format" => "value",
				"placeholder" => ""
			],
			[
				"key" => "field_592d60af8b000",
				"label" => __( 'Items Per Page', 'ohio' ),
				"name" => "global_blog_posts_per_page",
				"type" => "number",
				"instructions" => __( 'Set a number of blog post items per page.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => 0,
				"default_value" => 16,
				"placeholder" => "",
				"prepend" => "",
				"append" => "posts",
				"min" => 1,
				"max" => 100,
				"step" => 1
			],
			[
				"key" => "field_592d60af8ac17",
				"label" => __( 'Items Per Row', 'ohio' ),
				"name" => "global_blog_columns_in_row",
				"type" => "ohio_columns",
				"instructions" => __( 'Set a number of blog post items per row.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_592d60af8b3f8",
							"operator" => "!=",
							"value" => "blog_grid_6"
						],
						[
							"field" => "field_592d60af8b3f8",
							"operator" => "!=",
							"value" => "blog_grid_7"
						]
					]
				],
				"default_value" => "3-2-1",
				"allow_null" => 0,
				"multiple" => 0,
				"ui" => 0,
				"ajax" => 0,
				"return_format" => "value",
				"placeholder" => "",
				"use_inherit" => false
			],
			[
				"key" => "field_592dlf5682k57",
				"label" => '<h4>' . __( 'Thumbnails', 'ohio' ) . '</h4>',
				"name" => "",
				"type" => "message"
			],
			[
				"key" => "field_592fd6fa1246v12ffaqwba22c",
				"label" => __( 'Thumbnail Size', 'ohio' ),
				"name" => "global_blog_images_size",
				"type" => "select",
				"instructions" => __( 'Choose the size of the featured image thumbnail.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => 0,
				"choices" => [
					"thumbnail" => __( 'Thumbnail', 'ohio' ),
					"medium" => __( 'Small', 'ohio' ),
					"medium_large" => __( 'Medium', 'ohio' ),
					"large" => __( 'Large', 'ohio' ),
					"full" => __( 'Original', 'ohio' )
				],
				"allow_null" => 0,
				"other_choice" => 0,
				"save_other_choice" => 0,
				"default_value" => "medium_large",
				"layout" => "horizontal",
				"return_format" => "value"
			],
			[
				"key" => "field_592d60af8b3f9",
				"label" => __( 'Hover Effect', 'ohio' ),
				"name" => "global_blog_item_hover_type",
				"type" => "select",
				"instructions" => __( 'Choose the type of the featured image hover effect.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => 0,
				"choices" => [
					"none" => __( 'None', 'ohio' ),
					"scale" => __( 'Image Scaling', 'ohio' ),
					"overlay" => __( 'Image Overlay', 'ohio' ),
					"greyscale" => __( 'Image Greyscale', 'ohio' ),
				],
				"default_value" => "type1",
				"allow_null" => 0,
				"multiple" => 0,
				"ui" => 0,
				"ajax" => 0,
				"return_format" => "value",
				"placeholder" => ""
			],
			[
				"key" => "field_592d60af8bc0787hiof",
				"label" => __( 'Tilt Effect', 'ohio' ),
				"name" => "global_blog_tilt_effect",
				"type" => "true_false",
				"instructions" => __( 'Enable parallax hover tilt effect for blog post items.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => 0,
				"ui" => 1,
				"ui_on_text" => __( 'Yes', 'ohio' ),
				"ui_off_text" => __( 'No', 'ohio' ),
				"message" => "",
				"default_value" => 0
			],
			[
				"key" => "field_59fb4334a433615asrt3t2as2gf",
				"label" => __( 'Tilt Effect Perspective', 'ohio' ),
				"name" => "global_blog_tilt_effect_perspective",
				"type" => "number",
				"instructions" => __( 'Set the perspective value for the tilt hover effect.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_592d60af8bc0787hiof",
							"operator" => "==",
							"value" => "1"
						]
					]
				],
				"default_value" => 6000,
				"placeholder" => "",
				"prepend" => "",
				"append" => __( 'perspective', 'ohio' ),
				"min" => 1,
				"max" => 10000,
				"step" => 1
			],
			[
				"key" => "field_59372039678",
				"label" => '<h4>' . __( 'Entrance Animation <mark></mark>', 'ohio' ) . '</h4>',
				"name" => "",
				"type" => "message"
			],
			[
				"key" => "field_592d60af8a7ffmods",
				"label" => __( 'Animation Type', 'ohio' ),
				"name" => "global_blog_page_animation_type",
				"type" => "select",
				"instructions" => __( 'Choose the type of the grid entrance animation.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => 0,
				"choices" => [
					"default" => __( 'Disable', 'ohio' ),
					"sync" => __( 'Synchronous', 'ohio' ),
					"async" => __( 'Async Animation', 'ohio' )
				],
				"allow_null" => 0,
				"other_choice" => 0,
				"save_other_choice" => 0,
				"default_value" => "masonry",
				"layout" => "horizontal",
				"return_format" => "value"
			],
			[
				"key" => "field_592d60af8ac17d2mod",
				"label" => __( 'Animation Effect', 'ohio' ),
				"name" => "global_blog_page_animation_effect",
				"type" => "select",
				"instructions" => __( 'Choose the type of the grid entrance animation effect.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_592d60af8a7ffmods",
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
				"key" => "field_59fb4332b34323f12412rf",
				"label" => __( 'Animation Repeat', 'ohio' ),
				"name" => "global_blog_page_animation_once",
				"type" => "true_false",
				"instructions" => __( 'Repeat the animation while scrolling page up and down.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_592d60af8a7ffmods",
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
				"key" => "field_592daf568sdgf8a413",
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
				"key" => "field_592d60af8a7ff",
				"label" => __( 'Masonry Layout', 'ohio' ),
				"name" => "global_blog_page_masonry",
				"type" => "true_false",
				"instructions" => __( 'Enable masonry layout to set the grid items in the following row rise up to completely fill the gaps.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => 0,
				"ui" => 1,
				"ui_on_text" => __( 'Yes', 'ohio' ),
				"ui_off_text" => __( 'No', 'ohio' ),
				"message" => "",
				"default_value" => 1
			],
			[
				"key" => "field_593f2345fbsdf2",
				"label" => __( 'Alignment', 'ohio' ),
				"name" => "global_posts_text_alignment",
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
				"key" => "field_592d60af8bc07",
				"label" => __( 'Gutters', 'ohio' ),
				"name" => "global_blog_grid_items_without_padding",
				"type" => "true_false",
				"instructions" => __( 'Remove gutters between the blog posts items.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => 0,
				"ui" => 1,
				"ui_on_text" => __( 'Yes', 'ohio' ),
				"ui_off_text" => __( 'No', 'ohio' ),
				"message" => "",
				"default_value" => 0
			],
			[
				"key" => "field_59f2342343s73615",
				"label" => __( 'Equal Height', 'ohio' ),
				"name" => "global_blog_equal_height",
				"type" => "true_false",
				"instructions" => __( 'Convert a rectangular image thumbnails into a cropped square.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_592d60af8b3f8",
							"operator" => "!=",
							"value" => "blog_grid_6"
						],
						[
							"field" => "field_592d60af8b3f8",
							"operator" => "!=",
							"value" => "blog_grid_7"
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
				"key" => "field_592d60af8b80c",
				"label" => __( 'Contained Layout', 'ohio' ),
				"name" => "global_blog_items_boxed_style",
				"type" => "true_false",
				"instructions" => __( 'Wrap a single grid item into a filled container.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_592d60af8b3f8",
							"operator" => "!=",
							"value" => "blog_grid_2"
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
				"key" => "field_592d60af8bc02345234",
				"label" => __( 'Drop Shadow', 'ohio' ),
				"name" => "global_blog_drop_shadow",
				"type" => "true_false",
				"instructions" => __( 'Enable a drop shadow effect for blog post items.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => 0,
				"ui" => 1,
				"ui_on_text" => __( 'Yes', 'ohio' ),
				"ui_off_text" => __( 'No', 'ohio' ),
				"message" => "",
				"default_value" => 0
			],
			[
				"key" => "field_5937aa3d23s15gh",
				"label" => '<h4>' . __( 'Styles and Display', 'ohio' ) . '</h4>',
				"name" => "",
				"type" => "message"
			],
			[
				"key" => "field_593f2345fbsdf3s",
				"label" => __( 'Divider Color', 'ohio' ),
				"name" => "global_posts_card_divider_color",
				"type" => "ohio_color",
				"instructions" => __( 'Set the divider color between blog post items.', 'ohio' ),
				"conditional_logic" => [
					[
						[
							"field" => "field_592d60af8b80c",
							"operator" => "==",
							"ui_on_text" => __( 'Yes', 'ohio' )
						]
					]
				],
				"required" => 0,
				"default_value" => ""
			],
			[
				"key" => "field_593f2345fbsdf1",
				"label" => __( 'Contained Layout Background', 'ohio' ),
				"name" => "global_posts_card_background_color",
				"type" => "ohio_color",
				"instructions" => __( 'Set the background color of the contained blog card item.', 'ohio' ),
				"conditional_logic" => [
					[
						[
							"field" => "field_592d60af8b80c",
							"operator" => "!=",
							"ui_on_text" => __( 'Yes', 'ohio' )
						]
					]
				],
				"required" => 0,
				"default_value" => ""
			],
			[
				"key" => "field_592s60af8bc07",
				"label" => __( 'Author', 'ohio' ),
				"name" => "global_posts_author_visibility",
				"type" => "true_false",
				"instructions" => __( 'Show an author on blog post items.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => 0,
				"ui" => 1,
				"ui_on_text" => __( 'Yes', 'ohio' ),
				"ui_off_text" => __( 'No', 'ohio' ),
				"message" => "",
				"default_value" => 1
			],
			[
				"key" => "field_593f2345fbsdf3",
				"label" => __( 'Author Typography', 'ohio' ),
				"name" => "global_posts_author_typo",
				"type" => "ohio_typo",
				"instructions" => __( 'Set the typography and color for the author of publications.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_592s60af8bc07",
							"operator" => "!=",
							"ui_on_text" => __( 'Yes', 'ohio' )
						]
					]
				],
				"add_theme_inherited" => false
			],
			[
				"key" => "field_58323572389572",
				"label" => __( 'Publication Date', 'ohio' ),
				"name" => "global_posts_date_visibility",
				"type" => "true_false",
				"instructions" => __( 'Show the date of publication on blog post items.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => 0,
				"ui" => 1,
				"ui_on_text" => __( 'Yes', 'ohio' ),
				"ui_off_text" => __( 'No', 'ohio' ),
				"message" => "",
				"default_value" => 1
			],
			[
				"key" => "field_593f2345fbsdf4",
				"label" => __( 'Publication Date Typography', 'ohio' ),
				"name" => "global_posts_date_typo",
				"type" => "ohio_typo",
				"instructions" => __( 'Set the typography and color for the publication date.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_58323572389572",
							"operator" => "!=",
							"ui_on_text" => __( 'Yes', 'ohio' )
						]
					]
				],
				"add_theme_inherited" => false
			],


			[
				"key" => "field_583sh61azen4123f8bc07",
				"label" => __( 'Reading Time', 'ohio' ),
				"name" => "global_posts_reading_time_visibility",
				"type" => "true_false",
				"instructions" => __( 'Show an approximate post reading time on blog post items.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => 0,
				"ui" => 1,
				"ui_on_text" => __( 'Yes', 'ohio' ),
				"ui_off_text" => __( 'No', 'ohio' ),
				"message" => "",
				"default_value" => 1
			],
			[
				"key" => "field_593f2345fbsnxzq354gdf8",
				"label" => __( 'Reading Time Typography', 'ohio' ),
				"name" => "global_posts_reading_time_typo",
				"type" => "ohio_typo",
				"instructions" => __( 'Set the typography and color for the approximate reading time.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_583sh61azen4123f8bc07",
							"operator" => "!=",
							"ui_on_text" => __( 'Yes', 'ohio' )
						]
					]
				],
				"add_theme_inherited" => false
			],
			[
				"key" => "field_593f2345fbsdf6",
				"label" => __( 'Title Typography', 'ohio' ),
				"name" => "global_posts_title_typo",
				"type" => "ohio_typo",
				"instructions" => __( 'Set the typography and color for the blog post title.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => 0,
				"add_theme_inherited" => false
			],
			[
				"key" => "field_593sh61af8bc07",
				"label" => __( 'Excerpt', 'ohio' ),
				"name" => "global_posts_short_description_visibility",
				"type" => "true_false",
				"instructions" => __( 'Show an excerpt on blog post items.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => 0,
				"ui" => 1,
				"ui_on_text" => __( 'Yes', 'ohio' ),
				"ui_off_text" => __( 'No', 'ohio' ),
				"message" => "",
				"default_value" => 1
			],
			[
				"key" => "field_593f2345fbfas124",
				"label" => __( 'Excerpt Length', 'ohio' ),
				"name" => "global_posts_content_length",
				"type" => "number",
				"instructions" => __( 'Set the length of the post excerpt for the entire site.', 'ohio' ),
				"required" => 0,
				"append" => __( 'words', 'ohio' ),
				"default_value" => 12,
				"conditional_logic" => [
					[
						[
							"field" => "field_593sh61af8bc07",
							"operator" => "!=",
							"ui_on_text" => __( 'Yes', 'ohio' )
						]
					]
				],
				"add_theme_inherited" => false
			],
			[
				"key" => "field_593f2345fbsdf7",
				"label" => __( 'Excerpt Typography', 'ohio' ),
				"name" => "global_posts_content_typo",
				"type" => "ohio_typo",
				"instructions" => __( 'Set the typography and color for the blog post excerpt.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_593sh61af8bc07",
							"operator" => "!=",
							"ui_on_text" => __( 'Yes', 'ohio' )
						]
					]
				],
				"add_theme_inherited" => false
			],
			[
				"key" => "field_593s61af8bc07",
				"label" => __( 'Categories', 'ohio' ),
				"name" => "global_posts_category_visibility",
				"type" => "true_false",
				"instructions" => __( 'Show publication categories on blog post items.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => 0,
				"ui" => 1,
				"ui_on_text" => __( 'Yes', 'ohio' ),
				"ui_off_text" => __( 'No', 'ohio' ),
				"message" => "",
				"default_value" => 1
			],
			[
				"key" => "field_593f2345fbsdf5",
				"label" => __( 'Categories Typography', 'ohio' ),
				"name" => "global_posts_category_typo",
				"type" => "ohio_typo",
				"instructions" => __( 'Set the typography and color for the publication categories.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_593s61af8bc07",
							"operator" => "!=",
							"ui_on_text" => __( 'Yes', 'ohio' )
						]
					]
				],
				"add_theme_inherited" => false
			],
			[
				"key" => "field_583sh61af8bc07",
				"label" => __( 'Read More', 'ohio' ),
				"name" => "global_posts_read_more_visibility",
				"type" => "true_false",
				"instructions" => __( 'Show a "Read More" button on blog post items.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => 0,
				"ui" => 1,
				"ui_on_text" => __( 'Yes', 'ohio' ),
				"ui_off_text" => __( 'No', 'ohio' ),
				"message" => "",
				"default_value" => 1
			],
			[
				"key" => "field_593f2345fbsdf8",
				"label" => __( 'Read More Typography', 'ohio' ),
				"name" => "global_posts_readmore_typo",
				"type" => "ohio_typo",
				"instructions" => __( 'Set the typography and color for the "Read More" button.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => [
					[
						[
							"field" => "field_583sh61af8bc07",
							"operator" => "!=",
							"ui_on_text" => __( 'Yes', 'ohio' )
						]
					]
				],
				"add_theme_inherited" => false
			],
			[
				"key" => "field_5937aa3d23s15gj",
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
				"key" => "field_591ef18a3ef37",
				"label" => __( 'Categories', 'ohio' ),
				"name" => "global_breadcrumbs_show_cats",
				"type" => "true_false",
				"instructions" => __( 'Display the filter by categories.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => 0,
				"message" => "",
				"default_value" => 1,
				"ui" => 1,
				"ui_on_text" => "",
				"ui_off_text" => ""
			],
			[
				"key" => "field_591ef1773ef36",
				"label" => __( 'Tags', 'ohio' ),
				"name" => "global_breadcrumbs_show_tags",
				"type" => "true_false",
				"instructions" => __( 'Display the filter by tags.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => 0,
				"message" => "",
				"default_value" => 1,
				"ui" => 1,
				"ui_on_text" => "",
				"ui_off_text" => ""
			],
			[
				"key" => "field_591ef1473ef35",
				"label" => __( 'Authors', 'ohio' ),
				"name" => "global_breadcrumbs_show_author",
				"type" => "true_false",
				"instructions" => __( 'Display the filter by authors.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => 0,
				"message" => "",
				"default_value" => 1,
				"ui" => 1,
				"ui_on_text" => "",
				"ui_off_text" => ""
			],
			[
				"key" => "field_5937aa3d23s15gs",
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
				"key" => "field_592d60af8b001",
				"label" => __( 'Type', 'ohio' ),
				"name" => "global_blog_pagination_type",
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
				"key" => "field_592d60af8b002",
				"label" => __( 'Style', 'ohio' ),
				"name" => "global_blog_pagination_style",
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
				"key" => "field_592d60af8b003",
				"label" => __( 'Size', 'ohio' ),
				"name" => "global_blog_pagination_size",
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
				"key" => "field_59374afs43d8361523f",
				"label" => __( 'Position', 'ohio' ),
				"name" => "global_blog_pagination_position",
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
				"key" => "field_592d60af8a413",
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
				"key" => "field_592d60lf8a413",
				"label" => '<h4>' . __( 'Breadcrumbs', 'ohio' ) . '</h4>',
				"name" => "",
				"type" => "message"
			],
			[
				"key" => "field_5937434433s3615",
				"label" => __( 'Home Slug', 'ohio' ),
				"name" => "global_page_home_breadcrumb_slug",
				"type" => "text",
				"instructions" => __( 'Add a custom value for the breadcrumbs home slug.', 'ohio' ),
				"required" => 0,
				"conditional_logic" => 0,
				"new_lines" => "",
				"esc_html" => 0
			]
		],
		"location" => [
			[
				[
					"param" => "options_page",
					"operator" => "==",
					"value" => "theme-general-blog"
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
