<?php 
	session_start();
	require_once('../controller/c_user.php');
	$c_user = new C_User();
	$c_user->outUser();
	header('location:index.php');
 ?>