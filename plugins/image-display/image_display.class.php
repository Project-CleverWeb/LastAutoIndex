<?php

class image_display{
	
	public function __construct(){
		
		
		$this->init();
	}
	
	private function init(){
		
		
		
	}
	
	public function get($options=FALSE){
		
		$dir = scandir(SER_DOC_ROOT.PATH_URI);
		$imgs = array();
		foreach ($dir as $item) {
			$path = SER_DOC_ROOT.PATH_URI.$item;
			if(is_file($path)){
				
				$finfo = pathinfo($path);
				
				switch ($finfo['extension']) {
					// check some common filetypes
					case 'jpg':
					case 'jpeg':
					case 'png':
					case 'bmp':
					case 'gif':
						$use = TRUE;
						break;
					
					default:
						$use = FALSE;
						break;
				}
				if($use){
					$imgs[] = $path;
				}
			}
		}
		
		if(count($imgs)==0){
			return FALSE;
		}
		return $imgs;
	}
	
	
}



