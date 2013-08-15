<?php


class header_images{
	
	public function __construct(){
		
		
		$this->init();
	}
	
	private function init(){
		
		
		
	}
	
	public function display($options=FALSE){
		
		$dir = scandir(SER_DOC_ROOT.PATH_URI);
		
		foreach ($dir as $item) {
			$path = SER_DOC_ROOT.PATH_URI.$item;
			if(is_file($path)){
				
				$finfo = pathinfo($path);
				
				switch ($finfo['extension']) {
					case 'jpg':
					case 'png':
					case 'jpg':
					case 'jpg':
						$use = TRUE;
						break;
					
					default:
						# code...
						break;
				}
				
			}
		}
		
	}
	
	
}



