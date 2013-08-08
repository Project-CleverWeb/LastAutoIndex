<?php

class plugin{
	
	public function __construct($path = FALSE){
		
		
		$this->init($path);
	}
	private function init($path){
		
		
		
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



