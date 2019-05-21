<?php
require_once "../views/v_header.php";
if (isset($_SESSION['name']) && isset($_SESSION['id']) && isset($_SESSION['role'])):
	$id = $_SESSION['id'];
	require_once "../model/m_file.php";
	$file = new File();
	$dataCategory = $file->queryAllCategory();
	require_once "../model/m_file.php";
	$file = new File();
	if (isset($_GET['category'])) {
		$category = $_GET['category'];
		$category = "category_id = " . $category;
	} else {
		$category = null;
	}

	$data = $file->queryAllFile($id, $category);
	require_once "../views/v_files.php";
endif;
require_once "../views/v_footer.php";

?>