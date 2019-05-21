<?php
if (isset($_REQUEST["file"]) && isset($_REQUEST["id"])) {
	// Get parameters
	$file = urldecode($_REQUEST["file"]); // Decode URL-encoded string
	$filepath = "upload/" . $file;

	// Process download
	if (file_exists($filepath)) {
		unlink($filepath);
		require_once "../model/m_file.php";
		$file = new File();
		$id = $_REQUEST["id"];
		$file_name = $_REQUEST["file"];
		$file->deleteFile($id, $file_name);
		header("Location:c_files.php");
		exit;
	}
} else {
	header("Location:c_files.php");
}
?>