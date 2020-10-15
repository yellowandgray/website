-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 14, 2020 at 12:22 AM
-- Server version: 5.6.49-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ghmindia_fresche`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `banner_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`banner_id`, `title`, `image_path`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Home Banner', 'uploads/9de818ba6195d9d62231f82ab188eb1e.jpg', '2019-12-16 05:05:30', '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE `coupon` (
  `coupon_id` int(11) NOT NULL,
  `coupon_name` varchar(255) NOT NULL,
  `reduce_amt` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `max_usage` int(11) NOT NULL DEFAULT '0',
  `usage_user` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coupon`
--

INSERT INTO `coupon` (`coupon_id`, `coupon_name`, `reduce_amt`, `start_date`, `end_date`, `max_usage`, `usage_user`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'corona', '1000', '0000-00-00', '0000-00-00', 0, 0, 0, '2020-09-28 11:28:26', '0000-00-00 00:00:00', 0, 0),
(2, 'Deal', '1500', '0000-00-00', '0000-00-00', 0, 0, 0, '2020-09-28 11:29:17', '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `membership_id` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `confirm_password` varchar(255) NOT NULL,
  `reset_code` varchar(255) NOT NULL,
  `reset_initiated_at` datetime NOT NULL,
  `reset_expired_at` datetime NOT NULL,
  `address` text NOT NULL,
  `address_1` text NOT NULL,
  `state_id` int(11) NOT NULL,
  `city` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `fname`, `lname`, `email`, `mobile`, `membership_id`, `password`, `confirm_password`, `reset_code`, `reset_initiated_at`, `reset_expired_at`, `address`, `address_1`, `state_id`, `city`, `pincode`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Miss Abigail Hansen', 'Miss Abigail Hansen', 'mrshappy1@gmail.com', 'Research', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2357 Ward Circle', '', 1, 'West Clementinaberg', 'JBOD', '2020-07-17 02:25:30', '0000-00-00 00:00:00', 0, 0),
(2, 'Ericka Heller', 'Ericka Heller', 'tuigupiao@gmail.com', 'Somoni', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '7817 Elmira Mission', '', 1, 'West Caleb', 'matrix', '2020-07-20 21:47:44', '0000-00-00 00:00:00', 0, 0),
(3, 'Maybell Klocko', 'Maybell Klocko', 'leannhilton@hiltonmgmt.com', 'XML', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '06064 Kevin Flat', '', 1, 'Kutchfort', 'Optimization', '2020-07-28 17:21:29', '0000-00-00 00:00:00', 0, 0),
(4, 'Keaton Gottlieb', 'Keaton Gottlieb', 'john@canganys.com', 'Slovenia', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '43363 Keeling Plaza', '', 1, 'New Gisselle', 'Electronics', '2020-07-29 08:52:44', '0000-00-00 00:00:00', 0, 0),
(5, 'Isom Hamill', 'Isom Hamill', 'reya_94@yahoo.com', 'wireless', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '56083 Terrell Points', '', 1, 'Agnesfurt', 'Tala', '2020-07-31 04:15:21', '0000-00-00 00:00:00', 0, 0),
(6, 'Robbie Weimann', 'Robbie Weimann', '6789108407@txt.att.net', 'innovate', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '06328 Fahey Port', '', 1, 'Hoegermouth', 'Sleek Cotton Pants', '2020-08-01 01:37:44', '0000-00-00 00:00:00', 0, 0),
(7, 'Omer Farrell', 'Omer Farrell', '6789108407@txt.att.net', 'Handmade', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '556 Cristina Spurs', '', 1, 'Hirammouth', 'connect', '2020-08-02 07:56:08', '0000-00-00 00:00:00', 0, 0),
(8, 'Maybell Lubowitz', 'Maybell Lubowitz', 'marcdo21@hotmail.com', 'Bike', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '64162 Joel Ways', '', 1, 'Lake Minatown', 'Central', '2020-08-06 21:45:12', '0000-00-00 00:00:00', 0, 0),
(9, 'Bulah Beer', 'Bulah Beer', 'info@140zavod.org', 'deposit', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '7665 Zulauf Ways', '', 1, 'Lake Garfield', 'Proactive', '2020-08-12 19:27:02', '0000-00-00 00:00:00', 0, 0),
(10, 'Brandon Barton', 'Brandon Barton', 'mike.gossett@comcast.net', 'logistical', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '99206 Mayert Brook', '', 1, 'Darwinfort', 'Berkshire', '2020-08-14 19:53:40', '0000-00-00 00:00:00', 0, 0),
(11, 'Domenick Ortiz', 'Domenick Ortiz', 'slloyd1@sbcglobal.net', 'Auto Loan Account', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '91417 Melyna Unions', '', 1, 'Danshire', 'Incredible', '2020-08-17 17:10:31', '0000-00-00 00:00:00', 0, 0),
(12, 'Mr. Devante Hilpert', 'Mr. Devante Hilpert', 'dannahodge@aol.com', 'Centers', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '13866 Penelope Curve', '', 1, 'South Mollietown', 'SMTP', '2020-08-18 13:21:59', '0000-00-00 00:00:00', 0, 0),
(13, 'Ahmed Towne', 'Ahmed Towne', 'lannymarkasky@gmail.com', 'Route', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '9219 Block Forges', '', 1, 'East Jerry', 'generating', '2020-08-19 19:23:53', '0000-00-00 00:00:00', 0, 0),
(14, 'Zakary Schultz', 'Zakary Schultz', 'bcjblackston@yahoo.com', 'Arkansas', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '480 Trevor Summit', '', 1, 'Eltonbury', 'sensor', '2020-08-20 14:59:17', '0000-00-00 00:00:00', 0, 0),
(15, 'Reba Fritsch', 'Reba Fritsch', 'phreedom33@gmail.com', 'users', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '19012 Aubree Field', '', 1, 'Larkinton', 'Agent', '2020-08-24 13:19:31', '0000-00-00 00:00:00', 0, 0),
(16, 'Brooklyn Hahn', 'Brooklyn Hahn', 'bethslapp@gmail.com', 'bleeding-edge', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '33747 Rodrick Inlet', '', 1, 'New Ernesto', 'Lodge', '2020-09-03 13:07:00', '0000-00-00 00:00:00', 0, 0),
(17, 'Claudia Ruecker IV', 'Claudia Ruecker IV', 'hdclausen@aol.com', 'multimedia', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '90198 Zemlak Crossroad', '', 1, 'North Ricardoton', 'context-sensitive', '2020-09-15 23:45:26', '0000-00-00 00:00:00', 0, 0),
(18, 'Meda Ernser IV', 'Meda Ernser IV', 'gayliabennett@nemarrealty.com', 'XSS', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '5012 Pagac Motorway', '', 1, 'New Leonorside', 'open system', '2020-09-22 01:55:30', '0000-00-00 00:00:00', 0, 0),
(19, 'Gracie Hessel', 'Gracie Hessel', 'torimorales17@gmail.com', 'Lead', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '226 Darryl Vista', '', 1, 'New Franz', 'Toys', '2020-10-01 12:25:06', '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `newsletter_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`newsletter_id`, `name`, `email`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Saju Ps', 'sajups@yahoo.co.uk', '2020-02-03 13:06:38', '0000-00-00 00:00:00', 0, 0),
(2, 'Aa', 'abc@abc.com', '2020-02-27 19:14:45', '0000-00-00 00:00:00', 0, 0),
(3, 'Janice Schuppe', 'lourdes.reyes5060@gmail.com', '2020-03-02 20:02:09', '0000-00-00 00:00:00', 0, 0),
(4, 'Eusebio Leffler', 'hiphopazn84@hotmail.com', '2020-03-03 14:06:30', '0000-00-00 00:00:00', 0, 0),
(5, 'Roberta Nolan MD', 'info@bromsmovers.com', '2020-03-03 22:28:51', '0000-00-00 00:00:00', 0, 0),
(6, 'Kaleigh Vandervort IV', 'jbmedrano@hotmail.com', '2020-03-04 00:00:41', '0000-00-00 00:00:00', 0, 0),
(7, 'Garrett McDermott IV', 'luisa18morales80@gmail.com', '2020-03-11 12:18:20', '0000-00-00 00:00:00', 0, 0),
(8, 'Berniece Hettinger', 'tontosource@yahoo.com', '2020-03-11 17:49:52', '0000-00-00 00:00:00', 0, 0),
(9, 'Loren Kshlerin', 'breezin81@aol.com', '2020-03-17 15:55:26', '0000-00-00 00:00:00', 0, 0),
(10, 'Meaghan Wilderman', 'jjmooney@bigpond.com', '2020-03-24 18:08:48', '0000-00-00 00:00:00', 0, 0),
(11, 'Kelton Robel', 'kstricklin@gmail.com', '2020-03-30 15:43:24', '0000-00-00 00:00:00', 0, 0),
(12, 'Noemy Reichel', 'rhahn@designworksfurniture.com', '2020-04-01 17:35:05', '0000-00-00 00:00:00', 0, 0),
(13, 'Delmer Johns', 'seproxysoft@yahoo.com', '2020-04-02 18:39:30', '0000-00-00 00:00:00', 0, 0),
(14, 'Julian Paucek V', 'anna.peng@photomugs.com', '2020-04-04 16:30:28', '0000-00-00 00:00:00', 0, 0),
(15, 'Jackson Terry', 'shoponline.casa@gmail.com', '2020-04-06 10:39:55', '0000-00-00 00:00:00', 0, 0),
(16, 'Denis Gaylord', 'diepnguyen152@gmail.com', '2020-05-02 18:37:19', '0000-00-00 00:00:00', 0, 0),
(17, 'Emmanuel Dach PhD', 'jpdomin88@gmail.com', '2020-05-08 03:45:48', '0000-00-00 00:00:00', 0, 0),
(18, 'Abe VonRueden', 'lisahouareau@hotmail.com', '2020-05-11 11:41:58', '0000-00-00 00:00:00', 0, 0),
(19, 'Karina McGlynn', 'snappersmom99@yahoo.com', '2020-05-13 19:00:14', '0000-00-00 00:00:00', 0, 0),
(20, 'Destiny Roberts', 'cbuchanan10@hotmail.co.uk', '2020-05-15 04:18:18', '0000-00-00 00:00:00', 0, 0),
(21, 'Darren Nader', 'kerrykilfoyle@hotmail.co.uk', '2020-05-16 14:17:07', '0000-00-00 00:00:00', 0, 0),
(22, 'Cortney Bosco', 'daveyhazel@aol.co.uk', '2020-05-16 21:48:55', '0000-00-00 00:00:00', 0, 0),
(23, 'Dalton Nicolas', 'a.annromano@yahoo.com', '2020-05-17 12:34:04', '0000-00-00 00:00:00', 0, 0),
(24, 'Cornell Raynor', 'nnmbady@hotmail.com', '2020-05-21 05:33:43', '0000-00-00 00:00:00', 0, 0),
(25, 'Sambath Kumar', 'skr.91778@gmail.com', '2020-05-23 11:32:27', '0000-00-00 00:00:00', 0, 0),
(26, 'Carmela Dickens', 'eloise.barker@hotmail.co.uk', '2020-05-23 18:21:56', '0000-00-00 00:00:00', 0, 0),
(27, 'Adonis O\'Kon II', 'wegotnada@yahoo.com', '2020-05-26 21:35:04', '0000-00-00 00:00:00', 0, 0),
(28, 'Demarcus Kirlin III', 'msego@cs.stanford.edu', '2020-05-28 22:36:57', '0000-00-00 00:00:00', 0, 0),
(29, 'Adam Hand', 'yoyo4eversing@126.com', '2020-06-03 00:37:48', '0000-00-00 00:00:00', 0, 0),
(30, 'Hal Bode', 'info@wohnideenshop.de', '2020-06-03 15:12:29', '0000-00-00 00:00:00', 0, 0),
(31, 'Rossie Corkery', 'tomatsu91@gmail.com', '2020-06-06 09:51:12', '0000-00-00 00:00:00', 0, 0),
(32, 'Margie Sipes', 'lisa_jane1965@yahoo.co.uk', '2020-06-08 05:25:43', '0000-00-00 00:00:00', 0, 0),
(33, 'Dovie Murazik IV', 'prubuliak@yahoo.com', '2020-06-08 06:58:14', '0000-00-00 00:00:00', 0, 0),
(34, 'Garland Swift', 'messnerkyle@ymail.com', '2020-06-12 06:38:12', '0000-00-00 00:00:00', 0, 0),
(35, 'Polly Goodwin', 'annesophiedufresne@hotmail.com', '2020-06-13 19:51:58', '0000-00-00 00:00:00', 0, 0),
(36, 'Miss Reyes Aufderhar', 'jrking7980@yahoo.com', '2020-06-17 10:08:42', '0000-00-00 00:00:00', 0, 0),
(37, 'David Ramsay', 'david.ramsay@trisapgroup.net', '2020-06-22 23:38:54', '0000-00-00 00:00:00', 0, 0),
(38, 'Tia Grant', 'maikelsc42@yahoo.com', '2020-06-25 01:30:28', '0000-00-00 00:00:00', 0, 0),
(39, 'Dalton Reilly', 'jessicabellecourt@gmail.com', '2020-06-27 12:52:39', '0000-00-00 00:00:00', 0, 0),
(40, 'Titus Bergstrom', 'clayspeas6@aol.com', '2020-06-28 05:30:13', '0000-00-00 00:00:00', 0, 0),
(41, 'Dr. Maurine Connelly', 'aboubacarsaibou@yahoo.com', '2020-06-28 11:07:19', '0000-00-00 00:00:00', 0, 0),
(42, 'Cruz Orn', 'elizabeth.simpkins@gmail.com', '2020-07-01 11:10:27', '0000-00-00 00:00:00', 0, 0),
(43, 'Bala', 'samaranbala@gmail.com', '2020-07-02 02:13:35', '0000-00-00 00:00:00', 0, 0),
(44, 'Peggie Bogan', 'plainndpattern@gmail.com', '2020-07-03 02:11:21', '0000-00-00 00:00:00', 0, 0),
(45, 'Mrs. Ubaldo Dickinson', 'fordy9erfan16@msn.com', '2020-07-06 03:32:19', '0000-00-00 00:00:00', 0, 0),
(46, 'Talon Lemke', 'bernardwoods55@yahoo.com', '2020-07-07 12:14:48', '0000-00-00 00:00:00', 0, 0),
(47, 'Santiago Adams', 'enquiries@lizardlabs.eu', '2020-07-09 18:44:46', '0000-00-00 00:00:00', 0, 0),
(48, 'Rae Bogan', 'baileri@aol.com', '2020-07-10 20:15:39', '0000-00-00 00:00:00', 0, 0),
(49, 'Prabhakar', 'prabhakar.pant@sasmos.com', '2020-07-14 15:50:56', '0000-00-00 00:00:00', 0, 0),
(50, 'Cameron Schinner', 'jcarrasco1@hotmail.com', '2020-07-23 08:51:47', '0000-00-00 00:00:00', 0, 0),
(51, 'Chesley Von', 'tracyj65@me.com', '2020-07-27 03:26:10', '0000-00-00 00:00:00', 0, 0),
(52, 'T.m.m.sheik davood', 'tmmnultipack@gmail.com', '2020-08-04 15:22:50', '0000-00-00 00:00:00', 0, 0),
(53, 'Rodrick Lang MD', 'darlenelleo@gmail.com', '2020-08-09 23:10:02', '0000-00-00 00:00:00', 0, 0),
(54, 'Victor Bartell', 'krwhite1056@aol.com', '2020-08-10 02:01:21', '0000-00-00 00:00:00', 0, 0),
(55, 'Miss Freddy Goyette', 'madie_navidad@yahoo.ca', '2020-08-10 21:29:31', '0000-00-00 00:00:00', 0, 0),
(56, 'Karthick nandhini ', 'karthi29687@gmail.com', '2020-08-11 07:05:48', '0000-00-00 00:00:00', 0, 0),
(57, 'Jackie Ritchie', 'leelandsmommie@aol.com', '2020-08-13 04:17:59', '0000-00-00 00:00:00', 0, 0),
(58, 'Gregg King', 'stephynp@gmail.com', '2020-08-16 11:15:29', '0000-00-00 00:00:00', 0, 0),
(59, 'yogesh babu CN ', 'dcenterprises.babu@gmail.com', '2020-08-21 07:30:40', '0000-00-00 00:00:00', 0, 0),
(60, 'Ratheesh vr', 'ratheesh260784@gmail.com', '2020-08-23 11:41:01', '0000-00-00 00:00:00', 0, 0),
(61, 'Margarita Roob', 'sjoy0501@naver.com', '2020-08-25 14:38:28', '0000-00-00 00:00:00', 0, 0),
(62, 'Ryann Howell', 'info@hiltonmgmt.com', '2020-08-29 21:36:37', '0000-00-00 00:00:00', 0, 0),
(63, 'Mollie Graham', '15125684548@mms.cricketwireless.net', '2020-09-01 18:25:17', '0000-00-00 00:00:00', 0, 0),
(64, 'Heath Lehner', 'leannhilton@hotmail.com', '2020-09-01 20:39:53', '0000-00-00 00:00:00', 0, 0),
(65, 'Mr. Vesta Emmerich', 'marlenmagnolia@yahoo.com', '2020-09-02 06:03:56', '0000-00-00 00:00:00', 0, 0),
(66, 'Cesar Miller', 'info@kanzlei-lemme.de', '2020-09-11 09:56:22', '0000-00-00 00:00:00', 0, 0),
(67, 'Preethi', 'info@ghmindia.com', '2020-09-28 11:54:02', '0000-00-00 00:00:00', 0, 0),
(68, 'Ms. Vaughn Kutch', 'mrdaun36@gmail.com', '2020-10-14 04:31:10', '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orders_id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL DEFAULT '',
  `lname` varchar(255) NOT NULL DEFAULT '',
  `alt_mobile` varchar(15) NOT NULL DEFAULT '',
  `quantity` int(11) NOT NULL DEFAULT '1',
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `grand_total` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `state_id` int(11) NOT NULL,
  `city` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `transaction_id` varchar(255) NOT NULL DEFAULT '',
  `delivery_status` varchar(255) NOT NULL DEFAULT 'created',
  `shipped_at` varchar(255) NOT NULL,
  `delivery_at` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orders_id`, `fname`, `lname`, `alt_mobile`, `quantity`, `email`, `mobile`, `grand_total`, `address`, `state_id`, `city`, `pincode`, `transaction_id`, `delivery_status`, `shipped_at`, `delivery_at`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Krishnamurthy', 'Vaidyanathan', '', 1, 'krishna@ghmindia.com', '8409012345', '8000', 'Tirupur', 28, 'Tirupur', '641601', 'pay_DtGsgf4zKYV3GH', 'created', '', '', '2019-12-18 00:41:41', '2019-12-18 00:41:41', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `order_item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_qty` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `grand_total` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `description`, `product_price`, `image_path`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'FRESCHE EF 3851', '<span>FRESCHE EF 3851 is a high performance hospital-grade surface disinfection treatment. Fresche SiQuat advanced microbial control and protection solutions shift the biocidal paradigm in delivery of efficient, long term bacterial, fungal, mould and odour control.</span><div><div><h5><b><font size=\"3\">FOGGING LARGE ENVIRONMENTS</font></b></h5></div><div><p>FRESCHE EF 3851 can be applied to large areas such as operation theatres, ICU, emergency rooms, cool rooms, pipes, drains and walkways, warehouse areas, storage bins, building walls and ceilings. Any person applying FRESCHE EF 3851 must comply with local or industry OHS protection protocols, which may apply.</p><p>Before applying FRESCHE EF 3851 directly all dirt, dust, biofilms mould, fungus or other contaminants must be removed from the surface to be treated, and dried prior to application.</p></div></div>', '0', 'uploads/4bb1bde1f667d50099e79003f4aa0f7b.png', '2019-12-12 06:17:35', '0000-00-00 00:00:00', 0, 0),
(2, 'BZ1 Binder', '<p>Fresche BZ1 is a non-formaldehyde containing polymeric resin used with the Fresche EF3851 antimicrobials to improve durability of anti microbial protection when applied to synthetics, cellulosics, and their blends.</p><p>Fresche BZ1 is pad applied at a 1.0-2.0% level on the weight of bath volume with Fresche antimicrobials. The treated fabric can then be dried and cured with &#34;normal&#34; drying and curing/heat setting temperatures and dwell time consistent with the fabric construction.</p>', '0', 'uploads/53204108ff0ca5444804cfcd2325eea3.png', '2019-12-11 11:31:08', '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sales_mode`
--

CREATE TABLE `sales_mode` (
  `sales_mode_id` int(11) NOT NULL,
  `sales_mode` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL DEFAULT '1',
  `updated_by` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_mode`
--

INSERT INTO `sales_mode` (`sales_mode_id`, `sales_mode`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 1, '2020-10-14 06:45:53', '0000-00-00 00:00:00', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `state_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`state_id`, `name`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Andhra Pradesh', '2019-12-07 08:38:53', '0000-00-00 00:00:00', 1, 1),
(2, 'Arunachal Pradesh', '2019-12-07 08:38:53', '0000-00-00 00:00:00', 1, 1),
(3, 'Assam', '2019-12-07 08:38:53', '0000-00-00 00:00:00', 1, 1),
(4, 'Bihar', '2019-12-07 08:38:53', '0000-00-00 00:00:00', 1, 1),
(5, 'Chhattisgarh', '2019-12-07 08:38:53', '0000-00-00 00:00:00', 1, 1),
(6, 'Dadra and Nagar Haveli', '2019-12-07 08:38:53', '0000-00-00 00:00:00', 1, 1),
(7, 'Daman and Diu', '2019-12-07 08:38:53', '0000-00-00 00:00:00', 1, 1),
(8, 'Delhi', '2019-12-07 08:38:54', '0000-00-00 00:00:00', 1, 1),
(9, 'Goa', '2019-12-07 08:38:54', '0000-00-00 00:00:00', 1, 1),
(10, 'Gujarat', '2019-12-07 08:38:54', '0000-00-00 00:00:00', 1, 1),
(11, 'Haryana', '2019-12-07 08:38:54', '0000-00-00 00:00:00', 1, 1),
(12, 'Himachal Pradesh', '2019-12-07 08:38:54', '0000-00-00 00:00:00', 1, 1),
(13, 'Jammu and Kashmir', '2019-12-07 08:38:54', '0000-00-00 00:00:00', 1, 1),
(14, 'Jharkhand', '2019-12-07 08:38:54', '0000-00-00 00:00:00', 1, 1),
(15, 'Karnataka', '2019-12-07 08:38:54', '0000-00-00 00:00:00', 1, 1),
(16, 'Kerala', '2019-12-07 08:38:54', '0000-00-00 00:00:00', 1, 1),
(17, 'Madhya Pradesh', '2019-12-07 08:38:54', '0000-00-00 00:00:00', 1, 1),
(18, 'Maharashtra', '2019-12-07 08:38:54', '0000-00-00 00:00:00', 1, 1),
(19, 'Manipur', '2019-12-07 08:38:54', '0000-00-00 00:00:00', 1, 1),
(20, 'Meghalaya', '2019-12-07 08:38:54', '0000-00-00 00:00:00', 1, 1),
(21, 'Mizoram', '2019-12-07 08:38:54', '0000-00-00 00:00:00', 1, 1),
(22, 'Nagaland', '2019-12-07 08:38:54', '0000-00-00 00:00:00', 1, 1),
(23, 'Orissa', '2019-12-07 08:38:54', '0000-00-00 00:00:00', 1, 1),
(24, 'Puducherry', '2019-12-07 08:38:54', '0000-00-00 00:00:00', 1, 1),
(25, 'Punjab', '2019-12-07 08:38:54', '0000-00-00 00:00:00', 1, 1),
(26, 'Rajasthan', '2019-12-07 08:38:54', '0000-00-00 00:00:00', 1, 1),
(27, 'Sikkim', '2019-12-07 08:38:54', '0000-00-00 00:00:00', 1, 1),
(28, 'Tamil Nadu', '2019-12-07 08:38:54', '0000-00-00 00:00:00', 1, 1),
(29, 'Telangana', '2019-12-07 08:38:54', '0000-00-00 00:00:00', 1, 1),
(30, 'Tripura', '2019-12-07 08:38:54', '0000-00-00 00:00:00', 1, 1),
(31, 'Uttar Pradesh', '2019-12-07 08:38:54', '0000-00-00 00:00:00', 1, 1),
(32, 'Uttarakhand', '2019-12-07 08:38:54', '0000-00-00 00:00:00', 1, 1),
(33, 'West Bengal', '2019-12-07 08:38:54', '0000-00-00 00:00:00', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `templates`
--

CREATE TABLE `templates` (
  `ID` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `subject` varchar(250) NOT NULL,
  `body_web` text NOT NULL,
  `body_mobile` text NOT NULL,
  `type` varchar(50) NOT NULL,
  `target` varchar(25) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `mail` varchar(200) NOT NULL,
  `mail_name` varchar(200) NOT NULL,
  `cc` varchar(200) NOT NULL,
  `cc_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `templates`
--

INSERT INTO `templates` (`ID`, `name`, `subject`, `body_web`, `body_mobile`, `type`, `target`, `status`, `mail`, `mail_name`, `cc`, `cc_name`) VALUES
(1, 'order_recived', 'Your order details', '<!DOCTYPE html>\r\n<html>\r\n    <head></head>\r\n    <body>\r\n        <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width: 100%; max-width: 800px; margin: 0 auto; border: 1px dotted #0071bc;\">\r\n            <tbody>\r\n                <tr>\r\n                    <td colspan=\"3\" style=\"text-align: center;background-color: #ffffff;border-bottom: 2px solid #0070bd;\">\r\n                        <a href=\"http://ghmindia.com\"><img style=\"width: 30%; max-width: 700px; margin:0 35%;padding: 10px 0px;\" src=\"http://ghmindia.com/images/logo-01.png\" alt=\"image\" /></a>\r\n                    </td>\r\n                </tr>\r\n                <tr>\r\n                    <td colspan=\"3\" style=\"padding: 15px;\">\r\n                        <p>Dear [fname] [lname],</p>\r\n                        <p>Thank\'s for your order #[orders_id] with transaction id [transaction_id]</p>\r\n                        <p>Below are your order details</p>\r\n                        <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width: 100%; max-width: 800px; margin: 0 auto; border: 1px solid #000;\">\r\n                            <tr>\r\n                                <th style=\"border: 1px solid #000; text-align: left;padding: 5px;text-align: center;\">Product</th>\r\n                                <th style=\"border: 1px solid #000; text-align: left;padding: 5px;text-align: center;\">price</th>\r\n                                <th style=\"border: 1px solid #000; text-align: left;padding: 5px;text-align: center;\">Quantity</th>\r\n                                <th style=\"border: 1px solid #000; text-align: left;padding: 5px;text-align: center;\">Total</th>\r\n                                <th style=\"border: 1px solid #000; text-align: left;padding: 5px;text-align: center;\">Grand Total</th>\r\n                            </tr>\r\n                            <tr>\r\n                                <td style=\"border: 1px solid #000;padding: 5px\">\r\n                                    <img style=\"width: 50%; max-width: 700px;margin: 0 25%;\" src=\"http://ghmindia.com/images/product001.png\" alt=\"image\" />\r\n                                    <p style=\"text-align: center;\">Combo Pack</p>\r\n                                </td>\r\n                                <td style=\"border: 1px solid #000;padding: 5px;text-align: center;\">8000</td>\r\n                                <td style=\"border: 1px solid #000;padding: 5px;text-align: center;\">[quantity]</td>\r\n                                <td style=\"border: 1px solid #000;padding: 5px;text-align: center;\">8000</td>\r\n                                <td style=\"border: 1px solid #000;padding: 5px;text-align: center;\">[grand_total]</td>\r\n                            </tr>\r\n                        </table>\r\n\r\n                    </td>\r\n                </tr>\r\n                <tr>\r\n					<td>\r\n						<p>Regards</p>\r\n						<p>Guardian Health Management.</p>\r\n					</td>\r\n                </tr>\r\n                <tr>\r\n                    <td style=\"padding: 15px;background-color: #ffffff;color: #ffffff;width: 33%;border-top: 1px solid #0071bc;\">\r\n                        <a href=\"http://ghmindia.com\"><img style=\"width: 50%; max-width: 700px;\" src=\"http://ghmindia.com/images/logo-01.png\" alt=\"image\" /></a>\r\n                    </td>\r\n\r\n                    <td colspan=\"2\" style=\"padding: 15px; background-color: #fff;border-top: 1px solid #0071bc;\">\r\n                        <div style=\"width: 100%;margin: 0 0 0 55%;\">\r\n                            <a href=\"https://twitter.com/FrescheIndia\" target=\"_blank\"  style=\"float:left; padding: 10px; color: #fff;width: 35px;\"><img style=\"width: 100%;\" src=\"http://ghmindia.com/images/social-icons/twitter.png\" alt=\"image\" /></a>\r\n                            <a href=\"https://www.facebook.com/frescheindia/\" target=\"_blank\"  style=\"float:left;width: 35px;padding: 10px;color: #fff;\"><img style=\"width: 100%;\" src=\"http://ghmindia.com/images/social-icons/facebook.png\" alt=\"image\" /></a>\r\n                            <a href=\"https://www.instagram.com/p/B4jbAoupksk/\" target=\"_blank\"  style=\"float:left; padding: 10px; color: #fff;width: 35px;\"><img style=\"width: 100%;\" src=\"http://ghmindia.com/images/social-icons/instagram.png\" alt=\"image\" /></a>\r\n                            <a href=\"https://www.youtube.com/watch?v=hL0eNG_99HM&feature=youtu.be\" target=\"_blank\"  style=\"float:left;padding: 10px;color: #fff;width: 35px;\"><img style=\"width: 100%;\" src=\"http://ghmindia.com/images/social-icons/youtube.png\" alt=\"image\" /></a>\r\n                        </div>\r\n                    </td>\r\n                </tr>\r\n            </tbody>\r\n        </table>\r\n    </body>\r\n</html>', '<!DOCTYPE html>\r\n<html>\r\n    <head></head>\r\n    <body>\r\n        <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width: 100%; max-width: 800px; margin: 0 auto; border: 1px dotted #0071bc;\">\r\n            <tbody>\r\n                <tr>\r\n                    <td colspan=\"3\" style=\"text-align: center; background-color: #fff;border-bottom: 1px solid #0071bc;\">\r\n                        <a href=\"http://ghmindia.com\"><img style=\"width: 30%; max-width: 700px; margin:0 35%;padding: 10px 0px;\" src=\"http://ghmindia.com/images/logo-01.png\" alt=\"image\" /></a>\r\n                    </td>\r\n                </tr>\r\n                <tr>\r\n                    <td colspan=\"3\" style=\"padding: 15px;\">\r\n                        <p>Dear [fname] [lname],</p>\r\n                        <p>Thank\'s for your order #[orders_id] with transaction id [transaction_id]</p>\r\n                        <p>Below are your order details</p>\r\n                        <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"width: 100%; max-width: 800px; margin: 0 auto; border: 1px solid #000;\">\r\n                            <tr>\r\n                                <th style=\"border: 1px solid #000; text-align: left;padding: 5px;text-align: center;\">Product</th>\r\n                                <th style=\"border: 1px solid #000; text-align: left;padding: 5px;text-align: center;\">price</th>\r\n                                <th style=\"border: 1px solid #000; text-align: left;padding: 5px;text-align: center;\">Quantity</th>\r\n                                <th style=\"border: 1px solid #000; text-align: left;padding: 5px;text-align: center;\">Total</th>\r\n                                <th style=\"border: 1px solid #000; text-align: left;padding: 5px;text-align: center;\">Grand Total</th>\r\n                            </tr>\r\n                            <tr>\r\n                                <td style=\"border: 1px solid #000;padding: 5px\">\r\n                                    <img style=\"width: 50%; max-width: 700px;margin: 0 25%;\" src=\"http://ghmindia.com/images/product001.png\" alt=\"image\" />\r\n                                    <p style=\"text-align: center;\">Combo Pack</p>\r\n                                </td>\r\n                                <td style=\"border: 1px solid #000;padding: 5px;text-align: center;\">8000</td>\r\n                                <td style=\"border: 1px solid #000;padding: 5px;text-align: center;\">1</td>\r\n                                <td style=\"border: 1px solid #000;padding: 5px;text-align: center;\">8000</td>\r\n                                <td style=\"border: 1px solid #000;padding: 5px;text-align: center;\">8000</td>\r\n                            </tr>\r\n                        </table>\r\n\r\n                    </td>\r\n                </tr>\r\n                <tr>\r\n                    <td style=\"padding: 15px\"> Regards: <br/> <strong>Guardian Health Management.</strong></td>\r\n                </tr>\r\n                <tr>\r\n                    <td style=\"padding: 15px;background-color: #ffffff;color: #ffffff;border-top: 1px solid #0071bc;text-align: center;\">\r\n                        <a href=\"http://ghmindia.com\">\r\n                            <img style=\"width: 30%; max-width: 700px;\" src=\"http://ghmindia.com/images/logo-01.png\" alt=\"image\" />\r\n                        </a>\r\n                        <div style=\"position: relative; margin-left: 38%;\">\r\n                            <a href=\"https://twitter.com/FrescheIndia\" target=\"_blank\"  style=\"float:left; padding: 10px; color: #fff;width: 35px;\"><img style=\"width: 100%;\" src=\"http://ghmindia.com/images/social-icons/t.png\" alt=\"image\" /></a>\r\n                            <a href=\"https://www.facebook.com/frescheindia/\" target=\"_blank\"  style=\"float:left;width: 35px;padding: 10px;color: #fff;\"><img style=\"width: 100%;\" src=\"http://ghmindia.com/images/social-icons/f.png\" alt=\"image\" /></a>\r\n                            <a href=\"https://www.instagram.com/p/B4jbAoupksk/\" target=\"_blank\"  style=\"float:left; padding: 10px; color: #fff;width: 35px;\"><img style=\"width: 100%;\" src=\"http://ghmindia.com/images/social-icons/i.png\" alt=\"image\" /></a>\r\n                            <a href=\"https://www.youtube.com/watch?v=hL0eNG_99HM&feature=youtu.be\" target=\"_blank\"  style=\"float:left;padding: 10px;color: #fff;width: 35px;\"><img style=\"width: 100%;\" src=\"http://ghmindia.com/images/social-icons/y.png\" alt=\"image\" /></a>\r\n                        </div>\r\n                    </td>\r\n                </tr>\r\n            </tbody>\r\n        </table>\r\n    </body>\r\n</html>', 'email', 'user', 1, 'noreply@ghmindia.com', 'Guardian Health Management', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `testimonial_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `company` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`testimonial_id`, `name`, `description`, `company`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Mayaprasanna Pillai', 'Fresche  antimicrobial is an agent that can be used for surface hygiene and claims to deliver broad spectrum, high performance surface hygiene in domestic, commercial or industrial manufacturing environments.This  product  was tested in the laboratory.', 'KG Hospital', '2019-11-25 05:25:28', '0000-00-00 00:00:00', 0, 0),
(2, 'SHANKAR M', 'I would like to update you that the we are impressed with the tenure of efficacy of your FRESCHE anti microbial product. We are crossing 6 months and the surface in our 3rd West area is still fungal free and the dust resistant nature of the surface is an added advantage. ', 'Sr. Manager, Housekeeping Department, KMCH Hospital.', '2019-11-25 05:25:56', '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `users_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`coupon_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`newsletter_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orders_id`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`order_item_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `sales_mode`
--
ALTER TABLE `sales_mode`
  ADD PRIMARY KEY (`sales_mode_id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `templates`
--
ALTER TABLE `templates`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`testimonial_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `coupon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `newsletter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orders_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sales_mode`
--
ALTER TABLE `sales_mode`
  MODIFY `sales_mode_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `state_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `templates`
--
ALTER TABLE `templates`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `testimonial_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
