<!-- Footer -->
			
			<footer>
					
					<div class="large-7 columns">
						<a href="#" data-reveal-id="social-modal">
							<span class="webicon coderwall" title="Share on Coderwall"></span>
							<span class="webicon facebook" title="Share on Facebook"></span>
							<span class="webicon twitter" title="Share on Twitter"></span>
							<span class="webicon github" title="See the project on Github"></span>
							<span class="webicon mail" title="Send us feedback"></span>
						</a>
					</div>
					
					<div class="large-5 columns">
						<p title="<?php runtime('STOP','RUNTIME'); echo RUNTIME; ?>" class="copyright">Copyright &copy; Nicholas Jordon &mdash; All Right Reserved</p>
					</div>
					
				</div>
			</footer>
			
			<!-- End Footer -->
			
		</div>
	</div>
	
	
	<script src="<?php echo PATH_THEME; ?>/js/foundation/foundation.js"></script>
	<script src="<?php echo PATH_THEME; ?>/js/foundation/foundation.alerts.js"></script>
	<script src="<?php echo PATH_THEME; ?>/js/foundation/foundation.clearing.js"></script>
	<script src="<?php echo PATH_THEME; ?>/js/foundation/foundation.cookie.js"></script>
	<script src="<?php echo PATH_THEME; ?>/js/foundation/foundation.dropdown.js"></script>
	<script src="<?php echo PATH_THEME; ?>/js/foundation/foundation.forms.js"></script>
	<script src="<?php echo PATH_THEME; ?>/js/foundation/foundation.joyride.js"></script>
	<script src="<?php echo PATH_THEME; ?>/js/foundation/foundation.magellan.js"></script>
	<script src="<?php echo PATH_THEME; ?>/js/foundation/foundation.orbit.js"></script>
	<script src="<?php echo PATH_THEME; ?>/js/foundation/foundation.reveal.js"></script>
	<script src="<?php echo PATH_THEME; ?>/js/foundation/foundation.section.js"></script>
	<script src="<?php echo PATH_THEME; ?>/js/foundation/foundation.tooltips.js"></script>
	<script src="<?php echo PATH_THEME; ?>/js/foundation/foundation.topbar.js"></script>
	<script src="<?php echo PATH_THEME; ?>/js/foundation/foundation.interchange.js"></script>
	<script src="<?php echo PATH_THEME; ?>/js/foundation/foundation.placeholder.js"></script>
	<script src="<?php echo PATH_THEME; ?>/js/foundation/foundation.abide.js"></script>
	
	<script>
		$(document).foundation();
		prettyPrint();
	</script>
	
	<?php _include_once(__DIR__.'/modals.php'); ?>
	
</body>
</html>