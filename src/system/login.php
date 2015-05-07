<?php
/**
 * Theme Class
 */

namespace projectcleverweb\lastautoindex;

/**
 * Theme Class (view-model)
 */
class login {
	public $is_logged_in;
	
	public function __construct() {
		$this->is_logged_in = main::$config['use_login'];
	}
}