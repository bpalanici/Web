-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2019 at 10:50 PM
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
(20, 'bpalanici1337@gmail.com', 'TOURIST', 1357, 1133, '2019-06-12', 2015),
(21, 'bpalanici1337@gmail.com', 'TOURIST', 1357, 1133, '2019-06-12', 2015),
(22, 'bpalanici1337@gmail.com', 'TOURIST', 1357, 1133, '2019-06-12', 2015),
(23, 'bpalanici1337@gmail.com', 'TOURIST', 1357, 1133, '2019-06-12', 2015),
(24, 'bpalanici1337@gmail.com', 'TOURIST', 1357, 1133, '2019-06-12', 2015),
(25, 'bpalanici1337@gmail.com', 'TOURIST', 1357, 1133, '2019-06-12', 2015),
(26, 'bpalanici1337@gmail.com', 'TOURIST', 1357, 1133, '2019-06-12', 2015),
(27, 'bpalanici1337@gmail.com', 'TOURIST', 1357, 1133, '2019-06-12', 2015),
(28, 'bpalanici1337@gmail.com', 'TOURIST', 1357, 1133, '2019-06-12', 2015),
(29, 'bpalanici1337@gmail.com', 'tourist', 1357, 1133, '2019-06-12', 2015);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `ID` int(11) NOT NULL,
  `usergmail` varchar(50) NOT NULL,
  `eventname` varchar(200) NOT NULL,
  `eventgroup` varchar(100) NOT NULL,
  `eventdiff` varchar(20) NOT NULL DEFAULT 'incepator',
  `eventDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`ID`, `usergmail`, `eventname`, `eventgroup`, `eventdiff`, `eventDate`) VALUES
(1, 'a', 'a', 'a', '0', '2019-06-25'),
(2, 'a', 'Codeforces Global Round 4', 'codeforces', '0', '2019-07-20'),
(3, 'bpalanici1337@gmail.com', 'Translating requirements into code (Session 2)  ', 'Summer Practice @Centric ', '0', '2019-07-22'),
(4, 'bpalanici1337@gmail.com', 'Codeforces Global Round 4', 'codeforces', '0', '2019-07-20'),
(5, 'bpalanici1337@gmail.com', 'ApplePay: a quick journey from code to successful payments ', 'DotNet Iasi ', 'avansat', '2019-06-12');

-- --------------------------------------------------------

--
-- Table structure for table `eventsall`
--

CREATE TABLE `eventsall` (
  `ID` int(11) NOT NULL,
  `eventname` varchar(200) NOT NULL,
  `eventgroup` varchar(200) NOT NULL,
  `eventdiff` varchar(50) NOT NULL,
  `eventdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eventsall`
--

INSERT INTO `eventsall` (`ID`, `eventname`, `eventgroup`, `eventdiff`, `eventdate`) VALUES
(158, 'ApplePay: a quick journey from code to successful payments ', 'DotNet Iasi ', 'avansat', '2019-06-12'),
(159, 'Connected by Frontend ', 'Connect.IT Meetup in Chisinau ', 'avansat', '2019-06-13'),
(160, 'Cloud Calculations in GCP ', 'Afterwork @ Pentalog ', 'incepator', '2019-06-18'),
(161, 'First steps in AI ', 'IAÈ˜I AI ', 'mediu', '2019-06-20'),
(162, 'Scala: Pure programs with ZIO ', 'Iasi Functional Programming ', 'mediu', '2019-06-20'),
(163, 'Kubernetes 101 - workshop for developers ', 'Cloud Native Computing Iasi ', 'experimentat', '2019-06-20'),
(164, 'Introduction ', 'Summer Practice @Centric ', 'incepator', '2019-06-24'),
(165, 'Kubernetes 101 - workshop for developers ', 'Cloud Native Computing Iasi ', 'incepator', '2019-06-25'),
(166, 'Database layer ', 'Summer Practice @Centric ', 'mediu', '2019-06-27'),
(167, 'Scrum Injection Chisinau (@BeAgileMD) ', 'BeAgileMD Meetup ', 'incepator', '2019-06-29'),
(168, 'Repository & logic(business) layer ', 'Summer Practice @Centric ', 'mediu', '2019-07-01'),
(169, 'Introduction to Frontend ', 'Summer Practice @Centric ', 'experimentat', '2019-07-04'),
(170, 'Angular & Typescript ', 'Summer Practice @Centric ', 'avansat', '2019-07-08'),
(171, 'Developer Testing ', 'Summer Practice @Centric ', 'incepator', '2019-07-11'),
(172, 'Automated Testing ', 'Summer Practice @Centric ', 'experimentat', '2019-07-15'),
(173, 'Translating requirements into code (Session 1) ', 'Summer Practice @Centric ', 'experimentat', '2019-07-18'),
(174, 'Translating requirements into code (Session 2)  ', 'Summer Practice @Centric ', 'experimentat', '2019-07-22'),
(175, 'Awards & Rewards ', 'Summer Practice @Centric ', 'mediu', '2019-07-25'),
(176, 'Codeforces Global Round 4', 'codeforces', 'mediu', '2019-07-20'),
(177, 'Codeforces Round #569 (Div. 3)', 'codeforces', 'experimentat', '2019-06-26'),
(178, 'Codeforces Round #568 (Div. 1)', 'codeforces', 'incepator', '2019-06-21'),
(179, 'Codeforces Round #568 (Div. 2)', 'codeforces', 'experimentat', '2019-06-21'),
(180, 'Codeforces Round #567 (Div. 2)', 'codeforces', 'incepator', '2019-06-16');

-- --------------------------------------------------------

--
-- Table structure for table `scores`
--

CREATE TABLE `scores` (
  `id` int(15) NOT NULL,
  `iteration` int(15) NOT NULL,
  `username` varchar(255) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `language` varchar(255) NOT NULL,
  `score` double(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(12, 'a', 'java'),
(13, 'a', 'c++'),
(14, 'a', 'c#'),
(15, 'bpalanici', 'java'),
(16, 'bpalanici', 'kotlin'),
(17, 'Dyian314', 'java'),
(18, 'Dyian314', 'c#');

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
(8, 'Dyian314', 'bpalanici1337@gmail.com', 'tourist');

-- --------------------------------------------------------

--
-- Table structure for table `userstats`
--

CREATE TABLE `userstats` (
  `id` int(15) NOT NULL,
  `username` varchar(255) NOT NULL,
  `iteration` int(15) NOT NULL,
  `language` varchar(255) NOT NULL,
  `scoreAvg` double(15,2) NOT NULL,
  `level` varchar(255) NOT NULL,
  `evolution` double(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cfstatistics`
--
ALTER TABLE `cfstatistics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Index_edentdiff` (`eventdiff`),
  ADD KEY `index_eventname` (`eventname`);

--
-- Indexes for table `eventsall`
--
ALTER TABLE `eventsall`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `scores`
--
ALTER TABLE `scores`
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
-- Indexes for table `userstats`
--
ALTER TABLE `userstats`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cfstatistics`
--
ALTER TABLE `cfstatistics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `eventsall`
--
ALTER TABLE `eventsall`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

--
-- AUTO_INCREMENT for table `scores`
--
ALTER TABLE `scores`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `userlanguages`
--
ALTER TABLE `userlanguages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `userstats`
--
ALTER TABLE `userstats`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
