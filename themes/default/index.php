<?php
_include_once(__DIR__.'/includes/header.php');
?>
	
	
	<div class="row">
		<div class="large-12 columns">
			
			<?php _include(__DIR__.'/includes/login-msg.php'); ?>
			
			<div class="row">
				<div class="large-12 columns directory-contents">
					
					
					<h3>Directory &nbsp;&nbsp;<small><code>
					<a href="/" style="font-size:1.2em;"><i class="icon-home"></i>/</a><?php
						
						$backdirs = explode('/',trim(PATH_URI,'/'));
						$prevdir = '';
						foreach ($backdirs as $backdir) {
							$prevdir .= $backdir.'/';
							if($backdir == ''){continue;}
							echo sprintf('<a href="/%1$s">%2$s/</a>',$prevdir,urldecode($backdir));
						}
					?>
					
					</code></small></h3>
					<div class="dir-bar">
						<div class="row">
							<div class="large-4 columns no-float-for-small text-centered-for-small">
								<span class="valign-middle dir-bar-content">
									<a class="dir-bar-button valign-middle" href="javascript:history.go(-1)"><i class="icon-caret-left fa-icon same"></i>Back</a>
									
									<a class="dir-bar-button valign-middle dir-up-button" href="<?php echo PATH_URI.'..'; ?>">../</a>
									<a class="dir-bar-button valign-middle dir-up-button" href="<?php echo PATH_URI.'../..'; ?>">../../</a>
								</span>
							</div>
							<?php if(isset($_lai->login) && $_lai->login->isUserLoggedIn()){ ?>
							<div class="large-4 columns text-center">
								<span class="valign-middle dir-bar-content">
									<span class="dir-bar-button valign-middle">
										<?php echo sprintf('Logged in as: %1$s',$_lai->login->getUsername()); ?>
									</span>
								</span>
							</div>
							<?php } ?>
							<div class="large-4 columns text-right no-float-for-small text-centered-for-small">
								<a href="#" class="dir-bar-button valign-middle" data-dropdown="options-dropdown">Options</a>
								<ul id="options-dropdown" class="f-dropdown" data-dropdown-content>
									<li><a href="#">Download</a></li>
									<li><a href="#">View Source</a></li>
									<li><a href="#">Delete</a></li>
								</ul>
								<a class="dir-bar-button valign-middle" href="javascript:$('#search').transition({ height: '50px' });">Search</a>
							</div>
						</div>
						<div class="row">
							<div id="search" class="small-12 columns" style="height:1px; overflow:hidden;">
								<br />
								<form method="post" action="?search" accept-charset="utf-8">
										
										<div class="row">
											<div class="small-3 columns">&nbsp;</div>
											<div class="small-6 columns">
												<input type="text" placeholder="Enter your query here">
											</div>
											<div class="small-2 columns">
												<button type="submit" class="dir-bar-button search">
													<i class="icon-search"></i>
												</button>
											</div>
											<div class="small-1 columns">
											</div>
										</div>
									</form>
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
								$tally = array('dir'=>0,'file'=>0);
								$this_dir = $_lai->dir->all();
								foreach ($this_dir as $item) {
									$is_dir = '<i class="icon-code"></i> ';
									if($item['is_dir']){
										$is_dir = '<i class="icon-folder-close-alt"></i> ';
										$filesize = '-';
										$tally['dir']++;
									}else{
										if(stripos(strtolower($item['filename']),'readme') !== FALSE){
											$readme = SER_DOC_ROOT.PATH_URI.$item['filename'].'.'.$item['ext'];
											$readme_name = $item['filename'].'.'.$item['ext'];
										}
										$tally['file']++;
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
					<div class="info-bar">
						<div class="row">
							<div class="small-6 large-5 columns text-center">
								<?php echo sprintf('%1$s Directorie%2$s | %3$s File%4$s',
									$tally['dir'],
									(($tally['dir']==1)?'':'s'),
									$tally['file'],
									(($tally['file']==1)?'':'s')
								); ?>
							</div>
							<div class="small-6 large-2 columns text-center">
								<?php echo sprintf('%1$s Item%2$s',count($this_dir),((count($this_dir)==1)?'':'s')); ?>
							</div>
							<div class="large-5 columns text-center">
							<?php
							if(isset($_lai->login) && $_lai->login->isUserLoggedIn()){
							?>
								<a class="info-bar-button" href="?logout">Logout</a> | 
								<a class="info-bar-button" href="#" data-reveal-id="settings-lai-modal">LAI Settings</a> | 
								<a class="info-bar-button" href="#" data-reveal-id="settings-theme-modal">Theme Settings</a>
							<?php
							} else {
							?>
								<a class="info-bar-button" href="#" data-reveal-id="login-modal">Login</a> | <a class="info-bar-button" href="#" data-reveal-id="register-modal">Register</a>
							<?php
							}
							?>
							</div>
						</div>
					</div>
					
					<?php include(__DIR__.'/includes/readme.php'); ?>
					
				</div>
			</div>
			
			<!-- End Content -->
			
			
			<?php _include_once(__DIR__.'/includes/footer.php'); ?>
			
			
			