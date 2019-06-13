-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2019 at 01:54 AM
-- Server version: 10.1.39-MariaDB
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
  `rawlink` varchar(255) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `language` varchar(255) NOT NULL,
  `score` double(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scores`
--

INSERT INTO `scores` (`id`, `iteration`, `username`, `rawlink`, `filename`, `language`, `score`) VALUES
(1, 1, 'andreiarusoaie', 'https://raw.githubusercontent.com/andreiarusoaie/itc-testing-tools/master/benchmark.py', 'benchmark.py', 'python', 4.23),
(2, 1, 'andreiarusoaie', 'https://raw.githubusercontent.com/andreiarusoaie/itc-testing-tools/master/python/clanalyze.py', 'clanalyze.py', 'python', 1.33),
(3, 1, 'andreiarusoaie', 'https://raw.githubusercontent.com/andreiarusoaie/itc-testing-tools/master/python/clang%2B%2B.py', 'clang++.py', 'python', 2.95),
(4, 1, 'andreiarusoaie', 'https://raw.githubusercontent.com/andreiarusoaie/itc-testing-tools/master/python/clang.py', 'clang.py', 'python', 2.95),
(5, 1, 'andreiarusoaie', 'https://raw.githubusercontent.com/andreiarusoaie/itc-testing-tools/master/python/cppcheck.py', 'cppcheck.py', 'python', 2.61),
(6, 1, 'andreiarusoaie', 'https://raw.githubusercontent.com/andreiarusoaie/itc-testing-tools/master/python/cpplint.py', 'cpplint.py', 'python', 2.67),
(7, 1, 'andreiarusoaie', 'https://raw.githubusercontent.com/andreiarusoaie/itc-testing-tools/master/python/dirutils.py', 'dirutils.py', 'python', 6.06),
(8, 1, 'andreiarusoaie', 'https://raw.githubusercontent.com/andreiarusoaie/itc-testing-tools/master/python/flawfinder.py', 'flawfinder.py', 'python', 4.48),
(9, 1, 'andreiarusoaie', 'https://raw.githubusercontent.com/andreiarusoaie/itc-testing-tools/master/python/flint%2B%2B.py', 'flint++.py', 'python', 2.95),
(10, 1, 'andreiarusoaie', 'https://raw.githubusercontent.com/andreiarusoaie/itc-testing-tools/master/python/framac.py', 'framac.py', 'python', 4.03),
(11, 1, 'andreiarusoaie', 'https://raw.githubusercontent.com/andreiarusoaie/itc-testing-tools/master/python/infer.py', 'infer.py', 'python', 3.72),
(12, 1, 'andreiarusoaie', 'https://raw.githubusercontent.com/andreiarusoaie/itc-testing-tools/master/python/latex.py', 'latex.py', 'python', 5.23),
(13, 1, 'andreiarusoaie', 'https://raw.githubusercontent.com/andreiarusoaie/itc-testing-tools/master/python/oclint.py', 'oclint.py', 'python', 3.27),
(14, 1, 'andreiarusoaie', 'https://raw.githubusercontent.com/andreiarusoaie/itc-testing-tools/master/python/sparse.py', 'sparse.py', 'python', 2.32),
(15, 1, 'andreiarusoaie', 'https://raw.githubusercontent.com/andreiarusoaie/itc-testing-tools/master/python/splint.py', 'splint.py', 'python', 3.06),
(16, 1, 'andreiarusoaie', 'https://raw.githubusercontent.com/andreiarusoaie/itc-testing-tools/master/python/statistics.py', 'statistics.py', 'python', 2.63),
(17, 1, 'andreiarusoaie', 'https://raw.githubusercontent.com/andreiarusoaie/itc-testing-tools/master/python/system.py', 'system.py', 'python', 6.00),
(18, 1, 'andreiarusoaie', 'https://raw.githubusercontent.com/andreiarusoaie/itc-testing-tools/master/python/uno-parser.py', 'uno-parser.py', 'python', 7.27),
(19, 1, 'andreiarusoaie', 'https://raw.githubusercontent.com/andreiarusoaie/itc-testing-tools/master/python/uno.py', 'uno.py', 'python', 2.77),
(20, 2, 'andreiarusoaie', 'https://raw.githubusercontent.com/andreiarusoaie/itc-testing-tools/master/benchmark.py', 'benchmark.py', 'python', 4.23),
(21, 2, 'andreiarusoaie', 'https://raw.githubusercontent.com/andreiarusoaie/itc-testing-tools/master/benchmark.py', 'benchmark.py', 'python', 4.23),
(22, 2, 'andreiarusoaie', 'https://raw.githubusercontent.com/andreiarusoaie/itc-testing-tools/master/benchmark.py', 'benchmark.py', 'python', 4.23),
(23, 3, 'andreiarusoaie', 'https://raw.githubusercontent.com/andreiarusoaie/itc-testing-tools/master/benchmark.py', 'benchmark.py', 'python', 4.23),
(24, 3, 'andreiarusoaie', 'https://raw.githubusercontent.com/andreiarusoaie/itc-testing-tools/master/python/clanalyze.py', 'clanalyze.py', 'python', 1.33),
(25, 3, 'andreiarusoaie', 'https://raw.githubusercontent.com/andreiarusoaie/itc-testing-tools/master/python/clang%2B%2B.py', 'clang++.py', 'python', 2.95),
(26, 3, 'andreiarusoaie', 'https://raw.githubusercontent.com/andreiarusoaie/itc-testing-tools/master/python/clang.py', 'clang.py', 'python', 2.95),
(27, 3, 'andreiarusoaie', 'https://raw.githubusercontent.com/andreiarusoaie/itc-testing-tools/master/python/cppcheck.py', 'cppcheck.py', 'python', 2.61),
(28, 3, 'andreiarusoaie', 'https://raw.githubusercontent.com/andreiarusoaie/itc-testing-tools/master/python/cpplint.py', 'cpplint.py', 'python', 2.67),
(29, 3, 'andreiarusoaie', 'https://raw.githubusercontent.com/andreiarusoaie/itc-testing-tools/master/python/dirutils.py', 'dirutils.py', 'python', 6.06),
(30, 3, 'andreiarusoaie', 'https://raw.githubusercontent.com/andreiarusoaie/itc-testing-tools/master/python/flawfinder.py', 'flawfinder.py', 'python', 4.48),
(31, 3, 'andreiarusoaie', 'https://raw.githubusercontent.com/andreiarusoaie/itc-testing-tools/master/python/flint%2B%2B.py', 'flint++.py', 'python', 2.95),
(32, 3, 'andreiarusoaie', 'https://raw.githubusercontent.com/andreiarusoaie/itc-testing-tools/master/python/framac.py', 'framac.py', 'python', 4.03),
(33, 3, 'andreiarusoaie', 'https://raw.githubusercontent.com/andreiarusoaie/itc-testing-tools/master/python/infer.py', 'infer.py', 'python', 3.72),
(34, 3, 'andreiarusoaie', 'https://raw.githubusercontent.com/andreiarusoaie/itc-testing-tools/master/python/latex.py', 'latex.py', 'python', 5.23),
(35, 3, 'andreiarusoaie', 'https://raw.githubusercontent.com/andreiarusoaie/itc-testing-tools/master/python/oclint.py', 'oclint.py', 'python', 3.27),
(36, 3, 'andreiarusoaie', 'https://raw.githubusercontent.com/andreiarusoaie/itc-testing-tools/master/python/sparse.py', 'sparse.py', 'python', 2.32),
(37, 3, 'andreiarusoaie', 'https://raw.githubusercontent.com/andreiarusoaie/itc-testing-tools/master/python/splint.py', 'splint.py', 'python', 3.06),
(38, 3, 'andreiarusoaie', 'https://raw.githubusercontent.com/andreiarusoaie/itc-testing-tools/master/python/statistics.py', 'statistics.py', 'python', 2.63),
(39, 3, 'andreiarusoaie', 'https://raw.githubusercontent.com/andreiarusoaie/itc-testing-tools/master/python/system.py', 'system.py', 'python', 6.00),
(40, 3, 'andreiarusoaie', 'https://raw.githubusercontent.com/andreiarusoaie/itc-testing-tools/master/python/uno-parser.py', 'uno-parser.py', 'python', 7.27),
(41, 3, 'andreiarusoaie', 'https://raw.githubusercontent.com/andreiarusoaie/itc-testing-tools/master/python/uno.py', 'uno.py', 'python', 2.77),
(42, 4, 'andreiarusoaie', 'https://raw.githubusercontent.com/andreiarusoaie/itc-testing-tools/master/benchmark.py', 'benchmark.py', 'python', 4.23),
(43, 4, 'andreiarusoaie', 'https://raw.githubusercontent.com/andreiarusoaie/itc-testing-tools/master/python/clanalyze.py', 'clanalyze.py', 'python', 1.33),
(44, 4, 'andreiarusoaie', 'https://raw.githubusercontent.com/andreiarusoaie/itc-testing-tools/master/python/clang%2B%2B.py', 'clang++.py', 'python', 2.95),
(45, 4, 'andreiarusoaie', 'https://raw.githubusercontent.com/andreiarusoaie/itc-testing-tools/master/python/clang.py', 'clang.py', 'python', 2.95),
(46, 4, 'andreiarusoaie', 'https://raw.githubusercontent.com/andreiarusoaie/itc-testing-tools/master/python/cppcheck.py', 'cppcheck.py', 'python', 2.61),
(47, 4, 'andreiarusoaie', 'https://raw.githubusercontent.com/andreiarusoaie/itc-testing-tools/master/python/cpplint.py', 'cpplint.py', 'python', 2.67),
(48, 4, 'andreiarusoaie', 'https://raw.githubusercontent.com/andreiarusoaie/itc-testing-tools/master/python/dirutils.py', 'dirutils.py', 'python', 6.06),
(49, 4, 'andreiarusoaie', 'https://raw.githubusercontent.com/andreiarusoaie/itc-testing-tools/master/python/flawfinder.py', 'flawfinder.py', 'python', 4.48),
(50, 4, 'andreiarusoaie', 'https://raw.githubusercontent.com/andreiarusoaie/itc-testing-tools/master/python/flint%2B%2B.py', 'flint++.py', 'python', 2.95),
(51, 4, 'andreiarusoaie', 'https://raw.githubusercontent.com/andreiarusoaie/itc-testing-tools/master/python/framac.py', 'framac.py', 'python', 4.03),
(52, 4, 'andreiarusoaie', 'https://raw.githubusercontent.com/andreiarusoaie/itc-testing-tools/master/python/infer.py', 'infer.py', 'python', 3.72),
(53, 4, 'andreiarusoaie', 'https://raw.githubusercontent.com/andreiarusoaie/itc-testing-tools/master/python/latex.py', 'latex.py', 'python', 5.23),
(54, 4, 'andreiarusoaie', 'https://raw.githubusercontent.com/andreiarusoaie/itc-testing-tools/master/python/oclint.py', 'oclint.py', 'python', 3.27),
(55, 4, 'andreiarusoaie', 'https://raw.githubusercontent.com/andreiarusoaie/itc-testing-tools/master/python/sparse.py', 'sparse.py', 'python', 2.32),
(56, 4, 'andreiarusoaie', 'https://raw.githubusercontent.com/andreiarusoaie/itc-testing-tools/master/python/splint.py', 'splint.py', 'python', 3.06),
(57, 4, 'andreiarusoaie', 'https://raw.githubusercontent.com/andreiarusoaie/itc-testing-tools/master/python/statistics.py', 'statistics.py', 'python', 2.63),
(58, 4, 'andreiarusoaie', 'https://raw.githubusercontent.com/andreiarusoaie/itc-testing-tools/master/python/system.py', 'system.py', 'python', 6.00),
(59, 4, 'andreiarusoaie', 'https://raw.githubusercontent.com/andreiarusoaie/itc-testing-tools/master/python/uno-parser.py', 'uno-parser.py', 'python', 7.27),
(60, 4, 'andreiarusoaie', 'https://raw.githubusercontent.com/andreiarusoaie/itc-testing-tools/master/python/uno.py', 'uno.py', 'python', 2.77),
(61, 1, 'elupoae', 'https://raw.githubusercontent.com/elupoae/labs/master/.travis/build.py', 'build.py', 'python', 9.93),
(62, 1, 'elupoae', 'https://raw.githubusercontent.com/elupoae/labs/master/python/exemple/maxim.py', 'maxim.py', 'python', 9.00),
(63, 1, 'elupoae', 'https://raw.githubusercontent.com/elupoae/labs/master/python/exemple/palindrom.py', 'palindrom.py', 'python', 10.00),
(64, 1, 'elupoae', 'https://raw.githubusercontent.com/elupoae/labs/master/python/exemple/par.py', 'par.py', 'python', 10.00),
(65, 1, 'elupoae', 'https://raw.githubusercontent.com/elupoae/labs/master/python/exemple/putere.py', 'putere.py', 'python', 10.00),
(66, 1, 'elupoae', 'https://raw.githubusercontent.com/elupoae/labs/master/python/exercitii/caesar/caesar.py', 'caesar.py', 'python', 9.33),
(67, 1, 'elupoae', 'https://raw.githubusercontent.com/elupoae/labs/master/python/exercitii/icao/from_icao.py', 'from_icao.py', 'python', 8.00),
(68, 1, 'elupoae', 'https://raw.githubusercontent.com/elupoae/labs/master/python/exercitii/icao/to_icao.py', 'to_icao.py', 'python', 8.00),
(69, 1, 'bpalanici', 'https://raw.githubusercontent.com/bpalanici/Web/master/linters/pylint-2.3.1/pylint-2.3.1/.eggs/astroid-2.2.5-py3.7.egg/astroid/__init__.py', '__init__.py', 'python', -17.96),
(70, 1, 'bpalanici', 'https://raw.githubusercontent.com/bpalanici/Web/master/linters/pylint-2.3.1/pylint-2.3.1/.eggs/astroid-2.2.5-py3.7.egg/astroid/__pkginfo__.py', '__pkginfo__.py', 'python', 0.00),
(71, 1, 'bpalanici', 'https://raw.githubusercontent.com/bpalanici/Web/master/linters/pylint-2.3.1/pylint-2.3.1/.eggs/astroid-2.2.5-py3.7.egg/astroid/_ast.py', '_ast.py', 'python', 8.93),
(72, 1, 'bpalanici', 'https://raw.githubusercontent.com/bpalanici/Web/master/linters/pylint-2.3.1/pylint-2.3.1/.eggs/astroid-2.2.5-py3.7.egg/astroid/arguments.py', 'arguments.py', 'python', 9.63),
(73, 1, 'bpalanici', 'https://raw.githubusercontent.com/bpalanici/Web/master/linters/pylint-2.3.1/pylint-2.3.1/.eggs/astroid-2.2.5-py3.7.egg/astroid/as_string.py', 'as_string.py', 'python', 8.94),
(74, 1, 'bpalanici', 'https://raw.githubusercontent.com/bpalanici/Web/master/linters/pylint-2.3.1/pylint-2.3.1/.eggs/astroid-2.2.5-py3.7.egg/astroid/bases.py', 'bases.py', 'python', 8.71),
(75, 1, 'bpalanici', 'https://raw.githubusercontent.com/bpalanici/Web/master/linters/pylint-2.3.1/pylint-2.3.1/.eggs/astroid-2.2.5-py3.7.egg/astroid/brain/brain_argparse.py', 'brain_argparse.py', 'python', 8.42),
(76, 1, 'bpalanici', 'https://raw.githubusercontent.com/bpalanici/Web/master/linters/pylint-2.3.1/pylint-2.3.1/.eggs/astroid-2.2.5-py3.7.egg/astroid/brain/brain_attrs.py', 'brain_attrs.py', 'python', 10.00),
(77, 1, 'bpalanici', 'https://raw.githubusercontent.com/bpalanici/Web/master/linters/pylint-2.3.1/pylint-2.3.1/.eggs/astroid-2.2.5-py3.7.egg/astroid/brain/brain_builtin_inference.py', 'brain_builtin_inference.py', 'python', 9.49),
(78, 1, 'bpalanici', 'https://raw.githubusercontent.com/bpalanici/Web/master/linters/pylint-2.3.1/pylint-2.3.1/.eggs/astroid-2.2.5-py3.7.egg/astroid/brain/brain_collections.py', 'brain_collections.py', 'python', 9.41),
(79, 1, 'bpalanici', 'https://raw.githubusercontent.com/bpalanici/Web/master/linters/pylint-2.3.1/pylint-2.3.1/.eggs/astroid-2.2.5-py3.7.egg/astroid/brain/brain_curses.py', 'brain_curses.py', 'python', 7.50),
(80, 1, 'bpalanici', 'https://raw.githubusercontent.com/bpalanici/Web/master/linters/pylint-2.3.1/pylint-2.3.1/.eggs/astroid-2.2.5-py3.7.egg/astroid/brain/brain_dateutil.py', 'brain_dateutil.py', 'python', 8.33),
(81, 1, 'bpalanici', 'https://raw.githubusercontent.com/bpalanici/Web/master/linters/pylint-2.3.1/pylint-2.3.1/.eggs/astroid-2.2.5-py3.7.egg/astroid/brain/brain_fstrings.py', 'brain_fstrings.py', 'python', 8.21),
(82, 1, 'bpalanici', 'https://raw.githubusercontent.com/bpalanici/Web/master/linters/pylint-2.3.1/pylint-2.3.1/.eggs/astroid-2.2.5-py3.7.egg/astroid/brain/brain_functools.py', 'brain_functools.py', 'python', 8.48),
(83, 1, 'bpalanici', 'https://raw.githubusercontent.com/bpalanici/Web/master/linters/pylint-2.3.1/pylint-2.3.1/.eggs/astroid-2.2.5-py3.7.egg/astroid/brain/brain_gi.py', 'brain_gi.py', 'python', 8.30),
(84, 1, 'bpalanici', 'https://raw.githubusercontent.com/bpalanici/Web/master/linters/pylint-2.3.1/pylint-2.3.1/.eggs/astroid-2.2.5-py3.7.egg/astroid/brain/brain_hashlib.py', 'brain_hashlib.py', 'python', 9.41),
(85, 1, 'bpalanici', 'https://raw.githubusercontent.com/bpalanici/Web/master/linters/pylint-2.3.1/pylint-2.3.1/.eggs/astroid-2.2.5-py3.7.egg/astroid/brain/brain_http.py', 'brain_http.py', 'python', 10.00),
(86, 1, 'bpalanici', 'https://raw.githubusercontent.com/bpalanici/Web/master/linters/pylint-2.3.1/pylint-2.3.1/.eggs/astroid-2.2.5-py3.7.egg/astroid/brain/brain_io.py', 'brain_io.py', 'python', 8.12),
(87, 1, 'bpalanici', 'https://raw.githubusercontent.com/bpalanici/Web/master/linters/pylint-2.3.1/pylint-2.3.1/.eggs/astroid-2.2.5-py3.7.egg/astroid/brain/brain_mechanize.py', 'brain_mechanize.py', 'python', 6.00),
(88, 1, 'bpalanici', 'https://raw.githubusercontent.com/bpalanici/Web/master/linters/pylint-2.3.1/pylint-2.3.1/.eggs/astroid-2.2.5-py3.7.egg/astroid/brain/brain_multiprocessing.py', 'brain_multiprocessing.py', 'python', 9.63),
(89, 1, 'bpalanici', 'https://raw.githubusercontent.com/bpalanici/Web/master/linters/pylint-2.3.1/pylint-2.3.1/.eggs/astroid-2.2.5-py3.7.egg/astroid/brain/brain_namedtuple_enum.py', 'brain_namedtuple_enum.py', 'python', 9.03),
(90, 1, 'bpalanici', 'https://raw.githubusercontent.com/bpalanici/Web/master/linters/pylint-2.3.1/pylint-2.3.1/.eggs/astroid-2.2.5-py3.7.egg/astroid/brain/brain_nose.py', 'brain_nose.py', 'python', 9.71),
(91, 1, 'bpalanici', 'https://raw.githubusercontent.com/bpalanici/Web/master/linters/pylint-2.3.1/pylint-2.3.1/.eggs/astroid-2.2.5-py3.7.egg/astroid/brain/brain_numpy.py', 'brain_numpy.py', 'python', 7.50),
(92, 1, 'bpalanici', 'https://raw.githubusercontent.com/bpalanici/Web/master/linters/pylint-2.3.1/pylint-2.3.1/.eggs/astroid-2.2.5-py3.7.egg/astroid/brain/brain_pkg_resources.py', 'brain_pkg_resources.py', 'python', 5.00),
(93, 1, 'bpalanici', 'https://raw.githubusercontent.com/bpalanici/Web/master/linters/pylint-2.3.1/pylint-2.3.1/.eggs/astroid-2.2.5-py3.7.egg/astroid/brain/brain_pytest.py', 'brain_pytest.py', 'python', 8.57),
(94, 1, 'bpalanici', 'https://raw.githubusercontent.com/bpalanici/Web/master/linters/pylint-2.3.1/pylint-2.3.1/.eggs/astroid-2.2.5-py3.7.egg/astroid/brain/brain_qt.py', 'brain_qt.py', 'python', 8.97),
(95, 1, 'bpalanici', 'https://raw.githubusercontent.com/bpalanici/Web/master/linters/pylint-2.3.1/pylint-2.3.1/.eggs/astroid-2.2.5-py3.7.egg/astroid/brain/brain_random.py', 'brain_random.py', 'python', 9.17),
(96, 1, 'bpalanici', 'https://raw.githubusercontent.com/bpalanici/Web/master/linters/pylint-2.3.1/pylint-2.3.1/.eggs/astroid-2.2.5-py3.7.egg/astroid/brain/brain_re.py', 'brain_re.py', 'python', 8.57),
(97, 1, 'bpalanici', 'https://raw.githubusercontent.com/bpalanici/Web/master/linters/pylint-2.3.1/pylint-2.3.1/.eggs/astroid-2.2.5-py3.7.egg/astroid/brain/brain_six.py', 'brain_six.py', 'python', 9.52),
(98, 1, 'bpalanici', 'https://raw.githubusercontent.com/bpalanici/Web/master/linters/pylint-2.3.1/pylint-2.3.1/.eggs/astroid-2.2.5-py3.7.egg/astroid/brain/brain_ssl.py', 'brain_ssl.py', 'python', 4.29),
(99, 1, 'bpalanici', 'https://raw.githubusercontent.com/bpalanici/Web/master/linters/pylint-2.3.1/pylint-2.3.1/.eggs/astroid-2.2.5-py3.7.egg/astroid/brain/brain_subprocess.py', 'brain_subprocess.py', 'python', 9.71),
(100, 1, 'bpalanici', 'https://raw.githubusercontent.com/bpalanici/Web/master/linters/pylint-2.3.1/pylint-2.3.1/.eggs/astroid-2.2.5-py3.7.egg/astroid/brain/brain_threading.py', 'brain_threading.py', 'python', 7.50),
(101, 1, 'bpalanici', 'https://raw.githubusercontent.com/bpalanici/Web/master/linters/pylint-2.3.1/pylint-2.3.1/.eggs/astroid-2.2.5-py3.7.egg/astroid/brain/brain_typing.py', 'brain_typing.py', 'python', 9.56),
(102, 1, 'bpalanici', 'https://raw.githubusercontent.com/bpalanici/Web/master/linters/pylint-2.3.1/pylint-2.3.1/.eggs/astroid-2.2.5-py3.7.egg/astroid/brain/brain_uuid.py', 'brain_uuid.py', 'python', 10.00),
(103, 1, 'bpalanici', 'https://raw.githubusercontent.com/bpalanici/Web/master/linters/pylint-2.3.1/pylint-2.3.1/.eggs/astroid-2.2.5-py3.7.egg/astroid/builder.py', 'builder.py', 'python', 8.96),
(104, 1, 'bpalanici', 'https://raw.githubusercontent.com/bpalanici/Web/master/linters/pylint-2.3.1/pylint-2.3.1/.eggs/astroid-2.2.5-py3.7.egg/astroid/context.py', 'context.py', 'python', 9.49),
(105, 1, 'bpalanici', 'https://raw.githubusercontent.com/bpalanici/Web/master/linters/pylint-2.3.1/pylint-2.3.1/.eggs/astroid-2.2.5-py3.7.egg/astroid/decorators.py', 'decorators.py', 'python', 9.00),
(106, 1, 'bpalanici', 'https://raw.githubusercontent.com/bpalanici/Web/master/linters/pylint-2.3.1/pylint-2.3.1/.eggs/astroid-2.2.5-py3.7.egg/astroid/exceptions.py', 'exceptions.py', 'python', 9.08),
(107, 1, 'bpalanici', 'https://raw.githubusercontent.com/bpalanici/Web/master/linters/pylint-2.3.1/pylint-2.3.1/.eggs/astroid-2.2.5-py3.7.egg/astroid/helpers.py', 'helpers.py', 'python', 9.02),
(108, 1, 'bpalanici', 'https://raw.githubusercontent.com/bpalanici/Web/master/linters/pylint-2.3.1/pylint-2.3.1/.eggs/astroid-2.2.5-py3.7.egg/astroid/inference.py', 'inference.py', 'python', 8.40),
(109, 1, 'bpalanici', 'https://raw.githubusercontent.com/bpalanici/Web/master/linters/pylint-2.3.1/pylint-2.3.1/.eggs/astroid-2.2.5-py3.7.egg/astroid/interpreter/_import/spec.py', 'spec.py', 'python', 8.97),
(110, 1, 'bpalanici', 'https://raw.githubusercontent.com/bpalanici/Web/master/linters/pylint-2.3.1/pylint-2.3.1/.eggs/astroid-2.2.5-py3.7.egg/astroid/interpreter/_import/util.py', 'util.py', 'python', 5.00),
(111, 1, 'bpalanici', 'https://raw.githubusercontent.com/bpalanici/Web/master/linters/pylint-2.3.1/pylint-2.3.1/.eggs/astroid-2.2.5-py3.7.egg/astroid/interpreter/dunder_lookup.py', 'dunder_lookup.py', 'python', 9.64),
(112, 1, 'bpalanici', 'https://raw.githubusercontent.com/bpalanici/Web/master/linters/pylint-2.3.1/pylint-2.3.1/.eggs/astroid-2.2.5-py3.7.egg/astroid/interpreter/objectmodel.py', 'objectmodel.py', 'python', 7.64),
(113, 1, 'bpalanici', 'https://raw.githubusercontent.com/bpalanici/Web/master/linters/pylint-2.3.1/pylint-2.3.1/.eggs/astroid-2.2.5-py3.7.egg/astroid/manager.py', 'manager.py', 'python', 9.03),
(114, 1, 'bpalanici', 'https://raw.githubusercontent.com/bpalanici/Web/master/linters/pylint-2.3.1/pylint-2.3.1/.eggs/astroid-2.2.5-py3.7.egg/astroid/mixins.py', 'mixins.py', 'python', 7.07),
(115, 1, 'bpalanici', 'https://raw.githubusercontent.com/bpalanici/Web/master/linters/pylint-2.3.1/pylint-2.3.1/.eggs/astroid-2.2.5-py3.7.egg/astroid/modutils.py', 'modutils.py', 'python', 9.39),
(116, 1, 'bpalanici', 'https://raw.githubusercontent.com/bpalanici/Web/master/linters/pylint-2.3.1/pylint-2.3.1/.eggs/astroid-2.2.5-py3.7.egg/astroid/node_classes.py', 'node_classes.py', 'python', 9.30),
(117, 1, 'bpalanici', 'https://raw.githubusercontent.com/bpalanici/Web/master/linters/pylint-2.3.1/pylint-2.3.1/.eggs/astroid-2.2.5-py3.7.egg/astroid/nodes.py', 'nodes.py', 'python', 10.00),
(118, 1, 'bpalanici', 'https://raw.githubusercontent.com/bpalanici/Web/master/linters/pylint-2.3.1/pylint-2.3.1/.eggs/astroid-2.2.5-py3.7.egg/astroid/objects.py', 'objects.py', 'python', 7.82),
(119, 1, 'bpalanici', 'https://raw.githubusercontent.com/bpalanici/Web/master/linters/pylint-2.3.1/pylint-2.3.1/.eggs/astroid-2.2.5-py3.7.egg/astroid/protocols.py', 'protocols.py', 'python', 8.96),
(120, 1, 'bpalanici', 'https://raw.githubusercontent.com/bpalanici/Web/master/linters/pylint-2.3.1/pylint-2.3.1/.eggs/astroid-2.2.5-py3.7.egg/astroid/raw_building.py', 'raw_building.py', 'python', 9.44),
(121, 1, 'bpalanici', 'https://raw.githubusercontent.com/bpalanici/Web/master/linters/pylint-2.3.1/pylint-2.3.1/.eggs/astroid-2.2.5-py3.7.egg/astroid/rebuilder.py', 'rebuilder.py', 'python', 9.29),
(122, 1, 'bpalanici', 'https://raw.githubusercontent.com/bpalanici/Web/master/linters/pylint-2.3.1/pylint-2.3.1/.eggs/astroid-2.2.5-py3.7.egg/astroid/scoped_nodes.py', 'scoped_nodes.py', 'python', 9.06),
(123, 1, 'bpalanici', 'https://raw.githubusercontent.com/bpalanici/Web/master/linters/pylint-2.3.1/pylint-2.3.1/.eggs/astroid-2.2.5-py3.7.egg/astroid/test_utils.py', 'test_utils.py', 'python', 8.39),
(124, 1, 'bpalanici', 'https://raw.githubusercontent.com/bpalanici/Web/master/linters/pylint-2.3.1/pylint-2.3.1/.eggs/astroid-2.2.5-py3.7.egg/astroid/transforms.py', 'transforms.py', 'python', 9.52),
(125, 1, 'bpalanici', 'https://raw.githubusercontent.com/bpalanici/Web/master/linters/pylint-2.3.1/pylint-2.3.1/.eggs/astroid-2.2.5-py3.7.egg/astroid/util.py', 'util.py', 'python', 8.57),
(126, 1, 'bpalanici', 'https://raw.githubusercontent.com/bpalanici/Web/master/linters/pylint-2.3.1/pylint-2.3.1/.eggs/atomicwrites-1.3.0-py3.7.egg/atomicwrites/__init__.py', '__init__.py', 'python', 7.70),
(127, 1, 'bpalanici', 'https://raw.githubusercontent.com/bpalanici/Web/master/linters/pylint-2.3.1/pylint-2.3.1/.eggs/attrs-19.1.0-py3.7.egg/attr/__init__.py', '__init__.py', 'python', -3.00),
(128, 1, 'bpalanici', 'https://raw.githubusercontent.com/bpalanici/Web/master/linters/pylint-2.3.1/pylint-2.3.1/.eggs/attrs-19.1.0-py3.7.egg/attr/_compat.py', '_compat.py', 'python', 2.09),
(129, 1, 'bpalanici', 'https://raw.githubusercontent.com/bpalanici/Web/master/linters/pylint-2.3.1/pylint-2.3.1/.eggs/attrs-19.1.0-py3.7.egg/attr/_config.py', '_config.py', 'python', 6.00),
(130, 1, 'bpalanici', 'https://raw.githubusercontent.com/bpalanici/Web/master/linters/pylint-2.3.1/pylint-2.3.1/.eggs/attrs-19.1.0-py3.7.egg/attr/_funcs.py', '_funcs.py', 'python', 3.92),
(131, 1, 'bpalanici', 'https://raw.githubusercontent.com/bpalanici/Web/master/linters/pylint-2.3.1/pylint-2.3.1/.eggs/attrs-19.1.0-py3.7.egg/attr/_make.py', '_make.py', 'python', 6.60),
(132, 1, 'bpalanici', 'https://raw.githubusercontent.com/bpalanici/Web/master/linters/pylint-2.3.1/pylint-2.3.1/.eggs/attrs-19.1.0-py3.7.egg/attr/converters.py', 'converters.py', 'python', 8.15),
(133, 1, 'bpalanici', 'https://raw.githubusercontent.com/bpalanici/Web/master/linters/pylint-2.3.1/pylint-2.3.1/.eggs/attrs-19.1.0-py3.7.egg/attr/exceptions.py', 'exceptions.py', 'python', 8.89),
(134, 1, 'bpalanici', 'https://raw.githubusercontent.com/bpalanici/Web/master/linters/pylint-2.3.1/pylint-2.3.1/.eggs/attrs-19.1.0-py3.7.egg/attr/filters.py', 'filters.py', 'python', 3.33),
(135, 1, 'bpalanici', 'https://raw.githubusercontent.com/bpalanici/Web/master/linters/pylint-2.3.1/pylint-2.3.1/.eggs/attrs-19.1.0-py3.7.egg/attr/validators.py', 'validators.py', 'python', 8.40),
(136, 1, 'bpalanici', 'https://raw.githubusercontent.com/bpalanici/Web/master/linters/pylint-2.3.1/pylint-2.3.1/.eggs/colorama-0.4.1-py3.7.egg/colorama/__init__.py', '__init__.py', 'python', -52.50),
(137, 1, 'bpalanici', 'https://raw.githubusercontent.com/bpalanici/Web/master/linters/pylint-2.3.1/pylint-2.3.1/.eggs/colorama-0.4.1-py3.7.egg/colorama/ansi.py', 'ansi.py', 'python', -0.68),
(138, 1, 'bpalanici', 'https://raw.githubusercontent.com/bpalanici/Web/master/linters/pylint-2.3.1/pylint-2.3.1/.eggs/colorama-0.4.1-py3.7.egg/colorama/ansitowin32.py', 'ansitowin32.py', 'python', 7.00),
(139, 1, 'bpalanici', 'https://raw.githubusercontent.com/bpalanici/Web/master/linters/pylint-2.3.1/pylint-2.3.1/.eggs/colorama-0.4.1-py3.7.egg/colorama/initialise.py', 'initialise.py', 'python', 4.80);

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
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

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
