<?php

$image = imagecreatefromjpeg("certificado.jpg");

$black = imagecolorallocate($image, 0, 0, 0);

imagettftext($image, 20, 0, 450, 150, $black, "fonts".DIRECTORY_SEPARATOR."Playball".DIRECTORY_SEPARATOR."Playball-Regular.ttf" ,"CERTIFICADO");
imagestring($image, 5, 440, 350, utf8_decode("João Vitor de Oliveira Cara"), $black);
imagestring($image, 3, 440, 370, "Concluido em ".date("d/m/Y"), $black);

header("Content-Type: image.jpeg");

imagejpeg($image);

imagedestroy($image);

?>