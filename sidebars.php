		<div id="sidebars" style="width:<?php if (is_front_page()) echo '59'; else echo '29';?>em;">
        
<?php
	$page_data = get_page($page_id);
	$title = $page_data->post_title;
	switch($title)
	{
		case "Home":	echo '<div id="slideshow" class="slideshow" style="border:1px solid #CCC; width:588px; height:392px;">';
//						echo '<a href="http://sawmillhollow.com/2011/07/2011-annual-aronia-berry-festival/"><img src="http://sawmillhollow.com/wp-content/themes/SMH_1/images/feature0.jpg" width="588" height="392" /></a>';
						echo '<img src="http://sawmillhollow.com/wp-content/themes/SMH_1/images/feature1.jpg" width="588" height="392" />';
						echo '<img src="http://sawmillhollow.com/wp-content/themes/SMH_1/images/feature2.jpg" width="588" height="392" />';
						echo '<img src="http://sawmillhollow.com/wp-content/themes/SMH_1/images/feature3.jpg" width="588" height="392" />';
						echo '<img src="http://sawmillhollow.com/wp-content/themes/SMH_1/images/feature4.jpg" width="588" height="392" />';						
						echo '<img src="http://sawmillhollow.com/wp-content/themes/SMH_1/images/feature5.jpg" width="588" height="392" />';												
						echo '</div>';     /* reference -  http://malsup.com/jquery/cycle/lite/  */
						echo '<div style="width:588px; font-size:1.5em; font-weight:bold; text-align:right;">';
						echo ' <a style="text-decoration:none;" id="prev" href="#">&lt;</a>&nbsp;&nbsp;&nbsp;<a style="text-decoration:none;" id="next" href="#">&gt;</a>&nbsp;&nbsp;';
						echo '</div>';						
						
						the_meta();
						break;			
		default:			
		
				echo '<div class="addthis_toolbox addthis_default_style" style="float:right; margin:4em;"><a style="text-decoration:none; color:#000; font-family:Georgia; font-size:14px; font-weight:bold; line-height:1em;" class="a2a_dd" href="http://www.addtoany.com/share_save?linkname=Sawmill%20Hollow&amp;linkurl=http%3A%2F%2Fsawmillhollow.com"><img style="vertical-align:text-top;" src="http://sawmillhollow.com/wp-content/uploads/2010/02/shareplus.jpg" alt="+"/>&nbsp;Share</a></div><script type="text/javascript">var a2a_config = a2a_config || {}; a2a_config.linkname = "Sawmill Holllow Organic Farms"; a2a_config.linkurl = "http://sawmillhollow.com"; a2a_config.onclick = 1; a2a_config.show_title = 1; a2a_config.num_services = 10; </script><script type="text/javascript" src="http://static.addtoany.com/menu/page.js"></script> ';

				if (is_category('buzz'))
				{
					echo '<object id="flashObj" width="255" height="250" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,47,0"><param name="movie" value="http://c.brightcove.com/services/viewer/federated_f9/48788398001?isVid=1&publisherID=35546125001" /><param name="bgcolor" value="#FFFFFF" /><param name="flashVars" value="omnitureAccountID=gpaper122,gntbcstglobal&pageContentCategory=LIFE&pageContentSubcategory=LIFE02&marketName=Des Moines:desmoinesregister&revSciSeg=&revSciZip=&revSciAge=&revSciGender=&division=newspaper&SSTSCode=news/health/article.htm&videoId=50372506001&playerID=48788398001&domain=embed&" /><param name="base" value="http://admin.brightcove.com" /><param name="seamlesstabbing" value="false" /><param name="allowFullScreen" value="true" /><param name="swLiveConnect" value="true" /><param name="allowScriptAccess" value="always" /><embed src="http://c.brightcove.com/services/viewer/federated_f9/48788398001?isVid=1&publisherID=35546125001" bgcolor="#FFFFFF" flashVars="omnitureAccountID=gpaper122,gntbcstglobal&pageContentCategory=LIFE&pageContentSubcategory=LIFE02&marketName=Des Moines:desmoinesregister&revSciSeg=&revSciZip=&revSciAge=&revSciGender=&division=newspaper&SSTSCode=news/health/article.htm&videoId=50372506001&playerID=48788398001&domain=embed&" base="http://admin.brightcove.com" name="flashObj" width="255" height="250" seamlesstabbing="false" type="application/x-shockwave-flash" allowFullScreen="true" swLiveConnect="true" allowScriptAccess="always" pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash"></embed></object>';
					
					echo '<img style="margin:40px 0px;" src="http://sawmillhollow.com/wp-content/themes/SMH_1/images/buzz.jpg" alt="butterfly"/>';
					
					echo '<form class="validate" style="margin-top: 25px; margin-bottom: 10px;" action="http://sawmillhollow.us1.list-manage.com/subscribe/post?u=bfe48a34765a5cde911455ee2&amp;id=5b07c0f90d" method="post"><h3>Sign up for our newsletter:</h3><input class="required email" style="width: 200px; height: 25px; background: none;" name="EMAIL" type="text" /><input class="btn" style="border: none; vertical-align: bottom;" alt="Submit" name="subscribe" src="http://sawmillhollow.com/wp-content/uploads/2010/02/newsletter.jpg" type="image" /></form>';

				}
				elseif (is_category('wellness'))
				{
					
/*					echo '<div style="padding:0px 20px 0px 20px; min-height: 100px;">';
				//	$page_id = 133;					
				//	$page_data = get_page($page_id);
				//	echo $page_data->post_content;
					echo '</div>';
					
					
					
					echo '<form class="validate" style="margin-top: 25px; margin-bottom: 10px;" action="http://sawmillhollow.us1.list-manage.com/subscribe/post?u=bfe48a34765a5cde911455ee2&amp;id=5b07c0f90d" method="post"><h3>Sign up for our newsletter:</h3><input class="required email" style="width: 200px; height: 25px; background: none;" name="EMAIL" type="text" /><input class="btn" style="border: none; vertical-align: bottom;" alt="Submit" name="subscribe" src="http://sawmillhollow.com/wp-content/uploads/2010/02/newsletter.jpg" type="image" /></form>';					
*/
				}
				else the_meta();
				
				break;

	}



//        	if(is_front_page())
//			{
//				echo '<div id="slideshow1" class="pics" style="border:1px solid #CCC; margin-bottom:2em; width:488px; height:356px;">';
//				echo '<img src="http://gifup.com/data/gifs/5/a/1/5a1b12e5d4.gif" width="488" height="356" />';
            	//echo '<img src="http://cloud.github.com/downloads/malsup/cycle/beach2.jpg" width="485" height="350" />';
            	//echo '<img src="http://cloud.github.com/downloads/malsup/cycle/beach3.jpg" width="485" height="350"/>';
//				echo '</div>';
				//thesis_multimedia_box();
//				echo '<table style="width:100%"><tr>';
//				echo '<td><h2>THE IDEA</h2><h3>grow healthier together</h3></td>';
//				echo '<td><h2>THE LATEST</h2><h3>happenings from the farm</h3></td>';
//				echo '</tr></table>';
				


/*


<br/>

<center>

<iframe src="http://www.facebook.com/plugins/likebox.php?id=135967051261&amp;width=270&amp;connections=8&amp;stream=false&amp;header=false&amp;height=255" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:270px; height:255px;" allowTransparency="true"></iframe>

</center>

	div#footer
	{
		height:<?php if (is_page('7')) echo '110'; else echo '80';?>px;
	}


*/



		?>


			

		</div>
        
        
        
        
