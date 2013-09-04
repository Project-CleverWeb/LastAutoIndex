<?php

class plugin{
	
	public $resource = array();
	
	public function __construct($path = FALSE){
		
		
		$this->init($path);
	}
	private function init($path){
		
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
		return $this->list_mgr('SET_POSSIBLE',FALSE,$dirs);
	}
	
	public function enable(){
		
	}
	
	public function disable(){
		
	}
	
	public function plugin_exists(){
		
	}
	
	public function add_runfile(){
		
	}
	
	public function remove_runfile(){
		
	}
	
	
	public function register($id,$resource){
		return $this->list_mgr('REGISTER',$id,$resource);
	}
	
	public function get_list($list_name = 'ALL'){
		return $this->list_mgr('FETCH_LIST_'.strtoupper((string) $list_name));
	}
	
	private function list_mgr($action,$id=FALSE,$resource=FALSE){
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
				return FALSE;
		}
		
		return TRUE; //success
	}
	
	protected function load_plugins(){
		static $loaded;
		if($loaded){
			return TRUE;
		}
		
		
		
		// success
		$loaded = TRUE;
		return TRUE;
	}
	
	
	
	
}



