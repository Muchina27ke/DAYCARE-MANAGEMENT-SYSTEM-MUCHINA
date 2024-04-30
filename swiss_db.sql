-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 25, 2024 at 01:48 PM
-- Server version: 8.0.31
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `swiss_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL,
  `name` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `phone` longtext COLLATE utf8mb3_unicode_ci NOT NULL,
  `email` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `password` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `level` int NOT NULL,
  `dateAdded` datetime NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `phone`, `email`, `password`, `level`, `dateAdded`) VALUES
('adm004', 'test', '0700000000', 'test@mail.com', '$2y$10$14qLAev9XwII/6qT6oTDm.l/dDi89MHcOf4cvHm/toZnsWw/Lge8e', 1, '2024-03-21 20:43:44');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

DROP TABLE IF EXISTS `attendance`;
CREATE TABLE IF NOT EXISTS `attendance` (
  `attendance_id` int NOT NULL AUTO_INCREMENT,
  `status` int NOT NULL COMMENT '0 undefined , 1 present , 2  absent',
  `student_id` int NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`attendance_id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`attendance_id`, `status`, `student_id`, `date`) VALUES
(1, 1, 1, '2015-12-10'),
(2, 0, 1, '2015-12-11'),
(3, 0, 1, '2016-01-23'),
(4, 0, 1, '2016-01-30'),
(5, 0, 1, '2020-03-12'),
(6, 1, 1, '2022-03-12'),
(7, 1, 1, '2021-11-20'),
(8, 2, 3, '2022-03-12'),
(9, 2, 4, '2022-03-12'),
(10, 2, 5, '2022-03-12'),
(11, 2, 6, '2022-03-12'),
(12, 2, 7, '2022-03-12'),
(13, 2, 8, '2022-03-12'),
(14, 2, 9, '2022-03-12'),
(15, 1, 1, '2022-03-13'),
(16, 2, 2, '2022-03-13'),
(17, 1, 12, '2022-03-13'),
(18, 1, 10, '2022-03-13'),
(19, 1, 11, '2022-03-13'),
(20, 1, 14, '2022-03-13'),
(21, 1, 3, '2022-03-13'),
(22, 1, 4, '2022-03-13'),
(23, 1, 5, '2022-03-13'),
(24, 1, 6, '2022-03-13'),
(25, 2, 7, '2022-03-13'),
(26, 1, 8, '2022-03-13'),
(27, 1, 9, '2022-03-13'),
(28, 2, 13, '2022-03-13'),
(29, 0, 3, '2020-03-13'),
(30, 0, 4, '2020-03-13'),
(31, 0, 5, '2020-03-13'),
(32, 0, 6, '2020-03-13'),
(33, 0, 7, '2020-03-13'),
(34, 0, 8, '2020-03-13'),
(35, 0, 9, '2020-03-13'),
(36, 0, 13, '2020-03-13');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

DROP TABLE IF EXISTS `class`;
CREATE TABLE IF NOT EXISTS `class` (
  `class_id` int NOT NULL AUTO_INCREMENT,
  `name` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `teacher_id` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL,
  `fee` int NOT NULL,
  PRIMARY KEY (`class_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `name`, `teacher_id`, `fee`) VALUES
(2, 'Class-9', 'tr6628', 1000),
(7, 'test group', 'tr9920', 2000),
(8, 'test', 'tr9920', 2000);

-- --------------------------------------------------------

--
-- Table structure for table `class_routine`
--

DROP TABLE IF EXISTS `class_routine`;
CREATE TABLE IF NOT EXISTS `class_routine` (
  `class_routine_id` int NOT NULL AUTO_INCREMENT,
  `class_id` int NOT NULL,
  `subject_id` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL,
  `day` int NOT NULL,
  PRIMARY KEY (`class_routine_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `class_routine`
--

INSERT INTO `class_routine` (`class_routine_id`, `class_id`, `subject_id`, `time_start`, `time_end`, `day`) VALUES
(9, 2, 'test', '16:00:00', '17:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

DROP TABLE IF EXISTS `invoice`;
CREATE TABLE IF NOT EXISTS `invoice` (
  `invoice_id` int NOT NULL AUTO_INCREMENT,
  `student_id` int NOT NULL,
  `title` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `amount` int NOT NULL,
  `amount_paid` int NOT NULL,
  `due` int NOT NULL,
  `creation_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `payment_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `payment_method` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `payment_details` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci,
  `status` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL COMMENT 'paid or unpaid',
  PRIMARY KEY (`invoice_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_id`, `student_id`, `title`, `description`, `amount`, `amount_paid`, `due`, `creation_timestamp`, `payment_timestamp`, `payment_method`, `payment_details`, `status`) VALUES
(1, 1, 'Monthly Fee', 'none', 850, 850, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', 'paid'),
(2, 17, 'Monthly Payment', 'Payment for the month - Feb', 990, 990, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', 'paid'),
(3, 10, 'Monthly Fees - Feb', 'Fees collection for the month of February', 770, 770, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', 'paid'),
(4, 5, 'Monthly Fees', 'Fees collection for the month February', 990, 990, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', 'paid'),
(6, 9, 'Monthly Fees', 'none', 990, 990, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', 'paid'),
(9, 16, 'testing', 'march school fee description', 1000, 0, 1000, '2024-03-25 06:10:34', '2024-03-25 06:10:34', NULL, NULL, 'unpaid'),
(8, 18, 'march school fee', 'march school fee description', 2000, 2000, 0, '2024-03-25 06:08:25', '2024-03-25 06:08:25', NULL, NULL, 'paid'),
(10, 17, 'testing', 'march school fee description', 1000, 0, 1000, '2024-03-25 06:10:34', '2024-03-25 06:10:34', NULL, NULL, 'unpaid');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `message_id` int NOT NULL AUTO_INCREMENT,
  `sender_id` varchar(50) DEFAULT NULL,
  `receiver_id` varchar(50) DEFAULT NULL,
  `content` longtext CHARACTER SET utf32 COLLATE utf32_general_ci,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('read','unread') DEFAULT 'unread',
  PRIMARY KEY (`message_id`)
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=utf32;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`message_id`, `sender_id`, `receiver_id`, `content`, `timestamp`, `status`) VALUES
(29, '13', 'tr6628', 'test mail', '2024-03-25 09:21:28', 'unread'),
(28, NULL, NULL, 'test', '2024-03-25 09:09:59', 'unread'),
(27, NULL, NULL, 'test', '2024-03-25 09:09:06', 'unread'),
(30, '13', 'tr6628', 'hello\n', '2024-03-25 09:21:45', 'unread'),
(31, '13', 'tr6628', 'helo', '2024-03-25 09:24:28', 'unread'),
(32, '13', 'tr6628', 'hello\n', '2024-03-25 09:27:50', 'unread'),
(33, '13', 'tr6628', 'hello', '2024-03-25 09:32:48', 'unread'),
(34, '13', 'tr6628', 'hey\n', '2024-03-25 09:35:11', 'unread'),
(35, '13', 'tr6628', '', '2024-03-25 09:35:14', 'unread'),
(36, '13', 'tr6628', 'qwerty testing tu', '2024-03-25 09:38:53', 'unread'),
(37, '13', 'tr6628', 'sasa', '2024-03-25 09:40:11', 'unread'),
(38, 'tr6628', '13', 'poa', '2024-03-25 09:45:22', 'unread'),
(39, 'tr6628', '13', 'whats up\n', '2024-03-25 09:45:40', 'unread'),
(40, 'tr6628', '13', 'testing', '2024-03-25 09:47:45', 'unread'),
(41, '13', 'tr6628', 'what are you testing', '2024-03-25 09:48:25', 'unread'),
(42, '13', 'tr6628', 'sasa', '2024-03-25 09:52:52', 'unread'),
(43, '13', 'tr6628', 'sasa', '2024-03-25 09:59:07', 'unread'),
(44, '13', 'tr6628', 'test 55', '2024-03-25 10:00:42', 'unread'),
(45, 'tr6628', '13', 'what 55?', '2024-03-25 10:01:06', 'unread'),
(46, '13', 'tr6628', 'sasa', '2024-03-25 10:03:44', 'unread'),
(47, 'tr6628', '13', 'poa', '2024-03-25 10:04:57', 'unread'),
(48, 'tr6628', '13', 'uko aje shule', '2024-03-25 10:05:25', 'unread'),
(49, '13', 'tr6628', 'kuko opa', '2024-03-25 10:05:42', 'unread'),
(50, 'tr6628', '13', 'that\'s nice', '2024-03-25 10:08:33', 'unread'),
(51, '13', 'tr6628', 'k', '2024-03-25 10:42:10', 'unread');

-- --------------------------------------------------------

--
-- Table structure for table `noticeboard`
--

DROP TABLE IF EXISTS `noticeboard`;
CREATE TABLE IF NOT EXISTS `noticeboard` (
  `notice_id` int NOT NULL AUTO_INCREMENT,
  `notice_title` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `notice` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `create_timestamp` datetime NOT NULL,
  `status` int NOT NULL,
  PRIMARY KEY (`notice_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `noticeboard`
--

INSERT INTO `noticeboard` (`notice_id`, `notice_title`, `notice`, `create_timestamp`, `status`) VALUES
(3, 'test notice', 'This is a demo notice from the school administration to inform you that this is just a simple test message. Thank you!', '2024-03-24 22:37:53', 1);

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

DROP TABLE IF EXISTS `parent`;
CREATE TABLE IF NOT EXISTS `parent` (
  `parent_id` int NOT NULL AUTO_INCREMENT,
  `name` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `email` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `password` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `phone` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `address` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `profession` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`parent_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `parent`
--

INSERT INTO `parent` (`parent_id`, `name`, `email`, `password`, `phone`, `address`, `profession`, `date`) VALUES
(13, 'Kelvin Mungai Mburu', 'vhokemungai@gmail.com', '$2y$10$wtfb1NzPsLd/UUyimOnNhunIPjamAPO/LHiuodqn5ZyShRWEO5iOK', '0703623699', '5940', 'not added', '2024-03-21'),
(15, 'kev', 'test@mail.com', '$2y$10$A6Z4Pzn8Gq8zb4/D8QdPm.16FmNXX5lPV1l6NJHkOaKI0KMXZfjQK', '+1 888 652 22', 'ngong', 'not added', '2024-03-24');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `payment_id` int NOT NULL AUTO_INCREMENT,
  `title` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `payment_type` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `invoice_id` int NOT NULL,
  `student_id` int NOT NULL,
  `method` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `amount` int NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`payment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `title`, `payment_type`, `invoice_id`, `student_id`, `method`, `description`, `amount`, `timestamp`) VALUES
(1, 'Monthly Fee', 'income', 1, 1, '1', 'asd', 100, '0000-00-00 00:00:00'),
(2, 'Monthly Payment', 'income', 2, 3, '1', 'Payment for the month - Feb', 0, '0000-00-00 00:00:00'),
(3, 'Monthly Fees - Feb', 'income', 3, 17, '3', 'Fees collection for the month of February', 770, '0000-00-00 00:00:00'),
(4, 'Monthly Fees', 'income', 4, 5, '1', 'Fees collection for the month February', 990, '0000-00-00 00:00:00'),
(5, 'Monthly Fees - Feb', 'income', 5, 12, '1', 'Fees Collection for the month February', 0, '0000-00-00 00:00:00'),
(6, 'Monthly Fees', 'income', 6, 9, '2', 'none', 990, '0000-00-00 00:00:00'),
(15, 'Monthly Payment', 'FEE', 2, 17, 'Cash', 'Payment for the month - Feb', 990, '2024-03-24 09:11:22'),
(16, 'march school fee', 'FEE', 8, 18, 'Cash', 'march school fee description', 2000, '2024-03-25 06:11:29');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `student_id` int NOT NULL AUTO_INCREMENT,
  `name` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `birthday` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `sex` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `religion` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `address` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `class_id` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `parent_id` int NOT NULL,
  `dateAdded` datetime NOT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `name`, `birthday`, `sex`, `religion`, `address`, `class_id`, `parent_id`, `dateAdded`) VALUES
(16, 'test', '2023-02-01', 'male', 'Christian', 'none', '2', 13, '2024-03-24 08:00:05'),
(17, 'munga baby', '2023-10-05', 'male', 'Christian', 'none', '2', 13, '2024-03-24 08:03:36'),
(18, 'test kid', '2023-09-04', 'male', 'Christian', 'none', '7', 15, '2024-03-24 23:09:20');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

DROP TABLE IF EXISTS `teacher`;
CREATE TABLE IF NOT EXISTS `teacher` (
  `teacher_id` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL,
  `name` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `birthday` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `sex` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `religion` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `address` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `phone` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `email` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `password` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`teacher_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `name`, `birthday`, `sex`, `religion`, `address`, `phone`, `email`, `password`, `date`) VALUES
('tr0001', 'munga', '2024-03-02', 'Female', 'Christianity', 'ngong', '0703623699', 'vhokemungai@gmail.com', '$2y$10$6e.RLkZbrW/UXpTuIopneuH1OMPaZhLgV1k.hb.AJ28pvtB9wrXzq', '0000-00-00 00:00:00'),
('tr4241', 'mung', '2022-09-08', 'Male', 'Hinduism', 'ngong', '0703623699', 'vhokemungai@gmail.com', '$2y$10$wwivti3Ef8elr0VODfjWGezRIjMs7visxm9XuapZ50X5GMQCh5.Hm', '0000-00-00 00:00:00'),
('tr6628', 'mungacodes', '2024-03-09', 'Male', 'Islam', '5940', '0703623699', 'vhokemungai@gmail.com', '$2y$10$E5X3VrvNMmFYfyUaQmIM6e/CmLVy0oNFMgS5f6s2g7yJ6ZK3m2ULa', '0000-00-00 00:00:00'),
('tr9920', 'test', '2006-03-23', 'Female', 'Christianity', '5940', '0703623699', 'vhokemungai@gmail.com', '$2y$10$KEzP9mDV69JOdDhZyb8H1OEjXEW8vz3n3k1r.JFL7T91xDGTHlAty', '0000-00-00 00:00:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
