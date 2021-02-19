<?php




function thesis_multimedia_box()
{
	if (is_single() || is_page()) {
		global $post;
		
		if (get_post_meta($post->ID, thesis_get_custom_field_key('image'), true)) {
			echo '			<div id="multimedia_box">' . "\n";
			thesis_image_box(get_post_meta($post->ID, thesis_get_custom_field_key('image'), true));
			echo '			</div>' . "\n";
		}
		elseif (get_post_meta($post->ID, thesis_get_custom_field_key('video'), true)) {
			echo '			<div id="multimedia_box">' . "\n";
			thesis_video_box(get_post_meta($post->ID, thesis_get_custom_field_key('video'), true));
			echo '			</div>' . "\n";
		}
		elseif (get_post_meta($post->ID, thesis_get_custom_field_key('html'), true)) {
			echo '			<div id="multimedia_box">' . "\n";
			thesis_custom_box(get_post_meta($post->ID, thesis_get_custom_field_key('html'), true));
			echo '			</div>' . "\n";
		}
		else
			thesis_default_box();
	}
	else
		thesis_default_box();
}


function thesis_default_box() {
	if (thesis_get_option('multimedia_box')) {
		echo '			<div id="multimedia_box">' . "\n";

		if (thesis_get_option('multimedia_box') == 'image')
			thesis_image_box();
		elseif (thesis_get_option('multimedia_box') == 'video')
			thesis_video_box();
		elseif (thesis_get_option('multimedia_box') == 'custom')
			thesis_custom_box();
		
		echo '			</div>' . "\n";
	}
}

function thesis_image_box($image_path = false) {
?>
				<div id="image_box">
<?php
	if ($image_path) {
		if (getimagesize($image_path)) {
			$image_info = getimagesize($image_path);
			$image['path'] = $image_path;
			$image['width'] = $image_info[0];
			$image['height'] = $image_info[1];
			
			if (thesis_get_image_size_class($image['width'], $image['height']))
				$image['class'] = 'class="' . thesis_get_image_size_class($image['width'], $image['height']) . '" ';
			
			echo '<img ' . $image['class'] . 'src="' . $image['path'] . '" alt="Custom image" />' . "\n";
		}
	}
	else
		thesis_image_rotator();
?>
				</div>
<?php
}

function thesis_image_rotator() {
	$rotator_dir = opendir(THESIS_ROTATOR);
	while (($file = readdir($rotator_dir)) !== false) {
		if (strpos($file, '.jpg') || strpos($file, '.jpeg') || strpos($file, '.png') || strpos($file, '.gif'))  {
			$images[$file]['url'] = THESIS_ROTATOR_FOLDER . '/' . $file;
			$image_path = THESIS_ROTATOR . '/' . $file;
			$image_size = getimagesize($image_path);
			$images[$file]['width'] = $image_size[0];
			$images[$file]['height'] = $image_size[1];
			
			if (thesis_get_image_size_class($image_size[0], $image_size[1]))
				$images[$file]['class'] = 'class="' . thesis_get_image_size_class($image_size[0], $image_size[1]) . '" ';
		}
	}
	
	if ($images)
		$random_image = array_rand($images);
		
	$image_alt_tags = thesis_get_option('image_alt_tags');
	
	if ($image_alt_tags[$random_image])
		$images[$random_image]['alt'] = $image_alt_tags[$random_image];
	else
		$images[$random_image]['alt'] = $random_image;

	echo '<img ' . $images[$random_image]['class'] . 'src="' . $images[$random_image]['url'] . '" alt="' . $images[$random_image]['alt'] . '" />' . "\n";
}

function thesis_video_box($video_code = false) {
	if ($video_code || thesis_get_option('video_code')) {
?>
				<div id="video_box">
<?php
		if ($video_code)
			echo '<p>' . stripslashes($video_code) . '</p>' . "\n";
		elseif (thesis_get_option('video_code'))
			echo '<p>' . stripslashes(thesis_get_option('video_code')) . '</p>' . "\n";
			
?>
				</div>
<?php
	}
}

function thesis_custom_box($custom_code = false) {
	if ($custom_code || thesis_get_option('custom_code')) {
?>
				<div id="custom_box">
<?php
		if ($custom_code)
			echo stripslashes($custom_code) . "\n";
		else
			echo stripslashes(thesis_get_option('custom_code')) . "\n";
?>
				</div>

<?php
	}
}

function thesis_get_custom_field_key($type) {
	$custom_field_keys = thesis_get_option('custom_field_keys');
	
	foreach ($custom_field_keys as $key_type => $key_value) {
		if (($key_type == $type) && $key_value)
			return $key_value;
		elseif ($key_type == $type)
			return $key_type;
	}
}

function thesis_get_image_size_class($width, $height) {
	if ($width && $height) {
		$ratio = $width / $height;
		if (1.3125 < $ratio && $ratio < 1.3548)
			return 'four_by_three';
		elseif (1.4737 < $ratio && $ratio < 1.5273)
			return 'three_by_two';
		elseif (1.7406 < $ratio && $ratio < 1.8166)
			return 'sixteen_by_nine';
		elseif (0.7925 < $ratio && $ratio < 0.8077)
			return 'four_by_five';
		elseif (0.6587 < $ratio && $ratio < 0.6746)
			return 'two_by_three';
	}
}

