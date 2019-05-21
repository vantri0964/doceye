<?php 
	require_once("../views/v_header.php");

	if (($_SERVER["REQUEST_METHOD"] == "POST")) {
		$email = $_POST["email"];
		require_once("../model/m_user.php");
		$m_user = new M_User();
		$had = $m_user->queryEmail($email);
		if ($had) {

			$token = hash( "sha256", time().$email);
			
			$secret = "HAY_DUNG_HOI";

			$token_hash = hash( "sha256", $token.$secret);

			$m_user->updateTokenHash($email, $token_hash);

			require_once("PHPMailer/sendMail.php");
			$sendMail = new SendMail();
			$_subject = "Thay đổi mật khẩu tài khoản - Project";
			$_body = "<a href='http://localhost/project/controller/c_resetPassword.php?email=".$email."&token=".$token."''><b>Nhấp vào đây để thay đổi mật khẩu tài khoản!</b></a>";
			$sendMail->sendGmail($_subject, $_body, $email);

			echo "<div class='alert alert-success col-6 offset-3' role='alert'>
					Liên kết thay đổi mật khẩu đã gửi đến email!
				</div>";
		}else{
			echo "<div class='alert alert-danger col-6 offset-3' role='alert'>
					Không có kết quả tìm kiếm! <br>
					Tìm kiếm không trả về kết quả nào. Vui lòng thử lại với thông tin khác.
				</div>";
		}
	}

	require_once("../views/v_forgotPassword.php");
	require_once("../views/v_footer.php");
 ?>