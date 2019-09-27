-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2019 at 03:40 PM
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
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'two_wheel'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `club`
--

CREATE TABLE `club` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `club_name` varchar(255) NOT NULL,
  `banner` text NOT NULL,
  `state` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `club_leader_name` varchar(255) NOT NULL,
  `no_of_member` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `contact_person` varchar(255) NOT NULL,
  `mobile_number` varchar(255) NOT NULL,
  `year_of_established` varchar(255) NOT NULL,
  `activity` varchar(255) NOT NULL,
  `club_secretary` varchar(255) NOT NULL,
  `competition_secetary` varchar(255) NOT NULL,
  `chairman` varchar(255) NOT NULL,
  `treasurer` varchar(255) NOT NULL,
  `about_club` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `club_event`
--

CREATE TABLE `club_event` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `club_name_id` int(11) NOT NULL,
  `banner` text NOT NULL,
  `event_title` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `location` text NOT NULL,
  `address` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'landing_twowheel_image', 'uploads/8aa64dfdb34c61d9b504eec5c725b9b0.png', 'Landing two wheel image', 'image', 1, 1, '2019-09-13 05:37:00', '2019-09-13 05:37:00'),
(2, 'landing_fourwheel_image', 'uploads/c6aafed22222457b6ea783ba4de53d73.png', 'Landing four wheel image', 'image', 1, 1, '2019-09-13 05:37:00', '2019-09-13 05:37:00'),
(3, 'landing_description', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 'Landing description', 'text', 1, 1, '2019-09-13 05:37:00', '2019-09-13 05:37:00'),
(4, 'landing_about_us_image', 'uploads/6f03fb060a76e727f7607b779636f900.png', 'Landing about menu image', 'image', 1, 1, '2019-09-13 05:37:00', '2019-09-13 05:37:00'),
(5, 'landing_news_updates_image', 'uploads/1b05d8e5882dc57a103034f94d6f29d7.png', 'Landing news menu image', 'image', 1, 1, '2019-09-13 05:37:00', '2019-09-13 05:37:00'),
(6, 'landing_join_club_image', 'uploads/d73bcc4c4d9935a7d9352da2f7fc633c.png', 'Landing join club menu image', 'image', 1, 1, '2019-09-13 05:37:00', '2019-09-13 05:37:00'),
(7, 'landing_shop_now_image', 'uploads/7ee9411053cdd5882c043728a91d7d4a.png', 'Landing shop now menu image', 'image', 1, 1, '2019-09-13 05:37:00', '2019-09-13 05:37:00'),
(8, 'landing_banner_ad', '', '', 'dropdown', 1, 1, '2019-09-13 05:37:00', '2019-09-13 05:37:00'),
(9, 'home_banner', '', 'Home page Banner', 'image/video', 1, 1, '2019-09-13 05:37:00', '2019-09-13 05:37:00'),
(10, 'home_press_release_banner', '', 'Press Release Banner', 'image', 1, 1, '2019-09-13 05:37:00', '2019-09-13 05:37:00'),
(11, 'home_advertisement_card_1', '', 'Advertisement Card 1', 'image', 1, 1, '2019-09-13 05:37:00', '2019-09-13 05:37:00'),
(12, 'home_advertisement_card_2', '', 'Advertisement Card 2', 'image', 1, 1, '2019-09-13 05:37:00', '2019-09-13 05:37:00'),
(13, 'home_advertisement_banner', '', 'Advertisement Banner', 'image', 1, 1, '2019-09-13 05:37:00', '2019-09-13 05:37:00');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `club_type_id` int(11) NOT NULL,
  `club_category` int(11) NOT NULL,
  `club_name_id` int(11) NOT NULL,
  `cover_image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `media_id` int(11) NOT NULL,
  `author_name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `sub_banner` varchar(255) NOT NULL,
  `sub_banner_1` varchar(255) NOT NULL,
  `moto_text` text NOT NULL,
  `description` text NOT NULL,
  `description_1` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `club`
--
ALTER TABLE `club`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `club_event`
--
ALTER TABLE `club_event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`config_id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `club`
--
ALTER TABLE `club`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `club_event`
--
ALTER TABLE `club_event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `config_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
