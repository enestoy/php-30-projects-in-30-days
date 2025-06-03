<?php 


use Shuchkin\SimpleXLSX;

ini_set('error_reporting', E_ALL);
ini_set('display_errors', true);

require_once __DIR__.'/src/SimpleXLSX.php';

echo '<pre>';
if ($xlsx = SimpleXLSX::parse('arabamodel.xlsx')) {
    print_r($xlsx->rows());
} else {
    echo SimpleXLSX::parseError();
}
echo '<pre>';


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
$toplamsayi= count($xlsx->rows());

		for ($a=1; $a<$toplamsayi; $a++) :
		
		echo  $xlsx->rows()[$a][0]."<br>" ;
		echo  $xlsx->rows()[$a][1]."<br>" ;

		/*for ($b=0; $b<2; $b++) :
				
					echo  $xlsx->rows()[$a][$b]."<br>" ;


		endfor;*/
		
		@$veriler.="('".$xlsx->rows()[$a][0]."',".$xlsx->rows()[$a][1]."),";

		endfor;

echo $veriler."<br>";
$veriler=rtrim($veriler,",");

$baglan->query("insert into araba (marka,model) VALUES $veriler");


			


?>


</body>
</html>