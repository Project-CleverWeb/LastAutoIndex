<?php
/**
 * Theme Class
 */

namespace projectcleverweb\lastautoindex;

/**
 * Theme Class (view-model)
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
	public static $styles;
	public static $scripts;
	
	public static function init() {
		self::set_vars();
		// Get theme configuration
		if (is_file(self::$theme_dir.'/config.php')) {
			require_once self::$theme_dir.'/config.php';
		}
	}
	
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
	}
	
	public static function inc($path, $is_abs = FALSE, $var_list = array()) {
		if (!$is_abs) {
			$path = self::$theme_dir.DIRECTORY_SEPARATOR.$path;
		}
		if (!is_file($path)) {
			main::$error->warning('Theme: File "'.$path.'" doesn\'t exist!'.@r(debug_backtrace()));
			return FALSE;
		}
		if (!empty($var_list)) {
			extract($var_list);
		}
		return include $path;
	}
	
	public static function inc_once($path, $is_abs = FALSE, $var_list = array()) {
		if (!$is_abs) {
			$path = self::$theme_dir.DIRECTORY_SEPARATOR.$path;
		}
		if (!is_file($path)) {
			main::$error->warning('Theme: File "'.$path.'" doesn\'t exist!'.@r(debug_backtrace()));
			return FALSE;
		}
		if (!empty($var_list)) {
			extract($var_list);
		}
		return include_once $path;
	}
	
	public static function req($path, $is_abs = FALSE, $var_list = array()) {
		if (!$is_abs) {
			$path = self::$theme_dir.DIRECTORY_SEPARATOR.$path;
		}
		if (!is_file($path)) {
			main::$error->fatal('Theme: File "'.$path.'" doesn\'t exist!'.@r(debug_backtrace()));
			return FALSE;
		}
		if (!empty($var_list)) {
			extract($var_list);
		}
		return require $path;
	}
	
	public static function req_once($path, $is_abs = FALSE, $var_list = array()) {
		if (!$is_abs) {
			$path = self::$theme_dir.DIRECTORY_SEPARATOR.$path;
		}
		if (!is_file($path)) {
			main::$error->fatal('Theme: File "'.$path.'" doesn\'t exist!'.@r(debug_backtrace()));
			return FALSE;
		}
		if (!empty($var_list)) {
			extract($var_list);
		}
		return require_once $path;
	}
	
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
	
	public static function styles() {
		$fmt = '<link rel="stylesheet" id="style-%1$s" href="%2$s" type="text/css" media="%3$s"/>'.PHP_EOL;
		foreach (self::$styles as $id => $data) {
			printf($fmt, $id, $data['path'], $data['options']['media']);
		}
	}
	
	public static function scripts() {
		$fmt = '<script id="script-%1$s" type="text/javascript" src="%2$s"></script>'.PHP_EOL;
		foreach (self::$scripts as $id => $data) {
			printf($fmt, $id, $data['path']);
		}
	}
	
	public static function display() {
		require_once self::$theme_dir.DIRECTORY_SEPARATOR.'index.php';
	}
	
	public static function output_debug() {
		debug::output();
	}
	
}
