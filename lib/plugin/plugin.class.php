<?php

class plugin{
	
	public $resource = array();
	
	public function __construct($path = FALSE){
		$this->set_possible();
	}
	
	private function set_possible(){
		$dir = scandir(ABSPATH_PLUGINS);
		$dirs = array();
		foreach ($dir as $item) {
			if(is_dir(ABSPATH_PLUGINS.DS.$item)){
				$dirs[] = $item;
			}
		}
		return $this->list_mgr('SET_ALL',FALSE,$dirs);
	}
	
	public function enable($id){
		return $this->list_mgr('ENABLE',$id);
	}
	
	public function disable($id){
		return $this->list_mgr('DISABLE',$id);
	}
	
	public function add_dependency($id,$dependency){
		return $this->list_mgr('ADD_DEPENDENCY',$id,$dependency);
	}
	
	public function remove_dependency($id,$dependency){
		return $this->list_mgr('DEL_DEPENDENCY',$id,$dependency);
	}
	
	public function plugin_exists($id){
		return $this->list_mgr('EXISTS',$id);
	}
	
	public function is_enabled($id){
		return $this->list_mgr('ENABLED',$id);
	}
	
	public function is_disabled($id){
		return !$this->is_enabled($id);
	}
	
	public function add_runfile($id,$path){
		// returns $key
		return $this->list_mgr('ADD_RUN',$id,$path);
	}
	
	public function remove_runfile($id,$key){
		return $this->list_mgr('DEL_RUN',$id,$key);
	}
	
	public function register($id,$resource){
		return $this->list_mgr('REGISTER',$id,$resource);
	}
	
	public function get_list($list_name = 'ALL'){
		return $this->list_mgr('FETCH_LIST_'.strtoupper((string) $list_name));
	}
	
	private function list_mgr($action,$id=FALSE,$resource=NULL){
		static $available; 
		static $configs; // config paths to load
		static $all;
		static $enabled;
		static $disabled;
		static $run_files;
		if(!isset($all)){
			$available = array();
			$configs   = array();
			$all       = array();
			$enabled   = array();
			$disabled  = array();
			$run_files = array();
		}
		switch ($action) {
			/**
			 * This action tells LAI where to look when trying to load plugins
			 * 
			 * @param Array $resource  The array of directories names to check
			 */
			case 'SET_ALL':
				foreach ($resource as $dir) {
					if (is_file(ABSPATH_PLUGINS.DS.$dir.DS.'config.php')) {
						// add to $configs and $all
						$configs[] = ABSPATH_PLUGINS.DS.$dir.DS.'config.php';
						$available[] = $dir;
					} elseif (is_file(ABSPATH_PLUGINS.DS.$dir.DS.'run.php')) {
						// just a run file, attempt auto add (register() => add to $run_files)
						// failure = error [comeback]
						if ($this->register($dir,FALSE)) {
							$this->add_runfile($dir,'run.php'); 
						} else {
							// auto add error
						}
					}
				}
				$all = $resource;
				break;
			
			/**
			 * This action allows each plugin to set itself up
			 * 
			 * @param Sting $id        The namespace to register the plugin under
			 * @param Mixed $resource  The resource to make available (optional)
			 */
			case 'REGISTER': // adds to enabled list on success
				if(defined('LAI_PLUGINS_LOADED') && LAI_PLUGINS_LOADED == 1){ return FALSE; }
				if(!isset($all[(string) $id])){
					$all[(string) $id] = $resource;
					// setup runfile namespace
					$runfiles[(string) $id] = array(
						'int'   => 0,
						'paths' => array()
					);
					if($resource != NULL){ // dont create public resource if NULL
						$this->resource[(string) $id] = $resource;
					}
					break;
				}else{
					// [comeback] make this function handle errors if script already exists
					return FALSE;
				}
				break;
			
			/**
			 * Returns all registered plugins.
			 */
			case 'FETCH_LIST_ALL':
				return $all;
			
			/**
			 * Retruns all enabled plugins.
			 */
			case 'FETCH_LIST_ENABLED':
				$return = array();
				foreach ($enabled as $key => $value) {
					if($value === TRUE){
						$return[] = $key;
					}
				}
				return $return;
			
			/**
			 * Retruns all disabled plugins.
			 */
			case 'FETCH_LIST_DISABLED':
				$return = array();
				foreach ($disabled as $key => $value) {
					if($value === TRUE){
						$return[] = $key;
					}
				}
				return $return;
			
			/**
			 * Allows plugin to be loaded
			 * 
			 * @param  String $id  The plugin namespace to be enabled
			 */
			case 'ENABLE':
				if(defined('LAI_PLUGINS_LOADED') && LAI_PLUGINS_LOADED == 1){ return FALSE; }
				if(!empty($id) && isset($all[(string) $id])){
					if($disabled[(string) $id] == 1){
						$disabled[(string) $id] == FALSE;
					}
					$enabled[(string) $id] = TRUE;
				} else {
					return FALSE;
				}
				break;
			
			/**
			 * Prevents plugin from being loaded
			 * 
			 * @param  String $id  The plugin namespace to be disabled
			 */
			case 'DISABLE':
				if(defined('LAI_PLUGINS_LOADED') && LAI_PLUGINS_LOADED == 1){ return FALSE; }
				if(!empty($id) && isset($all[(string) $id])){
					if($enabled[(string) $id] == 1){
						$enabled[(string) $id] == FALSE;
					}
					$disabled[(string) $id] = TRUE;
				} else {
					return FALSE;
				}
				break;
			
			/**
			 * Checks that the plugin was registered
			 * 
			 * @param  String $id  The plugin namespace to check
			 */
			case 'EXISTS':
				if(!isset($all[(string) $id])){
					return FALSE;
				}
				break;
			
			/**
			 * Adds a runfile to a plugin's namespace
			 * 
			 * @param  String $id        The plugin namespace to apply the runfile to
			 * @param  String $resource  The relative path to the runfile
			 */
			case 'ADD_RUN':
				if(defined('LAI_PLUGINS_LOADED') && LAI_PLUGINS_LOADED == 1){ return FALSE; }
				if(!isset($runfiles[(string) $id])){ return FALSE; }
				$int = $runfiles[(string) $id]['int'];
				$runfiles[(string) $id]['int']++;
				$runfiles[(string) $id]['paths'][$int] = (string) $resource;
				return $int;
				break;
			
			/**
			 * Removes a specified runfile from a plugin's namespace
			 * 
			 * @param  String $id        The namespace to check
			 * @param  String $resource  The runfiles key (provided by ADD_RUN)
			 */
			case 'DEL_RUN':
				if(defined('LAI_PLUGINS_LOADED') && LAI_PLUGINS_LOADED == 1){ return FALSE; }
				if(!isset($runfiles[(string) $id]['paths'][(int) $resource])){ return FALSE; }
				unset($runfiles[(string) $id]['paths'][(int) $resource]);
				break;
			
			
			
			default:
				return FALSE; // failure
		}
		
		return TRUE; //success
	}
	
	public function get_configs(){
		
	}
	
	public function load_plugins(){
		
		// load all runfiles
		// check for errors
		
		
		// success
		_define('LAI_PLUGINS_LOADED', TRUE);
		return TRUE;
	}
	
}



