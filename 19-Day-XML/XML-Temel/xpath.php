<?php 
// XML belgelerde - Xpath ile veri ve element arama

$arama= new DOMDocument();

$arama->preserveWhiteSpace=false;

$arama->load("ogrenciler.xml");

$sorgu= new DOMXPath($arama);

//$sonuc = $sorgu->query("//*"); // tüm elementleri bul
//$sonuc = $sorgu->query("/ogrenciler/ogrenci/aile/anneAd"); // hiyerarşiye göre listeleme derinlemesine listeleme
//$sonuc = $sorgu->query("/ogrenciler/ogrenci[2]/aile/anneAd"); // sadece bir kaydı almak için - anahtar değeri ile
//$sonuc = $sorgu->query("/ogrenciler/ogrenci[ogretmen='Tarık']/aile/anneAd"); // string koşullu sorgulama
//$sonuc = $sorgu->query("/ogrenciler/ogrenci[ID=1]/aile/anneAd"); // integer koşullu sorgulama
//$sonuc = $sorgu->query("/ogrenciler/ogrenci/ad[@id='bizimstil2']"); // öznitelikli arama
$sonuc = $sorgu->query("/ogrenciler/ogrenci/aile/anneAd[contains(.,'e')]"); // karakter ve harfe göre arama
for ($a=0; $a<$sonuc->length; $a++):
echo $sonuc->item($a)->nodeValue."<br>";
endfor;


?>