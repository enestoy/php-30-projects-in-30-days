-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 14 Nis 2025, 22:48:50
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
-- Tablo için tablo yapısı `yazilar`
--

CREATE TABLE `yazilar` (
  `id` int(11) NOT NULL,
  `baslik` varchar(40) NOT NULL,
  `icerik` text NOT NULL,
  `ad` varchar(40) NOT NULL,
  `soyad` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `yazilar`
--

INSERT INTO `yazilar` (`id`, `baslik`, `icerik`, `ad`, `soyad`) VALUES
(1, 'Yapay Zeka Nereye Gidiyor?', 'Yapay zeka teknolojileri hızla gelişiyor. Günümüzde birçok sektörde kullanılmakta.', 'Ahmet', 'Yılmaz'),
(2, 'PHP mi Python mu?', 'Web geliştirme için hem PHP hem de Python sıkça tercih edilmektedir. Ancak kullanım alanları farklılık gösterir.', 'Mehmet', 'Demir'),
(3, '2025 Web Trendleri', 'Yeni yılda minimalist tasarımlar ve yapay zeka entegrasyonları öne çıkıyor.', 'Elif', 'Kaya'),
(4, 'Veri Analizi 101', 'Veri analizi, ham verileri anlamlı bilgilere dönüştürmeyi sağlar. Excel ve Python bu alanda sıkça kullanılır.', 'Ayşe', 'Çelik'),
(5, 'Girişimcilik Hikayem', 'Üniversite yıllarında başladığım girişim fikri, bugün yüzlerce kullanıcıya ulaştı.', 'Enes', 'Toy'),
(6, 'Javascript Framework Karşılaştırması', 'React, Vue ve Angular frameworkleri arasında seçim yaparken projenizin ihtiyaçlarını göz önünde bulundurun.', 'Zeynep', 'Koç'),
(7, 'Freelance Hayatı', 'Freelancer olarak çalışmanın avantajları kadar dikkat edilmesi gereken noktaları da vardır.', 'Berk', 'Aydın'),
(8, 'Yazılımda Kariyer Planı', 'Kariyer yolculuğunuzu planlarken hedeflerinizi netleştirmek önemlidir.', 'Merve', 'Şahin');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `musteriler`
--
ALTER TABLE `musteriler`
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
-- Tablo için AUTO_INCREMENT değeri `musteriler`
--
ALTER TABLE `musteriler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `yazilar`
--
ALTER TABLE `yazilar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
