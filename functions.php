<?php
if (isset ( $_POST ['Post-Title'] ) && isset ( $_POST ['Post'] )) {
	if (file_exists ( 'xml/posts.xml' )) {
		$doc = simplexml_load_file ( 'xml/posts.xml' );
		
		$post = $doc->addChild ( 'Post' );
		$post->addChild ( 'Title', $_POST ['Post-Title'] );
		$post->addChild ( 'Text', $_POST ['Post'] );
		$post->addChild ( 'Date', date ( "d.m.y - H:i", time () ) );
		
		$doc->asXML ( "xml/posts.xml" );
		
		header ( 'Location: index.php' );
	} else {
		$doc = new DOMDocument ( '1.0', 'utf-8' );
		$doc->formatOutput = true;
		
		$posts = $doc->createElement ( 'Posts' );
		$post = $doc->createElement ( 'Post' );
		$title = $doc->createElement ( 'Title' );
		$text = $doc->createElement ( 'Text' );
		$date = $doc->createElement ( 'Date' );
		
		$doc->appendChild ( $posts );
		$posts->appendChild ( $post );
		
		$post->appendChild ( $title );
		$newTitle = $doc->createTextNode ( $_POST ['Post-Title'] );
		$newTitle = $title->appendChild ( $newTitle );
		
		$post->appendChild ( $text );
		$newText = $doc->createTextNode ( $_POST ['Post'] );
		$newText = $text->appendChild ( $newText );
		
		$post->appendChild ( $date );
		$newDate = $doc->createTextNode ( date ( "d.m.y - H:i", time () ) );
		$newDate = $date->appendChild ( $newDate );
		
		$doc->preserveWhiteSpace = false;
		$doc->save ( "./xml/posts.xml" );
		
		header ( 'Location: index.php' );
	}
}
?>