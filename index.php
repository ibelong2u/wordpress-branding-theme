<?php get_header(); ?>

	<div id="content_box">

<?php	/*	<div id="content"<?php thesis_content_classes(); ?>>  */ ?>
                
	<div id="content" style="width:880px;">

<?php 
		if (have_posts()) {
			$post_count = 1;
			while (have_posts()) {
				the_post();
?>
			<div style="padding:3em 0em 3em 0em;" class="post_box hentry<?php if ($post_count == 1) echo(' top'); ?>">
            
			<?php if ( has_post_thumbnail() ) the_post_thumbnail(); ?>
            
				<h2 style="font-size:3em; padding-top:0em;" class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>



				<?php /* thesis_byline_and_date(); */ echo "<br/>"; ?>
				<div class="format_text entry-content">
				<?php the_content('read more >'); ?>

				<?php thesis_comments_link(); ?>
                
				</div>
				
			</div>

<?php
				$post_count++;
			}
			thesis_post_navigation();
		}
		else { 
?>
			<div class="post_box top">
				<h2 class="add_bottom_margin"><?php _e('There&#8217;s nothing here.', 'thesis'); ?></h2>
				<div class="format_text">
					<p><?php _e('If there were posts in the database, you&#8217;d be seeing them. Try <a href="' . get_bloginfo('url') . '/wp-admin/post-new.php">creating a post</a>, and see if that solves your problem.', 'thesis'); ?></p>
				</div>
			</div>
			
<?php 
		}
?>
		</div>
			
<?php /* thesis_get_sidebars(); */ ?>


	</div>

<?php get_footer(); ?>