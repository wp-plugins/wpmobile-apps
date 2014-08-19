<?php 

/**
*
* === Pricing Tables ===
*
* Renders custom pricing tables. You have to use a few more shortcodes than only one to display 
* the shortcode properly. But here are Few options you can use
*
* 'color'     => '',   Custom colors - green, bluegreen, lightblue, lightpurple, blue, yellow, orange, grey, red, success
* 'size'      => '',   Price shortcode size - small, medium, big
* 'highlight' => '0',  Set to '1' to highlight the current bullet-item
* 
* @call [pricing_table color="red"] [pt_title] Title [/pt_title] [pt_price] $89.99 [/pt_price] [/pricing_table]
* 
**/

function pricing_table_func($atts, $content){
	extract(shortcode_atts(array(
	   'color' => '',
	), $atts)); 

	return do_shortcode("<ul class=\"pricing-table {$color}\">{$content}</ul>");
}

/* Price */
function pt_price_func($atts, $content){
	extract(shortcode_atts(array(
	   'size' => '',
	), $atts)); 

	return do_shortcode("<li class=\"price {$size}\">{$content}</li>");
}

/* Normal Bullet Item */
function pt_item_func($atts, $content){
	extract(shortcode_atts(array(
	   'highlight' => '0',
	), $atts)); 

	if ($highlight == '1') {
		$highlight = 'highlight';
	}

	return do_shortcode("<li class=\"bullet-item {$highlight}\">{$content}</li>");
}

/* Description */
function pt_description_func($atts, $content){
	return do_shortcode("<li class=\"description\">{$content}</li>");
}

/* Title */
function pt_title_func($atts, $content){
	return "<li class=\"title\">{$content}</li>";
}

/* Button */
function pt_button_func($atts, $content){
	return do_shortcode("<li class=\"cta-button\">{$content}</li>");
}

add_shortcode("pricing_table", "pricing_table_func");
add_shortcode("pt_price", "pt_price_func");
add_shortcode("pt_item", "pt_item_func");
add_shortcode("pt_description", "pt_description_func");
add_shortcode("pt_title", "pt_title_func");
add_shortcode("pt_button", "pt_button_func");




/**
*
* === Highlight Text ===
*
* Highlighs text with custom color or predefined one
*
* 'color' => '', Custom colors - green, bluegreen, lightblue, lightpurple, blue, yellow, orange, grey, red, success, disabled, #333
* 
* @call [highlight color="red"]...[/highlight]
* 
**/

function highlight_func($atts, $content){

	extract(shortcode_atts(array(
	   'color' => '',
	), $atts)); 

	if (preg_match("#^\##", $color)) {
		return "<span style=\"color: {$color}\" class=\"mark-text\">{$content}</span>";
	} else {
		return "<span class=\"mark-text {$color}\">{$content}</span>";
	}

}

add_shortcode("highlight", "highlight_func");




/**
*
* === Mark Text ===
*
* Mark text with custom color or predefined one
*
* 'color' => '', Custom colors - green, bluegreen, lightblue, lightpurple, blue, yellow, orange, grey, red, success, disabled, #333
* 
* @call [marktext color="red"]...[/marktext]
* 
**/

function marktext_func($atts, $content){

	extract(shortcode_atts(array(
	   'color' => '',
	), $atts)); 

	if (preg_match("#^\##", $color)) {
		return "<mark style=\"background: {$color}\">{$content}</mark>";
	} else {
		return "<mark class=\"{$color}\">{$content}</mark>";
	}

}

add_shortcode("marktext", "marktext_func");




/**
*
* === Subheader ===
*
* Adds subheader class to wrapped heading
*
* @call [subheader]...[/subheader]
* 
**/

function subheader_func($atts, $content){
	return do_shortcode("<span class=\"subheader\">{$content}</span>");
}

add_shortcode("subheader", "subheader_func");




/**
*
* === List - No Bullet ===
*
* Adding "no-bullet" style to unordered list
*
* @call [list_nobullet]<ul>...</li>...</ul>[/list_nobullet]
* 
**/

function list_nobullet_func($atts, $content){
	return do_shortcode(str_replace('<ul', '<ul class="no-bullet"', $content));
}

add_shortcode("list_nobullet", "list_nobullet_func");




/**
*
* === Table ===
*
* Custom table color scheme
* 
* 'color' => '',	Custom Table color - green, bluegreen, lightblue, lightpurple, blue, yellow, orange, grey, red, success
*
* @call [table]<table>...</table>[/table]
* 
**/

function table_func($atts, $content){

	extract(shortcode_atts(array(
	   'color' => '',
	), $atts)); 

	return do_shortcode(str_replace("<table", "<table class=\"{$color}\"", $content));
}

add_shortcode("table", "table_func");




/**
*
* === Widget ===
*
* Prints content in a widget style 
*
* 'title' => '',	Titlle of the widget
* 
* @call [widget title="Skills"]...[/widget]
* 
**/

function widget_func($atts, $content){

	extract(shortcode_atts(array(
	   'title' => '',
	), $atts)); 

	return do_shortcode("<div class=\"widget\"><h3>{$title}</h3>{$content}</div>");
}

add_shortcode("widget", "widget_func");



/**
*
* === Icons ===
*
* Add's class to selected text with custom icon 
*
* 'type' => '',		Icon class, see the documentation 
* 
* @call [icon type="icon-aim"]...[/icon]
* 
**/

function icon_func($atts, $content){

	extract(shortcode_atts(array(
	   'type' => '',
	), $atts)); 

	return do_shortcode("<span class=\"{$type}\">{$content}</span>");

}

add_shortcode("icon", "icon_func");




/**
*
* === Alert Boxes ===
*
* Creates an alert box from the wrapped content
*
* 'color'  => '',	Appearance of the alert box - success, secondary, alert or none
* 'shape' => '',	Shape of the alert box - radius, round
* 'close' => true,	Whether you want to display close icon or not (to show use 1, to hide use 0)
* 
* @call [alert]...[/alert]
* 
**/

function alert_func($atts, $content){

	extract(shortcode_atts(array(
	   'color' => '',
	   'shape' => '',
	   'close' => '1',
	), $atts)); 

	if ($close == '1') {
		$close = '<a href="#" class="close">×</a>';
	}

	return do_shortcode("<div data-alert=\"\" class=\"alert-box {$color} {$shape}\">{$content}{$close}</div>");

}

add_shortcode("alert", "alert_func");




/**
*
* === Progress bar ===
*
* Creates a progress bar with custom options
*
* 'color'      => '',	Appearance of the progress - green, bluegreen, lightblue, lightpurple, blue, yellow, orange, grey, red, alert, success, disabled, #333
* 'background' => '',	Custom background color (#ccc)
* 'shape'      => '',	Shape of the progress - radius, round
* 'title'      => '',	Optional progress title
* 'percentage' => '',	Percentage of the progress fill bar (50 => progress is on 50%)
* 
* @call [progress title="Progress" percentage="50"]
* 
**/

function progress_func($atts, $content = null){

	extract(shortcode_atts(array(
	   'color'      => '',
	   'background' => '',
	   'shape'      => '',
	   'title'      => '',
	   'percentage' => '0',
	), $atts));


	/* Percentage */
	if ($percentage != '0') {
		$percentage = 'width: ' . $percentage .  '%;';
	}


	/* Custom Color */
	if (preg_match("#^\##", $color)) {
		$background = 'background: ' . $background . ';';
		$color = 'background: ' . $color . ';';
		return "<div style=\"{$background}\" class=\"progress {$shape}\"><span class=\"meter\" style=\"{$color} {$percentage}\">&nbsp;&nbsp;&nbsp;&nbsp;{$title}</span></div>";
	} else {
		$background = 'background: ' . $background . ';';
		return "<div style=\"{$background}\" class=\"progress {$color} {$shape}\"><span class=\"meter\" style=\"{$percentage}\">&nbsp;&nbsp;&nbsp;&nbsp;{$title}</span></div>";
	}
}

add_shortcode("progress", "progress_func");




/**
*
* === Button ===
*
* Creates an anchor tag with button style and custom options seen below
*
* 'color' => '',	Appearance of the button - green, bluegreen, lightblue, lightpurple, blue, yellow, orange, grey, red, alert, success, disabled, secondary, primary, #333
* 'shape' => '',	Shape of the button - radius, round
* 'title' => '',	Button title
* 'url'   => '',	Optional Button URL
* 'id'    => '',	Optional Button ID
* 'size'  => '',	Size of the button - big, small, tiny, full-width
* 'email'  => '',	Optional mailto url (add your e-mail here)
* 'tel'   => '',	Optional tel url (add your phone number here)
* 'sms'   => '',	Optional sms url (add your phone number here)
* 
* @call [button title="Button" url="http://www.google.com"]
* 
**/

function button_func($atts, $content = null){

	extract(shortcode_atts(array(
		'color' => '',
		'shape' => '',
		'title' => '',
		'url'   => '',
		'id'   => '',
		'size'  => '',
		'email'  => '',
		'tel'  => '',
		'sms'  => '',
	), $atts));

	if ($tel) {
		$url = "tel:";
	} elseif ($email) {
		$url = "mailto:";
	} elseif ($sms) {
		$url = "sms:";
	}

	/* Custom Color */
	if (preg_match("#^\##", $color)) {
		return "<a id=\"{$id}\" href=\"{$url}{$tel}{$email}{$sms}\" style=\"background: {$color};\" class=\"button {$size} {$shape}\">{$title}</a>";
	} else {
		return "<a id=\"{$id}\" href=\"{$url}{$tel}{$email}{$sms}\" class=\"button {$size} {$color} {$shape}\">{$title}</a>";
	}
}

add_shortcode("button", "button_func");



/**
*
* === Panels ===
*
* Creates an panel with the content wrapped with shortcode
*
* 'color'      => '',	Appearance of the panel - callout, green, bluegreen, lightblue, lightpurple, blue, yellow, orange, grey, red, success, disabled, #333
* 'shape'      => '',	Shape of the panel - radius, round
* 
* @call [panel]...[/panel]
* 
**/

function panel_func($atts, $content){

	extract(shortcode_atts(array(
	   'color'  => '',
	   'shape' => '',
	), $atts)); 

	if (preg_match("#^\##", $color)) {
		return do_shortcode("<div style=\"background: {$color}; box-shadow: none; -webkit-box-shadow: none;\" class=\"panel {$shape}\">{$content}</div>");
	} else {
		return do_shortcode("<div class=\"panel {$color} {$shape}\">{$content}</div>");
	}

}

add_shortcode("panel", "panel_func");




/**
*
* === Vimeo ===
* 
* Vimeo shortcode, displays vimeo video in an iframe tag 
* you can customize it using these options
* 
*
* 'id'        => 'id'      Vimeo video id.
* 'noframes'  => '1'       Enable responsive video with no blank frames
* 'fullwidth' => '1'       If you want to disable fullwidth video set to 0
* 'width'     => '475'     Set width of video iframe - 0 will set iframe to 100%
* 'height'    => '350'     Set height of video iframe
* 'title'     => '1'       Show the title on the video - to disable set to 0
* 'byline'    => '1'       Show the user’s byline on the video - to disable set to 0
* 'portrait'  => '1'       Show the user’s portrait on the video - to disable set to 0
* 'color'     => '#00adef' Specify the color of the video controls
* 'autoplay'  => '0'       Play the video automatically on load, note that this won’t work on some devices - to enable set to 1
* 'loop'      => '0'       Play the video again when it reaches the end - to enable set to 1
* 'api'       => '0'       Set to 1 to enable the Javascript API
* 'player_id' => false     An unique id for the player that will be passed back with all Javascript API responses
*
* @call [vimeo id="1259082"]
* 
*/
 
function vimeo_func($atts, $content = null) {

	extract(shortcode_atts(array(
	   'id'        => 'id',
	   'noframes'  => '1',
	   'fullwidth' => '1',
	   'width'     => '0',
	   'height'    => '350',
	   'title'     => '1',
	   'byline'    => '1',
	   'portrait'  => '1',
	   'color'     => '3cabda',
	   'autoplay'  => '0',
	   'loop'      => '0',
	   'api'       => '0',
	   'player_id' => false,
	), $atts)); 

	$output = ''; $stylewidth = $width.'px';

	$color = str_replace('#', '', $color);

	if($width == 0){
		$stylewidth = '100%';
		$width = '475';
	}

	$output .= '<iframe src="http://player.vimeo.com/video/'.$id.'?title='.$title.'&byline='.$byline.'&portrait='.$portrait.'&color='.$color.'&autoplay='.$autoplay.'&loop='.$loop.'&api='.$api.'&player_id='.$player_id.'" width="'.$width.'" height="'.$height.'" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>';

	if($noframes == '1'){
		$output = '<div style="width: '.$stylewidth.';"><figure class="flex-video">' . $output;
		$output .= '</figure></div>';
	}

	if($fullwidth == '1'){
		$output = '</div>' . $output;
		$output .= '<div class="wrapped-content first-child">';
	}

	return $output;
}

add_shortcode("vimeo", "vimeo_func");




/**
*
* === Soundcloud ===
* 
* Soundcloud shortcode, displays soundcloud widget in an iframe tag
* you can customize it using these options
* (HTML5 ready for mobile devices)
*
* 'url'            => 'http://'   URL to your soundcloud source
* 'hide'           => 'false'     Hides widget from post (Use when using as featured image)
* 'params'         => 'false'     Custom Parameters
* 'width'          => '100%'      Custom width of the iframe
* 'fullwidth' 		=> '1' 		   If you want to disable fullwidth video set to 0
* 'height'         => '166'       Custom height of the iframe
* 'color'          => 'ff0000'    Custom player Color
* 'auto_play'      => 'false'     Whether to start playing the widget after it’s loaded
* 'buying'         => 'true'      Show/hide buy buttons
* 'liking'         => 'true'      Show/hide like buttons
* 'download'       => 'true'      Show/hide download buttons
* 'sharing'        => 'true'      Show/hide share buttons/dialogues
* 'show_artwork'   => 'true'      Show/hide artwork
* 'show_comments'  => 'true'      Show/hide comments
* 'show_playcount' => 'true'      Show/hide number of sound plays
* 'show_user'      => 'true'      Show/hide the uploader name
* 'start_track'    => '0'         Preselects a track in the playlist, given a number between 0 and the length of the playlist
*
* @call [soundcloud url="http://api.soundcloud.com/playlists/9173699"]
* 
*/

function soundcloud_func($atts) {

    extract(shortcode_atts(array(
        'url'            => 'http://',
        'hide'           => 'false',
        'params'         => 'false',
        'width'          => '100%',
		'fullwidth' 	 => '1',
        'height'         => '166',
        'color'          => PRIMARY_COLOR,
        'auto_play'      => 'false',
        'buying'         => 'true',
        'liking'         => 'true',
        'download'       => 'true',
        'sharing'        => 'true',
        'show_artwork'   => 'true',
        'show_comments'  => 'true',
        'show_playcount' => 'true',
        'show_user'      => 'true',
        'start_track'    => '0'
    ), $atts)); 
    
    $output = ''; $hide_style = '';

    if($hide == "true"){
        $hide_style = 'style="display:none;" ';
    }

    if($start_track != 0){
        $start_track -= 1;
    }

    if($params == false){
        $output .= '<iframe style="z-index: 2; position: relative;" src="https://w.soundcloud.com/player/?url=' . $url . '&' . $params . '&show_comments=' . $show_comments . '&buying='
         . $buying . '&liking=' . $liking . '&download=' . $download . '&sharing=' . $sharing . '&show_playcount=' . $show_playcount . '&show_user=' . $show_user . '&start_track='
         . $start_track . '" height="' . $height . '" width="' . $width . '" frameborder="no" ' . $hide_style . 'scrolling="no"></iframe>';
    }
    else{
        $output .= '<iframe style="z-index: 2; position: relative;" src="https://w.soundcloud.com/player/?url=' . $url . '&color=' . $color . '&auto_play=' . $auto_play . '&show_artwork=' . $show_artwork . '&show_comments=' . $show_comments . '&buying='
         . $buying . '&liking=' . $liking . '&download=' . $download . '&sharing=' . $sharing . '&show_playcount=' . $show_playcount . '&show_user=' . $show_user . '&start_track='
         . $start_track . '" height="' . $height . '" width="' . $width . '" frameborder="no" ' . $hide_style . 'scrolling="no"></iframe>';
    }

	if($fullwidth == '1'){
		$output = '</div>' . $output;
		$output .= '<div class="wrapped-content first-child">';
	}
    
    return $output;
}

add_shortcode("soundcloud", "soundcloud_func");




/**
*
* === Youtube ===
* 
* Youtube shortcode which is using youtube API to display iframe
* along with customizations, which you can see below
*
* 'id'             => 'id'      Iframe id, can be use in conjunction with javascrip api
* 'url'            => 'http://' Youtube video url (https://www.youtube.com/watch?v=ouP6HWOmwoQ)
* 'noframes'       => '1'       Enable responsive video with no blank frames
* 'fullwidth'      => '1' 		If you want to disable fullwidth video set to 0 (By default fills whole page)
* 'width'          => '475'     Set width of video iframe. 0 will set iframe to 100%
* 'height'         => '350'     Set height of video iframe
* 'autoplay'       => '0'       Play the video automatically on load, note that this won’t work on some devices - to enable set to 1
* 'loop'           => '0'       Play the video again when it reaches the end - to enable set to 1
* 'enablejsapi'    => '0'       Set to 1 to enable the Javascript API
* 'autohide'       => '2',		Controls will hide and show when user hovers mose over vide (1 and 0 are also valid values)	
* 'color'          => 'red',	Choose red or white color
* 'controls'       => '1',		0, 1 or 2. 0 - will hide all controls. 1 Default
* 'iv_load_policy' => '1',		Values: 1 or 3. Default is 1. Setting to 1 will cause video annotations to be shown by default, whereas setting to 3 will cause video annotation to hide
* 'modestbranding' => '1',		Set the parameter value to 1 to prevent the YouTube logo from displaying in the control bar
* 'rel'            => '1',		1 or 0 Whether to show related videos at the end
* 'showinfo'       => '1',		1 or 0 Whether to show video & author info at the top of the video
* 'theme'          => 'dark',	Light or dark theme
* 'start'          => '',		Integer of seconds when the video should start
* 'end'            => '',		Integer of seconds when the video should end
*
* @call [youtube url="https://www.youtube.com/watch?v=ouP6HWOmwoQ"]
* 
*/

function youtube_func($atts, $content = null) {

	extract(shortcode_atts(array(
	   'id'             => '',
	   'url'            => '',
	   'noframes'       => '1',
	   'fullwidth'      => '1',
	   'width'          => '0',
	   'height'         => '315',
	   'autohide'       => '2',
	   'autoplay'       => '0',
	   'color'          => 'red',
	   'controls'       => '1',
	   'enablejsapi'    => '0',
	   'iv_load_policy' => '1',
	   'loop'           => '0',
	   'modestbranding' => '1',
	   'rel'            => '1',
	   'showinfo'       => '1',
	   'theme'          => 'dark',
	   'start'          => '',
	   'end'            => '',
	), $atts)); 

	$video_url = parse_url($url);
	parse_str($video_url['query'], $video_url);
	$video_url = $video_url['v'];

	$output = ''; $stylewidth = $width.'px';

	if($width == 0){
		$stylewidth = '100%';
		$width = '475';
	}

	$output .= "<iframe id=\"{$id}\" width=\"{$width}\" height=\"{$height}\" src=\"//www.youtube.com/embed/{$video_url}?autohide={$autohide}&autoplay={$autoplay}&color={$color}&controls={$controls}&enablejsapi={$enablejsapi}&iv_load_policy={$iv_load_policy}&loop={$loop}&modestbranding={$modestbranding}&rel={$rel}&showinfo={$showinfo}&theme={$theme}&start={$start}&end={$end}\" frameborder=\"0\" webkitAllowFullScreen mozallowfullscreen allowfullscreen></iframe>";

	if($noframes == '1'){
		$output = '<div style="width: '.$stylewidth.';"><figure class="flex-video">' . $output;
		$output .= '</figure></div>';
	}

	if($fullwidth == '1'){
		$output = '</div>' . $output;
		$output .= '<div class="wrapped-content first-child">';
	}

	return $output;
}

add_shortcode("youtube", "youtube_func");

?>