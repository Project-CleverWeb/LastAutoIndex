<?php

class plugin{
	
	public $resource = array();
	
	public function __construct($path = FALSE){
		
		
		$this->init($path);
	}
	private function init($path){
		
		
		
	}
	
	public function is_load_time(){
		// check if is time to actually load plugins
		return TRUE;
	}
	
	public function register($id,$resource){
		return $this->list_mgr('REGISTER',$id,$resource);
	}
	
	public function get_list($list_name = 'ALL'){
		return $this->list_mgr('FETCH_LIST_'.strtoupper((string) $list_name));
	}
	
	private function list_mgr($action,$id=FALSE,$resource=FALSE){
		static $list;
		if(!isset($list)){
			$list = array();
		}
		switch ($action) {
			case 'FETCH_LIST_ALL':
				
				break;
			
			case 'FETCH_LIST_USED':
				return $list;
				break;
			
			case 'FETCH_LIST_UNUSED':
				
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



