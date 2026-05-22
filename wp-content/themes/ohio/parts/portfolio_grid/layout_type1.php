<?php
$project = OhioHelper::get_storage_item_data();

$featured_video = $project['video']['link'] ?? null;

if ( $featured_video ) {
    $featured_video_url = explode( '?', $featured_video )[0];
}

$wrapper_classes = '';

if ( $project['equal_height'] ) {
    $wrapper_classes .= ' -metro';
}
if ( $project['drop_shadow'] ) {
    $wrapper_classes .= ' -with-shadow';
}
if ( $project['boxed'] ) {
    $wrapper_classes .= ' -contained';
}
if ( is_array( $project['images_full'] ) && count( $project['images_full'] ) > 0 ) {
    $project['images'] = $project['images_full'];
}

switch ( $project['hover_effect'] ) {
    case 'scale':
        $wrapper_classes .= ' -img-scale';
        break;
    case 'overlay':
        $wrapper_classes .= ' -img-overlay';
        break;
    case 'greyscale':
        $wrapper_classes .= ' -img-greyscale';
        break;
    case 'transition':
        $wrapper_classes .= ' -img-transition';
        break;
    default:
        $wrapper_classes .= '';
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

$alignment = OhioOptions::get_global( 'projects_text_alignment', 'left' );
switch ( $alignment ) {
    case 'right':
        $wrapper_classes .= ' -right';
        break;
    case 'center':
        $wrapper_classes .= ' -center';
        break;
    default:
        $wrapper_classes .= '';
}

$parallax_data = '';
$tilt_effect = OhioOptions::get( 'portfolio_tilt_effect', true );
$tilt_perspective = OhioOptions::get( 'portfolio_tilt_effect_perspective', 6000 );

if ( $project['tilt_effect'] ) {
	$parallax_data = 'data-tilt=true data-tilt-perspective=' . $tilt_perspective  . '';
}

?>

<div class="portfolio-item card -layout1<?php echo esc_attr( $wrapper_classes); ?>" <?php if ( $project['in_popup'] ) { echo ' data-portfolio-popup="' . esc_attr( $project['popup_id'] ) . '"'; } ?> <?php if ( $project['boxed'] ) { echo esc_attr( $parallax_data ); } ?>>
    <div class="image-holder" <?php if ( !$project['boxed'] ) { echo esc_attr( $parallax_data ); } ?>>
        <a class="-unlink" href="<?php echo esc_url( $project['url'] ); ?>" <?php if ( $project['external'] ) { echo 'target="_blank"'; } ?> data-cursor-class="cursor-link">
            
            <?php if ( $featured_video && $project['show_featured_video'] ) : ?>

                <?php if ( strpos( $featured_video_url, 'youtube.com' ) || strpos( $featured_video_url, 'youtu.be' ) || strpos( $featured_video_url, 'vimeo.com' ) ) : ?>
                    <div class="video-container">
                        <iframe src="<?php echo esc_url( $featured_video_url ) . '?&controls=0&autoplay=1&start=0&mute=1&muted=1&rel=0&autopause=0&loop=1'; ?>" frameborder="0"/></iframe>
                    </div>
                <?php else : ?>
                    <video preload="metadata" muted="muted" autoplay="autoplay" loop="loop">
                        <source src="<?php echo esc_url( $featured_video_url ); ?>">
                    </video>
                <?php endif; ?>
                <div class="overlay"></div>

            <?php else : ?>

                <?php if ( $project['hover_effect'] == 'transition' ) : ?>
                    <?php foreach ( $project['images'] as $key => $img ) : ?>
                        <?php if ( $key < 1 ) : ?>
                            <img class="portfolio-archive-image" src="<?php echo esc_url( $img['url'] ); ?>" alt="<?php echo esc_attr( $project['title'] ); ?>">
                        <?php elseif ( $key == 1 ) : ?>
                            <img class="portfolio-archive-image" src="<?php echo esc_url( $img['url'] ); ?>" alt="<?php echo esc_attr( $project['title'] ); ?>">
                        <?php endif ?>
                    <?php endforeach; ?>
                <?php else : ?>
                    <img class="portfolio-archive-image" src="<?php echo esc_url( $project['featured_image'] ); ?>" alt="<?php echo esc_attr( $project['title'] ); ?>">
                    <div class="overlay"></div>
                <?php endif; ?>

            <?php endif; ?>
            
        </a>
        <?php if ( $project['in_popup'] ) : ?>
            <div class="overlay-details -top -fade-down">
                <button class="icon-button -light btn-lightbox" data-js="open-project-lightbox" aria-label="<?php esc_html_e( 'Open', 'ohio' ); ?>">
                    <i class="icon">
                        <svg class="default" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 2V6H2V2H6V0H2C0.9 0 0 0.9 0 2ZM2 12H0V16C0 17.1 0.9 18 2 18H6V16H2V12ZM16 16H12V18H16C17.1 18 18 17.1 18 16V12H16V16ZM16 0H12V2H16V6H18V2C18 0.9 17.1 0 16 0Z"></path></svg>
                    </i>
                </button>
            </div>
        <?php endif; ?>
        <?php if ( $featured_video && $project['show_video_button'] && !$project['show_featured_video'] ) : ?>
            <div class="video-button -animation open-popup<?php echo esc_attr( $video_button_style_class ); ?>" data-video="<?php echo esc_url( $project['video']['link'] ); ?>">
                <button class="icon-button<?php if ( $video_button_size != 'default' ) { echo ' -' . $video_button_size . ''; } ?>" aria-label="<?php esc_html_e( 'Play', 'ohio' ); ?>">
                    <i class="icon">
                        <svg class="default" width="13" height="20" viewBox="0 0 13 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 20L13 10L0 0V20Z"></path></svg>
                    </i>
                </button>
            </div>
        <?php endif; ?>
    </div>
    <div class="card-details">
        <div class="heading">
            <h4 class="title <?php if ( isset ( $title_class ) ) echo esc_attr( $title_class ); ?>">
                <?php echo esc_html( $project['title'] ); ?>
            </h4>
            <?php if ( $project['category_visible'] ) : ?>
                <div class="show-project">
                    <?php if ( $project['raw_categories'] ) : ?>
                        <div class="category-holder">
                            <?php foreach ( $project['raw_categories'] as $category ) : ?>
                                <span class="category <?php if ( isset( $category_class ) ) echo esc_attr( $category_class ); ?>"><a class="-unlink" href="<?php echo esc_url( get_term_link( $category->term_id ) ); ?>"><?php echo esc_html( $category->name ); ?></a></span>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                    <div class="show-project-link -full-w">
                        <a href="<?php echo esc_url( $project['url'] ); ?>"<?php if ( $project['external'] ) {
                            echo ' target="_blank"';
                        } ?>>
                            <?php esc_html_e( 'Show project', 'ohio' ); ?>
                        </a>
                    </div>
                </div>
            <?php endif; ?>
            <?php if ( $project['excerpt_visible'] ) : ?>
                <div class="project-details">
                    <p><?php echo esc_html( $project['short_description'] ); ?></p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>