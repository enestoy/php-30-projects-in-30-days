<?php

try {
    $baglanti = new PDO("mysql:host=localhost;dbname=php_il_ilce;charset=utf8", "root", "");
    $baglanti->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die($e->getMessage());
}

function ilgetir($baglanti)
{
    echo '<option value="0">Seçiniz..</option>';
    $ilbak = $baglanti->prepare("SELECT * FROM cities");
    $ilbak->execute();
    while ($illerson = $ilbak->fetch(PDO::FETCH_ASSOC)):
        echo '<option value="' . $illerson["id"] . '">' . $illerson["name"] . '</option>';
    endwhile;
}




@$islem = $_GET["islem"];

switch ($islem):

    case "getir":
        $dizi = array();

        $gelen_ili_idsi = $_POST["deger"];

        if (isset($gelen_ili_idsi)):
            $ilcebak = $baglanti->prepare("SELECT * FROM districts where city_id=$gelen_ili_idsi");
            $ilcebak->execute();
            while ($ilcelerson = $ilcebak->fetch(PDO::FETCH_ASSOC)):

                $dizi[] = '<option value="' . $ilcelerson["name"] . '">' . $ilcelerson["name"] . '</option>';

            endwhile;
            print_r($dizi);

        endif;

        break;

endswitch;
