<?php if ( function_exists( 'acf_add_local_field_group' ) ) :

    acf_add_local_field_group( [
        "key" => "group_59390deae2279_page_options",
        "title" => __( 'Page Settings', 'ohio' ),
        "private" => true,
        "fields" => [
            [
                "key" => "field_59390d235353d",
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
                "key" => "field_59391464abd31",
                "label" => __( 'Layout', 'ohio' ),
                "name" => "post_layout_type",
                "type" => "image_option",
                "instructions" => __( 'Choose a single post layout for this page.', 'ohio' ),
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
                        "description" => __( 'Standard', 'ohio' ),
                        "src" => "acf__image_45.svg"
                    ],
                    [
                        "name" => "type_2",
                        "description" => __( 'Split Screen', 'ohio' ),
                        "src" => "acf__image_46.svg"
                    ]
                ],
                "default_value" => "inherit"
            ],
            [
                "key" => "field_59391464abd30",
                "label" => __( 'Double Width', 'ohio' ),
                "name" => "post_style_in_grid",
                "type" => "radio",
                "instructions" => __( 'Double the width of this post on the archive page.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "choices" => [
                    "default" => __( 'Default - 1-column wide', 'ohio' ),
                    "2col" => __( 'Wide - 2-column wide', 'ohio' )
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "default",
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_5937afa621s71ebmod23",
                "label" => '<h4>' . __( 'Logo', 'ohio' ) . '</h4>',
                "name" => "",
                "type" => "message"
            ],
            [
                "key" => "field_59391a16302be",
                "label" => __( 'Page Logo', 'ohio' ),
                "name" => "header_logo_style",
                "type" => "select",
                "instructions" => __( 'Choose the logo variant for this page.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "choices" => [
                    "inherit" => __( 'Use from Theme Settings', 'ohio' ),
                    "sitename" => __( 'Text Logo', 'ohio' ),
                    "dark_variant" => __( 'Primary Logo', 'ohio' ),
                    "light_variant" => __( 'Inverse Logo', 'ohio' ),
                    "custom" => __( 'Custom Image', 'ohio' )
                ],
                "default_value" => [],
                "allow_null" => 0,
                "multiple" => 0,
                "ui" => 0,
                "ajax" => 0,
                "return_format" => "value",
                "placeholder" => ""
            ],
            [
                "key" => "field_59390deaf09ac",
                "label" => __( 'Text Logo Typography', 'ohio' ),
                "name" => "header_sitename_typo",
                "type" => "ohio_typo",
                "instructions" => __( 'Set the typography and color for the text logo.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59391a16302be",
                            "operator" => "==",
                            "value" => "sitename"
                        ]
                    ]
                ],
                "default_value" => "inherit",
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_59411f87d2536",
                "label" => __( 'Custom Image', 'ohio' ),
                "name" => "header_custom_logo",
                "type" => "image",
                "instructions" => __( 'Upload the custom logo variant for this page.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59391a16302be",
                            "operator" => "==",
                            "value" => "custom"
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
                "key" => "field_5937afa621s71eqfa3",
                "label" => '<h4>' . __( 'Preloader', 'ohio' ) . '</h4>',
                "name" => "",
                "type" => "message"
            ],
            [
                "key" => "field_5937afa621s71eqfa4",
                "label" => __( 'Preloader', 'ohio' ),
                "name" => "preloader_visibility",
                "type" => "inherited_checkbox",
                "instructions" => __( 'Show the loading screen before the site content is loaded for this page.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "custom_labels" => [
                    "inherit" => __( 'Use from Theme Settings', 'ohio' ),
                    "yes" => __( 'Yes', 'ohio' ),
                    "no" => __( 'No', 'ohio' )
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "inherit",
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_5937afa621s71234",
                "label" => '<h4>' . __( 'Scroll to Top', 'ohio' ) . '</h4>',
                "name" => "",
                "type" => "message"
            ],
            [
                "key" => "field_591ac509d4234s",
                "label" => __( 'Scroll to Top', 'ohio' ),
                "name" => "show_arrow",
                "type" => "inherited_checkbox",
                "instructions" => __( 'Show the scroll to top button on this page.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "custom_labels" => [
                    "inherit" => __( 'Use from Theme Settings', 'ohio' ),
                    "yes" => __( 'Yes', 'ohio' ),
                    "no" => __( 'No', 'ohio' )
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "inherit",
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_591ac509d4234234",
                "label" => __( 'Button Position', 'ohio' ),
                "name" => "arrow_position",
                "type" => "button_group",
                "instructions" => __( 'Choose the scroll to top button position on this page.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_591ac509d4234s",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "choices" => [
                    "inherit" => __( '<em class="acf-js-tooltip" title="Use from Theme Settings"><i class="bi bi-globe"></i></em>', 'ohio' ),
                    "left" => __( 'Left', 'ohio' ),
                    "bottom_left" => __( 'Bottom Left', 'ohio' ),
                    "bottom_right" => __( 'Bottom Right', 'ohio' ),
                    "right" => __( 'Right', 'ohio' ),
                ],
                "default_value" => [],
                "allow_null" => 0,
                "multiple" => 0,
                "ui" => 0,
                "ajax" => 0,
                "return_format" => "value",
                "placeholder" => ""
            ],
            [
                "key" => "field_591ac509d465as",
                "label" => __( 'Button Typography', 'ohio' ),
                "name" => "arrow_typo",
                "type" => "ohio_typo",
                "instructions" => __( 'Set the typography and color for the scroll to top button on this page.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_591ac509d4234s",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "default_value" => "inherit",
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_5937s0ae5fd23s15a",
                "label" => '<h4>' . __( 'Search', 'ohio' ) . '</h4>',
                "name" => "",
                "type" => "message"
            ],
            [
                "key" => "field_592d43df9e26cs",
                "label" => __( 'Search', 'ohio' ),
                "name" => "header_search_visibility",
                "type" => "inherited_checkbox",
                "instructions" => __( 'Show the search icon on this page.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "custom_labels" => [
                    "inherit" => __( 'Use from Theme Settings', 'ohio' ),
                    "yes" => __( 'Yes', 'ohio' ),
                    "no" => __( 'No', 'ohio' )
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "inherit",
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_592d43df9f212cs",
                "label" => __( 'Search Icon Position', 'ohio' ),
                "name" => "header_search_position",
                "type" => "select",
                "instructions" => __( 'Choose the search position for this page.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_592d43df9e26cs",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "choices" => [
                    "standard" => __( 'Standard', 'ohio' ),
                    "fixed" => __( 'Fixed', 'ohio' )
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "full",
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_59267bda33fg234fd4s",
                "label" => __( 'Search Icon Color', 'ohio' ),
                "name" => "header_search_color",
                "type" => "ohio_color",
                "instructions" => __( 'Set the search icon color for this page.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_592d43df9f212cs",
                            "operator" => "==",
                            "value" => "fixed"
                        ]
                    ]
                ],
                "default_value" => ""
            ],
            [
                "key" => "field_59390d235453f",
                "label" => __( 'Appearance', 'ohio' ),
                "name" => "",
                "type" => "tab",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "placement" => "top",
                "endpoint" => 0
            ],
            [
                "key" => "field_5937afa621s71eqfas",
                "label" => '<h4>' . __( 'Color Scheme', 'ohio' ) . '</h4>',
                "name" => "",
                "type" => "message"
            ],
            [
                "key" => "field_591ac911d3se51781624591h",
                "label" => __( 'Color Scheme', 'ohio' ),
                "name" => "dark_mode",
                "type" => "radio",
                "instructions" => __( 'Select the color scheme for this page.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "choices" => [
                    "inherit" => __( 'Use from Theme Settings', 'ohio' ),
                    "0" => __( 'Light', 'ohio'),
                    "1" => __( 'Dark', 'ohio' ),
                    "2" => __( 'Auto (System Colors)', 'ohio' ),
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "inherit",
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_5937e0a52b488ccz60",
                "label" => "",
                "name" => "",
                "type" => "message",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_591ac911d3se51781624591h",
                            "operator" => "==",
                            "value" => "inherit"
                        ]
                    ]
                ],
                "message" => '<p class="message">' . '<i class="bi bi-question-circle"></i>' . __( 'Color scheme switcher settings won\'t apply if Color Scheme option is set to Auto (System Colors) in global Theme Settings / local Page Settings.', 'ohio') . '</p>',
                "new_lines" => "",
                "esc_html" => 0
            ],
            [
                "key" => "field_591ac509d3se51781624593t",
                "label" => __( 'Switcher', 'ohio' ),
                "name" => "dark_mode_switcher",
                "type" => "inherited_checkbox",
                "instructions" => __( 'Show the color scheme switcher on this page.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "custom_labels" => [
                    "inherit" => __( 'Use from Theme Settings', 'ohio' ),
                    "yes" => __( 'Yes', 'ohio' ),
                    "no" => __( 'No', 'ohio' )
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "inherit",
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_591ac509d3se517812",
                "label" => __( 'Switcher Position', 'ohio' ),
                "name" => "dark_mode_switcher_position",
                "type" => "button_group",
                "instructions" => __( 'Choose the color scheme switcher position for this page.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_591ac509d3se51781624593t",
                            "operator" => "==",
                            "value" => "1"
                        ],
                    ]
                ],
                "choices" => [
                    "inherit" => __( '<em class="acf-js-tooltip" title="Use from Theme Settings"><i class="bi bi-globe"></i></em>', 'ohio' ),
                    "left" => __( 'Left', 'ohio' ),
                    "bottom_left" => __( 'Bottom Left', 'ohio' ),
                    "bottom_right" => __( 'Bottom Right', 'ohio' ),
                    "right" => __( 'Right', 'ohio' ),
                ],
                "default_value" => [],
                "allow_null" => 0,
                "multiple" => 0,
                "ui" => 0,
                "ajax" => 0,
                "return_format" => "value",
                "placeholder" => ""
            ],
            [
                "key" => "field_591234509d332523",
                "label" => __( 'Switcher Typography', 'ohio' ),
                "name" => "dark_mode_switcher_typo",
                "type" => "ohio_typo",
                "instructions" => __( 'Set up the color scheme switcher typography for this page.', 'ohio' ),
                "required" => 0,
                "default_value" => "inherit",
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_591ac509d3se51781624593t",
                            "operator" => "==",
                            "value" => "1"
                        ],
                    ]
                ],
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_59390d235453d",
                "label" => __( 'Menu', 'ohio' ),
                "name" => "",
                "type" => "tab",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "placement" => "top",
                "endpoint" => 0
            ],
            [
                "key" => "field_59390deaefde5",
                "label" => __( 'Menu Type', 'ohio' ),
                "name" => "header_menu_type",
                "type" => "radio",
                "instructions" => __( 'Choose a menu type for this page.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "choices" => [
                    "inherit" => __( 'Use from Theme Settings', 'ohio' ),
                    "full" => __( 'Standard', 'ohio' ),
                    "hamburger" => __( 'Hamburger', 'ohio' ),
                    "both" => __( 'Both Menus', 'ohio' )
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "inherit",
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_59390deaefzxfmod",
                "label" => __( 'Hamburger Menu Layout', 'ohio' ),
                "name" => "fullscreen_menu_style",
                "type" => "image_option",
                "instructions" => __( 'Choose a layout type for the hamburger menu on this page.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59390deaefde5",
                            "operator" => "==",
                            "value" => "hamburger"
                        ]
                    ],
                    [
                        [
                            "field" => "field_59390deaefde5",
                            "operator" => "==",
                            "value" => "both"
                        ]
                    ]
                ],
                "image_option_value" => [
                    [
                        "name" => "inherit",
                        "description" => __( 'Use from Theme Settings', 'ohio' ),
                        "src" => "acf__image_inherited.svg"
                    ],
                    [
                        "name" => "default",
                        "description" => __( 'Standard', 'ohio' ),
                        "src" => "acf__image_34.svg"
                    ],
                    [
                        "name" => "centered",
                        "description" => __( 'Centered', 'ohio' ),
                        "src" => "acf__image_35.svg"
                    ],
                    [
                        "name" => "split",
                        "description" => __( 'Creative', 'ohio' ),
                        "src" => "acf__image_36.svg"
                    ]
                ],
                "default_value" => "inherit"
            ],
            [
                "key" => "field_59390de2350897",
                "label" => __( 'Hamburger Caption', 'ohio' ),
                "name" => "hamburger_menu_caption",
                "type" => "inherited_checkbox",
                "instructions" => __( 'Show a hamburger caption on this page.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "custom_labels" => [
                    "inherit" => __( 'Use from Theme Settings', 'ohio' ),
                    "yes" => __( 'Yes', 'ohio' ),
                    "no" => __( 'No', 'ohio' )
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "inherit",
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_59390de2350892",
                "label" => __( 'Hamburger Position', 'ohio' ),
                "name" => "header_menu_position",
                "type" => "radio",
                "instructions" => __( 'Choose a hamburger icon position for this page.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59390deaefde5",
                            "operator" => "==",
                            "value" => "hamburger"
                        ],
                    ],
                    [
                        [
                            "field" => "field_59390deaefde5",
                            "operator" => "==",
                            "value" => "both"
                        ],
                    ]
                ],
                "choices" => [
                    "inherit" => __( 'Use from Theme Settings', 'ohio' ),
                    "left" => __( 'Left', 'ohio' ),
                    "right" => __( 'Right', 'ohio' )
                ],
                "default_value" => [
                    "inherit"
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
                "key" => "field_59390deaeee3d",
                "label" => __( 'Header', 'ohio' ),
                "name" => "",
                "type" => "tab",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "placement" => "top",
                "endpoint" => 0
            ],
            [
                "key" => "field_5937s0a25fd23s15a",
                "label" => '<h4>' . __( 'General', 'ohio' ) . '</h4>',
                "name" => "",
                "type" => "message"
            ],
            [
                "key" => "field_59390deaef9efdd",
                "label" => __( 'Header', 'ohio' ),
                "name" => "header_visibility",
                "type" => "inherited_checkbox",
                "instructions" => __( 'Show the header on this page.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "custom_labels" => [
                    "inherit" => __( 'Use from Theme Settings', 'ohio' ),
                    "yes" => __( 'Show', 'ohio' ),
                    "no" => __( 'Hide', 'ohio' )
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "inherit",
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_59390deaefzxf",
                "label" => __( 'Layout', 'ohio' ),
                "name" => "header_menu_style",
                "type" => "image_option",
                "instructions" => __( 'Choose a header layout type for this page.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "image_option_value" => [
                    [
                        "name" => "inherit",
                        "description" => __( 'Use from Theme Settings', 'ohio' ),
                        "src" => "acf__image_inherited.svg"
                    ],
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
                "default_value" => "inherit"
            ],
            [
                "key" => "field_5l92k3239857",
                "label" => __( 'Contained Menu', 'ohio' ),
                "name" => "header_contained_menu",
                "type" => "inherited_checkbox",
                "instructions" => __( 'Add a wrap container for the menu.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "custom_labels" => [
                    "inherit" => __( 'Use from Theme Settings', 'ohio' ),
                    "yes" => __( 'Yes', 'ohio' ),
                    "no" => __( 'No', 'ohio' )
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "inherit",
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_59390deaef614",
                "label" => __( 'Wrap Container', 'ohio' ),
                "name" => "header_menu_use_wrapper",
                "type" => "inherited_checkbox",
                "instructions" => __( 'Enable a wrap container for this page, full-width layout is used when disabled.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "custom_labels" => [
                    "inherit" => __( 'Use from Theme Settings', 'ohio' ),
                    "yes" => __( 'Yes', 'ohio' ),
                    "no" => __( 'No', 'ohio' )
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "inherit",
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_59390deaef9ea",
                "label" => __( 'Blank Spacer', 'ohio' ),
                "name" => "header_add_cap",
                "type" => "inherited_checkbox",
                "instructions" => __( 'Enable to add a blank spacer under fixed or sticky headers.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "custom_labels" => [
                    "inherit" => __( 'Use from Theme Settings', 'ohio' ),
                    "yes" => __( 'Add spacer', 'ohio' ),
                    "no" => __( 'Do not add spacer', 'ohio' )
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "inherit",
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_59229b3463432b",
                "label" => __( 'Fixed Position', 'ohio' ),
                "name" => "header_fixed_position",
                "type" => "inherited_checkbox",
                "instructions" => __( 'Fix the header position at the top when scrolling up or down a page.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "custom_labels" => [
                    "inherit" => __( 'Use from Theme Settings', 'ohio' ),
                    "yes" => __( 'Add spacer', 'ohio' ),
                    "no" => __( 'Do not add spacer', 'ohio' )
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "inherit",
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_59411fcf0048f",
                "label" => __( 'Custom Styles', 'ohio' ),
                "name" => "header_menu_style_settings",
                "type" => "radio",
                "instructions" => __( 'Define custom styles by overriding the global <a target="_blank" href="./admin.php?page=ohio_hub_settings&options_page=theme-general-header">theme settings</a>.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "choices" => [
                    "inherit" => __( 'Use from Theme Settings', 'ohio' ),
                    "custom" => __( 'Customize', 'ohio' )
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "inherit",
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_59390deaf05bd",
                "label" => __( 'Header Typography', 'ohio' ),
                "name" => "header_menu_text_typo",
                "type" => "ohio_typo",
                "instructions" => __( 'Set the typography and color of elements in the header area.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59411fcf0048f",
                            "operator" => "==",
                            "value" => "custom"
                        ]
                    ]
                ],
                "default_value" => "inherit",
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_5941276d0b89b",
                "label" => __( 'Height', 'ohio' ),
                "name" => "header_menu_height",
                "type" => "ohio_responsive_height",
                "instructions" => __( 'Set the header height for this page.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59411fcf0048f",
                            "operator" => "==",
                            "value" => "custom"
                        ]
                    ]
                ],
                "default_value" => ""
            ],
            [
                "key" => "field_591ac509d1208gbgclrlcfpagbgmn",
                "label" => __( 'Background', 'ohio' ),
                "name" => "header_menu",
                "type" => "clone",
                "instructions" => __( 'Customize the header background for this page.', 'ohio' ),
                "required" => false,
                "clone" => [
                    "group_982e082a3bcfcf81b766eaa1ec2df4f11e0f5cd3"
                ],
                "display" => "group",
                "layout" => "block",
                "prefix_label" => false,
                "prefix_name" => true
            ],
            [
                "key" => "field_5941261c69959",
                "label" => __( 'Border', 'ohio' ),
                "name" => "header_menu_border_visibility",
                "type" => "inherited_checkbox",
                "instructions" => __( 'Enable the header border for this page.', 'ohio' ),
                "required" => 0,
                "custom_labels" => [
                    "inherit" => __( 'Use from Theme Settings', 'ohio' ),
                    "yes" => __( 'Add spacer', 'ohio' ),
                    "no" => __( 'Do not add spacer', 'ohio' )
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "inherit",
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_594126ed0b898",
                "label" => __( 'Border Style', 'ohio' ),
                "name" => "header_menu_border_type",
                "type" => "select",
                "instructions" => __( 'Choose the header border style for this page.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_5941261c69959",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "choices" => [
                    "inherit" => __( 'Use from Theme Settings', 'ohio' ),
                    "solid" => __( 'Solid', 'ohio' ),
                    "dashed" => __( 'Dashed', 'ohio' ),
                    "dotted" => __( 'Dotted', 'ohio' ),
                    "double" => __( 'Double', 'ohio' )
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
                "key" => "field_594127340b89a",
                "label" => __( 'Border Color', 'ohio' ),
                "name" => "header_menu_border_color",
                "type" => "ohio_color",
                "instructions" => __( 'Set the header border color for this page.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_5941261c69959",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "default_value" => ""
            ],
            [
                "key" => "field_5937a0a25sd23s15a",
                "label" => '<h4>' . __( 'Sticky Header', 'ohio' ) . '</h4>',
                "name" => "",
                "type" => "message"
            ],
            [
                "key" => "field_59390deaf1978",
                "label" => __( 'Sticky Header', 'ohio' ),
                "name" => "header_sticky",
                "type" => "inherited_checkbox",
                "instructions" => __( 'Enable sticky header.', 'ohio' ) . '<br><em> ' . __( 'Sticky header won\'t work with fixed header position enabled.', 'ohio' ) . '</em>',
                "required" => 0,
                "conditional_logic" => 0,
                "custom_labels" => [
                    "inherit" => __( 'Use from Theme Settings', 'ohio' ),
                    "yes" => __( 'Yes', 'ohio' ),
                    "no" => __( 'No', 'ohio' )
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "inherit",
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_5937a0a25fd23s15a",
                "label" => '<h4>' . __( 'Subheader', 'ohio' ) . '</h4>',
                "name" => "",
                "type" => "message"
            ],
            [
                "key" => "field_59390deaf0da4",
                "label" => __( 'Subheader ', 'ohio' ),
                "name" => "subheader_visibility",
                "type" => "inherited_checkbox",
                "instructions" => __( 'Show the subheader on this page.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "custom_labels" => [
                    "inherit" => __( 'Use from Theme Settings', 'ohio' ),
                    "yes" => __( 'Show', 'ohio' ),
                    "no" => __( 'Hide', 'ohio' )
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "inherit",
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_5941030b7ce5d",
                "label" => __( 'Custom Styles', 'ohio' ),
                "name" => "subheader_style",
                "type" => "radio",
                "instructions" => __( 'Define custom styles by overriding the global <a target="_blank" href="./admin.php?page=ohio_hub_settings&options_page=theme-general-header">theme settings</a>.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "allow_null" => 0,
                "choices" => [
                    "inherit" => __( 'Use from Theme Settings', 'ohio' ),
                    "custom" => __( 'Custom', 'ohio' )
                ],
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "inherit",
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_59390deaf159e",
                "label" => __( 'Subheader Typography', 'ohio' ),
                "name" => "subheader_text_typo",
                "type" => "ohio_typo",
                "instructions" => __( 'Set the typography and color of elements in the subheader area.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_5941030b7ce5d",
                            "operator" => "==",
                            "value" => "custom"
                        ]
                    ]
                ],
                "default_value" => "inherit",
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_5941040a97ec9",
                "label" => __( 'Height', 'ohio' ),
                "name" => "subheader_height",
                "type" => "ohio_responsive_height",
                "instructions" => __( 'Set the subheader height for this page.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_5941030b7ce5d",
                            "operator" => "==",
                            "value" => "custom"
                        ]
                    ]
                ],
                "default_value" => ""
            ],
            [
                "key" => "field_59229bda36adbsubheadasstglgbl64backglbp5",
                "label" => __( 'Background', 'ohio' ),
                "name" => "subheader",
                "type" => "clone",
                "instructions" => __( 'Customize the subheader background for this page.', 'ohio' ),
                "required" => false,
                "clone" => [
                    "group_982e082a3bcfcf81b766eaa1ec2df4f11e0f5cd3"
                ],
                "display" => "group",
                "layout" => "block",
                "prefix_label" => false,
                "prefix_name" => true
            ],
            [
                "key" => "field_5937a0a252309587",
                "label" => '<h4>' . __( 'Other', 'ohio' ) . '</h4>',
                "name" => "",
                "type" => "message"
            ],
            [
                "key" => "field_59390deaf1978asf32fadsgas",
                "label" => __( 'Dynamic Colors', 'ohio' ),
                "name" => "header_dynamic_typography_color",
                "type" => "inherited_checkbox",
                "instructions" => __( 'Enable changing the header elements\' color for light/dark sections.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "custom_labels" => [
                    "inherit" => __( 'Use from Theme Settings', 'ohio' ),
                    "yes" => __( 'Yes', 'ohio' ),
                    "no" => __( 'No', 'ohio' )
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "inherit",
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_59390deb012f8",
                "label" => __( 'Page', 'ohio' ),
                "name" => "",
                "type" => "tab",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "placement" => "top",
                "endpoint" => 0
            ],
            [
                "key" => "field_5937a0a35fd23s15a",
                "label" => '<h4>' . __( 'General', 'ohio' ) . '</h4>',
                "name" => "",
                "type" => "message"
            ],
            [
                "key" => "field_59390deb03b1b",
                "label" => __( 'Wrap Container', 'ohio' ),
                "name" => "add_wrapper",
                "type" => "inherited_checkbox",
                "instructions" => __( 'Enable a wrap container, full-width layout is used when disabled.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "custom_labels" => [
                    "inherit" => __( 'Use from Theme Settings', 'ohio' ),
                    "yes" => __( 'Enable wrapper', 'ohio' ),
                    "no" => __( 'Disable wrapper', 'ohio' )
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "inherit",
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_591b10dbb4a82342342345623",
                "label" => __( 'Wrap Container Width', 'ohio' ),
                "name" => "content_wrapper_width",
                "type" => "text",
                "instructions" => __( 'Set the width of the page wrap container.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59390deb03b1b",
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
                "key" => "field_591b10dbb4a85_fwgaps_local",
                "label" => __( 'Side Gaps', 'ohio' ),
                "name" => "full_width_margins_size",
                "type" => "text",
                "instructions" => __( 'Set the size of the side gaps for a full-width page layout.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "default_value" => "",
                "placeholder" => "",
                "prepend" => "",
                "append" => "",
                "maxlength" => 200
            ],
            [
                "key" => "field_59390deb03f38",
                "label" => __( 'Vertical Gaps', 'ohio' ),
                "name" => "add_top_padding",
                "type" => "inherited_checkbox",
                "instructions" => __( 'Add top and bottom vertical gaps for the page content area.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "custom_labels" => [
                    "inherit" => __( 'Use from Theme Settings', 'ohio' ),
                    "yes" => "Add",
                    "no" => __( 'No', 'ohio' )
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "inherit",
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_591b10dbb4a8512rwsaasd",
                "label" => __( 'Upper Gap', 'ohio' ),
                "name" => "top_padding_spacing",
                "type" => "text",
                "instructions" => __( 'Set the size of the upper gap for the page content area.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59390deb03f38",
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
                "key" => "field_591b10dbb4a8512rwasda23f",
                "label" => __( 'Lower Gap', 'ohio' ),
                "name" => "bottom_padding_spacing",
                "type" => "text",
                "instructions" => __( 'Set the size of the lower gap for the page content area.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59390deb03f38",
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
                "key" => "field_59390deb03738",
                "label" => __( 'Boxed Layout', 'ohio' ),
                "name" => "use_boxed_wrapper",
                "type" => "inherited_checkbox",
                "instructions" => __( 'Enable boxed wrapper for the site viewport area.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "custom_labels" => [
                    "inherit" => __( 'Use from Theme Settings', 'ohio' ),
                    "yes" => __( 'Yes', 'ohio' ),
                    "no" => __( 'No', 'ohio' )
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "inherit",
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_59381c77504bfasfeas",
                "label" => __( 'Boxed Layout Indent', 'ohio' ),
                "name" => "boxed_wrapper_margins_size",
                "type" => "text",
                "instructions" => __( 'Set the size of the side indent for the boxed content area.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59390deb03738",
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
                "key" => "field_59390deb0171egrp",
                "label" => __( 'Background', 'ohio' ),
                "name" => "",
                "type" => "clone",
                "instructions" => __( 'Customize page background for this page.', 'ohio' ),
                "required" => false,
                "conditional_logic" => false,
                "clone" => [
                    "group_982e082a3bcfcf81b766eaa1ec2df4f11e0f5cd3"
                ],
                "display" => "group",
                "layout" => "block",
                "inherited_slug" => __( 'Use from Theme Settings', 'ohio' ),
                "prefix_label" => false,
                "prefix_name" => false
            ],
            [
                "key" => "field_5937afa35fd23s15a",
                "label" => '<h4>' . __( 'Page Headline', 'ohio' ) . '</h4>',
                "name" => "",
                "type" => "message"
            ],
            [
                "key" => "field_59390deb00ef1",
                "label" => __( 'Page Headline', 'ohio' ),
                "name" => "header_title_visibility",
                "type" => "inherited_checkbox",
                "instructions" => __( 'Show page headline on this page.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "custom_labels" => [
                    "inherit" => __( 'Use from Theme Settings', 'ohio' ),
                    "yes" => __( 'Show', 'ohio' ),
                    "no" => __( 'Hide', 'ohio' )
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "inherit",
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_59391464a51e6",
                "label" => __( 'Subtitle Type', 'ohio' ),
                "name" => "header_title_subtitle_type",
                "type" => "radio",
                "instructions" => __( 'Choose the content type of the page headline subtitle area.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "choices" => [
                    "generated" => "Post Meta",
                    "custom" => "Subtitle Text",
                    "without" => "Without Subtitle"
                ],
                "default_value" => [
                    "generated"
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
                "key" => "field_593ddebba2fcb",
                "label" => __( 'Subtitle Text', 'ohio' ),
                "name" => "header_title_custom_subtitle_text",
                "type" => "text",
                "instructions" => __( 'Add the page headline subtitle text.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59391464a51e6",
                            "operator" => "==",
                            "value" => "custom"
                        ]
                    ]
                ],
                "default_value" => "",
                "placeholder" => "",
                "prepend" => "",
                "append" => "",
                "maxlength" => ""
            ],
            [
                "key" => "field_59390deb00ef1s",
                "label" => __( 'Author', 'ohio' ),
                "name" => "header_title_author_visibility",
                "type" => "true_false",
                "instructions" => __( 'Show the author in the page headline.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59391464a51e6",
                            "operator" => "==",
                            "value" => "generated"
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
                "key" => "field_59390deb00ef1s2",
                "label" => __( 'Date', 'ohio' ),
                "name" => "header_title_date_visibility",
                "type" => "true_false",
                "instructions" => __( 'Show the published date in the page headline.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59391464a51e6",
                            "operator" => "==",
                            "value" => "generated"
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
                "key" => "field_59390deb00ef1s3",
                "label" => __( 'Comments', 'ohio' ),
                "name" => "header_title_comments_visibility",
                "type" => "true_false",
                "instructions" => __( 'Show the comments info in the page headline.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59391464a51e6",
                            "operator" => "==",
                            "value" => "generated"
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
                "key" => "field_59390deb0034e",
                "label" => __( 'Content Alignment', 'ohio' ),
                "name" => "header_title_align",
                "type" => "button_group",
                "instructions" => __( 'Choose the page headline content position for this page.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "choices" => [
                    "inherit" => __( '<em class="acf-js-tooltip" title="Use from Theme Settings"><i class="bi bi-globe"></i></em>', 'ohio' ),
                    "left" => __( '<i class="bi bi-text-left"></i> Left', 'ohio' ),
                    "center" => __( '<i class="bi bi-text-center"></i> Center', 'ohio' ),
                    "right" => __( '<i class="bi bi-text-right"></i> Right', 'ohio' )
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
                "key" => "field_59390deb00733",
                "label" => __( 'Fullscreen Mode', 'ohio' ),
                "name" => "header_title_fullscreen",
                "type" => "inherited_checkbox",
                "instructions" => __( 'Set the page headline height equal to the viewport area.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "custom_labels" => [
                    "inherit" => __( 'Use from Theme Settings', 'ohio' ),
                    "yes" => __( 'Yes', 'ohio' ),
                    "no" => __( 'No', 'ohio' )
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "inherit",
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_59229e4312938574",
                "label" => __( 'Content Vertical Alignment', 'ohio' ),
                "name" => "header_title_vertical_alignment",
                "type" => "button_group",
                "instructions" => __( 'Choose the page headline content vertical alignment for this page.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "choices" => [
                    "inherit" => __( '<em class="acf-js-tooltip" title="Use from Theme Settings"><i class="bi bi-globe"></i></em>', 'ohio' ),
                    "top" => __( '<i class="bi bi-align-top"></i> Top', 'ohio' ),
                    "middle" => __( '<i class="bi bi-align-center"></i> Center', 'ohio' ),
                    "bottom" => __( '<i class="bi bi-align-bottom"></i> Bottom', 'ohio' )
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
                "key" => "field_59390deb00b09",
                "label" => __( 'Height', 'ohio' ),
                "name" => "header_title_height",
                "type" => "ohio_responsive_height",
                "instructions" => __( 'Set the page headline height for this page.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59390deb00733",
                            "operator" => "!=",
                            "value" => "1"
                        ]
                    ]
                ],
                "default_value" => ""
            ],
            [
                "key" => "field_59390deaf218agrp",
                "label" => __( 'Background', 'ohio' ),
                "name" => "header_title",
                "type" => "clone",
                "instructions" => __( 'Customize the background of the page headline.', 'ohio' ),
                "required" => false,
                "conditional_logic" => false,
                "clone" => [
                    "group_982e082a3bcfcf81b766eaa1ec2df4f11e0f5cd3"
                ],
                "display" => "group",
                "layout" => "block",
                "inherited_slug" => __( 'Use from Theme Settings', 'ohio' ),
                "prefix_label" => false,
                "prefix_name" => true
            ],
            [
                "key" => "field_59229bwjeofwnheof3921",
                "label" => __( 'Parallax Effect', 'ohio' ),
                "name" => "header_title_use_parallax",
                "type" => "inherited_checkbox",
                "instructions" => __( 'Enable parallax effect for the background image of the page headlines.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "custom_labels" => [
                    "inherit" => __( 'Use from Theme Settings', 'ohio' ),
                    "yes" => __( 'Yes', 'ohio' ),
                    "no" => __( 'No', 'ohio' )
                ],
                "message" => "",
                "default_value" => "inherit",
                "ui" => 1,
                "ui_on_text" => __( 'Yes', 'ohio' ),
                "ui_off_text" => __( 'No', 'ohio' )
            ],
            [
                "key" => "field_59390deaf3961",
                "label" => __( 'Overlay', 'ohio' ),
                "name" => "header_title_use_overlay",
                "type" => "inherited_checkbox",
                "instructions" => __( 'Add an overlay over the page headline background image.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "custom_labels" => [
                    "inherit" => __( 'Use from Theme Settings', 'ohio' ),
                    "yes" => __( 'Yes', 'ohio' ),
                    "no" => __( 'No', 'ohio' )
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "inherit",
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_59390deaf3d98",
                "label" => __( 'Overlay Color', 'ohio' ),
                "name" => "header_title_overlay_color",
                "type" => "ohio_color",
                "instructions" => __( 'Set the overlay color.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59390deaf3961",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "default_value" => ""
            ],
            [
                "key" => "field_593a55746376f",
                "label" => __( 'Custom Styles', 'ohio' ),
                "name" => "typography_settings",
                "type" => "radio",
                "instructions" => __( 'Define custom styles by overriding the global <a target="_blank" href="./admin.php?page=ohio_hub_settings&options_page=theme-general-pages">theme settings</a>.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "choices" => [
                    "inherit" => __( 'Use from Theme Settings', 'ohio' ),
                    "custom" => __( 'Custom', 'ohio' )
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
                "key" => "field_593a55d063770",
                "label" => __( 'Heading Typography', 'ohio' ),
                "name" => "header_title_typo",
                "type" => "ohio_typo",
                "instructions" => __( 'Set the typography and color for the page heading.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_593a55746376f",
                            "operator" => "==",
                            "value" => "custom"
                        ]
                    ]
                ],
                "default_value" => "inherit",
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_593a565163771",
                "label" => __( 'Subtitle Typography', 'ohio' ),
                "name" => "header_subtitle_typo",
                "type" => "ohio_typo",
                "instructions" => __( 'Set the typography and color for the page subtitle.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_593a55746376f",
                            "operator" => "==",
                            "value" => "custom"
                        ]
                    ]
                ],
                "default_value" => "inherit",
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_593a55d0637fq",
                "label" => __( 'Back Button Typography', 'ohio' ),
                "name" => "header_previous_button_typo",
                "type" => "ohio_typo",
                "instructions" => __( 'Set the typography and color for the go back button caption.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_593a55746376f",
                            "operator" => "==",
                            "value" => "custom"
                        ]
                    ]
                ],
                "default_value" => "inherit",
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_59229bda382345s",
                "label" => __( 'Dark Section Mode', 'ohio' ),
                "name" => "header_title_dynamic_typo",
                "type" => "inherited_checkbox",
                "instructions" => __( 'Enable the dark section mode for the dynamically changing colors.', 'ohio' ) . '<br><em> ' . __( '(clb__dark_section class will be added to the page headline area.)', 'ohio' ) . '</em>',
                "required" => 0,
                "conditional_logic" => 0,
                "custom_labels" => [
                    "inherit" => __( 'Use from Theme Settings', 'ohio' ),
                    "yes" => __( 'Yes', 'ohio' ),
                    "no" => __( 'No', 'ohio' )
                ],
                "message" => "",
                "default_value" => "inherit",
                "ui" => 1,
                "ui_on_text" => __( 'Yes', 'ohio' ),
                "ui_off_text" => __( 'No', 'ohio' )
            ],
            [
                "key" => "field_5937a0a621s71ebs6d23",
                "label" => '<h4>' . __( 'Sidebar', 'ohio' ) . '</h4>',
                "name" => "",
                "type" => "message"
            ],
            [
                "key" => "field_59390deaf218b",
                "label" => __( 'Sidebar', 'ohio' ),
                "name" => "sidebar_position",
                "type" => "radio",
                "instructions" => __( 'Show a sidebar on this page.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "choices" => [
                    "inherit" => __( 'Use from Theme Settings', 'ohio' ),
                    "left" => __( 'Left', 'ohio' ),
                    "right" => __( 'Right', 'ohio' ),
                    "without" => __( 'Disable', 'ohio' )
                ],
                "default_value" => [
                    "inherit"
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
                "key" => "field_592345234958934",
                "label" => __( 'Sidebar Layout', 'ohio' ),
                "name" => "sidebar_layout",
                "type" => "radio",
                "instructions" => __( 'Choose the layout type for the sidebar on this page.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "choices" => [
                    "inherit" => __( 'Use from Theme Settings', 'ohio' ),
                    "default" => __( 'Default', 'ohio' ),
                    "boxed" => __( 'Boxed', 'ohio' ),
                ],
                "default_value" => [
                    "inherit"
                ],
                "return_format" => "value"
            ],
            [
                "key" => "field_592s45f15af5g9ts",
                "label" => '<h4>' . __( 'Breadcrumbs', 'ohio' ) . '</h4>',
                "name" => "",
                "type" => "message"
            ],
            [
                "key" => "field_59390deb03328",
                "label" => __( 'Breadcrumbs', 'ohio' ),
                "name" => "breadcrumbs_visibility",
                "type" => "inherited_checkbox",
                "instructions" => __( 'Show breadcrumbs on this page.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "custom_labels" => [
                    "inherit" => __( 'Use from Theme Settings', 'ohio' ),
                    "yes" => __( 'Show', 'ohio' ),
                    "no" => __( 'Hide', 'ohio' )
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "inherit",
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_593db13395d12",
                "label" => __( 'Slugs Typography', 'ohio' ),
                "name" => "breadcrumbs_text_typo",
                "type" => "ohio_typo",
                "instructions" => __( 'Set the typography and color for the breadcrumbs slugs.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59390deb03328",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "default_value" => "inherit",
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_59390deb04364",
                "label" => __( 'Footer', 'ohio' ),
                "name" => "",
                "type" => "tab",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "placement" => "top",
                "endpoint" => 0
            ],
            [
                "key" => "field_59321s81ebmod23",
                "label" => '<h4>' . __( 'General', 'ohio' ) . '</h4>',
                "name" => "",
                "type" => "message"
            ],
            [
                "key" => "field_59390deb06b99",
                "label" => __( 'Footer', 'ohio' ),
                "name" => "footer_visibility",
                "type" => "inherited_checkbox",
                "instructions" => __( 'Show the footer on this page.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "custom_labels" => [
                    "inherit" => __( 'Use from Theme Settings', 'ohio' ),
                    "yes" => __( 'Hide', 'ohio' ),
                    "no" => __( 'Show', 'ohio' )
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "inherit",
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_59390deb06fd1",
                "label" => __( 'Wrap Container', 'ohio' ),
                "name" => "footer_is_wrapped",
                "type" => "inherited_checkbox",
                "instructions" => __( 'Enable a wrap container, full-width layout is used when disabled.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "custom_labels" => [
                    "inherit" => __( 'Use from Theme Settings', 'ohio' ),
                    "yes" => "Enable wrapper",
                    "no" => "Disable wrapper"
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "inherit",
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_591b10db85823675",
                "label" => __( 'Side Gaps', 'ohio' ),
                "name" => "footer_full_width_margins_size",
                "type" => "text",
                "instructions" => __( 'Set the size of the side gaps for a full-width page layout.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "default_value" => "",
                "placeholder" => "",
                "prepend" => "",
                "append" => "",
                "maxlength" => 200
            ],
            [
                "key" => "field_59391743def2b",
                "label" => __( 'Sticky Footer', 'ohio' ),
                "name" => "footer_is_sticky",
                "type" => "inherited_checkbox",
                "instructions" => __( 'Set the footer to be stuck to the bottom of this page.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "custom_labels" => [
                    "inherit" => __( 'Use from Theme Settings', 'ohio' ),
                    "yes" => __( 'Yes', 'ohio' ),
                    "no" => __( 'No', 'ohio' )
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "inherit",
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_59390deb057c5grp",
                "label" => __( 'Background', 'ohio' ),
                "name" => "footer",
                "type" => "clone",
                "instructions" => __( 'Customize the footer background for this page.', 'ohio' ),
                "required" => false,
                "conditional_logic" => false,
                "clone" => [
                    "group_982e082a3bcfcf81b766eaa1ec2df4f11e0f5cd3"
                ],
                "display" => "group",
                "layout" => "block",
                "inherited_slug" => __( 'Use from Theme Settings', 'ohio' ),
                "prefix_label" => false,
                "prefix_name" => true
            ],
            [
                "key" => "field_5940ec917da19",
                "label" => __( 'Footer Typography', 'ohio' ),
                "name" => "footer_text_typo",
                "type" => "ohio_typo",
                "instructions" => __( 'Set the typography and color of elements in the footer area.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "default_value" => "inherit",
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_5937a0a521s81ebmod23",
                "label" => '<h4>' . __( 'Copyright Area', 'ohio' ) . '</h4>',
                "name" => "",
                "type" => "message"
            ],
            [
                "key" => "field_59390dsb07397",
                "label" => __( 'Copyright Area', 'ohio' ),
                "name" => "footer_copyright_visibility",
                "type" => "inherited_checkbox",
                "instructions" => __( 'Show the footer copyright area on this page.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "custom_labels" => [
                    "inherit" => __( 'Use from Theme Settings', 'ohio' ),
                    "yes" => __( 'Show', 'ohio' ),
                    "no" => __( 'Hide', 'ohio' )
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "inherit",
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_592fd8901f63agrppg",
                "label" => __( 'Background', 'ohio' ),
                "name" => "footer_copyright_section",
                "type" => "clone",
                "instructions" => __( 'Customize the copyright area background for this page.', 'ohio' ),
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
                "key" => "field_59390deb07b67",
                "label" => __( 'Content Typography', 'ohio' ),
                "name" => "footer_copyright_section_text_typo",
                "type" => "ohio_typo",
                "instructions" => __( 'Set the typography and color for copyright area text.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "default_value" => "inherit",
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_59390deb07b68",
                "label" => __( 'Links Typography', 'ohio' ),
                "name" => "footer_copyright_section_links_color",
                "type" => "ohio_color",
                "instructions" => __( 'Set the typography and color for copyright area links.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "default_value" => ""
            ],
            [
                "key" => "field_593afasf1ebmod23",
                "label" => '<h4>' . __( 'Other', 'ohio' ) . '</h4>',
                "name" => "",
                "type" => "message"
            ],
            [
                "key" => "field_59390deb07235235",
                "label" => __( 'Dark Section Mode', 'ohio' ),
                "name" => "footer_fixed_typography_color",
                "type" => "inherited_checkbox",
                "instructions" => __( 'Enable the dark section mode for the dynamically changing colors.', 'ohio' ) . '<br><em> ' . __( '(clb__dark_section class will be added to the footer area.)', 'ohio' ) . '</em>',
                "required" => 0,
                "conditional_logic" => 0,
                "custom_labels" => [
                    "inherit" => __( 'Use from Theme Settings', 'ohio' ),
                    "yes" => __( 'Yes', 'ohio' ),
                    "no" => __( 'No', 'ohio' )
                ],
                "message" => "",
                "default_value" => "inherit",
                "ui" => 1,
                "ui_on_text" => __( 'Yes', 'ohio' ),
                "ui_off_text" => __( 'No', 'ohio' )
            ],
            [
                "key" => "field_59390deb04788",
                "label" => __( 'Footer Logo', 'ohio' ),
                "name" => "footer_logo_widget_type",
                "type" => "select",
                "instructions" => __( 'Choose a footer logo variant to be displayed on this page.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "choices" => [
                    "inherit" => __( 'Use from Theme Settings', 'ohio' ),
                    "dark_variant" => __( 'Primary Logo', 'ohio' ),
                    "light_variant" => __( 'Inverse Logo', 'ohio' ),
                    "sitename" => __( 'Text Logo', 'ohio' ),
                    "custom" => __( 'Custom Image', 'ohio' )
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
                "key" => "field_5940dfabfe181",
                "label" => __( 'Text Logo', 'ohio' ),
                "name" => "footer_sitename_typo",
                "type" => "ohio_typo",
                "instructions" => __( 'Enter the name of your site and it will be used as a footer text logo.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59390deb04788",
                            "operator" => "==",
                            "value" => "sitename"
                        ]
                    ]
                ],
                "default_value" => "inherit",
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_5940dfeafe182",
                "label" => __( 'Custom Footer Image', 'ohio' ),
                "name" => "footer_custom_logo",
                "type" => "image",
                "instructions" => __( 'Upload a custom footer logo for this page.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59390deb04788",
                            "operator" => "==",
                            "value" => "custom"
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
                "key" => "field_59390deb07fa2",
                "label" => __( 'Custom CSS', 'ohio' ),
                "name" => "",
                "type" => "tab",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "placement" => "top",
                "endpoint" => 0
            ],
            [
                "key" => "field_5937e0a52b456smod951",
                "label" => "",
                "name" => "",
                "type" => "message",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "message" => '<p class="message"><i class="bi bi-question-circle"></i>' . __( 'Use custom CSS to customize specific elements. Note, you won\'t lose the following CSS after updating the theme.', 'ohio' ) . '</p>',
                "new_lines" => "",
                "esc_html" => 0
            ],
            [
                "key" => "field_59390deb083b5",
                "label" => __( 'Custom CSS', 'ohio' ),
                "name" => "custom_css",
                "type" => "ohio_code",
                "instructions" => __( 'Add custom CSS code for this page.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "default_value" => "",
                "language" => "css"
            ],
            [
                "key" => "field_592f32431234",
                "label" => __( 'Performance', 'ohio' ),
                "name" => "",
                "type" => "tab",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "placement" => "top",
                "endpoint" => 0
            ],
            [
                "key" => "field_592s32431234",
                "label" => '<h4>' . __( 'Icon Fonts', 'ohio' ) . '</h4>',
                "name" => "",
                "type" => "message"
            ],
            [
                "key" => "field_592s32431235",
                "label" => __( 'Font Awesome Icons', 'ohio' ),
                "name" => "icon_preloading_fontawesome",
                "type" => "inherited_checkbox",
                "instructions" => __( 'Enable Font Awesome pack preloading on this page.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "custom_labels" => [
                    "inherit" => __( 'Use from Theme Settings', 'ohio' ),
                    "yes" => __( 'Yes', 'ohio' ),
                    "no" => __( 'No', 'ohio' )
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "inherit",
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_592s32431236",
                "label" => __( 'Ionicons Icons', 'ohio' ),
                "name" => "icon_preloading_ionicons",
                "type" => "inherited_checkbox",
                "instructions" => __( 'Enable Ionicons pack preloading on this page.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "custom_labels" => [
                    "inherit" => __( 'Use from Theme Settings', 'ohio' ),
                    "yes" => __( 'Yes', 'ohio' ),
                    "no" => __( 'No', 'ohio' )
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "inherit",
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_592s32431237",
                "label" => __( 'Bootstrap Icons', 'ohio' ),
                "name" => "icon_preloading_bootstrap",
                "type" => "inherited_checkbox",
                "instructions" => __( 'Enable Bootstrap pack preloading on this page.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "custom_labels" => [
                    "inherit" => __( 'Use from Theme Settings', 'ohio' ),
                    "yes" => __( 'Yes', 'ohio' ),
                    "no" => __( 'No', 'ohio' )
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "inherit",
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_592s32431238",
                "label" => __( 'Linea Icons', 'ohio' ),
                "name" => "icon_preloading_linea",
                "type" => "inherited_checkbox",
                "instructions" => __( 'Enable Linea pack preloading on this page.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "custom_labels" => [
                    "inherit" => __( 'Use from Theme Settings', 'ohio' ),
                    "yes" => __( 'Yes', 'ohio' ),
                    "no" => __( 'No', 'ohio' )
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "inherit",
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_59390deb043641",
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
                "key" => "field_592s35f15af5g9l",
                "label" => '<h4>' . __( 'Social Media', 'ohio' ) . '</h4>',
                "name" => "",
                "type" => "message"
            ],
            [
                "key" => "field_l03249323443247",
                "label" => __( 'Social Media', 'ohio' ),
                "name" => "social_links_visibility",
                "type" => "inherited_checkbox",
                "instructions" => __( 'Show social media accounts on this page?', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "custom_labels" => [
                    "inherit" => __( 'Use from Theme Settings', 'ohio' ),
                    "yes" => __( 'Yes', 'ohio' ),
                    "no" => __( 'No', 'ohio' )
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "inherit",
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_l05mnk93kid43naf2l",
                "label" => __( 'Social Media Typography', 'ohio' ),
                "name" => "social_networks_typo",
                "type" => "ohio_typo",
                "instructions" => __( 'Set the typography and color for the breadcrumbs slugs.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_l03249323443247",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "default_value" => "inherit",
                "add_theme_inherited" => false
            ]
        ],
        "location" => [],
        "menu_order" => 3,
        "position" => "normal",
        "style" => "default",
        "label_placement" => "left",
        "instruction_placement" => "label",
        "hide_on_screen" => [
            "discussion",
            "comments",
            "author",
            "format"
        ],
        "active" => 1,
        "description" => ""
    ] );

endif;
