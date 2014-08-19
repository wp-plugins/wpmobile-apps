<?php
class WPMobAppCallUs {
	var $appID;

	function __construct() {
		$this -> appID = 'wpmob_app_call_us';
	}

	function render() {
		include_once (WPMOB_DIR . '/apps/call-us/view.php');
		wp_enqueue_script('wpmob-call-us-js', WPMOB_URL . '/apps/call-us/app.js', array('jquery'), '', true);
		wp_enqueue_style('wpmob-call-us-css', WPMOB_URL . '/apps/call-us/app.css', array(), '', 'all');
	}

	static function getAdminOptions() {
		$options = array();
		$options[] = array("section" => "wpmob_apps", "type" => "heading", "title" => __("Call us", "wpmob-call-us"), "id" => "wpmob_call_us");
		$options[] = array("under_section" => "wpmob_call_us", "type" => "text", "name" => __("Order", "wpmob-call-us"), "placeholder" => "", "id" => "wpmob_app_call_us_order", "desc" => __("Order", "wpmob-call-us"), "default" => 1);
		$options[] = array("under_section" => "wpmob_call_us", "type" => "text", "name" => __("Label", "wpmob-call-us"), "placeholder" => "", "id" => "wpmob_app_call_us_label", "desc" => __("Label to display.", "wpmob-call-us"), "default" => __("Call us", "wpmob-call-us"));
		$options[] = array("under_section" => "wpmob_call_us", "type" => "text", "name" => __("Text Icon", "wpmob-call-us"), "placeholder" => "", "id" => "wpmob_app_call_us_text_icon", "desc" => __("Icon to display, more <a href='http://fortawesome.github.io/Font-Awesome/icons/' target='_blank'>here</a>", "wpmob-call-us"), "default" => 'fa fa-phone');
		$options[] = array("under_section" => "wpmob_call_us", "type" => "text", "name" => __("<strong>Phone number</strong>", "wpmob-call-us"), "placeholder" => __("+1 415 599 2671", "wpmob-call-us"), "id" => "wpmob_app_call_us_phone", "desc" => __("Please enter your phone number.", "wpmob-call-us"));

		return $options;
	}

	static function getDefaultSettings() {
		WPMobAppCallUs::loadDomainText();
		$appSettings = array();
		$appSettings["wpmob_app_call_us"] = array();
		$appSettings["wpmob_app_call_us"]["wpmob_app_call_us_base_dir"] = 'call-us';
		$appSettings["wpmob_app_call_us"]["wpmob_app_call_us_slug"] = '#call-us';
		$appSettings["wpmob_app_call_us"]["wpmob_app_call_us_order"] = 1;
		$appSettings["wpmob_app_call_us"]["wpmob_app_call_us_label"] = __('Call us', 'wpmob-call-us');
		$appSettings["wpmob_app_call_us"]["wpmob_app_call_us_text_icon"] = 'fa fa-phone';

		return $appSettings;
	}
	
	static function loadDomainText(){
		# Load Text Domain
		load_plugin_textdomain('wpmob-call-us', false, basename(WPMOB_DIR) . '/apps/' . basename(dirname(__FILE__)) . '/langs');
	}

}
?>