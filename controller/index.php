<!-- add header -->
	<?php 
		require_once("../views/v_header.php");
	
		if(isset($_SESSION['name']) || isset($_SESSION['id']) || isset($_SESSION['role']) ){
			$id= $_SESSION['id'];
			require_once("c_uploadFiles.php");
		}else{
			require_once("../views/v_home.php");
		}
		require_once("../views/v_footer.php");

	?>