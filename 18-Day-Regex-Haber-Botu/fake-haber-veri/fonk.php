<?php


try {
	$db = new PDO("mysql:host=localhost;dbname=education_haberbotu;charset=utf8", "root", "");
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
	die($e->getMessage());
}




function haberler($db)
{

	$al = $db->prepare("select * from haberler");
	$al->execute();


	while ($masason = $al->fetch(PDO::FETCH_ASSOC)):

		echo '  
		<div class="col-lg-4 col-md-4 col-sm-4 mt-2">
                          <div class="card h-100">
                            <a href="haberdetay.php?haberid=' . $masason["id"] . '"><img class="card-img-top" src="res/' . $masason["resim"] . '" height="200"></a>
                            <div class="card-body">
                              <h4 class="card-title">
                                <a id="haberlink" href="haberdetay.php?haberid=' . $masason["id"] . '">' . $masason["baslik"] . '</a>
                              </h4>
                              <p class="card-text">' . substr($masason["icerik"], 0, 100) . '...</p>
                            </div>
                          </div>
                        </div>
		';

	endwhile;
}




function haberdetay($db, $haberid)
{

	$al = $db->prepare("select * from haberler where id=$haberid");
	$al->execute();


	$masason = $al->fetch(PDO::FETCH_ASSOC);

	echo '<div class="col-lg-12 col-md-12 col-sm-12 mt-2">
		 <h1 class="my-4" id="haberbaslik"> ' . $masason["baslik"] . '</h1> 
		</div>
		<div class="col-lg-4 col-md-4 col-sm-4 mt-2">
		<img class="card-img-top" src="res/' . $masason["resim"] . '" height="200">
		
		</div>
		
		<div class="col-lg-8 col-md-8 col-sm-8 mt-2" id="habericerik">
		' . $masason["icerik"] . '
		
		</div> ';
}


function katidgore($db, $katid)
{

	$al = $db->prepare("select * from haberler where katid=$katid");
	$al->execute();


	while ($masason = $al->fetch(PDO::FETCH_ASSOC)):

		echo '  <div class="col-lg-4 col-md-4 col-sm-4 mt-2">
                          <div class="card h-100">
                            <a href="haberdetay.php?haberid=' . $masason["id"] . '"><img class="card-img-top" src="res/' . $masason["resim"] . '" height="200"></a>
                            <div class="card-body">
                              <h4 class="card-title">
                                <a id="haberlink" href="haberdetay.php?haberid=' . $masason["id"] . '">' . $masason["baslik"] . '</a>
                              </h4>
                              <p class="card-text">' . substr($masason["icerik"], 0, 100) . '...</p>
                            </div>
                          </div>
                        </div>';

	endwhile;
}



function yenieklenen($db)
{


	$al = $db->prepare("select * from haberler  order by id desc LIMIT 5");
	$al->execute();

	while ($masason = $al->fetch(PDO::FETCH_ASSOC)):

		echo ' 
		
		  <div class="col-lg-12 p-2 border-bottom" id="yeneklenenstil">
                   <a href="haberdetay.php?haberid=' . $masason["id"] . '">' . $masason["baslik"] . '</a>
                                    </div>
		';

	endwhile;
}

function sondakika($db)
{


	$al = $db->prepare("select * from haberler where durum=1 order by id desc LIMIT 5");
	$al->execute();

	while ($masason = $al->fetch(PDO::FETCH_ASSOC)):

		echo ' 
		
		  <div class="col-lg-12 p-2 border-bottom" id="soneklenenstil">
                   <a href="haberdetay.php?haberid=' . $masason["id"] . '">' . $masason["baslik"] . '</a>
                                    </div>
		';

	endwhile;
}
