<?php
try {
    $baglanti = new PDO("mysql:host=localhost;dbname=education;charset=utf8", "root", "");
    $baglanti->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Veritabanı bağlantı hatası: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Veri Aktarımı ve Zip</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <?php if ($_SERVER["REQUEST_METHOD"] === "POST"): ?>

        <?php
        $sorgu = $baglanti->prepare("SELECT * FROM yazilar");
        $sorgu->execute();

        $tumpaket = "";
        while ($row = $sorgu->fetch(PDO::FETCH_ASSOC)) {
            $tumpaket .= $row["baslik"] . " - " . $row["icerik"] . "\n\n";
        }

        if (!is_dir('db')) {
            mkdir('db', 0777, true);
        }

        $dosyaYolu = "db/veriler.txt";
        if (file_put_contents($dosyaYolu, $tumpaket)) {
            echo '<div class="alert alert-success">Veriler başarıyla aktarıldı.</div>';
        } else {
            echo '<div class="alert alert-danger">Veriler yazılamadı.</div>';
        }

        $zip = new ZipArchive();
        $zipDosya = "veriler.zip";

        if ($zip->open($zipDosya, ZipArchive::CREATE) === TRUE) {
            $zip->addFile($dosyaYolu, "veriler.txt");
            $zip->close();
            echo '<div class="alert alert-success">Zip arşivi başarıyla oluşturuldu.</div>';
        } else {
            echo '<div class="alert alert-danger">Zip arşivi oluşturulamadı.</div>';
        }
        ?>

        <div class="text-center mt-4">
            <a href="veriler.zip" class="btn btn-primary">ZIP Dosyasını İndir</a>
        </div>

    <?php else: ?>

        <div class="card mx-auto shadow p-4" style="max-width: 400px;">
            <h5 class="text-center mb-3">Verileri Aktar ve Zip'le</h5>
            <form method="post">
                <button type="submit" class="btn btn-success w-100">AKTAR</button>
            </form>
        </div>

    <?php endif; ?>
</div>

</body>
</html>
