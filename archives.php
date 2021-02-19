<?php
/*
Template Name: Archives
*/

get_header();
?>
		
	<div id="content_box">
			
		<div id="content"<?php thesis_content_classes(); ?>>
				
			<div class="post_box top">
				<h1><?php _e('Browse the Archives', 'thesis'); ?></h1>
				<div class="format_text">
					<h3 class="top"><?php _e('By Month:', 'thesis'); ?></h3>
					<ul>
						<?php wp_get_archives('type=monthly'); ?>
					</ul>
					<h3><?php _e('By Category:', 'thesis'); ?></h3>
					<ul>
						<?php wp_list_categories('title_li=0'); ?>
					</ul>
				</div>
			</div>
		
		</div>
		
<?php thesis_get_sidebars(); ?>

	
	</div>
		
<?php get_footer(); ?>