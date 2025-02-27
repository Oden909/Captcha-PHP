<?php
session_start();
$chars = 'abdefhknrstyz23456789';
$captcha_text = '';
for ($i = 0; $i < 5; $i++) {
    $captcha_text .= $chars[rand(0, strlen($chars) - 1)];
}

$_SESSION['captcha'] = $captcha_text;
$image_path = __DIR__ . '/img/noise.jpg';
$image = imagecreatefromjpeg($image_path);

$font_color = imagecolorallocate($image, 100, 100, 100);
$font = 'C:/Windows/Fonts/arial.ttf';
$line_color = imagecolorallocate($image, 100, 100, 100);

for ($i = 0; $i < 10; $i++) {
    imageline($image, rand(0, imagesx($image)), rand(0, imagesy($image)), rand(0, imagesx($image)), rand(0, imagesy($image)), $line_color);
}

for ($i = 0; $i < strlen($captcha_text); $i++) {
    imagettftext(
        $image,
        rand(18, 30),
        rand(-20, 20),
        20 + ($i * 40),
        rand(25, 35),
        $font_color,
        $font,
        $captcha_text[$i]
    );
}
header('Content-type: image/jpeg');
imagejpeg($image);
imagedestroy($image);
?>