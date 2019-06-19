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
					<a href="#">
						<div></div>
						<h3>This is a title</h3>
						<p>This is a paragraph</p>
					</a>

					<a href="#">
						<div></div>
						<h3>This is a title</h3>
						<p>This is a paragraph</p>
					</a>

					<a href="#">
						<div></div>
						<h3>This is a title</h3>
						<p>This is a paragraph</p>
					</a>

					<a href="#">
						<div></div>
						<h3>This is a title</h3>
						<p>This is a paragraph</p>
					</a>

					<a href="#">
						<div></div>
						<h3>This is a title</h3>
						<p>This is a paragraph</p>
					</a>
				</div>
				<div class="gallery-upload"> 

				<form action="includes/galary-upload-include.php" method="" enctype="multipart/form-data">
					
					<input type="text" name="filename" placeholdeer="File Name">
					<input type="text" name="filetitle" placeholdeer="Image title">
					<input type="text" name="filedesc" placeholdeer="Image description">
					<input type="file" name="file">

					<button type="submit" name="submit">Upload</button>

				</form>











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
		background-color:red;
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