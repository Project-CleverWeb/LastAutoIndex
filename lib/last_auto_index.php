<?php
/**
 * Prep for the rest of the system
 * -------------------------------
 * We are just going to import some presets to make things easier
 */

$_lai = new stdClass();

// error level
if(!defined('ERROR_LVL')){
	define('ERROR_LVL', -1, 1);
}
error_reporting(ERROR_LVL);

function runtime($action,$stop_const=FALSE){
	static $start;
	static $stop;
	switch (strtoupper($action)) {
		case 'START':
			$start = microtime();
			break;
		
		case 'STOP':
			$stop = microtime();
			_define($stop_const,($stop - $start));
			break;
		
		default:
			return FALSE;
			break;
	}
}
runtime('START','RUNTIME');
function _define($name,$value,$dev_safe=NULL,$icase=1){
	if(defined($name)){
		return TRUE;
	}
	if(empty($dev_safe)==0 && (defined('LAI_ENV')==1 && LAI_ENV == 'DEV')==1) {
		return define($name,$dev_safe,$icase);
	} else {
		return define($name,$value,$icase);
	}
}

// constants
_define('EOL'         , PHP_EOL);
_define('DS'          , DIRECTORY_SEPARATOR);
_define('SER_NAME'    , $_SERVER['SERVER_NAME']);
_define('SER_HOST'    , $_SERVER['HTTP_HOST']);
_define('SER_ADDRESS' , $_SERVER['SERVER_ADDR']);
_define('SER_PORT'    , $_SERVER['SERVER_PORT']);
_define('SER_FILENAME', $_SERVER['SCRIPT_NAME']);
_define('SER_SELF'    , $_SERVER['PHP_SELF']);
_define('SER_DOC_ROOT', $_SERVER['DOCUMENT_ROOT']);
_define('SER_REQ_URI' , $_SERVER['REQUEST_URI']);
_define('USER_AGENT'  , $_SERVER['HTTP_USER_AGENT']);
_define('USER_QUERY'  , $_SERVER['QUERY_STRING']);
_define('USER_IP'     , $_SERVER['REMOTE_ADDR']);


// variables




// functions
require_once(__DIR__.DS.'functions.php');




// includes
_require_once(__DIR__.DS.'last_auto_index.class.php');

