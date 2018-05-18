<?php 
	/**
	 * Return the content from header.php
	 * No other information needed
	 */
	get_header(); 
?>

<div class="container" id="content">
	<?php if(have_posts()): ?>
		<div class="row" style="margin: 1em;">
			<div class="col-sm-12">
				<?php while( have_posts()): the_post(); ?>
                 <?php
                 
                    /**
                     * use the content-search page as custom search result 
                     */
                    get_template_part('content', 'search'); 
                ?>
				<?php endwhile; ?>
			</div>
		</div>

	<?php else: ?>

	<div class="jumbotron jumbotron-fluid">
	  <div class="container">
	    <h1>No Result Found</h1>
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