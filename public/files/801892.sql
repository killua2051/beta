-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2020 at 04:32 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


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

--
-- Dumping data for table `editable_files`
--

INSERT INTO `editable_files` (`id`, `file_id`, `form_id`, `file_holder_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 7, 5, '2019-09-18 19:07:15', '2019-09-18 19:07:15'),
(5, 1, 3, 7, 4, '2019-09-20 01:03:35', '2019-09-20 01:03:35'),
(6, 1, 6, 7, 4, '2019-09-23 23:53:22', '2019-09-23 23:53:22'),
(7, 1, 5, 7, 5, '2019-09-24 01:36:27', '2019-09-24 01:36:27'),
(8, 3, 4, 7, 5, '2019-09-24 19:05:17', '2019-09-24 19:05:17'),
(9, 6, 7, 7, 5, '2019-09-26 22:09:07', '2019-09-26 22:09:07'),
(10, 4, 8, 7, 5, '2019-09-30 22:42:51', '2019-09-30 22:42:51'),
(11, 4, 10, 7, 5, '2019-10-02 18:46:32', '2019-10-02 18:46:32'),
(12, 4, 10, 7, 5, '2019-10-02 18:48:44', '2019-10-02 18:48:44'),
(13, 10, 11, 7, 5, '2019-10-07 22:11:19', '2019-10-07 22:11:19'),
(14, 4, 12, 7, 5, '2019-10-10 17:39:52', '2019-10-10 17:39:52'),
(15, 5, 12, 7, 5, '2019-10-15 17:38:31', '2019-10-15 17:38:31');

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

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `form_id`, `user_id`, `approver_id`, `reviewer_id`, `approved_date`, `reviewed_date`, `file_title`, `file_path`, `file_status`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 4, 0, '2019-09-08 16:00:00', '0000-00-00 00:00:00', '04582019082700094.pdf', '04582019082700094.pdf', 2, '2019-09-18 17:08:08', '2019-09-27 22:05:15'),
(2, 3, 5, 0, 0, '2019-09-25 16:00:00', '0000-00-00 00:00:00', 'MOA_APC_PCSHS_signed.pdf', 'MOA_APC_PCSHS_signed.pdf', 1, '2019-09-20 19:25:09', '2019-09-25 19:44:21'),
(3, 3, 5, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'MOA_APC_PCSHS_signed.pdf', 'MOA_APC_PCSHS_signed.pdf', 1, '2019-09-20 19:27:55', '2019-09-20 19:27:55'),
(4, 6, 5, 6, 0, '2019-09-25 16:00:00', '0000-00-00 00:00:00', 'MOU_APC_Microsoft_signed', 'MOU_APC_Microsoft_signed.pdf', 3, '2019-09-24 22:08:22', '2019-09-30 00:29:14'),
(5, 5, 5, 6, 0, '2019-09-25 16:00:00', '0000-00-00 00:00:00', 'Sample Document 03', 'QPMF1 CRF_v2.pdf', 3, '2019-09-24 22:31:20', '2019-09-30 00:21:36'),
(6, 1, 4, 0, 0, '0000-00-00 00:00:00', '2019-09-29 16:00:00', '04582019082700094.pdf', '04582019082700094.pdf', 3, '2019-09-18 17:08:08', '2019-09-23 22:32:13'),
(7, 7, 5, 4, 0, '2019-09-30 16:00:00', '2019-09-26 16:00:00', 'Sample Document 11', 'Senior High School Brochure.pdf', 1, '2019-09-26 23:34:04', '2019-09-30 21:00:04'),
(8, 8, 5, 0, 0, '2019-09-30 16:00:00', '2019-09-30 16:00:00', 'Sample Document 12', 'Senior High School Brochure.pdf', 6, '2019-09-30 22:57:57', '2019-09-30 23:59:40'),
(9, 8, 5, 4, 0, '2019-09-30 16:00:00', '2019-09-30 16:00:00', 'Sample Document 12', '258885.pdf', 4, '2019-10-01 00:27:00', '2019-10-01 00:28:41'),
(10, 10, 5, 0, 0, '2019-10-07 16:00:00', '0000-00-00 00:00:00', 'Sample Document 14', '830444.pdf', 3, '2019-10-02 19:11:44', '2019-10-02 19:11:44'),
(11, 9, 5, 4, 6, '2019-10-02 19:37:08', '2019-10-02 22:13:59', 'Sample Document 13', '135145.pdf', 5, '2019-10-02 19:37:08', '2019-10-02 22:13:59'),
(12, 11, 5, 0, 0, '2019-10-07 23:37:50', '2019-10-07 23:37:50', 'Sample Document 16', '232641.pdf', 3, '2019-10-07 23:37:50', '2019-10-07 23:37:50'),
(13, 12, 5, 0, 0, '2019-10-10 18:26:52', '2019-10-10 18:26:52', 'Sample Document 17', '455515.pdf', 3, '2019-10-10 18:26:52', '2019-10-10 18:26:52'),
(14, 12, 5, 4, 0, '2019-10-15 17:46:50', '2019-10-15 17:46:50', 'Sample Document 17', '481839.docx', 4, '2019-10-15 17:46:50', '2019-10-15 17:53:10');

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

--
-- Dumping data for table `forms`
--

INSERT INTO `forms` (`id`, `user_id`, `approver_id`, `reviewer_id`, `crf_number_id`, `form_status`, `form_doc_code`, `form_doc_title`, `form_version_number`, `form_new_version`, `form_effective_date`, `form_nature_request`, `form_classification`, `form_new_effective_date`, `form_parts`, `file_version`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 1, 1111, 2, '00abc', 'APC Document 01', '1', '1', '2019-09-18', 'Obsolete', 'Procedures Manual (PM)', '2019-09-26', 'Sample test', 0, '2019-09-24 16:00:00', '2019-09-30 02:17:47'),
(3, 5, 1, 1, 1, 3, '0', 'Sample Document', '1.0', '1.1', '2019-09-26', 'Revision', 'Quality Policy Manual (QPM)', '2019-10-25', 'Document Parts', 0, '2019-09-18 19:55:17', '2019-09-20 19:27:55'),
(4, 5, 1, 1, 1, 2, '0', 'Sample Document 02', '1.0', '1.0', '2019-09-26', 'Obsolete', 'Procedures Manual (PM)', '2019-09-26', 'Sample Document', 0, '2019-09-18 22:36:06', '2019-09-24 19:05:17'),
(5, 5, 1, 1, 0, 5, '0', 'Sample Document 03', '1.0', '1.1', '2019-09-20', 'Revision', 'Procedures Manual (PM)', '2019-09-27', 'Sample Document 3 revision.', 0, '2019-09-19 18:07:30', '2019-09-30 00:21:36'),
(6, 5, 1, 1, 0, 5, '0', 'Sample Document', '2.0', '2.0', '2019-09-24', 'Revision', 'Quality Policy Manual (QPM)', '2019-09-25', 'Sample Document Revision', 0, '2019-09-23 23:12:45', '2019-09-30 00:29:14'),
(7, 5, 1, 0, 0, 4, '0', 'Sample Document 11', '1.0', '1.0', '2019-09-26', 'Obsolete', 'Quality Policy Manual (QPM)', '2019-09-28', 'New document', 0, '2019-09-26 19:45:17', '2019-09-30 17:12:22'),
(8, 5, 1, 1, 0, 4, '0', 'Sample Document 12', '1.0', '1.0', '2019-10-01', 'Revision', 'Procedures Manual (PM)', '2019-11-01', 'Sample document 12', 0, '2019-09-30 22:23:56', '2019-10-01 00:28:41'),
(9, 5, 1, 1, 0, 5, '0', 'Sample Document 13', '1.0', '1.0', '2019-10-01', 'Obsolete', 'Procedures Manual (PM)', '2019-11-02', 'New Document', 0, '2019-09-30 22:25:28', '2019-10-02 22:13:59'),
(10, 5, 0, 0, 0, 3, '0', 'Sample Document 14', '1.0', '1.0', '2019-10-03', 'Obsolete', 'Procedures Manual (PM)', '2019-11-02', 'Sample Document 14', 0, '2019-10-02 18:11:24', '2019-10-02 19:11:44'),
(11, 5, 0, 0, 0, 3, '0', 'Sample Document 16', '1.0', '1.0', '2019-10-08', 'Obsolete', 'Quality Policy Manual (QPM)', '2019-10-31', 'Sample Document 16', 0, '2019-10-07 18:37:36', '2019-10-07 23:37:50'),
(12, 5, 4, 0, 0, 4, '0', 'Sample Document 17', '1.0', '1.0', '2019-10-11', 'Obsolete', 'Quality Policy Manual (QPM)', '2019-11-01', 'Sample Document 17', 0, '2019-10-10 17:27:08', '2019-10-15 17:53:10'),
(13, 5, 0, 0, 0, 1, '0', 'Sample Document 14', '1.0', '2.0', '2019-10-16', 'Revision', 'Quality Policy Manual (QPM)', '2019-10-30', 'Sample Document 14', 0, '2019-10-15 18:31:57', '2019-10-15 18:31:57'),
(14, 5, 1, 1, 1, 5, '0.1 OPE-IPO-EMP-PMUSRGUID', 'APC QMS Procedures Manual\r\nUser’s Guide', '1.0', '', '2011-08-11', 'Obsolete', 'Procedures Manual (PM)', '0000-00-00', '', 1, '2011-07-31 16:00:00', '2011-07-31 16:00:00');

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
(13, '2019_07_30_063912_create_editable_files_table', 2);

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
(4, 'admin', 'admin', 'admin', 'admin@gmail.com', '$2y$10$02BrIHh242v8RgXI6DGJC.DKSmEm98bAkYM70uJqggJtBIPLBr9tC', '1', 1, 'XtSwwWn7IKLBgAPnR02erxm6UZhw3K5ojVzGUCi9xgES068nLbYOlIuVJHUJ', '2019-09-18 00:13:18', '2019-09-18 00:13:18'),
(5, 'author', 'author', 'author', 'author@gmail.com', '$2y$10$8TnpasHpEfVN45C3JyAva.NF4YKKeAdwI6uYheD9xISw3DyXAOUZm', '1', 2, '4CHg5ocQtpm5CWZRoYmmewEdbFCANmx4CGNyJIbGdx72quWjvgR4XvvsOuWT', '2019-09-18 00:13:18', '2019-09-18 00:13:18'),
(6, 'quality', 'qa', 'assurance', 'qa@gmail.com', '$2y$10$zcmMKRhu2sIm1nozI6wnTOUTY7pBXCtFxCJFa1oYSyJ3oVc7lOsri', '2', 3, 'Ler2tMwDN8HecQeDxKgDx0NylkMGZ213s4J8pTcpYc9pGKt4mpMe8QCKXO5w', '2019-09-18 00:13:18', '2019-09-18 00:13:18'),
(7, 'File Holder', 'FH', 'Holder', 'fileholder@gmail.com', '$2y$10$zcmMKRhu2sIm1nozI6wnTOUTY7pBXCtFxCJFa1oYSyJ3oVc7lOsri', '2', 4, 'lm6kconmeDuB0kxjAl8WCKz3lK2ka86mrIThPqPEyfd96LXhBZOr4pU6XKY3', '2019-09-18 00:13:18', '2019-09-18 00:13:18');

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
