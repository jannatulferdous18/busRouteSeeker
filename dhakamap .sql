-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2017 at 06:41 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dhakamap`
--

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE IF NOT EXISTS `bus` (
`bus_id` int(11) NOT NULL,
  `bus_name` varchar(255) NOT NULL,
  `route_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`bus_id`, `bus_name`, `route_id`) VALUES
(1, 'Moitri', 1),
(2, 'Raja City', 1),
(4, 'FTCL', 1),
(5, 'Maloncho', 2),
(6, 'Akik Pariabah', 3),
(7, 'DISHARI PORIBOHON', 4),
(8, 'Abcs', 5);

-- --------------------------------------------------------

--
-- Table structure for table `fare`
--

CREATE TABLE IF NOT EXISTS `fare` (
`br_id` int(11) NOT NULL,
  `stoppage_name` varchar(200) NOT NULL,
  `fare` int(11) NOT NULL,
  `route_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `fare`
--

INSERT INTO `fare` (`br_id`, `stoppage_name`, `fare`, `route_id`) VALUES
(1, 'Motijheel', 0, 1),
(2, 'Gulisthan', 5, 1),
(3, 'Paltan', 8, 1),
(4, 'Press Club', 10, 1),
(5, 'Shahbagh', 15, 1),
(6, 'Kataban', 17, 1),
(7, 'Science Labratory', 20, 1),
(8, 'Jhigatola', 22, 1),
(9, 'Dhanmondi 15', 24, 1),
(10, 'Sankar', 26, 1),
(11, 'Lalmatiya', 28, 1),
(12, 'Mohammadpur', 30, 1),
(13, 'Katherpul', 0, 2),
(14, 'Doyagonj', 5, 2),
(15, 'Wari', 10, 2),
(16, 'Gulistan', 15, 2),
(17, 'Paltan', 15, 2),
(18, 'Press Club', 15, 2),
(19, 'Shahbagh', 20, 2),
(20, 'Bata Signal', 20, 2),
(21, 'Science Lab', 25, 2),
(22, 'Jhigatola', 30, 2),
(23, 'Dhanmondi 15', 30, 2),
(24, 'Sankar', 35, 2),
(25, 'Lalmatiya', 35, 2),
(26, 'Mohammadpur', 35, 2),
(27, 'Bashilla', 45, 2),
(28, 'Badda', 0, 3),
(29, 'Natun Bazaar', 10, 3),
(30, 'Jamuna Future Park', 20, 3),
(31, 'Kalshi', 35, 3),
(32, 'Mirpur 10', 40, 3),
(33, 'Mirpur 1', 45, 3),
(34, 'Gabtoli', 55, 3),
(35, 'Babu bazar', 0, 4),
(36, 'Gulistan', 10, 4),
(37, 'Mirpur 1', 25, 4),
(38, 'National Zoo', 35, 4);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
`m_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`m_id`, `name`, `email`, `nationality`, `username`) VALUES
(1, 'Jannatul Ferdous', 'jannatul.uiu@gmail.com', 'Bangladeshi', 'jf.muna'),
(2, 'sadasd', 'sadsad@gmail.com', 'Bangladeshi', 'asdasdasdsa');

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

CREATE TABLE IF NOT EXISTS `route` (
`r_id` int(11) NOT NULL,
  `latit` double NOT NULL,
  `longit` double NOT NULL,
  `stoppage_name` varchar(200) NOT NULL,
  `route_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `route`
--

INSERT INTO `route` (`r_id`, `latit`, `longit`, `stoppage_name`, `route_id`) VALUES
(1, 23.726976143226764, 90.42121410369873, 'Motijheel', 1),
(2, 23.72561088330802, 90.4119873046875, 'Gulistan', 1),
(3, 23.73006020292689, 90.41152596473694, 'Paltan', 1),
(4, 23.729991450798885, 90.40948748588562, 'Press Club', 1),
(5, 23.738084309288187, 90.39527177810669, 'Shahbagh', 1),
(6, 23.73863429113975, 90.39114117622375, 'Kataban', 1),
(7, 23.739449438541975, 90.38305163383484, 'Science Labratory', 1),
(8, 23.739164628583545, 90.3754448890686, 'Jhigatola', 1),
(9, 23.74397685115536, 90.37274122238159, 'Dhanmondi 15', 1),
(10, 23.750586001761825, 90.36826729774475, 'Sankar', 1),
(11, 23.754278338068122, 90.36484479904175, 'Lalmatiya', 1),
(12, 23.757037701882176, 90.36046743392944, 'Mohammadpur', 1),
(13, 23.705621448581415, 90.41945457458496, 'Katherpul', 2),
(14, 23.71149581161786, 90.42338132858276, 'Doyagonj', 2),
(15, 23.72093549642416, 90.41761994361877, 'Wari', 2),
(16, 23.725326043104978, 90.41196584701538, 'Gulistan', 2),
(17, 23.73004055946545, 90.4095733165741, 'Paltan', 2),
(18, 23.730011094267727, 90.40729880332947, 'Press Club', 2),
(19, 23.73789770777535, 90.3951644897461, 'Shahbagh', 2),
(20, 23.738938744380665, 90.38879156112671, 'Bata Signal', 2),
(21, 23.739380691367643, 90.38292288780212, 'Science Lab', 2),
(22, 23.73907623915949, 90.37548780441284, 'Jhigatola', 2),
(23, 23.744173264627047, 90.37264466285706, 'Dhanmondi 15', 2),
(24, 23.750595821944064, 90.36829948425293, 'Sankar', 2),
(25, 23.754612214380124, 90.36435127258301, 'Lalmatiya', 2),
(26, 23.757057341272642, 90.3611969947815, 'Mohammadpur', 2),
(27, 23.745047300984407, 90.34778594970703, 'Bashilla', 2),
(28, 23.780701017418114, 90.42564511299133, 'Badda', 3),
(29, 23.797576909308106, 90.42349934577942, 'Natun Bazaar', 3),
(30, 23.81345925428262, 90.42112827301025, 'Jamuna Future Park', 3),
(31, 23.820428026039846, 90.38203239440918, 'Kalshi', 3),
(32, 23.811574677093244, 90.3720760345459, 'Mirpur 10', 3),
(33, 23.804153888514204, 90.37035942077637, 'Mirpur 1', 3),
(34, 23.78188897910765, 90.34400939941406, 'Gabtoli', 3),
(35, 23.70933470546835, 90.40271759033203, 'Babu bazar', 4),
(36, 23.724893870573993, 90.41074275970459, 'Gulistan', 4),
(37, 23.782964025991557, 90.34704566001892, 'Mirpur 1', 4),
(38, 23.812183241467892, 90.34730315208435, 'National Zoo', 4),
(39, 23.775806697150593, 90.40012657642365, 'A', 5),
(40, 23.776066881299098, 90.39968132972717, 'B', 5),
(41, 23.77639088347332, 90.39917707443237, 'C', 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`) VALUES
('admin', '12345'),
('asdasdasdsa', '132131'),
('jf.muna', 'jf.muna');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bus`
--
ALTER TABLE `bus`
 ADD PRIMARY KEY (`bus_id`,`bus_name`);

--
-- Indexes for table `fare`
--
ALTER TABLE `fare`
 ADD PRIMARY KEY (`br_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
 ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `route`
--
ALTER TABLE `route`
 ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bus`
--
ALTER TABLE `bus`
MODIFY `bus_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `fare`
--
ALTER TABLE `fare`
MODIFY `br_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `route`
--
ALTER TABLE `route`
MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=42;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
