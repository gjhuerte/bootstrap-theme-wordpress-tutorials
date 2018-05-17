	
	<footer id="footer" class="navbar navbar-expand-lg">
	<?php
		/**
		 * calls whatever menu on the administration panel
		 * default: grabs the first menu available
		 * theme location - same as specified in functions.php
		 * 
		 */
		wp_nav_menu([
			'theme_location' => 'footer',
			'container_id' =>  'primaryNavigation',
			'container_class' => 'collapse navbar-collapse',
			'menu_class' => 'navbar-nav mr-auto',
			'walker' => new wp_bootstrap_navwalker(),
		]);
	?>
		Bootstrap &copy; 2018
	</footer>

	<?php
		/**
		 * Include all the scripts in here
		 */
		wp_footer();
	?>
	</body>
</html>