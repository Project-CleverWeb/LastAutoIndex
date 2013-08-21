<?php
/**
 * "Extensions" Plugin Config
 * --------------------------
 * This plugin provides advanced information about extentions
 */

_require_once(__DIR__.'extensions.class.php');


if ($_lai->plugin->register('extensions',new extensions)==0) {
	/**
	 * The register failed, don't attempt to load the plugin. Don't produce an error
	 * either, leave plugin load errors to LAI.
	 */
	return;
}

// only load the scripts when LAI is ready.
if ($_lai->plugin->is_load_time()==0) {
	return;
}

/**
 * now config the script
 */

// add to main variable
if (isset($_lai->extensions)==0) {
	$_lai->extensions = new extensions;
} else {
	// No part of your script SHOULD require being on the root of the main stdClass,
	// but if it does, throw an error here.
}