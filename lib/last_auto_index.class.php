<?php



class last_auto_index{
	
	protected $config;
	protected $path;
	
	public function __construct($config,$dir = __DIR__.'/..'){
		// just setup this class, leave all the other setup to $this->init()
		$this->config = $this->load_json_file($config);
		$this->path = $dir;
		$this->init($this->config);
	}
	
	private function init($config){
		// grab all the configs
		$this->load_config('lib/file-explorer');
		$this->load_config('lib/markdown'); // directly loaded plugin 
		$this->load_config('lib/syntax-highlighter'); // directly loaded plugin 
		$this->load_config('lib/plugin-loader'); // now load all the others
		$this->load_config('themes/'.$this->config->theme);
	}
	
	public function build(){
		// build the page
		
		
	}
	
	
	/** 
	 * Clean comments of json content and decode it with json_decode(). 
	 * Work like the original php json_decode() function with the same params 
	 * 
	 * Shout out to 1franck on http://php.net/manual/en/function.json-decode.php for this
	 * 
	 * @param   string  $json    The json string being decoded 
	 * @param   bool    $assoc   When TRUE, returned objects will be converted into associative arrays. 
	 * @param   integer $depth   User specified recursion depth. (>=5.3) 
	 * @param   integer $options Bitmask of JSON decode options. (>=5.4) 
	 * @return  string 
	 */
	protected function json_clean_decode($json, $assoc = false, $depth = 512, $options = 0) {
		// search and remove comments like /* */ and // 
		$json = preg_replace("#(/\*([^*]|[\r\n]|(\*+([^*/]|[\r\n])))*\*+/)|([\s\t](//).*)#", '', $json); 
		
		if(version_compare(phpversion(), '5.4.0', '>=')) { 
			$json = json_decode($json, $assoc, $depth, $options); 
		} 
		elseif(version_compare(phpversion(), '5.3.0', '>=')) { 
			$json = json_decode($json, $assoc, $depth); 
		} 
		else { 
			$json = json_decode($json, $assoc); 
		} 
		
		return $json; 
	}
	
	protected function load_json_file($filename){
		$handle = fopen($filename, "r");
		$contents = fread($handle, filesize($filename));
		fclose($handle);
		$object = $this->json_clean_decode($contents);
		
		return $object;
	}
	
	protected load_config($path){
		if(file_exists($this->path.'/'.$path.'/config.php')){
			return include_once($this->path.'/'.$path.'/config.php');
		}
		return FALSE;
	}
}






























