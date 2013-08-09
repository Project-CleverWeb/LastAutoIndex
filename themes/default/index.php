<!DOCTYPE html>
<!--[if IE 8]> 				 <html class="no-js lt-ie9" lang="en" > <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en" > <!--<![endif]-->

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<title>LastAutoIndex | <?php echo SER_REQ_URI; ?></title>

	<link rel="stylesheet" href="<?php echo PATH_THEME; ?>/css/normalize.css">
	<link rel="stylesheet" href="<?php echo PATH_THEME; ?>/css/foundation.css">
	<link rel="stylesheet" href="<?php echo PATH_THEME; ?>/css/responsive-tables.css">
	<link rel="stylesheet" href="<?php echo PATH_THEME; ?>/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo PATH_THEME; ?>/css/custom.css">
	

	<script src="<?php echo PATH_THEME; ?>/js/vendor/custom.modernizr.js"></script>
	<script src="<?php echo PATH_THEME; ?>/js/jquery-1.10.2.min.js"></script>

	<!--[if lt IE 9]>
	<link rel="stylesheet" href="<?php echo PATH_THEME; ?>/css/responsive-tables/ie.css">
	<![endif]-->
	
	
	<!-- IE Fix for HTML5 Tags -->
	<!--[if lt IE 9]>
	<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<style type="text/css">
	
	@font-face {
		font-family: 'Droid Sans';
		font-style: normal;
		font-weight: 400;
		src: local('Droid Sans'), local('DroidSans'), url(<?php echo PATH_THEME; ?>/font/Droid_Sans/DroidSans.ttf) format('ttf');
	}
	@font-face {
		font-family: 'Droid Sans';
		font-style: normal;
		font-weight: 700;
		src: local('Droid Sans Bold'), local('DroidSans-Bold'), url(<?php echo PATH_THEME; ?>/font/Droid_Sans/DroidSans-Bold.ttf) format('ttf');
	}
	@font-face {
		font-family: 'Droid Sans Mono';
		font-style: normal;
		font-weight: 400;
		src: local('Droid Sans Mono'), local('DroidSansMono'), url(<?php echo PATH_THEME; ?>/font/Droid_Sans_Mono/DroidSansMono.ttf) format('ttf');
	}
	@font-face {
		font-family: 'Roboto';
		font-style: normal;
		font-weight: 300;
		src: local('Roboto Light'), local('Roboto-Light'), url(<?php echo PATH_THEME; ?>/font/Roboto/Roboto-Light.ttf) format('ttf');
	}
	@font-face {
		font-family: 'Roboto';
		font-style: normal;
		font-weight: 400;
		src: local('Roboto Regular'), local('Roboto-Regular'), url(<?php echo PATH_THEME; ?>/font/Roboto/Roboto-Regular.ttf) format('ttf');
	}
	@font-face {
		font-family: 'Roboto';
		font-style: normal;
		font-weight: 500;
		src: local('Roboto Medium'), local('Roboto-Medium'), url(<?php echo PATH_THEME; ?>/font/Roboto/Roboto-Medium.ttf) format('ttf');
	}
	@font-face {
		font-family: 'Roboto';
		font-style: normal;
		font-weight: 700;
		src: local('Roboto Bold'), local('Roboto-Bold'), url(<?php echo PATH_THEME; ?>/font/Roboto/Roboto-Bold.ttf) format('ttf');
	}
	
</style>
<body>

<!-- Navigation -->

	<nav class="top-bar">
		<ul class="title-area">
			<!-- Title Area -->
			<li class="name">
				<h1>
					<a href="#">
						LastAutoIndex
					</a>
				</h1>
			</li>
			<li class="toggle-topbar menu-icon"><a href="#"><span>menu</span></a></li>
		</ul>
 
		<section class="top-bar-section">
			<!-- Right Nav Section -->
			<ul class="right">
				<li class="divider"></li>
				<li class="has-dropdown">
					<a href="#">Main Item 1</a>
					<ul class="dropdown">
						<li><label>Section Name</label></li>
						<li class="has-dropdown">
							<a href="#" class="">Has Dropdown, Level 1</a>
							<ul class="dropdown">
								<li><a href="#">Dropdown Options</a></li>
								<li><a href="#">Dropdown Options</a></li>
								<li><a href="#">Level 2</a></li>
								<li><a href="#">Subdropdown Option</a></li>
								<li><a href="#">Subdropdown Option</a></li>
								<li><a href="#">Subdropdown Option</a></li>
							</ul>
						</li>
						<li><a href="#">Dropdown Option</a></li>
						<li><a href="#">Dropdown Option</a></li>
						<li class="divider"></li>
						<li><label>Section Name</label></li>
						<li><a href="#">Dropdown Option</a></li>
						<li><a href="#">Dropdown Option</a></li>
						<li><a href="#">Dropdown Option</a></li>
						<li class="divider"></li>
						<li><a href="#">See all &rarr;</a></li>
					</ul>
				</li>
				<li class="divider"></li>
				<li><a href="#">Main Item 2</a></li>
				<li class="divider"></li>
				<li class="has-dropdown">
					<a href="#">Main Item 3</a>
					<ul class="dropdown">
						<li><a href="#">Dropdown Option</a></li>
						<li><a href="#">Dropdown Option</a></li>
						<li><a href="#">Dropdown Option</a></li>
						<li class="divider"></li>
						<li><a href="#">See all &rarr;</a></li>
					</ul>
				</li>
			</ul>
		</section>
	</nav>
 
	<!-- End Top Bar -->

	<div class="row">
		<div class="large-12 columns">


			<div class="row">
				<div class="large-12 columns">
					
					
					<h3>Directory &nbsp;&nbsp;<small><?php echo SER_REQ_URI; ?></small></h3>
					<table class="responsive" style="width:100%;">
						<tbody>
							<tr>
								<th>Name</th>
								<th>Description</th>
								<th>Size</th>
								<th>Type</th>
							</tr>
							
							<?php 
								foreach ($_lai->dir->all() as $value) {
									?>
							<tr>
								<td style="width:15em"><a href="<?php echo SER_REQ_URI.$value; ?>"><?php echo $value; ?></a></td>
								<td>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td>
								<td>1.04 Mb</td>
								<td>Example/PHP-Image</td>
							</tr>
									<?php
								}
							?>
							
						</tbody>
					</table>
					
					<?php if(defined('LAI_ENV') && strtoupper(LAI_ENV) == 'DEV'){ ?>
					<h3>Constants &nbsp;&nbsp;<small><?php echo str_replace(array('\\','/'),DS,SER_DOC_ROOT.SER_REQ_URI); ?></small></h3>
					<table class="responsive" style="width:100%;">
						<tbody>
							<tr>
								<th>Name</th>
								<th>Value</th>
							</tr>
							
							<?php 
								$constants = get_defined_constants(1);
								foreach ($constants['user'] as $name => $value) {
									?>
							<tr>
								<td style="width:15em"><a href="#"><?php echo $name; ?></a></td>
								<td><?php echo $value; ?></td>
							</tr>
									<?php
								}
							?>
							
						</tbody>
					</table>
					<?php } // end IF LAI_ENV == 'DEV' ?>
					
				</div>
			</div>

		<!-- End Content -->


		<!-- Footer -->

			<footer class="row">
				<div class="large-12 columns"><hr>
						<div class="row">

							<div class="large-6 columns">
									<p>&copy; Copyright &copy; Nicholas Jordon &mdash; All Right Reserved</p>
							</div>

							<div class="large-6 small-12 columns">
									<ul class="inline-list right">
										<li><a href="#">Link 1</a></li>
										<li><a href="#">Link 2</a></li>
										<li><a href="#">Link 3</a></li>
										<li><a href="#">Link 4</a></li>
									</ul>
							</div>

						</div>
				</div>
			</footer>

		<!-- End Footer -->

		</div>
	</div>

	
	<script src="<?php echo PATH_THEME; ?>/js/foundation.min.js"></script>
	<!--
	<script src="<?php echo PATH_THEME; ?>/js/foundation/foundation.js"></script>
	<script src="<?php echo PATH_THEME; ?>/js/foundation/foundation.interchange.js"></script>
	<script src="<?php echo PATH_THEME; ?>/js/foundation/foundation.abide.js"></script>
	<script src="<?php echo PATH_THEME; ?>/js/foundation/foundation.dropdown.js"></script>
	<script src="<?php echo PATH_THEME; ?>/js/foundation/foundation.placeholder.js"></script>
	<script src="<?php echo PATH_THEME; ?>/js/foundation/foundation.forms.js"></script>
	<script src="<?php echo PATH_THEME; ?>/js/foundation/foundation.alerts.js"></script>
	<script src="<?php echo PATH_THEME; ?>/js/foundation/foundation.magellan.js"></script>
	<script src="<?php echo PATH_THEME; ?>/js/foundation/foundation.reveal.js"></script>
	<script src="<?php echo PATH_THEME; ?>/js/foundation/foundation.tooltips.js"></script>
	<script src="<?php echo PATH_THEME; ?>/js/foundation/foundation.clearing.js"></script>
	<script src="<?php echo PATH_THEME; ?>/js/foundation/foundation.cookie.js"></script>
	<script src="<?php echo PATH_THEME; ?>/js/foundation/foundation.joyride.js"></script>
	<script src="<?php echo PATH_THEME; ?>/js/foundation/foundation.orbit.js"></script>
	<script src="<?php echo PATH_THEME; ?>/js/foundation/foundation.section.js"></script>
	<script src="<?php echo PATH_THEME; ?>/js/foundation/foundation.topbar.js"></script>
	-->
	
	<script>
		$(document).foundation();
	</script>
</body>
</html>
