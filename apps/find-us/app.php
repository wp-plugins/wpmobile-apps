<?php
class WPMobAppFindUs {
	var $appID;

	function __construct() {
		$this -> appID = 'wpmob_app_find_us';
	}

	function render() {
		include_once (WPMOB_DIR . '/apps/find-us/view.php');
		# Enable Google Maps only if lat and long have been set.
		if (get_option($this -> appID . '_lat') && get_option($this -> appID . '_long')) {
			wp_enqueue_script('google-maps-js', 'https://maps.googleapis.com/maps/api/js', array(), '', true);
			wp_enqueue_script('wpmob-find-us-js', WPMOB_URL . '/apps/find-us/app.js', array('jquery', 'google-maps-js'), '', true);
		} else {
			wp_enqueue_script('wpmob-find-us-js', WPMOB_URL . '/apps/find-us/app.js', array('jquery'), '', true);
		}

		wp_enqueue_style('wpmob-find-us-css', WPMOB_URL . '/apps/find-us/app.css', array(), '', 'all');
	}

	static function getAdminOptions() {
		$options = array();
		$options[] = array("section" => "wpmob_apps", "type" => "heading", "title" => __("Find us", "wpmob-find-us"), "id" => "wpmob_find_us");
		$options[] = array("under_section" => "wpmob_find_us", "type" => "text", "name" => __("Order", "wpmob-find-us"), "placeholder" => "", "id" => "wpmob_app_find_us_order", "desc" => __("Order", "wpmob-find-us"), "default" => 3);
		$options[] = array("under_section" => "wpmob_find_us", "type" => "text", "name" => __("Label", "wpmob-find-us"), "placeholder" => "", "id" => "wpmob_app_find_us_label", "desc" => __("Label to display.", "wpmob-find-us"), "default" => __('Find us', 'wpmob-find-us'));
		$options[] = array("under_section" => "wpmob_find_us", "type" => "text", "name" => __("Text Icon", "wpmob-find-us"), "placeholder" => "", "id" => "wpmob_app_find_us_text_icon", "desc" => __("Icon to display, more <a href='http://fortawesome.github.io/Font-Awesome/icons/' target='_blank'>here</a>", "wpmob-find-us"), "default" => 'fa fa-map-marker');
		$options[] = array("type" => "textarea", "under_section" => "wpmob_find_us", "id" => "wpmob_app_find_us_address", "name" => __("<strong>Formatted address</strong>", "wpmob-find-us"), "desc" => __("Enter your address in the format you wish.", "wpmob-find-us"), "placeholder" => __("647 Broadway New York, NY 10012", "wpmob-find-us"), "img_desc" => "", "display_checkbox_id" => "", "default" => "", "rich_editor" => "true");
		$options[] = array("under_section" => "wpmob_find_us", "type" => "small_heading", "title" => __("Google Maps API", "wpmob-find-us"), );
		$options[] = array("under_section" => "wpmob_find_us", "type" => "text", "name" => __("Latitude", "wpmob-find-us"), "placeholder" => "", "id" => "wpmob_app_find_us_lat", "desc" => __("Latitude as retrieved in google maps.", "wpmob-find-us"), "default" => '');
		$options[] = array("under_section" => "wpmob_find_us", "type" => "text", "name" => __("Longitude", "wpmob-find-us"), "placeholder" => "", "id" => "wpmob_app_find_us_long", "desc" => __("Longitude as retrieve in google maps..", "wpmob-find-us"), "default" => '');
		#$this->options[] = array("under_section" => "wpmob_find_us", "type" => "text", "name" => __("Google Maps Api Key", "wpmob-find-us"), "placeholder" => "", "id" => "wpmob_app_find_us_api_key", "desc" => __("Enter your Google Maps key, you can get one <a href='' target='_blank'>here</a>", "wpmob-find-us"), "default" => '');

		return $options;
	}

	static function getDefaultSettings() {
		WPMobAppFindUs::loadDomainText();
		$appSettings = array();
		$appSettings["wpmob_app_find_us"] = array();
		$appSettings["wpmob_app_find_us"]["wpmob_app_find_us_base_dir"] = 'find-us';
		$appSettings["wpmob_app_find_us"]["wpmob_app_find_us_slug"] = '#find-us';
		$appSettings["wpmob_app_find_us"]["wpmob_app_find_us_order"] = 3;
		$appSettings["wpmob_app_find_us"]["wpmob_app_find_us_label"] = __('Find us', 'wpmob-find-us');
		$appSettings["wpmob_app_find_us"]["wpmob_app_find_us_text_icon"] = 'fa fa-map-marker';
		$appSettings["wpmob_app_find_us"]["wpmob_app_find_us_address"] = __('Address not available...', 'wpmob-find-us');

		return $appSettings;
	}

	static function loadDomainText(){
		# Load Text Domain
		load_plugin_textdomain('wpmob-find-us', false, basename(WPMOB_DIR) . '/apps/' . basename(dirname(__FILE__)) . '/langs');
	}
	
}
?>