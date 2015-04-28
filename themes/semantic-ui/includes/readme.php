					<?php
						if (isset($readme) && file_exists($readme) && is_file($readme)) {
							$handle = fopen($readme, "r");
							$readme_text = fread($handle, filesize($readme));
							fclose($handle);
							?>
								<div class="markdown-wrapper">
									<center><h2 class="readme"><?php echo $readme_name; ?></h2></center>
									<div class="markdown-content readme">
										
										<?php
										echo $_lai->markdown->read($readme_text);
										?>
										
									</div>
								</div>
							<?php
						}
					?>