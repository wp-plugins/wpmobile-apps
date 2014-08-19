<?php 

/**
*
* === Custom functions ===
*
* Here you can find functions that are generally used in other functions.
* These functions usually format some output or simply replace default PHP functions
* with more functionallity
*
**/




/**
*
* === Strip HTML tags ===
*
* This functions replaces default php function for stripping tags from content.
* 
* @call get_posts_first_video_url()
* @param  [string] $text    [source HTML string]
* @param  [string] $allowed [string of allowed tags (won't be removed)]
* @return [string]          [HTML stripped from all tags except allowed ones]
* 
**/

function strip_html_tags( $text , $allowed)
{
    $text = preg_replace(
        array(
          // Remove invisible content
            '@<head[^>]*?>.*?</head>@siu',
            '@<style[^>]*?>.*?</style>@siu',
            '@<script[^>]*?.*?</script>@siu',
            '@<object[^>]*?.*?</object>@siu',
            '@<embed[^>]*?.*?</embed>@siu',
            '@<applet[^>]*?.*?</applet>@siu',
            '@<noframes[^>]*?.*?</noframes>@siu',
            '@<noscript[^>]*?.*?</noscript>@siu',
            '@<noembed[^>]*?.*?</noembed>@siu',
          // Add line breaks before and after blocks
            '@</?((address)|(blockquote)|(center)|(del))@iu',
            '@</?((div)|(h[1-9])|(ins)|(isindex)|(p)|(pre))@iu',
            '@</?((dir)|(dl)|(dt)|(dd)|(li)|(menu)|(ol)|(ul))@iu',
            '@</?((table)|(th)|(td)|(caption))@iu',
            '@</?((form)|(button)|(fieldset)|(legend)|(input))@iu',
            '@</?((label)|(select)|(optgroup)|(option)|(textarea))@iu',
            '@</?((frameset)|(frame)|(iframe))@iu',
        ),
        array(
            ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ',"$0", "$0", "$0", "$0", "$0", "$0","$0", "$0",), $text );
  
    // you can exclude some html tags here, in this case B and A tags        
    return strip_tags( $text , $allowed );
}




/**
*
* === Convert hex to rgb ===
*
* Converts hex color to rgb color, used in style.php
* 
* @call hex2rgb()
* @return  [string]  [RGB format of the color]
* 
**/

function hex2rgb($hex, $opacity) {
   $hex = str_replace("#", "", $hex);

   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }
   $rgb = array($r, $g, $b, $opacity/100);
   //return implode(",", $rgb); // returns the rgb values separated by commas
   return implode(',', $rgb); // returns an array with the rgb values
}

?>