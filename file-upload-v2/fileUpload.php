<?php 

$tmplocation = $_FILES["file"]["tmp_name"];

$filename = $_FILES["file"]["name"];

$ext = basename($filename);

$ext = pathinfo($ext, PATHINFO_EXTENSION);

$size = $_FILES["file"]["size"];

$filename_dest = tempnam("./uploads", "image-");

var_dump($filename_dest);

unlink($filename_dest);

$filename_dest = "$filename_dest.$ext";

move_uploaded_file($tmplocation, $filename_dest);

// Update the avatar column in the users table for the currently logged in user to be $filename_dest

?>