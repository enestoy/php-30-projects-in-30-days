-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 28 May 2025, 18:09:21
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
-- Veritabanı: `education_anket`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ipkontrol`
--

CREATE TABLE `ipkontrol` (
  `id` int(11) NOT NULL,
  `anketid` int(11) NOT NULL,
  `ip` varchar(45) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `ipkontrol`
--

INSERT INTO `ipkontrol` (`id`, `anketid`, `ip`) VALUES
(12, 1, '::1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `oylama`
--

CREATE TABLE `oylama` (
  `id` int(11) NOT NULL,
  `anketid` int(11) NOT NULL,
  `oy1` int(11) NOT NULL DEFAULT 0,
  `oy2` int(11) NOT NULL DEFAULT 0,
  `oy3` int(11) NOT NULL DEFAULT 0,
  `oy4` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `oylama`
--

INSERT INTO `oylama` (`id`, `anketid`, `oy1`, `oy2`, `oy3`, `oy4`) VALUES
(2, 1, 1, 2, 1, 1);

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

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `ipkontrol`
--
ALTER TABLE `ipkontrol`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `oylama`
--
ALTER TABLE `oylama`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `veriler`
--
ALTER TABLE `veriler`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `ipkontrol`
--
ALTER TABLE `ipkontrol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `oylama`
--
ALTER TABLE `oylama`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `veriler`
--
ALTER TABLE `veriler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
