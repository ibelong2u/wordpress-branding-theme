<?php

function thesis_comments_link() {
	global $post;
	
	if (comments_open() || $post->comment_count > 0) {
?>


<?php /* removed <p class = ".to_comments"> and </p> from before and after <span> below */ ?>

<span class="bracket">{</span> <a href="<?php the_permalink() ?>#comments" rel="nofollow"><?php comments_number(__('<span>0</span> comments', 'thesis'), __('<span>1</span> comment', 'thesis'), __('<span>%</span> comments', 'thesis')); ?></a> <span class="bracket">}</span>
<?php
	}
}

function thesis_comments_intro($number, $comments_open, $type = 'comments') {
	if ($type == __('comments', 'thesis'))
		$type_singular = __('comment', 'thesis');
	elseif ($type == __('trackbacks', 'thesis'))
		$type_singular = __('trackback', 'thesis');
	
	if ($number == 0)
		$comments_text = '<span>0</span> ' . $type;
	elseif ($number == 1)
		$comments_text = '<span>1</span> ' . $type_singular;
	elseif ($number > 1)
		$comments_text = str_replace('%', $number, '<span>%</span> ') . $type;
		
	if ($comments_open && $type == 'comments') {
		if ($number == 0)
			$add_link = '&#8230; <a href="#respond" rel="nofollow">' . __('add one now', 'thesis') . '</a>';
		elseif ($number == 1)
			$add_link = '&#8230; ' . __('read it below or ', 'thesis') . '<a href="#respond" rel="nofollow">' . __('add one', 'thesis') . '</a>';
		elseif ($number > 1)
			$add_link = '&#8230; ' . __('read them below or ', 'thesis') . '<a href="#respond" rel="nofollow">' . __('add one', 'thesis') . '</a>';
	}
	else
		$add_link = '';	
		
	$output = '				<p class="comments_intro"><span class="bracket">{</span> ' . $comments_text . $add_link . ' <span class="bracket">}</span></p>' . "\n\n";
		
	echo $output;
}