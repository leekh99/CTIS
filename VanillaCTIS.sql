-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2020 at 03:22 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `CTIS`
--

-- --------------------------------------------------------

--
-- Table structure for table `centreofficer`
--

CREATE TABLE `centreofficer` (
  `username` varchar(50) NOT NULL,
  `position` varchar(20) NOT NULL,
  `workplace` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `centreofficer`
--

INSERT INTO `centreofficer` (`username`, `position`, `workplace`) VALUES
('brownbutt', 'manager', 'TC02'),
('leekeathong', 'tester', 'TC01'),
('manager', 'manager', 'TC01'),
('manager2', 'manager', 'TC02'),
('tester', 'tester', 'TC01');

-- --------------------------------------------------------

--
-- Table structure for table `covidtest`
--

CREATE TABLE `covidtest` (
  `testID` varchar(20) NOT NULL,
  `testDate` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `result` varchar(50) NOT NULL,
  `resultDate` date NOT NULL,
  `recipient` varchar(50) NOT NULL,
  `tester` varchar(50) NOT NULL,
  `kitID` varchar(20) NOT NULL,
  `location` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `covidtest`
--

INSERT INTO `covidtest` (`testID`, `testDate`, `status`, `result`, `resultDate`, `recipient`, `tester`, `kitID`, `location`) VALUES
('CT01', '2020-10-16', 'pending', 'null', '0000-00-00', 'hamyiwah', 'leekeathong', 'tk01', 'TC02'),
('CT02', '2020-10-17', 'pending', 'null', '0000-00-00', 'rtd', 'brownbutt', 'tk01', 'TC02');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `username` varchar(50) NOT NULL,
  `patientType` varchar(20) NOT NULL,
  `symptoms` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`username`, `patientType`, `symptoms`) VALUES
('hamyiwah', 'Suspected', 'Diabetes, fever'),
('patient', 'returnee', 'Cough, Flu'),
('patient2', 'returnee', 'Fever, Cough'),
('rtd', 'Infected', 'High Fever, Vomiting');

-- --------------------------------------------------------

--
-- Table structure for table `testcentre`
--

CREATE TABLE `testcentre` (
  `centreID` varchar(20) NOT NULL,
  `centreName` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `testcentre`
--

INSERT INTO `testcentre` (`centreID`, `centreName`) VALUES
('TC01', 'SJMC'),
('TC02', 'Columbia Asia');

-- --------------------------------------------------------

--
-- Table structure for table `testkit`
--

CREATE TABLE `testkit` (
  `kitID` varchar(20) NOT NULL,
  `testName` varchar(250) NOT NULL,
  `availableStock` int(11) NOT NULL,
  `location` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `testkit`
--

INSERT INTO `testkit` (`kitID`, `testName`, `availableStock`, `location`) VALUES
('tk01', 'Antigen Test', 15, 'TC01'),
('tk02', 'Antigen Test', 50, 'TC02'),
('tk03', 'PCR', 20, 'TC01'),
('tk04', 'COVID-19 IgM/IgG Duo', 1, 'TC01'),
('tk05', 'Rapid Test Kit', 0, 'TC01');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='User table collating all user accounts';

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `name`) VALUES
('brownbutt', 'nom', 'Chng Jian Luk'),
('hamyiwah', 'kanninna', 'Kam Yik Wah'),
('leekeathong', 'shiden', 'Lee Keat Hong'),
('manager', 'manager', 'manager A'),
('manager2', 'manager2', 'manager B'),
('patient', 'patient', 'patient A'),
('patient2', 'patient2', 'patient B'),
('rtd', 'zululwarrior', 'Choo Jia Duan'),
('tester', 'tester', 'tester A');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `centreofficer`
--
ALTER TABLE `centreofficer`
  ADD PRIMARY KEY (`username`),
  ADD KEY `OfficerUsername` (`username`),
  ADD KEY `centreID` (`workplace`);

--
-- Indexes for table `covidtest`
--
ALTER TABLE `covidtest`
  ADD PRIMARY KEY (`testID`),
  ADD KEY `location` (`location`),
  ADD KEY `kitID` (`kitID`),
  ADD KEY `tester` (`tester`),
  ADD KEY `recipient` (`recipient`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`username`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `testcentre`
--
ALTER TABLE `testcentre`
  ADD PRIMARY KEY (`centreID`);

--
-- Indexes for table `testkit`
--
ALTER TABLE `testkit`
  ADD PRIMARY KEY (`kitID`,`location`),
  ADD KEY `stockLocation` (`location`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `centreofficer`
--
ALTER TABLE `centreofficer`
  ADD CONSTRAINT `officerUsername` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `workplace` FOREIGN KEY (`workplace`) REFERENCES `testcentre` (`centreID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `covidtest`
--
ALTER TABLE `covidtest`
  ADD CONSTRAINT `recipient` FOREIGN KEY (`recipient`) REFERENCES `patient` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `testLocation` FOREIGN KEY (`location`) REFERENCES `testcentre` (`centreID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tester` FOREIGN KEY (`tester`) REFERENCES `centreofficer` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tkID` FOREIGN KEY (`kitID`) REFERENCES `testkit` (`kitID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `Foreign key` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `testkit`
--
ALTER TABLE `testkit`
  ADD CONSTRAINT `location` FOREIGN KEY (`location`) REFERENCES `testcentre` (`centreID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
