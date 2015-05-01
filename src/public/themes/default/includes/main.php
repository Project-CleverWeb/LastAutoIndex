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
	
	public static $theme_options;
	
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
		self::$assets_dir    = self::$theme_dir.'/assets';
		self::$fonts_dir     = self::$assets_dir.'/fonts';
		self::$images_dir    = self::$assets_dir.'/images';
		self::$scripts_dir   = self::$assets_dir.'/scripts';
		self::$styles_dir    = self::$assets_dir.'/styles';
		self::$contents_dir  = self::$theme_dir.'/contents';
		self::$includes_dir  = self::$theme_dir.'/includes';
		self::$layouts_dir   = self::$theme_dir.'/layouts';
		self::$templates_dir = self::$theme_dir.'/templates';
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
	
	private static function _include($type = '', $path, $cb) {
		$path = DIRECTORY_SEPARATOR.$path;
		switch ($inc_type) {
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
				$new_path = self::$theme_path.$path;
				break;
		}
		return call_user_func(array(__CLASS__, '_'.$cb), $new_path);
	}
	
	public static function inc($rel_path, $inc_type = '') {
		self::_include($rel_path, $inc_type, __FUNCTION__);
	}
	
	private static function _inc($path) {
		parent::inc($path, TRUE);
	}
	
	public static function inc_once($rel_path, $inc_type = '') {
		self::_include($rel_path, $inc_type, __FUNCTION__);
	}
	
	private static function _inc_once($path) {
		parent::inc_once($path, TRUE);
	}
	
	public static function req($rel_path, $inc_type = '') {
		self::_include($rel_path, $inc_type, __FUNCTION__);
	}
	
	private static function _req($path) {
		parent::req($path, TRUE);
	}
	
	public static function req_once($rel_path, $inc_type = '') {
		self::_include($rel_path, $inc_type, __FUNCTION__);
	}
	
	private static function _req_once($path) {
		parent::req_once($path, TRUE);
	}
	
	
	public static function part($path, $type = '', $id = '') {
		if (empty($id)) {
			$id = $path;
		}
		if (isset(self::$template_options[$id])) {
			extract(self::$template_options[$id]);
		}
		
		return self:inc($path, $tip);
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
	
}
