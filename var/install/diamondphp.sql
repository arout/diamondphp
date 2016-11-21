-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 21, 2016 at 01:18 AM
-- Server version: 5.6.30
-- PHP Version: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `diamondphp`
--
CREATE DATABASE IF NOT EXISTS `diamondphp` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `diamondphp`;

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
CREATE TABLE IF NOT EXISTS `cities` (
  `id` int(8) NOT NULL,
  `code` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `enabled` char(1) DEFAULT 'Y',
  `countrycode` varchar(5) NOT NULL DEFAULT 'US',
  `statecode` varchar(100) DEFAULT NULL,
  `countycode` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `counties`
--

DROP TABLE IF EXISTS `counties`;
CREATE TABLE IF NOT EXISTS `counties` (
  `id` int(8) NOT NULL,
  `code` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `enabled` char(1) DEFAULT 'Y',
  `countrycode` varchar(5) NOT NULL DEFAULT 'US',
  `statecode` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(11) NOT NULL,
  `loc` char(2) DEFAULT NULL,
  `code` char(2) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `enabled` char(1) DEFAULT 'Y'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `friends_list`
--

DROP TABLE IF EXISTS `friends_list`;
CREATE TABLE IF NOT EXISTS `friends_list` (
  `my_name` varchar(50) NOT NULL,
  `my_id` int(20) NOT NULL,
  `my_friend` varchar(50) NOT NULL,
  `my_friend_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `friend_requests`
--

DROP TABLE IF EXISTS `friend_requests`;
CREATE TABLE IF NOT EXISTS `friend_requests` (
  `sent_by` int(20) NOT NULL,
  `sent_to` int(20) NOT NULL,
  `accepted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
CREATE TABLE IF NOT EXISTS `images` (
  `owner_id` int(12) NOT NULL,
  `img_name` varchar(17) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `image_gallery`
--

DROP TABLE IF EXISTS `image_gallery`;
CREATE TABLE IF NOT EXISTS `image_gallery` (
  `pid` int(25) NOT NULL COMMENT 'Auto incremented picture id',
  `owner` varchar(50) NOT NULL,
  `img_name` varchar(255) NOT NULL COMMENT 'Image file name'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `messenger_inbox`
--

DROP TABLE IF EXISTS `messenger_inbox`;
CREATE TABLE IF NOT EXISTS `messenger_inbox` (
  `mid` varchar(32) NOT NULL COMMENT 'Message ID',
  `sender` varchar(50) NOT NULL,
  `sid` int(25) NOT NULL COMMENT 'Sender''s member ID from users table',
  `recipient` varchar(50) NOT NULL,
  `rid` int(25) NOT NULL COMMENT 'Recipient''s member ID from users table',
  `subject` varchar(125) NOT NULL,
  `message` text NOT NULL,
  `date` int(11) NOT NULL,
  `flag_read` tinyint(1) NOT NULL DEFAULT '0',
  `flag_delete` tinyint(1) NOT NULL DEFAULT '0',
  `flag_star` varchar(6) NOT NULL DEFAULT 'star_0' COMMENT 'Flag message as important "starred"'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `messenger_replies`
--

DROP TABLE IF EXISTS `messenger_replies`;
CREATE TABLE IF NOT EXISTS `messenger_replies` (
  `response_id` varchar(32) NOT NULL COMMENT 'Response Message ID',
  `original_message` varchar(32) NOT NULL COMMENT 'Initial message in conversation history',
  `respond_message` varchar(32) NOT NULL COMMENT 'Message being responded to',
  `sender` varchar(50) NOT NULL COMMENT 'Sender of the reply',
  `sender_id` int(25) NOT NULL COMMENT 'Sender''s member ID from users table',
  `recipient` varchar(50) NOT NULL COMMENT 'Recipient of reply',
  `recipient_id` int(25) NOT NULL COMMENT 'Recipient''s member ID from users table',
  `subject` varchar(125) NOT NULL,
  `message` text NOT NULL COMMENT 'Reply message being sent',
  `date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `messenger_sent_messages`
--

DROP TABLE IF EXISTS `messenger_sent_messages`;
CREATE TABLE IF NOT EXISTS `messenger_sent_messages` (
  `id` int(25) NOT NULL COMMENT 'Message ID',
  `sent_by` varchar(50) NOT NULL,
  `sent_to` varchar(50) NOT NULL,
  `subject` varchar(125) NOT NULL,
  `message` text NOT NULL,
  `date` int(11) NOT NULL,
  `flag_read` tinyint(1) NOT NULL DEFAULT '0',
  `flag_delete` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset`
--

DROP TABLE IF EXISTS `password_reset`;
CREATE TABLE IF NOT EXISTS `password_reset` (
  `email` varchar(75) COLLATE utf8_unicode_ci NOT NULL,
  `hash` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profile_views`
--

DROP TABLE IF EXISTS `profile_views`;
CREATE TABLE IF NOT EXISTS `profile_views` (
  `view_id` int(15) NOT NULL,
  `member` varchar(50) CHARACTER SET utf8 NOT NULL,
  `viewed_by` varchar(50) CHARACTER SET utf8 NOT NULL,
  `view_timestamp` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings_validation`
--

DROP TABLE IF EXISTS `settings_validation`;
CREATE TABLE IF NOT EXISTS `settings_validation` (
  `setting` varchar(75) NOT NULL,
  `value` varchar(3) NOT NULL DEFAULT 'no',
  `comments` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

DROP TABLE IF EXISTS `states`;
CREATE TABLE IF NOT EXISTS `states` (
  `id` int(8) NOT NULL,
  `code` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `enabled` char(1) DEFAULT 'Y',
  `countrycode` varchar(5) NOT NULL DEFAULT 'US'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `member_id` int(10) NOT NULL,
  `role` varchar(25) NOT NULL DEFAULT 'free',
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `hidden` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Set this value to "1" to hide profile',
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(25) NOT NULL,
  `email` varchar(200) DEFAULT NULL,
  `gender` varchar(12) DEFAULT NULL,
  `seek_gender` varchar(50) DEFAULT NULL,
  `sexual_orientation` varchar(20) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `age_from` int(10) DEFAULT NULL,
  `age_to` int(10) DEFAULT NULL,
  `headline` text,
  `about_me` varchar(1200) DEFAULT NULL,
  `pic` varchar(255) NOT NULL,
  `personal_website` varchar(255) NOT NULL,
  `facebook_page` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `country` char(2) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `zip` varchar(20) DEFAULT NULL,
  `marital_status` varchar(20) DEFAULT NULL,
  `looking_for` varchar(500) DEFAULT NULL,
  `occupation` varchar(1000) DEFAULT NULL,
  `language` varchar(1000) DEFAULT NULL,
  `race` varchar(200) DEFAULT NULL,
  `religion` varchar(50) DEFAULT NULL,
  `height` varchar(30) DEFAULT NULL,
  `body_type` varchar(30) DEFAULT NULL,
  `eye_color` varchar(10) DEFAULT NULL,
  `hair_color` varchar(15) DEFAULT NULL,
  `income` varchar(25) DEFAULT NULL,
  `smoke` varchar(20) DEFAULT NULL,
  `drink` varchar(20) DEFAULT NULL,
  `latitude` varchar(40) DEFAULT NULL,
  `longitude` varchar(40) DEFAULT NULL,
  `registration_ip` varchar(16) NOT NULL,
  `registration_date` int(12) NOT NULL,
  `last_login_ip` varchar(16) NOT NULL,
  `last_login_time` int(12) NOT NULL,
  `photo_count` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `zips`
--

DROP TABLE IF EXISTS `zips`;
CREATE TABLE IF NOT EXISTS `zips` (
  `id` int(8) NOT NULL,
  `code` varchar(30) DEFAULT NULL,
  `enabled` char(1) DEFAULT 'Y',
  `countrycode` varchar(5) NOT NULL DEFAULT 'US',
  `statecode` varchar(100) DEFAULT NULL,
  `countycode` varchar(100) DEFAULT NULL,
  `citycode` varchar(100) DEFAULT NULL,
  `latitude` float DEFAULT NULL,
  `longitude` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `friends_list`
--
ALTER TABLE `friends_list`
  ADD PRIMARY KEY (`my_name`),
  ADD KEY `my_name` (`my_name`),
  ADD KEY `my_id` (`my_id`),
  ADD KEY `my_friend_id` (`my_friend_id`),
  ADD KEY `my_friend` (`my_friend`);

--
-- Indexes for table `friend_requests`
--
ALTER TABLE `friend_requests`
  ADD KEY `sent_by` (`sent_by`),
  ADD KEY `sent_to` (`sent_to`),
  ADD KEY `accepted` (`accepted`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD UNIQUE KEY `img_name` (`img_name`),
  ADD KEY `owner_id` (`owner_id`);

--
-- Indexes for table `image_gallery`
--
ALTER TABLE `image_gallery`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `owner` (`owner`);

--
-- Indexes for table `messenger_inbox`
--
ALTER TABLE `messenger_inbox`
  ADD UNIQUE KEY `mid` (`mid`),
  ADD KEY `sender` (`sender`),
  ADD KEY `sid` (`sid`),
  ADD KEY `recipient` (`recipient`),
  ADD KEY `rid` (`rid`);

--
-- Indexes for table `password_reset`
--
ALTER TABLE `password_reset`
  ADD UNIQUE KEY `hash` (`hash`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `profile_views`
--
ALTER TABLE `profile_views`
  ADD PRIMARY KEY (`view_id`),
  ADD KEY `member` (`member`,`viewed_by`),
  ADD KEY `viewed_by` (`viewed_by`);

--
-- Indexes for table `settings_validation`
--
ALTER TABLE `settings_validation`
  ADD UNIQUE KEY `setting` (`setting`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`member_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `gender` (`gender`),
  ADD KEY `country` (`country`),
  ADD KEY `state` (`state`),
  ADD KEY `race` (`race`),
  ADD KEY `city` (`city`),
  ADD KEY `zip` (`zip`),
  ADD KEY `hidden` (`hidden`);

--
-- Indexes for table `zips`
--
ALTER TABLE `zips`
  ADD PRIMARY KEY (`id`),
  ADD KEY `code` (`code`),
  ADD KEY `countryzipcode` (`countrycode`,`code`),
  ADD KEY `countrystatecountycity` (`countrycode`,`statecode`,`countycode`,`citycode`),
  ADD KEY `latitudecountry` (`latitude`,`countrycode`),
  ADD KEY `longitudecountry` (`longitude`,`countrycode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `image_gallery`
--
ALTER TABLE `image_gallery`
  MODIFY `pid` int(25) NOT NULL AUTO_INCREMENT COMMENT 'Auto incremented picture id';
--
-- AUTO_INCREMENT for table `profile_views`
--
ALTER TABLE `profile_views`
  MODIFY `view_id` int(15) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `member_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `zips`
--
ALTER TABLE `zips`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `friend_requests`
--
ALTER TABLE `friend_requests`
  ADD CONSTRAINT `friend_request_sender_id` FOREIGN KEY (`sent_by`) REFERENCES `users` (`member_id`),
  ADD CONSTRAINT `friend_request_user_id` FOREIGN KEY (`sent_to`) REFERENCES `users` (`member_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `image_owner_id` FOREIGN KEY (`owner_id`) REFERENCES `users` (`member_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `messenger_inbox`
--
ALTER TABLE `messenger_inbox`
  ADD CONSTRAINT `recipient_id` FOREIGN KEY (`rid`) REFERENCES `users` (`member_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `recipient_name` FOREIGN KEY (`recipient`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sender_id` FOREIGN KEY (`sid`) REFERENCES `users` (`member_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sender_name` FOREIGN KEY (`sender`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `profile_views`
--
ALTER TABLE `profile_views`
  ADD CONSTRAINT `profile_view` FOREIGN KEY (`viewed_by`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `profile_viewed` FOREIGN KEY (`member`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
