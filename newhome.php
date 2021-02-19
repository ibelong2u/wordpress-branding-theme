<?php
/*
Template Name: NewHome
*/

?>

<?php include('newheader.php'); ?>

<div class="clear" style="height:10px;"></div>

            <div class="clear"></div>
       
            <div class="slider-wrapper theme-default grid_12">
                <div id="slider" class="nivoSlider">

<!--a href="http://sawmillhollow.com/"><img src="http://i.imgur.com/qkJ5UeE.jpg" alt="Festival" /> </a-->

              <a href="http://sawmillhollow.com/story/"><img src="http://i.imgur.com/94BiT.jpg" alt="The Farmstead"/></a>
              <a href="http://sawmillhollow.com/AroniaU/"><img src="http://i.imgur.com/O3BG2.jpg" alt="Aronia Berries"/></a>
              <a href="http://sawmillhollow.com/community/"><img src="http://i.imgur.com/K9fjX.jpg" alt="The Community"/></a>
              <a href="http://sawmillhollow.com/"><img src="http://i.imgur.com/dMlfEBZ.jpg" alt="99 County Tour"/></a>
              </div>
            </div>

<div class="clear" style="height:50px;"></div>

<div class="clear"></div>

    <script src="scripts/jquery-1.7.min.js"></script>
    <script src="scripts/jquery.nivo.slider.pack.js"></script>
    <script>
      $(window).load(function() { $('#slider').nivoSlider({pauseTime:5000, effect:'fade'}); });
    </script>

      
<?php include('newfooter.php'); ?>