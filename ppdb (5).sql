-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2018 at 12:53 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `m_admin`
--

CREATE TABLE `m_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(80) NOT NULL,
  `admin_email` varchar(80) NOT NULL,
  `admin_password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `m_admin`
--

INSERT INTO `m_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'test', 'wadguh@gmail.com', 'ZENIORANET');

-- --------------------------------------------------------

--
-- Table structure for table `m_confirm`
--

CREATE TABLE `m_confirm` (
  `confirm_id` int(11) NOT NULL,
  `confirm_registration_code` varchar(45) NOT NULL,
  `confirm_user_account` varchar(40) NOT NULL,
  `confirm_admin_account` varchar(40) NOT NULL,
  `confirm_image` varchar(100) NOT NULL,
  `confirm_price` int(11) NOT NULL,
  `confirm_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `m_confirm`
--



-- --------------------------------------------------------

--
-- Table structure for table `m_event`
--

CREATE TABLE `m_event` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(45) NOT NULL,
  `event_date` date NOT NULL,
  `event_detail` text NOT NULL,
  `event_img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `m_event`
--


-- --------------------------------------------------------

--
-- Table structure for table `m_news`
--

CREATE TABLE `m_news` (
  `news_id` int(11) NOT NULL,
  `news_title` varchar(130) NOT NULL,
  `news_content` text NOT NULL,
  `news_datestamp` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `m_news`
--


-- --------------------------------------------------------

--
-- Table structure for table `m_notif`
--

CREATE TABLE `m_notif` (
  `notif_id` int(11) NOT NULL,
  `notif_user_id` int(11) NOT NULL,
  `notif_reg_id` varchar(100) NOT NULL,
  `notif_title` varchar(200) NOT NULL,
  `notif_message` text NOT NULL,
  `notif_read` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `m_notif`
--


-- --------------------------------------------------------

--
-- Table structure for table `m_peng`
--

CREATE TABLE `m_peng` (
  `peng_id` int(11) NOT NULL,
  `peng_name` varchar(100) NOT NULL,
  `peng_date` date NOT NULL,
  `peng_detail` text NOT NULL,
  `peng_img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `m_peng`
--
-- --------------------------------------------------------

--
-- Table structure for table `m_registration`
--

CREATE TABLE `m_registration` (
  `registration_id` int(11) NOT NULL,
  `registration_code` varchar(45) NOT NULL,
  `registration_full_name` varchar(100) NOT NULL,
  `registration_place_birthdate` varchar(100) NOT NULL,
  `registration_address` varchar(300) NOT NULL,
  `registration_numphone` varchar(13) NOT NULL,
  `registration_father_name` varchar(100) NOT NULL,
  `registration_mother_name` varchar(100) NOT NULL,
  `registration_edu_level` enum('SD','SMP','SMA') NOT NULL,
  `registration_school` varchar(100) DEFAULT NULL,
  `registration_ijasah_number` varchar(45) DEFAULT NULL,
  `registration_pict1` varchar(45) NOT NULL,
  `registration_pict2` varchar(45) NOT NULL,
  `registration_ijasah_scan` varchar(45) NOT NULL,
  `registration_doc` varchar(45) NOT NULL,
  `registration_status` tinyint(1) NOT NULL,
  `registration_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `m_registration`
--


-- --------------------------------------------------------

--
-- Table structure for table `m_user`
--

CREATE TABLE `m_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(80) NOT NULL,
  `user_email` varchar(45) NOT NULL,
  `user_password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `m_user`
--


--
-- Indexes for dumped tables
--

--
-- Indexes for table `m_admin`
--
ALTER TABLE `m_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `m_confirm`
--
ALTER TABLE `m_confirm`
  ADD PRIMARY KEY (`confirm_id`);

--
-- Indexes for table `m_event`
--
ALTER TABLE `m_event`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `m_news`
--
ALTER TABLE `m_news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `m_notif`
--
ALTER TABLE `m_notif`
  ADD PRIMARY KEY (`notif_id`);

--
-- Indexes for table `m_peng`
--
ALTER TABLE `m_peng`
  ADD PRIMARY KEY (`peng_id`);

--
-- Indexes for table `m_registration`
--
ALTER TABLE `m_registration`
  ADD PRIMARY KEY (`registration_id`),
  ADD UNIQUE KEY `registtration_code_UNIQUE` (`registration_code`);

--
-- Indexes for table `m_user`
--
ALTER TABLE `m_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `m_admin`
--
ALTER TABLE `m_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `m_confirm`
--
ALTER TABLE `m_confirm`
  MODIFY `confirm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `m_event`
--
ALTER TABLE `m_event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `m_news`
--
ALTER TABLE `m_news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `m_notif`
--
ALTER TABLE `m_notif`
  MODIFY `notif_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `m_peng`
--
ALTER TABLE `m_peng`
  MODIFY `peng_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `m_registration`
--
ALTER TABLE `m_registration`
  MODIFY `registration_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `m_user`
--
ALTER TABLE `m_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
