			<div class="row">
				<div class="large-12 columns directory-contents">
					<?php
					
					// show negative messages
					if (isset($_lai->register) && $_lai->register->errors) {
						foreach ($_lai->register->errors as $error) {
							?>
					<div data-alert class="alert-box alert radius">
						<?php echo $error; ?>
						<a href="#" class="close">&times;</a>
					</div>
							<?php
						}
					}

					// show positive messages
					if (isset($_lai->register) && $_lai->register->messages) {
						foreach ($_lai->register->messages as $message) {
							?>
					<div data-alert class="alert-box success radius">
						<?php echo $message; ?>
						<a href="#" class="close">&times;</a>
					</div>
							<?php
						}
					}
					
					?>
					
					<?php
					
					// show negative messages
					if (isset($_lai->login) && $_lai->login->errors) {
						foreach ($_lai->login->errors as $error) {
							?>
					<div data-alert class="alert-box alert radius">
						<?php echo $error; ?>
						<a href="#" class="close">&times;</a>
					</div>
							<?php
						}
					}

					// show positive messages
					if (isset($_lai->login) && $_lai->login->messages) {
						foreach ($_lai->login->messages as $message) {
							?>
					<div data-alert class="alert-box success radius">
						<?php echo $message; ?>
						<a href="#" class="close">&times;</a>
					</div>
							<?php
						}
					}
					
					?>
				</div>
			</div>