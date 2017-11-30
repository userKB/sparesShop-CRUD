-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2017 at 08:37 AM
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
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `hash` varchar(32) NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `first_name`, `last_name`, `email`, `password`, `hash`, `active`) VALUES
(2, 'kenneth', 'kirui', 'kenbett@live.com', '$2y$10$teGutJy0FcvwR1mVggyFdODKvK4dHc3Bp0p55.VElhZ/Yt1i0VhEa', 'db8e1af0cb3aca1ae2d0018624204529', 1),
(3, 'bella ', 'project', 'bella1.project@gmail.com', '$2y$10$fZ9ZW5XMcfGWWCwCE4uZQel3cKz8r9aL1I/85hQmcLi0nagwk/54S', '3c59dc048e8850243be8079a5c74d079', 1),
(4, 'user', 'user', 'user@admin.com', '$2y$10$lrb6uxvErAF0jruftwWwGeLKkpvqBV8JwszlRaN7bLp.cQiLgbIcq', '26657d5ff9020d2abefe558796b99584', 0);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` mediumint(9) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `item_owner` mediumint(9) NOT NULL,
  `item_desc` varchar(24) NOT NULL,
  `img_path` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `item_name`, `item_owner`, `item_desc`, `img_path`) VALUES
(2, 'tractor', 2, 'df560', 'bd36c264-1a6c-4af9-b68d-c9216837c4cc.jpg'),
(3, 'planter', 2, 'seed planter', '0736ebcac69130babc4ef097b31e375a.jpg'),
(4, 'jembe', 2, 'a tool used to plow land', 'f7c642adbc7aacbe5c867456364a73a6.jpg'),
(5, 'barbed wire', 7, 'serated wire for fencing', 'arkay.jpg'),
(6, 'particles', 6, 'part types', 'Mir_Hero.jpg'),
(7, 'cellophane', 4, 'wrapping items for prese', 'MIR_Fibonacci_720p.jpg'),
(8, 'particles 2', 8, 'items in description', 'MIR_Lotus_720p.jpg'),
(9, 'part 3', 8, 'circles and spheres', 'MIR_Pinwheel_720p.jpg'),
(10, 'tyres', 2, 'off road threaded', 'MIR_ClassicForm_720p.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `itemtags`
--

CREATE TABLE `itemtags` (
  `item_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `tag_id` mediumint(9) NOT NULL,
  `tag` varchar(24) NOT NULL,
  `snap_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`tag_id`, `tag`, `snap_id`) VALUES
(1, 'wire fencing ', 6),
(2, '', 6),
(3, '', 6),
(4, '', 6),
(5, '', 6),
(6, '', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `item_owner` (`item_owner`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`tag_id`),
  ADD KEY `tag` (`tag`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `tag_id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
