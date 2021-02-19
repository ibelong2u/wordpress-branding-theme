<?php get_header(); ?>

	<div id="content_box">
    

	
		<div id="content"<?php thesis_content_classes(); ?>>

<?php 
		if (have_posts()) {
			while (have_posts()) {
				the_post();
?>
			<div class="post_box top">
				<h1><?php the_title(); ?></h1>
				<?php thesis_byline_and_date(); ?>
				<div class="format_text">		
<?php the_content(); ?>
<?php link_pages('<p><strong>Pages:</strong> ', '</p>', 'number'); ?>
				</div>





<?php /* if (is_page('4')) { ?>

<h2 style="font-variant:small-caps;">Latest from our Farm...</h2>
<ul style="padding-left:50px;">

<?php $postslist = get_posts('numberposts=3&category=5');
      foreach ($postslist as $post):  ?>

	<li style="font-size:1.5em;" class="entry-title">
    	<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a>
	</li>
           
<?php endforeach; ?>

</ul>
<?php } */?>


			</div>

<?php 
			}
		}
?>



		</div>

<?php thesis_get_sidebars(); ?>


	</div>

<?php get_footer(); ?>