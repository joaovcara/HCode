<?php

$image = imagecreatefromjpeg("certificado.jpg");

$black = imagecolorallocate($image, 0, 0, 0);

imagestring($image, 5, 450, 150, "CERTIFICADO", $black);
imagestring($image, 5, 440, 350, utf8_decode("João Vitor de Oliveira Cara"), $black);
imagestring($image, 3, 440, 370, "Concluido em ".date("d/m/Y"), $black);

header("Content-Type: image.jpeg");

imagejpeg($image, "Certificado".date("dmY").".jpeg");

imagedestroy($image);

?>