<?php
/**
 * Main Configuration File
 * =======================
 * This file allows you to hardcode settings for LastAutoIndex
 */

return array(
	/*** Required Settings ***/
	'use_login' => FALSE,
	
	/*** Conditional Settings ***/
	'database_host' => 'localhost', // required if "use_login" is set to TRUE
	'database_user' => 'root', // required if "use_login" is set to TRUE
	'database_pass' => '', // required if "use_login" is set to TRUE
	'database_name' => 'lastautoindex', // required if "use_login" is set to TRUE
	
	/*** Optional Settings ***/
	'force_login' => FALSE, // only used if "use_login" is set to TRUE
	'theme' => 'default'
);
