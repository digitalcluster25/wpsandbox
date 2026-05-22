<div
    id="<?php echo esc_attr( $wrapper_id ); ?>"
    class="marquee-line <?php echo implode( ' ', $wrapper_classes ); ?>"

    data-dir="<?php echo esc_attr( $direction ); ?>"
    data-speed="<?php echo esc_attr( $speed ); ?>"
    data-slow-on-scroll="<?php echo esc_attr( $slow_on_scroll ); ?>"
    <?php echo esc_attr( $animation_attrs ); ?>
>
    <div class="marquee-line-stage">
        <?php if ( $content_type === 'text' ): ?>
            <div
                class="marquee-line-el"
                data-marquee-el-original
            >
                <?php echo $text; ?>
            </div>
        <?php endif; ?>
        <?php foreach ( $images as $image ) : ?>
            <img
                class="marquee-line-el"
                data-marquee-el-original
                src="<?php echo esc_url( $image['url'] ); ?>"
                alt="<?php echo esc_attr( $image['alt'] ); ?>"
            />
        <?php endforeach; ?>
    </div>
</div>
