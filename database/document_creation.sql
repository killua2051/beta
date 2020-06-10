-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2020 at 12:48 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `approvers`
--

CREATE TABLE `approvers` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `approvers`
--

INSERT INTO `approvers` (`id`, `user_id`, `department_id`, `created_at`, `updated_at`) VALUES
(1, 4, 1, '2019-10-04 16:00:00', '2019-10-04 16:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(10) UNSIGNED NOT NULL,
  `departments_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `departments_name`, `created_at`, `updated_at`) VALUES
(1, 'ITRO', '2019-09-18 00:20:14', '2019-09-18 00:20:14'),
(2, 'QMS', '2019-09-18 00:20:14', '2019-09-18 00:20:14');

-- --------------------------------------------------------

--
-- Table structure for table `editable_files`
--

CREATE TABLE `editable_files` (
  `id` int(10) UNSIGNED NOT NULL,
  `file_id` int(11) NOT NULL,
  `form_id` int(11) NOT NULL,
  `file_holder_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(10) UNSIGNED NOT NULL,
  `form_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `approver_id` int(11) NOT NULL,
  `reviewer_id` int(11) NOT NULL,
  `approved_date` timestamp NULL DEFAULT NULL,
  `reviewed_date` timestamp NULL DEFAULT NULL,
  `file_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `file_holders`
--

CREATE TABLE `file_holders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `file_statuses`
--

CREATE TABLE `file_statuses` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file_statuses`
--

INSERT INTO `file_statuses` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'REQUESTING', 'Your change request form is for review.', '2019-10-01 16:00:00', '2019-10-01 16:00:00'),
(2, 'FOR REVISION', 'Your change request form has been approved, you can download the file for update.', '2019-10-01 16:00:00', '2019-10-01 16:00:00'),
(3, 'FOR APPROVE', 'Your document is now for approve.', '2019-10-01 16:00:00', '2019-10-01 16:00:00'),
(4, 'FOR REVIEW', 'Your document has been approved by your superior, it is now for review.', '2019-10-01 16:00:00', '2019-10-01 16:00:00'),
(5, 'REVIEWED', 'Your document has been reviewed.', '2019-10-01 16:00:00', '2019-10-01 16:00:00'),
(6, 'DECLINED', 'Your file has been decline by your superior.', '2019-10-01 16:00:00', '2019-10-01 16:00:00'),
(7, 'DECLINED', 'Your file has been decline by the QA.', '2019-10-01 16:00:00', '2019-10-01 16:00:00'),
(8, 'DECLINED', 'Your change request form has been decline by the file holder.', '2019-10-01 16:00:00', '2019-10-01 16:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `forms`
--

CREATE TABLE `forms` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `approver_id` int(11) NOT NULL,
  `reviewer_id` int(11) NOT NULL,
  `crf_number_id` int(11) NOT NULL,
  `form_status` int(11) NOT NULL,
  `form_doc_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `form_doc_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `form_version_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `form_new_version` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `form_effective_date` date NOT NULL,
  `form_nature_request` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `form_classification` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `form_new_effective_date` date NOT NULL,
  `form_parts` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_version` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_07_30_064016_create_departments_table', 1),
(4, '2019_08_13_064138_create_forms_table', 1),
(5, '2019_09_18_060121_create_files_table', 1),
(6, '2019_09_18_060328_create_crf_numbers_table', 1),
(7, '2019_09_18_061813_create_approvers_table', 1),
(8, '2019_09_18_062346_create_efiles_table', 1),
(9, '2019_09_18_063049_create_reviewers_table', 1),
(10, '2019_09_18_063152_create_file_holders_table', 1),
(11, '2019_09_18_063451_create_to_approve_files_table', 1),
(12, '2019_09_18_063515_create_to_review_files_table', 1),
(13, '2019_07_30_063912_create_editable_files_table', 2),
(14, '2020_05_17_085448_create_notifications_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` int(10) UNSIGNED NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_id`, `notifiable_type`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('3080a399-c751-471e-8df8-d11c30388714', 'App\\Notifications\\filenotif', 4, 'App\\User', '[\"\"]', NULL, '2020-05-17 00:56:40', '2020-05-17 00:56:40'),
('a5b062c1-4e6e-4ff2-bb1e-5a9935531107', 'App\\Notifications\\filenotif', 6, 'App\\User', '[\"\"]', NULL, '2020-05-17 00:58:42', '2020-05-17 00:58:42');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `user_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviewers`
--

CREATE TABLE `reviewers` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviewers`
--

INSERT INTO `reviewers` (`id`, `user_id`, `department_id`, `created_at`, `updated_at`) VALUES
(1, 6, 2, '2019-10-04 16:00:00', '2019-10-04 16:00:00'),
(2, 6, 2, '2019-10-04 16:00:00', '2019-10-04 16:00:00');

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
(4, 'Reviewing Authority', 'admin', 'admin', 'admin@gmail.com', '$2y$10$02BrIHh242v8RgXI6DGJC.DKSmEm98bAkYM70uJqggJtBIPLBr9tC', '1', 1, '5oMXGTo7aaDx2vmQnd6NPSR5CQKj07VampnPef88eAicDQ63ZEArUGCFJ5Rl', '2019-09-18 00:13:18', '2019-09-18 00:13:18'),
(5, 'Approving Authority', 'author', 'author', 'author@gmail.com', '$2y$10$8TnpasHpEfVN45C3JyAva.NF4YKKeAdwI6uYheD9xISw3DyXAOUZm', '2', 2, 'CkMLduNnlPFabSny43LuvldvSIcbplDKbOtbiXYa3qEYldTWhLN4Q7KN21QH', '2019-09-18 00:13:18', '2019-09-18 00:13:18'),
(6, 'Quality Assurance', 'qa', 'assurance', 'qa@gmail.com', '$2y$10$zcmMKRhu2sIm1nozI6wnTOUTY7pBXCtFxCJFa1oYSyJ3oVc7lOsri', '2', 3, '1HsnRD8zX03GeK8OD3j5sA5U1MXQRPpn7NejM0dvbYTGCQ3qxKGjta7YkyJs', '2019-09-18 00:13:18', '2019-09-18 00:13:18'),
(7, 'File Holder', 'FH', 'Holder', 'fileholder@gmail.com', '$2y$10$zcmMKRhu2sIm1nozI6wnTOUTY7pBXCtFxCJFa1oYSyJ3oVc7lOsri', '2', 4, 'CUdoBCLK9CHihAZZPxKChfYZduBHYLRq38z7aMIrjDmfajF5zpjPqJjNk18C', '2019-09-18 00:13:18', '2019-09-18 00:13:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `approvers`
--
ALTER TABLE `approvers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `editable_files`
--
ALTER TABLE `editable_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `file_holders`
--
ALTER TABLE `file_holders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `file_statuses`
--
ALTER TABLE `file_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forms`
--
ALTER TABLE `forms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_id_notifiable_type_index` (`notifiable_id`,`notifiable_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_user_email_index` (`user_email`);

--
-- Indexes for table `reviewers`
--
ALTER TABLE `reviewers`
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
-- AUTO_INCREMENT for table `approvers`
--
ALTER TABLE `approvers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `editable_files`
--
ALTER TABLE `editable_files`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `file_holders`
--
ALTER TABLE `file_holders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `file_statuses`
--
ALTER TABLE `file_statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `forms`
--
ALTER TABLE `forms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `reviewers`
--
ALTER TABLE `reviewers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
