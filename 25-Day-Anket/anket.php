<?php 

include_once("dahil.php"); 
$anket = new anketana;

// Geçerli aksiyon kontrolü
$gecerli_aksiyonlar = ['oyver'];
$aksiyon = isset($_GET['aksiyon']) && in_array($_GET['aksiyon'], $gecerli_aksiyonlar) ? $_GET['aksiyon'] : '';
?>
<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <title>Anket Uygulaması</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

  <!-- jQuery ve Popper.js (Bootstrap için gerekli) -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

  <style>
    #ana {
      background-color: #F6F6F6;
      text-align: center;
      border: 1px solid #E4E4E4;
      padding: 20px;
      margin-top: 30px;
    }
    #r {
      background-color: #FEFEFE;
      text-align: center;
      padding: 10px;
      margin: 5px;
    }
  </style>
</head>
<body>

<div class="container" id="ana">
  <div class="row">
    <div class="col-md-4"></div>

    <div class="col-md-4 table-bordered rounded" id="r">
      <?php 
        switch ($aksiyon):
          case "oyver":
            $anket->oyver($veritabani);
            break;
          default:
            $anket->anketal($veritabani);
        endswitch;
      ?>
    </div>

    <div class="col-md-4"></div>
  </div>
</div>

</body>
</html>
