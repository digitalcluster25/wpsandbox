<?php
/*
    Global Typography

    Table of contents: (use search)

    # Fonts
        ## 1. Body Typography
        ## 2. Headings Typography
        ## 3. Subtitles Typography
        ## 4. H1 Tag Typography
        ## 5. H2 Tag Typography
        ## 6. H3 Tag Typography
        ## 7. H4 Tag Typography
        ## 8. H5 Tag Typography
        ## 9. H6 Tag Typography

	# Adaptive Fonts
		## 10. Body Adaptive Typography
		## 11. Subtitles Adaptive Typography
		## 12. H1 Tag Adaptive Typography
        ## 13. H2 Tag Adaptive Typography
        ## 14. H3 Tag Adaptive Typography
        ## 15. H4 Tag Adaptive Typography
        ## 16. H5 Tag Adaptive Typography
        ## 17. H6 Tag Adaptive Typography

	# Blog
		## 18. Author Typography
		## 19. Publication Date Typography
		## 20. Reading Time Typography
		## 21. Title Typography
		## 22. Excerpt Typography
		## 23. Categories Typography
		## 24. Read More Typography

	# Portfolio
		## 25. Publication Date Typography
		## 26. Title Typography
		## 27. Excerpt Typography
		## 28. Categories Typography
		## 29. Project Link Typography
		## 30. Task Typography
		## 31. Meta Typography
	
	# Color Mode
		## 33. Switcher Typography
*/

OhioOptions::get( 'page_typography_settings' ); // trigger select chain
$typography_settings_select_type = OhioOptions::get_last_select_type();


# Fonts

## 1. Body Typography
$body_typo = OhioOptions::get_global( 'page_text_typo' );
OhioBuffer::append_typography_to_variables_css_buffer( '--clb-text', OhioHelper::parse_acf_typo( $body_typo ) );
// Inherit body color for the dark mode
OhioBuffer::append_typography_to_variables_css_buffer( '--clb-text-light-mode', OhioHelper::parse_acf_typo( $body_typo ) );

## 2. Headings Typography
$titles_typo = OhioOptions::get_global( 'page_headings_typo' );
OhioBuffer::append_typography_to_variables_css_buffer( '--clb-title', OhioHelper::parse_acf_typo( $titles_typo ) );

## 3. Subtitles Typography
$subtitles_typo = OhioOptions::get_global( 'page_subtitles_typo' );
OhioBuffer::append_typography_to_variables_css_buffer( '--clb-subtitle', OhioHelper::parse_acf_typo( $subtitles_typo ) );

## 4. H1 Tag Typography
$titles_h1_typo = OhioOptions::get_global( 'page_headings_typo_h1' );
if ( $titles_h1_typo ) {
	$_selector = 'h1';
	$_css = OhioHelper::parse_acf_typo_to_css( $titles_h1_typo );
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 5. H2 Tag Typography
$titles_h2_typo = OhioOptions::get_global( 'page_headings_typo_h2' );
if ( $titles_h2_typo ) {
	$_selector = 'h2';
	$_css = OhioHelper::parse_acf_typo_to_css( $titles_h2_typo );
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 6. H3 Tag Typography
$titles_h3_typo = OhioOptions::get_global( 'page_headings_typo_h3' );
if ( $titles_h3_typo ) {
	$_selector = 'h3';
	$_css = OhioHelper::parse_acf_typo_to_css( $titles_h3_typo );
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 7. H4 Tag Typography
$titles_h4_typo = OhioOptions::get_global( 'page_headings_typo_h4' );
if ( $titles_h4_typo ) {
	$_selector = 'h4';
	$_css = OhioHelper::parse_acf_typo_to_css( $titles_h4_typo );
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 8. H5 Tag Typography
$titles_h5_typo = OhioOptions::get_global( 'page_headings_typo_h5' );
if ( $titles_h5_typo ) {
	$_selector = 'h5';
	$_css = OhioHelper::parse_acf_typo_to_css( $titles_h5_typo );
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 9. H6 Tag Typography
$titles_h6_typo = OhioOptions::get_global( 'page_headings_typo_h6' );
if ( $titles_h6_typo ) {
	$_selector = 'h6';
	$_css = OhioHelper::parse_acf_typo_to_css( $titles_h6_typo );
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}


# Adaptive Fonts

## 10. Body Adaptive Typography
$body_typo_adaptive = OhioOptions::get_global( 'page_paragraphs_font_sizes' );
$_body_typo_adaptive = OhioHelper::parse_responsive_font_sizes( $body_typo_adaptive );
if ( $_body_typo_adaptive ) {
	$_css = OhioHelper::get_all_responsive_font_variables_css( '--clb-text', $_body_typo_adaptive );
	OhioBuffer::append_to_dynamic_css_buffer( $_css );
}

## 11. Subtitles Adaptive Typography
$subtitles_typo_adaptive = OhioOptions::get_global( 'page_subtitles_font_sizes' );
$_subtitles_typo_adaptive = OhioHelper::parse_responsive_font_sizes( $subtitles_typo_adaptive );
if ( $_subtitles_typo_adaptive ) {
	$_css = OhioHelper::get_all_responsive_font_variables_css( '--clb-subtitle', $_subtitles_typo_adaptive );
	OhioBuffer::append_to_dynamic_css_buffer( $_css );
}

## 12. H1 Tag Adaptive Typography
$titles_h1_typo_adaptive = OhioHelper::parse_responsive_font_sizes( OhioOptions::get_global( 'page_titles_h1_font_sizes' ) );
if ( $titles_h1_typo_adaptive ) {
	$_css = OhioHelper::get_all_responsive_font_css( $titles_h1_typo_adaptive, 'h1' );
	OhioBuffer::append_to_dynamic_css_buffer( $_css );
}

## 13. H2 Tag Adaptive Typography
$titles_h2_typo_adaptive = OhioHelper::parse_responsive_font_sizes( OhioOptions::get_global( 'page_titles_h2_font_sizes' ) );
if ( $titles_h2_typo_adaptive ) {
	$_css = OhioHelper::get_all_responsive_font_css( $titles_h2_typo_adaptive, 'h2' );
	OhioBuffer::append_to_dynamic_css_buffer( $_css );
}

## 14. H3 Tag Adaptive Typography
$titles_h3_typo_adaptive = OhioHelper::parse_responsive_font_sizes( OhioOptions::get_global( 'page_titles_h3_font_sizes' ) );
if ( $titles_h3_typo_adaptive ) {
	$_css = OhioHelper::get_all_responsive_font_css( $titles_h3_typo_adaptive, 'h3' );
	OhioBuffer::append_to_dynamic_css_buffer( $_css );
}

## 15. H4 Tag Adaptive Typography
$titles_h4_typo_adaptive = OhioHelper::parse_responsive_font_sizes( OhioOptions::get_global( 'page_titles_h4_font_sizes' ) );
if ( $titles_h4_typo_adaptive ) {
	$_css = OhioHelper::get_all_responsive_font_css( $titles_h4_typo_adaptive, 'h4' );
	OhioBuffer::append_to_dynamic_css_buffer( $_css );
}

## 16. H5 Tag Adaptive Typography
$titles_h5_typo_adaptive = OhioHelper::parse_responsive_font_sizes( OhioOptions::get_global( 'page_titles_h5_font_sizes' ) );
if ( $titles_h5_typo_adaptive ) {
	$_css = OhioHelper::get_all_responsive_font_css( $titles_h5_typo_adaptive, 'h5' );
	OhioBuffer::append_to_dynamic_css_buffer( $_css );
}

## 17. H6 Tag Adaptive Typography
$titles_h6_typo_adaptive = OhioHelper::parse_responsive_font_sizes( OhioOptions::get_global( 'page_titles_h6_font_sizes' ) );
if ( $titles_h6_typo_adaptive ) {
	$_css = OhioHelper::get_all_responsive_font_css( $titles_h6_typo_adaptive, 'h6' );
	OhioBuffer::append_to_dynamic_css_buffer( $_css );
}


# Blog

## 18. Author Typography
$post_author_typo = OhioOptions::get_global( 'posts_author_typo' );
if ( $post_author_typo ) {
	$_selector = '.blog-item .meta-holder';
    $_css = OhioHelper::parse_acf_typo_to_css( $post_author_typo );
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 19. Publication Date Typography
$post_date_typo = OhioOptions::get_global( 'posts_date_typo' );
if ( $post_date_typo ) {
	$_selector = '.blog-item .date';
    $_css = OhioHelper::parse_acf_typo_to_css( $post_date_typo );
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 20. Reading Time Typography
$post_reading_time_typo = OhioOptions::get_global( 'posts_reading_time_typo' );
if ( $post_reading_time_typo ) {
	$_selector = '.blog-item .post-meta-estimate';
	$_css = OhioHelper::parse_acf_typo_to_css( $post_reading_time_typo );
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 21. Title Typography
$post_title_typo = OhioOptions::get_global( 'posts_title_typo' );
if ( $post_title_typo ) {
	$_selector = '.blog-item .title a';
    $_css = OhioHelper::parse_acf_typo_to_css( $post_title_typo );
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 22. Excerpt Typography
$post_excerpt_typo = OhioOptions::get_global( 'posts_content_typo' );
if ( $post_excerpt_typo ) {
	$_selector = '.blog-item p';
    $_css = OhioHelper::parse_acf_typo_to_css( $post_excerpt_typo );
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 23. Categories Typography
$post_categories_typo = OhioOptions::get_global( 'posts_category_typo' );
if ( $post_categories_typo ) {
	$_selector = '.blog-item .category-holder .tag';
    $_css = OhioHelper::parse_acf_typo_to_css( $post_categories_typo );
    OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 24. Read More Typography
$post_link_typo = OhioOptions::get_global( 'posts_readmore_typo' );
if ( $post_link_typo ) {
	$_selector = '.blog-item .button.-text';
    $_css = OhioHelper::parse_acf_typo_to_css( $post_link_typo );
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}


# Portfolio

## 25. Publication Date Typography
$project_date_typo = OhioOptions::get( 'project_date_typography' );
if ( $project_date_typo ) {
	$_selector = '.project span.date';
	$_css = OhioHelper::parse_acf_typo_to_css( $project_date_typo );
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 26. Title Typography
$project_title_typo = OhioOptions::get( 'project_title_typography' );
if ( $project_title_typo ) {
	$_selector = [
		'.project[class*="-layout"] .holder .headline',
		'.project[class*="-layout"] .project-content .headline'
	];
	$_css = OhioHelper::parse_acf_typo_to_css( $project_title_typo );
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 27. Excerpt Typography
$project_excerpt_typo = OhioOptions::get( 'project_description_typography' );
if ( $project_excerpt_typo ) {
	$_selector = '.project .project-details';
	$_css = OhioHelper::parse_acf_typo_to_css( $project_excerpt_typo );
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 28. Categories Typography
$project_categories_typo = OhioOptions::get( 'project_category_typography' );
if ( $project_categories_typo ) {
	$_selector = '.project .category-holder .category';
	$_css = OhioHelper::parse_acf_typo_to_css( $project_categories_typo );
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 29. Project Link Typography
$project_link_typo = OhioOptions::get( 'project_link_typography' );
if ( $project_link_typo ) {
	$_selector = '.project[class*="-layout"] .project-content .button.-text:not(:hover)';
	$_css = OhioHelper::parse_acf_typo_to_css( $project_link_typo );
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 30. Task Typography
$project_task_typo = OhioOptions::get( 'project_task_typography' );
if ( $project_task_typo ) {
	$_selector = [
		'.project-page .project-task',
		'.project-page .project-task h6'
	];
	$_css = OhioHelper::parse_acf_typo_to_css( $project_task_typo );
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}

## 31. Meta Typography
$project_meta_typo = OhioOptions::get( 'project_details_typography' );
if ( $project_meta_typo ) {
	$_selector = '.project .options-group';
	$_css = OhioHelper::parse_acf_typo_to_css( $project_meta_typo );
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}


# Color Mode

## 33. Switcher Typography
$mode_switcher_typo = OhioOptions::get( 'page_dark_mode_switcher_typo' );
if ( $mode_switcher_typo ) {
	$_selector = '.elements-bar:not(.light-typo):not(.dark-typo) .color-switcher-item.dark';
	$_css = OhioHelper::parse_acf_typo_to_css( $mode_switcher_typo );
	OhioBuffer::pack_dynamic_css_to_buffer( $_selector, $_css );
}
