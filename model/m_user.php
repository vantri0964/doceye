<?php
require_once('common/database.php');

class M_User extends Database
{
	function __construct()
	{
		parent::__construct();
	}
	function __destruct()
	{
		parent::disconnect();
	}
	function queryUserName($_userName)
	{
		$conn = parent::getConn();
		$stmt = null;
		try {
			$stmt = $conn->prepare("SELECT username FROM users WHERE username=:username");
			$stmt->bindValue(":username", $_userName);
			$stmt->execute();
		} catch (PDOException $e) {
			echo "QueryUserName failed: " . $e->getMessage();
		}
		if ($stmt->rowCount() == 0) { //không có
			$stmt = null;
			$conn = null;
			return 0;
		} else { //có
			$stmt = null;
			$conn = null;
			return 1;
		}
	}
	function queryEmail($_email)
	{
		$conn = parent::getConn();
		$stmt = null;
		try {
			$stmt = $conn->prepare("SELECT email FROM users WHERE email=:email");
			$stmt->bindValue(":email", $_email);
			$stmt->execute();
		} catch (PDOException $e) {
			echo "QueryEmail failed: " . $e->getMessage();
		}
		if ($stmt->rowCount() == 0) { //không có
			$stmt = null;
			$conn = null;
			return 0;
		} else { //có
			$stmt = null;
			$conn = null;
			return 1;
		}
	}

	function queryUser($_login, $_pass)
	{
		$_login = trim($_login);
		$_pass = md5($_pass);
		$conn = parent::getConn();
		$stmt = null;
		try {
			$stmt = $conn->prepare("SELECT id, name, email, verified, role, crtime FROM users WHERE ( username=:login OR email=:login ) AND password=:pass");
			$stmt->bindValue(':login', $_login);
			$stmt->bindValue(':pass', $_pass);
			$stmt->execute();
		} catch (PDOException $e) {
			echo "QueryUser failed: " . $e->getMessage();
		}

		$row = $stmt->rowCount();

		if ($row == 0) {
			$stmt = null;
			$conn = null;
			return 0;
		} else {
			$data = $stmt->fetch(PDO::FETCH_ASSOC);
			$stmt = null;
			$conn = null;
			return $data;
		}
	}
	function queryVerified($_vkey)
	{
		$conn = parent::getConn();
		$stmt = null;
		try {
			$stmt = $conn->prepare("SELECT vkey, verified FROM users WHERE vkey=:vkey AND verified=0 LIMIT 1");
			$stmt->bindValue(":vkey", $_vkey);
			$stmt->execute();
		} catch (PDOException $e) {
			echo "QueryVirified failed: " . $e->getMessage();
		}
		if ($stmt->rowCount() == 0) { //không có
			$stmt = null;
			$conn = null;
			return 0;
		} else { //có
			$stmt = null;
			$conn = null;
			return 1;
		}
	}
	function queryPassword($_id, $_password)
	{
		$conn = parent::getConn();
		$stmt = null;
		try {
			$stmt = $conn->prepare("SELECT id, password FROM users WHERE password=:password AND id=:id");
			$stmt->bindValue(':password', $_password);
			$stmt->bindValue(':id', $_id);
			$stmt->execute();
		} catch (PDOException $e) {
			echo "Error query password: " . $e->getMessage();
		}
		if ($stmt->rowCount() > 0) {
			$stmt = null;
			$conn = null;
			return true;
		}
		$stmt = null;
		$conn = null;
		return false;
	}
	function updatePassword($_id, $_password)
	{
		$conn = parent::getConn();
		$stmt = null;
		try {
			$stmt = $conn->prepare('UPDATE users SET password=:password WHERE id=:id ');
			$stmt->bindValue(':password', $_password);
			$stmt->bindValue(':id', $_id);
			$stmt->execute();
		} catch (PDOException $e) {
			echo "Error update password: " . $e->getMessage();
		}
		if ($stmt->rowCount() > 0) {
			$stmt = null;
			$conn = null;
			return true;
		}
		$stmt = null;
		$conn = null;
		return false;
	}
	function updateResetPassword($email, $token_hash, $password)
	{
		$conn = parent::getConn();
		$stmt = null;
		try {
			$stmt = $conn->prepare('UPDATE users SET password=:password , token_hash= null WHERE email=:email and token_hash=:token_hash ');
			$stmt->bindValue(':password', $password);
			$stmt->bindValue(':token_hash', $token_hash);
			$stmt->bindValue(':email', $email);
			$stmt->execute();
		} catch (PDOException $e) {
			echo "Error updateResetPassword: " . $e->getMessage();
		}
		if ($stmt->rowCount() > 0) {
			$stmt = null;
			$conn = null;
			return true;
		}
		$stmt = null;
		$conn = null;
		return false;
	}
	function queryTokenHash($email, $token_hash)
	{
		$conn = parent::getConn();
		$stmt = null;
		try {
			$stmt = $conn->prepare("SELECT token_hash, email FROM users WHERE token_hash=:token_hash AND email=:email LIMIT 1");
			$stmt->bindValue(":token_hash", $token_hash);
			$stmt->bindValue(":email", $email);
			$stmt->execute();
		} catch (PDOException $e) {
			echo "queryTokenHash failed: " . $e->getMessage();
		}
		if ($stmt->rowCount() == 0) { //không có
			$stmt = null;
			$conn = null;
			return 0;
		} else { //có
			$stmt = null;
			$conn = null;
			return 1;
		}
	}
	function updateTokenHash($email, $token_hash)
	{
		$conn = parent::getConn();
		$stmt = null;
		try {
			$stmt = $conn->prepare('UPDATE users SET token_hash=:token_hash WHERE email=:email ');
			$stmt->bindValue(':token_hash', $token_hash);
			$stmt->bindValue(':email', $email);
			$stmt->execute();
		} catch (PDOException $e) {
			echo "Error updateTokenHash: " . $e->getMessage();
		}
		if ($stmt->rowCount() > 0) {
			$stmt = null;
			$conn = null;
			return true;
		}
		$stmt = null;
		$conn = null;
		return false;
	}
	function updateVerified($_vkey)
	{
		$conn = parent::getConn();
		$stmt = null;
		try {
			$stmt = $conn->prepare("UPDATE  users SET verified=1 WHERE vkey=:vkey LIMIT 1");
			$stmt->bindValue(":vkey", $_vkey);
			$stmt->execute();
		} catch (PDOException $e) {
			echo "UpdateVerified failed: " . $e->getMessage();
		}
		if ($stmt->rowCount() == 0) { //không có
			$stmt = null;
			$conn = null;
			return 0;
		} else { //có
			$stmt = null;
			$conn = null;
			return 1;
		}
	}
	//name, username, email, sex, birthday, phone, crtime
	public function insertUser($userArr = array())
	{
		$conn = parent::getConn();
		$stmt = null;
		try {
			$stmt = $conn->prepare('INSERT INTO users (name, username, email, sex, birthday, phone, password, vkey) VALUES ( N' . '?' . ', ?, ?, ?, ?, ?, ?, ?)');
			$stmt->execute($userArr);
			$stmt = null;
			$conn = null;
			return true;
		} catch (PDOException $e) {
			echo "Lỗi insertUser: " . $e->getMessage();
		}
		$stmt = null;
		$conn = null;
		return false;
	}
	function queryProfile($_id)
	{
		$conn = parent::getConn();
		$stmt = null;
		try {
			$stmt = $conn->prepare('SELECT name, username, email, sex, birthday, phone, address FROM users WHERE id = :id');
			$stmt->bindValue(':id', $_id);
			$stmt->execute();
		} catch (PDOException $e) {
			echo "Query failed: " . $e->getMessage();
		}

		$row = $stmt->rowCount();

		if ($row == 0) {
			$stmt = null;
			$conn = null;
			return 0;
		} else {
			$data = $stmt->fetch(PDO::FETCH_ASSOC);
			$stmt = null;
			$conn = null;
			return $data;
		}
	}
	function updateProfile($profileArr = array())
	{
		$conn = parent::getConn();
		$stmt = null;
		try {
			$stmt = $conn->prepare("UPDATE users SET name = N? , sex = ? , birthday=? , phone=? , address = N? WHERE id=? ");
			$stmt->execute($profileArr);
		} catch (PDOException $e) {
			echo "Lỗi updateProfile: " . $e->getMessage();
		}
		if ($stmt->rowCount() > 0) {
			$stmt = null;
			$conn = null;
			return true;
		}
		$stmt = null;
		$conn = null;
		return false;
	}
}
