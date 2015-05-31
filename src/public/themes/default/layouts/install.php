<?php
/**
 * The Install Layout (view)
 * =========================
 * A one page layout that is run when LastAutoIndex is first put on the server.
 */
?><!DOCTYPE html>
<html>
	<head>
		<?php
		theme::part('head', 'content');
		?>
	</head>
	<body>
		<main class="ui page grid">
			<div class="column">
				<?php
				theme::part('install', 'content');
				?>
			</div>
		</main>
		<footer class="ui page grid">
			<div class="column">
				<?php
				theme::part('footer', 'content');
				?>
			</div>
		</footer>
	</body>
</html>
