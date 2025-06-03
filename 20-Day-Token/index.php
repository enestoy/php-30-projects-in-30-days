<?php session_start(); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CSRF-TOKEN KULLANIMI</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>

<body>

<div class="container"
        <div class="row text-center">
        
        
        <div class="col-lx-4 col-lg-4 col-md-12 col-sm-12 mx-auto">
        		<div class="row">        
                
                <?php
				
				if (!$_POST) :
				
				$token = md5(uniqid(mt_rand(),true));
				
				 $_SESSION["token"]=$token;
				
				?>
                
               
                	 <div class="col-lx-12 col-lg-12 col-md-12 col-sm-12 mx-auto mt-2">
                     <form action="<?php  $_SERVER['PHP_SELF'];?>" method="post">
                     
                     Ad	<input type="text" name="ad" class="form-control" />              
                     
                
                	 </div>
                     
                     <div class="col-lx-12 col-lg-12 col-md-12 col-sm-12 mx-auto mt-2">
                   
                     
                     Soyad	<input type="text" name="soyad" class="form-control" />              
                     
                
                	 </div>
                     
                     <div class="col-lx-12 col-lg-12 col-md-12 col-sm-12 mx-auto mt-2 text-center">
                    
                    <input type="hidden" name="token"   value="<?php echo $token; ?>"/>              
                    <input type="submit" name="btn" class="btn btn-success"  value="Gönder"/>              
                     
                
                	 </div>
                     
                     </form>
                     
                     
                     
                     <?php
					 
					 else:
					 
					 if ($_POST["token"]!==$_SESSION["token"]) :
					 
					 echo "Token'de hata var";
					 
					 else:
					 
					 // işler burdan sonra devam edecek
					 
					  echo htmlspecialchars(strip_tags($_POST["ad"]));
					 
					 echo "Herşey başarılı";
					 
					 endif;
					 
					 
					
					 
					 
					 
					 
					 
					 
					endif;
							
							?>
                     
                </div>	
        
        
        </div>
        
        </div>


</div>

<?php


?>





    
    

</body>
</html>