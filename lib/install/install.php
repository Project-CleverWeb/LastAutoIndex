<?php

if(isset($_GET['config'])){
	require_once __DIR__'/includes/data.php';
}

?><!DOCTYPE html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8" />

	<!-- Set the viewport width to device width for mobile -->
	<meta name="viewport" content="width=device-width" />

	<title>LastAutoIndex | Install</title>

	<!-- Included CSS Files -->
	<link rel="stylesheet" href="../../themes/default/css/foundation.min.css">
	<link rel="stylesheet" href="../../themes/default/css/webicons.css">
	<link rel="stylesheet" href="../../themes/default/css/font-awesome.min.css">
	<link rel="stylesheet" href="../../themes/default/css/custom.css.php">
	

	<script src="../../themes/default/js/vendor/custom.modernizr.js"></script>
	<script src="../../themes/default/js/vendor/jquery-1.10.2.min.js"></script>

</head>
<style type="text/css" media="screen">
	.row{
		margin-bottom: 15px;
	}
</style>
<body>

	<!-- Main Grid Section -->
<div class="row">
	<div class="small-1 columns">&nbsp;</div>
	<div class="small-10 columns">
		<center><h1>Configure LastAutoIndex</h1><hr><br /></center>
	</div>
	<div class="small-1 columns">&nbsp;</div>
</div>

	<div class="row">
		
		<div class="small-12 columns">
			<p>This would be a reflection of <code>/default_config.json</code>.</p>
		</div>
		
	</div>
	
	
	



	<!-- Footer -->

	<footer class="row">
		<div class="large-7 columns">
			<a href="#" data-reveal-id="social-modal">
				<span class="webicon coderwall" title="Share on Coderwall"></span>
				<span class="webicon facebook" title="Share on Facebook"></span>
				<span class="webicon twitter" title="Share on Twitter"></span>
				<span class="webicon github" title="See the project on Github"></span>
				<span class="webicon mail" title="Send us feedback"></span>
			</a>
		</div>
		
		<div class="large-5 columns">
			<p class="copyright">Copyright &copy; Nicholas Jordon &mdash; All Right Reserved</p>
		</div>
	</footer>
	
	<?php include(__DIR__.'/includes/intro_modals.php'); ?>
	<?php include(__DIR__.'/includes/install_modals.php'); ?>
	
	<script src="../../themes/default/js/foundation/foundation.js"></script>
	<script src="../../themes/default/js/foundation/foundation.alerts.js"></script>
	<script src="../../themes/default/js/foundation/foundation.clearing.js"></script>
	<script src="../../themes/default/js/foundation/foundation.cookie.js"></script>
	<script src="../../themes/default/js/foundation/foundation.dropdown.js"></script>
	<script src="../../themes/default/js/foundation/foundation.forms.js"></script>
	<script src="../../themes/default/js/foundation/foundation.joyride.js"></script>
	<script src="../../themes/default/js/foundation/foundation.magellan.js"></script>
	<script src="../../themes/default/js/foundation/foundation.orbit.js"></script>
	<script src="../../themes/default/js/foundation/foundation.reveal.js"></script>
	<script src="../../themes/default/js/foundation/foundation.section.js"></script>
	<script src="../../themes/default/js/foundation/foundation.tooltips.js"></script>
	<script src="../../themes/default/js/foundation/foundation.topbar.js"></script>
	<script src="../../themes/default/js/foundation/foundation.interchange.js"></script>
	<script src="../../themes/default/js/foundation/foundation.placeholder.js"></script>
	<script src="../../themes/default/js/foundation/foundation.abide.js"></script>
	<script>
		$(document).foundation();
		window.onload=function(){javacript: $('#intro-modal1').foundation('reveal', 'open');};
	</script>

</body>
</html>
