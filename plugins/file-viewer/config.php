<?php
/**
 * "File-Viewer" Plugin Config
 */


$plugin_name = 'file-viewer';
_require_once(__DIR__."/$plugin_name.class.php");
$plugin_instance = new $plugin_name;


if ($_lai->plugin->register($plugin_name, $plugin_instance)==0) {
	unset($plugin_name, $plugin_instance);
	return;
}

$_lai->plugin->add_runfile($plugin_name,'run.php');

if (isset($_lai->example)==0) {
	$_lai->example = new $plugin_instance ;
}
