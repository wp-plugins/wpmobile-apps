<?php get_header(); ?>

    <div id="container">
    
    <!-- Sidebar -->
	<?php get_template_part( 'includes/sidebar', 'sidebar' ); ?>

        <section id="content-container" class="dark">

        	<!-- Toolbar -->
        	<?php get_template_part( 'includes/toolbar', 'toolbar' ); ?>

    		<?php 

			if (is_tag()) {
			 	$pageDescription = __('Tag archive for', 'now') . ' ' . wp_title('', false);
			} elseif (is_search()) {
				$pageDescription = wp_title('', false);
			} 

			if(isset($pageDescription)) {
				echo '<div class="wrapped-content"><h2 style="margin-bottom: -20px; margin-top: 0;">';
				echo $pageDescription;
	        	echo '</h2></div>';
	        }

    		?>

	        <div id="content" class="blog <?php get_load_animation(); ?>">

	        	<?php 

	        	/* Show posts in case there are any */
	        	if(have_posts()): 

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
			elseif(current_user_can('edit_post') && !is_search()): 

			?>
			
			<div class="wrapped-content" style="margin: 0 0 40px;">
				<h2><?php _e('No posts yet', 'now'); ?></h2>
				<p><?php printf(__('Ready to publish your first post? <a href="%s">Get started here</a>.', 'now'), admin_url( 'post-new.php' )); ?></p>
			</div>
			
			<?php 

			/* else display error message  */
			else: 

			?>

			<div class="wrapped-content" style="margin: 0 0 40px;">
				<h2><?php _e('No matches', 'now'); ?></h2>
				<p><?php _e('Sorry, no posts matched your criteria.', 'now'); ?></p>
			</div>
			
			<?php endif; ?>

        </section>

<?php get_footer(); ?>