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

		/* Formats and display video */

		$video = get_postvideo_link();
		$color = PRIMARY_COLOR;
		$attributes = '';

		/* Add Custom attributes to the iframe */
		if ($video['type'] == 'vimeo'){
			$attributes = "?title=0&byline=0&portrait=0&color={$color}";
		}elseif ($video['type'] == 'youtube') {
			$attributes = '?autohide=1&iv_load_policy=3&modestbranding=0&showinfo=0';
		}

		/* If Video link was found, print it */
		if($video){
			echo <<<HTML
</div>
<figure class="flex-video">
	<iframe src="{$video['id']}{$attributes}" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
</figure>
<div class="wrapped-content">
HTML;
		}

		/* Remove Video link from the content and print it */
		if($video){
            if(!is_single()){
                global $more;
                $more = 0;
            }

            if ( has_excerpt() && !is_single() ) {
                the_excerpt();
            } else {
				$content = get_the_content(''); 
				$search = $video['url'];
				$content = str_replace($search, '', $content);
				$content = apply_filters('the_content', $content);
				$content = str_replace(']]>', ']]&gt;', $content);
				echo $content;
			}
		}else{
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
		}

		?>

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