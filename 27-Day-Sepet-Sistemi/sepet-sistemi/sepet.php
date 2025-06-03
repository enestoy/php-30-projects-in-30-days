<?php include("fonksiyon/fonksiyon.php"); $sepet2 = new sepet; ?>
<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <title>SEPET</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <script src="dosya/jqu.js"></script>
  <link rel="stylesheet" href="dosya/boost.css">

  <style>
    body {
      background-color: #f8f9fa;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .cart-container {
      margin-top: 50px;
      background: #fff;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 3px 10px rgba(0,0,0,0.1);
    }

    h3.text-danger {
      font-weight: bold;
    }

    .cart-actions a {
      font-weight: 600;
      color: #dc3545;
      text-decoration: none;
    }

    .cart-actions a:hover {
      text-decoration: underline;
    }

    table thead th {
      background-color: #343a40;
      color: #fff;
      vertical-align: middle;
    }

    .btn-update, .btn-delete {
      font-size: 14px;
      padding: 5px 10px;
    }

    .btn-update {
      background-color: #ffc107;
      color: #000;
    }

    .btn-delete {
      background-color: #dc3545;
      color: #fff;
    }

    .btn-update:hover {
      background-color: #e0a800;
    }

    .btn-delete:hover {
      background-color: #c82333;
    }
  </style>
</head>
<body>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10 cart-container text-center">
    
      <h3 class="text-danger mb-3">SEPETİNİZ</h3>
      <div class="cart-actions mb-3">
        <a href="sepet.php?is=bosalt">🗑 Sepeti Boşalt</a>
        <a href="site.php" class="text-primary"> || Anasayfa</a>
      </div>
      <hr />

      <div class="table-responsive">
        <table class="table table-striped table-bordered align-middle">
          <thead>
            <tr>
              <th scope="col">Ürün Adı</th>
              <th scope="col">Adet</th>
              <th scope="col">Birim Fiyat</th>
              <th scope="col">Toplam Fiyat</th>
              <th scope="col">Güncelle</th>
              <th scope="col">Sil</th>
            </tr>
          </thead>
          <tbody>
          <?php 
            @$is = $_GET["is"];

            switch ($is):
              case "sil":
                $sepet2->sil($baglan);
                break;

              case "guncelle":
                $sepet2->guncelle($baglan);
                break;

              case "bosalt":
                $sepet2->sepetbosalt($baglan);
                break;

              case "tamamla":
                $sepet2->siptamamla($baglan);
                break;

              default:
                $sepet2->urunlergetir($baglan);
            endswitch;
          ?>
          </tbody>
        </table>
      </div>

    </div>
  </div>
</div>

</body>
</html>
