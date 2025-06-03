<?php 

$db= new PDO("mysql:host=localhost;dbname=education;charset=utf8","root","");

//-- XML İÇERİ DOSYA AKTARMA VE AKTARILAN VERİLERİ VERİTABANINA KAYDETME

$oku = new DOMDocument();
$oku->preserveWhiteSpace=false;
$oku->load("ogrenciler.xml");

$sutunadlari=array("ogretmen","ogrencino","ad","soyad","anneAd","babaAd","kardessayi","sinif");
$veriler=array();

$sorgu = new DOMXPath($oku);
$sonuc=$sorgu->query("/ogrenciler/ogrenci");

for ($sayi=0; $sayi<$sonuc->length; $sayi++):

$veriler[]=array(
$oku->getElementsByTagName("ogretmen")->item($sayi)->nodeValue,
$oku->getElementsByTagName("ogrencino")->item($sayi)->nodeValue,
$oku->getElementsByTagName("ad")->item($sayi)->nodeValue,
$oku->getElementsByTagName("soyad")->item($sayi)->nodeValue,
$oku->getElementsByTagName("anneAd")->item($sayi)->nodeValue,
$oku->getElementsByTagName("babaAd")->item($sayi)->nodeValue,
$oku->getElementsByTagName("kardessayi")->item($sayi)->nodeValue,
$oku->getElementsByTagName("sinif")->item($sayi)->nodeValue);

/*
$ogretmen=$oku->getElementsByTagName("ogretmen")->item($sayi)->nodeValue;
$ogrencino=$oku->getElementsByTagName("ogrencino")->item($sayi)->nodeValue;
$ad=$oku->getElementsByTagName("ad")->item($sayi)->nodeValue;
$soyad=$oku->getElementsByTagName("soyad")->item($sayi)->nodeValue;
$anneAd=$oku->getElementsByTagName("anneAd")->item($sayi)->nodeValue;
$babaAd=$oku->getElementsByTagName("babaAd")->item($sayi)->nodeValue;
$kardessayi=$oku->getElementsByTagName("kardessayi")->item($sayi)->nodeValue;
$sinif=$oku->getElementsByTagName("sinif")->item($sayi)->nodeValue;


$veriler[]=array($ogretmen,$ogrencino,$ad,$soyad,$anneAd,$babaAd,$kardessayi,$sinif);
*/

endfor;

echo "<pre>";
print_r($veriler);
echo "</pre>";

foreach ($veriler as $anahtar=> $deger):

@$verilerinstringdegeri.="(
'".$veriler[$anahtar][0]."',
".$veriler[$anahtar][1].",
'".$veriler[$anahtar][2]."',
'".$veriler[$anahtar][3]."',
'".$veriler[$anahtar][4]."',
'".$veriler[$anahtar][5]."',
".$veriler[$anahtar][6].",
'".$veriler[$anahtar][7]."'
),";

endforeach;

$temizveriler=rtrim($verilerinstringdegeri,",");

$sutunadim=join(",",$sutunadlari);


$ekle=$db->prepare("INSERT INTO ogrenciler (".$sutunadim.") VALUES ".$temizveriler);


if ($ekle->execute()):
echo "oldu";
else:
print_r($db->errorCode());
endif;




?>