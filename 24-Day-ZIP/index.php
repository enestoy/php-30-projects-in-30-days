<?php
// =========================================
// ZIP ARŞİVİ OLUŞTURMA VE İÇERİK EKLEME
// =========================================

$zip = new ZipArchive();
$filename = "dosyam.zip";

// ZIP dosyasını oluştur veya varsa aç
if ($zip->open($filename, ZipArchive::CREATE) !== TRUE) {
    exit("❌ ZIP dosyası oluşturulamadı!");
} else {
    echo "✅ ZIP dosyası oluşturuldu.<br>";
}

// 1. Yeni içerikler oluşturup ekleyelim
$zip->addFromString("deneme.txt", "merhaba nasılsın");
$zip->addFromString("deneme.php", "<html><body><strong>ZİP'İN İÇİNE ATTIK</strong></body></html>");

// 2. Varolan bir dosyayı ZIP'e ekleyelim (dosya varsa)
$dosyaYolu = "ekleyelim.php";

if (file_exists($dosyaYolu)) {
    $zip->addFile($dosyaYolu, "degistirdim.php");
    $zip->addFile($dosyaYolu, "benimklasorum/klasorde.php");
} else {
    echo "❌ 'ekleyelim.php' dosyası bulunamadı, ZIP'e eklenmedi.<br>";
}

// 3. Klasör oluşturalım
$zip->addEmptyDir("benimklasorum");

// 4. Klasöre içerik dosyası ekleyelim
$zip->addFromString("benimklasorum/klasordeneme.txt", "klasordeee");

// =========================================
// Ekstra işlemler
// =========================================

// ZIP içindeki bir dosyanın bilgilerini alalım
echo "<pre>";
print_r($zip->statName("deneme.txt")); // Deneme dosyasının detaylı bilgileri
echo "</pre>";

// ZIP'i kapatıyoruz
$zip->close();
?>
