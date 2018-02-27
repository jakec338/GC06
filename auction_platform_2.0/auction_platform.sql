-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2018 at 01:34 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `auction_platform`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator_accounts`
--

CREATE TABLE `administrator_accounts` (
  `administrator_id` int(11) NOT NULL,
  `admin_name` varchar(45) NOT NULL,
  `admin_surname` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bids`
--

CREATE TABLE `bids` (
  `bid_id` int(11) NOT NULL,
  `Listed_Items_item_id` int(11) NOT NULL,
  `Buyer_Accounts_buyer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `buyer_accounts`
--

CREATE TABLE `buyer_accounts` (
  `buyer_id` int(11) NOT NULL,
  `Fullname` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buyer_accounts`
--

INSERT INTO `buyer_accounts` (`buyer_id`, `Fullname`, `Email`, `Password`) VALUES
(8, 'Green Wendy', 'greenwendy@gmail.com', 'wendy'),
(9, 'Henry', 'henry@gmail.com', 'henry');

-- --------------------------------------------------------

--
-- Table structure for table `listed_items`
--

CREATE TABLE `listed_items` (
  `item_id` int(11) NOT NULL,
  `item_description` varchar(45) NOT NULL,
  `item_category` varchar(45) NOT NULL,
  `item_start_price` varchar(45) NOT NULL,
  `item_reserve_price` varchar(45) NOT NULL,
  `item_end_date` varchar(45) NOT NULL,
  `Seller_Accounts_seller_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `seller_accounts`
--

CREATE TABLE `seller_accounts` (
  `seller_id` int(11) NOT NULL,
  `Fullname` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seller_accounts`
--

INSERT INTO `seller_accounts` (`seller_id`, `Fullname`, `Email`, `Password`) VALUES
(2, 'John', 'john@gmail.com', 'john'),
(3, 'Green Wendy', 'greenwendy@gmail.com', 'wendy'),
(4, 'Henry', 'henry@gmail.com', 'henry');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator_accounts`
--
ALTER TABLE `administrator_accounts`
  ADD PRIMARY KEY (`administrator_id`);

--
-- Indexes for table `bids`
--
ALTER TABLE `bids`
  ADD PRIMARY KEY (`bid_id`),
  ADD KEY `Buyer_Accounts_buyer_id` (`Buyer_Accounts_buyer_id`),
  ADD KEY `Listed_Items_item_id` (`Listed_Items_item_id`);

--
-- Indexes for table `buyer_accounts`
--
ALTER TABLE `buyer_accounts`
  ADD PRIMARY KEY (`buyer_id`);

--
-- Indexes for table `listed_items`
--
ALTER TABLE `listed_items`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `Seller_Accounts_seller_id` (`Seller_Accounts_seller_id`);

--
-- Indexes for table `seller_accounts`
--
ALTER TABLE `seller_accounts`
  ADD PRIMARY KEY (`seller_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator_accounts`
--
ALTER TABLE `administrator_accounts`
  MODIFY `administrator_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bids`
--
ALTER TABLE `bids`
  MODIFY `bid_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `buyer_accounts`
--
ALTER TABLE `buyer_accounts`
  MODIFY `buyer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `listed_items`
--
ALTER TABLE `listed_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seller_accounts`
--
ALTER TABLE `seller_accounts`
  MODIFY `seller_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bids`
--
ALTER TABLE `bids`
  ADD CONSTRAINT `bids_ibfk_3` FOREIGN KEY (`Buyer_Accounts_buyer_id`) REFERENCES `buyer_accounts` (`buyer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bids_ibfk_4` FOREIGN KEY (`Listed_Items_item_id`) REFERENCES `listed_items` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `listed_items`
--
ALTER TABLE `listed_items`
  ADD CONSTRAINT `listed_items_ibfk_1` FOREIGN KEY (`Seller_Accounts_seller_id`) REFERENCES `seller_accounts` (`seller_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
