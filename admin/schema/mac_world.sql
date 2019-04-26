-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2018 at 05:30 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mac_world`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
`ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(500) NOT NULL DEFAULT '',
  `mobile` varchar(15) NOT NULL DEFAULT '',
  `password` varchar(50) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`ID`, `name`, `email`, `mobile`, `password`, `status`, `created_at`) VALUES
(1, 'Venki', 'iamvenkat@gmail.com', '9884794962', '123456', 1, '2018-10-28 12:46:13');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
`ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '',
  `image` varchar(500) NOT NULL DEFAULT '',
  `description` varchar(1000) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`ID`, `name`, `image`, `description`, `status`, `created_at`, `created_by`) VALUES
(1, 'Name', 'uploads/f4282ddd82991b3000394af2370813ef.jpg', 'Description', 1, '2018-10-31 04:27:17', 1);

-- --------------------------------------------------------

--
-- Table structure for table `configs`
--

CREATE TABLE IF NOT EXISTS `configs` (
`ID` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `display_name` varchar(250) NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `configs`
--

INSERT INTO `configs` (`ID`, `name`, `display_name`, `value`) VALUES
(1, 'txtlcl_sender', 'Textlocal Sender', 'BLOCKS'),
(2, 'txtlcl_email', 'Textlocal Email', 'info@4blocksinc.com'),
(3, 'txtlcl_api', 'Textlocal API', '186b61cc2dfc2c83c365f66c2b07493909c4d7f020dbbcabd8bee56107a45380'),
(4, 'sms', 'SMS', 'IN'),
(5, 'push_id', 'Push ID', '55b9d640-9ea5-4692-b819-e6e699e36755'),
(6, 'push_icon', 'Push Icon', 'http://4blocksinc.com/ischool/v1/logo.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `templates`
--

CREATE TABLE IF NOT EXISTS `templates` (
`ID` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `subject` varchar(500) NOT NULL,
  `display` varchar(250) NOT NULL,
  `body` text NOT NULL,
  `type` varchar(200) NOT NULL,
  `target` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `to_email` varchar(300) NOT NULL,
  `to_name` varchar(300) NOT NULL,
  `cc_email` varchar(300) NOT NULL,
  `cc_name` varchar(300) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `templates`
--

INSERT INTO `templates` (`ID`, `name`, `subject`, `display`, `body`, `type`, `target`, `status`, `to_email`, `to_name`, `cc_email`, `cc_name`) VALUES
(1, 'register', 'Welcome email', 'User Register', 'Hi [name],\r\n     Welcome to our community', 'email', 'user', 1, 'info@4blocksinc.com', 'Support', '', ''),
(2, 'register', 'New user registered', 'User Register Admin', 'Dear Admin, New user [name] registered with us', 'email', 'admin', 1, 'info@4blocksinc.com', 'Support', '', ''),
(3, 'register', 'Register OTP', 'Sign in OTP', 'Use this code [otp] to complete your registration', 'sms', 'user', 1, 'info@4blocksinc.com', 'Support', '', ''),
(13, 'forgot_password', 'Forgot Password', 'Forgot Password', 'Your password is [password]', 'email', 'user', 1, 'info@4blocksinc.com', 'Support', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `configs`
--
ALTER TABLE `configs`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `templates`
--
ALTER TABLE `templates`
 ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `configs`
--
ALTER TABLE `configs`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `templates`
--
ALTER TABLE `templates`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
