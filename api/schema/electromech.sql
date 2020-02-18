-- phpMyAdmin SQL Dump
-- version 2.11.11.3
-- http://www.phpmyadmin.net
--
-- Host: 166.62.8.52
-- Generation Time: Feb 18, 2020 at 03:49 AM
-- Server version: 5.5.51
-- PHP Version: 5.1.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `electromech`
--

-- --------------------------------------------------------

--
-- Table structure for table `electromech_category`
--

CREATE TABLE `electromech_category` (
  `electromech_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `electromech_product_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`electromech_category_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `electromech_category`
--

INSERT INTO `electromech_category` VALUES(1, 2, 'FLAME TUBE', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0);
INSERT INTO `electromech_category` VALUES(2, 3, 'Fan', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0);
INSERT INTO `electromech_category` VALUES(3, 4, 'Bush', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0);
INSERT INTO `electromech_category` VALUES(4, 3, 'Rod', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0);
INSERT INTO `electromech_category` VALUES(5, 5, 'Gearbox', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0);
INSERT INTO `electromech_category` VALUES(6, 6, 'Pump', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0);
INSERT INTO `electromech_category` VALUES(7, 7, 'Screw', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0);
INSERT INTO `electromech_category` VALUES(8, 8, 'Vessel', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0);
INSERT INTO `electromech_category` VALUES(9, 10, 'screw shaft and troughs', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0);
INSERT INTO `electromech_category` VALUES(10, 11, 'Liner and Ploughshare', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0);
INSERT INTO `electromech_category` VALUES(11, 12, 'Stuffing box and Gearbox', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0);
INSERT INTO `electromech_category` VALUES(12, 13, 'Oil level and Impeller', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0);
INSERT INTO `electromech_category` VALUES(13, 14, 'Check that all openings are closed', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0);
INSERT INTO `electromech_category` VALUES(14, 15, 'Cylinder', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `electromech_floor`
--

CREATE TABLE `electromech_floor` (
  `electromech_floor_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT '1',
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`electromech_floor_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `electromech_floor`
--

INSERT INTO `electromech_floor` VALUES(2, '2nd Floor', NULL, 1, NULL, 1);
INSERT INTO `electromech_floor` VALUES(3, '3rd Floor', NULL, 1, NULL, 1);
INSERT INTO `electromech_floor` VALUES(4, '4th Floor', NULL, 1, NULL, 1);
INSERT INTO `electromech_floor` VALUES(5, '5th Floor', NULL, 1, NULL, 1);
INSERT INTO `electromech_floor` VALUES(6, '6th Floor', NULL, 1, NULL, 1);
INSERT INTO `electromech_floor` VALUES(7, '1st Floor', NULL, 1, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `electromech_product`
--

CREATE TABLE `electromech_product` (
  `electromech_product_id` int(11) NOT NULL AUTO_INCREMENT,
  `floor_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '',
  `image_path` varchar(255) NOT NULL,
  `manufacturing` varchar(255) NOT NULL,
  `name_plate_date` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT '1',
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`electromech_product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `electromech_product`
--

INSERT INTO `electromech_product` VALUES(2, 2, 'Furnace', 'uploads/87a9345f6951a2bc5e8c0a127b42c4ad.jpg', 'Cummins', 'Data here ', NULL, 1, NULL, 1);
INSERT INTO `electromech_product` VALUES(3, 2, 'Burner', 'uploads/975476b9c3246b2dbf26f50aabfa903e.jpg', 'Cummins', '', NULL, 1, NULL, 1);
INSERT INTO `electromech_product` VALUES(4, 2, 'Burner Combustion Air Fan', 'uploads/9380dfd8ef82f6b360c23b9199db4ae0.jpg', 'DAILY  INSPECTION MAINTENANCE RECORD', '22', NULL, 1, NULL, 1);
INSERT INTO `electromech_product` VALUES(5, 2, 'DRYER DRUM', '', 'AAG', '250', NULL, 1, NULL, 1);
INSERT INTO `electromech_product` VALUES(6, 2, 'Burner diesel Pump', '', 'KRAL', '0.55', NULL, 1, NULL, 1);
INSERT INTO `electromech_product` VALUES(7, 2, 'Recycle screw conveyor', '', 'US FILTER-', '18.5', NULL, 1, NULL, 1);
INSERT INTO `electromech_product` VALUES(8, 2, 'Transporter Product 1', '', 'Noltec', '', NULL, 1, NULL, 1);
INSERT INTO `electromech_product` VALUES(9, 3, 'Transporter Product 2', '', 'Noltec', '', NULL, 1, NULL, 1);
INSERT INTO `electromech_product` VALUES(10, 3, 'Wet Material dosing screw conveyor', '', 'Asdor', '5.5', NULL, 1, NULL, 1);
INSERT INTO `electromech_product` VALUES(11, 3, 'Mixer', '', 'EMT', '90', NULL, 1, NULL, 1);
INSERT INTO `electromech_product` VALUES(12, 3, 'Recycle Dosing screw', '', 'Asdor', '15', NULL, 1, NULL, 1);
INSERT INTO `electromech_product` VALUES(13, 3, 'Saturator Exhaust', '', 'EVG', '45', NULL, 1, NULL, 1);
INSERT INTO `electromech_product` VALUES(14, 3, 'RTO Stack', '', 'LTB', '', NULL, 1, NULL, 1);
INSERT INTO `electromech_product` VALUES(15, 2, 'Mixer discharge gate', '', '', '', NULL, 1, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `electromech_product_code`
--

CREATE TABLE `electromech_product_code` (
  `electromech_product_code_id` int(11) NOT NULL AUTO_INCREMENT,
  `electromech_train_id` int(11) NOT NULL,
  `electromech_product_id` int(11) NOT NULL DEFAULT '0',
  `code` varchar(255) NOT NULL DEFAULT '',
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT '1',
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`electromech_product_code_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `electromech_product_code`
--

INSERT INTO `electromech_product_code` VALUES(1, 2, 2, '727 M 5001', NULL, 1, NULL, 1);
INSERT INTO `electromech_product_code` VALUES(2, 4, 2, '727 M 5002', NULL, 1, NULL, 1);
INSERT INTO `electromech_product_code` VALUES(3, 4, 5, '726M1002', NULL, 1, NULL, 1);
INSERT INTO `electromech_product_code` VALUES(4, 2, 5, '726M1001', NULL, 1, NULL, 1);
INSERT INTO `electromech_product_code` VALUES(5, 5, 5, '726M1003', NULL, 1, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `electromech_product_enquiry_list`
--

CREATE TABLE `electromech_product_enquiry_list` (
  `electromech_product_enquiry_list_id` int(11) NOT NULL AUTO_INCREMENT,
  `enquiry_list` varchar(500) NOT NULL DEFAULT '',
  `electromech_product_id` int(11) NOT NULL,
  `electromech_schedule_id` int(11) NOT NULL DEFAULT '0',
  `electromech_category_id` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT '1',
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`electromech_product_enquiry_list_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `electromech_product_enquiry_list`
--

INSERT INTO `electromech_product_enquiry_list` VALUES(1, 'Visual Inspection and conduct external cleaning of equipment', 2, 1, 1, '2020-02-11 17:06:21', 1, '2020-02-11 17:06:24', 1);
INSERT INTO `electromech_product_enquiry_list` VALUES(2, 'Check all components of the mechanical equipment', 2, 1, 1, NULL, 1, NULL, 1);
INSERT INTO `electromech_product_enquiry_list` VALUES(3, 'Check and inspect for heat and piping leaks', 2, 1, 1, NULL, 1, NULL, 1);
INSERT INTO `electromech_product_enquiry_list` VALUES(6, 'General inspection', 15, 2, 14, NULL, 1, NULL, 1);
INSERT INTO `electromech_product_enquiry_list` VALUES(7, 'Check gear box oil level', 5, 3, 0, NULL, 1, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `electromech_product_enquiry_log`
--

CREATE TABLE `electromech_product_enquiry_log` (
  `electromech_product_enquiry_log_id` int(11) NOT NULL AUTO_INCREMENT,
  `electromech_product_enquiry_list_id` int(11) NOT NULL DEFAULT '0',
  `electromech_staff_id` int(11) NOT NULL DEFAULT '0',
  `electromech_floor_id` int(11) NOT NULL DEFAULT '0',
  `enquiry_list` varchar(500) NOT NULL DEFAULT '',
  `electromech_schedule_id` int(11) NOT NULL DEFAULT '0',
  `electromech_train_id` int(11) NOT NULL DEFAULT '0',
  `enquiry_status` tinyint(1) NOT NULL DEFAULT '1',
  `enquiry_failure_comment` varchar(255) NOT NULL DEFAULT '',
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT '1',
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`electromech_product_enquiry_log_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `electromech_product_enquiry_log`
--


-- --------------------------------------------------------

--
-- Table structure for table `electromech_schedule`
--

CREATE TABLE `electromech_schedule` (
  `electromech_schedule_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT '1',
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`electromech_schedule_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `electromech_schedule`
--

INSERT INTO `electromech_schedule` VALUES(1, 'Daily', '2020-02-08 00:00:00', 1, '2020-02-08 00:00:00', 1);
INSERT INTO `electromech_schedule` VALUES(2, 'Weekly', '2020-02-11 17:15:56', 1, '2020-02-11 17:15:58', 1);
INSERT INTO `electromech_schedule` VALUES(3, 'Monthly', '2020-02-11 17:17:18', 1, '2020-02-11 17:17:20', 1);

-- --------------------------------------------------------

--
-- Table structure for table `electromech_staff`
--

CREATE TABLE `electromech_staff` (
  `electromech_staff_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `mobile` varchar(15) NOT NULL DEFAULT '',
  `imageurl` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT '1',
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) NOT NULL DEFAULT '1',
  `username` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(500) NOT NULL DEFAULT '',
  `role` varchar(10) NOT NULL DEFAULT '',
  PRIMARY KEY (`electromech_staff_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `electromech_staff`
--

INSERT INTO `electromech_staff` VALUES(1, 'Pandiyaraj', '86967622', 'uploads/7a7adde7dd8573e6a07f5fe66b24a8e3.png', NULL, 1, NULL, 1, 'Pandi', '12345', 'Staff');
INSERT INTO `electromech_staff` VALUES(3, 'Mahendran', '98686202', '', NULL, 1, NULL, 1, 'Maha', '12345', 'Staff');
INSERT INTO `electromech_staff` VALUES(4, 'Arul', '1234567899', '', '2020-02-18 14:51:07', 1, '2020-02-18 14:51:12', 1, 'arulyg', '123456', 'supervisor');

-- --------------------------------------------------------

--
-- Table structure for table `electromech_staff_login`
--

CREATE TABLE `electromech_staff_login` (
  `electromech_staff_login_id` int(11) NOT NULL,
  `electromech_train_id` int(11) NOT NULL,
  `electromech_floor_id` int(11) NOT NULL,
  `electromech_schedule_id` int(11) NOT NULL,
  `electromech_staff_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`electromech_staff_login_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `electromech_staff_login`
--


-- --------------------------------------------------------

--
-- Table structure for table `electromech_train`
--

CREATE TABLE `electromech_train` (
  `electromech_train_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT '1',
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`electromech_train_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `electromech_train`
--

INSERT INTO `electromech_train` VALUES(2, 'Train 1', NULL, 1, NULL, 1);
INSERT INTO `electromech_train` VALUES(4, 'Train 2', NULL, 1, NULL, 1);
INSERT INTO `electromech_train` VALUES(5, 'Train 3', NULL, 1, NULL, 1);
INSERT INTO `electromech_train` VALUES(6, 'Train 4', NULL, 1, NULL, 1);
INSERT INTO `electromech_train` VALUES(7, 'Train 5', NULL, 1, NULL, 1);
INSERT INTO `electromech_train` VALUES(8, 'Common service', NULL, 1, NULL, 1);
