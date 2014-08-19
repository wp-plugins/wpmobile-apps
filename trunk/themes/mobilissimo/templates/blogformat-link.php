<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <p class="icon-bg icon-link"></p>
    <div class="wrapped-content">

        <?php 
        	echo str_replace('<a', '<a class="featured-link"', get_the_title());
        ?>

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
<div class="wrapped-content">
HTML;

		}

		?>

       	<?php the_content(''); ?>
       	<?php edit_post_link(null,'<hr><p class="text-right">', '</span>'); ?>
    </div>
</article>