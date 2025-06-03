<?php ob_start();
$baglan = new PDO("mysql:host=localhost;dbname=education;charset=utf8", "root");


class sepet {
	

   protected $urunad;   
   protected $fiyat;
   
   
   function urunler ($v) {
	   
	   $urunleral=$v->prepare("select * from urunler");
	   $urunleral->execute();
	   
	   while ($urunson=$urunleral->fetch(PDO::FETCH_ASSOC)) :
	   
	   
	   echo '<div class="col-xl-2 col-lg-2 col-md-2 m-3  uruniskelet" >
	   			<div class="row">
						<div class="col-xl-12 col-lg-12 col-md-12 p-2">
						 <img src="'.$urunson["resim"].'" width="100" height="100" />
						</div>
						
						<div class="col-xl-12 col-lg-12 col-md-12 p-2">
						 <a href="site.php?islem=sepeteat&id='.$urunson["id"].'" class="btn btn-dark btn-block p-2">EKLE</a>
						</div>				
				</div>	   
	   </div>';
	   
	   endwhile;
   }
 
 
 function sepetsayi($b) {
	 
	 $urunal=$b->prepare("select * from anliksepet");
	 $urunal->execute();
	 return $urunal->rowCount();
	 

	 
 }
 
 
 function urunbak($b,$id)  {
	 
	 $urunal=$b->prepare("select * from urunler where id=$id");
	 $urunal->execute();
	 return $urunson=$urunal->fetch(PDO::FETCH_ASSOC);
	 

 }
 



function urunlergetir($v) {

	if (isset($_COOKIE["urun"])) :
			$toplamadet=0;
			$toplamtutar=0;	
	
					foreach ($_COOKIE["urun"] as $anahtar => $deger):
					
				//	echo "Ürün id : " . $anahtar . "<br>";	
					
	//echo "adet : " . $deger['adet'] . "birim : ". $deger['birim']. "-" . "ad  : ". $deger['ad']. "<br>";		
				
				echo '<div class="row text-center p-2 sepeturun">
							<div class="col-xl-2 col-lg-2 col-md-2">'. $deger['ad'].'</div>
							<div class="col-xl-2 col-lg-2 col-md-2">'.$deger['adet'].'</div>
							<div class="col-xl-2 col-lg-2 col-md-2">'. $deger['birim'].'</div>
							<div class="col-xl-2 col-lg-2 col-md-2">'. $deger['birim'] * $deger['adet'].'</div>
							<div class="col-xl-2 col-lg-2 col-md-2">
							
							<form action="sepet.php?is=guncelle" method="post">
							<input type="number" name="adet" value="'.$deger['adet'].'" min="1" class="col-md-5">
							<input type="hidden" name="id" value="'.$anahtar.'"/><br>
							<input type="submit" name="buton" value="Güncelle" class="btn btn-warning mt-2 p-1">			

							</form>
							</div>
							<div class="col-xl-2 col-lg-2 col-md-2 "><a href="sepet.php?is=sil&id='.$anahtar.'" class="btn btn-danger">Sil</a></div>
					
					
					</div>';
				
				
					
			$toplamadet += $deger['adet'];
			$toplamtutar += $deger['birim'] * $deger['adet'];
				
				
				endforeach;
				
				
				
				echo '<div class="row text-center sepetaltbar p-2">
							<div class="col-xl-2 col-lg-2 col-md-2 pt-2">TOPLAM ÜRÜN ADETİ</div>
							<div class="col-xl-2 col-lg-2 col-md-2  pt-2"><kbd>'.$toplamadet.'</kbd></div>
							<div class="col-xl-2 col-lg-2 col-md-2  pt-2">TOPLAM FİYAT</div>
							<div class="col-xl-2 col-lg-2 col-md-2  pt-2"><kbd>'.$toplamtutar.'</kbd></div>
							<div class="col-xl-4 col-lg-4 col-md-4"><a href="sepet.php?is=tamamla" class="btn btn-dark btn-block">SİPARİŞİ TAMAMLA</a></div>
					
					</div>';
	else:
	echo '<div class="row text-center sepetaltbar">
		<div class="col-xl-12 col-lg-12 col-md-12">SEPETTE ÜRÜN YOK</div>					
	</div>';		
	endif;
	
}

function sil($v) {
		
		if (@$_GET["id"]!="") :
		
				$id=$_GET["id"];
				
						if (isset($_COOKIE["urun"])):
							
						
						setcookie("urun[".$id."][ad]","",time() -1 ,"/");
						setcookie("urun[".$id."][adet]","",time() -1 ,"/");
						setcookie("urun[".$id."][birim]","",time() -1 ,"/");	


						echo '<div class="alert alert-success text-center">ÜRÜN SEPETTEN KALDIRILDI</div>';
						header ("refresh:2, url=sepet.php");	



						else:
						echo '<div class="alert alert-success text-center">HATA OLUŞTU</div>';
						header ("refresh:2, url=sepet.php");	

						endif;
				
					
		
		endif;
	
	
}

function guncelle($v) {
	
	
	
		if ($_POST) :
		
			
		$id=$_POST["id"];	
		
				if (isset($_COOKIE["urun"])):
				
				setcookie("urun[".$id."][adet]",$_POST["adet"],time() + 60*60*24,"/");
							

				echo '<div class="alert alert-success text-center">ÜRÜN ADETİ GÜNCELLENDİ</div>';
				header ("refresh:2, url=sepet.php");	



				else:
				echo '<div class="alert alert-success text-center">HATA OLUŞTU</div>';
				header ("refresh:2, url=sepet.php");	

				endif;
	
		
			
			
		endif;
}

function sepetbosalt($bilgi=false) {


				if (isset($_COOKIE["urun"])):
				
								foreach ($_COOKIE["urun"] as $anahtar => $deger):
								
								setcookie("urun[".$anahtar."][ad]","",time() -1 ,"/");
								setcookie("urun[".$anahtar."][adet]","",time() -1 ,"/");
								setcookie("urun[".$anahtar."][birim]","",time() -1 ,"/");
								
								
								endforeach;		
								
								if (!$bilgi):
								
								echo '<div class="alert alert-success text-center">SEPET BOŞALTILDI</div>';
								header ("refresh:2, url=sepet.php");	
								
								endif;

							



						else:
						echo '<div class="alert alert-success text-center">HATA OLUŞTU</div>';
						header ("refresh:2, url=sepet.php");	

				endif;
	
}

function siptamamla($v) {	


			if (isset($_COOKIE["urun"])):
				
								foreach ($_COOKIE["urun"] as $anahtar => $deger):
								
									$urunad=$deger['ad'];
									$uyeid=1;
									$fiyat=$deger['birim'];
									$adet=$deger["adet"];
									
									
					$ekle=$v->prepare("insert into siparis (uyeid,urunad,fiyat,adet) VALUES (?,?,?,?)");
					$ekle->bindParam(1,$uyeid,PDO::PARAM_INT);
					$ekle->bindParam(2,$urunad,PDO::PARAM_STR);
					$ekle->bindParam(3,$fiyat,PDO::PARAM_INT);
					$ekle->bindParam(4,$adet,PDO::PARAM_STR);
					$ekle->execute();
								
															
								
								endforeach;		
								
								$this->sepetbosalt(true);

								echo '<div class="alert alert-success text-center">SİPARİŞ TAMAMLANDI</div>';
								header ("refresh:2, url=sepet.php");	



						else:
						echo '<div class="alert alert-success text-center">HATA OLUŞTU</div>';
						header ("refresh:2, url=sepet.php");	

			endif;


	
		
}

	
}


?>