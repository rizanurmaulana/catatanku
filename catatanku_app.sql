-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2024 at 03:17 PM
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
-- Database: `catatanku_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `address` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `user_id`, `name`, `phone`, `address`, `created_at`) VALUES
(1, 1, 'Luki Arianto', '089765654221', 'Dusun Pariuk RT 02 RW 01 Desa Gandasoli', '2024-06-02 04:31:04'),
(3, 1, 'Rizal Sunanda', '0891234567890', 'Dusun Pariuk RT 06 RW 01 Desa Gandasoli', '2024-06-02 03:37:13'),
(4, 1, 'Arif Budiman', '0891234567890', 'Dusun Pariuk RT 05 RW 01 Desa Gandasoli', '2024-06-02 04:27:16'),
(6, 2, 'Alvin Surip', '08977612341', 'Dusun Pariuk RT 04 RW 01 Desa Gandasoli', '2024-06-03 04:25:39'),
(9, 1, 'Dikri Fauzan Amrulloh', '085846946896', 'Dusun Congkleng RT 06 RW 02 Desa Kertayasa', '2024-06-03 09:07:31'),
(10, 1, 'M. Rangga Dwi Saputra', '087123456789', 'Dusun Pariuk RT 03 RW 01 Desa Gandasoli', '2024-06-04 12:28:07');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `id_payment` varchar(255) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `billing_month` varchar(10) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `method` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `id_payment`, `customer_id`, `user_id`, `billing_month`, `total_amount`, `method`, `date`, `created_at`) VALUES
(1, '0123456789', 1, 1, '2024-06', 100000.00, 'tunai', '2024-05-31', '2024-06-03 08:48:34'),
(5, '0206241537443730744171', 3, 2, '2024-07', 100000.00, 'tunai', '2024-06-02', '2024-06-02 08:37:44'),
(7, '030624120102', 6, 1, '2024-07', 100000.00, 'tunai', '2024-06-05', '2024-06-04 12:48:57'),
(8, '030624122505', 6, 1, '2024-08', 100000.00, 'transfer', '2024-06-03', '2024-06-03 05:25:05'),
(11, '030624141229', 1, 1, '2024-01', 100000.00, 'tunai', '2024-06-03', '2024-06-04 12:49:22'),
(13, '030624155355', 6, 1, '2024-01', 100000.00, 'tunai', '2024-06-03', '2024-06-03 08:53:55'),
(14, '030624160855', 9, 1, '2024-01', 100000.00, 'tunai', '2024-06-03', '2024-06-03 09:08:55');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `role` enum('admin','staff') NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `role`, `password`, `created_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '0811234567890', 'admin', '$2y$10$rxAOk8z8LfZ3dowqZBB7nOY4BPHVpTIb3jaueP2ymqtLCTePv1Ixi', '2024-05-31 06:02:32'),
(2, 'Riza Nur Maulana', 'rizanurmaulana@gmail.com', '0891234567890', 'staff', '$2y$10$mSQo.UVOMtWbwbL1NkIC2eIHBT9mSQdz5nIPQvU9t9ABreyhwXah6', '2024-05-31 06:30:09'),
(3, 'Surya Lesmana', 'surya@gmail.com', '0871234567890', 'staff', '$2y$10$VAZ7w7k6sUXcxZCocVgDgOLpmCw9z8eZwUclTY2RRVGv0P8.PgoIG', '2024-06-03 04:32:03'),
(4, 'Esa Gentar Sundava', 'esags@gmail.com', '0851234567890', 'staff', '$2y$10$2IXLec6umljkKNHSQHiga.aDlaQiRHWJVfuTYEKfXtcz5RrEeJste', '2024-06-02 03:54:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`) USING BTREE;

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `payments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
