<?php



class last_auto_index{
	
	protected $config;
	public    $html;
	public    $toolbox;
	
	public function __construct($config,$dir){
		// just setup this class, leave all the other setup to $this->init()
		$this->config = $this->load_json_file($config);
		if (
			// if the path is left to automatic, then use the supplied dir
			isset($this->config->path)!=1 ||
			(strtolower($this->config->path) != 'auto' && strtolower($this->config->path) != 'default')
		) {
			$this->config->path = $dir;
		}
		$this->init($this->config);
	}
	
	private function init($config){
		global $_lai;
		// set the paths
		$this->set_paths($config);
		
		// grab some useful classes
		$this->load_class('toolbox');
		$_lai->toolbox = new toolbox;
		
		// grab all the configs
		$this->load_config('lib/plugin', $config); // enable plugins
		$this->load_config('lib/file-explorer', $config); // directly load plugin
		$this->load_config('lib/markdown', $config); // directly load plugin
		$this->load_config('lib/syntax-highlighter', $config); // directly load plugin
		$this->load_config('themes/'.$config->theme, $config); // theme last
		
	}
	
	public function build(){
		// build the page
		
	}
	
	
	/** 
	 * Clean comments of json content and decode it with json_decode(). 
	 * Work like the original php json_decode() function with the same params 
	 * 
	 * Shout out to 1franck on php.net/manual/en/function.json-decode.php for this
	 * 
	 * @param   string  $json    The json string being decoded 
	 * @param   bool    $assoc   When TRUE, returned objects will be converted into associative arrays. 
	 * @param   integer $depth   User specified recursion depth. (>=5.3) 
	 * @param   integer $options Bitmask of JSON decode options. (>=5.4) 
	 * @return  string 
	 */
	protected function json_clean_decode($json, $assoc = false, $depth = 512, $options = 0) {
		// search and remove comments like /* */ and // 
		$json = preg_replace("#(/\*([^*]|[\r\n]|(\*+([^*/]|[\r\n])))*\*+/)|([\s\t](//).*)#", '', $json); 
		
		if(version_compare(phpversion(), '5.4.0', '>=')) { 
			$json = json_decode($json, $assoc, $depth, $options); 
		} 
		elseif(version_compare(phpversion(), '5.3.0', '>=')) { 
			$json = json_decode($json, $assoc, $depth); 
		} 
		else { 
			$json = json_decode($json, $assoc); 
		} 
		
		return $json; 
	}
	
	protected function load_json_file($filename){
		$handle = fopen($filename, "r");
		$contents = fread($handle, filesize($filename));
		fclose($handle);
		$object = $this->json_clean_decode($contents);
		
		return $object;
	}
	
	private function set_paths($config){
		_define('PATH_BASE'       ,$config->path);
		_define('PATH_INDEX'      ,PATH_BASE.DS.'index.php');
		_define('PATH_LIB'        ,PATH_BASE.DS.'lib');
		_define('PATH_PLUGINS'    ,PATH_BASE.DS.'plugins');
		_define('PATH_THEME'      ,PATH_BASE.DS.'themes'.DS.$config->theme);
		_define('PATH_THIRD_PARTY',PATH_LIB.DS.'3rd-party');
		_define('PATH_CLASSES'    ,PATH_LIB.DS.'classes');
		_define('PATH_README'     ,PATH_BASE.DS.'readme.md');
		_define('PATH_CHANGELOG'  ,PATH_BASE.DS.'changelog.md');
	}
	
	protected function load_config($path,$config){
		if(file_exists(PATH_BASE.DS.$path.DS.'config.php')){
			return include_once(PATH_BASE.DS.$path.DS.'config.php');
		}
		return FALSE;
	}
	
	protected function load_class($name){
		if(file_exists(PATH_CLASSES.DS.$name.'.class.php')){
			return include_once(PATH_CLASSES.DS.$name.'.class.php');
		}
		return FALSE;
	}
}






























