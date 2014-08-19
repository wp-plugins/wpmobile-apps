<?php
abstract class WPMobTheme {
	/**
	 * This method will be called during the plugin initialization. Here, register handlers and others
	 * as needed.
	 */
	function initialize() {
	}

	/**
	 * Initialize the theme settings panel. The plugin will add a menu entry to display this panel.
	 */
	static function admin_panel() {
	}
	
	static function invalid_theme_path(){?>
		<div class="error">
			<p><?php echo __('The selected theme does not exist at ', 'wpmob') . WPMOB_THEME_PATH; ?></p>
		</div>
    <?php
	}
	}
?>