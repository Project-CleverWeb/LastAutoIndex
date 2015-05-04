<?php

if (!class_exists('lastautoindex', FALSE)) {
	exit("Forbidden: This directory/file cannot be accessed directly");
}


?><!DOCTYPE html>
<html>
<head>
	<?php
	theme::part('head', 'content');
	?>
</head>
<body>
	<?php
	theme::part('default', 'layout');
	?>
</body>
</html>
