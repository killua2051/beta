-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2020 at 02:40 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `document_creation`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `middle_name`, `last_name`, `email`, `password`, `department_id`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'admin', 'admin', 'admin', 'admin@gmail.com', '$2y$10$02BrIHh242v8RgXI6DGJC.DKSmEm98bAkYM70uJqggJtBIPLBr9tC', '1', 1, 'XtSwwWn7IKLBgAPnR02erxm6UZhw3K5ojVzGUCi9xgES068nLbYOlIuVJHUJ', '2019-09-18 00:13:18', '2019-09-18 00:13:18'),
(6, 'quality', 'qa', 'assurance', 'qa@gmail.com', '$2y$10$zcmMKRhu2sIm1nozI6wnTOUTY7pBXCtFxCJFa1oYSyJ3oVc7lOsri', '2', 3, 'Ler2tMwDN8HecQeDxKgDx0NylkMGZ213s4J8pTcpYc9pGKt4mpMe8QCKXO5w', '2019-09-18 00:13:18', '2019-09-18 00:13:18'),
(7, 'File Holder', 'FH', 'Holder', 'fileholder@gmail.com', '$2y$10$zcmMKRhu2sIm1nozI6wnTOUTY7pBXCtFxCJFa1oYSyJ3oVc7lOsri', '2', 4, 'lm6kconmeDuB0kxjAl8WCKz3lK2ka86mrIThPqPEyfd96LXhBZOr4pU6XKY3', '2019-09-18 00:13:18', '2019-09-18 00:13:18');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
