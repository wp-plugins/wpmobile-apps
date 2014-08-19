<aside id="sidemenu-container">
	<div id="sidemenu">

		<?php 
		/* Sidebar Contact informations */
		$author = get_option('now_contact_name');
		$email = get_option('now_contact_mail');
		$photo = get_option('now_contact_photo');

		/* Prints formatted Contact information */
		
		if(get_option('now_contact_enable', 'false') == 'true' && $author && $photo){
			echo <<<HTML
			<div id="author-profile">
				<div class="author-profile-photo">
					<img src="{$photo}" alt="{$author}">
				</div>
				<div class="author-profile-content">
					<p class="title">{$author}</p>
					<a href="mailto:{$author}" class="subtitle">{$email}</p>
				</div>
			</div>
HTML;
		}

		/* Sidebar Navigation */
		$menu = wp_nav_menu(array(
			'theme_location' => 'primary',
			'menu'           => 'mobile-menu',
			'container'      => 'nav', 
			'container_id'   => 'nav-container',
			'menu_class'     => 'nav',
			'echo'           => false,
		));

		/* Adding "+" buttons for dropdown menus */
		$search = '<ul class="sub-menu">';
		$replace = '<span class="nav-child-container"><span class="nav-child-trigger">+</span></span>
					<ul class="sub-menu" style="height: 0;">';
		echo str_replace($search, $replace, $menu);

		?>
	</div>
</aside>