<?php
/**
 * "Example" Plugin Run Script
 * ----------------------------
 * This is where your plugin should actually run. In many cases, a plugin may not
 * need to be 'run', but just used within the theme or system. In these cases, this
 * file would not exist, however for the sake of hypothetical purposes, it has been
 * included in this example plugin.
 * 
 * This file is not required by LAI, but it is recommended that you use it.
 */

$ex_vars = array();

// If your plugin can be used with other plugins,
// you should check for them in this file like so:
$ex_vars['file-explorer'] = $_lai->plugin->plugin_exists('file-explorer');

// You would also deal with any last minute scripts
// in this file
if($ex_vars['file-explorer']){
	$_lai->example->foo('file-explorer');
} else {
	$_lai->example->foo();
}

// adding scripts to the header, footer, <head> should
// be done here too:
$_lai->html->add_to_head('<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>');
$_lai->html->add_to_header('<img id="tracking_img" src="tracking.example.com/img.jpg">');
$_lai->html->add_to_footer('<script>alert("example");</script>');

/**
 * Error Reporting
 * ---------------
 * Finally if you run into errors, be sure to report them through LAI. This ensures
 * that your errors are reported in the manner in which the user has defined.
 * 
 * LAI's error reporting works as such:
 * $_lai->error($backtrace, $info_array);
 * 
 * While only $backtrace is required, it is HIGHLY recommended that you fill
 * $info_array with as much relevant info as you can. For more on error reporting,
 * see '/lib/error_handle.class.php'
 */
$time1 = $_lai->example->get_time();
$time2 = $_lai->ex_time;

if($time1 != $time2){
	$_lai->error(debug_backtrace(),
		array(
			'msg'   => 'time1 does not equal time2!',
			'time1' => $time1,
			'time2' => $time2
		)
	);
}

// You can also run 'fatal' errors, to safely end LAI
// and report the error immediately
if(is_array($_lai->example->installed_plugins) !== TRUE){
	$_lai->error(debug_backtrace(),
		array(
			'is_fatal' => TRUE, // LAI knows to look for this
			'msg'      => '$installed_plugins was not an array!'
		)
	);
}

/**
 * Unset Vars
 * ----------
 * unsetting un-needed vars is important for 2 reasons:
 *   1) You don't know what vars other plugins may be trying to use, and could end
 *   up messing up that plugin.
 *   2) It is a bad habit to just leave vars around.
 * 
 * The suggested route is to keep all your important info inside of a prefixed array.
 * This method practically eliminates the chances of interfearing with other code,
 * and promotes more forward compatible code.
 * 
 * In this case, our plugin uses the variable $ex_vars as it's prefixed array, but
 * near the end we used $time1 and $time2 because only needed that info for a moment.
 * Since we know we wont need those vars again, we can just unset them below.
 */

unset($time1,$time2);



