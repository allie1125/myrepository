<?php

$devideBy=12;

//load the data from file
$file=file_get_contents("castle.jpg");

//convert text to picture
$origPic=imagecreatefromstring($file);

$width=imagesx($origPic);
$height=imagesy($origPic);

echo "width: $width height: $height <br/>";

$thumbwidth=$width/$devideBy;
$thumbheight=$height/$devideBy;


$thumbnail=imagecreatetruecolor($thumbwidth,$thumbheight);

//destination,src,dlx,dly,slx,sly,dw,dh,sw,sh
imagecopyresampled($thumbnail,$origPic,0,0,0,0,$thumbwidth,$thumbheight,$width,$height);

imagejpeg($thumbnail, "thumb.jpg");

imagedestroy($origPic);
imagedestroy($thumbnail);


echo "<img src='thumb.jpg' /><br/>";

echo "<img src='castle.jpg'>";
