<?php 
session_start();
include 'fonksiyon/helper.php';

if (!isset($_SESSION['login']) || $_SESSION['login'] == false) {
    header('Location:login.php');
    exit;
}

$dosyaYolu = 'db/' . session('kullanici_adi') . '.txt';

if (!file_exists($dosyaYolu)) {
    touch($dosyaYolu);
}

$hakkimda = file_get_contents($dosyaYolu);
$theme = cook('color') === 'bg-light' ? 'light' : 'dark';
?>

<!doctype html>
<html lang="tr" data-bs-theme="<?= $theme ?>">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Profilim</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      background-color: var(--bs-body-bg);
      color: var(--bs-body-color);
    }
    .profile-card {
      max-width: 500px;
      width: 100%;
    }
    textarea {
      resize: none;
    }
  </style>
</head>
<body>

<div class="card profile-card shadow-sm border rounded-4">
  <div class="card-header bg-primary text-white text-center fw-semibold">
    Profilim
  </div>
  <div class="card-body">
    <h5 class="text-center fw-bold text-warning"><?= session('kullanici_adi') ?></h5>
    <h6 class="text-center text-muted mb-3"><?= session('eposta') ?></h6>

    <?php if (get('islem') == 'true'): ?>
      <div class="alert alert-success py-2 small text-center">İşlem başarılı</div>
    <?php elseif (get('islem') == 'false'): ?>
      <div class="alert alert-danger py-2 small text-center">İşlem başarısız</div>
    <?php endif; ?>

    <form action="islem.php?islem=hakkimda" method="post">
      <div class="mb-3">
        <label for="hakkimda" class="form-label text-success">Hakkımda</label>
        <textarea name="hakkimda" id="hakkimda" class="form-control" rows="5"><?= htmlspecialchars_decode($hakkimda) ?></textarea>
      </div>
      <div class="d-grid">
        <button type="submit" class="btn btn-primary">Kaydet</button>
      </div>
    </form>

    <div class="d-grid mt-3">
      <a href="islem.php?islem=cikis" class="btn btn-outline-danger">Oturumu Kapat</a>
    </div>
  </div>

  <div class="card-footer d-flex justify-content-between px-3 py-2">
    <a href="islem.php?islem=renk&color=bg-light" class="btn btn-sm btn-outline-secondary w-100 me-1 <?= $theme === 'light' ? 'disabled' : '' ?>">☀️ Light Mod</a>
    <a href="islem.php?islem=renk&color=bg-dark" class="btn btn-sm btn-outline-secondary w-100 ms-1 <?= $theme === 'dark' ? 'disabled' : '' ?>">🌙 Dark Mod</a>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
