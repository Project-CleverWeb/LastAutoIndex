<?php
/**
 * Search Class
 */

namespace projectcleverweb\lastautoindex;

/**
 * Search Class (model)
 * =========================
 * This class allows you to search the current directory and its sub-directories
 * for files and directories.
 */
class search {
	/**
	 * Preform a basic regex search on this directory and its sub directories
	 * 
	 * @param  string $regex The regex string to search with
	 * @return array         The list of paths that match the search with their info
	 */
	public static function regex($regex) {
		// Validate the regex first
		if (@preg_match($regex, null) === FALSE) {
			return array();
		} else {
			$dir = new \RecursiveDirectoryIterator(
				theme::$dir->path['real'],
				\FilesystemIterator::KEY_AS_PATHNAME |
				\FilesystemIterator::CURRENT_AS_FILEINFO |
				\FilesystemIterator::SKIP_DOTS
			);
			$ite = new \RecursiveIteratorIterator($dir);
			$files = new \RegexIterator($ite, $regex);
			$fileList = array();
			foreach($files as $file) {
				$fileList[] = $file->getRealpath();
			}
			return self::get_items_info($fileList);
		}
	}
	
	/**
	 * Populates each item's info
	 * 
	 * @param  array $list The list list of paths to get info for
	 * @return array       The list of paths with their info
	 */
	protected static function get_items_info($list) {
		if (empty($list)) {
			return array();
		}
		$lists = array(
			'items'   => array(),
			'folders' => array(),
			'files'   => array()
		);
		foreach ($list as &$item) {
			$item = theme::$dir->get_path_info($item);
			if ($item['uri']) {
				$item['uri']['rel'] = theme::$dir->get_rel_path(theme::$dir->path['uri']['root'], $item['uri']['root']);
			}
			
			if ($item['is_dir']) {
				$lists['items'][] = $lists['folders'][] = $item;
			} else {
				$lists['items'][] = $lists['files'][] = $item;
			}
		}
		return $lists;
	}
}
