-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2020 at 08:26 PM
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
(1, 'preetham', 'bhat', 'preetham', 'preeth', 'preeth123@gmail.com', '1122457895', '1990-11-12', 'Male', '123456789');

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
(1, 'gowth', 309, 'gowth bhat user', 7, 'black hwak', 'banglore', '11:51 pm', 'manglore', '11:52 am', '2020-09-25', 2, 1, 3, '213123@fgdf.jhjhj', '2018-11-07', 'Male', 3000, 'Booked');

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
(1, 'gowth', 300, 'gowth bhat user', 8, 'vega', 'mumbai', '4:51 pm', 'delhi', '2:51 am', '2020-09-22', 3, 0, 3, '213123@fgdf.jhjhj', '2018-11-07', 'Male', 15000, 'Cancel');

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
(1, 7, 'black hwak', 'banglore', '11:51 pm', 'manglore', '11:52 am'),
(2, 8, 'vega', 'mumbai', '4:51 pm', 'delhi', '2:51 am');

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
(8, 'Economy', 5000);

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
(7, 5, 2),
(8, 4, 4);

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
(1, 'gowth', 'bhat', 'user', 'gowth', 'gowtham123@gmail.com', '1234512345', '2018-11-07', 'Male', '123456789');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cancel`
--
ALTER TABLE `cancel`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `flights_details`
--
ALTER TABLE `flights_details`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
