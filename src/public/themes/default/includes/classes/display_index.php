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
	
	private function _verify_formats($default, $others = array()) {
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
	
	private function _sorted($default, $others) {
		foreach ($this->folders as $dir) {
			$fmt = $this->_detect_fmt($dir, $default, $others);
			$this->_print_item($fmt, $dir);
		}
		foreach ($this->files as $file) {
			$fmt = $this->_detect_fmt($file, $default, $others);
			$this->_print_item($fmt, $file);
		}
	}
	
	private function _unsorted($default, $others) {
		foreach ($this->items as $item) {
			$fmt = $this->_detect_fmt($item, $default, $others);
			$this->_print_item($fmt, $item);
		}
	}
	
	private function _detect_fmt($item, $default, $others) {
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
	
	private function _detect_ext_fmt($filename, $extensions, $default_fmt) {
		foreach ($extensions as $ext => $new_fmt) {
			$ext_offset = strlen($filename) - strlen($ext);
			if (strtolower($ext) == strtolower(substr($filename, $ext_offset))) {
				return $new_fmt;
			}
		}
		return $default_fmt;
	}
	
	private function _detect_regex_fmt($filename, $regex, $default_fmt) {
		foreach ($regex as $pattern => $new_fmt) {
			if (preg_match($pattern, $filename)) {
				return $new_fmt;
			}
		}
		return $default_fmt;
	}
	
	private function _print_item($fmt, $item) {
		printf(
			$fmt,
			urldecode($item['basename']),
			$item['uri']['full'],
			$item['perms'],
			$item['numeric_perms'],
			$item['size'],
			date('Y-m-d \a\t g:ia', $item['stat']['mod_time'])
		);
	}
}
