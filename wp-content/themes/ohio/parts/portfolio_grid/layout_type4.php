<?php
$project = OhioHelper::get_storage_item_data();

$featured_video = $project['video']['link'] ?? null;

if ( $featured_video ) {
    $featured_video_url = explode( '?', $featured_video )[0];
}

$video_button_style = $project['video_button_style'];
switch ( $video_button_style ) {
    case 'outlined':
        $video_button_style_class = ' -outlined';
        break;
    case 'blurred':
        $video_button_style_class = ' -blurred';
        break;
    default:
        $video_button_style_class = '';
}

$video_button_size = $project['video_button_size'];
switch ( $video_button_size ) {
    case 'small':
        $video_button_size_class = ' -small';
        break;
    case 'large':
        $video_button_size_class = ' -large';
        break;
    default:
        $video_button_size_class = '';
}

$fullscreen_mode = $project['fullscreen_mode'];
$fullscreen_class = '';

if ( $fullscreen_mode ) {
    $fullscreen_class .= ' -full-vh';
}

$parallax_data = '';
$tilt_effect = OhioOptions::get( 'portfolio_tilt_effect', true );
$tilt_perspective = OhioOptions::get( 'portfolio_tilt_effect_perspective', 6000 );

if ( $project['tilt_effect'] ) {
    $parallax_data = 'data-tilt=true data-tilt-perspective=' . $tilt_perspective  . '';
}

?>

<div class="portfolio-item -with-slider -layout4<?php echo esc_attr( $fullscreen_class ); ?>" <?php if ( $project['in_popup'] ) { echo ' data-portfolio-popup="' . esc_attr( $project['popup_id'] ) . '"'; } ?>>
    
    <?php if ( $featured_video && $project['show_featured_video'] ) : ?>

        <div class="portfolio-item-image -full-w -full-h">
            <?php if ( strpos( $featured_video_url, 'youtube.com' ) || strpos( $featured_video_url, 'youtu.be' ) || strpos( $featured_video_url, 'vimeo.com' ) ) : ?>
                <iframe src="<?php echo esc_url( $featured_video_url ) . '?&controls=0&autoplay=1&start=0&mute=1&muted=1&rel=0&autopause=0&loop=1'; ?>" frameborder="0"/></iframe>
            <?php else : ?>
                <video preload="metadata" muted="muted" autoplay="autoplay" loop="loop">
                    <source src="<?php echo esc_url( $featured_video_url ); ?>">
                </video>
            <?php endif; ?>
        </div>

    <?php else : ?>

        <div class="portfolio-item-image -full-w -full-h" <?php echo ' data-ohio-bg-image="' . esc_url( $project['featured_image'] ) . '"'; ?> <?php echo esc_attr( $parallax_data ); ?>></div>

    <?php endif; ?>

    <div class="project overlay">
        <div class="page-container">
            <div class="vc_col-md-8 project-content -left animated-holder">
                <?php if ( $featured_video && $project['show_video_button'] && !$project['show_featured_video'] ) : ?>
                    <div class="video-button -animation open-popup<?php echo esc_attr( $video_button_style_class ); ?>" data-video="<?php echo esc_url( $project['video']['link'] ); ?>">
                        <button class="icon-button<?php if ( $video_button_size != 'default' ) { echo ' -' . $video_button_size . ''; } ?>" aria-label="<?php esc_html_e( 'Play', 'ohio' ); ?>">
                            <i class="icon">
                                <svg class="default" width="13" height="20" viewBox="0 0 13 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 20L13 10L0 0V20Z"></path></svg>
                            </i>
                        </button>
                    </div>
                <?php endif; ?>

                <?php if ( $project['category_visible'] || $project['date_visible'] ) : ?>
                    <div class="headline-meta">
                        <?php if ( $project['category_visible'] ) : ?>
                        <span class="category-holder">
                            <?php foreach ( $project['raw_categories'] as $category ) : ?>
                                <span class="category <?php if ( isset( $category_class ) ) echo esc_attr( $category_class ); ?>"><a class="-unlink" href="<?php echo esc_url( get_term_link( $category->term_id ) ); ?>"><?php echo esc_html( $category->name ); ?></a></span>
                            <?php endforeach; ?>
                        </span>
                        <?php endif; ?>
                        <?php if ( $project['date_visible'] ) : ?>
                            <span class="date <?php if ( isset( $date_class ) ) echo esc_attr( $date_class ); ?>"><?php echo esc_html( $project['date'] ); ?></span>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <a class="project-title -undash -unlink" href="<?php echo esc_url( $project['url'] ); ?>"<?php if ( $project['external'] ) {
                    echo ' target="_blank"';
                } ?>>
                    <h2 class="headline <?php if ( isset( $title_class ) ) echo esc_attr( $title_class ); ?>"><?php echo esc_html( $project['title'] ); ?></h2>
                </a>

                <?php if ( $project['excerpt_visible'] ) : ?>
                    <div class="project-details">
                        <p><?php echo esc_html( $project['short_description'] ); ?></p>
                    </div>
                <?php endif; ?>

                <?php if ( $project['more_visible'] !== false ) : ?>
                    <a
						class="button -text -unlink <?php if ( $project['in_popup'] ) echo 'btn-lightbox '; if ( isset( $more_class ) ) echo esc_attr( $more_class ); ?>"
						href="<?php echo esc_url( $project['url'] ); ?>"
						<?php if ( $project['external'] ) echo ' target="_blank"'; ?>
						<?php if ( $project['in_popup'] ) echo ' data-js="open-project-lightbox"'; ?>
					>
                        <?php esc_html_e( 'Show Project', 'ohio' ); ?>
                        <i class="icon -right">
                            <svg class="default" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M646-442.5H170v-75h476L426.5-737l53.5-53 310 310-310 310-53.5-53L646-442.5Z"/></svg>
                        </i>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
