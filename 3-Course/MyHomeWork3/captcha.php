<?php

session_start();
$captcha = rand(100000, 999999);
$code = md5($captcha);
$_SESSION['captcha'] = $code;
$width = 92;
$height = 35;
$image = imagecreate($width, $height);
$background = imagecolorallocate($image, 100, 60, 145);
$foreground = imagecolorallocate($image, 255, 255, 255);
imagestring($image, 35, 20, 12, $captcha, $foreground);
header('Content-type: image/jpeg');
imagejpeg($image);
imagedestroy($image);