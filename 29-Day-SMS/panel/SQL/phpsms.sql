-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 24 Ara 2019, 14:42:49
-- Sunucu sürümü: 5.7.23
-- PHP Sürümü: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `phpsms`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayarlar`
--

DROP TABLE IF EXISTS `ayarlar`;
CREATE TABLE IF NOT EXISTS `ayarlar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `apikey` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `guvkey` varchar(70) COLLATE utf8_turkish_ci NOT NULL,
  `baslik` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `ayarlar`
--

INSERT INTO `ayarlar` (`id`, `apikey`, `guvkey`, `baslik`) VALUES
(1, '3f23bb891443d66da43a21ac73d8ac67', '$2y$12$XSivpVryrMSxDfbcb4f1vu5.WJ3HBH0Bt/fvKzlA4bO8YS4zxl55C', 'O.KALYONCU');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `gruplar`
--

DROP TABLE IF EXISTS `gruplar`;
CREATE TABLE IF NOT EXISTS `gruplar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ad` varchar(40) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

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
-- Tablo için tablo yapısı `numaralar`
--

DROP TABLE IF EXISTS `numaralar`;
CREATE TABLE IF NOT EXISTS `numaralar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tel` bigint(11) NOT NULL,
  `grupid` int(11) NOT NULL DEFAULT '55',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

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
-- Tablo için tablo yapısı `sablonlar`
--

DROP TABLE IF EXISTS `sablonlar`;
CREATE TABLE IF NOT EXISTS `sablonlar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ad` varchar(150) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `sablonlar`
--

INSERT INTO `sablonlar` (`id`, `ad`) VALUES
(1, 'Bayramınız mübarek olsun.'),
(2, '%30 indirim başladı.'),
(3, 'Hosgeldiniz'),
(4, 'Udemy sms eğitim videoları çekiliyor. Çok yakında eklenecektir.');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
