-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2025 at 03:52 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ref`
--

-- --------------------------------------------------------

--
-- Table structure for table `aplikasi`
--

CREATE TABLE `aplikasi` (
  `id_aplikasi` int(11) NOT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `aplikasi` varchar(255) DEFAULT NULL,
  `prosesor` varchar(255) DEFAULT NULL,
  `clockspeed` float DEFAULT NULL,
  `ram` int(11) DEFAULT NULL,
  `grafis` varchar(255) NOT NULL,
  `vram` int(11) DEFAULT NULL,
  `storage` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aplikasi`
--

INSERT INTO `aplikasi` (`id_aplikasi`, `id_kategori`, `aplikasi`, `prosesor`, `clockspeed`, `ram`, `grafis`, `vram`, `storage`) VALUES
(4, 1, 'Microsoft Office', 'Dual-core 1.6', 1.6, 4, 'Integrated Graphics', 0, 4),
(5, 1, 'Adobe Acrobat Reader', 'Intel Pentium 4', 1.8, 1, 'Integrated Graphics', 0, 1),
(6, 1, 'WPS Office', 'Dual-core Intel / AMD', 1.8, 2, 'Integrated Graphics', 0, 1),
(7, 1, 'Zoom / MS Teams', 'Dual-core 2', 2, 4, 'Integrated Graphics', 0, 1),
(8, 1, 'Discord', 'Intel Core 2 Duo', 1.8, 2, 'Integrated Graphics', 0, 0.3),
(9, 1, 'Telegram Desktop', 'Intel/AMD Dual-core', 1, 1, 'Integrated Graphics', 0, 0.3),
(10, 1, 'WhatsApp Desktop', 'Intel/AMD Dual-core', 1.5, 2, 'Integrated Graphics', 0, 0.3),
(11, 2, 'Visual Studio Code', 'Quad-core Intel / AMD', 1.8, 4, 'Integrated Graphics', 0, 20),
(12, 2, 'Android Studio', 'Intel Core i5', 2, 8, 'Integrated Graphics', 0, 4),
(13, 2, 'Notepad++', 'Intel/AMD Dual-core', 1, 1, 'Integrated Graphics', 0, 0.1),
(14, 3, 'OBS Studio', 'Dual-core Intel / AMD', 2, 4, 'Integrated Graphics', 1, 0.2),
(15, 1, 'Google Chrome', 'Intel Pentium 4', 1.8, 2, 'Integrated Graphics', 0, 0.5),
(16, 1, 'Mozilla Firefox', 'Intel/AMD Dual-core', 1.5, 2, 'Integrated Graphics', 0, 0.5),
(17, 1, 'Microsoft Edge', 'Intel/AMD Dual-core', 1.5, 2, 'Integrated Graphics', 0, 0.5),
(18, 1, 'KMPlayer', 'Intel Dual-core', 1.6, 2, 'Integrated Graphics', 0, 0.3),
(19, 1, 'AIMP', 'Intel Pentium 4', 1, 1, 'Integrated Graphics', 0, 0.1),
(20, 1, 'VLC Media Player', 'Intel Pentium 4', 1.6, 1, 'Integrated Graphics', 0, 0.5),
(21, 4, 'GIMP', 'Intel Core i3', 2, 4, 'Integrated Graphics ', 1, 0.5),
(22, 4, 'CorelDRAW', 'Intel Core i3 / AMD Ryzen', 2, 8, 'Integrated Graphics ', 1, 5.5),
(23, 4, 'AutoCAD', 'Intel Core i3 Gen-6 / AMD equivalent', 2.5, 8, 'Integrated Graphics ', 1, 7),
(24, 4, 'Adobe Illustrator', 'Multicore Intel / AMD', 2, 8, 'Integrated Graphics ', 1, 3),
(25, 4, 'Blender', 'Intel Core i3', 2, 4, 'Integrated Graphics ', 1, 0.5),
(26, 4, 'Adobe Photoshop', 'Intel Core i3 gen-6 / AMD', 2.4, 8, 'Integrated Graphics', 2, 4),
(27, 4, 'Adobe Premiere Pro', 'Intel Core i5 / Ryzen 5', 2.5, 8, 'NVIDIA GTX 1050', 2, 8),
(28, 4, 'DaVinci Resolve', 'Intel Core i5 / Ryzen 5', 2.5, 16, 'NVIDIA GTX 960 / AMD RX 570', 4, 30),
(29, 4, 'Filmora', 'Intel i3 gen-6 / AMD eqv.', 2, 8, 'Integrated Graphics / NVIDIA GT 730', 2, 10);

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `id_brand` int(11) NOT NULL,
  `tipe` varchar(255) DEFAULT NULL,
  `prosesor` varchar(255) DEFAULT NULL,
  `clockspeed` float NOT NULL,
  `ram` int(11) NOT NULL,
  `storage` int(11) NOT NULL,
  `layar` varchar(255) DEFAULT NULL,
  `grafis` varchar(255) NOT NULL,
  `vram` int(11) NOT NULL,
  `os` varchar(255) NOT NULL,
  `warna` varchar(255) NOT NULL,
  `harga_jual` varchar(255) DEFAULT NULL,
  `kondisi` varchar(255) DEFAULT NULL,
  `stts` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `id_brand`, `tipe`, `prosesor`, `clockspeed`, `ram`, `storage`, `layar`, `grafis`, `vram`, `os`, `warna`, `harga_jual`, `kondisi`, `stts`) VALUES
(9, 5, 'WORKPLUS R5', 'R5-6600H', 4.5, 16, 512, 'VIPS FHD', 'AMD Radeon 660M', 4, 'Windows 11', 'Silver', '6999000', 'NEW', 'READY'),
(10, 5, 'WORKPLUS I5', 'i5-12600H', 4.5, 24, 512, 'VIPS FHD', 'Intel Iris Xe', 2, 'Windows 11', 'Silver', '7799000', 'NEW', 'READY'),
(13, 4, 'IP SLIM 3', 'i5-12450H', 4.4, 16, 512, 'VIPS FHD', 'Intel UHD Graphics', 1, 'Windows 11 + OHS', 'Arctic Grey', '9199000', 'NEW', 'READY'),
(16, 1, 'E1504FA-OLED554', 'R5-7520U', 4.3, 16, 512, 'OLED FHD', 'AMD Radeon 610M', 2, 'Windows 11', 'Mixed Black', '9399000', 'NEW', 'READY'),
(17, 2, 'AL14-52M 59TF', 'i5-1334U', 4.6, 16, 512, 'VIPS FHD', 'Intel Iris Xe', 2, 'Windows 11 + OHS', 'Silver', '9099000', 'NEW', 'READY');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id_brand` int(11) NOT NULL,
  `nama_brand` varchar(255) DEFAULT NULL,
  `stok_new` varchar(255) DEFAULT NULL,
  `stok_second` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id_brand`, `nama_brand`, `stok_new`, `stok_second`) VALUES
(1, 'ASUS', NULL, NULL),
(2, 'ACER', NULL, NULL),
(3, 'HP', NULL, NULL),
(4, 'LENOVO', NULL, NULL),
(5, 'ADVAN', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kategori_aplikasi`
--

CREATE TABLE `kategori_aplikasi` (
  `id_kategori` int(11) NOT NULL,
  `jenis_aplikasi` varchar(255) DEFAULT NULL,
  `clockspeed` float DEFAULT NULL,
  `ram` float DEFAULT NULL,
  `vram` float DEFAULT NULL,
  `storage` float DEFAULT NULL,
  `harga` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori_aplikasi`
--

INSERT INTO `kategori_aplikasi` (`id_kategori`, `jenis_aplikasi`, `clockspeed`, `ram`, `vram`, `storage`, `harga`) VALUES
(1, 'Standart', 0.2, 0.3, 0, 0.2, 0.3),
(2, 'Programming', 0.25, 0.4, 0, 0.2, 0.2),
(3, 'Streaming', 0.2, 0.25, 0.3, 0.15, 0.1),
(4, 'Desain', 0.2, 0.25, 0.25, 0.1, 0.2);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id_login` int(11) NOT NULL,
  `id_member` int(11) DEFAULT NULL,
  `user` varchar(255) DEFAULT NULL,
  `pass` char(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id_login`, `id_member`, `user`, `pass`) VALUES
(1, 1, 'heru', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id_member` int(11) NOT NULL,
  `nm_member` varchar(255) DEFAULT NULL,
  `alamat_member` text DEFAULT NULL,
  `telepon` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id_member`, `nm_member`, `alamat_member`, `telepon`) VALUES
(1, 'Heru Teguh Santoso', 'Kediri', '081234567890');

-- --------------------------------------------------------

--
-- Table structure for table `nota`
--

CREATE TABLE `nota` (
  `id_nota` int(11) NOT NULL,
  `id_barang` varchar(255) DEFAULT NULL,
  `id_member` int(11) DEFAULT NULL,
  `jumlah` varchar(255) DEFAULT NULL,
  `periode` varchar(255) DEFAULT NULL,
  `tanggal_input` varchar(255) DEFAULT NULL,
  `total` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `id_barang` varchar(255) DEFAULT NULL,
  `id_member` int(11) DEFAULT NULL,
  `modal` varchar(255) DEFAULT NULL,
  `tanggal_input` varchar(255) DEFAULT NULL,
  `total` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `toko`
--

CREATE TABLE `toko` (
  `id_toko` int(11) NOT NULL,
  `nama_toko` varchar(255) DEFAULT NULL,
  `nama_pemilik` varchar(255) DEFAULT NULL,
  `alamat_toko` text DEFAULT NULL,
  `tlp` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aplikasi`
--
ALTER TABLE `aplikasi`
  ADD PRIMARY KEY (`id_aplikasi`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_brand` (`id_brand`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id_brand`);

--
-- Indexes for table `kategori_aplikasi`
--
ALTER TABLE `kategori_aplikasi`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`id_nota`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indexes for table `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`id_toko`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aplikasi`
--
ALTER TABLE `aplikasi`
  MODIFY `id_aplikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id_brand` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kategori_aplikasi`
--
ALTER TABLE `kategori_aplikasi`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aplikasi`
--
ALTER TABLE `aplikasi`
  ADD CONSTRAINT `aplikasi_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_aplikasi` (`id_kategori`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
