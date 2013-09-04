<?php
/**
 * Some custom standalone functions for startup
 */

function _require($path){
	global $_lai;
	// add kick to error handle functionality
	// use require only
	require($path);
}

function _require_once($path){
	global $_lai;
	// add kick to error handle functionality
	// add custom file tracking
	// use require > require_once
	require_once($path);
}

function _include($path){
	global $_lai;
	// add kick to error handle functionality
	// use include only
	include($path);
}

function _include_once($path){
	global $_lai;
	// add kick to error handle functionality
	// add custom file tracking
	// use include > include_once
	include_once($path);
}


function _strlen($str, $use_encoding=FALSE, $encoding='utf8'){
	if($use_encoding){
		return mb_strlen($str, $encoding); 
	}
	return strlen($str); 
}

function runtime($action,$stop_const=FALSE){
	static $start;
	static $stop;
	switch (strtoupper($action)) {
		case 'START':
			$start = (microtime(true) * 1000);
			break;
		
		case 'STOP':
			$stop = (microtime(true) * 1000);
			_define($stop_const,($stop - $start));
			break;
		
		default:
			return FALSE;
			break;
	}
}

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

function get_rel_path($path,$base_path,$ds = '/',$rm_query=TRUE){
	$base_path = str_replace(array("/","\\"), $ds, $base_path);
	$path = str_replace(array("/","\\"), $ds, $path);
	$test = strpos($path, $base_path);
	if ($test === FALSE) {
		return FALSE; // the paths are not related, relative path is impossible
	}
	$offset = strlen($base_path);
	if($rm_query){
		$q = stripos($path, '?');
		if($q!==FALSE){
			$path = substr($path, 0,($q-1));
		}
	}
	return ltrim(substr($path, $offset),$ds);
}

function formatSizeUnits($bytes){
	if ($bytes >= 1073741824){
		$bytes = number_format($bytes / 1073741824, 2) . ' GB';
	}elseif ($bytes >= 1048576){
		$bytes = number_format($bytes / 1048576, 2) . ' MB';
	}elseif ($bytes >= 1024){
		$bytes = number_format($bytes / 1024, 2) . ' KB';
	}elseif ($bytes > 1){
		$bytes = $bytes . ' Bytes';
	}elseif ($bytes == 1){
		$bytes = $bytes . ' Byte';
	}else{
		$bytes = '0 Bytes';
	}
	return $bytes;
}

