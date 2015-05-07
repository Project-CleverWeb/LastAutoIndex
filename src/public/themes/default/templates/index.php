<?php
/**
 * Directory Index Template
 * ========================
 * This is the template that is used under normal conditions. It shows the
 * contents of the current directory that the user has browsed to.
 * 
 * NOTE: For every "index.php" file in your theme, you should give a 'forbidden'
 * message of some sort, like below.
 */
if (!class_exists('lastautoindex', FALSE)) {
	exit("Forbidden: This directory/file cannot be accessed directly");
}

// Queue this template's specific styles & scripts
theme::queue_style('font-awesome');
theme::queue_style('webicons');
theme::queue_style('semantic');
theme::queue_style('highlight-js');
theme::queue_style('main');
theme::queue_script('jquery');
theme::queue_script('modernizr');
theme::queue_script('moustrap');
theme::queue_script('highlight-js');
theme::queue_script('semantic');
theme::queue_script('main');

// Headers should have been sent already so we can start printing the page.
theme::part('default', 'layout');
