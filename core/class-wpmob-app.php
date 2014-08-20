<?php
require_once (WPMOB_DIR . '/core/class-wpmob-theme-switcher.php');
require_once (WPMOB_DIR . '/core/class-wpmob-extension.php');

class WPMobApp extends WPMobExtension {
	var $appClasses = array();

	function __construct() {
		# Load the App Classes
		$apps = $this -> getAppClassPaths(WPMOB_DIR . '/apps');
		foreach ($apps as $app)
			include_once ($app);
		foreach (get_declared_classes() as $class) {
			if ($class != 'WPMobApp' && strpos($class, 'WPMobApp') === 0)
				$this -> appClasses[] = $class;
		}
	}

	/**
	 * It registers the necessary actions to start the apps.
	 */
	function initialize() {
		$appsDisabled = get_option('wpmob_disable_apps') == 'true';
		if (!$appsDisabled) {
			# Load the UI after the theme loading
			add_action('wp_footer', array($this, 'load_frontend_ui'));
			add_action('wp_enqueue_scripts', array($this, 'register_frontend_scripts'), 100);
		}
		add_action('admin_head', array($this, 'register_admin_scripts'));
		# TODO: Check if there are new apps and load their default settings.
	}

	/**
	 * It scans and returns the app class file paths.
	 */
	private function getAppClassPaths($path) {
		$classes = array();
		# scan the apps dir for apps inside
		foreach (new DirectoryIterator($path) as $f) {
			if ($f -> isDot())
				continue;
			if ($f -> isDir()) {
				$app_class = $path . '/' . $f . '/app.php';
				if (is_file($app_class)) {
					$classes[] = $app_class;
				}
			}
		}

		return $classes;
	}

	function register_frontend_scripts() {
		# Do not load this scripts in the administration panel.
		$appsDisabled = get_option('wpmob_disable_apps') == 'true';
		if (!is_admin() && strpos($_SERVER['REQUEST_URI'], '/wp-login.php') === FALSE && !$appsDisabled) {
			$desktopEnabled = get_option('wpmob_enable_apps_desktop') == 'true';
			if ($desktopEnabled || WPMobSwitcher::detect_users_device() != 'desktop' || (isset($_GET['theme']) && $_GET['theme'] != 'active')) {
				wp_enqueue_script('carousel-js', WPMOB_URL . '/core/js/owl.carousel.min.js', array('jquery'), '', true);
				wp_enqueue_script('wpmob-panel-js', WPMOB_URL . '/core/js/app-panel.js', array('jquery', 'carousel-js'), '', true);
				wp_enqueue_style('carousel-css', WPMOB_URL . '/core/css/owl.carousel.css', array(), '', 'all');
				wp_enqueue_style('font-awesome-css', WPMOB_URL . '/core/css/font-awesome.min.css', array(), '', 'all');
				wp_enqueue_style('wpmob-panel-css', WPMOB_URL . '/core/css/app-panel.css', array(), '', 'all');
				wp_enqueue_style('wpmob-panel-custom-css', WPMOB_URL . '/core/css/app-panel-custom.css', array(), '', 'all');
			}
		}
	}

	/**
	 * It loads the UI in the frontend.
	 */
	function load_frontend_ui() {
		# Do not load this content in the administration panel or in desktop mode if it is not enabled.
		$appsDisabled = get_option('wpmob_disable_apps') == 'true';
		if (!is_admin() && strpos($_SERVER['REQUEST_URI'], '/wp-login.php') === FALSE && !$appsDisabled) {
			$desktopEnabled = get_option('wpmob_enable_apps_desktop') == 'true';
			if ($desktopEnabled || WPMobSwitcher::detect_users_device() != 'desktop' || (isset($_GET['theme']) && $_GET['theme'] != 'active')) {
				require_once (WPMOB_DIR . '/core/inc/app-panel.html.inc.php');
			}
		}
	}

	/**
	 * Load the Apps administration panel scripts and styles.
	 */
	function register_admin_scripts() {
		# Do not load on the frontend.
		if (is_admin()) {
			require_once (WPMOB_DIR . '/core/class-wpmob-app-panel.php');
			echo '<link rel="stylesheet" href="' . WPMOB_URL . '/core/css/app-panel-admin.css" />';
			echo '<script type="text/javascript" src="' . WPMOB_URL . '/core/js/app-panel-admin.js"></script>';
		}
	}

	/**
	 * It initializes the configuration panel in the wordpres
	 * administration. This method is called with the add_action()
	 * hook in the admin-menu.php file.
	 */
	function admin_panel() {
		# Load the panel
		$panel = new WPMobAppPanel($this -> getAdminOptions());
		echo $panel -> wpmob_display_page();
	}

	/**
	 * This section builds the menu of the app admin panel.
	 */
	function getAdminOptions() {
		$options = array();
		$options[] = array("type" => "section", "icon" => "dashicons-admin-generic", "title" => __("General Settings", "wpmob"), "id" => "wpmob_general", "expanded" => "true");
		# General section
		$options[] = array("section" => "wpmob_general", "type" => "heading", "title" => __("General", "wpmob"), "id" => "wpmob_general_visual");
		$options[] = array("under_section" => "wpmob_general_visual", "type" => "checkbox", "name" => __("Disable All Apps", "wpmob"), "id" => array("wpmob_disable_apps"), "options" => array(__("Disable", "wpmob")), "desc" => __("Checking this option will not show any apps in your theme.", "wpmob"), "default" => array("not"));
		$options[] = array("under_section" => "wpmob_general_visual", "type" => "checkbox", "name" => __("Enable Apps also in Desktop ", "wpmob"), "id" => array("wpmob_enable_apps_desktop"), "options" => array(__("Enable", "wpmob")), "desc" => __("Checking this option will load the apps in Desktop mode besides tablet and smartphones.", "wpmob"), "default" => array("not"));
		# App main section
		$options[] = array("type" => "section", "icon" => "dashicons-admin-tools", "title" => __("App Settings", "wpmob"), "id" => "wpmob_apps", "expanded" => "true");

		foreach ($this->appClasses as $appClass) {
			$options = array_merge($options, $appClass::getAdminOptions());
		}

		return $options;
	}

	function getDefaultSettings() {
		$settings = array();
		# Default settings for the loaded apps.
		foreach ($this->appClasses as $appClass) {
			$settings = array_merge($settings, $appClass::getDefaultSettings());
		}

		return $settings;
	}

	function on_activation() {
		# Register the default settings for each app only the first time.
		foreach ($this->getDefaultSettings() as $appID => $settings) {
			foreach ($settings as $settingID => $setting) {
				# If the setting does not exist, set it.
				if (!get_option($settingID))
					update_option($settingID, $setting);
			}
		}
	}

}
?>