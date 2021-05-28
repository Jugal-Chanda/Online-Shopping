-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2021 at 04:56 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_shopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_no` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL,
  `total` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_no`, `status`, `created_at`, `user_id`, `total`) VALUES
(1, '1621336410', 0, '2021-05-18 11:13:30', 2, 10950),
(2, '1621348312', 0, '2021-05-18 14:31:52', 3, 10950),
(3, '1621348436', 1, '2021-05-18 14:33:56', 3, 622050);

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`id`, `order_id`, `product_id`, `qty`) VALUES
(1, 1, 1, 1),
(2, 2, 1, 1),
(3, 3, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `code`, `price`, `brand`, `image`) VALUES
(1, 'Monitor', '1621336218', 10900, 'Asus', 'monitor.jpg'),
(2, 'MSI Laptop', '1621335964', 110000, 'MSI', 'abf11a9d47a72319780571d74b16b05627e476907b30e5077a26c383555f8a02.jpg'),
(3, 'Zigor Ups', '1621336001', 4700, 'Zigor', '83ddabc59747e96bea5c9e6cc92bece3fd3ff741d93a5db781a324fc7e6fa7a6.jpg'),
(4, 'Epson Printer', '1621336022', 12800, 'Epson', '09c909ff2e94cf8616cdec32afca2dbb0671483d3c9e7392bd3c600614b846a6.jpg'),
(5, 'KWG Casing', '1621336044', 4600, 'KWG', 'ca85896ad9cba16ced0e9fd3d0fbe592f7313dd3251174d60ffa16dafd2d76f7.jpg'),
(6, 'AMD Ryzen PC', '1621336074', 622000, 'AMD Ryzen', '6434b6b8743bf31fb6b59c8c065653ab957676b8618febece2d761d5b2679ee6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `address`, `is_admin`, `token`) VALUES
(1, 'admin', 'admin@admin.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', '+880-12345-12354', 'Dhaka, Bangladesh', 1, 'e3ff7ad5942cc293e1228b3d26c33267a311cd00b565748d0b884670839a050c'),
(2, 'Jugal Kishore Chanda', 'jugalchanda7@gmail.com', 'de6da9407903852fc6552521177d0fbf49566ca6c6e0b98d207897ffd2d51a33', '01521461343', 'Banasree Dhaka', 0, '9dafc8ebd77802ae06d433a38f018435ae81e70d3403faf5e4a5ecb106190c64'),
(3, 'M. Rajib H.', 'rajib@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '01521461643', 'Dhaka , Bangladesh', 0, '9cafffa00ffa4bccdd30cede25dc35f896963cd976f3d4265b80c82d26790c84');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
