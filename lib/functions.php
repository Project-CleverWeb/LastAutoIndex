<?php
/**
 * Some custom functions
 */

function _require_once($path){
	
	require_once($path);
	
}

function _strlen($str, $use_encoding=FALSE, $encoding='utf8'){
	if($use_encoding){
		return mb_strlen($str, $encoding); 
	}
	return strlen($str); 
}

