<?php
/* 
$_FILES['file-upload'][name];     Gönderilen dosyanın adı 
$_FILES['file-upload'][type];     gönderilen dosyanın tipi
$_FILES['file-upload'][tmp_name]; geçici olarak sunucuda barındırdığı adres
$_FILES['file-upload'][size];     gonderilen dosyanın bayt cinsinden boyutu
$_FILES['file-upload'][error];     gönderilen dosyanın hata kodu var mı

*/

if(isset($_FILES["file-upload"])):
    $hata = $_FILES["file-upload"]["error"];
    if($hata !=0){
        echo "Yükleme sırasında hata oluştu.";

    }else{
        $boyut = $_FILES["file-upload"]["size"];
        if($boyut>(1024*1024*5)){
            echo 'Dosya 5 mb yüksek olamaz.';
        }
        else{
            $tip = $_FILES["file-upload"]["type"];
            $isim = $_FILES["file-upload"]["name"];

            $uzanti = explode(".",$isim);
            $uzanti = $uzanti[count($uzanti)-1];

            $dosyaformati= array("image/png","image/jpeg","image/gif");

            if(!in_array($tip,$dosyaformati)){
                echo "Yalnız png, jpeg ve gif dosyalarına izin var."."<br>";
                echo "Yüklenen Tip: ".$tip;

            }else{
                $dosya = $_FILES["file-upload"]["tmp_name"];

                // move_uploaded_file($dosya,'dosya/'.$isim);
                // copy($dosya,'dosya/'.$isim);

/*                 
                $tarih = date("d.m.Y");
                move_uploaded_file($dosya,'dosya/'.$tarih.".".$uzanti); */

                $olustur = md5(mt_rand(0,100));
                move_uploaded_file($dosya,'files/'.$olustur.".".$uzanti);

                echo "Dosyanız yüklenmiştir.";
            }
        }
    }



endif;


// Multiple Files Upload Kısmı
if (isset($_FILES["multiple-file-upload"])): 
    $files = $_FILES["multiple-file-upload"];
    $file_count = count($files["name"]);
    
    for ($i = 0; $i < $file_count; $i++) {
        $hata = $files["error"][$i];
        if ($hata != 0) {
            echo "{$files['name'][$i]} yüklenirken hata oluştu.<br>";
            continue;
        }

        $boyut = $files["size"][$i];
        if ($boyut > (1024 * 1024 * 5)) {
            echo "{$files['name'][$i]} 5 MB yüksek olamaz.<br>";
            continue;
        }

        $tip = $files["type"][$i];
        $isim = $files["name"][$i];

        $uzanti = explode(".", $isim);
        $uzanti = $uzanti[count($uzanti) - 1];

        $dosyaformati = array("image/png", "image/jpeg", "image/gif");

        if (!in_array($tip, $dosyaformati)) {
            echo "{$isim}: Yalnız png, jpeg ve gif dosyalarına izin var.<br>";
            continue;
        }

        $dosya = $files["tmp_name"][$i];
        $olustur = md5(mt_rand(0, 100));
        if (move_uploaded_file($dosya, 'files/' . $olustur . "." . $uzanti)) {
            echo "{$isim} başarıyla yüklendi.<br>";
        } else {
            echo "{$isim} yüklenemedi.<br>";
        }
    }
endif;


?>