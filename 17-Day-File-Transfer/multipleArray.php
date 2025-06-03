<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Çoklu Dosya</title>
</head>
<body>
  <?php
  
  if($_POST):
   
 echo "<pre>";
 print_r($_FILES["dosya"]);
  echo "</pre>";
  
 for($i = 0; $i < 3; $i++):
      if($_FILES["dosya"]["name"][$i] == ""):
        echo $i . ". sıradaki dosya yüklenemedi.<br>";
      else:
        if($_FILES["dosya"]["size"][$i] > (1024 * 1024 * 5)):
          echo $i . ". sıradaki dosyanın boyutu 5MB'den büyük<br>";
        endif;
 
        $izinliDosya = array("image/png");
        
        if(!in_array($_FILES["dosya"]["type"][$i], $izinliDosya)):
          echo $i . ". dosyanın boyutu jpg formatında değil. Yüklenen format: " . $_FILES["dosya"]["type"][$i] . "<br>";
        else:
          move_uploaded_file($_FILES["dosya"]["tmp_name"][$i], 'files/'.$_FILES["dosya"]["name"][$i]);
          echo $i . ". dosya başarı ile yüklendi.<br>";
        endif;
		 
      endif;
    endfor;
  
  else: 
  ?>
 
  <form action="" method="post" enctype="multipart/form-data">
  
  <input type="file"  name="dosya[]"><br><br>
  <input type="file"  name="dosya[]"><br><br>
  <input type="file"  name="dosya[]"><br><br>

 
  <input type="submit" name="buton" value="YÜKLE">
  
  </form>
 
  <?php
  endif;
  ?>
</body>
</html>