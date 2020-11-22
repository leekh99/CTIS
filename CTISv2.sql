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
('superuser', 'Admin', 'superuser');

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
