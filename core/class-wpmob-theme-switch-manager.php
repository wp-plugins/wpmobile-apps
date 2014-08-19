<?php
require_once (WPMOB_DIR . '/core/class-wpmob-extension.php');

/**
 * Load the plugin admin features
 *
 * Create an admin page at WPMobile Apps > Theme Activation
 * for the website admin to save the plugin settings
 */
class WPMobThemeSwitchManager extends WPMobExtension {
	/**
	 * Generate the admin settings page
	 *
	 * This function is triggered as a callback via add_submenu_page() run on the admin_menu hook
	 */
	function admin_panel() {
		# Save any submitted data.
		# This action is executed by the plugin using a hook on the page slugs in wpmob.php
		# The save method is called form a static context.
		# $this -> save();

		//Gather all of the currently installed theme names.
		$installed_themes = wp_get_themes();
		//Loop through each of the installed themes and build a cache array of themes.
		foreach ($installed_themes as $theme) {
			if (is_object($theme)) {
				$name = $theme -> name;
				$template = $theme -> template;
				$stylesheet = $theme -> stylesheet;
			}
			$available_themes[] = array('name' => $name, 'template' => $template, 'stylesheet' => $stylesheet);
			//Store the theme names so we can use array_multisort on $available_theme to sort by name
			$available_theme_names[] = $name;
		}
		//Alphabetically sort the theme name list for display in the selection dropdowns
		array_multisort($available_theme_names, SORT_ASC, $available_theme_names);

		//Get the stored cookie lifespan option if it exists
		$cookie_lifespan = ($lifespan = get_option('wpmob_cookie_lifespan')) ? $lifespan : 0;
		$themes = array();

		# Retrieve any theme options.
		# Each theme is an array string containing 3 values for name, template, and stylesheet
		parse_str(get_option('wpmob_handheld_theme'), $themes['handheld']);
		parse_str(get_option('wpmob_tablet_theme'), $themes['tablet']);
		# Ensure there are default values in each of the $themes
		foreach ($themes as $device => $theme) {
			if (empty($theme)) {
				$themes[$device] = array('name' => '', 'template' => '', 'stylesheet' => '');
			}
		}
		# Generate the HTML content.
		include_once (WPMOB_DIR . '/core/inc/theme-switch-manager.html.inc.php');
	}

	/**
	 * Save the plugin settings
	 */
	static function save() {
		if ($_POST && $_POST['wpmob_settings_update'] == "true") {
			//Loop through the devices.
			foreach ($_POST['wpmob_theme'] as $selected_device => $chosen_theme) {
				# Update the device theme option that contains name, template and stylesheet.
				update_option($selected_device, $chosen_theme);
			}
			//Save the chosen session lifetime
			update_option('wpmob_cookie_lifespan', $_POST['wpmob_cookie_lifespan']);
			//Display an admin notice letting the user know the save was successfull
			add_action('admin_notices', array('WPMobThemeSwitchManager', 'admin_save_settings_notice'));
		}
	}

	/**
	 * Display a notice in the admin after settings have been saved
	 */
	static function admin_save_settings_notice() {
		echo '<div class="updated">';
		echo '<p>' . __('Device Theme settings saved.', 'wpmob') . '</p>';
		echo '</div>';
	}

	function getDefaultSettings() {
		# Default theme registration for theme devices.
		$settings = array();
		$settings['wpmob_dts'] = array();
		$settings['wpmob_dts']['wpmob_handheld_theme'] = 'name=' . WPMOB_DEFAULT_THEME_NAME . '&template=' . WPMOB_DEFAULT_THEME_TEMPLATE . '&stylesheet=' . WPMOB_DEFAULT_THEME_CSS;
		$settings['wpmob_dts']['wpmob_tablet_theme'] = 'name=' . WPMOB_DEFAULT_THEME_NAME . '&template=' . WPMOB_DEFAULT_THEME_TEMPLATE . '&stylesheet=' . WPMOB_DEFAULT_THEME_CSS;

		return $settings;
	}

	function on_activation() {
		foreach ($this->getDefaultSettings() as $settings) {
			foreach ($settings as $settingID => $setting) {
				# If the setting does not exist, set it.
				if (!get_option($settingID))
					update_option($settingID, $setting);
			}
		}
	}

}
