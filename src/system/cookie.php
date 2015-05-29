<?php
/**
 * Cookie Class
 */

namespace projectcleverweb\lastautoindex;

/**
 * Cookie Class (model)
 * ====================
 * A simple universal way to manage cookies
 */
class Cookie {
	const MINUTE    = 60;
	const HALF_HOUR = 1800;
	const HOUR      = 3600;
	const HALF_DAY  = 43200;
	const DAY       = 86400;
	const WEEK      = 604800;
	const MONTH     = 2592000;
	const HALF_YEAR = 15811200;
	const YEAR      = 31536000;
	const FOREVER   = -1; // 2030-01-01 00:00:00
	
	/**
	 * Check if a cookie is set
	 *
	 * @param  string $name The name of the cookie to check
	 * @return bool         If the cookie has a value TRUE, FALSE otherwise
	 */
	public function exists($name) {
		return !empty($_COOKIE[$name]);
	}
	
	/**
	 * Get the value of the given cookie. If the cookie does not exist the value
	 * of NULL will be returned.
	 *
	 * @param  string $name
	 * @return mixed  The (string) value of the cookie, or NULL if it doesn't exist
	 */
	public function get($name) {
		if ($this->exists($name)) {
			return $_COOKIE[$name];
		}
		return NULL;
	}

	/**
	 * Set a cookie
	 *
	 * @param  string  $name   The name of the cookie to set
	 * @param  string  $value  The value to set
	 * @param  integer $expiry When the cookie should expire (default is forever)
	 * @param  string  $path   The path to make the cookie available to (default is /)
	 * @param  string  $domain The domain to apply it to (default is $_SERVER['HTTP_HOST'])
	 * @return bool    Returns TRUE on success, FALSE otherwise
	 */
	public function set($name, $value, $expiry = self::FOREVER, $path = '/', $domain = '') {
		$return = false;
		if (!headers_sent()) {
			if (empty($domain)) {
				$domain = NULL;
			}
			if ($expiry === -1) {
				$expiry = 1893456000; // Forever = 2030-01-01 00:00:00
			} else {
				$expiry = (integer) $expiry + time();
			}
			$return = setcookie($name, $value, $expiry, $path, $domain);
			if ($return) {
				$_COOKIE[$name] = $value;
			}
		}
		return $return;
	}

	/**
	 * Delete a cookie
	 *
	 * @param  string $name   Name of the cookie to delete
	 * @param  string $path   Path of cookie to delete
	 * @param  string $domain The domain of the cookie to delete
	 * @return bool           Returns TRUE on success, FALSE otherwise
	 */
	public function delete($name, $path = '/', $domain = '') {
		$return = false;
		if (!headers_sent()) {
			if (empty($domain)) {
				$domain = $_SERVER['HTTP_HOST'];
			}
			$return = setcookie($name, '', time() - self::YEAR, $path, $domain);
			unset($_COOKIE[$name]);
		}
		return $return;
	}
}
