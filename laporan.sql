-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2024 at 05:59 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laporan`
--

-- --------------------------------------------------------

--
-- Table structure for table `acara`
--

CREATE TABLE `acara` (
  `id_acara` int(11) NOT NULL,
  `judul_acara` varchar(255) DEFAULT NULL,
  `id_jenis_acara` int(11) DEFAULT NULL,
  `lokasi` varchar(255) DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `isi` text DEFAULT NULL,
  `created_by` text DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `acara`
--

INSERT INTO `acara` (`id_acara`, `judul_acara`, `id_jenis_acara`, `lokasi`, `tgl`, `isi`, `created_by`, `created_at`, `status`) VALUES
(12, 'assaa', 6, 'assas', '2024-06-17', '<p>asasssssssssss</p>', '13', '2024-06-17', NULL),
(13, 'as', 6, 'as', '2024-06-17', '<p>assssss</p>', '13', '2024-06-17', NULL),
(14, 'Kerja Bakti', 6, 'Balai RT', '2024-06-18', '<p>Dimohon bapak-bapak untuk berkumpul di balai RT untuk kerja bakti. Terima Kasih.</p>', '1', '2024-06-18', 'PENDING'),
(15, 'Arisan Ibu', 7, 'Rumah Bu X', '2024-06-18', '<p>Dimohon ibu-ibu untuk dapat hadir di arisan bulanan dirumah Bu X.</p>', '1', '2024-06-18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `foto_acara`
--

CREATE TABLE `foto_acara` (
  `id_foto` int(11) NOT NULL,
  `id_acara` int(11) NOT NULL,
  `foto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `foto_acara`
--

INSERT INTO `foto_acara` (`id_foto`, `id_acara`, `foto`) VALUES
(0, 12, '17-06-2024-logo.png'),
(0, 13, '17-06-2024-image-removebg-preview.png'),
(0, 14, '18-06-2024-20541_medium_gotong-royong-1.jpeg'),
(0, 15, '18-06-2024-polres-cianjur-dikabarkan-berhasil-tangkap-bos-arisan.webp');

-- --------------------------------------------------------

--
-- Table structure for table `foto_kegiatan`
--

CREATE TABLE `foto_kegiatan` (
  `id_foto` int(11) NOT NULL,
  `id_laporan` int(11) NOT NULL,
  `foto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `foto_kegiatan`
--

INSERT INTO `foto_kegiatan` (`id_foto`, `id_laporan`, `foto`) VALUES
(5, 3, '23-05-2022-gambar1.jpg'),
(6, 3, '23-05-2022-gambar 2.jpg'),
(8, 5, '16-06-2024-image-removebg-preview.png'),
(9, 6, '16-06-2024-image-removebg-preview.png'),
(10, 7, '17-06-2024-Palette.png'),
(11, 8, '17-06-2024-logo.png'),
(12, 9, '18-06-2024-image-removebg-preview (1).png'),
(13, 10, '18-06-2024-20541_medium_gotong-royong-1.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_acara`
--

CREATE TABLE `jenis_acara` (
  `id_jenis_acara` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_at` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `jenis_acara`
--

INSERT INTO `jenis_acara` (`id_jenis_acara`, `judul`, `created_by`, `created_at`) VALUES
(6, 'Kerja Bakti', 'Ari Dwiantoro', '16-06-2024 20:20:04'),
(7, 'Arisan Ibu', 'Ari Dwiantoro', '16-06-2024 20:22:40'),
(8, 'Rapat Bulanan', 'Ari Dwiantoro', '16-06-2024 20:22:54');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_laporan`
--

CREATE TABLE `jenis_laporan` (
  `id_jenis_laporan` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_at` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `jenis_laporan`
--

INSERT INTO `jenis_laporan` (`id_jenis_laporan`, `judul`, `created_by`, `created_at`) VALUES
(6, 'Fasilitas', 'Ari Dwiantoro', '16-06-2024 21:03:52'),
(7, 'Sosial', 'Ari Dwiantoro', '16-06-2024 21:03:57');

-- --------------------------------------------------------

--
-- Table structure for table `laporan_kegiatan`
--

CREATE TABLE `laporan_kegiatan` (
  `id_laporan` int(11) NOT NULL,
  `judul_laporan` varchar(255) DEFAULT NULL,
  `id_jenis_laporan` int(11) DEFAULT NULL,
  `lokasi` varchar(255) DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `isi` text DEFAULT NULL,
  `created_by` text DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `laporan_kegiatan`
--

INSERT INTO `laporan_kegiatan` (`id_laporan`, `judul_laporan`, `id_jenis_laporan`, `lokasi`, `tgl`, `isi`, `created_by`, `created_at`, `status`) VALUES
(9, 'Jalan rusak', 6, 'depan gapura', '2024-06-18', '<p>tolong bolong saya sampe jatuh</p>', '20', '2024-06-18', 'DITERIMA'),
(10, 'Tetangga berisik', 7, 'Rumah saya', '2024-06-18', '<p>haduh tetangga berisik hajatan</p>', '20', '2024-06-18', 'DITOLAK');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id_staff` int(11) NOT NULL,
  `nik` varchar(30) DEFAULT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(30) NOT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `tipe` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id_staff`, `nik`, `nama`, `jenis_kelamin`, `alamat`, `password`, `tipe`) VALUES
(1, '22082010085', 'Yumna Kamilah Mahdiyah', 'Perempuan', 'Jl. Setro Baru no. 45', '123456', 'admin'),
(18, '22082010062', 'Shania Chairunnisa Santoso', 'perempuan', 'Jl. ABC', '123456', 'admin'),
(19, '22082010063', 'Vione Mangunsong', 'perempuan', 'Jl. DSA', '123456', 'admin'),
(20, '01', 'Pak X', 'laki-laki', 'Jl. QWE', '123456', 'anggota');

-- --------------------------------------------------------

--
-- Table structure for table `video_acara`
--

CREATE TABLE `video_acara` (
  `id_video` int(11) NOT NULL,
  `id_acara` int(11) NOT NULL,
  `video` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `video_acara`
--

INSERT INTO `video_acara` (`id_video`, `id_acara`, `video`) VALUES
(0, 14, '18-06-2024-TIMER 5 DETIK.mp4');

-- --------------------------------------------------------

--
-- Table structure for table `video_kegiatan`
--

CREATE TABLE `video_kegiatan` (
  `id_video` int(11) NOT NULL,
  `id_laporan` int(11) NOT NULL,
  `video` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `video_kegiatan`
--

INSERT INTO `video_kegiatan` (`id_video`, `id_laporan`, `video`) VALUES
(3, 3, '23-05-2022-00064.mp4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acara`
--
ALTER TABLE `acara`
  ADD PRIMARY KEY (`id_acara`);

--
-- Indexes for table `foto_kegiatan`
--
ALTER TABLE `foto_kegiatan`
  ADD PRIMARY KEY (`id_foto`);

--
-- Indexes for table `jenis_acara`
--
ALTER TABLE `jenis_acara`
  ADD PRIMARY KEY (`id_jenis_acara`);

--
-- Indexes for table `jenis_laporan`
--
ALTER TABLE `jenis_laporan`
  ADD PRIMARY KEY (`id_jenis_laporan`);

--
-- Indexes for table `laporan_kegiatan`
--
ALTER TABLE `laporan_kegiatan`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id_staff`);

--
-- Indexes for table `video_kegiatan`
--
ALTER TABLE `video_kegiatan`
  ADD PRIMARY KEY (`id_video`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acara`
--
ALTER TABLE `acara`
  MODIFY `id_acara` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `foto_kegiatan`
--
ALTER TABLE `foto_kegiatan`
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `jenis_acara`
--
ALTER TABLE `jenis_acara`
  MODIFY `id_jenis_acara` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `jenis_laporan`
--
ALTER TABLE `jenis_laporan`
  MODIFY `id_jenis_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `laporan_kegiatan`
--
ALTER TABLE `laporan_kegiatan`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id_staff` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `video_kegiatan`
--
ALTER TABLE `video_kegiatan`
  MODIFY `id_video` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
