<?php
/**
 * Simple PSR-4 Autoloader and Main Alias Class
 */

/**
 * Simple PSR-4 autoloader
 * =======================
 * This should always be ignored by code coverage.
 * 
 * @codeCoverageIgnore
 */
spl_autoload_register(function ($class) {
	$prefix = 'projectcleverweb\\lastautoindex';
	
	$prefix_len = strlen($prefix);
	if(strncmp($prefix, $class, $prefix_len) !== 0) {
		return;
	}
	
	$file = __DIR__.'/system'.str_replace('\\', DIRECTORY_SEPARATOR, substr($class, $prefix_len)).'.php';
	
	if(file_exists($file) && is_file($file)) {
		require_once $file;
	}
});

// Load 3rd Party Libraries
require_once __DIR__.'/vendor/autoload.php';

// Alias Class
class lastautoindex extends \projectcleverweb\lastautoindex\main {}
