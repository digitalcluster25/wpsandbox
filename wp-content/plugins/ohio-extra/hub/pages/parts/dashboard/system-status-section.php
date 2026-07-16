<div class="clb-headline">
	<div class="col clb-headline-icon">
		<svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="m97-144 245-336h193l281-340v676H97Zm76-225-58-42 155-213h193l168-203 55 46-189 229H306L173-369Zm66 153h505v-404L569-408H378L239-216Zm505 0Z"></path></svg>
	</div>
	<div class="col">
		<h1>
			<?php _e( 'System Status', 'ohio-extra' ); ?>
		</h1>
		<p>
			<?php _e( 'Check your server setup for important information. Red error messages indicate potential compliance issues with', 'ohio-extra' ); ?>
			<a href="https://docs.clbthemes.com/ohio/#requirements" target="_blank"><?php _e( 'Ohio\'s Server Requirements.', 'ohio-extra' ); ?></a>
			
		</p>
	</div>
</div>
<div class="o-notice o-notice-system-status">
	<i class="icon">
		<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"><path d="M450-290h60v-230h-60v230Zm30-298.46q13.73 0 23.02-9.29t9.29-23.02q0-13.73-9.29-23.02-9.29-9.28-23.02-9.28t-23.02 9.28q-9.29 9.29-9.29 23.02t9.29 23.02q9.29 9.29 23.02 9.29Zm.07 488.46q-78.84 0-148.21-29.92t-120.68-81.21q-51.31-51.29-81.25-120.63Q100-401.1 100-479.93q0-78.84 29.92-148.21t81.21-120.68q51.29-51.31 120.63-81.25Q401.1-860 479.93-860q78.84 0 148.21 29.92t120.68 81.21q51.31 51.29 81.25 120.63Q860-558.9 860-480.07q0 78.84-29.92 148.21t-81.21 120.68q-51.29 51.31-120.63 81.25Q558.9-100 480.07-100Zm-.07-60q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z"/></svg>
	</i>
	<div class="holder">
		<div class="content">
			<p class="title"><?php _e( 'System Report', 'ohio-extra' ); ?></p>
			<?php _e( 'Please copy and paste this information in your ticket when contacting support:', 'ohio-extra' ); ?>
		</div>
		<div class="_button-group">
			<a id="get-system-report" href="#" class="btn">
				<i class="bi bi-text-paragraph"></i><?php _e( 'Get System Report', 'ohio-extra' ); ?>
			</a>
		</div>
		<textarea id="system-report" style="display: none;" class="system-report" readonly><?php 
				// WordPress information
				$wp_version = get_bloginfo('version');
				$wp_language = get_bloginfo('language');
				$wp_charset = get_bloginfo('charset');
				$wp_debug_mode = WP_DEBUG ? 'Enabled' : 'Disabled';
				$home_url = home_url();
				$site_url = site_url();
				$wp_path = ABSPATH;
				$wp_content_path = WP_CONTENT_DIR;

				// Theme information
				$theme = wp_get_theme();
				$child_theme = is_child_theme() ? 'Yes' : 'No';
				$theme_directory = get_stylesheet_directory();
				$theme_name = $theme->get('Name');
				$theme_version = $theme->get('Version');
				$theme_author = $theme->get('Author');
				$has_license_code = !!get_option( 'ohio_license_code' ) ? 'Yes' : 'No';

				// Plugins information
				$plugins = get_plugins();
				$active_plugins = get_option('active_plugins');
				$plugin_info = array();
				foreach ($plugins as $plugin_path => $plugin_data) {
					$status = in_array($plugin_path, $active_plugins) ? 'Active' : 'Inactive';
					$plugin_info[] = "{$plugin_data['Name']} (v{$plugin_data['Version']}) by {$plugin_data['Author']} - {$status}";
				}
				$plugin_list = implode("\n", $plugin_info);
				
				// Server environment
				$php_version = phpversion();
				$server_software = $_SERVER['SERVER_SOFTWARE'];
				$mysql_version = $GLOBALS['wpdb']->get_var('SELECT VERSION() AS version');
				$php_time_limit = ini_get('max_execution_time');
				$php_memory_limit = ini_get('memory_limit');
				$php_max_upload_size = ini_get('upload_max_filesize');
				$file_upload_permission = is_writable(WP_CONTENT_DIR . '/uploads') ? 'Writable' : 'Not writable';
				$https = is_ssl() ? 'Yes' : 'No';
				$enabled_php_extensions = implode( ', ', get_loaded_extensions() );

				$iconv_assert_result = 'Fail';
				if ( extension_loaded('iconv') ) {
					$ICONV_TEST = 'new-permalink';
					$iconv_result = OhioHelper::slug_from_string( $ICONV_TEST );
					$iconv_assert = !empty( $iconv_result ) && $iconv_result === $ICONV_TEST;
					$iconv_assert_result = $iconv_assert ? 'Success' : 'Fail';
				}

				$data = array(
					"WordPress Information:",
					"Version: $wp_version",
					"Language: $wp_language",
					"Charset: $wp_charset",
					"Debug mode: $wp_debug_mode",
					"Home URL: $home_url",
					"Site URL: $site_url",
					"WordPress Path: $wp_path",
					"WordPress Content Path: $wp_content_path",
					"",
					"Theme Information:",
					"Name: $theme_name",
					"Version: $theme_version",
					"Author: $theme_author",
					"Child Theme: $child_theme",
					"Theme Directory: $theme_directory",
					"Is theme activated: $has_license_code",
					"",
					"Plugins Information:",
					$plugin_list,
					"",
					"Server Environment:",
					"PHP Version: $php_version",
					"Server Software: $server_software",
					"MySQL Version: $mysql_version",
					"PHP Time Limit: $php_time_limit",
					"PHP Memory Limit: $php_memory_limit",
					"PHP Max Upload Size: $php_max_upload_size",
					"File Upload Permission: $file_upload_permission",
					"HTTPS: $https",
					"Iconv assert: $iconv_assert_result",
					"Enabled PHP extensions: $enabled_php_extensions"
				);

				$output = implode("\n", $data);
				echo $output;
			?>
		</textarea>
	</div>
</div>
<div class="row">

	<!-- Group 2cl -->
	<div class="clb-group">
		<div class="clb-group-headline">
			<h2><?php _e( 'Theme Info', 'ohio-extra' ); ?></h2>
		</div>
		<table class="clb-group-content clb-group-table">
			<tbody>
				<tr>
					<td><?php _e( 'Theme Version:', 'ohio-extra' ); ?></td>
					<td>
						<!-- tip -->
						<span class="tip" data-tooltip="<?php _e( 'The current used version of Ohio.', 'ohio-extra' ); ?>"><svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="M480-240q20 0 34-14t14-34q0-20-14-34t-34-14q-20 0-34 14t-14 34q0 20 14 34t34 14Zm-36-153h73q0-37 6.5-52.5T555-485q35-34 48.5-58t13.5-53q0-55-37.5-89.5T484-720q-51 0-88.5 27T343-620l65 27q9-28 28.5-43.5T482-652q28 0 46 16t18 42q0 23-15.5 41T496-518q-35 32-43.5 52.5T444-393Zm36 297q-79 0-149-30t-122.5-82.5Q156-261 126-331T96-480q0-80 30-149.5t82.5-122Q261-804 331-834t149-30q80 0 149.5 30t122 82.5Q804-699 834-629.5T864-480q0 79-30 149t-82.5 122.5Q699-156 629.5-126T480-96Zm0-72q130 0 221-91t91-221q0-130-91-221t-221-91q-130 0-221 91t-91 221q0 130 91 221t221 91Zm0-312Z"/></svg></span>
					</td>
					<td id="ohio-version-table-value">
						<?php
							$ohio_theme = wp_get_theme( get_template() );
							$ohio_version = $ohio_theme->get( 'Version' ) ? $ohio_theme->get( 'Version' ) : '2.0.0';
							$last_stable = get_option('ohio_last_available_version', '2.0.0');

							if ( version_compare( $ohio_version, $last_stable ) >= 0 ) {
								echo $ohio_version;
							} else {
								echo '<mark class="error">' . $ohio_version . '</mark>';
							}
						?>
							<span class="ohio-new-version-available" style="<?php if ( version_compare( $ohio_version, $last_stable ) >= 0 ) { echo 'display:none'; } ?>">
								- <a href="#"><?php _e( 'New version available', 'ohio-extra' ) ?></a>&nbsp;
								<b id="ohio-version-table-placeholder"><?php echo $last_stable; ?></b>
								<a class="tips" target="_blank" href="https://docs.clbthemes.com/ohio/#updating"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16"><path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/><path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/></svg></a>
							</span>
					</td>
					<td></td>
				</tr>
				<tr>
					<td><?php _e( 'Theme License:', 'ohio-extra' ); ?></td>
					<td>
						<!-- tip -->
						<span class="tip" data-tooltip="<?php _e( 'The status of Ohio\'s license.', 'ohio-extra' ); ?>"><svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="M480-240q20 0 34-14t14-34q0-20-14-34t-34-14q-20 0-34 14t-14 34q0 20 14 34t34 14Zm-36-153h73q0-37 6.5-52.5T555-485q35-34 48.5-58t13.5-53q0-55-37.5-89.5T484-720q-51 0-88.5 27T343-620l65 27q9-28 28.5-43.5T482-652q28 0 46 16t18 42q0 23-15.5 41T496-518q-35 32-43.5 52.5T444-393Zm36 297q-79 0-149-30t-122.5-82.5Q156-261 126-331T96-480q0-80 30-149.5t82.5-122Q261-804 331-834t149-30q80 0 149.5 30t122 82.5Q804-699 834-629.5T864-480q0 79-30 149t-82.5 122.5Q699-156 629.5-126T480-96Zm0-72q130 0 221-91t91-221q0-130-91-221t-221-91q-130 0-221 91t-91 221q0 130 91 221t221 91Zm0-312Z"/></svg></span>
					</td>
					<td>
						<?php
							if ( get_option( 'ohio_license_code', false ) ):
								echo '<label class="active"><svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="m429-336 238-237-51-51-187 186-85-84-51 51 136 135Zm51 240q-79 0-149-30t-122.5-82.5Q156-261 126-331T96-480q0-80 30-149.5t82.5-122Q261-804 331-834t149-30q80 0 149.5 30t122 82.5Q804-699 834-629.5T864-480q0 79-30 149t-82.5 122.5Q699-156 629.5-126T480-96Zm0-72q130 0 221-91t91-221q0-130-91-221t-221-91q-130 0-221 91t-91 221q0 130 91 221t221 91Zm0-312Z"/></svg>Activated</label>';
							else:
								echo '<label class="inactive"><svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="M480.28-96Q401-96 331-126t-122.5-82.5Q156-261 126-330.96t-30-149.5Q96-560 126-629.5q30-69.5 82.5-122T330.96-834q69.96-30 149.5-30t149.04 30q69.5 30 122 82.5T834-629.28q30 69.73 30 149Q864-401 834-331t-82.5 122.5Q699-156 629.28-126q-69.73 30-149 30Zm-.28-72q130 0 221-91t91-221q0-130-91-221t-221-91q-130 0-221 91t-91 221q0 130 91 221t221 91Zm0-312Z"/></svg>Not activated</label>';
							endif;
						?>
					</td>
				</tr>
				<tr>
					<td><?php _e( 'Theme Directory:', 'ohio-extra' ); ?></td>
					<td>
						<!-- tip -->
						<span class="tip" data-tooltip="<?php _e( 'Relative directory path of the theme.', 'ohio-extra' ); ?>"><svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="M480-240q20 0 34-14t14-34q0-20-14-34t-34-14q-20 0-34 14t-14 34q0 20 14 34t34 14Zm-36-153h73q0-37 6.5-52.5T555-485q35-34 48.5-58t13.5-53q0-55-37.5-89.5T484-720q-51 0-88.5 27T343-620l65 27q9-28 28.5-43.5T482-652q28 0 46 16t18 42q0 23-15.5 41T496-518q-35 32-43.5 52.5T444-393Zm36 297q-79 0-149-30t-122.5-82.5Q156-261 126-331T96-480q0-80 30-149.5t82.5-122Q261-804 331-834t149-30q80 0 149.5 30t122 82.5Q804-699 834-629.5T864-480q0 79-30 149t-82.5 122.5Q699-156 629.5-126T480-96Zm0-72q130 0 221-91t91-221q0-130-91-221t-221-91q-130 0-221 91t-91 221q0 130 91 221t221 91Zm0-312Z"/></svg></span>
					</td>
					<td><?php echo $theme_directory; ?></td>
				</tr>
				<tr>
					<td><?php _e( 'Child Theme:', 'ohio-extra' ); ?></td>
					<td>
						<!-- tip -->
						<a href="https://developer.wordpress.org/themes/advanced-topics/child-themes/" target="_blank" class="tip" data-tooltip="<?php _e( 'Child theme is a extension of a parent theme.', 'ohio-extra' ); ?>"><svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="M480-240q20 0 34-14t14-34q0-20-14-34t-34-14q-20 0-34 14t-14 34q0 20 14 34t34 14Zm-36-153h73q0-37 6.5-52.5T555-485q35-34 48.5-58t13.5-53q0-55-37.5-89.5T484-720q-51 0-88.5 27T343-620l65 27q9-28 28.5-43.5T482-652q28 0 46 16t18 42q0 23-15.5 41T496-518q-35 32-43.5 52.5T444-393Zm36 297q-79 0-149-30t-122.5-82.5Q156-261 126-331T96-480q0-80 30-149.5t82.5-122Q261-804 331-834t149-30q80 0 149.5 30t122 82.5Q804-699 834-629.5T864-480q0 79-30 149t-82.5 122.5Q699-156 629.5-126T480-96Zm0-72q130 0 221-91t91-221q0-130-91-221t-221-91q-130 0-221 91t-91 221q0 130 91 221t221 91Zm0-312Z"/></svg></a>
					</td>
					<td>
						<p>
							<label><?php echo ( get_template_directory() === get_stylesheet_directory() ) ? '<svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="M480-288v-384q-80 0-136 56.23-56 56.22-56 136Q288-400 344.16-344q56.16 56 135.84 56Zm.28 192Q401-96 331-126t-122.5-82.5Q156-261 126-330.96t-30-149.5Q96-560 126-629.5q30-69.5 82.5-122T330.96-834q69.96-30 149.5-30t149.04 30q69.5 30 122 82.5T834-629.28q30 69.73 30 149Q864-401 834-331t-82.5 122.5Q699-156 629.28-126q-69.73 30-149 30Zm-.28-72q130 0 221-91t91-221q0-130-91-221t-221-91q-130 0-221 91t-91 221q0 130 91 221t221 91Zm0-312Z"/></svg>Disabled' : 'Enabled'; ?></label>
						</p>
					</td>
				</tr>
			</tbody>
		</table>
	</div>

	<!-- Group 3cl -->
	<div class="clb-group">
		<div class="clb-group-headline">
			<h2><?php _e( 'Server Environment', 'ohio-extra' ); ?></h2>
			<a href="https://docs.clbthemes.com/ohio/#requirements" target="_blank" class="btn btn-flat">
				<svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="M480-240q20 0 34-14t14-34q0-20-14-34t-34-14q-20 0-34 14t-14 34q0 20 14 34t34 14Zm-36-153h73q0-37 6.5-52.5T555-485q35-34 48.5-58t13.5-53q0-55-37.5-89.5T484-720q-51 0-88.5 27T343-620l65 27q9-28 28.5-43.5T482-652q28 0 46 16t18 42q0 23-15.5 41T496-518q-35 32-43.5 52.5T444-393Zm36 297q-79 0-149-30t-122.5-82.5Q156-261 126-331T96-480q0-80 30-149.5t82.5-122Q261-804 331-834t149-30q80 0 149.5 30t122 82.5Q804-699 834-629.5T864-480q0 79-30 149t-82.5 122.5Q699-156 629.5-126T480-96Zm0-72q130 0 221-91t91-221q0-130-91-221t-221-91q-130 0-221 91t-91 221q0 130 91 221t221 91Zm0-312Z"></path></svg>
				<?php _e( 'PHP Requirements', 'ohio-extra' ); ?></a>
		</div>
		<table class="clb-group-content clb-group-table">
			<tbody>
				<tr>
					<td><?php _e( 'Server Info:', 'ohio-extra' ); ?></td>
					<td>
						<!-- tip -->
						<a class="tip" data-tooltip="<?php _e( 'The PHP version of your WordPress installation.', 'ohio-extra' ); ?>" target="_blank" href="https://wordpress.org/support/update-php/"><svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="M480-240q20 0 34-14t14-34q0-20-14-34t-34-14q-20 0-34 14t-14 34q0 20 14 34t34 14Zm-36-153h73q0-37 6.5-52.5T555-485q35-34 48.5-58t13.5-53q0-55-37.5-89.5T484-720q-51 0-88.5 27T343-620l65 27q9-28 28.5-43.5T482-652q28 0 46 16t18 42q0 23-15.5 41T496-518q-35 32-43.5 52.5T444-393Zm36 297q-79 0-149-30t-122.5-82.5Q156-261 126-331T96-480q0-80 30-149.5t82.5-122Q261-804 331-834t149-30q80 0 149.5 30t122 82.5Q804-699 834-629.5T864-480q0 79-30 149t-82.5 122.5Q699-156 629.5-126T480-96Zm0-72q130 0 221-91t91-221q0-130-91-221t-221-91q-130 0-221 91t-91 221q0 130 91 221t221 91Zm0-312Z"/></svg></a>
					</td>
					<td>
						<?php echo $server_software; ?>
					</td>
				</tr>
				<tr>
					<td><?php _e( 'PHP Version:', 'ohio-extra' ); ?></td>
					<td>
						<!-- tip -->
						<a class="tip" data-tooltip="<?php _e( 'The PHP version of your WordPress installation.', 'ohio-extra' ); ?>" target="_blank" href="https://wordpress.org/support/update-php/"><svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="M480-240q20 0 34-14t14-34q0-20-14-34t-34-14q-20 0-34 14t-14 34q0 20 14 34t34 14Zm-36-153h73q0-37 6.5-52.5T555-485q35-34 48.5-58t13.5-53q0-55-37.5-89.5T484-720q-51 0-88.5 27T343-620l65 27q9-28 28.5-43.5T482-652q28 0 46 16t18 42q0 23-15.5 41T496-518q-35 32-43.5 52.5T444-393Zm36 297q-79 0-149-30t-122.5-82.5Q156-261 126-331T96-480q0-80 30-149.5t82.5-122Q261-804 331-834t149-30q80 0 149.5 30t122 82.5Q804-699 834-629.5T864-480q0 79-30 149t-82.5 122.5Q699-156 629.5-126T480-96Zm0-72q130 0 221-91t91-221q0-130-91-221t-221-91q-130 0-221 91t-91 221q0 130 91 221t221 91Zm0-312Z"/></svg></a>
					</td>
					<td>
						<?php
							if ( explode( ',', $php_version )[0] >= 7 ) {
								echo $php_version;
							} else {
								echo '<span class="error"><b>' . $php_version . '</b> - ';
								echo _e( 'The minimum PHP Version is', 'ohio-extra' ) . ' 7.4.0';
								echo '</span';
							}
						?>
					</td>
				</tr>
				<tr>
					<td><?php _e( 'PHP Memory Limit:', 'ohio-extra' ); ?></td>
					<td>
						<!-- tip -->
						<a class="tip" data-tooltip="<?php _e( 'memory_limit', 'ohio-extra' ); ?>" target="_blank" href="https://developer.wordpress.org/advanced-administration/performance/php/#configuration"><svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="M480-240q20 0 34-14t14-34q0-20-14-34t-34-14q-20 0-34 14t-14 34q0 20 14 34t34 14Zm-36-153h73q0-37 6.5-52.5T555-485q35-34 48.5-58t13.5-53q0-55-37.5-89.5T484-720q-51 0-88.5 27T343-620l65 27q9-28 28.5-43.5T482-652q28 0 46 16t18 42q0 23-15.5 41T496-518q-35 32-43.5 52.5T444-393Zm36 297q-79 0-149-30t-122.5-82.5Q156-261 126-331T96-480q0-80 30-149.5t82.5-122Q261-804 331-834t149-30q80 0 149.5 30t122 82.5Q804-699 834-629.5T864-480q0 79-30 149t-82.5 122.5Q699-156 629.5-126T480-96Zm0-72q130 0 221-91t91-221q0-130-91-221t-221-91q-130 0-221 91t-91 221q0 130 91 221t221 91Zm0-312Z"/></svg></a>
					</td>
					<td>
						<?php
							if ( intval( $php_memory_limit ) >= 256 ) {
								echo $php_memory_limit;
							} else {
								echo '<span class="error"><b>' . $php_memory_limit . '</b> - ';
								echo _e( 'The minimum PHP Memory Limit value is', 'ohio-extra' ) . ' 256M';
								echo '</span';
							}
						?>
					</td>
				</tr>
				<tr>
					<td><?php _e( 'PHP Time Limit:', 'ohio-extra' ); ?></td>
					<td>
						<!-- tip -->
						<a class="tip" data-tooltip="<?php _e( 'max_execution_time', 'ohio-extra' ); ?>" target="_blank" href="https://developer.wordpress.org/advanced-administration/performance/php/#configuration"><svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="M480-240q20 0 34-14t14-34q0-20-14-34t-34-14q-20 0-34 14t-14 34q0 20 14 34t34 14Zm-36-153h73q0-37 6.5-52.5T555-485q35-34 48.5-58t13.5-53q0-55-37.5-89.5T484-720q-51 0-88.5 27T343-620l65 27q9-28 28.5-43.5T482-652q28 0 46 16t18 42q0 23-15.5 41T496-518q-35 32-43.5 52.5T444-393Zm36 297q-79 0-149-30t-122.5-82.5Q156-261 126-331T96-480q0-80 30-149.5t82.5-122Q261-804 331-834t149-30q80 0 149.5 30t122 82.5Q804-699 834-629.5T864-480q0 79-30 149t-82.5 122.5Q699-156 629.5-126T480-96Zm0-72q130 0 221-91t91-221q0-130-91-221t-221-91q-130 0-221 91t-91 221q0 130 91 221t221 91Zm0-312Z"/></svg></a>
					</td>
					<td>
						<?php
							if ( $php_time_limit >= 300 ) {
								echo $php_time_limit;
							} else {
								echo '<span class="error"><b>' . $php_time_limit . '</b> - ';
								echo _e( 'The minimum PHP Time Limit value is', 'ohio-extra' ) . ' 300';
								echo '</span';
							}
						?>
					</td>
				</tr>
				<tr>
					<td><?php _e( 'WP Max Upload Size:', 'ohio-extra' ); ?></td>
					<td>
						<!-- tip -->
						<a class="tip" data-tooltip="<?php _e( 'upload_max_filesize', 'ohio-extra' ); ?>" target="_blank" href="https://developer.wordpress.org/advanced-administration/performance/php/#configuration"><svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="M480-240q20 0 34-14t14-34q0-20-14-34t-34-14q-20 0-34 14t-14 34q0 20 14 34t34 14Zm-36-153h73q0-37 6.5-52.5T555-485q35-34 48.5-58t13.5-53q0-55-37.5-89.5T484-720q-51 0-88.5 27T343-620l65 27q9-28 28.5-43.5T482-652q28 0 46 16t18 42q0 23-15.5 41T496-518q-35 32-43.5 52.5T444-393Zm36 297q-79 0-149-30t-122.5-82.5Q156-261 126-331T96-480q0-80 30-149.5t82.5-122Q261-804 331-834t149-30q80 0 149.5 30t122 82.5Q804-699 834-629.5T864-480q0 79-30 149t-82.5 122.5Q699-156 629.5-126T480-96Zm0-72q130 0 221-91t91-221q0-130-91-221t-221-91q-130 0-221 91t-91 221q0 130 91 221t221 91Zm0-312Z"/></svg></a>
					</td>
					<td>
						<?php
							if ( intval( $php_max_upload_size ) >= 32 ) {
								echo $php_max_upload_size;
							} else {
								echo '<span class="error"><b>' . $php_max_upload_size . '</b> - ';
								echo _e( 'The minimum WP Max Upload Size value is', 'ohio-extra' ) . ' 32M';
								echo '</span';
							}
						?>
					</td>
				</tr>
				<tr>
					<td><?php _e( 'File Upload Permission:', 'ohio-extra' ); ?></td>
					<td>
						<!-- tip -->
						<a class="tip" data-tooltip="<?php _e( 'file_uploads', 'ohio-extra' ); ?>" target="_blank" href="https://developer.wordpress.org/advanced-administration/performance/php/#configuration"><svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="M480-240q20 0 34-14t14-34q0-20-14-34t-34-14q-20 0-34 14t-14 34q0 20 14 34t34 14Zm-36-153h73q0-37 6.5-52.5T555-485q35-34 48.5-58t13.5-53q0-55-37.5-89.5T484-720q-51 0-88.5 27T343-620l65 27q9-28 28.5-43.5T482-652q28 0 46 16t18 42q0 23-15.5 41T496-518q-35 32-43.5 52.5T444-393Zm36 297q-79 0-149-30t-122.5-82.5Q156-261 126-331T96-480q0-80 30-149.5t82.5-122Q261-804 331-834t149-30q80 0 149.5 30t122 82.5Q804-699 834-629.5T864-480q0 79-30 149t-82.5 122.5Q699-156 629.5-126T480-96Zm0-72q130 0 221-91t91-221q0-130-91-221t-221-91q-130 0-221 91t-91 221q0 130 91 221t221 91Zm0-312Z"/></svg></a>
					</td>
					<td>
						<?php
							$file_uploads = is_numeric( ini_get( 'file_uploads' ) ) ? ( ini_get( 'file_uploads' ) ? 'On' : 'Off' ) : ini_get( 'file_uploads' );
							if ( $file_uploads == 'On' ) {
								echo '<label class="active"><svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="m429-336 238-237-51-51-187 186-85-84-51 51 136 135Zm51 240q-79 0-149-30t-122.5-82.5Q156-261 126-331T96-480q0-80 30-149.5t82.5-122Q261-804 331-834t149-30q80 0 149.5 30t122 82.5Q804-699 834-629.5T864-480q0 79-30 149t-82.5 122.5Q699-156 629.5-126T480-96Zm0-72q130 0 221-91t91-221q0-130-91-221t-221-91q-130 0-221 91t-91 221q0 130 91 221t221 91Zm0-312Z"></path></svg>';
								echo _e( 'Available', 'ohio-extra' );
								echo '</label';
							} else {
								echo '<label class="inactive"><svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="M480.28-96Q401-96 331-126t-122.5-82.5Q156-261 126-330.96t-30-149.5Q96-560 126-629.5q30-69.5 82.5-122T330.96-834q69.96-30 149.5-30t149.04 30q69.5 30 122 82.5T834-629.28q30 69.73 30 149Q864-401 834-331t-82.5 122.5Q699-156 629.28-126q-69.73 30-149 30Zm-.28-72q130 0 221-91t91-221q0-130-91-221t-221-91q-130 0-221 91t-91 221q0 130 91 221t221 91Zm0-312Z"></path></svg>';
								echo _e( 'Disabled', 'ohio-extra' );
								echo '</label';
							}
						?>
					</td>
				</tr>
				<tr>
					<td><?php _e( 'Database Version:', 'ohio-extra' ); ?></td>
					<td>
						<!-- tip -->
						<span class="tip" data-tooltip="<?php _e( 'Your current MySQL version.', 'ohio-extra' ); ?>"><svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="M480-240q20 0 34-14t14-34q0-20-14-34t-34-14q-20 0-34 14t-14 34q0 20 14 34t34 14Zm-36-153h73q0-37 6.5-52.5T555-485q35-34 48.5-58t13.5-53q0-55-37.5-89.5T484-720q-51 0-88.5 27T343-620l65 27q9-28 28.5-43.5T482-652q28 0 46 16t18 42q0 23-15.5 41T496-518q-35 32-43.5 52.5T444-393Zm36 297q-79 0-149-30t-122.5-82.5Q156-261 126-331T96-480q0-80 30-149.5t82.5-122Q261-804 331-834t149-30q80 0 149.5 30t122 82.5Q804-699 834-629.5T864-480q0 79-30 149t-82.5 122.5Q699-156 629.5-126T480-96Zm0-72q130 0 221-91t91-221q0-130-91-221t-221-91q-130 0-221 91t-91 221q0 130 91 221t221 91Zm0-312Z"/></svg></span>
					</td>
					<td>
						<?php echo $mysql_version; ?>
					</td>
				</tr>
			</tbody>
		</table>
		<div class="clb-group-footer">
			<?php _e( 'Contact your hosting provider and ask them to increase the limits to a minimum of the following.', 'ohio-extra' ); ?>
		</div>
	</div>

	<!-- Group 2cl -->
	<div class="clb-group">
		<div class="clb-group-headline">
			<h2><?php _e( 'WordPress Environment', 'ohio-extra' ); ?></h2>
		</div>
		<table class="clb-group-content clb-group-table">
			<tbody>
				<tr>
					<td><?php _e( 'Home URL:', 'ohio-extra' ); ?></td>
					<td>
						<!-- tip -->
						<span class="tip" data-tooltip="<?php _e( 'Your site\'s homepage URL.', 'ohio-extra' ); ?>"><svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="M480-240q20 0 34-14t14-34q0-20-14-34t-34-14q-20 0-34 14t-14 34q0 20 14 34t34 14Zm-36-153h73q0-37 6.5-52.5T555-485q35-34 48.5-58t13.5-53q0-55-37.5-89.5T484-720q-51 0-88.5 27T343-620l65 27q9-28 28.5-43.5T482-652q28 0 46 16t18 42q0 23-15.5 41T496-518q-35 32-43.5 52.5T444-393Zm36 297q-79 0-149-30t-122.5-82.5Q156-261 126-331T96-480q0-80 30-149.5t82.5-122Q261-804 331-834t149-30q80 0 149.5 30t122 82.5Q804-699 834-629.5T864-480q0 79-30 149t-82.5 122.5Q699-156 629.5-126T480-96Zm0-72q130 0 221-91t91-221q0-130-91-221t-221-91q-130 0-221 91t-91 221q0 130 91 221t221 91Zm0-312Z"/></svg></span>
					</td>
					<td>
						<?php echo get_home_url(); ?>
					</td>
				</tr>
				<tr>
					<td><?php _e( 'Site URL:', 'ohio-extra' ); ?></td>
					<td>
						<!-- tip -->
						<span class="tip" data-tooltip="<?php _e( 'The root URL of your WordPress installation.', 'ohio-extra' ); ?>"><svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="M480-240q20 0 34-14t14-34q0-20-14-34t-34-14q-20 0-34 14t-14 34q0 20 14 34t34 14Zm-36-153h73q0-37 6.5-52.5T555-485q35-34 48.5-58t13.5-53q0-55-37.5-89.5T484-720q-51 0-88.5 27T343-620l65 27q9-28 28.5-43.5T482-652q28 0 46 16t18 42q0 23-15.5 41T496-518q-35 32-43.5 52.5T444-393Zm36 297q-79 0-149-30t-122.5-82.5Q156-261 126-331T96-480q0-80 30-149.5t82.5-122Q261-804 331-834t149-30q80 0 149.5 30t122 82.5Q804-699 834-629.5T864-480q0 79-30 149t-82.5 122.5Q699-156 629.5-126T480-96Zm0-72q130 0 221-91t91-221q0-130-91-221t-221-91q-130 0-221 91t-91 221q0 130 91 221t221 91Zm0-312Z"/></svg></span>
					</td>
					<td>
						<?php echo get_site_url(); ?>
					</td>
				</tr>
				<tr>
					<td><?php _e( 'WordPress Path:', 'ohio-extra' ); ?></td>
					<td>
						<!-- tip -->
						<span class="tip" data-tooltip="<?php _e( 'System path of the WordPress root directory.', 'ohio-extra' ); ?>"><svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="M480-240q20 0 34-14t14-34q0-20-14-34t-34-14q-20 0-34 14t-14 34q0 20 14 34t34 14Zm-36-153h73q0-37 6.5-52.5T555-485q35-34 48.5-58t13.5-53q0-55-37.5-89.5T484-720q-51 0-88.5 27T343-620l65 27q9-28 28.5-43.5T482-652q28 0 46 16t18 42q0 23-15.5 41T496-518q-35 32-43.5 52.5T444-393Zm36 297q-79 0-149-30t-122.5-82.5Q156-261 126-331T96-480q0-80 30-149.5t82.5-122Q261-804 331-834t149-30q80 0 149.5 30t122 82.5Q804-699 834-629.5T864-480q0 79-30 149t-82.5 122.5Q699-156 629.5-126T480-96Zm0-72q130 0 221-91t91-221q0-130-91-221t-221-91q-130 0-221 91t-91 221q0 130 91 221t221 91Zm0-312Z"/></svg></span>
					</td>
					<td>
						<?php echo ( $wp_path ); ?>
					</td>
				</tr>
				<tr>
					<td><?php _e( 'WP Version:', 'ohio-extra' ); ?></td>
					<td>
						<!-- tip -->
						<span class="tip" data-tooltip="<?php _e( 'The version of your WordPress installation.', 'ohio-extra' ); ?>"><svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="M480-240q20 0 34-14t14-34q0-20-14-34t-34-14q-20 0-34 14t-14 34q0 20 14 34t34 14Zm-36-153h73q0-37 6.5-52.5T555-485q35-34 48.5-58t13.5-53q0-55-37.5-89.5T484-720q-51 0-88.5 27T343-620l65 27q9-28 28.5-43.5T482-652q28 0 46 16t18 42q0 23-15.5 41T496-518q-35 32-43.5 52.5T444-393Zm36 297q-79 0-149-30t-122.5-82.5Q156-261 126-331T96-480q0-80 30-149.5t82.5-122Q261-804 331-834t149-30q80 0 149.5 30t122 82.5Q804-699 834-629.5T864-480q0 79-30 149t-82.5 122.5Q699-156 629.5-126T480-96Zm0-72q130 0 221-91t91-221q0-130-91-221t-221-91q-130 0-221 91t-91 221q0 130 91 221t221 91Zm0-312Z"/></svg></span>
					</td>
					<td>
						<?php
							if ( !isset( $wp_verion ) && defined( 'ABSPATH' ) && defined( 'WPINC' ) ) {
								include ABSPATH . WPINC . '/version.php';
							}

							$wp_version_exploded = isset( $wp_version ) ? explode( '.', $wp_version ) : [ '1' ];

							if ( !isset( $wp_version ) ) {
								$wp_version = 'Undefined';
							}

							if ( $wp_version_exploded[0] >= 5 ) {
								echo $wp_version;
							} else {
								echo '<mark class="error">' . $wp_version . '</mark>';
							}
						?>
					</td>
				</tr>
				<tr>
					<td><?php _e( 'WP Language:', 'ohio-extra' ); ?></td>
					<td>
						<!-- tip -->
						<span class="tip" data-tooltip="<?php _e( 'The language of your WordPress site.', 'ohio-extra' ); ?>"><svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="M480-240q20 0 34-14t14-34q0-20-14-34t-34-14q-20 0-34 14t-14 34q0 20 14 34t34 14Zm-36-153h73q0-37 6.5-52.5T555-485q35-34 48.5-58t13.5-53q0-55-37.5-89.5T484-720q-51 0-88.5 27T343-620l65 27q9-28 28.5-43.5T482-652q28 0 46 16t18 42q0 23-15.5 41T496-518q-35 32-43.5 52.5T444-393Zm36 297q-79 0-149-30t-122.5-82.5Q156-261 126-331T96-480q0-80 30-149.5t82.5-122Q261-804 331-834t149-30q80 0 149.5 30t122 82.5Q804-699 834-629.5T864-480q0 79-30 149t-82.5 122.5Q699-156 629.5-126T480-96Zm0-72q130 0 221-91t91-221q0-130-91-221t-221-91q-130 0-221 91t-91 221q0 130 91 221t221 91Zm0-312Z"/></svg></span>
					</td>
					<td>
						<?php echo get_locale(); ?>
					</td>
				</tr>
				<tr>
					<td><?php _e( 'WP Multisite:', 'ohio-extra' ); ?></td>
					<td>
						<!-- tip -->
						<a class="tip" data-tooltip="<?php _e( 'Feature to create several instances of WordPress.', 'ohio-extra' ); ?>" target="_blank" href="https://developer.wordpress.org/advanced-administration/multisite/"><svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="M480-240q20 0 34-14t14-34q0-20-14-34t-34-14q-20 0-34 14t-14 34q0 20 14 34t34 14Zm-36-153h73q0-37 6.5-52.5T555-485q35-34 48.5-58t13.5-53q0-55-37.5-89.5T484-720q-51 0-88.5 27T343-620l65 27q9-28 28.5-43.5T482-652q28 0 46 16t18 42q0 23-15.5 41T496-518q-35 32-43.5 52.5T444-393Zm36 297q-79 0-149-30t-122.5-82.5Q156-261 126-331T96-480q0-80 30-149.5t82.5-122Q261-804 331-834t149-30q80 0 149.5 30t122 82.5Q804-699 834-629.5T864-480q0 79-30 149t-82.5 122.5Q699-156 629.5-126T480-96Zm0-72q130 0 221-91t91-221q0-130-91-221t-221-91q-130 0-221 91t-91 221q0 130 91 221t221 91Zm0-312Z"/></svg></a>
					</td>
					<td>
						<?php
							if ( is_multisite() ) { 
								echo '<label class="active"><svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="m429-336 238-237-51-51-187 186-85-84-51 51 136 135Zm51 240q-79 0-149-30t-122.5-82.5Q156-261 126-331T96-480q0-80 30-149.5t82.5-122Q261-804 331-834t149-30q80 0 149.5 30t122 82.5Q804-699 834-629.5T864-480q0 79-30 149t-82.5 122.5Q699-156 629.5-126T480-96Zm0-72q130 0 221-91t91-221q0-130-91-221t-221-91q-130 0-221 91t-91 221q0 130 91 221t221 91Zm0-312Z"/></svg>';
								echo _e( 'Enabled', 'ohio-extra' );
								echo '</label>';
							} else {
								echo '<label><svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="M480-288v-384q-80 0-136 56.23-56 56.22-56 136Q288-400 344.16-344q56.16 56 135.84 56Zm.28 192Q401-96 331-126t-122.5-82.5Q156-261 126-330.96t-30-149.5Q96-560 126-629.5q30-69.5 82.5-122T330.96-834q69.96-30 149.5-30t149.04 30q69.5 30 122 82.5T834-629.28q30 69.73 30 149Q864-401 834-331t-82.5 122.5Q699-156 629.28-126q-69.73 30-149 30Zm-.28-72q130 0 221-91t91-221q0-130-91-221t-221-91q-130 0-221 91t-91 221q0 130 91 221t221 91Zm0-312Z"/></svg>';
								echo _e( 'Disabled', 'ohio-extra' );
								echo '</label>';
							}
						?>
					</td>
				</tr>
				<tr>
					<td><?php _e( 'WordPress Memory Limit:', 'ohio-extra' ); ?></td>
					<td>
						<!-- tip -->
						<a class="tip" data-tooltip="<?php _e( 'memory_limit', 'ohio-extra' ); ?>" target="_blank" href="https://developer.wordpress.org/advanced-administration/performance/php/#configuration"><svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="M480-240q20 0 34-14t14-34q0-20-14-34t-34-14q-20 0-34 14t-14 34q0 20 14 34t34 14Zm-36-153h73q0-37 6.5-52.5T555-485q35-34 48.5-58t13.5-53q0-55-37.5-89.5T484-720q-51 0-88.5 27T343-620l65 27q9-28 28.5-43.5T482-652q28 0 46 16t18 42q0 23-15.5 41T496-518q-35 32-43.5 52.5T444-393Zm36 297q-79 0-149-30t-122.5-82.5Q156-261 126-331T96-480q0-80 30-149.5t82.5-122Q261-804 331-834t149-30q80 0 149.5 30t122 82.5Q804-699 834-629.5T864-480q0 79-30 149t-82.5 122.5Q699-156 629.5-126T480-96Zm0-72q130 0 221-91t91-221q0-130-91-221t-221-91q-130 0-221 91t-91 221q0 130 91 221t221 91Zm0-312Z"/></svg></a>
					</td>
					<td>
						<?php
							if ( intval( $php_memory_limit ) >= 256 ) {
								echo $php_memory_limit;
							} else {
								echo '<span class="error"><b>' . $php_memory_limit . '</b> - ';
								echo _e( 'The minimum PHP Memory Limit value is', 'ohio-extra' ) . ' 256M';
								echo '</span';
							}
						?>
					</td>
				</tr>
				<tr>
					<td><?php _e( 'WordPress Debug Mode:', 'ohio-extra' ); ?></td>
					<td>
						<!-- tip -->
						<a class="tip" data-tooltip="<?php _e( 'PHP errors, warnings, and notices visibility.', 'ohio-extra' ); ?>" target="_blank" href="https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/"><svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="M480-240q20 0 34-14t14-34q0-20-14-34t-34-14q-20 0-34 14t-14 34q0 20 14 34t34 14Zm-36-153h73q0-37 6.5-52.5T555-485q35-34 48.5-58t13.5-53q0-55-37.5-89.5T484-720q-51 0-88.5 27T343-620l65 27q9-28 28.5-43.5T482-652q28 0 46 16t18 42q0 23-15.5 41T496-518q-35 32-43.5 52.5T444-393Zm36 297q-79 0-149-30t-122.5-82.5Q156-261 126-331T96-480q0-80 30-149.5t82.5-122Q261-804 331-834t149-30q80 0 149.5 30t122 82.5Q804-699 834-629.5T864-480q0 79-30 149t-82.5 122.5Q699-156 629.5-126T480-96Zm0-72q130 0 221-91t91-221q0-130-91-221t-221-91q-130 0-221 91t-91 221q0 130 91 221t221 91Zm0-312Z"/></svg></a>
					</td>
					<td>
						<?php
							if ( defined('WP_DEBUG') && true === WP_DEBUG ) {
								echo '<label><svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="m429-336 238-237-51-51-187 186-85-84-51 51 136 135Zm51 240q-79 0-149-30t-122.5-82.5Q156-261 126-331T96-480q0-80 30-149.5t82.5-122Q261-804 331-834t149-30q80 0 149.5 30t122 82.5Q804-699 834-629.5T864-480q0 79-30 149t-82.5 122.5Q699-156 629.5-126T480-96Zm0-72q130 0 221-91t91-221q0-130-91-221t-221-91q-130 0-221 91t-91 221q0 130 91 221t221 91Zm0-312Z"/></svg>';
								echo _e( 'Enabled', 'ohio-extra' );
								echo '</label';
							} else {
								echo '<label class="inactive"><svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="M480.28-96Q401-96 331-126t-122.5-82.5Q156-261 126-330.96t-30-149.5Q96-560 126-629.5q30-69.5 82.5-122T330.96-834q69.96-30 149.5-30t149.04 30q69.5 30 122 82.5T834-629.28q30 69.73 30 149Q864-401 834-331t-82.5 122.5Q699-156 629.28-126q-69.73 30-149 30Zm-.28-72q130 0 221-91t91-221q0-130-91-221t-221-91q-130 0-221 91t-91 221q0 130 91 221t221 91Zm0-312Z"/></svg>';
								echo _e( 'Hidden', 'ohio-extra' );
								echo '</label';
							}
						?>
					</td>
				</tr>
			</tbody>
		</table>
	</div>

	<!-- Group 2cl -->
	<div class="clb-group">
		<div class="clb-group-headline">
			<h2><?php _e( 'Security', 'ohio-extra' ); ?></h2>
		</div>
		<table class="clb-group-content clb-group-table">
			<tbody>
				<tr>
					<td><?php _e( 'Secure Connection (HTTPS)', 'ohio-extra' ); ?></td>
					<td>
						<!-- tip -->
						<a class="tip" data-tooltip="<?php _e( 'HTTPS protects your users\' privacy and security.', 'ohio-extra' ); ?>" target="_blank" href="https://web.dev/articles/why-https-matters"><svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="M480-240q20 0 34-14t14-34q0-20-14-34t-34-14q-20 0-34 14t-14 34q0 20 14 34t34 14Zm-36-153h73q0-37 6.5-52.5T555-485q35-34 48.5-58t13.5-53q0-55-37.5-89.5T484-720q-51 0-88.5 27T343-620l65 27q9-28 28.5-43.5T482-652q28 0 46 16t18 42q0 23-15.5 41T496-518q-35 32-43.5 52.5T444-393Zm36 297q-79 0-149-30t-122.5-82.5Q156-261 126-331T96-480q0-80 30-149.5t82.5-122Q261-804 331-834t149-30q80 0 149.5 30t122 82.5Q804-699 834-629.5T864-480q0 79-30 149t-82.5 122.5Q699-156 629.5-126T480-96Zm0-72q130 0 221-91t91-221q0-130-91-221t-221-91q-130 0-221 91t-91 221q0 130 91 221t221 91Zm0-312Z"/></svg></span>
					</td>
					<td>
						<?php
							if ( is_ssl() ) {
								echo '<label class="active"><svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="m429-336 238-237-51-51-187 186-85-84-51 51 136 135Zm51 240q-79 0-149-30t-122.5-82.5Q156-261 126-331T96-480q0-80 30-149.5t82.5-122Q261-804 331-834t149-30q80 0 149.5 30t122 82.5Q804-699 834-629.5T864-480q0 79-30 149t-82.5 122.5Q699-156 629.5-126T480-96Zm0-72q130 0 221-91t91-221q0-130-91-221t-221-91q-130 0-221 91t-91 221q0 130 91 221t221 91Zm0-312Z"/></svg>';
								echo _e( 'Secured', 'ohio-extra' );
								echo '</label';
							} else {
								echo '<label class="inactive"><svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="M480.28-96Q401-96 331-126t-122.5-82.5Q156-261 126-330.96t-30-149.5Q96-560 126-629.5q30-69.5 82.5-122T330.96-834q69.96-30 149.5-30t149.04 30q69.5 30 122 82.5T834-629.28q30 69.73 30 149Q864-401 834-331t-82.5 122.5Q699-156 629.28-126q-69.73 30-149 30Zm-.28-72q130 0 221-91t91-221q0-130-91-221t-221-91q-130 0-221 91t-91 221q0 130 91 221t221 91Zm0-312Z"/></svg>';
								echo _e( 'Not secured', 'ohio-extra' );
								echo '</label';
							}
						?>
					</td>
				</tr>
				<tr>
					<td><?php _e( 'Hide Errors (WP_DEBUG):', 'ohio-extra' ); ?></td>
					<td>
						<!-- tip -->
						<a class="tip" data-tooltip="<?php _e( 'PHP errors, warnings, and notices visibility.', 'ohio-extra' ); ?>" target="_blank" href="https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/"><svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="M480-240q20 0 34-14t14-34q0-20-14-34t-34-14q-20 0-34 14t-14 34q0 20 14 34t34 14Zm-36-153h73q0-37 6.5-52.5T555-485q35-34 48.5-58t13.5-53q0-55-37.5-89.5T484-720q-51 0-88.5 27T343-620l65 27q9-28 28.5-43.5T482-652q28 0 46 16t18 42q0 23-15.5 41T496-518q-35 32-43.5 52.5T444-393Zm36 297q-79 0-149-30t-122.5-82.5Q156-261 126-331T96-480q0-80 30-149.5t82.5-122Q261-804 331-834t149-30q80 0 149.5 30t122 82.5Q804-699 834-629.5T864-480q0 79-30 149t-82.5 122.5Q699-156 629.5-126T480-96Zm0-72q130 0 221-91t91-221q0-130-91-221t-221-91q-130 0-221 91t-91 221q0 130 91 221t221 91Zm0-312Z"/></svg></a>
					</td>
					<td>
						<?php
							if ( defined('WP_DEBUG') && true === WP_DEBUG ) {
								echo '<label class="inactive"><svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="M480.28-96Q401-96 331-126t-122.5-82.5Q156-261 126-330.96t-30-149.5Q96-560 126-629.5q30-69.5 82.5-122T330.96-834q69.96-30 149.5-30t149.04 30q69.5 30 122 82.5T834-629.28q30 69.73 30 149Q864-401 834-331t-82.5 122.5Q699-156 629.28-126q-69.73 30-149 30Zm-.28-72q130 0 221-91t91-221q0-130-91-221t-221-91q-130 0-221 91t-91 221q0 130 91 221t221 91Zm0-312Z"/></svg>';
								echo _e( 'Displayed', 'ohio-extra' );
								echo '</label';
							} else {
								echo '<label><svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="m429-336 238-237-51-51-187 186-85-84-51 51 136 135Zm51 240q-79 0-149-30t-122.5-82.5Q156-261 126-331T96-480q0-80 30-149.5t82.5-122Q261-804 331-834t149-30q80 0 149.5 30t122 82.5Q804-699 834-629.5T864-480q0 79-30 149t-82.5 122.5Q699-156 629.5-126T480-96Zm0-72q130 0 221-91t91-221q0-130-91-221t-221-91q-130 0-221 91t-91 221q0 130 91 221t221 91Zm0-312Z"/></svg>';
								echo _e( 'Hidden', 'ohio-extra' );
								echo '</label';
							}
						?>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
