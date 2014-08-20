<?php 

/**
*
* === Functions.php ===
*
* Main wordpress functions.php file, this file and all of it's
* functions will trigger everytime the theme is loaded.
*
* In this file you will mainly find includes of other files
* which contains a specific functions or very important
* functions initializations.
*
**/




/**
*
* === Theme Options initialization & other functions ===
*
* Initialize Theme Options & includes helper, config, action
* functions necessary for the theme funcionallity
*
**/

/* Theme Functions */
include_once 'functions/config.php';
include_once 'functions/custom.php';
include_once 'functions/helpers.php';
include_once 'functions/actions.php';
include_once 'shortcodes.php';

/* Theme Options */
if(is_admin()){
	require_once 'acera-options/options-init.php';
}

?>