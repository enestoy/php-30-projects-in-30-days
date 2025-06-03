<?php
try {
    $baglanti = new PDO("mysql:host=localhost;dbname=education;charset=utf8", "root", "");
    $baglanti->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die($e->getMessage()); // HATA: getMessege yerine getMessage olmalı
}

class Phpsms {
    public $IM_PUBLIC_KEY, $IM_SECRET_KEY, $IM_SENDER;
    private $baglanti;

    function __construct() {
        try {
            $this->baglanti = new PDO("mysql:host=localhost;dbname=education;charset=utf8", "root", "");
            $this->baglanti->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die($e->getMessage()); // HATA: getMessege yerine getMessage olmalı
        }

        $bilgilericek = $this->baglanti->prepare("SELECT * FROM ayarlar");
        $bilgilericek->execute();
        $al = $bilgilericek->fetchAll(PDO::FETCH_ASSOC);

        if (!empty($al)) {
            $this->IM_PUBLIC_KEY = $al[0]["apikey"];
            $this->IM_SECRET_KEY = $al[0]["guvkey"];
            $this->IM_SENDER     = $al[0]["baslik"];
        }
    }

    public function bakiyekontrol() {
        $xml = '
        <request>
            <authentication>
                <username>kullanıcı ad</username>
                <password>şifre</password>
            </authentication>
        </request>';

        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL => 'https://api.iletimerkezi.com/v1/get-balance',
            CURLOPT_POST => 1,
            CURLOPT_POSTFIELDS => $xml,
            CURLOPT_SSL_VERIFYHOST => 2,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_HTTPHEADER => ['Content-Type: text/xml'],
            CURLOPT_HEADER => 0,
            CURLOPT_FOLLOWLOCATION => 1,
            CURLOPT_TIMEOUT => 120,
        ]);
        $result = curl_exec($ch);
        curl_close($ch);

        preg_match_all('|\<code\>(.*)\<\/code\>|U', $result, $code);
        preg_match_all('|\<sms\>(.*)\<\/sms\>|U', $result, $bakiye);

        if (!empty($code[1][0]) && $code[1][0] == '200') {
            echo $bakiye[0][0];
        } else {
            echo "Hata oluştu";
        }
    }

    public function send($text, $gsm) {
        $p_hash = hash_hmac('sha256', $this->IM_PUBLIC_KEY, $this->IM_SECRET_KEY);

        $xml = '
        <request>
            <authentication>
                <key>' . $this->IM_PUBLIC_KEY . '</key>
                <hash>' . $p_hash . '</hash>
            </authentication>
            <order>
                <sender>' . $this->IM_SENDER . '</sender>
                <sendDateTime></sendDateTime>
                <message>
                    <text><![CDATA[' . $text . ']]></text>
                    <receipents>
                        <number>' . $gsm . '</number>
                    </receipents>
                </message>
            </order>
        </request>';

        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL => 'https://api.iletimerkezi.com/v1/send-sms',
            CURLOPT_POST => 1,
            CURLOPT_POSTFIELDS => $xml,
            CURLOPT_SSL_VERIFYHOST => 2,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_HTTPHEADER => ['Content-Type: text/xml'],
            CURLOPT_HEADER => 0,
            CURLOPT_FOLLOWLOCATION => 1,
            CURLOPT_TIMEOUT => 120,
        ]);
        $result = curl_exec($ch);
        curl_close($ch);

        preg_match_all('|\<code\>(.*)\<\/code\>|U', $result, $matches);
        return isset($matches[1][0]) && $matches[1][0] == '200';
    }
}

class genelislemler {
    function numaralarial($baglanti) {
        $numara = $baglanti->prepare("SELECT numaralar.*, gruplar.ad AS GrupAd FROM numaralar JOIN gruplar ON numaralar.grupid=gruplar.id");
        $numara->execute();

        while ($gelenler = $numara->fetch(PDO::FETCH_ASSOC)) {
            echo '<div class="row font-weight-bold p-1">
                    <div class="col-lg-5 ">' . $gelenler["tel"] . '</div>
                    <div class="col-lg-4">' . $gelenler["GrupAd"] . ' </div>
                    <div class="col-lg-1"><a href="index.php?islem=numarasil&id=' . $gelenler["id"] . '" class="text-danger"><i class="ti-close"></i></a></div>
                    <div class="col-lg-2"><a href="index.php?islem=numaraguncelle&id=' . $gelenler["id"] . '" class="text-success"><i class="ti-reload"></i></a></div>
                </div>';
        }
    }

    function tekverial($baglanti, $tabload, $kosul) {
        $mevcutal = $baglanti->prepare("SELECT * FROM $tabload WHERE $kosul");
        $mevcutal->execute();
        return $mevcutal->fetchAll(PDO::FETCH_ASSOC);
    }

    function grupkontrol($baglanti, $tabload, $grupid) {
        $gruplar = $baglanti->prepare("SELECT * FROM $tabload");
        $gruplar->execute();
        while ($grupson = $gruplar->fetch(PDO::FETCH_ASSOC)) {
            $selected = $grupid == $grupson["id"] ? 'selected' : '';
            echo '<option value="' . $grupson["id"] . '" ' . $selected . '>' . $grupson["ad"] . '</option>';
        }
    }

    function hizliislemler($baglanti, $tabload) {
        $a = $baglanti->prepare("SELECT * FROM $tabload");
        $a->execute();
        echo '<select name="' . $tabload . '" class="form-control p-0">
                <option value="0">Seçiniz</option>';
        while ($sonuc = $a->fetch(PDO::FETCH_ASSOC)) {
            echo '<option value="' . $sonuc["id"] . '">' . $sonuc["ad"] . '</option>';
        }
        echo '</select>';
    }
}

// AJAX isteği için grup bazlı numara çekme
if (isset($_GET["islem"]) && $_GET["islem"] == "grupcek" && isset($_POST["grupid"])) {
    $a = $baglanti->prepare("SELECT * FROM numaralar WHERE grupid = :grupid");
    $a->execute(['grupid' => $_POST["grupid"]]);

    while ($sonuc = $a->fetch(PDO::FETCH_ASSOC)) {
        echo $sonuc["tel"] . "\r";
    }
}
?>
