-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2024 at 09:01 AM
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
-- Database: `realestate`
--

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

CREATE TABLE `agents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'agent',
  `username` varchar(255) NOT NULL,
  `agent_company` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `area` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending',
  `realtron_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agents`
--

INSERT INTO `agents` (`id`, `role`, `username`, `agent_company`, `phone`, `email`, `address`, `city`, `area`, `pincode`, `password`, `profile`, `created_at`, `updated_at`, `status`, `realtron_id`) VALUES
(5, 'agent', 'ganesh', 'G Groups', '1234567890', 'ganesh@gmail.com', 'thandalam', 'chennai', 'saveetha nagar', '204026', '12345678', 'images/1719899287.jpg', '2024-07-02 00:18:07', '2024-07-02 00:18:07', 'pending', 14);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'apartment', '2024-06-03 04:05:36', '2024-06-03 04:05:36'),
(2, 'plots', '2024-06-03 04:06:15', '2024-06-03 04:06:15');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_06_03_084422_create_categories_table', 2),
(6, '2024_06_03_085020_create_categories_table', 3),
(7, '2024_06_06_091315_create_properties_table', 4),
(8, '2024_06_13_042634_create_realtrons_table', 5),
(9, '2024_06_13_062517_create_agents_table', 6),
(10, '2024_06_17_044140_add_realtroncompany_field_to_realtrons', 6),
(11, '2024_06_20_060540_add_fileupload_field_to_realtrons', 7),
(12, '2024_06_21_050853_add_pincode__to__realtrons', 7),
(13, '2024_06_23_153302_create_table_agent_table', 7),
(14, '2024_06_24_033612_create_agent_table', 8),
(15, '2024_06_24_094233_create_realtron_table', 9),
(16, '2024_06_24_094255_create_agent_table', 9),
(17, '2024_06_24_100439_create_realtron_table', 10),
(18, '2024_06_24_101909_create_agent_table', 11),
(19, '2024_06_24_105130_create_realtrons_table', 12),
(20, '2024_06_25_033838_add_password_to__realtrons', 13),
(21, '2024_06_25_044241_add_status_to__realtrons', 14),
(22, '2024_06_25_050322_add_status_to__agent', 15),
(23, '2024_06_25_080558_create_agents_table', 16),
(24, '2024_06_26_031924_add_status_to__agents', 17),
(25, '2024_06_26_032128_add_status_to__agents', 18),
(26, '2024_06_26_092156_add_status_to__users', 19),
(27, '2024_06_27_040249_add_realtron_id_to_agents_table', 20),
(28, '2024_06_28_035855_add_realtron_id_to_users_table', 21),
(29, '2024_07_01_032020_create_sellers_table', 22),
(30, '2024_07_02_052311_add_realtron_id_to_sellers_table', 23);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `property_type` varchar(255) NOT NULL,
  `selling_type` varchar(255) NOT NULL,
  `bhk` varchar(255) NOT NULL,
  `bedroom` varchar(255) NOT NULL,
  `bathroom` varchar(255) NOT NULL,
  `kitchen` varchar(255) NOT NULL,
  `balcony` varchar(255) NOT NULL,
  `hall` varchar(255) NOT NULL,
  `floor` varchar(255) NOT NULL,
  `total_floor` varchar(255) NOT NULL,
  `area_size` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `image1` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL,
  `image3` varchar(255) NOT NULL,
  `image4` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `property_type`, `selling_type`, `bhk`, `bedroom`, `bathroom`, `kitchen`, `balcony`, `hall`, `floor`, `total_floor`, `area_size`, `city`, `state`, `address`, `image1`, `image2`, `image3`, `image4`, `status`, `created_at`, `updated_at`) VALUES
(10, 'Houses', 'Sale', '3 BHK', '1', '2', '1', '2', '3', '3rd Floor', '5 Floors', '23', 'Chittoor', 'Andhra Pradesh', 'Muttukur,chittor', 'properties/1717997291.jpg', 'properties/1717997291.jpg', 'properties/1717997291.jpg', 'properties/1717997291.jpg', 'Available', '2024-06-08 03:54:17', '2024-06-08 03:54:17'),
(11, 'Houses', 'Sale', '1 BHK', '2', '2', '1', '2', '1', '1st Floor', '5 Floors', '12345', 'Chittoor', 'Andhra Pradesh', 'Muttukur,chittor', 'properties/1717997291.jpg', 'properties/1717997291.jpg', 'properties/1717997291.jpg', 'properties/1717997291.jpg', 'Available', '2024-06-09 09:26:45', '2024-06-09 09:26:45'),
(12, 'Houses', 'Sale', '1 BHK', '2', '2', '2', '2', '2', '2nd Floor', '5 Floors', '2', 'Chittoor', 'Andhra Pradesh', 'Muttukur,chittor', 'properties/1717997291.jpg', 'properties/1717997291.jpg', 'properties/1717997291.jpg', 'properties/1717997291.jpg', 'Available', '2024-06-09 09:30:11', '2024-06-09 09:30:11'),
(13, 'Plots', 'Rent', '2 BHK', '3', '2', '1', '2', '2', '2nd Floor', '5 Floors', '23', 'Chittoor', 'Andhra Pradesh', 'Muttukur,chittor', 'properties/1717997291.jpg', 'properties/1717997291.jpg', 'properties/1717997291.jpg', 'properties/1717997291.jpg', 'Sold Out', '2024-06-09 23:48:07', '2024-06-09 23:48:07'),
(14, 'Houses', 'Sale', '1 BHK', '1', '1', '1', '1', '1', '2nd Floor', '5 Floors', '2345678', 'Chittoor', 'Andhra Pradesh', 'Muttukur,chittor', 'properties/1717997291.jpg', 'properties/1717997291.jpg', 'properties/1717997291.jpg', 'properties/1717997291.jpg', 'Available', '2024-06-09 23:52:17', '2024-06-09 23:52:17'),
(15, 'Houses', 'Sale', '2 BHK', '2', '2', '2', '2', '2', '3rd Floor', '5 Floors', '2134', 'Chittoor', 'Andhra Pradesh', 'Muttukur,chittor', 'properties/1717997291.jpg', 'properties/1717997291.jpg', 'properties/1717997291.jpg', 'properties/1717997291.jpg', 'Available', '2024-06-09 23:58:11', '2024-06-09 23:58:11');

-- --------------------------------------------------------

--
-- Table structure for table `realtrons`
--

CREATE TABLE `realtrons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'realtron',
  `username` varchar(255) NOT NULL,
  `realtron_company` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `area` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `bussiness_phone` varchar(255) NOT NULL,
  `age_of_company` varchar(255) NOT NULL,
  `profile` varchar(255) NOT NULL,
  `upload_file` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `realtrons`
--

INSERT INTO `realtrons` (`id`, `role`, `username`, `realtron_company`, `phone`, `email`, `address`, `city`, `area`, `pincode`, `bussiness_phone`, `age_of_company`, `profile`, `upload_file`, `created_at`, `updated_at`, `password`, `status`) VALUES
(11, 'realtron', 'Tharun', 'TP groups', '9087654321', 'tharun@gmail.com', 'Thandalam', 'Chennai', 'Saveetha nagar', '6021054', '6789054321', '3', 'profiles/1719844895.png', 'upload/1719844895.pdf', '2024-07-01 09:11:35', '2024-07-01 09:21:27', '12345678', 'accepted'),
(12, 'realtron', 'Sree', 'S Groups', '9876543210', 'sree@gmail.com', 'Thandalam', 'Chennai', 'Saveetha nagar', '602105', '6785432190', '4', 'profiles/1719845085.png', 'upload/1719845085.pdf', '2024-07-01 09:14:45', '2024-07-01 09:21:33', '12345678', 'accepted'),
(13, 'realtron', 'Kommi', 'K Groups', '9798965432', 'kommi@gmail.com', 'Thandalam', 'Chennai', 'Saveetha nagar', '602105', '6543217898', '3', 'profiles/1719845296.png', 'upload/1719845296.pdf', '2024-07-01 09:18:16', '2024-07-01 09:21:38', '12345678', 'accepted'),
(14, 'realtron', 'Guna', 'G Groups', '9123456780', 'Guna@gmail.com', 'Thandalam', 'Chennai', 'Saveetha nagar', '602105', '6785432104', '6', 'profiles/1719845446.png', 'upload/1719845446.pdf', '2024-07-01 09:20:46', '2024-07-01 09:21:43', '12345678', 'accepted'),
(15, 'realtron', 'sai', 'SS groups', '7890654321', 'sai@gmail.com', 'thandalam', 'chennai', 'saveetha nagar', '204026', '6543210987', '4', 'profiles/1719889629.jpeg', 'upload/1719889629.pdf', '2024-07-01 21:37:09', '2024-07-01 21:37:09', '12345678', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

CREATE TABLE `sellers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `property_address` varchar(255) NOT NULL,
  `property_image` varchar(255) NOT NULL,
  `property_type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `realtron_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sellers`
--

INSERT INTO `sellers` (`id`, `username`, `email`, `phone`, `company_name`, `address`, `property_address`, `property_image`, `property_type`, `created_at`, `updated_at`, `realtron_id`) VALUES
(1, 'kalesha', 'kalesha@gmail.com', '9014835900', 'shaik', 'thandalam', 'saveetha nagar', 'properties/1719894863.png', 'house', '2024-07-01 23:04:23', '2024-07-01 23:04:23', NULL),
(3, 'meena', 'meena@gmail.com', '9876453210', 'TP groups', 'thandalam', 'saveetha nagar', 'properties/1719896414.jpg', 'plot', '2024-07-01 23:30:14', '2024-07-01 23:30:14', NULL),
(4, 'meena', 'meena@gmail.com', '9876453210', 'TP groups', 'thandalam', 'saveetha nagar', 'properties/1719896419.jpg', 'plot', '2024-07-01 23:30:19', '2024-07-01 23:30:19', NULL),
(5, 'meena', 'meena@gmail.com', '9876453210', 'TP groups', 'thandalam', 'saveetha nagar', 'properties/1719896495.jpg', 'plot', '2024-07-01 23:31:35', '2024-07-01 23:31:35', NULL),
(6, 'hlo', 'sush@gmail.com', '9012876534', 'TP groups', 'knytgfv', 'kujyhfgvc', 'properties/1719896899.jpeg', 'plot', '2024-07-01 23:38:19', '2024-07-01 23:38:19', NULL),
(7, 'Sush', 'sush@gmail.com', '9078123456', 'K Groups', 'thandalam', 'saveetha nagar', 'properties/1719898845.jpg', 'apartment', '2024-07-02 00:10:45', '2024-07-02 00:10:45', 13);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `usertype` varchar(255) NOT NULL DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `realtron_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `usertype`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `realtron_id`) VALUES
(1, 'user', 'user@gmail.com', '9014835900', '0', NULL, '$2y$10$YMAuhNS/MwYOnejzP4OVLOT7VC45uRALn7Nl6p8KgLZv9MtYuWIN.', NULL, '2024-06-02 23:21:16', '2024-06-02 23:21:16', NULL),
(2, 'admin', 'admin@gmail.com', '9807612534', '1\n', NULL, '$2y$10$FxSaaYxfVEsF94p1FCwNSOEfPiFJXWar.PLhOGiQBiFev9SbOHAGC', NULL, '2024-06-02 23:21:57', '2024-06-02 23:21:57', NULL),
(10, 'devi', 'devi@gmail.com', '8967045231', '0', NULL, '$2y$10$VCsIBYwvI4tbLut4PEPbJOCKEyikd9zDRPToEhG63DAvU53EVz6i6', NULL, '2024-06-14 01:04:10', '2024-06-14 01:04:10', NULL),
(45, 'Tharun', 'tharun@gmail.com', '9087654321', 'realtron', NULL, '$2y$10$ZFdX0xsoP.nlhNhfmTInVexNAPmPOUJi.WZwYiyFKZulGteajmL2y', NULL, '2024-07-01 09:21:27', '2024-07-01 09:21:27', 11),
(46, 'Sree', 'sree@gmail.com', '9876543210', 'realtron', NULL, '$2y$10$zFsPCVgbeQETxUZmjJ91ceGCj2C0lLcvHWhtAmZ5oEtxyB.Z5nLg.', NULL, '2024-07-01 09:21:34', '2024-07-01 09:21:34', 12),
(47, 'Kommi', 'kommi@gmail.com', '9798965432', 'realtron', NULL, '$2y$10$zjWMxXvdGCXN8CTJN8CXuO8LJYkK2JvUca6d3gVSdAgrI9navpFU2', NULL, '2024-07-01 09:21:38', '2024-07-01 09:21:38', 13),
(48, 'Guna', 'Guna@gmail.com', '9123456780', 'realtron', NULL, '$2y$10$MaOz2pUGnOpgxQRQBWWVweYBBFjp0K.kHKVKPz2OLHAw4UDQ.W1Mi', NULL, '2024-07-01 09:21:43', '2024-07-01 09:21:43', 14);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `agents_realtron_id_foreign` (`realtron_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `realtrons`
--
ALTER TABLE `realtrons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sellers_realtron_id_foreign` (`realtron_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`),
  ADD KEY `users_realtron_id_foreign` (`realtron_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agents`
--
ALTER TABLE `agents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `realtrons`
--
ALTER TABLE `realtrons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `sellers`
--
ALTER TABLE `sellers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `agents`
--
ALTER TABLE `agents`
  ADD CONSTRAINT `agents_realtron_id_foreign` FOREIGN KEY (`realtron_id`) REFERENCES `realtrons` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sellers`
--
ALTER TABLE `sellers`
  ADD CONSTRAINT `sellers_realtron_id_foreign` FOREIGN KEY (`realtron_id`) REFERENCES `realtrons` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_realtron_id_foreign` FOREIGN KEY (`realtron_id`) REFERENCES `realtrons` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
