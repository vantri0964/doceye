<?php
define("MAX_SIZE", "8388608");
require_once "../model/m_file.php";
$file = new File();
$data = $file->queryAllCategory();

if (isset($_POST['up']) && isset($_FILES['fileUpload']) && isset($_POST['category'])) {

	if ($_FILES['fileUpload']['error'] > 0) {
		$result = "Upload lỗi !";
	} else {

		$fileName = $_FILES['fileUpload']['name'];
		$size = (int) $_FILES['fileUpload']['size'];
		$type = $_FILES['fileUpload']['type'];
		$target_dir = "upload/";
		$target_file = $target_dir . $fileName;
		$category_id = $_POST['category'];
		//Lấy phần mở rộng của file. đuôi file
		$extension = pathinfo($fileName, PATHINFO_EXTENSION);
		//đuôi file hợp lệ.
		$typeArr = array("JPG", "JPEG", "PNG", "GIF", "jpg", "jpeg", "png", "gif");
		//kiem tra loại file
		if (!in_array($extension, $typeArr)) {
			$error = "Loại file không hợp lệ!";
		}
		//kiểu tra size file
		if ((int) $_FILES['fileUpload']['size'] > MAX_SIZE) {
			$error = "Kích thước file phải dưới 8MB!";
		}
		//kiểm tra file tồn tại
		if (file_exists($target_file)) {
			$error = "File đã tồn tại!";
		}
		if (!isset($error)) {
			$link = $_SERVER["SERVER_NAME"] . "/project/controller/upload/" . $_FILES['fileUpload']['name'];
			$address = "../controller/upload/" . $_FILES['fileUpload']['name'];
			require_once "../model/m_file.php";
			$file = new File();
			move_uploaded_file($_FILES['fileUpload']['tmp_name'], $target_file);
			$file->insertFile(array($id, $fileName, $address, $link, $size, $category_id));
			$result = "Upload file thành công!";
		}
	}
}
require_once '../views/v_uploadFiles.php';
?>