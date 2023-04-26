-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2023 at 08:15 AM
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
  `tgl_mulai` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batch_produksi`
--

INSERT INTO `batch_produksi` (`id`, `id_pemesan`, `kode_batch`, `tgl_mulai`) VALUES
(54, 1, 1, '01 April 2023'),
(55, 1, 2, '07 April 2023');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_produk`
--

CREATE TABLE `kategori_produk` (
  `id` int(10) NOT NULL,
  `kode` varchar(100) NOT NULL,
  `detail` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_produk`
--

INSERT INTO `kategori_produk` (`id`, `kode`, `detail`) VALUES
(1, 'BBWS', 'Baby Weight Scale'),
(2, 'TDWS', 'Timbang Dewasa');

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
(203, '11-04-2023 04:18:40', 'Fatkhurrozi menambahkan serial number baru OH-BBWS-1-0011'),
(204, '11-04-2023 04:18:40', 'Fatkhurrozi melakukan print serial number OH-BBWS-1-0011'),
(205, '11-04-2023 04:19:15', 'Fatkhurrozi menambahkan serial number baru OH-BBWS-1-0012'),
(206, '11-04-2023 04:19:15', 'Fatkhurrozi melakukan print serial number OH-BBWS-1-0012'),
(207, '13-04-2023 08:49:54', 'Login berhasil rozi (root)'),
(208, '14-04-2023 05:46:47', 'Login berhasil rozi (root)'),
(209, '14-04-2023 08:42:52', 'Login berhasil rozi (root)'),
(210, '17-04-2023 03:59:58', 'Login berhasil rozi (root)'),
(211, '17-04-2023 05:16:28', 'Login berhasil rozi (root)'),
(212, '17-04-2023 15:08:01', 'User Fatkhurrozi menambahkan item incoming hardware'),
(213, '17-04-2023 15:08:51', 'User Fatkhurrozi menambahkan item incoming hardware'),
(214, '17-04-2023 15:10:29', 'User Fatkhurrozi menambahkan item incoming hardware'),
(215, '18-04-2023 06:14:39', 'Login berhasil rozi (root)'),
(216, '18-04-2023 07:46:51', 'Fatkhurrozi menambahkan serial number baru OH-TDWS-1-0001'),
(217, '18-04-2023 07:46:51', 'Fatkhurrozi melakukan print serial number OH-TDWS-1-0001'),
(218, '18-04-2023 08:51:54', 'Fatkhurrozi menambahkan serial number baru ---'),
(219, '18-04-2023 08:51:56', 'Fatkhurrozi melakukan print serial number ---'),
(220, '18-04-2023 08:54:31', 'Fatkhurrozi menambahkan batch baru dengan code 4'),
(221, '18-04-2023 08:55:17', 'Fatkhurrozi menambahkan serial number baru ---'),
(222, '18-04-2023 08:55:18', 'Fatkhurrozi melakukan print serial number ---'),
(223, '18-04-2023 09:24:43', 'Fatkhurrozi menambahkan serial number baru OH-BBWS-5-100'),
(224, '18-04-2023 09:28:03', 'Fatkhurrozi melakukan print serial number OH-BBWS-5-100'),
(225, '22-04-2023 14:33:48', 'Login berhasil rozi (root)'),
(226, '22-04-2023 14:34:53', 'Fatkhurrozi menambahkan batch produksi baru 6'),
(227, '22-04-2023 14:37:07', 'Fatkhurrozi menambahkan batch produksi baru 7'),
(228, '22-04-2023 17:12:53', 'Fatkhurrozi menambahkan batch produksi baru 7'),
(229, '22-04-2023 17:17:39', 'Fatkhurrozi menambahkan batch produksi baru 7'),
(230, '26-04-2023 03:26:50', 'Login berhasil rozi (root)'),
(231, '26-04-2023 03:47:56', 'Login berhasil rozi (root)'),
(232, '26-04-2023 04:53:33', 'Fatkhurrozi menambahkan batch produksi baru 9'),
(233, '26-04-2023 04:54:09', 'Fatkhurrozi menambahkan batch produksi baru 10'),
(234, '26-04-2023 04:56:03', 'Fatkhurrozi menambahkan batch produksi baru 11'),
(235, '26-04-2023 04:56:45', 'Fatkhurrozi menambahkan batch produksi baru 12'),
(236, '26-04-2023 04:58:42', 'Fatkhurrozi menambahkan batch produksi baru 13'),
(237, '26-04-2023 04:59:04', 'Fatkhurrozi menambahkan batch produksi baru 14'),
(238, '26-04-2023 05:00:43', 'Fatkhurrozi menambahkan batch produksi baru 2'),
(239, '26-04-2023 05:04:04', 'Fatkhurrozi menambahkan batch produksi baru 15'),
(240, '26-04-2023 05:04:29', 'Fatkhurrozi menambahkan batch produksi baru 16'),
(241, '26-04-2023 05:07:25', 'Fatkhurrozi menambahkan batch produksi baru 1'),
(242, '26-04-2023 05:07:58', 'Fatkhurrozi menghapus serial number OH-BBWS-1-100'),
(243, '26-04-2023 05:11:38', 'Fatkhurrozi menghapus batch produksi 1'),
(244, '26-04-2023 05:14:06', 'Fatkhurrozi menambahkan batch produksi baru 1'),
(245, '26-04-2023 05:14:29', 'Fatkhurrozi menambahkan batch produksi baru 2'),
(246, '26-04-2023 05:14:53', 'Fatkhurrozi menghapus batch produksi 1'),
(247, '26-04-2023 05:17:24', 'Fatkhurrozi menambahkan batch produksi baru 3'),
(248, '26-04-2023 05:20:27', 'Fatkhurrozi menghapus batch produksi 3'),
(249, '26-04-2023 05:27:24', 'Fatkhurrozi menghapus batch produksi 2'),
(250, '26-04-2023 05:28:14', 'Fatkhurrozi menambahkan batch produksi baru 1'),
(251, '26-04-2023 05:28:29', 'Fatkhurrozi menambahkan batch produksi baru 2'),
(252, '26-04-2023 05:28:47', 'Fatkhurrozi menambahkan batch produksi baru 1'),
(253, '26-04-2023 05:44:45', 'Fatkhurrozi menambahkan batch produksi baru 1'),
(254, '26-04-2023 05:45:01', 'Fatkhurrozi menghapus batch produksi 1'),
(255, '26-04-2023 05:54:53', 'Fatkhurrozi menambahkan batch produksi baru 1'),
(256, '26-04-2023 05:57:10', 'Fatkhurrozi menambahkan batch produksi baru 1'),
(257, '26-04-2023 06:04:52', 'Fatkhurrozi menghapus batch produksi 1'),
(258, '26-04-2023 06:05:09', 'Fatkhurrozi menambahkan batch produksi baru 1'),
(259, '26-04-2023 06:05:23', 'Fatkhurrozi menambahkan batch produksi baru 2'),
(260, '26-04-2023 06:05:40', 'Fatkhurrozi menambahkan batch produksi baru 1'),
(261, '26-04-2023 06:06:09', 'Fatkhurrozi menghapus batch produksi 1'),
(262, '26-04-2023 06:06:28', 'Fatkhurrozi menghapus batch produksi 1'),
(263, '26-04-2023 06:07:15', 'Fatkhurrozi menghapus batch produksi 2'),
(264, '26-04-2023 06:07:56', 'Fatkhurrozi menambahkan batch produksi baru 1'),
(265, '26-04-2023 06:08:33', 'Fatkhurrozi menambahkan batch produksi baru 2'),
(266, '26-04-2023 06:09:18', 'Fatkhurrozi menambahkan batch produksi baru 1'),
(267, '26-04-2023 06:22:08', 'Fatkhurrozi menghapus batch produksi 1'),
(268, '26-04-2023 06:41:25', 'Fatkhurrozi menambahkan batch produksi baru 1'),
(269, '26-04-2023 06:41:54', 'Fatkhurrozi menghapus batch produksi 1'),
(270, '26-04-2023 06:42:24', 'Fatkhurrozi menghapus batch produksi '),
(271, '26-04-2023 06:42:53', 'Fatkhurrozi menambahkan batch produksi baru 1'),
(272, '26-04-2023 06:43:21', 'Fatkhurrozi menghapus batch produksi 1'),
(273, '26-04-2023 06:51:21', 'Fatkhurrozi menambahkan batch produksi baru 1'),
(274, '26-04-2023 06:51:40', 'Fatkhurrozi menghapus batch produksi 1'),
(275, '26-04-2023 06:51:58', 'Fatkhurrozi menambahkan batch produksi baru 1'),
(276, '26-04-2023 06:52:13', 'Fatkhurrozi menambahkan batch produksi baru 2'),
(277, '26-04-2023 06:52:29', 'Fatkhurrozi menambahkan batch produksi baru 1'),
(278, '26-04-2023 06:53:13', 'Fatkhurrozi menghapus batch produksi 1'),
(279, '26-04-2023 06:53:27', 'Fatkhurrozi menghapus batch produksi 2'),
(280, '26-04-2023 06:53:38', 'Fatkhurrozi menghapus batch produksi 1'),
(281, '26-04-2023 08:04:33', 'Fatkhurrozi menambahkan batch produksi baru 1'),
(282, '26-04-2023 08:06:04', 'Fatkhurrozi menambahkan batch produksi baru 2');

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
  `unit_barang` varchar(100) NOT NULL,
  `tgl_datang` varchar(100) NOT NULL,
  `no_batch` varchar(100) NOT NULL,
  `no_kardus` varchar(100) NOT NULL,
  `kondisi` varchar(255) NOT NULL,
  `penanggung_jawab` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perangkat`
--

INSERT INTO `perangkat` (`id`, `nama_perangkat`, `unit_barang`, `tgl_datang`, `no_batch`, `no_kardus`, `kondisi`, `penanggung_jawab`) VALUES
(1, 'LCD', '100', '1 March 2023', '4', '100', 'Good', 'Fatkhurrozi'),
(2, 'PCB', '100', '23 March 2023', '9', '001', 'Bad', 'Fatkhurrozi'),
(3, 'LOADCELL', '100', '23 March 2023', '10', '002', 'Good', 'Fatkhurrozi'),
(4, 'PCB-BBWS ', '31', '17 March 2023', '12', '13', '', NULL),
(5, 'Loadcell-BBWS', '99', '23 March 2023', '12', '12', '', NULL),
(6, 'Loadcell-BBWS', '14', '16 March 2023', '001', '001', '', NULL),
(7, 'Loadcell-TDWS', '113', '02 March 2023', '113', '113', '', NULL),
(8, 'PCB-BBWS ', '13', '09 March 2023', '190', '190', '', NULL),
(9, 'Loadcell-TDWS', '123', '31 March 2023 ', '123', '123', '', NULL),
(10, 'LCD', '100', '31 March 2023 ', '10', '10', 'bad', NULL),
(11, 'Loadcell-BBWS', '8000', '17 April 2023 ', '12', '13', '', NULL),
(12, 'LCD', '123123', '17 April 2023 ', '12', '13', '', NULL),
(13, 'PCB-TDWS', '123', '17 April 2023 ', '123', '123', '', NULL);

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
  `LCD` varchar(100) NOT NULL,
  `PCB` varchar(100) NOT NULL,
  `LOADCELL` varchar(100) NOT NULL,
  `QC` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `serial_number`
--

INSERT INTO `serial_number` (`id`, `id_batch`, `id_kategori`, `id_pemesan`, `serial_number`, `LCD`, `PCB`, `LOADCELL`, `QC`) VALUES
(3764, 1, 1, 1, 'OH-BBWS-1-01', '1', '4', '6', NULL),
(3765, 1, 1, 1, 'OH-BBWS-1-02', '1', '4', '6', NULL),
(3766, 1, 1, 1, 'OH-BBWS-1-03', '1', '4', '6', NULL),
(3767, 1, 1, 1, 'OH-BBWS-1-04', '1', '4', '6', NULL),
(3768, 1, 1, 1, 'OH-BBWS-1-05', '1', '4', '6', NULL),
(3769, 1, 1, 1, 'OH-BBWS-1-06', '1', '4', '6', NULL),
(3770, 1, 1, 1, 'OH-BBWS-1-07', '1', '4', '6', NULL),
(3771, 1, 1, 1, 'OH-BBWS-1-08', '1', '4', '6', NULL),
(3772, 1, 1, 1, 'OH-BBWS-1-09', '1', '4', '6', NULL),
(3773, 1, 1, 1, 'OH-BBWS-1-10', '1', '4', '6', NULL),
(3774, 1, 1, 1, 'OH-BBWS-1-11', '1', '4', '6', NULL),
(3775, 1, 1, 1, 'OH-BBWS-1-12', '1', '4', '6', NULL),
(3776, 1, 1, 1, 'OH-BBWS-1-13', '1', '4', '6', NULL),
(3777, 1, 1, 1, 'OH-BBWS-1-14', '1', '4', '6', NULL),
(3778, 1, 1, 1, 'OH-BBWS-1-15', '1', '4', '6', NULL),
(3779, 1, 1, 1, 'OH-BBWS-1-16', '1', '4', '6', NULL),
(3780, 1, 1, 1, 'OH-BBWS-1-17', '1', '4', '6', NULL),
(3781, 1, 1, 1, 'OH-BBWS-1-18', '1', '4', '6', NULL),
(3782, 1, 1, 1, 'OH-BBWS-1-19', '1', '4', '6', NULL),
(3783, 1, 1, 1, 'OH-BBWS-1-20', '1', '4', '6', NULL),
(3784, 1, 1, 1, 'OH-BBWS-1-21', '1', '4', '6', NULL),
(3785, 1, 1, 1, 'OH-BBWS-1-22', '1', '4', '6', NULL),
(3786, 1, 1, 1, 'OH-BBWS-1-23', '1', '4', '6', NULL),
(3787, 1, 1, 1, 'OH-BBWS-1-24', '1', '4', '6', NULL),
(3788, 1, 1, 1, 'OH-BBWS-1-25', '1', '4', '6', NULL),
(3789, 1, 1, 1, 'OH-BBWS-1-26', '1', '4', '6', NULL),
(3790, 1, 1, 1, 'OH-BBWS-1-27', '1', '4', '6', NULL),
(3791, 1, 1, 1, 'OH-BBWS-1-28', '1', '4', '6', NULL),
(3792, 1, 1, 1, 'OH-BBWS-1-29', '1', '4', '6', NULL),
(3793, 1, 1, 1, 'OH-BBWS-1-30', '1', '4', '6', NULL),
(3794, 1, 1, 1, 'OH-BBWS-1-31', '1', '4', '6', NULL),
(3795, 1, 1, 1, 'OH-BBWS-1-32', '1', '4', '6', NULL),
(3796, 1, 1, 1, 'OH-BBWS-1-33', '1', '4', '6', NULL),
(3797, 1, 1, 1, 'OH-BBWS-1-34', '1', '4', '6', NULL),
(3798, 1, 1, 1, 'OH-BBWS-1-35', '1', '4', '6', NULL),
(3799, 1, 1, 1, 'OH-BBWS-1-36', '1', '4', '6', NULL),
(3800, 1, 1, 1, 'OH-BBWS-1-37', '1', '4', '6', NULL),
(3801, 1, 1, 1, 'OH-BBWS-1-38', '1', '4', '6', NULL),
(3802, 1, 1, 1, 'OH-BBWS-1-39', '1', '4', '6', NULL),
(3803, 1, 1, 1, 'OH-BBWS-1-40', '1', '4', '6', NULL),
(3804, 1, 1, 1, 'OH-BBWS-1-41', '1', '4', '6', NULL),
(3805, 1, 1, 1, 'OH-BBWS-1-42', '1', '4', '6', NULL),
(3806, 1, 1, 1, 'OH-BBWS-1-43', '1', '4', '6', NULL),
(3807, 1, 1, 1, 'OH-BBWS-1-44', '1', '4', '6', NULL),
(3808, 1, 1, 1, 'OH-BBWS-1-45', '1', '4', '6', NULL),
(3809, 1, 1, 1, 'OH-BBWS-1-46', '1', '4', '6', NULL),
(3810, 1, 1, 1, 'OH-BBWS-1-47', '1', '4', '6', NULL),
(3811, 1, 1, 1, 'OH-BBWS-1-48', '1', '4', '6', NULL),
(3812, 1, 1, 1, 'OH-BBWS-1-49', '1', '4', '6', NULL),
(3813, 1, 1, 1, 'OH-BBWS-1-50', '1', '4', '6', NULL),
(3814, 1, 1, 1, 'OH-BBWS-1-51', '1', '4', '6', NULL),
(3815, 1, 1, 1, 'OH-BBWS-1-52', '1', '4', '6', NULL),
(3816, 1, 1, 1, 'OH-BBWS-1-53', '1', '4', '6', NULL),
(3817, 1, 1, 1, 'OH-BBWS-1-54', '1', '4', '6', NULL),
(3818, 1, 1, 1, 'OH-BBWS-1-55', '1', '4', '6', NULL),
(3819, 1, 1, 1, 'OH-BBWS-1-56', '1', '4', '6', NULL),
(3820, 1, 1, 1, 'OH-BBWS-1-57', '1', '4', '6', NULL),
(3821, 1, 1, 1, 'OH-BBWS-1-58', '1', '4', '6', NULL),
(3822, 1, 1, 1, 'OH-BBWS-1-59', '1', '4', '6', NULL),
(3823, 1, 1, 1, 'OH-BBWS-1-60', '1', '4', '6', NULL),
(3824, 1, 1, 1, 'OH-BBWS-1-61', '1', '4', '6', NULL),
(3825, 1, 1, 1, 'OH-BBWS-1-62', '1', '4', '6', NULL),
(3826, 1, 1, 1, 'OH-BBWS-1-63', '1', '4', '6', NULL),
(3827, 1, 1, 1, 'OH-BBWS-1-64', '1', '4', '6', NULL),
(3828, 1, 1, 1, 'OH-BBWS-1-65', '1', '4', '6', NULL),
(3829, 1, 1, 1, 'OH-BBWS-1-66', '1', '4', '6', NULL),
(3830, 1, 1, 1, 'OH-BBWS-1-67', '1', '4', '6', NULL),
(3831, 1, 1, 1, 'OH-BBWS-1-68', '1', '4', '6', NULL),
(3832, 1, 1, 1, 'OH-BBWS-1-69', '1', '4', '6', NULL),
(3833, 1, 1, 1, 'OH-BBWS-1-70', '1', '4', '6', NULL),
(3834, 1, 1, 1, 'OH-BBWS-1-71', '1', '4', '6', NULL),
(3835, 1, 1, 1, 'OH-BBWS-1-72', '1', '4', '6', NULL),
(3836, 1, 1, 1, 'OH-BBWS-1-73', '1', '4', '6', NULL),
(3837, 1, 1, 1, 'OH-BBWS-1-74', '1', '4', '6', NULL),
(3838, 1, 1, 1, 'OH-BBWS-1-75', '1', '4', '6', NULL),
(3839, 1, 1, 1, 'OH-BBWS-1-76', '1', '4', '6', NULL),
(3840, 1, 1, 1, 'OH-BBWS-1-77', '1', '4', '6', NULL),
(3841, 1, 1, 1, 'OH-BBWS-1-78', '1', '4', '6', NULL),
(3842, 1, 1, 1, 'OH-BBWS-1-79', '1', '4', '6', NULL),
(3843, 1, 1, 1, 'OH-BBWS-1-80', '1', '4', '6', NULL),
(3844, 1, 1, 1, 'OH-BBWS-1-81', '1', '4', '6', NULL),
(3845, 1, 1, 1, 'OH-BBWS-1-82', '1', '4', '6', NULL),
(3846, 1, 1, 1, 'OH-BBWS-1-83', '1', '4', '6', NULL),
(3847, 1, 1, 1, 'OH-BBWS-1-84', '1', '4', '6', NULL),
(3848, 1, 1, 1, 'OH-BBWS-1-85', '1', '4', '6', NULL),
(3849, 1, 1, 1, 'OH-BBWS-1-86', '1', '4', '6', NULL),
(3850, 1, 1, 1, 'OH-BBWS-1-87', '1', '4', '6', NULL),
(3851, 1, 1, 1, 'OH-BBWS-1-88', '1', '4', '6', NULL),
(3852, 1, 1, 1, 'OH-BBWS-1-89', '1', '4', '6', NULL),
(3853, 1, 1, 1, 'OH-BBWS-1-90', '1', '4', '6', NULL),
(3854, 1, 1, 1, 'OH-BBWS-1-91', '1', '4', '6', NULL),
(3855, 1, 1, 1, 'OH-BBWS-1-92', '1', '4', '6', NULL),
(3856, 1, 1, 1, 'OH-BBWS-1-93', '1', '4', '6', NULL),
(3857, 1, 1, 1, 'OH-BBWS-1-94', '1', '4', '6', NULL),
(3858, 1, 1, 1, 'OH-BBWS-1-95', '1', '4', '6', NULL),
(3859, 1, 1, 1, 'OH-BBWS-1-96', '1', '4', '6', NULL),
(3860, 1, 1, 1, 'OH-BBWS-1-97', '1', '4', '6', NULL),
(3861, 1, 1, 1, 'OH-BBWS-1-98', '1', '4', '6', NULL),
(3862, 1, 1, 1, 'OH-BBWS-1-99', '1', '4', '6', NULL),
(3863, 1, 1, 1, 'OH-BBWS-1-100', '1', '4', '6', NULL),
(3864, 2, 1, 1, 'OH-BBWS-2-01', '10', '8', '6', NULL),
(3865, 2, 1, 1, 'OH-BBWS-2-02', '10', '8', '6', NULL),
(3866, 2, 1, 1, 'OH-BBWS-2-03', '10', '8', '6', NULL),
(3867, 2, 1, 1, 'OH-BBWS-2-04', '10', '8', '6', NULL),
(3868, 2, 1, 1, 'OH-BBWS-2-05', '10', '8', '6', NULL),
(3869, 2, 1, 1, 'OH-BBWS-2-06', '10', '8', '6', NULL),
(3870, 2, 1, 1, 'OH-BBWS-2-07', '10', '8', '6', NULL),
(3871, 2, 1, 1, 'OH-BBWS-2-08', '10', '8', '6', NULL),
(3872, 2, 1, 1, 'OH-BBWS-2-09', '10', '8', '6', NULL),
(3873, 2, 1, 1, 'OH-BBWS-2-10', '10', '8', '6', NULL),
(3874, 2, 1, 1, 'OH-BBWS-2-11', '10', '8', '6', NULL),
(3875, 2, 1, 1, 'OH-BBWS-2-12', '10', '8', '6', NULL),
(3876, 2, 1, 1, 'OH-BBWS-2-13', '10', '8', '6', NULL),
(3877, 2, 1, 1, 'OH-BBWS-2-14', '10', '8', '6', NULL),
(3878, 2, 1, 1, 'OH-BBWS-2-15', '10', '8', '6', NULL),
(3879, 2, 1, 1, 'OH-BBWS-2-16', '10', '8', '6', NULL),
(3880, 2, 1, 1, 'OH-BBWS-2-17', '10', '8', '6', NULL),
(3881, 2, 1, 1, 'OH-BBWS-2-18', '10', '8', '6', NULL),
(3882, 2, 1, 1, 'OH-BBWS-2-19', '10', '8', '6', NULL),
(3883, 2, 1, 1, 'OH-BBWS-2-20', '10', '8', '6', NULL),
(3884, 2, 1, 1, 'OH-BBWS-2-21', '10', '8', '6', NULL),
(3885, 2, 1, 1, 'OH-BBWS-2-22', '10', '8', '6', NULL),
(3886, 2, 1, 1, 'OH-BBWS-2-23', '10', '8', '6', NULL),
(3887, 2, 1, 1, 'OH-BBWS-2-24', '10', '8', '6', NULL),
(3888, 2, 1, 1, 'OH-BBWS-2-25', '10', '8', '6', NULL),
(3889, 2, 1, 1, 'OH-BBWS-2-26', '10', '8', '6', NULL),
(3890, 2, 1, 1, 'OH-BBWS-2-27', '10', '8', '6', NULL),
(3891, 2, 1, 1, 'OH-BBWS-2-28', '10', '8', '6', NULL),
(3892, 2, 1, 1, 'OH-BBWS-2-29', '10', '8', '6', NULL),
(3893, 2, 1, 1, 'OH-BBWS-2-30', '10', '8', '6', NULL),
(3894, 2, 1, 1, 'OH-BBWS-2-31', '10', '8', '6', NULL),
(3895, 2, 1, 1, 'OH-BBWS-2-32', '10', '8', '6', NULL),
(3896, 2, 1, 1, 'OH-BBWS-2-33', '10', '8', '6', NULL),
(3897, 2, 1, 1, 'OH-BBWS-2-34', '10', '8', '6', NULL),
(3898, 2, 1, 1, 'OH-BBWS-2-35', '10', '8', '6', NULL),
(3899, 2, 1, 1, 'OH-BBWS-2-36', '10', '8', '6', NULL),
(3900, 2, 1, 1, 'OH-BBWS-2-37', '10', '8', '6', NULL),
(3901, 2, 1, 1, 'OH-BBWS-2-38', '10', '8', '6', NULL),
(3902, 2, 1, 1, 'OH-BBWS-2-39', '10', '8', '6', NULL),
(3903, 2, 1, 1, 'OH-BBWS-2-40', '10', '8', '6', NULL),
(3904, 2, 1, 1, 'OH-BBWS-2-41', '10', '8', '6', NULL),
(3905, 2, 1, 1, 'OH-BBWS-2-42', '10', '8', '6', NULL),
(3906, 2, 1, 1, 'OH-BBWS-2-43', '10', '8', '6', NULL),
(3907, 2, 1, 1, 'OH-BBWS-2-44', '10', '8', '6', NULL),
(3908, 2, 1, 1, 'OH-BBWS-2-45', '10', '8', '6', NULL),
(3909, 2, 1, 1, 'OH-BBWS-2-46', '10', '8', '6', NULL),
(3910, 2, 1, 1, 'OH-BBWS-2-47', '10', '8', '6', NULL),
(3911, 2, 1, 1, 'OH-BBWS-2-48', '10', '8', '6', NULL),
(3912, 2, 1, 1, 'OH-BBWS-2-49', '10', '8', '6', NULL),
(3913, 2, 1, 1, 'OH-BBWS-2-50', '10', '8', '6', NULL),
(3914, 2, 1, 1, 'OH-BBWS-2-51', '10', '8', '6', NULL),
(3915, 2, 1, 1, 'OH-BBWS-2-52', '10', '8', '6', NULL),
(3916, 2, 1, 1, 'OH-BBWS-2-53', '10', '8', '6', NULL),
(3917, 2, 1, 1, 'OH-BBWS-2-54', '10', '8', '6', NULL),
(3918, 2, 1, 1, 'OH-BBWS-2-55', '10', '8', '6', NULL),
(3919, 2, 1, 1, 'OH-BBWS-2-56', '10', '8', '6', NULL),
(3920, 2, 1, 1, 'OH-BBWS-2-57', '10', '8', '6', NULL),
(3921, 2, 1, 1, 'OH-BBWS-2-58', '10', '8', '6', NULL),
(3922, 2, 1, 1, 'OH-BBWS-2-59', '10', '8', '6', NULL),
(3923, 2, 1, 1, 'OH-BBWS-2-60', '10', '8', '6', NULL),
(3924, 2, 1, 1, 'OH-BBWS-2-61', '10', '8', '6', NULL),
(3925, 2, 1, 1, 'OH-BBWS-2-62', '10', '8', '6', NULL),
(3926, 2, 1, 1, 'OH-BBWS-2-63', '10', '8', '6', NULL),
(3927, 2, 1, 1, 'OH-BBWS-2-64', '10', '8', '6', NULL),
(3928, 2, 1, 1, 'OH-BBWS-2-65', '10', '8', '6', NULL),
(3929, 2, 1, 1, 'OH-BBWS-2-66', '10', '8', '6', NULL),
(3930, 2, 1, 1, 'OH-BBWS-2-67', '10', '8', '6', NULL),
(3931, 2, 1, 1, 'OH-BBWS-2-68', '10', '8', '6', NULL),
(3932, 2, 1, 1, 'OH-BBWS-2-69', '10', '8', '6', NULL),
(3933, 2, 1, 1, 'OH-BBWS-2-70', '10', '8', '6', NULL),
(3934, 2, 1, 1, 'OH-BBWS-2-71', '10', '8', '6', NULL),
(3935, 2, 1, 1, 'OH-BBWS-2-72', '10', '8', '6', NULL),
(3936, 2, 1, 1, 'OH-BBWS-2-73', '10', '8', '6', NULL),
(3937, 2, 1, 1, 'OH-BBWS-2-74', '10', '8', '6', NULL),
(3938, 2, 1, 1, 'OH-BBWS-2-75', '10', '8', '6', NULL),
(3939, 2, 1, 1, 'OH-BBWS-2-76', '10', '8', '6', NULL),
(3940, 2, 1, 1, 'OH-BBWS-2-77', '10', '8', '6', NULL),
(3941, 2, 1, 1, 'OH-BBWS-2-78', '10', '8', '6', NULL),
(3942, 2, 1, 1, 'OH-BBWS-2-79', '10', '8', '6', NULL),
(3943, 2, 1, 1, 'OH-BBWS-2-80', '10', '8', '6', NULL),
(3944, 2, 1, 1, 'OH-BBWS-2-81', '10', '8', '6', NULL),
(3945, 2, 1, 1, 'OH-BBWS-2-82', '10', '8', '6', NULL),
(3946, 2, 1, 1, 'OH-BBWS-2-83', '10', '8', '6', NULL),
(3947, 2, 1, 1, 'OH-BBWS-2-84', '10', '8', '6', NULL),
(3948, 2, 1, 1, 'OH-BBWS-2-85', '10', '8', '6', NULL),
(3949, 2, 1, 1, 'OH-BBWS-2-86', '10', '8', '6', NULL),
(3950, 2, 1, 1, 'OH-BBWS-2-87', '10', '8', '6', NULL),
(3951, 2, 1, 1, 'OH-BBWS-2-88', '10', '8', '6', NULL),
(3952, 2, 1, 1, 'OH-BBWS-2-89', '10', '8', '6', NULL),
(3953, 2, 1, 1, 'OH-BBWS-2-90', '10', '8', '6', NULL),
(3954, 2, 1, 1, 'OH-BBWS-2-91', '10', '8', '6', NULL),
(3955, 2, 1, 1, 'OH-BBWS-2-92', '10', '8', '6', NULL),
(3956, 2, 1, 1, 'OH-BBWS-2-93', '10', '8', '6', NULL),
(3957, 2, 1, 1, 'OH-BBWS-2-94', '10', '8', '6', NULL),
(3958, 2, 1, 1, 'OH-BBWS-2-95', '10', '8', '6', NULL),
(3959, 2, 1, 1, 'OH-BBWS-2-96', '10', '8', '6', NULL),
(3960, 2, 1, 1, 'OH-BBWS-2-97', '10', '8', '6', NULL),
(3961, 2, 1, 1, 'OH-BBWS-2-98', '10', '8', '6', NULL),
(3962, 2, 1, 1, 'OH-BBWS-2-99', '10', '8', '6', NULL),
(3963, 2, 1, 1, 'OH-BBWS-2-100', '10', '8', '6', NULL);

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
(4, 'aushaffahri', 'Aushaf Fakhri', '2d14ab97cc3dc294c51c0d6814f4ea45f4b4e312', 'root', 'Engineer', '23-03-2023 04:23:08'),
(5, 'cencendi', 'Cendikia I', 'c2030c5f7059c1e3cfb8331d7960e9d01947acfc', 'root', 'Engineer', NULL),
(6, 'aushaf', 'aushaf', '2d14ab97cc3dc294c51c0d6814f4ea45f4b4e312', 'root', 'Engineer', '10-04-2023 07:47:46'),
(7, 'rozi', 'Fatkhurrozi', '3a52ce780950d4d969792a2559cd519d7ee8c727', 'root', 'Engineer', '26-04-2023 03:47:56');

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
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=283;

--
-- AUTO_INCREMENT for table `pemesan`
--
ALTER TABLE `pemesan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `perangkat`
--
ALTER TABLE `perangkat`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `serial_number`
--
ALTER TABLE `serial_number`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3964;

--
-- AUTO_INCREMENT for table `userlist`
--
ALTER TABLE `userlist`
  MODIFY `idid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
