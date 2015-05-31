<?php
/**
 * The Footer (view)
 */
?>
<div class="ui unstackable grid">
	<div class="eight wide column">
		<a href="https://github.com/Project-CleverWeb/LastAutoIndex">
			Source Code on Github
		</a>
	</div>
	<div class="eight wide right aligned column" id="copyright">
		&copy; Nicholas Jordon 2015 &ndash; All Rights Reserved
	</div>
</div>
<?php
theme::part('modals', 'content');

if (isset($_GET['debug'])) {
	theme::output_debug();
}
