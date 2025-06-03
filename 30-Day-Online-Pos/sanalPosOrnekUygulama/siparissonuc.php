<?php include("fonksiyon/fonksiyon.php"); $sepet = new sepet;

require_once('config.php');

# create request class
$request = new \Iyzipay\Request\RetrieveCheckoutFormRequest();
$request->setLocale(\Iyzipay\Model\Locale::TR);
$request->setConversationId("123456789");
$request->setToken($_POST['token']);

# make request
$checkoutForm = \Iyzipay\Model\CheckoutForm::retrieve($request, Config::options());

# print result
//print_r($checkoutForm->getStatus());

if ($checkoutForm->getStatus()=="success" && $checkoutForm->getPaymentStatus()=="SUCCESS" ):


					foreach ($_COOKIE["urun"] as $anahtar => $deger):
								
									$urunad=$deger['ad'];
									$uyeid=1;
									$fiyat=$deger['birim'];
									$adet=$deger["adet"];
									
									
							$ekle=$baglan->prepare("insert into siparis (uyeid,urunad,fiyat,adet) VALUES (?,?,?,?)");
							$ekle->bindParam(1,$uyeid,PDO::PARAM_INT);
							$ekle->bindParam(2,$urunad,PDO::PARAM_STR);
							$ekle->bindParam(3,$fiyat,PDO::PARAM_INT);
							$ekle->bindParam(4,$adet,PDO::PARAM_STR);
							$ekle->execute();
								
															
								
								endforeach;	


						$sepet->sepetbosalt(true);

								echo '<div class="alert alert-success text-center">SİPARİŞ TAMAMLANDI</div>';
								header ("refresh:4, url=index.php");	
else:
$checkoutForm->getErrorMessage();


echo "HATA VAR";
endif;