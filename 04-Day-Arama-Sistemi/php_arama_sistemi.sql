-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 29 May 2025, 13:55:26
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
-- Veritabanı: `php_arama_sistemi`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `esya`
--

CREATE TABLE `esya` (
  `id` int(11) NOT NULL,
  `isim` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `esya`
--

INSERT INTO `esya` (`id`, `isim`) VALUES
(1, 'Kalem'),
(2, 'Defter'),
(3, 'Silgi'),
(4, 'Cetvel'),
(5, 'Kitap'),
(6, 'Masa'),
(7, 'Sandalye'),
(8, 'Bilgisayar'),
(9, 'Telefon'),
(10, 'Klavye');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `esya`
--
ALTER TABLE `esya`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `esya`
--
ALTER TABLE `esya`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
