<?php
/**
 * Give file extensions meaning
 */

_require_once(__DIR__.'extensions.class.php');
if(!$_lai->plugin->register('extensions',new extensions)){
	// registering failed, either it not yet time or plugin alread exists
	// kick back up to parent script regardless
	return;
}

// now config the script

$_lai->extensions = new file_explorer(SER_DOC_ROOT.PATH_URI);