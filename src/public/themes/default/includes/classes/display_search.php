<?php
/**
 * Display Search Class
 */

namespace projectcleverweb\lastautoindex\themes\default_theme;

/**
 * Display Search (view-model)
 * ===========================
 * Works just like the `display_index` class, except it prints search results.
 */
class display_search extends display_index {
	
	private $items;
	private $folders;
	private $files;
	
	/**
	 * Sets up class and sends data to the correct methods
	 * 
	 * @param string  $fmt           The default format to use
	 * @param array   $other_formats Array of other formats to look for
	 */
	public function __construct($fmt, $other_formats = array(), $sort = TRUE) {
		$this->items   = &\projectcleverweb\lastautoindex\theme::$search['items'];
		$this->folders = &\projectcleverweb\lastautoindex\theme::$search['folders'];
		$this->files   = &\projectcleverweb\lastautoindex\theme::$search['files'];
		$other_formats = $this->_verify_formats($fmt, $other_formats);
		if ($sort) {
			$this->_sorted($fmt, $other_formats);
		} else {
			$this->_unsorted($fmt, $other_formats);
		}
	}
	
	/**
	 * Loops through items and applies format to each item, then sends to printer.
	 * Does not separate folders from files.
	 * 
	 * @param  string $default The default format to print
	 * @param  array  $others  List of formats to use
	 * @return void
	 */
	protected function _unsorted($default, $others) {
		foreach ($this->items as $item) {
			$fmt = $this->_detect_fmt($item, $default, $others);
			$this->_print_item($fmt, $item);
		}
	}
	
	/**
	 * Loops through items and applies format to each item, then sends to printer.
	 * Separates folders from files.
	 * 
	 * @param  string $default The default format to print
	 * @param  array  $others  List of formats to use
	 * @return void
	 */
	protected function _sorted($default, $others) {
		foreach ($this->folders as $dir) {
			$fmt = $this->_detect_fmt($dir, $default, $others);
			$this->_print_item($fmt, $dir);
		}
		foreach ($this->files as $file) {
			$fmt = $this->_detect_fmt($file, $default, $others);
			$this->_print_item($fmt, $file);
		}
	}
	
	/**
	 * Prints item with given format. Replaces the items basename with its
	 * relative path.
	 * 
	 * Format Variables Legend
	 * =======================
	 * %1 - File Relative Path
	 * %2 - URI/URL
	 * %3 - Permissions
	 * %4 - Numeric Permissions
	 * %5 - Size
	 * %6 - Modified Date
	 * 
	 * @param  string $fmt  The format to print
	 * @param  array  $item The item's array of information
	 * @return void
	 */
	protected function _print_item($fmt, $item) {
		printf(
			$fmt,
			urldecode($item['uri']['rel']),
			$item['uri']['full'],
			$item['perms'],
			$item['numeric_perms'],
			$item['size'],
			date('Y-m-d @ g:ia', $item['stat']['mod_time'])
		);
	}
}
