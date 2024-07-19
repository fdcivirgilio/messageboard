-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Jul 19, 2024 at 11:06 AM
-- Server version: 8.0.38
-- PHP Version: 8.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employees`
--

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `user_id`, `created`, `modified`) VALUES
(1, 28, '2024-07-15 03:53:06', '2024-07-15 03:53:06'),
(2, 69, '2024-07-15 07:48:56', '2024-07-15 07:48:56'),
(3, 69, '2024-07-15 08:37:33', '2024-07-15 08:37:33'),
(4, 69, '2024-07-16 01:01:50', '2024-07-16 01:01:50'),
(5, 69, '2024-07-16 01:58:45', '2024-07-16 01:58:45'),
(6, 69, '2024-07-16 06:03:58', '2024-07-16 06:03:58'),
(7, 70, '2024-07-17 01:21:33', '2024-07-17 01:21:33'),
(8, 70, '2024-07-17 01:32:18', '2024-07-17 01:32:18'),
(9, 70, '2024-07-17 05:33:50', '2024-07-17 05:33:50'),
(10, 70, '2024-07-17 09:34:46', '2024-07-17 09:34:46'),
(11, 70, '2024-07-18 00:52:17', '2024-07-18 00:52:17'),
(12, 61, '2024-07-18 02:04:25', '2024-07-18 02:04:25'),
(13, 70, '2024-07-18 02:06:50', '2024-07-18 02:06:50'),
(14, 70, '2024-07-18 05:01:30', '2024-07-18 05:01:30'),
(15, 70, '2024-07-18 05:02:17', '2024-07-18 05:02:17'),
(16, 70, '2024-07-18 05:05:06', '2024-07-18 05:05:06');

-- --------------------------------------------------------

--
-- Table structure for table `messages_details`
--

CREATE TABLE `messages_details` (
  `id` int NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by_user_id` int NOT NULL,
  `recipient_user_id` int NOT NULL,
  `thread_id` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `messages_details`
--

INSERT INTO `messages_details` (`id`, `created`, `modified`, `created_by_user_id`, `recipient_user_id`, `thread_id`) VALUES
(1, NULL, NULL, 0, 0, ''),
(2, '2024-07-17 08:33:18', '2024-07-17 08:33:18', 1, 1, '669781cef1a38'),
(3, '2024-07-17 08:38:43', '2024-07-17 08:38:43', 456, 456, '669783135f554'),
(4, '2024-07-17 08:45:18', '2024-07-17 08:45:18', 56443, 56443, '6697849ed967f'),
(5, '2024-07-17 08:45:40', '2024-07-17 08:45:40', 654, 654, '669784b4157fa'),
(6, '2024-07-17 08:49:46', '2024-07-17 08:49:46', 654, 654, '669785aaa7910'),
(7, '2024-07-17 08:50:07', '2024-07-17 08:50:07', 654, 654, '669785bfcb864'),
(8, '2024-07-17 08:51:03', '2024-07-17 08:51:03', 8798, 8798, '669785f76f66f'),
(9, '2024-07-17 08:51:17', '2024-07-17 08:51:17', 8798, 8798, '669786053d13d'),
(10, '2024-07-17 08:51:26', '2024-07-17 08:51:26', 456, 456, '6697860ef151b'),
(11, '2024-07-17 08:53:14', '2024-07-17 08:53:14', 456, 456, '6697867a14d24'),
(12, '2024-07-17 08:58:40', '2024-07-17 08:58:40', 5465, 5465, '669787c0903fa'),
(13, '2024-07-17 08:58:55', '2024-07-17 08:58:55', 454, 454, '669787cf46934'),
(14, '2024-07-17 08:59:08', '2024-07-17 08:59:08', 454, 454, '669787dcab0de'),
(15, '2024-07-17 09:05:33', '2024-07-17 09:05:33', 454, 454, '6697895d76bbf'),
(16, '2024-07-17 09:06:21', '2024-07-17 09:06:21', 454, 454, '6697898d3b30e'),
(17, '2024-07-17 10:26:19', '2024-07-17 10:26:19', 3543534, 3543534, '66979c4b131b3'),
(18, '2024-07-18 05:49:23', '2024-07-18 05:49:23', 13, 13, '6698ace3cfcd9'),
(19, '2024-07-18 05:52:09', '2024-07-18 05:52:09', 13, 13, '6698ad89395c1'),
(20, '2024-07-18 05:58:39', '2024-07-18 05:58:39', 70, 13, '6698af0f64837'),
(21, '2024-07-18 06:36:17', '2024-07-18 06:36:17', 70, 13, '6698b7e1c5c13'),
(22, '2024-07-18 06:37:29', '2024-07-18 06:37:29', 70, 13, '6698b829ef915'),
(23, '2024-07-18 06:39:15', '2024-07-18 06:39:15', 70, 13, '6698b893c9ae0'),
(24, '2024-07-18 07:51:52', '2024-07-18 07:51:52', 70, 31, '6698c9982f6e2'),
(25, '2024-07-18 08:22:44', '2024-07-18 08:22:44', 70, 69, '6698d0d4ba477'),
(26, '2024-07-18 09:00:08', '2024-07-18 09:00:08', 70, 68, '6698d99855e07'),
(27, '2024-07-18 09:16:34', '2024-07-18 09:16:34', 70, 15, '6698dd7231298'),
(28, '2024-07-18 09:16:48', '2024-07-18 09:16:48', 70, 33, '6698dd807fbcc'),
(29, '2024-07-18 09:16:56', '2024-07-18 09:16:56', 70, 34, '6698dd8810d92'),
(30, '2024-07-18 09:17:04', '2024-07-18 09:17:04', 70, 29, '6698dd90d7b39'),
(31, '2024-07-18 09:17:12', '2024-07-18 09:17:12', 70, 29, '6698dd98e686c'),
(32, '2024-07-18 09:17:55', '2024-07-18 09:17:55', 70, 24, '6698ddc3d908d'),
(33, '2024-07-18 09:18:03', '2024-07-18 09:18:03', 70, 24, '6698ddcb2fbc8'),
(34, '2024-07-18 09:18:05', '2024-07-18 09:18:05', 70, 24, '6698ddcd9bdb4'),
(35, '2024-07-18 09:18:07', '2024-07-18 09:18:07', 70, 24, '6698ddcfa94a1'),
(36, '2024-07-18 09:18:09', '2024-07-18 09:18:09', 70, 24, '6698ddd193ad7'),
(37, '2024-07-18 09:18:11', '2024-07-18 09:18:11', 70, 24, '6698ddd3ac395'),
(38, '2024-07-18 09:32:25', '2024-07-18 09:32:25', 70, 31, '6698e1297a177'),
(39, '2024-07-19 01:16:42', '2024-07-19 01:16:42', 70, 13, '6699be7ab170f'),
(40, '2024-07-19 01:16:52', '2024-07-19 01:16:52', 70, 13, '6699be848ccd4'),
(41, '2024-07-19 01:17:07', '2024-07-19 01:17:07', 70, 24, '6699be9389f0b'),
(42, '2024-07-19 01:17:13', '2024-07-19 01:17:13', 70, 24, '6699be998c717'),
(43, '2024-07-19 01:17:16', '2024-07-19 01:17:16', 70, 24, '6699be9cad23b'),
(44, '2024-07-19 01:17:19', '2024-07-19 01:17:19', 70, 24, '6699be9f01daa'),
(45, '2024-07-19 01:17:20', '2024-07-19 01:17:20', 70, 24, '6699bea0ea26c'),
(46, '2024-07-19 01:17:22', '2024-07-19 01:17:22', 70, 24, '6699bea2c0c48'),
(47, '2024-07-19 01:17:24', '2024-07-19 01:17:24', 70, 24, '6699bea4890af'),
(48, '2024-07-19 01:17:27', '2024-07-19 01:17:27', 70, 24, '6699bea706574'),
(49, '2024-07-19 01:17:28', '2024-07-19 01:17:28', 70, 24, '6699bea8db951'),
(50, '2024-07-19 01:17:31', '2024-07-19 01:17:31', 70, 24, '6699beab23696'),
(51, '2024-07-19 01:17:33', '2024-07-19 01:17:33', 70, 24, '6699beadee7dd'),
(52, '2024-07-19 01:17:35', '2024-07-19 01:17:35', 70, 24, '6699beafeb27e'),
(58, '2024-07-19 11:00:26', '2024-07-19 11:00:26', 70, 13, '669a474a045e1');

-- --------------------------------------------------------

--
-- Table structure for table `messages_items`
--

CREATE TABLE `messages_items` (
  `id` int NOT NULL,
  `content` text,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `thread_id` varchar(40) DEFAULT NULL,
  `user_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `messages_items`
--

INSERT INTO `messages_items` (`id`, `content`, `created`, `modified`, `thread_id`, `user_id`) VALUES
(15, NULL, '2024-07-17 07:45:53', '2024-07-17 07:45:53', '1', 70),
(16, 'dsfdsfds', '2024-07-17 07:46:12', '2024-07-17 07:46:12', '1', 70),
(17, 'dsfdsfds', '2024-07-17 07:46:49', '2024-07-17 07:46:49', '1', 70),
(18, 'sdfdfds', '2024-07-17 07:49:33', '2024-07-17 07:49:33', '1', 70),
(19, 'sdfdfds', '2024-07-17 08:15:39', '2024-07-17 08:15:39', '66977dab881a6', 70),
(20, 'sdfdfds', '2024-07-17 08:33:19', '2024-07-17 08:33:19', '669781cef1a38', 70),
(21, 'This is a test.', '2024-07-17 08:38:43', '2024-07-17 08:38:43', '669783135f554', 70),
(22, 'fgfdgfdgfdgfd', '2024-07-17 08:45:18', '2024-07-17 08:45:18', '6697849ed967f', 70),
(23, 'dfdgdsgdfsgds', '2024-07-17 08:45:40', '2024-07-17 08:45:40', '669784b4157fa', 70),
(24, 'dfdgdsgdfsgdsdfdg', '2024-07-17 08:49:46', '2024-07-17 08:49:46', '669785aaa7910', 70),
(25, 'dfdgdsgdfsgdsdfdg', '2024-07-17 08:50:07', '2024-07-17 08:50:07', '669785bfcb864', 70),
(26, '76876876nughg', '2024-07-17 08:51:03', '2024-07-17 08:51:03', '669785f76f66f', 70),
(27, '76876876nughg', '2024-07-17 08:51:17', '2024-07-17 08:51:17', '669786053d13d', 70),
(28, 'dsfdsf', '2024-07-17 08:51:26', '2024-07-17 08:51:26', '6697860ef151b', 70),
(29, 'dsfdsf', '2024-07-17 08:53:14', '2024-07-17 08:53:14', '6697867a14d24', 70),
(30, 'dtfgfdgfdgd', '2024-07-17 08:58:40', '2024-07-17 08:58:40', '669787c0903fa', 70),
(31, 'dfgrdfgdfgerfd', '2024-07-17 08:58:55', '2024-07-17 08:58:55', '669787cf46934', 70),
(32, 'dfgrdfgdfgerfd', '2024-07-17 08:59:08', '2024-07-17 08:59:08', '669787dcab0de', 70),
(33, 'dfgrdfgdfgerfd', '2024-07-17 09:05:33', '2024-07-17 09:05:33', '6697895d76bbf', 70),
(34, 'dfgrdfgdfgerfd', '2024-07-17 09:06:21', '2024-07-17 09:06:21', '6697898d3b30e', 70),
(35, 'HI ', '2024-07-17 10:26:19', '2024-07-17 10:26:19', '66979c4b131b3', 70),
(36, 'Hi self', '2024-07-18 05:49:23', '2024-07-18 05:49:23', '6698ace3cfcd9', 70),
(37, 'THIS IS CHAT', '2024-07-18 05:52:09', '2024-07-18 05:52:09', '6698ad89395c1', 70),
(38, 'This is a message\r\n', '2024-07-18 05:58:39', '2024-07-18 05:58:39', '6698af0f64837', 70),
(39, '', '2024-07-18 06:16:32', '2024-07-18 06:16:32', '6698b340d300f', 70),
(40, 'The text\r\n', '2024-07-18 06:36:17', '2024-07-18 06:36:17', '6698b7e1c5c13', 70),
(41, 'The text\r\n', '2024-07-18 06:37:29', '2024-07-18 06:37:29', '6698b829ef915', 70),
(42, 'Test', '2024-07-18 06:39:15', '2024-07-18 06:39:15', '6698b893c9ae0', 70),
(43, 'Hi', '2024-07-18 07:51:52', '2024-07-18 07:51:52', '6698c9982f6e2', 70),
(44, 'Self message.', '2024-07-18 08:22:44', '2024-07-18 08:22:44', '6698d0d4ba477', 70),
(45, 'This is a test for link.', '2024-07-18 09:00:08', '2024-07-18 09:00:08', '6698d99855e07', 70),
(46, 'This is another one', '2024-07-18 09:16:34', '2024-07-18 09:16:34', '6698dd7231298', 70),
(47, 'Sample text', '2024-07-18 09:16:48', '2024-07-18 09:16:48', '6698dd807fbcc', 70),
(48, 'Sample text', '2024-07-18 09:16:56', '2024-07-18 09:16:56', '6698dd8810d92', 70),
(49, 'Sample text', '2024-07-18 09:17:04', '2024-07-18 09:17:04', '6698dd90d7b39', 70),
(50, 'Sample text', '2024-07-18 09:17:12', '2024-07-18 09:17:12', '6698dd98e686c', 70),
(51, 'This is. ate', '2024-07-18 09:17:55', '2024-07-18 09:17:55', '6698ddc3d908d', 70),
(52, 'Lorem ipsum', '2024-07-18 09:18:03', '2024-07-18 09:18:03', '6698ddcb2fbc8', 70),
(53, 'Lorem ipsum', '2024-07-18 09:18:05', '2024-07-18 09:18:05', '6698ddcd9bdb4', 70),
(54, 'Lorem ipsum', '2024-07-18 09:18:07', '2024-07-18 09:18:07', '6698ddcfa94a1', 70),
(55, 'Lorem ipsum', '2024-07-18 09:18:09', '2024-07-18 09:18:09', '6698ddd193ad7', 70),
(57, 'Hello', '2024-07-18 09:32:25', '2024-07-18 09:32:25', '6698e1297a177', 70),
(58, 'This is a message for Gil', '2024-07-19 01:16:42', '2024-07-19 01:16:42', '6699be7ab170f', 70),
(59, 'This is a message for Gil', '2024-07-19 01:16:52', '2024-07-19 01:16:52', '6699be848ccd4', 70),
(60, 'This is a message for Gil', '2024-07-19 01:17:07', '2024-07-19 01:17:07', '6699be9389f0b', 70),
(61, 'This is a message for Gil', '2024-07-19 01:17:13', '2024-07-19 01:17:13', '6699be998c717', 70),
(62, 'This is a message for Gil', '2024-07-19 01:17:16', '2024-07-19 01:17:16', '6699be9cad23b', 70),
(63, 'This is a message for Gil', '2024-07-19 01:17:19', '2024-07-19 01:17:19', '6699be9f01daa', 70),
(64, 'This is a message for Gil', '2024-07-19 01:17:20', '2024-07-19 01:17:20', '6699bea0ea26c', 70),
(65, 'This is a message for Gil', '2024-07-19 01:17:22', '2024-07-19 01:17:22', '6699bea2c0c48', 70),
(66, 'This is a message for Gil', '2024-07-19 01:17:24', '2024-07-19 01:17:24', '6699bea4890af', 70),
(67, 'This is a message for Gil', '2024-07-19 01:17:27', '2024-07-19 01:17:27', '6699bea706574', 70),
(68, 'This is a message for Gil', '2024-07-19 01:17:28', '2024-07-19 01:17:28', '6699bea8db951', 70),
(69, 'This is a message for Gil', '2024-07-19 01:17:31', '2024-07-19 01:17:31', '6699beab23696', 70),
(70, 'This is a message for Gil', '2024-07-19 01:17:33', '2024-07-19 01:17:33', '6699beadee7dd', 70),
(71, 'This is a message for Gil', '2024-07-19 01:17:35', '2024-07-19 01:17:35', '6699beafeb27e', 70),
(76, NULL, '2024-07-19 06:49:02', '2024-07-19 06:49:02', NULL, NULL),
(77, NULL, '2024-07-19 06:49:55', '2024-07-19 06:49:55', NULL, NULL),
(78, NULL, '2024-07-19 06:50:48', '2024-07-19 06:50:48', NULL, NULL),
(79, NULL, '2024-07-19 06:50:48', '2024-07-19 06:50:48', NULL, NULL),
(80, NULL, '2024-07-19 06:51:53', '2024-07-19 06:51:53', NULL, NULL),
(81, NULL, '2024-07-19 06:52:18', '2024-07-19 06:52:18', NULL, NULL),
(126, 'This', '2024-07-19 11:00:26', '2024-07-19 11:00:26', '669a474a045e1', 70);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `name` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `gender` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `hobby` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `last_login_time` datetime DEFAULT NULL,
  `profile_picture_id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created`, `modified`, `name`, `birthdate`, `gender`, `hobby`, `last_login_time`, `profile_picture_id`) VALUES
(13, 'gil', '940b9ccc06b9feae59934002a676a2ba86989620', '2024-07-12 06:11:25', '2024-07-12 06:11:25', 'Gil Aguirre', '2024-07-12', 'M', 'This is a hobby.', NULL, '0'),
(14, 'gil', '940b9ccc06b9feae59934002a676a2ba86989620', '2024-07-12 08:37:39', '2024-07-12 08:37:39', '', '2024-07-12', '', '', NULL, '0'),
(15, 'let', '940b9ccc06b9feae59934002a676a2ba86989620', '2024-07-12 08:50:36', '2024-07-12 08:50:36', 'Let Me', '2024-07-12', 'F', 'F', NULL, '0'),
(16, 'net', '1234', '2024-07-12 08:52:13', '2024-07-12 08:52:13', 'Net Ty', '2024-07-12', '', '', NULL, '0'),
(17, 'roger', '4b2e8ae799053344f7cbf53f455c740ec8da96da', '2024-07-12 08:55:01', '2024-07-12 08:55:01', 'Roger Mac', '2024-07-12', 'M', 'This is a hobby.', NULL, '0'),
(18, 'meme', '10c9f032019f40af9c230e960226447f6a1b8519', '2024-07-12 08:58:52', '2024-07-12 08:58:52', 'me me', '2024-07-12', '', '', NULL, '0'),
(19, 'lar', '5115275098f468555b9f78d56d94b016cbc21260', '2024-07-12 09:00:18', '2024-07-12 09:00:18', 'lar vae', '2024-07-12', '', '', NULL, '0'),
(20, 'magic', '5115275098f468555b9f78d56d94b016cbc21260', '2024-07-12 09:02:23', '2024-07-12 09:02:23', '', '2024-07-12', '', '', NULL, '0'),
(21, 'ncwww', '14f0369d2a6c7f05d9290dbdfb39ceebd915927c', '2024-07-12 09:03:19', '2024-07-12 09:03:19', '', '2024-07-12', '', '', NULL, '0'),
(22, 'ncwww', '14f0369d2a6c7f05d9290dbdfb39ceebd915927c', '2024-07-12 09:03:45', '2024-07-12 09:03:45', 'Vera', '2024-07-12', 'F', 'F', NULL, '0'),
(23, 'lance', '2a87b90ede37a1e0e4ce83102ecb087256bed399', '2024-07-12 09:04:12', '2024-07-12 09:04:12', 'lance', '2024-07-12', '', '', NULL, '0'),
(24, 'admin', '1234', '2024-07-12 09:34:51', '2024-07-12 09:34:51', 'admin', '2024-07-12', '', '', NULL, '0'),
(25, 'admin1', '1234', '2024-07-12 09:39:05', '2024-07-12 09:39:05', '', '2024-07-12', '', '', NULL, '0'),
(26, 'admin2', '$2a$10$R/EGo3ISl0CP7O57CfnUqe3i8uIWdZ.a9JbNq5uktwZ2q6KjLZCTq', '2024-07-12 09:40:11', '2024-07-12 09:40:11', '', '2024-07-12', '', '', NULL, '0'),
(27, 'admin3', '$2a$10$J0gC2Y/lS1w8YZ3slJRQGu3k8MB/4gy6ZkvCH8rLfoXRmNJ1/eEj2', '2024-07-15 01:22:51', '2024-07-15 01:22:51', '', '2024-07-15', '', '', NULL, '0'),
(28, 'admin4@fdci.com', '$2a$10$Vwh8z9.qaXWSpg7cQQWbpusPDNWwcP/gZPvEFARo7cHnj8mAUrpa.', '2024-07-15 01:49:40', '2024-07-15 01:49:40', 'admin four', '2024-07-15', '', '', NULL, '0'),
(29, 'admin5@fdci.com', '$2a$10$wGkHO/LCBAk7YqHkxgVV4u7jRjP1LvVrR5egiFZd0XxZ1GToqLBYy', '2024-07-15 05:08:18', '2024-07-15 05:08:18', 'Admin The Fifth', '2024-07-15', 'M', 'This is a hobby.', NULL, '0'),
(30, 'admin1@fdci.com', '$2a$10$bEHyuKS.GyufG6pARXGvjO72s5o7yLXgxyPd1f5uBbbt9RzmYr4YO', '2024-07-15 05:20:26', '2024-07-15 05:20:26', 'Admin', '2024-08-15', 'male', 'Th', NULL, '0'),
(31, 'admin2@fdci.com', '$2a$10$9MtKR7FrEeldqy9QTxPL2uZ9EEhgOKn51nDmE4e2S16Ih8YAhznHm', '2024-07-15 05:21:38', '2024-07-15 05:21:38', 'Admin 2', '2024-07-15', 'male', '', NULL, '0'),
(32, 'admin2@fdci.com', '$2a$10$Ki4HBhMyY4VE5c2hwJAxvO9xmyu7j7OxgpbbVhmuvXty0Ns02Yphe', '2024-07-15 05:23:49', '2024-07-15 05:23:49', 'Admin 2', '2024-07-15', 'male', '', NULL, '0'),
(33, 'admin3@fdci.com', '$2a$10$gLo.d6SUOTacyd0SksGoyew2aUaxmVYhaTWfAZgryqjprKd99PGAa', '2024-07-15 05:24:12', '2024-07-15 05:24:12', 'Admin 3', '2024-07-15', 'male', '', NULL, '0'),
(34, 'admin11@fdci.com', '$2a$10$pmbuGgQetiScBgiS06QTi.VcDndWpnIcihxX2aTLJs6APlGHJQdBq', '2024-07-15 05:30:02', '2024-07-15 05:30:02', 'Admin 11', '2024-07-15', 'male', '', NULL, '0'),
(35, 'admin12@fdci.com', '$2a$10$/WZpVDAqa4E.68OkcQ7DZ.3285bRHMaXIEt7KdsH3/E/CwVqWXbty', '2024-07-15 05:59:54', '2024-07-15 05:59:54', '', '2024-07-15', 'male', '', NULL, '0'),
(36, 'admin13@fdci.com', '$2a$10$TtbaUlFBowVzb0nDfanHY.sDMsr.mlEWzAJRDVQd8TthzQhPN45EO', '2024-07-15 06:01:17', '2024-07-15 06:01:17', '', '2024-07-15', 'male', '', NULL, '0'),
(37, 'admin14@fdci.com', '$2a$10$73rFFdbtNUbiC/5/HD6s0ObN1IRfWMnTTX03sD9BZeIbAvMOi.kCm', '2024-07-15 06:04:45', '2024-07-15 06:04:45', 'Thor Mc', '2024-07-15', 'male', '', NULL, '0'),
(38, 'admin15@fdci.com', '$2a$10$VhP4tpdUPWsrF2HaSUeCD.OBdPRAgXXBYxoZk4td36QbXKbYjZfE2', '2024-07-15 06:04:58', '2024-07-15 06:04:58', '', '2024-07-15', 'male', '', NULL, '0'),
(39, 'admin16@fdci.com', '$2a$10$OPMpwu6JLH0v7VMDdoHrUeVsHRA1qAxDIxBGy7f53s4dOaidtOnma', '2024-07-15 06:05:32', '2024-07-15 06:05:32', '', '2024-07-15', 'male', '', NULL, '0'),
(40, 'admin17@fdci.com', '$2a$10$SD4LwcQYaLtcUxoUmx5ihu940vB5IUSnCpGTtce/CaWw3UZ9gTCbO', '2024-07-15 06:06:18', '2024-07-15 06:06:18', '', '2024-07-15', 'male', '', NULL, '0'),
(41, 'admin18@fdci.com', '$2a$10$MCxzBP3n4pN5ETEHnU.mXuBdUUcPqjfsVDyRBqn5iivHkAL4mufKu', '2024-07-15 06:09:08', '2024-07-15 06:09:08', '', '2024-07-15', 'male', '', NULL, '0'),
(42, 'admin19@fdci.com', '$2a$10$7ssbGxmn5DyCol44DKKAdecpZ3ryarxOjElb.00TAEcFFQzbEApFG', '2024-07-15 06:10:33', '2024-07-15 06:10:33', '', '2024-07-15', 'male', '', NULL, '0'),
(43, 'admin20@fdci.com', '$2a$10$3uZ0L2IGOaKPuc5yJda.Mu.GHztjoW9h8oP7pxYJU32/0zQHtzJS2', '2024-07-15 06:11:58', '2024-07-15 06:11:58', '', '2024-07-15', 'male', '', NULL, '0'),
(44, 'admin21@fdci.com', '$2a$10$Vqtp5FDsu1z8DZvzmtJhNeuMlg3nDILADR8m1tkZTM/zNAxiUEMua', '2024-07-15 06:16:28', '2024-07-15 06:16:28', '', '2024-07-15', 'male', '', NULL, '0'),
(45, 'admin22@fdci.com', '$2a$10$3OfO0xS714E27HH9oe9Bm.ZF1WIwSvTYO7ZvOBsD.JcqCAFMXYRze', '2024-07-15 06:17:11', '2024-07-15 06:17:11', '', '2024-07-15', 'male', '', NULL, '0'),
(46, 'admin23@fdci.com', '$2a$10$RzhPoHMJYhEv8D0//AKzb.TzPQEIK1gvdktZyzl/CECHES24oV7Xi', '2024-07-15 06:22:06', '2024-07-15 06:22:06', '', '2024-07-15', 'male', '', NULL, '0'),
(47, 'admin24@fdci.com', '$2a$10$RPotmP81LKLN7By/RYLczercx3ONOOcKEmKd8tPNQF21Uv0qGYYNK', '2024-07-15 06:22:21', '2024-07-15 06:22:21', '', '2024-07-15', 'male', '', NULL, '0'),
(48, 'admin25@fdci.com', '$2a$10$wrvmmrDqzjzhjCdK.r.gguaJG46B.ikY4BBXtG/obW3JYqjpDay4a', '2024-07-15 06:30:52', '2024-07-15 06:30:52', '', '2024-07-15', 'male', '', NULL, '0'),
(49, 'admin26@fdci.com', '$2a$10$2LpGJPcGvClqYzuBfARBIu/WHGpY4dPOb8G4jx2bANiOAWDv5ZQH.', '2024-07-15 06:32:12', '2024-07-15 06:32:12', '', '2024-07-15', 'male', '', NULL, '0'),
(50, 'admin27@fdci.com', '$2a$10$uG3M4hHO4JSVlTiTl6tCYuOQAv6TJNVcD4gEXBTZ9iz24iaMruxEy', '2024-07-15 06:32:40', '2024-07-15 06:32:40', '', '2024-07-15', 'male', '', NULL, '0'),
(51, 'admin28@fdci.com', '$2a$10$.go2I3HOZVl5nRzWD6uy2OllaZs2zxpek8rpQ.1s97leLFTPmKkyK', '2024-07-15 06:34:08', '2024-07-15 06:34:08', '', '2024-07-15', 'male', '', NULL, '0'),
(52, 'admin29@fdci.com', '$2a$10$7.XdnL2ZDcFcYUjj7MyahOXkpd.YjM1Y/ef7Sk31BciXXY5sdHIhG', '2024-07-15 06:34:32', '2024-07-15 06:34:32', '', '2024-07-15', 'male', '', NULL, '0'),
(53, 'admin30@fdci.com', '$2a$10$R2CWAP12D3QhrR.63taRQOtGjzwbU0eHEeIyT8EvE6M8XdxBiJrwa', '2024-07-15 06:36:14', '2024-07-15 06:36:14', '', '2024-07-15', 'male', '', NULL, '0'),
(54, 'admin31@fdci.com', '$2a$10$3LKQ1QpwhYsaeqveKq7cO.YQ54.AO68LeMFnoy3UGS7ueqoxWRC6q', '2024-07-15 06:44:45', '2024-07-15 06:44:45', '', '2024-07-15', 'male', '', NULL, '0'),
(55, 'admin34@fdci.com', '$2a$10$2OcZeG4XmvN5JobDIG44FeOjBpVvKKB6j9.PYEcrlyf2aM8xiiHIC', '2024-07-15 06:46:46', '2024-07-15 06:46:46', '', '2024-07-15', 'male', '', NULL, '0'),
(56, 'admin35@fdci.com', '$2a$10$k7/sdRKNH8qyLfUY4/fu6unsqm/wcQ93AX396ZbDZqzsjHKR408pa', '2024-07-15 06:50:34', '2024-07-15 06:50:34', '', '2024-07-15', 'male', '', NULL, '0'),
(57, 'admin36@fdci.com', '$2a$10$.4BO5KgloKEVOJ4ilCs8S.roDnyH9VsCdYS6lJ1hstKewGZO/3WEi', '2024-07-15 06:51:26', '2024-07-15 06:51:26', '', '2024-07-15', 'male', '', NULL, '0'),
(58, 'admin37@fdci.com', '$2a$10$EALbxEMW3GVfaA8HrMJrVOabZknUN1HrM1/h/o8CGKpGCCxTxOITu', '2024-07-15 06:52:19', '2024-07-15 06:52:19', '', '2024-07-15', 'male', '', NULL, '0'),
(59, 'admin38@fdci.com', '$2a$10$ZsOta3p9p3vuLQ8eFXweKO6NFrd8qyK9EuzqV3.b2QW9N3jA3r04u', '2024-07-15 06:52:44', '2024-07-15 06:52:44', '', '2024-07-15', 'male', '', NULL, '0'),
(60, 'admin39@fdci.com', '$2a$10$K/Z2IOstP..2ObqOnVQzHOILPvox8fAURTJ5xQQHGiEtxLrg4Y3da', '2024-07-15 06:53:31', '2024-07-15 06:53:31', '', '2024-07-15', 'male', '', NULL, '0'),
(61, 'admin40@fdci.com', '$2a$10$2Q4RoJ/LN.sIxSY1HNUJoelTtArwpNbIUg38dfIZTQ/ZAUubE2AUa', '2024-07-15 06:54:13', '2024-07-18 02:04:25', '', '2024-07-15', 'male', '', '2024-07-18 02:04:25', '0'),
(62, 'admin41@fdci.com', '$2a$10$fIQnN1Y.Zo6RnegVxwXyo.Px8zYnaPdm.x.zOA856NvklDRx/wp46', '2024-07-15 06:54:58', '2024-07-15 06:54:58', '', '2024-07-15', 'male', '', NULL, '0'),
(63, 'admin42@fdci.com', '$2a$10$AGqVW2Kl2/o5/w/kn0Mua.vDpWXXiw4JxqUbuIW/hl1ChTaamFOJq', '2024-07-15 06:55:50', '2024-07-15 06:55:50', '', '2024-07-15', 'male', '', NULL, '0'),
(64, 'admin43@fdci.com', '$2a$10$Gse44D7ljaRqsFaPcbt0wuduAoVZDh/osiRq8haj2/uSKZPPOsU7K', '2024-07-15 06:57:35', '2024-07-15 06:57:35', '', '2024-07-15', 'male', '', NULL, '0'),
(65, 'admin44@fdci.com', '$2a$10$g39rpl28mbEjvS65A7lrK.grD4wBoHNh2jh8d4/FAwa4lyu6gnquW', '2024-07-15 06:58:04', '2024-07-15 06:58:04', '', '2024-07-15', 'male', '', NULL, '0'),
(66, 'admin45@fdci.com', '$2a$10$BtoxPlzexfECHyM5eiOst.GeHGEGy...L122u3dF4tGn4Yuvy3gwW', '2024-07-15 06:59:07', '2024-07-15 06:59:07', '', '2024-07-15', 'male', '', NULL, '0'),
(67, 'admin46@fdci.com', '$2a$10$jMUPMm/puYVh8/9fgKAio.ypdk8GrCUHe77u.DRK9d289jo1y18X.', '2024-07-15 06:59:57', '2024-07-15 06:59:57', '', '2024-07-15', 'male', '', NULL, '0'),
(68, 'admin47@fdci.com', '$2a$10$q8WmNjB8YLiXp8kqKM6u8.8nzvGDf9HI2FI8M91Nw3RaRvb8of6X.', '2024-07-15 07:02:19', '2024-07-15 07:02:19', 'Admin The 47th', '2024-07-15', 'male', '', NULL, '0'),
(69, 'admin48@fdci.com', '$2a$10$7/Hc7c6RSqy4lTljNGYu0.wjzTLFxhm2XDYY6NdeMD0bRksLFBxi.', '2024-07-15 07:03:50', '2024-07-16 10:03:36', 'Admin The 48th updated', '2024-07-15', 'female', 'This is a hobby updated', '2024-07-16 06:03:58', 'pexels-juan-fam-3015522-18939401.jpg'),
(70, 'admin001@fdci.com', '$2a$10$29fm6fWYw/c/PHkMzKYh9OEbY.mQChsrWijhW.tF8ke37g0eqbIAO', '2024-07-17 01:21:13', '2024-07-19 10:47:22', 'Admin 001234', '2024-04-02', 'male', 'I love coding.', '2024-07-18 05:05:06', '669a43eac0ed7.jpg'),
(71, 'admin_thor@fdci.com', '$2a$10$c5GEaVuJD/f.W5NmQCcECO3Kk7XWms.Ko3OaglacdCyIkeFHXn61i', '2024-07-19 03:57:55', '2024-07-19 03:57:55', '', '2024-07-19', 'male', '', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages_details`
--
ALTER TABLE `messages_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages_items`
--
ALTER TABLE `messages_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `messages_details`
--
ALTER TABLE `messages_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `messages_items`
--
ALTER TABLE `messages_items`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
