<?php
// Sirket ve Departman sınıflarını dahil ediyoruz.
require_once 'Sirket.php';
require_once 'Departman.php';

// ID'si 1 olan departmanı veritabanından getiriyoruz.
$departman = Departman::getir(1);

// Bu departmanın adını ekrana yazdırıyoruz.
echo "Departman Adı: " . $departman->ad . "<br>";

// Bu departmanın yöneticisini alıyoruz (Calisan nesnesi döner).
$yonetici = $departman->yoneticiGetir();

// Yöneticinin adını ve unvanını ekrana yazdırıyoruz.
echo "Yönetici: " . $yonetici->ad . " (" . $yonetici->unvan . ")";

// ID'si 3 olan çalışanı veritabanından getiriyoruz.
$calisan = Calisan::getir(3);

// Bu çalışanın departmanını getiriyoruz.
$departman = Departman::getir($calisan->departman_id);

// Çalışanın adı ve bağlı olduğu departmanın adı ekranda gösteriliyor.
echo "<br>Çalışan: " . $calisan->ad . " -- " . "Departman: " . $departman->ad;

// Veritabanındaki tüm çalışanları alıyoruz.
$calisanlar = Calisan::hepsiniGetir();

echo "<h1>Tüm Çalışanlar</h1>";
echo "<ul>";

// Her bir çalışan için...
foreach ($calisanlar as $calisan) {
    // Çalışanın bağlı olduğu departmanı getiriyoruz.
    $departman = Departman::getir($calisan->departman_id);
    
    // Liste öğesi açıyoruz.
    echo "<li>";
    
    // Çalışanın adı ve unvanını yazdırıyoruz.
    echo $calisan->ad . " - " . $calisan->unvan;
    
    // Eğer departman bilgisi varsa parantez içinde departman adını yazdırıyoruz.
    if ($departman) {
        echo " (" . $departman->ad . ")";
    }
    
    // Liste öğesini kapatıyoruz.
    echo "</li>";
}

echo "</ul>";
?>
