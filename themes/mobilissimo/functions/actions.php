<?php 

/**
*
* === Action Functions ===
*
* This file mainly contains wordpress filters, actions and
* other wordpess hooks used in this theme.
*
**/




/**
*
* === Registring Template scripts & styles ===
* 
* Register menu javascripts, styles and jQuery. In case
* you want to add custom styles to the theme, do it here.
* 
*/

if(!function_exists('register_utlimate_scripts_styles')){
	function register_utlimate_scripts_styles() {

		/* Register scripts */
		wp_register_script('modernizr', WPMOB_THEME_URL . '/js/vendor/modernizr.js', array(), '', false);

		/* Plugins */
		wp_register_script('klass', WPMOB_THEME_URL . '/js/plugins/klass.js', array(), '', true);
		wp_register_script('photoswipe', WPMOB_THEME_URL . '/js/plugins/photoswipe.js', array(), '', true);
		wp_register_script('hammer', WPMOB_THEME_URL . '/js/plugins/hammer.js', array(), '', true);
		wp_register_script('flexslider', WPMOB_THEME_URL . '/js/plugins/flexslider.js', array(), '', true);
		wp_register_script('h5validate', WPMOB_THEME_URL . '/js/plugins/h5validate.js', array(), '', true);
		wp_register_script('responsivetables', WPMOB_THEME_URL . '/js/plugins/responsivetables.js', array(), '', true);
		wp_register_script('prism', WPMOB_THEME_URL . '/js/plugins/prism.js', array(), '', true);
		wp_register_script('sticky', WPMOB_THEME_URL . '/js/plugins/sticky.js', array(), '', true);

		/* Main Scripts */
		wp_register_script('script', WPMOB_THEME_URL . '/js/script.js', array(), '', true);
		

		/* Initialize scripts */
		wp_enqueue_script('modernizr');

		/* Plugins */
		wp_enqueue_script("jquery");
		wp_enqueue_script('klass');
		wp_enqueue_script('photoswipe');
		wp_enqueue_script('hammer');
		wp_enqueue_script('flexslider');
		wp_enqueue_script('h5validate');
		wp_enqueue_script('responsivetables');
		wp_enqueue_script('prism');
		wp_enqueue_script('sticky');

		/* Main Scripts */
		wp_enqueue_script('script');


		/* Comments functionallity script */
		wp_enqueue_script( 'comment-reply' );
		

		/* Register Styles */
		wp_register_style('vendor_normalize', WPMOB_THEME_URL . '/css/vendor/normalize.css');
		wp_register_style('vendor_fontello', WPMOB_THEME_URL . '/css/vendor/fontello.css');
		wp_register_style('mainstyle', WPMOB_THEME_URL . '/css/style.php');

		/* Google Webfonts */
		if ((get_option('now_fonts_1', 'false') == 'true') && (get_option('now_fonts_1_link'))) {
			preg_match('/href=\'([^"]+)\'/', stripslashes(get_option('now_fonts_1_link')), $match);
			$url = $match[1];
			wp_enqueue_style('heading-webfont', $url);
		} else {
			wp_enqueue_style('heading-webfont', WPMOB_THEME_URL . '/font/Raleway.css');
		}

		if ((get_option('now_fonts_2', 'false') == 'true') && (get_option('now_fonts_2_link'))) {
			preg_match('/href=\'([^"]+)\'/', stripslashes(get_option('now_fonts_2_link')), $match);
			$url = $match[1];
			wp_enqueue_style('body-webfont', $url);
		} else {
			wp_enqueue_style('body-webfont', WPMOB_THEME_URL . '/font/OpenSans.css', array(), "", "all");
		}


		/* Initialize styles */
		wp_enqueue_style('vendor_normalize');
		wp_enqueue_style('vendor_fontello');
		wp_enqueue_style('mainstyle');
	}
	
	add_action('wp_enqueue_scripts', 'register_utlimate_scripts_styles');
}




/**
* 
* === Adding theme support features ===
* 
* Register Custom Post Formats, Post Thumbnails, 
* thumbnail sizes, configure your options here
* 
*/

if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support('post-formats', array('gallery', 'link', 'quote', 'video', 'aside'));
	add_theme_support('post-thumbnails');
	add_theme_support('automatic-feed-links');
	if ( ! isset( $content_width ) )
		$content_width = 960;
}

/* Add custom editor styles */
add_editor_style();




/**
* 
* === Custom thumbnail sizes ===
* 
* Register Custom thumbnail sizes used all around the theme
* 
*/

if ( function_exists( 'add_image_size' ) ) { 
	add_image_size('featured-blog', 700, 9999);
	add_image_size('gallery-big', 400, 400, true);
	add_image_size('gallery-medium', 350, 350, true);
	add_image_size('gallery-small', 300, 300, true);
}




/**
*
* === Localszation support ===
* 
* Loads .pot translation file from languages directory, put your custom 
* translations into this directory
* 
*/

function localization_support() {    
	load_theme_textdomain( 'now', get_template_directory() . '/languages' );
}

add_action('after_setup_theme', 'localization_support');




/**
*
* === Register Custom Menu ===
*  
* Register Custom wordpress menu, that you can customize 
* from Wordpress > Appearance > Menus
* 
*/

if(!function_exists('register_custom_menu')){
	function register_custom_menu() {
		register_nav_menu('primary', __('Sidebar', 'now'));
	}
	
	add_action( 'init', 'register_custom_menu');
}




/**
*
* === Custom Body Classes ===
*  
* Adds hook to wordpress to display custom body class for fixed header
* or to disable touch gestures
* 
*/

if(!function_exists('custom_body_class')){
	function custom_body_class($classes) {

		/* Enable/Disabel touch gestures */
		if(get_option( 'now_touchgestures', 'false' ) == 'false'){
			$classes[] = 'touch-gesture';
		}

		/* Enable/Disable Fixed Header */
		if(get_option( 'now_fixed_header', 'false' ) == 'true'){
			$classes[] = 'fixed-header';
		}

		return $classes;
	}
	
	add_action( 'body_class', 'custom_body_class');
}

 ?>