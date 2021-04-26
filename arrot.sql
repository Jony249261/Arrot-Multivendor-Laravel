-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2021 at 12:29 PM
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
-- Database: `arrot2`
--

-- --------------------------------------------------------

--
-- Table structure for table `billings`
--

CREATE TABLE `billings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `bill_amount` double(16,2) NOT NULL,
  `due_date` date DEFAULT NULL,
  `payment_status` enum('paid','unpaid','partials') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'partials',
  `payment_amount` double(16,2) NOT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `check_issue_date` date NOT NULL,
  `check_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `check_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `buyer_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `billings`
--

INSERT INTO `billings` (`id`, `order_id`, `bill_amount`, `due_date`, `payment_status`, `payment_amount`, `payment_type`, `check_issue_date`, `check_number`, `bank_name`, `check_photo`, `user_id`, `buyer_id`, `created_at`, `updated_at`) VALUES
(1, 1, 620.00, NULL, 'partials', 500.00, 'check', '2021-04-19', '3454', 'Islami Bank Bangladesh', '1698096522078981.png', 4, 'BUYER-001', '2021-04-26 03:57:20', '2021-04-26 03:57:20'),
(2, 1, 620.00, NULL, 'partials', 20.00, 'check', '2021-04-23', '123456', 'Islami Bank Bangladesh', '1698096557216539.png', 4, 'BUYER-001', '2021-04-26 03:57:53', '2021-04-26 03:57:53');

-- --------------------------------------------------------

--
-- Table structure for table `buyers`
--

CREATE TABLE `buyers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `buyer_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buyer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buyer_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buyer_website` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buyer_telephone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buyer_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buyer_passport` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buyer_nid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `br_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `br_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `br_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport_expire_date` date DEFAULT NULL,
  `br_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buyer_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trade_license` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expire_date` date NOT NULL,
  `buyer_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tagline` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buyers`
--

INSERT INTO `buyers` (`id`, `buyer_id`, `buyer_name`, `buyer_address`, `buyer_website`, `buyer_telephone`, `buyer_email`, `buyer_passport`, `buyer_nid`, `br_name`, `br_email`, `br_phone`, `passport_expire_date`, `br_image`, `buyer_type`, `trade_license`, `expire_date`, `buyer_logo`, `tagline`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'BUYER-001', 'Buyer', 'Pabna', 'azizul.intels.co', '01738040305', 'buyer@gmail.com', '1203948', '23456789', 'Azizul', 'azizul@gmail.com', '12345678765', '2021-04-30', '1698094842524639.jpg', 'non_profit', '1698094842099968.png', '2021-05-08', '1698094842331082.png', 'Nothing', 2, '2021-04-26 03:30:38', '2021-04-26 03:30:38');

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
(38, '2014_10_12_000000_create_users_table', 1),
(39, '2014_10_12_100000_create_password_resets_table', 1),
(40, '2019_08_19_000000_create_failed_jobs_table', 1),
(41, '2021_04_19_084646_create_buyers_table', 1),
(42, '2021_04_19_090121_create_products_table', 1),
(43, '2021_04_19_100727_create_product_prices_table', 1),
(44, '2021_04_20_032217_create_sellers_table', 1),
(45, '2021_04_20_041007_create_units_table', 1),
(46, '2021_04_21_082033_create_orders_table', 1),
(47, '2021_04_21_082659_create_order_products_table', 1),
(48, '2021_04_22_071752_create_billings_table', 1),
(49, '2021_04_24_091654_create_purchases_table', 1),
(50, '2021_04_24_091838_create_purchase_products_table', 1),
(51, '2021_04_25_062959_create_seller_proposes_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `buyer_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_date` date DEFAULT NULL,
  `amount` double(16,2) DEFAULT NULL,
  `status` enum('pending','received','accepted','processing','rejected','completed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `payment_status` enum('paid','unpaid','partials') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unpaid',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `buyer_id`, `delivery_date`, `amount`, `status`, `payment_status`, `created_at`, `updated_at`) VALUES
(1, 2, 'BUYER-001', '2021-04-29', NULL, 'received', 'partials', '2021-04-26 03:35:58', '2021-04-26 03:57:20');

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `qty` double(8,2) NOT NULL,
  `unite_price` double(8,2) DEFAULT NULL,
  `delivered_qty` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`id`, `product_id`, `order_id`, `qty`, `unite_price`, `delivered_qty`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 5.00, 100.00, 4.00, '2021-04-26 03:35:58', '2021-04-26 03:48:55'),
(2, 3, 1, 2.00, 60.00, 2.00, '2021-04-26 03:35:59', '2021-04-26 03:48:55');

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
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_id` bigint(20) UNSIGNED NOT NULL,
  `product_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_id`, `product_name`, `product_type`, `unit_id`, `product_description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'vegetable-000', 'Dimond Alu', 'vegetable', 2, 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum et Malorum for use in a type specimen book.', '1698094022672770.jpg', '2021-04-26 03:17:36', '2021-04-26 03:17:36'),
(2, 'vegetable-001', 'Supper Dim', 'vegetable', 1, 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum et Malorum for use in a type specimen book.', '1698094085023673.jpg', '2021-04-26 03:18:35', '2021-04-26 03:18:35'),
(3, 'vegetable-001', 'Rice', 'vegetable', 2, 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum et Malorum for use in a type specimen book.', '1698094111050301.jpg', '2021-04-26 03:19:00', '2021-04-26 03:19:00'),
(4, 'vegetable-001', 'Oil', 'vegetable', 3, 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought to have scrambled parts of Cicero\'s De Finibus Bonorum et Malorum for use in a type specimen book.', '1698094138701894.jpg', '2021-04-26 03:19:27', '2021-04-26 03:19:27');

-- --------------------------------------------------------

--
-- Table structure for table `product_prices`
--

CREATE TABLE `product_prices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `updated_date` date DEFAULT NULL,
  `purchase_rate` double(16,2) DEFAULT NULL,
  `sales_rate` double(16,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_prices`
--

INSERT INTO `product_prices` (`id`, `product_id`, `updated_date`, `purchase_rate`, `sales_rate`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL, 20.00, '2021-04-26 03:17:36', '2021-04-26 03:17:36'),
(2, 2, NULL, NULL, 8.00, '2021-04-26 03:18:35', '2021-04-26 03:18:35'),
(3, 3, NULL, NULL, 60.00, '2021-04-26 03:19:00', '2021-04-26 03:19:00'),
(4, 4, NULL, NULL, 100.00, '2021-04-26 03:19:27', '2021-04-26 03:19:27');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `seller_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `purchase_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipment_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_products`
--

CREATE TABLE `purchase_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `seller_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `purchase_qnty` int(10) UNSIGNED NOT NULL,
  `purchase_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

CREATE TABLE `sellers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `seller_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seller_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seller_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seller_website` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seller_telephone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seller_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seller_passport` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seller_nid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sr_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sr_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sr_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `passport_expire_date` date DEFAULT NULL,
  `sr_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `seller_proposes`
--

CREATE TABLE `seller_proposes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seller_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Pice', '2021-04-26 03:15:48', '2021-04-26 03:15:48'),
(2, 'KG', '2021-04-26 03:16:00', '2021-04-26 03:16:00'),
(3, 'LITER', '2021-04-26 03:16:27', '2021-04-26 03:16:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `buyer_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seller_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verification_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_verified` int(11) NOT NULL DEFAULT 0,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `buyer_id`, `seller_id`, `name`, `email`, `phone`, `role`, `password`, `image`, `verification_code`, `is_verified`, `parent_id`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 'AZIZUL ISLAM', 'supplier@gmail.com', NULL, 'supplier', '$2y$10$kMeBW/gYBzwgHZAJoYYFG.LVkkBjsrUIIvJbEqLqf9Ac52JVqRv6G', NULL, NULL, 0, NULL, NULL, NULL, '2021-04-26 03:14:18', '2021-04-26 03:14:18'),
(2, 'BUYER-001', NULL, 'Buyer', 'buyer@gmail.com', '01738040305', 'buyer', '$2y$10$hiUi4nl.KwnaBe0iIfQg6.KMHanNFyWa8EXLu7XQJ3Ug/ZqrmOMe2', '1698094841943149.jpg', NULL, 0, NULL, NULL, NULL, '2021-04-26 03:30:38', '2021-04-26 03:30:38'),
(3, 'BUYER-001', NULL, 'Warehouse', 'war@gmail.com', '01738040305', 'warehouse', '$2y$10$VdTTQsq55MCHycx5VjlTX.0vvjFhglVQj9lC.wfxrH3o2Dz3hpwPu', '1698095791200167.jpg', NULL, 0, 2, NULL, NULL, '2021-04-26 03:45:43', '2021-04-26 03:45:43'),
(4, 'BUYER-001', NULL, 'Accounts', 'account@gmail.com', '01738040305', 'accounts', '$2y$10$NgGBVMgdO85mcHMbN2E7wuvRMNA796nKGi1PpoxIJqxQ1vnEa9l0K', '1698096375741178.jpg', NULL, 0, 2, NULL, NULL, '2021-04-26 03:55:00', '2021-04-26 03:55:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `billings`
--
ALTER TABLE `billings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buyers`
--
ALTER TABLE `buyers`
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
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
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
-- Indexes for table `product_prices`
--
ALTER TABLE `product_prices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_products`
--
ALTER TABLE `purchase_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seller_proposes`
--
ALTER TABLE `seller_proposes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `billings`
--
ALTER TABLE `billings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `buyers`
--
ALTER TABLE `buyers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_prices`
--
ALTER TABLE `product_prices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_products`
--
ALTER TABLE `purchase_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sellers`
--
ALTER TABLE `sellers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seller_proposes`
--
ALTER TABLE `seller_proposes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
