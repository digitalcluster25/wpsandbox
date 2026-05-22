<?php
	defined( 'ABSPATH' ) || exit;

	global $current_user;

	$ohio_theme = wp_get_theme( get_template() );
    $ohio_version = $ohio_theme->get( 'Version' ) ? $ohio_theme->get( 'Version' ) : '3.0.0';
    $support_timestamp = get_option( 'ohio_license_support_until' );
    $diff_timestamp = $support_timestamp - time();
    $days = ceil( $diff_timestamp / 60 / 60 / 24 );
?>

<div class="clb-headline">
	<div class="col clb-headline-icon">
		<?php 
			if ( get_option( 'show_avatars' ) == 1 && get_option( 'avatar_default' ) != 'blank' ) {
				echo get_avatar( $current_user->ID );
		  	} else {
			    echo '<svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="M237-285q54-38 115.5-56.5T480-360q66 0 127.5 18.5T723-285q35-41 52-91t17-104q0-129.67-91.23-220.84-91.23-91.16-221-91.16Q350-792 259-700.84 168-609.67 168-480q0 54 17 104t52 91Zm243-123q-60 0-102-42t-42-102q0-60 42-102t102-42q60 0 102 42t42 102q0 60-42 102t-102 42Zm.28 312Q401-96 331-126t-122.5-82.5Q156-261 126-330.96t-30-149.5Q96-560 126-629.5q30-69.5 82.5-122T330.96-834q69.96-30 149.5-30t149.04 30q69.5 30 122 82.5T834-629.28q30 69.73 30 149Q864-401 834-331t-82.5 122.5Q699-156 629.28-126q-69.73 30-149 30Zm-.28-72q52 0 100-16.5t90-48.5q-43-27-91-41t-99-14q-51 0-99.5 13.5T290-233q42 32 90 48.5T480-168Zm0-312q30 0 51-21t21-51q0-30-21-51t-51-21q-30 0-51 21t-21 51q0 30 21 51t51 21Zm0-72Zm0 319Z"/></svg>';
		  	}
		?>
	</div>
	<div class="col">
		<h1><?php printf( esc_html__( '👋 Hey, %1$s', 'ohio-extra' ), $current_user->display_name ); ?></h1>
		<p>
			<?php _e( 'Thank you for choosing Ohio. Now it\'s time to create something awesome.', 'ohio-extra' ); ?>
		</p>
	</div>
</div>

<?php if ( get_option( 'ohio_license_code', false ) ): ?>

	<div class="row">
		<div class="-col-8">
			<div class="row">
				<div class="-col-6">

					<?php if ( !function_exists( 'acf_get_options_page' ) ): ?>

					<!-- group ACF PRO disabled warning -->
					<div class="clb-group -danger">
						<div class="clb-group-headline">
							<h2><?php _e( 'ACF PRO is Required', 'ohio-extra' ); ?></h2>
							<a target="_blank" href="<?php echo admin_url('themes.php?page=install-required-plugins'); ?>" class="btn"><?php _e( 'Install ACF PRO', 'ohio-extra' ); ?></a>
						</div>
						<div class="clb-group-content">

							<!-- row -->
							<div class="row -status">
								<span class="status-icon">
									<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"><path d="M74.62-140 480-840l405.38 700H74.62ZM178-200h604L480-720 178-200Zm302-47.69q13.73 0 23.02-9.29t9.29-23.02q0-13.73-9.29-23.02T480-312.31q-13.73 0-23.02 9.29T447.69-280q0 13.73 9.29 23.02t23.02 9.29Zm-30-104.62h60v-200h-60v200ZM480-460Z"/></svg>
								</span>
								<div class="holder">
									<?php _e( 'Install and activate ACF PRO plugin to enable Theme Settings panel.', 'ohio-extra' ); ?>
								</div>
							</div>
						</div>
					</div>

					<?php endif; ?>

					<?php
						$last_stable = get_option( 'ohio_last_available_version', '2.0.0' );
						$is_updated = version_compare( $ohio_version, $last_stable ) >= 0;

						if ( $is_updated ):
					?>
						<!-- group Ohio Version -->
						<div class="clb-group">
							<div class="clb-group-headline">
								<h2><?php _e( 'Ohio is up to date', 'ohio-extra' ); ?></h2>
							</div>
							<div class="clb-group-content">
	
								<!-- row -->
								<div class="row -status">
									<span class="status-icon">
										<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"><path d="M382-336.16 176.92-541.23 219.69-584 382-421.69 740.31-780l42.77 42.77L382-336.16ZM220-180v-60h520v60H220Z"/></svg>
									</span>
									<div class="holder">
										<div class="caption"><?php _e( 'Version', 'ohio-extra' ); ?> <?php echo( $ohio_version ); ?></div>
										<?php _e( 'You are using the latest version.', 'ohio-extra' ); ?>
									</div>
								</div>
							</div>
						</div>
					<?php else: ?>
						<!-- group Ohio Version warning -->
						<div class="clb-group -warning">
							<div class="clb-group-headline">
								<h2><?php _e( 'Update Required', 'ohio-extra' ); ?></h2>

								<!-- tip -->
								<a class="tip" target="_blank" href="https://docs.clbthemes.com/ohio/#updating"><svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="M480-240q20 0 34-14t14-34q0-20-14-34t-34-14q-20 0-34 14t-14 34q0 20 14 34t34 14Zm-36-153h73q0-37 6.5-52.5T555-485q35-34 48.5-58t13.5-53q0-55-37.5-89.5T484-720q-51 0-88.5 27T343-620l65 27q9-28 28.5-43.5T482-652q28 0 46 16t18 42q0 23-15.5 41T496-518q-35 32-43.5 52.5T444-393Zm36 297q-79 0-149-30t-122.5-82.5Q156-261 126-331T96-480q0-80 30-149.5t82.5-122Q261-804 331-834t149-30q80 0 149.5 30t122 82.5Q804-699 834-629.5T864-480q0 79-30 149t-82.5 122.5Q699-156 629.5-126T480-96Zm0-72q130 0 221-91t91-221q0-130-91-221t-221-91q-130 0-221 91t-91 221q0 130 91 221t221 91Zm0-312Z"/></svg></a>
							</div>
							<div class="clb-group-content">

								<!-- row -->
								<div class="row -status">
									<span class="status-icon">
										<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"><path d="M450-290h60v-230h-60v230Zm30-298.46q13.73 0 23.02-9.29t9.29-23.02q0-13.73-9.29-23.02-9.29-9.28-23.02-9.28t-23.02 9.28q-9.29 9.29-9.29 23.02t9.29 23.02q9.29 9.29 23.02 9.29Zm.07 488.46q-78.84 0-148.21-29.92t-120.68-81.21q-51.31-51.29-81.25-120.63Q100-401.1 100-479.93q0-78.84 29.92-148.21t81.21-120.68q51.29-51.31 120.63-81.25Q401.1-860 479.93-860q78.84 0 148.21 29.92t120.68 81.21q51.31 51.29 81.25 120.63Q860-558.9 860-480.07q0 78.84-29.92 148.21t-81.21 120.68q-51.29 51.31-120.63 81.25Q558.9-100 480.07-100Zm-.07-60q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z"/></svg>
									</span>
									<div class="holder">
										<div class="caption"><?php _e( 'Version', 'ohio-extra' ); ?> <?php echo( $ohio_version ); ?></div>
										<?php _e( 'There\'s a new version of Ohio.', 'ohio-extra' ); ?>
									</div>
								</div>
							</div>
						</div>
					<?php endif; ?>

					<!-- group Feature Request -->
					<div class="clb-group">
						<div class="clb-group-headline">
							<h2><?php _e( 'Feature Request', 'ohio-extra' ); ?></h2>
						</div>
						<div class="clb-group-content">

							<!-- row -->
							<div class="row -block">
								<p>
									<?php _e( 'Let\'s make Ohio even better together!', 'ohio-extra' ); ?><br>
									<?php _e( 'Share your feature suggestion.', 'ohio-extra' ); ?>
								</p>
								<a class="btn btn-flat" href="https://ohio.featurebase.app/?b=672391f6c0750bfd81166278" target="_blank">
									<svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="M480-72q-26 0-49-12.5T397-120h-13q-30 0-51-21t-21-51v-150q-57-40-88.5-102T192-576q0-120 84-204t204-84q120 0 204 84t84 204q0 70-31.5 132T648-342v150q0 30-21 51t-51 21h-14q-11 23-33.5 35.5T480-72Zm-96-120h192v-48H384v48Zm0-96h192v-48H384v48Zm-38-120h110v-110l-89-89 34-34 79 79 79-79 34 34-89 89v110h110q38-31 60-74.5t22-93.5q0-90-63-153t-153-63q-90 0-153 63t-63 153q0 49 22 93t60 75Zm134-154Zm0-38Z"/></svg>
									<?php _e( 'Suggest a Feature', 'ohio-extra' ); ?>
								</a>
							</div>
						</div>
						<div class="clb-group-footer">
							<?php _e( 'Check', 'ohio-extra' ); ?>
							<a href="https://docs.clbthemes.com/ohio/release-notes/" target="_blank"><?php _e( 'Release Notes', 'ohio-extra' ); ?></a>
						</div>
					</div>
				</div>
				<div class="-col-6">
					<?php					
						$php_version = phpversion();
						$php_time_limit = ini_get('max_execution_time');
						$php_memory_limit = ini_get('memory_limit');
						$php_max_upload_size = ini_get('upload_max_filesize');
						$file_uploads = is_numeric( ini_get( 'file_uploads' ) ) ? ( ini_get( 'file_uploads' ) ? 'On' : 'Off' ) : ini_get( 'file_uploads' );

						$is_config_ok = explode( ',', $php_version )[0] >= 7
										&& intval( $php_memory_limit ) >= 256
										&& $php_time_limit >= 300
										&& intval( $php_max_upload_size ) >= 32
										&& $file_uploads === 'On';

						if ( $is_config_ok ):
					?>
						<!-- group System Status -->
						<div class="clb-group">
							<div class="clb-group-headline">
								<h2><?php _e( 'System Status', 'ohio-extra' ); ?></h2>
							</div>
							<div class="clb-group-content">

								<!-- row -->
								<div class="row -status">
									<span class="status-icon -success">
										<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"><path d="M382-336.16 176.92-541.23 219.69-584 382-421.69 740.31-780l42.77 42.77L382-336.16ZM220-180v-60h520v60H220Z"/></svg>
									</span>
									<div class="holder">
										<div class="caption"><?php _e( 'No Issues', 'ohio-extra' ); ?></div>
										<?php _e( 'Everything is configured properly.', 'ohio-extra' ); ?>
									</div>
								</div>
							</div>
						</div>
					<?php else: ?>
						<!-- group System Status warning -->
						<div class="clb-group -warning">
							<div class="clb-group-headline">
								<h2><?php _e( 'System Status', 'ohio-extra' ); ?></h2>
								<a id="check-issues" href="#" class="btn btn-flat"><?php _e( 'Check Issues', 'ohio-extra' ); ?></a>
							</div>
							<div class="clb-group-content">

								<!-- row -->
								<div class="row -status">
									<span class="status-icon -success">
										<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"><path d="M74.62-140 480-840l405.38 700H74.62ZM178-200h604L480-720 178-200Zm302-47.69q13.73 0 23.02-9.29t9.29-23.02q0-13.73-9.29-23.02T480-312.31q-13.73 0-23.02 9.29T447.69-280q0 13.73 9.29 23.02t23.02 9.29Zm-30-104.62h60v-200h-60v200ZM480-460Z"/></svg>
									</span>
									<div class="holder">
										<div class="caption"><?php _e( 'Issues Found', 'ohio-extra' ); ?></div>
										<?php _e( 'Demo import issues may occur.', 'ohio-extra' ); ?>
									</div>
								</div>
							</div>
						</div>
					<?php endif; ?>

					<!-- group Documentation -->
					<div class="clb-group">
						<div class="clb-group-headline">
							<h2><?php _e( 'Documentation', 'ohio-extra' ); ?></h2>
						</div>
						<div class="clb-group-content">

							<!-- row -->
							<div class="row -block">
								<p>
									<?php _e( 'Step-by-step instructions to unlock the power of Ohio with extensive tutorials.', 'ohio-extra' ); ?><br>
								</p>
								<a class="btn btn-flat" href="https://docs.clbthemes.com/ohio/" target="_blank">
									<svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="M216-305q8-3 16.87-5 8.86-2 19.13-2h36v-480h-36q-15.3 0-25.65 11Q216-770 216-756v451Zm36 209q-45 0-76.5-31.5T144-204v-552q0-45 31.5-76.5T252-864h268v72H360v480h240v-128h72v200H252q-15.3 0-25.65 10.29Q216-219.42 216-204.21t10.35 25.71Q236.7-168 252-168h492v-312h72v384H252Zm-36-209v-487 487Zm480-175q0-90.33 62.84-153.16Q821.67-696 912-696q-90.33 0-153.16-62.84Q696-821.67 696-912q0 90.33-62.84 153.16Q570.33-696 480-696q90.33 0 153.16 62.84Q696-570.33 696-480Z"/></svg>
									<?php _e( 'Read Docs', 'ohio-extra' ); ?></a>
							</div>
						</div>
						<div class="clb-group-footer">
							<?php _e( 'Looking for something else?', 'ohio-extra' ); ?>
							<a href="https://colabrio.ticksy.com/submit/" target="_blank"><?php _e( 'Open Ticket', 'ohio-extra' ); ?></a>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<!-- group FAQs -->
				<div class="clb-group">
					<div class="clb-group-headline">
						<h2><?php _e( 'FAQs', 'ohio-extra' ); ?></h2>
					</div>
					<div class="clb-group-content -nospace">
						<div class="ohio-accordion-sс accordion clb-accordion" id="accordion">

							<!-- accordion item -->
							<div class="accordionItem active">
								<div class="accordionItem_title">
									<div class="accordionItem_control btn-round btn-round-small btn-round-light">
										<i class="dashicons dashicons-minus"></i>
									</div>
									<h6><?php _e( 'Where do I find the Figma source files?', 'ohio-extra' ); ?></h6>
								</div>
								<div class="accordionItem_content visible">
									<p>
										Here’s <a href="https://demo.clbthemes.com/get_figma" target="_blank">the link to clone and get</a> the Figma source files.
									</p>
								</div>
							</div>

							<!-- accordion item -->
							<div class="accordionItem">
								<div class="accordionItem_title">
									<div class="accordionItem_control btn-round btn-round-small btn-round-light">
										<i class="dashicons dashicons-plus-alt2"></i>
									</div>
									<h6><?php _e( 'How to update ACF PRO, Slider Revolution or WPBakery Page Builder plugins?', 'ohio-extra' ); ?></h6>
								</div>
								<div class="accordionItem_content">
									<p>If you’ve received an alert about a plugin that needs to be updated, this could be because the new version of the plugin was recently released.</p>
									<div class="o-notice warning">
										<i class="icon"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"><path d="M74.62-140 480-840l405.38 700H74.62ZM178-200h604L480-720 178-200Zm302-47.69q13.73 0 23.02-9.29t9.29-23.02q0-13.73-9.29-23.02T480-312.31q-13.73 0-23.02 9.29T447.69-280q0 13.73 9.29 23.02t23.02 9.29Zm-30-104.62h60v-200h-60v200ZM480-460Z"/></svg></i>
										<div class="holder">
											Unless you have purchased the plugin separately, we will provide the latest version of the bundled plugin as soon as it’s been tested with our theme.
										</div>
									</div>
									<p>To get the latest version follow these steps:</p>
									<ul>
										<li>From the WordPress dashboard go to <em>Plugins → Installed Plugins</em> menu;</li>
										<li>Click the <strong>Update Required</strong> alert link;</li>
										<li>Mark all the plugins that you want to update and click the <strong>Apply</strong> button;</li>
									</ul>
									<p>If there are no <strong>Update Required</strong> alerts try to:</p>
									<ul>
										<li>Remove the required plugin under <em>Plugins</em> menu;</li>
										<li>Install the required plugin under <em>Appearance > Install Plugins</em> menu;</li>
										<li>You should get the latest available versions of bundled plugins directly from our server.</li>
									</ul>
								</div>
							</div>

							<!-- accordion item -->
							<div class="accordionItem">
								<div class="accordionItem_title">
									<div class="accordionItem_control btn-round btn-round-small btn-round-light">
										<i class="dashicons dashicons-plus-alt2"></i>
									</div>
									<h6>Going to import a demo, wondering if I will lose my changes?</h6>
								</div>
								<div class="accordionItem_content">
									<p>
										Demo content with posts, custom post types, pages, categories, tags, media files, local page settings and <a target="_blank" href="./admin.php?page=ohio_hub_settings">Theme Settings</a> will get imported.
									</p>
									<div class="o-notice warning">
										<i class="icon"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"><path d="M74.62-140 480-840l405.38 700H74.62ZM178-200h604L480-720 178-200Zm302-47.69q13.73 0 23.02-9.29t9.29-23.02q0-13.73-9.29-23.02T480-312.31q-13.73 0-23.02 9.29T447.69-280q0 13.73 9.29 23.02t23.02 9.29Zm-30-104.62h60v-200h-60v200ZM480-460Z"/></svg></i>
										<div class="holder">
											Note, <a target="_blank" href="./admin.php?page=ohio_hub_settings">Theme Settings</a> override with each new import. Toggle Theme Settings checkbox in the popup to import a demo without global options.
										</div>
									</div>
									<p>
										With new import, existing data such as posts, pages, categories, tags, media files, etc., will not be replaced or modified.
									</p>
								</div>
							</div>

							<!-- accordion item -->
							<div class="accordionItem">
								<div class="accordionItem_title">
									<div class="accordionItem_control btn-round btn-round-small btn-round-light">
										<i class="dashicons dashicons-plus-alt2"></i>
									</div>
									<h6>Can't update anything, constantly getting timed out.</h6>
								</div>
								<div class="accordionItem_content">
									<p>
										It's time to contact your <strong>Hosting Provider</strong> and ask to get helped;
									</p>
								</div>
							</div>

							<!-- accordion item -->
							<div class="accordionItem">
								<div class="accordionItem_title">
									<div class="accordionItem_control btn-round btn-round-small btn-round-light">
										<i class="dashicons dashicons-plus-alt2"></i>
									</div>
									<h6>Why WPML plugin doesn't come with your theme? You said it’s WPML-support.</h6>
								</div>
								<div class="accordionItem_content">
									<p>
										WPML-support means that Ohio is fully compatible with the plugin, but you need to buy the plugin license separatly to be able to use it.
									</p>
								</div>
							</div>

							<!-- accordion item -->
							<div class="accordionItem">
								<div class="accordionItem_title">
									<div class="accordionItem_control btn-round btn-round-small btn-round-light">
										<i class="dashicons dashicons-plus-alt2"></i>
									</div>
									<h6>I want to use Google Analytics on my website, it there a built-in option?</h6>
								</div>
								<div class="accordionItem_content">
									<p>
										You can add a Google Analytics Tracking Code directly to your site:
									</p>
									<ul>
										<li>From <a target="_blank" href="./admin.php?page=ohio_hub_settings">Theme Settings</a> go to <em>Custom CSS & JS → Custom JS → Header Custom JS</em>;</li>
										<li>Paste your <a target="_blank" href="https://support.google.com/analytics/answer/9539598?hl=en">Google Tracking Code</a>;</li>
										<li>Click the <strong>Save Changes</strong> button to apply and publish your changes.</li>
									</ul>
									<p>Another option is using third-party plugins, like <a target="_blank" href="https://wordpress.org/plugins/google-analytics-for-wordpress/">Google Analytics</a> by MonsterInsights.
									</p>
								</div>
							</div>

							<!-- Accordion item -->
							<div class="accordionItem">
								<div class="accordionItem_title">
									<div class="accordionItem_control btn-round btn-round-small btn-round-light">
										<i class="dashicons dashicons-plus-alt2"></i>
									</div>
									<h6><?php _e( 'How to change the front page of my site?', 'ohio-extra' ); ?></h6>
								</div>
								<div class="accordionItem_content ">
									<p>
										Make the following steps:
									</p>
									<ul>
										<li>From the WordPress dashboard go to <em>Settings → Reading</em>;</li>
										<li>Toggle <strong>A static page (select below)</strong>;
										<li>Select the required page from the <strong>Homepage</strong> dropdown menu;</li>
										<li>Click the <strong>Save Changes</strong> to apply and publish your changes.</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="clb-group-footer">
						<?php _e( 'Didn\'t find what you were looking for?', 'ohio-extra' ); ?>
						<a href="https://docs.clbthemes.com/ohio/faqs/" target="_blank"><?php _e( 'Check all FAQs', 'ohio-extra' ); ?></a>
					</div>
				</div>
			</div>
		</div>
		<div class="-col-4<?php if ( $days <= 0 ) { echo esc_attr( ' -reverse' ); } ?>">
			<!-- group -->
			<div class="clb-group">
				<div class="clb-group-headline">
					<h2><?php _e( 'Theme License', 'ohio-extra' ); ?></h2>
					<a href="#remove" class="btn btn-flat" id="ohio-remove-theme-license">
						<svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="m754-308-56-55q41.78-11.3 67.89-43.65Q792-439 792-480q0-50-35-85t-85-35H528v-72h144q79.68 0 135.84 56.22 56.16 56.23 56.16 136Q864-425 834.5-379T754-308ZM618-444l-72-72h78v72h-6ZM768-90 90-768l51-51 678 678-51 51ZM432-288H288q-79.68 0-135.84-56.16T96-480q0-63.93 38-113.97Q172-644 242-673l70 73h-23q-51 0-86 35t-35 85q0 50 35 85t85 35h144v72Zm-96-156v-72h56l71 72H336Z"/></svg>
						<?php _e( 'Detach', 'ohio-extra' ); ?>
					</a>
				</div>
				<div class="clb-group-content -nospace">

					<!-- row -->
					<div class="row -vertical">
						<div class="holder">
							<div class="caption"><?php _e( 'License:', 'ohio-extra' ); ?></div>
							<div class="label-holder">
								<label class="active"><svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="m429-336 238-237-51-51-187 186-85-84-51 51 136 135Zm51 240q-79 0-149-30t-122.5-82.5Q156-261 126-331T96-480q0-80 30-149.5t82.5-122Q261-804 331-834t149-30q80 0 149.5 30t122 82.5Q804-699 834-629.5T864-480q0 79-30 149t-82.5 122.5Q699-156 629.5-126T480-96Zm0-72q130 0 221-91t91-221q0-130-91-221t-221-91q-130 0-221 91t-91 221q0 130 91 221t221 91Zm0-312Z"/></svg><?php _e( 'Activated', 'ohio-extra' ); ?></label>

								<span><?php echo get_option( 'ohio_license_type', 'Regular License' ); ?></span>
							</div>

							<!-- tip -->
							<a class="tip" target="_blank" href="https://themeforest.net/licenses/terms/regular"><svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="M480-240q20 0 34-14t14-34q0-20-14-34t-34-14q-20 0-34 14t-14 34q0 20 14 34t34 14Zm-36-153h73q0-37 6.5-52.5T555-485q35-34 48.5-58t13.5-53q0-55-37.5-89.5T484-720q-51 0-88.5 27T343-620l65 27q9-28 28.5-43.5T482-652q28 0 46 16t18 42q0 23-15.5 41T496-518q-35 32-43.5 52.5T444-393Zm36 297q-79 0-149-30t-122.5-82.5Q156-261 126-331T96-480q0-80 30-149.5t82.5-122Q261-804 331-834t149-30q80 0 149.5 30t122 82.5Q804-699 834-629.5T864-480q0 79-30 149t-82.5 122.5Q699-156 629.5-126T480-96Zm0-72q130 0 221-91t91-221q0-130-91-221t-221-91q-130 0-221 91t-91 221q0 130 91 221t221 91Zm0-312Z"/></svg></a>
						</div>
					</div>

					<!-- row -->
					<div class="row -vertical">
						<div class="holder">
							<div class="caption"><?php _e( 'Registration Date:', 'ohio-extra' ); ?></div>
							<?php echo get_option( 'ohio_license_sold_at', '-' ); ?>
						</div>
					</div>

					<!-- row -->
					<div class="row -vertical">
						<div class="holder">
							<div class="caption"><?php _e( 'License Key:', 'ohio-extra' ); ?></div>
							<span class="-small-t"><?php echo get_option( 'ohio_license_code', '-' ); ?></span>
						</div>
					</div>

					<!-- row -->
					<?php if ( get_option( 'ohio_buyer_username' ) ): ?>
						<div class="row -vertical">
							<div class="holder">
								<div class="caption"><?php _e( 'License Owner:', 'ohio-extra' ); ?></div>
								<?php echo get_option( 'ohio_buyer_username'); ?>
							</div>
						</div>
					<?php endif; ?>

					<!-- row -->
					<div class="row -vertical">
						<div class="holder">
							<div class="caption"><?php _e( 'Linked Domain:', 'ohio-extra' ); ?></div>
							<a href="<?php echo '//' . $_SERVER['HTTP_HOST']; ?>"><?php echo $_SERVER['HTTP_HOST']; ?>/</a> 

							<!-- tip -->
							<a class="tip" target="_blank" href="https://themeforest.net/licenses/terms/regular"><svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="M480-240q20 0 34-14t14-34q0-20-14-34t-34-14q-20 0-34 14t-14 34q0 20 14 34t34 14Zm-36-153h73q0-37 6.5-52.5T555-485q35-34 48.5-58t13.5-53q0-55-37.5-89.5T484-720q-51 0-88.5 27T343-620l65 27q9-28 28.5-43.5T482-652q28 0 46 16t18 42q0 23-15.5 41T496-518q-35 32-43.5 52.5T444-393Zm36 297q-79 0-149-30t-122.5-82.5Q156-261 126-331T96-480q0-80 30-149.5t82.5-122Q261-804 331-834t149-30q80 0 149.5 30t122 82.5Q804-699 834-629.5T864-480q0 79-30 149t-82.5 122.5Q699-156 629.5-126T480-96Zm0-72q130 0 221-91t91-221q0-130-91-221t-221-91q-130 0-221 91t-91 221q0 130 91 221t221 91Zm0-312Z"/></svg></a>
						</div>
					</div>

					<!-- row -->
					<div class="row -vertical -highlighted">
						<div class="holder">
							<div class="caption"><?php _e( 'Have a project?', 'ohio-extra' ); ?></div>
							<a class="-unlink" target="_blank" href="https://1.envato.market/5Q25j">Buy a New License</a>

							<!-- tip -->
							<a class="tip" target="_blank" href="https://themeforest.net/licenses/terms/regular"><svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="M480-240q20 0 34-14t14-34q0-20-14-34t-34-14q-20 0-34 14t-14 34q0 20 14 34t34 14Zm-36-153h73q0-37 6.5-52.5T555-485q35-34 48.5-58t13.5-53q0-55-37.5-89.5T484-720q-51 0-88.5 27T343-620l65 27q9-28 28.5-43.5T482-652q28 0 46 16t18 42q0 23-15.5 41T496-518q-35 32-43.5 52.5T444-393Zm36 297q-79 0-149-30t-122.5-82.5Q156-261 126-331T96-480q0-80 30-149.5t82.5-122Q261-804 331-834t149-30q80 0 149.5 30t122 82.5Q804-699 834-629.5T864-480q0 79-30 149t-82.5 122.5Q699-156 629.5-126T480-96Zm0-72q130 0 221-91t91-221q0-130-91-221t-221-91q-130 0-221 91t-91 221q0 130 91 221t221 91Zm0-312Z"/></svg></a>
						</div>
					</div>
				</div>
			</div>

			<!-- Support -->

			<?php if ( !empty( $support_timestamp ) && is_numeric( $support_timestamp ) ) : ?>

				<?php if ( $diff_timestamp > 0 ) : ?>

					<!-- group -->
					<div class="clb-group -primary">
						<div class="clb-group-headline">
							<h2><?php _e( 'Support', 'ohio-extra' ); ?></h2>
							<a target="_blank" href="https://colabrio.ticksy.com/submit/" class="btn btn-flat" id="ohio-remove-theme-license">
								<?php _e( 'Submit a Request', 'ohio-extra' ); ?>
							</a>
						</div>
						<div class="clb-group-content -nospace">
							<div class="row -vertical">
								<div class="holder">
									<div class="caption"><?php _e( 'Support Status:', 'ohio-extra' ); ?></div>
									<div class="label-holder">
										<label class="primary"><svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="m429-336 238-237-51-51-187 186-85-84-51 51 136 135Zm51 240q-79 0-149-30t-122.5-82.5Q156-261 126-331T96-480q0-80 30-149.5t82.5-122Q261-804 331-834t149-30q80 0 149.5 30t122 82.5Q804-699 834-629.5T864-480q0 79-30 149t-82.5 122.5Q699-156 629.5-126T480-96Zm0-72q130 0 221-91t91-221q0-130-91-221t-221-91q-130 0-221 91t-91 221q0 130 91 221t221 91Zm0-312Z"/></svg><?php _e( 'Supported', 'ohio-extra' ); ?></label>
										<span><?php echo( $days ); ?> <?php _e( 'days left', 'ohio-extra' ); ?></span>
									</div>

									<!-- tip -->
									<a class="tip" target="_blank" href="https://help.market.envato.com/hc/en-us/articles/207886473-Extend-or-renew-Item-Support"><svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="M480-240q20 0 34-14t14-34q0-20-14-34t-34-14q-20 0-34 14t-14 34q0 20 14 34t34 14Zm-36-153h73q0-37 6.5-52.5T555-485q35-34 48.5-58t13.5-53q0-55-37.5-89.5T484-720q-51 0-88.5 27T343-620l65 27q9-28 28.5-43.5T482-652q28 0 46 16t18 42q0 23-15.5 41T496-518q-35 32-43.5 52.5T444-393Zm36 297q-79 0-149-30t-122.5-82.5Q156-261 126-331T96-480q0-80 30-149.5t82.5-122Q261-804 331-834t149-30q80 0 149.5 30t122 82.5Q804-699 834-629.5T864-480q0 79-30 149t-82.5 122.5Q699-156 629.5-126T480-96Zm0-72q130 0 221-91t91-221q0-130-91-221t-221-91q-130 0-221 91t-91 221q0 130 91 221t221 91Zm0-312Z"/></svg></a>
								</div>
							</div>
							<div class="row -vertical">
								<div class="holder">
									<?php _e( 'We reply to every support request within: 24 hours from Monday to Friday (from 10:00 to 20:00 GMT+2).', 'ohio-extra' ); ?>
								</div>
							</div>
							<div class="clb-group-footer">
								<span><?php _e( 'Support request sent during weekends or holidays will be processed on Monday or the next business day.', 'ohio-extra' ); ?>
							</div>
						</div>
					</div>

				<?php else : ?>

					<!-- Support Expired -->

					<!-- group -->
					<div class="clb-group -warning">
						<div class="clb-group-headline">
							<h2><?php _e( 'Support Expired', 'ohio-extra' ); ?></h2>
							<a target="_blank" href="https://1.envato.market/5Q25j" class="btn" id="ohio-remove-theme-license">
								<?php _e( 'Renew Support', 'ohio-extra' ); ?>
							</a>
						</div>
						<div class="clb-group-content -nospace">
							<div class="row -vertical">
								<div class="holder">
									<div class="caption"><?php _e( 'Support Status:', 'ohio-extra' ); ?></div>
									<div class="label-holder">
										<label class="warning"><svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="M480.28-96Q401-96 331-126t-122.5-82.5Q156-261 126-330.96t-30-149.5Q96-560 126-629.5q30-69.5 82.5-122T330.96-834q69.96-30 149.5-30t149.04 30q69.5 30 122 82.5T834-629.28q30 69.73 30 149Q864-401 834-331t-82.5 122.5Q699-156 629.28-126q-69.73 30-149 30Zm-.28-72q130 0 221-91t91-221q0-130-91-221t-221-91q-130 0-221 91t-91 221q0 130 91 221t221 91Zm0-312Z"/></svg><?php _e( 'Expired', 'ohio-extra' ); ?></label>
									</div>
									<div class="sync-status">
										<?php _e( 'Already renewed support?', 'ohio-extra' ); ?> 
										<a class="sync-status" id="sync-support-status" target="_blank" href="#"><svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="M216-192v-72h74q-45-40-71.5-95.5T192-480q0-101 61-177.5T408-758v75q-63 23-103.5 77.5T264-480q0 48 19.5 89t52.5 70v-63h72v192H216Zm336-10v-75q63-23 103.5-77.5T696-480q0-48-19.5-89T624-639v63h-72v-192h192v72h-74q45 40 71.5 95.5T768-480q0 101-61 177.5T552-202Z"/></svg> <?php _e( 'Sync Status', 'ohio-extra' ); ?></a>
									</div>

									<!-- tip -->
									<a class="tip" target="_blank" href="https://help.market.envato.com/hc/en-us/articles/207886473-Extend-or-renew-Item-Support"><svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="M480-240q20 0 34-14t14-34q0-20-14-34t-34-14q-20 0-34 14t-14 34q0 20 14 34t34 14Zm-36-153h73q0-37 6.5-52.5T555-485q35-34 48.5-58t13.5-53q0-55-37.5-89.5T484-720q-51 0-88.5 27T343-620l65 27q9-28 28.5-43.5T482-652q28 0 46 16t18 42q0 23-15.5 41T496-518q-35 32-43.5 52.5T444-393Zm36 297q-79 0-149-30t-122.5-82.5Q156-261 126-331T96-480q0-80 30-149.5t82.5-122Q261-804 331-834t149-30q80 0 149.5 30t122 82.5Q804-699 834-629.5T864-480q0 79-30 149t-82.5 122.5Q699-156 629.5-126T480-96Zm0-72q130 0 221-91t91-221q0-130-91-221t-221-91q-130 0-221 91t-91 221q0 130 91 221t221 91Zm0-312Z"/></svg></a>
								</div>
							</div>
						</div>
					</div>

				<?php endif; ?>
		
			<?php endif; ?>
		</div>
	</div>

<?php else: ?>

	<div class="clb-steps">
		<div class="clb-steps-item active">
			<div class="step-number">1</div>
			<div class="dashed"></div>
			<p><?php _e( 'Click the "Connect & Activate" button below to get started with license activation:', 'ohio-extra' ); ?></p>
				<a href="#" class="btn btn-large btn-activate" id="ohio-activate-theme-license">
				<i class="icon"><svg width="19" height="26" viewBox="0 0 19 26" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M10.696 26C11.338 26 11.8587 25.4793 11.8587 24.8371C11.8587 24.1949 11.338 23.6742 10.696 23.6742C10.0538 23.6742 9.53325 24.1949 9.53325 24.8371C9.53325 25.4793 10.0538 26 10.696 26Z" fill="#194200"/><path d="M17.375 16.9183L10.8243 17.6201C10.7045 17.6333 10.6425 17.48 10.738 17.4058L17.1485 12.4141C17.5649 12.0739 17.8299 11.5437 17.7162 10.976C17.6024 10.1056 16.8835 9.53786 15.9757 9.65161L9.01066 10.6713C8.88779 10.6896 8.82179 10.5322 8.92029 10.457L15.8244 5.18494C17.1871 4.12566 17.2998 2.04364 16.0518 0.833035C14.9166 -0.30242 13.0999 -0.264841 11.9646 0.870614L0.839316 12.1866C0.42298 12.6406 0.234106 13.2459 0.347837 13.8898C0.536712 14.9115 1.55826 15.593 2.58082 15.404L8.57808 14.1802C8.70806 14.1538 8.77914 14.3275 8.66643 14.3986L2.01216 18.6581C1.17949 19.1882 0.801745 20.1338 1.06576 21.0803C1.3308 22.3295 2.5798 23.0486 3.79022 22.7459L13.7366 20.2952C13.8483 20.2678 13.9306 20.3978 13.8585 20.4872L12.3048 22.4047C11.8885 22.9348 12.5698 23.6539 13.1375 23.2375L18.2462 19.0369C19.154 18.2803 18.5488 16.8036 17.376 16.9173L17.375 16.9183Z" fill="#194200"/></svg></i>
				<?php _e( 'Connect & Activate', 'ohio-extra' ); ?>
			</a>
		</div>
		<div class="clb-steps-item">
			<div class="step-number">2</div>
			<div class="dashed"></div>
			<p><?php _e( 'Login with your', 'ohio-extra' ); ?> <a target="_blank" href="https://account.envato.com/ "><?php _e( 'Envato Account', 'ohio-extra' ); ?></a> <?php _e( 'to authorize the theme\'s purchase code.', 'ohio-extra' ); ?>                                       </p>
		</div>
		<div class="clb-steps-item">
			<div class="step-number">3</div>
			<div class="dashed"></div>
			<p><?php _e( 'Choose a valid', 'ohio-extra' ); ?> <a target="_blank" href="https://help.market.envato.com/hc/en-us/articles/202822600-Where-Is-My-Purchase-Code-"><?php _e( 'Purchase Code', 'ohio-extra' ); ?></a> <?php _e( 'from the list and click the "Proceed" button.', 'ohio-extra' ); ?></p>
		</div>
		<div class="clb-steps-item">
			<div class="step-number">4</div>
			<div class="dashed"></div>
			<p><?php _e( 'That is it, you’re all set!', 'ohio-extra' ); ?><br> <?php _e( 'Your theme license is activated now.', 'ohio-extra' ); ?></p>
		</div>
	</div>

<?php endif; ?>
