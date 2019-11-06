-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2019 at 01:48 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_apasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `dispo_direktur`
--

CREATE TABLE `dispo_direktur` (
  `id` int(11) NOT NULL,
  `wadir_id` int(11) NOT NULL,
  `isi` varchar(200) NOT NULL,
  `tgl_kirim` date NOT NULL,
  `status` int(11) NOT NULL,
  `approve` int(11) NOT NULL,
  `surat_masuk_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dispo_pimpinan`
--

CREATE TABLE `dispo_pimpinan` (
  `id` int(11) NOT NULL,
  `pimpinan_id` int(11) NOT NULL,
  `isi` text NOT NULL,
  `tgl_kirim` date NOT NULL,
  `status` int(11) NOT NULL,
  `approve` int(11) NOT NULL,
  `surat_masuk_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dispo_wadir`
--

CREATE TABLE `dispo_wadir` (
  `id` int(11) NOT NULL,
  `pimpinan_id` int(11) NOT NULL,
  `isi` varchar(150) NOT NULL,
  `tgl_kirim` date NOT NULL,
  `status` int(11) NOT NULL,
  `approve` int(11) NOT NULL,
  `surat_masuk_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id` int(11) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id`, `jabatan`, `role_id`) VALUES
(1, 'Koordinator Prodi TI', 4),
(2, 'Koordinator Prodi TM', 4),
(3, 'Koordinator TS', 4),
(4, 'Direktur', 2),
(5, 'Wadir 1 ', 3),
(6, 'Wadir 2', 3),
(7, 'Wadir 3', 3),
(8, 'Sekretaris Pimpinan', 1),
(9, 'Koordinator TPHT', 4);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_dispo`
--

CREATE TABLE `jenis_dispo` (
  `id` int(11) NOT NULL,
  `nama_jenis` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_dispo`
--

INSERT INTO `jenis_dispo` (`id`, `nama_jenis`) VALUES
(1, 'Rahasia'),
(2, 'Penting'),
(3, 'Segera'),
(4, 'Biasa');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(11) NOT NULL,
  `nip` varchar(35) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jabatan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `nip`, `nama`, `jabatan_id`) VALUES
(12, '361655401136', 'H. Son Kuswadi, Dr.Eng.', 4),
(13, '139000122122', 'Qori\'atul Maghfiroh', 8),
(14, '361655401136', 'Dedy Hidayat', 5),
(15, '361655401136', 'Bu Ine', 1),
(16, '3615156361717', 'Muh. Fuad Al Haris, S.T, M.T', 6),
(17, '3615156111111', 'Dedy Kusuma Hidayat, S.T., M.Cs', 5),
(18, '36151563111121112', 'M. Shofi\'ul Amin, S.T., M.T', 7),
(19, '36151563617009', 'Nuraini Lusi, S.Pd., M.T', 2),
(20, '361515611111113', 'Yuni Ulfiyati, S.T., M.T', 3),
(21, '361111122323617', 'Moh. Dimyati A, S.T.,M.Kom', 1),
(22, '139000124444', 'Asmaul Khusna, S.Pt., M.M', 9);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role` varchar(25) NOT NULL,
  `link` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`, `link`) VALUES
(1, 'admin', ''),
(2, 'direktur', ''),
(3, 'wadir', ''),
(4, 'pimpinan', '');

-- --------------------------------------------------------

--
-- Table structure for table `suratmasuk`
--

CREATE TABLE `suratmasuk` (
  `id` int(11) NOT NULL,
  `no_surat` varchar(50) NOT NULL,
  `tgl_terima` varchar(50) NOT NULL,
  `pengirim` varchar(50) NOT NULL,
  `perihal` varchar(150) NOT NULL,
  `tgl_surat` varchar(50) NOT NULL,
  `lampiran` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `status` int(11) NOT NULL,
  `jenis_id` int(11) NOT NULL,
  `dispo_direktur_id` int(11) NOT NULL,
  `dispo_wadir_id` int(11) NOT NULL,
  `dispo_pimpinan_id` int(11) NOT NULL,
  `status_wadir` int(11) NOT NULL,
  `status_wadir_approve` int(11) NOT NULL,
  `status_pimpinan` int(11) NOT NULL,
  `status_pimpinan_approve` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_created` varchar(45) NOT NULL,
  `is_active` int(1) NOT NULL,
  `pegawai_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `username`, `password`, `date_created`, `is_active`, `pegawai_id`) VALUES
(15, 2, 'direktur', '$2y$10$Yy/QI6eH/fVN/GggFz1vvOSJCNqvxEmMVLE7kb3IXPj/0S2Bb9Fam', '2019-04-20 12:07:59', 1, 12),
(16, 1, 'admin', '$2y$10$1S6yLvh29Nsz/DnyyAKG5.XKGh54ZRJxfUT78y5G86bWa1jXezILS', '2019-04-20 12:10:44', 1, 13),
(19, 3, 'wadir2', '$2y$10$PureKcexW4E4d0kyadVZiOPojBBH0copYU1oVVJ6z3XdcP4RRZ.FG', '2019-05-20 08:51:08', 1, 16),
(20, 3, 'wadir1', '$2y$10$p9ALB26BKaU2rZAsZouLQ.YCah8COZrX4E8OIQLNpTVdUZdglq4LK', '2019-06-30 19:52:11', 1, 17),
(21, 3, 'wadir3', '$2y$10$AffXj2XAo.h/tzr/C6cKmemAHk7fufwH59esD0rjaAVjz8VKcEBB.', '2019-06-30 19:53:48', 1, 18),
(22, 4, 'koortm', '$2y$10$pEXIaYOGYuBUdYFvUC/dBu.85Fu2VChYBwBTrOAFTO.lPs1s1ChZS', '2019-06-30 19:55:17', 1, 19),
(23, 4, 'koorts', '$2y$10$DsVhBcHgie7cKzXdYLHVH.armM5BtZ/GT//Eh7lQm4NvMODC8DZTW', '2019-06-30 19:56:31', 1, 20),
(24, 4, 'koorti', '$2y$10$u0vw1a/3MhUbrEuicK/Nc.Ctn0.6mBd.o6R.7CcBqAux5Bip44sOG', '2019-06-30 20:53:04', 1, 21),
(25, 4, 'koortpht', '$2y$10$u0vw1a/3MhUbrEuicK/Nc.Ctn0.6mBd.o6R.7CcBqAux5Bip44sOG', '2019-06-30 20:53:04', 1, 22);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dispo_direktur`
--
ALTER TABLE `dispo_direktur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dispo_pimpinan`
--
ALTER TABLE `dispo_pimpinan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dispo_wadir`
--
ALTER TABLE `dispo_wadir`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_dispo`
--
ALTER TABLE `jenis_dispo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suratmasuk`
--
ALTER TABLE `suratmasuk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jenis_id` (`jenis_id`),
  ADD KEY `dispo_direktur` (`dispo_direktur_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `pegawai_id` (`pegawai_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dispo_direktur`
--
ALTER TABLE `dispo_direktur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `dispo_pimpinan`
--
ALTER TABLE `dispo_pimpinan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dispo_wadir`
--
ALTER TABLE `dispo_wadir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `jenis_dispo`
--
ALTER TABLE `jenis_dispo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `suratmasuk`
--
ALTER TABLE `suratmasuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `suratmasuk`
--
ALTER TABLE `suratmasuk`
  ADD CONSTRAINT `suratmasuk_ibfk_1` FOREIGN KEY (`jenis_id`) REFERENCES `jenis_dispo` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
