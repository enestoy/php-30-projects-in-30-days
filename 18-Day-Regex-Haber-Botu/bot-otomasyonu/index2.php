<?php


try {
    $baglanti = new PDO("mysql:host=localhost;port=3307;dbname=education_bot;charset=utf8", "root", "");
    $baglanti->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die($e->getMessage());
}

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

                        $basliklar = array();
                        $bakbakalim = $baglanti->prepare("select * from localtablo ");
                        $bakbakalim->execute();
                        while ($sonuc = $bakbakalim->fetch(PDO::FETCH_ASSOC)):

                            $basliklar[] = $sonuc["baslik"];

                        endwhile;

                        if (@$_POST["ilkbutton"] == ""):

                            $veri = file_get_contents("http://localhost/education/udemyphp/app/haber-botu/fake-haber-veri/index.php");

                            $desen = '@<div class="col-lg-4 col-md-4 col-sm-4 mt-2">(.*?)</div>@si';
                            preg_match_all($desen, $veri, $linkler);

                            // print_r($linkler[1][14]);
                            $toplamsayi = count($linkler[1]);


                            for ($i = 0; $i < $toplamsayi; $i++):

                                $desen2 = '@<a id="haberlink" href="(.*?)">(.*?)</a>@si';
                                preg_match_all($desen2, $linkler[1][$i], $linkvebaslik);


                                if (in_array($linkvebaslik[2][0],$basliklar)):
                                    continue;
                                endif;


                                echo '<form action="" method="post">';

                                $desen2 = '@<img class="card-img-top" src="(.*?)" height="200">@si';
                                preg_match_all($desen2, $linkler[1][$i], $resim);
                                echo '<img src="http://localhost/education/udemyphp/app/haber-botu/fake-haber-veri/' . $resim[1][0] . '" width="200px" heigth="150px" class="mt-2">';
                                echo "<br>";


                                echo '<input type="hidden" class="form-control mt-2 mb-2" name="res[]" value="' . $resim[1][0] . '"';
                                echo '<br>';




                                echo '<input type="text" class="form-control mt-2 mb-2" name="baslik[]" value="' . $linkvebaslik[2][0] . '"';

                                echo "<br>";

                                // İçeriye giriyoruz

                                $detay = file_get_contents("http://localhost/education/udemyphp/app/haber-botu/fake-haber-veri/" . $linkvebaslik[1][0]);

                                $desen4 = '@id="habericerik">(.*?)</div>@si';
                                preg_match_all($desen4, $detay, $detayagirdim);


                                echo '<textarea name="icerik[]" rows="5" class="form-control mt-2">' . $detayagirdim[1][0] . '</textarea>';

                                echo '
                                <input type="submit" name="ilkbutton" class="btn btn-success mt-3 mb-2" value="kaydet">
                                </form>';
                                echo "<hr>";

                            endfor;

                        /*  echo '
                            <input type="submit" name="ilkbutton" class="btn btn-success mt-3 mb-2" value="kaydet">
                            </form>'; */


                        else:

                            // ekleme işlemleri
                            /*    
                         foreach ($_POST["baslik"] as $key => $val):
                                
                                echo "<hr>";
                                echo $_POST["res"][$key]."<br>";
                                echo $val . "<br>";
                                echo $_POST["icerik"][$key];
                                

                            endforeach; */

                            $ekle = $baglanti->prepare("insert into localtablo (baslik,icerik,resim) VALUES(:baslikveri,:icerikveri,:resimveri)");

                            foreach ($_POST["baslik"] as $key => $val):

                                // resim indirme yeri

                                $resimcek = file_get_contents("http://localhost/education/udemyphp/app/haber-botu/fake-haber-veri/" . $_POST["res"][$key]);
                                $uzantiyaulasiyorum = explode(".", $_POST["res"][$key]);
                                $sonuzanti = "." . $uzantiyaulasiyorum[count($uzantiyaulasiyorum) - 1];

                                // $asama1 = str_shuffle("EnesToy");
                                // $asama2 =mt_rand(0,1354157);
                                // $dosyaAd ="res/".$asama1.$asama2.$sonuzanti;

                                $karisacak = str_shuffle("EnesToy" . mt_rand(0, 1354157));
                                $dosyaAd = "res/" . $karisacak . $sonuzanti;

                                $indir = fopen($dosyaAd, "a+"); // dosya oluşturma
                                fwrite($indir, $resimcek); // dosyanının içini doldurma
                                fclose($indir);


                                $ekle->execute(array(
                                    ':baslikveri' => $val,
                                    ':icerikveri' => $_POST["icerik"][$key],
                                    ':resimveri'  => $dosyaAd
                                ));


                            endforeach;

                            echo '<div class="alert alert-success me-2">Kayıt Başarıyla Eklenmiştir.</div>';

                        endif;
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

                        $sonveri = file_get_contents("http://localhost/education/udemyphp/app/haber-botu/fake-haber-veri/index.php");

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

                            $detay2 = file_get_contents("http://localhost/education/udemyphp/app/haber-botu/fake-haber-veri/" . $link[1][0]);

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
                        $sonveri = file_get_contents("http://localhost/education/udemyphp/app/haber-botu/fake-haber-veri/index.php");

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

                            $detay2 = file_get_contents("http://localhost/education/udemyphp/app/haber-botu/fake-haber-veri/" . $link[1][0]);

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

                        $kategori = file_get_contents("http://localhost/education/udemyphp/app/haber-botu/fake-haber-veri/index.php");

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


                            $son2 = file_get_contents("http://localhost/education/udemyphp/app/haber-botu/fake-haber-veri/index.php?katid=" . $_POST["katid"]);

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

                                $detay = file_get_contents("http://localhost/education/udemyphp/app/haber-botu/fake-haber-veri/" . $linkvebaslik[1][0]);

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