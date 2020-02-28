-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 25, 2020 at 02:24 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elibrary_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `bid` int(11) NOT NULL,
  `book_name` varchar(250) NOT NULL,
  `author_name` varchar(150) NOT NULL,
  `edition` varchar(150) NOT NULL,
  `cover_image_name` varchar(150) NOT NULL,
  `last_modify` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bid`, `book_name`, `author_name`, `edition`, `cover_image_name`, `last_modify`) VALUES
(88, 'Eat That Frog', 'Brian Tracy', 'Third Edition', 'EatTThird', '2020-02-07 11:05:51'),
(91, 'Sapiens', 'Yuval Noah Harari', 'First Edition', 'SapieFirst', '2020-02-07 11:18:27'),
(95, 'Flow', 'Mihaly Csikszentmihalyi', 'First Edition', 'FlowFirst', '2020-02-07 11:37:48'),
(96, 'Factfulness', 'Hans Rosling', 'First Edition', 'FactfFirst', '2020-02-07 11:40:15'),
(98, 'Nudge', 'Richard H. Thaler and Cass R. Sunstein', 'First Edition', 'NudgeFirst', '2020-02-07 11:44:32'),
(99, '10 Days to Faster Reading', 'Abby Marks-Beale', 'First Edition', '10DaFirst', '2020-02-07 11:49:10'),
(100, 'The Diary of a Young Girl', 'Anne Frank', 'First Edition', 'TheDFirst', '2020-02-07 11:56:05'),
(101, 'The Future is History', 'Masha Gessen', 'First Edition', 'TheFFirst', '2020-02-07 11:58:05'),
(102, 'Jonathan Livingston Seagull', 'Mihaly Csikszentmihalyi', 'First Edition', 'JonatFirst', '2020-02-07 12:09:58'),
(103, 'The Google Story', 'David A. Vise', 'First Edition', 'TheGFirst', '2020-02-07 12:11:11'),
(104, 'Badass Making Users Awesome', 'Kathy Sierra', 'First Edition', 'BadasFirst', '2020-02-07 12:23:44'),
(107, 'In Search of Lost Time', 'Marcel Proust', 'dadada', 'InSedadad', '2020-02-24 14:45:41');

-- --------------------------------------------------------

--
-- Table structure for table `book_categories`
--

CREATE TABLE `book_categories` (
  `cid` int(11) NOT NULL,
  `category_name` varchar(250) DEFAULT NULL,
  `last_modify` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_categories`
--

INSERT INTO `book_categories` (`cid`, `category_name`, `last_modify`) VALUES
(31, 'Bestseller', '2020-02-06 11:19:55'),
(32, 'Science Fiction', '2020-02-06 11:20:12'),
(33, 'Motivational', '2020-02-06 11:22:23'),
(34, 'Non Fiction', '2020-02-06 11:24:01'),
(35, 'Fiction', '2020-02-07 11:09:52'),
(36, 'Biography', '2020-02-07 11:22:41'),
(37, 'Self Help ', '2020-02-07 11:36:06'),
(38, 'Fantasy', '2020-02-22 11:02:43');

-- --------------------------------------------------------

--
-- Table structure for table `has_book`
--

CREATE TABLE `has_book` (
  `uid` int(11) NOT NULL,
  `bid` int(11) NOT NULL,
  `transaction_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `has_book`
--

INSERT INTO `has_book` (`uid`, `bid`, `transaction_time`) VALUES
(128, 91, '2020-02-11 12:00:19'),
(135, 91, '2020-02-14 08:10:42'),
(135, 98, '2020-02-14 08:12:34'),
(137, 91, '2020-02-18 16:12:32'),
(137, 95, '2020-02-18 16:12:37'),
(133, 100, '2020-02-19 16:24:34'),
(133, 96, '2020-02-20 05:14:26'),
(142, 98, '2020-02-22 11:10:23');

-- --------------------------------------------------------

--
-- Table structure for table `has_category`
--

CREATE TABLE `has_category` (
  `bid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `transaction_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `has_category`
--

INSERT INTO `has_category` (`bid`, `cid`, `transaction_time`) VALUES
(91, 34, '2020-02-07 11:19:17'),
(95, 37, '2020-02-07 11:37:48'),
(96, 31, '2020-02-07 11:40:30'),
(98, 37, '2020-02-07 11:44:32'),
(99, 37, '2020-02-07 11:49:10'),
(100, 36, '2020-02-07 11:56:43'),
(101, 36, '2020-02-07 12:06:23'),
(102, 37, '2020-02-07 12:09:58'),
(103, 31, '2020-02-07 12:11:11'),
(103, 33, '2020-02-07 12:11:11'),
(104, 37, '2020-02-07 12:23:44'),
(107, 31, '2020-02-24 14:45:41'),
(107, 36, '2020-02-24 14:45:41'),
(88, 31, '2020-02-25 08:38:37'),
(88, 33, '2020-02-25 08:38:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `email_id` varchar(650) DEFAULT NULL,
  `password` varchar(300) NOT NULL,
  `user_name` varchar(250) NOT NULL,
  `verified_id` tinyint(1) DEFAULT '0',
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `provider_id` varchar(500) DEFAULT NULL,
  `type` smallint(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `email_id`, `password`, `user_name`, `verified_id`, `last_login`, `provider_id`, `type`) VALUES
(128, 'gb.16cs20@thdcihet.ac.in', '$2y$10$LNVETPTsZrzudlpXMsOGSukOlCzhJD0EI7mwyRdBaw1Gm6EBQAs.i', 'GAURAV BHATT', 1, '2020-02-11 11:59:22', '102661723136334422010', 1),
(133, 'usertest@elibrary.com', '$2y$10$HiKowBNqIB1Ei1.t/uEBOu7pUIqCyUqMyCsjGCAZcax4B/.OoMAlG', 'test', 1, '2020-02-13 13:33:47', '', 1),
(134, 'admintest@elibrary.com', '$2y$10$biFgxaiz0Ek.nfXgiIiy1uXUKDqc/nHZt.jOEzDyJbrXk/Bf3M976', 'test admin', 1, '2020-02-13 13:34:52', '', 0),
(135, 'mohit@coloredcow.in', '$2y$10$Zzoqmrnbn2gMb8HL71vVg.Y6fMH635v.udKDgyzThQ/qYH59PI1xm', 'Mohit Sharma', 1, '2020-02-14 07:50:40', '104180549202133054616', 1),
(136, 'mohitjagjit@gmail.com', '$2y$10$mLkVDwm8yoH4/jQVDIxaseagkeszQYV00EHCvFCCK5hgf.TbYjhGS', 'Mohit Sharma', 1, '2020-02-14 07:52:43', '', 1),
(137, 'kuldeepupreti3@gmail.com', '$2y$10$.2pBiI/bo5SPzq/X7TwzzewAvVMYo03MoSNroSfjvjswxZLmlvq7a', 'Kuldeep', 1, '2020-02-14 11:49:18', '', 1),
(138, 'sharm.manish7575@gmail.com', '$2y$10$F4BZcpdciXJqnNrhUo5kFeTodj1ip/f0FJXlyB0WVHVTL0oxJFl0G', 'Manish Sharma', 0, '2020-02-16 13:27:55', '', 1),
(139, 'sharma.manish7575@gmail.com', '$2y$10$RnZP5RlJLgEZrkZYMGowtu5biX7FVcv2Viw4Q3A.Kh0VJbXhComyi', 'Manish Sharma', 1, '2020-02-16 13:33:58', '100590295233713204603', 1),
(140, 'ms90051@gmail.com', '$2y$10$R3x3GyO3cVSPUWXOyraIVeTfLL9H3CkV2QxUOnCpTJS0SSIDrHj5W', 'Manish Sharma', 0, '2020-02-16 13:44:52', '', 1),
(141, 'divyanshujoshi.99@gmail.com', '$2y$10$FcP5n2aQmQb8XmBW.ezFIe27CgMI7xHbWt1RW4dGBsaUXVMs7PRw.', 'Divyanshu Joshi', 1, '2020-02-17 05:19:57', '', 1),
(142, 'abhishek@coloredcow.in', '$2y$10$pmffj6eZJnyjabrcX.rx3uCc8c2Vr6aPqFW3gUFxZ2x3M9n/GHTJe', 'Abhishek Sharma', 1, '2020-02-22 11:10:10', '110550047127608474491', 1),
(143, 'arcenmities@gmail.com', '$2y$10$myQ6ZZBHC/h4WiI77gMVBesD3/CD65EU.ZFtDRCDr3rAdmbisFXne', 'Kuldeep', 0, '2020-02-25 07:54:42', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `book_categories`
--
ALTER TABLE `book_categories`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `has_book`
--
ALTER TABLE `has_book`
  ADD KEY `uid` (`uid`),
  ADD KEY `bid` (`bid`);

--
-- Indexes for table `has_category`
--
ALTER TABLE `has_category`
  ADD KEY `bid` (`bid`),
  ADD KEY `cid` (`cid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `book_categories`
--
ALTER TABLE `book_categories`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `has_book`
--
ALTER TABLE `has_book`
  ADD CONSTRAINT `has_book_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`),
  ADD CONSTRAINT `has_book_ibfk_2` FOREIGN KEY (`bid`) REFERENCES `books` (`bid`);

--
-- Constraints for table `has_category`
--
ALTER TABLE `has_category`
  ADD CONSTRAINT `has_category_ibfk_1` FOREIGN KEY (`bid`) REFERENCES `books` (`bid`),
  ADD CONSTRAINT `has_category_ibfk_2` FOREIGN KEY (`cid`) REFERENCES `book_categories` (`cid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
