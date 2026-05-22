<?php if ( function_exists( 'acf_add_local_field_group' ) ) :

    acf_add_local_field_group( [
        "key" => "group_592fd88fb4838",
        "title" => __( 'Footer Settings', 'ohio' ),
        "private" => true,
        "fields" => [
            [
                "key" => "field_592fdb59946d8",
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
                "key" => "field_5937e0a52b488cexmod59",
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
                "key" => "field_592fd8901e284",
                "label" => __( 'Footer', 'ohio' ),
                "name" => "global_page_footer_visibility",
                "type" => "true_false",
                "instructions" => __( 'Show the footer on the entire site.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 1,
                "ui" => 1,
                "ui_on_text" => __( 'Yes', 'ohio' ),
                "ui_off_text" => __( 'No', 'ohio' )
            ],
            [
                "key" => "field_592fd8901ea9a",
                "label" => __( 'Wrap Container', 'ohio' ),
                "name" => "global_page_footer_is_wrapped",
                "type" => "true_false",
                "instructions" => __( 'Enable a wrap container, full-width layout is used when disabled.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_592fd8901e284",
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
                "key" => "field_591ac5s9d31fqawsfvawg",
                "label" => __( 'Wrap Container Width', 'ohio' ),
                "name" => "global_page_footer_content_wrapper_width",
                "type" => "text",
                "instructions" => __( 'Set the width of the footer wrap container.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_592fd8901ea9a",
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
                "key" => "field_591b10dbb4a85_fasgfaq3qa",
                "label" => __( 'Side Gaps', 'ohio' ),
                "name" => "global_page_footer_full_width_margins_size",
                "type" => "text",
                "instructions" => __( 'Set the size of the side gaps for a full-width footer layout.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_592fd8901e284",
                            "operator" => "==",
                            "value" => "1"
                        ],
                        [
                            "field" => "field_592fd8901ea9a",
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
                "key" => "field_593916111579e",
                "label" => __( 'Sticky Footer', 'ohio' ),
                "name" => "global_page_footer_is_sticky",
                "type" => "true_false",
                "instructions" => __( 'Set the footer to be stuck to the bottom of the page.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_592fd8901e284",
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
                "key" => "field_592fd8901ca70grp",
                "label" => __( 'Background', 'ohio' ),
                "name" => "global_page_footer",
                "type" => "clone",
                "instructions" => __( 'Customize the footer background.', 'ohio' ),
                "required" => false,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_592fd8901e284",
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
                "key" => "field_592fd8901293857",
                "label" => __( 'Corner Radius', 'ohio' ),
                "name" => "global_page_footer_corners",
                "type" => "text",
                "instructions" => __( 'Set the corner radius value for the footer container.', 'ohio' ),
                "conditional_logic" => 0,
                "prepend" => __( 'Use CSS units', 'ohio' ),
                "placeholder" => "0px by default",
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_591293856238956",
                "label" => __( 'Background Text', 'ohio' ),
                "name" => "global_page_footer_background_text",
                "type" => "text",
                "instructions" => __( 'Add the footer decoration text.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_592fd8901e284",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "default_value" => "",
                "placeholder" => "",
                "prepend" => __( 'HTML allowed', 'ohio' ),
                "append" => "",
                "maxlength" => 200
            ],
            [
                "key" => "field_591293856238957",
                "label" => __( 'Background Text Alignment', 'ohio' ),
                "name" => "global_page_footer_background_text_align",
                "type" => "button_group",
                "instructions" => __( 'Choose the alignment for footer decoration text.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_592fd8901e284",
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
                "key" => "field_592s31s15af5g9t",
                "label" => '<h4>' . __( 'Styles', 'ohio' ) . '</h4>',
                "name" => "",
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_592fd8901e284",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "type" => "message"
            ],
            [
                "key" => "field_591293856238958",
                "label" => __( 'Background Text Typography', 'ohio' ),
                "name" => "global_page_footer_background_text_typo",
                "type" => "ohio_typo",
                "instructions" => __( 'Set the typography and color for footer decoration text.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_592fd8901e284",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
            ],
            [
                "key" => "field_5940e34gvedrgiqw",
                "label" => __( 'Widget Titles Typography', 'ohio' ),
                "name" => "global_page_footer_widget_title_typo",
                "type" => "ohio_typo",
                "instructions" => __( 'Set the typography and color for footer widgets\' titles.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_592fd8901e284",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
            ],
            [
                "key" => "field_5940ebca457f2",
                "label" => __( 'Widget Content Typography', 'ohio' ),
                "name" => "global_page_footer_text_typo",
                "type" => "ohio_typo",
                "instructions" => __( 'Set the typography and color for footer widgets\' content.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_592fd8901e284",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
            ],
            [
                "key" => "field_5940ebca457f3",
                "label" => __( 'Widget Links Typography', 'ohio' ),
                "name" => "global_page_footer_links_typo",
                "type" => "ohio_typo",
                "instructions" => __( 'Set the typography and color for footer widgets\' links.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_592fd8901e284",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
            ],
            [
                "key" => "field_592fdb63946d9",
                "label" => __( 'Copyright Area', 'ohio' ),
                "name" => "",
                "type" => "tab",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "placement" => "top",
                "endpoint" => 0
            ],
            [
                "key" => "field_592fd8901ee80",
                "label" => __( 'Copyright Area', 'ohio' ),
                "name" => "global_page_footer_copyright_visibility",
                "type" => "true_false",
                "instructions" => __( 'Show the footer copyright area on the entire site.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 1,
                "ui" => 1,
                "ui_on_text" => __( 'Yes', 'ohio' ),
                "ui_off_text" => __( 'No', 'ohio' )
            ],
            [
                "key" => "field_592fd8901d6a1",
                "label" => __( 'Content Position', 'ohio' ),
                "name" => "global_footer_copyright_alignment",
                "type" => "button_group",
                "instructions" => __( 'Choose copyright content position', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_592fd8901ee80",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "choices" => [
                    "center" => __( '<i class="bi bi-align-center"></i> Center', 'ohio' ),
                    "left_and_right" => __( '<i class="bi bi-distribute-horizontal"></i> Space Between', 'ohio' )
                ],
                "default_value" => [
                    "left_and_right"
                ],
                "allow_null" => 0,
                "multiple" => 0,
                "ui" => 0,
                "ajax" => 0,
                "return_format" => "value",
                "placeholder" => ""
            ],
            [
                "key" => "field_592fd8901f24bae3",
                "label" => __( 'Content', 'ohio' ),
                "name" => "global_footer_copyright_center",
                "type" => "text",
                "instructions" => __( 'Add some content to the copyright area.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [   
                        [
                            "field" => "field_592fd8901ee80",
                            "operator" => "==",
                            "value" => "1"
                        ],
                        [
                            "field" => "field_592fd8901d6a1",
                            "operator" => "==",
                            "value" => "center"
                        ]
                    ]
                ],


                "default_value" => __( '© 2016-[ohio_current_year] <a href="http://clbthemes.com" target="_blank">Colabrio</a>. All rights reserved | <a target="_blank" href="https://1.envato.market/5Q25j"><b>Purchase</b></a>', 'ohio' ),
                "placeholder" => "",
                "prepend" => __( 'HTML allowed', 'ohio' ),
                "append" => "",
                "maxlength" => ""
            ],
            [
                "key" => "field_592fd8901f24baes",
                "label" => __( 'Content (Left Part)', 'ohio' ),
                "name" => "global_footer_copyright_left",
                "type" => "text",
                "instructions" => __( 'Add some content to the copyright area.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_592fd8901d6a1",
                            "operator" => "==",
                            "value" => "left_and_right"
                        ]
                    ]
                ],
                "default_value" => __( '© 2016-[ohio_current_year] <a href="http://clbthemes.com" target="_blank">Colabrio</a>. All rights reserved | <a target="_blank" href="https://1.envato.market/5Q25j"><b>Purchase</b></a>', 'ohio' ),
                "placeholder" => "",
                "prepend" => __( 'HTML allowed', 'ohio' ),
                "append" => "",
                "maxlength" => ""
            ],
            [
                "key" => "field_592fd8901f24bfee",
                "label" => __( 'Content (Right Part)', 'ohio' ),
                "name" => "global_footer_copyright_right",
                "type" => "text",
                "instructions" => __( 'Add some content to the copyright area.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_592fd8901d6a1",
                            "operator" => "==",
                            "value" => "left_and_right"
                        ]
                    ]
                ],
                "default_value" => __( '<a href="http://clbthemes.com" target="_blank">Security</a> | <a href="http://clbthemes.com" target="_blank">Privacy & Cookie Policy</a> | <a href="http://clbthemes.com" target="_blank">Terms of Service</a>', 'ohio' ),
                "placeholder" => "",
                "prepend" => __( 'HTML allowed', 'ohio' ),
                "append" => "",
                "maxlength" => ""
            ],
            [
                "key" => "field_592fd8901f63agrp",
                "label" => __( 'Background', 'ohio' ),
                "name" => "global_page_footer_copyright_section",
                "type" => "clone",
                "instructions" => __( 'Customize the copyright area background.', 'ohio' ),
                "required" => false,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_592fd8901ee80",
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
                "key" => "field_592s37s15af5g9t",
                "label" => '<h4>' . __( 'Styles', 'ohio' ) . '</h4>',
                "name" => "",
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_592fd8901ee80",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "type" => "message"
            ],
            [
                "key" => "field_592fd8901fa31",
                "label" => __( 'Content Typography', 'ohio' ),
                "name" => "global_page_footer_copyright_section_text_typo",
                "type" => "ohio_typo",
                "instructions" => __( 'Set the typography and color for copyright area text.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_592fd8901ee80",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "default_value" => ""
            ],
            [
                "key" => "field_592fd8901fa32",
                "label" => __( 'Links Typography', 'ohio' ),
                "name" => "global_page_footer_copyright_section_links_typo",
                "type" => "ohio_typo",
                "instructions" => __( 'Set the typography and color for copyright area links.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_592fd8901ee80",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "default_value" => ""
            ],
            [
                "key" => "field_592fdb17946d7",
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
                "key" => "field_59lfdb179s6d7",
                "label" => '<h4>' . __( 'Dynamic Colors', 'ohio' ) . '</h4>',
                "name" => "",
                "type" => "message"
            ],
            [
                "key" => "field_593235346111579e",
                "label" => __( 'Dark Section Mode', 'ohio' ),
                "name" => "global_page_footer_fixed_typography_color",
                "type" => "true_false",
                "instructions" => __( 'Enable the dark section mode for the dynamically changing colors.', 'ohio' ) . '<br><em> ' . __( '(clb__dark_section class will be added to the footer area.)', 'ohio' ) . '</em>',
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 0,
                "ui" => 1,
                "ui_on_text" => "",
                "ui_off_text" => ""
            ],
            [
                "key" => "field_5937a7a521f8sebmod23",
                "label" => '<h4>' . __( 'Logo Widget', 'ohio' ) . '</h4>',
                "name" => "",
                "type" => "message"
            ],
            [
                "key" => "field_592fd8901ba9e",
                "label" => __( 'Footer Logo', 'ohio' ),
                "name" => "global_page_footer_logo_widget_type",
                "type" => "select",
                "instructions" => __( 'Choose a footer logo variant to be displayed on the entire site.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "choices" => [
                    "dark_variant" => __( 'Primary Logo', 'ohio' ),
                    "light_variant" => __( 'Inverse Logo', 'ohio' ),
                    "sitename" => __( 'Text Logo', 'ohio' ),
                    "custom" => __( 'Custom Image', 'ohio' )
                ],
                "default_value" => [
                    "dark_variant"
                ],
                "allow_null" => 0,
                "multiple" => 0,
                "ui" => 0,
                "ajax" => 0,
                "return_format" => "value",
                "placeholder" => ""
            ],
            [
                "key" => "field_592fd8901beb6",
                "label" => __( 'Text Logo', 'ohio' ),
                "name" => "global_page_footer_sitename_typo",
                "type" => "ohio_typo",
                "instructions" => __( 'Enter the name of your site and it will be used as a footer text logo.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_592fd8901ba9e",
                            "operator" => "==",
                            "value" => "sitename"
                        ]
                    ]
                ],
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_592fd8901c689",
                "label" => __( 'Custom Footer Image', 'ohio' ),
                "name" => "global_page_footer_custom_logo",
                "type" => "image",
                "instructions" => __( 'Upload a custom footer logo for the entire site.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_592fd8901ba9e",
                            "operator" => "==",
                            "value" => "custom"
                        ]
                    ]
                ],
                "return_format" => "url",
                "preview_size" => "thumbnail",
                "library" => "all",
                "min_width" => 10,
                "min_height" => 10,
                "min_size" => "",
                "max_width" => 1600,
                "max_height" => 800,
                "max_size" => 5,
                "mime_types" => ""
            ],
            [
                "key" => "field_592d34760284834",
                "label" => __( 'Logo Height', 'ohio' ),
                "name" => "global_page_footer_logo_height",
                "type" => "ohio_responsive_height",
                "instructions" => __( 'Set a height for the footer logo.', 'ohio' ),
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
        ],
        "location" => [
            [
                [
                    "param" => "options_page",
                    "operator" => "==",
                    "value" => "theme-general-footer"
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
