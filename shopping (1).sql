-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2021 at 08:38 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`) VALUES
(1, 'rings'),
(2, 'necklaces'),
(3, 'bracelets'),
(4, 'earnings'),
(5, 'pendants');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` enum('action','cancelled','completed','inaction','accepted') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `date`, `status`) VALUES
(7, 23, '2021-09-26 14:47:16', 'cancelled'),
(8, 23, '2021-09-26 14:45:06', 'cancelled'),
(9, 23, '2021-09-26 18:43:02', 'accepted'),
(10, 23, '2021-09-26 23:04:14', 'accepted'),
(11, 23, '2021-09-26 23:39:25', 'accepted'),
(12, 23, '2021-09-27 14:54:45', 'accepted');

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`id`, `order_id`, `product_id`, `quantity`) VALUES
(41, 7, 24, 1),
(42, 7, 16, 1),
(43, 7, 10, 1),
(44, 7, 7, 1),
(45, 8, 12, 1),
(46, 8, 14, 1),
(47, 8, 11, 1),
(48, 8, 10, 1),
(49, 9, 14, 1),
(50, 9, 15, 1),
(51, 10, 25, 1),
(52, 11, 15, 1),
(53, 11, 25, 1),
(54, 12, 32, 1),
(55, 12, 14, 1);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `payment_id` varchar(255) NOT NULL,
  `payer_id` varchar(255) NOT NULL,
  `payer_email` varchar(255) NOT NULL,
  `amount` float(10,2) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `img` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  `discount` float NOT NULL DEFAULT 1,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `img`, `quantity`, `price`, `discount`, `category_id`) VALUES
(7, 'Marny Sandoval', 'Impedit inventore e', '16821712381632335190.jpeg', 90, 885, 33, 2),
(9, 'Gage Castillo', 'Voluptas quas esse Voluptas quas esse Voluptas quas esse', '2818311821632500320.jpeg', 272, 169, 20, 3),
(10, 'Idola Norris', 'Animi modi et atque Animi modi et atque Animi modi et atque', '20346638031632500344.jpeg', 51, 149, 30, 4),
(11, 'Beverly Hoffman', 'Pariatur Eu qui inc', '12353608871632500406.png', 144, 169, 30, 5),
(12, 'Erasmus Rose', 'Excepteur et volupta', '21131171991632500431.jpeg', 449, 69, 11, 5),
(13, 'Herman Mckenzie', 'Quia dolorem labore', '17756591501632500469.jpeg', 577, 416, 12, 5),
(14, 'Shelby Doyle', 'Sint ipsum voluptatSint ipsum voluptat Sint ipsum voluptat Sint ipsum voluptat', '15383813611632500494.jpeg', 50, 895, 13, 2),
(15, 'Kuame Hood', 'Doloribus non simili Doloribus non simili Doloribus non simili', '282876701632500522.jpeg', 420, 497, 10, 2),
(16, 'Addison Leonard', 'Omnis delectus volu', '6511783111632500536.jpeg', 769, 167, 9, 3),
(17, 'Bevis Knowles', 'Consectetur consecte', '17353840251632500555.jpeg', 499, 794, 0, 1),
(18, 'Erica Woodard', 'Omnis quia in nihil Omnis quia in nihil Omnis quia in nihil', '14682337951632500579.jpeg', 535, 92, 4, 4),
(19, 'Dacey Christensen', 'Quaerat dolor deseru Quaerat dolor deseru Quaerat dolor deseru', '15074736301632500615.jpeg', 968, 927, 5, 5),
(20, 'Candace Carrillo', 'Mollitia  Mollitia et quibusda Mollitia et quibusda et quibusda', '14477045771632500643.jpeg', 441, 967, 6, 3),
(21, 'Callie Vega', 'Quo sed maxime repre', '6948087071632500665.jpeg', 568, 288, 7, 2),
(22, 'Vivian Cox', 'Dolor aut culpa magn', '7729713301632500705.jpeg', 582, 977, 9, 2),
(23, 'Mary Watts', 'Architecto at minima Architecto at minima Architecto at minima', '1512802121632500807.jpeg', 454, 897, 10, 3),
(24, 'Benedict Flowers', 'Exercitation repelle Exercitation repelle Exercitation repelle', '14297751091632500880.jpeg', 217, 999, 34, 1),
(25, 'Galvin Richard', 'Non ut voluptatum cu Non ut voluptatum cu Non ut voluptatum cu', '17162202441632500902.jpeg', 647, 886, 35, 1),
(26, 'Holly Tran', 'Sit cumque dolore ip', '15172198921632639936.jpeg', 632, 18, 2, 1),
(27, 'Lesley Tyson', 'Eligendi labore aute', '19688174301632639958.jpeg', 12, 423, 3, 1),
(28, 'Nathan Hill', 'Eos magna cillum pe', '7923773621632639975.jpeg', 170, 765, 4, 1),
(29, 'Ruby French', 'Quia consectetur inc', '6378047311632639999.png', 146, 698, 5, 5),
(30, 'Bevis Davidson', 'Nihil sint est obcae', '12578717091632640015.jpeg', 953, 276, 1, 4),
(31, 'Tyrone Mcconnell', 'Rerum atque optio c', '10782699471632640037.jpeg', 189, 385, 2, 5),
(32, 'product', 'Minim aperiam ullam', '18539346111632747066.png', 744, 685, 10, 4);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `review` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `user_id`, `product_id`, `review`) VALUES
(1, 1, 7, 'Aliquam quia qui rer Aliquam quia qui rer Aliquam quia qui rer Aliquam quia qui rer Aliquam quia qui rer Aliquam quia qui rer');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `title` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `title`) VALUES
(1, 'admin'),
(2, 'user'),
(8, 'Iphone se');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(35) NOT NULL,
  `role_id` int(11) NOT NULL,
  `detail_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `role_id`, `detail_id`) VALUES
(1, 'sara', 'sami', 'admin@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', 1, 2),
(23, 'sara', 'sami', 'sarasami@gmail.com', 'dc0fa7df3d07904a09288bd2d2bb5f40', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_detail`
--

CREATE TABLE `user_detail` (
  `id` int(11) NOT NULL,
  `governorate` varchar(40) NOT NULL DEFAULT '-',
  `city` varchar(40) NOT NULL DEFAULT '-',
  `extra_data` text NOT NULL,
  `phone` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_detail`
--

INSERT INTO `user_detail` (`id`, `governorate`, `city`, `extra_data`, `phone`) VALUES
(1, 'cairo', 'nasr city', '', ''),
(2, 'elsharqia', 'zagazig', '', ''),
(6, '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `detail_id` (`detail_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `user_detail`
--
ALTER TABLE `user_detail`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user_detail`
--
ALTER TABLE `user_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `productCart` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `userCart` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `userOrder` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_item`
--
ALTER TABLE `order_item`
  ADD CONSTRAINT `orderItem` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orderProduct` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `userpayment` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `productCategory` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `reviewProduct` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `userReview` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `detailForUser` FOREIGN KEY (`detail_id`) REFERENCES `user_detail` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `userRole` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
