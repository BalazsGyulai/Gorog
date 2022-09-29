-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2022 at 04:40 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `greecesite`
--

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `questId` int(11) NOT NULL,
  `quest` varchar(255) NOT NULL,
  `yes` varchar(255) NOT NULL,
  `no` varchar(255) NOT NULL,
  `dont_know` varchar(255) NOT NULL,
  `publish` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`questId`, `quest`, `yes`, `no`, `dont_know`, `publish`) VALUES
(13, 'Black', 'yes', '17:9:17:427', 'idk', 1),
(14, 'Black', '0', '0', '0', 1),
(15, 'Black', '0', '17:12:46:368', '0', 1),
(16, 'Black', '17:13:1:201', 'no', '0', 1),
(17, 'White', '17:21:50:430', '0', '17:21:54:924', 1),
(18, 'White', '0', '17:22:7:464', '0', 1),
(19, 'White', '17:22:24:822', 'no', '0', 0),
(20, 'White', '0', 'no', '0', 0),
(21, 'White', '0', '0', '0', 0),
(22, 'White', '0', '17:24:36:181', '0', 0),
(23, 'White', '0', 'no', '17:24:44:648', 0),
(24, 'White', '17:24:53:808', 'no', 'idk', 0),
(25, 'Alma', 'yes', 'no', 'idk', 0),
(26, 'Alma', 'yes\"', 'no', 'idk', 1),
(27, 'Alma', '17:30:0:247', '0', '17:30:1:448', 1),
(28, 'Alma', '0', '0', '17:30:1:448', 1),
(29, 'Alma', '17:30:15:923', '0', '17:30:1:448', 1),
(30, 'Alma', '17:30:44:477', '0', '17:30:1:448', 1),
(31, 'Alma', '17:30:44:477\"', '17:31:27:95', '17:30:1:448', 1),
(32, 'Alma', '0', '17:31:27:95', '17:30:1:448', 1),
(33, 'Alma', '17:37:14:620', '17:31:27:95', '17:30:1:448', 1),
(34, 'Alma', '17:37:14:620\"', '0', '0', 1),
(35, 'a;lsdbpiadsjfiuadbf', '17:37:14:620\"\"', '0', '17:37:53:358', 1),
(36, 'a;lsdbpiadsjfiuadbf', '0', '17:38:13:992', '17:37:53:358', 1),
(37, 'a;lsdbpiadsjfiuadbf', '17:40:15:513', '17:38:13:992', '17:37:53:358', 1);

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `voteId` int(255) NOT NULL,
  `questId` int(255) NOT NULL,
  `yes` int(255) NOT NULL,
  `no` int(255) NOT NULL,
  `dont_know` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`voteId`, `questId`, `yes`, `no`, `dont_know`) VALUES
(2, 4, 1, 3, 0),
(3, 8, 5, 4, 1),
(4, 26, 8, 0, 0),
(5, 32, 3, 4, 0),
(6, 35, 8, 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`questId`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`voteId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `questId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `voteId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
