<?php

	/**
	* Visual Composer Ohio Post type
	*/
	if ( function_exists ( 'vc_add_shortcode_param' ) ) {
		vc_add_shortcode_param( 'ohio_posts', 'ohio_posts_settings_field', plugins_url( 'posts.js' , __FILE__ ) );
	}
	
	function ohio_posts_settings_field( $settings, $value ) {
		$exploded_value = explode(',', $value);
        $post_options = [];

        global $wpdb;
        $posts = $wpdb->get_results( $wpdb->prepare( "SELECT post_title, ID FROM $wpdb->posts WHERE post_type = %s AND post_status = 'publish'", empty( $settings['post_type'] ) ? 'post' : $settings['post_type'] ) );
        foreach ( $posts as $post ) {
            $post_options[$post->ID] = $post->post_title;
        }

		ob_start();
?>
		<div class="ohio_extra_posts_block">
			<input type="hidden" name="<?php echo esc_attr( $settings['param_name'] ); ?>" class="wpb_vc_param_value" value="<?php echo esc_attr( $value ); ?>">
			<select multiple>
				<?php
					foreach ( $post_options as $id => $title ) {
						echo '<option value="' . $id . '"';
						if ( in_array( $id, $exploded_value ) ) {
							echo ' selected="selected"';
						}
						echo '>' . $title . '</option>';
					}
				?>
			</select>
		</div>
<?php

		$content = ob_get_contents();
		ob_end_clean();
		return $content;
	}
