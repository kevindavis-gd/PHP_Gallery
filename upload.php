<?php
if (isset($_POST["submit"])) {

	$newFileName = $_POST["filename"];

	if (empty($newFileName)) {
		$newFileName = "gallery";
	}
	else 
	{
		$newFileName = strtolower(str_replace(" ", "-", $newFileName));
	}
	$imageTitle = $_POST["filetitle"];
	$imageDesc = $_POST["filedesc"];

	$file = $_FILES["file"];

	
	$fileName = $file["name"];
	$fileType = $file["type"];
	$fileTypeName = $file["tmp_name"];
	$fileError = $file["error"];
	$fileSize = $file["size"];

	$fileExt = explode(".", $fileName);
	$fileActualExt = strtolower(end($fileExt));

	$allowed = array("jpg", "jpeg", "png");

	if (in_array($fileActualExt, $allowed)) {

		if ($fileError === 0){
			if ($fileSize < 200000)
			{
				$imageFullName = $newFileName . "." . uniqid("", true) . ".". $fileActualExt;

				$fileDestination = "image/Gallery/" .$imageFullName;

				include_once("db_connect.php");

				if (empty($imageTitle) || empty($imageDesc)) {

					echo "File Name or Title Empty";
					exit();
				}else{

					$sql = "select * from gallery;";
					$stmt = mysqli_stmt_init($conn);


					if(!mysqli_stmt_prepare($stmt, $sql)){

						echo "SQL statement failed 1 !";
					}else{

						mysqli_stmt_execute($stmt);
						$result = mysqli_stmt_get_result($stmt);
						$rowCount=mysqli_num_rows($result);
						$setImageOrder = $rowCount + 1;

						$nnn = "insert into gallery (titleGallery, descGallery, imgFullGalleery, orderGallery) values(?,?,?,?);";

						if(!mysqli_stmt_prepare($stmt, $nnn)){

							echo "SQL statement failed 2 !";
							
						}else{
							mysqli_stmt_bind_param($stmt,"ssss",$imageTitle, $imageDesc,$imageFullName,$setImageOrder);

							mysqli_stmt_execute($stmt);

							move_uploaded_file($fileTypeName, $fileDestination);

							echo "success";
						}
					}
				}
			}else{
				echo "File is too large";
				
				exit();
			}
		}else
		{
			echo "you had an error!";
			
			exit();
		}	
	}else
	{
		echo "you need to uplode a proper file type";
		
		exit();
	}
}


?>
