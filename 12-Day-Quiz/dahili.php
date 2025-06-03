<?php

// MySQL bağlantısı
try {
    $db = new PDO("mysql:host=localhost;dbname=education;charset=utf8", "root", "");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Veritabanı bağlantı hatası: " . $e->getMessage());
}

function sorulargetir($baglan)
{
    echo '<h4>QUİZ 1</h4>';
    echo '<form action="index.php?islem=sonuc" method="post">';

    $query = "SELECT * FROM sorular";
    $stmt = $baglan->query($query);

    foreach ($stmt as $row) {
        echo '<div class="row mb-2 p-2 bg-light border rounded">';
        echo '<div class="col-12 fw-bold">' . htmlspecialchars($row["soru"]) . '</div>';
        
        for ($i = 1; $i <= 4; $i++) {
            echo '<div class="col-md-6 mt-2">';
            echo '<input type="radio" name="cevap' . $row["id"] . '" value="' . htmlspecialchars($row['cevap' . $i]) . '" /> ' . htmlspecialchars($row['cevap' . $i]);
            echo '</div>';
        }

        echo '<input type="hidden" name="id' . $row["id"] . '" value="' . $row["id"] . '" />';
        echo '</div>';
    }

    echo '<input type="submit" name="buton" value="CEVAPLA" class="btn btn-success mt-3" />';
    echo '</form>';
}

function sonuc($veri)
{
    echo '<h4>SONUÇLAR</h4>';

    if (!isset($_POST["buton"])) {
        echo "Hata: Form gönderilmedi.";
        return;
    }

    $stmt = $veri->query("SELECT * FROM sorular");
    $hata = 0;

    foreach ($stmt as $soru) {
        $id = $_POST['id' . $soru['id']] ?? null;
        $cevap = $_POST['cevap' . $soru['id']] ?? null;

        if (!$id || !$cevap) continue;

        $dogruCevap = $soru['dc'];

        if ($cevap !== $dogruCevap) {
            $hata++;
            echo '<div class="row p-2 bg-warning-subtle border rounded mb-2">';
            echo '<div class="col-md-4">Soru No: ' . $soru['id'] . '</div>';
            echo '<div class="col-md-4 text-danger">Verdiğin Cevap: ' . htmlspecialchars($cevap) . '</div>';
            echo '<div class="col-md-4 text-success">Doğru Cevap: ' . htmlspecialchars($dogruCevap) . '</div>';
            echo '</div>';
        }
    }

    if ($hata === 0) {
        echo '<div class="alert alert-success text-center">SANA HELAL OLSUN TEBRİK EDERİM.</div>';
    } else {
        $basari = 5 * (20 - $hata);
        echo '<div class="row p-3 bg-light border rounded text-center">';
        echo '<div class="col-md-6 text-danger">Hatalı Cevap Sayısı: ' . $hata . '</div>';
        echo '<div class="col-md-6 fw-bold">Başarı Oranı: %' . $basari . '</div>';
        echo '</div>';
    }
}

function giris()
{
    echo '<form action="index.php?islem=tanimla" method="post">';
    echo '<div class="row bg-light p-4 border rounded text-center">';
    echo '<div class="col-12 fw-bold mb-2">QUİZ 1 GİRİŞ</div>';
    echo '<div class="col-12 mb-3"><input type="text" name="giris" class="form-control" placeholder="Şifre Yaz" required></div>';
    echo '<div class="col-12"><input type="submit" name="buton" value="BAŞLA" class="btn btn-success"></div>';
    echo '</div>';
    echo '</form>';
}

function giriskontrol($veri)
{
    if (!isset($_POST["buton"])) return;

    $girisveri = htmlspecialchars($_POST["giris"] ?? '');

    if ($girisveri === '') {
        echo "Boş bilgi girişi";
        return;
    }

    $stmt = $veri->query("SELECT * FROM giris LIMIT 1");
    $kullanici = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($girisveri === $kullanici['pas']) {
        $_SESSION["izin"] = "ok";
        echo "<div class='alert alert-success'>Oturum Başlatıldı. Yönlendiriliyorsunuz...</div>";
        header("refresh:2;url=index.php");
    } else {
        echo "<div class='alert alert-danger'>Kod hatalı</div>";
    }
}

?>
