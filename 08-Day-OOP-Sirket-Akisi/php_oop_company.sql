-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 02 Haz 2025, 16:48:23
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
-- Veritabanı: `php_oop_company`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `calisanlar`
--

CREATE TABLE `calisanlar` (
  `id` int(11) NOT NULL,
  `ad` varchar(255) NOT NULL,
  `unvan` varchar(255) DEFAULT NULL,
  `departman_id` int(11) DEFAULT NULL,
  `ofis_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `calisanlar`
--

INSERT INTO `calisanlar` (`id`, `ad`, `unvan`, `departman_id`, `ofis_id`) VALUES
(1, 'Michael Scott', 'Bölge Müdürü', 1, 1),
(2, 'Jim Halpert', 'Satış Temsilcisi', 2, 1),
(3, 'Dwight Schrute', 'Asistan Bölge Müdürü', 2, 1),
(4, 'Pam Beesly', 'Resepsiyonist', 1, 1),
(5, 'Angela Martin', 'Muhasebeci', 3, 1),
(6, 'Oscar Martinez', 'Muhasebeci', 3, 1),
(7, 'Kevin Malone', 'Muhasebeci', 3, 1),
(8, 'Toby Flenderson', 'İK Temsilcisi', 4, 1),
(9, 'Darryl Philbin', 'Depo Müdürü', 8, 1),
(10, 'Ryan Howard', 'Geçici Eleman', 2, 1),
(11, 'Stanley Hudson', 'Satış Temsilcisi', 2, 1),
(12, 'Phyllis Vance', 'Satış Temsilcisi', 2, 1),
(13, 'Meredith Palmer', 'Satış Temsilcisi', 2, 1),
(14, 'Kelly Kapoor', 'Müşteri Hizmetleri', 7, 1),
(15, 'Creed Bratton', 'Kalite Denetçisi', 6, 1),
(16, 'Jan Levinson', 'Yönetim', 1, 1),
(17, 'Holly Flax', 'İnsan Kaynakları Müdürü', 4, 1),
(18, 'Erin Hannon', 'Resepsiyonist', 1, 1),
(19, 'Andy Bernard', 'Satış Temsilcisi', 2, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `departmanlar`
--

CREATE TABLE `departmanlar` (
  `id` int(11) NOT NULL,
  `ad` varchar(255) NOT NULL,
  `sirket_id` int(11) DEFAULT NULL,
  `yonetici_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `departmanlar`
--

INSERT INTO `departmanlar` (`id`, `ad`, `sirket_id`, `yonetici_id`) VALUES
(1, 'Yönetim', 1, 1),
(2, 'Satış', 1, 3),
(3, 'Muhasebe', 1, 5),
(4, 'İnsan Kaynakları', 1, 8),
(6, 'Kalite', 1, 15),
(7, 'Müşteri Hizmetler', 1, 14),
(8, 'Depo', 1, 9);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ofisler`
--

CREATE TABLE `ofisler` (
  `id` int(11) NOT NULL,
  `adres` varchar(255) NOT NULL,
  `sirket_id` int(11) DEFAULT NULL,
  `tur` enum('ofis','merkez') DEFAULT 'ofis'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `ofisler`
--

INSERT INTO `ofisler` (`id`, `adres`, `sirket_id`, `tur`) VALUES
(1, 'Scranton, PA (Merkez)', 1, 'merkez'),
(2, 'Stamford, CT', 1, 'ofis'),
(3, 'Utica, NY', 1, 'ofis'),
(4, 'Buffalo, NY', 1, 'ofis'),
(5, 'Akron, OH', 1, 'ofis');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sirketler`
--

CREATE TABLE `sirketler` (
  `id` int(11) NOT NULL,
  `ad` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `sirketler`
--

INSERT INTO `sirketler` (`id`, `ad`) VALUES
(1, 'Dunder Mifflin Paper Company, Inc.');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `calisanlar`
--
ALTER TABLE `calisanlar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `departman_id` (`departman_id`),
  ADD KEY `fk_ofis` (`ofis_id`);

--
-- Tablo için indeksler `departmanlar`
--
ALTER TABLE `departmanlar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sirket_id` (`sirket_id`),
  ADD KEY `fk_yonetici` (`yonetici_id`);

--
-- Tablo için indeksler `ofisler`
--
ALTER TABLE `ofisler`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sirket_id` (`sirket_id`);

--
-- Tablo için indeksler `sirketler`
--
ALTER TABLE `sirketler`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `calisanlar`
--
ALTER TABLE `calisanlar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Tablo için AUTO_INCREMENT değeri `departmanlar`
--
ALTER TABLE `departmanlar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `ofisler`
--
ALTER TABLE `ofisler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `sirketler`
--
ALTER TABLE `sirketler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `calisanlar`
--
ALTER TABLE `calisanlar`
  ADD CONSTRAINT `calisanlar_ibfk_1` FOREIGN KEY (`departman_id`) REFERENCES `departmanlar` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_ofis` FOREIGN KEY (`ofis_id`) REFERENCES `ofisler` (`id`) ON DELETE SET NULL;

--
-- Tablo kısıtlamaları `departmanlar`
--
ALTER TABLE `departmanlar`
  ADD CONSTRAINT `departmanlar_ibfk_1` FOREIGN KEY (`sirket_id`) REFERENCES `sirketler` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_yonetici` FOREIGN KEY (`yonetici_id`) REFERENCES `calisanlar` (`id`) ON DELETE SET NULL;

--
-- Tablo kısıtlamaları `ofisler`
--
ALTER TABLE `ofisler`
  ADD CONSTRAINT `ofisler_ibfk_1` FOREIGN KEY (`sirket_id`) REFERENCES `sirketler` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
