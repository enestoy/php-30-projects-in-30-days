<?php

class Veritabani {
    // Bu özellik, PDO bağlantısını saklar. Statik ve özel (private) olduğundan sınıf içinde tek bir bağlantı tutulur.
    private static $baglanti = null;

    // Veritabanına bağlanmak için kullanılan statik metod.
    public static function baglan() {
        // Eğer daha önce bağlantı oluşturulmamışsa (null ise) yeni bağlantı yap.
        if (self::$baglanti === null) {
            // Veritabanı bağlantısı için gerekli bilgiler:
            $host = 'localhost';              // Veritabanı sunucusu
            $dbname = 'php_oop_company';      // Veritabanı adı
            $kullanici = 'root';              // Veritabanı kullanıcı adı
            $sifre = '';                      // Veritabanı şifresi (boş bırakılmış)

            // DSN (Data Source Name) oluşturuluyor. MySQL için gerekli bilgiler burada birleştirilir.
            $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

            // PDO ile veritabanına bağlanıyoruz ve bağlantı nesnesini self::$baglanti içine atıyoruz.
            self::$baglanti = new PDO($dsn, $kullanici, $sifre);

            // Hata ayarlarını yapılandırıyoruz: PDO hata verdiğinde Exception fırlatacak.
            self::$baglanti->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        // Mevcut bağlantı nesnesini döndürüyoruz (önceden oluşturulmuşsa yeniden yeni bağlantı oluşturmaz).
        return self::$baglanti;
    }
}
?>
