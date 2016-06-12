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

<?php
$upload_folder = 'upload/'; // Das Upload-Verzeichnis
$filename = pathinfo ( $_FILES ['datei'] ['name'], PATHINFO_FILENAME );
$extension = strtolower ( pathinfo ( $_FILES ['datei'] ['name'], PATHINFO_EXTENSION ) );

// Überprüfung der Dateiendung
$allowed_extensions = array (
		'png',
		'PNG',
		'jpg',
		'JPG',
		'jpeg',
		'JPEG',
		'gif',
		'GIF' 
);
if (! in_array ( $extension, $allowed_extensions )) {
	header ( 'Location: uploadPicture.php?Alert=' . $extension . 'Nur png, jpg, jpeg und gif-Dateien sind erlaubt' );
	die ( "Nur png, jpg, jpeg und gif-Dateien sind erlaubt" );
}

// Überprüfung der Dateigröße
$max_size = 2 * 1024 * 1024; // 2 MB
if ($_FILES ['datei'] ['size'] > $max_size) {
	header ( 'Location: uploadPicture.php?Alert=Maximal 2MB hochladen' );
	die ( "Maximal 2MB hochladen" );
}

// Überprüfung dass das Bild keine Fehler enthält
$allowed_types = array (
		IMAGETYPE_PNG,
		IMAGETYPE_JPEG,
		IMAGETYPE_GIF 
);
$detected_type = exif_imagetype ( $_FILES ['datei'] ['tmp_name'] );
if (! in_array ( $detected_type, $allowed_types )) {
	die ( '' );
}

// Pfad zum Upload
$new_path = $upload_folder . $filename . '.' . $extension;

// Neuer Dateiname falls die Datei bereits existiert
if (file_exists ( $new_path )) { // Falls Datei existiert, hänge eine Zahl an den Dateinamen
	$id = 1;
	do {
		$new_path = $upload_folder . $filename . '_' . $id . '.' . $extension;
		$id ++;
	} while ( file_exists ( $new_path ) );
}

// Alles okay, verschiebe Datei an neuen Pfad
move_uploaded_file ( $_FILES ['datei'] ['tmp_name'], $new_path );
?>

<!-- 
$(document).ready(function(){
    $("button").click(function(){
        $.post("demo_test_post.asp",
        {
          name: "Donald Duck",
          city: "Duckburg"
        },
        function(data,status){
            alert("Data: " + data + "\nStatus: " + status);
        });
    });
});
 -->

header('Location: pictures.php');


</html>