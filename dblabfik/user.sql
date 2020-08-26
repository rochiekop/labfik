-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2020 at 02:33 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dblabfik`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` varchar(64) NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `nim` varchar(11) NOT NULL,
  `nip` int(11) NOT NULL,
  `koordinator` varchar(1) NOT NULL,
  `dosen_wali` varchar(10) NOT NULL,
  `prodi` varchar(64) NOT NULL,
  `kode_dosen` varchar(64) NOT NULL,
  `email` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `images` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL,
  `status` varchar(7) NOT NULL DEFAULT 'offline'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `name`, `no_telp`, `nim`, `nip`, `koordinator`, `dosen_wali`, `prodi`, `kode_dosen`, `email`, `alamat`, `images`, `password`, `salt`, `role_id`, `is_active`, `date_created`, `status`) VALUES
('39', 'kaurlab', 'Kaur Lab ', '', '', 0, '', '', '', '', 'kaurlab@gmail.com', '0', 'default.jpg', '920c3713e13b091e73d17d35bd608079fc41724eca41b415f200e338dc59c531', '$2y$10$hctmRhwo9qxeJTvtzbn/kObWapiE8JSPX6jO72QAbp1HJfe4QBwEi', 2, 1, 1594554238, 'offline'),
('44', 'ihdar', 'Rafif ihdhar', '0851221132434', '1301130763', 0, '', '', 'Desain Komunikasi Visual', '', 'snowm60401@gmail.com', '0', '1.jpg', 'e41e13ea4344a5dab62674d6e08a24b75bf0d5bd7921c04c2a13fc80a6eda0e3', '$2y$10$sGYdQGJYGX9nCIDzkWoH3uibGxPC292Bf9nhIgO/TSkLz3Q3Sp1jO', 4, 1, 1594832402, 'online'),
('5f1e7dc5ca07e', 'sulthanangka', 'Muhammad Sulthan Angka Kurniawan', '', '', 0, '', '', 'Desain Komunikasi Visual', '', 'sulthan.kurniawan@gmail.com', '0', 'default.jpg', '7e93fd68a7b5f0860784f35336a488910b3d6f2c088602a4a608e24ebeac3a36', '$2y$10$IXEl6J4l/ORTrf78B14hyewCsBz1Fyf4xM96cQPexqL.KqvJ4A2zC', 3, 1, 1595833797, 'offline'),
('5f2128a43c90b', 'akathan', 'akathan', '', '', 0, '1', '', 'Test', '', 'sulthan.angka@gmail.com', '0', 'default.jpg', '95b77ac94e00b2039b79d78e01ee5f941da1d074fae0a3a41636797e429bd860', '$2y$10$UdpWt4Uo/v1rlkzJxZqrdu7mlLiJbI3aRrmToglyIduVaYAsL7diG', 3, 1, 1596008612, 'offline'),
('5f28dbe13ddf9', 'manhattan', 'AX', '', '', 0, '', '', 'Desain Komunikasi Visual', '', 'manhattan@gmail.com', '0', 'default.jpg', '6b1d591c1e0149ac6db6b72993af5699878d3ff96b9a3db1802393bcc8e88608', '$2y$10$oVda9dQDlDUZxn0B4Ll.hOVZc1KrkDulpOpSXWS6qMpFaXUVB5826', 3, 1, 1596513249, 'offline'),
('5f3e31113e0d3', 'rochieko', 'Rochi Eko Pambudi', '08329634743', '1301170761', 0, '', '', 'Desain Komunikasi Visual', '', 'snowm6040@gmail.com', '0', 'default.jpg', '0409506e0855738c3297d9d520fa0ed68dae954baaec58100c64fff5b1c44879', '$2y$10$Pmz.lOPOCiydvg.mqJmyi.Zlt8eBHc41KBjRXtJtH0XFCo5RDZBVS', 4, 1, 1597911313, 'offline'),
('5f43c46f3b0df', 'adminlaa', 'Admin LAA', '', '', 0, '', '', '', '', 'adminlaafik@gmail.com', '0', 'default.jpg', '86f9d10cd1d13ff0ec318766b3ba445f0913f482d39581851a18bcd239dbd2cf', '$2y$10$NcoX.mxiqsXOR1DH2YJ9JeCVKPcxM5Quwnlk1hk28/Yh4cAAld9QS', 5, 1, 1598276719, 'offline'),
('8', 'admin', 'John Doe', '', '', 0, '', '', '', '', 'admin@gmail.com', '0', 'default.jpg', 'ec54193c7b13f115a35da3282d74a295af9a72ca8f8a5ebd9655dbf8eadd8a02', '$2y$10$jb3uBvvS41mfsMHU4xaICul08WsrJzMyLpiIVT9bpx06CQQ/vmNle', 1, 1, 0, 'offline');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
