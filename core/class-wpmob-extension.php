<?php

/**
 * This class is used as a base to genaralize common properties
 * and methods for classes to be used in the the main plugin file.
 */

abstract class WPMobExtension {
	/**
	 * It registers the necessary actions to start the extension.
	 */
	function initialize() {
		return;
	}

	/**
	 * It initializes the configuration panel in the wordpres
	 * administration. This method is called with the add_action()
	 * hook in the admin-menu.php file.
	 */
	function admin_panel() {
		return;
	}

	/**
	 * Default settings to save in the database. 
	 */
	function getDefaultSettings() {
		return array();
	}

	/**
	 * Method to be called on plugin activation.
	 */
	function on_activation() {
		# What happens on activation?
		return;
	}

	/**
	 * Method to be called on plugin deactivation.
	 */
	function on_deactivation() {
		# Temporarily deactivate the apps
		return; 
	}

}
?>