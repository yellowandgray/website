-- phpMyAdmin SQL Dump
-- version 2.11.11.3
-- http://www.phpmyadmin.net
--
-- Host: 166.62.8.38
-- Generation Time: Feb 05, 2020 at 01:59 AM
-- Server version: 5.5.51
-- PHP Version: 5.1.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `schoolrunner`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` VALUES(1, 'School Runner Admin', 'admin', 'admin', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `class_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`class_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `class`
--

INSERT INTO `class` VALUES(1, 'PKG', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1);
INSERT INTO `class` VALUES(2, 'LKG', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1);
INSERT INTO `class` VALUES(3, 'UKG', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1);
INSERT INTO `class` VALUES(4, 'I', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1);
INSERT INTO `class` VALUES(5, 'II', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1);
INSERT INTO `class` VALUES(6, 'III', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1);
INSERT INTO `class` VALUES(7, 'IV', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1);
INSERT INTO `class` VALUES(8, 'V', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1);
INSERT INTO `class` VALUES(9, 'VI', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1);
INSERT INTO `class` VALUES(10, 'VII', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1);
INSERT INTO `class` VALUES(11, 'VIII', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1);
INSERT INTO `class` VALUES(12, 'IX', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1);
INSERT INTO `class` VALUES(13, 'X', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `enquiry_count`
--

CREATE TABLE `enquiry_count` (
  `enquiry_count_id` int(11) NOT NULL AUTO_INCREMENT,
  `year_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `class_id` int(11) NOT NULL,
  `count` tinyint(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`enquiry_count_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `enquiry_count`
--

INSERT INTO `enquiry_count` VALUES(1, 1, '2020-02-04', 1, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0);
INSERT INTO `enquiry_count` VALUES(2, 2, '2020-02-04', 2, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0);
INSERT INTO `enquiry_count` VALUES(3, 1, '2020-02-04', 1, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0);
INSERT INTO `enquiry_count` VALUES(4, 3, '2020-02-04', 4, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0);
INSERT INTO `enquiry_count` VALUES(5, 1, '2020-02-05', 1, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0);
INSERT INTO `enquiry_count` VALUES(6, 2, '2020-02-05', 1, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `inquiry_form`
--

CREATE TABLE `inquiry_form` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name_student` varchar(255) NOT NULL,
  `name_father` varchar(255) NOT NULL,
  `name_mother` varchar(255) NOT NULL,
  `occupation` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `admission` varchar(255) NOT NULL,
  `wfrom` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact_no` varchar(255) NOT NULL,
  `why_mekana` varchar(255) NOT NULL,
  `type_day` varchar(255) NOT NULL,
  `came_know_mekana` varchar(255) NOT NULL,
  `expect_school` text NOT NULL,
  `student_van` varchar(255) NOT NULL,
  `father_smart_phone` varchar(255) NOT NULL,
  `father_net_connection` varchar(255) NOT NULL,
  `mother_smart_phone` varchar(255) NOT NULL,
  `mother_net_connection` varchar(255) NOT NULL,
  `stuent_cell_phone` varchar(255) NOT NULL,
  `what_purpose` varchar(255) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `inquiry_form`
--

INSERT INTO `inquiry_form` VALUES(1, 'Arul', 'Martin', 'Mary', 'Farmer', 'Male', '2020-02-04', '1std', 'test', 'Vpet', '9047841104', '', '', '', '', '', '', '', '', '', '', '', '', '2020-01-29 23:53:38', '', '0000-00-00 00:00:00');
INSERT INTO `inquiry_form` VALUES(6, 'VIJAY', 'Mary', 'Franklin', 'Doctor', 'Male', '2018-01-17', 'STD 2', '', 'vpet', '9962466752', '', '', '', '', '', '', '', '', '', '', '', '', '2020-01-30 02:54:58', '', '0000-00-00 00:00:00');
INSERT INTO `inquiry_form` VALUES(7, 'ayya', 'vith', 'mur', 'sw', 'Male', '2012-03-08', 'STD 1', '', 'koranadu', '9003239832', '', '', '', '', '', '', '', '', '', '', '', '', '2020-01-30 05:44:45', '', '0000-00-00 00:00:00');
INSERT INTO `inquiry_form` VALUES(8, 'Umasekar', 'Arumugam', 'Kaliamml', 'Job', 'male', '1993-06-07', '10th', 'Karaikudi', 'Sembakkam', '7639600998', 'education', 'full-moon', 'totally_new', 'YG', 'no', 'android', 'yes', 'android', 'no', 'no', 'study', '', '2020-02-04 06:28:51', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `id` int(11) NOT NULL,
  `notices` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `isfile` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` VALUES(1, 'test1', '22/1/1991', '1', '');
INSERT INTO `notice` VALUES(2, 'test2', '30/01/2020', '1', '');

-- --------------------------------------------------------

--
-- Table structure for table `year`
--

CREATE TABLE `year` (
  `year_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`year_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `year`
--

INSERT INTO `year` VALUES(1, '17-18', 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1);
INSERT INTO `year` VALUES(2, '18-19', 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0);
INSERT INTO `year` VALUES(3, '19-20', 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0);
INSERT INTO `year` VALUES(4, '20-21', 'active', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0);
