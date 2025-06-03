<?php  session_start(); include("smsclass.php"); $im  = new IMVerify(); 


?>

<!DOCTYPE html>
<html lang="tr">
<head>
	<title>DOĞRULAMA KODUNU GİRİNİZ</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
			<?php
			if (isset($_GET["islem"]) && $_GET["islem"]=="ok"):
			
				
				if($im->checkIsValid($_POST['dogkod'])) { // Kullanicinin forma yazdigi dogrulama kodu
					echo "KOD BAŞARILI";
				} else {
					echo "KOD HATALI";
				}
			else:		
			
			?>
			
				<form class="login100-form validate-form" method="post" action="ikinci.php?islem=ok">
					<span class="login100-form-title p-b-49">
					<?php
					
					if (isset($_POST['telefon'])):  
							if (!$im->send($_POST['telefon'])):  // sms gönderiyoruz
							echo "HATA OLUŞTU";
							endif;
							
					else:
					header("Location:index.php");
					endif;
					
					

					
					?>
					
						DOĞRULAMA KODU KONTROLÜ
					</span>

					<div class="wrap-input100 validate-input m-b-23" data-validate = "Doğrulama Kodu zorunludur">
						<span class="label-input100">Doğrulama Kodu</span>
						<input class="input100" type="text" name="dogkod" placeholder="Doğrulama Kodunu giriniz">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>
					
										

					
					<div class="container-login100-form-btn mt-3">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							
							
							<button class="login100-form-btn" type="submit">
								Tamam
							</button>
						</div>
					</div>

					

				</form>
				
					<form  method="post" action="ikinci.php">
						<input  type="hidden" name="telefon" value="<?php  echo $_POST['telefon']; ?>">
						<input class="btn btn-dark mt-3"  type="submit" name="btn" value="Tekrar Gönder">				
					
					</form>
				<?php 
				endif;				
				?>
				
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>