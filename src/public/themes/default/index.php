<?php

if (!class_exists('lastautoindex', FALSE)) {
	exit("This file cannot be accessed directly");
}

// if (isset($_GET['login']) && theme::$config['allow_login']) {
// 	theme::part('index', 'template');
// } elseif (isset($_GET['install'])) {
// 	theme::part('index', 'template');
// } else {
// 	theme::part('index', 'template');
// }

	theme::part('index', 'template');

