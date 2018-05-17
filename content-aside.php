<h3><?php

	/**
	 * prints the title of every content of post in loop
	 */
	the_title();
?></h3>

<?php 
/**
 * Post Thumbnail can be: large, thumbnail
 */
?>
<div class="thumbnail-img"><?php the_post_thumbnail('thumbnail'); ?></div>

<small>Posted on: <?php the_time('F j, Y g:i a'); ?> in  <?php the_category(); ?></small>

<p><?php

	/**
	 * prints the title of every content of post in loop
	 */
	the_content();
?></p>

<hr />
