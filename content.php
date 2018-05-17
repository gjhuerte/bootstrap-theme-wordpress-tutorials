<?php 
/**
 * Post Thumbnail can be: large, thumbnail
 */
?>
<div class="" style="margin: 10px; border-bottom: 1px solid  #eee ">
  <div class="card-body">
  	<?php the_post_thumbnail('card-img-top img-thumbnail') ?>
    <h5 class="card-title"><?php
			/**
			 * prints the title of every content of post in loop
			 */
			the_title();
		?>		
	</h5>
	<small>Posted on: <?php the_time('F j, Y'); ?> in <?php the_time('g:i a'); ?> <br /> <?php the_category(' | '); ?></small>
    <p class="card-text text-justify"><?php
			/**
			 * prints the title of every content of post in loop
			 */
			// the_content();
			the_excerpt('', true);
		?>
	</p>
	<a href="<?php echo esc_url( get_page_link() ); ?>" role="button" class="btn btn-primary">Read More</a>
  </div>
</div>
