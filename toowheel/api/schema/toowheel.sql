-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2019 at 09:10 AM
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
(1, 'landing_twowheel_image', 'uploads/twowheel.png', 'Landing two wheel image', 'image', 1, 1, '2019-09-13 05:37:00', '2019-09-13 05:37:00'),
(2, 'landing_fourwheel_image', 'uploads/fourwheel.png', 'Landing four wheel image', 'image', 1, 1, '2019-09-13 05:37:00', '2019-09-13 05:37:00'),
(3, 'landing_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 'Landing description', 'text', 1, 1, '2019-09-13 05:37:00', '2019-09-13 05:37:00'),
(4, 'landing_about_us_image', 'uploads/about.png', 'Landing about menu image', 'image', 1, 1, '2019-09-13 05:37:00', '2019-09-13 05:37:00'),
(5, 'landing_news_updates_image', 'uploads/news_updates.png', 'Landing news menu image', 'image', 1, 1, '2019-09-13 05:37:00', '2019-09-13 05:37:00'),
(6, 'landing_join_club_image', 'uploads/join_a_club.png', 'Landing join club menu image', 'image', 1, 1, '2019-09-13 05:37:00', '2019-09-13 05:37:00'),
(7, 'landing_shop_now_image', 'uploads/shop_now.png', 'Landing shop now menu image', 'image', 1, 1, '2019-09-13 05:37:00', '2019-09-13 05:37:00'),
(8, 'landing_banner_ad', '', '', 'dropdown', 1, 1, '2019-09-13 05:37:00', '2019-09-13 05:37:00'),
(9, 'home_banner', '', 'Home page Banner', 'image/video', 1, 1, '2019-09-13 05:37:00', '2019-09-13 05:37:00'),
(10, 'home_press_release_banner', '', 'Press Release Banner', 'image', 1, 1, '2019-09-13 05:37:00', '2019-09-13 05:37:00'),
(11, 'home_advertisement_card_1', '', 'Advertisement Card 1', 'image', 1, 1, '2019-09-13 05:37:00', '2019-09-13 05:37:00'),
(12, 'home_advertisement_card_2', '', 'Advertisement Card 2', 'image', 1, 1, '2019-09-13 05:37:00', '2019-09-13 05:37:00'),
(13, 'home_advertisement_banner', '', 'Advertisement Banner', 'image', 1, 1, '2019-09-13 05:37:00', '2019-09-13 05:37:00');

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
  MODIFY `config_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
