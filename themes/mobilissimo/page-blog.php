<?php /* Template Name: Blog */ ?>

<?php
/* Main Loop */
$perPage = (get_option('now_blog_posts') > 0) ? get_option('now_blog_posts') : 6;
$paged = ( get_query_var( 'paged' ) ) ? get_query_var('paged') : 1;  	
$args = array( 'post_type' => 'post', 'posts_per_page' => $perPage, 'paged' => $paged );
$loop = new WP_Query( $args );
?>

<?php get_header(); ?>

    <div id="container">
    
    <!-- Sidebar -->
	<?php get_template_part( 'includes/sidebar', 'sidebar' ); ?>

        <section id="content-container" class="dark">

        	<!-- Toolbar -->
        	<?php get_template_part( 'includes/toolbar', 'toolbar' ); ?>

	        <div id="content" class="blog <?php get_load_animation(); ?>">

	        	<?php 

	        	/* Show posts in case there are any */
	        	if($loop->have_posts()): 

	        		/* Display posts using their post-format templates */
	        		while($loop->have_posts()) {

	        			$loop->the_post();

	        			/* Get current post format */
	        			$format = get_post_format();

	        			switch ($format) {
	        				case 'gallery':
	        					get_template_part( 'templates/blogformat', 'gallery' );
	        					break;

	        				case 'link':
	        					get_template_part( 'templates/blogformat', 'link' );
	        					break;
	        					
	        				case 'video':
	        					get_template_part( 'templates/blogformat', 'video' );
	        					break;
	        					
	        				case 'quote':
	        					get_template_part( 'templates/blogformat', 'quote' );
	        					break;
	        					
	        				case 'aside':
	        					get_template_part( 'templates/blogformat', 'aside' );
	        					break;
	        				
	        				default:
	        					get_template_part( 'templates/blogformat', 'standard' );
	        					break;
	        			}
		        	}
	        	?>
			</div>

		        	
        	<?php
        	/* If is not single or page, show "load more" */
        	if(!is_single()): ?>

			<div id="loadedContent" style="display: none;"></div>
			<div class="text-center" style="margin-bottom: 40px;">
				<a id="loadMore" href="#" rel="<?php global $paged; echo $paged; ?>" class="button radius"><?php _e( 'Load More', 'now' ) ?></a>
			</div>

			<?php endif; ?>


			<?php

			/* Or if user can edit posts and there aren't any, show this message */
			else: 

			?>
			
			<div class="wrapped-content" style="margin: 0 0 40px;">
				<h2><?php _e('No posts yet', 'now'); ?></h2>
				<p><?php printf(__('Ready to publish your first post? <a href="%s">Get started here</a>.', 'now'), admin_url( 'post-new.php' )); ?></p>
			</div>
			
			<?php endif; ?>

        </section>

<?php get_footer(); ?>