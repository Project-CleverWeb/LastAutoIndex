<?php
header('Content-type: text/html; charset=utf-8');
?><!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="en" > <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en" > <!--<![endif]-->

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=2">
	<title>LAI | <?php echo PATH_URI; ?></title>
	
	<?php _include(__DIR__.'/css_config.php'); ?>
	
	<link rel="stylesheet" href="<?php echo PATH_THEME; ?>/css/foundation.min.css">
	<link rel="stylesheet" href="<?php echo PATH_THEME; ?>/css/webicons.css">
	<link rel="stylesheet" href="<?php echo PATH_THEME; ?>/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo PATH_THEME; ?>/markdown.css.php">
	<link rel="stylesheet" href="<?php echo PATH_THEME; ?>/css/custom.css.php">
	<!-- <link rel="stylesheet" href="<?php echo PATH_THEME; ?>/css/color/blue.css"> -->
	<!-- <link rel="stylesheet" href="<?php echo PATH_THEME; ?>/css/color/green.css"> -->
	<!-- <link rel="stylesheet" href="<?php echo PATH_THEME; ?>/css/color/orange.css"> -->
	<!-- <link rel="stylesheet" href="<?php echo PATH_THEME; ?>/css/color/pink.css"> -->
	<!-- <link rel="stylesheet" href="<?php echo PATH_THEME; ?>/css/color/purple.css"> -->
	<!-- <link rel="stylesheet" href="<?php echo PATH_THEME; ?>/css/color/red.css"> -->
	<!-- <link rel="stylesheet" href="<?php echo PATH_THEME; ?>/css/color/yellow.css"> -->
	<!-- <link rel="stylesheet" href="<?php echo PATH_THEME; ?>/css/color/blue.css"> -->
	<!-- <link rel="stylesheet" href="<?php echo PATH_THEME; ?>/css/color/custom.css.php"> -->
	
	<link href="<?php echo PATH_THEME; ?>/js/vendor/google-code-prettify/prettify.css" type="text/css" rel="stylesheet" />
	
	<script src="<?php echo PATH_THEME; ?>/js/vendor/head.load.min.js"></script>
	
	<script type="text/javascript" >
		// lets load js files in parallel
		head.js(
			// random
			"<?php echo PATH_THEME; ?>/js/vendor/jquery-1.10.2.min.js",
			"<?php echo PATH_THEME; ?>/js/vendor/jquery.transit.min.js",
			"<?php echo PATH_THEME; ?>/js/vendor/custom.modernizr.js",
			"<?php echo PATH_THEME; ?>/js/vendor/mousetrap.min.js",
			"<?php echo PATH_THEME; ?>/js/vendor/google-code-prettify/prettify.js",
			// foundation
			"<?php echo PATH_THEME; ?>/js/foundation/foundation.js",
			"<?php echo PATH_THEME; ?>/js/foundation/foundation.alerts.js",
			"<?php echo PATH_THEME; ?>/js/foundation/foundation.clearing.js",
			"<?php echo PATH_THEME; ?>/js/foundation/foundation.cookie.js",
			"<?php echo PATH_THEME; ?>/js/foundation/foundation.dropdown.js",
			"<?php echo PATH_THEME; ?>/js/foundation/foundation.forms.js",
			"<?php echo PATH_THEME; ?>/js/foundation/foundation.joyride.js",
			"<?php echo PATH_THEME; ?>/js/foundation/foundation.magellan.js",
			"<?php echo PATH_THEME; ?>/js/foundation/foundation.orbit.js",
			"<?php echo PATH_THEME; ?>/js/foundation/foundation.reveal.js",
			"<?php echo PATH_THEME; ?>/js/foundation/foundation.section.js",
			"<?php echo PATH_THEME; ?>/js/foundation/foundation.tooltips.js",
			"<?php echo PATH_THEME; ?>/js/foundation/foundation.topbar.js",
			"<?php echo PATH_THEME; ?>/js/foundation/foundation.interchange.js",
			"<?php echo PATH_THEME; ?>/js/foundation/foundation.placeholder.js",
			"<?php echo PATH_THEME; ?>/js/foundation/foundation.abide.js",
			
			function() { // Scripts are loaded, but the page may not be ready yet
				// load foundation
				$(document).foundation();
				
				// switch over to animate if transitions aren't supported
				if (!$.support.transition){
					$.fn.transition = $.fn.animate;
				}
			}
		);
		
		head.ready(function() {
			prettyPrint(); // code highlight
			
			// don't show invalid images, but reserve the area if the demensions are set
			$("img").error(function () { 
				$(this).css({visibility:"hidden"}); 
			});
			
			// (experimental)
			function resizeText(multiplier) {
				if (document.body.style.fontSize == "") {
					document.body.style.fontSize = "15px";
				}
				document.body.style.fontSize = parseFloat(document.body.style.fontSize) + (multiplier) + "px";
			}
			
			function toggleSearch() {
				if ($('#search').css('height') == '50px') {
					$('#search').transition({ height: '1px' });
				} else {
					$('#search').transition({ height: '50px' });
				}
			}
			
			// keyboard shortcuts
			
			Mousetrap.bind(['command+up', 'ctrl+up'], function(e) {
				// font size ++
				resizeText(1);
				return false;
			});
			
			Mousetrap.bind(['command+down', 'ctrl+down'], function(e) {
				// font size --
				resizeText(-1);
				return false;
			});
			
			Mousetrap.bind(['command+left', 'ctrl+left'], function(e) {
				// up 1 dir
				window.location.href = "../";
				return false;
			});
			
			Mousetrap.bind(['shift+left'], function(e) {
				// up 2 dir
				window.location.href = "../../";
				return false;
			});
			
			Mousetrap.bind(['alt+left'], function(e) {
				// server root
				window.location.href = "/";
				return false;
			});
			
			Mousetrap.bind(['command+right', 'ctrl+right'], function(e) {
				// toggle search
				toggleSearch();
				return false;
			});
			
			Mousetrap.bind(['command+l', 'ctrl+l'], function(e) {
				// show login
				javacript: $('#login-modal').foundation('reveal', 'open');
				return false;
			});
			
			Mousetrap.bind(['alt+l'], function(e) {
				// logout
				window.location.href = "?logout";
				return false;
			});
			
			Mousetrap.bind(['alt+h r'], function(e) {
				// hide readme
				$('.readme').transition({ scale: 0 })
					.transition({display:'none'});
				return false;
			});
			
			Mousetrap.bind(['alt+s r'], function(e) {
				// hide readme
				$('.readme').transition({display:'block'});
				return false;
			});
			
			// konami code! (shortcut cheat-sheet)
			Mousetrap.bind('up up down down left right left right b a', function() {
				javacript: $('#konami-code').foundation('reveal', 'open');
			});
			
		});
		
	</script>
	
	<!--[if lt IE 9]>
	<link rel="stylesheet" href="<?php echo PATH_THEME; ?>/css/responsive-tables/ie.css">
	<![endif]-->
	
	
	<!-- IE Fix for HTML5 Tags -->
	<!--[if lt IE 9]>
	<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body>
	
	