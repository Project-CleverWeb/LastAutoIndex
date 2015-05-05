<div class="ui page grid">
	<div class="sixteen wide column">
		<h2 class="ui header">
			<?php
			// Convert the current directory basename into a title
			echo ucwords(urldecode(theme::$dir->path['basename']));
			?>
			<div class="sub header">
				<?php
				// Show the root URI/URL path to the current directory
				echo htmlentities(theme::$dir->path['uri']['root']);
				?>
			</div>
		</h2>
		<?php
		theme::part('index', 'content');
		?>
	</div>
</div>