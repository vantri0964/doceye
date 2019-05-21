<?php 
	require_once('../views/v_header.php');
	require_once('../model/m_user.php');
 ?>
 <?php
 	if(isset($_GET["vkey"])){
 		$vkey=$_GET['vkey'];
 		$m_user = new M_User();
 		$had = $m_user->queryVerified($vkey);
 		if ($had) {
 			$m_user->updateVerified($vkey);
 			$err = "<h4>Xác nhận tài khoản thành công!<h4><br/><a href='c_login.php' alt='Đăng nhập' ><input class='btn btn-success btn-lg' type='submit' value='Đăng nhập'></a>";
 		}else{
 			$err = 'Something went wrong!';
 		}
 	}else{
 		$err = 'Something went wrong!';
 	}
 ?>

 <?php
 	require_once("../views/v_verify.php");
	require_once('../views/v_footer.php');
 ?>