
<?php
	require_once('../views/v_header.php');
	// kiểm tra user
	if( !isset($_SESSION['id']) || !isset($_SESSION['name']) || !isset($_SESSION['role'])){
		// chưa đăng nhập
		header('location:index.php'); 
	}
	// tồn tại user
	$id = $_SESSION['id'];	//lấy id
	require_once('../model/m_user.php');
	$m_User = new M_User();
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$sex = null;
		$birthday = null;
		$phone = null;
		$address = null;
		$name = null;
		if (isset($_POST['name'])){
			$name = $_POST['name'];
		}
		if (isset($_POST['sex'])){
			$sex = $_POST['sex'];
		}
		if (isset($_POST['birthday'])){
			$birthday = $_POST['birthday'];
		}
		if (isset($_POST['phone'])){
			$phone = $_POST['phone'];
		}
		if (isset($_POST['address'])){
			$address = $_POST['address'];
		}
		$ok = $m_User->updateProfile(array( (ucwords($name)), $sex, $birthday, $phone, (ucwords($address)), $id));
		echo "<div class='alert alert-success col-4 offset-4' role='alert'>
				  	Cập nhật thành công!
				</div>";
	}
	$profileArr = $m_User->queryProfile($id);

	//views
	require_once('../views/v_profile.php');
	require_once('../views/v_footer.php');
	
	if($profileArr == 0){
		header('location:index.php');
	}else{
		echo "<script>$('#name').val('".$profileArr['name']."')</script>";
		echo "<script>$('#username').val('".$profileArr['username']."')</script>";
		echo "<script>$('#email').val('".$profileArr['email']."')</script>";
		if(strcmp($profileArr['sex'], 'Nam') == 0){
			echo "<script>$('#male').attr('checked', true);$('#female').attr('checked', false);</script>";
		}elseif(strcmp($profileArr['sex'], 'Nữ') == 0){
			echo "<script>$('#male').attr('checked', false);$('#female').attr('checked', true);</script>";
		}
		echo "<script>$('#birthday').val('".$profileArr['birthday']."')</script>";
		echo "<script>$('#phone').val('".$profileArr['phone']."')</script>";
		echo "<script>$('#address').val('".$profileArr['address']."')</script>";

	}
?>