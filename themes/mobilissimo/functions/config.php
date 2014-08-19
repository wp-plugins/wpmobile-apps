<?php 

/**
*
* === Theme custom settings ===
*
* Here are defined some of theme's settings. Usually settings
* that just add's simple classes to body or html tag to enable
* certain functionallity of the theme.
* 
* You can also edit these on your own, however by default
* these are editable through theme's theme options.
*
**/




/**
*
* Display settings
*
**/

if ((get_option('now_enable_custom_colors', 'false') == 'true') && (get_option('now_custom_colors_primary_a')) && (get_option('now_custom_colors_primary'))) {
    $c_primary = get_option('now_custom_colors_primary');
} else {
	$primaryColors = get_option('acera_theme_color') ? get_option('acera_theme_color') : '#3dabda,#2491bf';
	$primaryColors = explode(',', $primaryColors);
	$c_primary = str_replace('#', '', $primaryColors[0]);
}
define("PRIMARY_COLOR", $c_primary);

?>