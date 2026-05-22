<div
    class="marquee-line"
    data-dir="<?php echo esc_attr( $settings['direction'] ); ?>"
    data-speed="<?php echo esc_attr( $settings['speed'] ); ?>"
    data-slow-on-scroll="<?php echo $settings['slow_on_scroll'] === 'yes'; ?>"
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
                alt=""
            />
        <?php endforeach; ?>
    </div>
</div>
