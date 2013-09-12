
	<div id="social-modal" class="reveal-modal small">
		<div class="row">
			<div class="large-12 columns">
				<span class="webicon coderwall" title="Share on Coderwall"></span>
				<span class="webicon facebook" title="Share on Facebook"></span>
				<span class="webicon twitter" title="Share on Twitter"></span>
				<span class="webicon github" title="See the project on Github"></span>
				<span class="webicon mail" title="Send us feedback"></span>
				This will work later
			</div>
		</div>
		
		<a class="close-reveal-modal">&#215;</a>
	</div>
	
	
	
	<div id="settings-lai-modal" class="reveal-modal large">
		<h2>LastAutoIndex Settings</h2>
		<form action="#" class="settings" id="lai-settings">
			<div class="row">
				<div class="large-12 columns">
					
				</div>
			</div>
		</form>
		
		<a class="close-reveal-modal">&#215;</a>
	</div>
	
	<div id="settings-theme-modal" class="reveal-modal large">
		<h2>Theme Settings</h2>
		<form action="#" class="settings" id="theme-settings">
			<div class="row">
				<div class="large-12 columns">
					
				</div>
			</div>
		</form>
		
		<a class="close-reveal-modal">&#215;</a>
	</div>
	
	<div id="login-modal" class="reveal-modal large">
		<h2>Login</h2>
		<div class="row">
			<div class="large-12 columns">
				<form method="post" action="?login" name="loginform">
					<label for="login_input_username">Username</label><br/>
					<input id="login_input_username" class="login_input" type="text" name="user_name" required /><br/><br/>
					<label for="login_input_password">Password</label><br/>
					<input id="login_input_password" class="login_input" type="password" name="user_password" autocomplete="off" required /><br/><br/>
					<input type="checkbox" id="login_input_rememberme" name="user_rememberme" value="1" /> Keep me logged in (for 2 weeks)<br/><br/>
					<input type="submit"  name="login" value="Log in" /><br/><br/>
				</form>
			</div>
		</div>
		
		<a class="close-reveal-modal">&#215;</a>
	</div>
	
	<div id="register-modal" class="reveal-modal large">
		<h2>Register</h2>
		<div class="row">
			<div class="large-12 columns">
				
				<form method="post" action="?register" name="registerform">   
					
					<!-- NOTE: those <br/> are bad style and only there for basic formatting. remove them when you use real .css -->
					
					<!-- the user name input field uses a HTML5 pattern check -->
					<label for="login_input_username">Username (only letters and numbers, 2 to 64 characters)</label><br/>
					<input id="login_input_username" class="login_input" type="text" pattern="[a-zA-Z0-9-_]{2,64}" name="user_name" required /><br/><br/>
					
					<!-- the email input field uses a HTML5 email type check -->
					<label for="login_input_email">User's email (please provide a real email adress, you'll get a verification mail with an activation link)</label><br/>
					<input id="login_input_email" class="login_input" type="email" name="user_email" required /><br/><br/>
					
					<label for="login_input_password_new">
							Password (min. 6 characters!
					</label><br/>
					<input id="login_input_password_new" class="login_input" type="password" name="user_password_new" pattern=".{6,}" required autocomplete="off" /><br/><br/>  
					
					<label for="login_input_password_repeat">Repeat password</label><br/>
					<input id="login_input_password_repeat" class="login_input" type="password" name="user_password_repeat" pattern=".{6,}" required autocomplete="off" /><br/><br/>        
					
					<!-- generate and display a captcha and write the captcha string into session -->
					<img src="<?php echo PATH_THIRD_PARTY; ?>/simple-php-login/tools/showCaptcha.php" /><br/>
					
					<label>Please enter those characters</label><br/>
					<input type="text" name="captcha" required /><br/><br/>
					
					<input type="submit"  name="register" value="Register" /><br/><br/>
					
				</form>
				
			</div>
		</div>
		
		<a class="close-reveal-modal">&#215;</a>
	</div>
	
	
	
	
	
	<div id="konami-code" class="reveal-modal large">
		<h2>Keyboard Shortcuts Cheat-Sheet</h2>
		<hr />
		<table class="konami-code">
			<tr>
				<td><b>Increase the font-size:</b></td>
				<td><kbd>Ctrl</kbd> + <kbd>▲</kbd></td>
			</tr>
			<tr>
				<td><b>Decrease the font-size:</b></td>
				<td><kbd>Ctrl</kbd> + <kbd>▼</kbd></td>
			</tr>
			<tr>
				<td><b>Go up 1 directory:</b></td>
				<td><kbd>Ctrl</kbd> + <kbd>◄</kbd></td>
			</tr>
			<tr>
				<td><b>Toggle Search:</b></td>
				<td><kbd>Ctrl</kbd> + <kbd>►</kbd></td>
			</tr>
			<tr>
				<td><b>Go up 2 directories:</b></td>
				<td><kbd>Shift</kbd> + <kbd>◄</kbd></td>
			</tr>
			<tr>
				<td><b>Goto Server Root:</b></td>
				<td><kbd>Alt</kbd> + <kbd>◄</kbd></td>
			</tr>
			<tr>
				<td><b>Show Login:</b></td>
				<td><kbd>Ctrl</kbd> + <kbd>L</kbd></td>
			</tr>
			<tr>
				<td><b>Logout:</b></td>
				<td><kbd>Alt</kbd> + <kbd>L</kbd></td>
			</tr>
			<tr>
				<td><b>Hide Readme:</b></td>
				<td><kbd>Alt</kbd> + <kbd>H</kbd> <kbd>R</kbd></td>
			</tr>
			<tr>
				<td><b>Show Readme:</b></td>
				<td><kbd>Alt</kbd> + <kbd>S</kbd> <kbd>R</kbd></td>
			</tr>
			<tr>
				<td><b>Show this cheat-sheet:</b> (Konami Code)</td>
				<td><kbd>▲</kbd> <kbd>▲</kbd> <kbd>▼</kbd> <kbd>▼</kbd> <kbd>◄</kbd> <kbd>►</kbd> <kbd>◄</kbd> <kbd>►</kbd> <kbd>B</kbd> <kbd>A</kbd></td>
			</tr>
		</table>
		<a class="close-reveal-modal">&#215;</a>
	</div>
	
	
	