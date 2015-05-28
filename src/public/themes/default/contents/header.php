<?php
/**
 * The Header (view)
 */
?><div class="ui stackable grid">
	<div class="empty size-20"></div>
	<?php
	if (\projectcleverweb\lastautoindex\main::$has_update) {
		$version = \projectcleverweb\lastautoindex\main::$update->tag_name;
		$dl_url  = sprintf('http://bit.ly/LastAutoIndex-%1$s-zip', str_replace('.', '-', $version));
		?>
		<div class="sixteen wide column">
			<div class="ui warning message">
				<i class="close icon"></i>
				<div class="header">
					LastAutoIndex <?php echo $version; ?> Has Been Released!
				</div>
				<ul class="list">
					<li><a target="_blank" href="<?php echo $dl_url; ?>">Download LastAutoIndex-<?php echo $version; ?>.zip</a></li>
					<li><a target="_blank" href="https://github.com/Project-CleverWeb/LastAutoIndex/releases">View the changelog</a></li>
					<li><a target="_blank" href="?ignore_release=<?php echo $version; ?>">Ignore This Release</a></li>
				</ul>
			</div>
		</div>
		<?php
	}
	?>
	<div class="five wide column">
		<h2 class="ui header">
			<?php
			// Convert the current directory basename into a title
			if (theme::$dir->path['uri']['root'] == '/') {
				echo 'Root';
			} else {
				echo ucwords(urldecode(theme::$dir->path['basename']));
			}
			?>
			<div class="sub header">
				<div class="ui breadcrumb">
					<?php
					// Show the root URI/URL path to the current directory
					$uri_path_array    = explode('/', substr(theme::$dir->path['uri']['root'], 1));
					$current_dir_links = array();
					$current_dir_href  = '';
					$last              = count($uri_path_array) - 1;
					$fmt               = '<a href="%2$s" class="section">%1$s</a>';
					if (theme::$dir->path['uri']['root'] == '/') {
						echo '<div class="active section">Root</div>';
					} else {
						echo '<a href="/" class="section">Root</a><div class="divider">/</div>';
					}
					foreach ($uri_path_array as $count => $uri_path) {
						if ($count == $last && !(isset($_GET['s']) && !empty($_GET['s']))) {
							$fmt = '<div class="active section">%1$s</div>';
						}
						$current_dir_href    = $current_dir_href.'/'.$uri_path;
						$current_dir_links[] = sprintf(
							$fmt,
							htmlentities($uri_path),
							$current_dir_href
						);
					}
					echo implode('<div class="divider">/</div>', $current_dir_links);
					?>
				</div>
			</div>
		</h2>
	</div>
	<div class="six wide center aligned column">
		<?php
		if (lastautoindex::$config['use_login']) {
			if (lastautoindex::$login->is_logged_in) {
				?>
				<div class="ui orange button">Logout</div>
				<?php
			} else {
				?>
				<div class="ui buttons">
					<div class="ui positive button">Register</div>
					<div class="or"></div>
					<div class="ui primary button">Login</div>
				</div>
				<?php
			}
		}
		?>
	</div>
	<div class="five wide column">
		<form role="search" method="GET">
			<div class="ui small fluid action input">
				<input type="text" name="s" placeholder="<?php echo (!empty($_GET['s']) ? htmlentities($_GET['s']) : '[a-z\-_]+.php'); ?>">
				<button type="submit" class="ui small button">Search</button>
			</div>
		</form>
	</div>
</div>
