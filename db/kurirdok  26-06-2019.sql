-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 26, 2019 at 03:06 PM
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
-- Table structure for table `berita_acara`
--

CREATE TABLE IF NOT EXISTS `berita_acara` (
  `id_berita` int(11) NOT NULL,
  `berita` text NOT NULL,
  `pengiriman_id` int(11) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita_acara`
--

INSERT INTO `berita_acara` (`id_berita`, `berita`, `pengiriman_id`, `time`) VALUES
(1, 'Perusahaannya tidak ada', 4, '2019-06-25 21:41:19');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `log_id` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `keterangan` varchar(100) NOT NULL,
  `pengiriman_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`log_id`, `time`, `keterangan`, `pengiriman_id`) VALUES
(1, '2019-05-28 09:06:01', 'Pegawai 3 mengajukan pengiriman dokumen ', 6),
(2, '2019-05-28 09:06:06', 'Kurir 3 mengirim dokumen', 6),
(3, '2019-05-28 09:06:59', 'Kurir 3 selesai mengirim dokumen', 6),
(4, '2019-06-15 12:01:03', 'Pegawai 2 mengajukan pengiriman dokumen ', 1),
(5, '2019-06-15 12:28:04', 'Kurir 2 mengirim dokumen ', 1),
(6, '2019-06-15 12:28:20', 'Kurir 2 selesai mengirim dokumen ', 1),
(7, '2019-06-15 12:32:18', 'Pegawai 2 mengajukan pengiriman dokumen ', 1),
(8, '2019-06-15 12:33:53', 'Kurir 2 mengirim dokumen ', 1),
(9, '2019-06-15 13:10:11', 'Kurir 2 mengupload struk ', 1),
(10, '2019-06-15 13:37:51', 'Kurir 2 selesai mengirim dokumen ', 1),
(11, '2019-06-17 15:50:27', 'Pegawai 2 mengajukan pengiriman dokumen ', 2),
(12, '2019-06-17 15:51:19', 'Kurir 3 mengirim dokumen ', 2),
(13, '2019-06-17 15:51:34', 'Kurir 3 mengupload struk ', 2),
(14, '2019-06-17 15:52:11', 'Kurir 3 mengupload struk ', 2),
(15, '2019-06-17 15:53:33', 'Kurir 3 mengupload struk ', 2),
(16, '2019-06-17 15:53:56', 'Kurir 3 mengupload struk ', 2),
(17, '2019-06-17 15:54:06', 'Kurir 3 mengupload struk ', 2),
(18, '2019-06-17 15:54:37', 'Kurir 3 selesai mengirim dokumen ', 2),
(19, '2019-06-22 02:12:12', 'Pegawai 1 mengajukan pengiriman dokumen ', 3),
(20, '2019-06-22 02:12:44', 'Pegawai 1 mengajukan pengiriman dokumen ', 4),
(21, '2019-06-22 02:17:43', 'Pegawai 2 mengajukan pengiriman dokumen ', 5),
(22, '2019-06-22 02:18:55', 'Pegawai 2 mengajukan pengiriman dokumen ', 6),
(23, '2019-06-25 14:01:11', 'Kurniawan Rahmat mengirim dokumen ', 4),
(24, '2019-06-25 14:35:10', 'Ahmad Saifullah membatalkan pengiriman ', 3),
(25, '2019-06-25 14:40:38', 'Kurniawan Rahmat membatalkan pengiriman ', 4);

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman`
--

CREATE TABLE IF NOT EXISTS `pengiriman` (
  `pengiriman_id` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `tujuan` varchar(255) NOT NULL,
  `status` enum('Tunggu','Kirim','Selesai','Batal') NOT NULL DEFAULT 'Tunggu',
  `note` varchar(255) DEFAULT NULL,
  `upload_bukti` varchar(100) DEFAULT NULL,
  `upload_struk` varchar(100) DEFAULT NULL,
  `pengirim` int(11) NOT NULL,
  `kurir` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengiriman`
--

INSERT INTO `pengiriman` (`pengiriman_id`, `judul`, `tujuan`, `status`, `note`, `upload_bukti`, `upload_struk`, `pengirim`, `kurir`, `created_at`, `updated_at`) VALUES
(1, 'Proposal Aplikasi Absen Pegawai', 'Kepala Divisi IT, Gedung A, Ruang Manajer', 'Selesai', NULL, '1-photo2.png-1560605871', '["1-avatar.png","1-avatar2.png","1-avatar3.png","1-avatar04.png","1-avatar5.png"]', 5, 4, '2019-06-15 12:32:18', '2019-06-15 13:37:51'),
(2, 'Proposal Permintaan Pembelian Komputer', 'PT. Penyedia, Jl. Tersedia, Kel. Ada', 'Selesai', NULL, '2-photo2.png-1560786878', '["2-avatar.png"]', 5, 7, '2019-06-17 15:50:27', '2019-06-17 15:54:37'),
(3, 'Pengajuan Permintaan Pengadaan Komputer', 'PT.Digital Mitra Persada, Kebon Jeruk, Jakarta INDONESIA', 'Batal', '', NULL, NULL, 2, NULL, '2019-06-22 02:12:12', '2019-06-25 14:49:52'),
(4, 'Penambahan Server', 'PT.Digital Mitra Persada, Kebon Jeruk, Jakarta INDONESIA', 'Batal', '', NULL, NULL, 2, 7, '2019-06-22 02:12:44', '2019-06-25 14:50:30'),
(5, 'Pengajuan Kerja Sama ', 'PT. Adalah', 'Tunggu', '', NULL, NULL, 5, NULL, '2019-06-22 02:17:42', '0000-00-00 00:00:00'),
(6, 'Pengajuan Izin', 'Event Tekno', 'Tunggu', '', NULL, NULL, 5, NULL, '2019-06-22 02:18:55', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `telp` varchar(20) DEFAULT NULL,
  `divisi` varchar(100) DEFAULT NULL,
  `ruangan` varchar(100) DEFAULT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(65) NOT NULL,
  `level` enum('Admin','Pegawai','Kurir') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `nama`, `foto`, `telp`, `divisi`, `ruangan`, `username`, `password`, `level`) VALUES
(1, 'Administrator', '.png', '', '', '', 'adminator', '$2y$10$59WOOg5GBgUcyxj3qEM3W.rHTJ.T2VgLRu0OJbHUjt3Z42yJCtiwS', 'Admin'),
(2, 'Ahmad Saifullah', '.png', NULL, 'IT', 'Ruang Staff IT', 'pegawai_1', '$2y$10$Nzbp2eCiKHPlCG.w4iBKBOWnQQlk9ppe7Ik1EDI6Zwc1/OLurmpGS', 'Pegawai'),
(3, 'Kurir 101', 'no-photo.png', '', '', '', 'kurir_101', '$2y$10$LqokXG7w139Xh7SyKBk.O.UoXb4gZDQ31mq.YbrF4mAQfvGVOciay', 'Kurir'),
(4, 'Kurir 2', '.png', '081517210241', NULL, NULL, 'kurir_2', '$2y$10$iqc8yjEYmFk.vGr3tPeZg.X0bFzZKqhTF0Y75InMlgNWutOelUEKO', 'Kurir'),
(5, 'Pegawai 2', 'no-photo.png', NULL, 'IT Programmer', 'Lt. 3, Ruang IT', 'pegawai_2', '$2y$10$38afJ2R9GKVUBDz4HIWo3uk4b/VnEFwLaev0AIjtQq6pOuJskNSu.', 'Pegawai'),
(6, 'Pegawai 3', 'no-photo.png', '', '', '', 'pegawai_3', '$2y$10$F00l4kIfeNXAjVuuZx5TpewSPr4F2sNs5VK0dLZj6lff1VHlf/yYm', 'Pegawai'),
(7, 'Kurniawan Rahmat', '.png', '0876980513', NULL, NULL, 'kurir_3', '$2y$10$.fRIAvetpfaLYJrnnygTMepy6cv1o7DWcFlFYPZ0Qi2U8gdq.Psoe', 'Kurir');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita_acara`
--
ALTER TABLE `berita_acara`
  ADD PRIMARY KEY (`id_berita`);

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
-- AUTO_INCREMENT for table `berita_acara`
--
ALTER TABLE `berita_acara`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
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
