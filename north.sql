-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2019 at 02:55 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `north`
--

-- --------------------------------------------------------

--
-- Table structure for table `agreements`
--

CREATE TABLE `agreements` (
  `id` int(11) NOT NULL,
  `emp_id` varchar(20) NOT NULL,
  `agreement` varchar(50) NOT NULL,
  `old_agreement` varchar(250) DEFAULT NULL,
  `status` enum('A','D') DEFAULT 'A',
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agreements`
--

INSERT INTO `agreements` (`id`, `emp_id`, `agreement`, `old_agreement`, `status`, `created_at`, `updated_at`) VALUES
(3, '3', '13375.pdf', '13375.pdf', 'A', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categorys`
--

CREATE TABLE `categorys` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `categoryname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categorys`
--

INSERT INTO `categorys` (`id`, `categoryname`) VALUES
(1, 'Category'),
(2, 'Category1');

-- --------------------------------------------------------

--
-- Table structure for table `codeofconduct`
--

CREATE TABLE `codeofconduct` (
  `id` int(11) NOT NULL,
  `emp_id` varchar(50) NOT NULL,
  `coc_agreement` varchar(100) NOT NULL,
  `old_coc` varchar(100) NOT NULL,
  `status` enum('A','D') NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `codeofconduct`
--

INSERT INTO `codeofconduct` (`id`, `emp_id`, `coc_agreement`, `old_coc`, `status`) VALUES
(1, '1', '67344.pdf', '43882.pdf', 'D'),
(2, '2', '37398.pdf', '', 'D'),
(3, '3', '36616.pdf', '', 'D');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(11) NOT NULL,
  `companyname` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `companyname`, `created_at`, `updated_at`) VALUES
(1, 'Test1', '2019-12-27 09:16:37', '0000-00-00 00:00:00'),
(2, 'Test2', '2019-12-27 09:16:37', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `employee_details`
--

CREATE TABLE `employee_details` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `dob` varchar(20) DEFAULT NULL,
  `personalemail` varchar(100) NOT NULL,
  `phone_no` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `workemail` varchar(50) DEFAULT NULL,
  `profile_pic` varchar(100) DEFAULT NULL,
  `marital_status` varchar(20) DEFAULT NULL,
  `no_ofchildren` varchar(20) DEFAULT NULL,
  `family_inarea` varchar(20) DEFAULT NULL,
  `spclfamilycircumstace` varchar(50) DEFAULT NULL,
  `prsnl_belief` varchar(20) DEFAULT NULL,
  `known_medical_conditions` varchar(20) DEFAULT NULL,
  `allergies` varchar(50) DEFAULT NULL,
  `dietiary_restricons` varchar(50) DEFAULT NULL,
  `known_health_concerns` varchar(50) DEFAULT NULL,
  `aversion_phyactivity` varchar(50) DEFAULT NULL,
  `emergency_contact_name` varchar(50) DEFAULT NULL,
  `reltn_emergency_contact` varchar(50) DEFAULT NULL,
  `emergency_contact_phone` varchar(50) DEFAULT NULL,
  `emergency_contact_email` varchar(50) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_details`
--

INSERT INTO `employee_details` (`id`, `firstname`, `lastname`, `dob`, `personalemail`, `phone_no`, `address`, `workemail`, `profile_pic`, `marital_status`, `no_ofchildren`, `family_inarea`, `spclfamilycircumstace`, `prsnl_belief`, `known_medical_conditions`, `allergies`, `dietiary_restricons`, `known_health_concerns`, `aversion_phyactivity`, `emergency_contact_name`, `reltn_emergency_contact`, `emergency_contact_phone`, `emergency_contact_email`, `updated_at`, `created_at`) VALUES
(1, 'amit', 'tiwari', '2019-12-26', 'amit@gmail.com', '8369152973', '102/B wing milap', NULL, '30236.docx', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-26 05:17:11', '2019-12-26 05:17:11'),
(2, 'Ashish', 'yadav', '2019-12-24', 'asish@gmail.com', '123456789', '102/B', NULL, '66097.docx', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-26 05:23:15', '2019-12-26 05:23:15'),
(3, 'junaid', 'shaikh', '2019-12-12', 'junaid12@gmail.com', '99949469', NULL, NULL, '80217.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-28 01:30:34', '2019-12-28 01:30:34'),
(4, 'viny', 'tiwari', '2019-12-15', 'viny@gmail.com', '9004895688', 'B/102', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'fghghfgh', 'fghgfdh', 'fghdt', 'gfhhgh', '2019-12-31 06:14:27', '2019-12-31 03:24:00'),
(5, 'ajit', 'pandayy', '2019-12-14', 'ajit@gmail.com', '987456123', 'b101', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-31 06:16:05', '2019-12-31 06:16:05'),
(7, 'priyanhka', 'priya', '2019-12-21', 'priya@gmail.com', '1', 'sadsfxvd', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-31 06:30:45', '2019-12-31 06:30:45'),
(8, 'priyanhka', 'priya', '2019-12-21', 'priya12345@gmail.com', '1', 'sadsfxvd', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-31 06:31:37', '2019-12-31 06:31:37');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `emp_id` text COLLATE utf8mb4_unicode_ci,
  `company` text COLLATE utf8mb4_unicode_ci,
  `category` text COLLATE utf8mb4_unicode_ci,
  `purchase` text COLLATE utf8mb4_unicode_ci,
  `project` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `date` text COLLATE utf8mb4_unicode_ci,
  `receipt` text COLLATE utf8mb4_unicode_ci,
  `billable` text COLLATE utf8mb4_unicode_ci,
  `received_auth` text COLLATE utf8mb4_unicode_ci,
  `subtotal` text COLLATE utf8mb4_unicode_ci,
  `gst` text COLLATE utf8mb4_unicode_ci,
  `pst` text COLLATE utf8mb4_unicode_ci,
  `total` text COLLATE utf8mb4_unicode_ci,
  `status` text COLLATE utf8mb4_unicode_ci,
  `delete_status` text COLLATE utf8mb4_unicode_ci,
  `_token` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `emp_id`, `company`, `category`, `purchase`, `project`, `description`, `date`, `receipt`, `billable`, `received_auth`, `subtotal`, `gst`, `pst`, `total`, `status`, `delete_status`, `_token`, `created_at`, `updated_at`) VALUES
(2, '1', '2', '1', '1', '1', 'Faiz Khan', '2019-12-19', NULL, 'on', NULL, '100', '101', '10', '001', 'A', NULL, 'Uo4lXBppSg0j4VveOLZA5mLuaF0lC3PmNPsoNzus', NULL, '2019-12-31 01:16:07'),
(3, '1', '2', '1', '1', '1', 'faiz khan', '2019-12-11', '1', 'on', 'dwsdw', '10', '10', '10', '101', NULL, NULL, 'qm829ErSb35GWjSLfWY703zuWCWH2kGOA7fajzXe', NULL, '2019-12-31 01:22:34'),
(4, '1', '1', '1', '1', '1', 'hsegbfjh', '2019-11-01', '1', 'on', NULL, '67', '67', '67', '7887', 'A', NULL, 'qm829ErSb35GWjSLfWY703zuWCWH2kGOA7fajzXe', NULL, '2019-12-31 01:34:00'),
(11, '2', '1', '1', '1', '1', 'dcdcdc', '2019-12-17', '1', 'on', NULL, '11', '22', '22', '22', NULL, '1', 's8JFfhtzjfOFRKJ6dfe06zb9Hd45NKUXh8VqBKdG', NULL, '2019-12-31 01:20:22'),
(12, '1', '1', '1', '2', '1', 'test', '2019-12-18', '1', 'on', NULL, '11', '11', '132', '2132', 'D', NULL, 'ssdEe2Ejg1RpaszhIOSOryXYP6jGRTRV2E6oLhBU', NULL, '2019-12-31 01:23:35'),
(13, '2', '1', '1', '2', '1', 'mhsdfbhjs', '2019-12-12', '1', 'on', 'dcdcds', '12', '2112', '223', '2323', 'A', NULL, 'NUs3uhq4JtPL5Llm7ni701fdApEiszPukrpNF5j9', NULL, '2019-12-31 01:31:03'),
(14, '2', '2', '2', '2', '1', '123654', '2019-12-13', '2', NULL, NULL, '1234', '12345', '12345', '123', NULL, NULL, 'JqPrXTHxd6vvN6k8K70wA4JCRQRwpypj9ZYY7DHO', NULL, '2019-12-31 03:22:43'),
(15, '5', '1', '2', '2', '1', 'testing123234', '2019-12-06', '1', NULL, NULL, '14521', '45621', '12456', '8745', NULL, NULL, 'F957hPQ8NwwuhKd5hO1jtCujJXEqcd2JOq0WvQqX', NULL, '2019-12-31 05:24:49');

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
(21, '2014_10_12_000000_create_users_table', 1),
(22, '2014_10_12_100000_create_password_resets_table', 1),
(23, '2019_08_19_000000_create_failed_jobs_table', 1),
(24, '2019_12_19_113304_create_permission_tables', 1),
(25, '2019_12_19_121717_create_posts_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `mileages`
--

CREATE TABLE `mileages` (
  `id` int(11) NOT NULL,
  `emp_id` varchar(20) NOT NULL,
  `company` varchar(50) NOT NULL,
  `date` timestamp NULL DEFAULT NULL,
  `vehicle` varchar(50) NOT NULL,
  `kilometers` varchar(50) NOT NULL,
  `reasonmileage` varchar(50) NOT NULL,
  `status` enum('A','D') NOT NULL DEFAULT 'A',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mileages`
--

INSERT INTO `mileages` (`id`, `emp_id`, `company`, `date`, `vehicle`, `kilometers`, `reasonmileage`, `status`, `created_at`, `updated_at`) VALUES
(1, '1', 'Test2', '2019-12-10 18:30:00', 'jaguar', '145', 'testing 12345677', 'D', NULL, NULL),
(2, '1', 'Test2', '2019-12-24 18:30:00', 'Tata', '5874', 'testing2', 'A', NULL, NULL),
(3, '1', 'Test2', '2019-12-12 18:30:00', 'Safari', '854', 'testing 1234', 'D', NULL, NULL),
(4, '2', 'Test1', '2019-12-27 18:30:00', 'Zen', '12345', 'tsetring', 'A', NULL, NULL),
(5, '1', 'Test1', '2019-12-18 18:30:00', 'fgbf', 'fgd', 'fdg', 'D', NULL, NULL),
(6, '4', 'Test1', '2019-12-04 18:30:00', 'jaguar', '145', 'testing q122', 'D', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_permissions`
--

INSERT INTO `model_has_permissions` (`permission_id`, `model_type`, `model_id`) VALUES
(2, 'App\\User', 3),
(2, 'App\\User', 4),
(2, 'App\\User', 9);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(2, 'App\\User', 3),
(2, 'App\\User', 4),
(2, 'App\\User', 9);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paystatements`
--

CREATE TABLE `paystatements` (
  `id` int(11) NOT NULL,
  `emp_id` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  `pdfname` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `craeted_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin Panel', 'web', '2019-12-26 05:20:53', '2019-12-26 05:20:53'),
(2, 'Employee Panel', 'web', '2019-12-26 05:21:30', '2019-12-26 05:21:30');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `projectname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `projectname`) VALUES
(1, 'Project1');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `purchasename` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `purchasename`) VALUES
(1, 'Cash'),
(2, 'Credit card'),
(3, 'Cheque');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2019-12-26 05:20:53', '2019-12-26 05:20:53'),
(2, 'Employee', 'web', '2019-12-26 05:21:30', '2019-12-26 05:21:30');

-- --------------------------------------------------------

--
-- Table structure for table `roles_old`
--

CREATE TABLE `roles_old` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles_old`
--

INSERT INTO `roles_old` (`id`, `created_at`, `updated_at`) VALUES
(1, '2019-12-26 05:20:53', '2019-12-26 05:20:53'),
(2, '2019-12-26 05:21:30', '2019-12-26 05:21:30');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emp_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `user_type`, `emp_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'junaid', 'junaid@gmail.com', NULL, '$2y$10$FR/HdDGF2.ClYbAwR9TdcumkqnAPHT3T2chYtZLmma5bufoqVZmcy', 'is_admin', NULL, NULL, '2019-12-26 05:15:24', '2019-12-26 05:15:24'),
(2, 'amit tiwari', 'amit@gmail.com', NULL, '$2y$10$FR/HdDGF2.ClYbAwR9TdcumkqnAPHT3T2chYtZLmma5bufoqVZmcy', 'employee', '1', NULL, '2019-12-26 05:17:11', '2019-12-26 05:17:11'),
(3, 'Ashish yadav', 'asish@gmail.com', NULL, '$2y$10$..MmMEN28JtnjG.qDthbKOLnYKwm3Bm14BEe3ac9/1wZ5vKhmJN9O', 'employee', '2', NULL, '2019-12-26 05:23:15', '2019-12-26 05:23:15'),
(4, 'junaid shaikh', 'junaid12@gmail.com', NULL, '$2y$10$51Ce4saPaZGoMMx1dFthT.HtcPcY.rHfn87VSe3.KqVdeBejvLiMS', 'employee', '3', NULL, '2019-12-28 01:30:34', '2019-12-28 08:37:35'),
(5, 'viny tiwari', 'viny@gmail.com', NULL, '$2y$10$RVBcRyKnzDgxNmhYqUX2k.JmUdgW.laAQm3zeTU28VUWNHJFzI7ie', 'employee', '4', NULL, '2019-12-31 03:24:01', '2019-12-31 03:24:01'),
(6, 'ajit pandayy', 'ajit@gmail.com', NULL, '$2y$10$u0IAYbk841JfOk0TNSAcu.zZ9BNRcxOL4o66tsof8czS8isGQgPBG', 'employee', '5', NULL, '2019-12-31 06:16:05', '2019-12-31 06:16:05'),
(8, 'priyanhka priya', 'priya@gmail.com', NULL, '$2y$10$ZEF7Nf9Wzkqvm5mCQcthyuY9MUIBnEPFy1K/ORHPKNyRsUCOl8fii', 'employee', '7', NULL, '2019-12-31 06:30:45', '2019-12-31 06:30:45'),
(9, 'priyanhka priya', 'priya12345@gmail.com', NULL, '$2y$10$u7fei0jvmS/KsaeyIIsVS.qYdW7lzBX8cJQuBA8u1DmtOSboyfdLC', 'employee', '8', NULL, '2019-12-31 06:31:37', '2019-12-31 06:31:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agreements`
--
ALTER TABLE `agreements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categorys`
--
ALTER TABLE `categorys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `codeofconduct`
--
ALTER TABLE `codeofconduct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_details`
--
ALTER TABLE `employee_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
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
-- Indexes for table `mileages`
--
ALTER TABLE `mileages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `paystatements`
--
ALTER TABLE `paystatements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles_old`
--
ALTER TABLE `roles_old`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

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
-- AUTO_INCREMENT for table `agreements`
--
ALTER TABLE `agreements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categorys`
--
ALTER TABLE `categorys`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `codeofconduct`
--
ALTER TABLE `codeofconduct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employee_details`
--
ALTER TABLE `employee_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `mileages`
--
ALTER TABLE `mileages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `paystatements`
--
ALTER TABLE `paystatements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles_old`
--
ALTER TABLE `roles_old`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles_old` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles_old` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
