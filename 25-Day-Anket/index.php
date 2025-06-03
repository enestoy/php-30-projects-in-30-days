<?php 

include_once("dahil.php"); 
$sinif = new anketana; 
?>
<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Anket Uygulaması</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
    }
    #ana {
      background-color: #f6f6f6;
      border: 1px solid #e4e4e4;
      padding: 20px;
      margin-top: 50px;
      border-radius: 10px;
    }
    #r {
      background-color: #fff;
      padding: 20px;
      margin: 10px 0;
      border-radius: 10px;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
  </style>
</head>
<body>

<div class="container" id="ana">
  <div class="row justify-content-center">
    <div class="col-md-6" id="r">
      
      <?php 
      @$islem = $_GET["islem"];
      switch ($islem):
      
      case "kontrol":
        $sinif->giriskontrol($veritabani);
        break;

      default:
        if (@$_SESSION["giris"] == ""):
      ?>

      <h4 class="mb-4">Anket Girişi</h4>
      <form action="index.php?islem=kontrol" method="post">
        <div class="mb-3">
          <label for="sifre" class="form-label">Anketin Şifresi</label>
          <input type="text" name="sifre" id="sifre" class="form-control" required>
        </div>
        <button type="submit" name="buton" class="btn btn-primary w-100">Getir</button>
      </form>

      <?php 
        else:
          echo "<div class='alert alert-success'>Yönlendiriliyorsunuz...</div>";
          header("refresh:3;url=anket.php");
        endif;
        endswitch;
      ?>

    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
