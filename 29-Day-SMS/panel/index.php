<?php require_once("assets/fonk/helper.php");
$sms = new Phpsms;
$genelislem = new genelislemler; // sınıfımızı dahil ettim bu sınıf bizim tüm sms işlemlerimizi yapacak 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta charset="utf-8">

	<title>PHP SMS İŞLEMLERİ-Yönetim Paneli</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/themify-icons.css">
	<link rel="stylesheet" href="assets/css/metisMenu.css">
	<link rel="stylesheet" href="assets/css/owl.carousel.min.css">
	<link rel="stylesheet" href="assets/css/slicknav.min.css">
	<link rel="stylesheet" href="assets/css/typography.css">
	<link rel="stylesheet" href="assets/css/default-css.css">
	<link rel="stylesheet" href="assets/css/styles.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
	<script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

	<script>
		$(document).ready(function() {


			$(".sabloncerceve").hide();
			$(".grupcerceve").hide();
			$(".sablongetir").click(function() {

				$(".sabloncerceve").toggle();

			});



			$(".grupgetir").click(function() {

				$(".grupcerceve").toggle();

			});


			$("select[name='sablonlar']").on('change', function() {

				$("textarea[name='mesaj']").val("");
				$("textarea[name='mesaj']").val($("select[name='sablonlar'] option:selected").text());
				$(".sabloncerceve").hide();

			});


			$("select[name='gruplar']").on('change', function() {

				var gelenid = $(this).val();

				$.post("assets/fonk/helper.php?islem=grupcek", {
					"grupid": gelenid
				}, function(gelen_cevap) {

					//$("textarea[name='numaralar']").val("");
					//$("textarea[name='numaralar']").val(gelen_cevap); // tekli grup seçme
					$("textarea[name='numaralar']").append(gelen_cevap); // çoklu grup seçme
					$(".grupcerceve").hide();
				});



			});

		});
	</script>
	<style>
		.sabloncerceve {
			width: 200px;
			height: 100px;
			background: rgb(75, 86, 231);
			background: linear-gradient(90deg, rgba(75, 86, 231, 1) 0%, rgba(76, 160, 204, 1) 100%);
			border-radius: 5px;
			border: 1px solid #446DB4;
			position: absolute;
			top: 50%;
			left: 50%;
			margin-top: -50px;
			margin-left: -100px;
			z-index: 1;

		}

		.sablongetir:hover {
			cursor: pointer;
		}

		.grupcerceve {
			width: 200px;
			height: 100px;
			background: rgb(231, 75, 220);
			background: linear-gradient(90deg, rgba(231, 75, 220, 1) 0%, rgba(204, 76, 128, 1) 100%);
			border-radius: 5px;
			border: 1px solid #446DB4;
			position: absolute;
			top: 50%;
			left: 50%;
			margin-top: -50px;
			margin-left: -100px;
			z-index: 1;

		}

		.grupgetir:hover {
			cursor: pointer;
		}
	</style>


</head>

<body>


	<!-- page container area start -->
	<div class="page-container">
		<!-- sidebar menu area start -->
		<div class="sidebar-menu">
			<div class="sidebar-header">
				<div class="logo">
					<a href="index.php"><img src="assets/images/logo/logo.png" alt="logo"></a><kbd class="bakiyeiskelet"><?php $sms->bakiyekontrol(); ?> </kbd>
				</div>
			</div>
			<div class="main-menu">
				<div class="menu-inner">
					<nav>
						<ul class="metismenu" id="menu">
							<li><a href="index.php?islem=smsgonder"><i class="ti-signal"></i> <span>SMS GÖNDER</span></a></li>
							<li><a href="index.php?islem=numaralar"><i class="ti-tablet"></i> <span>NUMARALAR</span></a></li>
							<li><a href="index.php?islem=ayarlar"><i class="ti-settings"></i> <span>APİ AYARLARI</span></a></li>

						</ul>
					</nav>
				</div>
			</div>
		</div>
		<!-- sidebar menu area end -->
		<!-- main content area start -->
		<div class="main-content">
			<!-- header area start -->
			<div class="header-area">
				<div class="row align-items-center">
					<!-- nav and search button -->
					<div class="col-md-6 col-sm-8 clearfix">
						<div class="nav-btn pull-left">
							<span></span>
							<span></span>
							<span></span>
						</div>

					</div>
					<!-- profile info & task notification -->

				</div>
			</div>
			<!-- header area end -->
			<!-- page title area start -->

			<!-- page title area end -->
			<div class="main-content-inner">
				<!-- sales report area start -->
				<div class="row">
					<div class="col-lg-12 mt-5 bg-white text-center" style="min-height:500px;">



						<?php


						switch (@$_GET["islem"]):

							case "smsgonder":
								echo '<div class="row">
							<div class="col-lg-6 mt-2 anaiskelet mx-auto">';

								if ($_POST) :
									echo '<div class="row">		 
							<div class="col-lg-12 mt-1">';


									$mesaj = htmlspecialchars(strip_tags($_POST["mesaj"]));
									$numaralar = htmlspecialchars(strip_tags($_POST["numaralar"]));

									/*$dizi=explode(",",$numaralar);
							print_r($dizi);*/ // bu virgüllü hali

									$dizi = explode("\r", $numaralar);


									foreach ($dizi as $numara):

										if (!$sms->send($mesaj, $numara)):

											echo "Bu numaraya : " . $numara . " gönderilemedi";


										endif;



									endforeach;

									echo '<div class="alert alert-warning">SMSLER GÖNDERİLDİ</div>';




									echo '</div>
							</div>';

								else:
						?>
									<div class="row">
										<div class="col-lg-12 baslik">
											<h3>SMS GÖNDER</h3>
										</div>

										<div class="col-lg-12 mt-1">
											<div class="row">
												<div class="col-lg-6 col-form-label-lg">Sms Başlığı </div>
												<div class="col-lg-6">
													<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
														<input type="text" name="baslik" class="form-control" readonly value="<?php echo $sms->IM_SENDER; ?>">
												</div>

											</div>
										</div>

										<div class="col-lg-12 mt-1 col-form-label-lg"> Mesaj <span class="sablongetir float-right col-form-label-sm text-primary ">Şablon Seç</span></div>

										<div class="sabloncerceve"><span class="font-weight-bold">Şablonlar</span>
											<?php $genelislem->hizliislemler($baglanti, "sablonlar"); ?></div>
										<div class="col-lg-12 mt-1 "> <textarea class="form-control" name="mesaj" rows="5" placeholder="Mesajınızı Yazınız" required></textarea></div>

										<div class="col-lg-12 mt-1 col-form-label-lg">Numaralar <span class="grupgetir float-right col-form-label-sm text-primary ">Grup Seç</span></div>
										<div class="grupcerceve"><span class="font-weight-bold">Gruplar </span><?php $genelislem->hizliislemler($baglanti, "gruplar"); ?></div>
										<div class="col-lg-12 mt-1 "> <textarea class="form-control" name="numaralar" rows="5" placeholder="Numaraları satır satır yazınız" required></textarea></div>

										<div class="col-lg-12 mt-1">
											<input type="submit" name="btn" value="GÖNDER" class="btn btn-success mt-2 mb-2">
											</form>
										</div>

									</div>

								<?php
								endif;
								?>
					</div>
				</div>
				<?php

								break;

							case "numaralar":
								echo '<div class="row">
						<div class="col-lg-6 mt-2 anaiskelet mx-auto">';

								if ($_POST) :
									echo '<div class="row">		 
						<div class="col-lg-12 mt-1">SONUÇ</div>
						</div>';
								else:
				?>
					<div class="row">
						<div class="col-lg-12 baslik">
							<div class="row">
								<div class="col-lg-9 col-form-label-lg pt-3">
									<h3>TELEFON NUMARALARI YÖNETİM</h3>
								</div>
								<div class="col-lg-3 p-2">
									<div class="btn-group">
										<button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											İŞLEMLER
										</button>
										<div class="dropdown-menu bg-danger">
											<a class="dropdown-item" href="index.php?islem=tekekle">Tek Ekle</a>
											<a class="dropdown-item" href="index.php?islem=topluekle">Toplu Ekle</a>
											<a class="dropdown-item" href="index.php?islem=grupolustur">Grup Oluştur</a>
											<a class="dropdown-item" href="index.php?islem=sablonolustur">Şablon Oluştur</a>

										</div>
									</div>

								</div>

							</div>
						</div>



						<div class="col-lg-12 mt-1">
							<div class="row font-weight-bold p-1 text-danger">
								<div class="col-lg-5 ">Telefon No</div>
								<div class="col-lg-4">Grup </div>
								<div class="col-lg-1">Sil </div>
								<div class="col-lg-2">Güncelle </div>

							</div>

							<?php
									$genelislem->numaralarial($baglanti);
							?>

						</div>



					</div>

				<?php endif;	?>

			</div>
		</div>
		<?php


								break;

							case "ayarlar":
								echo '<div class="row">
						<div class="col-lg-6 mt-2 anaiskelet mx-auto">';

								if ($_POST) :
									echo '<div class="row"><div class="col-lg-12 mt-1">';

									$akey = htmlspecialchars(strip_tags($_POST["apikey"]));
									$gkey = htmlspecialchars(strip_tags($_POST["guvkey"]));
									$baslik = htmlspecialchars(strip_tags($_POST["baslik"]));

									$guncelle = $baglanti->prepare("update ayarlar set apikey=?,guvkey=?,baslik=?");
									if ($guncelle->execute(array($akey, $gkey, $baslik))):

										echo "<div class='alert alert-info mt-3'>GÜNCELLEME BAŞARILI</div>";
										header('Refresh:2; url="index.php?islem=ayarlar"');
									else:

										echo "<div class='alert alert-danger mt-3'>HATA OLUŞTU</div>";
										header('Refresh:2; url="index.php?islem=ayarlar"');
									endif;

									echo '</div></div>';
								else:
		?>
			<div class="row">
				<div class="col-lg-12 baslik">
					<h3>APİ AYARLARI</h3>
				</div>

				<div class="col-lg-12 mt-1">
					<div class="row">
						<div class="col-lg-6 col-form-label-lg">Api Anahtarı </div>
						<div class="col-lg-6">
							<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
								<input type="text" name="apikey" class="form-control" value="<?php echo $sms->IM_PUBLIC_KEY; ?>">
						</div>

					</div>
				</div>

				<div class="col-lg-12 mt-1">
					<div class="row">
						<div class="col-lg-6 col-form-label-lg">Güvenlik Anahtarı </div>
						<div class="col-lg-6"><input type="text" name="guvkey" class="form-control" value="<?php echo $sms->IM_SECRET_KEY; ?>"> </div>

					</div>
				</div>

				<div class="col-lg-12 mt-1">
					<div class="row">
						<div class="col-lg-6 col-form-label-lg">Sms Başlığı</div>
						<div class="col-lg-6"><input type="text" name="baslik" class="form-control" value="<?php echo $sms->IM_SENDER; ?>"> </div>

					</div>
				</div>

				<div class="col-lg-12 mt-1">
					<input type="submit" name="btn" value="KAYDET" class="btn btn-success btn-block mt-2 mb-2">
					</form>
				</div>

			</div>

		<?php endif;	?>

	</div>
	</div>
<?php


								break;

							// TELEFON NUMARALARI İLE İLGİLİ İŞLEMLER

							case "numarasil":
								echo '<div class="row">
						<div class="col-lg-6 mt-2 anaiskelet mx-auto">';

								if (isset($_GET["id"]) && is_numeric($_GET["id"])) :

									echo '<div class="row"><div class="col-lg-12 mt-1">';

									$sil = $baglanti->prepare("delete from numaralar where id=" . $_GET["id"]);

									if ($sil->execute()):

										echo "<div class='alert alert-info mt-3'>NUMARA SİLME BAŞARILI</div>";
										header('Refresh:2; url="index.php?islem=numaralar"');
									else:

										echo "<div class='alert alert-danger mt-3'>HATA OLUŞTU</div>";
										header('Refresh:2; url="index.php?islem=numaralar"');
									endif;

									echo '</div></div>';
								else:
									header('Location:index.php?islem=numaralar');
								endif;	?>

	</div>
	</div>
	<?php


								break;

							case "numaraguncelle":
								echo '<div class="row">
						<div class="col-lg-6 mt-2 anaiskelet mx-auto">';

								if ($_POST) :
									echo '<div class="row"><div class="col-lg-12 mt-1">';

									$tel = htmlspecialchars(strip_tags($_POST["tel"]));
									$grup = htmlspecialchars(strip_tags($_POST["grup"]));
									$telid = htmlspecialchars(strip_tags($_POST["telid"]));

									$guncelle = $baglanti->prepare("update numaralar set tel=?,grupid=? where id=?");
									if ($guncelle->execute(array($tel, $grup, $telid))):

										echo "<div class='alert alert-info mt-3'>GÜNCELLEME BAŞARILI</div>";
										header('Refresh:2; url="index.php?islem=numaralar"');
									else:

										echo "<div class='alert alert-danger mt-3'>HATA OLUŞTU</div>";
										header('Refresh:2; url="index.php?islem=numaralar"');
									endif;

									echo '</div></div>';
								else:
									$id = $_GET['id'];
									$gelenveri = $genelislem->tekverial($baglanti, "numaralar", "id=$id");

	?>
		<div class="row">
			<div class="col-lg-12 baslik">
				<h3>NUMARA GÜNCELLEME</h3>
			</div>

			<div class="col-lg-12 mt-1">
				<div class="row">
					<div class="col-lg-6 col-form-label-lg">Numara </div>
					<div class="col-lg-6">
						<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
							<input type="text" name="tel" class="form-control" value="<?php echo $gelenveri[0]["tel"]; ?>">
					</div>

				</div>
			</div>


			<div class="col-lg-12 mt-1">
				<div class="row">
					<div class="col-lg-6 col-form-label-lg">Gruplar</div>
					<div class="col-lg-6">
						<select name="grup" class="form-control p-0">

							<?php
									$genelislem->grupkontrol($baglanti, "gruplar", $gelenveri[0]["grupid"]);
							?>
						</select>

					</div>

				</div>
			</div>

			<div class="col-lg-12 mt-1">
				<input type="hidden" name="telid" value="<?php echo $id; ?>">
				<input type="submit" name="btn" value="GÜNCELLE" class="btn btn-success btn-block mt-2 mb-2">
				</form>
			</div>

		</div>

	<?php endif;	?>

	</div>
	</div>
	<?php


								break;

							case "tekekle":
								echo '<div class="row">
						<div class="col-lg-6 mt-2 anaiskelet mx-auto">';

								if ($_POST) :
									echo '<div class="row"><div class="col-lg-12 mt-1">';

									$tel = htmlspecialchars(strip_tags($_POST["tel"]));
									$grup = htmlspecialchars(strip_tags($_POST["grup"]));


									$ekle = $baglanti->prepare("insert into numaralar (tel,grupid) VALUES(?,?)");

									if ($ekle->execute(array($tel, $grup))):

										echo "<div class='alert alert-info mt-3'>EKLEME BAŞARILI</div>";
										header('Refresh:2; url="index.php?islem=numaralar"');
									else:

										echo "<div class='alert alert-danger mt-3'>HATA OLUŞTU</div>";
										header('Refresh:2; url="index.php?islem=numaralar"');
									endif;

									echo '</div></div>';
								else:

	?>
		<div class="row">
			<div class="col-lg-12 baslik">
				<h3>NUMARA EKLEME</h3>
			</div>

			<div class="col-lg-12 mt-1">
				<div class="row">
					<div class="col-lg-6 col-form-label-lg">Numara </div>
					<div class="col-lg-6">
						<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
							<input type="text" name="tel" class="form-control">
					</div>

				</div>
			</div>


			<div class="col-lg-12 mt-1">
				<div class="row">
					<div class="col-lg-6 col-form-label-lg">Gruplar</div>
					<div class="col-lg-6">
						<select name="grup" class="form-control p-0">

							<?php
									$genelislem->grupkontrol($baglanti, "gruplar", 0);
							?>
						</select>

					</div>

				</div>
			</div>

			<div class="col-lg-12 mt-1">

				<input type="submit" name="btn" value="EKLE" class="btn btn-success  mt-2 mb-2">
				</form>
			</div>

		</div>

	<?php endif;	?>

	</div>
	</div>
	<?php


								break;

							// TELEFON NUMARALARI İLE İLGİLİ İŞLEMLER

							case "grupolustur":
								echo '<div class="row">
						<div class="col-lg-6 mt-2 anaiskelet mx-auto">';

								if ($_POST) :
									echo '<div class="row"><div class="col-lg-12 mt-1">';

									$ad = htmlspecialchars(strip_tags($_POST["grupad"]));

									$ekle = $baglanti->prepare("insert into gruplar (ad) VALUES(?)");

									if ($ekle->execute(array($ad))):

										echo "<div class='alert alert-info mt-3'>EKLEME BAŞARILI</div>";
										header('Refresh:2; url="index.php?islem=numaralar"');
									else:

										echo "<div class='alert alert-danger mt-3'>HATA OLUŞTU</div>";
										header('Refresh:2; url="index.php?islem=numaralar"');
									endif;

									echo '</div></div>';
								else:

	?>
		<div class="row">
			<div class="col-lg-12 baslik">
				<h3>GRUP EKLEME</h3>
			</div>

			<div class="col-lg-12 mt-1">
				<div class="row">
					<div class="col-lg-6 col-form-label-lg">Grup Adı </div>
					<div class="col-lg-6">
						<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
							<input type="text" name="grupad" class="form-control">
					</div>

				</div>
			</div>



			<div class="col-lg-12 mt-1">

				<input type="submit" name="btn" value="EKLE" class="btn btn-success  mt-2 mb-2">
				</form>
			</div>

		</div>

	<?php endif;	?>

	</div>
	</div>
	<?php


								break;

							case "sablonolustur":
								echo '<div class="row">
						<div class="col-lg-6 mt-2 anaiskelet mx-auto">';

								if ($_POST) :
									echo '<div class="row"><div class="col-lg-12 mt-1">';

									$ad = htmlspecialchars(strip_tags($_POST["sablonicerik"]));

									$ekle = $baglanti->prepare("insert into sablonlar (ad) VALUES(?)");

									if ($ekle->execute(array($ad))):

										echo "<div class='alert alert-info mt-3'>EKLEME BAŞARILI</div>";
										header('Refresh:2; url="index.php?islem=numaralar"');
									else:

										echo "<div class='alert alert-danger mt-3'>HATA OLUŞTU</div>";
										header('Refresh:2; url="index.php?islem=numaralar"');
									endif;

									echo '</div></div>';
								else:

	?>
		<div class="row">
			<div class="col-lg-12 baslik">
				<h3>ŞABLON EKLEME</h3>
			</div>

			<div class="col-lg-12 mt-1">
				<div class="row">
					<div class="col-lg-6 col-form-label-lg">Şablon İçerik </div>
					<div class="col-lg-6">
						<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
							<input type="text" name="sablonicerik" class="form-control">
					</div>

				</div>
			</div>



			<div class="col-lg-12 mt-1">

				<input type="submit" name="btn" value="EKLE" class="btn btn-success  mt-2 mb-2">
				</form>
			</div>

		</div>

	<?php endif;	?>

	</div>
	</div>
	<?php


								break;

							case "topluekle":
								echo '<div class="row">
						<div class="col-lg-6 mt-2 anaiskelet mx-auto">';

								if ($_POST) :
									echo '<div class="row"><div class="col-lg-12 mt-1">';

									$dosya = fopen($_FILES["dosya"]["tmp_name"], "r");

									while (!feof($dosya)):

										$parcala = explode("-", fgets($dosya));

										@$verilerim .= "(" . $parcala[0] . "," . $parcala[1] . "),";


									endwhile;

									fclose($dosya);

									$sonhal = rtrim($verilerim, ",");


									$ekle = $baglanti->prepare("insert into numaralar (tel,grupid) VALUES $sonhal");

									if ($ekle->execute()):

										echo "<div class='alert alert-info mt-3'>TOPLU EKLEME BAŞARILI</div>";
										header('Refresh:2; url="index.php?islem=numaralar"');
									else:

										echo "<div class='alert alert-danger mt-3'>HATA OLUŞTU</div>";
										header('Refresh:2; url="index.php?islem=numaralar"');
									endif;


									/* VERSİYON 1
						
						$dosya=fopen($_FILES["dosya"]["tmp_name"],"r");
						// feof
						// fgets
						while (!feof($dosya)):
						
						@$verilerim.="(".trim(fgets($dosya))."),";					
							
						
						endwhile;
						
						fclose($dosya);
						
						$sonhal=rtrim($verilerim,",");
												
						
						$ekle=$baglanti->prepare("insert into numaralar (tel) VALUES $sonhal");
						
								if ($ekle->execute()):

								echo "<div class='alert alert-info mt-3'>TOPLU EKLEME BAŞARILI</div>";
								header('Refresh:2; url="index.php?islem=numaralar"');
								else:

								echo "<div class='alert alert-danger mt-3'>HATA OLUŞTU</div>";
								header('Refresh:2; url="index.php?islem=numaralar"');
								endif;*/

									echo '</div></div>';
								else:

	?>
		<div class="row">
			<div class="col-lg-12 baslik">
				<h3>TOPLU TELEFON EKLEME</h3>
			</div>

			<div class="col-lg-12 mt-1">
				<div class="row">
					<div class="col-lg-6 col-form-label-lg">Dosya </div>
					<div class="col-lg-6">
						<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">

							<input type="file" name="dosya" class="form-control">
					</div>

				</div>
			</div>



			<div class="col-lg-12 mt-1">

				<input type="submit" name="btn" value="YÜKLE" class="btn btn-success  mt-2 mb-2">
				</form>
			</div>

		</div>

	<?php endif;	?>

	</div>
	</div>
<?php


								break;

							default:

								echo "<h2>SOL MENÜDEN İŞLEM SEÇİNİZ</h2>";


						endswitch;

?>
</div>
</div>
</div>
</div>
<!-- main content area end -->
</div>
<!-- page container area end -->


<!-- jquery latest version -->
<script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
<!-- bootstrap 4 js -->
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/metisMenu.min.js"></script>
<script src="assets/js/jquery.slimscroll.min.js"></script>
<script src="assets/js/jquery.slicknav.min.js"></script>

<!-- others plugins -->
<script src="assets/js/plugins.js"></script>
<script src="assets/js/scripts.js"></script>
</body>

</html>