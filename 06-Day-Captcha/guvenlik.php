<?php session_start();

header('Content-type: image/jpeg');

$kod=substr(md5(mt_rand(0,9999999)),0,6);
$_SESSION["kod"]=$kod;


$resim = imagecreate(90,35);
$arkaplan=imagecolorallocate($resim ,254,219,101);
$beyaz= imagecolorallocate($resim ,54,54,54);

imagestring($resim,25,18,13,$kod,$beyaz);

imagejpeg($resim,NULL,100);

imagedestroy($resim);



?>