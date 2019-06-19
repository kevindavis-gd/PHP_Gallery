<?php
if (isset($_POST['submit'])) {
	echo "success";

	$newFileName = $_POST['filename'];

	if (!$_POST['filename']) {
		$newFileName = "gallery";
	}
	else 
	{
		$newFileName = strtolower(str_replace(" ", "-", $newFileName));
	}




	$imageTitle=$_POST['filetitle'];
	$imageDisc = $_POST['filedesc'];

	$file = $_FILES['file'];

	print_r($file);
}


?>
