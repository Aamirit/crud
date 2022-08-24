-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2022 at 04:43 PM
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
-- Database: `crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `address` varchar(30) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(30) NOT NULL,
  `zip` varchar(30) NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `name`, `email`, `password`, `address`, `city`, `state`, `zip`, `file`) VALUES
(22, 'amir123afcsvsdvxv', 'admin@gmail.comsv x xvdvds', '123', 'amclnacnn', '12313', 'punjab', '12314', ''),
(25, 'amirdfgvag', 'agasgsgsljkhgjffd', '123', 'asoianocq`vsbbb', '12313', 'kpk', '12314', ''),
(28, 'amir123afcsv', 'admin@gmail.coms', '123', 'amclnacnn', '12313', 'punjab', '12314', ''),
(29, 'am', 'agasgsgs@gmail.com', '123', 'asoian', '12313', 'kpk', '12314', ''),
(30, 'amir1234ffh', 'admin@gmail.com', '123', 'asoianocq`', '12313', 'punjab', '12314', ''),
(31, 'amir1234ffh', 'admin@gmail.com', '123', 'asoianocq`', '12313', 'punjab', '12314', ''),
(32, 'amir1234ffh', 'admin@gmail.com', '123', 'asoianocq`', '12313', 'punjab', '12314', ''),
(33, 'amir1234ffh', 'admin@gmail.com', '123', 'asoianocq`', '12313', 'punjab', '12314', ''),
(34, 'amir1234ffh', 'admin@gmail.com', '123', 'asoianocq`', '12313', 'punjab', '12314', ''),
(35, 'amir1234ffh', 'admin@gmail.com', '123', 'asoianocq`', '12313', 'punjab', '12314', ''),
(36, 'amir1234ffh', 'admin@gmail.com', '123', 'asoianocq`', '12313', 'punjab', '12314', ''),
(37, 'amir1234ffh', 'admin@gmail.com', '123', 'asoianocq`', '12313', 'punjab', '12314', ''),
(38, 'amir1234ffh', 'admin@gmail.com', '123', 'asoianocq`', '12313', 'punjab', '12314', ''),
(39, 'amir1234ffh', 'admin@gmail.com', '123', 'asoianocq`', '12313', 'punjab', '12314', ''),
(40, 'amir1234ffh', 'admin@gmail.com', '123', 'asoianocq`', '12313', 'punjab', '12314', ''),
(41, 'amir1234ffh', 'admin@gmail.com', '123', 'asoianocq`', '12313', 'punjab', '12314', ''),
(42, 'amir1234ffh', 'admin@gmail.com', '123', 'asoianocq`', '12313', 'punjab', '12314', ''),
(43, 'amir1234ffh', 'admin@gmail.com', '123', 'asoianocq`', '12313', 'punjab', '12314', ''),
(44, 'amir1234ffh', 'admin@gmail.com', '123', 'asoianocq`', '12313', 'punjab', '12314', ''),
(45, 'amir1234ffh', 'admin@gmail.com', '123', 'asoianocq`', '12313', 'punjab', '12314', ''),
(46, 'amir1234ffh', 'admin@gmail.com', '123', 'asoianocq`', '12313', 'punjab', '12314', ''),
(47, 'amir1234ffh', 'admin@gmail.com', '123', 'asoianocq`', '12313', 'punjab', '12314', ''),
(48, 'amir1234ffh', 'admin@gmail.com', '123', 'asoianocq`', '12313', 'punjab', '12314', ''),
(49, 'amir1234ffh', 'admin@gmail.com', '123', 'asoianocq`', '12313', 'punjab', '12314', ''),
(50, 'amir1234ffh', 'admin@gmail.com', '123', 'asoianocq`', '12313', 'punjab', '12314', ''),
(51, 'amir1234ffh', 'admin@gmail.com', '123', 'asoianocq`', '12313', 'punjab', '12314', ''),
(52, 'amir1234ffh', 'admin@gmail.com', '123', 'asoianocq`', '12313', 'punjab', '12314', ''),
(53, 'amir1234ffh', 'admin@gmail.com', '123', 'asoianocq`', '12313', 'punjab', '12314', ''),
(54, 'amir1234ffh', 'admin@gmail.com', '123', 'asoianocq`', '12313', 'punjab', '12314', ''),
(55, 'amir1234ffh', 'admin@gmail.com', '123', 'asoianocq`', '12313', 'punjab', '12314', ''),
(56, 'amir1234ffh', 'admin@gmail.com', '123', 'asoianocq`', '12313', 'punjab', '12314', ''),
(57, 'amir1234ffh', 'admin@gmail.com', '123', 'asoianocq`', '12313', 'punjab', '12314', ''),
(58, 'amir1234ffh', 'admin@gmail.com', '123', 'asoianocq`', '12313', 'punjab', '12314', ''),
(59, 'amir1234ffh', 'admin@gmail.com', '123', 'asoianocq`', '12313', 'punjab', '12314', ''),
(60, 'amir1234ffh', 'admin@gmail.com', '123', 'asoianocq`', '12313', 'punjab', '12314', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
