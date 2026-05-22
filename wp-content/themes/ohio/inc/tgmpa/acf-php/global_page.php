<?php if ( function_exists( 'acf_add_local_field_group' ) ) :

    acf_add_local_field_group( [
        "key" => "group_591ac509c1730",
        "title" => __( 'Pages Settings', 'ohio' ),
        "private" => true,
        "fields" => [
            [
                "key" => "field_591b002d481fc",
                "label" => __( 'General', 'ohio' ),
                "name" => "",
                "type" => "tab",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "wrapper" => [
                    "width" => "",
                    "class" => "",
                    "id" => ""
                ],
                "placement" => "top",
                "endpoint" => 0
            ],
            [
                "key" => "field_5937e0a52b48cexmod153",
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
                "key" => "field_591ac509d31f3",
                "label" => __( 'Wrap Container', 'ohio' ),
                "name" => "global_page_add_wrapper",
                "type" => "true_false",
                "instructions" => __( 'Enable a wrap container, full-width layout is used when disabled.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 1,
                "ui" => 1,
                "ui_on_text" => __( 'Yes', 'ohio' ),
                "ui_off_text" => __( 'No', 'ohio' )
            ],
            [
                "key" => "field_591ac5s9d31f3",
                "label" => __( 'Wrap Container Width', 'ohio' ),
                "name" => "global_page_content_wrapper_width",
                "type" => "text",
                "instructions" => __( 'Set the width of the page wrap container.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_591ac509d31f3",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "default_value" => "",
                "placeholder" => "1344px by default",
                "prepend" => __( 'Use CSS units', 'ohio' ),
                "append" => "",
                "maxlength" => 200
            ],
            [
                "key" => "field_591b10dbb4a85_fwgaps",
                "label" => __( 'Side Gaps', 'ohio' ),
                "name" => "global_page_full_width_margins_size",
                "type" => "text",
                "instructions" => __( 'Set the size of the side gaps for a full-width page layout.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_591ac509d31f3",
                            "operator" => "!=",
                            "value" => "1"
                        ]
                    ]
                ],
                "default_value" => "",
                "placeholder" => "16px by default",
                "prepend" => __( 'Use CSS units', 'ohio' ),
                "append" => "",
                "maxlength" => 200
            ],
            [
                "key" => "field_591ac509d3606",
                "label" => __( 'Vertical Gaps', 'ohio' ),
                "name" => "global_page_add_top_padding",
                "type" => "true_false",
                "instructions" => __( 'Add top and bottom vertical gaps for the page content area.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "ui" => 1,
                "ui_on_text" => __( 'Yes', 'ohio' ),
                "ui_off_text" => __( 'No', 'ohio' ),
                "message" => "",
                "default_value" => 1
            ],
			[
                "key" => "field_591b10dbb4a8512rwsa",
                "label" => __( 'Upper Gap', 'ohio' ),
                "name" => "global_page_top_padding_spacing",
                "type" => "text",
                "instructions" => __( 'Set the size of the upper gap for the page content area.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_591ac509d3606",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "default_value" => "",
                "placeholder" => "80px by default",
                "prepend" => __( 'Use CSS units', 'ohio' ),
                "append" => "",
                "maxlength" => 200
            ],
			[
                "key" => "field_591b10dbb4a8512rwasda",
                "label" => __( 'Lower Gap', 'ohio' ),
                "name" => "global_page_bottom_padding_spacing",
                "type" => "text",
                "instructions" => __( 'Set the size of the lower gap for the page content area.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_591ac509d3606",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "default_value" => "",
                "placeholder" => "80px by default",
                "prepend" => __( 'Use CSS units', 'ohio' ),
                "append" => "",
                "maxlength" => 200
            ],
            [
                "key" => "field_59381c77504bs",
                "label" => __( 'Boxed Layout', 'ohio' ),
                "name" => "global_page_use_boxed_wrapper",
                "type" => "true_false",
                "instructions" => __( 'Enable boxed wrapper for the site viewport area.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 0,
                "ui" => 1,
                "ui_on_text" => "",
                "ui_off_text" => ""
            ],
            [
                "key" => "field_59381c77504bf",
                "label" => __( 'Boxed Layout Indent', 'ohio' ),
                "name" => "global_page_boxed_wrapper_margins_size",
                "type" => "text",
                "instructions" => __( 'Set the size of the side indent for the boxed content area.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59381c77504bs",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "default_value" => "",
                "placeholder" => "12vw by default",
                "prepend" => __( 'Use CSS units', 'ohio' ),
                "append" => "",
                "maxlength" => 200
            ],
            [
                "key" => "field_591ac509d1208grp",
                "label" => __( 'Background', 'ohio' ),
                "name" => "global_page",
                "type" => "clone",
                "instructions" => __( 'Customize the background for all pages of your site.', 'ohio' ),
                "required" => false,
                "conditional_logic" => false,
                "clone" => [
                    "group_982e082a3bcfcf81b766eaa1ec2df4f11e0f5cd3"
                ],
                "display" => "group",
                "layout" => "block",
                "prefix_label" => false,
                "prefix_name" => true
            ],
            [
                "key" => "field_59229bda372c9",
                "label" => __( 'Page Headline', 'ohio' ),
                "name" => "",
                "type" => "tab",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "placement" => "top",
                "endpoint" => 0
            ],
            [
                "key" => "field_59229bda38e8d",
                "label" => __( 'Page Headline', 'ohio' ),
                "name" => "global_page_header_title_visibility",
                "type" => "true_false",
                "instructions" => __( 'Show the page headline on the entire site.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 1,
                "ui" => 1,
                "ui_on_text" => __( 'Yes', 'ohio' ),
                "ui_off_text" => __( 'No', 'ohio' )
            ],
            [
                "key" => "field_59229e431eaea",
                "label" => __( 'Content Alignment', 'ohio' ),
                "name" => "global_page_header_title_align",
                "type" => "button_group",
                "instructions" => __( 'Choose the page headline content position for the entire site.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bda38e8d",
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
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "left",
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_59229bda3868f",
                "label" => __( 'Fullscreen Mode', 'ohio' ),
                "name" => "global_page_header_title_fullscreen",
                "type" => "true_false",
                "instructions" => __( 'Set the page headline height equal to the viewport area.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bda38e8d",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "message" => "",
                "default_value" => 0,
                "ui" => 1,
                "ui_on_text" => __( 'Yes', 'ohio' ),
                "ui_off_text" => __( 'No', 'ohio' )
            ],
            [
                "key" => "field_59229e4312938576",
                "label" => __( 'Content Vertical Alignment', 'ohio' ),
                "name" => "global_page_header_title_vertical_alignment",
                "type" => "button_group",
                "instructions" => __( 'Choose the page headline content vertical alignment.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bda3868f",
                            "operator" => "==",
                            "value" => 1
                        ]
                    ]
                ],
                "choices" => [
                    "top" => __( '<i class="bi bi-align-top"></i> Top', 'ohio' ),
                    "middle" => __( '<i class="bi bi-align-center"></i> Center', 'ohio' ),
                    "bottom" => __( '<i class="bi bi-align-bottom"></i> Bottom', 'ohio' )
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "bottom",
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_59229bda38a78",
                "label" => __( 'Height', 'ohio' ),
                "name" => "global_page_header_title_height",
                "type" => "ohio_responsive_height",
                "instructions" => __( 'Set the page headline height.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bda3868f",
                            "operator" => "!=",
                            "value" => "1"
                        ],
                        [
                            "field" => "field_59229bda38e8d",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ],
                ],

                "default_value" => ""
            ],
            [
                "key" => "field_5922a0ea1eaebgrp",
                "label" => __( 'Background', 'ohio' ),
                "name" => "global_page_header_title",
                "type" => "clone",
                "instructions" => __( 'Customize the background of the page headline.', 'ohio' ),
                "required" => false,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bda38e8d",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "clone" => [
                    "group_982e082a3bcfcf81b766eaa1ec2df4f11e0f5cd3"
                ],
                "display" => "group",
                "layout" => "block",
                "prefix_label" => false,
                "prefix_name" => true
            ],
            [
                "key" => "field_59229bwjeofwnheof3920",
                "label" => __( 'Parallax Effect', 'ohio' ),
                "name" => "global_page_header_title_use_parallax",
                "type" => "true_false",
                "instructions" => __( 'Enable parallax effect for the background image of the page headlines.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bda38e8d",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "message" => "",
                "default_value" => 0,
                "ui" => 1,
                "ui_on_text" => __( 'Yes', 'ohio' ),
                "ui_off_text" => __( 'No', 'ohio' )
            ],
            [
                "key" => "field_5937sc62g152w346",
                "label" => '<h4>' . __( 'Styles', 'ohio' ) . '</h4>',
                "name" => "",
                "type" => "message",
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bda38e8d",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
            ],
            [
                "key" => "field_59229bda376e8",
                "label" => __( 'Overlay', 'ohio' ),
                "name" => "global_page_header_title_use_overlay",
                "type" => "true_false",
                "instructions" => __( 'Add an overlay over the page headline background image.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bda38e8d",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "message" => "",
                "default_value" => 1,
                "ui" => 1,
                "ui_on_text" => __( 'Yes', 'ohio' ),
                "ui_off_text" => __( 'No', 'ohio' )
            ],
            [
                "key" => "field_59229bda37acf",
                "label" => __( 'Overlay Color', 'ohio' ),
                "name" => "global_page_header_title_overlay_color",
                "type" => "ohio_color",
                "instructions" => __( 'Set the overlay color.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bda376e8",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "default_value" => ""
            ],
            [
                "key" => "field_59229bda3827b",
                "label" => __( 'Heading Typography', 'ohio' ),
                "name" => "global_page_header_title_typo",
                "type" => "ohio_typo",
                "instructions" => __( 'Set the typography and color for the page heading.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bda38e8d",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
            ],
            [
                "key" => "field_59229d1dd0a61",
                "label" => __( 'Subtitle Typography', 'ohio' ),
                "name" => "global_page_header_subtitle_typo",
                "type" => "ohio_typo",
                "instructions" => __( 'Set the typography and color for the page subtitle.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bda38e8d",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
            ],
            [
                "key" => "field_59lfd21r32r23",
                "label" => '<h4>' . __( 'Dynamic Colors', 'ohio' ) . '</h4>',
                "name" => "",
                "type" => "message"
            ],
            [
                "key" => "field_59229bda382345",
                "label" => __( 'Dark Section Mode', 'ohio' ),
                "name" => "global_page_header_title_dynamic_typo",
                "type" => "true_false",
                "instructions" => __( 'Enable the dark section mode for the dynamically changing colors.', 'ohio' ) . '<br><em> ' . __( '(clb__dark_section class will be added to the page headline area.)', 'ohio' ) . '</em>',
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bda38e8d",
                            "operator" => "==",
                            "value" => "1"
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
                "key" => "field_5937sc63g152w346",
                "label" => __( 'Back Button', 'ohio' ),
                "name" => "",
                "type" => "tab",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bda38e8d",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "wrapper" => [
                    "width" => "",
                    "class" => "",
                    "id" => ""
                ],
                "placement" => "top",
                "endpoint" => 0
            ],
            [
                "key" => "field_5922qef4g4376e8",
                "label" => __( 'Back Button', 'ohio' ),
                "name" => "global_page_header_previous_button",
                "type" => "true_false",
                "instructions" => __( 'Display the go back button at the top left area of the entire site.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bda38e8d",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "message" => "",
                "default_value" => 1,
                "ui" => 1,
                "ui_on_text" => __( 'Yes', 'ohio' ),
                "ui_off_text" => __( 'No', 'ohio' )
            ],
            [
                "key" => "field_59256hderger8",
                "label" => __( 'Back Button Caption', 'ohio' ),
                "name" => "global_page_header_previous_button_text",
                "type" => "text",
                "instructions" => __( 'Add a text caption for the go back button.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_5922qef4g4376e8",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "message" => "",
                "default_value" => __( 'Back', 'ohio' ),
                "ui" => 1,
                "ui_on_text" => __( 'Yes', 'ohio' ),
                "ui_off_text" => __( 'No', 'ohio' )
            ],
            [
                "key" => "field_5937235928395",
                "label" => '<h4>' . __( 'Styles', 'ohio' ) . '</h4>',
                "name" => "",
                "type" => "message",
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_5922qef4g4376e8",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
            ],
            [
                "key" => "field_59223452345a3827b",
                "label" => __( 'Caption Typography', 'ohio' ),
                "name" => "global_page_header_previous_button_typo",
                "type" => "ohio_typo",
                "instructions" => __( 'Set the typography and color for the go back button caption.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_5922qef4g4376e8",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_591b0f20ed84s",
                "label" => __( 'Sidebar', 'ohio' ),
                "name" => "",
                "type" => "tab",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "wrapper" => [
                    "width" => "",
                    "class" => "",
                    "id" => ""
                ],
                "placement" => "top",
                "endpoint" => 0
            ],
            [
                "key" => "field_59390deaf218c",
                "label" => __( 'Sidebar', 'ohio' ),
                "name" => "global_page_sidebar_position",
                "type" => "radio",
                "instructions" => __( 'Show a sidebar on the entire site.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "choices" => [
                    "without" => __( 'Disable', 'ohio' ),
                    "left" => __( 'Left', 'ohio' ),
                    "right" => __( 'Right', 'ohio' )
                ],
                "default_value" => [
                    "left"
                ],
                "allow_null" => 0,
                "multiple" => 0,
                "ui" => 0,
                "layout" => "horizontal",
                "ajax" => 0,
                "return_format" => "value",
                "placeholder" => ""
            ],
            [
                "key" => "field_59392223423434234c",
                "label" => __( 'Sidebar Layout', 'ohio' ),
                "name" => "global_page_sidebar_layout",
                "type" => "select",
                "instructions" => __( 'Choose the layout type for the sidebar.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59390deaf218c",
                            "operator" => "!=",
                            "value" => "without"
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
                "return_format" => "value"
            ],
            [
                "key" => "field_5939272395862334",
                "label" => __( 'Sidebar Gaps', 'ohio' ),
                "name" => "global_page_sidebar_gaps",
                "type" => "text",
                "instructions" => __( 'Set the sidebar gaps.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59390deaf218c",
                            "operator" => "!=",
                            "value" => "without"
                        ],
                        [
                            "field" => "field_59392223423434234c",
                            "operator" => "!=",
                            "value" => "default"
                        ]
                    ]
                ],
                "default_value" => "",
                "placeholder" => "",
                "prepend" => __( 'Use CSS units', 'ohio' ),
                "append" => "",
                "maxlength" => 200
            ],
            [
                "key" => "field_5939222395862334",
                "label" => __( 'Sidebar Width', 'ohio' ),
                "name" => "global_page_sidebar_width",
                "type" => "ohio_responsive_height",
                "instructions" => __( 'Set the sidebar width.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59390deaf218c",
                            "operator" => "!=",
                            "value" => "without"
                        ]
                    ]
                ],
                "default_value" => ""
            ],
            [
                "key" => "field_5939222395862323",
                "label" => __( 'Widgets Divider', 'ohio' ),
                "name" => "global_page_widgets_divider",
                "type" => "true_false",
                "instructions" => __( 'Show widgets divider on the sidebar.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59390deaf218c",
                            "operator" => "!=",
                            "value" => "without"
                        ]
                    ]
                ],
                "message" => "",
                "default_value" => 1,
                "ui" => 1,
                "ui_on_text" => __( 'Yes', 'ohio' ),
                "ui_off_text" => __( 'No', 'ohio' )
            ],
            [
                "key" => "field_593s45s15af5g9t",
                "label" => '<h4>' . __( 'Styles', 'ohio' ) . '</h4>',
                "name" => "",
                "type" => "message",
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59390deaf218c",
                            "operator" => "!=",
                            "value" => "without"
                        ]
                    ]
                ],
            ],
            [
                "key" => "field_5922203568723",
                "label" => __( 'Background', 'ohio' ),
                "name" => "global_page_sidebar",
                "type" => "clone",
                "instructions" => __( 'Customize the background of the sidebar with a boxed layout.', 'ohio' ),
                "required" => false,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59392223423434234c",
                            "operator" => "==",
                            "value" => "boxed"
                        ]
                    ]
                ],
                "clone" => [
                    "group_982e082a3bcfcf81b766eaa1ec2df4f11e0f5cd3"
                ],
                "display" => "group",
                "layout" => "block",
                "prefix_label" => false,
                "prefix_name" => true
            ],
            [
                "key" => "field_5937e3a33b3exmod15",
                "label" => __( 'Widget Titles Typography', 'ohio' ),
                "name" => "global_widgets_heading_typo",
                "type" => "ohio_typo",
                "instructions" => __( 'Set up typography styles for widget heading', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59390deaf218c",
                            "operator" => "!=",
                            "value" => "without"
                        ]
                    ]
                ],
            ],
            [
                "key" => "field_5937e3a33f4exmod15",
                "label" => __( 'Widget Content Typography', 'ohio' ),
                "name" => "global_widgets_content_typo",
                "type" => "ohio_typo",
                "instructions" => __( 'Set up typography styles for widget content', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59390deaf218c",
                            "operator" => "!=",
                            "value" => "without"
                        ]
                    ]
                ],
            ],
            [
                "key" => "field_591b0f20ed84e",
                "label" => __( 'Breadcrumbs', 'ohio' ),
                "name" => "",
                "type" => "tab",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "placement" => "top",
                "endpoint" => 0
            ],
            [
                "key" => "field_591ac509d29ee",
                "label" => __( 'Breadcrumbs', 'ohio' ),
                "name" => "global_page_breadcrumbs_visibility",
                "type" => "true_false",
                "instructions" => __( 'Show breadcrumbs on the entire site.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 1,
                "ui" => 1,
                "ui_on_text" => __( 'Yes', 'ohio' ),
                "ui_off_text" => __( 'No', 'ohio' )
            ],
            [
                "key" => "field_592292035897",
                "label" => __( 'Position', 'ohio' ),
                "name" => "global_page_breadcrumbs_position",
                "type" => "button_group",
                "instructions" => __( 'Choose the breadcrumbs position for the entire site.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_591ac509d29ee",
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
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "left",
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_591b10dbb4a85",
                "label" => __( 'Custom Separator', 'ohio' ),
                "name" => "global_breadcrumbs_separator",
                "type" => "text",
                "instructions" => __( 'Use custom HTML or UTF-8 symbols. Slashes or arrows are highly recommended.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_591ac509d29ee",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "wrapper" => [
                    "width" => "",
                    "class" => "",
                    "id" => ""
                ],
                "default_value" => "",
                "placeholder" => "",
                "prepend" => "",
                "append" => "",
                "maxlength" => 250
            ],
            [
                "key" => "field_591ac509d2e0d",
                "label" => __( 'Home Slug ', 'ohio' ),
                "name" => "global_page_show_home_breadcrumb",
                "type" => "true_false",
                "instructions" => __( 'Show the <b>Home /</b> slug in the breadcrumbs structure.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_591ac509d29ee",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "wrapper" => [
                    "width" => "",
                    "class" => "",
                    "id" => ""
                ],
                "message" => "",
                "default_value" => 1,
                "ui" => 1,
                "ui_on_text" => __( 'Yes', 'ohio' ),
                "ui_off_text" => __( 'No', 'ohio' )
            ],
            [
                "key" => "field_593s35s15af5g9s",
                "label" => '<h4>' . __( 'Styles', 'ohio' ) . '</h4>',
                "name" => "",
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_591ac509d29ee",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "type" => "message"
            ],
            [
                "key" => "field_591ef10cd845c",
                "label" => __( 'Slugs Typography', 'ohio' ),
                "name" => "global_page_breadcrumbs_text_typo",
                "type" => "ohio_typo",
                "instructions" => __( 'Set the typography and color for the breadcrumbs slugs.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_591ac509d29ee",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ]
            ]
        ],
        "location" => [
            [
                [
                    "param" => "options_page",
                    "operator" => "==",
                    "value" => "theme-general-pages"
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
