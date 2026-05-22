<?php if ( function_exists( 'acf_add_local_field_group' ) ) :

    acf_add_local_field_group( [
        "key" => "group_592d60l3254j34l",
        "title" => __( 'Single Project Settings', 'ohio' ),
        "private" => true,
        "fields" => [
            [
                "key" => "field_592d6023059823",
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
                "key" => "field_592fd6662265c",
                "label" => __( 'Layout', 'ohio' ),
                "name" => "global_project_layout_type",
                "type" => "image_option",
                "instructions" => __( 'Choose a single project layout for the entire site.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "image_option_value" => [
                    [
                        "name" => "type_1",
                        "description" => __( 'Simple Left Gallery', 'ohio' ),
                        "src" => "acf__image_27.svg"
                    ],
                    [
                        "name" => "type_2",
                        "description" => __( 'Simple Right Gallery', 'ohio' ),
                        "src" => "acf__image_26.svg"
                    ],
                    [
                        "name" => "type_7",
                        "description" => __( 'Simple Bottom Gallery', 'ohio' ),
                        "src" => "acf__image_32.svg"
                    ],
                    [
                        "name" => "type_3",
                        "description" => __( 'Split Screen Left Gallery', 'ohio' ),
                        "src" => "acf__image_29.svg"
                    ],
                    [
                        "name" => "type_4",
                        "description" => __( 'Split Screen Right Gallery', 'ohio' ),
                        "src" => "acf__image_28.svg"
                    ],
                    [
                        "name" => "type_5",
                        "description" => __( 'Slider: Simple', 'ohio' ),
                        "src" => "acf__image_30.svg"
                    ],
                    [
                        "name" => "type_6",
                        "description" => __( 'Slider: Fullscreen', 'ohio' ),
                        "src" => "acf__image_31.svg"
                    ],
                    [
                        "name" => "type_8",
                        "description" => __( 'Slider: Asymmetric', 'ohio' ),
                        "src" => "acf__image_33.svg"
                    ],
                    [
                        "name" => "type_9",
                        "description" => __( 'Slider: Creative', 'ohio' ),
                        "src" => "acf__image_44.svg"
                    ],
                    [
                        "name" => "type_10",
                        "description" => __( 'Slider: Compact', 'ohio' ),
                        "src" => "acf__image_54.svg"
                    ]
                ],
                "default_value" => "type_1"
            ],
            [
                "key" => "field_59fb4w13tfgdfse3",
                "label" => __( 'Gallery Scrolling Effect', 'ohio' ),
                "name" => "global_project_gallery_scrolling_effect",
                "type" => "select",
                "instructions" => __( 'Choose the main gallery scrolling effect between parallax and scale.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_592fd6662265c",
                            "operator" => "!=",
                            "value" => "type_1"
                        ],
                        [
                            "field" => "field_592fd6662265c",
                            "operator" => "!=",
                            "value" => "type_2"
                        ],
                        [
                            "field" => "field_592fd6662265c",
                            "operator" => "!=",
                            "value" => "type_3"
                        ],
                        [
                            "field" => "field_592fd6662265c",
                            "operator" => "!=",
                            "value" => "type_4"
                        ]
                    ]
                ],
                "choices" => [
                    "parallax" => __( 'Parallax', 'ohio' ),
                    "scale" => __( 'Scale', 'ohio' )
                ],
                "default_value" => [
                    "parallax"
                ],
                "allow_null" => 0,
                "multiple" => 0,
                "ui" => 0,
                "ajax" => 0,
                "return_format" => "value",
                "placeholder" => ""
            ],
            [
                "key" => "field_59fb434rgthjedsdcvwerf",
                "label" => __( 'Loop Mode', 'ohio' ),
                "name" => "global_project_loop_mode",
                "type" => "true_false",
                "instructions" => __( 'Enable a loop mode for the portfolio slider elements.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_592fd6662265c",
                            "operator" => "!=",
                            "value" => "type_1"
                        ],
                        [
                            "field" => "field_592fd6662265c",
                            "operator" => "!=",
                            "value" => "type_2"
                        ],
                        [
                            "field" => "field_592fd6662265c",
                            "operator" => "!=",
                            "value" => "type_3"
                        ],
                        [
                            "field" => "field_592fd6662265c",
                            "operator" => "!=",
                            "value" => "type_4"
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
                "key" => "field_egetrgwery534erg3w5hy3",
                "label" => __( 'Mouse-Wheel Scrolling', 'ohio' ),
                "name" => "global_project_mousewheel_mode",
                "type" => "true_false",
                "instructions" => __( 'Enable a mouse-wheel scrolling for portfolio sliders.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_592fd6662265c",
                            "operator" => "!=",
                            "value" => "type_1"
                        ],
                        [
                            "field" => "field_592fd6662265c",
                            "operator" => "!=",
                            "value" => "type_2"
                        ],
                        [
                            "field" => "field_592fd6662265c",
                            "operator" => "!=",
                            "value" => "type_3"
                        ],
                        [
                            "field" => "field_592fd6662265c",
                            "operator" => "!=",
                            "value" => "type_4"
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
                "key" => "field_594gerh45rfsecxg43",
                "label" => __( 'Autoplay Mode', 'ohio' ),
                "name" => "global_project_autoplay_mode",
                "type" => "true_false",
                "instructions" => __( 'Enable an autoplay mode for portfolio sliders.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_592fd6662265c",
                            "operator" => "!=",
                            "value" => "type_1"
                        ],
                        [
                            "field" => "field_592fd6662265c",
                            "operator" => "!=",
                            "value" => "type_2"
                        ],
                        [
                            "field" => "field_592fd6662265c",
                            "operator" => "!=",
                            "value" => "type_3"
                        ],
                        [
                            "field" => "field_592fd6662265c",
                            "operator" => "!=",
                            "value" => "type_4"
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
                "key" => "field_59erbvdfdhe5rhgergvsd5",
                "label" => __( 'Autoplay Interval Timeout', 'ohio' ),
                "name" => "global_project_autoplay_interval",
                "type" => "number",
                "instructions" => __( 'Set an interval timeout for the autoplay mode.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_594gerh45rfsecxg43",
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
                "key" => "field_5937a0a24fd35gh",
                "label" => '<h4>' . __( 'Styles and Display', 'ohio' ) . '</h4>',
                "name" => "",
                "conditional_logic" => 0,
                "type" => "message"
            ],
            [
                "key" => "field_59391f24598db5182jgls",
                "label" => __( 'Featured Image', 'ohio' ),
                "name" => "global_project_add_featured_on_page",
                "type" => "true_false",
                "instructions" => __( 'Show a featured image on the project page.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "default_value" => 1,
                "ui" => 1
            ],
            [
                "key" => "field_592fd62342342a31",
                "label" => __( 'Next/Prev Navigation', 'ohio' ),
                "name" => "global_project_show_navigation",
                "type" => "true_false",
                "instructions" => __( 'Show a sticky navigation bar with the next/previous project links.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 1,
                "ui" => 1,
                "ui_on_text" => "",
                "ui_off_text" => ""
            ],
            [
                "key" => "field_59234fgbds2g2f4w",
                "label" => __( 'Pagination', 'ohio' ),
                "name" => "global_project_bullets_visibility",
                "type" => "true_false",
                "instructions" => __( 'Show the pagination bar on portfolio sliders.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_592fd6662265c",
                            "operator" => "!=",
                            "value" => "type_1"
                        ],
                        [
                            "field" => "field_592fd6662265c",
                            "operator" => "!=",
                            "value" => "type_2"
                        ],
                        [
                            "field" => "field_592fd6662265c",
                            "operator" => "!=",
                            "value" => "type_3"
                        ],
                        [
                            "field" => "field_592fd6662265c",
                            "operator" => "!=",
                            "value" => "type_4"
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
                "key" => "field_59fb4w1rebth3wef4w",
                "label" => __( 'Pagination Type', 'ohio' ),
                "name" => "global_project_bullets_type",
                "type" => "select",
                "instructions" => __( 'Select slider pagination type.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59234fgbds2g2f4w",
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
                "key" => "field_2390587230587325",
                "label" => __( 'Pagination Color', 'ohio' ),
                "name" => "global_project_bullets_color",
                "type" => "ohio_color",
                "instructions" => __( 'Set the pagination color for portfolio sliders.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59234fgbds2g2f4w",
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
                "key" => "field_59fb4w13tfgdfse2",
                "label" => __( 'Navigation', 'ohio' ),
                "name" => "global_project_nav_visibility",
                "type" => "true_false",
                "instructions" => __( 'Show navigation buttons on portfolio sliders.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_592fd6662265c",
                            "operator" => "!=",
                            "value" => "type_1"
                        ],
                        [
                            "field" => "field_592fd6662265c",
                            "operator" => "!=",
                            "value" => "type_2"
                        ],
                        [
                            "field" => "field_592fd6662265c",
                            "operator" => "!=",
                            "value" => "type_3"
                        ],
                        [
                            "field" => "field_592fd6662265c",
                            "operator" => "!=",
                            "value" => "type_4"
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
                "key" => "field_34534523958723",
                "label" => __( 'Navigation Color', 'ohio' ),
                "name" => "global_project_nav_color",
                "type" => "ohio_color",
                "instructions" => __( 'Set the navigation color for portfolio sliders.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59fb4w13tfgdfse2",
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
                "key" => "field_egetrgwery5kop3kfk",
                "label" => __( 'Overlay Color', 'ohio' ),
                "name" => "global_project_color_overlay",
                "type" => "ohio_color",
                "instructions" => __( 'Set the portfolio grid/slides overlay background color.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_592fd6662265c",
                            "operator" => "!=",
                            "value" => "type_1"
                        ],
                        [
                            "field" => "field_592fd6662265c",
                            "operator" => "!=",
                            "value" => "type_2"
                        ],
                        [
                            "field" => "field_592fd6662265c",
                            "operator" => "!=",
                            "value" => "type_3"
                        ],
                        [
                            "field" => "field_592fd6662265c",
                            "operator" => "!=",
                            "value" => "type_4"
                        ]
                    ]
                ],
                "message" => "",
                "ui" => 1,
                "ui_on_text" => "",
                "ui_off_text" => ""
            ],
            [
                "key" => "field_59fb4312b343615asdasfga",
                "label" => __( 'Video Button Style', 'ohio' ),
                "name" => "global_project_video_button_style",
                "type" => "select",
                "instructions" => __( 'Choose a video button style.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
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
                "key" => "field_59fb43fgjfj23563q",
                "label" => __( 'Video Button Size', 'ohio' ),
                "name" => "global_project_video_button_size",
                "type" => "select",
                "instructions" => __( 'Choose a video button size.', 'ohio' ),
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
                "other_choice" => 0,
                "save_other_choice" => 0,
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_egetrgwery5kop3kfk13asfah",
                "label" => __( 'Video Button Color', 'ohio' ),
                "name" => "global_project_grid_video_btn_bg",
                "type" => "ohio_color",
                "instructions" => __( 'Set a video button color.', 'ohio' ),
                "required" => 0,
                "message" => "",
                "ui" => 1,
                "ui_on_text" => "",
                "ui_off_text" => ""
            ],
            [
                "key" => "field_592fd602l3059823",
                "label" => __( 'Sharing', 'ohio' ),
                "name" => "",
                "type" => "tab",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "placement" => "top",
                "endpoint" => 0
            ],
            [
                "key" => "field_592fd666231f2",
                "label" => __( 'Sharing', 'ohio' ),
                "name" => "global_project_sharing_buttons_visibility",
                "type" => "true_false",
                "instructions" => __( 'Enable sharing feature for single projects.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "ui" => 1,
                "ui_on_text" => __( 'Yes', 'ohio' ),
                "ui_off_text" => __( 'No', 'ohio' ),
                "message" => "",
                "default_value" => 1
            ],
            [
                "key" => "field_592fd666235d9",
                "label" => __( 'Sharing Networks', 'ohio' ),
                "name" => "global_project_social_sharing_buttons",
                "type" => "select",
                "instructions" => __( 'Choose social networks to be available for sharing through.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_592fd666231f2",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "choices" => [
                    "facebook" => __( 'Facebook', 'ohio' ),
                    "twitter" => __( 'X', 'ohio' ),
                    "pinterest" => __( 'Pinterest', 'ohio' ),
                    "linkedin" => __( 'LinkedIn', 'ohio' )
                ],
                "default_value" => [],
                "allow_null" => 0,
                "multiple" => 1,
                "ui" => 1,
                "ajax" => 1,
                "return_format" => "value",
                "placeholder" => ""
            ],
            [
                "key" => "field_592fd666235d78",
                "label" => __( 'Open in New Tab', 'ohio' ),
                "name" => "global_project_social_sharing_target_blank",
                "type" => "true_false",
                "instructions" => __( 'Open a sharing dialog window in a new browser tab.', 'ohio' ),
                "default_value" => 1,
                "ui" => 1,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_592fd666231f2",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ]
            ],
            [
                "key" => "field_592fd602l23059",
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
                "key" => "field_593l230597h24l34",
                "label" => '<h4>' . __( 'Custom Slug', 'ohio' ) . '</h4>',
                "name" => "",
                "type" => "message",
                "required" => 0,
                "conditional_logic" => 0,
            ],
            [
                "key" => "field_59fb4ad44a1dtd336sl",
                "label" => __( 'Project URL Slug', 'ohio' ),
                "name" => "global_portfolio_slug",
                "type" => "text",

                "instructions" => __( 'Add a project custom URL slug. <br><em>Go to <a target="_blank" href="./options-permalink.php">Permalinks</a> to rebuild its structure by clicking the "Save Changes" button.</em>', 'ohio' ),
                "required" => 0,
                "default_value" => "project",
            ],
            [
                "key" => "field_593l230597243",
                "label" => '<h4>' . __( 'Page Builder', 'ohio' ) . '</h4>',
                "name" => "",
                "type" => "message",
                "required" => 0,
                "conditional_logic" => 0,
            ],
            [
                "key" => "field_592fd922a41f",
                "label" => __( 'Page Builder Content Position', 'ohio' ),
                "name" => "global_project_custom_content_position",
                "type" => "select",
                "instructions" => __( 'Choose WPBakery/Elementor custom content position.', 'ohio' ),
                "required" => 0,
                "choices" => [
                    "top" => __( 'Above - Before Content', 'ohio' ),
                    "after_description" => __( 'Between - After Description', 'ohio' ),
                    "bottom" => __( 'Below - After Content', 'ohio' )
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "bottom",
                "layout" => "vertical",
                "return_format" => "value"
            ],
        ],
        "location" => [
            [
                [
                    "param" => "options_page",
                    "operator" => "==",
                    "value" => "theme-general-project"
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
