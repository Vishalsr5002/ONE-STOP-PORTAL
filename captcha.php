<?php
session_start();


$randomString = substr(md5(time()), 0, 6);

$_SESSION['captcha'] = $randomString;


$captchaImage = imagecreate(100, 30);
$backgroundColor = imagecolorallocate($captchaImage, 255, 255, 255);
$textColor = imagecolorallocate($captchaImage, 0, 0, 0);
imagestring($captchaImage, 7, 20, 5, $randomString, $textColor);


header('Content-type: image/png');
imagepng($captchaImage);

imagedestroy($captchaImage);
?>
