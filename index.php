<?php
require_once __DIR__.'/lib/last_auto_index.class.php';
$_lai = new last_auto_index(__DIR__.'/default_config.json', __DIR__);
$_lai->build(); // let the magic begin
