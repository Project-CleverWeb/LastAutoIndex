<?php

class plugin{
	
	public $resource = array();
	
	public function __construct($path = FALSE){
		$this->set_possible();
	}
	
	private function set_possible(){
		$dir = scandir(ABSPATH_PLUGINS);
		$return = array();
		foreach ($dir as $item) {
			if(is_dir(ABSPATH_PLUGINS.DS.$item)){
				$dirs[] = $item;
			}
		}
		return $this->list_mgr('SET_ALL',FALSE,$dirs);
	}
	
	public function enable($plugin_name){
		return $this->list_mgr('ENABLE',$plugin_name);
	}
	
	public function disable($plugin_name){
		return $this->list_mgr('DISABLE',$plugin_name);
	}
	
	public function add_dependency($plugin_name,$dependency){
		return $this->list_mgr('ADD_DEPENDENCY',$plugin_name,$dependency);
	}
	
	public function remove_dependency($plugin_name,$dependency){
		return $this->list_mgr('REMOVE_DEPENDENCY',$plugin_name,$dependency);
	}
	
	public function plugin_exists($plugin_name){
		return $this->list_mgr('EXISTS',$plugin_name);
	}
	
	public function is_enabled($plugin_name){
		return $this->list_mgr('ENABLED',$plugin_name);
	}
	
	public function is_disabled($plugin_name){
		return !$this->is_enabled($plugin_name);
	}
	
	public function add_runfile($plugin_name,$path){
		// returns $key
		return $this->list_mgr('ADD_RUN',$plugin_name,$path);
	}
	
	public function remove_runfile($plugin_name,$key){
		return $this->list_mgr('DEL_RUN',$plugin_name,$key);
	}
	
	public function register($id,$resource){
		return $this->list_mgr('REGISTER',$id,$resource);
	}
	
	public function get_list($list_name = 'ALL'){
		return $this->list_mgr('FETCH_LIST_'.strtoupper((string) $list_name));
	}
	
	private function list_mgr($action,$id=FALSE,$resource=NULL){
		static $all;
		static $list;
		static $enabled;
		static $run_files;
		if(!isset($list)){
			$list      = array();
			$all       = array();
			$enabled   = array();
			$run_files = array();
		}
		switch ($action) {
			case 'SET_ALL':
				$all = $resource;
				break;
			
			case 'FETCH_LIST_ALL':
				
				break;
			
			case 'FETCH_LIST_ENABLED':
				return $list;
				break;
			
			case 'FETCH_LIST_DISABLED':
				
				break;
			
			case 'REGISTER':
				// register must always return bool, lets plugin know it's time to config.
				
				// [comeback] add ability to see if it is time to register plugins.
				if(!isset($list[$id])){
					$list[$id] = $resource;
					// IF plugin has a config load that
					// ELSEIF plugin has a runfile add that
					// ELSE add to $disbaled
					if($resource != NULL){ // dont create public resource if NULL
						$this->resource[$id] = $resource;
					}
					break;
				}else{
					// [comeback] make this function handle errors if script already exists
					return FALSE;
				}
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



