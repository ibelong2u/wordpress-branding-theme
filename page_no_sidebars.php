<?php
/*
Template Name: Shopping
*/

get_header();
?>

	<div id="content_box">
	
	<?php /*	<div id="content"<?php thesis_content_classes(); ?>>   */ ?>
    
    <div id="content" style="width:880px; padding:0px 10px;">

<?php 
		if (have_posts()) {
			while (have_posts()) {
				the_post();
?>
			<div class="post_box top">
            
<?php 	if (is_page('7')) 
		{
//			echo '<div class="addthis_toolbox addthis_default_style" style="float:right; margin:4em;"><a style="text-decoration:none; color:#000; font-family:Georgia; font-size:14px; font-weight:bold; line-height:1em;" class="a2a_dd" href="http://www.addtoany.com/share_save?linkname=Sawmill%20Hollow&amp;linkurl=http%3A%2F%2Fsawmillhollow.com"><img style="vertical-align:text-top;" src="http://sawmillhollow.com/wp-content/uploads/2010/02/shareplus.jpg" alt="+"/>&nbsp;Share</a></div><script type="text/javascript">var a2a_config = a2a_config || {}; a2a_config.linkname = "Sawmill Holllow Organic Farms"; a2a_config.linkurl = "http://sawmillhollow.com"; a2a_config.onclick = 1; a2a_config.show_title = 1; a2a_config.num_services = 10; </script><script type="text/javascript" src="http://static.addtoany.com/menu/page.js"></script> ';
			echo '<div id="googlecart-widget"></div>';
			
			
		}
?>
            
				<h1><?php the_title(); ?></h1>
				<?php thesis_byline_and_date(); ?>
				<div class="format_text">		
<?php the_content(); ?>
<?php link_pages('<p><strong>Pages:</strong> ', '</p>', 'number'); ?>
				</div>
			</div>
				
<?php
			}
		}
?>
		</div>

	</div>

<?php get_footer(); ?>