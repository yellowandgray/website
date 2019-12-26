-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2019 at 06:44 AM
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
-- Database: `mekana`
--

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `question_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `a` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `b` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `c` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `d` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `answer` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`question_id`, `subject_id`, `topic_id`, `name`, `a`, `b`, `c`, `d`, `answer`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 1, 1, 'test', 'test', 'test', 'est', 'test', 'a', '2019-12-23 10:12:50', '0000-00-00 00:00:00', 0, 0),
(2, 4, 1, 'India partition year?<br><br>', '1945', '1946', '1947', '1948', 'c', '2019-12-24 07:31:15', '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `student_register`
--

CREATE TABLE `student_register` (
  `student_register_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `parent_name` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `pin` varchar(255) NOT NULL,
  `school_name` varchar(255) NOT NULL,
  `standard` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `confirm_password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `block_reason` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_register`
--

INSERT INTO `student_register` (`student_register_id`, `user_name`, `student_name`, `parent_name`, `mobile`, `city`, `pin`, `school_name`, `standard`, `password`, `confirm_password`, `email`, `status`, `block_reason`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(2, 'aumak7639', 'Umasekar', 'Arumugam', '7639600998', 'Chennai', '600073', 'YG', '10th-State-Board', '123456', '123456', 'umasekar098@gmail.com', 1, '', '2019-12-19 13:32:57', '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `description` varchar(500) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `name`, `image_path`, `description`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'தமிழ்', 'uploads/e2f00f87f1c423318196f629b4f35635.png', '<span>Lorem Ipsum is simply dummy text of the printing.</span>', '2019-12-24 06:05:36', '0000-00-00 00:00:00', 1, 1),
(2, 'English', 'uploads/6bd0006c70ea421b1c2d61fe7833b6f8.png', '<span>Lorem Ipsum is simply dummy text of the printing.</span>', '2019-12-24 06:05:47', '0000-00-00 00:00:00', 1, 1),
(3, 'Maths', 'uploads/6c5717bea3ae27741bdd6f89819f276f.png', '<span>Lorem Ipsum is simply dummy text of the printing.</span>', '2019-12-24 06:05:54', '0000-00-00 00:00:00', 1, 1),
(4, 'Group 1(தமிழ்)', 'uploads/1c171cff6e5c29d390e8c04838317ff4.png', '<span>Lorem Ipsum is simply dummy text of the printing.</span>', '2019-12-24 07:25:59', '0000-00-00 00:00:00', 1, 1),
(5, 'Group 4 (தமிழ்)', 'uploads/2ca601296c63b44b114c1e96b13acf7e.png', '<span>Lorem Ipsum is simply dummy text of the printing.</span>', '2019-12-24 07:26:18', '0000-00-00 00:00:00', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `topic`
--

CREATE TABLE `topic` (
  `topic_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topic`
--

INSERT INTO `topic` (`topic_id`, `subject_id`, `name`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 4, 'History', '2019-12-24 07:27:00', '0000-00-00 00:00:00', 1, 1),
(2, 2, 'Topic 2', '2019-12-20 12:30:00', '0000-00-00 00:00:00', 1, 1),
(3, 3, 'Topic 3', '2019-12-20 12:30:11', '0000-00-00 00:00:00', 1, 1),
(4, 4, 'Topic 4', '2019-12-20 12:30:26', '0000-00-00 00:00:00', 1, 1),
(5, 5, 'Topic 5', '2019-12-20 12:30:52', '0000-00-00 00:00:00', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `student_register`
--
ALTER TABLE `student_register`
  ADD PRIMARY KEY (`student_register_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`topic_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_register`
--
ALTER TABLE `student_register`
  MODIFY `student_register_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `topic`
--
ALTER TABLE `topic`
  MODIFY `topic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
