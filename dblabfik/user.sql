-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2020 at 03:36 PM
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
  `nip` varchar(11) NOT NULL,
  `koordinator` varchar(64) NOT NULL,
  `dosen_wali` varchar(64) NOT NULL,
  `kuota_bimbingan` int(3) NOT NULL,
  `kuota_penguji` int(3) NOT NULL,
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

INSERT INTO `user` (`id`, `username`, `name`, `no_telp`, `nim`, `nip`, `koordinator`, `dosen_wali`, `kuota_bimbingan`, `kuota_penguji`, `prodi`, `kode_dosen`, `email`, `alamat`, `images`, `password`, `salt`, `role_id`, `is_active`, `date_created`, `status`) VALUES
('39', 'kaurlab', 'Kaur Lab ', '', '', '', '', '', 0, 0, '', '', 'kaurlab@gmail.com', '', 'default.jpg', '920c3713e13b091e73d17d35bd608079fc41724eca41b415f200e338dc59c531', '$2y$10$hctmRhwo9qxeJTvtzbn/kObWapiE8JSPX6jO72QAbp1HJfe4QBwEi', 2, 1, 1594554238, 'offline'),
('44', 'ihdar', 'Rafif ihdar', '0851221132434', '1301130763', '', '', '5f1e7dc5ca07e', 0, 0, 'Desain Komunikasi Visual', '', 'snowm60401@gmail.com', 'Bengkulu', '1.jpg', 'e41e13ea4344a5dab62674d6e08a24b75bf0d5bd7921c04c2a13fc80a6eda0e3', '$2y$10$sGYdQGJYGX9nCIDzkWoH3uibGxPC292Bf9nhIgO/TSkLz3Q3Sp1jO', 4, 1, 1594832402, 'online'),
('5f1e7dc5ca07e', 'sulthanangka', 'Muhammad Sulthan Angka Kurniawan', '0812234545', '', '1234567890', 'Inlive', '1', 5, 4, 'Desain Komunikasi Visual', 'MSAK', 'sulthan.kurniawan@gmail.com', 'Bandung', 'default.jpg', '7e93fd68a7b5f0860784f35336a488910b3d6f2c088602a4a608e24ebeac3a36', '$2y$10$IXEl6J4l/ORTrf78B14hyewCsBz1Fyf4xM96cQPexqL.KqvJ4A2zC', 3, 1, 1595833797, 'offline'),
('5f2128a43c90b', 'akathan', 'akathan', '08100112121', '', '09876543211', 'Deconstra', '1', 10, 6, 'Desain Komunikasi Visual', 'AKTH', 'sulthan.angka@gmail.com', 'Sukabirus', 'default.jpg', '95b77ac94e00b2039b79d78e01ee5f941da1d074fae0a3a41636797e429bd860', '$2y$10$UdpWt4Uo/v1rlkzJxZqrdu7mlLiJbI3aRrmToglyIduVaYAsL7diG', 3, 1, 1596008612, 'offline'),
('5f28dbe13ddf9', 'manhattan', 'Manhattan', '08121002931', '', '12345678910', 'Ketua Inlive', '1', 10, 3, 'Desain Interior', 'MHN10', 'manhattan@gmail.com', 'Buah Batu, Bandung', 'default.jpg', '6b1d591c1e0149ac6db6b72993af5699878d3ff96b9a3db1802393bcc8e88608', '$2y$10$oVda9dQDlDUZxn0B4Ll.hOVZc1KrkDulpOpSXWS6qMpFaXUVB5826', 3, 1, 1596513249, 'offline'),
('5f3b9697e3aa5', 'akaguh', 'teguh akbar', '', '', '0', 'Ketua Acties', '', 0, 0, '', '', 'akaguh@telkomuniversity.ac.id', '', 'default.jpg', '09e8d25c6a0ada86dd912381b5f99eb500aed5c18d1924d53ab67007407fae24', '$2y$10$GaTaVEnhPY0JCXFxblq2Per4KEMzG7a28NFbkwbyJJIL8a85P0Omi', 3, 1, 1597740695, 'offline'),
('5f3b9a05d0280', 'studiolab', 'studiolab', '', '', '0', '', '', 0, 0, '', '', 'studiolab@telkomuniversity.ac.id', '', 'default.jpg', 'c39117bf9f02c56cbdf71fbeb5b1e99caed803898f76473fc60f936d8abb9812', '$2y$10$7y54SBtYQvCJpp5fhnlAseBM.i382FzcyxT5RqZLvD5sbw06SVoMO', 1, 1, 1597741573, 'offline'),
('5f3b9ad4037a3', 'teguh', 'teguh akbar', '', '', '0', 'Ketua Medcraft', '', 0, 0, '', '', 'radithandri@gmail.com', '', 'default.jpg', '8f8f7accedd8d9b4f8d37143a2ec6e9d85a868cdf8d49bd4c08ee3f0ba82b7a5', '$2y$10$PapAltAzCXGQzwO14OaJqOe0j1Gw/CdckmZYqf0ASGnmZQxDCGoY6', 2, 1, 1597741780, 'offline'),
('5f3c653160043', 'anggarwarok', 'Anggar Erdhina Adi', '', '', '0', 'Ketua Deconstra', '', 7, 6, '', '', 'anggarwarok@telkomuniversity.ac.id', '', 'default.jpg', '40633ea69c369ff478802712a7c876e17d80094aacb9829a7a86868b0f7fa392', '$2y$10$/jqUpfajO.UQiPzhPYDRX.0GSOl/adaIKWLvWoWMy2/dXsYbCIA7e', 3, 1, 1597793585, 'offline'),
('5f3e31113e0d3', 'rochieko', 'Rochi Eko Pambudi', '08329634743', '1301170761', '', '', '5f2128a43c90b', 0, 0, 'Desain Produk', '', 'snowm604010@gmail.com', 'Pemalang', 'default.jpg', '0409506e0855738c3297d9d520fa0ed68dae954baaec58100c64fff5b1c44879', '$2y$10$Pmz.lOPOCiydvg.mqJmyi.Zlt8eBHc41KBjRXtJtH0XFCo5RDZBVS', 4, 1, 1597911313, 'offline'),
('5f43c46f3b0df', 'adminlaa', 'Admin LAA', '', '', '', '', '', 0, 0, '', '', 'adminlaafik@gmail.com', '', 'default.jpg', '86f9d10cd1d13ff0ec318766b3ba445f0913f482d39581851a18bcd239dbd2cf', '$2y$10$NcoX.mxiqsXOR1DH2YJ9JeCVKPcxM5Quwnlk1hk28/Yh4cAAld9QS', 5, 1, 1598276719, 'offline'),
('5f4a2f00c828f', 'koordinatorta', 'Koordinator Tugas Akhir', '', '', '', 'koortada', '', 0, 0, 'Desain Komunikasi Visual', '', 'koordinatorta@gmail.com', '', 'default.jpg', 'f911697a55fa9d230ac8da335637ad58491d2aaee5f984a1cef8c4fd6312c2ad', '$2y$10$y6DAeeBN.kLq3CjdLuXuY.feFDUIdI51UUfGQB9yKo4ZMohnnuUGy', 6, 1, 1598697216, 'offline'),
('5f4a4b0ee4b42', 'testing', 'Testing', '08512312323', '1234567891', '', '', '5f28dbe13ddf9', 0, 0, 'Desain Produk', '', 'testing@gmail.com', 'Bogor', 'Cat.jpg', '701e1ef19005a5ff4815342180233ee1a3ece22187c1e8d028cdafea436a943d', '$2y$10$2aaRJKEVgnmJ1TQzl8wm9e.m1NIkRGaEjYfPX3S35/eUvq9J3DWSW', 4, 1, 1598704398, 'offline'),
('5f50f84ac76e6', 'aditiya', 'aditya novianto', '0812345433455', '2087001888', '', '', '5f28dbe13ddf9', 0, 0, 'Desain Komunikasi Visual', '', 'adityanovianto@gmail.com', 'bandung', 'default.jpg', '5f7df180329678b97fc44add4f223a409d5618186f57fb80d8c3844039867ceb', '$2y$10$Adifl.rSd9Q9Uhk8SsCOReqjrs4DdsI8cAIzeTg77DMFa3vOK72Q6', 3, 1, 1599141962, 'offline'),
('5f59fbbcba3ff', 'ekopambudi', 'Rochi eko', '085192008943', '1301170761', '', '', '5f28dbe13ddf9', 0, 0, 'Desain Komunikasi Visual', '', 'snowm604023@gmail.com', 'Bandung', 'default.jpg', '5fb01e4639489e1c4964933daa3a90bf3b34c5ba1d0fb768fcc0bbbd2306b38f', '$2y$10$gDnxkaI1.JWMEoBKusDRPufpQ6Z4O6l4nD30Wz1AWcVch3wLgowTG', 4, 1, 1599732668, 'offline'),
('5f5bf2aaad979', 'farhan', 'Farhan', '085182001821', '1234567892', '', '', '5f2128a43c90b', 0, 0, 'Desain Komunikasi Visual', '', 'snowm6040@gmail.com', 'Bandung', 'default.jpg', 'ab23b5078751e39f0ea7e58e5735bd1b4f93ad08b17651bac6bed9c304b7d598', '$2y$10$IvE4TDULRE.aJk26ytyw8.XG5tQjb3bVpvdVBKj3M.VCu/RpsCLwC', 4, 1, 1599861418, 'offline'),
('5f61f18725496', 'user3', 'User 3', '085182001826', '1234567801', '', '', '5f2128a43c90b', 0, 0, 'Desain Komunikasi Visual', '', 'snowm60403@gmail.com', 'Bandung', 'default.jpg', '16f5664e8d856cf7594a010c2081cf3794f41c4a4a66488d817d99c4c45076bd', '$2y$10$DKeNYzucsKAC5a.ReRTUYOjgUbO/v6GwZeFwB2li4jk7Wfu6IPyUC', 4, 1, 1600254343, 'offline'),
('5f61f19e1e94c', 'user4', 'User 4', '085182001822', '1234567802', '', '', '5f28dbe13ddf9', 0, 0, 'Desain Komunikasi Visual', '', 'snowm60404@gmail.com', 'Bandung', 'default.jpg', '5e84708459b234ee793fcd6834d123e6a15d67941d529eb8717b5ba31d7229ea', '$2y$10$bu6qsV0HKmzf/zBtKMXZKe47.0MCrlrbq2XsYJXUzbO8g6nEz4LJW', 4, 1, 1600254366, 'offline'),
('5f61f1ba9f44b', 'user5', 'User 5', '085182001823', '1234567823', '', '', '5f28dbe13ddf9', 0, 0, 'Desain Produk', '', 'snowm60405@gmail.com', 'Bengkulu', 'default.jpg', '340ba15f7ad7d55a44f26fc93caa196583fd0a150747795ecf5d862a96e3f0e1', '$2y$10$.4D8612X60BhYfD5d8p5CeeVQho3Em0KE/lDVZqiv9Suurh5yIB22', 4, 1, 1600254394, 'offline'),
('8', 'admin', 'Admin LAB', '', '', '', '', '', 0, 0, '', '', 'admin@gmail.com', '', 'default.jpg', 'ec54193c7b13f115a35da3282d74a295af9a72ca8f8a5ebd9655dbf8eadd8a02', '$2y$10$jb3uBvvS41mfsMHU4xaICul08WsrJzMyLpiIVT9bpx06CQQ/vmNle', 1, 1, 0, 'offline');

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
