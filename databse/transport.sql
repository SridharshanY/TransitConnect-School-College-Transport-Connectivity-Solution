-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2023 at 12:42 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `transport`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pswd` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `uname`, `email`, `pswd`, `status`) VALUES
(1, 'admin', 'admin@gmail.com', '123456', 1);

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `exp` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `file` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`id`, `name`, `age`, `exp`, `number`, `file`, `email`, `status`) VALUES
(1, 'Muthukumar', 34, 6, 1234567890, 'upload/14c9c8a6792d0897d8a15bd438dff03a.jpg', 'wqd@sfeff.fgd', 2),
(2, 'Arun', 37, 7, 2147483647, 'upload/1233059-hd-x440-2.avif', 'arun@gmail.com', 1),
(3, 'Nandhakumar', 39, 7, 2147483647, 'upload/1999-nissan-gt-r-r34-from-2-fast-2-furious_100407742_l.jpg', 'kumar@gmail.com', 1),
(4, 'Meinathan', 38, 4, 2147483647, 'upload/458167986885cddaffaf599d5de199d1.jpg', 'mei@gmail.com', 1),
(5, 'Ibrahim', 39, 8, 2147483647, 'upload/20230802102800_X440 3.jpg', 'ibr@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

CREATE TABLE `route` (
  `id` int(11) NOT NULL,
  `route` varchar(255) NOT NULL,
  `bus` int(11) NOT NULL,
  `driver` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `route`
--

INSERT INTO `route` (`id`, `route`, `bus`, `driver`, `status`) VALUES
(5, 'Gobi', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `roll` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fees` varchar(255) NOT NULL,
  `route` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `uname`, `roll`, `password`, `fees`, `route`, `status`) VALUES
(2, 'Sridharshan', '123456', '123456', 'Paid', 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `seats` int(11) NOT NULL,
  `plate` varchar(255) NOT NULL,
  `number` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `service` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`id`, `name`, `category`, `seats`, `plate`, `number`, `year`, `owner`, `service`, `status`) VALUES
(1, 'Ashok Leyland', 'Bus', 52, 'TN69AT4200', 1, 2001, 'Pre-Owned', 2022, 2),
(2, 'Tata Marcopolo', 'Van', 35, 'TN42XX6942', 2, 2023, 'New', 2023, 1),
(3, 'Bharat Benz', 'Pre-Owned', 50, 'TN09AT7419', 3, 2022, 'New', 2023, 1),
(4, 'Eicher', 'New', 35, 'TN09AS1234', 4, 2010, 'Pre-Owned', 2023, 1),
(5, 'Mahindra', 'New', 35, 'TN01AS1234', 5, 2023, 'New', 2023, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `route`
--
ALTER TABLE `route`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `route`
--
ALTER TABLE `route`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
