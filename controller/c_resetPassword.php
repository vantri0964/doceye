<?php
	require_once("../views/v_header.php");

	if ( isset($_GET["email"]) && isset($_GET["token"]) ) {
		$email =  $_GET["email"];
		$token = $_GET["token"];
		$secret = "HAY_DUNG_HOI";
		$token_hash = hash( "sha256", $token.$secret);
		require_once("../model/m_user.php");
		$m_user = new M_User();
		if ($m_user->queryTokenHash($email, $token_hash)) {
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				$newPassword = $_POST["password"];
				$comfirmPassword = $_POST["comfirmPassword"];
				require_once("../model/validation.php");
				$validation = new Validation();
				$newPasswordErr = $validation->checkPassword($newPassword);
				$comfirmPasswordErr = $validation->checkConfirmPassword($newPassword, $comfirmPassword);
				if( ($newPasswordErr == null) && ($comfirmPasswordErr == null)){
					if ($m_user->updateResetPassword($email, $token_hash, md5($newPassword) )) {
						$ok = true;
					}
				}
			}
			require_once("../views/v_resetPassword.php");

		}else{
			echo "<div class='alert alert-danger col-6 offset-3' role='alert'>
					Something went wrong!
				</div>";
		}
	}else{
		echo "<div class='alert alert-danger col-6 offset-3' role='alert'>
					Something went wrong!
				</div>";
	}

?>