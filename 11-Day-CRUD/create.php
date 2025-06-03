<?php
// Veritabanı bağlantısı oluştur
$baglanti = new mysqli("localhost", "root", "", "php_crud");

// Bağlantı başarılı mı kontrol et
if ($baglanti->connect_error) {
    die("Bağlantı hatası: " . $baglanti->connect_error);
}

// Formdan gelen verileri al (eğer boş değilse)
$isim = $_POST['name'] ?? '';
$eposta = $_POST['email'] ?? '';
$sifre = $_POST['password'] ?? '';

// Güvenlik: Alanlar boş değilse ve şifreyi güvenli hale getir
if (!empty($isim) && !empty($eposta) && !empty($sifre)) {
    // Şifreyi güvenli hale getir (hashleme)
    $sifreliSifre = password_hash($sifre, PASSWORD_DEFAULT);

    // SQL sorgusunu hazırla
    $sorgu = $baglanti->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
    $sorgu->bind_param("sss", $isim, $eposta, $sifreliSifre);

    // Sorguyu çalıştır ve sonucu kontrol et
    if ($sorgu->execute()) {
        // Başarılıysa ana sayfaya yönlendir
        header("Location: index.php?success=1");
    } else {
        // Hata varsa göster
        echo "Hata oluştu: " . $sorgu->error;
    }

    // Hazırlanan sorguyu kapat
    $sorgu->close();
} else {
    // Eksik alan varsa uyarı ver
    echo "Lütfen tüm alanları doldurun.";
}

// Veritabanı bağlantısını kapat
$baglanti->close();
?>
