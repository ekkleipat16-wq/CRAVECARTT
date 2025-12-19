-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2025 at 09:15 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cravecart`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cus_id` int(11) NOT NULL,
  `cus_name` varchar(255) NOT NULL,
  `cus_order` varchar(255) NOT NULL,
  `pro_price` int(11) NOT NULL,
  `cus_address` varchar(255) NOT NULL,
  `cus_contact` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cus_id`, `cus_name`, `cus_order`, `pro_price`, `cus_address`, `cus_contact`) VALUES
(16, 'ekklei@gmail.com', 'Pansit Canton', 0, 'sfddfdsf', 23235235),
(19, 'symon@gmail.com', 'Spicy Chicken Sandwich', 99, 'sdgdfg', 4567567),
(20, 'symon@gmail.com', 'Fried Chicken + Rice', 89, 'sgfsd', 34545),
(21, 'symon@gmail.com', 'Fried Chicken ', 89, 'sgfsd', 34545),
(22, 'symon@gmail.com', 'Fried Chicken + Rice', 89, 'dfgdfg', 435435),
(23, 'symon@gmail.com', 'Buffalo', 75, 'secretttt', 23535345),
(24, 'symon@gmail.com', 'Buffalo', 75, 'hahahhahah', 2147483647),
(25, 'symon@gmail.com', 'Classic Burger', 59, 'ffffffffff', 1111111111),
(26, 'symon@gmail.com', 'Buffalo', 75, 'ewtsdg', 345346),
(27, 'symon@gmail.com', 'Classic Burger', 59, 'dfghdfh', 456456),
(28, 'symon@gmail.com', 'Bacon Burger', 129, 'retertret', 45345),
(29, 'symon@gmail.com', 'Cheeseburger', 79, 'retertret', 45345),
(30, 'symon@gmail.com', 'Tuna Sandwich', 69, 'retertret', 45345),
(31, 'symon@gmail.com', 'Tuna Sandwich', 69, 'sdsdgdsg', 435435),
(32, 'symon@gmail.com', 'Tuna Sandwich', 69, 'dfgdgdfg', 435435),
(33, 'symon@gmail.com', 'Buffalo', 75, 'dfgdgdfg', 435435),
(34, 'symon@gmail.com', 'Cheeseburger', 79, 'dfgdgdfg', 435435),
(35, 'symon@gmail.com', 'Cheeseburger', 79, 'dfgdgdfg', 435435);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pro_id` int(11) NOT NULL,
  `pro_name` varchar(255) NOT NULL,
  `pro_price` decimal(10,2) NOT NULL,
  `pro_quantity` int(11) NOT NULL,
  `pro_date` date NOT NULL,
  `pro_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pro_id`, `pro_name`, `pro_price`, `pro_quantity`, `pro_date`, `pro_status`) VALUES
(1, 'Cheeseburger', 79.00, 100, '2025-12-04', 'available'),
(2, 'Veggie Burger', 89.00, 50, '2025-12-04', 'available'),
(3, 'Tuna Sandwich', 69.00, 50, '2025-12-04', 'available'),
(4, 'Spicy Chicken Sandwich', 99.00, 30, '2025-12-04', 'available'),
(5, 'Bacon Burger', 129.00, 25, '2025-12-04', 'available'),
(6, 'Classic Burger', 59.00, 80, '2025-12-04', 'available'),
(7, 'Fried Chicken + Rice', 89.00, 50, '2025-12-04', 'available'),
(8, 'Spicy Chicken Meal', 99.00, 40, '2025-12-04', 'available'),
(9, 'Chicken Fillet Meal', 79.00, 60, '2025-12-04', 'available'),
(10, 'Buffalo', 75.00, 70, '2025-12-04', 'available'),
(11, 'Chicken Inasal', 129.00, 30, '2025-12-04', 'available'),
(12, 'Chrispy Chicken', 99.00, 50, '2025-12-04', 'available'),
(13, 'Sweet-Style Spaghetti', 69.00, 90, '2025-12-04', 'available'),
(14, 'Palabok', 99.00, 80, '2025-12-04', 'available'),
(15, 'Carbonara', 89.00, 75, '2025-12-04', 'available'),
(16, 'Pansit Canton', 56.00, 100, '2025-12-04', 'available'),
(17, 'Mac & Cheese', 89.00, 60, '2025-12-04', 'available'),
(18, 'Stir-Fry Noodles', 75.00, 80, '2025-12-04', 'available');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `date_created`, `status`) VALUES
(1, 'ekklei@gmail.com', '$2y$10$6D/Vzi.1yiTpzzbRQOIyH.SS8aMmOFPfMPL7zPEf1/0gIlG41msN2', '2025-12-04 06:20:02', 'active'),
(2, 'symon@gmail.com', '$2y$10$BAt8ZH5mkQXuq6tREnMOXOHel/fJ6ijW8EeFY6ECNsOtTQmxqM8N.', '2025-12-04 10:12:51', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
