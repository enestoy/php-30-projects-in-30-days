<?php

try {
    $baglanti = new PDO("mysql:host=localhost;port=3306;dbname=education_api;charset=utf8", "root", "");
    $baglanti->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die($e->getMessage()); 
}

class apimiz {
    // HATALAR
    public $Hata_token = "Token Geçerli Değil";
    public $Hata_limit = "İşlem limitinize ulaştınız";
    public $Hata_yetki = "Yetki Yok";
    public $Hata_resim = "Kelime Girilmedi";
    public $Hata_sonucyok = "Kritere göre resim yok";
    public $Hata_yontem = "Yöntem hatası var.";

    // DURUMLAR
    public $Durum_olumsuz = "İşlem Başarısız";

    // GENEL DEĞİŞKENLER
    public $resimad, $resimlimit, $mevcutsorgu, $gunluklimit;

    function cevap(array $veriler) {
        echo json_encode([
            "hata" => $veriler[0],
            "durum" => $veriler[1]
        ]);
    }

    function kontrol($baglanti, array $izinlistesi, $durum = false) {
        if ($_SERVER["REQUEST_METHOD"] !== 'GET') {
            $this->cevap([$this->Hata_yontem, $this->Durum_olumsuz]);
            return false;
        }

        $input = file_get_contents("php://input");
        if (empty($input)) {
            $this->cevap([$this->Hata_token, $this->Durum_olumsuz]);
            return false;
        }

        $sonuc = json_decode($input, false);
        $gelenToken = $sonuc->token ?? null;

        if (!$gelenToken) {
            $this->cevap([$this->Hata_token, $this->Durum_olumsuz]);
            return false;
        }

        // Günlük sorgu sıfırlama
        $baglanti->prepare("
            UPDATE anahtarlar 
            SET tarih = NOW(), mevcutsorgu = 0 
            WHERE tarih < CURDATE() AND token = ?
        ")->execute([$gelenToken]);

        $stmt = $baglanti->prepare("SELECT * FROM anahtarlar WHERE token = ?");
        $stmt->execute([$gelenToken]);

        if ($stmt->rowCount() === 0) {
            $this->cevap([$this->Hata_token, $this->Durum_olumsuz]);
            return false;
        }

        $gelenbilgi = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->resimlimit = $gelenbilgi["resimlimit"];
        $this->mevcutsorgu = $gelenbilgi["mevcutsorgu"];
        $this->gunluklimit = $gelenbilgi["gunluklimit"];
        $this->resimad = $sonuc->resimad ?? null;

        if (!in_array($gelenbilgi["izin"], $izinlistesi)) {
            $this->cevap([$this->Hata_yetki, $this->Durum_olumsuz]);
            return false;
        }

        if ($this->mevcutsorgu >= $this->gunluklimit) {
            $this->cevap([$this->Hata_limit, $this->Durum_olumsuz]);
            return false;
        }

        if (!$durum) {
            $guncelle = $baglanti->prepare("UPDATE anahtarlar SET mevcutsorgu = mevcutsorgu + 1 WHERE token = ?");
            $guncelle->execute([$gelenToken]);
        }

        return true;
    }
}

$apimiz = new apimiz;

switch ($_GET["islem"] ?? '') {
    case "bilgi":
        if ($apimiz->kontrol($baglanti, [1, 2])) {
            $deger = $baglanti->query("SELECT * FROM bilgi")->fetch(PDO::FETCH_ASSOC);
            echo json_encode([
                "Ad" => $deger["ad"],
                "Yaş" => $deger["yas"],
                "Memleket" => $deger["memleket"]
            ]);
        }
        break;

    case "hava":
        if ($apimiz->kontrol($baglanti, [1, 2])) {
            $stmt = $baglanti->prepare("
                SELECT sehirler.ad AS sehirad, havadurumu.* 
                FROM sehirler 
                JOIN havadurumu ON sehirler.id = havadurumu.sehirid
            ");
            $stmt->execute();

            $json_icin = [];
            while ($veriler = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $json_icin[$veriler["sehirad"]] = [
                    "Bugün" => $veriler["bugun"],
                    "Dün" => $veriler["dun"]
                ];
            }

            echo json_encode($json_icin);
        }
        break;

    case "resim":
        if ($apimiz->kontrol($baglanti, [1, 2, 3])) {
            $resimad = $apimiz->resimad;
            if (!$resimad) {
                $apimiz->cevap([$apimiz->Hata_resim, $apimiz->Durum_olumsuz]);
            } else {
                $stmt = $baglanti->prepare("
                    SELECT * FROM resimler 
                    WHERE adveyol LIKE ? 
                    LIMIT {$apimiz->resimlimit}
                ");
                $stmt->execute(["%$resimad%"]);

                if ($stmt->rowCount() === 0) {
                    $apimiz->cevap([$apimiz->Hata_sonucyok, $apimiz->Durum_olumsuz]);
                } else {
                    $json_icin = [];
                    while ($veriler = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        $json_icin[] = $veriler["adveyol"];
                    }
                    echo json_encode($json_icin);
                }
            }
        }
        break;

    case "tokenbilgiver":
        if ($apimiz->kontrol($baglanti, [1, 2, 3], true)) {
            echo json_encode([
                "Gunluk_limit" => $apimiz->gunluklimit,
                "Mevcut_sorgu" => $apimiz->mevcutsorgu,
                "Resim_limit" => $apimiz->resimlimit
            ]);
        }
        break;

    case "tokenolustur":
        echo str_shuffle('HymgtkopERTf' . mt_rand(0, 9999990)) . "<br>";
        echo md5(mt_rand(0, 9999990)) . "<br>";
        echo md5(sha1(mt_rand(0, 9999990))) . "<br>";
        echo base64_encode(md5(sha1(mt_rand(0, 9999990)))) . "<br>";
        break;
}
