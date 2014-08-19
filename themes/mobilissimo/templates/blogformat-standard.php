<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="wrapped-content">
		
		<?php 
		
		$date_format = get_option('now_blog_dateformat') ? get_option('now_blog_dateformat') : 'M, j Y';
		$category_separator = get_option('now_blog_categorysep') ? get_option('now_blog_categorysep') : ' ,';
		
		?>

		<p class="title"><span class="category"><?php the_category($category_separator); ?></span> <span class="time"><?php the_date($date_format); ?></span></p>
		
		<?php 
		/* If single, don't display permalink */
		if(is_single()): ?>

			<h2 class="blog-title"><?php the_title(); ?></h2>
		
		<?php else: ?>

			<h2 class="blog-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		
		<?php endif; ?>


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


		<?php 
		
		/* Display Content */
		if(!is_single()){
			global $more;
			$more = 0;
		}
		
		if ( has_excerpt() && !is_single() ) {
			the_excerpt();
		} else {
			the_content('');
		}

		?>
		<div class="clear-fix"></div>

		<?php wp_link_pages(); ?>

		<?php 
		/* If Not Single, display readmore */
		if(!is_single()): ?>

			<hr>
			<p class="read-more"><a href="<?php the_permalink(); ?>"><?php echo __( 'Read More', 'now' ); ?></a><?php edit_post_link(null,'<span class="align-right">', '</span>'); ?></p>

		<?php else: get_blog_share(); endif; ?>

	</div>
</article>

<?php if(is_single() && get_option('now_comments_disable', 'false') == 'false') comments_template('', true); ?>