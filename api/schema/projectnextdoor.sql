-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2019 at 03:28 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectnextdoor`
--

-- --------------------------------------------------------

--
-- Table structure for table `space_rent`
--

CREATE TABLE `space_rent` (
  `space_rent_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `mobile` varchar(255) NOT NULL DEFAULT '',
  `notes` varchar(500) NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `space_rent`
--

INSERT INTO `space_rent` (`space_rent_id`, `name`, `email`, `mobile`, `notes`, `created_at`) VALUES
(1, 'Mushaqdeen', 'mushaqdeen@yahoo.co.in', '9884794962', 'Notes test', '2019-09-16 15:37:34');

-- --------------------------------------------------------

--
-- Table structure for table `space_rent_date`
--

CREATE TABLE `space_rent_date` (
  `space_rent_date_id` int(11) NOT NULL,
  `rent_date` date DEFAULT NULL,
  `from_time` time DEFAULT NULL,
  `to_time` time DEFAULT NULL,
  `space_rent_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `space_rent_date`
--

INSERT INTO `space_rent_date` (`space_rent_date_id`, `rent_date`, `from_time`, `to_time`, `space_rent_id`, `created_at`) VALUES
(1, '2019-09-18', '17:00:00', '19:00:00', 1, '2019-09-16 15:37:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `space_rent`
--
ALTER TABLE `space_rent`
  ADD PRIMARY KEY (`space_rent_id`);

--
-- Indexes for table `space_rent_date`
--
ALTER TABLE `space_rent_date`
  ADD PRIMARY KEY (`space_rent_date_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `space_rent`
--
ALTER TABLE `space_rent`
  MODIFY `space_rent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `space_rent_date`
--
ALTER TABLE `space_rent_date`
  MODIFY `space_rent_date_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
