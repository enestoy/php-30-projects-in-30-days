<?php

require_once 'veritabani.php';

// Calisan.php dosyasını dahil ediyoruz.
// Bu sayede Departman sınıfı, Calisan sınıfını kullanarak yönetici bilgilerini çekebilir.
require_once 'Calisan.php';

// Departman adında bir sınıf tanımlıyoruz. Bu sınıf, bir departmanı temsil eder.
class Departman {
    // Departman sınıfının özellikleri (öz nitelikleri):
    public $id;            // Departmanın benzersiz ID numarası
    public $ad;            // Departmanın adı (örneğin: Muhasebe, Satış)
    public $sirket_id;     // Departmanın ait olduğu şirketin ID'si
    public $yonetici_id;   // Departmanın yöneticisinin (çalışan ID'si) numarası

    // Belirli bir ID'ye sahip departmanı veritabanından getirip bir Departman nesnesi olarak döndürür.
    public static function getir($id) {
        // Veritabanı bağlantısını alıyoruz.
        $db = Veritabani::baglan();

        // Departmanlar tablosundan sadece ilgili ID'ye sahip satırı seçiyoruz.
        $sorgu = $db->prepare("SELECT * FROM departmanlar WHERE id = ?");
        $sorgu->execute([$id]); // Sorguyu parametre ile çalıştırıyoruz.
        $veri = $sorgu->fetch(PDO::FETCH_ASSOC); // Sonucu dizi olarak alıyoruz.

        // Eğer veri bulunduysa...
        if ($veri) {
            $d = new self(); // Yeni bir Departman nesnesi oluşturuyoruz.
            $d->id = $veri['id'];
            $d->ad = $veri['ad'];
            $d->sirket_id = $veri['sirket_id'];
            $d->yonetici_id = $veri['yonetici_id'];
            return $d; // Departman nesnesi döndürülüyor.
        }

        // Eğer veri bulunamazsa null döndürülüyor.
        return null;
    }

    // Departmanın yöneticisini (bir çalışan olarak) getirir.
    public function yoneticiGetir() {
        // Calisan sınıfındaki getir() fonksiyonu çağrılır,
        // Bu departmanın yonetici_id bilgisiyle yöneticiyi bulur ve döndürür.
        return Calisan::getir($this->yonetici_id);
    }
}
?>
