<?php 
session_start();
include 'fonksiyon/helper.php';
?>

<!doctype html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Giriş Yap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body.bg-dark {
            background-color: #181818 !important;
        }
        .login-card {
            width: 100%;
            max-width: 400px;
        }
        .form-label {
            font-weight: 500;
        }
    </style>
</head>
<body class="<?= cook('color') ? cook('color') : 'bg-dark' ?> d-flex align-items-center justify-content-center min-vh-100">

    <div class="card login-card shadow <?= cook('color') ? cook('color') : 'bg-dark' ?>">
        <div class="card-header bg-primary text-white text-center fs-5 fw-bold">
            Login Sayfası
        </div>
        <div class="card-body">
            <?php if(session('error')): ?>
                <div class="alert alert-danger"><?= session('error'); ?></div>
            <?php endif; ?>
            <form action="islem.php?islem=giris" method="post">
                <div class="mb-3">
                    <label for="username" class="form-label text-success">Kullanıcı Adınız</label>
                    <input type="text" name="username" value="<?= session('username') ?>" class="form-control" placeholder="Kullanıcı adınızı girin">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label text-success">Şifreniz</label>
                    <input type="password" name="password" value="<?= session('password') ?>" class="form-control" placeholder="Şifrenizi girin">
                </div>
                <button type="submit" class="btn btn-success w-100">Giriş Yap</button>
            </form>
        </div>
        <div class="card-footer bg-info d-flex justify-content-between">
            <a href="islem.php?islem=renk&color=bg-light" class="btn btn-sm btn-light">Light Mod</a>
            <a href="islem.php?islem=renk&color=bg-dark" class="btn btn-sm btn-dark">Dark Mod</a>
        </div>
    </div>

</body>
</html>

<?php 
$_SESSION['error'] = null;
$_SESSION['username'] = null;
$_SESSION['password'] = null;
?>
