<?php 
	/**
	 * Return the content from header.php
	 * No other information needed
	 */
	get_header(); 
?>

<div class="container-fluid" id="content">

    <?php 
        // $currentPage = ( get_query_var('paged')) ? get_query_var('paged') : 1;
        // $args = [
        //     'posts_per_page' => 3,
        //     'paged' => $currentPage,
        // ];

        // query_posts($args);
        
        if(have_posts()): ?>
		<div class="row">
            

			<div class="col-xs-12 col-sm-8">
                <header class="page-header">
                    <?php the_archive_title( '<h1 class="text-muted page-title">', '</h1>'); ?>
                    <?php the_archive_description( '<div class="taxonomy-description>', '</div>'); ?>
                </header>

				<?php while( have_posts()): the_post(); ?>
				<div class="">

					<?php 

						/**
						 * Fetched the content from content.php
						 * parameter 1 - location/name/first part of the file
						 * parameter 2 - the post format
						 * locates the file from the given post format else returns content
						 * e.g. file content-image.php
						 */
						get_template_part('content', 'archive'); 
					?>
				</div>
				<?php endwhile; ?>

				<!-- Anchor Link to Other Pages -->
				<div class="col-xs-6 text-left">
					<?php next_posts_link( '◄ Older Posts'); ?>
				</div>
				<div class="col-xs-6 text-right">
					<?php previous_posts_link( 'Newer Posts ►'); ?>
				</div>
				<!-- Anchor Link to Other Pages -->
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