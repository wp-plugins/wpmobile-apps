<?php 

// Custom Page ID
$page_id = get_page_by_title( get_option( 'now_custom_homepage_id' ) );
$page_id = $page_id->ID;

$args = array( 'post_type' => 'page', 'page_id' => $page_id );
$loop = new WP_Query( $args );

 ?>

<?php get_header(); ?>

    <div id="container">
    
    <!-- Sidebar -->
	<?php get_template_part( 'includes/sidebar', 'sidebar' ); ?>

    <section id="content-container">

    	<!-- Toolbar -->
    	<?php get_template_part( 'includes/toolbar', 'toolbar' ); ?>

        <div id="content" class="page">
        	<div class="wrapped-content">

        		<?php if($loop->have_posts()): ?>
        		
	        		<?php while($loop->have_posts()): $loop->the_post(); ?>
	        		
		        		<h2 style="margin-bottom: 0;"><?php the_title(); ?></h2>

        				<?php 

						/* Post Thumbnail Image */
						if(has_post_thumbnail()){

							/* Used Variables */
							$image = get_the_post_thumbnail(null, 'featured-blog', array('class' => 'featured-image'));

							echo <<<HTML
</div>
<figure>
	{$image}
</figure>
<div class="wrapped-content first-child">
HTML;

						}

						/* Print Content */
						the_content(); ?>
	        		
			        <?php endwhile; ?>

		        <?php endif; ?>

		        <?php if (current_user_can('edit_post')): ?>

				<div>
					<?php echo '<a class="button full-width radius" href="' . get_edit_post_link() . '">' . __('Edit This', 'now') . '</a>'; ?>
				</div>

		        <?php endif; ?>

        	</div>

			<?php if(comments_open() && get_option('now_comments_page', 'false') == 'true') comments_template('', true); ?>
        </div>

    </section>

<?php get_footer(); ?>