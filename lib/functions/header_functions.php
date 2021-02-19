<?php

function thesis_output_title() {
	$site_name = get_bloginfo('name');
	
	if (is_single() || is_page() || is_archive())
		$page_title = trim(wp_title('', false));
	else
		$page_title = get_bloginfo('description');
		
	echo $page_title . ' &#8212; ' . $site_name;
}

function thesis_stylesheet_links() {
	// Main stylesheet
	$stylesheets['core'] = array(
		'url' => get_bloginfo('stylesheet_url'),
		'media' => 'screen'
	);
	
	// Custom stylesheet, if applicable
	if (thesis_get_option('use_custom_style')) {
		$stylesheets['custom'] = array(
			'url' => THESIS_CUSTOM_FOLDER . '/custom.css',
			'media' => 'screen'
		);
	}
	
	// Mod stylesheet, if applicable
	if (thesis_get_option('use_mod')) {
		$available_mods = array();
		$mods_dir = opendir(THESIS_MODS);
		while (($file = readdir($mods_dir)) !== false) {
			if ($file != '.' && $file != '..')
				$available_mods[] = '/' . $file;
		}

		foreach ($available_mods as $available_mod) {
			$mod_dir = opendir(THESIS_MODS . $available_mod);
			while (($mod_style = readdir($mod_dir)) !== false) {
				if ($mod_style == thesis_get_option('use_mod')) {
					$use_mod_dir = $available_mod;
					$use_mod_style = '/' . $mod_style;
				}
			}
		}

		$stylesheets['mods'] = array(
			'url' => get_bloginfo('template_url') . '/mods' . $use_mod_dir . $use_mod_style,
			'media' => 'screen'
		);
	}
	
	// Deprecated styles
	$stylesheets['deprecated'] = array(
		'url' => THESIS_STYLESHEETS_FOLDER . '/deprecated.css',
		'media' => 'screen'
	);
	
	foreach ($stylesheets as $stylesheet)
		echo "<link rel=\"stylesheet\" href=\"" . $stylesheet['url'] . "\" type=\"text/css\" media=\"" . $stylesheet['media'] . "\" />\n";

	// IE stylesheets
	thesis_ie_stylesheets();
}

function thesis_ie_stylesheets() {
	$ie_stylesheets = array(
		'ie7' => array(
			'url' => THESIS_STYLESHEETS_FOLDER . '/ie7.css',
			'media' => 'screen'
		),
		'ie6' => array(
			'url' => THESIS_STYLESHEETS_FOLDER . '/ie6.css',
			'media' => 'screen'
		)
	);
	
	foreach ($ie_stylesheets as $browser => $ie_stylesheet) {
		if ($browser == 'ie7')
			$version = 7;
		elseif ($browser == 'ie6')
			$version = 6;
		
		echo "<!--[if lte IE " . $version . "]>\n";
		echo "<link rel=\"stylesheet\" href=\"" . $ie_stylesheet['url'] . "\" type=\"text/css\" media=\"" . $ie_stylesheet['media'] . "\" />\n";
		echo "<![endif]-->\n";
	}
}

function thesis_header_feed_link() {
	$feed_title = get_bloginfo('name') . ' RSS Feed';
	echo "<link rel=\"alternate\" type=\"application/rss+xml\" title=\"" . $feed_title . "\" href=\"" . thesis_feed_url() . "\" />\n";
}

function thesis_feed_url($display = false) {
	if (!thesis_get_option('feed_url'))
		$feed_url = get_bloginfo('rss2_url');
	else
		$feed_url = thesis_get_option('feed_url');
		
	if ($display)
		echo $feed_url;
	else
		return $feed_url;
}

function thesis_header_pingback_link() {
	echo "<link rel=\"pingback\" href=\"" . get_bloginfo('pingback_url') . "\" />\n";
}

function thesis_mint_tracking_code() {
	echo stripslashes(thesis_get_option('mint')) . "\n";
}

function thesis_body_classes() {
	if (thesis_get_option('use_custom_style'))
		$classes[] = 'custom';
	if (thesis_get_option('use_mod')) {
		$mod_file = thesis_get_option('use_mod');
		$classes[] = str_replace('.css', '', $mod_file);
	}
	
	if (is_array($classes))
		$classes = implode(' ', $classes);
		
	if ($classes)
		echo ' class="' . $classes . '"';
}

function thesis_nav_menu() {
	if (get_option('show_on_front') == 'page')
		$static_page_id = get_option('page_on_front');
	
	if ($static_page_id && is_page($static_page_id))
		$home_class = ' class="current_page_item"';
	else { 
		if ($static_page_id && !is_page($static_page_id))
			$home_class = '';
		elseif (is_home())
			$home_class = ' class="current_page_item"';
	}
	
	$home_text = thesis_home_link_text();
		
	echo '<ul id="tabs">' . "\n";	
//	echo '<li' . $home_class . '><a href="' . get_bloginfo('url') . '" title="' . $home_text . '" rel="nofollow">' . $home_text . '</a></li>' . "\n";
	
	if (thesis_get_option('nav_menu_pages')) {
		$pages = &get_pages('sort_column=post_parent,menu_order');
		$nav_menu_pages = explode(',', thesis_get_option('nav_menu_pages'));
	
		if ($pages && $nav_menu_pages) {
			foreach ($pages as $page) {
				if (!in_array($page->ID, $nav_menu_pages))
					$exclude_pages[] = $page->ID;
			}
		
			if ($exclude_pages)
				$exclude_pages = implode(',', $exclude_pages);

			wp_list_pages('title_li=&exclude=' . $static_page_id . ',' . $exclude_pages);
		}
	}
	
	if (thesis_get_option('nav_category_pages')) {
		$categories = &get_categories('type=post&orderby=name&hide_empty=0');
		$category_pages = explode(',', thesis_get_option('nav_category_pages'));
		
		if ($categories && $category_pages) {
			foreach ($categories as $category) {
				if (!in_array($category->cat_ID, $category_pages))
					$exclude_cats[] = $category->cat_ID;
			}
			
			if ($exclude_cats)
				$exclude_cats = implode(',', $exclude_cats);
			
			wp_list_categories('title_li=&exclude=' . $exclude_cats);
		}
	}
	
	if (thesis_get_option('nav_link_category')) 
	{
		$nav_category = thesis_get_option('nav_link_category');
		$nav_links = get_bookmarks('category=' . $nav_category);
		
		foreach ($nav_links as $nav_link) 
		{
			if ($nav_link->link_description) $title = ' title="' . $nav_link->link_description . '"';
			if ($nav_link->link_rel) $rel = ' rel="' . $nav_link->link_rel . '"';
			if ($nav_link->link_target) $target = ' target="' . $nav_link->link_target . '"';
				
			$linktext = $nav_link->link_name;
			
			echo '<li class="';
			if ($linktext=='Wellness') echo 'last_item';   /* to remove right border off wellness link - aditya */
			else  echo 'page_item';                               
		    if (is_category('buzz') && ($linktext=='The Buzz')) echo ' current_page_item';            /* to fix on-states - inserted by aditya */
		    if (is_page('wellness') && ($linktext=='Wellness')) echo ' current_page_item';        /* to fix on-states - inserted by aditya */
			
			echo '"><a href="' . $nav_link->link_url . '"' . $title . $rel . $target . '>' . $nav_link->link_name . '</a></li>' . "\n";
		}
	}
	
/*
	if (thesis_get_option('show_feed_link')) 
	{
		$feed_title = get_bloginfo('name') . ' RSS Feed';
		echo '		<li class="rss"><a href="' . thesis_feed_url() . '" title="' . $feed_title . '">' . thesis_feed_link_text() . '</a></li>' . "\n";
	}
*/	
	
		
/*		//inserted by aditya
//		echo '<li style="border-right:none;"><a href="/shop/">&clubs;&nbsp;Shop</a></li>';   */
		echo '<li';
		if (is_page('7')) echo ' class="current_page_item"';    /* to fix on-states - aditya */
		echo ' onmouseover="javascript:ChangeShopWhite();" onmouseout="javascript:ChangeShopPurple();" style="border-right:none; margin-left:15px;"><a href="/shop/"><img id="shopicon" src="http://www.smhbeta.dreamhosters.com/wp-content/themes/SMH_1/images/berrypurple.gif"/>&nbsp;Shop</a></li>';



		echo '<li ';
		if (is_page('18')) echo 'class="current_page_item"';		/* to fix on-states - aditya */
		echo ' onmouseover="javascript:ChangeDotWhite();" onmouseout="javascript:ChangeDotPurple();" style="border-right:none;"><a href="/connect/"><span id="connecticon" style="letter-spacing:0.1px; color:#336;">&#9679;&#9679;</span>&nbsp;Connect</a></li>';


	echo '</ul>' . "\n";
}

function thesis_home_link_text() {
	if (thesis_get_option('nav_home_text'))
		return thesis_get_option('nav_home_text');
	else
		return __('Home', 'thesis');
}

function thesis_feed_link_text() {
	if (thesis_get_option('feed_link_text'))
		return thesis_get_option('feed_link_text');
	else
		return __('Subscribe', 'thesis');
}

function thesis_show_title() {
	if (thesis_get_option('show_title')) {
?>
		<p id="logo"<?php if (!thesis_get_option('show_tagline')) echo ' class="remove_bottom_margin"' ?>><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></p>
<?php
	}
}

function thesis_show_tagline() {
	if (thesis_get_option('show_tagline')) {
		if (is_home()) {
?>
		<h1 id="tagline"><?php bloginfo('description'); ?></h1>
<?php 
		} 
		else { 
?>
		<p id="tagline"><?php bloginfo('description'); ?></p>
<?php 
		}
	}
}