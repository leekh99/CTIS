-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2020 at 11:56 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ctisv2`
--

-- --------------------------------------------------------

--
-- Table structure for table `centreofficer`
--

CREATE TABLE `centreofficer` (
  `username` varchar(50) NOT NULL,
  `position` varchar(12) NOT NULL,
  `workplaceID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `centreofficer`
--

INSERT INTO `centreofficer` (`username`, `position`, `workplaceID`) VALUES
('henry', 'tester', 1),
('james', 'manager', NULL),
('superuser', 'superAdmin', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `covidtest`
--

CREATE TABLE `covidtest` (
  `testID` int(12) NOT NULL,
  `testDate` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `result` varchar(50) DEFAULT NULL,
  `resultDate` date DEFAULT NULL,
  `recipient` varchar(50) DEFAULT NULL,
  `tester` varchar(50) NOT NULL,
  `kitID` int(12) DEFAULT NULL,
  `centreID` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `covidtest`
--

INSERT INTO `covidtest` (`testID`, `testDate`, `status`, `result`, `resultDate`, `recipient`, `tester`, `kitID`, `centreID`) VALUES
(24, '2020-11-21', 'complete', 'negative', '2020-11-21', 'Yaris', 'henry', 2, 1),
(25, '2020-11-21', 'complete', 'positive', '2020-11-21', 'Landra', 'henry', 2, 1),
(26, '2020-11-21', 'pending', NULL, NULL, 'Fan', 'blabla', 2, 1),
(27, '2020-11-21', 'pending', NULL, NULL, 'Cheun En', 'henry', 2, 1),
(28, '2020-11-21', 'pending', NULL, NULL, 'Pororo', 'henry', 2, 1),
(29, '2020-11-21', 'pending', NULL, NULL, 'try', 'henry', 2, 1),
(30, '2020-11-21', 'pending', NULL, NULL, 'Kororo', 'henry', 2, 1),
(31, '2020-11-21', 'pending', NULL, NULL, 'Dorro', 'henry', 2, 1),
(32, '2020-11-21', 'pending', NULL, NULL, 'yayy', 'henry', 2, 1),
(33, '2020-11-21', 'pending', NULL, NULL, 'kk', 'henry', 2, 1),
(34, '2020-11-21', 'complete', 'negative', '2020-11-21', 'q', 'henry', 2, 1),
(35, '2020-11-21', 'pending', NULL, NULL, 'll', 'henry', 2, 1),
(36, '2020-11-21', 'pending', NULL, NULL, 'Dorro', 'henry', 2, 1),
(37, '2020-11-21', 'pending', NULL, NULL, 'Dorro', 'henry', 2, 1),
(38, '2020-11-21', 'pending', NULL, NULL, 'Dorro', 'henry', 2, 1),
(39, '2020-11-21', 'pending', NULL, NULL, 'Dorro', 'henry', 2, 1),
(40, '2020-11-21', 'pending', NULL, NULL, 'Dorro', 'henry', 2, 1),
(41, '2020-11-21', 'pending', NULL, NULL, 'Dorro', 'henry', 2, 1),
(42, '2020-11-21', 'pending', NULL, NULL, 'Dorro', 'henry', 2, 1),
(43, '2020-11-21', 'pending', NULL, NULL, 'Dorro', 'henry', 2, 1),
(44, '2020-11-21', 'pending', NULL, NULL, 'Dorro', 'henry', 2, 1),
(45, '2020-11-21', 'pending', NULL, NULL, 'Dorro', 'henry', 4, 1),
(46, '2020-11-21', 'pending', NULL, NULL, 'Ganagaswaran', 'henry', 1, 1),
(47, '2020-11-21', 'pending', NULL, NULL, 'hannah', 'henry', 1, 1),
(48, '2020-11-21', 'pending', NULL, NULL, 'test', 'henry', 1, 1),
(49, '2020-11-22', 'pending', NULL, NULL, 'Kororo', 'henry', 2, 1),
(50, '2020-11-22', 'pending', NULL, NULL, 'Kororo', 'henry', 2, 1),
(51, '2020-11-22', 'pending', NULL, NULL, 'Kororo', 'henry', 2, 1),
(52, '2020-11-22', 'pending', NULL, NULL, 'Kororo', 'henry', 2, 1),
(53, '2020-11-22', 'pending', NULL, NULL, 'Kororo', 'henry', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `username` varchar(50) NOT NULL,
  `patientType` varchar(50) NOT NULL,
  `symptoms` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`username`, `patientType`, `symptoms`) VALUES
('Cheun En', 'returnee', 'Headache until cant sleep'),
('Dorro', 'returnee', 'blesss'),
('edison', 'returnee ', 'having a bad fever and some vomiting'),
('Fan', 'returnee', 'Stoamch ache'),
('Ganagaswaran', 'close_contact', 'pretty good'),
('hannah', 'suspected', '123'),
('kk', 'returnee', 'lkk'),
('Kororo', 'Returnee', 'qwe'),
('Landra', 'returnee', 'Difficulty in breathing'),
('ll', 'returnee', 'll'),
('Pororo', 'returnee', 'cold'),
('q', 'returnee', 'qq'),
('test', 'quarantined', 'test'),
('try', 'returnee', 'try'),
('Ukraine', 'quarantined ', 'having a serious headache and sore throat'),
('Yaris', 'returnee', 'having a bad fever of 41~c'),
('yayy', 'returnee', 'sya');

-- --------------------------------------------------------

--
-- Table structure for table `testcentre`
--

CREATE TABLE `testcentre` (
  `centreID` int(12) NOT NULL,
  `centreName` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `testkit`
--

CREATE TABLE `testkit` (
  `kitID` int(12) NOT NULL,
  `testName` varchar(50) NOT NULL,
  `availableStock` int(12) NOT NULL,
  `testCentreID` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testkit`
--

INSERT INTO `testkit` (`kitID`, `testName`, `availableStock`, `testCentreID`) VALUES
(1, 'ImmuSafe', 9, 1),
(2, 'SafeKit', 0, 1),
(3, 'kitty', 7, 2),
(4, 'Gsd-c', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `name`, `password`) VALUES
('Cheun En', 'Cheah', '123'),
('Dorro', 'dororo', '123'),
('edison', 'tan', '123'),
('Fan', 'Dong', '123'),
('Ganagaswaran', '123', '123'),
('hannah', '213', '123'),
('henry', 'yan', '123'),
('james', 'Landra', '123'),
('kk', 'kk', 'kk'),
('Kororo', 'tro', 'tro'),
('Landra', 'Alex', '123'),
('ll', 'll', 'll'),
('Pororo', 'rororo', '123'),
('q', 'q', 'q'),
('superuser', 'Admin', 'superuser'),
('test', 'test', 'test'),
('try', 'try', 'try'),
('Ukraine', 'landra', '123'),
('Yaris', 'Fin', '123'),
('yayy', 'yayy', 'yayy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `centreofficer`
--
ALTER TABLE `centreofficer`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `covidtest`
--
ALTER TABLE `covidtest`
  ADD PRIMARY KEY (`testID`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `testcentre`
--
ALTER TABLE `testcentre`
  ADD PRIMARY KEY (`centreID`);

--
-- Indexes for table `testkit`
--
ALTER TABLE `testkit`
  ADD PRIMARY KEY (`kitID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `covidtest`
--
ALTER TABLE `covidtest`
  MODIFY `testID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `testcentre`
--
ALTER TABLE `testcentre`
  MODIFY `centreID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `testkit`
--
ALTER TABLE `testkit`
  MODIFY `kitID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
