-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2020 at 06:40 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `justfeed`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `articleid` int(11) NOT NULL,
  `heading` varchar(50) DEFAULT NULL,
  `article` text DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `upfeed` int(11) DEFAULT 0,
  `downfeed` int(11) DEFAULT 0,
  `tags` varchar(50) DEFAULT NULL,
  `uploadtime` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`articleid`, `heading`, `article`, `userid`, `upfeed`, `downfeed`, `tags`, `uploadtime`) VALUES
(10012, 'haha', 'haso be', 6, 0, 0, '#happy #goodlife', '2020-06-18 14:28:15'),
(10013, 'haha', 'haso be', 6, 0, 0, '#happy #goodlife', '2020-06-18 14:29:05'),
(10014, 'jjo', 'mitti aur barood', 6, 0, 0, '#jadu #bdahad #zameen', '2020-06-18 14:30:33'),
(10015, 'jjo', 'mitti aur barood', 6, 0, 0, '#jadu #bdahad #zameen', '2020-06-18 14:30:47'),
(10019, 'badmas', 'zameen mil gyi GG', 6, 1, 0, '#gg #zameen', '2020-06-18 14:49:30'),
(10021, 'bro mahan', 'bro zameen dede', 11, 0, 0, '#bro #life #zameen', '2020-06-18 15:09:04'),
(10022, 'haha', 'h=this is my first post. HEloo worlddd', 12, 1, 0, '#haha', '2020-06-18 15:49:52'),
(10023, 'Riding is life', 'Rider reborn', 16, 3, 1, 'Rider', '2020-06-19 09:50:26'),
(10024, 'Mobile is better than computer?', 'This is a mobile. This is not a pc. A mobile. Not pc. Bhag yhn se. ', 6, 2, 1, '#Mobile', '2020-06-20 08:43:44'),
(10025, 'Social Media', 'Hi Everybody, \r\nMust be thinking \r\n', 17, 1, 0, '#social_media #youth #influencer', '2020-06-21 02:51:06'),
(10026, 'WebApps', 'WebApps are a newer version of Apps', 17, 1, 0, '#techie # technology', '2020-06-21 06:13:03'),
(10027, 'Smart City', 'A Smart city is dumb.', 6, 1, 1, '#zameen', '2020-06-21 11:16:47'),
(10028, 'Media And Youth', 'RKB', 6, 0, 1, '#youth #media #nepotism', '2020-06-21 11:22:33'),
(10029, 'War with China?', 'No', 17, 1, 2, '#china #india #war #boycottchina', '2020-06-21 11:23:57'),
(10030, 'Cat', 'Cat is from the family of lions\r\nBut they are not as brave as lions.\r\nHaha\r\nHahhaa\r\nGhaahha\r\nGahhaha\r\nGagahhaaha\r\nGahahhahah\r\nHahahhaahah\r\nHahahanananamam\r\nHhaajajnananan\r\nHahahajaj\r\nHjaajajaj\r\nJajaja\r\nAhjajaka\r\nBajajajak\r\nAbajjaajak\r\nIs you read this far\r\nThanks\r\nHahah\r\nMy name is\r\nHaha\r\nLol\r\nHey ram\r\n', 6, 0, 2, '#life #cat', '2020-06-21 13:52:29'),
(10031, 'this is a post', 'mera naam joker.', 6, 1, 0, '#gg', '2020-06-21 19:48:03'),
(10033, 'merit', 'merit check post.', 6, 0, 0, '#merit', '2020-06-22 21:11:56'),
(10034, 'merit', 'merit check post.', 6, 0, 0, '#merit', '2020-06-22 21:12:13'),
(10035, 'merit check 2', 'this is for test trail 2', 6, 0, 0, '#merit', '2020-06-22 21:12:51'),
(10037, 'merit check 3', 'hahaahahah', 6, 1, 0, '#meirt', '2020-06-22 21:16:44'),
(10038, 'hulk hu mei', 'im an gry haha.', 18, 2, 0, '#angry', '2020-06-23 15:45:35');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `userid` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `feedback` text DEFAULT NULL,
  `responsetime` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`userid`, `email`, `feedback`, `responsetime`) VALUES
('11', 'bro@bro.com', 'test2', '2020-06-23 19:37:41'),
('11', 'bro@bro.com', 'NICe', '2020-06-23 19:41:56'),
('11', 'bro@bro.com', 'Final Test', '2020-06-23 19:42:28');

-- --------------------------------------------------------

--
-- Table structure for table `proloca`
--

CREATE TABLE `proloca` (
  `prof` varchar(30) NOT NULL,
  `loca` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `proloca`
--

INSERT INTO `proloca` (`prof`, `loca`) VALUES
('Private Employee', 'Bokaro'),
('Politician', 'Daltonganj'),
('Freelancer', 'Danbaad'),
('Journalist', 'Gumla'),
('Govt. Employee', 'Hazaribhag'),
('Business', 'Jamshedpur'),
('Farmer', 'Lohardaga'),
('Teacher', 'Ramgarh'),
('Student', 'Ranchi');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `tag` varchar(20) NOT NULL,
  `number` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`tag`, `number`) VALUES
('#', 0),
('#angry', 0),
('#apna', 0),
('#bdahad', 0),
('#boycottchina', 0),
('#bro', 0),
('#cat', 0),
('#china', 0),
('#coward', 0),
('#gg', 3),
('#haha', 0),
('#haq', 0),
('#india', 0),
('#influencer', 0),
('#jadu', 0),
('#life', 1),
('#media', 0),
('#meirt', 0),
('#merit', 2),
('#Mobile', 0),
('#nepotism', 0),
('#social_media', 0),
('#techie', 0),
('#war', 0),
('#youth', 0),
('#zameen', 5),
('dog', 0),
('Rider', 0),
('technology', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `name` text NOT NULL,
  `email` text NOT NULL,
  `pass` text NOT NULL,
  `age` date NOT NULL,
  `prof` text NOT NULL,
  `loca` text NOT NULL,
  `picname` text NOT NULL,
  `userid` int(11) NOT NULL,
  `merit` int(11) NOT NULL,
  `article` int(11) NOT NULL,
  `upfeed` varchar(500) NOT NULL,
  `downfeed` varchar(500) NOT NULL,
  `saved` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `email`, `pass`, `age`, `prof`, `loca`, `picname`, `userid`, `merit`, `article`, `upfeed`, `downfeed`, `saved`) VALUES
('aman meme', 'aman@gmail.com', 'qwerty123', '0002-02-02', 'Journalist', 'Jamshedpur', 'Pic6.jpeg', 6, 40, 20, '0 10023  10024  10016  10022  10025  10019  10031  10032  10038 ', '0   10027  10028  10030  10029 ', '0  10028  10030  10031  10027  10029  10032 '),
('slow Browser', 'sslow@slow.com', 'slowslow123', '0000-00-00', 'Privatewa', 'Hazaribhag', 'Pic12.jpeg', 12, 1100, 1, '0', '0', '0'),
('bro', 'bro@bro.com', 'brobro123', '0222-02-02', 'Student', 'Jamshedpur', 'Pic11.jpeg', 11, 1100, 1, '0 10036  10038 ', '0 10029  10032  10023 ', '0'),
('billa', 'billa@cat.com', 'billa123', '0002-03-31', 'Govt. Employee', 'Hazaribhag', 'Pic14.jpeg', 14, 1100, 0, '0', '0', '0'),
('Austun', 'jaiaustun13@gmail.com', 'Ranchi@123', '2000-08-23', 'Student', 'Ranchi', 'Pic16.jpeg', 16, 1105, 1, '0', '0', '0'),
('Abhishek', 'billa@billa.com', 'abhi1234', '1999-10-22', 'Student', 'Ranchi', 'Pic17.jpeg', 17, 1100, 1, '0 10023  10023  10020  10016  10026  10027  10029 ', '0                                                     10024  10030 ', '0'),
('Hulk Kumar', 'hulk@gmail.com', 'hulk12345', '1994-05-09', 'Farmer', 'Danbaad', 'Pic18.jpeg', 18, 120, 1, '0 10037 ', '0', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`articleid`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`tag`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `unq` (`email`) USING HASH;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
