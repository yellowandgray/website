-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2020 at 03:06 PM
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
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `a` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `b` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `c` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `d` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `answer` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `question_no` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`question_id`, `topic_id`, `name`, `a`, `b`, `c`, `d`, `answer`, `question_no`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 1, '1. In 1848 ____________ prepared a series of four prints visualising his dream of a world made up of democratic and Social Republics.', 'Frederic sorrieu', 'Voltaire', 'Montesquieu', 'rousseau', 'A', '', '2020-01-08 10:41:11', '0000-00-00 00:00:00', 0, 0),
(2, 1, '2. The first print of the series, shows the peoples of _____________________.', 'Asia and Europe', ' Europe and North America ', 'Europe and America', 'North America and South America', 'C', '', '2020-01-08 10:43:53', '0000-00-00 00:00:00', 0, 0),
(3, 1, '3. Men and women of all ages and social classes marching in a long train, and offering homage to the ___________________.', 'Statue of Liberty', 'Statue of Republic', 'Statue of Nationality', ' Statue of Freedom ', 'A', '', '2020-01-08 11:03:18', '0000-00-00 00:00:00', 0, 0),
(4, 1, '4. During the nineteenth century, ________________ emerged as a force which brought changes in the political and mental world of Europe.', 'Nationalism', 'Secutarism', 'Republic', 'Democracy', '', '', '2020-01-08 12:19:44', '0000-00-00 00:00:00', 0, 0),
(5, 1, '5. ____________________ delivered lecture at the university of Sorbonne.', 'Karl Marx', 'Lafayette', 'Mirabeau', ' Frnst Renan ', 'D', '', '2020-01-08 12:19:49', '0000-00-00 00:00:00', 0, 0),
(6, 1, '6. In ________________ lecture delivered at the university of Sorbonne.', '1883', '1884', '1882', '1885', 'C', '', '2020-01-08 12:19:53', '0000-00-00 00:00:00', 0, 0),
(7, 1, '7. The first clear expression of nationalism came with the ________________.', 'Chinese Rebellion', 'French Revolution', 'Russian Revolution', 'American Revolution ', 'B', '', '2020-01-08 12:20:00', '0000-00-00 00:00:00', 0, 0),
(8, 1, '8. The French Revolution held in _______________.', '1798', '1789', '1790', '1767', 'B', '', '2020-01-08 12:20:07', '0000-00-00 00:00:00', 0, 0),
(9, 1, '9. In 1789, France was a full fledges territorial state under the rule of an ________________.', 'absolute  monarch', 'oligarchy', 'fendalism', 'Republic', 'A', '', '2020-01-09 06:39:17', '0000-00-00 00:00:00', 0, 0),
(10, 1, '10. The political and constitutional changes that came in the wake of the _________________.', 'Chinese Rebellion', 'French Revolution', 'Russian Revolution', 'American Revolution ', 'B', '', '2020-01-08 12:20:42', '0000-00-00 00:00:00', 0, 0),
(11, 1, '11.The French Revolution led to the transfer of _______________ from the monarchy.', 'Sovereignty', 'Liberty', 'Freedom', 'Republic', 'A', '', '2020-01-08 10:43:53', '0000-00-00 00:00:00', 0, 0),
(12, 1, '12. The ideas of ___________- and ______________ emphasised the nation of a united community enjoying equal rights under a constitution.', 'La patrie and le citoyen', 'people and citizen', 'citizen and ruler', 'people and ruler ', 'A', '', '2020-01-08 12:20:48', '0000-00-00 00:00:00', 0, 0),
(13, 1, '13. The _______________was elected by the body of active citizens.', 'Estates general', 'Assembly', 'Parliament', 'Legislative', 'A', '', '2020-01-08 12:20:52', '0000-00-00 00:00:00', 0, 0),
(14, 1, '14. The Estates general was renamed the ___________________.', 'Assembly', 'Parliament', 'Legislative', 'National Assembly', 'D', '', '2020-01-08 12:20:58', '0000-00-00 00:00:00', 0, 0),
(15, 1, '15.French revolution formulated ______________ laws for all citizens within its territory.', ' Different', 'Monarch', 'Constitution', 'Uniform', 'D', '', '2020-01-08 10:43:53', '0000-00-00 00:00:00', 0, 0),
(16, 1, '16. ______________ became the common language of the nation.', 'Spanish', 'English', 'Local language', 'French', 'D', '', '2020-01-08 12:21:03', '0000-00-00 00:00:00', 0, 0),
(17, 1, '17. The revolutionaries declared that it was the destiny of the French nation to _______________ the people.', 'Liberate', 'despotism', 'communalism', 'socialism', 'A', '', '2020-01-08 10:43:53', '0000-00-00 00:00:00', 0, 0),
(18, 1, '18. In Europe, students and other members of educated middle classes began setting up ______________.', 'Students club', 'Jacobin clubs', 'society', 'youth club ', 'B', '', '2020-01-08 12:21:08', '0000-00-00 00:00:00', 0, 0),
(19, 1, '19. The French armies which moved into Holland, Belgium, Switzerland and Italy in the _______________.', '1780\'s', '1770\'s', '1790\'s', '1800\'s ', 'C', '', '2020-01-09 06:39:47', '0000-00-00 00:00:00', 0, 0),
(20, 1, '20. The French armies began to carry the idea of ________________ abroad.', 'Socialism', 'communalism', 'nationalism', 'despotism ', '', '', '2020-01-08 12:21:30', '0000-00-00 00:00:00', 0, 0),
(21, 1, '21.The cover of a German almanac designed by ___________________.', 'Andreas Rebmann', 'Mirabeau', 'Lafayette', 'KarlMarx ', 'A', '', '2020-01-08 10:43:53', '0000-00-00 00:00:00', 0, 0),
(22, 1, '22. The cover of a German almanac designed in _________________.', 'Mainz ', 'Moscow', 'Paris', 'France', 'A', '', '2020-01-08 12:21:45', '0000-00-00 00:00:00', 0, 0),
(23, 1, '23. Rebmann was a member of a german _____________ group.', 'Student', 'youth', 'Jacobia', 'press', 'C', '', '2020-01-08 12:21:49', '0000-00-00 00:00:00', 0, 0),
(24, 1, '24. ________________ set about introducing many of the reforms that he had already introduced in France.', ' Nicholas I', 'Nicholas II', 'Napolean', 'Danton', 'C', '', '2020-01-08 12:21:56', '0000-00-00 00:00:00', 0, 0),
(25, 1, '25. The civil of 1804 usually known as the _______________.', 'Danton code', 'Napoleonic code', 'Lafayette code', 'Marat code ', 'B', '', '2020-01-08 12:22:02', '0000-00-00 00:00:00', 0, 0),
(26, 1, '26. Napoleonic code was exported to the regions under _______________ control.', 'Vote', 'property', 'education', 'equality', 'B', '', '2020-01-08 12:22:22', '0000-00-00 00:00:00', 0, 0),
(27, 1, '27. Napoleonic code was exported to the regions under ______________ control.', 'European', 'Spain', 'French', 'Switzerland', 'C', '', '2020-01-08 12:22:25', '0000-00-00 00:00:00', 0, 0),
(28, 1, '28. _________________ simplified the administrative system.', 'Lafeyette', 'Napoleon', 'Karl Marx', 'Marat', 'B', '', '2020-01-08 12:22:35', '0000-00-00 00:00:00', 0, 0),
(29, 1, '29. Napolean abolished the _______________ system.', 'Socialism', 'communalism', 'feudal', 'nationalism ', 'C', '', '2020-01-08 12:22:39', '0000-00-00 00:00:00', 0, 0),
(30, 1, '30. ______________ would facilitate the movement and exchange of goods from one region to another.', 'Common national currency', 'dollar', 'Euro', 'Rupees ', 'A', '', '2020-01-08 12:22:46', '0000-00-00 00:00:00', 0, 0),
(31, 1, '31. The ______________  armies were welcomed as harbingers of liberty.', 'American', 'Britain', 'French', 'Russian', 'C', '', '2020-01-08 12:23:01', '0000-00-00 00:00:00', 0, 0),
(32, 1, '32.Karl Kaspar Firtz is the painter of _________________.', 'Germany', 'France', 'Britain', 'America ', 'A', '', '2020-01-08 10:43:53', '0000-00-00 00:00:00', 0, 0),
(33, 1, '33. The planting of Tree of Liberty in Zweibrucken, ________________________.', 'London', 'France', 'Germany', 'Russia', 'C', '', '2020-01-08 12:23:07', '0000-00-00 00:00:00', 0, 0),
(34, 1, '34. ________________________soldiers, recognisable by their blue, white and red uniforms.', 'Russian', 'French', 'American', 'Britain', 'B', '', '2020-01-08 12:23:13', '0000-00-00 00:00:00', 0, 0),
(35, 1, '35. Napolean lost the battle of Leipzig in ____________________.', '1813', '1874', '1799', '1796', 'A', '', '2020-01-08 12:23:18', '0000-00-00 00:00:00', 0, 0),
(36, 1, '36.Napolean invades in ____________________________.', '1797', '1798', '1799', '1796', 'A', '', '2020-01-08 10:43:53', '0000-00-00 00:00:00', 0, 0),
(37, 1, '37. Eastern and Central Europe were under ________________________.', 'autocratic monarchies', 'monarchy', 'oligarchy', 'democracy', 'A', '', '2020-01-08 10:43:53', '0000-00-00 00:00:00', 0, 0),
(38, 1, '38. The Habsburg Empire that ruled over ___________________.', 'Hungary', 'Austria', 'Austria Hungary', 'Bulgaria', 'C', '', '2020-01-09 06:41:20', '0000-00-00 00:00:00', 0, 0),
(39, 1, '39. The regions of Lombardy and Venetia were spoke ________________________ language.', 'Italian', 'Spanish', 'German', 'Polish', 'C', '', '2020-01-08 12:23:30', '0000-00-00 00:00:00', 0, 0),
(40, 1, '40. In Hungary, half of the population spoke _____________________ while the other half spoke a variety of dialects.', 'Magyar', 'Polish', 'German', ' Italian', 'A', '', '2020-01-08 12:23:33', '0000-00-00 00:00:00', 0, 0),
(41, 1, '41. Greek struggle for independence begins in ____________________.', '1820', '1821', '1823', '1824', 'B', '', '2020-01-08 12:24:01', '0000-00-00 00:00:00', 0, 0),
(42, 1, '42. Socially and politically was the dominant class of the European continent.', 'Aristocracy', 'Zamindars', 'Agrarian', 'Peasant', 'A', '', '2020-01-08 12:24:16', '0000-00-00 00:00:00', 0, 0),
(43, 1, '43. Industrialisation began in England in the second half of the ___________________ century.', '16th ', '17th ', '18th', ' 19th', 'C', '', '2020-01-08 12:24:22', '0000-00-00 00:00:00', 0, 0),
(44, 1, '44. The term liberalism derives from the ___________________ root.', 'Greek', 'Latin', 'Arabic', ' German', 'B', '', '2020-01-08 12:24:26', '0000-00-00 00:00:00', 0, 0),
(45, 1, '45. The meaning of liber is _______________________.', 'Join', 'free', 'people', 'citizen', 'B', '', '2020-01-08 12:24:33', '0000-00-00 00:00:00', 0, 0),
(46, 1, '46. The French revolution, _____________________ had stood for the end of autocracy.', 'Democratic', 'liberalism', 'republic', 'freedom ', 'B', '', '2020-01-08 10:43:53', '0000-00-00 00:00:00', 0, 0),
(47, 1, '47. Men without _____________________ and women were excluded from political rights.', 'Property', 'education', 'complete the age of 18', ' qualification ', 'A', '', '2020-01-08 12:24:38', '0000-00-00 00:00:00', 0, 0),
(48, 1, '48. Napoleon defeated at _____________________.', 'Waterloo', 'Germany', 'Wellington', 'Paris ', 'A', '', '2020-01-08 12:24:47', '0000-00-00 00:00:00', 0, 0),
(49, 1, '49. The Vienna peace settlement was signed in ____________.', '1815', '1816', '1817', '1818', 'A', '', '2020-01-08 12:24:50', '0000-00-00 00:00:00', 0, 0),
(50, 1, '50. Slav nationalism gathers force in the Habsburg and Ottaman Empires in _________________.', '1905', '1966', '1907', '1908', 'A', '', '2020-01-08 12:25:04', '0000-00-00 00:00:00', 0, 0),
(51, 1, '51. Men without _____________________ and all women were excluded from without political rights.', 'property', 'education', 'complete the age of 18', 'qualification', 'A', '', '2020-01-08 12:25:14', '0000-00-00 00:00:00', 0, 0),
(52, 1, '52.Napoleon defeated at _________________________.', 'Waterloo', 'Germany ', 'Wellington', 'Paris', 'A', '', '2020-01-08 10:43:53', '0000-00-00 00:00:00', 0, 0),
(53, 1, '53. The Vienna Peace settlement was signed in __________________.', '1815', '1816', '1817', '1818', 'A', '', '2020-01-08 12:25:18', '0000-00-00 00:00:00', 0, 0),
(54, 1, '54. Unification of Italy during _________________________.', '1859 - 1870', '1849 - 1869', '1850 - 1888', '1869 - 1881 ', 'A', '', '2020-01-09 06:41:59', '0000-00-00 00:00:00', 0, 0),
(55, 1, '55. Slan nationalism gathers force in the Habsburg and Ottaman Empires in _____________________.', '1905', '1906', '1907', '1908', '', '', '2020-01-08 12:25:24', '0000-00-00 00:00:00', 0, 0),
(56, 1, '56. In ___________________________, a customs union was formed at the initiative of Prussia.', '1835', '1834', '1836', '1837', 'B', '', '2020-01-08 12:25:34', '0000-00-00 00:00:00', 0, 0),
(57, 1, '57. Customs union also called as ____________________.', 'guilt', 'shop', 'zollverein', 'trade union ', 'C', '', '2020-01-08 12:25:42', '0000-00-00 00:00:00', 0, 0),
(58, 1, '58. The union abolished tariff barriers and reduced the number of currencies from over __________________.', 'five', 'two', 'thirty to two', 'sixty to thirty  ', 'C', '', '2020-01-08 12:25:46', '0000-00-00 00:00:00', 0, 0),
(59, 1, '59. A wave of economic nationalism strengthened the ____________________.', 'unification', 'nationalism', ' democracy', 'patriotism', 'B', '', '2020-01-08 12:25:49', '0000-00-00 00:00:00', 0, 0),
(60, 1, '60. After the defeat of Napoleon in 1815, European government were driven by a spirit of _______________ .', 'communication', 'conservation', 'democracy', ' republic ', 'B', '', '2020-01-08 12:25:57', '0000-00-00 00:00:00', 0, 0),
(61, 1, '61. The abolition of ____________________________ and serfdom could strengthen the autocratic monarchies in Europe.', 'taxation', 'feudalism', 'communalism', 'democracy ', 'B', '', '2020-01-08 12:26:01', '0000-00-00 00:00:00', 0, 0),
(62, 1, '62. The congress was hosted by the Austrian chancellor _______________________.', 'Duke William', 'Duke Metternich', 'James Duke', 'John Duke ', 'B', '', '2020-01-08 12:26:04', '0000-00-00 00:00:00', 0, 0),
(63, 1, '63.The aim of the Zollverein is to bind the Germans words?', 'Friedrich list', 'Marat', 'Lafayette', 'Mirabean', 'A', '', '2020-01-08 10:43:53', '0000-00-00 00:00:00', 0, 0),
(64, 1, '64. Britain, Russia, Prussia and Austria who had collectively defeated ____________________ in 1815.', 'Napoleon', 'Stalin', 'Lenin', 'Hitler', 'A', '', '2020-01-08 12:26:08', '0000-00-00 00:00:00', 0, 0),
(65, 1, '65. The Bourbon dynasty, which had been deposed during the ________________________ Revolution.', 'Russia', 'American', 'French', 'Chinese', 'C', '', '2020-01-08 12:26:13', '0000-00-00 00:00:00', 0, 0),
(66, 1, '66.____________________ was given control of northern Italy.', 'Hungary', 'Austria', 'Bulgaria', 'Rumania ', 'B', '', '2020-01-08 10:43:53', '0000-00-00 00:00:00', 0, 0),
(67, 1, '67. Conservative regimes set up in ______________________.', '1816', '1815', '1817', '1818', 'B', '', '2020-01-08 10:43:53', '0000-00-00 00:00:00', 0, 0),
(68, 1, '68. ____________________ sprang up in many European states to train revolutionaries and spread their ideas.', 'Missions', 'Organization', 'Secret societies', 'Societies', 'C', '', '2020-01-08 12:26:18', '0000-00-00 00:00:00', 0, 0),
(69, 1, '69. __________________ was established to fight for liberty and freedom.', 'Paris Peace Conference ', 'Vienna Congress', 'Berlin Congress', 'Congo Conference', 'B', '', '2020-01-08 12:26:21', '0000-00-00 00:00:00', 0, 0),
(70, 1, '70. The Italian revolutionary Giuseppe Mazzini was born in _______________________.', 'Genoa, 1807', 'Genoa, 1800', 'Genoa, 1801', 'Genoa, 1816', 'A', '', '2020-01-08 12:26:26', '0000-00-00 00:00:00', 0, 0),
(71, 2, '1. Guiseppe Mazzini was sent into exile in ________________.', '1831', '1830', '1829', '1828', 'A', '', '2020-01-08 12:26:29', '0000-00-00 00:00:00', 0, 0),
(72, 2, '2. The first upheaval took place in France in _____________________.', 'June 1831', 'July 1830', 'June 1821', 'July 1831 ', 'B', '', '2020-01-08 12:26:36', '0000-00-00 00:00:00', 0, 0),
(73, 2, '3. ___________________ sparked an uprising in Brussels which led to Belgium breaking away from the united kingdom of the Netherlands.', 'The July Revolution', 'The August Revolution', 'The French Revolution', 'Russian Revolution ', 'A', '', '2020-01-08 12:26:57', '0000-00-00 00:00:00', 0, 0),
(74, 2, '4. Since fifteenth century Greece became the part of _____________________.', 'Ottaman Empire', 'Russia', 'England', 'France', 'A', '', '2020-01-08 12:27:05', '0000-00-00 00:00:00', 0, 0),
(75, 2, '5. The Greeks started their revolution for independence in ___________________.', '1820', '1822', '1821', '1823', 'C', '', '2020-01-08 12:27:08', '0000-00-00 00:00:00', 0, 0),
(76, 2, '6. The English Poet ________________ organized funds to supported Greece.', 'Lord Byron', 'Robert Brown', 'Browning', 'Charles wood ', 'A', '', '2020-01-08 12:27:44', '0000-00-00 00:00:00', 0, 0),
(77, 2, '7. The English Poet Lord Byron died of fever _____________.', '1825', '1824', '1826', '1827', 'B', '', '2020-01-08 12:19:14', '0000-00-00 00:00:00', 0, 0),
(78, 2, '8. The Treaty of  Constantinople was signed in ', '1832', '1833', '1842', '1827', 'A', '', '2020-01-08 12:27:50', '0000-00-00 00:00:00', 0, 0),
(79, 2, '9. The Treaty of  ________________ recognized Greece as an independent nation.', 'Paris', 'Contantinople', 'London', 'Versatiles', 'B', '', '2020-01-08 12:27:54', '0000-00-00 00:00:00', 0, 0),
(80, 2, '10. _____________________ played an important role in creating the idea of the nation.', 'culture', 'tradition', 'education', 'knowledge ', 'A', '', '2020-01-08 12:27:56', '0000-00-00 00:00:00', 0, 0),
(81, 2, '11. ______________________ is a cultural movement to develop a particular form of nationalist sentiment.', 'Democracy', 'Republic', 'Romanticism', 'Nationalism ', 'C', '', '2020-01-08 12:28:01', '0000-00-00 00:00:00', 0, 0),
(82, 2, '12. _________________ was one of the most important French Romantic painters.', 'Delacriox', 'Johann Gottfried', 'Lafayette', 'Marat ', 'A', '', '2020-01-08 12:28:08', '0000-00-00 00:00:00', 0, 0),
(83, 2, '13. In, _____________________, an armed rebellion against Russian rule took place which was ultimately crushed.', '1830', '1831', '1832', '1833', 'B', '', '2020-01-08 12:28:18', '0000-00-00 00:00:00', 0, 0),
(84, 2, '14. ___________________ was used for Church gatherings and all religious instruction.', 'Danish', 'Polish', 'English', ' French ', 'B', '', '2020-01-08 12:28:36', '0000-00-00 00:00:00', 0, 0),
(85, 2, '15. The use of Polish came to be seen as a symbol of the struggle against ______________ dominance.', 'American', 'Russian', 'Britain', 'french ', 'B', '', '2020-01-08 12:28:46', '0000-00-00 00:00:00', 0, 0),
(86, 2, '16. The ___________________ were years of great economic hardship in Europe.', '1840s ', '1830s', '1850s', '1860s', 'B', '', '2020-01-08 12:29:58', '0000-00-00 00:00:00', 0, 0),
(87, 2, '17. Population from rural areas migrated to the __________________.', 'town', 'village', 'cities', 'capital ', 'C', '', '2020-01-08 12:30:01', '0000-00-00 00:00:00', 0, 0),
(88, 2, '18. _________________ was more advanced in industries than on the continent.', 'Germany', 'Iron', 'Coal', 'Oil ', '', '', '2020-01-08 12:30:04', '0000-00-00 00:00:00', 0, 0),
(89, 2, '19. In _________________, food shortages and widespread unemployment brought the population of Paris out on the roads.', '1845', '1848', '1849', '1850', 'B', '', '2020-01-08 12:30:08', '0000-00-00 00:00:00', 0, 0),
(90, 2, '20. The Grimm Brothers were born in ________________.', 'England', 'Germany', 'France', 'Britain ', 'B', '', '2020-01-09 06:42:09', '0000-00-00 00:00:00', 0, 0),
(91, 3, '91. The Grimm Brothers published a 33 volume dictionary of the ____________________ language.', 'German', 'Polish', 'English', 'Spanish', 'A', '', '2020-01-09 06:42:16', '0000-00-00 00:00:00', 0, 0),
(92, 3, '92. National Assembly guaranteed the adult males above 21 for the right to ________________________.', 'work', 'vote', 'education', 'speech ', 'A', '', '2020-01-08 12:32:09', '0000-00-00 00:00:00', 0, 0),
(93, 3, '93. In _______________________ 1 weavers in Silesia had led a revolt against contractors who supplied them raw material.', '1844', '1845', '1846', '1847', 'B', '', '2020-01-08 12:32:12', '0000-00-00 00:00:00', 0, 0),
(94, 3, '94. The journalist ____________________ described the events in a Silesian village.', 'Wihelm wolff', 'Grimm brothers', 'Lafeyette', 'Marat  ', 'A', '', '2020-01-08 12:32:15', '0000-00-00 00:00:00', 0, 0),
(95, 3, '95. On _____________________, a large crowd of weavers marched in paris up to the manism of their contractor demanding higher wages.', '5-Jun', '4-Jun', '6-Jun', '7-Jun', 'B', '', '2020-01-08 12:32:18', '0000-00-00 00:00:00', 0, 0),
(96, 3, '96. In 1848, a republic based on universal male suffrage had been proclaimed in __________________.', 'England', 'France', 'Germany', 'Spain ', 'B', '', '2020-01-08 12:32:21', '0000-00-00 00:00:00', 0, 0),
(97, 3, '97. The liberal middle classes demanded for the creation of a nation state on _________________ principles.', 'Frankfurt', 'Boston', 'Paris', 'London ', 'A', '', '2020-01-08 12:32:25', '0000-00-00 00:00:00', 0, 0),
(98, 3, '98. _______________________ was the King of Prussia, he rejected the elected assembly.', 'Friedrich Wilhelm IV', 'Williams II', 'Charles IV', 'John Friedrich', 'A', '', '2020-01-08 12:32:29', '0000-00-00 00:00:00', 0, 0),
(99, 3, '99. The liberal politician ___________________, an elected number of the Frankfurt Parliament.', 'Karl Max', 'Carl Welcker', 'Friedrich', 'Wilhelm Wolff', 'B', '', '2020-01-08 12:32:32', '0000-00-00 00:00:00', 0, 0),
(100, 3, '100. A political activist _________________ founded a women?s journal.', 'Louise Peters', 'Louise Otto peters', 'Wilhelm', 'Peterson ', 'B', '', '2020-01-09 06:42:32', '0000-00-00 00:00:00', 0, 0),
(101, 3, '101. Louise Otto peters founded a __________________ political association.', 'feminist', 'national', 'male', 'middle ', 'A', '', '2020-01-08 12:32:54', '0000-00-00 00:00:00', 0, 0),
(102, 3, '102. Louise Otto Peters issued her first newspaper on _____________________.', '21 April 1848', '21 April 1847', '21 April 1846', '21 April 1849 ', 'D', '', '2020-01-08 12:32:58', '0000-00-00 00:00:00', 0, 0),
(103, 3, '103. After ______________, nationalism in Europe moved away from its association with democracy and revolution.', '1848', '1868', '1858', '1878', 'A', '', '2020-01-08 12:33:02', '0000-00-00 00:00:00', 0, 0),
(104, 3, '104. The large land owners in Prussia were called ___________________.', 'Junkers', 'Land lorels', 'Feaudal lords', 'Zolluverins ', 'A', '', '2020-01-08 12:33:07', '0000-00-00 00:00:00', 0, 0),
(105, 3, '105. Prussia took on the leadership of _________________ for national unification.', 'Otto Von Bismarck', 'Marat', 'Lafeyette', 'William - I ', 'A', '', '2020-01-09 06:42:42', '0000-00-00 00:00:00', 0, 0),
(106, 3, '106. In _____________, the Prussian king, William I was proclaimed as German Emperor.', 'Jan 1870', 'Jan 1871', 'Jan 1869', 'Jan 1868 ', 'B', '', '2020-01-08 12:33:26', '0000-00-00 00:00:00', 0, 0),
(107, 3, '107. William I was proclaimed as German Emperor in __________________.', 'Boston', 'Versailles', 'Bosatile', 'Moscow ', 'B', '', '2020-01-08 12:33:31', '0000-00-00 00:00:00', 0, 0),
(108, 3, '108. ____________________ was the chief commander of the Prussian army.', 'General Von Roon', 'General Bismarck', 'General Von', 'General Otto Von ', 'A', '', '2020-01-08 12:33:40', '0000-00-00 00:00:00', 0, 0),
(109, 3, '109. The proclamation of the German empire in the hall of mirrors at ____________________.', 'Weiner', 'Versailles', 'Boston', 'Frankfurt', 'B', '', '2020-01-08 12:33:38', '0000-00-00 00:00:00', 0, 0),
(110, 3, '110. During the middle of the nineteenth century, Italy was divided into _____________ states.', 'eight', 'nine', 'seven', 'ten ', 'C', '', '2020-01-08 12:33:49', '0000-00-00 00:00:00', 0, 0),
(111, 4, '1. Giuseppe Mazzini formed a secret society called __________________.', 'Gang of Italy', 'Band of Italy', 'Mass of Italy', 'Young Italy ', 'D', '', '2020-01-08 12:33:46', '0000-00-00 00:00:00', 0, 0),
(112, 4, '2. Chief minister _____________________ led the movement to unify the regions of Italy.', 'Anton Von', 'Otto Von', 'Von Roon ', 'Cavour', 'D', '', '2020-01-08 12:33:52', '0000-00-00 00:00:00', 0, 0),
(113, 4, '3. France defeated the Austrian forces in ____________________.', '1859', '1858', '1851', '1856', 'A', '', '2020-01-08 12:33:56', '0000-00-00 00:00:00', 0, 0),
(114, 4, '4. In ________________ victor Emmanuel II was proclaimed king of united Italy.', '1860', '1869', '1861', '1862', 'C', '', '2020-01-08 12:34:02', '0000-00-00 00:00:00', 0, 0),
(115, 4, '5. The English parliament, which had seized power from the monarchy in _______________.', '1689', '1688', '1686', '1687', 'B', '', '2020-01-08 12:34:12', '0000-00-00 00:00:00', 0, 0),
(116, 4, '6. The Act of union was signed between _____________ and ________________.', 'England and Germany', 'England and Scotland', 'Scotland and France', 'France and Germany ', 'B', '', '2020-01-08 12:34:15', '0000-00-00 00:00:00', 0, 0),
(117, 4, '7. The Act of Union was signed between England and Scotland in ________________.', '1707', '1708', '1709', '1710', 'A', '', '2020-01-08 12:34:18', '0000-00-00 00:00:00', 0, 0),
(118, 4, '8. The Act of union was signed between ________________ and ______________.', 'England & France', 'France & Russia', 'England & Scotland', 'Scotland & France ', 'C', '', '2020-01-08 12:34:23', '0000-00-00 00:00:00', 0, 0),
(119, 4, '9. ________________ was deeply divided between Catholics and protestants.', 'France', 'Scotland', 'Russia', 'America ', 'B', '', '2020-01-08 12:34:27', '0000-00-00 00:00:00', 0, 0),
(120, 4, '10. In Ireland, Catholics revolt led by __________________.', 'Wolfe Tone', 'Lafayette', 'Marat', 'Mirabeau ', 'A', '', '2020-01-08 12:34:32', '0000-00-00 00:00:00', 0, 0),
(121, 4, '11. Ireland was forcibly incorporated into the united kingdom in _______________.', 'Britain', 'France ', 'Ireland', 'Scotland ', 'A', '', '2020-01-08 12:34:39', '0000-00-00 00:00:00', 0, 0),
(122, 4, '12. ___________________ is the most celebrated of Italian freedom fighters.', 'Wolfe Tone', 'Giuseppe Garibaldi', 'Marat', 'Lafayette ', 'B', '', '2020-01-08 12:34:44', '0000-00-00 00:00:00', 0, 0),
(123, 4, '13. Garibaldi joined the young Italy movement in ___________________.', '1834', '1836', '1833', '1833', 'C', '', '2020-01-08 12:34:47', '0000-00-00 00:00:00', 0, 0),
(124, 4, '14. The young Italy movement uprising in ________________.', 'Vatican', 'Canton', 'Piedmont', 'London', 'C', '', '2020-01-08 12:34:50', '0000-00-00 00:00:00', 0, 0),
(125, 4, '15. Garibaldi had to flee to _______________.', 'South Africa', 'South America', 'Germany', 'France ', 'B', '', '2020-01-08 12:34:54', '0000-00-00 00:00:00', 0, 0),
(126, 4, '16. Garibaldi got support to  ____________ to  unify the Italian status.', 'Victor Emmanuel', 'Victor Emmanuel  - II', 'Victor John', 'Emmanuel - II', 'B', '', '2020-01-09 06:42:53', '0000-00-00 00:00:00', 0, 0),
(127, 4, '17. In _________, Garibaldi led the famous expedition of the Thousand to south Italy.', '1861', '1862', '1863', '1860', 'D', '', '2020-01-09 06:43:00', '0000-00-00 00:00:00', 0, 0),
(128, 4, '18. ______________ volunteers joined the expedition of Garibaldi.', '30,000', '40,000', '50,000', '20,000', 'A', '', '2020-01-09 06:43:11', '0000-00-00 00:00:00', 0, 0),
(129, 4, '19. The volunteers of Expedition were popularly known as _________________', 'white shirts', 'Red shirts', 'Brown shirts', 'Black shirts', 'B', '', '2020-01-09 06:43:56', '0000-00-00 00:00:00', 0, 0),
(130, 4, '20. In _______________, Garibaldi led an army of volunteers to Rome to fight the last obstacle to the unification of Italy.', '1868', '1867', '1866', '1865', 'B', '', '2020-01-09 06:44:09', '0000-00-00 00:00:00', 0, 0),
(131, 5, '1. The Red shirts proved to be no match for the combined ______________ and __________ troops.', 'French & Papal', 'German & Papal', 'American & German', 'American & Britain ', 'A', '', '2020-01-09 06:44:14', '0000-00-00 00:00:00', 0, 0),
(132, 5, '2. France withdrew its troops in ___________________ .', '1871', '1870', '1869', '1868', 'B', '', '2020-01-09 06:44:19', '0000-00-00 00:00:00', 0, 0),
(133, 5, '3. Rome that the papal states were finally joined to Italy in _______________', '1871', '1870', '1868', '1869', 'B', '', '2020-01-09 06:47:36', '0000-00-00 00:00:00', 0, 0),
(134, 5, '4. Artists in the _______________ and _____________ centuries found a way out by personifying a nation.', '16th & 17th', '18th & 19th', '17th & 18th', '19th & 20th ', 'B', '', '2020-01-09 06:44:52', '0000-00-00 00:00:00', 0, 0),
(135, 5, '5. Nations were portrayed as _____________ figures.', 'nature', 'female', 'male', 'religious', 'B', '', '2020-01-09 06:47:41', '0000-00-00 00:00:00', 0, 0),
(136, 5, '6. The ______________ revolution artists used the female allegory to portray ideas such as Liberty, justice and the Republic.', 'Russian', 'Italian', 'French', 'American', 'B', '', '2020-01-09 06:47:46', '0000-00-00 00:00:00', 0, 0),
(137, 5, '7. Statues of Marianne were erected in public squares symbol of __________________', 'Unity', 'Democracy', 'Justice', 'Republic ', 'A', '', '2020-01-09 06:47:54', '0000-00-00 00:00:00', 0, 0),
(138, 5, '8. Marianne images were marked on ________________ and _________.', 'books & news papers', 'coins & stamps', 'posters & pamphlet', 'posters & stamps ', 'B', '', '2020-01-09 06:48:13', '0000-00-00 00:00:00', 0, 0),
(139, 5, '9. __________________ became the allegory of the German nation.', 'Marianne', 'Germania', 'Statue of Liberty', 'Statue of Republic ', 'B', '', '2020-01-09 06:48:19', '0000-00-00 00:00:00', 0, 0),
(140, 5, '10. Germania wears a crown of _____________________.', 'Oak leaves', 'Olive leaves', 'Pine leaves ', 'Fir leaves ', 'A', '', '2020-01-09 06:48:28', '0000-00-00 00:00:00', 0, 0),
(141, 5, '11. In German oak stands for _____________________.', 'heroine', 'liberty', 'freedom', 'republic ', 'A', '', '2020-01-09 06:48:37', '0000-00-00 00:00:00', 0, 0),
(142, 5, '12. Germania is a painting created by ____________________.', 'philipp veit', 'philipps', 'marat', 'mirabeau ', 'A', '', '2020-01-09 06:48:43', '0000-00-00 00:00:00', 0, 0),
(143, 5, '13. Germania painting hung in the st paul\'s church in the years __________ & ___________ when the German National Assembly gathered in Frankfurt.', '1848 & 1849', '1847 & 1848', '1846 & 1847', '1845 & 1846 ', 'A', '', '2020-01-09 06:49:01', '0000-00-00 00:00:00', 0, 0),
(144, 5, '14. The symbol of broken chains significance of _____________________.', 'freedom', 'being freed', 'fraternity', 'democracy ', 'B', '', '2020-01-09 06:49:10', '0000-00-00 00:00:00', 0, 0),
(145, 5, '15. The symbol of breakfast with eagle is signify of the ________________.', 'France Empire', 'German Empire', 'English Empire', 'Russian Empire', 'B', '', '2020-01-09 06:49:17', '0000-00-00 00:00:00', 0, 0),
(146, 5, '16. The symbol of crown of oak leaves signify ___________________.', 'empire', 'Heriusm', 'superior', 'priole ', 'B', '', '2020-01-09 06:49:23', '0000-00-00 00:00:00', 0, 0),
(147, 5, '17. The symbol of sword signifies ________________.', 'Readiness to fight', 'Brave', 'Courage', 'Boldness', 'A', '', '2020-01-09 06:49:30', '0000-00-00 00:00:00', 0, 0),
(148, 5, '18. The symbol of olive branch around the sword signifies willingness to make _______________.', 'peace', 'war', 'fight', 'revolt', 'A', '', '2020-01-09 06:49:35', '0000-00-00 00:00:00', 0, 0),
(149, 5, '19. Rays of the rising sun attributes to beginning of a ________________.', 'new era', 'new world', 'new  german', 'new france', 'A', '', '2020-01-09 06:49:42', '0000-00-00 00:00:00', 0, 0),
(150, 5, '20. The fallen Germania was painted by ____________________.', 'Julius Hubner', 'Velt', 'Kaiser', 'Marat ', 'A', '', '2020-01-09 06:49:48', '0000-00-00 00:00:00', 0, 0),
(151, 6, '1. ____________________ rejected the people\'s demand in 1848.', 'King FriedrichWilliam IV', 'Kaiser II', 'William V', 'Friedric III ', 'A', '', '2020-01-09 06:50:09', '0000-00-00 00:00:00', 0, 0),
(152, 6, '2. The fallen Germania symbolized the ___________________.', 'loss of hope', ' loss of freedom', 'loss of faith', 'loss of liberty ', 'A', '', '2020-01-09 06:50:15', '0000-00-00 00:00:00', 0, 0),
(153, 6, '3. The crowd and standard are symbols of the __________________.', 'Monarchy', 'Freedom', 'Power', 'Pride ', 'A', '', '2020-01-09 06:50:22', '0000-00-00 00:00:00', 0, 0),
(154, 6, '4. Germania on Guard at the Rhine painted by _________________.', 'Lorenz dasen', 'velt', 'Kaiser', 'Mirabeau', 'A', '', '2020-01-09 06:50:30', '0000-00-00 00:00:00', 0, 0),
(155, 6, '5. The most serious source of nationalist tension in Europe after 1871 was the area called the ______________________.', 'Balkanes', 'Romania', 'Bulgaria', 'Albania ', 'A', '', '2020-01-09 06:50:49', '0000-00-00 00:00:00', 0, 0),
(156, 6, '6. Balkans inhabitants were broadly known as the _____________________.', 'slaves', 'Germine', 'Fascist', 'Nazist', 'A', '', '2020-01-09 06:51:24', '0000-00-00 00:00:00', 0, 0),
(157, 6, '7. A large part of the Balkans was under the control of the _______________ Empire.', 'Arab', 'Ottaman', 'German', 'Russian ', 'B', '', '2020-01-09 06:51:30', '0000-00-00 00:00:00', 0, 0),
(158, 6, '8. The spread of the ideas of ______________ in the Blakans together with the disintegration of the Ottaman Empire mad this region very explosive.', 'Romantic nationalism', 'Republic', 'Nationalism', 'Democratic ', 'A', '', '2020-01-09 06:51:35', '0000-00-00 00:00:00', 0, 0),
(159, 6, '9. The Balkan peoples based their claims for _________________.', 'unity', 'freedom', 'independence or political rights ', 'democracy', 'C', '', '2020-01-09 06:51:44', '0000-00-00 00:00:00', 0, 0),
(160, 6, '10. Modern day Romania, Bulgaria, Albania, Greece, Macedonia, Croatia, Bosnia ? Herzegovina, Slovenia, Serbia and Montenegro were called _______________ countries.', 'Imperialist', 'Colonial', 'Balkan', 'Republican', 'C', '', '2020-01-09 06:51:50', '0000-00-00 00:00:00', 0, 0),
(161, 6, '11. The __________________ states were fiercely jealous of each other and each hoped to gain more territory at the expense of the more territory at the expense of the others.', 'Romanian', 'Albanian', 'Balkan', 'Bulgarian ', 'C', '', '2020-01-08 11:02:58', '0000-00-00 00:00:00', 0, 0),
(162, 6, '12. During the Balkan problem, there was intense rivaby among the European powers over __________ and _______________.', 'trade & colonies', 'trade & rights', 'colonies & naval', 'Naval & trade ', 'A', '', '2020-01-08 11:02:47', '0000-00-00 00:00:00', 0, 0),
(163, 6, '13. The Balkan problem led to a series of wars in the region and finally the _______________ war.', 'second world', 'first world', 'Balkan', 'American', 'B', '', '2020-01-08 11:02:43', '0000-00-00 00:00:00', 0, 0),
(164, 6, '14. Nationalism aligned with imperialism, led Europe to disaster in _______________.', '1913', '1914', '1915', '1916', 'B', '', '2020-01-08 11:02:15', '0000-00-00 00:00:00', 0, 0),
(165, 6, '15. Many countries in the world which had been colonized by the European powers in ______________.', '18th', '19th', '16th', '15th ', 'D', '', '2020-01-08 11:02:12', '0000-00-00 00:00:00', 0, 0),
(166, 6, '16. The ___________________ movements that developed everywhere independent nation ? states.', 'Anti imperial', 'Anti social', 'Anti colonialism', 'Imperialist ', 'A', '', '2020-01-09 06:51:57', '0000-00-00 00:00:00', 0, 0),
(167, 6, '17. Nationalism is a idea of ________________.', 'Asia', 'North America', 'South Africa', 'Europe ', 'D', '', '2020-01-08 11:02:05', '0000-00-00 00:00:00', 0, 0),
(168, 6, '18. ________________ is the symbol of the British nation.', 'Germania', 'Britannia', 'Marianne', 'Statue of Liberty  ', 'B', '', '2020-01-08 11:02:01', '0000-00-00 00:00:00', 0, 0),
(169, 6, '19. The postage stamps of Marianne used in _____________________.', '1850', '1851', '1852', '1853', 'A', '', '2020-01-08 11:01:54', '0000-00-00 00:00:00', 0, 0),
(170, 6, '20. The postage stamps of Marianne representing the ___________________.', 'Republic of France', 'Unity of France ', 'Fraternity of France', 'Sovereignty of France', 'A', '', '2020-01-08 11:01:48', '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `student_answer`
--

CREATE TABLE `student_answer` (
  `student_answer_id` int(11) NOT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `topic_id` int(11) DEFAULT NULL,
  `question_id` int(11) DEFAULT NULL,
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

INSERT INTO `student_answer` (`student_answer_id`, `subject_id`, `topic_id`, `question_id`, `answer_option`, `actual_answer_option`, `is_correct_answer`, `is_skipped`, `student_register_id`, `answer_attempt`, `created_at`, `created_by`, `updated_at`, `updated_by`, `status`) VALUES
(1, 6, 1, 5, 'A', 'D', 0, 0, 2, NULL, NULL, NULL, NULL, NULL, 1),
(2, 6, 2, 7, 'A', 'D', 0, 0, 2, NULL, NULL, NULL, NULL, NULL, 1);

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
(12, 'Umasekar', 'umasekar', 'uploads/ded7f5dc56180c0e9fb1104ada8b5c01.jpg', 'male', 'Arumugam', '7639600998', 'Chennai', '600073', 'Yellowandgray', '10th-State-Board', '123456', '123456', '', 1, '', '2020-01-09 06:38:02', '0000-00-00 00:00:00', 0, 0);

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
(1, 1, 1, 'The Rise of Nationalism in Europe', '2020-01-09 12:53:53', '0000-00-00 00:00:00', 1, 1),
(2, 1, 2, 'Nationalism in india.', '2020-01-09 12:53:55', '0000-00-00 00:00:00', 0, 0),
(4, 1, 3, 'The Making of a global world', '2020-01-09 12:53:57', '0000-00-00 00:00:00', 0, 0),
(5, 1, 4, 'The age of industriallzation', '2020-01-09 12:53:58', '0000-00-00 00:00:00', 0, 0),
(6, 1, 5, 'Print culture and the modern world', '2020-01-09 12:54:02', '0000-00-00 00:00:00', 0, 0);

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
(2, 2020, 1, '2020-01-09 11:43:18', '0000-00-00 00:00:00', 1, 1),
(3, 2019, 1, '2020-01-09 11:51:07', '0000-00-00 00:00:00', 1, 1),
(4, 2018, 1, '2020-01-09 11:51:13', '0000-00-00 00:00:00', 1, 1),
(5, 2017, 1, '2020-01-09 11:51:19', '0000-00-00 00:00:00', 1, 1),
(6, 2016, 1, '2020-01-09 11:51:30', '0000-00-00 00:00:00', 1, 1);

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
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;

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
  MODIFY `topic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `year`
--
ALTER TABLE `year`
  MODIFY `year_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
