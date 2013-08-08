<?php

class plugin{
	
	public $list;
	
	public function __construct($path = FALSE){
		
		
		$this->init($path);
	}
	private function init($path){
		
		
		
	}
	
	public function register(){
		
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



