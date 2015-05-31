<?php
/**
 * README (view)
 * =============
 * Checks if there is any sort of 'readme' file and displays it.
 */
if (theme::has_readme()) {
	?>
	<div class="ui markdown readme segment">
		<?php
		theme::display_readme();
		?>
	</div>
	<?php
}
