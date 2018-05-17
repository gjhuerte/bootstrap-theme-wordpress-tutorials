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

			<div class="col-xs-12">
				<?php

					/**
					 * Query Posts
					 * Includes category in ids 1, 9, 8
					 * Exclude id 10
					 */
					
					$args_cat = [
						'include' => '1, 9, 8'
					];

					$categories = get_categories($args_cat);

					foreach($categories as $category):
					
						$args = [
							'type' => 'post',
							'posts_per_page' => 3,
							'category__in' => $category->term_id,
							'category__not_in' => array(10),
						];

						$blogs = new WP_Query($args);
						if( $blogs->have_posts() ):
							while( $blogs->have_posts()): $blogs->the_post(); ?>
								<?php get_template_part('content'. 'featured'); ?>
							<?php endwhile;
						endif;

						/**
						 * Reset the Post Data
						 * resets the previous edited data before the post function
						 * prevent the query post to affect other post
						 */
						wp_reset_postdata();

					endforeach;
				?>
			</div>
		</div>
		<div class="row" style="margin: 1em;">

			<div class="col-xs-12">
				<?php

					/**
					 * Query Posts
					 * Print the First Post
					 */
					
					$args = [
						'type' => 'post',
						'posts_per_page' => 3,
					];
					$blogs = new WP_Query($args);
					if($blogs->have_posts()):
						while( $blogs->have_posts()): $blogs->the_post(); ?>
							<?php get_template_part('content'. get_post_format()); ?>
						<?php endwhile;
					endif;

					/**
					 * Reset the Post Data
					 * resets the previous edited data before the post function
					 * prevent the query post to affect other post
					 */
					wp_reset_postdata();
				?>
			</div>

			<div class="col-xs-12 col-sm-8">

				/**
				 * Print Other Posts
				 */
				<?php 

					$args = [
						'type' => 'post',
						'posts_per_page' => 2,
						'offset' => 1

					];

					$blogs = new WP_Query($args);
					if($blogs->have_posts()):
						while( $blogs->have_posts()): $blogs->the_post(); ?>
							<?php get_template_part('content'. get_post_format()); ?>
						<?php endwhile;
					endif;

					/**
					 * Reset the Post Data
					 * resets the previous edited data before the post function
					 * prevent the query post to affect other post
					 */
					wp_reset_postdata();

				?>
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