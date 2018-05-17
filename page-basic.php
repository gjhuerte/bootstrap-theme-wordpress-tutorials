<?php 
	/**
	 * Template Name: Page Basic
	 */
	get_header(); 
?>

<div class="container-fluid" id="content">
	<?php if(have_posts()): ?>
		<div class="row">
			<div class="col-xs-12 col-md-12">

			<?php while( have_posts()): the_post(); ?>
				<?php?>

				<div class="jumbotron jumbotron-fluid" id="header">
				  <div class="container">
				    <h1><?php the_title(); ?></h1>
				    <p class="lead"><?php the_content(); ?></p>
				  </div>
				</div>
			<?php endwhile; ?>
			</div>
		</div>
		<div class="float-right col-xs-12">
			<?php get_sidebar(); ?>

		</div>

		<div class="clearfix"></div>

	<?php else: ?>

		
	<?php endif; ?>

</div>

<?php 
	/**
	 * Return the content from footer.php
	 * No other information needed
	 */
	get_footer();
?>