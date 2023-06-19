-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2023 at 03:54 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oldcomp`
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
(43, '6pcs Roses Flower Bouqet', 'flower', 700, '6pcs Roses Flower Bouqet', '2023-06-16 18:35:51', 'large_2329_cebu-gift-03.jpg'),
(44, '9pcs Roses Flower Bouqet', 'flower', 1000, '9pcs Roses Flower Bouqet', '2023-06-16 18:36:37', '9-roses-01.jpg'),
(45, '1 Dozen Roses Flower Bouquet', 'flower', 1500, '1 Dozen Roses Flower Bouquet', '2023-06-16 18:37:37', 'viber_image_2021-09-27_09-38-49-287.jpg'),
(46, '18pcs Roses Flower Bouquet', 'flower', 2300, '18pcs Roses Flower Bouquet', '2023-06-16 18:39:39', '31-Roses-Bouquet-A1.jpg'),
(47, '2 Dozen Roses Flower Bouquet', 'flower', 3500, '2 Dozen Roses Flower Bouquet', '2023-06-16 18:40:40', 'delivery-product-74.jpg'),
(48, '3pcs Sunflower Bouquet', 'sunflower', 1000, '3pcs Sunflower Bouquet', '2023-06-16 18:41:37', '3 sunflowers1-500x500.jpg'),
(49, '6pcs Sunflower Bouquet', 'sunflower', 1500, '6pcs Sunflower Bouquet', '2023-06-16 18:42:40', 'sunflower-A-04.jpg'),
(50, 'Chocolate Bouquet Combo 1', 'chocolate', 3000, 'Chocolate Bouquet Combo 1', '2023-06-16 18:44:07', 'chocolate-bouquet-pangasinan-mix-2.jpg'),
(51, 'Ferrero Bouquet', 'chocolate', 2700, 'Ferrero Bouquet', '2023-06-16 18:45:19', 'used-46.jpg'),
(52, 'Toblerone Bouquet', 'chocolate', 5000, 'Toblerone Bouquet', '2023-06-16 18:46:13', '152d996a99c709ff03464566ef0bb0a2--toblerone-chocolate-chocolate-bouquet.jpg'),
(53, '8x8 Red Ribbon Cake', 'additionals', 1200, '8x8 Red Ribbon Cake', '2023-06-16 18:47:25', 'rr-Cake-10.jpg'),
(54, '1ft Teddy Bear', 'additionals', 200, '1ft Teddy Bear', '2023-06-16 18:48:14', '1ft.png'),
(55, '2ft Teddy Bear', 'additionals', 350, '2ft Teddy Bear', '2023-06-16 18:49:36', '2ft.jpg'),
(56, '3ft Teddy Bear', 'additionals', 500, '3ft Teddy Bear', '2023-06-16 18:50:34', '3ft.webp'),
(57, 'Human Size Teddy Bear', 'additionals', 2500, 'Human Size Teddy Bear', '2023-06-16 18:51:24', '4ft.jpg');

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
  MODIFY `prod_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
