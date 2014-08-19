<?php
class WPMobAppContactUs {
	var $appID;

	function __construct() {
		$this -> appID = 'wpmob_app_contact_us';
	}

	function render() {
		include_once (WPMOB_DIR . '/apps/contact-us/view.php');
		wp_enqueue_script('wpmob-contact-us-js', WPMOB_URL . '/apps/contact-us/app.js', array('jquery'), '', true);
		wp_enqueue_style('wpmob-contact-us-css', WPMOB_URL . '/apps/contact-us/app.css', array(), '', 'all');
	}

	/**
	 * Handle any request data passed to this application (e.g. e-mail sending)
	 */
	function handleRequest() {
		if (array_key_exists('wpmobapp', $_REQUEST) && $_REQUEST['wpmobapp'] == 'WPMobAppContactUs') {
			if (array_key_exists('action', $_REQUEST) && $_REQUEST['action'] == 'sendmail') {
				# Send contact e-mail
				include_once (WPMOB_DIR . '/apps/contact-us/send-email.php');
				exit(1);
			} else {
				error_log('No valid action sent ' . $_REQUEST['action']);
			}
		}
	}

	static function getAdminOptions() {
		$options = array();
		$options[] = array("section" => "wpmob_apps", "type" => "heading", "title" => __("Contact us", "wpmob-contact-us"), "id" => "wpmob_contact_us");
		$options[] = array("under_section" => "wpmob_contact_us", "type" => "text", "name" => __("Order", "wpmob-contact-us"), "placeholder" => "", "id" => "wpmob_app_contact_us_order", "desc" => __("Order", "wpmob-contact-us"), "default" => 4);
		$options[] = array("under_section" => "wpmob_contact_us", "type" => "text", "name" => __("Label", "wpmob-contact-us"), "placeholder" => "", "id" => "wpmob_app_contact_us_label", "desc" => __("Label to display.", "wpmob-contact-us"), "default" => __('Contact us', "wpmob-contact-us"));
		$options[] = array("under_section" => "wpmob_contact_us", "type" => "text", "name" => __("Text Icon", "wpmob-contact-us"), "placeholder" => "", "id" => "wpmob_app_contact_us_text_icon", "desc" => __("Icon to display, more <a href='http://fortawesome.github.io/Font-Awesome/icons/' target='_blank'>here</a>", "wpmob-contact-us"), "default" => 'fa fa-envelope');
		$options[] = array("under_section" => "wpmob_contact_us", "type" => "text", "name" => __("Contact e-mail", "wpmob-contact-us"), "placeholder" => "", "id" => "wpmob_app_contact_us_address", "desc" => __("E-mail address where to send the contact information.", "wpmob-contact-us"));
		$options[] = array("under_section" => "wpmob_contact_us", "type" => "text", "name" => __("Subject prefix", "wpmob-contact-us"), "placeholder" => __("Subject prefix", "wpmob-contact-us"), "id" => "wpmob_app_contact_us_subject", "desc" => __("Prefix before subject", "wpmob-contact-us"), "default" => __("[Contact form]", "wpmob-contact-us"));
		$options[] = array("type" => "textarea", "under_section" => "wpmob_contact_us", "id" => "wpmob_app_contact_us_body", "name" => __("Body text", "wpmob-contact-us"), "desc" => __("Enter a short text", "wpmob-contact-us"), "placeholder" => __("Message", "wpmob-contact-us"), "img_desc" => "", "display_checkbox_id" => "", "default" => "", "rich_editor" => "true");
		$options[] = array("type" => "textarea", "under_section" => "wpmob_contact_us", "id" => "wpmob_app_contact_us_conf", "name" => __("Confirmation message", "wpmob-contact-us"), "desc" => __("This message will be shown after e-mail was sent successfully. Leave empty if none.", "wpmob-contact-us"), "placeholder" => "", "img_desc" => "", "display_checkbox_id" => "", "default" => "", "rich_editor" => "true");

		return $options;
	}

	static function getDefaultSettings() {
		WPMobAppContactUs::loadDomainText();
		$appSettings = array();
		$appSettings["wpmob_app_contact_us"] = array();
		$appSettings["wpmob_app_contact_us"]["wpmob_app_contact_us_base_dir"] = 'contact-us';
		$appSettings["wpmob_app_contact_us"]["wpmob_app_contact_us_slug"] = '#contact-us';
		$appSettings["wpmob_app_contact_us"]["wpmob_app_contact_us_form_name"] = array("label" => "", "placeholder" => __("Name", "wpmob-contact-us"), "default" => "", "required" => FALSE);
		$appSettings["wpmob_app_contact_us"]["wpmob_app_contact_us_form_email"] = array("label" => "", "placeholder" => __("E-mail", "wpmob-contact-us"), "default" => "", "required" => TRUE);
		$appSettings["wpmob_app_contact_us"]["wpmob_app_contact_us_form_subject"] = array("label" => "", "placeholder" => __("Subject", "wpmob-contact-us"), "default" => "", "required" => TRUE);
		$appSettings["wpmob_app_contact_us"]["wpmob_app_contact_us_form_message"] = array("label" => "", "placeholder" => __("Message", "wpmob-contact-us"), "default" => "", "required" => TRUE);
		$appSettings["wpmob_app_contact_us"]["wpmob_app_contact_us_form_submit"] = array("label" => __("Send Message", "wpmob-contact-us"), "placeholder" => "", "default" => "", "required" => FALSE);
		$appSettings["wpmob_app_contact_us"]["wpmob_app_contact_us_order"] = 4;
		$appSettings["wpmob_app_contact_us"]["wpmob_app_contact_us_label"] = __('Contact us', 'wpmob-contact-us');
		$appSettings["wpmob_app_contact_us"]["wpmob_app_contact_us_text_icon"] = 'fa fa-envelope';
		$appSettings["wpmob_app_contact_us"]["wpmob_app_contact_us_address"] = get_option('admin_email');
		$appSettings["wpmob_app_contact_us"]["wpmob_app_contact_us_subject"] = __('[Contact form]', 'wpmob-contact-us');
		$appSettings["wpmob_app_contact_us"]["wpmob_app_contact_us_conf"] = __('Thank you!', 'wpmob-contact-us');

		return $appSettings;
	}

	static function loadDomainText() {
		# Load Text Domain
		load_plugin_textdomain('wpmob-contact-us', false, basename(WPMOB_DIR) . '/apps/' . basename(dirname(__FILE__)) . '/langs');
	}

}
?>