<?php

	/**
	 * walker for wordpress and bootstrap integration
	 */
	require_once( 'wp-bootstrap-navwalker.php');
	/**
	 * 	1. give the functions a unique name
	 * 	2. include the scripts and styles
	 * 	3. call the function with action when he has execute the function
	 */
	function app_script_enqueue() {

		/**
		 * Enqueue the style by calling the hook
		 * parameter 1 ( required ) - handle/simple name for the file you want to enqueue and automatically
		 * include -css in the end so we do not need to include it
		 * parameter 2 - source/file location. Absolute path of the file
		 * get_template_directory_uri() - prints the full uri of the template location
		 * parameter 3 - dependencies of the file
		 * parameter 4- - version of the file
		 * parameter 5 - media parameter: all, print, devices, or different resolution device 
		 * parameter 5 ( if scripts ) - set to true to print to the footer of the page
		 */
		wp_enqueue_style('bootstrap-style', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css', array(), '4.0.0', 'all');
		wp_enqueue_style('app-style', get_template_directory_uri() . '/css/app.css', array(), '1.0.0', 'all');
		wp_enqueue_script('jquery-script', 'https://code.jquery.com/jquery-3.3.1.min.js', array(), '', true);
		wp_enqueue_script('bootstrap-script', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js', array(), '4.0.0', true);
		wp_enqueue_script('app-script', get_template_directory_uri() . '/js/app.js', array(), '1.0.0', true);
		
	}

	/**
	 * hook that connect wordpress execution process to custom functions
	 * wordpress execution process examples: create template, embeds script, generate....
	 * parameter 1 - this function is when wordpress enqueue or generates scripts to be included. When
	 * wordpress generates the scripts, include this 
	 * parameter 2 - the function to trigger
	 */
	add_action('wp_enqueue_scripts',  'app_script_enqueue');

	/**
	 * function for themes support
	 */
	function app_theme_setup() {
		add_theme_support('menus');

		/**
		 * parameter 1 - theme location, unique name of menu, treated as slug. lowercase
		 * parameter 2 - description
		 */
		register_nav_menu('primary', 'Primary Header Navigation');
		register_nav_menu('secondary', 'Secondary Header Navigation');
		register_nav_menu('footer', 'Footer Navigation');
	}

	/**
	 * call the functions and execute after the setup theme is executed
	 * parameter 1: init, after_setup_theme
	 * init - whenn the theme is initialize
	 * after_setup_theme - after the theme is setup
	 */
	add_action('init', 'app_theme_setup');

	/**
	 * custom background for the theme
	 * the function can be called without using an
	 * action. This is a theme feature to change
	 * the background image of the site
	 */
	add_theme_support('custom-background');

	/**
	 * Header for Different Pages
	 */
	add_theme_support('custom-header');

	/**
	 * Feature Image for a Single Blog Posts
	 */
	add_theme_support('post-thumbnails');

	/**
	 * Post Formats
	 * The Format Option will appear in individual post
	 * Gallery Link, Image, Quote, Video, Chat, Aside
	 */
	add_theme_support('post-formats', [
		'aside', 'image', 'video'
	]);

	/**
	 * Sidebar functions
	 * will prepend a sidebar to the first part of class
	 */
	function app_widget_setup(){

		register_sidebar([
			'name' => 'Sidebar',
			'id' => 'custom-sidebar-1',
			'class' => 'wrapper',
			'description' => 'Standard Sidebar of the Page',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' =>  '</aside>',
			'before_title' => '<h1 class="widget-title">',
			'after_title' => '</h1>',
		]);

	}

	/**
	 * Activate the widgets menu
	 */
	add_action('widgets_init', 'app_widget_setup');

?>