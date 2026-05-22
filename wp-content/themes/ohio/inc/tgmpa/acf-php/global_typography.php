<?php if ( function_exists( 'acf_add_local_field_group' ) ) :

    acf_add_local_field_group( [
        "key" => "group_5946360af343c5",
        "title" => __( 'Typography Settings', 'ohio' ),
        "private" => true,
        "fields" => [
            [
                "key" => "field_542f5ad4313bf",
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
                "key" => "field_59229bd23ssaf154235",
                "label" => __( 'Font Source', 'ohio' ),
                "name" => "global_page_font_type",
                "type" => "image_option",
                "instructions" => __( 'Choose the font source for your entire site. System fonts are used by default.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "image_option_value" => [
                    [
                        "name" => "google_fonts",
                        "description" => __( 'Google Fonts', 'ohio' ),
                        "src" => "acf__image_google.svg"
                    ],
                    [
                        "name" => "adobe_fonts",
                        "description" => __( 'Adobe Fonts', 'ohio' ),
                        "src" => "acf__image_adobe.svg"
                    ],
                    [
                        "name" => "manual_custom_fonts",
                        "description" => __( 'Custom Fonts', 'ohio' ),
                        "src" => "acf__image_custom.svg"
                    ]
                ],
                "default_value" => "google_fonts"
            ],
            [
                "key" => "field_591a34534s9d31f3",
                "label" => __( 'Adobe Fonts Project ID', 'ohio' ),
                "name" => "global_adobekit_url",
                "type" => "text",
                "instructions" => __( 'Create and paste your', 'ohio' ) . '&nbsp;<a target="_blank" href="https://fonts.adobe.com/">Adobe Fonts</a>&nbsp;' . __( 'web project ID.', 'ohio' ) . '<br><em>' . __( '(e.g. f3g5j8g)', 'ohio' ) . '</em>',
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bd23ssaf154235",
                            "operator" => "==",
                            "value" => "adobe_fonts"
                        ]
                    ]
                ],
                "default_value" => "",
                "placeholder" => __( 'Paste your web project ID', 'ohio' ),
                "prepend" => "",
                "append" => "",
                "maxlength" => 200
            ],
            [
                "key" => "field_5c4ec3e96dbf8",
                "label" => __( 'Adobe Fonts', 'ohio' ),
                "name" => "global_adobekit_fonts",
                "type" => "repeater",
                "instructions" => __( 'Add the list of', 'ohio' ) . '&nbsp;<a target="_blank" href="https://fonts.adobe.com/">Adobe Fonts</a>&nbsp;' . __( 'to use on your site. Note, selecting a different font can affect the speed of your site.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bd23ssaf154235",
                            "operator" => "==",
                            "value" => "adobe_fonts"
                        ]
                    ]
                ],
                "collapsed" => "",
                "min" => 0,
                "max" => 0,
                "layout" => "table",
                "button_label" => __( 'Add Font', 'ohio' ),
                "sub_fields" => [
                    [
                        "key" => "field_5c4ec3f36dbf9",
                        "label" => __( 'Font Family <mark></mark>', 'ohio' ) . '<b>' . __( '(e.g. adobe-caslon-pro)', 'ohio' ) . '</b>',
                        "name" => "font_family",
                        "type" => "text",
                        "instructions" => "",
                        "required" => 1,
                        "conditional_logic" => 0,
                        "wrapper" => [
                            "width" => "",
                            "class" => "",
                            "id" => ""
                        ],
                        "default_value" => "",
                        "placeholder" => "",
                        "prepend" => "",
                        "append" => "",
                        "maxlength" => ""
                    ],
                    [
                        "key" => "field_5c4ec45a6dbfa",
                        "label" => __( 'Font Styles', 'ohio' ),
                        "name" => "font_styles",
                        "type" => "checkbox",
                        "instructions" => "",
                        "required" => 1,
                        "conditional_logic" => 0,
                        "wrapper" => [
                            "width" => "",
                            "class" => "",
                            "id" => ""
                        ],
                        "choices" => [
                            "thin",
                            "light",
                            "regular",
                            "bold",
                            "ultrabold"
                        ],
                        "allow_custom" => 0,
                        "default_value" => [
                            400
                        ],
                        "layout" => "horizontal",
                        "toggle" => 1,
                        "return_format" => "value",
                        "save_custom" => 0
                    ]
                ]
            ],
            [
                "key" => "field_5e47f43b4e629",
                "label" => __( 'Custom Fonts', 'ohio' ),
                "name" => "global_manual_custom_fonts",
                "type" => "repeater",
                "instructions" => __( 'Add the list of custom fonts to use on your site. Note, selecting a different font can affect the speed of your site.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bd23ssaf154235",
                            "operator" => "==",
                            "value" => "manual_custom_fonts"
                        ]
                    ]
                ],
                "wrapper" => [
                    "width" => "",
                    "class" => "",
                    "id" => ""
                ],
                "collapsed" => "",
                "min" => 0,
                "max" => 0,
                "layout" => "table",
                "button_label" => __( 'Add Font', 'ohio' ),
                "sub_fields" => [
                    [
                        "key" => "field_5e47f8f4e135a",
                        "label" => __( 'Font Family', 'ohio' ),
                        "name" => "font_name",
                        "type" => "text",
                        "instructions" => "",
                        "required" => 0,
                        "conditional_logic" => 0,
                        "wrapper" => [
                            "width" => "",
                            "class" => "",
                            "id" => ""
                        ],
                        "default_value" => "",
                        "placeholder" => "",
                        "prepend" => "",
                        "append" => "",
                        "maxlength" => ""
                    ],
                    [
                        "key" => "field_5e47f93fe135b",
                        "label" => __( 'Font Weight', 'ohio' ),
                        "name" => "font_weight",
                        "type" => "select",
                        "instructions" => "",
                        "required" => 0,
                        "conditional_logic" => 0,
                        "wrapper" => [
                            "width" => "",
                            "class" => "",
                            "id" => ""
                        ],
                        "choices" => [
                            "100" => "100 (Thin)",
                            "200" => "200 (Light)",
                            "300" => "300 (Book)",
                            "400" => "400 (Regular)",
                            "500" => "500 (Medium)",
                            "600" => "600 (Semi-bold)",
                            "700" => "700 (Bold)",
                            "800" => "800 (Black)",
                            "900" => "900 (Ultra-black)"
                        ],
                        "default_value" => [
                            "400"
                        ],
                        "allow_null" => 0,
                        "multiple" => 0,
                        "ui" => 0,
                        "return_format" => "value",
                        "ajax" => 0,
                        "placeholder" => ""
                    ],
                    [
                        "key" => "field_5e47f991e135c",
                        "label" => __( 'Font Style', 'ohio' ),
                        "name" => "font_style",
                        "type" => "select",
                        "instructions" => "",
                        "required" => 0,
                        "conditional_logic" => 0,
                        "wrapper" => [
                            "width" => "",
                            "class" => "",
                            "id" => ""
                        ],
                        "choices" => [
                            "" => __( 'Normal', 'ohio' ),
                            "italic" => __( 'Italic', 'ohio' )
                        ],
                        "default_value" => [
                            "normal"
                        ],
                        "allow_null" => 0,
                        "multiple" => 0,
                        "ui" => 0,
                        "return_format" => "value",
                        "ajax" => 0,
                        "placeholder" => ""
                    ],
                    [
                        "key" => "field_5e47f4494e62a",
                        "label" => __( '.ttf/.otf Format', 'ohio' ),
                        "name" => "ttfotf_font_file",
                        "type" => "file",
                        "instructions" => "",
                        "required" => 0,
                        "conditional_logic" => 0,
                        "wrapper" => [
                            "width" => "",
                            "class" => "",
                            "id" => ""
                        ],
                        "return_format" => "url",
                        "library" => "all",
                        "min_size" => "",
                        "max_size" => "",
                        "mime_types" => "ttf,otf"
                    ],
                    [
                        "key" => "field_5e47f4d94e62b",
                        "label" => __( '.woff/.woff2 Format', 'ohio' ),
                        "name" => "woff_font_file",
                        "type" => "file",
                        "instructions" => "",
                        "required" => 0,
                        "conditional_logic" => 0,
                        "wrapper" => [
                            "width" => "",
                            "class" => "",
                            "id" => ""
                        ],
                        "return_format" => "url",
                        "library" => "all",
                        "min_size" => "",
                        "max_size" => "",
                        "mime_types" => "woff,woff2"
                    ]
                ]
            ],
            [
                "key" => "field_542f4ad4313bf",
                "label" => __( 'Fonts', 'ohio' ),
                "name" => "",
                "type" => "tab",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "placement" => "top",
                "endpoint" => 0
            ],
            [
                "key" => "field_591ac509d1630",
                "label" => __( 'Body Typography', 'ohio' ),
                "name" => "global_page_text_typo",
                "type" => "ohio_typo",
                "instructions" => __( 'Set the typography and color for the body text.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_591ac509d1a45",
                "label" => __( 'Headings Typography', 'ohio' ),
                "name" => "global_page_headings_typo",
                "type" => "ohio_typo",
                "instructions" => __( 'Set the typography and color for the headings.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_591ac509d2622",
                "label" => __( 'Subtitles Typography', 'ohio' ),
                "name" => "global_page_subtitles_typo",
                "type" => "ohio_typo",
                "instructions" => __( 'Set the typography and color for the subtitles.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "add_theme_inherited" => false
            ],
			[
                "key" => "field_591ac509d1a451",
                "label" => __( 'H1 Tag Typography', 'ohio' ),
                "name" => "global_page_headings_typo_h1",
                "type" => "ohio_typo",
                "instructions" => __( 'Set the typography and color for the H1 HTML tags.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "add_theme_inherited" => false
            ],
			[
                "key" => "field_591ac509d1a452",
                "label" => __( 'H2 Tag Typography', 'ohio' ),
                "name" => "global_page_headings_typo_h2",
                "type" => "ohio_typo",
                "instructions" => __( 'Set the typography and color for the H2 HTML tags.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "add_theme_inherited" => false
            ],
			[
                "key" => "field_591ac509d1a453",
                "label" => __( 'H3 Tag Typography', 'ohio' ),
                "name" => "global_page_headings_typo_h3",
                "type" => "ohio_typo",
                "instructions" => __( 'Set the typography and color for the H3 HTML tags.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "add_theme_inherited" => false
            ],
			[
                "key" => "field_591ac509d1a454",
                "label" => __( 'H4 Tag Typography', 'ohio' ),
                "name" => "global_page_headings_typo_h4",
                "type" => "ohio_typo",
                "instructions" => __( 'Set the typography and color for the H4 HTML tags.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "add_theme_inherited" => false
            ],
			[
                "key" => "field_591ac509d1a455",
                "label" => __( 'H5 Tag Typography', 'ohio' ),
                "name" => "global_page_headings_typo_h5",
                "type" => "ohio_typo",
                "instructions" => __( 'Set the typography and color for the H5 HTML tags.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "add_theme_inherited" => false
            ],
			[
                "key" => "field_591ac509d1a456",
                "label" => __( 'H6 Tag Typography', 'ohio' ),
                "name" => "global_page_headings_typo_h6",
                "type" => "ohio_typo",
                "instructions" => __( 'Set the typography and color for the H6 HTML tags.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_54245ad4313bf",
                "label" => __( 'Adaptive Fonts', 'ohio' ),
                "name" => "",
                "type" => "tab",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "placement" => "top",
                "endpoint" => 0
            ],
            [
                "key" => "field_591ac509d2622mod1",
                "label" => __( 'Body Typography', 'ohio' ),
                "name" => "global_page_paragraphs_font_sizes",
                "type" => "ohio_sizes",
                "instructions" => __( 'Set the responsive typography and color for the body text.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0
            ],
            [
                "key" => "field_591ac509d2622mod3",
                "label" => __( 'Subtitles Typography', 'ohio' ),
                "name" => "global_page_subtitles_font_sizes",
                "type" => "ohio_sizes",
                "instructions" => __( 'Set the responsive typography and color for the subtitles.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0
            ],
            [
                "key" => "field_591ac509d2622h1",
                "label" => __( 'H1 Tag Typography', 'ohio' ),
                "name" => "global_page_titles_h1_font_sizes",
                "type" => "ohio_sizes",
                "instructions" => __( 'Set the responsive typography and color for the H1 HTML tags.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0
            ],
            [
                "key" => "field_591ac509d2622h2",
                "label" => __( 'H2 Tag Typography', 'ohio' ),
                "name" => "global_page_titles_h2_font_sizes",
                "type" => "ohio_sizes",
                "instructions" => __( 'Set the responsive typography and color for the H2 HTML tags.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0
            ],
            [
                "key" => "field_591ac509d2622h3",
                "label" => __( 'H3 Tag Typography', 'ohio' ),
                "name" => "global_page_titles_h3_font_sizes",
                "type" => "ohio_sizes",
                "instructions" => __( 'Set the responsive typography and color for the H3 HTML tags.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0
            ],
            [
                "key" => "field_591ac509d2622h4",
                "label" => __( 'H4 Tag Typography', 'ohio' ),
                "name" => "global_page_titles_h4_font_sizes",
                "type" => "ohio_sizes",
                "instructions" => __( 'Set the responsive typography and color for the H4 HTML tags.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0
            ],
            [
                "key" => "field_591ac509d2622h5",
                "label" => __( 'H5 Tag Typography', 'ohio' ),
                "name" => "global_page_titles_h5_font_sizes",
                "type" => "ohio_sizes",
                "instructions" => __( 'Set the responsive typography and color for the H5 HTML tags.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0
            ],
            [
                "key" => "field_591ac509d2622h6",
                "label" => __( 'H6 Tag Typography', 'ohio' ),
                "name" => "global_page_titles_h6_font_sizes",
                "type" => "ohio_sizes",
                "instructions" => __( 'Set the responsive typography and color for the H6 HTML tags.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0
            ]
        ],
        "location" => [
            [
                [
                    "param" => "options_page",
                    "operator" => "==",
                    "value" => "theme-general-typography"
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
