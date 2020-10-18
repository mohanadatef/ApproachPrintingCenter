-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2019 at 02:49 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `approachprintingcenter`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart_files`
--

CREATE TABLE `cart_files` (
  `id` int(10) UNSIGNED NOT NULL,
  `filename` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kind` int(11) NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `user_id_upload` int(10) UNSIGNED NOT NULL,
  `cart_print_id` int(10) UNSIGNED NOT NULL,
  `cart_laser_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cart_lasers`
--

CREATE TABLE `cart_lasers` (
  `id` int(10) UNSIGNED NOT NULL,
  `count_file` int(11) NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart_lasers`
--

INSERT INTO `cart_lasers` (`id`, `count_file`, `customer_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 0, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cart_prints`
--

CREATE TABLE `cart_prints` (
  `id` int(10) UNSIGNED NOT NULL,
  `quantity` float NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `type_id` int(10) UNSIGNED NOT NULL,
  `color_id` int(10) UNSIGNED NOT NULL,
  `size_id` int(10) UNSIGNED NOT NULL,
  `machine_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart_prints`
--

INSERT INTO `cart_prints` (`id`, `quantity`, `customer_id`, `user_id`, `type_id`, `color_id`, `size_id`, `machine_id`, `created_at`, `updated_at`) VALUES
(1, 0, 1, 1, 1, 1, 1, 1, '2019-11-04 00:00:00', '2019-11-04 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `cart_types`
--

CREATE TABLE `cart_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `type_id` int(10) UNSIGNED NOT NULL,
  `size_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `meter` float NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `order`, `created_at`, `updated_at`) VALUES
(1, 'defult', 0, '2019-11-03 22:47:20', '2019-11-03 22:47:20'),
(2, 'BW', 0, '2019-11-03 23:16:32', '2019-11-07 18:41:15'),
(3, 'Colour', 1, '2019-11-05 22:28:26', '2019-11-07 18:41:22'),
(4, 'Less Colour', 2, '2019-11-05 22:28:43', '2019-11-07 18:41:28');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL,
  `place` varchar(255) NOT NULL,
  `wallet` float NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `phone`, `place`, `wallet`, `created_at`, `updated_at`) VALUES
(1, 'defult', 'defult', '0000000000', 'defult', 0, '2019-10-23 20:56:56', '2019-11-04 00:18:03'),
(8, 'heba', 'heba@as.com', '0100000000', 'n', 1.9, '2019-11-03 23:15:13', '2019-11-09 11:30:38'),
(9, 'Ahmad', 'ahmedtayel91@gmail.com', '01112823570', 'aast', 0, '2019-11-05 23:00:09', '2019-11-07 19:49:28'),
(10, 'MAMOUD', 'Ggexs@GMAIL.COM', '01111111111', 'MIU', 0, '2019-11-05 23:17:38', '2019-11-05 23:17:38');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `action` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `user_id`, `action`, `created_at`, `updated_at`) VALUES
(1, 9, 'login-2019-11-10 03:33:07', '2019-11-10 03:33:07', '2019-11-10 03:33:07'),
(2, 9, 'show user ', '2019-11-10 03:33:08', '2019-11-10 03:33:08'),
(3, 9, 'show rolo ', '2019-11-10 03:46:56', '2019-11-10 03:46:56'),
(4, 9, 'edit rolo :Develper', '2019-11-10 03:47:04', '2019-11-10 03:47:04'),
(5, 9, 'show rolo ', '2019-11-10 03:47:05', '2019-11-10 03:47:05'),
(6, 9, 'show log', '2019-11-10 03:47:08', '2019-11-10 03:47:08'),
(7, 9, 'show wallet transaction', '2019-11-10 03:47:35', '2019-11-10 03:47:35');

-- --------------------------------------------------------

--
-- Table structure for table `machines`
--

CREATE TABLE `machines` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `kind` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `work` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `machines`
--

INSERT INTO `machines` (`id`, `name`, `price`, `kind`, `order`, `work`, `created_at`, `updated_at`) VALUES
(1, 'defult', 0, 0, 0, 3, '2019-11-03 22:46:53', '2019-11-05 20:47:20'),
(2, 'Laser 1', 3, 1, 1, 1, '2019-11-03 23:16:02', '2019-11-09 22:56:44'),
(3, 'HP T1100', 0, 2, 3, 0, '2019-11-03 23:16:16', '2019-11-09 23:07:12'),
(4, 'Laser2', 3, 1, 0, 0, '2019-11-05 22:59:18', '2019-11-09 11:28:49'),
(5, 'Richo BW', 0, 2, 2, 0, '2019-11-05 22:59:48', '2019-11-07 18:40:53'),
(6, 'Xerox BW& Colour', 0, 2, 0, 0, '2019-11-05 23:00:42', '2019-11-09 13:55:14'),
(7, 'Xerox BW', 0, 2, 2, 0, '2019-11-05 23:00:57', '2019-11-09 13:55:34'),
(8, 'HP 800', 0, 2, 1, 0, '2019-11-05 23:01:27', '2019-11-07 18:37:40'),
(9, 'HP Z2100', 0, 2, 0, 0, '2019-11-05 23:01:55', '2019-11-07 18:38:56'),
(10, 'HP 8000', 0, 2, 0, 0, '2019-11-05 23:02:16', '2019-11-07 18:37:49');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL,
  `total_cost` float NOT NULL,
  `discount` float NOT NULL,
  `rest` float NOT NULL,
  `paid` float NOT NULL,
  `count_order` int(11) NOT NULL,
  `count_order_done` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `status`, `total_cost`, `discount`, `rest`, `paid`, `count_order`, `count_order_done`, `user_id`, `customer_id`, `created_at`, `updated_at`) VALUES
(1, 2, 0, 0, 0, 0, 0, 0, 1, 1, '2019-11-01 00:00:00', '2019-11-05 20:14:20'),
(58, 1, 6.7, 0, 8.05, 0, 0, 0, 2, 8, '2019-11-07 10:14:32', '2019-11-08 22:30:07'),
(59, 1, 0, 0, 0, 0, 0, 0, 2, 8, '2019-11-07 10:19:06', '2019-11-07 10:19:06'),
(60, 1, 0, 0, 0, 0, 0, 0, 2, 8, '2019-11-07 10:19:55', '2019-11-07 10:19:55'),
(61, 1, 0, 0, 0, 0, 0, 0, 2, 8, '2019-11-07 10:21:56', '2019-11-07 10:21:56'),
(62, 1, 0, 0, 0, 0, 0, 2, 2, 8, '2019-11-07 10:22:56', '2019-11-09 00:02:33'),
(63, 1, 10, 10, 0, 4.4, 0, 1, 9, 9, '2019-11-07 18:58:05', '2019-11-09 13:55:14'),
(64, 1, 0, 0, 0, 0, 0, 0, 9, 9, '2019-11-07 18:58:55', '2019-11-07 18:58:55'),
(65, 1, 11, 10, -1.9, 8, 0, 2, 9, 9, '2019-11-07 18:59:09', '2019-11-09 13:55:34'),
(66, 1, 0, 0, 0, 0, 0, 0, 9, 9, '2019-11-07 19:00:02', '2019-11-07 19:00:02'),
(67, 1, 0, 0, 0, 0, 0, 0, 9, 9, '2019-11-07 19:27:43', '2019-11-07 19:27:43'),
(68, 1, 0, 0, 0, 0, 0, 0, 9, 9, '2019-11-07 19:28:28', '2019-11-07 19:28:28'),
(69, 1, 0, 0, 0, 0, 0, 0, 2, 8, '2019-11-07 19:29:17', '2019-11-07 19:29:17'),
(70, 1, 0, 0, 0, 0, 0, 0, 9, 9, '2019-11-07 19:29:26', '2019-11-07 19:29:26'),
(71, 1, 0, 0, 0, 0, 0, 0, 9, 9, '2019-11-07 19:29:39', '2019-11-07 19:29:39'),
(72, 1, 0, 0, 0, 0, 0, 0, 9, 9, '2019-11-07 19:30:46', '2019-11-07 19:30:46'),
(73, 1, 0, 0, 0, 0, 0, 0, 2, 8, '2019-11-07 19:31:01', '2019-11-07 19:31:01'),
(74, 1, 15, 0, 0, 13.1, 0, 1, 2, 8, '2019-11-07 19:31:32', '2019-11-09 13:54:22'),
(75, 1, 60, 0, 0.1, 62, 1, 1, 9, 9, '2019-11-07 19:31:38', '2019-11-08 23:06:30'),
(76, 1, 2.4, 0, 0, 1.2, 0, 1, 9, 9, '2019-11-07 19:34:20', '2019-11-09 13:53:11'),
(77, 1, 0.5, 0, 0, 0.25, 0, 0, 2, 8, '2019-11-07 19:50:28', '2019-11-07 19:51:12'),
(78, 1, 7.7, 0, 11.4, 0, 0, 0, 2, 8, '2019-11-07 20:26:02', '2019-11-08 22:29:16'),
(79, 1, 2.2, 0, 15.25, 0, 0, 0, 2, 8, '2019-11-07 20:27:13', '2019-11-08 22:28:36'),
(80, 1, 1.3, 0, 16.35, 0, 0, 0, 2, 8, '2019-11-08 22:24:53', '2019-11-08 22:25:51'),
(81, 1, 1, 0, 7.55, 0, 0, 0, 2, 8, '2019-11-08 22:31:00', '2019-11-08 22:31:37'),
(82, 1, 0.6, 0, 7.25, 0, 0, 0, 2, 8, '2019-11-08 22:40:46', '2019-11-08 22:41:17'),
(83, 1, 1.5, 0, 6.5, 0, 0, 0, 2, 8, '2019-11-08 22:42:42', '2019-11-08 22:43:20'),
(84, 1, 0.6, 0, 6.2, 0, 0, 0, 2, 8, '2019-11-08 22:42:42', '2019-11-08 22:43:57'),
(85, 0, 0, 0, 0, 0, 0, 0, 2, 8, '2019-11-08 23:06:55', '2019-11-08 23:06:55'),
(86, 0, 9, 0, 0, 7.1, 1, 1, 2, 8, '2019-11-08 23:09:20', '2019-11-09 13:54:24'),
(87, 0, 5, 0, 0, 3.1, 1, 1, 2, 8, '2019-11-08 23:10:07', '2019-11-09 13:54:20'),
(88, 0, 0, 0, 0, 0, 0, 0, 2, 8, '2019-11-08 23:11:26', '2019-11-08 23:11:26'),
(89, 0, 0, 0, 0, -1.9, 0, 1, 2, 8, '2019-11-08 23:11:54', '2019-11-09 13:54:51'),
(90, 0, 0, 10, 0, -1.9, 0, 1, 2, 8, '2019-11-08 23:12:47', '2019-11-09 13:52:22'),
(91, 0, 16.7, 0, 0, 10.15, 3, 3, 2, 8, '2019-11-08 23:14:28', '2019-11-08 23:18:40'),
(92, 0, 14.5, 0, -2.25, 5, 0, 1, 2, 8, '2019-11-09 11:25:23', '2019-11-09 11:29:14'),
(93, 0, 0.6, 0, 0, -1.6, 2, 2, 2, 8, '2019-11-09 11:26:07', '2019-11-09 13:55:02'),
(94, 0, 1.7, 0, 1.9, 5, 1, 1, 2, 8, '2019-11-09 11:28:33', '2019-11-09 11:30:38'),
(95, 0, 1.1, 0, 0, -1.35, 1, 1, 2, 8, '2019-11-09 13:58:37', '2019-11-09 14:24:36'),
(96, 0, 0, 0, 0, 0, 0, 0, 2, 8, '2019-11-09 14:29:54', '2019-11-09 14:29:54'),
(97, 0, 0, 0, 0, 0, 0, 0, 2, 8, '2019-11-09 14:30:15', '2019-11-09 14:30:15'),
(98, 2, 0.5, 0, 0, -1.65, 1, 1, 2, 8, '2019-11-09 14:31:13', '2019-11-09 14:31:40'),
(99, 1, 11, 0, 0, 9.1, 2, 1, 9, 8, '2019-11-09 22:52:47', '2019-11-09 23:07:12');

-- --------------------------------------------------------

--
-- Table structure for table `order_files`
--

CREATE TABLE `order_files` (
  `id` int(10) UNSIGNED NOT NULL,
  `filename` text NOT NULL,
  `kind` int(11) NOT NULL,
  `order_laser_id` int(10) UNSIGNED NOT NULL,
  `order_print_id` int(10) UNSIGNED NOT NULL,
  `user_id_upload` int(10) UNSIGNED NOT NULL,
  `user_id_download` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_files`
--

INSERT INTO `order_files` (`id`, `filename`, `kind`, `order_laser_id`, `order_print_id`, `user_id_upload`, `user_id_download`, `created_at`, `updated_at`) VALUES
(30, '1573114452Screenshot (9).png', 1, 45, 1, 2, 2, '2019-11-07 10:14:32', '2019-11-07 10:14:32'),
(31, '1573114792Screenshot (9).png', 2, 1, 8, 2, 2, '2019-11-07 10:22:56', '2019-11-07 10:22:56'),
(32, '15730044098506 (1) Operations Management A4 (1).pdf', 1, 46, 1, 9, 9, '2019-11-07 18:58:05', '2019-11-07 18:58:05'),
(33, '1572996627Untitled.pdf', 2, 1, 9, 9, 9, '2019-11-07 18:58:06', '2019-11-07 18:58:06'),
(34, '1572996805Untitled.pdf', 2, 1, 9, 9, 9, '2019-11-07 18:58:06', '2019-11-07 18:58:06'),
(35, '1573145774MUG.pdf', 2, 1, 9, 9, 9, '2019-11-07 18:58:06', '2019-11-07 18:58:06'),
(36, '1573145947MUG.pdf', 2, 1, 10, 9, 9, '2019-11-07 18:59:09', '2019-11-07 18:59:09'),
(37, '1573148054YOFAT.pdf', 1, 47, 1, 9, 9, '2019-11-07 19:34:20', '2019-11-07 19:34:20'),
(38, '1573149025Screenshot (8).png', 1, 48, 1, 2, 2, '2019-11-07 19:50:28', '2019-11-07 19:50:28'),
(39, '1573151158Screenshot (9).png', 1, 49, 1, 2, 2, '2019-11-07 20:26:02', '2019-11-07 20:26:02'),
(40, '1573151229Screenshot (8).png', 1, 50, 1, 2, 2, '2019-11-07 20:27:13', '2019-11-07 20:27:13'),
(41, '1573244690Screenshot (7).png', 1, 51, 1, 2, 2, '2019-11-08 22:24:53', '2019-11-08 22:24:53'),
(42, '1573245056Screenshot (7).png', 1, 52, 1, 2, 2, '2019-11-08 22:31:00', '2019-11-08 22:31:00'),
(43, '1573245056Screenshot (8).png', 1, 52, 1, 2, 2, '2019-11-08 22:31:00', '2019-11-08 22:31:00'),
(44, '1573245057Screenshot (9).png', 1, 52, 1, 2, 2, '2019-11-08 22:31:01', '2019-11-08 22:31:01'),
(45, '1573245642Screenshot (7).png', 1, 53, 1, 2, 2, '2019-11-08 22:40:46', '2019-11-08 22:40:46'),
(46, '1573245642Screenshot (8).png', 1, 53, 1, 2, 2, '2019-11-08 22:40:47', '2019-11-08 22:40:47'),
(47, '1573245643Screenshot (9).png', 1, 53, 1, 2, 2, '2019-11-08 22:40:47', '2019-11-08 22:40:47'),
(48, '1573245759Screenshot (7).png', 1, 54, 1, 2, 2, '2019-11-08 22:42:42', '2019-11-08 22:42:42'),
(49, '1573247484Screenshot (9).png', 2, 1, 13, 2, 2, '2019-11-08 23:11:54', '2019-11-08 23:11:54'),
(50, '1573247563Screenshot (7).png', 2, 1, 14, 2, 2, '2019-11-08 23:12:47', '2019-11-08 23:12:47'),
(51, '1573247665Screenshot (7).png', 1, 56, 1, 2, 2, '2019-11-08 23:14:29', '2019-11-08 23:14:29'),
(52, '1573247658Screenshot (8).png', 2, 1, 15, 2, 2, '2019-11-08 23:14:30', '2019-11-08 23:14:30'),
(53, '1573291520Approach Printing Center Develper (1).xlsx', 1, 58, 1, 2, 2, '2019-11-09 11:26:07', '2019-11-09 11:26:07'),
(54, '1573291433Approach Printing Center Develper (1).xlsx', 2, 1, 16, 2, 2, '2019-11-09 11:26:08', '2019-11-09 11:26:08'),
(55, '1573291709Approach Printing Center Develper (1).xlsx', 1, 59, 1, 2, 2, '2019-11-09 11:28:33', '2019-11-09 11:28:33'),
(56, '1573300712Approach Printing Center Develper (1).xlsx', 1, 60, 1, 2, 2, '2019-11-09 13:58:37', '2019-11-09 13:58:37'),
(57, '1573302670Approach Printing Center Develper (1).xlsx', 1, 61, 1, 2, 2, '2019-11-09 14:31:13', '2019-11-09 14:31:13'),
(58, '1573332748عنوان الرساله.docx', 1, 62, 1, 9, 9, '2019-11-09 22:52:47', '2019-11-09 22:52:47'),
(59, '1573332764Approach Printing Center Develper (1).xlsx', 2, 1, 17, 9, 9, '2019-11-09 22:52:48', '2019-11-09 22:52:48');

-- --------------------------------------------------------

--
-- Table structure for table `order_lasers`
--

CREATE TABLE `order_lasers` (
  `id` int(10) UNSIGNED NOT NULL,
  `time_start` text,
  `time_end` text,
  `total_time_system` text NOT NULL,
  `total_time_user` text NOT NULL,
  `total_cost_system` float NOT NULL,
  `total_cost_user` float NOT NULL,
  `notes` text NOT NULL,
  `status` int(11) NOT NULL,
  `total_cost` float NOT NULL,
  `discount` float NOT NULL,
  `rest` float NOT NULL,
  `paid` float NOT NULL,
  `kind_pay` int(11) NOT NULL,
  `number_visa` text NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `machine_id` int(10) UNSIGNED NOT NULL,
  `user_start_id` int(10) UNSIGNED NOT NULL,
  `user_end_id` int(10) UNSIGNED NOT NULL,
  `user_discount_id` int(10) UNSIGNED NOT NULL,
  `user_skip_id` int(10) UNSIGNED NOT NULL,
  `user_pay_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `time_start_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `time_end_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `time_pay_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_lasers`
--

INSERT INTO `order_lasers` (`id`, `time_start`, `time_end`, `total_time_system`, `total_time_user`, `total_cost_system`, `total_cost_user`, `notes`, `status`, `total_cost`, `discount`, `rest`, `paid`, `kind_pay`, `number_visa`, `order_id`, `machine_id`, `user_start_id`, `user_end_id`, `user_discount_id`, `user_skip_id`, `user_pay_id`, `created_at`, `updated_at`, `time_start_at`, `time_end_at`, `time_pay_at`) VALUES
(1, '00:00:00', '00:00:00', '00:00:00', '00:00:00', 0, 0, ' ', 5, 0, 0, 0, 0, 0, '0', 1, 1, 1, 1, 1, 1, 1, '2019-11-01 00:00:00', '2019-11-09 22:55:37', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(45, '20:26:17', '20:27:24', '00:01:07', '00:00:00', 3.35, 0, ' ', 4, 3.35, 0, 8.05, 0, 0, '0', 58, 2, 2, 2, 1, 1, 2, '2019-11-07 10:14:32', '2019-11-09 22:55:37', '2019-11-07 20:26:17', '2019-11-07 20:27:24', '2019-11-08 22:30:07'),
(46, '19:37:34', '19:37:41', '00:00:07', '1', 0.35, 5, ' ', 4, 5, 10, 0, 4.4, 1, '11112122', 63, 4, 9, 9, 1, 1, 9, '2019-11-07 18:58:05', '2019-11-09 22:55:37', '2019-11-07 19:37:34', '2019-11-07 19:37:41', '2019-11-07 19:49:28'),
(47, '19:35:31', '19:35:55', '00:00:24', '00:00:00', 1.2, 0, ' ', 4, 1.2, 0, 0, 1.2, 0, '0', 76, 2, 9, 9, 1, 1, 2, '2019-11-07 19:34:20', '2019-11-09 22:55:37', '2019-11-07 19:35:31', '2019-11-07 19:35:55', '2019-11-09 13:53:11'),
(48, '19:50:46', '19:50:51', '00:00:05', '00:00:00', 0.25, 0, ' ', 4, 0.25, 0, 0, 0.25, 0, '0', 77, 2, 9, 2, 1, 1, 9, '2019-11-07 19:50:28', '2019-11-09 22:55:37', '2019-11-07 19:50:46', '2019-11-07 19:50:51', '2019-11-07 19:51:12'),
(49, '20:26:35', '20:27:52', '00:01:17', '00:00:00', 3.85, 0, ' ', 4, 3.85, 0, 11.4, 0, 0, '0', 78, 4, 9, 2, 1, 1, 2, '2019-11-07 20:26:02', '2019-11-09 22:55:37', '2019-11-07 20:26:35', '2019-11-07 20:27:52', '2019-11-08 22:29:16'),
(50, '20:28:06', '20:28:28', '00:00:22', '00:00:00', 1.1, 0, ' ', 4, 1.1, 0, 15.25, 0, 0, '0', 79, 2, 9, 9, 1, 1, 2, '2019-11-07 20:27:13', '2019-11-09 22:55:37', '2019-11-07 20:28:06', '2019-11-07 20:28:29', '2019-11-08 22:28:36'),
(51, '22:25:09', '22:25:22', '00:00:13', '00:00:00', 0.65, 0, ' ', 4, 0.65, 0, 16.35, 0, 0, '0', 80, 2, 2, 2, 1, 1, 2, '2019-11-08 22:24:53', '2019-11-09 22:55:37', '2019-11-08 22:25:09', '2019-11-08 22:25:22', '2019-11-08 22:25:51'),
(52, '22:31:15', '22:31:25', '00:00:10', '00:00:00', 0.5, 0, ' ', 4, 0.5, 0, 7.55, 0, 0, '0', 81, 2, 2, 2, 1, 1, 2, '2019-11-08 22:31:00', '2019-11-09 22:55:37', '2019-11-08 22:31:15', '2019-11-08 22:31:25', '2019-11-08 22:31:37'),
(53, '22:40:57', '22:41:03', '00:00:06', '00:00:00', 0.3, 0, ' ', 4, 0.3, 0, 7.25, 0, 0, '0', 82, 2, 2, 2, 1, 1, 2, '2019-11-08 22:40:46', '2019-11-09 22:55:37', '2019-11-08 22:40:57', '2019-11-08 22:41:03', '2019-11-08 22:41:17'),
(54, '22:42:54', '22:43:09', '00:00:15', '00:00:00', 0.75, 0, ' ', 4, 0.75, 0, 6.5, 0, 0, '0', 83, 2, 2, 2, 1, 1, 2, '2019-11-08 22:42:42', '2019-11-09 22:55:37', '2019-11-08 22:42:54', '2019-11-08 22:43:09', '2019-11-08 22:43:20'),
(55, '22:43:40', '22:43:46', '00:00:06', '00:00:00', 0.3, 0, ' ', 4, 0.3, 0, 6.2, 0, 0, '0', 84, 2, 2, 2, 1, 1, 2, '2019-11-08 22:42:43', '2019-11-09 22:55:37', '2019-11-08 22:43:40', '2019-11-08 22:43:47', '2019-11-08 22:43:57'),
(56, '23:18:19', '23:18:26', '00:00:07', '00:00:00', 0.35, 0, ' ', 4, 0.35, 0, 0, 0.35, 0, '0', 91, 2, 2, 2, 1, 1, 2, '2019-11-08 23:14:29', '2019-11-09 22:55:37', '2019-11-08 23:18:19', '2019-11-08 23:18:26', '2019-11-08 23:18:40'),
(57, '11:26:24', '11:28:49', '00:02:25', '00:00:00', 7.25, 0, ' ', 4, 7.25, 0, -2.25, 5, 0, '0', 92, 4, 2, 2, 1, 1, 2, '2019-11-09 11:25:23', '2019-11-09 22:55:37', '2019-11-09 11:26:24', '2019-11-09 11:28:49', '2019-11-09 11:29:14'),
(58, '11:27:06', '11:27:12', '00:00:06', '00:00:00', 0.3, 0, ' ', 4, 0.3, 0, 0, 0.3, 0, '0', 93, 2, 2, 2, 1, 1, 2, '2019-11-09 11:26:07', '2019-11-09 22:55:37', '2019-11-09 11:27:06', '2019-11-09 11:27:12', '2019-11-09 11:27:29'),
(59, '11:28:44', '11:29:01', '00:00:17', '00:00:00', 0.85, 0, ' ', 4, 0.85, 0, 1.9, 5, 0, '0', 94, 2, 2, 2, 1, 1, 2, '2019-11-09 11:28:33', '2019-11-09 22:55:37', '2019-11-09 11:28:44', '2019-11-09 11:29:01', '2019-11-09 11:30:38'),
(60, '14:24:14', '14:24:25', '00:00:11', '00:00:00', 0.55, 0, ' ', 4, 0.55, 0, 0, -1.35, 0, '0', 95, 2, 2, 2, 1, 1, 2, '2019-11-09 13:58:37', '2019-11-09 22:55:37', '2019-11-09 14:24:14', '2019-11-09 14:24:25', '2019-11-09 14:24:36'),
(61, '14:31:24', '14:31:29', '00:00:05', '00:00:00', 0.25, 0, ' ', 4, 0.25, 0, 0, -1.65, 0, '0', 98, 2, 2, 2, 1, 1, 2, '2019-11-09 14:31:13', '2019-11-09 22:55:37', '2019-11-09 14:31:24', '2019-11-09 14:31:29', '2019-11-09 14:31:40'),
(62, '22:56:44', '10:52:47', '00:00:00', '0', 0, 0, ' ', 1, 0, 0, 0, 0, 0, '0', 99, 2, 9, 9, 1, 2, 9, '2019-11-09 22:52:47', '2019-11-09 22:56:44', '2019-11-09 22:56:44', '2019-11-09 22:52:47', '2019-11-09 22:52:47');

-- --------------------------------------------------------

--
-- Table structure for table `order_prints`
--

CREATE TABLE `order_prints` (
  `id` int(10) UNSIGNED NOT NULL,
  `quantity` float NOT NULL,
  `total_cost` float NOT NULL,
  `discount` float NOT NULL,
  `rest` float NOT NULL,
  `paid` float NOT NULL,
  `kind_pay` int(11) NOT NULL,
  `number_visa` text NOT NULL,
  `status` int(11) NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `color_id` int(10) UNSIGNED NOT NULL,
  `size_id` int(10) UNSIGNED NOT NULL,
  `machine_id` int(10) UNSIGNED NOT NULL,
  `type_id` int(10) UNSIGNED NOT NULL,
  `user_end_id` int(10) UNSIGNED NOT NULL,
  `user_discount_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `user_start_id` int(10) UNSIGNED NOT NULL,
  `user_skip_id` int(10) UNSIGNED NOT NULL,
  `user_pay_id` int(10) UNSIGNED NOT NULL,
  `time_pay_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `time_start_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `time_end_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_prints`
--

INSERT INTO `order_prints` (`id`, `quantity`, `total_cost`, `discount`, `rest`, `paid`, `kind_pay`, `number_visa`, `status`, `order_id`, `color_id`, `size_id`, `machine_id`, `type_id`, `user_end_id`, `user_discount_id`, `created_at`, `updated_at`, `user_start_id`, `user_skip_id`, `user_pay_id`, `time_pay_at`, `time_start_at`, `time_end_at`) VALUES
(1, 0, 0, 0, 0, 0, 0, '0', 3, 1, 1, 1, 1, 1, 1, 1, '2019-11-01 00:00:00', '2019-11-09 23:06:35', 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 2, 0, 0, 0, 0, 0, '0', 3, 62, 2, 2, 3, 7, 2, 1, '2019-11-07 10:22:56', '2019-11-09 23:06:35', 2, 1, 2, '2019-11-07 10:23:14', '2019-11-09 00:00:50', '2019-11-09 00:02:32'),
(9, 1111, 0, 0, 0, 0, 0, '0', 3, 63, 3, 7, 6, 2, 2, 1, '2019-11-07 18:58:06', '2019-11-09 23:06:35', 2, 1, 2, '2019-11-09 13:53:24', '2019-11-09 13:55:12', '2019-11-09 13:55:14'),
(10, 4, 11, 10, -1.9, 8, 0, '0', 3, 65, 2, 2, 3, 2, 2, 1, '2019-11-07 18:59:09', '2019-11-09 23:06:35', 2, 1, 9, '2019-11-07 19:10:10', '2019-11-08 22:02:16', '2019-11-08 22:03:00'),
(11, 2, 0, 0, 0, 0, 0, '0', 3, 65, 2, 6, 7, 2, 2, 1, '2019-11-07 18:59:10', '2019-11-09 23:06:35', 2, 1, 2, '2019-11-09 13:53:46', '2019-11-09 13:55:32', '2019-11-09 13:55:34'),
(12, 2, 0, 0, 0, 0, 0, '0', 3, 65, 2, 6, 7, 2, 2, 1, '2019-11-07 18:59:10', '2019-11-09 23:06:35', 2, 1, 2, '2019-11-09 13:54:03', '2019-11-09 13:55:24', '2019-11-09 13:55:26'),
(13, 3, 0, 0, 0, -1.9, 0, '0', 3, 89, 3, 5, 3, 2, 2, 1, '2019-11-08 23:11:54', '2019-11-09 23:06:35', 2, 1, 2, '2019-11-09 13:54:01', '2019-11-09 13:54:49', '2019-11-09 13:54:51'),
(14, 4, 0, 10, 0, -1.9, 0, '0', 3, 90, 3, 2, 3, 7, 2, 2, '2019-11-08 23:12:47', '2019-11-09 23:06:35', 2, 1, 2, '2019-11-09 13:13:33', '2019-11-09 13:52:19', '2019-11-09 13:52:22'),
(15, 8, 11, 0, 0, 4.8, 0, '0', 3, 91, 2, 2, 3, 2, 2, 1, '2019-11-08 23:14:30', '2019-11-09 23:06:35', 2, 1, 2, '2019-11-08 23:16:08', '2019-11-08 23:16:50', '2019-11-08 23:16:52'),
(16, 3, 0, 0, 0, -1.9, 0, '0', 3, 93, 3, 2, 3, 7, 2, 1, '2019-11-09 11:26:08', '2019-11-09 23:06:35', 2, 1, 2, '2019-11-09 13:53:59', '2019-11-09 13:55:00', '2019-11-09 13:55:02'),
(17, 3, 11, 0, 0, 9.1, 0, '0', 3, 99, 2, 2, 3, 2, 2, 1, '2019-11-09 22:52:48', '2019-11-09 23:07:12', 2, 1, 9, '2019-11-09 23:03:07', '2019-11-09 23:07:09', '2019-11-09 23:07:12');

-- --------------------------------------------------------

--
-- Table structure for table `order_types`
--

CREATE TABLE `order_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `quantity` float NOT NULL,
  `meter` float NOT NULL,
  `status` int(11) NOT NULL,
  `total_cost` int(11) NOT NULL,
  `discount` float NOT NULL,
  `rest` float NOT NULL,
  `paid` float NOT NULL,
  `kind_pay` int(11) NOT NULL,
  `number_visa` text NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `type_id` int(10) UNSIGNED NOT NULL,
  `size_id` int(10) UNSIGNED NOT NULL,
  `user_pay_id` int(10) UNSIGNED NOT NULL,
  `user_discount_id` int(10) UNSIGNED NOT NULL,
  `time_pay_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_types`
--

INSERT INTO `order_types` (`id`, `quantity`, `meter`, `status`, `total_cost`, `discount`, `rest`, `paid`, `kind_pay`, `number_visa`, `order_id`, `type_id`, `size_id`, `user_pay_id`, `user_discount_id`, `time_pay_at`, `created_at`, `updated_at`) VALUES
(1, 0, 0, 1, 0, 0, 0, 0, 0, '0', 1, 1, 1, 2, 1, '2019-11-10 11:04:37', '2019-11-01 00:00:00', '2019-11-09 13:40:21'),
(7, 5, 0, 1, 15, 0, 0, 13.1, 0, '0', 74, 2, 2, 2, 1, '2019-11-10 13:54:22', '2019-11-07 19:31:32', '2019-11-09 13:54:22'),
(8, 10, 0, 1, 30, 0, 0, 30, 0, '0', 75, 2, 2, 2, 1, '2019-11-10 23:06:14', '2019-11-07 19:31:38', '2019-11-09 13:40:21'),
(9, 10, 0, 1, 30, 0, 0.1, 32, 0, '0', 75, 2, 2, 9, 1, '2019-11-10 19:32:29', '2019-11-07 19:31:38', '2019-11-09 13:40:21'),
(10, 3, 0, 1, 9, 0, 0, 7.1, 0, '0', 86, 2, 2, 2, 1, '2019-11-10 13:54:24', '2019-11-08 23:09:20', '2019-11-09 13:54:24'),
(11, 5, 0, 1, 5, 0, 0, 3.1, 0, '0', 87, 2, 6, 2, 1, '2019-11-10 13:54:20', '2019-11-08 23:10:07', '2019-11-09 13:54:20'),
(12, 5, 0, 1, 5, 0, 0, 5, 0, '0', 91, 2, 6, 2, 1, '2019-11-10 23:16:20', '2019-11-08 23:14:28', '2019-11-09 13:40:21');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `display_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'dashboard-show', 'dashboard show', 'show dashboard', '2019-11-10 03:46:18', '2019-11-10 03:46:18'),
(2, 'user-list', 'user list', 'list user', '2019-11-10 03:46:19', '2019-11-10 03:46:19'),
(3, 'user-show', 'show user', 'show data in user', '2019-11-10 03:46:19', '2019-11-10 03:46:19'),
(4, 'user-create', 'create user', 'create data in user', '2019-11-10 03:46:19', '2019-11-10 03:46:19'),
(5, 'user-edit', 'edit user', 'edit data in user', '2019-11-10 03:46:19', '2019-11-10 03:46:19'),
(6, 'user-password', 'password user', 'password data in user', '2019-11-10 03:46:19', '2019-11-10 03:46:19'),
(7, 'user-statues', 'statues user', 'statues data in user', '2019-11-10 03:46:19', '2019-11-10 03:46:19'),
(8, 'user-role', 'role user', 'role data in user', '2019-11-10 03:46:19', '2019-11-10 03:46:19'),
(9, 'user-code', 'code user', 'code data in user', '2019-11-10 03:46:19', '2019-11-10 03:46:19'),
(10, 'role-show', 'show role', 'show data in role', '2019-11-10 03:46:19', '2019-11-10 03:46:19'),
(11, 'role-create', 'create role', 'create data in role', '2019-11-10 03:46:19', '2019-11-10 03:46:19'),
(12, 'role-edit', 'edit role', 'edit data in role', '2019-11-10 03:46:19', '2019-11-10 03:46:19'),
(13, 'permission-show', 'permission show', 'show permission', '2019-11-10 03:46:19', '2019-11-10 03:46:19'),
(14, 'permission-edit', 'edit permission', 'edit data in permission', '2019-11-10 03:46:19', '2019-11-10 03:46:19'),
(15, 'log-show', 'log show', 'show log', '2019-11-10 03:46:19', '2019-11-10 03:46:19'),
(16, 'customer-list', 'customer list', 'list customer', '2019-11-10 03:46:19', '2019-11-10 03:46:19'),
(17, 'customer-show', 'customer show', 'show customer', '2019-11-10 03:46:19', '2019-11-10 03:46:19'),
(18, 'customer-create', 'create customer', 'create data in customer', '2019-11-10 03:46:19', '2019-11-10 03:46:19'),
(19, 'customer-edit', 'edit customer', 'edit data in customer', '2019-11-10 03:46:19', '2019-11-10 03:46:19'),
(20, 'customer-wallet', 'customer wallet', 'wallet customer', '2019-11-10 03:46:19', '2019-11-10 03:46:19'),
(21, 'core-data-list', 'core data list', 'core data list', '2019-11-10 03:46:19', '2019-11-10 03:46:19'),
(22, 'size-show', 'size show', 'show size', '2019-11-10 03:46:20', '2019-11-10 03:46:20'),
(23, 'size-create', 'create size', 'create data in size', '2019-11-10 03:46:20', '2019-11-10 03:46:20'),
(24, 'size-edit', 'edit size', 'edit data in size', '2019-11-10 03:46:20', '2019-11-10 03:46:20'),
(25, 'color-show', 'color show', 'show color', '2019-11-10 03:46:20', '2019-11-10 03:46:20'),
(26, 'color-create', 'create color', 'create data in color', '2019-11-10 03:46:20', '2019-11-10 03:46:20'),
(27, 'color-edit', 'edit color', 'edit data in size', '2019-11-10 03:46:20', '2019-11-10 03:46:20'),
(28, 'type-show', 'type show', 'show type', '2019-11-10 03:46:20', '2019-11-10 03:46:20'),
(29, 'type-create', 'create type', 'create data in type', '2019-11-10 03:46:20', '2019-11-10 03:46:20'),
(30, 'type-edit', 'edit type', 'edit data in type', '2019-11-10 03:46:20', '2019-11-10 03:46:20'),
(31, 'machine-show', 'machine show', 'show machine', '2019-11-10 03:46:20', '2019-11-10 03:46:20'),
(32, 'machine-create', 'create machine', 'create data in machine', '2019-11-10 03:46:20', '2019-11-10 03:46:20'),
(33, 'machine-edit', 'edit machine', 'edit data in machine', '2019-11-10 03:46:20', '2019-11-10 03:46:20'),
(34, 'size-show', 'size show', 'show size', '2019-11-10 03:46:20', '2019-11-10 03:46:20'),
(35, 'size-create', 'create size', 'create data in size', '2019-11-10 03:46:20', '2019-11-10 03:46:20'),
(36, 'size-edit', 'edit size', 'edit data in size', '2019-11-10 03:46:20', '2019-11-10 03:46:20'),
(37, 'store-list', 'store list', 'list store', '2019-11-10 03:46:20', '2019-11-10 03:46:20'),
(38, 'store-show', 'store show', 'show store', '2019-11-10 03:46:20', '2019-11-10 03:46:20'),
(39, 'store-create', 'create store', 'create data in store', '2019-11-10 03:46:20', '2019-11-10 03:46:20'),
(40, 'store-edit', 'edit store', 'edit data in store', '2019-11-10 03:46:20', '2019-11-10 03:46:20'),
(41, 'store-shop', 'shop store', 'shop data in store', '2019-11-10 03:46:20', '2019-11-10 03:46:20'),
(42, 'store-import', 'import store', 'import data in store', '2019-11-10 03:46:20', '2019-11-10 03:46:20'),
(43, 'import-price-create', 'import price create', 'import data in price create', '2019-11-10 03:46:20', '2019-11-10 03:46:20'),
(44, 'store-transaction-show', 'store transaction show', 'show transaction store', '2019-11-10 03:46:20', '2019-11-10 03:46:20'),
(45, 'store-transaction-enter-show', 'store transaction enter show', 'show transaction enter store', '2019-11-10 03:46:20', '2019-11-10 03:46:20'),
(46, 'store-transaction-directed-show', 'store transaction directed show', 'show transaction directed store', '2019-11-10 03:46:21', '2019-11-10 03:46:21'),
(47, 'print-price-show', 'print price show', 'show price print', '2019-11-10 03:46:21', '2019-11-10 03:46:21'),
(48, 'print-price-create', 'create print price', 'create data in print price', '2019-11-10 03:46:21', '2019-11-10 03:46:21'),
(49, 'print-price-edit', 'edit print price', 'edit data in print price', '2019-11-10 03:46:21', '2019-11-10 03:46:21'),
(50, 'order-list', 'order list', 'list order', '2019-11-10 03:46:21', '2019-11-10 03:46:21'),
(51, 'order-finish-index-all', 'order finish index all', 'order finish index all', '2019-11-10 03:46:21', '2019-11-10 03:46:21'),
(52, 'order-finish-index-day', 'order finish index day', 'order finish index day', '2019-11-10 03:46:21', '2019-11-10 03:46:21'),
(53, 'order-work-index', 'order work index', 'order work index', '2019-11-10 03:46:21', '2019-11-10 03:46:21'),
(54, 'order-information', 'order information', 'information order', '2019-11-10 03:46:21', '2019-11-10 03:46:21'),
(55, 'order-start', 'order start', 'start order', '2019-11-10 03:46:21', '2019-11-10 03:46:21'),
(56, 'order-search-customer', 'order search customer', 'order search customer', '2019-11-10 03:46:21', '2019-11-10 03:46:21'),
(57, 'order-buy-type', 'order buy type', 'order buy type', '2019-11-10 03:46:21', '2019-11-10 03:46:21'),
(58, 'order-buy-print', 'order buy print', 'order buy print', '2019-11-10 03:46:21', '2019-11-10 03:46:21'),
(59, 'order-buy-laser', 'order buy laser', 'order buy laser', '2019-11-10 03:46:21', '2019-11-10 03:46:21'),
(60, 'order-add-type-cart', 'order add type cart', 'order add type cart', '2019-11-10 03:46:21', '2019-11-10 03:46:21'),
(61, 'order-add-print-cart', 'order add print cart', 'order add print cart', '2019-11-10 03:46:21', '2019-11-10 03:46:21'),
(62, 'order-add-laser-cart', 'order add laser cart', 'order add laser cart', '2019-11-10 03:46:21', '2019-11-10 03:46:21'),
(63, 'order-cart-type-check', 'order cart type check', 'order cart type check', '2019-11-10 03:46:21', '2019-11-10 03:46:21'),
(64, 'order-cart-print-check', 'order cart print check', 'order cart print check', '2019-11-10 03:46:21', '2019-11-10 03:46:21'),
(65, 'order-cart-laser-check', 'order cart laser check', 'order cart laser check', '2019-11-10 03:46:21', '2019-11-10 03:46:21'),
(66, 'order-cart-type-edit', 'order cart type edit', 'order cart type edit', '2019-11-10 03:46:21', '2019-11-10 03:46:21'),
(67, 'order-cart-print-edit', 'order cart print edit', 'order cart print edit', '2019-11-10 03:46:21', '2019-11-10 03:46:21'),
(68, 'order-cart-laser-edit', 'order cart laser edit', 'order cart laser edit', '2019-11-10 03:46:21', '2019-11-10 03:46:21'),
(69, 'order-cart-type-cansal', 'order cart type cansal', 'order cart type cansal', '2019-11-10 03:46:21', '2019-11-10 03:46:21'),
(70, 'order-cart-print-cansal', 'order cart print cansal', 'order cart print cansal', '2019-11-10 03:46:21', '2019-11-10 03:46:21'),
(71, 'order-cart-laser-cansal', 'order cart laser cansal', 'order cart laser cansal', '2019-11-10 03:46:22', '2019-11-10 03:46:22'),
(72, 'order-cart-file-cansal', 'order cart file cansal', 'order cart file cansal', '2019-11-10 03:46:22', '2019-11-10 03:46:22'),
(73, 'order-finish', 'order finish', 'order finish', '2019-11-10 03:46:22', '2019-11-10 03:46:22'),
(74, 'laser-list', 'laser list', 'laser list', '2019-11-10 03:46:22', '2019-11-10 03:46:22'),
(75, 'laser-show', 'laser show', 'laser show', '2019-11-10 03:46:22', '2019-11-10 03:46:22'),
(76, 'laser-work', 'laser work', 'laser work', '2019-11-10 03:46:22', '2019-11-10 03:46:22'),
(77, 'laser-information', 'laser information', 'laser information', '2019-11-10 03:46:22', '2019-11-10 03:46:22'),
(78, 'laser-start', 'laser start', 'laser start', '2019-11-10 03:46:22', '2019-11-10 03:46:22'),
(79, 'laser-end', 'laser end', 'laser end', '2019-11-10 03:46:22', '2019-11-10 03:46:22'),
(80, 'laser-skip', 'laser skip', 'laser skip', '2019-11-10 03:46:22', '2019-11-10 03:46:22'),
(81, 'laser-finish', 'laser finish', 'laser finish', '2019-11-10 03:46:22', '2019-11-10 03:46:22'),
(82, 'laser-go-cashier', 'laser go cashier', 'laser go cashier', '2019-11-10 03:46:22', '2019-11-10 03:46:22'),
(83, 'laser-finish-index', 'laser finish index', 'laser finish index', '2019-11-10 03:46:22', '2019-11-10 03:46:22'),
(84, 'laser-finish-index-day', 'laser finish index day', 'laser finish index day', '2019-11-10 03:46:22', '2019-11-10 03:46:22'),
(85, 'laser-finish-problem', 'laser finish problem', 'laser finish problem', '2019-11-10 03:46:22', '2019-11-10 03:46:22'),
(86, 'chasier-list', 'chasier list', 'chasier list', '2019-11-10 03:46:22', '2019-11-10 03:46:22'),
(87, 'chasier-pay', 'chasier pay', 'chasier pay', '2019-11-10 03:46:22', '2019-11-10 03:46:22'),
(88, 'chasier-list-customer', 'chasier list customer', 'chasier list customer', '2019-11-10 03:46:22', '2019-11-10 03:46:22'),
(89, 'chasier-start-customer', 'chasier start customer', 'chasier start customer', '2019-11-10 03:46:22', '2019-11-10 03:46:22'),
(90, 'chasier-search-customer', 'chasier search customer', 'chasier search customer', '2019-11-10 03:46:22', '2019-11-10 03:46:22'),
(91, 'chasier-add-money', 'chasier add money', 'chasier add money', '2019-11-10 03:46:22', '2019-11-10 03:46:22'),
(92, 'chasier-list-laser', 'chasier list laser', 'chasier list laser', '2019-11-10 03:46:22', '2019-11-10 03:46:22'),
(93, 'chasier-laser-index', 'chasier laser index', 'chasier laser index', '2019-11-10 03:46:23', '2019-11-10 03:46:23'),
(94, 'chasier-laser-index-pay', 'chasier laser index pay', 'chasier laser index pay', '2019-11-10 03:46:23', '2019-11-10 03:46:23'),
(95, 'chasier-laser-discount', 'chasier laser discount', 'chasier laser discount', '2019-11-10 03:46:23', '2019-11-10 03:46:23'),
(96, 'chasier-list-print', 'chasier list print', 'chasier list print', '2019-11-10 03:46:23', '2019-11-10 03:46:23'),
(97, 'chasier-print-index', 'chasier print index', 'chasier print index', '2019-11-10 03:46:23', '2019-11-10 03:46:23'),
(98, 'chasier-print-index-pay', 'chasier print index pay', 'chasier print index pay', '2019-11-10 03:46:23', '2019-11-10 03:46:23'),
(99, 'chasier-print-discount', 'chasier print discount', 'chasier print discount', '2019-11-10 03:46:23', '2019-11-10 03:46:23'),
(100, 'chasier-list-type', 'chasier list type', 'chasier list type', '2019-11-10 03:46:23', '2019-11-10 03:46:23'),
(101, 'chasier-type-index', 'chasier type index', 'chasier type index', '2019-11-10 03:46:23', '2019-11-10 03:46:23'),
(102, 'chasier-type-index-pay', 'chasier type index pay', 'chasier type index pay', '2019-11-10 03:46:23', '2019-11-10 03:46:23'),
(103, 'chasier-type-discount', 'chasier type discount', 'chasier type discount', '2019-11-10 03:46:23', '2019-11-10 03:46:23'),
(104, 'print-list', 'print list', 'print list', '2019-11-10 03:46:23', '2019-11-10 03:46:23'),
(105, 'print-show', 'print show', 'print show', '2019-11-10 03:46:23', '2019-11-10 03:46:23'),
(106, 'print-work', 'print work', 'print work', '2019-11-10 03:46:23', '2019-11-10 03:46:23'),
(107, 'print-information', 'print information', 'print information', '2019-11-10 03:46:23', '2019-11-10 03:46:23'),
(108, 'print-all', 'print all', 'print all', '2019-11-10 03:46:23', '2019-11-10 03:46:23'),
(109, 'print-end', 'print end', 'print end', '2019-11-10 03:46:23', '2019-11-10 03:46:23'),
(110, 'print-start', 'print start', 'print start', '2019-11-10 03:46:23', '2019-11-10 03:46:23'),
(111, 'print-skip', 'print skip', 'print skip', '2019-11-10 03:46:23', '2019-11-10 03:46:23'),
(112, 'print-finish-index-all', 'print finish index all', 'print finish index all', '2019-11-10 03:46:23', '2019-11-10 03:46:23'),
(113, 'print-finish-index-all-day', 'print finish index all day', 'print finish index all day', '2019-11-10 03:46:23', '2019-11-10 03:46:23'),
(114, 'print-finish-index', 'print finish index', 'print finish index', '2019-11-10 03:46:23', '2019-11-10 03:46:23'),
(115, 'print-finish-index-day', 'print finish index day', 'print finish index day', '2019-11-10 03:46:23', '2019-11-10 03:46:23'),
(116, 'type-list', 'type list', 'type list', '2019-11-10 03:46:23', '2019-11-10 03:46:23'),
(117, 'type-finish-index', 'type finish index', 'type finish index', '2019-11-10 03:46:23', '2019-11-10 03:46:23'),
(118, 'type-finish-index-day', 'type finish index day', 'type finish index day', '2019-11-10 03:46:23', '2019-11-10 03:46:23');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2019-07-29 21:42:45', '2019-07-29 21:42:45'),
(18, 1, '2019-07-29 21:42:46', '2019-07-29 21:42:46'),
(19, 1, '2019-07-29 21:42:46', '2019-07-29 21:42:46'),
(20, 1, '2019-07-29 21:42:46', '2019-07-29 21:42:46'),
(22, 1, '2019-07-29 21:42:46', '2019-07-29 21:42:46'),
(23, 1, '2019-07-29 21:42:46', '2019-07-29 21:42:46'),
(24, 1, '2019-07-29 21:42:46', '2019-07-29 21:42:46'),
(30, 1, '2019-07-29 21:42:46', '2019-07-29 21:42:46'),
(31, 1, '2019-07-29 21:42:46', '2019-07-29 21:42:46'),
(32, 1, '2019-07-29 21:42:46', '2019-07-29 21:42:46'),
(10, 1, NULL, '2019-10-23 18:09:33'),
(8, 1, NULL, '2019-10-23 18:09:51'),
(2, 1, '2019-10-23 16:10:28', '2019-10-23 16:10:28'),
(3, 1, '2019-10-23 16:10:28', '2019-10-23 16:10:28'),
(4, 1, '2019-10-23 16:10:28', '2019-10-23 16:10:28'),
(5, 1, '2019-10-23 16:10:28', '2019-10-23 16:10:28'),
(6, 1, '2019-10-23 16:10:28', '2019-10-23 16:10:28'),
(7, 1, '2019-10-23 16:10:28', '2019-10-23 16:10:28'),
(9, 1, '2019-10-23 16:10:28', '2019-10-23 16:10:28'),
(14, 1, '2019-10-23 16:10:28', '2019-10-23 16:10:28'),
(15, 1, '2019-10-23 16:10:28', '2019-10-23 16:10:28'),
(16, 1, '2019-10-23 16:10:28', '2019-10-23 16:10:28'),
(17, 1, '2019-10-23 16:10:28', '2019-10-23 16:10:28'),
(21, 1, '2019-10-23 16:10:28', '2019-10-23 16:10:28'),
(25, 1, '2019-10-23 16:10:28', '2019-10-23 16:10:28'),
(26, 1, '2019-10-23 16:10:28', '2019-10-23 16:10:28'),
(27, 1, '2019-10-23 16:10:28', '2019-10-23 16:10:28'),
(28, 1, '2019-10-23 16:10:28', '2019-10-23 16:10:28'),
(29, 1, '2019-10-23 16:10:28', '2019-10-23 16:10:28'),
(33, 1, '2019-10-23 16:10:28', '2019-10-23 16:10:28'),
(34, 1, '2019-10-23 16:10:28', '2019-10-23 16:10:28'),
(35, 1, '2019-10-23 16:10:28', '2019-10-23 16:10:28'),
(36, 1, '2019-10-23 16:10:28', '2019-10-23 16:10:28'),
(37, 1, '2019-10-23 16:10:28', '2019-10-23 16:10:28'),
(38, 1, '2019-10-23 16:10:28', '2019-10-23 16:10:28'),
(39, 1, '2019-10-23 16:10:28', '2019-10-23 16:10:28'),
(40, 1, '2019-10-23 16:10:28', '2019-10-23 16:10:28'),
(41, 1, '2019-10-23 16:10:28', '2019-10-23 16:10:28'),
(42, 1, '2019-10-23 16:10:28', '2019-10-23 16:10:28'),
(43, 1, '2019-10-23 16:10:28', '2019-10-23 16:10:28'),
(44, 1, '2019-10-28 09:58:32', '2019-10-28 09:58:32'),
(45, 1, '2019-10-28 09:58:32', '2019-10-28 09:58:32'),
(46, 1, '2019-10-31 18:15:31', '2019-10-31 18:15:31'),
(47, 1, '2019-10-31 18:15:31', '2019-10-31 18:15:31'),
(48, 1, '2019-10-31 18:15:31', '2019-10-31 18:15:31'),
(49, 1, '2019-10-31 19:14:01', '2019-10-31 19:14:01'),
(50, 1, '2019-10-31 19:51:14', '2019-10-31 19:51:14'),
(51, 1, '2019-10-31 20:50:32', '2019-10-31 20:50:32'),
(52, 1, '2019-10-31 20:50:32', '2019-10-31 20:50:32'),
(53, 1, '2019-11-02 18:31:13', '2019-11-02 18:31:13'),
(54, 1, '2019-11-02 18:31:13', '2019-11-02 18:31:13'),
(55, 1, '2019-11-02 18:31:13', '2019-11-02 18:31:13'),
(1, 2, '2019-11-03 22:42:11', '2019-11-03 22:42:11'),
(2, 2, '2019-11-03 22:42:11', '2019-11-03 22:42:11'),
(3, 2, '2019-11-03 22:42:11', '2019-11-03 22:42:11'),
(4, 2, '2019-11-03 22:42:11', '2019-11-03 22:42:11'),
(5, 2, '2019-11-03 22:42:11', '2019-11-03 22:42:11'),
(6, 2, '2019-11-03 22:42:11', '2019-11-03 22:42:11'),
(7, 2, '2019-11-03 22:42:11', '2019-11-03 22:42:11'),
(8, 2, '2019-11-03 22:42:11', '2019-11-03 22:42:11'),
(9, 2, '2019-11-03 22:42:11', '2019-11-03 22:42:11'),
(10, 2, '2019-11-03 22:42:11', '2019-11-03 22:42:11'),
(14, 2, '2019-11-03 22:42:11', '2019-11-03 22:42:11'),
(15, 2, '2019-11-03 22:42:11', '2019-11-03 22:42:11'),
(16, 2, '2019-11-03 22:42:11', '2019-11-03 22:42:11'),
(17, 2, '2019-11-03 22:42:11', '2019-11-03 22:42:11'),
(18, 2, '2019-11-03 22:42:11', '2019-11-03 22:42:11'),
(19, 2, '2019-11-03 22:42:11', '2019-11-03 22:42:11'),
(20, 2, '2019-11-03 22:42:11', '2019-11-03 22:42:11'),
(21, 2, '2019-11-03 22:42:11', '2019-11-03 22:42:11'),
(22, 2, '2019-11-03 22:42:11', '2019-11-03 22:42:11'),
(23, 2, '2019-11-03 22:42:11', '2019-11-03 22:42:11'),
(24, 2, '2019-11-03 22:42:11', '2019-11-03 22:42:11'),
(25, 2, '2019-11-03 22:42:11', '2019-11-03 22:42:11'),
(26, 2, '2019-11-03 22:42:11', '2019-11-03 22:42:11'),
(27, 2, '2019-11-03 22:42:11', '2019-11-03 22:42:11'),
(28, 2, '2019-11-03 22:42:11', '2019-11-03 22:42:11'),
(29, 2, '2019-11-03 22:42:11', '2019-11-03 22:42:11'),
(30, 2, '2019-11-03 22:42:11', '2019-11-03 22:42:11'),
(31, 2, '2019-11-03 22:42:11', '2019-11-03 22:42:11'),
(32, 2, '2019-11-03 22:42:11', '2019-11-03 22:42:11'),
(33, 2, '2019-11-03 22:42:12', '2019-11-03 22:42:12'),
(34, 2, '2019-11-03 22:42:12', '2019-11-03 22:42:12'),
(35, 2, '2019-11-03 22:42:12', '2019-11-03 22:42:12'),
(36, 2, '2019-11-03 22:42:12', '2019-11-03 22:42:12'),
(37, 2, '2019-11-03 22:42:12', '2019-11-03 22:42:12'),
(38, 2, '2019-11-03 22:42:12', '2019-11-03 22:42:12'),
(39, 2, '2019-11-03 22:42:12', '2019-11-03 22:42:12'),
(40, 2, '2019-11-03 22:42:12', '2019-11-03 22:42:12'),
(41, 2, '2019-11-03 22:42:12', '2019-11-03 22:42:12'),
(42, 2, '2019-11-03 22:42:12', '2019-11-03 22:42:12'),
(43, 2, '2019-11-03 22:42:12', '2019-11-03 22:42:12'),
(44, 2, '2019-11-03 22:42:12', '2019-11-03 22:42:12'),
(45, 2, '2019-11-03 22:42:12', '2019-11-03 22:42:12'),
(46, 2, '2019-11-03 22:42:12', '2019-11-03 22:42:12'),
(47, 2, '2019-11-03 22:42:12', '2019-11-03 22:42:12'),
(48, 2, '2019-11-03 22:42:12', '2019-11-03 22:42:12'),
(49, 2, '2019-11-03 22:42:12', '2019-11-03 22:42:12'),
(50, 2, '2019-11-03 22:42:12', '2019-11-03 22:42:12'),
(51, 2, '2019-11-03 22:42:12', '2019-11-03 22:42:12'),
(52, 2, '2019-11-03 22:42:12', '2019-11-03 22:42:12'),
(53, 2, '2019-11-03 22:42:12', '2019-11-03 22:42:12'),
(54, 2, '2019-11-03 22:42:12', '2019-11-03 22:42:12'),
(55, 2, '2019-11-03 22:42:12', '2019-11-03 22:42:12'),
(56, 2, '2019-11-03 22:42:12', '2019-11-03 22:42:12'),
(57, 2, '2019-11-03 22:42:12', '2019-11-03 22:42:12'),
(58, 2, '2019-11-03 22:42:12', '2019-11-03 22:42:12'),
(59, 2, '2019-11-03 22:42:12', '2019-11-03 22:42:12'),
(60, 2, '2019-11-03 22:42:12', '2019-11-03 22:42:12'),
(61, 2, '2019-11-03 22:42:12', '2019-11-03 22:42:12'),
(62, 2, '2019-11-03 22:42:12', '2019-11-03 22:42:12'),
(56, 1, '2019-11-03 22:43:30', '2019-11-03 22:43:30'),
(57, 1, '2019-11-03 22:43:30', '2019-11-03 22:43:30'),
(58, 1, '2019-11-03 22:43:30', '2019-11-03 22:43:30'),
(59, 1, '2019-11-03 22:43:30', '2019-11-03 22:43:30'),
(60, 1, '2019-11-03 22:43:30', '2019-11-03 22:43:30'),
(61, 1, '2019-11-03 22:43:31', '2019-11-03 22:43:31'),
(62, 1, '2019-11-03 22:43:31', '2019-11-03 22:43:31'),
(63, 1, '2019-11-04 22:56:58', '2019-11-04 22:56:58'),
(64, 1, '2019-11-05 19:00:01', '2019-11-05 19:00:01'),
(65, 1, '2019-11-05 19:00:01', '2019-11-05 19:00:01'),
(66, 1, '2019-11-05 19:00:01', '2019-11-05 19:00:01'),
(67, 1, '2019-11-05 19:00:01', '2019-11-05 19:00:01'),
(68, 1, '2019-11-05 19:00:01', '2019-11-05 19:00:01'),
(69, 1, '2019-11-05 19:00:01', '2019-11-05 19:00:01'),
(70, 1, '2019-11-05 19:00:01', '2019-11-05 19:00:01'),
(71, 1, '2019-11-05 19:22:33', '2019-11-05 19:22:33'),
(72, 1, '2019-11-05 22:04:04', '2019-11-05 22:04:04'),
(63, 2, '2019-11-05 22:19:58', '2019-11-05 22:19:58'),
(64, 2, '2019-11-05 22:19:58', '2019-11-05 22:19:58'),
(65, 2, '2019-11-05 22:19:58', '2019-11-05 22:19:58'),
(66, 2, '2019-11-05 22:19:58', '2019-11-05 22:19:58'),
(67, 2, '2019-11-05 22:19:58', '2019-11-05 22:19:58'),
(68, 2, '2019-11-05 22:19:58', '2019-11-05 22:19:58'),
(69, 2, '2019-11-05 22:19:58', '2019-11-05 22:19:58'),
(70, 2, '2019-11-05 22:19:58', '2019-11-05 22:19:58'),
(71, 2, '2019-11-05 22:19:58', '2019-11-05 22:19:58'),
(72, 2, '2019-11-05 22:19:58', '2019-11-05 22:19:58'),
(1, 7, '2019-11-05 22:42:45', '2019-11-05 22:42:45'),
(64, 7, '2019-11-05 22:42:45', '2019-11-05 22:42:45'),
(65, 7, '2019-11-05 22:42:45', '2019-11-05 22:42:45'),
(66, 7, '2019-11-05 22:42:45', '2019-11-05 22:42:45'),
(67, 7, '2019-11-05 22:42:45', '2019-11-05 22:42:45'),
(68, 7, '2019-11-05 22:42:45', '2019-11-05 22:42:45'),
(69, 7, '2019-11-05 22:42:45', '2019-11-05 22:42:45'),
(71, 7, '2019-11-05 22:42:45', '2019-11-05 22:42:45'),
(72, 7, '2019-11-05 22:42:45', '2019-11-05 22:42:45'),
(1, 8, '2019-11-05 22:44:35', '2019-11-05 22:44:35'),
(44, 8, '2019-11-05 22:44:35', '2019-11-05 22:44:35'),
(45, 8, '2019-11-05 22:44:35', '2019-11-05 22:44:35'),
(46, 8, '2019-11-05 22:44:35', '2019-11-05 22:44:35'),
(47, 8, '2019-11-05 22:44:35', '2019-11-05 22:44:35'),
(48, 8, '2019-11-05 22:44:35', '2019-11-05 22:44:35'),
(49, 8, '2019-11-05 22:44:35', '2019-11-05 22:44:35'),
(50, 8, '2019-11-05 22:44:35', '2019-11-05 22:44:35'),
(51, 8, '2019-11-05 22:44:35', '2019-11-05 22:44:35'),
(52, 8, '2019-11-05 22:44:35', '2019-11-05 22:44:35'),
(53, 8, '2019-11-05 22:44:35', '2019-11-05 22:44:35'),
(54, 8, '2019-11-05 22:44:35', '2019-11-05 22:44:35'),
(55, 8, '2019-11-05 22:44:35', '2019-11-05 22:44:35'),
(56, 8, '2019-11-05 22:44:35', '2019-11-05 22:44:35'),
(57, 8, '2019-11-05 22:44:35', '2019-11-05 22:44:35'),
(58, 8, '2019-11-05 22:44:35', '2019-11-05 22:44:35'),
(59, 8, '2019-11-05 22:44:35', '2019-11-05 22:44:35'),
(60, 8, '2019-11-05 22:44:35', '2019-11-05 22:44:35'),
(61, 8, '2019-11-05 22:44:35', '2019-11-05 22:44:35'),
(62, 8, '2019-11-05 22:44:35', '2019-11-05 22:44:35'),
(63, 8, '2019-11-05 22:44:35', '2019-11-05 22:44:35'),
(64, 8, '2019-11-05 22:44:35', '2019-11-05 22:44:35'),
(65, 8, '2019-11-05 22:44:35', '2019-11-05 22:44:35'),
(1, 9, '2019-11-05 22:45:17', '2019-11-05 22:45:17'),
(17, 9, '2019-11-05 22:45:17', '2019-11-05 22:45:17'),
(18, 9, '2019-11-05 22:45:17', '2019-11-05 22:45:17'),
(19, 9, '2019-11-05 22:45:17', '2019-11-05 22:45:17'),
(20, 9, '2019-11-05 22:45:17', '2019-11-05 22:45:17'),
(21, 9, '2019-11-05 22:45:17', '2019-11-05 22:45:17'),
(22, 9, '2019-11-05 22:45:17', '2019-11-05 22:45:17'),
(23, 9, '2019-11-05 22:45:17', '2019-11-05 22:45:17'),
(24, 9, '2019-11-05 22:45:17', '2019-11-05 22:45:17'),
(25, 9, '2019-11-05 22:45:17', '2019-11-05 22:45:17'),
(26, 9, '2019-11-05 22:45:17', '2019-11-05 22:45:17'),
(27, 9, '2019-11-05 22:45:17', '2019-11-05 22:45:17'),
(28, 9, '2019-11-05 22:45:17', '2019-11-05 22:45:17'),
(29, 9, '2019-11-05 22:45:17', '2019-11-05 22:45:17'),
(30, 9, '2019-11-05 22:45:17', '2019-11-05 22:45:17'),
(31, 9, '2019-11-05 22:45:17', '2019-11-05 22:45:17'),
(32, 9, '2019-11-05 22:45:17', '2019-11-05 22:45:17'),
(33, 9, '2019-11-05 22:45:17', '2019-11-05 22:45:17'),
(34, 9, '2019-11-05 22:45:17', '2019-11-05 22:45:17'),
(35, 9, '2019-11-05 22:45:17', '2019-11-05 22:45:17'),
(36, 9, '2019-11-05 22:45:17', '2019-11-05 22:45:17'),
(37, 9, '2019-11-05 22:45:17', '2019-11-05 22:45:17'),
(38, 9, '2019-11-05 22:45:17', '2019-11-05 22:45:17'),
(39, 9, '2019-11-05 22:45:17', '2019-11-05 22:45:17'),
(40, 9, '2019-11-05 22:45:17', '2019-11-05 22:45:17'),
(41, 9, '2019-11-05 22:45:17', '2019-11-05 22:45:17'),
(42, 9, '2019-11-05 22:45:17', '2019-11-05 22:45:17'),
(43, 9, '2019-11-05 22:45:17', '2019-11-05 22:45:17'),
(1, 10, '2019-11-05 22:46:29', '2019-11-05 22:46:29'),
(33, 10, '2019-11-05 22:46:29', '2019-11-05 22:46:29'),
(34, 10, '2019-11-05 22:46:29', '2019-11-05 22:46:29'),
(37, 10, '2019-11-05 22:46:29', '2019-11-05 22:46:29'),
(38, 10, '2019-11-05 22:46:29', '2019-11-05 22:46:29'),
(39, 10, '2019-11-05 22:46:29', '2019-11-05 22:46:29'),
(40, 10, '2019-11-05 22:46:29', '2019-11-05 22:46:29'),
(41, 10, '2019-11-05 22:46:29', '2019-11-05 22:46:29'),
(42, 10, '2019-11-05 22:46:29', '2019-11-05 22:46:29'),
(43, 10, '2019-11-05 22:46:29', '2019-11-05 22:46:29'),
(1, 11, '2019-11-05 22:47:30', '2019-11-05 22:47:30'),
(2, 11, '2019-11-05 22:47:30', '2019-11-05 22:47:30'),
(3, 11, '2019-11-05 22:47:30', '2019-11-05 22:47:30'),
(4, 11, '2019-11-05 22:47:30', '2019-11-05 22:47:30'),
(5, 11, '2019-11-05 22:47:30', '2019-11-05 22:47:30'),
(6, 11, '2019-11-05 22:47:30', '2019-11-05 22:47:30'),
(7, 11, '2019-11-05 22:47:30', '2019-11-05 22:47:30'),
(8, 11, '2019-11-05 22:47:30', '2019-11-05 22:47:30'),
(9, 11, '2019-11-05 22:47:30', '2019-11-05 22:47:30'),
(10, 11, '2019-11-05 22:47:30', '2019-11-05 22:47:30'),
(14, 11, '2019-11-05 22:47:30', '2019-11-05 22:47:30'),
(15, 11, '2019-11-05 22:47:30', '2019-11-05 22:47:30'),
(16, 11, '2019-11-05 22:47:30', '2019-11-05 22:47:30'),
(1, 1, '2019-07-29 21:42:45', '2019-07-29 21:42:45'),
(18, 1, '2019-07-29 21:42:46', '2019-07-29 21:42:46'),
(19, 1, '2019-07-29 21:42:46', '2019-07-29 21:42:46'),
(20, 1, '2019-07-29 21:42:46', '2019-07-29 21:42:46'),
(22, 1, '2019-07-29 21:42:46', '2019-07-29 21:42:46'),
(23, 1, '2019-07-29 21:42:46', '2019-07-29 21:42:46'),
(24, 1, '2019-07-29 21:42:46', '2019-07-29 21:42:46'),
(30, 1, '2019-07-29 21:42:46', '2019-07-29 21:42:46'),
(31, 1, '2019-07-29 21:42:46', '2019-07-29 21:42:46'),
(32, 1, '2019-07-29 21:42:46', '2019-07-29 21:42:46'),
(10, 1, NULL, '2019-10-23 18:09:33'),
(8, 1, NULL, '2019-10-23 18:09:51'),
(2, 1, '2019-10-23 16:10:28', '2019-10-23 16:10:28'),
(3, 1, '2019-10-23 16:10:28', '2019-10-23 16:10:28'),
(4, 1, '2019-10-23 16:10:28', '2019-10-23 16:10:28'),
(5, 1, '2019-10-23 16:10:28', '2019-10-23 16:10:28'),
(6, 1, '2019-10-23 16:10:28', '2019-10-23 16:10:28'),
(7, 1, '2019-10-23 16:10:28', '2019-10-23 16:10:28'),
(9, 1, '2019-10-23 16:10:28', '2019-10-23 16:10:28'),
(14, 1, '2019-10-23 16:10:28', '2019-10-23 16:10:28'),
(15, 1, '2019-10-23 16:10:28', '2019-10-23 16:10:28'),
(16, 1, '2019-10-23 16:10:28', '2019-10-23 16:10:28'),
(17, 1, '2019-10-23 16:10:28', '2019-10-23 16:10:28'),
(21, 1, '2019-10-23 16:10:28', '2019-10-23 16:10:28'),
(25, 1, '2019-10-23 16:10:28', '2019-10-23 16:10:28'),
(26, 1, '2019-10-23 16:10:28', '2019-10-23 16:10:28'),
(27, 1, '2019-10-23 16:10:28', '2019-10-23 16:10:28'),
(28, 1, '2019-10-23 16:10:28', '2019-10-23 16:10:28'),
(29, 1, '2019-10-23 16:10:28', '2019-10-23 16:10:28'),
(33, 1, '2019-10-23 16:10:28', '2019-10-23 16:10:28'),
(34, 1, '2019-10-23 16:10:28', '2019-10-23 16:10:28'),
(35, 1, '2019-10-23 16:10:28', '2019-10-23 16:10:28'),
(36, 1, '2019-10-23 16:10:28', '2019-10-23 16:10:28'),
(37, 1, '2019-10-23 16:10:28', '2019-10-23 16:10:28'),
(38, 1, '2019-10-23 16:10:28', '2019-10-23 16:10:28'),
(39, 1, '2019-10-23 16:10:28', '2019-10-23 16:10:28'),
(40, 1, '2019-10-23 16:10:28', '2019-10-23 16:10:28'),
(41, 1, '2019-10-23 16:10:28', '2019-10-23 16:10:28'),
(42, 1, '2019-10-23 16:10:28', '2019-10-23 16:10:28'),
(43, 1, '2019-10-23 16:10:28', '2019-10-23 16:10:28'),
(44, 1, '2019-10-28 09:58:32', '2019-10-28 09:58:32'),
(45, 1, '2019-10-28 09:58:32', '2019-10-28 09:58:32'),
(46, 1, '2019-10-31 18:15:31', '2019-10-31 18:15:31'),
(47, 1, '2019-10-31 18:15:31', '2019-10-31 18:15:31'),
(48, 1, '2019-10-31 18:15:31', '2019-10-31 18:15:31'),
(49, 1, '2019-10-31 19:14:01', '2019-10-31 19:14:01'),
(50, 1, '2019-10-31 19:51:14', '2019-10-31 19:51:14'),
(51, 1, '2019-10-31 20:50:32', '2019-10-31 20:50:32'),
(52, 1, '2019-10-31 20:50:32', '2019-10-31 20:50:32'),
(53, 1, '2019-11-02 18:31:13', '2019-11-02 18:31:13'),
(54, 1, '2019-11-02 18:31:13', '2019-11-02 18:31:13'),
(55, 1, '2019-11-02 18:31:13', '2019-11-02 18:31:13'),
(1, 2, '2019-11-03 22:42:11', '2019-11-03 22:42:11'),
(2, 2, '2019-11-03 22:42:11', '2019-11-03 22:42:11'),
(3, 2, '2019-11-03 22:42:11', '2019-11-03 22:42:11'),
(4, 2, '2019-11-03 22:42:11', '2019-11-03 22:42:11'),
(5, 2, '2019-11-03 22:42:11', '2019-11-03 22:42:11'),
(6, 2, '2019-11-03 22:42:11', '2019-11-03 22:42:11'),
(7, 2, '2019-11-03 22:42:11', '2019-11-03 22:42:11'),
(8, 2, '2019-11-03 22:42:11', '2019-11-03 22:42:11'),
(9, 2, '2019-11-03 22:42:11', '2019-11-03 22:42:11'),
(10, 2, '2019-11-03 22:42:11', '2019-11-03 22:42:11'),
(14, 2, '2019-11-03 22:42:11', '2019-11-03 22:42:11'),
(15, 2, '2019-11-03 22:42:11', '2019-11-03 22:42:11'),
(16, 2, '2019-11-03 22:42:11', '2019-11-03 22:42:11'),
(17, 2, '2019-11-03 22:42:11', '2019-11-03 22:42:11'),
(18, 2, '2019-11-03 22:42:11', '2019-11-03 22:42:11'),
(19, 2, '2019-11-03 22:42:11', '2019-11-03 22:42:11'),
(20, 2, '2019-11-03 22:42:11', '2019-11-03 22:42:11'),
(21, 2, '2019-11-03 22:42:11', '2019-11-03 22:42:11'),
(22, 2, '2019-11-03 22:42:11', '2019-11-03 22:42:11'),
(23, 2, '2019-11-03 22:42:11', '2019-11-03 22:42:11'),
(24, 2, '2019-11-03 22:42:11', '2019-11-03 22:42:11'),
(25, 2, '2019-11-03 22:42:11', '2019-11-03 22:42:11'),
(26, 2, '2019-11-03 22:42:11', '2019-11-03 22:42:11'),
(27, 2, '2019-11-03 22:42:11', '2019-11-03 22:42:11'),
(28, 2, '2019-11-03 22:42:11', '2019-11-03 22:42:11'),
(29, 2, '2019-11-03 22:42:11', '2019-11-03 22:42:11'),
(30, 2, '2019-11-03 22:42:11', '2019-11-03 22:42:11'),
(31, 2, '2019-11-03 22:42:11', '2019-11-03 22:42:11'),
(32, 2, '2019-11-03 22:42:11', '2019-11-03 22:42:11'),
(33, 2, '2019-11-03 22:42:12', '2019-11-03 22:42:12'),
(34, 2, '2019-11-03 22:42:12', '2019-11-03 22:42:12'),
(35, 2, '2019-11-03 22:42:12', '2019-11-03 22:42:12'),
(36, 2, '2019-11-03 22:42:12', '2019-11-03 22:42:12'),
(37, 2, '2019-11-03 22:42:12', '2019-11-03 22:42:12'),
(38, 2, '2019-11-03 22:42:12', '2019-11-03 22:42:12'),
(39, 2, '2019-11-03 22:42:12', '2019-11-03 22:42:12'),
(40, 2, '2019-11-03 22:42:12', '2019-11-03 22:42:12'),
(41, 2, '2019-11-03 22:42:12', '2019-11-03 22:42:12'),
(42, 2, '2019-11-03 22:42:12', '2019-11-03 22:42:12'),
(43, 2, '2019-11-03 22:42:12', '2019-11-03 22:42:12'),
(44, 2, '2019-11-03 22:42:12', '2019-11-03 22:42:12'),
(45, 2, '2019-11-03 22:42:12', '2019-11-03 22:42:12'),
(46, 2, '2019-11-03 22:42:12', '2019-11-03 22:42:12'),
(47, 2, '2019-11-03 22:42:12', '2019-11-03 22:42:12'),
(48, 2, '2019-11-03 22:42:12', '2019-11-03 22:42:12'),
(49, 2, '2019-11-03 22:42:12', '2019-11-03 22:42:12'),
(50, 2, '2019-11-03 22:42:12', '2019-11-03 22:42:12'),
(51, 2, '2019-11-03 22:42:12', '2019-11-03 22:42:12'),
(52, 2, '2019-11-03 22:42:12', '2019-11-03 22:42:12'),
(53, 2, '2019-11-03 22:42:12', '2019-11-03 22:42:12'),
(54, 2, '2019-11-03 22:42:12', '2019-11-03 22:42:12'),
(55, 2, '2019-11-03 22:42:12', '2019-11-03 22:42:12'),
(56, 2, '2019-11-03 22:42:12', '2019-11-03 22:42:12'),
(57, 2, '2019-11-03 22:42:12', '2019-11-03 22:42:12'),
(58, 2, '2019-11-03 22:42:12', '2019-11-03 22:42:12'),
(59, 2, '2019-11-03 22:42:12', '2019-11-03 22:42:12'),
(60, 2, '2019-11-03 22:42:12', '2019-11-03 22:42:12'),
(61, 2, '2019-11-03 22:42:12', '2019-11-03 22:42:12'),
(62, 2, '2019-11-03 22:42:12', '2019-11-03 22:42:12'),
(56, 1, '2019-11-03 22:43:30', '2019-11-03 22:43:30'),
(57, 1, '2019-11-03 22:43:30', '2019-11-03 22:43:30'),
(58, 1, '2019-11-03 22:43:30', '2019-11-03 22:43:30'),
(59, 1, '2019-11-03 22:43:30', '2019-11-03 22:43:30'),
(60, 1, '2019-11-03 22:43:30', '2019-11-03 22:43:30'),
(61, 1, '2019-11-03 22:43:31', '2019-11-03 22:43:31'),
(62, 1, '2019-11-03 22:43:31', '2019-11-03 22:43:31'),
(63, 1, '2019-11-04 22:56:58', '2019-11-04 22:56:58'),
(64, 1, '2019-11-05 19:00:01', '2019-11-05 19:00:01'),
(65, 1, '2019-11-05 19:00:01', '2019-11-05 19:00:01'),
(66, 1, '2019-11-05 19:00:01', '2019-11-05 19:00:01'),
(67, 1, '2019-11-05 19:00:01', '2019-11-05 19:00:01'),
(68, 1, '2019-11-05 19:00:01', '2019-11-05 19:00:01'),
(69, 1, '2019-11-05 19:00:01', '2019-11-05 19:00:01'),
(70, 1, '2019-11-05 19:00:01', '2019-11-05 19:00:01'),
(71, 1, '2019-11-05 19:22:33', '2019-11-05 19:22:33'),
(72, 1, '2019-11-05 22:04:04', '2019-11-05 22:04:04'),
(63, 2, '2019-11-05 22:19:58', '2019-11-05 22:19:58'),
(64, 2, '2019-11-05 22:19:58', '2019-11-05 22:19:58'),
(65, 2, '2019-11-05 22:19:58', '2019-11-05 22:19:58'),
(66, 2, '2019-11-05 22:19:58', '2019-11-05 22:19:58'),
(67, 2, '2019-11-05 22:19:58', '2019-11-05 22:19:58'),
(68, 2, '2019-11-05 22:19:58', '2019-11-05 22:19:58'),
(69, 2, '2019-11-05 22:19:58', '2019-11-05 22:19:58'),
(70, 2, '2019-11-05 22:19:58', '2019-11-05 22:19:58'),
(71, 2, '2019-11-05 22:19:58', '2019-11-05 22:19:58'),
(72, 2, '2019-11-05 22:19:58', '2019-11-05 22:19:58'),
(1, 7, '2019-11-05 22:42:45', '2019-11-05 22:42:45'),
(64, 7, '2019-11-05 22:42:45', '2019-11-05 22:42:45'),
(65, 7, '2019-11-05 22:42:45', '2019-11-05 22:42:45'),
(66, 7, '2019-11-05 22:42:45', '2019-11-05 22:42:45'),
(67, 7, '2019-11-05 22:42:45', '2019-11-05 22:42:45'),
(68, 7, '2019-11-05 22:42:45', '2019-11-05 22:42:45'),
(69, 7, '2019-11-05 22:42:45', '2019-11-05 22:42:45'),
(71, 7, '2019-11-05 22:42:45', '2019-11-05 22:42:45'),
(72, 7, '2019-11-05 22:42:45', '2019-11-05 22:42:45'),
(1, 8, '2019-11-05 22:44:35', '2019-11-05 22:44:35'),
(44, 8, '2019-11-05 22:44:35', '2019-11-05 22:44:35'),
(45, 8, '2019-11-05 22:44:35', '2019-11-05 22:44:35'),
(46, 8, '2019-11-05 22:44:35', '2019-11-05 22:44:35'),
(47, 8, '2019-11-05 22:44:35', '2019-11-05 22:44:35'),
(48, 8, '2019-11-05 22:44:35', '2019-11-05 22:44:35'),
(49, 8, '2019-11-05 22:44:35', '2019-11-05 22:44:35'),
(50, 8, '2019-11-05 22:44:35', '2019-11-05 22:44:35'),
(51, 8, '2019-11-05 22:44:35', '2019-11-05 22:44:35'),
(52, 8, '2019-11-05 22:44:35', '2019-11-05 22:44:35'),
(53, 8, '2019-11-05 22:44:35', '2019-11-05 22:44:35'),
(54, 8, '2019-11-05 22:44:35', '2019-11-05 22:44:35'),
(55, 8, '2019-11-05 22:44:35', '2019-11-05 22:44:35'),
(56, 8, '2019-11-05 22:44:35', '2019-11-05 22:44:35'),
(57, 8, '2019-11-05 22:44:35', '2019-11-05 22:44:35'),
(58, 8, '2019-11-05 22:44:35', '2019-11-05 22:44:35'),
(59, 8, '2019-11-05 22:44:35', '2019-11-05 22:44:35'),
(60, 8, '2019-11-05 22:44:35', '2019-11-05 22:44:35'),
(61, 8, '2019-11-05 22:44:35', '2019-11-05 22:44:35'),
(62, 8, '2019-11-05 22:44:35', '2019-11-05 22:44:35'),
(63, 8, '2019-11-05 22:44:35', '2019-11-05 22:44:35'),
(64, 8, '2019-11-05 22:44:35', '2019-11-05 22:44:35'),
(65, 8, '2019-11-05 22:44:35', '2019-11-05 22:44:35'),
(1, 9, '2019-11-05 22:45:17', '2019-11-05 22:45:17'),
(17, 9, '2019-11-05 22:45:17', '2019-11-05 22:45:17'),
(18, 9, '2019-11-05 22:45:17', '2019-11-05 22:45:17'),
(19, 9, '2019-11-05 22:45:17', '2019-11-05 22:45:17'),
(20, 9, '2019-11-05 22:45:17', '2019-11-05 22:45:17'),
(21, 9, '2019-11-05 22:45:17', '2019-11-05 22:45:17'),
(22, 9, '2019-11-05 22:45:17', '2019-11-05 22:45:17'),
(23, 9, '2019-11-05 22:45:17', '2019-11-05 22:45:17'),
(24, 9, '2019-11-05 22:45:17', '2019-11-05 22:45:17'),
(25, 9, '2019-11-05 22:45:17', '2019-11-05 22:45:17'),
(26, 9, '2019-11-05 22:45:17', '2019-11-05 22:45:17'),
(27, 9, '2019-11-05 22:45:17', '2019-11-05 22:45:17'),
(28, 9, '2019-11-05 22:45:17', '2019-11-05 22:45:17'),
(29, 9, '2019-11-05 22:45:17', '2019-11-05 22:45:17'),
(30, 9, '2019-11-05 22:45:17', '2019-11-05 22:45:17'),
(31, 9, '2019-11-05 22:45:17', '2019-11-05 22:45:17'),
(32, 9, '2019-11-05 22:45:17', '2019-11-05 22:45:17'),
(33, 9, '2019-11-05 22:45:17', '2019-11-05 22:45:17'),
(34, 9, '2019-11-05 22:45:17', '2019-11-05 22:45:17'),
(35, 9, '2019-11-05 22:45:17', '2019-11-05 22:45:17'),
(36, 9, '2019-11-05 22:45:17', '2019-11-05 22:45:17'),
(37, 9, '2019-11-05 22:45:17', '2019-11-05 22:45:17'),
(38, 9, '2019-11-05 22:45:17', '2019-11-05 22:45:17'),
(39, 9, '2019-11-05 22:45:17', '2019-11-05 22:45:17'),
(40, 9, '2019-11-05 22:45:17', '2019-11-05 22:45:17'),
(41, 9, '2019-11-05 22:45:17', '2019-11-05 22:45:17'),
(42, 9, '2019-11-05 22:45:17', '2019-11-05 22:45:17'),
(43, 9, '2019-11-05 22:45:17', '2019-11-05 22:45:17'),
(1, 10, '2019-11-05 22:46:29', '2019-11-05 22:46:29'),
(33, 10, '2019-11-05 22:46:29', '2019-11-05 22:46:29'),
(34, 10, '2019-11-05 22:46:29', '2019-11-05 22:46:29'),
(37, 10, '2019-11-05 22:46:29', '2019-11-05 22:46:29'),
(38, 10, '2019-11-05 22:46:29', '2019-11-05 22:46:29'),
(39, 10, '2019-11-05 22:46:29', '2019-11-05 22:46:29'),
(40, 10, '2019-11-05 22:46:29', '2019-11-05 22:46:29'),
(41, 10, '2019-11-05 22:46:29', '2019-11-05 22:46:29'),
(42, 10, '2019-11-05 22:46:29', '2019-11-05 22:46:29'),
(43, 10, '2019-11-05 22:46:29', '2019-11-05 22:46:29'),
(1, 11, '2019-11-05 22:47:30', '2019-11-05 22:47:30'),
(2, 11, '2019-11-05 22:47:30', '2019-11-05 22:47:30'),
(3, 11, '2019-11-05 22:47:30', '2019-11-05 22:47:30'),
(4, 11, '2019-11-05 22:47:30', '2019-11-05 22:47:30'),
(5, 11, '2019-11-05 22:47:30', '2019-11-05 22:47:30'),
(6, 11, '2019-11-05 22:47:30', '2019-11-05 22:47:30'),
(7, 11, '2019-11-05 22:47:30', '2019-11-05 22:47:30'),
(8, 11, '2019-11-05 22:47:30', '2019-11-05 22:47:30'),
(9, 11, '2019-11-05 22:47:30', '2019-11-05 22:47:30'),
(10, 11, '2019-11-05 22:47:30', '2019-11-05 22:47:30'),
(14, 11, '2019-11-05 22:47:30', '2019-11-05 22:47:30'),
(15, 11, '2019-11-05 22:47:30', '2019-11-05 22:47:30'),
(16, 11, '2019-11-05 22:47:30', '2019-11-05 22:47:30'),
(73, 1, '2019-11-06 23:31:28', '2019-11-06 23:31:28'),
(74, 1, '2019-11-06 23:31:28', '2019-11-06 23:31:28'),
(75, 1, '2019-11-06 23:31:28', '2019-11-06 23:31:28'),
(76, 1, '2019-11-06 23:31:28', '2019-11-06 23:31:28'),
(77, 1, '2019-11-06 23:31:28', '2019-11-06 23:31:28'),
(78, 1, '2019-11-06 23:31:28', '2019-11-06 23:31:28'),
(79, 1, '2019-11-06 23:31:28', '2019-11-06 23:31:28'),
(80, 1, '2019-11-06 23:31:28', '2019-11-06 23:31:28'),
(81, 1, '2019-11-06 23:31:28', '2019-11-06 23:31:28'),
(73, 2, '2019-11-06 23:31:38', '2019-11-06 23:31:38'),
(74, 2, '2019-11-06 23:31:38', '2019-11-06 23:31:38'),
(75, 2, '2019-11-06 23:31:38', '2019-11-06 23:31:38'),
(76, 2, '2019-11-06 23:31:38', '2019-11-06 23:31:38'),
(77, 2, '2019-11-06 23:31:38', '2019-11-06 23:31:38'),
(78, 2, '2019-11-06 23:31:38', '2019-11-06 23:31:38'),
(79, 2, '2019-11-06 23:31:38', '2019-11-06 23:31:38'),
(80, 2, '2019-11-06 23:31:38', '2019-11-06 23:31:38'),
(81, 2, '2019-11-06 23:31:38', '2019-11-06 23:31:38'),
(73, 7, '2019-11-06 23:31:57', '2019-11-06 23:31:57'),
(74, 7, '2019-11-06 23:31:57', '2019-11-06 23:31:57'),
(75, 7, '2019-11-06 23:31:57', '2019-11-06 23:31:57'),
(76, 10, '2019-11-06 23:32:15', '2019-11-06 23:32:15'),
(77, 10, '2019-11-06 23:32:15', '2019-11-06 23:32:15'),
(78, 10, '2019-11-06 23:32:15', '2019-11-06 23:32:15'),
(79, 10, '2019-11-06 23:32:15', '2019-11-06 23:32:15'),
(80, 10, '2019-11-06 23:32:15', '2019-11-06 23:32:15'),
(81, 10, '2019-11-06 23:32:15', '2019-11-06 23:32:15'),
(82, 1, '2019-11-07 00:55:16', '2019-11-07 00:55:16'),
(83, 1, '2019-11-07 00:55:16', '2019-11-07 00:55:16'),
(84, 1, '2019-11-07 00:55:16', '2019-11-07 00:55:16'),
(85, 1, '2019-11-07 00:55:16', '2019-11-07 00:55:16'),
(86, 1, '2019-11-07 11:03:35', '2019-11-07 11:03:35'),
(87, 1, '2019-11-07 11:03:35', '2019-11-07 11:03:35'),
(88, 1, '2019-11-07 11:03:35', '2019-11-07 11:03:35'),
(89, 1, '2019-11-07 11:03:35', '2019-11-07 11:03:35'),
(90, 1, '2019-11-07 12:21:34', '2019-11-07 12:21:34'),
(91, 1, '2019-11-07 12:21:34', '2019-11-07 12:21:34'),
(82, 2, '2019-11-07 18:59:59', '2019-11-07 18:59:59'),
(83, 2, '2019-11-07 18:59:59', '2019-11-07 18:59:59'),
(84, 2, '2019-11-07 18:59:59', '2019-11-07 18:59:59'),
(86, 2, '2019-11-07 18:59:59', '2019-11-07 18:59:59'),
(87, 2, '2019-11-07 18:59:59', '2019-11-07 18:59:59'),
(88, 2, '2019-11-07 18:59:59', '2019-11-07 18:59:59'),
(90, 2, '2019-11-07 18:59:59', '2019-11-07 18:59:59'),
(91, 2, '2019-11-07 18:59:59', '2019-11-07 18:59:59'),
(92, 2, '2019-11-07 18:59:59', '2019-11-07 18:59:59'),
(93, 2, '2019-11-07 18:59:59', '2019-11-07 18:59:59'),
(94, 2, '2019-11-07 18:59:59', '2019-11-07 18:59:59'),
(95, 2, '2019-11-07 18:59:59', '2019-11-07 18:59:59'),
(96, 2, '2019-11-07 18:59:59', '2019-11-07 18:59:59'),
(97, 2, '2019-11-07 18:59:59', '2019-11-07 18:59:59'),
(98, 2, '2019-11-07 18:59:59', '2019-11-07 18:59:59'),
(99, 2, '2019-11-07 18:59:59', '2019-11-07 18:59:59'),
(100, 2, '2019-11-07 18:59:59', '2019-11-07 18:59:59'),
(85, 2, '2019-11-07 19:05:48', '2019-11-07 19:05:48'),
(89, 2, '2019-11-07 19:05:48', '2019-11-07 19:05:48'),
(92, 1, '2019-11-08 14:07:57', '2019-11-08 14:07:57'),
(93, 1, '2019-11-08 14:07:57', '2019-11-08 14:07:57'),
(94, 1, '2019-11-08 14:07:57', '2019-11-08 14:07:57'),
(95, 1, '2019-11-08 14:07:57', '2019-11-08 14:07:57'),
(96, 1, '2019-11-08 14:07:57', '2019-11-08 14:07:57'),
(97, 1, '2019-11-08 14:07:57', '2019-11-08 14:07:57'),
(98, 1, '2019-11-08 14:07:57', '2019-11-08 14:07:57'),
(99, 1, '2019-11-08 14:07:57', '2019-11-08 14:07:57'),
(100, 1, '2019-11-08 14:07:57', '2019-11-08 14:07:57'),
(101, 1, '2019-11-08 14:07:57', '2019-11-08 14:07:57'),
(102, 1, '2019-11-08 14:07:57', '2019-11-08 14:07:57'),
(103, 1, '2019-11-08 14:07:57', '2019-11-08 14:07:57'),
(104, 1, '2019-11-08 14:07:57', '2019-11-08 14:07:57'),
(105, 1, '2019-11-08 14:07:58', '2019-11-08 14:07:58'),
(11, 1, NULL, '2019-11-08 14:18:25'),
(12, 1, '2019-11-08 14:20:56', '2019-11-08 14:20:56'),
(13, 1, '2019-11-08 14:20:56', '2019-11-08 14:20:56'),
(106, 1, '2019-11-08 23:18:08', '2019-11-08 23:18:08'),
(107, 1, '2019-11-09 08:59:56', '2019-11-09 08:59:56'),
(108, 1, '2019-11-09 08:59:56', '2019-11-09 08:59:56'),
(109, 1, '2019-11-09 09:38:30', '2019-11-09 09:38:30'),
(110, 1, '2019-11-09 09:38:30', '2019-11-09 09:38:30'),
(111, 1, '2019-11-09 09:38:30', '2019-11-09 09:38:30'),
(112, 1, '2019-11-09 13:24:24', '2019-11-09 13:24:24'),
(113, 1, '2019-11-09 23:04:13', '2019-11-09 23:04:13'),
(114, 1, '2019-11-09 23:04:13', '2019-11-09 23:04:13'),
(115, 1, '2019-11-09 23:04:13', '2019-11-09 23:04:13'),
(116, 1, '2019-11-09 23:04:13', '2019-11-09 23:04:13'),
(11, 2, '2019-11-09 23:04:26', '2019-11-09 23:04:26'),
(12, 2, '2019-11-09 23:04:26', '2019-11-09 23:04:26'),
(13, 2, '2019-11-09 23:04:26', '2019-11-09 23:04:26'),
(101, 2, '2019-11-09 23:04:26', '2019-11-09 23:04:26'),
(102, 2, '2019-11-09 23:04:27', '2019-11-09 23:04:27'),
(103, 2, '2019-11-09 23:04:27', '2019-11-09 23:04:27'),
(104, 2, '2019-11-09 23:04:27', '2019-11-09 23:04:27'),
(105, 2, '2019-11-09 23:04:27', '2019-11-09 23:04:27'),
(106, 2, '2019-11-09 23:04:27', '2019-11-09 23:04:27'),
(107, 2, '2019-11-09 23:04:27', '2019-11-09 23:04:27'),
(108, 2, '2019-11-09 23:04:27', '2019-11-09 23:04:27'),
(109, 2, '2019-11-09 23:04:27', '2019-11-09 23:04:27'),
(110, 2, '2019-11-09 23:04:27', '2019-11-09 23:04:27'),
(111, 2, '2019-11-09 23:04:27', '2019-11-09 23:04:27'),
(112, 2, '2019-11-09 23:04:27', '2019-11-09 23:04:27'),
(113, 2, '2019-11-09 23:04:27', '2019-11-09 23:04:27'),
(114, 2, '2019-11-09 23:04:27', '2019-11-09 23:04:27'),
(115, 2, '2019-11-09 23:04:27', '2019-11-09 23:04:27'),
(116, 2, '2019-11-09 23:04:27', '2019-11-09 23:04:27'),
(117, 1, '2019-11-10 03:47:04', '2019-11-10 03:47:04'),
(118, 1, '2019-11-10 03:47:04', '2019-11-10 03:47:04');

-- --------------------------------------------------------

--
-- Table structure for table `print_prices`
--

CREATE TABLE `print_prices` (
  `id` int(10) UNSIGNED NOT NULL,
  `size_id` int(10) UNSIGNED NOT NULL,
  `type_id` int(10) UNSIGNED NOT NULL,
  `color_id` int(10) UNSIGNED NOT NULL,
  `machine_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `print_prices`
--

INSERT INTO `print_prices` (`id`, `size_id`, `type_id`, `color_id`, `machine_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 0, 0, '2019-11-03 23:05:37', '2019-11-03 23:05:37'),
(2, 2, 2, 2, 3, 2, 11, '2019-11-03 23:17:51', '2019-11-03 23:17:51'),
(3, 3, 2, 2, 10, 1, 0, '2019-11-09 09:25:00', '2019-11-09 09:25:00'),
(4, 4, 2, 2, 10, 1, 0, '2019-11-09 09:25:00', '2019-11-09 09:25:00'),
(5, 5, 2, 2, 10, 1, 0, '2019-11-09 09:25:00', '2019-11-09 09:25:00'),
(6, 6, 2, 2, 10, 1, 0, '2019-11-09 09:25:00', '2019-11-09 09:25:00'),
(7, 2, 2, 2, 10, 1, 0, '2019-11-09 09:25:00', '2019-11-09 09:25:00'),
(8, 7, 2, 2, 10, 1, 0, '2019-11-09 09:25:01', '2019-11-09 09:25:01'),
(9, 8, 2, 2, 10, 1, 0, '2019-11-09 09:25:01', '2019-11-09 09:25:01'),
(10, 9, 2, 2, 10, 1, 0, '2019-11-09 09:25:01', '2019-11-09 09:25:01'),
(11, 10, 2, 2, 10, 1, 0, '2019-11-09 09:25:01', '2019-11-09 09:25:01'),
(12, 11, 2, 2, 10, 1, 0, '2019-11-09 09:25:01', '2019-11-09 09:25:01'),
(13, 3, 3, 2, 10, 1, 0, '2019-11-09 09:25:01', '2019-11-09 09:25:01'),
(14, 4, 3, 2, 10, 1, 0, '2019-11-09 09:25:01', '2019-11-09 09:25:01'),
(15, 5, 3, 2, 10, 1, 0, '2019-11-09 09:25:01', '2019-11-09 09:25:01'),
(16, 6, 3, 2, 10, 1, 0, '2019-11-09 09:25:01', '2019-11-09 09:25:01'),
(17, 2, 3, 2, 10, 1, 0, '2019-11-09 09:25:01', '2019-11-09 09:25:01'),
(18, 7, 3, 2, 10, 1, 0, '2019-11-09 09:25:01', '2019-11-09 09:25:01'),
(19, 8, 3, 2, 10, 1, 0, '2019-11-09 09:25:01', '2019-11-09 09:25:01'),
(20, 9, 3, 2, 10, 1, 0, '2019-11-09 09:25:01', '2019-11-09 09:25:01'),
(21, 10, 3, 2, 10, 1, 0, '2019-11-09 09:25:01', '2019-11-09 09:25:01'),
(22, 11, 3, 2, 10, 1, 0, '2019-11-09 09:25:01', '2019-11-09 09:25:01'),
(23, 3, 4, 2, 10, 1, 0, '2019-11-09 09:25:01', '2019-11-09 09:25:01'),
(24, 4, 4, 2, 10, 1, 0, '2019-11-09 09:25:01', '2019-11-09 09:25:01'),
(25, 5, 4, 2, 10, 1, 0, '2019-11-09 09:25:01', '2019-11-09 09:25:01'),
(26, 6, 4, 2, 10, 1, 0, '2019-11-09 09:25:01', '2019-11-09 09:25:01'),
(27, 2, 4, 2, 10, 1, 0, '2019-11-09 09:25:01', '2019-11-09 09:25:01'),
(28, 7, 4, 2, 10, 1, 0, '2019-11-09 09:25:01', '2019-11-09 09:25:01'),
(29, 8, 4, 2, 10, 1, 0, '2019-11-09 09:25:01', '2019-11-09 09:25:01'),
(30, 9, 4, 2, 10, 1, 0, '2019-11-09 09:25:01', '2019-11-09 09:25:01'),
(31, 10, 4, 2, 10, 1, 0, '2019-11-09 09:25:01', '2019-11-09 09:25:01'),
(32, 11, 4, 2, 10, 1, 0, '2019-11-09 09:25:01', '2019-11-09 09:25:01'),
(33, 3, 5, 2, 10, 1, 0, '2019-11-09 09:25:01', '2019-11-09 09:25:01'),
(34, 4, 5, 2, 10, 1, 0, '2019-11-09 09:25:01', '2019-11-09 09:25:01'),
(35, 5, 5, 2, 10, 1, 0, '2019-11-09 09:25:01', '2019-11-09 09:25:01'),
(36, 6, 5, 2, 10, 1, 0, '2019-11-09 09:25:01', '2019-11-09 09:25:01'),
(37, 2, 5, 2, 10, 1, 0, '2019-11-09 09:25:01', '2019-11-09 09:25:01'),
(38, 7, 5, 2, 10, 1, 0, '2019-11-09 09:25:01', '2019-11-09 09:25:01'),
(39, 8, 5, 2, 10, 1, 0, '2019-11-09 09:25:01', '2019-11-09 09:25:01'),
(40, 9, 5, 2, 10, 1, 0, '2019-11-09 09:25:02', '2019-11-09 09:25:02'),
(41, 10, 5, 2, 10, 1, 0, '2019-11-09 09:25:02', '2019-11-09 09:25:02'),
(42, 11, 5, 2, 10, 1, 0, '2019-11-09 09:25:02', '2019-11-09 09:25:02'),
(43, 3, 9, 2, 10, 1, 0, '2019-11-09 09:25:02', '2019-11-09 09:25:02'),
(44, 4, 9, 2, 10, 1, 0, '2019-11-09 09:25:02', '2019-11-09 09:25:02'),
(45, 5, 9, 2, 10, 0, 0, '2019-11-09 09:25:02', '2019-11-09 09:25:02'),
(46, 6, 9, 2, 10, 0, 0, '2019-11-09 09:25:02', '2019-11-09 09:25:02'),
(47, 2, 9, 2, 10, 0, 0, '2019-11-09 09:25:02', '2019-11-09 09:25:02'),
(48, 7, 9, 2, 10, 1, 0, '2019-11-09 09:25:02', '2019-11-09 09:25:02'),
(49, 8, 9, 2, 10, 1, 0, '2019-11-09 09:25:02', '2019-11-09 09:25:02'),
(50, 9, 9, 2, 10, 1, 0, '2019-11-09 09:25:02', '2019-11-09 09:25:02'),
(51, 10, 9, 2, 10, 1, 0, '2019-11-09 09:25:02', '2019-11-09 09:25:02'),
(52, 11, 9, 2, 10, 1, 0, '2019-11-09 09:25:02', '2019-11-09 09:25:02'),
(53, 3, 9, 2, 10, 0, 0, '2019-11-09 09:25:02', '2019-11-09 09:25:02'),
(54, 4, 9, 2, 10, 1, 0, '2019-11-09 09:25:02', '2019-11-09 09:25:02'),
(55, 5, 9, 2, 10, 2, 0, '2019-11-09 09:25:02', '2019-11-09 09:25:02'),
(56, 6, 9, 2, 10, 5, 0, '2019-11-09 09:25:02', '2019-11-09 09:25:02'),
(57, 2, 9, 2, 10, 8, 0, '2019-11-09 09:25:02', '2019-11-09 09:25:02'),
(58, 7, 9, 2, 10, 1, 0, '2019-11-09 09:25:02', '2019-11-09 09:25:02'),
(59, 8, 9, 2, 10, 1, 0, '2019-11-09 09:25:02', '2019-11-09 09:25:02'),
(60, 9, 9, 2, 10, 1, 0, '2019-11-09 09:25:02', '2019-11-09 09:25:02'),
(61, 10, 9, 2, 10, 1, 0, '2019-11-09 09:25:02', '2019-11-09 09:25:02'),
(62, 11, 9, 2, 10, 1, 0, '2019-11-09 09:25:02', '2019-11-09 09:25:02'),
(63, 3, 9, 2, 10, 1, 0, '2019-11-09 09:25:02', '2019-11-09 09:25:02'),
(64, 4, 9, 2, 10, 1, 0, '2019-11-09 09:25:02', '2019-11-09 09:25:02'),
(65, 5, 9, 2, 10, 12, 0, '2019-11-09 09:25:03', '2019-11-09 09:25:03'),
(66, 6, 9, 2, 10, 24, 0, '2019-11-09 09:25:03', '2019-11-09 09:25:03'),
(67, 2, 9, 2, 10, 48, 0, '2019-11-09 09:25:03', '2019-11-09 09:25:03'),
(68, 7, 9, 2, 10, 1, 0, '2019-11-09 09:25:03', '2019-11-09 09:25:03'),
(69, 8, 9, 2, 10, 1, 0, '2019-11-09 09:25:03', '2019-11-09 09:25:03'),
(70, 9, 9, 2, 10, 1, 0, '2019-11-09 09:25:03', '2019-11-09 09:25:03'),
(71, 10, 9, 2, 10, 1, 0, '2019-11-09 09:25:03', '2019-11-09 09:25:03'),
(72, 11, 9, 2, 10, 1, 0, '2019-11-09 09:25:03', '2019-11-09 09:25:03'),
(73, 3, 9, 2, 10, 1, 0, '2019-11-09 09:25:03', '2019-11-09 09:25:03'),
(74, 4, 9, 2, 10, 2, 0, '2019-11-09 09:25:03', '2019-11-09 09:25:03'),
(75, 5, 9, 2, 10, 3, 0, '2019-11-09 09:25:03', '2019-11-09 09:25:03'),
(76, 6, 9, 2, 10, 4, 0, '2019-11-09 09:25:03', '2019-11-09 09:25:03'),
(77, 2, 9, 2, 10, 16, 0, '2019-11-09 09:25:03', '2019-11-09 09:25:03'),
(78, 7, 9, 2, 10, 1, 0, '2019-11-09 09:25:03', '2019-11-09 09:25:03'),
(79, 8, 9, 2, 10, 1, 0, '2019-11-09 09:25:03', '2019-11-09 09:25:03'),
(80, 9, 9, 2, 10, 1, 0, '2019-11-09 09:25:03', '2019-11-09 09:25:03'),
(81, 10, 9, 2, 10, 1, 0, '2019-11-09 09:25:03', '2019-11-09 09:25:03'),
(82, 11, 9, 2, 10, 1, 0, '2019-11-09 09:25:03', '2019-11-09 09:25:03'),
(83, 3, 6, 2, 10, 1, 0, '2019-11-09 09:25:03', '2019-11-09 09:25:03'),
(84, 4, 6, 2, 10, 1, 0, '2019-11-09 09:25:03', '2019-11-09 09:25:03'),
(85, 5, 6, 2, 10, 1, 0, '2019-11-09 09:25:03', '2019-11-09 09:25:03'),
(86, 6, 6, 2, 10, 1, 0, '2019-11-09 09:25:03', '2019-11-09 09:25:03'),
(87, 2, 6, 2, 10, 1, 0, '2019-11-09 09:25:03', '2019-11-09 09:25:03'),
(88, 7, 6, 2, 10, 1, 0, '2019-11-09 09:25:03', '2019-11-09 09:25:03'),
(89, 8, 6, 2, 10, 1, 0, '2019-11-09 09:25:03', '2019-11-09 09:25:03'),
(90, 9, 6, 2, 10, 1, 0, '2019-11-09 09:25:03', '2019-11-09 09:25:03'),
(91, 10, 6, 2, 10, 1, 0, '2019-11-09 09:25:03', '2019-11-09 09:25:03'),
(92, 11, 6, 2, 10, 1, 0, '2019-11-09 09:25:03', '2019-11-09 09:25:03'),
(93, 3, 7, 2, 10, 1, 0, '2019-11-09 09:25:03', '2019-11-09 09:25:03'),
(94, 4, 7, 2, 10, 1, 0, '2019-11-09 09:25:03', '2019-11-09 09:25:03'),
(95, 5, 7, 2, 10, 1, 0, '2019-11-09 09:25:03', '2019-11-09 09:25:03'),
(96, 6, 7, 2, 10, 1, 0, '2019-11-09 09:25:03', '2019-11-09 09:25:03'),
(97, 2, 7, 2, 10, 1, 0, '2019-11-09 09:25:03', '2019-11-09 09:25:03'),
(98, 7, 7, 2, 10, 1, 0, '2019-11-09 09:25:03', '2019-11-09 09:25:03'),
(99, 8, 7, 2, 10, 1, 0, '2019-11-09 09:25:03', '2019-11-09 09:25:03'),
(100, 9, 7, 2, 10, 1, 0, '2019-11-09 09:25:03', '2019-11-09 09:25:03'),
(101, 10, 7, 2, 10, 1, 0, '2019-11-09 09:25:03', '2019-11-09 09:25:03'),
(102, 11, 7, 2, 10, 1, 0, '2019-11-09 09:25:04', '2019-11-09 09:25:04'),
(103, 3, 8, 2, 10, 1, 0, '2019-11-09 09:25:04', '2019-11-09 09:25:04'),
(104, 4, 8, 2, 10, 1, 0, '2019-11-09 09:25:04', '2019-11-09 09:25:04'),
(105, 5, 8, 2, 10, 1, 0, '2019-11-09 09:25:04', '2019-11-09 09:25:04'),
(106, 6, 8, 2, 10, 1, 0, '2019-11-09 09:25:04', '2019-11-09 09:25:04'),
(107, 2, 8, 2, 10, 1, 0, '2019-11-09 09:25:04', '2019-11-09 09:25:04'),
(108, 7, 8, 2, 10, 1, 0, '2019-11-09 09:25:04', '2019-11-09 09:25:04'),
(109, 8, 8, 2, 10, 1, 0, '2019-11-09 09:25:04', '2019-11-09 09:25:04'),
(110, 9, 8, 2, 10, 1, 0, '2019-11-09 09:25:04', '2019-11-09 09:25:04'),
(111, 10, 8, 2, 10, 1, 0, '2019-11-09 09:25:04', '2019-11-09 09:25:04'),
(112, 11, 8, 2, 10, 1, 0, '2019-11-09 09:25:04', '2019-11-09 09:25:04'),
(113, 3, 10, 2, 10, 1, 0, '2019-11-09 09:25:04', '2019-11-09 09:25:04'),
(114, 4, 10, 2, 10, 1, 0, '2019-11-09 09:25:04', '2019-11-09 09:25:04'),
(115, 5, 10, 2, 10, 1, 0, '2019-11-09 09:25:04', '2019-11-09 09:25:04'),
(116, 6, 10, 2, 10, 1, 0, '2019-11-09 09:25:04', '2019-11-09 09:25:04'),
(117, 2, 10, 2, 10, 1, 0, '2019-11-09 09:25:04', '2019-11-09 09:25:04'),
(118, 7, 10, 2, 10, 1, 0, '2019-11-09 09:25:04', '2019-11-09 09:25:04'),
(119, 8, 10, 2, 10, 1, 0, '2019-11-09 09:25:04', '2019-11-09 09:25:04'),
(120, 9, 10, 2, 10, 1, 0, '2019-11-09 09:25:04', '2019-11-09 09:25:04'),
(121, 10, 10, 2, 10, 1, 0, '2019-11-09 09:25:04', '2019-11-09 09:25:04'),
(122, 11, 10, 2, 10, 1, 0, '2019-11-09 09:25:04', '2019-11-09 09:25:04'),
(123, 3, 11, 2, 10, 1, 0, '2019-11-09 09:25:04', '2019-11-09 09:25:04'),
(124, 4, 11, 2, 10, 1, 0, '2019-11-09 09:25:04', '2019-11-09 09:25:04'),
(125, 5, 11, 2, 10, 1, 0, '2019-11-09 09:25:04', '2019-11-09 09:25:04'),
(126, 6, 11, 2, 10, 1, 0, '2019-11-09 09:25:04', '2019-11-09 09:25:04'),
(127, 2, 11, 2, 10, 1, 0, '2019-11-09 09:25:04', '2019-11-09 09:25:04'),
(128, 7, 11, 2, 10, 1, 0, '2019-11-09 09:25:04', '2019-11-09 09:25:04'),
(129, 8, 11, 2, 10, 1, 0, '2019-11-09 09:25:04', '2019-11-09 09:25:04'),
(130, 9, 11, 2, 10, 1, 0, '2019-11-09 09:25:04', '2019-11-09 09:25:04'),
(131, 10, 11, 2, 10, 1, 0, '2019-11-09 09:25:04', '2019-11-09 09:25:04'),
(132, 11, 11, 2, 10, 1, 0, '2019-11-09 09:25:04', '2019-11-09 09:25:04'),
(133, 3, 12, 2, 10, 1, 0, '2019-11-09 09:25:04', '2019-11-09 09:25:04'),
(134, 4, 12, 2, 10, 1, 0, '2019-11-09 09:25:04', '2019-11-09 09:25:04'),
(135, 5, 12, 2, 10, 1, 0, '2019-11-09 09:25:04', '2019-11-09 09:25:04'),
(136, 6, 12, 2, 10, 1, 0, '2019-11-09 09:25:04', '2019-11-09 09:25:04'),
(137, 2, 12, 2, 10, 1, 0, '2019-11-09 09:25:04', '2019-11-09 09:25:04'),
(138, 7, 12, 2, 10, 1, 0, '2019-11-09 09:25:04', '2019-11-09 09:25:04'),
(139, 8, 12, 2, 10, 1, 0, '2019-11-09 09:25:04', '2019-11-09 09:25:04'),
(140, 9, 12, 2, 10, 1, 0, '2019-11-09 09:25:05', '2019-11-09 09:25:05'),
(141, 10, 12, 2, 10, 1, 0, '2019-11-09 09:25:05', '2019-11-09 09:25:05'),
(142, 11, 12, 2, 10, 1, 0, '2019-11-09 09:25:05', '2019-11-09 09:25:05'),
(143, 3, 13, 2, 10, 1, 0, '2019-11-09 09:25:05', '2019-11-09 09:25:05'),
(144, 4, 13, 2, 10, 1, 0, '2019-11-09 09:25:05', '2019-11-09 09:25:05'),
(145, 5, 13, 2, 10, 1, 0, '2019-11-09 09:25:05', '2019-11-09 09:25:05'),
(146, 6, 13, 2, 10, 1, 0, '2019-11-09 09:25:05', '2019-11-09 09:25:05'),
(147, 2, 13, 2, 10, 1, 0, '2019-11-09 09:25:05', '2019-11-09 09:25:05'),
(148, 7, 13, 2, 10, 1, 0, '2019-11-09 09:25:05', '2019-11-09 09:25:05'),
(149, 8, 13, 2, 10, 1, 0, '2019-11-09 09:25:05', '2019-11-09 09:25:05'),
(150, 9, 13, 2, 10, 1, 0, '2019-11-09 09:25:05', '2019-11-09 09:25:05'),
(151, 10, 13, 2, 10, 1, 0, '2019-11-09 09:25:05', '2019-11-09 09:25:05'),
(152, 11, 13, 2, 10, 1, 0, '2019-11-09 09:25:05', '2019-11-09 09:25:05'),
(153, 3, 2, 3, 10, 1, 0, '2019-11-09 09:25:05', '2019-11-09 09:25:05'),
(154, 4, 2, 3, 10, 1, 0, '2019-11-09 09:25:05', '2019-11-09 09:25:05'),
(155, 5, 2, 3, 10, 1, 0, '2019-11-09 09:25:05', '2019-11-09 09:25:05'),
(156, 6, 2, 3, 10, 1, 0, '2019-11-09 09:25:05', '2019-11-09 09:25:05'),
(157, 2, 2, 3, 10, 1, 0, '2019-11-09 09:25:05', '2019-11-09 09:25:05'),
(158, 7, 2, 3, 10, 1, 0, '2019-11-09 09:25:05', '2019-11-09 09:25:05'),
(159, 8, 2, 3, 10, 1, 0, '2019-11-09 09:25:05', '2019-11-09 09:25:05'),
(160, 9, 2, 3, 10, 1, 0, '2019-11-09 09:25:05', '2019-11-09 09:25:05'),
(161, 10, 2, 3, 10, 1, 0, '2019-11-09 09:25:05', '2019-11-09 09:25:05'),
(162, 11, 2, 3, 10, 1, 0, '2019-11-09 09:25:05', '2019-11-09 09:25:05'),
(163, 3, 3, 3, 10, 1, 0, '2019-11-09 09:25:05', '2019-11-09 09:25:05'),
(164, 4, 3, 3, 10, 1, 0, '2019-11-09 09:25:05', '2019-11-09 09:25:05'),
(165, 5, 3, 3, 10, 1, 0, '2019-11-09 09:25:05', '2019-11-09 09:25:05'),
(166, 6, 3, 3, 10, 1, 0, '2019-11-09 09:25:05', '2019-11-09 09:25:05'),
(167, 2, 3, 3, 10, 1, 0, '2019-11-09 09:25:05', '2019-11-09 09:25:05'),
(168, 7, 3, 3, 10, 1, 0, '2019-11-09 09:25:05', '2019-11-09 09:25:05'),
(169, 8, 3, 3, 10, 1, 0, '2019-11-09 09:25:05', '2019-11-09 09:25:05'),
(170, 9, 3, 3, 10, 1, 0, '2019-11-09 09:25:05', '2019-11-09 09:25:05'),
(171, 10, 3, 3, 10, 1, 0, '2019-11-09 09:25:05', '2019-11-09 09:25:05'),
(172, 11, 3, 3, 10, 1, 0, '2019-11-09 09:25:05', '2019-11-09 09:25:05'),
(173, 3, 4, 3, 10, 1, 0, '2019-11-09 09:25:05', '2019-11-09 09:25:05'),
(174, 4, 4, 3, 10, 1, 0, '2019-11-09 09:25:05', '2019-11-09 09:25:05'),
(175, 5, 4, 3, 10, 1, 0, '2019-11-09 09:25:05', '2019-11-09 09:25:05'),
(176, 6, 4, 3, 10, 1, 0, '2019-11-09 09:25:05', '2019-11-09 09:25:05'),
(177, 2, 4, 3, 10, 1, 0, '2019-11-09 09:25:05', '2019-11-09 09:25:05'),
(178, 7, 4, 3, 10, 1, 0, '2019-11-09 09:25:05', '2019-11-09 09:25:05'),
(179, 8, 4, 3, 10, 1, 0, '2019-11-09 09:25:05', '2019-11-09 09:25:05'),
(180, 9, 4, 3, 10, 1, 0, '2019-11-09 09:25:05', '2019-11-09 09:25:05'),
(181, 10, 4, 3, 10, 1, 0, '2019-11-09 09:25:06', '2019-11-09 09:25:06'),
(182, 11, 4, 3, 10, 1, 0, '2019-11-09 09:25:06', '2019-11-09 09:25:06'),
(183, 3, 5, 3, 10, 1, 0, '2019-11-09 09:25:06', '2019-11-09 09:25:06'),
(184, 4, 5, 3, 10, 1, 0, '2019-11-09 09:25:06', '2019-11-09 09:25:06'),
(185, 5, 5, 3, 10, 1, 0, '2019-11-09 09:25:06', '2019-11-09 09:25:06'),
(186, 6, 5, 3, 10, 1, 0, '2019-11-09 09:25:06', '2019-11-09 09:25:06'),
(187, 2, 5, 3, 10, 1, 0, '2019-11-09 09:25:06', '2019-11-09 09:25:06'),
(188, 7, 5, 3, 10, 1, 0, '2019-11-09 09:25:06', '2019-11-09 09:25:06'),
(189, 8, 5, 3, 10, 1, 0, '2019-11-09 09:25:06', '2019-11-09 09:25:06'),
(190, 9, 5, 3, 10, 1, 0, '2019-11-09 09:25:06', '2019-11-09 09:25:06'),
(191, 10, 5, 3, 10, 1, 0, '2019-11-09 09:25:06', '2019-11-09 09:25:06'),
(192, 11, 5, 3, 10, 1, 0, '2019-11-09 09:25:06', '2019-11-09 09:25:06'),
(193, 3, 9, 3, 10, 1, 0, '2019-11-09 09:25:06', '2019-11-09 09:25:06'),
(194, 4, 9, 3, 10, 1, 0, '2019-11-09 09:25:06', '2019-11-09 09:25:06'),
(195, 5, 9, 3, 10, 0, 0, '2019-11-09 09:25:06', '2019-11-09 09:25:06'),
(196, 6, 9, 3, 10, 0, 0, '2019-11-09 09:25:06', '2019-11-09 09:25:06'),
(197, 2, 9, 3, 10, 0, 0, '2019-11-09 09:25:06', '2019-11-09 09:25:06'),
(198, 7, 9, 3, 10, 1, 0, '2019-11-09 09:25:06', '2019-11-09 09:25:06'),
(199, 8, 9, 3, 10, 1, 0, '2019-11-09 09:25:06', '2019-11-09 09:25:06'),
(200, 9, 9, 3, 10, 1, 0, '2019-11-09 09:25:06', '2019-11-09 09:25:06'),
(201, 10, 9, 3, 10, 1, 0, '2019-11-09 09:25:06', '2019-11-09 09:25:06'),
(202, 11, 9, 3, 10, 1, 0, '2019-11-09 09:25:06', '2019-11-09 09:25:06'),
(203, 3, 9, 3, 10, 1, 0, '2019-11-09 09:25:06', '2019-11-09 09:25:06'),
(204, 4, 9, 3, 10, 1, 0, '2019-11-09 09:25:06', '2019-11-09 09:25:06'),
(205, 5, 9, 3, 10, 2, 0, '2019-11-09 09:25:06', '2019-11-09 09:25:06'),
(206, 6, 9, 3, 10, 5, 0, '2019-11-09 09:25:06', '2019-11-09 09:25:06'),
(207, 2, 9, 3, 10, 8, 0, '2019-11-09 09:25:06', '2019-11-09 09:25:06'),
(208, 7, 9, 3, 10, 1, 0, '2019-11-09 09:25:06', '2019-11-09 09:25:06'),
(209, 8, 9, 3, 10, 1, 0, '2019-11-09 09:25:06', '2019-11-09 09:25:06'),
(210, 9, 9, 3, 10, 1, 0, '2019-11-09 09:25:06', '2019-11-09 09:25:06'),
(211, 10, 9, 3, 10, 1, 0, '2019-11-09 09:25:06', '2019-11-09 09:25:06'),
(212, 11, 9, 3, 10, 1, 0, '2019-11-09 09:25:06', '2019-11-09 09:25:06'),
(213, 3, 9, 3, 10, 3, 0, '2019-11-09 09:25:06', '2019-11-09 09:25:06'),
(214, 4, 9, 3, 10, 6, 0, '2019-11-09 09:25:06', '2019-11-09 09:25:06'),
(215, 5, 9, 3, 10, 12, 0, '2019-11-09 09:25:06', '2019-11-09 09:25:06'),
(216, 6, 9, 3, 10, 24, 0, '2019-11-09 09:25:06', '2019-11-09 09:25:06'),
(217, 2, 9, 3, 10, 48, 0, '2019-11-09 09:25:06', '2019-11-09 09:25:06'),
(218, 7, 9, 3, 10, 1, 0, '2019-11-09 09:25:06', '2019-11-09 09:25:06'),
(219, 8, 9, 3, 10, 1, 0, '2019-11-09 09:25:06', '2019-11-09 09:25:06'),
(220, 9, 9, 3, 10, 1, 0, '2019-11-09 09:25:06', '2019-11-09 09:25:06'),
(221, 10, 9, 3, 10, 1, 0, '2019-11-09 09:25:06', '2019-11-09 09:25:06'),
(222, 11, 9, 3, 10, 1, 0, '2019-11-09 09:25:06', '2019-11-09 09:25:06'),
(223, 3, 9, 3, 10, 1, 0, '2019-11-09 09:25:07', '2019-11-09 09:25:07'),
(224, 4, 9, 3, 10, 2, 0, '2019-11-09 09:25:07', '2019-11-09 09:25:07'),
(225, 5, 9, 3, 10, 4, 0, '2019-11-09 09:25:07', '2019-11-09 09:25:07'),
(226, 6, 9, 3, 10, 8, 0, '2019-11-09 09:25:07', '2019-11-09 09:25:07'),
(227, 2, 9, 3, 10, 16, 0, '2019-11-09 09:25:07', '2019-11-09 09:25:07'),
(228, 7, 9, 3, 10, 1, 0, '2019-11-09 09:25:07', '2019-11-09 09:25:07'),
(229, 8, 9, 3, 10, 1, 0, '2019-11-09 09:25:07', '2019-11-09 09:25:07'),
(230, 9, 9, 3, 10, 1, 0, '2019-11-09 09:25:07', '2019-11-09 09:25:07'),
(231, 10, 9, 3, 10, 1, 0, '2019-11-09 09:25:07', '2019-11-09 09:25:07'),
(232, 11, 9, 3, 10, 1, 0, '2019-11-09 09:25:07', '2019-11-09 09:25:07'),
(233, 3, 6, 3, 10, 1, 0, '2019-11-09 09:25:07', '2019-11-09 09:25:07'),
(234, 4, 6, 3, 10, 1, 0, '2019-11-09 09:25:07', '2019-11-09 09:25:07'),
(235, 5, 6, 3, 10, 1, 0, '2019-11-09 09:25:07', '2019-11-09 09:25:07'),
(236, 6, 6, 3, 10, 1, 0, '2019-11-09 09:25:07', '2019-11-09 09:25:07'),
(237, 2, 6, 3, 10, 1, 0, '2019-11-09 09:25:07', '2019-11-09 09:25:07'),
(238, 7, 6, 3, 10, 1, 0, '2019-11-09 09:25:07', '2019-11-09 09:25:07'),
(239, 8, 6, 3, 10, 1, 0, '2019-11-09 09:25:07', '2019-11-09 09:25:07'),
(240, 9, 6, 3, 10, 1, 0, '2019-11-09 09:25:07', '2019-11-09 09:25:07'),
(241, 10, 6, 3, 10, 1, 0, '2019-11-09 09:25:07', '2019-11-09 09:25:07'),
(242, 11, 6, 3, 10, 1, 0, '2019-11-09 09:25:07', '2019-11-09 09:25:07'),
(243, 3, 7, 3, 10, 1, 0, '2019-11-09 09:25:07', '2019-11-09 09:25:07'),
(244, 4, 7, 3, 10, 1, 0, '2019-11-09 09:25:07', '2019-11-09 09:25:07'),
(245, 5, 7, 3, 10, 1, 0, '2019-11-09 09:25:07', '2019-11-09 09:25:07'),
(246, 6, 7, 3, 10, 1, 0, '2019-11-09 09:25:07', '2019-11-09 09:25:07'),
(247, 2, 7, 3, 10, 1, 0, '2019-11-09 09:25:07', '2019-11-09 09:25:07'),
(248, 7, 7, 3, 10, 1, 0, '2019-11-09 09:25:07', '2019-11-09 09:25:07'),
(249, 8, 7, 3, 10, 1, 0, '2019-11-09 09:25:07', '2019-11-09 09:25:07'),
(250, 9, 7, 3, 10, 1, 0, '2019-11-09 09:25:07', '2019-11-09 09:25:07'),
(251, 10, 7, 3, 10, 1, 0, '2019-11-09 09:25:07', '2019-11-09 09:25:07'),
(252, 11, 7, 3, 10, 1, 0, '2019-11-09 09:25:07', '2019-11-09 09:25:07'),
(253, 3, 8, 3, 10, 1, 0, '2019-11-09 09:25:07', '2019-11-09 09:25:07'),
(254, 4, 8, 3, 10, 1, 0, '2019-11-09 09:25:07', '2019-11-09 09:25:07'),
(255, 5, 8, 3, 10, 1, 0, '2019-11-09 09:25:07', '2019-11-09 09:25:07'),
(256, 6, 8, 3, 10, 1, 0, '2019-11-09 09:25:07', '2019-11-09 09:25:07'),
(257, 2, 8, 3, 10, 1, 0, '2019-11-09 09:25:07', '2019-11-09 09:25:07'),
(258, 7, 8, 3, 10, 1, 0, '2019-11-09 09:25:07', '2019-11-09 09:25:07'),
(259, 8, 8, 3, 10, 1, 0, '2019-11-09 09:25:07', '2019-11-09 09:25:07'),
(260, 9, 8, 3, 10, 1, 0, '2019-11-09 09:25:07', '2019-11-09 09:25:07'),
(261, 10, 8, 3, 10, 1, 0, '2019-11-09 09:25:08', '2019-11-09 09:25:08'),
(262, 11, 8, 3, 10, 1, 0, '2019-11-09 09:25:08', '2019-11-09 09:25:08'),
(263, 3, 10, 3, 10, 1, 0, '2019-11-09 09:25:08', '2019-11-09 09:25:08'),
(264, 4, 10, 3, 10, 1, 0, '2019-11-09 09:25:08', '2019-11-09 09:25:08'),
(265, 5, 10, 3, 10, 1, 0, '2019-11-09 09:25:08', '2019-11-09 09:25:08'),
(266, 6, 10, 3, 10, 1, 0, '2019-11-09 09:25:08', '2019-11-09 09:25:08'),
(267, 2, 10, 3, 10, 1, 0, '2019-11-09 09:25:08', '2019-11-09 09:25:08'),
(268, 7, 10, 3, 10, 1, 0, '2019-11-09 09:25:08', '2019-11-09 09:25:08'),
(269, 8, 10, 3, 10, 1, 0, '2019-11-09 09:25:08', '2019-11-09 09:25:08'),
(270, 9, 10, 3, 10, 1, 0, '2019-11-09 09:25:08', '2019-11-09 09:25:08'),
(271, 10, 10, 3, 10, 1, 0, '2019-11-09 09:25:08', '2019-11-09 09:25:08'),
(272, 11, 10, 3, 10, 1, 0, '2019-11-09 09:25:08', '2019-11-09 09:25:08'),
(273, 3, 11, 3, 10, 1, 0, '2019-11-09 09:25:08', '2019-11-09 09:25:08'),
(274, 4, 11, 3, 10, 1, 0, '2019-11-09 09:25:08', '2019-11-09 09:25:08'),
(275, 5, 11, 3, 10, 1, 0, '2019-11-09 09:25:08', '2019-11-09 09:25:08'),
(276, 6, 11, 3, 10, 1, 0, '2019-11-09 09:25:08', '2019-11-09 09:25:08'),
(277, 2, 11, 3, 10, 1, 0, '2019-11-09 09:25:08', '2019-11-09 09:25:08'),
(278, 7, 11, 3, 10, 1, 0, '2019-11-09 09:25:08', '2019-11-09 09:25:08'),
(279, 8, 11, 3, 10, 1, 0, '2019-11-09 09:25:08', '2019-11-09 09:25:08'),
(280, 9, 11, 3, 10, 1, 0, '2019-11-09 09:25:08', '2019-11-09 09:25:08'),
(281, 10, 11, 3, 10, 1, 0, '2019-11-09 09:25:08', '2019-11-09 09:25:08'),
(282, 11, 11, 3, 10, 1, 0, '2019-11-09 09:25:08', '2019-11-09 09:25:08'),
(283, 3, 12, 3, 10, 1, 0, '2019-11-09 09:25:08', '2019-11-09 09:25:08'),
(284, 4, 12, 3, 10, 1, 0, '2019-11-09 09:25:08', '2019-11-09 09:25:08'),
(285, 5, 12, 3, 10, 1, 0, '2019-11-09 09:25:08', '2019-11-09 09:25:08'),
(286, 6, 12, 3, 10, 1, 0, '2019-11-09 09:25:08', '2019-11-09 09:25:08'),
(287, 2, 12, 3, 10, 1, 0, '2019-11-09 09:25:08', '2019-11-09 09:25:08'),
(288, 7, 12, 3, 10, 1, 0, '2019-11-09 09:25:08', '2019-11-09 09:25:08'),
(289, 8, 12, 3, 10, 1, 0, '2019-11-09 09:25:08', '2019-11-09 09:25:08'),
(290, 9, 12, 3, 10, 1, 0, '2019-11-09 09:25:08', '2019-11-09 09:25:08'),
(291, 10, 12, 3, 10, 1, 0, '2019-11-09 09:25:08', '2019-11-09 09:25:08'),
(292, 11, 12, 3, 10, 1, 0, '2019-11-09 09:25:08', '2019-11-09 09:25:08'),
(293, 3, 13, 3, 10, 1, 0, '2019-11-09 09:25:08', '2019-11-09 09:25:08'),
(294, 4, 13, 3, 10, 1, 0, '2019-11-09 09:25:08', '2019-11-09 09:25:08'),
(295, 5, 13, 3, 10, 1, 0, '2019-11-09 09:25:08', '2019-11-09 09:25:08'),
(296, 6, 13, 3, 10, 1, 0, '2019-11-09 09:25:08', '2019-11-09 09:25:08'),
(297, 2, 13, 3, 10, 1, 0, '2019-11-09 09:25:09', '2019-11-09 09:25:09'),
(298, 7, 13, 3, 10, 1, 0, '2019-11-09 09:25:09', '2019-11-09 09:25:09'),
(299, 8, 13, 3, 10, 1, 0, '2019-11-09 09:25:09', '2019-11-09 09:25:09'),
(300, 9, 13, 3, 10, 1, 0, '2019-11-09 09:25:09', '2019-11-09 09:25:09'),
(301, 10, 13, 3, 10, 1, 0, '2019-11-09 09:25:09', '2019-11-09 09:25:09'),
(302, 11, 13, 3, 10, 1, 0, '2019-11-09 09:25:09', '2019-11-09 09:25:09'),
(303, 3, 2, 3, 10, 1, 0, '2019-11-09 09:25:09', '2019-11-09 09:25:09'),
(304, 4, 2, 3, 10, 1, 0, '2019-11-09 09:25:09', '2019-11-09 09:25:09'),
(305, 5, 2, 3, 10, 1, 0, '2019-11-09 09:25:09', '2019-11-09 09:25:09'),
(306, 6, 2, 3, 10, 1, 0, '2019-11-09 09:25:09', '2019-11-09 09:25:09'),
(307, 2, 2, 3, 10, 1, 0, '2019-11-09 09:25:09', '2019-11-09 09:25:09'),
(308, 7, 2, 3, 10, 1, 0, '2019-11-09 09:25:09', '2019-11-09 09:25:09'),
(309, 8, 2, 3, 10, 1, 0, '2019-11-09 09:25:09', '2019-11-09 09:25:09'),
(310, 9, 2, 3, 10, 1, 0, '2019-11-09 09:25:09', '2019-11-09 09:25:09'),
(311, 10, 2, 3, 10, 1, 0, '2019-11-09 09:25:09', '2019-11-09 09:25:09'),
(312, 11, 2, 3, 10, 1, 0, '2019-11-09 09:25:09', '2019-11-09 09:25:09'),
(313, 3, 3, 3, 10, 1, 0, '2019-11-09 09:25:09', '2019-11-09 09:25:09'),
(314, 4, 3, 3, 10, 1, 0, '2019-11-09 09:25:09', '2019-11-09 09:25:09'),
(315, 5, 3, 3, 10, 1, 0, '2019-11-09 09:25:09', '2019-11-09 09:25:09'),
(316, 6, 3, 3, 10, 1, 0, '2019-11-09 09:25:09', '2019-11-09 09:25:09'),
(317, 2, 3, 3, 10, 1, 0, '2019-11-09 09:25:09', '2019-11-09 09:25:09'),
(318, 7, 3, 3, 10, 1, 0, '2019-11-09 09:25:09', '2019-11-09 09:25:09'),
(319, 8, 3, 3, 10, 1, 0, '2019-11-09 09:25:09', '2019-11-09 09:25:09'),
(320, 9, 3, 3, 10, 1, 0, '2019-11-09 09:25:09', '2019-11-09 09:25:09'),
(321, 10, 3, 3, 10, 1, 0, '2019-11-09 09:25:09', '2019-11-09 09:25:09'),
(322, 11, 3, 3, 10, 1, 0, '2019-11-09 09:25:09', '2019-11-09 09:25:09'),
(323, 3, 4, 3, 10, 1, 0, '2019-11-09 09:25:09', '2019-11-09 09:25:09'),
(324, 4, 4, 3, 10, 1, 0, '2019-11-09 09:25:09', '2019-11-09 09:25:09'),
(325, 5, 4, 3, 10, 1, 0, '2019-11-09 09:25:09', '2019-11-09 09:25:09'),
(326, 6, 4, 3, 10, 1, 0, '2019-11-09 09:25:09', '2019-11-09 09:25:09'),
(327, 2, 4, 3, 10, 1, 0, '2019-11-09 09:25:09', '2019-11-09 09:25:09'),
(328, 7, 4, 3, 10, 1, 0, '2019-11-09 09:25:09', '2019-11-09 09:25:09'),
(329, 8, 4, 3, 10, 1, 0, '2019-11-09 09:25:09', '2019-11-09 09:25:09'),
(330, 9, 4, 3, 10, 1, 0, '2019-11-09 09:25:09', '2019-11-09 09:25:09'),
(331, 10, 4, 3, 10, 1, 0, '2019-11-09 09:25:09', '2019-11-09 09:25:09'),
(332, 11, 4, 3, 10, 1, 0, '2019-11-09 09:25:09', '2019-11-09 09:25:09'),
(333, 3, 5, 3, 10, 1, 0, '2019-11-09 09:25:10', '2019-11-09 09:25:10'),
(334, 4, 5, 3, 10, 1, 0, '2019-11-09 09:25:10', '2019-11-09 09:25:10'),
(335, 5, 5, 3, 10, 1, 0, '2019-11-09 09:25:10', '2019-11-09 09:25:10'),
(336, 6, 5, 3, 10, 1, 0, '2019-11-09 09:25:10', '2019-11-09 09:25:10'),
(337, 2, 5, 3, 10, 1, 0, '2019-11-09 09:25:10', '2019-11-09 09:25:10'),
(338, 7, 5, 3, 10, 1, 0, '2019-11-09 09:25:10', '2019-11-09 09:25:10'),
(339, 8, 5, 3, 10, 1, 0, '2019-11-09 09:25:10', '2019-11-09 09:25:10'),
(340, 9, 5, 3, 10, 1, 0, '2019-11-09 09:25:10', '2019-11-09 09:25:10'),
(341, 10, 5, 3, 10, 1, 0, '2019-11-09 09:25:10', '2019-11-09 09:25:10'),
(342, 11, 5, 3, 10, 1, 0, '2019-11-09 09:25:10', '2019-11-09 09:25:10'),
(343, 3, 9, 3, 10, 1, 0, '2019-11-09 09:25:10', '2019-11-09 09:25:10'),
(344, 4, 9, 3, 10, 1, 0, '2019-11-09 09:25:10', '2019-11-09 09:25:10'),
(345, 5, 9, 3, 10, 1, 0, '2019-11-09 09:25:10', '2019-11-09 09:25:10'),
(346, 6, 9, 3, 10, 1, 0, '2019-11-09 09:25:10', '2019-11-09 09:25:10'),
(347, 2, 9, 3, 10, 1, 0, '2019-11-09 09:25:10', '2019-11-09 09:25:10'),
(348, 7, 9, 3, 10, 1, 0, '2019-11-09 09:25:10', '2019-11-09 09:25:10'),
(349, 8, 9, 3, 10, 1, 0, '2019-11-09 09:25:10', '2019-11-09 09:25:10'),
(350, 9, 9, 3, 10, 1, 0, '2019-11-09 09:25:10', '2019-11-09 09:25:10'),
(351, 10, 9, 3, 10, 1, 0, '2019-11-09 09:25:10', '2019-11-09 09:25:10'),
(352, 11, 9, 3, 10, 1, 0, '2019-11-09 09:25:10', '2019-11-09 09:25:10'),
(353, 3, 9, 3, 10, 1, 0, '2019-11-09 09:25:10', '2019-11-09 09:25:10'),
(354, 4, 9, 3, 10, 1, 0, '2019-11-09 09:25:10', '2019-11-09 09:25:10'),
(355, 5, 9, 3, 10, 1, 0, '2019-11-09 09:25:10', '2019-11-09 09:25:10'),
(356, 6, 9, 3, 10, 1, 0, '2019-11-09 09:25:10', '2019-11-09 09:25:10'),
(357, 2, 9, 3, 10, 1, 0, '2019-11-09 09:25:10', '2019-11-09 09:25:10'),
(358, 7, 9, 3, 10, 1, 0, '2019-11-09 09:25:10', '2019-11-09 09:25:10'),
(359, 8, 9, 3, 10, 1, 0, '2019-11-09 09:25:10', '2019-11-09 09:25:10'),
(360, 9, 9, 3, 10, 1, 0, '2019-11-09 09:25:10', '2019-11-09 09:25:10'),
(361, 10, 9, 3, 10, 1, 0, '2019-11-09 09:25:10', '2019-11-09 09:25:10'),
(362, 11, 9, 3, 10, 1, 0, '2019-11-09 09:25:10', '2019-11-09 09:25:10'),
(363, 3, 9, 3, 10, 1, 0, '2019-11-09 09:25:11', '2019-11-09 09:25:11'),
(364, 4, 9, 3, 10, 1, 0, '2019-11-09 09:25:11', '2019-11-09 09:25:11'),
(365, 5, 9, 3, 10, 1, 0, '2019-11-09 09:25:11', '2019-11-09 09:25:11'),
(366, 6, 9, 3, 10, 1, 0, '2019-11-09 09:25:11', '2019-11-09 09:25:11'),
(367, 2, 9, 3, 10, 1, 0, '2019-11-09 09:25:11', '2019-11-09 09:25:11'),
(368, 7, 9, 3, 10, 1, 0, '2019-11-09 09:25:11', '2019-11-09 09:25:11'),
(369, 8, 9, 3, 10, 1, 0, '2019-11-09 09:25:11', '2019-11-09 09:25:11'),
(370, 9, 9, 3, 10, 1, 0, '2019-11-09 09:25:11', '2019-11-09 09:25:11'),
(371, 10, 9, 3, 10, 1, 0, '2019-11-09 09:25:11', '2019-11-09 09:25:11'),
(372, 11, 9, 3, 10, 1, 0, '2019-11-09 09:25:11', '2019-11-09 09:25:11'),
(373, 3, 9, 3, 10, 1, 0, '2019-11-09 09:25:11', '2019-11-09 09:25:11'),
(374, 4, 9, 3, 10, 1, 0, '2019-11-09 09:25:11', '2019-11-09 09:25:11'),
(375, 5, 9, 3, 10, 1, 0, '2019-11-09 09:25:11', '2019-11-09 09:25:11'),
(376, 6, 9, 3, 10, 1, 0, '2019-11-09 09:25:11', '2019-11-09 09:25:11'),
(377, 2, 9, 3, 10, 1, 0, '2019-11-09 09:25:11', '2019-11-09 09:25:11'),
(378, 7, 9, 3, 10, 1, 0, '2019-11-09 09:25:11', '2019-11-09 09:25:11'),
(379, 8, 9, 3, 10, 1, 0, '2019-11-09 09:25:11', '2019-11-09 09:25:11'),
(380, 9, 9, 3, 10, 1, 0, '2019-11-09 09:25:11', '2019-11-09 09:25:11'),
(381, 10, 9, 3, 10, 1, 0, '2019-11-09 09:25:11', '2019-11-09 09:25:11'),
(382, 11, 9, 3, 10, 1, 0, '2019-11-09 09:25:11', '2019-11-09 09:25:11'),
(383, 3, 6, 3, 10, 1, 0, '2019-11-09 09:25:11', '2019-11-09 09:25:11'),
(384, 4, 6, 3, 10, 1, 0, '2019-11-09 09:25:11', '2019-11-09 09:25:11'),
(385, 5, 6, 3, 10, 1, 0, '2019-11-09 09:25:11', '2019-11-09 09:25:11'),
(386, 6, 6, 3, 10, 1, 0, '2019-11-09 09:25:11', '2019-11-09 09:25:11'),
(387, 2, 6, 3, 10, 1, 0, '2019-11-09 09:25:11', '2019-11-09 09:25:11'),
(388, 7, 6, 3, 10, 1, 0, '2019-11-09 09:25:11', '2019-11-09 09:25:11'),
(389, 8, 6, 3, 10, 1, 0, '2019-11-09 09:25:11', '2019-11-09 09:25:11'),
(390, 9, 6, 3, 10, 1, 0, '2019-11-09 09:25:11', '2019-11-09 09:25:11'),
(391, 10, 6, 3, 10, 1, 0, '2019-11-09 09:25:11', '2019-11-09 09:25:11'),
(392, 11, 6, 3, 10, 1, 0, '2019-11-09 09:25:11', '2019-11-09 09:25:11'),
(393, 3, 7, 3, 10, 1, 0, '2019-11-09 09:25:11', '2019-11-09 09:25:11'),
(394, 4, 7, 3, 10, 1, 0, '2019-11-09 09:25:12', '2019-11-09 09:25:12'),
(395, 5, 7, 3, 10, 1, 0, '2019-11-09 09:25:12', '2019-11-09 09:25:12'),
(396, 6, 7, 3, 10, 1, 0, '2019-11-09 09:25:12', '2019-11-09 09:25:12'),
(397, 2, 7, 3, 10, 1, 0, '2019-11-09 09:25:12', '2019-11-09 09:25:12'),
(398, 7, 7, 3, 10, 1, 0, '2019-11-09 09:25:12', '2019-11-09 09:25:12'),
(399, 8, 7, 3, 10, 1, 0, '2019-11-09 09:25:12', '2019-11-09 09:25:12'),
(400, 9, 7, 3, 10, 1, 0, '2019-11-09 09:25:12', '2019-11-09 09:25:12'),
(401, 10, 7, 3, 10, 1, 0, '2019-11-09 09:25:12', '2019-11-09 09:25:12'),
(402, 11, 7, 3, 10, 1, 0, '2019-11-09 09:25:12', '2019-11-09 09:25:12'),
(403, 3, 8, 3, 10, 1, 0, '2019-11-09 09:25:12', '2019-11-09 09:25:12'),
(404, 4, 8, 3, 10, 1, 0, '2019-11-09 09:25:12', '2019-11-09 09:25:12'),
(405, 5, 8, 3, 10, 1, 0, '2019-11-09 09:25:12', '2019-11-09 09:25:12'),
(406, 6, 8, 3, 10, 1, 0, '2019-11-09 09:25:12', '2019-11-09 09:25:12'),
(407, 2, 8, 3, 10, 1, 0, '2019-11-09 09:25:12', '2019-11-09 09:25:12'),
(408, 7, 8, 3, 10, 1, 0, '2019-11-09 09:25:12', '2019-11-09 09:25:12'),
(409, 8, 8, 3, 10, 1, 0, '2019-11-09 09:25:12', '2019-11-09 09:25:12'),
(410, 9, 8, 3, 10, 1, 0, '2019-11-09 09:25:12', '2019-11-09 09:25:12'),
(411, 10, 8, 3, 10, 1, 0, '2019-11-09 09:25:12', '2019-11-09 09:25:12'),
(412, 11, 8, 3, 10, 1, 0, '2019-11-09 09:25:12', '2019-11-09 09:25:12'),
(413, 3, 10, 3, 10, 1, 0, '2019-11-09 09:25:12', '2019-11-09 09:25:12'),
(414, 4, 10, 3, 10, 1, 0, '2019-11-09 09:25:12', '2019-11-09 09:25:12'),
(415, 5, 10, 3, 10, 1, 0, '2019-11-09 09:25:12', '2019-11-09 09:25:12'),
(416, 6, 10, 3, 10, 1, 0, '2019-11-09 09:25:12', '2019-11-09 09:25:12'),
(417, 2, 10, 3, 10, 1, 0, '2019-11-09 09:25:12', '2019-11-09 09:25:12'),
(418, 7, 10, 3, 10, 1, 0, '2019-11-09 09:25:12', '2019-11-09 09:25:12'),
(419, 8, 10, 3, 10, 1, 0, '2019-11-09 09:25:12', '2019-11-09 09:25:12'),
(420, 9, 10, 3, 10, 1, 0, '2019-11-09 09:25:12', '2019-11-09 09:25:12'),
(421, 10, 10, 3, 10, 1, 0, '2019-11-09 09:25:12', '2019-11-09 09:25:12'),
(422, 11, 10, 3, 10, 1, 0, '2019-11-09 09:25:12', '2019-11-09 09:25:12'),
(423, 3, 11, 3, 10, 1, 0, '2019-11-09 09:25:12', '2019-11-09 09:25:12'),
(424, 4, 11, 3, 10, 1, 0, '2019-11-09 09:25:12', '2019-11-09 09:25:12'),
(425, 5, 11, 3, 10, 1, 0, '2019-11-09 09:25:12', '2019-11-09 09:25:12'),
(426, 6, 11, 3, 10, 1, 0, '2019-11-09 09:25:12', '2019-11-09 09:25:12'),
(427, 2, 11, 3, 10, 1, 0, '2019-11-09 09:25:12', '2019-11-09 09:25:12'),
(428, 7, 11, 3, 10, 1, 0, '2019-11-09 09:25:12', '2019-11-09 09:25:12'),
(429, 8, 11, 3, 10, 1, 0, '2019-11-09 09:25:12', '2019-11-09 09:25:12'),
(430, 9, 11, 3, 10, 1, 0, '2019-11-09 09:25:12', '2019-11-09 09:25:12'),
(431, 10, 11, 3, 10, 1, 0, '2019-11-09 09:25:12', '2019-11-09 09:25:12'),
(432, 11, 11, 3, 10, 1, 0, '2019-11-09 09:25:12', '2019-11-09 09:25:12'),
(433, 3, 12, 3, 10, 1, 0, '2019-11-09 09:25:12', '2019-11-09 09:25:12'),
(434, 4, 12, 3, 10, 1, 0, '2019-11-09 09:25:12', '2019-11-09 09:25:12'),
(435, 5, 12, 3, 10, 1, 0, '2019-11-09 09:25:12', '2019-11-09 09:25:12'),
(436, 6, 12, 3, 10, 1, 0, '2019-11-09 09:25:13', '2019-11-09 09:25:13'),
(437, 2, 12, 3, 10, 1, 0, '2019-11-09 09:25:13', '2019-11-09 09:25:13'),
(438, 7, 12, 3, 10, 1, 0, '2019-11-09 09:25:13', '2019-11-09 09:25:13'),
(439, 8, 12, 3, 10, 1, 0, '2019-11-09 09:25:13', '2019-11-09 09:25:13'),
(440, 9, 12, 3, 10, 1, 0, '2019-11-09 09:25:13', '2019-11-09 09:25:13'),
(441, 10, 12, 3, 10, 1, 0, '2019-11-09 09:25:13', '2019-11-09 09:25:13'),
(442, 11, 12, 3, 10, 1, 0, '2019-11-09 09:25:13', '2019-11-09 09:25:13'),
(443, 3, 13, 3, 10, 1, 0, '2019-11-09 09:25:13', '2019-11-09 09:25:13'),
(444, 4, 13, 3, 10, 1, 0, '2019-11-09 09:25:13', '2019-11-09 09:25:13'),
(445, 5, 13, 3, 10, 1, 0, '2019-11-09 09:25:13', '2019-11-09 09:25:13'),
(446, 6, 13, 3, 10, 1, 0, '2019-11-09 09:25:13', '2019-11-09 09:25:13'),
(447, 2, 13, 3, 10, 1, 0, '2019-11-09 09:25:13', '2019-11-09 09:25:13'),
(448, 7, 13, 3, 10, 1, 0, '2019-11-09 09:25:13', '2019-11-09 09:25:13'),
(449, 8, 13, 3, 10, 1, 0, '2019-11-09 09:25:13', '2019-11-09 09:25:13'),
(450, 9, 13, 3, 10, 1, 0, '2019-11-09 09:25:13', '2019-11-09 09:25:13'),
(451, 10, 13, 3, 10, 1, 0, '2019-11-09 09:25:13', '2019-11-09 09:25:13'),
(452, 11, 13, 3, 10, 1, 0, '2019-11-09 09:25:13', '2019-11-09 09:25:13'),
(453, 3, 2, 4, 10, 1, 0, '2019-11-09 09:25:13', '2019-11-09 09:25:13'),
(454, 4, 2, 4, 10, 1, 0, '2019-11-09 09:25:13', '2019-11-09 09:25:13'),
(455, 5, 2, 4, 10, 1, 0, '2019-11-09 09:25:13', '2019-11-09 09:25:13'),
(456, 6, 2, 4, 10, 1, 0, '2019-11-09 09:25:13', '2019-11-09 09:25:13'),
(457, 2, 2, 4, 10, 1, 0, '2019-11-09 09:25:13', '2019-11-09 09:25:13'),
(458, 7, 2, 4, 10, 1, 0, '2019-11-09 09:25:13', '2019-11-09 09:25:13'),
(459, 8, 2, 4, 10, 1, 0, '2019-11-09 09:25:13', '2019-11-09 09:25:13'),
(460, 9, 2, 4, 10, 1, 0, '2019-11-09 09:25:13', '2019-11-09 09:25:13'),
(461, 10, 2, 4, 10, 1, 0, '2019-11-09 09:25:13', '2019-11-09 09:25:13'),
(462, 11, 2, 4, 10, 1, 0, '2019-11-09 09:25:13', '2019-11-09 09:25:13'),
(463, 3, 3, 4, 10, 1, 0, '2019-11-09 09:25:13', '2019-11-09 09:25:13'),
(464, 4, 3, 4, 10, 1, 0, '2019-11-09 09:25:13', '2019-11-09 09:25:13'),
(465, 5, 3, 4, 10, 1, 0, '2019-11-09 09:25:13', '2019-11-09 09:25:13'),
(466, 6, 3, 4, 10, 1, 0, '2019-11-09 09:25:13', '2019-11-09 09:25:13'),
(467, 2, 3, 4, 10, 1, 0, '2019-11-09 09:25:13', '2019-11-09 09:25:13'),
(468, 7, 3, 4, 10, 1, 0, '2019-11-09 09:25:13', '2019-11-09 09:25:13'),
(469, 8, 3, 4, 10, 1, 0, '2019-11-09 09:25:13', '2019-11-09 09:25:13'),
(470, 9, 3, 4, 10, 1, 0, '2019-11-09 09:25:13', '2019-11-09 09:25:13'),
(471, 10, 3, 4, 10, 1, 0, '2019-11-09 09:25:13', '2019-11-09 09:25:13'),
(472, 11, 3, 4, 10, 1, 0, '2019-11-09 09:25:13', '2019-11-09 09:25:13'),
(473, 3, 4, 4, 10, 1, 0, '2019-11-09 09:25:13', '2019-11-09 09:25:13'),
(474, 4, 4, 4, 10, 1, 0, '2019-11-09 09:25:13', '2019-11-09 09:25:13'),
(475, 5, 4, 4, 10, 1, 0, '2019-11-09 09:25:13', '2019-11-09 09:25:13'),
(476, 6, 4, 4, 10, 1, 0, '2019-11-09 09:25:14', '2019-11-09 09:25:14'),
(477, 2, 4, 4, 10, 1, 0, '2019-11-09 09:25:14', '2019-11-09 09:25:14'),
(478, 7, 4, 4, 10, 1, 0, '2019-11-09 09:25:14', '2019-11-09 09:25:14'),
(479, 8, 4, 4, 10, 1, 0, '2019-11-09 09:25:14', '2019-11-09 09:25:14'),
(480, 9, 4, 4, 10, 1, 0, '2019-11-09 09:25:14', '2019-11-09 09:25:14'),
(481, 10, 4, 4, 10, 1, 0, '2019-11-09 09:25:14', '2019-11-09 09:25:14'),
(482, 11, 4, 4, 10, 1, 0, '2019-11-09 09:25:14', '2019-11-09 09:25:14'),
(483, 3, 5, 4, 10, 1, 0, '2019-11-09 09:25:14', '2019-11-09 09:25:14'),
(484, 4, 5, 4, 10, 1, 0, '2019-11-09 09:25:14', '2019-11-09 09:25:14'),
(485, 5, 5, 4, 10, 1, 0, '2019-11-09 09:25:14', '2019-11-09 09:25:14'),
(486, 6, 5, 4, 10, 1, 0, '2019-11-09 09:25:14', '2019-11-09 09:25:14'),
(487, 2, 5, 4, 10, 1, 0, '2019-11-09 09:25:14', '2019-11-09 09:25:14'),
(488, 7, 5, 4, 10, 1, 0, '2019-11-09 09:25:14', '2019-11-09 09:25:14'),
(489, 8, 5, 4, 10, 1, 0, '2019-11-09 09:25:14', '2019-11-09 09:25:14'),
(490, 9, 5, 4, 10, 1, 0, '2019-11-09 09:25:14', '2019-11-09 09:25:14'),
(491, 10, 5, 4, 10, 1, 0, '2019-11-09 09:25:14', '2019-11-09 09:25:14'),
(492, 11, 5, 4, 10, 1, 0, '2019-11-09 09:25:14', '2019-11-09 09:25:14'),
(493, 3, 9, 4, 10, 1, 0, '2019-11-09 09:25:14', '2019-11-09 09:25:14'),
(494, 4, 9, 4, 10, 1, 0, '2019-11-09 09:25:14', '2019-11-09 09:25:14'),
(495, 5, 9, 4, 10, 1, 0, '2019-11-09 09:25:14', '2019-11-09 09:25:14'),
(496, 6, 9, 4, 10, 1, 0, '2019-11-09 09:25:14', '2019-11-09 09:25:14'),
(497, 2, 9, 4, 10, 1, 0, '2019-11-09 09:25:14', '2019-11-09 09:25:14'),
(498, 7, 9, 4, 10, 1, 0, '2019-11-09 09:25:14', '2019-11-09 09:25:14'),
(499, 8, 9, 4, 10, 1, 0, '2019-11-09 09:25:14', '2019-11-09 09:25:14'),
(500, 9, 9, 4, 10, 1, 0, '2019-11-09 09:25:14', '2019-11-09 09:25:14'),
(501, 10, 9, 4, 10, 1, 0, '2019-11-09 09:25:14', '2019-11-09 09:25:14'),
(502, 11, 9, 4, 10, 1, 0, '2019-11-09 09:25:14', '2019-11-09 09:25:14'),
(503, 3, 9, 4, 10, 1, 0, '2019-11-09 09:25:14', '2019-11-09 09:25:14'),
(504, 4, 9, 4, 10, 1, 0, '2019-11-09 09:25:14', '2019-11-09 09:25:14'),
(505, 5, 9, 4, 10, 1, 0, '2019-11-09 09:25:14', '2019-11-09 09:25:14'),
(506, 6, 9, 4, 10, 1, 0, '2019-11-09 09:25:14', '2019-11-09 09:25:14'),
(507, 2, 9, 4, 10, 1, 0, '2019-11-09 09:25:14', '2019-11-09 09:25:14'),
(508, 7, 9, 4, 10, 1, 0, '2019-11-09 09:25:14', '2019-11-09 09:25:14'),
(509, 8, 9, 4, 10, 1, 0, '2019-11-09 09:25:14', '2019-11-09 09:25:14'),
(510, 9, 9, 4, 10, 1, 0, '2019-11-09 09:25:14', '2019-11-09 09:25:14'),
(511, 10, 9, 4, 10, 1, 0, '2019-11-09 09:25:14', '2019-11-09 09:25:14'),
(512, 11, 9, 4, 10, 1, 0, '2019-11-09 09:25:14', '2019-11-09 09:25:14'),
(513, 3, 9, 4, 10, 1, 0, '2019-11-09 09:25:14', '2019-11-09 09:25:14'),
(514, 4, 9, 4, 10, 1, 0, '2019-11-09 09:25:14', '2019-11-09 09:25:14'),
(515, 5, 9, 4, 10, 1, 0, '2019-11-09 09:25:14', '2019-11-09 09:25:14'),
(516, 6, 9, 4, 10, 1, 0, '2019-11-09 09:25:14', '2019-11-09 09:25:14'),
(517, 2, 9, 4, 10, 1, 0, '2019-11-09 09:25:14', '2019-11-09 09:25:14'),
(518, 7, 9, 4, 10, 1, 0, '2019-11-09 09:25:15', '2019-11-09 09:25:15'),
(519, 8, 9, 4, 10, 1, 0, '2019-11-09 09:25:15', '2019-11-09 09:25:15'),
(520, 9, 9, 4, 10, 1, 0, '2019-11-09 09:25:15', '2019-11-09 09:25:15'),
(521, 10, 9, 4, 10, 1, 0, '2019-11-09 09:25:15', '2019-11-09 09:25:15'),
(522, 11, 9, 4, 10, 1, 0, '2019-11-09 09:25:15', '2019-11-09 09:25:15'),
(523, 3, 9, 4, 10, 1, 0, '2019-11-09 09:25:15', '2019-11-09 09:25:15'),
(524, 4, 9, 4, 10, 1, 0, '2019-11-09 09:25:15', '2019-11-09 09:25:15'),
(525, 5, 9, 4, 10, 1, 0, '2019-11-09 09:25:15', '2019-11-09 09:25:15'),
(526, 6, 9, 4, 10, 1, 0, '2019-11-09 09:25:15', '2019-11-09 09:25:15'),
(527, 2, 9, 4, 10, 1, 0, '2019-11-09 09:25:15', '2019-11-09 09:25:15'),
(528, 7, 9, 4, 10, 1, 0, '2019-11-09 09:25:15', '2019-11-09 09:25:15'),
(529, 8, 9, 4, 10, 1, 0, '2019-11-09 09:25:15', '2019-11-09 09:25:15'),
(530, 9, 9, 4, 10, 1, 0, '2019-11-09 09:25:15', '2019-11-09 09:25:15'),
(531, 10, 9, 4, 10, 1, 0, '2019-11-09 09:25:15', '2019-11-09 09:25:15'),
(532, 11, 9, 4, 10, 1, 0, '2019-11-09 09:25:15', '2019-11-09 09:25:15'),
(533, 3, 6, 4, 10, 1, 0, '2019-11-09 09:25:15', '2019-11-09 09:25:15'),
(534, 4, 6, 4, 10, 1, 0, '2019-11-09 09:25:15', '2019-11-09 09:25:15'),
(535, 5, 6, 4, 10, 1, 0, '2019-11-09 09:25:15', '2019-11-09 09:25:15'),
(536, 6, 6, 4, 10, 1, 0, '2019-11-09 09:25:15', '2019-11-09 09:25:15'),
(537, 2, 6, 4, 10, 1, 0, '2019-11-09 09:25:15', '2019-11-09 09:25:15'),
(538, 7, 6, 4, 10, 1, 0, '2019-11-09 09:25:15', '2019-11-09 09:25:15'),
(539, 8, 6, 4, 10, 1, 0, '2019-11-09 09:25:15', '2019-11-09 09:25:15'),
(540, 9, 6, 4, 10, 1, 0, '2019-11-09 09:25:15', '2019-11-09 09:25:15'),
(541, 10, 6, 4, 10, 1, 0, '2019-11-09 09:25:15', '2019-11-09 09:25:15'),
(542, 11, 6, 4, 10, 1, 0, '2019-11-09 09:25:15', '2019-11-09 09:25:15'),
(543, 3, 7, 4, 10, 1, 0, '2019-11-09 09:25:15', '2019-11-09 09:25:15'),
(544, 4, 7, 4, 10, 1, 0, '2019-11-09 09:25:15', '2019-11-09 09:25:15'),
(545, 5, 7, 4, 10, 1, 0, '2019-11-09 09:25:15', '2019-11-09 09:25:15'),
(546, 6, 7, 4, 10, 1, 0, '2019-11-09 09:25:15', '2019-11-09 09:25:15'),
(547, 2, 7, 4, 10, 1, 0, '2019-11-09 09:25:15', '2019-11-09 09:25:15'),
(548, 7, 7, 4, 10, 1, 0, '2019-11-09 09:25:15', '2019-11-09 09:25:15'),
(549, 8, 7, 4, 10, 1, 0, '2019-11-09 09:25:15', '2019-11-09 09:25:15'),
(550, 9, 7, 4, 10, 1, 0, '2019-11-09 09:25:15', '2019-11-09 09:25:15'),
(551, 10, 7, 4, 10, 1, 0, '2019-11-09 09:25:15', '2019-11-09 09:25:15'),
(552, 11, 7, 4, 10, 1, 0, '2019-11-09 09:25:15', '2019-11-09 09:25:15'),
(553, 3, 8, 4, 10, 1, 0, '2019-11-09 09:25:15', '2019-11-09 09:25:15'),
(554, 4, 8, 4, 10, 1, 0, '2019-11-09 09:25:15', '2019-11-09 09:25:15'),
(555, 5, 8, 4, 10, 1, 0, '2019-11-09 09:25:16', '2019-11-09 09:25:16'),
(556, 6, 8, 4, 10, 1, 0, '2019-11-09 09:25:16', '2019-11-09 09:25:16'),
(557, 2, 8, 4, 10, 1, 0, '2019-11-09 09:25:16', '2019-11-09 09:25:16'),
(558, 7, 8, 4, 10, 1, 0, '2019-11-09 09:25:16', '2019-11-09 09:25:16'),
(559, 8, 8, 4, 10, 1, 0, '2019-11-09 09:25:16', '2019-11-09 09:25:16'),
(560, 9, 8, 4, 10, 1, 0, '2019-11-09 09:25:16', '2019-11-09 09:25:16'),
(561, 10, 8, 4, 10, 1, 0, '2019-11-09 09:25:16', '2019-11-09 09:25:16'),
(562, 11, 8, 4, 10, 1, 0, '2019-11-09 09:25:16', '2019-11-09 09:25:16'),
(563, 3, 10, 4, 10, 1, 0, '2019-11-09 09:25:16', '2019-11-09 09:25:16'),
(564, 4, 10, 4, 10, 1, 0, '2019-11-09 09:25:16', '2019-11-09 09:25:16'),
(565, 5, 10, 4, 10, 1, 0, '2019-11-09 09:25:16', '2019-11-09 09:25:16'),
(566, 6, 10, 4, 10, 1, 0, '2019-11-09 09:25:16', '2019-11-09 09:25:16'),
(567, 2, 10, 4, 10, 1, 0, '2019-11-09 09:25:16', '2019-11-09 09:25:16'),
(568, 7, 10, 4, 10, 1, 0, '2019-11-09 09:25:16', '2019-11-09 09:25:16'),
(569, 8, 10, 4, 10, 1, 0, '2019-11-09 09:25:16', '2019-11-09 09:25:16'),
(570, 9, 10, 4, 10, 1, 0, '2019-11-09 09:25:16', '2019-11-09 09:25:16'),
(571, 10, 10, 4, 10, 1, 0, '2019-11-09 09:25:16', '2019-11-09 09:25:16'),
(572, 11, 10, 4, 10, 1, 0, '2019-11-09 09:25:16', '2019-11-09 09:25:16'),
(573, 3, 11, 4, 10, 1, 0, '2019-11-09 09:25:16', '2019-11-09 09:25:16'),
(574, 4, 11, 4, 10, 1, 0, '2019-11-09 09:25:16', '2019-11-09 09:25:16'),
(575, 5, 11, 4, 10, 1, 0, '2019-11-09 09:25:16', '2019-11-09 09:25:16'),
(576, 6, 11, 4, 10, 1, 0, '2019-11-09 09:25:16', '2019-11-09 09:25:16'),
(577, 2, 11, 4, 10, 1, 0, '2019-11-09 09:25:16', '2019-11-09 09:25:16'),
(578, 7, 11, 4, 10, 1, 0, '2019-11-09 09:25:16', '2019-11-09 09:25:16'),
(579, 8, 11, 4, 10, 1, 0, '2019-11-09 09:25:16', '2019-11-09 09:25:16'),
(580, 9, 11, 4, 10, 1, 0, '2019-11-09 09:25:16', '2019-11-09 09:25:16'),
(581, 10, 11, 4, 10, 1, 0, '2019-11-09 09:25:16', '2019-11-09 09:25:16'),
(582, 11, 11, 4, 10, 1, 0, '2019-11-09 09:25:16', '2019-11-09 09:25:16'),
(583, 3, 12, 4, 10, 1, 0, '2019-11-09 09:25:16', '2019-11-09 09:25:16'),
(584, 4, 12, 4, 10, 1, 0, '2019-11-09 09:25:16', '2019-11-09 09:25:16'),
(585, 5, 12, 4, 10, 1, 0, '2019-11-09 09:25:16', '2019-11-09 09:25:16'),
(586, 6, 12, 4, 10, 1, 0, '2019-11-09 09:25:16', '2019-11-09 09:25:16'),
(587, 2, 12, 4, 10, 1, 0, '2019-11-09 09:25:16', '2019-11-09 09:25:16'),
(588, 7, 12, 4, 10, 1, 0, '2019-11-09 09:25:16', '2019-11-09 09:25:16'),
(589, 8, 12, 4, 10, 1, 0, '2019-11-09 09:25:16', '2019-11-09 09:25:16'),
(590, 9, 12, 4, 10, 1, 0, '2019-11-09 09:25:16', '2019-11-09 09:25:16'),
(591, 10, 12, 4, 10, 1, 0, '2019-11-09 09:25:16', '2019-11-09 09:25:16'),
(592, 11, 12, 4, 10, 1, 0, '2019-11-09 09:25:17', '2019-11-09 09:25:17'),
(593, 3, 13, 4, 10, 1, 0, '2019-11-09 09:25:17', '2019-11-09 09:25:17'),
(594, 4, 13, 4, 10, 1, 0, '2019-11-09 09:25:17', '2019-11-09 09:25:17'),
(595, 5, 13, 4, 10, 1, 0, '2019-11-09 09:25:17', '2019-11-09 09:25:17'),
(596, 6, 13, 4, 10, 1, 0, '2019-11-09 09:25:17', '2019-11-09 09:25:17'),
(597, 2, 13, 4, 10, 1, 0, '2019-11-09 09:25:17', '2019-11-09 09:25:17'),
(598, 7, 13, 4, 10, 1, 0, '2019-11-09 09:25:17', '2019-11-09 09:25:17'),
(599, 8, 13, 4, 10, 1, 0, '2019-11-09 09:25:17', '2019-11-09 09:25:17'),
(600, 9, 13, 4, 10, 1, 0, '2019-11-09 09:25:17', '2019-11-09 09:25:17'),
(601, 10, 13, 4, 10, 1, 0, '2019-11-09 09:25:17', '2019-11-09 09:25:17'),
(602, 11, 13, 4, 10, 1, 0, '2019-11-09 09:25:17', '2019-11-09 09:25:17');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Develper', 'Develper', 'Develper', NULL, '2019-11-05 22:04:04'),
(2, 'admin', 'admin', '<p>admin</p>', NULL, '2019-11-04 00:38:29'),
(7, 'Laser', 'Laser', 'Laser', '2019-11-05 22:42:45', '2019-11-05 23:41:09'),
(8, 'Receptionist', 'Receptionist', 'Receptionist', '2019-11-05 22:44:35', '2019-11-05 22:44:35'),
(9, 'Store', 'Store', 'Store', '2019-11-05 22:45:17', '2019-11-05 23:41:49'),
(10, 'Accounts', 'Accounts', 'Accounts', '2019-11-05 22:46:29', '2019-11-05 22:46:29'),
(11, 'IT', 'IT', 'IT', '2019-11-05 22:47:30', '2019-11-05 23:41:29');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 2, '2019-11-08 14:10:41', '2019-11-08 14:10:41'),
(1, 1, '2019-11-08 14:12:07', '2019-11-08 14:12:07'),
(2, 9, '2019-11-08 14:19:01', '2019-11-08 14:19:01');

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `name`, `order`, `created_at`, `updated_at`) VALUES
(1, 'defult', 0, '2019-11-03 22:46:12', '2019-11-03 22:46:12'),
(2, 'A4', 1, '2019-11-03 22:50:34', '2019-11-03 22:50:34'),
(3, 'A0', 0, '2019-11-05 22:25:33', '2019-11-05 22:25:33'),
(4, 'A1', 2, '2019-11-05 22:25:42', '2019-11-05 22:25:42'),
(5, 'A2', 1, '2019-11-05 22:25:51', '2019-11-05 22:25:51'),
(6, 'A3', 4, '2019-11-05 22:25:59', '2019-11-05 22:25:59'),
(7, 'm2', 5, '2019-11-05 22:26:19', '2019-11-05 22:26:37'),
(8, '50*70', 6, '2019-11-05 22:26:46', '2019-11-05 22:26:46'),
(9, '100*70', 8, '2019-11-05 22:27:02', '2019-11-05 22:27:02'),
(10, '140*90', 9, '2019-11-05 22:27:12', '2019-11-05 22:27:12'),
(11, '240*90', 44, '2019-11-05 22:27:22', '2019-11-05 22:27:22');

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `id` int(10) UNSIGNED NOT NULL,
  `size_id` int(10) UNSIGNED NOT NULL,
  `type_id` int(10) UNSIGNED NOT NULL,
  `roll_size` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `meter` int(11) NOT NULL,
  `width` int(11) NOT NULL,
  `price` float NOT NULL,
  `quantity_min` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`id`, `size_id`, `type_id`, `roll_size`, `quantity`, `meter`, `width`, `price`, `quantity_min`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 0, 0, 0, 0, 0, 0, '2019-11-03 23:09:47', '2019-11-03 23:09:47'),
(2, 2, 2, 0, 810, 0, 0, 3, 20, '2019-11-03 23:17:26', '2019-11-09 22:52:48'),
(3, 6, 2, 0, 10, 0, 0, 1, 1, '2019-11-05 23:36:51', '2019-11-08 23:14:29'),
(4, 6, 7, 0, 2, 0, 0, 2, 3, '2019-11-05 23:37:25', '2019-11-05 23:37:25');

-- --------------------------------------------------------

--
-- Table structure for table `store_transactions`
--

CREATE TABLE `store_transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `store_id` int(10) UNSIGNED NOT NULL,
  `kind` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity_after` int(11) NOT NULL,
  `quantity_before` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `store_transactions`
--

INSERT INTO `store_transactions` (`id`, `store_id`, `kind`, `price`, `quantity_after`, `quantity_before`, `created_at`, `updated_at`) VALUES
(7, 2, 1, 0, 860, 861, '2019-11-05 18:20:50', '2019-11-05 18:20:50'),
(8, 2, 1, 0, 858, 860, '2019-11-05 18:20:51', '2019-11-05 18:20:51'),
(9, 2, 1, 0, 853, 858, '2019-11-05 18:20:51', '2019-11-05 18:20:51'),
(10, 3, 1, 10, 12, 4, '2019-11-06 01:31:14', '2019-11-06 01:31:14'),
(11, 3, 1, 2, 20, 10, '2019-11-07 18:45:39', '2019-11-07 18:45:39'),
(12, 2, 1, 12, 849, 853, '2019-11-07 18:59:09', '2019-11-07 18:59:09'),
(13, 2, 1, 15, 844, 849, '2019-11-07 19:31:32', '2019-11-07 19:31:32'),
(14, 2, 1, 30, 834, 844, '2019-11-07 19:31:38', '2019-11-07 19:31:38'),
(15, 2, 1, 30, 824, 834, '2019-11-07 19:31:38', '2019-11-07 19:31:38'),
(16, 2, 1, 9, 821, 824, '2019-11-08 23:09:20', '2019-11-08 23:09:20'),
(17, 3, 1, 5, 15, 20, '2019-11-08 23:10:07', '2019-11-08 23:10:07'),
(18, 3, 1, 5, 10, 15, '2019-11-08 23:14:29', '2019-11-08 23:14:29'),
(19, 2, 1, 24, 813, 821, '2019-11-08 23:14:29', '2019-11-08 23:14:29'),
(20, 2, 1, 9, 810, 813, '2019-11-09 22:52:48', '2019-11-09 22:52:48');

-- --------------------------------------------------------

--
-- Table structure for table `templet_prices`
--

CREATE TABLE `templet_prices` (
  `id` int(10) UNSIGNED NOT NULL,
  `size` text NOT NULL,
  `type` text NOT NULL,
  `color` text NOT NULL,
  `machine` text NOT NULL,
  `quantity` text NOT NULL,
  `price` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `templet_prices`
--

INSERT INTO `templet_prices` (`id`, `size`, `type`, `color`, `machine`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(2, 'A0', 'Plain', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(3, 'A1', 'Plain', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(4, 'A2', 'Plain', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(5, 'A3', 'Plain', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(6, 'A4', 'Plain', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(7, 'm2', 'Plain', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(8, '50*70', 'Plain', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(9, '100*70', 'Plain', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(10, '140*90', 'Plain', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(11, '240*90', 'Plain', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(12, 'A0', 'Calc', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(13, 'A1', 'Calc', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(14, 'A2', 'Calc', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(15, 'A3', 'Calc', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(16, 'A4', 'Calc', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(17, 'm2', 'Calc', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(18, '50*70', 'Calc', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(19, '100*70', 'Calc', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(20, '140*90', 'Calc', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(21, '240*90', 'Calc', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(22, 'A0', 'HP', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(23, 'A1', 'HP', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(24, 'A2', 'HP', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(25, 'A3', 'HP', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(26, 'A4', 'HP', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(27, 'm2', 'HP', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(28, '50*70', 'HP', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(29, '100*70', 'HP', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(30, '140*90', 'HP', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(31, '240*90', 'HP', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(32, 'A0', 'HP8000', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(33, 'A1', 'HP8000', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(34, 'A2', 'HP8000', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(35, 'A3', 'HP8000', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(36, 'A4', 'HP8000', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(37, 'm2', 'HP8000', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(38, '50*70', 'HP8000', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(39, '100*70', 'HP8000', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(40, '140*90', 'HP8000', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(41, '240*90', 'HP8000', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(42, 'A0', 'Foam', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(43, 'A1', 'Foam', 'BW', 'HP 8000', '0.5', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(44, 'A2', 'Foam', 'BW', 'HP 8000', '0.25', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(45, 'A3', 'Foam', 'BW', 'HP 8000', '0.125', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(46, 'A4', 'Foam', 'BW', 'HP 8000', '0.0625', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(47, 'm2', 'Foam', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(48, '50*70', 'Foam', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(49, '100*70', 'Foam', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(50, '140*90', 'Foam', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(51, '240*90', 'Foam', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(52, 'A0', 'Foam', 'BW', 'HP 8000', '0', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(53, 'A1', 'Foam', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(54, 'A2', 'Foam', 'BW', 'HP 8000', '2', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(55, 'A3', 'Foam', 'BW', 'HP 8000', '5', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(56, 'A4', 'Foam', 'BW', 'HP 8000', '8', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(57, 'm2', 'Foam', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(58, '50*70', 'Foam', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(59, '100*70', 'Foam', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(60, '140*90', 'Foam', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(61, '240*90', 'Foam', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(62, 'A0', 'Foam', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(63, 'A1', 'Foam', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(64, 'A2', 'Foam', 'BW', 'HP 8000', '12', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(65, 'A3', 'Foam', 'BW', 'HP 8000', '24', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(66, 'A4', 'Foam', 'BW', 'HP 8000', '48', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(67, 'm2', 'Foam', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(68, '50*70', 'Foam', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(69, '100*70', 'Foam', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(70, '140*90', 'Foam', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(71, '240*90', 'Foam', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(72, 'A0', 'Foam', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(73, 'A1', 'Foam', 'BW', 'HP 8000', '2', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(74, 'A2', 'Foam', 'BW', 'HP 8000', '3', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(75, 'A3', 'Foam', 'BW', 'HP 8000', '4', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(76, 'A4', 'Foam', 'BW', 'HP 8000', '16', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(77, 'm2', 'Foam', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(78, '50*70', 'Foam', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(79, '100*70', 'Foam', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(80, '140*90', 'Foam', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(81, '240*90', 'Foam', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(82, 'A0', 'Plain8000', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(83, 'A1', 'Plain8000', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(84, 'A2', 'Plain8000', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(85, 'A3', 'Plain8000', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(86, 'A4', 'Plain8000', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(87, 'm2', 'Plain8000', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(88, '50*70', 'Plain8000', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(89, '100*70', 'Plain8000', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(90, '140*90', 'Plain8000', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(91, '240*90', 'Plain8000', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(92, 'A0', 'Canson', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(93, 'A1', 'Canson', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(94, 'A2', 'Canson', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(95, 'A3', 'Canson', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(96, 'A4', 'Canson', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(97, 'm2', 'Canson', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(98, '50*70', 'Canson', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(99, '100*70', 'Canson', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(100, '140*90', 'Canson', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(101, '240*90', 'Canson', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(102, 'A0', 'coshe', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(103, 'A1', 'coshe', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(104, 'A2', 'coshe', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(105, 'A3', 'coshe', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(106, 'A4', 'coshe', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(107, 'm2', 'coshe', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(108, '50*70', 'coshe', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(109, '100*70', 'coshe', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(110, '140*90', 'coshe', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(111, '240*90', 'coshe', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(112, 'A0', 'Copy', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(113, 'A1', 'Copy', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(114, 'A2', 'Copy', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(115, 'A3', 'Copy', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(116, 'A4', 'Copy', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(117, 'm2', 'Copy', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(118, '50*70', 'Copy', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(119, '100*70', 'Copy', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(120, '140*90', 'Copy', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(121, '240*90', 'Copy', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(122, 'A0', 'Scan', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(123, 'A1', 'Scan', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(124, 'A2', 'Scan', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(125, 'A3', 'Scan', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(126, 'A4', 'Scan', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(127, 'm2', 'Scan', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(128, '50*70', 'Scan', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(129, '100*70', 'Scan', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(130, '140*90', 'Scan', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(131, '240*90', 'Scan', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(132, 'A0', 'CoatedHP8000', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(133, 'A1', 'CoatedHP8000', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(134, 'A2', 'CoatedHP8000', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(135, 'A3', 'CoatedHP8000', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(136, 'A4', 'CoatedHP8000', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(137, 'm2', 'CoatedHP8000', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(138, '50*70', 'CoatedHP8000', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(139, '100*70', 'CoatedHP8000', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(140, '140*90', 'CoatedHP8000', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(141, '240*90', 'CoatedHP8000', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(142, 'A0', 'Transparent', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(143, 'A1', 'Transparent', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(144, 'A2', 'Transparent', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(145, 'A3', 'Transparent', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(146, 'A4', 'Transparent', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(147, 'm2', 'Transparent', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(148, '50*70', 'Transparent', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(149, '100*70', 'Transparent', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(150, '140*90', 'Transparent', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(151, '240*90', 'Transparent', 'BW', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(152, 'A0', 'Plain', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(153, 'A1', 'Plain', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(154, 'A2', 'Plain', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(155, 'A3', 'Plain', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(156, 'A4', 'Plain', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(157, 'm2', 'Plain', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(158, '50*70', 'Plain', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(159, '100*70', 'Plain', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(160, '140*90', 'Plain', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(161, '240*90', 'Plain', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(162, 'A0', 'Calc', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(163, 'A1', 'Calc', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(164, 'A2', 'Calc', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(165, 'A3', 'Calc', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(166, 'A4', 'Calc', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(167, 'm2', 'Calc', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(168, '50*70', 'Calc', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(169, '100*70', 'Calc', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(170, '140*90', 'Calc', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(171, '240*90', 'Calc', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(172, 'A0', 'HP', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(173, 'A1', 'HP', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(174, 'A2', 'HP', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(175, 'A3', 'HP', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(176, 'A4', 'HP', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(177, 'm2', 'HP', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(178, '50*70', 'HP', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(179, '100*70', 'HP', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(180, '140*90', 'HP', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(181, '240*90', 'HP', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(182, 'A0', 'HP8000', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(183, 'A1', 'HP8000', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(184, 'A2', 'HP8000', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(185, 'A3', 'HP8000', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(186, 'A4', 'HP8000', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(187, 'm2', 'HP8000', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(188, '50*70', 'HP8000', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(189, '100*70', 'HP8000', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(190, '140*90', 'HP8000', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(191, '240*90', 'HP8000', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(192, 'A0', 'Foam', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(193, 'A1', 'Foam', 'Colour', 'HP 8000', '0.5', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(194, 'A2', 'Foam', 'Colour', 'HP 8000', '0.25', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(195, 'A3', 'Foam', 'Colour', 'HP 8000', '0.125', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(196, 'A4', 'Foam', 'Colour', 'HP 8000', '0.0625', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(197, 'm2', 'Foam', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(198, '50*70', 'Foam', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(199, '100*70', 'Foam', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(200, '140*90', 'Foam', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(201, '240*90', 'Foam', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(202, 'A0', 'Foam', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(203, 'A1', 'Foam', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(204, 'A2', 'Foam', 'Colour', 'HP 8000', '2', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(205, 'A3', 'Foam', 'Colour', 'HP 8000', '5', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(206, 'A4', 'Foam', 'Colour', 'HP 8000', '8', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(207, 'm2', 'Foam', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(208, '50*70', 'Foam', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(209, '100*70', 'Foam', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(210, '140*90', 'Foam', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(211, '240*90', 'Foam', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(212, 'A0', 'Foam', 'Colour', 'HP 8000', '3', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(213, 'A1', 'Foam', 'Colour', 'HP 8000', '6', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(214, 'A2', 'Foam', 'Colour', 'HP 8000', '12', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(215, 'A3', 'Foam', 'Colour', 'HP 8000', '24', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(216, 'A4', 'Foam', 'Colour', 'HP 8000', '48', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(217, 'm2', 'Foam', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(218, '50*70', 'Foam', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(219, '100*70', 'Foam', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(220, '140*90', 'Foam', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(221, '240*90', 'Foam', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(222, 'A0', 'Foam', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(223, 'A1', 'Foam', 'Colour', 'HP 8000', '2', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(224, 'A2', 'Foam', 'Colour', 'HP 8000', '4', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(225, 'A3', 'Foam', 'Colour', 'HP 8000', '8', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(226, 'A4', 'Foam', 'Colour', 'HP 8000', '16', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(227, 'm2', 'Foam', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(228, '50*70', 'Foam', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(229, '100*70', 'Foam', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(230, '140*90', 'Foam', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(231, '240*90', 'Foam', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(232, 'A0', 'Plain8000', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(233, 'A1', 'Plain8000', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(234, 'A2', 'Plain8000', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(235, 'A3', 'Plain8000', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(236, 'A4', 'Plain8000', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(237, 'm2', 'Plain8000', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(238, '50*70', 'Plain8000', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(239, '100*70', 'Plain8000', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(240, '140*90', 'Plain8000', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(241, '240*90', 'Plain8000', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(242, 'A0', 'Canson', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(243, 'A1', 'Canson', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(244, 'A2', 'Canson', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(245, 'A3', 'Canson', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(246, 'A4', 'Canson', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(247, 'm2', 'Canson', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(248, '50*70', 'Canson', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(249, '100*70', 'Canson', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(250, '140*90', 'Canson', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(251, '240*90', 'Canson', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(252, 'A0', 'coshe', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(253, 'A1', 'coshe', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(254, 'A2', 'coshe', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(255, 'A3', 'coshe', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(256, 'A4', 'coshe', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(257, 'm2', 'coshe', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(258, '50*70', 'coshe', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(259, '100*70', 'coshe', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(260, '140*90', 'coshe', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(261, '240*90', 'coshe', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(262, 'A0', 'Copy', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(263, 'A1', 'Copy', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(264, 'A2', 'Copy', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(265, 'A3', 'Copy', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(266, 'A4', 'Copy', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(267, 'm2', 'Copy', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(268, '50*70', 'Copy', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(269, '100*70', 'Copy', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(270, '140*90', 'Copy', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(271, '240*90', 'Copy', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(272, 'A0', 'Scan', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(273, 'A1', 'Scan', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(274, 'A2', 'Scan', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(275, 'A3', 'Scan', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(276, 'A4', 'Scan', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(277, 'm2', 'Scan', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(278, '50*70', 'Scan', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(279, '100*70', 'Scan', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(280, '140*90', 'Scan', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(281, '240*90', 'Scan', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(282, 'A0', 'CoatedHP8000', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(283, 'A1', 'CoatedHP8000', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(284, 'A2', 'CoatedHP8000', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(285, 'A3', 'CoatedHP8000', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(286, 'A4', 'CoatedHP8000', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(287, 'm2', 'CoatedHP8000', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(288, '50*70', 'CoatedHP8000', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(289, '100*70', 'CoatedHP8000', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(290, '140*90', 'CoatedHP8000', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(291, '240*90', 'CoatedHP8000', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(292, 'A0', 'Transparent', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(293, 'A1', 'Transparent', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(294, 'A2', 'Transparent', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(295, 'A3', 'Transparent', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(296, 'A4', 'Transparent', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(297, 'm2', 'Transparent', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(298, '50*70', 'Transparent', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(299, '100*70', 'Transparent', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(300, '140*90', 'Transparent', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(301, '240*90', 'Transparent', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(302, 'A0', 'Plain', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(303, 'A1', 'Plain', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(304, 'A2', 'Plain', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(305, 'A3', 'Plain', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(306, 'A4', 'Plain', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(307, 'm2', 'Plain', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(308, '50*70', 'Plain', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(309, '100*70', 'Plain', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(310, '140*90', 'Plain', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(311, '240*90', 'Plain', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(312, 'A0', 'Calc', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(313, 'A1', 'Calc', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(314, 'A2', 'Calc', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(315, 'A3', 'Calc', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(316, 'A4', 'Calc', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(317, 'm2', 'Calc', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(318, '50*70', 'Calc', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(319, '100*70', 'Calc', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(320, '140*90', 'Calc', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(321, '240*90', 'Calc', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(322, 'A0', 'HP', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(323, 'A1', 'HP', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(324, 'A2', 'HP', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(325, 'A3', 'HP', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(326, 'A4', 'HP', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(327, 'm2', 'HP', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(328, '50*70', 'HP', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(329, '100*70', 'HP', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(330, '140*90', 'HP', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(331, '240*90', 'HP', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(332, 'A0', 'HP8000', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(333, 'A1', 'HP8000', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(334, 'A2', 'HP8000', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(335, 'A3', 'HP8000', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(336, 'A4', 'HP8000', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(337, 'm2', 'HP8000', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(338, '50*70', 'HP8000', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(339, '100*70', 'HP8000', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(340, '140*90', 'HP8000', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(341, '240*90', 'HP8000', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(342, 'A0', 'Foam', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(343, 'A1', 'Foam', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(344, 'A2', 'Foam', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(345, 'A3', 'Foam', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(346, 'A4', 'Foam', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(347, 'm2', 'Foam', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(348, '50*70', 'Foam', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(349, '100*70', 'Foam', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(350, '140*90', 'Foam', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(351, '240*90', 'Foam', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(352, 'A0', 'Foam', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(353, 'A1', 'Foam', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(354, 'A2', 'Foam', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(355, 'A3', 'Foam', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(356, 'A4', 'Foam', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(357, 'm2', 'Foam', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(358, '50*70', 'Foam', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(359, '100*70', 'Foam', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(360, '140*90', 'Foam', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(361, '240*90', 'Foam', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(362, 'A0', 'Foam', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(363, 'A1', 'Foam', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(364, 'A2', 'Foam', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(365, 'A3', 'Foam', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(366, 'A4', 'Foam', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(367, 'm2', 'Foam', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(368, '50*70', 'Foam', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(369, '100*70', 'Foam', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(370, '140*90', 'Foam', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(371, '240*90', 'Foam', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(372, 'A0', 'Foam', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(373, 'A1', 'Foam', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(374, 'A2', 'Foam', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(375, 'A3', 'Foam', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(376, 'A4', 'Foam', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(377, 'm2', 'Foam', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(378, '50*70', 'Foam', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(379, '100*70', 'Foam', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(380, '140*90', 'Foam', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(381, '240*90', 'Foam', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(382, 'A0', 'Plain8000', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(383, 'A1', 'Plain8000', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:51', '2019-11-09 09:21:51'),
(384, 'A2', 'Plain8000', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(385, 'A3', 'Plain8000', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(386, 'A4', 'Plain8000', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(387, 'm2', 'Plain8000', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(388, '50*70', 'Plain8000', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(389, '100*70', 'Plain8000', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(390, '140*90', 'Plain8000', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(391, '240*90', 'Plain8000', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(392, 'A0', 'Canson', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(393, 'A1', 'Canson', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(394, 'A2', 'Canson', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(395, 'A3', 'Canson', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(396, 'A4', 'Canson', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(397, 'm2', 'Canson', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(398, '50*70', 'Canson', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(399, '100*70', 'Canson', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(400, '140*90', 'Canson', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(401, '240*90', 'Canson', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(402, 'A0', 'coshe', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(403, 'A1', 'coshe', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(404, 'A2', 'coshe', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(405, 'A3', 'coshe', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(406, 'A4', 'coshe', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(407, 'm2', 'coshe', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(408, '50*70', 'coshe', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(409, '100*70', 'coshe', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(410, '140*90', 'coshe', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(411, '240*90', 'coshe', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(412, 'A0', 'Copy', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(413, 'A1', 'Copy', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(414, 'A2', 'Copy', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(415, 'A3', 'Copy', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(416, 'A4', 'Copy', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(417, 'm2', 'Copy', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(418, '50*70', 'Copy', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(419, '100*70', 'Copy', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(420, '140*90', 'Copy', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(421, '240*90', 'Copy', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(422, 'A0', 'Scan', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(423, 'A1', 'Scan', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(424, 'A2', 'Scan', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(425, 'A3', 'Scan', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(426, 'A4', 'Scan', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(427, 'm2', 'Scan', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(428, '50*70', 'Scan', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(429, '100*70', 'Scan', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(430, '140*90', 'Scan', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(431, '240*90', 'Scan', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(432, 'A0', 'CoatedHP8000', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(433, 'A1', 'CoatedHP8000', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(434, 'A2', 'CoatedHP8000', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(435, 'A3', 'CoatedHP8000', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(436, 'A4', 'CoatedHP8000', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(437, 'm2', 'CoatedHP8000', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(438, '50*70', 'CoatedHP8000', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(439, '100*70', 'CoatedHP8000', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(440, '140*90', 'CoatedHP8000', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(441, '240*90', 'CoatedHP8000', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(442, 'A0', 'Transparent', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(443, 'A1', 'Transparent', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(444, 'A2', 'Transparent', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(445, 'A3', 'Transparent', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(446, 'A4', 'Transparent', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(447, 'm2', 'Transparent', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(448, '50*70', 'Transparent', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(449, '100*70', 'Transparent', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(450, '140*90', 'Transparent', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(451, '240*90', 'Transparent', 'Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(452, 'A0', 'Plain', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(453, 'A1', 'Plain', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(454, 'A2', 'Plain', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(455, 'A3', 'Plain', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(456, 'A4', 'Plain', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(457, 'm2', 'Plain', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(458, '50*70', 'Plain', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(459, '100*70', 'Plain', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(460, '140*90', 'Plain', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(461, '240*90', 'Plain', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(462, 'A0', 'Calc', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(463, 'A1', 'Calc', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(464, 'A2', 'Calc', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(465, 'A3', 'Calc', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(466, 'A4', 'Calc', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(467, 'm2', 'Calc', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(468, '50*70', 'Calc', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(469, '100*70', 'Calc', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(470, '140*90', 'Calc', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(471, '240*90', 'Calc', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(472, 'A0', 'HP', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(473, 'A1', 'HP', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(474, 'A2', 'HP', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(475, 'A3', 'HP', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(476, 'A4', 'HP', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(477, 'm2', 'HP', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(478, '50*70', 'HP', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(479, '100*70', 'HP', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(480, '140*90', 'HP', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(481, '240*90', 'HP', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(482, 'A0', 'HP8000', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(483, 'A1', 'HP8000', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(484, 'A2', 'HP8000', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(485, 'A3', 'HP8000', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(486, 'A4', 'HP8000', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(487, 'm2', 'HP8000', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(488, '50*70', 'HP8000', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(489, '100*70', 'HP8000', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(490, '140*90', 'HP8000', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(491, '240*90', 'HP8000', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(492, 'A0', 'Foam', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(493, 'A1', 'Foam', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(494, 'A2', 'Foam', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(495, 'A3', 'Foam', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(496, 'A4', 'Foam', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(497, 'm2', 'Foam', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(498, '50*70', 'Foam', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(499, '100*70', 'Foam', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(500, '140*90', 'Foam', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(501, '240*90', 'Foam', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(502, 'A0', 'Foam', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(503, 'A1', 'Foam', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(504, 'A2', 'Foam', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(505, 'A3', 'Foam', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(506, 'A4', 'Foam', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(507, 'm2', 'Foam', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(508, '50*70', 'Foam', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52');
INSERT INTO `templet_prices` (`id`, `size`, `type`, `color`, `machine`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(509, '100*70', 'Foam', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(510, '140*90', 'Foam', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(511, '240*90', 'Foam', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(512, 'A0', 'Foam', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(513, 'A1', 'Foam', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(514, 'A2', 'Foam', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(515, 'A3', 'Foam', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(516, 'A4', 'Foam', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(517, 'm2', 'Foam', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(518, '50*70', 'Foam', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(519, '100*70', 'Foam', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(520, '140*90', 'Foam', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(521, '240*90', 'Foam', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(522, 'A0', 'Foam', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(523, 'A1', 'Foam', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(524, 'A2', 'Foam', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(525, 'A3', 'Foam', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(526, 'A4', 'Foam', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(527, 'm2', 'Foam', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(528, '50*70', 'Foam', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(529, '100*70', 'Foam', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(530, '140*90', 'Foam', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(531, '240*90', 'Foam', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(532, 'A0', 'Plain8000', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(533, 'A1', 'Plain8000', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(534, 'A2', 'Plain8000', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(535, 'A3', 'Plain8000', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(536, 'A4', 'Plain8000', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(537, 'm2', 'Plain8000', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(538, '50*70', 'Plain8000', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(539, '100*70', 'Plain8000', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(540, '140*90', 'Plain8000', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(541, '240*90', 'Plain8000', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(542, 'A0', 'Canson', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(543, 'A1', 'Canson', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(544, 'A2', 'Canson', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(545, 'A3', 'Canson', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(546, 'A4', 'Canson', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(547, 'm2', 'Canson', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(548, '50*70', 'Canson', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(549, '100*70', 'Canson', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(550, '140*90', 'Canson', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(551, '240*90', 'Canson', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(552, 'A0', 'coshe', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(553, 'A1', 'coshe', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(554, 'A2', 'coshe', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(555, 'A3', 'coshe', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(556, 'A4', 'coshe', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(557, 'm2', 'coshe', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(558, '50*70', 'coshe', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(559, '100*70', 'coshe', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(560, '140*90', 'coshe', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(561, '240*90', 'coshe', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(562, 'A0', 'Copy', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(563, 'A1', 'Copy', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(564, 'A2', 'Copy', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(565, 'A3', 'Copy', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(566, 'A4', 'Copy', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(567, 'm2', 'Copy', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(568, '50*70', 'Copy', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(569, '100*70', 'Copy', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(570, '140*90', 'Copy', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(571, '240*90', 'Copy', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(572, 'A0', 'Scan', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(573, 'A1', 'Scan', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(574, 'A2', 'Scan', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(575, 'A3', 'Scan', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(576, 'A4', 'Scan', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(577, 'm2', 'Scan', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(578, '50*70', 'Scan', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(579, '100*70', 'Scan', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(580, '140*90', 'Scan', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(581, '240*90', 'Scan', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(582, 'A0', 'CoatedHP8000', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(583, 'A1', 'CoatedHP8000', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(584, 'A2', 'CoatedHP8000', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(585, 'A3', 'CoatedHP8000', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(586, 'A4', 'CoatedHP8000', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(587, 'm2', 'CoatedHP8000', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(588, '50*70', 'CoatedHP8000', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(589, '100*70', 'CoatedHP8000', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(590, '140*90', 'CoatedHP8000', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(591, '240*90', 'CoatedHP8000', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(592, 'A0', 'Transparent', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(593, 'A1', 'Transparent', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(594, 'A2', 'Transparent', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(595, 'A3', 'Transparent', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(596, 'A4', 'Transparent', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(597, 'm2', 'Transparent', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(598, '50*70', 'Transparent', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(599, '100*70', 'Transparent', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(600, '140*90', 'Transparent', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52'),
(601, '240*90', 'Transparent', 'Less Colour', 'HP 8000', '1', '0', '2019-11-09 09:21:52', '2019-11-09 09:21:52');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `name`, `order`, `created_at`, `updated_at`) VALUES
(1, 'defult', 0, '2019-11-03 22:46:28', '2019-11-03 22:46:28'),
(2, 'Plain', 1, '2019-11-03 23:15:41', '2019-11-07 18:36:06'),
(3, 'Calc', 1, '2019-11-05 22:29:15', '2019-11-05 22:29:15'),
(4, 'HP', 3, '2019-11-05 22:29:25', '2019-11-05 22:29:25'),
(5, 'HP8000', 3, '2019-11-05 22:29:35', '2019-11-05 22:29:35'),
(6, 'Plain8000', 23, '2019-11-05 22:29:48', '2019-11-05 22:29:48'),
(7, 'Canson', 2, '2019-11-05 22:29:58', '2019-11-05 22:29:58'),
(8, 'coshe', 1, '2019-11-05 22:30:08', '2019-11-05 22:30:08'),
(9, 'Foam', 2, '2019-11-05 22:30:18', '2019-11-05 22:30:18'),
(10, 'Copy', 1, '2019-11-05 22:30:28', '2019-11-05 22:30:28'),
(11, 'Scan', 2, '2019-11-05 22:30:37', '2019-11-05 22:30:37'),
(12, 'CoatedHP8000', 2, '2019-11-05 22:30:46', '2019-11-05 22:30:46'),
(13, 'Transparent', 1, '2019-11-05 22:30:53', '2019-11-05 22:30:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `statues` int(11) NOT NULL,
  `code_discount` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `statues`, `code_discount`, `created_at`, `updated_at`) VALUES
(1, 'Developer', 'Developer@Developer.com', '$2y$10$vRdLUl16CBXMkPAfbfmsP.1rGvfpVPJ0Pa4AHEv0E6uO417Z1vCWu', 1, 'P@ssw0rd', '2019-05-26 11:15:02', '2019-11-09 13:32:03'),
(2, 'mohanad', 'mohanad@admin.com', '$2y$10$0wmYTYs6A7nC3Vr7NlUvGe.l6/Q7zf2.bcPM1eW7vaLMkOSwdCovK', 1, 'P@ssw0rd1', '2019-05-26 16:04:49', '2019-11-09 12:48:33'),
(9, 'ahmed', 'ahmed@admin.com', '$2y$10$8sHJFUY84XerV0jNl5I2YOyr.VXtGzMBbh/r331YbLZuHsCZDFsYm', 1, '123456', '2019-11-05 22:19:43', '2019-11-09 11:54:05');

-- --------------------------------------------------------

--
-- Table structure for table `wallet_transactions`
--

CREATE TABLE `wallet_transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `wallet_before` float NOT NULL,
  `wallet_after` float NOT NULL,
  `total` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart_files`
--
ALTER TABLE `cart_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`,`user_id_upload`,`cart_print_id`,`cart_laser_id`),
  ADD KEY `user_id_upload_cart_file` (`user_id_upload`),
  ADD KEY `cart_print_cart_file` (`cart_print_id`),
  ADD KEY `cart_laser_cart_file` (`cart_laser_id`);

--
-- Indexes for table `cart_lasers`
--
ALTER TABLE `cart_lasers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`,`user_id`),
  ADD KEY `user_id_cart_laser` (`user_id`);

--
-- Indexes for table `cart_prints`
--
ALTER TABLE `cart_prints`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`,`user_id`,`type_id`,`color_id`,`size_id`,`machine_id`),
  ADD KEY `customer_id_2` (`customer_id`,`user_id`,`type_id`,`color_id`,`size_id`,`machine_id`),
  ADD KEY `user_id_cart_print` (`user_id`),
  ADD KEY `machine_id_cart_print` (`machine_id`),
  ADD KEY `size_id_cart_print` (`size_id`),
  ADD KEY `color_id_cart_print` (`color_id`),
  ADD KEY `type_id_cart_print` (`type_id`);

--
-- Indexes for table `cart_types`
--
ALTER TABLE `cart_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_id` (`type_id`,`customer_id`,`user_id`),
  ADD KEY `customer_id_cart_type` (`customer_id`),
  ADD KEY `user_id_cart_type` (`user_id`),
  ADD KEY `size_id` (`size_id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`user_id`);

--
-- Indexes for table `machines`
--
ALTER TABLE `machines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_order` (`user_id`),
  ADD KEY `customer_id_order` (`customer_id`);

--
-- Indexes for table `order_files`
--
ALTER TABLE `order_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_laser_id`,`user_id_upload`),
  ADD KEY `user_id_download` (`user_id_download`),
  ADD KEY `user_id_upload_files` (`user_id_upload`),
  ADD KEY `order_print_id` (`order_print_id`);

--
-- Indexes for table `order_lasers`
--
ALTER TABLE `order_lasers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`,`machine_id`,`user_start_id`),
  ADD KEY `machine_id_laser` (`machine_id`),
  ADD KEY `user_start_id_laser` (`user_start_id`),
  ADD KEY `user_end_id` (`user_end_id`),
  ADD KEY `user_pay_id` (`user_pay_id`),
  ADD KEY `user_discount_id` (`user_discount_id`),
  ADD KEY `user_skip_id` (`user_skip_id`);

--
-- Indexes for table `order_prints`
--
ALTER TABLE `order_prints`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`,`color_id`,`size_id`,`machine_id`,`type_id`,`user_end_id`),
  ADD KEY `size_id_print` (`size_id`),
  ADD KEY `color_id_print` (`color_id`),
  ADD KEY `type_id_print` (`type_id`),
  ADD KEY `machine_id_print` (`machine_id`),
  ADD KEY `user_id_print` (`user_end_id`),
  ADD KEY `user_start_id` (`user_start_id`,`user_pay_id`),
  ADD KEY `user_pay_id_print` (`user_pay_id`),
  ADD KEY `user_discount_id` (`user_discount_id`),
  ADD KEY `user_skip_id` (`user_skip_id`);

--
-- Indexes for table `order_types`
--
ALTER TABLE `order_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`,`type_id`,`user_pay_id`),
  ADD KEY `type_id_type` (`type_id`),
  ADD KEY `user_id_type` (`user_pay_id`),
  ADD KEY `size_id` (`size_id`),
  ADD KEY `user_discount_id` (`user_discount_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD KEY `permission_id_foreign` (`permission_id`),
  ADD KEY `role_id_foreign` (`role_id`);

--
-- Indexes for table `print_prices`
--
ALTER TABLE `print_prices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `size_id` (`size_id`,`type_id`,`color_id`,`machine_id`),
  ADD KEY `type_id_printer_price` (`type_id`),
  ADD KEY `color_id_printer_price` (`color_id`),
  ADD KEY `machine_id_printer_price` (`machine_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD KEY `role_id` (`role_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `size_id` (`size_id`,`type_id`),
  ADD KEY `type_id_store` (`type_id`);

--
-- Indexes for table `store_transactions`
--
ALTER TABLE `store_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `store_id` (`store_id`);

--
-- Indexes for table `templet_prices`
--
ALTER TABLE `templet_prices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wallet_transactions`
--
ALTER TABLE `wallet_transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart_files`
--
ALTER TABLE `cart_files`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cart_lasers`
--
ALTER TABLE `cart_lasers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cart_prints`
--
ALTER TABLE `cart_prints`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cart_types`
--
ALTER TABLE `cart_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `machines`
--
ALTER TABLE `machines`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `order_files`
--
ALTER TABLE `order_files`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `order_lasers`
--
ALTER TABLE `order_lasers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `order_prints`
--
ALTER TABLE `order_prints`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `order_types`
--
ALTER TABLE `order_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `print_prices`
--
ALTER TABLE `print_prices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=603;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `store_transactions`
--
ALTER TABLE `store_transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `templet_prices`
--
ALTER TABLE `templet_prices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=602;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `wallet_transactions`
--
ALTER TABLE `wallet_transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart_files`
--
ALTER TABLE `cart_files`
  ADD CONSTRAINT `cart_laser_cart_file` FOREIGN KEY (`cart_laser_id`) REFERENCES `cart_lasers` (`id`),
  ADD CONSTRAINT `cart_print_cart_file` FOREIGN KEY (`cart_print_id`) REFERENCES `cart_prints` (`id`),
  ADD CONSTRAINT `customer_id_cart_file` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `user_id_upload_cart_file` FOREIGN KEY (`user_id_upload`) REFERENCES `users` (`id`);

--
-- Constraints for table `cart_lasers`
--
ALTER TABLE `cart_lasers`
  ADD CONSTRAINT `customer_id_cart_laser` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `user_id_cart_laser` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `cart_prints`
--
ALTER TABLE `cart_prints`
  ADD CONSTRAINT `color_id_cart_print` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`),
  ADD CONSTRAINT `customer_id_cart_print` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `machine_id_cart_print` FOREIGN KEY (`machine_id`) REFERENCES `machines` (`id`),
  ADD CONSTRAINT `size_id_cart_print` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`),
  ADD CONSTRAINT `type_id_cart_print` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`),
  ADD CONSTRAINT `user_id_cart_print` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `cart_types`
--
ALTER TABLE `cart_types`
  ADD CONSTRAINT `customer_id_cart_type` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `size_id_cart_type` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`),
  ADD CONSTRAINT `type_id_cart_type` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`),
  ADD CONSTRAINT `user_id_cart_type` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `user_id_log` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `customer_id_order` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `user_id_order` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_lasers`
--
ALTER TABLE `order_lasers`
  ADD CONSTRAINT `machine_id_laser` FOREIGN KEY (`machine_id`) REFERENCES `machines` (`id`),
  ADD CONSTRAINT `order_id_laser` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `user_discount_id_laser` FOREIGN KEY (`user_discount_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `user_end_id_laser` FOREIGN KEY (`user_end_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `user_pay_id_laser` FOREIGN KEY (`user_pay_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `user_skip_id_laser` FOREIGN KEY (`user_skip_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `user_start_id_laser` FOREIGN KEY (`user_start_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_prints`
--
ALTER TABLE `order_prints`
  ADD CONSTRAINT `color_id_print` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`),
  ADD CONSTRAINT `machine_id_print` FOREIGN KEY (`machine_id`) REFERENCES `machines` (`id`),
  ADD CONSTRAINT `order_id_print` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `size_id_print` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`),
  ADD CONSTRAINT `type_id_print` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`),
  ADD CONSTRAINT `user_discount_id_print` FOREIGN KEY (`user_discount_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `user_end_id_print` FOREIGN KEY (`user_end_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `user_pay_id_print` FOREIGN KEY (`user_pay_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `user_skip_id_print` FOREIGN KEY (`user_skip_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `user_start_id_print` FOREIGN KEY (`user_start_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_types`
--
ALTER TABLE `order_types`
  ADD CONSTRAINT `order_id_type` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `size_id_type` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`),
  ADD CONSTRAINT `type_id_type` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`),
  ADD CONSTRAINT `user_discount_id_type` FOREIGN KEY (`user_discount_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `user_pay_id_type` FOREIGN KEY (`user_pay_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_id` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`),
  ADD CONSTRAINT `role_id_permission` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `print_prices`
--
ALTER TABLE `print_prices`
  ADD CONSTRAINT `color_id_price` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`),
  ADD CONSTRAINT `machine_id_price` FOREIGN KEY (`machine_id`) REFERENCES `machines` (`id`),
  ADD CONSTRAINT `size_id_price` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`),
  ADD CONSTRAINT `type_id_price` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`);

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_id` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `stores`
--
ALTER TABLE `stores`
  ADD CONSTRAINT `size_id_store` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`),
  ADD CONSTRAINT `type_id_store` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`);

--
-- Constraints for table `store_transactions`
--
ALTER TABLE `store_transactions`
  ADD CONSTRAINT `store_id_transaction` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`);

--
-- Constraints for table `wallet_transactions`
--
ALTER TABLE `wallet_transactions`
  ADD CONSTRAINT `customer_id_wallet` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `user_id_wallet` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
