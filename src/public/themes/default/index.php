<?php
/**
 * Default Theme File (required/view)
 * ==================================
 * This is the only required file for a valid theme. Everything else is left up
 * to the theme's developer.
 * 
 * If you are confused on how this theme works, you should see the following
 * files and read their code comments: (relative to this themes root directory)
 *   - readme.md
 *   - config.php
 *   - includes/autoload.php
 *   - includes/classes/main.php
 *   - includes/classes/display_index.php
 *   - includes/classes/display_search.php
 */
if (!class_exists('lastautoindex', FALSE)) {
	define('LAI_ALLOW_MULTI_INDEX', TRUE, 1);
	require_once __DIR__.'/../../index.php';
} else {
	theme::part('index', 'template');
}
