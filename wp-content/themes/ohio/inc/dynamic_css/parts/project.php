<?php
/*
    Single Project

    Table of contents: (use search)

    # General
    	## 1. Navigation Color
    	## 2. Bullets Color
        ## 3. Overlay Color
        ## 4. Intro Background Color
        ## 5. Video Button Color
*/


# General

## 1. Navigation Color
$_project_slider_nav_select_type = OhioOptions::get_select_type( 'project_nav_visibility' ); // Global Inheritance. Define local styles
$project_slider_nav_color = OhioOptions::get_by_type( 'project_nav_color', $_project_slider_nav_select_type );
if ( $project_slider_nav_color ) {
	$_selector = '.project .-with-slider .clb-slider-nav-btn';
	$_css = 'color:' . $project_slider_nav_color . ';';
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 2. Bullets Color
$_project_slider_bullets_select_type = OhioOptions::get_select_type( 'project_bullets_visibility' ); // Global Inheritance. Define local styles
$project_slider_bullets_color = OhioOptions::get_by_type( 'project_bullets_color', $_project_slider_bullets_select_type );
if ( $project_slider_bullets_color ) {
	$_selector = '.project .-with-slider .clb-slider-pagination';
	$_css = 'color:' . $project_slider_bullets_color . ';';
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 3. Overlay Color
$project_slider_overlay = OhioOptions::get( 'project_color_overlay', null, false, true );
$project_layout_type = OhioOptions::get( 'project_layout_type' );
if ( $project_slider_overlay ) {
	if ( $project_layout_type == 'type_8' ) {
		$_selector = '.project .-with-slider .overlay';
		$_css = 'background: linear-gradient(-90deg, rgba(17, 16, 19, 0), ' . $project_slider_overlay . ');';
	}
	else {
		$_selector = '.project:not(.-layout8) .-with-slider .overlay';
		$_css = 'background-color:' . $project_slider_overlay . ';';
	}
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 4. Intro Background Color
$project_slider_intro_background = OhioOptions::get( 'project_intro_background', null, false, true );
if ( $project_slider_intro_background ) {
	$_selector = '.project.-layout10 .project-content .holder';
	$_css = 'background-color:' . $project_slider_intro_background . ';';
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 5. Video Button Color
$_project_video_btn_select_type = OhioOptions::get_select_type( 'project_video_button_style' ); // Global Inheritance. Define local styles
$project_video_btn = OhioOptions::get_by_type( 'project_grid_video_btn_bg', $_project_video_btn_select_type );
if ( $project_video_btn ) {
	$video_button_style = OhioOptions::get( 'project_video_button_style', 'default' );
	
	if ( $video_button_style != 'outlined' ) {
		$_selector = '.project .video-button:not(.-outlined) .icon-button';
		$_css = 'background-color:' . $project_video_btn . ';';
	} else {
		$_selector = '.project .video-button.-outlined .icon-button';
		$_css = 'color:' . $project_video_btn . ';';
	}
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}
