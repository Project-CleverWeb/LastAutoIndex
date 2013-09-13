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
			case 'SET_ALL':
				foreach ($resource as $dir) {
					if (is_file(ABSPATH_PLUGINS.DS.$dir.DS.'config.php')) {
						// add to $configs and $all
						$configs[] = ABSPATH_PLUGINS.DS.$dir.DS.'config.php';
						$all[] = $dir;
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
			
			case 'REGISTER': // adds to enabled list on success
				if(!isset($all[$id])){
					$all[$id] = $resource;
					if($resource != NULL){ // dont create public resource if NULL
						$this->resource[$id] = $resource;
					}
					break;
				}else{
					// [comeback] make this function handle errors if script already exists
					return FALSE;
				}
				break;
			
			case 'FETCH_LIST_ALL':
				return $available;
				break;
			
			case 'FETCH_LIST_ENABLED':
				return $list;
				break;
			
			case 'FETCH_LIST_DISABLED':
				return $list;
				break;
			
			default:
				return FALSE; // failure
		}
		
		return TRUE; //success
	}
	
	protected function load_plugins(){
		
		// load all runfiles
		// check for errors
		
		// success
		return TRUE;
	}
	
}



