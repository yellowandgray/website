-- phpMyAdmin SQL Dump
-- version 2.11.11.3
-- http://www.phpmyadmin.net
--
-- Host: 166.62.8.3
-- Generation Time: Mar 03, 2020 at 10:12 PM
-- Server version: 5.5.51
-- PHP Version: 5.1.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `threelevel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` VALUES(1, 'admin', 'admin', 'Umasekar', '2020-02-07 02:01:06', '0000-00-00 00:00:00', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `banner_id` int(11) NOT NULL AUTO_INCREMENT,
  `image_path` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `sub_title` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`banner_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` VALUES(2, 'uploads/b59bc26cb8735e2792a782b1520e1539.jpg', 'Banner Title', 'Sub Title', 'active', '2020-02-07 02:01:25', '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `config_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `value` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`config_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `config`
--

INSERT INTO `config` VALUES(1, 'delivery_charge', '10', '', '2020-03-03 04:16:21', '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cooldrink`
--

CREATE TABLE `cooldrink` (
  `cooldrink_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `amount` varchar(255) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `unit_no` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `imageurl` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(1) NOT NULL,
  `updated_by` int(1) NOT NULL,
  PRIMARY KEY (`cooldrink_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `cooldrink`
--

INSERT INTO `cooldrink` VALUES(1, 'காளிமார்க் பொவொண்டோ 500ML', '35', 1, 0, 1, 'uploads/50a9e99fd77e33d780bc1b9f54ea248f.png', '2020-03-02 23:16:00', '0000-00-00 00:00:00', 0, 0);
INSERT INTO `cooldrink` VALUES(2, 'தண்ணீர் பாட்டில்', '20', 1, 0, 1, 'uploads/120bae293578ec20fc092c8477c17f5d.jpg', '2020-03-02 23:16:05', '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `delivery_boy`
--

CREATE TABLE `delivery_boy` (
  `delivery_boy_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `imageurl` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`delivery_boy_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `delivery_boy`
--

INSERT INTO `delivery_boy` VALUES(1, 'Umasekar', 'Arumugam', 'aumak7639', '123456', 'uploads/316be3fdb39e417b1515a02439782fb4.png', '7639600998', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `delivery_pincode`
--

CREATE TABLE `delivery_pincode` (
  `delivery_pincode_id` int(11) NOT NULL AUTO_INCREMENT,
  `pincode` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`delivery_pincode_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `delivery_pincode`
--

INSERT INTO `delivery_pincode` VALUES(1, '621805', 1, '2020-03-01 07:32:28', '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `fooditem`
--

CREATE TABLE `fooditem` (
  `fooditem_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `amount` varchar(255) NOT NULL,
  `unit_id` int(255) NOT NULL,
  `unit_no` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `imageurl` varchar(255) NOT NULL,
  `banner_status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`fooditem_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=60 ;

--
-- Dumping data for table `fooditem`
--

INSERT INTO `fooditem` VALUES(2, 'பழங்கள்', '20', 4, 1, 1, 'uploads/e55fdc976023dc67fda3749645d7370d.jpg', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0);
INSERT INTO `fooditem` VALUES(3, 'பர்கர்', '30', 3, 1, 1, 'uploads/e21cc5dcdb837e92b030c6bf236b3673.jpg', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0);
INSERT INTO `fooditem` VALUES(4, 'திராட்சை', '80', 4, 1, 1, 'uploads/931f05103fe8bcf335172b8142c1aaa0.jpg', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0);
INSERT INTO `fooditem` VALUES(5, 'செட்டிநாடு சிக்கன்', '130', 3, 1, 1, 'uploads/food5.jpg', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0);
INSERT INTO `fooditem` VALUES(9, 'முட்டை', '20', 3, 1, 1, 'uploads/food6.jpg', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0);
INSERT INTO `fooditem` VALUES(8, 'ஈரல் ஃப்ரை', '120', 3, 1, 1, 'uploads/food7.jpg', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0);
INSERT INTO `fooditem` VALUES(10, 'பிஸ்ஸா ஹட்', '110', 3, 1, 1, 'uploads/food8.jpg', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0);
INSERT INTO `fooditem` VALUES(11, 'குழம்பு', '130', 1, 1, 1, 'uploads/food9.jpg', 0, '2019-11-12 03:04:16', '0000-00-00 00:00:00', 0, 0);
INSERT INTO `fooditem` VALUES(55, 'கோழி தந்தூரி', '150', 3, 1, 1, 'uploads/food10.jpg', 0, '2019-11-29 00:29:44', '0000-00-00 00:00:00', 0, 0);
INSERT INTO `fooditem` VALUES(57, 'சமோசா', '10', 2, 1, 1, 'uploads/baf09019f9bc66a6b1c0145cdaa11bc1.jpg', 1, '2020-01-23 02:15:03', '0000-00-00 00:00:00', 0, 0);
INSERT INTO `fooditem` VALUES(58, 'பிரியாணி', '120', 4, 1, 1, 'uploads/f49a90f5598eacffbd5f3deb1bd0be29.jpg', 0, '2020-01-23 02:19:17', '0000-00-00 00:00:00', 0, 0);
INSERT INTO `fooditem` VALUES(59, 'பானி பூரி', '25', 2, 1, 1, 'uploads/3972e12cd740bd7c5fa4123cb8621b0a.jpg', 1, '2020-02-27 23:55:13', '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '1-New, 2-Shipped, 3-Delivered',
  `delivery_charge` float(12,2) NOT NULL,
  `address` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `delivery_boy_id` int(11) NOT NULL DEFAULT '0',
  `total` float(12,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--


-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `order_item_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `amount` float(12,2) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `unit_no` int(11) NOT NULL,
  `type` varchar(15) NOT NULL DEFAULT 'food',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `name` varchar(255) NOT NULL,
  `imageurl` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`order_item_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `order_item`
--


-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `unit_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`unit_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` VALUES(1, 'Cup', 'active', '2020-01-21 22:48:58', '0000-00-00 00:00:00', 0, 0);
INSERT INTO `unit` VALUES(2, 'Set', 'active', '2020-01-21 22:49:21', '0000-00-00 00:00:00', 0, 0);
INSERT INTO `unit` VALUES(3, 'No', 'active', '2020-01-21 22:49:35', '0000-00-00 00:00:00', 0, 0);
INSERT INTO `unit` VALUES(4, 'KG', 'active', '2020-01-21 22:49:43', '0000-00-00 00:00:00', 0, 0);
INSERT INTO `unit` VALUES(5, 'ltr', 'active', '2020-01-21 22:50:10', '0000-00-00 00:00:00', 0, 0);
INSERT INTO `unit` VALUES(6, 'gram', 'active', '2020-01-21 23:21:39', '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `imageurl` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` VALUES(1, 'aruk', '+919047841104', '5A Rads Green Garden Ponniamman KOIL First cross Gandhi Nagar Vengaivasal Chennai 6000126', '621805', '', '2020-03-02 02:07:16', 0, '0000-00-00 00:00:00', 0);
