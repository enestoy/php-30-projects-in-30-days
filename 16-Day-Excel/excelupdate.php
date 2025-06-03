<?php

use Shuchkin\SimpleXLSX;

ini_set('error_reporting', E_ALL);
ini_set('display_errors', true);

require_once __DIR__ . '/src/SimpleXLSX.php';


if ($xlsx = SimpleXLSX::parse('arabaguncelleme.xlsx')) {
	$xlsx->rows();
} else {
	echo SimpleXLSX::parseError();
}


//print_r( $xlsx->rows()[0][1] );
$baglan = new PDO("mysql:host=localhost;dbname=education_excel;charset=utf8", "root", "");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>EXCEL VERİLERİNİ İMPORT ETME</title>
</head>

<body>

	<?php
	$idler = array();
	$toplamsayi = count($xlsx->rows());

	for ($a = 1; $a < $toplamsayi; $a++) :


		/* $idler[]=array(
			$xlsx->rows()[$a][1],
			$xlsx->rows()[$a][2],
			$xlsx->rows()[$a][0]); 
		*/

		$id = $xlsx->rows()[$a][0] ?? null;
		$marka = $xlsx->rows()[$a][1] ?? null;
		$model = $xlsx->rows()[$a][2] ?? null;

		// Eğer ID, Marka veya Model boşsa bu veriyi ekleme
		if (!empty($id) && !empty($marka) && !empty($model)) {
			$idler[] = array($marka, $model, $id);
		}
		
	endfor;

	echo "<pre>";
	print_r($idler);
	echo "</pre>";

	$guncelle = $baglan->prepare("update araba set marka=?,model=? where id=?");


	foreach ($idler as $anahtar => $deger):

		$guncelle->execute($idler[$anahtar]);
	endforeach;




	?>


</body>

</html>