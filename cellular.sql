-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 07, 2016 at 01:06 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cellular`
--

-- --------------------------------------------------------

--
-- Table structure for table `Contract`
--

CREATE TABLE `Contract` (
  `Contract_ID` smallint(6) NOT NULL,
  `Start_Date` datetime(3) NOT NULL,
  `End_Date` datetime(3) NOT NULL,
  `Customer_ID` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Customer`
--

CREATE TABLE `Customer` (
  `Customer_ID` smallint(6) NOT NULL,
  `Customer_FName` char(30) NOT NULL,
  `Customer_Lname` char(30) NOT NULL,
  `Phone_Number` char(10) NOT NULL,
  `Family_Plan` tinyint(4) DEFAULT NULL,
  `Family_PlanID` smallint(6) DEFAULT NULL,
  `Customer_Type` char(4) DEFAULT NULL,
  `Usage_Alert` tinyint(4) DEFAULT NULL,
  `Plan_ID` smallint(6) NOT NULL,
  `Employee_ID` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Customer`
--

INSERT INTO `Customer` (`Customer_ID`, `Customer_FName`, `Customer_Lname`, `Phone_Number`, `Family_Plan`, `Family_PlanID`, `Customer_Type`, `Usage_Alert`, `Plan_ID`, `Employee_ID`) VALUES
(1, 'Arpit', 'Rawatt', '8574004535', 1, 1101, 'P', 0, 1, 1),
(2, 'Gurtej Singh', 'Khanooja', '8574004536', 1, 1101, 'P', 0, 1, 1),
(3, 'Saurabh Singh', 'Vaidhya', '8622349861', 1, 1102, 'P', 0, 1, 1),
(4, 'Shasank', 'Patro', '8122349555', 1, 1101, 'S', 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Data`
--

CREATE TABLE `Data` (
  `Data_ID` int(11) NOT NULL,
  `Date` date DEFAULT NULL,
  `Data_Usage` smallint(6) DEFAULT NULL,
  `Tower_ID` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Employee`
--

CREATE TABLE `Employee` (
  `Employee_ID` smallint(6) NOT NULL,
  `Employee_FName` varchar(40) DEFAULT NULL,
  `Employee_Lname` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Employee`
--

INSERT INTO `Employee` (`Employee_ID`, `Employee_FName`, `Employee_Lname`) VALUES
(1, 'John', 'Cash');

-- --------------------------------------------------------

--
-- Table structure for table `Equipment`
--

CREATE TABLE `Equipment` (
  `IMEI` char(15) NOT NULL,
  `EquipmentBrand` varchar(20) DEFAULT NULL,
  `ModelNumber` varchar(20) DEFAULT NULL,
  `Customer_ID` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Payment`
--

CREATE TABLE `Payment` (
  `Customer_ID` smallint(6) NOT NULL,
  `Card_Type` varchar(10) NOT NULL,
  `Card_Number` char(16) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Verification_Document` varchar(30) NOT NULL,
  `City` varchar(25) NOT NULL,
  `State` char(2) NOT NULL,
  `Zip` char(5) DEFAULT NULL,
  `Tax` decimal(15,4) DEFAULT NULL,
  `Total_Cost` decimal(15,4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Plans`
--

CREATE TABLE `Plans` (
  `Plan_ID` smallint(6) NOT NULL,
  `Plan_Name` varchar(10) NOT NULL,
  `Plan_Cost` decimal(15,4) NOT NULL,
  `Minutes` smallint(6) NOT NULL,
  `Messages` smallint(6) NOT NULL,
  `Data` smallint(6) NOT NULL,
  `Lines` tinyint(3) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Plans`
--

INSERT INTO `Plans` (`Plan_ID`, `Plan_Name`, `Plan_Cost`, `Minutes`, `Messages`, `Data`, `Lines`) VALUES
(1, 'S', '0.0000', 100, 500, 100, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Text`
--

CREATE TABLE `Text` (
  `Text_ID` smallint(6) NOT NULL,
  `Text_Date` date NOT NULL,
  `Text_Time` time(6) NOT NULL,
  `Text_Number` char(10) NOT NULL,
  `Text_Log` char(1) DEFAULT NULL,
  `Text_International` tinyint(4) DEFAULT NULL,
  `Customer_ID` smallint(6) NOT NULL,
  `Tower_ID` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Tower`
--

CREATE TABLE `Tower` (
  `Tower_ID` smallint(6) NOT NULL,
  `Longitude` varchar(30) DEFAULT NULL,
  `Latitude` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Usuage`
--

CREATE TABLE `Usuage` (
  `Usage_ID` int(11) NOT NULL,
  `Start_Date` date NOT NULL,
  `End_Date` date DEFAULT NULL,
  `Num_Text_Received` smallint(6) DEFAULT NULL,
  `Num_Text_Sent` smallint(6) DEFAULT NULL,
  `Data_Usage` smallint(6) DEFAULT NULL,
  `Incomming_Calls` smallint(6) DEFAULT NULL,
  `Outgoing_Calls` smallint(6) DEFAULT NULL,
  `Customer_ID` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Voice`
--

CREATE TABLE `Voice` (
  `Voice_ID` smallint(6) NOT NULL,
  `Voice_Number` char(10) NOT NULL,
  `Voice_Date` date NOT NULL,
  `Start_Time` time(6) NOT NULL,
  `End_Time` time(6) NOT NULL,
  `Duration` smallint(6) DEFAULT NULL,
  `Voice_International` tinyint(4) DEFAULT NULL,
  `Voice_Log` char(1) DEFAULT NULL,
  `Customer_ID` smallint(6) NOT NULL,
  `Tower_ID` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Contract`
--
ALTER TABLE `Contract`
  ADD PRIMARY KEY (`Contract_ID`),
  ADD KEY `Customer_ID FK to Contract` (`Customer_ID`);

--
-- Indexes for table `Customer`
--
ALTER TABLE `Customer`
  ADD PRIMARY KEY (`Customer_ID`),
  ADD KEY `Plan_ID FK to Customer` (`Plan_ID`),
  ADD KEY `Employee_ID FK to Customer` (`Employee_ID`);

--
-- Indexes for table `Data`
--
ALTER TABLE `Data`
  ADD PRIMARY KEY (`Data_ID`),
  ADD KEY `Tower_ID FK to Data` (`Tower_ID`);

--
-- Indexes for table `Employee`
--
ALTER TABLE `Employee`
  ADD PRIMARY KEY (`Employee_ID`);

--
-- Indexes for table `Equipment`
--
ALTER TABLE `Equipment`
  ADD PRIMARY KEY (`IMEI`),
  ADD KEY `Customer_ID FK to Equipment` (`Customer_ID`);

--
-- Indexes for table `Payment`
--
ALTER TABLE `Payment`
  ADD PRIMARY KEY (`Customer_ID`);

--
-- Indexes for table `Plans`
--
ALTER TABLE `Plans`
  ADD PRIMARY KEY (`Plan_ID`);

--
-- Indexes for table `Text`
--
ALTER TABLE `Text`
  ADD PRIMARY KEY (`Text_ID`),
  ADD KEY `Customer_ID FK to Text` (`Customer_ID`),
  ADD KEY `Tower_ID FK to Text` (`Tower_ID`);

--
-- Indexes for table `Tower`
--
ALTER TABLE `Tower`
  ADD PRIMARY KEY (`Tower_ID`);

--
-- Indexes for table `Usuage`
--
ALTER TABLE `Usuage`
  ADD PRIMARY KEY (`Usage_ID`),
  ADD KEY `Customer_ID PFK to Usage` (`Customer_ID`);

--
-- Indexes for table `Voice`
--
ALTER TABLE `Voice`
  ADD PRIMARY KEY (`Voice_ID`),
  ADD KEY `Customer_ID FK to Voice` (`Customer_ID`),
  ADD KEY `Tower_ID FK to Voice` (`Tower_ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Contract`
--
ALTER TABLE `Contract`
  ADD CONSTRAINT `Customer_ID FK to Contract` FOREIGN KEY (`Customer_ID`) REFERENCES `Customer` (`Customer_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Customer`
--
ALTER TABLE `Customer`
  ADD CONSTRAINT `Employee_ID FK to Customer` FOREIGN KEY (`Employee_ID`) REFERENCES `Employee` (`Employee_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `Plan_ID FK to Customer` FOREIGN KEY (`Plan_ID`) REFERENCES `Plans` (`Plan_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Data`
--
ALTER TABLE `Data`
  ADD CONSTRAINT `Tower_ID FK to Data` FOREIGN KEY (`Tower_ID`) REFERENCES `Tower` (`Tower_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Equipment`
--
ALTER TABLE `Equipment`
  ADD CONSTRAINT `Customer_ID FK to Equipment` FOREIGN KEY (`Customer_ID`) REFERENCES `Customer` (`Customer_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Payment`
--
ALTER TABLE `Payment`
  ADD CONSTRAINT `Customer_ID PFK to Payment` FOREIGN KEY (`Customer_ID`) REFERENCES `Customer` (`Customer_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Text`
--
ALTER TABLE `Text`
  ADD CONSTRAINT `Customer_ID FK to Text` FOREIGN KEY (`Customer_ID`) REFERENCES `Customer` (`Customer_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `Tower_ID FK to Text` FOREIGN KEY (`Tower_ID`) REFERENCES `Tower` (`Tower_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Usuage`
--
ALTER TABLE `Usuage`
  ADD CONSTRAINT `Customer_ID PFK to Usage` FOREIGN KEY (`Customer_ID`) REFERENCES `Customer` (`Customer_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Voice`
--
ALTER TABLE `Voice`
  ADD CONSTRAINT `Customer_ID FK to Voice` FOREIGN KEY (`Customer_ID`) REFERENCES `Customer` (`Customer_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `Tower_ID FK to Voice` FOREIGN KEY (`Tower_ID`) REFERENCES `Tower` (`Tower_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
