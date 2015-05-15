<?php
/**
 * The Main Content (view)
 */
?>
<div class="ui secondary menu">
	<?php
	if (theme::$dir->path['uri']['root'] == '/') {
		?>
		<a class="disabled item">
			Up <i class="level up icon"></i>
		</a>
		<?php
	} else {
		?>
		<a href=".." class="item">
			Up <i class="level up icon"></i>
		</a>
		<?php
	}
	?>
	<a class="item" href="#" onclick="$('#directory-index-filter-container').transition('slide down')">
		Filter <i class="filter icon"></i>
	</a>
	<?php
	if (theme::$dir->path['is_git_dir']) {
		?>
		<a class="item">
			Fork <i class="fork icon"></i>
		</a>
		<a class="item">
			Github <i class="github icon"></i>
		</a>
		<?php
	}
	
	if (lastautoindex::$login->is_logged_in) {
		?>
		<a class="item">
			Options <i class="settings icon"></i>
		</a>
		<?php
	}
	?>
	<div class="right menu">
		<div class="text item">
			<?php
			if (!isset($_GET['s']) || empty($_GET['s'])) {
				printf(
					'%1$s Items | %2$s Folders | %3$s Files',
					count(theme::$dir->items),
					count(theme::$dir->folders),
					count(theme::$dir->files)
				);
			}
			?>
		</div>
	</div>
</div>
<div class="ui fluid left icon input" id="directory-index-filter-container">
	<input id="directory-index-filter" type="text" placeholder="Start typing to filter">
	<i class="filter icon"></i>
</div>
<?php
theme::part('index', 'content');
