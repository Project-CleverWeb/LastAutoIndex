<?php
/**
 * Main Class
 */

namespace projectcleverweb\lastautoindex;

/**
 * Main Class (controller)
 * =======================
 * This is the "controller" of LAI's MVC framework
 * 
 * Here is a visual representation the "chain of command" within this system
 * //===VISUAL MAP=====================\\
 * ||                                  ||
 * ||       [Controller]               ||
 * ||          |   |                   ||
 * ||   --------   |                   ||
 * ||   |          V                   ||
 * ||   |    ---[Model]<--->[Database] ||
 * ||   |    |     ^                   ||
 * ||   V    V     |                   ||
 * || [View-Model]--                   ||
 * ||      |                           ||
 * ||      V                           ||
 * ||    [View]                        ||
 * ||                                  ||
 * \\==================================//
 * 
 * @see http://en.wikipedia.org/wiki/Model%E2%80%93view%E2%80%93controller
 */
class main {
	
	public static $error;
	public static $config_file = __DIR__.'/../config.php';
	public static $config;
	public static $base_dir;
	public static $public_dir;
	public static $system_dir;
	public static $themes_dir;
	public static $theme_dir;
	public static $base_uri;
	public static $public_uri;
	public static $themes_uri;
	public static $theme_uri;
	public static $db = FALSE;
	public static $server;
	
	
	
	
	public static function init ($config_file = '') {
		self::$error  = new error();
		self::$config = self::_get_config($config_file);
		self::_check_config(self::$config);
		self::set_vars(self::$config);
		debug::init();
		theme::init();
	}
	
	private static function _get_config($config_file = '') {
		if (!empty($config_file)) {
			if (is_file($config_file)) {
				self::$config_file = realpath($config_file);
				return require_once $config_file;
			}
			self::$error->standard('Configuration file "'.$config_file.'" doesn\'t exist!');
		}
		
		if (!is_file(self::$config_file)) {
			self::$error->fatal('No configuration file exists!');
		}
		self::$config_file = realpath(self::$config_file);
		return require_once self::$config_file;
	}
	
	private static function _check_config($config) {
		$required_configs = array(
			'use_login'
		);
		
		$error_fmt = 'Configuration Option "%1$s" doesn\'t exist!';
		$errors = 0;
		foreach ($required_configs as $required_config) {
			if (!isset($config[$required_config])) {
				self::$error->standard(sprintf($error_fmt, $required_config));
			}
		}
		if ($errors) {
			self::$error->fatal('Configuration file is broken! (options are missing)');
		}
	}
	
	protected static function set_vars($config) {
		self::$server         = $_SERVER;
		self::$base_dir       = self::get_base_dir();
		self::$system_dir     = self::$base_dir.'/system';
		self::$public_dir     = self::$base_dir.'/public';
		self::$themes_dir     = self::$public_dir.'/themes';
		self::$theme_dir      = self::$themes_dir.'/'.$config['theme'];
		self::$base_uri       = self::get_base_uri();
		self::$public_uri     = self::$base_uri.'/public';
		self::$themes_uri     = self::$public_uri.'/themes';
		self::$theme_uri      = self::$themes_uri.'/'.$config['theme'];
		if ($config['use_login']) {
			if (!isset($config['database_host'], $config['database_user'], $config['database_pass'], $config['database_name'])) {
				self::$error->fatal('Database var(s) are not set');
			}
			self::$db = new database($config['database_host'], $config['database_user'], $config['database_pass'], $config['database_name']);
		}
	}
	
	protected static function get_base_dir() {
		return realpath(__DIR__.'/..');
	}
	
	protected static function get_base_uri() {
		$uri = substr(self::$base_dir, strlen($_SERVER['DOCUMENT_ROOT']));
		return sprintf(
			'%1$s://%2$s%3$s%4$s',
			self::$server['REQUEST_SCHEME'],
			self::$server['HTTP_HOST'],
			((int) self::$server['SERVER_PORT'] == 80 ? '' : ':'.self::$server['SERVER_PORT']),
			str_replace('\\', '/', $uri)
		);
	}
	
	
}
