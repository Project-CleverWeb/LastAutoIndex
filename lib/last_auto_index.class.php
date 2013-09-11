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
		$_lai->config = $config;
		
		// set the paths
		$this->set_paths($config);
		
		// grab error handler
		_require_once(ABSPATH_LIB.DS.'error_handle.class.php');
		$_lai->error = new error_handle($config->error_handling);
		
		// Time to handle login (3rd-party)
		$this->load_config('lib'.DS.'login', $config->login);
		
		// grab some useful classes, throw them into the global
		$this->load_class('toolbox');
		$_lai->toolbox = new toolbox;
		
		// [temp][comeback] load/config css class
		_require_once(ABSPATH_LIB.DS.'sudo-plugins'.DS.'css'.DS.'css.class.php');
		$_lai->css = new css;
		
		// grab all the configs
		$this->load_config('lib'.DS.'plugin', $config); // enable plugins
		$this->load_config('lib'.DS.'sudo-plugins'.DS.'file-explorer', $config->file_explorer); // directly load plugin
		$this->load_config('lib'.DS.'sudo-plugins'.DS.'markdown', $config); // directly load plugin
		$this->load_config('themes'.DS.$config->theme, $config);
		
		_define('LAI_INIT',TRUE);
	}
	
	public function build(){
		// build the page
		global $_lai;
		if(defined('LAI_INIT')==0 || LAI_INIT == FALSE){
			return FALSE;
		}
		if(!$this->load_plugins()){
			return FALSE;
		}
		
		return $this->load_theme();
		
	}
	
	private function load_plugins(){
		global $_lai;
		
		return TRUE;
	}
	
	
	private function load_theme(){
		global $_lai;
		
		if (file_exists(ABSPATH_THEME.DS.'init.php')) {
			include_once(ABSPATH_THEME.DS.'init.php');
		}
		
		if (file_exists(ABSPATH_THEME.DS.'index.php')) {
			include_once(ABSPATH_THEME.DS.'index.php');
		}
		
		return TRUE;
	}
	
	/** 
	 * Clean comments of json content and decode it with
	 * json_decode(). Is identical to the original php
	 * json_decode() function otherwise.
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
		$q = stripos(SER_REQ_URI, '?');
		if ($q === FALSE) {
			_define('PATH_URI',urldecode(SER_REQ_URI));
		} else {
			_define('PATH_URI',urldecode(substr(SER_REQ_URI, 0,$q)));
		}
		_define('PATH_BASE'           ,urldecode($config->path));
		_define('ABSPATH_INDEX'       ,PATH_BASE.DS.'index.php');
		_define('RELPATH_INDEX'       ,get_rel_path(ABSPATH_INDEX,PATH_BASE,DS));
		_define('PATH_INDEX'          ,'/'.get_rel_path(ABSPATH_INDEX,SER_DOC_ROOT,'/'));
		_define('ABSPATH_LIB'         ,PATH_BASE.DS.'lib');
		_define('RELPATH_LIB'         ,get_rel_path(ABSPATH_LIB,PATH_BASE,DS));
		_define('PATH_LIB'            ,'/'.get_rel_path(ABSPATH_LIB,SER_DOC_ROOT,'/'));
		_define('ABSPATH_PLUGINS'     ,PATH_BASE.DS.'plugins');
		_define('RELPATH_PLUGINS'     ,get_rel_path(ABSPATH_PLUGINS,PATH_BASE,DS));
		_define('PATH_PLUGINS'        ,'/'.get_rel_path(ABSPATH_PLUGINS,SER_DOC_ROOT,'/'));
		_define('ABSPATH_THEME'       ,PATH_BASE.DS.'themes'.DS.urldecode($config->theme));
		_define('RELPATH_THEME'       ,get_rel_path(ABSPATH_THEME,PATH_BASE,DS));
		_define('PATH_THEME'          ,'/'.get_rel_path(ABSPATH_THEME,SER_DOC_ROOT,'/'));
		_define('ABSPATH_THIRD_PARTY' ,ABSPATH_LIB.DS.'3rd-party');
		_define('RELPATH_THIRD_PARTY' ,get_rel_path(ABSPATH_THIRD_PARTY,PATH_BASE,DS));
		_define('PATH_THIRD_PARTY'    ,'/'.get_rel_path(ABSPATH_THIRD_PARTY,SER_DOC_ROOT,'/'));
		_define('ABSPATH_CLASSES'     ,ABSPATH_LIB.DS.'classes');
		_define('RELPATH_CLASSES'     ,get_rel_path(ABSPATH_CLASSES,PATH_BASE,DS));
		_define('PATH_CLASSES'        ,'/'.get_rel_path(ABSPATH_CLASSES,SER_DOC_ROOT,'/'));
		_define('ABSPATH_README'      ,PATH_BASE.DS.'readme.md');
		_define('RELPATH_README'      ,get_rel_path(ABSPATH_README,PATH_BASE,DS));
		_define('PATH_README'         ,'/'.get_rel_path(ABSPATH_README,SER_DOC_ROOT,'/'));
		_define('ABSPATH_CHANGELOG'   ,PATH_BASE.DS.'changelog.md');
		_define('RELPATH_CHANGELOG'   ,get_rel_path(ABSPATH_CHANGELOG,PATH_BASE,DS));
		_define('PATH_CHANGELOG'      ,'/'.get_rel_path(ABSPATH_CHANGELOG,SER_DOC_ROOT,'/'));
	}
	
	protected function load_config($path,$config){
		global $_lai;
		if(file_exists(PATH_BASE.DS.$path.DS.'config.php')){
			return include_once(PATH_BASE.DS.$path.DS.'config.php');
		}
		return FALSE;
	}
	
	protected function load_class($name){
		global $_lai;
		if(file_exists(ABSPATH_CLASSES.DS.$name.'.class.php')){
			return include_once(ABSPATH_CLASSES.DS.$name.'.class.php');
		}
		return FALSE;
	}
	
	
}


