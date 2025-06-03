<?php
require 'database.php';

?>
<!doctype html>
<html lang="tr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Arama Sayfası</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f2f5;
            font-family: 'Segoe UI', sans-serif;
        }
        .search-wrapper {
            max-width: 600px;
            margin: 80px auto;
        }
        .card {
            border: none;
            border-radius: 1rem;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
        }
        .btn-wide {
            padding: 10px 50px;
        }
        .result-box {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
        }
    </style>
</head>

<body>

<div class="container search-wrapper">
    <div class="card p-4">
        <h4 class="text-center mb-4">Kelime ile Arama</h4>
        <form action="" method="post">
            <div class="mb-3">
                <input type="text" name="kelime" class="form-control form-control-lg" placeholder="Bir kelime yazın..." required>
            </div>
            <div class="d-grid mb-2">
                <button type="submit" class="btn btn-primary btn-lg btn-wide">Arama Yap</button>
            </div>
            <div class="d-grid">
                <a href="index.php" class="btn btn-outline-secondary btn-sm">🔙 Anasayfaya Dön</a>
            </div>
        </form>

        <?php
        if(isset($_POST["kelime"])){
            $GelenKelime = Filtre($_POST["kelime"]);
            $Sorgu = $db->prepare("SELECT * FROM esya WHERE isim LIKE :kelime");
            $Sorgu->execute([':kelime' => "%$GelenKelime%"]);
            $KayitSayisi = $Sorgu->rowCount();
            $Kayitlar = $Sorgu->fetchAll(PDO::FETCH_ASSOC);

            echo '<div class="result-box mt-4">';
            if($KayitSayisi > 0){
                echo "<strong>Bulunan Kayıtlar:</strong><ul>";
                foreach($Kayitlar as $Kayit){
                    echo "<li>" . htmlspecialchars($Kayit["isim"]) . "</li>";
                }
                echo "</ul>";
            } else {
                echo '<div class="alert alert-warning">Aradığınız içerikte bir kayıt bulunamadı.</div>';
            }
            echo '</div>';
        }
        ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
