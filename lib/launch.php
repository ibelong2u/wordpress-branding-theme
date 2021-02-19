<?php

// Internationalization
load_theme_textdomain('thesis');

// Register sidebars for WordPress Widgets
if (function_exists('register_sidebars')) {
	register_sidebars(2,
		array(
			'name' => 'Sidebar %d',
			'before_widget' => '<li class="widget %2$s">',
			'after_widget' => '</li>',
			'before_title' => '<h3>',
			'after_title' => '</h3>'
		)
	);
}

// Thesis Options Page in the WordPress Dashboard
add_action('admin_head-design_page_thesis-options', 'thesis_options_stylesheet');
add_action('admin_print_scripts-design_page_thesis-options', 'thesis_options_js');
add_action('admin_menu', 'thesis_add_menu');

// Compile the Thesis header
add_action('thesis_hook_header', 'thesis_stylesheet_links');
add_action('thesis_hook_header', 'thesis_header_feed_link');
add_action('thesis_hook_header', 'thesis_header_pingback_link');

if (thesis_get_option('mint'))
	add_action('thesis_hook_header', 'thesis_mint_tracking_code');

// Compile the Thesis footer
add_action('thesis_hook_footer', 'thesis_ie_clear');
if (thesis_get_option('analytics'))
	add_action('thesis_hook_footer', 'thesis_analytics_tracking_code');

// Widgety goodness
register_sidebar_widget(__('Search', 'thesis'), 'thesis_search_widget');
register_widget_control(__('Search', 'thesis'), 'thesis_search_control');
register_sidebar_widget(__('Google Custom Search', 'thesis'), 'thesis_google_cse_widget');
register_widget_control(__('Google Custom Search', 'thesis'), 'thesis_google_cse_control');