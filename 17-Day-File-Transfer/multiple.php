<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Başlıksız Belge</title>
</head>

<body>
<?php 

@$islem=$_GET["tercih"];


switch ($islem) :


		case "gelen":
		
		$sayi=$_POST["sayi"];
		$sayi++;
		
echo '<form action="multiple.php?tercih=yukle" method="post" enctype="multipart/form-data">';
for ($i=1; $i<$sayi; $i++) :
echo '<input type="file" name="dosya'.$i.'" /><br><br>';
endfor;
		


?>
<input type="hidden" name="say" value="<?php  echo $sayi; ?>"/>
<input type="submit" name="buton" value="YÜKLE"/>
</form><?php
		
		break;
		
		case "yukle";
		
		$sayi=$_POST["say"];
				
		if (@$_POST["buton"]) :

				for ($i=1; $i<$sayi; $i++) :
							
							if($_FILES["dosya".$i]["name"]==""):
							
							echo $i. " bu sıradaki dosya yüklenmedi<br>";
							
							else :
							
									if ($_FILES["dosya".$i]["size"]>(1024*1024*5)) :
									
											echo $i. " bu sıradaki dosyanın boyutu büyük<br>";	
									
									endif;
									
									$izinverilen=array("image/png");
									
											if (!in_array($_FILES["dosya".$i]["type"],$izinverilen)) :
						echo $i. " resimin dosya türü hatalı, sadece png'ye izin var. Sizin yüklediğiniz ".$_FILES["dosya".$i]["type"]."<br>";	
						
											else:
											
											
		move_uploaded_file($_FILES["dosya".$i]["tmp_name"],"files/".$_FILES["dosya".$i]["name"]);
											
							echo $i. " Dosya Başarıyla yüklendi<br>";					
											
											endif;
							
							endif;
				endfor;
		
		endif;
		
		
		break;
		
		default:
		?>
<form action="multiple.php?tercih=gelen" method="post" >

<input type="text" name="sayi" /><br /><br />



<input type="submit" name="buton2" value="OLUŞTUR"/>
</form>	
		
<?php
		

endswitch;

?>





</body>
</html>