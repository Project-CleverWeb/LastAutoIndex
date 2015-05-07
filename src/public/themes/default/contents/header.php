<header class="ui stackable top attached page grid segment">
	<div class="empty size-20"></div>
	<div class="five wide column">
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
	</div>
	<div class="six wide center aligned column">
		<div class="ui button">Register</div>
		<div class="ui primary button">Login</div>
	</div>
	<div class="five wide column">
		<form role="search" method="GET">
			<div class="ui small fluid action input">
				<input type="text" name="s" placeholder="Search">
				<div type="submit" class="ui small button">Search</div>
			</div>
		</form>
	</div>
</header>
