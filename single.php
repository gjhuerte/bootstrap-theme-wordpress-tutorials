
<?php 
	/**
	 * Single of the Blog Post
	 * Prints the whole content of the page
	 * Treats the file as single page
	 */
	get_header(); 
?>

<div class="container" id="content">

	<div class="row mt-5">

		<div class="col-xs-12 col-md-8">

		<?php
		
			/**
			 * limits the post per page upto 3 only
			 */
			$currentPage = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$args = [
				'posts_per_page' => 1,
				'paged' => $currentPage
			];

			query_posts($args);

			if(have_posts()): ?>

			<?php while( have_posts() ): the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php the_title('<h1 class="entry-title">', '</h1>'); ?>

				<?php if( has_post_thumbnail() ): ?>
					<div class="pull-right"><?php the_post_thumbnail('thumbnail'); ?></div>
				<?php endif; ?>

				<?php if( has_category() ): ?>
				<small><?php the_category(' &#9675; '); ?> || <?php the_tags(); ?> || <?php edit_post_link(); ?></small>
				<?php endif; ?>

				<div class="text-justify">
				<?php the_content(); ?>
				</div>

				<?php 
					/**
					 * Check if the comment section is open
					 */
					if( comments_open() ) {

						/**
						 * prebuilt comment forms and sections
						 */
						comments_template();
					} else {
						echo '<p class="text-danger">Comments are not allowed for this post</p>';
					}
				?>

			</article>
			<?php endwhile; ?>

			<!-- Anchor Link to Other Pages -->
			<div class="col-md-6 text-left">
				<?php previous_posts_link( '◄ Older Posts'); ?>
			</div>
			<div class="col-xs-6 text-right">
				<?php next_posts_link( 'Newer Posts ►'); ?>
			</div>
			<!-- Anchor Link to Other Pages -->


		<?php else: ?>
			
		<?php endif;  wp_reset_query(); ?>
		</div>

		<div class='col-xs-12 col-md-4 float-right'>
			<?php get_sidebar(); ?>
		</div>
	</div>

</div>

<?php 
	/**
	 * Return the content from footer.php
	 * No other information needed
	 */
	get_footer();
?>