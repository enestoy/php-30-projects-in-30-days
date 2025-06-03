-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 02 Haz 2025, 16:55:31
-- Sunucu sürümü: 10.4.32-MariaDB
-- PHP Sürümü: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `education`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `anliksepet`
--

CREATE TABLE `anliksepet` (
  `id` int(11) NOT NULL,
  `uyeid` int(11) NOT NULL,
  `urunad` varchar(20) NOT NULL,
  `fiyat` int(11) NOT NULL,
  `adet` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayarlar`
--

CREATE TABLE `ayarlar` (
  `id` int(11) NOT NULL,
  `apikey` varchar(50) NOT NULL,
  `guvkey` varchar(70) NOT NULL,
  `baslik` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `ayarlar`
--

INSERT INTO `ayarlar` (`id`, `apikey`, `guvkey`, `baslik`) VALUES
(1, 'f82a8db2689611b4ecb099a5d65cc817', '7c05b177a4af4746ffc962b8e0157128bec1de8dffb2fefdcce7b7c0f02f9c05', 'enestoy');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `giris`
--

CREATE TABLE `giris` (
  `id` int(11) NOT NULL,
  `ad` varchar(20) NOT NULL,
  `pas` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `giris`
--

INSERT INTO `giris` (`id`, `ad`, `pas`) VALUES
(1, 'QUİZ 1.AŞAMA', '123');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `giris2`
--

CREATE TABLE `giris2` (
  `id` int(11) NOT NULL,
  `ad` varchar(20) NOT NULL,
  `pas` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `giris2`
--

INSERT INTO `giris2` (`id`, `ad`, `pas`) VALUES
(1, 'QUİZ 2.AŞAMA', 'ZomP697');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `giris3`
--

CREATE TABLE `giris3` (
  `id` int(11) NOT NULL,
  `ad` varchar(20) NOT NULL,
  `pas` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `giris3`
--

INSERT INTO `giris3` (`id`, `ad`, `pas`) VALUES
(1, 'QUİZ 3.AŞAMA', 'nuZfg632');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `giris4`
--

CREATE TABLE `giris4` (
  `id` int(11) NOT NULL,
  `ad` varchar(20) NOT NULL,
  `pas` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `giris4`
--

INSERT INTO `giris4` (`id`, `ad`, `pas`) VALUES
(1, 'QUİZ 4.AŞAMA', 'KopTy540');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `gruplar`
--

CREATE TABLE `gruplar` (
  `id` int(11) NOT NULL,
  `ad` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `gruplar`
--

INSERT INTO `gruplar` (`id`, `ad`) VALUES
(1, 'Ayakkabı'),
(2, 'Çanta'),
(3, 'Saat'),
(4, 'Aralık Kampanya'),
(6, '2020 Yeni uyeler'),
(55, 'Standart');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kayitlar`
--

CREATE TABLE `kayitlar` (
  `id` int(11) NOT NULL,
  `ad` varchar(240) NOT NULL,
  `durum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `kayitlar`
--

INSERT INTO `kayitlar` (`id`, `ad`, `durum`) VALUES
(20, 'telefon', 1),
(21, 'terlik', 1),
(22, 'araba', 1),
(23, 'dolap', 0),
(24, 'bilgisayar', 0),
(25, 'kapı', 0),
(26, 'kumanda', 0),
(27, 'umdey', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `menuler`
--

CREATE TABLE `menuler` (
  `id` int(10) UNSIGNED NOT NULL,
  `ustid` int(10) UNSIGNED NOT NULL,
  `menuadi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `menuler`
--

INSERT INTO `menuler` (`id`, `ustid`, `menuadi`) VALUES
(29, 0, 'Giyim'),
(30, 29, 'Erkek'),
(31, 29, 'Kadın'),
(32, 30, 'Tişört'),
(33, 31, 'Elbise'),
(34, 0, 'Bilgisayar'),
(35, 34, 'fare'),
(36, 35, 'Koruyucu');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `musteriler`
--

CREATE TABLE `musteriler` (
  `id` int(11) NOT NULL,
  `ad` varchar(50) DEFAULT NULL,
  `soyad` varchar(50) DEFAULT NULL,
  `urun` varchar(50) DEFAULT NULL,
  `adet` int(11) DEFAULT NULL,
  `fiyat` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `musteriler`
--

INSERT INTO `musteriler` (`id`, `ad`, `soyad`, `urun`, `adet`, `fiyat`) VALUES
(1, 'Enes', 'Toy', 'Mouse', 2, 150.00),
(2, 'Zeynep', 'Kaya', 'Klavye', 1, 200.00),
(3, 'Ahmet', 'Demir', 'Monitör', 1, 1200.00),
(4, 'Ayşe', 'Yılmaz', 'USB Bellek', 3, 75.00),
(5, 'Mehmet', 'Çelik', 'Webcam', 2, 320.00),
(6, 'Elif', 'Arslan', 'Kulaklık', 1, 180.00),
(7, 'Burak', 'Şahin', 'Mikrofon', 2, 270.00),
(8, 'Fatma', 'Koç', 'Laptop Soğutucu', 1, 140.00),
(9, 'Emre', 'Aksoy', 'Masa Lambası', 1, 110.00),
(10, 'Gamze', 'Öztürk', 'Ethernet Kablosu', 5, 25.00);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `numaralar`
--

CREATE TABLE `numaralar` (
  `id` int(11) NOT NULL,
  `tel` bigint(11) NOT NULL,
  `grupid` int(11) NOT NULL DEFAULT 55
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `numaralar`
--

INSERT INTO `numaralar` (`id`, `tel`, `grupid`) VALUES
(1, 5456833933, 1),
(2, 5417799394, 2),
(3, 5345578747, 3),
(5, 5435747005, 4),
(24, 5059118007, 6),
(23, 5525663130, 6),
(22, 5418965948, 4),
(21, 5319897142, 1),
(20, 5536086239, 55);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ogrenciler`
--

CREATE TABLE `ogrenciler` (
  `id` int(11) NOT NULL,
  `ogretmen` varchar(255) NOT NULL,
  `ogrencino` varchar(50) NOT NULL,
  `ad` varchar(100) NOT NULL,
  `soyad` varchar(100) NOT NULL,
  `anneAd` varchar(100) DEFAULT NULL,
  `babaAd` varchar(100) DEFAULT NULL,
  `kardessayi` int(11) DEFAULT 0,
  `sinif` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `ogrenciler`
--

INSERT INTO `ogrenciler` (`id`, `ogretmen`, `ogrencino`, `ad`, `soyad`, `anneAd`, `babaAd`, `kardessayi`, `sinif`) VALUES
(1, 'İsmail', '1', 'Ahmet', 'Yılmaz', 'Ayşe', 'Hüseyin', 3, '9B'),
(2, 'Tarık', '2', 'Necip', 'Koçer', 'Nermin', 'Kemal', 2, '11C');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sablonlar`
--

CREATE TABLE `sablonlar` (
  `id` int(11) NOT NULL,
  `ad` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `sablonlar`
--

INSERT INTO `sablonlar` (`id`, `ad`) VALUES
(1, 'Bayramınız mübarek olsun.'),
(2, '%30 indirim başladı.'),
(3, 'Hosgeldiniz'),
(4, 'Udemy sms eğitim videoları çekiliyor. Çok yakında eklenecektir.');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `siparis`
--

CREATE TABLE `siparis` (
  `id` int(11) NOT NULL,
  `uyeid` int(11) NOT NULL,
  `urunad` varchar(20) NOT NULL,
  `fiyat` int(11) NOT NULL,
  `adet` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `siparis`
--

INSERT INTO `siparis` (`id`, `uyeid`, `urunad`, `fiyat`, `adet`) VALUES
(7, 1, 'lamba', 34, '1'),
(6, 1, 'kabak', 23, '1'),
(5, 1, 'Koltuk', 5, '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sorular`
--

CREATE TABLE `sorular` (
  `id` int(11) NOT NULL,
  `soru` varchar(70) NOT NULL,
  `cevap1` varchar(70) NOT NULL,
  `cevap2` varchar(70) NOT NULL,
  `cevap3` varchar(70) NOT NULL,
  `cevap4` varchar(70) NOT NULL,
  `dc` varchar(70) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `sorular`
--

INSERT INTO `sorular` (`id`, `soru`, `cevap1`, `cevap2`, `cevap3`, `cevap4`, `dc`) VALUES
(2, 'Hangi değişken tanımlaması yanlıştır.', '$veri=5;', '$veri=\"5\";', '$veri7=5;', '$1veri=5;', '$1veri=5;'),
(3, 'Naber', 'iyi', 'fena', 'orta', 'kötü', 'iyi'),
(4, 'Sabit değişkenler hangi kod ile tanımlanır.', 'dafine', 'define', 'defina', 'defined', 'define'),
(5, 'Aritmetik operatörlerden hangisi önceliklidir.', '/', '-', '*', '+', '*'),
(6, 'Hangisi KALAN anlamındaki semboldür.', '/%/', '/*', '//', '%', '%'),
(7, 'Aşağıdakilerden hangisi $a=$a+8; işleminin kısa halidir.', '$a=+8;', '$a+=8;', '$a++=8;', '$a=++8;', '$a+=8;'),
(8, 'Hangisi sonradan arttırımdır.', '$b+=+;', '$b++;', '++$b;', '+$b;', '$b++;'),
(9, 'Hata bastırma operatörü hangisidir.', '?', '&', '@', '#', '@'),
(10, 'Hangisi hem verinin türünün hemde değerinin aynı olmasını ister.', '==', '=/=', '===', '/==', '==='),
(11, 'Hangisi eşit değilse demektir.', '=!=', '==!', '!=', '!!=', '!='),
(12, 'Hangisi veri tipi floattır.', '$deger=\"5\";', '$deger=6;', '$deger=false;', '$deger=125.5;', '$deger=125.5;'),
(13, 'İşleç önceliği hangi sembol ile kontrol edilir.', '[]', '{}', '()', '<>', '()'),
(14, 'Tarih komutu hangisinde doğru yazılmıştır.', 'date(d.m.Y);', 'date(\'d.m.Y\');', 'date = d.m.Y;', 'dete(\'d.m.Y\');', 'date(\'d.m.Y\');'),
(15, 'Hangisi bağlama imleci olarak kullanılmaktadır.', '*', '<', '.', ':', '.'),
(16, 'Hangisi tekli satır açıklama işaretidir.', '/*/', '*//', '/*', '//', '//'),
(17, 'Hangisi ekrana çıktı almamıza yarar.', 'ECHO', 'echo', 'acho', 'echö', 'echo'),
(18, 'Tırnak atlatma işareti hangisidir.', '?', '=/', '\\', '^', '\\'),
(19, 'Sabit değişkenin var olup olmadığını hangi komutla sorguyabiliriz.', 'default', 'define', 'rafine', 'defined', 'defined'),
(20, 'Hangisi atama operatörü değildir.', '++=', '/=', '-=', '+=', '++='),
(21, 'Php\'yi gerçekten seviyor musun ?', 'Isınıyorum', 'Bazen sinir ediyor', 'Çok seviyorum', 'Sevmiyorum', 'Çok seviyorum');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sorular2`
--

CREATE TABLE `sorular2` (
  `id` int(11) NOT NULL,
  `soru` varchar(70) NOT NULL,
  `cevap1` varchar(70) NOT NULL,
  `cevap2` varchar(70) NOT NULL,
  `cevap3` varchar(70) NOT NULL,
  `cevap4` varchar(70) NOT NULL,
  `dc` varchar(70) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `sorular2`
--

INSERT INTO `sorular2` (`id`, `soru`, `cevap1`, `cevap2`, `cevap3`, `cevap4`, `dc`) VALUES
(2, 'Hangi karşılaştırma operatörü eşit değildir anlamındadır.', '$a<>$b', '$a!>$b', '$a!==$b', '$a<!>$b', '$a<>$b'),
(3, 'Hangi işaret olumsuzluk anlamı verir.', '#', '?', '!', '/', '!'),
(4, 'Hangi mantıksal işleç veya demektir.', '$a xor $b', '$a && $b', '$a & $b', '$a || $b', '$a || $b'),
(5, 'Mantıksal işleç olan and\'in sembılü hangisidir.', '&', '%&', '||', '&&', '&&'),
(6, 'Switch komutunda sorguyu kesme kodu hangisidir.', 'case', 'default', 'goto', 'break', 'break'),
(7, 'Hangi array tanımlaması doğrudur.', '$kalem=(array);', '$kalem array[];', '$kalem=array();', '$kalem[/kursun/];', '$kalem=array();'),
(8, 'Diziyi silmek için hangi kod kullanılır.', 'arrayset()', 'unlink()', 'unarray()', 'unset()', 'unset()'),
(9, 'Hangisi dizinin sonuna veri ekler.', 'array_add', 'array_rand', 'array_push', 'array_ekle', 'array_push'),
(10, 'Hangisi bir diziden rastgele veri döndürür.', 'array_random', 'array_rand', 'array_come', 'array_turn', 'array_rand'),
(11, 'Bir dizi içerisindeki verilerin toplamını nasıl öğrenebiliriz.', 'sum()', 'topla()', 'count()', 'avg()', 'count()'),
(12, 'Bir diziyi belirtilen değerler ile doldurun komut hangisidir.', 'array_push()', 'array_fill()', 'in_array()', 'add_array()', 'array_fill()'),
(13, 'İki dizinin verilerinin, farklı olanını hangisi bulur.', 'array_push();', 'array_count();', 'array_diff();', 'array_fill();', 'array_diff();'),
(14, 'Dizinin içerisindeki verileri döndüren döngü hangisidir.', 'while', 'for', 'foreach', 'do wihle', 'foreach'),
(15, 'While döngüsü ile Do-while döngüsü arasında fark nedir.', 'While döngüsü daha hızlıdır.', 'Do-while döngüsü sadece dizi döndürür.', 'Do-while döngüsü her koşulda 1 kere çalışır.', 'Bilmiyorum', 'Do-while döngüsü her koşulda 1 kere çalışır.'),
(16, 'Hangisi foreach döngüsünün yanlış yazılımıdır.', 'foreach ($dizi as $deger)', 'foreach ($dizi as $key => $deger)', 'foreach ($dizi and $deger)', 'foreach (array(1,2,3) as $deger)', 'foreach ($dizi and $deger)'),
(17, 'Goto komutu ne işe yarar.', 'Sadece for döngüsü içerisinde çalışır.', 'Sadece while döngüsü içerisinde çalışır.', 'Sayfanın belirli bir bölümüne atlamamızı sağlar.', 'Döngüleri bitirmeye yarar. Başka bir işe yaramaz.', 'Sayfanın belirli bir bölümüne atlamamızı sağlar.'),
(18, 'Diziler en fazla kaç eleman alabilir.', 'En fazla 100', 'En fazla 50', 'En fazla 10', 'Sınırsız', 'Sınırsız'),
(19, 'Dizilerde eleman sayısı kaçtan başlar.', '-1', '1', '0', '2', '0'),
(20, 'Dizilerde en son veriye hangi kod gider.', 'prev();', 'theend();', 'end();', 'array_end();', 'end();'),
(21, 'Prev komutunun işlevi nedir.', 'En baştaki veriye gider.', 'Sondan bir önceki veriye gider.', 'Bir sonraki veriye gider.', 'Bir önceki veriye gider.', 'Bir önceki veriye gider.');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sorular3`
--

CREATE TABLE `sorular3` (
  `id` int(11) NOT NULL,
  `soru` varchar(70) NOT NULL,
  `cevap1` varchar(70) NOT NULL,
  `cevap2` varchar(70) NOT NULL,
  `cevap3` varchar(70) NOT NULL,
  `cevap4` varchar(70) NOT NULL,
  `dc` varchar(70) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `sorular3`
--

INSERT INTO `sorular3` (`id`, `soru`, `cevap1`, `cevap2`, `cevap3`, `cevap4`, `dc`) VALUES
(1, 'Bir dizgeyi hangisi parçalara ayırır.', 'implode', 'explode', 'trim', 'strlen', 'explode'),
(2, 'Veriyi temizleyeme yarayan kod hangisidir.', 'implode', 'strtoupper', 'trim', 'ucwords', 'trim'),
(3, 'Bir dizgenin belirli bölümünü hangisi döndürür.', 'strtoupper', 'floor ', 'ceil', 'substr', 'substr'),
(4, 'Hangisi bir verinin ilk harfini büyük yapar.', 'ucfirst', 'ucwords', 'strtolower', 'strtoupper', 'ucfirst'),
(5, 'Bir veriye istenilen yeri istenilen veri ile hangisi değiştirir.', 'str_split', 'strlen', 'str_replace', 'floor ', 'str_replace'),
(6, 'Hangisi float değeri her koşulda aşağı  yuvarlar.', 'round', 'ceil', 'floor', 'min', 'floor'),
(7, 'Bir dizgenin uzunluğunu hangisi verir.', 'str_replace', 'str_split', 'strlen', 'mt_rand', 'strlen'),
(8, 'Hangisi klasör oluşturur.', 'rmdir', 'touch', 'mkdir', 'fopen', 'mkdir'),
(9, 'Hangisi klasör siler.', 'touch', 'file_exis', 'rmdir', 'feof', 'rmdir'),
(10, 'Hangisi hedef dosyanın sonuna kadar gider.', 'fopen', 'fwrite', 'feof', 'fgets', 'feof'),
(11, 'Dosyanın varlığını hangisi kontrol eder.', 'copy', 'require', 'rename', 'file_exists', 'file_exists'),
(12, 'Hangisi dosya oluşturur.', 'fwrite', 'fgets', 'include', 'touch', 'touch'),
(13, 'Hangisi dosyayı satır satır okur.', 'fwrite', 'fread', 'fgets', 'feof', 'fgets'),
(14, 'Dosya açma kiplerinden r+ ne yapar.', 'Dosyayı okumak için açar.', 'Dosyayı hem okumak hem de yazmak için açar.', 'Dosyayı okumak için açar, içeriğini siler.', 'Sadece yazmak için açar.', 'Dosyayı hem okumak hem de yazmak için açar.'),
(15, 'Bir dosyanın dosya olup olmadığı nasıl kontrol edilir.', 'is_file', 'is_bool', 'var_file', 'unset', 'is_file'),
(16, 'Die komutu ne yapar', 'Çalıştırılan bir sorgunun olumsuz sonucuna bakar.', 'Sorguyu öldürür.', 'Başka sorgu çalıştırır.', 'Açıklama satırıdır.', 'Çalıştırılan bir sorgunun olumsuz sonucuna bakar.'),
(17, 'Hangisi dosya isimini değiştirmeye yarar.', 'change', 'copy', 'rename', 'dename', 'rename'),
(18, 'Hangisi dosyaya veri yazma kodudur.', 'feof', 'fwrite', 'fwhite', 'fclose', 'fwrite'),
(19, 'Hangisi dosyayı siler', 'isset', 'unlink', 'empty', 'is_file', 'unlink'),
(20, 'Açılan dosya kapatılmalı mıdır.', 'Gerek yok zaten sunucu kapatıyor. ', 'Kesinlikle close ile kapatılmalıdır.', 'Kapatsakta olur kapatmasakta', 'Bazen kapatılabilir.', 'Kesinlikle close ile kapatılmalıdır.');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sorular4`
--

CREATE TABLE `sorular4` (
  `id` int(11) NOT NULL,
  `soru` varchar(70) NOT NULL,
  `cevap1` varchar(70) NOT NULL,
  `cevap2` varchar(70) NOT NULL,
  `cevap3` varchar(70) NOT NULL,
  `cevap4` varchar(70) NOT NULL,
  `dc` varchar(70) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `sorular4`
--

INSERT INTO `sorular4` (`id`, `soru`, `cevap1`, `cevap2`, `cevap3`, `cevap4`, `dc`) VALUES
(1, 'Hangisi formda doldurulması zorunlu alan kodudur.', 'required', 'placeholder', 'readonly', 'max', 'required'),
(2, 'Forma verilerin güvenli taşınmasını sağlayan method hangisidir.', 'GET', 'PUT', 'POST', 'SERVER', 'POST'),
(3, 'Session nasıl başlatılır.', 'session_go', 'session_bom', 'session_start', 'session', 'session_start'),
(4, 'Cookie nasıl tanımlanır.', 'setcok', 'setcookie', '$_COOKIE', 'cookie', 'setcookie'),
(5, 'Hangisi bir class\'ı miras almızı sağlar.', 'self', 'parent', 'extends', 'namespace', 'extends'),
(6, 'Hangisi bir class\'ı miras almamızı engeller.', 'end', 'final', 'finish', 'private', 'final'),
(7, 'Hangi veriler sadece tanımlanan sınıf içerisinde erişilebilir.', 'protected', 'private', 'public', 'static', 'private'),
(8, 'Hangisi miras alınan class\'ın verilerine kolay ulaşımdır.', 'self', 'parent', 'public', 'protected', 'parent'),
(9, 'Hangisi kurucu bildirimdir.', '__destruct', '__execute', '__construct', '__start', '__construct'),
(10, 'Hangisi aralık sağlayan mysql kodudur.', 'IN', 'LIMIT', 'BETWEEN', 'LIKE', 'BETWEEN'),
(11, 'Belirli sayıda veri çekmemizi hangisi sağlar', 'MAX', 'SELECT', 'END', 'LIMIT', 'LIMIT'),
(12, 'Hangisi bir düzene göre veri çekmemize yardımcı olur.', 'Not', 'lower', 'order by', 'asc', 'order by'),
(13, 'Prepare kodu ne yapar.', 'Sorguyu çalıştırır.', 'Sorguyu ön belleğe alır denetler.', 'Listeme yapar.', 'Dizi haline getirir.', 'Sorguyu ön belleğe alır denetler.'),
(14, 'Hangisi sayısal veriyi büyükten küçüğe sıralar.', 'asc', 'not', 'ın', 'desc', 'desc'),
(15, 'Hangisi aritmetik ortalamayı alır.', 'Sum', 'Max', 'Min', 'Avg', 'Avg'),
(16, 'Tekrarlanan verileri eleyen kod hangisidir.', 'HAVİNG', 'GROUP BY', 'DISTINCT', 'ORDER', 'DISTINCT'),
(17, 'Group By\'ın kankası hangisidir.', 'DISTINCT', 'WHERE', 'HAVİNG', 'LIMIT', 'HAVİNG'),
(18, 'Mysql sorgusunu hangisi çalıştırır.', 'get_result', 'bind_param', 'execute', 'fetch', 'execute'),
(19, 'Gelen verileri bir dizi haline görmek için hangi kod ?', 'get_result', 'bind_result', 'fetch_assoc', 'execute', 'fetch_assoc'),
(20, 'Veri ekleme kodu hangisinde doğrudur.', 'İnsert tablo into', 'İnsert into tablo set ad=$ad', 'insert into * tablo ()', 'insert into tablo () VALUES ()', 'insert into tablo () VALUES ()');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urunler`
--

CREATE TABLE `urunler` (
  `id` int(11) NOT NULL,
  `urunad` varchar(20) NOT NULL,
  `fiyat` int(11) NOT NULL,
  `resim` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `urunler`
--

INSERT INTO `urunler` (`id`, `urunad`, `fiyat`, `resim`) VALUES
(1, 'KEK', 45, 'res/cupcake-1264214_640.png'),
(2, 'Peynir', 2, 'res/cheese-151032_640.png'),
(3, 'Koltuk', 5, 'res/chair-1657361_640.png'),
(4, 'kabak', 23, 'res/jack-1728049_640.png'),
(5, 'Ruj', 4, 'res/nail-polish-2485198_640.png'),
(6, 'koku', 56, 'res/perfume-575709_640.png'),
(7, 'lamba', 34, 'res/table-lamp-2320606_640.png'),
(8, 'saat', 34, 'res/time-1892013_640.png'),
(9, 'elbise', 34, 'res/stand-2774098_640.png'),
(10, 'kazak', 434, 'res/t-shirt-2068353_640.png');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `veriler`
--

CREATE TABLE `veriler` (
  `id` int(11) NOT NULL,
  `soru` varchar(70) NOT NULL,
  `sec1` varchar(70) NOT NULL,
  `sec2` varchar(70) NOT NULL,
  `sec3` varchar(70) NOT NULL,
  `sec4` varchar(70) NOT NULL,
  `sifre` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `veriler`
--

INSERT INTO `veriler` (`id`, `soru`, `sec1`, `sec2`, `sec3`, `sec4`, `sifre`) VALUES
(1, 'En İyi Araba Hangisidir', 'BMW', 'Mercedes', 'Audi', 'Ferrari', 'ZfgK15');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yazilar`
--

CREATE TABLE `yazilar` (
  `id` int(11) NOT NULL,
  `baslik` varchar(40) NOT NULL,
  `icerik` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `yazilar`
--

INSERT INTO `yazilar` (`id`, `baslik`, `icerik`) VALUES
(1, 'Arabalar hakkında genel bilgiler', 'yaygın inancın tersine, Lorem Ipsum rastgele sözcüklerden oluşmaz. Kökleri M.Ö. 45 tarihinden bu yana klasik Latin edebiyatına kadar uzanan 2000 yıllık bir geçmişi vardır. Virginia\'daki Hampden-Sydney College\'dan Latince profesörü Richard McClintock,'),
(2, 'Evler hakkında fırsat bilgileri', 'yaygın inancın tersine, Lorem Ipsum rastgele sözcüklerden oluşmaz. Kökleri M.Ö. 45 tarihinden bu yana klasik Latin edebiyatına kadar uzanan 2000 yıllık bir geçmişi vardır. Virginia\'daki Hampden-Sydney College\'dan Latince profesörü Richard McClintock,'),
(3, 'Okulların son durumu ne olacak', 'yaygın inancın tersine, Lorem Ipsum rastgele sözcüklerden oluşmaz. Kökleri M.Ö. 45 tarihinden bu yana klasik Latin edebiyatına kadar uzanan 2000 yıllık bir geçmişi vardır. Virginia\'daki Hampden-Sydney College\'dan Latince profesörü Richard McClintock,'),
(4, 'eğitim sistemin ilerisi nasıl olacak', 'yaygın inancın tersine, Lorem Ipsum rastgele sözcüklerden oluşmaz. Kökleri M.Ö. 45 tarihinden bu yana klasik Latin edebiyatına kadar uzanan 2000 yıllık bir geçmişi vardır. Virginia\'daki Hampden-Sydney College\'dan Latince profesörü Richard McClintock,'),
(5, 'Arabalar hakkında genel bilgiler', 'yaygın inancın tersine, Lorem Ipsum rastgele sözcüklerden oluşmaz. Kökleri M.Ö. 45 tarihinden bu yana klasik Latin edebiyatına kadar uzanan 2000 yıllık bir geçmişi vardır. Virginia\'daki Hampden-Sydney College\'dan Latince profesörü Richard McClintock,'),
(6, 'Evler hakkında fırsat bilgileri', 'yaygın inancın tersine, Lorem Ipsum rastgele sözcüklerden oluşmaz. Kökleri M.Ö. 45 tarihinden bu yana klasik Latin edebiyatına kadar uzanan 2000 yıllık bir geçmişi vardır. Virginia\'daki Hampden-Sydney College\'dan Latince profesörü Richard McClintock,'),
(7, 'Okulların son durumu ne olacak', 'yaygın inancın tersine, Lorem Ipsum rastgele sözcüklerden oluşmaz. Kökleri M.Ö. 45 tarihinden bu yana klasik Latin edebiyatına kadar uzanan 2000 yıllık bir geçmişi vardır. Virginia\'daki Hampden-Sydney College\'dan Latince profesörü Richard McClintock,'),
(8, 'eğitim sistemin ilerisi nasıl olacak', 'yaygın inancın tersine, Lorem Ipsum rastgele sözcüklerden oluşmaz. Kökleri M.Ö. 45 tarihinden bu yana klasik Latin edebiyatına kadar uzanan 2000 yıllık bir geçmişi vardır. Virginia\'daki Hampden-Sydney College\'dan Latince profesörü Richard McClintock,'),
(9, 'Arabalar hakkında genel bilgiler', 'yaygın inancın tersine, Lorem Ipsum rastgele sözcüklerden oluşmaz. Kökleri M.Ö. 45 tarihinden bu yana klasik Latin edebiyatına kadar uzanan 2000 yıllık bir geçmişi vardır. Virginia\'daki Hampden-Sydney College\'dan Latince profesörü Richard McClintock,'),
(10, 'Evler hakkında fırsat bilgileri', 'yaygın inancın tersine, Lorem Ipsum rastgele sözcüklerden oluşmaz. Kökleri M.Ö. 45 tarihinden bu yana klasik Latin edebiyatına kadar uzanan 2000 yıllık bir geçmişi vardır. Virginia\'daki Hampden-Sydney College\'dan Latince profesörü Richard McClintock,'),
(11, 'Okulların son durumu ne olacak', 'yaygın inancın tersine, Lorem Ipsum rastgele sözcüklerden oluşmaz. Kökleri M.Ö. 45 tarihinden bu yana klasik Latin edebiyatına kadar uzanan 2000 yıllık bir geçmişi vardır. Virginia\'daki Hampden-Sydney College\'dan Latince profesörü Richard McClintock,'),
(12, 'eğitim sistemin ilerisi nasıl olacak', 'yaygın inancın tersine, Lorem Ipsum rastgele sözcüklerden oluşmaz. Kökleri M.Ö. 45 tarihinden bu yana klasik Latin edebiyatına kadar uzanan 2000 yıllık bir geçmişi vardır. Virginia\'daki Hampden-Sydney College\'dan Latince profesörü Richard McClintock,'),
(13, 'Arabalar hakkında genel bilgiler', 'yaygın inancın tersine, Lorem Ipsum rastgele sözcüklerden oluşmaz. Kökleri M.Ö. 45 tarihinden bu yana klasik Latin edebiyatına kadar uzanan 2000 yıllık bir geçmişi vardır. Virginia\'daki Hampden-Sydney College\'dan Latince profesörü Richard McClintock,'),
(14, 'Evler hakkında fırsat bilgileri', 'yaygın inancın tersine, Lorem Ipsum rastgele sözcüklerden oluşmaz. Kökleri M.Ö. 45 tarihinden bu yana klasik Latin edebiyatına kadar uzanan 2000 yıllık bir geçmişi vardır. Virginia\'daki Hampden-Sydney College\'dan Latince profesörü Richard McClintock,'),
(15, 'Okulların son durumu ne olacak', 'yaygın inancın tersine, Lorem Ipsum rastgele sözcüklerden oluşmaz. Kökleri M.Ö. 45 tarihinden bu yana klasik Latin edebiyatına kadar uzanan 2000 yıllık bir geçmişi vardır. Virginia\'daki Hampden-Sydney College\'dan Latince profesörü Richard McClintock,'),
(16, 'eğitim sistemin ilerisi nasıl olacak', 'yaygın inancın tersine, Lorem Ipsum rastgele sözcüklerden oluşmaz. Kökleri M.Ö. 45 tarihinden bu yana klasik Latin edebiyatına kadar uzanan 2000 yıllık bir geçmişi vardır. Virginia\'daki Hampden-Sydney College\'dan Latince profesörü Richard McClintock,');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `anliksepet`
--
ALTER TABLE `anliksepet`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `ayarlar`
--
ALTER TABLE `ayarlar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `giris`
--
ALTER TABLE `giris`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `giris2`
--
ALTER TABLE `giris2`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `giris3`
--
ALTER TABLE `giris3`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `giris4`
--
ALTER TABLE `giris4`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `gruplar`
--
ALTER TABLE `gruplar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kayitlar`
--
ALTER TABLE `kayitlar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `menuler`
--
ALTER TABLE `menuler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `musteriler`
--
ALTER TABLE `musteriler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `numaralar`
--
ALTER TABLE `numaralar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `ogrenciler`
--
ALTER TABLE `ogrenciler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `sablonlar`
--
ALTER TABLE `sablonlar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `siparis`
--
ALTER TABLE `siparis`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `sorular`
--
ALTER TABLE `sorular`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `sorular2`
--
ALTER TABLE `sorular2`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `sorular3`
--
ALTER TABLE `sorular3`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `sorular4`
--
ALTER TABLE `sorular4`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `urunler`
--
ALTER TABLE `urunler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `veriler`
--
ALTER TABLE `veriler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `yazilar`
--
ALTER TABLE `yazilar`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `anliksepet`
--
ALTER TABLE `anliksepet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `ayarlar`
--
ALTER TABLE `ayarlar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `giris`
--
ALTER TABLE `giris`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `giris2`
--
ALTER TABLE `giris2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `giris3`
--
ALTER TABLE `giris3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `giris4`
--
ALTER TABLE `giris4`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `gruplar`
--
ALTER TABLE `gruplar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- Tablo için AUTO_INCREMENT değeri `kayitlar`
--
ALTER TABLE `kayitlar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Tablo için AUTO_INCREMENT değeri `menuler`
--
ALTER TABLE `menuler`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Tablo için AUTO_INCREMENT değeri `musteriler`
--
ALTER TABLE `musteriler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `numaralar`
--
ALTER TABLE `numaralar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Tablo için AUTO_INCREMENT değeri `ogrenciler`
--
ALTER TABLE `ogrenciler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `sablonlar`
--
ALTER TABLE `sablonlar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `siparis`
--
ALTER TABLE `siparis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `sorular`
--
ALTER TABLE `sorular`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Tablo için AUTO_INCREMENT değeri `sorular2`
--
ALTER TABLE `sorular2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Tablo için AUTO_INCREMENT değeri `sorular3`
--
ALTER TABLE `sorular3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Tablo için AUTO_INCREMENT değeri `sorular4`
--
ALTER TABLE `sorular4`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Tablo için AUTO_INCREMENT değeri `urunler`
--
ALTER TABLE `urunler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `veriler`
--
ALTER TABLE `veriler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `yazilar`
--
ALTER TABLE `yazilar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
