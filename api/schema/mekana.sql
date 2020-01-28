-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2020 at 10:55 AM
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
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `admin_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`admin_id`, `name`, `user_name`, `password`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Exam Horse Admin', 'admin', 'admin', '2020-01-28 09:45:48', '0000-00-00 00:00:00', 1, 1);

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
(1, 'தமிழ்', '1', '2020-01-25 05:39:15', '0000-00-00 00:00:00', 1, 1),
(2, 'English', '1', '2020-01-25 05:39:15', '0000-00-00 00:00:00', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `question_id` int(11) NOT NULL,
  `year_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `name` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `image_path` varchar(500) NOT NULL DEFAULT '',
  `direction` varchar(10) NOT NULL DEFAULT '',
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

INSERT INTO `question` (`question_id`, `year_id`, `topic_id`, `name`, `image_path`, `direction`, `a`, `b`, `c`, `d`, `answer`, `question_no`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 2, 3, '<font face=\"Arial\" size=\"3\">&#2965;&#3008;&#2996;&#3021;&#2965;&#2979;&#3021;&#2975;&#2997;&#2993;&#3021;&#2993;&#3007;&#2994;&#3021; &#2958;&#2997;&#3016; &#2986;&#2993;&#2997;&#3016;</font>', '', 'top', 'சிங்கம்', 'புலி', 'கரடி', 'மயில் ', 'D', 1, '2020-01-27 15:56:58', '0000-00-00 00:00:00', 0, 0),
(2, 2, 3, '<font face=\"Arial\" size=\"3\">&#2951;&#2984;&#3021;&#2980; &#2986;&#2975;&#2980;&#3021;&#2980;&#3007;&#2994;&#3021; &#2953;&#2995;&#3021;&#2995; &#2990;&#3007;&#2992;&#3009;&#2965;&#2990;&#3021; &#2958;&#2980;&#3009;?</font>', 'uploads/516d79d08bb6972ba9e26ccbd9ad7849.jpg', 'bottom', 'சிங்கம்', ' புலி', ' கரடி', ' மைனா', 'A', 2, '2020-01-27 16:01:29', '0000-00-00 00:00:00', 0, 0),
(3, 1, 4, '<font face=\"Arial\" size=\"3\">In vaccum all objects fall with</font>', '', 'bottom', 'same acceleration and heavy bodies reach groud first', 'same acceleration and reach the ground at the same time', 'different acceleratin and reach the ground at different time', 'different acceleration and heavy bodies reach ground first', 'B', 1, '2020-01-28 05:29:21', '0000-00-00 00:00:00', 0, 0),
(4, 2, 4, '<font face=\"Arial\" size=\"3\">The time of reverberation of a hall can be decreased by</font>', '', 'bottom', 'having a number of loud speakers', 'opening all windows and doors', 'closing all windows and doors', 'speaking loudly', 'B', 2, '2020-01-28 05:32:14', '0000-00-00 00:00:00', 0, 0),
(5, 1, 5, '<font face=\"Arial\" size=\"3\">which spectroscopy is used in chemical examination of intersteller space?</font>', '', 'bottom', 'Microwave spectroscopy', 'Infrared (IR) spectroscopy', 'Raman spectroscopy', 'NMR spectroscopy', 'A', 1, '2020-01-28 05:34:10', '0000-00-00 00:00:00', 0, 0),
(6, 2, 5, '<font face=\"Arial\" size=\"3\">The Indian Salt Petre is&#160;</font>', '', 'bottom', 'Ammonium nitrate NH4 NO3', 'Sodium Nitrate (Na NO 3  )', 'Potassium Nitrate KNO 3 ', 'Calcium nitrate Ca(NO 3)2', 'C', 2, '2020-01-28 05:35:09', '0000-00-00 00:00:00', 0, 0),
(7, 3, 5, '<font face=\"Arial\" size=\"3\">The&#160; unit for equivalent conductivity is&#160;</font>', '', 'bottom', 'ohm-1 cm-1', 'ohm -1 cm-2 eq-1', 'ohm-1 cm 2 eq -1', 'S cm -2 eq -1', 'C', 3, '2020-01-28 05:36:37', '0000-00-00 00:00:00', 0, 0),
(8, 1, 6, '<font face=\"Arial\" size=\"3\">The main constituent of steel in India are</font>', '', 'bottom', 'Ni and Cu', 'Mn and Cr', 'Fe and Cu', 'Ti and Cr', 'B', 1, '2020-01-28 05:37:33', '0000-00-00 00:00:00', 0, 0),
(9, 2, 6, '<font face=\"Arial\" size=\"3\">When did the Prime Minister of India inaugrate the country\'s longest rail -cum-road- bridge built over the Brahmaputra river at Bogibeel near Dibrgarh in Assam?</font>', '', 'bottom', 'On November 25, 2018', 'On December 25,2018', 'On December 10,2018', 'On November 10,2018', 'B', 2, '2020-01-28 05:38:16', '0000-00-00 00:00:00', 0, 0),
(10, 2, 5, '<font face=\"Arial\" size=\"3\">The end product of anaerobic respiration is</font>', '', 'bottom', 'Acetyl C0-A', 'Ethanol alcohol ', 'Pyruvic acid', 'succinic acid', 'B', 4, '2020-01-28 05:39:06', '0000-00-00 00:00:00', 0, 0),
(11, 1, 7, '<font face=\"Arial\" size=\"3\">Golden rice is genetically modified crop. Where the incorporated gene is meant for biosynthesis of</font>', '', 'bottom', 'Vitamin A', 'Vitamin B', 'Vitamin C', 'Vitamin D', 'A', 1, '2020-01-28 05:40:07', '0000-00-00 00:00:00', 0, 0),
(12, 1, 8, '<font face=\"Arial\" size=\"3\">&#2951;</font>&#2992;&#2979;&#3021;&#2975;&#3006;&#2990;&#3021; &#2965;&#2992;&#3021;&#2984;&#3006;&#2975;&#2965; &#2986;&#3019;&#2992;&#3007;&#2985;&#3021; &#2990;&#3009;&#2975;&#3007;&#2997;&#3007;&#2994;&#3021; &#2965;&#3008;&#2996;&#3021;&#2965;&#3021;&#2965;&#2979;&#3021;&#2975; &#2962;&#2986;&#3021;&#2986;&#2984;&#3021;&#2980;&#2990;&#3021; &#2965;&#3016;&#2991;&#3014;&#2996;&#3009;&#2980;&#3021;&#2980;&#3006;&#2991;&#3007;&#2993;&#3021;&#2993;&#3009;.', '', 'bottom', 'அய்-லா-சாப்பேல் உடன்படிக்கை', 'பாண்டிச்சேரி உடன்படிக்கை', 'பாரிசு உடன்படிக்கை', 'வட சர்க்கார் உடன்படிக்கை', 'B', 1, '2020-01-28 05:42:46', '0000-00-00 00:00:00', 0, 0),
(13, 1, 8, '<span>&#2965;&#2985;&#3007;&#2999;&#3021;&#2965;&#2992;&#3007;&#2985;&#3021; &#2980;&#2994;&#3016;&#2984;&#2965;&#2992;&#3021;</span>', '', 'bottom', 'காஷ்கர்', 'யார்கண்டு', 'பெஷாவர்', 'எதுவுமில்லை', 'C', 2, '2020-01-28 05:43:24', '0000-00-00 00:00:00', 0, 0),
(14, 1, 8, '<span>&#2986;&#3018;&#2992;&#3009;&#2980;&#3021;&#2980;&#3009;&#2965;:</span><div><span><p><span>I. &#2965;&#2985;&#3021;&#2997; &#2997;&#2990;&#3021;&#2970;&#2990;&#3021; - 1. &#2965;&#3006;&#2975;&#3021;&#2986;&#3008;&#2970;&#3000;&#3021;</span></p><p>II. &#2970;&#3009;&#2969;&#3021;&#2965; &#2997;&#2990;&#3021;&#2970;&#2990;&#3021; - 2. &#2965;&#3006;&#2992;&#2997;&#3015;&#2994;&#2992;&#3021;</p><p>III. &#2965;&#2994;&#3007;&#2969;&#3021;&#2965; &#2997;&#2990;&#3021;&#2970;&#2990;&#3021; - 3. &#2997;&#2970;&#3009;&#2980;&#3015;&#2997;&#2992;&#3021;</p><p>IV. &#2965;&#3009;&#2999;&#3006;&#2985; &#2997;&#2990;&#3021;&#2970;&#2990;&#3021; - 4. &#2986;&#3009;&#2999;&#3021;&#2991; &#2990;&#3007;&#2980;&#3021;&#2992;&#2990;&#3021;</p></span></div>', '', 'bottom', 'I-3 II-4 III-1 IV-2', 'I-4 II-3 III-1 IV-2', 'I-3 II-4 III-2 IV-1', 'I-4 II-3 III-2 IV-1', 'C', 3, '2020-01-28 05:44:25', '0000-00-00 00:00:00', 0, 0),
(15, 1, 9, '<font face=\"Arial\" size=\"3\">Most widely used bioweapon is</font>', '', 'bottom', 'Bacillus subtilis', 'Vibrio Cholerae', 'Bacilllus anthracis', 'Escherichia coli', 'C', 1, '2020-01-28 05:49:45', '0000-00-00 00:00:00', 0, 0);

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
(1, 'aumak7639', 'Umasekar', 'uploads/9bcc4d1b98c5cc4a652386244852627c.png', 'male', 'Arumugam', '7639600998', 'Chennai', '600073', 'Yg', '10th-State-Board', '123456', '123456', '', 1, '', '2020-01-25 06:02:20', '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `language_id` int(11) NOT NULL,
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

INSERT INTO `subject` (`subject_id`, `name`, `language_id`, `image_path`, `description`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(2, 'TAMIL', 1, 'uploads/ce6d8931be0ea685b2509322aa6cd82b.jpg', '<strong>Lorem Ipsum</strong><span>&#160;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</span>', '2020-01-27 07:28:20', '0000-00-00 00:00:00', 0, 0),
(3, 'SCIENCE', 2, 'uploads/a54e6653cb1e4c169ddb10063fd44732.png', '<strong>Lorem Ipsum</strong><span>&#160;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</span>', '2020-01-28 05:27:09', '0000-00-00 00:00:00', 0, 0),
(4, 'பொது அறிவு', 1, 'uploads/f269ae5727732d63d229bd6859d96083.png', '<strong>Lorem Ipsum</strong><span>&#160;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</span>', '2020-01-28 05:40:56', '0000-00-00 00:00:00', 0, 0),
(5, 'General Questions', 2, 'uploads/ce62b5c1c56a2041fd15c42a4e6c7f11.png', '<strong>Lorem Ipsum</strong><span>&#160;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</span>', '2020-01-28 05:48:42', '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `topic`
--

CREATE TABLE `topic` (
  `topic_id` int(11) NOT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topic`
--

INSERT INTO `topic` (`topic_id`, `subject_id`, `name`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(3, 2, 'இலக்கணம்', '2020-01-27 07:33:47', '0000-00-00 00:00:00', 0, 0),
(4, 3, 'Physics', '2020-01-28 05:27:28', '0000-00-00 00:00:00', 0, 0),
(5, 3, 'Chemistry', '2020-01-28 05:27:40', '0000-00-00 00:00:00', 0, 0),
(6, 3, 'Politics', '2020-01-28 05:27:50', '0000-00-00 00:00:00', 0, 0),
(7, 3, 'Biology', '2020-01-28 05:28:05', '0000-00-00 00:00:00', 0, 0),
(8, 4, 'பொது அறிவு வினா', '2020-01-28 05:41:52', '0000-00-00 00:00:00', 0, 0),
(9, 5, 'General', '2020-01-28 05:48:56', '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `year`
--

CREATE TABLE `year` (
  `year_id` int(11) NOT NULL,
  `year` year(4) NOT NULL,
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
(1, 2010, 1, '2020-01-27 06:56:15', '0000-00-00 00:00:00', 1, 1),
(2, 2011, 1, '2020-01-27 06:56:20', '0000-00-00 00:00:00', 1, 1),
(3, 2012, 1, '2020-01-27 06:56:25', '0000-00-00 00:00:00', 1, 1),
(4, 2013, 1, '2020-01-27 06:56:30', '0000-00-00 00:00:00', 1, 1),
(5, 2014, 1, '2020-01-27 06:56:34', '0000-00-00 00:00:00', 1, 1),
(6, 2015, 1, '2020-01-27 06:56:42', '0000-00-00 00:00:00', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`admin_id`);

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
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `language_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `student_answer`
--
ALTER TABLE `student_answer`
  MODIFY `student_answer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_register`
--
ALTER TABLE `student_register`
  MODIFY `student_register_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `topic`
--
ALTER TABLE `topic`
  MODIFY `topic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `year`
--
ALTER TABLE `year`
  MODIFY `year_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
