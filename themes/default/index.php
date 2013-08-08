<?php
// pre page calculations

?><!doctype html>
<html>
	<head>
		<title>Auto Index</title>
		
		<link rel="stylesheet" href="<?php echo PATH_THEME; ?>/css/font-awesome.min.css">
	</head>
	<body>
		<pre>
			<?php $const = get_defined_constants(1); print_r($const['user']); ?>
		</pre>
	</body>
</html>