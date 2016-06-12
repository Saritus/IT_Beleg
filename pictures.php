<!DOCTYPE html>
<html lang="de" xmlns="http://www.w3.org/1999/html">
<head>


<title>SariBlog</title>

<meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta name="language" content="Deutsch, DE">
<meta name="Autor" content="Sebastian Mischke">
<meta name="description" content="Blog-Developing">
<meta name="keywords" content="HTML, CSS, Javascript">
<link href="images/favicon.png" type="image/x-icon" rel="shortcut icon">
<link href="css/bootstrap.css" type="text/css" rel="stylesheet">
<script src="js/jquery-1.12.3.js" type="text/javascript"></script>
<link href="css/style.css" type="text/css" rel="stylesheet">
<link href="css/monthly.css" rel="stylesheet">
<script src="js/monthly.js"></script>
<script>
            $(function(){
                $("#footer").load("footer.html");
            });
        </script>
</head>
<body>

	<!-- Navigationbar -->
	<nav class="navbar navbar-inverse navbar-static-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed"
					data-toggle="collapse" data-target="#navbar" aria-expanded="false"
					aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span> <span
						class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.php">SariBlog</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li><a href="index.php">Home</a></li>
					<li><a href="posts.php">Posts</a></li>
					<li class="active"><a href="pictures.php">Pictures</a></li>
					<li class="dropdown"><a href="#" class="dropdown-toggle"
						data-toggle="dropdown" role="button" aria-haspopup="true"
						aria-expanded="false">Admin <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="newPost.php">New Post</a></li>
							<li><a href="editPost.php">Edit Post</a></li>
							<li><a href="uploadPicture.php">Upload Picture</a></li>
						</ul></li>
				</ul>
			</div>
			<!--/.nav-collapse -->
		</div>
		<!--/.container-fluid -->
	</nav>

	<div class="container">
		<h2>Image Gallery</h2>

	<?php
	$files = scandir ( "upload" );
	$total = count ( $files );
	$images = array ();
	for($x = 0; $x < $total; $x ++) :
		if ($files [$x] != '.' && $files [$x] != '..') {
			$images [] = $files [$x];
		}
	endfor
	;
	
	$rowcount = 4;
	for($x = 0; $rowcount * $x < count ( $images ); $x ++) :
		echo '<div class="row">';
		for($y = 0; ($rowcount * $x + $y < count ( $images )) && ($y < $rowcount); $y ++) :
			echo '<div class="col-md-' . (12 / $rowcount) . '">
				<a href="' . 'upload/' . $images [$rowcount * $x + $y] . '" class="thumbnail">
					<p>' . $images [$rowcount * $x + $y] . '</p> <img class="img-thumbnail" alt="250x250"
					src="upload/' . $images [$rowcount * $x + $y] . '" data-holder-rendered="true"
					style="width: 250px; height: 250px;">
				</a>
			</div>';
		endfor
		;
		echo '</div>';
	endfor
	;
	
	?>
	</div>

	<script
		src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="js/jquery.min.js"><\/script>')</script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>