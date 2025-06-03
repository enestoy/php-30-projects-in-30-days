<?php
require 'database.php';
$GelenID = Filtrele($_GET["id"]);
$HitGuncelle = $db->prepare("UPDATE makaleler SET gosterim_sayisi=gosterim_sayisi+1 WHERE id=?");
$HitGuncelle->execute([$GelenID]);
?>

<!doctype html>
<html lang="tr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Makale Detay</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .header {
      background-color: #0d6efd;
      color: white;
      padding: 20px;
      border-radius: 10px;
      margin-bottom: 30px;
    }
    .card {
      border: none;
      box-shadow: 0 0 12px rgba(0, 0, 0, 0.05);
      border-radius: 12px;
    }
    .card-title {
      font-size: 1.8rem;
      font-weight: bold;
    }
    .card-text {
      font-size: 1.1rem;
      color: #343a40;
    }
  </style>
</head>

<body>
  <div class="container py-4">
    <div class="header text-center">
      <h2>📖 Makale Detayı</h2>
      <a href="index.php" class="btn btn-light mt-2">Ana Sayfa</a>
    </div>

    <?php
    $Sorgu = $db->prepare("SELECT * FROM makaleler WHERE id=?");
    $Sorgu->execute([$GelenID]);
    $KayitSayisi = $Sorgu->rowCount();
    $Kayit = $Sorgu->fetch(PDO::FETCH_ASSOC);
    if ($KayitSayisi > 0) {
    ?>
      <div class="card p-4 mb-4">
        <div class="card-body">
          <h1 class="card-title mb-3"><?php echo htmlspecialchars($Kayit["makale_baslik"]); ?></h1>
          <p class="card-text mb-4"><?php echo nl2br(htmlspecialchars($Kayit["makale_icerik"])); ?></p>
          <p class="text-muted">👁️ <?php echo $Kayit["gosterim_sayisi"]; ?> defa görüntülendi.</p>
        </div>
      </div>
    <?php
    } else {
      echo '<div class="alert alert-danger text-center">Makale bulunamadı.</div>';
      header("Refresh: 2; url=index.php");
    }
    ?>

  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php
$db = null;
?>
