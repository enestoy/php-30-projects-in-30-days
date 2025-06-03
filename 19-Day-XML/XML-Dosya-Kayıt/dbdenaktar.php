<?php 

$db= new PDO("mysql:host=localhost;dbname=education;charset=utf8","root","");

//-- VERİTABANINDAN VERİ ÇEKEREK, VERİLERİ XML DOSYA OLARAK DIŞARI ALABİLME


if (!$_POST):
?>
<form action="" method="post" >
<input type="submit" name="btn" value="DIŞARI AKTAR">
</form>
<?php

else:	

$olustur = new DOMDocument("1.0","utf-8");

$ogrenciler=$olustur->createElement("ogrenciler");

$verileral=$db->prepare("select * from ogrenciler");
$verileral->execute();

while ($gelenveriler=$verileral->fetch(PDO::FETCH_ASSOC)):

$ogrenci=$olustur->createElement("ogrenci");
$ogrenci->appendChild($olustur->createElement("ogretmen",$gelenveriler["ogretmen"]));
$ogrenci->appendChild($olustur->createElement("ogrencino",$gelenveriler["ogrencino"]));
$ogrenci->appendChild($olustur->createElement("ad",$gelenveriler["ad"]));
$ogrenci->appendChild($olustur->createElement("soyad",$gelenveriler["soyad"]));
$ogrenci->appendChild($olustur->createElement("anneAd",$gelenveriler["anneAd"]));
$ogrenci->appendChild($olustur->createElement("babaAd",$gelenveriler["babaAd"]));
$ogrenci->appendChild($olustur->createElement("kardessayi",$gelenveriler["kardessayi"]));
$ogrenci->appendChild($olustur->createElement("sinif",$gelenveriler["sinif"]));

$ogrenciler->appendChild($ogrenci);
endwhile;

$olustur->appendChild($ogrenciler);

		if ($olustur->save("aktarilanveriler.xml")):
		echo "VERİLER BAŞARIYLA AKTARILDI";
		else:
		echo "HATA VAR";
		endif;

endif;
?>