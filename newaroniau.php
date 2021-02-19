<?php
/*
Template Name: NewAroniaU
*/

?>

<?php include('newheader.php'); ?>

<nav style="background-color:#638;">
		  <!--div class="grid_4" style="width:240px;"><a href="http://sawmillhollow.com/AroniaU/research/">Overview</a></div>
          <div class="grid_4" style="width:240px;"><a href="http://sawmillhollow.com/AroniaU/research/">Aronia 101</a></div>
          <div class="grid_2" style="width:190px;"><a href="http://sawmillhollow.com/AroniaU/horticulture/">Aronia 201</a></div>
          <div class="grid_2" style="width:170px;"><a href="http://sawmillhollow.com/AroniaU/nutrition/">Aronia 301</a></div>
		  <div class="grid_2" style="width:130px;"><a href="http://sawmillhollow.com/AroniaU/health/">Aronia 401</a></div>
          <div class="grid_2" style="width:150px;"><a href="http://sawmillhollow.com/AroniaU/resources/">Resources</a></div-->                
          <div class="grid_3" style="width:225px;"><a href="http://sawmillhollow.com/AroniaU/Aronia101/">Aronia 101</a></div>
          <div class="grid_3" style="width:225px;"><a href="http://sawmillhollow.com/AroniaU/Aronia201/">Aronia 201</a></div>
          <div class="grid_3" style="width:225px;"><a href="http://sawmillhollow.com/AroniaU/Aronia301/">Aronia 301</a></div>
		  <div class="grid_3" style="width:225px;"><a href="http://sawmillhollow.com/AroniaU/Aronia401/">Aronia 401</a></div>
</nav>
        
<div class="clear"></div>
<div id="banner" style="background-image: url('http://i.imgur.com/0SAm8.jpg');">
</div>

	<div class="grid_12" id="content">
		<h2 style="color:#638;"> <?php if (have_posts()) { while (have_posts()) { the_post(); the_title(); ?> </h2>
		<p> <?php the_content(); } } ?> 
	</div>
					
<div class="clear"></div>
            
<hr style="height: 3px; background: #630;" />
				
<?php include('newfooter.php'); ?>