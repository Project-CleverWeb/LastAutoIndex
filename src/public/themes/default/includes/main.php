<?php
/**
 * Default Theme Class
 */

namespace projectcleverweb\lastautoindex\themes\default_theme;

/**
 * Default Theme Class (view-model)
 * ================================
 * This class extends the built-in theme functionality to work for this specific
 * Theme. This is completely optional, but can be very useful. The above
 * namespace is only used to show this is a built-in theme. Feel free to use
 * your own namespace.
 * 
 * NOTE: This class is aliased to the class "\theme" in the theme config file.
 */
abstract class main extends \projectcleverweb\lastautoindex\theme {
	// Specific to this class
	public static $template_options;
	public static $inc_var_list = array();
	
	// Added Absolute Paths
	public static $assets_dir;
	public static $fonts_dir;
	public static $images_dir;
	public static $scripts_dir;
	public static $styles_dir;
	public static $contents_dir;
	public static $includes_dir;
	public static $layouts_dir;
	public static $templates_dir;
	// Added URI Paths
	public static $assets_uri;
	public static $fonts_uri;
	public static $images_uri;
	public static $scripts_uri;
	public static $styles_uri;
	public static $contents_uri;
	public static $includes_uri;
	public static $layouts_uri;
	public static $templates_uri;
	
	
	public static function init() {
		self::_set_vars();
	}
	
	private static function _set_vars() {
		// paths
		self::$assets_dir    = self::$theme_dir.DIRECTORY_SEPARATOR.'assets';
		self::$fonts_dir     = self::$assets_dir.DIRECTORY_SEPARATOR.'fonts';
		self::$images_dir    = self::$assets_dir.DIRECTORY_SEPARATOR.'images';
		self::$scripts_dir   = self::$assets_dir.DIRECTORY_SEPARATOR.'scripts';
		self::$styles_dir    = self::$assets_dir.DIRECTORY_SEPARATOR.'styles';
		self::$contents_dir  = self::$theme_dir.DIRECTORY_SEPARATOR.'contents';
		self::$includes_dir  = self::$theme_dir.DIRECTORY_SEPARATOR.'includes';
		self::$layouts_dir   = self::$theme_dir.DIRECTORY_SEPARATOR.'layouts';
		self::$templates_dir = self::$theme_dir.DIRECTORY_SEPARATOR.'templates';
		// uri's
		self::$assets_uri    = self::$theme_uri.'/assets';
		self::$fonts_uri     = self::$assets_uri.'/fonts';
		self::$images_uri    = self::$assets_uri.'/images';
		self::$scripts_uri   = self::$assets_uri.'/scripts';
		self::$styles_uri    = self::$assets_uri.'/styles';
		self::$contents_uri  = self::$theme_uri.'/contents';
		self::$includes_uri  = self::$theme_uri.'/includes';
		self::$layouts_uri   = self::$theme_uri.'/layouts';
		self::$templates_uri = self::$theme_uri.'/templates';
	}
	
	private static function _include($type = '', $path, $var_list = array(), $cb) {
		$path = DIRECTORY_SEPARATOR.$path;
		switch ($type) {
			case 'asset':
			case 'assets':
				$new_path = self::$assets_dir.$path;
				break;
			case 'font':
			case 'fonts':
				$new_path = self::$fonts_dir.$path;
				break;
			case 'image':
			case 'images':
				$new_path = self::$images_dir.$path;
				break;
			case 'script':
			case 'scripts':
				$new_path = self::$scripts_dir.$path;
				break;
			case 'style':
			case 'styles':
				$new_path = self::$styles_dir.$path;
				break;
			case 'content':
			case 'contents':
				$new_path = self::$contents_dir.$path;
				break;
			case 'include':
			case 'includes':
				$new_path = self::$includes_dir.$path;
				break;
			case 'layout':
			case 'layouts':
				$new_path = self::$layouts_dir.$path;
				break;
			case 'template':
			case 'templates':
				$new_path = self::$templates_dir.$path;
				break;
			
			// Ok, just try to include from the theme directory
			default:
				$new_path = self::$theme_dir.$path;
				break;
		}
		return call_user_func(array(__CLASS__, '_'.$cb), $new_path);
	}
	
	public static function inc($rel_path, $inc_type = '', $var_list = array()) {
		return self::_include($inc_type, $rel_path, $var_list, __FUNCTION__);
	}
	
	private static function _inc($path, $var_list = array()) {
		return parent::inc($path, TRUE, $var_list);
	}
	
	public static function inc_once($rel_path, $inc_type = '', $var_list = array()) {
		return self::_include($inc_type, $rel_path, $var_list, __FUNCTION__);
	}
	
	private static function _inc_once($path, $var_list = array()) {
		return parent::inc_once($path, TRUE, $var_list);
	}
	
	public static function req($rel_path, $inc_type = '', $var_list = array()) {
		return self::_include($inc_type, $rel_path, $var_list, __FUNCTION__);
	}
	
	private static function _req($path, $var_list = array()) {
		return parent::req($path, TRUE, $var_list);
	}
	
	public static function req_once($rel_path, $inc_type = '', $var_list = array()) {
		return self::_include($inc_type, $rel_path, $var_list, __FUNCTION__);
	}
	
	private static function _req_once($path, $var_list = array()) {
		return parent::req_once($path, TRUE, $var_list);
	}
	
	
	public static function part($path, $type = '', $id = '') {
		if (empty($id)) {
			$id = $path;
		}
		if (isset(self::$template_options[$id])) {
			extract(self::$template_options[$id]);
		}
		return self::inc($path.'.php', $type, self::$inc_var_list);
	}
	
	public static function use_part($path, $type = '', $id = '') {
		if (empty($id)) {
			$id = $path;
		}
		if (isset(self::$template_options[$id])) {
			return FALSE;
		}
		self::$template_options[$id] = array(
			'type' => $type,
			'path' => $path
		);
		return TRUE;
	}
	
	public static function display() {
		self::init();
		parent::display();
	}
}
