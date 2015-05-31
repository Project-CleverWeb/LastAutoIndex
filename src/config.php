<?php
/**
 * Main Configuration File
 * =======================
 * This file allows you to hardcode settings for LastAutoIndex
 */

/*** set to true to prevent others from installing ***/
define('LAI_INSTALLED', FALSE);

return array(
	/*** Required Settings ***/
	'use_login' => FALSE,
	
	/*** Conditional Settings ***/
	'database_host' => 'localhost', // required if "use_login" is set to TRUE [inactive]
	'database_name' => 'lastautoindex', // required if "use_login" is set to TRUE [inactive]
	'database_user' => 'root', // required if "use_login" is set to TRUE [inactive]
	'database_pass' => '', // required if "use_login" is set to TRUE [inactive]
	
	/*** Optional Settings ***/
	'force_login' => FALSE, // only used if "use_login" is set to TRUE [inactive]
	'theme' => 'default'
);
