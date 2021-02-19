<?php
/*
Template Name: NewHealth
*/

?>

<?php include('newheader.php'); ?>

<nav style="background-color:#363;">
          <div class="grid_3" style="width:180px;"><a href="http://sawmillhollow.com/health/facts/">Aronia Facts</a></div>
          <div class="grid_4"><a href="http://sawmillhollow.com/health/superfruit/">America's Superfruit&trade;</a></div>
          <div class="grid_3" style="width:240px;"><a href="http://sawmillhollow.com/health/antioxidants/">Real Antioxidants</a></div>
          <div class="grid_2" style="width:180px;"><a href="http://sawmillhollow.com/health/process/">Our Process</a></div>                
</nav>
        
<div class="clear"></div>
<div id="banner" style="background-image: url('http://i.imgur.com/FvBw7.jpg');">

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