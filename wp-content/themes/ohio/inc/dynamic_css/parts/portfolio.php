<?php
/*
    Portfolio

    Table of contents: (use search)

    # Grid/Slides
        ## 1. Title Typography
        ## 2. Categories Typography
        ## 3. Excerpt Typography
        ## 4. Publication Date Typography
        ## 5. Project Link Typography
        ## 6. Overlay Color
        ## 7. Navigation Color
        ## 8. Bullets Color
        ## 9. Contained Layout Background
        ## 10. Video Button Color

    # Lightbox
    	## 11. Lightbox Icon Color
    	## 12. Categories Typography
    	## 13. Publication Date Typography
    	## 14. Title Typography
    	## 15. Excerpt Typography
    	## 16. Meta Typography
    	## 17. Project Link Typography

    # Filters
    	## 18. Filters Typography
    	## 19. Active Filters Typography
*/

if ( ! OhioSettings::page_is( 'projects_page' ) ) {
	return false;
}

$projects_layout = OhioOptions::get( 'portfolio_item_layout_type', 'type_1' );

# Grid/Slides

## 1. Title Typography
$title_typo = OhioOptions::get( 'portfolio_title_typo' );
if ( $title_typo ) {
	$_selector = [
		'.portfolio-item .title',
		'.portfolio-item.-layout11 .title',
		'.portfolio-item.-layout8 .headline',
		'.portfolio-item.-with-slider .headline'

	];
	$_css = OhioHelper::parse_acf_typo_to_css( $title_typo );
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 2. Categories Typography
$categories_typo = OhioOptions::get( 'portfolio_category_typo' );
if ( $categories_typo ) {
	$_selector = [
		'.portfolio-item .category-holder',
		'.portfolio-item .show-project-link'
	];
	$_css = OhioHelper::parse_acf_typo_to_css( $categories_typo );
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 3. Excerpt Typography
$excerpt_typo = OhioOptions::get( 'portfolio_descr_typo' );
if ( $excerpt_typo && $projects_layout != 'grid_2' ) {
	$_selector = '.portfolio-item .project-details';
	$_css = OhioHelper::parse_acf_typo_to_css( $excerpt_typo );
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 4. Publication Date Typography
$date_typo = OhioOptions::get( 'portfolio_date_typo' );
if ( $date_typo && $projects_layout != 'grid_2' ) {
	$_selector = '.portfolio-item .date';
	$_css = OhioHelper::parse_acf_typo_to_css( $date_typo );
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 5. Project Link Typography
$link_typo = OhioOptions::get( 'portfolio_show_more_button_typo' );
if ( $link_typo && $projects_layout != 'grid_2' ) {
	$_selector = '.portfolio-item .button.-text';
	$_css = OhioHelper::parse_acf_typo_to_css( $link_typo );
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 6. Overlay Color
$overlay_color = OhioOptions::get( 'portfolio_grid_overlay_color' );
if ( $overlay_color ) {

	if ( $projects_layout == 'grid_2' ) {
		$_selector = '.portfolio-item.-layout2 .overlay-details:not(.-top)';
		$_css = 'background: linear-gradient(180deg, rgba(0, 0, 0, 0), ' . $overlay_color . ')';

	} elseif ( $projects_layout == 'grid_4' ) {
		$_selector = '.portfolio-item.-layout4 .overlay::after';
		$_css = 'background-color: ' . $overlay_color . ';';

	} elseif ( $projects_layout == 'grid_3' || $projects_layout == 'grid_5' || $projects_layout == 'grid_6' ) {
		$_selector = [
			'.portfolio-item.-layout3 .overlay::after',
			'.portfolio-item.-layout5 .overlay::after', 
			'.portfolio-item.-layout6 .overlay::after'
		];
		$_css = 'background-color: ' . $overlay_color . ';';

	} elseif ( $projects_layout == 'grid_7' ) {
		$_selector = '.portfolio-item.-with-gradient .portfolio-item-image::before';
		$_css = 'background: linear-gradient(90deg, rgba(0, 0, 0, 0), ' . $overlay_color . ')';

	} elseif ( $projects_layout == 'grid_10' ) {
		$_selector = '.portfolio-item.-layout10 .portfolio-item-image::before';
		$_css = 'background: linear-gradient(270deg, rgba(0, 0, 0, 0), ' . $overlay_color . ')';

	} elseif ( $projects_layout == 'grid_11' ) {
		$_selector = [
			'.portfolio-item.-layout11 .title',
			'.portfolio-item.-layout11 .category-holder'
		];
		$_css = 'background-color: ' . $overlay_color . ';';
	}

	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 7. Navigation Color
$slider_nav_color = OhioOptions::get( 'portfolio_nav_color' );
if ( $slider_nav_color ) {
	$_selector = '.clb-slider-nav-btn';
	$_css = 'color:' . $slider_nav_color . ';';
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 8. Bullets Color
$slider_bullets_color = OhioOptions::get( 'portfolio_bullets_color' );
if ( $slider_bullets_color ) {
	$_selector = [
		'.clb-slider-nav-dots .clb-slider-dot',
		'.clb-slider-pagination .clb-slider-page'
	];
	$_css = 'color:' . $slider_bullets_color . ';';
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 9. Contained Layout Background
$cards_background_color = OhioOptions::get( 'portfolio_grid_background_color' );
if ( $cards_background_color ) {
	$_selector = '.portfolio-item.-contained .card-details';
	$_css = 'background-color:' . $cards_background_color . ';';
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 10. Video Button Color
$video_button_color = OhioOptions::get( 'portfolio_grid_video_btn_bg' );
if ( $video_button_color ) {
	$video_button_style = OhioOptions::get( 'portfolio_video_button_style', 'default' );
	$_selector = '.portfolio-item .video-button .icon-button';
	if ( $video_button_style == 'outlined' ) {
		$_css = 'color:' . $video_button_color . ';';
	} else {
		$_css = 'background-color:' . $video_button_color . ';';
	}
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}


# Lightbox

## 11. Lightbox Icon Color

$lightbox_icon_color = OhioOptions::get( 'lightbox_trigger_color' );
if ( $lightbox_icon_color ) {
	$_selector = 'project-lightbox .icon-button .icon';
	$_css = 'color:' . $lightbox_icon_color . ';';
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 12. Categories Typography
$lightbox_categories_typo = OhioOptions::get( 'lightbox_category_typo' );
if ( $lightbox_categories_typo ) {
	$_selector = '.project-lightbox .category';
	$_css = OhioHelper::parse_acf_typo_to_css( $lightbox_categories_typo );
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 13. Publication Date Typography
$lightbox_date_typo = OhioOptions::get( 'lightbox_date_typo' );
if ( $lightbox_date_typo ) {
	$_selector = '.project-lightbox .date';
	$_css = OhioHelper::parse_acf_typo_to_css( $lightbox_date_typo );
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 14. Title Typography
$lightbox_title_typo = OhioOptions::get( 'lightbox_title_typo' );
if ( $lightbox_title_typo ) {
	$_selector = '.project-lightbox .headline';
	$_css = OhioHelper::parse_acf_typo_to_css( $lightbox_title_typo );
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 15. Excerpt Typography
$lightbox_excerpt_typo = OhioOptions::get( 'lightbox_description_typo' );
if ( $lightbox_excerpt_typo ) {
	$_selector = '.project-lightbox .project-details';
	$_css = OhioHelper::parse_acf_typo_to_css( $lightbox_excerpt_typo );
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 16. Meta Typography
$lightbox_meta_typo = OhioOptions::get( 'lightbox_details_typo' );
if ( $lightbox_meta_typo ) {
	$_selector = [
		'.project-lightbox .project-meta .title',
		'.project-lightbox .project-meta p'
	];
	$_css = OhioHelper::parse_acf_typo_to_css( $lightbox_meta_typo );
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 17. Project Link Typography
$lightbox_link_typo = OhioOptions::get( 'lightbox_link_typo' );
if ( $lightbox_link_typo ) {
	$_selector = '.project-lightbox .button.-text';
	$_css = OhioHelper::parse_acf_typo_to_css( $lightbox_link_typo );
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}


# Filters

## 18. Filters Typography
$filter_typo = OhioOptions::get( 'project_filter_text_typo' );
if ( $filter_typo ) {
	$_selector = [
		'.portfolio-filter li',
		'.portfolio-filter li a'
	];
	$_css = OhioHelper::parse_acf_typo_to_css( $filter_typo );
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 19. Active Filters Typography
$filter_active_typo = OhioOptions::get( 'project_filter_accent_typo' );
if ( $filter_active_typo ) {
	$_selector = [
		'.portfolio-filter:not(.-filter-button) a:not(.-unlink):not(.tag):not(.button):not(.icon-button):hover',
		'.portfolio-filter:not(.-filter-button) a.active'
	];
	$_css = OhioHelper::parse_acf_typo_to_css( $filter_active_typo );
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}
