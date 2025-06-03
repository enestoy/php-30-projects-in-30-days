<?php

set_time_limit(0);
class bot extends controller
{

    static  function permalink($string)
    {
        $find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#');
        $replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp');
        $string = strtolower(str_replace($find, $replace, $string));
        $string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
        $string = trim(preg_replace('/\s+/', ' ', $string));
        $string = str_replace(' ', '-', $string);
        return $string;
    }

    public function parcala($x1,$x2,$fgc,$a)
    {
        $p1 = explode($x1,$fgc);
        $p2 = explode($p1[$a],$x2);
        return $p2[0];
    }
    public function index()
    {
        $db = new PDO("mysql:host=localhost;dbname=rentcarpro;charset=utf8","root","");

        $fgc = file_get_contents("https://www.araba.com/marka/");
        preg_match_all("/<span class=\"grid-list-item-subs\"><a rel=\"follow\" title=\"(.*?)\" href=\"(.*?)\">(.*?)<\/a>/i",$fgc,$sonuc);
        foreach($sonuc[0] as $key => $value)
        {
            $name = $sonuc[1][$key];
            $url  = "https://www.araba.com/".$sonuc[2][$key];
            $fgc2 = file_get_contents($url);
            $selflink = self::permalink($name);
            $insert = $db->query("insert into markas(ad,selflink,created_at,updated_at)values('".$name."','".$selflink."','2018-02-07 11:16:38','2018-02-07 11:16:38')");
            $lastid = $db->lastInsertId();
            echo "=>".$name."<br/>";

            preg_match_all("/<li class=\"lvl-4\"><a href=\"(.*?)\" title=\"(.*?)\">(.*?)<\/a><\/li>/i",$fgc2,$sonuc2);
            foreach($sonuc2[0] as $key2 => $value2) {
                $name2 = $sonuc2[3][$key2];
                $url2 = "https://www.araba.com/" . $sonuc2[1][$key2];
                $fgc3 = file_get_contents($url2);
                $selflink2 = self::permalink($name2);
                $insert2 = $db->query("insert into arac_models(markaid,ad,selflink,created_at,updated_at)values($lastid,$name2,$selflink2,'2018-02-07 11:16:38','2018-02-07 11:16:38')");
                $lastid2 = $db->lastInsertId();
                echo "=>=>".$name2."<br/>";

                preg_match_all("/<li class=\"lvl-5\"><a href=\"(.*?)\" title=\"(.*?)\">(.*?)<\/a><\/li>/i", $fgc3, $sonuc3);
                foreach ($sonuc3[0] as $key3 => $value3) {
                    $name3 = $sonuc3[3][$key3];

                    $selflink3 = self::permalink($name3);
                    echo "=>=>=>".$name3." - ".$selflink3."<br/>";
                    $insert3 = $db->query("insert into alt_models(modelid,ad,selflink,created_at,updated_at)values($lastid2,$name3,$selflink3,'2018-02-07 11:16:38','2018-02-07 11:16:38')");

                }
            }
        }

    }


    public function marka()
    {

        $db = new PDO("mysql:host=localhost;dbname=rentcarpro;charset=utf8","root","");
        $fgc = file_get_contents("https://www.araba.com/marka/");
        preg_match_all("/<span class=\"grid-list-item-subs\"><a rel=\"follow\" title=\"(.*?)\" href=\"(.*?)\">(.*?)<\/a>/i",$fgc,$sonuc);
        foreach($sonuc[0] as $key => $value) {
            $name = $sonuc[1][$key];
            $url = "https://www.araba.com/" . $sonuc[2][$key];
            $selflink = self::permalink($name);
            $insert = $db->query("insert into markas(ad,selflink,url,created_at,updated_at)values('" . $name . "','" . $selflink . "','".$url."','2018-02-07 11:16:38','2018-02-07 11:16:38')");
            echo "=>" . $url . "<br/>";
        }
    }


        public function markacek()
        {
            $db = new PDO("mysql:host=localhost;dbname=rentcarpro;charset=utf8","root","");
            $fgc = file_get_contents("https://www.araba.com/otomobil");

            preg_match_all("/<li class=\"lvl-3\"><a href=\"(.*?)\" title=\"(.*?)\">(.*?)<\/a><\/li>/i",$fgc,$sonuc2);
            foreach($sonuc2[0] as $key2 => $value2) {
                $name2 = $sonuc2[3][$key2];
                $url2 = "https://www.araba.com/" . $sonuc2[1][$key2];
                $selflink2 = self::permalink($name2);
                $c = $db->query("select * from markas where selflink='".$selflink2."'")->rowcount();
                if($c==0) {
                    $x = $db->query("insert into markas(ad,selflink,url)values('$name2','$selflink2','$url2')");
                    echo "=>".$name2." - ".$selflink2."<br/>";
                }


            }

        }


        public function aracmodel()
        {
            $db = new PDO("mysql:host=localhost;dbname=rentcarpro;charset=utf8","root","");
            $x = $db->query("select * from markas")->fetchAll(PDO::FETCH_ASSOC);
            foreach($x as $key => $value)
            {
                $url =  $value['url'];
                $insert2 = $value['id'];
                $fgc2 = file_get_contents($url);
                preg_match_all("/<li class=\"lvl-4\"><a href=\"(.*?)\" title=\"(.*?)\">(.*?)<\/a><\/li>/i",$fgc2,$sonuc2);
                foreach($sonuc2[0] as $key2 => $value2) {
                    $name2 = $sonuc2[3][$key2];
                    $url2 = "https://www.araba.com/" . $sonuc2[1][$key2];
                    $selflink2 = self::permalink($name2);

                    $c = $db->query("select * from arac_models where selflink='".$selflink2."' and markaid='".$insert2."'")->rowcount();
                    if($c==0) {
                        $x = $db->query("insert into arac_models(markaid,ad,selflink,url)values($insert2,'$name2','$selflink2','$url2')");
                        echo "=>=>=>" . $insert2 . " -" . $name2 . " - " . $selflink2 . "<br/>";
                    }

                }
            }
        }

        public function altmodel()
        {
            $db = new PDO("mysql:host=localhost;dbname=rentcarpro;charset=utf8","root","");
            $x = $db->query("select * from arac_models")->fetchAll(PDO::FETCH_ASSOC);
            foreach($x as $key => $value)
            {
                $url =  $value['url'];
                $insert3 = $value['id'];
                $fgc3 = file_get_contents($url);
                preg_match_all("/<li class=\"lvl-5\"><a href=\"(.*?)\" title=\"(.*?)\">(.*?)<\/a><\/li>/i", $fgc3, $sonuc3);
                foreach ($sonuc3[0] as $key3 => $value3) {
                    $name3 = $sonuc3[3][$key3];
                    $selflink3 = self::permalink($name3);

                    $c = $db->query("select * from alt_models where modelid='".$insert3."' and selflink='".$selflink3."'")->rowcount();
                    if($c == 0) {
                        echo "=>=>=>" . $name3 . " - " . $selflink3 . "<br/>";
                        $db->query("insert into alt_models(modelid,ad,selflink,created_at,updated_at)values($insert3,'$name3','$selflink3','2018-02-07 11:16:38','2018-02-07 11:16:38')");
                    }
                }
            }
        }




        public function fullCek()
        {
            $db = new PDO("mysql:host=localhost;dbname=rentcarpro;charset=utf8","root","");
            //$url = "https://www.araba.com/otomobil";
            //$url = "https://www.araba.com/minivan-van-panelvan";
            $url = "https://www.araba.com/arazi-suv-pick-up";
            $fgc = file_get_contents($url);
            preg_match_all("/<li class=\"lvl-3\"><a href=\"(.*?)\" title=\"(.*?)\">(.*?)<\/a><\/li>/i",$fgc,$sonuc);
            foreach($sonuc[0] as $key => $value) {
                $name = $sonuc[3][$key];
                if ($name != "Diğer") {
                    $url = "https://www.araba.com/" . $sonuc[1][$key];
                    $selflink = self::permalink($name);
                    $c = $db->query("select * from markas where selflink='" . $selflink . "'")->rowcount();
                    if ($c == 0) {
                        $x = $db->query("insert into markas(ad,selflink,url)values('$name','$selflink','$url')");
                        $last1 = $db->lastInsertId();
                    } else {
                        $w = $db->query("select * from markas where selflink='" . $selflink . "'")->fetch();
                        $last1 = $w['id'];
                    }
                    $fgc2 = file_get_contents($url);
                    ##  model ##
                    preg_match_all("/<li class=\"lvl-4\"><a href=\"(.*?)\" title=\"(.*?)\">(.*?)<\/a><\/li>/i", $fgc2, $sonuc2);
                    foreach ($sonuc2[0] as $key2 => $value2) {
                        $name2 = $sonuc2[3][$key2];
                        $url2 = "https://www.araba.com/" . $sonuc2[1][$key2];
                        $selflink2 = self::permalink($name2);

                        $c = $db->query("select * from arac_models where selflink='" . $selflink2 . "' and markaid='" . $last1 . "'")->rowcount();
                        if ($c == 0) {
                            $x = $db->query("insert into arac_models(markaid,ad,selflink,url)values($last1,'$name2','$selflink2','$url2')");
                            $last2 = $db->lastInsertId();
                        } else {
                            $w = $db->query("select * from arac_models where selflink='" . $selflink2 . "' and markaid='" . $last1 . "'")->fetch();
                            $last2 = $w['id'];
                        }
                        $fgc3 = file_get_contents($url2);
                        preg_match_all("/<li class=\"lvl-5\"><a href=\"(.*?)\" title=\"(.*?)\">(.*?)<\/a><\/li>/i", $fgc3, $sonuc3);
                        foreach ($sonuc3[0] as $key3 => $value3) {
                            $name3 = $sonuc3[3][$key3];
                            $selflink3 = self::permalink($name3);

                            $c = $db->query("select * from alt_models where modelid='" . $last2 . "' and selflink='" . $selflink3 . "'")->rowcount();
                            if ($c == 0) {
                                $db->query("insert into alt_models(modelid,ad,selflink,created_at,updated_at)values($last2,'$name3','$selflink3','2018-02-07 11:16:38','2018-02-07 11:16:38')");
                            }
                        }

                    }

                }
            }

        }









}