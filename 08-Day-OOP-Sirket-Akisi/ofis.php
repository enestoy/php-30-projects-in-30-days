<?php

require_once 'veritabani.php';

// Ofis sınıfı tanımlanıyor. Bu sınıf bir ofisi temsil eder.
class Ofis {
    // Ofis sınıfının özellikleri:
    public $id;         // Ofisin benzersiz kimlik numarası
    public $adres;      // Ofisin adres bilgisi
    public $sirket_id;  // Ofisin bağlı olduğu şirketin ID'si
    public $tur;        // Ofisin türü (örneğin: Merkez, Şube gibi)

    // Belirli bir ID'ye sahip ofisin veritabanından çekilmesi için statik metod
    public static function getir($id) {
        // Veritabanına bağlanıyoruz.
        $db = Veritabani::baglan();

        // 'ofisler' tablosundan, belirtilen ID'ye ait satırı seçiyoruz.
        $sorgu = $db->prepare("SELECT * FROM ofisler WHERE id = ?");
        
        // Sorguyu çalıştırırken ID'yi parametre olarak veriyoruz.
        $sorgu->execute([$id]);

        // Sorgudan dönen sonucu dizi olarak alıyoruz.
        $veri = $sorgu->fetch(PDO::FETCH_ASSOC);

        // Eğer veri varsa:
        if ($veri) {
            // Yeni bir Ofis nesnesi oluşturuyoruz.
            $ofis = new self();

            // Veritabanından gelen verileri nesnenin özelliklerine atıyoruz.
            $ofis->id = $veri['id'];
            $ofis->adres = $veri['adres'];
            $ofis->sirket_id = $veri['sirket_id'];
            $ofis->tur = $veri['tur'];

            // Ofis nesnesini döndürüyoruz.
            return $ofis;
        }

        // Eğer belirtilen ID'de ofis yoksa null döndürüyoruz.
        return null;
    }
}
?>
