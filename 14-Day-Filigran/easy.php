<?php
$imageUrl = "img/manzara.jpg";   // Görselin yolu
list($width, $height) = getimagesize($imageUrl);   // Resmin boyutları
$imageProperties = imagecreatetruecolor($width, $height);   // Yeni resim oluşturma
$targetlayer = imagecreatefromjpeg($imageUrl);   // Resmi açma

imagecopyresampled($imageProperties, $targetlayer, 0, 0, 0, 0, $width, $height, $width, $height);   // Resmi yeniden boyutlandırma

// Filigran yazısı
$yazim = "ENES FİLİGRAN";
$yaziminrengi = imagecolorallocate($imageProperties, 200, 200, 200); // Göz yormayan gri renk

// Fontu kullanma (TrueType font)
$font = realpath('corbelz.ttf');   // Font dosyasının yolu
$fontSize = 30; // Font boyutunu biraz küçülttük

// Yazının konumunu sağ alt köşeye yerleştirme
$box = imagettfbbox($fontSize, 0, $font, $yazim);
$x = $width - ($box[2] - $box[0]) - 10;   // Sağdan 10px içeride
$y = $height - 10;   // Alt taraftan 10px yukarıda

// Yazıyı ekleme
imagettftext($imageProperties, $fontSize, 0, $x, $y, $yaziminrengi, $font, $yazim);

// Görseli tarayıcıda görüntüleme
header("Content-type: image/jpg");
imagejpeg($imageProperties);

// Görseli dosyaya kaydetme
imagejpeg($imageProperties, "img/filigran.jpg");

// Bellek temizleme
imagedestroy($targetlayer);
imagedestroy($imageProperties);




// WATERMARK - FİLİGRAN YAPIMI
/*

$watermark= imagecreatefrompng('img/res2.png');

$imageUrl=imagecreatefrompng("img/dunya.png");


$watermarkX=imagesx($watermark);
$watermarkY=imagesy($watermark);

imagecopy($imageUrl,$watermark,imagesx($imageUrl)/2,imagesy($imageUrl)/2,0,0,$watermarkX,$watermarkY);

header("Content-type: image/png");
imagepng($imageUrl);
imagepng($imageUrl, "img/file.png");

imagedestroy($imageUrl);

*/



/*

$imageUrl="img/manzara.jpg";

list($width,$height) = getimagesize($imageUrl);

$imageProperties=imagecreatetruecolor($width,$height);
$targetlayer=imagecreatefromjpeg($imageUrl);

imagecopyresampled($imageProperties,$targetlayer,0,0,0,0,$width,$height,$width,$height);

$yazim="KIRMIZI FILIGRAN";
$yaziminrengi=imagecolorallocate($imageProperties,255,48,48);

$font=realpath('corbelz.ttf');

//imagestring($imageProperties,40,200,117,$yazim,$yaziminrengi);
imagettftext($imageProperties,40,5,40,280,$yaziminrengi,$font,$yazim);





header("Content-type: image/jpg");
imagejpeg($imageProperties);
imagejpeg($imageProperties, "img/file.jpg");

imagedestroy($targetlayer);
imagedestroy($imageProperties);

*/


?>







