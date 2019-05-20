-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2019 at 07:53 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `craftedbysoul`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'a', 'b');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `order_id` int(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `qty` int(255) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`order_id`, `product_id`, `user_id`, `qty`, `status`) VALUES
(15, 1, 1, 1, 1),
(19, 1, 4, 3, 2),
(21, 3, 4, 2, 2),
(22, 2, 4, 1, 2),
(23, 1, 4, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(1, 'Mug'),
(4, 'Totebag'),
(7, 'Bunting'),
(8, 'Doodle');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `customer` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `message` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `date`, `customer`, `contact`, `message`) VALUES
(1, '2019-05-16 10:00:00', 'shaik', '019', 'I have a problem'),
(3, '2019-05-21 00:59:39', 'athir@gmail.com', '145047974', 'Sistem masalah doe');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `qty` int(255) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `orderDate` datetime DEFAULT NULL,
  `paymentMethod` varchar(50) NOT NULL,
  `orderStatus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `product_id`, `quantity`, `orderDate`, `paymentMethod`, `orderStatus`) VALUES
(1, 1, 1, 2, '2019-05-09 23:13:33', 'COD', 'i'),
(2, 3, 2, 2, '2019-05-16 00:01:01', 'COD', 'Deliveredi');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(100) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_category` varchar(100) NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `price` decimal(50,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `product_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_category`, `product_image`, `price`, `stock`, `product_status`) VALUES
(1, 'Cawan Hitam', 'Mug', 'mug.png', '21.00', 4, 'Active'),
(2, 'Bag Pink', 'Totebag', 'totebag.png', '30.20', 10, 'Active'),
(3, 'Test', 'Bunting', 'ball.png', '22.00', 15, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `turn`
--

CREATE TABLE `turn` (
  `turn_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `turn`
--

INSERT INTO `turn` (`turn_id`, `order_id`) VALUES
(1, 23);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `billingName` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contactno` bigint(11) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `shippingAddress` longtext,
  `shippingCity` varchar(255) DEFAULT NULL,
  `shippingPostcode` int(6) DEFAULT NULL,
  `shippingState` varchar(255) DEFAULT NULL,
  `billingAddress` longtext,
  `billingCity` varchar(255) DEFAULT NULL,
  `billingPostcode` int(6) DEFAULT NULL,
  `billingState` varchar(255) DEFAULT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `billingName`, `email`, `contactno`, `password`, `shippingAddress`, `shippingCity`, `shippingPostcode`, `shippingState`, `billingAddress`, `billingCity`, `billingPostcode`, `billingState`, `regDate`) VALUES
(1, 'Shaik', NULL, 'shaik@gmail.com', 9009857868, 'abc', 'Tasik Biru', 'Sg Buloh', NULL, 'Selangor', 'Tasik Biru', 'Sg Buloh', NULL, 'Selangor', '2017-02-04 11:30:50'),
(2, 'Amir', NULL, 'amir@gmail.com', 8285703355, 'cba', 'Kg Kota', 'Pasir Gudang', NULL, 'Johor', 'Kg Kota', 'Pasir Gudang', NULL, 'Johor', '2017-03-15 09:21:22'),
(3, 'Syukor', NULL, 'syukor@gmail.com', 1121312312, 'bca', 'Kg Bersih', 'Tanjong Malim', NULL, 'Perak', 'Kg Bersih', 'Tanjong Malim', NULL, 'Perak', '2018-04-29 01:30:32'),
(4, 'Muhammad Athir', 'Muhammad Athir', 'athir@gmail.com', 145047974, 'abc', 'DT 12', 'Jalan 12', 176110, 'Melaka', 'DT 12', 'Jalan 12', 176110, 'Melaka', '2019-05-08 18:14:34');

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
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `turn`
--
ALTER TABLE `turn`
  ADD PRIMARY KEY (`turn_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `turn`
--
ALTER TABLE `turn`
  MODIFY `turn_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
