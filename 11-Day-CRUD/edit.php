<?php
// Veritabanı bağlantısı oluştur
$baglanti = new mysqli("localhost", "root", "", "php_crud");

// Bağlantı başarılı mı kontrol et
if ($baglanti->connect_error) {
    die("Bağlantı hatası: " . $baglanti->connect_error);
}

// GET ile gelen kullanıcı ID'sini al
$kullaniciID = $_GET['id'] ?? null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $isim = $_POST['name'] ?? '';
    $eposta = $_POST['email'] ?? '';
    $sifre = $_POST['password'] ?? '';

    if (!empty($isim) && !empty($eposta)) {
        if (!empty($sifre)) {
            // Şifre doluysa hashle ve şifreyi güncelle
            $sifreliSifre = password_hash($sifre, PASSWORD_DEFAULT);

            $sorgu = $baglanti->prepare("UPDATE users SET name=?, email=?, password=? WHERE id=?");
            $sorgu->bind_param("sssi", $isim, $eposta, $sifreliSifre, $kullaniciID);
        } else {
            // Şifre boşsa sadece isim ve email güncellenecek
            $sorgu = $baglanti->prepare("UPDATE users SET name=?, email=? WHERE id=?");
            $sorgu->bind_param("ssi", $isim, $eposta, $kullaniciID);
        }

        if ($sorgu->execute()) {
            header("Location: index.php?updated=1");
            exit;
        } else {
            echo "Hata oluştu: " . $sorgu->error;
        }

        $sorgu->close();
    } else {
        echo "Lütfen isim ve e-posta alanlarını doldurun.";
    }
}

// Sayfa ilk açıldığında kullanıcı bilgilerini çek
if ($kullaniciID) {
    $sorgu = $baglanti->prepare("SELECT * FROM users WHERE id = ?");
    $sorgu->bind_param("i", $kullaniciID);
    $sorgu->execute();
    $kullanici = $sorgu->get_result()->fetch_assoc();
    $sorgu->close();
} else {
    die("Geçersiz kullanıcı ID.");
}

$baglanti->close();
?>


<!-- HTML Form: Kullanıcıyı Düzenle -->
<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <title>Kullanıcıyı Düzenle</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2>Kullanıcıyı Düzenle</h2>
     <form method="POST">
    <div class="mb-3">
        <label>Ad Soyad</label>
        <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($kullanici['name']) ?>" required>
    </div>
    <div class="mb-3">
        <label>E-Posta</label>
        <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($kullanici['email']) ?>" required>
    </div>
    <div class="mb-3">
        <label>Şifre (Değiştirmek istemiyorsan boş bırakabilirsin)</label>
        <input type="password" name="password" class="form-control" placeholder="Yeni şifre">
    </div>

    <button type="submit" class="btn btn-success">Güncelle</button>
    <a href="index.php" class="btn btn-secondary">Geri Dön</a>
</form>

    </div>
</body>

</html>