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
 * You should also inspect the systems built in 'theme' class. This class relies
 * heavily on it, and it should be used in all themes. So it is good to be
 * familiar with it.
 * 
 * NOTE: This class is aliased to the class "\theme" in the theme config file.
 */
abstract class main extends \projectcleverweb\lastautoindex\theme {
	// Specific to this class
	public static $template_parts;
	public static $template_used_parts;
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
	
	/**
	 * Does the setup for this class, should be run immediately after this class
	 * is loaded. (see config.php)
	 * 
	 * @return void
	 */
	public static function init() {
		self::_set_vars();
		self::part('headers', 'include');
	}
	
	/**
	 * Simple method to correctly set all variables in this class.
	 * 
	 * @return void
	 */
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
		// Class Specific
		self::$template_used_parts = array(
			'asset' => array(),
			'font' => array(),
			'image' => array(),
			'script' => array(),
			'style' => array(),
			'content' => array(),
			'include' => array(),
			'layout' => array(),
			'template' => array()
		);
	}
	
	/**
	 * Reduces redundancy across include/require methods within this class
	 * 
	 * @param  string $type     The folder to include from
	 * @param  string $path     The path to the file (usually just filename)
	 * @param  array  $var_list The list of variables to extract
	 * @param  string $cb       Name of callback function { __FUNCTION__ }
	 * @return mixed            The return value of the included file
	 */
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
	
	/**
	 * A customized version of the default inc() method
	 * 
	 * @param  string $rel_path The path to the file (usually just filename)
	 * @param  string $inc_type The folder to include from
	 * @param  array  $var_list The list of variables to extract
	 * @return mixed            The return value of the included file
	 */
	public static function inc($rel_path, $inc_type = '', $var_list = array()) {
		return self::_include($inc_type, $rel_path, $var_list, __FUNCTION__);
	}
	
	/**
	 * Passes correct information back to the default inc() include method
	 * 
	 * @param  string $path     The absolute path to the file
	 * @param  array  $var_list The list of variables to extract
	 * @return mixed            The return value of the included file
	 */
	private static function _inc($path, $var_list = array()) {
		return parent::inc($path, TRUE, $var_list);
	}
	
	/**
	 * A customized version of the default inc_once() method
	 * 
	 * @param  string $rel_path The path to the file (usually just filename)
	 * @param  string $inc_type The folder to include from
	 * @param  array  $var_list The list of variables to extract
	 * @return mixed            The return value of the included file
	 */
	public static function inc_once($rel_path, $inc_type = '', $var_list = array()) {
		return self::_include($inc_type, $rel_path, $var_list, __FUNCTION__);
	}
	
	/**
	 * Passes correct information back to the default inc_once() include method
	 * 
	 * @param  string $path     The absolute path to the file
	 * @param  array  $var_list The list of variables to extract
	 * @return mixed            The return value of the included file
	 */
	private static function _inc_once($path, $var_list = array()) {
		return parent::inc_once($path, TRUE, $var_list);
	}
	
	/**
	 * A customized version of the default req() method
	 * 
	 * @param  string $rel_path The path to the file (usually just filename)
	 * @param  string $inc_type The folder to include from
	 * @param  array  $var_list The list of variables to extract
	 * @return mixed            The return value of the included file
	 */
	public static function req($rel_path, $inc_type = '', $var_list = array()) {
		return self::_include($inc_type, $rel_path, $var_list, __FUNCTION__);
	}
	
	/**
	 * Passes correct information back to the default req() include method
	 * 
	 * @param  string $path     The absolute path to the file
	 * @param  array  $var_list The list of variables to extract
	 * @return mixed            The return value of the included file
	 */
	private static function _req($path, $var_list = array()) {
		return parent::req($path, TRUE, $var_list);
	}
	
	/**
	 * A customized version of the default req_once() method
	 * 
	 * @param  string $rel_path The path to the file (usually just filename)
	 * @param  string $inc_type The folder to include from
	 * @param  array  $var_list The list of variables to extract
	 * @return mixed            The return value of the included file
	 */
	public static function req_once($rel_path, $inc_type = '', $var_list = array()) {
		return self::_include($inc_type, $rel_path, $var_list, __FUNCTION__);
	}
	
	/**
	 * Passes correct information back to the default req_once() include method
	 * 
	 * @param  string $path     The absolute path to the file
	 * @param  array  $var_list The list of variables to extract
	 * @return mixed            The return value of the included file
	 */
	private static function _req_once($path, $var_list = array()) {
		return parent::req_once($path, TRUE, $var_list);
	}
	
	/**
	 * This works similarly to self::inc() except that it allows overrides (via
	 * self::use_part()) and uses self::$inc_var_list instead of asking for a
	 * $var_list with every include. This is only for '.php' files.
	 * 
	 * @param  string $path The path to the file without the '.php' (usually just filename)
	 * @param  string $type The folder to include from
	 * @param  string $id   The identifier to check for overrides (defaults to $path)
	 * @return mixed        The return value of the included file
	 */
	public static function part($path, $type = '', $id = '') {
		if (empty($id)) {
			$id = $path;
		}
		if (isset(self::$template_parts[$type][$id])) {
			extract(self::$template_parts[$type][$id]);
		}
		self::$template_used_parts[$type][$id] = $path;
		return self::inc($path.'.php', $type, self::$inc_var_list);
	}
	
	/**
	 * This allows self::part() to be overridden given that this is called earlier
	 * in the theme with the correct $id. This allows templates to reuse parts
	 * of each other.
	 * 
	 * @param  string  $path The path to the file without the '.php' (usually just filename)
	 * @param  string  $type The folder to include from
	 * @param  string  $id   The identifier to check for overrides (defaults to $path)
	 * @return boolean       If use_part() has not already been called for $id, then this returns TRUE. FALSE otherwise.
	 */
	public static function use_part($path, $type = '', $id) {
		if (count(self::$template_used_parts['layout'])) {
			\lastautoindex::$error->warning('Theme: theme::use_part() should only be called before the layout');
		}
		if (isset(self::$template_parts[$type][$id])) {
			return FALSE;
		}
		self::$template_parts[$type][$id] = array(
			'type' => $type,
			'path' => $path
		);
		return TRUE;
	}
	
	/**
	 * Gives any easy way to display the current directory listing via
	 * formatted strings. In the case of a search, the search results are
	 * displayed instead of the listing.
	 * 
	 * Format Variables Legend
	 * =======================
	 * %1 - File Name (or Relative Path)
	 * %2 - URI/URL
	 * %3 - Permissions
	 * %4 - Numeric Permissions
	 * %5 - Size
	 * %6 - Modified Date
	 * 
	 * @param  string  $fmt           Default item format
	 * @param  string  $other_formats Array of formats that can be detected, see 'display_index' class
	 * @param  boolean $sort          Separate directories and files in the listing
	 * @return void
	 */
	public static function display_index($fmt, $other_formats = array(), $sort = TRUE) {
		if (self::$search) {
			new display_search($fmt, $other_formats, $sort);
		} else {
			new display_index($fmt, $other_formats, $sort);
		}
	}
	
	/**
	 * Display the contents of a markdown file, such as readme's.
	 * 
	 * Note: errors result in nothing being printed
	 * 
	 * @param  string $path The path to the readme file
	 * @return bool         TRUE on success, FALSE if otherwise
	 */
	public static function display_markdown($path) {
		if (!is_file($path)) {
			return FALSE;
		}
		$handle = fopen($path, "r");
		$markdown = fread($handle, filesize($path));
		fclose($handle);
		echo self::$markdown->parse_github($markdown);
		return TRUE;
	}
	
	/**
	 * Simple check for a 'readme' file
	 * 
	 * @return mixed On success returns the absolute path to the readme file, FALSE otherwise
	 */
	public static function has_readme() {
		$pos_names = array(
			// Ordered by file-type preference
			'readme.md',
			'readme.markdown',
			'readme.txt',
			'readme'
		);
		foreach (scandir(self::$dir->path['real']) as $name) {
			foreach ($pos_names as $pos_name) {
				if (strtolower($name) == $pos_name) {
					return self::$dir->path['real'].'/'.$name;
				}
			}
		}
		return FALSE;
	}
	
	/**
	 * Prints the readme file for the current directory.
	 * 
	 * @return bool Returns TRUE if there as a readme file and it was printed, FALSE otherwise
	 */
	public static function display_readme() {
		$readme = self::has_readme();
		if ($readme) {
			// If it's markdown, then parse it into HTML
			if (substr($readme, -3) == '.md' || substr($readme, -9) == '.markdown') {
				return self::display_markdown($readme);
			} else {
				$handle = fopen($readme, "r");
				$text = fread($handle, filesize($readme));
				fclose($handle);
				echo $text;
			}
			return TRUE;
		}
		return FALSE;
	}
}
