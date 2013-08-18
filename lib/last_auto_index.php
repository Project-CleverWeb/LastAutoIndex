<?php
/**
 * Prep for the rest of the system
 * -------------------------------
 * We are just going to import some presets to make things easier
 */

$_lai = new stdClass;

// pre-functions
require_once(__DIR__.'\pre-functions.php');

runtime('START');

// error level
if(!defined('ERROR_LVL')){
	_define('ERROR_LVL', -1);
}
error_reporting(ERROR_LVL);

// constants
_define('EOL'         , PHP_EOL);
_define('DS'          , DIRECTORY_SEPARATOR);
_define('SER_NAME'    , $_SERVER['SERVER_NAME']);
_define('SER_HOST'    , $_SERVER['HTTP_HOST']);
_define('SER_ADDRESS' , $_SERVER['SERVER_ADDR']);
_define('SER_PORT'    , $_SERVER['SERVER_PORT']);
_define('SER_FILENAME', urldecode($_SERVER['SCRIPT_NAME']));
_define('SER_SELF'    , urldecode($_SERVER['PHP_SELF']));
_define('SER_DOC_ROOT', urldecode($_SERVER['DOCUMENT_ROOT']));
_define('SER_REQ_URI' , $_SERVER['REQUEST_URI']); // [comeback] urldecode path but not query
_define('USER_AGENT'  , $_SERVER['HTTP_USER_AGENT']);
_define('USER_QUERY'  , $_SERVER['QUERY_STRING']);
_define('USER_IP'     , $_SERVER['REMOTE_ADDR']);


// variables








// includes
_require_once(__DIR__.DS.'last_auto_index.class.php');

