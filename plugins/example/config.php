<?php
/**
 * "Example" Plugin Config
 * --------------------------
 * This is just an example of how you should setup a
 * LAI plugin.
 * 
 * LAI plugins technically only need a 'config.php' in
 * order to be used, but it is recommended that you
 * split your plugin across files/directories as
 * needed.
 */

// Since this is an example, we don't actually want the plugin run. So lets just send
// the parser back to the including script.
return;


/**
 * The config
 */

// first add any classes/variables that you plugin needs
// NOTICE: you should always unset any un-needed variables at the end of your script
$plugin_name = 'example';
_require_once(__DIR__."/$plugin_name.class.php");
$plugin_instance = new $plugin_name;

// if your plugin depends on another plugin in order to run, tell LAI that it is a
// dependency. LAI will produce an error if the plugin does not exist or is disabled
$_lai->plugin->add_dependency($plugin_name, 'css');

// now we register the plugin
if ($_lai->plugin->register($plugin_name, $plugin_instance)==0) {
	/**
	 * The register failed, don't attempt to load the
	 * plugin. Don't produce an error either, leave
	 * plugin load errors to LAI. Just send back up to
	 * the including script.
	 */
	
	// unset any un-needed variables
	unset($plugin_name, $plugin_instance);
	return;
}

// now tell the plugin handler what & when to load
if(PATH_URI != '/'){
	// tell plugin handler not to load anymore scripts for this plugin
	$_lai->plugin->disable($plugin_name);
}
// what file to run when using the plugin (is relative to this dir)
$_lai->plugin->add_runfile($plugin_name,'run.php');

// add to main variable if it's available
if (isset($_lai->example)==0) {
	$_lai->example = new $plugin_instance ;
} else {
	// No part of your script SHOULD require being on the root of the main stdClass,
	// but if it does, throw an error here.
}

// unset any un-needed variables
unset($plugin_name, $plugin_instance);

// EOF
