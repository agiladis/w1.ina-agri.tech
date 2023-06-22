-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2023 at 10:23 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inastekdb1`
--

-- --------------------------------------------------------

--
-- Table structure for table `batch_produksi`
--

CREATE TABLE `batch_produksi` (
  `id` int(100) NOT NULL,
  `id_pemesan` int(11) NOT NULL,
  `kode_batch` int(100) NOT NULL,
  `tgl_mulai` varchar(100) NOT NULL,
  `printed` int(11) DEFAULT '0',
  `kategori` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batch_produksi`
--

INSERT INTO `batch_produksi` (`id`, `id_pemesan`, `kode_batch`, `tgl_mulai`, `printed`, `kategori`) VALUES
(13, 5, 1, '22 June 2023 ', 0, 'STDO'),
(14, 3, 1, '22 June 2023 ', 0, 'INFT'),
(15, 3, 1, '22 June 2023 ', 0, 'STDO');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_produk`
--

CREATE TABLE `kategori_produk` (
  `id` int(10) NOT NULL,
  `kode` varchar(100) NOT NULL,
  `detail` varchar(100) NOT NULL,
  `unit` int(100) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_produk`
--

INSERT INTO `kategori_produk` (`id`, `kode`, `detail`, `unit`) VALUES
(1, 'TDWS', 'Timbangan Dewasa', 25),
(2, 'INFT', 'Infanto Meter', 25),
(3, 'STDO', 'Stadio Meter', 25),
(4, 'LILA', 'Lingkar Kepala', 25),
(5, 'BBWS', 'Baby Weight Scale', 25);

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id` int(10) NOT NULL,
  `date` varchar(100) NOT NULL,
  `note` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id`, `date`, `note`) VALUES
(1, '17-05-2023 16:37:06', 'User Fatkhurrozi menambahkan item incoming hardware LCD dengan kode 17-05-1-100'),
(2, '17-05-2023 16:45:15', 'User Fatkhurrozi memperbarui item incoming hardware 17-05'),
(3, '17-05-2023 16:57:27', 'User Fatkhurrozi menambahkan item incoming hardware LCD dengan kode 17-05-2-100'),
(4, '17-05-2023 16:57:52', 'User Fatkhurrozi menambahkan item incoming hardware PCB-BBWS  dengan jumlah 3 kardus'),
(5, '19-05-2023 11:20:05', 'User Fatkhurrozi menambahkan item incoming hardware LCD dengan kode 12-12-1-100'),
(6, '19-05-2023 11:24:32', 'User Fatkhurrozi menambahkan item incoming hardware LCD dengan kode 12-12-1-100'),
(7, '19-05-2023 11:24:58', 'User Fatkhurrozi menambahkan item incoming hardware LCD dengan jumlah 2 kardus'),
(8, '19-05-2023 06:30:17', 'Fatkhurrozi menambahkan batch produksi baru dengan kode batch 1'),
(9, '19-05-2023 11:30:41', 'User Fatkhurrozi input QC in-proses pada serial-number WD-TDWS-1-001 dengan kondisi Good'),
(10, '19-05-2023 06:30:46', 'Fatkhurrozi input final QC pada SN WD-TDWS-1-001 dengan kondisi final Good'),
(11, '19-05-2023 11:31:01', 'User Fatkhurrozi input final QC pada SN WD-TDWS-1-001 kondisi Not Good dengan cacat LCD      '),
(12, '19-05-2023 11:31:40', 'User Fatkhurrozi input QC in-proses pada serial-number WD-TDWS-1-001 dengan kondisi Not Good'),
(13, '19-05-2023 13:00:57', 'User Fatkhurrozi input QC in-proses pada serial-number WD-TDWS-1-002 dengan kondisi Good'),
(14, '19-05-2023 08:01:03', 'Fatkhurrozi input final QC pada SN WD-TDWS-1-002 dengan kondisi final Good'),
(15, '19-05-2023 08:01:27', 'Fatkhurrozi input final QC pada SN WD-TDWS-1-002 dengan kondisi final Good'),
(16, '19-05-2023 13:01:35', 'User Fatkhurrozi input final QC pada SN WD-TDWS-1-002 kondisi Not Good dengan cacat LCD      '),
(17, '19-05-2023 13:13:09', 'User Fatkhurrozi input final QC pada SN WD-TDWS-1-002 kondisi Not Good dengan cacat LCD PCB     '),
(18, '19-05-2023 08:22:41', 'Fatkhurrozi input final QC pada SN WD-TDWS-1-002 dengan kondisi final Good'),
(19, '22-05-2023 03:38:37', 'Fatkhurrozi menambahkan item incoming hardware LCD dengan kode 12-13-2-100'),
(20, '22-05-2023 03:38:40', 'Fatkhurrozi menambahkan item incoming hardware LCD dengan kode 12-13-2-100'),
(21, '22-05-2023 03:53:56', 'Fatkhurrozi menambahkan item incoming hardware LCD dengan kode 12-13-2-100'),
(22, '22-05-2023 03:54:00', 'Fatkhurrozi menambahkan item incoming hardware LCD dengan kode 12-13-2-100'),
(23, '22-05-2023 03:54:12', 'Fatkhurrozi menambahkan item incoming hardware PCB-BBWS  dengan kode 17-03-3-100'),
(24, '22-05-2023 09:29:26', 'Fatkhurrozi menambahkan item incoming hardware Tiang-Stadio-1 dengan kode 22-05-1-100'),
(25, '22-05-2023 09:31:13', 'rozi update QC pada perangkat Tiang-Stadio-1 batch ke-22-05.1.100 dengan kondisi Good'),
(26, '22-05-2023 06:19:52', 'Fatkhurrozi menambahkan batch produksi baru dengan kode batch 1'),
(27, '22-05-2023 06:23:34', 'Fatkhurrozi menambahkan batch produksi baru dengan kode batch 2'),
(28, '22-05-2023 07:54:49', 'Fatkhurrozi menghapus batch produksi 2'),
(29, '22-05-2023 07:54:53', 'Fatkhurrozi menghapus batch produksi 1'),
(30, '22-05-2023 07:54:56', 'Fatkhurrozi menghapus batch produksi 1'),
(31, '22-05-2023 12:58:14', 'Fatkhurrozi menambahkan item incoming hardware LCD dengan kode 1-1-100'),
(32, '22-05-2023 13:12:23', 'Fatkhurrozi menambahkan item incoming hardware PCB-BBWS  dengan jumlah 1 kardus'),
(33, '22-05-2023 13:15:44', 'Fatkhurrozi menambahkan item incoming hardware PCB-BBWS  dengan jumlah 1 kardus'),
(34, '22-05-2023 13:15:51', 'Fatkhurrozi menambahkan item incoming hardware LCD dengan jumlah 2 kardus'),
(35, '22-05-2023 13:16:22', 'Fatkhurrozi menambahkan item incoming hardware LCD dengan jumlah 2 kardus'),
(36, '22-05-2023 08:53:50', 'Fatkhurrozi menambahkan batch produksi baru dengan kode batch 1'),
(37, '22-05-2023 08:57:05', 'Fatkhurrozi menambahkan batch produksi baru dengan kode batch 2'),
(38, '22-05-2023 09:00:25', 'Fatkhurrozi menambahkan batch produksi baru dengan kode batch 3'),
(39, '22-05-2023 09:00:47', 'Fatkhurrozi menambahkan batch produksi baru dengan kode batch 1'),
(40, '22-05-2023 09:13:09', 'Fatkhurrozi menambahkan batch produksi baru dengan kode batch 4'),
(41, '22-05-2023 09:13:46', 'Fatkhurrozi menghapus batch produksi 4'),
(42, '22-05-2023 09:13:49', 'Fatkhurrozi menghapus batch produksi 1'),
(43, '22-05-2023 09:13:54', 'Fatkhurrozi menghapus batch produksi 3'),
(44, '22-05-2023 09:13:58', 'Fatkhurrozi menghapus batch produksi 2'),
(45, '22-05-2023 09:14:02', 'Fatkhurrozi menghapus batch produksi 1'),
(46, '22-05-2023 09:14:15', 'Fatkhurrozi menambahkan batch produksi baru dengan kode batch 1'),
(47, '22-05-2023 14:25:09', 'Fatkhurrozi menambahkan item incoming hardware PCB-BBWS  dengan jumlah 1 kardus'),
(48, '22-05-2023 14:27:16', 'Fatkhurrozi menambahkan item incoming hardware PCB-TDWS dengan jumlah 1 kardus'),
(49, '22-05-2023 14:27:48', 'Fatkhurrozi menambahkan item incoming hardware PCB-TDWS dengan jumlah 1 kardus'),
(50, '22-05-2023 14:28:03', 'Fatkhurrozi menambahkan item incoming hardware PCB-BBWS  dengan jumlah 1 kardus'),
(51, '22-05-2023 14:28:47', 'Fatkhurrozi menambahkan item incoming hardware Loadcell-BBWS dengan jumlah 1 kardus'),
(52, '22-05-2023 14:29:14', 'rozi update QC pada perangkat PCB-BBWS batch ke-12-12.1.10 dengan kondisi Good'),
(53, '', 'Fatkhurrozi menambahkan batch produksi baru dengan kode batch 1'),
(54, '', 'Fatkhurrozi menambahkan batch produksi baru dengan kode batch 1'),
(55, '', 'Fatkhurrozi menambahkan batch produksi baru dengan kode batch 2'),
(56, '22-05-2023 10:02:54', 'Fatkhurrozi menghapus batch produksi 1'),
(57, '22-05-2023 10:02:57', 'Fatkhurrozi menghapus batch produksi 2'),
(58, '22-05-2023 10:02:59', 'Fatkhurrozi menghapus batch produksi 1'),
(59, '', 'Fatkhurrozi menambahkan batch produksi baru dengan kode batch 1'),
(60, '', 'Fatkhurrozi menambahkan batch produksi baru dengan kode batch 1'),
(61, '', 'Fatkhurrozi menambahkan batch produksi baru dengan kode batch 1'),
(62, '22-05-2023 10:53:17', 'Fatkhurrozi menghapus batch produksi 1'),
(63, '22-05-2023 10:53:20', 'Fatkhurrozi menghapus batch produksi 1'),
(64, '22-05-2023 10:53:23', 'Fatkhurrozi menghapus batch produksi 1'),
(65, '', 'Fatkhurrozi menambahkan batch produksi baru dengan kode batch 1'),
(66, '22-05-2023 10:55:41', 'Fatkhurrozi menghapus batch produksi 1'),
(67, '22-05-2023 10:55:48', 'Fatkhurrozi menambahkan batch produksi baru dengan kode batch 1'),
(68, '22-05-2023 10:56:01', 'Fatkhurrozi menghapus batch produksi 1'),
(69, '23-05-2023 15:18:30', 'Fatkhurrozi menambahkan item incoming hardware Base-Infanto-1 dengan kode 23-05-1-100'),
(70, '23-05-2023 15:18:43', 'Fatkhurrozi menambahkan item incoming hardware Base-Infanto-2 dengan kode 23-05-1-100'),
(71, '23-05-2023 15:18:56', 'rozi update QC pada perangkat Base-Infanto-1 batch ke-23-05.1.10 dengan kondisi Good'),
(72, '23-05-2023 15:19:03', 'rozi update QC pada perangkat Base-Infanto-2 batch ke-23-05.1.10 dengan kondisi Good'),
(73, '23-05-2023 15:19:42', 'Fatkhurrozi menambahkan item incoming hardware Base-Infanto-1 dengan kode 23-05-2-100'),
(74, '23-05-2023 15:19:53', 'Fatkhurrozi menambahkan item incoming hardware Base-Infanto-2 dengan kode 23-05-2-100'),
(75, '23-05-2023 15:20:05', 'rozi update QC pada perangkat Base-Infanto-1 batch ke-23-05.2.10 dengan kondisi Good'),
(76, '23-05-2023 15:20:10', 'rozi update QC pada perangkat Base-Infanto-2 batch ke-23-05.2.10 dengan kondisi Good'),
(77, '23-05-2023 10:20:31', 'Fatkhurrozi menambahkan batch produksi baru dengan kode batch 1'),
(78, '23-05-2023 19:47:22', 'Fatkhurrozi menambahkan item incoming hardware LCD dengan jumlah 4 kardus'),
(79, '23-05-2023 19:47:36', 'Fatkhurrozi menambahkan item incoming hardware PCB-TDWS dengan jumlah 4 kardus'),
(80, '23-05-2023 19:47:49', 'Fatkhurrozi menambahkan item incoming hardware PCB-BBWS dengan jumlah 4 kardus'),
(81, '23-05-2023 19:48:09', 'Fatkhurrozi menambahkan item incoming hardware Loadcell-TDWS dengan jumlah 4 kardus'),
(82, '23-05-2023 19:48:19', 'Fatkhurrozi menambahkan item incoming hardware Rocker-Switch(O I) dengan jumlah 4 kardus'),
(83, '23-05-2023 14:48:45', 'Fatkhurrozi melakukan delete pada perangkat PCB-BBWS dengan no batch-23-05'),
(84, '23-05-2023 14:48:55', 'Fatkhurrozi melakukan delete pada perangkat PCB-BBWS dengan no batch-23-05'),
(85, '23-05-2023 14:49:00', 'Fatkhurrozi melakukan delete pada perangkat PCB-BBWS dengan no batch-23-05'),
(86, '23-05-2023 14:49:06', 'Fatkhurrozi melakukan delete pada perangkat PCB-BBWS dengan no batch-23-05'),
(87, '23-05-2023 19:49:27', 'rozi update QC pada perangkat LCD batch ke-23-05.1.100 dengan kondisi Good'),
(88, '23-05-2023 19:49:34', 'rozi update QC pada perangkat LCD batch ke-23-05.2.100 dengan kondisi Good'),
(89, '23-05-2023 19:49:40', 'rozi update QC pada perangkat LCD batch ke-23-05.3.100 dengan kondisi Good'),
(90, '23-05-2023 19:49:46', 'rozi update QC pada perangkat LCD batch ke-23-05.4.100 dengan kondisi Good'),
(91, '23-05-2023 19:49:53', 'rozi update QC pada perangkat PCB-TDWS batch ke-23-05.1.100 dengan kondisi Good'),
(92, '23-05-2023 19:50:02', 'rozi update QC pada perangkat PCB-TDWS batch ke-23-05.2.100 dengan kondisi Good'),
(93, '23-05-2023 19:50:08', 'rozi update QC pada perangkat PCB-TDWS batch ke-23-05.3.100 dengan kondisi Good'),
(94, '23-05-2023 19:50:17', 'rozi update QC pada perangkat PCB-TDWS batch ke-23-05.4.100 dengan kondisi Good'),
(95, '23-05-2023 19:50:22', 'rozi update QC pada perangkat Loadcell-TDWS batch ke-23-05.1.100 dengan kondisi Good'),
(96, '23-05-2023 19:50:27', 'rozi update QC pada perangkat Loadcell-TDWS batch ke-23-05.2.100 dengan kondisi Good'),
(97, '23-05-2023 19:50:33', 'rozi update QC pada perangkat Loadcell-TDWS batch ke-23-05.3.100 dengan kondisi Good'),
(98, '23-05-2023 19:50:39', 'rozi update QC pada perangkat Loadcell-TDWS batch ke-23-05.4.100 dengan kondisi Good'),
(99, '23-05-2023 19:50:49', 'rozi update QC pada perangkat Rocker-Switch(O I) batch ke-23-05.1.100 dengan kondisi Good'),
(100, '23-05-2023 19:50:57', 'rozi update QC pada perangkat Rocker-Switch(O I) batch ke-23-05.2.100 dengan kondisi Good'),
(101, '23-05-2023 19:51:03', 'rozi update QC pada perangkat Rocker-Switch(O I) batch ke-23-05.3.100 dengan kondisi Good'),
(102, '23-05-2023 19:51:10', 'rozi update QC pada perangkat Rocker-Switch(O I) batch ke-23-05.4.100 dengan kondisi Good'),
(103, '23-05-2023 14:52:00', 'Fatkhurrozi menambahkan batch produksi baru dengan kode batch 1'),
(104, '23-05-2023 15:34:19', 'Login berhasil rozi (root)'),
(105, '23-05-2023 16:11:59', 'Fatkhurrozi menghapus batch produksi 1'),
(106, '23-05-2023 16:12:04', 'Fatkhurrozi menghapus batch produksi 1'),
(107, '23-05-2023 16:12:22', 'Fatkhurrozi menambahkan batch produksi baru dengan kode batch 1'),
(108, '24-05-2023 03:03:50', 'Fatkhurrozi menghapus batch produksi 1'),
(109, '24-05-2023 03:06:38', 'Fatkhurrozi menambahkan batch produksi baru dengan kode batch 1'),
(110, '24-05-2023 03:16:50', 'Login berhasil rozi (root)'),
(111, '24 May 2023 ', 'Fatkhurrozi input QC in-proses pada serial-number OH-TDWS-1-001 dengan kondisi Good'),
(112, '24-05-2023 03:34:51', 'Fatkhurrozi menghapus batch produksi 1'),
(113, '24-05-2023 08:35:38', 'Fatkhurrozi menambahkan item incoming hardware LCD dengan kode 24-05-1-100'),
(114, '24-05-2023 08:35:50', 'rozi update QC pada perangkat LCD batch ke-24-05.1.100 dengan kondisi Good'),
(115, '24-05-2023 03:36:22', 'Fatkhurrozi menambahkan batch produksi baru dengan kode batch 1'),
(116, '25-05-2023 05:03:51', 'Fatkhurrozi melakukan print serial number OH-TDWS-1-001'),
(117, '25 May 2023 ', 'Fatkhurrozi input QC in-proses pada serial-number OH-TDWS-1-001 dengan kondisi Good'),
(118, '19-06-2023 08:26:40', 'Fatkhurrozi menambahkan batch produksi baru dengan kode batch 1'),
(119, '22-06-2023 08:22:25', 'Fatkhurrozi menambahkan batch produksi baru dengan kode batch '),
(120, '22-06-2023 13:37:10', 'Fatkhurrozi menambahkan item incoming hardware Tiang-Stadio dengan jumlah 3 kardus'),
(121, '22-06-2023 13:40:08', 'rozi update QC pada perangkat Tiang-Stadio batch ke-22-06.3.100 dengan kondisi Good'),
(122, '22-06-2023 13:40:10', 'rozi update QC pada perangkat Tiang-Stadio batch ke-22-06.3.100 dengan kondisi Good'),
(123, '22-06-2023 13:43:52', 'rozi update QC pada perangkat Tiang-Stadio batch ke-22-06.1.100 dengan kondisi Good'),
(124, '22-06-2023 08:44:26', 'Fatkhurrozi menambahkan batch produksi baru dengan kode batch 1'),
(125, '22-06-2023 08:45:43', 'Fatkhurrozi menambahkan batch produksi baru dengan kode batch 1'),
(126, '22-06-2023 13:46:42', 'rozi update QC pada perangkat Tiang-Stadio batch ke-22-06.2.100 dengan kondisi Good'),
(127, '22-06-2023 08:46:57', 'Fatkhurrozi menambahkan batch produksi baru dengan kode batch 1'),
(128, '22-06-2023 13:55:16', 'Fatkhurrozi menambahkan item incoming hardware Base-Infanto dengan jumlah 3 kardus'),
(129, '22-06-2023 13:55:52', 'rozi update QC pada perangkat Base-Infanto batch ke-22-05.3.100 dengan kondisi Good'),
(130, '22-06-2023 13:56:02', 'rozi update QC pada perangkat Base-Infanto batch ke-22-05.1.100 dengan kondisi Good'),
(131, '22-06-2023 08:56:18', 'Fatkhurrozi menambahkan batch produksi baru dengan kode batch 1'),
(132, '22 June 2023 ', 'Fatkhurrozi input QC in-proses pada serial-number OH-TDWS-1-002 dengan kondisi Good'),
(133, '22 June 2023 ', 'Fatkhurrozi input QC in-proses pada serial-number CHC-INFT-1-001 dengan kondisi Good'),
(134, '22 June 2023 ', 'Fatkhurrozi input QC in-proses pada serial-number CHC-INFT-1-002 dengan kondisi Good'),
(135, '22 June 2023 ', 'Fatkhurrozi input QC in-proses pada serial-number CHC-INFT-1-001 dengan kondisi Good'),
(136, '22-06-2023 14:06:33', 'Fatkhurrozi menambahkan item incoming hardware Tiang-Stadio dengan jumlah 3 kardus'),
(137, '22-06-2023 14:07:55', 'Fatkhurrozi menambahkan item incoming hardware Tiang-Stadio dengan jumlah 3 kardus'),
(138, '22-06-2023 14:08:25', 'rozi update QC pada perangkat Tiang-Stadio batch ke-24-05.1.100 dengan kondisi Good'),
(139, '22-06-2023 09:08:43', 'Fatkhurrozi menambahkan batch produksi baru dengan kode batch 2'),
(140, '22 June 2023 ', 'Fatkhurrozi input QC in-proses pada serial-number CHC-STDO-2-001 dengan kondisi Good'),
(141, '22-06-2023 14:09:45', 'Fatkhurrozi input final QC pada SN CHC-STDO-2-001 kondisi Not Good dengan cacat    tiang_stadio  '),
(142, '22-06-2023 14:09:53', 'Fatkhurrozi input final QC pada SN CHC-INFT-1-002 kondisi Not Good dengan cacat     base_infanto '),
(143, '22-06-2023 14:18:12', 'Fatkhurrozi menambahkan item incoming hardware Tiang-Stadio dengan jumlah 5 kardus'),
(144, '22-06-2023 14:20:03', 'rozi update QC pada perangkat Tiang-Stadio batch ke-22-06.1.100 dengan kondisi Good'),
(145, '22-06-2023 09:20:28', 'Fatkhurrozi menambahkan batch produksi baru dengan kode batch 1'),
(146, '22 June 2023 ', 'Fatkhurrozi input QC in-proses pada serial-number CHC-STDO-1-001 dengan kondisi Good'),
(147, '22-06-2023 14:21:41', 'Fatkhurrozi menambahkan item incoming hardware Base-Infanto dengan jumlah 1 kardus'),
(148, '22-06-2023 14:21:58', 'rozi update QC pada perangkat Base-Infanto batch ke-22-06.1.100 dengan kondisi Good'),
(149, '22-06-2023 09:22:39', 'Fatkhurrozi menambahkan batch produksi baru dengan kode batch 1'),
(150, '22 June 2023 ', 'Fatkhurrozi input QC in-proses pada serial-number WD-INFT-1-025 dengan kondisi Good'),
(151, '22-06-2023 09:23:11', 'Fatkhurrozi input final QC pada SN CHC-STDO-1-001 dengan kondisi final Good'),
(152, '22-06-2023 09:23:13', 'Fatkhurrozi input final QC pada SN WD-INFT-1-025 dengan kondisi final Good'),
(153, '22-06-2023 14:24:01', 'rozi update QC pada perangkat Tiang-Stadio batch ke-22-06.2.100 dengan kondisi Good'),
(154, '22-06-2023 09:24:58', 'Fatkhurrozi menambahkan batch produksi baru dengan kode batch 1');

-- --------------------------------------------------------

--
-- Table structure for table `pemesan`
--

CREATE TABLE `pemesan` (
  `id` int(11) NOT NULL,
  `kode` varchar(15) NOT NULL,
  `ket` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemesan`
--

INSERT INTO `pemesan` (`id`, `kode`, `ket`) VALUES
(1, 'OH', 'Organisasi Halal'),
(3, 'WD', 'White Dynamic'),
(5, 'CHC', 'Cahaya Hidup Cuaca');

-- --------------------------------------------------------

--
-- Table structure for table `perangkat`
--

CREATE TABLE `perangkat` (
  `id` int(10) NOT NULL,
  `nama_perangkat` varchar(100) NOT NULL,
  `kode_perangkat` varchar(100) NOT NULL,
  `unit_barang` varchar(100) NOT NULL,
  `tgl_datang` varchar(100) NOT NULL,
  `no_batch` varchar(100) NOT NULL,
  `no_kardus` varchar(100) NOT NULL,
  `kondisi` varchar(10) DEFAULT NULL,
  `penanggung_jawab` varchar(50) DEFAULT NULL,
  `no_surat_jalan` varchar(50) NOT NULL,
  `taken` tinyint(1) NOT NULL DEFAULT '0',
  `qc_critical` int(11) DEFAULT NULL,
  `qc_major` int(11) DEFAULT NULL,
  `qc_minor` int(11) DEFAULT NULL,
  `buffer` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perangkat`
--

INSERT INTO `perangkat` (`id`, `nama_perangkat`, `kode_perangkat`, `unit_barang`, `tgl_datang`, `no_batch`, `no_kardus`, `kondisi`, `penanggung_jawab`, `no_surat_jalan`, `taken`, `qc_critical`, `qc_major`, `qc_minor`, `buffer`) VALUES
(38, 'Tiang-Stadio', 'TS', '100', '22 June 2023 ', '22-06', '1', 'Good', 'rozi', 'XXX', 1, 0, 0, 0, 0),
(39, 'Tiang-Stadio', 'TS', '100', '22 June 2023 ', '22-06', '2', 'Good', 'rozi', 'XXX', 1, 0, 0, 0, 0),
(40, 'Tiang-Stadio', 'TS', '100', '22 June 2023 ', '22-06', '3', NULL, NULL, 'XXX', 0, NULL, NULL, NULL, 0),
(41, 'Tiang-Stadio', 'TS', '100', '22 June 2023 ', '22-06', '4', NULL, NULL, 'XXX', 0, NULL, NULL, NULL, 0),
(42, 'Tiang-Stadio', 'TS', '100', '22 June 2023 ', '22-06', '5', NULL, NULL, 'XXX', 0, NULL, NULL, NULL, 0),
(43, 'Base-Infanto', 'BI', '100', '22 June 2023 ', '22-06', '1', 'Good', 'rozi', 'XXX', 1, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `serial_number`
--

CREATE TABLE `serial_number` (
  `id` int(100) NOT NULL,
  `id_batch` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_pemesan` int(11) NOT NULL,
  `serial_number` varchar(200) NOT NULL,
  `LCD` varchar(50) DEFAULT '0',
  `PCB` varchar(50) DEFAULT '0',
  `LOADCELL` varchar(50) DEFAULT '0',
  `rocker_switch` varchar(50) DEFAULT '0',
  `tiang_stadio` varchar(50) DEFAULT '0',
  `base_infanto` varchar(50) DEFAULT '0',
  `pita_lila` varchar(50) DEFAULT '0',
  `kondisi_inprocess` varchar(50) DEFAULT NULL,
  `penanggung_jawab_inprocess` varchar(50) DEFAULT NULL,
  `kondisi_final` varchar(50) DEFAULT NULL,
  `penanggung_jawab_final` varchar(50) DEFAULT NULL,
  `tanggal_produksi` varchar(100) DEFAULT NULL,
  `group_produksi` varchar(10) DEFAULT NULL,
  `cacat_final` set('LCD','PCB','LOADCELL','rocker_switch','tiang_stadio','base_infanto','pita_lila') DEFAULT NULL,
  `cacat_final_tambahan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `serial_number`
--

INSERT INTO `serial_number` (`id`, `id_batch`, `id_kategori`, `id_pemesan`, `serial_number`, `LCD`, `PCB`, `LOADCELL`, `rocker_switch`, `tiang_stadio`, `base_infanto`, `pita_lila`, `kondisi_inprocess`, `penanggung_jawab_inprocess`, `kondisi_final`, `penanggung_jawab_final`, `tanggal_produksi`, `group_produksi`, `cacat_final`, `cacat_final_tambahan`) VALUES
(376, 1, 3, 5, 'CHC-STDO-1-001', '0', '0', '0', '0', '38', '0', '0', 'Good', 'Fatkhurrozi', 'Good', 'Fatkhurrozi', '22 June 2023 ', 'group 1', NULL, NULL),
(377, 1, 3, 5, 'CHC-STDO-1-002', '0', '0', '0', '0', '38', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(378, 1, 3, 5, 'CHC-STDO-1-003', '0', '0', '0', '0', '38', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(379, 1, 3, 5, 'CHC-STDO-1-004', '0', '0', '0', '0', '38', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(380, 1, 3, 5, 'CHC-STDO-1-005', '0', '0', '0', '0', '38', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(381, 1, 3, 5, 'CHC-STDO-1-006', '0', '0', '0', '0', '38', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(382, 1, 3, 5, 'CHC-STDO-1-007', '0', '0', '0', '0', '38', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(383, 1, 3, 5, 'CHC-STDO-1-008', '0', '0', '0', '0', '38', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(384, 1, 3, 5, 'CHC-STDO-1-009', '0', '0', '0', '0', '38', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(385, 1, 3, 5, 'CHC-STDO-1-010', '0', '0', '0', '0', '38', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(386, 1, 3, 5, 'CHC-STDO-1-011', '0', '0', '0', '0', '38', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(387, 1, 3, 5, 'CHC-STDO-1-012', '0', '0', '0', '0', '38', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(388, 1, 3, 5, 'CHC-STDO-1-013', '0', '0', '0', '0', '38', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(389, 1, 3, 5, 'CHC-STDO-1-014', '0', '0', '0', '0', '38', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(390, 1, 3, 5, 'CHC-STDO-1-015', '0', '0', '0', '0', '38', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(391, 1, 3, 5, 'CHC-STDO-1-016', '0', '0', '0', '0', '38', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(392, 1, 3, 5, 'CHC-STDO-1-017', '0', '0', '0', '0', '38', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(393, 1, 3, 5, 'CHC-STDO-1-018', '0', '0', '0', '0', '38', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(394, 1, 3, 5, 'CHC-STDO-1-019', '0', '0', '0', '0', '38', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(395, 1, 3, 5, 'CHC-STDO-1-020', '0', '0', '0', '0', '38', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(396, 1, 3, 5, 'CHC-STDO-1-021', '0', '0', '0', '0', '38', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(397, 1, 3, 5, 'CHC-STDO-1-022', '0', '0', '0', '0', '38', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(398, 1, 3, 5, 'CHC-STDO-1-023', '0', '0', '0', '0', '38', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(399, 1, 3, 5, 'CHC-STDO-1-024', '0', '0', '0', '0', '38', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(400, 1, 3, 5, 'CHC-STDO-1-025', '0', '0', '0', '0', '38', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(401, 1, 2, 3, 'WD-INFT-1-001', '0', '0', '0', '0', '0', '43', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(402, 1, 2, 3, 'WD-INFT-1-002', '0', '0', '0', '0', '0', '43', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(403, 1, 2, 3, 'WD-INFT-1-003', '0', '0', '0', '0', '0', '43', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(404, 1, 2, 3, 'WD-INFT-1-004', '0', '0', '0', '0', '0', '43', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(405, 1, 2, 3, 'WD-INFT-1-005', '0', '0', '0', '0', '0', '43', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(406, 1, 2, 3, 'WD-INFT-1-006', '0', '0', '0', '0', '0', '43', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(407, 1, 2, 3, 'WD-INFT-1-007', '0', '0', '0', '0', '0', '43', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(408, 1, 2, 3, 'WD-INFT-1-008', '0', '0', '0', '0', '0', '43', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(409, 1, 2, 3, 'WD-INFT-1-009', '0', '0', '0', '0', '0', '43', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(410, 1, 2, 3, 'WD-INFT-1-010', '0', '0', '0', '0', '0', '43', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(411, 1, 2, 3, 'WD-INFT-1-011', '0', '0', '0', '0', '0', '43', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(412, 1, 2, 3, 'WD-INFT-1-012', '0', '0', '0', '0', '0', '43', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(413, 1, 2, 3, 'WD-INFT-1-013', '0', '0', '0', '0', '0', '43', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(414, 1, 2, 3, 'WD-INFT-1-014', '0', '0', '0', '0', '0', '43', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(415, 1, 2, 3, 'WD-INFT-1-015', '0', '0', '0', '0', '0', '43', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(416, 1, 2, 3, 'WD-INFT-1-016', '0', '0', '0', '0', '0', '43', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(417, 1, 2, 3, 'WD-INFT-1-017', '0', '0', '0', '0', '0', '43', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(418, 1, 2, 3, 'WD-INFT-1-018', '0', '0', '0', '0', '0', '43', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(419, 1, 2, 3, 'WD-INFT-1-019', '0', '0', '0', '0', '0', '43', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(420, 1, 2, 3, 'WD-INFT-1-020', '0', '0', '0', '0', '0', '43', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(421, 1, 2, 3, 'WD-INFT-1-021', '0', '0', '0', '0', '0', '43', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(422, 1, 2, 3, 'WD-INFT-1-022', '0', '0', '0', '0', '0', '43', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(423, 1, 2, 3, 'WD-INFT-1-023', '0', '0', '0', '0', '0', '43', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(424, 1, 2, 3, 'WD-INFT-1-024', '0', '0', '0', '0', '0', '43', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(425, 1, 2, 3, 'WD-INFT-1-025', '0', '0', '0', '0', '0', '43', '0', 'Good', 'Fatkhurrozi', 'Good', 'Fatkhurrozi', '22 June 2023 ', 'group 1', NULL, NULL),
(426, 1, 3, 3, 'WD-STDO-1-001', '0', '0', '0', '0', '39', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(427, 1, 3, 3, 'WD-STDO-1-002', '0', '0', '0', '0', '39', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(428, 1, 3, 3, 'WD-STDO-1-003', '0', '0', '0', '0', '39', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(429, 1, 3, 3, 'WD-STDO-1-004', '0', '0', '0', '0', '39', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(430, 1, 3, 3, 'WD-STDO-1-005', '0', '0', '0', '0', '39', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(431, 1, 3, 3, 'WD-STDO-1-006', '0', '0', '0', '0', '39', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(432, 1, 3, 3, 'WD-STDO-1-007', '0', '0', '0', '0', '39', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(433, 1, 3, 3, 'WD-STDO-1-008', '0', '0', '0', '0', '39', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(434, 1, 3, 3, 'WD-STDO-1-009', '0', '0', '0', '0', '39', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(435, 1, 3, 3, 'WD-STDO-1-010', '0', '0', '0', '0', '39', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(436, 1, 3, 3, 'WD-STDO-1-011', '0', '0', '0', '0', '39', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(437, 1, 3, 3, 'WD-STDO-1-012', '0', '0', '0', '0', '39', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(438, 1, 3, 3, 'WD-STDO-1-013', '0', '0', '0', '0', '39', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(439, 1, 3, 3, 'WD-STDO-1-014', '0', '0', '0', '0', '39', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(440, 1, 3, 3, 'WD-STDO-1-015', '0', '0', '0', '0', '39', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(441, 1, 3, 3, 'WD-STDO-1-016', '0', '0', '0', '0', '39', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(442, 1, 3, 3, 'WD-STDO-1-017', '0', '0', '0', '0', '39', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(443, 1, 3, 3, 'WD-STDO-1-018', '0', '0', '0', '0', '39', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(444, 1, 3, 3, 'WD-STDO-1-019', '0', '0', '0', '0', '39', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(445, 1, 3, 3, 'WD-STDO-1-020', '0', '0', '0', '0', '39', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(446, 1, 3, 3, 'WD-STDO-1-021', '0', '0', '0', '0', '39', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(447, 1, 3, 3, 'WD-STDO-1-022', '0', '0', '0', '0', '39', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(448, 1, 3, 3, 'WD-STDO-1-023', '0', '0', '0', '0', '39', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(449, 1, 3, 3, 'WD-STDO-1-024', '0', '0', '0', '0', '39', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(450, 1, 3, 3, 'WD-STDO-1-025', '0', '0', '0', '0', '39', '0', '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `userlist`
--

CREATE TABLE `userlist` (
  `idid` int(11) NOT NULL,
  `user` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL,
  `level` varchar(15) NOT NULL,
  `ugroup` varchar(15) DEFAULT NULL,
  `lastlogin` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlist`
--

INSERT INTO `userlist` (`idid`, `user`, `nama`, `password`, `level`, `ugroup`, `lastlogin`) VALUES
(4, 'aushaffahri', 'Aushaf Fakhri', 'e4ea294c062c525643df036a35ca579b905fa400', 'root', 'Engineer', '10-04-2023 05:06:00'),
(5, 'cencendi', 'Cendikia I', 'c2030c5f7059c1e3cfb8331d7960e9d01947acfc', 'root', 'Engineer', NULL),
(6, 'aushaf', 'aushaf', '2d14ab97cc3dc294c51c0d6814f4ea45f4b4e312', 'root', 'Engineer', '17-05-2023 04:43:02'),
(7, 'agil', 'Agil Adi', 'ebd8c5a17603c37286643d3c523f467c1b6e4841', 'root', 'Engineer', '16-05-2023 04:04:17'),
(8, 'rozi', 'Fatkhurrozi', '3a52ce780950d4d969792a2559cd519d7ee8c727', 'root', 'Engineer', '24-05-2023 03:16:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `batch_produksi`
--
ALTER TABLE `batch_produksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemesan`
--
ALTER TABLE `pemesan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perangkat`
--
ALTER TABLE `perangkat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `serial_number`
--
ALTER TABLE `serial_number`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userlist`
--
ALTER TABLE `userlist`
  ADD PRIMARY KEY (`idid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `batch_produksi`
--
ALTER TABLE `batch_produksi`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT for table `pemesan`
--
ALTER TABLE `pemesan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `perangkat`
--
ALTER TABLE `perangkat`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `serial_number`
--
ALTER TABLE `serial_number`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=451;

--
-- AUTO_INCREMENT for table `userlist`
--
ALTER TABLE `userlist`
  MODIFY `idid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
