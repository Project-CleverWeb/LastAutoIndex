<?php
/**
 * Theme Class
 */

namespace projectcleverweb\lastautoindex;

/**
 * Theme Class (view-model)
 * ========================
 * Provides a collection of methods and information that are commonly used in
 * theming for LastAutoIndex.
 */
class theme {
	
	public static $base_dir;
	public static $public_dir;
	public static $system_dir;
	public static $themes_dir;
	public static $theme_dir;
	public static $base_uri;
	public static $public_uri;
	public static $themes_uri;
	public static $theme_uri;
	public static $config;
	public static $dir;
	public static $search = FALSE;
	public static $markdown;
	public static $github;
	public static $styles;
	public static $scripts;
	public static $styles_queue;
	public static $scripts_queue;
	
	/**
	 * Set variables and get theme config file
	 * 
	 * @return void
	 */
	public static function init() {
		self::set_vars();
		// Get theme configuration
		if (is_file(self::$theme_dir.'/config.php')) {
			require_once self::$theme_dir.'/config.php';
		}
	}
	
	/**
	 * Set the commonly used variables
	 * 
	 * @return void
	 */
	protected static function set_vars() {
		self::$base_dir   = &main::$base_dir;
		self::$public_dir = &main::$public_dir;
		self::$system_dir = &main::$system_dir;
		self::$themes_dir = &main::$themes_dir;
		self::$theme_dir  = &main::$theme_dir;
		self::$base_uri   = &main::$base_uri;
		self::$public_uri = &main::$public_uri;
		self::$themes_uri = &main::$themes_uri;
		self::$theme_uri  = &main::$theme_uri;
		self::$dir        = new directory_listing;
		self::$markdown   = new markdown;
		self::$github     = &main::$github;
		if (isset($_GET['s']) && !empty($_GET['s'])) {
			self::$search = search::regex('/'.(string) $_GET['s'].'/i');
		}
	}
	
	/**
	 * Works like `include $theme_dir.'/'.$path`
	 * 
	 * @param  String  $path     The path to the file you want to include
	 * @param  boolean $is_abs   Is this an absolute path? Defaults to FALSE
	 * @param  array   $var_list List of variables to extract()
	 * @return mixed             Value of the file included
	 */
	public static function inc($path, $is_abs = FALSE, $var_list = array()) {
		if (!$is_abs) {
			$path = self::$theme_dir.DIRECTORY_SEPARATOR.$path;
		}
		if (!is_file($path)) {
			main::$error->warning('Theme: File "'.$path.'" doesn\'t exist!');
			return FALSE;
		}
		// Undo the variables set by this function
		if (!isset($var_list['path'])) {
			self::_inc_path($path);
			$var_list['path'] = NULL;
		}
		if (!isset($var_list['is_abs'])) {
			$var_list['is_abs'] = NULL;
		}
		if (!isset($var_list['var_list'])) {
			$var_list['var_list'] = NULL;
		}
		extract($var_list);
		return include self::_inc_path();
	}
	
	/**
	 * Works like `include_once $theme_dir.'/'.$path`
	 * 
	 * @param  String  $path     The path to the file you want to include
	 * @param  boolean $is_abs   Is this an absolute path? Defaults to FALSE
	 * @param  array   $var_list List of variables to extract()
	 * @return mixed             Value of the file included
	 */
	public static function inc_once($path, $is_abs = FALSE, $var_list = array()) {
		if (!$is_abs) {
			$path = self::$theme_dir.DIRECTORY_SEPARATOR.$path;
		}
		if (!is_file($path)) {
			main::$error->warning('Theme: File "'.$path.'" doesn\'t exist!');
			return FALSE;
		}
		// Undo the variables set by this function
		if (!isset($var_list['path'])) {
			self::_inc_path($path);
			$var_list['path'] = NULL;
		}
		if (!isset($var_list['is_abs'])) {
			$var_list['is_abs'] = NULL;
		}
		if (!isset($var_list['var_list'])) {
			$var_list['var_list'] = NULL;
		}
		extract($var_list);
		return include_once self::_inc_path();
	}
	
	/**
	 * Works like `require $theme_dir.'/'.$path`
	 * 
	 * @param  String  $path     The path to the file you want to include
	 * @param  boolean $is_abs   Is this an absolute path? Defaults to FALSE
	 * @param  array   $var_list List of variables to extract()
	 * @return mixed             Value of the file included
	 */
	public static function req($path, $is_abs = FALSE, $var_list = array()) {
		if (!$is_abs) {
			$path = self::$theme_dir.DIRECTORY_SEPARATOR.$path;
		}
		if (!is_file($path)) {
			main::$error->fatal('Theme: File "'.$path.'" doesn\'t exist!');
			return FALSE;
		}
		// Undo the variables set by this function
		if (!isset($var_list['path'])) {
			self::_inc_path($path);
			$var_list['path'] = NULL;
		}
		if (!isset($var_list['is_abs'])) {
			$var_list['is_abs'] = NULL;
		}
		if (!isset($var_list['var_list'])) {
			$var_list['var_list'] = NULL;
		}
		extract($var_list);
		return require self::_inc_path();
	}
	
	/**
	 * Works like `require_once $theme_dir.'/'.$path`
	 * 
	 * @param  String  $path     The path to the file you want to include
	 * @param  boolean $is_abs   Is this an absolute path? Defaults to FALSE
	 * @param  array   $var_list List of variables to extract()
	 * @return mixed             Value of the file included
	 */
	public static function req_once($path, $is_abs = FALSE, $var_list = array()) {
		if (!$is_abs) {
			$path = self::$theme_dir.DIRECTORY_SEPARATOR.$path;
		}
		if (!is_file($path)) {
			main::$error->fatal('Theme: File "'.$path.'" doesn\'t exist!');
			return FALSE;
		}
		// Undo the variables set by this function
		if (!isset($var_list['path'])) {
			self::_inc_path($path);
			$var_list['path'] = NULL;
		}
		if (!isset($var_list['is_abs'])) {
			$var_list['is_abs'] = NULL;
		}
		if (!isset($var_list['var_list'])) {
			$var_list['var_list'] = NULL;
		}
		extract($var_list);
		return require_once self::_inc_path();
	}
	
	/**
	 * Simple function to temporarily hold a path string. Empties the storage when
	 * called without a path to store
	 * 
	 * @param  string $path Path to store
	 * @return string       The stored path or an empty string
	 */
	private static function _inc_path($path = '') {
		static $spath;
		if (!empty($path)) {
			$spath = $path;
			$tpath = $path;
		} else {
			$tpath = $spath;
			$spath = '';
		}
		return $tpath;
	}
	
	/**
	 * Allows stylesheets to be automatically called when queued
	 * 
	 * @param  string $id      The id of the stylesheet (allows overwrite)
	 * @param  string $path    The path to the stylesheet
	 * @param  array  $options The options for this stylesheet
	 * @return void
	 */
	public static function register_style($id, $path, $options = array()) {
		$valid_options = array(
			'media'  => 'all',
			'order'  => 1000,
			'insert' => FALSE
		);
		foreach ($valid_options as $key => &$value) {
			if (isset($options[$key])) {
				$value = $options[$key];
			}
		}
		self::$styles[$id] = array(
			'path'    => $path,
			'options' => $valid_options
		);
	}
	
	/**
	 * Allows scripts to be automatically called when queued
	 * 
	 * @param  string $id      The id of the script (allows overwrite)
	 * @param  string $path    The path to the script
	 * @param  array  $options The options for this script
	 * @return void
	 */
	public static function register_script($id, $path, $options = array()) {
		$valid_options = array(
			'order'  => 1000,
			'insert' => FALSE
		);
		foreach ($valid_options as $key => &$value) {
			if (isset($options[$key])) {
				$value = $options[$key];
			}
		}
		self::$scripts[$id] = array(
			'path'    => $path,
			'options' => $valid_options
		);
	}
	
	/**
	 * Tells styles() to use this stylesheet
	 * 
	 * @param  string  $id The id of an already registered stylesheet
	 * @return boolean     True on success, FALSE if $id doesn't exist
	 */
	public static function queue_style($id) {
		if (isset(self::$styles[$id])) {
			self::$styles_queue[(self::$styles[$id]['options']['order'])] = $id;
			return TRUE;
		}
		return FALSE;
	}
	
	/**
	 * Tells scripts() to use this script
	 * 
	 * @param  string  $id The id of an already registered stylesheet
	 * @return boolean     True on success, FALSE if $id doesn't exist
	 */
	public static function queue_script($id) {
		if (isset(self::$scripts[$id])) {
			self::$scripts_queue[(self::$scripts[$id]['options']['order'])] = $id;
			return TRUE;
		}
		return FALSE;
	}
	
	/**
	 * Print the page styles
	 * 
	 * @return void
	 */
	public static function styles() {
		$fmt = '<link rel="stylesheet" id="style-%1$s" href="%2$s" type="text/css" media="%3$s"/>'.PHP_EOL;
		ksort(self::$styles_queue);
		foreach (self::$styles_queue as $id) {
			$data = self::$styles[$id];
			printf($fmt, $id, $data['path'], $data['options']['media']);
		}
	}
	
	/**
	 * Print the page scripts
	 * 
	 * @return void
	 */
	public static function scripts() {
		$fmt = '<script id="script-%1$s" type="text/javascript" src="%2$s"></script>'.PHP_EOL;
		ksort(self::$scripts_queue);
		foreach (self::$scripts_queue as $id) {
			$data = self::$scripts[$id];
			printf($fmt, $id, $data['path']);
		}
	}
	
	/**
	 * Include the theme's main index file.
	 * 
	 * @return void
	 */
	public static function display() {
		if (!is_file(self::$theme_dir.DIRECTORY_SEPARATOR.'index.php')) {
			main::$error->fatal('Theme: main index file does not exist in your theme! ('.self::$theme_dir.DIRECTORY_SEPARATOR.'index.php)');
		}
		if (defined('LAI_ALLOW_MULTI_INDEX') && LAI_ALLOW_MULTI_INDEX == TRUE) {
			require self::$theme_dir.DIRECTORY_SEPARATOR.'index.php';
		} else {
			require_once self::$theme_dir.DIRECTORY_SEPARATOR.'index.php';
		}
	}
	
	/**
	 * Show the debug output
	 * 
	 * @return void
	 */
	public static function output_debug() {
		debug::output();
	}
}
