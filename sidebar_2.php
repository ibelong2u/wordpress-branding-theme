				<div id="sidebar_2" class="sidebar">
					<ul class="sidebar_list">
<?php
					if (!dynamic_sidebar(2)) {
						// You should use the WordPress Search Widget for this!
						thesis_deprecated_search_widget();
						
						// This one is a little nicer looking than the WordPress Tag Cloud Widget.
						// If you want to use it, I suggest moving it outside of this if-statement.
						// This way, you'll be able to use widgets in sidebar 2 AND have a nicer tag cloud.
						thesis_tag_cloud();
					}
?>
					</ul>
				</div>