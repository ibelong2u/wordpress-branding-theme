jQuery(document).ready(function() {
	// Initialize form controls
	jQuery('.control_box .control input:checkbox').parents('.control').siblings('.dependent').hide();
	jQuery('.control_box .control input:checkbox:checked').parents('.control').addClass('add_margin');
	jQuery('.control_box .control input:checkbox:checked').parents('.control').siblings('.dependent').show();

	jQuery('#no_box_tip').hide();
	jQuery('#image_tip').hide();
	jQuery('#image_alt_module').hide();
	jQuery('#video_code_module').hide();
	jQuery('#custom_code_module').hide();

	if (jQuery('#multimedia_box option[value="image"]').is(':selected')) {
		jQuery('#multimedia_select').addClass('add_margin');
		jQuery('#image_tip').show();
		jQuery('#image_alt_module').show();
	}
	else if (jQuery('#multimedia_box option[value="video"]').is(':selected')) {
		jQuery('#video_code_module').show();
	}
	else if (jQuery('#multimedia_box option[value="custom"]').is(':selected')) {
		jQuery('#custom_code_module').show();
	}
	else if (jQuery('#multimedia_box option[value="0"]').is(':selected')) {
		jQuery('#multimedia_select').addClass('add_margin');
		jQuery('#no_box_tip').show();
	}
	
	// Checkbox-dependent behaviors
	jQuery('.control_box .control input:checkbox').change(function() {
		jQuery(this).parents('.control').toggleClass('add_margin');
		jQuery(this).parents('.control').siblings('.dependent').toggle();
	});
	
	// Select-dependent behaviors
	jQuery('#multimedia_box').change(function() {
		if (jQuery('#multimedia_box option[value="image"]').is(':selected')) {
			jQuery('#multimedia_select').addClass('add_margin');
			jQuery('#image_tip').show();
			jQuery('#image_alt_module').show();
			jQuery('#no_box_tip').hide();
			jQuery('#video_code_module').hide();
			jQuery('#custom_code_module').hide();
		}
		else if (jQuery('#multimedia_box option[value="video"]').is(':selected')) {
			jQuery('#video_code_module').show();
			jQuery('#no_box_tip').hide();
			jQuery('#image_tip').hide();
			jQuery('#image_alt_module').hide();
			jQuery('#custom_code_module').hide();
		}
		else if (jQuery('#multimedia_box option[value="custom"]').is(':selected')) {
			jQuery('#custom_code_module').show();
			jQuery('#no_box_tip').hide();
			jQuery('#image_tip').hide();
			jQuery('#image_alt_module').hide();
			jQuery('#video_code_module').hide();
		}
		else if (jQuery('#multimedia_box option[value="0"]').is(':selected')) {
			jQuery('#multimedia_select').addClass('add_margin');
			jQuery('#no_box_tip').show();
			jQuery('#image_tip').hide();
			jQuery('#image_alt_module').hide();
			jQuery('#video_code_module').hide();
			jQuery('#custom_code_module').hide();
		}	
	});
});