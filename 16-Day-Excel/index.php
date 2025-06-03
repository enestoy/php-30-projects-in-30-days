<?php include("excel.php");

$baglan = new PDO("mysql:host=localhost;dbname=education_excel;charset=utf8", "root", "");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>EXCELE AKTARMA SİSTEMİ</title>
</head>
<body>

<?php 

$arabaveri=array();
$arababaslik=array(
		"Araba Ad",
		"Araba Model"
		
);




$verial=$baglan->prepare("select * from araba");
$verial->execute();

			while ($sonuc=$verial->fetch(PDO::FETCH_ASSOC)):
			
			
			@$arabaveri[]=array(
				$sonuc["marka"],
				$sonuc["model"]			
			);
			
			
			endwhile;




excelcek(date("d.m.Y"),$arababaslik,$arabaveri);


	



?>


</body>
</html>