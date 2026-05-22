<?php

/**
* WPBakery Page Builder Ohio Vertical Fullscreen Slider shortcode view
*/

?>
<div class="ohio-widget portfolio-onepage-slider slider autoheight -slider-fs -slider-vertical clb-slider-scroll-bar<?php echo esc_attr( $wrapper_classes ); ?>" id="<?php echo esc_attr( $wrapper_id ); ?>" data-fullscreen-slider="true" data-options='<?php echo $onepage_json; ?>'>
	<?php echo do_shortcode( $content ); ?>
</div>
<div class="scroll-bar-container">
    <div class="scroll-top slider-scroll-label vc_hidden-md vc_hidden-sm vc_hidden-xs">
        <div class="scroll-top-bar">
            <div class="scroll-track"></div>
        </div>
        <div class="scroll-top-holder titles-typo">
            <?php esc_html_e( 'Scroll', 'ohio-extra' ); ?>
        </div>
    </div>  
</div>