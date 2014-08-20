<?php /* Template Name: 4 Column Gallery */ ?>

<?php get_header(); ?>

    <div id="container">
    
    <!-- Sidebar -->
	<?php get_template_part( 'includes/sidebar', 'sidebar' ); ?>

    <section id="content-container">

    	<!-- Toolbar -->
    	<?php get_template_part( 'includes/toolbar', 'toolbar' ); ?>

        <div id="content">

        	<?php if(have_posts()): ?>

	        	<?php while(have_posts()): the_post(); ?>

		        	<div id="gallery" class="gallery-container four-column photoswipe">
		        		
		        		<?php get_theme_gallery('gallery-small'); ?>

		        	</div>

		        <?php endwhile; ?>

	        <?php endif; ?>

	        <?php if (current_user_can('edit_post')): ?>

			<div class="text-center" style="margin: 30px 0 40px;">
				<?php echo '<a class="button full-width radius" href="' . get_edit_post_link() . '">' . __('Edit This', 'now') . '</a>'; ?>
			</div>

	        <?php endif; ?>

        </div>

    </section>

<?php get_footer(); ?>