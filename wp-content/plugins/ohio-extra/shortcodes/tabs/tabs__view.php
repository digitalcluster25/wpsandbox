<?php

/**
* WPBakery Page Builder Ohio Tabs shortcode view
*/

?>
<div class="ohio-widget tabs<?php echo esc_attr( $wrapper_classes ); ?>" id="<?php echo esc_attr( $wrapper_id ); ?>" data-ohio-tabs="true" <?php echo esc_attr( $animation_attrs ); ?>>
    <ul class="tabs-nav -unlist" role="tablist">
        <li class="tabs-nav-line" role="tab"></li>
    </ul>
    <div class="tabs-content">
        <?php echo do_shortcode( $content ); ?>
    </div>
</div>