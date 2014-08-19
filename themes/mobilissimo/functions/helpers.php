<?php 

/**
*
* === Helper Functions ===
*
* In this file you'll find functions, which are usually used
* to display not important things like formatted text, formatted
* webapp settings or custom title.
*
**/




/**
*
* === Formated Title ===
* 
* Formating title output function with custom separator and formatting, that depends on
* wordpress viewed page, default to Name + Description
*
* @call get_formatted_title() [header.php]
* @return string [echo Formated title, depends on the viewed page]
*
**/

if(!function_exists('get_formatted_title')){
	function get_formatted_title() {

		/* Used variables */
		$title_separator = get_option( 'now_titleseparator' ) ? get_option( 'now_titleseparator' ) : '|';
		$output = '';


		/* Page related formatting */
	    if (is_tag()) {
	        $output .= single_tag_title(__('Tag Archive for', 'now') . ' &quot;', false) . '&quot; ' . $title_separator . ' ';
	    } elseif (is_archive()) {
	        $output .= wp_title('', false) . ' ' . __('Archive', 'now') . ' ' . $title_separator . ' ';
	    } elseif (is_search()) {
	        $output .= ' ' . __('Search for', 'now') . ' &quot;' . esc_html($s) . '&quot; ' . $title_separator . ' ';
	    } elseif (!(is_404()) && (is_single()) || (is_page())) {
	        $output .= wp_title('', false) . ' ' . $title_separator . ' ';
	    } elseif (is_404()) {
	        $output .= ' ' . __('Not Found', 'now') . ' ' . $title_separator . ' ';
	    }


		/* If home - prints description */
	    if (is_home()) {
	        $output .= get_bloginfo('name') . ' ' . $title_separator . ' ' . get_bloginfo('description');
	    } else {
	        $output .= get_bloginfo('name');
	    }


	    /* Paged sites */
	    if (isset($paged)) {
	    	if ($paged > 1) {
		        $output .= ' ' . $title_separator . ' ' . __('page', 'now') . ' ' . $paged;
		    }
	    }

		echo <<<HTML
<title>{$output}</title>
HTML;

	}
}




/**
*
* === Meta Tags ===
* 
* Displays custom content for meta description tag
* 
* @call get_theme_metadata() [header.php]
* @return string [bundle of meta tags, filled with content from theme options]
*
**/

if(!function_exists('get_theme_metadata')){
	function get_theme_metadata(){

		/* Used variables */
		$description = ""; $author = ""; $keywords = "";
		$title_separator = get_option( 'now_titleseparator' ) ? get_option( 'now_titleseparator' ) : '|';

		/* Description */
		if ( is_single() ) {
	        $description = single_post_title('', false); 
	    } else {
	        $description = home_url() . " " . $title_separator . " " . get_bloginfo('display', 'description');
	    }

		/* Author */
	    $author = get_option('now_seo_author');

	    /* Keywords */
	    $keywords = get_option('now_seo_keywords');
	    
	    /* Output */
		echo <<<HTML
<meta name="description" content="{$description}">
<meta name="keywords" content="{$keywords}">
<meta name="author" content="{$author}">
HTML;
	    
	}
}




/**
* 
* === Mobile WebApp Data ===
* 
* This function prints iphone and ipad webapp splash screens and icons 
* in meta tags into theme header
*
* @call get_webappdata() [header.php]
* @return string [echo formated meta tags with theirs image paths]
* 
**/

if(!function_exists('get_webappdata')){
	function get_webappdata(){ 

		/* Mobile metadata */
		echo <<<HTML
<meta name="viewport" content="width=device-width" />
<meta name="apple-mobile-web-app-capable" content="yes">
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">
<meta name="apple-mobile-web-app-status-bar-style" content="black" />
HTML;
		

		if(get_option( 'now_appleicon_enable', 'false' ) == 'true'){

			/* Icon variables */
			$apple_icon_57 = get_option('now_appleicon_57');
			$apple_icon_72 = get_option('now_appleicon_72');
			$apple_icon_76 = get_option('now_appleicon_76');
			$apple_icon_114 = get_option('now_appleicon_114');
			$apple_icon_120 = get_option('now_appleicon_120');
			$apple_icon_144 = get_option('now_appleicon_144');
			$apple_icon_152 = get_option('now_appleicon_152');

			/* iOS WebApp icons */
			echo <<<HTML
<link rel="apple-touch-icon-precomposed" href="{$apple_icon_57}" sizes="57x57">
<link rel="apple-touch-icon-precomposed" href="{$apple_icon_72}" sizes="72x72">
<link rel="apple-touch-icon-precomposed" href="{$apple_icon_76}" sizes="76x76">
<link rel="apple-touch-icon-precomposed" href="{$apple_icon_114}" sizes="114x114">
<link rel="apple-touch-icon-precomposed" href="{$apple_icon_120}" sizes="120x120">
<link rel="apple-touch-icon-precomposed" href="{$apple_icon_144}" sizes="144x144">
<link rel="apple-touch-icon-precomposed" href="{$apple_icon_152}" sizes="152x152">
HTML;

		}


		/* If Splashscreens are enabled */
		if(get_option( 'now_applesplash_enable', 'false' ) == 'true'){

			/* Splash screens variables */
			$iphone_splash_460 = get_option('now_applesplash_iphone_460');
			$iphone_splash_940 = get_option('now_applesplash_iphone_940');
			$iphone_splash_1096 = get_option('now_applesplash_iphone_1096');
			$ipad_splash_1004 = get_option('now_applesplash_ipad_1004');
			$ipad_splash_748 = get_option('now_applesplash_ipad_748');
			$ipad_splash_2008 = get_option('now_applesplash_ipad_2008');
			$ipad_splash_1496 = get_option('now_applesplash_ipad_1496');

			/* iOS WebApp splash screens */
			echo <<<HTML
<link href="{$iphone_splash_460}" media="(device-width: 320px)" rel="apple-touch-startup-image">
<link href="{$iphone_splash_940}" media="(device-width: 320px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image">
<link href="{$iphone_splash_1096}" rel="apple-touch-startup-image" media="(device-height: 568px)">
<link href="{$ipad_splash_1004}" media="(device-width: 768px) and (orientation: portrait)" rel="apple-touch-startup-image">
<link href="{$ipad_splash_748}" media="(device-width: 768px) and (orientation: landscape)" rel="apple-touch-startup-image">
<link href="{$ipad_splash_2008}" media="(device-width: 1536px) and (orientation: portrait) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image">
<link href="{$ipad_splash_1496}" media="(device-width: 1536px)  and (orientation: landscape) and (-webkit-device-pixel-ratio: 2)"media="(device-width: 1536px)  and (orientation: landscape) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image">
HTML;

		}
	}
}




/**
*
* === Get Theme FavIcon ===
* 
* Return favicon, uploade in theme options, in case there's no favicon,
* function returns empty string
*
* @call get_favicon() [header.php]
* @return string [meta tag with favicon url]
* 
**/

if(!function_exists('get_favicon')){
	function get_favicon(){	

		/* Get faviocn url from theme options */
		$favicon = get_option('now_favicon');

		/* Echo favicon link tag */
		echo <<<HTML
<link href="{$favicon}" rel="icon" type="image/x-icon" />
HTML;

	}
}




/**
*
* === Get Theme Headline ===
* 
* Return string with h1 tag or img, along with it's content
*
* @call get_theme_headline() [toolbar.php]
* @return string [h1 or img tag]
* 
**/

if(!function_exists('get_theme_headline')){
	function get_theme_headline(){	

		/* Used Variables */
		$homeurl = home_url();
		$img = get_option('now_logo');
		$heading = get_bloginfo('name');


		if($img){
			/* IMG Logo */
			echo <<<HTML
<p id="image-logo"><a href="{$homeurl}"><img src="{$img}" alt="{$heading}"></a></p>
HTML;
		}else{
			/* Echo h1 */
			echo <<<HTML
<h1><a href="{$homeurl}">{$heading}</a></h1>
HTML;
		}
	}
}




/**
*
* === Google Maps API ===
* 
* Return script tag with an url and API saved in
* Theme Options
*
* @call get_googlemaps() [footer.php]
* @return string [<script> with an URL and user's API key]
* 
**/

if(!function_exists('get_googlemaps')){
	function get_googlemaps(){

		/* API key */
		$api_key = get_option( 'now_googlemaps_api' );

		if($api_key && is_page_template('page-contact.php')){
			echo "<script type=\"text/javascript\" src=\"https://maps.googleapis.com/maps/api/js?key={$api_key}&sensor=false\"></script>";
		
			?>
<script>
if( document.getElementById('map-container-api') != null){

    google.maps.visualRefresh = true;

    /* Set Latitude and longitude for your google maps center and marker */

    var mapLatitude = <?php if(get_option('now_googlemaps_lat')) echo get_option('now_googlemaps_lat'); else echo '37.8017993'; ?>;
    var maplongitude = <?php if(get_option('now_googlemaps_long')) echo get_option('now_googlemaps_long'); else echo '-122.4768507'; ?>;

    var map;
    var mapContainer = document.getElementById('map-container-api');
    var mapMarker = new google.maps.LatLng(mapLatitude, maplongitude);

    function initialize() {
        var mapOptions = {
            zoom: 13,
            center: new google.maps.LatLng(mapLatitude, maplongitude),
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            disableDefaultUI: true,
        };

        map = new google.maps.Map(mapContainer, mapOptions);

        var marker = new google.maps.Marker({
            position: mapMarker,
            animation: google.maps.Animation.DROP,
            map: map,
            flat: true,
            tite: 'Restart Inc.'
        });
    }

    google.maps.event.addDomListener(window, 'load', initialize);

}
</script>
			<?php
		}
	}
}




/**
*
* === Google Analytics Script ===
* 
* Uses optimized google asynchronous analytics code that you can find at
* mathiasbynens.be/notes/async-analytics-snippet
*
* @call get_googleanalytics() [footer.php]
* @return string [script filled with your analytics UA-X code]
* 
**/

if(!function_exists('get_googleanalytics')){
	function get_googleanalytics(){

		/* API key */
		$api_key = get_option( 'now_googleanalytics_api' );

		if($api_key){
			echo <<<HTML
<script>
    var _gaq=[['_setAccount','{$api_key}'],['_trackPageview']];
    (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
    g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
    s.parentNode.insertBefore(g,s)}(document,'script'));
</script>
HTML;
		}
	}
}




/**
*
* === Blog list load animation ===
* 
* Choose from different animation for blog posts loading
*
* @call get_load_animation() [index.php]
* @return string [name of the loading animation]
* 
**/

if(!function_exists('get_load_animation')){
	function get_load_animation(){
		$animation = get_option('now_loading_animation') ? get_option('now_loading_animation') : 'Scale up';
		$animation = strtolower($animation);
		$animation = str_replace(' ', '-', $animation);
		echo $animation;
	}
}




/**
*
* === Get Blog Share Links ===
* 
* Format links to socil networks and displays them at the bottom of the post.
*
* @call get_blog_share() [single.php]
* @return string [HTML of links to share current post]
* 
**/

if(!function_exists('get_blog_share')){
	function get_blog_share(){

		/* Variables */
		$twitter = ''; $google = ''; $facebook = ''; $summary = '';

		/* Post Data */
		$title = get_the_title();
		$url = get_permalink();
		/* Get Blog Image URL */
		preg_match('#src="([^"]+)"#', get_the_post_thumbnail(null, 'featured-blog'), $matches);
		if(isset($matches[1]))
			$img = $matches[1];
		else 
			$img = "";
		$site_name = get_bloginfo('name');

		/* Encode for use in URL */
		if (get_option('now_blogshare_desc')) {
			$summary = str_replace(array("%site_name%", "%url%", "%title%"), array($site_name, $url, $title), get_option('now_blogshare_desc'));
			$summary = urlencode($summary);
		} else {
			$summary = urlencode("{$title} on {$url} via #{$site_name}");
		}
		
		$title = urlencode(get_the_title());
		$site_name = urlencode(get_bloginfo('name'));

		/* Variables */


		/* Twitter */
		if (get_option( 'now_blogshare_twitter', 'true' ) == 'true') {
			$twitter = "<a class=\"icon-twitter\" target=\"_blank\" href=\"http://twitter.com/home?status={$summary}\"></a>";
		}


		/* Facebook */
		if (get_option( 'now_blogshare_facebook', 'true' ) == 'true') {
			$facebook = "<a class=\"icon-facebook\" target=\"_blank\" href=\"http://www.facebook.com/sharer/sharer.php?s=100&p[url]={$url}&p[images][0]={$img}&p[title]={$title}&p[summary]={$summary}\"></a>";
		}


		/* Google */
		if (get_option( 'now_blogshare_google', 'true' ) == 'true') {
			$google = "<a class=\"icon-google\" target=\"_blank\" href=\"https://plus.google.com/share?url={$url}\"></a>";
		}
		

		/* Display share widget if any of these networks are enabled */
		if($google || $twitter || $facebook){
			echo <<<HTML
<hr>

<p class="text-center share-widget">
    {$twitter}
    {$facebook}
    {$google}
</p>
HTML;
		}
	}
}




/**
* 
* === Site Custom Scripts/Styles ===
* 
* Returns formatted theme options custom code inregrations.
* Also prints styles needed for theme options in appearance section
* 
* @call get_code_integration() [header.php]
* @return string [formated ouput with allowed code integrations] 
* 
**/

if(!function_exists('get_code_integration')){
	function get_code_integration(){

		/* Used Variables */
		$output = '';
		
		/* Custom CSS */
		if((get_option('now_codeintegration_css', 'false') == 'true') && (get_option('now_code_css'))){
			$output .= '<style type="text/css">';
			$output .= get_option('now_code_css');
			$output .= '</style>';
		}
		
		/* Custom Child CSS */
		if((get_option('now_codeintegration_childcss', 'false') == 'true') && (get_option('now_code_childcss'))){
			$output .= '<link rel="stylesheet" href="' . get_option('now_code_childcss') . '" />';
		}
		
		/* Custom Javascript */
		if((get_option('now_codeintegration_js', 'false') == 'true') && (get_option('now_code_js'))){
			$output .= '<script type="text/javascript">' . stripslashes(get_option('now_code_js')) . '</script>';
		}
		
		echo $output;
	}
}




/**
*
* === Get First Video Link (Video Post Format)
* 
* Returns first video url(vimeo or youtube) from post content, 
* ready to use for iframe tag, sed in wordpress loop
*
* @call get_postvideo_link() [inside post loop]
* @return array [containing video network, id, full url]
* 
*/

if(!function_exists('get_postvideo_link')){
	function get_postvideo_link() {
	    global $post, $posts;
	
	    $video = "";
	    $post_content = $post->post_content;
	    $post_content = explode("\"", $post_content);

	    $output = array(
	    	'id' => '', 
	    	'type' => 'youtube', 
	    	'url' => '', 
	    );

	    foreach ($post_content as $word) {
	        if (preg_match('/youtube\.com\/(v\/|watch\?v=)([\w\-]+)/', $word) || preg_match('#(http://youtu.be/)([-|~_0-9A-Za-z]+)#i', $word)) {
	            $video = "";

	            if($default)
			    	echo $word;
	
	            if (preg_match('#(http://youtu.be/)([-|~_0-9A-Za-z]+)#i', $word, $matches)) {
	                $embedUrl = $matches[2];
	                $embedUrl = strip_tags($embedUrl);

		            $output['url'] = 'http://youtu.be/' . $matches[2];
	            } else {
	                $parsedUrl = parse_url($word);
	                $embed = $parsedUrl['query'];
	                parse_str($embed, $out);
	                $embedUrl = $out['v'];
	                $embedUrl = strip_tags($embedUrl);
	                preg_match('$([-|~_0-9A-Za-z]+){0,}$', $embedUrl, $matches);
	                $embedUrl = $matches[0];

		            $output['url'] = $word;
	            }
	            $video = 'http://www.youtube.com/embed/' . $embedUrl;

	            $output['id'] = $video;
	            $output['type'] = 'youtube';

	            return $output;

	        } elseif (preg_match('#(http://vimeo.com)/([0-9]+)#i', $word)) {
	            preg_match('#(http://vimeo.com)/([0-9]+)#i', $word, $output);
	            $video = 'http://player.vimeo.com/video/' . $output[2];

	            $output['id'] = $video;
	            $output['type'] = 'vimeo';
	            $output['url'] = $output[1] . "/" . $output[2];

	            return $output;

	        } elseif (preg_match('#(https://vimeo.com)/([0-9]+)#i', $word)) {
	            preg_match('#(https://vimeo.com)/([0-9]+)#i', $word, $output);
	            $video = 'https://player.vimeo.com/video/' . $output[2];

	            $output['id'] = $video;
	            $output['type'] = 'vimeo';
	            $output['url'] = $output[1] . "/" . $output[2];
	            
	            return $output;

	        } elseif (preg_match('#(vimeo.com)/([0-9]+)#i', $word)) {
	            preg_match('#(vimeo.com)/([0-9]+)#i', $word, $output);
	            $video = 'http://player.vimeo.com/video/' . $output[2];

	            $output['id'] = $video;
	            $output['type'] = 'vimeo';
	            $output['url'] = $output[1] . "/" . $output[2];
	            
	            return $output;
	        }
	    }
	}	
}




/**
*
* === Gallery Formatter ===
* 
* Extracts Gallery Shortcode from the content and rewrites it's attributes.
* The prints simple list of a>img tags to create a gallery in gallery page template
* 
* @call get_theme_gallery() [gallery templates]
* @param  string $size [size of the images, image sizes generated add_image_size function]
* @return string 	   [list of a>img tags with links to gallery images]
*
**/

if(!function_exists('get_theme_gallery')){
	function get_theme_gallery($size = 'gallery-big'){

		/* Get the page content and extracts [gallery shortcode] */
        $content = get_the_content('');
	    $pattern = "#\[gallery [0-9a-zA-Z=\"\,-_ ]*\]#";

	    if (preg_match($pattern, $content, $matches)) {

	        /* Gallery Shortcode */
	        $gallery_shortcode = $matches[0];


	        /* Add correct thumbnail size before generating shortcode */
	        if (preg_match("#size=\"[a-z]*\"#", $gallery_shortcode, $matches)) {
	            $gallery_shortcode = str_replace($matches[0], '', $gallery_shortcode);
	            echo $gallery_shortcode;
	        }
	        
	        $gallery_shortcode = str_replace(']', " size=\"{$size}\"]", $gallery_shortcode);


	        /* Add correct link attribute (none) */
	        if (preg_match("#link=\"[a-z]*\"#", $gallery_shortcode, $matches)) {
	            $gallery_shortcode = str_replace($matches[0], '', $gallery_shortcode);
	        }
	        
	        $gallery_shortcode = str_replace(']', ' link="file"]', $gallery_shortcode);


	        /* Generate Gallery Shortcode and prepare for output */
	        $gallery = do_shortcode($gallery_shortcode);
	        $gallery = strip_html_tags($gallery, '<img><a>');

	        echo $gallery;
	    }
	}
}




/**
*
* === Custom Comments Format ===
* 
* Custom comment format used in wp_list_comments function. Using this wordpress recommended
* syntax these comments can be overriden by any of your custom or downloaded plugins. It
* also provides multi-depth comment functionallity.
* 
* @call get_theme_gallery() [comments.php in wp_list_comments('callback' => '')]
* @param  [strind] $comment [Comment ID]
* @param  [array]  $args    [Array of optional arguments]
* @param  [int]    $depth   [Number of current comment nesting depth]
* @return [HTML]            [Formatted HTML output of comments]
*
**/

if(!function_exists('now_comment')){
	function now_comment($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment;
		$def_img = get_stylesheet_directory_uri() . '/img/avatar_default.png';
		$date_format = get_option('now_comment_dateformat') ? get_option('now_comment_dateformat') : 'M, j Y';

		/* Checks if user is admin */
		$admin = '';
		$admin_comments_names = explode(',', get_option('now_comment_admin'));
		
		foreach ($admin_comments_names as $user) {
			if(get_comment_author() == $user){
				$admin = 'mark-text red';
			}
		}

		?>
		<li id="comment-<?php comment_ID() ?>" <?php echo comment_class(); ?>>
			<?php echo get_avatar( $comment, '120', $def_img, get_comment_author() ); ?>
            <div class="comments-content-container">
                <div class="comments-content">
                    <p class="comments-meta">
                        <span class="comments-meta-name <?php echo $admin; ?>"><?php echo get_comment_author_link(); ?></span> on <?php comment_date($date_format); ?>
                    </p>

                    <?php if ($comment->comment_approved == '0') : ?>
						<em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.', 'now'); ?></em>
						<br />
					<?php endif; ?>

                    <?php comment_text(); ?>
                    
                    
                	<?php

                	$args['before'] = '<p class="read-more">';
                	$args['after'] = '</p>';

                	comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) 

                	?>
                    
                </div>
            </div>
		<?php
	}
}

?>