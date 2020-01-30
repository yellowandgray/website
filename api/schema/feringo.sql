-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2020 at 07:55 AM
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
-- Database: `feringo`
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
(1, 1, 'L - 1 LAWS OF MOTION', '<strong>Lorem Ipsum</strong><span>&#160;is simply dummy text of the printing and typesetting industry.&#160;</span>', 1, '2020-01-29 09:33:57', '0000-00-00 00:00:00', 1, 1),
(2, 1, ' L-2 OPTICS', '<strong>Lorem Ipsum</strong><span>&#160;is simply dummy text of the printing and typesetting industry.&#160;</span><br>', 1, '2020-01-29 09:34:05', '0000-00-00 00:00:00', 1, 1),
(3, 1, 'L-3 THERMAL PHYSICS', '<strong>Lorem Ipsum</strong><span>&#160;is simply dummy text of the printing and typesetting industry.&#160;</span>', 1, '2020-01-29 09:34:20', '0000-00-00 00:00:00', 1, 1),
(4, 1, 'L-4 ELECTRICITY', '<strong>Lorem Ipsum</strong><span>&#160;is simply dummy text of the printing and typesetting industry.&#160;</span>', 1, '2020-01-29 12:02:47', '0000-00-00 00:00:00', 1, 1),
(5, 1, 'L-5 ACOUSTICS', '<strong>Lorem Ipsum</strong><span>&#160;is simply dummy text of the printing and typesetting industry.&#160;</span>', 1, '2020-01-29 12:03:05', '0000-00-00 00:00:00', 1, 1),
(6, 1, 'L-6 NUCLEAR PHYSICS', '<strong>Lorem Ipsum</strong><span>&#160;is simply dummy text of the printing and typesetting industry.&#160;</span>', 1, '2020-01-29 12:03:24', '0000-00-00 00:00:00', 1, 1),
(7, 1, 'L-7 Chemistry - ATOMS AND MOLECULES', '<strong>Lorem Ipsum</strong><span>&#160;is simply dummy text of the printing and typesetting industry.&#160;</span>', 1, '2020-01-29 12:04:28', '0000-00-00 00:00:00', 1, 1),
(8, 1, 'L-8', '<strong>Lorem Ipsum</strong><span>&#160;is simply dummy text of the printing and typesetting industry.&#160;</span>', 1, '2020-01-29 09:31:38', '0000-00-00 00:00:00', 1, 1),
(9, 1, 'L-9', '<strong>Lorem Ipsum</strong><span>&#160;is simply dummy text of the printing and typesetting industry.&#160;</span>', 1, '2020-01-29 09:31:59', '0000-00-00 00:00:00', 1, 1),
(10, 1, 'L-10', '<strong>Lorem Ipsum</strong><span>&#160;is simply dummy text of the printing and typesetting industry.&#160;</span>', 1, '2020-01-29 09:32:11', '0000-00-00 00:00:00', 1, 1),
(11, 1, 'L-11', '<strong>Lorem Ipsum</strong><span>&#160;is simply dummy text of the printing and typesetting industry.&#160;</span>', 1, '2020-01-29 09:32:35', '0000-00-00 00:00:00', 1, 1),
(12, 2, 'test', 'test', 1, '2020-01-30 06:46:07', '0000-00-00 00:00:00', 1, 1);

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
(1, '40', '<strong>Lorem Ipsum</strong><span>&#160;is simply dummy text of the printing and typesetting industry.&#160;</span>', NULL, NULL, 1, 1),
(2, '60', '<strong>Lorem Ipsum</strong><span>&#160;is simply dummy text of the printing and typesetting industry.&#160;</span>', NULL, NULL, 1, 1),
(3, '80', '<strong>Lorem Ipsum</strong><span>&#160;is simply dummy text of the printing and typesetting industry.&#160;</span>', NULL, NULL, 1, 1),
(4, '100', '<strong>Lorem Ipsum</strong><span>&#160;is simply dummy text of the printing and typesetting industry.&#160;</span>', NULL, NULL, 1, 1);

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
  `a` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `b` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `c` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `d` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `answer` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `question_no` int(11) NOT NULL,
  `difficult_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`question_id`, `topic_id`, `name`, `image_path`, `direction`, `a`, `b`, `c`, `d`, `answer`, `question_no`, `difficult_id`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 1, '<span>Push or pull is called as &#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;..</span>', '', 'bottom', 'motion', 'force', 'momentum', '', 'B', 1, 1, '2020-01-29 10:15:27', '0000-00-00 00:00:00', 0, 0),
(2, 1, 'The three laws of motion was proposed by &#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;', '', 'bottom', 'Sir Issac Newton', 'Alexander Heming', 'Michael Faraday', '', 'A', 2, 3, '2020-01-29 10:15:40', '0000-00-00 00:00:00', 0, 0),
(3, 1, '<span>&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;.is the branch of physics that deals&#10;with the effect of force on bodies.</span>', '', 'bottom', 'Gravitation', 'Acceleration', 'Mechanics', '', 'C', 3, 3, '2020-01-29 10:15:47', '0000-00-00 00:00:00', 0, 0),
(4, 1, '<span>&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;deals with the bodies, which are at rest.</span>', '', 'bottom', 'Status', 'Dynamics', 'Kinematics', '', 'A', 4, 3, '2020-01-29 10:15:56', '0000-00-00 00:00:00', 0, 0),
(5, 1, '<span>&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;is the study of moving bodies under the&#10;action of forces.</span>', '', 'bottom', 'Statics', 'Dynamics', 'Kinetics', '', 'B', 5, 4, '2020-01-29 10:16:14', '0000-00-00 00:00:00', 0, 0),
(6, 1, '<span>&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;..deals with the motion of bodies&#10;without considering the cause of motion.</span>', '', 'bottom', 'Kinetics', 'Kinematics', 'Dynamics', '', 'B', 6, 4, '2020-01-29 10:16:23', '0000-00-00 00:00:00', 0, 0),
(7, 1, '<span>&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;.deals with the motion of bodies&#10;considering the cause of motion.</span>', '', 'bottom', 'Statics', 'Dynamics', 'Kinetics', '', 'C', 7, 4, '2020-01-29 10:16:38', '0000-00-00 00:00:00', 0, 0),
(8, 2, '<span>&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;..was a Greek philosopher and scientist.</span>', '', 'bottom', 'Socrates', 'Aristotle', 'Galileo', '', 'B', 8, 1, '2020-01-29 10:25:34', '0000-00-00 00:00:00', 0, 0),
(9, 2, '<span>Motion which naturally comes to rest without any&#10;external influence of the force is termed as &#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;..</span><br>', '', 'bottom', 'Natural motion', 'force dependent', 'violent motion', '', 'A', 9, 3, '2020-01-29 10:25:39', '0000-00-00 00:00:00', 0, 0),
(10, 2, '<span>Natural motion is &#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;</span>', '', 'bottom', 'Force dependent', 'force independent', 'attractive force', '', 'B', 10, 3, '2020-01-29 10:26:36', '0000-00-00 00:00:00', 0, 0),
(11, 2, '<span>Force needed to make the bodies move from their&#10;natural state is called &#8230;&#8230;&#8230;&#8230;&#8230;&#8230;</span>', '', 'bottom', 'Violent motion', 'force independent', 'natural motion', '', 'A', 11, 3, '2020-01-29 10:30:00', '0000-00-00 00:00:00', 0, 0),
(12, 2, '<span>Violent motion is &#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;</span>', '', 'bottom', 'Force dependent', 'force independent', 'natural motion', '', 'A', 12, 3, '2020-01-29 10:31:29', '0000-00-00 00:00:00', 0, 0),
(13, 2, '<span>&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;proposed the concepts about force, motion&#10;and inertia of bodies.</span>', '', 'bottom', 'Socrates', 'Galileo', 'Aristotle', '', 'B', 13, 3, '2020-01-29 10:33:32', '0000-00-00 00:00:00', 0, 0),
(14, 3, '<span>The inherent property of a body to resist any&#10;change in its state of rest or the state of uniform motion is known as&#10;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;.</span>', '', 'bottom', 'Inertia ', 'torque', 'gravity', '', 'A', 14, 1, '2020-01-29 10:35:42', '0000-00-00 00:00:00', 0, 0),
(15, 3, '<span>The resistance of a body to change its state of&#10;rest is called &#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;..</span>', '', 'bottom', 'Inertia of motion', 'inertia of direction', 'inertia of rest', '', 'C', 15, 1, '2020-01-29 10:44:03', '0000-00-00 00:00:00', 0, 0),
(16, 3, '<span>The resistance of a body to change its state of&#10;motion is called&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;</span>', '', 'bottom', 'Inertia of rest', 'inertia of motion', 'inertia of direction', '', 'B', 16, 1, '2020-01-29 10:45:12', '0000-00-00 00:00:00', 0, 0),
(17, 3, '<span>The resistance of a body to change its direction&#10;of motion is &#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;</span>', '', 'bottom', 'inertia of direction', 'inertia of rest', 'inertia of motion', '', 'A', 17, 1, '2020-01-29 11:22:17', '0000-00-00 00:00:00', 0, 0),
(18, 3, '<span>An athlete runs some distance before jumping is&#10;an example of &#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;..</span>', '', 'bottom', 'inertia of motion', 'inertia of direction', 'inertia of rest', '', 'A', 18, 1, '2020-01-29 11:44:58', '0000-00-00 00:00:00', 0, 0),
(19, 3, '<span>White during a car, a person tends to lean&#10;sideways when a sharp turn is made is due to &#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;.</span>', '', 'top', 'inertia of motion', 'inertia of direction', 'inertia of rest', '', 'A', 19, 1, '2020-01-29 11:45:48', '0000-00-00 00:00:00', 0, 0),
(20, 3, '<span>Leaves and fruits detach and fall down from the&#10;branches if a tree after shaking is because of &#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;</span>', '', 'bottom', 'inertia of direction', 'inertia of rest', 'inertia of motion', '', 'B', 20, 1, '2020-01-29 11:46:32', '0000-00-00 00:00:00', 0, 0),
(21, 4, '<span>Linear momentum measures the &#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;.</span>', '', 'bottom', 'Velocity of the object', 'input of a force on a body', 'mass of the object', '', 'B', 21, 2, '2020-01-29 11:47:29', '0000-00-00 00:00:00', 0, 0),
(22, 4, '<span>The product of mass and velocity of a moving&#10;gives the magnitude of &#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;..</span>', '', 'bottom', 'inertia', 'momentum', 'linear momentum', '', 'C', 22, 2, '2020-01-29 11:48:10', '0000-00-00 00:00:00', 0, 0),
(23, 4, '<span>Linear momentum acts in the direction of the&#10;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;..of the object.</span>', '', 'bottom', 'velocity', 'acceleration', 'gravity', '', 'A', 23, 2, '2020-01-29 11:48:49', '0000-00-00 00:00:00', 0, 0),
(24, 4, '<span>Linear momentum is a &#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;quantity.</span>', '', 'bottom', 'scalar', 'vector', 'algebraic', '', 'B', 24, 2, '2020-01-29 11:49:30', '0000-00-00 00:00:00', 0, 0),
(25, 4, '<span>Linear momentum =&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;.</span>', '', 'bottom', 'force x mass', 'acceleration x weight', 'mass x velocity', '', 'C', 25, 2, '2020-01-29 11:50:05', '0000-00-00 00:00:00', 0, 0),
(26, 4, 'Linear momentum helps to measure the &#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;of a force.', '', 'bottom', 'magnitude', 'force', 'velocity', '', 'A', 26, 1, '2020-01-29 12:52:20', '0000-00-00 00:00:00', 0, 0),
(27, 4, '<div><font face=\"Arial\" size=\"3\">The unit of momentum in SI system is &#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;.</font></div>', '', 'bottom', 'kgms-1', 'ms-2', 'ms-1', '', 'A', 27, 3, '2020-01-29 12:57:18', '0000-00-00 00:00:00', 0, 0),
(28, 5, '<font face=\"Arial\" size=\"3\">Everybody continues to be in its state of rest or the state of uniform motion along a straight line unless it is acted upon by some external force is &#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;..</font><br>', '', 'bottom', 'Newton’s third law', 'Newton’s second law', 'Newton’s first law', '', 'C', 29, 1, '2020-01-29 13:01:43', '0000-00-00 00:00:00', 0, 0),
(29, 4, '<div><font face=\"Arial\" size=\"3\">The unit of momentum in C.G.S. system is &#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;.</font></div>', '', 'bottom', 'cms', 'gcms-1', 'gs-2', '', 'B', 28, 3, '2020-01-29 13:00:06', '0000-00-00 00:00:00', 0, 0),
(30, 5, '<font face=\"Arial\" size=\"3\">Force is a &#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;.quantity.</font>', '', 'top', 'force and acceleration', 'force and inertia', 'momentum and magnitude', '', 'B', 30, 1, '2020-01-29 13:03:10', '0000-00-00 00:00:00', 0, 0),
(31, 5, '<div><font face=\"Arial\" size=\"3\">Force is a &#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;.quantity.</font></div>', '', 'bottom', 'scalar', 'vector', 'static', '', 'B', 31, 4, '2020-01-29 13:05:25', '0000-00-00 00:00:00', 0, 0),
(32, 5, '<span lang=\"EN-US\">Force has both&#8230;&#8230;&#8230;&#8230;&#8230;..and&#8230;&#8230;&#8230;&#8230;&#8230;.</span>', '', 'bottom', 'Magnitude and direction', 'gravity and velocity', 'speed and time period', '', 'A', 32, 4, '2020-01-29 13:35:00', '0000-00-00 00:00:00', 0, 0),
(33, 5, '<span lang=\"EN-US\">If the resultant force of all the forces acting&#10;on a body is equal to zero, then the body will be in &#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;..</span>', '', 'bottom', 'rest', 'equilibrium', 'motion', '', 'B', 33, 4, '2020-01-29 13:37:39', '0000-00-00 00:00:00', 0, 0),
(34, 5, '<span lang=\"EN-US\">If the resultant force on a body is equal to&#10;zero, it is &#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;force.</span>', '', 'bottom', 'balanced', 'unbalanced', 'neutral', '', 'A', 34, 4, '2020-01-29 13:39:51', '0000-00-00 00:00:00', 0, 0),
(35, 5, '<p class=\"MsoListParagraph\"><span lang=\"EN-US\"><span><font face=\"Cambria, serif\">&#160;</font></span><span>&#160;</span></span><span lang=\"EN-US\">If the resultant force is not equal to zero, then the motion of&#10;the body is due to &#8230;&#8230;&#8230;&#8230;forces.&#160;</span></p>', '', 'bottom', 'balanced', 'unbalanced', 'neutral', '', 'B', 35, 4, '2020-01-29 13:41:49', '0000-00-00 00:00:00', 0, 0),
(36, 5, '<p class=\"MsoListParagraph\"><span lang=\"EN-US\">&#160; A system can be brought to&#10;equilibrium by applying another force. Which is equal&#160;&#160; to the direction? Such force is &#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;</span></p>', '', 'bottom', 'rotating force', 'balance force', 'equilibrant', '', 'C', 36, 4, '2020-01-29 13:44:40', '0000-00-00 00:00:00', 0, 0),
(37, 5, '<span lang=\"EN-US\">The axis of the fixed edge about which the door&#10;is rotated is called as the &#8230;&#8230;&#8230;&#8230;&#8230;</span>', '', 'bottom', 'axis of rotation', 'axis of rotation', 'turning effect', '', 'A', 37, 4, '2020-01-29 13:47:52', '0000-00-00 00:00:00', 0, 0),
(38, 5, '<span lang=\"EN-US\">The rotating or turning effect of a force about&#10;a fixed point or fixed axis is called &#8230;&#8230;&#8230;&#8230;&#8230;&#8230;of the force.</span>', '', 'bottom', 'rotation', 'moment', 'turning', '', 'B', 38, 2, '2020-01-29 13:50:45', '0000-00-00 00:00:00', 0, 0),
(39, 5, '<span lang=\"EN-US\">The moment of the force is otherwise called as&#10;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;.</span>', '', 'bottom', 'torque', 'rotation', 'pressure', '', 'A', 39, 2, '2020-01-29 13:52:57', '0000-00-00 00:00:00', 0, 0),
(40, 5, '<span lang=\"EN-US\">Torque </span><span lang=\"EN-US\"><img width=\"10\" height=\"25\" src=\"file:///C:/Users/venki/AppData/Local/Temp/msohtmlclip1/01/clip_image002.gif\"></span><span lang=\"EN-US\">&#160;= &#8230;&#8230;&#8230;&#8230;&#8230;&#8230;..</span><span lang=\"EN-US\">&#160;</span>', '', 'bottom', 'F x a', 'ax g', ' F x d', '', 'C', 40, 3, '2020-01-29 13:59:25', '0000-00-00 00:00:00', 0, 0),
(41, 5, '<span lang=\"EN-US\">Torque is a &#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;.quantity.</span>', '', 'bottom', 'scalar', 'neutral', 'vector', '', 'C', 41, 2, '2020-01-29 13:58:33', '0000-00-00 00:00:00', 0, 0),
(42, 5, '<span lang=\"EN-US\">SI unit of torque is &#8230;&#8230;&#8230;&#8230;&#8230;&#8230;..</span>', '', 'bottom', 'Kgms-1', 'Nm', 'Nm-1', '', 'B', 42, 2, '2020-01-29 14:02:53', '0000-00-00 00:00:00', 0, 0),
(43, 5, '<font face=\"Cambria, serif\"><span>Two equal and unlike parallel forces applied at two distinct points constitute a &#8230;&#8230;</span></font>', '', 'bottom', 'couple', 'torque', 'gravity', '', 'A', 43, 2, '2020-01-29 14:07:46', '0000-00-00 00:00:00', 0, 0),
(44, 5, '<font face=\"Arial\" size=\"3\">Rotating effect of a couple is known as &#8230;&#8230;&#8230;&#8230;</font>', '', 'bottom', 'moment of force', 'moment of a couple', 'moment of acceleration', '', 'B', 44, 3, '2020-01-29 14:10:26', '0000-00-00 00:00:00', 0, 0),
(45, 5, '<font face=\"Arial\" size=\"3\">Moment of a couple is &#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;.</font>', '', 'bottom', 'F x d', 'F x a', 'F x s', '', 'C', 45, 3, '2020-01-29 14:13:58', '0000-00-00 00:00:00', 0, 0),
(46, 5, '<font face=\"Arial\" size=\"3\">The turning effect of a couple is measured by the &#8230;&#8230;&#8230;&#8230;&#8230;..of its moment.</font>', '', 'top', 'direction', 'magnitude', 'distance', '', 'B', 46, 4, '2020-01-29 14:15:31', '0000-00-00 00:00:00', 0, 0),
(47, 5, '<font face=\"Arial\" size=\"3\">The unit of moment of a couple is CGS system is &#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;</font>', '', 'top', 'dyne m', 'dyne cm', 'dyne mm', '', 'B', 47, 4, '2020-01-29 14:16:57', '0000-00-00 00:00:00', 0, 0),
(48, 5, '<font face=\"Arial\" size=\"3\">The direction of moment of a force or coupe is taken as &#8230;&#8230;&#8230;&#8230;&#8230;. if the body is rotated in the anti-clockwise direction.</font>', '', 'top', 'positive', 'negative', 'neutral', '', 'B', 48, 1, '2020-01-29 14:18:32', '0000-00-00 00:00:00', 0, 0),
(49, 5, '<font face=\"Arial\" size=\"3\">The direction of moment of a force or couple is taken as negative, if the body is rotated in the &#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;..direction.</font>', '', 'top', 'anti-clockwise', 'clockwise', 'straight', '', 'B', 49, 1, '2020-01-29 14:19:59', '0000-00-00 00:00:00', 0, 0),
(50, 5, '<font face=\"Arial\" size=\"3\">A gear helps to change the speed of rotation of a wheel by changing the &#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;</font>', '', 'top', 'torque', 'direction', 'magnitude', '', 'A', 50, 2, '2020-01-29 14:22:33', '0000-00-00 00:00:00', 0, 0);

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
(1, 'aumak7639', 'Umasekar', 'uploads/0493afad638b1d1631496ee15050a698.png', 'male', 'Arumugam', '7639600998', 'Chennai', '600073', 'YG SCHOOL', '10th-State-Board', '123456', '123456', 'umasekar098@gmail.com', 0, '', '0000-00-00', '0000-00-00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `description` varchar(500) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL DEFAULT 1,
  `updated_by` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `name`, `image_path`, `description`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'SCIENCE', 'uploads/1f35b36f944392464d1ec2132afa787f.png', '<strong>Lorem Ipsum</strong><span>&#160;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</span>', '2020-01-29 09:26:43', '0000-00-00 00:00:00', 1, 1),
(2, 'SOCIAL', '', '--', '2020-01-29 15:57:14', '0000-00-00 00:00:00', 1, 1);

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
(1, 1, 'Intro', '<strong>Lorem Ipsum</strong><span>&#160;is simply dummy text of the printing and typesetting industry.&#160;</span><br>', '2020-01-29 09:35:35', '0000-00-00 00:00:00', 1, 1),
(2, 1, '1.1 Force and Motion', '-', '2020-01-29 09:36:28', '0000-00-00 00:00:00', 1, 1),
(3, 1, '1.2 Inertia', '-', '2020-01-29 09:36:53', '0000-00-00 00:00:00', 1, 1),
(4, 1, '1.3 Linear momentum', '-', '2020-01-29 09:37:16', '0000-00-00 00:00:00', 1, 1),
(5, 1, '1.4 Newton\'s laws of motion', '-', '2020-01-29 09:39:08', '0000-00-00 00:00:00', 1, 1),
(6, 1, '1.5 Newton\'s  2nd laws of motion', '-', '2020-01-29 09:39:02', '0000-00-00 00:00:00', 1, 1),
(7, 1, '1.6 Impulse', '-', '2020-01-29 09:39:47', '0000-00-00 00:00:00', 1, 1),
(8, 1, '1.7 Newton\'s  3rd  laws of motion', '-', '2020-01-29 09:40:36', '0000-00-00 00:00:00', 1, 1),
(9, 1, '1.8 Principle of conservation of linear momentum', '-<div><br></div>', '2020-01-29 09:40:53', '0000-00-00 00:00:00', 1, 1),
(10, 1, '1.9 Rocket propulsion', '-<div><br></div>', '2020-01-29 09:41:10', '0000-00-00 00:00:00', 1, 1),
(11, 1, '1.10 Gravitation', '-<div><br></div>', '2020-01-29 09:41:34', '0000-00-00 00:00:00', 1, 1),
(12, 1, '1.11 Mass and Weight', '-<div><br></div>', '2020-01-29 12:06:39', '0000-00-00 00:00:00', 1, 1),
(13, 1, '1.12 Mass and Weight', '--', '2020-01-29 12:06:59', '0000-00-00 00:00:00', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`admin_id`);

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
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `chapter`
--
ALTER TABLE `chapter`
  MODIFY `chapter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `difficult`
--
ALTER TABLE `difficult`
  MODIFY `difficult_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `student_register`
--
ALTER TABLE `student_register`
  MODIFY `student_register_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `topic`
--
ALTER TABLE `topic`
  MODIFY `topic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
