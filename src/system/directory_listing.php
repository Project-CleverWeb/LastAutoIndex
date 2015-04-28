<?php
/**
 * Directory Listing Class
 */

namespace projectcleverweb\lastautoindex;

/**
 * Directory Listing Class (model)
 * ===============================
 * Gets data about the current DIRECTORY or a specific directory and its'
 * contents.
 */
class directory_listing {
	
	public $path = array();
	public $items = array();
	
	public function __construct($abspath = '') {
		if (empty($abspath) && strpos(main::$server['REQUEST_URI'], '?') !== FALSE) {
			$abspath = substr(main::$server['DOCUMENT_ROOT'].main::$server['REQUEST_URI'], 0, (stripos(main::$server['REQUEST_URI'], '?') - strlen(main::$server['REQUEST_URI'])));
		} else {
			$abspath = main::$server['DOCUMENT_ROOT'].main::$server['REQUEST_URI'];
		}
		if (is_dir($abspath)) {
			$this->path = $this->get_path_info($abspath);
		} else {
			main::$error->fatal('Directory Listing: "'.$abspath.'" is not a directory!');
		}
		$this->get_content_info();
	}
	
	protected function get_path_info($path) {
		$info['input']   = $path;
		$info['real']    = realpath($path);
		$info['is_dir']  = is_dir($info['real']);
		$info['is_file'] = is_file($info['real']);
		$info['is_link'] = is_link($info['real']);
		$info['perms']   = $this->_get_perms($info['real']);
		$info['stat']    = array_diff_key(stat($info['real']), array_fill(0, 13, 0));
		// Absolute Path Info
		$info =
			$info +
			pathinfo($info['real']) +
			array_fill_keys(array('dirname', 'basename', 'extension', 'filename'), '');
		
		// URI Path Info
		if (stripos($info['real'], realpath(main::$server['DOCUMENT_ROOT'])) === 0) {
			$uri = str_replace('\\', '/', substr($info['real'], strlen(main::$server['DOCUMENT_ROOT'])));
			$info['uri']['root'] = $uri;
			$info['uri']['full'] = sprintf(
				'%1$s://%2$s%3$s%4$s',
				main::$server['REQUEST_SCHEME'],
				main::$server['HTTP_HOST'],
				((int) main::$server['SERVER_PORT'] == 80 ? '' : ':'.main::$server['SERVER_PORT']),
				$uri
			);
			$info['uri']['implicit'] = sprintf(
				'//%1$s%2$s%3$s',
				main::$server['HTTP_HOST'],
				((int) main::$server['SERVER_PORT'] == 80 ? '' : ':'.main::$server['SERVER_PORT']),
				$uri
			);
		}
		return $info;
	}
	
	protected function get_content_info() {
		$ls = scandir($this->path['real']);
		unset($ls[0], $ls[1]);
		foreach ($ls as $item_name) {
			$this->items[] = $this->get_path_info(realpath($this->path['real'].'/'.$item_name));
		}
	}
	
	private function _get_perms($path) {
		$perms = fileperms($path);
		if (($perms & 0xC000) == 0xC000) {
			// Socket
			$info = 's';
		} elseif (($perms & 0xA000) == 0xA000) {
			// Symbolic Link
			$info = 'l';
		} elseif (($perms & 0x8000) == 0x8000) {
			// Regular
			$info = '-';
		} elseif (($perms & 0x6000) == 0x6000) {
			// Block special
			$info = 'b';
		} elseif (($perms & 0x4000) == 0x4000) {
			// Directory
			$info = 'd';
		} elseif (($perms & 0x2000) == 0x2000) {
			// Character special
			$info = 'c';
		} elseif (($perms & 0x1000) == 0x1000) {
			// FIFO pipe
			$info = 'p';
		} else {
			// Unknown
			$info = 'u';
		}

		// Owner
		$info .= (($perms & 0x0100) ? 'r' : '-');
		$info .= (($perms & 0x0080) ? 'w' : '-');
		$info .= (($perms & 0x0040) ? (($perms & 0x0800) ? 's' : 'x' ) : (($perms & 0x0800) ? 'S' : '-'));

		// Group
		$info .= (($perms & 0x0020) ? 'r' : '-');
		$info .= (($perms & 0x0010) ? 'w' : '-');
		$info .= (($perms & 0x0008) ? (($perms & 0x0400) ? 's' : 'x' ) : (($perms & 0x0400) ? 'S' : '-'));

		// World
		$info .= (($perms & 0x0004) ? 'r' : '-');
		$info .= (($perms & 0x0002) ? 'w' : '-');
		$info .= (($perms & 0x0001) ? (($perms & 0x0200) ? 't' : 'x' ) : (($perms & 0x0200) ? 'T' : '-'));
		
		return $info;
	}
	
	public function refresh() {
		if (is_dir($this->path['input'])) {
			$this->path = $this->get_path_info($this->path['input']);
		} else {
			main::$error->fatal('Directory Listing: "'.$this->path['input'].'" is not a directory!');
		}
		$this->get_content_info();
	}
	
	
}
