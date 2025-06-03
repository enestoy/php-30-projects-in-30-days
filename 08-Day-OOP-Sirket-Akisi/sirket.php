<?php

require_once 'veritabani.php';

// Sirket sınıfı tanımlanıyor. Bu sınıf bir şirketi temsil eder.
class Sirket {
    // Sirket sınıfının özellikleri:
    public $id;   // Şirketin benzersiz kimlik numarası
    public $ad;   // Şirketin adı

    // Belirli bir ID'ye sahip şirketi veritabanından getiren statik metod.
    public static function getir($id) {
        // Veritabanı bağlantısını alıyoruz.
        $db = Veritabani::baglan();

        // sirketler tablosundan ID'ye göre sorgu hazırlıyoruz.
        $sorgu = $db->prepare("SELECT * FROM sirketler WHERE id = ?");

        // Sorguyu çalıştırıyoruz, parametre olarak ID'yi veriyoruz.
        $sorgu->execute([$id]);

        // Sorgu sonucunu dizi olarak çekiyoruz.
        $veri = $sorgu->fetch(PDO::FETCH_ASSOC);

        // Eğer sonuç varsa...
        if ($veri) {
            // Yeni bir Sirket nesnesi oluşturuyoruz.
            $sirket = new self();

            // Veritabanından gelen verileri nesnenin özelliklerine atıyoruz.
            $sirket->id = $veri['id'];
            $sirket->ad = $veri['ad'];

            // Nesneyi geri döndürüyoruz.
            return $sirket;
        }

        // Eğer belirtilen ID'de şirket yoksa null döndürüyoruz.
        return null;
    }
}
?>
