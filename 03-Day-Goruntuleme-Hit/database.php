<?php
// Veritabanı bağlantısı
try {
    $db = new PDO("mysql:host=localhost;dbname=php_hit_uygulamasi;charset=utf8", "root", "");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "<strong>Bağlantı Hatası:</strong> " . $e->getMessage();
    exit;
}

// Güvenli veri filtreleme fonksiyonu
function Filtrele($veri) {
    return htmlspecialchars(strip_tags(trim($veri)), ENT_QUOTES, 'UTF-8');
}
?>
