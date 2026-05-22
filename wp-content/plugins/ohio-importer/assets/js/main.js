jQuery( function ( $ ) {
	'use strict';
	const COMMON_IMPORT_MASK = 0b1;
	const WPBAKERY_IMPORT_MASK = 0b010;
	const ELEMENTOR_SECTIONS_IMPORT_MASK = 0b100;
	const ELEMENTOR_CONTAINERS_IMPORT_MASK = 0b1000;

	/**
	 * ---------------------------------------
	 * ------------- Events ------------------
	 * ---------------------------------------
	 */

	/**
	 * No or Single predefined demo import button click.
	 */
	$( '.js-ocdi-import-data' ).on( 'click', function () {

		// Reset response div content.
		$( '.js-ocdi-ajax-response' ).empty();

		// Prepare data for the AJAX call
		var data = new FormData();
		data.append( 'action', 'ocdi_import_demo_data' );
		data.append( 'security', ocdi.ajax_nonce );
		data.append( 'selected', $( '#ocdi__demo-import-files' ).val() );
		if ( $('#ocdi__content-file-upload').length ) {
			data.append( 'content_file', $('#ocdi__content-file-upload')[0].files[0] );
		}
		if ( $('#ocdi__widget-file-upload').length ) {
			data.append( 'widget_file', $('#ocdi__widget-file-upload')[0].files[0] );
		}
		if ( $('#ocdi__customizer-file-upload').length ) {
			data.append( 'customizer_file', $('#ocdi__customizer-file-upload')[0].files[0] );
		}
		if ( $('#ocdi__redux-file-upload').length ) {
			data.append( 'redux_file', $('#ocdi__redux-file-upload')[0].files[0] );
			data.append( 'redux_option_name', $('#ocdi__redux-option-name').val() );
		}

		// AJAX call to import everything (content, widgets, before/after setup)
		ajaxCall( data );

	});


	/**
	 * Grid Layout import button click.
	 */
	$( '.js-ocdi-gl-import-data' ).on( 'click', function () {
		var selectedImportID = $( this ).val();
		var $itemContainer   = $( this ).closest( '.js-ocdi-gl-item' );


		// If the import confirmation is enabled, then do that, else import straight away.
		if ( ocdi.import_popup ) {
			// let purchase_code = ocdiGetCookie( 'theme_purchase_code' );

			if ( !window.has_license_code ) {
				showPurchasePopup( selectedImportID, $itemContainer );
			} else {
				displayConfirmationPopup( selectedImportID, $itemContainer );
			}
		}
		else {
			// gridLayoutImport( selectedImportID, $itemContainer );
		}
	});


	/**
	 * Grid Layout categories navigation.
	 */
	(function () {
		// Cache selector to all items
		var $items = $( '.js-ocdi-gl-item-container' ).find( '.js-ocdi-gl-item' ),
			fadeoutClass = 'ocdi-is-fadeout',
			fadeinClass = 'ocdi-is-fadein',
			animationDuration = 200;

		var showItemsByCategory = function( category ) {
			$items.hide();
			
			var filter = !category || category === 'all' ? 'div' : '[data-categories*="' + category + '"]';

			$items
				.filter( filter )
				.show()
				.addClass( 'ocdi-is-fadein' );
		}

		// Hide all items.
		var fadeOut = function () {
			var dfd = jQuery.Deferred();

			$items
				.addClass( fadeoutClass );

			setTimeout( function() {
				$items
					.removeClass( fadeoutClass )
					.hide();

				dfd.resolve();
			}, animationDuration );

			return dfd.promise();
		};

		var fadeIn = function ( category, dfd ) {
			var filter = category ? '[data-categories*="' + category + '"]' : 'div';

			if ( 'all' === category ) {
				filter = 'div';
			}

			$items
				.filter( filter )
				.show()
				.addClass( 'ocdi-is-fadein' );

			setTimeout( function() {
				$items
					.removeClass( fadeinClass );

				dfd.resolve();
			}, animationDuration );
		};

		var animate = function ( category ) {
			var dfd = jQuery.Deferred();

			var promise = fadeOut();

			promise.done( function () {
				fadeIn( category, dfd );
			} );

			return dfd;
		};

		$( '.js-ocdi-nav-link' ).on( 'click', function( event ) {
			event.preventDefault();

			if ( window['clb-demo-templates'].classList.length > 1 ) {
				resetUI();
			}

			$( '#tabs-1' ).show();
		  	$( 'a[href="#tabs-1"]' ).addClass('selected');
		  	$( 'a[href="#tabs-1"]' ).addClass('selected');

			// Remove 'active' class from the previous nav list items.
			$( this ).parent().siblings().removeClass( 'active' );

			// Add the 'active' class to this nav list item.
			$( this ).parent().addClass( 'active' );

			var category = this.hash.slice(1);

			// show/hide the right items, based on category selected
			//var $container = $( '.js-ocdi-gl-item-container' );
			//$container.css( 'min-width', $container.outerHeight() );

			// var promise = animate( category );

			// promise.done( function () {
			// 	$container.removeAttr( 'style' );
			// } );

			showItemsByCategory( category );
		} );
	}());


	/**
	 * Grid Layout search functionality.
	 */
	$( '.js-ocdi-gl-search' ).on( 'keyup', function( event ) {
		if ( 0 < $(this).val().length ) {
			// Hide all items.
			$( '.js-ocdi-gl-item-container' ).find( '.js-ocdi-gl-item' ).hide();

			// Show just the ones that have a match on the import name.
			$( '.js-ocdi-gl-item-container' ).find( '.js-ocdi-gl-item[data-name*="' + $(this).val().toLowerCase() + '"]' ).show();
		}
		else {
			$( '.js-ocdi-gl-item-container' ).find( '.js-ocdi-gl-item' ).show();
		}
	} );

	/**
	 * ---------------------------------------
	 * --------Helper functions --------------
	 * ---------------------------------------
	 */

	/**
	 * Prepare grid layout import data and execute the AJAX call.
	 *
	 * @param int selectedImportID The selected import ID.
	 * @param obj $itemContainer The jQuery selected item container object.
	 */
	function gridLayoutImport( selectedImportID, $itemContainer, options, type = 'wpbakery' ) {
		// Reset response div content.
		$( '.js-ocdi-ajax-response' ).empty();

		// Hide all other import items.
		$itemContainer.siblings( '.js-ocdi-gl-item' ).hide();

		window['clb-demo-templates'].classList.add(type);

		$itemContainer.animate({
			opacity: 0
		}, 500, 'swing', function () {
			$itemContainer.animate({
				opacity: 1
			}, 500 )
		});

		// Hide the header with category navigation and search box.
		$itemContainer.closest( '.js-ocdi-gl' ).find( '.js-ocdi-gl-header' ).hide();

		// Remove the import button of the selected item.
		$itemContainer.find( '.js-ocdi-gl-import-data' ).hide();

		// Update preview button URL
		$itemContainer.find( '.ocdi__gl-item-button.btn' ).hide();
		$itemContainer.find( '.ocdi__gl-item-button.btn.ocdi__local_link' ).show();

		// Prepare data for the AJAX call
		var data = new FormData();
		data.append( 'action', 'ocdi_import_demo_data' );
		data.append( 'security', ocdi.ajax_nonce );
		data.append( 'selected', selectedImportID );
		data.append( 'options', JSON.stringify( options ) );
		data.append( 'type', type );

		// AJAX call to import everything (content, widgets, before/after setup)
		ajaxCall( data );
	}

	/**
	 * Display the confirmation popup.
	 *
	 * @param int selectedImportID The selected import ID.
	 * @param obj $itemContainer The jQuery selected item container object.
	 */
	function displayConfirmationPopup( selectedImportID, $itemContainer ) {
		var $dialogContiner = $( '#js-ocdi-modal-content' );
		var currentFilePreviewImage = ocdi.import_files[ selectedImportID ]['import_preview_image_url'] || ocdi.theme_screenshot;
		var previewImageContent = '';
		var importNotice = ocdi.import_files[ selectedImportID ]['import_notice'] || '';
		var importNoticeContent = '';

		const importBitmask = parseInt($itemContainer.find('.js-ocdi-gl-import-data').attr('data-import-bitmask'));

		const getImportTypeButton = (text, type) => ({
			text,
			class: `btn ocdi-right-button ${type}`,
			click: function() {
				const options = {
					global_settings: $(this).closest('.ui-dialog').find('#import_option_settings').is(':checked'),
					media: $(this).closest('.ui-dialog').find('#import_option_media').is(':checked'),
					posts: $(this).closest('.ui-dialog').find('#import_option_posts').is(':checked'),
					projects: $(this).closest('.ui-dialog').find('#import_option_projects').is(':checked'),
					products: $(this).closest('.ui-dialog').find('#import_option_products').is(':checked'),
					widgets: $(this).closest('.ui-dialog').find('#import_option_widgets').is(':checked'),
					forms: $(this).closest('.ui-dialog').find('#import_option_forms').is(':checked')
				};
				$(this).dialog('close');
				gridLayoutImport( selectedImportID, $itemContainer, options, type );
			}
		});

		const buttons = [];

		if (importBitmask & COMMON_IMPORT_MASK) {
			buttons.push(getImportTypeButton('Import', 'common'));
		}
		if (importBitmask & WPBAKERY_IMPORT_MASK) {
			buttons.push(getImportTypeButton('Import for WPBakery', 'wpbakery'));
		}
		if (importBitmask & ELEMENTOR_CONTAINERS_IMPORT_MASK) {
			buttons.push(getImportTypeButton('Import for Elementor', 'elementor:containers'));
		}
		if (importBitmask & ELEMENTOR_SECTIONS_IMPORT_MASK) {
			buttons.push(getImportTypeButton('Import for Elementor (Sections)', 'elementor:sections'));
		}

		var dialogOptions = $.extend(
			{
				'dialogClass': 'wp-dialog',
				'resizable': false,
				'height': 'auto',
				'modal': true
			},
			ocdi.dialog_options,
			{
				'buttons': buttons
			}
		);

		if ( '' === currentFilePreviewImage ) {
			previewImageContent = '<p>' + ocdi.texts.missing_preview_image + '</p>';
		}
		else {
			previewImageContent = '<div class="clb-import-inner"><div class="ocdi__modal-image-container"><img src="' + currentFilePreviewImage + '" alt="' + ocdi.import_files[ selectedImportID ]['import_file_name'] + '"></div><div class="clb-import-options"><p>Choose what you want to be installed while import:</p><label class="form-switch"> <input id="import_option_settings" type="checkbox" checked> <i></i> Theme Settings</label><label class="form-switch"> <input id="import_option_media" type="checkbox" checked> <i></i> Media Files</label><label class="form-switch"> <input id="import_option_posts" type="checkbox" checked> <i></i> Posts</label><label class="form-switch"> <input id="import_option_projects" type="checkbox" checked> <i></i> Projects</label><label class="form-switch"> <input id="import_option_products" type="checkbox" checked> <i></i> Products</label><label class="form-switch"> <input id="import_option_forms" type="checkbox" checked> <i></i> Contact Forms</label><label class="form-switch"> <input id="import_option_widgets" type="checkbox" checked> <i></i> Widgets</label></div></div>'
		}

		// Prepare notice output.
		if( '' !== importNotice ) {
			importNoticeContent = '<div class="ocdi__modal-notice  ocdi__demo-import-notice">' + importNotice + '</div>';
		}

		// Populate the dialog content.
		$dialogContiner.prop( 'title', ocdi.texts.dialog_title );
		$dialogContiner.html(
			'<p class="ocdi__modal-item-title">' + ocdi.import_files[ selectedImportID ]['import_file_name'] + '</p>' +
			previewImageContent +
			importNoticeContent
		);

		// Display the confirmation popup.
		$dialogContiner.dialog( dialogOptions );
	}

	function resetUI() {
		$( `#tabs-1 [style*='display: none']:not(.js-ocdi-ajax-loader):not(.ocdi-card), .o-notice.warning` ).show();
		$( '.js-ocdi-ajax-response' ).empty();
		$( '.ocdi__gl-item-button.btn.ocdi__local_link, .ocdi-card' ).hide();
		$( '.js-headline-templates' ).text('Demo Templates');
		window['clb-demo-templates'].setAttribute('class', 'clb-demo-holder')
	}

	/**
	 * The main AJAX call, which executes the import process.
	 *
	 * @param FormData data The data to be passed to the AJAX call.
	 */
	function ajaxCall( data ) {
		$.ajax({
			method:      'POST',
			url:         ocdi.ajax_url,
			data:        data,
			contentType: false,
			processData: false,
			beforeSend:  function() {
				$( '.js-ocdi-ajax-loader' ).show();
				$( '.o-notice.warning, .clb-nav-search' ).hide();
				$( '.js-headline-templates' ).text('Demo is importing..');
			}
		})
		.done( function( response ) {
			if ( 'undefined' !== typeof response.status && 'newAJAX' === response.status ) {
				ajaxCall( data );
			}
			else if ( 'undefined' !== typeof response.status && 'customizerAJAX' === response.status ) {
				// Fix for data.set and data.delete, which they are not supported in some browsers.
				var newData = new FormData();
				newData.append( 'action', 'ocdi_import_customizer_data' );
				newData.append( 'security', ocdi.ajax_nonce );

				// Set the wp_customize=on only if the plugin filter is set to true.
				if ( true === ocdi.wp_customize_on ) {
					newData.append( 'wp_customize', 'on' );
				}

				ajaxCall( newData );
			}
			else if ( 'undefined' !== typeof response.status && 'afterAllImportAJAX' === response.status ) {
				// Fix for data.set and data.delete, which they are not supported in some browsers.
				var newData = new FormData();
				newData.append( 'action', 'ocdi_after_import_data' );
				newData.append( 'security', ocdi.ajax_nonce );
				ajaxCall( newData );
			}
			else if ( 'undefined' !== typeof response.message ) {
				$( '.js-ocdi-ajax-response' ).append( '<p>' + response.message + '</p>' );
				$( '.js-ocdi-ajax-loader' ).hide();
				$( '.js-headline-templates' ).text('Import Complete');
			}
			else {
				$( '.js-ocdi-ajax-response' ).append( '<div class="notice o-notice error notice-error"><i class="icon"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"><path d="M74.62-140 480-840l405.38 700H74.62ZM178-200h604L480-720 178-200Zm302-47.69q13.73 0 23.02-9.29t9.29-23.02q0-13.73-9.29-23.02T480-312.31q-13.73 0-23.02 9.29T447.69-280q0 13.73 9.29 23.02t23.02 9.29Zm-30-104.62h60v-200h-60v200ZM480-460Z"/></svg></i><div class="holder"><p>' + response + '</p><div class="_button-group"><a target="_blank" class="btn" href="https://colabrio.ticksy.com/">Need Help?</a></div></div></div>' );
				$( '.js-ocdi-ajax-loader' ).hide();
			}
		})
		.fail( function( error ) {
			$( '.js-ocdi-ajax-response' ).append( '<div class="notice o-notice error notice-error"><i class="icon"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"><path d="M74.62-140 480-840l405.38 700H74.62ZM178-200h604L480-720 178-200Zm302-47.69q13.73 0 23.02-9.29t9.29-23.02q0-13.73-9.29-23.02T480-312.31q-13.73 0-23.02 9.29T447.69-280q0 13.73 9.29 23.02t23.02 9.29Zm-30-104.62h60v-200h-60v200ZM480-460Z"/></svg></i><div class="holder"><p>Error: ' + error.statusText + ' (' + error.status + ')' + '&nbsp;<b>Try to repeat an action again.</b></p><div class="_button-group"><a target="_blank" class="btn" href="https://colabrio.ticksy.com/">Need Help?</a></div></div></div>' );
			$( '.js-ocdi-ajax-loader' ).hide();
		});
	}

	function showPurchasePopup( selectedImportID, $itemContainer ) {
		var $dialogContiner         = $( '#js-ocdi-modal-content' ).clone();
		var dialogOptions           = $.extend(
			{
				'dialogClass': 'wp-dialog theme-purchase-form',
				'resizable':   false,
				'height':      'auto',
				'modal':       true
			},
			ocdi.dialog_options,
			{
				'buttons':
				[
					{
						text: ocdi.texts.dialog_activate,
						class: 'btn ocdi-right-button',
						click: function() {
							window.location.assign(ocdi.dashboard_link);
						}
					},
					{
						text: ocdi.texts.dialog_close,
						class: 'btn btn-flat',
						click: function() {
							$(this).dialog('close');
						}
					},
					/*{
						text: 'Save',
						class: 'button  button-primary ocdi-right-button',
						click: function() {
							let purchase_code = $( '#input_purchase_code' ).val();
							var data = new FormData();
							data.append( 'action', 'ocdi_check_purchase_code' );
							data.append( 'security', ocdi.ajax_nonce );
							data.append( 'purchase_code', purchase_code );

							$.ajax({
								method:      'POST',
								url:         ocdi.ajax_url,
								data:        data,
								contentType: false,
								processData: false,
								beforeSend:  function() {
									$( '.js-ocdi-ajax-loader' ).show();
								}
							})
							.done( ( response ) => {
								if ( 'undefined' !== typeof response ) {
									$( '.js-ocdi-ajax-loader' ).hide();

									if ( response.status == 'verified' ) {
										ocdiSetCookie( 'theme_purchase_code', purchase_code );
										$(this).dialog('close');

										displayConfirmationPopup( selectedImportID, $itemContainer );
									} else {
										alert('Purchase code is invalid. Recheck and try again.');
									}
								}
							})
							.fail( ( error ) => {
								$(this).dialog('close');

								$( '.js-ocdi-ajax-response' ).append( '<div class="notice o-notice error notice-error is-dismissible"><p>Error: ' + error.statusText + ' (' + error.status + ')' + '</p></div>' );
								$( '.js-ocdi-ajax-loader' ).hide();
							});
						}
					}*/
				]
			});

		// Populate the dialog content.
		$dialogContiner.prop( 'title', 'Activation Required' );
		$dialogContiner.html(
			'<p class="ocdi__modal-item-title"><span class="envato-icon"><i class="dashicons dashicons-no-alt"></i><svg width="19" height="26" viewBox="0 0 19 26" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M10.696 26C11.338 26 11.8587 25.4793 11.8587 24.8371C11.8587 24.1949 11.338 23.6742 10.696 23.6742C10.0538 23.6742 9.53325 24.1949 9.53325 24.8371C9.53325 25.4793 10.0538 26 10.696 26Z" fill="currentColor"></path><path d="M17.375 16.9183L10.8243 17.6201C10.7045 17.6333 10.6425 17.48 10.738 17.4058L17.1485 12.4141C17.5649 12.0739 17.8299 11.5437 17.7162 10.976C17.6024 10.1056 16.8835 9.53786 15.9757 9.65161L9.01066 10.6713C8.88779 10.6896 8.82179 10.5322 8.92029 10.457L15.8244 5.18494C17.1871 4.12566 17.2998 2.04364 16.0518 0.833035C14.9166 -0.30242 13.0999 -0.264841 11.9646 0.870614L0.839316 12.1866C0.42298 12.6406 0.234106 13.2459 0.347837 13.8898C0.536712 14.9115 1.55826 15.593 2.58082 15.404L8.57808 14.1802C8.70806 14.1538 8.77914 14.3275 8.66643 14.3986L2.01216 18.6581C1.17949 19.1882 0.801745 20.1338 1.06576 21.0803C1.3308 22.3295 2.5798 23.0486 3.79022 22.7459L13.7366 20.2952C13.8483 20.2678 13.9306 20.3978 13.8585 20.4872L12.3048 22.4047C11.8885 22.9348 12.5698 23.6539 13.1375 23.2375L18.2462 19.0369C19.154 18.2803 18.5488 16.8036 17.376 16.9173L17.375 16.9183Z" fill="currentColor"></path></svg></span>Please, <a href="' + ocdi.dashboard_link + '">activate your license</a> from the Dashboard to be able to use Demo Import.</p>'
		);

		// Display the confirmation popup.
		$dialogContiner.dialog( dialogOptions );

		//$('.theme-purchase-key-form').show();

		// if ok
		// displayConfirmationPopup( selectedImportID, $itemContainer );
	}

	function ocdiSetCookie(name, value, options) {
		options = options || {};
	  
		var expires = options.expires;
	  
		if (typeof expires == "number" && expires) {
		  var d = new Date();
		  d.setTime(d.getTime() + expires * 1000);
		  expires = options.expires = d;
		}
		if (expires && expires.toUTCString) {
		  options.expires = expires.toUTCString();
		}
	  
		value = encodeURIComponent(value);
	  
		var updatedCookie = name + "=" + value;
	  
		for (var propName in options) {
		  updatedCookie += "; " + propName;
		  var propValue = options[propName];
		  if (propValue !== true) {
			updatedCookie += "=" + propValue;
		  }
		}
	  
		document.cookie = updatedCookie;
	}

	function ocdiGetCookie(name) {
		var matches = document.cookie.match(new RegExp(
		  "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
		));
		return matches ? decodeURIComponent(matches[1]) : undefined;
	  }
} );
