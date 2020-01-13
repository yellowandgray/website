-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2020 at 02:55 PM
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
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `language_id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`language_id`, `name`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'தமிழ்', '1', '2020-01-09 12:59:32', '0000-00-00 00:00:00', 1, 1),
(2, 'English', '1', '2020-01-09 12:58:42', '0000-00-00 00:00:00', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `question_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `name` varchar(500) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `a` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `b` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `c` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `d` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `answer` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `question_no` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`question_id`, `topic_id`, `name`, `a`, `b`, `c`, `d`, `answer`, `question_no`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 3, 'In vaccum all objects fall with', 'same acceleration and heavy bodies reach groud first', 'same acceleration and reach the ground at the same time', 'different acceleratin and reach the ground at different time', 'different acceleration and heavy bodies reach ground first', 'B', 1, '2020-01-13 10:08:45', '0000-00-00 00:00:00', 0, 0),
(2, 3, 'The time of reverberation of a hall can be decreased by', 'having a number of loud speakers', 'opening all windows and doors', 'closing all windows and doors', 'speaking loudly', 'B', 2, '2020-01-13 10:09:37', '0000-00-00 00:00:00', 0, 0),
(3, 4, 'which spectroscopy is used in chemical examination of intersteller space?', 'Microwave spectroscopy', 'Infrared (IR) spectroscopy', 'Raman spectroscopy', 'NMR spectroscopy', 'A', 1, '2020-01-13 10:12:28', '0000-00-00 00:00:00', 0, 0),
(4, 4, 'The Indian Salt Petre is', 'Ammonium nitrate NH4 NO3', 'Sodium Nitrate (Na NO 3  )', 'Potassium Nitrate KNO 3 ', 'Calcium nitrate Ca(NO 3)2', 'C', 2, '2020-01-13 10:14:43', '0000-00-00 00:00:00', 0, 0),
(5, 4, 'The&#160; unit for equivalent conductivity is', 'ohm-1 cm-1', 'ohm -1 cm-2 eq-1', 'ohm-1 cm 2 eq -1', 'S cm -2 eq -1', 'C', 3, '2020-01-13 10:15:56', '0000-00-00 00:00:00', 0, 0),
(6, 4, 'The end product of anaerobic respiration is', 'Acetyl C0-A', 'Ethanol alcohol ', 'Pyruvic acid', 'succinic acid', 'B', 4, '2020-01-13 10:17:49', '0000-00-00 00:00:00', 0, 0),
(7, 5, 'The main constituent of steel in India are', 'Ni and Cu', 'Mn and Cr', 'Fe and Cu', 'Ti and Cr', 'B', 1, '2020-01-13 10:18:45', '0000-00-00 00:00:00', 0, 0),
(8, 5, 'When did the Prime Minister of India inaugrate the country\'s longest rail -cum-road- bridge built over the Brahmaputra river at Bogibeel near Dibrgarh in Assam?', 'On November 25, 2018', 'On December 25,2018', 'On December 10,2018', 'On November 10,2018', 'B', 2, '2020-01-13 10:19:56', '0000-00-00 00:00:00', 0, 0),
(9, 6, 'Golden rice is genetically modified crop. Where the incorporated gene is meant for biosynthesis of', 'Vitamin A', 'Vitamin B', 'Vitamin C', 'Vitamin D', 'A', 1, '2020-01-13 10:21:23', '0000-00-00 00:00:00', 0, 0),
(10, 7, 'Most widely used bioweapon is', 'Bacillus subtilis', 'Vibrio Cholerae', 'Bacilllus anthracis', 'Escherichia coli', 'C', 1, '2020-01-13 10:23:07', '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `student_answer`
--

CREATE TABLE `student_answer` (
  `student_answer_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `year_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer_option` varchar(2) DEFAULT NULL,
  `actual_answer_option` varchar(2) NOT NULL DEFAULT '',
  `is_correct_answer` tinyint(1) NOT NULL DEFAULT '0',
  `is_skipped` tinyint(1) NOT NULL DEFAULT '0',
  `student_register_id` int(11) DEFAULT NULL,
  `answer_attempt` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_answer`
--

INSERT INTO `student_answer` (`student_answer_id`, `language_id`, `year_id`, `topic_id`, `question_id`, `answer_option`, `actual_answer_option`, `is_correct_answer`, `is_skipped`, `student_register_id`, `answer_attempt`, `created_at`, `created_by`, `updated_at`, `updated_by`, `status`) VALUES
(1, 1, 1, 1, 5, 'A', 'D', 0, 0, 2, NULL, NULL, NULL, NULL, NULL, 1),
(2, 1, 1, 2, 7, 'A', 'D', 0, 0, 2, NULL, NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_register`
--

CREATE TABLE `student_register` (
  `student_register_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `profile_image` varchar(255) NOT NULL DEFAULT '',
  `gender` varchar(255) NOT NULL,
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

INSERT INTO `student_register` (`student_register_id`, `user_name`, `student_name`, `profile_image`, `gender`, `parent_name`, `mobile`, `city`, `pin`, `school_name`, `standard`, `password`, `confirm_password`, `email`, `status`, `block_reason`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(2, 'aumak7639', 'Umasekar', 'uploads/d62d22d81749b72dee2fb52b766cec2e.jpg', 'male', 'Arumugam', '7639600998', 'Chennai', '600073', 'School Name, Chennai', '10th-State-Board', '123456', '123456', 'umasekar098@gmail.com', 1, '', '2020-01-08 09:50:08', '0000-00-00 00:00:00', 0, 0),
(3, 'mushaqdeen@yahoo.co.in', 'Mushaqdeen', 'uploads/179c36531b49e4c6b18c661ab398f040.jpg', 'male', 'Jalaludeen', '9884794962', 'Chennai', '600041', 'Yellow and Gray', '10th-State-Board', '123456', '123456', '', 1, '', '2020-01-08 09:50:15', '0000-00-00 00:00:00', 0, 0),
(12, 'Umasekar', 'umasekar', 'uploads/60688cb1571499308a585de69136d055.jpg', 'male', 'Arumugam', '7639600998', 'Chennai', '600073', 'Yellowandgray', '10th-State-Board', '123456', '123456', '', 1, '', '2020-01-11 06:03:47', '0000-00-00 00:00:00', 0, 0);

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
(5, 'Group 4 (தமிழ்)', 'uploads/2ca601296c63b44b114c1e96b13acf7e.png', '<span>Lorem Ipsum is simply dummy text of the printing.</span>', '2019-12-24 07:26:18', '0000-00-00 00:00:00', 1, 1),
(6, 'SOCIAL SCIENCE', 'uploads/2ca601296c63b44b114c1e96b13acf7e.png', '<span>Lorem Ipsum is simply dummy text of the printing.</span>', '2020-01-02 07:55:04', '0000-00-00 00:00:00', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `topic`
--

CREATE TABLE `topic` (
  `topic_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `year_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topic`
--

INSERT INTO `topic` (`topic_id`, `language_id`, `year_id`, `name`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(3, 1, 1, 'Topic Physics', '2020-01-13 09:50:00', '0000-00-00 00:00:00', 0, 0),
(4, 1, 1, 'Topic Chemistry', '2020-01-13 09:50:15', '0000-00-00 00:00:00', 0, 0),
(5, 1, 2, 'Topic Politics', '2020-01-13 12:41:47', '0000-00-00 00:00:00', 0, 0),
(6, 1, 2, 'Topic Biology', '2020-01-13 12:41:51', '0000-00-00 00:00:00', 0, 0),
(7, 1, 2, 'Topic General', '2020-01-13 12:41:53', '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `year`
--

CREATE TABLE `year` (
  `year_id` int(11) NOT NULL,
  `year` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL DEFAULT '1',
  `updated_by` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `year`
--

INSERT INTO `year` (`year_id`, `year`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, '2018-2019', 1, '2020-01-13 09:49:33', '0000-00-00 00:00:00', 1, 1),
(2, '2019-2020', 1, '2020-01-13 11:59:10', '0000-00-00 00:00:00', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`language_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `student_answer`
--
ALTER TABLE `student_answer`
  ADD PRIMARY KEY (`student_answer_id`);

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
-- Indexes for table `year`
--
ALTER TABLE `year`
  ADD PRIMARY KEY (`year_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `language_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `student_answer`
--
ALTER TABLE `student_answer`
  MODIFY `student_answer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student_register`
--
ALTER TABLE `student_register`
  MODIFY `student_register_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `topic`
--
ALTER TABLE `topic`
  MODIFY `topic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `year`
--
ALTER TABLE `year`
  MODIFY `year_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
