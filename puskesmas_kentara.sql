-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2021 at 01:38 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `puskesmas_kentara`
--

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

CREATE TABLE `staffs` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `gol` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staffs`
--

INSERT INTO `staffs` (`id`, `nama`, `nip`, `gol`, `jabatan`, `img`) VALUES
(1, 'Rismawaty DS,SKM,MKM', '19720522 2006042003', 'Penata III/C', 'Ka.UPT.Puskesmas', '54-avatar-5.png'),
(2, 'dr.Enda Nola', '19831112 201101 2019', 'Penata TK I /III-D', 'dokter Puskesmas', '282-avatar-5.png'),
(3, 'Rotua Habeahan', '19631023 198401 2001', 'Penata TK I /III-D', 'Perawat Puskesmas', '366-avatar-2.png'),
(4, 'Jasbon Siburian', '19650 829 198603 1004', 'Penata TK I /III-D', 'Staf Puskesmas', '312-avatar-1.png'),
(5, 'Hotnaria Nainggolan', '19650909 1988032006', 'Penata TK I /III-D', 'Bikor Puskesmas', '341-avatar-3.png'),
(6, 'Deslina Purba', '19651205 198903 2005', 'Penata TK I /III-D', 'Nutrisionis  Puskesmas', '767-avatar-4.png'),
(7, 'Waliyah', '19731205 199503 2001', 'Penata TK I /III-D', 'Bendahara Puskesmas', '329-avatar-5.png'),
(8, 'Yuli Dwi Payanti', '19850708 201001 2040', 'Penata Muda TKI  III/B', 'Farmasi Puskesmas', '843-avatar-5.png'),
(9, 'Rima Dhani Puspita', '19880118 201001 2017', 'Penata Muda TKI  III/B', 'Aset ', '486-avatar-2.png'),
(10, 'Masni Heppi Sihombing', '19741231 200604 2003', 'Penata Muda III/A', 'Bidan Puskesmas', '35-avatar-1.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `jabatan` enum('1','2','3','4') NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `nip`, `jabatan`, `email`, `password`) VALUES
(1, 'faturbancin', '170637864390857', '2', 'testing@gmail.com', '$2y$10$3NCWafQrECX.J9/um9oh1u5AtI0nDHuJ0rj0CaugpP19S7ZaPgpue');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `staffs`
--
ALTER TABLE `staffs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `staffs`
--
ALTER TABLE `staffs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
