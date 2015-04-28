<?php
/**
 * Error Class
 */

namespace projectcleverweb\lastautoindex;

/**
 * Error Class (model)
 * ===================
 * This class provides a simple way to create "pretty" errors
 */
class error {
	
	public $count           = 0;
	public $fatal_errors    = array();
	public $standard_errors = array();
	public $warning_errors  = array();
	public $all;
	public $error_reporting = 3;
	
	public function __construct() {
		$this->all = array(
			'fatal'    => &$this->fatal_errors,
			'standard' => &$this->standard_errors,
			'warning'  => &$this->warning_errors
		);
	}
	
	
	/**
	 * No Kill
	 */
	public function warning($msg) {
		if ($this->error_reporting == 3) {
			$this->warning_errors[] = $msg;
		}
		$this->count++;
	}
	
	/**
	 * Kill Later
	 */
	public function standard($msg) {
		if ($this->error_reporting > 1) {
			$this->standard_errors[] = $msg;
		}
		$this->count++;
	}
	
	/**
	 * Kill Now
	 */
	public function fatal($msg) {
		if ($this->error_reporting) {
			$this->fatal_errors[] = $msg;
		}
		$this->count++;
		exit();
	}
	
	private function _print() {
		foreach ($this->all as $type => $errors) {
			if (count($errors)) {
				$list = '<ul><li>'.implode('</li></li>', $errors).'</li></ul>';
				printf('<h3>%1$s</h3> %2$s', ucfirst($type).' Errors', $list);
			}
		}
	}
	
	public function __destruct() {
		if ($this->count && $this->error_reporting) {
			$this->_print();
			// debug::init();
			// debug::output();
		}
	}
	
	
}
