<?php
// =========================================
// YÖNTEM 1: ZipArchive ile ZIP dosyasını çıkartma
// =========================================
/*
$zip = new ZipArchive(); // ZipArchive sınıfından bir nesne oluşturulur

if ($zip->open("dosyam.zip") === TRUE) {
    // ZIP dosyası açıldıysa, içeriğini "a/" klasörüne çıkart
    if ($zip->extractTo("a/")) {
        echo "ZIP başarıyla çıkarıldı.";
    } else {
        echo "ZIP çıkarma işlemi başarısız oldu.";
    }

    $zip->close(); // ZIP dosyası kapatılır
} else {
    echo "ZIP dosyası açılamadı.";
}
*/

// =========================================
// YÖNTEM 2: zip fonksiyonları ile içeriği listeleme
// =========================================

$zip = zip_open("veriler.zip"); // ZIP dosyasını aç

if (is_resource($zip)) { // ZIP dosyası başarılı şekilde açıldıysa

    // Her bir giriş (entry) için döngü
    while ($entry = zip_read($zip)) {
        // Girdinin adı, dosya boyutu ve sıkıştırılmış boyutu alınır
        $isim = zip_entry_name($entry);
        $boyut = zip_entry_filesize($entry);
        $sikistirilmis = zip_entry_compressedsize($entry);

        // Bilgiler ekrana yazdırılır
        echo "📄 Dosya: $isim | Boyut: $boyut byte | Sıkıştırılmış: $sikistirilmis byte<br>";
    }

    zip_close($zip); // ZIP dosyası kapatılır

} else {
    echo "❌ ZIP dosyası açılamadı.";
}
?>
