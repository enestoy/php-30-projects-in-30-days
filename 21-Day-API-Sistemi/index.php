<?php
function apisistemi($hizmet, $token, $ciktituru, $resim = false)
{
    $deger = array("token" => $token);
    if ($resim) {
        $deger["resimad"] = $resim;
    }

    $oturum = curl_init("https://localhost/education/udemyphp/api/temel/apiSistem/api.php?islem=" . $hizmet);
    curl_setopt_array($oturum, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_SSL_VERIFYHOST => false, //Localhost
        CURLOPT_SSL_VERIFYPEER => false, //Localhost
        CURLOPT_POSTFIELDS => json_encode($deger)
    ]);
    $cikti = curl_exec($oturum);
    curl_close($oturum);

    return json_decode($cikti, $ciktituru);
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>API Arayüzü</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f7f9fc;
        }
        .navbar-custom {
            background-color: #343a40;
        }
        .navbar-custom a {
            margin: 5px;
        }
        .card {
            margin-top: 20px;
        }
        img {
            margin: 10px;
            border-radius: 10px;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>

<div class="container">
    <nav class="navbar navbar-dark navbar-custom rounded p-3 text-center">
        <a href="index.php?hizmet=bilgi" class="btn btn-warning"><i class="fas fa-info-circle"></i> Bilgi</a>
        <a href="index.php?hizmet=hava" class="btn btn-warning"><i class="fas fa-cloud-sun"></i> Hava Durumu</a>
        <a href="index.php?hizmet=resim" class="btn btn-warning"><i class="fas fa-image"></i> Resim</a>
        <a href="index.php?hizmet=durum" class="btn btn-warning"><i class="fas fa-chart-line"></i> Durum Sorgula</a>
    </nav>

    <div class="card shadow">
        <div class="card-body">
            <?php
            switch (@$_GET["hizmet"]) {
                case "bilgi":
                    $al = apisistemi("bilgi", "4mE1p38Rg9ft1koT6yH", false);
                    echo isset($al->hata) ? "<p class='text-danger'>{$al->hata}<br>{$al->durum}</p>" : "<h5>{$al->Ad}</h5>";
                    break;

                case "hava":
                    $al = apisistemi("hava", "4mE1p38Rg9ft1koT6yH", false);
                    if (!isset($al->hata)) {
                        foreach ($al as $sehir => $veri) {
                            echo "<div class='mb-3'><strong>Şehir:</strong> $sehir<br>
                                  <strong>Bugün:</strong> {$veri->Bugün}<br>
                                  <strong>Dün:</strong> {$veri->Dün}</div><hr>";
                        }
                    } else {
                        echo "<p class='text-danger'>{$al->hata}<br>{$al->durum}</p>";
                    }
                    break;

                case "resim":
                    echo '<h5 class="mb-3">🔍 Resim Ara</h5>';
                    ?>
                    <form action="<?php echo $_SERVER['PHP_SELF'] . '?hizmet=resim'; ?>" method="post" class="mb-3">
                        <input type="text" name="resimad" class="form-control w-50 mx-auto" placeholder="Örn: araba">
                        <div class="text-center mt-3">
                            <input type="submit" value="Ara" class="btn btn-success">
                        </div>
                    </form>
                    <?php
                    if ($_POST) {
                        $al = apisistemi("resim", "4mE1p38Rg9ft1koT6yH", false, $_POST["resimad"]);
                        if (!isset($al->hata)) {
                            echo "<div class='text-center'>";
                            foreach ($al as $resim) {
                                echo '<img src="https://localhost/education/udemyphp/api/temel/apiSistem/' . $resim . '" width="200" height="200">';
                            }
                            echo "</div>";
                        } else {
                            echo "<p class='text-danger'>{$al->hata}<br>{$al->durum}</p>";
                        }
                    }
                    break;

                case "durum":
                    $al = apisistemi("tokenbilgiver", "4mE1p38Rg9ft1koT6yH", false);
                    if (!isset($al->hata)) {
                        echo "<ul class='list-group list-group-flush'>
                            <li class='list-group-item'>🔢 Günlük Limit: <strong>{$al->Gunluk_limit}</strong></li>
                            <li class='list-group-item'>📊 Mevcut Sorgu: <strong>{$al->Mevcut_sorgu}</strong></li>
                            <li class='list-group-item'>🖼️ Resim Limiti: <strong>{$al->Resim_limit}</strong></li>
                        </ul>";
                    } else {
                        echo "<p class='text-danger'>{$al->hata}<br>{$al->durum}</p>";
                    }
                    break;

                default:
                    echo "<p class='text-muted'>Lütfen yukarıdaki butonlardan birini seçin.</p>";
            }
            ?>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
