-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2017 at 05:09 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yusuf_school`
--

-- --------------------------------------------------------

--
-- Table structure for table `achievement`
--

CREATE TABLE `achievement` (
  `ACHIEVEMENT_ID` int(11) NOT NULL,
  `TITLE` varchar(150) NOT NULL,
  `DETAILS` text NOT NULL,
  `IMAGES` varchar(80) NOT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `CREATED_DATE` date NOT NULL,
  `UPDATED_BY` int(11) NOT NULL,
  `UPDATED_DATE` date NOT NULL,
  `STATUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `achievement`
--

INSERT INTO `achievement` (`ACHIEVEMENT_ID`, `TITLE`, `DETAILS`, `IMAGES`, `CREATED_BY`, `CREATED_DATE`, `UPDATED_BY`, `UPDATED_DATE`, `STATUS`) VALUES
(1, 'Nazrul Sriti Podok', '', 'achievement.jpg', 1, '2016-09-03', 0, '0000-00-00', 7);

-- --------------------------------------------------------

--
-- Table structure for table `additional_data`
--

CREATE TABLE `additional_data` (
  `ADD_ID` int(11) NOT NULL,
  `TYPE` varchar(50) NOT NULL,
  `TITLE` varchar(100) NOT NULL,
  `URL` varchar(300) NOT NULL,
  `DETAILS` text NOT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `CREATED_DATE` date NOT NULL,
  `UPDATED_BY` int(11) NOT NULL,
  `UPDATED_DATE` date NOT NULL,
  `STATUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `additional_data`
--

INSERT INTO `additional_data` (`ADD_ID`, `TYPE`, `TITLE`, `URL`, `DETAILS`, `CREATED_BY`, `CREATED_DATE`, `UPDATED_BY`, `UPDATED_DATE`, `STATUS`) VALUES
(2, 'notice', 'BCS (Tax) Academy is the apex training institution', 'http://bcstax.xom', 'This is a description', 1, '2016-05-20', 1, '2016-06-11', -7),
(3, 'notice', 'Taxes Department of National Board of Revenue in Bangladesh', '#', 'This is a information', 1, '2016-05-20', 0, '0000-00-00', 7),
(4, 'notice', 'This is photoshop version of Lorem Ipsum. Proin gravida nibh vel velit', '#', 'This is a data', 1, '2016-05-20', 0, '0000-00-00', 7),
(5, 'links', 'Bangabhaban', 'http://www.bangabhaban.gov.bd/index.php', '', 1, '2016-05-20', 0, '0000-00-00', 7),
(6, 'links', 'Cabinet Division', 'http://www.cabinet.gov.bd/', '', 1, '2016-05-20', 0, '0000-00-00', 7),
(7, 'links', 'The Prime Ministers Office', 'http://www.pmo.gov.bd/', '', 1, '2016-05-20', 0, '0000-00-00', 7),
(8, 'links', 'Ministry of Finance', 'http://www.mof.gov.bd/en/', '', 1, '2016-05-20', 0, '0000-00-00', 7),
(9, 'links', 'National Board of Revenue', 'http://www.nbr.gov.bd/', '', 1, '2016-05-20', 0, '0000-00-00', 7),
(10, 'links', 'Ministry of Commerce', 'http://www.mincom.gov.bd/', '', 1, '2016-05-20', 0, '0000-00-00', 7),
(11, 'links', 'Ministry of Foreign Affairs', 'http://www.mofa.gov.bd/', '', 1, '2016-05-20', 0, '0000-00-00', 7),
(12, 'links', 'Ministry of Public Administration', 'http://www.mopa.gov.bd/en', '', 1, '2016-05-20', 0, '0000-00-00', 7),
(13, 'links', 'BPATC', 'http://www.bpatc.org.bd/', '', 1, '2016-05-20', 0, '0000-00-00', 7),
(14, 'events', 'Event One', '#', '', 1, '2016-05-20', 1, '2016-05-20', 7),
(15, 'events', 'Event Two', '#', '', 1, '2016-05-20', 0, '0000-00-00', 7),
(16, 'events', 'Event Three', '#', '', 1, '2016-05-20', 0, '0000-00-00', 7),
(17, 'events', 'Event Four', '#', '', 1, '2016-05-20', 0, '0000-00-00', 7),
(19, 'contact', 'Contact Us', '', '47 Bir Uttam Samsul Alam Sarak,\nDhaka 1000-1200,\nBangladesh', 1, '2016-05-25', 1, '2016-05-26', 7),
(20, 'Career', 'Programmer Wanted', 'Career', 'An AXPX programmer required for Comilla Yousuf High School', 1, '2016-12-26', 0, '0000-00-00', 7);

-- --------------------------------------------------------

--
-- Table structure for table `admit_student_to_hostel`
--

CREATE TABLE `admit_student_to_hostel` (
  `ADMIT_STUDENT_TO_HOSTEL_ID` int(11) NOT NULL,
  `CLASS_ID` int(11) NOT NULL,
  `SECTION_ID` int(11) NOT NULL,
  `STUDENT_DATA_ID` int(11) NOT NULL,
  `HOUSE_ID` int(11) NOT NULL,
  `ROOM_NO` varchar(15) NOT NULL,
  `SEAT_NO` varchar(12) NOT NULL,
  `YEAR` year(4) NOT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `CREATED_DATE` date NOT NULL,
  `UPDATED_BY` int(11) NOT NULL,
  `UPDATED_DATE` date NOT NULL,
  `STATUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `assign_hostel_teacher`
--

CREATE TABLE `assign_hostel_teacher` (
  `ASSIGN_HOSTEL_TEACHER_ID` int(11) NOT NULL,
  `HOUSE_ID` int(11) NOT NULL,
  `TEACHER_ID` int(11) NOT NULL,
  `SESSION` varchar(100) NOT NULL,
  `YEAR` year(4) NOT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `CREATED_DATE` date NOT NULL,
  `UPDATED_BY` int(11) NOT NULL,
  `UPDATED_DATE` date NOT NULL,
  `STATUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `assign_hostel_teacher`
--

INSERT INTO `assign_hostel_teacher` (`ASSIGN_HOSTEL_TEACHER_ID`, `HOUSE_ID`, `TEACHER_ID`, `SESSION`, `YEAR`, `CREATED_BY`, `CREATED_DATE`, `UPDATED_BY`, `UPDATED_DATE`, `STATUS`) VALUES
(4, 1, 1, '2016-2017', 2016, 1, '2016-08-14', 1, '2016-08-14', 7),
(5, 5, 5, '2015-2016', 2016, 1, '2016-08-14', 1, '2016-08-14', 7),
(6, 9, 6, '2015-2017', 2016, 1, '2016-08-14', 0, '0000-00-00', 7);

-- --------------------------------------------------------

--
-- Table structure for table `assign_student_subject`
--

CREATE TABLE `assign_student_subject` (
  `A_STU_SUB` int(11) NOT NULL,
  `CLASS_ID` int(11) NOT NULL,
  `SECTION_ID` int(11) NOT NULL,
  `STUDENT_ID` int(11) NOT NULL,
  `GROUP_NAME` varchar(20) NOT NULL,
  `GROUP_SUB_ID` varchar(300) NOT NULL,
  `OPTIONAL_SUB_ID` int(11) NOT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `CREATED_DATE` date NOT NULL,
  `UPDATED_BY` int(11) NOT NULL,
  `UPDATED_DATE` date NOT NULL,
  `STATUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `assign_student_subject`
--

INSERT INTO `assign_student_subject` (`A_STU_SUB`, `CLASS_ID`, `SECTION_ID`, `STUDENT_ID`, `GROUP_NAME`, `GROUP_SUB_ID`, `OPTIONAL_SUB_ID`, `CREATED_BY`, `CREATED_DATE`, `UPDATED_BY`, `UPDATED_DATE`, `STATUS`) VALUES
(1, 11, 42, 1, 'commerce', '104|105|106', 99, 1, '2016-12-20', 0, '0000-00-00', 7),
(2, 11, 42, 2, 'commerce', '104|105|106', 99, 1, '2016-12-20', 0, '0000-00-00', 7),
(3, 11, 42, 3, 'commerce', '104|105|106', 99, 1, '2016-12-20', 0, '0000-00-00', 7),
(4, 11, 42, 5, 'commerce', '104|105|106', 99, 1, '2016-12-20', 0, '0000-00-00', 7),
(5, 11, 42, 6, 'commerce', '104|105|106', 99, 1, '2016-12-20', 0, '0000-00-00', 7),
(6, 11, 42, 7, 'commerce', '104|105|106', 99, 1, '2016-12-20', 0, '0000-00-00', 7),
(7, 11, 42, 8, 'commerce', '104|105|106', 99, 1, '2016-12-20', 0, '0000-00-00', 7),
(8, 11, 42, 9, 'commerce', '104|105|106', 99, 1, '2016-12-20', 0, '0000-00-00', 7),
(9, 11, 42, 10, 'commerce', '104|105|106', 99, 1, '2016-12-20', 0, '0000-00-00', 7),
(10, 11, 42, 11, 'commerce', '104|105|106', 99, 1, '2016-12-20', 0, '0000-00-00', 7),
(11, 11, 42, 12, 'commerce', '104|105|106', 99, 1, '2016-12-20', 0, '0000-00-00', 7),
(12, 11, 42, 13, 'commerce', '104|105|106', 99, 1, '2016-12-20', 0, '0000-00-00', 7),
(13, 11, 42, 14, 'commerce', '104|105|106', 99, 1, '2016-12-20', 0, '0000-00-00', 7),
(14, 11, 42, 15, 'commerce', '104|105|106', 99, 1, '2016-12-20', 0, '0000-00-00', 7),
(15, 11, 42, 16, 'commerce', '104|105|106', 99, 1, '2016-12-20', 0, '0000-00-00', 7),
(16, 11, 42, 17, 'commerce', '104|105|106', 99, 1, '2016-12-20', 0, '0000-00-00', 7),
(17, 11, 42, 18, 'commerce', '104|105|106', 99, 1, '2016-12-20', 0, '0000-00-00', 7),
(18, 11, 42, 19, 'commerce', '104|105|106', 99, 1, '2016-12-20', 0, '0000-00-00', 7),
(19, 11, 42, 20, 'commerce', '104|105|106', 99, 1, '2016-12-20', 0, '0000-00-00', 7),
(20, 11, 42, 354, 'commerce', '104|105|106', 99, 1, '2016-12-20', 0, '0000-00-00', 7),
(21, 11, 42, 355, 'commerce', '104|105|106', 99, 1, '2016-12-20', 0, '0000-00-00', 7),
(22, 11, 42, 356, 'commerce', '104|105|106', 99, 1, '2016-12-20', 0, '0000-00-00', 7),
(23, 11, 42, 358, 'commerce', '104|105|106', 99, 1, '2016-12-20', 0, '0000-00-00', 7),
(24, 11, 42, 360, 'commerce', '104|105|106', 99, 1, '2016-12-20', 0, '0000-00-00', 7),
(25, 11, 42, 361, 'commerce', '104|105|106', 99, 1, '2016-12-20', 0, '0000-00-00', 7),
(26, 11, 42, 364, 'commerce', '104|105|106', 99, 1, '2016-12-20', 0, '0000-00-00', 7),
(27, 11, 42, 366, 'commerce', '104|105|106', 99, 1, '2016-12-20', 0, '0000-00-00', 7),
(28, 11, 42, 367, 'commerce', '104|105|106', 99, 1, '2016-12-20', 0, '0000-00-00', 7),
(29, 11, 42, 369, 'commerce', '104|105|106', 99, 1, '2016-12-20', 0, '0000-00-00', 7),
(30, 11, 42, 370, 'commerce', '104|105|106', 99, 1, '2016-12-20', 0, '0000-00-00', 7),
(31, 11, 42, 372, 'commerce', '104|105|106', 99, 1, '2016-12-20', 0, '0000-00-00', 7),
(32, 11, 42, 374, 'commerce', '104|105|106', 99, 1, '2016-12-20', 0, '0000-00-00', 7),
(33, 11, 42, 376, 'commerce', '104|105|106', 99, 1, '2016-12-20', 0, '0000-00-00', 7),
(34, 11, 42, 378, 'commerce', '104|105|106', 99, 1, '2016-12-20', 0, '0000-00-00', 7),
(35, 11, 42, 379, 'commerce', '104|105|106', 99, 1, '2016-12-20', 0, '0000-00-00', 7),
(36, 11, 42, 529, 'commerce', '104|105|106', 99, 1, '2016-12-20', 0, '0000-00-00', 7);

-- --------------------------------------------------------

--
-- Table structure for table `assign_subject`
--

CREATE TABLE `assign_subject` (
  `ASSIGN_SUBJECT_ID` int(11) NOT NULL,
  `TEACHER_ID` int(11) NOT NULL,
  `CLASS_ID` int(11) NOT NULL,
  `SECTION_ID` int(11) NOT NULL,
  `SUBJECT_ID` int(11) NOT NULL,
  `YEAR` int(11) NOT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `CREATED_DATE` date NOT NULL,
  `UPDATED_BY` int(11) NOT NULL,
  `UPDATED_DATE` date NOT NULL,
  `STATUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `assign_subject`
--

INSERT INTO `assign_subject` (`ASSIGN_SUBJECT_ID`, `TEACHER_ID`, `CLASS_ID`, `SECTION_ID`, `SUBJECT_ID`, `YEAR`, `CREATED_BY`, `CREATED_DATE`, `UPDATED_BY`, `UPDATED_DATE`, `STATUS`) VALUES
(1, 1, 9, 33, 14, 2016, 1, '2016-12-26', 1, '2016-12-26', 7);

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `ATT_ID` int(11) NOT NULL,
  `CLASS_ID` int(11) NOT NULL,
  `SECTION_ID` int(11) NOT NULL,
  `STUDENT_ID` int(11) NOT NULL,
  `ATT_STATUS` int(11) NOT NULL,
  `ATT_COMMENT` varchar(300) NOT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `CREATED_DATE` date NOT NULL,
  `UPDATED_BY` int(11) NOT NULL,
  `UPDATED_DATE` date NOT NULL,
  `STATUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`ATT_ID`, `CLASS_ID`, `SECTION_ID`, `STUDENT_ID`, `ATT_STATUS`, `ATT_COMMENT`, `CREATED_BY`, `CREATED_DATE`, `UPDATED_BY`, `UPDATED_DATE`, `STATUS`) VALUES
(1, 9, 33, 183, 0, '', 1, '2016-12-26', 0, '0000-00-00', 7),
(2, 9, 33, 184, 0, '', 1, '2016-12-26', 0, '0000-00-00', 7),
(3, 9, 33, 185, 0, '', 1, '2016-12-26', 0, '0000-00-00', 7),
(4, 9, 33, 186, 0, '', 1, '2016-12-26', 0, '0000-00-00', 7),
(5, 9, 33, 187, 0, '', 1, '2016-12-26', 0, '0000-00-00', 7),
(6, 9, 33, 188, 0, '', 1, '2016-12-26', 0, '0000-00-00', 7),
(7, 9, 33, 189, 0, '', 1, '2016-12-26', 0, '0000-00-00', 7),
(8, 9, 33, 190, 0, '', 1, '2016-12-26', 0, '0000-00-00', 7),
(9, 9, 33, 191, 0, '', 1, '2016-12-26', 0, '0000-00-00', 7),
(10, 9, 33, 192, 0, '', 1, '2016-12-26', 0, '0000-00-00', 7),
(11, 9, 33, 193, 0, '', 1, '2016-12-26', 0, '0000-00-00', 7),
(12, 9, 33, 194, 0, '', 1, '2016-12-26', 0, '0000-00-00', 7),
(13, 9, 33, 195, 1, '', 1, '2016-12-26', 0, '0000-00-00', 7),
(14, 9, 33, 196, 0, '', 1, '2016-12-26', 0, '0000-00-00', 7),
(15, 9, 33, 197, 0, '', 1, '2016-12-26', 0, '0000-00-00', 7),
(16, 9, 33, 198, 0, '', 1, '2016-12-26', 0, '0000-00-00', 7),
(17, 9, 33, 199, 0, '', 1, '2016-12-26', 0, '0000-00-00', 7),
(18, 9, 33, 200, 0, '', 1, '2016-12-26', 0, '0000-00-00', 7),
(19, 9, 33, 202, 0, '', 1, '2016-12-26', 0, '0000-00-00', 7),
(20, 9, 33, 203, 0, '', 1, '2016-12-26', 0, '0000-00-00', 7),
(21, 9, 33, 204, 0, '', 1, '2016-12-26', 0, '0000-00-00', 7),
(22, 9, 33, 205, 0, '', 1, '2016-12-26', 0, '0000-00-00', 7),
(23, 9, 33, 206, 0, '', 1, '2016-12-26', 0, '0000-00-00', 7),
(24, 9, 33, 207, 0, '', 1, '2016-12-26', 0, '0000-00-00', 7),
(25, 9, 33, 208, 0, '', 1, '2016-12-26', 0, '0000-00-00', 7),
(26, 9, 33, 209, 0, '', 1, '2016-12-26', 0, '0000-00-00', 7),
(27, 9, 33, 210, 0, '', 1, '2016-12-26', 0, '0000-00-00', 7),
(28, 9, 33, 211, 0, '', 1, '2016-12-26', 0, '0000-00-00', 7),
(29, 9, 33, 212, 0, '', 1, '2016-12-26', 0, '0000-00-00', 7),
(30, 9, 33, 213, 0, '', 1, '2016-12-26', 0, '0000-00-00', 7),
(31, 9, 33, 214, 0, '', 1, '2016-12-26', 0, '0000-00-00', 7),
(32, 9, 33, 215, 0, '', 1, '2016-12-26', 0, '0000-00-00', 7),
(33, 9, 33, 216, 0, '', 1, '2016-12-26', 0, '0000-00-00', 7),
(34, 9, 33, 217, 0, '', 1, '2016-12-26', 0, '0000-00-00', 7),
(35, 9, 33, 218, 0, '', 1, '2016-12-26', 0, '0000-00-00', 7),
(36, 9, 33, 219, 0, '', 1, '2016-12-26', 0, '0000-00-00', 7),
(37, 9, 33, 220, 0, '', 1, '2016-12-26', 0, '0000-00-00', 7),
(38, 9, 33, 221, 0, '', 1, '2016-12-26', 0, '0000-00-00', 7),
(39, 9, 33, 222, 0, '', 1, '2016-12-26', 0, '0000-00-00', 7),
(40, 9, 33, 223, 0, '', 1, '2016-12-26', 0, '0000-00-00', 7),
(41, 9, 33, 224, 0, '', 1, '2016-12-26', 0, '0000-00-00', 7),
(42, 9, 33, 225, 0, '', 1, '2016-12-26', 0, '0000-00-00', 7),
(43, 9, 33, 226, 0, '', 1, '2016-12-26', 0, '0000-00-00', 7),
(44, 9, 33, 227, 0, '', 1, '2016-12-26', 0, '0000-00-00', 7),
(45, 9, 33, 228, 0, '', 1, '2016-12-26', 0, '0000-00-00', 7),
(46, 9, 33, 229, 0, '', 1, '2016-12-26', 0, '0000-00-00', 7),
(47, 9, 33, 230, 0, '', 1, '2016-12-26', 0, '0000-00-00', 7),
(48, 9, 33, 231, 0, '', 1, '2016-12-26', 0, '0000-00-00', 7),
(49, 9, 33, 232, 0, '', 1, '2016-12-26', 0, '0000-00-00', 7),
(50, 9, 33, 233, 0, '', 1, '2016-12-26', 0, '0000-00-00', 7),
(51, 9, 33, 234, 0, '', 1, '2016-12-26', 0, '0000-00-00', 7),
(52, 9, 33, 235, 0, '', 1, '2016-12-26', 0, '0000-00-00', 7),
(53, 9, 33, 236, 0, '', 1, '2016-12-26', 0, '0000-00-00', 7),
(54, 9, 33, 237, 0, '', 1, '2016-12-26', 0, '0000-00-00', 7),
(55, 9, 33, 238, 0, '', 1, '2016-12-26', 0, '0000-00-00', 7),
(56, 9, 33, 239, 0, '', 1, '2016-12-26', 0, '0000-00-00', 7),
(57, 9, 33, 240, 0, '', 1, '2016-12-26', 0, '0000-00-00', 7),
(58, 9, 33, 241, 0, '', 1, '2016-12-26', 0, '0000-00-00', 7),
(59, 9, 33, 242, 0, '', 1, '2016-12-26', 0, '0000-00-00', 7),
(60, 9, 33, 243, 0, '', 1, '2016-12-26', 0, '0000-00-00', 7),
(61, 9, 33, 244, 0, '', 1, '2016-12-26', 0, '0000-00-00', 7),
(62, 9, 33, 245, 0, '', 1, '2016-12-26', 0, '0000-00-00', 7),
(63, 9, 33, 246, 0, '', 1, '2016-12-26', 0, '0000-00-00', 7),
(64, 9, 33, 247, 0, '', 1, '2016-12-26', 0, '0000-00-00', 7),
(65, 9, 33, 248, 0, '', 1, '2016-12-26', 0, '0000-00-00', 7),
(66, 9, 33, 338, 0, '', 1, '2016-12-26', 0, '0000-00-00', 7),
(67, 9, 33, 341, 0, '', 1, '2016-12-26', 0, '0000-00-00', 7),
(68, 9, 33, 348, 0, '', 1, '2016-12-26', 0, '0000-00-00', 7),
(69, 9, 33, 349, 0, '', 1, '2016-12-26', 0, '0000-00-00', 7),
(70, 9, 33, 351, 0, '', 1, '2016-12-26', 0, '0000-00-00', 7);

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `BOOK_ID` int(11) NOT NULL,
  `BOOK_CATEGORY_ID` int(11) NOT NULL,
  `WRITER_ID` int(11) NOT NULL,
  `BOOK_NAME` varchar(150) NOT NULL,
  `BOOK_DESCRIPTION` text NOT NULL,
  `BOOK_CODE` varchar(100) NOT NULL,
  `ISBN_NO` varchar(100) NOT NULL,
  `NUMBER_OF_COPIES` int(11) NOT NULL,
  `BOOK_LOCATION` text NOT NULL,
  `EDITION_NO` int(11) NOT NULL,
  `EDITION_YEAR` date NOT NULL,
  `IMAGES` varchar(70) NOT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `CREATED_DATE` date NOT NULL,
  `UPDATED_BY` int(11) NOT NULL,
  `UPDATED_DATE` date NOT NULL,
  `STATUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`BOOK_ID`, `BOOK_CATEGORY_ID`, `WRITER_ID`, `BOOK_NAME`, `BOOK_DESCRIPTION`, `BOOK_CODE`, `ISBN_NO`, `NUMBER_OF_COPIES`, `BOOK_LOCATION`, `EDITION_NO`, `EDITION_YEAR`, `IMAGES`, `CREATED_BY`, `CREATED_DATE`, `UPDATED_BY`, `UPDATED_DATE`, `STATUS`) VALUES
(1, 1, 2, 'Himu', 'dsaf', '4545', '787578578', 45, 'asdf', 4, '2016-07-06', '321d8a25eb0c51dd8de4141341204adf.jpg', 1, '2016-07-26', 1, '2016-07-28', 7),
(2, 3, 1, 'Podda Nodir Maji', 'Nodi', '154', '2844', 10, '3no ', 45, '2016-06-29', '1390582732-470_Book2.jpg', 1, '2016-07-28', 0, '0000-00-00', 7),
(3, 2, 2, 'The Last Poem', 'Shesher Kabita  is a novel by Rabindranath Tagore, widely considered a ... Chaturange  Chokher Bali  Ghare Baire  Nastanirh  Jogajog  Shesher Kobita  The Wreck. Stories. Kabuliwala. Poetry.', '45', '45757', 10, '3 Numbers shelves', 485, '2016-06-28', '', 1, '2016-07-28', 1, '2016-07-28', 7),
(4, 2, 8, 'Kobor', 'Kobor', '787', '2844', 10, '3 no shelf', 45, '2016-06-29', 'a3f57eca249b293457c57818fb97d6a5.jpg', 1, '2016-07-28', 0, '0000-00-00', 7),
(5, 4, 9, 'Amar Bondhu Rasel', 'Amar bondhu rasel', '024', '787878', 10, '3 no', 12, '2016-07-07', 'Book3693.jpg', 1, '2016-07-28', 1, '2016-07-28', 7),
(6, 4, 9, 'Finix', 'This is Science Fiction', '458', '56585ASD', 12, '3 NO SHELFS', 1, '2016-07-07', '3918805.jpg', 1, '2016-07-28', 0, '0000-00-00', 7);

-- --------------------------------------------------------

--
-- Table structure for table `book_category`
--

CREATE TABLE `book_category` (
  `BOOK_CATEGORY_ID` int(11) NOT NULL,
  `CATEGORY_NAME` varchar(150) NOT NULL,
  `CATEGORY_DETAILS` text NOT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `CREATED_DATE` date NOT NULL,
  `UPDATED_BY` int(11) NOT NULL,
  `UPDATED_DATE` int(11) NOT NULL,
  `STATUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `book_category`
--

INSERT INTO `book_category` (`BOOK_CATEGORY_ID`, `CATEGORY_NAME`, `CATEGORY_DETAILS`, `CREATED_BY`, `CREATED_DATE`, `UPDATED_BY`, `UPDATED_DATE`, `STATUS`) VALUES
(1, 'Novel', 'This is Novel.', 1, '2016-07-26', 1, 2016, 7),
(2, 'Poem', 'This is Poem.\r\n', 1, '2016-07-26', 1, 2016, 7),
(3, 'Story Book', 'This is Story Book', 1, '2016-07-26', 0, 0, 7),
(4, 'Science Fiction', 'This is Science Fiction', 1, '2016-07-26', 0, 0, 7);

-- --------------------------------------------------------

--
-- Table structure for table `book_issue`
--

CREATE TABLE `book_issue` (
  `BOOK_ISSUE_ID` int(11) NOT NULL,
  `BOOK_ID` varchar(112) NOT NULL,
  `LIBRARY_MEMBER_ID` int(11) NOT NULL,
  `ISSUE_DATE` date NOT NULL,
  `ISSUE_EXPIREDATE` date NOT NULL,
  `TOTAL_BOOK_ISSUE` int(11) NOT NULL,
  `RETURN_STATUS` int(11) NOT NULL DEFAULT '0',
  `CREATED_BY` int(11) NOT NULL,
  `CREATED_DATE` date NOT NULL,
  `UPDATED_BY` int(11) NOT NULL,
  `UPDATED_DATE` date NOT NULL,
  `STATUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `book_issue`
--

INSERT INTO `book_issue` (`BOOK_ISSUE_ID`, `BOOK_ID`, `LIBRARY_MEMBER_ID`, `ISSUE_DATE`, `ISSUE_EXPIREDATE`, `TOTAL_BOOK_ISSUE`, `RETURN_STATUS`, `CREATED_BY`, `CREATED_DATE`, `UPDATED_BY`, `UPDATED_DATE`, `STATUS`) VALUES
(1, '1,5', 2, '2016-07-02', '2016-07-12', 2, 0, 1, '2016-07-28', 1, '2016-07-28', 7),
(2, '3,4', 3, '2016-07-28', '2016-08-03', 2, 1, 1, '2016-07-28', 1, '2016-07-28', 7),
(4, '1,3,6', 5, '2016-07-19', '2016-07-30', 3, 0, 1, '2016-07-28', 0, '0000-00-00', 7),
(5, '5', 6, '2016-07-12', '2016-07-27', 1, 0, 1, '2016-07-28', 1, '2016-07-28', 7),
(6, '1,3,4', 7, '2016-07-13', '2016-07-29', 3, 0, 1, '2016-07-28', 0, '0000-00-00', 7),
(7, '3,4', 8, '2016-06-06', '2016-06-22', 2, 1, 1, '2016-07-28', 0, '0000-00-00', 7),
(8, '1,4,5', 8, '2016-06-23', '2016-06-29', 3, 1, 1, '2016-07-28', 0, '0000-00-00', 7),
(9, '6', 8, '2016-07-03', '2016-07-15', 1, 0, 1, '2016-07-28', 0, '0000-00-00', 7),
(10, '4,2,5', 8, '2016-07-20', '2016-08-20', 3, 0, 1, '2016-07-28', 0, '0000-00-00', 7);

-- --------------------------------------------------------

--
-- Table structure for table `book_request`
--

CREATE TABLE `book_request` (
  `REQUEST_ID` int(11) NOT NULL,
  `MEMBER_ID` int(11) NOT NULL,
  `BOOK_NAME` varchar(200) NOT NULL,
  `WRITER_NAME` varchar(100) NOT NULL,
  `BOOK_DESCRIPTION` text NOT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `CREATED_DATE` date NOT NULL,
  `UPDATED_BY` int(11) NOT NULL,
  `UPDATED_DATE` date NOT NULL,
  `STATUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `book_request`
--

INSERT INTO `book_request` (`REQUEST_ID`, `MEMBER_ID`, `BOOK_NAME`, `WRITER_NAME`, `BOOK_DESCRIPTION`, `CREATED_BY`, `CREATED_DATE`, `UPDATED_BY`, `UPDATED_DATE`, `STATUS`) VALUES
(1, 1, 'Shsher Kobita', 'Robi', 'sadf', 1, '2016-07-28', 0, '0000-00-00', 7),
(2, 1, 'Ek Veza Biralir Biborton', 'Al Mahmud', 'Book Review: Al Mahmud is Bangladeshi poet, journalist and writer. His full name is Mir Abdus Shukur Al Mahmud', 1, '2016-07-28', 0, '0000-00-00', 7),
(3, 8, 'sdgsdg', 'fdgvdsfgbv', 'sgvsr', 6, '2016-07-28', 0, '0000-00-00', 7),
(4, 8, 'dfbgfd', 'dhb', 'gfhjnfghjnfjmnf', 6, '2016-07-28', 0, '0000-00-00', 7),
(5, 8, 'fcgbfgnh', 'fgjnmn', 'fgykhkm', 6, '2016-07-28', 0, '0000-00-00', 7);

-- --------------------------------------------------------

--
-- Table structure for table `book_writer`
--

CREATE TABLE `book_writer` (
  `WRITER_ID` int(11) NOT NULL,
  `BOOK_CATEGORY_ID` int(11) NOT NULL,
  `WRITER_NAME` varchar(70) NOT NULL,
  `COUNTRY_NAME` varchar(50) NOT NULL,
  `DATE_OF_BIRTH` date NOT NULL,
  `DATE_OF_DEATH` date NOT NULL,
  `FULL_ADDRESS` text NOT NULL,
  `ACHIEVEMENT` text NOT NULL,
  `EDUCATIONAL_DETAILS` text NOT NULL,
  `MARITAL_STATUS` varchar(20) NOT NULL,
  `SPOUSE_NAME` varchar(70) NOT NULL,
  `FATHER_NAME` varchar(70) NOT NULL,
  `MOTHER_NAME` varchar(70) NOT NULL,
  `CHILDREN_DETAILS` text NOT NULL,
  `IMAGES` varchar(150) NOT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `CREATED_DATE` date NOT NULL,
  `UPDATED_BY` int(11) NOT NULL,
  `UPDATED_DATE` date NOT NULL,
  `STATUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `book_writer`
--

INSERT INTO `book_writer` (`WRITER_ID`, `BOOK_CATEGORY_ID`, `WRITER_NAME`, `COUNTRY_NAME`, `DATE_OF_BIRTH`, `DATE_OF_DEATH`, `FULL_ADDRESS`, `ACHIEVEMENT`, `EDUCATIONAL_DETAILS`, `MARITAL_STATUS`, `SPOUSE_NAME`, `FATHER_NAME`, `MOTHER_NAME`, `CHILDREN_DETAILS`, `IMAGES`, `CREATED_BY`, `CREATED_DATE`, `UPDATED_BY`, `UPDATED_DATE`, `STATUS`) VALUES
(1, 1, 'Humayun Ahmed', 'Bangldesh', '2016-07-27', '2016-07-27', 'Kutubpur, Mymensingh', 'Bangladesh National Film Award for Best Story', '(SSC) examination from Bogra Zilla School in 1967 and was listed as second in merit by the Rajshahi Education Board (HSC) examination from Dhaka College in 1969. Ahmed then attended the University of Dhaka and graduated with a Bachelor of Science in Chemistry', 'Married', 'Shaon Ahmed (m. 20052012), Gultekin Ahmed (m. 19732003)', 'Faizur Rahman', 'Ayesha Begum', ' Shila Ahmed, Bipasha Ahmed, Ninit Ahmed, Nova Ahmed, Nishad Ahmed, Nuhash Ahmed', '', 1, '2016-07-26', 1, '2016-07-27', 7),
(2, 1, 'Rabindranath Tagore', 'Bangldesh', '1970-01-01', '1941-08-07', 'Tagore was born in the city of Kolkata (formerly called Calcutta), at No. 6 Dwarkanath Tagore Lane, Jorasanko Thakur Bari. He was the youngest of his parents'' 14 children. His father was Debendranath Tagore; his mother was Sarada Devi.', 'Nobel Prize in Literature', 'University of Calcutta', 'Married', 'Mrinalini Devi', 'Debendranath Tagore', 'Sarada Devi', '1. Renuka Tagore\r\nDaughter\r\n2. Meera Tagore\r\nDaughter\r\n3. Madhurilata Tagore\r\nDaughter\r\n4. Rathindranath Tagore\r\nSon\r\n5. Shamindranath Tagore\r\nChild', 'Rabindranat_7.jpg', 1, '2016-07-26', 1, '2016-07-27', 7),
(3, 1, 'Kazi Nozrul Islam', 'Bangldesh', '0000-00-00', '0000-00-00', 'ASDF', 'ASDF', 'ASDF', '', '', '', '', '', '', 1, '2016-07-26', 0, '0000-00-00', 7),
(4, 1, 'SADF', 'DAFS', '1970-01-01', '1970-01-01', 'DSA', 'ADS', 'DASF', 'SDF', '', '', '', '', '', 1, '2016-07-26', 1, '2016-07-26', 7),
(5, 1, 'SD', 'ASD', '0000-00-00', '0000-00-00', 'ADSF', 'FDA', 'ASD', 'ASD', 'AS', 'ASD', '', '', '', 1, '2016-07-26', 0, '0000-00-00', 7),
(6, 1, 'DSAF', 'ASD', '0000-00-00', '0000-00-00', 'ASD', 'ASD', 'ADS', 'DSAF', 'DSAF', 'DSAF', 'ASD', '', '', 1, '2016-07-26', 0, '0000-00-00', 7),
(7, 1, 'HumayuASAn Ahmed', 'ASDF', '0000-00-00', '0000-00-00', 'ASDF', 'ADSF', 'ASDF', 'ASDF', 'Shaon Ahmed (m. 20052012), Gultekin Ahmed (m. 19732003)', 'ASD', 'Ayesha Begum', 'ASD', '', 1, '2016-07-26', 1, '2016-07-26', 7),
(8, 2, 'Joshim Uddin', 'Bangladesh', '0000-00-00', '0000-00-00', 'Dhaka, Bangladesh', 'Ekushe Podok', 'PHD', 'Married', 'N/A', 'Md. Johir uddin', 'Sarada Dev', '3', 'images.jpg', 1, '2016-07-28', 0, '0000-00-00', 7),
(9, 4, 'Jafor Iqbal', 'Bangladesh', '0000-00-00', '0000-00-00', '', '', '', '', '', '', '', '', 'images.jpg', 1, '2016-07-28', 0, '0000-00-00', 7);

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

CREATE TABLE `calendar` (
  `EVENT_ID` int(11) NOT NULL,
  `DATE` varchar(100) NOT NULL,
  `DATA` varchar(400) NOT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `CREATED_DATE` date NOT NULL,
  `UPDATED_BY` int(11) NOT NULL,
  `UPDATED_DATE` date NOT NULL,
  `STATUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `calendar`
--

INSERT INTO `calendar` (`EVENT_ID`, `DATE`, `DATA`, `CREATED_BY`, `CREATED_DATE`, `UPDATED_BY`, `UPDATED_DATE`, `STATUS`) VALUES
(1, '2016-08-1', 'Hello World, I am here', 1, '2016-08-10', 1, '2016-08-23', 7),
(2, '2016-08-23', 'We need an event', 1, '2016-08-16', 0, '0000-00-00', 7),
(3, '2016-08-3', 'xdfgt', 1, '2016-08-23', 0, '0000-00-00', 7),
(4, '2016-09-13', 'Eid ul azha', 1, '2016-08-23', 1, '2016-09-04', 7),
(5, '2016-08-19', 'sdfvsdgvsf', 1, '2016-08-23', 0, '0000-00-00', 7);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `CATEGORY_ID` int(11) NOT NULL,
  `CATEGORY_NAME` varchar(50) NOT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `CREATED_DATE` date NOT NULL,
  `UPDATED_BY` int(11) NOT NULL,
  `UPDATED_DATE` int(11) NOT NULL,
  `STATUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CATEGORY_ID`, `CATEGORY_NAME`, `CREATED_BY`, `CREATED_DATE`, `UPDATED_BY`, `UPDATED_DATE`, `STATUS`) VALUES
(8, 'Gallery', 1, '2016-05-04', 4, 2016, 7),
(9, 'Downloads', 1, '2016-05-04', 0, 0, 7),
(10, 'Videos', 1, '2016-05-20', 0, 0, 7),
(11, 'Page', 1, '2016-05-23', 0, 0, 7);

-- --------------------------------------------------------

--
-- Table structure for table `category_list`
--

CREATE TABLE `category_list` (
  `LIST_ID` int(11) NOT NULL,
  `CATEGORY_NAME` varchar(255) NOT NULL,
  `CATEGORY_TYPE` varchar(20) NOT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `CREATED_DATE` date NOT NULL,
  `UPDATED_BY` int(11) NOT NULL,
  `UPDATED_DATE` date NOT NULL,
  `STATUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category_list`
--

INSERT INTO `category_list` (`LIST_ID`, `CATEGORY_NAME`, `CATEGORY_TYPE`, `CREATED_BY`, `CREATED_DATE`, `UPDATED_BY`, `UPDATED_DATE`, `STATUS`) VALUES
(1, 'Tuition Fees', 'income', 1, '2017-01-22', 0, '0000-00-00', 7),
(2, 'Tiffin', 'income', 1, '2017-01-22', 0, '0000-00-00', 7),
(3, 'Electricity', 'income', 1, '2017-01-22', 0, '0000-00-00', 7),
(4, 'ICT', 'income', 1, '2017-01-22', 0, '0000-00-00', 7),
(5, 'Admission', 'income', 1, '2017-01-22', 0, '0000-00-00', 7),
(6, 'Sports', 'income', 1, '2017-01-22', 0, '0000-00-00', 7),
(7, 'Common Room', 'income', 1, '2017-01-22', 0, '0000-00-00', 7),
(8, 'Development', 'income', 1, '2017-01-22', 0, '0000-00-00', 7),
(9, 'Magazine', 'income', 1, '2017-01-22', 0, '0000-00-00', 7),
(10, 'Religious Activities', 'income', 1, '2017-01-22', 0, '0000-00-00', 7),
(11, 'Gratuity', 'income', 1, '2017-01-22', 0, '0000-00-00', 7),
(12, 'Poor Fund', 'income', 1, '2017-01-22', 0, '0000-00-00', 7),
(13, 'Printing', 'income', 1, '2017-01-22', 0, '0000-00-00', 7),
(14, 'Science Lab', 'income', 1, '2017-01-22', 0, '0000-00-00', 7),
(15, 'Scout', 'income', 1, '2017-01-22', 0, '0000-00-00', 7),
(16, 'Red Crescent', 'income', 1, '2017-01-22', 0, '0000-00-00', 7),
(17, 'Diary', 'income', 1, '2017-01-22', 0, '0000-00-00', 7),
(18, 'Teacher Welfare', 'income', 1, '2017-01-22', 0, '0000-00-00', 7),
(19, 'Badge', 'income', 1, '2017-01-22', 0, '0000-00-00', 7);

-- --------------------------------------------------------

--
-- Table structure for table `checkin`
--

CREATE TABLE `checkin` (
  `CHECKIN_ID` int(11) NOT NULL,
  `HOUSE_ID` int(11) NOT NULL,
  `STUDENT_DATA_ID` int(11) NOT NULL,
  `CHECKOUT_DATE` date NOT NULL,
  `CHECKIN_DATE` date NOT NULL,
  `EXPIRE_DATE` date NOT NULL,
  `GURDIUN_TYPE` varchar(200) NOT NULL,
  `GURDIUN_NAME` varchar(100) NOT NULL,
  `MOBILE_NO` varchar(15) NOT NULL,
  `CHECKIN_STATUS` int(11) NOT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `CREATED_DATE` date NOT NULL,
  `UPDATED_BY` int(11) NOT NULL,
  `UPDATED_DATE` date NOT NULL,
  `STATUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `checkin`
--

INSERT INTO `checkin` (`CHECKIN_ID`, `HOUSE_ID`, `STUDENT_DATA_ID`, `CHECKOUT_DATE`, `CHECKIN_DATE`, `EXPIRE_DATE`, `GURDIUN_TYPE`, `GURDIUN_NAME`, `MOBILE_NO`, `CHECKIN_STATUS`, `CREATED_BY`, `CREATED_DATE`, `UPDATED_BY`, `UPDATED_DATE`, `STATUS`) VALUES
(1, 1, 27, '2016-08-14', '2016-08-15', '2016-08-15', 'Brother', 'Sabbir Rohman', '445151', 1, 1, '2016-08-14', 1, '2016-08-16', 7),
(2, 5, 13, '2016-08-10', '2016-08-14', '2016-08-13', 'Mother', 'Nafija Begum', '5487455', 1, 1, '2016-08-14', 1, '2016-08-16', 7),
(3, 1, 27, '2016-08-10', '0000-00-00', '2016-08-13', 'Father', 'Jibon Mahmud', '2348552', 0, 1, '2016-08-14', 1, '2016-08-16', 7),
(4, 1, 27, '2016-08-15', '2016-08-16', '2016-08-14', 'Father', 'Azizur Rohman', '4545241', 1, 1, '2016-08-14', 1, '2016-08-16', 7),
(5, 5, 33, '2016-08-14', '2016-08-14', '2016-08-15', 'Brother', 'Asad', '4865443', 1, 1, '2016-08-14', 1, '2016-08-16', 7),
(6, 1, 13, '2016-08-10', '2016-08-14', '2016-08-15', 'Father', 'Hasibur Rohman', '451485', 1, 1, '2016-08-14', 1, '2016-08-16', 7),
(7, 5, 39, '2016-08-12', '0000-00-00', '2016-08-17', 'Father', 'Arman', '554525', 0, 1, '2016-08-14', 1, '2016-08-16', 7),
(8, 1, 14, '2016-08-11', '0000-00-00', '2016-08-16', 'Father', 'Jubayer Rohman', '4141', 0, 1, '2016-08-14', 1, '2016-08-16', 7),
(9, 1, 13, '2016-08-16', '0000-00-00', '2016-09-01', 'Brother', 'Rayhan', '25787', 0, 1, '2016-08-16', 0, '0000-00-00', 7);

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `CLASS_ID` int(11) NOT NULL,
  `CLASS_NAME` varchar(200) CHARACTER SET latin1 NOT NULL,
  `CLASS_NAME_NUMERIC` tinyint(2) NOT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `CREATED_DATE` date NOT NULL,
  `UPDATED_BY` int(11) NOT NULL,
  `UPDATED_DATE` date NOT NULL,
  `STATUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`CLASS_ID`, `CLASS_NAME`, `CLASS_NAME_NUMERIC`, `CREATED_BY`, `CREATED_DATE`, `UPDATED_BY`, `UPDATED_DATE`, `STATUS`) VALUES
(1, 'Six', 0, 1, '2017-01-22', 0, '0000-00-00', 7),
(2, 'Seven', 0, 1, '2017-01-22', 0, '0000-00-00', 7),
(3, 'Eight', 0, 1, '2017-01-22', 0, '0000-00-00', 7),
(4, 'Nine', 0, 1, '2017-01-22', 0, '0000-00-00', 7),
(5, 'Ten', 0, 1, '2017-01-22', 0, '0000-00-00', 7);

-- --------------------------------------------------------

--
-- Table structure for table `class_routine`
--

CREATE TABLE `class_routine` (
  `ROUTINE_ID` int(11) NOT NULL,
  `CLASS_ID` int(11) NOT NULL,
  `SECTION_ID` int(11) NOT NULL,
  `SUBJECT_ID` int(11) NOT NULL,
  `TEACHER_ID` int(11) NOT NULL,
  `DAY` varchar(20) NOT NULL,
  `TIME_FROM` varchar(100) NOT NULL,
  `TIME_TO` varchar(100) NOT NULL,
  `YEAR` int(11) NOT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `CREATED_DATE` date NOT NULL,
  `UPDATED_BY` int(11) NOT NULL,
  `UPDATED_DATE` date NOT NULL,
  `STATUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `class_teacher`
--

CREATE TABLE `class_teacher` (
  `TEACEHR_INFO_ID` int(11) NOT NULL,
  `TEACHER_ID` int(11) NOT NULL,
  `CLASS_ID` int(11) NOT NULL,
  `SECTION_ID` int(11) NOT NULL,
  `YEAR` int(11) NOT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `CREATED_DATE` date NOT NULL,
  `UPDATED_BY` int(11) NOT NULL,
  `UPDATED_DATE` date NOT NULL,
  `STATUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cultural_activities`
--

CREATE TABLE `cultural_activities` (
  `CULTURAL_ACTIVITIES_ID` int(11) NOT NULL,
  `TITLE` varchar(150) NOT NULL,
  `DETAILS` text NOT NULL,
  `IMAGES` varchar(150) NOT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `CREATED_DATE` date NOT NULL,
  `UPDATED_BY` int(11) NOT NULL,
  `UPDATED_DATE` date NOT NULL,
  `STATUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cultural_activities`
--

INSERT INTO `cultural_activities` (`CULTURAL_ACTIVITIES_ID`, `TITLE`, `DETAILS`, `IMAGES`, `CREATED_BY`, `CREATED_DATE`, `UPDATED_BY`, `UPDATED_DATE`, `STATUS`) VALUES
(1, 'Presentation Ceremony', 'Comilla Yusuf School is one of the best school in Bangladesh located in Bozro pur, Adarsa Sadar, Comilla. Honorable Principal of Comilla Yusuf School is in Presentation ceremony. He provides Trophy Between winners.', '', 1, '2016-09-01', 1, '2016-09-03', 7);

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE `designation` (
  `DESIGNATION_ID` int(11) NOT NULL,
  `DESIGNATION_NAME` varchar(300) NOT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `CREATED_DATE` date NOT NULL,
  `UPDATED_BY` int(11) NOT NULL,
  `UPDATED_DATE` date NOT NULL,
  `STATUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`DESIGNATION_ID`, `DESIGNATION_NAME`, `CREATED_BY`, `CREATED_DATE`, `UPDATED_BY`, `UPDATED_DATE`, `STATUS`) VALUES
(1, 'Principal', 1, '2016-06-04', 1, '2016-06-04', 7),
(2, 'Senior Teacher', 1, '2016-06-19', 0, '0000-00-00', 7),
(3, 'Assistant Teacher', 1, '2016-06-19', 0, '0000-00-00', 7),
(4, 'Junior Teacher', 1, '2016-06-19', 0, '0000-00-00', 7),
(5, 'Temporary Teacher', 1, '2016-06-19', 0, '0000-00-00', 7),
(6, 'Accounting', 1, '2016-07-20', 0, '0000-00-00', 7),
(7, 'Part Time Teacher', 1, '2016-08-08', 1, '2016-08-08', 7);

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `EXAM_ID` int(11) NOT NULL,
  `EXAM_NAME` varchar(300) NOT NULL,
  `EXAM_DATE` date NOT NULL,
  `EXAM_COMMENT` varchar(200) NOT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `CREATED_DATE` date NOT NULL,
  `UPDATED_BY` int(11) NOT NULL,
  `UPDATED_DATE` date NOT NULL,
  `STATUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`EXAM_ID`, `EXAM_NAME`, `EXAM_DATE`, `EXAM_COMMENT`, `CREATED_BY`, `CREATED_DATE`, `UPDATED_BY`, `UPDATED_DATE`, `STATUS`) VALUES
(1, 'Final Exam', '2016-10-27', 'final', 1, '2016-06-08', 1, '2016-06-12', 7),
(3, 'First Term', '2016-08-03', 'Good', 1, '2016-06-08', 1, '2016-06-11', 7),
(4, 'Second Term', '2016-06-08', 'Hello World', 1, '2016-06-11', 0, '0000-00-00', 7),
(5, 'weekly exam', '2016-08-14', 'test', 9, '2016-08-13', 0, '0000-00-00', 7);

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `FILE_ID` int(11) NOT NULL,
  `CAT_ID` int(11) NOT NULL,
  `SUB_CAT_ID` int(11) NOT NULL,
  `FILE_CAPTION` varchar(200) NOT NULL,
  `FILE_LINK` varchar(200) NOT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `CREATED_DATE` date NOT NULL,
  `UPDATED_BY` int(11) NOT NULL,
  `UPDATED_DATE` date NOT NULL,
  `STATUS` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`FILE_ID`, `CAT_ID`, `SUB_CAT_ID`, `FILE_CAPTION`, `FILE_LINK`, `CREATED_BY`, `CREATED_DATE`, `UPDATED_BY`, `UPDATED_DATE`, `STATUS`) VALUES
(9, 9, 5, 'CLASS V', '8.pdf', 1, '2016-07-20', 0, '0000-00-00', 7),
(10, 9, 4, 'CLASS VI', 'registration-card-correction-form.pdf', 1, '2016-07-20', 0, '0000-00-00', 7),
(11, 9, 4, 'CLASS VII', 'hostel_adm_form.pdf', 1, '2016-07-20', 0, '0000-00-00', 7),
(12, 9, 5, 'CLASS VIII', 'MbrApp.pdf', 1, '2016-07-20', 0, '0000-00-00', 7);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `IMAGE_ID` int(11) NOT NULL,
  `CAT_ID` int(11) NOT NULL,
  `SUB_CAT_ID` int(11) NOT NULL,
  `IMAGE_CAPTION` varchar(200) NOT NULL,
  `IMAGE_LINK` varchar(200) NOT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `CREATED_DATE` date NOT NULL,
  `UPDATED_BY` int(11) NOT NULL,
  `UPDATED_DATE` date NOT NULL,
  `STATUS` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`IMAGE_ID`, `CAT_ID`, `SUB_CAT_ID`, `IMAGE_CAPTION`, `IMAGE_LINK`, `CREATED_BY`, `CREATED_DATE`, `UPDATED_BY`, `UPDATED_DATE`, `STATUS`) VALUES
(1, 8, 1, 'Price giving ceremony', 'SAM_0918.JPG', 1, '2016-12-23', 0, '0000-00-00', 7),
(2, 8, 1, 'Price giving ceremony', 'SAM_0920.JPG', 1, '2016-12-23', 0, '0000-00-00', 7),
(3, 8, 1, 'Price giving ceremony', 'SAM_0922.JPG', 1, '2016-12-23', 0, '0000-00-00', 7),
(4, 8, 1, 'Price giving ceremony', 'SAM_0987.JPG', 1, '2016-12-23', 0, '0000-00-00', 7),
(5, 8, 1, 'Price giving ceremony', 'SAM_0993.JPG', 1, '2016-12-23', 0, '0000-00-00', 7),
(6, 8, 1, 'Price giving ceremony', 'SAM_3037.JPG', 1, '2016-12-23', 0, '0000-00-00', 7),
(7, 8, 1, 'Price giving ceremony', 'SAM_3041.JPG', 1, '2016-12-23', 0, '0000-00-00', 7),
(8, 8, 1, 'Price giving ceremony', 'SAM_3053.JPG', 1, '2016-12-23', 0, '0000-00-00', 7),
(9, 8, 1, 'Price giving ceremony', 'SAM_3117.JPG', 1, '2016-12-23', 0, '0000-00-00', 7),
(10, 8, 9, 'School Campus', 'gallery00.jpg', 1, '2016-12-23', 0, '0000-00-00', 7),
(11, 8, 9, 'School Campus', 'SAM_3132.JPG', 1, '2016-12-23', 0, '0000-00-00', 7),
(12, 8, 9, 'School Campus', 'SAM_3164.JPG', 1, '2016-12-23', 0, '0000-00-00', 7),
(13, 8, 3, 'Rally', 'DSC_3400.JPG', 1, '2016-12-23', 0, '0000-00-00', 7),
(14, 8, 3, 'Rally', 'SAM_1529.JPG', 1, '2016-12-23', 0, '0000-00-00', 7),
(15, 8, 2, 'Activities', 'gallery01.jpg', 1, '2016-12-23', 0, '0000-00-00', 7),
(16, 8, 2, 'Activities', 'SAM_3164.JPG', 1, '2016-12-23', 0, '0000-00-00', 7),
(17, 8, 2, 'Activities', 'SAM_0993.JPG', 1, '2016-12-23', 0, '0000-00-00', 7);

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE `grade` (
  `GRADE_ID` int(11) NOT NULL,
  `GRADE_NAME` varchar(250) NOT NULL,
  `MARK_FROM` int(11) NOT NULL,
  `MARK_UPTO` int(11) NOT NULL,
  `COMMENT` varchar(150) NOT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `CREATED_DATE` date NOT NULL,
  `UPDATED_BY` int(11) NOT NULL,
  `UPDATED_DATE` date NOT NULL,
  `STATUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `grade`
--

INSERT INTO `grade` (`GRADE_ID`, `GRADE_NAME`, `MARK_FROM`, `MARK_UPTO`, `COMMENT`, `CREATED_BY`, `CREATED_DATE`, `UPDATED_BY`, `UPDATED_DATE`, `STATUS`) VALUES
(1, 'A+', 80, 99, 'very good', 1, '2016-06-09', 1, '2016-06-09', 7),
(2, 'A', 70, 79, 'Good', 1, '2016-06-09', 0, '0000-00-00', 7),
(3, 'B', 50, 59, 'not bad', 1, '2016-06-09', 0, '0000-00-00', 7),
(4, 'A-', 50, 60, 'Good', 1, '2016-06-09', 0, '0000-00-00', 7),
(5, 'F', 0, 32, 'very bad vai', 1, '2016-06-09', 1, '2016-06-11', 7);

-- --------------------------------------------------------

--
-- Table structure for table `house`
--

CREATE TABLE `house` (
  `HOUSE_ID` int(11) NOT NULL,
  `HOUSE_NAME` varchar(150) NOT NULL,
  `DESCRIPTION` text NOT NULL,
  `LOCATION` text NOT NULL,
  `TOTAL_ROOM` int(11) NOT NULL,
  `TOTAL_SET` int(11) NOT NULL,
  `IMAGES` varchar(70) NOT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `CREATED_DATE` date NOT NULL,
  `UPDATED_BY` int(11) NOT NULL,
  `UPDATED_DATE` date NOT NULL,
  `STATUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `house`
--

INSERT INTO `house` (`HOUSE_ID`, `HOUSE_NAME`, `DESCRIPTION`, `LOCATION`, `TOTAL_ROOM`, `TOTAL_SET`, `IMAGES`, `CREATED_BY`, `CREATED_DATE`, `UPDATED_BY`, `UPDATED_DATE`, `STATUS`) VALUES
(1, 'Bongobondhu Hall', 'Bongobondhu Hall', 'Elephante road, Dhaka', 12, 36, '', 1, '2016-08-14', 1, '2016-08-14', 7),
(5, 'Shohid Jiyaur Rohman Hall', 'Shohid Jiyaur Rohman Hostel', 'Dhaka University', 25, 100, '', 1, '2016-08-14', 1, '2016-08-14', 7),
(9, 'Begum Rokeya Hall', 'Begum Rokeya Hall', 'Elephante road', 25, 100, '', 1, '2016-08-14', 1, '2016-08-14', 7);

-- --------------------------------------------------------

--
-- Table structure for table `ie_payment`
--

CREATE TABLE `ie_payment` (
  `IE_CAT_ID` int(11) NOT NULL,
  `CAT_LIST_ID` int(11) NOT NULL,
  `CLASS_ID` int(11) NOT NULL,
  `FEE_TYPE` varchar(2) NOT NULL,
  `FEE_TYPE_MONTH` varchar(2) NOT NULL,
  `AMOUNT` int(11) NOT NULL,
  `YEAR` int(11) NOT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `CREATED_DATE` date NOT NULL,
  `UPDATED_BY` int(11) NOT NULL,
  `UPDATED_DATE` date NOT NULL,
  `STATUS` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ie_payment`
--

INSERT INTO `ie_payment` (`IE_CAT_ID`, `CAT_LIST_ID`, `CLASS_ID`, `FEE_TYPE`, `FEE_TYPE_MONTH`, `AMOUNT`, `YEAR`, `CREATED_BY`, `CREATED_DATE`, `UPDATED_BY`, `UPDATED_DATE`, `STATUS`) VALUES
(1, 1, 1, '0', '1', 120, 2017, 1, '2017-01-22', 0, '0000-00-00', 7),
(2, 2, 1, '0', '1', 100, 2017, 1, '2017-01-22', 0, '0000-00-00', 7),
(3, 3, 1, '0', '1', 40, 2017, 1, '2017-01-22', 0, '0000-00-00', 7),
(4, 4, 1, '0', '1', 40, 2017, 1, '2017-01-22', 0, '0000-00-00', 7),
(5, 5, 1, '0', '', 100, 2017, 1, '2017-01-22', 0, '0000-00-00', 7);

-- --------------------------------------------------------

--
-- Table structure for table `ie_transaction`
--

CREATE TABLE `ie_transaction` (
  `IE_TRANSACTION_ID` int(11) NOT NULL,
  `TRANS_ID` int(11) NOT NULL,
  `IE_CAT_ID` int(11) NOT NULL,
  `CLASS_ID` int(11) NOT NULL,
  `SECTION_ID` int(11) NOT NULL,
  `STUDENT_ID` int(11) NOT NULL,
  `AMOUNT` int(11) NOT NULL,
  `DISCOUNT` int(11) NOT NULL,
  `SUB_TOTAL` int(11) NOT NULL,
  `MONTH` varchar(20) NOT NULL,
  `YEAR` int(11) NOT NULL,
  `PAYMENT_TYPE` varchar(20) NOT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `CREATED_DATE` date NOT NULL,
  `UPDATED_BY` int(11) NOT NULL,
  `UPDATED_DATE` date NOT NULL,
  `STATUS` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `leave_data`
--

CREATE TABLE `leave_data` (
  `LEAVE_ID` int(11) NOT NULL,
  `TEACHER_ID` int(11) NOT NULL,
  `LEAVE_SETTINGS_ID` int(11) NOT NULL,
  `LEAVE_DURATION` varchar(100) NOT NULL,
  `REASON_FOR_LEAVE` varchar(300) NOT NULL,
  `DATE_FROM` date NOT NULL,
  `DATE_TO` date NOT NULL,
  `YEAR` int(11) NOT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `CREATED_DATE` date NOT NULL,
  `UPDATED_BY` int(11) NOT NULL,
  `UPDATED_DATE` date NOT NULL,
  `STATUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `leave_data`
--

INSERT INTO `leave_data` (`LEAVE_ID`, `TEACHER_ID`, `LEAVE_SETTINGS_ID`, `LEAVE_DURATION`, `REASON_FOR_LEAVE`, `DATE_FROM`, `DATE_TO`, `YEAR`, `CREATED_BY`, `CREATED_DATE`, `UPDATED_BY`, `UPDATED_DATE`, `STATUS`) VALUES
(1, 1, 1, '2', 'He is tired', '2016-07-07', '2016-07-09', 2016, 1, '2016-07-12', 1, '2016-07-12', 7),
(2, 1, 1, '1', 'dcvsfd', '2016-07-03', '2016-07-04', 2016, 1, '2016-07-17', 0, '0000-00-00', 7),
(3, 7, 3, '4', '', '2016-08-21', '2016-08-24', 2016, 1, '2016-08-21', 0, '0000-00-00', 7);

-- --------------------------------------------------------

--
-- Table structure for table `leave_settings`
--

CREATE TABLE `leave_settings` (
  `LEAVE_SETTINGS_ID` int(11) NOT NULL,
  `LEAVE_NAME` varchar(100) NOT NULL,
  `LEAVE_DESCRIPTION` text NOT NULL,
  `LEAVE_DURATION` int(11) NOT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `CREATED_DATE` date NOT NULL,
  `UPDATED_BY` int(11) NOT NULL,
  `UPDATED_DATE` date NOT NULL,
  `STATUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `leave_settings`
--

INSERT INTO `leave_settings` (`LEAVE_SETTINGS_ID`, `LEAVE_NAME`, `LEAVE_DESCRIPTION`, `LEAVE_DURATION`, `CREATED_BY`, `CREATED_DATE`, `UPDATED_BY`, `UPDATED_DATE`, `STATUS`) VALUES
(1, 'Sick Leave', 'This is a sick', 7, 1, '2016-07-12', 0, '0000-00-00', 7),
(2, 'Casual Leave', 'This is casual leave', 5, 1, '2016-07-12', 1, '2016-08-21', 7),
(3, 'Festive Leave', '', 10, 1, '2016-08-21', 0, '0000-00-00', 7);

-- --------------------------------------------------------

--
-- Table structure for table `library_member`
--

CREATE TABLE `library_member` (
  `LIBRARY_MEMBER_ID` int(11) NOT NULL,
  `CLASS_ID` int(11) NOT NULL,
  `SECTION_ID` int(11) NOT NULL,
  `STUDENT_DATA_ID` int(11) NOT NULL,
  `ROLL_NO` int(11) NOT NULL,
  `YEAR` int(11) NOT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `CREATED_DATE` date NOT NULL,
  `UPDATED_BY` int(11) NOT NULL,
  `UPDATED_DATE` date NOT NULL,
  `STATUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `library_member`
--

INSERT INTO `library_member` (`LIBRARY_MEMBER_ID`, `CLASS_ID`, `SECTION_ID`, `STUDENT_DATA_ID`, `ROLL_NO`, `YEAR`, `CREATED_BY`, `CREATED_DATE`, `UPDATED_BY`, `UPDATED_DATE`, `STATUS`) VALUES
(1, 1, 2, 2, 2, 2015, 1, '2016-07-27', 1, '2016-07-27', 7),
(2, 1, 2, 1, 1, 2016, 1, '2016-07-27', 0, '0000-00-00', 7),
(3, 1, 2, 2, 2, 2016, 1, '2016-07-27', 0, '0000-00-00', 7),
(4, 1, 2, 3, 3, 2016, 1, '2016-07-27', 0, '0000-00-00', 7),
(5, 2, 4, 30, 10, 2016, 1, '2016-07-27', 0, '0000-00-00', 7),
(6, 1, 3, 19, 9, 2016, 1, '2016-07-27', 0, '0000-00-00', 7),
(7, 3, 5, 38, 8, 2016, 1, '2016-07-27', 0, '0000-00-00', 7),
(8, 1, 3, 12, 2, 2016, 1, '2016-07-28', 0, '0000-00-00', 7);

-- --------------------------------------------------------

--
-- Table structure for table `library_settings`
--

CREATE TABLE `library_settings` (
  `LIBRARY_SETTING_ID` int(11) NOT NULL,
  `MAX_BOOK_ISSUE` int(11) NOT NULL,
  `MAX_RETURN_DAY` int(11) NOT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `CREATED_DATE` date NOT NULL,
  `UPDATED_BY` int(11) NOT NULL,
  `UPDATED_DATE` date NOT NULL,
  `STATUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `library_settings`
--

INSERT INTO `library_settings` (`LIBRARY_SETTING_ID`, `MAX_BOOK_ISSUE`, `MAX_RETURN_DAY`, `CREATED_BY`, `CREATED_DATE`, `UPDATED_BY`, `UPDATED_DATE`, `STATUS`) VALUES
(1, 5, 7, 1, '2016-07-27', 1, '2016-07-27', 7);

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `MARK_ID` int(11) NOT NULL,
  `CLASS_ID` int(11) NOT NULL,
  `SECTION_ID` int(11) NOT NULL,
  `STUDENT_ID` int(11) NOT NULL,
  `ROLL_NO` int(11) NOT NULL,
  `SUBJECT_ID` int(11) NOT NULL,
  `EXAM_ID` int(11) NOT NULL,
  `SUBJECTIVE_MARK` int(11) NOT NULL DEFAULT '0',
  `OBJECTIVE_MARK` int(11) NOT NULL DEFAULT '0',
  `PRACTICAL_MARK` int(11) NOT NULL DEFAULT '0',
  `MARK_OBTAINED` int(11) NOT NULL,
  `GRADE_ID` int(11) NOT NULL,
  `YEAR` int(11) NOT NULL,
  `COMMENT` varchar(400) NOT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `CREATED_DATE` date NOT NULL,
  `UPDATED_BY` int(11) NOT NULL,
  `UPDATED_DATE` date NOT NULL,
  `STATUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`MARK_ID`, `CLASS_ID`, `SECTION_ID`, `STUDENT_ID`, `ROLL_NO`, `SUBJECT_ID`, `EXAM_ID`, `SUBJECTIVE_MARK`, `OBJECTIVE_MARK`, `PRACTICAL_MARK`, `MARK_OBTAINED`, `GRADE_ID`, `YEAR`, `COMMENT`, `CREATED_BY`, `CREATED_DATE`, `UPDATED_BY`, `UPDATED_DATE`, `STATUS`) VALUES
(1, 11, 42, 360, 21, 88, 1, 40, 12, 0, 52, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(2, 11, 42, 14, 35, 88, 1, 30, 15, 0, 45, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(3, 11, 42, 20, 38, 88, 1, 40, 15, 0, 55, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(4, 11, 42, 12, 40, 88, 1, 35, 15, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(5, 11, 42, 13, 43, 88, 1, 40, 15, 0, 55, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(6, 11, 42, 356, 44, 88, 1, 35, 15, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(7, 11, 42, 9, 47, 88, 1, 40, 15, 0, 55, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(8, 11, 42, 10, 50, 88, 1, 50, 15, 0, 65, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(9, 11, 42, 5, 51, 88, 1, 40, 15, 0, 55, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(10, 11, 42, 8, 52, 88, 1, 45, 15, 0, 60, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(11, 11, 42, 529, 53, 88, 1, 45, 15, 0, 60, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(12, 11, 42, 376, 61, 88, 1, 40, 15, 0, 55, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(13, 11, 42, 11, 64, 88, 1, 42, 15, 0, 57, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(14, 11, 42, 6, 65, 88, 1, 42, 15, 0, 57, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(15, 11, 42, 379, 78, 88, 1, 45, 15, 0, 60, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(16, 11, 42, 4, 80, 88, 1, 35, 15, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(17, 11, 42, 15, 85, 88, 1, 50, 15, 0, 65, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(18, 11, 42, 18, 99, 88, 1, 35, 15, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(19, 11, 42, 17, 105, 88, 1, 30, 15, 0, 45, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(20, 11, 42, 3, 106, 88, 1, 30, 15, 0, 45, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(21, 11, 42, 1, 114, 88, 1, 30, 15, 0, 45, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(22, 11, 42, 367, 115, 88, 1, 30, 15, 0, 45, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(23, 11, 42, 366, 117, 88, 1, 30, 15, 0, 45, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(24, 11, 42, 2, 119, 88, 1, 30, 15, 0, 45, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(25, 11, 42, 7, 123, 88, 1, 30, 15, 0, 45, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(26, 11, 42, 16, 126, 88, 1, 30, 15, 0, 45, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(27, 11, 42, 364, 129, 88, 1, 30, 15, 0, 45, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(28, 11, 42, 19, 141, 88, 1, 30, 15, 0, 45, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(29, 11, 42, 361, 150, 88, 1, 30, 15, 0, 45, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(30, 11, 42, 372, 151, 88, 1, 30, 15, 0, 45, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(31, 11, 42, 354, 152, 88, 1, 30, 15, 0, 45, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(32, 11, 42, 378, 153, 88, 1, 30, 15, 0, 45, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(33, 11, 42, 370, 159, 88, 1, 30, 15, 0, 45, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(34, 11, 42, 369, 160, 88, 1, 30, 15, 0, 45, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(35, 11, 42, 355, 161, 88, 1, 30, 15, 0, 45, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(36, 11, 42, 374, 172, 88, 1, 30, 15, 0, 45, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(37, 11, 42, 358, 173, 88, 1, 30, 15, 0, 45, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(38, 11, 42, 360, 21, 89, 1, 35, 15, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(39, 11, 42, 14, 35, 89, 1, 35, 15, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(40, 11, 42, 20, 38, 89, 1, 35, 15, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(41, 11, 42, 12, 40, 89, 1, 35, 15, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(42, 11, 42, 13, 43, 89, 1, 35, 15, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(43, 11, 42, 356, 44, 89, 1, 35, 15, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(44, 11, 42, 9, 47, 89, 1, 35, 15, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(45, 11, 42, 10, 50, 89, 1, 35, 15, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(46, 11, 42, 5, 51, 89, 1, 35, 15, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(47, 11, 42, 8, 52, 89, 1, 35, 15, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(48, 11, 42, 529, 53, 89, 1, 35, 15, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(49, 11, 42, 376, 61, 89, 1, 35, 15, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(50, 11, 42, 11, 64, 89, 1, 35, 15, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(51, 11, 42, 6, 65, 89, 1, 35, 15, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(52, 11, 42, 379, 78, 89, 1, 35, 15, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(53, 11, 42, 4, 80, 89, 1, 35, 15, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(54, 11, 42, 15, 85, 89, 1, 35, 15, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(55, 11, 42, 18, 99, 89, 1, 35, 15, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(56, 11, 42, 17, 105, 89, 1, 35, 15, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(57, 11, 42, 3, 106, 89, 1, 35, 15, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(58, 11, 42, 1, 114, 89, 1, 35, 15, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(59, 11, 42, 367, 115, 89, 1, 35, 15, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(60, 11, 42, 366, 117, 89, 1, 35, 15, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(61, 11, 42, 2, 119, 89, 1, 35, 15, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(62, 11, 42, 7, 123, 89, 1, 35, 15, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(63, 11, 42, 16, 126, 89, 1, 35, 15, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(64, 11, 42, 364, 129, 89, 1, 35, 15, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(65, 11, 42, 19, 141, 89, 1, 35, 15, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(66, 11, 42, 361, 150, 89, 1, 35, 15, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(67, 11, 42, 372, 151, 89, 1, 35, 15, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(68, 11, 42, 354, 152, 89, 1, 35, 15, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(69, 11, 42, 378, 153, 89, 1, 35, 15, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(70, 11, 42, 370, 159, 89, 1, 35, 15, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(71, 11, 42, 369, 160, 89, 1, 35, 15, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(72, 11, 42, 355, 161, 89, 1, 35, 15, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(73, 11, 42, 374, 172, 89, 1, 35, 15, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(74, 11, 42, 358, 173, 89, 1, 35, 15, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(75, 11, 42, 360, 21, 91, 1, 35, 0, 0, 35, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(76, 11, 42, 14, 35, 91, 1, 50, 0, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(77, 11, 42, 20, 38, 91, 1, 50, 0, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(78, 11, 42, 12, 40, 91, 1, 50, 0, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(79, 11, 42, 13, 43, 91, 1, 50, 0, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(80, 11, 42, 356, 44, 91, 1, 50, 0, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(81, 11, 42, 9, 47, 91, 1, 50, 0, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(82, 11, 42, 10, 50, 91, 1, 50, 0, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(83, 11, 42, 5, 51, 91, 1, 50, 0, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(84, 11, 42, 8, 52, 91, 1, 50, 0, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(85, 11, 42, 529, 53, 91, 1, 50, 0, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(86, 11, 42, 376, 61, 91, 1, 50, 0, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(87, 11, 42, 11, 64, 91, 1, 50, 0, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(88, 11, 42, 6, 65, 91, 1, 50, 0, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(89, 11, 42, 379, 78, 91, 1, 50, 0, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(90, 11, 42, 4, 80, 91, 1, 50, 0, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(91, 11, 42, 15, 85, 91, 1, 50, 0, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(92, 11, 42, 18, 99, 91, 1, 50, 0, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(93, 11, 42, 17, 105, 91, 1, 50, 0, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(94, 11, 42, 3, 106, 91, 1, 50, 0, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(95, 11, 42, 1, 114, 91, 1, 50, 0, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(96, 11, 42, 367, 115, 91, 1, 50, 0, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(97, 11, 42, 366, 117, 91, 1, 50, 0, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(98, 11, 42, 2, 119, 91, 1, 35, 0, 0, 35, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(99, 11, 42, 7, 123, 91, 1, 35, 0, 0, 35, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(100, 11, 42, 16, 126, 91, 1, 35, 0, 0, 35, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(101, 11, 42, 364, 129, 91, 1, 35, 0, 0, 35, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(102, 11, 42, 19, 141, 91, 1, 35, 0, 0, 35, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(103, 11, 42, 361, 150, 91, 1, 35, 0, 0, 35, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(104, 11, 42, 372, 151, 91, 1, 35, 0, 0, 35, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(105, 11, 42, 354, 152, 91, 1, 35, 0, 0, 35, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(106, 11, 42, 378, 153, 91, 1, 35, 0, 0, 35, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(107, 11, 42, 370, 159, 91, 1, 35, 0, 0, 35, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(108, 11, 42, 369, 160, 91, 1, 35, 0, 0, 35, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(109, 11, 42, 355, 161, 91, 1, 35, 0, 0, 35, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(110, 11, 42, 374, 172, 91, 1, 35, 0, 0, 35, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(111, 11, 42, 358, 173, 91, 1, 35, 0, 0, 35, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(112, 11, 42, 360, 21, 92, 1, 50, 0, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(113, 11, 42, 14, 35, 92, 1, 50, 0, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(114, 11, 42, 20, 38, 92, 1, 50, 0, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(115, 11, 42, 12, 40, 92, 1, 50, 0, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(116, 11, 42, 13, 43, 92, 1, 50, 0, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(117, 11, 42, 356, 44, 92, 1, 50, 0, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(118, 11, 42, 9, 47, 92, 1, 50, 0, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(119, 11, 42, 10, 50, 92, 1, 50, 0, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(120, 11, 42, 5, 51, 92, 1, 50, 0, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(121, 11, 42, 8, 52, 92, 1, 50, 0, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(122, 11, 42, 529, 53, 92, 1, 50, 0, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(123, 11, 42, 376, 61, 92, 1, 50, 0, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(124, 11, 42, 11, 64, 92, 1, 50, 0, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(125, 11, 42, 6, 65, 92, 1, 50, 0, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(126, 11, 42, 379, 78, 92, 1, 50, 0, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(127, 11, 42, 4, 80, 92, 1, 50, 0, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(128, 11, 42, 15, 85, 92, 1, 50, 0, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(129, 11, 42, 18, 99, 92, 1, 50, 0, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(130, 11, 42, 17, 105, 92, 1, 50, 0, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(131, 11, 42, 3, 106, 92, 1, 50, 0, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(132, 11, 42, 1, 114, 92, 1, 50, 0, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(133, 11, 42, 367, 115, 92, 1, 50, 0, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(134, 11, 42, 366, 117, 92, 1, 50, 0, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(135, 11, 42, 2, 119, 92, 1, 50, 0, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(136, 11, 42, 7, 123, 92, 1, 50, 0, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(137, 11, 42, 16, 126, 92, 1, 50, 0, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(138, 11, 42, 364, 129, 92, 1, 50, 0, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(139, 11, 42, 19, 141, 92, 1, 50, 0, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(140, 11, 42, 361, 150, 92, 1, 50, 0, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(141, 11, 42, 372, 151, 92, 1, 50, 0, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(142, 11, 42, 354, 152, 92, 1, 50, 0, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(143, 11, 42, 378, 153, 92, 1, 50, 0, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(144, 11, 42, 370, 159, 92, 1, 50, 0, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(145, 11, 42, 369, 160, 92, 1, 50, 0, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(146, 11, 42, 355, 161, 92, 1, 50, 0, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(147, 11, 42, 374, 172, 92, 1, 50, 0, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(148, 11, 42, 358, 173, 92, 1, 50, 0, 0, 50, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(149, 11, 42, 360, 21, 93, 1, 50, 15, 0, 65, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(150, 11, 42, 14, 35, 93, 1, 50, 15, 0, 65, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(151, 11, 42, 20, 38, 93, 1, 50, 15, 0, 65, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(152, 11, 42, 12, 40, 93, 1, 50, 15, 0, 65, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(153, 11, 42, 13, 43, 93, 1, 50, 15, 0, 65, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(154, 11, 42, 356, 44, 93, 1, 50, 15, 0, 65, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(155, 11, 42, 9, 47, 93, 1, 50, 15, 0, 65, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(156, 11, 42, 10, 50, 93, 1, 50, 15, 0, 65, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(157, 11, 42, 5, 51, 93, 1, 50, 15, 0, 65, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(158, 11, 42, 8, 52, 93, 1, 50, 15, 0, 65, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(159, 11, 42, 529, 53, 93, 1, 50, 15, 0, 65, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(160, 11, 42, 376, 61, 93, 1, 50, 15, 0, 65, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(161, 11, 42, 11, 64, 93, 1, 50, 15, 0, 65, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(162, 11, 42, 6, 65, 93, 1, 50, 15, 0, 65, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(163, 11, 42, 379, 78, 93, 1, 50, 15, 0, 65, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(164, 11, 42, 4, 80, 93, 1, 50, 15, 0, 65, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(165, 11, 42, 15, 85, 93, 1, 50, 15, 0, 65, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(166, 11, 42, 18, 99, 93, 1, 50, 15, 0, 65, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(167, 11, 42, 17, 105, 93, 1, 50, 15, 0, 65, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(168, 11, 42, 3, 106, 93, 1, 50, 15, 0, 65, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(169, 11, 42, 1, 114, 93, 1, 50, 15, 0, 65, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(170, 11, 42, 367, 115, 93, 1, 50, 15, 0, 65, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(171, 11, 42, 366, 117, 93, 1, 50, 15, 0, 65, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(172, 11, 42, 2, 119, 93, 1, 50, 15, 0, 65, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(173, 11, 42, 7, 123, 93, 1, 50, 15, 0, 65, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(174, 11, 42, 16, 126, 93, 1, 50, 15, 0, 65, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(175, 11, 42, 364, 129, 93, 1, 50, 15, 0, 65, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(176, 11, 42, 19, 141, 93, 1, 50, 15, 0, 65, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(177, 11, 42, 361, 150, 93, 1, 50, 15, 0, 65, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(178, 11, 42, 372, 151, 93, 1, 50, 15, 0, 65, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(179, 11, 42, 354, 152, 93, 1, 50, 15, 0, 65, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(180, 11, 42, 378, 153, 93, 1, 50, 15, 0, 65, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(181, 11, 42, 370, 159, 93, 1, 50, 15, 0, 65, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(182, 11, 42, 369, 160, 93, 1, 50, 15, 0, 65, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(183, 11, 42, 355, 161, 93, 1, 50, 15, 0, 65, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(184, 11, 42, 374, 172, 93, 1, 50, 15, 0, 65, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(185, 11, 42, 358, 173, 93, 1, 50, 15, 0, 65, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(186, 11, 42, 360, 21, 94, 1, 65, 15, 0, 80, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(187, 11, 42, 14, 35, 94, 1, 65, 15, 0, 80, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(188, 11, 42, 20, 38, 94, 1, 65, 15, 0, 80, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(189, 11, 42, 12, 40, 94, 1, 65, 15, 0, 80, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(190, 11, 42, 13, 43, 94, 1, 65, 15, 0, 80, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(191, 11, 42, 356, 44, 94, 1, 65, 15, 0, 80, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(192, 11, 42, 9, 47, 94, 1, 65, 15, 0, 80, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(193, 11, 42, 10, 50, 94, 1, 65, 15, 0, 80, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(194, 11, 42, 5, 51, 94, 1, 65, 15, 0, 80, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(195, 11, 42, 8, 52, 94, 1, 65, 15, 0, 80, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(196, 11, 42, 529, 53, 94, 1, 65, 15, 0, 80, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(197, 11, 42, 376, 61, 94, 1, 65, 15, 0, 80, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(198, 11, 42, 11, 64, 94, 1, 65, 15, 0, 80, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(199, 11, 42, 6, 65, 94, 1, 65, 15, 0, 80, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(200, 11, 42, 379, 78, 94, 1, 65, 15, 0, 80, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(201, 11, 42, 4, 80, 94, 1, 65, 15, 0, 80, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(202, 11, 42, 15, 85, 94, 1, 65, 15, 0, 80, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(203, 11, 42, 18, 99, 94, 1, 65, 15, 0, 80, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(204, 11, 42, 17, 105, 94, 1, 65, 15, 0, 80, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(205, 11, 42, 3, 106, 94, 1, 65, 15, 0, 80, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(206, 11, 42, 1, 114, 94, 1, 65, 15, 0, 80, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(207, 11, 42, 367, 115, 94, 1, 65, 15, 0, 80, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(208, 11, 42, 366, 117, 94, 1, 65, 15, 0, 80, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(209, 11, 42, 2, 119, 94, 1, 65, 15, 0, 80, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(210, 11, 42, 7, 123, 94, 1, 65, 15, 0, 80, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(211, 11, 42, 16, 126, 94, 1, 65, 15, 0, 80, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(212, 11, 42, 364, 129, 94, 1, 65, 15, 0, 80, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(213, 11, 42, 19, 141, 94, 1, 65, 15, 0, 80, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(214, 11, 42, 361, 150, 94, 1, 65, 15, 0, 80, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(215, 11, 42, 372, 151, 94, 1, 65, 15, 0, 80, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(216, 11, 42, 354, 152, 94, 1, 65, 15, 0, 80, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(217, 11, 42, 378, 153, 94, 1, 65, 15, 0, 80, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(218, 11, 42, 370, 159, 94, 1, 65, 15, 0, 80, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(219, 11, 42, 369, 160, 94, 1, 65, 15, 0, 80, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(220, 11, 42, 355, 161, 94, 1, 65, 15, 0, 80, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(221, 11, 42, 374, 172, 94, 1, 65, 15, 0, 80, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(222, 11, 42, 358, 173, 94, 1, 65, 15, 0, 80, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(223, 11, 42, 360, 21, 95, 1, 50, 17, 0, 67, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(224, 11, 42, 14, 35, 95, 1, 50, 17, 0, 67, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(225, 11, 42, 20, 38, 95, 1, 50, 17, 0, 67, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(226, 11, 42, 12, 40, 95, 1, 50, 17, 0, 67, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(227, 11, 42, 13, 43, 95, 1, 50, 17, 0, 67, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(228, 11, 42, 356, 44, 95, 1, 50, 17, 0, 67, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(229, 11, 42, 9, 47, 95, 1, 50, 17, 0, 67, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(230, 11, 42, 10, 50, 95, 1, 50, 17, 0, 67, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(231, 11, 42, 5, 51, 95, 1, 50, 17, 0, 67, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(232, 11, 42, 8, 52, 95, 1, 50, 17, 0, 67, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(233, 11, 42, 529, 53, 95, 1, 50, 17, 0, 67, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(234, 11, 42, 376, 61, 95, 1, 50, 17, 0, 67, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(235, 11, 42, 11, 64, 95, 1, 50, 17, 0, 67, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(236, 11, 42, 6, 65, 95, 1, 50, 17, 0, 67, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(237, 11, 42, 379, 78, 95, 1, 50, 17, 0, 67, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(238, 11, 42, 4, 80, 95, 1, 50, 17, 0, 67, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(239, 11, 42, 15, 85, 95, 1, 50, 17, 0, 67, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(240, 11, 42, 18, 99, 95, 1, 50, 17, 0, 67, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(241, 11, 42, 17, 105, 95, 1, 50, 17, 0, 67, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(242, 11, 42, 3, 106, 95, 1, 50, 17, 0, 67, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(243, 11, 42, 1, 114, 95, 1, 50, 17, 0, 67, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(244, 11, 42, 367, 115, 95, 1, 50, 17, 0, 67, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(245, 11, 42, 366, 117, 95, 1, 50, 17, 0, 67, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(246, 11, 42, 2, 119, 95, 1, 50, 17, 0, 67, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(247, 11, 42, 7, 123, 95, 1, 50, 17, 0, 67, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(248, 11, 42, 16, 126, 95, 1, 50, 17, 0, 67, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(249, 11, 42, 364, 129, 95, 1, 50, 17, 0, 67, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(250, 11, 42, 19, 141, 95, 1, 50, 17, 0, 67, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(251, 11, 42, 361, 150, 95, 1, 50, 17, 0, 67, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(252, 11, 42, 372, 151, 95, 1, 50, 17, 0, 67, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(253, 11, 42, 354, 152, 95, 1, 50, 17, 0, 67, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(254, 11, 42, 378, 153, 95, 1, 50, 17, 0, 67, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(255, 11, 42, 370, 159, 95, 1, 50, 17, 0, 67, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(256, 11, 42, 369, 160, 95, 1, 50, 17, 0, 67, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(257, 11, 42, 355, 161, 95, 1, 50, 17, 0, 67, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(258, 11, 42, 374, 172, 95, 1, 50, 17, 0, 67, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(259, 11, 42, 358, 173, 95, 1, 50, 17, 0, 67, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(260, 11, 42, 360, 21, 104, 1, 55, 18, 0, 73, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(261, 11, 42, 14, 35, 104, 1, 55, 18, 0, 73, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(262, 11, 42, 20, 38, 104, 1, 55, 18, 0, 73, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(263, 11, 42, 12, 40, 104, 1, 55, 18, 0, 73, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(264, 11, 42, 13, 43, 104, 1, 55, 18, 0, 73, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(265, 11, 42, 356, 44, 104, 1, 55, 18, 0, 73, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(266, 11, 42, 9, 47, 104, 1, 55, 18, 0, 73, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(267, 11, 42, 10, 50, 104, 1, 55, 18, 0, 73, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(268, 11, 42, 5, 51, 104, 1, 55, 18, 0, 73, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(269, 11, 42, 8, 52, 104, 1, 55, 18, 0, 73, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(270, 11, 42, 529, 53, 104, 1, 55, 18, 0, 73, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(271, 11, 42, 376, 61, 104, 1, 55, 18, 0, 73, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(272, 11, 42, 11, 64, 104, 1, 55, 18, 0, 73, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(273, 11, 42, 6, 65, 104, 1, 55, 18, 0, 73, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(274, 11, 42, 379, 78, 104, 1, 55, 18, 0, 73, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(275, 11, 42, 4, 80, 104, 1, 55, 18, 0, 73, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(276, 11, 42, 15, 85, 104, 1, 55, 18, 0, 73, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(277, 11, 42, 18, 99, 104, 1, 55, 18, 0, 73, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(278, 11, 42, 17, 105, 104, 1, 55, 18, 0, 73, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(279, 11, 42, 3, 106, 104, 1, 55, 18, 0, 73, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(280, 11, 42, 1, 114, 104, 1, 55, 18, 0, 73, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(281, 11, 42, 367, 115, 104, 1, 55, 18, 0, 73, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(282, 11, 42, 366, 117, 104, 1, 55, 18, 0, 73, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(283, 11, 42, 2, 119, 104, 1, 55, 18, 0, 73, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(284, 11, 42, 7, 123, 104, 1, 55, 18, 0, 73, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(285, 11, 42, 16, 126, 104, 1, 55, 18, 0, 73, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(286, 11, 42, 364, 129, 104, 1, 55, 18, 0, 73, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(287, 11, 42, 19, 141, 104, 1, 55, 18, 0, 73, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(288, 11, 42, 361, 150, 104, 1, 55, 18, 0, 73, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(289, 11, 42, 372, 151, 104, 1, 55, 18, 0, 73, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(290, 11, 42, 354, 152, 104, 1, 55, 18, 0, 73, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(291, 11, 42, 378, 153, 104, 1, 55, 18, 0, 73, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(292, 11, 42, 370, 159, 104, 1, 55, 18, 0, 73, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(293, 11, 42, 369, 160, 104, 1, 55, 18, 0, 73, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(294, 11, 42, 355, 161, 104, 1, 55, 18, 0, 73, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(295, 11, 42, 374, 172, 104, 1, 55, 18, 0, 73, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(296, 11, 42, 358, 173, 104, 1, 55, 18, 0, 73, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(297, 11, 42, 360, 21, 99, 1, 22, 13, 13, 48, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(298, 11, 42, 14, 35, 99, 1, 22, 13, 13, 48, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(299, 11, 42, 20, 38, 99, 1, 22, 13, 13, 48, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(300, 11, 42, 12, 40, 99, 1, 22, 13, 13, 48, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(301, 11, 42, 13, 43, 99, 1, 22, 13, 13, 48, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(302, 11, 42, 356, 44, 99, 1, 22, 13, 13, 48, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(303, 11, 42, 9, 47, 99, 1, 22, 13, 13, 48, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(304, 11, 42, 10, 50, 99, 1, 22, 13, 13, 48, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(305, 11, 42, 5, 51, 99, 1, 22, 13, 13, 48, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(306, 11, 42, 8, 52, 99, 1, 22, 13, 13, 48, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(307, 11, 42, 529, 53, 99, 1, 22, 13, 13, 48, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(308, 11, 42, 376, 61, 99, 1, 22, 13, 13, 48, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(309, 11, 42, 11, 64, 99, 1, 22, 13, 13, 48, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(310, 11, 42, 6, 65, 99, 1, 22, 13, 13, 48, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(311, 11, 42, 379, 78, 99, 1, 22, 13, 13, 48, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(312, 11, 42, 4, 80, 99, 1, 22, 13, 13, 48, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(313, 11, 42, 15, 85, 99, 1, 22, 13, 13, 48, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(314, 11, 42, 18, 99, 99, 1, 22, 13, 13, 48, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(315, 11, 42, 17, 105, 99, 1, 22, 13, 13, 48, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(316, 11, 42, 3, 106, 99, 1, 22, 13, 13, 48, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(317, 11, 42, 1, 114, 99, 1, 22, 13, 13, 48, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(318, 11, 42, 367, 115, 99, 1, 22, 13, 13, 48, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(319, 11, 42, 366, 117, 99, 1, 22, 13, 13, 48, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(320, 11, 42, 2, 119, 99, 1, 22, 13, 13, 48, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(321, 11, 42, 7, 123, 99, 1, 22, 13, 13, 48, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(322, 11, 42, 16, 126, 99, 1, 22, 13, 13, 48, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(323, 11, 42, 364, 129, 99, 1, 22, 13, 13, 48, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(324, 11, 42, 19, 141, 99, 1, 22, 13, 13, 48, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(325, 11, 42, 361, 150, 99, 1, 22, 13, 13, 48, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(326, 11, 42, 372, 151, 99, 1, 22, 13, 13, 48, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(327, 11, 42, 354, 152, 99, 1, 22, 13, 13, 48, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(328, 11, 42, 378, 153, 99, 1, 22, 13, 13, 48, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(329, 11, 42, 370, 159, 99, 1, 22, 13, 13, 48, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(330, 11, 42, 369, 160, 99, 1, 22, 13, 13, 48, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(331, 11, 42, 355, 161, 99, 1, 22, 13, 13, 48, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(332, 11, 42, 374, 172, 99, 1, 22, 13, 13, 48, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(333, 11, 42, 358, 173, 99, 1, 22, 13, 13, 48, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(334, 11, 42, 360, 21, 100, 1, 17, 17, 0, 34, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(335, 11, 42, 14, 35, 100, 1, 17, 17, 0, 34, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(336, 11, 42, 20, 38, 100, 1, 17, 17, 0, 34, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(337, 11, 42, 12, 40, 100, 1, 17, 17, 0, 34, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(338, 11, 42, 13, 43, 100, 1, 17, 17, 0, 34, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(339, 11, 42, 356, 44, 100, 1, 17, 17, 0, 34, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(340, 11, 42, 9, 47, 100, 1, 17, 17, 0, 34, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(341, 11, 42, 10, 50, 100, 1, 17, 17, 0, 34, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(342, 11, 42, 5, 51, 100, 1, 17, 17, 0, 34, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(343, 11, 42, 8, 52, 100, 1, 17, 17, 0, 34, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(344, 11, 42, 529, 53, 100, 1, 17, 17, 0, 34, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(345, 11, 42, 376, 61, 100, 1, 17, 17, 0, 34, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(346, 11, 42, 11, 64, 100, 1, 17, 17, 0, 34, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(347, 11, 42, 6, 65, 100, 1, 17, 17, 0, 34, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(348, 11, 42, 379, 78, 100, 1, 17, 17, 0, 34, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(349, 11, 42, 4, 80, 100, 1, 17, 17, 0, 34, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(350, 11, 42, 15, 85, 100, 1, 17, 17, 0, 34, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(351, 11, 42, 18, 99, 100, 1, 17, 17, 0, 34, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(352, 11, 42, 17, 105, 100, 1, 17, 17, 0, 34, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(353, 11, 42, 3, 106, 100, 1, 17, 17, 0, 34, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(354, 11, 42, 1, 114, 100, 1, 17, 17, 0, 34, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(355, 11, 42, 367, 115, 100, 1, 17, 17, 0, 34, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(356, 11, 42, 366, 117, 100, 1, 17, 17, 0, 34, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(357, 11, 42, 2, 119, 100, 1, 17, 17, 0, 34, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(358, 11, 42, 7, 123, 100, 1, 17, 17, 0, 34, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(359, 11, 42, 16, 126, 100, 1, 17, 17, 0, 34, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(360, 11, 42, 364, 129, 100, 1, 17, 17, 0, 34, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(361, 11, 42, 19, 141, 100, 1, 17, 17, 0, 34, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(362, 11, 42, 361, 150, 100, 1, 17, 17, 0, 34, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(363, 11, 42, 372, 151, 100, 1, 17, 17, 0, 34, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(364, 11, 42, 354, 152, 100, 1, 17, 17, 0, 34, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(365, 11, 42, 378, 153, 100, 1, 17, 17, 0, 34, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(366, 11, 42, 370, 159, 100, 1, 17, 17, 0, 34, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(367, 11, 42, 369, 160, 100, 1, 17, 17, 0, 34, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(368, 11, 42, 355, 161, 100, 1, 17, 17, 0, 34, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(369, 11, 42, 374, 172, 100, 1, 17, 17, 0, 34, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(370, 11, 42, 358, 173, 100, 1, 17, 17, 0, 34, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(371, 11, 42, 360, 21, 102, 1, 23, 9, 0, 32, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(372, 11, 42, 14, 35, 102, 1, 23, 9, 0, 32, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(373, 11, 42, 20, 38, 102, 1, 23, 9, 0, 32, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(374, 11, 42, 12, 40, 102, 1, 23, 9, 0, 32, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(375, 11, 42, 13, 43, 102, 1, 23, 9, 0, 32, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(376, 11, 42, 356, 44, 102, 1, 23, 9, 0, 32, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(377, 11, 42, 9, 47, 102, 1, 23, 9, 0, 32, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(378, 11, 42, 10, 50, 102, 1, 23, 9, 0, 32, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(379, 11, 42, 5, 51, 102, 1, 23, 9, 0, 32, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(380, 11, 42, 8, 52, 102, 1, 23, 9, 0, 32, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(381, 11, 42, 529, 53, 102, 1, 23, 9, 0, 32, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(382, 11, 42, 376, 61, 102, 1, 23, 9, 0, 32, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(383, 11, 42, 11, 64, 102, 1, 23, 9, 0, 32, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(384, 11, 42, 6, 65, 102, 1, 23, 9, 0, 32, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(385, 11, 42, 379, 78, 102, 1, 23, 9, 0, 32, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(386, 11, 42, 4, 80, 102, 1, 23, 9, 0, 32, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(387, 11, 42, 15, 85, 102, 1, 23, 9, 0, 32, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(388, 11, 42, 18, 99, 102, 1, 23, 9, 0, 32, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(389, 11, 42, 17, 105, 102, 1, 23, 9, 0, 32, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(390, 11, 42, 3, 106, 102, 1, 23, 9, 0, 32, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(391, 11, 42, 1, 114, 102, 1, 23, 9, 0, 32, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(392, 11, 42, 367, 115, 102, 1, 23, 9, 0, 32, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(393, 11, 42, 366, 117, 102, 1, 23, 9, 0, 32, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(394, 11, 42, 2, 119, 102, 1, 23, 9, 0, 32, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(395, 11, 42, 7, 123, 102, 1, 23, 9, 0, 32, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(396, 11, 42, 16, 126, 102, 1, 23, 9, 0, 32, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(397, 11, 42, 364, 129, 102, 1, 23, 9, 0, 32, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(398, 11, 42, 19, 141, 102, 1, 23, 9, 0, 32, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(399, 11, 42, 361, 150, 102, 1, 23, 9, 0, 32, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(400, 11, 42, 372, 151, 102, 1, 23, 9, 0, 32, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(401, 11, 42, 354, 152, 102, 1, 23, 9, 0, 32, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(402, 11, 42, 378, 153, 102, 1, 23, 9, 0, 32, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(403, 11, 42, 370, 159, 102, 1, 23, 9, 0, 32, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(404, 11, 42, 369, 160, 102, 1, 23, 9, 0, 32, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(405, 11, 42, 355, 161, 102, 1, 23, 9, 0, 32, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(406, 11, 42, 374, 172, 102, 1, 23, 9, 0, 32, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(407, 11, 42, 358, 173, 102, 1, 23, 9, 0, 32, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(408, 11, 42, 360, 21, 105, 1, 48, 15, 0, 63, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(409, 11, 42, 14, 35, 105, 1, 48, 15, 0, 63, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(410, 11, 42, 20, 38, 105, 1, 48, 15, 0, 63, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(411, 11, 42, 12, 40, 105, 1, 48, 15, 0, 63, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(412, 11, 42, 13, 43, 105, 1, 48, 15, 0, 63, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(413, 11, 42, 356, 44, 105, 1, 48, 15, 0, 63, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(414, 11, 42, 9, 47, 105, 1, 48, 15, 0, 63, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(415, 11, 42, 10, 50, 105, 1, 48, 15, 0, 63, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(416, 11, 42, 5, 51, 105, 1, 48, 15, 0, 63, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(417, 11, 42, 8, 52, 105, 1, 48, 15, 0, 63, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(418, 11, 42, 529, 53, 105, 1, 48, 15, 0, 63, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(419, 11, 42, 376, 61, 105, 1, 48, 15, 0, 63, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(420, 11, 42, 11, 64, 105, 1, 48, 15, 0, 63, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(421, 11, 42, 6, 65, 105, 1, 48, 15, 0, 63, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(422, 11, 42, 379, 78, 105, 1, 48, 15, 0, 63, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(423, 11, 42, 4, 80, 105, 1, 48, 15, 0, 63, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(424, 11, 42, 15, 85, 105, 1, 48, 15, 0, 63, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(425, 11, 42, 18, 99, 105, 1, 48, 15, 0, 63, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(426, 11, 42, 17, 105, 105, 1, 48, 15, 0, 63, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(427, 11, 42, 3, 106, 105, 1, 48, 15, 0, 63, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(428, 11, 42, 1, 114, 105, 1, 48, 15, 0, 63, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(429, 11, 42, 367, 115, 105, 1, 48, 15, 0, 63, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(430, 11, 42, 366, 117, 105, 1, 48, 15, 0, 63, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(431, 11, 42, 2, 119, 105, 1, 48, 15, 0, 63, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(432, 11, 42, 7, 123, 105, 1, 48, 15, 0, 63, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(433, 11, 42, 16, 126, 105, 1, 48, 15, 0, 63, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(434, 11, 42, 364, 129, 105, 1, 48, 15, 0, 63, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(435, 11, 42, 19, 141, 105, 1, 48, 15, 0, 63, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(436, 11, 42, 361, 150, 105, 1, 48, 15, 0, 63, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(437, 11, 42, 372, 151, 105, 1, 48, 15, 0, 63, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(438, 11, 42, 354, 152, 105, 1, 48, 15, 0, 63, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(439, 11, 42, 378, 153, 105, 1, 48, 15, 0, 63, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(440, 11, 42, 370, 159, 105, 1, 48, 15, 0, 63, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(441, 11, 42, 369, 160, 105, 1, 48, 15, 0, 63, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(442, 11, 42, 355, 161, 105, 1, 48, 15, 0, 63, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(443, 11, 42, 374, 172, 105, 1, 48, 15, 0, 63, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(444, 11, 42, 358, 173, 105, 1, 48, 15, 0, 63, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(445, 11, 42, 360, 21, 103, 1, 19, 8, 0, 27, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(446, 11, 42, 14, 35, 103, 1, 19, 8, 0, 27, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(447, 11, 42, 20, 38, 103, 1, 19, 8, 0, 27, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(448, 11, 42, 12, 40, 103, 1, 19, 8, 0, 27, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(449, 11, 42, 13, 43, 103, 1, 19, 8, 0, 27, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(450, 11, 42, 356, 44, 103, 1, 19, 8, 0, 27, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(451, 11, 42, 9, 47, 103, 1, 19, 8, 0, 27, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(452, 11, 42, 10, 50, 103, 1, 19, 8, 0, 27, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(453, 11, 42, 5, 51, 103, 1, 19, 8, 0, 27, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(454, 11, 42, 8, 52, 103, 1, 19, 8, 0, 27, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(455, 11, 42, 529, 53, 103, 1, 19, 8, 0, 27, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(456, 11, 42, 376, 61, 103, 1, 19, 8, 0, 27, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(457, 11, 42, 11, 64, 103, 1, 19, 8, 0, 27, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(458, 11, 42, 6, 65, 103, 1, 19, 8, 0, 27, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(459, 11, 42, 379, 78, 103, 1, 19, 8, 0, 27, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(460, 11, 42, 4, 80, 103, 1, 19, 8, 0, 27, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(461, 11, 42, 15, 85, 103, 1, 19, 8, 0, 27, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(462, 11, 42, 18, 99, 103, 1, 19, 8, 0, 27, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(463, 11, 42, 17, 105, 103, 1, 19, 8, 0, 27, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(464, 11, 42, 3, 106, 103, 1, 19, 8, 0, 27, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(465, 11, 42, 1, 114, 103, 1, 19, 8, 0, 27, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(466, 11, 42, 367, 115, 103, 1, 19, 8, 0, 27, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(467, 11, 42, 366, 117, 103, 1, 19, 8, 0, 27, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(468, 11, 42, 2, 119, 103, 1, 19, 8, 0, 27, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(469, 11, 42, 7, 123, 103, 1, 19, 8, 0, 27, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(470, 11, 42, 16, 126, 103, 1, 19, 8, 0, 27, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(471, 11, 42, 364, 129, 103, 1, 19, 8, 0, 27, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(472, 11, 42, 19, 141, 103, 1, 19, 8, 0, 27, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(473, 11, 42, 361, 150, 103, 1, 19, 8, 0, 27, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(474, 11, 42, 372, 151, 103, 1, 19, 8, 0, 27, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(475, 11, 42, 354, 152, 103, 1, 19, 8, 0, 27, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(476, 11, 42, 378, 153, 103, 1, 19, 8, 0, 27, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(477, 11, 42, 370, 159, 103, 1, 19, 8, 0, 27, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(478, 11, 42, 369, 160, 103, 1, 19, 8, 0, 27, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(479, 11, 42, 355, 161, 103, 1, 19, 8, 0, 27, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(480, 11, 42, 374, 172, 103, 1, 19, 8, 0, 27, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(481, 11, 42, 358, 173, 103, 1, 19, 8, 0, 27, 0, 2016, '', 1, '2016-12-19', 0, '0000-00-00', 7),
(482, 11, 42, 360, 21, 106, 1, 45, 15, 0, 60, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(483, 11, 42, 14, 35, 106, 1, 45, 15, 0, 60, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(484, 11, 42, 20, 38, 106, 1, 45, 15, 0, 60, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(485, 11, 42, 12, 40, 106, 1, 45, 15, 0, 60, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(486, 11, 42, 13, 43, 106, 1, 45, 15, 0, 60, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(487, 11, 42, 356, 44, 106, 1, 45, 15, 0, 60, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(488, 11, 42, 9, 47, 106, 1, 45, 15, 0, 60, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(489, 11, 42, 10, 50, 106, 1, 45, 15, 0, 60, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(490, 11, 42, 5, 51, 106, 1, 45, 15, 0, 60, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(491, 11, 42, 8, 52, 106, 1, 45, 15, 0, 60, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(492, 11, 42, 529, 53, 106, 1, 45, 15, 0, 60, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(493, 11, 42, 376, 61, 106, 1, 45, 15, 0, 60, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(494, 11, 42, 11, 64, 106, 1, 45, 15, 0, 60, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(495, 11, 42, 6, 65, 106, 1, 45, 15, 0, 60, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(496, 11, 42, 379, 78, 106, 1, 45, 15, 0, 60, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(497, 11, 42, 4, 80, 106, 1, 45, 15, 0, 60, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(498, 11, 42, 15, 85, 106, 1, 45, 15, 0, 60, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(499, 11, 42, 18, 99, 106, 1, 45, 15, 0, 60, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(500, 11, 42, 17, 105, 106, 1, 45, 15, 0, 60, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(501, 11, 42, 3, 106, 106, 1, 45, 15, 0, 60, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(502, 11, 42, 1, 114, 106, 1, 45, 15, 0, 60, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(503, 11, 42, 367, 115, 106, 1, 45, 15, 0, 60, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(504, 11, 42, 366, 117, 106, 1, 45, 15, 0, 60, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(505, 11, 42, 2, 119, 106, 1, 45, 15, 0, 60, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(506, 11, 42, 7, 123, 106, 1, 45, 15, 0, 60, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(507, 11, 42, 16, 126, 106, 1, 45, 15, 0, 60, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(508, 11, 42, 364, 129, 106, 1, 45, 15, 0, 60, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(509, 11, 42, 19, 141, 106, 1, 45, 15, 0, 60, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(510, 11, 42, 361, 150, 106, 1, 45, 15, 0, 60, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(511, 11, 42, 372, 151, 106, 1, 45, 15, 0, 60, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(512, 11, 42, 354, 152, 106, 1, 45, 15, 0, 60, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(513, 11, 42, 378, 153, 106, 1, 45, 15, 0, 60, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(514, 11, 42, 370, 159, 106, 1, 45, 15, 0, 60, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(515, 11, 42, 369, 160, 106, 1, 45, 15, 0, 60, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(516, 11, 42, 355, 161, 106, 1, 45, 15, 0, 60, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(517, 11, 42, 374, 172, 106, 1, 45, 15, 0, 60, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(518, 11, 42, 358, 173, 106, 1, 45, 15, 0, 60, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(519, 1, 1, 155, 1, 1, 1, 33, 0, 0, 33, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(520, 1, 1, 156, 2, 1, 1, 33, 0, 0, 33, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(521, 1, 1, 157, 3, 1, 1, 33, 0, 0, 33, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(522, 1, 1, 158, 4, 1, 1, 33, 0, 0, 33, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(523, 1, 1, 159, 5, 1, 1, 33, 0, 0, 33, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(524, 1, 1, 160, 6, 1, 1, 33, 0, 0, 33, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(525, 1, 1, 161, 7, 1, 1, 33, 0, 0, 33, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(526, 1, 1, 162, 8, 1, 1, 33, 0, 0, 33, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(527, 1, 1, 163, 9, 1, 1, 33, 0, 0, 33, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(528, 1, 1, 164, 10, 1, 1, 33, 0, 0, 33, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(529, 1, 1, 165, 11, 1, 1, 33, 0, 0, 33, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(530, 1, 1, 166, 12, 1, 1, 33, 0, 0, 33, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7);
INSERT INTO `marks` (`MARK_ID`, `CLASS_ID`, `SECTION_ID`, `STUDENT_ID`, `ROLL_NO`, `SUBJECT_ID`, `EXAM_ID`, `SUBJECTIVE_MARK`, `OBJECTIVE_MARK`, `PRACTICAL_MARK`, `MARK_OBTAINED`, `GRADE_ID`, `YEAR`, `COMMENT`, `CREATED_BY`, `CREATED_DATE`, `UPDATED_BY`, `UPDATED_DATE`, `STATUS`) VALUES
(531, 1, 1, 167, 13, 1, 1, 33, 0, 0, 33, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(532, 1, 1, 168, 15, 1, 1, 33, 0, 0, 33, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(533, 1, 1, 169, 16, 1, 1, 33, 0, 0, 33, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(534, 1, 1, 170, 21, 1, 1, 33, 0, 0, 33, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(535, 1, 1, 171, 22, 1, 1, 33, 0, 0, 33, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(536, 1, 1, 172, 24, 1, 1, 33, 0, 0, 33, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(537, 1, 1, 173, 25, 1, 1, 33, 0, 0, 33, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(538, 1, 1, 174, 27, 1, 1, 33, 0, 0, 33, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(539, 1, 1, 175, 28, 1, 1, 33, 0, 0, 33, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(540, 1, 1, 176, 29, 1, 1, 33, 0, 0, 33, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(541, 1, 1, 177, 30, 1, 1, 33, 0, 0, 33, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(542, 1, 1, 178, 31, 1, 1, 33, 0, 0, 33, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(543, 1, 1, 179, 32, 1, 1, 33, 0, 0, 33, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(544, 1, 1, 180, 33, 1, 1, 33, 0, 0, 33, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(545, 1, 1, 181, 34, 1, 1, 33, 0, 0, 33, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(546, 1, 1, 182, 36, 1, 1, 33, 0, 0, 33, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(547, 1, 1, 155, 1, 2, 1, 33, 0, 0, 33, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(548, 1, 1, 156, 2, 2, 1, 33, 0, 0, 33, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(549, 1, 1, 157, 3, 2, 1, 33, 0, 0, 33, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(550, 1, 1, 158, 4, 2, 1, 33, 0, 0, 33, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(551, 1, 1, 159, 5, 2, 1, 33, 0, 0, 33, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(552, 1, 1, 160, 6, 2, 1, 33, 0, 0, 33, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(553, 1, 1, 161, 7, 2, 1, 33, 0, 0, 33, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(554, 1, 1, 162, 8, 2, 1, 33, 0, 0, 33, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(555, 1, 1, 163, 9, 2, 1, 33, 0, 0, 33, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(556, 1, 1, 164, 10, 2, 1, 33, 0, 0, 33, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(557, 1, 1, 165, 11, 2, 1, 33, 0, 0, 33, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(558, 1, 1, 166, 12, 2, 1, 33, 0, 0, 33, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(559, 1, 1, 167, 13, 2, 1, 33, 0, 0, 33, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(560, 1, 1, 168, 15, 2, 1, 33, 0, 0, 33, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(561, 1, 1, 169, 16, 2, 1, 33, 0, 0, 33, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(562, 1, 1, 170, 21, 2, 1, 33, 0, 0, 33, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(563, 1, 1, 171, 22, 2, 1, 33, 0, 0, 33, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(564, 1, 1, 172, 24, 2, 1, 33, 0, 0, 33, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(565, 1, 1, 173, 25, 2, 1, 33, 0, 0, 33, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(566, 1, 1, 174, 27, 2, 1, 33, 0, 0, 33, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(567, 1, 1, 175, 28, 2, 1, 33, 0, 0, 33, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(568, 1, 1, 176, 29, 2, 1, 33, 0, 0, 33, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(569, 1, 1, 177, 30, 2, 1, 33, 0, 0, 33, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(570, 1, 1, 178, 31, 2, 1, 33, 0, 0, 33, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(571, 1, 1, 179, 32, 2, 1, 33, 0, 0, 33, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(572, 1, 1, 180, 33, 2, 1, 33, 0, 0, 33, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(573, 1, 1, 181, 34, 2, 1, 33, 0, 0, 33, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(574, 1, 1, 182, 36, 2, 1, 33, 0, 0, 33, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(575, 1, 1, 155, 1, 3, 3, 33, 0, 0, 33, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(576, 1, 1, 156, 2, 3, 3, 33, 0, 0, 33, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(577, 1, 1, 157, 3, 3, 3, 33, 0, 0, 33, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(578, 1, 1, 158, 4, 3, 3, 33, 0, 0, 33, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(579, 1, 1, 159, 5, 3, 3, 33, 0, 0, 33, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(580, 1, 1, 160, 6, 3, 3, 33, 0, 0, 33, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(581, 1, 1, 161, 7, 3, 3, 33, 0, 0, 33, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(582, 1, 1, 162, 8, 3, 3, 33, 0, 0, 33, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(583, 1, 1, 163, 9, 3, 3, 33, 0, 0, 33, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(584, 1, 1, 164, 10, 3, 3, 33, 0, 0, 33, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(585, 1, 1, 165, 11, 3, 3, 33, 0, 0, 33, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(586, 1, 1, 166, 12, 3, 3, 33, 0, 0, 33, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(587, 1, 1, 167, 13, 3, 3, 33, 0, 0, 33, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(588, 1, 1, 168, 15, 3, 3, 33, 0, 0, 33, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(589, 1, 1, 169, 16, 3, 3, 33, 0, 0, 33, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(590, 1, 1, 170, 21, 3, 3, 33, 0, 0, 33, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(591, 1, 1, 171, 22, 3, 3, 33, 0, 0, 33, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(592, 1, 1, 172, 24, 3, 3, 33, 0, 0, 33, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(593, 1, 1, 173, 25, 3, 3, 33, 0, 0, 33, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(594, 1, 1, 174, 27, 3, 3, 33, 0, 0, 33, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(595, 1, 1, 175, 28, 3, 3, 33, 0, 0, 33, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(596, 1, 1, 176, 29, 3, 3, 33, 0, 0, 33, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(597, 1, 1, 177, 30, 3, 3, 33, 0, 0, 33, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(598, 1, 1, 178, 31, 3, 3, 33, 0, 0, 33, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(599, 1, 1, 179, 32, 3, 3, 33, 0, 0, 33, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(600, 1, 1, 180, 33, 3, 3, 33, 0, 0, 33, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(601, 1, 1, 181, 34, 3, 3, 33, 0, 0, 33, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(602, 1, 1, 182, 36, 3, 3, 33, 0, 0, 33, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(603, 1, 1, 155, 1, 4, 3, 40, 0, 0, 40, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(604, 1, 1, 156, 2, 4, 3, 40, 0, 0, 40, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(605, 1, 1, 157, 3, 4, 3, 40, 0, 0, 40, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(606, 1, 1, 158, 4, 4, 3, 40, 0, 0, 40, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(607, 1, 1, 159, 5, 4, 3, 40, 0, 0, 40, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(608, 1, 1, 160, 6, 4, 3, 40, 0, 0, 40, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(609, 1, 1, 161, 7, 4, 3, 40, 0, 0, 40, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(610, 1, 1, 162, 8, 4, 3, 40, 0, 0, 40, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(611, 1, 1, 163, 9, 4, 3, 40, 0, 0, 40, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(612, 1, 1, 164, 10, 4, 3, 40, 0, 0, 40, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(613, 1, 1, 165, 11, 4, 3, 40, 0, 0, 40, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(614, 1, 1, 166, 12, 4, 3, 40, 0, 0, 40, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(615, 1, 1, 167, 13, 4, 3, 40, 0, 0, 40, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(616, 1, 1, 168, 15, 4, 3, 40, 0, 0, 40, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(617, 1, 1, 169, 16, 4, 3, 40, 0, 0, 40, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(618, 1, 1, 170, 21, 4, 3, 40, 0, 0, 40, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(619, 1, 1, 171, 22, 4, 3, 40, 0, 0, 40, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(620, 1, 1, 172, 24, 4, 3, 40, 0, 0, 40, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(621, 1, 1, 173, 25, 4, 3, 40, 0, 0, 40, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(622, 1, 1, 174, 27, 4, 3, 40, 0, 0, 40, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(623, 1, 1, 175, 28, 4, 3, 40, 0, 0, 40, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(624, 1, 1, 176, 29, 4, 3, 40, 0, 0, 40, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(625, 1, 1, 177, 30, 4, 3, 40, 0, 0, 40, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(626, 1, 1, 178, 31, 4, 3, 40, 0, 0, 40, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(627, 1, 1, 179, 32, 4, 3, 40, 0, 0, 40, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(628, 1, 1, 180, 33, 4, 3, 40, 0, 0, 40, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(629, 1, 1, 181, 34, 4, 3, 40, 0, 0, 40, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(630, 1, 1, 182, 36, 4, 3, 40, 0, 0, 40, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(631, 1, 1, 155, 1, 5, 1, 45, 0, 0, 45, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(632, 1, 1, 156, 2, 5, 1, 40, 0, 0, 40, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(633, 1, 1, 157, 3, 5, 1, 40, 0, 0, 40, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(634, 1, 1, 158, 4, 5, 1, 40, 0, 0, 40, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(635, 1, 1, 159, 5, 5, 1, 40, 0, 0, 40, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(636, 1, 1, 160, 6, 5, 1, 40, 0, 0, 40, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(637, 1, 1, 161, 7, 5, 1, 40, 0, 0, 40, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(638, 1, 1, 162, 8, 5, 1, 40, 0, 0, 40, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(639, 1, 1, 163, 9, 5, 1, 40, 0, 0, 40, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(640, 1, 1, 164, 10, 5, 1, 40, 0, 0, 40, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(641, 1, 1, 165, 11, 5, 1, 40, 0, 0, 40, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(642, 1, 1, 166, 12, 5, 1, 40, 0, 0, 40, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(643, 1, 1, 167, 13, 5, 1, 40, 0, 0, 40, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(644, 1, 1, 168, 15, 5, 1, 40, 0, 0, 40, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(645, 1, 1, 169, 16, 5, 1, 40, 0, 0, 40, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(646, 1, 1, 170, 21, 5, 1, 40, 0, 0, 40, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(647, 1, 1, 171, 22, 5, 1, 40, 0, 0, 40, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(648, 1, 1, 172, 24, 5, 1, 40, 0, 0, 40, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(649, 1, 1, 173, 25, 5, 1, 40, 0, 0, 40, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(650, 1, 1, 174, 27, 5, 1, 40, 0, 0, 40, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(651, 1, 1, 175, 28, 5, 1, 40, 0, 0, 40, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(652, 1, 1, 176, 29, 5, 1, 40, 0, 0, 40, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(653, 1, 1, 177, 30, 5, 1, 40, 0, 0, 40, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(654, 1, 1, 178, 31, 5, 1, 40, 0, 0, 40, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(655, 1, 1, 179, 32, 5, 1, 40, 0, 0, 40, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(656, 1, 1, 180, 33, 5, 1, 40, 0, 0, 40, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(657, 1, 1, 181, 34, 5, 1, 40, 0, 0, 40, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(658, 1, 1, 182, 36, 5, 1, 40, 0, 0, 40, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(659, 1, 1, 155, 1, 6, 1, 20, 0, 0, 20, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(660, 1, 1, 156, 2, 6, 1, 20, 0, 0, 20, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(661, 1, 1, 157, 3, 6, 1, 20, 0, 0, 20, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(662, 1, 1, 158, 4, 6, 1, 20, 0, 0, 20, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(663, 1, 1, 159, 5, 6, 1, 20, 0, 0, 20, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(664, 1, 1, 160, 6, 6, 1, 20, 0, 0, 20, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(665, 1, 1, 161, 7, 6, 1, 20, 0, 0, 20, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(666, 1, 1, 162, 8, 6, 1, 20, 0, 0, 20, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(667, 1, 1, 163, 9, 6, 1, 20, 0, 0, 20, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(668, 1, 1, 164, 10, 6, 1, 20, 0, 0, 20, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(669, 1, 1, 165, 11, 6, 1, 20, 0, 0, 20, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(670, 1, 1, 166, 12, 6, 1, 20, 0, 0, 20, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(671, 1, 1, 167, 13, 6, 1, 20, 0, 0, 20, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(672, 1, 1, 168, 15, 6, 1, 20, 0, 0, 20, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(673, 1, 1, 169, 16, 6, 1, 20, 0, 0, 20, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(674, 1, 1, 170, 21, 6, 1, 20, 0, 0, 20, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(675, 1, 1, 171, 22, 6, 1, 20, 0, 0, 20, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(676, 1, 1, 172, 24, 6, 1, 20, 0, 0, 20, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(677, 1, 1, 173, 25, 6, 1, 20, 0, 0, 20, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(678, 1, 1, 174, 27, 6, 1, 20, 0, 0, 20, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(679, 1, 1, 175, 28, 6, 1, 20, 0, 0, 20, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(680, 1, 1, 176, 29, 6, 1, 20, 0, 0, 20, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(681, 1, 1, 177, 30, 6, 1, 20, 0, 0, 20, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(682, 1, 1, 178, 31, 6, 1, 20, 0, 0, 20, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(683, 1, 1, 179, 32, 6, 1, 20, 0, 0, 20, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(684, 1, 1, 180, 33, 6, 1, 20, 0, 0, 20, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(685, 1, 1, 181, 34, 6, 1, 20, 0, 0, 20, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7),
(686, 1, 1, 182, 36, 6, 1, 20, 0, 0, 20, 0, 2016, '', 1, '2016-12-20', 0, '0000-00-00', 7);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `MEMBER_ID` int(11) NOT NULL,
  `MEMBER_NAME` varchar(250) NOT NULL,
  `MEMBER_BIRTHDAY` varchar(250) NOT NULL,
  `SEX` varchar(150) NOT NULL,
  `ADDRESS` text NOT NULL,
  `AGE` int(11) NOT NULL,
  `OCCUPATION` varchar(300) NOT NULL,
  `EDUCATION_BACK` varchar(500) NOT NULL,
  `VOTER_ID` varchar(50) NOT NULL,
  `SESSION_START` date NOT NULL,
  `SESSION_END` date NOT NULL,
  `MARRIAGE_STATUS` varchar(50) NOT NULL,
  `PHONE` varchar(50) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `IMAGES` varchar(200) NOT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `CREATED_DATE` date NOT NULL,
  `UPDATED_BY` int(11) NOT NULL,
  `UPDATED_DATE` date NOT NULL,
  `STATUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`MEMBER_ID`, `MEMBER_NAME`, `MEMBER_BIRTHDAY`, `SEX`, `ADDRESS`, `AGE`, `OCCUPATION`, `EDUCATION_BACK`, `VOTER_ID`, `SESSION_START`, `SESSION_END`, `MARRIAGE_STATUS`, `PHONE`, `EMAIL`, `IMAGES`, `CREATED_BY`, `CREATED_DATE`, `UPDATED_BY`, `UPDATED_DATE`, `STATUS`) VALUES
(1, 'Shariful Islam', '06/05/2016', 'Male', 'adsf ssadfe sdf', 45, 'student', ' asdf asdafadsf', '565868596', '2016-06-05', '2016-06-05', 'single', '01727743522', 'sharif@gmail.com', '', 1, '2016-06-05', 1, '2016-07-20', 7),
(2, 'Abid Shohan', '07/01/1978', 'Male', 'Dhaka', 64, 'Business Men', 'HSC', '7856534875638', '2013-01-01', '2016-12-01', 'Married', '02563218', 'abid@ymail.com', 'McCarthy.jpg', 1, '2016-07-18', 1, '2016-07-20', 7),
(3, 'Khairul Islam Rafi', '07/01/1984', 'Male', 'Dhaka, Bangladesh', 25, 'Police', 'SSC, HSC', '4875255', '2015-06-01', '2017-07-01', 'single', '017484588', 'khairulisalm@gmail.com', 'chairman.jpg', 1, '2016-07-21', 0, '0000-00-00', 7),
(4, 'Rahin Ahmed', '07/01/1985', 'Male', 'Dhaka, Bangladesh', 30, 'Bussinessman', 'SSC, HSC, MS', '4784125', '2015-07-01', '2017-07-01', 'marige', '0174854985', 'rahinahmed@gmail.com', 'Chairman-message.jpg', 1, '2016-07-21', 0, '0000-00-00', 7);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `message_id` int(11) NOT NULL,
  `name` longtext CHARACTER SET utf8 NOT NULL,
  `msg` longtext CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`message_id`, `name`, `msg`) VALUES
(1, 'shawkat ali', ' উচ্চ মাধ্যমিক, স্নাতক সম্মান ও স্নাতকোত্তর পর্যায়ে বিদ্যালাভের সুষ্ঠু পরিবেশ এখানে রচিত হয়েছে বহু মানুষের ত্যাগে, শ্রমে ও মেধায়। ঢাকা সিটি কলেজের আদর্শ নবীনবিদ্যার্থীদের মানবতা বোধের মন্ত্রে উজ্জীবিত করাসংস্কারমুক্ত স্বাধীন চিন্তার সৎ, সাহসী ও সচেতন প্রজন্ম গড়ে তোলা। বোর্ড ও বিশ্ববিদ্যালয়ের মেধা তালিকায় প্রথম সারিতে স্থান পেলেই যে মানুষ মানুষ হয় না তার প্রমাণ আমরা প্রতিনিয়ত পাচ্ছি। তাই দেশ ও দশের কল্যাণব্রতে স্নিগ্ধ মানব সন্তান আমাদের আজ একান্তভাবে কাম্য। তারাই গড়বে আমাদের কাঙ্খিত সোনার বাংলাদেশ। শিক্ষা আজ পণ্যে রূপান্তরিত হয়েছে। অনেক প্রতিষ্ঠান ডিগ্রি বিক্রি করে মুনাফা লুটে চলেছে। বাজার অর্থনীতি ও বিশ্বায়নের যুগে শিক্ষা প্রতিষ্ঠানের আদর্শে অনড় থেকে নানা প্রতিযোগিতার মধ্য দিয়ে আমরা নিজের ভিত মজবুত রাখবো; এ অঙ্গীকারে আমরা অবিচল। ডিগ্রি লাভের সুযোগ করে দেয়া নয় শুধু, শিক্ষার্থীদের শারীরিক ও মানসিক স্বাস্থ্য পরিচর্যার এক উৎকৃষ্ট কেন্দ্র এই ঢাকা সিটি কলেজ সব সময় নতুন সূর্যের দিকে অগ্রসরমাণ থাকবেএই আমার বিশ্বাস। ');

-- --------------------------------------------------------

--
-- Table structure for table `monthly_salary`
--

CREATE TABLE `monthly_salary` (
  `MONTHLY_SALARY_ID` int(11) NOT NULL,
  `TEACHER_ID` int(11) NOT NULL,
  `SALARY` int(11) NOT NULL,
  `MONTH` varchar(50) NOT NULL,
  `PAYMENT_TYPE` varchar(250) NOT NULL,
  `YEAR` year(4) NOT NULL,
  `PAY_DATE` date NOT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `CREATED_DATE` date NOT NULL,
  `UPDATED_BY` int(11) NOT NULL,
  `UPDATED_DATE` date NOT NULL,
  `STATUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `monthly_salary`
--

INSERT INTO `monthly_salary` (`MONTHLY_SALARY_ID`, `TEACHER_ID`, `SALARY`, `MONTH`, `PAYMENT_TYPE`, `YEAR`, `PAY_DATE`, `CREATED_BY`, `CREATED_DATE`, `UPDATED_BY`, `UPDATED_DATE`, `STATUS`) VALUES
(2, 4, 12000, 'january', 'asdf', 2016, '2016-08-17', 1, '2016-04-06', 1, '0000-00-00', 7),
(3, 3, 10000, 'january', 'ASDF', 2016, '2016-08-17', 1, '2016-08-01', 0, '0000-00-00', 7),
(4, 3, 10000, 'february', 'ADSF', 2016, '2016-08-17', 1, '2016-08-03', 0, '0000-00-00', 7),
(5, 3, 10000, 'march', 'SDAF', 2016, '2016-08-17', 1, '2016-08-17', 0, '0000-00-00', 7),
(6, 1, 14500, 'january', 'ASDF', 2016, '2016-08-17', 1, '2016-08-17', 0, '0000-00-00', 7),
(7, 1, 14500, 'february', 'ASDF', 2016, '2016-08-17', 1, '2016-08-17', 0, '0000-00-00', 7),
(8, 1, 14500, 'march', 'ASDF', 2016, '2016-08-24', 1, '2016-08-17', 0, '0000-00-00', 7),
(9, 4, 12000, 'february', 'SADF', 2016, '2016-08-17', 1, '2016-08-17', 0, '0000-00-00', 7),
(10, 4, 12000, 'march', 'SDAF', 2016, '2016-08-17', 1, '2016-08-17', 0, '0000-00-00', 7),
(11, 2, 8000, 'january', 'SADF', 2016, '2016-08-17', 1, '2016-08-17', 0, '0000-00-00', 7),
(12, 2, 8000, 'february', 'SADF', 2016, '2016-08-17', 1, '2016-08-02', 1, '2016-08-17', 7),
(13, 2, 8000, 'march', 'SSADF', 2016, '2016-08-17', 1, '2016-08-04', 0, '0000-00-00', 7),
(14, 3, 10000, 'april', 'asdf', 2016, '2016-07-31', 1, '2016-08-17', 0, '0000-00-00', 7);

-- --------------------------------------------------------

--
-- Table structure for table `noticeboard`
--

CREATE TABLE `noticeboard` (
  `NOTICE_ID` int(11) NOT NULL,
  `NOTICE_TITLE` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `NOTICE_DETAILS` text COLLATE utf8_unicode_ci NOT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `CREATED_DATE` date NOT NULL,
  `UPDATED_BY` int(11) NOT NULL,
  `UPDATED_DATE` date NOT NULL,
  `STATUS` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `noticeboard`
--

INSERT INTO `noticeboard` (`NOTICE_ID`, `NOTICE_TITLE`, `NOTICE_DETAILS`, `CREATED_BY`, `CREATED_DATE`, `UPDATED_BY`, `UPDATED_DATE`, `STATUS`) VALUES
(2, 'result', 'Hsc result 2016', 1, '2016-06-04', 1, '2016-06-04', 7),
(5, 'SSC Result', 'SSC result published Tomorrow', 1, '2016-07-14', 0, '0000-00-00', 7),
(4, 'Admission result', 'Admission result published.', 1, '2016-07-14', 1, '2016-07-14', 7),
(6, 'Second Term Exam', 'Second Term exam will held as 06-08-2016', 1, '2016-07-14', 0, '0000-00-00', 7);

-- --------------------------------------------------------

--
-- Table structure for table `online_application`
--

CREATE TABLE `online_application` (
  `STUDENT_ID` int(11) NOT NULL,
  `NAME` varchar(200) NOT NULL,
  `BIRTHDAY` date NOT NULL,
  `GENDER` varchar(10) NOT NULL,
  `RELIGION` varchar(50) NOT NULL,
  `BLOOD_GROUP` varchar(20) NOT NULL,
  `AGE` int(11) NOT NULL,
  `ADDRESS` text NOT NULL,
  `PHONE` varchar(50) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `FATHER_NAME` varchar(100) NOT NULL,
  `MOTHER_NAME` varchar(100) NOT NULL,
  `PUBLIC_ID` int(11) NOT NULL,
  `CLASS_ID` int(11) NOT NULL,
  `YEAR` int(11) NOT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `CREATED_DATE` date NOT NULL,
  `UPDATED_BY` int(11) NOT NULL,
  `UPDATED_DATE` date NOT NULL,
  `STATUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `online_application`
--

INSERT INTO `online_application` (`STUDENT_ID`, `NAME`, `BIRTHDAY`, `GENDER`, `RELIGION`, `BLOOD_GROUP`, `AGE`, `ADDRESS`, `PHONE`, `EMAIL`, `FATHER_NAME`, `MOTHER_NAME`, `PUBLIC_ID`, `CLASS_ID`, `YEAR`, `CREATED_BY`, `CREATED_DATE`, `UPDATED_BY`, `UPDATED_DATE`, `STATUS`) VALUES
(1, 'Hazard', '1970-01-01', 'Male', 'Islam', '', 14, 'kbnkj', '+8801919591191', 'mh@example.com', 'Abul', 'Morjina', 0, 5, 2016, 0, '2016-12-24', 0, '0000-00-00', 2),
(2, 'Faisal Hossain Munna', '2006-01-01', 'Male', 'Islam', '', 10, 'Bajrapur Mowlavi para, Comilla-3500', '01735672321', 'tenyy75@yahoo.com', 'Babul Mia', 'Sathi Begum', 0, 8, 2016, 0, '2016-12-26', 0, '0000-00-00', 7),
(3, 'Hasib', '1970-01-01', 'Male', 'Islam', 'A+', 14, 'Comilla', '+8801712113536', 'hasib@ymail.com', 'Abdur Rahim', 'Khaleda Begum', 0, 5, 2016, 0, '2016-12-31', 0, '0000-00-00', 2),
(4, 'Rayhan', '1970-01-01', 'Male', 'Islam', 'A+', 14, 'Comilla', '+8801919591992', 'rayhan@gmail.com', 'Asif Khan', 'Saima AKter', 0, 9, 2016, 0, '2016-12-31', 0, '0000-00-00', 2),
(5, 'Emon', '1970-01-01', 'Male', 'Islam', 'O+', 13, 'Comilla', '+8801919591191', 'emon@gmail.com', 'Akkas ALi', 'Setu Aketr', 0, 6, 2016, 0, '2016-12-31', 0, '0000-00-00', 2),
(6, 'Absar', '1999-11-09', 'Male', 'Islam', 'A+ (ve)', 17, 'ALps', '01717686227', 'mh.devil@yahoo.com', 'HK minar', 'Salma', 0, 11, 2017, 1, '2017-01-05', 0, '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `PAGE_ID` int(11) NOT NULL,
  `SUB_SUB_CATEGORY_ID` int(11) NOT NULL,
  `PAGE_TITLE` varchar(500) NOT NULL,
  `PAGE_DETAILS` text NOT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `CREATED_DATE` date NOT NULL,
  `UPDATED_BY` int(11) NOT NULL,
  `UPDATED_DATE` date NOT NULL,
  `STATUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`PAGE_ID`, `SUB_SUB_CATEGORY_ID`, `PAGE_TITLE`, `PAGE_DETAILS`, `CREATED_BY`, `CREATED_DATE`, `UPDATED_BY`, `UPDATED_DATE`, `STATUS`) VALUES
(2, 2, 'About Academy', '<P>BCS (Tax) Academy is the apex training institution for the officers and staff of the Taxes Department of National Board of Revenue in Bangladesh. It has been set up with tremendous vision and foresight of expectation.</p>\n\n<p>It performs the critical and overarching goal of developing, enhancing, monitoring and modeling the human capital fortunes of the nation interest by upgrading human capital and functioning as a best think–tank in tax policy and administration. The Academic import proficiency in core competence areas, disseminates knowledge and information about the best practices regarding tax issues and provides an international perspective, high quality professional capabilities and cultural sensitivities to officers.</p>\n\n<p>Besides training, high quality career planning, profiling and continued developments of the Direct Taxes Academy’s responsibility. </p>\n\n<p>Without human resources development and without required logistic facilities the growth of revenue collection will not be possible to maintain.</p>\n\n<p>The officer and staffs working at Taxes Department have no scope of proper and sufficient training, working, seminar and higher education on the respective fields. On the other hand, lack of sufficient logistics in the major crisis of the department.</p>\n', 1, '2016-05-25', 1, '2016-05-31', 7);

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE `parent` (
  `PARENT_ID` int(11) NOT NULL,
  `PARENT_NAME` varchar(100) NOT NULL,
  `STUDENT_ID` int(11) NOT NULL,
  `PHONE` varchar(30) NOT NULL,
  `EMAIL` varchar(30) NOT NULL,
  `NATIONAL_ID_NO` varchar(30) NOT NULL,
  `GENDER` varchar(7) NOT NULL,
  `RELATION_WITH_STU` varchar(100) NOT NULL,
  `ADDRESS` text NOT NULL,
  `OCCOPATION` varchar(100) NOT NULL,
  `IMAGES` varchar(250) NOT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `CREATED_DATE` date NOT NULL,
  `UPDATED_BY` int(11) NOT NULL,
  `UPDATED_DATE` date NOT NULL,
  `STATUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `parent`
--

INSERT INTO `parent` (`PARENT_ID`, `PARENT_NAME`, `STUDENT_ID`, `PHONE`, `EMAIL`, `NATIONAL_ID_NO`, `GENDER`, `RELATION_WITH_STU`, `ADDRESS`, `OCCOPATION`, `IMAGES`, `CREATED_BY`, `CREATED_DATE`, `UPDATED_BY`, `UPDATED_DATE`, `STATUS`) VALUES
(1, 'Asif Khan', 1, '01727743522', 'tofiz@gmail.com', '7587545', 'Male', 'Father', 'dsaf sadfsdaf sdaf', 'Business Man', '', 1, '2016-06-06', 1, '2016-08-08', 7),
(2, 'Cristiano Coman', 2, '01744724905', 'shawkatali527@gmail.com', '78564545', 'Male', 'Father', 'asdfasd', 'Job Holder', '', 1, '2016-06-09', 1, '2016-07-13', 7),
(3, 'Mosharaf Karim', 3, '+8801722731566', 'masaraf@hotmail.com', '867364734683683', 'Male', 'Father', 'Mohammadpur, Dhaka', 'Business Man', 'image14-250x250.jpg', 1, '2016-07-13', 0, '0000-00-00', 7);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `PAYMENT_ID` int(11) NOT NULL,
  `PAYMENT_CAT_ID` int(11) NOT NULL,
  `CLASS_ID` int(11) NOT NULL,
  `SECTION_ID` int(11) NOT NULL,
  `STUDENT_ID` int(11) NOT NULL,
  `AMOUNT` int(11) NOT NULL,
  `YEAR` int(11) NOT NULL,
  `MONTH` varchar(20) NOT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `CREATED_DATE` date NOT NULL,
  `UPDATED_BY` int(11) NOT NULL,
  `UPDATED_DATE` date NOT NULL,
  `STATUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`PAYMENT_ID`, `PAYMENT_CAT_ID`, `CLASS_ID`, `SECTION_ID`, `STUDENT_ID`, `AMOUNT`, `YEAR`, `MONTH`, `CREATED_BY`, `CREATED_DATE`, `UPDATED_BY`, `UPDATED_DATE`, `STATUS`) VALUES
(2, 3, 3, 5, 5, 6500, 2016, 'january', 1, '2016-06-12', 1, '2016-06-27', 7),
(3, 3, 3, 3, 3, 7000, 2016, 'january', 1, '2016-06-12', 1, '2016-06-15', 7),
(4, 4, 1, 2, 1, 500, 2016, 'january', 1, '2016-06-12', 0, '0000-00-00', 7),
(5, 5, 2, 2, 2, 600, 2016, 'january', 1, '2016-06-12', 0, '0000-00-00', 7),
(6, 6, 3, 3, 3, 700, 2016, 'january', 1, '2016-06-12', 0, '0000-00-00', 7),
(7, 5, 2, 3, 2, 554, 2016, 'february', 1, '2016-06-14', 1, '2016-06-15', 7),
(8, 2, 2, 4, 2, 8000, 2016, 'january', 1, '2016-07-13', 0, '0000-00-00', 7),
(9, 5, 2, 4, 2, 1500, 2016, 'january', 1, '2016-07-13', 0, '0000-00-00', 7),
(10, 5, 2, 4, 2, 1500, 2016, 'february', 1, '2016-07-13', 0, '0000-00-00', 7),
(11, 5, 2, 4, 2, 1500, 2016, 'march', 1, '2016-07-13', 0, '0000-00-00', 7),
(12, 5, 2, 4, 2, 1500, 2016, 'april', 1, '2016-07-13', 0, '0000-00-00', 7),
(13, 5, 2, 4, 2, 1500, 2016, 'may', 1, '2016-07-13', 0, '0000-00-00', 7),
(14, 4, 1, 2, 2, 500, 2016, 'august', 1, '2016-08-08', 0, '0000-00-00', 7),
(15, 4, 1, 2, 1, 500, 2016, 'august', 9, '2016-08-13', 0, '0000-00-00', 7);

-- --------------------------------------------------------

--
-- Table structure for table `payment_category`
--

CREATE TABLE `payment_category` (
  `PAYMENT_CAT_ID` int(11) NOT NULL,
  `CATEGORY_NAME` varchar(150) NOT NULL,
  `CATEGORY_DESCRIPTION` text NOT NULL,
  `CLASS_ID` int(11) NOT NULL,
  `AMOUNT` int(11) NOT NULL,
  `YEAR` int(11) NOT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `CREATED_DATE` date NOT NULL,
  `UPDATED_BY` int(11) NOT NULL,
  `UPDATED_DATE` date NOT NULL,
  `STATUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment_category`
--

INSERT INTO `payment_category` (`PAYMENT_CAT_ID`, `CATEGORY_NAME`, `CATEGORY_DESCRIPTION`, `CLASS_ID`, `AMOUNT`, `YEAR`, `CREATED_BY`, `CREATED_DATE`, `UPDATED_BY`, `UPDATED_DATE`, `STATUS`) VALUES
(1, 'Admission Fee', 'details about admission fee', 1, 5000, 2016, 1, '2016-06-12', 0, '0000-00-00', 7),
(2, 'Admission Fee', 'all about data', 2, 6500, 2016, 1, '2016-06-12', 0, '0000-00-00', 7),
(3, 'Admission Fee', 'all admission data', 3, 7000, 2016, 1, '2016-06-12', 0, '0000-00-00', 7),
(4, 'Monthly Fee', 'all about monthly fee', 1, 500, 2016, 1, '2016-06-12', 0, '0000-00-00', 7),
(5, 'Monthly Fee', 'Monthly fee data', 2, 600, 2016, 1, '2016-06-12', 0, '0000-00-00', 7),
(6, 'Monthly Fee', 'all about monthly fee', 3, 700, 2016, 1, '2016-06-12', 0, '0000-00-00', 7),
(7, 'Tuition fees', 'November', 2, 25000, 2016, 1, '2016-12-31', 0, '0000-00-00', 7),
(8, 'tiffin', 'student', 8, 40, 2016, 1, '2016-12-31', 0, '0000-00-00', 7);

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE `permission` (
  `PERMISSION_ID` int(11) NOT NULL,
  `PERMISSION_NAME` varchar(100) NOT NULL COMMENT 'example: create order, edit PI, Create User etc',
  `DETAILS` varchar(250) DEFAULT NULL,
  `GROUP_NAME` varchar(200) DEFAULT NULL,
  `MENU_NAME` varchar(50) NOT NULL,
  `ROUTE_NAME` varchar(100) NOT NULL,
  `PARENT_ID` int(11) NOT NULL,
  `STATUS` tinyint(4) NOT NULL COMMENT '1=Pending | 2=Approved | 3=Resolved | 4=Forwarded  | 5=Deployed  | 6=New  | 7=Active  | 8=Initiated  | 9=On Progress  | 10=Delivered  | -2=Declined | -3=Canceled | -5=Taking out | -6=Renewed/Replaced | -7=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `permission`
--

INSERT INTO `permission` (`PERMISSION_ID`, `PERMISSION_NAME`, `DETAILS`, `GROUP_NAME`, `MENU_NAME`, `ROUTE_NAME`, `PARENT_ID`, `STATUS`) VALUES
(5, 'create_category', NULL, 'control_website', 'create_category', 'create_category', 0, 1),
(6, 'manage_category', NULL, 'control_website', 'manage_category', 'manage_category', 0, 1),
(7, 'create_sub_category', NULL, 'control_website', 'create_sub_category', 'create_sub_category', 0, 1),
(8, 'manage_sub_category', NULL, 'control_website', 'manage_sub_category', 'manage_sub_category', 0, 1),
(11, 'create_slider', NULL, 'control_website', 'add_slider', 'create_slider', 0, 1),
(12, 'manage_slider', NULL, 'control_website', 'manage_slider', 'manage_slider', 0, 1),
(15, 'add_images', NULL, 'control_website', 'add_images', 'add_images', 0, 1),
(16, 'manage_gallery', NULL, 'control_website', 'manage_gallery', 'manage_gallery', 0, 1),
(19, 'add_downloads', NULL, 'control_website', 'add_downloads', 'add_downloads', 0, 1),
(20, 'manage_downloads', NULL, 'control_website', 'manage_downloads', 'manage_downloads', 0, 1),
(21, 'add_additional_data', NULL, 'control_website', 'add_additional_data', 'add_additional_data', 0, 1),
(22, 'manage_additional_data', NULL, 'control_website', 'manage_additional_data', 'manage_additional_data', 0, 1),
(25, 'add_person', NULL, 'control_website', 'add_person', 'add_person', 0, 1),
(26, 'manage_person', NULL, 'control_website', 'manage_person', 'manage_person', 0, 1),
(27, 'create_sub_sub_category', NULL, 'control_website', 'create_sub_sub_category', 'create_sub_sub_category', 0, 1),
(28, 'manage_sub_sub_category', NULL, 'control_website', 'manage_sub_sub_category', 'manage_sub_sub_category', 0, 1),
(29, 'create_page', NULL, 'control_website', 'create_page', 'create_page', 0, 1),
(30, 'manage_pages', NULL, 'control_website', 'manage_pages', 'manage_pages', 0, 1),
(31, 'manage_user_data', NULL, 'control_website', 'manage_user_data', 'manage_user_data', 0, 1),
(32, 'create_class', NULL, 'class', 'create_class', 'create_class', 0, 1),
(33, 'manage_class', NULL, 'class', 'manage_class', 'manage_class', 0, 1),
(34, 'create_section', NULL, 'class', 'create_section', 'create_section', 0, 1),
(35, 'manage_section', NULL, 'class', 'manage_section', 'manage_section', 0, 1),
(36, 'create_designation', NULL, 'settings', 'create_designation', 'create_designation', 0, 1),
(37, 'manage_designation', NULL, 'settings', 'manage_designation', 'manage_designation', 0, 1),
(38, 'create_notice', NULL, 'settings', 'create_notice', 'create_notice', 0, 1),
(39, 'manage_notice', NULL, 'settings', 'manage_notice', 'manage_notice', 0, 1),
(40, 'add_student_info', NULL, 'student', 'add_student_info', 'add_student_info', 0, 1),
(41, 'manage_student_info', NULL, 'student', 'manage_student_info', 'manage_student_info', 0, 1),
(42, 'admit_student', NULL, 'student', 'admit_student', 'admit_student', 0, 1),
(43, 'manage_student_admission', NULL, 'student', 'manage_student_admission', 'manage_student_admission', 0, 1),
(44, 'create_class_routine', NULL, 'class', 'create_class_routine', 'create_class_routine', 0, 1),
(45, 'manage_class_routine', NULL, 'class', 'manage_class_routine', 'manage_class_routine', 0, 1),
(46, 'create_subject', NULL, 'settings', 'create_subject', 'create_subject', 0, 1),
(47, 'manage_subject', NULL, 'settings', 'manage_subject', 'manage_subject', 0, 1),
(48, 'assign_subject', NULL, 'teacher', 'assign_subject', 'assign_subject', 0, 1),
(49, 'manage_assign_subject', NULL, 'teacher', 'manage_assign_subject', 'manage_assign_subject', 0, 1),
(50, 'assign_teacher', NULL, 'teacher', 'assign_class_teacher', 'assign_teacher', 0, 1),
(51, 'manage_assign_teacher', NULL, 'teacher', 'manage_class_teacher', 'manage_assign_teacher', 0, 1),
(52, 'create_teacher', NULL, 'teacher', 'create_teacher', 'create_teacher', 0, 1),
(53, 'manage_teacher', NULL, 'teacher', 'manage_teacher', 'manage_teacher', 0, 1),
(54, 'create_board', NULL, 'board_member', 'create_board_member', 'create_board', 0, 1),
(55, 'manage_board', NULL, 'board_member', 'manage_board_member', 'manage_board', 0, 1),
(56, 'create_parent', NULL, 'parent', 'create_parent', 'create_parent', 0, 1),
(57, 'manage_parent', NULL, 'parent', 'manage_parent', 'manage_parent', 0, 1),
(58, 'create_staff', NULL, 'staff', 'create_staff', 'create_staff', 0, 1),
(59, 'manage_staff', NULL, 'staff', 'manage_staff', 'manage_staff', 0, 1),
(60, 'create_exam', NULL, 'exam', 'create_exam', 'create_exam', 0, 1),
(61, 'manage_exam_list', NULL, 'exam', 'manage_exam_list', 'manage_exam_list', 0, 1),
(62, 'create_grade', NULL, 'exam', 'create_grade', 'create_grade', 0, 1),
(63, 'manage_grade', NULL, 'exam', 'manage_grade', 'manage_grade', 0, 1),
(64, 'insert_marks', NULL, 'exam', 'insert_marks', 'insert_marks', 0, 1),
(65, 'manage_marks', NULL, 'exam', 'manage_marks', 'manage_marks', 0, 1),
(66, 'create_payment', NULL, 'payment', 'create_payment', 'create_payment', 0, 0),
(67, 'manage_payment', NULL, 'payment', 'manage_payment', 'manage_payment', 0, 0),
(68, 'create_payment_category', NULL, 'payment', 'create_payment_category', 'create_payment_category', 0, 0),
(69, 'manage_payment_category', NULL, 'payment', 'manage_payment_category', 'manage_payment_category', 0, 0),
(70, 'payment_report', NULL, 'payment', 'payment_report', 'payment_report', 0, 0),
(71, 'daily_attendance', NULL, 'attendance', 'daily_attendance', 'daily_attendance', 0, 1),
(72, 'manage_attendance', NULL, 'attendance', 'manage_attendance', 'manage_attendance', 0, 1),
(73, 'student_marksheet', NULL, 'report', 'student_marksheet', 'student_marksheet', 0, 1),
(74, 'create_user', NULL, 'user', 'create_user', 'create_user', 0, 1),
(75, 'manage_user', NULL, 'user', 'manage_user', 'manage_user', 0, 1),
(76, 'create_role', NULL, 'user', 'create_role', 'create_role', 0, 1),
(77, 'manage_role', NULL, 'user', 'manage_role', 'manage_role', 0, 1),
(78, 'attendance_report', '', 'report', 'attendance_report', 'attendance_report', 0, 1),
(79, 'class_wise_marksheet', NULL, 'report', 'class_wise_marksheet', 'class_wise_marksheet', 0, 1),
(80, 'section_wise_marksheet', NULL, 'report', 'section_wise_marksheet', 'section_wise_marksheet', 0, 1),
(81, 'send_sms', NULL, 'sms', 'send_sms', 'send_sms', 0, 1),
(83, 'upload_csv_file', NULL, 'attendance', 'upload_csv_file', 'upload_csv_file', 0, 1),
(84, 'view_class_routine', NULL, 'student_panel', 'class_routine', 'view_class_routine', 0, 1),
(85, 'view_mark_sheet', NULL, 'student_panel', 'mark_sheet', 'view_mark_sheet', 0, 1),
(86, 'view_attendance', NULL, 'student_panel', 'attendance', 'view_attendance', 0, 1),
(87, 'view_notice', NULL, 'student_panel', 'notice', 'view_notice', 0, 1),
(88, 'create_student', NULL, 'user', 'create_student', 'create_student', 0, 1),
(89, 'create_teacher', NULL, 'user', 'create_teacher', 'create_teacher', 0, 1),
(90, 'view_teachers', NULL, 'student_panel', 'teachers', 'view_teachers', 0, 1),
(91, 'view_subjects', NULL, 'student_panel', 'subjects', 'view_subjects', 0, 1),
(92, 'view_payment', NULL, 'student_panel', 'payment', 'view_payment', 0, 1),
(93, 'create_parents', NULL, 'user', 'create_parents', 'create_parents', 0, 1),
(94, 'view_notice_parents', NULL, 'parents_panel', 'notice', 'view_notice_parents', 0, 1),
(95, 'view_class_routine_parents', NULL, 'parents_panel', 'class_routine', 'view_class_routine_parents', 0, 1),
(96, 'view_mark_sheet_parents', NULL, 'parents_panel', 'mark_sheet', 'view_mark_sheet_parents', 0, 1),
(97, 'view_subjects_parents', NULL, 'parents_panel', 'subjects', 'view_subjects_parents', 0, 1),
(98, 'view_teachers_parents', NULL, 'parents_panel', 'teachers', 'view_teachers_parents', 0, 1),
(99, 'view_payment_parents', NULL, 'parents_panel', 'payment', 'view_payment_parents', 0, 1),
(100, 'view_attendance_parents', NULL, 'parents_panel', 'attendance', 'view_attendance_parents', 0, 1),
(101, 'create_book_category', NULL, 'library', 'create_book_category', 'create_book_category', 0, 1),
(102, 'manage_book_category', NULL, 'library', 'manage_book_category', 'manage_book_category', 0, 1),
(103, 'create_writer', NULL, 'library', 'create_writer', 'create_writer', 0, 1),
(104, 'manage_writer', NULL, 'library', 'manage_writer', 'manage_writer', 0, 1),
(105, 'add_book', NULL, 'library', 'add_book', 'add_book', 0, 1),
(106, 'manage_book', NULL, 'library', 'manage_book', 'manage_book', 0, 1),
(107, 'Add_library_member', NULL, 'library', 'add_library_member', 'add_library_member', 0, 1),
(108, 'manage_library_member', NULL, 'library', 'manage_library_member', 'manage_library_member', 0, 1),
(109, 'general_settings', NULL, 'library', 'general_settings', 'general_settings', 0, 1),
(110, 'manage_settings', NULL, 'library', 'manage_settings', 'manage_settings', 0, 1),
(111, 'send_notification', NULL, 'library', 'send_notification', 'send_notification', 0, 1),
(112, 'manage_notification', NULL, 'library', 'manage_notification', 'manage_notification', 0, 1),
(113, 'book_issue', NULL, 'library', 'book_issue', 'book_issue', 0, 1),
(114, 'manage_issue_and_return', NULL, 'library', 'manage_issue_&_return', 'manage_issue_and_return', 0, 1),
(115, 'send_book_request', NULL, 'library', 'send_book_request', 'send_book_request', 0, 1),
(116, 'manage_book_request', NULL, 'library', 'manage_book_request', 'manage_book_request', 0, 1),
(117, 'my_notifications', NULL, 'library', 'my_notifications', 'my_notifications', 0, 1),
(118, 'my_book_request', NULL, 'library', 'my_book_request', 'my_book_request', 0, 1),
(119, 'view_library_books', NULL, 'library', 'view_library_books', 'view_library_books', 0, 1),
(120, 'my_issues_and_returns', NULL, 'library', 'my_issues_and_returns', 'my_issues_and_returns', 0, 1),
(121, 'create_testimonial', NULL, 'certificates', 'create_testimonial', 'create_testimonial', 0, 1),
(123, 'create_transfer_certificate', NULL, 'certificates', 'create_transfer_certificate', 'create_transfer_certificate', 0, 1),
(125, 'student_report_card', NULL, 'certificates', 'student_report_card', 'student_report_card', 0, 1),
(126, 'student_mark_sheet', NULL, 'certificates', 'student_mark_sheet', 'student_mark_sheet', 0, 1),
(127, 'average_marksheet', NULL, 'report', 'average_marksheet', 'average_marksheet', 0, 1),
(128, 'add_house', '', 'hostel', 'add_house', 'add_house', 0, 1),
(129, 'manage_house', NULL, 'hostel', 'manage_house', 'manage_house', 0, 1),
(130, 'assign_house_teacher', NULL, 'hostel', 'assign_house_teacher', 'assign_house_teacher', 0, 1),
(131, 'manage_house_teacher', NULL, 'hostel', 'manage_house_teacher', 'manage_house_teacher', 0, 1),
(132, 'admit_student_to_hostel', NULL, 'hostel', 'admit_student_to_hostel', 'admit_student_to_hostel', 0, 1),
(133, 'manage_hostel_student', NULL, 'hostel', 'manage_hostel_student', 'manage_hostel_student', 0, 1),
(134, 'student_checkin', NULL, 'hostel', 'student_checkin_/_checkout', 'student_checkin', 0, 1),
(135, 'manage_checkin', NULL, 'hostel', 'manage_student_checkin_/_checkout', 'manage_checkin', 0, 1),
(136, 'salary_settings', NULL, 'payroll', 'salary_settings', 'salary_settings', 0, 1),
(137, 'manage_salary_settings', NULL, 'payroll', 'manage_salary_settings', 'manage_salary_settings', 0, 1),
(138, 'monthly_salary', NULL, 'payroll', 'monthly_salary', 'monthly_salary', 0, 1),
(139, 'manage_salary', NULL, 'payroll', 'manage_salary', 'manage_salary', 0, 1),
(140, 'salary_report', NULL, 'payroll', 'salary_report', 'salary_report', 0, 1),
(141, 'download_csv_file', NULL, 'attendance', 'download_csv_file', 'download_csv_file', 0, 1),
(142, 'leave_settings', NULL, 'payroll', 'leave_settings', 'leave_settings', 0, 1),
(143, 'manage_leave_settings', NULL, 'payroll', 'manage_leave_settings', 'manage_leave_settings', 0, 1),
(144, 'add_leave', NULL, 'payroll', 'add_leave', 'add_leave', 0, 1),
(145, 'manage_leave', NULL, 'payroll', 'manage_leave', 'manage_leave', 0, 1),
(146, 'leave_report', NULL, 'payroll', 'leave_report', 'leave_report', 0, 1),
(147, 'create_event', NULL, 'settings', 'create_event', 'create_event', 0, 1),
(148, 'manage_event', NULL, 'settings', 'manage_event', 'manage_event', 0, 1),
(149, 'view_events', NULL, 'settings', 'view_events', 'view_events', 0, 1),
(150, 'add_cultural_activities', NULL, 'control_website', 'add_cultural_activities', 'add_cultural_activities', 0, 1),
(151, 'manage_cultural_activities', NULL, 'control_website', 'manage_cultural_activities', 'manage_cultural_activities', 0, 1),
(152, 'add_achievement', NULL, 'control_website', 'add_achievement', 'add_achievement', 0, 1),
(153, 'manage_achievement', NULL, 'control_website', 'manage_achievement', 'manage_achievement', 0, 1),
(154, 'add_videos', NULL, 'control_website', 'add_videos', 'add_videos', 0, 1),
(155, 'manage_videos', NULL, 'control_website', 'manage_videos', 'manage_videos', 0, 1),
(156, 'assign_student_subject', NULL, 'student', 'assign_student_subject', 'assign_student_subject', 0, 1),
(157, 'manage_student_subjects', NULL, 'student', 'manage_student_subjects', 'manage_student_subjects', 0, 1),
(158, 'progress_report', NULL, 'report', 'progress_report', 'progress_report', 0, 1),
(159, 'print_sit_planning', NULL, 'student', 'print_sit_planning', 'print_sit_planning', 0, 1),
(160, 'admit_card', NULL, 'certificates', 'admit_card', 'admit_card', 0, 1),
(161, 'online_request', NULL, 'student', 'online_applications', 'online_request', 0, 1),
(162, 'ie_category', NULL, 'accounts', 'create_expense_category', 'ie_category', 0, 0),
(163, 'manage_ie_category', NULL, 'accounts', 'income_expense_data', 'manage_ie_category', 0, 1),
(164, 'create_admission_payment', NULL, 'accounts', 'create_admission_payment', 'create_admission_payment', 0, 0),
(165, 'manage_admission_payment', NULL, 'accounts', 'admission_payment', 'manage_admission_payment', 0, 1),
(166, 'create_monthly_payment', NULL, 'accounts', 'create_monthly_payment', 'create_monthly_payment', 0, 0),
(167, 'manage_monthly_payment', NULL, 'accounts', 'monthly_payment', 'manage_monthly_payment', 0, 1),
(168, 'create_category_list', NULL, 'accounts', 'create_category_list', 'create_category_list', 0, 0),
(169, 'category_list', '', 'accounts', 'category_list', 'category_list', 0, 1),
(170, 'admission_payment_report', NULL, 'accounts', 'admission_payment_report', 'admission_payment_report', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `persons`
--

CREATE TABLE `persons` (
  `PERSON_ID` int(11) NOT NULL,
  `PERSON_TYPE` varchar(50) NOT NULL,
  `NAME` text NOT NULL,
  `IMAGES` varchar(200) NOT NULL,
  `DETAILS` text NOT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `CREATED_DATE` date NOT NULL,
  `UPDATED_BY` int(11) NOT NULL,
  `UPDATED_DATE` date NOT NULL,
  `STATUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `persons`
--

INSERT INTO `persons` (`PERSON_ID`, `PERSON_TYPE`, `NAME`, `IMAGES`, `DETAILS`, `CREATED_BY`, `CREATED_DATE`, `UPDATED_BY`, `UPDATED_DATE`, `STATUS`) VALUES
(1, 'Message from Head Master', 'জনাব একে.এম মনিরুজ্জামান', '', 'কুমিল্লাইউসুফ হাই স্কুল একটি ঐতিহ্যবাহী শিক্ষা প্রতিষ্ঠান। পশ্চিমগাঁ নিবাসী জনাব আলী নওয়াব চৌধুরী ১৮৭৯ সালে তাঁর পিতার নামানুসারে এই বিদ্যালয়টি প্রতিষ্ঠা করেন। অত্র বিদ্যালয়ের হাজার হাজার ছাত্র দেশে ও বিদেশে জাতির কল্যাণমূলক কাজে নিয়োজিত। তাছাড়া শিক্ষাবিদ, সাহিত্যিক, শিল্পী, রাজনীতিবিদ, অফিস ও প্রশাসনিক পদে অত্র বিদ্যালয়ের অনেক ছাত্র প্রতিষ্ঠিত রয়েছেন। ১৯৭৫ সালে অত্র বিদ্যালয়ের ছাত্র মোঃ ইসরাফিল এস.এস.সি পরীক্ষায় কুমিল্লা বোর্ডে মেধা তালিকায় প্রথম স্থান অধিকার করেন।\nকুমিল্লা ইউসুফ হাই স্কুল নিঃসন্দেহে একটি আদর্শ শিক্ষা প্রতিষ্ঠান যার পরিচয় মিলে বিভিন্ন সময়ে বিভিন্ন খ্যাতিমান ব্যক্তিদের মন্তব্যের মাধ্যমে। তৎকালীন অবিভক্ত বাংলার প্রধানমন্ত্রী শের-এ-বাংলা এ.কে ফজলুল হক, বাংলার গর্ভনর জে.বি ফুলার এবং কলকাতা বিশ্ববিদ্যালয়ের উপাচার্য আশুতোষ-মূখার্জি এই বিদ্যালয়টি পরিদর্শন করে উচ্চ প্রশংসা করেন।\nএ বিদ্যালয়টি ১.৬৯ একর জমির উপর প্রতিষ্ঠিত। উত্তর দিকে রয়েছে একটি সুবিশাল দোতলা দালান যেখানে শ্রেণি কার্যক্রম পরিচালিত হয়। পশ্চিমের একতলা দালানে রয়েছে প্রশস্থ নামাজ কক্ষ ও বিজ্ঞানাগার। দক্ষিণ দিকে শ্রেণি কার্যক্রমের জন্য একতলা দালান রয়েছে।\nদোতলা বিশিষ্ট বিশাল হোস্টেল, ডান দিকে রয়েছে দোতলা প্রশাসনিক ভবন যেটি তত্ত্ববধায়ক সরকারের মন্ত্রীপরিষদ সচিব জনাব আলী ইমাম মজুমদারের প্রচেষ্টায় নির্মিত হয়, যিনি অত্র বিদ্যালয়ের মেধাবী ছাত্র ছিলেন। প্রশাসনিক ভবনে উপর তলায় রয়েছে সুসজ্জিত কম্পিউটার ল্যাবরেটরী ও গ্রন্থাগার, কম্পিউটার ল্যাবরেটরীতে শিক্ষার্থীরা নিয়মিত কম্পিউটার ব্যবহার করতে পারে এবং বিদ্যালয়ে সুবিশাল খেলার মাঠে রয়েছে যেখানে শিক্ষার্থীরা নিয়মিত খেলাধুলার করতে পারে।', 1, '2016-05-21', 1, '2016-12-23', 7);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `ROLE_ID` int(11) NOT NULL,
  `ROLE_NAME` varchar(100) NOT NULL,
  `DETAILS` varchar(255) DEFAULT NULL,
  `PERMISSION_NAME` text NOT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `CREATED_DATE` datetime NOT NULL,
  `UPDATED_BY` int(11) DEFAULT NULL,
  `UPDATED_DATE` datetime DEFAULT NULL,
  `STATUS` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`ROLE_ID`, `ROLE_NAME`, `DETAILS`, `PERMISSION_NAME`, `CREATED_BY`, `CREATED_DATE`, `UPDATED_BY`, `UPDATED_DATE`, `STATUS`) VALUES
(1, 'Super Admin', NULL, '', 0, '2015-10-03 17:01:53', 1, '2016-06-21 02:51:14', 7),
(2, 'Additional USer', NULL, 'add_additional_data,manage_additional_data,manage_user_data', 1, '2016-06-21 02:46:46', 1, '2016-06-21 02:51:12', 7),
(3, 'Website Controller', NULL, 'add_additional_data,add_downloads,add_images,add_person,create_category,create_page,create_slider,create_sub_category,create_sub_sub_category,manage_additional_data,manage_category,manage_downloads,manage_gallery,manage_pages,manage_person,manage_slider,manage_sub_category,manage_sub_sub_category,manage_user_data', 1, '2016-06-22 05:58:22', NULL, NULL, 7),
(4, 'Student', NULL, 'my_book_request,my_issues_and_returns,my_notifications,send_book_request,view_library_books,view_attendance,view_class_routine,view_mark_sheet,view_notice,view_payment,view_subjects,view_teachers', 1, '2016-07-12 05:07:39', 1, '2016-07-28 05:30:28', 7),
(5, 'Teacher', NULL, 'daily_attendance,manage_attendance,create_class_routine,manage_class_routine,insert_marks,manage_marks,attendance_report,class_wise_marksheet,section_wise_marksheet,student_marksheet,send_sms,manage_assign_subject,manage_assign_teacher,manage_teacher', 1, '2016-07-13 05:11:11', NULL, NULL, 7),
(6, 'Parents', NULL, 'view_attendance_parents,view_class_routine_parents,view_mark_sheet_parents,view_notice_parents,view_payment_parents,view_subjects_parents,view_teachers_parents', 1, '2016-07-13 06:16:23', 1, '2016-07-13 06:51:14', 7),
(7, 'Admin', NULL, 'daily_attendance,manage_attendance,upload_csv_file,create_board,manage_board,create_testimonial,create_transfer_certificate,student_mark_sheet,student_report_card,create_class,create_class_routine,create_section,manage_class,manage_class_routine,manage_section,add_additional_data,add_downloads,add_images,add_person,create_category,create_page,create_slider,create_sub_category,create_sub_sub_category,manage_additional_data,manage_category,manage_downloads,manage_gallery,manage_pages,manage_person,manage_slider,manage_sub_category,manage_sub_sub_category,manage_user_data,create_exam,create_grade,insert_marks,manage_exam_list,manage_grade,manage_marks,add_house,admit_student_to_hostel,assign_house_teacher,manage_checkin,manage_hostel_student,manage_house,manage_house_teacher,student_checkin,add_book,Add_library_member,book_issue,create_book_category,create_writer,general_settings,manage_book,manage_book_category,manage_book_request,manage_issue_and_return,manage_library_member,manage_notification,manage_settings,manage_writer,send_notification,create_parent,manage_parent,create_payment,create_payment_category,manage_payment,manage_payment_category,attendance_report,average_marksheet,class_wise_marksheet,payment_report,section_wise_marksheet,student_marksheet,create_designation,create_notice,create_subject,manage_designation,manage_notice,manage_subject,send_sms,create_staff,manage_staff,add_student_info,admit_student,manage_student_admission,manage_student_info,assign_subject,assign_teacher,create_teacher,manage_assign_subject,manage_assign_teacher,manage_teacher,create_parents,create_role,create_student,create_teacher,create_user,manage_role,manage_user', 1, '2016-07-14 05:24:24', 1, '2016-08-14 08:02:23', 7);

-- --------------------------------------------------------

--
-- Table structure for table `salary_settings`
--

CREATE TABLE `salary_settings` (
  `SALARY_ID` int(11) NOT NULL,
  `TEACHER_ID` int(11) NOT NULL,
  `SALARY` int(11) NOT NULL,
  `YEAR` year(4) NOT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `CREATED_DATE` date NOT NULL,
  `UPDATED_BY` int(11) NOT NULL,
  `UPDATED_DATE` date NOT NULL,
  `STATUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `salary_settings`
--

INSERT INTO `salary_settings` (`SALARY_ID`, `TEACHER_ID`, `SALARY`, `YEAR`, `CREATED_BY`, `CREATED_DATE`, `UPDATED_BY`, `UPDATED_DATE`, `STATUS`) VALUES
(1, 3, 10000, 2016, 1, '2016-08-17', 1, '2016-08-17', 7),
(2, 1, 14500, 2016, 1, '2016-08-17', 1, '2016-08-17', 7),
(3, 4, 12000, 2016, 1, '2016-08-17', 1, '2016-08-17', 7),
(4, 2, 8000, 2016, 1, '2016-08-17', 1, '2016-08-17', 7),
(5, 1, 15000, 2015, 1, '2017-08-17', 0, '0000-00-00', 7),
(6, 3, 12000, 2015, 1, '2017-08-17', 0, '0000-00-00', 7);

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `SECTION_ID` int(11) NOT NULL,
  `CLASS_ID` int(11) NOT NULL,
  `SECTION_NAME` longtext NOT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `CREATED_DATE` date NOT NULL,
  `UPDATED_BY` int(11) NOT NULL,
  `UPDATED_DATE` date NOT NULL,
  `STATUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`SECTION_ID`, `CLASS_ID`, `SECTION_NAME`, `CREATED_BY`, `CREATED_DATE`, `UPDATED_BY`, `UPDATED_DATE`, `STATUS`) VALUES
(1, 1, 'A', 1, '2017-01-22', 0, '0000-00-00', 7),
(2, 1, 'B', 1, '2017-01-22', 0, '0000-00-00', 7),
(3, 1, 'C', 1, '2017-01-22', 0, '0000-00-00', 7),
(4, 2, 'A', 1, '2017-01-22', 0, '0000-00-00', 7),
(5, 2, 'B', 1, '2017-01-22', 0, '0000-00-00', 7),
(6, 2, 'C', 1, '2017-01-22', 0, '0000-00-00', 7),
(7, 3, 'A', 1, '2017-01-22', 0, '0000-00-00', 7),
(8, 3, 'B', 1, '2017-01-22', 0, '0000-00-00', 7),
(9, 3, 'C', 1, '2017-01-22', 0, '0000-00-00', 7),
(10, 4, 'A', 1, '2017-01-22', 0, '0000-00-00', 7),
(11, 4, 'B', 1, '2017-01-22', 0, '0000-00-00', 7),
(12, 4, 'C', 1, '2017-01-22', 0, '0000-00-00', 7),
(13, 5, 'A', 1, '2017-01-22', 0, '0000-00-00', 7),
(14, 5, 'B', 1, '2017-01-22', 0, '0000-00-00', 7),
(15, 5, 'C', 1, '2017-01-22', 0, '0000-00-00', 7);

-- --------------------------------------------------------

--
-- Table structure for table `send_notification`
--

CREATE TABLE `send_notification` (
  `NOTIFICATION_ID` int(11) NOT NULL,
  `LIBRARY_MEMBER_ID` int(11) NOT NULL,
  `SUBJECT` varchar(250) NOT NULL,
  `MESSAGE` text NOT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `CREATED_DATE` date NOT NULL,
  `UPDATED_BY` int(11) NOT NULL,
  `UPDATED_DATE` date NOT NULL,
  `STATUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `send_notification`
--

INSERT INTO `send_notification` (`NOTIFICATION_ID`, `LIBRARY_MEMBER_ID`, `SUBJECT`, `MESSAGE`, `CREATED_BY`, `CREATED_DATE`, `UPDATED_BY`, `UPDATED_DATE`, `STATUS`) VALUES
(1, 2, 'Test', 'Hello, Nusrat Fariha', 1, '2016-07-27', 0, '0000-00-00', 7),
(2, 3, 'Return Book', 'Hi Rony.', 1, '2016-07-28', 0, '0000-00-00', 7),
(3, 8, 'Please return the previuous books', 'Dear Nayim,\r\nPlease return our previous book. You picked it from us at 2016-07-03 and your date expired at 2016-07-15. So please return this book otherwise I will complain to your parents &amp; class teacher.', 1, '2016-07-28', 0, '0000-00-00', 7);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `SLIDER_ID` int(11) NOT NULL,
  `SLIDER_NAME` varchar(50) NOT NULL,
  `SLIDER_LINK` varchar(200) NOT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `CREATED_DATE` date NOT NULL,
  `UPDATED_BY` int(11) NOT NULL,
  `UPDATED_DATE` date NOT NULL,
  `STATUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`SLIDER_ID`, `SLIDER_NAME`, `SLIDER_LINK`, `CREATED_BY`, `CREATED_DATE`, `UPDATED_BY`, `UPDATED_DATE`, `STATUS`) VALUES
(1, 'slider 1', 'slide2.jpg', 1, '2016-09-01', 0, '0000-00-00', 7),
(2, 'slider 2', 'slide1.jpg', 1, '2016-09-01', 0, '0000-00-00', 7),
(3, 'slider 3', 'slide3.jpg', 1, '2016-09-01', 0, '0000-00-00', 7);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `STAFF_ID` int(11) NOT NULL,
  `STAFF_CARD_NO` varchar(20) NOT NULL,
  `STAFF_NAME` varchar(250) NOT NULL,
  `STAFF_BIRTHDAY` date NOT NULL,
  `DESIGNATION_ID` int(11) NOT NULL,
  `ADDRESS` text NOT NULL,
  `SEX` varchar(15) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `PHONE` varchar(50) NOT NULL,
  `IMAGES` varchar(50) NOT NULL,
  `PASSWORD` varchar(50) NOT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `CREATED_DATE` date NOT NULL,
  `UPDATED_BY` int(11) NOT NULL,
  `UPDATED_DATE` date NOT NULL,
  `STATUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`STAFF_ID`, `STAFF_CARD_NO`, `STAFF_NAME`, `STAFF_BIRTHDAY`, `DESIGNATION_ID`, `ADDRESS`, `SEX`, `EMAIL`, `PHONE`, `IMAGES`, `PASSWORD`, `CREATED_BY`, `CREATED_DATE`, `UPDATED_BY`, `UPDATED_DATE`, `STATUS`) VALUES
(3, '1234589', 'Anisur Rohman', '1990-07-01', 5, 'Dhaka, Bangladesh', 'Male', 'anisur@gmail.com', '017487548', '', '1234', 1, '2016-06-04', 1, '2016-07-20', 7),
(4, '7587589', 'Asadur Rohman', '1990-07-01', 6, 'Dhaka, Bangladesh', 'Male', 'asadur@gmail.com', '017458844', '', '1234', 1, '2016-06-05', 1, '2016-07-20', 7),
(5, '457454', 'Obaidul Islam', '1994-06-01', 5, 'Dhaka, Bangladesh', 'Male', 'obaidur@gmail.com', '01744724905', '', '123', 1, '2016-06-05', 1, '2016-07-20', 7),
(6, '45785', 'Rayhan Islam', '1990-07-01', 5, 'Dhaka, Bangldesh', 'Male', 'rayhan@gmail.com', '0174784757', 'Ploch-WiSys-Staff.jpg', '1234', 1, '2016-07-21', 0, '0000-00-00', 7);

-- --------------------------------------------------------

--
-- Table structure for table `student_data`
--

CREATE TABLE `student_data` (
  `STUDENT_DATA_ID` int(11) NOT NULL,
  `STUDENT_ID` int(11) NOT NULL,
  `PUBLIC_ID` int(11) NOT NULL,
  `YEAR` int(11) NOT NULL,
  `CLASS_ID` int(11) NOT NULL,
  `SECTION_ID` int(11) NOT NULL,
  `ROLL_NO` int(11) NOT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `CREATED_DATE` date NOT NULL,
  `UPDATED_BY` int(11) NOT NULL,
  `UPDATED_DATE` date NOT NULL,
  `STATUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_data`
--

INSERT INTO `student_data` (`STUDENT_DATA_ID`, `STUDENT_ID`, `PUBLIC_ID`, `YEAR`, `CLASS_ID`, `SECTION_ID`, `ROLL_NO`, `CREATED_BY`, `CREATED_DATE`, `UPDATED_BY`, `UPDATED_DATE`, `STATUS`) VALUES
(1, 1, 201642114, 2016, 11, 42, 114, 1, '2016-11-20', 0, '0000-00-00', 7),
(2, 3, 201642119, 2016, 11, 42, 119, 1, '2016-11-20', 0, '0000-00-00', 7),
(3, 4, 201642106, 2016, 11, 42, 106, 1, '2016-11-20', 0, '0000-00-00', 7),
(4, 5, 201642080, 2016, 11, 42, 80, 1, '2016-11-20', 0, '0000-00-00', 7),
(5, 6, 201642051, 2016, 11, 42, 51, 1, '2016-11-20', 0, '0000-00-00', 7),
(6, 7, 201642065, 2016, 11, 42, 65, 1, '2016-11-20', 0, '0000-00-00', 7),
(7, 8, 201642123, 2016, 11, 42, 123, 1, '2016-11-20', 0, '0000-00-00', 7),
(8, 9, 201642052, 2016, 11, 42, 52, 1, '2016-11-20', 0, '0000-00-00', 7),
(9, 10, 201642047, 2016, 11, 42, 47, 1, '2016-11-20', 0, '0000-00-00', 7),
(10, 11, 201642050, 2016, 11, 42, 50, 1, '2016-11-20', 1, '2017-01-05', -7),
(11, 12, 201642064, 2016, 11, 42, 64, 1, '2016-11-20', 0, '0000-00-00', 7),
(12, 13, 201642040, 2016, 11, 42, 40, 1, '2016-11-20', 0, '0000-00-00', 7),
(13, 14, 201642043, 2016, 11, 42, 43, 1, '2016-11-20', 0, '0000-00-00', 7),
(14, 15, 201642035, 2016, 11, 42, 35, 1, '2016-11-20', 0, '0000-00-00', 7),
(15, 16, 201642085, 2016, 11, 42, 85, 1, '2016-11-20', 0, '0000-00-00', 7),
(16, 17, 201642126, 2016, 11, 42, 126, 1, '2016-11-20', 0, '0000-00-00', 7),
(17, 19, 201642105, 2016, 11, 42, 105, 1, '2016-11-20', 0, '0000-00-00', 7),
(18, 18, 201642099, 2016, 11, 42, 99, 1, '2016-11-20', 0, '0000-00-00', 7),
(19, 20, 201642141, 2016, 11, 42, 141, 1, '2016-11-20', 0, '0000-00-00', 7),
(20, 21, 201642038, 2016, 11, 42, 38, 1, '2016-11-20', 0, '0000-00-00', 7),
(21, 22, 201609004, 2016, 3, 9, 4, 1, '2016-11-20', 0, '0000-00-00', 7),
(22, 23, 201609003, 2016, 3, 9, 3, 1, '2016-11-20', 0, '0000-00-00', 7),
(23, 24, 201609002, 2016, 3, 9, 2, 1, '2016-11-20', 0, '0000-00-00', 7),
(24, 25, 201609013, 2016, 3, 9, 13, 1, '2016-11-20', 0, '0000-00-00', 7),
(25, 26, 201609006, 2016, 3, 9, 6, 1, '2016-11-20', 0, '0000-00-00', 7),
(26, 27, 201609012, 2016, 3, 9, 12, 1, '2016-11-20', 0, '0000-00-00', 7),
(27, 28, 201609001, 2016, 3, 9, 1, 1, '2016-11-20', 0, '0000-00-00', 7),
(28, 29, 201609015, 2016, 3, 9, 15, 1, '2016-11-21', 0, '0000-00-00', 7),
(29, 30, 201609008, 2016, 3, 9, 8, 1, '2016-11-21', 0, '0000-00-00', 7),
(30, 31, 201609014, 2016, 3, 9, 14, 1, '2016-11-21', 0, '0000-00-00', 7),
(31, 32, 201609010, 2016, 3, 9, 10, 1, '2016-11-21', 0, '0000-00-00', 7),
(32, 33, 201609016, 2016, 3, 9, 16, 1, '2016-11-21', 0, '0000-00-00', 7),
(33, 34, 201609011, 2016, 3, 9, 11, 1, '2016-11-21', 0, '0000-00-00', 7),
(34, 35, 201609005, 2016, 3, 9, 5, 1, '2016-11-21', 0, '0000-00-00', 7),
(35, 36, 201609017, 2016, 3, 9, 17, 1, '2016-11-21', 0, '0000-00-00', 7),
(36, 38, 201609001, 2016, 4, 9, 1, 1, '2016-11-21', 0, '0000-00-00', 7),
(37, 39, 201613002, 2016, 4, 13, 2, 1, '2016-11-21', 0, '0000-00-00', 7),
(38, 41, 201613004, 2016, 4, 13, 4, 1, '2016-11-21', 0, '0000-00-00', 7),
(39, 42, 201613005, 2016, 4, 13, 5, 1, '2016-11-21', 0, '0000-00-00', 7),
(40, 43, 201613006, 2016, 4, 13, 6, 1, '2016-11-21', 0, '0000-00-00', 7),
(41, 44, 201613007, 2016, 4, 13, 7, 1, '2016-11-21', 1, '2016-11-22', 7),
(42, 45, 201613008, 2016, 4, 13, 8, 1, '2016-11-21', 0, '0000-00-00', 7),
(43, 46, 201613009, 2016, 4, 13, 9, 1, '2016-11-21', 1, '2016-11-21', 7),
(44, 47, 201613010, 2016, 4, 13, 10, 1, '2016-11-21', 0, '0000-00-00', 7),
(45, 48, 201613012, 2016, 4, 13, 12, 1, '2016-11-21', 0, '0000-00-00', 7),
(46, 49, 201613013, 2016, 4, 13, 13, 1, '2016-11-21', 0, '0000-00-00', 7),
(47, 50, 201613011, 2016, 4, 13, 11, 1, '2016-11-21', 0, '0000-00-00', 7),
(48, 51, 201613015, 2016, 4, 13, 15, 1, '2016-11-21', 0, '0000-00-00', 7),
(49, 52, 201613016, 2016, 4, 13, 16, 1, '2016-11-21', 0, '0000-00-00', 7),
(50, 53, 201613017, 2016, 4, 13, 17, 1, '2016-11-21', 0, '0000-00-00', 7),
(51, 54, 201613018, 2016, 4, 13, 18, 1, '2016-11-21', 0, '0000-00-00', 7),
(52, 55, 201613020, 2016, 4, 13, 20, 1, '2016-11-21', 0, '0000-00-00', 7),
(53, 56, 201613022, 2016, 4, 13, 22, 1, '2016-11-21', 0, '0000-00-00', 7),
(54, 57, 201613023, 2016, 4, 13, 23, 1, '2016-11-21', 0, '0000-00-00', 7),
(55, 58, 201613024, 2016, 4, 13, 24, 1, '2016-11-21', 0, '0000-00-00', 7),
(56, 59, 201613025, 2016, 4, 13, 25, 1, '2016-11-21', 0, '0000-00-00', 7),
(57, 60, 201613026, 2016, 4, 13, 26, 1, '2016-11-21', 0, '0000-00-00', 7),
(58, 61, 201621001, 2016, 6, 21, 1, 1, '2016-11-21', 0, '0000-00-00', 7),
(59, 62, 201621002, 2016, 6, 21, 2, 1, '2016-11-21', 0, '0000-00-00', 7),
(60, 63, 201621003, 2016, 6, 21, 3, 1, '2016-11-21', 0, '0000-00-00', 7),
(61, 64, 201621005, 2016, 6, 21, 5, 1, '2016-11-21', 0, '0000-00-00', 7),
(62, 65, 201621006, 2016, 6, 21, 6, 1, '2016-11-21', 0, '0000-00-00', 7),
(63, 66, 201621008, 2016, 6, 21, 8, 1, '2016-11-21', 0, '0000-00-00', 7),
(64, 67, 201621010, 2016, 6, 21, 10, 1, '2016-11-21', 0, '0000-00-00', 7),
(65, 68, 201621011, 2016, 6, 21, 11, 1, '2016-11-21', 0, '0000-00-00', 7),
(66, 69, 201621012, 2016, 6, 21, 12, 1, '2016-11-22', 0, '0000-00-00', 7),
(67, 70, 201621013, 2016, 6, 21, 13, 1, '2016-11-22', 0, '0000-00-00', 7),
(68, 71, 201621014, 2016, 6, 21, 14, 1, '2016-11-22', 0, '0000-00-00', 7),
(69, 72, 201621015, 2016, 6, 21, 15, 1, '2016-11-22', 0, '0000-00-00', 7),
(70, 73, 201621016, 2016, 6, 21, 16, 1, '2016-11-22', 0, '0000-00-00', 7),
(71, 74, 201621017, 2016, 6, 21, 17, 1, '2016-11-22', 1, '2016-11-22', 7),
(72, 75, 201621018, 2016, 6, 21, 18, 1, '2016-11-22', 0, '0000-00-00', 7),
(73, 76, 201621019, 2016, 6, 21, 19, 1, '2016-11-22', 0, '0000-00-00', 7),
(74, 77, 201621020, 2016, 6, 21, 20, 1, '2016-11-22', 0, '0000-00-00', 7),
(75, 78, 201621021, 2016, 6, 21, 21, 1, '2016-11-22', 0, '0000-00-00', 7),
(76, 79, 201617022, 2016, 6, 17, 22, 1, '2016-11-22', 0, '0000-00-00', 7),
(77, 80, 201621023, 2016, 6, 21, 23, 1, '2016-11-22', 0, '0000-00-00', 7),
(78, 81, 201621024, 2016, 6, 21, 24, 1, '2016-11-22', 0, '0000-00-00', 7),
(79, 82, 201621027, 2016, 6, 21, 27, 1, '2016-11-22', 0, '0000-00-00', 7),
(80, 83, 201621027, 2016, 6, 21, 27, 1, '2016-11-22', 0, '0000-00-00', 7),
(81, 84, 201621029, 2016, 6, 21, 29, 1, '2016-11-22', 0, '0000-00-00', 7),
(82, 85, 201617030, 2016, 6, 17, 30, 1, '2016-11-22', 0, '0000-00-00', 7),
(83, 86, 201621031, 2016, 6, 21, 31, 1, '2016-11-22', 0, '0000-00-00', 7),
(84, 87, 201621032, 2016, 6, 21, 32, 1, '2016-11-22', 0, '0000-00-00', 7),
(85, 88, 201621033, 2016, 6, 21, 33, 1, '2016-11-22', 0, '0000-00-00', 7),
(86, 89, 201621034, 2016, 6, 21, 34, 1, '2016-11-22', 0, '0000-00-00', 7),
(87, 90, 201621035, 2016, 6, 21, 35, 1, '2016-11-22', 0, '0000-00-00', 7),
(88, 91, 201621036, 2016, 6, 21, 36, 1, '2016-11-22', 0, '0000-00-00', 7),
(89, 92, 201621038, 2016, 6, 21, 38, 1, '2016-11-22', 0, '0000-00-00', 7),
(90, 93, 201621039, 2016, 6, 21, 39, 1, '2016-11-22', 0, '0000-00-00', 7),
(91, 94, 201621040, 2016, 6, 21, 40, 1, '2016-11-22', 0, '0000-00-00', 7),
(92, 95, 201621041, 2016, 6, 21, 41, 1, '2016-11-22', 0, '0000-00-00', 7),
(93, 96, 201621042, 2016, 6, 21, 42, 1, '2016-11-22', 0, '0000-00-00', 7),
(94, 97, 201621045, 2016, 6, 21, 45, 1, '2016-11-22', 0, '0000-00-00', 7),
(95, 98, 201625035, 2016, 7, 25, 35, 1, '2016-11-22', 0, '0000-00-00', 7),
(96, 99, 201625001, 2016, 7, 25, 1, 1, '2016-11-22', 0, '0000-00-00', 7),
(97, 100, 201625002, 2016, 7, 25, 2, 1, '2016-11-22', 0, '0000-00-00', 7),
(98, 101, 201625003, 2016, 7, 25, 3, 1, '2016-11-22', 0, '0000-00-00', 7),
(99, 102, 201625004, 2016, 7, 25, 4, 1, '2016-11-22', 0, '0000-00-00', 7),
(100, 103, 201625005, 2016, 7, 25, 5, 1, '2016-11-22', 0, '0000-00-00', 7),
(101, 104, 201625006, 2016, 7, 25, 6, 1, '2016-11-22', 0, '0000-00-00', 7),
(102, 105, 201625007, 2016, 7, 25, 7, 1, '2016-11-22', 0, '0000-00-00', 7),
(103, 106, 201625008, 2016, 7, 25, 8, 1, '2016-11-22', 0, '0000-00-00', 7),
(104, 107, 201625009, 2016, 7, 25, 9, 1, '2016-11-22', 0, '0000-00-00', 7),
(105, 108, 201625010, 2016, 7, 25, 10, 1, '2016-11-22', 0, '0000-00-00', 7),
(106, 109, 201625011, 2016, 7, 25, 11, 1, '2016-11-22', 0, '0000-00-00', 7),
(107, 110, 201625012, 2016, 7, 25, 12, 1, '2016-11-22', 0, '0000-00-00', 7),
(108, 111, 201621013, 2016, 7, 21, 13, 1, '2016-11-22', 0, '0000-00-00', 7),
(109, 112, 201625015, 2016, 7, 25, 15, 1, '2016-11-22', 0, '0000-00-00', 7),
(110, 113, 201625016, 2016, 7, 25, 16, 1, '2016-11-22', 0, '0000-00-00', 7),
(111, 114, 201625017, 2016, 7, 25, 17, 1, '2016-11-22', 0, '0000-00-00', 7),
(112, 115, 201625018, 2016, 7, 25, 18, 1, '2016-11-22', 0, '0000-00-00', 7),
(113, 116, 201625019, 2016, 7, 25, 19, 1, '2016-11-22', 0, '0000-00-00', 7),
(114, 117, 201625020, 2016, 7, 25, 20, 1, '2016-11-22', 0, '0000-00-00', 7),
(115, 118, 201625021, 2016, 7, 25, 21, 1, '2016-11-22', 0, '0000-00-00', 7),
(116, 119, 201625022, 2016, 7, 25, 22, 1, '2016-11-22', 0, '0000-00-00', 7),
(117, 120, 201625025, 2016, 7, 25, 25, 1, '2016-11-22', 0, '0000-00-00', 7),
(118, 121, 201625026, 2016, 7, 25, 26, 1, '2016-11-22', 0, '0000-00-00', 7),
(119, 122, 201625027, 2016, 7, 25, 27, 1, '2016-11-22', 0, '0000-00-00', 7),
(120, 123, 201625031, 2016, 7, 25, 31, 1, '2016-11-22', 0, '0000-00-00', 7),
(121, 124, 201625032, 2016, 7, 25, 32, 1, '2016-11-22', 0, '0000-00-00', 7),
(122, 125, 201625033, 2016, 7, 25, 33, 1, '2016-11-22', 0, '0000-00-00', 7),
(123, 127, 201625036, 2016, 7, 25, 36, 1, '2016-11-22', 0, '0000-00-00', 7),
(124, 126, 201625034, 2016, 7, 25, 34, 1, '2016-11-22', 0, '0000-00-00', 7),
(125, 128, 201625038, 2016, 7, 25, 38, 1, '2016-11-23', 0, '0000-00-00', 7),
(126, 129, 201625039, 2016, 7, 25, 39, 1, '2016-11-23', 0, '0000-00-00', 7),
(127, 130, 201625037, 2016, 7, 25, 37, 1, '2016-11-23', 0, '0000-00-00', 7),
(128, 131, 201605001, 2016, 2, 5, 1, 1, '2016-11-23', 0, '0000-00-00', 7),
(129, 133, 201605006, 2016, 2, 5, 6, 1, '2016-11-23', 0, '0000-00-00', 7),
(130, 135, 201605003, 2016, 2, 5, 3, 1, '2016-11-23', 0, '0000-00-00', 7),
(131, 136, 201605004, 2016, 2, 5, 4, 1, '2016-11-23', 0, '0000-00-00', 7),
(132, 137, 201605005, 2016, 2, 5, 5, 1, '2016-11-23', 0, '0000-00-00', 7),
(133, 138, 201605006, 2016, 2, 5, 6, 1, '2016-11-23', 0, '0000-00-00', 7),
(134, 139, 201605007, 2016, 2, 5, 7, 1, '2016-11-23', 0, '0000-00-00', 7),
(135, 140, 201605008, 2016, 2, 5, 8, 1, '2016-11-23', 0, '0000-00-00', 7),
(136, 141, 201605009, 2016, 2, 5, 9, 1, '2016-11-23', 0, '0000-00-00', 7),
(137, 142, 201605010, 2016, 2, 5, 10, 1, '2016-11-23', 0, '0000-00-00', 7),
(138, 143, 201605012, 2016, 2, 5, 12, 1, '2016-11-23', 0, '0000-00-00', 7),
(139, 144, 201605013, 2016, 2, 5, 13, 1, '2016-11-23', 0, '0000-00-00', 7),
(140, 145, 201605014, 2016, 2, 5, 14, 1, '2016-11-24', 0, '0000-00-00', 7),
(141, 146, 201605015, 2016, 2, 5, 15, 1, '2016-11-24', 0, '0000-00-00', 7),
(142, 147, 201606017, 2016, 2, 6, 17, 1, '2016-11-24', 0, '0000-00-00', 7),
(143, 148, 201605016, 2016, 2, 5, 16, 1, '2016-11-24', 0, '0000-00-00', 7),
(144, 149, 201605018, 2016, 2, 5, 18, 1, '2016-11-24', 0, '0000-00-00', 7),
(145, 150, 201605019, 2016, 2, 5, 19, 1, '2016-11-24', 0, '0000-00-00', 7),
(146, 151, 201605020, 2016, 2, 5, 20, 1, '2016-11-24', 0, '0000-00-00', 7),
(147, 152, 201605021, 2016, 2, 5, 21, 1, '2016-11-24', 0, '0000-00-00', 7),
(148, 153, 201606022, 2016, 2, 6, 22, 1, '2016-11-24', 0, '0000-00-00', 7),
(149, 154, 201605023, 2016, 2, 5, 23, 1, '2016-11-24', 0, '0000-00-00', 7),
(150, 155, 201605024, 2016, 2, 5, 24, 1, '2016-11-24', 0, '0000-00-00', 7),
(151, 156, 201605025, 2016, 2, 5, 25, 1, '2016-11-24', 0, '0000-00-00', 7),
(152, 157, 201605026, 2016, 2, 5, 26, 1, '2016-11-24', 0, '0000-00-00', 7),
(153, 158, 201605006, 2016, 2, 5, 6, 1, '2016-11-24', 0, '0000-00-00', 7),
(154, 159, 201605028, 2016, 2, 5, 28, 1, '2016-11-24', 0, '0000-00-00', 7),
(155, 160, 201601001, 2016, 1, 1, 1, 1, '2016-11-24', 0, '0000-00-00', 7),
(156, 161, 201601002, 2016, 1, 1, 2, 1, '2016-11-24', 0, '0000-00-00', 7),
(157, 162, 201601003, 2016, 1, 1, 3, 1, '2016-11-24', 0, '0000-00-00', 7),
(158, 163, 201601004, 2016, 1, 1, 4, 1, '2016-11-24', 0, '0000-00-00', 7),
(159, 164, 201601005, 2016, 1, 1, 5, 1, '2016-11-24', 1, '2016-11-24', 7),
(160, 165, 201601006, 2016, 1, 1, 6, 1, '2016-11-24', 0, '0000-00-00', 7),
(161, 166, 201601007, 2016, 1, 1, 7, 1, '2016-11-24', 0, '0000-00-00', 7),
(162, 167, 201601008, 2016, 1, 1, 8, 1, '2016-11-24', 0, '0000-00-00', 7),
(163, 168, 201601009, 2016, 1, 1, 9, 1, '2016-11-24', 0, '0000-00-00', 7),
(164, 169, 201601010, 2016, 1, 1, 10, 1, '2016-11-24', 0, '0000-00-00', 7),
(165, 170, 201601011, 2016, 1, 1, 11, 1, '2016-11-24', 0, '0000-00-00', 7),
(166, 171, 201601012, 2016, 1, 1, 12, 1, '2016-11-24', 0, '0000-00-00', 7),
(167, 172, 201601013, 2016, 1, 1, 13, 1, '2016-11-24', 0, '0000-00-00', 7),
(168, 174, 201601015, 2016, 1, 1, 15, 1, '2016-11-24', 0, '0000-00-00', 7),
(169, 175, 201601016, 2016, 1, 1, 16, 1, '2016-11-24', 0, '0000-00-00', 7),
(170, 176, 201601021, 2016, 1, 1, 21, 1, '2016-11-24', 0, '0000-00-00', 7),
(171, 178, 201601022, 2016, 1, 1, 22, 1, '2016-11-24', 0, '0000-00-00', 7),
(172, 179, 201601024, 2016, 1, 1, 24, 1, '2016-11-24', 0, '0000-00-00', 7),
(173, 180, 201601025, 2016, 1, 1, 25, 1, '2016-11-24', 0, '0000-00-00', 7),
(174, 181, 201601027, 2016, 1, 1, 27, 1, '2016-11-24', 0, '0000-00-00', 7),
(175, 182, 201601028, 2016, 1, 1, 28, 1, '2016-11-24', 0, '0000-00-00', 7),
(176, 183, 201601029, 2016, 1, 1, 29, 1, '2016-11-24', 0, '0000-00-00', 7),
(177, 184, 201601030, 2016, 1, 1, 30, 1, '2016-11-24', 0, '0000-00-00', 7),
(178, 185, 201601031, 2016, 1, 1, 31, 1, '2016-11-24', 0, '0000-00-00', 7),
(179, 186, 201601032, 2016, 1, 1, 32, 1, '2016-11-24', 0, '0000-00-00', 7),
(180, 187, 201601033, 2016, 1, 1, 33, 1, '2016-11-24', 0, '0000-00-00', 7),
(181, 188, 201601034, 2016, 1, 1, 34, 1, '2016-11-24', 0, '0000-00-00', 7),
(182, 189, 201601036, 2016, 1, 1, 36, 1, '2016-11-24', 0, '0000-00-00', 7),
(183, 190, 201633001, 2016, 9, 33, 1, 1, '2016-11-24', 0, '0000-00-00', 7),
(184, 191, 201633002, 2016, 9, 33, 2, 1, '2016-11-24', 0, '0000-00-00', 7),
(185, 192, 201633003, 2016, 9, 33, 3, 1, '2016-11-24', 0, '0000-00-00', 7),
(186, 193, 201633004, 2016, 9, 33, 4, 1, '2016-11-24', 0, '0000-00-00', 7),
(187, 194, 201633005, 2016, 9, 33, 5, 1, '2016-11-24', 0, '0000-00-00', 7),
(188, 195, 201633006, 2016, 9, 33, 6, 1, '2016-11-24', 0, '0000-00-00', 7),
(189, 196, 201633007, 2016, 9, 33, 7, 1, '2016-11-24', 0, '0000-00-00', 7),
(190, 197, 201633009, 2016, 9, 33, 9, 1, '2016-11-24', 0, '0000-00-00', 7),
(191, 198, 201633010, 2016, 9, 33, 10, 1, '2016-11-24', 0, '0000-00-00', 7),
(192, 199, 201633011, 2016, 9, 33, 11, 1, '2016-11-24', 0, '0000-00-00', 7),
(193, 200, 201633012, 2016, 9, 33, 12, 1, '2016-11-24', 0, '0000-00-00', 7),
(194, 201, 201633013, 2016, 9, 33, 13, 1, '2016-11-24', 0, '0000-00-00', 7),
(195, 202, 201633014, 2016, 9, 33, 14, 1, '2016-11-24', 0, '0000-00-00', 7),
(196, 203, 201633015, 2016, 9, 33, 15, 1, '2016-11-24', 0, '0000-00-00', 7),
(197, 204, 201633016, 2016, 9, 33, 16, 1, '2016-11-24', 0, '0000-00-00', 7),
(198, 205, 201633018, 2016, 9, 33, 18, 1, '2016-11-24', 0, '0000-00-00', 7),
(199, 206, 201633020, 2016, 9, 33, 20, 1, '2016-11-24', 0, '0000-00-00', 7),
(200, 207, 201633021, 2016, 9, 33, 21, 1, '2016-11-24', 0, '0000-00-00', 7),
(202, 209, 201633025, 2016, 9, 33, 25, 1, '2016-11-24', 0, '0000-00-00', 7),
(203, 210, 201633026, 2016, 9, 33, 26, 1, '2016-11-24', 0, '0000-00-00', 7),
(204, 211, 201633028, 2016, 9, 33, 28, 1, '2016-11-24', 0, '0000-00-00', 7),
(205, 212, 201633029, 2016, 9, 33, 29, 1, '2016-11-24', 0, '0000-00-00', 7),
(206, 213, 201633031, 2016, 9, 33, 31, 1, '2016-11-24', 0, '0000-00-00', 7),
(207, 214, 201633032, 2016, 9, 33, 32, 1, '2016-11-24', 0, '0000-00-00', 7),
(208, 215, 201633033, 2016, 9, 33, 33, 1, '2016-11-24', 0, '0000-00-00', 7),
(209, 216, 201633035, 2016, 9, 33, 35, 1, '2016-11-24', 0, '0000-00-00', 7),
(210, 217, 201633036, 2016, 9, 33, 36, 1, '2016-11-24', 0, '0000-00-00', 7),
(211, 218, 201633037, 2016, 9, 33, 37, 1, '2016-11-24', 0, '0000-00-00', 7),
(212, 219, 201633039, 2016, 9, 33, 39, 1, '2016-11-24', 0, '0000-00-00', 7),
(213, 220, 201633040, 2016, 9, 33, 40, 1, '2016-11-24', 0, '0000-00-00', 7),
(214, 221, 201633041, 2016, 9, 33, 41, 1, '2016-11-24', 0, '0000-00-00', 7),
(215, 222, 201633046, 2016, 9, 33, 46, 1, '2016-11-24', 0, '0000-00-00', 7),
(216, 223, 201633047, 2016, 9, 33, 47, 1, '2016-11-24', 0, '0000-00-00', 7),
(217, 224, 201633050, 2016, 9, 33, 50, 1, '2016-11-24', 0, '0000-00-00', 7),
(218, 225, 201633052, 2016, 9, 33, 52, 1, '2016-11-24', 0, '0000-00-00', 7),
(219, 226, 201633053, 2016, 9, 33, 53, 1, '2016-11-24', 0, '0000-00-00', 7),
(220, 227, 201633055, 2016, 9, 33, 55, 1, '2016-11-24', 0, '0000-00-00', 7),
(221, 228, 201633057, 2016, 9, 33, 57, 1, '2016-11-24', 0, '0000-00-00', 7),
(222, 229, 201633060, 2016, 9, 33, 60, 1, '2016-11-24', 0, '0000-00-00', 7),
(223, 230, 201633062, 2016, 9, 33, 62, 1, '2016-11-24', 0, '0000-00-00', 7),
(224, 231, 201633063, 2016, 9, 33, 63, 1, '2016-11-24', 0, '0000-00-00', 7),
(225, 233, 201633067, 2016, 9, 33, 67, 1, '2016-11-24', 0, '0000-00-00', 7),
(226, 234, 201633068, 2016, 9, 33, 68, 1, '2016-11-24', 0, '0000-00-00', 7),
(227, 235, 201633070, 2016, 9, 33, 70, 1, '2016-11-24', 0, '0000-00-00', 7),
(228, 236, 201633071, 2016, 9, 33, 71, 1, '2016-11-24', 0, '0000-00-00', 7),
(229, 237, 201633072, 2016, 9, 33, 72, 1, '2016-11-24', 0, '0000-00-00', 7),
(230, 238, 201633074, 2016, 9, 33, 74, 1, '2016-11-24', 0, '0000-00-00', 7),
(231, 239, 201633075, 2016, 9, 33, 75, 1, '2016-11-24', 1, '2016-11-24', 7),
(232, 240, 201633076, 2016, 9, 33, 76, 1, '2016-11-24', 0, '0000-00-00', 7),
(233, 241, 201633077, 2016, 9, 33, 77, 1, '2016-11-24', 0, '0000-00-00', 7),
(234, 242, 201633078, 2016, 9, 33, 78, 1, '2016-11-24', 0, '0000-00-00', 7),
(235, 243, 201633082, 2016, 9, 33, 82, 1, '2016-11-24', 0, '0000-00-00', 7),
(236, 244, 201633083, 2016, 9, 33, 83, 1, '2016-11-24', 0, '0000-00-00', 7),
(237, 245, 201633084, 2016, 9, 33, 84, 1, '2016-11-24', 0, '0000-00-00', 7),
(238, 246, 201633085, 2016, 9, 33, 85, 1, '2016-11-24', 0, '0000-00-00', 7),
(239, 247, 201633086, 2016, 9, 33, 86, 1, '2016-11-24', 0, '0000-00-00', 7),
(240, 248, 201633088, 2016, 9, 33, 88, 1, '2016-11-24', 1, '2016-11-24', 7),
(241, 249, 201633089, 2016, 9, 33, 89, 1, '2016-11-24', 0, '0000-00-00', 7),
(242, 250, 201633091, 2016, 9, 33, 91, 1, '2016-11-24', 0, '0000-00-00', 7),
(243, 251, 201633093, 2016, 9, 33, 93, 1, '2016-11-24', 0, '0000-00-00', 7),
(244, 252, 201633094, 2016, 9, 33, 94, 1, '2016-11-24', 0, '0000-00-00', 7),
(245, 253, 201633095, 2016, 9, 33, 95, 1, '2016-11-24', 0, '0000-00-00', 7),
(246, 255, 201633099, 2016, 9, 33, 99, 1, '2016-11-24', 0, '0000-00-00', 7),
(247, 257, 201633101, 2016, 9, 33, 101, 1, '2016-11-24', 0, '0000-00-00', 7),
(248, 256, 201633100, 2016, 9, 33, 100, 1, '2016-11-24', 0, '0000-00-00', 7),
(252, 261, 201617004, 2016, 5, 17, 4, 1, '2016-11-24', 0, '0000-00-00', 7),
(253, 264, 201629001, 2016, 8, 29, 1, 1, '2016-11-25', 0, '0000-00-00', 7),
(254, 265, 201629068, 2016, 8, 29, 68, 1, '2016-11-25', 0, '0000-00-00', 7),
(255, 266, 201629078, 2016, 8, 29, 78, 1, '2016-11-25', 0, '0000-00-00', 7),
(256, 267, 201629006, 2016, 8, 29, 6, 1, '2016-11-25', 0, '0000-00-00', 7),
(257, 268, 201629030, 2016, 8, 29, 30, 1, '2016-11-25', 0, '0000-00-00', 7),
(258, 269, 201629029, 2016, 8, 29, 29, 1, '2016-11-25', 0, '0000-00-00', 7),
(259, 270, 201629040, 2016, 8, 29, 40, 1, '2016-11-25', 1, '2016-11-25', 7),
(260, 271, 201629088, 2016, 8, 29, 88, 1, '2016-11-25', 0, '0000-00-00', 7),
(261, 272, 201629047, 2016, 8, 29, 47, 1, '2016-11-25', 0, '0000-00-00', 7),
(262, 273, 201629005, 2016, 8, 29, 5, 1, '2016-11-25', 0, '0000-00-00', 7),
(263, 274, 201629010, 2016, 8, 29, 10, 1, '2016-11-25', 0, '0000-00-00', 7),
(264, 275, 201629061, 2016, 8, 29, 61, 1, '2016-11-25', 0, '0000-00-00', 7),
(265, 277, 201629015, 2016, 8, 29, 15, 1, '2016-11-25', 0, '0000-00-00', 7),
(266, 278, 201629062, 2016, 8, 29, 62, 1, '2016-11-25', 0, '0000-00-00', 7),
(267, 279, 201629020, 2016, 8, 29, 20, 1, '2016-11-25', 0, '0000-00-00', 7),
(268, 280, 201629042, 2016, 8, 29, 42, 1, '2016-11-25', 0, '0000-00-00', 7),
(269, 281, 201629055, 2016, 8, 29, 55, 1, '2016-11-25', 0, '0000-00-00', 7),
(270, 282, 201629056, 2016, 8, 29, 56, 1, '2016-11-25', 0, '0000-00-00', 7),
(271, 283, 201629070, 2016, 8, 29, 70, 1, '2016-11-25', 0, '0000-00-00', 7),
(272, 284, 201629019, 2016, 8, 29, 19, 1, '2016-11-25', 0, '0000-00-00', 7),
(273, 285, 201629007, 2016, 8, 29, 7, 1, '2016-11-25', 0, '0000-00-00', 7),
(274, 286, 201629067, 2016, 8, 29, 67, 1, '2016-11-25', 0, '0000-00-00', 7),
(275, 287, 201629041, 2016, 8, 29, 41, 1, '2016-11-25', 0, '0000-00-00', 7),
(276, 288, 201629022, 2016, 8, 29, 22, 1, '2016-11-25', 0, '0000-00-00', 7),
(277, 289, 201629008, 2016, 8, 29, 8, 1, '2016-11-25', 0, '0000-00-00', 7),
(278, 290, 201629082, 2016, 8, 29, 82, 1, '2016-11-25', 0, '0000-00-00', 7),
(279, 291, 201629051, 2016, 8, 29, 51, 1, '2016-11-25', 0, '0000-00-00', 7),
(280, 292, 201629086, 2016, 8, 29, 86, 1, '2016-11-25', 0, '0000-00-00', 7),
(281, 293, 201629060, 2016, 8, 29, 60, 1, '2016-11-25', 0, '0000-00-00', 7),
(282, 294, 201629049, 2016, 8, 29, 49, 1, '2016-11-25', 0, '0000-00-00', 7),
(283, 295, 201630050, 2016, 8, 30, 50, 1, '2016-11-25', 0, '0000-00-00', 7),
(284, 296, 201629080, 2016, 8, 29, 80, 1, '2016-11-25', 0, '0000-00-00', 7),
(285, 297, 201629048, 2016, 8, 29, 48, 1, '2016-11-25', 0, '0000-00-00', 7),
(286, 298, 201629089, 2016, 8, 29, 89, 1, '2016-11-25', 0, '0000-00-00', 7),
(287, 299, 201629065, 2016, 8, 29, 65, 1, '2016-11-25', 0, '0000-00-00', 7),
(288, 300, 201629035, 2016, 8, 29, 35, 1, '2016-11-25', 0, '0000-00-00', 7),
(289, 301, 201629084, 2016, 8, 29, 84, 1, '2016-11-25', 0, '0000-00-00', 7),
(290, 302, 201629064, 2016, 8, 29, 64, 1, '2016-11-25', 0, '0000-00-00', 7),
(291, 303, 201629033, 2016, 8, 29, 33, 1, '2016-11-25', 0, '0000-00-00', 7),
(292, 304, 201629036, 2016, 8, 29, 36, 1, '2016-11-25', 0, '0000-00-00', 7),
(293, 305, 201629014, 2016, 8, 29, 14, 1, '2016-11-25', 0, '0000-00-00', 7),
(294, 306, 201629011, 2016, 8, 29, 11, 1, '2016-11-25', 0, '0000-00-00', 7),
(295, 308, 201629079, 2016, 8, 29, 79, 1, '2016-11-25', 0, '0000-00-00', 7),
(296, 309, 201629097, 2016, 8, 29, 97, 1, '2016-11-25', 0, '0000-00-00', 7),
(297, 310, 201629046, 2016, 8, 29, 46, 1, '2016-11-25', 0, '0000-00-00', 7),
(298, 311, 201629018, 2016, 8, 29, 18, 1, '2016-11-25', 0, '0000-00-00', 7),
(299, 312, 201629081, 2016, 8, 29, 81, 1, '2016-11-25', 0, '0000-00-00', 7),
(300, 313, 201629063, 2016, 8, 29, 63, 1, '2016-11-25', 0, '0000-00-00', 7),
(301, 314, 201629038, 2016, 8, 29, 38, 1, '2016-11-25', 0, '0000-00-00', 7),
(302, 315, 201629058, 2016, 8, 29, 58, 1, '2016-11-25', 1, '2016-11-25', 7),
(303, 316, 201629057, 2016, 8, 29, 57, 1, '2016-11-25', 0, '0000-00-00', 7),
(304, 317, 201629037, 2016, 8, 29, 37, 1, '2016-11-25', 0, '0000-00-00', 7),
(305, 318, 201629075, 2016, 8, 29, 75, 1, '2016-11-25', 0, '0000-00-00', 7),
(306, 319, 201629031, 2016, 8, 29, 31, 1, '2016-11-25', 0, '0000-00-00', 7),
(307, 320, 201629025, 2016, 8, 29, 25, 1, '2016-11-25', 0, '0000-00-00', 7),
(308, 321, 201629021, 2016, 8, 29, 21, 1, '2016-11-25', 0, '0000-00-00', 7),
(309, 322, 201629074, 2016, 8, 29, 74, 1, '2016-11-25', 0, '0000-00-00', 7),
(310, 323, 201629072, 2016, 8, 29, 72, 1, '2016-11-25', 0, '0000-00-00', 7),
(311, 324, 201629059, 2016, 8, 29, 59, 1, '2016-11-25', 0, '0000-00-00', 7),
(312, 325, 201629053, 2016, 8, 29, 53, 1, '2016-11-25', 0, '0000-00-00', 7),
(313, 326, 201629028, 2016, 8, 29, 28, 1, '2016-11-25', 0, '0000-00-00', 7),
(314, 328, 201629024, 2016, 8, 29, 24, 1, '2016-11-25', 0, '0000-00-00', 7),
(315, 329, 201629039, 2016, 8, 29, 39, 1, '2016-11-25', 0, '0000-00-00', 7),
(316, 330, 201629026, 2016, 8, 29, 26, 1, '2016-11-25', 0, '0000-00-00', 7),
(317, 331, 201643087, 2016, 11, 43, 87, 1, '2016-11-25', 0, '0000-00-00', 7),
(318, 332, 201643066, 2016, 11, 43, 66, 1, '2016-11-25', 0, '0000-00-00', 7),
(319, 333, 201643077, 2016, 11, 43, 77, 1, '2016-11-25', 0, '0000-00-00', 7),
(320, 334, 201643018, 2016, 11, 43, 18, 1, '2016-11-26', 0, '0000-00-00', 7),
(321, 335, 201643011, 2016, 11, 43, 11, 1, '2016-11-26', 0, '0000-00-00', 7),
(322, 336, 201643002, 2016, 11, 43, 2, 1, '2016-11-26', 0, '0000-00-00', 7),
(323, 337, 201643110, 2016, 11, 43, 110, 1, '2016-11-26', 0, '0000-00-00', 7),
(324, 339, 201643069, 2016, 11, 43, 69, 1, '2016-11-26', 0, '0000-00-00', 7),
(325, 340, 201643026, 2016, 11, 43, 26, 1, '2016-11-26', 0, '0000-00-00', 7),
(326, 341, 201643148, 2016, 11, 43, 148, 1, '2016-11-26', 0, '0000-00-00', 7),
(327, 342, 201643091, 2016, 11, 43, 91, 1, '2016-11-26', 0, '0000-00-00', 7),
(328, 343, 201643001, 2016, 11, 43, 1, 1, '2016-11-26', 0, '0000-00-00', 7),
(329, 344, 201643014, 2016, 11, 43, 14, 1, '2016-11-26', 0, '0000-00-00', 7),
(330, 345, 201643142, 2016, 11, 43, 142, 1, '2016-11-26', 0, '0000-00-00', 7),
(331, 346, 201643093, 2016, 11, 43, 93, 1, '2016-11-26', 0, '0000-00-00', 7),
(332, 347, 201643041, 2016, 11, 43, 41, 1, '2016-11-26', 0, '0000-00-00', 7),
(333, 348, 201643042, 2016, 11, 43, 42, 1, '2016-11-26', 0, '0000-00-00', 7),
(334, 349, 201643149, 2016, 11, 43, 149, 1, '2016-11-26', 0, '0000-00-00', 7),
(335, 350, 201643046, 2016, 11, 43, 46, 1, '2016-11-26', 0, '0000-00-00', 7),
(336, 351, 201643037, 2016, 11, 43, 37, 1, '2016-11-26', 0, '0000-00-00', 7),
(337, 352, 201643039, 2016, 11, 43, 39, 1, '2016-11-26', 0, '0000-00-00', 7),
(338, 353, 201633065, 2016, 9, 33, 65, 1, '2016-11-26', 0, '0000-00-00', 7),
(339, 354, 201643163, 2016, 11, 43, 163, 1, '2016-11-26', 0, '0000-00-00', 7),
(340, 356, 201643054, 2016, 11, 43, 54, 1, '2016-11-26', 0, '0000-00-00', 7),
(341, 355, 201633069, 2016, 9, 33, 69, 1, '2016-11-26', 0, '0000-00-00', 7),
(342, 357, 201643034, 2016, 11, 43, 34, 1, '2016-11-26', 0, '0000-00-00', 7),
(343, 358, 201634081, 2016, 9, 34, 81, 1, '2016-11-26', 0, '0000-00-00', 7),
(344, 359, 201643103, 2016, 11, 43, 103, 1, '2016-11-26', 0, '0000-00-00', 7),
(345, 360, 201634054, 2016, 9, 34, 54, 1, '2016-11-26', 0, '0000-00-00', 7),
(346, 361, 201643067, 2016, 11, 43, 67, 1, '2016-11-26', 0, '0000-00-00', 7),
(347, 362, 201634024, 2016, 9, 34, 24, 1, '2016-11-26', 0, '0000-00-00', 7),
(348, 363, 201633022, 2016, 9, 33, 22, 1, '2016-11-26', 0, '0000-00-00', 7),
(349, 364, 201633042, 2016, 9, 33, 42, 1, '2016-11-26', 0, '0000-00-00', 7),
(350, 365, 201634045, 2016, 9, 34, 45, 1, '2016-11-26', 0, '0000-00-00', 7),
(351, 366, 201633046, 2016, 9, 33, 46, 1, '2016-11-26', 0, '0000-00-00', 7),
(352, 368, 201629076, 2016, 8, 29, 76, 1, '2016-11-26', 0, '0000-00-00', 7),
(353, 367, 201643098, 2016, 11, 43, 98, 1, '2016-11-26', 0, '0000-00-00', 7),
(354, 369, 201642152, 2016, 11, 42, 152, 1, '2016-11-26', 0, '0000-00-00', 7),
(355, 370, 201642161, 2016, 11, 42, 161, 1, '2016-11-26', 0, '0000-00-00', 7),
(356, 371, 201642044, 2016, 11, 42, 44, 1, '2016-11-26', 0, '0000-00-00', 7),
(357, 372, 201643073, 2016, 11, 43, 73, 1, '2016-11-26', 0, '0000-00-00', 7),
(358, 373, 201642173, 2016, 11, 42, 173, 1, '2016-11-26', 0, '0000-00-00', 7),
(359, 374, 201643082, 2016, 11, 43, 82, 1, '2016-11-26', 0, '0000-00-00', 7),
(360, 375, 201642021, 2016, 11, 42, 21, 1, '2016-11-26', 0, '0000-00-00', 7),
(361, 377, 201642150, 2016, 11, 42, 150, 1, '2016-11-26', 0, '0000-00-00', 7),
(362, 376, 201643045, 2016, 11, 43, 45, 1, '2016-11-26', 0, '0000-00-00', 7),
(363, 378, 201643028, 2016, 11, 43, 28, 1, '2016-11-26', 0, '0000-00-00', 7),
(364, 379, 201642129, 2016, 11, 42, 129, 1, '2016-11-26', 0, '0000-00-00', 7),
(365, 380, 201643102, 2016, 11, 43, 102, 1, '2016-11-26', 0, '0000-00-00', 7),
(366, 381, 201642117, 2016, 11, 42, 117, 1, '2016-11-26', 0, '0000-00-00', 7),
(367, 382, 201642115, 2016, 11, 42, 115, 1, '2016-11-26', 0, '0000-00-00', 7),
(368, 383, 201643125, 2016, 11, 43, 125, 1, '2016-11-26', 0, '0000-00-00', 7),
(369, 384, 201642160, 2016, 11, 42, 160, 1, '2016-11-26', 0, '0000-00-00', 7),
(370, 385, 201642159, 2016, 11, 42, 159, 1, '2016-11-26', 0, '0000-00-00', 7),
(371, 386, 201643096, 2016, 11, 43, 96, 1, '2016-11-26', 0, '0000-00-00', 7),
(372, 387, 201642151, 2016, 11, 42, 151, 1, '2016-11-26', 0, '0000-00-00', 7),
(373, 388, 201643031, 2016, 11, 43, 31, 1, '2016-11-26', 0, '0000-00-00', 7),
(374, 389, 201642172, 2016, 11, 42, 172, 1, '2016-11-26', 0, '0000-00-00', 7),
(375, 390, 201643095, 2016, 11, 43, 95, 1, '2016-11-26', 0, '0000-00-00', 7),
(376, 391, 201642061, 2016, 11, 42, 61, 1, '2016-11-26', 0, '0000-00-00', 7),
(377, 392, 201643072, 2016, 11, 43, 72, 1, '2016-11-26', 0, '0000-00-00', 7),
(378, 393, 201642153, 2016, 11, 42, 153, 1, '2016-11-26', 0, '0000-00-00', 7),
(379, 394, 201642078, 2016, 11, 42, 78, 1, '2016-11-27', 0, '0000-00-00', 7),
(380, 395, 201643081, 2016, 11, 43, 81, 1, '2016-11-27', 0, '0000-00-00', 7),
(381, 397, 201643101, 2016, 11, 43, 101, 1, '2016-11-27', 0, '0000-00-00', 7),
(382, 398, 201643094, 2016, 11, 43, 94, 1, '2016-11-27', 0, '0000-00-00', 7),
(383, 396, 201643033, 2016, 11, 43, 33, 1, '2016-11-27', 0, '0000-00-00', 7),
(384, 399, 201643084, 2016, 11, 43, 84, 1, '2016-11-27', 0, '0000-00-00', 7),
(385, 400, 201643157, 2016, 11, 43, 157, 1, '2016-11-27', 0, '0000-00-00', 7),
(386, 401, 201643075, 2016, 11, 43, 75, 1, '2016-11-27', 0, '0000-00-00', 7),
(387, 402, 201643168, 2016, 11, 43, 168, 1, '2016-11-27', 0, '0000-00-00', 7),
(388, 404, 201643133, 2016, 11, 43, 133, 1, '2016-11-27', 0, '0000-00-00', 7),
(389, 403, 201643048, 2016, 11, 43, 48, 1, '2016-11-27', 0, '0000-00-00', 7),
(390, 405, 201643145, 2016, 11, 43, 145, 1, '2016-11-27', 0, '0000-00-00', 7),
(391, 406, 201643166, 2016, 11, 43, 166, 1, '2016-11-27', 0, '0000-00-00', 7),
(392, 407, 201643124, 2016, 11, 43, 124, 1, '2016-11-27', 0, '0000-00-00', 7),
(393, 408, 201643113, 2016, 11, 43, 113, 1, '2016-11-27', 0, '0000-00-00', 7),
(394, 409, 201643057, 2016, 11, 43, 57, 1, '2016-11-27', 0, '0000-00-00', 7),
(395, 410, 201643097, 2016, 11, 43, 97, 1, '2016-11-27', 0, '0000-00-00', 7),
(396, 411, 201643156, 2016, 11, 43, 156, 1, '2016-11-27', 0, '0000-00-00', 7),
(397, 412, 201643118, 2016, 11, 43, 118, 1, '2016-11-27', 0, '0000-00-00', 7),
(398, 413, 201643056, 2016, 11, 43, 56, 1, '2016-11-27', 0, '0000-00-00', 7),
(399, 414, 201643060, 2016, 11, 43, 60, 1, '2016-11-27', 0, '0000-00-00', 7),
(400, 415, 201643016, 2016, 11, 43, 16, 1, '2016-11-27', 0, '0000-00-00', 7),
(401, 416, 201643070, 2016, 11, 43, 70, 1, '2016-11-27', 0, '0000-00-00', 7),
(402, 417, 201643109, 2016, 11, 43, 109, 1, '2016-11-27', 0, '0000-00-00', 7),
(403, 418, 201643055, 2016, 11, 43, 55, 1, '2016-11-27', 0, '0000-00-00', 7),
(404, 419, 201643132, 2016, 11, 43, 132, 1, '2016-11-27', 0, '0000-00-00', 7),
(405, 420, 201643003, 2016, 11, 43, 3, 1, '2016-11-27', 0, '0000-00-00', 7),
(406, 421, 201643131, 2016, 11, 43, 131, 1, '2016-11-27', 0, '0000-00-00', 7),
(407, 423, 201643167, 2016, 11, 43, 167, 1, '2016-11-27', 0, '0000-00-00', 7),
(408, 424, 201643007, 2016, 11, 43, 7, 1, '2016-11-27', 0, '0000-00-00', 7),
(409, 425, 201643029, 2016, 11, 43, 29, 1, '2016-11-27', 0, '0000-00-00', 7),
(410, 426, 201643025, 2016, 11, 43, 25, 1, '2016-11-27', 0, '0000-00-00', 7),
(411, 427, 201643006, 2016, 11, 43, 6, 1, '2016-11-27', 0, '0000-00-00', 7),
(412, 428, 201643079, 2016, 11, 43, 79, 1, '2016-11-27', 0, '0000-00-00', 7),
(413, 429, 201643008, 2016, 11, 43, 8, 1, '2016-11-27', 0, '0000-00-00', 7),
(414, 430, 201643020, 2016, 11, 43, 20, 1, '2016-11-27', 0, '0000-00-00', 7),
(415, 431, 201643012, 2016, 11, 43, 12, 1, '2016-11-27', 0, '0000-00-00', 7),
(416, 432, 201643019, 2016, 11, 43, 19, 1, '2016-11-27', 0, '0000-00-00', 7),
(417, 433, 201643030, 2016, 11, 43, 30, 1, '2016-11-27', 0, '0000-00-00', 7),
(418, 434, 201643023, 2016, 11, 43, 23, 1, '2016-11-27', 0, '0000-00-00', 7),
(419, 435, 201643076, 2016, 11, 43, 76, 1, '2016-11-27', 0, '0000-00-00', 7),
(420, 438, 201643027, 2016, 11, 43, 27, 1, '2016-11-27', 0, '0000-00-00', 7),
(421, 439, 201643092, 2016, 11, 43, 92, 1, '2016-11-27', 0, '0000-00-00', 7),
(422, 440, 201643004, 2016, 11, 43, 4, 1, '2016-11-27', 0, '0000-00-00', 7),
(423, 441, 201643063, 2016, 11, 43, 63, 1, '2016-11-27', 0, '0000-00-00', 7),
(424, 442, 201643010, 2016, 11, 43, 10, 1, '2016-11-27', 0, '0000-00-00', 7),
(425, 443, 201643062, 2016, 11, 43, 62, 1, '2016-11-27', 0, '0000-00-00', 7),
(426, 444, 201643059, 2016, 11, 43, 59, 1, '2016-11-27', 0, '0000-00-00', 7),
(427, 445, 201643058, 2016, 11, 43, 58, 1, '2016-11-27', 0, '0000-00-00', 7),
(428, 446, 201643138, 2016, 11, 43, 138, 1, '2016-11-27', 0, '0000-00-00', 7),
(429, 447, 201643013, 2016, 11, 43, 13, 1, '2016-11-27', 0, '0000-00-00', 7),
(430, 448, 201643015, 2016, 11, 43, 15, 1, '2016-11-27', 0, '0000-00-00', 7),
(431, 449, 201643017, 2016, 11, 43, 17, 1, '2016-11-27', 0, '0000-00-00', 7),
(432, 450, 201643111, 2016, 11, 43, 111, 1, '2016-11-27', 0, '0000-00-00', 7),
(433, 451, 201643022, 2016, 11, 43, 22, 1, '2016-11-27', 0, '0000-00-00', 7),
(434, 452, 201643009, 2016, 11, 43, 9, 1, '2016-11-27', 0, '0000-00-00', 7),
(435, 453, 201643086, 2016, 11, 43, 86, 1, '2016-11-27', 0, '0000-00-00', 7),
(436, 454, 201643032, 2016, 11, 43, 32, 1, '2016-11-27', 0, '0000-00-00', 7),
(437, 456, 201643140, 2016, 11, 43, 140, 1, '2016-11-27', 0, '0000-00-00', 7),
(438, 457, 201643112, 2016, 11, 43, 112, 1, '2016-11-27', 0, '0000-00-00', 7),
(439, 458, 201643139, 2016, 11, 43, 139, 1, '2016-11-27', 0, '0000-00-00', 7),
(440, 459, 201643068, 2016, 11, 43, 68, 1, '2016-11-27', 0, '0000-00-00', 7),
(441, 460, 201643036, 2016, 11, 43, 36, 1, '2016-11-27', 0, '0000-00-00', 7),
(442, 461, 201643049, 2016, 11, 43, 49, 1, '2016-11-27', 0, '0000-00-00', 7),
(443, 462, 201643100, 2016, 11, 43, 100, 1, '2016-11-27', 0, '0000-00-00', 7),
(444, 463, 201643143, 2016, 11, 43, 143, 1, '2016-11-27', 0, '0000-00-00', 7),
(445, 464, 201617028, 2016, 5, 17, 28, 1, '2016-11-27', 0, '0000-00-00', 7),
(446, 465, 201617006, 2016, 5, 17, 6, 1, '2016-11-27', 0, '0000-00-00', 7),
(447, 466, 201617007, 2016, 5, 17, 7, 1, '2016-11-27', 0, '0000-00-00', 7),
(448, 467, 201617008, 2016, 5, 17, 8, 1, '2016-11-27', 0, '0000-00-00', 7),
(450, 470, 201617010, 2016, 5, 17, 10, 1, '2016-11-27', 0, '0000-00-00', 7),
(451, 471, 201617011, 2016, 5, 17, 11, 1, '2016-11-27', 0, '0000-00-00', 7),
(452, 472, 201617012, 2016, 5, 17, 12, 1, '2016-11-27', 0, '0000-00-00', 7),
(453, 473, 201617013, 2016, 5, 17, 13, 1, '2016-11-27', 0, '0000-00-00', 7),
(454, 474, 201617014, 2016, 5, 17, 14, 1, '2016-11-27', 0, '0000-00-00', 7),
(455, 475, 201617016, 2016, 5, 17, 16, 1, '2016-11-27', 0, '0000-00-00', 7),
(456, 476, 201617017, 2016, 5, 17, 17, 1, '2016-11-27', 0, '0000-00-00', 7),
(457, 477, 201617018, 2016, 5, 17, 18, 1, '2016-11-27', 0, '0000-00-00', 7),
(458, 478, 201617019, 2016, 5, 17, 19, 1, '2016-11-27', 0, '0000-00-00', 7),
(459, 479, 201617020, 2016, 5, 17, 20, 1, '2016-11-27', 0, '0000-00-00', 7),
(460, 480, 201617021, 2016, 5, 17, 21, 1, '2016-11-27', 0, '0000-00-00', 7),
(461, 481, 201617023, 2016, 5, 17, 23, 1, '2016-11-27', 0, '0000-00-00', 7),
(462, 482, 201617024, 2016, 5, 17, 24, 1, '2016-11-27', 0, '0000-00-00', 7),
(463, 485, 201617001, 2016, 5, 17, 1, 1, '2016-11-27', 0, '0000-00-00', 7),
(464, 486, 201617029, 2016, 5, 17, 29, 1, '2016-11-27', 0, '0000-00-00', 7),
(465, 487, 201617030, 2016, 5, 17, 30, 1, '2016-11-27', 0, '0000-00-00', 7),
(466, 488, 201617031, 2016, 5, 17, 31, 1, '2016-11-27', 0, '0000-00-00', 7),
(467, 489, 201617025, 2016, 5, 17, 25, 1, '2016-11-27', 0, '0000-00-00', 7),
(468, 490, 201617027, 2016, 5, 17, 27, 1, '2016-11-27', 0, '0000-00-00', 7),
(469, 491, 201617022, 2016, 5, 17, 22, 1, '2016-11-27', 0, '0000-00-00', 7),
(470, 492, 201617004, 2016, 5, 17, 4, 1, '2016-11-27', 0, '0000-00-00', 7),
(471, 494, 201617002, 2016, 5, 17, 2, 1, '2016-11-27', 0, '0000-00-00', 7),
(472, 495, 201617005, 2016, 5, 17, 5, 1, '2016-11-27', 0, '0000-00-00', 7),
(473, 496, 201637145, 2016, 10, 37, 145, 1, '2016-11-29', 0, '0000-00-00', 7),
(474, 497, 201637117, 2016, 10, 37, 117, 1, '2016-11-29', 0, '0000-00-00', 7),
(475, 498, 201637090, 2016, 10, 37, 90, 1, '2016-11-29', 0, '0000-00-00', 7),
(476, 499, 201637077, 2016, 10, 37, 77, 1, '2016-11-29', 0, '0000-00-00', 7),
(477, 500, 201637076, 2016, 10, 37, 76, 1, '2016-11-29', 0, '0000-00-00', 7),
(478, 501, 201637067, 2016, 10, 37, 67, 1, '2016-11-29', 0, '0000-00-00', 7),
(479, 502, 201613014, 2016, 4, 13, 14, 1, '2016-11-30', 0, '0000-00-00', 7),
(480, 503, 201622028, 2016, 6, 22, 28, 1, '2016-11-30', 0, '0000-00-00', 7),
(481, 504, 201622044, 2016, 6, 22, 44, 1, '2016-11-30', 0, '0000-00-00', 7),
(482, 505, 201622004, 2016, 6, 22, 4, 1, '2016-11-30', 0, '0000-00-00', 7),
(483, 506, 201622026, 2016, 6, 22, 26, 1, '2016-11-30', 0, '0000-00-00', 7),
(484, 507, 201622037, 2016, 6, 22, 37, 1, '2016-11-30', 0, '0000-00-00', 7),
(485, 508, 201643024, 2016, 11, 43, 24, 1, '2016-11-30', 0, '0000-00-00', 7),
(486, 509, 201643134, 2016, 11, 43, 134, 1, '2016-11-30', 0, '0000-00-00', 7),
(487, 510, 201603026, 2016, 1, 3, 26, 1, '2016-11-30', 0, '0000-00-00', 7),
(488, 511, 201603021, 2016, 1, 3, 21, 1, '2016-11-30', 0, '0000-00-00', 7),
(489, 512, 201603014, 2016, 1, 3, 14, 1, '2016-11-30', 0, '0000-00-00', 7),
(490, 513, 201611007, 2016, 3, 11, 7, 1, '2016-11-30', 0, '0000-00-00', 7),
(491, 514, 201611009, 2016, 3, 11, 9, 1, '2016-11-30', 0, '0000-00-00', 7),
(492, 516, 201619009, 2016, 5, 19, 9, 1, '2016-11-30', 0, '0000-00-00', 7),
(493, 517, 201619015, 2016, 5, 19, 15, 1, '2016-11-30', 0, '0000-00-00', 7),
(494, 518, 201607019, 2016, 2, 7, 19, 1, '2016-11-30', 0, '0000-00-00', 7),
(495, 519, 201607023, 2016, 2, 7, 23, 1, '2016-11-30', 0, '0000-00-00', 7),
(496, 520, 201607011, 2016, 2, 7, 11, 1, '2016-11-30', 0, '0000-00-00', 7),
(497, 521, 201607020, 2016, 2, 7, 20, 1, '2016-11-30', 0, '0000-00-00', 7),
(498, 522, 201607021, 2016, 2, 7, 21, 1, '2016-11-30', 0, '0000-00-00', 7),
(499, 523, 201631009, 2016, 8, 31, 9, 1, '2016-11-30', 0, '0000-00-00', 7),
(500, 524, 201631083, 2016, 8, 31, 83, 1, '2016-11-30', 0, '0000-00-00', 7),
(501, 525, 201631087, 2016, 8, 31, 87, 1, '2016-11-30', 0, '0000-00-00', 7),
(502, 526, 201631004, 2016, 8, 31, 4, 1, '2016-11-30', 0, '0000-00-00', 7),
(503, 527, 201631003, 2016, 8, 31, 3, 1, '2016-11-30', 0, '0000-00-00', 7),
(504, 528, 201631032, 2016, 8, 31, 32, 1, '2016-11-30', 0, '0000-00-00', 7),
(505, 529, 201631045, 2016, 8, 31, 45, 1, '2016-11-30', 0, '0000-00-00', 7),
(506, 530, 201631002, 2016, 8, 31, 2, 1, '2016-11-30', 0, '0000-00-00', 7),
(507, 531, 201631013, 2016, 8, 31, 13, 1, '2016-11-30', 0, '0000-00-00', 7),
(508, 532, 201631016, 2016, 8, 31, 16, 1, '2016-11-30', 0, '0000-00-00', 7),
(509, 533, 201631027, 2016, 8, 31, 27, 1, '2016-11-30', 0, '0000-00-00', 7),
(510, 534, 201635097, 2016, 9, 35, 97, 1, '2016-11-30', 0, '0000-00-00', 7),
(511, 535, 201635073, 2016, 9, 35, 73, 1, '2016-11-30', 0, '0000-00-00', 7),
(512, 536, 201635017, 2016, 9, 35, 17, 1, '2016-11-30', 0, '0000-00-00', 7),
(513, 537, 201635049, 2016, 9, 35, 49, 1, '2016-11-30', 0, '0000-00-00', 7),
(514, 538, 201635051, 2016, 9, 35, 51, 1, '2016-11-30', 0, '0000-00-00', 7),
(515, 539, 201635034, 2016, 9, 35, 34, 1, '2016-11-30', 0, '0000-00-00', 7),
(516, 540, 201635007, 2016, 9, 35, 7, 1, '2016-11-30', 0, '0000-00-00', 7),
(517, 541, 201635008, 2016, 9, 35, 8, 1, '2016-11-30', 0, '0000-00-00', 7),
(518, 542, 201643005, 2016, 11, 43, 5, 1, '2016-12-01', 0, '0000-00-00', 7),
(519, 543, 201643137, 2016, 11, 43, 137, 1, '2016-12-01', 0, '0000-00-00', 7),
(520, 544, 201643116, 2016, 11, 43, 116, 1, '2016-12-01', 0, '0000-00-00', 7),
(521, 545, 201643078, 2016, 11, 43, 78, 1, '2016-12-01', 0, '0000-00-00', 7),
(522, 546, 201643170, 2016, 11, 43, 170, 1, '2016-12-01', 0, '0000-00-00', 7),
(523, 547, 201643174, 2016, 11, 43, 174, 1, '2016-12-01', 0, '0000-00-00', 7),
(524, 548, 201643130, 2016, 11, 43, 130, 1, '2016-12-01', 0, '0000-00-00', 7),
(525, 549, 201643155, 2016, 11, 43, 155, 1, '2016-12-01', 0, '0000-00-00', 7),
(526, 550, 201643135, 2016, 11, 43, 135, 1, '2016-12-01', 0, '0000-00-00', 7),
(527, 551, 201643071, 2016, 11, 43, 71, 1, '2016-12-01', 0, '0000-00-00', 7),
(528, 515, 201619003, 2016, 5, 19, 3, 1, '2016-12-01', 0, '0000-00-00', 7),
(529, 552, 201642053, 2016, 11, 42, 53, 1, '2016-12-01', 0, '0000-00-00', 7),
(530, 553, 0, 2016, 5, 17, 32, 1, '2016-12-25', 0, '0000-00-00', 7),
(531, 554, 201617033, 2016, 5, 17, 33, 1, '2016-12-25', 0, '0000-00-00', 7),
(532, 555, 0, 2016, 5, 17, 34, 1, '2016-12-25', 0, '0000-00-00', 7),
(533, 556, 201617035, 2016, 5, 17, 35, 1, '2016-12-25', 0, '0000-00-00', 7),
(534, 557, 201617036, 2016, 5, 17, 36, 1, '2016-12-25', 0, '0000-00-00', 7),
(535, 558, 201617037, 2016, 5, 17, 37, 1, '2016-12-31', 0, '0000-00-00', 7),
(536, 559, 201633102, 2016, 9, 33, 102, 1, '2016-12-31', 0, '0000-00-00', 7),
(537, 560, 201721046, 2017, 6, 21, 46, 1, '2017-01-05', 0, '0000-00-00', 7),
(538, 15, 201642035, 2017, 11, 41, 1, 1, '2017-01-14', 0, '0000-00-00', 7),
(539, 9, 201642052, 2017, 12, 44, 1, 1, '2017-01-17', 0, '0000-00-00', 7),
(540, 562, 201744002, 2017, 12, 44, 2, 1, '2017-01-17', 0, '0000-00-00', 7),
(541, 563, 201744003, 2017, 12, 44, 3, 1, '2017-01-17', 0, '0000-00-00', 7);

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `STUDENT_ID` int(11) NOT NULL,
  `NAME` varchar(200) NOT NULL,
  `BIRTHDAY` date NOT NULL,
  `GENDER` varchar(10) NOT NULL,
  `RELIGION` varchar(50) NOT NULL,
  `BLOOD_GROUP` varchar(20) NOT NULL,
  `AGE` int(11) NOT NULL,
  `ADDRESS` text NOT NULL,
  `PHONE` varchar(50) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `FATHER_NAME` varchar(100) NOT NULL,
  `MOTHER_NAME` varchar(100) NOT NULL,
  `PUBLIC_ID` int(11) NOT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `CREATED_DATE` date NOT NULL,
  `UPDATED_BY` int(11) NOT NULL,
  `UPDATED_DATE` date NOT NULL,
  `STATUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`STUDENT_ID`, `NAME`, `BIRTHDAY`, `GENDER`, `RELIGION`, `BLOOD_GROUP`, `AGE`, `ADDRESS`, `PHONE`, `EMAIL`, `FATHER_NAME`, `MOTHER_NAME`, `PUBLIC_ID`, `CREATED_BY`, `CREATED_DATE`, `UPDATED_BY`, `UPDATED_DATE`, `STATUS`) VALUES
(1, 'Md.Shahriar Fahim', '2002-04-03', 'Male', 'Islam', 'A+', 14, 'MIrpur-2,Road no-4,Rupnagar,Dhaka', '01743882828', 'yyfahim59@gmail.com', 'Md.Durul Huda', 'Rehana Akter', 201642114, 1, '2016-11-20', 0, '0000-00-00', 7),
(2, 'Md.Shahriar Fahim', '2002-04-03', 'Male', 'Islam', 'A+', 14, 'MIrpur-2,Road no-4,Rupnagar,Dhaka', '01743882828', 'yyfahim59@gmail.com', 'Md.Durul Huda', 'Rehana Akter', 0, 1, '2016-11-20', 0, '0000-00-00', 7),
(3, 'Saimon Hosen', '2002-02-21', 'Male', 'Islam', 'B+', 14, 'Katlapur,Savar,Dhaka', '01955605795', '', 'Altab Hosen', 'Shirin Akter', 201642119, 1, '2016-11-20', 0, '0000-00-00', 7),
(4, 'Md.Sadhin Islam', '2001-12-16', 'Male', 'Islam', 'B+', 15, 'Zirani,Ashulia,Dhaka', '01723221813', '', 'Abdus Samad', 'Nasima Akter', 201642106, 1, '2016-11-20', 0, '0000-00-00', 7),
(5, 'Md.Anis', '2000-09-10', 'Male', 'Islam', 'B+', 16, 'Karatipara,Karatia,Tangail', '01771916653', '', 'Md,Rabi Miah', 'Anowara Begum', 201642080, 1, '2016-11-20', 0, '0000-00-00', 7),
(6, 'Ridoy Ahmed', '2002-08-08', 'Male', 'Islam', 'AB+', 14, 'Birpusia,Karatia,Tangail', '01726952439', '', 'Eisam Uddin', 'Pavin Begum', 201642051, 1, '2016-11-20', 0, '0000-00-00', 7),
(7, 'Abu Taher', '2003-02-05', 'Male', 'Islam', 'B+', 12, 'Alsha,Deldowar,Tangail', '01714376496', '', 'Saiful Islam', 'Selina Akter', 201642065, 1, '2016-11-20', 0, '0000-00-00', 7),
(8, 'Md.Shahriar', '2002-01-05', 'Male', 'Islam', 'B+', 14, 'Birpushia,Karatia,Tangsail', '01732320812', '', 'Md.Eman Ali', 'Kolpona Begum', 201642123, 1, '2016-11-20', 0, '0000-00-00', 7),
(9, 'Nazmul Hossain', '2003-03-26', 'Male', 'Islam', 'B+', 13, 'Birpushia,Karatia,Tangail', '01754491264', '', 'Md.Ripon Miah', 'Mst.Nazma Begum', 201642052, 1, '2016-11-20', 0, '0000-00-00', 7),
(10, 'Md.Kawsar Ahmed Siam', '2001-10-10', 'Male', 'Islam', 'B+', 15, 'Tangail Sadar', '01823004355', '', 'Md.Shakawat Hossen', 'Nurzahan Akter Kanta', 201642047, 1, '2016-11-20', 0, '0000-00-00', 7),
(11, 'Md.Limon Shikder', '2001-07-15', 'Male', 'Islam', 'B+', 15, 'Birpushia,Karatia,Tangail', '01733644678', '', 'Md.Fojlul Hoque', 'Monoara Begum', 201642050, 1, '2016-11-20', 0, '0000-00-00', 7),
(12, 'Md.Badhon Miah', '2003-02-15', 'Male', 'Islam', 'B+', 13, 'Alsha,Deldowar,Tangail', '01748754374', '', 'Babul Miah', 'Salma Begum', 201642064, 1, '2016-11-20', 0, '0000-00-00', 7),
(13, 'Md.Bijoy Mia', '2002-02-04', 'Male', 'Islam', 'B+', 14, 'Birpushia,karatia,Tangail', '01792681920', '', 'Belayet Hossain', 'Halima Begum', 201642040, 1, '2016-11-20', 0, '0000-00-00', 7),
(14, 'Md.Saidul Islam Bipu', '2002-03-01', 'Male', 'Islam', 'B+', 14, 'Hijial Hati,Baroi Para,Kalaiakur,Gazipur', '01767492112/01681810716', '', 'Md.Rafiqul Islam', 'Mst.Bilkis Begum', 201642043, 1, '2016-11-20', 0, '0000-00-00', 7),
(15, 'Md Rakib Miah', '2002-02-01', 'Male', 'Islam', 'B+', 14, 'Birpushia,Karatia,Tangail', '01741356301', '', 'Md.Mamun Miah', 'Mst.Shakila Begum', 201642035, 1, '2016-11-20', 0, '0000-00-00', 7),
(16, 'Md.Hasan Ali', '2002-04-20', 'Male', 'Islam', 'AB+', 14, 'Balitha,Shahabelishar,Dhamrai,Dhaka', '01959138937', '', 'Md.Sumon Ali', 'Hasina Begum', 201642085, 1, '2016-11-20', 0, '0000-00-00', 7),
(17, 'Jibon Miah', '2003-01-15', 'Male', 'Islam', 'B+', 13, 'Birpushia,Karatia,Tangail', '01729789461', '', 'Md.Anwar Miah', 'Hajera Begum', 201642126, 1, '2016-11-20', 0, '0000-00-00', 7),
(18, 'Yeaman Al Mobin', '2002-07-26', 'Male', 'Islam', 'B+', 14, 'Hazi Mohsin Road,Chadpur,Comilla', '01741172363', 'Aryeaman@yahoo.com', 'Shahalom Patoary', 'Shealina Begum', 201642099, 1, '2016-11-20', 0, '0000-00-00', 7),
(19, 'Sayem Ahmed', '2003-09-26', 'Male', 'Islam', 'A+', 13, 'Birpushia,Karatia,Tangail', '01753539494', 'Sayem62722@gmail.com', 'Tarikul Islam', 'Simu Akter', 201642105, 1, '2016-11-20', 0, '0000-00-00', 7),
(20, 'Md.Anik MIah', '1998-06-26', 'Male', 'Islam', 'B+', 18, 'Motora,Basail,Tangail', '01733882840', '', 'Md.Akkas Miah', 'Parvin Begum', 201642141, 1, '2016-11-20', 0, '0000-00-00', 7),
(21, 'Md Rakibul Hasan Rakib', '2001-11-08', 'Male', 'Islam', 'A+', 14, 'Kamar Para,Babo-Kha,Kotoalli,Rangpur', '01728691051/01715750481', '', 'Abdul Bari', 'Mst.Rashida Begum', 201642038, 1, '2016-11-20', 0, '0000-00-00', 7),
(22, 'Imran Ahmed Niloy', '2011-04-02', 'Male', 'Islam', 'A+', 6, 'Birpushia,Karatia,Tangail', '01819478172', '', 'Shamim Miah', 'Dilara Begum', 201609004, 1, '2016-11-20', 0, '0000-00-00', 7),
(23, 'Diya', '2010-04-13', 'Female', 'Islam', 'B+', 7, 'Birpushia,Karatia,Tangail', '01820066322', '', 'Rafiqul Islam', 'Dolly', 201609003, 1, '2016-11-20', 0, '0000-00-00', 7),
(24, 'Ashiqur Rahman Akash', '2009-01-03', 'Male', 'Islam', 'B+', 8, 'Birpushia,Karatia,Tangail', '01780047771', '', 'Azijul Haqu Tonok', 'Shopna', 201609002, 1, '2016-11-20', 0, '0000-00-00', 7),
(25, 'Md Jihad Mia', '2009-03-11', 'Male', 'Islam', 'B+', 7, 'Birpushia,Karatia,Tangail', '01732327208', '', 'Tipu Sultan', 'Moyna Begum', 201609013, 1, '2016-11-20', 0, '0000-00-00', 7),
(26, 'Maria Akter', '2010-08-28', 'Female', 'Islam', 'A+', 6, 'Alsha,Karatia,Tangail', '01720112865', '', 'Bisu Miah', 'Mitu Akter', 201609006, 1, '2016-11-20', 0, '0000-00-00', 7),
(27, 'Jannat', '2009-03-12', 'Female', 'islam', 'B+', 8, 'Maderjaney,Karatia,Tangail', '01715509771', '', 'Ayub Ali', 'Zabeda Akter', 201609012, 1, '2016-11-20', 0, '0000-00-00', 7),
(28, 'Israt Jahan Jerin', '2009-11-04', 'Female', 'Islam', 'B+', 8, 'Birpushia,Karatia,Tangail', '01728373937', '', 'Md.Yaqub Ali', 'Mrs.Soniya', 201609001, 1, '2016-11-20', 0, '0000-00-00', 7),
(29, 'Mohid', '2007-05-02', 'Male', 'Islam', 'B+', 9, 'Birpushia,Karatia,Tangail', '01741427125', '', 'Mannan', 'Panan', 201609015, 1, '2016-11-21', 0, '0000-00-00', 7),
(30, 'Israt Jahan Easa', '2008-11-17', 'Female', 'Islam', 'A+', 8, 'Motherjani,Karatia,Tangail', '01760627848', '', 'Md.Habib', 'Lovely', 201609008, 1, '2016-11-21', 0, '0000-00-00', 7),
(31, 'Eanur', '2008-05-29', 'Male', 'Islam', 'B+', 8, 'Birpushia,Karatia,Tangail', '01741391773', '', 'Matu Mia', 'Mst.China Akter', 201609014, 1, '2016-11-21', 0, '0000-00-00', 7),
(32, 'Nurnobi  Islam', '2009-10-30', 'Male', 'Islam', 'B+', 7, 'Birpushia,Karatia,Tangail', '017382111440', '', 'Md.Lal Mia', 'Arjina Begum', 201609010, 1, '2016-11-21', 0, '0000-00-00', 7),
(33, 'Junaidul Islam Jarif', '2009-10-03', 'Male', 'Islam', 'AB+', 7, 'Mir Kumulli,Delduar,Karatia,Tangail', '01740647976', '', 'Md.Saiful Islam', 'Jubaida Islam', 201609016, 1, '2016-11-21', 0, '0000-00-00', 7),
(34, 'Md.Tauhid', '2009-11-12', 'Male', 'Islam', 'AB+', 6, 'Birpushia,Karatia,Tangail', '01737679579', '', 'Md.Faruk', 'Mrs.Lovely', 201609011, 1, '2016-11-21', 0, '0000-00-00', 7),
(35, 'Md.Siam Hossen', '2009-09-02', 'Male', 'Islam', 'B+', 7, 'Birpushia,Karatia,Tangail', '01710174665', '', 'Md.Sobur Mia', 'Mst.Firoza Akter', 201609005, 1, '2016-11-21', 0, '0000-00-00', 7),
(36, 'Azim Islam', '1970-01-01', 'Male', 'Islam', 'B+', 10, 'Birpushia,Karatia,Tangail', '01700642625', '', 'Dulal Mia', 'Kolsum Begum', 201609017, 1, '2016-11-21', 0, '0000-00-00', 7),
(37, 'Sheikh Haris Hossain', '2009-09-03', 'Male', 'Islam', 'B+', 7, 'Alsha,Delduar,Tangail', '01794191553', '', 'Md.Hakim', 'Mitu', 0, 1, '2016-11-21', 0, '0000-00-00', 7),
(38, 'Md.Alif Mia', '2009-03-01', 'Male', 'Islam', 'A+', 7, 'Alsha,Karatia,Tangail', '01732629634', '', 'Md.Manik Mia', 'Mrs.Parven Begum', 201609001, 1, '2016-11-21', 0, '0000-00-00', 7),
(39, 'Meraz', '2007-06-08', 'Male', 'Islam', 'A+', 9, 'Birpushia,Karatia,Tangail', '01768389147', '', 'Md,Ismail', 'Bina', 201613002, 1, '2016-11-21', 0, '0000-00-00', 7),
(40, 'Mir Sani', '2007-01-25', 'Male', 'Islam', 'A+', 9, 'Birpushia,Karatia,Tangail', '01706266552', '', 'Mir Shahdat Hossen', 'Bina', 0, 1, '2016-11-21', 0, '0000-00-00', 7),
(41, 'Sabukun Nashar', '2016-07-25', 'Female', 'Islam', 'AB+', 9, 'Motherjani,Karatia,Tangail', '01712696189', '', 'Anamul Hauqe', 'Sufia Begum', 201613004, 1, '2016-11-21', 0, '0000-00-00', 7),
(42, 'Jannat Toa', '2010-10-02', 'Female', 'Islam', 'B+', 7, 'Birpushia,Karatia,Tangail', '01752733981', '', 'Md.Hasan KhAn', 'Mrs.Koly', 201613005, 1, '2016-11-21', 0, '0000-00-00', 7),
(43, 'Sumiya Khan', '2011-01-01', 'Female', 'Islam', 'B+', 6, 'Birpushia,Karatia,Tangail', '01764675300', '', 'Mr.Sumon Khan', 'Mrs.Asma Khanom', 201613006, 1, '2016-11-21', 0, '0000-00-00', 7),
(44, 'Khanduker Bokhtiar', '2009-09-17', 'Male', 'Islam', 'B+', 7, 'Birpushia,Karatia,Tangail', '01714679781', '', 'Khanduker Shamim', 'Beauty Begum', 201613007, 1, '2016-11-21', 0, '0000-00-00', 7),
(45, 'Urme', '2007-03-25', 'Female', 'Islam', 'A+', 9, 'Karatia Charpara,karatia,Tangail', '01750202516', '', 'Arif Hussain', 'Monowara', 201613008, 1, '2016-11-21', 0, '0000-00-00', 7),
(46, 'Labib Khandaker', '2008-08-22', 'Male', 'Islam', 'B+', 9, 'Kandapara,Karatia,Delduar,Tangail', '01866297102', '', 'KH. Murad', 'Luky Begum', 201613009, 1, '2016-11-21', 0, '0000-00-00', 7),
(47, 'Nabila Khandakar', '2008-01-07', 'Female', 'Islam', 'B+', 8, 'Alsha.Karatia,Delduar,Tangail', '01717472984', '', 'KH.Abdul Alim', 'RIna Begum', 201613010, 1, '2016-11-21', 0, '0000-00-00', 7),
(48, 'Afser Miah', '2007-01-01', 'Male', 'Islam', 'B+', 10, 'Alsha,Karatia,Delduar,Tangail', '01719870049', '', 'Md.Solaiman Miah', 'Kohinor Begum', 201613012, 1, '2016-11-21', 0, '0000-00-00', 7),
(49, 'Irin', '2007-01-01', 'Female', 'Islam', 'B+', 10, 'Birpushia,Karatia,Tangail', '', '', 'Alom Miah', 'Asma', 201613013, 1, '2016-11-21', 0, '0000-00-00', 7),
(50, 'Abdullah', '2007-01-01', 'Male', 'Islam', 'B+', 10, 'Tangail', '01738083041', '', 'Arzu Miah', 'Sonya', 201613011, 1, '2016-11-21', 0, '0000-00-00', 7),
(51, 'Shuvo', '2008-01-04', 'Male', 'Islam', 'B+', 8, 'Nahali,Karatia,Basail,Tangail', '01712871211', '', 'Nazmul Haq Babu', 'Nilufa Begum', 201613015, 1, '2016-11-21', 0, '0000-00-00', 7),
(52, 'Arafat', '2009-08-13', 'Male', 'Islam', 'B+', 8, 'Alsha,Karatia,Delduar,Tangail', '01731040550', '', 'Md.Lal Mia', 'Rina Begum', 201613016, 1, '2016-11-21', 0, '0000-00-00', 7),
(53, 'Zannatul Tiya', '2009-08-24', 'Female', 'Islam', 'A+', 7, 'Birpushia,Karatia,Tangail', '01776244868/01733440857', '', 'Arif Sarker', 'Putul Sarker', 201613017, 1, '2016-11-21', 0, '0000-00-00', 7),
(54, 'Nafis Ahmed', '2008-09-18', 'Male', 'Islam', 'B+', 8, 'Karatia Charpara,Karatia,Tangail', '01738093630', '', 'Abdul Hashim', 'Nazmin', 201613018, 1, '2016-11-21', 0, '0000-00-00', 7),
(55, 'Momo Hamid', '2007-09-29', 'Female', 'Islam', 'B+', 10, 'Karatia Charpara,Karatia,Tangail', '01552102718', '', 'Abdul Hamid', 'Afrosa Begum', 201613020, 1, '2016-11-21', 0, '0000-00-00', 7),
(56, 'Siam Mia', '2008-10-08', 'Male', 'Islam', 'B+', 8, 'Alsha,Karatia,Delduar,Tangail', '', '', 'Md.Sona Mia', 'Ms.Salma Begum', 201613022, 1, '2016-11-21', 0, '0000-00-00', 7),
(57, 'Shorna Saha', '2008-01-23', 'Female', 'Sanatan Hindu', 'B+', 8, 'Karati Para,Karatia,Basail,Tangail', '01760836053/01716400177', '', 'Ashish Kumar Saha', 'Samapti Saha', 201613023, 1, '2016-11-21', 0, '0000-00-00', 7),
(58, 'Manika Saha', '2008-11-03', 'Female', 'Hindu', 'B+', 8, 'Karati Para,Karatia,Basail,Tangail', '01712568953', '', 'Sahadeb Saha', 'Hasi Saha', 201613024, 1, '2016-11-21', 0, '0000-00-00', 7),
(59, 'Jubaida Jahan Usha', '2010-09-10', 'Female', 'Islam', 'AB+', 7, 'Birpushia,Karatia,Tangail', '01717830575', '', 'Shoriful Islam Babul', 'Nasrin Shorif', 201613025, 1, '2016-11-21', 0, '0000-00-00', 7),
(60, 'shajan', '2008-01-01', 'Male', 'Islam', 'B+', 8, 'Karatia Charpara,Karatia,Tangail', '01754790903', '', 'Milon Ahmed', 'Sumi', 201613026, 1, '2016-11-21', 0, '0000-00-00', 7),
(61, 'Shihab Uddin Shoyeb', '2005-12-05', 'Male', 'Islam', 'B+', 11, 'Maspara,Shadullapure,Gaibandha', '01725699152/01725341239', '', 'Mizanur Rahman Mizan', 'Sherin Akter', 201621001, 1, '2016-11-21', 0, '0000-00-00', 7),
(62, 'Dila Khandaker', '2006-06-20', 'Female', 'Islam', 'A+', 10, 'Kandapara,Delduar,Karatia,Tangail', '01758252576', 'Dila@gmail.com', 'Kh.Dilshad Hossen', 'Bithi Kh.', 201621002, 1, '2016-11-21', 0, '0000-00-00', 7),
(63, 'Dola Akter', '2007-02-01', 'Female', 'Islam', 'A+', 9, 'Birpushia,Karatia,Tangail', '', '', 'Dulal Mia', 'Selina Begum', 201621003, 1, '2016-11-21', 0, '0000-00-00', 7),
(64, 'Md.Elius Hossain Bijoy', '2006-02-28', 'Male', 'Islam', 'A+', 11, 'Sharidpur,Damudda,Dhaka', '01924720569', '', 'Md.Dulal Mazi', 'Beauty Begum', 201621005, 1, '2016-11-21', 0, '0000-00-00', 7),
(65, 'Shohag Miah', '2007-01-12', 'Male', 'Islam', 'B+', 11, 'Karatia charpara,Karatia,Tangail', '01786488948', '', 'Uzzal Hossain', 'Nargis Begum', 201621006, 1, '2016-11-21', 0, '0000-00-00', 7),
(66, 'Kh.Sazzad Hossain Numan', '2006-10-29', 'Male', 'Islam', 'B+', 10, 'Birpushia,Karatia,Tangail', '01732141508', '', 'KH.Motaleb', 'Nargis', 201621008, 1, '2016-11-21', 0, '0000-00-00', 7),
(67, 'Md.Anik MIah', '2007-01-01', 'Male', 'Islam', 'B+', 10, 'Birpushia,Karatia,Tangail', '01718195457', '', 'Md.Alom Miah', 'Ms.Kazal Begum', 201621010, 1, '2016-11-21', 0, '0000-00-00', 7),
(68, 'Aysha Khan Rupa', '2008-03-10', 'Female', 'Islam', 'B+', 9, 'Birpushia,Karatia,Tangail', '01797467953', '', 'Romez Uddin Khan', 'Mst,Salma Khanum', 201621011, 1, '2016-11-21', 0, '0000-00-00', 7),
(69, 'Rejaul Karim Rimon', '2007-01-01', 'Male', 'Islam', 'B+', 12, 'Alsha,Delduar,Karatia,Tangail', '01747261832', '', 'Rafiqul Islam', 'Afroza Begum', 201621012, 1, '2016-11-21', 0, '0000-00-00', 7),
(70, 'Sharmin Akter', '2007-11-22', 'Female', 'Islam', 'B+', 9, 'Birpushia,Karatia,Tangail', '01788161884', '', 'Jamal Talukder', 'Salma Begum', 201621013, 1, '2016-11-22', 0, '0000-00-00', 7),
(71, 'Sonia Akter', '2006-05-04', 'Female', 'Islam', 'B+', 10, 'Birpushia,Karatia,Tangail', '01788161884', '', 'Jamal Talukder', 'Salma Begum', 201621014, 1, '2016-11-22', 0, '0000-00-00', 7),
(72, 'Md. Manir Sarker', '2006-08-23', 'Male', 'Islam', 'B+', 10, 'Birpushia,Karatia,Tangail', '01715814465', '', 'Shahin Sarker', 'Shumi Begum', 201621015, 1, '2016-11-22', 0, '0000-00-00', 7),
(73, 'Abdullah Hel Kafi Saad', '2007-01-01', 'Male', 'Islam', 'B+', 10, 'Birpushia,Karatia,Tangail', '01990492890', '', 'Safayet Hossain', 'Monira Begum', 201621016, 1, '2016-11-22', 0, '0000-00-00', 7),
(74, 'Khandaker Antar', '2008-04-22', 'Male', 'Islam', 'B+', 8, 'Birpushia,Karatia,Tangail', '01730604116', '', 'Md.Ripon Miah', 'Urmi Begum', 201621017, 1, '2016-11-22', 0, '0000-00-00', 7),
(75, 'Apon Mia', '2005-01-01', 'Male', 'Islam', 'B+', 10, 'Alsha,Karatia,Delduar,Tangail', '01739590044', '', 'Alal Mia', 'Shin Begum', 201621018, 1, '2016-11-22', 0, '0000-00-00', 7),
(76, 'KH.Tangid', '2005-09-13', 'Male', 'Islam', 'B+', 10, 'Kandapara,Karatia,Delduar,Tangail', '01747895994', 'Tangid@gmail.com', 'KH.Bellal', 'Jahura KH.', 201621019, 1, '2016-11-22', 0, '0000-00-00', 7),
(77, 'shimul Ahmed', '2008-07-05', 'Male', 'Islam', 'B+', 9, 'Birpushia,Karatia,Tangail', '01762243111', '', 'Nurul Islam', 'Shewli Begum', 201621020, 1, '2016-11-22', 0, '0000-00-00', 7),
(78, 'Israt Jahan Elma', '2006-06-29', 'Female', 'Islam', 'B+', 10, 'Birpushia,Karatia,Tangail', '', '', 'Md.Johirul Islam', 'Mst.Shahana Begum', 201621021, 1, '2016-11-22', 0, '0000-00-00', 7),
(79, 'Md.Iashin Arafat Miah', '2005-02-10', 'Male', 'Islam', 'B+', 11, 'Alsha,Karatia,Delduar,Tangail', '01714376496', '', 'Saiful Islam', 'Selina Akter', 201617022, 1, '2016-11-22', 0, '0000-00-00', 7),
(80, 'Md.Mahabub Hasan Siam', '2008-01-20', 'Male', 'Islam', 'B+', 9, 'Karatia Charpara,Karatia,Tangail', '01733273856', '', 'Md.Healal Uddin', 'Shahina Akter Munni', 201621023, 1, '2016-11-22', 0, '0000-00-00', 7),
(81, 'Abdula Rohoman Alve', '2007-03-24', 'Male', 'Islam', 'B+', 9, 'Alsha,Karatia,Delduar,Tangail', '01711513182', '', 'Md.Manerul Islam', 'Amina Khatun', 201621024, 1, '2016-11-22', 0, '0000-00-00', 7),
(82, 'Piyel', '2006-12-07', 'Female', 'Hindu', 'AB+', 9, 'Alsha,Delduar,Karatia,Tangail', 'o1794191553', '', 'Md.Hakim', 'Mrs.MItu', 201621027, 1, '2016-11-22', 0, '0000-00-00', 7),
(83, 'Tuhin Mullah', '2004-04-04', 'Male', 'Islam', 'B+', 12, 'Birpushia,Karatia,Tangail', '01871671618', '', 'Mohsin MullahAd', 'Adury Begum', 201621027, 1, '2016-11-22', 0, '0000-00-00', 7),
(84, 'Merin Afrin Mona', '2006-06-28', 'Male', 'Islam', 'B+', 10, 'Birpushia,Karatia,Tangail', '01716759523', '', 'Rafiqul Islam', 'Beauty Begum', 201621029, 1, '2016-11-22', 0, '0000-00-00', 7),
(85, 'Md.Ripon Islam', '2004-08-28', 'Male', 'Islam', 'A+', 12, 'Tangail', '01772509365', '', 'Md.Hamid', 'Mrs.Nazmsa', 201617030, 1, '2016-11-22', 0, '0000-00-00', 7),
(86, 'Md.Nasir', '2007-01-22', 'Male', 'Islam', 'B+', 9, 'Birpushia,karatia,Tangail', '01779622178', 'Nasir@gmail.com', 'KH.Shohel', 'KH.Naeema', 201621031, 1, '2016-11-22', 0, '0000-00-00', 7),
(87, 'Atifa Khandoker Alo', '2006-01-01', 'Female', 'Islam', 'A+', 10, 'Kandapara,Deldoar,Karatia,Tangail', '01677942190', 'Atifa@gmail.com', 'KH.Aminul Islam', 'Lipi Kh.', 201621032, 1, '2016-11-22', 0, '0000-00-00', 7),
(88, 'Habiba', '2006-01-01', 'Female', 'Islam', 'B+', 10, 'Kandapara,Delduar,Karatia,Tangail', '01725114772', '', 'Lavlu Miah', 'Josna Begum', 201621033, 1, '2016-11-22', 0, '0000-00-00', 7),
(89, 'sazid Miah', '2017-01-07', 'Male', 'Islam', 'B+', 9, 'Birpushia,Karatia,Tangail', '', '', 'Selim Miah', 'Sabina Akter', 201621034, 1, '2016-11-22', 0, '0000-00-00', 7),
(90, 'Sirajul Islam', '2006-01-01', 'Male', 'Islam', 'B+', 10, 'Tangail', '', '', 'Jamal Islam', 'Mamata', 201621035, 1, '2016-11-22', 0, '0000-00-00', 7),
(91, 'Gour Raj Bangshi', '2006-11-25', 'Male', 'Hindu', 'A+', 9, 'Karatipara,Karatia,Basail,Tangail', '01727051419', '', 'Junto Raj Bangshi', 'Alladi Raj Bangshi', 201621036, 1, '2016-11-22', 0, '0000-00-00', 7),
(92, 'Md.Akash', '2005-12-29', 'Male', 'Islam', 'B+', 11, 'Ranigram', '01735618077', '', 'Md.Abtear', 'Alalea Begum', 201621038, 1, '2016-11-22', 0, '0000-00-00', 7),
(93, 'Anisha Islam Eva', '2006-01-01', 'Female', 'islam', 'B+', 10, 'Matherjani,karatia,Tangail', '01741847296', '', 'Eyakub', 'Beauty', 201621039, 1, '2016-11-22', 0, '0000-00-00', 7),
(94, 'Siam Miah', '2005-03-27', 'Male', 'Islam', 'B+', 10, 'Birpushia,karatia,Tangail', '01774893474', '', 'Abdur Rashid Miah', 'Md.Romela Begum', 201621040, 1, '2016-11-22', 0, '0000-00-00', 7),
(95, 'Mazid Miah', '2006-07-25', 'Male', 'Islam', 'B+', 10, 'Birpushia,Karatia,Tangail', '01628222705', '', 'Sujon Ali', 'Salma Begum', 201621041, 1, '2016-11-22', 0, '0000-00-00', 7),
(96, 'Rehat', '2007-06-01', 'Male', 'Islam', 'B+', 9, 'Alsha,Karatia,Delduar,Tangail', '01785668772', '', 'Alam Miah', 'Alow Begum', 201621042, 1, '2016-11-22', 0, '0000-00-00', 7),
(97, 'Md.Faysal', '2006-09-04', 'Male', 'Islam', 'B+', 10, 'Pakulla,Mirzapur,Tangail', '01739830867', '', 'Md.Nasir Uddin', 'Mrs.Poly Begum', 201621045, 1, '2016-11-22', 0, '0000-00-00', 7),
(98, 'Sigma', '2005-05-30', 'Female', 'Islam', 'B+', 11, 'Mir Kumulli,Karatia', '01736704694', '', 'Malek', 'Eti', 201625035, 1, '2016-11-22', 0, '0000-00-00', 7),
(99, 'Tamim', '2006-10-20', 'Male', 'Islam', 'B+', 10, 'Birpushia,Karatia,Tangail', '01710821431', '', 'Mostofa', 'Lily', 201625001, 1, '2016-11-22', 0, '0000-00-00', 7),
(100, 'srabon', '2006-03-24', 'Male', 'Islam', 'B+', 10, 'Birpushia,Karatia,Tangail', '01746230427', '', 'Samsul', 'Bithi', 201625002, 1, '2016-11-22', 0, '0000-00-00', 7),
(101, 'MIm Akter', '2006-10-26', 'Female', 'Islam', 'A+', 10, 'Alsha,karatia,Delduar,Tangail', '01732629634', '', 'Md.Manik Mia', 'Mrs.Parven Begum', 201625003, 1, '2016-11-22', 0, '0000-00-00', 7),
(102, 'Hossain Mahmud Zihad', '2005-11-17', 'Male', 'Islam', 'B+', 11, 'Birpushia,Karatia,Tangail', '01715813790', '', 'Abdur Rahim', 'Jhora Begum', 201625004, 1, '2016-11-22', 0, '0000-00-00', 7),
(103, 'Shazidur', '2006-10-15', 'Male', 'Islam', 'B+', 10, 'Birpushia,Karatia,Tangail', '01746096263', '', 'Ahasan Habib', 'Suma', 201625005, 1, '2016-11-22', 0, '0000-00-00', 7),
(104, 'Nusrat Jahan', '2006-12-10', 'Female', 'Islam', 'B+', 10, 'Birpushia,Karatia,Tangail', '01726413858', '', 'Mir Mithu Miah', 'Afroja Akter', 201625006, 1, '2016-11-22', 0, '0000-00-00', 7),
(105, 'Sifat Miah', '2006-03-14', 'Male', 'Islam', 'B+', 10, 'Karatia Charpara,Karatia,Tangail', '01725126293', '', 'Md.Hasan Miah', 'shahajadi', 201625007, 1, '2016-11-22', 0, '0000-00-00', 7),
(106, 'Sumaya Mitu', '2006-11-30', 'Female', 'Islam', 'B+', 10, 'Birpushia,Karatia,Tangail', '01709768486', '', 'Motiur Rohoman', 'Batashi Begum', 201625008, 1, '2016-11-22', 0, '0000-00-00', 7),
(107, 'Md.Ismail Hossen', '2004-08-29', 'Male', 'Islam', 'A+', 12, 'Dhaka Gandareya 29/A/35', '01758100525', '', 'Md Monir Hossen', 'Maya Akter', 201625009, 1, '2016-11-22', 0, '0000-00-00', 7),
(108, 'Shakib Talukder Siam', '2007-04-25', 'Male', 'Islam', 'B+', 10, 'Khakjana,Karatia,Tangail', '01718264615', '', 'Selim Talukder', 'Kolpona Talukder', 201625010, 1, '2016-11-22', 0, '0000-00-00', 7),
(109, 'Saima Akter', '2006-08-29', 'Female', 'Islam', 'B+', 10, 'Alsha,Karatia,Delduar,Tangail', '01732867120', '', 'Razoun', 'Halima Akter', 201625011, 1, '2016-11-22', 0, '0000-00-00', 7),
(110, 'Ridoy Rahaman', '2006-01-01', 'Male', 'Islam', 'B+', 10, 'Birpushia,Karatia,Tangail', '01794054516', '', 'Arzu Miah', 'Sonya', 201625012, 1, '2016-11-22', 0, '0000-00-00', 7),
(111, 'Joy Ghosh', '2005-09-04', 'Male', 'Hindu', 'AB+', 11, 'Karatia,Tangail', '01711489453', '', 'Nimai Ghosh', 'Suborna ghosh', 201621013, 1, '2016-11-22', 0, '0000-00-00', 7),
(112, 'Md.Tauhid Sarkar', '2005-12-29', 'Male', 'Islam', 'B+', 11, 'Nandercla,Bolli,Kaliyakur,Gazipur', '01991580375', '', 'Md.Sharif Uddin', 'Salma Begum', 201625015, 1, '2016-11-22', 0, '0000-00-00', 7),
(113, 'Shams Mulla', '2006-10-20', 'Male', 'Islam', 'A+', 10, 'Birpushia,Karatia,Taangail', '01768066939', '', 'Shahin Mulla', 'Lutfa Begum', 201625016, 1, '2016-11-22', 0, '0000-00-00', 7),
(114, 'Yesin Arafat', '2006-05-03', 'Male', 'Islam', 'B+', 11, 'Birpushia,Karatia,Tangail', '', '', 'Helal Mia', 'Shanaj Begum', 201625017, 1, '2016-11-22', 0, '0000-00-00', 7),
(115, 'Tazim', '2006-10-08', 'Male', 'Islam', 'B+', 11, 'Birpushia,Karatia,Tangail', '01716098057', '', 'Shale', 'Taslema Akter', 201625018, 1, '2016-11-22', 0, '0000-00-00', 7),
(116, 'Abdulahil Kafi', '2006-01-01', 'Male', 'Islam', 'B+', 10, 'Kandapara,Karatia,Delduar,Tanngail', '01746079490', '', 'Md.Jafar Igbal', 'Rina Begum', 201625019, 1, '2016-11-22', 0, '0000-00-00', 7),
(117, 'Suddo', '2005-12-05', 'Male', 'Islam', 'B+', 11, 'Birpushia,Karatia,Tangail', '01718152009', '', 'Faruk', 'Morana', 201625020, 1, '2016-11-22', 0, '0000-00-00', 7),
(118, 'Asik Miah', '2005-03-17', 'Male', 'Islam', 'B+', 11, 'Birpushia,Karatia,Tangail', '01738211440', '', 'Md.Siddik Mia', 'Acia Begum', 201625021, 1, '2016-11-22', 0, '0000-00-00', 7),
(119, 'Tanvir Hossain Khan', '2006-10-08', 'Male', 'Islam', 'A+', 10, 'Boirpushia,Karatia,Tangail', '01726505632', '', 'Romez', 'Salma', 201625022, 1, '2016-11-22', 0, '0000-00-00', 7),
(120, 'Asif Mia', '2006-08-16', 'Male', 'Islam', 'B+', 10, 'Birpushia,Karatia,Tangail', '01721906406', '', 'Hamid Mia', 'Asma Begum', 201625025, 1, '2016-11-22', 0, '0000-00-00', 7),
(121, 'Ashik', '2005-05-05', 'Male', 'Islam', 'B+', 11, 'Karatia,Tangail', '01721291528', '', 'Malak', 'Asma', 201625026, 1, '2016-11-22', 0, '0000-00-00', 7),
(122, 'Sajib Ahmed Midul', '2005-05-05', 'Male', 'Islam', 'AB+', 11, 'Shafipur,Kaliyakur,Gazipur', '01969123620', '', 'Mozibur Rahman', 'Ritu Borna', 201625027, 1, '2016-11-22', 0, '0000-00-00', 7),
(123, 'Dauan Zihad', '2006-01-01', 'Male', 'Islam', 'B+', 10, 'Delduar,Tangail', '01915111396', '', 'Bahadur Dauan', 'Jarina', 201625031, 1, '2016-11-22', 0, '0000-00-00', 7),
(124, 'Md.Waliullah', '2005-01-01', 'Male', 'Islam', 'B+', 11, 'Mugdha,Dhaka', '01917512397', '', 'Md.Abdul Gaffer', 'Samsun Nahar', 201625032, 1, '2016-11-22', 0, '0000-00-00', 7),
(125, 'Simanto Saha', '2006-04-29', 'Male', 'Hindu', 'B+', 10, 'Karatipara,Basail,Tangail', '01711518022', '', 'Ram Saha', 'Shuly Saha', 201625033, 1, '2016-11-22', 0, '0000-00-00', 7),
(126, 'Abdur Rahim', '2006-01-12', 'Male', 'Islam', 'B+', 10, 'Alsha,Karatia,Delduar,Tangail', '01746007172', '', 'Md.Sona Mia', 'Saima Begum', 201625034, 1, '2016-11-22', 0, '0000-00-00', 7),
(127, 'Abu Darda', '2006-11-20', 'Male', 'Islam', 'B+', 10, 'Alsha,Karatia,Delduar,Tangail', '01730187214', '', 'Ataur Rahman', 'Mirza Lina', 201625036, 1, '2016-11-22', 0, '0000-00-00', 7),
(128, 'Sihab', '2006-06-29', 'Male', 'Islam', 'B+', 10, 'Alsha,Karatia,Delduar,Tangail', '01715071200', '', 'Md.Adu Miah', 'Mrs.Sundury Begum', 201625038, 1, '2016-11-23', 0, '0000-00-00', 7),
(129, 'Sima Akter', '2004-07-16', 'Female', 'Islam', 'B+', 12, 'Alsha,Karatia,Delduar,Tangail', '01715071200', '', 'Md.Adu Miah', 'Mrs.Sondory Begum', 201625039, 1, '2016-11-23', 0, '0000-00-00', 7),
(130, 'MIm', '2003-11-23', 'Female', 'Islam', 'B+', 13, 'Alsha,Karatia,Delduar,Tangail', '01714237743', '', 'Alom Miah', 'Alo', 201625037, 1, '2016-11-23', 0, '0000-00-00', 7),
(131, 'Naimur Al Sabib', '2011-11-19', 'Male', 'Islam', 'A+', 6, 'Birpushia,Karatia,Tangail', '01760942870', '', 'Rasel Miah', 'Salma Akter', 201605001, 1, '2016-11-23', 0, '0000-00-00', 7),
(132, 'Eash Akter', '2010-01-19', 'Female', 'Islam', 'B+', 6, 'Alsha,Karatia,Delduar,Tangail', '01722249416', '', 'Md.Arshad Miah', 'Mrs.Mitu Akter', 0, 1, '2016-11-23', 0, '0000-00-00', 7),
(133, 'Eash Akter', '2010-01-19', 'Female', 'Islam', 'B+', 6, 'Alsha,Karatia,Delduar,Tangail', '01722249416', '', 'Md.Arshad Miah', 'Mrs.Mitu Akter', 201605006, 1, '2016-11-23', 0, '0000-00-00', 7),
(134, 'Eash Akter', '2010-01-19', 'Female', 'Islam', 'B+', 6, 'Alsha,Karatia,Delduar,Tangail', '01722249416', '', 'Md.Arshad Miah', 'Mrs.Mitu Akter', 0, 1, '2016-11-23', 0, '0000-00-00', 7),
(135, 'Md Fahad', '2010-11-29', 'Male', 'Islam', 'B+', 6, 'Birpushia,Karatia,Tangail', '01727617452', '', 'Md.Alamgir', 'Ayesha', 201605003, 1, '2016-11-23', 0, '0000-00-00', 7),
(136, 'Samir', '2011-08-01', 'Male', 'Islam', 'B+', 5, 'Birpushia,Karatia,Tangail', '01720609844', '', 'Shafiqul Islam', 'Shahanag', 201605004, 1, '2016-11-23', 0, '0000-00-00', 7),
(137, 'Fariya Naznin Sumona', '2011-02-02', 'Female', 'Islam', 'B+', 5, 'Birpushia,Karatia,Tangail', '01716098171/01712529327', 'Fahmid8319@gmail.com', 'Md.Faruk Ahmed', 'Moly Akter', 201605005, 1, '2016-11-23', 0, '0000-00-00', 7),
(138, 'Mithun Rahman', '2011-09-30', 'Male', 'Islam', 'B+', 5, 'Birpushia,Karatia,Tangail', '01813920764', '', 'Md.Hafizur Rahman', 'Mrs.Bethi', 201605006, 1, '2016-11-23', 0, '0000-00-00', 7),
(139, 'Mir Imtiaz Ahammed Razin', '2011-01-01', 'Male', 'Islam', 'B+', 5, 'Birpushia,Karatia,Tangail', '01716831866', '', 'Mir Arshad Ali Khokon', 'Mrs.Rehena Islam', 201605007, 1, '2016-11-23', 0, '0000-00-00', 7),
(140, 'Musa Mia', '2010-05-25', 'Male', 'Islam', 'B+', 5, 'Karatia Charpara,Karatia,Tangail', '01725126293', '', 'Md.Hasan Miah', 'Shahajadi Begum', 201605008, 1, '2016-11-23', 0, '0000-00-00', 7),
(141, 'Tangina Akter Tanha', '2011-09-10', 'Female', 'Islam', 'B+', 5, 'Birpushia,Karatia,Tangail', '01789877570', '', 'Rabiul Mollah', 'Rabaka Akter', 201605009, 1, '2016-11-23', 0, '0000-00-00', 7),
(142, 'Sinha', '2009-11-28', 'Female', 'Islam', 'B+', 7, 'Karatia Charpara,Karatia,Tangail', '01733449996', '', 'Shafikul', 'Tania', 201605010, 1, '2016-11-23', 0, '0000-00-00', 7),
(143, 'Shekh Md.Huzaifa', '2011-05-16', 'Male', 'Islam', 'B+', 5, 'Alsha,Karatia,Delduar,Tangail', '01730187214', '', 'Ataur Rahman', 'Mirza Lina', 201605012, 1, '2016-11-23', 0, '0000-00-00', 7),
(144, 'Md.Rafine Miah', '2009-11-15', 'Male', 'Islam', 'B+', 7, 'Alsha,Karatia,Delduar,Tangail', '01733644666', '', 'Md.Rofiqul Islam', 'Rozina Begum', 201605013, 1, '2016-11-23', 0, '0000-00-00', 7),
(145, 'KH.Abir', '2010-06-05', 'Male', 'Islam', 'B+', 5, 'Alsha,Karatia,Delduar,Tangail', '01760256899', '', 'KH.Akkas', 'Doly Begum', 201605014, 1, '2016-11-24', 0, '0000-00-00', 7),
(146, 'Arafat Molla', '2012-10-10', 'Male', 'Islam', 'B+', 4, 'Birpushia,Karatia,Tangail', '01713580754', '', 'Arif Molla', 'Salma', 201605015, 1, '2016-11-24', 0, '0000-00-00', 7),
(147, 'Shimya Shultana Tisha', '2010-08-03', 'Female', 'Islam', 'B+', 6, 'Birpushia,Karatia,Tangail', '01715414015', '', 'Md.Rafiqul Islam', 'Angury Begum', 201606017, 1, '2016-11-24', 0, '0000-00-00', 7),
(148, 'Azmi Islam Anmoon', '2010-01-09', 'Female', 'Islam', 'A+', 6, 'Madarjani,Karatia,Tangail', '01739721057', '', 'Md.Azizul Islam', 'Mst.Salma Begum', 201605016, 1, '2016-11-24', 0, '0000-00-00', 7),
(149, 'Md.Naimul Islam', '2010-01-08', 'Male', 'Islam', 'B+', 6, 'Alsha,Karatia,Delduar,Tangail', '01765847191', '', 'Md.Alim Mia', 'Nacima', 201605018, 1, '2016-11-24', 0, '0000-00-00', 7),
(150, 'Shihab Ahmed', '2012-02-29', 'Male', 'Islam', 'B+', 4, 'Birpushia,Karatia,Tangail', '01709536449', '', 'Alom Khan', 'Shiuly Begum', 201605019, 1, '2016-11-24', 0, '0000-00-00', 7),
(151, 'Neha Akter Katha', '2010-09-24', 'Female', 'Islam', 'B+', 6, 'Karatia Charpara,Karatia,Tangail', '01731910597', '', 'Ramjan Miah', 'Sadika Begum', 201605020, 1, '2016-11-24', 0, '0000-00-00', 7),
(152, 'Tamim Hasan', '2010-07-17', 'Male', 'Islam', 'B+', 6, 'Birpushia,Karatia,Tangail', '01795653604', '', 'Shamim Mia', 'Hasi Akter', 201605021, 1, '2016-11-24', 0, '0000-00-00', 7),
(153, 'Rakibul Islam Refat', '2010-06-10', 'Male', 'Islam', 'B+', 6, 'Birpushia,Karatia,Tangail', '01705600430', '', 'Abdul Kalam Azad', 'Rubi Akter', 201606022, 1, '2016-11-24', 0, '0000-00-00', 7),
(154, 'Khan Tahsanul Islam Limon', '2011-02-26', 'Male', 'Islam', 'B+', 5, 'Kandapara,Karatia,Delduar,Tangail', '01720295382', '', 'Ajahar Ali', 'Rabea Akter', 201605023, 1, '2016-11-24', 0, '0000-00-00', 7),
(155, 'Sumaia Akter', '2010-11-04', 'Female', 'Islam', 'B+', 7, 'Birpushia,Karatia,Tangail', '01726090748', '', 'Md.Harun Or Rashid', 'Parvin Akter', 201605024, 1, '2016-11-24', 0, '0000-00-00', 7),
(156, 'Sadia Jannat', '2009-11-07', 'Female', 'Islam', 'B+', 7, 'Alsha,Karatia,Delduar,Tangail;', '01919485185', '', 'Md.Sujon Ahmed', 'Mrs.Nurunnahar Akter', 201605025, 1, '2016-11-24', 0, '0000-00-00', 7),
(157, 'Ahona Ahmed Arthi', '2010-12-26', 'Female', 'Islam', 'B+', 5, 'Mirkumulli,Karatia,Delduar,Tangail', '01872346696', '', 'Uzzal Miah', 'Shahina Khatun', 201605026, 1, '2016-11-24', 0, '0000-00-00', 7),
(158, 'Mahammad Nafis Abedin', '2010-08-15', 'Male', 'Islam', 'B+', 6, 'Birpushia,Karatia,Tangail', '01709742954', '', 'Mohammad Joynal Abedin', 'Mrs.Sanjida Akter', 201605006, 1, '2016-11-24', 0, '0000-00-00', 7),
(159, 'Khadiza Akter', '2010-10-15', 'Female', 'Islam', 'B+', 6, 'Alsha,Karatia,Delduar,Tangail', '01732867120', '', 'Chad Miah', 'Fahima Begum', 201605028, 1, '2016-11-24', 0, '0000-00-00', 7),
(160, 'Khandakar Dinil Hosen', '2011-12-20', 'Male', 'Islam', 'A+', 5, 'Kandapara,Karatia,Delduar,Tangail', '01758252576', 'Dinil@gmail.com', 'KH.Dilshad Hosen', 'Bithi Kh.', 201601001, 1, '2016-11-24', 0, '0000-00-00', 7),
(161, 'Shohag Islam Shaion', '2013-02-10', 'Male', 'Islam', 'B+', 4, 'Birpushia,Karatia,Tangail', '01731810238/01777094800', '', 'Farhad Mia', 'Soma Begum', 201601002, 1, '2016-11-24', 0, '0000-00-00', 7),
(162, 'Reshob Ghosh', '2012-07-29', 'Male', 'Hindu', 'O+', 4, 'Motherjani,karatia,Tangail', '01726473339', '', 'Junto Ghosh', 'Sathi Ghosh', 201601003, 1, '2016-11-24', 0, '0000-00-00', 7),
(163, 'Zubayar', '2012-01-22', 'Male', 'Islam', 'B+', 4, 'Karatia,,Tangail', '01791355136', '', 'Zasim', 'Satu Begum', 201601004, 1, '2016-11-24', 0, '0000-00-00', 7),
(164, 'shohana', '2010-12-07', 'Female', 'Islam', 'B+', 6, 'Karatia Charpara,karatia,Tangail', '01728529312', '', 'Sohel mia', 'Kohinur', 201601005, 1, '2016-11-24', 0, '0000-00-00', 7),
(165, 'Muntaha Mim Himu', '2011-05-14', 'Female', 'Islam', 'B+', 4, 'Birpushia,Karatia,Tangail', '01746601623', '', 'Jahhid Hasan', 'Parvin', 201601006, 1, '2016-11-24', 0, '0000-00-00', 7),
(166, 'Sadia Afrin Towa', '2011-10-30', 'Female', 'Islam', 'B+', 4, 'Tangail', '01734278832', '', 'Abdul karim', 'Fahima Begum', 201601007, 1, '2016-11-24', 0, '0000-00-00', 7),
(167, 'KH.Riham', '2011-12-08', 'Male', 'Islam', 'B+', 5, 'Birpushia,Karatia,Tangaail', '01731997142', '', 'Kh.Rana', 'Jesmin Begum', 201601008, 1, '2016-11-24', 0, '0000-00-00', 7),
(168, 'Md.Mahim Ahmed', '2011-03-07', 'Male', 'Islam', 'B+', 4, 'Birpushia,Karatia,Tangail', '01779964813', '', 'Md.Mizanur Rahman', 'Monjury Begum', 201601009, 1, '2016-11-24', 0, '0000-00-00', 7),
(169, 'Shafe', '2012-01-20', 'Female', 'Islam', 'B+', 4, 'Birpushia,Karatia,Tangail', '01776630177', '', 'Badsha', 'Tania', 201601010, 1, '2016-11-24', 0, '0000-00-00', 7),
(170, 'Alif Hasan', '2011-06-01', 'Male', 'Islam', 'B+', 5, 'Birpushia,karatia,Tangail;', '01871981303', '', 'Nahid Hasan Sohel', 'Bethi Akter', 201601011, 1, '2016-11-24', 0, '0000-00-00', 7),
(171, 'Siam Sikdar', '2010-08-28', 'Male', 'Islam', 'B+', 6, 'Birpushia,Karatia,Tangail', '01767124561', '', 'Anoar Hosen', 'Rozina Begum', 201601012, 1, '2016-11-24', 0, '0000-00-00', 7),
(172, 'Sindia khan', '2011-10-07', 'Female', 'Islam', 'B+', 5, 'Birpushia,Karatia,Tangail', '01714239649', '', 'Md.Shamim Khan', 'Mrs.Kanis Fatema satu', 201601013, 1, '2016-11-24', 0, '0000-00-00', 7),
(173, 'Jui Akter', '2012-09-26', 'Female', 'Islam', 'B+', 4, 'Birpushia,Karatia,Tangail', '01754040680', '', 'Md.Juwel Khan', 'Mrs.Suma Khanam', 0, 1, '2016-11-24', 0, '0000-00-00', 7),
(174, 'Fahad Islam Siam', '2012-11-03', 'Male', 'Islam', 'B+', 4, 'Matherjani,Karatia,Tangail', '01725286054', '', 'Kabir Mia', 'Somi Akter Simo', 201601015, 1, '2016-11-24', 0, '0000-00-00', 7),
(175, 'Md.Thwhidul', '2016-11-29', 'Male', 'Islam', 'B+', 5, 'Karatia charpara,Karatia,Tangail', '01716770959', '', 'Md.Jamal Uddin', 'Bilkis Begum', 201601016, 1, '2016-11-24', 0, '0000-00-00', 7),
(176, 'Eimen Islam Ahad', '2011-10-16', 'Male', 'Islam', 'B+', 5, 'Birpushia,Karatia,Tangail', '01743371206', '', 'Abdul Haq', 'Ratna Begum', 201601021, 1, '2016-11-24', 0, '0000-00-00', 7),
(177, 'Moriam Akter', '2011-01-01', 'Female', 'Islam', 'B+', 5, 'Alsha,Karatia,Delduar,Tangail', '', '', 'Shahin Miah', 'Sahanaj Begum', 0, 1, '2016-11-24', 0, '0000-00-00', 7),
(178, 'Ummey Hafsa', '2011-06-02', 'Female', 'Islam', 'B+', 5, 'Kandapara,Delduar,Tangail', '01715071200', '', 'Suzon Miah', 'Anna Begum', 201601022, 1, '2016-11-24', 0, '0000-00-00', 7),
(179, 'Md.Samiul Hasan Shimanto', '2011-12-07', 'Male', 'Islam', 'B+', 5, 'Birpushia,Karatia,Tangail', '01799769968', '', 'Md.Jwel Rana', 'Mrs.Shima Akter', 201601024, 1, '2016-11-24', 0, '0000-00-00', 7),
(180, 'Lamia Akter', '2011-08-10', 'Female', 'Islam', 'B+', 5, 'Karatia,Tangail', '01733881517', '', 'Moktar Ali', 'Mary Begum', 201601025, 1, '2016-11-24', 0, '0000-00-00', 7),
(181, 'Moriam Akter', '2011-06-26', 'Female', 'Islam', 'B+', 5, 'Alsha,Karatia,Delduar,Tangail', '01732867120', '', 'Md.Rajuan Miah', 'Halima Begum', 201601027, 1, '2016-11-24', 0, '0000-00-00', 7),
(182, 'Sadia Akter', '2011-06-22', 'Female', 'Islam', 'B+', 5, 'Alsha,Karatia,Delduar,Tangail', '01775581178', '', 'Md Hazrat Ali', 'Popi Begum', 201601028, 1, '2016-11-24', 0, '0000-00-00', 7),
(183, 'Md.Nahian Rahman Nafiz', '2012-09-05', 'Male', 'Islam', 'B+', 5, 'Birpushia,Karatia,Tangail', '01754491264', '', 'Md.Ripon Miah', 'Mst.Nazma Begum', 201601029, 1, '2016-11-24', 0, '0000-00-00', 7),
(184, 'Humira Akter Orpa', '2011-08-20', 'Female', 'Islam', 'B+', 5, 'Birpushia,Karatia,Tangail', '01705605937', '', 'Md.Asad Miah', 'Laky Begum', 201601030, 1, '2016-11-24', 0, '0000-00-00', 7),
(185, 'Rifat', '2010-08-29', 'Male', 'Islam', 'B+', 6, 'Karatia Charpara,Karatia,Tangail', '01741114917', '', 'Md.Shahin', 'Ruma', 201601031, 1, '2016-11-24', 0, '0000-00-00', 7),
(186, 'Akhi Akter', '2010-11-26', 'Female', 'Islam', 'A+', 6, 'Birpushia,Karatia,Tangail', '01728824715', '', 'Anowar Hossen', 'Morsada Begum', 201601032, 1, '2016-11-24', 0, '0000-00-00', 7),
(187, 'Mst.Lamia Akter', '2011-08-30', 'Female', 'Islam', 'B+', 5, 'Birpushia,Karatia,Tangail', '01672084871', '', 'Mahabub Miah', 'Rozina Akter', 201601033, 1, '2016-11-24', 0, '0000-00-00', 7),
(188, 'Rimi', '2011-01-01', 'Female', 'Islam', 'B+', 5, 'Karatia,Tangail', '01743355744', '', 'Fazlul Rahman', 'Mrs.Fazlul', 201601034, 1, '2016-11-24', 0, '0000-00-00', 7),
(189, 'Afif', '2011-01-01', 'Male', 'Islam', 'B+', 5, 'Tangail', '01709123059', '', 'Akkas', 'Rozy', 201601036, 1, '2016-11-24', 0, '0000-00-00', 7),
(190, 'Sajal Ghosh', '2003-07-29', 'Male', 'Hindu', 'B+', 13, 'Matherjani,Karatia,Tangail', '01733962455', '', 'Swopon Ghosh', 'Sompa Ghosh', 201633001, 1, '2016-11-24', 0, '0000-00-00', 7),
(191, 'Shoaib Molla', '2003-04-27', 'Male', 'Islam', 'B+', 13, 'Birpushia,Karatia,Tangail', '01768066939', '', 'Md.Shahin Molla', 'Luttfa Begum', 201633002, 1, '2016-11-24', 0, '0000-00-00', 7),
(192, 'Fatin Sohad Alvy', '2004-08-19', 'Male', 'Islam', 'O+', 12, 'Birpushia,Karatia,Tangail', '01711158265', '', 'Md.Deluar Hossain Delu', 'Mrs.Akhi Akter', 201633003, 1, '2016-11-24', 0, '0000-00-00', 7),
(193, 'Md.Shakil Ahmed', '2004-02-10', 'Male', 'Islam', 'B+', 12, 'Selimabad,Nagapur,Tangail', '01753830672', '', 'Md.shahidul Islam', 'Mst.Salma.Akter', 201633004, 1, '2016-11-24', 0, '0000-00-00', 7),
(194, 'Arafath Hossain Akash', '2004-03-26', 'Male', 'Islam', 'B+', 12, 'Birrpushia,Karatia,Tangail', '01837442822', '', 'Md.Abdul Hossain', 'Hosneara Begum', 201633005, 1, '2016-11-24', 0, '0000-00-00', 7),
(195, 'Mir Sabbirr', '2004-04-14', 'Male', 'Islam', 'B+', 12, 'Birpushia,Karatia,Tangail', '01882701585', '', 'Morshed Ali', 'Shapna Akter', 201633006, 1, '2016-11-24', 0, '0000-00-00', 7),
(196, 'Sifat Ahmed', '2004-11-03', 'Male', 'Islam', 'B+', 12, 'Birpushia,Karatia,Tangail', '017664469971', '', 'Md.Ennas', 'Shirin', 201633007, 1, '2016-11-24', 0, '0000-00-00', 7),
(197, 'KH.Badan', '2004-01-01', 'Male', 'Islam', 'B+', 12, 'Birpushia,Karatia,Tangail', '01744475253', '', 'KH.Kamrul', 'Bulbuly Begum', 201633009, 1, '2016-11-24', 0, '0000-00-00', 7),
(198, 'Md.Sharker Ahmed', '2003-12-16', 'Male', 'Islam', 'B+', 13, 'Birpushia,Karatia,Tangail', '01726365958', '', 'Shamsul Alam', 'Sajeda Begum', 201633010, 1, '2016-11-24', 0, '0000-00-00', 7),
(199, 'Pranto Bhadra', '2004-10-12', 'Male', 'Hindu', 'B+', 12, 'Alsha,Karatia,Delduar,Tangail', '01911819766', '', 'Mona Bhadra', 'Onjuly Bhadra', 201633011, 1, '2016-11-24', 0, '0000-00-00', 7),
(200, 'Rajib Mia', '2004-04-12', 'Male', 'Islam', 'B+', 12, 'Karatia,Tangail', '01773594341', '', 'Md.Faruk Mia', 'Razia Begum', 201633012, 1, '2016-11-24', 0, '0000-00-00', 7),
(201, 'Md.Radowan Islam', '2003-01-27', 'Male', 'Islam', 'B+', 13, 'Khukni,Belcusi', '01684288568/01710134104', '', 'Md.Nurul Islam', 'Mst.Rabia Khan', 201633013, 1, '2016-11-24', 0, '0000-00-00', 7),
(202, 'Anamul Hok Bipul', '2003-01-01', 'Male', 'Islam', 'B+', 13, 'Nahaly,Karatia,Basail,Tangail', '01712871211', '', 'Mohammad Nasmul Hok Babu', 'Nilufa', 201633014, 1, '2016-11-24', 0, '0000-00-00', 7),
(203, 'Sonjoy Roy', '2003-02-17', 'Male', 'Hindu', 'A+', 13, 'Jalalia,Babki,Delduar,Tangail', '01715281699', '', 'Sontos Kumar Roy', 'Champa Roy', 201633015, 1, '2016-11-24', 0, '0000-00-00', 7),
(204, 'Jothirmoy Dey Jeos', '2004-06-08', 'Male', 'Hindu', 'B+', 12, 'Alsha,Karatia,Delduar,Tangail', '01777813740/01786488908', '', 'Jaten Dey', 'Gita Dey', 201633016, 1, '2016-11-24', 0, '0000-00-00', 7),
(205, 'KH.Sushad', '2001-04-07', 'Male', 'Islam', 'B+', 15, 'Birpushia,Karatia,Tangail', '01733934687', '', 'KH.Rafia', 'Shapna Akter', 201633018, 1, '2016-11-24', 0, '0000-00-00', 7),
(206, 'Md.Rafi Ahmed', '2005-03-22', 'Male', 'Islam', 'B+', 11, 'Sreenagar,AM Rahman Complex', '01774797568', '', 'Yahub Hossain Ripon', 'Mst.Santa Begum', 201633020, 1, '2016-11-24', 0, '0000-00-00', 7),
(207, 'Shohag', '2002-10-07', 'Male', 'Islam', 'B+', 21, 'Alsha,Karatia,Delduar,Tangail', '01720950583', '', 'Rostom', 'Beauty', 201633021, 1, '2016-11-24', 0, '0000-00-00', 7),
(208, 'Tania Akter', '2005-04-18', 'Female', 'Islam', 'B+', 11, 'Birpushia,Karatia,Tangail', '01728824715', '', 'Anowar Hossen', 'Morsada Begum', 0, 1, '2016-11-24', 0, '0000-00-00', 7),
(209, 'Md.Shefat Mia', '2004-01-05', 'Male', 'Islam', 'O+', 12, 'Alsha,Karatia,Delduar,Tangail', '01747785693', '', 'Md.Shohedul Islam', 'Safali Begum', 201633025, 1, '2016-11-24', 0, '0000-00-00', 7),
(210, 'Kawsar Shikder', '2004-11-24', 'Male', 'Islam', 'A+', 12, 'Chitteshari,Mirzapur,Tangail', '01811658472', '', 'Sames', 'Kahinure Begum', 201633026, 1, '2016-11-24', 0, '0000-00-00', 7),
(211, 'Alif', '2002-08-15', 'Male', 'Islam', 'B+', 14, 'Birpushia,Karatia,Tangail', '01792261763', '', 'KH.Monju', 'KH.Hasna', 201633028, 1, '2016-11-24', 0, '0000-00-00', 7),
(212, 'Omar Faruk', '2004-02-28', 'Male', 'Islam', 'B+', 12, 'Borobari,Kaliakoir,Gazipur', '01709135989', '', 'Ashak', 'Selina Begum', 201633029, 1, '2016-11-24', 0, '0000-00-00', 7),
(213, 'Md.Ratul Hasan Rayhan', '2004-08-19', 'Male', 'Islam', 'A+', 12, 'Kaundia,Savar,Mirpur-1,Dhaka', '01552447749', '', 'Md.Abdul Ali Dulal', 'Mst.Razia Begum', 201633031, 1, '2016-11-24', 0, '0000-00-00', 7),
(214, 'Maruf Miah', '2003-07-27', 'Male', 'Islam', 'B+', 13, 'Alsha,Karatia,Delduar,Tangail', '01798546092', '', 'Nazrul Islam', 'Rube Begum', 201633032, 1, '2016-11-24', 0, '0000-00-00', 7),
(215, 'Md.Adil Khan', '2003-06-29', 'Male', 'Islam', 'A+', 13, 'Mir Kumulli,Karatia,Tangail', '01704687715', '', 'Md.Motin Khan', 'Alia Begum', 201633033, 1, '2016-11-24', 0, '0000-00-00', 7),
(216, 'Rakash Ghosh', '2004-10-10', 'Male', 'Hindu', 'O-', 12, 'Matherjani,Karatia,Tangail', '01726473339', '', 'Junto Ghosh', 'Shathi Ghosh', 201633035, 1, '2016-11-24', 0, '0000-00-00', 7),
(217, 'Ajit Mondol', '2004-02-10', 'Male', 'Hindu', 'B+', 12, 'Jalalia,Babki,Delduar,Tangail', '01749132275', '', 'Binanbo Mondol', 'Kusami Mondol', 201633036, 1, '2016-11-24', 0, '0000-00-00', 7),
(218, 'Md.Din Islam', '2004-08-05', 'Male', 'Islam', 'A+', 12, 'Pinglakity,Hazipara,Gourbnadi,Barishal', '01926027884', '', 'Md.Shirazul Islam', 'Munju Begum', 201633037, 1, '2016-11-24', 0, '0000-00-00', 7),
(219, 'Shafraj Miah', '2004-04-18', 'Male', 'Islam', 'O+', 12, 'Shendi,Daudkandi,Comilla', '01854033485', '', 'Sharowar Kabir', 'Rehena Begum', 201633039, 1, '2016-11-24', 0, '0000-00-00', 7),
(220, 'Al-Amin', '2004-12-16', 'Male', 'Islam', 'B+', 12, 'Mayalia,Armosta,Tangail', '01724805920', '', 'Md.Solyman', 'Nasrin Begum', 201633040, 1, '2016-11-24', 0, '0000-00-00', 7),
(221, 'Abir Hossain', '2004-02-21', 'Male', 'Islam', 'B+', 12, 'Birpushia,Karatia,Tangail', '01790376408', '', 'Mahammad', 'Beauty', 201633041, 1, '2016-11-24', 0, '0000-00-00', 7),
(222, 'Pranto Roy', '2003-06-03', 'Male', 'Hindu', 'B+', 13, 'Bortha,Bangra,Kalihati,Tangail', '01727419785', '', 'Babu Lal Roy', 'Lipy Rani Roy', 201633046, 1, '2016-11-24', 0, '0000-00-00', 7),
(223, 'Miraz Hossain Lihan', '2003-01-17', 'Male', 'Islam', 'B+', 13, 'Karatia,Tangail', '01845485429', '', 'Mothin', 'Taslima', 201633047, 1, '2016-11-24', 0, '0000-00-00', 7),
(224, 'Fazla Rabbi', '2004-01-05', 'Male', 'Islam', 'O+', 12, 'Pouly,Karatia,Basail,Tangail', '01727743282', '', 'Md.Halim Miah', 'Mukty Khanom', 201633050, 1, '2016-11-24', 0, '0000-00-00', 7),
(225, 'Sanur Islam Shesher', '2003-01-01', 'Male', 'Islam', 'O+', 13, 'Ganda,Savar', '01846690309', '', 'Md.Athul Islam Lacky', 'Sompa Begum', 201633052, 1, '2016-11-24', 0, '0000-00-00', 7),
(226, 'Nura Alam', '2005-03-15', 'Male', 'Islam', 'A+', 11, 'Abdullahpara,Tangail', '01780263094', '', 'Abdul Mannan', 'Rozina Begum', 201633053, 1, '2016-11-24', 0, '0000-00-00', 7),
(227, 'Md.Mohasin Islam', '2004-12-07', 'Male', 'Islam', 'A+', 12, 'Subondi,Ashulia,Savar,Dhaka', '01984738146', '', 'Nomedden', 'Parven', 201633055, 1, '2016-11-24', 0, '0000-00-00', 7),
(228, 'Sazzad Hossain', '2004-07-05', 'Male', 'Islam', 'B+', 12, 'Ratnapur,Shakhipur,Tangail', '01720807264', '', 'Abdus Salam Miah', 'Sharifa', 201633057, 1, '2016-11-24', 0, '0000-00-00', 7),
(229, 'Kamrul Hasan Shifat', '2003-06-12', 'Male', 'Islam', 'B+', 13, 'Shigna,Kalihati,Tangail', '01721503909', '', 'Md.Mominul Islam', 'Kamrunnahar Lovely', 201633060, 1, '2016-11-24', 0, '0000-00-00', 7),
(230, 'Md Mehedi Hasan Akhonda', '2003-10-23', 'Male', 'Islam', 'B+', 13, 'Ghatina,Khansontala,Ullahpara,Sirajgonj', '01711732311', '', 'Md.Mostofa Alam Akando', 'Mrs.Razia Sultana', 201633062, 1, '2016-11-24', 0, '0000-00-00', 7),
(231, 'Julkar Nayeen Akhondo', '2005-08-05', 'Male', 'Islam', 'B+', 11, 'Ghatina,Khansontala,Ullapara,Sirajgonj', '01711732311', '', 'Mostofa Alom', 'Razia Sultana', 201633063, 1, '2016-11-24', 0, '0000-00-00', 7),
(232, 'Julkar Nayeen Akhondo', '2005-08-05', 'Male', 'Islam', 'B+', 11, 'Ghatina,Khansontala,Ullapara,Sirajgonj', '01711732311', '', 'Mostofa Alom', 'Razia Sultana', 0, 1, '2016-11-24', 0, '0000-00-00', 7),
(233, 'Rakib Bin Sabbir', '2004-12-15', 'Male', 'Islam', 'O+', 12, 'Fulki,Borati,Mirzapur,Tangail', '01923675424/01921834207', '', 'Azizul Rahaman', 'Jahanara Begum', 201633067, 1, '2016-11-24', 0, '0000-00-00', 7),
(234, 'Amir Hamza', '2004-10-10', 'Male', 'Islam', 'O+', 12, 'Benopur,Noyhaty,Kaliakoir,Gazipur', '01718082343', '', 'Md.Forman Ali', 'Hasna Hena', 201633068, 1, '2016-11-24', 0, '0000-00-00', 7),
(235, 'Nahid Mia', '2002-10-14', 'Male', 'Islam', 'A+', 14, 'Motora,Karatia,Tangail', '01705605564', '', 'Md.,Shahid Mia', 'Parven', 201633070, 1, '2016-11-24', 0, '0000-00-00', 7),
(236, 'Md.Murad Hasan', '2004-11-12', 'Male', 'Islam', 'B+', 12, 'Nabinagar,Savar,Dhaka', '01736686160', '', 'Md.Lutfor Rahman', 'Nusrat Begum', 201633071, 1, '2016-11-24', 0, '0000-00-00', 7),
(237, 'Abid Hasan', '2004-11-17', 'Male', 'Islam', 'A+', 12, 'Ambag,Nilnagar,Gazipur', '01711443791', '', 'Nazrul Islam', 'Umma Hani Begum', 201633072, 1, '2016-11-24', 0, '0000-00-00', 7),
(238, 'Md.Rabby Miah', '2002-10-27', 'Male', 'Islam', 'B+', 14, 'Motora,Karatia,Tangail', '0174806329', '', 'Abdul Hasem Miah', 'Monowara', 201633074, 1, '2016-11-24', 0, '0000-00-00', 7),
(239, 'All Shahariar Dihan', '2004-07-16', 'Male', 'Islam', 'B+', 12, 'Moheypur,Sherpur,Bogra', '01781303498', '', 'Md.Bablu Rahaman', 'Mrs.Nasima Akter', 201633075, 1, '2016-11-24', 0, '0000-00-00', 7),
(240, 'Md.Abdur Rahman Limon', '2003-08-21', 'Male', 'Islam', 'A+', 13, 'Khandokar Tolla,Sherpur,Bogra', '01735918215', '', 'Md.Rafiqul Alam Zinna', 'Mrs.Lily khatun', 201633076, 1, '2016-11-24', 0, '0000-00-00', 7),
(241, 'Md.Fahim, Faysal', '2004-01-01', 'Male', 'Islam', 'O+', 12, 'Toun Kollony', '01718220571', '', 'Md.Abdul Rashid', 'Mst.Fahmida Parvin Kina', 201633077, 1, '2016-11-24', 0, '0000-00-00', 7),
(242, 'Md.Akib Khan', '2002-12-02', 'Male', 'Islam', 'B+', 14, 'Goroy,Mirzapur,Tangail', '01709518213', '', 'Md.Razzak Khan', 'Mrs.Shafali Khanom', 201633078, 1, '2016-11-24', 0, '0000-00-00', 7),
(243, 'Mahi Zamal', '2004-01-06', 'Male', 'Islam', 'A+', 12, 'Joyra,Manikgonj', '01962840023', 'Mahizaman32@gmail.com', 'Mohiduzzaman', 'Roksana Afroz', 201633082, 1, '2016-11-24', 0, '0000-00-00', 7),
(244, 'Hisham Ahmed', '2003-04-15', 'Male', 'Islam', 'B+', 13, 'Mamrokpur,Sonargaon,Narayonganj', '01987048092', 'Hisamahmed2016@gmail.com', 'Imran', 'Nipa', 201633083, 1, '2016-11-24', 0, '0000-00-00', 7),
(245, 'Anamul Huque', '2002-03-24', 'Male', 'Islam', 'B+', 14, 'Latifpur,Kaliakur,Gazipur', '01718300566', '', 'Jahangir Alam', 'Nargis Begum', 201633084, 1, '2016-11-24', 0, '0000-00-00', 7),
(246, 'Siyam Mahamud Rajon', '2005-02-28', 'Male', 'Islam', 'B+', 11, 'Dhani Khula Baty Para,Kaliakur,Gazipur', '01753942205', '', 'kamrul Islam', 'Sultana Begum', 201633085, 1, '2016-11-24', 0, '0000-00-00', 7),
(247, 'Ajoy Chandra Ghosh', '2004-12-12', 'Male', 'Hindu', 'B+', 12, 'Panjapara,tangail', '01811665135', '', 'Dilip Chandra Ghosh', 'Mukti Chandra Ghosh', 201633086, 1, '2016-11-24', 0, '0000-00-00', 7),
(248, 'Md Fahim Shahriar', '2004-01-21', 'Male', 'Islam', 'B+', 12, 'Kuptala,Gaibandha', '01711414313', 'fsayon147@gmail.c0m', 'Md.Shofiqul Islam', 'Mst.Sayed Sultana', 201633088, 1, '2016-11-24', 0, '0000-00-00', 7),
(249, 'Jawad Bin Kaiser', '2003-09-12', 'Male', 'Islam', 'B+', 13, 'Aruapara,Kustia', '01744637122/01783348807', 'Kaiserbin05@gmail.com', 'Md.Kaiser Babu', 'Mrs.Jeba Kaiser', 201633089, 1, '2016-11-24', 0, '0000-00-00', 7),
(250, 'Md.Tanvir Islam Tuhin', '2003-01-15', 'Male', 'Islam', 'B+', 13, 'Nanny,Nalitabari,Sherpur', '01969723073', '', 'Md.Sayful Islam', 'Mst.Monira Mustari', 201633091, 1, '2016-11-24', 0, '0000-00-00', 7),
(251, 'Md.Mosab Amin', '2004-09-26', 'Male', 'Islam', 'B+', 12, 'Shafipur,Kaliakoir,Gazipur', '01812122909', '', 'Md.Shahidur Rahman', 'Monoara Begum', 201633093, 1, '2016-11-24', 0, '0000-00-00', 7),
(252, 'Mahmudul Hasan Mahin', '2004-03-14', 'Male', 'Islam', 'B+', 12, 'Ambria,Malandh,Jamalpur', '01700632088', '', 'Habib Mia', 'Mxuda Begum', 201633094, 1, '2016-11-24', 0, '0000-00-00', 7),
(253, 'Abdullah Istaher', '2016-10-29', 'Male', 'Islam', 'O+', 14, 'Monipura,Hirmara', '01813090087', '', 'Abdul Kadir Numan', 'Zarin Akter', 201633095, 1, '2016-11-24', 0, '0000-00-00', 7),
(254, 'Md.Khadamull Islam Emon', '2002-07-03', 'Male', 'Islam', 'B+', 14, 'Karatia,Tangail', '01760537984', '', 'Md.Abdul Khalek', 'Monoara Begum', 0, 1, '2016-11-24', 0, '0000-00-00', 7),
(255, 'Salvi Haider', '2003-12-13', 'Male', 'Islam', 'O+', 13, 'Madaripur,Dhaka', '019158769192/01770641555', '', 'Salim Haider', 'Hasna Hena Munni', 201633099, 1, '2016-11-24', 0, '0000-00-00', 7),
(256, 'Siam', '2003-01-14', 'Male', 'Islam', 'A-', 13, 'Baghil', '01725294484', '', 'KH.Sanoar Hossain', 'Minuti Begum', 201633100, 1, '2016-11-24', 0, '0000-00-00', 7),
(257, 'Md.Masrafi', '2003-08-24', 'Male', 'Islam', 'B+', 13, 'Singair,Manikgonj', '01716144925', '', 'Md.Moshiur Rahman', 'Mahmuda Parvin', 201633101, 1, '2016-11-24', 0, '0000-00-00', 7),
(258, 'Md.Samiul Islam Shehab', '2008-04-01', 'Male', 'Islam', 'B+', 9, 'Birpushia,Karatia,Tangail', '01737732558', '', 'Md.Mostafa Miah', 'Salma', 0, 1, '2016-11-24', 0, '0000-00-00', 7),
(259, 'Imam Hossain Mehedi', '2008-03-06', 'Male', 'Islam', 'B+', 9, 'Birpushia,Karatia,Tangail', '01672494145', '', 'Atikur Rahaman Farid', 'Mina Begum', 0, 1, '2016-11-24', 0, '0000-00-00', 7);
INSERT INTO `student_info` (`STUDENT_ID`, `NAME`, `BIRTHDAY`, `GENDER`, `RELIGION`, `BLOOD_GROUP`, `AGE`, `ADDRESS`, `PHONE`, `EMAIL`, `FATHER_NAME`, `MOTHER_NAME`, `PUBLIC_ID`, `CREATED_BY`, `CREATED_DATE`, `UPDATED_BY`, `UPDATED_DATE`, `STATUS`) VALUES
(260, 'Ratna Dewan', '2007-08-29', 'Female', 'Islam', 'B+', 9, 'Birpushia,Karatia,Tangail', '01732629735', '', 'Rafiq Dewan', 'Moyna Begum', 0, 1, '2016-11-24', 0, '0000-00-00', 7),
(262, 'Lima', '2007-01-16', 'Female', 'Islam', 'B+', 9, 'Birpushia,Karatia,Tangail', '01714991090', '', 'Monto', 'Juma', 0, 1, '2016-11-24', 0, '0000-00-00', 7),
(263, 'Toyeba Akter Shornali', '2007-01-27', 'Female', 'Islam', 'B+', 9, 'Birpushia,Karatia,Tangail', '01748483975', '', 'Shoel Molla', 'Lima Begum', 0, 1, '2016-11-24', 0, '0000-00-00', 7),
(264, 'Md.Ismail Khan', '2003-10-05', 'Male', 'Islam', 'A+', 13, 'Alsha,Karatia,Delduar,Tangail', '01772523955', '', 'Md.Yeaasin Khan', 'Kolponaa Begum', 201629001, 1, '2016-11-25', 0, '0000-00-00', 7),
(265, 'Roman Mia', '2004-01-20', 'Male', 'Islam', 'A+', 13, 'Deldoar,Tangail', '01706660150', '', 'Md.Chonno', 'Mrs.Noriaa', 201629068, 1, '2016-11-25', 0, '0000-00-00', 7),
(266, 'Md.Abdul Rouf', '2004-04-15', 'Male', 'Islam', 'O+', 13, 'Shabhar,Gopul Bari,Dhaka', '01915053790', '', 'Md.Aladden Hasan', 'Mrs.Ropia Begum', 201629078, 1, '2016-11-25', 0, '0000-00-00', 7),
(267, 'K.Abdur Rahman', '2004-04-02', 'Male', 'Islam', 'B+', 13, 'Alsha,Karatia,Delduar,Tangail', '01727032569', '', 'K.Josim Mia', 'Rozina Begum', 201629006, 1, '2016-11-25', 0, '0000-00-00', 7),
(268, 'Md.Nayeem', '2004-12-13', 'Male', 'Islam', 'A+', 13, 'Tangail', '01732514522', '', 'Md.Sultan', 'Nasima Akter', 201629030, 1, '2016-11-25', 0, '0000-00-00', 7),
(269, 'Joy Chandra Sour', '2003-02-05', 'Male', 'Hindu', 'B+', 13, 'Birpushia,Karatia,Tangail', '01721858937', '', 'Shadion Chandra Sour', 'Roma Rani Sour', 201629029, 1, '2016-11-25', 0, '0000-00-00', 7),
(270, 'Ataher Ali Khan', '2004-09-16', 'Male', 'Islam', 'B+', 12, 'Alsha,Kandapara,Tangail', '01720938229', '', 'Md.Azaher Ali Khan', 'Zorina Begum', 201629040, 1, '2016-11-25', 0, '0000-00-00', 7),
(271, 'Md.Ujjal Hassan', '2004-10-10', 'Male', 'Islam', 'B+', 12, 'Sirajkandi,Bhuapur,Tangail', '01798066966', '', 'Md.Mokaddes', 'Hasna', 201629088, 1, '2016-11-25', 0, '0000-00-00', 7),
(272, 'Maruf Hossain', '2005-09-07', 'Male', 'Islam', 'B+', 11, 'Karatia Charpara,Karatia,Tangail', '01750202516', '', 'Arif Hossain', 'Monoara Begum', 201629047, 1, '2016-11-25', 0, '0000-00-00', 7),
(273, 'Piyal Hasan', '2004-11-06', 'Male', 'Islam', 'O+', 12, 'Alsha,Karatia,Delduar,Tangail', '01715038084', '', 'Lotif', 'Panna', 201629005, 1, '2016-11-25', 0, '0000-00-00', 7),
(274, 'Majudule Islam Mredul', '2004-11-11', 'Male', 'Islam', 'B+', 12, 'Mirkumulli,Karatia,Tangail', '01726873713', '', 'Nur Hossen', 'Mina Begum', 201629010, 1, '2016-11-25', 0, '0000-00-00', 7),
(275, 'Nirob Talukder', '2004-01-23', 'Male', 'Islam', 'A+', 13, 'Khakjana,karatia,Tangail', '01731110600', '', 'Farid', 'Nazma', 201629061, 1, '2016-11-25', 0, '0000-00-00', 7),
(276, 'Tajul Islam', '2005-06-04', 'Male', 'Islam', 'B+', 11, 'Birpushia,Karatia,Tangail', '01764677286', '', 'Rashoul Amin', 'Rashada Bagum', 0, 1, '2016-11-25', 0, '0000-00-00', 7),
(277, 'Kamrul  islam Shanto', '2004-02-02', 'Male', 'Islam', 'B+', 12, 'Birpushia,Karatia,Tangail', '01622987820', '', 'Md.Delwer Hossain', 'Kobita Begum', 201629015, 1, '2016-11-25', 0, '0000-00-00', 7),
(278, 'Sabbir Mia', '2004-10-01', 'Male', 'Islam', 'B+', 12, 'Motora,Basail,Karatia,Tangail', '01731042072', '', 'Sujan Miah', 'Kolpona', 201629062, 1, '2016-11-25', 0, '0000-00-00', 7),
(279, 'Prosenjit Bishas', '2005-06-01', 'Male', 'Hindu', 'B+', 11, 'Jalalia,Babki,Delduar,Tangail', '01770573310', '', 'Shadan Bishas', 'Shafali Bishas', 201629020, 1, '2016-11-25', 0, '0000-00-00', 7),
(280, 'Shadin', '2002-03-26', 'Male', 'Islam', 'B+', 14, 'Kandapara,Delduar,karatia,Tangail', '01710175222', '', 'Md.Dalour Hossain', 'Jesmin Begum', 201629042, 1, '2016-11-25', 0, '0000-00-00', 7),
(281, 'Tarek Rahman', '2004-02-20', 'Male', 'Islam', 'A+', 12, 'Notun Bazar,Bonani,Dhaka', '01822702219', '', 'Ali Ahmed', 'Alea Begum', 201629055, 1, '2016-11-25', 0, '0000-00-00', 7),
(282, 'Md.Abu Taher', '2002-11-21', 'Male', 'Islam', 'A+', 14, 'Notun Bazar,Banani,Dhaka', '01822702219', '', 'Ali Ahmed', 'Aleck Begum', 201629056, 1, '2016-11-25', 0, '0000-00-00', 7),
(283, 'Md.Fahim Mia', '2002-09-27', 'Male', 'Islam', 'A+', 14, 'Konabari,Gazipur,Dhaka', '01713508489', '', 'Sona Mia', 'Shopna Begum', 201629070, 1, '2016-11-25', 0, '0000-00-00', 7),
(284, 'Md.Tanvir Ahmed', '2003-12-26', 'Male', 'Islam', 'A+', 12, 'Birpushia,Karatia,Tangail', '01711669520', '', 'Siddik', 'Tania', 201629019, 1, '2016-11-25', 0, '0000-00-00', 7),
(285, 'Nasim Miah', '2003-06-23', 'Male', 'Islam', 'B+', 13, 'Birpushia,Karatia,Tangail', '01790799625', '', 'Kamrul Mia', 'Sully Begam', 201629007, 1, '2016-11-25', 0, '0000-00-00', 7),
(286, 'Munna', '2005-01-10', 'Male', 'Islam', 'B+', 12, 'Dhulotia,Pathrail,Tangail', '01732828618', '', 'Nazmul', 'Morzina', 201629067, 1, '2016-11-25', 0, '0000-00-00', 7),
(287, 'Apon Mia', '2004-03-14', 'Male', 'Islam', 'B+', 12, 'Alsha,Karatia,Delduar,Tangail', '01739047192', '', 'Md.Maher Mia', 'Shilpe Begum', 201629041, 1, '2016-11-25', 0, '0000-00-00', 7),
(288, 'Ridoy', '2006-02-25', 'Male', 'Hindu', 'B+', 11, 'Motherjani,Karatia,Tangail', '01764151383', '', 'Naraon', 'Alpana', 201629022, 1, '2016-11-25', 0, '0000-00-00', 7),
(289, 'Md.Yasir Arafat Ratul', '2005-12-24', 'Male', 'Islam', 'A+', 11, 'Birpushia,Karatia,Tangail', '01716774370', '', 'Md.Aminur Islam', 'Mst.Rozy', 201629008, 1, '2016-11-25', 0, '0000-00-00', 7),
(290, 'Omar', '2005-04-01', 'Male', 'Islam', 'B+', 11, 'Pathrail,Delduar,Tangail', '01737764330', '', 'Muktar', 'Rokeya', 201629082, 1, '2016-11-25', 0, '0000-00-00', 7),
(291, 'Tahsin Ahmed', '2006-06-01', 'Male', 'Islam', 'B+', 10, 'Digaputia,Natore', '01740917907', '', 'Md.Joynal Abedin', 'Mst.Tahmina Abedin', 201629051, 1, '2016-11-25', 0, '0000-00-00', 7),
(292, 'Md.Abdulla All-Noman', '2005-01-01', 'Male', 'Islam', 'B+', 12, 'Dhulotia,Pathrail,Tangail', '01865140789', '', 'Md.Lutfor Rahman', 'Mst.Nazma Begum', 201629086, 1, '2016-11-25', 0, '0000-00-00', 7),
(293, 'Maruf Mia', '2003-12-12', 'Male', 'Islam', 'A+', 13, 'Tetulia,Kaijury,Tangail', '01671700562', 'MarufHasan@gmail.com', 'Halim', 'Hena', 201629060, 1, '2016-11-25', 0, '0000-00-00', 7),
(294, 'Md.Rafid Khan', '2005-05-25', 'Male', 'Islam', 'O+', 11, 'Dhigapur,Natore', '01716508205', '', 'Md.Abdur Rokib Khan', 'Mrs.Laky Begum', 201629049, 1, '2016-11-25', 0, '0000-00-00', 7),
(295, 'Md.Shahadot Hosan', '2004-01-17', 'Male', 'Islam', 'AB+', 12, 'Dighapur,Natore', '01713706596', '', 'Md.Shahajahan Ali', 'Monoara Begum', 201630050, 1, '2016-11-25', 0, '0000-00-00', 7),
(296, 'Md.Shakir Ahmed', '2004-01-10', 'Male', 'Islam', 'B+', 12, 'Phulpure,Mymensingh', '01712789516', '', 'Md.Saiful Haque', 'Momotaz Begum', 201629080, 1, '2016-11-25', 0, '0000-00-00', 7),
(297, 'Nazmul Miah', '2003-10-05', 'Male', 'Islam', 'B+', 13, 'Karatia Charpara,Karatia,Tangail', '01746664872', '', 'Abdul Khalek', 'Nazma Begum', 201629048, 1, '2016-11-25', 0, '0000-00-00', 7),
(298, 'Shahiddul Azam Khan Shafin', '2004-06-14', 'Male', 'Islam', 'O+', 12, 'Motora,Karatia,Tangail', '01711465198', '', 'Ali Azam Khan', 'Shirin Khan', 201629089, 1, '2016-11-25', 0, '0000-00-00', 7),
(299, 'Saud Khan', '2004-04-08', 'Male', 'Islam', 'B+', 12, 'Basail,Tangail', '01913956910', '', 'Md.Shamim Khan', 'Sultana', 201629065, 1, '2016-11-25', 0, '0000-00-00', 7),
(300, 'Md.Naeem Mur Rahmaan', '2003-05-15', 'Male', 'Islam', 'A+', 13, 'Kazipur,Tangail', '01840141913', '', 'Md..Forhad', 'Mrs.Nurzahan Begum', 201629035, 1, '2016-11-25', 0, '0000-00-00', 7),
(301, 'Md.Akash', '2004-12-24', 'Male', 'Islam', 'O+', 11, 'Kisnopur,,Baghil,Tangail', '', '', 'Md.Bablu Mia', 'Mrs.Olada Begum', 201629084, 1, '2016-11-25', 0, '0000-00-00', 7),
(302, 'Sabakur Rahman', '2005-02-08', 'Male', 'Islam', 'B+', 12, 'South panishail,Bhobanipur,Joydebpur,Gazipurr', '01926588610', '', 'Kharshad Alom', 'Roshidda Begum', 201629064, 1, '2016-11-25', 0, '0000-00-00', 7),
(303, 'Amit  Chandra Das', '2005-05-19', 'Male', 'Hindu', 'B+', 12, 'Birpushia,Karatia,Tangail', '01739866844', '', 'Sreedam Chandra Das', 'Kalpana Rany Das', 201629033, 1, '2016-11-25', 0, '0000-00-00', 7),
(304, 'Shopon', '2017-05-16', 'Male', 'Islam', 'B+', 12, 'Birpushia,Karatia,Tangail', '01737420329', '', 'Fajal', 'Shahida', 201629036, 1, '2016-11-25', 0, '0000-00-00', 7),
(305, 'Niamul Hassan', '2003-12-23', 'Male', 'Islam', 'B+', 13, 'Basail,Tangail', '0178987716', '', 'Sanoar Hossaan', 'Nasima Begum', 201629014, 1, '2016-11-25', 0, '0000-00-00', 7),
(306, 'Md.Amit Hasan', '2005-02-01', 'Male', 'Islam', 'B+', 11, 'Jalalia,Babki,Delduar,Tangail', '01741564079', '', 'Alim Mia', 'Kona Begum', 201629011, 1, '2016-11-25', 0, '0000-00-00', 7),
(307, 'Nurul Islam Nahid', '2004-06-19', 'Male', 'Islam', 'B+', 12, 'Birpushia,Karatia,Tangail', '01792001274', '', 'Md.Latif Mia', 'Mrs.Nasima Begum', 0, 1, '2016-11-25', 0, '0000-00-00', 7),
(308, 'Sazzad Hossin Zehad', '2003-04-14', 'Male', 'Islam', 'A+', 11, 'Motora,Basail,Tangail', '01731210799/01736780577', '', 'Nazim Uddin Mia', 'Salina Begum', 201629079, 1, '2016-11-25', 0, '0000-00-00', 7),
(309, 'Rupam Sutradhar', '2005-08-22', 'Male', 'Hindu', 'B+', 12, 'Karatipara,Karatia,Basail,Tangail', '01738627523', '', 'Ramdas Sutradhar', 'Mita Sutradhar', 201629097, 1, '2016-11-25', 0, '0000-00-00', 7),
(310, 'Abubakkar Islam', '2002-02-17', 'Male', 'Islam', 'A+', 15, 'Dholotia,Tangail', '01762420856', '', 'Md.Ainal', 'Rabia Begum', 201629046, 1, '2016-11-25', 0, '0000-00-00', 7),
(311, 'Md.Nadim Ahmed', '2003-07-05', 'Male', 'Islam', 'B+', 13, 'Birpushia,Karatia,Tangail', '01718195589', '', 'Md.Latif Mia', 'Mrs.Nargis Begum', 201629018, 1, '2016-11-25', 0, '0000-00-00', 7),
(312, 'Osman Goni', '2004-08-29', 'Male', 'Islam', 'B+', 12, 'Motherjani,Karatia,Tangail', '01767950441', '', 'Md.Mannan', 'Mala Begum', 201629081, 1, '2016-11-25', 0, '0000-00-00', 7),
(313, 'Ali.Rabbani Khan Riyan', '2005-02-04', 'Male', 'Islam', 'B+', 11, 'Birpushia,Karatia,Tangail', '01792262775', '', 'Liakat Ali Khan', 'Dilruba Khan', 201629063, 1, '2016-11-25', 0, '0000-00-00', 7),
(314, 'Md.Siam Islam', '2004-04-12', 'Male', 'Islam', 'B+', 12, 'Motherjani,Karatia,Tangail', '01771930454', '', 'Md.Nayem Miah', 'Parul Akter', 201629038, 1, '2016-11-25', 0, '0000-00-00', 7),
(315, 'Fatema Akter Shraboni', '2005-07-29', 'Female', 'Islam', 'O+', 11, 'Khakjana,Karatia,Tangail', '01672622444', '', 'Md.Siddik Hossain', 'Rawshanara Begum', 201629058, 1, '2016-11-25', 0, '0000-00-00', 7),
(316, 'Sonda Roy', '2005-09-07', 'Male', 'Hindu', 'B+', 11, 'Jalalia,Babki,Delduar,Tangail', '01799318892', '', 'Buddishar Roy', 'Protima Rani Roy', 201629057, 1, '2016-11-25', 0, '0000-00-00', 7),
(317, 'Mukta Akter', '2005-05-02', 'Female', 'Islam', 'AB+', 11, 'Karatia Charpara,Karatia,Tangail', '01776631978', '', 'Abdul Razzak', 'Nurjahan Begum', 201629037, 1, '2016-11-25', 0, '0000-00-00', 7),
(318, 'Sumaiya Akter Mim', '2004-10-11', 'Female', 'Islam', 'B+', 12, 'Motora,Karatia,Basail,Tangail', '01710691195', '', 'Md.Zahangair Alam', 'Lucky Begum', 201629075, 1, '2016-11-25', 0, '0000-00-00', 7),
(319, 'Israt Jahan Orni', '2005-10-02', 'Female', 'Islam', 'B+', 11, 'Birpushia,Karatia,Tangail', '01794054559/01712599357', '', 'Md.Shahjahan Miah', 'Yasmin Jahan', 201629031, 1, '2016-11-25', 0, '0000-00-00', 7),
(320, 'Limia Tanha Jhuma', '2005-06-01', 'Female', 'Islam', 'B+', 11, 'Alsha,Karatia,Delduar,Tangail', '01731040550', '', 'Md.Lal Mia', 'Rina Begum', 201629025, 1, '2016-11-25', 0, '0000-00-00', 7),
(321, 'Tangina Akter', '2005-04-04', 'Female', 'Islam', 'O+', 11, 'Birpushia,Karatia,Tangail', '01733644664', '', 'Jahangir Alam', 'Feroja Begum', 201629021, 1, '2016-11-25', 0, '0000-00-00', 7),
(322, 'Bedena Akter', '2005-01-01', 'Female', 'Islam', 'B+', 11, 'Motora,Karatia,Basail,Tangail', '01784235444', '', 'Bellal Akter', 'Jushna Begum', 201629074, 1, '2016-11-25', 0, '0000-00-00', 7),
(323, 'kornia Mahzabin Ometa', '2005-03-25', 'Female', 'Islam', 'O+', 11, 'Motora,Karatia,Basail,Tangail', '01787824313/01719073864', '', 'Md.Musfiqur Rahman', 'Shefali Begum', 201629072, 1, '2016-11-25', 0, '0000-00-00', 7),
(324, 'Priontri Ghosh Rothi', '2005-04-03', 'Female', 'Hindu', 'B+', 11, 'Kalihati,Tangail', '01728428413', '', 'Prodip Ghosh', 'Kakoli Ghosh', 201629059, 1, '2016-11-25', 0, '0000-00-00', 7),
(325, 'Urmi Akter', '2005-03-03', 'Female', 'Islam', 'B+', 11, 'Birpushia,Karatia,Tangail', '01732327208', '', 'Md.Tipu', 'Moyna Begum', 201629053, 1, '2016-11-25', 0, '0000-00-00', 7),
(326, 'Mohona Akter', '2005-11-20', 'Female', 'Islam', 'A+', 12, 'Birpushia,Karatia,Tangail', '01720083381', '', 'Manik Miah', 'Laky Begum', 201629028, 1, '2016-11-25', 0, '0000-00-00', 7),
(327, 'Ruma Akterr', '2005-05-20', 'Female', 'Islam', 'B+', 11, 'Matherjani,Karatia,Tangail', '01794055720', '', 'Rubel Miah', 'Fahima Begum', 0, 1, '2016-11-25', 0, '0000-00-00', 7),
(328, 'Johora Akter', '2005-09-11', 'Female', 'Islam', 'O+', 11, 'Khakjana,Karatia,Tangail', '01625453847', '', 'Md.Joynal Abthin', 'Nargis Begum', 201629024, 1, '2016-11-25', 0, '0000-00-00', 7),
(329, 'Saheda Akter', '2004-09-14', 'Female', 'Islam', 'B+', 12, 'Birpushia,Karatia,Tangail', '01954618359', '', 'Shahid Miah', 'Salma Begum', 201629039, 1, '2016-11-25', 0, '0000-00-00', 7),
(330, 'Runa Akter', '2005-04-03', 'Female', 'Islam', 'B+', 11, 'Birpushia,Karatia,Tangail', '01799650882', '', 'Abdul Haque', 'Ratna Begum', 201629026, 1, '2016-11-25', 0, '0000-00-00', 7),
(331, 'Md.Sabbir Hasan', '2002-09-18', 'Male', 'Islam', 'O+', 15, 'Kandarpara,Tarakandi,Shorishabari,Jamalpur', '01985593795', '', 'Md.Bhola Mandal', 'Shahela Begum', 201643087, 1, '2016-11-25', 0, '0000-00-00', 7),
(332, 'B.M.Nafis Iqbal', '2002-05-10', 'Male', 'Islam', 'O+', 14, 'Pallabi,Mirpur,Dhaka 1216', '01715070042', '', 'B.M.Nazim Uddin', 'Panna Nazim', 201643066, 1, '2016-11-25', 0, '0000-00-00', 7),
(333, 'Rakib Talukder', '2011-07-05', 'Male', 'Islam', 'B+', 15, 'Khakjana,Karatia,Tangail', '01725926357', 'Rakib Talukder372@gmail.com', 'Alim Talukder', 'Rubi Afroz', 201643077, 1, '2016-11-25', 0, '0000-00-00', 7),
(334, 'Mir Abdullah Hasib', '2003-03-25', 'Male', 'Islam', 'B+', 13, 'Birpushia,Karatia,Tangail', '01947650696', '', 'Mir.Shakhawat Hossen', 'Jesmin Begum', 201643018, 1, '2016-11-26', 0, '0000-00-00', 7),
(335, 'Abdul Al Ahad', '2002-01-12', 'Male', 'Islam', 'O+', 15, 'Natiapara,Tengurapara,Delduar,Tangail', '01624191930', 'ahadabdulal39@gmail.com', 'Md.Arju Miah', 'Luky Begum', 201643011, 1, '2016-11-26', 0, '0000-00-00', 7),
(336, 'Ridwan Ahmed Shadin', '2000-05-15', 'Male', 'Islam', 'B+', 16, 'Kalikapur,Bonpara,Natore', '01783292079', 'Ridwanahmed999@gmail.com', 'Md.Abdur Razzak', 'Mst.Shirin Akter', 201643002, 1, '2016-11-26', 0, '0000-00-00', 7),
(337, 'Md.Arifur Rahman', '2002-12-30', 'Male', 'Islam', 'B+', 14, 'Dewanganj,Jamalpur', '01719886936/01737991244', '', 'Md.Moshiur Rahman Khan', 'Mst.Anjuara Khatun', 201643110, 1, '2016-11-26', 0, '0000-00-00', 7),
(338, 'Tamzidul Haque Tayeb', '2012-09-20', 'Male', 'Islam', 'B+', 14, 'Mir Kumulli,Karatia,Delduar,Tangail', '01736704694', '', 'Abdul Malek Dewan', 'Ismotara Talukder', 0, 1, '2016-11-26', 0, '0000-00-00', 7),
(339, 'Rimel Dewan', '2002-09-20', 'Male', 'Islam', 'B+', 14, 'Mirkumulli,Karatia,Delduar,Tangail', '01736704694', '', 'Abdul Malek Dewan', 'Ismotara Talukder', 201643069, 1, '2016-11-26', 0, '0000-00-00', 7),
(340, 'Antor A Mostafa', '2001-12-20', 'Male', 'Islam', 'B+', 14, 'Madupur,B.K.S.P,Joydevpur,Gazipur', '01912489289', '', 'Md.Alomgir Hossain', 'Mousumi Begum', 201643026, 1, '2016-11-26', 0, '0000-00-00', 7),
(341, 'Md.Shakhawat Hossen', '2002-04-16', 'Male', 'Islam', 'O-', 14, 'Tokinagar,panka,Bagatipara', '01737244115', 'tusherkhan346@gmail.com', 'Md.Tosaddek Hossen', 'Mst.Nargis Begum', 201643148, 1, '2016-11-26', 0, '0000-00-00', 7),
(342, 'Abu Raiyan Sikder', '2003-10-05', 'Male', 'Islam', 'O+', 14, 'Motora,Karatia,Basail,Tangail', '01745793705', '', 'Fazlur Rahman Sikder', 'Morjina Akter', 201643091, 1, '2016-11-26', 0, '0000-00-00', 7),
(343, 'Md.Sahadat Hossen Shakil', '2001-12-31', 'Male', 'Islam', 'B+', 15, 'Maddhapara,Dholvanga,Gaibandha', '01794867057', '', 'Md.Farid Miah', 'Mst.Shahida Begum', 201643001, 1, '2016-11-26', 0, '0000-00-00', 7),
(344, 'Md.Adnan Mahfuz', '2002-07-30', 'Male', 'Islam', 'B+', 14, 'Uttara,Dhaka,Sector-14,Road-16,House-80', '01712886028', '', 'Md.Mafezur Rahman', 'Mst.Sharmin Sultana', 201643014, 1, '2016-11-26', 0, '0000-00-00', 7),
(345, 'Md.Maidul Islam', '2001-01-21', 'Male', 'Islam', 'O+', 15, 'Nahali,Basail,Tangail', '01717233319', '', 'Md.Mosaraf Hossen', 'Mst.Kamrun Nahar Mukta', 201643142, 1, '2016-11-26', 0, '0000-00-00', 7),
(346, 'Yekub Hosen Emon', '2002-12-27', 'Male', 'Islam', 'AB+', 14, 'Motora,Basail,Tangail', '01765846891', '', 'Md.Ahammad', 'Dulufa Begam', 201643093, 1, '2016-11-26', 0, '0000-00-00', 7),
(347, 'Md.Khairul Alam Sabuz', '2003-03-02', 'Male', 'Islam', 'B+', 14, 'Birpushia,Karatia,Tangail', '01716005844', '', 'Khorshed Alom', 'Bulbuly Begum', 201643041, 1, '2016-11-26', 0, '0000-00-00', 7),
(348, 'Toab Sarker', '2002-09-27', 'Male', 'Islam', 'B+', 15, 'Konapara,Asulia,Savar', '01920898411', '', 'Md.Selim', 'Mst.Sheauly Akter', 201643042, 1, '2016-11-26', 0, '0000-00-00', 7),
(349, 'Md.Sabbir Hossen', '2002-10-30', 'Male', 'Islam', 'B+', 14, 'Naliaohala,Kalihati,Tangail', '01712280031/01736005927', '', 'Md.Abu Hanif', 'Selina Akter', 201643149, 1, '2016-11-26', 0, '0000-00-00', 7),
(350, 'Joy Mamun', '2000-10-26', 'Male', 'Islam', 'B+', 16, 'Mawa,Sripur,Gazipur', '01712891173', '', 'Md Jaj Miah', 'Mst.Shlina Akter', 201643046, 1, '2016-11-26', 0, '0000-00-00', 7),
(351, 'Md.Anisuzzaman Anis', '2002-10-15', 'Male', 'Islam', 'B+', 14, 'Barigram,Nagarpur,Tangail', '01741600965', '', 'Md.Ashraful Kabir', 'Mst.Kulsum Begum', 201643037, 1, '2016-11-26', 0, '0000-00-00', 7),
(352, 'Md.Hafijur Rahman', '2002-12-01', 'Male', 'Islam', 'B+', 16, 'Pathalia,Kalihati,Tangail', '01771918724', '', 'Md.Masum', 'Mst.Hasina Begum', 201643039, 1, '2016-11-26', 0, '0000-00-00', 7),
(353, 'Israt jahan Sayba', '2004-09-16', 'Female', 'islam', 'o+', 12, 'Karatia ,Tangail', '01700547840', '', 'Md. Sajjad Mia', 'Doli Begum', 201633065, 1, '2016-11-26', 0, '0000-00-00', 7),
(354, 'Masud Parves', '2002-09-23', 'Male', 'Islam', 'B+', 14, 'Cawna,Nanner,Dhamrai,Dhaka', '01735046929', '', 'Md.Amzad Hossain', 'Mazeda Akter', 201643163, 1, '2016-11-26', 0, '0000-00-00', 7),
(355, 'Tora Ghosh', '2003-05-07', 'Female', 'hindu', 'A+', 13, 'Motherjani,Karatia,Tangail', '01712706016', '', 'Jibon Ghosh', 'rita Ghosh', 201633069, 1, '2016-11-26', 0, '0000-00-00', 7),
(356, 'Md.Naeim', '2001-01-06', 'Male', 'Islam', 'B+', 15, 'Kalampur,Dhamrai,Dhaka', '01990842798/01939634040', 'with.naeim350@gmail.com', 'Md.Maraj Hossen', 'Nazma Begum', 201643054, 1, '2016-11-26', 0, '0000-00-00', 7),
(357, 'Tasrif Ahamed Piam', '2001-12-31', 'Male', 'Islam', 'B+', 15, 'Ullapara,Sirajgonj', '01761890577', '', 'Md.Abu Taher Ansari', 'Mst.Salina Yeasmin', 201643034, 1, '2016-11-26', 0, '0000-00-00', 7),
(358, 'Puja Gope', '2003-12-30', 'Female', 'hindu', 'B+', 13, 'Borati,Mirjapur,Tangail', '01758141451', '', 'Bishno Gope', 'Mongoli Gope', 201634081, 1, '2016-11-26', 0, '0000-00-00', 7),
(359, 'Md.Abu Kayes', '2002-08-04', 'Male', 'Islam', 'O+', 14, 'Bastia,Ghior,Manikgong', '01726137787', '', 'Md.Badsha Hassan', 'Jabeda Begum', 201643103, 1, '2016-11-26', 0, '0000-00-00', 7),
(360, 'Surma Akter', '2004-10-10', 'Female', 'islam', 'O+', 12, 'Matherjani,Karatiya,Tangail', '01789086788', '', 'Abdul Goni MIa', 'Shila Begum', 201634054, 1, '2016-11-26', 0, '0000-00-00', 7),
(361, 'S.M.Mahfuj Ahmed', '2002-05-11', 'Male', 'Islam', 'B+', 14, 'Gramjoka,Tangail', '01712264096', '', 'S.M.Emdadul Haque', 'Mst.Roksana Afroj', 201643067, 1, '2016-11-26', 0, '0000-00-00', 7),
(362, 'Mst Tinni Akter', '2005-06-20', 'Female', 'islam', 'O+', 12, 'Alsha,Delduar,Tangail', '01729300031', '', 'Md.Mosharaf Mia', 'Parul Begum', 201634024, 1, '2016-11-26', 0, '0000-00-00', 7),
(363, 'Tania Akter', '2005-04-18', 'Female', 'islam', 'O+', 11, 'Birpushiya,Karatiya,Tangail', '01728824715', '', 'Anwar Hossen', 'Morsheda Begum', 201633022, 1, '2016-11-26', 0, '0000-00-00', 7),
(364, 'Sanjida Akter', '2003-11-21', 'Female', 'islam', 'B+', 13, 'Birpushiya,Karatia,Tangail', '01738211440', '', 'Md,Siddik Mia', 'Acia Begum', 201633042, 1, '2016-11-26', 0, '0000-00-00', 7),
(365, 'Suchona Akter', '2003-08-21', 'Female', 'islam', 'B+', 13, 'Birpushiya,Karatia,Tangail', '01727500195', '', 'Md.Saiful Islam', 'Beauty Begum', 201634045, 1, '2016-11-26', 0, '0000-00-00', 7),
(366, 'Pranto Roy', '2003-05-03', 'Male', 'hindu', 'A+', 13, 'Bortha,Bangra,Kalihati,Tangail', '01727419785', '', 'Babu Lal Roy', 'Lipy Rani Roi', 201633046, 1, '2016-11-26', 0, '0000-00-00', 7),
(367, 'Md.Khalek Mahmud Shohag', '2000-02-12', 'Male', 'Islam', 'B+', 16, 'Dulotia,Pathrail,Tangail', '01712434287', '', 'Md.Mijanur Rahman', 'Mrs.Khalada Begum', 201643098, 1, '2016-11-26', 0, '0000-00-00', 7),
(368, 'Sanjana Akter', '2005-04-07', 'Female', 'islam', 'O+', 11, 'Motora,Karotia,Tangail', '01732101880', '', 'Md.Salam Mia', 'Rosonara Begum', 201629076, 1, '2016-11-26', 0, '0000-00-00', 7),
(369, 'Ariful Islam Arafat', '2003-08-22', 'Male', 'islam', 'O+', 13, 'Banarpar,Babtoly,Muktagasa,Mymensingh', '01713541862', '', 'Hasan Tarek', 'Amina Begum', 201642152, 1, '2016-11-26', 0, '0000-00-00', 7),
(370, 'Emon Hossen', '2002-02-09', 'Male', 'islam', 'B+', 14, 'Patuli Para,Tangail', '01792291227', '', 'Md,Shadat Hossen', 'Shafile Begum', 201642161, 1, '2016-11-26', 0, '0000-00-00', 7),
(371, 'Mohammad Ali', '2002-01-03', 'Male', 'islam', 'A+', 14, 'rupnai,Khukny,Shajadpur,Sirajganj', '01740978543', '', 'Md.Lalchan', 'Mst.Laily Begum', 201642044, 1, '2016-11-26', 0, '0000-00-00', 7),
(372, 'Md.Nobin Miah', '2002-01-17', 'Male', 'Islam', 'B+', 14, 'Birpushia,Karatia,Tangail', '01726062902', '', 'Md.Usuf Miah', 'Nasima Begum', 201643073, 1, '2016-11-26', 0, '0000-00-00', 7),
(373, 'Md.Anower Hossain', '2001-08-30', 'Male', 'islam', 'B+', 15, 'Gongadhor,Manikganj', '01711067705', '', 'Ibadat Shaik Badal', 'Setara Khanam', 201642173, 1, '2016-11-26', 0, '0000-00-00', 7),
(374, 'Md.Rabbe Miah', '2002-03-02', 'Male', 'Islam', 'B+', 14, 'Birpushia,Karatia,Tangail', '01924792987', '', 'Munsur Ali', 'Rehena Begum', 201643082, 1, '2016-11-26', 0, '0000-00-00', 7),
(375, 'Tanzir Ahmed', '2001-09-01', 'Male', 'islam', 'A+', 15, 'Dighaputia,Natore', '01733133183', '', 'Md.Joynal Abedin', 'Mst.Tahmina Abedin', 201642021, 1, '2016-11-26', 0, '0000-00-00', 7),
(376, 'Darun Nayem', '2002-09-03', 'Male', 'Islam', 'B+', 15, 'Karatia,Tangail', '01729928656', 'Sikdar Nayem401@gmail.com', 'Md.Nazrul Islam', 'Parveen Islam', 201643045, 1, '2016-11-26', 0, '0000-00-00', 7),
(377, 'Md.Soron Miah', '2002-05-19', 'Male', 'islam', 'O+', 14, 'Tangail Sadar', '01794190467', '', 'Md.Sheraj Miah', 'Rakka Begum', 201642150, 1, '2016-11-26', 0, '0000-00-00', 7),
(378, 'Shihab Ahmmed', '2002-12-02', 'Male', 'Islam', 'B+', 14, 'Birpushia,Karatia,Tangail', '01709436633', 'SHEHABAHMMED505@gmail.com', 'Motaleb Hossain', 'Shewle Akter', 201643028, 1, '2016-11-26', 0, '0000-00-00', 7),
(379, 'Tauhidur Rahman Joy', '2002-12-14', 'Male', 'islam', 'B+', 14, 'North Mugda para,Motijhil .Dhaka', '01819889315', '', 'Elias Mulla', 'Lia Begum', 201642129, 1, '2016-11-26', 0, '0000-00-00', 7),
(380, 'Abdullah Al Mamun Shuvo', '2003-11-28', 'Male', 'Islam', 'O+', 13, 'Rupnagar,Mirpur,Dhaka,Road-12,House-8', '01716855443', 'ahzzaven@gmail.com', 'Md.Manik Mallik', 'Parul Begum', 201643102, 1, '2016-11-26', 0, '0000-00-00', 7),
(381, 'Pronamy Sutra Dhar', '2002-02-02', 'Male', 'hindu', 'B+', 14, 'Karatipara,Basail,Tangail', '01751614014', '', 'Ranjit Sutra Dhar', 'Romola Sutra Dhar', 201642117, 1, '2016-11-26', 0, '0000-00-00', 7),
(382, 'Jhuma Akter', '2002-11-08', 'Female', 'islam', 'AB+', 14, 'Matherjani,Karatia,Tangail', '01775153485', '', 'Jwel Miah', 'Parul Begum', 201642115, 1, '2016-11-26', 0, '0000-00-00', 7),
(383, 'Abu Rayhan', '2002-01-01', 'Male', 'Islam', 'B+', 14, 'Goalbathan,Delduar,Tangail', '01793778220', '', 'Al Mamun', 'Roksana Begum', 201643125, 1, '2016-11-26', 0, '0000-00-00', 7),
(384, 'Abdullah Bin Masud', '2002-09-26', 'Male', 'islam', 'A+', 14, 'Suhagpur,Belkuchi,Sirajganj', '01921753135', '', 'Md.Alhaz Ali', 'Mst.Lipy Begum', 201642160, 1, '2016-11-26', 0, '0000-00-00', 7),
(385, 'Tamzeed Khan Jeshan', '2001-09-14', 'Male', 'Islam', 'B+', 15, 'Paikhar Khanpara,Mirzapur,Tangail', '01817629353', '', 'Shahidur Rahman Khan', 'Tanjila Khanom Sumi', 201642159, 1, '2016-11-26', 0, '0000-00-00', 7),
(386, 'Shakil Mahmud', '2002-12-22', 'Male', 'Islam', 'B+', 14, 'Sakhipur,Tangail', '01760481725', 'smd36521md573408@gmail.com', 'Md.Shahjahan Siraj', 'Rezia Akter', 201643096, 1, '2016-11-26', 0, '0000-00-00', 7),
(387, 'Md. Adil Akon', '2002-08-26', 'Male', 'Islam', 'AB+', 14, 'Garakul,Gouranadi,Barishal', '01926393351', '', 'Md.Anowar Khan', 'Nilufa Yeasmin', 201642151, 1, '2016-11-26', 0, '0000-00-00', 7),
(388, 'Md.Hasan', '2002-09-12', 'Male', 'Islam', 'O+', 14, 'Solemabad,Chouhali,Sirajgonj', '01715049799', 'hasanlo411@gmail.com', 'Md.shahidul Islam', 'Mst.Hasina Khatun', 201643031, 1, '2016-11-26', 0, '0000-00-00', 7),
(389, 'Refat Miah', '2003-03-02', 'Male', 'Islam', 'A+', 13, 'Motora ,Karotia,Tangail', '01731297901', '', 'Md.Benu Miah', 'Taslima Akter', 201642172, 1, '2016-11-26', 0, '0000-00-00', 7),
(390, 'Md.Bone Amin', '2002-10-12', 'Male', 'Islam', 'A+', 14, 'Nolshodha,Pathrail,Tangail', '01765651668', 'Rajib hasan bone@gmail.com', 'Md.Abu Baekor', 'Rokia', 201643095, 1, '2016-11-26', 0, '0000-00-00', 7),
(391, 'Mim Akter', '2002-11-15', 'Female', 'Islam', 'A+', 14, 'Karatia,Tangail', '01747743174', '', 'Rustom Ali', 'Selina Begum', 201642061, 1, '2016-11-26', 0, '0000-00-00', 7),
(392, 'Md.Mahedi Hasan Anik', '2001-04-06', 'Male', 'Islam', 'O+', 16, 'Jamalpur,Sarishabari,Doulatpur', '019920964893', '', 'Md.Lutfor Rahman Liton', 'Mst.Mina Begum', 201643072, 1, '2016-11-26', 0, '0000-00-00', 7),
(393, 'Tuhin Miah', '2001-12-14', 'Male', 'Islam', 'B+', 15, 'Nolshuda,Delduar,Tangail', '01732326547', '', 'Md.Manik Miah', 'Helena Begum', 201642153, 1, '2016-11-26', 0, '0000-00-00', 7),
(394, 'Dania Akter', '2002-09-20', 'Female', 'Islam', 'AB+', 14, 'Matherjani,Karotiya,Tangail', '01765372999', '', 'Shahjahan khan', 'Sefali Begum', 201642078, 1, '2016-11-27', 0, '0000-00-00', 7),
(395, 'Mou Rani', '2001-12-22', 'Female', 'Islam', 'A+', 15, 'Birpushiya,Karatia,Tangail', '01720077045', '', 'Ismail', 'Bina', 201643081, 1, '2016-11-27', 0, '0000-00-00', 7),
(396, 'Md.Murad Hossain', '2002-02-01', 'Male', 'Islam', 'O-', 14, 'Subondi,Ashulia,Dhaka', '01735102328', '', 'Md.Mostafa Amin', 'Mrs.Aziron Nasa', 201643033, 1, '2016-11-27', 0, '0000-00-00', 7),
(397, 'Jubair Hossen', '2001-11-05', 'Male', 'Islam', 'A+', 15, 'baidgaon,Kabirpur,Kaliakoir,Gazipur', '01876949676', '', 'Md.Monsur Ali', 'Ms.Nahida Akter', 201643101, 1, '2016-11-27', 0, '0000-00-00', 7),
(398, 'Md.Shahriar Ibne Sulaiman', '2002-02-14', 'Male', 'Islam', 'O+', 14, 'Old Medical Colony,8th Ulka Building,3rd Floor,Sylhet', '01711222499', '', 'Md.Solaiman Khan', 'Meherun Nessa', 201643094, 1, '2016-11-27', 0, '0000-00-00', 7),
(399, 'Saidul Islam', '2001-03-10', 'Male', 'Islam', 'B+', 15, 'Pichuriya,Tangail', '017928821481', '', 'Md.Niad Ali', 'Shahida Begum', 201643084, 1, '2016-11-27', 0, '0000-00-00', 7),
(400, 'Md.Alomgir Hossain', '2002-02-09', 'Male', 'Islam', 'O+', 15, 'House no:20101,Rangpur,Hubshugonj,Rongpur', '01718783994', '', 'Md.Shakhawat Hossain', 'Ms.Baylina Begum', 201643157, 1, '2016-11-27', 0, '0000-00-00', 7),
(401, 'Ashraful Islam Forid', '2002-08-10', 'Male', 'Islam', 'A+', 15, 'Delduar ,Tangail', '01731851827', '', 'Abu Ahmed', 'Ms.Feruza Begum', 201643075, 1, '2016-11-27', 0, '0000-00-00', 7),
(402, 'Sadman Sakib', '2002-01-05', 'Male', 'Islam', 'A+', 14, 'C-37/9,Soronika,Savar,Dhaka', '01617154921', '', 'Fayzur Rashid', 'Anjumanara Begum', 201643168, 1, '2016-11-27', 0, '0000-00-00', 7),
(403, 'Shadman Shahriar Prionto', '2002-08-24', 'Male', 'Islam', 'B+', 14, 'Thanapara,Kustia', '01720507591', 'priontokazi@gmail.com', 'Md.Saidur Rhaman', 'Sultana parvin', 201643048, 1, '2016-11-27', 0, '0000-00-00', 7),
(404, 'Sadman Sakib Moon', '2002-04-28', 'Male', 'Islam', 'O+', 14, 'Kayetpara,Ponchoghor', '01844011780', '', 'Md.Solaiman-Ali', 'Mis,Mariya Begum', 201643133, 1, '2016-11-27', 0, '0000-00-00', 7),
(405, 'Emon Miah', '2002-01-01', 'Male', 'Islam', 'A+', 14, 'Takterchala,Mirzapur,Tangail', '01700644171', '', 'Shahin Miah', 'Jusna Begum', 201643145, 1, '2016-11-27', 0, '0000-00-00', 7),
(406, 'Md.Maruf Hasan', '2002-01-01', 'Male', 'Islam', 'A+', 14, 'Dhulauary,Chatmohor,Pabna', '01710487771', '', 'Md.Abed Ali', 'Mst.Mita Parvin', 201643166, 1, '2016-11-27', 0, '0000-00-00', 7),
(407, 'Abdullah Al Imran Riyad', '2002-10-16', 'Male', 'Islam', 'B+', 15, 'Barakharua,Belkuchi,Shirajgong', '01718147898', '', 'Mohammad Ali', 'Sabina Yesmin', 201643124, 1, '2016-11-27', 0, '0000-00-00', 7),
(408, 'Swarna Akter', '2002-10-10', 'Female', 'Islam', 'O+', 14, 'Birpushiya,Karatia,Tangail', '01779622178', '', 'Khandakar Sohel', 'Khandakar Nasima', 201643113, 1, '2016-11-27', 0, '0000-00-00', 7),
(409, 'Shila Akter', '2002-07-03', 'Female', 'Islam', 'AB+', 14, 'Alsha,Karatia,Tangail', '01726364770', '', 'Md.Salim', 'Jhorina Begum', 201643057, 1, '2016-11-27', 0, '0000-00-00', 7),
(410, 'Morsheda', '2001-08-13', 'Female', 'Islam', 'A+', 15, 'Birpushiya,Karatia,Tangail', '01720133814', '', 'Malek Miah', 'Jotsna Begum', 201643097, 1, '2016-11-27', 0, '0000-00-00', 7),
(411, 'Kaji Nazmus Sakib', '2001-10-30', 'Male', 'Islam', 'B+', 15, 'Bangra,Pouli,Karatia,Basail,Tangail', '01553257209/01724344530', '', 'Kazi Shahidur Rahman', 'Nasrin Sultana', 201643156, 1, '2016-11-27', 0, '0000-00-00', 7),
(412, 'Tandra', '2002-01-01', 'Female', 'Islam', 'B+', 14, 'Birpushiya,Karatia,Tangail', '01712423519', '', 'Abu Taleb Shikder', 'Anowara', 201643118, 1, '2016-11-27', 0, '0000-00-00', 7),
(413, 'Sumaiya Islam', '2001-09-12', 'Female', 'Islam', 'AB+', 15, 'Machiya,Sakhipur,Tangail', '01780068394', '', 'Ahsan Kabir', 'Nayan Mony', 201643056, 1, '2016-11-27', 0, '0000-00-00', 7),
(414, 'Nusrat Zahan Lyzu', '2003-03-15', 'Female', 'Islam', 'A+', 13, 'Birpushiya,Karatia,Tangail', '01708751155', '', 'Jahirul Haque Lucky', 'Shahana Begum', 201643060, 1, '2016-11-27', 0, '0000-00-00', 7),
(415, 'Abdullah Kjem', '2001-12-25', 'Male', 'Islam', 'B+', 15, 'Mirikpur,Tangail', '01732015664', '', 'MdJalal Uddin', 'Salma Begum', 201643016, 1, '2016-11-27', 0, '0000-00-00', 7),
(416, 'Sonia Akter', '2003-03-05', 'Female', 'Islam', 'B+', 13, 'Birpushiya,Karatia,Tangail', '01799132798', '', 'Md.Sattar Mia', 'Mina Begum', 201643070, 1, '2016-11-27', 0, '0000-00-00', 7),
(417, 'Md.Bipul Ahmed Akash', '2002-08-11', 'Male', 'Islam', 'B+', 14, 'Aminpur,Pabna', '01761502548', '', 'Md.Akram Hossain', 'Mst.Sultana Khatun', 201643109, 1, '2016-11-27', 0, '0000-00-00', 7),
(418, 'Mehedi Hasan', '2002-10-12', 'Male', 'Islam', 'O+', 14, 'Paikarvowa,Moddhopara,Mirzapur,Tangail', '01795256449', '', 'Abul Hossain', 'Anwara Begum', 201643055, 1, '2016-11-27', 0, '0000-00-00', 7),
(419, 'Tamzidul Haque Tayeb', '2002-02-07', 'Male', 'Islam', 'B+', 14, 'DUE Phulpure, Mymensingh', '01712789516', '', 'Md.Saiful Islam', 'Momtaz Begum', 201643132, 1, '2016-11-27', 0, '0000-00-00', 7),
(420, 'Israk Hasan Chowdhury', '2002-06-04', 'Male', 'Islam', 'B+', 14, 'Charcawria,Shemer Par,Bokshigong,Jamalpur', '01713513169', '', 'Md.Emran Hossain Chowdhury', 'Shuly Begum', 201643003, 1, '2016-11-27', 0, '0000-00-00', 7),
(421, 'Kazi Ibrahim', '2002-10-22', 'Male', 'Islam', 'A+', 14, 'Billpara,Habla,Basail,Tangail', '01752191718', '', 'Md.Alauddin', 'Shaheda Begum', 201643131, 1, '2016-11-27', 0, '0000-00-00', 7),
(422, 'Md.Foysal Shikder', '2002-03-15', 'Male', 'Islam', 'B+', 15, 'Kandapara,Nagarpur,Tangail', '01629154359', '', 'SM.Azizul Hoque', 'Fahima Begum', 0, 1, '2016-11-27', 0, '0000-00-00', 7),
(423, 'Samiul Alim', '2001-04-06', 'Male', 'Islam', 'B+', 15, '53/1,Kazi Abdul Road,Dhaka', '01712184940', '', 'Md.Shamim Ahmed', 'Msn.Mahmuda Mitu', 201643167, 1, '2016-11-27', 0, '0000-00-00', 7),
(424, 'Md.Lalchan Badsha', '2003-05-07', 'Male', 'Islam', 'B+', 14, 'Kainot,Khuskaulia,Chowhali,Sirajgong', '01925740443', '', 'Md.Zinnah Bapari', 'Mst.Rakha Pervin', 201643007, 1, '2016-11-27', 0, '0000-00-00', 7),
(425, 'Mahfujur Rahman', '2002-12-28', 'Male', 'Islam', 'B+', 13, 'Kandapara,Belkuchi,Sirajgong', '01745856228', '', 'Md.Mehedi Masud', 'Mst.Suraia Parvin', 201643029, 1, '2016-11-27', 0, '0000-00-00', 7),
(426, 'Md.Rifat Khan', '2002-01-20', 'Male', 'Islam', 'O+', 14, 'Gorai,Mirzapur,Tangail', '01815240067', '', 'Shahadat Hossain Khan', 'Rina Sultana', 201643025, 1, '2016-11-27', 0, '0000-00-00', 7),
(427, 'Md.Rasel Hossen', '2002-10-10', 'Male', 'Islam', 'B+', 14, 'Dhamrai,Dhaka', '01948882014', 'rasel399486@gmail.com', 'Abdul Mannan', 'Razia Begum', 201643006, 1, '2016-11-27', 0, '0000-00-00', 7),
(428, 'Likhon Sarker', '2003-11-18', 'Male', 'Hindu', 'B+', 13, 'Borta,Bangra,Kalihati,Tangail', '01720407085', '', 'Ganesh Sorker', 'Lipi Rani Sarker', 201643079, 1, '2016-11-27', 0, '0000-00-00', 7),
(429, 'Mahfuzur Rahman Siyam', '2001-05-17', 'Male', 'Islam', 'B+', 15, 'Karatia,Tangail', '01794659187', '', 'Abdus Sobour', 'Ambia Begum', 201643008, 1, '2016-11-27', 0, '0000-00-00', 7),
(430, 'Ekra Mahmud', '2002-10-20', 'Male', 'Islam', 'B+', 14, 'Sayedpur,Mirzapur,Tangail', '01819882605', 'Ekra4224@gmail.com', 'Kader Mia', 'Anzana Begum', 201643020, 1, '2016-11-27', 0, '0000-00-00', 7),
(431, 'Md.Asfak Mahbub Sajjad', '2001-12-22', 'Male', 'Islam', 'O+', 14, 'Buzruk Nurpur,Deulpara,Mithapukur,Rangpur', '01718613531', 'mdshazzad2016@gmail.com', 'Md.Akhtruzzaman', 'Mrs.Tahmina Begum', 201643012, 1, '2016-11-27', 0, '0000-00-00', 7),
(432, 'Mehedi Hasan', '2001-11-10', 'Male', 'Islam', 'B+', 15, 'Habla East Para,Basail,Tangail', '01714260782', '', 'Minhas Uddin Milon', 'Hosneara Akter', 201643019, 1, '2016-11-27', 0, '0000-00-00', 7),
(433, 'Akash', '2002-05-20', 'Male', 'Islam', 'A+', 14, 'Sakhipur,Tangail', '01745473498', '', 'Atiqur Rahman', 'Asma Sultana', 201643030, 1, '2016-11-27', 0, '0000-00-00', 7),
(434, 'Nazmul Hasan', '2003-03-23', 'Male', 'Islam', 'A+', 13, 'Birpushia,Karatia,Tangail', '01705605553', '', 'Arman Ali', 'Mst.Nazma Akter', 201643023, 1, '2016-11-27', 0, '0000-00-00', 7),
(435, 'Md.Salman Hasan', '2003-02-01', 'Male', 'Islam', 'B+', 13, 'Dalhazar,Thanthania,Faridpur', '01782207819/0179161613610', '', 'A.B.M.Munir Hossen', 'Asma Begum', 201643076, 1, '2016-11-27', 0, '0000-00-00', 7),
(436, 'Md.Rasel Hossen', '2001-12-25', 'Male', 'Islam', 'A+', 15, 'Ramdebpur,Ptal Bazar,Kalihati,Tangail', '01777593697', '', 'Md.Rahmat Ali', 'Mst.Asia Begum', 0, 1, '2016-11-27', 1, '2016-11-27', 7),
(438, 'Md.Meraz', '2002-02-05', 'Male', 'Islam', 'B+', 14, 'Birpushia,Karatia,Tangail', '01716759523', '', 'Rafiqul Islam', 'Beauty', 201643027, 1, '2016-11-27', 0, '0000-00-00', 7),
(439, 'Sourav Hosen', '2002-12-31', 'Male', 'Islam', 'B+', 14, 'Motora,Karatia,Basail,Tangail', '01708726012', '', 'Jakir hosen', 'Shimana Akter', 201643092, 1, '2016-11-27', 0, '0000-00-00', 7),
(440, 'Md.Kawsar Hossen', '2002-01-27', 'Male', 'Islam', 'B+', 14, 'Sontaki,Naihati Bazar,Ashulia,Dhaka', '01789193320', 'Kawsarsas09@gmail.com', 'Nasir Hossen', 'Ms.Salma Begum', 201643004, 1, '2016-11-27', 0, '0000-00-00', 7),
(441, 'Md.Mazharul Islam', '2001-09-21', 'Male', 'Islam', 'A+', 14, 'Madergong,Kachakata,Kurigram', '01716258183', '', 'Md.Abdus Sabur', 'Rashida Begum', 201643063, 1, '2016-11-27', 0, '0000-00-00', 7),
(442, 'Khandokar Eanon Muntasir', '2003-05-14', 'Male', 'Islam', 'A+', 13, 'Chalkdev Para,Naogaon', '01712312684', '', 'Khandokar Mohammod Imrul', 'Nur Banu Khandokar', 201643010, 1, '2016-11-27', 0, '0000-00-00', 7),
(443, 'Md.Emon Miah', '2001-10-25', 'Male', 'Islam', 'B+', 15, 'Natiapara,Tengurapara,Delduar,Tangail', '01729183151', '', 'Md.Anwar Miah', 'Nargis Begum', 201643062, 1, '2016-11-27', 0, '0000-00-00', 7),
(444, 'Ahosan Habib', '2002-10-24', 'Male', 'Islam', 'A+', 14, 'Pathrail Kandi,Nikrail,Bhuapur,Tangail', '01713586659', '', 'Md.Al Mamun', 'Mst.Salma Begum', 201643059, 1, '2016-11-27', 0, '0000-00-00', 7),
(445, 'Tanjin Hasan', '2002-07-03', 'Male', 'Islam', 'B+', 14, 'Pathail Kandi,Nikrail,Bhuapur,Tangail', '01770389950', '', 'Muhammad Abdul Halim MIah', 'Shahida Khatun', 201643058, 1, '2016-11-27', 0, '0000-00-00', 7),
(446, 'Md.Abu Hena Ratan', '2002-05-26', 'Male', 'Islam', 'B+', 15, 'Maherpur,Kustia', '01550621066/01769262541', '', 'Md.Shahanur Islam', 'Rehana Akter', 201643138, 1, '2016-11-27', 0, '0000-00-00', 7),
(447, 'Tanvir Hasan Sohag', '2002-03-06', 'Male', 'Islam', 'O+', 15, 'Garatta,Kadamtoli,Ghatail,Tangail', '01722654545', '', 'S.M.Abdul Mannan', 'Mst.Champa Begum', 201643013, 1, '2016-11-27', 0, '0000-00-00', 7),
(448, 'Faisal Ahmed', '2003-03-17', 'Male', 'Islam', 'A+', 14, 'Birpushia,Karatia,Tangail', '01731810238', '', 'Fazlul Haque', 'Shilpi Begum', 201643015, 1, '2016-11-27', 0, '0000-00-00', 7),
(449, 'Md.Sazal Jamadar', '2002-05-17', 'Male', 'Islam', 'B+', 14, 'Kashil,Basail,Tangail', '01732974933', '', 'Md.Karim Jamadar', 'Latifa Begum', 201643017, 1, '2016-11-27', 0, '0000-00-00', 7),
(450, 'Md.Shakib Khan Joy', '2001-01-20', 'Male', 'Islam', 'B+', 15, 'Bathuli Sadi,Basail,Tangail', '01706266885', '', 'Md.Shafiqul Islam Khan', 'Mst.Moni', 201643111, 1, '2016-11-27', 0, '0000-00-00', 7),
(451, 'A.K.M.Karibul Islam', '2002-11-28', 'Male', 'Islam', 'A+', 15, 'Gangarampur,Taragunia,Daulathpur,Kusthtia', '01780566883', '', 'A.K.M.Shafiqul Islam', 'Ms.Rownak Akter', 201643022, 1, '2016-11-27', 0, '0000-00-00', 7),
(452, 'Md.Najiur Rahman Nahid', '2001-09-04', 'Male', 'Islam', 'B+', 15, 'Dapnajur,Basail,Karatia,Tangail', '01818431983', 'Monir8384@gmail.com', 'Md.Ali Ahmed', 'Nurzahan', 201643009, 1, '2016-11-27', 0, '0000-00-00', 7),
(453, 'Ela Akter', '2001-12-24', 'Female', 'Islam', 'B+', 15, 'Birpushia,Karatia,Tangail', '', '', 'Khandaker Jamil', 'Rehena', 201643086, 1, '2016-11-27', 0, '0000-00-00', 7),
(454, 'Mir Raishul Islam', '2001-10-03', 'Male', 'Islam', 'B+', 15, 'Birpushia,Karatia,Tangail', '01716831866', '', 'Mir.Earshad Ali', 'Rehana Islam', 201643032, 1, '2016-11-27', 0, '0000-00-00', 7),
(455, 'Md.Ashraful', '2001-06-01', 'Male', 'Islam', 'O+', 15, 'Sakhipur,Tangail', '01798595558', '', 'Abdul Latif', 'Mst.Aysha', 0, 1, '2016-11-27', 0, '0000-00-00', 7),
(456, 'Md.Ashraful', '2001-06-01', 'Male', 'Islam', 'O+', 15, 'Sakhipur,Tangail', '01798595558', '', 'Abdul Latif', 'Mst.Aysha', 201643140, 1, '2016-11-27', 0, '0000-00-00', 7),
(457, 'Md.Nazmul Khan Shihab', '2003-10-12', 'Male', 'Islam', 'B+', 13, 'Shahzadpur,Sirajgong', '01715394514', '', 'Shirazul Islam', 'Shahanaz Parvin', 201643112, 1, '2016-11-27', 0, '0000-00-00', 7),
(458, 'Md Jahid Hasan', '2002-08-05', 'Male', 'Islam', 'A+', 14, 'Kohapara,Ashulia,Savar,Dhaka', '01749949952', 'Jahid30hr@gmail.com', 'Md.Shahjahan Mondol', 'Mrs.Shefali Begum', 201643139, 1, '2016-11-27', 0, '0000-00-00', 7),
(459, 'Md.,Apurbo Miah', '2003-09-19', 'Male', 'Islam', 'B+', 14, 'Mirkumulli,Karatia,Delduar,Tangail', '01718580425', '', 'Md.Farid Miah', 'Lovely Begum', 201643068, 1, '2016-11-27', 0, '0000-00-00', 7),
(460, 'Ahsanul Islam Sakib', '2001-05-07', 'Male', 'Islam', 'O-', 15, 'Konapur,Asulia,Saver,Dhaka', '', 'smsakib235@gmail.com', 'Abdul Halim', 'Arifa Begum', 201643036, 1, '2016-11-27', 0, '0000-00-00', 7),
(461, 'Sagor Sarker', '2001-04-12', 'Male', 'Hindu', 'B+', 16, 'Noyanpur,Malik Bari,Valuka,Mymensing', '01747446283', '', 'Suval Sarker', 'Tulshi Rani', 201643049, 1, '2016-11-27', 0, '0000-00-00', 7),
(462, 'Shishir Jaman', '2002-01-17', 'Male', 'Islam', 'O+', 14, 'Pather Ghata,Mirzapur,Tangail', '01713527524,01709065502', '', 'Shahjahan Shiraj', 'Nasrin Begum', 201643100, 1, '2016-11-27', 0, '0000-00-00', 7),
(463, 'Md.Nazmul Huda', '2002-02-10', 'Male', 'Islam', 'B+', 14, 'Mirkutia,Nagarpur,Tangail', '01915863519', '', 'Md.Alam Sikdar', 'Mst.Nasima', 201643143, 1, '2016-11-27', 0, '0000-00-00', 7),
(464, 'Abir Hoshen', '2008-10-01', 'Male', 'Islam', 'B+', 8, 'Birpushia,Karatia,Tangail', '01761949647', '', 'Md.Juel Mondol', 'Pakhi Begum', 201617028, 1, '2016-11-27', 0, '0000-00-00', 7),
(465, 'Toyeba Akter Shornali', '2007-01-27', 'Female', 'Islam', 'B+', 9, 'Birpushia,Karatia,Tangail', '01748483975', '', 'Shoel Molla', 'Lima Begum', 201617006, 1, '2016-11-27', 0, '0000-00-00', 7),
(466, 'Arob Akter', '2008-02-10', 'Female', 'Islam', 'B+', 8, 'Birpushia,Karatia,Tangail', '01733473978', '', 'Sohel Rana Tipu', 'Mst.Shakola', 201617007, 1, '2016-11-27', 0, '0000-00-00', 7),
(467, 'Easha Akter Mim', '2007-09-04', 'Female', 'Islam', 'B+', 10, 'Birpushia,Karatia,Tangail', '01714789523', '', 'Md.Sakil Mia', 'Mst.Jaida Akter', 201617008, 1, '2016-11-27', 0, '0000-00-00', 7),
(468, 'Mahima Akter', '2009-10-27', 'Female', 'Islam', 'B+', 7, 'Birpushia,Karatia,Tangail', '0172465304', '', 'M', 'm', 0, 1, '2016-11-27', 0, '0000-00-00', 7),
(469, 'Mahima Akter', '2009-10-27', 'Female', 'Islam', 'B+', 7, 'Birpushia,Karatia,Tangail', '0172465304', '', 'M', 'm', 0, 1, '2016-11-27', 0, '0000-00-00', 7),
(470, 'Mahima Akter Mahi', '2009-10-27', 'Female', 'Islam', 'B+', 7, 'Birpushia,Karatia,Tangail', '01833592207', '', 'Mr.Masum Rana', 'Mrs.Akhi Akter', 201617010, 1, '2016-11-27', 0, '0000-00-00', 7),
(471, 'Md.Alhaz Rahman Fahim', '2006-10-30', 'Male', 'Islam', 'B+', 9, 'Birpushia,Karatia,Tangail', '01732359833', '', 'Md.Mosharof Hossen', 'China Akter', 201617011, 1, '2016-11-27', 0, '0000-00-00', 7),
(472, 'Thanha', '2008-01-29', 'Female', 'Islam', 'B+', 8, 'Birpushia,Karatia,Tangail', '01726123305', '', 'Md.Amzad Dewan', 'Kona Begum', 201617012, 1, '2016-11-27', 0, '0000-00-00', 7),
(473, 'Taslima', '2009-11-07', 'Female', 'Islam', 'B+', 8, 'Birpushia,Karatia,Tangail', '01777362165', '', 'Aslam Miah', 'Fahima Begum', 201617013, 1, '2016-11-27', 0, '0000-00-00', 7),
(474, 'Mahin Akter', '2008-08-30', 'Female', 'Islam', 'B+', 8, 'Alsha,Karatia,Delduar,Tangail', '01720112865', '', 'Bisu Miah', 'Mitu Akter', 201617014, 1, '2016-11-27', 0, '0000-00-00', 7),
(475, 'Sayem Ahmed', '2007-07-02', 'Male', 'Islam', 'B+', 10, 'Birpushia,Karatia,Tangail', '0176389805', '', 'Md.Kazim Uddin', 'Mrs.Shahina Begum', 201617016, 1, '2016-11-27', 0, '0000-00-00', 7),
(476, 'Mr.Al Amin', '2006-05-23', 'Male', 'Islam', 'O+', 10, 'Birpushia,Karatia,Tangail', '01718845377', '', 'Md.Nazim Uddin', 'Mrs.Parul Behum', 201617017, 1, '2016-11-27', 0, '0000-00-00', 7),
(477, 'Liza Akter', '2008-01-13', 'Female', 'Islam', 'B+', 9, 'Alsha,Karatia,Delduar,Tangail', '01726566521', '', 'Latif Miah', 'Rehana Begum', 201617018, 1, '2016-11-27', 0, '0000-00-00', 7),
(478, 'Md.Siam Ahmed', '2009-11-20', 'Male', 'Islam', 'O+', 7, 'Birpushia,Karatia,Tangail', '01758920095', '', 'Md.Ali Azam Miah', 'Mrs.Laila Begum', 201617019, 1, '2016-11-27', 0, '0000-00-00', 7),
(479, 'Imran Hasan Emon', '2005-04-02', 'Male', 'Islam', 'B+', 11, 'Birpushia,Karatia,Tangail', '01754421823', '', 'Abu Bokor', 'Laky', 201617020, 1, '2016-11-27', 0, '0000-00-00', 7),
(480, 'Samia Akter', '2008-09-03', 'Female', 'Islam', 'B+', 8, 'Birpushia,Karatia,Tangail', '01789086806', '', 'Md.Helal Mia', 'Mrs.Sahnaj Begum', 201617021, 1, '2016-11-27', 0, '0000-00-00', 7),
(481, 'Md.Shimon Mia', '2007-05-20', 'Male', 'Islam', 'B+', 9, 'Mir Kumulli,Karatia,Tangail', '01930635518', '', 'Md.Shopon Mia', 'Mst.Shadia', 201617023, 1, '2016-11-27', 0, '0000-00-00', 7),
(482, 'Tafrina Hasan Tithi', '2007-03-31', 'Female', 'Islam', 'B+', 10, 'Motherjani,Karatia,Tangail', '01794678161', '', 'Imrul Hasan Babu', 'Happy Begum', 201617024, 1, '2016-11-27', 0, '0000-00-00', 7),
(483, 'Md.Saimul Islam Shihab', '2004-04-01', 'Male', 'Islam', 'B+', 9, 'Birpushia,Karatia,Tangail', '01737732558', '', 'Md.Mostafa Miah', 'Salma', 0, 1, '2016-11-27', 0, '0000-00-00', 7),
(484, 'Md.Saimul Islam Shihab', '2008-04-01', 'Male', 'Islam', 'B+', 9, 'Birpushia,Karatia,Tangail', '01737732558', '', 'Md.Mostafa Miah', 'Salma', 0, 1, '2016-11-27', 0, '0000-00-00', 7),
(485, 'Md.Saimul Islam Shihab', '2008-04-01', 'Male', 'Islam', 'B+', 9, 'Birpushia,Karatia,Tangail', '01737732558', '', 'Md.Mostafa Miah', 'Salma', 201617001, 1, '2016-11-27', 0, '0000-00-00', 7),
(486, 'Rihan Sikder Zihad', '2007-12-16', 'Male', 'Islam', 'B+', 9, 'Birpushia,Karatia,Tangail', '01757018709', '', 'Siraj', 'Aysha', 201617029, 1, '2016-11-27', 0, '0000-00-00', 7),
(487, 'Tangila Akter Tanni', '2009-02-11', 'Female', 'Islam', 'B+', 8, 'Alsha,Karatia,Delduar,Tangail', '01727408623', '', 'Md.Badol Miah', 'Sumi Begum', 201617030, 1, '2016-11-27', 0, '0000-00-00', 7),
(488, 'Sumaiya Akter', '2003-01-30', 'Female', 'Islam', 'B+', 8, 'Purbopar Deghuli,Sonita,Jamalpur', '01793525662', '', 'Md.Sanowar Hosen', 'Mrs.Rumi Akter', 201617031, 1, '2016-11-27', 0, '0000-00-00', 7),
(489, 'Samiwol Islam', '2007-10-17', 'Male', 'Islam', 'O+', 9, 'Birpushia,Karatia,Tangail', '01726245095', '', 'Nosu Miah', 'Safia Begum', 201617025, 1, '2016-11-27', 0, '0000-00-00', 7),
(490, 'Abu Talha', '2008-02-15', 'Male', 'Islam', 'B+', 8, 'Birpushia,Karatia,Tangail', '01772294173', '', 'Abdur Razzak', 'Parven Begum', 201617027, 1, '2016-11-27', 0, '0000-00-00', 7),
(491, 'Touha Islam Supti', '2007-10-13', 'Female', 'Islam', 'B+', 9, 'Birpushia,Karatia,Tangail', '01741146449', '', 'Md.Shofiqul Islam', 'Mrs.Jahanara Begum', 201617022, 1, '2016-11-27', 0, '0000-00-00', 7),
(492, 'Adorsho', '2007-12-22', 'Male', 'Islam', 'B+', 10, 'Birpushia,Karatia,Tangail', '01712423519', '', 'Ali Azam', 'China', 201617004, 1, '2016-11-27', 0, '0000-00-00', 7),
(493, 'Ratna Dewan', '2007-08-29', 'Female', 'Islam', 'B+', 9, 'Birpushia,Karatia,Tangail', '01732629735', '', 'Rafiq Dewan', 'Moyna Begum', 0, 1, '2016-11-27', 0, '0000-00-00', 7),
(494, 'Emam Hosain Mehedi', '2008-03-06', 'Male', 'Islam', 'B+', 9, 'Birpushia,Karatia,Tangail', '01672494145', '', 'Atikur Rahaman Farid', 'Mina Begum', 201617002, 1, '2016-11-27', 0, '0000-00-00', 7),
(495, 'Lina', '2008-01-16', 'Female', 'Islam', 'B+', 9, 'Birpushia,Karatia,Tangail', '01714991090', '', 'Montu', 'Jhuma', 201617005, 1, '2016-11-27', 0, '0000-00-00', 7),
(496, 'Nilima Sutra Dher', '2001-12-23', 'Female', 'Hindu', 'B+', 13, 'Karatia Para,Karatia,Tangail', '01715045223', '', 'Nil Komol Sutradher', 'Anjoli Sutradher', 201637145, 1, '2016-11-29', 0, '0000-00-00', 7),
(497, 'Sumaya Akter', '2004-07-05', 'Female', 'Islam', 'B+', 14, 'Matherjani,Karatia,Tangail', '01715509771', '', 'Ayub Ali', 'Zabeda Akter', 201637117, 1, '2016-11-29', 0, '0000-00-00', 7),
(498, 'Juha Mune', '2013-01-01', 'Female', 'Islam', 'B+', 13, 'Birpushia,Karatia,Tangail', '01731809712', '', 'AK.Azizul Huk', 'Ruma Begum', 201637090, 1, '2016-11-29', 0, '0000-00-00', 7),
(499, 'Sadia Afrin zadni', '2003-06-15', 'Female', 'Islam', 'B+', 13, 'Alsha,Karatia,Tangail', '01772465438', '', 'Badal Miah', 'Sumi Begum', 201637077, 1, '2016-11-29', 0, '0000-00-00', 7),
(500, 'Mahfuja Akter', '2002-09-11', 'Female', 'Islam', 'A+', 14, 'Alsha,Karatia,Tangail', '01785524693', '', 'KH.Subuddin', 'Tara Bhanu', 201637076, 1, '2016-11-29', 0, '0000-00-00', 7),
(501, 'Aysha Akter Moly', '2004-11-16', 'Female', 'Islam', 'A+', 13, 'Karatia,Charpara,Karatia,Tangail', '', '', 'Md.Atauar Rahman', 'Nurjahan Begum', 201637067, 1, '2016-11-29', 0, '0000-00-00', 7),
(502, 'Sorna Akter', '2008-03-13', 'Female', 'Islam', 'O+', 11, 'Alsha,Delduar,Karatia,Tangail', '01767105755', '', 'Md.Abul Hosen', 'Hosnara', 201613014, 1, '2016-11-30', 0, '0000-00-00', 7),
(503, 'Afroza Akter Mily', '2006-09-03', 'Female', 'Islam', 'O+', 10, 'Charpara,Karatia,Tangail', '01716916808', '', 'Atuar Rahman', 'Nurjahan Begum', 201622028, 1, '2016-11-30', 0, '0000-00-00', 7),
(504, 'Samiha Tabassum', '2006-04-08', 'Female', 'Islam', 'B+', 10, 'Mir-Kumulli,Karatia,Tangail', '01740647976', '', 'Md.Saiful Islam', 'jubaida Islam', 201622044, 1, '2016-11-30', 0, '0000-00-00', 7),
(505, 'Asha Mone', '2006-11-17', 'Female', 'Islam', 'A+', 10, 'Alsha,delduar,Karatia,tangail', '', '', 'Md.Arshad Miah', 'Ms.Mitu Akter', 201622004, 1, '2016-11-30', 0, '0000-00-00', 7),
(506, 'Ratna', '2006-01-01', 'Female', 'Islam', 'AB+', 10, 'Birpushia,Karatia,Tangail', '01726952439', '', 'Eisam Uddin', 'Parvin', 201622026, 1, '2016-11-30', 0, '0000-00-00', 7),
(507, 'Srabone', '2006-09-27', 'Female', 'Islam', 'B+', 10, 'Birpushia,Karatia,Tangail', '01772369833', '', 'Abdul Latif', 'Josna Begum', 201622037, 1, '2016-11-30', 0, '0000-00-00', 7),
(508, 'Md.Samiur Rahman', '2001-10-07', 'Male', 'Islam', 'B+', 15, 'Binodpur,Rajbari,Faridpur', '01712120678', 'samiur85251@gmail.com', 'Md.Mokbul Hossain', 'Anowara Begum', 201643024, 1, '2016-11-30', 0, '0000-00-00', 7),
(509, 'Md.Tauhid', '2003-03-02', 'Male', 'Islam', 'B+', 14, 'Dogor,Ghatail,Tangail', '01750513448', '', 'Md.Abdul Hamid', 'Ms.China Akter', 201643134, 1, '2016-11-30', 0, '0000-00-00', 7),
(510, 'Samir', '2003-03-10', 'Male', 'Islam', 'O+', 13, 'Birpushia,karatia,Tangail', '01726950898', '', 'Md. Samsul', 'Sharmin', 201603026, 1, '2016-11-30', 0, '0000-00-00', 7),
(511, 'Moriam', '2013-11-08', 'Female', 'Islam', 'O+', 8, 'Alsha,Karatia,Deldur,Tangail.', '01727895757', '', 'Shahin Miah', 'Shahanaj Begum', 201603021, 1, '2016-11-30', 0, '0000-00-00', 7),
(512, 'Jui', '2006-11-08', 'Female', 'Islam', 'A+', 10, 'Birpushia,Karatia,Tangail.', '01754040680', '', 'Juyel', 'Suma', 201603014, 1, '2016-11-30', 0, '0000-00-00', 7),
(513, 'Md. Nafiz Miah', '2007-11-15', 'Male', 'Islam', 'O+', 6, 'Birpushia,karatia,Tangail.', '01754040680', '', 'Latif Miah', 'Nargis', 201611007, 1, '2016-11-30', 0, '0000-00-00', 7),
(514, 'Sheikh Haris', '2007-11-07', 'Male', 'Islam', 'O+', 6, 'Jalalia,Bhavki,Delduar,Tangail.', '01794191553', '', 'Abdul Hakim', 'Mitu', 201611009, 1, '2016-11-30', 0, '0000-00-00', 7);
INSERT INTO `student_info` (`STUDENT_ID`, `NAME`, `BIRTHDAY`, `GENDER`, `RELIGION`, `BLOOD_GROUP`, `AGE`, `ADDRESS`, `PHONE`, `EMAIL`, `FATHER_NAME`, `MOTHER_NAME`, `PUBLIC_ID`, `CREATED_BY`, `CREATED_DATE`, `UPDATED_BY`, `UPDATED_DATE`, `STATUS`) VALUES
(515, 'Rotna Dewan', '2008-05-05', 'Female', 'Islam', 'O+', 9, 'Birpushia,karatia,Tangail', '01732629735', '', 'Rofiq Dewan', 'Moyna Begum', 201619003, 1, '2016-11-30', 0, '0000-00-00', 7),
(516, 'Mashrin Akter', '2008-10-02', 'Female', 'Islam', 'O+', 9, 'Birpushia,karatia,Tangail', '017246753704', '', 'Khondokar Mannan', 'Sharmin Khondokar', 201619009, 1, '2016-11-30', 0, '0000-00-00', 7),
(517, 'Amin Mia', '2007-02-01', 'Male', 'Islam', 'O+', 9, 'Birpushia,Karatia,Tangail.', '01732636229', '', 'Abdul Lotif Mia', 'Mst. Morjina Begum', 201619015, 1, '2016-11-30', 0, '0000-00-00', 7),
(518, 'Shihab Ahmed', '2011-05-02', 'Male', 'Islam', 'O+', 5, 'Karatia,Tangail.', '017246753704', '', 'Alom Khan', 'Shuly Begum', 201607019, 1, '2016-11-30', 0, '0000-00-00', 7),
(519, 'Kh. Tahsanul Islam Limon', '2011-03-02', 'Male', 'Islam', 'O+', 5, 'Kanda para, karatia,Tangail.', '017246753704', '', 'Azahar Ali', 'Rabea', 201607023, 1, '2016-11-30', 0, '0000-00-00', 7),
(520, 'Samiul Islam Rafi', '2012-10-09', 'Male', 'Islam', 'O+', 4, 'Birpushia,karatia,Tangail.', '01746945475', '', 'Saiful Islam', 'Jesmin Akter', 201607011, 1, '2016-11-30', 0, '0000-00-00', 7),
(521, 'Neha Akter', '2010-09-24', 'Female', 'Islam', 'O+', 6, 'Karatia,Tangail', '01731910597', '', 'Ramjan Mia', 'Sadika Akter', 201607020, 1, '2016-11-30', 0, '0000-00-00', 7),
(522, 'Tamim Hasan', '2010-07-28', 'Male', 'Islam', 'O+', 6, 'Birpushia,karatia,Tangail', '01770857659', '', 'Shamim Miah', 'Hashi Begum', 201607021, 1, '2016-11-30', 0, '0000-00-00', 7),
(523, 'Anamika Dewan', '2005-03-30', 'Female', 'Islam', 'AB+', 13, 'Birpushia,Karatia,Tangail', '01726123305', '', 'Amzad Dewan', 'Kona Akter', 201631009, 1, '2016-11-30', 0, '0000-00-00', 7),
(524, 'Ruma Akter', '2005-05-20', 'Female', 'Islam', 'B+', 12, 'Matherjani,karatia,Tangail', '01794055720', '', 'Rubel Mia', 'Fahima Begum', 201631083, 1, '2016-11-30', 0, '0000-00-00', 7),
(525, 'Md. Rihat Hasan', '2004-12-24', 'Male', 'Islam', 'A+', 12, 'Sirajkandi,Buapur,Tangail', '01780528776', '', 'Fojlul Hoque', 'Rubi Begum', 201631087, 1, '2016-11-30', 0, '0000-00-00', 7),
(526, 'Tajul Islam', '2005-05-11', 'Male', 'Islam', 'O+', 12, 'Birpushia,karatia,Tangail.', '01764677268', '', 'Rahul Amin', 'Rashada Begum', 201631004, 1, '2016-11-30', 0, '0000-00-00', 7),
(527, 'Md. Nurul Islam Nahid', '2003-06-19', 'Male', 'Islam', 'O+', 13, 'Birpushia,Koratia,Tangail', '01792001274', '', 'Latif Miah', 'Nasima Begum', 201631003, 1, '2016-11-30', 0, '0000-00-00', 7),
(528, 'Rahad Mia', '2003-05-04', 'Male', 'Islam', 'O+', 14, 'Birpushia,Karatia,Tangail', '01827120330', '', 'Farhad Mia', 'Rozina Begum', 201631032, 1, '2016-11-30', 0, '0000-00-00', 7),
(529, 'Iftiham Vuya', '2003-08-07', 'Male', 'Islam', 'O+', 14, 'Birpushia,karatia,Tangail', '01720078224', '', 'Nur Mhammad Vuya', 'Akhi Begum', 201631045, 1, '2016-11-30', 0, '0000-00-00', 7),
(530, 'Rimad', '2005-08-23', 'Male', 'Islam', 'O+', 11, 'Birpushia,karatia,Tangail', '01754264710', '', 'Razzak', 'Afroza', 201631002, 1, '2016-11-30', 0, '0000-00-00', 7),
(531, 'Riad Hosan Mohit', '2004-06-24', 'Male', 'Islam', 'O+', 12, 'Birpushia,karatia,Tangail', '01776629940', '', 'Nazrul Islam', 'Morseda Begum', 201631013, 1, '2016-11-30', 0, '0000-00-00', 7),
(532, 'Md. Mahedi Hasan', '2004-12-04', 'Male', 'Islam', 'O+', 12, 'Birpushia,karatia,Tangail', '01718081505', '', 'Md. Azom Miah', 'Mst. Sonamoni', 201631016, 1, '2016-11-30', 0, '0000-00-00', 7),
(533, 'Abdullah All Shafi Suyan', '2005-05-13', 'Male', 'Islam', 'O+', 11, 'Baoikhola,Basail,Tangail', '01716218489', '', 'Lovlu', 'Runa', 201631027, 1, '2016-11-30', 0, '0000-00-00', 7),
(534, 'Khadamull Islam Emon', '2002-07-03', 'Male', 'Islam', 'A+', 14, 'Karatia,Tangail', '01760537984', '', 'Abdul Khalek', 'Monwara Begum', 201635097, 1, '2016-11-30', 0, '0000-00-00', 7),
(535, 'Md. Shawon', '2002-11-21', 'Male', 'Islam', 'AB+', 14, 'Karatia,Tangail', '01624154203', '', 'Md.Mohat', 'Ms.Papia', 201635073, 1, '2016-11-30', 0, '0000-00-00', 7),
(536, 'Md.Sohag Mia', '2002-11-09', 'Male', 'Islam', 'O+', 14, 'Birpushia,Delduar,Tangail', '01727926914', '', 'Md.Shafiqul Islam', 'Sumi Begum', 201635017, 1, '2016-11-30', 0, '0000-00-00', 7),
(537, 'Md.Zayed Bin Anower', '2002-11-03', 'Male', 'Islam', 'O+', 14, 'Birpushia,Karatia,Tangail', '01761431033', '', 'Md.Anower Hossen', 'Rehana Pervin', 201635049, 1, '2016-11-30', 0, '0000-00-00', 7),
(538, 'Md.Romzan', '2003-03-01', 'Male', 'Islam', 'B+', 13, 'Birpushia,Karatia,Tangail', '01628296047', '', 'Md.Ajahar', 'Hamida', 201635051, 1, '2016-11-30', 0, '0000-00-00', 7),
(539, 'Md. Towhid', '2003-10-11', 'Male', 'Islam', 'A+', 13, 'Birpushia,Karatia,Tangail', '01728373937', '', 'Md.Abdul Baki MIah', 'Mrs.Soria', 201635034, 1, '2016-11-30', 0, '0000-00-00', 7),
(540, 'Sifat Ahmed', '2004-11-03', 'Male', 'Islam', 'A+', 12, 'Birpushia,Karatia,Tangail', '01766469971', '', 'Md.Ennac Ali', 'Shirin Begum', 201635007, 1, '2016-11-30', 0, '0000-00-00', 7),
(541, 'Md. Abdullah', '2003-11-25', 'Male', 'Islam', 'B+', 13, 'Jugni,Bagil,Tangail', '01741357938', '', 'Md.Sanwar Hossen', 'Ms.Amina Begum', 201635008, 1, '2016-11-30', 0, '0000-00-00', 7),
(542, 'Md.Rasel Hossen', '2001-12-25', 'Male', 'Islam', 'A+', 15, 'Ramdebpur,Potal Bazar,Kalihati,tangail', '01777593697', '', 'Md.Rahmat Ali', 'Mst.Asia Begum', 201643005, 1, '2016-12-01', 0, '0000-00-00', 7),
(543, 'Md.Saifulla Khan', '2001-12-27', 'Male', 'Islam', 'A+', 15, 'Mazlia,Romosta,Mirzapur,Tangail', '01703902250', '', 'Md.Abul Hossain Khan', 'Selina Begum', 201643137, 1, '2016-12-01', 0, '0000-00-00', 7),
(544, 'Zui', '2002-12-10', 'Female', 'Islam', 'A+', 14, 'Motora,Basail,Tangail', '01710691195', '', 'Md.Jahangir Alam', 'Lucky Begum', 201643116, 1, '2016-12-01', 0, '0000-00-00', 7),
(545, 'Daina Akter', '2002-09-20', 'Female', 'Islam', 'B+', 14, 'Matherjani,Tangail', '01765372999', '', 'Shajahan', 'Shefali Begum', 201643078, 1, '2016-12-01', 0, '0000-00-00', 7),
(546, 'Md.Naimul Islam Naim', '2001-12-14', 'Male', 'Islam', 'A+', 15, 'Mujar male,Asulia,Savar,Dhaka', '01726665468', '', 'Md.Shoriful Islam', 'Mst.Laili Akter', 201643170, 1, '2016-12-01', 0, '0000-00-00', 7),
(547, 'Al-Fesani Ahsan Alif', '2002-10-19', 'Male', 'Islam', 'B+', 14, 'Rupnagar R/A,Mirpur,Dhaka', '01628726353', 'alfesaniahsan@gmail.com', 'Sajjad Rahman', 'Salma Sultana', 201643174, 1, '2016-12-01', 0, '0000-00-00', 7),
(548, 'Md.Foysal Shikder', '2002-03-15', 'Male', 'Islam', 'B+', 14, 'Kandapara,Nagarpur,Tangail', '01629154359', '', 'S.m Azizul Hoque', 'Fahima Begum', 201643130, 1, '2016-12-01', 0, '0000-00-00', 7),
(549, 'Istiak Ahmed Emon', '2003-09-03', 'Male', 'Islam', 'O+', 13, 'Savar,Dhaka', '01713538167', '', 'Md.Shabuddin Ahmed', 'Parul Akter', 201643155, 1, '2016-12-01', 0, '0000-00-00', 7),
(550, 'Md.hafizur Rahman', '2001-04-01', 'Male', 'Islam', 'B+', 15, 'Mohonpur,Rajbari', '01713643118', '', 'Md.Abdul Malek Sarder', 'Ms.Sultana Razia', 201643135, 1, '2016-12-01', 0, '0000-00-00', 7),
(551, 'Jakiol hasan Omi', '2002-11-04', 'Male', 'Islam', 'A+', 15, 'Jarun,Konabari,Gazipur', '01712857766', '', 'Md.Hasibul Hasan Hasib', 'Ms,Jahanara Hasib', 201643071, 1, '2016-12-01', 0, '0000-00-00', 7),
(552, 'Al-Amin Foqir', '2001-12-06', 'Male', 'Islam', 'O+', 15, 'Talifnagar,Noton Mirpur,Pabna,Nera', '01715637838', '', 'Safiqul Islam', 'Suriya Begum', 201642053, 1, '2016-12-01', 0, '0000-00-00', 7),
(553, 'Hazard', '1970-01-01', 'Male', 'Islam', '', 14, 'kbnkj', '+8801919591191', 'mh@example.com', 'Abul', 'Morjina', 0, 1, '2016-12-25', 0, '0000-00-00', 7),
(554, 'Riyad Mahrez', '2016-12-13', 'Male', 'Islam', 'A+', 14, 'Dhaka', '', 'riyad@gmail.com', 'Anis Uddin', 'Lipi Akter', 201617033, 1, '2016-12-25', 0, '0000-00-00', 7),
(555, 'Hazard', '1970-01-01', 'Male', 'Islam', '', 14, 'kbnkj', '+8801919591191', 'mh@example.com', 'Abul', 'Morjina', 0, 1, '2016-12-25', 0, '0000-00-00', 7),
(556, 'Hazard', '1970-01-01', 'Male', 'Islam', '', 14, 'kbnkj', '+8801919591191', 'mh@example.com', 'Abul', 'Morjina', 201617035, 1, '2016-12-25', 0, '0000-00-00', 7),
(557, 'Hazard', '1970-01-01', 'Male', 'Islam', '', 14, 'kbnkj', '+8801919591191', 'mh@example.com', 'Abul', 'Morjina', 201617036, 1, '2016-12-25', 0, '0000-00-00', 7),
(558, 'Hasib', '1970-01-01', 'Male', 'Islam', 'A+', 14, 'Comilla', '+8801712113536', 'hasib@ymail.com', 'Abdur Rahim', 'Khaleda Begum', 201617037, 1, '2016-12-31', 0, '0000-00-00', 7),
(559, 'Rayhan', '1970-01-01', 'Male', 'Islam', 'A+', 14, 'Comilla', '+8801919591992', 'rayhan@gmail.com', 'Asif Khan', 'Saima AKter', 201633102, 1, '2016-12-31', 0, '0000-00-00', 7),
(560, 'Emon', '1970-01-01', 'Male', 'Islam', 'O+', 13, 'Comilla', '+8801919591191', 'emon@gmail.com', 'Akkas ALi', 'Setu Aketr', 201721046, 1, '2017-01-05', 0, '0000-00-00', 7),
(561, 'Nazmul Hasan  Bijoy', '1999-02-03', 'Male', 'Islam', 'O+ (ve)', 13, 'comilla', '01952149747', '', 'x', 'y', 0, 1, '2017-01-17', 0, '0000-00-00', 7),
(562, 'sajib ahmed', '2000-02-04', 'Male', 'Islam', 'O+ (ve)', 17, 'comilla', '01717686227', '', 'x', 'y', 201744002, 1, '2017-01-17', 0, '0000-00-00', 7),
(563, 'sajor miah', '2006-07-01', 'Male', 'Islam', 'A+ (ve)', 14, 'comilla', '', '', 'x', 'y', 201744003, 1, '2017-01-17', 0, '0000-00-00', 7);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `SUBJECT_ID` int(11) NOT NULL,
  `SUBJECT_NAME` varchar(300) CHARACTER SET latin1 NOT NULL,
  `CLASS_ID` int(11) NOT NULL,
  `MANDATORY` int(11) NOT NULL,
  `OPTIONAL` tinyint(1) NOT NULL,
  `PARENT_ID` int(11) NOT NULL,
  `TOTAL_MARK` int(11) NOT NULL,
  `PASS_MARK` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `SUBJECTIVE_MARK` int(11) NOT NULL,
  `SUBJECTIVE_PASS` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `OBJECTIVE_MARK` int(11) NOT NULL,
  `OBJECTIVE_PASS` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `PRACTICAL_MARK` int(11) NOT NULL,
  `PRACTICAL_PASS` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `GROUP_NAME` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `CREATED_DATE` date NOT NULL,
  `UPDATED_BY` int(11) NOT NULL,
  `UPDATED_DATE` date NOT NULL,
  `STATUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`SUBJECT_ID`, `SUBJECT_NAME`, `CLASS_ID`, `MANDATORY`, `OPTIONAL`, `PARENT_ID`, `TOTAL_MARK`, `PASS_MARK`, `SUBJECTIVE_MARK`, `SUBJECTIVE_PASS`, `OBJECTIVE_MARK`, `OBJECTIVE_PASS`, `PRACTICAL_MARK`, `PRACTICAL_PASS`, `GROUP_NAME`, `CREATED_BY`, `CREATED_DATE`, `UPDATED_BY`, `UPDATED_DATE`, `STATUS`) VALUES
(1, 'English', 1, 1, 0, 0, 100, '33', 100, '33', 0, '', 0, '', '', 1, '2016-12-18', 1, '2016-12-19', 7),
(2, 'Bangla', 1, 1, 0, 0, 100, '33', 100, '33', 0, '', 0, '', '', 1, '2016-12-19', 1, '2016-12-19', 7),
(3, 'Mathematics', 1, 1, 0, 0, 100, '33', 100, '33', 0, '', 0, '', '', 1, '2016-12-19', 0, '0000-00-00', 7),
(4, 'Religious book', 1, 1, 0, 0, 100, '33', 100, '33', 0, '', 0, '', '', 1, '2016-12-19', 0, '0000-00-00', 7),
(5, 'General knowledge', 1, 1, 0, 0, 100, '33', 100, '33', 0, '', 0, '', '', 1, '2016-12-19', 0, '0000-00-00', 7),
(6, 'Drawings', 1, 1, 0, 0, 25, '08', 25, '08', 0, '', 0, '', '', 1, '2016-12-19', 1, '2016-12-19', 7),
(7, 'Bangla', 2, 1, 0, 0, 100, '33', 100, '33', 0, '', 0, '', '', 1, '2016-12-19', 0, '0000-00-00', 7),
(8, 'English', 2, 1, 0, 0, 100, '33', 100, '33', 0, '', 0, '', '', 1, '2016-12-19', 0, '0000-00-00', 7),
(9, 'Mathematics', 2, 1, 0, 0, 100, '33', 100, '33', 0, '', 0, '', '', 1, '2016-12-19', 0, '0000-00-00', 7),
(10, 'Religious book', 2, 1, 0, 0, 50, '17', 50, '17', 0, '', 0, '', '', 1, '2016-12-19', 0, '0000-00-00', 7),
(11, 'General knowledge', 2, 1, 0, 0, 50, '17', 50, '17', 0, '', 0, '', '', 1, '2016-12-19', 0, '0000-00-00', 7),
(12, 'Drawings', 2, 1, 0, 0, 25, '08', 25, '08', 0, '', 0, '', '', 1, '2016-12-19', 0, '0000-00-00', 7),
(13, 'Bangla', 3, 1, 0, 0, 100, '33', 100, '33', 0, '', 0, '', '', 1, '2016-12-19', 0, '0000-00-00', 7),
(14, 'English', 3, 1, 0, 0, 100, '33', 100, '33', 0, '', 0, '', '', 1, '2016-12-19', 0, '0000-00-00', 7),
(15, 'Mathematics', 3, 1, 0, 0, 100, '33', 100, '33', 0, '', 0, '', '', 1, '2016-12-19', 0, '0000-00-00', 7),
(16, 'Religious book', 3, 1, 0, 0, 50, '17', 50, '17', 0, '', 0, '', '', 1, '2016-12-19', 0, '0000-00-00', 7),
(17, 'General knowledge', 3, 1, 0, 0, 50, '17', 50, '17', 0, '', 0, '', '', 1, '2016-12-19', 0, '0000-00-00', 7),
(18, 'Drawings', 3, 1, 0, 0, 25, '08', 25, '08', 0, '', 0, '', '', 1, '2016-12-19', 0, '0000-00-00', 7),
(19, 'Spoken', 3, 1, 0, 0, 50, '17', 50, '17', 0, '', 0, '', '', 1, '2016-12-19', 0, '0000-00-00', 7),
(20, 'Social science', 3, 1, 0, 0, 50, '17', 50, '17', 0, '', 0, '', '', 1, '2016-12-19', 0, '0000-00-00', 7),
(21, 'Bangla', 4, 1, 0, 0, 100, '33', 100, '33', 0, '', 0, '', '', 1, '2016-12-19', 0, '0000-00-00', 7),
(22, 'English', 4, 1, 0, 0, 100, '33', 100, '33', 0, '', 0, '', '', 1, '2016-12-19', 0, '0000-00-00', 7),
(23, 'Mathematics', 4, 1, 0, 0, 100, '33', 100, '33', 0, '', 0, '', '', 1, '2016-12-19', 0, '0000-00-00', 7),
(24, 'Computer', 4, 1, 0, 0, 50, '17', 50, '17', 0, '', 0, '', '', 1, '2016-12-19', 0, '0000-00-00', 7),
(25, 'General knowledge', 4, 1, 0, 0, 50, '17', 50, '17', 0, '', 0, '', '', 1, '2016-12-19', 0, '0000-00-00', 7),
(26, 'Drawings', 4, 1, 0, 0, 25, '08', 25, '08', 0, '', 0, '', '', 1, '2016-12-19', 0, '0000-00-00', 7),
(27, 'Spoken', 4, 1, 0, 0, 50, '17', 50, '17', 0, '', 0, '', '', 1, '2016-12-19', 0, '0000-00-00', 7),
(28, 'Social science', 4, 1, 0, 0, 50, '17', 50, '17', 0, '', 0, '', '', 1, '2016-12-19', 0, '0000-00-00', 7),
(29, 'Bangla', 5, 1, 0, 0, 100, '33', 100, '33', 0, '', 0, '', '', 1, '2016-12-19', 0, '0000-00-00', 7),
(30, 'Bangla 1st', 5, 1, 0, 29, 100, '33', 100, '33', 0, '', 0, '', '', 1, '2016-12-19', 0, '0000-00-00', 7),
(31, 'Bangla 2nd', 5, 1, 0, 29, 50, '17', 50, '17', 0, '', 0, '', '', 1, '2016-12-19', 0, '0000-00-00', 7),
(32, 'English', 5, 1, 0, 0, 100, '33', 100, '33', 0, '', 0, '', '', 1, '2016-12-19', 0, '0000-00-00', 7),
(33, 'English 1st', 5, 1, 0, 32, 100, '33', 100, '33', 0, '', 0, '', '', 1, '2016-12-19', 1, '2016-12-19', 7),
(34, 'English 2nd', 5, 1, 0, 32, 50, '17', 50, '17', 0, '', 0, '', '', 1, '2016-12-19', 0, '0000-00-00', 7),
(35, 'Mathematics', 5, 1, 0, 0, 100, '33', 100, '33', 0, '', 0, '', '', 1, '2016-12-19', 0, '0000-00-00', 7),
(36, 'Religious book', 5, 1, 0, 0, 100, '33', 100, '33', 0, '', 0, '', '', 1, '2016-12-19', 0, '0000-00-00', 7),
(37, 'Science', 5, 1, 0, 0, 100, '33', 100, '33', 0, '', 0, '', '', 1, '2016-12-19', 0, '0000-00-00', 7),
(38, 'Computer', 5, 1, 0, 0, 50, '17', 50, '17', 0, '', 0, '', '', 1, '2016-12-19', 0, '0000-00-00', 7),
(39, 'Bangladesh and Global Identity', 5, 1, 0, 0, 100, '33', 100, '33', 0, '', 0, '', '', 1, '2016-12-19', 0, '0000-00-00', 7),
(40, 'Spoken', 5, 1, 0, 0, 50, '17', 50, '17', 0, '', 0, '', '', 1, '2016-12-19', 0, '0000-00-00', 7),
(41, 'General knowledge', 5, 1, 0, 0, 50, '17', 50, '17', 0, '', 0, '', '', 1, '2016-12-19', 0, '0000-00-00', 7),
(42, 'Drawings', 5, 1, 0, 0, 25, '08', 25, '08', 0, '', 0, '', '', 1, '2016-12-19', 0, '0000-00-00', 7),
(43, 'Bangla', 6, 1, 0, 0, 100, '33', 100, '33', 0, '', 0, '', '', 1, '2016-12-19', 0, '0000-00-00', 7),
(44, 'Bangla 1st', 6, 1, 0, 43, 100, '33', 100, '33', 0, '', 0, '', '', 1, '2016-12-19', 0, '0000-00-00', 7),
(45, 'Bangla 2nd', 6, 1, 0, 43, 50, '17', 50, '17', 0, '', 0, '', '', 1, '2016-12-19', 0, '0000-00-00', 7),
(46, 'English', 6, 1, 0, 0, 100, '33', 100, '33', 0, '', 0, '', '', 1, '2016-12-19', 0, '0000-00-00', 7),
(47, 'English 1st', 6, 1, 0, 46, 100, '33', 100, '33', 0, '', 0, '', '', 1, '2016-12-19', 0, '0000-00-00', 7),
(48, 'English 2nd', 6, 1, 0, 46, 50, '17', 50, '17', 0, '', 0, '', '', 1, '2016-12-19', 0, '0000-00-00', 7),
(49, 'Mathematics', 6, 1, 0, 0, 100, '33', 100, '33', 0, '', 0, '', '', 1, '2016-12-19', 0, '0000-00-00', 7),
(50, 'Religious book', 6, 1, 0, 0, 100, '33', 100, '33', 0, '', 0, '', '', 1, '2016-12-19', 0, '0000-00-00', 7),
(51, 'Science', 6, 1, 0, 0, 100, '33', 100, '33', 0, '', 0, '', '', 1, '2016-12-19', 0, '0000-00-00', 7),
(52, 'Computer', 6, 1, 0, 0, 50, '17', 50, '17', 0, '', 0, '', '', 1, '2016-12-19', 0, '0000-00-00', 7),
(53, 'Bangladesh and Global Identity', 6, 1, 0, 0, 100, '33', 100, '33', 0, '', 0, '', '', 1, '2016-12-19', 0, '0000-00-00', 7),
(54, 'Spoken', 6, 1, 0, 0, 50, '17', 50, '17', 0, '', 0, '', '', 1, '2016-12-19', 0, '0000-00-00', 7),
(55, 'General knowledge', 6, 1, 0, 0, 50, '17', 50, '17', 0, '', 0, '', '', 1, '2016-12-19', 0, '0000-00-00', 7),
(56, 'Drawings', 6, 1, 0, 0, 25, '08', 25, '08', 0, '', 0, '', '', 1, '2016-12-19', 0, '0000-00-00', 7),
(57, 'Bangla', 8, 1, 0, 0, 100, '33', 100, '33', 0, '', 0, '', '', 1, '2016-12-19', 0, '0000-00-00', 7),
(58, 'Bangla 1st', 8, 1, 0, 57, 100, '33', 70, '23', 30, '10', 0, '', '', 1, '2016-12-19', 0, '0000-00-00', 7),
(59, 'Bangla 2nd', 8, 1, 0, 57, 50, '17', 30, '10', 20, '7', 0, '', '', 1, '2016-12-19', 0, '0000-00-00', 7),
(60, 'English', 8, 1, 0, 0, 100, '33', 100, '33', 0, '', 0, '', '', 1, '2016-12-19', 0, '0000-00-00', 7),
(61, 'English 1st', 8, 1, 0, 60, 100, '33', 100, '33', 0, '', 0, '', '', 1, '2016-12-19', 0, '0000-00-00', 7),
(62, 'English 2nd', 8, 1, 0, 60, 50, '17', 50, '17', 0, '', 0, '', '', 1, '2016-12-19', 0, '0000-00-00', 7),
(63, 'Mathematics', 8, 1, 0, 0, 100, '33', 70, '23', 30, '10', 0, '', '', 1, '2016-12-19', 0, '0000-00-00', 7),
(64, 'Religious book', 8, 1, 0, 0, 100, '33', 70, '23', 30, '10', 0, '', '', 1, '2016-12-19', 0, '0000-00-00', 7),
(65, 'Bangladesh and Global Identity', 8, 1, 0, 0, 100, '33', 70, '23', 30, '10', 0, '', '', 1, '2016-12-19', 0, '0000-00-00', 7),
(66, 'Agriculture', 8, 1, 0, 0, 100, '33', 70, '23', 30, '10', 0, '', '', 1, '2016-12-19', 0, '0000-00-00', 7),
(67, 'Science', 8, 1, 0, 0, 100, '33', 70, '23', 30, '10', 0, '', '', 1, '2016-12-19', 0, '0000-00-00', 7),
(68, 'Information and Technology', 8, 1, 0, 0, 100, '33', 70, '23', 30, '10', 0, '', '', 1, '2016-12-19', 0, '0000-00-00', 7),
(69, 'Physical Education and Health', 8, 1, 0, 0, 50, '17', 25, '8', 25, '8', 0, '', '', 1, '2016-12-19', 0, '0000-00-00', 7),
(70, 'Arts and Crafts', 8, 1, 0, 0, 50, '17', 25, '8', 25, '8', 0, '', '', 1, '2016-12-19', 0, '0000-00-00', 7),
(71, 'Work and Life-Way', 8, 1, 0, 0, 50, '17', 30, '10', 20, '7', 0, '', '', 1, '2016-12-19', 1, '2016-12-19', 7),
(72, 'Bangla', 9, 1, 0, 0, 100, '33', 100, '33', 0, '', 0, '', '', 1, '2016-12-19', 0, '0000-00-00', 7),
(73, 'Bangla 1st', 9, 1, 0, 72, 100, '33', 70, '23', 30, '10', 0, '', '', 1, '2016-12-19', 0, '0000-00-00', 7),
(74, 'Bangla 2nd', 9, 1, 0, 72, 50, '17', 30, '10', 20, '7', 0, '', '', 1, '2016-12-19', 0, '0000-00-00', 7),
(75, 'English', 9, 1, 0, 0, 100, '33', 100, '33', 0, '', 0, '', '', 1, '2016-12-19', 0, '0000-00-00', 7),
(76, 'English 1st', 9, 1, 0, 75, 100, '33', 100, '33', 0, '', 0, '', '', 1, '2016-12-19', 0, '0000-00-00', 7),
(77, 'English 2nd', 9, 1, 0, 75, 50, '17', 50, '17', 0, '', 0, '', '', 1, '2016-12-19', 0, '0000-00-00', 7),
(78, 'Mathematics', 9, 1, 0, 0, 100, '33', 70, '23', 30, '10', 0, '', '', 1, '2016-12-19', 0, '0000-00-00', 7),
(79, 'Religious book', 9, 1, 0, 0, 100, '33', 70, '23', 30, '10', 0, '', '', 1, '2016-12-19', 0, '0000-00-00', 7),
(80, 'Bangladesh and Global Identity', 9, 1, 0, 0, 100, '33', 70, '23', 30, '10', 0, '', '', 1, '2016-12-19', 0, '0000-00-00', 7),
(81, 'Agriculture', 9, 1, 0, 0, 100, '33', 70, '23', 30, '10', 0, '', '', 1, '2016-12-19', 0, '0000-00-00', 7),
(82, 'Science', 9, 1, 0, 0, 100, '33', 70, '23', 30, '10', 0, '', '', 1, '2016-12-19', 0, '0000-00-00', 7),
(83, 'Information and Technology', 9, 1, 0, 0, 100, '33', 70, '23', 30, '10', 0, '', '', 1, '2016-12-19', 0, '0000-00-00', 7),
(84, 'Physical Education and Health', 9, 1, 0, 0, 50, '17', 25, '8', 25, '8', 0, '', '', 1, '2016-12-19', 0, '0000-00-00', 7),
(85, 'Arts and Crafts', 9, 1, 0, 0, 50, '17', 25, '8', 25, '8', 0, '', '', 1, '2016-12-19', 0, '0000-00-00', 7),
(86, 'Work and Life-Way', 9, 1, 0, 0, 50, '17', 30, '10', 20, '7', 0, '', '', 1, '2016-12-19', 0, '0000-00-00', 7),
(87, 'Bangla', 11, 1, 0, 0, 100, '33', 100, '33', 0, '', 0, '', '', 1, '2016-12-19', 0, '0000-00-00', 7),
(88, 'Bangla 1st', 11, 1, 0, 87, 100, '33', 70, '23', 30, '10', 0, '', 'science', 1, '2016-12-19', 1, '2016-12-19', 7),
(89, 'Bangla 2nd', 11, 1, 0, 87, 100, '33', 70, '23', 30, '10', 0, '', 'science', 1, '2016-12-19', 0, '0000-00-00', 7),
(90, 'English', 11, 1, 0, 0, 100, '33', 100, '33', 0, '', 0, '', 'science', 1, '2016-12-19', 0, '0000-00-00', 7),
(91, 'English 1st', 11, 1, 0, 90, 100, '33', 100, '33', 0, '', 0, '', 'science', 1, '2016-12-19', 0, '0000-00-00', 7),
(92, 'English 2nd', 11, 1, 0, 90, 100, '33', 100, '33', 0, '', 0, '', 'science', 1, '2016-12-19', 0, '0000-00-00', 7),
(93, 'Mathematics', 11, 1, 0, 0, 100, '33', 70, '23', 30, '10', 0, '', 'science', 1, '2016-12-19', 0, '0000-00-00', 7),
(94, 'Religious book', 11, 1, 0, 0, 100, '33', 70, '23', 30, '10', 0, '', 'science', 1, '2016-12-19', 0, '0000-00-00', 7),
(95, 'Bangladesh and Global Identity', 11, 1, 0, 0, 100, '33', 70, '23', 30, '10', 0, '', '', 1, '2016-12-19', 0, '0000-00-00', 7),
(96, 'Chemistry', 11, 0, 0, 0, 100, '33', 50, '17', 25, '8', 25, '8', '', 1, '2016-12-19', 1, '2016-12-20', 7),
(97, 'Physics', 11, 0, 0, 0, 100, '33', 50, '17', 25, '8', 25, '8', '', 1, '2016-12-19', 1, '2016-12-20', 7),
(98, 'Biological Sciences', 11, 0, 1, 0, 100, '33', 50, '17', 25, '8', 25, '8', 'science', 1, '2016-12-19', 1, '2016-12-19', 7),
(99, 'Agriculture', 11, 0, 1, 0, 100, '33', 50, '17', 25, '7', 25, '8', '', 1, '2016-12-19', 0, '0000-00-00', 7),
(100, 'Physical Education and Health', 11, 1, 0, 0, 50, '17', 25, '8', 25, '8', 0, '', '', 1, '2016-12-19', 0, '0000-00-00', 7),
(101, 'Higher Mathematics', 11, 0, 1, 0, 100, '33', 50, '17', 25, '8', 25, '8', 'science', 1, '2016-12-19', 0, '0000-00-00', 7),
(102, 'Information and Technology', 11, 1, 0, 0, 50, '17', 30, '10', 20, '7', 0, '', '', 1, '2016-12-19', 0, '0000-00-00', 7),
(103, 'Career Education', 11, 1, 0, 0, 50, '17', 30, '10', 20, '7', 0, '', '', 1, '2016-12-19', 0, '0000-00-00', 7),
(104, 'Accounting', 11, 0, 0, 0, 100, '33', 70, '23', 30, '10', 0, '', 'commerce', 1, '2016-12-19', 1, '2016-12-20', 7),
(105, 'Finance and banking', 11, 0, 0, 0, 100, '33', 70, '23', 30, '10', 0, '', 'commerce', 1, '2016-12-19', 1, '2016-12-20', 7),
(106, 'Business Initiatives', 11, 0, 0, 0, 100, '33', 70, '23', 30, '10', 0, '', 'commerce', 1, '2016-12-19', 1, '2016-12-20', 7);

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `SUB_CATEGORY_ID` int(11) NOT NULL,
  `CAT_ID` int(11) NOT NULL,
  `SUB_CATEGORY_NAME` varchar(50) NOT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `CREATED_DATE` date NOT NULL,
  `UPDATED_BY` int(11) NOT NULL,
  `UPDATED_DATE` date NOT NULL,
  `STATUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`SUB_CATEGORY_ID`, `CAT_ID`, `SUB_CATEGORY_NAME`, `CREATED_BY`, `CREATED_DATE`, `UPDATED_BY`, `UPDATED_DATE`, `STATUS`) VALUES
(1, 8, 'Price Giving Ceremony', 1, '2016-07-24', 1, '2016-12-23', 7),
(2, 8, 'Activities', 1, '2016-07-24', 1, '2016-12-23', 7),
(3, 8, 'Rally', 1, '2016-07-24', 1, '2016-12-23', 7),
(4, 9, 'Syllabus', 1, '2016-08-31', 0, '0000-00-00', 7),
(5, 9, 'Admission', 1, '2016-08-31', 0, '0000-00-00', 0),
(6, 10, 'Musice', 1, '2016-09-03', 0, '0000-00-00', 7),
(7, 10, 'FAREWELL', 1, '2016-09-03', 0, '0000-00-00', 7),
(8, 10, 'Class', 1, '2016-09-03', 0, '0000-00-00', 7),
(9, 8, 'School Campus', 1, '2016-09-08', 0, '0000-00-00', 7);

-- --------------------------------------------------------

--
-- Table structure for table `sub_sub_category`
--

CREATE TABLE `sub_sub_category` (
  `SUB_SUB_CATEGORY_ID` int(11) NOT NULL,
  `SUB_CATEGORY_ID` int(11) NOT NULL,
  `SUB_SUB_CATEGORY_NAME` varchar(50) NOT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `CREATED_DATE` date NOT NULL,
  `UPDATED_BY` int(11) NOT NULL,
  `UPDATED_DATE` date NOT NULL,
  `STATUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sub_sub_category`
--

INSERT INTO `sub_sub_category` (`SUB_SUB_CATEGORY_ID`, `SUB_CATEGORY_ID`, `SUB_SUB_CATEGORY_NAME`, `CREATED_BY`, `CREATED_DATE`, `UPDATED_BY`, `UPDATED_DATE`, `STATUS`) VALUES
(2, 15, 'Academy', 1, '2016-05-23', 0, '0000-00-00', 7),
(3, 15, 'Mission &amp; Vision', 1, '2016-05-23', 0, '0000-00-00', 7),
(4, 15, 'Our Values', 1, '2016-05-23', 0, '0000-00-00', 7),
(5, 16, 'Training One', 1, '2016-05-23', 0, '0000-00-00', 7),
(6, 16, 'Training Two', 1, '2016-05-23', 0, '0000-00-00', 7),
(9, 15, 'Faculty Members', 1, '2016-05-26', 0, '0000-00-00', 7),
(10, 15, 'Citizen Charter', 1, '2016-05-26', 0, '0000-00-00', 7),
(11, 20, 'Course 01', 1, '2016-05-31', 0, '0000-00-00', 7);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `TEACHER_ID` int(11) NOT NULL,
  `TEACHER_NAME` varchar(150) CHARACTER SET utf8 NOT NULL,
  `TEACHER_BIRTHDAY` date NOT NULL,
  `DESIGNATION_ID` int(11) NOT NULL,
  `GENDER` varchar(15) CHARACTER SET utf8 NOT NULL,
  `RELIGION` varchar(150) CHARACTER SET utf8 NOT NULL,
  `BLOOD_GROUP` varchar(5) CHARACTER SET utf8 NOT NULL,
  `PRESENT_ADDRESS` text CHARACTER SET utf8 NOT NULL,
  `PERMANENT_ADDRESS` text COLLATE utf8_unicode_ci NOT NULL,
  `VOTER_ID` varchar(30) CHARACTER SET utf8 NOT NULL,
  `PHONE` varchar(30) CHARACTER SET utf8 NOT NULL,
  `EMAIL` varchar(50) CHARACTER SET utf8 NOT NULL,
  `EDUCATIONAL_BACK` text COLLATE utf8_unicode_ci NOT NULL,
  `IMAGES` varchar(200) CHARACTER SET utf8 NOT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `CREATED_DATE` date NOT NULL,
  `UPDATED_BY` int(11) NOT NULL,
  `UPDATED_DATE` date NOT NULL,
  `STATUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`TEACHER_ID`, `TEACHER_NAME`, `TEACHER_BIRTHDAY`, `DESIGNATION_ID`, `GENDER`, `RELIGION`, `BLOOD_GROUP`, `PRESENT_ADDRESS`, `PERMANENT_ADDRESS`, `VOTER_ID`, `PHONE`, `EMAIL`, `EDUCATIONAL_BACK`, `IMAGES`, `CREATED_BY`, `CREATED_DATE`, `UPDATED_BY`, `UPDATED_DATE`, `STATUS`) VALUES
(1, 'Bijoy Kumar Roy', '2016-06-06', 1, 'Male', 'Hindu', 'O+', 'Dhaka, Bangladesh', 'Dhaka, Bangladesh', '7857544578', '01727743522', 'bijoykumar@gmail.com', 'SSC, HSC, MS', '', 1, '2016-06-06', 1, '2016-08-08', 7),
(2, 'Afroza Akter', '2016-06-01', 2, 'Female', 'Islam', 'O+', 'sdfvsdgvdfg', 'fvdfbghed', '3464567547yy', '+8801912871203', 'afroza@hotmail.com', 'sdbgvdfhbfghn', 'Lisa-Villarreal.jpg', 1, '2016-06-01', 1, '2016-07-21', 7),
(3, 'Harizur Rahman', '2016-06-14', 2, 'Male', 'Islam', 'A-', 'Comilla', 'Comilla', '7857438956438956439', '02915738', 'hariz@gmail.com', 'Graduated', 'Jellyfish.jpg', 1, '2016-06-19', 0, '0000-00-00', 7),
(4, 'Khaja Hossian', '2016-06-05', 3, 'Male', 'Islam', 'A+', 'Comilla', 'Lakshlam', '658465438654848', '02975123', 'khaza@ymail.com', 'Graduated', 'Desert.jpg', 1, '2016-06-19', 0, '0000-00-00', 7),
(5, 'MIzanur Rahman', '2000-07-01', 3, 'Male', 'Islam', 'B+', 'Dhaka, Bangladesh', 'Dhaka, Bangladesh', '54852598578', '017484588', 'mizanur@gmail.com', 'SSC, HSC, Ms', 'math for secondary school.jpg', 1, '2016-07-21', 0, '0000-00-00', 7),
(6, 'Sabrina Akhter', '2000-07-01', 3, 'Female', '', 'O+', 'Dhaka, Bangladesh', 'Dhaka, Bangladesh', '78874458', '0174784757', 'sabiran@gmail.com', 'SSC, HSC, MS', '', 1, '2016-07-21', 1, '2016-07-21', 7),
(7, 'Mehzabin Akhter', '1990-07-21', 3, 'Female', 'Islam', 'O-', 'Dhaka, Bangladesh', 'Dhaka, Bangladesh', '1788758', '017487548', 'mehzabin@gmail.com', 'SSC, HSC, MS', 'highschoolteacher.jpg', 1, '2016-07-21', 0, '0000-00-00', 7),
(8, 'Rezaul Islam', '1990-07-21', 3, 'Male', 'Islam', 'B+', 'Dhaka, Bangladesh', 'Dhaka, Banladesh', '84775578', '017848785', 'rezaul@gmail.com', 'SSC, HSC, MA', 'images.jpg', 1, '2016-07-21', 1, '2016-07-21', 7),
(9, 'Mahmuda Akhter', '1990-07-21', 3, 'Female', 'Islam', 'O+', 'Dhaka, Bangladesh', 'Dhaka, Bangladesh', '201648877', '017848585', 'mahmuda@gmail.com', 'SSC, HSC, MA', 'b71d3a075ec99b64d77eef5de49f88ac.jpeg', 1, '2016-07-21', 0, '0000-00-00', 7);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `USER_ID` int(11) NOT NULL,
  `ROLE_ID` int(11) DEFAULT NULL,
  `COMPANY_ID` int(11) DEFAULT NULL,
  `STUDENT_ID` int(11) NOT NULL,
  `TEACHER_ID` int(11) NOT NULL,
  `PARENT_ID` int(11) NOT NULL,
  `USER_NAME` varchar(50) NOT NULL,
  `USER_EMAIL` varchar(50) NOT NULL,
  `USER_PHONE` varchar(50) NOT NULL,
  `USER_TYPE` varchar(50) NOT NULL,
  `USER_PASSWORD` varchar(50) NOT NULL,
  `USER_PASSWORD_HISTORY` varchar(250) DEFAULT NULL,
  `CREATED_BY` int(11) DEFAULT NULL,
  `CREATED_DATE` datetime DEFAULT NULL,
  `UPDATED_BY` int(11) DEFAULT NULL,
  `UPDATED_DATE` datetime DEFAULT NULL,
  `STATUS` tinyint(4) NOT NULL COMMENT '1=active | -1=inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`USER_ID`, `ROLE_ID`, `COMPANY_ID`, `STUDENT_ID`, `TEACHER_ID`, `PARENT_ID`, `USER_NAME`, `USER_EMAIL`, `USER_PHONE`, `USER_TYPE`, `USER_PASSWORD`, `USER_PASSWORD_HISTORY`, `CREATED_BY`, `CREATED_DATE`, `UPDATED_BY`, `UPDATED_DATE`, `STATUS`) VALUES
(1, 0, 0, 0, 0, 0, 'Admin', 'admin@cyhs79.edu.bd', '', 'admin', 'AvPzL4oU37R9-2KTQOqYgMLWTcsCmFG3U8jLemJx4V8', '5rrCVs4UfxFWr7lzHI1BejzV96G-_cFT5YgRaa8PukY', 1, '2015-09-16 11:12:13', 1, '2017-08-10 01:38:40', 9),
(4, 3, NULL, 0, 0, 0, 'mh', 'developer.mh.me@gmail.com', '+8801722432578', '', 'AvPzL4oU37R9-2KTQOqYgMLWTcsCmFG3U8jLemJx4V8', 'Ki6tIkfo7hfTTVmvPsu-ZWwv-qSZKw2i5OPaErEWAF0%2C', 1, '2016-06-22 05:58:45', NULL, '2016-12-15 05:59:23', 7),
(5, 2, NULL, 1, 0, 0, 'Eric Abidal', 'abidal@hotmail.com', '+8801919228690', '', 'AvPzL4oU37R9-2KTQOqYgMLWTcsCmFG3U8jLemJx4V8', NULL, 1, '2016-07-12 05:04:58', NULL, NULL, 6),
(6, 4, NULL, 2, 0, 0, 'Nayim Khondokar', 'student@base4.com', '+8801733180725', '', 'AvPzL4oU37R9-2KTQOqYgMLWTcsCmFG3U8jLemJx4V8', 'Ki6tIkfo7hfTTVmvPsu-ZWwv-qSZKw2i5OPaErEWAF0%2C', 1, '2016-07-12 05:08:02', NULL, '2017-06-08 05:09:24', 7),
(7, 5, NULL, 0, 1, 0, 'Bijoy Kumar Roy', 'teacher@base4.com', '01727743522', '', 'AvPzL4oU37R9-2KTQOqYgMLWTcsCmFG3U8jLemJx4V8', 'MHOmrGVmfGwS1B-CO3YWyY6JwBHx_trqYr4m7pBMVPQ%2C', 1, '2016-07-13 05:11:27', NULL, '2017-09-15 05:14:32', 7),
(8, 6, NULL, 2, 0, 2, 'Cristiano Coman', 'parents@base4.com', '01744724905', '', 'AvPzL4oU37R9-2KTQOqYgMLWTcsCmFG3U8jLemJx4V8', 'MHOmrGVmfGwS1B-CO3YWyY6JwBHx_trqYr4m7pBMVPQ%2C', 1, '2016-07-13 06:17:31', NULL, '2017-07-13 06:20:27', 7),
(9, 7, NULL, 0, 0, 0, 'Admin', 'admin@base4bd.com', '', 'admin', 'AvPzL4oU37R9-2KTQOqYgMLWTcsCmFG3U8jLemJx4V8', NULL, 1, '2016-07-11 00:00:00', 9, '2017-08-09 06:02:46', 7),
(10, 4, NULL, 9, 0, 0, 'Adnan Sami', 'adnansami@gmail.com', '019864588', '', 'AvPzL4oU37R9-2KTQOqYgMLWTcsCmFG3U8jLemJx4V8', NULL, 1, '2016-07-28 06:37:51', NULL, NULL, 7),
(11, 4, NULL, 1, 0, 0, 'Md.Shahriar Fahim', '201642114', '01743882828', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(12, 4, NULL, 2, 0, 0, 'Md.Shahriar Fahim', '0', '01743882828', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(13, 4, NULL, 3, 0, 0, 'Saimon Hosen', '201642119', '01955605795', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(14, 4, NULL, 4, 0, 0, 'Md.Sadhin Islam', '201642106', '01723221813', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(15, 4, NULL, 5, 0, 0, 'Md.Anis', '201642080', '01771916653', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(16, 4, NULL, 6, 0, 0, 'Ridoy Ahmed', '201642051', '01726952439', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(17, 4, NULL, 7, 0, 0, 'Abu Taher', '201642065', '01714376496', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(18, 4, NULL, 8, 0, 0, 'Md.Shahriar', '201642123', '01732320812', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(19, 4, NULL, 9, 0, 0, 'Nazmul Hossain', '201642052', '01754491264', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(20, 4, NULL, 10, 0, 0, 'Md.Kawsar Ahmed Siam', '201642047', '01823004355', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(21, 4, NULL, 11, 0, 0, 'Md.Limon Shikder', '201642050', '01733644678', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(22, 4, NULL, 12, 0, 0, 'Md.Badhon Miah', '201642064', '01748754374', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(23, 4, NULL, 13, 0, 0, 'Md.Bijoy Mia', '201642040', '01792681920', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(24, 4, NULL, 14, 0, 0, 'Md.Saidul Islam Bipu', '201642043', '01767492112/01681810716', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(25, 4, NULL, 15, 0, 0, 'Md Rakib Miah', '201642035', '01741356301', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(26, 4, NULL, 16, 0, 0, 'Md.Hasan Ali', '201642085', '01959138937', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(27, 4, NULL, 17, 0, 0, 'Jibon Miah', '201642126', '01729789461', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(28, 4, NULL, 18, 0, 0, 'Yeaman Al Mobin', '201642099', '01741172363', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(29, 4, NULL, 19, 0, 0, 'Sayem Ahmed', '201642105', '01753539494', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(30, 4, NULL, 20, 0, 0, 'Md.Anik MIah', '201642141', '01733882840', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(31, 4, NULL, 21, 0, 0, 'Md Rakibul Hasan Rakib', '201642038', '01728691051/01715750481', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(32, 4, NULL, 22, 0, 0, 'Imran Ahmed Niloy', '201609004', '01819478172', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(33, 4, NULL, 23, 0, 0, 'Diya', '201609003', '01820066322', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(34, 4, NULL, 24, 0, 0, 'Ashiqur Rahman Akash', '201609002', '01780047771', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(35, 4, NULL, 25, 0, 0, 'Md Jihad Mia', '201609013', '01732327208', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(36, 4, NULL, 26, 0, 0, 'Maria Akter', '201609006', '01720112865', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(37, 4, NULL, 27, 0, 0, 'Jannat', '201609012', '01715509771', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(38, 4, NULL, 28, 0, 0, 'Israt Jahan Jerin', '201609001', '01728373937', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(39, 4, NULL, 29, 0, 0, 'Mohid', '201609015', '01741427125', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(40, 4, NULL, 30, 0, 0, 'Israt Jahan Easa', '201609008', '01760627848', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(41, 4, NULL, 31, 0, 0, 'Eanur', '201609014', '01741391773', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(42, 4, NULL, 32, 0, 0, 'Nurnobi  Islam', '201609010', '017382111440', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(43, 4, NULL, 33, 0, 0, 'Junaidul Islam Jarif', '201609016', '01740647976', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(44, 4, NULL, 34, 0, 0, 'Md.Tauhid', '201609011', '01737679579', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(45, 4, NULL, 35, 0, 0, 'Md.Siam Hossen', '201609005', '01710174665', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(46, 4, NULL, 36, 0, 0, 'Azim Islam', '201609017', '01700642625', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(47, 4, NULL, 37, 0, 0, 'Sheikh Haris Hossain', '0', '01794191553', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(48, 4, NULL, 38, 0, 0, 'Md.Alif Mia', '201609001', '01732629634', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(49, 4, NULL, 39, 0, 0, 'Meraz', '201613002', '01768389147', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(50, 4, NULL, 40, 0, 0, 'Mir Sani', '0', '01706266552', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(51, 4, NULL, 41, 0, 0, 'Sabukun Nashar', '201613004', '01712696189', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(52, 4, NULL, 42, 0, 0, 'Jannat Toa', '201613005', '01752733981', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(53, 4, NULL, 43, 0, 0, 'Sumiya Khan', '201613006', '01764675300', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(54, 4, NULL, 44, 0, 0, 'Khanduker Bokhtiar', '201613007', '01714679781', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(55, 4, NULL, 45, 0, 0, 'Urme', '201613008', '01750202516', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(56, 4, NULL, 46, 0, 0, 'Labib Khandaker', '201613009', '01866297102', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(57, 4, NULL, 47, 0, 0, 'Nabila Khandakar', '201613010', '01717472984', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(58, 4, NULL, 48, 0, 0, 'Afser Miah', '201613012', '01719870049', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(59, 4, NULL, 49, 0, 0, 'Irin', '201613013', '', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(60, 4, NULL, 50, 0, 0, 'Abdullah', '201613011', '01738083041', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(61, 4, NULL, 51, 0, 0, 'Shuvo', '201613015', '01712871211', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(62, 4, NULL, 52, 0, 0, 'Arafat', '201613016', '01731040550', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(63, 4, NULL, 53, 0, 0, 'Zannatul Tiya', '201613017', '01776244868/01733440857', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(64, 4, NULL, 54, 0, 0, 'Nafis Ahmed', '201613018', '01738093630', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(65, 4, NULL, 55, 0, 0, 'Momo Hamid', '201613020', '01552102718', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(66, 4, NULL, 56, 0, 0, 'Siam Mia', '201613022', '', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(67, 4, NULL, 57, 0, 0, 'Shorna Saha', '201613023', '01760836053/01716400177', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(68, 4, NULL, 58, 0, 0, 'Manika Saha', '201613024', '01712568953', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(69, 4, NULL, 59, 0, 0, 'Jubaida Jahan Usha', '201613025', '01717830575', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(70, 4, NULL, 60, 0, 0, 'shajan', '201613026', '01754790903', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(71, 4, NULL, 61, 0, 0, 'Shihab Uddin Shoyeb', '201621001', '01725699152/01725341239', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(72, 4, NULL, 62, 0, 0, 'Dila Khandaker', '201621002', '01758252576', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(73, 4, NULL, 63, 0, 0, 'Dola Akter', '201621003', '', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(74, 4, NULL, 64, 0, 0, 'Md.Elius Hossain Bijoy', '201621005', '01924720569', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(75, 4, NULL, 65, 0, 0, 'Shohag Miah', '201621006', '01786488948', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(76, 4, NULL, 66, 0, 0, 'Kh.Sazzad Hossain Numan', '201621008', '01732141508', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(77, 4, NULL, 67, 0, 0, 'Md.Anik MIah', '201621010', '01718195457', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(78, 4, NULL, 68, 0, 0, 'Aysha Khan Rupa', '201621011', '01797467953', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(79, 4, NULL, 69, 0, 0, 'Rejaul Karim Rimon', '201621012', '01747261832', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(80, 4, NULL, 70, 0, 0, 'Sharmin Akter', '201621013', '01788161884', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(81, 4, NULL, 71, 0, 0, 'Sonia Akter', '201621014', '01788161884', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(82, 4, NULL, 72, 0, 0, 'Md. Manir Sarker', '201621015', '01715814465', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(83, 4, NULL, 73, 0, 0, 'Abdullah Hel Kafi Saad', '201621016', '01990492890', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(84, 4, NULL, 74, 0, 0, 'Khandaker Antar', '201621017', '01730604116', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(85, 4, NULL, 75, 0, 0, 'Apon Mia', '201621018', '01739590044', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(86, 4, NULL, 76, 0, 0, 'KH.Tangid', '201621019', '01747895994', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(87, 4, NULL, 77, 0, 0, 'shimul Ahmed', '201621020', '01762243111', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(88, 4, NULL, 78, 0, 0, 'Israt Jahan Elma', '201621021', '', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(89, 4, NULL, 79, 0, 0, 'Md.Iashin Arafat Miah', '201617022', '01714376496', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(90, 4, NULL, 80, 0, 0, 'Md.Mahabub Hasan Siam', '201621023', '01733273856', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(91, 4, NULL, 81, 0, 0, 'Abdula Rohoman Alve', '201621024', '01711513182', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(92, 4, NULL, 82, 0, 0, 'Piyel', '201621027', 'o1794191553', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(93, 4, NULL, 83, 0, 0, 'Tuhin Mullah', '201621027', '01871671618', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(94, 4, NULL, 84, 0, 0, 'Merin Afrin Mona', '201621029', '01716759523', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(95, 4, NULL, 85, 0, 0, 'Md.Ripon Islam', '201617030', '01772509365', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(96, 4, NULL, 86, 0, 0, 'Md.Nasir', '201621031', '01779622178', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(97, 4, NULL, 87, 0, 0, 'Atifa Khandoker Alo', '201621032', '01677942190', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(98, 4, NULL, 88, 0, 0, 'Habiba', '201621033', '01725114772', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(99, 4, NULL, 89, 0, 0, 'sazid Miah', '201621034', '', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(100, 4, NULL, 90, 0, 0, 'Sirajul Islam', '201621035', '', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(101, 4, NULL, 91, 0, 0, 'Gour Raj Bangshi', '201621036', '01727051419', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(102, 4, NULL, 92, 0, 0, 'Md.Akash', '201621038', '01735618077', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(103, 4, NULL, 93, 0, 0, 'Anisha Islam Eva', '201621039', '01741847296', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(104, 4, NULL, 94, 0, 0, 'Siam Miah', '201621040', '01774893474', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(105, 4, NULL, 95, 0, 0, 'Mazid Miah', '201621041', '01628222705', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(106, 4, NULL, 96, 0, 0, 'Rehat', '201621042', '01785668772', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(107, 4, NULL, 97, 0, 0, 'Md.Faysal', '201621045', '01739830867', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(108, 4, NULL, 98, 0, 0, 'Sigma', '201625035', '01736704694', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(109, 4, NULL, 99, 0, 0, 'Tamim', '201625001', '01710821431', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(110, 4, NULL, 100, 0, 0, 'srabon', '201625002', '01746230427', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(111, 4, NULL, 101, 0, 0, 'MIm Akter', '201625003', '01732629634', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(112, 4, NULL, 102, 0, 0, 'Hossain Mahmud Zihad', '201625004', '01715813790', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(113, 4, NULL, 103, 0, 0, 'Shazidur', '201625005', '01746096263', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(114, 4, NULL, 104, 0, 0, 'Nusrat Jahan', '201625006', '01726413858', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(115, 4, NULL, 105, 0, 0, 'Sifat Miah', '201625007', '01725126293', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(116, 4, NULL, 106, 0, 0, 'Sumaya Mitu', '201625008', '01709768486', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(117, 4, NULL, 107, 0, 0, 'Md.Ismail Hossen', '201625009', '01758100525', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(118, 4, NULL, 108, 0, 0, 'Shakib Talukder Siam', '201625010', '01718264615', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(119, 4, NULL, 109, 0, 0, 'Saima Akter', '201625011', '01732867120', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(120, 4, NULL, 110, 0, 0, 'Ridoy Rahaman', '201625012', '01794054516', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(121, 4, NULL, 111, 0, 0, 'Joy Ghosh', '201621013', '01711489453', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(122, 4, NULL, 112, 0, 0, 'Md.Tauhid Sarkar', '201625015', '01991580375', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(123, 4, NULL, 113, 0, 0, 'Shams Mulla', '201625016', '01768066939', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(124, 4, NULL, 114, 0, 0, 'Yesin Arafat', '201625017', '', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(125, 4, NULL, 115, 0, 0, 'Tazim', '201625018', '01716098057', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(126, 4, NULL, 116, 0, 0, 'Abdulahil Kafi', '201625019', '01746079490', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(127, 4, NULL, 117, 0, 0, 'Suddo', '201625020', '01718152009', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(128, 4, NULL, 118, 0, 0, 'Asik Miah', '201625021', '01738211440', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(129, 4, NULL, 119, 0, 0, 'Tanvir Hossain Khan', '201625022', '01726505632', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(130, 4, NULL, 120, 0, 0, 'Asif Mia', '201625025', '01721906406', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(131, 4, NULL, 121, 0, 0, 'Ashik', '201625026', '01721291528', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(132, 4, NULL, 122, 0, 0, 'Sajib Ahmed Midul', '201625027', '01969123620', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(133, 4, NULL, 123, 0, 0, 'Dauan Zihad', '201625031', '01915111396', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(134, 4, NULL, 124, 0, 0, 'Md.Waliullah', '201625032', '01917512397', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(135, 4, NULL, 125, 0, 0, 'Simanto Saha', '201625033', '01711518022', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(136, 4, NULL, 126, 0, 0, 'Abdur Rahim', '201625034', '01746007172', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(137, 4, NULL, 127, 0, 0, 'Abu Darda', '201625036', '01730187214', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(138, 4, NULL, 128, 0, 0, 'Sihab', '201625038', '01715071200', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(139, 4, NULL, 129, 0, 0, 'Sima Akter', '201625039', '01715071200', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(140, 4, NULL, 130, 0, 0, 'MIm', '201625037', '01714237743', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(141, 4, NULL, 131, 0, 0, 'Naimur Al Sabib', '201605001', '01760942870', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(142, 4, NULL, 132, 0, 0, 'Eash Akter', '0', '01722249416', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(143, 4, NULL, 133, 0, 0, 'Eash Akter', '201605006', '01722249416', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(144, 4, NULL, 134, 0, 0, 'Eash Akter', '0', '01722249416', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(145, 4, NULL, 135, 0, 0, 'Md Fahad', '201605003', '01727617452', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(146, 4, NULL, 136, 0, 0, 'Samir', '201605004', '01720609844', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(147, 4, NULL, 137, 0, 0, 'Fariya Naznin Sumona', '201605005', '01716098171/01712529327', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(148, 4, NULL, 138, 0, 0, 'Mithun Rahman', '201605006', '01813920764', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(149, 4, NULL, 139, 0, 0, 'Mir Imtiaz Ahammed Razin', '201605007', '01716831866', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(150, 4, NULL, 140, 0, 0, 'Musa Mia', '201605008', '01725126293', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(151, 4, NULL, 141, 0, 0, 'Tangina Akter Tanha', '201605009', '01789877570', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(152, 4, NULL, 142, 0, 0, 'Sinha', '201605010', '01733449996', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(153, 4, NULL, 143, 0, 0, 'Shekh Md.Huzaifa', '201605012', '01730187214', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(154, 4, NULL, 144, 0, 0, 'Md.Rafine Miah', '201605013', '01733644666', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(155, 4, NULL, 145, 0, 0, 'KH.Abir', '201605014', '01760256899', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(156, 4, NULL, 146, 0, 0, 'Arafat Molla', '201605015', '01713580754', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(157, 4, NULL, 147, 0, 0, 'Shimya Shultana Tisha', '201606017', '01715414015', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(158, 4, NULL, 148, 0, 0, 'Azmi Islam Anmoon', '201605016', '01739721057', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(159, 4, NULL, 149, 0, 0, 'Md.Naimul Islam', '201605018', '01765847191', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(160, 4, NULL, 150, 0, 0, 'Shihab Ahmed', '201605019', '01709536449', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(161, 4, NULL, 151, 0, 0, 'Neha Akter Katha', '201605020', '01731910597', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(162, 4, NULL, 152, 0, 0, 'Tamim Hasan', '201605021', '01795653604', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(163, 4, NULL, 153, 0, 0, 'Rakibul Islam Refat', '201606022', '01705600430', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(164, 4, NULL, 154, 0, 0, 'Khan Tahsanul Islam Limon', '201605023', '01720295382', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(165, 4, NULL, 155, 0, 0, 'Sumaia Akter', '201605024', '01726090748', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(166, 4, NULL, 156, 0, 0, 'Sadia Jannat', '201605025', '01919485185', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(167, 4, NULL, 157, 0, 0, 'Ahona Ahmed Arthi', '201605026', '01872346696', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(168, 4, NULL, 158, 0, 0, 'Mahammad Nafis Abedin', '201605006', '01709742954', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(169, 4, NULL, 159, 0, 0, 'Khadiza Akter', '201605028', '01732867120', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(170, 4, NULL, 160, 0, 0, 'Khandakar Dinil Hosen', '201601001', '01758252576', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(171, 4, NULL, 161, 0, 0, 'Shohag Islam Shaion', '201601002', '01731810238/01777094800', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(172, 4, NULL, 162, 0, 0, 'Reshob Ghosh', '201601003', '01726473339', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(173, 4, NULL, 163, 0, 0, 'Zubayar', '201601004', '01791355136', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(174, 4, NULL, 164, 0, 0, 'shohana', '201601005', '01728529312', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(175, 4, NULL, 165, 0, 0, 'Muntaha Mim Himu', '201601006', '01746601623', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(176, 4, NULL, 166, 0, 0, 'Sadia Afrin Towa', '201601007', '01734278832', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(177, 4, NULL, 167, 0, 0, 'KH.Riham', '201601008', '01731997142', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(178, 4, NULL, 168, 0, 0, 'Md.Mahim Ahmed', '201601009', '01779964813', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(179, 4, NULL, 169, 0, 0, 'Shafe', '201601010', '01776630177', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(180, 4, NULL, 170, 0, 0, 'Alif Hasan', '201601011', '01871981303', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(181, 4, NULL, 171, 0, 0, 'Siam Sikdar', '201601012', '01767124561', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(182, 4, NULL, 172, 0, 0, 'Sindia khan', '201601013', '01714239649', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(183, 4, NULL, 173, 0, 0, 'Jui Akter', '0', '01754040680', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(184, 4, NULL, 174, 0, 0, 'Fahad Islam Siam', '201601015', '01725286054', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(185, 4, NULL, 175, 0, 0, 'Md.Thwhidul', '201601016', '01716770959', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(186, 4, NULL, 176, 0, 0, 'Eimen Islam Ahad', '201601021', '01743371206', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(187, 4, NULL, 177, 0, 0, 'Moriam Akter', '0', '', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(188, 4, NULL, 178, 0, 0, 'Ummey Hafsa', '201601022', '01715071200', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(189, 4, NULL, 179, 0, 0, 'Md.Samiul Hasan Shimanto', '201601024', '01799769968', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(190, 4, NULL, 180, 0, 0, 'Lamia Akter', '201601025', '01733881517', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(191, 4, NULL, 181, 0, 0, 'Moriam Akter', '201601027', '01732867120', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(192, 4, NULL, 182, 0, 0, 'Sadia Akter', '201601028', '01775581178', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(193, 4, NULL, 183, 0, 0, 'Md.Nahian Rahman Nafiz', '201601029', '01754491264', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(194, 4, NULL, 184, 0, 0, 'Humira Akter Orpa', '201601030', '01705605937', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(195, 4, NULL, 185, 0, 0, 'Rifat', '201601031', '01741114917', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(196, 4, NULL, 186, 0, 0, 'Akhi Akter', '201601032', '01728824715', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(197, 4, NULL, 187, 0, 0, 'Mst.Lamia Akter', '201601033', '01672084871', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(198, 4, NULL, 188, 0, 0, 'Rimi', '201601034', '01743355744', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(199, 4, NULL, 189, 0, 0, 'Afif', '201601036', '01709123059', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(200, 4, NULL, 190, 0, 0, 'Sajal Ghosh', '201633001', '01733962455', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(201, 4, NULL, 191, 0, 0, 'Shoaib Molla', '201633002', '01768066939', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(202, 4, NULL, 192, 0, 0, 'Fatin Sohad Alvy', '201633003', '01711158265', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(203, 4, NULL, 193, 0, 0, 'Md.Shakil Ahmed', '201633004', '01753830672', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(204, 4, NULL, 194, 0, 0, 'Arafath Hossain Akash', '201633005', '01837442822', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(205, 4, NULL, 195, 0, 0, 'Mir Sabbirr', '201633006', '01882701585', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(206, 4, NULL, 196, 0, 0, 'Sifat Ahmed', '201633007', '017664469971', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(207, 4, NULL, 197, 0, 0, 'KH.Badan', '201633009', '01744475253', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(208, 4, NULL, 198, 0, 0, 'Md.Sharker Ahmed', '201633010', '01726365958', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(209, 4, NULL, 199, 0, 0, 'Pranto Bhadra', '201633011', '01911819766', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(210, 4, NULL, 200, 0, 0, 'Rajib Mia', '201633012', '01773594341', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(211, 4, NULL, 201, 0, 0, 'Md.Radowan Islam', '201633013', '01684288568/01710134104', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(212, 4, NULL, 202, 0, 0, 'Anamul Hok Bipul', '201633014', '01712871211', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(213, 4, NULL, 203, 0, 0, 'Sonjoy Roy', '201633015', '01715281699', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(214, 4, NULL, 204, 0, 0, 'Jothirmoy Dey Jeos', '201633016', '01777813740/01786488908', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(215, 4, NULL, 205, 0, 0, 'KH.Sushad', '201633018', '01733934687', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(216, 4, NULL, 206, 0, 0, 'Md.Rafi Ahmed', '201633020', '01774797568', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(217, 4, NULL, 207, 0, 0, 'Shohag', '201633021', '01720950583', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(218, 4, NULL, 208, 0, 0, 'Tania Akter', '0', '01728824715', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(219, 4, NULL, 209, 0, 0, 'Md.Shefat Mia', '201633025', '01747785693', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(220, 4, NULL, 210, 0, 0, 'Kawsar Shikder', '201633026', '01811658472', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(221, 4, NULL, 211, 0, 0, 'Alif', '201633028', '01792261763', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(222, 4, NULL, 212, 0, 0, 'Omar Faruk', '201633029', '01709135989', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(223, 4, NULL, 213, 0, 0, 'Md.Ratul Hasan Rayhan', '201633031', '01552447749', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(224, 4, NULL, 214, 0, 0, 'Maruf Miah', '201633032', '01798546092', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(225, 4, NULL, 215, 0, 0, 'Md.Adil Khan', '201633033', '01704687715', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(226, 4, NULL, 216, 0, 0, 'Rakash Ghosh', '201633035', '01726473339', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(227, 4, NULL, 217, 0, 0, 'Ajit Mondol', '201633036', '01749132275', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(228, 4, NULL, 218, 0, 0, 'Md.Din Islam', '201633037', '01926027884', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(229, 4, NULL, 219, 0, 0, 'Shafraj Miah', '201633039', '01854033485', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(230, 4, NULL, 220, 0, 0, 'Al-Amin', '201633040', '01724805920', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(231, 4, NULL, 221, 0, 0, 'Abir Hossain', '201633041', '01790376408', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(232, 4, NULL, 222, 0, 0, 'Pranto Roy', '201633046', '01727419785', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(233, 4, NULL, 223, 0, 0, 'Miraz Hossain Lihan', '201633047', '01845485429', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(234, 4, NULL, 224, 0, 0, 'Fazla Rabbi', '201633050', '01727743282', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(235, 4, NULL, 225, 0, 0, 'Sanur Islam Shesher', '201633052', '01846690309', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(236, 4, NULL, 226, 0, 0, 'Nura Alam', '201633053', '01780263094', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(237, 4, NULL, 227, 0, 0, 'Md.Mohasin Islam', '201633055', '01984738146', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(238, 4, NULL, 228, 0, 0, 'Sazzad Hossain', '201633057', '01720807264', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(239, 4, NULL, 229, 0, 0, 'Kamrul Hasan Shifat', '201633060', '01721503909', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(240, 4, NULL, 230, 0, 0, 'Md Mehedi Hasan Akhonda', '201633062', '01711732311', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(241, 4, NULL, 231, 0, 0, 'Julkar Nayeen Akhondo', '201633063', '01711732311', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(242, 4, NULL, 232, 0, 0, 'Julkar Nayeen Akhondo', '0', '01711732311', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(243, 4, NULL, 233, 0, 0, 'Rakib Bin Sabbir', '201633067', '01923675424/01921834207', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(244, 4, NULL, 234, 0, 0, 'Amir Hamza', '201633068', '01718082343', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(245, 4, NULL, 235, 0, 0, 'Nahid Mia', '201633070', '01705605564', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(246, 4, NULL, 236, 0, 0, 'Md.Murad Hasan', '201633071', '01736686160', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(247, 4, NULL, 237, 0, 0, 'Abid Hasan', '201633072', '01711443791', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(248, 4, NULL, 238, 0, 0, 'Md.Rabby Miah', '201633074', '0174806329', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(249, 4, NULL, 239, 0, 0, 'All Shahariar Dihan', '201633075', '01781303498', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(250, 4, NULL, 240, 0, 0, 'Md.Abdur Rahman Limon', '201633076', '01735918215', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(251, 4, NULL, 241, 0, 0, 'Md.Fahim, Faysal', '201633077', '01718220571', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(252, 4, NULL, 242, 0, 0, 'Md.Akib Khan', '201633078', '01709518213', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(253, 4, NULL, 243, 0, 0, 'Mahi Zamal', '201633082', '01962840023', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(254, 4, NULL, 244, 0, 0, 'Hisham Ahmed', '201633083', '01987048092', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(255, 4, NULL, 245, 0, 0, 'Anamul Huque', '201633084', '01718300566', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(256, 4, NULL, 246, 0, 0, 'Siyam Mahamud Rajon', '201633085', '01753942205', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(257, 4, NULL, 247, 0, 0, 'Ajoy Chandra Ghosh', '201633086', '01811665135', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(258, 4, NULL, 248, 0, 0, 'Md Fahim Shahriar', '201633088', '01711414313', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(259, 4, NULL, 249, 0, 0, 'Jawad Bin Kaiser', '201633089', '01744637122/01783348807', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(260, 4, NULL, 250, 0, 0, 'Md.Tanvir Islam Tuhin', '201633091', '01969723073', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(261, 4, NULL, 251, 0, 0, 'Md.Mosab Amin', '201633093', '01812122909', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(262, 4, NULL, 252, 0, 0, 'Mahmudul Hasan Mahin', '201633094', '01700632088', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(263, 4, NULL, 253, 0, 0, 'Abdullah Istaher', '201633095', '01813090087', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(264, 4, NULL, 254, 0, 0, 'Md.Khadamull Islam Emon', '0', '01760537984', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(265, 4, NULL, 255, 0, 0, 'Salvi Haider', '201633099', '019158769192/01770641555', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(266, 4, NULL, 256, 0, 0, 'Siam', '201633100', '01725294484', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(267, 4, NULL, 257, 0, 0, 'Md.Masrafi', '201633101', '01716144925', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(268, 4, NULL, 258, 0, 0, 'Md.Samiul Islam Shehab', '0', '01737732558', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(269, 4, NULL, 259, 0, 0, 'Imam Hossain Mehedi', '0', '01672494145', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(270, 4, NULL, 260, 0, 0, 'Ratna Dewan', '0', '01732629735', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(271, 4, NULL, 262, 0, 0, 'Lima', '0', '01714991090', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(272, 4, NULL, 263, 0, 0, 'Toyeba Akter Shornali', '0', '01748483975', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(273, 4, NULL, 264, 0, 0, 'Md.Ismail Khan', '201629001', '01772523955', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(274, 4, NULL, 265, 0, 0, 'Roman Mia', '201629068', '01706660150', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(275, 4, NULL, 266, 0, 0, 'Md.Abdul Rouf', '201629078', '01915053790', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(276, 4, NULL, 267, 0, 0, 'K.Abdur Rahman', '201629006', '01727032569', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(277, 4, NULL, 268, 0, 0, 'Md.Nayeem', '201629030', '01732514522', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(278, 4, NULL, 269, 0, 0, 'Joy Chandra Sour', '201629029', '01721858937', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(279, 4, NULL, 270, 0, 0, 'Ataher Ali Khan', '201629040', '01720938229', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(280, 4, NULL, 271, 0, 0, 'Md.Ujjal Hassan', '201629088', '01798066966', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(281, 4, NULL, 272, 0, 0, 'Maruf Hossain', '201629047', '01750202516', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(282, 4, NULL, 273, 0, 0, 'Piyal Hasan', '201629005', '01715038084', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(283, 4, NULL, 274, 0, 0, 'Majudule Islam Mredul', '201629010', '01726873713', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(284, 4, NULL, 275, 0, 0, 'Nirob Talukder', '201629061', '01731110600', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(285, 4, NULL, 276, 0, 0, 'Tajul Islam', '0', '01764677286', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(286, 4, NULL, 277, 0, 0, 'Kamrul  islam Shanto', '201629015', '01622987820', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(287, 4, NULL, 278, 0, 0, 'Sabbir Mia', '201629062', '01731042072', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(288, 4, NULL, 279, 0, 0, 'Prosenjit Bishas', '201629020', '01770573310', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(289, 4, NULL, 280, 0, 0, 'Shadin', '201629042', '01710175222', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(290, 4, NULL, 281, 0, 0, 'Tarek Rahman', '201629055', '01822702219', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(291, 4, NULL, 282, 0, 0, 'Md.Abu Taher', '201629056', '01822702219', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(292, 4, NULL, 283, 0, 0, 'Md.Fahim Mia', '201629070', '01713508489', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(293, 4, NULL, 284, 0, 0, 'Md.Tanvir Ahmed', '201629019', '01711669520', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(294, 4, NULL, 285, 0, 0, 'Nasim Miah', '201629007', '01790799625', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(295, 4, NULL, 286, 0, 0, 'Munna', '201629067', '01732828618', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(296, 4, NULL, 287, 0, 0, 'Apon Mia', '201629041', '01739047192', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(297, 4, NULL, 288, 0, 0, 'Ridoy', '201629022', '01764151383', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(298, 4, NULL, 289, 0, 0, 'Md.Yasir Arafat Ratul', '201629008', '01716774370', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(299, 4, NULL, 290, 0, 0, 'Omar', '201629082', '01737764330', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(300, 4, NULL, 291, 0, 0, 'Tahsin Ahmed', '201629051', '01740917907', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(301, 4, NULL, 292, 0, 0, 'Md.Abdulla All-Noman', '201629086', '01865140789', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(302, 4, NULL, 293, 0, 0, 'Maruf Mia', '201629060', '01671700562', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(303, 4, NULL, 294, 0, 0, 'Md.Rafid Khan', '201629049', '01716508205', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(304, 4, NULL, 295, 0, 0, 'Md.Shahadot Hosan', '201630050', '01713706596', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(305, 4, NULL, 296, 0, 0, 'Md.Shakir Ahmed', '201629080', '01712789516', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(306, 4, NULL, 297, 0, 0, 'Nazmul Miah', '201629048', '01746664872', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(307, 4, NULL, 298, 0, 0, 'Shahiddul Azam Khan Shafin', '201629089', '01711465198', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(308, 4, NULL, 299, 0, 0, 'Saud Khan', '201629065', '01913956910', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(309, 4, NULL, 300, 0, 0, 'Md.Naeem Mur Rahmaan', '201629035', '01840141913', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(310, 4, NULL, 301, 0, 0, 'Md.Akash', '201629084', '', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(311, 4, NULL, 302, 0, 0, 'Sabakur Rahman', '201629064', '01926588610', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(312, 4, NULL, 303, 0, 0, 'Amit  Chandra Das', '201629033', '01739866844', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(313, 4, NULL, 304, 0, 0, 'Shopon', '201629036', '01737420329', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(314, 4, NULL, 305, 0, 0, 'Niamul Hassan', '201629014', '0178987716', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(315, 4, NULL, 306, 0, 0, 'Md.Amit Hasan', '201629011', '01741564079', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(316, 4, NULL, 307, 0, 0, 'Nurul Islam Nahid', '0', '01792001274', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(317, 4, NULL, 308, 0, 0, 'Sazzad Hossin Zehad', '201629079', '01731210799/01736780577', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(318, 4, NULL, 309, 0, 0, 'Rupam Sutradhar', '201629097', '01738627523', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(319, 4, NULL, 310, 0, 0, 'Abubakkar Islam', '201629046', '01762420856', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(320, 4, NULL, 311, 0, 0, 'Md.Nadim Ahmed', '201629018', '01718195589', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(321, 4, NULL, 312, 0, 0, 'Osman Goni', '201629081', '01767950441', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(322, 4, NULL, 313, 0, 0, 'Ali.Rabbani Khan Riyan', '201629063', '01792262775', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(323, 4, NULL, 314, 0, 0, 'Md.Siam Islam', '201629038', '01771930454', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7);
INSERT INTO `user` (`USER_ID`, `ROLE_ID`, `COMPANY_ID`, `STUDENT_ID`, `TEACHER_ID`, `PARENT_ID`, `USER_NAME`, `USER_EMAIL`, `USER_PHONE`, `USER_TYPE`, `USER_PASSWORD`, `USER_PASSWORD_HISTORY`, `CREATED_BY`, `CREATED_DATE`, `UPDATED_BY`, `UPDATED_DATE`, `STATUS`) VALUES
(324, 4, NULL, 315, 0, 0, 'Fatema Akter Shraboni', '201629058', '01672622444', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(325, 4, NULL, 316, 0, 0, 'Sonda Roy', '201629057', '01799318892', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(326, 4, NULL, 317, 0, 0, 'Mukta Akter', '201629037', '01776631978', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(327, 4, NULL, 318, 0, 0, 'Sumaiya Akter Mim', '201629075', '01710691195', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(328, 4, NULL, 319, 0, 0, 'Israt Jahan Orni', '201629031', '01794054559/01712599357', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(329, 4, NULL, 320, 0, 0, 'Limia Tanha Jhuma', '201629025', '01731040550', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(330, 4, NULL, 321, 0, 0, 'Tangina Akter', '201629021', '01733644664', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(331, 4, NULL, 322, 0, 0, 'Bedena Akter', '201629074', '01784235444', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(332, 4, NULL, 323, 0, 0, 'kornia Mahzabin Ometa', '201629072', '01787824313/01719073864', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(333, 4, NULL, 324, 0, 0, 'Priontri Ghosh Rothi', '201629059', '01728428413', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(334, 4, NULL, 325, 0, 0, 'Urmi Akter', '201629053', '01732327208', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(335, 4, NULL, 326, 0, 0, 'Mohona Akter', '201629028', '01720083381', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(336, 4, NULL, 327, 0, 0, 'Ruma Akterr', '0', '01794055720', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(337, 4, NULL, 328, 0, 0, 'Johora Akter', '201629024', '01625453847', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(338, 4, NULL, 329, 0, 0, 'Saheda Akter', '201629039', '01954618359', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(339, 4, NULL, 330, 0, 0, 'Runa Akter', '201629026', '01799650882', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(340, 4, NULL, 331, 0, 0, 'Md.Sabbir Hasan', '201643087', '01985593795', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(341, 4, NULL, 332, 0, 0, 'B.M.Nafis Iqbal', '201643066', '01715070042', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(342, 4, NULL, 333, 0, 0, 'Rakib Talukder', '201643077', '01725926357', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(343, 4, NULL, 334, 0, 0, 'Mir Abdullah Hasib', '201643018', '01947650696', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(344, 4, NULL, 335, 0, 0, 'Abdul Al Ahad', '201643011', '01624191930', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(345, 4, NULL, 336, 0, 0, 'Ridwan Ahmed Shadin', '201643002', '01783292079', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(346, 4, NULL, 337, 0, 0, 'Md.Arifur Rahman', '201643110', '01719886936/01737991244', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(347, 4, NULL, 338, 0, 0, 'Tamzidul Haque Tayeb', '0', '01736704694', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(348, 4, NULL, 339, 0, 0, 'Rimel Dewan', '201643069', '01736704694', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(349, 4, NULL, 340, 0, 0, 'Antor A Mostafa', '201643026', '01912489289', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(350, 4, NULL, 341, 0, 0, 'Md.Shakhawat Hossen', '201643148', '01737244115', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(351, 4, NULL, 342, 0, 0, 'Abu Raiyan Sikder', '201643091', '01745793705', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(352, 4, NULL, 343, 0, 0, 'Md.Sahadat Hossen Shakil', '201643001', '01794867057', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(353, 4, NULL, 344, 0, 0, 'Md.Adnan Mahfuz', '201643014', '01712886028', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(354, 4, NULL, 345, 0, 0, 'Md.Maidul Islam', '201643142', '01717233319', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(355, 4, NULL, 346, 0, 0, 'Yekub Hosen Emon', '201643093', '01765846891', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(356, 4, NULL, 347, 0, 0, 'Md.Khairul Alam Sabuz', '201643041', '01716005844', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(357, 4, NULL, 348, 0, 0, 'Toab Sarker', '201643042', '01920898411', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(358, 4, NULL, 349, 0, 0, 'Md.Sabbir Hossen', '201643149', '01712280031/01736005927', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(359, 4, NULL, 350, 0, 0, 'Joy Mamun', '201643046', '01712891173', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(360, 4, NULL, 351, 0, 0, 'Md.Anisuzzaman Anis', '201643037', '01741600965', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(361, 4, NULL, 352, 0, 0, 'Md.Hafijur Rahman', '201643039', '01771918724', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(362, 4, NULL, 353, 0, 0, 'Israt jahan Sayba', '201633065', '01700547840', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(363, 4, NULL, 354, 0, 0, 'Masud Parves', '201643163', '01735046929', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(364, 4, NULL, 355, 0, 0, 'Tora Ghosh', '201633069', '01712706016', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(365, 4, NULL, 356, 0, 0, 'Md.Naeim', '201643054', '01990842798/01939634040', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(366, 4, NULL, 357, 0, 0, 'Tasrif Ahamed Piam', '201643034', '01761890577', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(367, 4, NULL, 358, 0, 0, 'Puja Gope', '201634081', '01758141451', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(368, 4, NULL, 359, 0, 0, 'Md.Abu Kayes', '201643103', '01726137787', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(369, 4, NULL, 360, 0, 0, 'Surma Akter', '201634054', '01789086788', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(370, 4, NULL, 361, 0, 0, 'S.M.Mahfuj Ahmed', '201643067', '01712264096', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(371, 4, NULL, 362, 0, 0, 'Mst Tinni Akter', '201634024', '01729300031', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(372, 4, NULL, 363, 0, 0, 'Tania Akter', '201633022', '01728824715', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(373, 4, NULL, 364, 0, 0, 'Sanjida Akter', '201633042', '01738211440', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(374, 4, NULL, 365, 0, 0, 'Suchona Akter', '201634045', '01727500195', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(375, 4, NULL, 366, 0, 0, 'Pranto Roy', '201633046', '01727419785', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(376, 4, NULL, 367, 0, 0, 'Md.Khalek Mahmud Shohag', '201643098', '01712434287', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(377, 4, NULL, 368, 0, 0, 'Sanjana Akter', '201629076', '01732101880', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(378, 4, NULL, 369, 0, 0, 'Ariful Islam Arafat', '201642152', '01713541862', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(379, 4, NULL, 370, 0, 0, 'Emon Hossen', '201642161', '01792291227', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(380, 4, NULL, 371, 0, 0, 'Mohammad Ali', '201642044', '01740978543', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(381, 4, NULL, 372, 0, 0, 'Md.Nobin Miah', '201643073', '01726062902', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(382, 4, NULL, 373, 0, 0, 'Md.Anower Hossain', '201642173', '01711067705', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(383, 4, NULL, 374, 0, 0, 'Md.Rabbe Miah', '201643082', '01924792987', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(384, 4, NULL, 375, 0, 0, 'Tanzir Ahmed', '201642021', '01733133183', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(385, 4, NULL, 376, 0, 0, 'Darun Nayem', '201643045', '01729928656', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(386, 4, NULL, 377, 0, 0, 'Md.Soron Miah', '201642150', '01794190467', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(387, 4, NULL, 378, 0, 0, 'Shihab Ahmmed', '201643028', '01709436633', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(388, 4, NULL, 379, 0, 0, 'Tauhidur Rahman Joy', '201642129', '01819889315', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(389, 4, NULL, 380, 0, 0, 'Abdullah Al Mamun Shuvo', '201643102', '01716855443', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(390, 4, NULL, 381, 0, 0, 'Pronamy Sutra Dhar', '201642117', '01751614014', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(391, 4, NULL, 382, 0, 0, 'Jhuma Akter', '201642115', '01775153485', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(392, 4, NULL, 383, 0, 0, 'Abu Rayhan', '201643125', '01793778220', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(393, 4, NULL, 384, 0, 0, 'Abdullah Bin Masud', '201642160', '01921753135', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(394, 4, NULL, 385, 0, 0, 'Tamzeed Khan Jeshan', '201642159', '01817629353', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(395, 4, NULL, 386, 0, 0, 'Shakil Mahmud', '201643096', '01760481725', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(396, 4, NULL, 387, 0, 0, 'Md. Adil Akon', '201642151', '01926393351', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(397, 4, NULL, 388, 0, 0, 'Md.Hasan', '201643031', '01715049799', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(398, 4, NULL, 389, 0, 0, 'Refat Miah', '201642172', '01731297901', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(399, 4, NULL, 390, 0, 0, 'Md.Bone Amin', '201643095', '01765651668', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(400, 4, NULL, 391, 0, 0, 'Mim Akter', '201642061', '01747743174', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(401, 4, NULL, 392, 0, 0, 'Md.Mahedi Hasan Anik', '201643072', '019920964893', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(402, 4, NULL, 393, 0, 0, 'Tuhin Miah', '201642153', '01732326547', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(403, 4, NULL, 394, 0, 0, 'Dania Akter', '201642078', '01765372999', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(404, 4, NULL, 395, 0, 0, 'Mou Rani', '201643081', '01720077045', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(405, 4, NULL, 396, 0, 0, 'Md.Murad Hossain', '201643033', '01735102328', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(406, 4, NULL, 397, 0, 0, 'Jubair Hossen', '201643101', '01876949676', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(407, 4, NULL, 398, 0, 0, 'Md.Shahriar Ibne Sulaiman', '201643094', '01711222499', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(408, 4, NULL, 399, 0, 0, 'Saidul Islam', '201643084', '017928821481', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(409, 4, NULL, 400, 0, 0, 'Md.Alomgir Hossain', '201643157', '01718783994', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(410, 4, NULL, 401, 0, 0, 'Ashraful Islam Forid', '201643075', '01731851827', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(411, 4, NULL, 402, 0, 0, 'Sadman Sakib', '201643168', '01617154921', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(412, 4, NULL, 403, 0, 0, 'Shadman Shahriar Prionto', '201643048', '01720507591', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(413, 4, NULL, 404, 0, 0, 'Sadman Sakib Moon', '201643133', '01844011780', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(414, 4, NULL, 405, 0, 0, 'Emon Miah', '201643145', '01700644171', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(415, 4, NULL, 406, 0, 0, 'Md.Maruf Hasan', '201643166', '01710487771', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(416, 4, NULL, 407, 0, 0, 'Abdullah Al Imran Riyad', '201643124', '01718147898', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(417, 4, NULL, 408, 0, 0, 'Swarna Akter', '201643113', '01779622178', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(418, 4, NULL, 409, 0, 0, 'Shila Akter', '201643057', '01726364770', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(419, 4, NULL, 410, 0, 0, 'Morsheda', '201643097', '01720133814', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(420, 4, NULL, 411, 0, 0, 'Kaji Nazmus Sakib', '201643156', '01553257209/01724344530', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(421, 4, NULL, 412, 0, 0, 'Tandra', '201643118', '01712423519', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(422, 4, NULL, 413, 0, 0, 'Sumaiya Islam', '201643056', '01780068394', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(423, 4, NULL, 414, 0, 0, 'Nusrat Zahan Lyzu', '201643060', '01708751155', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(424, 4, NULL, 415, 0, 0, 'Abdullah Kjem', '201643016', '01732015664', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(425, 4, NULL, 416, 0, 0, 'Sonia Akter', '201643070', '01799132798', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(426, 4, NULL, 417, 0, 0, 'Md.Bipul Ahmed Akash', '201643109', '01761502548', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(427, 4, NULL, 418, 0, 0, 'Mehedi Hasan', '201643055', '01795256449', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(428, 4, NULL, 419, 0, 0, 'Tamzidul Haque Tayeb', '201643132', '01712789516', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(429, 4, NULL, 420, 0, 0, 'Israk Hasan Chowdhury', '201643003', '01713513169', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(430, 4, NULL, 421, 0, 0, 'Kazi Ibrahim', '201643131', '01752191718', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(431, 4, NULL, 422, 0, 0, 'Md.Foysal Shikder', '0', '01629154359', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(432, 4, NULL, 423, 0, 0, 'Samiul Alim', '201643167', '01712184940', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(433, 4, NULL, 424, 0, 0, 'Md.Lalchan Badsha', '201643007', '01925740443', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(434, 4, NULL, 425, 0, 0, 'Mahfujur Rahman', '201643029', '01745856228', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(435, 4, NULL, 426, 0, 0, 'Md.Rifat Khan', '201643025', '01815240067', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(436, 4, NULL, 427, 0, 0, 'Md.Rasel Hossen', '201643006', '01948882014', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(437, 4, NULL, 428, 0, 0, 'Likhon Sarker', '201643079', '01720407085', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(438, 4, NULL, 429, 0, 0, 'Mahfuzur Rahman Siyam', '201643008', '01794659187', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(439, 4, NULL, 430, 0, 0, 'Ekra Mahmud', '201643020', '01819882605', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(440, 4, NULL, 431, 0, 0, 'Md.Asfak Mahbub Sajjad', '201643012', '01718613531', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(441, 4, NULL, 432, 0, 0, 'Mehedi Hasan', '201643019', '01714260782', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(442, 4, NULL, 433, 0, 0, 'Akash', '201643030', '01745473498', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(443, 4, NULL, 434, 0, 0, 'Nazmul Hasan', '201643023', '01705605553', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(444, 4, NULL, 435, 0, 0, 'Md.Salman Hasan', '201643076', '01782207819/0179161613610', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(445, 4, NULL, 436, 0, 0, 'Md.Rasel Hossen', '0', '01777593697', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(446, 4, NULL, 438, 0, 0, 'Md.Meraz', '201643027', '01716759523', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(447, 4, NULL, 439, 0, 0, 'Sourav Hosen', '201643092', '01708726012', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(448, 4, NULL, 440, 0, 0, 'Md.Kawsar Hossen', '201643004', '01789193320', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(449, 4, NULL, 441, 0, 0, 'Md.Mazharul Islam', '201643063', '01716258183', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(450, 4, NULL, 442, 0, 0, 'Khandokar Eanon Muntasir', '201643010', '01712312684', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(451, 4, NULL, 443, 0, 0, 'Md.Emon Miah', '201643062', '01729183151', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(452, 4, NULL, 444, 0, 0, 'Ahosan Habib', '201643059', '01713586659', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(453, 4, NULL, 445, 0, 0, 'Tanjin Hasan', '201643058', '01770389950', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(454, 4, NULL, 446, 0, 0, 'Md.Abu Hena Ratan', '201643138', '01550621066/01769262541', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(455, 4, NULL, 447, 0, 0, 'Tanvir Hasan Sohag', '201643013', '01722654545', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(456, 4, NULL, 448, 0, 0, 'Faisal Ahmed', '201643015', '01731810238', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(457, 4, NULL, 449, 0, 0, 'Md.Sazal Jamadar', '201643017', '01732974933', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(458, 4, NULL, 450, 0, 0, 'Md.Shakib Khan Joy', '201643111', '01706266885', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(459, 4, NULL, 451, 0, 0, 'A.K.M.Karibul Islam', '201643022', '01780566883', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(460, 4, NULL, 452, 0, 0, 'Md.Najiur Rahman Nahid', '201643009', '01818431983', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(461, 4, NULL, 453, 0, 0, 'Ela Akter', '201643086', '', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(462, 4, NULL, 454, 0, 0, 'Mir Raishul Islam', '201643032', '01716831866', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(463, 4, NULL, 455, 0, 0, 'Md.Ashraful', '0', '01798595558', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(464, 4, NULL, 456, 0, 0, 'Md.Ashraful', '201643140', '01798595558', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(465, 4, NULL, 457, 0, 0, 'Md.Nazmul Khan Shihab', '201643112', '01715394514', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(466, 4, NULL, 458, 0, 0, 'Md Jahid Hasan', '201643139', '01749949952', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(467, 4, NULL, 459, 0, 0, 'Md.,Apurbo Miah', '201643068', '01718580425', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(468, 4, NULL, 460, 0, 0, 'Ahsanul Islam Sakib', '201643036', '', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(469, 4, NULL, 461, 0, 0, 'Sagor Sarker', '201643049', '01747446283', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(470, 4, NULL, 462, 0, 0, 'Shishir Jaman', '201643100', '01713527524,01709065502', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(471, 4, NULL, 463, 0, 0, 'Md.Nazmul Huda', '201643143', '01915863519', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(472, 4, NULL, 464, 0, 0, 'Abir Hoshen', '201617028', '01761949647', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(473, 4, NULL, 465, 0, 0, 'Toyeba Akter Shornali', '201617006', '01748483975', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(474, 4, NULL, 466, 0, 0, 'Arob Akter', '201617007', '01733473978', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(475, 4, NULL, 467, 0, 0, 'Easha Akter Mim', '201617008', '01714789523', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(476, 4, NULL, 468, 0, 0, 'Mahima Akter', '0', '0172465304', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(477, 4, NULL, 469, 0, 0, 'Mahima Akter', '0', '0172465304', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(478, 4, NULL, 470, 0, 0, 'Mahima Akter Mahi', '201617010', '01833592207', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(479, 4, NULL, 471, 0, 0, 'Md.Alhaz Rahman Fahim', '201617011', '01732359833', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(480, 4, NULL, 472, 0, 0, 'Thanha', '201617012', '01726123305', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(481, 4, NULL, 473, 0, 0, 'Taslima', '201617013', '01777362165', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(482, 4, NULL, 474, 0, 0, 'Mahin Akter', '201617014', '01720112865', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(483, 4, NULL, 475, 0, 0, 'Sayem Ahmed', '201617016', '0176389805', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(484, 4, NULL, 476, 0, 0, 'Mr.Al Amin', '201617017', '01718845377', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(485, 4, NULL, 477, 0, 0, 'Liza Akter', '201617018', '01726566521', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(486, 4, NULL, 478, 0, 0, 'Md.Siam Ahmed', '201617019', '01758920095', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(487, 4, NULL, 479, 0, 0, 'Imran Hasan Emon', '201617020', '01754421823', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(488, 4, NULL, 480, 0, 0, 'Samia Akter', '201617021', '01789086806', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(489, 4, NULL, 481, 0, 0, 'Md.Shimon Mia', '201617023', '01930635518', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(490, 4, NULL, 482, 0, 0, 'Tafrina Hasan Tithi', '201617024', '01794678161', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(491, 4, NULL, 483, 0, 0, 'Md.Saimul Islam Shihab', '0', '01737732558', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(492, 4, NULL, 484, 0, 0, 'Md.Saimul Islam Shihab', '0', '01737732558', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(493, 4, NULL, 485, 0, 0, 'Md.Saimul Islam Shihab', '201617001', '01737732558', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(494, 4, NULL, 486, 0, 0, 'Rihan Sikder Zihad', '201617029', '01757018709', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(495, 4, NULL, 487, 0, 0, 'Tangila Akter Tanni', '201617030', '01727408623', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(496, 4, NULL, 488, 0, 0, 'Sumaiya Akter', '201617031', '01793525662', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(497, 4, NULL, 489, 0, 0, 'Samiwol Islam', '201617025', '01726245095', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(498, 4, NULL, 490, 0, 0, 'Abu Talha', '201617027', '01772294173', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(499, 4, NULL, 491, 0, 0, 'Touha Islam Supti', '201617022', '01741146449', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(500, 4, NULL, 492, 0, 0, 'Adorsho', '201617004', '01712423519', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(501, 4, NULL, 493, 0, 0, 'Ratna Dewan', '0', '01732629735', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(502, 4, NULL, 494, 0, 0, 'Emam Hosain Mehedi', '201617002', '01672494145', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(503, 4, NULL, 495, 0, 0, 'Lina', '201617005', '01714991090', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(504, 4, NULL, 496, 0, 0, 'Nilima Sutra Dher', '201637145', '01715045223', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(505, 4, NULL, 497, 0, 0, 'Sumaya Akter', '201637117', '01715509771', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(506, 4, NULL, 498, 0, 0, 'Juha Mune', '201637090', '01731809712', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(507, 4, NULL, 499, 0, 0, 'Sadia Afrin zadni', '201637077', '01772465438', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(508, 4, NULL, 500, 0, 0, 'Mahfuja Akter', '201637076', '01785524693', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(509, 4, NULL, 501, 0, 0, 'Aysha Akter Moly', '201637067', '', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(510, 4, NULL, 502, 0, 0, 'Sorna Akter', '201613014', '01767105755', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(511, 4, NULL, 503, 0, 0, 'Afroza Akter Mily', '201622028', '01716916808', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(512, 4, NULL, 504, 0, 0, 'Samiha Tabassum', '201622044', '01740647976', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(513, 4, NULL, 505, 0, 0, 'Asha Mone', '201622004', '', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(514, 4, NULL, 506, 0, 0, 'Ratna', '201622026', '01726952439', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(515, 4, NULL, 507, 0, 0, 'Srabone', '201622037', '01772369833', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(516, 4, NULL, 508, 0, 0, 'Md.Samiur Rahman', '201643024', '01712120678', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(517, 4, NULL, 509, 0, 0, 'Md.Tauhid', '201643134', '01750513448', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(518, 4, NULL, 510, 0, 0, 'Samir', '201603026', '01726950898', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(519, 4, NULL, 511, 0, 0, 'Moriam', '201603021', '01727895757', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(520, 4, NULL, 512, 0, 0, 'Jui', '201603014', '01754040680', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(521, 4, NULL, 513, 0, 0, 'Md. Nafiz Miah', '201611007', '01754040680', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(522, 4, NULL, 514, 0, 0, 'Sheikh Haris', '201611009', '01794191553', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(523, 4, NULL, 515, 0, 0, 'Rotna Dewan', '201619003', '01732629735', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(524, 4, NULL, 516, 0, 0, 'Mashrin Akter', '201619009', '017246753704', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(525, 4, NULL, 517, 0, 0, 'Amin Mia', '201619015', '01732636229', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(526, 4, NULL, 518, 0, 0, 'Shihab Ahmed', '201607019', '017246753704', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(527, 4, NULL, 519, 0, 0, 'Kh. Tahsanul Islam Limon', '201607023', '017246753704', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(528, 4, NULL, 520, 0, 0, 'Samiul Islam Rafi', '201607011', '01746945475', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(529, 4, NULL, 521, 0, 0, 'Neha Akter', '201607020', '01731910597', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(530, 4, NULL, 522, 0, 0, 'Tamim Hasan', '201607021', '01770857659', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(531, 4, NULL, 523, 0, 0, 'Anamika Dewan', '201631009', '01726123305', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(532, 4, NULL, 524, 0, 0, 'Ruma Akter', '201631083', '01794055720', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(533, 4, NULL, 525, 0, 0, 'Md. Rihat Hasan', '201631087', '01780528776', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(534, 4, NULL, 526, 0, 0, 'Tajul Islam', '201631004', '01764677268', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(535, 4, NULL, 527, 0, 0, 'Md. Nurul Islam Nahid', '201631003', '01792001274', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(536, 4, NULL, 528, 0, 0, 'Rahad Mia', '201631032', '01827120330', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(537, 4, NULL, 529, 0, 0, 'Iftiham Vuya', '201631045', '01720078224', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(538, 4, NULL, 530, 0, 0, 'Rimad', '201631002', '01754264710', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(539, 4, NULL, 531, 0, 0, 'Riad Hosan Mohit', '201631013', '01776629940', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(540, 4, NULL, 532, 0, 0, 'Md. Mahedi Hasan', '201631016', '01718081505', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(541, 4, NULL, 533, 0, 0, 'Abdullah All Shafi Suyan', '201631027', '01716218489', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(542, 4, NULL, 534, 0, 0, 'Khadamull Islam Emon', '201635097', '01760537984', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(543, 4, NULL, 535, 0, 0, 'Md. Shawon', '201635073', '01624154203', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(544, 4, NULL, 536, 0, 0, 'Md.Sohag Mia', '201635017', '01727926914', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(545, 4, NULL, 537, 0, 0, 'Md.Zayed Bin Anower', '201635049', '01761431033', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(546, 4, NULL, 538, 0, 0, 'Md.Romzan', '201635051', '01628296047', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(547, 4, NULL, 539, 0, 0, 'Md. Towhid', '201635034', '01728373937', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(548, 4, NULL, 540, 0, 0, 'Sifat Ahmed', '201635007', '01766469971', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(549, 4, NULL, 541, 0, 0, 'Md. Abdullah', '201635008', '01741357938', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(550, 4, NULL, 542, 0, 0, 'Md.Rasel Hossen', '201643005', '01777593697', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(551, 4, NULL, 543, 0, 0, 'Md.Saifulla Khan', '201643137', '01703902250', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(552, 4, NULL, 544, 0, 0, 'Zui', '201643116', '01710691195', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(553, 4, NULL, 545, 0, 0, 'Daina Akter', '201643078', '01765372999', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(554, 4, NULL, 546, 0, 0, 'Md.Naimul Islam Naim', '201643170', '01726665468', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(555, 4, NULL, 547, 0, 0, 'Al-Fesani Ahsan Alif', '201643174', '01628726353', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(556, 4, NULL, 548, 0, 0, 'Md.Foysal Shikder', '201643130', '01629154359', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(557, 4, NULL, 549, 0, 0, 'Istiak Ahmed Emon', '201643155', '01713538167', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(558, 4, NULL, 550, 0, 0, 'Md.hafizur Rahman', '201643135', '01713643118', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(559, 4, NULL, 551, 0, 0, 'Jakiol hasan Omi', '201643071', '01712857766', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(560, 4, NULL, 552, 0, 0, 'Al-Amin Foqir', '201642053', '01715637838', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, NULL, NULL, NULL, NULL, 7),
(561, 4, NULL, 554, 0, 0, 'Riyad Mahrez', '201617033', '', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, 1, '2016-12-25 02:32:02', NULL, NULL, 7),
(562, 4, NULL, 562, 0, 0, 'sajib ahmed', '201744002', '01717686227', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, 1, '2017-01-17 01:00:52', NULL, NULL, 7),
(563, 4, NULL, 563, 0, 0, 'sajor miah', '201744003', '', '', 'Es0dec04dVcoB-tLpmVjfzo1lr81Z4stx5_xpb1TQXY', NULL, 1, '2017-01-17 01:01:45', NULL, NULL, 7);

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE `user_data` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(50) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `SUBJECT` varchar(150) NOT NULL,
  `MESSAGE` text NOT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `CREATED_DATE` date NOT NULL,
  `UPDATED_BY` int(11) NOT NULL,
  `UPDATED_DATE` date NOT NULL,
  `STATUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`ID`, `NAME`, `EMAIL`, `SUBJECT`, `MESSAGE`, `CREATED_BY`, `CREATED_DATE`, `UPDATED_BY`, `UPDATED_DATE`, `STATUS`) VALUES
(1, 'Ami', 'ami@gmail.com', 'Test', 'Hello', 0, '2016-07-14', 0, '0000-00-00', 7),
(2, 'Abul Kasem', 'abulkasem@gmail.com', 'Exam', 'Hello', 0, '2016-07-14', 0, '0000-00-00', 7),
(3, 'Rayhan', 'rayhan@gmail.com', 'test', 'Hi, Dear', 0, '2016-08-16', 0, '0000-00-00', 7),
(4, 'adsf', 'adfs@gamil.com', 'asdf', 'sdafadsf asdfasdf', 0, '2016-09-01', 0, '0000-00-00', 7),
(5, 'Rayhan', 'rayhan@gmail.com', 'asdf', 'asdf', 0, '2016-09-01', 0, '0000-00-00', 7),
(6, 'Abdul Khalek', 'md.robinkhan@ymail.com', 'asdf', 'asdfasdf', 0, '2016-09-01', 0, '0000-00-00', 7);

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `VIDEO_ID` int(11) NOT NULL,
  `CAT_ID` int(11) NOT NULL,
  `SUB_CAT_ID` int(11) NOT NULL,
  `CAPTION` varchar(200) NOT NULL,
  `EMBED_CODE` text NOT NULL,
  `DETAILS` text NOT NULL,
  `CREATED_BY` int(11) NOT NULL,
  `CREATED_DATE` date NOT NULL,
  `UPDATED_BY` int(11) NOT NULL,
  `UPDATED_DATE` date NOT NULL,
  `STATUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`VIDEO_ID`, `CAT_ID`, `SUB_CAT_ID`, `CAPTION`, `EMBED_CODE`, `DETAILS`, `CREATED_BY`, `CREATED_DATE`, `UPDATED_BY`, `UPDATED_DATE`, `STATUS`) VALUES
(1, 10, 6, 'BCS Tax Video', 'https://www.youtube.com/embed/QU_vQb7jxKA', '', 1, '2016-05-20', 1, '2016-09-03', 7),
(2, 10, 6, 'asdf', 'https://www.youtube.com/embed/lbZiatgQ9uU', '', 1, '2016-09-03', 1, '2016-09-03', 7),
(3, 10, 7, 'asdf', 'https://www.youtube.com/embed/GAG2AW9JGyM', '', 1, '2016-09-03', 0, '0000-00-00', 7),
(4, 10, 7, 'asdf', 'https://www.youtube.com/embed/S2XmG_pgjCY', '', 1, '2016-09-03', 0, '0000-00-00', 7),
(5, 10, 8, 'asdf', 'https://www.youtube.com/embed/5x5Te-ctEzA', '', 1, '2016-09-03', 0, '0000-00-00', 7),
(6, 10, 8, 'asdf', 'https://www.youtube.com/embed/gXxuHzSUu-Q', '', 1, '2016-09-03', 0, '0000-00-00', 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `achievement`
--
ALTER TABLE `achievement`
  ADD PRIMARY KEY (`ACHIEVEMENT_ID`);

--
-- Indexes for table `additional_data`
--
ALTER TABLE `additional_data`
  ADD PRIMARY KEY (`ADD_ID`);

--
-- Indexes for table `admit_student_to_hostel`
--
ALTER TABLE `admit_student_to_hostel`
  ADD PRIMARY KEY (`ADMIT_STUDENT_TO_HOSTEL_ID`);

--
-- Indexes for table `assign_hostel_teacher`
--
ALTER TABLE `assign_hostel_teacher`
  ADD PRIMARY KEY (`ASSIGN_HOSTEL_TEACHER_ID`);

--
-- Indexes for table `assign_student_subject`
--
ALTER TABLE `assign_student_subject`
  ADD PRIMARY KEY (`A_STU_SUB`);

--
-- Indexes for table `assign_subject`
--
ALTER TABLE `assign_subject`
  ADD PRIMARY KEY (`ASSIGN_SUBJECT_ID`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`ATT_ID`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`BOOK_ID`);

--
-- Indexes for table `book_category`
--
ALTER TABLE `book_category`
  ADD PRIMARY KEY (`BOOK_CATEGORY_ID`);

--
-- Indexes for table `book_issue`
--
ALTER TABLE `book_issue`
  ADD PRIMARY KEY (`BOOK_ISSUE_ID`);

--
-- Indexes for table `book_request`
--
ALTER TABLE `book_request`
  ADD PRIMARY KEY (`REQUEST_ID`);

--
-- Indexes for table `book_writer`
--
ALTER TABLE `book_writer`
  ADD PRIMARY KEY (`WRITER_ID`);

--
-- Indexes for table `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`EVENT_ID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CATEGORY_ID`);

--
-- Indexes for table `category_list`
--
ALTER TABLE `category_list`
  ADD PRIMARY KEY (`LIST_ID`);

--
-- Indexes for table `checkin`
--
ALTER TABLE `checkin`
  ADD PRIMARY KEY (`CHECKIN_ID`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`CLASS_ID`);

--
-- Indexes for table `class_routine`
--
ALTER TABLE `class_routine`
  ADD PRIMARY KEY (`ROUTINE_ID`);

--
-- Indexes for table `class_teacher`
--
ALTER TABLE `class_teacher`
  ADD PRIMARY KEY (`TEACEHR_INFO_ID`);

--
-- Indexes for table `cultural_activities`
--
ALTER TABLE `cultural_activities`
  ADD PRIMARY KEY (`CULTURAL_ACTIVITIES_ID`);

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`DESIGNATION_ID`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`EXAM_ID`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`FILE_ID`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`IMAGE_ID`);

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`GRADE_ID`);

--
-- Indexes for table `house`
--
ALTER TABLE `house`
  ADD PRIMARY KEY (`HOUSE_ID`);

--
-- Indexes for table `ie_payment`
--
ALTER TABLE `ie_payment`
  ADD PRIMARY KEY (`IE_CAT_ID`);

--
-- Indexes for table `ie_transaction`
--
ALTER TABLE `ie_transaction`
  ADD PRIMARY KEY (`IE_TRANSACTION_ID`);

--
-- Indexes for table `leave_data`
--
ALTER TABLE `leave_data`
  ADD PRIMARY KEY (`LEAVE_ID`);

--
-- Indexes for table `leave_settings`
--
ALTER TABLE `leave_settings`
  ADD PRIMARY KEY (`LEAVE_SETTINGS_ID`);

--
-- Indexes for table `library_member`
--
ALTER TABLE `library_member`
  ADD PRIMARY KEY (`LIBRARY_MEMBER_ID`);

--
-- Indexes for table `library_settings`
--
ALTER TABLE `library_settings`
  ADD PRIMARY KEY (`LIBRARY_SETTING_ID`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`MARK_ID`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`MEMBER_ID`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `monthly_salary`
--
ALTER TABLE `monthly_salary`
  ADD PRIMARY KEY (`MONTHLY_SALARY_ID`);

--
-- Indexes for table `noticeboard`
--
ALTER TABLE `noticeboard`
  ADD PRIMARY KEY (`NOTICE_ID`);

--
-- Indexes for table `online_application`
--
ALTER TABLE `online_application`
  ADD PRIMARY KEY (`STUDENT_ID`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`PAGE_ID`);

--
-- Indexes for table `parent`
--
ALTER TABLE `parent`
  ADD PRIMARY KEY (`PARENT_ID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`PAYMENT_ID`);

--
-- Indexes for table `payment_category`
--
ALTER TABLE `payment_category`
  ADD PRIMARY KEY (`PAYMENT_CAT_ID`);

--
-- Indexes for table `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`PERMISSION_ID`);

--
-- Indexes for table `persons`
--
ALTER TABLE `persons`
  ADD PRIMARY KEY (`PERSON_ID`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`ROLE_ID`);

--
-- Indexes for table `salary_settings`
--
ALTER TABLE `salary_settings`
  ADD PRIMARY KEY (`SALARY_ID`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`SECTION_ID`);

--
-- Indexes for table `send_notification`
--
ALTER TABLE `send_notification`
  ADD PRIMARY KEY (`NOTIFICATION_ID`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`SLIDER_ID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`STAFF_ID`);

--
-- Indexes for table `student_data`
--
ALTER TABLE `student_data`
  ADD PRIMARY KEY (`STUDENT_DATA_ID`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`STUDENT_ID`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`SUBJECT_ID`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`SUB_CATEGORY_ID`);

--
-- Indexes for table `sub_sub_category`
--
ALTER TABLE `sub_sub_category`
  ADD PRIMARY KEY (`SUB_SUB_CATEGORY_ID`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`TEACHER_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`USER_ID`);

--
-- Indexes for table `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`VIDEO_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `achievement`
--
ALTER TABLE `achievement`
  MODIFY `ACHIEVEMENT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `additional_data`
--
ALTER TABLE `additional_data`
  MODIFY `ADD_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `admit_student_to_hostel`
--
ALTER TABLE `admit_student_to_hostel`
  MODIFY `ADMIT_STUDENT_TO_HOSTEL_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `assign_hostel_teacher`
--
ALTER TABLE `assign_hostel_teacher`
  MODIFY `ASSIGN_HOSTEL_TEACHER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `assign_student_subject`
--
ALTER TABLE `assign_student_subject`
  MODIFY `A_STU_SUB` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `assign_subject`
--
ALTER TABLE `assign_subject`
  MODIFY `ASSIGN_SUBJECT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `ATT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `BOOK_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `book_category`
--
ALTER TABLE `book_category`
  MODIFY `BOOK_CATEGORY_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `book_issue`
--
ALTER TABLE `book_issue`
  MODIFY `BOOK_ISSUE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `book_request`
--
ALTER TABLE `book_request`
  MODIFY `REQUEST_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `book_writer`
--
ALTER TABLE `book_writer`
  MODIFY `WRITER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `calendar`
--
ALTER TABLE `calendar`
  MODIFY `EVENT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `CATEGORY_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `category_list`
--
ALTER TABLE `category_list`
  MODIFY `LIST_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `checkin`
--
ALTER TABLE `checkin`
  MODIFY `CHECKIN_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `CLASS_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `class_routine`
--
ALTER TABLE `class_routine`
  MODIFY `ROUTINE_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `class_teacher`
--
ALTER TABLE `class_teacher`
  MODIFY `TEACEHR_INFO_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cultural_activities`
--
ALTER TABLE `cultural_activities`
  MODIFY `CULTURAL_ACTIVITIES_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `DESIGNATION_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `EXAM_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `FILE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `IMAGE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `grade`
--
ALTER TABLE `grade`
  MODIFY `GRADE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `house`
--
ALTER TABLE `house`
  MODIFY `HOUSE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `ie_payment`
--
ALTER TABLE `ie_payment`
  MODIFY `IE_CAT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `ie_transaction`
--
ALTER TABLE `ie_transaction`
  MODIFY `IE_TRANSACTION_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `leave_data`
--
ALTER TABLE `leave_data`
  MODIFY `LEAVE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `leave_settings`
--
ALTER TABLE `leave_settings`
  MODIFY `LEAVE_SETTINGS_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `library_member`
--
ALTER TABLE `library_member`
  MODIFY `LIBRARY_MEMBER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `library_settings`
--
ALTER TABLE `library_settings`
  MODIFY `LIBRARY_SETTING_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `MARK_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=687;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `MEMBER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `monthly_salary`
--
ALTER TABLE `monthly_salary`
  MODIFY `MONTHLY_SALARY_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `noticeboard`
--
ALTER TABLE `noticeboard`
  MODIFY `NOTICE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `online_application`
--
ALTER TABLE `online_application`
  MODIFY `STUDENT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `PAGE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `parent`
--
ALTER TABLE `parent`
  MODIFY `PARENT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `PAYMENT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `payment_category`
--
ALTER TABLE `payment_category`
  MODIFY `PAYMENT_CAT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `permission`
--
ALTER TABLE `permission`
  MODIFY `PERMISSION_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;
--
-- AUTO_INCREMENT for table `persons`
--
ALTER TABLE `persons`
  MODIFY `PERSON_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `ROLE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `salary_settings`
--
ALTER TABLE `salary_settings`
  MODIFY `SALARY_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `SECTION_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `send_notification`
--
ALTER TABLE `send_notification`
  MODIFY `NOTIFICATION_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `SLIDER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `STAFF_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `student_data`
--
ALTER TABLE `student_data`
  MODIFY `STUDENT_DATA_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=542;
--
-- AUTO_INCREMENT for table `student_info`
--
ALTER TABLE `student_info`
  MODIFY `STUDENT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=564;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `SUBJECT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;
--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `SUB_CATEGORY_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `sub_sub_category`
--
ALTER TABLE `sub_sub_category`
  MODIFY `SUB_SUB_CATEGORY_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `TEACHER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `USER_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=564;
--
-- AUTO_INCREMENT for table `user_data`
--
ALTER TABLE `user_data`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `VIDEO_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
