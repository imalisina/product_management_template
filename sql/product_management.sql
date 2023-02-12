-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2023 at 09:24 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `product_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `description` text NOT NULL,
  `image_url` varchar(191) NOT NULL,
  `price` int(190) NOT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT 1,
  `rates` int(6) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `shop_id`, `name`, `description`, `image_url`, `price`, `is_published`, `rates`) VALUES
(3, 2, 'Carhartt WIP', 'Sweat Script | Light grey', 'https://static.smallable.com/1583314-648x648q80/.jpg', 368, 0, 4),
(4, 1, 'Daily Paper', 'T-shirt Pardali | Black', 'https://static.smallable.com/1584292-720x720q80/.jpg', 42, 0, 5),
(5, 3, 'Edmmond Studios ', 'Boosted T-shirt | White', 'https://static.smallable.com/1612419-720x720q80/.jpg', 60, 0, 3),
(6, 2, 'Gramicci', 'Veste Sherpa | Beige', 'https://static.smallable.com/1569624-720x720q80/.jpg', 510, 0, 2),
(9, 3, 'New Balance', 'Baskets 574 | Burgundy', 'https://static.smallable.com/1591602-720x720q80/.jpg', 73, 0, 3),
(10, 2, 'NN07 Navy Hat', 'Ribbed 6470 Beanie | Navy blue', 'https://static.smallable.com/1593565-720x720q80/.jpg', 15, 0, 5),
(13, 3, 'SandQvist', 'Ilon Backpack | Red', 'https://static.smallable.com/1470906-720x720q80/.jpg', 88, 0, 4),
(15, 3, 'OSA Company', 'Spring Lab Swim Trunks - Men’s Collection | Pale green', 'https://static.smallable.com/1405167-720x720q80/.jpg', 86, 0, 2),
(17, 2, 'Avnier', 'Source Tie-Dye Organic Cotton T-shirt | Red', 'https://static.smallable.com/1462892-720x720q80/.jpg', 74, 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `shops`
--

CREATE TABLE `shops` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `location` varchar(191) NOT NULL DEFAULT 'Online'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shops`
--

INSERT INTO `shops` (`id`, `name`, `location`) VALUES
(1, 'Zara', 'Sweden'),
(2, 'H&M', 'USA, New York'),
(3, 'DigiStyle', 'Online');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shop_id` (`shop_id`);

--
-- Indexes for table `shops`
--
ALTER TABLE `shops`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `shops`
--
ALTER TABLE `shops`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`shop_id`) REFERENCES `shops` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
