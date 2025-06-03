-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 02 Haz 2025, 16:47:29
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
-- Veritabanı: `php_crud`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(1, 'Ali Yılmazaa', 'ali.yilmaz@example.com', '$2y$10$gazn2z61xlwL0rwzoLCryO.vhshg.ROgO8c9i0b3RkadPAsspnLo.', '2025-06-02 14:31:19'),
(2, 'Ayşe Demir', 'ayse.demir@example.com', '123456', '2025-06-02 14:31:19'),
(3, 'Mehmet Kaya', 'mehmet.kaya@example.com', '123456', '2025-06-02 14:31:19'),
(4, 'Elif Şahin', 'elif.sahin@example.com', '123456', '2025-06-02 14:31:19'),
(5, 'Ahmet Koç', 'ahmet.koc@example.com', '123456', '2025-06-02 14:31:19'),
(6, 'Zeynep Arslan', 'zeynep.arslan@example.com', '123456', '2025-06-02 14:31:19'),
(7, 'Can Aydın', 'can.aydin@example.com', '123456', '2025-06-02 14:31:19'),
(8, 'Merve Çelik', 'merve.celik@example.com', '123456', '2025-06-02 14:31:19'),
(9, 'Emre Güneş', 'emre.gunes@example.com', '123456', '2025-06-02 14:31:19'),
(11, 'Enes Toy', 'enestoy@gmail.com', '$2y$10$N54nyhv5Pj0psMTCdf/tke8U1oA8qlMscCqWiSt2nBPtxcCyxF2C6', '2025-06-02 14:36:06');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
