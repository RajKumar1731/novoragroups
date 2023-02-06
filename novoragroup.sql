-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2023 at 10:07 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `novoragroup`
--

-- --------------------------------------------------------

--
-- Table structure for table `novora_table`
--

CREATE TABLE `novora_table` (
  `id` int(11) NOT NULL,
  `address` varchar(256) NOT NULL,
  `latitude` varchar(256) NOT NULL,
  `longitude` varchar(256) NOT NULL,
  `maps_providers` varchar(256) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `novora_table`
--

INSERT INTO `novora_table` (`id`, `address`, `latitude`, `longitude`, `maps_providers`) VALUES
(7, 'Kanpur, Uttar Pradesh, India', '26.449923', '80.3318736', 'Google Map'),
(16, 'Mexico City, CDMX, Mexico', '19.4326077', '-99.133208', 'Google Map'),
(9, 'Kalikangkung, Tegal Regency, Central Java, Indonesia', '-6.9558792', '109.1671937', 'Google Map'),
(13, 'Allahabad, Uttar Pradesh, India', '25.4358011', '81.846311', 'Google Map'),
(14, 'Bangalore, Karnataka, India', '12.9715987', '77.5945627', 'Google Map');

-- --------------------------------------------------------

--
-- Indexes for table `novora_table`
--
ALTER TABLE `novora_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for table `novora_table`
--
ALTER TABLE `novora_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
