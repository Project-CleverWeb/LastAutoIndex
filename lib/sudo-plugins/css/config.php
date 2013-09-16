<?php
/**
 * "CSS" Plugin Config
 * --------------------
 */

$plugin_name = 'css';
_require_once(__DIR__."/$plugin_name.class.php");
$plugin_instance = new $plugin_name;

if ($_lai->plugin->register($plugin_name, $plugin_instance)==0) {
	return;
}

$_lai->css = new $plugin_instance;



