<?php 
	/**
	 * Return the content from header.php
	 * No other information needed
	 */
	get_header(); 
?>

<div class="container-fluid" id="content">
	<?php if(have_posts()): ?>
		<div class="row" style="margin: 1em;">
			<div class="col-xs-12 col-sm-8">
				<?php while( have_posts()): the_post(); ?>
				<div class="">
					<?php

						/**
						 * Returns the format of each post
						 */
						get_post_format(); 
					?>

					<?php 

						/**
						 * Fetched the content from content.php
						 * parameter 1 - location/name/first part of the file
						 * parameter 2 - the post format
						 * locates the file from the given post format else returns content
						 * e.g. file content-image.php
						 */
						get_template_part('content', get_post_format()); 
					?>
				</div>
				<?php endwhile; ?>
			</div>
			<div class="col-xs-12 col-sm-4">
				<?php get_sidebar(); ?>

			</div>
		</div>

	<?php else: ?>

	<div class="jumbotron jumbotron-fluid">
	  <div class="container">
	    <h1>Welcome to Bootstrap Wordpress Theme</h1>
	    <p class="lead">No Post Available</p>
	  </div>
	</div>
		
	<?php endif; ?>

</div>


<?php 
	/**
	 * Return the content from footer.php
	 * No other information needed
	 */
	get_footer();
?>