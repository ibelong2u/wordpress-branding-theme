<?php

function thesis_ie_clear() {
?>
<!--[if lte IE 7]>
<div id="ie_clear"></div>
<![endif]-->
<?php
}

function thesis_analytics_tracking_code() {
	echo stripslashes(thesis_get_option('analytics')) . "\n";
}