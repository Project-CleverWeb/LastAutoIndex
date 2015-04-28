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
	public static $dir;
	
	public static function init() {
		self::set_vars();
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
	
	
}
