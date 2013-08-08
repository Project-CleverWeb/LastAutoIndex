<?php
/**
 * Some custom functions
 */

function _require($path){
  // add kick to error handle functionality
  // use require only
  require($path);
}

function _require_once($path){
  // add kick to error handle functionality
  // add custom file tracking
  // use require > require_once
  require_once($path);
}

function _include($path){
  // add kick to error handle functionality
  // use include only
  include($path);
}

function _include_once($path){
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

