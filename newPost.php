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
<link rel="stylesheet"
	href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
<script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
<link href="css/monthly.css" rel="stylesheet">
<script src="js/monthly.js"></script>
<script>
            $(document).ready(function(){
                $('#mycalendar').monthly({
                    mode: 'event',
                    xmlUrl: 'files/event.xml'
                });
            });
        </script>
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
					<li><a href="pictures.php">Pictures</a></li>
					<li class="dropdown"><a href="#" class="dropdown-toggle"
						data-toggle="dropdown" role="button" aria-haspopup="true"
						aria-expanded="false">Admin <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li class="active"><a href="newPost.php">New Post</a></li>
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
			<div class="col-lg-8">
				<form action="functions.php" method="post">
					<p>
						<input type="text" name="Post-Title" placeholder="Post-Title" />
					</p>
					<p id="textarea">
						<textarea id="MDE" name="Post" /></textarea>
					</p>
					<p>
						<input type="submit" value="Posten" />
					</p>
				</form>

				<script>
				var simplemde = new SimpleMDE({ element: document.getElementById("MDE") });
				</script>
			</div>
			<div class="col-lg-4">
				<div class="container-fluid">
					<div class="row" style="max-width: 500px; margin: auto;">

						<h1 style="text-align: center;">Markdown Guide</h1>

						<h4>Emphasis</h4>
						<pre>**<strong>bold</strong>**
*<em>italics</em>*
~~<strike>strikethrough</strike>~~</pre>

						<h4>Headers</h4>
						<pre># Big header
## Medium header
### Small header
#### Tiny header</pre>

						<h4>Lists</h4>
						<pre>* Generic list item
* Generic list item
* Generic list item

1. Numbered list item
2. Numbered list item
3. Numbered list item</pre>

						<h4>Links</h4>
						<pre>[Text to display](http://www.example.com)</pre>

						<h4>Quotes</h4>
						<pre>> This is a quote.
> It can span multiple lines!</pre>

						<h4>
							Images </small>
						</h4>
						<pre>![](http://www.example.com/image.jpg)</pre>

						<h4>Tables</h4>
						<pre>| Column 1 | Column 2 | Column 3 |
| -------- | -------- | -------- |
| John     | Doe      | Male     |
| Mary     | Smith    | Female   |

<em>Or without aligning the columns...</em>

| Column 1 | Column 2 | Column 3 |
| -------- | -------- | -------- |
| John | Doe | Male |
| Mary | Smith | Female |
</pre>

						<h4>Displaying code</h4>
						<pre>`var example = "hello!";`

<em>Or spanning multiple lines...</em>

```
var example = "hello!";
alert(example);
```</pre>


					</div>
				</div>
			</div>
		</div>
	</div>

	<script
		src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="js/jquery.min.js"><\/script>')</script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>