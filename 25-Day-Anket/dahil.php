<?php
session_start();
$veritabani = new mysqli("localhost", "root", "", "education_anket");
$veritabani->set_charset("utf8");

class AnketAna {

    public function girisKontrol($db) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['buton'], $_POST['sifre'])) {
            $sifre = trim(htmlspecialchars($_POST["sifre"]));

            $stmt = $db->prepare("SELECT * FROM veriler WHERE sifre = ?");
            $stmt->bind_param("s", $sifre);
            $stmt->execute();
            $result = $stmt->get_result();
            $veri = $result->fetch_assoc();

            if ($veri) {
                $_SESSION["giris"] = $veri["sifre"];
                echo "GİRİŞ BAŞARILI, ANKETE YÖNLENDİRİLİYORSUNUZ...";
                header("Refresh: 3; URL=anket.php");
                exit;
            } else {
                echo "GEÇERSİZ KOD";
                header("Refresh: 3; URL=index.php");
                exit;
            }
        } else {
            echo "HATALI TALEP";
            header("Refresh: 3; URL=index.php");
            exit;
        }
    }

    public function anketAl($db) {
        if (!isset($_SESSION["giris"])) {
            echo "OTURUM YOK!";
            header("Refresh: 3; URL=index.php");
            exit;
        }

        $sifre = $_SESSION["giris"];
        $stmt = $db->prepare("SELECT * FROM veriler WHERE sifre = ?");
        $stmt->bind_param("s", $sifre);
        $stmt->execute();
        $sonuc = $stmt->get_result();
        $veri = $sonuc->fetch_assoc();

        $ip = $_SERVER['REMOTE_ADDR'];
        $anketId = $veri["id"];

        $ipKontrol = $db->prepare("SELECT id FROM ipkontrol WHERE anketid = ? AND ip = ?");
        $ipKontrol->bind_param("is", $anketId, $ip);
        $ipKontrol->execute();
        $ipSonuc = $ipKontrol->get_result();

        if ($ipSonuc->num_rows === 0) {
            include("form-anket.php"); // Anket formu ayrı dosyaya taşındı
        } else {
            include("sonuc-anket.php"); // Sonuçları gösteren ayrı dosya
        }
    }

    public function oyVer($db) {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST["oyver"], $_POST["oy"], $_POST["anketid"]) || !isset($_SESSION["giris"])) {
            echo "HATA OLUŞTU";
            header("Refresh: 3; URL=index.php");
            exit;
        }

        $oy = $_POST["oy"];
        $anketId = (int)$_POST["anketid"];
        $sutun = match($oy) {
            "sec1" => "oy1",
            "sec2" => "oy2",
            "sec3" => "oy3",
            "sec4" => "oy4",
            default => null
        };

        if (!$sutun) {
            echo "GEÇERSİZ OY SEÇENEĞİ";
            header("Refresh: 3; URL=anket.php");
            exit;
        }

        $stmt = $db->prepare("SELECT * FROM oylama WHERE anketid = ?");
        $stmt->bind_param("i", $anketId);
        $stmt->execute();
        $sonuc = $stmt->get_result();

        if ($sonuc->num_rows === 0) {
            $ekle = $db->prepare("INSERT INTO oylama (anketid, $sutun) VALUES (?, 1)");
            $ekle->bind_param("i", $anketId);
            $ekle->execute();
        } else {
            $guncelle = $db->prepare("UPDATE oylama SET $sutun = $sutun + 1 WHERE anketid = ?");
            $guncelle->bind_param("i", $anketId);
            $guncelle->execute();
        }

        $ip = $_SERVER['REMOTE_ADDR'];
        $ipEkle = $db->prepare("INSERT INTO ipkontrol (anketid, ip) VALUES (?, ?)");
        $ipEkle->bind_param("is", $anketId, $ip);
        $ipEkle->execute();

        echo "OYUNUZ ALINDI. TEŞEKKÜRLER!";
        header("Refresh: 3; URL=anket.php");
        exit;
    }
}
?>
