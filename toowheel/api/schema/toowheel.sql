-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2019 at 07:45 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toowheel`
--

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `config_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `display_name` varchar(255) NOT NULL,
  `field_type` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`config_id`, `name`, `value`, `display_name`, `field_type`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'landing_twowheel_image', '', '', 'image', 1, 1, '2019-09-13 05:37:00', '2019-09-13 05:37:00'),
(2, 'landing_fourwheel_image', '', '', 'image', 1, 1, '2019-09-13 05:37:00', '2019-09-13 05:37:00'),
(3, 'landing_description', '', '', 'text', 1, 1, '2019-09-13 05:37:00', '2019-09-13 05:37:00'),
(4, 'landing_about_us_image', '', '', 'image', 1, 1, '2019-09-13 05:37:00', '2019-09-13 05:37:00'),
(5, 'landing_news_updates_image', '', '', 'image', 1, 1, '2019-09-13 05:37:00', '2019-09-13 05:37:00'),
(6, 'landing_join_club_image', '', '', 'image', 1, 1, '2019-09-13 05:37:00', '2019-09-13 05:37:00'),
(7, 'landing_show_now_image', '', '', 'image', 1, 1, '2019-09-13 05:37:00', '2019-09-13 05:37:00'),
(8, 'landing_banner_ad', '', '', 'dropdown', 1, 1, '2019-09-13 05:37:00', '2019-09-13 05:37:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`config_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `config_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
