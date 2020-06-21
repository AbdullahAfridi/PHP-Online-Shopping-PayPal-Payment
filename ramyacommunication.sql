-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2018 at 04:54 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ramyacommunication`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(2, 'Electro'),
(4, 'Jejo'),
(1, 'Phone'),
(3, 'Samsung');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `cid` int(11) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `PhoneNumber` varchar(14) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_type` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`cid`, `FirstName`, `LastName`, `PhoneNumber`, `username`, `email`, `password`, `user_type`) VALUES
(3, 'Abdullah', 'Daulatzai', '', 'AbdullahKhan', 'abdullahdaulatzai@yahoo.com', '', ''),
(5, 'Waheed', 'Saleh', '07696577777', 'AfghanYar', 'Jan@yahoo.com', 'c20ad4d76fe97759aa27a0c99bff6710', ''),
(7, 'Fazlullah', 'Daulatzai', '0769657777', 'Fazal', 'abdullahdaulatzia@gmail.com', 'c20ad4d76fe97759aa27a0c99bff6710', 'user'),
(8, 'Siraj', 'Ahmed', '0769657777', 'siraj', 'rozagul905@gmail.com', '6512bd43d9caa6e02c990b0a82652dca', ''),
(9, 'Siraj', 'Uddin', '90012', 'Jasmeen', 'farmanshahab@gmail.com', '6512bd43d9caa6e02c990b0a82652dca', '');

-- --------------------------------------------------------

--
-- Table structure for table `forget`
--

CREATE TABLE `forget` (
  `ResetCode` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forget`
--

INSERT INTO `forget` (`ResetCode`, `email`) VALUES
('wHOc5T', 'shakila.shaki08@gmail.com'),
('nG20qX', 'Abdullahdaulatzai@yahoo.com'),
('pgSfL0', 'Abdullahdaulatzai@yahoo.com'),
('c3AxMi', 'Abdullahdaulatzai@yahoo.com'),
('0JU3ik', 'abdullahdaulatzia@gmail.com'),
('kslO7b', 'abdullahdaulatzia@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `lal`
--

CREATE TABLE `lal` (
  `nuid` int(11) NOT NULL,
  `id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(11) UNSIGNED NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `file_name`, `file_type`) VALUES
(2, '1.jpg', 'image/jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity` varchar(50) DEFAULT NULL,
  `buy_price` decimal(25,2) DEFAULT NULL,
  `sale_price` decimal(25,2) NOT NULL,
  `categorie_id` int(11) UNSIGNED NOT NULL,
  `media_id` int(11) DEFAULT '0',
  `date` datetime NOT NULL,
  `supid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `quantity`, `buy_price`, `sale_price`, `categorie_id`, `media_id`, `date`, `supid`) VALUES
(5, 'New', '12', '100.00', '200.00', 4, 1, '2018-11-24 20:08:31', NULL),
(6, 'Yahoo', '-3', '2.00', '5.00', 2, 2, '2018-12-06 17:25:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `profits`
--

CREATE TABLE `profits` (
  `id` int(11) NOT NULL,
  `year` varchar(10) NOT NULL,
  `month` varchar(50) NOT NULL,
  `profit` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profits`
--

INSERT INTO `profits` (`id`, `year`, `month`, `profit`) VALUES
(9, '2018', 'January', '1000'),
(10, '2018', 'February', '2000'),
(11, '2018', 'March', '2500'),
(12, '2018', 'April', '4000'),
(13, '2018', 'May', '5000'),
(14, '2018', 'Jun', '3500'),
(15, '2018', 'July', '1500'),
(16, '2018', 'August', '7000'),
(17, '2018', 'September', '8000'),
(18, '2018', 'October', '8500'),
(19, '2018', 'November', '12000'),
(20, '2018', 'December', '15000');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) UNSIGNED NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `price` decimal(25,2) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `product_id`, `qty`, `price`, `date`) VALUES
(1, 6, 1, '5.00', '2018-12-06');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supid` int(11) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `city` varchar(30) NOT NULL,
  `streetNo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supid`, `FirstName`, `LastName`, `email`, `city`, `streetNo`) VALUES
(7, 'Abdu', 'Daulatzai', 'Abdull@gmail.com', 'Kabil', 1200),
(8, 'Abdullah', 'Khan', 'abdullah12daulatzia@gmail.com', 'fff', 22);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(60) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(40) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `user_level` int(11) NOT NULL,
  `image` varchar(255) DEFAULT 'no_image.jpg',
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `user_level`, `image`, `status`) VALUES
(4, 'Abdullah', 'jan', 'abdullahdaulatzai@yahoo.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, 'zxl3yn274.jpg', 1),
(7, 'gul', 'Jamal', 'Abdul22l@gmail.com', '7b52009b64fd0a2a49e6d8a939753077792b0554', 0, 'no_image.jpg', 1),
(10, 'Abdullah12', 'Watani', '@yahoo.com', '7b52009b64fd0a2a49e6d8a939753077792b0554', 0, 'no_image.jpg', 1),
(12, 'Siraj', 'Ahmed', 'wow@yahoo.com', '17ba0791499db908433b80f37c5fbc89b870084b', 0, 'no_image.jpg', 1),
(13, 'w', 'e', 'aaaa@yahoo.com', '356a192b7913b04c54574d18c28d46e6395428ab', 0, 'no_image.jpg', 1),
(14, 'ad', 'we', 'qqq@yahoo.com', '17ba0791499db908433b80f37c5fbc89b870084b', 0, 'no_image.jpg', 1),
(15, 'aaa', 'sss', 'aaAbdul22l@gmail.com', '17ba0791499db908433b80f37c5fbc89b870084b', 1, 'no_image.jpg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `lal`
--
ALTER TABLE `lal`
  ADD PRIMARY KEY (`nuid`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `categorie_id` (`categorie_id`),
  ADD KEY `media_id` (`media_id`),
  ADD KEY `supid` (`supid`);

--
-- Indexes for table `profits`
--
ALTER TABLE `profits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `profits`
--
ALTER TABLE `profits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `FK_products` FOREIGN KEY (`categorie_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`supid`) REFERENCES `supplier` (`supid`);

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `SK` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
