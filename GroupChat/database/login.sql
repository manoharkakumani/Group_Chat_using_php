-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2019 at 07:48 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login`
--

-- --------------------------------------------------------

--
-- Table structure for table `janam`
--

CREATE TABLE `janam` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `verify` int(11) NOT NULL,
  `verify1` int(11) NOT NULL DEFAULT '1',
  `code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `janam`
--

INSERT INTO `janam` (`id`, `name`, `email`, `password`, `verify`, `verify1`, `code`) VALUES
(1, 'manohar', 'mano@gmail.com', '1', 1, 1, 8376),
(2, 'balu', 'balu@gmail.com', '2', 1, 1, 2452);

-- --------------------------------------------------------

--
-- Table structure for table `kaburulu`
--

CREATE TABLE `kaburulu` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `message` varchar(225) NOT NULL,
  `time` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kaburulu`
--

INSERT INTO `kaburulu` (`id`, `name`, `message`, `time`) VALUES
(1, 'manohar', 'hi', '14/01/2019 - 04:12:00 PM'),
(2, 'manohar', 'hello', '14/01/2019 - 04:12:07 PM'),
(3, 'manohar', 'cool', '14/01/2019 - 04:12:59 PM'),
(4, 'manohar', 'ddd', '14/01/2019 - 04:13:00 PM'),
(5, 'manohar', 'ddd', '14/01/2019 - 04:13:01 PM'),
(6, 'manohar', 'ddd', '14/01/2019 - 04:13:03 PM'),
(7, 'manohar', 'sdsadad', '14/01/2019 - 04:13:06 PM'),
(8, 'manohar', 'mm', '14/01/2019 - 04:13:39 PM'),
(9, 'manohar', 'aa', '14/01/2019 - 04:13:43 PM'),
(10, 'manohar', 'kk', '14/01/2019 - 07:34:19 PM'),
(11, 'manohar', 'kk', '14/01/2019 - 07:34:27 PM'),
(12, 'manohar', 'aa', '14/01/2019 - 07:34:31 PM'),
(13, 'manohar', 'jj', '14/01/2019 - 07:53:30 PM'),
(14, 'manohar', 'kk', '15/01/2019 - 08:58:32 PM'),
(15, 'manohar', 'jo44', '18/01/2019 - 08:20:31 PM'),
(16, 'manohar', 'oo', '20/01/2019 - 08:51:30 PM'),
(17, 'manohar', 'sa', '20/01/2019 - 08:51:31 PM'),
(18, 'manohar', 'werwe', '20/01/2019 - 08:51:33 PM'),
(19, 'manohar', 'ss', '20/01/2019 - 08:52:00 PM'),
(20, 'manohar', 'aaas', '20/01/2019 - 08:52:04 PM'),
(21, 'manohar', 'hello', '20/01/2019 - 08:52:22 PM'),
(22, 'manohar', 'fsdsdf', '20/01/2019 - 08:52:40 PM'),
(23, 'manohar', 'gdg', '20/01/2019 - 08:52:49 PM'),
(24, 'manohar', 'gdfg', '20/01/2019 - 08:52:51 PM'),
(25, 'manohar', 'cool', '20/01/2019 - 08:52:54 PM'),
(26, 'balu', 'hello', '22/01/2019 - 09:06:29 AM'),
(27, 'manohar', 'hi', '22/01/2019 - 09:06:36 AM'),
(28, 'manohar', '<button type=\"button\">Click Me!</button>', '22/01/2019 - 10:51:48 AM'),
(29, 'manohar', '<b>', '22/01/2019 - 10:52:35 AM'),
(30, 'manohar', '<b>mano</b>', '22/01/2019 - 10:52:45 AM'),
(31, 'manohar', 'jj', '23/01/2019 - 09:21:29 PM'),
(32, 'manohar', 'ww', '23/01/2019 - 09:21:31 PM'),
(33, 'manohar', 'nice', '23/01/2019 - 09:21:36 PM'),
(34, 'manohar', 'ee', '23/01/2019 - 09:21:48 PM'),
(35, 'manohar', 'eedx', '23/01/2019 - 09:21:50 PM'),
(36, 'manohar', 'dfsfsdfsf', '23/01/2019 - 09:21:52 PM'),
(37, 'manohar', 'fssdfsdfsffmxs', '23/01/2019 - 09:21:54 PM'),
(38, 'manohar', 'hi', '25/01/2019 - 05:48:01 PM'),
(39, 'balu', 'hi', '25/01/2019 - 05:54:56 PM'),
(40, 'balu', 'kk', '25/01/2019 - 05:55:04 PM'),
(41, 'manohar', 'hi', '25/01/2019 - 05:55:21 PM'),
(42, 'manohar', 'kk', '25/01/2019 - 05:55:28 PM'),
(43, 'manohar', 'cool', '21/02/2019 - 09:15:58 AM'),
(44, 'manohar', 'rr', '21/02/2019 - 09:17:15 AM'),
(45, 'manohar', 'how are you', '04/03/2019 - 12:14:11 PM'),
(46, 'manohar', 'ddddddddddddddddddddddddddddddddddddddddddddddddddd', '04/03/2019 - 12:14:22 PM'),
(47, 'manohar', 'ddddd', '04/03/2019 - 12:14:24 PM'),
(48, 'manohar', 'x', '04/03/2019 - 12:14:43 PM'),
(49, 'manohar', 'hi', '11/03/2019 - 12:28:00 PM'),
(50, 'manohar', 'hi', '12/03/2019 - 10:32:01 AM'),
(51, 'manohar', 'ff', '12/03/2019 - 10:32:15 AM'),
(52, 'balu', 'dd', '12/03/2019 - 10:32:18 AM'),
(53, 'manohar', 'aa', '12/03/2019 - 10:36:16 AM'),
(54, 'balu', 'jji[[adada', '12/03/2019 - 10:36:20 AM'),
(55, 'manohar', 'hi', '14/04/2019 - 07:52:33 PM'),
(56, 'balu', 'hai', '14/04/2019 - 07:52:38 PM'),
(57, 'balu', 'how r u', '14/04/2019 - 07:52:42 PM'),
(58, 'manohar', 'good', '14/04/2019 - 07:52:46 PM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `janam`
--
ALTER TABLE `janam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kaburulu`
--
ALTER TABLE `kaburulu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `janam`
--
ALTER TABLE `janam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `kaburulu`
--
ALTER TABLE `kaburulu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
