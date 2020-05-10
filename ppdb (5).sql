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
(1, 'Chimemoo', 'wadguh@gmail.com', 'ZENIORANET');

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

INSERT INTO `m_confirm` (`confirm_id`, `confirm_registration_code`, `confirm_user_account`, `confirm_admin_account`, `confirm_image`, `confirm_price`, `confirm_status`) VALUES
(1, 'PSB001', '3242344823', '23423424343', 'djasdasidjaid', 75000, 0),
(3, 'PSB4-05122018', '0898979778866', '0898979778866', 'Transfer-PSB5-05122018.png', 100000, 1),
(4, 'PSB5-05122018', '0898979778866', '0898979778866', 'Transfer-PSB6-05122018.jpg', 50000, 0);

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

INSERT INTO `m_event` (`event_id`, `event_name`, `event_date`, `event_detail`, `event_img`) VALUES
(13, 'TESTe', '2018-04-26', '<p>kjfksdljfkdsfjsklfjsksfjsfsfsf</p>\r\n', 'event_152437497417.jpg'),
(14, 'TESTe', '2018-04-26', '<p>bhbhbhjbjb</p>\r\n', 'event_152437503978.jpg'),
(17, 'ENtah', '2018-04-01', '<p>dsfjskdfjdkfds</p>\r\n', 'event_152454239760.jpg');

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

INSERT INTO `m_news` (`news_id`, `news_title`, `news_content`, `news_datestamp`) VALUES
(5, 'mantap', '<p>dsfdslfslfksldfksdlfkslfskf</p>\r\n', '2018-04-24');

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

INSERT INTO `m_notif` (`notif_id`, `notif_user_id`, `notif_reg_id`, `notif_title`, `notif_message`,`notif_read`) VALUES
(5, 0, 'PSB001', 'Maaf Pendaftaran anda dibatalkan', 'Mohon maaf kami tidak menemukan bahwa anda sudah membayar',0),
(6, 3, 'PSB4-05122018', 'Selamat anda telah diterima', 'Silahkan bawa berkas dan print',0);

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

INSERT INTO `m_peng` (`peng_id`, `peng_name`, `peng_date`, `peng_detail`, `peng_img`) VALUES
(2, 'Pengumuman Libur', '2018-05-12', 'satu dua tiga empat lima enam tujuh delapan sembilan sepuluh', 'peng_152609520931.png');

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

INSERT INTO `m_registration` (`registration_id`, `registration_code`, `registration_full_name`, `registration_place_birthdate`, `registration_address`, `registration_numphone`, `registration_father_name`, `registration_mother_name`, `registration_edu_level`, `registration_school`, `registration_ijasah_number`, `registration_pict1`, `registration_pict2`, `registration_ijasah_scan`, `registration_doc`, `registration_status`, `registration_user_id`) VALUES
(1, 'PSB001', 'user', '13 Mei 1998, Purwakarta', 'Purwakarta', '08888888888', 'user', 'user', 'SMP', 'SD', '0904j444', 'dd', 'ff', 'ff', 'ff', 0, 0),
(3, 'PSB3-05112018', 'user', 'Purwakarta, 13 Mei 1998', 'Purwakarta', '082213171031', 'User', 'User', 'SMP', NULL, NULL, 'Foto1-PSB3-05112018.jpg', 'Foto2-PSB3-05112018.jpg', 'Ijazah-PSB3-05112018.jpg', 'Doc-PSB3-05112018.pdf', 0, 3),
(4, 'PSB4-05122018', 'Sumanto', 'Purwakarta, 13 Mei 1998', 'Sumanto', '0283123918391', 'Sumanto', 'Sumanto', 'SMA', 'DASDSDA', '3242422', 'Foto1-PSB4-051220181.png', 'Foto2-PSB4-05122018.png', 'Ijazah-PSB4-051220181.png', 'Doc-PSB4-051220181.pdf', 1, 3),
(5, 'PSB5-05122018', 'Susi', 'Purwakarta, 13 Mei 1998', 'Susi', '08832424', 'Susi', 'Susi', 'SD', '', '', 'Foto1-PSB5-051220185.png', 'Foto2-PSB5-051220185.png', 'Ijazah-PSB5-051220185.png', 'Doc-PSB5-051220185.pdf', 0, 3);

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

INSERT INTO `m_user` (`user_id`, `user_name`, `user_email`, `user_password`) VALUES
(1, 'chimemoo', 'chimemoo@gmail.com', 'chimemooo'),
(2, 'user@gmail.com', 'user', 'user'),
(3, 'user', 'useruser@gmail.com', 'user');

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
