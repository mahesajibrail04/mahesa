-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2023 at 10:13 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dempster`
--

-- --------------------------------------------------------

--
-- Table structure for table `ds_admin`
--

CREATE TABLE `ds_admin` (
  `id` float NOT NULL,
  `user` varchar(20) NOT NULL,
  `password` varchar(2000) NOT NULL,
  `nama` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ds_admin`
--

INSERT INTO `ds_admin` (`id`, `user`, `password`, `nama`) VALUES
(1, 'admin', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `ds_gejala`
--

CREATE TABLE `ds_gejala` (
  `id` int(10) NOT NULL,
  `kode_gejala` varchar(5) DEFAULT NULL,
  `nama_gejala` varchar(100) DEFAULT NULL,
  `cf` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ds_penyakit`
--

CREATE TABLE `ds_penyakit` (
  `id` int(10) NOT NULL,
  `kode_penyakit` varchar(5) DEFAULT NULL,
  `nama_penyakit` varchar(100) DEFAULT NULL,
  `notes` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `ds_rules`
--

CREATE TABLE `ds_rules` (
  `id` int(10) NOT NULL,
  `id_problem` varchar(10) DEFAULT NULL,
  `id_evidence` varchar(10) DEFAULT NULL,
  `cf` float DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ds_admin`
--
ALTER TABLE `ds_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ds_gejala`
--
ALTER TABLE `ds_gejala`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ds_penyakit`
--
ALTER TABLE `ds_penyakit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ds_rules`
--
ALTER TABLE `ds_rules`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ds_admin`
--
ALTER TABLE `ds_admin`
  MODIFY `id` float NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ds_gejala`
--
ALTER TABLE `ds_gejala`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ds_penyakit`
--
ALTER TABLE `ds_penyakit`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ds_rules`
--
ALTER TABLE `ds_rules`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
