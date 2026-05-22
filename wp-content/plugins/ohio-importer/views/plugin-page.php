<?php
/**
 * The plugin page view - the "settings" page of the plugin.
 *
 * @package ocdi
 */

namespace OCDI;

// Prepare navigation data.
$categories = Helpers::get_all_demo_import_categories( $this->import_files );

?>

<div class="clb-hub clb-page clb-importer">
	<div class="clb-hub-intro">
		<div class="clb-hub-container">
			<div class="details">
				<i class="details-icon"></i>
				<h1><?php _e( 'Demo Importer', 'ohio-importer' ); ?></h1>
			</div>
			<div class="mode-switcher">
				<a href="admin.php?page=ohio_hub" class="btn btn-outline"><?php _e( 'Dashboard', 'ohio-importer' ); ?></a>
				<a href="admin.php?page=ohio_hub_settings" class="btn btn-outline"><?php _e( 'Theme Settings', 'ohio-importer' ); ?></a>
				<a href="admin.php?page=pt-one-click-demo-import" class="btn btn-flat"><?php _e( 'Demo Import', 'ohio-importer' ); ?></a>
			</div>
		</div>
	</div>
	<div class="wrap">
		<div id="tabs" class="clb-nav">
			<ul class="clb-nav-inner">
				<li>
					<a href="#tabs-1" class="demo-templates selected">
						<i>
							<svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="M444-98q-73-7-136.5-39.5T197-221q-47-51-74-117.5T96-480q0-151 100.5-259T444-861v72q-117 14-196.5 101.5T168-480q0 120 79.5 208T444-170v72Zm36-189L288-479l51-51 105 105v-246h72v246l105-105 51 51-192 192Zm36 189v-72q45-5 84.5-22t72.5-43l51 51q-44 36-96 58.5T516-98Zm157-625q-33-26-72.5-43.5T516-789v-72q60 5 112.5 27.5T725-775l-52 52Zm102 488-51-51q26-33 43-72.5t22-84.5h73q-5 60-28 112t-59 96Zm14-280q-5-45-22-84t-43-73l52-52q36 44 58.5 96.5T862-515h-73Z"/></svg>
						</i>
						<?php _e( 'Demo Templates', 'ohio-importer' ); ?>
					</a>

					<?php if ( ! empty( $categories ) ) : ?>

					<div class="clb-nav ocdi__gl-header js-ocdi-gl-header">
						<ul class="clb-nav-inner sub-nav ocdi__gl-navigation">
							<li class="selected active">
								<a href="#all" class="ocdi__gl-navigation-link js-ocdi-nav-link">
									<?php _e( 'All Demos', 'ohio-importer' ); ?>
								</a>
							</li>
							<?php foreach ( $categories as $key => $name ) : ?>

								<li>
									<a href="#<?php echo esc_attr( $key ); ?>" class="ocdi__gl-navigation-link js-ocdi-nav-link">
										<?php echo esc_html( $name ); ?>
									</a>
								</li>

							<?php endforeach; ?>
						</ul>
					</div>

				<?php endif; ?>
				</li>
				<li>
					<a href="#tabs-2">
						<i>
							<svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="m97-144 245-336h193l281-340v676H97Zm76-225-58-42 155-213h193l168-203 55 46-189 229H306L173-369Zm66 153h505v-404L569-408H378L239-216Zm505 0Z"/></svg>
						</i>
						<?php _e( 'System Status', 'ohio-importer' ); ?>
					</a>
				</li>
				<li>
					<a href="#tabs-3">
						<i>
							<svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="M480-240q20 0 34-14t14-34q0-20-14-34t-34-14q-20 0-34 14t-14 34q0 20 14 34t34 14Zm-36-153h73q0-37 6.5-52.5T555-485q35-34 48.5-58t13.5-53q0-55-37.5-89.5T484-720q-51 0-88.5 27T343-620l65 27q9-28 28.5-43.5T482-652q28 0 46 16t18 42q0 23-15.5 41T496-518q-35 32-43.5 52.5T444-393Zm36 297q-79 0-149-30t-122.5-82.5Q156-261 126-331T96-480q0-80 30-149.5t82.5-122Q261-804 331-834t149-30q80 0 149.5 30t122 82.5Q804-699 834-629.5T864-480q0 79-30 149t-82.5 122.5Q699-156 629.5-126T480-96Zm0-72q130 0 221-91t91-221q0-130-91-221t-221-91q-130 0-221 91t-91 221q0 130 91 221t221 91Zm0-312Z"></path></svg>
						</i>
						<?php _e( 'Help', 'ohio-importer' ); ?>
					</a>
				</li>
			</ul>
			<div class="clb-hub-container clb-page-container">

				<!-- WP notices here -->
				<div class="wp-header-end"></div>
				<div class="inner-wrap">
					<!-- Demo intro container -->
					<div class="tab-item" id="tabs-1">
						<div id="clb-demo-templates" class="clb-demo-holder">
							<!-- <div class="clb-nav-search">
								<input type="search" class="ocdi__gl-search-input js-ocdi-gl-search" name="ocdi-gl-search" value="" placeholder="<?php _e( 'Search demos...', 'ohio-importer' ); ?>">
							</div> -->
							<div class="ocdi__response js-ocdi-ajax-response"></div>

							<?php
							// Display warrning if PHP safe mode is enabled, since we wont be able to change the max_execution_time.
							if ( ini_get( 'safe_mode' ) ) {
								printf(
									esc_html__( '%sWarning: your server is using %sPHP safe mode%s. This means that you might experience server timeout errors.%s', 'ohio-importer' ),
									'<div class="notice o-notice notice-warning is-dismissible"><p>',
									'<strong>',
									'</strong>',
									'</p></div>'
								);
							}

							// Start output buffer for displaying the plugin intro text.
							ob_start();
							?>

							<?php
							$plugin_intro_text = ob_get_clean();

							// Display the plugin intro text (can be replaced with custom text through the filter below).
							echo wp_kses_post( apply_filters( 'pt-ocdi/plugin_intro_text', $plugin_intro_text ) );
							?>


							<?php if ( empty( $this->import_files ) ) : ?>

								<div class="notice o-notice notice-info is-dismissible">
									<p><?php _e( 'There are no predefined import files available in this theme. Please upload the import files manually!', 'ohio-importer' ); ?></p>
								</div>

								<div class="ocdi__file-upload-container">
									<h2><?php _e( 'Manual demo files upload', 'ohio-importer' ); ?></h2>

									<div class="ocdi__file-upload">
										<h3><label for="content-file-upload"><?php _e( 'Choose a XML file for content import:', 'ohio-importer' ); ?></label></h3>
										<input id="ocdi__content-file-upload" type="file" name="content-file-upload">
									</div>

									<div class="ocdi__file-upload">
										<h3><label for="widget-file-upload"><?php _e( 'Choose a WIE or JSON file for widget import:', 'ohio-importer' ); ?></label> <span><?php _e( '(*optional)', 'ohio-importer' ); ?></span></h3>
										<input id="ocdi__widget-file-upload" type="file" name="widget-file-upload">
									</div>

									<div class="ocdi__file-upload">
										<h3><label for="customizer-file-upload"><?php _e( 'Choose a DAT file for customizer import:', 'ohio-importer' ); ?></label> <span><?php _e( '(*optional)', 'ohio-importer' ); ?></span></h3>
										<input id="ocdi__customizer-file-upload" type="file" name="customizer-file-upload">
									</div>

									<?php if ( class_exists( 'ReduxFramework' ) ) : ?>
									<div class="ocdi__file-upload">
										<h3><label for="redux-file-upload"><?php _e( 'Choose a JSON file for Redux import:', 'ohio-importer' ); ?></label> <span><?php _e( '(*optional)', 'ohio-importer' ); ?></span></h3>
										<input id="ocdi__redux-file-upload" type="file" name="redux-file-upload">
										<div>
											<label for="redux-option-name" class="ocdi__redux-option-name-label"><?php _e( 'Enter the Redux option name:', 'ohio-importer' ); ?></label>
											<input id="ocdi__redux-option-name" type="text" name="redux-option-name">
										</div>
									</div>
									<?php endif; ?>
								</div>

								<p class="ocdi__button-container">
									<button class="ocdi__button  button  button-hero  button-primary js-ocdi-import-data"><?php _e( 'Demo Import', 'ohio-importer' ); ?></button>
								</p>

							<?php elseif ( 1 === count( $this->import_files ) ) : ?>

								<div class="ocdi__demo-import-notice js-ocdi-demo-import-notice"><?php
									if ( is_array( $this->import_files ) && ! empty( $this->import_files[0]['import_notice'] ) ) {
										echo wp_kses_post( $this->import_files[0]['import_notice'] );
									}
								?></div>

								<p class="ocdi__button-container">
									<button class="ocdi__button  button  button-hero  button-primary js-ocdi-import-data"><?php _e( 'Demo Import', 'ohio-importer' ); ?></button>
								</p>

							<?php else : ?>

								<div class="clb-headline">
									<div class="col clb-headline-icon">
										<svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="M444-98q-73-7-136.5-39.5T197-221q-47-51-74-117.5T96-480q0-151 100.5-259T444-861v72q-117 14-196.5 101.5T168-480q0 120 79.5 208T444-170v72Zm36-189L288-479l51-51 105 105v-246h72v246l105-105 51 51-192 192Zm36 189v-72q45-5 84.5-22t72.5-43l51 51q-44 36-96 58.5T516-98Zm157-625q-33-26-72.5-43.5T516-789v-72q60 5 112.5 27.5T725-775l-52 52Zm102 488-51-51q26-33 43-72.5t22-84.5h73q-5 60-28 112t-59 96Zm14-280q-5-45-22-84t-43-73l52-52q36 44 58.5 96.5T862-515h-73Z"></path></svg>
									</div>
									<div class="col">
										<h1>
											<?php _e( 'Demo Templates', 'ohio-importer' ); ?>
										</h1>
										<p>
								           	<a target="_blank" href="./admin.php?page=ohio_hub_settings"><?php _e( 'Theme Settings', 'ohio-importer' ); ?></a> <?php _e( 'override with each new import.', 'ohio-importer' ); ?> <?php _e( 'Toggle Theme Settings checkbox in the popup to import without global options.', 'ohio-importer' ); ?>
										</p>
									</div>
								</div>
								<div class="ocdi__gl js-ocdi-gl">
									<div class="clb-group-demo ocdi__gl-item-container wp-clearfix js-ocdi-gl-item-container">

										<?php foreach ( $this->import_files as $index => $import_file ) : ?>
											<?php
												// Prepare import item display data.
												$img_src = isset( $import_file['import_preview_image_url'] ) ? $import_file['import_preview_image_url'] : '';
												// Default to the theme screenshot, if a custom preview image is not defined.
												if ( empty( $img_src ) ) {
													$theme = wp_get_theme();
													$img_src = $theme->get_screenshot();
												}
											?>
											<div class="clb-group-demo-item ocdi__gl-item js-ocdi-gl-item ocdi-card" data-categories="<?php echo esc_attr( Helpers::get_demo_import_item_categories( $import_file, $categories ) ); ?>" data-name="<?php echo esc_attr( strtolower( $import_file['import_file_name'] ) ); ?>">
												<div class="ocdi__gl-item-image-container">
													<?php if ( ! empty( $img_src ) ) : ?>
														<img class="ocdi__gl-item-image" src="<?php echo esc_url( $img_src ) ?>">
														<i class="builder-icon">
															<svg class="-wpbakery" width="26" height="21" viewBox="0 0 26 21" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M9.45455 0C12.9962 0 16.083 1.97168 17.7027 4.89007C18.0947 4.82178 18.4978 4.78632 18.9091 4.78632C22.8253 4.78632 26 8.00069 26 11.9658C26 15.8913 22.8885 19.0809 19.0264 19.1443L18.9091 19.1453L18.3477 19.1453V19.6538C18.3477 20.3973 17.7525 21 17.0182 21H9.04091C8.30662 21 7.71136 20.3973 7.71136 19.6538L7.71149 18.983C3.32253 18.1548 0 14.2566 0 9.57265C0 4.28582 4.23294 0 9.45455 0ZM5.44653 5.51466C5.33894 5.62366 5.29555 5.78056 5.32951 5.92884L5.3407 5.96902L6.9991 11.0122C7.0629 11.1944 7.23565 11.3138 7.42629 11.3075C7.60389 11.3044 7.7607 11.1932 7.82567 11.0284L7.83816 10.9923L8.43404 8.98118C8.49321 8.78355 8.63917 8.62583 8.8279 8.55261L8.87219 8.53724L10.857 7.93347C11.0391 7.87758 11.1649 7.70896 11.1681 7.51617C11.1715 7.3363 11.0677 7.17353 10.9075 7.10173L10.8723 7.08776L5.89496 5.40743C5.7375 5.35422 5.56389 5.39574 5.44653 5.51466Z" fill="currentColor"/></svg>
															<svg class="-elementor" width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M13 0C5.81959 0 0 5.81959 0 13C0 20.178 5.81959 26 13 26C20.1804 26 26 20.1804 26 13C25.9977 5.81959 20.178 0 13 0ZM9.75058 18.4149H7.58511V7.58277H9.75058V18.4149ZM18.4149 18.4149H11.9161V16.2494H18.4149V18.4149ZM18.4149 14.0815H11.9161V11.9161H18.4149V14.0815ZM18.4149 9.74825H11.9161V7.58277H18.4149V9.74825Z" fill="currentColor"/></svg>
														</i>
													<?php else : ?>
														<div class="ocdi__gl-item-image  ocdi__gl-item-image--no-image"><?php _e( 'No preview image.', 'ohio-importer' ); ?></div>
													<?php endif; ?>
												</div>
												<div class="clb-group-demo-item-footer ocdi__gl-item-footer">
													<h4 class="ocdi__gl-item-title"><?php echo $import_file['import_file_name']; ?></h4>
													<div class="_button-group">
														<?php
															switch ( $import_file['import_file_name'] ) {
																case __( 'Portfolio Projects', 'ohio-importer' ):
																	$local_preview = 'edit.php?post_type=ohio_portfolio';
																	break;
																case __( 'All Pages', 'ohio-importer' ):
																	$local_preview = 'edit.php?post_type=page';
																	break;
																case __( 'Products', 'ohio-importer' ):
																	$local_preview = 'edit.php?post_type=product';
																	break;
																case __( 'Forms - Contact Form 7', 'ohio-importer' ):
																	$local_preview = 'admin.php?page=wpcf7';
																	break;
																default:
																	$local_preview = 'edit.php?post_type=page';
																	break;
															}
														?>
														<a
															href="<?php echo esc_url( $local_preview ); ?>"
															class="ocdi__gl-item-button btn btn-flat ocdi__local_link"
															target="_blank" style="margin-left:auto; margin-right:8px; display:none;">
																Open
														</a>

														<?php if ( !empty( $import_file['preview_url'] ) ) : ?>
															<a
																href="<?php echo esc_url( $import_file['preview_url'] ); ?>"
																class="ocdi__gl-item-button btn btn-flat"
																target="_blank" style="margin-left:auto; margin-right:8px;">
																Open
															</a>
														<?php endif; ?>

														<?php
															$demo_bitmask = 0;
															if ( ! empty( $import_file[Helpers::COMMON_IMPORT_URL_KEY] ) ) {
																$demo_bitmask |= Helpers::COMMON_TYPE_BITMASK;
															}
															if ( ! empty( $import_file[Helpers::WPBAKERY_IMPORT_URL_KEY] ) ) {
																$demo_bitmask |= Helpers::WPBAKERY_TYPE_BITMASK;
															}
															if ( ! empty( $import_file[Helpers::ELEMENTOR_SECTIONS_IMPORT_URL_KEY] ) ) {
																$demo_bitmask |= Helpers::ELEMENTOR_SECTIONS_TYPE_BITMASK;
															}
															if ( ! empty( $import_file[Helpers::ELEMENTOR_CONTAINERS_IMPORT_URL_KEY] ) ) {
																$demo_bitmask |= Helpers::ELEMENTOR_CONTAINERS_TYPE_BITMASK;
															}
														?>
														<button
															class="ocdi__gl-item-button btn js-ocdi-gl-import-data" 
															value="<?php echo esc_attr( $index ); ?>"
															data-import-bitmask="<?php echo $demo_bitmask; ?>">
															<svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="M444-98q-73-7-136.5-39.5T197-221q-47-51-74-117.5T96-480q0-151 100.5-259T444-861v72q-117 14-196.5 101.5T168-480q0 120 79.5 208T444-170v72Zm36-189L288-479l51-51 105 105v-246h72v246l105-105 51 51-192 192Zm36 189v-72q45-5 84.5-22t72.5-43l51 51q-44 36-96 58.5T516-98Zm157-625q-33-26-72.5-43.5T516-789v-72q60 5 112.5 27.5T725-775l-52 52Zm102 488-51-51q26-33 43-72.5t22-84.5h73q-5 60-28 112t-59 96Zm14-280q-5-45-22-84t-43-73l52-52q36 44 58.5 96.5T862-515h-73Z"/></svg>
															<?php _e( 'Import', 'ohio-importer' ); ?>
														</button>
													</div>
												</div>
											</div>
										<?php endforeach; ?>

										<div class="ocdi__ajax-loader js-ocdi-ajax-loader">
											<div class="progress-line"></div>
											<h3><?php _e( 'Downloading the demo content', 'ohio-importer' ); ?></h3>
											<?php _e( 'This process may take a while on some hosts, so please be patient.', 'ohio-importer' ); ?>
										</div>
									</div>
								</div>
								<div id="js-ocdi-modal-content"></div>

							<?php endif; ?>
						</div>
					</div>

					<!-- System status container -->
					<div class="tab-item" id="tabs-2" style="display: none;">
						<div class="clb-headline">
							<div class="col clb-headline-icon">
								<svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="m97-144 245-336h193l281-340v676H97Zm76-225-58-42 155-213h193l168-203 55 46-189 229H306L173-369Zm66 153h505v-404L569-408H378L239-216Zm505 0Z"></path></svg>
							</div>
							<div class="col">
								<h1>
									<?php _e( 'System Status', 'ohio-importer' ); ?>
								</h1>
								<p>
									<?php _e( 'Check your server setup for important information. Red error messages indicate potential compliance issues with', 'ohio-importer' ); ?>
									<a href="https://docs.clbthemes.com/ohio/#requirements" target="_blank"><?php _e( 'Ohio\'s Server Requirements.', 'ohio-importer' ); ?></a>
									
								</p>
							</div>
						</div>

						<!-- Group 3cl -->
						<div class="clb-group">
							<div class="clb-group-headline">
								<h2><?php _e( 'Server Environment', 'ohio-importer' ); ?></h2>
								<a href="https://docs.clbthemes.com/ohio/#requirements" target="_blank" class="btn btn-flat">
									<svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="M480-240q20 0 34-14t14-34q0-20-14-34t-34-14q-20 0-34 14t-14 34q0 20 14 34t34 14Zm-36-153h73q0-37 6.5-52.5T555-485q35-34 48.5-58t13.5-53q0-55-37.5-89.5T484-720q-51 0-88.5 27T343-620l65 27q9-28 28.5-43.5T482-652q28 0 46 16t18 42q0 23-15.5 41T496-518q-35 32-43.5 52.5T444-393Zm36 297q-79 0-149-30t-122.5-82.5Q156-261 126-331T96-480q0-80 30-149.5t82.5-122Q261-804 331-834t149-30q80 0 149.5 30t122 82.5Q804-699 834-629.5T864-480q0 79-30 149t-82.5 122.5Q699-156 629.5-126T480-96Zm0-72q130 0 221-91t91-221q0-130-91-221t-221-91q-130 0-221 91t-91 221q0 130 91 221t221 91Zm0-312Z"></path></svg>
									<?php _e( 'PHP Requirements', 'ohio-importer' ); ?></a>
							</div>
							<table class="clb-group-content clb-group-table">
								<tbody>
									<tr>
										<td><?php _e( 'PHP Version:', 'ohio-importer' ); ?></td>
										<td>
											<!-- tip -->
											<a class="tip" data-tooltip="<?php _e( 'The PHP version of your WordPress installation.', 'ohio-importer' ); ?>" target="_blank" href="https://wordpress.org/support/update-php/"><svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="M480-240q20 0 34-14t14-34q0-20-14-34t-34-14q-20 0-34 14t-14 34q0 20 14 34t34 14Zm-36-153h73q0-37 6.5-52.5T555-485q35-34 48.5-58t13.5-53q0-55-37.5-89.5T484-720q-51 0-88.5 27T343-620l65 27q9-28 28.5-43.5T482-652q28 0 46 16t18 42q0 23-15.5 41T496-518q-35 32-43.5 52.5T444-393Zm36 297q-79 0-149-30t-122.5-82.5Q156-261 126-331T96-480q0-80 30-149.5t82.5-122Q261-804 331-834t149-30q80 0 149.5 30t122 82.5Q804-699 834-629.5T864-480q0 79-30 149t-82.5 122.5Q699-156 629.5-126T480-96Zm0-72q130 0 221-91t91-221q0-130-91-221t-221-91q-130 0-221 91t-91 221q0 130 91 221t221 91Zm0-312Z"/></svg></a>
										</td>
										<td>
											<?php
												if ( explode( ',', phpversion() )[0] >= 7 ) {
													echo phpversion();
												} else {
													echo '<span class="error"><b>' . phpversion() . '</b> - ';
													echo _e( 'The minimum PHP Version is', 'ohio-importer' ) . ' 7.4.0';
													echo '</span';
												}
											?>
										</td>
									</tr>
									<tr>
										<td><?php _e( 'PHP Memory Limit:', 'ohio-importer' ); ?></td>
										<td>
											<!-- tip -->
											<a class="tip" data-tooltip="<?php _e( 'memory_limit', 'ohio-importer' ); ?>" target="_blank" href="https://developer.wordpress.org/advanced-administration/performance/php/#configuration"><svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="M480-240q20 0 34-14t14-34q0-20-14-34t-34-14q-20 0-34 14t-14 34q0 20 14 34t34 14Zm-36-153h73q0-37 6.5-52.5T555-485q35-34 48.5-58t13.5-53q0-55-37.5-89.5T484-720q-51 0-88.5 27T343-620l65 27q9-28 28.5-43.5T482-652q28 0 46 16t18 42q0 23-15.5 41T496-518q-35 32-43.5 52.5T444-393Zm36 297q-79 0-149-30t-122.5-82.5Q156-261 126-331T96-480q0-80 30-149.5t82.5-122Q261-804 331-834t149-30q80 0 149.5 30t122 82.5Q804-699 834-629.5T864-480q0 79-30 149t-82.5 122.5Q699-156 629.5-126T480-96Zm0-72q130 0 221-91t91-221q0-130-91-221t-221-91q-130 0-221 91t-91 221q0 130 91 221t221 91Zm0-312Z"/></svg></a>
										</td>
										<td>
											<?php
												if ( intval( ini_get( 'memory_limit' ) ) >= 256 ) {
													echo ini_get( 'memory_limit' );
												} else {
													echo '<span class="error"><b>' . ini_get( 'memory_limit' ) . '</b> - ';
													echo _e( 'The minimum PHP Memory Limit value is', 'ohio-importer' ) . ' 256M';
													echo '</span';
												}
											?>
										</td>
									</tr>
									<tr>
										<td><?php _e( 'PHP Time Limit:', 'ohio-importer' ); ?></td>
										<td>
											<!-- tip -->
											<a class="tip" data-tooltip="<?php _e( 'max_execution_time', 'ohio-importer' ); ?>" target="_blank" href="https://developer.wordpress.org/advanced-administration/performance/php/#configuration"><svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="M480-240q20 0 34-14t14-34q0-20-14-34t-34-14q-20 0-34 14t-14 34q0 20 14 34t34 14Zm-36-153h73q0-37 6.5-52.5T555-485q35-34 48.5-58t13.5-53q0-55-37.5-89.5T484-720q-51 0-88.5 27T343-620l65 27q9-28 28.5-43.5T482-652q28 0 46 16t18 42q0 23-15.5 41T496-518q-35 32-43.5 52.5T444-393Zm36 297q-79 0-149-30t-122.5-82.5Q156-261 126-331T96-480q0-80 30-149.5t82.5-122Q261-804 331-834t149-30q80 0 149.5 30t122 82.5Q804-699 834-629.5T864-480q0 79-30 149t-82.5 122.5Q699-156 629.5-126T480-96Zm0-72q130 0 221-91t91-221q0-130-91-221t-221-91q-130 0-221 91t-91 221q0 130 91 221t221 91Zm0-312Z"/></svg></a>
										</td>
										<td>
											<?php
												if ( ini_get( 'max_execution_time' ) >= 300 ) {
													echo ini_get( 'max_execution_time' );
												} else {
													echo '<span class="error"><b>' . ini_get( 'max_execution_time' ) . '</b> - ';
													echo _e( 'The minimum PHP Time Limit value is', 'ohio-importer' ) . ' 300';
													echo '</span';
												}
											?>
										</td>
									</tr>
									<tr>
										<td><?php _e( 'WP Max Upload Size:', 'ohio-importer' ); ?></td>
										<td>
											<!-- tip -->
											<a class="tip" data-tooltip="<?php _e( 'upload_max_filesize', 'ohio-importer' ); ?>" target="_blank" href="https://developer.wordpress.org/advanced-administration/performance/php/#configuration"><svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="M480-240q20 0 34-14t14-34q0-20-14-34t-34-14q-20 0-34 14t-14 34q0 20 14 34t34 14Zm-36-153h73q0-37 6.5-52.5T555-485q35-34 48.5-58t13.5-53q0-55-37.5-89.5T484-720q-51 0-88.5 27T343-620l65 27q9-28 28.5-43.5T482-652q28 0 46 16t18 42q0 23-15.5 41T496-518q-35 32-43.5 52.5T444-393Zm36 297q-79 0-149-30t-122.5-82.5Q156-261 126-331T96-480q0-80 30-149.5t82.5-122Q261-804 331-834t149-30q80 0 149.5 30t122 82.5Q804-699 834-629.5T864-480q0 79-30 149t-82.5 122.5Q699-156 629.5-126T480-96Zm0-72q130 0 221-91t91-221q0-130-91-221t-221-91q-130 0-221 91t-91 221q0 130 91 221t221 91Zm0-312Z"/></svg></a>
										</td>
										<td>
											<?php
												if ( intval( ini_get( 'upload_max_filesize' ) ) >= 32 ) {
													echo ini_get( 'upload_max_filesize' );
												} else {
													echo '<span class="error"><b>' . ini_get( 'upload_max_filesize' ) . '</b> - ';
													echo _e( 'The minimum WP Max Upload Size value is', 'ohio-importer' ) . ' 32M';
													echo '</span';
												}
											?>
										</td>
									</tr>
									<tr>
										<td><?php _e( 'File Upload Permission:', 'ohio-importer' ); ?></td>
										<td>
											<!-- tip -->
											<a class="tip" data-tooltip="<?php _e( 'file_uploads', 'ohio-importer' ); ?>" target="_blank" href="https://developer.wordpress.org/advanced-administration/performance/php/#configuration"><svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="M480-240q20 0 34-14t14-34q0-20-14-34t-34-14q-20 0-34 14t-14 34q0 20 14 34t34 14Zm-36-153h73q0-37 6.5-52.5T555-485q35-34 48.5-58t13.5-53q0-55-37.5-89.5T484-720q-51 0-88.5 27T343-620l65 27q9-28 28.5-43.5T482-652q28 0 46 16t18 42q0 23-15.5 41T496-518q-35 32-43.5 52.5T444-393Zm36 297q-79 0-149-30t-122.5-82.5Q156-261 126-331T96-480q0-80 30-149.5t82.5-122Q261-804 331-834t149-30q80 0 149.5 30t122 82.5Q804-699 834-629.5T864-480q0 79-30 149t-82.5 122.5Q699-156 629.5-126T480-96Zm0-72q130 0 221-91t91-221q0-130-91-221t-221-91q-130 0-221 91t-91 221q0 130 91 221t221 91Zm0-312Z"/></svg></a>
										</td>
										<td>
											<?php
												$file_uploads = is_numeric( ini_get( 'file_uploads' ) ) ? ( ini_get( 'file_uploads' ) ? 'On' : 'Off' ) : ini_get( 'file_uploads' );
												if ( $file_uploads == 'On' ) {
													echo '<label class="active"><svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="m429-336 238-237-51-51-187 186-85-84-51 51 136 135Zm51 240q-79 0-149-30t-122.5-82.5Q156-261 126-331T96-480q0-80 30-149.5t82.5-122Q261-804 331-834t149-30q80 0 149.5 30t122 82.5Q804-699 834-629.5T864-480q0 79-30 149t-82.5 122.5Q699-156 629.5-126T480-96Zm0-72q130 0 221-91t91-221q0-130-91-221t-221-91q-130 0-221 91t-91 221q0 130 91 221t221 91Zm0-312Z"></path></svg>';
													echo _e( 'Available', 'ohio-importer' );
													echo '</label';
												} else {
													echo '<label class="inactive"><svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="M480.28-96Q401-96 331-126t-122.5-82.5Q156-261 126-330.96t-30-149.5Q96-560 126-629.5q30-69.5 82.5-122T330.96-834q69.96-30 149.5-30t149.04 30q69.5 30 122 82.5T834-629.28q30 69.73 30 149Q864-401 834-331t-82.5 122.5Q699-156 629.28-126q-69.73 30-149 30Zm-.28-72q130 0 221-91t91-221q0-130-91-221t-221-91q-130 0-221 91t-91 221q0 130 91 221t221 91Zm0-312Z"></path></svg>';
													echo _e( 'Disabled', 'ohio-importer' );
													echo '</label';
												}
											?>
										</td>
									</tr>
								</tbody>
							</table>
							<div class="clb-group-footer">
								<?php _e( 'Contact your hosting provider and ask them to increase the limits to a minimum of the following.', 'ohio-importer' ); ?>
							</div>
						</div>
					</div>

					<!-- Demo intro container -->
					<div class="tab-item" id="tabs-3" style="display: none;">
						<div class="clb-headline">
							<div class="col clb-headline-icon">
								<svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 -960 960 960" width="20px"><path d="M480-240q20 0 34-14t14-34q0-20-14-34t-34-14q-20 0-34 14t-14 34q0 20 14 34t34 14Zm-36-153h73q0-37 6.5-52.5T555-485q35-34 48.5-58t13.5-53q0-55-37.5-89.5T484-720q-51 0-88.5 27T343-620l65 27q9-28 28.5-43.5T482-652q28 0 46 16t18 42q0 23-15.5 41T496-518q-35 32-43.5 52.5T444-393Zm36 297q-79 0-149-30t-122.5-82.5Q156-261 126-331T96-480q0-80 30-149.5t82.5-122Q261-804 331-834t149-30q80 0 149.5 30t122 82.5Q804-699 834-629.5T864-480q0 79-30 149t-82.5 122.5Q699-156 629.5-126T480-96Zm0-72q130 0 221-91t91-221q0-130-91-221t-221-91q-130 0-221 91t-91 221q0 130 91 221t221 91Zm0-312Z"></path></svg>
							</div>
							<div class="col">
								<h1>
									<?php _e( 'Help', 'ohio-importer' ); ?>
								</h1>
								<p>
									<?php _e( 'Check your server setup for important information. Red error messages indicate potential compliance issues with', 'ohio-importer' ); ?>
									<a href="https://docs.clbthemes.com/ohio/#requirements" target="_blank"><?php _e( 'Ohio\'s Server Requirements.', 'ohio-importer' ); ?></a>
								</p>
							</div>
						</div>

						<!-- Group 3cl -->
						<div class="clb-group clb-group">
							<div class="clb-group-headline">
								<h2><?php _e( 'About', 'ohio-importer' ); ?></h2>
								<a href="https://docs.clbthemes.com/ohio/getting-started/#setting_up" target="_blank" class="btn btn-flat">
									<?php _e( 'Docs', 'ohio-importer' ); ?>
								</a>
							</div>
							<div class="clb-group-details">
								<?php _e( 'When you import the demo data, the following things will happen:', 'ohio-importer' ); ?>
							</div>
							<div class="clb-group-content">
								<?php _e( 'Demo content with posts, custom post types, pages, categories, tags, media files, local page settings and', 'ohio-importer' ); ?>&nbsp;<a target="_blank" href="./admin.php?page=ohio_hub_settings"><?php _e( 'Theme Settings', 'ohio-importer' ); ?></a>&nbsp;<?php _e( 'will get imported.', 'ohio-importer' ); ?><br> <b><?php _e( 'No existing data (e.g. posts, pages, categories, tags, media files etc.) will be replaced or modified.', 'ohio-importer' ); ?></b>
							</div>
						</div>
					</div>

					<!-- Footer -->
					<div class="clb-page-footer">
						<div class="copyright">
							Copyright © <?php echo date("Y"); ?>, Ohio Version <?php
									$ohio_theme = wp_get_theme();
									echo $ohio_theme->get( 'Version' ) ? $ohio_theme->get( 'Version' ) : '2.0.0';
								?> by <a target="_blank" href="https://themeforest.net/user/colabrio">Colabrio</a>.
						</div>
						<div class="social-networks">
							<a target="_blank" href="https://docs.clbthemes.com/ohio/">Documentation</a>&nbsp;|&nbsp;<a target="_blank" href="https://colabrio.ticksy.com/">Help Center</a>&nbsp;|&nbsp;Follow Us -&nbsp;<a target="_blank" href="https://www.facebook.com/"><span class="dashicons dashicons-facebook"></span> Facebook</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php if ( is_admin() ): ?>
<script>
	window.has_license_code = '<?php echo !empty( get_option( 'ohio_license_code', '' ) ) ? 'yep' : ''; ?>';
</script>
<?php endif; ?>