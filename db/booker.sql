-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 09, 2020 at 07:48 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `booker`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `bookid` int(11) NOT NULL,
  `bookname` varchar(100) DEFAULT NULL,
  `author` varchar(100) DEFAULT NULL,
  `dp` varchar(100) DEFAULT NULL,
  `status` varchar(123) DEFAULT 'Available',
  `bimage` varchar(200) DEFAULT NULL,
  `level` varchar(200) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`bookid`, `bookname`, `author`, `dp`, `status`, `bimage`, `level`, `category`) VALUES
(10, 'The kite Runner', 'Khaled Hosseini', '2020-02-03', 'Available', 'recong.jpg', 'higher education', 'Story book'),
(11, 'hwn', 'dhgh', '2020-02-12', 'Borrowed', 'images.jpeg', 'Secondary level', 'Reserved book'),
(12, 'The kite Runner', 'Khaled Hosseini', '2020-02-25', 'Available', 'kite.jpg', 'higher education', 'Novel book');

-- --------------------------------------------------------

--
-- Table structure for table `borrow`
--

CREATE TABLE `borrow` (
  `brid` int(11) NOT NULL,
  `learnerid` varchar(100) DEFAULT NULL,
  `bdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `bookid` varchar(100) DEFAULT NULL,
  `bookname` varchar(100) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `status` varchar(120) DEFAULT 'waiting'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `borrow`
--

INSERT INTO `borrow` (`brid`, `learnerid`, `bdate`, `bookid`, `bookname`, `location`, `status`) VALUES
(21, '4', '2020-03-08 18:08:09', '11', 'hwn', 'gjgjf', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `learner`
--

CREATE TABLE `learner` (
  `lid` int(11) NOT NULL,
  `lname` varchar(100) DEFAULT NULL,
  `levelofedu` varchar(100) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `penalty` varchar(200) DEFAULT 'inactive',
  `limage` varchar(120) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `learner`
--

INSERT INTO `learner` (`lid`, `lname`, `levelofedu`, `email`, `location`, `penalty`, `limage`, `password`) VALUES
(2, 'Test', 'Secondary level', 'KILONZOWAMBUA@gmail.com', 'Makueni', 'inactive', 'people-875617_640.jpg', '4028a0e356acc947fcd2bfbf00cef11e128d484a'),
(3, 'Monica', 'higher education', 'KILONZOWAMBUA@gmail.com', 'Machoks', 'inactive', 'MONICA.png', '4028a0e356acc947fcd2bfbf00cef11e128d484a'),
(4, 'test', 'Secondary level', 'test@test.com', 'gjgjf', 'inactive', 'student.jpg', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1'),
(5, 'test', 'Primary level', 'test@test.com', 'gjgjf', 'inactive', 'student.jpg', '63982e54a7aeb0d89910475ba6dbd3ca6dd4e5a1'),
(6, 'Kilonzo', 'Tetairaly level', 'kilozowambua@Gmail.com', 'Machakos', 'inactive', 'dumm1y_60x60.jpg', '2f85952390548024f03e174606493919cbf665f6'),
(7, 'Test', 'Secondary level', 'test1@test.com', 'Meru', 'active', 'user-placeholder.gif', '4028a0e356acc947fcd2bfbf00cef11e128d484a');

-- --------------------------------------------------------

--
-- Table structure for table `librarian`
--

CREATE TABLE `librarian` (
  `userid` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `pic` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `librarian`
--

INSERT INTO `librarian` (`userid`, `username`, `email`, `password`, `pic`) VALUES
(3, 'Owen', 'test@test.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'person_4.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`bookid`);

--
-- Indexes for table `borrow`
--
ALTER TABLE `borrow`
  ADD PRIMARY KEY (`brid`);

--
-- Indexes for table `learner`
--
ALTER TABLE `learner`
  ADD PRIMARY KEY (`lid`);

--
-- Indexes for table `librarian`
--
ALTER TABLE `librarian`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `bookid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `borrow`
--
ALTER TABLE `borrow`
  MODIFY `brid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `learner`
--
ALTER TABLE `learner`
  MODIFY `lid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `librarian`
--
ALTER TABLE `librarian`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
