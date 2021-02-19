<?php get_header(); ?>

	<div id="content_box">
	
	<?php /*	<div id="content"<?php thesis_content_classes(); ?>>   */ ?>
    
    <div id="content" style="width:880px;">

<?php 
		if (have_posts()) {
			while (have_posts()) {
				the_post();
?>
			<div class="post_box hentry top">
				<h1 class="entry-title"><?php the_title(); ?></h1>
				<?php /* thesis_byline_and_date(); */ echo "<br/><br/>"; ?>
				<div class="format_text entry-content">
<?php the_content(); ?>
<?php link_pages('<p><strong>Pages:</strong> ', '</p>', 'number'); ?>
				</div>
<?php thesis_show_post_tags(); ?>
			</div>

<?php 
				comments_template();
			}
		}
		else {
?>
			<div class="post_box top">
				<h1><?php _e('Uh oh.', 'thesis'); ?></h1>
				<div class="format_text">
					<p><?php _e('Sorry, but you&#8217;ve requested a page that isn&#8217;t here. Would you like to search instead?', 'thesis'); ?></p>
					<?php include (TEMPLATEPATH . '/searchform.php'); ?>
				</div>
			</div>

<?php
		}
?>
		</div>

<?php /* thesis_get_sidebars(); */ ?>


	</div>

<?php get_footer(); ?>