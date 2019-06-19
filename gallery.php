<?php
	$_SESSION['username'] = "Admin";
?>
<!DOCTYPE html>
<html>
<head>
	<title>php gallery</title>
</head>
<body>
	<main>
		<section class ="gallery-links">
			<div class= "wrapper">
				<h2> Gallery </h2>

				<div class="gallery-container">
					<?php
					include_once "db_connect.php";

					$sql = "select *  from gallery order by orderGallery desc";
					$stmt = mysqli_stmt_init($conn);

					if (!mysqli_stmt_prepare($stmt, $sql)){

						echo "SQL statement failed";
					}else{

						mysqli_stmt_execute($stmt);
						$result = mysqli_stmt_get_result($stmt);

						while ($row = msqli_fetch_ass0c($result)){
							echo 
							'<a href="#">
								<div style = "background-image:url(image/gallery'.$row["imageFullNameGallery"].');"></div>
								<h3>'.$row["titleGallery"].'</h3>
								<p>'.$row["descGallery"].'</p>
							</a>';
						}
					}
				
					?>
				</div>
					<?php
						if(isset($_SESSION['username']))
						{
							echo
							 '<div class="gallery-upload"> 

								<form action="upload.php" method="post" enctype="multipart/form-data">
									
									<input type="text" name="filename" placeholder="File Name">
									</br>
									<input type="text" name="filetitle" placeholder="Image title">
									</br>
									<input type="text" name="filedesc" placeholder="Image description">
									</br>
									<input type="file" name="file">
									</br>
									</br>
									<button type="submit" name="submit">Upload</button>
								</form>
							</div>';
						}
					?>
				</div>
			</div>
		</section>
	</main>


<style type="text/css">


	.gallery-links h2{

		font-family: Catamaran;
		font-size:28px;
		font-weight:600;
		color:#111;
		text-transform: uppercase;
		
	}

	.gallery-container{
		display:flex;
		flex-direction: row;
		flex-wrap;
		justify-content: :flex-start;
		align-content:flex-start;
		
	}

	.gallery-container a:hover{
		opacity:0.1;
	}

	.gallery-container a div{

		width: 235px;
		height: 235px;
		margin:5px;
		background-position: center;
		background-repeat: no-repeat;
		background-size: cover;
	}

	.gallery-container a h3 {
		font-family: Catamaran;
		font-size:20px;
		font-weight:700;
		color:#111;

	}






</style>
</body>
</html>