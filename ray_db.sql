-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2024 at 05:06 PM
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
-- Database: `ray_db`
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
(56, 'fak', 16, 65, 'Rayvan ', '2024-05-05 14:45:09'),
(57, 'yaelah bang', 16, 65, 'Rayvan ', '2024-05-05 14:46:01'),
(59, 'heheheha\r\n', 14, 81, 'Rayvan Bayu ', '2024-05-07 01:11:30'),
(62, 'banggggggggg, bantu aku ngoding java bangggg', 14, 80, 'Rayvan Bayu ', '2024-05-07 01:13:31');

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
(60, 'Ingfo ingfo, yang usernamenya Ivet Amoros babi, anak setan. Untuk fitur yang sedang dikembangkan adalah fitur untuk attachment gambar', '2024-05-07 01:16:32');

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
  `kategori` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pertanyaan`
--

INSERT INTO `pertanyaan` (`id_prtyn`, `isi_prtyn`, `username_prtyn`, `waktu_prtyn`, `id_user`, `kategori`) VALUES
(51, 'Halo iVEls !!!', 'Rayvan Bayu ', '2024-05-03 02:59:28', 14, NULL),
(52, 'iVEls, memiliki referensi dari sebuah nama yang spesial bagi developer. Selain itu ivels juga merupakan cara pengucapan dari pengondisian “if-else” yang merupakan sebuah perintah dasar pada pemrogramman. Terima Kasih :)', 'Iveeet ', '2024-05-03 03:04:55', 15, NULL),
(54, 'Web ini sedang dalam proses pengembangan, Stay Tune....', 'Iveeet ', '2024-05-03 03:11:32', 15, NULL),
(65, 'he need some milk!!!', 'Rayvan Bayu ', '2024-05-04 03:43:59', 14, NULL),
(71, 'heheheha\r\n', 'Rayvan Bayu ', '2024-05-05 13:05:38', 14, NULL),
(73, 'njirla', 'Bayu Klomang ', '2024-05-05 20:36:28', 19, NULL),
(74, 'mencoba fitur kategori', 'Ivet Amoros ', '2024-05-06 06:16:02', 22, 'Python'),
(75, 'coba lageee', 'Ivet Amoros ', '2024-05-06 06:22:40', 22, 'PHP'),
(76, 'Mencoba terus', 'Ivet Amoros ', '2024-05-06 06:24:30', 22, 'Java'),
(77, 'tess', 'Ivet Amoros ', '2024-05-06 06:26:11', 22, ''),
(81, 'bang ajarin aku java dong bangggg, tolooooooooong', 'Ivet Amoros ', '2024-05-07 01:10:51', 22, 'Java');

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
(20, 'Sigit Rendang', 'sigit@gmail.com', '25d55ad283aa400af464c76d713c07ad'),
(21, 'Ardi Cilacap', 'ardi@gmail.com', '25d55ad283aa400af464c76d713c07ad'),
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
  MODIFY `id_jwbn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `pernyataan`
--
ALTER TABLE `pernyataan`
  MODIFY `id_pernyataan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  MODIFY `id_prtyn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
