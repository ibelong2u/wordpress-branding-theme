<?php

function thesis_show_post_tags() {
	if (thesis_get_option('use_tags')) {
		$post_tags = get_the_tags();
		if ($post_tags) {
			$num_tags = count($post_tags);
			$tag_count = 1;
?>
				<p class="post_tags"><?php echo __('Tagged as:', 'thesis') . "\n";

			foreach ($post_tags as $tag) {
				if (thesis_get_option('link_tags')) {
					$html_before = '					<a href="' . get_tag_link($tag->term_id) . '" rel="tag nofollow">';
					$html_after = '</a>';
				}
				else {
					$html_before = '					<span rel="tag">';
					$html_after = '</span>';
				}
				
				if ($tag_count < $num_tags)
					$sep = ', ' . "\n";
				elseif ($tag_count == $num_tags)
					$sep = "\n";
				
				echo $html_before . $tag->name . $html_after . $sep;
				$tag_count++;
			}
?>
				</p>
<?php
		}
	}
}