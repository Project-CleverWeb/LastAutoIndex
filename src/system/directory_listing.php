<?php
/**
 * Directory Listing Class
 */

namespace projectcleverweb\lastautoindex;

/**
 * Directory Listing Class (model)
 * ===============================
 * Gets data about the current directory or a specific directory and its'
 * contents.
 */
class directory_listing {
	
	public $path        = array();
	public $items       = array();
	public $files       = array();
	public $folders     = array();
	public $directories;
	
	/**
	 * This class constructs itself based upon a local directory to create a
	 * usable set of information for that directory and its contents.
	 * (non-recursing)
	 * 
	 * @param string $abspath Absolute path to a real directory in the local file system.
	 */
	public function __construct($abspath = '') {
		if (empty($abspath) && strpos(main::$server['REQUEST_URI'], '?') !== FALSE) {
			$abspath = substr(main::$server['DOCUMENT_ROOT'].main::$server['REQUEST_URI'], 0, (stripos(main::$server['REQUEST_URI'], '?') - strlen(main::$server['REQUEST_URI'])));
		} else {
			$abspath = main::$server['DOCUMENT_ROOT'].main::$server['REQUEST_URI'];
		}
		if (is_dir($abspath)) {
			// stat() is cached, I have no idea why it is, but it is.
			clearstatcache();
			// info on the directory itself
			$this->path = $this->get_path_info($abspath);
			// info on its contents
			$this->get_content_info();
			$this->directories = &$this->folders;
		} else {
			main::$error->fatal('Directory Listing: "'.$abspath.'" is not a directory!');
		}
	}
	
	/**
	 * Gets all the available information about a path
	 * 
	 * @param  string $path Absolute path
	 * @return array        All available information about $path
	 */
	protected function get_path_info($path) {
		$info['input']         = $path;
		$info['real']          = realpath($path);
		$info['is_dir']        = is_dir($info['real']);
		$info['is_file']       = is_file($info['real']);
		$info['is_link']       = is_link($info['real']);
		$info['numeric_perms'] = substr(sprintf('%o', fileperms($info['real'])), -4);
		$info['perms']         = $this->_get_perms($info['real']);
		
		// Renaming Stat Keys
		$stat         = stat($info['real']);
		$info['stat'] = array(
			'device_num'  => $stat['dev'],
			'inode_num'   => $stat['ino'],
			'inode_mode'  => $stat['mode'],
			'link_num'    => $stat['nlink'],
			'uid'         => $stat['uid'],
			'gid'         => $stat['gid'],
			'device_type' => $stat['rdev'],
			'size'        => $stat['size'],
			'access_time' => $stat['atime'],
			'mod_time'    => $stat['mtime'],
			'inode_time'  => $stat['ctime'],
			'block_size'  => $stat['blksize'],
			'blocks'      => $stat['blocks']
		);
		
		// Convert to human readable number
		$sizes        = array('B', 'K', 'MB', 'GB', 'TB', 'PB');
		$size_factor  = floor((strlen($stat['size']) - 1) / 3);
		$info['size'] = sprintf("%s", round($stat['size'] / pow(1024, $size_factor), 2)) . $sizes[(int) $size_factor];
		
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
		ksort($info);
		return $info;
	}
	
	/**
	 * Populates and sorts $this->items, $this->folders, and $this->files
	 * 
	 * @return void
	 */
	protected function get_content_info() {
		$ls = scandir($this->path['real']);
		unset($ls[0], $ls[1]);
		foreach ($ls as $item_name) {
			$info = $this->get_path_info(realpath($this->path['real'].'/'.$item_name));
			$this->items[$info['basename']] = $info;
			if ($info['is_dir']) {
				$this->folders[$info['basename']] = $info;
			} else {
				$this->files[$info['basename']] = $info;
			}
		}
		ksort($this->items);
		ksort($this->files);
		ksort($this->folders);
	}
	
	/**
	 * Generates human readable permissions string
	 * 
	 * Taken from PHP.net
	 * 
	 * @see http://php.net/manual/en/function.fileperms.php
	 * @param  string $path The path to get the permissions for
	 * @return string       Human readable permissions string
	 */
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
	
	/**
	 * Refreshes all the information in this class. Useful when there is a
	 * file-system change.
	 * 
	 * NOTE: This calls the PHP function clearstatcache()
	 * 
	 * @return void
	 */
	public function refresh() {
		// stat() is cached, I have no idea why it is, but it is.
		clearstatcache();
		// the input really shouldn't change, but that doesn't stop some people
		// from changing it
		if (is_dir($this->path['input'])) {
			$this->path = $this->get_path_info($this->path['input']);
			$this->get_content_info();
		} else {
			main::$error->fatal('Directory Listing: "'.$this->path['input'].'" is not a directory!');
		}
	}
	
	
}
