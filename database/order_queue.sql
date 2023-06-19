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
-- Table structure for table `order_queue`
--

CREATE TABLE `order_queue` (
  `order_queue_ID` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `order_ID` int(11) NOT NULL,
  `prod_ID` int(11) NOT NULL,
  `prod_quantity` int(11) NOT NULL,
  `order_delivered` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_queue`
--

INSERT INTO `order_queue` (`order_queue_ID`, `user_ID`, `order_ID`, `prod_ID`, `prod_quantity`, `order_delivered`) VALUES
(14, 6, 27, 34, 3, 0),
(15, 6, 27, 32, 2, 0),
(16, 6, 28, 39, 6, 0),
(17, 9, 29, 33, 2, 0),
(18, 9, 29, 42, 4, 0),
(19, 6, 30, 35, 2, 0),
(20, 13, 31, 39, 3, 0),
(21, 1, 32, 32, 2, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `order_queue`
--
ALTER TABLE `order_queue`
  ADD PRIMARY KEY (`order_queue_ID`),
  ADD KEY `order_ID` (`order_ID`,`prod_ID`),
  ADD KEY `user_ID` (`user_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `order_queue`
--
ALTER TABLE `order_queue`
  MODIFY `order_queue_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
