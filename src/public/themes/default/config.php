<?php
/**
 * Theme Configuration
 */

// Theme Autoloader
require_once __DIR__.'/autoload.php';

// Alias to theme class
class theme extends \projectcleverweb\lastautoindex\themes\default_theme\main {}

// Add special cases for when trying to login or install
if (isset($_GET['login']) && theme::$config['allow_login']) {
	theme::use_part('login', 'template', 'index');
} elseif (isset($_GET['install']) && defined('LAI_INSTALLED') == 1 && LAI_INSTALLED === FALSE) {
	theme::use_part('install', 'template', 'index');
}

// Now show the theme
theme::display();
