<?php

function thesis_get_sidebars() {
	include (TEMPLATEPATH . '/sidebars.php');
}

function thesis_sidebar_classes() {
	if (is_single() || is_page()) {
		global $post;

		$image_meta = get_post_meta($post->ID, thesis_get_custom_field_key('image'), true);
		$video_meta = get_post_meta($post->ID, thesis_get_custom_field_key('video'), true);
		$custom_meta = get_post_meta($post->ID, thesis_get_custom_field_key('html'), true);
		
		if ($image_meta || $video_meta || $custom_meta || thesis_get_option('multimedia_box'))
			echo '';
		else
			echo ' class="pad_sidebars"';
	}
	elseif (!thesis_get_option('multimedia_box'))
		echo ' class="pad_sidebars"';
	else
		echo '';
}

function thesis_recent_posts_widget($category_slug = false, $title = 'Recent Entries', $number = 5) {
	if ($category_slug)
		$category = 'category_name=' . $category_slug;
	else
		$category = '';
	
	if (is_home() && !$category_slug) {
		global $posts;
		$title = 'More ' . $title;
		$offset = count($posts);
	}
	else
		$offset = 0;

	$custom_query = new WP_Query("$category&showposts=$number&offset=$offset");
	
	thesis_output_post_list($category_slug, $title, $custom_query);
	
	unset($custom_query);
	wp_reset_query();
}

function thesis_output_post_list($category_slug, $title, $query) {
	if ($query->have_posts()) {
?>
						<li class="widget<?php if ($category_slug) echo ' widget_' . $category_slug; ?>">
							<h3><?php echo $title; ?></h3>
							<ul>
<?php
		while ($query->have_posts()) :
			$query->the_post();
?>
								<li><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></li>
<?php
		endwhile;
?>
							</ul>
						</li>
<?php
	}
}

function thesis_tag_cloud() {
	if (thesis_get_option('use_tags') && function_exists('wp_tag_cloud')) {
?>
	<li class="widget tag_cloud">
		<h3>Popular Tags</h3>
<?php
			wp_tag_cloud('smallest=8&largest=14&number=30');
?>

	</li>
<?php
	}
}

/**
 * thesis_bookmarks() - Returns an array of parameters for use with the wp_list_bookmarks() function.
 *
 * @since 1.0
 * @return array $params
 */
function thesis_bookmarks() {
	$params = array(
		'class' => 'widget',
		'title_li' => '',
		'title_before' => '<h3>',
		'title_after' => '</h3>'
	);
	
	return $params;
}