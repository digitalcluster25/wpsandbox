!function($) {
	$('#vc_ui-panel-edit-element .ohio_extra_posts_block select').select2({
		maximumSelectionLength: 5,
		placeholder: 'All',
	});

	$('#vc_ui-panel-edit-element').on('change', '.ohio_extra_posts_block select', function(e){
		var $input = $(this);
		var $value_hidden_input = $(this).closest('.ohio_extra_posts_block').find('input.wpb_vc_param_value');
		$value_hidden_input.val( ( $input.val() ? $input.val().join(',') : '' ) ).trigger('change');
	});

}(window.jQuery);
