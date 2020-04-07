-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2020 at 02:49 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `day` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `in_time` time DEFAULT NULL,
  `out` time DEFAULT NULL,
  `late` time DEFAULT NULL,
  `early` time DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_hour` time DEFAULT NULL,
  `actual_hours` time DEFAULT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `user_id`, `date`, `day`, `in_time`, `out`, `late`, `early`, `status`, `total_hour`, `actual_hours`, `month`, `created_at`, `updated_at`) VALUES
(541, 2, '2019-11-01', 'Fri', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 'A', '00:00:00', '00:00:00', 'November', NULL, NULL),
(542, 2, '2019-11-02', 'Sat', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 'NH', '00:00:00', '08:00:00', 'November', NULL, NULL),
(543, 2, '2019-11-03', 'Sun', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 'WO', '00:00:00', '08:00:00', 'November', NULL, NULL),
(544, 2, '2019-11-04', 'Mon', '10:10:00', '17:00:00', '00:10:00', '00:00:00', 'P', '07:50:00', '04:00:00', 'November', NULL, NULL),
(545, 2, '2019-11-05', 'Tue', '10:15:00', '17:00:00', '00:15:00', '00:00:00', 'P', '07:45:00', '04:00:00', 'November', NULL, NULL),
(546, 2, '2019-11-06', 'Wed', '10:00:00', '17:00:00', '00:00:00', '00:00:00', 'P', '08:00:00', '08:00:00', 'November', NULL, NULL),
(547, 2, '2019-11-07', 'Thu', '10:00:00', '17:00:00', '00:00:00', '00:00:00', 'P', '08:00:00', '08:00:00', 'November', NULL, NULL),
(548, 2, '2019-11-08', 'Fri', '10:00:00', '16:45:00', '00:00:00', '00:15:00', 'P', '07:45:00', '04:00:00', 'November', NULL, NULL),
(549, 2, '2019-11-09', 'Sat', '10:00:00', '16:20:00', '00:00:00', '00:40:00', 'P', '07:20:00', '04:00:00', 'November', NULL, NULL),
(550, 2, '2019-11-10', 'Sun', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 'WO', '00:00:00', '08:00:00', 'November', NULL, NULL),
(551, 2, '2019-11-11', 'Mon', '10:00:00', '16:20:00', '00:00:00', '00:40:00', 'P', '07:20:00', '04:00:00', 'November', NULL, NULL),
(552, 2, '2019-11-12', 'Tue', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 'NH', '00:00:00', '08:00:00', 'November', NULL, NULL),
(553, 2, '2019-11-13', 'Wed', '10:00:00', '16:20:00', '00:00:00', '00:40:00', 'P', '07:20:00', '04:00:00', 'November', NULL, NULL),
(554, 2, '2019-11-14', 'Thu', '09:00:00', '17:00:00', '00:00:00', '00:00:00', 'P', '09:00:00', '08:00:00', 'November', NULL, NULL),
(555, 2, '2019-11-15', 'Fri', '09:00:00', '17:00:00', '00:00:00', '00:00:00', 'P', '09:00:00', '08:00:00', 'November', NULL, NULL),
(556, 2, '2019-11-16', 'Sat', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 'NH', '00:00:00', '08:00:00', 'November', NULL, NULL),
(557, 2, '2019-11-17', 'Sun', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 'WO', '00:00:00', '08:00:00', 'November', NULL, NULL),
(558, 2, '2019-11-18', 'Mon', '10:00:00', '17:00:00', '00:00:00', '00:00:00', 'P', '08:00:00', '08:00:00', 'November', NULL, NULL),
(559, 2, '2019-11-19', 'Tue', '10:00:00', '17:00:00', '00:00:00', '00:00:00', 'P', '08:00:00', '08:00:00', 'November', NULL, NULL),
(560, 2, '2019-11-20', 'Wed', '10:00:00', '17:00:00', '00:00:00', '00:00:00', 'P', '08:00:00', '08:00:00', 'November', NULL, NULL),
(561, 2, '2019-11-21', 'Thu', '10:00:00', '17:00:00', '00:00:00', '00:00:00', 'P', '08:00:00', '08:00:00', 'November', NULL, NULL),
(562, 2, '2019-11-22', 'Fri', '10:00:00', '17:00:00', '00:00:00', '00:00:00', 'P', '08:00:00', '08:00:00', 'November', NULL, NULL),
(563, 2, '2019-11-23', 'Sat', '09:45:00', '17:00:00', '00:00:00', '00:00:00', 'P', '08:00:00', '08:00:00', 'November', NULL, NULL),
(564, 2, '2019-11-24', 'Sun', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 'WO', '00:00:00', '08:00:00', 'November', NULL, NULL),
(565, 2, '2019-11-25', 'Mon', '10:00:00', '17:00:00', '00:00:00', '00:00:00', 'P', '08:00:00', '08:00:00', 'November', NULL, NULL),
(566, 2, '2019-11-26', 'Tue', '10:00:00', '16:00:00', '00:00:00', '00:00:00', 'P', '07:00:00', '04:00:00', 'November', NULL, NULL),
(567, 2, '2019-11-27', 'Wed', '10:00:00', '16:45:00', '00:00:00', '00:00:00', 'P', '07:45:00', '04:00:00', 'November', NULL, NULL),
(568, 2, '2019-11-28', 'Thu', '10:20:00', '17:00:00', '00:20:00', '00:00:00', 'P', '07:40:00', '04:00:00', 'November', NULL, NULL),
(569, 2, '2019-11-29', 'Fri', '10:40:00', '17:00:00', '00:40:00', '00:00:00', 'P', '07:20:00', '04:00:00', 'November', NULL, NULL),
(570, 2, '2019-11-30', 'Sat', '10:00:00', '17:00:00', '00:00:00', '00:00:00', 'P', '08:00:00', '08:00:00', 'November', NULL, NULL),
(571, 8, '2019-11-01', 'Fri', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 'A', '00:00:00', '00:00:00', 'November', NULL, NULL),
(572, 8, '2019-11-02', 'Sat', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 'NH', '00:00:00', '08:00:00', 'November', NULL, NULL),
(573, 8, '2019-11-03', 'Sun', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 'WO', '00:00:00', '08:00:00', 'November', NULL, NULL),
(574, 8, '2019-11-04', 'Mon', '10:10:00', '17:00:00', '00:10:00', '00:00:00', 'P', '07:50:00', '04:00:00', 'November', NULL, NULL),
(575, 8, '2019-11-05', 'Tue', '10:15:00', '17:00:00', '00:15:00', '00:00:00', 'P', '07:45:00', '04:00:00', 'November', NULL, NULL),
(576, 8, '2019-11-06', 'Wed', '10:00:00', '17:00:00', '00:00:00', '00:00:00', 'P', '08:00:00', '08:00:00', 'November', NULL, NULL),
(577, 8, '2019-11-07', 'Thu', '10:00:00', '17:00:00', '00:00:00', '00:00:00', 'P', '08:00:00', '08:00:00', 'November', NULL, NULL),
(578, 8, '2019-11-08', 'Fri', '10:00:00', '16:45:00', '00:00:00', '00:15:00', 'P', '07:45:00', '04:00:00', 'November', NULL, NULL),
(579, 8, '2019-11-09', 'Sat', '10:00:00', '16:20:00', '00:00:00', '00:40:00', 'P', '07:20:00', '04:00:00', 'November', NULL, NULL),
(580, 8, '2019-11-10', 'Sun', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 'WO', '00:00:00', '08:00:00', 'November', NULL, NULL),
(581, 8, '2019-11-11', 'Mon', '10:00:00', '16:20:00', '00:00:00', '00:40:00', 'P', '07:20:00', '04:00:00', 'November', NULL, NULL),
(582, 8, '2019-11-12', 'Tue', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 'NH', '00:00:00', '08:00:00', 'November', NULL, NULL),
(583, 8, '2019-11-13', 'Wed', '10:00:00', '16:20:00', '00:00:00', '00:40:00', 'P', '07:20:00', '04:00:00', 'November', NULL, NULL),
(584, 8, '2019-11-14', 'Thu', '09:00:00', '17:00:00', '00:00:00', '00:00:00', 'P', '09:00:00', '08:00:00', 'November', NULL, NULL),
(585, 8, '2019-11-15', 'Fri', '09:00:00', '17:00:00', '00:00:00', '00:00:00', 'P', '09:00:00', '08:00:00', 'November', NULL, NULL),
(586, 8, '2019-11-16', 'Sat', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 'NH', '00:00:00', '08:00:00', 'November', NULL, NULL),
(587, 8, '2019-11-17', 'Sun', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 'WO', '00:00:00', '08:00:00', 'November', NULL, NULL),
(588, 8, '2019-11-18', 'Mon', '10:00:00', '17:00:00', '00:00:00', '00:00:00', 'P', '08:00:00', '08:00:00', 'November', NULL, NULL),
(589, 8, '2019-11-19', 'Tue', '10:00:00', '17:00:00', '00:00:00', '00:00:00', 'P', '08:00:00', '08:00:00', 'November', NULL, NULL),
(590, 8, '2019-11-20', 'Wed', '10:00:00', '17:00:00', '00:00:00', '00:00:00', 'P', '08:00:00', '08:00:00', 'November', NULL, NULL),
(591, 8, '2019-11-21', 'Thu', '10:00:00', '17:00:00', '00:00:00', '00:00:00', 'P', '08:00:00', '08:00:00', 'November', NULL, NULL),
(592, 8, '2019-11-22', 'Fri', '10:00:00', '17:00:00', '00:00:00', '00:00:00', 'P', '08:00:00', '08:00:00', 'November', NULL, NULL),
(593, 8, '2019-11-23', 'Sat', '09:45:00', '17:00:00', '00:00:00', '00:00:00', 'P', '08:00:00', '08:00:00', 'November', NULL, NULL),
(594, 8, '2019-11-24', 'Sun', '00:00:00', '00:00:00', '00:00:00', '00:00:00', 'WO', '00:00:00', '08:00:00', 'November', NULL, NULL),
(595, 8, '2019-11-25', 'Mon', '10:00:00', '17:00:00', '00:00:00', '00:00:00', 'P', '08:00:00', '08:00:00', 'November', NULL, NULL),
(596, 8, '2019-11-26', 'Tue', '10:00:00', '16:00:00', '00:00:00', '00:00:00', 'P', '07:00:00', '04:00:00', 'November', NULL, NULL),
(597, 8, '2019-11-27', 'Wed', '10:00:00', '16:45:00', '00:00:00', '00:00:00', 'P', '07:45:00', '04:00:00', 'November', NULL, NULL),
(598, 8, '2019-11-28', 'Thu', '10:20:00', '17:00:00', '00:20:00', '00:00:00', 'P', '07:40:00', '04:00:00', 'November', NULL, NULL),
(599, 8, '2019-11-29', 'Fri', '10:40:00', '17:00:00', '00:40:00', '00:00:00', 'P', '07:20:00', '04:00:00', 'November', NULL, NULL),
(600, 8, '2019-11-30', 'Sat', '10:00:00', '17:00:00', '00:00:00', '00:00:00', 'P', '08:00:00', '08:00:00', 'November', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'IT', '2020-03-24 15:11:43', '2020-03-24 15:11:43'),
(2, 'CS', '2020-03-24 15:11:50', '2020-03-24 15:11:50'),
(3, 'Civil', '2020-03-24 15:11:58', '2020-03-24 15:11:58'),
(4, 'Entc', '2020-03-24 15:12:06', '2020-03-24 15:12:06'),
(5, 'Mechanical', '2020-03-24 15:12:17', '2020-03-24 15:12:17'),
(6, 'Chemical', '2020-03-24 15:12:26', '2020-03-24 15:12:26');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `courseType` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_id` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `tution_fees` decimal(8,3) NOT NULL,
  `development_fees` decimal(8,3) NOT NULL,
  `total_fees` decimal(8,3) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `courseType`, `branch_id`, `year`, `tution_fees`, `development_fees`, `total_fees`, `created_at`, `updated_at`) VALUES
(1, 'B.E.', 1, 1, '90000.000', '900.000', '90900.000', '2020-03-24 15:13:19', '2020-03-24 15:13:19');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'IT', NULL, NULL),
(2, 'Mechanical', NULL, NULL),
(3, 'Chemical', NULL, NULL),
(4, 'Entc', NULL, NULL),
(5, 'Civil', NULL, NULL),
(6, 'Sweeper', '2020-03-24 17:03:24', '2020-03-24 17:03:24');

-- --------------------------------------------------------

--
-- Table structure for table `download_reasons`
--

CREATE TABLE `download_reasons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reason` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `download_reasons`
--

INSERT INTO `download_reasons` (`id`, `reason`, `details`, `created_at`, `updated_at`) VALUES
(1, 'mmm', 'a:3:{s:9:\"user_name\";s:14:\"sarthak vaidya\";s:7:\"user_id\";i:2;s:8:\"document\";s:28:\"ssc-marksheet-1585063289.jpg\";}', '2020-03-24 16:07:31', '2020-03-24 16:07:31');

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`id`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Seak Leave', '2020-03-24 15:12:40', '2020-03-24 15:12:40'),
(2, 'casual Leave', '2020-03-24 15:12:47', '2020-03-24 15:12:47'),
(3, 'Paid', '2020-03-24 15:12:55', '2020-03-24 15:12:55');

-- --------------------------------------------------------

--
-- Table structure for table `leave_applications`
--

CREATE TABLE `leave_applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `reason` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `days` int(11) DEFAULT NULL,
  `leave_status` enum('Active','InActive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `approvedByHOD` enum('Pending','Approved','Decline') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `approvedByPrincipal` enum('Pending','Approved','Decline') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `ajustedFacultyName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leave_applications`
--

INSERT INTO `leave_applications` (`id`, `user_id`, `reason`, `start_date`, `end_date`, `days`, `leave_status`, `approvedByHOD`, `approvedByPrincipal`, `ajustedFacultyName`, `created_at`, `updated_at`) VALUES
(4, 2, 'xx', '2019-11-01', '2019-11-01', 1, 'InActive', 'Approved', 'Approved', 'manish vaidya', '2020-03-24 17:59:02', '2020-03-24 18:00:16');

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
(12, '2020_02_17_120438_add_column_role_id_to_user_table', 2),
(46, '2014_10_12_000000_create_users_table', 3),
(47, '2014_10_12_100000_create_password_resets_table', 3),
(48, '2020_02_17_113816_create_roles_table', 3),
(49, '2020_02_17_120333_create_role_user_table', 3),
(50, '2020_03_02_185656_create_departments_table', 3),
(51, '2020_03_03_104634_create_leaves_table', 3),
(52, '2020_03_03_110548_create_notices_table', 3),
(54, '2020_03_05_101601_create_branches_table', 3),
(55, '2020_03_06_070428_create_results_table', 3),
(56, '2020_03_07_091316_create_download_reasons_table', 3),
(57, '2020_03_10_060648_create_products_table', 3),
(58, '2020_03_13_073846_create_leave_applications_table', 3),
(59, '2020_03_13_104359_create_teachers_table', 3),
(60, '2020_03_14_123501_create_courses_table', 3),
(61, '2020_03_16_074812_create_student_fees_table', 3),
(62, '2020_03_21_113050_create_attendances_table', 3),
(63, '2020_03_24_201249_create_payments_table', 3),
(64, '2020_03_05_095051_create_students_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `semister` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`id`, `title`, `body`, `user_id`, `branch_id`, `semister`, `year`, `created_at`, `updated_at`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim venia', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim venia', 1, 1, 1, 1, '2020-03-24 15:14:03', '2020-03-24 15:14:03'),
(2, 'Code submit', 'Code submit', 1, 1, 1, 1, '2020-03-24 16:09:28', '2020-03-24 16:09:28');

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(5) DEFAULT NULL,
  `total_days` int(11) NOT NULL,
  `total_leaves` int(11) NOT NULL,
  `pf_deduction` int(11) NOT NULL,
  `prof_tax_deduction` int(11) NOT NULL,
  `net_salary` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `user_id`, `total_days`, `total_leaves`, `pf_deduction`, `prof_tax_deduction`, `net_salary`, `created_at`, `updated_at`) VALUES
(9, 2, 25, 1, 1080, 200, 10795.00, '2020-03-24 18:00:16', '2020-03-24 18:00:16'),
(10, 8, 24, 0, 10800, 200, 97792.00, '2020-03-24 18:00:16', '2020-03-24 18:00:16');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `qualifications`
--

CREATE TABLE `qualifications` (
  `id` int(5) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qualifications`
--

INSERT INTO `qualifications` (`id`, `name`, `created_date`, `update_date`) VALUES
(1, 'BCS', '2020-02-23 18:23:18', '2020-02-23 18:23:18'),
(2, 'MCS', '2020-02-23 18:23:18', '2020-02-23 18:23:18'),
(3, 'MCA', '2020-02-23 18:23:32', '2020-02-23 18:23:32'),
(4, 'BCA', '2020-02-23 18:23:32', '2020-02-23 18:23:32'),
(5, 'BE', '2020-02-23 18:24:57', '2020-02-23 18:24:57'),
(6, 'ME', '2020-02-23 18:24:57', '2020-02-23 18:24:57'),
(7, 'MBA', '2020-02-23 18:24:57', '2020-02-23 18:24:57'),
(8, 'BBA', '2020-02-23 18:24:57', '2020-02-23 18:24:57'),
(9, 'MA', '2020-02-23 18:24:57', '2020-02-23 18:24:57'),
(10, 'Bcom', '2020-02-23 18:24:57', '2020-02-23 18:24:57'),
(11, 'Mcom', '2020-02-23 18:24:57', '2020-02-23 18:24:57'),
(12, 'Bsc', '2020-02-23 18:24:57', '2020-02-23 18:24:57'),
(13, 'Msc', '2020-02-23 18:24:57', '2020-02-23 18:24:57');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `semister` int(11) NOT NULL,
  `doc_type` enum('results','assignment','attendance') COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `branch_id`, `year`, `semister`, `doc_type`, `file`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'assignment', '20200324214008.png', 1, '2020-03-24 16:10:08', '2020-03-24 16:10:08'),
(2, 1, 1, 1, 'results', '20200324214124.jpg', 1, '2020-03-24 16:11:24', '2020-03-24 16:11:24'),
(3, 1, 1, 1, 'attendance', '20200324214153.jpg', 1, '2020-03-24 16:11:53', '2020-03-24 16:11:53');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL),
(2, 'hod', NULL, NULL),
(3, 'principal', NULL, NULL),
(4, 'teachers', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` bigint(20) UNSIGNED NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `courseType` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `semister` int(11) DEFAULT NULL,
  `roll_number` int(11) DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pincode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` enum('Male','FeMale','other') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Male',
  `dob` date DEFAULT NULL,
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adhar_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password_show` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sscMarksheet` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hscMarksheet` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diplomaMarksheet` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `leaveCirtficates` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `first_name`, `father_name`, `mother_name`, `last_name`, `email`, `phone`, `course_id`, `courseType`, `branch`, `year`, `semister`, `roll_number`, `state`, `city`, `pincode`, `address`, `gender`, `dob`, `profile_image`, `adhar_number`, `username`, `password`, `password_show`, `sscMarksheet`, `hscMarksheet`, `diplomaMarksheet`, `leaveCirtficates`, `created_at`, `updated_at`) VALUES
(2, 'sarthak', 'yashwant', 'aradhana', 'vaidya', 'sarthak@gmail.com', 8180040524, 1, 'B.E.', 1, 1, 1, 1, 'maharashatra', 'gjhg', '431203', 'sds', 'Male', '2019-12-28', 'uploads/students/profile-photo-1585063289.jpg', 'AUGPV1793B', 'IT20192', '$2y$10$ArrSR9w5NPGwrF2aYwf85.qH93O.TmwQOWUGBfq8sMvUGAi8N9DDG', '12312312', 'uploads/students/documents/ssc/ssc-marksheet-1585063289.jpg', 'uploads/students/documents/hsc/hsc-marksheet-1585063289.jpg', 'uploads/students/documents/diploma/diploma-marksheet-1585063289.jpg', 'uploads/students/documents/leaving/leaving-marksheet-1585063289.jpg', '2020-03-24 15:21:29', '2020-03-24 16:06:45'),
(3, 'manish', 'ani', 'nan', 'manish', 'manish@gmail.com', 9090909021, 1, 'B.E.', 1, 1, 1, 1, 'maharashatra', 'gjhg', '431203', 'sds', 'Male', '2020-11-28', 'uploads/students/profile-photo-1585063365.jpg', 'AUGPV1793B', 'IT20203', '$2y$10$tL2EOUN0cy.gSEHvS6gtt.6wJZ.sP8vPW.TDMjBl.jA51E7F1q77O', '12312312', 'uploads/students/documents/ssc/ssc-marksheet-1585063365.jpg', 'uploads/students/documents/hsc/hsc-marksheet-1585063365.jpg', 'uploads/students/documents/diploma/diploma-marksheet-1585063365.jpg', 'uploads/students/documents/leaving/leaving-marksheet-1585063365.jpg', '2020-03-24 15:22:45', '2020-03-24 15:22:45');

-- --------------------------------------------------------

--
-- Table structure for table `student_fees`
--

CREATE TABLE `student_fees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `FeesPaid` decimal(10,2) DEFAULT NULL,
  `FeesRemain` decimal(10,2) DEFAULT NULL,
  `status` enum('Pending','Paid','Unpaid') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_fees`
--

INSERT INTO `student_fees` (`id`, `student_id`, `course_id`, `FeesPaid`, `FeesRemain`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '90000.00', '900.00', 'Paid', '2020-03-24 15:21:29', '2020-03-25 13:45:27'),
(2, 3, 1, NULL, NULL, 'Pending', '2020-03-24 15:22:45', '2020-03-25 13:39:39');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` bigint(20) UNSIGNED DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `employee_code` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `gender` enum('Male','FeMale','other') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Male',
  `dob` date DEFAULT NULL,
  `roll_number` int(5) DEFAULT NULL,
  `joining_date` date DEFAULT NULL,
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary` decimal(8,2) DEFAULT NULL,
  `total_da` decimal(8,2) DEFAULT NULL,
  `total_hra` decimal(8,2) DEFAULT NULL,
  `agp` decimal(8,2) DEFAULT NULL,
  `gross_salary` decimal(8,2) DEFAULT NULL,
  `da_percent` decimal(8,2) DEFAULT NULL,
  `hra_percent` decimal(8,2) DEFAULT NULL,
  `adhar_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `leave_count` int(11) NOT NULL DEFAULT 12,
  `password_show` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `phone`, `address`, `department_id`, `employee_code`, `role_id`, `gender`, `dob`, `roll_number`, `joining_date`, `profile_image`, `salary`, `total_da`, `total_hra`, `agp`, `gross_salary`, `da_percent`, `hra_percent`, `adhar_number`, `email_verified_at`, `password`, `username`, `leave_count`, `password_show`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', 8180040528, 'admin', 1, 1, 1, 'Male', '2020-03-24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$9BVOByqjb9Sr2EgpfKge0u0c.8K3dgyKBLHAvinZH2ZmQBEijpKwG', 'admin1234', 12, NULL, NULL, NULL, NULL),
(2, 'samir', 'bhale', 'samir@gmail.com', 8180040524, 'sds', 1, 123, 4, 'Male', '2020-12-31', 11, '2020-12-29', 'uploads/profile-photo-1585061582.jpg', '9000.00', '900.00', '3600.00', '1000.00', '14500.00', '10.00', '40.00', 'AUGPV1793B', NULL, '$2y$10$aFwol0O8yWyTb4Hx7OuqJ.izguWHaCMlsDDaJ62NdTMckKn6/0GYy', '202012312-2', 11, '202012312-2', NULL, '2020-03-24 14:53:02', '2020-03-24 18:00:16'),
(8, 'manish', 'vaidya', 'manish@gmail.com', 8180050489, 'xx', 1, 121, 4, 'Male', '2019-02-23', NULL, '2019-01-20', 'uploads/profile-photo-1585070278.jpg', '90000.00', '9000.00', '36000.00', '1000.00', '136000.00', '10.00', '40.00', 'AUGPV1793B', NULL, '$2y$10$QZv28N4EChpcZoJxmGUd/.UPo5Dwkk/hYMjQtMZrIOQJrxelenF7.', '201902238', 12, '201902238', NULL, '2020-03-24 17:17:58', '2020-03-24 17:17:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `download_reasons`
--
ALTER TABLE `download_reasons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_applications`
--
ALTER TABLE `leave_applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qualifications`
--
ALTER TABLE `qualifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_email_unique` (`email`),
  ADD UNIQUE KEY `students_phone_unique` (`phone`);

--
-- Indexes for table `student_fees`
--
ALTER TABLE `student_fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
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
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=601;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `download_reasons`
--
ALTER TABLE `download_reasons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `leave_applications`
--
ALTER TABLE `leave_applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `qualifications`
--
ALTER TABLE `qualifications`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student_fees`
--
ALTER TABLE `student_fees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
