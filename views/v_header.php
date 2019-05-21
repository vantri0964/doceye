<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<title>Home | MyFiles </title>
	<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
	<link href="../bootstrap/css/bootstrap-grid.min.css" rel="stylesheet" type="text/css" media="all" />
	<link href="../bootstrap/css/style.css" rel="stylesheet" type="text/css" media="all" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="" />
	<script src="../bootstrap/js/jquery-3.3.1.min.js"></script>
</head>

<body>
	<!--header-->
	<div class="container-fuilt">
		<nav class="navbar navbar-dark" style="background-color: #FFD500;">
			<!-- Navbar content -->
			<a class="navbar-brand" href="../" style="color: #38300a;font-style: italic">
				DOCEYE
			</a>
			<ul class="nav nav-pills">
				<?php if (isset($_SESSION['name']) && isset($_SESSION['id']) && isset($_SESSION['role'])) : ?>
					<li class="nav-item">
						<a class="nav-link" href='../controller/c_files.php' style="color: #38300a;font-family: arial">Quản lý</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="profile.php" role="menu" aria-haspopup="true" aria-expanded="false" style="color: #38300a;">
							<?= $_SESSION['name'] ?>
						</a>
						<div class="dropdown-menu" style="background-color: #dc5b21">
							<a class="dropdown-item" href="../controller/c_profile.php" style="color: #38300a;">Thông tin cá nhân</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="../controller/c_changePassword.php" style="color: #38300a;">Đổi mật khẩu</a>
						</div>
					</li>
					<li class="nav-item">
						<a class="nav-link" href='../controller/c_logout.php' style="color: #38300a;font-family: arial"">Đăng xuất</a>
					</li>
				<?php else : ?>
					<li class="nav-item"><a class="nav-link" href='../controller/c_login.php' style="color: #38300a;font-family: arial"">Đăng nhập</a></li>
					<li class="nav-item"><a class="nav-link" href='../controller/c_register.php' style="color: #38300a;font-family: arial"">Đăng ký</a></li>
				<?php endif; ?>
			</ul>

		</nav>
	<!-- <?php 
		echo $_SERVER["SERVER_NAME"];
		echo "<br/>";
		echo $_SERVER["REQUEST_URI"];
	?> -->

		<!---->