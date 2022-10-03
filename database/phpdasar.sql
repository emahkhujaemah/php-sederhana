-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2021 at 08:01 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpdasar`
--

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) AUTO_INCREMENT PRIMARY KEY,
  `nama` varchar(100) DEFAULT NULL,
  `nim` char(7) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `jurusan` varchar(100) DEFAULT NULL,
  `gambar` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama`, `nim`, `email`, `jurusan`, `gambar`) VALUES
(1, 'Emah Khujaemah', '1905005', 'emah24@gmail.com', 'Rekayasa Perangkat Lunak', '6088ea3358ab7.jpg'),
(2, 'Farikhatun Sholihah', '1905001', 'farikha@gmail.com', 'Manajemen Bisnis', 'hinami.jpg'),
(4, 'Harold Stokes', '1905002', 'harold@gmail.com', 'Rekayasa Perangkat Lunak', '6088eac72ac6f.jpg'),
(5, 'Natsume Takashi', '1905003', 'natsume_takashi@gmail.com', 'Teknik Informatika', '6088eb464106a.jpg'),
(6, 'Natsuki Subaru', '1905004', 'natsuki_subaru@gmail.com', 'Teknik Mesin', '6088ebba1b6e4.jpg'),
(7, 'Natori Shuuichi', '1905006', 'natori@gmail.com', 'Manajemen Bisnis', '6088ec253dcab.jpg'),
(8, 'Kim Dokja', '1905007', 'kimdokja@gmail.com', 'Sistem Informasi', '6088fa0fd80a8.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) AUTO_INCREMENT PRIMARY KEY,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'emah', '$2y$10$0TDedV/IZVU0R4CpYee9T.AYoEGWIIORMP25ywigs42SPhdAY42Su'),
(2, 'admin', '$2y$10$quGWw0s4QjBYnKAzx6clK.f5EL01zLOXMKwxs.JtzFJwfWypVfLJG');


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
