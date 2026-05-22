<?php if ( function_exists( 'acf_add_local_field_group' ) ) :

    acf_add_local_field_group( [
        "key" => "group_592d60gf343c5",
        "title" => __( 'Appearance Settings', 'ohio' ),
        "private" => true,
        "fields" => [
            [
                "key" => "field_54224ad4313bf",
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
                "key" => "field_5937e0a52b48cexmod151",
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
                "key" => "field_591ac509cfa00",
                "label" => __( 'Primary Color', 'ohio' ),
                "name" => "global_page_brand_color",
                "type" => "ohio_color",
                "instructions" => __( 'Set the global accent color for your site.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "default_value" => ""
            ],
            [
                "key" => "field_5937e3a33f35exmod15",
                "label" => __( 'Primary Fill Color', 'ohio' ),
                "name" => "global_page_backgrounds_color",
                "type" => "ohio_color",
                "instructions" => __( 'Set the global color for primary background. (e.g. footer, comments area, product details).', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "default_value" => ""
            ],
            [
                "key" => "field_593723o805732",
                "label" => __( 'Badge Fill Color', 'ohio' ),
                "name" => "global_page_badge_fill_color",
                "type" => "ohio_color",
                "instructions" => __( 'Set global badge background color (e.g. badges, tags, labels, etc.).', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "default_value" => ""
            ],
            [
                "key" => "field_5937029385723l",
                "label" => __( 'Overlay Color', 'ohio' ),
                "name" => "global_page_overlay_color",
                "type" => "ohio_color",
                "instructions" => __( 'Set the global color for primary background. (e.g. hamburger menu, popups, etc.).', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "default_value" => ""
            ],
            [
                "key" => "field_591ac509cfa01",
                "label" => __( 'Highlight Color', 'ohio' ),
                "name" => "global_page_selection_color",
                "type" => "ohio_color",
                "instructions" => __( 'Set the selection color of the highlighted text.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "default_value" => ""
            ],
            [
                "key" => "field_5937e3a33b35exmod15",
                "label" => __( 'Lines & Dividers Color', 'ohio' ),
                "name" => "global_page_borders_color",
                "type" => "ohio_color",
                "instructions" => __( 'Set the global color for lines and dividers.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "default_value" => ""
            ],
            [
                "key" => "field_5937e3a43b38cexmod15",
                "label" => __( 'Links Color', 'ohio' ),
                "name" => "global_page_links_color",
                "type" => "ohio_color",
                "instructions" => __( 'Set the global links color for your site.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "default_value" => ""
            ],
            [
                "key" => "field_5937e3a43b38god15",
                "label" => __( 'Links Color (Hover)', 'ohio' ),
                "name" => "global_page_links_hover_color",
                "type" => "ohio_color",
                "instructions" => __( 'Set the global links color on hover for your site.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "default_value" => ""
            ],
            [
                "key" => "field_591ac509d3e5h",
                "label" => __( 'Links Underline', 'ohio' ),
                "name" => "global_page_links_underline",
                "type" => "true_false",
                "instructions" => __( 'Add the global links underline decoration on hover.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 1,
                "ui" => 1,
                "ui_on_text" => __( 'Yes', 'ohio' ),
                "ui_off_text" => __( 'No', 'ohio' )
            ],
            [
                "key" => "field_5937e3asf346254",
                "label" => __( 'Corner Radius', 'ohio' ),
                "name" => "global_page_container_corners",
                "type" => "text",
                "instructions" => __( 'Set the global corner radius value for boxed elements. (e.g. popups, banners, dropdown menus).', 'ohio' ),
                "conditional_logic" => 0,
                "prepend" => __( 'Use CSS units', 'ohio' ),
                "placeholder" => "8px by default",
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_5937e3293857",
                "label" => __( 'Grid Corner Radius', 'ohio' ),
                "name" => "global_page_grid_corners",
                "type" => "text",
                "instructions" => __( 'Set the global corner radius value for grid elements. (e.g. post, project and product grid).', 'ohio' ),
                "conditional_logic" => 0,
                "prepend" => __( 'Use CSS units', 'ohio' ),
                "placeholder" => "8px by default",
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_5937f3f34625sl1",
                "label" => __( 'Grid Gutters', 'ohio' ),
                "name" => "global_page_grid_gutter",
                "type" => "text",
                "instructions" => __( 'Set the gutter width value on each side of a grid column.', 'ohio' ),
                "conditional_logic" => 0,
                "prepend" => __( 'Use CSS units', 'ohio' ),
                "placeholder" => "16px by default",
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_54224ad4316bd",
                "label" => __( 'Color Scheme', 'ohio' ),
                "name" => "",
                "type" => "tab",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "placement" => "top",
                "endpoint" => 0
            ],
            [
                "key" => "field_591ac911d3se51",
                "label" => __( 'Color Scheme', 'ohio' ),
                "name" => "global_page_dark_mode",
                "type" => "radio",
                "instructions" => __( 'Select the color scheme for the entire site.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "choices" => [
                    "0" => __( 'Light', 'ohio'),
                    "1" => __( 'Dark', 'ohio' ),
                    "2" => __( 'Auto (System Colors)', 'ohio' ),
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "light",
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            // [
            //     "key" => "field_5937e0a52b488cczxm1ac911d3od60",
            //     "label" => "",
            //     "name" => "",
            //     "type" => "message",
            //     "instructions" => "",
            //     "required" => 0,
            //     "conditional_logic" => [
            //         [
            //             [
            //                 "field" => "field_591ac911d3se51",
            //                 "operator" => "==",
            //                 "value" => "auto"
            //             ]
            //         ]
            //     ],
            //     "message" => '<p class="message">' . '<i class="bi bi-question-circle"></i>' . __( 'Color scheme switcher options are available with Light/Dark schemes only. Use local Page Settings to override it for individual pages.', 'ohio' ) . '</p>',
            //     "new_lines" => "",
            //     "esc_html" => 0
            // ],
            [
                "key" => "field_591ac509d3se522",
                "label" => __( 'Switcher', 'ohio' ),
                "name" => "global_page_dark_mode_switcher",
                "type" => "true_false",
                "instructions" => __( 'Show the color scheme switcher on the entire site.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_591ac911d3se51",
                            "operator" => "!=",
                            "value" => "2"
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
                "key" => "field_591ac509d3se3463",
                "label" => __( 'Switcher (Mobile)', 'ohio' ),
                "name" => "global_page_dark_mode_switcher_mobile",
                "type" => "true_false",
                "instructions" => __( 'Show the color scheme switcher on mobile devices.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_591ac911d3se51",
                            "operator" => "!=",
                            "value" => "2"
                        ],
                        [
                            "field" => "field_591ac509d3se522",
                            "operator" => "==",
                            "value" => 1
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
                "key" => "field_591ac509d3fe522",
                "label" => __( 'Switcher Layout', 'ohio' ),
                "name" => "global_page_dark_mode_switcher_layout",
                "type" => "select",
                "instructions" => __( 'Choose the color scheme switcher layout for the entire site.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_591ac509d3se522",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "choices" => [
                    "default" => __( 'Default', 'ohio' ),
                    "simple" => __( 'Simple', 'ohio' )
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "default",
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_5937e1905d075d23",
                "label" => __( 'Switcher Position', 'ohio' ),
                "name" => "global_page_dark_mode_switcher_position",
                "type" => "button_group",
                "instructions" => __( 'Choose the color scheme switcher position for the entire site.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_591ac509d3se522",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "choices" => [
                    "left" => __( 'Left', 'ohio' ),
                    "bottom_left" => __( 'Bottom Left', 'ohio' ),
                    "bottom_right" => __( 'Bottom Right', 'ohio' ),
                    "right" => __( 'Right', 'ohio' )
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "left",
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_591ac509d3se52s",
                "label" => __( 'Save Color Mode', 'ohio' ),
                "name" => "global_page_dark_mode_save_state",
                "type" => "true_false",
                "instructions" => __( 'Save the color mode while toggling the switcher by setting cookies.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_591ac911d3se51",
                            "operator" => "!=",
                            "value" => "auto"
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
                "key" => "field_591ac509d3se5f",
                "label" => __( 'Background Color', 'ohio' ),
                "name" => "global_page_dark_mode_background_color",
                "type" => "ohio_color",
                "instructions" => __( 'Set the dark mode background color for the entire site.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "default_value" => ""
            ],
            [
                "key" => "field_591ac50923523",
                "label" => __( 'Text Color', 'ohio' ),
                "name" => "global_page_dark_mode_text_color",
                "type" => "ohio_color",
                "instructions" => __( 'Set the dark mode text color for the entire site.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "default_value" => ""
            ],
            [
                "key" => "field_54224ad431f82735",
                "label" => __( 'Buttons', 'ohio' ),
                "name" => "",
                "type" => "tab",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "placement" => "top",
                "endpoint" => 0
            ],
            [
                "key" => "field_5937e3aaf346sfas",
                "label" => __( 'Fill Color', 'ohio' ),
                "name" => "global_page_buttons_color",
                "type" => "ohio_color",
                "instructions" => __( 'Choose the global buttons color for your site.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "default_value" => ""
            ],
            [
                "key" => "field_5937e3aaf346253",
                "label" => __( 'Fill Color (Hover)', 'ohio' ),
                "name" => "global_page_buttons_hover_color",
                "type" => "ohio_color",
                "instructions" => __( 'Choose the global buttons color (hover state).', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "default_value" => ""
            ],
            [
                "key" => "field_5937e3aaf346254",
                "label" => __( 'Corner Radius', 'ohio' ),
                "name" => "global_page_buttons_corners",
                "type" => "text",
                "instructions" => __( 'Set the global corner radius value for all buttons.', 'ohio' ),
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bda32383",
                            "operator" => "==",
                            "value" => "sitename"
                        ]
                    ]
                ],
                "prepend" => __( 'Use CSS units', 'ohio' ),
                "placeholder" => "8px",
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_54224ad293587",
                "label" => __( 'Forms <span class="new-badge"></span>', 'ohio' ),
                "name" => "",
                "type" => "tab",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "placement" => "top",
                "endpoint" => 0
            ],
            [
                "key" => "field_54224ad2935871",
                "label" => __( 'Corner Radius', 'ohio' ),
                "name" => "global_page_forms_corners",
                "type" => "text",
                "instructions" => __( 'Set the global corner radius value for forms fields. (input, select, textarea).', 'ohio' ),
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bda32383",
                            "operator" => "==",
                            "value" => "sitename"
                        ]
                    ]
                ],
                "prepend" => __( 'Use CSS units', 'ohio' ),
                "placeholder" => "8px",
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_54224ld4316bl",
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
                "key" => "field_591ac509d3324",
                "label" => __( 'Icon Buttons Animation', 'ohio' ),
                "name" => "global_page_button_animation",
                "type" => "true_false",
                "instructions" => __( 'Add an on-click ripple transition effect for icon buttons.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 1,
                "ui" => 1,
                "ui_on_text" => __( 'Yes', 'ohio' ),
                "ui_off_text" => __( 'No', 'ohio' )
            ],
        ],
        "location" => [
            [
                [
                    "param" => "options_page",
                    "operator" => "==",
                    "value" => "theme-appearance"
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
