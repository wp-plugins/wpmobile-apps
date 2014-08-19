<?php
/**
 * Theme switching functionality
 *
 * The theme switching utilizes the MobileESP library to detect
 * the browser User Agent and determine if it's a 'handheld' or 'tablet'.
 * This class uses wordpress theme and stylesheet hooks.
 *
 */
class WPMobSwitcher {
	var $device = NULL;
	# Theme for handheld devices (e.g. iPhone, iPod)
	var $handheld_theme = NULL;
	# Tablet theme (e.g. iPad, Android tablets).
	var $tablet_theme = NULL;
	# Current selected theme.
	var $active_theme = NULL;
	# Theme to use instead of the the default one, in case the user requests it.
	var $theme_override = NULL;

	public function __construct() {
		//Retrieve the admin's saved device theme
		$this -> retrieve_saved_device_themes();
		//Detect the user's device
		$this -> device = $this -> detect_users_device();
		//Determine if a theme override is in order, i.e. 'View Full Website'
		$this -> detect_requested_theme_override();
	}

	/**
	 * Retrive the saved device/theme selections (WPMobile Apps > Theme Activation)
	 *
	 * The themes for each device are retrieved and set to this object properties.
	 * For example $this->handheld_theme. They are used to decide which theme is
	 * delivered.
	 */
	public function retrieve_saved_device_themes() {
		//The theme option is a url encoded string containing 3 values for name, template, and stylesheet
		parse_str(get_option('wpmob_handheld_theme'), $this -> handheld_theme);
		parse_str(get_option('wpmob_tablet_theme'), $this -> tablet_theme);

		//Retrieve the current active theme
		$this -> active_theme = array('name' => get_option('current_theme'), 'template' => get_option('template'), 'stylesheet' => get_option('stylesheet'));
	}

	/**
	 * Device Detection from device-theme-switcher plugin.
	 *
	 * Detect the user's device by using the MobileESP library written by Anthony Hand [http://blog.mobileesp.com/].
	 * Return the string name of their device.
	 *
	 * @return string device The current user's device in one of four options:
	 * active, handheld, tablet, low_support
	 */
	static function detect_users_device() {
		$device = 'desktop';

		//Check for Varnish Device Detect: https://github.com/varnish/varnish-devicedetect/
		//Thanks to Tim Broder for this addition! https://github.com/broderboy | http://timbroder.com/
		$http_xua_handheld_devices = array('mobile-iphone', 'mobile-android', 'mobile-firefoxos', 'mobile-smartphone', 'mobile-generic');
		$http_xua_tablet_devices = array('tablet-ipad', 'tablet-android');

		//Determine if the HTTP X UA server variable is present
		if (isset($_SERVER['HTTP_X_UA_DEVICE'])) :
			//if it is, determine which device type is being used
			if (in_array($_SERVER['HTTP_X_UA_DEVICE'], $http_xua_handheld_devices)) : $device = 'handheld';
			elseif (in_array($_SERVER['HTTP_X_UA_DEVICE'], $http_xua_tablet_devices)) : $device = 'tablet';
			endif;
		else ://DEFAULT ACTION - Use MobileESP to sniff the UserAgent string
			//Include the MobileESP code library for acertaining device user agents
			include_once (WPMOB_DIR . '/core/util/mobile-esp.php');
			//Setup the MobileESP Class
			$ua = new uagent_info;
			//Detect if the device is a handheld
			if ($ua -> DetectSmartphone() || $ua -> DetectTierRichCss())
				$device = 'handheld';
			//Detect if the device is a tablet
			if ($ua -> DetectTierTablet() || $ua -> DetectKindle() || $ua -> DetectAmazonSilk())
				$device = 'tablet';
			//Detect if the device is a low_support device (poor javascript and css support / text-only)
			if ($ua -> DetectBlackBerryLow() || $ua -> DetectTierOtherPhones())
				$device = 'low_support';
		endif;

		//Return the user's device
		return $device;
	}

	/**
	 * This method allows to deliver a different theme than the default one for the user's
	 * device. This occurs when the the user request explicitly (e.g. theme=tablet) an alternate
	 * to the default theme, for example to view the 'Full Website'. In such case the
	 * $this -> theme_override is set together with a cookie to keep this selection for
	 * future visits.
	 */
	public function detect_requested_theme_override() {
		$this -> theme_override = $requested_theme = "";
		$cookie_name = get_option('wpmob_cookie_name');
		if (empty($cookie_name)) {
			$cookie_name = 'wpmob-alternate-theme';
		}
		update_option('wpmob_cookie_name', $cookie_name);

		# Is the user requesting an override (e.g. View Full Website)?
		if (isset($_GET['theme'])) {//i.e. site.com?theme=active
			//Clean the input data we're testing against
			$requested_theme = $_GET['theme'];
			//Does the requested theme match the detected device theme?
			if ($requested_theme == $this -> device) {
				//The default/active theme is given back and their cookie is going to be removed
				//this condition typically exsits when someone is navigating "Back to Mobile"
				setcookie($cookie_name, "", 1, COOKIEPATH, COOKIE_DOMAIN, false);
			} else {
				# The user is requesting a different theme to the default. Load only if it exists.
				$req_theme = $requested_theme . "_theme";
				if (!empty($this -> $req_theme)) {
					//Retrieve the stored cookie lifespan in Theme Activation. By default (0) expires at the end of the PHP session.
					$cookie_expiration = ($lifespan = get_option('wpmob_cookie_lifespan')) ? time() + $lifespan : 0;
					// Store the selected theme in the cookie for future visits.
					$cookie_settings = array('theme' => $requested_theme, 'device' => $this -> device);
					setcookie($cookie_name, json_encode($cookie_settings), $cookie_expiration, COOKIEPATH, COOKIE_DOMAIN, false);
					// Set the theme override.
					$this -> theme_override = $requested_theme;
				}
			}
		} else {
			# No override requested, check if there is one stored in the cookie.
			if (isset($_COOKIE[$cookie_name])) {
				# Decode the cookie value into a json object.
				$redir_cookie = json_decode($_COOKIE[$cookie_name]);
				$sel_theme = $redir_cookie -> theme . "_theme";
				if (isset($this -> $sel_theme)) {
					# Set the theme override.
					$this -> theme_override = $redir_cookie -> theme;
				}
			}
		}
	}

	/**
	 * Deliver template. WordPress filter deliver_template.
	 *
	 * By defaul return the current theme set in Appearance -> Themes. If the user
	 * is using a handheld or tablet deliver the associated theme if set (WPMobile Apps -> Theme Activation).
	 * If the user is explicitly requesting an alternate theme (e.g. theme=active) deliver
	 * that theme.
	 */
	function deliver_template() {
		return $this -> deliver_theme_file('template');
	}

	/**
	 * Deliver stylesheet. WordPress filter deliver_stylesheet.
	 *
	 * By defaul return the current theme set in Appearance -> Themes. If the user
	 * is using a handheld or tablet deliver the associated theme if set (WPMobile Apps -> Theme Activation).
	 * If the user is explicitly requesting an alternate theme (e.g. theme=active) deliver
	 * that theme.
	 */
	function deliver_stylesheet() {
		return $this -> deliver_theme_file('stylesheet');
	}

	/**
	 * Return a theme file, template or stylesheet.
	 *
	 * This is a single wrapper function for two hooks. The $file argument passed
	 * in determines which theme file is returned to the calling hook,
	 *
	 * @param  string $file the name of the theme asset being requested. Can be either 'name', 'template', or 'stylesheet'
	 * @return string the theme directory name of the theme template or stylesheet.
	 */
	function deliver_theme_file($file) {
		# Update the active theme setting so that other plugins can modify pre_option_template or pre_option_stylesheet
		$this -> active_theme = array('name' => get_option('current_theme'), 'template' => get_option('template'), 'stylesheet' => get_option('stylesheet'));

		/* If a theme override has been requested, return that theme's template directory
		 * If there is no theme override, return the users device assigned theme if it is
		 * set. Otherwise return the active theme.
		 * 
		 * Load the default theme if it is the wordpress administration. 
		 */
		$overr_theme = $this -> theme_override . "_theme";
		$device_theme = $this -> device . "_theme";
		if (!is_admin() && !empty($this -> $overr_theme)) {
			$sel_theme = $this -> $overr_theme;
			return $sel_theme[$file];
		} elseif (!is_admin() && !empty($this -> $device_theme)) {
			$sel_theme = $this -> $device_theme;
			return $sel_theme[$file];
		} else {
			return $this -> active_theme[$file];
		}
	}

}
?>