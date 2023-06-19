-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2023 at 08:41 AM
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
-- Table structure for table `user_order`
--

CREATE TABLE `user_order` (
  `order_ID` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `address_ID` int(11) NOT NULL,
  `order_paymentMethod` varchar(255) NOT NULL,
  `order_datePlaced` varchar(255) NOT NULL,
  `tmp_cart_rand` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_order`
--

INSERT INTO `user_order` (`order_ID`, `user_ID`, `address_ID`, `order_paymentMethod`, `order_datePlaced`, `tmp_cart_rand`) VALUES
(27, 6, 4, 'gcash', '2023-03-21 18:57:22', 1546103065),
(28, 6, 4, 'gcash', '2023-03-21 18:57:51', 2079521243),
(29, 9, 5, 'gcash', '2023-03-21 18:58:42', 1981689303),
(30, 6, 4, 'paypal', '2023-03-21 19:49:10', 1362989761),
(31, 13, 6, 'gcash', '2023-03-21 19:50:29', 131752783),
(32, 1, 2, 'gcash', '2023-03-22 15:38:19', 65882180);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_order`
--
ALTER TABLE `user_order`
  ADD PRIMARY KEY (`order_ID`),
  ADD KEY `user_ID` (`user_ID`,`address_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_order`
--
ALTER TABLE `user_order`
  MODIFY `order_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
