<?php
// ZipArchive - Toplu dosya/resim yükleme ve çıkarma
$mesaj = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['zipdosyam'])) {
    $kaynak = $_FILES["zipdosyam"]["tmp_name"];
    $dosyaAdi = $_FILES["zipdosyam"]["name"];
    $tur = $_FILES["zipdosyam"]["type"];

    $izinverilenFormatlar = [
        'application/zip',
        'application/x-zip-compressed',
        'multipart/x-zip',
        'application/x-compressed'
    ];

    if (!in_array($tur, $izinverilenFormatlar)) {
        $mesaj = '<div class="alert alert-danger">Yüklenen dosya ZIP formatında değil.</div>';
    } else {
        $zip = new ZipArchive();
        if ($zip->open($kaynak)) {
            if (!is_dir("form")) {
                mkdir("form", 0777, true);
            }

            $zip->extractTo("form/");
            $zip->close();
            $mesaj = '<div class="alert alert-success">Dosya başarıyla yüklendi ve çıkarıldı.</div>';
        } else {
            $mesaj = '<div class="alert alert-warning">ZIP dosyası açılamadı.</div>';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>ZipArchive - Toplu Yükleme</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <?= $mesaj ?>

    <div class="card shadow-sm mx-auto" style="max-width: 500px;">
        <div class="card-body">
            <h5 class="card-title text-center mb-4">ZIP Dosyası Yükle</h5>
            <form method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <input type="file" name="zipdosyam" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">YÜKLE</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>
