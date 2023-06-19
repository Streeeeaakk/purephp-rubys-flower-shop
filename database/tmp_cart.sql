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
-- Table structure for table `tmp_cart`
--

CREATE TABLE `tmp_cart` (
  `tmp_cart_ID` int(11) NOT NULL,
  `cart_ID` int(11) NOT NULL,
  `prod_ID` int(11) NOT NULL,
  `prod_quantity` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `tmp_cart_rand` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tmp_cart`
--

INSERT INTO `tmp_cart` (`tmp_cart_ID`, `cart_ID`, `prod_ID`, `prod_quantity`, `user_ID`, `tmp_cart_rand`) VALUES
(54, 47, 34, 3, 6, 1546103065),
(55, 48, 32, 2, 6, 1546103065),
(56, 49, 39, 6, 6, 2079521243),
(57, 51, 33, 2, 9, 1981689303),
(58, 52, 42, 4, 9, 1981689303),
(59, 50, 35, 2, 6, 1362989761),
(60, 53, 39, 3, 13, 131752783),
(61, 54, 32, 2, 1, 65882180);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tmp_cart`
--
ALTER TABLE `tmp_cart`
  ADD PRIMARY KEY (`tmp_cart_ID`),
  ADD KEY `cart_ID` (`cart_ID`,`user_ID`),
  ADD KEY `prod_ID` (`prod_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tmp_cart`
--
ALTER TABLE `tmp_cart`
  MODIFY `tmp_cart_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
