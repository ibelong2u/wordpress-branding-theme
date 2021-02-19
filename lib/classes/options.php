<?php
/**
 * class Options
 *
 * The Options class consists of functions used to set and retrieve the different options
 * available on the Thesis theme. Thankfully, the WordPress API saves everything to your
 * database, but the rest of the magic occurs in functions native to this class. To set 
 * your options, enter your WordPress dashboard and visit:
 * Design -> Thesis Options
 * Or, if you prefer, you can visit /wp-admin/themes.php?page=thesis-options
 *
 * @package Thesis
 * @since 1.0
 */

class Options {
	var $use_custom_style;
	var $use_mod;
	var $feed_url;
	var $show_feed_link;
	var $feed_link_text;
	var $nav_menu_pages;
	var $nav_category_pages;
	var $nav_link_category;
	var $nav_home_text;
	var $multimedia_box;
	var $image_alt_tags;
	var $video_code;
	var $custom_code;
	var $custom_field_keys;
	var $show_title;
	var $show_tagline;
	var $show_author;
	var $show_date;
	var $show_author_on_pages;
	var $show_date_on_pages;
	var $use_tags;
	var $link_tags;
	var $mint;
	var $analytics;
	var $save_button_text;
	
	/**
	 * thesis_default_options() — Sets Options variables to their defaults.
	 *
	 * @since 1.0
	 */
	function thesis_default_options() {
		$this->use_custom_style = true;
		$this->use_mod = false;
		$this->feed_url = false;
		$this->show_feed_link = true;
		$this->feed_link_text = false;
		$this->nav_menu_pages = false;
		$this->nav_category_pages = false;
		$this->nav_link_category = false;
		$this->nav_home_text = false;
		$this->multimedia_box = 'image';
		$this->image_alt_tags = false;
		$this->video_code = false;
		$this->custom_code = false;
		// If you're internationalizing the theme, do NOT edit the following array keys! You'll bork the theme.
		$this->custom_field_keys = array(
			'image' => 'image',
			'video' => 'video',
			'html' => 'custom',
			'thumbnail' => 'thumb'
		);
		$this->show_title = true;
		$this->show_tagline = true;
		$this->show_author = true;
		$this->show_date = true;
		$this->show_author_on_pages = false;
		$this->show_date_on_pages = false;
		$this->use_tags = false;
		$this->link_tags = false;
		$this->mint = false;
		$this->analytics = false;
		$this->save_button_text = false;
	}
	
	/**
	 * get_thesis_options() — Retrieves saved options from the WP database
	 *
	 * @since 1.0
	 */
	function thesis_get_options() {
		$saved_options = maybe_unserialize(get_option('thesis_options'));
		
		if (!empty($saved_options) && is_object($saved_options)) {
			foreach ($saved_options as $option_name => $value)
				$this->$option_name = $value;
		}
	}
	
	function thesis_update_options() {
		// Customization
		$this->use_custom_style = (bool) $_POST['use_custom_style'];
		$this->thesis_set_option('use_mod');
		
		// Syndication
		$this->thesis_set_option('feed_url');
		$this->show_feed_link = (bool) $_POST['show_feed_link'];
		$this->thesis_set_option('feed_link_text');
		
		// Navigation
		if ($_POST['nav_menu_pages'])
			$this->nav_menu_pages = implode(',', $_POST['nav_menu_pages']);
		else
			$this->nav_menu_pages = false;
			
		if ($_POST['nav_category_pages'])
			$this->nav_category_pages = implode(',', $_POST['nav_category_pages']);
		else
			$this->nav_category_pages = false;

		$this->thesis_set_option('nav_link_category');
		$this->thesis_set_option('nav_home_text');
		
		// Multimedia box
		$this->thesis_set_option('multimedia_box');
		$this->thesis_set_option('image_alt_tags');	
		$this->thesis_set_option('video_code');
		$this->thesis_set_option('custom_code');
		
		$custom_field_keys = $_POST['custom_field_keys'];
		if ($custom_field_keys) {
			foreach ($custom_field_keys as $type => $key_value) {
				if (($this->custom_field_keys[$type] != $key_value) && $key_value)
					$this->custom_field_keys[$type] = $key_value;
			}
		}
		
		// Display options
		$this->show_title = (bool) $_POST['show_title'];
		$this->show_tagline = (bool) $_POST['show_tagline'];
		$this->show_author = (bool) $_POST['show_author'];
		$this->show_date = (bool) $_POST['show_date'];
		$this->show_author_on_pages = (bool) $_POST['show_author_on_pages'];
		$this->show_date_on_pages = (bool) $_POST['show_date_on_pages'];
		$this->use_tags = (bool) $_POST['use_tags'];
		$this->link_tags = (bool) $_POST['link_tags'];
		
		// Stats and scripts
		$this->thesis_set_option('mint');
		$this->thesis_set_option('analytics');
		
		// Misc
		$this->thesis_set_option('save_button_text');
	}
	
	function thesis_set_option($option_name) {
		if ($_POST[$option_name])
			$this->$option_name = $_POST[$option_name];
		else
			$this->$option_name = false;
	}
}

function thesis_save_options() {
	$thesis_options = new Options;
	$thesis_options->thesis_get_options();
	
	thesis_upgrade_options();
	
	if (isset($_POST['submit'])) {
		$thesis_options->thesis_update_options();
		update_option('thesis_options', serialize($thesis_options));
	}
}

function thesis_upgrade_options() {
	$thesis_options = new Options;
	$thesis_options->thesis_get_options();
	
	$default_options = new Options;
	$default_options->thesis_default_options();
	
	foreach ($thesis_options as $option_name => $value) {
		if (!isset($default_options->$option_name))
			unset($thesis_options->$option_name); // Has this option been nuked? If so, kill it!
		elseif (!isset($thesis_options->$option_name)) 
			$thesis_options->$option_name = $default_options->$option_name; // If the option doesn't exist, use the default

//		The following code is only compatible with PHP 5 and above, so I'm nixing it for the time being.		
//		if (is_array($thesis_options->$option_name) && is_array($default_options->$option_name) && function_exists('array_diff_key')) { // If the option is an array, make sure the indices match
//			if (array_diff_key($thesis_options->$option_name, $default_options->$option_name))
//				$thesis_options->$option_name = $default_options->$option_name;
//		}
	}
	
	update_option('thesis_options', serialize($thesis_options)); // Save upgraded options
}

function thesis_get_option($option_name, $display = false) {
	$thesis_options = new Options;
	$thesis_options->thesis_get_options();

	if ($display)
		echo $thesis_options->$option_name;
	else
		return $thesis_options->$option_name;
}