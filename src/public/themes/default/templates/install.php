<?php
/**
 * Install Template (view)
 * =======================
 * This is LastAutoIndex's installer, feel free to delete this template after
 * installation.
 */

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
theme::queue_script('tablesort');
theme::queue_script('main');

// Headers should have been sent already so we can start printing the page.
theme::part('install', 'layout');
