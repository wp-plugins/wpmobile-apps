<?php 


$all_pages = get_pages();
$page_list = array();

foreach ($all_pages as $page) {
	$page_title = get_page($page->ID);
	$page_list[] = $page_title->post_title;
}

$options = array(

	/**
	*
	* General Settings
	*
	**/
	
	array(
		"type"     => "section",
		"icon"     => "acera-icon-home",
		"title"    => "General Settings",
		"id"       => "general",
		"expanded" => "true"
	),	




	/**
	*
	* General
	*
	**/

	array(
		"section" => "general",
		"type"    => "heading",
		"title"   => "General",
		"id"      => "general-visual"
	),

	array(
		"under_section" => "general-visual",
		"type"          => "text",
		"name"          => "Title separator",
		"id"            => "now_titleseparator",
		"desc"          => "Type a separator to be used in titles (eg. '-' => Home - Page Name )",
		"default"       => ""
	),

	array(
		"under_section" => "general-visual",
		"type"          => "text",
		"name"          => "<strong>Google analytics</strong>",
		"placeholder"   => "UA-XXXXX-X",
		"id"            => "now_googleanalytics_api",
		"desc"          => "Paste here your google analytics <code>UA-XXXXX-X</code> code that you can find on your Google Analytics Profile."
	),

	array(
		"under_section" => "general-visual",
		"type"          => "checkbox",
		"name"          => "Disable touch gestures",
		"id"            => array("now_touchgestures"),
		"options"       => array("Disable"),
		"desc"          => "Checking this option will disable swipe gestures for opening sidebar.",
		"default"       => array("not")
	),

	array(
		"under_section" => "general-visual",
		"type"          => "checkbox",
		"name"          => "Enable fixed header",
		"id"            => array("now_fixed_header"),
		"options"       => array("Enable"),
		"desc"          => "Header will stay fixed on top while scrolling",
		"default"       => array("not")
	),

	array(
		"under_section" => "general-visual",
		"type"          => "checkbox",
		"name"          => "Enable Search",
		"id"            => array("now_search_form"),
		"options"       => array("Enable"),
		"desc"          => "This will show search icon in the top right corner + enable search form functionality on index and blog page.",
		"default"       => array("not")
	),

	array(
		"under_section" => "general-visual",
		"type"          => "checkbox",
		"name"          => "Enable Comments on Pages",
		"options"       => array("Enable"),
		"id"            => array("now_comments_page"),
		"default"       => array("not"),
		"desc"          => "Check if you want to enable comments on regular pages"
	),

	array(
		"under_section" => "general-visual",
		"type"          => "small_heading",
		"title"         => "Theme images",
	),

	array(
		"under_section" => "general-visual",
		"type"          => "image",
		"placeholder"   => "http://example.com/logo.png",
		"name"          => "Image Logo",
		"id"            => "now_logo",
		"desc"          => "Paste the an URL to your logo, or upload an image here. (Height of <code>96px</code> and Max-width of <code>640px</code>)",
		"default"       => ""
	),

	array(
		"under_section" => "general-visual",
		"type"          => "image",
		"placeholder"   => "http://example.com/favicon.png",
		"name"          => "Favicon",
		"id"            => "now_favicon",
		"desc"          => "Paste the an url or upload an image with resolution of <code>32x32</code>",
		"default"       => ""
	),




	/**
	*
	* iOS Webapp Settings
	*
	**/

	array(
	    "type"    => "heading",
	    "section" => "general",
	    "id"      => "general-webapp",
	    "title"   => "Webapp Meta Data",
	),

	array(
		"under_section" => "general-webapp",
		"type"          => "small_heading",
		"title"         => "Icons",
	),

	array(
	    "type"                => "checkbox",
	    "under_section"       => "general-webapp",
	    "id"                  => array("now_appleicon_enable"),
	    "name"                => "Enable Webapp icons",
	    "options"             => array("Enable"),
	    "desc"                => "Enabling this will reveal options for icons image uploads.",
	    "img_desc"            => "",
	    "display_checkbox_id" => "",
	    "default"             => array("not")
	),

	array(
	    "type"                => "toggle_div_start",
	    "under_section"       => "general-webapp",
	    "display_checkbox_id" => "now_appleicon_enable",
	),

	array(
	    "type"                => "image",
	    "under_section"       => "general-webapp",
	    "id"                  => "now_appleicon_57",
	    "name"                => "Icon <strong>57x57</strong>",
	    "desc"                => "Upload or paste an url of an image with resolution of <code>57x57px</code>",
	    "placeholder"         => "http://",
	    "display_checkbox_id" => "",
	    "default"             => ""
	),

	array(
	    "type"                => "image",
	    "under_section"       => "general-webapp",
	    "id"                  => "now_appleicon_72",
	    "name"                => "Icon <strong>72x72</strong>",
	    "desc"                => "Upload or paste an url of an image with resolution of <code>72x72px</code>",
	    "placeholder"         => "http://",
	    "display_checkbox_id" => "",
	    "default"             => ""
	),

	array(
	    "type"                => "image",
	    "under_section"       => "general-webapp",
	    "id"                  => "now_appleicon_76",
	    "name"                => "Icon <strong>76x76</strong>",
	    "desc"                => "Upload or paste an url of an image with resolution of <code>76x76px</code>",
	    "placeholder"         => "http://",
	    "display_checkbox_id" => "",
	    "default"             => ""
	),

	array(
	    "type"                => "image",
	    "under_section"       => "general-webapp",
	    "id"                  => "now_appleicon_114",
	    "name"                => "Icon <strong>114x114</strong>",
	    "desc"                => "Upload or paste an url of an image with resolution of <code>114x114px</code>",
	    "placeholder"         => "http://",
	    "display_checkbox_id" => "",
	    "default"             => ""
	),

	array(
	    "type"                => "image",
	    "under_section"       => "general-webapp",
	    "id"                  => "now_appleicon_120",
	    "name"                => "Icon <strong>120x120</strong>",
	    "desc"                => "Upload or paste an url of an image with resolution of <code>120x120px</code>",
	    "placeholder"         => "http://",
	    "display_checkbox_id" => "",
	    "default"             => ""
	),

	array(
	    "type"                => "image",
	    "under_section"       => "general-webapp",
	    "id"                  => "now_appleicon_144",
	    "name"                => "Icon <strong>144x144</strong>",
	    "desc"                => "Upload or paste an url of an image with resolution of <code>144x144px</code>",
	    "placeholder"         => "http://",
	    "display_checkbox_id" => "",
	    "default"             => ""
	),

	array(
	    "type"                => "image",
	    "under_section"       => "general-webapp",
	    "id"                  => "now_appleicon_152",
	    "name"                => "Icon <strong>152x152</strong>",
	    "desc"                => "Upload or paste an url of an image with resolution of <code>152x152px</code>",
	    "placeholder"         => "http://",
	    "display_checkbox_id" => "",
	    "default"             => ""
	),

	array(
	    "type"          => "toggle_div_end",
	    "under_section" => "general-webapp",
	),

	array(
		"under_section" => "general-webapp",
		"type"          => "small_heading",
		"title"         => "Splash Screens",
	),

	array(
	    "type"                => "checkbox",
	    "under_section"       => "general-webapp",
	    "id"                  => array("now_applesplash_enable"),
	    "name"                => "Enable Splash Screens",
	    "options"             => array("Enable"),
	    "desc"                => "Enabling this will reveal options for spashscreens image uploads.",
	    "img_desc"            => "",
	    "display_checkbox_id" => "",
	    "default"             => array("not")
	),

	array(
	    "type"                => "toggle_div_start",
	    "under_section"       => "general-webapp",
	    "display_checkbox_id" => "now_applesplash_enable",
	),

	array(
	    "type"                => "image",
	    "under_section"       => "general-webapp",
	    "id"                  => "now_applesplash_iphone_460",
	    "name"                => "Splashcreen <strong>320x460</strong>",
	    "desc"                => "Upload or paste an url of an image with resolution of <code>320x460px</code>",
	    "placeholder"         => "http://",
	    "display_checkbox_id" => "",
	    "default"             => ""
	),

	array(
	    "type"                => "image",
	    "under_section"       => "general-webapp",
	    "id"                  => "now_applesplash_iphone_940",
	    "name"                => "Splashcreen <strong>640x920</strong>",
	    "desc"                => "Upload or paste url of image with resolution of <code>640x920px</code>",
	    "placeholder"         => "http://",
	    "display_checkbox_id" => "",
	    "default"             => ""
	),

	array(
	    "type"                => "image",
	    "under_section"       => "general-webapp",
	    "id"                  => "now_applesplash_iphone_1096",
	    "name"                => "Splashcreen <strong>640x1096</strong>",
	    "desc"                => "Upload or paste an url of an image with resolution <code>640x1096px</code>",
	    "placeholder"         => "http://",
	    "display_checkbox_id" => "",
	    "default"             => ""
	),

	array(
	    "type"                => "image",
	    "under_section"       => "general-webapp",
	    "id"                  => "now_applesplash_ipad_748",
	    "name"                => "Splashcreen <strong>1024x748</strong>",
	    "desc"                => "Upload or paste an url of an image with resolution of <code>1024x748px</code>",
	    "placeholder"         => "http://",
	    "display_checkbox_id" => "",
	    "default"             => ""
	),

	array(
	    "type"                => "image",
	    "under_section"       => "general-webapp",
	    "id"                  => "now_applesplash_ipad_1004",
	    "name"                => "Splashcreen <strong>768x1004</strong>",
	    "desc"                => "Upload or paste an url of an image with resolution of <code>768x1004px</code>",
	    "placeholder"         => "http://",
	    "display_checkbox_id" => "",
	    "default"             => ""
	),

	array(
	    "type"                => "image",
	    "under_section"       => "general-webapp",
	    "id"                  => "now_applesplash_ipad_1496",
	    "name"                => "Splashcreen <strong>2048x1496</strong>",
	    "desc"                => "Upload or paste an url of an image with resolution of <code>2048x1496px</code>",
	    "placeholder"         => "http://",
	    "display_checkbox_id" => "",
	    "default"             => ""
	),

	array(
	    "type"                => "image",
	    "under_section"       => "general-webapp",
	    "id"                  => "now_applesplash_ipad_2008",
	    "name"                => "Splashcreen <strong>1536x2008</strong>",
	    "desc"                => "Upload or paste an url of an image resolution of <code>1536x2008px</code>",
	    "placeholder"         => "http://",
	    "display_checkbox_id" => "",
	    "default"             => ""
	),

	array(
	    "type"          => "toggle_div_end",
	    "under_section" => "general-webapp",
	),




	/**
	*
	* SEO
	*
	**/
	
	array(
	    "type"    => "heading",
	    "section" => "general",
	    "id"      => "general-seo",
	    "title"   => "SEO",
	),

	array(
	    "type"                => "textarea",
	    "under_section"       => "general-seo",
	    "id"                  => "now_seo_keywords",
	    "name"                => "Keywords",
	    "desc"                => "Keywords used in <code>keywords meta tag</code> in the head, use simple keywords separated with comma.",
	    "placeholder"         => "mobile, design, flat",
	    "img_desc"            => "",
	    "display_checkbox_id" => "",
	    "default"             => ""
	),
	
	array(
	    "type"                => "text",
	    "under_section"       => "general-seo",
	    "id"                  => "now_seo_author",
	    "name"                => "Author",
	    "desc"                => "Author name used in <code>author meta tag</code>.",
	    "placeholder"         => "John Doe",
	    "img_desc"            => "",
	    "display_checkbox_id" => "",
	    "default"             => ""
	),




	/**
	*
	* Code Integration
	*
	**/
	
	array(
		"section" => "general",
		"type"    => "heading",
		"title"   => "Code integrations",
		"id"      => "general-general"
	),

	array(
		"under_section" => "general-general",
		"type"          => "checkbox",
		"name"          => "<strong>Allow these integrations</strong>",
		"id"            => array("now_codeintegration_css", "now_codeintegration_childcss", "now_codeintegration_js"),
		"options"       => array("Custom css", "Child Stylesheet", "Custom Javascript"),
		"desc"          => "Choose which code integrations (below) you want to use.",
		"default"       => array("not", "not", "not", "not")
	),

	array(
		"under_section"       => "general-general",
		"type"                => "textarea",
		"name"                => "Custom css",
		"display_checkbox_id" => "now_codeintegration_css",
		"placeholder"         => "h1 { color: white; }",
		"id"                  => "now_code_css",
		"desc"                => "Write here your custom css.",
	),

	array(
		"under_section"       => "general-general",
		"type"                => "text",
		"display_checkbox_id" => "now_codeintegration_childcss",
		"name"                => "Child stylesheet",
		"id"                  => "now_code_childcss",
		"desc"                => "Enter the URL of a child stylesheet to display.",
		"placeholder"         => "http://www.stylesheet.com/stylesheet.css"
	),

	array(
		"under_section"       => "general-general",
		"type"                => "textarea",
		"display_checkbox_id" => "now_codeintegration_js",
		"name"                => "Custom JavaScript",
		"id"                  => "now_code_js",
		"desc"                => "Type custom javascript.",
		"placeholder"         => "var test;"
	),


	

	/**
	*
	* Layout Settings
	*
	**/
	
	array(
		"type"     => "section",
		"icon"     => "acera-icon-window",
		"title"    => "Layout Settings",
		"id"       => "layout",
		"expanded" => "true"
	),




	/**
	*
	* Sidebar Settings
	*
	**/

	array(
		"section" => "layout",
		"type"    => "heading",
		"title"   => "Custom Home Page",
		"id"      => "layout-homepage"
	),

	array(
	    "type" => "select",
		"under_section" => "layout-homepage",
	    "id"      => "now_custom_homepage_id",
	    "name"    => "Select homepage",
	    "options" => $page_list,
	    "desc"    => "Choose which page you want to show as Homepage. This feature should be only use if you're using this theme along with your desktop theme using theme switcher and you want to enable different
	    homepage for the mobile theme. After choosing your new homepage, go to your theme's folder using FTP and rename <strong>_front-page.php</strong> file to <strong>front-page.php</strong>.",
	),


	

	/**
	*
	* Sidebar Settings
	*
	**/

	array(
		"section" => "layout",
		"type"    => "heading",
		"title"   => "Sidebar Page",
		"id"      => "layout-sidebar"
	),

	array(
		"under_section" => "layout-sidebar",
		"type"          => "checkbox",
		"name"          => "Show contact information",
		"options"       => array("Show"),
		"id"            => array("now_contact_enable"),
		"default"       => array("not"),
		"desc"          => "Enabling this will show contact information in <code>theme's sidebar</code>, above main navigation."
	),

	array(
		"under_section" => "layout-sidebar",
		"type"          => "image",
		"name"          => "Picture",
		"id"            => "now_contact_photo",
		"desc"          => "Contact picture used in <code>theme's sidebar</code>."
	),

	array(
		"under_section" => "layout-sidebar",
		"type"          => "text",
		"name"          => "Name",
		"id"            => "now_contact_name",
		"desc"          => "Contact Name showed in <code>theme's sidebar</code>."
	),

	array(
		"under_section" => "layout-sidebar",
		"type"          => "text",
		"name"          => "E-mail",
		"id"            => "now_contact_mail",
		"desc"          => "Contact e-mail showd in <code>theme's sidebar</code>, below it's name."
	),




	/**
	*
	* Blog
	*
	**/
	
	array(
		"section" => "layout",
		"type"    => "heading",
		"title"   => "Blog Page",
		"id"      => "layout-blog"
	),
	
	array(
		"under_section" => "layout-blog",
		"type"          => "small_heading",
		"title"         => "Blog General Settings",
	),

	array(
	    "type" => "select",
		"under_section" => "layout-blog",
	    "id"      => "now_loading_animation",
	    "name"    => "Loading animation",
	    "options" => array("Opacity", "Scale up", "Scale down", "Rotate up Left", "Rotate down Left", "Rotate up Right", "Rotate down Right", "Slide from left", "Slide from right", "Slide up", "Slide down", ),
	    "desc"    => "Choose which loading animatino for new posts you want to show on homepage or blog page tempalte.",
	    "default" => "Scale up"
	),
	
	array(
		"under_section" => "layout-blog",
		"type"          => "text",
		"name"          => "Blog Date Format",
		"id"            => "now_blog_dateformat",
		"desc"          => "Define your custom date format to display in blog posts.<br />See <a href=\"http://codex.wordpress.org/Formatting_Date_and_Time\">Formatting Date and Time</a>",
		"placeholder"   => "M, j Y",
	),
	
	array(
		"under_section" => "layout-blog",
		"type"          => "text",
		"name"          => "Category Separator",
		"id"            => "now_blog_categorysep",
		"desc"          => "Define your custom category separator (Default: ,)",
		"placeholder"   => " ,",
	),

	array(
		"under_section" => "layout-blog",
		"type"          => "text",
		"name"          => "Posts per Page",
		"id"            => "now_blog_posts",
		"desc"          => "Set number of posts per page on blog page template (min 1)",
	),
	
	array(
		"under_section" => "layout-blog",
		"type"          => "small_heading",
		"title"         => "Blog Share Icons",
	),

	array(
		"under_section" => "layout-blog",
		"type"          => "checkbox",
		"name"          => "Share Social networks",
		"options"       => array("Twitter", "Facebook", "Google+"),
		"id"            => array("now_blogshare_twitter", "now_blogshare_facebook", "now_blogshare_google"),
		"default"       => array("checked", "checked", "checked"),
		"desc"          => "Enable which social network links you want to show at the bottom of each post."
	),

	array(
	    "type"          => "textarea",
	    "under_section" => "layout-blog",
	    "id"            => "now_blogshare_desc",
	    "name"          => "Custom description",
	    "desc"          => "Custom description used in twitter and facebook share links. You can use these placeholders - <code>%site_name%</code>, <code>%url%</code>, <code>%title%</code>",
	    "placeholder"   => "%title% on %url% via #%site_name%",
	),
	
	array(
		"under_section" => "layout-blog",
		"type"          => "small_heading",
		"title"         => "Blog Comments",
	),

	array(
		"under_section" => "layout-blog",
		"type"          => "checkbox",
		"name"          => "Hide Blog Comments",
		"options"       => array("Hide"),
		"id"            => array("now_comments_disable"),
		"default"       => array("not"),
		"desc"          => "Checking this you will disable blog comments on this mobile theme"
	),
	
	array(
		"under_section" => "layout-blog",
		"type"          => "text",
		"name"          => "Comments Date Format",
		"id"            => "now_comment_dateformat",
		"desc"          => "Define your custom date format to display in comments.<br />See <a href=\"http://codex.wordpress.org/Formatting_Date_and_Time\">Formatting Date and Time</a>",
		"placeholder"   => "M, j Y",
	),
	
	array(
		"under_section" => "layout-blog",
		"type"          => "text",
		"name"          => "Admin Comment Hightlight",
		"id"            => "now_comment_admin",
		"desc"          => "If you want to highligh admin names, please write here your admin's names separated with comma.",
		"placeholder"   => "admin,Admin,John Doe,User",
	),




	/**
	*
	* Contact
	*
	**/
	
	array(
		"section" => "layout",
		"type"    => "heading",
		"title"   => "Contact Page",
		"id"      => "layout-contact"
	),

	array(
		"under_section" => "layout-contact",
		"type"          => "small_heading",
		"title"         => "Contact Page Layout",
	),

	array(
	    "type" => "select",
		"under_section" => "layout-contact",
	    "id"      => "now_googlemaps_layout",
	    "name"    => "Map type",
	    "options" => array("Google Maps API", "Google Maps Iframe", "Do not show Map"),
	    "desc"    => "Choose which map type you want to show on contact page.",
	    "default" => "Do not show Map"
	),

	array(
		"under_section" => "layout-contact",
		"type"          => "small_heading",
		"title"         => "Google Maps API",
	),
	
	array(
		"under_section" => "layout-contact",
		"type"          => "text",
		"name"          => "Longitude",
		"id"            => "now_googlemaps_long",
		"desc"          => "Paste your map location Longitude, you can use <a href=\"http://www.gorissen.info/Pierre/maps/googleMapLocation.php\">http://www.gorissen.info/Pierre/maps/googleMapLocation.php</a> to get your location latitude & longitude.",
	),
	
	array(
		"under_section" => "layout-contact",
		"type"          => "text",
		"name"          => "Latitude",
		"id"            => "now_googlemaps_lat",
		"desc"          => "Paste your map location Latitude, you can use <a href=\"http://www.gorissen.info/Pierre/maps/googleMapLocation.php\">http://www.gorissen.info/Pierre/maps/googleMapLocation.php</a> to get your location latitude & longitude.",
	),
	
	array(
		"under_section" => "layout-contact",
		"type"          => "text",
		"name"          => "Google Maps API Key",
		"id"            => "now_googlemaps_api",
		"desc"          => "To use the contact-api page template, please provide your google maps API key.",
	),

	array(
		"under_section" => "layout-contact",
		"type"          => "small_heading",
		"title"         => "Google Maps Iframe",
	),
	
	array(
		"under_section" => "layout-contact",
		"type"          => "textarea",
		"name"          => "Google Maps Iframe",
		"id"            => "now_googlemaps_iframe",
		"desc"          => "Paste an iframe to your location generated by google maps.",
	),

	array(
		"under_section" => "layout-contact",
		"type"          => "small_heading",
		"title"         => "Contact Form",
	),

	array(
		"under_section" => "layout-contact",
		"type"          => "checkbox",
		"name"          => "Hide contact form?",
		"id"            => array("now_contact_form"),
		"options"       => array("Hide"),
		"desc"          => "Enable if you don't want to show contact form on your contact page.",
		"default"       => array("not")
	),
	
	array(
		"under_section" => "layout-contact",
		"type"          => "text",
		"name"          => "Contact e-mail",
		"id"            => "now_contact_form_mail",
		"desc"          => "Please provide the contact e-mail to which you want to send e-mails from contact form. Admin e-mail by default.",
	),
	
	array(
		"under_section" => "layout-contact",
		"type"          => "textarea",
		"name"          => "Custom subject",
		"id"            => "now_contact_form_subject",
		"desc"          => "Custom subject, you can use these placeholders - <code>%sender_name%</code>, <code>%sender_email%</code>",
	),
	
	array(
		"under_section" => "layout-contact",
		"type"          => "textarea",
		"name"          => "Custom body text",
		"id"            => "now_contact_form_content",
		"desc"          => "Custom body text, you can use these placeholders - <code>%sender_text%</code>, <code>%sender_name%</code>, <code>%sender_email%</code>",
	),

	array(
		"under_section" => "layout-contact",
		"type"          => "checkbox",
		"name"          => 'Hide "message sent" dialog',
		"id"            => array("now_contact_form_dialog"),
		"options"       => array("Hide"),
		"desc"          => "Enable if you don't want to show Message Sent dialog after e-mail was sent sucessfully",
		"default"       => array("not")
	),
	
	array(
		"under_section" => "layout-contact",
		"type"          => "textarea",
		"name"          => "Custom Sucessfull message",
		"id"            => "now_contact_form_dialog_content",
		"desc"          => "Write a custom successfull message which will be shown in the alert box after e-mail was sent successfully. You can use <code>HTML</code> tags.",
	),




	/**
	*
	* Appearance Settings
	*
	**/
	
	array(
		"type"     => "section",
		"icon"     => "acera-icon-font",
		"title"    => "Appearance Settings",
		"id"       => "appearance",
		"expanded" => "true"
	),	




	/**
	*
	* General
	*
	**/

	array(
		"section" => "appearance",
		"type"    => "heading",
		"title"   => "Visual Style",
		"id"      => "appearance-color"
	),

	array(
		"under_section" => "appearance-color",
		"type"          => "radio_image",
		"show_labels"   => "false",
		"name"          => "Primary Color",
		"id"            => "acera_theme_color",
		"options"       => array(
			"#fecd60,#febd2c",
			"#f87e56,#f65924",
			"#e57871,#d16e68",
			"#fc2e56,#f21d47",
			"#b85e7e,#d12664",
			"#5957d6,#4e4cc7",
			"#167bfb,#1575f0",
			"#37a1ce,#339ac7",
			"#3dabda,#2491bf",
			"#5faaa7,#4a8a88",
			"#7dad83,#609767",
			"#a4c400,#97b402",
			"#60a918,#60a918",
			"#fb9537,#eb8529",
			"#f472d0,#e462c0",
			"#825b2d,#765125",
			"#7a3c40,#6f363a",
			"#647687,#4c5f71",
			"#86794e,#786c42",
			"#00aba9,#009694",
			),
		"image_src" => array(
			WPMOB_THEME_URL . "/acera-options/" . "assets/c_yellow.png",
			WPMOB_THEME_URL . "/acera-options/" . "assets/c_orange.png",
			WPMOB_THEME_URL . "/acera-options/" . "assets/c_red.png",
			WPMOB_THEME_URL . "/acera-options/" . "assets/c_darkred.png",
			WPMOB_THEME_URL . "/acera-options/" . "assets/c_purple.png",
			WPMOB_THEME_URL . "/acera-options/" . "assets/c_violet.png",
			WPMOB_THEME_URL . "/acera-options/" . "assets/c_darkblue.png",
			WPMOB_THEME_URL . "/acera-options/" . "assets/c_blue.png",
			WPMOB_THEME_URL . "/acera-options/" . "assets/c_lightblue.png",
			WPMOB_THEME_URL . "/acera-options/" . "assets/c_bluegreen.png",
			WPMOB_THEME_URL . "/acera-options/" . "assets/c_green.png",
			WPMOB_THEME_URL . "/acera-options/" . "assets/c_lime.png",
			WPMOB_THEME_URL . "/acera-options/" . "assets/c_darkgreen.png",
			WPMOB_THEME_URL . "/acera-options/" . "assets/c_amber.png",
			WPMOB_THEME_URL . "/acera-options/" . "assets/c_pink.png",
			WPMOB_THEME_URL . "/acera-options/" . "assets/c_brown.png",
			WPMOB_THEME_URL . "/acera-options/" . "assets/c_sienna.png",
			WPMOB_THEME_URL . "/acera-options/" . "assets/c_steel.png",
			WPMOB_THEME_URL . "/acera-options/" . "assets/c_taupe.png",
			WPMOB_THEME_URL . "/acera-options/" . "assets/c_teal.png",
			),
		"desc"       => "Choose your custom Theme Color",
		"image_size" => array("80"),
		"default"    => "#3dabda,#2491bf"
	),

	array(
		"under_section" => "appearance-color",
		"type"          => "radio_image",
		"show_labels"   => "false",
		"name"          => "Secondary Color",
		"id"            => "acera_theme_color_secondary",
		"options"       => array(
			"#fecd60",
			"#f87e56",
			"#e57871",
			"#fc2e56",
			"#b85e7e",
			"#5957d6",
			"#167bfb",
			"#37a1ce",
			"#3dabda",
			"#5faaa7",
			"#7dad83",
			"#a4c400",
			"#60a918",
			"#fb9537",
			"#f472d0",
			"#825b2d",
			"#7a3c40",
			"#647687",
			"#86794e",
			"#00aba9",
			),
		"image_src" => array(
			WPMOB_THEME_URL . "/acera-options/" . "assets/c_yellow.png",
			WPMOB_THEME_URL . "/acera-options/" . "assets/c_orange.png",
			WPMOB_THEME_URL . "/acera-options/" . "assets/c_red.png",
			WPMOB_THEME_URL . "/acera-options/" . "assets/c_darkred.png",
			WPMOB_THEME_URL . "/acera-options/" . "assets/c_purple.png",
			WPMOB_THEME_URL . "/acera-options/" . "assets/c_violet.png",
			WPMOB_THEME_URL . "/acera-options/" . "assets/c_darkblue.png",
			WPMOB_THEME_URL . "/acera-options/" . "assets/c_blue.png",
			WPMOB_THEME_URL . "/acera-options/" . "assets/c_lightblue.png",
			WPMOB_THEME_URL . "/acera-options/" . "assets/c_bluegreen.png",
			WPMOB_THEME_URL . "/acera-options/" . "assets/c_green.png",
			WPMOB_THEME_URL . "/acera-options/" . "assets/c_lime.png",
			WPMOB_THEME_URL . "/acera-options/" . "assets/c_darkgreen.png",
			WPMOB_THEME_URL . "/acera-options/" . "assets/c_amber.png",
			WPMOB_THEME_URL . "/acera-options/" . "assets/c_pink.png",
			WPMOB_THEME_URL . "/acera-options/" . "assets/c_brown.png",
			WPMOB_THEME_URL . "/acera-options/" . "assets/c_sienna.png",
			WPMOB_THEME_URL . "/acera-options/" . "assets/c_steel.png",
			WPMOB_THEME_URL . "/acera-options/" . "assets/c_taupe.png",
			WPMOB_THEME_URL . "/acera-options/" . "assets/c_teal.png",
			),
		"desc"       => "Choose your custom Secondary Color, can be seen in blog categories",
		"image_size" => array("80"),
		"default"    => "#fb9537"
	),

	array(
		"under_section" => "appearance-color",
		"type"          => "radio_image",
		"show_labels"   => "false",
		"name"          => "Header Color",
		"id"            => "acera_theme_color_header",
		"options"       => array(
			"#fecd60",
			"#f87e56",
			"#e57871",
			"#fc2e56",
			"#b85e7e",
			"#5957d6",
			"#167bfb",
			"#37a1ce",
			"#3dabda",
			"#5faaa7",
			"#7dad83",
			"#a4c400",
			"#60a918",
			"#fb9537",
			"#f472d0",
			"#825b2d",
			"#7a3c40",
			"#647687",
			"#86794e",
			"#00aba9",
			),
		"image_src" => array(
			WPMOB_THEME_URL . "/acera-options/" . "assets/c_yellow.png",
			WPMOB_THEME_URL . "/acera-options/" . "assets/c_orange.png",
			WPMOB_THEME_URL . "/acera-options/" . "assets/c_red.png",
			WPMOB_THEME_URL . "/acera-options/" . "assets/c_darkred.png",
			WPMOB_THEME_URL . "/acera-options/" . "assets/c_purple.png",
			WPMOB_THEME_URL . "/acera-options/" . "assets/c_violet.png",
			WPMOB_THEME_URL . "/acera-options/" . "assets/c_darkblue.png",
			WPMOB_THEME_URL . "/acera-options/" . "assets/c_blue.png",
			WPMOB_THEME_URL . "/acera-options/" . "assets/c_lightblue.png",
			WPMOB_THEME_URL . "/acera-options/" . "assets/c_bluegreen.png",
			WPMOB_THEME_URL . "/acera-options/" . "assets/c_green.png",
			WPMOB_THEME_URL . "/acera-options/" . "assets/c_lime.png",
			WPMOB_THEME_URL . "/acera-options/" . "assets/c_darkgreen.png",
			WPMOB_THEME_URL . "/acera-options/" . "assets/c_amber.png",
			WPMOB_THEME_URL . "/acera-options/" . "assets/c_pink.png",
			WPMOB_THEME_URL . "/acera-options/" . "assets/c_brown.png",
			WPMOB_THEME_URL . "/acera-options/" . "assets/c_sienna.png",
			WPMOB_THEME_URL . "/acera-options/" . "assets/c_steel.png",
			WPMOB_THEME_URL . "/acera-options/" . "assets/c_taupe.png",
			WPMOB_THEME_URL . "/acera-options/" . "assets/c_teal.png",
			),
		"desc"       => "Choose your custom Secondary Color, can be seen in blog categories",
		"image_size" => array("80"),
		"default"    => "#fb9537"
	),

	array(
		"under_section" => "appearance-color",
		"type"          => "text",
		"name"          => "Header Transparency",
		"placeholder"   => "100",
		"id"            => "now_header_transparency",
		"desc"          => "Insert a opacity of the header (You can use it with fixed header, default is 100, valid values are 0-100)"
	),

	array(
		"under_section" => "appearance-color",
		"type"          => "small_heading",
		"title"         => "Custom Colors",
	),

	array(
		"under_section" => "appearance-color",
		"type"          => "checkbox",
		"name"          => "Enable Custom Colors",
		"id"            => array("now_enable_custom_colors"),
		"options"       => array("Enable"),
		"desc"          => "Enable custom theme colors, please if enabled, choose color from color picker below.",
		"default"       => array("not")
	),

	array(
		"under_section"       => "appearance-color",
		"type"                => "color",
		"name"                => "Custom Primary Color",
		"id"                  => "now_custom_colors_primary",
		"desc"                => "Choose your custom Primary Color",
		"display_checkbox_id" => "now_enable_custom_colors"
	),

	array(
		"under_section"       => "appearance-color",
		"type"                => "color",
		"name"                => "Custom Primary Active Color",
		"id"                  => "now_custom_colors_primary_a",
		"desc"                => "Choose your custom Primary Active Color",
		"display_checkbox_id" => "now_enable_custom_colors"
	),

	array(
		"under_section"       => "appearance-color",
		"type"                => "color",
		"name"                => "Custom Secondary Color",
		"id"                  => "now_custom_colors_secondary",
		"desc"                => "Choose your custom Secondary Color, can be seen in blog categories",
		"display_checkbox_id" => "now_enable_custom_colors"
	),

	array(
		"under_section"       => "appearance-color",
		"type"                => "color",
		"name"                => "Custom Header Color",
		"id"                  => "now_custom_colors_header",
		"desc"                => "Choose your custom Header Color",
		"display_checkbox_id" => "now_enable_custom_colors"
	),
	
	array(
		"section" => "appearance",
		"type"    => "heading",
		"title"   => "Custom Fonts",
		"id"      => "appearance-fonts"
	),

	array(
		"under_section" => "appearance-fonts",
		"type"          => "checkbox",
		"name"          => "<strong>Headline font</strong>",
		"id"            => array( "now_fonts_1" ),
		"options"       => array("Enable"),
		"desc"          => "Enables custom font for headlines.",
		"default"       => array("not")),

	array(
		"type"                => "toggle_div_start",
		"display_checkbox_id" => "now_fonts_1",
		"under_section"       => "appearance-fonts",
	),

	array(
		"under_section" => "appearance-fonts",
		"type"          => "text",
		"name"          => "Headline font - link",
		"id"            => "now_fonts_1_link",
		"desc"          => "Paste link from google webfonts for your font.",
		"placeholder"   => "<link href='Google font' rel='stylesheet' type='text/css'>"),


	array(
		"under_section" => "appearance-fonts",
		"type"          => "text",
		"name"          => "Headline font - font-family",
		"placeholder"   => "font-family: 'Arial', sans-serif;",
		"id"            => "now_fonts_1_css",
		"desc"          => "Paste here your font's font-family CSS attribute."),

	array(
		"type"          => "toggle_div_end",
		"under_section" => "appearance-fonts",
	),

	array(
		"under_section" => "appearance-fonts",
		"type"          => "checkbox",
		"name"          => "<strong>Content font</strong>",
		"id"            => array( "now_fonts_2" ),
		"options"       => array("Enable"),
		"desc"          => "Enables custom font for content.",
		"default"       => array("not")),
	array(
		"type"                => "toggle_div_start",
		"display_checkbox_id" => "now_fonts_2",
		"under_section"       => "appearance-fonts",
	),

	array(
		"under_section" => "appearance-fonts",
		"type"          => "text",
		"name"          => "Content font - link",
		"id"            => "now_fonts_2_link",
		"desc"          => "Paste link from google webfonts for your font.",
		"placeholder"   => "<link href='Google font' rel='stylesheet' type='text/css'>"),

	array(
		"under_section" => "appearance-fonts",
		"type"          => "text",
		"name"          => "Content font - font-family",
		"placeholder"   => "font-family: 'Arial', sans-serif;",
		"id"            => "now_fonts_2_css",
		"desc"          => "Paste here your font's font-family CSS attribute.",),

	array(
		"type"          => "toggle_div_end",
		"under_section" => "appearance-fonts",
	),
);

?>