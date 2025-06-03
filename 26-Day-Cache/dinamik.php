<?php



$cachedosyasi= "cache/".md5($_SERVER['REQUEST_URI']).".html";

if (file_exists($cachedosyasi) && (time() - 17 < filemtime($cachedosyasi))):

include($cachedosyasi);

exit();

endif;

ob_start();
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<title>Cache Sistemi</title>



</head>

<body>

<div class="container-fluid h-100">
<div class="row">
<div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
<a href="dinamik.php?islem=olcay">OLCAY</a> <a href="dinamik.php?islem=udemy">UDEMY</a>
</div>
<?php 


switch (@$_GET["islem"]) :


case "olcay":

echo '<div class="alert alert-danger">OLCAY dsadasdasd</div>';


break;

case "udemy":

echo '<div class="alert alert-danger">UDEMY dasd</div>';
break;

default:

echo '<div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
    </div>';


endswitch;


?>







	


</div>













</div>






    
    

</body>
</html>

<?php

$olustur=fopen($cachedosyasi, "w");
fwrite($olustur,ob_get_contents());
fclose($olustur);
ob_end_flush();



?>