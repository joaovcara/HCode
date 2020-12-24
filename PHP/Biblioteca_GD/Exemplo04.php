<?php

header("Content-Type: image.jpeg");

$file = "wallpaper.jpg";
$new_width = 200;
$new_height = 100;

list($old_widht, $old_height) = getimagesize($file);

$new_image = imagecreatetruecolor($new_width, $new_height);
$old_image = imagecreatefromjpeg($file);

imagecopyresampled($new_image, $old_image, 0, 0, 0, 0, $new_width, $new_height, $old_widht, $old_height);

imagejpeg($new_image);

imagedestroy($new_image);
imagedestroy($old_image);

?>