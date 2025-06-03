<?php

require_once 'veritabani.php';

// Calisan adında bir sınıf tanımlanıyor. Bu sınıf çalışan (personel) bilgilerini temsil eder.
class Calisan {
    // Sınıfın dört adet özelliği (property) var: id, ad, unvan ve departman_id.
    public $id;              // Çalışanın benzersiz ID numarası
    public $ad;              // Çalışanın adı
    public $unvan;           // Çalışanın unvanı (örneğin: Müdür, Sekreter)
    public $departman_id;    // Çalışanın bağlı olduğu departmanın ID numarası

    // Belirli bir ID'ye sahip çalışanın bilgilerini veritabanından getirip bir Calisan nesnesi olarak döndürür.
    public static function getir($id) {
        // Veritabanı bağlantısını alıyoruz.
        $db = Veritabani::baglan();

        // SQL sorgusunu hazırlıyoruz. Sadece tek bir çalışanı ID'ye göre seçiyoruz.
        $sorgu = $db->prepare("SELECT * FROM calisanlar WHERE id = ?");
        
        // Sorguyu çalıştırıyoruz ve ID'yi parametre olarak veriyoruz.
        $sorgu->execute([$id]);

        // Sorgu sonucunu dizi olarak alıyoruz.
        $veri = $sorgu->fetch(PDO::FETCH_ASSOC);

        // Eğer veri bulunduysa, bir Calisan nesnesi oluşturup bilgileri içine atıyoruz.
        if ($veri) {
            $calisan = new self(); // Yeni bir Calisan nesnesi oluşturuluyor.
            $calisan->id = $veri['id'];
            $calisan->ad = $veri['ad'];
            $calisan->unvan = $veri['unvan'];
            $calisan->departman_id = $veri['departman_id'];
            return $calisan; // Çalışan nesnesi döndürülüyor.
        }

        // Eğer eşleşen kayıt yoksa null döndürülüyor.
        return null;
    }

    // Veritabanındaki tüm çalışanları getirir ve her birini bir Calisan nesnesi olarak dizi içinde döndürür.
    public static function hepsiniGetir() {
        // Veritabanı bağlantısını alıyoruz.
        $db = Veritabani::baglan();

        // Tüm çalışanları seçen sorguyu çalıştırıyoruz.
        $sorgu = $db->query("SELECT * FROM calisanlar");

        // Sonuçları saklayacağımız boş bir dizi oluşturuyoruz.
        $calisanlar = [];

        // Her bir satırı döngüyle okuyup birer Calisan nesnesine çeviriyoruz.
        while ($veri = $sorgu->fetch(PDO::FETCH_ASSOC)) {
            $calisan = new self(); // Yeni bir Calisan nesnesi oluşturuluyor.
            $calisan->id = $veri['id'];
            $calisan->ad = $veri['ad'];
            $calisan->unvan = $veri['unvan'];
            $calisan->departman_id = $veri['departman_id'];
            $calisanlar[] = $calisan; // Nesne diziye ekleniyor.
        }

        // Tüm çalışan nesnelerinden oluşan dizi döndürülüyor.
        return $calisanlar;
    }
}
?>
