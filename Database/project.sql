-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2020 at 09:10 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `aname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` text NOT NULL,
  `dob` text NOT NULL,
  `gender` text NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fname`, `mname`, `lname`, `aname`, `email`, `mobile`, `dob`, `gender`, `password`) VALUES
(1, 'Aranga', 'AK', 'Nathan', 'Aranga5123', 'aranga5123@gmail.com', '7826856074', '09/05/1994', 'Male', '51235123'),
(2, 'gowth', 'bhat', 'admin', 'gowth1', 'adsd3@gmail.com', '1234561234', '2018-11-30', 'Others', '123456789'),
(3, 'fddfdsf', '', 'sdfsdf', 'sdfsdfsdf', 'sdfsd@dffgh.gg', '9876987656', '2018-11-14', 'Male', '123123123');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(10) NOT NULL,
  `uname` varchar(100) NOT NULL,
  `pnr` int(225) NOT NULL,
  `customer` varchar(100) NOT NULL,
  `no` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `departure` text NOT NULL,
  `d_time` text NOT NULL,
  `arrival` text NOT NULL,
  `a_time` text NOT NULL,
  `date` text NOT NULL,
  `adult` int(10) DEFAULT NULL,
  `child` int(10) DEFAULT NULL,
  `seats` int(10) NOT NULL,
  `email` text NOT NULL,
  `dob` text NOT NULL,
  `gender` text NOT NULL,
  `price` int(10) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `uname`, `pnr`, `customer`, `no`, `name`, `departure`, `d_time`, `arrival`, `a_time`, `date`, `adult`, `child`, `seats`, `email`, `dob`, `gender`, `price`, `status`) VALUES
(9, 'Aranga5123', 2814, 'Aranga AK Nathan', 555123, 'Ai Airw', 'Chennai', '02:00', 'Salem', '17:00', '2018-11-13', 3, 3, 6, 'aranga5123@gmail.com', '09/05/1994', 'Male', 72000, 'Booked'),
(10, 'Aranga5123', 1368, 'Aranga AK Nathan', 5123, 'jet', 'Chennai', '03:21', 'Salem', '03:12', '2018-11-14', 1, 1, 2, 'aranga5123@gmail.com', '09/05/1994', 'Male', 2000, 'Booked'),
(11, 'Aranga5123', 903, 'Aranga AK Nathan', 555123, 'Ai Airw', 'Chennai', '02:00', 'Salem', '17:00', '2018-11-23', 2, 2, 4, 'aranga5123@gmail.com', '09/05/1994', 'Male', 48000, 'Booked'),
(49, 'gowth', 1266, 'gowth bhat user', 5123, 'jet', 'Chennai', '03:21', 'banglore', '03:12', '2020-04-10', 1, 0, 1, '213123@fgdf.jhjhj', '2018-11-07', 'Male', 1000, 'Booked'),
(50, 'gowth', 1962, 'gowth bhat user', 233, 'reliance jet', 'kochi', '14:34', 'nepal', '15:43', '2020-05-06', 1, 0, 1, '213123@fgdf.jhjhj', '2018-11-07', 'Male', 500, 'Booked'),
(51, 'gowth', 1878, 'gowth bhat user', 233, 'reliance jet', 'kochi', '14:34', 'nepal', '15:43', '2020-05-06', 1, 0, 1, '213123@fgdf.jhjhj', '2018-11-07', 'Male', 500, 'Booked'),
(52, 'gowth', 2139, 'gowth bhat user', 5123, 'jet', 'Chennai', '03:21', 'banglore', '03:12', '2020-05-14', 1, 0, 1, '213123@fgdf.jhjhj', '2018-11-07', 'Male', 1000, 'Booked'),
(53, 'gowth', 873, 'gowth bhat user', 5123, 'jet', 'Chennai', '03:21', 'banglore', '03:12', '2020-04-02', 1, 0, 1, '213123@fgdf.jhjhj', '2018-11-07', 'Male', 1000, 'Booked'),
(54, 'gowth', 1452, 'gowth bhat user', 5123, 'jet', 'Chennai', '03:21', 'banglore', '03:12', '2020-04-07', 1, 0, 1, '213123@fgdf.jhjhj', '2018-11-07', 'Male', 1000, 'Booked'),
(55, 'gowth', 303, 'gowth bhat user', 5123, 'jet', 'Chennai', '03:21', 'banglore', '03:12', '2020-05-05', 2, 0, 2, '213123@fgdf.jhjhj', '2018-11-07', 'Male', 2000, 'Booked'),
(56, 'gowth', 1644, 'gowth bhat user', 5123, 'jet', 'Chennai', '03:21', 'banglore', '03:12', '2020-07-08', 1, 0, 1, '213123@fgdf.jhjhj', '2018-11-07', 'Male', 1000, 'Booked'),
(57, 'gowth', 2010, 'gowth bhat user', 7, 'gowths grand', 'konandur', '04:06', 'thirthahalli', '03:05', '2020-11-11', 6, 9, 15, '213123@fgdf.jhjhj', '2018-11-07', 'Male', 15000, 'Booked'),
(58, 'gowth', 1287, 'gowth bhat user', 5123, 'jet', 'Chennai', '03:21', 'banglore', '03:12', '2020-12-11', 2, 2, 4, '213123@fgdf.jhjhj', '2018-11-07', 'Male', 4000, 'Booked'),
(59, 'gowth', 2130, 'gowth bhat user', 354, 'black hawk', 'banglore', '04:34', 'mumbai', '18:07', '2020-07-17', 2, 1, 3, '213123@fgdf.jhjhj', '2018-11-07', 'Male', 1029, 'Booked'),
(60, 'gowth', 2838, 'gowth bhat user', 5123, 'jet', 'Chennai', '03:21', 'banglore', '03:12', '2020-06-15', 3, 1, 4, '213123@fgdf.jhjhj', '2018-11-07', 'Male', 4000, 'Booked'),
(61, 'gowth', 615, 'gowth bhat user', 5123, 'jet', 'Chennai', '03:21', 'banglore', '03:12', '2021-04-06', 3, 3, 6, '213123@fgdf.jhjhj', '2018-11-07', 'Male', 6000, 'Booked'),
(62, 'gowth', 1572, 'gowth bhat user', 5123, 'jet', 'Chennai', '03:21', 'banglore', '03:12', '2021-01-06', 1, 2, 3, '213123@fgdf.jhjhj', '2018-11-07', 'Male', 3000, 'Booked');

-- --------------------------------------------------------

--
-- Table structure for table `cancel`
--

CREATE TABLE `cancel` (
  `id` int(10) NOT NULL,
  `uname` varchar(100) NOT NULL,
  `pnr` int(225) NOT NULL,
  `customer` varchar(100) NOT NULL,
  `no` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `departure` text NOT NULL,
  `d_time` text NOT NULL,
  `arrival` text NOT NULL,
  `a_time` text NOT NULL,
  `date` text NOT NULL,
  `adult` int(10) NOT NULL,
  `child` int(10) NOT NULL,
  `seats` int(10) NOT NULL,
  `email` text NOT NULL,
  `dob` text NOT NULL,
  `gender` text NOT NULL,
  `price` int(10) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cancel`
--

INSERT INTO `cancel` (`id`, `uname`, `pnr`, `customer`, `no`, `name`, `departure`, `d_time`, `arrival`, `a_time`, `date`, `adult`, `child`, `seats`, `email`, `dob`, `gender`, `price`, `status`) VALUES
(4, 'Aranga5123', 2205, 'Aranga AK Nathan', 555123, 'Ai Airw', 'Chennai', '02:00', 'Salem', '17:00', '2018-11-07', 8, 8, 16, 'aranga5123@gmail.com', '09/05/1994', 'Male', 192000, 'Cancel'),
(5, 'Aranga5123', 1566, 'Aranga AK Nathan', 123, 'Ai Jets', 'America', '02:00', 'China', '17:00', '2018-11-22', 3, 1, 4, 'aranga5123@gmail.com', '09/05/1994', 'Male', 48000, 'Cancel'),
(6, 'Aranga5123', 1323, 'Aranga AK Nathan', 123, 'asda', 'sadasd', '14:13', 'sds', '01:12', '2018-11-14', 7, 10, 10, 'aranga5123@gmail.com', '09/05/1994', 'Male', 204000, 'Cancel'),
(7, 'Aranga5123', 276, 'Aranga AK Nathan', 555, 'Ai Airways', 'Chennai', '02:00', 'Salem', '17:00', '2018-11-22', 2, 2, 4, 'aranga5123@gmail.com', '09/05/1994', 'Male', 48000, 'Cancel'),
(8, 'Aranga5123', 54, 'Aranga AK Nathan', 123, 'Ai Jets', 'America', '02:00', 'China', '17:00', '2018-11-14', 1, -2, -1, 'aranga5123@gmail.com', '09/05/1994', 'Male', -12000, 'Cancel'),
(9, 'Aranga5123', 2589, 'Aranga AK Nathan', 5123, 'jet', 'Chennai', '03:21', 'Salem', '03:12', '2018-11-12', 1, 2, 3, 'aranga5123@gmail.com', '09/05/1994', 'Male', 3000, 'Cancel'),
(10, 'Aranga5123', 783, 'Aranga AK Nathan', 555123, 'Ai Airw', 'Chennai', '02:00', 'Salem', '17:00', '2018-11-07', 3, 3, 6, 'aranga5123@gmail.com', '09/05/1994', 'Male', 72000, 'Cancel'),
(14, 'gowth', 1035, 'gowth bhat user', 354, '4535', '45354', '04:34', '43545', '18:07', '2020-03-03', 1, -3, -2, '213123@fgdf.jhjhj', '2018-11-07', 'Male', -686, 'Cancel'),
(23, 'gowth', 1572, 'gowth bhat user', 5123, 'jet', 'Chennai', '03:21', 'banglore', '03:12', '2020-06-12', 1, 0, 1, '213123@fgdf.jhjhj', '2018-11-07', 'Male', 1000, 'Cancel'),
(24, 'gowth', 30, 'gowth bhat user', 354, 'black hawk', 'banglore', '04:34', 'mumbai', '18:07', '2020-04-01', 1, 1, 2, '213123@fgdf.jhjhj', '2018-11-07', 'Male', 686, 'Cancel'),
(25, 'gowth', 1335, 'gowth bhat user', 354, 'black hawk', 'banglore', '04:34', 'mumbai', '18:07', '2020-06-17', 2, 1, 3, '213123@fgdf.jhjhj', '2018-11-07', 'Male', 1029, 'Cancel'),
(26, 'gowth', 1089, 'gowth bhat user', 354, 'black hawk', 'banglore', '04:34', 'mumbai', '18:07', '2020-07-14', 1, 1, 2, '213123@fgdf.jhjhj', '2018-11-07', 'Male', 686, 'Cancel'),
(27, 'gowth', 624, 'gowth bhat user', 5123, 'jet', 'Chennai', '03:21', 'banglore', '03:12', '2020-04-08', 1, 1, 2, '213123@fgdf.jhjhj', '2018-11-07', 'Male', 2000, 'Cancel'),
(28, 'gowth', 1989, 'gowth bhat user', 5123, 'jet', 'Chennai', '03:21', 'banglore', '03:12', '2020-03-14', 1, 1, 2, '213123@fgdf.jhjhj', '2018-11-07', 'Male', 2000, 'Cancel'),
(29, 'gowth', 162, 'gowth bhat user', 5123, 'jet', 'Chennai', '03:21', 'banglore', '03:12', '2020-04-01', 2, 1, 3, '213123@fgdf.jhjhj', '2018-11-07', 'Male', 3000, 'Cancel'),
(30, 'gowth', 2469, 'gowth bhat user', 233, 'reliance jet', 'kochi', '14:34', 'nepal', '15:43', '2020-04-10', 3, 1, 4, '213123@fgdf.jhjhj', '2018-11-07', 'Male', 2000, 'Cancel'),
(31, 'gowth', 2487, 'gowth bhat user', 233, 'reliance jet', 'kochi', '14:34', 'nepal', '15:43', '2020-04-10', 0, 1, 1, '213123@fgdf.jhjhj', '2018-11-07', 'Male', 500, 'Cancel'),
(32, 'gowth', 1779, 'gowth bhat user', 233, 'reliance jet', 'kochi', '14:34', 'nepal', '15:43', '2020-04-02', 1, 0, 1, '213123@fgdf.jhjhj', '2018-11-07', 'Male', 500, 'Cancel'),
(33, 'gowth', 210, 'gowth bhat user', 233, 'reliance jet', 'kochi', '14:34', 'nepal', '15:43', '2020-04-02', 1, 0, 1, '213123@fgdf.jhjhj', '2018-11-07', 'Male', 500, 'Cancel'),
(34, 'gowth', 2844, 'gowth bhat user', 233, 'reliance jet', 'kochi', '14:34', 'nepal', '15:43', '2020-04-02', 1, 0, 1, '213123@fgdf.jhjhj', '2018-11-07', 'Male', 500, 'Cancel'),
(35, 'gowth', 2961, 'gowth bhat user', 5123, 'jet', 'Chennai', '03:21', 'banglore', '03:12', '2020-04-08', 1, 0, 1, '213123@fgdf.jhjhj', '2018-11-07', 'Male', 1000, 'Cancel'),
(36, 'gowth', 288, 'gowth bhat user', 5123, 'jet', 'Chennai', '03:21', 'banglore', '03:12', '2020-07-09', 1, 0, 1, '213123@fgdf.jhjhj', '2018-11-07', 'Male', 1000, 'Cancel'),
(37, 'gowth', 2760, 'gowth bhat user', 5123, 'jet', 'Chennai', '03:21', 'banglore', '03:12', '2020-07-09', 0, 1, 1, '213123@fgdf.jhjhj', '2018-11-07', 'Male', 1000, 'Cancel'),
(38, 'gowth', 723, 'gowth bhat user', 354, 'black hawk', 'banglore', '04:34', 'mumbai', '18:07', '2020-03-20', 1, 0, 1, '213123@fgdf.jhjhj', '2018-11-07', 'Male', 343, 'Cancel'),
(39, 'gowth', 2001, 'gowth bhat user', 5123, 'jet', 'Chennai', '03:21', 'banglore', '03:12', '2020-05-13', 0, 1, 1, '213123@fgdf.jhjhj', '2018-11-07', 'Male', 1000, 'Cancel'),
(40, 'gowth', 339, 'gowth bhat user', 5123, 'jet', 'Chennai', '03:21', 'banglore', '03:12', '2020-05-13', 0, 2, 2, '213123@fgdf.jhjhj', '2018-11-07', 'Male', 2000, 'Cancel'),
(41, 'gowth', 483, 'gowth bhat user', 5123, 'jet', 'Chennai', '03:21', 'banglore', '03:12', '2020-05-13', 0, 1, 1, '213123@fgdf.jhjhj', '2018-11-07', 'Male', 1000, 'Cancel'),
(42, 'gowth', 2106, 'gowth bhat user', 5123, 'jet', 'Chennai', '03:21', 'banglore', '03:12', '2020-05-13', 0, 2, 2, '213123@fgdf.jhjhj', '2018-11-07', 'Male', 2000, 'Cancel'),
(43, 'gowth', 906, 'gowth bhat user', 5123, 'jet', 'Chennai', '03:21', 'banglore', '03:12', '2020-05-13', 2, 2, 4, '213123@fgdf.jhjhj', '2018-11-07', 'Male', 4000, 'Cancel'),
(44, 'gowth', 804, 'gowth bhat user', 5123, 'jet', 'Chennai', '03:21', 'banglore', '03:12', '2020-05-13', 0, 1, 1, '213123@fgdf.jhjhj', '2018-11-07', 'Male', 1000, 'Cancel'),
(45, 'gowth', 1098, 'gowth bhat user', 5123, 'jet', 'Chennai', '03:21', 'banglore', '03:12', '2020-05-13', 1, 0, 1, '213123@fgdf.jhjhj', '2018-11-07', 'Male', 1000, 'Cancel'),
(46, 'gowth', 2865, 'gowth bhat user', 5123, 'jet', 'Chennai', '03:21', 'banglore', '03:12', '2020-04-08', 0, 1, 1, '213123@fgdf.jhjhj', '2018-11-07', 'Male', 1000, 'Cancel');

-- --------------------------------------------------------

--
-- Table structure for table `flights_details`
--

CREATE TABLE `flights_details` (
  `id` int(10) NOT NULL,
  `no` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `departure` text NOT NULL,
  `d_time` text NOT NULL,
  `arrival` text NOT NULL,
  `a_time` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flights_details`
--

INSERT INTO `flights_details` (`id`, `no`, `name`, `departure`, `d_time`, `arrival`, `a_time`) VALUES
(7, 5123, 'jet', 'Chennai', '03:21', 'banglore', '03:12'),
(8, 354, 'black hawk', 'banglore', '04:34', 'mumbai', '18:07'),
(18, 233, 'reliance jet', 'kochi', '14:34', 'nepal', '15:43'),
(20, 7, 'gowths grand', 'konandur', '04:06', 'thirthahalli', '03:05');

-- --------------------------------------------------------

--
-- Table structure for table `flight_class`
--

CREATE TABLE `flight_class` (
  `no` int(10) NOT NULL,
  `class` varchar(100) NOT NULL,
  `price` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flight_class`
--

INSERT INTO `flight_class` (`no`, `class`, `price`) VALUES
(7, 'Business', 1000),
(233, 'Economy', 500),
(354, 'Economy', 343),
(5123, 'Economy', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `flight_seats`
--

CREATE TABLE `flight_seats` (
  `no` int(10) NOT NULL,
  `seats` int(10) NOT NULL,
  `available` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flight_seats`
--

INSERT INTO `flight_seats` (`no`, `seats`, `available`) VALUES
(7, 10, 10),
(233, 12, 12),
(354, 34, 34),
(5123, 50, 50);

-- --------------------------------------------------------

--
-- Table structure for table `plain_class`
--

CREATE TABLE `plain_class` (
  `id` int(10) NOT NULL,
  `class` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plain_class`
--

INSERT INTO `plain_class` (`id`, `class`) VALUES
(1, 'Business'),
(2, 'Economy');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `uname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` text NOT NULL,
  `dob` text NOT NULL,
  `gender` text NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `mname`, `lname`, `uname`, `email`, `mobile`, `dob`, `gender`, `password`) VALUES
(1, 'Aranga', 'AK', 'Nathan', 'Aranga5123', 'aranga5123@gmail.com', '7826856074', '09/05/1994', 'Male', '51235123'),
(1, 'gowth', 'bhat', 'user', 'gowth', '213123@fgdf.jhjhj', '1234512345', '2018-11-07', 'Male', '123456789'),
(2, 'ghfgh', '', 'fghfgh', 'Aranga', 'aranga@gmail.com', '7826856075', '2018-11-09', 'Male', '123412349'),
(3, 'ghfgh', '', 'fghfgh', 'Aranga1', 'aranga1@gmail.com', '7826856071', '2018-11-09', 'Male', '123412349'),
(4, 'ghfgh', '', 'fghfgh', 'Aranga2', 'aranga2@gmail.com', '7826856072', '2018-11-09', 'Female', '123412349'),
(6, '7777', '', '7777777', '77777', '777777@dfdfds.jjj', '7777777777', '2018-11-15', 'Male', '77777777'),
(7, 'dvcvxc', '', 'cvxcvxc', 'Aranga3', 'aranga3@gmail.com', '7826856073', '2018-11-28', 'Others', '123123123'),
(8, 'AjS', '', 'Style', 'AJStyle', 'sdfd@fdfdf.vbcvb', '5555555555', '2018-11-21', 'Male', '12341234'),
(9, 'akshay', '', 'mestha', 'akshaymestha', 'akshaymestha99@gmail.com', '6366808851', '1999-09-14', 'Male', 'akshaymestha99');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`,`aname`,`email`),
  ADD UNIQUE KEY `aname` (`aname`,`email`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`,`uname`);

--
-- Indexes for table `cancel`
--
ALTER TABLE `cancel`
  ADD PRIMARY KEY (`id`,`uname`);

--
-- Indexes for table `flights_details`
--
ALTER TABLE `flights_details`
  ADD PRIMARY KEY (`id`,`no`,`name`),
  ADD UNIQUE KEY `no` (`no`,`name`);

--
-- Indexes for table `flight_class`
--
ALTER TABLE `flight_class`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `flight_seats`
--
ALTER TABLE `flight_seats`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `plain_class`
--
ALTER TABLE `plain_class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`,`uname`,`email`),
  ADD UNIQUE KEY `uname` (`uname`,`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `cancel`
--
ALTER TABLE `cancel`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `flights_details`
--
ALTER TABLE `flights_details`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `plain_class`
--
ALTER TABLE `plain_class`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `flight_class`
--
ALTER TABLE `flight_class`
  ADD CONSTRAINT `flight_class_ibfk_1` FOREIGN KEY (`no`) REFERENCES `flights_details` (`no`);

--
-- Constraints for table `flight_seats`
--
ALTER TABLE `flight_seats`
  ADD CONSTRAINT `flight_seats_ibfk_1` FOREIGN KEY (`no`) REFERENCES `flights_details` (`no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
