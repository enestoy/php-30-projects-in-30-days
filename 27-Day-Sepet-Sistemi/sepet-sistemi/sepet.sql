-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 29 Haz 2019, 20:01:23
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
-- Veritabanı: `sepet`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `anliksepet`
--

DROP TABLE IF EXISTS `anliksepet`;
CREATE TABLE IF NOT EXISTS `anliksepet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uyeid` int(11) NOT NULL,
  `urunad` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `fiyat` int(11) NOT NULL,
  `adet` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `siparis`
--

DROP TABLE IF EXISTS `siparis`;
CREATE TABLE IF NOT EXISTS `siparis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uyeid` int(11) NOT NULL,
  `urunad` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `fiyat` int(11) NOT NULL,
  `adet` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `siparis`
--

INSERT INTO `siparis` (`id`, `uyeid`, `urunad`, `fiyat`, `adet`) VALUES
(7, 1, 'lamba', 34, '1'),
(6, 1, 'kabak', 23, '1'),
(5, 1, 'Koltuk', 5, '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urunler`
--

DROP TABLE IF EXISTS `urunler`;
CREATE TABLE IF NOT EXISTS `urunler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `urunad` varchar(20) COLLATE utf8_turkish_ci NOT NULL,
  `fiyat` int(11) NOT NULL,
  `resim` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
