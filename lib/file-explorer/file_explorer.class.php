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
		$all = $this->all();
		$return = array();
		foreach ($all as $item) {
			if($item['is_dir']==0){
				$return[] = $item;
			}
		}
		return $return;
	}
	
	public function folders(){
		$config = $this->config();
		$all = $this->all();
		$return = array();
		foreach ($all as $item) {
			if($item['is_dir']==1){
				$return[] = $item;
			}
		}
		return $return;
	}
	
	public function all($filter = FALSE){
		$config = $this->config();
		$items = scandir($this->path);
		$info = array();
		foreach ($items as $item) {
			if ($item != '.' && $item != '..') {
				$i_path = SER_DOC_ROOT.PATH_URI.$item;
				if(is_file($i_path)){
					$pathinfo = pathinfo($i_path);
					$filesize = formatSizeUnits(filesize($i_path));
					
					$info[] = array(
						'name'     => $pathinfo['basename'],
						'is_dir'   => FALSE,
						'filename' => $pathinfo['filename'],
						'ext'      => (isset($pathinfo['extension']))?$pathinfo['extension']:'',
						'size'     => $filesize,
						'dir'      => $pathinfo['dirname'],
						'path'     => PATH_URI.$item,
						'abspath'  => $i_path,
					);
				}else{
					$info[] = array(
						'name'     => $item,
						'is_dir'   => TRUE,
						'filename' => $item,
						'ext'      => 'Directory',
						'size'     => '-',
						'dir'      => PATH_URI,
						'path'     => PATH_URI.$item,
						'abspath'  => $i_path
					);
				}
			}
		}
		
		// in the future, this will allow plugins to effect some outputs
		// $_lai->plugin->apply_filter('file-explorer','all',$info);
		
		return $info;
		
	}
	
}




