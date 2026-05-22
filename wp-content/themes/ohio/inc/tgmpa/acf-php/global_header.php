<?php if ( function_exists( 'acf_add_local_field_group' ) ) :

    acf_add_local_field_group( [
        "key" => "group_59229bda27ee2",
        "title" => __( 'Header Settings', 'ohio' ),
        "private" => true,
        "fields" => [
            [
                "key" => "field_59229bda313bf",
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
                "key" => "field_5937e0a52b48cexmod15",
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
                "key" => "field_592fd8902e284",
                "label" => __( 'Header', 'ohio' ),
                "name" => "global_page_header_visibility",
                "type" => "true_false",
                "instructions" => __( 'Show the header on the entire site.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 1,
                "ui" => 1,
                "ui_on_text" => __( 'Yes', 'ohio' ),
                "ui_off_text" => __( 'No', 'ohio' )
            ],
            [
                "key" => "field_59229bda317ae",
                "label" => __( 'Layout', 'ohio' ),
                "name" => "global_page_header_menu_style",
                "type" => "image_option",
                "instructions" => __( 'Choose a header layout type for the entire site.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_592fd8902e284",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "image_option_value" => [
                    [
                        "name" => "style1",
                        "description" => __( 'Standard', 'ohio' ),
                        "src" => "acf__image_01.svg"
                    ],
                    [
                        "name" => "style2",
                        "description" => __( 'With top logo', 'ohio' ),
                        "src" => "acf__image_02.svg"
                    ],
                    [
                        "name" => "style3",
                        "description" => __( 'With center menu', 'ohio' ),
                        "src" => "acf__image_04.svg"
                    ],
                    [
                        "name" => "style4",
                        "description" => __( 'With center logo', 'ohio' ),
                        "src" => "acf__image_05.svg"
                    ],
                    [
                        "name" => "style5",
                        "description" => __( 'With sidebar menu', 'ohio' ),
                        "src" => "acf__image_06.svg"
                    ],
                    [
                        "name" => "style6",
                        "description" => __( 'With top hamburger', 'ohio' ),
                        "src" => "acf__image_07.svg"
                    ],
                    [
                        "name" => "style7",
                        "description" => __( 'With center hamburger', 'ohio' ),
                        "src" => "acf__image_08.svg"
                    ],
                    [
                        "name" => "style8",
                        "description" => __( 'With boxed area', 'ohio' ),
                        "src" => "acf__image_09.svg"
                    ]
                ],
                "default_value" => "style1"
            ],
            [
                "key" => "field_5l92k30j57f235kj",
                "label" => __( 'Contained Menu', 'ohio' ),
                "name" => "global_page_header_contained_menu",
                "type" => "true_false",
                "instructions" => __( 'Add a wrap container for the menu.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_592fd8902e284",
                            "operator" => "==",
                            "value" => "1"
                        ],
                        [
                            "field" => "field_59229bda317ae",
                            "operator" => "!=",
                            "value" => "style5"
                        ],
                        [
                            "field" => "field_59229bda317ae",
                            "operator" => "!=",
                            "value" => "style6"
                        ],
                        [
                            "field" => "field_59229bda317ae",
                            "operator" => "!=",
                            "value" => "style7"
                        ],
                        [
                            "field" => "field_59229bda317ae",
                            "operator" => "!=",
                            "value" => "style8"
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
                "key" => "field_59229bda31bb0",
                "label" => __( 'Wrap Container', 'ohio' ),
                "name" => "global_page_header_menu_use_wrapper",
                "type" => "true_false",
                "instructions" => __( 'Enable a wrap container, full-width layout is used when disabled.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_592fd8902e284",
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
                "key" => "field_591ac5s9d31f4576",
                "label" => __( 'Wrap Container Width', 'ohio' ),
                "name" => "global_page_header_content_wrapper_width",
                "type" => "text",
                "instructions" => __( 'Set the width of the header wrap container.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_592fd8902e284",
                            "operator" => "==",
                            "value" => "1"
                        ],
                        [
                            "field" => "field_59229bda31bb0",
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
                "key" => "field_591b10dbb4a85_f5er4y",
                "label" => __( 'Side Gaps', 'ohio' ),
                "name" => "global_page_header_full_width_margins_size",
                "type" => "text",
                "instructions" => __( 'Set the size of the side gaps for a full-width header layout.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [   
                        [
                            "field" => "field_592fd8902e284",
                            "operator" => "==",
                            "value" => "1"
                        ],
                        [
                            "field" => "field_59229bda31bb0",
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
                "key" => "field_59229bda31f95",
                "label" => __( 'Blank Spacer', 'ohio' ),
                "name" => "global_page_header_add_cap",
                "type" => "true_false",
                "instructions" => __( 'Enable to add a blank spacer under fixed or sticky headers.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_592fd8902e284",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => 1,
                "layout" => "horizontal",
                "return_format" => "value",
                "ui" => 1,
                "ui_on_text" => __( 'Yes', 'ohio' ),
                "ui_off_text" => __( 'No', 'ohio' )
            ],
            [
                "key" => "field_59229b3463432a",
                "label" => __( 'Fixed Position', 'ohio' ),
                "name" => "global_page_header_fixed_position",
                "type" => "true_false",
                "instructions" => __( 'Fix the header position at the top when scrolling up or down a page.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_592fd8902e284",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => 0,
                "layout" => "horizontal",
                "return_format" => "value",
                "ui" => 1,
                "ui_on_text" => __( 'Yes', 'ohio' ),
                "ui_off_text" => __( 'No', 'ohio' )
            ],
            [
                "key" => "field_592d3cfcc0e1c",
                "label" => __( 'Height', 'ohio' ),
                "name" => "global_page_header_menu_height",
                "type" => "ohio_responsive_height",
                "instructions" => __( 'Set the header height.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_592fd8902e284",
                            "operator" => "==",
                            "value" => "1"
                        ],
                        [
                            "field" => "field_59229bda317ae",
                            "operator" => "!=",
                            "value" => "style6"
                        ],
                        [
                            "field" => "field_59229bda317ae",
                            "operator" => "!=",
                            "value" => "style7"
                        ]
                    ]
                ],
                "default_value" => ""
            ],
            [
                "key" => "field_591ac509d1208gbgclrlcfpagjstglgbl64",
                "label" => __( 'Background', 'ohio' ),
                "name" => "global_page_header_menu",
                "type" => "clone",
                "instructions" => __( 'Customize the header background.', 'ohio' ),
                "required" => false,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_592fd8902e284",
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
                "key" => "field_591b10dlb42893657",
                "label" => __( 'Corner Radius', 'ohio' ),
                "name" => "global_page_header_corner_radius",
                "type" => "text",
                "instructions" => __( 'Set the header corner radius value for the entire site.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [   
                        [
                            "field" => "field_592fd8902e284",
                            "operator" => "==",
                            "value" => "1"
                        ],
                        [
                            "field" => "field_59229bda317ae",
                            "operator" => "==",
                            "value" => "style8"
                        ]
                    ]
                ],
                "default_value" => "",
                "placeholder" => "12px by default",
                "prepend" => __( 'Use CSS units', 'ohio' ),
                "append" => "",
                "maxlength" => 200
            ],
            [
                "key" => "field_59229bda34745",
                "label" => __( 'Border', 'ohio' ),
                "name" => "global_page_header_menu_border_visibility",
                "type" => "true_false",
                "instructions" => __( 'Enable the header border on the entire site.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_592fd8902e284",
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
                "key" => "field_59229bda34f19",
                "label" => __( 'Border Style', 'ohio' ),
                "name" => "global_page_header_menu_border_type",
                "type" => "select",
                "instructions" => __( 'Choose the header border style.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bda34745",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "choices" => [
                    "solid" => __( 'Solid', 'ohio' ),
                    "dashed" => __( 'Dashed', 'ohio' ),
                    "dotted" => __( 'Dotted', 'ohio' ),
                    "double" => __( 'Double', 'ohio' )
                ],
                "default_value" => [
                    "solid"
                ],
                "allow_null" => 0,
                "multiple" => 0,
                "ui" => 0,
                "ajax" => 0,
                "return_format" => "value",
                "placeholder" => ""
            ],
            [
                "key" => "field_59229bda34b30",
                "label" => __( 'Border Color', 'ohio' ),
                "name" => "global_page_header_menu_border_color",
                "type" => "ohio_color",
                "instructions" => __( 'Set the header border color.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bda34745",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "default_value" => ""
            ],
            [
                "key" => "field_5932305978335",
                "label" => '<h4>' . __( 'Styles', 'ohio' ) . '</h4>',
                "name" => "",
                "conditional_logic" => [
                    [   
                        [
                            "field" => "field_592fd8902e284",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "type" => "message"
            ],
            [
                "key" => "field_59229bda33f44",
                "label" => __( 'Header Typography', 'ohio' ),
                "name" => "global_page_header_menu_text_typo",
                "type" => "ohio_typo",
                "instructions" => __( 'Set the typography and color of elements in the header area.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [   
                        [
                            "field" => "field_592fd8902e284",
                            "operator" => "==",
                            "value" => "1"
                        ],
                        [
                            "field" => "field_59229bda3374d",
                            "operator" => "!=",
                            "value" => "hamburger"
                        ]
                    ]
                ]
            ],
            [
                "key" => "field_59224bda313bf",
                "label" => __( 'Sticky Header', 'ohio' ),
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
                "key" => "field_59229bda3432a",
                "label" => __( 'Sticky Header', 'ohio' ),
                "name" => "global_page_header_sticky",
                "type" => "true_false",
                "instructions" => __( 'Enable sticky header.', 'ohio' ) . '<br><em> ' . __( 'Sticky header won\'t work with fixed header position enabled.', 'ohio' ) . '</em>',
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 1,
                "ui" => 1,
                "ui_on_text" => __( 'Yes', 'ohio' ),
                "ui_off_text" => __( 'No', 'ohio' )
            ],
            [
                "key" => "field_593743a434383415",
                "label" => __( 'Sticky Header (Mobile)', 'ohio' ),
                "name" => "global_page_header_mobile_sticky",
                "type" => "true_false",
                "instructions" => __( 'Enable sticky header on mobile devices.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bda3432a",
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
                "key" => "field_59374453f84415",
                "label" => __( 'Initial Offset', 'ohio' ),
                "name" => "global_page_header_sticky_initial_offset",
                "type" => "number",
                "instructions" => __( 'Set the page scroll value when the sticky header appears.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bda3432a",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "default_value" => "150",
                "placeholder" => "",
                "prepend" => "",
                "append" => "px",
                "min" => 1,
                "max" => 100000,
                "step" => ""
            ],
            [
                "key" => "field_5937433334383415",
                "label" => __( 'Height', 'ohio' ),
                "name" => "global_page_header_sticky_height",
                "type" => "ohio_responsive_height",
                "instructions" => __( 'Set the sticky header height.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bda3432a",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ]
            ],
            [
                "key" => "field_591ac509d14578agj5bl64",
                "label" => __( 'Background', 'ohio' ),
                "name" => "global_page_header_fixed",
                "type" => "clone",
                "instructions" => __( 'Customize the sticky header background.', 'ohio' ),
                "required" => false,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bda3432a",
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
                "key" => "field_59229bda34745984hgfs",
                "label" => __( 'Border', 'ohio' ),
                "name" => "global_page_header_sticky_menu_border_visibility",
                "type" => "true_false",
                "instructions" => __( 'Enable the sticky header border on the entire site.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bda3432a",
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
                "key" => "field_59229bda34f1945ge",
                "label" => __( 'Border Style', 'ohio' ),
                "name" => "global_page_header_sticky_menu_border_type",
                "type" => "select",
                "instructions" => __( 'Choose the sticky header border style.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bda34745984hgfs",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "choices" => [
                    "solid" => __( 'Solid', 'ohio' ),
                    "dashed" => __( 'Dashed', 'ohio' ),
                    "dotted" => __( 'Dotted', 'ohio' ),
                    "double" => __( 'Double', 'ohio' )
                ],
                "default_value" => [
                    "solid"
                ],
                "allow_null" => 0,
                "multiple" => 0,
                "ui" => 0,
                "ajax" => 0,
                "return_format" => "value",
                "placeholder" => ""
            ],
            [
                "key" => "field_59229bda34b30er7yu5",
                "label" => __( 'Border Color', 'ohio' ),
                "name" => "global_page_header_sticky_menu_border_color",
                "type" => "ohio_color",
                "instructions" => __( 'Set the sticky header border color.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bda3432a",
                            "operator" => "==",
                            "value" => "1"
                        ],
                        [
                            "field" => "field_59229bda34745984hgfs",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "default_value" => ""
            ],
            [
                "key" => "field_593s23s15af5g9t",
                "label" => '<h4>' . __( 'Styles', 'ohio' ) . '</h4>',
                "name" => "",
                "type" => "message",
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bda3432a",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
            ],
            [
                "key" => "field_59229bda33f448347i7a6",
                "label" => __( 'Sticky Header Typography', 'ohio' ),
                "name" => "global_page_header_sticky_text_typo",
                "type" => "ohio_typo",
                "instructions" => __( 'Set the typography and color for the sticky header\'s elements.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bda3432a",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ]
            ],
            [
                "key" => "field_59224kj23i235",
                "label" => __( 'Mobile Header', 'ohio' ),
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
                "key" => "field_5937445364415",
                "label" => __( 'Search Icon', 'ohio' ),
                "name" => "global_page_mobile_search_visibility",
                "type" => "true_false",
                "instructions" => __( 'Display the search icon in the mobile header area. <br><em>Go to Theme Settings > General > <a target="_blank" href="./admin.php?page=ohio_hub_settings&options_page=theme-general">Search</a> to enable the search.</em>', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 0,
                "ui" => 1,
                "ui_on_text" => __( 'Yes', 'ohio' ),
                "ui_off_text" => __( 'No', 'ohio' )
            ],
            [
                "key" => "field_593230230587",
                "label" => '<h4>' . __( 'Styles', 'ohio' ) . '</h4>',
                "name" => "",
                "conditional_logic" => 0,
                "type" => "message"
            ],
            [
                "key" => "field_59267bda33b33234fd4",
                "label" => __( 'Mobile Header Typography', 'ohio' ),
                "name" => "global_page_mobile_header_menu_color",
                "type" => "ohio_typo",
                "instructions" => __( 'Set the typography and color for the mobile header\'s elements.', 'ohio' ),
                "required" => 0,
                "default_value" => ""
            ],
            [
                "key" => "field_59229bda35325",
                "label" => __( 'Subheader', 'ohio' ),
                "name" => "",
                "type" => "tab",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "placement" => "top",
                "endpoint" => 0
            ],
            [
                "key" => "field_59229bda35701",
                "label" => __( 'Subheader', 'ohio' ),
                "name" => "global_page_subheader_visibility",
                "type" => "true_false",
                "instructions" => __( 'Show the subheader on the entire site.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 1,
                "ui" => 1,
                "ui_on_text" => __( 'Yes', 'ohio' ),
                "ui_off_text" => __( 'No', 'ohio' )
            ],
            [
                "key" => "field_59229bda366f4",
                "label" => __( 'Content (Left Part)', 'ohio' ),
                "name" => "global_page_subheader_items_left",
                "type" => "repeater",
                "instructions" => __( 'Add some content to the subheader area.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bda35701",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "collapsed" => "",
                "min" => 0,
                "max" => 20,
                "layout" => "table",
                "button_label" => __( '+ Add Item', 'ohio' ),
                "sub_fields" => [
                    [
                        "key" => "field_59229bda6c954",
                        "label" => __( 'Items', 'ohio' ),
                        "name" => "items",
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
                        "prepend" => __( 'HTML allowed', 'ohio' ),
                        "maxlength" => 2000
                    ],
                    [
                        "key" => "field_59229bd2837456",
                        "label" => __( 'Show on Mobile', 'ohio' ),
                        "name" => "items_mobile_visibility",
                        "type" => "true_false",
                        "instructions" => "",
                        "required" => 0,
                        "conditional_logic" => 0,
                        "message" => "",
                        "default_value" => 1,
                        "ui" => 1,
                        "ui_on_text" => __( 'Yes', 'ohio' ),
                        "ui_off_text" => __( 'No', 'ohio' )
                    ]
                ]
            ],
            [
                "key" => "field_59229bda366f5",
                "label" => __( 'Content (Left Right)', 'ohio' ),
                "name" => "global_page_subheader_items_right",
                "type" => "repeater",
                "instructions" => __( 'Add some content to the subheader area.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bda35701",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "collapsed" => "",
                "min" => 0,
                "max" => 20,
                "layout" => "table",
                "button_label" => __( '+ Add Item', 'ohio' ),
                "sub_fields" => [
                    [
                        "key" => "field_59229bda6c955",
                        "label" => __( 'Items', 'ohio' ),
                        "name" => "items",
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
                        "prepend" => __( 'HTML allowed', 'ohio' ),
                        "maxlength" => 2000
                    ],
                    [
                        "key" => "field_59229bd2837457",
                        "label" => __( 'Show on Mobile', 'ohio' ),
                        "name" => "items_mobile_visibility",
                        "type" => "true_false",
                        "instructions" => "",
                        "required" => 0,
                        "conditional_logic" => 0,
                        "message" => "",
                        "default_value" => 1,
                        "ui" => 1,
                        "ui_on_text" => __( 'Yes', 'ohio' ),
                        "ui_off_text" => __( 'No', 'ohio' )
                    ]
                ]
            ],
            [
                "key" => "field_592d3dfbff372",
                "label" => __( 'Height', 'ohio' ),
                "name" => "global_page_subheader_height",
                "type" => "ohio_responsive_height",
                "instructions" => __( 'Set the subheader height.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bda35701",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "default_value" => ""
            ],
            [
                "key" => "field_59229bda36adbsubheadasstglgbl64backglb",
                "label" => __( 'Background', 'ohio' ),
                "name" => "global_page_subheader",
                "type" => "clone",
                "instructions" => __( 'Customize the subheader background.', 'ohio' ),
                "required" => false,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bda35701",
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
                "key" => "field_59229bdasqw512g",
                "label" => __( 'Currency Switcher', 'ohio' ),
                "name" => "global_woocommerce_header_currency_switcher",
                "type" => "true_false",
                "instructions" => __( 'Display FOX (former WOOCS) currency switcher in the subheader area.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bda35701",
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
                "key" => "field_593be8a6dfsa4w",
                "label" => __( 'Language Switcher', 'ohio' ),
                "name" => "global_woocommerce_header_lanhuage_switcher",
                "type" => "true_false",
                "instructions" => __( 'Display WPML language switcher in the subheader area.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bda35701",
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
                "key" => "field_593s35s15af5g9t",
                "label" => '<h4>' . __( 'Styles', 'ohio' ) . '</h4>',
                "name" => "",
                "type" => "message",
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bda35701",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ]
            ],
            [
                "key" => "field_59229bda36ed1",
                "label" => __( 'Content Typography', 'ohio' ),
                "name" => "global_page_subheader_text_typo",
                "type" => "ohio_typo",
                "instructions" => __( 'Set the typography and color for subheader area text.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bda35701",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ]
            ],
            [
                "key" => "field_59229215435326",
                "label" => __( 'CTA Buttons', 'ohio' ),
                "name" => "",
                "type" => "tab",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "placement" => "top",
                "endpoint" => 0
            ],
            [
                "key" => "field_592fe13500c39",
                "label" => __( 'CTA Buttons', 'ohio' ),
                "name" => "global_custom_button_for_header",
                "type" => "true_false",
                "instructions" => __( 'Display custom CTA buttons in the header area.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 0,
                "ui" => 1,
                "ui_on_text" => __( 'Yes', 'ohio' ),
                "ui_off_text" => __( 'No', 'ohio' )
            ],
            [
                "key" => "field_592f9kj12414",
                "label" => __( 'Primary Button', 'ohio' ),
                "name" => "global_custom_button_for_header_link",
                "type" => "link",
                "instructions" => __( 'Set up a primary button to be displayed in the header area.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_592fe13500c39",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "message" => "",
                "ui" => 1,
                "ui_on_text" => __( 'Yes', 'ohio' ),
                "ui_off_text" => __( 'No', 'ohio' )
            ],
            [
                "key" => "field_59229230597823",
                "label" => __( 'Extra Button', 'ohio' ),
                "name" => "global_custom_button_extra",
                "type" => "repeater",
                "instructions" => __( 'Set up extra buttons to be displayed in the header area.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_592fe13500c39",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "collapsed" => "",
                "min" => 0,
                "max" => 5,
                "layout" => "table",
                "button_label" => __( '+ Add Button', 'ohio' ),
                "sub_fields" => [
                    [
                        "key" => "field_592fe1ar3500c30",
                        "label" => __( 'Attributes', 'ohio' ),
                        "name" => "button_extra_link",
                        "type" => "link",
                        "required" => 0,
                        "conditional_logic" => 0,
                        "message" => "",
                        "ui" => 1,
                        "ui_on_text" => __( 'Yes', 'ohio' ),
                        "ui_off_text" => __( 'No', 'ohio' )
                    ],
                    [
                        "key" => "field_592fe1ar3500c32",
                        "label" => __( 'Type', 'ohio' ),
                        "name" => "button_extra_type",
                        "type" => "select",
                        "required" => 0,
                        "conditional_logic" => 0,
                        "choices" => [
                            "default" => __( 'Default', 'ohio' ),
                            "outlined" => __( 'Outlined', 'ohio' ),
                            "flat" => __( 'Flat', 'ohio' ),
                            "text" => __( 'Text', 'ohio' ),
                        ],
                        "default_value" => [
                            "default"
                        ],
                        "allow_null" => 0,
                        "multiple" => 0,
                        "ui" => 0,
                        "ajax" => 0,
                        "return_format" => "value",
                    ],
                    [
                        "key" => "field_592fe1ar3500c35",
                        "label" => __( 'Show on Mobile?', 'ohio' ),
                        "name" => "button_mobile_visibility",
                        "type" => "true_false",
                        "required" => 0,
                        "conditional_logic" => 0,
                        "message" => "",
                        "default_value" => 1,
                        "ui" => 1,
                        "ui_on_text" => __( 'Yes', 'ohio' ),
                        "ui_off_text" => __( 'No', 'ohio' )
                    ],
                ]
            ],
            [
                "key" => "field_59229230597456",
                "label" => __( 'Size', 'ohio' ),
                "name" => "global_custom_button_size",
                "type" => "select",
                "instructions" => __( 'Choose the size of CTA buttons in the header area.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_592fe13500c39",
                            "operator" => "==",
                            "value" => "1"
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
                "multiple" => 0,
                "ui" => 0,
                "ajax" => 0,
                "return_format" => "value",
                "placeholder" => ""
            ],
            [
                "key" => "field_5937sc63g152s346bth",
                "label" => '<h4>' . __( 'Styles', 'ohio' ) . '</h4>',
                "name" => "",
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_592fe13500c39",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "type" => "message"
            ],
            [
                "key" => "field_592fe13500c399",
                "label" => __( 'Button Text Color', 'ohio' ),
                "name" => "global_custom_button_for_header_color",
                "type" => "ohio_color",
                "instructions" => __( 'Set the button text color.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_592fe13500c39",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "message" => "",
                "default_value" => ""
            ],
            [
                "key" => "field_592fe13500c397",
                "label" => __( 'Button Fill Color', 'ohio' ),
                "name" => "global_custom_button_for_header_background",
                "type" => "ohio_color",
                "instructions" => __( 'Set the button shape fill color.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_592fe13500c39",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "message" => "",
                "default_value" => ""
            ],
            [
                "key" => "field_59229bda35326",
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
                "key" => "field_5937l235j3525",
                "label" => '<h4>' . __( 'Dynamic Colors', 'ohio' ) . '</h4>',
                "name" => "",
                "type" => "message"
            ],
            [
                "key" => "field_5932353461115237958h",
                "label" => __( 'Dynamic Colors', 'ohio' ),
                "name" => "global_page_header_dynamic_typography_color",
                "type" => "true_false",
                "instructions" => __( 'Enable changing the header elements\' color for light/dark sections.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 0,
                "ui" => 1,
                "ui_on_text" => "",
                "ui_off_text" => ""
            ]
        ],
        "location" => [
            [
                [
                    "param" => "options_page",
                    "operator" => "==",
                    "value" => "theme-general-header"
                ]
            ]
        ],
        "menu_order" => 1,
        "position" => "normal",
        "style" => "default",
        "label_placement" => "left",
        "instruction_placement" => "label",
        "hide_on_screen" => "",
        "active" => 1,
        "description" => ""
    ] );

endif;
