<?php
session_start();
unset($_SESSION["code"]);
/*
48-57 0 - 9
65-90 A-Z
97-122 a-z

*/

//$c = "Ahejh456@3j!kkfdi(jOMNfj";
$length = mt_rand(5, 8);
$down = 97;
$up = 122;
$i = 0;
$password = "";

while ($i < $length) {
    $character = chr(mt_rand($down, $up)); // chr(97) a
    $password .= $character;

    $i++;
}

$_SESSION["code"] = $password;

header("Content-type: image/png");
$im = imagecreatefrompng("captchaImage.png") or die("Cannot Initialize new GD image stream");
//$im = imagecreatetruecolor(400, 30);
$text_color = imagecolorallocate($im, 0, 0, 0);
$font = dirname(__FILE__) . '/arial.ttf'; //or just "arial.ttf"
imagettftext($im, 11, 3, 5, 20, $text_color, $font, $password);

imagepng($im);
imagedestroy($im);
unset($password);

?>