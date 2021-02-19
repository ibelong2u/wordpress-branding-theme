<?php

function thesis_content_classes() {	
	if (have_posts()) {
		if (!thesis_show_byline())
			$no_byline = ' no_byline';
			
		echo ' class="hfeed' . thesis_page_class() . $no_byline . '"';
	}
	else
		echo ' class="no_byline"';
}

function thesis_show_byline() {	
	if (is_page()) {
		if (thesis_get_option('show_author_on_pages') || thesis_get_option('show_date_on_pages'))
			return true;
	}
	else {
		if (thesis_get_option('show_author') || thesis_get_option('show_date'))
			return true;
	}
}

function thesis_page_class() {
	global $post;
	
	if (is_page() && $post->post_name)
		return ' ' . $post->post_name;
}

function thesis_byline_and_date()
{
	if (thesis_show_byline())
	{
		if (is_page())
		{
			$author = thesis_get_option('show_author_on_pages');
			$date = thesis_get_option('show_date_on_pages');
		}
		else
		{
			$author = thesis_get_option('show_author');
			$date = thesis_get_option('show_date');
		}
	}
	
	if ($author || $date)
	{  
		?> <p class="author_and_date"> <?php 
//		if ($author) echo '<em>' . __('by', 'thesis') . '</em> <span class="author">' . get_the_author() . '</span>'; 
//		if ($author && $date) echo ' <em>' . __('on', 'thesis') . '</em> '; 
//		if ($date) 
			echo '<abbr class="published" title="' . get_the_time('Y-m-d') . '">' . get_the_time('F j, Y') . '</abbr>'; 
		?></p> <?php
	}
	else
		echo "\n";
}

function thesis_post_navigation() {
	global $wp_query;
	
	$total_pages = $wp_query->max_num_pages;
	$current_page = get_query_var('paged');
	
	if ($total_pages > 1) {
		echo '			<div class="prev_next">' . "\n";
		
		if ($current_page <= 1) {
			echo '				<p class="previous">';	
			if (is_search())
				next_posts_link('&larr; ' . __('Older Results', 'thesis'));
			else
				next_posts_link('&larr; ' . __('Older Entries', 'thesis'));
			echo "</p>\n";
		}
		elseif ($current_page < $total_pages) {
			echo '				<p class="previous floated">';	
			if (is_search())
				next_posts_link('&larr; ' . __('Older Results', 'thesis'));
			else
				next_posts_link('&larr; ' . __('Older Entries', 'thesis'));
			echo "</p>\n";
			
			echo '				<p class="next">';
			if (is_search())
				previous_posts_link(__('Newer Results', 'thesis') . ' &rarr;');
			else
				previous_posts_link(__('Newer Entries', 'thesis') . ' &rarr;');
			echo "</p>\n";
		}
		elseif ($current_page >= $total_pages) {
			echo '				<p class="next">';
			if (is_search())
				previous_posts_link(__('Newer Results', 'thesis') . ' &rarr;');
			else
				previous_posts_link(__('Newer Entries', 'thesis') . ' &rarr;');
			echo "</p>\n";
		}
		
		echo "			</div>\n\n";
	}
}