<?php
/*
	Blog custom style
	
	Table of contents: (use search)
	
	# General
        ## 1. Wrap Container Width
		## 2. Post Typography
*/

# General

## 1. Wrap Container Width
$wrap_container_width = OhioOptions::get( 'page_post_layout_width', null, false, true );

// Convert "%" to "vw" for proper calculation
if ( $wrap_container_width && str_contains( $wrap_container_width, '%' ) ) {
	$wrap_container_width = str_replace( '%', 'vw', $wrap_container_width );
}

if ( $wrap_container_width ) {
	$_selector = [
		':root'
	];
    $_css = '--clb-container-post-width:' . $wrap_container_width . ';';
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 2. Post Typography
$post_typo = OhioOptions::get( 'page_post_typo', null, false, true );
if ( $post_typo ) {
    $_selector = '.single-post .entry-content';
    $_css = OhioHelper::parse_acf_typo_to_css( $post_typo );
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );    
}