<?php
require_once __DIR__.'/lib/php/last_auto_index.class.php';
$_lai = new last_auto_index;
$_lai->init(__DIR__.'/config.json');
$_lai->build(); // let the magic begin
