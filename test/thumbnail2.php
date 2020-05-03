<?php
$fn = $_GET["fn"];
$path = "../test/pics/pic/";
$imageload = $path.$fn;

$source_image = imagecreatefromjpeg($imageload);
$source_imagex = imagesx($source_image);
$source_imagey = imagesy($source_image);

$dest_imagex = 170;
$dest_imagey = 110;
$dest_image = imagecreatetruecolor($dest_imagex, $dest_imagey);

imagecopyresampled($dest_image, $source_image, 0, 0, 0, 0, $dest_imagex, $dest_imagey, $source_imagex, $source_imagey);

header("Content-Type: image/jpeg");
imagejpeg($dest_image,NULL,80);
?>

<img src="thumbnail2.php?fn=' . $fn . '" alt="" />

