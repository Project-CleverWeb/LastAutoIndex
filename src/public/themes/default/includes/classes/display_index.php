<?php
/**
 * Display Index Class
 */

namespace projectcleverweb\lastautoindex\themes\default_theme;

/**
 * Display Index (view-model)
 * ==========================
 * Provides a simpler way to display each item of the current directory listing.
 * 
 * This class is self sufficient within LastAutoIndex, so feel free to copy and
 * paste it into your own theme. Don't forget to change the namespace!
 */
class display_index {
	
	private $items;
	private $folders;
	private $files;
	
	/**
	 * Sets up class and sends data to the correct methods
	 * 
	 * @param string  $fmt           The default format to use
	 * @param array   $other_formats Array of other formats to look for
	 * @param boolean $sort          Whether to sort the directories from the files
	 */
	public function __construct($fmt, $other_formats = array(), $sort = TRUE) {
		$this->items   = \projectcleverweb\lastautoindex\theme::$dir->items;
		$this->folders = \projectcleverweb\lastautoindex\theme::$dir->folders;
		$this->files   = \projectcleverweb\lastautoindex\theme::$dir->files;
		$other_formats = $this->_verify_formats($fmt, $other_formats);
		if ($sort) {
			$this->_sorted($fmt, $other_formats);
		} else {
			$this->_unsorted($fmt, $other_formats);
		}
	}
	
	/**
	 * Checks that all the given formats are as they should be. Erroneous inputs
	 * are replaced by the default, and irrelevant inputs are removed. If $default
	 * is not a string, a fatal error is given.
	 * 
	 * @param  string $default The default format to print
	 * @param  array  $others  List of formats to check
	 * @return array           Cleaned list of formats
	 */
	protected function _verify_formats($default, $others = array()) {
		if (!is_string($default)) {
			\lastautoindex::$error->fatal('Theme - Display Index: Invalid default string given');
		}
		$valid = array(
			'file'       => $default,
			'symlink'    => $default,
			'folder'     => $default,
			'extensions' => array(),
			'regex'      => array()
		);
		if (!empty($others['file']) && is_string($others['file'])) {
			$valid['file'] = $others['file'];
		}
		if (!empty($others['symlink']) && is_string($others['symlink'])) {
			$valid['symlink'] = $others['symlink'];
		}
		if (!empty($others['folder']) && is_string($others['folder'])) {
			$valid['folder'] = $others['folder'];
		}
		if (!empty($others['extensions']) && is_array($others['extensions'])) {
			foreach ($others['extensions'] as $key => $value) {
				if (is_string($value) && !empty($value)) {
					$valid['extensions'][$key] = $value;
				}
			}
		}
		unset($key, $value);
		if (!empty($others['regex']) && is_array($others['regex'])) {
			foreach ($others['regex'] as $key => $value) {
				if (is_string($value) && !empty($value)) {
					$valid['regex'][$key] = $value;
				}
			}
		}
		return $valid;
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
	 * Detects what format to use, and returns it.
	 * 
	 * @param  array  $item    The item's array of information
	 * @param  string $default The default format to print
	 * @param  array  $others  List of formats to use
	 * @return string          The format to use for the given item
	 */
	protected function _detect_fmt($item, $default, $others) {
		if ($item['is_dir']) {
			$fmt = $others['folder'];
		} elseif ($item['is_file']) {
			$fmt = $others['file'];
		} elseif ($item['is_link']) {
			$fmt = $others['symlink'];
		} else {
			$fmt = $default;
		}
		if ($item['is_file'] && count($others['extensions'])) {
			$fmt = $this->_detect_ext_fmt($item['basename'], $others['extensions'], $fmt);
		}
		if (count($others['regex'])) {
			$fmt = $this->_detect_regex_fmt($item['basename'], $others['regex'], $fmt);
		}
		return $fmt;
	}
	
	/**
	 * Detects if item (file) has an extension that has a known format.
	 * 
	 * @param  string $filename    The filename to check
	 * @param  array  $extensions  The list of extensions to check for, and their formats
	 * @param  string $default_fmt The default format to use
	 * @return string              The format to use for the given item
	 */
	protected function _detect_ext_fmt($filename, $extensions, $default_fmt) {
		foreach ($extensions as $ext => $new_fmt) {
			$ext_offset = strlen($filename) - strlen($ext);
			if (strtolower($ext) == strtolower(substr($filename, $ext_offset))) {
				return $new_fmt;
			}
		}
		return $default_fmt;
	}
	
	/**
	 * Detects if item name (file or directory) has a known format.
	 * 
	 * @param  string $filename    The filename to check
	 * @param  array  $regex       The list of patterns to check for, and their formats
	 * @param  string $default_fmt The default format to use
	 * @return string              The format to use for the given item
	 */
	protected function _detect_regex_fmt($filename, $regex, $default_fmt) {
		foreach ($regex as $pattern => $new_fmt) {
			if (preg_match($pattern, $filename)) {
				return $new_fmt;
			}
		}
		return $default_fmt;
	}
	
	/**
	 * Prints item with given format
	 * 
	 * Format Variables Legend
	 * =======================
	 * %1 - File Name
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
			urldecode($item['basename']),
			$item['uri']['full'],
			$item['perms'],
			$item['numeric_perms'],
			$item['size'],
			date('Y-m-d @ g:ia', $item['stat']['mod_time'])
		);
	}
}
