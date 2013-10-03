<?php
/*
 * Plugin Name: Script Library: D3.js
 * Plugin URI: http://wordpress.lowtone.nl/scripts-d3
 * Plugin Type: lib
 * Description: Include D3.js.
 * Version: 1.0
 * Author: Lowtone <info@lowtone.nl>
 * Author URI: http://lowtone.nl
 * License: http://wordpress.lowtone.nl/license
 */

namespace lowtone\scripts\d3 {

	use lowtone\content\packages\Package;

	// Includes
	
	if (!include_once WP_PLUGIN_DIR . "/lowtone-content/lowtone-content.php") 
		return trigger_error("Lowtone Content plugin is required", E_USER_ERROR) && false;

	$GLOBALS["lowtone_scripts_d3"] = Package::init(array(
			Package::INIT_PACKAGES => array("lowtone\\scripts"),
			Package::INIT_SUCCESS => function() {
				return array(
						"registered" => \lowtone\scripts\register(__DIR__ . "/assets/scripts", array(), "3.3.6")
					);
			}
		));

	function registered() {
		global $lowtone_scripts_d3;
		
		return isset($lowtone_scripts_d3["registered"]) ? $lowtone_scripts_d3["registered"] : false;
	}
	
}