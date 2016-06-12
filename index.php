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
            $(document).ready(function(){
                $('#mycalendar').monthly({
                    mode: 'event',
                    xmlUrl: 'xml/event.xml'
                });
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
					<li class="active"><a href="index.php">Home</a></li>
					<li><a href="posts.php">Posts</a></li>
					<li><a href="pictures.php">Pictures</a></li>
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
		<div class="row">
			<div class="col-lg-8 blog-main">
				<?php
				require_once 'Parsedown.php';
				$Parsedown = new Parsedown ();
				if (file_exists ( 'xml/posts.xml' )) {
					$doc = simplexml_load_file ( 'xml/posts.xml' );
					for($index = 0; ($index < $doc->count ()) && ($index < 10); $index ++) {
						// foreach ( $doc->children () as $post ) {
						$post = $doc->Post [$doc->count () - 1 - $index];
						echo '<div class="blog-post">
					<h2 class="blog-post-title">' . $post->Title . '</h2>
					<p class="blog-post-meta">' . $post->Date . '</p>
					<p>' . $Parsedown->text ( substr ( $post->Text, 0, 100 ) ) . '</p>
					</div>';
					}
				}
				?>
			</div>
			<div class="col-lg-4">
				</p>
				<!-- Kalender -->
				<div class="monthly" id="mycalendar"></div>
				
				<?php
				if (file_exists ( 'xml/posts.xml' )) {
					$doc = simplexml_load_file ( 'xml/posts.xml' );
					for($index = 0; ($index < $doc->count ()) && ($index < 10); $index ++) {
						$post = $doc->Post [$doc->count () - 1 - $index];
						echo '<p><a href="#' . $index . '">' . $post->Title . '</a></p>';

					}
				}
				?>
			</div>
		</div>
	</div>

	<script
		src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="js/jquery.min.js"><\/script>')</script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>