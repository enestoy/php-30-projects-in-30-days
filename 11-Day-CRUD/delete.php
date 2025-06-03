<?php
// Veritabanı bağlantısı oluştur
$baglanti = new mysqli("localhost", "root", "", "php_crud");

// Bağlantı hatası varsa durdur
if ($baglanti->connect_error) {
    die("Bağlantı hatası: " . $baglanti->connect_error);
}

// Adres çubuğundan gelen id değerini al (GET ile)
$kullaniciID = $_GET['id'] ?? null;

// Eğer geçerli bir ID geldiyse silme işlemini başlat
if ($kullaniciID) {
    // Silme sorgusunu hazırla
    $sorgu = $baglanti->prepare("DELETE FROM users WHERE id = ?");
    $sorgu->bind_param("i", $kullaniciID); // "i" = integer (tam sayı)

    // Sorguyu çalıştır ve sonucu kontrol et
    if ($sorgu->execute()) {
        // Başarılıysa ana sayfaya yönlendir
        header("Location: index.php?deleted=1");
        exit;
    } else {
        // Hata varsa yazdır
        echo "Silme hatası: " . $sorgu->error;
    }

    // Sorguyu kapat
    $sorgu->close();
} else {
    // ID gelmediyse uyarı ver
    echo "Geçersiz kullanıcı ID.";
}

// Veritabanı bağlantısını kapat
$baglanti->close();
?>
