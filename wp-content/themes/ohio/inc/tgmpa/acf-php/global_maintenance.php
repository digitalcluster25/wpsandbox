<?php if ( function_exists( 'acf_add_local_field_group' ) ) :

    acf_add_local_field_group( [
        "key" => "group_5946360ak373c5",
        "title" => __( 'Maintenance Mode', 'ohio' ),
        "private" => true,
        "fields" => [
            [
                "key" => "field_5222e3443f7k9l0",
                "label" => __( 'Maintenance Mode', 'ohio' ),
                "name" => "global_coming_soon_switch",
                "type" => "true_false",
                "instructions" => __( 'Users won\'t have access to the entire site and will see the maintenance page only.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 0,
                "ui" => 1,
                "ui_on_text" => __( 'Yes', 'ohio' ),
                "ui_off_text" => __( 'No', 'ohio' )
            ],
            [
                "key" => "field_52832525asfsafff7k9l0",
                "label" => "",
                "name" => "",
                "type" => "message",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_5222e3443f7k9l0",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "message" => '<p class="message">' . '<i class="bi bi-question-circle"></i>' . __( '<a target="_blank" href="../?coming-soon-preview=true">Check</a> the maintenance page as a WordPress administrator.', 'ohio' ) . '</p>',
                "new_lines" => "",
                "esc_html" => 0
            ],
            [
                "key" => "field_5222e3443f7k9l2",
                "label" => __( 'Heading', 'ohio' ),
                "name" => "global_coming_soon_heading",
                "type" => "text",
                "instructions" => __( 'Add a heading to the maintenance page.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_5222e3443f7k9l0",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "default_value" => __( 'We\'re under<br> construction', 'ohio' ),
                "message" => "",
                "ui" => 1,
                "ui_on_text" => __( 'Yes', 'ohio' ),
                "ui_off_text" => __( 'No', 'ohio' )
            ],
            [
                "key" => "field_5222e3443f7k9l3",
                "label" => __( 'Description', 'ohio' ),
                "name" => "global_coming_soon_details",
                "type" => "textarea",
                "instructions" => __( 'Add a description to the maintenance page.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_5222e3443f7k9l0",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "default_value" => __( 'Check back for an update soon.', 'ohio' ),
                "message" => "",
                "ui" => 1,
                "ui_on_text" => __( 'Yes', 'ohio' ),
                "ui_off_text" => __( 'No', 'ohio' )
            ],
            [
                "key" => "field_5222e3443f7k9l4",
                "label" => __( 'Countdown Timer', 'ohio' ),
                "name" => "global_coming_soon_countdown",
                "type" => "true_false",
                "instructions" => __( 'Show a countdown timer on the maintenance page.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_5222e3443f7k9l0",
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
                "key" => "field_5222e3443f7k9l5",
                "label" => __( 'Expiration Date', 'ohio' ),
                "name" => "global_coming_soon_expiration",
                "type" => "date_time_picker",
                "instructions" => __( 'Set the final date when the site will be available.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_5222e3443f7k9l4",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                'display_format' => "Y/m/d H:i:s",
                'return_format' => "Y/m/d H:i:s",
                'first_day' => 1,
                "default_value" => '2022/03/14 18:00:00',
            ],
            [
                "key" => "field_5222e3443f7k9l6",
                "label" => __( 'Social Accounts', 'ohio' ),
                "name" => "global_coming_soon_switch_social",
                "type" => "true_false",
                "instructions" => __( 'Show social media accounts on the maintenance page. <br><em>Go to Theme Settings > Other > <a target="_blank" href="./admin.php?page=ohio_hub_settings&options_page=theme-general-other">Social Media</a> to update the list.</em>', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_5222e3443f7k9l0",
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
                "key" => "field_5222e3443f7k9l7",
                "label" => '<h4>' . __( 'Styles', 'ohio' ) . '</h4>',
                "name" => "",
                "type" => "message",
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_5222e3443f7k9l0",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ]
            ],
            [
                "key" => "field_5222e3443f7k9l1",
                "label" => __( 'Page Background', 'ohio' ),
                "name" => "global_coming_soon_background",
                "type" => "clone",
                "instructions" => __( 'Customize the background of the maintenance page.', 'ohio' ),
                "required" => false,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_5222e3443f7k9l0",
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
                "key" => "field_5222e3443f7k9lf5",
                "label" => __( 'Social Accounts Color', 'ohio' ),
                "name" => "global_coming_soon_social_color",
                "type" => "ohio_color",
                "instructions" => __( 'Set the shape color of social account icons.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_5222e3443f7k9l6",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "message" => "",
                "default_value" => ""
            ],
            [
                "key" => "field_5222e3443f7k9l8",
                "label" => __( 'Heading Typography', 'ohio' ),
                "name" => "global_coming_soon_heading_typo",
                "type" => "ohio_typo",
                "instructions" => __( 'Set the typography and color for the maintenance page heading.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_5222e3443f7k9l0",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_5222e3443f7k9l9",
                "label" => __( 'Description Typography', 'ohio' ),
                "name" => "global_coming_soon_details_typo",
                "type" => "ohio_typo",
                "instructions" => __( 'Set the typography and color for the maintenance page description.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_5222e3443f7k9l0",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_5222e3443f7k9l10",
                "label" => __( 'Countdown Timer Typography', 'ohio' ),
                "name" => "global_coming_soon_countdown_typo",
                "type" => "ohio_typo",
                "instructions" => __( 'Set the typography and color for the countdown timer.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_5222e3443f7k9l4",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "add_theme_inherited" => false
            ]
        ],
        "location" => [
            [
                [
                    "param" => "options_page",
                    "operator" => "==",
                    "value" => "theme-general-maintenance"
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
