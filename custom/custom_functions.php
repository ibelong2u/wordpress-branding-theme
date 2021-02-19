<?php

/**
 * function custom_bookmark_links() - outputs an HTML list of bookmarking links
 * NOTE: only works when called from inside the WordPress loop!
 * SECOND NOTE: This is really just a sample function to show you how to use custom functions!
 *
 * @since 1.0
 * @global object $post
*/

function custom_bookmark_links() {
	global $post;
?>
<ul class="bookmark_links">
	<li><a href="http://del.icio.us/post?url=<?php the_permalink() ?>&amp;title=<?php urlencode(the_title()) ?>" title="Bookmark this post on del.icio.us">Bookmark this article on del.icio.us</a></li>
</ul>
<?php
}