<div id="thesis_options" class="wrap <?php if (get_bloginfo('text_direction') == 'rtl') { echo ' rtl'; } ?>">
	<h2><?php _e('Thesis Options', 'thesis'); ?></h2>

<?php 
		if (isset($_POST['submit'])) {
?>
	<div id="updated" class="updated fade">
		<p><?php echo __('Options updated!', 'thesis') . ' <a href="' . get_bloginfo('url') . '/">' . __('Check out your site &rarr;', 'thesis') . '</a>'; ?></p>
	</div>

<?php 
		} 
?>

	<form class="thesis" action="<?php echo $thesis_options_url; ?>" method="post">
		<div class="options_column">
			<div class="options_module" id="custom-styles">
				<h3><?php _e('Customize Your Thesis Design', 'thesis'); ?></h3>
				<div class="module_subsection">
					<h4><?php _e('Custom Stylesheet', 'thesis'); ?></h4>
					<p><?php _e('If you want to make stylistic changes with <acronym title="Cascading Style Sheet">CSS</acronym>, you should use the Thesis custom stylesheet to do so. Yours is located <a href="' . THESIS_CUSTOM_FOLDER . '/custom.css">here</a>.', 'thesis'); ?></p>
					<ul>
						<li><input type="checkbox" id="use_custom_style" name="use_custom_style" value="1" <?php if (thesis_get_option('use_custom_style')) echo 'checked="checked" '; ?>/><label for="use_custom_style"><?php _e('Use custom stylesheet', 'thesis'); ?></label></li>
					</ul>
				</div>
			</div>
			
			<div class="options_module" id="syndication">
				<h3><?php _e('Syndication/Feed', 'thesis'); ?></h3>
				<div class="module_subsection">
					<p><?php _e('If you&#8217;re using a service like <a href="http://www.feedburner.com/">Feedburner</a> to manage your <acronym title="Really Simple Syndication">RSS</acronym> feed (highly recommended), you should enter the <acronym title="Uniform Resource Locator">URL</acronym> of your feed in the box below. If you&#8217;d prefer to use the default WordPress feed, simply leave this box blank.', 'thesis'); ?></p>
					<p class="form_input add_margin">
						<input type="text" class="text_input" id="feed_url" name="feed_url" value="<?php if (thesis_get_option('feed_url')) thesis_get_option('feed_url', true); ?>" />
						<label for="feed_url"><?php _e('Feed <acronym title="Uniform Resource Locator">URL</acronym> (including &#8216;http://&#8217;)', 'thesis'); ?></label>
					</p>
					<div class="control_box">
						<ul class="control">
							<li><input type="checkbox" id="show_feed_link" name="show_feed_link" value="1" <?php if (thesis_get_option('show_feed_link')) echo 'checked="checked" '; ?>/><label for="show_feed_link"><?php _e('Show feed link in header', 'thesis'); ?></label></li>
						</ul>
						<p class="form_input dependent">
							<input type="text" class="text_input" id="feed_link_text" name="feed_link_text" value="<?php echo thesis_feed_link_text(); ?>" />
							<label for="feed_link_text"><?php _e('Change your feed link text', 'thesis'); ?></label>
						</p>
					</div>
				</div>
			</div>

			<div class="options_module" id="thesis-nav-menu">
				<h3><?php _e('Navigation Menu', 'thesis'); ?></h3>
				<div class="module_subsection">
					<h4><?php _e('Select pages to include in nav menu:', 'thesis') ?></h4>
<?php
				$pages = &get_pages('sort_column=post_parent,menu_order');
				$nav_menu_pages = explode(',', thesis_get_option('nav_menu_pages'));

				if ($pages) {
					echo "<ul>\n";
					foreach ($pages as $page) {
						echo '<li><input type="checkbox" id="nav_menu_page_' . $page->ID . '" name="nav_menu_pages[]" value="' . $page->ID . '"';
						if (in_array($page->ID, $nav_menu_pages))
							echo ' checked="checked"';

						echo ' /><label for="nav_menu_page_' . $page->ID . '">' . $page->post_title . '</label></li>' . "\n";
					}
					echo "</ul>\n";
				}

?>
				</div>
				<div class="module_subsection">
					<h4><?php _e('Include these category pages in nav menu:', 'thesis') ?></h4>
					<p><?php _e('If you&#8217;d like to include category archive pages in your nav menu, simply select the appropriate categories from the list below (you can select more than one).', 'thesis'); ?></p>
					<p class="form_input">
						<select class="select_multiple" id="nav_category_pages" name="nav_category_pages[]" multiple="multiple" size="1">
							<option value="0"><?php _e('No category page links', 'thesis'); ?></option>
<?php
						$categories = &get_categories('type=post&orderby=name&hide_empty=0');

						if ($categories) {
							$nav_category_pages = explode(',', thesis_get_option('nav_category_pages'));
							
							foreach ($categories as $category) {
								echo '<option value="' . $category->cat_ID . '"';
								if (in_array($category->cat_ID, $nav_category_pages))
									echo ' selected="selected"';
									
								echo '>' . $category->cat_name . '</option>' . "\n";
							}
						}
?>
						</select>
				</div>
				<div class="module_subsection">
					<h4><?php _e('Add more links', 'thesis'); ?></h4>
					<p><?php _e('You can insert additional navigation links on the <a href="' . get_bloginfo('wpurl') . '/wp-admin/link-manager.php">Manage Links</a> page. To ensure that things go smoothly, you should first <a href="' . get_bloginfo('wpurl') . '/wp-admin/edit-link-categories.php#addcat">create a link category</a> solely for your navigation menu, and then make sure you place your new links in that category. Once you&#8217;ve done that, you can select your category below to include it in your nav menu.', 'thesis'); ?></p>
					<p class="form_input">
						<select id="nav_link_category" name="nav_link_category" size="1">
							<option value="0"><?php _e('No additional links', 'thesis'); ?></option>
<?php
						$link_categories = &get_categories('type=link&hide_empty=0');
						
						if ($link_categories) {
							foreach ($link_categories as $link_category) {
								echo '<option value="' . $link_category->cat_ID . '"';
								if (thesis_get_option('nav_link_category') == $link_category->cat_ID)
									echo ' selected="selected"';
								
								echo '>' . $link_category->cat_name . '</option>' . "\n";
							}
						}
?>
						</select>
					</p>
				</div>
				<div class="module_subsection">
					<h4><?php _e('Change your &#8220;Home&#8221; link text', 'thesis'); ?></h4>
					<p class="form_input">
						<input type="text" id="nav_home_text" name="nav_home_text" value="<?php echo thesis_home_link_text(); ?>" />
						<label for="nav_home_text"><?php _e('not recommended', 'thesis'); ?></label>
					</p>
				</div>
			</div>
		</div>
		
		<div class="options_column">
			<div class="options_module" id="thesis-multimedia-box">
				<h3><?php _e('Multimedia Box', 'thesis'); ?></h3>
				<div class="module_subsection">
					<h4><?php _e('Choose default setting', 'thesis'); ?></h4>
					<p><?php _e('The default multimedia box setting applies to your home page, archive pages (category, tag, date-based, and author-based), search pages, and 404 pages. You can override the default setting on any individual post or page by utilizing the custom field keys that are defined below.', 'thesis'); ?></p>
					<p class="form_input" id="multimedia_select">
						<select id="multimedia_box" name="multimedia_box" size="1">
							<option value="0"<?php if (!thesis_get_option('multimedia_box')) echo ' selected="selected"'; ?>><?php _e('Do not show box', 'thesis'); ?></option>
							<option value="image"<?php if (thesis_get_option('multimedia_box') == 'image') echo ' selected="selected"'; ?>><?php _e('Rotating images', 'thesis'); ?></option>
							<option value="video"<?php if (thesis_get_option('multimedia_box') == 'video') echo ' selected="selected"'; ?>><?php _e('Embed a video', 'thesis'); ?></option>
							<option value="custom"<?php if (thesis_get_option('multimedia_box') == 'custom') echo ' selected="selected"'; ?>><?php _e('Custom code', 'thesis'); ?></option>
						</select>
					</p>
					<p class="tip" id="no_box_tip"><?php _e('Remember, even though you&#8217;ve disabled the multimedia box here, you can activate it on single posts or pages by using custom fields.', 'thesis'); ?></p>
					<p class="tip" id="image_tip"><?php _e('Any images you upload to your <a href="' . THESIS_ROTATOR_FOLDER . '">rotator folder</a> will automatically appear in the list below.', 'thesis'); ?></p>
				</div>
				<div class="module_subsection" id="image_alt_module">
					<h4><?php _e('Define image alt tags', 'thesis'); ?></h4>
					<p><?php _e('It&#8217;s a good practice to add descriptive alt tags to every image you place on your site. Use the input fields below to add customized alt tags to your rotating images.', 'thesis'); ?></p>
<?php
					$rotator_dir = opendir(THESIS_ROTATOR);	
					while (($file = readdir($rotator_dir)) !== false) {
						if (strpos($file, '.jpg') || strpos($file, '.jpeg') || strpos($file, '.png') || strpos($file, '.gif'))
							$images[$file] = THESIS_ROTATOR_FOLDER . '/' . $file;
					}
					
					$image_count = 1;
					$image_alt_tags = thesis_get_option('image_alt_tags');
					
					if ($images) {
						foreach ($images as $image => $image_url) {
?>
					<p class="form_input<?php if ($image_count < count($images)) echo ' add_margin'; ?>">
						<input type="text" class="text_input" id="image_alt_tags[<?php echo $image; ?>]" name="image_alt_tags[<?php echo $image; ?>]" value="<?php if ($image_alt_tags[$image]) echo $image_alt_tags[$image]; ?>" />
						<label for="image_alt_tags[<?php echo $image; ?>]"><?php _e('alt text for ' . $image . ' &nbsp; <a href="' . $image_url . '" target="_blank">view</a>', 'thesis'); ?></label>
					</p>
<?php
							$image_count++;
						}
					}
					else {
?>
					<p class="form_input"><?php _e('You don&#8217;t have any images to rotate! Try adding some images to your <a href="' . THESIS_ROTATOR_FOLDER . '">rotator folder</a>, and then come back here to edit your alt tags.', 'thesis'); ?></p>
<?php
					}
?>
				</div>
				<div class="module_subsection" id="video_code_module">
					<h4><?php _e('Embedded video code', 'thesis'); ?></h4>
					<p><?php _e('Place your video embed code in the box below, and it will appear in the multimedia box by default.', 'thesis'); ?></p>
					<p class="form_input">
						<label for="video_code"><?php _e('Video embed code', 'thesis'); ?></label>
						<textarea id="video_code" name="video_code"><?php if (thesis_get_option('video_code')) thesis_massage_code(thesis_get_option('video_code')); ?></textarea>
					</p>
				</div>
				<div class="module_subsection" id="custom_code_module">
					<h4><?php _e('Custom multimedia box code', 'thesis'); ?></h4>
					<p><?php _e('If you like, you can place custom <acronym title="HyperText Markup Language">HTML</acronym> in the multimedia box. Simply paste your code in the box below, but don&#8217;t forget to style it using your custom stylesheet!', 'thesis'); ?></p>
					<p class="form_input">
						<label for="custom_code"><?php _e('Custom multimedia box code', 'thesis'); ?></label>
						<textarea id="custom_code" name="custom_code"><?php if (thesis_get_option('custom_code')) thesis_massage_code(thesis_get_option('custom_code')); ?></textarea>
					</p>
				</div>
				<div class="module_subsection">
					<h4><?php _e('Define custom field keys', 'thesis'); ?></h4>
					<p><?php _e('When you try to add a custom field to a post or page, you must select a <strong>key</strong> that will be used to reference your custom field value. Using the default keys below is recommended, but if they conflict with any of your existing keys, you can change them here.', 'thesis'); ?></p>
<?php
			$custom_field_keys = thesis_get_option('custom_field_keys');
			$key_num = 1;
			
			if ($custom_field_keys) {
				foreach ($custom_field_keys as $type => $key_value) {
					if ($key_num < count($custom_field_keys))
						$add_margin = ' add_margin';
					else
						$add_margin = '';
?>
					<p class="form_input<?php echo $add_margin; ?>">
						<input type="text" class="text_input" id="custom_field_keys[<?php echo $type; ?>]" name="custom_field_keys[<?php echo $type; ?>]" value="<?php if ($key_value) echo $key_value; ?>" />
						<label for="custom_field_keys[<?php echo $type; ?>]"><?php _e($type . ' custom field key', 'thesis'); ?></label>
					</p>
<?php
					$key_num++;
				}
			}
?>
				</div>
			</div>
		</div>
	
		<div class="options_column">
			<div class="options_module" id="display-options">
				<h3><?php _e('Display Options', 'thesis'); ?></h3>
				<div class="module_subsection">
					<h4><?php _e('Publishing', 'thesis'); ?></h4>
					<ul>
						<li><input type="checkbox" id="show_title" name="show_title" value="1" <?php if (thesis_get_option('show_title')) echo 'checked="checked" '; ?>/><label for="show_title"><?php _e('Show site name in header', 'thesis'); ?></label></li>
						<li><input type="checkbox" id="show_tagline" name="show_tagline" value="1" <?php if (thesis_get_option('show_tagline')) echo 'checked="checked" '; ?>/><label for="show_tagline"><?php _e('Show site tagline in header', 'thesis'); ?></label></li>
						<li><input type="checkbox" id="show_author" name="show_author" value="1" <?php if (thesis_get_option('show_author')) echo 'checked="checked" '; ?>/><label for="show_author"><?php _e('Show author name in <strong>post</strong> byline', 'thesis'); ?></label></li>
						<li><input type="checkbox" id="show_date" name="show_date" value="1" <?php if (thesis_get_option('show_date')) echo 'checked="checked" '; ?>/><label for="show_date"><?php _e('Show published-on date in <strong>post</strong> byline', 'thesis'); ?></label></li>
						<li><input type="checkbox" id="show_author_on_pages" name="show_author_on_pages" value="1" <?php if (thesis_get_option('show_author_on_pages')) echo 'checked="checked" '; ?>/><label for="show_author_on_pages"><?php _e('Show author name in <strong>page</strong> byline', 'thesis'); ?></label></li>
						<li><input type="checkbox" id="show_date_on_pages" name="show_date_on_pages" value="1" <?php if (thesis_get_option('show_date_on_pages')) echo 'checked="checked" '; ?>/><label for="show_date_on_pages"><?php _e('Show published-on date in <strong>page</strong> byline', 'thesis'); ?></label></li>
					</ul>
				</div>
				<div class="module_subsection">
					<h4><?php _e('Tagging', 'thesis'); ?></h4>
					<div class="control_box">
						<ul class="control">
							<li><input type="checkbox" id="use_tags" name="use_tags" value="1" <?php if (thesis_get_option('use_tags')) echo 'checked="checked" '; ?>/><label for="use_tags"><?php _e('Use tags', 'thesis'); ?></label></li>
						</ul>
						<div class="dependent">
							<p class="label_note"><?php echo __('On single entry pages&hellip;', 'thesis'); ?></p>
							<ul>
								<li><input type="radio" name="link_tags" value="0" <?php if (thesis_get_option('use_tags') && !thesis_get_option('link_tags')) echo 'checked="checked" '; ?>/><label><?php _e('<em>do not</em> link tags to archive pages', 'thesis'); ?></label></li>
								<li><input type="radio" name="link_tags" value="1" <?php if (thesis_get_option('use_tags') && thesis_get_option('link_tags')) echo 'checked="checked" '; ?>/><label><?php _e('link tags to archive pages', 'thesis'); ?></label></li>
							</ul>
						</div>
					</div>
				</div>
			</div>

			<div class="options_module" id="thesis-stats">
				<h3><?php _e('Stats Software and Scripts', 'thesis'); ?></h3>
				<div class="module_subsection">
					<h4><?php _e('Mint', 'thesis'); ?></h4>
					<p><?php _e('If you&#8217;re using the Web site analytics program <a href="http://haveamint.com/">Mint</a>, you should enter your tracking code here.', 'thesis'); ?></p>
					<p class="form_input">
						<label for="mint"><?php _e('Mint tracking code', 'thesis'); ?></label>
						<textarea id="mint" name="mint"><?php if (thesis_get_option('mint')) thesis_massage_code(thesis_get_option('mint')); ?></textarea>
					</p>
				</div>
				<div class="module_subsection">
					<h4><?php _e('Google Analytics', 'thesis'); ?></h4>
					<p><?php _e('If you&#8217;re using <a href="http://www.google.com/analytics/">Google Analytics</a> to track your site&#8217;s statistics, you should enter your tracking code here.', 'thesis'); ?></p>
					<p class="form_input">
						<label for="analytics"><?php _e('Google Analytics tracking code'); ?></label>
						<textarea id="analytics" name="analytics"><?php if (thesis_get_option('analytics')) thesis_massage_code(thesis_get_option('analytics')); ?></textarea>
					</p>
				</div>
			</div>

			<div class="options_module button_module">
				<input type="submit" class="save_button" name="submit" value="<?php thesis_save_button_text(true); ?>" />
			</div>

			<div class="options_module" id="save_button_control">
				<div class="module_subsection">
					<h4><?php _e('Change save button text', 'thesis'); ?></h4>
					<p class="form_input">
						<input type="text" id="save_button_text" name="save_button_text" value="<?php if (thesis_get_option('save_button_text')) thesis_save_button_text(true); ?>" />
						<label for="nav_home_text"><?php _e('not recommended (heh)', 'thesis'); ?></label>
					</p>
				</div>
			</div>
		</div>
	</form>
</div>