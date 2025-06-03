<?php 

use Shuchkin\SimpleXLSX;

ini_set('error_reporting', E_ALL);
ini_set('display_errors', true);

require_once __DIR__.'/src/SimpleXLSX.php';


if ($xlsx = SimpleXLSX::parse('arabasilme.xlsx')) {
    $xlsx->rows();
} else {
    echo SimpleXLSX::parseError();
}

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
$toplamsayi= count($xlsx->rows());

		for ($a=1; $a<$toplamsayi; $a++) :		
				
		
		@$veriler.=$xlsx->rows()[$a][0].",";	
		

		endfor;

echo $veriler."<br>";
$veriler=rtrim($veriler,",");

$baglan->query("delete from araba where id IN($veriler)");


			


?>


</body>
</html>