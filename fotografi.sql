-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 17, 2024 at 07:14 AM
-- Server version: 8.0.36-0ubuntu0.22.04.1
-- PHP Version: 8.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fotografi`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id_booking` int NOT NULL,
  `id_user` int NOT NULL,
  `tanggal` date NOT NULL,
  `alamat` text NOT NULL,
  `id_packet` int NOT NULL,
  `jumlah_pembayaran` int NOT NULL,
  `total_bayar` bigint NOT NULL,
  `kode_booking` varchar(50) NOT NULL,
  `tanggal_booking` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id_booking`, `id_user`, `tanggal`, `alamat`, `id_packet`, `jumlah_pembayaran`, `total_bayar`, `kode_booking`, `tanggal_booking`) VALUES
(6, 8, '2024-06-17', 'bandung, jawa barat', 3, 1, 1200000, '2024061707131626', '2024-06-17 07:13:16');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int NOT NULL,
  `nama` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama`) VALUES
(1, 'Weeding '),
(2, 'Kategori 2'),
(3, 'Kategori 3');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `slug` varchar(150) DEFAULT NULL,
  `icon` varchar(100) DEFAULT NULL,
  `parrent_id` bigint DEFAULT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  `sequence` int DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `slug`, `icon`, `parrent_id`, `role_id`, `sequence`, `created_at`, `updated_at`) VALUES
(1, 'Dashboard', 'dashboard', 'ni ni-tv-2', 0, 1, 1, '2022-06-08 18:44:14', '2022-06-08 18:56:51'),
(2, 'Master Data', 'master-data', 'ni ni-diamond', 0, 1, 2, '2022-06-08 18:55:17', '2022-06-08 18:56:52'),
(3, 'Daftar Paket', 'paket', 'ni ni-bag-17', 2, 1, 2, '2022-06-08 18:56:50', '2024-06-13 14:13:51'),
(4, 'Daftar User', 'users', 'ni ni-circle-08', 0, 1, 5, '2022-06-09 17:56:30', '2022-06-16 15:20:43'),
(5, 'Daftar Transaksi', 'transaksi', 'ni ni-money-coins', 0, 1, 3, '2022-06-09 17:58:57', '2022-06-17 16:18:32'),
(6, 'Dashboard', 'dashboard', 'ni ni-tv-2', 0, 3, 1, '2022-06-09 17:58:57', '2022-06-09 18:03:41'),
(7, 'Daftar Paket', 'paket-c', 'ni ni-bag-17', 0, 3, 2, '2022-06-09 17:58:57', '2022-06-09 18:03:41'),
(8, 'Riwayat Transaksi', 'transaksi-c', 'ni ni-money-coins', 0, 3, 4, '2022-06-09 17:58:57', '2022-06-16 15:16:31'),
(9, 'Jadwal', 'jadwal-c', 'ni ni-calendar-grid-58', 0, 3, 5, '2022-06-09 17:58:57', '2022-06-16 14:15:14'),
(10, 'Booking', 'booking-c', 'ni ni-time-alarm', 0, 3, 3, '2022-06-09 17:58:57', '2022-06-16 14:27:04'),
(11, 'Daftar Jadwal', 'jadwal', 'ni ni-calendar-grid-58', 0, 1, 4, '2022-06-09 17:58:57', '2022-06-16 15:20:51'),
(12, 'Dashboard', 'dashboard', 'ni ni-tv-2', 0, 2, 1, '2022-06-09 17:58:57', '2022-06-09 18:03:41'),
(13, 'Daftar Paket', 'paket-f', 'ni ni-bag-17', 0, 2, 2, '2022-06-09 17:58:57', '2022-06-09 18:03:41'),
(14, 'Jadwal', 'jadwal-f', 'ni ni-calendar-grid-58', 0, 2, 5, '2022-06-09 17:58:57', '2022-06-16 14:15:14'),
(15, 'Laporan', 'laporan', 'ni ni-book-bookmark', 0, 1, 5, '2022-06-09 17:58:57', '2022-06-29 19:42:51'),
(16, 'Hasil Foto', 'hasil-foto-f', 'ni ni-calendar-grid-58', 0, 2, 6, '2022-06-09 17:58:57', '2022-06-16 14:15:14'),
(17, 'Kategori', 'kategori', 'ni ni-bag-17', 2, 1, 1, '2022-06-08 18:56:50', '2022-06-14 16:17:53');

-- --------------------------------------------------------

--
-- Table structure for table `packets`
--

CREATE TABLE `packets` (
  `id_packet` bigint UNSIGNED NOT NULL,
  `packet_name` varchar(150) DEFAULT NULL,
  `id_kategori` int NOT NULL,
  `packet_duration` varchar(150) DEFAULT NULL,
  `packet_price` int UNSIGNED DEFAULT NULL,
  `packet_description` text,
  `membership` varchar(11) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `packets`
--

INSERT INTO `packets` (`id_packet`, `packet_name`, `id_kategori`, `packet_duration`, `packet_price`, `packet_description`, `membership`, `created_at`, `updated_at`) VALUES
(2, 'Paket 2', 1, '6 Hours of Usage', 800000, 'Kostum, 3 Background, 27 Foto, (Original Photo), 15 Foto Edit, 3 Cetak', 'no', '2022-06-14 17:03:43', '2024-06-17 12:09:40'),
(3, 'Paket 3', 2, '10 Hours of Usage', 1200000, 'Kostum, 5 Background, 40 Foto (Original Photo), 20 Foto Edit, 10 Cetak', 'no', '2022-06-14 17:04:46', '2024-06-17 12:09:42'),
(4, 'Paket 4', 2, '10 Hours of Usage', 1800000, 'Kostum, 7 Background, 50 Foto (Original Photo), 25 Foto Edit, Cetak Album', 'no', '2022-06-14 17:05:35', '2024-06-17 12:09:44'),
(5, 'Paket 5', 1, 'Unlimited Shoot', 2500000, 'Kostum, Make up, All Background, 80 Foto (Full HD), 40 Foto Edit, Album Jumbo', 'no', '2022-06-14 17:06:46', '2024-06-17 12:09:46'),
(6, 'Paket 6', 2, 'Unlimited Shoot', 5000000, 'Kostum, Make up, All Background, 110 Foto (Full HD), 60 Foto Edit, Album Jumbo', 'no', '2022-06-14 17:07:33', '2024-06-17 12:09:47');

-- --------------------------------------------------------

--
-- Table structure for table `packet_images`
--

CREATE TABLE `packet_images` (
  `id_packet_images` bigint UNSIGNED NOT NULL,
  `packet_id` bigint UNSIGNED DEFAULT NULL,
  `image_name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packet_images`
--

INSERT INTO `packet_images` (`id_packet_images`, `packet_id`, `image_name`) VALUES
(22, 2, 'Use_Case_Diagram1.jpg'),
(34, 3, 'paket-foto-pernikahan-paket-foto-engagement-jakarta-bogor-depok-Bekasi-tangerang_2-e1631033763330.jpeg'),
(35, 4, 'wedding_dalarna_sophiehakanssonphotography3.jpg'),
(36, 5, 'portofolio_2-800x424-1.jpg'),
(37, 6, '_t6a4051-rkBM2-bTr.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin', '2022-06-08 08:41:40', NULL),
(2, 'Fotografer', 'fotografer', '2022-06-09 11:06:46', NULL),
(3, 'Customer', 'customer', '2022-06-09 11:06:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id_transaction` int NOT NULL,
  `id_booking` int NOT NULL,
  `total_harga` float NOT NULL,
  `status` varchar(60) NOT NULL,
  `data` json DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id_transaction`, `id_booking`, `total_harga`, `status`, `data`) VALUES
(3, 6, 1200000, 'Menunggu Pembayaran', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transactions2`
--

CREATE TABLE `transactions2` (
  `id_transaction` bigint UNSIGNED NOT NULL,
  `packet_id` bigint UNSIGNED NOT NULL,
  `customer_id` bigint UNSIGNED DEFAULT NULL COMMENT 'customer id',
  `booking_code` varchar(20) DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `datetime_fix` datetime DEFAULT NULL,
  `note` text,
  `payment_image` varchar(50) DEFAULT NULL,
  `payment_date` datetime DEFAULT NULL,
  `payment_validation_at` datetime DEFAULT NULL,
  `payment_validation_by` bigint UNSIGNED DEFAULT NULL,
  `photographer_id` bigint UNSIGNED DEFAULT NULL,
  `photographer_take_booking` datetime DEFAULT NULL,
  `photographer_finish_confirm` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaction_images`
--

CREATE TABLE `transaction_images` (
  `id_transaction_image` bigint UNSIGNED NOT NULL,
  `transaction_id` bigint UNSIGNED NOT NULL,
  `image_name` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `hp` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  `status` bigint DEFAULT '0',
  `images` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `hp`, `remember_token`, `role_id`, `status`, `images`, `created_at`, `updated_at`) VALUES
(1, 'Ahmad Fatoni 123', 'admin@gmail.com', NULL, '$2y$10$UFcHvhQLBZxdLT69jXnc3uQ94yDw1EiD4zA7/o5.ZTS4UMFPtlsqW', '089676490971', NULL, 1, 1, '8d7cce30957206cd83a26b986052f5c4.png', '2022-06-08 08:42:08', NULL),
(3, 'Melani', 'fotografer@gmail.com', NULL, '$2y$10$UFcHvhQLBZxdLT69jXnc3uQ94yDw1EiD4zA7/o5.ZTS4UMFPtlsqW', '0881912738123', NULL, 2, 1, '404bb8b63c9f2637a44bf01e9b5c11e6.jpg', '2022-06-08 08:42:08', NULL),
(8, 'Ilham Taufik', 'customer@gmail.com', NULL, '$2y$10$UFcHvhQLBZxdLT69jXnc3uQ94yDw1EiD4zA7/o5.ZTS4UMFPtlsqW', '08815925920', NULL, 3, 1, '98a17bdf0919701abfd1d236d1b1374a.png', '2022-06-28 13:06:58', NULL),
(9, 'Sopoline Cross', 'lejo@mailinator.com', NULL, '$2y$10$UjXzprOSoohYAN/j4GrXRubHnS07Dj3JwdFlWzgicRbRvrlpSbt9.', '34', NULL, 3, 1, NULL, '2024-06-17 05:03:42', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id_booking`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_menus` (`role_id`);

--
-- Indexes for table `packets`
--
ALTER TABLE `packets`
  ADD PRIMARY KEY (`id_packet`);

--
-- Indexes for table `packet_images`
--
ALTER TABLE `packet_images`
  ADD PRIMARY KEY (`id_packet_images`),
  ADD KEY `id_packet_fk` (`packet_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`slug`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id_transaction`);

--
-- Indexes for table `transactions2`
--
ALTER TABLE `transactions2`
  ADD PRIMARY KEY (`id_transaction`),
  ADD KEY `trx_user_id_fk` (`customer_id`),
  ADD KEY `trx_packet_fk` (`packet_id`);

--
-- Indexes for table `transaction_images`
--
ALTER TABLE `transaction_images`
  ADD PRIMARY KEY (`id_transaction_image`),
  ADD KEY `images_transaction_id_fk` (`transaction_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `roles_users` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id_booking` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `packets`
--
ALTER TABLE `packets`
  MODIFY `id_packet` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `packet_images`
--
ALTER TABLE `packet_images`
  MODIFY `id_packet_images` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id_transaction` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transactions2`
--
ALTER TABLE `transactions2`
  MODIFY `id_transaction` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaction_images`
--
ALTER TABLE `transaction_images`
  MODIFY `id_transaction_image` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `role_menus` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `packet_images`
--
ALTER TABLE `packet_images`
  ADD CONSTRAINT `id_packet_fk` FOREIGN KEY (`packet_id`) REFERENCES `packets` (`id_packet`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transactions2`
--
ALTER TABLE `transactions2`
  ADD CONSTRAINT `trx_packet_fk` FOREIGN KEY (`packet_id`) REFERENCES `packets` (`id_packet`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trx_user_id_fk` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaction_images`
--
ALTER TABLE `transaction_images`
  ADD CONSTRAINT `images_transaction_id_fk` FOREIGN KEY (`transaction_id`) REFERENCES `transactions2` (`id_transaction`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `roles_users` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
