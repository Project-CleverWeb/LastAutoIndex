<?php
define('LAI_ENV','DEV',1); // until v1.0.0 this is default
require_once __DIR__.'/lib/last_auto_index.php';
$_lai->sys = new last_auto_index(__DIR__.DS.'default_config.json', __DIR__);
$_lai->sys->build(); // let the magic begin
