<?php get_header(); ?>
		
	<div id="content_box">

		<div id="content"<?php thesis_content_classes(); ?>>

			<div id="archive_info">
				<p><?php _e('You searched for:', 'thesis'); ?> "<?php echo $s; ?>"</p>
				
			</div>

<?php query_posts($query_string . '&posts_per_page=10'); ?>

<?php 
		if (have_posts()) {
			$post_count = 1;
			while (have_posts()) {
				the_post();
?>
			<div class="post_box hentry<?php if ($post_count == 1) echo(' top'); ?>">
				<h2 class="entry-title">&raquo;&nbsp;<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
				<?php /* thesis_byline_and_date(); */ ?>
				<!--div class="format_text">
<?php the_content('[click to continue...]'); ?>
				</div-->
<?php
				if (comments_open()) {
?>
				<!--p class="to_comments"><span class="bracket">{</span> <a href="<?php the_permalink() ?>#comments" rel="nofollow"><?php comments_number('<span>0</span> comments', '<span>1</span> comment', '<span>%</span> comments'); ?></a> <span class="bracket">}</span></p-->
<?php
				}
?>
			</div>

<?php 
				$post_count++;
			}
			thesis_post_navigation();
		}
		else {
?>
			<div class="post_box top">
				<h2><?php _e('Sorry, but no results were found.', 'thesis'); ?></h2>
				<div class="format_text">
					<p><br/><?php _e('Search Again:', 'thesis'); ?></p>
<?php include (TEMPLATEPATH . '/searchform.php'); ?>
				</div>
			</div>

<?php 
		}
?>
		</div>

        <div id="sidebars" style="width:29em;">
        
        	<img src="http://sawmillhollow.com/wp-content/themes/SMH_1/images/searchbirds.jpg" style="width:100%;" alt="searching" />
        
        </div>


	</div>

<?php get_footer(); ?>