-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2019 at 10:31 AM
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
-- Database: `fresche`
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
(1, 'Home Banner', 'uploads/c0fa70549901d883eecd19d912b5e50c.jpg', '2019-12-05 10:53:59', '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
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

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orders_id` int(11) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `member_id` int(11) NOT NULL,
  `address` text NOT NULL,
  `state_id` int(11) NOT NULL,
  `city` varchar(255) NOT NULL,
  `delivery_status` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `order_item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product` varchar(255) NOT NULL,
  `product_qty` varchar(255) NOT NULL,
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
(1, 'test', 'test', 'tet', 'uploads/3e46a328dfe4f67aebf7091be64bc26e.jpg', '2019-12-05 06:40:47', '0000-00-00 00:00:00', 0, 0);

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
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`);

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
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`state_id`);

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
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orders_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `state_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

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
