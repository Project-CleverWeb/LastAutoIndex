<?php

class file_explorer {
	
	private $path;
	
	public function __construct($path=FALSE){
		
		
		$this->init($path);
	}
	
	private function init($path=FALSE){
		if($path==FALSE){
			$path = SER_DOC_ROOT.PATH_URI;
		}
		$this->path = $path;
	}
	
	public function options(){
		
	}
	
	private function config($options=FALSE){
		static $config;
		if(!$options){
			return $config;
		}
		// set config
		
		// return to defaults
		
	}
	
	public function files(){
		$config = $this->config();
		
		
	}
	
	public function folders(){
		$config = $this->config();
		
		
	}
	
	public function all(){
		$config = $this->config();
		
		return scandir($this->path);
	}
	
}




