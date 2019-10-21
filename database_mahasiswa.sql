-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 21, 2019 at 04:20 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database_mahasiswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `Data_Login`
--

CREATE TABLE `Data_Login` (
  `NIM` varchar(9) COLLATE utf8_bin NOT NULL,
  `PASSWORD` varchar(25) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `Data_Login`
--

INSERT INTO `Data_Login` (`NIM`, `PASSWORD`) VALUES
('672017148', 'crot');

-- --------------------------------------------------------

--
-- Table structure for table `data_mahasiswa`
--

CREATE TABLE `data_mahasiswa` (
  `NIM` varchar(9) COLLATE utf8_bin NOT NULL,
  `NAMA` varchar(100) COLLATE utf8_bin NOT NULL,
  `ASAL` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `data_mahasiswa`
--

INSERT INTO `data_mahasiswa` (`NIM`, `NAMA`, `ASAL`) VALUES
('672017148', 'TITANI', 'KOTA SEMARANG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Data_Login`
--
ALTER TABLE `Data_Login`
  ADD PRIMARY KEY (`NIM`);

--
-- Indexes for table `data_mahasiswa`
--
ALTER TABLE `data_mahasiswa`
  ADD PRIMARY KEY (`NIM`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
