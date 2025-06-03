<?php include("fonksiyon/fonksiyon.php"); $sepet = new sepet; ?>
<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <title>WEB SİTE ARAYÜZ</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <script src="dosya/jqu.js"></script>
  <link rel="stylesheet" href="dosya/boost.css">

  <style>
    body {
      background-color: #f8f9fa;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .product-link {
      display: inline-block;
      width: 220px;
      height: 100px;
      line-height: 80px;
      font-size: 18px;
      color: #fff;
      background-color: #000;
      text-decoration: none;
      padding: 10px;
      border-radius: 12px;
      transition: all 0.3s ease;
      text-align: center;
      margin: 20px auto;
    }

    .product-link:hover {
      background-color: #f1f1f1;
      color: #000;
      box-shadow: 0 4px 8px rgba(0,0,0,0.2);
    }

    .cart-box {
      background-color: #fff;
      border: 1px solid #dee2e6;
      border-radius: 8px;
      margin-top: 40px;
      padding: 20px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.05);
    }

    .alert {
      margin-top: 20px;
    }

    .product-row {
      margin-top: 20px;
    }

    .cart-info {
      background-color: #ffc107;
      padding: 10px 20px;
      border-radius: 8px;
      display: inline-block;
      font-weight: 600;
    }

    .cart-info a {
      text-decoration: none;
      color: #212529;
    }

    .cart-info img {
      margin-right: 10px;
      vertical-align: middle;
    }
  </style>
</head>
<body>

<div class="container text-center">

<?php 

@$islem = $_GET["islem"];

switch ($islem):

case "sepeteat":

  @$urunid = $_GET["id"];

  if ($urunid != "" || isset($urunid) || is_numeric($urunid)) :

    $urunson = $sepet->urunbak($baglan, $urunid);			
    $urunad = $urunson["urunad"];
    $urunfiyat = $urunson["fiyat"];
    $adet = 1;
    $uyeid = 1;

    $ekle = $baglan->prepare("insert into anliksepet (uyeid,urunad,fiyat,adet) VALUES(?,?,?,?)");

    $ekle->bindParam(1, $uyeid, PDO::PARAM_INT);
    $ekle->bindParam(2, $urunad, PDO::PARAM_STR);
    $ekle->bindParam(3, $urunfiyat, PDO::PARAM_INT);
    $ekle->bindParam(4, $adet, PDO::PARAM_STR);
    $ekle->execute();

    echo '<div class="alert alert-success text-center">ÜRÜN EKLENDİ</div>';

    header("refresh:2, url=site.php");

  endif;

break;

default:
?>

  <div class="row justify-content-center">
    <div class="col-md-10 cart-box">

      <div class="mb-4">
        <div class="cart-info">
          <img src="res/free-add-to-cart-buttons-png-6.png" width="30" height="30" />
          <a href="sepet.php" class="text-primary">Sepetinizde <span class="badge bg-light">
            <?php echo $sepet->sepetsayi($baglan); ?>
          </span> ürün bulunmaktadır.</a>
        </div>
      </div>

      <div class="product-row">
        <div class="row justify-content-center">
          <?php 
            $sepet->urunler($baglan);
          ?>
        </div>
      </div>

    </div>
  </div>

<?php
endswitch;
?>

</div>

</body>
</html>
