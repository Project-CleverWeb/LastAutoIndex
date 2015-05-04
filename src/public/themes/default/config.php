<?php
/**
 * Theme Configuration
 * ===================
 * This file is not required for a theme, but can be very useful. This file is
 * included just before the theme index.php
 */

// Theme Autoloader
require_once __DIR__.'/includes/autoload.php';

// Alias to our custom theme class
// Alternatively, you could just extend \projectcleverweb\lastautoindex\theme
class theme extends \projectcleverweb\lastautoindex\themes\default_theme\main {}

// Run our custom init
theme::init();

// Register all scripts & styles
theme::register_style('font-awesome', theme::$styles_uri.'/font-awesome.css', array('order' => 600));
theme::register_style('webicons', theme::$styles_uri.'/webicons.min.css', array('order' => 700));
theme::register_style('semantic', theme::$styles_uri.'/semantic.min.css', array('order' => 800));
theme::register_style('highlight-js', theme::$styles_uri.'/highlight.js/github.css', array('order' => 900));
theme::register_style('main', theme::$styles_uri.'/main.css', array('order' => 1500));
theme::register_script('jquery', theme::$scripts_uri.'/jquery-2.1.3.min.js', array('order' => 500));
theme::register_script('modernizr', theme::$scripts_uri.'/modernizr-3.0.0-beta.min.js', array('order' => 600));
theme::register_script('moustrap', theme::$scripts_uri.'/mousetrap.min.js', array('order' => 700));
theme::register_script('highlight-js', theme::$scripts_uri.'/highlight.pack.min.js', array('order' => 800));
theme::register_script('semantic', theme::$scripts_uri.'/semantic.min.js', array('order' => 900));
theme::register_script('main', theme::$scripts_uri.'/main.js', array('order' => 1500));

// Add special cases for when trying to login or install
if (isset($_GET['login']) && theme::$config['allow_login']) {
	theme::use_part('login', 'template', 'index');
} elseif (isset($_GET['install']) && defined('LAI_INSTALLED') == 1 && LAI_INSTALLED === FALSE) {
	theme::use_part('install', 'template', 'index');
}
