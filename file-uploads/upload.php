<?php

$tmplocation = $_FILES["file"]["tmp_name"];

$filename = $_FILES["file"]["name"];

$ext = $_FILES["file"]["type"];

$size = $_FILES["file"]["size"];

echo $tmplocation."".$filename."".$ext."".$size."";

move_uploaded_file($tmplocation,"./".$filename);

?>
