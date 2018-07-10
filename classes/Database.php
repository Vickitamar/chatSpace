<?php

class Database {
	private $con;
	private $stmt;

	private $host = DB_HOST;
	private $user = DB_USER;
	private $pass = DB_PASS;
	private $dbname = DB_NAME;

	public function __construct($con) {
	$this->con = $con;
	}

}

?>	