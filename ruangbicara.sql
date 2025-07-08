-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2025 at 08:30 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ruangbicara`
--

-- --------------------------------------------------------

--
-- Table structure for table `jawaban`
--

CREATE TABLE `jawaban` (
  `id_jwbn` int(11) NOT NULL,
  `isi_jwbn` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `id_prtyn` int(11) DEFAULT NULL,
  `username_jwbn` varchar(255) DEFAULT NULL,
  `waktu_jwbn` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jawaban`
--

INSERT INTO `jawaban` (`id_jwbn`, `isi_jwbn`, `user_id`, `id_prtyn`, `username_jwbn`, `waktu_jwbn`) VALUES
(74, 'malas', 15, 107, 'Iveeet ', '2025-06-01 18:06:03'),
(76, 'solo belom tidur', 19, 107, 'Bayu Klomang ', '2025-06-01 20:33:11');

-- --------------------------------------------------------

--
-- Table structure for table `pernyataan`
--

CREATE TABLE `pernyataan` (
  `id_pernyataan` int(11) NOT NULL,
  `isi_pernyataan` varchar(255) DEFAULT NULL,
  `waktu_pernyataan` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pernyataan`
--

INSERT INTO `pernyataan` (`id_pernyataan`, `isi_pernyataan`, `waktu_pernyataan`) VALUES
(66, 'Aplikasi RuangBicara sedang dalam proses pengembangan!!!', '2025-05-31 19:47:06');

-- --------------------------------------------------------

--
-- Table structure for table `pertanyaan`
--

CREATE TABLE `pertanyaan` (
  `id_prtyn` int(11) NOT NULL,
  `isi_prtyn` varchar(255) NOT NULL,
  `username_prtyn` varchar(255) DEFAULT NULL,
  `waktu_prtyn` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_user` int(11) NOT NULL,
  `kategori` varchar(255) DEFAULT NULL,
  `lampiran` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pertanyaan`
--

INSERT INTO `pertanyaan` (`id_prtyn`, `isi_prtyn`, `username_prtyn`, `waktu_prtyn`, `id_user`, `kategori`, `lampiran`) VALUES
(107, 'Shibal', 'Iveeet ', '2025-05-31 19:38:46', 15, 'Python', NULL),
(108, '<br /><b>Warning</b>:  Undefined variable $isi_prtyn in <b>C:xampphtdocs\ruangbicarapertanyaan.php</b> on line <b>69</b><br />', 'Iveeet ', '2025-06-01 16:42:42', 15, 'Other', NULL),
(112, 'Inpokan lokasi sunrise gacor lee', 'Bayu Klomang ', '2025-06-01 20:32:52', 19, 'Travel', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(14, 'Rayvan Bayu', 'rayvan@gmail.com', '25d55ad283aa400af464c76d713c07ad'),
(15, 'Iveeet', 'ivet@gmail.com', '25d55ad283aa400af464c76d713c07ad'),
(16, 'Admin', 'admin@gmail.com', '25d55ad283aa400af464c76d713c07ad'),
(19, 'Bayu Klomang', 'bayu@gmail.com', '25d55ad283aa400af464c76d713c07ad'),
(22, 'Ivet Amoros', 'ivetamoros@gmail.com', '25d55ad283aa400af464c76d713c07ad');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jawaban`
--
ALTER TABLE `jawaban`
  ADD PRIMARY KEY (`id_jwbn`);

--
-- Indexes for table `pernyataan`
--
ALTER TABLE `pernyataan`
  ADD PRIMARY KEY (`id_pernyataan`);

--
-- Indexes for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD PRIMARY KEY (`id_prtyn`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jawaban`
--
ALTER TABLE `jawaban`
  MODIFY `id_jwbn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `pernyataan`
--
ALTER TABLE `pernyataan`
  MODIFY `id_pernyataan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  MODIFY `id_prtyn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
