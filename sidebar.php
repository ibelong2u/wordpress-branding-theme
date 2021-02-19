				<div id="sidebar_1" class="sidebar">
					<ul class="sidebar_list">
<?php 
					if (!dynamic_sidebar(1)) {
						// This function absolutely pwns. You can pull any number of recent posts from ANY category,
						// or you can simply run smarter recent posts on every page of your site (as shown below).
						// It will accept up to three parameters—for instance, if you want to show 6 posts from the
						// category with the slug "asides" in a widget titled "Recent Asides", you would use the 
						// following function call:
						// thesis_recent_posts_widget('asides', 'Recent Asides', 6);
						thesis_recent_posts_widget();
						
						// This function is really just a placeholder. The WordPress Links Widget is better, so use that.
						wp_list_bookmarks(thesis_bookmarks());
					}
?>
					</ul>
				</div>