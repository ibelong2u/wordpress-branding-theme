<?php
/*
Template Name: NewBrown
*/

?>

<?php include('newheader.php'); ?>

<div class="clear" style="height:10px;"></div>

<div id="banner" style="background-image: url('http://i.imgur.com/FvBw7.jpg'); border-radius:15px 15px 0 0;">

<!--div id="whitebox">&nbsp;</div-->

   <!--div id="heading">
	   <h1 style="color:#363;">Welcome to our Family Farm</h1>
	   <h3 style="text-shadow:0 0 25px #363;">watch out for the cute cat</h3>
   </div-->
</div>

	<div class="grid_12" id="content">
		<h2 style="color:#363;"> <?php if (have_posts()) { while (have_posts()) { the_post(); the_title(); ?> </h2>
		<p> <?php the_content(); } } ?> 
	</div>

	<div class="clear"></div>
            
<hr style="height: 3px; background: #630;" />

			
<?php include('newfooter.php'); ?>