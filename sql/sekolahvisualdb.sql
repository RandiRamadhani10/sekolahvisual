-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2021 at 03:20 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sekolahvisualdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `karya`
--

CREATE TABLE `karya` (
  `id_karya` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama_karya` varchar(100) NOT NULL,
  `karya` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `karya`
--

INSERT INTO `karya` (`id_karya`, `user_id`, `nama_karya`, `karya`) VALUES
(1, 82, 'karya 1', '606724a0b9b36.png'),
(2, 82, 'karya 2', '606724e46133b.png'),
(4, 82, 'karya 2', '6067253062d4b.png'),
(5, 82, 's', '60672feb357c1.png'),
(6, 82, 'a', '606730159c14e.png'),
(7, 84, 'coba', '606d0778a1373.jpg'),
(8, 88, 'karya 2', '60bcbfdec7054.jpg'),
(9, 88, 'karya 3', '60bcbff2701ce.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `tutor_id` int(11) NOT NULL,
  `nama_kelas` text NOT NULL,
  `deskripsi` text NOT NULL,
  `kategori` varchar(150) NOT NULL,
  `harga_kelas` int(11) NOT NULL,
  `thumbnail` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `tutor_id`, `nama_kelas`, `deskripsi`, `kategori`, `harga_kelas`, `thumbnail`) VALUES
(49, 16, 'Belajar ilustrasi isometric/3d dasar', 'belajar tentang penggunaan software adobe ilustrator&gt;', 'desaingrafis', 100000, '6065b506456ab.png'),
(50, 16, 'Belajar ilustrasi isometric/3d fundamental', 'Ai&gt;&gt;', 'desaingrafis', 150000, '6065b5283e5d4.png'),
(51, 16, 'Belajar ilustrasi Isometric/3D expert', 'Ai', 'desaingrafis', 200000, '6065b5473cb3c.png');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `isi_komentar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `id_materi` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `nama_materi` varchar(100) NOT NULL,
  `konten_video` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`id_materi`, `kelas_id`, `nama_materi`, `konten_video`) VALUES
(22, 49, 'Materi isometric dasar 1', 'PXukTTXbeHM'),
(23, 49, 'Materi isometric dasar 2', 'IHa1f2bAXDc'),
(24, 49, 'Materi isometric dasar 3', 'aXxu65goovw'),
(25, 50, 'Materi isometric fundamental 1', 'mV8C_hmnP3A'),
(26, 50, 'Materi isometric fundamental 2', 'o7kmYMwt-WM'),
(27, 51, 'Materi isometric expert 1', 'xkm_1bCk_uE'),
(28, 51, 'Materi isometric expert 2', '3NpTJyccdhg');

-- --------------------------------------------------------

--
-- Table structure for table `tutor`
--

CREATE TABLE `tutor` (
  `id_tutor` int(11) NOT NULL,
  `nama_lengkap_tutor` text NOT NULL,
  `pic_tutor` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tutor`
--

INSERT INTO `tutor` (`id_tutor`, `nama_lengkap_tutor`, `pic_tutor`) VALUES
(16, 'Farras Jatnika', '6065b2479e5ac.jpg'),
(38, 'Benny', '60bcc0a0721ef.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `nama_lengkap_user` text NOT NULL,
  `foto_profil` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama_lengkap_user`, `foto_profil`) VALUES
(82, 'anaswara', '$2y$10$UvnNQyK6VRsiIcqOC.dC0ugTs6crelw2D9yjehga7XHS/2r75Okda', 'Dwi Randi Ramadhani', '60b6bfb447e3e.jpg'),
(83, 'admin', '$2y$10$xO7CkxyYsz5LLycKfLWlWuRpda4nVipcR69JpMK/467PuI.qTSnTm', 'admin', 'default.jpg'),
(84, 'dwi', '$2y$10$pmgBVipfsXF7uviOui/.I.njmlZjARhDmeIMIdQGFAT3DHpPMFkie', 'Dwi R', '606d0758dabe2.jpg'),
(85, 'dede', '$2y$10$eqpW69J13XCIn1.TjieaQOx7Nm4GWlPyDs0DPGYAMYMTM8h5wEwtW', 'dede', 'default.jpg'),
(86, 'coba', '$2y$10$KCX5OqzQmQU8gRW8bbT8Z.pNohoO6AUfX2kB/dKWcPI.XiTwcs4P.', 'coba', 'default.jpg'),
(87, 'user1', '$2y$10$87s4llYYgNcSfBS3uReshu/DJqeP57h/TZL.APVmmNKtb4Wwhezcq', '123', 'default.jpg'),
(88, 'lord', '$2y$10$2FxtGbI1t6uc/xVKaoJTYOfMNeWvgfhsF5xXUBoTgSRAWWfyPEtBa', 'demo 1 har ini', '60bcbf7c1bbf8.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_kelas`
--

CREATE TABLE `user_kelas` (
  `user_kelas_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_kelas`
--

INSERT INTO `user_kelas` (`user_kelas_id`, `user_id`, `kelas_id`) VALUES
(2, 82, 49),
(3, 82, 50),
(4, 82, 51),
(5, 84, 49),
(6, 87, 50),
(7, 88, 49);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `karya`
--
ALTER TABLE `karya`
  ADD PRIMARY KEY (`id_karya`),
  ADD KEY `fk_user_karya` (`user_id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `fk_kelas_tutor` (`tutor_id`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`),
  ADD KEY `fk_user_komentar` (`user_id`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id_materi`),
  ADD KEY `fk_materi_kelas` (`kelas_id`);

--
-- Indexes for table `tutor`
--
ALTER TABLE `tutor`
  ADD PRIMARY KEY (`id_tutor`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `user_kelas`
--
ALTER TABLE `user_kelas`
  ADD PRIMARY KEY (`user_kelas_id`),
  ADD KEY `fk_user_one_many` (`user_id`),
  ADD KEY `fk_kelas_one_many` (`kelas_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `karya`
--
ALTER TABLE `karya`
  MODIFY `id_karya` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `id_materi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tutor`
--
ALTER TABLE `tutor`
  MODIFY `id_tutor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `user_kelas`
--
ALTER TABLE `user_kelas`
  MODIFY `user_kelas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `karya`
--
ALTER TABLE `karya`
  ADD CONSTRAINT `fk_user_karya` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`) ON DELETE CASCADE;

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `fk_kelas_tutor` FOREIGN KEY (`tutor_id`) REFERENCES `tutor` (`id_tutor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `fk_user_komentar` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`) ON DELETE CASCADE;

--
-- Constraints for table `materi`
--
ALTER TABLE `materi`
  ADD CONSTRAINT `fk_materi_kelas` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_kelas`
--
ALTER TABLE `user_kelas`
  ADD CONSTRAINT `fk_kelas_one_many` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id_kelas`),
  ADD CONSTRAINT `fk_user_one_many` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
