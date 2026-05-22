<?php if ( function_exists( 'acf_add_local_field_group' ) ) :

    acf_add_local_field_group( [
        "key" => "group_592d60af343c5",
        "title" => __( 'General Settings', 'ohio' ),
        "private" => true,
        "fields" => [
            [
                "key" => "field_54229ad4313bf",
                "label" => __( 'Logo', 'ohio' ),
                "name" => "",
                "type" => "tab",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "placement" => "top",
                "endpoint" => 0
            ],
            [
                "key" => "field_59229bda32383",
                "label" => __( 'Logo Type', 'ohio' ),
                "name" => "global_page_header_logo_style",
                "type" => "radio",
                "instructions" => __( 'Choose a logo type for your site.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "choices" => [
                    "sitename" => __( 'Text', 'ohio' ),
                    "image" => __( 'Image', 'ohio' )
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "sitename",
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_5937e3a52b38cexmod15",
                "label" => __( 'Text Logo', 'ohio' ),
                "name" => "global_page_header_logo_text",
                "type" => "text",
                "instructions" => __( 'Enter the name of your site and it will be used as a text logo.', 'ohio' ),
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bda32383",
                            "operator" => "==",
                            "value" => "sitename"
                        ]
                    ]
                ],
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_59256ac3f42ec",
                "label" => __( 'Text Logo Typography', 'ohio' ),
                "name" => "global_page_header_sitename_typo",
                "type" => "ohio_typo",
                "instructions" => __( 'Set the typography and color for the text logo.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bda32383",
                            "operator" => "==",
                            "value" => "sitename"
                        ]
                    ]
                ],
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_5936add283a9a",
                "label" => __( 'Primary Logo', 'ohio' ),
                "name" => "global_page_header_logo_image_dark_variant",
                "type" => "clone",
                "instructions" => __( 'Upload the primary logo variant.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bda32383",
                            "operator" => "==",
                            "value" => "image"
                        ]
                    ]
                ],
                "clone" => [
                    "field_5936af24f4b7e",
                    "field_5936afd421bba",
                    "field_5936affb21bbb"
                ],
                "display" => "group",
                "layout" => "table",
                "prefix_label" => 0,
                "prefix_name" => 0
            ],
            [
                "key" => "field_59229bda32f63",
                "label" => __( 'Inverse Logo', 'ohio' ),
                "name" => "global_page_header_logo_image",
                "type" => "clone",
                "instructions" => __( 'Upload the inverse logo variant (is used for the dark mode and dark tone sections).', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bda32383",
                            "operator" => "==",
                            "value" => "image"
                        ]
                    ]
                ],
                "clone" => [
                    "field_5936b2dd92771",
                    "field_5936b357132bf",
                    "field_5936b371132c0"
                ],
                "display" => "group",
                "layout" => "table",
                "prefix_label" => 0,
                "prefix_name" => 0
            ],
            [
                "key" => "field_5937e1905d075",
                "label" => __( 'Default Logo', 'ohio' ),
                "name" => "global_page_header_logo_by_default",
                "type" => "select",
                "instructions" => __( 'Choose the default logo variant to be displayed on the entire site.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bda32383",
                            "operator" => "==",
                            "value" => "image"
                        ]
                    ]
                ],
                "choices" => [
                    "dark_variant" => __( 'Primary Logo', 'ohio' ),
                    "light_variant" => __( 'Inverse Logo', 'ohio' )
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "dark_variant",
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_5937e3a52aouhfasuf9892",
                "label" => __( 'Logo Height', 'ohio' ),
                "name" => "global_page_header_logo_height",
                "type" => "ohio_responsive_height",
                "instructions" => __( 'Set a height for the default logo.', 'ohio' ),
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bda32383",
                            "operator" => "==",
                            "value" => "image"
                        ]
                    ]
                ],
                "append" => "px"
            ],
            [
                "key" => "field_5937e1905d075_fixed",
                "label" => __( 'Secondary Logo', 'ohio' ),
                "name" => "global_page_header_logo_when_fixed",
                "type" => "select",
                "instructions" => __( 'Choose the secondary logo variant to be displayed on the sticky header.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bda32383",
                            "operator" => "==",
                            "value" => "image"
                        ]
                    ]
                ],
                "choices" => [
                    "inherit" => __( 'Default', 'ohio' ),
                    "dark_variant" => __( 'Primary Logo', 'ohio' ),
                    "light_variant" => __( 'Inverse Logo', 'ohio' ),
                    "custom" => __( 'Custom Image', 'ohio' )
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "inherit",
                "layout" => "vertical",
                "return_format" => "value"
            ],
            [
                "key" => "field_5936add283a9a_fix",
                "label" => __( 'Secondary Logo', 'ohio' ),
                "name" => "global_page_header_logo_image_fixed_variant",
                "type" => "clone",
                "instructions" => __( 'Upload the secondary logo variant.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_5937e1905d075_fixed",
                            "operator" => "==",
                            "value" => "custom"
                        ]
                    ]
                ],
                "clone" => [
                    "field_5936af24f4b7e_fix",
                    "field_5936afd421bba_fix",
                    "field_5936affb21bbb_fix",
                ],
                "display" => "group",
                "layout" => "table",
                "prefix_label" => 0,
                "prefix_name" => 0
            ],
            [
                "key" => "field_5936add283a9a123",
                "label" => __( 'Secondary Inverse Logo', 'ohio' ),
                "name" => "global_page_header_logo_image_fixed_variant_inverse",
                "type" => "clone",
                "instructions" => __( 'Upload the secondary inverse logo variant (is used for the dark mode and dark tone sections).', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_5937e1905d075_fixed",
                            "operator" => "==",
                            "value" => "custom"
                        ]
                    ]
                ],
                "clone" => [
                    "field_5936af24f4b7e242",
                    "field_5936af24f4b7e243",
                    "field_5936af24f4b7e244"
                ],
                "display" => "group",
                "layout" => "table",
                "prefix_label" => 0,
                "prefix_name" => 0
            ],
            [
                "key" => "field_5937e3a52253o525",
                "label" => __( 'Secondary Logo Height', 'ohio' ),
                "name" => "global_page_sticky_header_logo_height",
                "type" => "ohio_responsive_height",
                "instructions" => __( 'Set a height for the sticky logo.', 'ohio' ),
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_59229bda32383",
                            "operator" => "==",
                            "value" => "image"
                        ]
                    ]
                ],
                "append" => "px"
            ],
            [
                "key" => "field_54224ad4313bs",
                "label" => __( 'Preloader', 'ohio' ),
                "name" => "",
                "type" => "tab",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "placement" => "top",
                "endpoint" => 0
            ],
            [
                "key" => "field_591ac509d3e51",
                "label" => __( 'Preloader', 'ohio' ),
                "name" => "global_page_preloader_visibility",
                "type" => "true_false",
                "instructions" => __( 'Show the loading screen before the site content is loaded.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 0,
                "ui" => 1,
                "ui_on_text" => __( 'Yes', 'ohio' ),
                "ui_off_text" => __( 'No', 'ohio' )
            ],
            [
                "key" => "field_5937e3a3234324234",
                "label" => __( 'Spinner ', 'ohio' ),
                "name" => "global_page_preloader_type",
                "type" => "image_option",
                "instructions" => __( 'Choose the type of the preloader animation.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_591ac509d3e51",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "default_value" => "classic_circle",
                "image_option_value" => [
                    [
                        "name" => "classic_circle",
                        "description" => __( 'Classic Spinner', 'ohio' ),
                        "src" => "acf__image_preloader1.svg"
                    ],
                    [
                        "name" => "circle",
                        "description" => __( 'Circle Spinner', 'ohio' ),
                        "src" => "acf__image_preloader2.svg"
                    ],
                    [
                        "name" => "waves",
                        "description" => __( 'Waves', 'ohio' ),
                        "src" => "acf__image_preloader3.svg"
                    ],
                    [
                        "name" => "double_bounce",
                        "description" => __( 'Double Bounce', 'ohio' ),
                        "src" => "acf__image_preloader4.svg"
                    ],
                    [
                        "name" => "folding_cube",
                        "description" => __( 'Folding Cube', 'ohio' ),
                        "src" => "acf__image_preloader5.svg"
                    ],
                    [
                        "name" => "percentage",
                        "description" => __( 'Percentage', 'ohio' ),
                        "src" => "acf__image_preloader6.svg"
                    ],
                    [
                        "name" => "custom_loader",
                        "description" => __( 'Custom Image', 'ohio' ),
                        "src" => "acf__image_custom.svg"
                    ]
                ],
                "new_lines" => "",
                "esc_html" => 0
            ],
            [
                "key" => "field_5rqsf22dd92771",
                "label" => __( 'Custom Spinner', 'ohio' ),
                "name" => "global_custom_page_preloader",
                "type" => "image",
                "instructions" => __( 'Upload a custom spinner (preloader image) for the preloading animation.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_5937e3a3234324234",
                            "operator" => "==",
                            "value" => "custom_loader"
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
                "key" => "field_59381c77504b2r2e1",
                "label" => __( 'Page Transition', 'ohio' ),
                "name" => "global_page_fade_in_animation",
                "type" => "true_false",
                "instructions" => __( 'Add a fade-in transition effect for page loading.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_591ac509d3e51",
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
                "key" => "field_592s35f15afwe235",
                "label" => '<h4>' . __( 'Styles', 'ohio' ) . '</h4>',
                "name" => "",
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_591ac509d3e51",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "type" => "message"
            ],
            [
                "key" => "field_592d5938aee39",
                "label" => __( 'Spinner Color', 'ohio' ),
                "name" => "global_page_preloader_shapes_color",
                "type" => "ohio_color",
                "instructions" => __( 'Set the color of the preloader animation shape.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_591ac509d3e51",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "default_value" => ""
            ],
            [
                "key" => "field_592d4579aee38",
                "label" => __( 'Background Color<mark></mark>', 'ohio' ),
                "name" => "global_page_preloader_background",
                "type" => "ohio_color",
                "instructions" => __( 'Set the background color for the preloader page.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_591ac509d3e51",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "default_value" => ""
            ],
            [
                "key" => "field_54224ad4316bf",
                "label" => __( 'Cursor', 'ohio' ),
                "name" => "",
                "type" => "tab",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "placement" => "top",
                "endpoint" => 0
            ],
            [
                "key" => "field_591ac509d3se52",
                "label" => __( 'Custom Cursor', 'ohio' ),
                "name" => "global_page_custom_cursor",
                "type" => "true_false",
                "instructions" => __( 'Enable the custom mouse cursor for the entire site.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 0,
                "ui" => 1,
                "ui_on_text" => __( 'Yes', 'ohio' ),
                "ui_off_text" => __( 'No', 'ohio' )
            ],
            [
                "key" => "field_591ac5sf8a9",
                "label" => '<h4>' . __( 'Styles', 'ohio' ) . '</h4>',
                "name" => "",
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_591ac509d3se52",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
                "type" => "message"
            ],
            [
                "key" => "field_591ac509d3se52cl",
                "label" => __( 'Cursor Color', 'ohio' ),
                "name" => "global_page_custom_cursor_color",
                "type" => "ohio_color",
                "instructions" => __( 'Set the custom mouse cursor background and border color.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_591ac509d3se52",
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
                "key" => "field_591b0f30ed84e",
                "label" => "Scroll to Top",
                "name" => "",
                "type" => "tab",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "placement" => "top",
                "endpoint" => 0
            ],
            [
                "key" => "field_591ac509d4234",
                "label" => __( 'Scroll to Top', 'ohio' ),
                "name" => "global_page_show_arrow",
                "type" => "true_false",
                "instructions" => __( 'Show the scroll to top button on the entire site.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 1,
                "ui" => 1,
                "ui_on_text" => __( 'Yes', 'ohio' ),
                "ui_off_text" => __( 'No', 'ohio' )
            ],
            [
                "key" => "field_591ac509d4236",
                "label" => __( 'Scroll to Top (Mobile)', 'ohio' ),
                "name" => "global_page_show_arrow_tablet",
                "type" => "true_false",
                "instructions" => __( 'Show the scroll to top on mobile devices.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_591ac509d4234",
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
                "key" => "field_5937e1905d075d24",
                "label" => __( 'Button Position', 'ohio' ),
                "name" => "global_page_arrow_position",
                "type" => "button_group",
                "instructions" => __( 'Choose the scroll to top button position for the entire site.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_591ac509d4234",
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
                "default_value" => "left",
                "allow_null" => 0,
                "multiple" => 0,
                "ui" => 0,
                "layout" => "horizontal",
                "ajax" => 0,
                "return_format" => "value",
                "placeholder" => ""
            ],
            [
                "key" => "field_592s35f15af5g9t",
                "label" => '<h4>' . __( 'Styles', 'ohio' ) . '</h4>',
                "name" => "",
                "type" => "message"
            ],
            [
                "key" => "field_591ac509d465a",
                "label" => __( 'Button Typography', 'ohio' ),
                "name" => "global_page_arrow_typo",
                "type" => "ohio_typo",
                "instructions" => __( 'Set the typography and color for the scroll to top button.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_591ac509d4234",
                            "operator" => "==",
                            "value" => "1"
                        ]
                    ]
                ],
            ],
            [
                "key" => "field_59373463k152f346",
                "label" => __( 'Search', 'ohio' ),
                "name" => "",
                "type" => "tab",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "placement" => "top",
                "endpoint" => 0
            ],
            [
                "key" => "field_592d43df9e26c",
                "label" => __( 'Search', 'ohio' ),
                "name" => "global_page_header_search_visibility",
                "type" => "true_false",
                "instructions" => __( 'Enable the search feature on the entire site.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 1,
                "ui" => 1,
                "ui_on_text" => "",
                "ui_off_text" => ""
            ],
            [
                "key" => "field_592d43df9e212c",
                "label" => __( 'Search Type', 'ohio' ),
                "name" => "global_page_header_search_type",
                "type" => "radio",
                "instructions" => __( 'Choose between standard WordPress and WooCommerce search types.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_592d43df9e26c",
                            "operator" => "==",
                            "value" => 1
                        ]
                    ]
                ],
                "choices" => [
                    "simple" => __( 'Standard WordPress', 'ohio' ),
                    "woo" => __( 'WooCommerce AJAX', 'ohio' )
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "full",
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_592d43df9f212c",
                "label" => __( 'Search Icon Position', 'ohio' ),
                "name" => "global_page_header_search_position",
                "type" => "radio",
                "instructions" => __( 'Choose the search icon position for the entire site.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_592d43df9e26c",
                            "operator" => "==",
                            "value" => 1
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
                "default_value" => "standard",
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_592203597823",
                "label" => '<h4>' . __( 'Styles', 'ohio' ) . '</h4>',
                "name" => "",
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_592d43df9f212c",
                            "operator" => "==",
                            "value" => "fixed"
                        ]
                    ]
                ],
                "type" => "message"
            ],
            [
                "key" => "field_59267bda33fg234fd4",
                "label" => __( 'Search Icon Color', 'ohio' ),
                "name" => "global_page_header_search_color",
                "type" => "ohio_color",
                "instructions" => __( 'Set the color of the search icon.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => [
                    [
                        [
                            "field" => "field_592d43df9f212c",
                            "operator" => "==",
                            "value" => "fixed"
                        ]
                    ]
                ],
                "default_value" => ""
            ]
        ],
        "location" => [
            [
                [
                    "param" => "options_page",
                    "operator" => "==",
                    "value" => "theme-general"
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
