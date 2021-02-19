<?php get_header(); ?>
		
	<div id="content_box">

<?php	/*	<div id="content" style="width:880px;">    */ ?>

	<div id="content"<?php thesis_content_classes(); ?>>

<?php 
		if (have_posts()) {
?>
			<div id="archive_info">
<?php
			if (is_category()) {
?>
				<!--p><?php _e('From the category archives:', 'thesis'); ?></p-->
				<h1 style="font-size:4em; padding-top:1em;"><?php single_cat_title(); ?></h1>
                <h3><?php echo category_description(); ?></h3>
<?php 
			} 
			elseif (is_month()) { 
?>
				<p><?php _e('From the monthly archives:', 'thesis'); ?></p>
				<h1><?php the_time('F Y'); ?></h1>
<?php 
			}
			elseif (is_author()) {
				if (isset($_GET['author_name']))
					$current_author = get_userdatabylogin($author_name);
				else
					$current_author = get_userdata(intval($author));
?>
				<p><?php _e('Posts by author:', 'thesis'); ?></p>
				<h1><?php echo $current_author->nickname; ?></h1>
<?php
			}
			elseif (is_tag()) {
?>
				<p><?php _e('Posts tagged as:', 'thesis'); ?></p>
				<h1><?php single_tag_title(); ?></h1>
<?php
			}
?>
			</div>

<?php
			$post_count = 1;
			while (have_posts()) {
				the_post();
?>
			<div class="post_box hentry<?php if ($post_count == 1) echo(' top'); ?>">
            
            			<?php if ( has_post_thumbnail() ) the_post_thumbnail(); ?>
            
				<h2 style="font-size:2em;" class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
                
           <?php /*
           
                <h3 style="font-size:1.5em; font-style:italic;"> 
				
					<?php thesis_byline_and_date(); ?>
                    
				</h3><br/>
				
				*/ ?>
                
				<div class="format_text entry-content">
<?php the_content('read more >'); ?>
				</div>
			</div>

<?php
				$post_count++;
			}
			thesis_post_navigation();
		}
?>
		</div>
	
<?php thesis_get_sidebars(); ?>

	
	</div>
		
<?php get_footer(); ?>