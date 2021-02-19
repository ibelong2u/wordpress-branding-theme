<?php

function thesis_search_widget($args) {
	extract($args, EXTR_SKIP);
	$options = get_option('thesis_search_widget');

	echo $before_widget . "\n";
	echo $before_title . $options['thesis-search-title'] . $after_title . "\n";
	include_once(TEMPLATEPATH . '/searchform.php');
	echo $after_widget . "\n";
}

function thesis_search_control() {
	$options = $newoptions = get_option('thesis_search_widget');

	if ($_POST['thesis-search-options-submit'])
		$newoptions['thesis-search-title'] = strip_tags(stripslashes($_POST['thesis-search-title']));

	if ($options != $newoptions) {
		$options = $newoptions;
		update_option('thesis_search_widget', $options);
	}
	
	$title = attribute_escape($options['thesis-search-title']);
?>
		<p><label for="thesis-pages-title"><?php _e('Title:', 'thesis'); ?> <input type="text" class="widefat" id="thesis-search-title" name="thesis-search-title" value="<?php echo $title; ?>" /></label></p>
		<input type="hidden" id="thesis-search-options-submit" name="thesis-search-options-submit" value="1" />
<?php
}

function thesis_google_cse_widget($args) {
	extract($args, EXTR_SKIP);
	$options = get_option('thesis_google_cse_widget');
	
	echo $before_widget . "\n";
	echo $before_title . $options['thesis-google-cse-title'] . $after_title . "\n";
	echo stripslashes($options['thesis-google-cse-code']) . "\n";
	echo $after_widget . "\n";
}

function thesis_google_cse_control() {
	$options = $newoptions = get_option('thesis_google_cse_widget');
	
	if ($_POST['thesis-google-cse-submit']) {
		$newoptions['thesis-google-cse-title'] = strip_tags(stripslashes($_POST['thesis-google-cse-title']));
		$newoptions['thesis-google-cse-code'] = $_POST['thesis-google-cse-code'];
	}

	if ($options != $newoptions) {
		$options = $newoptions;
		update_option('thesis_google_cse_widget', $options);
	}
	
	$title = attribute_escape($options['thesis-google-cse-title']);
	$code = stripslashes($options['thesis-google-cse-code']);
?>
		<p>
			<label for="thesis-google-cse-title"><?php _e('Title:', 'thesis'); ?>
			<input type="text" class="widefat" id="thesis-google-cse-title" name="thesis-google-cse-title" value="<?php echo $title; ?>" /></label>
		</p>
		<p>
			<label for="thesis-google-cse-code"><?php _e('Google Custom Search code:', 'thesis'); ?></label>
			<textarea class="widefat" rows="8" cols="10" id="thesis-google-cse-code" name="thesis-google-cse-code"><?php echo $code; ?></textarea>
		</p>
		<input type="hidden" id="thesis-google-cse-submit" name="thesis-google-cse-submit" value="1" />
<?php
}