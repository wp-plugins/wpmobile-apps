<?php
/*
 Plugin Name: WPMobile Apps
 Plugin URI: http://www.wp-tmobile.com
 Version: 1.0
 Description: Create a mobile WordPress website experience on your website.
 Author: SysCrunch
 Author URI: http://www.syscrunch.com/
 Text Domain: wpmob
 Domain Path: /langs
 License: GNU General Public License 2.0 (GPL) http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 Trademark:
 */

ini_set('display_errors', 0);
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

define('WPMOB_VERSION', '1.0.0');
define('WPMOB_DIR', dirname(__FILE__));
define('WPMOB_URL', plugins_url('', __FILE__));

/*
 * Currently there is a single Theme.
 * In the future, all the themes shall be scanned directly from the /themes folder
 * in this plugin.
 *
 * These constants and variables are defined to handle the theme.
 */
define('WPMOB_THEME_DIR', WPMOB_DIR . '/themes/mobilissimo');
define('WPMOB_THEME_URL', plugins_url('themes/mobilissimo', __FILE__));
define('WPMOB_THEME_BASE_CLASS_PATH', WPMOB_DIR . '/core/theme/class-wpmob-theme.php');
$GLOBALS['WPMOB_THEME_CLASS'] = 'WPMobilissimo';
define('WPMOB_THEME_CLASS_PATH', WPMOB_DIR . '/core/theme/class-wpmob-mobilissimo.php');
# Default theme settings
define('WPMOB_DEFAULT_THEME_NAME', 'Mobilissimo');
define('WPMOB_DEFAULT_THEME_TEMPLATE', 'mobilissimo');
define('WPMOB_DEFAULT_THEME_CSS', 'mobilissimo');


# Register the embedded themes.
register_theme_directory(WPMOB_DIR . '/themes');
# Hide WPMobile themes from the themes.php page since they are not standalone themes.
add_filter('wp_prepare_themes_for_js', 'hideWPMobileThemes');
function hideWPMobileThemes($themes) {
	unset($themes['mobilissimo']);
	return $themes;
}


# Load the theme redirection functionality
require_once (WPMOB_DIR . '/core/class-wpmob-theme-switcher.php');
require_once (WPMOB_DIR . '/core/class-wpmob-theme-switch-manager.php');
$wpmobSwitcher = new WPMobSwitcher();
# Template hook.
add_filter('template', array($wpmobSwitcher, 'deliver_template'), 10, 0);
# Stylesheet hook.
add_filter('stylesheet', array($wpmobSwitcher, 'deliver_stylesheet'), 10, 0);
# Hook the save action to the load-{parent_page_slug}_page_{plugin_subpage_slug} action.
# It will save the settings once the subpage is loaded.
add_action('load-wpmobile-apps_page_wpmobile-redir', array('WPMobThemeSwitchManager', 'save'));


# Load the WPMobile class
require_once (WPMOB_DIR . '/core/class-wpmob.php');
$wpmob = new WPMobile();

# Activation hook for plugin initialization
register_activation_hook(__FILE__, array($wpmob, 'on_activation'));
register_deactivation_hook(__FILE__, array($wpmob, 'on_deactivation'));
register_uninstall_hook(__FILE__, array('WPMobile', 'on_uninstall'));
# Setup filters, plugin overrides, load domain text.
add_action('plugins_loaded', array($wpmob, 'plugins_loaded'));
# Add custom action buttons in the plugin list
add_filter('plugin_action_links', array($wpmob, 'addCustomActionLinks'), 10, 2);
# Parse requests
add_action('wp', array($wpmob, 'parseRequest'), 10, 1);
# Initialize immediately the plugin
$wpmob -> initialize();
?>