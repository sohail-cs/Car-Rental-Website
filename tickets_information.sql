-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2024 at 05:52 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tickets`
--

-- --------------------------------------------------------

--
-- Table structure for table `tickets information`
--

CREATE TABLE `tickets information` (
  `id` int(11) NOT NULL,
  `Issue` enum('car_not_added','car_cannot_be_viewed','car_not_updated','car_not_deleted') NOT NULL,
  `Description` varchar(40) NOT NULL,
  `Status` enum('Open','In Progress','Closed') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tickets information`
--

INSERT INTO `tickets information` (`id`, `Issue`, `Description`, `Status`) VALUES
(1, 'car_not_added', 's', 'Closed'),
(2, 'car_not_added', 's', 'Open'),
(3, 'car_not_added', 'a', 'Open'),
(4, 'car_cannot_be_viewed', 'd', 'Open'),
(5, 'car_cannot_be_viewed', 'f', 'Open'),
(6, 'car_not_updated', 'm', 'Open'),
(7, 'car_not_updated', 'm', 'Open'),
(8, 'car_not_updated', 'm', 'Open'),
(9, 'car_not_updated', 'm', 'Open'),
(10, 'car_not_updated', 'm', 'Open'),
(11, 'car_not_updated', 'm', 'Open');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tickets information`
--
ALTER TABLE `tickets information`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tickets information`
--
ALTER TABLE `tickets information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
