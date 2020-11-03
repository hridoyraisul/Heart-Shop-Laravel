-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2020 at 08:22 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `heartshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_description`, `publication_status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Shirt', '<p>Shirt</p>', 1, '2020-08-08 15:34:17', '2020-08-11 08:43:46', NULL),
(2, 'Pant', '<p>pant</p>', 1, '2020-08-08 15:34:32', '2020-08-08 15:34:32', NULL),
(3, 'T-Shirt', '<p>tshirt</p>', 1, '2020-08-08 15:34:46', '2020-08-08 15:34:46', NULL),
(4, 'Trouser', '<p>trouser</p>', 1, '2020-08-08 15:34:58', '2020-08-08 15:34:58', NULL),
(5, 'Panjabi', '<p>panjabi</p>', 1, '2020-08-08 15:35:10', '2020-08-08 15:35:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `first_name`, `last_name`, `email_address`, `phone_number`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Oshim', 'Tara', 'Oshimtara@gmail.com', '01947337261', '$2y$10$95aNaSpaZEdHulq6djdzB.wZgkbTgS51K2lLTi15adNp7Jme66Wum', '2020-08-08 15:57:41', '2020-08-08 15:57:41'),
(2, 'Ashrafee', 'Rakhi', 'rakhibubt58@gmail.com', '01637964818', '$2y$10$OYIjbCvfpnAaLq4kic8WGOBY/t9f0fV39ZTbihC7t2UUPMbBFWMJW', '2020-08-11 08:30:25', '2020-08-11 08:30:25');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_06_22_112527_create_categories_table', 1),
(5, '2020_06_23_154729_create_products_table', 1),
(6, '2020_07_02_115554_create_customers_table', 1),
(7, '2020_07_04_001630_create_shippings_table', 1),
(8, '2020_07_04_025313_create_orders_table', 1),
(9, '2020_07_04_025457_create_order_details_table', 1),
(11, '2020_08_09_114001_create_wishlists_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `shipping_id` int(11) NOT NULL,
  `total_price` double(10,2) NOT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `shipping_id`, `total_price`, `payment_type`, `order_status`, `payment_status`, `created_at`, `updated_at`) VALUES
(2, 2, 2, 2540.00, 'Cash', 'Pending', 'Pending', '2020-08-11 08:37:43', '2020-08-11 08:37:43'),
(3, 2, 3, 4650.00, 'Cash', 'Pending', 'Pending', '2020-08-19 08:55:11', '2020-08-19 08:55:11'),
(4, 2, 3, 4650.00, 'Cash', 'Pending', 'Pending', '2020-08-19 08:57:13', '2020-08-19 08:57:13');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` double(10,2) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `product_name`, `product_image`, `product_price`, `product_quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 15, 'Silk Black Panjabi', '15.jpg', 1600.00, 5, '2020-08-08 15:59:12', '2020-08-08 15:59:12'),
(2, 2, 11, 'Mate Green Trouser', '11.jpg', 940.00, 1, '2020-08-11 08:37:43', '2020-08-11 08:37:43'),
(3, 2, 15, 'Silk Black Panjabi', '15.jpg', 1600.00, 1, '2020-08-11 08:37:43', '2020-08-11 08:37:43'),
(4, 3, 14, 'Black Panjabi', '14.jpg', 1450.00, 1, '2020-08-19 08:55:11', '2020-08-19 08:55:11'),
(5, 3, 15, 'Silk Black Panjabi', '15.jpg', 1600.00, 2, '2020-08-19 08:55:12', '2020-08-19 08:55:12');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Product_short_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `Product_long_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default_image.jpg',
  `publication_status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_category`, `Product_short_description`, `Product_long_description`, `product_price`, `product_image`, `publication_status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Stylish White Shirt', 'Shirt', 'Shirt', '<p>ShirtShirtShirtShirtShirtShirtShirtShirtShirtShirtShirtShirtShirtShirt&nbsp;ShirtShirtShirtShirtShirtShirtShirt&nbsp;ShirtShirtShirt</p>', 1200, '1.jpg', 1, '2020-08-08 15:38:34', '2020-08-08 15:39:28', NULL),
(2, 'green Trouser', 'Trouser', 'Trouser', '<p>TrouserTrouserTrouserTrouserTrouserTrouser&nbsp;TrouserTrouserTrouserTrouserTrouserTrouser&nbsp;TrouserTrouserTrouserTrouser</p>', 600, '2.jpg', 1, '2020-08-08 15:39:18', '2020-08-08 15:40:12', NULL),
(3, 'Jins Pant - Blue', 'Pant', 'jins pant', '<p>jins pantjins pantjins pantjins pantjins pant&nbsp;jins pantjins pantjins pantjins pant&nbsp;jins pantjins pantjins pantjins pantjins pant</p>', 1500, '3.jpg', 1, '2020-08-08 15:41:07', '2020-08-08 15:41:07', NULL),
(4, 'Mate Green Mobile Pant', 'Pant', 'Mobile Pant', '<p>&nbsp;Mobile Pant&nbsp;Mobile Pant&nbsp;Mobile PantMobile Pant&nbsp;Mobile Pant&nbsp;Mobile Pant&nbsp;Mobile Pant&nbsp;Mobile Pant&nbsp;Mobile Pant&nbsp;Mobile PantMobile Pant&nbsp;Mobile PantMobile Pant&nbsp;Mobile Pant&nbsp;Mobile PantMobile Pant&nbsp;Mobile Pant&nbsp;Mobile Pant&nbsp;Mobile Pant&nbsp;Mobile Pant&nbsp;Mobile Pant&nbsp;Mobile PantMobile Pant&nbsp;Mobile PantMobile Pant&nbsp;Mobile Pant&nbsp;Mobile PantMobile Pant&nbsp;Mobile Pant&nbsp;Mobile Pant&nbsp;Mobile Pant&nbsp;Mobile Pant&nbsp;Mobile Pant&nbsp;Mobile PantMobile Pant&nbsp;Mobile PantMobile Pant&nbsp;Mobile Pant&nbsp;Mobile PantMobile Pant&nbsp;Mobile Pant&nbsp;Mobile Pant&nbsp;Mobile Pant&nbsp;Mobile Pant&nbsp;Mobile Pant&nbsp;Mobile PantMobile Pant&nbsp;Mobile Pant</p>', 1050, '4.jpg', 1, '2020-08-08 15:42:17', '2020-08-08 15:42:17', NULL),
(5, 'Black T-Shirt', 'T-Shirt', 'T-Shirt', '<p>T-ShirtT-ShirtT-ShirtT-ShirtT-ShirtT-ShirtT-ShirtT-ShirtT-ShirtT-ShirtT-ShirtT-ShirtT-ShirtT-ShirtT-ShirtT-ShirtT-Shirt&nbsp;T-ShirtT-ShirtT-ShirtT-ShirtT-ShirtT-Shirt</p>', 400, '5.png', 1, '2020-08-08 15:43:10', '2020-08-08 15:43:10', NULL),
(6, 'Red T-Shirt', 'T-Shirt', 'T-Shirt', '<p>T-ShirtT-ShirtT-ShirtT-ShirtT-ShirtT-ShirtT-ShirtT-ShirtT-ShirtT-Shirt</p>', 420, '6.jpg', 1, '2020-08-08 15:43:37', '2020-08-08 15:43:37', NULL),
(7, 'White T-Shirt', 'T-Shirt', 'T-Shirt', '<p>T-ShirtT-ShirtT-ShirtT-ShirtT-ShirtT-ShirtT-ShirtT-ShirtT-ShirtT-Shirt</p>', 350, '7.jpg', 1, '2020-08-08 15:44:09', '2020-08-08 15:44:09', NULL),
(8, 'Yellow T-Shirt', 'T-Shirt', 'T-Shirt', '<p>T-ShirtT-ShirtT-ShirtT-ShirtT-ShirtT-ShirtT-ShirtT-ShirtT-ShirtT-ShirtT-ShirtT-ShirtT-ShirtT-ShirtT-ShirtT-ShirtT-ShirtT-ShirtT-ShirtT-Shirt</p>', 350, '8.jpg', 1, '2020-08-08 15:44:49', '2020-08-08 15:44:49', NULL),
(9, 'Gabaddin Pant', 'Pant', 'Gabaddin Pant', '<p>Gabaddin PantGabaddin PantGabaddin PantGabaddin PantGabaddin PantGabaddin PantGabaddin PantGabaddin PantGabaddin PantGabaddin Pant</p>', 800, '9.jpg', 1, '2020-08-08 15:45:34', '2020-08-08 15:45:34', NULL),
(10, 'Gray Trouser', 'Trouser', 'Gray Trouser', '<p>Gray TrouserGray TrouserGray TrouserGray TrouserGray TrouserGray TrouserGray TrouserGray TrouserGray TrouserGray TrouserGray Trouser</p>', 750, '10.jpg', 1, '2020-08-08 15:46:15', '2020-08-08 15:46:16', NULL),
(11, 'Mate Green Trouser', 'Trouser', 'Mate Green Trouser', '<p>Mate Green TrouserMate Green TrouserMate Green TrouserMate Green TrouserMate Green TrouserMate Green TrouserMate Green TrouserMate Green TrouserMate Green TrouserMate Green TrouserMate Green TrouserMate Green TrouserMate Green TrouserMate Green Trouser</p>', 940, '11.jpg', 1, '2020-08-08 15:47:04', '2020-08-08 15:47:04', NULL),
(12, 'Red Panjabi', 'Panjabi', 'Red Panjabi', '<p>Red PanjabiRed PanjabiRed PanjabiRed PanjabiRed PanjabiRed PanjabiRed PanjabiRed PanjabiRed PanjabiRed Panjabi</p>', 1500, '12.jpeg', 1, '2020-08-08 15:47:52', '2020-08-08 15:47:52', NULL),
(13, 'Gabadin Pant - Formal', 'Pant', 'Pant - Formal', '<p>Pant - FormalPant - FormalPant - FormalPant - FormalPant - FormalPant - FormalPant - FormalPant - FormalPant - FormalPant - FormalPant - FormalPant - FormalPant - Formal</p>', 750, '13.jpg', 1, '2020-08-08 15:51:46', '2020-08-08 15:51:46', NULL),
(14, 'Black Panjabi', 'Panjabi', 'Black Panjabi', '<p>Black PanjabiBlack PanjabiBlack PanjabiBlack PanjabiBlack PanjabiBlack PanjabiBlack PanjabiBlack PanjabiBlack Panjabi</p>', 1450, '14.jpg', 1, '2020-08-08 15:52:19', '2020-08-08 15:52:19', NULL),
(15, 'Silk Black Panjabi', 'Panjabi', 'Silk Black Panjabi', '<p>Silk Black PanjabiSilk Black PanjabiSilk Black PanjabiSilk Black PanjabiSilk Black PanjabiSilk Black PanjabiSilk Black PanjabiSilk Black PanjabiSilk Black PanjabiSilk Black Panjabi</p>', 1600, '15.jpg', 1, '2020-08-08 15:52:53', '2020-08-11 08:46:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shippings`
--

INSERT INTO `shippings` (`id`, `full_name`, `email_address`, `phone_number`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Oshim Tara', 'Oshimtara@gmail.com', '01947337261', 'Mazar Road, Dhaka 1216', '2020-08-08 15:59:09', '2020-08-08 15:59:09'),
(2, 'Tonmoy', 'tonmoy1163@gmail.com', '0168575998', 'mirpur 10', '2020-08-11 08:36:03', '2020-08-11 08:36:03'),
(3, 'Tonmoy', 'tonmoy1163@gmail.com', '0168575998', 'mirpur 10', '2020-08-19 08:54:59', '2020-08-19 08:54:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Raisul Hridoy', 'raisulhridoy@hotmail.com', NULL, '$2y$10$q5JsWkky02FYyBnvRXduk.9JeSE1Y4/Rz7n1nWCXYbQCiUHK9G17i', 'cqV8lxIwUfHieRRyo6g7eDpFO3biReQPzMJdw1NwAxT811DDB76YQnyDM2OS', '2020-08-08 15:33:50', '2020-08-08 15:33:50'),
(2, 'Rakhi', 'rakhibubt58@gmail.com', NULL, '$2y$10$LiEnCSxCVw/UWiGRgdlpFuef61TODwPf0YV.7kBHSuBzEaB.fOLhC', 'RwrmrH8bXyxV8Qv6dqfrsG1lUAFkOvhcJRUKkwtzzCcWtPikqqAEdYBByENC', '2020-08-11 08:40:34', '2020-08-11 08:40:34'),
(3, 'Tonmoy', 'tonmoy@gmail.com', NULL, '$2y$10$qHjOQRNXWtqae35Fy9gYwejfPxmpQvOTcHsPfGI7EznF3B/lo8xZy', NULL, '2020-08-25 16:53:46', '2020-08-25 16:53:46');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `customer_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 1, 15, '2020-08-09 13:53:40', '2020-08-09 13:53:40'),
(2, 1, 11, '2020-08-09 14:02:15', '2020-08-09 14:02:15'),
(3, 2, 11, '2020-08-11 08:31:44', '2020-08-11 08:31:44');

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
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
