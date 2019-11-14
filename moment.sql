-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2018 at 06:15 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moment`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookingorder`
--

CREATE TABLE `bookingorder` (
  `Id` int(11) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Amount` int(11) NOT NULL,
  `Contact` varchar(15) NOT NULL,
  `BookingDate` date NOT NULL,
  `ScheduleDate` date NOT NULL,
  `Comment` varchar(50) NOT NULL,
  `Category` varchar(50) NOT NULL,
  `SCategory` varchar(50) NOT NULL,
  `City` varchar(50) NOT NULL,
  `PId` int(11) NOT NULL,
  `Status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookingorder`
--

INSERT INTO `bookingorder` (`Id`, `Email`, `FirstName`, `LastName`, `Amount`, `Contact`, `BookingDate`, `ScheduleDate`, `Comment`, `Category`, `SCategory`, `City`, `PId`, `Status`) VALUES
(1, 'Harshk9shah@gmail.com', 'Harsh', 'Shah', 10000, '9727877500', '2018-05-05', '2018-05-06', 'Nothing', 'Wedding', 'Pre-Wedding', 'Mumbai', 0, 'Pending'),
(2, 'Harshk9shah@gmail.com', 'Harsh', 'Shah', 10000, '9727877500', '2018-05-05', '2018-05-06', 'Nothing', 'Travel', 'Adventure', 'Bardoli', 3, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `CategoryId` int(11) NOT NULL,
  `CategoryName` varchar(50) NOT NULL,
  `CategoryDesc` varchar(100) NOT NULL,
  `Status` varchar(8) NOT NULL,
  `Icon` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CategoryId`, `CategoryName`, `CategoryDesc`, `Status`, `Icon`) VALUES
(1, 'Wedding', 'Shadi like enjoyment.', 'Active', 'fa fa-heartbeat'),
(2, 'Event', 'Event make memory perfect', 'Active', 'fa fa-group'),
(3, 'Travel', 'Travel is important in life.', 'Active', 'fa fa-plane');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `CityId` int(11) NOT NULL,
  `CityName` varchar(50) NOT NULL,
  `StateId` int(11) NOT NULL,
  `Status` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`CityId`, `CityName`, `StateId`, `Status`) VALUES
(1, 'Surat', 1, 'Active'),
(2, 'Bardoli', 1, 'Active'),
(3, 'Mumbai', 2, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `contest`
--

CREATE TABLE `contest` (
  `ContestId` int(11) NOT NULL,
  `ContestName` varchar(100) NOT NULL,
  `StartDate` date NOT NULL,
  `EndDate` date NOT NULL,
  `ContestImage` varchar(100) NOT NULL,
  `Status` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contest`
--

INSERT INTO `contest` (`ContestId`, `ContestName`, `StartDate`, `EndDate`, `ContestImage`, `Status`) VALUES
(1, 'Click', '2018-05-05', '2018-05-06', 'IMG_05052018_012229_.jpg', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `CountryId` int(11) NOT NULL,
  `CountryName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`CountryId`, `CountryName`) VALUES
(1, 'India');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `Id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Suggestion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hgallery`
--

CREATE TABLE `hgallery` (
  `Id` int(11) NOT NULL,
  `Path` varchar(100) NOT NULL,
  `Type` varchar(100) NOT NULL,
  `Status` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hgallery`
--

INSERT INTO `hgallery` (`Id`, `Path`, `Type`, `Status`) VALUES
(1, 'IMG_05052018_011720_1.jpg', 'Wedding', 'Active'),
(2, 'IMG_05052018_011749_1.jpg', 'Wedding', 'Active'),
(3, 'IMG_05052018_011908_3.jpg', 'Travel', 'Active'),
(4, 'IMG_05052018_011908_3.jpg', 'Travel', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `maingallery`
--

CREATE TABLE `maingallery` (
  `Id` int(11) NOT NULL,
  `Path` varchar(100) NOT NULL,
  `Status` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `maingallery`
--

INSERT INTO `maingallery` (`Id`, `Path`, `Status`) VALUES
(1, 'IMG_05052018_012111_1.jpg', 'Active'),
(2, 'IMG_05052018_012111_2.jpg', 'Active'),
(3, 'IMG_05052018_012111_3.jpg', 'Active'),
(4, 'IMG_05052018_012111_4.jpg', 'Active'),
(5, 'IMG_05052018_012111_5.jpg', 'Active'),
(6, 'IMG_05052018_012146_1.jpg', 'Active'),
(7, 'IMG_05052018_012146_2.jpg', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `participant`
--

CREATE TABLE `participant` (
  `ContestId` int(11) NOT NULL,
  `ParticipantId` int(11) NOT NULL,
  `ParticipantEmail` varchar(30) NOT NULL,
  `ParticipantFName` varchar(20) NOT NULL,
  `ParticipantLName` varchar(20) NOT NULL,
  `ParticipantCity` varchar(20) NOT NULL,
  `img1` varchar(50) NOT NULL,
  `img2` varchar(50) NOT NULL,
  `img3` varchar(50) NOT NULL,
  `Winner` varchar(15) NOT NULL,
  `Status` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `photographerdata`
--

CREATE TABLE `photographerdata` (
  `Id` int(11) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Contact` varchar(15) NOT NULL,
  `BirthDate` date NOT NULL,
  `Qualification` varchar(50) NOT NULL,
  `About` varchar(200) NOT NULL,
  `City` varchar(50) NOT NULL,
  `Interest` varchar(100) NOT NULL,
  `PImage` varchar(100) NOT NULL,
  `Qr` varchar(100) NOT NULL,
  `JoinDate` date NOT NULL,
  `Status` varchar(100) NOT NULL,
  `Verification` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `photographerdata`
--

INSERT INTO `photographerdata` (`Id`, `Email`, `FirstName`, `LastName`, `Password`, `Contact`, `BirthDate`, `Qualification`, `About`, `City`, `Interest`, `PImage`, `Qr`, `JoinDate`, `Status`, `Verification`) VALUES
(1, 'Jenilsharma111@gmail.com  ', 'Jenil', 'Sharma', '55555555', '9727877500  ', '1996-10-25', 'MscIT  ', 'Perfection Is My Destination..', 'Bardoli', 'Wedding,Travel', 'h10.jpg', 'Jenilsharma111%40gmail.com', '2018-05-05', 'Active', 'Approved'),
(2, 'Harshkshah06@gmail.com  ', 'Hash  ', 'Naik ', '22222222', '9727877500  ', '1992-08-02', 'BCA  ', 'Done Job Perfectly', 'Mumbai', 'Wedding,Archietecture', 'h8.jpg', 'Harshkshah06%40gmail.com', '2018-05-05', 'Active', 'Approved'),
(3, 'Karan2310jariwala@gmail.com  ', 'Karan  ', 'Jariwala ', '33333333', '9727877500  ', '1997-06-17', 'Mca  ', 'Nice', 'Mumbai', 'Travel', 'avatar.jpg', 'Karan2310jariwala%40gmail.com', '2018-05-05', 'Active', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `photographerimage`
--

CREATE TABLE `photographerimage` (
  `ImageId` int(11) NOT NULL,
  `Path` varchar(100) NOT NULL,
  `PhotographerId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `photographerimage`
--

INSERT INTO `photographerimage` (`ImageId`, `Path`, `PhotographerId`) VALUES
(1, 'h8.jpg', 1),
(3, 'h1.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ratting`
--

CREATE TABLE `ratting` (
  `Id` int(11) NOT NULL,
  `Rating` int(11) NOT NULL,
  `PId` int(11) NOT NULL,
  `CId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ratting`
--

INSERT INTO `ratting` (`Id`, `Rating`, `PId`, `CId`) VALUES
(1, 4, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `Id` int(11) NOT NULL,
  `PId` int(11) NOT NULL,
  `ScheduleDate` date NOT NULL,
  `BId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`Id`, `PId`, `ScheduleDate`, `BId`) VALUES
(1, 3, '2018-05-06', 2);

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `StateId` int(11) NOT NULL,
  `StateName` varchar(100) NOT NULL,
  `CountryId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`StateId`, `StateName`, `CountryId`) VALUES
(1, 'Gujrat', 1),
(2, 'Maharashtra', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `SCategoryId` int(11) NOT NULL,
  `CategoryId` int(11) NOT NULL,
  `CategoryName` varchar(50) NOT NULL,
  `SCategoryName` varchar(50) NOT NULL,
  `INR` int(11) NOT NULL,
  `Icon` varchar(50) NOT NULL,
  `Status` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`SCategoryId`, `CategoryId`, `CategoryName`, `SCategoryName`, `INR`, `Icon`, `Status`) VALUES
(1, 1, 'Wedding', 'Full-Package', 50000, 'fa fa-cubes', 'Active'),
(2, 3, 'Travel', 'Adventure', 10000, 'fa fa-plane', 'Active'),
(3, 1, 'Wedding', 'Pre-Wedding', 10000, 'fa fa-heartbeat', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE `userdata` (
  `Id` int(11) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Password` varchar(60) NOT NULL,
  `Contact` varchar(15) NOT NULL,
  `Birthdate` date NOT NULL,
  `City` varchar(50) NOT NULL,
  `PImage` varchar(100) NOT NULL,
  `JoinDate` date NOT NULL,
  `Status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userdata`
--

INSERT INTO `userdata` (`Id`, `Email`, `FirstName`, `LastName`, `Password`, `Contact`, `Birthdate`, `City`, `PImage`, `JoinDate`, `Status`) VALUES
(1, 'Harshk9shah@gmail.com', 'Harsh', 'Shah', '99999999', '9727877500', '1996-10-06', 'Surat', 'm1.jpg', '2018-05-05', 'Active'),
(4, 'Rajgandhi214.rg@gmail.com', 'Raj', 'Gandhi', '88888888', '9913165711', '1997-06-17', 'Mumbai', 'h10.jpg', '2018-05-05', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookingorder`
--
ALTER TABLE `bookingorder`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CategoryId`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`CityId`);

--
-- Indexes for table `contest`
--
ALTER TABLE `contest`
  ADD PRIMARY KEY (`ContestId`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`CountryId`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `hgallery`
--
ALTER TABLE `hgallery`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `maingallery`
--
ALTER TABLE `maingallery`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `participant`
--
ALTER TABLE `participant`
  ADD PRIMARY KEY (`ParticipantId`);

--
-- Indexes for table `photographerdata`
--
ALTER TABLE `photographerdata`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `photographerimage`
--
ALTER TABLE `photographerimage`
  ADD PRIMARY KEY (`ImageId`);

--
-- Indexes for table `ratting`
--
ALTER TABLE `ratting`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`StateId`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`SCategoryId`);

--
-- Indexes for table `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookingorder`
--
ALTER TABLE `bookingorder`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `CategoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `CityId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contest`
--
ALTER TABLE `contest`
  MODIFY `ContestId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `CountryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hgallery`
--
ALTER TABLE `hgallery`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `maingallery`
--
ALTER TABLE `maingallery`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `participant`
--
ALTER TABLE `participant`
  MODIFY `ParticipantId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `photographerdata`
--
ALTER TABLE `photographerdata`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `photographerimage`
--
ALTER TABLE `photographerimage`
  MODIFY `ImageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ratting`
--
ALTER TABLE `ratting`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `StateId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `SCategoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `userdata`
--
ALTER TABLE `userdata`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
