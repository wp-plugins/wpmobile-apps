<?php get_header(); ?>

    <div id="container">
    
    <!-- Sidebar -->
	<?php get_template_part( 'includes/sidebar', 'sidebar' ); ?>

    <section id="content-container" class="dark">

    	<!-- Toolbar -->
    	<?php get_template_part( 'includes/toolbar', 'toolbar' ); ?>

        <div id="content" class="blog blog-single">

        	<?php 

	    	/* Show posts in case there are any */
	    	if(have_posts()){

	    		/* MORE TAG functionallity */
				global $more;

	    		/* Display posts using their post-format templates */
	    		while(have_posts()) {

	    			the_post();

	    			/* Get current post format */
	    			$format = get_post_format();

	    			switch ($format) {
	    				case 'gallery':
	    					get_template_part( 'templates/blogformat', 'gallery' );
	    					break;
	    					
	    				case 'video':
	    					get_template_part( 'templates/blogformat', 'video' );
	    					break;
	    				
	    				default:
	    					get_template_part( 'templates/blogformat', 'standard' );
	    					break;
	    			}

	        	}

			}

			?>

        </div>

    </section>

<?php get_footer(); ?>