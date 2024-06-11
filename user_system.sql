-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2024 at 03:15 PM
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
-- Database: `user_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `monitors`
--

CREATE TABLE `monitors` (
  `monitor_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `brand` varchar(100) NOT NULL,
  `model` varchar(100) NOT NULL,
  `screen_size` float NOT NULL,
  `resolution` varchar(50) NOT NULL,
  `refresh_rate` int(11) NOT NULL,
  `panel_type` varchar(50) NOT NULL,
  `aspect_ratio` varchar(10) NOT NULL,
  `response_time` float NOT NULL,
  `brightness` int(11) NOT NULL,
  `contrast_ratio` varchar(20) NOT NULL,
  `ports` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock_quantity` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `monitors`
--

INSERT INTO `monitors` (`monitor_id`, `product_id`, `brand`, `model`, `screen_size`, `resolution`, `refresh_rate`, `panel_type`, `aspect_ratio`, `response_time`, `brightness`, `contrast_ratio`, `ports`, `price`, `stock_quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 'Brand A', 'Model X1', 24.5, '1920x1080', 144, 'IPS', '16:9', 1.5, 300, '1000:1', 'HDMI, DisplayPort, USB', 299.99, 10, '2024-06-09 13:42:41', '2024-06-09 13:42:41'),
(2, 2, 'Brand B', 'Model Y2', 27, '2560x1440', 165, 'TN', '16:9', 1, 350, '1000:1', 'HDMI, DisplayPort', 399.99, 8, '2024-06-09 13:42:41', '2024-06-09 13:42:41'),
(3, 3, 'Brand C', 'Model Z3', 32, '3840x2160', 60, 'VA', '16:9', 4, 400, '3000:1', 'HDMI, DisplayPort, USB-C', 499.99, 5, '2024-06-09 13:42:41', '2024-06-09 13:42:41');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `image_url`, `created_at`) VALUES
(1, 'პროცესორი', 'პროცესორი', 97.00, './images/Corei5.jpg', '2024-06-02 13:09:24'),
(2, 'Asus rog 27x', 'monitori monitori', 357.00, './images/logo.png', '2024-06-02 13:49:12'),
(3, 'monitor1', 'for test', 210.00, '', '2024-06-02 13:58:00'),
(4, 'Test2', 'Test2 description', 97.00, 'https://upload.wikimedia.org/wikipedia/commons/d/de/Intel_Core_i5_750_1.jpg', '2024-06-02 14:03:52'),
(5, 'gapros monitori', 'Gapros dakawruli monitori', 600.00, './images/BG.jpg', '2024-06-04 08:16:38');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `purchase_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `purchase_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`purchase_id`, `user_id`, `product_id`, `quantity`, `total_price`, `purchase_date`) VALUES
(1, 2, 1, 3, 291.00, '2024-06-08 14:21:14'),
(2, 2, 2, 1, 357.00, '2024-06-08 14:23:36'),
(3, 2, 1, 1, 97.00, '2024-06-08 14:25:23'),
(4, 2, 2, 1, 357.00, '2024-06-08 14:25:23'),
(5, 2, 5, 1, 600.00, '2024-06-08 14:25:23'),
(6, 14, 1, 3, 291.00, '2024-06-08 21:24:06'),
(7, 14, 3, 2, 420.00, '2024-06-08 21:24:06'),
(8, 14, 2, 1, 357.00, '2024-06-08 21:24:06');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `rating` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `message`, `image_url`, `rating`, `created_at`) VALUES
(1, 'Luka Gulverdashvili', 'warmatebebi <3, kargi xalxi xart, kargi delivery gaqvt, momavalshi ufro did warmatebas gisurvebt.', './images/profile.png', 5, '2024-06-05 15:05:19'),
(2, 'Peter Lee', 'I have tried a lot of food delivery services but Plate is something out of this world! Their food is really healthy and it tastes great, which is why I recommend this company to all my friends!', 'https://livedemo00.template-help.com/wt_62267_v8/prod-20823-one-service/images/testimonials-01-179x179.png', 3, '2024-06-05 15:07:21'),
(3, 'Jane Smith', 'warmatebebi <3, kargi xalxi xart, kargi delivery gaqvt, momavalshi ufro did warmatebas gisurvebt. tqvens momaval axal start-upebs gauamrjos!!!', 'https://livedemo00.template-help.com/wt_62267_v8/prod-20823-one-service/images/testimonials-03-179x179.png', 5, '2024-06-05 15:10:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','admin') DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`) VALUES
(1, 'nikoloz31', 'nikoloz31@gmail.com', '123456', 'user'),
(2, 'gulverda', 'gulverda@gmail.com', '$2y$10$AqD3W2LWQGZQiYDAbYtvGePqOdwVa4Dp6ItfHeQW6WSKSA5JBqyAG', 'admin'),
(3, 'Dudael', 'dudael@gmail.com', '$2y$10$PY9DgHwifKwYmRYItQF0YevEvwuCfSvn7W2kgKyLYVncAZGvBawzC', 'user'),
(6, 'Dvala54', 'dvala54@gmail.com', '$2y$10$OK05Dqv/TnQX8xuwlLHy4OPoc5Wa6gQZnk3Pm744mjy6D/u.Wh4EW', 'user'),
(7, 'niko12', 'niko33@gmail.com', '$2y$10$KpAFbkod5gA36/0Q0iOFjO6CXMgXPd7i19hWeUM7Z6tJUfDuBDUXe', 'user'),
(8, 'liza4', 'liza@gmail.com', '$2y$10$1TqojL1iz73G3ZNSXjfcIe9r9r00nHLT2gFzf7THo4d/cl5Y/feGC', 'user'),
(9, 'salosalo', 'salosalo@gau.edu.ge', '$2y$10$EH0pZBqGoCXzTVIhErOI2.ZgNe/mHv79CzGqgh8h1LUxanOeq/TJu', 'user'),
(10, 'goga37', 'goga37@gmail.com', '$2y$10$L/MdFAgiSe0eYCALyC75VuTBwzXxS8BgySZxj/8WNkwWta6Ecj1Bi', 'user'),
(11, 'yazo13', 'yazo13@gmail.com', '$2y$10$mkCvoR2XIUK7mShM1uVba..oNO4kHFyJyBxcmU6gTDbseluIhzk92', 'user'),
(12, 'lizi555', 'lizi@gmail.com', '$2y$10$QvE1b4.9GNHuojGIIAcFUex78S/0MoC9Hx3OmRRYB.LwOEOp.BCaS', 'user'),
(14, 'Gulverda54', 'lukagulverdashvili49@gmail.com', '$2y$10$3IFI1FfrLAMxoXQCzR.mc.WN2WEp81.FmZzhTwUL6m58z1nCWXmTe', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `monitors`
--
ALTER TABLE `monitors`
  ADD PRIMARY KEY (`monitor_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`purchase_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
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
-- AUTO_INCREMENT for table `monitors`
--
ALTER TABLE `monitors`
  MODIFY `monitor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `monitors`
--
ALTER TABLE `monitors`
  ADD CONSTRAINT `monitors_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `purchases_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `purchases_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
