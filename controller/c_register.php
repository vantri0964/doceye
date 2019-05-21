<?php
require_once "../views/v_header.php";

if (($_SERVER['REQUEST_METHOD'] == 'POST') && isset($_POST["register"])) {
	$username = $_POST['username'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$confirmPass = $_POST['confirmPass'];

	if (isset($_POST['sex'])) {
		$sex = $_POST['sex'];
	} else {
		$sex = null;
	}
	if (isset($_POST['birthday'])) {
		$birthday = $_POST['birthday'];
	} else {
		$birthday = null;
	}
	if (isset($_POST['phone'])) {
		$phone = $_POST['phone'];
	} else {
		$phone = null;
	}

	$vkey = md5(time() . $username);
	require_once '../model/validation.php';
	$validation = new Validation();

	//test input
	$username = $validation->test_input($username);
	$name = $validation->test_input($name);
	$email = $validation->test_input($email);
	$password = $validation->test_input($password);
	$confirmPass = $validation->test_input($confirmPass);
	// //check value
	$errUsername = $validation->checkUserName($username);
	$errName = $validation->checkName($name);
	$errEmail = $validation->checkEmail($email);
	$errPassword = $validation->checkPassword($password);
	$errConfirmPass = $validation->checkConfirmPassword($password, $confirmPass);

	if (
		$errUsername == null &&
		$errName == null &&
		$errEmail == null &&
		$errPassword == null &&
		$errConfirmPass == null
	) {
		$m_user = new M_User();
		//chuyển đổi tên viết hoa chữ đầu và md5 pass
		//insert user
		$m_user->insertUser(array(ucwords($name), $username, $email, $sex, $birthday, $phone, md5($password), $vkey));
		//send mail verify
		require_once '../controller/PHPMailer/sendMail.php';

		$sendMail = new SendMail();
		$_subject = "Xác nhận đăng ký tài khoản!";
		$_body = "<a href='http://localhost:8080/project/controller/c_verify.php?vkey=" . $vkey . "''><b>Xác nhận tài khoản</b></a>";
		$sendMail->sendGmail($_subject, $_body, $email);

		echo "<script type='text/javascript'>
            	$(document).ready(function() {
                	$('.card-body').html(function(){
	                	return '<h4>Cảm ơn bạn đã đăng ký! Chúng tôi đã gửi một email xác nhận đăng ký đến " . $email . ". Vui lòng vào email để xác nhận đăng ký!<h4><br/><a href=\'c_login.php\' alt=\'Đăng nhập\' ><input class=\'btn btn-success btn-lg\' type=submit value=\'Đăng nhập\'></a>';
	                	});
            		});
          		</script>";
	} else {
		echo "<script>$(function(){
		 		$('#username').val('$username');
		 		$('#email').val('$email');
		 		$('#name').val('$name');
		 	});</script>";
	}
}
require_once '../views/v_register.php';
require_once '../views/v_footer.php';
?>