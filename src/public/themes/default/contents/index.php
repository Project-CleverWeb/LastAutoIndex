<?php
/**
 * Directory Index
 * ===============
 * Shows the current directory listing in a table
 * 
 * NOTE: For every "index.php" file in your theme, you should give a 'forbidden'
 * message of some sort, like below.
 */
if (!class_exists('lastautoindex', FALSE)) {
	exit("Forbidden: This directory/file cannot be accessed directly");
}
?>
<table class="ui very compact unstackable celled striped table">
	<thead>
		<tr>
			<th>Name</th>
			<th>Permissions</th>
			<th>Size</th>
			<th>Last Modified</th>
		</tr>
	</thead>
	<tbody>
		<?php
		/**
		 * Format Variables Legend
		 * =======================
		 * %1 - File Name
		 * %2 - URI/URL
		 * %3 - Permissions
		 * %4 - Numeric Permissions
		 * %5 - Size
		 * %6 - Modified Date
		 */
		theme::display_index(
			// Default item format
			'<tr><td><a href="%2$s"><i class="file icon"></i> %1$s</a></td><td class="collapsing"><samp>%3$s (%4$s)</samp></td><td class="collapsing">%5$s</td><td class="collapsing">%6$s</td></tr>',
			// Directory format
			'<tr><td><a href="%2$s"><i class="folder icon"></i> %1$s</a></td><td class="collapsing"><samp>%3$s (%4$s)</samp></td><td class="collapsing">%5$s</td><td class="collapsing">%6$s</td></tr>'
		);
		?>
	</tbody>
</table>