<?php 

$baglan = new PDO("mysql:host=localhost;dbname=education_excel;charset=utf8", "root");

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


		$veri='<table border="1"> <th style="background-color:#000000" colspan="2">
	<font color="#8B8B8B">Arabalar</font></th>';
	
	$basliklarim="";
	
		foreach ($arababaslik as $v) :
	
	$basliklarim.='<th style="background-color:#FFA500">'.trim($v).'</th>';
	
	endforeach;
	
	$veriler="";
	
	$basliksayi=count($arababaslik);
	
		foreach ($arabaveri as $val) :
	
		
				for ($i=0; $i < $basliksayi; $i++) :
				
				if ($i==0) :
				
				$veriler.='<tr>';
				endif;
				
					$veriler.='<td>'.$val[$i].'</td>';
					
					if ($i==$basliksayi) :
				
					$veriler.='</tr>';
					endif;
				
				endfor;
	 
	 	
	
	endforeach;
	
	$sonhal='<tr>'.$basliklarim.'</tr>';
	
	/*$dt=fopen('olci.xls','w');
	fwrite($dt, $veri.$sonhal.$veriler);
	fclose($dt);*/
	
	$dosyalar= glob("*.xls");
	
	foreach ($dosyalar as $dosya) :
	
	//echo $dosya."<br>";
	
	echo '<a target="_blank" href="'.$dosya.'">'.$dosya.'</a><br>';

	endforeach;


?>


</body>
</html>