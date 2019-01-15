-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jan 14, 2019 at 04:13 AM
-- Server version: 5.6.38
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(100) NOT NULL,
  `cat_item` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_item`) VALUES
(1, 'Gen1'),
(2, 'Gen2'),
(3, 'Gen3'),
(4, 'Gen4'),
(5, 'Gen5');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(10) NOT NULL,
  `customer_ip` varchar(255) NOT NULL,
  `customer_name` text NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_pass` varchar(100) NOT NULL,
  `customer_country` text NOT NULL,
  `customer_city` text NOT NULL,
  `customer_contact` varchar(255) NOT NULL,
  `customer_image` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(100) NOT NULL,
  `product_cat` int(100) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_price` decimal(4,2) NOT NULL,
  `product_desc` text NOT NULL,
  `product_image` text NOT NULL,
  `product_keywords` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `product_title`, `product_price`, `product_desc`, `product_image`, `product_keywords`) VALUES
(0, 2, 'Cyndaquil', '7.99', 'Flamewheel attack is the best thing that ever happened to me!', 'cyndaquil.jpg', 'fire'),
(1, 1, 'Bulbasaur', '4.98', 'The poison grass pokemon. ', 'bulbasaur.jpg', 'grass, poison'),
(2, 1, 'Butterfree', '5.20', 'A pink Butterfree!', 'butterfree.jpeg', 'bug, flying'),
(3, 1, 'Charmandar', '6.99', 'Fire on the tail', 'charmandar.jpeg', 'fire'),
(4, 1, 'Flareon', '5.99', 'One pokemon with endless forms!', 'flareon.jpeg', 'normal'),
(6, 3, 'Treecko', '9.59', 'Treecko has small hooks on the bottom of its feet that enable it to scale vertical walls. This Pokémon attacks by slamming foes with its thick tail.', 'treecko.jpg', 'grass'),
(7, 3, 'Torchic', '8.99', 'Torchic has a place inside its body where it keeps its flame. Give it a hug—it will be glowing with warmth. This Pokémon is covered all over by a fluffy coat of down.', 'torchic.jpg', 'fire'),
(8, 2, 'Totodile', '7.89', 'Its powerful, well-developed jaws are capable of crushing anything. Even its Trainer must be careful.', 'totodile.jpeg', 'water'),
(9, 1, 'Dragonite', '99.99', 'It flies over raging seas as if they were nothing. Observing this, a ship’s captain dubbed this Pokémon “the sea incarnate.”', 'dragonite.jpg', 'dragon, flying'),
(10, 4, 'Bidoof', '0.00', 'The best HM slave there is! In fact its free!', 'bidoof.jpg', 'normal'),
(11, 2, 'Teddiura', '33.00', 'Cuddly, lovely, snuggly, fluffy bear to love...!', 'teddiursa.jpg', 'normal'),
(12, 1, 'Squirtle', '5.49', 'Turtles are known for their longevity, but also known for their squirrely squirrels.', 'squirtle.jpg', 'water'),
(14, 1, 'Pikachu', '42.00', 'Fire or Thunder? You choose!', 'charizardpikachu.jpg', 'fire, thunder');

-- --------------------------------------------------------

--
-- Table structure for table `s_cart`
--

CREATE TABLE `s_cart` (
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `pqty` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `s_cart`
--
ALTER TABLE `s_cart`
  ADD PRIMARY KEY (`p_id`),
  ADD UNIQUE KEY `p_id` (`p_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
