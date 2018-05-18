<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php bloginfo('name'); ?> <?php wp_title(' - '); ?></title>

		<?php
			/**
			 * Same as tag line
			 */
		?>
		<meta name="description" content="<?php bloginfo('description'); ?>" />
		<?php
			/**
			 * Premade function under the hook wordpress
			 * Embeds the styles wordpress needs to include
			 */
			wp_head();
		?>
	</head>

	<?php 

		/**
		 * detects if home page
		 * returns true if home page
		 * is_home() -> check if home page
		 * is_front_page() -> check if front page
		 */
		if( is_home() ):
			$additional_body_class = [
				'additional-home-class'
			];
		else:
			$additional_body_class = [
				'additional-not-home-class'
			];
		endif;
	?>

	<?php if( has_header_image() ): ?>
	<style type="text/css">
		#header {
			background: url('<?php header_image( $post->post_name ); ?>');
			background-repeat: no-repeat;
			background-size: cover;
			height: 100%;
		}
	</style>
	<!-- Sets the Header of the Website -->
	<!-- <section class="col-md-12"> -->
		<!-- <img class="img-fluid" src="<?php // header_image(); ?>" height="<?php // echo get_custom_header()->height; ?>" width="<?php // echo get_custom_header()->width; ?>" alt="Header Image" /> -->
	<!-- </section> -->
	<!-- Sets the Header of the Website -->
	<?php endif; ?>

	<?php
		/**
		 * to add additional class, add array as parameter for the wordpress site
		 * body_class(['class1', 'class2']);
		 */
	?>
	<body <?php body_class($additional_body_class); ?> >

		<!-- Upper Navigation Bar (Secondary) -->
		<section>
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<?php
				wp_nav_menu([
					'theme_location' => 'secondary',
					'container_id' =>  'secondaryNavigation',
					'container_class' => 'collapse navbar-collapse',
					'menu_class' => 'navbar-nav ml-auto',
					'walker' => new wp_bootstrap_navwalker(),
				]);
			?>
			</nav>
		</section>
		<!-- Upper Navigation Bar (Secondary) -->

		<!-- Lower Navigation Bar (Primary) -->
		<section>

			<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
			  <a class="navbar-brand" href="<?php bloginfo('url')?>"><?php bloginfo('name')?></a>

			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#primaryNavigation" aria-controls="primaryNavigation" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			  </button>
			<?php
				/**
				 * calls whatever menu on the administration panel
				 * default: grabs the first menu available
				 * theme location - same as specified in functions.php
				 * 
				 */
				wp_nav_menu([
					'theme_location' => 'primary',
					'container_id' =>  'primaryNavigation',
					'container_class' => 'collapse navbar-collapse',
					'menu_class' => 'navbar-nav mr-auto',
					'walker' => new wp_bootstrap_navwalker(),
					// 'walker' => 'Walker_Nav_Primary',
				]);
			?>
			</nav>
		</section>
		<!-- Lower Navigation Bar (Primary) -->

		<!-- Custom Search Form -->
		<?php get_search_form(); ?>
		<!-- Custom Search Form -->