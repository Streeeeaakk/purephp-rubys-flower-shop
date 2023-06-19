-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2023 at 08:40 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_company`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_address`
--

CREATE TABLE `user_address` (
  `address_ID` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `address_street` varchar(255) NOT NULL,
  `address_barangay` varchar(255) NOT NULL,
  `address_city` varchar(255) NOT NULL,
  `address_province` varchar(255) NOT NULL,
  `address_zipcode` int(11) NOT NULL,
  `address_country` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_address`
--

INSERT INTO `user_address` (`address_ID`, `user_ID`, `address_street`, `address_barangay`, `address_city`, `address_province`, `address_zipcode`, `address_country`) VALUES
(1, 1, 'Ruiz Subdivision', 'Talubangi', 'Kabankalan City', 'Negros Occidental', 6111, 'Philippines'),
(2, 1, 'Purok Maabiabihon', 'Barangay Consuelo', 'Ilog', 'Negros Occidental', 6109, 'Philippines'),
(3, 1, 'Aspenn Residences', 'Barangay Villamonte', 'Bacolod City', 'Negros Occidental', 6100, 'Philippines'),
(4, 6, 'Aspenn Residences', 'Barangay Villamonte', 'Bacolod City', 'Negros Occidental', 6100, 'Philippines'),
(5, 9, 'Ruiz Subdivision', 'Talubangi', 'Kabankalan City', 'Negros Occidental', 6111, 'Philippines'),
(6, 13, 'Ruiz Subdivision', 'Talubangi', 'Kabankalan City', 'Negros Occidental', 6111, 'Philippines');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_address`
--
ALTER TABLE `user_address`
  ADD PRIMARY KEY (`address_ID`),
  ADD KEY `user_ID` (`user_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_address`
--
ALTER TABLE `user_address`
  MODIFY `address_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
