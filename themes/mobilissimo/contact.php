<?php /* Template Name: Contact */ ?>

<?php get_header(); ?>

    <div id="container">
    
    <!-- Sidebar -->
	<?php get_template_part( 'includes/sidebar', 'sidebar' ); ?>

    <section id="content-container">

    	<!-- Toolbar -->
    	<?php get_template_part( 'includes/toolbar', 'toolbar' ); ?>

        <div id="content" class="contact">

            <?php if(have_posts()): ?>

                <?php while(have_posts()): the_post(); ?>

                    <?php
                    if (get_option('now_googlemaps_api') && get_option('now_googlemaps_layout') == 'Google Maps API'){
                        echo '<div class="hero" id="map-container-api"></div>';
                    } elseif (get_option('now_googlemaps_iframe') && get_option('now_googlemaps_layout') == 'Google Maps Iframe'){
                        preg_match('#src="([^"]+)"#', stripslashes(get_option('now_googlemaps_iframe')), $matches);
                        echo '<div class="hero">';
                        echo '<iframe class="hero" width="425" height="415" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="' . $matches[1] . '"></iframe>';
                        echo '</div>';
                    }
                    ?>

                    <div class="wrapped-content">
                        <h2><?php the_title(); ?></h2>

                        <?php the_content(); ?>

                        <?php if(get_option( 'now_contact_form', 'false' ) == 'false') get_template_part( 'includes/contact', 'form' ); ?>
                    </div>

                <?php endwhile; ?>

            <?php endif; ?>

            <?php if (current_user_can('edit_post')): ?>

            <div class="wrapped-content text-center">
                <?php echo '<a class="button full-width radius" href="' . get_edit_post_link() . '">' . __('Edit This', 'now') . '</a>'; ?>
            </div>

            <?php endif; ?>

        </div>

    </section>

<?php get_footer(); ?>