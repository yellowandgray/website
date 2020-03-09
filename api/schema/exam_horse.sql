-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2020 at 07:13 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exam_horse`
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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
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
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_id` int(11) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `book_name_id` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `book_name`, `book_name_id`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Book', 'Bok123', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `language_id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`language_id`, `name`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'தமிழ்', '1', '2020-01-25 05:39:15', '0000-00-00 00:00:00', 1, 1),
(2, 'English', '1', '2020-01-25 05:39:15', '0000-00-00 00:00:00', 1, 1),
(5, 'Tamil', '1', '2020-03-09 01:01:58', '2020-03-09 01:01:58', 1, 1);

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
  `explanation` varchar(255) NOT NULL,
  `data_dictionary` varchar(255) NOT NULL,
  `book_id` int(11) NOT NULL,
  `page_no` varchar(255) NOT NULL,
  `notes` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`question_id`, `year_id`, `topic_id`, `name`, `image_path`, `direction`, `a`, `b`, `c`, `d`, `answer`, `question_no`, `explanation`, `data_dictionary`, `book_id`, `page_no`, `notes`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 1, 1, '<font face=\"Arial\" size=\"3\">In vaccum all objects fall with</font>', '', 'top', '<font face=\"Arial\" size=\"3\">same acceleration and heavy bodies reach</font>', '<div><font face=\"Arial\" size=\"3\">same acceleration and reach the ground at</font></div><div><font face=\"Arial\" size=\"3\">the same time</font></div>', '<div><font face=\"Arial\" size=\"3\">different acceleration and reach the ground&#160;</font></div><div><font face=\"Arial\" size=\"3\">at different time</font></div>', '<font face=\"Arial\" size=\"3\">different acceleration and heavy bodies reach ground first</font>', 'B', 1, '', '', 0, '', '', '2020-03-05 09:39:00', '0000-00-00 00:00:00', 0, 0),
(2, 1, 1, '<font face=\"Arial\" size=\"3\">The time of reverberation of a hall can be decreased by,</font>', '', 'top', '<font face=\"Arial\" size=\"3\">having a number of loud speakers</font>', '<font face=\"Arial\" size=\"3\">opening all windows and doors</font>', '<font face=\"Arial\" size=\"3\">closing all windows and doors</font>', '<font face=\"Arial\" size=\"3\">speaking loudly</font>', 'B', 2, '', '', 0, '', '', '2020-03-05 09:39:53', '0000-00-00 00:00:00', 0, 0),
(3, 1, 1, '<font face=\"Arial\" size=\"3\">Which spectroscopy is used in chemical examination of interstellar space ?</font>', '', 'top', '<font face=\"Arial\" size=\"3\">Microwave Spectroscopy</font>', '<font face=\"Arial\" size=\"3\">Infrared (IR) Spectroscopy</font>', '<font face=\"Arial\" size=\"3\">Raman Spectroscopy&#160;</font>', '<font face=\"Arial\" size=\"3\">NMR Spectroscopy</font>', 'A', 3, '', '', 0, '', '', '2020-03-05 09:42:11', '0000-00-00 00:00:00', 0, 0),
(4, 1, 1, '<font face=\"Arial\" size=\"3\">The Indian Salt Petre is</font>', '', 'top', '<font face=\"Arial\" size=\"3\">Ammonium nitrate (NH4N03)</font>', '<font face=\"Arial\" size=\"3\">Sodium nitrate (NaN03)&#160;</font>', '<font face=\"Arial\" size=\"3\">Potassium nitrate (KN03</font>', '<font face=\"Arial\" size=\"3\">NMR Spectroscopy</font>', 'C', 4, '', '', 0, '', '', '2020-03-05 09:42:51', '0000-00-00 00:00:00', 0, 0),
(5, 1, 1, '<font face=\"Arial\" size=\"3\">The unit for equivalent conductivity is&#160;</font>', '', 'top', '<font face=\"Arial\" size=\"3\">ohm:.1cm-1</font>', '<font face=\"Arial\" size=\"3\">ohm-1cm-2eq-1</font>', '<font face=\"Arial\" size=\"3\">ohm-1cm2e_q-1</font>', '<font face=\"Arial\" size=\"3\">S cm-2eq-1</font>', 'C', 5, '', '', 0, '', '', '2020-03-05 09:44:28', '0000-00-00 00:00:00', 0, 0),
(6, 1, 1, '<font face=\"Arial\" size=\"3\">The main constituent of steel in India are</font>', '', 'top', '<font face=\"Arial\" size=\"3\">Ni and Cu</font>', '<font face=\"Arial\" size=\"3\">Mn and Cr</font>', '<font face=\"Arial\" size=\"3\">Fe and Cu&#160;</font>', '<font face=\"Arial\" size=\"3\">Ti and Cr</font>', 'C', 6, '', '', 0, '', '', '2020-03-05 09:45:09', '0000-00-00 00:00:00', 0, 0),
(7, 1, 2, '<font face=\"Arial\" size=\"3\">When did the Prime Minister of India inaugurate the country\'s longest rail-cum-road bridge built over the Brahmaputra river at Bogibeel near Dibrugarh in Assam ?</font>', '', 'top', 'On November 25, 2018<br>', '<font face=\"Arial\" size=\"3\">On December&#160; 25, 2018</font>', '<font face=\"Arial\" size=\"3\">On December 10, 2018</font>', '<font face=\"Arial\" size=\"3\">On November 10, 2018</font>', 'B', 7, '', '', 0, '', '', '2020-03-07 05:48:30', '0000-00-00 00:00:00', 0, 0),
(8, 1, 2, '<font face=\"Arial\" size=\"3\">The end product of anaerobic respiration is</font>', '', 'top', '<font face=\"Arial\" size=\"3\">Acetyl Co-A</font>', '<font face=\"Arial\" size=\"3\">Ethanol alcohol&#160;</font>', '<font face=\"Arial\" size=\"3\">Pyruvic acid</font>', '<font face=\"Arial\" size=\"3\">Succlnlc acid</font>', 'B', 8, '', '', 0, '', '', '2020-03-05 09:55:39', '0000-00-00 00:00:00', 0, 0),
(9, 1, 2, '<font face=\"Arial\" size=\"3\">Golden rice is a genetically modifed crop. Where the Incorporated gene Is meant for blosynthesls of</font>', '', 'top', '<font face=\"Arial\" size=\"3\">Vitamin A</font>', '<font face=\"Arial\" size=\"3\">Vitamin B</font>', '<font face=\"Arial\" size=\"3\">Vitamin C</font>', 'Vitamin D', 'A', 9, '', '', 0, '', '', '2020-03-05 09:56:29', '0000-00-00 00:00:00', 0, 0),
(10, 1, 2, '<font face=\"Arial\" size=\"3\">Most widely used bioweapon is&#160;</font>', '', 'top', '<font face=\"Arial\" size=\"3\">Bacillus subtilis</font>', '<font face=\"Arial\" size=\"3\">Vibrio cholerae&#160;</font>', '<font face=\"Arial\" size=\"3\">Bacillus anthracis&#160;</font>', '<font face=\"Arial\" size=\"3\">Escherichia coli</font>', 'C', 10, '', '', 0, '', '', '2020-03-05 09:57:38', '0000-00-00 00:00:00', 0, 0),
(11, 1, 3, '<font face=\"Arial\" size=\"3\">Among the following plants, which one has oil repelling property?</font>', '', 'top', '<font face=\"Arial\" size=\"3\">Tobacco</font>', '<font face=\"Arial\" size=\"3\">Maize&#160;</font>', '<font face=\"Arial\" size=\"3\">Hibiscus&#160;</font>', '<font face=\"Arial\" size=\"3\">Aloe Vera</font>', 'D', 11, '', '', 0, '', '', '2020-03-05 09:59:29', '0000-00-00 00:00:00', 0, 0),
(12, 1, 3, '<div><font face=\"Arial\" size=\"3\">What happens in human Thalassemias ?</font></div><div><font face=\"Arial\" size=\"3\">1. reduce a - globin synthesis</font></div><div><font face=\"Arial\" size=\"3\">2. reduce (3 - globin synthesis&#160;</font></div><div><font face=\"Arial\" size=\"3\">3. enhance a and [3 - globin synthesis</font></div>', '', 'top', '<font face=\"Arial\" size=\"3\">1 alone correct</font>', '<font face=\"Arial\" size=\"3\">2 alone correct</font>', '<font face=\"Arial\" size=\"3\">1 and 2 are correct&#160;</font>', '<font face=\"Arial\" size=\"3\">3 alone correct</font>', 'C', 12, '', '', 0, '', '', '2020-03-05 10:01:07', '0000-00-00 00:00:00', 0, 0),
(13, 1, 3, '<div><font face=\"Arial\" size=\"3\">Which&#160; of the&#160; following&#160; plant boosts the&#160;</font></div><div><font face=\"Arial\" size=\"3\">production of red blood cells ?</font></div>', '', 'top', '<font face=\"Arial\" size=\"3\">Turmeric</font>', '<font face=\"Arial\" size=\"3\">Tulsi</font>', '<font face=\"Arial\" size=\"3\">Lemon grass</font>', '<font face=\"Arial\" size=\"3\">Mustard</font>', 'C', 13, '', '', 0, '', '', '2020-03-05 10:01:47', '0000-00-00 00:00:00', 0, 0),
(14, 1, 3, '<div><font face=\"Arial\" size=\"3\">Consider following statements :&#160;</font></div><div><font face=\"Arial\" size=\"3\">&#160;1. 21 June - Summer&#160; solstices&#160; more&#160;</font></div><div><font face=\"Arial\" size=\"3\">radiation&#160; received&#160; &#160;by&#160;</font></div><div><font face=\"Arial\" size=\"3\">northern hemisphere</font></div><div><font face=\"Arial\" size=\"3\">2. 23 September -Autumn equinox not equal&#160;</font></div><div><font face=\"Arial\" size=\"3\">radiation in both hemisphere&#160;</font></div><div><font face=\"Arial\" size=\"3\">3.&#160; 22 December - Winter&#160; solstice&#160; more</font></div><div><font face=\"Arial\" size=\"3\">radiation&#160; received&#160; by</font></div><div><font face=\"Arial\" size=\"3\">southern hemisphere Select the correct answer using the code given&#160;</font></div><div><font face=\"Arial\" size=\"3\">below :</font></div>', '', 'top', '<font face=\"Arial\" size=\"3\">1 and 2&#160;</font>', '<font face=\"Arial\" size=\"3\">1 and 3</font>', '<font face=\"Arial\" size=\"3\">2 and 3</font>', '<font face=\"Arial\" size=\"3\">1, 2 and 3</font>', 'B', 14, '', '', 0, '', '', '2020-03-05 10:02:45', '0000-00-00 00:00:00', 0, 0),
(15, 1, 3, '<font face=\"Arial\" size=\"3\">How many seismic zones grouped in India ?</font>', '', 'top', '<font face=\"Arial\" size=\"3\">4</font>', '<font face=\"Arial\" size=\"3\">5</font>', '<font face=\"Arial\" size=\"3\">6</font>', '<font face=\"Arial\" size=\"3\">8</font>', 'A', 15, '', '', 0, '', '', '2020-03-05 10:03:23', '0000-00-00 00:00:00', 0, 0),
(16, 1, 3, '<font face=\"Arial\" size=\"3\">Sabarmathi river flowing states&#160;</font>', '', 'top', '<font face=\"Arial\" size=\"3\">Madhya Pradesh, Rajasthan and Gujarat</font>', '<font face=\"Arial\" size=\"3\">Gujarat and Rajasthan</font>', '<font face=\"Arial\" size=\"3\">Madhya Pradesh and Bihar</font>', '<font face=\"Arial\" size=\"3\">Maharastra and Jharkand</font>', 'A', 16, '', '', 0, '', '', '2020-03-05 10:04:13', '0000-00-00 00:00:00', 0, 0),
(17, 1, 3, '<div><font face=\"Arial\" size=\"3\">With reference to black soil, consider the&#160;</font></div><div><font face=\"Arial\" size=\"3\">&#160;following statement&#160; :</font></div><div><font face=\"Arial\" size=\"3\">1. It is generally clayey, deep and impermeable.</font></div><div><font face=\"Arial\" size=\"3\">2. They swell and become sticky when wet and</font></div><div><font face=\"Arial\" size=\"3\">shrink when dried.</font></div><div><font face=\"Arial\" size=\"3\">3. It retains the moisture for,.a very long time.&#160;</font></div><div><font face=\"Arial\" size=\"3\">Which of the above statements is/are correct ?</font></div>', '', 'top', '<font face=\"Arial\" size=\"3\">1 only&#160;</font>', '<font face=\"Arial\" size=\"3\">1 and 2 only</font>', '<font face=\"Arial\" size=\"3\">3 only</font>', '<font face=\"Arial\" size=\"3\">1, 2 and 3</font>', 'D', 17, '', '', 0, '', '', '2020-03-05 10:05:27', '0000-00-00 00:00:00', 0, 0),
(18, 1, 4, '<font face=\"Arial\" size=\"3\">Different types of vegetation is found in different&#160; parts of India &#8212; due to</font>', '', 'top', '<font face=\"Arial\" size=\"3\">Topography</font>', '<font face=\"Arial\" size=\"3\">Unequal&#160; distribution&#160; of&#160; Rainfall&#160; and&#160; Temperature</font>', '<font face=\"Arial\" size=\"3\">Soil</font>', '<font face=\"Arial\" size=\"3\">Temperature and soil</font>', 'B', 18, '', '', 0, '', '', '2020-03-05 10:06:59', '0000-00-00 00:00:00', 0, 0),
(19, 1, 4, '<font face=\"Arial\" size=\"3\">Creamy layer concept was first introduced in the case of</font>', '', 'top', '<font face=\"Arial\" size=\"3\">Lakshmikant Sukla Vs State of Uttar Pradesh</font>', '<font face=\"Arial\" size=\"3\">Indra Sawhney Vs Union of India</font>', '<font face=\"Arial\" size=\"3\">K.K.Roy Vs State of Tripura</font>', '<font face=\"Arial\" size=\"3\">Jitender Kumar Vs State of Uttar Pradesh</font>', 'B', 19, '', '', 0, '', '', '2020-03-05 10:07:52', '0000-00-00 00:00:00', 0, 0),
(20, 1, 4, '<font face=\"Arial\" size=\"3\">Agricultural crop insurance was introduced by&#160; Government of India in</font>', '', 'top', '<font face=\"Arial\" size=\"3\">1986</font>', '<font face=\"Arial\" size=\"3\">1984</font>', '<font face=\"Arial\" size=\"3\">1985</font>', '<font face=\"Arial\" size=\"3\">1989</font>', 'C', 20, '', '', 0, '', '', '2020-03-05 10:10:18', '0000-00-00 00:00:00', 0, 0),
(21, 1, 4, '<font face=\"Arial\" size=\"3\">Golden Quadrilateral distance between Chennai and Kolkata is</font>', '', 'top', '<font face=\"Arial\" size=\"3\">1684 Km&#160;</font>', '<font face=\"Arial\" size=\"3\">1453 Km</font>', '<font face=\"Arial\" size=\"3\">1290 Km&#160;</font>', '<font face=\"Arial\" size=\"3\">1419 Km</font>', 'A', 21, '', '', 0, '', '', '2020-03-05 10:16:13', '0000-00-00 00:00:00', 0, 0),
(22, 1, 4, '<div><font face=\"Arial\" size=\"3\">Which of the following statements about the first&#160;</font></div><div><font face=\"Arial\" size=\"3\">&#160;amendment to the constitution is/are true ?</font></div><div><font face=\"Arial\" size=\"3\">I. The first amendment was enacted in 1952&#160;</font></div><div><font face=\"Arial\" size=\"3\">II. The first amendment was enacted before the</font></div><div><font face=\"Arial\" size=\"3\">first general elections</font></div><div><font face=\"Arial\" size=\"3\">III.It was enacted by the provisional parliament</font></div>', '', 'top', '<font face=\"Arial\" size=\"3\">I and II are true&#160;</font>', '<font face=\"Arial\" size=\"3\">II and III are true</font>', '<font face=\"Arial\" size=\"3\">I and III are true&#160;</font>', '<font face=\"Arial\" size=\"3\">I, II and III are true</font>', 'B', 22, '', '', 0, '', '', '2020-03-05 10:18:04', '0000-00-00 00:00:00', 0, 0),
(23, 1, 4, '<font face=\"Arial\" size=\"3\">Which one of the stages of Man\'s progress is not property matched ?</font>', '', 'top', '<font face=\"Arial\" size=\"3\">Primitive food&#160; collecting state &#8212;&#160; Stone Age</font>', '<font face=\"Arial\" size=\"3\">Advance food collecting stage&#160; &#8212;&#160; Mesolitic Age</font>', '<font face=\"Arial\" size=\"3\">Food production stage&#160; -&#160; Chalcolitic Age</font>', '<font face=\"Arial\" size=\"3\">Urbanisation -&#160; Bronze Age</font>', 'C', 23, '', '', 0, '', '', '2020-03-05 10:19:13', '0000-00-00 00:00:00', 0, 0),
(24, 2, 1, '<font face=\"Arial\" size=\"3\">The most outstanding Buddhist writer in Sanskrit&#160; was</font>', '', 'top', '<font face=\"Arial\" size=\"3\">Kalidasa&#160;</font>', '<font face=\"Arial\" size=\"3\">Asvaghosa</font>', '<font face=\"Arial\" size=\"3\">Bharavi&#160;</font>', '<font face=\"Arial\" size=\"3\">Kumaradasa</font>', 'B', 24, '', '', 0, '', '', '2020-03-05 10:20:01', '0000-00-00 00:00:00', 0, 0),
(25, 2, 1, '<div><font face=\"Arial\" size=\"3\">Arrange in chronological order :&#160;</font></div><div><font face=\"Arial\" size=\"3\">&#160;1. Battle of Chausa&#160; 2. Death of Babar</font></div><div><font face=\"Arial\" size=\"3\">3. Battle of Kanaoj&#160; 4. Death of Akbar</font></div>', '', 'top', '<font face=\"Arial\" size=\"3\">1-2-3-.4</font>', '<font face=\"Arial\" size=\"3\">4-3-2-1</font>', '<font face=\"Arial\" size=\"3\">2-1-3-4</font>', '<font face=\"Arial\" size=\"3\">3-1-2-4</font>', 'C', 25, '', '', 0, '', '', '2020-03-05 10:20:45', '0000-00-00 00:00:00', 0, 0),
(26, 2, 1, '<div><font face=\"Arial\" size=\"3\">&#160;1. Ram Mohan Roy accepted the concept of God</font></div><div><font face=\"Arial\" size=\"3\">propounded by the Upanishads.</font></div><div><font face=\"Arial\" size=\"3\">2. Swami Dayananda accepted the Western&#160;</font></div><div><font face=\"Arial\" size=\"3\">&#160;ideas.</font></div><div><font face=\"Arial\" size=\"3\">3. The social reform leaders fought for the&#160;</font></div><div><font face=\"Arial\" size=\"3\">&#160;problems of women and depressed classes&#160;</font></div><div><font face=\"Arial\" size=\"3\">4. 1918 the form for Brahminicial organisation</font></div><div><font face=\"Arial\" size=\"3\">South, Division liberal federation was started</font></div>', '', 'top', '<font face=\"Arial\" size=\"3\">1, 2, 3 are correct 4 only not correct&#160;</font>', '<font face=\"Arial\" size=\"3\">1, 3,&#160; 4 are correct 2 only not correct</font>', '<font face=\"Arial\" size=\"3\">1, 2, 3, 4 are correct&#160;</font>', '<font face=\"Arial\" size=\"3\">2, 3, 4 are correct 1 is not correct&#160;</font>', 'A', 26, '', '', 0, '', '', '2020-03-05 10:21:25', '0000-00-00 00:00:00', 0, 0),
(27, 2, 1, '<div><font face=\"Arial\" size=\"3\">Which of the following facts are true regarding&#160; the commercialisation agriculature under British rule ?&#160;</font></div><div><font face=\"Arial\" size=\"3\">1. Money lending and exploitation of Poor&#160;</font></div><div><font face=\"Arial\" size=\"3\">&#160;peasants</font></div><div><font face=\"Arial\" size=\"3\">2. Scarcity of food</font></div><div><font face=\"Arial\" size=\"3\">3. Increase the demand of cash crops</font></div><div><font face=\"Arial\" size=\"3\">4. Commercial agriculture went in bankruptcy</font></div>', '', 'top', '<font face=\"Arial\" size=\"3\">1 is true, 2, 3, 4 false&#160;</font>', '<font face=\"Arial\" size=\"3\">2, 3, 4 are true 1 is false&#160;</font>', '<font face=\"Arial\" size=\"3\">all are false statements</font>', '<font face=\"Arial\" size=\"3\">1,2,3,4 statements are true</font>', 'D', 27, '', '', 0, '', '', '2020-03-05 10:22:00', '0000-00-00 00:00:00', 0, 0),
(28, 2, 1, '<font face=\"Arial\" size=\"3\">Name the famous dancer who crowned as&#160; `Kathak king of India\'?</font>', '', 'top', '<font face=\"Arial\" size=\"3\">Prem Chand&#160;</font>', '<font face=\"Arial\" size=\"3\">Sambhu Maharaj</font>', '<font face=\"Arial\" size=\"3\">Thyagarajar</font>', '<font face=\"Arial\" size=\"3\">Fate Singh</font>', 'B', 28, '', '', 0, '', '', '2020-03-05 10:22:55', '0000-00-00 00:00:00', 0, 0),
(29, 2, 2, '<font face=\"Arial\" size=\"3\">Which among the given facts became the primary&#160; reason for the leave of E.V. Ramaswami from Indian National Congress ?</font>', '', 'top', '<font face=\"Arial\" size=\"3\">conflict with M.K. Gandhi</font>', '<font face=\"Arial\" size=\"3\">crisis in Seranmahadevi charity trianing centre</font>', '<font face=\"Arial\" size=\"3\">congress ideology</font>', '<font face=\"Arial\" size=\"3\">communal disparity in Congress</font>', 'A', 29, '', '', 0, '', '', '2020-03-05 10:23:58', '0000-00-00 00:00:00', 0, 0),
(30, 2, 2, '<font face=\"Arial\" size=\"3\">Which strengthened the National Movement ?&#160;</font>', '', 'top', '<font face=\"Arial\" size=\"3\">Europeanisation&#160;</font>', '<font face=\"Arial\" size=\"3\">Marxian theory</font>', '<font face=\"Arial\" size=\"3\">Religious faith&#160;</font>', '<font face=\"Arial\" size=\"3\">Secular ideology</font>', 'D', 30, '', '', 0, '', '', '2020-03-05 10:25:40', '0000-00-00 00:00:00', 0, 0),
(31, 2, 2, '<font face=\"Arial\" size=\"3\">The financial control exercised by the Parliament&#160; over the executive through</font>', '', 'top', '<font face=\"Arial\" size=\"3\">The comptroller and Auditing General of India</font>', '<font face=\"Arial\" size=\"3\">The Auditor General</font>', '<font face=\"Arial\" size=\"3\">The Finance Secretary</font>', '<font face=\"Arial\" size=\"3\">The Accountant General</font>', 'A', 31, '', '', 0, '', '', '2020-03-05 10:26:23', '0000-00-00 00:00:00', 0, 0),
(32, 2, 2, '<font face=\"Arial\" size=\"3\">The&#160; Comptroller and&#160; Auditor General&#160; is&#160; appointed by The President of India under which Article</font>', '', 'top', '<font face=\"Arial\" size=\"3\">Article 162</font>', '<font face=\"Arial\" size=\"3\">Article 148</font>', '<font face=\"Arial\" size=\"3\">Article 153</font>', '<font face=\"Arial\" size=\"3\">Article 174&#160;</font>', 'B', 32, '', '', 0, '', '', '2020-03-05 10:30:36', '0000-00-00 00:00:00', 0, 0),
(33, 2, 2, '<div><font face=\"Arial\" size=\"3\">Consider the following statements :&#160;</font></div><div><font face=\"Arial\" size=\"3\">1. Article 308 to 314 of the constitution with&#160;</font></div><div><font face=\"Arial\" size=\"3\">regard to the All India Services.</font></div><div><font face=\"Arial\" size=\"3\">2. Article 308 exclusively apply to the Jammu&#160;</font></div><div><font face=\"Arial\" size=\"3\">and Kashmir.</font></div><div><font face=\"Arial\" size=\"3\">3. The Parliament has enacted the All India&#160;</font></div><div><font face=\"Arial\" size=\"3\">&#160;Services Act in 1952.</font></div><div><font face=\"Arial\" size=\"3\">4. Article 312 empowers the Parliament to create&#160;</font></div><div><font face=\"Arial\" size=\"3\">&#160;new All India Services.</font></div><div><font face=\"Arial\" size=\"3\">Choose the correct answer \':</font></div>', '', 'top', '<font face=\"Arial\" size=\"3\">1 and 4</font>', '<font face=\"Arial\" size=\"3\">2 only&#160;</font>', '<font face=\"Arial\" size=\"3\">4 only&#160;</font>', '<font face=\"Arial\" size=\"3\">4 and 3</font>', 'A', 33, '', '', 0, '', '', '2020-03-05 10:32:48', '0000-00-00 00:00:00', 0, 0),
(34, 2, 3, '<div><font face=\"Arial\" size=\"3\">Article ____________ was inserted into the constitution</font></div><div><font face=\"Arial\" size=\"3\">under the 73rd Constitutional Amendment.</font></div>', '', 'top', '<font face=\"Arial\" size=\"3\">245 B</font>', '<font face=\"Arial\" size=\"3\">244 B</font>', '<font face=\"Arial\" size=\"3\">243 B</font>', '<font face=\"Arial\" size=\"3\">242 B</font>', 'C', 34, '', '', 0, '', '', '2020-03-05 10:33:28', '0000-00-00 00:00:00', 0, 0),
(35, 2, 3, '<font face=\"Arial\" size=\"3\">Who among the following was the Cabinet&#160; Minister without portfolio ?</font>', '', 'top', '<font face=\"Arial\" size=\"3\">C. Rajagopalachari</font>', '<font face=\"Arial\" size=\"3\">T.T. Krishnamachari</font>', '<font face=\"Arial\" size=\"3\">N. Gopalaswami Ayyangar</font>', '<font face=\"Arial\" size=\"3\">G.L. Nanda</font>', 'C', 35, '', '', 0, '', '', '2020-03-05 10:34:28', '0000-00-00 00:00:00', 0, 0),
(36, 2, 3, '<font face=\"Arial\" size=\"3\">Which one of the following statement is not with&#160; regard to powers of the Parliament ?</font>', '', 'top', '<font face=\"Arial\" size=\"3\">Parliament can approve three types of&#160; emergency provisions</font>', '<font face=\"Arial\" size=\"3\">It cannot abolish State Legislative Council</font>', '<font face=\"Arial\" size=\"3\">It can alter boundaries of the states</font>', '<font face=\"Arial\" size=\"3\">It can establish a common High Court for two or more states</font>', 'B', 36, '', '', 0, '', '', '2020-03-05 10:46:43', '0000-00-00 00:00:00', 0, 0),
(37, 2, 3, 'Jallikattu, the bull taming sport of Tamil culture&#160; and tradition is protected according to article of the Constitution of India', '', 'top', '<font face=\"Arial\" size=\"3\">29 (1)&#160;</font>', '<font face=\"Arial\" size=\"3\">.39 (1)&#160;</font>', '<font face=\"Arial\" size=\"3\">49 (1)&#160;</font>', '<font face=\"Arial\" size=\"3\">59 (1)&#160;</font>', 'A', 37, '', '', 0, '', '', '2020-03-05 10:47:23', '0000-00-00 00:00:00', 0, 0),
(38, 2, 3, '<font face=\"Arial\" size=\"3\">Who headed provincial constitution committee&#160; of constituent assembly ?</font>', '', 'top', '<font face=\"Arial\" size=\"3\">J.B. Kirpalani&#160;</font>', '<font face=\"Arial\" size=\"3\">H.C. Mukherjee</font>', '<font face=\"Arial\" size=\"3\">A.V. Thakkar&#160;</font>', '<font face=\"Arial\" size=\"3\">Sardar Vallabai Patel</font>', 'D', 38, '', '', 0, '', '', '2020-03-05 10:48:07', '0000-00-00 00:00:00', 0, 0),
(39, 2, 3, '<font face=\"Arial\" size=\"3\">Who among the following was not a member of&#160; Drafting committee ?</font>', '', 'top', '<font face=\"Arial\" size=\"3\">K.M. Munshi</font>', '<font face=\"Arial\" size=\"3\">Alladi Krishnaswamy Ayyar</font>', '<font face=\"Arial\" size=\"3\">Pattabhi Sitaramayya</font>', '<font face=\"Arial\" size=\"3\">Krishnamachari</font>', 'C', 39, '', '', 0, '', '', '2020-03-05 10:48:46', '0000-00-00 00:00:00', 0, 0),
(40, 2, 3, '<div><font face=\"Arial\" size=\"3\">I) The constitution is a source of, and not an&#160;</font></div><div><font face=\"Arial\" size=\"3\">&#160;exercise of, legislative power;</font></div><div><font face=\"Arial\" size=\"3\">II) Constitution springs\' from a belief in limited&#160;</font></div><div><font face=\"Arial\" size=\"3\">&#160;Government</font></div><div><font face=\"Arial\" size=\"3\">Which of the statements given above is/are&#160;</font></div><div><font face=\"Arial\" size=\"3\">correct ?</font></div>', '', 'top', '<font face=\"Arial\" size=\"3\">I only&#160;</font>', '<font face=\"Arial\" size=\"3\">II only</font>', '<font face=\"Arial\" size=\"3\">Both I and II</font>', '<font face=\"Arial\" size=\"3\">Neither I nor II</font>', 'C', 40, '', '', 0, '', '', '2020-03-05 10:49:25', '0000-00-00 00:00:00', 0, 0),
(41, 2, 4, '<div><font face=\"Arial\" size=\"3\">Which committee was appointed in 1986 to deal&#160;</font></div><div><font face=\"Arial\" size=\"3\">&#160;with \'Revitalisation of \'Panchayat Raj institutions</font></div><div><font face=\"Arial\" size=\"3\">for democracy and development ?</font></div>', '', 'top', '<font face=\"Arial\" size=\"3\">Ashok Mehta committee</font>', '<font face=\"Arial\" size=\"3\">G.V.K. Rao committee</font>', '<font face=\"Arial\" size=\"3\">L.M. Singhvi committee</font>', '<font face=\"Arial\" size=\"3\">Santhanam committee</font>', 'C', 41, '', '', 0, '', '', '2020-03-05 10:50:27', '0000-00-00 00:00:00', 0, 0),
(42, 2, 4, '<div><font face=\"Arial\" size=\"3\">Match List I with List II and select the correct&#160;</font></div><div><font face=\"Arial\" size=\"3\">&#160;answer using the codes given below lists :</font></div><div><font face=\"Arial\" size=\"3\">List I (Event)&#160; List II (Year)</font></div><div><font face=\"Arial\" size=\"3\">a) Special Economic&#160; 1. 1991</font></div><div><font face=\"Arial\" size=\"3\">zones policy</font></div><div><font face=\"Arial\" size=\"3\">b) New Foreign Trade&#160; 2. 2000</font></div><div><font face=\"Arial\" size=\"3\">policy</font></div><div><font face=\"Arial\" size=\"3\">c) Goods and services&#160; 3. 2015</font></div><div><font face=\"Arial\" size=\"3\">Tax act</font></div><div><font face=\"Arial\" size=\"3\">d) Narashimham&#160; 4. 2017</font></div><div><font face=\"Arial\" size=\"3\">Committee Report&#160;</font></div>', '', 'top', '<div><font face=\"Arial\" size=\"3\">a&#160; b&#160; c&#160; d</font></div><div><font face=\"Arial\" size=\"3\">2&#160; 3&#160; 4&#160; 1</font></div>', '<div><font face=\"Arial\" size=\"3\">a&#160; b&#160; c&#160; d</font></div><div><font face=\"Arial\" size=\"3\">2&#160; 4&#160; 1&#160; 3</font></div>', '<div><font face=\"Arial\" size=\"3\">a&#160; b&#160; c&#160; d</font></div><div><font face=\"Arial\" size=\"3\">4&#160; 2&#160; 3&#160; 1</font></div>', '<div><font face=\"Arial\" size=\"3\">a&#160; b&#160; c&#160; d</font></div><div><font face=\"Arial\" size=\"3\">4&#160; 3&#160; 2&#160; 1</font></div>', 'A', 42, '', '', 0, '', '', '2020-03-05 10:51:01', '0000-00-00 00:00:00', 0, 0),
(43, 2, 4, '<font face=\"Arial\" size=\"3\">The father of Green Revolution in India was&#160;</font>', '', 'top', '<font face=\"Arial\" size=\"3\">M.S. Swaminathan&#160;&#160;</font>', '<font face=\"Arial\" size=\"3\">Gandhi</font>', '<font face=\"Arial\" size=\"3\">Visweswaraiah&#160;</font>', '<font face=\"Arial\" size=\"3\">N.R. Viswanathan</font>', 'A', 43, '', '', 0, '', '', '2020-03-05 10:51:32', '0000-00-00 00:00:00', 0, 0),
(44, 2, 4, '<font face=\"Arial\" size=\"3\">Which one of the following is the source of direct&#160;</font>', '', 'top', '<font face=\"Arial\" size=\"3\">gift tax&#160;</font>', '<font face=\"Arial\" size=\"3\">customs duty</font>', '<font face=\"Arial\" size=\"3\">excise duty&#160;</font>', '<font face=\"Arial\" size=\"3\">service tax</font>', 'A', 44, '', '', 0, '', '', '2020-03-05 10:52:11', '0000-00-00 00:00:00', 0, 0),
(45, 2, 4, '<font face=\"Arial\" size=\"3\">The sum of the deficit under Revenue account&#160; and deficit under capital account is</font>', '', 'top', '<font face=\"Arial\" size=\"3\">budgetary deficit&#160;</font>', '<font face=\"Arial\" size=\"3\">primary deficit</font>', '<font face=\"Arial\" size=\"3\">fiscal deficit&#160;</font>', '<font face=\"Arial\" size=\"3\">revenue deficit</font>', 'A', 45, '', '', 0, '', '', '2020-03-05 10:53:33', '0000-00-00 00:00:00', 0, 0),
(46, 2, 4, '<font face=\"Arial\" size=\"3\">The&#160; process of removal&#160; or relaxation of&#160; Government restrictions in all stages in Industry is known as</font>', '', 'top', '<font face=\"Arial\" size=\"3\">Privatisation</font>', '<font face=\"Arial\" size=\"3\">Liberalisation</font>', '<font face=\"Arial\" size=\"3\">Globalisation</font>', '<font face=\"Arial\" size=\"3\">Disinvestment</font>', 'B', 46, '', '', 0, '', '', '2020-03-05 10:55:57', '0000-00-00 00:00:00', 0, 0),
(47, 2, 4, '<font face=\"Arial\" size=\"3\">With reference to the Rural development In India, consider the following statements : I. Poverty alleviati~n and welfare of the people II. The process of urbanisation In rural areas Which of the statements given above is/are correct ?&#160;</font>', '', 'top', '<font face=\"Arial\" size=\"3\">I only&#160;</font>', '<font face=\"Arial\" size=\"3\">II only&#160;</font>', '<font face=\"Arial\" size=\"3\">Both I and II</font>', '<font face=\"Arial\" size=\"3\">Neither I nor II&#160;</font>', 'A', 47, '', '', 0, '', '', '2020-03-05 10:56:54', '0000-00-00 00:00:00', 0, 0),
(48, 2, 4, '<font face=\"Arial\" size=\"3\">Which of the following ls/are eligible for &#34;Kisen credit card&#34; ? I. All the farmers 11. Share croppers Ill.Tenants&#160; Select the correct answer using the code given below:&#160;</font>', '', 'top', '<font face=\"Arial\" size=\"3\">I only&#160;</font>', '<font face=\"Arial\" size=\"3\">1 and II&#160;</font>', '<font face=\"Arial\" size=\"3\">II and Ill&#160;</font>', '<font face=\"Arial\" size=\"3\">I, II and Ill&#160;</font>', 'D', 48, '', '', 0, '', '', '2020-03-05 10:57:47', '0000-00-00 00:00:00', 0, 0),
(49, 2, 4, '<font face=\"Arial\" size=\"3\">Match the following:</font>', '', 'top', '<font face=\"Arial\" size=\"3\">Kol uprising&#160;</font>', '<font face=\"Arial\" size=\"3\">Santhal uprising</font>', '<font face=\"Arial\" size=\"3\">Khonds uprising&#160;</font>', '<font face=\"Arial\" size=\"3\">Ahoms uprising&#160;</font>', 'A', 49, '', '', 0, '', '', '2020-03-05 10:59:04', '0000-00-00 00:00:00', 0, 0),
(50, 2, 4, '<font face=\"Arial\" size=\"3\">Which decision of Gandhiji was opposed by Ambedkar?&#160;</font>', '', 'top', '<font face=\"Arial\" size=\"3\">Partition India</font>', '<font face=\"Arial\" size=\"3\">Calling lower castes&#160;</font>', '<font face=\"Arial\" size=\"3\">Satyagraha Movement</font>', '<font face=\"Arial\" size=\"3\">Non-co-operation Movement&#160;</font>', 'C', 50, '', '', 0, '', '', '2020-03-05 10:59:58', '0000-00-00 00:00:00', 0, 0);

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
  `is_correct_answer` tinyint(1) NOT NULL DEFAULT 0,
  `is_skipped` tinyint(1) NOT NULL DEFAULT 0,
  `student_register_id` int(11) DEFAULT NULL,
  `answer_attempt` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
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
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `block_reason` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_register`
--

INSERT INTO `student_register` (`student_register_id`, `user_name`, `student_name`, `profile_image`, `gender`, `parent_name`, `mobile`, `city`, `pin`, `school_name`, `standard`, `password`, `confirm_password`, `email`, `status`, `block_reason`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'aumak7639', 'Umasekar', 'uploads/9bcc4d1b98c5cc4a652386244852627c.png', 'male', 'Arumugam', '7639600998', 'Chennai', '600073', 'Yg', '10th-State-Board', '7639', '7639', '', 1, '', '2020-02-25 12:56:47', '0000-00-00 00:00:00', 0, 0),
(2, 'YG Studio', 'Yellowandgray', 'uploads/7ce5b86f0b363728fc1a8391b892ae46.jpg', 'male', 'Venkat', '98765643210', 'Chennai', '600073', 'Yellowandgray studio', 'High', '123456', '123456', 'yellowandgraychannel@gmail.com', 1, '', '2020-02-26 06:51:31', '0000-00-00 00:00:00', 0, 0);

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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `name`, `language_id`, `image_path`, `description`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Physics', 2, '', '', '2020-03-05 09:21:18', '0000-00-00 00:00:00', 0, 0),
(2, 'Chemistry', 2, '', '', '2020-03-05 09:21:36', '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `topic`
--

CREATE TABLE `topic` (
  `topic_id` int(11) NOT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topic`
--

INSERT INTO `topic` (`topic_id`, `subject_id`, `name`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 1, 'P01', '2020-03-05 09:35:00', '0000-00-00 00:00:00', 0, 0),
(2, 1, 'P02', '2020-03-05 09:35:08', '0000-00-00 00:00:00', 0, 0),
(3, 2, 'C01', '2020-03-05 09:37:35', '0000-00-00 00:00:00', 0, 0),
(4, 2, 'C02', '2020-03-05 09:37:40', '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `year`
--

CREATE TABLE `year` (
  `year_id` int(11) NOT NULL,
  `year` year(4) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL DEFAULT 1,
  `updated_by` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `year`
--

INSERT INTO `year` (`year_id`, `year`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 2018, 1, '2020-03-05 09:35:25', '0000-00-00 00:00:00', 1, 1),
(2, 2019, 1, '2020-03-05 09:35:30', '0000-00-00 00:00:00', 1, 1),
(3, 0000, 1, '2020-03-09 01:01:58', '2020-03-09 01:01:58', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`);

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
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `language_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `student_answer`
--
ALTER TABLE `student_answer`
  MODIFY `student_answer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_register`
--
ALTER TABLE `student_register`
  MODIFY `student_register_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `topic`
--
ALTER TABLE `topic`
  MODIFY `topic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `year`
--
ALTER TABLE `year`
  MODIFY `year_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
