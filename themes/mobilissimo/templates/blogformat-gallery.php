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

        /* Display and format gallery Script */
        if(!is_single()){
            global $more;
            $more = 0;
        }

        $content = get_the_content('');
        $pattern = "#\[gallery [0-9a-zA-Z=\"\,-_ ]*\]#";
        if (preg_match($pattern, $content, $matches)) {

            /* Gallery Shortcode */
            $gallery_shortcode = $matches[0];
            $content = str_replace($matches[0], '', $content);


            /* Add correct thumbnail size before generating shortcode */
            if (preg_match("#size=\"[a-z]*\"#", $gallery_shortcode, $matches)) {
                $gallery_shortcode = str_replace($matches[0], '', $gallery_shortcode);
            }
            
            $gallery_shortcode = str_replace(']', ' size="featured-blog"]', $gallery_shortcode);


            /* Add correct link attribute (none) */
            if (preg_match("#link=\"[a-z]*\"#", $gallery_shortcode, $matches)) {
                $gallery_shortcode = str_replace($matches[0], '', $gallery_shortcode);
            }
            
            $gallery_shortcode = str_replace(']', ' link="none"]', $gallery_shortcode);


            /* Add correct icontag */
            if (preg_match("#icontag=\"[a-z]*\"#", $gallery_shortcode, $matches)) {
                $gallery_shortcode = str_replace($matches[0], '', $gallery_shortcode);
            }
            
            $gallery_shortcode = str_replace(']', ' icontag="li"]', $gallery_shortcode);


            /* Generate Gallery Shortcode and prepare for output */
            $gallery = do_shortcode($gallery_shortcode);
            $gallery = strip_html_tags($gallery, '<img><li><dd>');
            $gallery = str_replace(array('<dd', '</dd>'), array('<p style="display: none;"', '</p>'), $gallery);

            
            /* Remove Gallery from content */
            $content = apply_filters('the_content', $content);
            $content = str_replace(']]>', ']]&gt;', $content);

            if ( has_excerpt() && !is_single() ) {
                $content = get_the_excerpt();
            }

            echo <<<HTML
</div>

<div class="flexslider-container">
    <figure class="flexslider">
        <ul class="slides">
            {$gallery}
        </ul>
    </figure>
    <div class="flexslider-controls"></div>
</div>

<div class="wrapped-content">
    {$content}
HTML;

        } else {
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