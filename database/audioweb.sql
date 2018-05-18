-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2018 at 01:54 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `audioweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `music`
--

CREATE TABLE `music` (
  `id` int(64) NOT NULL,
  `song` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `singer` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `owner` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fieldsid` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fieldspr` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `music`
--

INSERT INTO `music` (`id`, `song`, `singer`, `owner`, `link`, `fieldsid`, `fieldspr`) VALUES
(1, 'demo1', 'demo1', 'admin', 'https://drive.google.com/file/d/1rp4Bl7aiyR2j8Ip2oPuR-2gE0tvEqp78/view?usp=sharing', '1rp4Bl7aiyR2j8Ip2oPuR-2gE0tvEqp78', '1rp4Bl7aiyR2j8Ip2oPuR-2gE0tvEqp78'),
(2, 'Next to you', 'Kiseijuu OST', 'admin', 'https://drive.google.com/file/d/1VGzRj37GLV2J4wt1L2apXnd6CH08NrOb/view?usp=sharing', '1VGzRj37GLV2J4wt1L2apXnd6CH08NrOb', '1VGzRj37GLV2J4wt1L2apXnd6CH08NrOb'),
(3, 'Counting Stars', 'One Republic', 'admin', 'https://drive.google.com/file/d/1zqgXodvB9v1Ov9VnAQSmH10b3eZtiTUC/view?usp=sharing', '1zqgXodvB9v1Ov9VnAQSmH10b3eZtiTUC', '1zqgXodvB9v1Ov9VnAQSmH10b3eZtiTUC'),
(4, 'Fields of Life', 'none', 'admin', 'https://drive.google.com/file/d/1-DsosBgIncvCZ36d1nzblOZOmV84MWZ6/view?usp=sharing', '1-DsosBgIncvCZ36d1nzblOZOmV84MWZ6', '1-DsosBgIncvCZ36d1nzblOZOmV84MWZ6'),
(5, 'No Title', 'REOL', 'admin', 'https://drive.google.com/file/d/1dohhy1RGIqu5VxmRScUl_kHnwkHCR9Mv/view?usp=sharing', '1dohhy1RGIqu5VxmRScUl_kHnwkHCR9Mv', '1dohhy1RGIqu5VxmRScUl_kHnwkHCR9Mv'),
(6, 'Brother', 'Vic Mignogna', 'admin', 'https://drive.google.com/file/d/1coK77iNtJOHVTS5QPEmDwn3Bbq-2nAJf/view?usp=sharing', '1coK77iNtJOHVTS5QPEmDwn3Bbq-2nAJf', '1coK77iNtJOHVTS5QPEmDwn3Bbq-2nAJf'),
(7, 'You Can Be King Again', 'Lauren Aquilina', 'admin', 'https://drive.google.com/file/d/1mbmYZNviiHHYZkZ2riS6cmVPszveihdf/view?usp=sharing', '1mbmYZNviiHHYZkZ2riS6cmVPszveihdf', '1mbmYZNviiHHYZkZ2riS6cmVPszveihdf'),
(8, 'Hanezeve Caradhina', 'Kevin Penkin, Takeshi Saito', 'admin', 'https://drive.google.com/file/d/1bpGNlKHCipWrdcvn1BBxKR3w5z1dm_eJ/view?usp=sharing', '1bpGNlKHCipWrdcvn1BBxKR3w5z1dm_eJ', '1bpGNlKHCipWrdcvn1BBxKR3w5z1dm_eJ'),
(9, 'Stranger In The North ', ' Namewee, Wang Lee Hom', 'admin', 'https://drive.google.com/file/d/1C1przyZk56XGj6m9xlG8faUHPCCAinzn/view?usp=sharing', '1C1przyZk56XGj6m9xlG8faUHPCCAinzn', '1C1przyZk56XGj6m9xlG8faUHPCCAinzn'),
(10, 'Haru No Katami', 'Chitose Hajime', 'admin', 'https://drive.google.com/file/d/1yqWHpk9bfX2Pv9MP_1K_sO_uN9gJFhkF/view?usp=sharing', '1yqWHpk9bfX2Pv9MP_1K_sO_uN9gJFhkF', '1yqWHpk9bfX2Pv9MP_1K_sO_uN9gJFhkF'),
(11, 'Let Her Go', 'Passenger ', 'admin', 'https://drive.google.com/file/d/1XfPwWHNNjRjZkZkncA-pEopiQPYexcEp/view?usp=sharing', '1XfPwWHNNjRjZkZkncA-pEopiQPYexcEp', '1XfPwWHNNjRjZkZkncA-pEopiQPYexcEp');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `permission` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `permission`) VALUES
(1, 'admin', '123456', 1),
(2, 'locnqt', '654321', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `music`
--
ALTER TABLE `music`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `music`
--
ALTER TABLE `music`
  MODIFY `id` int(64) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
