<?php
/**
 * Debug Class
 */

namespace projectcleverweb\lastautoindex;

/**
 * Debug Class (model)
 * ===================
 * We use "Ref" to print fancy debug information
 */
class debug {
	/**
	 * Setup ref
	 * 
	 * @return void
	 */
	public static function init() {
		\ref::config('expLvl', 0);
		\ref::config('maxDepth', 10);
		\ref::config('showIteratorContents', TRUE);
		\ref::config('showPrivateMembers', TRUE);
	}
	
	/**
	 * Print the debug info
	 * 
	 * @return void
	 */
	public static function output() {
		r(main::$config);
		r((new \ReflectionClass(__NAMESPACE__.'\main'))->getStaticProperties());
		r(theme::$dir);
	}
}
