<?php session_start(); include("fonksiyon/fonksiyon.php"); $sepet = new sepet; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />

<script src="dosya/jqu.js"></script>
<link rel="stylesheet" href="dosya/boost.css" >
<title>SEPETE EKLE COOKIE VERSİYONU</title>
<style>
  body {
    background-color: #f8f9fa;
  }
  .baslikbar {
    background-color: #343a40 !important; /* Bootstrap dark */
    color: white;
    border-radius: 8px;
  }
  .baslikbar a {
    color: #ffc107; /* Bootstrap warning yellow */
    text-decoration: none;
    font-weight: 600;
  }
  .baslikbar a:hover {
    color: #e0a800;
    text-decoration: underline;
  }
  .urunler-container {
    margin-top: 30px;
  }
</style>
</head>
<body>

<div class="container-lg text-center mt-5">

<?php 

switch (@$_GET["islem"]):

case "sepeteat":
			
	@$urunid=$_GET["id"];		
			
	$urunbilgileri=$sepet->urunbak($baglan,$urunid);
			
	if ($urunid !== "" && isset($urunid) && is_numeric($urunid)) :			
		setcookie("urun[".$urunid."][ad]",$urunbilgileri["urunad"],time() + 60*60*24,"/");
		setcookie("urun[".$urunid."][adet]",1,time() + 60*60*24,"/");
		setcookie("urun[".$urunid."][birim]",$urunbilgileri["fiyat"],time() + 60*60*24,"/");			
			
		echo '<div class="alert alert-success mt-5" role="alert">ÜRÜN SEPETE EKLENDİ</div>';
		header("Refresh:2; url='site.php'");
	endif;

break;

default:

?>

<div class="row baslikbar p-3 align-items-center">
  <div class="col-md-8 text-start">
    <a href="sepet.php" class="h5 text-info">Sepetinizde <span class="badge bg-warning text-dark">
      <?php 
        echo isset($_COOKIE["urun"]) && is_array($_COOKIE["urun"]) ? count($_COOKIE["urun"]) : 0; 
      ?> ürün bulunmaktadır.
    </span></a>
  </div>
</div>

<div class="urunler-container bg-white rounded shadow-sm p-4 mt-4">
  <div class="row">
    <?php $sepet->urunler($baglan); ?>
  </div>
</div>

<?php       
endswitch;
?>

</div>

</body>
</html>
