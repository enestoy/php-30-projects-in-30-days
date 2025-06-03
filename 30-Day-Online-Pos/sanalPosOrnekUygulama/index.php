<?php session_start(); include("fonksiyon/fonksiyon.php"); $sepet = new sepet; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<script src="dosya/jqu.js"></script>
<link rel="stylesheet" href="dosya/boost.css" >
<title>SANAL POS- ÖRNEK UYGULAMA</title>
</head>
<body>

<div class="container text-center">


<?php 

switch (@$_GET["islem"]):

case "sepeteat":
			
			@$urunid=$_GET["id"];		
			
			$urunbilgileri=$sepet->urunbak($baglan,$urunid);			
			
			
			if ($urunid!="" || isset($urunid) || is_numeric($urunid)) :			
			// $adet=1; // formdan geldiğini varsay
			setcookie("urun[".$urunid."][ad]",$urunbilgileri["urunad"],time() + 60*60*24,"/");
			setcookie("urun[".$urunid."][adet]",1,time() + 60*60*24,"/");
			setcookie("urun[".$urunid."][birim]",$urunbilgileri["fiyat"],time() + 60*60*24,"/");			
			
			echo '<div class="alert alert-success mt-5">ÜRÜN SEPETE EKLENDİ</div>';
			header("Refresh:2; url='index.php'");
			
			endif;



break;


default:

?>


            <div class="row mt-5 text-center baslikbar bg-dark" > 
			
            <div class="col-md-12 pt-2 text-right p-2" >           
 
 <a href="sepet.php" class="text-dark"> Sepetinizde <span class="badge badge-dark">
 <?php echo isset($_COOKIE["urun"]) && is_array($_COOKIE["urun"]) ? count($_COOKIE["urun"]) : 0; ?>
</span> ürün bulunmaktadır.</a>
          
            </div>
            
            
            <div class="col-md-12 text-center bg-white">
            	<div class="row">             
              
				<?php 	$sepet->urunler($baglan);	?>
				
                </div>
                
            
            
            
            </div>
            
            </div>
            
     <?php       
	
endswitch;
?>
    

 


</div>

</body>
</html>