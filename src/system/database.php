<?php
/**
 * Database Class
 */

namespace projectcleverweb\lastautoindex;

/**
 * Database Class (model)
 * ======================
 * A simple extension of PHP's built in PDO class
 */
class database extends \PDO {
	/**
	 * Simplified constructor for mysql
	 * 
	 * @param string $host The host to connect to
	 * @param string $user The username for auth
	 * @param string $pass The password for auth
	 * @param string $name The database name to connect to
	 */
	public function __construct($host, $user, $pass, $name) {
		$fmt = 'mysql:dbname=%2$s;host=%1$s';
		try {
			$db = parent::__construct(sprintf($fmt, $host, $name), $user, $pass);
		} catch (\PDOException $e) {
			\projectcleverweb\lastautoindex\main::$error->fatal('Database: Connection Failed: '.$e->getMessage());
		}
		return $db;
	}
}
