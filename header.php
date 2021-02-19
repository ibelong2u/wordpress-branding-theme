<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head profile="http://gmpg.org/xfn/11">

<link rel="icon" type="image/vnd.microsoft.icon" href="http://sawmillhollow.com/wp-content/themes/SMH_1/images/favicon.ico">

<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php thesis_output_title(); ?></title>

<?php 
wp_head();
thesis_hook_header();
?>

<?php	
		if (is_front_page())
		{
			echo '<script type="text/javascript" src="http://sawmillhollow.com/wp-content/themes/SMH_1/jquery-1.4.2.min.js"></script>';
			echo '<script type="text/javascript" src="http://sawmillhollow.com/wp-content/themes/SMH_1/jquery.cycle.lite.1.0.min.js"></script>';			
		}
		
		if (is_page('233'))
		{
			echo '<script type="text/javascript" src="http://sawmillhollow.com/wp-content/themes/SMH_1/jquery-1.4.2.min.js"></script>';
			echo '<script type="text/javascript" src="http://sawmillhollow.com/wp-content/themes/SMH_1/jquery.simpletip-1.3.1.min.js"></script>';			
		}				
		
		
		if (is_page('7') || is_category('wellness'))
		{
			echo '<script type="text/javascript" src="http://sawmillhollow.com/wp-content/themes/SMH_1/jquery-1.4.2.min.js"></script>';
			echo '<script type="text/javascript" src="http://sawmillhollow.com/wp-content/themes/SMH_1/jquery-ui-1.8.custom.min.js"></script>';									
			echo '<script type="text/javascript" src="http://sawmillhollow.com/wp-content/themes/SMH_1/jquery.fancybox-1.3.1.pack.js"></script>';				
			echo '<link rel="stylesheet" href="http://sawmillhollow.com/wp-content/themes/SMH_1/jquery.fancybox-1.3.1.css" type="text/css" media="screen" />';
			echo '<link rel="stylesheet" href="http://sawmillhollow.com/wp-content/themes/SMH_1/smoothness/jquery-ui-1.8.custom.css" type="text/css" media="screen" />';

		}
		
?>

<script type="text/javascript">

	<?php 
		if (is_front_page()) echo "jQuery(document).ready(function() { $('#slideshow').cycle({prev:'#prev',next:'#next',timeout:5000, pause:1}); });"; 
		if (is_page('7'))
		{
			echo "jQuery(document).ready(function() { $('a.imagepop').fancybox(); });";	
			echo "jQuery(function() { $('#productstab').tabs(); });";
		}
		
		if (is_page('233'))
		{			
		

			echo "jQuery(document).ready(function() { $('#berries').simpletip({ content: '<ul><li><a href=\"/2010/07/cranberries/\">Cranberries</a></li><li><a href=\"/2010/07/research-on-elderberry/\">Elderberry</a></li><li><a href=\"/2010/07/research-on-blackcurrant/\">Blackcurrant</a></li><li><a href=\"/2010/04/hawthorn-research/\">Hawthorn</a></li><li><a href=\"/2010/07/research-on-goji-berry/\">Goji Berry</a></li><li><a href=\"/2010/07/research-on-amla/\">Amla Berry</a></li><li><a href=\"/2010/07/research-on-mulberry/\">Mulberry</a></li></ul>', persistent: 'true', position: 'bottom'  }) });";
			
			echo "jQuery(document).ready(function() { $('#nutsseeds').simpletip({ content: '<ul><li><a href=\"/2010/04/research-on-sesame-seed/\">Sesame Seeds</a></li><li><a href=\"/2010/04/research-on-the-sunflower/\">Sunflower Seeds</a></li><li><a href=\"/2010/04/research-on-almonds/\">Almonds</a></li></ul>', persistent: 'true', position: 'bottom' }) });";



			echo "jQuery(document).ready(function() { $('#herbs').simpletip({ content: '<ul><li><a href=\"/2010/07/research-on-olive-leaf/\">Olive Leaf</a></li><li><a href=\"/2010/04/research-on-licorice-root/\">Licorice Root</a></li><li><a href=\"/research-on-the-dandelion/\">Dandelion</a></li><li><a href=\"/2010/04/research-on-the-ginger-root/\">Ginger Root</a></li><li><a href=\"/2010/04/research-on-cinnamon/\">Cinnamon</a></li><li><a href=\"/2010/04/research-on-the-milk-thistle/\">Milk Thistle</a></li><li><a href=\"/2010/04/research-on-the-echinacea-root/\">Echinacea Root</a></li></ul>', persistent: 'true', position: 'bottom' }) });";
			
			echo "jQuery(document).ready(function() { $('#fruitsvegetables').simpletip({ content: '<ul><li><a href=\"/2010/04/grape-seed-research/\">Grape Seed</a></li><li><a href=\"/2010/07/research-on-watermelon/\">Watermelon</a></li></ul>', persistent: 'true', position: 'bottom' }) });";
			
			echo "jQuery(document).ready(function() { $('#other').simpletip({ content: '<ul><li>Coming Soon!</li></ul>', persistent: 'true', position: 'bottom' }) });";			
			
			
			
			echo "jQuery(document).ready(function() { $('#antioxidants').simpletip({ content: '<b>Antioxidants</b><br/>Major anti-aging mechanism- healthy skin and protects skin from sun damage, as well as strengthening our bodies defense mechanisms against free radicals that harm our immune system and can cause diseases and viruses.', position: 'top' }) });";	
			echo "jQuery(document).ready(function() { $('#amino').simpletip({ content: '<b>Amino Acids</b><br/>The 20 essential amino acids that our body requires to produce proteins. The body can manufacture eleven out of the twenty however nine must be delivered to the body by means of food. Amino acids also make certain hormones, neurotransmitters, and nucleic acids in our DNA.', position: 'top' }) });";	
			echo "jQuery(document).ready(function() { $('#fiber').simpletip({ content: '<b>Dietery Fiber</b><br/>This includes the plants cell walls and indigestible residues.Dietary fiber preserves the integrity of our bodies bowel movements, colon health, and reducing harmful problems with cholesteral as fibers such as pectin can binding the cholesterol and bile acids and promote excretion. Lignans are compoounds that show properties such as anticancer, antibacterial, antifungal, antiviral activity.', position: 'top' }) });";	
			echo "jQuery(document).ready(function() { $('#minerals').simpletip({ content: '<b>Minerals</b><br/>The human body utilizes minerals for the proper composition of bone and blood maintenance of normal cell function. Minerals as well as vitamins are an important component of enzymes and coenzymes. Without these minerals the enzymes could not be converted to their active forms.', position: 'right' }) });";	
			echo "jQuery(document).ready(function() { $('#vitamins').simpletip({ content: '<b>Vitamins (fat &amp; water soluble)</b><br/>These vitamins are vital for the bodies chemical processes to occur. Fat-soluble vitamins (A,E,D,K) are stored in the fats cells and can be available for use on demand; however water soluble are needed in smaller amounts. Vitamins provide mechanisms such as strong bones, keen eyesight, anti blood clotting mechanisms, and essential for energy production.', position: 'bottom' }) });";	
			echo "jQuery(document).ready(function() { $('#phenolic').simpletip({ content: '<b>Phenolic (Reserveratrol)</b><br/>Longevity of our lives as an anti aging compound, regulating blood sugar and reducing the risk of heart disease. Reduces the risks that are related to age related diseases, including diabetes, heart disease, and cancer.', position: 'bottom' }) });";	
			echo "jQuery(document).ready(function() { $('#flavonoids').simpletip({ content: '<b>Flavonoids</b><br/>Protection against Cardiovascular disease, reduction of systolic blood pressure, and reducing cholesterol in the bloodstream.', position: 'top' }) });";	
			echo "jQuery(document).ready(function() { $('#polyphenols').simpletip({ content: '<b>Polyphenols (Tannins)</b><br/>These have anti-inflammatory, antibacterial, and antiviral effects.', position: 'bottom' }) });";
			echo "jQuery(document).ready(function() { $('#oils').simpletip({ content: '<b>Essential Oils</b><br/>They may carry oxygen into our cells and remove waste products by cleansing receptor sites of petrochemicals or pharmaceutical drugs. Some essential oils can be used to regulate hormones. Components that perform anti-bacterial, anti-viral, anti-fungal or anti-parasitic functions within a plant can do the same for people.', position: 'left' }) });";				
		}

			
	?>
	
	
	
	<?php //  $('#slideshow').cycle({prev:'#prev',next:'#next',timeout:0});  ?>
	<?php //  $('#slideshow').cycle();  ?>
	
	

	function ChangeShopWhite()
	{
		var x = document.getElementById("shopicon");
  		x.src = "http://sawmillhollow.com/wp-content/themes/SMH_1/images/berrywhite.gif" ;
	}

	function ChangeShopPurple()
	{
		var x = document.getElementById("shopicon");
  		x.src = "http://sawmillhollow.com/wp-content/themes/SMH_1/images/berrypurple.gif" ;
	}
	function ChangeDotWhite()
	{
		var x = document.getElementById("connecticon");
  		x.style.color = "#FFFFFF" ;
	}

	function ChangeDotPurple()
	{
		var x = document.getElementById("connecticon");
  		x.style.color = "#333366" ;
	}
	
	function ReverseColor()
	{
		var x = document.getElementById("hhb");
		x.style.color = "#4d4c4c" ;
		
		var y = document.getElementById("hhbarticles");
		y.style.backgroundColor = "#4d4c4c";				
	}
	
	function RestoreColor()
	{
		var x = document.getElementById("hhb");
		x.style.color = "#3d3d5d" ;
		
		var y = document.getElementById("hhbarticles");
		y.style.backgroundColor = "#3d3d5d";				
	}

	function checkEnter(e,query)
	{
		var characterCode;
		if(e && e.which)
		{
			e = e;
			characterCode = e.which;
		}
		else
		{
			e = event;
			characterCode = e.keyCode;
		}
		if(characterCode == 13)
		{
			window.location.href = "/?s="+query;
			return false;
		}
		else
		{
			return true;
		}
	}
</script>

<style type="text/css">
	div#content
	{
		width:<?php if (is_front_page()) echo '30'; else echo '60';?>em;
	}
	.attachment-post-thumbnail	
	{	
		<?php if (is_category()) echo 'float:left; width:200px; height:140px; padding:3em 3em 0em 0em;';
							else echo 'float:right; width:300px; height:210px; padding:0em 0em 0em 3em;'; ?>	
	}

</style>


</head>

<body<?php thesis_body_classes(); ?>>

<?php /* if (is_page('7')) echo '<div style="position:absolute; left:55%; top:200px;" id="googlecart-widget"></div>'; */ ?>

<div id="container">
<div id="page">

	<a href="/home/" title="Home" id="homelink">Sawmill Hollow</a>

	

	<input type="text" style="float:right; margin-right:2em; margin-top:-5em; font-family:Arial; background-color:#FFF; font-size:12px;width:11em; padding:5px;" onfocus="if (this.value == 'search') {this.value = '';}" onblur="if (this.value == '')  {this.value = 'search';}" onKeyPress="checkEnter(event, this.value)" value="search" />    
    

<?php thesis_nav_menu(); ?>

	<div id="header">
<?php
thesis_show_title();
thesis_show_tagline();
?>
	</div>
	