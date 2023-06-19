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
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prod_ID` int(11) NOT NULL,
  `prod_name` varchar(255) NOT NULL,
  `prod_category` varchar(255) NOT NULL,
  `prod_price` double NOT NULL,
  `prod_details` text NOT NULL,
  `prod_dateAdded` varchar(255) NOT NULL,
  `prod_picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prod_ID`, `prod_name`, `prod_category`, `prod_price`, `prod_details`, `prod_dateAdded`, `prod_picture`) VALUES
(32, 'test', 'flower', 9999, 'lorem ipsum', '2023-03-13 15:34:34', '279866187_5490810370964828_2841373307073751044_n.jpg'),
(33, 'boko namit2', 'flower', 3123, 'Lance lorem ipsum', '2023-03-14 03:03:43', 'asd.jpg'),
(34, 'test3', 'chocolate', 90, 'lorem ipsumasdasd', '2023-03-14 13:46:25', 'classicu 2023-02-06 161931.484.jpeg'),
(35, 'test4', 'sunflower', 10, 'Lorem ipsum adasdasdasd', '2023-03-18 10:30:31', 'final.png'),
(39, 'test5', 'flower', 90, 'test flower bouqeut', '2023-03-18 18:43:44', 'HD-wallpaper-slipknot-logo.jpg'),
(40, 'test444', 'additionals', 123, '12313123', '2023-03-18 18:52:43', '316868709_822867612275160_3262494823453761625_n (1).jpg'),
(41, 'test55', 'chocolate', 1234, 'asdasdad', '2023-03-19 01:21:54', '279866187_5490810370964828_2841373307073751044_n.jpg'),
(42, 'loremipsum', 'additionals', 20, 'lorem imsup', '2023-03-21 00:41:45', 'vlcsnap-2022-11-23-23h52m45s671.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prod_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prod_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
