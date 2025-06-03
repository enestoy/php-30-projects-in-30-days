<?php
/* // DOMDocument nesnesi oluşturuluyor (XML belgesi için)
$dom = new DOMDocument("1.0", "utf-8");

// Ana eleman oluşturuluyor: <ogrenci>
$ogrenciler = $dom->createElement("ogrenci");

// Öğrenci bilgileri için alt elemanlar oluşturuluyor
$ID = $dom->createElement("ID", 1);
$ad = $dom->createElement("ad", "Enes");
$soyad = $dom->createElement("soyad", "Toy");
$sinif = $dom->createElement("sinif", "9-B");

// Aile bilgileri için <aile> elemanı ve alt elemanları oluşturuluyor
$aile = $dom->createElement("aile");
$anneadi = $dom->createElement("anneAd", "Ayşe");
$babaadi = $dom->createElement("babaAd", "Hüseyin");
$kardessayisi = $dom->createElement("kardessayi", 3);

// <aile> elemanına alt elemanlar ekleniyor
$aile->appendChild($anneadi);
$aile->appendChild($babaadi);
$aile->appendChild($kardessayisi);

// Özellik (attribute) tanımlama: <ad> elemanına id="bizimstil" özelliği ekleniyor
$ozellik = $dom->createAttribute("id");
$ozellik->value = "bizimstil";
$ad->appendChild($ozellik);

// XML dosyasına bir yorum satırı ekleniyor
$footer = $dom->createComment("Bu öğrenciler için üretilen dosya");
$dom->appendChild($footer);

// Bir text node (yazı düğümü) ekleniyor: <soyad> içine "Selam" yazısı
$yazi = $dom->createTextNode("Selam");
$soyad->appendChild($yazi);

// <soyad> elemanına yeni bir özellik (attribute) ekleniyor: text="center"
$soyad->setAttribute("text", "center");

// Dışarıdan yeni bir XML elemanı ekleniyor: <ogretmen>İsmail</ogretmen>
$arayasikistir = new DOMDocument();
$arayasikistir->loadXML("<ogretmen>İsmail</ogretmen>");
$veri = $arayasikistir->getElementsByTagName("ogretmen")->item(0);
$veri = $dom->importNode($veri, true); // Dış belgeyi ana DOM'a dahil ediyoruz
$ogrenciler->appendChild($veri);

// Oluşturulan elemanlar ana <ogrenci> elemanına ekleniyor
$ogrenciler->appendChild($ID);
$ogrenciler->appendChild($ad);
$ogrenciler->appendChild($aile);
$ogrenciler->appendChild($soyad);
$ogrenciler->appendChild($sinif);

// <ogrenci> elemanı kök (root) elemana ekleniyor
$dom->appendChild($ogrenciler);

// XML dosyası "ogrenciler.xml" adıyla kaydediliyor
$dom->save("ogrenciler.xml");

 */
//--------------------------------------------------------------------------
// XML OKUMA İŞLEMLERİ (YORUMA ALINMIŞ BÖLÜM)
//--------------------------------------------------------------------------



// XML dosyasını okumak için DOMDocument nesnesi oluşturuluyor
$oku = new DOMDocument();
$oku->load("ogrenciler.xml");

// Ana elemanın altındaki tüm çocuk düğümler alınıyor
$ogrencibilgileri = $oku->documentElement->childNodes;

// 1. Yöntem: foreach ile dolaşarak tüm elemanlar ekrana yazdırılabilir

foreach ($ogrencibilgileri as $deger):
    echo "<pre>";
    print_r($deger);
    echo "<pre>";
    echo "Tag Name : " . $deger->tagName . " - " . $deger->nodeValue . "<br>";
endforeach;

// 2. Yöntem: for döngüsü ile kontrol ve alt elemanlara erişim

for ($i = 0; $i < $ogrencibilgileri->length; $i++):
    
    if ($ogrencibilgileri->item($i)->tagName == "aile"):
        // Eğer eleman aile ise, altındaki çocukları ayrı ayrı listeleriz
        $aileicinegir = $oku->getElementsByTagName("aile")->item(0);
        $aileicinegir2 = $aileicinegir->childNodes;

        for ($a = 0; $a < $aileicinegir2->length; $a++):
            echo $aileicinegir2->item($a)->tagName . "-" . $aileicinegir2->item($a)->nodeValue . "<br>";
        endfor;

    else:
        echo $ogrencibilgileri->item($i)->tagName . "-" . $ogrencibilgileri->item($i)->nodeValue . "<br>";
    endif;

endfor;



//--------------------------------------------------------------------------
// HTML YÜKLEME VE KAYDETME İŞLEMLERİ (YORUMA ALINMIŞ BÖLÜM)
//--------------------------------------------------------------------------

/*

// Yeni bir DOMDocument nesnesi
$dom = new DOMDocument();

// HTML dosyasını yükleme
$dom->loadHTMLFile("dosyam.html");
echo $dom->saveHTML(); // HTML içeriğini çıktı olarak verir

// XML içeriğini string olarak yükleme ve dosyaya kaydetme
$dom->loadXML("<yas>10</yas>");
$dom->save("hop.xml"); // hop.xml dosyasına kaydeder

*/

?>
