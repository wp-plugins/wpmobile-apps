<!DOCTYPE html>
<!--[if IE 8 ]>    <html lang="en" class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js lt-ie9> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html <?php language_attributes(); ?> class="no-js">
<!--<![endif]-->
	<head>
	    <meta charset="<?php bloginfo('charset'); ?>">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	    <?php get_theme_metadata(); ?>

	    <?php get_webappdata(); ?>
	    
	    <?php get_formatted_title(); ?>

	    <?php get_favicon(); ?>

		<?php get_code_integration(); ?>
	    
    <?php wp_head(); ?>
	    
	</head>
	
	<body <?php body_class(); ?>">