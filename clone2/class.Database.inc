<?php

/**
* Database Class. Only 1 connection is allowed.
*/
class Database {
	private $_connection;

	// Store single instance
	private static $_instance;

	/**
	 * Get an instance of the Database
	 * @return  Database
	 */
	public static function getInstance() {
		if( !self::$_instance) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	public function __construct() {
		$this->_connection = new mysqli( 'localhost', 'root', 'root', 'test' );
		$this->_connection->set_charset ( 'utf8' );
		// Error handling
		if( mysqli_connect_error() ) {
			trigger_error( 'Failed to connect to MySQL: ' . mysqli_connect_error(), E_USER_ERROR );
		}
	}

	/**
	 * Clone magic to prevent dupplication
	 */
	private function __clone() {}

	/**
	 * Get Mysqli connection
	 */
	public function getConnection() {
		return $this->_connection;
	}
}