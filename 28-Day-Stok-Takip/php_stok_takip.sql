-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 03 Haz 2025, 20:32:07
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
-- Veritabanı: `php_stok_takip`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `faturalar`
--

CREATE TABLE `faturalar` (
  `id` int(11) NOT NULL,
  `musteriid` int(11) NOT NULL,
  `fatura_no` varchar(255) NOT NULL,
  `tutar` varchar(255) NOT NULL,
  `aciklama` text DEFAULT NULL,
  `tip` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `faturalar`
--

INSERT INTO `faturalar` (`id`, `musteriid`, `fatura_no`, `tutar`, `aciklama`, `tip`) VALUES
(0, 2, '1010101', '12500', 'döner tedarik', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kasa`
--

CREATE TABLE `kasa` (
  `id` int(11) NOT NULL,
  `ad` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `kasa`
--

INSERT INTO `kasa` (`id`, `ad`) VALUES
(0, 'Süper Web Kasa');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `ad` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `kategori`
--

INSERT INTO `kategori` (`id`, `ad`) VALUES
(2, 'GIDA');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `musteriler`
--

CREATE TABLE `musteriler` (
  `id` int(11) NOT NULL,
  `ad` varchar(50) NOT NULL,
  `soyad` varchar(50) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telefon` varchar(50) DEFAULT NULL,
  `adres` varchar(255) DEFAULT NULL,
  `tc` varchar(11) DEFAULT NULL,
  `notu` text DEFAULT NULL,
  `sirket` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `musteriler`
--

INSERT INTO `musteriler` (`id`, `ad`, `soyad`, `email`, `telefon`, `adres`, `tc`, `notu`, `sirket`, `date`) VALUES
(1, 'Erdi', 'Toy', 'okul@gmail.com', '5073896904', 'kırklareli/merkez', '00000000', 'Okul için Döner', 'Okul', '2022-12-18'),
(2, 'Döner', 'Tedarik', 'tedarik@gmail.com', '05073896904', 'Kırklareli/Merkez', '00000000', 'tedarik zinciri', 'Tedarik Market', '2022-12-18');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `siparis`
--

CREATE TABLE `siparis` (
  `id` int(11) NOT NULL,
  `musteri_id` int(11) NOT NULL,
  `firma_adi` varchar(255) NOT NULL,
  `tarih` date NOT NULL,
  `kullanici_id` int(11) NOT NULL,
  `urunler` text NOT NULL,
  `fiyat` double NOT NULL,
  `no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `siparis`
--

INSERT INTO `siparis` (`id`, `musteri_id`, `firma_adi`, `tarih`, `kullanici_id`, `urunler`, `fiyat`, `no`) VALUES
(0, 1, 'okul', '2022-12-21', 3, '{\"1\":{\"id\":\"2\",\"adet\":\"300\",\"fiyat\":\"50\"}}', 15000, 2020202);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `stok`
--

CREATE TABLE `stok` (
  `id` int(11) NOT NULL,
  `urun_id` int(11) NOT NULL,
  `islem_tipi` int(11) NOT NULL,
  `adet` int(11) NOT NULL,
  `fiyat` double NOT NULL,
  `date` date NOT NULL,
  `musteri_id` int(11) NOT NULL,
  `kasa_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `stok`
--

INSERT INTO `stok` (`id`, `urun_id`, `islem_tipi`, `adet`, `fiyat`, `date`, `musteri_id`, `kasa_id`) VALUES
(1, 2, 1, 300, 50, '2022-12-18', 1, 0),
(2, 2, 0, 500, 25, '2022-12-18', 2, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urunler`
--

CREATE TABLE `urunler` (
  `id` int(11) NOT NULL,
  `ad` varchar(255) NOT NULL,
  `kategoriId` int(11) NOT NULL,
  `ozellikler` text DEFAULT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `urunler`
--

INSERT INTO `urunler` (`id`, `ad`, `kategoriId`, `ozellikler`, `date`) VALUES
(2, 'Kaşarlı Dürüm', 2, '[{\"name\":\"D\\u00fcr\\u00fcm Tipi\",\"value\":\"ka\\u015farl\\u0131\"}]', '2022-12-18'),
(3, 'Zurna', 2, '[{\"name\":\"D\\u00fcr\\u00fcm Tipi\",\"value\":\"B\\u00fcy\\u00fck Boy D\\u00fcr\\u00fcm\"}]', '2022-12-18');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uyeler`
--

CREATE TABLE `uyeler` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `permission` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `uyeler`
--

INSERT INTO `uyeler` (`id`, `name`, `email`, `password`, `permission`) VALUES
(4, 'enestoy', 'hello@enestoy.com', '827ccb0eea8a706c4c34a16891f84e7b', '0,1,2,3,4,5,6,7,8');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `musteriler`
--
ALTER TABLE `musteriler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `stok`
--
ALTER TABLE `stok`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `urunler`
--
ALTER TABLE `urunler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `uyeler`
--
ALTER TABLE `uyeler`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `musteriler`
--
ALTER TABLE `musteriler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `stok`
--
ALTER TABLE `stok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `urunler`
--
ALTER TABLE `urunler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `uyeler`
--
ALTER TABLE `uyeler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
