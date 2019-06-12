-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2019 at 01:40 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web`
--

-- --------------------------------------------------------

--
-- Table structure for table `cfstatistics`
--

CREATE TABLE `cfstatistics` (
  `id` int(11) NOT NULL,
  `usergmail` varchar(50) NOT NULL,
  `cfusername` varchar(50) NOT NULL,
  `nrAccepted` int(11) NOT NULL,
  `nrSolved` int(11) NOT NULL,
  `date` date NOT NULL,
  `nrSubmissions` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cfstatistics`
--

INSERT INTO `cfstatistics` (`id`, `usergmail`, `cfusername`, `nrAccepted`, `nrSolved`, `date`, `nrSubmissions`) VALUES
(11, 'bpalanici1337@gmail.com', 'TOURIST', 1357, 1133, '2019-06-12', 2015);

-- --------------------------------------------------------

--
-- Table structure for table `userlanguages`
--

CREATE TABLE `userlanguages` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `languagename` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlanguages`
--

INSERT INTO `userlanguages` (`id`, `username`, `languagename`) VALUES
(11, 'a', 'java'),
(12, 'a', 'java');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `mail` varchar(30) NOT NULL,
  `cfusername` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `mail`, `cfusername`) VALUES
(5, 'a', 'bpalanici1337@gmail.com', 'TOURIST');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cfstatistics`
--
ALTER TABLE `cfstatistics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userlanguages`
--
ALTER TABLE `userlanguages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cfstatistics`
--
ALTER TABLE `cfstatistics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `userlanguages`
--
ALTER TABLE `userlanguages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
