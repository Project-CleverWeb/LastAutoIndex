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
	public function __construct($host, $user, $pass, $name) {
		$fmt = 'mysql:dbname=%2$s;host=%1$s';
		try {
			parent::__construct(sprintf($fmt, $host, $name), $user, $pass);
		} catch (\PDOException $e) {
			\projectcleverweb\lastautoindex\main::$error->fatal('Database: Connection Failed: '.$e->getMessage());
		}
	}
}
