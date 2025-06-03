<?php require 'database.php'; ?>
<!doctype html>
<html lang="tr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Görüntüleme ve Hit Uygulaması</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f0f2f5;
    }
    .header {
      background-color: #0d6efd;
      color: white;
      padding: 20px;
      border-radius: 10px;
      margin-bottom: 30px;
    }
    .article-card {
      transition: transform 0.2s, box-shadow 0.2s;
    }
    .article-card:hover {
      transform: translateY(-3px);
      box-shadow: 0 0 15px rgba(0,0,0,0.1);
    }
  </style>
</head>

<body>
  <div class="container py-4">
    <div class="header text-center">
      <h2>📖 Görüntüleme ve Hit Uygulaması</h2>
      <a href="index.php" class="btn btn-light mt-2">Ana Sayfa</a>
    </div>

    <div class="row">
      <?php
      $Sorgu = $db->prepare("SELECT * FROM makaleler ORDER BY gosterim_sayisi DESC");
      $Sorgu->execute();
      $KayitSayisi = $Sorgu->rowCount();
      $Kayitlar = $Sorgu->fetchAll(PDO::FETCH_ASSOC);
      if ($KayitSayisi > 0) {
        foreach ($Kayitlar as $Satirlar) {
      ?>
          <div class="col-md-6 col-lg-4 mb-4">
            <div class="card article-card h-100 shadow-sm">
              <div class="card-body">
                <h5 class="card-title">
                  <a href="read.php?id=<?php echo $Satirlar["id"]; ?>" class="text-decoration-none text-primary">
                    <?php echo htmlspecialchars($Satirlar["makale_baslik"]); ?>
                  </a>
                </h5>
                <p class="card-text text-muted">
                  👁️ <strong><?php echo $Satirlar["gosterim_sayisi"]; ?></strong> defa görüntülendi
                </p>
              </div>
            </div>
          </div>
      <?php
        }
      } else {
        echo '<div class="col-12"><div class="alert alert-warning text-center">Hiç makale bulunamadı.</div></div>';
      }
      ?>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php $db = null; ?>
