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
-- Table structure for table `profilepicture`
--

CREATE TABLE `profilepicture` (
  `profile_ID` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `profile_picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profilepicture`
--

INSERT INTO `profilepicture` (`profile_ID`, `user_ID`, `profile_picture`) VALUES
(10, 9, 'test.jpg'),
(15, 1, '279866187_5490810370964828_2841373307073751044_n.jpg'),
(16, 6, '345874988_577026947906747_4520466363856377886_n.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `profilepicture`
--
ALTER TABLE `profilepicture`
  ADD PRIMARY KEY (`profile_ID`),
  ADD KEY `user_ID` (`user_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `profilepicture`
--
ALTER TABLE `profilepicture`
  MODIFY `profile_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
