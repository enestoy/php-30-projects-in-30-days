<?php
require_once 'Filigran.php';

$filigran = new Filigran();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['userImage'])) {
    $filigran->yukleVeFiligranEkle($_FILES['userImage']);
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Filigran Ekleyici</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f4f7fc; }
        .form-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 30px;
            height: 100%;
        }
        .image-container img {
            max-width: 100%;
            border-radius: 8px;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <?php if ($filigran->resimYuklendi): ?>
        <div class="alert alert-success text-center mx-auto w-50">
            Dosya başarıyla yüklendi!
        </div>

        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card">
                    <img src="<?= $filigran->outputFilePath ?>" class="card-img-top" alt="Filigranlı Resim">
                    <div class="card-body text-center">
                        <a href="<?= $filigran->outputFilePath ?>" class="btn btn-primary" target="_blank">Filigranlı Görseli Görüntüle</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-container">
                    <h2 class="text-center mb-4">Yeni Resim Yükle</h2>
                    <form class="text-center" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="userImage" class="form-label fw-bold">Resim Yükleyin:</label>
                            <input type="file" name="userImage" id="userImage" accept="image/jpeg, image/png" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-success">Filigran Ekle</button>
                    </form>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="d-flex justify-content-center align-items-center min-vh-100 py-5">
            <div class="form-container col-md-6">
                <h2 class="text-center mb-4">Filigran Ekleme</h2>
                <form class="text-center" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="userImage" class="form-label fw-bold">Resim Yükleyin:</label>
                        <input type="file" name="userImage" id="userImage" accept="image/jpeg, image/png" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-success">Filigran Ekle</button>
                </form>
            </div>
        </div>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
