<?php

// config file explorer

_require_once(__DIR__.DS.'file_explorer.class.php');
$_lai->plugin->register('file-explorer',new file_explorer);
$_lai->dir = new file_explorer(SER_DOC_ROOT.PATH_URI);
