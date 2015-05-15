<?php
/**
 * Default Theme File (required/view)
 * ==================================
 * This is the only required file for a valid theme. Everything else is left up
 * to the theme's developer.
 * 
 * NOTE: For every "index.php" file in your theme, you should give a 'forbidden'
 * message of some sort, like below.
 */
if (!class_exists('lastautoindex', FALSE)) {
	exit("Forbidden: This directory/file cannot be accessed directly");
}

theme::part('index', 'template');
