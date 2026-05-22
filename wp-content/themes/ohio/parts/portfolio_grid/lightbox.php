<?php
    $project = OhioHelper::get_storage_item_data();

    if ( is_array( $project['images_full'] ) && count( $project['images_full'] ) > 0 ) {
        $project['images'] = $project['images_full'];
    }

    $is_feature_as_gallery = isset( $project['images'][0] )
        && $project['featured_image_full'] == $project['images'][0]['url'];

    $show_featured_image = $project['featured_as_gallery_item'];

    if ( $project['is_featured_image'] ) {
        if ( !$show_featured_image ) {
            array_shift( $project['images'] );
        }
    }

    $has_video_in_lightbox = !empty( $project['video']['link'] ) && $project['video']['show_in_lightbox'];
    $is_slider = count( $project['images'] ) > 1
        || ( count( $project['images'] ) === 1 && ! $is_feature_as_gallery )
        || ( count( $project['images'] ) && $has_video_in_lightbox );


    $show_description = OhioOptions::get_global( 'portfolio_gallery_description', true );
    $show_details = OhioOptions::get_global( 'portfolio_gallery_details', true );
    $show_view_text = OhioOptions::get_global( 'portfolio_lightbox_link', true );
    $view_text = OhioOptions::get_global( 'portfolio_lightbox_link_text', 'View Project' );
    $navigation_visibility = OhioOptions::get_global( 'lightbox_nav_visibility', true );
    $bullets_visibility = OhioOptions::get_global( 'lightbox_bullets_visibility', true );
    $bullets_type = OhioOptions::get_global( 'lightbox_bullets_type', 'default' );
    $loop_mode = OhioOptions::get_global( 'lightbox_loop_mode', true );
    $autoplay_mode = OhioOptions::get_global( 'lightbox_autoplay_mode', true );
    $autoplay_interval = OhioOptions::get_global( 'lightbox_autoplay_interval', 5000 );
    $mousewheel_scrolling = OhioOptions::get_global( 'lightbox_mousewheel_mode', true );

    if ( $project ) :

?>
<div class="clb-popup project-lightbox" id="<?php echo esc_attr( $project['popup_id'] ); ?>" data-lazy-to-footer="true">
    <div class="project-lightbox-gallery">
        <div class="slider -slider-lightbox<?php if ( $bullets_type == 'boxed' ) echo esc_html( ' -with-boxed-pagination' ); ?>" <?php $is_slider ? esc_attr_e('data-clb-portfolio-lightbox-slider', 'ohio') : '' ?> data-slider-navigation="<?php echo esc_attr( $navigation_visibility); ?>" data-slider-pagination="<?php echo esc_attr( $bullets_visibility); ?>" data-slider-loop="<?php echo esc_attr( $loop_mode); ?>" data-slider-mousescroll="<?php echo esc_attr( $mousewheel_scrolling); ?>" data-slider-autoplay="<?php echo esc_attr( $autoplay_mode); ?>" data-slider-autoplay-time="<?php echo esc_attr( $autoplay_interval); ?>" data-slider-autoplay-pause="">
        
            <?php if ( $has_video_in_lightbox ) : ?>
                <div class="portfolio-lightbox-video" data-lightbox-video-url="<?php echo esc_url( $project['video']['link'] ); ?>">
                    <?php if ( in_array( $project['video']['type'], ['youtube', 'vimeo'])) : ?>
                        <iframe data-lightbox-video-target frameborder="0"/></iframe>
                    <?php else : ?>
                        <video data-lightbox-video-target autoplay muted loop></video>
                    <?php endif; ?>

                    <div class="overlay"></div>
                </div>
            <?php endif; ?>

            <?php if ( $project['images'] ) :  ?>
                <?php foreach ( $project['images'] as $i => $art ) : ?>
                    <div class="portfolio-lightbox-image" <?php echo ' data-ohio-lightbox-image="' . esc_url( $art['url'] ) . '"'; ?>></div>
                <?php endforeach; ?>
            <?php else : ?>
                <div class="portfolio-lightbox-image" <?php echo ' data-ohio-lightbox-image="' . $project['featured_image'] . '"'; ?>></div>
            <?php endif; ?>
        </div>
    </div>
    <div class="project-lightbox-details">
        <div class="close-bar -flex-just-end">
            <button class="icon-button -light" data-js="close-popup" aria-label="<?php esc_html_e( 'Close', 'ohio' ); ?>">
                <?php get_template_part( 'parts/elements/icon_close' ); ?>
            </button>
        </div>
        <div class="project-content animated-holder">
            <div class="headline-meta">
                <?php if ( OhioOptions::get_global( 'lightbox_category_visibility' ) ) : ?>
                    <?php if ( $project['raw_categories'] ) : ?>
                        <div class="category-holder">
                            <?php foreach ( $project['raw_categories'] as $category ) : ?>
                                <span class="category"><a class="-unlink" href="<?php echo esc_url( get_term_link( $category->term_id ) ); ?>"><?php echo esc_html( $category->name ); ?></a></span>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>

                <?php if ( OhioOptions::get_global( 'lightbox_date_visibility' ) ) : ?>
                    <span class="date"><?php echo esc_html( $project['date'] ); ?></span>
                <?php endif; ?>
            </div>
            <div class="project-title">
                <h2 class="headline title">
                    <?php echo esc_html( $project['title'] ); ?>
                </h2>   
            </div>
            <?php if ( $show_description ) : ?>
                <div class="project-details">
                    <p>
                        <?php $project['short_lightbox_description'] = strip_tags( $project['short_lightbox_description'] ); ?>
                        <?php echo wp_kses( $project['short_lightbox_description'], 'post' ); ?>
                    </p>
                </div>
            <?php endif; ?>
            <?php if ( $show_details ) : ?>
                <ul class="project-meta options-group -unlist">

                    <?php if ( $project['strategy'] ) : ?>
                        <li>
                            <h6 class="title"><?php esc_html_e( 'Strategy', 'ohio' ); ?></h6>
                            <p><?php echo wp_kses( $project['strategy'], 'default' ); ?></p>
                        </li>
                    <?php endif; ?>

                    <?php if ( $project['design'] ) : ?>
                        <li>
                            <h6 class="title"><?php esc_html_e( 'Design', 'ohio' ); ?></h6>
                            <p><?php echo wp_kses( $project['design'], 'default' ); ?></p>
                        </li>
                    <?php endif; ?>

                    <?php if ( $project['client'] ) : ?>
                        <li>
                            <h6 class="title"><?php esc_html_e( 'Client', 'ohio' ); ?></h6>
                            <p><?php echo wp_kses( $project['client'], 'default' ); ?></p>
                        </li>
                    <?php endif; ?>

                    <?php if ( $project['custom_fields'] ) : ?>
                        <?php foreach ( $project['custom_fields'] as $custom_field ) : ?>
                        <li>
                            <h6 class="title"><?php echo esc_html( $custom_field['title'] ); ?></h6>
                            <p><?php echo esc_html( $custom_field['value'] ); ?></p>
                        </li>
                        <?php endforeach; ?>
                    <?php endif; ?>

                    <?php if ( $project['raw_tags'] ) { ?>
                        <li>
                            <h6 class="title"><?php esc_html_e( 'Tags', 'ohio' ); ?></h6>
                            <p>
                                <?php if ( $project['raw_tags'] ) : ?>
                                    <?php foreach ( $project['raw_tags'] as $i => $tag ) : ?>
                                        <a href="<?php echo esc_url( get_term_link( $tag->term_id ) ); ?>"><?php echo esc_html( $tag->name ); ?></a><?php
                                            if ( $i < count( $project['raw_tags']) - 1 ) echo ', ';
                                        ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </p>
                        </li>
                    <?php } ?>
                </ul>
            <?php endif; ?>

            <?php if ( $show_view_text ) : ?>
                <a class="button -text -unlink" href="<?php echo esc_url( $project['url'] ); ?>"<?php echo esc_attr( $project['external'] ) ? ' target="_blank"' : ''?>>
                    <?php echo esc_html( $view_text, 'ohio' ); ?>
                    <i class="icon -right">
                        <svg class="default" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M646-442.5H170v-75h476L426.5-737l53.5-53 310 310-310 310-53.5-53L646-442.5Z"/></svg>
                    </i>
                </a>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php endif;