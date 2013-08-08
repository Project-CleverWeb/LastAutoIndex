<?php

class plugin{
	
	public function __construct($path = FALSE){
		
		
		$this->init($path);
	}
	private function init($path){
		
		
		
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
				if(!isset($list[$id])){
					$list[$id] = $resource;
					break;
				}else{
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



