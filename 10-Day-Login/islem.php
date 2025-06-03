<?php
session_start();
include 'fonksiyon/helper.php';
include 'db.php'; // Veritabanı bağlantı dosyası

// Giriş işlemi
if (get('islem') === 'giris') {
    $username = trim(post('username'));
    $password = trim(post('password'));

    if (!$username) {
        $_SESSION['error'] = 'Lütfen kullanıcı adınızı giriniz.';
        header('Location: login.php');
        exit;
    }

    if (!$password) {
        $_SESSION['error'] = 'Lütfen şifrenizi giriniz.';
        header('Location: login.php');
        exit;
    }

    // Veritabanından kullanıcıyı çek
    $query = $db->prepare("SELECT * FROM users WHERE username = :username");
    $query->execute(['username' => $username]);
    $user = $query->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        $_SESSION['error'] = 'Böyle bir kullanıcı bulunamadı.';
        header('Location: login.php');
        exit;
    }

    // Şifre kontrolü
    // Not: Eğer şifreler hashlenmişse password_verify() kullan
    if ($user['password'] !== $password) {
        $_SESSION['error'] = 'Kullanıcı adı veya şifre hatalı.';
        header('Location: login.php');
        exit;
    }

    // Başarılı giriş
    $_SESSION['login'] = true;
    $_SESSION['kullanici_adi'] = $user['username'];
    $_SESSION['eposta'] = $user['mail'] ?? ''; // mail sütunu varsa

    header('Location: index.php');
    exit;
}

// Hakkımda yazısı kaydetme
if (get('islem') === 'hakkimda') {
    $hakkimda = htmlspecialchars(trim(post('hakkimda')));
    $filename = './db/' . session('kullanici_adi') . '.txt';
    $result = file_put_contents($filename, $hakkimda);

    header('Location: index.php?islem=' . ($result ? 'true' : 'false'));
    exit;
}

// Oturumu kapatma
if (get('islem') === 'cikis') {
    session_destroy();
    session_start();
    $_SESSION['error'] = 'Oturum sonlandırıldı.';
    header('Location: login.php');
    exit;
}

// Tema rengi değiştirme
if (get('islem') === 'renk') {
    $color = get('color');
    if (in_array($color, ['bg-dark', 'bg-light'])) {
        setcookie('color', $color, time() + (365 * 86400));
    }
    header('Location: ' . ($_SERVER['HTTP_REFERER'] ?? 'index.php'));
    exit;
}
?>