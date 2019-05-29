-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 29, 2019 at 03:16 PM
-- Server version: 5.6.37
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kurirdok`
--

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE IF NOT EXISTS `files` (
  `file_id` int(11) NOT NULL,
  `filename` varchar(100) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `author` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`file_id`, `filename`, `file_path`, `author`, `created_at`) VALUES
(3, 'Skenario Use Case', 'uploads/files/pegawai_1/use_case.docx', 2, '2019-05-23 01:22:41'),
(4, 'DB1 PEKANBARU', 'uploads/files/pegawai_1/db1_pekanbaru.pdf', 2, '2019-05-23 02:33:59'),
(6, 'Format SIswa', 'uploads/files/pegawai_2/format_siswa.xlsx', 5, '2019-05-23 02:39:55'),
(7, 'User Manual', 'uploads/files/pegawai_1/user_manual.docx', 2, '2019-05-24 18:08:53'),
(8, 'Nilai Mipa', 'uploads/files/pegawai_1/nilai_mipa.xlsx', 2, '2019-05-24 18:10:09'),
(9, 'Nilai IPS', 'uploads/files/pegawai_1/nilai_ips.xlsx', 2, '2019-05-24 18:14:20'),
(10, 'Kelas MIPA 1', 'uploads/files/pegawai_1/kelas_mipa_1.xlsx', 2, '2019-05-24 18:30:14'),
(11, 'Sorting', 'uploads/files/pegawai_3/sorting.pdf', 6, '2019-05-28 08:20:47'),
(12, 'Soal Logika', 'uploads/files/pegawai_3/soal_logika.pdf', 6, '2019-05-28 08:28:59');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `log_id` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `keterangan` varchar(100) NOT NULL,
  `pengiriman_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`log_id`, `time`, `keterangan`, `pengiriman_id`) VALUES
(1, '2019-05-28 09:06:01', 'Pegawai 3 mengajukan pengiriman dokumen ', 6),
(2, '2019-05-28 09:06:06', 'Kurir 3 mengirim dokumen', 6),
(3, '2019-05-28 09:06:59', 'Kurir 3 selesai mengirim dokumen', 6);

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman`
--

CREATE TABLE IF NOT EXISTS `pengiriman` (
  `pengiriman_id` int(11) NOT NULL,
  `status` enum('Tunggu','Kirim','Selesai') NOT NULL DEFAULT 'Tunggu',
  `note` varchar(255) NOT NULL,
  `file` int(11) NOT NULL,
  `pengirim` int(11) NOT NULL,
  `kurir` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengiriman`
--

INSERT INTO `pengiriman` (`pengiriman_id`, `status`, `note`, `file`, `pengirim`, `kurir`, `created_at`, `updated_at`) VALUES
(2, 'Selesai', 'Tolong diantar ke Pak aris di condet', 4, 2, 4, '2019-05-23 02:35:50', '2019-05-23 14:34:27'),
(3, 'Selesai', 'Tolong diantar ke Pak Yahya dari PT. Yang Ada', 4, 2, 4, '2019-05-23 02:36:24', '2019-05-23 02:47:54'),
(5, 'Tunggu', 'Tolong diantar ke Pak Surya dari PT. Yang Apalah', 6, 5, NULL, '2019-05-23 02:40:41', '0000-00-00 00:00:00'),
(6, 'Selesai', 'Tolong kirim ke pak solihin', 11, 6, 7, '2019-05-28 08:25:08', '2019-05-28 09:06:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(65) NOT NULL,
  `level` enum('Admin','Pegawai','Kurir') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `nama`, `foto`, `username`, `password`, `level`) VALUES
(1, 'Administrator', 'no-photo.png', 'adminator', '$2y$10$59WOOg5GBgUcyxj3qEM3W.rHTJ.T2VgLRu0OJbHUjt3Z42yJCtiwS', 'Admin'),
(2, 'Pegawai 1', 'no-photo.png', 'pegawai_1', '$2y$10$ezghiELPPzTHcjMyJ5wT5eiFDm2UisDGKPjR2da.XUdbpZ8nrsluu', 'Pegawai'),
(3, 'Kurir 101', 'no-photo.png', 'kurir_101', '$2y$10$LqokXG7w139Xh7SyKBk.O.UoXb4gZDQ31mq.YbrF4mAQfvGVOciay', 'Kurir'),
(4, 'Kurir 2', 'no-photo.png', 'kurir_2', '$2y$10$vX3qBwwiQU5vz9zSaj59UuSYMbiBvwL7qLI80wYZS94AFDdk4WyTS', 'Kurir'),
(5, 'Pegawai 2', 'no-photo.png', 'pegawai_2', '$2y$10$38afJ2R9GKVUBDz4HIWo3uk4b/VnEFwLaev0AIjtQq6pOuJskNSu.', 'Pegawai'),
(6, 'Pegawai 3', 'no-photo.png', 'pegawai_3', '$2y$10$F00l4kIfeNXAjVuuZx5TpewSPr4F2sNs5VK0dLZj6lff1VHlf/yYm', 'Pegawai'),
(7, 'Kurir 3', 'no-photo.png', 'kurir_3', '$2y$10$ahrjZt6UssQ/1maFQRhte.aHW8fwo.YygE0QhOjnhU5PeOrlFfMY2', 'Kurir');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`pengiriman_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pengiriman`
--
ALTER TABLE `pengiriman`
  MODIFY `pengiriman_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
