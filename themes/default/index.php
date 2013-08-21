<!DOCTYPE html>
<!--[if IE 8]> 				 <html class="no-js lt-ie9" lang="en" > <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en" > <!--<![endif]-->

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<title>LastAutoIndex | <?php echo SER_REQ_URI; ?></title>

	<link rel="stylesheet" href="<?php echo PATH_THEME; ?>/css/foundation.css">
	<link rel="stylesheet" href="<?php echo PATH_THEME; ?>/css/webicons.css">
	<link rel="stylesheet" href="<?php echo PATH_THEME; ?>/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo PATH_THEME; ?>/markdown.css">
	<link rel="stylesheet" href="<?php echo PATH_THEME; ?>/view-source.css">
	<link rel="stylesheet" href="<?php echo PATH_THEME; ?>/css/custom.css">
	

	<script src="<?php echo PATH_THEME; ?>/js/jquery-1.10.2.min.js"></script>
	<script src="<?php echo PATH_THEME; ?>/js/vendor/custom.modernizr.js"></script>
<script type="text/javascript" >
$("img").error(function () { 
    // $(this).hide();
    $(this).css({visibility:"hidden"}); 
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
	
	
	
	
	
	
	<div class="row">
		<div class="large-12 columns">
		
		
			<div class="row">
				<div class="large-12 columns directory-contents">
					
					
					<h2>Directory &nbsp;&nbsp;<small><code><?php echo urldecode(SER_REQ_URI); ?></code></small></h2>
					<div class="dir-bar">
						<div class="row">
							<div class="small-7 large-4 columns">
								<span class="valign-middle dir-bar-content">
									<a class="dir-bar-button valign-middle" href="javascript:history.go(-1)"><i class="icon-caret-left fa-icon same"></i>Back</a>
									
									<a class="dir-bar-button valign-middle dir-up-button" href="<?php echo PATH_URI.'..'; ?>">../</a>
									<a class="dir-bar-button valign-middle dir-up-button" href="<?php echo PATH_URI.'../..'; ?>">../../</a>
								</span>
							</div>
							<div class="small-5 large-3 columns right text-right">
								<a href="#" class="dir-bar-button valign-middle" data-dropdown="options-dropdown">Options</a>
								<ul id="options-dropdown" class="f-dropdown" data-dropdown-content>
									<li><center>This will work later</center><hr></li>
									<li><a href="#">Download</a></li>
									<li><a href="#">View Source</a></li>
									<li><a href="#">Delete</a></li>
								</ul>
								<a class="dir-bar-button valign-middle" href="#" data-dropdown="drop2">Search</a>
								<div id="drop2" class="f-dropdown medium content" data-dropdown-content>
									<form method="post" accept-charset="utf-8">
										<input type="text">
										<span class="left"><input type="radio" name="place" value=""> From Server Root<br /></span>
										<span class="left"><input type="radio" name="place" value=""> In this Directory<br /></span>
										<a class="dir-bar-button valign-middle right" href="#"><i class="icon-search"></i></a>
									</form>
								</div>
							</div>
						</div>
					</div>
					<table class="responsive dir-items" style="width:100%;">
						<tbody>
							<tr>
								<th style="width:35%;">Name</th>
								<th class="hide-for-small">Description</th>
								<th style="min-width:15%">Size</th>
								<th style="min-width:15%">Type</th>
							</tr>
							
							<?php
								foreach ($_lai->dir->all() as $item) {
									$is_dir = '<i class="icon-code"></i> ';
									if($item['is_dir']){
										$is_dir = '<i class="icon-folder-close-alt"></i> ';
										$filesize = '-';
										
									}else{
										if(stripos(strtolower($item['filename']),'readme') !== FALSE){
											$readme = SER_DOC_ROOT.PATH_URI.$item['filename'].'.'.$item['ext'];
											$readme_name = $item['filename'].'.'.$item['ext'];
										}
									}
									if(stripos($item['name'], '.git')!==FALSE) {
										$is_dir = '<i class="icon-github"></i> ';
									}
									?>
							<tr>
								<td style="width:35%;"><a href="<?php echo $item['path']; ?>"><?php echo $is_dir.$item['name']; ?></a></td>
								<td class="hide-for-small"><?php echo $item['filename']; ?></td>
								<td style="min-width:15%"><?php echo $item['size']; ?></td>
								<td style="min-width:15%"><?php echo $item['ext']; ?></td>
							</tr>
									<?php
								}
							?>
							
						</tbody>
					</table>
					
					
					
					<?php
						if (isset($readme) && file_exists($readme) && is_file($readme)) {
							$handle = fopen($readme, "r");
							$readme_text = fread($handle, filesize($readme));
							fclose($handle);
							?>
								<div class="markdown-wrapper">
									<center><h2><?php echo $readme_name; ?></h2></center>
									<div class="markdown-content readme">
										
										<?php
										echo $_lai->markdown->read($readme_text);
										?>
										
									</div>
								</div>
							<?php
						}
					?>
					
					
					<?php if(defined('LAI_ENV') && strtoupper(LAI_ENV) == 'DEV'){ ?>
					<h3>Constants &nbsp;&nbsp;<small><code><?php echo str_replace(array('\\','/'),DS,SER_DOC_ROOT.SER_REQ_URI); ?></small></code></h3>
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
					
					<?php if(isset($_GET['symbols'])){ 
						$symbols = array(
							'bitbucket-sign',
							'chevron-up',
							'windows',
							'skype',
							'youtube-sign',
							'youtube-play',
							'sort-by-alphabet',
							'sort-by-alphabet-alt',
							'stackexchange',
							'apple',
							'android',
							'linux',
							'sun',
							'moon',
							'bug',
							'beaker',
							'camera',
							'code',
							'code-fork',
							'desktop',
							'download',
							'external-link',
							'eye-open',
							'eye-close',
							'film',
							'folder-open-alt',
							'folder-close-alt',
							'globe',
							'home',
							'lock',
							'unlock',
							'move',
							'ok',
							'ok-circle',
							'ok-sign',
							'pencil',
							'minus-sign-alt',
							'plus-sign-alt',
							'puzzle-peice',
							'question',
							'quote-right',
							'quote-left',
							'search',
							'sort-up',
							'sort-down',
							'terminal',
							'time',
							'trash',
							'warning-sign',
							'css3',
							'html5',
							'facebook-sign',
							'twitter-sign'
						);
						
						?>
					<h3>Symbols</h3>
					<table class="responsive" style="width:100%;">
						<tbody>
							<tr>
								<th>Name</th>
								<th>Example</th>
							</tr>
							
							<?php 
								foreach ($symbols as $ex) {
									?>
							<tr>
								<td><a href="#"><?php echo $ex; ?></a></td>
								<td><?php echo sprintf('<i class="icon-%1$s" style="font-size:16px"></i> <i class="icon-%1$s" style="font-size:24px"></i> <i class="icon-%1$s" style="font-size:32px"></i> <i class="icon-%1$s" style="font-size:64px"></i>',$ex); ?></td>
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
							<p title="<?php runtime('STOP','RUNTIME'); echo RUNTIME; ?>" class="copyright">Copyright &copy; Nicholas Jordon &mdash; All Right Reserved</p>
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
	<script src="<?php echo PATH_THEME; ?>/js/foundation/foundation.dropdown.js"></script>
	<script src="<?php echo PATH_THEME; ?>/js/foundation/foundation.placeholder.js"></script>
	<script src="<?php echo PATH_THEME; ?>/js/foundation/foundation.forms.js"></script>
	<script src="<?php echo PATH_THEME; ?>/js/foundation/foundation.alerts.js"></script>
	<script src="<?php echo PATH_THEME; ?>/js/foundation/foundation.clearing.js"></script>
	<script src="<?php echo PATH_THEME; ?>/js/foundation/foundation.cookie.js"></script>
	<script src="<?php echo PATH_THEME; ?>/js/foundation/foundation.orbit.js"></script>
	<script src="<?php echo PATH_THEME; ?>/js/foundation/foundation.section.js"></script>
	<script src="<?php echo PATH_THEME; ?>/js/foundation/foundation.topbar.js"></script>
	-->
	
	<script>
		$(document).foundation();
	</script>
	
	
	<div id="social-modal" class="reveal-modal small">
		<div class="row">
			<div class="large-12 columns">
				<span class="webicon coderwall" title="Share on Coderwall"></span>
				<span class="webicon facebook" title="Share on Facebook"></span>
				<span class="webicon twitter" title="Share on Twitter"></span>
				<span class="webicon github" title="See the project on Github"></span>
				<span class="webicon mail" title="Send us feedback"></span>
				This will work later
			</div>
		</div>
		
		<a class="close-reveal-modal">&#215;</a>
	</div>
	
	
</body>
</html>
