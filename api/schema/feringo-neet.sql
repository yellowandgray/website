-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2020 at 08:28 AM
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
-- Database: `feringo-neet`
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
(1, 'Exam Horse Admin', 'admin', 'F3ringoh!', '2020-02-13 16:37:31', '0000-00-00 00:00:00', 1, 1);

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
(1, 'Objective Physics for NEET', '', '2020-02-27 13:53:42', '2020-02-27 13:53:42', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `chapter`
--

CREATE TABLE `chapter` (
  `chapter_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '',
  `description` varchar(255) NOT NULL DEFAULT '',
  `status` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL DEFAULT 1,
  `updated_by` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chapter`
--

INSERT INTO `chapter` (`chapter_id`, `subject_id`, `name`, `description`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 1, 'National Eligability Entrance Test (NEET)', '', 1, '2020-02-28 06:49:06', '2020-02-27 13:53:42', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `difficult`
--

CREATE TABLE `difficult` (
  `difficult_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL DEFAULT '',
  `description` varchar(500) NOT NULL DEFAULT '',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT 1,
  `updated_by` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `difficult`
--

INSERT INTO `difficult` (`difficult_id`, `name`, `description`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, '40', '', NULL, NULL, 1, 1),
(2, '60', '', NULL, NULL, 1, 1),
(3, '80', '', NULL, NULL, 1, 1),
(4, '100', '', NULL, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `question_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `name` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `image_path` varchar(500) NOT NULL DEFAULT '',
  `direction` varchar(10) NOT NULL DEFAULT '',
  `a` text CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `b` text CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `c` text CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `d` text CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `answer` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `question_no` int(11) NOT NULL,
  `difficult_id` int(11) NOT NULL DEFAULT 0,
  `explanation` text NOT NULL,
  `data_dictionary` text NOT NULL,
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

INSERT INTO `question` (`question_id`, `topic_id`, `name`, `image_path`, `direction`, `a`, `b`, `c`, `d`, `answer`, `question_no`, `difficult_id`, `explanation`, `data_dictionary`, `book_id`, `page_no`, `notes`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 1, '<font face=\"Arial\" size=\"3\">$$\\varepsilon^{2} I=P$$</font>', 'uploads/13cd80dd048ca1b8decab28ca9ba818f.png', 'bottom', '$$\\varepsilon I=P$$<br>', 'only positive ions ', 'only negative ions', 'both negative and positive ions', 'D', 1, 1, 'Test', '-', 1, '2.7', '-', '2020-03-02 05:30:01', '2020-02-27 13:53:42', 1, 1),
(2, 1, '$$<span>\\frac{1+sin(x)}{y}</span><font face=\"Arial\" size=\"3\">$$</font>', '', 'top', '$\\varepsilon I=P$', '$$\\varepsilon I^{2}=P$$', '<font face=\"Arial\" size=\"3\">$$\\varepsilo</font>n^{2} I=P$$', '$$ \\varepsilon I P=1$$', 'A', 2, 1, '-', '-', 1, '2.7', '-', '2020-02-28 06:47:33', '2020-02-27 13:53:42', 1, 1),
(3, 1, '<div lang=\"latex\">\\frac{1+sin(x)}{y}</div>', '', 'top', 'sin ?', 'cos ?', 'tan ?', 'cot ?', 'D', 3, 1, 'Test', '-', 1, '2.7', '-', '2020-03-02 06:12:15', '2020-02-27 13:53:42', 1, 1),
(4, 1, 'In which of the following cells is polarization a major defect?', '', 'top', 'Daniel cell ', 'Leclanche cell', 'Voltaic cell', ' none of the above ', 'C', 4, 1, '-', '-', 1, '2.7', '-', '2020-02-27 13:53:42', '2020-02-27 13:53:42', 1, 1),
(5, 1, 'The number of electrons that constitute 1 A of current is', '', 'top', '$$6.25 \\times 10^{16}$$', '$$6.25 \\times 10^{17}$$', '$$6.25 \\times 10^{18}$$', '$$ 6.25 \\times 10^{19}$$', 'C', 5, 1, '-', '-', 1, '2.7', '-', '2020-02-27 13:53:42', '2020-02-27 13:53:42', 1, 1),
(6, 1, 'How many different resistances are possible with two equal resistors?', '', 'top', '2', '3', '4', '5', 'B', 6, 1, '-', '-', 1, '2.7', '-', '2020-02-27 13:53:42', '2020-02-27 13:53:42', 1, 1),
(7, 1, 'Given three equal resistors, how many different combinations (taking all of them together) can be made?', '', 'top', '3', '4', '5', '6', 'B', 7, 1, '-', '-', 1, '2.7', '-', '2020-02-27 13:53:42', '2020-02-27 13:53:42', 1, 1),
(8, 1, 'Dimensions of current density will be', '', 'top', '$$\\left[\\mathrm{ML}^{2} \\mathrm{T}^{-2} \\mathrm{A}^{-1}\\right]$$', '$$ \\left[\\mathrm{ML}^{-2} \\mathrm{T}^{-2} \\mathrm{A}^{-1}\\right]$$', '$$ \\left[\\mathrm{M}^{0} \\mathrm{L}^{-2} \\mathrm{T}^{0} \\mathrm{A}^{-2}\\right]$$', '$$\\left[M^{0} L^{-2} T^{0} A\\right]$$', 'D', 8, 1, '-', '-', 1, '2.7', '-', '2020-02-27 13:53:42', '2020-02-27 13:53:42', 1, 1),
(9, 1, 'What is the current flowing in the circuit', 'uploads/7050be8620a2e4ac5e057a4c21929a5c.png', 'bottom', '1A', '2A', '0.5A', '0.2A', 'C', 9, 1, '-', '-', 1, '2.7', '-', '2020-02-28 07:31:11', '2020-02-27 13:53:42', 1, 1),
(10, 1, 'Four resistors are connected in the network\nthe conductor is given by shown in Figure. The equivalent resistance', '', 'top', '$$\\frac{10}{3} \\Omega$$', '$$ \\frac{8}{3} \\Omega $$', '$$8 \\Omega $$', '$$ \\frac{20}{3} \\Omega$$', 'A', 10, 1, '-', '-', 1, '2.7', '-', '2020-02-27 13:53:42', '2020-02-27 13:53:42', 1, 1),
(11, 1, 'What is the equivalent resistance between P and Q in the circuit shown in Figure?', 'uploads/4a0df5d75ebc522c11325cb871833f42.png', 'bottom', '$$1 \\Omega$$', '$$2 \\Omega$$', '$$3 \\Omega$$', 'none of these', 'A', 11, 1, '-', '-', 1, '2.7', '-', '2020-02-28 07:31:35', '2020-02-27 13:53:42', 1, 1),
(12, 1, 'A copper wire is drawn through a die to reduce the diameter by half. If the original resistance was 1 ', '', 'top', '$$\\frac{1}{16} \\Omega$$', '$$\\frac{1}{4} \\Omega$$', '4 ', '16 ', 'D', 12, 1, '-', '-', 1, '2.8', '-', '2020-02-27 13:53:42', '2020-02-27 13:53:42', 1, 1),
(13, 1, 'A copper wire is drawn through a die to double its length. If the original resistance was r, then the new resistance of the wire will be', '', 'top', '$$\\frac{r}{16}$$', '$$\\frac{r}{4}$$', '4 r', '16 r', 'C', 13, 1, '-', '-', 1, '2.8', '-', '2020-02-27 13:53:42', '2020-02-27 13:53:42', 1, 1),
(14, 1, 'What is the resistance across A and B in the network in Figure?', '', 'top', 'R', '2 R', '$$\\frac{R}{2}$$', '6 R', 'A', 14, 1, '-', '-', 1, '2.8', '-', '2020-02-27 13:53:42', '2020-02-27 13:53:42', 1, 1),
(15, 1, 'What is the resistance across P and Q in the network shown in Figure?', '', 'top', 'r', '$$\\frac{r}{2}$$', '5 r', '$$\\frac{r}{5}$$', 'A', 15, 1, '-', '-', 1, '2.8', '-', '2020-02-27 13:53:42', '2020-02-27 13:53:42', 1, 1),
(16, 1, 'What is the resistance between A and B in the network shown in Figure?', '', 'top', '1 ', '2 ', '$$\\frac{1}{2} \\Omega$$', '5 ', 'B', 16, 1, '-', '-', 1, '2.8', '-', '2020-02-27 13:53:42', '2020-02-27 13:53:42', 1, 1),
(17, 1, 'For a perfectly ohmic conductor, which of the following represents a graph between the curtent (I) and the poteathal difference (V) across the conductor?', '', 'top', 'IM', 'IM', 'IM', 'IM', 'C', 17, 1, '-', '-', 1, '2.8', '-', '2020-02-27 13:53:42', '2020-02-27 13:53:42', 1, 1),
(18, 1, 'What is the resistance between P and Q in the network in shown Figure?', '', 'top', '5 ', '2.5 ', '10 ', '', 'B', 18, 1, '-', '-', 1, '2.8', '-', '2020-02-27 13:53:42', '2020-02-27 13:53:42', 1, 1),
(19, 1, 'What is the current in the circuit given in Figure?', '', 'top', '3:00 AM', '2:00 AM', '$$ \\frac{1}{8} A$$', '$$\\frac{3}{8}$$', 'A', 19, 1, '-', '-', 1, '2.8', '-', '2020-02-27 13:53:42', '2020-02-27 13:53:42', 1, 1),
(20, 1, 'What is the equivalent resistance between A and B in the circuit shown in Figure?', '', 'top', '4.5 ', '7.5 ', '12 ', 'infinite', 'A', 20, 1, '-', '-', 1, '2.8', '-', '2020-02-27 13:53:42', '2020-02-27 13:53:42', 1, 1),
(21, 1, 'What is the equivalent resistance between A and B in the circuit shown in Figure?', '', 'top', '$$8 \\Omega$$', '$$\\frac{3}{4} \\Omega$$', '$$\\frac{4}{3} \\Omega$$', '$$16 \\Omega$$', 'C', 21, 1, '-', '-', 1, '2.9', '-', '2020-02-27 13:53:42', '2020-02-27 13:53:42', 1, 1),
(22, 1, 'A potential difference of 10 V is applied across a conductance of 2 S. The current in the conductor will be', '', 'top', '20A', '5A', '0.2A', 'none of these', 'A', 22, 1, '-', '-', 1, '2.9', '-', '2020-02-27 13:53:42', '2020-02-27 13:53:42', 1, 1),
(23, 1, 'Ohm\'s law is valid when the temperature of the conductor is', '', 'top', 'very low ', 'very high', 'varying ', ' constant', 'D', 23, 1, '-', '-', 1, '2.9', '-', '2020-02-27 13:53:42', '2020-02-27 13:53:42', 1, 1),
(24, 1, 'A wire of resistance 3 ', '', 'top', '$$\\frac{2}{3} \\Omega$$', '$$\\frac{3}{2} \\Omega$$', '$$\\frac{1}{2} \\Omega$$', '$$\\frac{1}{3} \\Omega$$', 'A', 24, 1, '-', '-', 1, '2.9', '-', '2020-02-27 13:53:42', '2020-02-27 13:53:42', 1, 1),
(25, 1, 'Siemen is the unit of', '', 'top', 'resistance', 'conductance', 'specific conductance ', 'none of these ', 'B', 25, 1, '-', '-', 1, '2.9', '-', '2020-02-27 13:53:42', '2020-02-27 13:53:42', 1, 1),
(26, 1, 'In the circuit in Figure, the reading of the ammeter will be', '', 'top', '1A', '2A', '0.5A', '2.5A', 'A', 26, 1, '-', '-', 1, '2.9', '-', '2020-02-27 13:53:42', '2020-02-27 13:53:42', 1, 1),
(27, 1, 'In the circuit given in Figure, which switch, when closed, will lead to a short circuit?', '', 'top', '1', '2', '3', '2 and 3', 'A', 27, 1, '-', '-', 1, '2.9', '-', '2020-02-27 13:53:42', '2020-02-27 13:53:42', 1, 1),
(28, 1, 'What is the equivalent resistance between A and B in the circuit shown in Figure?', '', 'top', '$$8 \\Omega$$', '$$\\frac{8}{3} \\Omega$$', '$$5 \\Omega$$', '$$\\frac{4}{3} \\Omega$$', 'C', 28, 1, '-', '-', 1, '2.9', '-', '2020-02-27 13:53:42', '2020-02-27 13:53:42', 1, 1),
(29, 1, 'Which of the following is an ohmic conductor?', '', 'top', 'transistor', 'liquid electrolyte', 'semiconductor diode', 'copper', 'D', 29, 1, '-', '-', 1, '2.9', '-', '2020-02-27 13:53:42', '2020-02-27 13:53:42', 1, 1),
(30, 1, 'When cells are connected in series, the emf', '', 'top', 'increases', 'decreases', 'remains unchanged', 'first increases then decreases', 'A', 30, 1, '-', '-', 1, '2.9', '-', '2020-02-27 13:53:42', '2020-02-27 13:53:42', 1, 1),
(31, 1, 'An external resistance R is connected to a cell of internal resistance r. The current in the circuit will be maximum for', '', 'top', 'R > r', 'R < r', 'R = r', '$$R \\geq r$$', 'C', 31, 1, '-', '-', 1, '2.1', '-', '2020-02-27 13:53:42', '2020-02-27 13:53:42', 1, 1),
(32, 1, 'The smallest resistance that can be obtained by the combination of n resistors, each of resistance r is', '', 'top', '$$\\frac{r}{n}$$', '$$n r$$', '$$\\frac{n}{r}$$', '$$n^{2} r$$', 'A', 32, 1, '-', '-', 1, '2.1', '-', '2020-02-27 13:53:42', '2020-02-27 13:53:42', 1, 1),
(33, 1, 'Which of the following has a negative temperature coefficient of resistance?', '', 'top', 'Tungsten', 'Carbon', 'Nichrome', 'Plantinum', 'B', 33, 1, '-', '-', 1, '2.1', '-', '2020-02-27 13:53:42', '2020-02-27 13:53:42', 1, 1),
(34, 1, 'What is the current in the circuit in Figure?', '', 'top', '1:00 AM', '$$\\frac{1}{2} A$$', '2:00 AM', '$$\\frac{1}{3} A$$', 'A', 34, 1, '-', '-', 1, '2.1', '-', '2020-02-27 13:53:42', '2020-02-27 13:53:42', 1, 1),
(35, 1, 'What is the current in the circuit in Figure?', '', 'top', '1:00 AM', '2:00 AM', '$$\\frac{1}{2} \\mathrm{A}$$', '$$\\frac{1}{6} \\mathrm{A}$$', 'A', 35, 1, '-', '-', 1, '2.1', '-', '2020-02-27 13:53:42', '2020-02-27 13:53:42', 1, 1),
(36, 1, 'The V-I graphs for a conductor at tures T1 and T2 are shown in Figure.', '', 'top', '$$T_{1}=T_{2}$$', '$$T_{1}<T_{2}$$', '$$T_{1}>T_{2}$$', 'nothing can be decided', 'C', 36, 1, '-', '-', 1, '2.1', '-', '2020-02-27 13:53:42', '2020-02-27 13:53:42', 1, 1),
(37, 1, 'A non-ohmic device that exhibits a', '', 'top', 'thyrister', 'junction diode', 'water voltmeter', 'electric bulb filament', 'A', 37, 1, '-', '-', 1, '2.1', '-', '2020-02-27 13:53:42', '2020-02-27 13:53:42', 1, 1),
(38, 1, 'What is the equivalent resistance between and Q the circuit in Fig. 12.19 ?', '', 'top', '1 ', '2 ', '4 ', '8 ', 'A', 38, 1, '-', '-', 1, '2.1', '-', '2020-02-27 13:53:42', '2020-02-27 13:53:42', 1, 1),
(39, 1, 'The Wheatstone Bridge is used to measure', '', 'top', 'emf', 'potential difference', 'resistance', 'current', 'C', 39, 1, '-', '-', 1, '2.1', '-', '2020-02-27 13:53:42', '2020-02-27 13:53:42', 1, 1),
(40, 1, 'The effective resistance between A and B is', '', 'top', '1 ', '2 ', '4 ', '10 ', 'A', 40, 1, '-', '-', 1, '2.1', '-', '2020-02-27 13:53:42', '2020-02-27 13:53:42', 1, 1),
(41, 1, 'If temperature is decreased, then relaxation time of electrons in metals will', '', 'top', 'increase ', 'decrease ', 'fluctuate ', 'remain same', 'A', 41, 1, '-', '-', 1, '2.11', '-', '2020-02-27 13:53:42', '2020-02-27 13:53:42', 1, 1),
(42, 1, 'A wire of resistance 1 ', '', 'top', '1 ', '$$\\frac{1}{4} \\Omega$$', '2 ', '4 ', 'D', 42, 1, '-', '-', 1, '2.11', '-', '2020-02-27 13:53:42', '2020-02-27 13:53:42', 1, 1),
(43, 1, 'A given carbon resistance has three coloured bands: yellow, brown, red. The value of the resistance is', '', 'top', '412 ', '$$41 \\times 10^{2} \\Omega$$', '$$41 \\times 10^{2} \\Omega \\pm 5 \\%$$', '$$41 \\times 10^{3} \\Omega \\pm 20 \\%$$', 'D', 43, 1, '-', '-', 1, '2.11', '-', '2020-02-27 13:53:42', '2020-02-27 13:53:42', 1, 1),
(44, 1, 'In the circuit shown in Figure, the current drawn from the battery is 2 A. If the 5 ', '', 'top', '1:00 AM', '2:00 AM', '4:00 AM', '$$\\frac{1}{4} \\mathrm{A}$$', 'B', 44, 1, '-', '-', 1, '2.11', '-', '2020-02-27 13:53:42', '2020-02-27 13:53:42', 1, 1),
(45, 1, 'The resistance in ohms in the four arms of a Wheatstone Bridge are as follows. In which case is the bridge balanced ?', '', 'top', '1, 2, 3, 4', '2, 2, 3, 4', '3, 3, 3, 4', '5, 5, 5, 5', 'D', 45, 1, '-', '-', 1, '2.11', '-', '2020-02-27 13:53:42', '2020-02-27 13:53:42', 1, 1),
(46, 1, 'The null point in a potentiometer with a cell of emf, E is obtained at a distance l on the wire. Then', '', 'top', '$$E \\propto l$$', '$$E \\propto l^{2}$$', '$$E \\propto \\frac{1}{l}$$', '$$E \\propto \\frac{1}{l^{2}}$$', 'A', 46, 1, '-', '-', 1, '2.11', '-', '2020-02-27 13:53:42', '2020-02-27 13:53:42', 1, 1),
(47, 1, 'Three equal resistors of 2 ', '', 'top', '$$\\frac{4}{3} \\Omega$$', '$$\\frac{3}{4} \\Omega$$', '4 ', '6 ', 'A', 47, 1, '-', '-', 1, '2.11', '-', '2020-02-27 13:53:42', '2020-02-27 13:53:42', 1, 1),
(48, 1, 'The wire used in heating appliances is most commonly made of', '', 'top', 'aluminium', 'nickel', 'tin ', 'nichrome', 'D', 48, 1, '-', '-', 1, '2.11', '-', '2020-02-27 13:53:42', '2020-02-27 13:53:42', 1, 1),
(49, 1, 'Which of the following instruments has the highest internal resistance?', '', 'top', 'ammeter', 'galvanometer', 'voltmeter', 'milliammeter', 'C', 49, 1, '-', '-', 1, '2.11', '-', '2020-02-27 13:53:42', '2020-02-27 13:53:42', 1, 1),
(50, 1, 'The drift velocity vd, of an electron varies with the electric field strength E as', '', 'top', '$$v_{d} \\propto E$$', '$$v_{d} \\propto \\frac{1}{E}$$', '$$v_{d} \\propto E^{1 / 2}$$', '$$v_{d} \\propto \\frac{1}{E^{1 / 2}}$$', 'A', 50, 1, '-', '-', 1, '2.11', '-', '2020-02-27 13:53:42', '2020-02-27 13:53:42', 1, 1),
(51, 1, 'If n cells each of emf ', '', 'top', '$$n \\varepsilon$$', '$$\\frac{\\mathcal{E}}{n}$$', '$$n^{2} \\varepsilon$$', 'none of these', 'D', 51, 1, '-', '-', 1, '2.11', '-', '2020-02-27 13:53:59', '2020-02-27 13:53:59', 1, 1),
(52, 1, 'When a current I is set up in a wire of radius R, the drift speed is V. If the same current is set up through a wire of radius 2R, the drift speed becomes', '', 'top', '$$\\frac{V}{2}$$', '$$\\frac{V}{4}$$', 'V', '2 V', 'B', 52, 1, '-', '-', 1, '2.11', '-', '2020-02-27 13:53:59', '2020-02-27 13:53:59', 1, 1),
(53, 1, 'Three equal resistors each of resistance r are connected to form a triangle. The equivalent resistance across any two corners of the triangle is', '', 'top', '2 r', '$$\\frac{r}{3}$$', '$$\\frac{2 r}{3}$$', '3 r', 'C', 53, 1, '-', '-', 1, '2.11', '-', '2020-02-27 13:53:59', '2020-02-27 13:53:59', 1, 1),
(54, 1, 'The equivalent resistance of n resistors, each of the same resistance, when connected in parallel is R. When they are connected in series, their equivalent resistance will be', '', 'top', '$$112$$', '$$\\frac{R}{n^{2}}$$', 'n R', '$$\\frac{R}{n}$$', 'A', 54, 1, '-', '-', 1, '2.11', '-', '2020-02-27 13:53:59', '2020-02-27 13:53:59', 1, 1),
(55, 1, 'Figure shows a battery  B of emf 12 V connected in series with an  ammeter, a resistor r1 and a rheostat r2. A voltmeter is also connected across the battery. The internal resistance of the battery is r = 1.5 ', '', 'top', '1:00 AM', '$$\\frac{1}{2} \\mathrm{A}$$', '$$\\frac{3}{2} \\mathrm{A}$$', 'none of these ', 'A', 55, 1, '-', '-', 1, '2.12', '-', '2020-02-27 13:53:59', '2020-02-27 13:53:59', 1, 1),
(56, 1, 'The resistance of human body is about', '', 'top', '12 ', '120 ', '12 k', '120 k', 'C', 56, 1, '-', '-', 1, '2.12', '-', '2020-02-27 13:53:59', '2020-02-27 13:53:59', 1, 1),
(57, 1, 'Two resistances when connected in parallel have an equivalent resistance of 3 ', '', 'top', '4 ', '6 ', '8 ', '12 ', 'A', 57, 1, '-', '-', 1, '2.12', '-', '2020-02-27 13:53:59', '2020-02-27 13:53:59', 1, 1),
(58, 1, 'What is the equivalent resistancebetween P and Q in Figure?', '', 'top', '$$\\frac{9 r}{2}$$', '$$\\frac{8 r}{3}$$', '$$\\frac{5 r}{2}$$', 'none of these', 'B', 58, 1, '-', '-', 1, '2.12', '-', '2020-02-27 13:53:59', '2020-02-27 13:53:59', 1, 1),
(59, 1, 'Which of the following Sives th direction of current in the circuit shown Figure ?', '', 'top', '0.5 A from a to b', '0.5 A from d to ', '1 A from a to b', '1 A from d to ', 'B', 59, 1, '-', '-', 1, '2.12', '-', '2020-02-27 13:53:59', '2020-02-27 13:53:59', 1, 1),
(60, 1, 'Seven identical lamps of resistance 2200 each are connected to a 220 V line as shown in the circuit. Then the reading in the ammeter is given by', '', 'top', '$$\\frac{1}{10}$$', '$$\\frac{3}{10} \\mathrm{A}$$', '$$\\frac{4}{10} \\mathrm{A}$$', '$$\\frac{7}{10} \\mathrm{A}$$', 'C', 60, 1, '-', '-', 1, '2.12', '-', '2020-02-27 13:53:59', '2020-02-27 13:53:59', 1, 1),
(61, 1, 'A student connects four 1/4 ', '', 'top', '1:00 AM', '1.5 A', '2.5 A', 'zero', 'A', 61, 1, '-', '-', 1, '2.12', '-', '2020-02-27 13:53:59', '2020-02-27 13:53:59', 1, 1),
(62, 1, 'In the network shown in Figure, the equivalent reistance between A and B is 4/3 ', '', 'top', '3 ', '4 ', '5 ', '6 ', 'D', 62, 1, '-', '-', 1, '2.12', '-', '2020-02-27 13:53:59', '2020-02-27 13:53:59', 1, 1),
(63, 1, 'What is the current in the circuit in Figure?', '', 'top', '1:00 AM', '1.5 A ', '0.4 A ', '4:00 AM', 'A', 63, 1, '-', '-', 1, '2.13', '-', '2020-02-27 13:53:59', '2020-02-27 13:53:59', 1, 1),
(64, 1, 'Which is the graph for a thermister?', '', 'top', '(i)', '(ii)', '(iii)', '(iv)', 'B', 64, 1, '-', '-', 1, '2.13', '-', '2020-02-27 13:53:59', '2020-02-27 13:53:59', 1, 1),
(65, 1, 'Which is the graph for a thyristor?', '', 'top', '(i)', '(ii)', '(iii)', '(iv)', 'D', 65, 1, '-', '-', 1, '2.13', '-', '2020-02-27 13:53:59', '2020-02-27 13:53:59', 1, 1),
(66, 1, 'The potential difference across the 6 ', '', 'top', '18 V', '12 V', '9 V', '6 V', 'C', 66, 1, '-', '-', 1, '2.13', '-', '2020-02-27 13:53:59', '2020-02-27 13:53:59', 1, 1),
(67, 1, 'What is the current indicated by the ammeter in the circuit in Figure?', '', 'top', '1:00 AM', '$$\\frac{1}{2} \\mathrm{A}$$', '2:00 AM', '$$\\frac{3}{2} \\mathrm{A}$$', 'A', 67, 1, '-', '-', 1, '2.13', '-', '2020-02-27 13:53:59', '2020-02-27 13:53:59', 1, 1),
(68, 1, 'Assume that the internal resistance of the battery is zero and the key K is closed. What is the reading of the ammeter in Figure?', '', 'top', '4:00 AM', '2:00 AM', '1:00 AM', 'none of these', 'A', 68, 1, '-', '-', 1, '2.13', '-', '2020-02-27 13:53:59', '2020-02-27 13:53:59', 1, 1),
(69, 1, 'Figure shows a Wheatstone Bridge circuit. If 2 A current enters A, then what is the current in the arm BC?', '', 'top', '$$\\frac{3}{2} \\mathrm{A}$$', '$$\\frac{1}{2} \\mathrm{A}$$', '$$\\frac{2}{3} \\mathrm{A}$$', 'none of these', 'A', 69, 1, '-', '-', 1, '2.13', '-', '2020-02-27 13:53:59', '2020-02-27 13:53:59', 1, 1),
(70, 1, 'What is the emf of the cell in the circuit shown for no deflection in the galvanometer? The resistance of the wire is 3 ', '', 'top', '$$\\frac{1}{4} V$$', '$$\\frac{1}{2} V$$', '$$\\frac{3}{4} \\mathrm{V}$$', '$$\\frac{2}{3} V$$', 'B', 70, 1, '-', '-', 1, '2.13', '-', '2020-02-27 13:53:59', '2020-02-27 13:53:59', 1, 1),
(71, 1, 'The potential gradient along the length of a uniform wire is 10 Vm-1. The length of the a wire is 1 m. What is the potential difference across two points separated by 20 cm on the Wire', '', 'top', '2 V ', '3 V ', '4 V ', '5 V ', 'A', 71, 1, '-', '-', 1, '2.14', '-', '2020-02-27 13:53:59', '2020-02-27 13:53:59', 1, 1),
(72, 1, 'If P,Q, R and S are the resistances in the four arms of a Wheatstone Bridge, then the bridge is most sensitive when', '', 'top', 'P = Q = R = S', 'P + Q = R + S', 'P = Q and R = S', 'P - Q = R - S', 'A', 72, 1, '-', '-', 1, '2.14', '-', '2020-02-27 13:53:59', '2020-02-27 13:53:59', 1, 1),
(73, 1, 'If the resistance of a conductor is doubled, keeping the potential difference across it constant, then the rate of generation of heat will', '', 'top', 'be halved', 'be doubled ', 'become four times', 'become one-fourth', 'B', 73, 1, '-', '-', 1, '2.14', '-', '2020-02-27 13:53:59', '2020-02-27 13:53:59', 1, 1),
(74, 1, 'Let r1 be the resistance of a 100 W, 250 V lamp and r2 be that of a 200 W, 250 V lamp. Then r1/r2 is equal to', '', 'top', '1', '2', '$$\\frac{1}{2}$$', '$$\\frac{1}{4}$$', 'B', 74, 1, '-', '-', 1, '2.14', '-', '2020-02-27 13:53:59', '2020-02-27 13:53:59', 1, 1),
(75, 1, 'I W equals', '', 'top', 'A2 ', 'A ', 'A ', 'none of these', 'A', 75, 1, '-', '-', 1, '2.14', '-', '2020-02-27 13:53:59', '2020-02-27 13:53:59', 1, 1),
(76, 1, 'A heater is marked 1000 ', '', 'top', '1 J', '10 J', '1000 J', '3.6 X 106 J', 'D', 76, 1, '-', '-', 1, '2.14', '-', '2020-02-27 13:53:59', '2020-02-27 13:53:59', 1, 1),
(77, 1, 'A current of I ampere is flowing through a resistor of r ohm. The rate of generation of heat (in joules) will be', '', 'top', 'I2 r', '$$\\frac{I^{2} r}{4.2}$$', '4.2 I2 r', 'none of these', 'A', 77, 1, '-', '-', 1, '2.14', '-', '2020-02-27 13:53:59', '2020-02-27 13:53:59', 1, 1),
(78, 1, 'An electric lamp is marked 100 ', '', 'top', 'A ', '2:00 AM', 'A ', 'none of these', 'D', 78, 1, '-', '-', 1, '2.14', '-', '2020-02-27 13:53:59', '2020-02-27 13:53:59', 1, 1),
(79, 1, 'If the current through a conductor is doubled, the rate of rise of temperature in the conductor will be', '', 'top', 'halved ', 'doubled', 'fourtimes ', 'unchanged', 'C', 79, 1, '-', '-', 1, '2.14', '-', '2020-02-27 13:53:59', '2020-02-27 13:53:59', 1, 1),
(80, 1, 'How much electric energy is consumed by a 100 W lamp used for 6 hours every day for 30 days ?', '', 'top', '18 Kj', '18 kWh', '1.8 J', 'none of these', 'B', 80, 1, '-', '-', 1, '2.14', '-', '2020-02-27 13:53:59', '2020-02-27 13:53:59', 1, 1),
(81, 1, 'Suppose H1 is the heat generated per secondin the filament of a 100 W, 250 V lamp and H2 is the heat generated in the filament of a 200 W, 250 V lamp. Then H1 / H2 is equal to', '', 'top', '1', '2', '$$\\frac{1}{2}$$', '$$\\frac{1}{4}$$', 'C', 81, 1, '-', '-', 1, '2.14', '-', '2020-02-27 13:53:59', '2020-02-27 13:53:59', 1, 1),
(82, 1, 'Two wires of copper are of the same length but have different diameters. When they are connected in series across a battery, the heat generated is H1. When connected in parallel across the same battery, the heat generated during the same time is H2. Then', '', 'top', '$$H_{1}=H_{2}$$', '$$H_{1}<H_{2}$$', '$$H_{1}>H_{2}$$', '$$H_{1} \\geq H_{2}$$', 'B', 82, 1, '-', '-', 1, '2.14', '-', '2020-02-27 13:53:59', '2020-02-27 13:53:59', 1, 1),
(83, 1, 'During electrolysis, the current in the electrolyte is maintained by the flow of', '', 'top', 'electrons only', 'negative ions only', 'positive ions only', 'both positive and negative ions', 'D', 83, 1, '-', '-', 1, '2.14', '-', '2020-02-27 13:53:59', '2020-02-27 13:53:59', 1, 1),
(84, 1, 'An electric heater has a rating of 220  V ,The resistance of the element of the', '', 'top', '22 ', '444 ', '220 ', '440 ', 'A', 84, 1, '-', '-', 1, '2.14', '-', '2020-02-27 13:53:59', '2020-02-27 13:53:59', 1, 1),
(85, 1, 'Two wires of resistances r1 and r2 are connected in series in a circuit. If', '', 'top', 'r2', 'r1', 'same for both', 'cannot be decided', 'B', 85, 1, '-', '-', 1, '2.14', '-', '2020-02-27 13:53:59', '2020-02-27 13:53:59', 1, 1),
(86, 1, 'What is converted into heat when a current is set up in a conductor?', '', 'top', 'electric energy ', 'electric current ', 'electric potential ', 'electric resistance ', 'A', 86, 1, '-', '-', 1, '2.15', '-', '2020-02-27 13:53:59', '2020-02-27 13:53:59', 1, 1),
(87, 1, 'In the following circuit, if the heat evolved in the 10 ', '', 'top', '40cals-1', '10cals-1', '5cals-1', '4cals-1', 'D', 87, 1, '-', '-', 1, '2.15', '-', '2020-02-27 13:53:59', '2020-02-27 13:53:59', 1, 1),
(88, 1, 'What is the minimum number of bulbs, each marked 60 W, 40 V, that can work safely when connected in series with a 240 V mains supply?', '', 'top', '2', '4', '6', '8', 'C', 88, 1, '-', '-', 1, '2.15', '-', '2020-02-27 13:53:59', '2020-02-27 13:53:59', 1, 1),
(89, 1, 'If the diameter of a wire is doubled, its resistance will become', '', 'top', ' half', 'double ', 'four times ', 'one-fourth ', 'D', 89, 1, '-', '-', 1, '2.15', '-', '2020-02-27 13:53:59', '2020-02-27 13:53:59', 1, 1),
(90, 1, 'An electric bulb is marked 100 W, 250 V. It will fuse if given a voltage of', '', 'top', '300 V', '250 V', '200 V', '150 V', 'A', 90, 1, '-', '-', 1, '2.15', '-', '2020-02-27 13:53:59', '2020-02-27 13:53:59', 1, 1),
(91, 1, 'If I is the safe current for a fuse wire of radius r, then', '', 'top', '$$I \\propto r^{1 / 2}$$', '$$I \\propto r$$', '$$I \\propto r^{3 / 2}$$', '$$I \\propto r^{2}$$', 'C', 91, 1, '-', '-', 1, '2.15', '-', '2020-02-27 13:53:59', '2020-02-27 13:53:59', 1, 1),
(92, 1, 'The safe current for a fuse wire is independent of', '', 'top', 'length ', 'resistivity ', 'area of Cross-section ', 'all the above ', 'A', 92, 1, '-', '-', 1, '2.15', '-', '2020-02-27 13:53:59', '2020-02-27 13:53:59', 1, 1),
(93, 1, 'Four equal resistors when Connected in series dissipate 5 W of Power. If they are connected in parallel, the power dissipated will be', '', 'top', '40 W', '25 W', '60 W', '80 W', 'D', 93, 1, '-', '-', 1, '2.15', '-', '2020-02-27 13:53:59', '2020-02-27 13:53:59', 1, 1),
(94, 1, 'The resistances of two lamps are in the ratio of 1:2. Their wattage will be in the ratio of', '', 'top', '$$1: 2$$', '$$2: 1$$', '$$4: 1$$', '$$1: 4$$', 'B', 94, 1, '-', '-', 1, '2.15', '-', '2020-02-27 13:53:59', '2020-02-27 13:53:59', 1, 1),
(95, 1, 'Thermo emf is of the order of', '', 'top', '10V', '10-3V', '10-6V', '10-12V', 'C', 95, 1, '-', '-', 1, '2.15', '-', '2020-02-27 13:53:59', '2020-02-27 13:53:59', 1, 1),
(96, 1, 'What is the maximum power output that can be obtained from a cell of emf ', '', 'top', '$$\\frac{\\varepsilon^{2}}{r}$$', '$$\\frac{2 \\varepsilon^{2}}{r}$$', '$$\\frac{\\varepsilon^{2}}{4 r}$$', '$$\\frac{r \\mathcal{E}^{2}}{2}$$', 'C', 96, 1, '-', '-', 1, '2.15', '-', '2020-02-27 13:53:59', '2020-02-27 13:53:59', 1, 1),
(97, 1, 'The temperature coefficient of resistance for a superconductor is', '', 'top', '1', '$$\\infty$$', '-1', '0', 'D', 97, 1, '-', '-', 1, '2.15', '-', '2020-02-27 13:53:59', '2020-02-27 13:53:59', 1, 1),
(98, 1, 'If length of a metallic wire becomes n times, its resistance becomes ______ times.', '', 'top', '$$\\frac{1}{n}$$', '$$\\frac{1}{n^{2}}$$', 'n2', '$$\\frac{1}{n^{4}}$$', 'C', 98, 1, '-', '-', 1, '2.15', '-', '2020-02-27 13:53:59', '2020-02-27 13:53:59', 1, 1),
(99, 1, 'In Q. 98, the resistivity of the metallic wire', '', 'top', 'becomes zero ', 'remains unchanged', 'increases', 'decreases', 'B', 99, 1, '-', '-', 1, '2.15', '-', '2020-02-27 13:53:59', '2020-02-27 13:53:59', 1, 1),
(100, 1, 'If radius of the metallic wire becomes p times, its reistance becomes ______ times.', '', 'top', 'p2', 'p3', '$$\\frac{1}{p^{2}}$$', '$$\\frac{1}{p^{4}}$$', 'D', 100, 1, '-', '-', 1, '2.15', '-', '2020-02-27 13:53:59', '2020-02-27 13:53:59', 1, 1),
(101, 1, 'In series grouping of cells, the effective e.m.f. n cells, each of emf ', '', 'top', '$$\\frac{\\varepsilon}{n}$$', '$$n \\varepsilon$$', '$$\\frac{\\mathcal{E}}{n^{2}}$$', '$$n^{2} \\varepsilon$$', 'B', 101, 1, '-', '-', 1, '2.15', '-', '2020-02-27 13:54:18', '2020-02-27 13:54:18', 1, 1),
(102, 1, 'In parallel grouping of n cells each of emf ', '', 'top', '$$n \\varepsilon$$', '$$\\varepsilon$$', '$$\\frac{\\varepsilon}{n}$$', '$$\\frac{\\mathcal{E}}{n^{2}}$$', 'B', 102, 1, '-', '-', 1, '2.15', '-', '2020-02-27 13:54:18', '2020-02-27 13:54:18', 1, 1),
(103, 1, '1 Kilowatt hour is commenly known as', '', 'top', 'unit', '1 faraday', '1 curie', 'none of these', 'A', 103, 1, '-', '-', 1, '2.16', '-', '2020-02-27 13:54:18', '2020-02-27 13:54:18', 1, 1),
(104, 1, 'How many joules are equal to 1 kWh?', '', 'top', '3.6 X 104', '3.6 X 105', '3.6 X 106', 'none of these', 'C', 104, 1, '-', '-', 1, '2.16', '-', '2020-02-27 13:54:18', '2020-02-27 13:54:18', 1, 1),
(105, 1, 'Wheatstone Bridge circuit is most sensitive of', '', 'top', '$$\\mathrm{P} \\neq \\mathrm{Q} \\neq \\mathrm{R} \\neq \\mathrm{S}$$', '$$P=Q, R \\neq S$$', '$$P \\neq Q, R=S$$', '$$P=Q=R=S$$', 'D', 105, 1, '-', '-', 1, '2.16', '-', '2020-02-27 13:54:18', '2020-02-27 13:54:18', 1, 1),
(106, 1, 'lf n identical resistances are first connected in series and then in parallel, the ratio Rp : Rs is equal to', '', 'top', 'n2 :1', '1:n2', 'n:1', '1:n', 'B', 106, 1, '-', '-', 1, '2.16', '-', '2020-02-27 13:54:18', '2020-02-27 13:54:18', 1, 1),
(107, 1, 'Conductivity of a conductor depends upon', '', 'top', 'volume', 'length', 'area of Cross-section ', 'temperature', 'D', 107, 1, '-', '-', 1, '2.16', '-', '2020-02-27 13:54:18', '2020-02-27 13:54:18', 1, 1),
(108, 1, 'The resistance of human body is about', '', 'top', '12 ', '120 ', '12 k', '120 k', 'C', 108, 1, '-', '-', 1, '2.16', '-', '2020-02-27 13:54:18', '2020-02-27 13:54:18', 1, 1),
(109, 1, 'Current flows in the semi-conductors through', '', 'top', 'electrons', 'electron and holes', 'holes', 'All of these', 'B', 109, 1, '-', '-', 1, '2.16', '-', '2020-02-27 13:54:18', '2020-02-27 13:54:18', 1, 1),
(110, 1, 'For a given Voltage V, if resistance is changed from R to (R/m), power consumed changes from P to', '', 'top', '$$\\frac{P}{m}$$', '$$\\frac{P}{m^{2}}$$', '$$m P$$', '$$m^{2} p$$', 'C', 110, 1, '-', '-', 1, '2.16', '-', '2020-02-27 13:54:18', '2020-02-27 13:54:18', 1, 1),
(111, 1, 'What is the power output of a 1.5 v ideal battery which is delivering a current of 0.3 A', '', 'top', '0.45 W', '4.5 W', '45 W', '3 W', 'A', 111, 1, '-', '-', 1, '2.16', '-', '2020-02-27 13:54:18', '2020-02-27 13:54:18', 1, 1),
(112, 1, 'A dynamo develops 0.4 A at 6 V. The energy which is generates in one second is', '', 'top', '3 J', '6 J', '12 J', '0.083J', 'A', 112, 1, '-', '-', 1, '2.16', '-', '2020-02-27 13:54:18', '2020-02-27 13:54:18', 1, 1),
(113, 1, 'Appliances based on heating effect of current work on', '', 'top', 'only a.c', 'only d.c', 'neither a.c nor d.c', 'both (a) and (b)', 'D', 113, 1, '-', '-', 1, '2.16', '-', '2020-02-27 13:54:18', '2020-02-27 13:54:18', 1, 1),
(114, 1, 'A house is served by a supply line of 220 V in a circuit protected by fuse marked 9 A. The maximum number of 60 W lamps in parallel that can be turned on is', '', 'top', '32', '33', '44', 'none of these', 'B', 114, 1, '-', '-', 1, '2.16', '-', '2020-02-27 13:54:18', '2020-02-27 13:54:18', 1, 1),
(115, 1, 'The current capacity of a storage cell is 3. The maximum current it can supply for half an hour is', '', 'top', '1.5 A', '2.5 A', '6:00 AM', '4.5 A', 'C', 115, 1, '-', '-', 1, '2.16', '-', '2020-02-27 13:54:18', '2020-02-27 13:54:18', 1, 1),
(116, 1, 'The rate of heating of 10 A a.c. current is the same as the rate of heating of a d.c. current of', '', 'top', '5:00 AM', '10:00 AM', '$$5 \\sqrt{2} A$$', '$$10 \\sqrt{2} A$$', 'B', 116, 1, '-', '-', 1, '2.16', '-', '2020-02-27 13:54:18', '2020-02-27 13:54:18', 1, 1),
(117, 1, 'Of the two bulbs in a house, one glows brighter than the other. Which of the two has a larger resistance ?', '', 'top', 'The brighter bult', 'The dim bulb', 'Both have same resistance', 'The brightness does not depend upon the resistance', 'B', 117, 1, '-', '-', 1, '2.16', '-', '2020-02-27 13:54:18', '2020-02-27 13:54:18', 1, 1),
(118, 1, 'If the cell is short circuited, its terminal potential difference and efficiency are', '', 'top', '1', '-1', '$$\\infty$$', 'zero', 'D', 118, 1, '-', '-', 1, '2.16', '-', '2020-02-27 13:54:18', '2020-02-27 13:54:18', 1, 1),
(119, 1, 'Emf of a cell is measured in', '', 'top', 'Vm-1', 'Jm-1', 'Nm', 'JC-1', 'D', 119, 1, '-', '-', 1, '2.16', '-', '2020-02-27 13:54:18', '2020-02-27 13:54:18', 1, 1),
(120, 1, 'Dimensions of internal resistance of cell', '', 'top', '$$\\left[\\mathrm{ML}^{2} \\mathrm{T}^{-2}\\right]$$', '$$\\left[\\mathrm{ML}^{2} \\mathrm{T}^{-3} \\mathrm{A}^{-1}\\right]$$', '$$\\left[\\mathrm{ML}^{2} \\mathrm{T}^{-3} \\mathrm{A}^{-2}\\right]$$', '$$\\left[\\mathrm{M}^{0} \\mathrm{L}^{0} \\mathrm{T}^{0} \\mathrm{A}^{0}\\right]$$', 'C', 120, 1, '-', '-', 1, '2.16', '-', '2020-02-27 13:54:18', '2020-02-27 13:54:18', 1, 1),
(121, 1, 'A potentiometer is an ideal', '', 'top', 'ammeter', 'voltmeter ', 'galvanometer', 'thermocouple ', 'A', 121, 1, '-', '-', 1, '2.17', '-', '2020-02-27 13:54:18', '2020-02-27 13:54:18', 1, 1),
(122, 1, 'Copper wire is used as connecting wire because', '', 'top', 'copper has high electrical resistivity ', 'copper has low electrical resistivity ', 'copper has low electrical conductivity ', 'copper has high electrical conductivity ', 'B,D', 122, 1, '-', '-', 1, '2.17', '-', '2020-02-27 13:54:18', '2020-02-27 13:54:18', 1, 1),
(123, 1, 'In the Wheatstone bridge circuit, P = 3 ', '', 'top', '12 ', '8 ', '6 ', '3 ', 'B', 123, 1, '-', '-', 1, '2.17', '-', '2020-02-27 13:54:18', '2020-02-27 13:54:18', 1, 1),
(124, 1, 'The charge flowing in a conductor varies with time as, where ', '', 'top', '$$I=\\alpha$$', '$$I=\\alpha^{2}$$', '$$I=\\alpha^{-1}$$', 'none of these', 'A', 124, 1, '-', '-', 1, '2.17', '-', '2020-02-27 13:54:18', '2020-02-27 13:54:18', 1, 1),
(125, 1, 'A wire (of resistance r) is drawn into double its length and half its original cross-section. Then the increase in its resistance is', '', 'top', '$$\\left[\\mathrm{ML}^{2} \\mathrm{T}^{-2} \\mathrm{A}^{-2}\\right]$$', '$$\\left[\\mathrm{Ml}^{3} \\mathrm{T}^{-2} \\mathrm{A}^{-1}\\right]$$', '$$\\left[\\mathrm{ML}^{2} \\mathrm{T}^{-3} \\mathrm{A}^{-2}\\right]$$', '$$\\left[\\mathrm{ML}^{3} \\mathrm{T}^{-3} \\mathrm{A}^{-2}\\right]$$', 'C', 125, 1, '-', '-', 1, '2.17', '-', '2020-02-27 13:54:18', '2020-02-27 13:54:18', 1, 1),
(126, 1, 'The dimensional formula for resistivity of copper is', '', 'top', '$$\\left[\\mathrm{M}^{-1} \\mathbf{L}^{-2} \\mathrm{T}^{3} \\mathrm{A}^{2}\\right]$$', '$$\\left[\\mathrm{M}^{-1} \\mathrm{L}^{2} \\mathrm{T}^{-3} \\mathrm{A}^{-2}\\right]$$', '$$\\left[\\mathrm{M}^{-1} \\mathbf{L}^{-2} \\mathrm{T}^{-3} \\mathrm{A}^{2}\\right]$$', 'none of these', 'D', 126, 1, '-', '-', 1, '2.17', '-', '2020-02-27 13:54:18', '2020-02-27 13:54:18', 1, 1),
(127, 1, 'The dimensional formula for conductance is given by', '', 'top', '$$10^{23} m^{-3}$$', '$$10^{25} \\mathrm{m}^{-3}$$', '$$10^{27} m^{-3}$$', '$$10^{29} \\mathrm{m}^{-3}$$', 'A', 127, 1, '-', '-', 1, '2.17', '-', '2020-02-27 13:54:18', '2020-02-27 13:54:18', 1, 1),
(128, 1, 'What is the order of the number of free electrons in metals?', '', 'top', '$$10^{23} m^{-3}$$', '$$10^{25} \\mathrm{m}^{-3}$$', '$$10^{27} m^{-3}$$', '$$10^{29} \\mathrm{m}^{-3}$$', 'D', 128, 1, '-', '-', 1, '2.17', '-', '2020-02-27 13:54:18', '2020-02-27 13:54:18', 1, 1),
(129, 1, 'What is the conductance of a wire of resistance 2 m ', '', 'top', '100S', '200S', '500S', 'none of these', 'C', 129, 1, '-', '-', 1, '2.17', '-', '2020-02-27 13:54:18', '2020-02-27 13:54:18', 1, 1),
(130, 1, 'A current of 2 A flows in a system of conductors as shown below. The potential difference is', '', 'top', '$$-2 V$$', '$$-1 \\mathrm{V}$$', '$$+1 \\mathrm{V}$$', '$$+2 \\mathrm{V}$$', 'C', 130, 1, '-', '-', 1, '2.17', '-', '2020-02-27 13:54:18', '2020-02-27 13:54:18', 1, 1),
(131, 1, 'If the resistivity of an alloy is p\' and that of the constituent metals is p, then', '', 'top', '$$\\rho^{\\prime}>\\rho$$', '$$r^{\\prime}<\\rho$$', '$$\\rho^{\\prime}=\\rho$$', 'nothing can be decided', 'A', 131, 1, '-', '-', 1, '2.17', '-', '2020-02-27 13:54:18', '2020-02-27 13:54:18', 1, 1),
(132, 1, 'The appropriate material to be used in the construction of resistance boxes (out of the following) is', '', 'top', 'copper ', 'aluminium', 'iron', 'manganin', 'D', 132, 1, '-', '-', 1, '2.17', '-', '2020-02-27 13:54:18', '2020-02-27 13:54:18', 1, 1),
(133, 1, 'Figure represents part of closed circuit. What Copper Is is the potential difference between Pand Q?', '', 'top', '$$+5 \\mathrm{V}$$', '$$-7 v$$', '$$+9 V$$', '$$-9 V$$', 'C', 133, 1, '-', '-', 1, '2.17', '-', '2020-02-27 13:54:18', '2020-02-27 13:54:18', 1, 1),
(134, 1, 'Three resistances, each of 8 ', '', 'top', '$$\\frac{8}{3} \\Omega$$', '$$\\frac{16}{3} \\Omega$$', '$$24 \\Omega$$', 'none of these', 'B', 134, 1, '-', '-', 1, '2.18', '-', '2020-02-27 13:54:18', '2020-02-27 13:54:18', 1, 1),
(135, 1, 'The emf of a generator is 6 V and internal resistance is 0.5 k ', '', 'top', '1 V', '5 V', '10 V', '10-3 V', 'B', 135, 1, '-', '-', 1, '2.18', '-', '2020-02-27 13:54:18', '2020-02-27 13:54:18', 1, 1),
(136, 1, 'Three resistors of 4 ', '', 'top', '1A', '0.5A', '2A', 'none of these', 'A', 136, 1, '-', '-', 1, '2.18', '-', '2020-02-27 13:54:18', '2020-02-27 13:54:18', 1, 1),
(137, 1, 'What is the current I in the circuit shown in Figure?', '', 'top', '1A', '2A', '0.5A', 'none of these', 'A', 137, 1, '-', '-', 1, '2.18', '-', '2020-02-27 13:54:18', '2020-02-27 13:54:18', 1, 1),
(138, 1, 'A carbon resistance reads Red- Red- Red?Black. What is its resistance?', '', 'top', '2.2 k', '0.22 k', '22 k', '220 k', 'C', 138, 1, '-', '-', 1, '2.18', '-', '2020-02-27 13:54:18', '2020-02-27 13:54:18', 1, 1),
(139, 1, 'In the network in Figure, the equivalent resistance between P and Q is', '', 'top', ' r', '2 r', '$$\\frac{r}{2}$$', 'none of these', 'C', 139, 1, '-', '-', 1, '2.18', '-', '2020-02-27 13:54:18', '2020-02-27 13:54:18', 1, 1),
(140, 1, 'Figure shows currents in a part of electrical circuit, then the value of I (in ampere) is', '', 'top', '1.7A', '2.7A', '3.7A', 'none of these', 'A', 140, 1, '-', '-', 1, '2.18', '-', '2020-02-27 13:54:18', '2020-02-27 13:54:18', 1, 1),
(141, 1, 'Ifa wire of resistivity P is stretched to do its length, then its new resistivity will', '', 'top', 'be half', 'be double', 'be four times ', 'not Change at all', 'D', 141, 1, '-', '-', 1, '2.18', '-', '2020-02-27 13:54:18', '2020-02-27 13:54:18', 1, 1),
(142, 1, 'A uniform wire of length l and radius r a resistance of 100 ', '', 'top', '200 ', '400 ', '800 ', 'none of these', 'B', 142, 1, '-', '-', 1, '2.18', '-', '2020-02-27 13:54:18', '2020-02-27 13:54:18', 1, 1),
(143, 1, 'A wire is stretched 50%. What is the percentage change in its resistance?', '', 'top', '50%', '100%', '125%', '200%', 'C', 143, 1, '-', '-', 1, '2.18', '-', '2020-02-27 13:54:18', '2020-02-27 13:54:18', 1, 1),
(144, 1, 'If Figure shows currents in a part of electrical circuit, then the value of I (in amperes) is given by', '', 'top', '0.3A', '0.5A', '1.3A', 'none of these', 'A', 144, 1, '-', '-', 1, '2.18', '-', '2020-02-27 13:54:18', '2020-02-27 13:54:18', 1, 1),
(145, 1, 'What is the resistance between A and B of the network in Figure?', '', 'top', '23.5 ', '27.5 ', '32.5 ', 'none of these', 'B', 145, 1, '-', '-', 1, '2.18', '-', '2020-02-27 13:54:18', '2020-02-27 13:54:18', 1, 1),
(146, 1, 'What is the equivalent resistance between A and B in the network in Figure?', '', 'top', '9.6 ', '15.6 ', '12.4 ', 'none of these', 'A', 146, 1, '-', '-', 1, '2.19', '-', '2020-02-27 13:54:18', '2020-02-27 13:54:18', 1, 1),
(147, 1, 'A wire has a resistance of 12 ', '', 'top', '2.67 ', '4.63 ', '5.23 ', 'none of these', 'A', 147, 1, '-', '-', 1, '2.19', '-', '2020-02-27 13:54:18', '2020-02-27 13:54:18', 1, 1),
(148, 1, 'What is the equivalent resistance of the network between points A and B shown in Figure?', '', 'top', '$$\\frac{17}{3} \\Omega$$', '$$11 \\Omega$$', '$$\\frac{13}{3} \\Omega$$', 'none of these', 'A', 148, 1, '-', '-', 1, '2.19', '-', '2020-02-27 13:54:18', '2020-02-27 13:54:18', 1, 1),
(149, 1, 'Find the equivalent resistance of the network between A and B when K is open?', '', 'top', '7.2 ', '8.4 ', '10.6 ', 'none of these', 'A', 149, 1, '-', '-', 1, '2.19', '-', '2020-02-27 13:54:18', '2020-02-27 13:54:18', 1, 1),
(150, 1, 'The dimensional formula for potential gradient is', '', 'top', '$$\\left[\\mathrm{ML}^{2} \\mathrm{T}^{-2} \\mathrm{A}^{-1}\\right]$$', '$$\\left[\\mathrm{MLT}^{-3} \\mathrm{A}^{-1}\\right]$$', '$$\\left[\\mathrm{ML}^{-2} \\mathrm{T}^{-3} \\mathrm{A}^{-1}\\right]$$', 'none of these', 'B', 150, 1, '-', '-', 1, '2.19', '-', '2020-02-27 13:54:18', '2020-02-27 13:54:18', 1, 1),
(151, 1, 'A graph is plotted taking the fall of potential (V) across any portion of the potentiometer wire and length (l) of that portion. Assuming that the wire has a uniform area of cross-section and a constant current is flowing through these it, the variation is correctly shown by', '', 'top', 'IM', 'IM', 'IM', 'IM', 'B', 151, 1, '-', '-', 1, '2.19', '-', '2020-02-27 13:54:18', '2020-02-27 13:54:18', 1, 1),
(152, 1, 'Choose the scalar physical quantity:', '', 'top', 'current density', 'electric intensity', 'potential gradient', 'drift velocity', 'C', 152, 1, '-', '-', 1, '2.19', '-', '2020-02-27 13:54:18', '2020-02-27 13:54:18', 1, 1),
(153, 1, 'In a simple potentiometer circuit, AB = 1 m and X and Y have values 5 ', '', 'top', '5 ', '10 ', '15 ', 'none of these', 'B', 153, 1, '-', '-', 1, '2.19', '-', '2020-02-27 13:54:18', '2020-02-27 13:54:18', 1, 1),
(154, 1, 'In the circuit in below Figure, if no current flows through CO, the value of X is', '', 'top', '2 ', '4 ', '1 ', 'none of these', 'B', 154, 1, '-', '-', 1, '2.19', '-', '2020-02-27 13:54:18', '2020-02-27 13:54:18', 1, 1),
(155, 1, 'What will be the vlaue of X so that the potential difference between B and D is zero?', '', 'top', '24 ', '12 ', '18 ', 'none of these', 'C', 155, 1, '-', '-', 1, '2.2', '-', '2020-02-27 13:54:18', '2020-02-27 13:54:18', 1, 1),
(156, 1, 'Figure represents a balanced Wheatstone?s  Bridge circuit. What is the value of X?', '', 'top', '15 ', '20 ', '25 ', '30 ', 'C', 156, 1, '-', '-', 1, '2.2', '-', '2020-02-27 13:54:18', '2020-02-27 13:54:18', 1, 1),
(157, 1, 'An electric heating element consumes 500 W, when connected to a 100 V line. If the line voltage becomes 150 V, the power consumed will be', '', 'top', '500 W', '750 W', '1000 W', '1125 W', 'D', 157, 1, '-', '-', 1, '2.2', '-', '2020-02-27 13:54:18', '2020-02-27 13:54:18', 1, 1),
(158, 1, 'A uniform wire connected across a supply produces heat H per second. If the wire is cut into three equal parts and all the parts are connected in parallel across the same supply the heat Produced Per second will be', '', 'top', '$$\\frac{H}{9}$$', '9 H', '3 H', '$$\\frac{H}{3}$$', 'B', 158, 1, '-', '-', 1, '2.2', '-', '2020-02-27 13:54:18', '2020-02-27 13:54:18', 1, 1),
(159, 1, 'What is the amount of heat Produced per minute in the resistance R2, shown in Figure?', '', 'top', '640 J', '1280 J', '960 J', '320 J', 'B', 159, 1, '-', '-', 1, '2.2', '-', '2020-02-27 13:54:18', '2020-02-27 13:54:18', 1, 1),
(160, 1, 'Three 60 W, 120 V light bulbs are connected across a 120 V power line as Shown in Figure. The total power dissipated in the three bulbs is', '', 'top', '60 W', '180 W', '90 W', '40 W', 'D', 160, 1, '-', '-', 1, '2.2', '-', '2020-02-27 13:54:18', '2020-02-27 13:54:18', 1, 1),
(161, 1, 'Masses of three wires are in the ratio of 1:3:5. Their lengths are in the ratio of 5:3:1. When connected in series with a battery, the ratio of heat produced in them will be', '', 'top', '1:03:05', '5:03:01', '0.053530093', '125:15:01', 'D', 161, 1, '-', '-', 1, '2.2', '-', '2020-02-27 13:54:18', '2020-02-27 13:54:18', 1, 1),
(162, 1, 'Fuse wire should have', '', 'top', 'low resistance, high melting point', 'low resistance, low melting point', 'high resistance, low melting point', 'high resistance, high melting point', 'C', 162, 1, '-', '-', 1, '2.2', '-', '2020-02-27 13:54:18', '2020-02-27 13:54:18', 1, 1),
(163, 1, 'If 2.2 kW power is transmitted through a 10 ', '', 'top', '0.1 W ', '1 W ', '10 W ', '100 W ', 'A', 163, 1, '-', '-', 1, '2.2', '-', '2020-02-27 13:54:18', '2020-02-27 13:54:18', 1, 1),
(164, 1, 'The figure shows a network of currents. The value of current I will be', '', 'top', '6:00 AM', '8:00 AM', '12:00 AM', '17 A', 'D', 164, 1, '-', '-', 1, '2.2', '-', '2020-02-27 13:54:18', '2020-02-27 13:54:18', 1, 1),
(165, 1, 'Which of the following graphs best represents an ohmic resistance', '', 'top', 'IM', 'IM', 'IM', 'IM', 'D', 165, 1, '-', '-', 1, '2.21', '-', '2020-02-27 13:54:18', '2020-02-27 13:54:18', 1, 1),
(166, 1, '2 S, 4 S and 6 S are the conductances of three conductors. When they are joined in parallel, their equivalent conductance will be', '', 'top', '12S', '$$\\left(\\frac{12}{11}\\right) \\mathrm{s}$$', '$$\\left(\\frac{11}{12}\\right) \\mathrm{S}$$', '$$\\left(\\frac{1}{12}\\right) \\mathrm{s}$$', 'A', 166, 1, '-', '-', 1, '2.21', '-', '2020-02-27 13:54:18', '2020-02-27 13:54:18', 1, 1),
(167, 1, 'In the circuit shown in Figure, the voltmeter reads 30 volt. What is the resistance of the voltmeter?', '', 'top', '1200 ', '800 ', '400 ', '200 ', 'A', 167, 1, '-', '-', 1, '2.21', '-', '2020-02-27 13:54:18', '2020-02-27 13:54:18', 1, 1),
(168, 1, 'In the following circuit, the reading of the ammeter is (take the internal resistance of battery as zero)', '', 'top', '$$\\frac{10}{9}$$', '$$\\frac{5}{3} \\mathrm{A}$$', '2A', '$$\\frac{1}{2} \\mathrm{A}$$', 'C', 168, 1, '-', '-', 1, '2.21', '-', '2020-02-27 13:54:18', '2020-02-27 13:54:18', 1, 1),
(169, 1, 'In the circuit shown in Figure, the galvanometer deflection is zero. What is the value of X?', '', 'top', '14 ', '7 ', '28 ', '21 ', 'C', 169, 1, '-', '-', 1, '2.21', '-', '2020-02-27 13:54:18', '2020-02-27 13:54:18', 1, 1),
(170, 1, 'In the experiment of potentiometer, at balance point, there is no current in the', '', 'top', 'main circuit', 'galvanometer circuit', 'potentiometer circuit', 'both main and galvanometer circuits', 'B', 170, 1, '-', '-', 1, '2.21', '-', '2020-02-27 13:54:18', '2020-02-27 13:54:18', 1, 1),
(171, 1, 'A resistance of 10 ', '', 'top', '20 ', '40 ', '60 ', '80 ', 'B', 171, 1, '-', '-', 1, '2.21', '-', '2020-02-27 13:54:18', '2020-02-27 13:54:18', 1, 1),
(172, 1, 'The resistance will be least in a wire with dimensions', '', 'top', '$$L, A$$', '$$2 L, A$$', '$$3 L, \\frac{A}{2}$$', '$$\\frac{L}{2}, 2 A$$', 'D', 172, 1, '-', '-', 1, '2.21', '-', '2020-02-27 13:54:18', '2020-02-27 13:54:18', 1, 1),
(173, 1, 'Assertion: Though the direction of electric current is well defined, yet it is treated as a scalar. Reason: Electric current does not follow the laws of vector addition', '', 'top', 'A', 'B ', 'C ', 'D', 'A', 173, 1, '-', '-', 1, '2.22', '-', '2020-02-27 13:54:18', '2020-02-27 13:54:18', 1, 1),
(174, 1, 'Assertion : When a wire is stretched to double its length, its resistivity becomes twice. Reason $$R=\\rho \\frac{l}{A}$$ where r is resistivity, l is length and A is area of cross -section.', '', 'top', 'A', 'B', 'C', 'D', 'D', 174, 1, '-', '-', 1, '2.22', '-', '2020-02-27 13:54:18', '2020-02-27 13:54:18', 1, 1),
(175, 1, 'Assertion : When a wire is stretched to three times its length, its resistance becomes 9 times.  Reason $$R=\\rho \\frac{l}{A}$$', '', 'top', 'A', 'B', 'C', 'D', 'B', 175, 1, '-', '-', 1, '2.22', '-', '2020-02-27 13:54:18', '2020-02-27 13:54:18', 1, 1),
(176, 1, 'Assertion: Units of conductivity are ohm-1 m-1 Reason : It follows from,  $$R=\\rho \\frac{l}{A}=\\frac{1}{\\sigma}$$', '', 'top', 'A', 'B', 'C', 'D', 'A', 176, 1, '-', '-', 1, '2.22', '-', '2020-02-27 13:54:18', '2020-02-27 13:54:18', 1, 1),
(177, 1, 'Assertion: Thhe effective resistance in parallel decreases. Reason: In parallel combination, effective area of cross-section increases.', '', 'top', 'A', 'B', 'C', 'D', 'A', 177, 1, '-', '-', 1, '2.22', '-', '2020-02-27 13:54:18', '2020-02-27 13:54:18', 1, 1),
(178, 1, 'Assertion: Resistance between P and Q is zero. Reason: The three resistances are joined effectively in parallel.', '', 'top', 'A', 'B', 'C', 'D', 'D', 178, 1, '-', '-', 1, '2.22', '-', '2020-02-27 13:54:18', '2020-02-27 13:54:18', 1, 1),
(179, 1, 'Assertion: In a  metre bridge, the length of wire can vary from 1 m to several metres. Reason: Greater the length, better is the accuracy.', '', 'top', 'A', 'B', 'C', 'D', 'D', 179, 1, '-', '-', 1, '2.22', '-', '2020-02-27 13:54:18', '2020-02-27 13:54:18', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_answer`
--

CREATE TABLE `student_answer` (
  `student_answer_id` int(11) NOT NULL,
  `student_register_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `chapter_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `difficult_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer_option` varchar(2) NOT NULL,
  `actual_answer_option` varchar(2) NOT NULL,
  `is_correct_answer` tinyint(1) NOT NULL,
  `is_skipped` tinyint(1) NOT NULL,
  `answer_attempt` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_log`
--

CREATE TABLE `student_log` (
  `student_log_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL DEFAULT 1,
  `subject_name` varchar(255) NOT NULL DEFAULT '',
  `difficult_id` int(11) NOT NULL DEFAULT 0,
  `difficult_name` varchar(255) NOT NULL DEFAULT '',
  `chapter_id` int(11) NOT NULL DEFAULT 0,
  `chapter_name` varchar(255) NOT NULL DEFAULT '',
  `topic_id` int(11) NOT NULL DEFAULT 1,
  `topic_name` varchar(255) NOT NULL DEFAULT '',
  `student_register_id` int(11) NOT NULL DEFAULT 1,
  `total_questions` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_log`
--

INSERT INTO `student_log` (`student_log_id`, `subject_id`, `subject_name`, `difficult_id`, `difficult_name`, `chapter_id`, `chapter_name`, `topic_id`, `topic_name`, `student_register_id`, `total_questions`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 1, 'Objective PHYSICS for NEET', 1, '40', 1, 'National Eligability Entrance Test (NEET)', 1, '$$\\varepsilon^{2} I=P$$', 1, 179, '2020-03-02 12:33:50', 1, '2020-03-02 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_log_detail`
--

CREATE TABLE `student_log_detail` (
  `student_log_detail_id` int(11) NOT NULL,
  `student_log_id` int(11) NOT NULL DEFAULT 0,
  `question_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `image_path` varchar(500) NOT NULL DEFAULT '',
  `direction` varchar(15) NOT NULL DEFAULT '',
  `a` text DEFAULT NULL,
  `b` text DEFAULT NULL,
  `c` text DEFAULT NULL,
  `d` text DEFAULT NULL,
  `answer` varchar(5) NOT NULL DEFAULT '',
  `question_no` int(11) NOT NULL DEFAULT 0,
  `student_answer` varchar(5) NOT NULL DEFAULT '',
  `explanation` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `difficult_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student_register`
--

CREATE TABLE `student_register` (
  `student_register_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `profile_image` varchar(255) NOT NULL,
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
  `status` tinyint(4) NOT NULL,
  `block_reason` varchar(255) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_register`
--

INSERT INTO `student_register` (`student_register_id`, `user_name`, `student_name`, `profile_image`, `gender`, `parent_name`, `mobile`, `city`, `pin`, `school_name`, `standard`, `password`, `confirm_password`, `email`, `status`, `block_reason`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'aumak7639', 'Umaseakr', 'uploads/46d997ef4f485dd5465d4715c61c23cf.png', 'male', 'Arumugam', '7639600998', 'Chennai', '600073', 'Yg studio', '10th STD State Board', '123456', '123456', 'umasekar098@gmail.com', 0, '', '0000-00-00', '0000-00-00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `student_register_login`
--

CREATE TABLE `student_register_login` (
  `student_register_login_id` int(11) NOT NULL,
  `student_register_id` int(11) NOT NULL,
  `login_at` date NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_register_login`
--

INSERT INTO `student_register_login` (`student_register_login_id`, `student_register_id`, `login_at`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 1, '2020-03-02', '2020-03-02 12:07:56', '2020-03-02 12:07:56', 0, 0),
(2, 1, '2020-03-02', '2020-03-02 12:08:16', '2020-03-02 12:08:16', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `standard` varchar(255) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `description` varchar(500) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL DEFAULT 1,
  `updated_by` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `name`, `standard`, `image_path`, `description`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Objective PHYSICS for NEET', '', '', '', 1, '2020-02-27 13:53:42', '2020-02-27 13:53:42', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `topic`
--

CREATE TABLE `topic` (
  `topic_id` int(11) NOT NULL,
  `chapter_id` int(11) NOT NULL DEFAULT 0,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `description` varchar(255) NOT NULL DEFAULT '',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL DEFAULT 1,
  `updated_by` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topic`
--

INSERT INTO `topic` (`topic_id`, `chapter_id`, `name`, `description`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 1, '$$\\varepsilon^{2} I=P$$', '', '2020-02-28 04:59:28', '2020-02-27 13:53:42', 1, 1);

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
-- Indexes for table `chapter`
--
ALTER TABLE `chapter`
  ADD PRIMARY KEY (`chapter_id`);

--
-- Indexes for table `difficult`
--
ALTER TABLE `difficult`
  ADD PRIMARY KEY (`difficult_id`);

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
-- Indexes for table `student_log`
--
ALTER TABLE `student_log`
  ADD PRIMARY KEY (`student_log_id`);

--
-- Indexes for table `student_log_detail`
--
ALTER TABLE `student_log_detail`
  ADD PRIMARY KEY (`student_log_detail_id`);

--
-- Indexes for table `student_register`
--
ALTER TABLE `student_register`
  ADD PRIMARY KEY (`student_register_id`);

--
-- Indexes for table `student_register_login`
--
ALTER TABLE `student_register_login`
  ADD PRIMARY KEY (`student_register_login_id`);

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
-- AUTO_INCREMENT for table `chapter`
--
ALTER TABLE `chapter`
  MODIFY `chapter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `difficult`
--
ALTER TABLE `difficult`
  MODIFY `difficult_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;

--
-- AUTO_INCREMENT for table `student_answer`
--
ALTER TABLE `student_answer`
  MODIFY `student_answer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_log`
--
ALTER TABLE `student_log`
  MODIFY `student_log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student_log_detail`
--
ALTER TABLE `student_log_detail`
  MODIFY `student_log_detail_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_register`
--
ALTER TABLE `student_register`
  MODIFY `student_register_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student_register_login`
--
ALTER TABLE `student_register_login`
  MODIFY `student_register_login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `topic`
--
ALTER TABLE `topic`
  MODIFY `topic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
