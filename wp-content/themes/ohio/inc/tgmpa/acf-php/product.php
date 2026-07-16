<?php if ( function_exists( 'acf_add_local_field_group' ) ) :

    acf_add_local_field_group( [
        "key" => "group_59390deae2279_product",
        "title" => __( 'Product Settings', 'ohio' ),
        "private" => true,
        "fields" => [
            [
                "key" => "field_59390deaekk1ee3d",
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
                "key" => "field_47272c6ed00aeask",
                "label" => __( 'Layout', 'ohio' ),
                "name" => "ecommerce_product_type",
                "type" => "image_option",
                "instructions" => __( 'Choose a single product layout for this page.', 'ohio' ),
                "conditional_logic" => 0,
                "default_value" => "inherit",
                "image_option_value" => [
                    [
                        "name" => "inherit",
                        "description" => __( 'Use from Theme Settings', 'ohio' ),
                        "src" => "acf__image_inherited.svg"
                    ],
                    [
                        "name" => "type1",
                        "description" => __( 'Sticky Gallery', 'ohio' ),
                        "src" => "acf__image_27.svg"
                    ],
                    [
                        "name" => "type2",
                        "description" => __( 'Sticky Gallery - Reflected', 'ohio' ),
                        "src" => "acf__image_26.svg"
                    ],
                    [
                        "name" => "type3",
                        "description" => __( 'Split Screen', 'ohio' ),
                        "src" => "acf__image_29.svg"
                    ],
                    [
                        "name" => "type4",
                        "description" => __( 'Split Screen - Reflected', 'ohio' ),
                        "src" => "acf__image_28.svg"
                    ],
                    [
                        "name" => "type5",
                        "description" => __( 'Classic Gallery', 'ohio' ),
                        "src" => "acf__image_49.svg"
                    ],
                    [
                        "name" => "type6",
                        "description" => __( 'Classic Gallery - Reflected', 'ohio' ),
                        "src" => "acf__image_50.svg"
                    ],
                    [
                        "name" => "type7",
                        "description" => __( 'Grid Gallery', 'ohio' ),
                        "src" => "acf__image_47.svg"
                    ],
                    [
                        "name" => "type8",
                        "description" => __( 'Grid Gallery - Reflected', 'ohio' ),
                        "src" => "acf__image_48.svg"
                    ]
                ]
            ],
            [
                "key" => "field_593dbedc5bqwee1",
                "label" => __( 'Double Width', 'ohio' ),
                "name" => "product_style_in_grid",
                "type" => "radio",
                "instructions" => __( 'Double the width of this product on the archive page.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "choices" => [
                    "default" => __( 'Default - 1-column wide', 'ohio' ),
                    "2col" => __( 'Wide - 2-columns wide', 'ohio' )
                ],
                "allow_null" => 0,
                "other_choice" => 0,
                "save_other_choice" => 0,
                "default_value" => "default",
                "layout" => "horizontal",
                "return_format" => "value"
            ],
            [
                "key" => "field_47271241245ype",
                "label" => __( 'Sticky Product', 'ohio' ),
                "name" => "woocommerce_product_sticky",
                "type" => "inherited_checkbox",
                "instructions" => __( 'Enable a sticky product bar for product pages.', 'ohio' ),
                "custom_labels" => [
                    "inherit" => __( 'Use from Theme Settings', 'ohio' ),
                    "yes" => __( 'Show', 'ohio' ),
                    "no" => __( 'Hide', 'ohio' )
                ],
                "default_value" => "inherit",
                "return_format" => "value",
                "layout" => "horizontal"
            ],
            [
                "key" => "field_593bf8f6d1893f",
                "label" => '<h4>' . __( 'Styles and Display', 'ohio' ) . '</h4>',
                "name" => "",
                "type" => "message"
            ],
            [
                "key" => "field_47271f141245ype",
                "label" => __( 'Sale Badge', 'ohio' ),
                "name" => "woocommerce_product_sale_tag",
                "type" => "inherited_checkbox",
                "instructions" => __( 'Show a sale badge on a single product.', 'ohio' ),
                "custom_labels" => [
                    "inherit" => __( 'Use from Theme Settings', 'ohio' ),
                    "yes" => __( 'Show', 'ohio' ),
                    "no" => __( 'Hide', 'ohio' )
                ],
                "default_value" => "inherit",
                "return_format" => "value",
                "layout" => "horizontal"
            ],
            [
                "key" => "field_eq2rf141245ype",
                "label" => __( 'SKU', 'ohio' ),
                "name" => "woocommerce_product_sku",
                "type" => "inherited_checkbox",
                "instructions" => __( 'Show a SKU (stock keeping unit) on a single product.', 'ohio' ),
                "custom_labels" => [
                    "inherit" => __( 'Use from Theme Settings', 'ohio' ),
                    "yes" => __( 'Show', 'ohio' ),
                    "no" => __( 'Hide', 'ohio' )
                ],
                "default_value" => "inherit",
                "return_format" => "value",
                "layout" => "horizontal"
            ],
            [
                "key" => "field_eqcat141245ype",
                "label" => __( 'Categories', 'ohio' ),
                "name" => "woocommerce_product_category",
                "type" => "inherited_checkbox",
                "instructions" => __( 'Show a categories list on a single product.', 'ohio' ),
                "custom_labels" => [
                    "inherit" => __( 'Use from Theme Settings', 'ohio' ),
                    "yes" => __( 'Show', 'ohio' ),
                    "no" => __( 'Hide', 'ohio' )
                ],
                "default_value" => "inherit",
                "return_format" => "value",
                "layout" => "horizontal"
            ],
            [
                "key" => "field_eqtag141245ype",
                "label" => __( 'Tags', 'ohio' ),
                "name" => "woocommerce_product_tags",
                "type" => "inherited_checkbox",
                "instructions" => __( 'Show a tags list on a single product.', 'ohio' ),
                "custom_labels" => [
                    "inherit" => __( 'Use from Theme Settings', 'ohio' ),
                    "yes" => __( 'Show', 'ohio' ),
                    "no" => __( 'Hide', 'ohio' )
                ],
                "default_value" => "inherit",
                "return_format" => "value",
                "layout" => "horizontal"
            ],
            [
                "key" => "field_vqkf4haf12422c",
                "label" => __( 'Title Typography', 'ohio' ),
                "name" => "page_woocommerce_single_product_title_typo",
                "type" => "ohio_typo",
                "instructions" => __( 'Set the typography and color for the product title.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_592f4aff124wen",
                "label" => __( 'Price Typography', 'ohio' ),
                "name" => "page_woocommerce_single_product_price_typo",
                "type" => "ohio_typo",
                "instructions" => __( 'Set the typography and color for the product price.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_qwr93f4hff12422b",
                "label" => __( 'Meta Typography', 'ohio' ),
                "name" => "page_woocommerce_single_product_meta_typo",
                "type" => "ohio_typo",
                "instructions" => __( 'Set the typography and color for the product meta.', 'ohio' ),
                "required" => 0,
                "conditional_logic" => 0,
                "add_theme_inherited" => false
            ],
            [
                "key" => "field_583be7a6d2429234",
                "label" => __( 'Related Products', 'ohio' ),
                "name" => "",
                "type" => "tab",
                "instructions" => "",
                "required" => 0,
                "conditional_logic" => 0,
                "placement" => "top",
                "endpoint" => 0
            ],
            [
                "key" => "field_eqtag141245ypeasdasf",
                "label" => __( 'Related Products', 'ohio' ),
                "name" => "woocommerce_product_related",
                "type" => "inherited_checkbox",
                "instructions" => __( 'Show a related products section below the single product area.', 'ohio' ),
                "custom_labels" => [
                    "inherit" => __( 'Use from Theme Settings', 'ohio' ),
                    "yes" => __( 'Show', 'ohio' ),
                    "no" => __( 'Hide', 'ohio' )
                ],
                "default_value" => "inherit",
                "return_format" => "value",
                "layout" => "horizontal"
            ],
            [
                "key" => "field_593k2039j234234",
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
                "key" => "field_59223095873",
                "label" => '<h4>' . __( 'Breadcrumbs', 'ohio' ) . '</h4>',
                "name" => "",
                "type" => "message"
            ],
            [
                "key" => "field_59390deb03328dsaf1v",
                "label" => __( 'Category Slug', 'ohio' ),
                "name" => "page_show_category_breadcrumbs",
                "type" => "inherited_checkbox",
                "instructions" => __( 'Show a category slug in the breadcrumbs structure on this page.', 'ohio' ),
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
        ],
        "location" => [
            [
                [
                    "param" => "post_type",
                    "operator" => "==",
                    "value" => "product"
                ]
            ]
        ],
        "menu_order" => 2,
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
