<?php if ( function_exists( 'acf_add_local_field_group' ) ) :

    acf_add_local_field_group( [
        "key" => "group_5946360ak373c5j",
        "title" => __( 'Performance Settings', 'ohio' ),
        "private" => true,
        "fields" => [
            [
                "key" => "field_542244d4343ch",
                "label" => __( 'Options Cache', 'ohio' ),
                "name" => "",
                "type" => "tab",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "placement" => "top",
                "endpoint" => 0
            ],
            [
                "key" => "field_592fe13500cch",
                "label" => __( 'Options Cache', 'ohio' ),
                "name" => "global_options_cache",
                "type" => "true_false",
                "instructions" => __( 'Enable options caching to reduce the number of requests, thereby speeding up your site. Disable the option to reset and stop caching.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 0,
                "ui" => 1,
                "ui_on_text" => __( 'Yes', 'ohio' ),
                "ui_off_text" => __( 'No', 'ohio' )
            ],
            [
                "key" => "field_542244d43445",
                "label" => __( 'Icon Fonts', 'ohio' ),
                "name" => "",
                "type" => "tab",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "placement" => "top",
                "endpoint" => 0
            ],
            [
                "key" => "field_592fe135081462",
                "label" => __( 'Font Awesome Icons', 'ohio' ),
                "name" => "global_page_icon_preloading_fontawesome",
                "type" => "true_false",
                "instructions" => __( 'Enable Font Awesome pack preloading on the entire site.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 1,
                "ui" => 1,
                "ui_on_text" => __( 'Yes', 'ohio' ),
                "ui_off_text" => __( 'No', 'ohio' )
            ],
            [
                "key" => "field_592fe135081463",
                "label" => __( 'Ionicons Icons', 'ohio' ),
                "name" => "global_page_icon_preloading_ionicons",
                "type" => "true_false",
                "instructions" => __( 'Enable Ionicons pack preloading on the entire site.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 0,
                "ui" => 1,
                "ui_on_text" => __( 'Yes', 'ohio' ),
                "ui_off_text" => __( 'No', 'ohio' )
            ],
            [
                "key" => "field_592fe135081464",
                "label" => __( 'Bootstrap Icons', 'ohio' ),
                "name" => "global_page_icon_preloading_bootstrap",
                "type" => "true_false",
                "instructions" => __( 'Enable Bootstrap pack preloading on the entire site.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "message" => "",
                "default_value" => 0,
                "ui" => 1,
                "ui_on_text" => __( 'Yes', 'ohio' ),
                "ui_off_text" => __( 'No', 'ohio' )
            ],
            [
                "key" => "field_592fe135081465",
                "label" => __( 'Linea Icons', 'ohio' ),
                "name" => "global_page_icon_preloading_linea",
                "type" => "true_false",
                "instructions" => __( 'Enable Linea pack preloading on the entire site.', 'ohio' ),
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
                    "value" => "theme-general-performance"
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
