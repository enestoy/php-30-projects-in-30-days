<?php session_start(); ob_start();

require_once('config.php');

# create request class
$request = new \Iyzipay\Request\CreateCheckoutFormInitializeRequest();
$request->setLocale(\Iyzipay\Model\Locale::TR);
$request->setConversationId("123456789");
$request->setCurrency(\Iyzipay\Model\Currency::TL);
$request->setBasketId("B67832");
$request->setPaymentGroup(\Iyzipay\Model\PaymentGroup::PRODUCT);
$request->setCallbackUrl("https://localhost/education/udemyphp/online-pos/sanalPosOrnekUygulama/siparissonuc.php");
$request->setEnabledInstallments(array(2, 3, 6, 9));

$buyer = new \Iyzipay\Model\Buyer();
$buyer->setId("BY789");
$buyer->setName("olcay");
$buyer->setSurname("Kalyoncu");
$buyer->setGsmNumber("+905350000000");
$buyer->setEmail("email@email.com");
$buyer->setIdentityNumber("74300864791");
$buyer->setLastLoginDate("2015-10-05 12:43:35");
$buyer->setRegistrationDate("2013-04-21 15:12:09");
$buyer->setRegistrationAddress("Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1");
$buyer->setIp("85.34.78.112");
$buyer->setCity("Istanbul");
$buyer->setCountry("Turkey");
$buyer->setZipCode("34732");
$request->setBuyer($buyer);

$shippingAddress = new \Iyzipay\Model\Address();
$shippingAddress->setContactName("Jane Doe");
$shippingAddress->setCity("Istanbul");
$shippingAddress->setCountry("Turkey");
$shippingAddress->setAddress("Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1");
$shippingAddress->setZipCode("34742");
$request->setShippingAddress($shippingAddress);

$billingAddress = new \Iyzipay\Model\Address();
$billingAddress->setContactName("Jane Doe");
$billingAddress->setCity("Istanbul");
$billingAddress->setCountry("Turkey");
$billingAddress->setAddress("Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1");
$billingAddress->setZipCode("34742");
$request->setBillingAddress($billingAddress);

$basketItems = array();

$toplamtutar=0;	

foreach ($_COOKIE["urun"] as $anahtar => $deger):
							
								
									$fiyat= $deger["adet"] * $deger['birim'];
									
																
									
						$firstBasketItem = new \Iyzipay\Model\BasketItem();
						$firstBasketItem->setId($anahtar);
						$firstBasketItem->setName($deger['ad']);
						$firstBasketItem->setCategory1("Collectibles");						
						$firstBasketItem->setItemType(\Iyzipay\Model\BasketItemType::PHYSICAL);
						$firstBasketItem->setPrice($fiyat);
						$basketItems[] = $firstBasketItem;
						
					$toplamtutar+= $fiyat;	 // birşey			
		endforeach;



$request->setBasketItems($basketItems);

$request->setPrice($toplamtutar);
$request->setPaidPrice($toplamtutar);

# make request
$checkoutFormInitialize = \Iyzipay\Model\CheckoutFormInitialize::create($request, Config::options());

if ($checkoutFormInitialize->getStatus()=="success"):
print_r($checkoutFormInitialize->getCheckoutFormContent());

?>

<html>
<body>
<div id="iyzipay-checkout-form" class="responsive"></div>
</body>

</html>

<?php

else:

print_r($checkoutFormInitialize->getErrorMessage());

endif;





?>


