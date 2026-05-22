<?php if ( function_exists( 'acf_add_local_field_group' ) ) :

    acf_add_local_field_group( [
        "key" => "group_59391f245236d2",
        "title" => __( 'Project Settings', 'ohio' ),
        "private" => true,
        "fields" => [
            [
                "key" => "field_592d6l2305982f",
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
                "key" => "field_593dbedc58835",
                "label" => __( 'Layout', 'ohio' ),
                "name" => "project_layout_type",
                "type" => "image_option",
                "instructions" => __( 'Choose a single project layout for this page.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "image_option_value" => [
                    [
                        "name" => "inherit",
                        "description" => __( 'Use from Theme Settings', 'ohio' ),
                        "src" => "acf__image_inherited.svg"
                    ],
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
                "default_value" => "inherit"
            ],
            [
                "key" => "field_593dbedc5b780",
                "label" => __( 'Double Width', 'ohio' ),
                "name" => "project_style_in_grid",
                "type" => "radio",
                "instructions" => __( 'Double the width of this project on the archive page.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "choices" => [
                    "default" => __( 'Default - 1 column width', 'ohio' ),
                    "2col" => __( 'Wide - 2 column width', 'ohio' )
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "default",
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_59fb4w13tfgdfse3s",
                "label" => __( 'Gallery Scrolling Effect', 'ohio' ),
                "name" => "project_gallery_scrolling_effect",
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
                    "inherit" => __( 'Use from Theme Settings', 'ohio' ),
                    "parallax" => __( 'Parallax', 'ohio' ),
                    "scale" => __( 'Scale', 'ohio' )
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "inherit",
                "return_format" => "value"
            ],
            [
                "key" => "field_59fb434rgth4kn0ythj994",
                "label" => __( 'Loop Mode', 'ohio' ),
                "name" => "project_loop_mode",
                "type" => "inherited_checkbox",
                "instructions" => __( 'Enable a loop mode for the portfolio slider elements.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_593dbedc58835",
                            "operator" => "!=",
                            "value" => "inherit"
                        ],
                        [
                            "field" => "field_593dbedc58835",
                            "operator" => "!=",
                            "value" => "type_1"
                        ],
                        [
                            "field" => "field_593dbedc58835",
                            "operator" => "!=",
                            "value" => "type_2"
                        ],
                        [
                            "field" => "field_593dbedc58835",
                            "operator" => "!=",
                            "value" => "type_3"
                        ],
                        [
                            "field" => "field_593dbedc58835",
                            "operator" => "!=",
                            "value" => "type_4"
                        ]
                    ]
                ],
                "custom_labels" => [
                    "inherit" => __( 'Use from Theme Settings', 'ohio' ),
                    "yes" => __( 'Enable', 'ohio' ),
                    "no" => __( 'Disable', 'ohio' )
                ],
                "message" => "",
                "default_value" => "inherit",
                "ui" => 1,
                "ui_on_text" => "",
                "ui_off_text" => ""
            ],
            [
                "key" => "field_egetrgwelnl54oopkgpo",
                "label" => __( 'Mouse-Wheel Scrolling', 'ohio' ),
                "name" => "project_mousewheel_mode",
                "type" => "inherited_checkbox",
                "instructions" => __( 'Enable a mouse-wheel scrolling for portfolio sliders.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_593dbedc58835",
                            "operator" => "!=",
                            "value" => "inherit"
                        ],
                        [
                            "field" => "field_593dbedc58835",
                            "operator" => "!=",
                            "value" => "type_1"
                        ],
                        [
                            "field" => "field_593dbedc58835",
                            "operator" => "!=",
                            "value" => "type_2"
                        ],
                        [
                            "field" => "field_593dbedc58835",
                            "operator" => "!=",
                            "value" => "type_3"
                        ],
                        [
                            "field" => "field_593dbedc58835",
                            "operator" => "!=",
                            "value" => "type_4"
                        ]
                    ]
                ],
                "custom_labels" => [
                    "inherit" => __( 'Use from Theme Settings', 'ohio' ),
                    "yes" => __( 'Enable', 'ohio' ),
                    "no" => __( 'Disable', 'ohio' )
                ],
                "message" => "",
                "default_value" => "inherit",
                "ui" => 1,
                "ui_on_text" => "",
                "ui_off_text" => ""
            ],
            [
                "key" => "field_594gerhkn56ok2pop",
                "label" => __( 'Autoplay Mode', 'ohio' ),
                "name" => "project_autoplay_mode",
                "type" => "inherited_checkbox",
                "instructions" => __( 'Enable an autoplay mode for portfolio sliders.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_593dbedc58835",
                            "operator" => "!=",
                            "value" => "inherit"
                        ],
                        [
                            "field" => "field_593dbedc58835",
                            "operator" => "!=",
                            "value" => "type_1"
                        ],
                        [
                            "field" => "field_593dbedc58835",
                            "operator" => "!=",
                            "value" => "type_2"
                        ],
                        [
                            "field" => "field_593dbedc58835",
                            "operator" => "!=",
                            "value" => "type_3"
                        ],
                        [
                            "field" => "field_593dbedc58835",
                            "operator" => "!=",
                            "value" => "type_4"
                        ]
                    ]
                ],
                "custom_labels" => [
                    "inherit" => __( 'Use from Theme Settings', 'ohio' ),
                    "yes" => __( 'Enable', 'ohio' ),
                    "no" => __( 'Disable', 'ohio' )
                ],
                "message" => "",
                "default_value" => "inherit",
                "ui" => 1,
                "ui_on_text" => "",
                "ui_off_text" => ""
            ],
            [
                "key" => "field_59erbvdfdkbk4io2okn1nj",
                "label" => __( 'Autoplay Interval Timeout', 'ohio' ),
                "name" => "project_autoplay_interval",
                "type" => "number",
                "instructions" => __( 'Set an interval timeout for the autoplay mode.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_594gerhkn56ok2pop",
                            "operator" => "==",
                            "value" => 1
                        ]
                    ]
                ],
                "default_value" => 5000,
                "placeholder" => "",
                "prepend" => "",
                "append" => "Ms"
            ],
            [
                "key" => "field_5937a0a24fd35f0",
                "label" => '<h4>' . __( 'Styles and Display', 'ohio' ) . '</h4>',
                "name" => "",
                "conditional_logic" => 0,
                "type" => "message"
            ],
            [
                "key" => "field_593dbedc5a7fe",
                "label" => __( 'Next/Prev Navigation', 'ohio' ),
                "name" => "project_show_navigation",
                "type" => "radio",
                "instructions" => __( 'Show a sticky navigation bar with the next/previous project links.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "choices" => [
                    "inherit" => __( 'Use from Theme Settings', 'ohio' ),
                    "prev_n_next" => __( 'Yes', 'ohio' ),
                    "none" => __( 'No', 'ohio' )
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => [
                    "inherit"
                ],
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_5923k4obl393bw",
                "label" => __( 'Pagination', 'ohio' ),
                "name" => "project_bullets_visibility",
                "type" => "inherited_checkbox",
                "instructions" => __( 'Show the pagination bar on portfolio sliders.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_593dbedc58835",
                            "operator" => "!=",
                            "value" => "inherit"
                        ],
                        [
                            "field" => "field_593dbedc58835",
                            "operator" => "!=",
                            "value" => "type_1"
                        ],
                        [
                            "field" => "field_593dbedc58835",
                            "operator" => "!=",
                            "value" => "type_2"
                        ],
                        [
                            "field" => "field_593dbedc58835",
                            "operator" => "!=",
                            "value" => "type_3"
                        ],
                        [
                            "field" => "field_593dbedc58835",
                            "operator" => "!=",
                            "value" => "type_4"
                        ]
                    ]
                ],
                "custom_labels" => [
                    "inherit" => __( 'Use from Theme Settings', 'ohio' ),
                    "show" => __( 'Show', 'ohio' ),
                    "hide" => __( 'Hide', 'ohio' )
                ],
                "message" => "",
                "default_value" => "inherit",
                "ui" => 1,
                "ui_on_text" => "",
                "ui_off_text" => "",
                "return_format" => "value"
            ],
            [
                "key" => "field_59fb4w1kbjg2jir1f3",
                "label" => __( 'Pagination Type', 'ohio' ),
                "name" => "project_bullets_type",
                "type" => "select",
                "instructions" => __( 'Select slider pagination type.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_5923k4obl393bw",
                            "operator" => "==",
                            "value" => 1
                        ]
                    ]
                ],
                "choices" => [
                    "inherit" => __( 'Use from Theme Settings', 'ohio' ),
                    "pagination" => __( 'Default', 'ohio' ),
                    "boxed" => __( 'Boxed', 'ohio' ),
                    "bullets" => __( 'Bullets', 'ohio' )
                ],
                "default_value" => [
                    "inherit"
                ],
                "allow_null" => 0,
                "multiple" => 0,
                "ui" => 0,
                "ajax" => 0,
                "return_format" => "value",
                "placeholder" => ""
            ],
            [
                "key" => "field_12409b346y8124",
                "label" => __( 'Pagination Color', 'ohio' ),
                "name" => "project_bullets_color",
                "type" => "ohio_color",
                "instructions" => __( 'Set the pagination color for portfolio sliders.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_5923k4obl393bw",
                            "operator" => "!=",
                            "value" => "inherit"
                        ],
                        [
                            "field" => "field_593dbedc58835",
                            "operator" => "!=",
                            "value" => "inherit"
                        ],
                        [
                            "field" => "field_593dbedc58835",
                            "operator" => "!=",
                            "value" => "type_1"
                        ],
                        [
                            "field" => "field_593dbedc58835",
                            "operator" => "!=",
                            "value" => "type_2"
                        ],
                        [
                            "field" => "field_593dbedc58835",
                            "operator" => "!=",
                            "value" => "type_3"
                        ],
                        [
                            "field" => "field_593dbedc58835",
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
                "key" => "field_59fb4b093lgdfse2",
                "label" => __( 'Navigation', 'ohio' ),
                "name" => "project_nav_visibility",
                "type" => "inherited_checkbox",
                "instructions" => __( 'Show navigation buttons on portfolio sliders.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_593dbedc58835",
                            "operator" => "!=",
                            "value" => "inherit"
                        ],
                        [
                            "field" => "field_593dbedc58835",
                            "operator" => "!=",
                            "value" => "type_1"
                        ],
                        [
                            "field" => "field_593dbedc58835",
                            "operator" => "!=",
                            "value" => "type_2"
                        ],
                        [
                            "field" => "field_593dbedc58835",
                            "operator" => "!=",
                            "value" => "type_3"
                        ],
                        [
                            "field" => "field_593dbedc58835",
                            "operator" => "!=",
                            "value" => "type_4"
                        ]
                    ]
                ],
                "custom_labels" => [
                    "inherit" => __( 'Use from Theme Settings', 'ohio' ),
                    "show" => __( 'Show', 'ohio' ),
                    "hide" => __( 'Hide', 'ohio' )
                ],
                "message" => "",
                "default_value" => "inherit",
                "ui" => 1,
                "ui_on_text" => "",
                "ui_off_text" => ""
            ],
            [
                "key" => "field_124098346y8124",
                "label" => __( 'Navigation Color', 'ohio' ),
                "name" => "project_nav_color",
                "type" => "ohio_color",
                "instructions" => __( 'Set the navigation color for portfolio sliders.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [   
                        [
                            "field" => "field_59fb4b093lgdfse2",
                            "operator" => "!=",
                            "value" => "inherit"
                        ],
                        [
                            "field" => "field_593dbedc58835",
                            "operator" => "!=",
                            "value" => "inherit"
                        ],
                        [
                            "field" => "field_593dbedc58835",
                            "operator" => "!=",
                            "value" => "type_1"
                        ],
                        [
                            "field" => "field_593dbedc58835",
                            "operator" => "!=",
                            "value" => "type_2"
                        ],
                        [
                            "field" => "field_593dbedc58835",
                            "operator" => "!=",
                            "value" => "type_3"
                        ],
                        [
                            "field" => "field_593dbedc58835",
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
                "key" => "field_egetrgwery53k93jvh8rpos",
                "label" => __( 'Overlay Color', 'ohio' ),
                "name" => "project_color_overlay",
                "type" => "ohio_color",
                "instructions" => __( 'Set the portfolio grid/slides overlay background color.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_593dbedc58835",
                            "operator" => "!=",
                            "value" => "inherit"
                        ],
                        [
                            "field" => "field_593dbedc58835",
                            "operator" => "!=",
                            "value" => "type_1"
                        ],
                        [
                            "field" => "field_593dbedc58835",
                            "operator" => "!=",
                            "value" => "type_2"
                        ],
                        [
                            "field" => "field_593dbedc58835",
                            "operator" => "!=",
                            "value" => "type_3"
                        ],
                        [
                            "field" => "field_593dbedc58835",
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
                "key" => "field_2935290835721012476",
                "label" => __( 'Intro Background Color', 'ohio' ),
                "name" => "project_intro_background",
                "type" => "ohio_color",
                "instructions" => __( 'Set the portfolio grid/slides intro background color.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_593dbedc58835",
                            "operator" => "==",
                            "value" => "type_10"
                        ]
                    ]
                ],
                "message" => "",
                "ui" => 1,
                "ui_on_text" => "",
                "ui_off_text" => ""
            ],
            [
                "key" => "field_lk3obp0g0jnf41hnj43",
                "label" => __( 'Title', 'ohio' ),
                "name" => "project_show_headline",
                "type" => "true_false",
                "instructions" => __( 'Show the project title.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "ui" => 1,
                "default_value" => 1,
                "new_lines" => "",
                "esc_html" => 0
            ],
            [
                "key" => "field_lk3obp0g0jnf41hnj44",
                "label" => __( 'Title Typography', 'ohio' ),
                "name" => "project_title_typography",
                "instructions" => __( 'Set the typography and color for the portfolio project title.', 'ohio' ),
                "type" => "ohio_typo",
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_lk3obp0g0jnf41hnj43",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_kg894kg9ckjdj3v04jgi432",
                "label" => __( 'Categories', 'ohio' ),
                "name" => "project_show_categories",
                "type" => "true_false",
                "instructions" => __( 'Show the project categories.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "ui" => 1,
                "default_value" => 1,
                "new_lines" => "",
                "esc_html" => 0
            ],
            [
                "key" => "field_lnll401kkhn3a34nf41hnj44",
                "label" => __( 'Categories Typography', 'ohio' ),
                "name" => "project_category_typography",
                "instructions" => __( 'Set the typography and color for the portfolio project categories.', 'ohio' ),
                "type" => "ohio_typo",
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_kg894kg9ckjdj3v04jgi432",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_kg894kmb94jkg92f09aoisoj34",
                "label" => __( 'Publication Date', 'ohio' ),
                "name" => "project_show_date",
                "type" => "true_false",
                "instructions" => __( 'Show the project publication date.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "ui" => 1,
                "default_value" => 1,
                "new_lines" => "",
                "esc_html" => 0
            ],
            [
                "key" => "field_lnll401kkmr30rkwovkeanf41hnj44",
                "label" => __( 'Publication Date Typography ', 'ohio' ),
                "name" => "project_date_typography",
                "instructions" => __( 'Set the typography and color for the portfolio project publication date.', 'ohio' ),
                "type" => "ohio_typo",
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_kg894kmb94jkg92f09aoisoj34",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_kg894kg9l3kmgmbklkaj323",
                "label" => __( 'Excerpt', 'ohio' ),
                "name" => "project_show_description",
                "type" => "true_false",
                "instructions" => __( 'Show the project excerpt.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "ui" => 1,
                "default_value" => 1,
                "new_lines" => "",
                "esc_html" => 0
            ],
            [
                "key" => "field_lnlkh34oofkgm399gk3nnn3",
                "label" => __( 'Excerpt Typography', 'ohio' ),
                "name" => "project_description_typography",
                "instructions" => __( 'Set the typography and color for the portfolio project excerpt.', 'ohio' ),
                "type" => "ohio_typo",
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_kg894kg9l3kmgmbklkaj323",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_kg894kg9l3kmgmbklkaj3233trg",
                "label" => __( 'Task ', 'ohio' ),
                "name" => "project_show_task",
                "type" => "true_false",
                "instructions" => __( 'Show the project task.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "ui" => 1,
                "default_value" => 1,
                "new_lines" => "",
                "esc_html" => 0
            ],
            [
                "key" => "field_lnlkh34oofkgm399gk3nnn3ert34",
                "label" => __( 'Task Typography', 'ohio' ),
                "name" => "project_task_typography",
                "instructions" => __( 'Set the typography and color for the portfolio project task.', 'ohio' ),
                "type" => "ohio_typo",
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_kg894kg9l3kmgmbklkaj3233trg",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_kg894kkb3kdl1o345b5jbkalwbvna",
                "label" => __( 'Meta', 'ohio' ),
                "name" => "project_show_details",
                "type" => "true_false",
                "instructions" => __( 'Show the project meta (e.g. client, tags, tools, etc.).', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "ui" => 1,
                "default_value" => 1,
                "new_lines" => "",
                "esc_html" => 0
            ],
            [
                "key" => "field_lnll401kkmhgope4k3wovkeanf41hnj44",
                "label" => __( 'Meta Typography', 'ohio' ),
                "name" => "project_details_typography",
                "instructions" => __( 'Set the typography and color for the portfolio meta.', 'ohio' ),
                "type" => "ohio_typo",
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_kg894kkb3kdl1o345b5jbkalwbvna",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_kg894kg9l3fgiak400hoalgkk",
                "label" => __( 'Project Link', 'ohio' ),
                "name" => "project_show_link",
                "type" => "true_false",
                "instructions" => __( 'Show the "Show Project" button in the project.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "ui" => 1,
                "default_value" => 1,
                "new_lines" => "",
                "esc_html" => 0
            ],
            [
                "key" => "field_lnlkh34oofk3g90ao1343",
                "label" => __( 'Project Link Typography', 'ohio' ),
                "name" => "project_link_typography",
                "instructions" => __( 'Set the typography and color for the "Show Project" button.', 'ohio' ),
                "type" => "ohio_typo",
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_kg894kg9l3fgiak400hoalgkk",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_59fb4312b343615asohigi",
                "label" => __( 'Video Button Style', 'ohio' ),
                "name" => "project_video_button_style",
                "type" => "select",
                "instructions" => __( 'Choose a video button style.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "choices" => [
                    "inherit" => __( 'Use from Theme Settings', 'ohio' ),
                    "default" => __( 'Default', 'ohio' ),
                    "outlined" => __( 'Outlined', 'ohio' ),
                    "blurred" => __( 'Blurred', 'ohio' )
                ],
                "default_value" => [
                    "inherit"
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_59fb4312bas346346igi",
                "label" => __( 'Video Button Size', 'ohio' ),
                "name" => "project_video_button_size",
                "type" => "select",
                "instructions" => __( 'Choose a video button size.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59fb4312b343615asohigi",
                            "operator" => "!=",
                            "value" => "inherit"
                        ]
                    ]
                ],
                "choices" => [
                    "inherit" => __( 'Use from Theme Settings', 'ohio' ),
                    "default" => __( 'Default', 'ohio' ),
                    "small" => __( 'Small', 'ohio' ),
                    "large" => __( 'Large', 'ohio' )
                ],
                "default_value" => [
                    "inherit"
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_egetrgwery5kop3kfk13sdgasdg",
                "label" => __( 'Video Button Color', 'ohio' ),
                "name" => "project_grid_video_btn_bg",
                "type" => "ohio_color",
                "instructions" => __( 'Set a video button color.', 'ohio' ),
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59fb4312b343615asohigi",
                            "operator" => "!=",
                            "value" => "inherit"
                        ]
                    ]
                ],
                "required" => 0,
                "message" => "",
                "ui" => 1,
                "ui_on_text" => "",
                "ui_off_text" => ""
            ],
            [
                "key" => "field_592fd602f23059",
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
                "key" => "field_593l230s97243",
                "label" => '<h4>' . __( 'Page Builder', 'ohio' ) . '</h4>',
                "name" => "",
                "type" => "message",
                "required" => 0,
                "conditional_logic" => 0,
            ],
            [
                "key" => "field_592fd66622a41amodagg",
                "label" => __( 'Page Builder Content Position', 'ohio' ),
                "name" => "project_custom_content_position",
                "type" => "select",
                "instructions" => __( 'Choose WPBakery/Elementor custom content position.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "choices" => [
                    "inherit" => __( 'Use from Theme Settings', 'ohio' ),
                    "top" => __( 'Above - Before Content', 'ohio' ),
                    "after_description" => __( 'Between - After Description', 'ohio' ),
                    "bottom" => __( 'Below - After Content', 'ohio' )
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "top",
                "return_format" => "value"
            ],
        ],
        "location" => [
            [
                [
                    "param" => "post_type",
                    "operator" => "==",
                    "value" => "ohio_portfolio"
                ]
            ]
        ],
        "menu_order" => 1,
        "position" => "acf_after_title",
        "style" => "default",
        "label_placement" => "left",
        "instruction_placement" => "label",
        "hide_on_screen" => "",
        "active" => 1,
        "description" => ""
    ] );

endif;
