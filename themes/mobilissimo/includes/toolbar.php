<header id="header">
	<div id="menu-trigger" class="header-button left icon-menu"></div>

	<?php get_theme_headline(); ?>

	<?php 

	if ( get_option( 'now_search_form', 'false' ) == 'true' ) {
		echo '<div id="search-trigger" style="font-size: 18px;" class="header-button right icon-search-1"></div>';
	}

	?>
</header>

<?php 

if ( get_option( 'now_search_form', 'false' ) == 'true' ) {
	get_search_form();
}

?>