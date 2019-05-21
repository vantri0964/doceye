<?php
require_once "common/database.php";
class File extends Database {
	function __construct() {
		parent::__construct();
	}
	function __destruct() {
		parent::disconnect();
	}
	function queryAllFile($id, $category) {
		$conn = parent::getConn();
		$stmt = null;
		if ($category == null) {
			$category = "1=1";
		}

		try {
			// $stmt = $conn->prepare( "INSERT INTO files (name) VALUES ( N? )" );
			$stmt = $conn->prepare("Select * From files Where idUser=:id and " . $category);
			$stmt->bindValue(":id", $id);
			$stmt->execute();
		} catch (PDOException $e) {
			echo "Lỗi insertFile: " . $e->getMessage();
		}
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$stmt = null;
		$conn = null;
		return $data;
	}
	function queryAllCategory() {
		$conn = parent::getConn();
		$stmt = null;
		try {
			// $stmt = $conn->prepare( "INSERT INTO files (name) VALUES ( N? )" );
			$stmt = $conn->prepare("Select * From category");
			$stmt->execute();
		} catch (PDOException $e) {
			echo "Lỗi insertFile: " . $e->getMessage();
		}
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$stmt = null;
		$conn = null;
		return $data;
	}
	function insertFile($userArr = array()) {
		$conn = parent::getConn();
		$stmt = null;
		try {
			// $stmt = $conn->prepare( "INSERT INTO files (name) VALUES ( N? )" );
			$stmt = $conn->prepare('INSERT INTO files (idUser, name, address, link, size, category_id) VALUES (?, N?, N?, N?, ?, ? )');
			$stmt->execute($userArr);
			$stmt = null;
			$conn = null;
			return true;
		} catch (PDOException $e) {
			echo "Lỗi insertFile: " . $e->getMessage();
		}

		$stmt = null;
		$conn = null;
		return 0;
	}
	function deleteFile($id, $file) {
		$conn = parent::getConn();
		$stmt = null;
		try {
			// $stmt = $conn->prepare( "INSERT INTO files (name) VALUES ( N? )" );
			$stmt = $conn->prepare('DELETE FROM files WHERE id=:id and name=:name');
			$stmt->bindValue(":id", $id);
			$stmt->bindValue(":name", $file);
			$stmt->execute();
			$stmt = null;
			$conn = null;
			return true;
		} catch (PDOException $e) {
			echo "Lỗi insertFile: " . $e->getMessage();
		}
		$stmt = null;
		$conn = null;
		return 0;
	}
}
