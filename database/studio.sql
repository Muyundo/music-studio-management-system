-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 05, 2021 at 09:50 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studio`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

DROP TABLE IF EXISTS `appointments`;
CREATE TABLE IF NOT EXISTS `appointments` (
  `appointment_id` int(10) NOT NULL AUTO_INCREMENT,
  `client_id` int(10) DEFAULT NULL,
  `song_id` int(10) DEFAULT NULL,
  `appoint_date` date DEFAULT NULL,
  `activity` varchar(225) DEFAULT NULL,
  `location` varchar(225) DEFAULT NULL,
  `time` time DEFAULT NULL,
  PRIMARY KEY (`appointment_id`),
  KEY `fk_appoint_client_idx` (`client_id`),
  KEY `fk_appoint_songs_idx` (`song_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `client_id` int(10) NOT NULL AUTO_INCREMENT,
  `fname` varchar(225) NOT NULL,
  `lname` varchar(225) NOT NULL,
  `gender` varchar(225) NOT NULL,
  `phone` varchar(225) NOT NULL,
  `date_reg` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`client_id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_id`, `fname`, `lname`, `gender`, `phone`, `date_reg`) VALUES
(43, 'Ephine', 'Akinyi', 'female', '0000000000', '2021-11-28 21:38:55'),
(44, 'Jannet', 'Jane', 'female', '0700000000', '2021-11-29 15:06:07'),
(45, 'Clarence', 'J', 'female', '0174101474', '2021-12-01 11:33:51'),
(46, 'Faith', 'Wanjiku', 'female', '0121212121', '2021-12-02 13:18:38'),
(47, 'xyz', 'zxy', 'female', '0000001111', '2021-12-02 20:06:17');

-- --------------------------------------------------------

--
-- Stand-in structure for view `complete_songs`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `complete_songs`;
CREATE TABLE IF NOT EXISTS `complete_songs` (
`status_id` int(10)
,`song_id` int(10)
,`client_id` int(10)
,`editing` varchar(225)
);

-- --------------------------------------------------------

--
-- Table structure for table `nav_tabs`
--

DROP TABLE IF EXISTS `nav_tabs`;
CREATE TABLE IF NOT EXISTS `nav_tabs` (
  `nav_id` int(10) NOT NULL AUTO_INCREMENT,
  `nav1` varchar(225) DEFAULT NULL,
  `nav2` varchar(225) DEFAULT NULL,
  `nav3` varchar(225) DEFAULT NULL,
  `nav4` varchar(225) DEFAULT NULL,
  `nav5` varchar(225) DEFAULT NULL,
  `nav6` varchar(225) DEFAULT NULL,
  `nav7` varchar(225) DEFAULT NULL,
  `nav8` varchar(225) DEFAULT NULL,
  `nav9` varchar(225) DEFAULT NULL,
  `nav10` varchar(225) DEFAULT NULL,
  `nav11` varchar(225) DEFAULT NULL,
  `nav12` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`nav_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nav_tabs`
--

INSERT INTO `nav_tabs` (`nav_id`, `nav1`, `nav2`, `nav3`, `nav4`, `nav5`, `nav6`, `nav7`, `nav8`, `nav9`, `nav10`, `nav11`, `nav12`) VALUES
(1, 'MUSIC STUDIO', 'DASHBOARD', ' Administrator', 'Admin Account', 'Client Activities', 'Registered clients', 'Add Client', 'Validation', 'Music Activities', 'Song Production', ' Financials', 'Financial Report');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `payment_id` int(10) NOT NULL AUTO_INCREMENT,
  `client_id` int(10) NOT NULL,
  `cost` int(10) DEFAULT NULL,
  `diposit` int(10) DEFAULT NULL,
  `balance` int(10) DEFAULT NULL,
  `method` varchar(225) NOT NULL,
  `date_diposited` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`payment_id`),
  KEY `fk1_client_idx` (`client_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `client_id`, `cost`, `diposit`, `balance`, `method`, `date_diposited`) VALUES
(7, 43, 15000, 6500, 8500, '', '2021-11-28 21:39:18'),
(8, 43, 7000, 2000, 5000, '', '2021-11-29 11:35:24'),
(9, 43, 0, 5000, -5000, '', '2021-11-29 11:36:01'),
(10, 43, 0, 2000, -2000, '', '2021-11-29 11:36:23'),
(11, 43, 0, 5000, -5000, '', '2021-11-29 11:36:49'),
(12, 43, 0, 0, 0, 'mpesa', '2021-11-29 13:34:02'),
(13, 43, 0, 0, 0, 'mpesa', '2021-11-29 13:33:52'),
(14, 43, 0, 500, -500, 'cash', '2021-11-29 13:31:57'),
(15, 43, 0, 1000, -1000, 'cash', '2021-11-29 13:32:20'),
(16, 43, 9000, 5000, 4000, 'cash', '2021-11-29 13:35:12'),
(17, 43, 0, 1000, -1000, '', '2021-11-29 13:42:15'),
(18, 43, 0, 500, -500, 'cash', '2021-11-29 13:44:48'),
(19, 43, 0, 500, -500, '', '2021-11-29 13:45:15'),
(20, 43, 0, 1000, -1000, 'cash', '2021-11-29 13:53:37'),
(21, 44, 25000, 15000, 10000, 'cash', '2021-11-29 15:06:40'),
(22, 45, 5000, 2000, 3000, 'cash', '2021-12-01 11:34:45'),
(23, 45, 5000, 4000, 1000, 'mpesa', '2021-12-01 12:47:39'),
(24, 46, 25000, 10000, 15000, 'mpesa', '2021-12-02 13:19:14'),
(25, 47, 10000, 5000, 5000, 'mpesa', '2021-12-02 20:07:15'),
(26, 44, 10000, 7000, 3000, 'cash', '2021-12-04 16:08:42');

--
-- Triggers `payments`
--
DROP TRIGGER IF EXISTS `payments_BEFORE_INSERT`;
DELIMITER $$
CREATE TRIGGER `payments_BEFORE_INSERT` BEFORE INSERT ON `payments` FOR EACH ROW BEGIN
set new.balance = new.cost - new.diposit;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

DROP TABLE IF EXISTS `songs`;
CREATE TABLE IF NOT EXISTS `songs` (
  `song_id` int(10) NOT NULL AUTO_INCREMENT,
  `client_id` int(10) DEFAULT NULL,
  `category` varchar(225) DEFAULT NULL,
  `type` varchar(225) DEFAULT NULL,
  `title` varchar(225) DEFAULT NULL,
  PRIMARY KEY (`song_id`),
  KEY `fk_client_idx` (`client_id`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`song_id`, `client_id`, `category`, `type`, `title`) VALUES
(53, 43, 'audio', 'gospel', 'q'),
(54, 43, 'video', 'hipop', 'wert'),
(55, 43, 'video', 'gospel', 'l'),
(56, 44, 'audio', 'gospel', 'zxc'),
(57, 45, 'audio', 'gospel', 'wertyu'),
(58, 45, 'audio', 'gospel', 'TYTY'),
(59, 46, 'video', 'hipop', 'xy'),
(60, 47, 'audio', 'gospel', 'werty'),
(61, 44, 'audio', 'hipop', 'rrrryyy');

--
-- Triggers `songs`
--
DROP TRIGGER IF EXISTS `songs_AFTER_INSERT`;
DELIMITER $$
CREATE TRIGGER `songs_AFTER_INSERT` AFTER INSERT ON `songs` FOR EACH ROW BEGIN
insert into studio.song_status(song_id, client_id) values(new.song_id, new.client_id)
;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `songs_profile`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `songs_profile`;
CREATE TABLE IF NOT EXISTS `songs_profile` (
`client_id` int(10)
,`song_id` int(10)
,`title` varchar(225)
,`category` varchar(225)
,`status_id` int(10)
,`recording` varchar(225)
,`editing` varchar(225)
,`upload` varchar(225)
,`link` varchar(225)
);

-- --------------------------------------------------------

--
-- Table structure for table `song_status`
--

DROP TABLE IF EXISTS `song_status`;
CREATE TABLE IF NOT EXISTS `song_status` (
  `status_id` int(10) NOT NULL AUTO_INCREMENT,
  `song_id` int(10) DEFAULT NULL,
  `client_id` int(10) DEFAULT NULL,
  `recording` varchar(225) DEFAULT 'pending',
  `editing` varchar(225) DEFAULT 'pending',
  `upload` varchar(225) DEFAULT 'pending',
  `link` varchar(225) DEFAULT 'pending upload',
  PRIMARY KEY (`status_id`),
  KEY `fk_song_idx` (`song_id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `song_status`
--

INSERT INTO `song_status` (`status_id`, `song_id`, `client_id`, `recording`, `editing`, `upload`, `link`) VALUES
(29, 53, 43, 'complete', 'complete', 'uploaded', 'https://youtu.be/YUj0MPxmvss'),
(30, 54, 43, 'complete', 'complete', 'uploaded', 'ZZZZZZZZZZ'),
(31, 55, 43, 'complete', 'complete', 'uploaded', 'lkjhgf'),
(32, 56, 44, 'complete', 'complete', 'uploaded', 'rrrr'),
(33, 57, 45, 'pending', 'pending', 'pending', 'pending upload'),
(34, 58, 45, 'complete', 'active', 'pending', 'pending'),
(35, 59, 46, 'pending', 'pending', 'pending', 'pending upload'),
(36, 60, 47, 'pending', 'pending', 'pending', 'pending upload'),
(37, 61, 44, 'pending', 'pending', 'pending', 'pending upload');

-- --------------------------------------------------------

--
-- Stand-in structure for view `uploaded_songs`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `uploaded_songs`;
CREATE TABLE IF NOT EXISTS `uploaded_songs` (
`status_id` int(10)
,`song_id` int(10)
,`client_id` int(10)
,`upload` varchar(225)
);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fname` varchar(225) NOT NULL,
  `lname` varchar(225) NOT NULL,
  `uname` varchar(225) NOT NULL,
  `utype` varchar(225) NOT NULL,
  `pass` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `uname`, `utype`, `pass`) VALUES
(4, 'admin', 'admin', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(5, 'Evin', 'Akinyi', 'evin', 'user', '121aff2d49f52ba9d347e28416b35ccd');

-- --------------------------------------------------------

--
-- Structure for view `complete_songs`
--
DROP TABLE IF EXISTS `complete_songs`;

DROP VIEW IF EXISTS `complete_songs`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `complete_songs`  AS  select `song_status`.`status_id` AS `status_id`,`song_status`.`song_id` AS `song_id`,`song_status`.`client_id` AS `client_id`,`song_status`.`editing` AS `editing` from `song_status` where (`song_status`.`editing` = 'complete') ;

-- --------------------------------------------------------

--
-- Structure for view `songs_profile`
--
DROP TABLE IF EXISTS `songs_profile`;

DROP VIEW IF EXISTS `songs_profile`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `songs_profile`  AS  select `s`.`client_id` AS `client_id`,`s`.`song_id` AS `song_id`,`s`.`title` AS `title`,`s`.`category` AS `category`,`t`.`status_id` AS `status_id`,`t`.`recording` AS `recording`,`t`.`editing` AS `editing`,`t`.`upload` AS `upload`,`t`.`link` AS `link` from (`song_status` `t` join `songs` `s` on((`t`.`client_id` = `s`.`client_id`))) group by `t`.`status_id` ;

-- --------------------------------------------------------

--
-- Structure for view `uploaded_songs`
--
DROP TABLE IF EXISTS `uploaded_songs`;

DROP VIEW IF EXISTS `uploaded_songs`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `uploaded_songs`  AS  select `song_status`.`status_id` AS `status_id`,`song_status`.`song_id` AS `song_id`,`song_status`.`client_id` AS `client_id`,`song_status`.`upload` AS `upload` from `song_status` where (`song_status`.`upload` = 'uploaded') ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `fk_appoint_client` FOREIGN KEY (`client_id`) REFERENCES `clients` (`client_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_appoint_songs` FOREIGN KEY (`song_id`) REFERENCES `songs` (`song_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `fk1_client` FOREIGN KEY (`client_id`) REFERENCES `clients` (`client_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `songs`
--
ALTER TABLE `songs`
  ADD CONSTRAINT `fk_client` FOREIGN KEY (`client_id`) REFERENCES `clients` (`client_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `song_status`
--
ALTER TABLE `song_status`
  ADD CONSTRAINT `fk1_songs` FOREIGN KEY (`song_id`) REFERENCES `songs` (`song_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
