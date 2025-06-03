<?php session_start();
include("fonksiyon/fonksiyon.php");
$sepet2 = new sepet;  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<script src="dosya/jqu.js"></script>
	<link rel="stylesheet" href="dosya/boost.css">
	<title>COOKİE VERSİYON - SEPET</title>

	<style>
		.sepetbaslik {
			display: flex;
			justify-content: space-between;
			align-items: center;
			background-color: #f8f9fa;
			border-radius: 6px;
		}

		.sepetbaslik span {
			font-weight: 700;
			font-size: 1.25rem;
		}

		.btn-group {
			gap: 10px;
		}
	</style>
</head>
<body>
	<div class="container text-center">


		<div class="row mb-3">
			<div class="col-12 sepetbaslik p-3">
				<span>SEPETİNİZDEKİ ÜRÜNLER</span>
				<div class="btn-group">
					<a href="sepet.php?is=bosalt" class="btn btn-dark btn-sm">Sepeti Boşalt</a>
					<a href="site.php" class="btn btn-dark btn-sm">Anasayfa</a>
				</div>
			</div>
		</div>


		<div class="col-xl-12 col-lg-12 col-md-12">

			<div class="row text-center font-weight-bold p-2">
				<div class="col-xl-2 col-lg-2 col-md-2">Ürün Adı</div>
				<div class="col-xl-2 col-lg-2 col-md-2">Ürün adet</div>
				<div class="col-xl-2 col-lg-2 col-md-2">Birim fiyat</div>
				<div class="col-xl-2 col-lg-2 col-md-2">Toplam fiyat</div>
				<div class="col-xl-2 col-lg-2 col-md-2">Güncelle</div>
				<div class="col-xl-2 col-lg-2 col-md-2">Sil</div>


			</div>


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
			<tbody>
				</table>
		</div>

	</div>
	</div>
</body>

</html>