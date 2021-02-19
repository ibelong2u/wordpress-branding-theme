<?php

function thesis_add_menu() {
	add_theme_page(__('Thesis Options', 'thesis'), __('Thesis Options', 'thesis'), 'edit_themes', 'thesis-options', 'thesis_admin');
}

function thesis_admin() {
	thesis_save_options();	
	$thesis_options_url = get_bloginfo('wpurl') . '/wp-admin/themes.php?page=thesis-options';
	include(THESIS_ADMIN . '/options_page.php');
}

function thesis_massage_code($code) {
 	echo htmlentities(stripslashes($code), ENT_COMPAT);
}

function thesis_options_stylesheet() {
	echo '<link rel="stylesheet" href="' . get_bloginfo('template_directory') . '/lib/stylesheets/options.css" type="text/css" media="screen" />';
}

function thesis_options_js() {
	wp_enqueue_script('thesis_js', THESIS_JS_FOLDER . '/thesis.js', 'jquery');
}

function thesis_save_button_text($display = false) {
	if (thesis_get_option('save_button_text'))
		$save_button_text = strip_tags(stripslashes(thesis_get_option('save_button_text')));
	else
		$save_button_text = __('Big Ass Save Button', 'thesis');
	
	if ($display)
		echo $save_button_text;
	else
		return $save_button_text;
}