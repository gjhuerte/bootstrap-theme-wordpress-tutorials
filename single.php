
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
		<?php if(have_posts()): ?>

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

		<?php else: ?>
			
		<?php endif; ?>
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