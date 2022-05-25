-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2022 at 06:29 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin-database`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_year`
--

CREATE TABLE `academic_year` (
  `id` int(11) NOT NULL,
  `start_date` varchar(50) NOT NULL,
  `end_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `academic_year`
--

INSERT INTO `academic_year` (`id`, `start_date`, `end_date`) VALUES
(4, '2021-10-6', '2021-12-30'),
(5, '2021-10-6', '2022-01-06'),
(7, '2021-10-6', '2022-02-28'),
(8, '2021-10-23', '2022-04-28'),
(9, '2021-11-12', '2022-11-12'),
(10, '2021-11-12', '2022-04-30'),
(11, '2021-11-12', '2021-11-13'),
(12, '2021-11-12', '2021-11-14'),
(13, '2021-11-12', '2021-11-16'),
(14, '2021-11-12', '2021-11-20'),
(15, '2021-11-12', '2021-11-23'),
(16, '2021-11-13', '2021-12-13'),
(17, '2021-11-13', '2022-01-13'),
(18, '2021-11-13', '2022-02-13'),
(19, '2021-11-13', '2022-02-13'),
(20, '2021-11-13', '2022-06-13');

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `announcement` varchar(255) NOT NULL,
  `post_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `admin_name`, `announcement`, `post_date`) VALUES
(6, 'admin01@admin-aja.edu.com', 'Good day everyone! There will be an Cognizant Event this coming Wednesday, 27, 2021, 10:00 AM at the School Auditorium', 'October 22, 2021'),
(7, 'admin01@admin-aja.edu.com', 'There will be a meeting this coming Monday, October 11, 2021 3:00 PM', 'October 23, 2021'),
(9, 'admin01@admin-aja.edu.com', 'Hello World', 'November 13, 2021'),
(10, 'admin01@admin-aja.edu.com', 'Hello world ulet', 'November 13, 2021');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `program_name` varchar(100) NOT NULL,
  `program_code` varchar(20) NOT NULL,
  `pdescription` varchar(200) NOT NULL,
  `date_created` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `program_name`, `program_code`, `pdescription`, `date_created`) VALUES
(1, 'Bachelor of Science in Computer Science', 'BSCS', 'the study of concepts and theories, algorithmic foundations, implementation and application of information and computing solution', 'September 26, 2021 | 10:46 AM'),
(2, 'Bachelor of Science in Information System', 'BSIS', 'the study of design and implementation solutions that integrate information technology with business', 'September 26, 2021 | 10:48 AM'),
(3, 'Bachelor of Science in Information Technology', 'BSIT', ' the study of computer utilization and computer software to plan, install, customize, operate, manage, administer and maintain information technology infrastructure', 'September 26, 2021 | 10:50 AM'),
(4, 'Bachelor of Science in Computer Engineering', 'BSCE', 'is a program that embodies the science and technology of design, development, implementation, maintenance and integration of software and hardware components in modern computing systems and computer-c', 'September 26, 2021 | 10:51 AM'),
(5, 'Bachelor of Arts in Multimedia Arts', 'AB-MMA', 'the innovation and technology associated with the study of new media', 'September 26, 2021 | 10:53 AM'),
(9, 'Bachelor of Science in Education', 'BSE', 'teaching', 'November 13, 2021 | 10:43 AM'),
(10, 'Bachelor of Science in Accountancy', 'BSA', 'Computation', 'November 13, 2021 | 1:57 PM'),
(11, 'Bachelor of Science in Psychology', 'BSP', 'asdadasdasd', 'November 13, 2021 | 3:40 PM');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `course_name` varchar(50) NOT NULL,
  `course_code` varchar(20) NOT NULL,
  `units` int(10) NOT NULL,
  `entlev` varchar(20) NOT NULL,
  `program` varchar(50) NOT NULL,
  `reg_date` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_name`, `course_code`, `units`, `entlev`, `program`, `reg_date`, `status`) VALUES
(7, 'Advance Communciations', 'CCADVCOM', 3, '3rd Year', 'Bachelor of Science in Computer Science', 'September 26, 2021 | 11:03 AM', 'enable'),
(8, 'Thesis 2', 'CCTHES2L', 3, '4th Year', 'Bachelor of Science in Computer Science', 'September 26, 2021 | 11:04 AM', 'enable'),
(9, 'Quantitative Methods', 'CCQUAMET', 3, '2nd Year', 'Bachelor of Science in Computer Science', 'September 26, 2021 | 11:04 AM', 'enable'),
(11, 'Software Engineering', 'CCSFEN2L', 3, '3rd Year', 'Bachelor of Science in Computer Science', 'September 26, 2021 | 11:06 AM', 'enable'),
(12, 'Fundamentals of Programming', 'CCPRGG1X', 3, '1st Year', 'Bachelor of Science in Information System', 'September 26, 2021 | 11:06 AM', 'enable'),
(20, 'Operating Systems', 'CCOPSYSL', 3, '2nd Year', 'Bachelor of Science in Computer Science', 'October 11, 2021 | 3:42 PM', 'enable'),
(21, 'E Games', 'CCEGAMES', 3, '1st Year', 'Bachelor of Science in Computer Science', 'November 12, 2021 | 3:14 PM', ''),
(22, 'Ethics', 'CCETHICS', 3, '1st Year', 'Bachelor of Science in Accountancy', 'November 12, 2021 | 3:48 PM', ''),
(30, 'Human Computer Interaction', 'CCHCI', 3, '1st Year', 'Bachelor of Science in Computer Science', 'November 13, 2021 | 10:26 AM', ''),
(31, 'Teaching', 'CCTEACH', 3, '3rd Year', 'Bachelor of Science in Education', 'November 13, 2021 | 10:46 AM', ''),
(32, 'Technical Writing', 'CCTECH', 3, '1st Year', 'Bachelor of Science in Computer Science', 'November 13, 2021 | 1:42 PM', ''),
(33, 'Accounting', 'CCACOUNTING', 3, '1st Year', 'Bachelor of Science in Accountancy', 'November 13, 2021 | 1:59 PM', ''),
(34, 'Automata', 'CCAUTO', 3, '1st Year', 'Bachelor of Science in Computer Science', 'November 13, 2021 | 3:27 PM', ''),
(35, 'Into to Psychology', 'CCIP', 3, '1st Year', 'Bachelor of Science in Psychology', 'November 13, 2021 | 3:42 PM', '');

-- --------------------------------------------------------

--
-- Table structure for table `course_enrolled`
--

CREATE TABLE `course_enrolled` (
  `id` int(11) NOT NULL,
  `idnum` varchar(50) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `year_term` varchar(50) NOT NULL,
  `program_class` varchar(100) NOT NULL,
  `course` varchar(100) NOT NULL,
  `Interim1` varchar(11) NOT NULL,
  `Midterm` varchar(11) NOT NULL,
  `Interim2` varchar(11) NOT NULL,
  `Final` varchar(11) NOT NULL,
  `Grade` varchar(11) NOT NULL,
  `Remarks` varchar(20) NOT NULL,
  `AY` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_enrolled`
--

INSERT INTO `course_enrolled` (`id`, `idnum`, `fullname`, `year_term`, `program_class`, `course`, `Interim1`, `Midterm`, `Interim2`, `Final`, `Grade`, `Remarks`, `AY`) VALUES
(115, '2021-10002', 'BERDIN, Janine B.', '1st Year 1st Term', 'BSCS181A', 'Quantitative Methods', '92', '89', '95', '94', '92.5', '3.5', ''),
(116, '2021-10002', 'BERDIN, Janine B.', '1st Year 1st Term', 'BSCS181A', 'Database Systems', '', '', '', '', '', '', ''),
(117, '2021-10002', 'BERDIN, Janine B.', '1st Year 1st Term', 'BSCS181A', 'Fundamentals of Programming', '', '', '', '', '', '', ''),
(118, '2021-10002', 'BERDIN, Janine B.', '1st Year 1st Term', 'BSCS181A', 'Object-Oriented Programming', '', '', '', '', '', '', ''),
(119, '2021-10003', 'FUENTES, Stephene S.', '3rd Year 3rd Term', 'BSCS181A', 'Software Engineering', '', '', '', '', '', '', ''),
(120, '2021-10003', 'FUENTES, Stephene S.', '3rd Year 3rd Term', 'BSCS181A', 'Operating Systems', '', '', '', '', '', '', ''),
(121, '2021-10004', 'VELAYO, Chashar R.', '4th Year 1st Term', 'BSCS181A', 'Thesis 2', '', '', '', '', '', '', ''),
(122, '2021-10004', 'VELAYO, Chashar R.', '4th Year 1st Term', 'BSCS181A', 'Software Engineering', '', '', '', '', '', '', ''),
(123, '2021-10004', 'VELAYO, Chashar R.', '4th Year 1st Term', 'BSCS181A', 'Operating Systems', '', '', '', '', '', '', ''),
(124, '2021-10005', 'SALONGA, Uniqe B.', '4th Year 1st Term', 'BSCS191A', 'Quantitative Methods', '', '', '', '', '', '', ''),
(125, '2021-10005', 'SALONGA, Uniqe B.', '4th Year 1st Term', 'BSCS191A', 'Software Engineering', '', '', '', '', '', '', ''),
(126, '2021-10005', 'SALONGA, Uniqe B.', '4th Year 1st Term', 'BSCS191A', 'Object-Oriented Programming', '', '', '', '', '', '', ''),
(127, '2021-10005', 'SALONGA, Uniqe B.', '4th Year 1st Term', 'BSCS191A', 'Operating Systems', '', '', '', '', '', '', ''),
(128, '2021-10002', 'BERDIN, Janine B.', '1st Year 1st Term', 'BSCS181A', 'Operating Systems', '', '', '', '', '', '', ''),
(129, '2021-10006', 'TABULDO, Zack K.', '1st Year 1st Term', 'BSCE181A', 'Fundamentals of Programming', '', '', '', '', '', '', ''),
(130, '2021-10006', 'TABULDO, Zack K.', '1st Year 1st Term', 'BSCE181A', 'Object-Oriented Programming', '', '', '', '', '', '', ''),
(131, '2021-10006', 'TABULDO, Zack K.', '1st Year 1st Term', 'BSCE181A', 'Software Engineering', '', '', '', '', '', '', ''),
(132, '2021-10006', 'TABULDO, Zack K.', '1st Year 1st Term', 'BSCE181A', 'Operating Systems', '', '', '', '', '', '', ''),
(133, '2021-10004', 'VELAYO, Chashar R.', '4th Year 1st Term', 'BSCS181A', 'Quantitative Methods', '88', '85', '82', '90', '86.25', '3.0', ''),
(134, '2021-10003', 'FUENTES, Stephene S.', '3rd Year 3rd Term', 'BSCS181A', 'Quantitative Methods', '59', '59', '59', '59', '59', 'R', ''),
(135, '2021-10005', 'SALONGA, Uniqe B.', '4th Year 1st Term', 'BSCS191A', 'Quantitative Methods', '', '', '', '', '', '', ''),
(137, '2021-10004', 'VELAYO, Chashar R.', '4th Year 1st Term', 'BSCS181A', 'Physical Activities Towards Health (PE 2)', '', '', '', '', '', '', ''),
(138, '2021-10010', 'MALONE, Post G.', '3rd Year 1st Term', 'BSCS181A', 'Thesis 2', '', '', '', '', '', '', ''),
(141, '2021-10010', 'MALONE, Post G.', '3rd Year 1st Term', 'BSCS181A', 'Software Engineering', '', '', '', '', '', '', ''),
(142, '2021-10012', 'CLIFFORD, Micheal H.', '1st Year 1st Term', 'BSCS191A', 'Advance Communciations', '', '', '', '', '', '', ''),
(143, '2021-10012', 'CLIFFORD, Micheal H.', '1st Year 1st Term', 'BSCS191A', 'Fundamentals of Programming', '', '', '', '', '', '', ''),
(144, '2021-10012', 'CLIFFORD, Micheal H.', '1st Year 1st Term', 'BSCS191A', 'Ethics', '', '', '', '', '', '', ''),
(145, '2021-10012', 'CLIFFORD, Micheal H.', '1st Year 1st Term', 'BSCS191A', 'Movement Enhancement (PE1)', '', '', '', '', '', '', ''),
(146, '2021-10012', 'CLIFFORD, Micheal H.', '1st Year 1st Term', 'BSCS191A', 'Quantitative Methods', '', '', '', '', '', '', ''),
(147, '2021-10012', 'CLIFFORD, Micheal H.', '1st Year 1st Term', 'BSCS191A', 'NSTP 1', '', '', '', '', '', '', ''),
(148, '2021-10008', 'REYES, Monty C.', '1st Year 1st Term', 'BSCE211A', 'Advance Communciations', '', '', '', '', '', '', ''),
(149, '2021-10008', 'REYES, Monty C.', '1st Year 1st Term', 'BSCE211A', 'Thesis 2', '', '', '', '', '', '', ''),
(150, '2021-10008', 'REYES, Monty C.', '1st Year 1st Term', 'BSCE211A', 'Quantitative Methods', '', '', '', '', '', '', ''),
(151, '2021-10013', 'ZAMORA, Jericho B.', '1st Year 1st Term', 'BSCS201A', 'Advance Communciations', '', '', '', '', '', '', ''),
(152, '2021-10013', 'ZAMORA, Jericho B.', '1st Year 1st Term', 'BSCS201A', 'Thesis 2', '', '', '', '', '', '', ''),
(153, '2021-10013', 'ZAMORA, Jericho B.', '1st Year 1st Term', 'BSCS201A', 'Quantitative Methods', '', '', '', '', '', '', ''),
(154, '2021-10013', 'ZAMORA, Jericho B.', '1st Year 1st Term', 'BSCS201A', 'E Games', '98', '96', '93', '89', '94', '3.5', ''),
(168, '2021-10014', 'VILLANUEVA, Joslyn  H.', '1st Year 1st Term', 'BSCS181A', 'Human Computer Interaction', '89', '90', '95', '94', '92', '3.5', ''),
(169, '2021-10014', 'VILLANUEVA, Joslyn  H.', '3rd Year 1st Term', 'BSE181C', 'Teaching', '89', '90', '86', '88', '88.25', '3.0', ''),
(170, '2021-10006', 'TABULDO, Zack K.', '3rd Year 1st Term', 'BSE181C', 'Teaching', '', '', '', '', '', '', ''),
(171, '2021-10003', 'FUENTES, Stephene S.', '3rd Year 1st Term', 'BSE181A', 'Teaching', '', '', '', '', '', '', ''),
(172, '2021-10004', 'VELAYO, Chashar R.', '3rd Year 1st Term', 'BSE191B', 'Teaching', '', '', '', '', '', '', ''),
(173, '2021-10015', 'PETERSON, Jimena  H.', '1st Year 1st Term', 'BSCS181A', 'Technical Writing', '85', '90', '95', '95', '91.25', '3.5', ''),
(174, '2021-10015', 'PETERSON, Jimena  H.', '1st Year 2nd Term', 'BSA211C', 'Accounting', '90', '91', '92', '93', '91.5', '3.5', ''),
(175, '2021-10016', 'SANDOVAL, Peston P.', '1st Year 1st Term', 'BSCS181A', 'Automata', '50', '50', '50', '50', '50', 'R', ''),
(176, '2021-10016', 'SANDOVAL, Peston P.', '1st Year 2nd Term', 'BSP211D', 'Into to Psychology', '95', '95', '97', '98', '96.25', '4', '');

-- --------------------------------------------------------

--
-- Table structure for table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20211022025134', '2021-10-22 04:55:25', 3133),
('DoctrineMigrations\\Version20211105055522', '2021-11-05 06:56:05', 1376),
('DoctrineMigrations\\Version20211105060956', '2021-11-05 07:10:13', 265),
('DoctrineMigrations\\Version20211105061221', '2021-11-05 07:12:27', 227),
('DoctrineMigrations\\Version20211105061551', '2021-11-05 07:16:18', 2129),
('DoctrineMigrations\\Version20211105065256', '2021-11-05 07:53:02', 1559),
('DoctrineMigrations\\Version20211106045303', '2021-11-06 05:54:38', 2509);

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `faculty_id` varchar(50) NOT NULL,
  `special` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `reg_date` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `roles` longtext NOT NULL COMMENT '(DC2Type:json)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `fullname`, `faculty_id`, `special`, `status`, `email`, `username`, `gender`, `reg_date`, `password`, `roles`) VALUES
(14, 'Asta Y. Liebe', '2021-50005', 'MIT', 'Full-time', 'Asta@gmail.com', 'Liebeay@faculty-aja.edu.com', 'male', 'November 5, 2021', '', ''),
(15, 'Albert E. Tesla', '2021-50006', 'MIT', 'Full-time', 'albert@gmail.com', 'Teslaae@faculty-aja.edu.com', 'male', 'November 5, 2021', '', ''),
(20, 'Billie J. Eillish', '2021-50008', 'MIT', 'Part-time', 'billie@gmail.com', 'Eillishbj@faculty-aja.edu.com', 'female', 'November 5, 2021', '$2y$10$4OZgSKFwAxmq70KbbAtn5Oo1ypdkKcDnb4nN4rHgLVAcKBe4jGB.W', ''),
(21, 'Skusta C. Clee', '2021-50009', 'MIT', 'Full-time', 'skusta@gmail.com', 'Cleesc@faculty-aja.edu.com', 'male', 'November 5, 2021', '$2y$10$JvhKXHX5ZijtCmg/fWgGVexjxqwzpwWYcMZjKOjKUxiHsUUPtAN7S', ''),
(28, 'Tony M. Stark', '2021-50010', 'MIT', 'Full-time', 'stark@gmail.com', 'Starktm@faculty-aja.edu.com', 'male', 'November 13, 2021', '$2y$10$aFhdPfeYF.mKFCYsrfhDSuxgyYYRIYUJnybY9ewGypLIYJH.loeeS', ''),
(29, 'Ellis  M. Stevenson', '2021-50011', 'MIT', 'Full-time', 'ellis@gmail.com', 'Stevensonem@faculty-aja.edu.com', 'male', 'November 13, 2021', '$2y$10$8V.JOdJTvWa0q6yOrWQ2a.NA0S/AS762fK7ZAODio//EKB9GEulbC', ''),
(30, 'Rocco F. Valencia', '2021-50012', 'MIT', 'Full-time', 'valencia@gmail.com', 'Valenciarf@faculty-aja.edu.com', 'male', 'November 13, 2021', '$2y$10$TJOrxHWuehGHf9MuUPOuIO5Qx5t8em1dXlT.m3afMfgQLf9Lg20hu', '');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_loads`
--

CREATE TABLE `faculty_loads` (
  `id` int(11) NOT NULL,
  `faculty_id` varchar(50) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty_loads`
--

INSERT INTO `faculty_loads` (`id`, `faculty_id`, `fullname`, `course_name`, `class`) VALUES
(14, '2021-50009', 'Skusta C. Clee', 'Database Systems', 'BSIS181A'),
(19, '2021-50008', 'Billie J. Eillish', 'Fundamentals of Programming', 'BSIS181A'),
(38, '2021-50010', 'Tony M. Stark', 'Human Computer Interaction', 'BSCS181A'),
(39, '2021-50010', 'Tony M. Stark', 'Teaching', 'BSE181C'),
(40, '2021-50010', 'Tony M. Stark', 'Operating Systems', ''),
(41, '2021-50008', 'Billie J. Eillish', 'Teaching', ''),
(42, '2021-50006', 'Albert E. Tesla', 'Teaching', 'BSE191B'),
(43, '2021-50011', 'Ellis  M. Stevenson', 'Technical Writing', 'BSCS181A'),
(44, '2021-50011', 'Ellis  M. Stevenson', 'Accounting', 'BSA211C'),
(45, '2021-50012', 'Rocco F. Valencia', 'Automata', 'BSCS181A'),
(46, '2021-50012', 'Rocco F. Valencia', 'Into to Psychology', 'BSP211D');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` int(11) NOT NULL,
  `program` varchar(100) NOT NULL,
  `class_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `program`, `class_name`) VALUES
(19, 'Bachelor of Science in Computer Science', '181A'),
(20, 'Bachelor of Science in Computer Science', '191A'),
(21, 'Bachelor of Science in Information System', '181A'),
(22, 'Bachelor of Science in Information System', '191A'),
(23, 'Bachelor of Science in Information Technology', '211A'),
(24, 'Bachelor of Science in Computer Engineering', '211A'),
(25, 'Bachelor of Science in Computer Science', '201A'),
(31, 'Bachelor of Science in Education', '181C'),
(32, 'Bachelor of Science in Education', '181A'),
(33, 'Bachelor of Science in Education', '191B'),
(34, 'Bachelor of Science in Accountancy', '211C'),
(35, 'Bachelor of Science in Psychology', '211D');

-- --------------------------------------------------------

--
-- Table structure for table `studentrecords`
--

CREATE TABLE `studentrecords` (
  `id` int(11) NOT NULL,
  `idnum` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `entlev` varchar(20) NOT NULL,
  `term` varchar(20) NOT NULL,
  `program` varchar(50) NOT NULL,
  `class` varchar(20) NOT NULL,
  `enroll_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentrecords`
--

INSERT INTO `studentrecords` (`id`, `idnum`, `name`, `entlev`, `term`, `program`, `class`, `enroll_date`) VALUES
(71, '2021-10001', 'YUKINON, Yumiko A.', '1st Year', '1st Term', 'Bachelor of Science in Computer Science', '181A', 'October 6, 2021'),
(72, '2021-10001', 'YUKINON, Yumiko A.', '1st Year', '2nd Term', 'Bachelor of Science in Computer Science', '181A', 'October 6, 2021'),
(73, '2021-10006', 'TABULDO, Zack K.', '1st Year', '1st Term', 'Bachelor of Science in Computer Engineering', '181A', 'October 7, 2021'),
(74, '2021-10002', 'BERDIN, Janine B.', '1st Year', '1st Term', 'Bachelor of Science in Computer Science', '181A', 'October 8, 2021'),
(75, '2021-10003', 'FUENTES, Stephene S.', '3rd Year', '3rd Term', 'Bachelor of Science in Computer Science', '181A', 'October 11, 2021'),
(76, '2021-10004', 'VELAYO, Chashar R.', '4th Year', '1st Term', 'Bachelor of Science in Computer Science', '181A', 'October 19, 2021'),
(77, '2021-10005', 'SALONGA, Uniqe B.', '4th Year', '1st Term', 'Bachelor of Science in Computer Science', '191A', 'October 19, 2021'),
(78, '2021-10002', 'BERDIN, Janine B.', '1st Year', '2nd Term', 'Bachelor of Science in Computer Science', '181A', 'October 23, 2021'),
(79, '2021-10010', 'MALONE, Post G.', '3rd Year', '1st Term', 'Bachelor of Science in Computer Science', '181A', 'November 12, 2021'),
(80, '2021-10004', 'VELAYO, Chashar R.', '4th Year', '2nd Term', 'Bachelor of Science in Computer Science', '181A', 'November 12, 2021'),
(81, '2021-10002', 'BERDIN, Janine B.', '1st Year', '3rd Term', 'Bachelor of Science in Computer Science', '181A', 'November 12, 2021'),
(82, '2021-10003', 'FUENTES, Stephene S.', '4th Year', '1st Term', 'Bachelor of Science in Computer Science', '181A', 'November 12, 2021'),
(83, '2021-10012', 'CLIFFORD, Micheal H.', '1st Year', '1st Term', 'Bachelor of Science in Computer Science', '191A', 'November 12, 2021'),
(84, '2021-10008', 'REYES, Monty C.', '1st Year', '1st Term', 'Bachelor of Science in Computer Engineering', '211A', 'November 12, 2021'),
(85, '2021-10013', 'ZAMORA, Jericho B.', '1st Year', '1st Term', 'Bachelor of Science in Computer Science', '201A', 'November 12, 2021'),
(86, '2021-10013', 'ZAMORA, Jericho B.', '1st Year', '2nd Term', 'Bachelor of Science in Computer Science', '201A', 'November 12, 2021'),
(87, '2021-10009', 'CRUZ, Zild B.', '2nd Year', '1st Term', 'Bachelor of Science in Accountancy', '181B', 'November 12, 2021'),
(88, '2021-10009', 'CRUZ, Zild B.', '2nd Year', '2nd Term', 'Bachelor of Science in Computer Science', '181A', 'November 12, 2021'),
(94, '2021-10014', 'VILLANUEVA, Joslyn  H.', '1st Year', '1st Term', 'Bachelor of Science in Computer Science', '181A', 'November 13, 2021'),
(95, '2021-10014', 'VILLANUEVA, Joslyn  H.', '1st Year', '2nd Term', 'Bachelor of Science in Computer Science', '181A', 'November 13, 2021'),
(96, '2021-10014', 'VILLANUEVA, Joslyn  H.', '3rd Year', '1st Term', 'Bachelor of Science in Education', '181C', 'November 13, 2021'),
(97, '2021-10006', 'TABULDO, Zack K.', '3rd Year', '1st Term', 'Bachelor of Science in Education', '181C', 'November 13, 2021'),
(98, '2021-10003', 'FUENTES, Stephene S.', '3rd Year', '1st Term', 'Bachelor of Science in Education', '181A', 'November 13, 2021'),
(99, '2021-10004', 'VELAYO, Chashar R.', '3rd Year', '1st Term', 'Bachelor of Science in Education', '191B', 'November 13, 2021'),
(100, '2021-10013', 'ZAMORA, Jericho B.', '1st Year', '1st Term', 'Bachelor of Science in Computer Science', '181A', 'November 13, 2021'),
(101, '2021-10015', 'PETERSON, Jimena  H.', '1st Year', '1st Term', 'Bachelor of Science in Computer Science', '181A', 'November 13, 2021'),
(102, '2021-10015', 'PETERSON, Jimena  H.', '1st Year', '2nd Term', 'Bachelor of Science in Accountancy', '211C', 'November 13, 2021'),
(103, '2021-10016', 'SANDOVAL, Peston P.', '1st Year', '1st Term', 'Bachelor of Science in Computer Science', '181A', 'November 13, 2021'),
(104, '2021-10016', 'SANDOVAL, Peston P.', '1st Year', '2nd Term', 'Bachelor of Science in Psychology', '211D', 'November 13, 2021');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `idnum` varchar(10) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `entlev` varchar(20) NOT NULL,
  `academic_year` varchar(50) NOT NULL,
  `term` varchar(20) NOT NULL,
  `program` varchar(50) NOT NULL,
  `class` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `cnum` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `prevschool` varchar(80) NOT NULL,
  `hea` varchar(50) NOT NULL,
  `img` varchar(50) NOT NULL,
  `g_moral` varchar(50) NOT NULL,
  `NSO` varchar(50) NOT NULL,
  `reg_date` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `idnum`, `fname`, `mname`, `lname`, `entlev`, `academic_year`, `term`, `program`, `class`, `gender`, `cnum`, `email`, `prevschool`, `hea`, `img`, `g_moral`, `NSO`, `reg_date`) VALUES
(26, '2021-10002', 'Janine', 'Bermudo', 'Berdin', '1st Year', '2021-11-12 to 2022-11-12', '3rd Term', 'Bachelor of Science in Computer Science', '181A', 'female', '01924135234', 'janine@gmail.com', 'STI', 'Senior High School', '1633491394_girl.jpg', '1633491394_Good_Moral.pdf', '1633491394_NSO.pdf', 'October 6, 2021 | 11:36 AM'),
(27, '2021-10003', 'Stephene', 'Siason', 'Fuentes', '3rd Year', '2021-11-13 to 2022-01-13', '1st Term', 'Bachelor of Science in Education', '181A', 'male', '0935245436', 'stepehene@gmail.com', 'AMA', 'Senior High School', '1633491597_boy.jpg', '1633491597_Good_Moral.pdf', '1633491597_NSO.pdf', 'October 6, 2021 | 11:39 AM'),
(28, '2021-10004', 'Chashar', 'Ramon', 'Velayo', '3rd Year', '2021-11-13 to 2022-01-13', '1st Term', 'Bachelor of Science in Education', '191B', 'male', '0912343251', 'chashar@gmail.com', 'Perpetual Help Laguna', 'Senior High School', '1633491635_boy.jpg', '1633491635_Good_Moral.pdf', '1633491635_NSO.pdf', 'October 6, 2021 | 11:40 AM'),
(29, '2021-10005', 'Uniqe', 'Blaster', 'Salonga', '4th Year', '2021-10-6 to 2022-02-28', '1st Term', 'Bachelor of Science in Computer Science', '191A', 'male', '091234141243', 'unique@gmail.com', 'Pamantasan ng Lungsod ng Muntinlupa', 'Senior High School', '1633491671_unique.jpg', '1633491671_Good_Moral.pdf', '1633491671_NSO.pdf', 'October 6, 2021 | 11:41 AM'),
(30, '2021-10006', 'Zack', 'King', 'Tabuldo', '3rd Year', '2021-11-13 to 2022-01-13', '1st Term', 'Bachelor of Science in Education', '181C', 'male', '0912412414134', 'zack@gmail.com', 'Lyceum of the Philippines', 'Senior High School', '1633491710_boy.jpg', '1633491710_Good_Moral.pdf', '1633491710_NSO.pdf', 'October 6, 2021 | 11:41 AM'),
(32, '2021-10008', 'Monty', 'Chan', 'Reyes', '1st Year', '2021-11-12 to 2022-11-12', '1st Term', 'Bachelor of Science in Computer Engineering', '211A', 'male', '093452341324', 'monty@gmail.com', 'University of Makati', 'Senior High School', '1633491818_boy.jpg', '1633491818_Good_Moral.pdf', '1633491818_NSO.pdf', 'October 6, 2021 | 11:43 AM'),
(33, '2021-10009', 'Zild', 'Benitez', 'Cruz', '2nd Year', '2021-11-12 to 2021-11-13', '2nd Term', 'Bachelor of Science in Computer Science', '181A', 'male', '091412323423', 'zild@gmail.com', 'University of Makati', 'Senior High School', '1633491855_boy.jpg', '1633491855_Good_Moral.pdf', '1633491855_NSO.pdf', 'October 6, 2021 | 11:44 AM'),
(34, '2021-10010', 'Post', 'Gomez', 'Malone', '3rd Year', '2021-10-23 to 2022-04-28', '1st Term', 'Bachelor of Science in Computer Science', '181A', 'male', '0912421342', 'malone@gmail.com', 'STI', 'Senior High School', '1633491918_boy.jpg', '1633491918_Good_Moral.pdf', '1633491918_NSO.pdf', 'October 6, 2021 | 11:45 AM'),
(35, '2021-10011', 'Jerome', 'Repasa', 'Villamore', '4th Year', '', '', '', '', 'male', '09123123123', 'jerome@gmail.com', 'Lyceum of the Philippines', 'Senior High School', '1633494693_boy.jpg', '1633494693_Good_Moral.pdf', '1633494693_NSO.pdf', 'October 6, 2021 | 12:31 PM'),
(37, '2021-10012', 'Micheal', 'Hammilton', 'Clifford', '1st Year', '2021-11-12 to 2022-11-12', '1st Term', 'Bachelor of Science in Computer Science', '191A', 'male', '09985454874', 'mc123@gmail.com', 'Perpetual Help Laguna', 'Senior High School', '1636700313_unique.jpg', '1636700313_Good_Moral.pdf', '1636700313_NSO.pdf', 'November 12, 2021 | 2:58 PM'),
(38, '2021-10013', 'Jericho', 'Burgos', 'Zamora', '1st Year', '2021-11-13 to 2022-01-13', '1st Term', 'Bachelor of Science in Computer Science', '181A', 'male', '09121455124', 'zamora@gmail.com', 'Lyceum of the Philippines', 'Senior High School', '1636701872_unique.jpg', '1636701872_Good_Moral.pdf', '1636701872_NSO.pdf', 'November 12, 2021 | 3:24 PM'),
(40, '2021-10014', 'Joslyn ', 'Hanson ', 'Villanueva', '3rd Year', '2021-11-13 to 2022-01-13', '1st Term', 'Bachelor of Science in Education', '181C', 'female', '09215414878', 'villanueva@gmail.com', 'AMA', 'Senior High School', '1636770873_girl.jpg', '1636770873_Good_Moral.pdf', '1636770873_NSO.pdf', 'November 13, 2021 | 10:34 AM'),
(41, '2021-10015', 'Jimena ', 'Hayes ', 'Peterson', '1st Year', '2021-11-13 to 2022-02-13', '2nd Term', 'Bachelor of Science in Accountancy', '211C', 'female', '09215421547', 'jimena@gmail.com', 'AMA', 'Senior High School', '1636782591_girl.jpg', '1636782591_Good_Moral.pdf', '1636782591_NSO.pdf', 'November 13, 2021 | 1:49 PM'),
(42, '2021-10016', 'Peston', 'Payne', 'Sandoval', '1st Year', '2021-11-13 to 2022-06-13', '2nd Term', 'Bachelor of Science in Psychology', '211D', 'male', '09213454555', 'sandoval@gmail.com', 'University of Makati', 'Senior High School', '1636788797_boy.jpg', '1636788797_Good_Moral.pdf', '1636788797_NSO.pdf', 'November 13, 2021 | 3:33 PM');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `id_user` varchar(20) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `acctype` varchar(20) NOT NULL,
  `verified` tinyint(4) NOT NULL,
  `OTP` mediumint(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `reg_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `id_user`, `admin_name`, `username`, `email`, `acctype`, `verified`, `OTP`, `password`, `reg_date`) VALUES
(41, '2021-80001', 'Default Admin', 'admin01@admin-aja.edu.com', 'iammeksung@gmail.com', 'admin', 1, 0, '$2y$10$dUTC13gnR8TVvdylj3xwXOSzDuF/JICwato94cIgu18SfEb30AiVm', 'October 10, 2021'),
(44, '2021-80002', 'Mendez, Shawn, Gomez', 'Mendezsg@admin-aja.edu.com', 'shawnmendez@yahoo.com', 'admin', 1, 0, '$2y$10$00qmnxqSB1pXu50dSDCOHuKVmK1f9H8H7vSTUfZ/MOmqnE0opJwFu', 'October 10, 2021'),
(45, '2021-80003', 'Fuentes, Stephene Andrei, Siason', 'Fuentessas@admin-aja.edu.com', 'stepehene@gmail.com', 'admin', 1, 0, '$2y$10$RPw1mwZ.mEyccM/K.1Uehu3QTn4ZnOKX0kKMEp9.kUQ0gxkRIMTw2', 'October 10, 2021'),
(47, '2021-80004', 'Jackson, Jessica, Pompey', 'Jacksonjp@admin-aja.edu.com', 'jp@gmail.com', 'admin', 0, 844108, '$2y$10$4996rFicq06lfRYibZsyBu8ntDCZ.2oZkreYzgp7R.fbdo47iVl.q', 'October 10, 2021'),
(48, '2021-80005', 'vidallon, dave, vidallon', 'vidallondv@admin-aja.edu.com', 'iamdeybb@gmail.com', 'admin', 1, 0, '$2y$10$z9.yJa8UHtRlc2P.IEQGCuOzLPnpps28nTs1elaUjiXQz1BPfgU/y', 'October 23, 2021'),
(50, '2021-80006', 'odinson, loki, jones', 'odinsonlj@admin-aja.edu.com', 'loki@gmail.com', 'admin', 1, 0, '$2y$10$N.BZ.q4sdjUlJDdALD95mO/D4qatNQJvzExn8x7zjt1cBycOciycy', 'November 12, 2021'),
(51, '2021-80007', 'Legaspi, Marc Ace, Jumao-as', 'Legaspimaj@admin-aja.edu.com', 'marclegaspi2@gmail.com', 'admin', 1, 0, '$2y$10$5pF4BHp47Pv5Wm0YozVn1OupJngiFTjoRbLMERICLPuT8qtVzSQgu', 'November 13, 2021');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic_year`
--
ALTER TABLE `academic_year`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_enrolled`
--
ALTER TABLE `course_enrolled`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty_loads`
--
ALTER TABLE `faculty_loads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentrecords`
--
ALTER TABLE `studentrecords`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academic_year`
--
ALTER TABLE `academic_year`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `course_enrolled`
--
ALTER TABLE `course_enrolled`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `faculty_loads`
--
ALTER TABLE `faculty_loads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `studentrecords`
--
ALTER TABLE `studentrecords`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
