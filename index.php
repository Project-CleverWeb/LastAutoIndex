<?php
require_once __DIR__.'/lib/last_auto_index.php';
$_lai = new stdClass();
$_lai->sys = new last_auto_index(__DIR__.DS.'default_config.json', __DIR__);
$_lai->sys->build(); // let the magic begin
