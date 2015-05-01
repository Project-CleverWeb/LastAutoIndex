<?php
/**
 * Simple PSR-4 Autoloader for the default theme
 */

/**
 * Simple PSR-4 autoloader
 * =======================
 * This should always be ignored by code coverage.
 * 
 * @codeCoverageIgnore
 */
spl_autoload_register(function ($class) {
	$prefix = 'projectcleverweb\\lastautoindex\\themes\\default_theme';
	
	$prefix_len = strlen($prefix);
	if(strncmp($prefix, $class, $prefix_len) !== 0) {
		return;
	}
	
	$file = __DIR__.'/includes'.str_replace('\\', DIRECTORY_SEPARATOR, substr($class, $prefix_len)).'.php';
	
	if(file_exists($file) && is_file($file)) {
		require_once $file;
	}
});