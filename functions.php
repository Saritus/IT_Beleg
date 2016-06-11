<?php
if (isset ( $_POST ['Post-Title'] ) && isset ( $_POST ['Post'] )) {
	$var = $_POST ['Post-Title'];
	echo $var;
	$post = $_POST ['Post'];
	echo $post;
}

echo $_GET ['variable'];
?>