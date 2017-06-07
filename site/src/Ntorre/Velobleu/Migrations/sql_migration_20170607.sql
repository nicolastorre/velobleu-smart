-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 07, 2017 at 03:10 PM
-- Server version: 5.5.55-0+deb8u1
-- PHP Version: 7.0.19-1~dotdeb+8.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `velobleu`
--

-- --------------------------------------------------------

--
-- Table structure for table `Ntorre_Velobleu_Entity_Station`
--

CREATE TABLE `Ntorre_Velobleu_Entity_Station` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_station` mediumint(8) UNSIGNED NOT NULL,
  `date` int(11) NOT NULL,
  `disp` tinyint(1) NOT NULL,
  `neutral` tinyint(1) NOT NULL,
  `total_capacity` tinyint(3) UNSIGNED NOT NULL,
  `available_capacity` tinyint(3) UNSIGNED NOT NULL,
  `available_bike` tinyint(3) UNSIGNED NOT NULL,
  `available_parking` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Ntorre_Velobleu_Entity_Station`
--
ALTER TABLE `Ntorre_Velobleu_Entity_Station`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Ntorre_Velobleu_Entity_Station`
--
ALTER TABLE `Ntorre_Velobleu_Entity_Station`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;