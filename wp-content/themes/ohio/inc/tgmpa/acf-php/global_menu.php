<?php if ( function_exists( 'acf_add_local_field_group' ) ) :

    acf_add_local_field_group( [
        "key" => "group_59229bda27se2",
        "title" => __( 'Menu Settings', 'ohio' ),
        "private" => true,
        "fields" => [
            [
                "key" => "field_59221bda313bf",
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
                "key" => "field_5937easfasf15",
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
                "key" => "field_59229bda3374d",
                "label" => __( 'Menu Type', 'ohio' ),
                "name" => "global_page_header_menu_type",
                "type" => "radio",
                "instructions" => __( 'Choose a menu type for your site.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "choices" => [
                    "full" => __( 'Standard', 'ohio' ),
                    "hamburger" => __( 'Hamburger', 'ohio' ),
                    "both" => __( 'Both Menus', 'ohio' )
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "full",
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_593s23s15af5g5tmod",
                "label" => '<h4>' . __( 'Standard Menu', 'ohio' ) . '</h4>',
                "name" => "",
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bda3374d",
                            "operator" => "!=",
                            "value" => "hamburger"
                        ]
                    ]
                ],
                "type" => "message"
            ],
            [
                "key" => "field_59229bda31ауеmod",
                "label" => __( 'Standard Menu', 'ohio' ),
                "name" => "global_page_extended_menu",
                "type" => "ohio_menu",
                "instructions" => __( 'Choose a standard menu to be displayed on the entire site. <br><em>Go to <a target="_blank" href="./nav-menus.php">Menus</a> to update or create a new menu.</em>', 'ohio' ),
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bda3374d",
                            "operator" => "!=",
                            "value" => "hamburger"
                        ]
                    ]
                ],
                "required" => 0,
                "default_value" => ""
            ],
            [
                "key" => "field_59374453f44415",
                "label" => __( 'Counter Symbols', 'ohio' ),
                "name" => "global_page_header_counters_visibility",
                "type" => "true_false",
                "instructions" => __( 'Show a counter number on each menu item.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bda3374d",
                            "operator" => "!=",
                            "value" => "hamburger"
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
                "key" => "field_59374453f44416",
                "label" => __( 'Multi-level Indicator', 'ohio' ),
                "name" => "global_page_header_indicator_visibility",
                "type" => "true_false",
                "instructions" => __( 'Show dropdown multi-level indicators (plus icons) on the first-level menu items.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bda3374d",
                            "operator" => "!=",
                            "value" => "hamburger"
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
                "key" => "field_59374452035867",
                "label" => __( 'Highlight Active Menu', 'ohio' ),
                "name" => "global_page_header_active_menu_highlight",
                "type" => "true_false",
                "instructions" => __( 'Highlight active menu items with the site\'s <a target="_blank" href="./admin.php?page=ohio_hub_settings&options_page=theme-appearance">Primary Color</a>.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bda3374d",
                            "operator" => "!=",
                            "value" => "hamburger"
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
                "key" => "field_593s23s15af5g9tmod",
                "label" => '<h4>' . __( 'Hamburger Menu', 'ohio' ) . '</h4>',
                "name" => "",
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bda3374d",
                            "operator" => "!=",
                            "value" => "full"
                        ]
                    ]
                ],
                "type" => "message"
            ],
            [
                "key" => "field_59229asf124а11ауеmod",
                "label" => __( 'Hamburger Menu', 'ohio' ),
                "name" => "global_page_hamburger_menu",
                "type" => "ohio_menu",
                "instructions" => __( 'Choose a hamburger menu to be displayed on the entire site. <br><em>Go to <a target="_blank" href="./nav-menus.php">Menus</a> to update or create a new menu.</em>', 'ohio' ),
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bda3374d",
                            "operator" => "!=",
                            "value" => "full"
                        ]
                    ]
                ],
                "required" => 0,
                "default_value" => ""
            ],
            [
                "key" => "field_5922sdg23509124",
                "label" => __( 'Hamburger Caption', 'ohio' ),
                "name" => "global_page_hamburger_menu_caption",
                "type" => "true_false",
                "instructions" => __( 'Show a hamburger menu caption.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bda3374d",
                            "operator" => "!=",
                            "value" => "full"
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
                "key" => "field_59229bsa31d56",
                "label" => __( 'Hamburger Position', 'ohio' ),
                "name" => "global_page_header_menu_position",
                "type" => "button_group",
                "instructions" => __( 'Choose a hamburger icon position for the entire site.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bda3374d",
                            "operator" => "!=",
                            "value" => "full"
                        ]
                    ]
                ],
                "choices" => [
                    "left" => __( '<i class="bi bi-text-left"></i> Left', 'ohio' ),
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
                "key" => "field_59229bda317s",
                "label" => __( 'Hamburger Menu Layout', 'ohio' ),
                "name" => "global_page_fullscreen_menu_style",
                "type" => "image_option",
                "instructions" => __( 'Choose a layout type for the hamburger menu.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bda3374d",
                            "operator" => "==",
                            "value" => "hamburger"
                        ]
                    ],
                    [
                        [
                            "field" => "field_59229bda3374d",
                            "operator" => "==",
                            "value" => "both"
                        ]
                    ]
                ],
                "image_option_value" => [
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
                "default_value" => "default"
            ],
            [
                "key" => "field_591ac509d12stglgbl64",
                "label" => __( 'Hamburger Menu Overlay', 'ohio' ),
                "name" => "global_page_header_overlay_menu",
                "type" => "clone",
                "instructions" => __( 'Customize the overlay color of the hamburger menu.', 'ohio' ),
                "required" => false,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bda3374d",
                            "operator" => "!=",
                            "value" => "full"
                        ],
                        [
                            "field" => "field_59229bda317ae",
                            "operator" => "!=",
                            "value" => "style3"
                        ],
                        [
                            "field" => "field_59229bda317ae",
                            "operator" => "!=",
                            "value" => "style4"
                        ],
                        [
                            "field" => "field_59229bda317ae",
                            "operator" => "!=",
                            "value" => "style5"
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
                "key" => "field_59229bda366f4md1",
                "label" => __( 'Overlay Details', 'ohio' ),
                "name" => "global_page_overlay_menu_footer_items_left",
                "type" => "repeater",
                "instructions" => __( 'Add a description for the hamburger menu details area.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bda3374d",
                            "operator" => "==",
                            "value" => "hamburger"
                        ]
                    ],
                    [
                        [
                            "field" => "field_59229bda3374d",
                            "operator" => "==",
                            "value" => "both"
                        ]
                    ]
                ],
                "collapsed" => "",
                "min" => 0,
                "max" => 3,
                "layout" => "table",
                "button_label" => __( '+ Add item', 'ohio' ),
                "sub_fields" => [
                    [
                        "key" => "field_59229bda6c954md3",
                        "label" => __( 'Items list', 'ohio' ),
                        "name" => "items",
                        "type" => "text",
                        "instructions" => "",
                        "required" => 0,
                        "conditional_logic" => 0,
                        "default_value" => "",
                        "placeholder" => "",
                        "prepend" => __( 'HTML allowed', 'ohio' ),
                        "append" => "",
                        "maxlength" => 2000
                    ]
                ]
            ],
            [
                "key" => "field_5922sdg2352agsdga",
                "label" => __( 'Social Accounts', 'ohio' ),
                "name" => "global_page_hamburger_social_networks_visibility",
                "type" => "true_false",
                "instructions" => __( 'Display social media accounts in the hamburger menu.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bda3374d",
                            "operator" => "!=",
                            "value" => "full"
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
                "key" => "field_59229bsa31d56asdasf",
                "label" => __( 'Social Accounts Icon Type', 'ohio' ),
                "name" => "global_page_hamburger_menu_social_networks_type",
                "type" => "select",
                "instructions" => __( 'Choose the type of the social media icons.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_5922sdg2352agsdga",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "choices" => [
                    "default" => "Default",
                    "contained" => "Contained",
					"outlined" => "Outlined",
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
                "key" => "field_5922sdg2352a23r",
                "label" => __( 'Language Switcher', 'ohio' ),
                "name" => "global_page_hamburger_lang_switcher_visibility",
                "type" => "true_false",
                "instructions" => __( 'Display a language switcher in the hamburger menu.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bda3374d",
                            "operator" => "!=",
                            "value" => "full"
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
                "key" => "field_5932305978235",
                "label" => '<h4>' . __( 'Styles', 'ohio' ) . '</h4>',
                "name" => "",
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bda3374d",
                            "operator" => "!=",
                            "value" => "full"
                        ]
                    ]
                ],
                "type" => "message"
            ],
            [
                "key" => "field_5922sdg23509125",
                "label" => __( 'Hamburger Caption Fill', 'ohio' ),
                "name" => "global_page_hamburger_menu_caption_background",
                "type" => "ohio_color",
                "instructions" => __( 'Set a background color for the hamburger menu caption.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_5922sdg23509124",
                            "operator" => "==",
                            "value" => 1
                        ]
                    ]
                ],
                "default_value" => ""
            ],
            [
                "key" => "field_59229lb2903857",
                "label" => __( 'Standard Menu Typography', 'ohio' ),
                "name" => "global_page_standard_menu_text_typo",
                "type" => "ohio_typo",
                "instructions" => __( 'Set the typography and color for the standard menu items.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bda3374d",
                            "operator" => "!=",
                            "value" => "hamburger"
                        ]
                    ]
                ],
            ],
            [
                "key" => "field_59229b2903l8534",
                "label" => __( 'Standard Submenu Typography', 'ohio' ),
                "name" => "global_page_standard_submenu_text_typo",
                "type" => "ohio_typo",
                "instructions" => __( 'Set the typography and color for the standard submenu items.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bda3374d",
                            "operator" => "!=",
                            "value" => "hamburger"
                        ]
                    ]
                ],
            ],
            [
                "key" => "field_59229bda33f44867i7a6",
                "label" => __( 'Hamburger Menu Typography', 'ohio' ),
                "name" => "global_page_fullscreen_menu_text_typo",
                "type" => "ohio_typo",
                "instructions" => __( 'Set the typography and color for the hamburger menu.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bda3374d",
                            "operator" => "!=",
                            "value" => "full"
                        ]
                    ]
                ],
            ],
            [
                "key" => "field_59229bda33f44867i7a6",
                "label" => __( 'Hamburger Menu Typography', 'ohio' ),
                "name" => "global_page_fullscreen_menu_text_typo",
                "type" => "ohio_typo",
                "instructions" => __( 'Set the typography and color for the hamburger menu.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bda3374d",
                            "operator" => "!=",
                            "value" => "full"
                        ]
                    ]
                ],
            ],
            [
                "key" => "field_59229bda33f4486ajlsjfn",
                "label" => __( 'Overlay Details Typography', 'ohio' ),
                "name" => "global_page_fullscreen_menu_details_text_typo",
                "type" => "ohio_typo",
                "instructions" => __( 'Set the typography and color for the hamburger menu details.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bda3374d",
                            "operator" => "!=",
                            "value" => "full"
                        ]
                    ]
                ],
            ],
            [
                "key" => "field_59229bda33f4486aasghaq",
                "label" => __( 'Overlay Social Accounts Typography', 'ohio' ),
                "name" => "global_page_fullscreen_menu_social_networks_typo",
                "type" => "ohio_typo",
                "instructions" => __( 'Set up typography for a hamburger menu social networks', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_5922sdg23509124",
                            "operator" => "==",
                            "value" => 1
                        ]
                    ]
                ],
            ],
            [
                "key" => "field_59221bd413bf",
                "label" => __( 'Mobile Menu', 'ohio' ),
                "name" => "",
                "type" => "tab",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "placement" => "top",
                "endpoint" => 0
            ],
            [
                "key" => "field_59229bda31iyhkv",
                "label" => __( 'Mobile Menu', 'ohio' ),
                "name" => "global_page_extended_mobile_menu",
                "type" => "ohio_menu",
                "instructions" => __( 'Choose a mobile menu to be displayed on the entire site. <br><em>Go to <a target="_blank" href="./nav-menus.php">Menus</a> to update or create a new menu.</em>', 'ohio' ),
                "conditional_logic" => 0,
                "required" => 0,
                "default_value" => ""
            ],
            [
                "key" => "field_59374453f124122346236",
                "label" => __( 'Initial Resolution', 'ohio' ),
                "name" => "global_page_mobile_menu_initial_resolution",
                "type" => "number",
                "instructions" => __( 'Set the initial resolution when the mobile menu appears.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "default_value" => "768",
                "placeholder" => "",
                "prepend" => "",
                "append" => "px",
                "min" => 1,
                "max" => 100000,
                "step" => ""
            ],
            [
                "key" => "field_59374453644162rfqeac",
                "label" => __( 'First-level Menu Items', 'ohio' ),
                "name" => "global_page_mobile_second_click_link",
                "type" => "true_false",
                "instructions" => __( 'Open the first-level mobile menu items as regular links.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 0,
                "ui" => 1,
                "ui_on_text" => __( 'Yes', 'ohio' ),
                "ui_off_text" => __( 'No', 'ohio' )
            ],
            [
                "key" => "field_59229bda33b33234fasgbgclrlcfpagjstglgbl64",
                "label" => __( 'Background', 'ohio' ),
                "name" => "global_page_mobile_header_menu",
                "type" => "clone",
                "instructions" => __( 'Customize the background color of the mobile menu.', 'ohio' ),
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
                "key" => "field_91235861985712",
                "label" => __( 'Overlay Details', 'ohio' ),
                "name" => "global_page_mobile_header_menu_details",
                "type" => "text",
                "instructions" => __( 'Add a description for the mobile menu details area.', 'ohio' ),
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
                "placeholder" => "",
                "prepend" => __( 'HTML allowed', 'ohio' ),
                "append" => "",
                "maxlength" => ""
            ],
            [
                "key" => "field_59229bsa3110874uj",
                "label" => __( 'Hamburger Position', 'ohio' ),
                "name" => "global_page_header_mobile_menu_position",
                "type" => "button_group",
                "instructions" => __( 'Choose a mobile hamburger icon position for the mobile menu.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "choices" => [
                    "left" => __( '<i class="bi bi-text-left"></i> Left', 'ohio' ),
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
                "key" => "field_593744536239587235",
                "label" => __( 'Menu Images', 'ohio' ),
                "name" => "global_page_mobile_menu_items_image",
                "type" => "true_false",
                "instructions" => __( 'Display images of the wide menu items on mobiles.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 0,
                "ui" => 1,
                "ui_on_text" => __( 'Yes', 'ohio' ),
                "ui_off_text" => __( 'No', 'ohio' )
            ],
            [
                "key" => "field_593744536239587236",
                "label" => __( 'Menu Descriptions', 'ohio' ),
                "name" => "global_page_mobile_menu_items_description",
                "type" => "true_false",
                "instructions" => __( 'Display descriptions of the wide menu items on mobiles.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 0,
                "ui" => 1,
                "ui_on_text" => __( 'Yes', 'ohio' ),
                "ui_off_text" => __( 'No', 'ohio' )
            ],
            [
                "key" => "field_5937445364416",
                "label" => __( 'Social Accounts', 'ohio' ),
                "name" => "global_page_mobile_social_networks_visibility",
                "type" => "true_false",
                "instructions" => __( 'Display social media accounts in the mobile menu.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 1,
                "ui" => 1,
                "ui_on_text" => __( 'Yes', 'ohio' ),
                "ui_off_text" => __( 'No', 'ohio' )
            ],
            [
                "key" => "field_593s34s15af5g9t",
                "label" => '<h4>' . __( 'Styles', 'ohio' ) . '</h4>',
                "name" => "",
                "type" => "message"
            ],
            [
                "key" => "field_59229bda36234d1",
                "label" => __( 'Mobile Menu Typography', 'ohio' ),
                "name" => "global_mobile_header_menu_typo",
                "type" => "ohio_typo",
                "instructions" => __( 'Set the typography and color for the mobile menu items.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0
            ],
            [
                "key" => "field_5941bd413bs",
                "label" => __( 'One Page Menu', 'ohio' ),
                "name" => "",
                "type" => "tab",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "placement" => "top",
                "endpoint" => 0
            ],
            [
                "key" => "field_59229bda3432amods",
                "label" => __( 'One Page Menu', 'ohio' ),
                "name" => "global_header_onepage_mode",
                "type" => "true_false",
                "instructions" => __( 'Enable a menu with anchors and sections for one-page sites.', 'ohio' ) . '<br><a target="_blank" href="https://docs.clbthemes.com/ohio/tips-tricks/#onepage_menu">' . __( 'Read the setup guide.', 'ohio' ) . '</a>',
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 0,
                "ui" => 1,
                "ui_on_text" => __( 'Yes', 'ohio' ),
                "ui_off_text" => __( 'No', 'ohio' )
            ]
        ],
        "location" => [
            [
                [
                    "param" => "options_page",
                    "operator" => "==",
                    "value" => "theme-general-menu"
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
