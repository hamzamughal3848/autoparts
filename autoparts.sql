-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2024 at 10:58 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chugtaiautos`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(150) NOT NULL,
  `name` varchar(150) NOT NULL,
  `parent_id` int(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`) VALUES
(12, 'Engine', 0),
(14, 'Tecnology', 0),
(15, 'Engine Oil', 12),
(16, 'Saf oil', 15),
(17, 'pure oil', 16),
(18, 'khlis oil', 17),
(19, 'parts', 12),
(20, 'oil one', 15),
(21, 'tecnology', 15),
(22, 'tecnology', 15),
(23, 'asd', 14),
(24, 'asd', 14),
(25, 'asd', 14),
(26, 'asd', 14),
(27, 'new parts', 19),
(28, 'old parts', 19),
(29, 'new categorie', 0),
(30, 'new categorie', 0),
(31, 'new categorie', 0),
(32, 'parts1', 28),
(33, 'part2', 27);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `phone` varchar(250) NOT NULL,
  `adress` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `phone`, `adress`) VALUES
(3, 'hamza', '03069309136', '6 block'),
(4, 'Ali ', '0309', '6 block');

-- --------------------------------------------------------

--
-- Table structure for table `customers_pending`
--

CREATE TABLE `customers_pending` (
  `id` int(150) NOT NULL,
  `customer_id` int(150) NOT NULL,
  `customer_name` varchar(300) NOT NULL,
  `customer_car` varchar(300) NOT NULL,
  `pending_payment` int(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers_pending`
--

INSERT INTO `customers_pending` (`id`, `customer_id`, `customer_name`, `customer_car`, `pending_payment`) VALUES
(1, 3, 'hamza', 'BMV460', 8000),
(3, 3, 'hamza', 'BMW 695', 7000),
(4, 3, 'hamza', 'Ferari 602', 10000),
(5, 4, 'Ali ', 'hhh 999', 1000),
(6, 4, 'Ali ', 'bbb 999', 5000);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(150) NOT NULL,
  `name` varchar(200) NOT NULL,
  `catagorie_id` int(150) NOT NULL,
  `categorie` varchar(160) NOT NULL,
  `p_price` int(150) NOT NULL,
  `s_price` int(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `catagorie_id`, `categorie`, `p_price`, `s_price`) VALUES
(23, 'Rims', 14, 'Tecnology', 500, 1500),
(24, 'moter', 12, 'Engine', 500, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(150) NOT NULL,
  `name` varchar(300) NOT NULL,
  `adress` varchar(300) NOT NULL,
  `phone` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `adress`, `phone`) VALUES
(1, 'Hamza', '6 block', '03069309136');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(150) NOT NULL,
  `name` varchar(150) NOT NULL,
  `f_name` varchar(160) NOT NULL,
  `role` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `f_name`, `role`, `password`) VALUES
(1, 'admin', 'admin', 'admin-1', '63a9f0ea7bb98050796b649e85481845');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers_pending`
--
ALTER TABLE `customers_pending`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customers_pending`
--
ALTER TABLE `customers_pending`
  MODIFY `id` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(150) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
