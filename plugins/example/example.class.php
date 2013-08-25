<?php

/**
 * "Example" Plugin class
 * ----------------------
 * This class is not actually intended for use with
 * anything
 */
class example{
	
	public $installed_plugins;
	
	public function function __construct() {
		$this->installed_plugins = $_lai->plugin->get_list();
		
		$this->init();
	}
	
	/**
	 * This function is just for setting up things
	 * outside of this class. Seperating them like this
	 * helps keep the code a little more organized, but
	 * is not required.
	 * 
	 * @return VOID
	 */
	private function init(){
		// this function is just to setup things outside of this class
		global $_lai;
		$_lai->ex_time = time();
	}
	
	/**
	 * Standard foo/bar
	 * 
	 * @param  mixed $input  The input
	 * @return string        $input typecast as a string
	 */
	public function foo($input = 'bar'){
		return (string) $input;
	}
	
	/**
	 * Get the time
	 * 
	 * @return string  the time
	 */
	public function get_time(){
		return time();
	}
	
}








