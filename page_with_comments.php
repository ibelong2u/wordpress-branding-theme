<?php
/*
Template Name: Wellness
*/

get_header();
?>

<div id="wellnessbox" style="float:right; width:40em;">

<!--div class="addthis_toolbox addthis_default_style" style="float:right; margin:2em 4em 2em 2em;"><a style="text-decoration:none; color:#000; font-family:Georgia; font-size:14px; font-weight:bold; line-height:1em;" class="a2a_dd" href="http://www.addtoany.com/share_save?linkname=Sawmill%20Hollow&amp;linkurl=http%3A%2F%2Fsawmillhollow.com"><img style="vertical-align:text-top;" src="http://sawmillhollow.com/wp-content/uploads/2010/02/shareplus.jpg" alt="+"/>&nbsp;Share</a></div><script type="text/javascript">a2a_linkname="Sawmill Hollow Holistic Family Farm";a2a_linkurl="http://sawmillhollow.com";a2a_show_title=1;</script><script type="text/javascript" src="http://static.addtoany.com/menu/page.js"></script> 

<div style="clear:both;"-->

<!-- http://sawmillhollow.com/wp-content/uploads/2010/06/research.gif -->


<a title="Click Here to Browse them all" href="/category/research/"><img src="http://sawmillhollow.com/wp-content/themes/SMH_1/images/research.gif" alt="research articles" style="display:block; margin:auto;" /></a>
	
    <table style="clear:both; width:342px; display:block; margin:auto; font-size:2em;">
    	<tr>
        	<td><a href="/research/">+ Aronia</a></td>
            <td><a id="nutsseeds" href="#">+ Nuts &amp; Seeds</a></td>
		</tr>
        <tr>
        	<td><a id="berries" href="#">+ Berries</a></td>
            <td><a id="herbs" href="#">+ Herbs &amp; Roots</a></td>
		</tr>
        <tr>
        	<td><a id="other" href="#">+ Other</a></td>
            <td><a id="fruitsvegetables" href="#">+ Fruits &amp; Vegetables</a></td>
		</tr>        

        <tr style="height:10px;"> <td colspan="2"></td></tr>

		<tr onmouseover="javascript:ReverseColor();" onmouseout="javascript:RestoreColor();">
        	<td id="hhb" style="color:#3d3d5d; font-size:1.5em; text-align:center;">
            	<a href="/category/wellness/">Holistic<br/><strong>Health</strong><br/><span style="letter-spacing:2px;">BLOG!</span></a>
            </td>
            <td id="hhbarticles" style="background-color:#3d3d5d; padding:5px; width:210px;">
					<?php $recent = new WP_Query("cat=7&showposts=4"); 
					while($recent->have_posts()) : $recent->the_post();?>
						<a style="color:#FFF;" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?> ></a><br/>
					<?php endwhile; ?>
            </td>

        <tr style="height:10px;"> <td colspan="2"></td></tr>
        
	    <tr> 
        	<td colspan="2" style="background-color:#A19F9F; color:#FFF; text-align:center; font-size:1.2em;">GLOSSARY OF WELLNESS</td>
		</tr> 
        
        <tr>
        	<td colspan="2" style="font-size:0.9em; text-align:center;">
            
            <span id="antioxidants" style="color:#5e5d5d; cursor:pointer;"><span style="text-decoration:underline;">antioxidants</span></span>&nbsp;&nbsp;&nbsp;&nbsp;
            <span id="amino" style="color:#5e5d5d; cursor:pointer;"><span style="text-decoration:underline;">amino acids</span></span>&nbsp;&nbsp;&nbsp;&nbsp;
            <span id="fiber" style="color:#5e5d5d; cursor:pointer;"><span style="text-decoration:underline;">fiber</span></span>&nbsp;&nbsp;&nbsp;&nbsp;
            <span id="oils" style="color:#5e5d5d; cursor:pointer;"><span style="text-decoration:underline;">essential oils</span></span>&nbsp;&nbsp;&nbsp;&nbsp;
			<span id="flavonoids" style="color:#5e5d5d; cursor:pointer;"><span style="text-decoration:underline;">flavonoids</span></span>&nbsp;&nbsp;&nbsp;&nbsp;
            <span id="minerals" style="color:#5e5d5d; cursor:pointer;"><span style="text-decoration:underline;">minerals</span></span>&nbsp;&nbsp;&nbsp;&nbsp;
            <span id="phenolic" style="color:#5e5d5d; cursor:pointer;"><span style="text-decoration:underline;">phenolic</span></span>&nbsp;&nbsp;&nbsp;&nbsp;
            <span id="polyphenols" style="color:#5e5d5d; cursor:pointer;"><span style="text-decoration:underline;">polyphenols</span></span>&nbsp;&nbsp;&nbsp;&nbsp 
            <span id="vitamins" style="color:#5e5d5d; cursor:pointer;"><span style="text-decoration:underline;">vitamins</span></span>
            
            </td>
        </tr>           
            
        
    </table>


</div>

</div>

<img src="http://sawmillhollow.com/wp-content/uploads/2010/06/wellness.png" alt="Wellness" style="float:left;"/>

	<div id="content_box">
    
    
	
		<div id="content"<?php thesis_content_classes(); ?> style="width:880px;">
        
		


<?php 
		if (have_posts()) {
			while (have_posts()) {
				the_post();
?>
			<div class="post_box top">
            
            	
            

            
				<!--h1><?php // the_title(); ?></h1-->
				<?php thesis_byline_and_date(); ?>
				<div class="format_text">		
<?php the_content(); ?>
<?php link_pages('<p><strong>Pages:</strong> ', '</p>', 'number'); ?>
				</div>
			</div>
				
<?php 
				comments_template();
			}
		}
?>
		</div>




	</div>

<?php get_footer(); ?>