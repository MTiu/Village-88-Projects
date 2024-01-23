<?php
$img = imagecreate(200, 100);
$background = imagecolorallocate($img, rand(1, 100), rand(1, 100), rand(1, 100));
$text_color = imagecolorallocate($img, 255, 255, 255);
$line_color = imagecolorallocate($img, 255, 255, 255);
imagestring($img, 4, 30, 25, "Ticket No. " . rand(500, 600), $text_color);
imagestring($img, 4, 30, 55, "Have Fun!", $text_color);
imagesetthickness($img, 5);
imageline($img, 30, 45, 165, 45, $line_color);

header("Content-type: image/png");
imagepng($img);
imagedestroy($img);
