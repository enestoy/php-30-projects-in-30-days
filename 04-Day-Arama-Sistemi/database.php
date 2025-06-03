<?php
try{
    $db = new PDO("mysql:host=localhost;dbname=php_arama_sistemi;charset=UTF8","root","");

}catch(PDOException $Hata){
    echo "Bağlantı Hatası";

}

function Filtre($Deger){
	$Bir 	= trim($Deger);
	$Iki 	= strip_tags($Bir);
	$Uc 	= htmlspecialchars($Iki, ENT_QUOTES);
	$Sonuc	= $Uc;
	return $Sonuc;
}

?>