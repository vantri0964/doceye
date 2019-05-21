<?php

class Database {
	private $conn = null;
	private $url = null;
	private $user = null;
	private $pass = null;
	private $sql = null;

	function __construct() {
		$this->url = 'mysql:host=localhost;dbname=project';
		$this->user = 'project';
		$this->pass = '123456';

		try {
			$this->conn = new PDO($this->url, $this->user, $this->pass);
			$this->conn->exec("set names utf8");
			// set the PDO error mode to exception
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e) {
			echo "Connection failed: " . $e->getMessage();
		}
	}
	function getConn() {
		return $this->conn;
	}
	function setQuery($_sql) {
		$this->sql = $_sql;
	}
	function disconnect() {
		$this->conn = null;
	}
}
?>