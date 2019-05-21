
<?php 
	require_once("../views/v_header.php");
	if(!isset($_SESSION['name']) || !isset($_SESSION['id']) || !isset($_SESSION['role']) ){
		header('location:../index.php'); //chưa đăng nhập
	}
	if(($_SERVER['REQUEST_METHOD'] == 'POST')){
		$oldPassword = $_POST['oldPassword'];
		$newPassword = $_POST['newPassword'];
		$newPassword2 = $_POST['newPassword2'];
		// kiểm tra dữ liệu nhập
		require_once("../model/validation.php");
		$vali = new Validation();
		//test input
		$oldPassword =$vali->test_input($oldPassword);
		$newPassword = $vali->test_input($newPassword);
		$newPassword2 = $vali->test_input($newPassword2);
		//check value
		$oldPasswordErr = $vali->checkPassword($oldPassword);
		$newPasswordErr = $vali->checkPassword($newPassword);
		$newPassword2Err = $vali->checkConfirmPassword($newPassword, $newPassword2);
		//check DB

		$oldPassword = md5($oldPassword);
		echo $newPasswordErr ;
		if ( $oldPasswordErr == null ) {
			//kiểm tra mật khẩu cũ
			$id = $_SESSION['id'];
			require_once("../model/m_user.php");	
			$m_user = new M_User();
			$had = $m_user->queryPassword( $id, $oldPassword );
			if ($had == false) {
				$oldPasswordErr = "Mật khẩu cũ không chính xác!";
			}
		}
		//thõa điều kiện dữ liệu đầu vào
		if( ($oldPasswordErr == null) && ($newPasswordErr == null) && ($newPassword2Err == null) ){
			$id = $_SESSION['id'];
			$newPassword = md5($newPassword);
			require_once("../model/m_user.php");
			$m_user = new M_User();
			$m_user->updatePassword($id, $newPassword);
			echo "<script type='text/javascript'>
				$(document).ready(function() {
					$('.card-body').html(function(){
						return '<h4>Thay đổi mật khẩu thành công!<h4><br/><a href=\'../index.php\' alt=\'Trang chủ\' ><input class=\'btn btn-success btn-lg\' type=submit value=\'Trang chủ\'></a>';
					});
				});
			</script>";
		}
	}
	require_once("../views/v_changePassword.php");
	require_once("../views/v_footer.php");
?>