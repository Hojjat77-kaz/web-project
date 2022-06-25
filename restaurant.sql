-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2022 at 08:10 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `user_name` varchar(64) CHARACTER SET utf8mb4 NOT NULL,
  `password` varchar(32) NOT NULL,
  `login_code` varchar(255) NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user_name`, `password`, `login_code`, `update_at`) VALUES
(1, 'admin', 'admin', '$2y$10$pJafE02uQeqhvbsIMy8RWeGTsDnvt/mbuZfq0B79J.KtLX/ScDvYO', '2022-06-10 17:36:39');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `food_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`food_id`, `user_id`, `count`, `create_at`, `update_at`) VALUES
(1, 17, 6, '2022-01-22 18:20:22', '2022-01-23 07:59:20'),
(5, 17, 1, '2022-01-23 07:59:10', '2022-01-23 07:59:10'),
(7, 17, 3, '2022-01-22 18:31:58', '2022-01-22 19:34:24'),
(9, 17, 0, '2022-01-22 18:32:20', '2022-01-22 19:55:05'),
(11, 19, 0, '2022-01-23 14:17:08', '2022-01-23 14:19:05'),
(11, 20, 4, '2022-06-03 17:49:21', '2022-06-10 17:35:52'),
(15, 20, 2, '2022-06-07 08:19:41', '2022-06-10 17:35:58'),
(17, 20, 1, '2022-06-10 17:36:08', '2022-06-10 17:36:08'),
(18, 20, 1, '2022-06-07 08:19:50', '2022-06-07 08:19:50');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `description` varchar(128) NOT NULL,
  `price` float NOT NULL,
  `Meal` varchar(15) NOT NULL DEFAULT 'Lunch',
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `restaurant_id`, `name`, `description`, `price`, `Meal`, `create_at`, `update_at`) VALUES
(1, 1, 'Surmai Chilli', 'high quality and healthy', 85, 'Lunch', '2022-01-19 15:36:02', '2022-01-23 14:39:39'),
(2, 1, 'Toasted Jam', 'tonic and healthy', 35, 'Lunch', '2022-01-19 15:36:02', '2022-01-23 14:40:29'),
(3, 1, 'Prawns Butter Garlic', 'high quality and healthy', 80, 'Lunch', '2022-01-19 15:38:50', '2022-01-23 14:39:39'),
(4, 1, 'Plain Pancakes', 'high quality and healthy', 70, 'Lunch', '2022-01-19 15:38:50', '2022-01-23 14:39:39'),
(5, 1, 'Organic Fruit Salad', 'high quality and healthy', 125, 'Lunch', '2022-01-19 15:38:50', '2022-01-23 14:39:39'),
(6, 1, 'Plain Pancakes', 'tonic and healthy', 35, 'Lunch', '2022-01-19 15:38:50', '2022-01-23 14:40:26'),
(7, 1, 'Sode Kadai', 'high quality and healthy', 60, 'Lunch', '2022-01-19 15:38:50', '2022-01-23 14:39:39'),
(8, 1, 'Mutton Handi', 'high quality and healthy', 25, 'Lunch', '2022-01-19 15:38:50', '2022-01-23 14:39:39'),
(9, 1, 'Twisted Sticks', 'high quality and healthy', 70, 'Lunch', '2022-01-19 15:38:50', '2022-01-23 14:39:39'),
(10, 1, 'Garlic Chilli Karahi', 'high quality and healthy', 50, 'Lunch', '2022-01-19 15:38:50', '2022-01-23 14:39:39'),
(11, 1, 'Honey', 'tonic and healthy', 10, 'breakfast', '2022-01-22 08:05:38', '2022-01-23 14:39:56'),
(12, 1, 'spaghetti', 'high quality and healthy', 25, 'lunch', '2022-01-23 13:57:35', '2022-01-23 14:39:39'),
(13, 1, 'fried chicken', 'high quality and healthy', 30, 'breakfast', '2022-01-23 13:59:21', '2022-01-23 14:39:39'),
(14, 1, 'mashed potatoes', 'tonic and healthy', 15, 'lunch', '2022-01-23 14:00:55', '2022-01-23 14:40:05'),
(15, 1, 'steak', 'tonic and healthy', 40, 'breakfast', '2022-01-23 14:02:05', '2022-01-23 14:40:08'),
(17, 1, 'kebab', 'high quality and healthy', 35, 'lunch', '2022-01-23 14:04:57', '2022-01-23 14:39:39'),
(18, 1, 'pasta', 'best pasta in town', 25, 'dinner', '2022-01-23 14:41:12', '2022-01-23 14:42:38'),
(19, 1, 'meat ball', 'old fashion meal', 35, 'dinner', '2022-01-23 14:42:21', '2022-01-23 14:42:21'),
(20, 1, 'cheesy chicken', 'high quality and yumm', 35, 'deals', '2022-01-23 14:46:40', '2022-01-23 14:46:40'),
(21, 6241, 'سلف سرویس', 'هر چی دوست داری متونی بخوری !!!!', 135000, 'breakfast', '2022-06-03 18:57:05', '2022-06-03 18:57:05');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `description` varchar(128) NOT NULL,
  `image` varchar(255) NOT NULL,
  `rate` float NOT NULL DEFAULT 60,
  `address` varchar(255) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`id`, `name`, `description`, `image`, `rate`, `address`, `create_at`, `update_at`) VALUES
(1, 'رستوارن', 'خیلی رستوران خوبیه', 'img/item1.png', 55, 'خیلی رستوران خوبیه', '2022-01-19 08:10:32', '2022-06-03 19:29:01'),
(2, 'فست فود', 'خیلی رستوران خوبیه', 'img/item2.png', 50, 'خیلی رستوران خوبیه', '2022-01-19 08:59:34', '2022-06-03 19:29:01'),
(3, 'غذای سبز', 'خیلی رستوران خوبیه', 'img/item3.png', 60, 'خیلی رستوران خوبیه', '2022-01-19 09:00:21', '2022-06-03 19:29:01'),
(4, 'اکبر جوجه', 'خیلی رستوران خوبیه', 'img/item4.png', 35, 'خیلی رستوران خوبیه', '2022-01-19 09:00:55', '2022-06-03 19:29:01'),
(5, 'غدای ترکی', 'خیلی رستوران خوبیه', 'img/item5.png', 50, 'خیلی رستوران خوبیه', '2022-01-19 09:01:20', '2022-06-03 19:29:01'),
(6, 'پیتزایی', 'خیلی رستوران خوبیه', 'img/item6.png', 45, 'خیلی رستوران خوبیه', '2022-01-19 09:01:49', '2022-06-03 19:29:01'),
(7, 'بیرون بر', 'خیلی رستوران خوبیه', 'img/item2.png', 60, 'خیلی رستوران خوبیه', '2022-01-19 14:15:12', '2022-06-03 19:29:01'),
(8, 'گیلانی', 'خیلی رستوران خوبیه', 'img/item3.png', 60, 'خیلی رستوران خوبیه', '2022-01-19 14:15:36', '2022-06-03 19:29:01'),
(9, 'گیلانی ', 'خیلی رستوران خوبیه', 'img/item1.png', 60, 'خیلی رستوران خوبیه', '2022-01-19 14:15:52', '2022-06-03 19:29:01'),
(10, 'گیلانی', 'خیلی رستوران خوبیه', 'img/item4.png', 60, 'خیلی رستوران خوبیه', '2022-01-19 14:16:13', '2022-06-03 19:29:01'),
(11, 'گیلانی', 'خیلی رستوران خوبیه', 'img/item5.png', 60, 'خیلی رستوران خوبیه', '2022-01-19 14:16:40', '2022-06-03 19:29:01'),
(12, 'گیلانی', 'خیلی رستوران خوبیه', 'img/item6.png', 60, 'خیلی رستوران خوبیه', '2022-01-19 14:16:53', '2022-06-03 19:29:01'),
(6241, 'اسپاخو', 'کرمان بلوار جمهوری', 'img/6241.png', 60, 'کرمان بلوار جمهوری', '2022-06-03 18:53:01', '2022-06-03 18:53:01');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user_name` varchar(64) CHARACTER SET utf8 NOT NULL,
  `password` varchar(32) CHARACTER SET utf8 NOT NULL,
  `login_code` varchar(250) CHARACTER SET utf8mb4 DEFAULT NULL,
  `email` varchar(128) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(15) CHARACTER SET utf8 NOT NULL,
  `address` varchar(128) CHARACTER SET utf8 DEFAULT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_name`, `password`, `login_code`, `email`, `phone`, `address`, `create_at`, `update_at`) VALUES
(20, 'saeed', '849e060f05808577361b084ba1e3eca7', '$2y$10$7bug.FFnekhJjO59hy4tYOpD0ZaUF5sFo2.ibHW4xCz6eayToP7le', 'saeed@gmail.com', '09375924314', NULL, '2022-06-03 22:04:43', '2022-06-10 22:05:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`food_id`,`user_id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6633;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
