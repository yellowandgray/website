-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 14, 2020 at 09:49 AM
-- Server version: 5.6.41-84.1-log
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `a2dot37r_corona_care`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '',
  `username` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(50) NOT NULL,
  `role` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT '0',
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `username`, `password`, `role`, `company_name`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Sundar', 'emech', 'Emech2020', 'admin', 'ElectroMech Pte ltd', 1, '2020-02-15 00:00:00', 0, '2020-02-15 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '',
  `nri_no` varchar(255) NOT NULL DEFAULT '',
  `phone_no` varchar(15) NOT NULL,
  `company_name` varchar(255) NOT NULL DEFAULT '',
  `image_path` varchar(500) NOT NULL DEFAULT '',
  `username` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(50) NOT NULL DEFAULT '',
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `supervisor_id` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT '0',
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `name`, `nri_no`, `phone_no`, `company_name`, `image_path`, `username`, `password`, `role`, `supervisor_id`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Sundar', '1020', '98509721', 'EMECH', '', 'sundar', 'Emech', 'user', 12, 1, '2020-02-23 18:53:37', 0, '2020-02-25 18:33:49', 0),
(2, 'Mano', '7965', '86261994', 'EMECH', '', '', '', 'user', 12, 1, NULL, 0, NULL, 0),
(3, 'Sudharsan', '956E', '81501602', 'EMECH', '', '', '', 'user', 12, 1, '2020-02-23 21:36:30', 0, '2020-02-23 21:36:30', 0),
(5, 'deepa', '366u', '98520245', 'emech ', '', '', '', 'user', 0, 1, '2020-02-24 14:51:06', 0, '2020-02-24 14:51:06', 0),
(6, 'Mahendran', '2196', '98686202', 'Electromech Technologies Pte ', '', '', '', 'user', 0, 1, '2020-02-24 16:17:44', 0, '2020-02-24 16:17:44', 0),
(7, 'Senthil kumar', '7706', '83157491', 'Electromech Technologies ', '', 'senthil', 'senth1l', 'user', 0, 1, '2020-02-24 16:20:37', 0, '2020-02-24 16:21:45', 0),
(12, 'venkat', '6789', '63259844', 'YGSTUDIO ', '', 'venkat', 'vijiviji', 'supervisor', 0, 1, '2020-03-08 14:23:07', 0, '2020-03-08 14:39:58', 0),
(13, 'selvaraj', '600U', '92416220', 'Electromech technologies pte l', 'uploads/', '', '', 'other', 0, 1, '2020-03-10 13:34:09', 0, '2020-03-10 13:34:09', 0),
(14, 'Shanmuga Rangan', '185R', '84375721', 'Electromech Technologies Pte ', 'uploads/uploads/', '', '', 'other', 0, 1, '2020-03-10 13:59:41', 0, '2020-03-10 14:00:26', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_visit`
--

CREATE TABLE `user_visit` (
  `user_visit_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `user_remarksin` text NOT NULL,
  `user_remarksout` text NOT NULL,
  `in_datetime` datetime DEFAULT NULL,
  `out_datetime` datetime DEFAULT NULL,
  `in_temperature` float(12,2) DEFAULT NULL,
  `out_temperature` float(12,2) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT '0',
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_visit`
--

INSERT INTO `user_visit` (`user_visit_id`, `user_id`, `user_remarksin`, `user_remarksout`, `in_datetime`, `out_datetime`, `in_temperature`, `out_temperature`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 1, '', '', '2020-02-23 21:20:24', '2020-02-23 21:28:11', 36.70, 36.50, 1, '2020-02-23 21:20:34', 0, '2020-02-23 21:28:17', 0),
(2, 2, '', '', '2020-02-23 21:22:17', NULL, 36.40, NULL, 1, '2020-02-23 21:22:24', 0, '2020-02-23 21:22:24', 0),
(3, 1, ' ok', '', '2020-02-23 21:28:25', NULL, 36.70, NULL, 1, '2020-02-23 21:28:35', 0, '2020-02-23 21:28:35', 0),
(4, 3, '', '', '2020-02-23 21:36:40', NULL, 36.70, NULL, 1, '2020-02-23 21:36:48', 0, '2020-02-23 21:36:48', 0),
(6, 5, '', '', '2020-02-24 14:51:16', NULL, 36.50, NULL, 1, '2020-02-24 14:51:28', 0, '2020-02-24 14:51:28', 0),
(7, 6, '', '', '2020-02-24 16:28:13', '2020-02-24 18:00:00', 36.50, 36.30, 1, '2020-02-24 16:18:33', 0, '2020-02-25 13:38:27', 0),
(8, 7, '', '', '2020-02-24 16:34:11', NULL, 36.30, NULL, 1, '2020-02-24 16:24:23', 0, '2020-02-24 16:24:23', 0),
(20, 12, 'good', '', '2020-03-08 12:07:29', NULL, 36.00, NULL, 1, '2020-03-08 14:37:58', 0, '2020-03-08 14:37:58', 0),
(21, 12, '', '', '2020-03-08 12:18:06', NULL, 37.00, NULL, 1, '2020-03-08 14:52:40', 0, '2020-03-08 14:52:40', 0),
(23, 6, '', '', '2020-03-10 08:01:00', NULL, 36.50, NULL, 1, '2020-03-10 11:58:56', 0, '2020-03-10 11:58:56', 0),
(24, 13, '', '', '2020-03-10 07:45:00', NULL, 36.50, NULL, 1, '2020-03-10 13:35:06', 0, '2020-03-10 13:35:06', 0),
(25, 14, '', '', '2020-03-10 07:30:00', '2020-03-10 18:01:00', 36.40, 38.00, 1, '2020-03-10 14:50:45', 0, '2020-03-10 14:51:34', 0),
(26, 13, '', '', '2020-03-10 15:04:33', NULL, 36.20, NULL, 1, '2020-03-10 15:04:45', 0, '2020-03-10 15:04:45', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_visit`
--
ALTER TABLE `user_visit`
  ADD PRIMARY KEY (`user_visit_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_visit`
--
ALTER TABLE `user_visit`
  MODIFY `user_visit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
