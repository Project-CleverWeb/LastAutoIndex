<?php
/**
 * "HTML" Plugin Config
 * --------------------
 */

$plugin_name = 'html';
_require_once(__DIR__."/$plugin_name.class.php");
$plugin_instance = new $plugin_name;

if ($_lai->plugin->register($plugin_name, $plugin_instance)==0) {
	unset($plugin_name, $plugin_instance);
	return;
}

$_lai->html = new $plugin_instance ;

unset($plugin_name, $plugin_instance);


