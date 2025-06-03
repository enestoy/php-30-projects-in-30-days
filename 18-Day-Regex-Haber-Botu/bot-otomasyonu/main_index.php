<?php
$context = stream_context_create([
  "ssl" => [
    "verify_peer" => false,
    "verify_peer_name" => false,
  ],
]);

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>HABER BOTUMUZ</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <style>
        body {
            height: 100%;
            width: 100%;
            position: absolute;

        }
    </style>
</head>
<body>
    <div class="container-fluid h-100">
        <div class="row h-100">
            <div class="col-lg-3 border-right text-center">
                <div class="row">
                    <div class="col-lg-12 bg-danger text-white">
                        <h4>TÜM HABERLER</h4>
                    </div>
                    <div class="col-lg-12">
                        <?php                            

                        $veri = file_get_contents("https://localhost/education/php-30day-30project/18-Day-Regex-Haber-Botu/fake-haber-veri/index.php", false, $context);

                        $desen = '@<div class="col-lg-4 col-md-4 col-sm-4 mt-2">(.*?)</div>@si';
                        preg_match_all($desen, $veri, $linkler);

                        // print_r($linkler[1][14]);
                        $toplamsayi = count($linkler[1]);


                        for ($i = 0; $i < $toplamsayi; $i++):


                            $desen2 = '@<img class="card-img-top" src="(.*?)" height="200">@si';
                            preg_match_all($desen2, $linkler[1][$i], $resim);
                            echo "Resim Yolu : " . $resim[1][0];
                            echo "<br>";



                            $desen2 = '@<a id="haberlink" href="(.*?)">(.*?)</a>@si';
                            preg_match_all($desen2, $linkler[1][$i], $linkvebaslik);
                            echo "Link: " . $linkvebaslik[1][0];
                            echo "<br>";
                            echo "Başlık: " . $linkvebaslik[2][0];
                            echo "<br>";

                            // İçeriye giriyoruz

                            $detay = file_get_contents("https://localhost/education/php-30day-30project/18-Day-Regex-Haber-Botu/fake-haber-veri/" . $linkvebaslik[1][0], false, $context);

                            $desen4 = '@id="habericerik">(.*?)</div>@si';
                            preg_match_all($desen4, $detay, $detayagirdim);

                            echo "İçerik: " . $detayagirdim[1][0];
                            echo "<br><br><hr>";

                        endfor;
                        /*                     
                        <div class="col-lg-4 col-md-4 col-sm-4 mt-2">
                          <div class="card h-100">
                            <a href="haberdetay.php?haberid=13"><img class="card-img-top" src="res/haber2.jpg" height="200"></a>
                            <div class="card-body">
                              <h4 class="card-title">
                                <a id="haberlink" href="haberdetay.php?haberid=13">İşler Nasıl</a>
                              </h4>
                              <p class="card-text">Haber 2 -Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque earum nostrum suscipit duc...</p>
                            </div>
                          </div>
                        </div> 
                        */
                        ?>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 border-right text-center">
                <div class="row">
                    <div class="col-lg-12 bg-danger text-white">
                        <h4>SON DAKİKALAR</h4>
                    </div>
                    <div class="col-lg-12">
                        <?php

                        $sonveri = file_get_contents("https://localhost/education/php-30day-30project/18-Day-Regex-Haber-Botu/fake-haber-veri/index.php", false, $context);

                        $desen10 = '@id="soneklenenstil">(.*?)</div>@si';
                        preg_match_all($desen10, $sonveri, $sondak);

                        // print_r($linkler[1][14]);
                        $toplamsayi = count($sondak[1]);

                        for ($i = 0; $i < $toplamsayi; $i++):

                            $desen11 = '@<a href="(.*?)">(.*?)</a>@si';
                            preg_match_all($desen11, $sondak[1][$i], $link);

                            echo "Link: " . $link[1][0];
                            echo "<br>";
                            echo "Başlık: " . $link[2][0];
                            echo "<br>";

                            // İçeriye giriyoruz

                            $detay2 = file_get_contents("https://localhost/education/php-30day-30project/18-Day-Regex-Haber-Botu/fake-haber-veri/" . $link[1][0], false, $context);

                            $desen12 = '@id="habericerik">(.*?)</div>@si';
                            preg_match_all($desen12, $detay2, $detayagirdim2);

                            echo "İçerik: " . $detayagirdim2[1][0];


                            $desen13 = '@<img class="card-img-top" src="(.*?)" height="200">@si';
                            preg_match_all($desen13, $detay2, $resim);
                            echo "Resim Yolu : " . $resim[1][0];
                            echo "<br><br><hr>";


                        endfor;


                        ?>


                    </div>
                </div>
            </div>

            <div class="col-lg-3 border-right text-center">
                <div class="row">
                    <div class="col-lg-12 bg-danger text-white">
                        <h4>SON EKLENENLER</h4>
                    </div>
                    <div class="col-lg-12">

                        <?php

                        $sonveri = file_get_contents("https://localhost/education/php-30day-30project/18-Day-Regex-Haber-Botu/fake-haber-veri/index.php", false, $context);

                        $desen10 = '@id="yeneklenenstil">(.*?)</div>@si';
                        preg_match_all($desen10, $sonveri, $sondak);

                        // print_r($linkler[1][14]);
                        $toplamsayi = count($sondak[1]);

                        for ($i = 0; $i < $toplamsayi; $i++):

                            $desen11 = '@<a href="(.*?)">(.*?)</a>@si';
                            preg_match_all($desen11, $sondak[1][$i], $link);

                            echo "Link: " . $link[1][0];
                            echo "<br>";
                            echo "Başlık: " . $link[2][0];
                            echo "<br>";

                            // İçeriye giriyoruz

                            $detay2 = file_get_contents("https://localhost/education/php-30day-30project/18-Day-Regex-Haber-Botu/fake-haber-veri/" . $link[1][0], false, $context);

                            $desen12 = '@id="habericerik">(.*?)</div>@si';
                            preg_match_all($desen12, $detay2, $detayagirdim2);

                            echo "İçerik: " . $detayagirdim2[1][0];


                            $desen13 = '@<img class="card-img-top" src="(.*?)" height="200">@si';
                            preg_match_all($desen13, $detay2, $resim);
                            echo "Resim Yolu : " . $resim[1][0];
                            echo "<br><br><hr>";


                        endfor;


                        ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 text-center">
                <div class="row">
                    <div class="col-lg-12 bg-danger text-white">
                        <h4>KATEGORİYE GÖRE</h4>
                    </div>
                    <div class="col-lg-12">

                        <?php

                        $kategori = file_get_contents("https://localhost/education/php-30day-30project/18-Day-Regex-Haber-Botu/fake-haber-veri/index.php", false, $context);

                        $desen20 = '@<li class="nav-item">(.*?)</li>@si';
                        preg_match_all($desen20, $kategori, $kat);
                        $toplamsayi = count($kat[1]);

                        echo '<form action="" method="post">

                        <select name="katid" class="form-control m-2">

                        <option value="0">Seç</option>
                        
                        ';
                        for ($i = 0; $i < $toplamsayi; $i++):

                            $desen21 = '@<a class="nav-link" href="(.*?)">(.*?)</a>@si';
                            preg_match_all($desen21, $kat[1][$i], $veriler);

                            $id = str_replace("index.php?katid=", "", $veriler[1][0]);

                            echo '<option value="' . $id . '">' . $veriler[2][0] . '</option>';


                        endfor;

                        echo '</select>
                        <input type="submit" name="btn" class="btn btn-primary">
                        </form>';

                        if (@$_POST["katid"] != ""):


                            $son2 = file_get_contents("https://localhost/education/php-30day-30project/18-Day-Regex-Haber-Botu/fake-haber-veri/index.php?katid=".$_POST["katid"], false, $context);

                            $desen = '@<div class="col-lg-4 col-md-4 col-sm-4 mt-2">(.*?)</div>@si';
                            preg_match_all($desen, $son2, $linkler);
    
                            // print_r($linkler[1][14]);
                            $toplamsayi = count($linkler[1]);
    
    
                            for ($i = 0; $i < $toplamsayi; $i++):
    
    
                                $desen2 = '@<img class="card-img-top" src="(.*?)" height="200">@si';
                                preg_match_all($desen2, $linkler[1][$i], $resim);
                                echo "Resim Yolu : " . $resim[1][0];
                                echo "<br>";
    
    
    
                                $desen2 = '@<a id="haberlink" href="(.*?)">(.*?)</a>@si';
                                preg_match_all($desen2, $linkler[1][$i], $linkvebaslik);
                                echo "Link: " . $linkvebaslik[1][0];
                                echo "<br>";
                                echo "Başlık: " . $linkvebaslik[2][0];
                                echo "<br>";
    
                                // İçeriye giriyoruz
    
                                $detay = file_get_contents("https://localhost/education/php-30day-30project/18-Day-Regex-Haber-Botu/fake-haber-veri/" . $linkvebaslik[1][0], false, $context);
    
                                $desen4 = '@id="habericerik">(.*?)</div>@si';
                                preg_match_all($desen4, $detay, $detayagirdim);
    
                                echo "İçerik: " . $detayagirdim[1][0];
                                echo "<br><br><hr>";
    
                            endfor;

                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>