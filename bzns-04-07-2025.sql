-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 04, 2025 at 06:15 AM
-- Server version: 8.3.0
-- PHP Version: 8.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bzns`
--

-- --------------------------------------------------------

--
-- Table structure for table `batches`
--

CREATE TABLE `batches` (
  `id` bigint UNSIGNED NOT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `project_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` int NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `batches`
--

INSERT INTO `batches` (`id`, `client_id`, `project_id`, `name`, `number`, `is_active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(17, 1, 1, '', 1, 1, NULL, '2025-05-26 00:56:47', NULL),
(18, 1, 6, '', 1, 1, NULL, '2025-05-26 00:56:47', NULL),
(19, 1, 8, '', 1, 1, NULL, '2025-05-26 00:56:47', NULL),
(20, 1, 9, '', 1, 1, NULL, '2025-05-26 00:56:47', '2025-05-26 04:20:25'),
(21, 2, 7, '', 1, 1, NULL, '2025-05-26 00:56:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `batch_clients`
--

CREATE TABLE `batch_clients` (
  `id` bigint UNSIGNED NOT NULL,
  `batch_id` bigint UNSIGNED NOT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `budget_min` double DEFAULT NULL,
  `budget_max` double DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `is_applied` tinyint(1) NOT NULL DEFAULT '0',
  `is_contacted` tinyint(1) NOT NULL DEFAULT '0',
  `is_proposal` tinyint(1) NOT NULL DEFAULT '0',
  `is_accepted` tinyint(1) NOT NULL DEFAULT '0',
  `is_rejected` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint UNSIGNED NOT NULL,
  `topic_id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `details`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Agricultural Sector', 'agricultural-sector', 'Agricultural Sector', NULL, '2025-05-24 01:40:13', '2025-07-01 10:20:59'),
(2, 'Industrial Sector', 'industrial-sector', 'Industrial Sector', NULL, '2025-07-01 10:21:16', '2025-07-01 10:21:16'),
(3, 'Commercial Sector', 'commercial-sector', 'Commercial Sector', NULL, '2025-07-01 10:21:22', '2025-07-01 10:21:22'),
(4, 'Service Sector', 'service-sector', 'Service Sector', NULL, '2025-07-01 10:21:28', '2025-07-01 10:21:28');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `founding_year` int DEFAULT NULL,
  `is_company` tinyint(1) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `is_decision_maker` tinyint(1) NOT NULL DEFAULT '1',
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `last_seen` datetime DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `phone`, `title`, `email`, `password`, `address`, `country`, `city`, `zip`, `map`, `website`, `facebook`, `linkedin`, `instagram`, `youtube`, `company_size`, `founding_year`, `is_company`, `is_active`, `is_decision_maker`, `is_verified`, `last_seen`, `email_verified_at`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'hossam alaa farid', '01151948786', 'ddd', 'client@gmail.com', '$2y$12$1LDkcc55J6F.3pNM78jEuO9ibiSF12h/zGJwwFiTWt55Prjj0UOmy', 'حسين كامل', 'Egypt', 'مصرة الجديدة', '11311', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5614.206680477986!2d31.368704924797733!3d30.109079101472016!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1458176c2fe37a6f%3A0x455d5754795dfc8!2sHossamX%20studios!5e0!3m2!1sar!2seg!4v1734615316961!5m2!1sar!2seg', 'https://hossam-x-studios.com', 'https://www.facebook.com/hossam.a.farid/', 'https://www.linkedin.com/in/hossam-faird/', 'https://www.facebook.com/hossam.a.farid/', 'https://www.youtube.com/', '1-10', 1999, 1, 0, 1, 0, '2025-07-04 08:47:32', NULL, NULL, NULL, '2025-05-21 23:05:25', '2025-07-04 05:47:32'),
(2, 'Amgad emad', '01151948786', NULL, 'client2@gmail.com', '$2y$12$CV.Z4q14LJmC6RlIlvfh/OTy2ESPNRKcv3laGdcSVd/ke9Ntp008O', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 1, 0, '2025-07-04 09:13:06', NULL, NULL, NULL, '2025-05-24 05:06:04', '2025-07-04 06:13:06');

-- --------------------------------------------------------

--
-- Table structure for table `client_subcategory`
--

CREATE TABLE `client_subcategory` (
  `id` bigint UNSIGNED NOT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `subcategory_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint UNSIGNED NOT NULL,
  `industry_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `decision_maker` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `capacity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_media` text COLLATE utf8mb4_unicode_ci,
  `source` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company_deal`
--

CREATE TABLE `company_deal` (
  `id` bigint UNSIGNED NOT NULL,
  `company_id` bigint UNSIGNED NOT NULL,
  `deal_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company_section`
--

CREATE TABLE `company_section` (
  `id` bigint UNSIGNED NOT NULL,
  `company_id` bigint UNSIGNED NOT NULL,
  `section_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `complains`
--

CREATE TABLE `complains` (
  `id` bigint UNSIGNED NOT NULL,
  `from_client_id` bigint UNSIGNED NOT NULL,
  `to_client_id` bigint UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint UNSIGNED NOT NULL,
  `company_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'new',
  `source` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_deal`
--

CREATE TABLE `contact_deal` (
  `id` bigint UNSIGNED NOT NULL,
  `contact_id` bigint UNSIGNED NOT NULL,
  `deal_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deals`
--

CREATE TABLE `deals` (
  `id` bigint UNSIGNED NOT NULL,
  `pipeline_id` bigint UNSIGNED DEFAULT NULL,
  `stage_id` bigint UNSIGNED DEFAULT NULL,
  `company_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double NOT NULL,
  `is_paid` tinyint(1) NOT NULL DEFAULT '0',
  `closed_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `demands`
--

CREATE TABLE `demands` (
  `id` bigint UNSIGNED NOT NULL,
  `from_client_id` bigint UNSIGNED NOT NULL,
  `to_client_id` bigint UNSIGNED NOT NULL,
  `service_id` bigint UNSIGNED NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `budget_min` double DEFAULT NULL,
  `budget_max` double DEFAULT NULL,
  `weeks` int DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `is_accepted` tinyint(1) NOT NULL DEFAULT '0',
  `is_rejected` tinyint(1) NOT NULL DEFAULT '0',
  `is_completed` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `demands`
--

INSERT INTO `demands` (`id`, `from_client_id`, `to_client_id`, `service_id`, `details`, `budget_min`, `budget_max`, `weeks`, `start_date`, `is_accepted`, `is_rejected`, `is_completed`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, 'details', 100, 200, 4, '2025-07-05', 1, 0, 1, '2025-07-03 23:02:33', '2025-07-04 05:21:29'),
(3, 1, 2, 4, 'detailssss', 100, 200, 4, '2025-07-05', 1, 0, 1, '2025-07-03 23:02:33', '2025-07-04 05:54:01');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `industries`
--

CREATE TABLE `industries` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leads`
--

CREATE TABLE `leads` (
  `id` bigint UNSIGNED NOT NULL,
  `pipeline_id` bigint UNSIGNED DEFAULT NULL,
  `stage_id` bigint UNSIGNED DEFAULT NULL,
  `industry_id` bigint UNSIGNED DEFAULT NULL,
  `company_id` bigint UNSIGNED DEFAULT NULL,
  `contact_id` bigint UNSIGNED DEFAULT NULL,
  `deal_id` bigint UNSIGNED DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `source` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_contacted_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lead_section`
--

CREATE TABLE `lead_section` (
  `id` bigint UNSIGNED NOT NULL,
  `lead_id` bigint UNSIGNED NOT NULL,
  `section_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `loggable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `loggable_id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `log_date` datetime NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `id` bigint UNSIGNED NOT NULL,
  `subcategory_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci,
  `link` text COLLATE utf8mb4_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collection_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversions_disk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` bigint UNSIGNED NOT NULL,
  `manipulations` json NOT NULL,
  `custom_properties` json NOT NULL,
  `generated_conversions` json NOT NULL,
  `responsive_images` json NOT NULL,
  `order_column` int UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `model_type`, `model_id`, `uuid`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `conversions_disk`, `size`, `manipulations`, `custom_properties`, `generated_conversions`, `responsive_images`, `order_column`, `created_at`, `updated_at`) VALUES
(4, 'App\\Models\\Client', 1, 'c187e342-53ab-4017-ac9d-b0d67edae802', 'company_documents', 'Gala Global Website Development Brief', 'Gala-Global-Website-Development-Brief.docx', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'public', 'public', 17255, '[]', '{\"display_name\": \"ff\"}', '[]', '[]', 2, '2025-05-22 15:29:48', '2025-05-22 15:29:48'),
(5, 'App\\Models\\Client', 1, '269b0df8-32dd-46ff-9604-c625ee4ac7b6', 'company_documents', 'Gala Global  Proposal', 'Gala-Global--Proposal.pdf', 'application/pdf', 'public', 'public', 2047674, '[]', '{\"display_name\": \"fff\"}', '[]', '[]', 3, '2025-05-22 15:31:21', '2025-05-22 15:31:21'),
(7, 'App\\Models\\Portfolio', 1, 'b4d8d249-40f1-43dc-8957-aeb892770ec0', 'portfolio', 'website', 'website.jpg', 'image/jpeg', 'public', 'public', 916277, '[]', '[]', '[]', '[]', 1, '2025-05-23 23:21:20', '2025-05-23 23:21:20'),
(8, 'App\\Models\\Portfolio', 2, '0d2de68f-2c97-484f-bf25-0427bce484d8', 'portfolio', '6', '6.jpg', 'image/jpeg', 'public', 'public', 159539, '[]', '[]', '[]', '[]', 1, '2025-05-24 02:03:28', '2025-05-24 02:03:28'),
(9, 'App\\Models\\Project', 1, 'd2b35d81-af03-4006-8d84-fc56484cf12b', 'projects', '6', '6.jpg', 'image/jpeg', 'public', 'public', 159539, '[]', '[]', '[]', '[]', 1, '2025-05-24 04:55:19', '2025-05-24 04:55:19'),
(10, 'App\\Models\\Project', 2, 'b0960069-a527-457d-a689-aa947fc1cf99', 'projects', '6', '6.jpg', 'image/jpeg', 'public', 'public', 159539, '[]', '[]', '[]', '[]', 1, '2025-05-24 04:56:09', '2025-05-24 04:56:09'),
(11, 'App\\Models\\Project', 3, '5b90ebb6-8422-4f05-9954-7907212792af', 'projects', '6', '6.jpg', 'image/jpeg', 'public', 'public', 159539, '[]', '[]', '[]', '[]', 1, '2025-05-24 04:56:43', '2025-05-24 04:56:43'),
(12, 'App\\Models\\Project', 4, '4cb91b98-2f07-4ac5-adb3-34f2f6c40070', 'projects', '6', '6.jpg', 'image/jpeg', 'public', 'public', 159539, '[]', '[]', '[]', '[]', 1, '2025-05-24 04:57:18', '2025-05-24 04:57:18'),
(13, 'App\\Models\\Project', 5, '84e5b80b-fa4a-41e1-bada-2068ebdf8dd9', 'projects', '6', '6.jpg', 'image/jpeg', 'public', 'public', 159539, '[]', '[]', '[]', '[]', 1, '2025-05-24 04:57:53', '2025-05-24 04:57:53'),
(14, 'App\\Models\\Project', 6, '80d3a005-ca23-4542-978b-ba190d76410a', 'projects', '5', '5.jpg', 'image/jpeg', 'public', 'public', 57554, '[]', '[]', '[]', '[]', 1, '2025-05-24 05:00:35', '2025-05-24 05:00:35'),
(15, 'App\\Models\\Project', 7, '5b5e8e67-f98f-46f4-b1ff-a6b68956fbd7', 'projects', '4', '4.jpg', 'image/jpeg', 'public', 'public', 74739, '[]', '[]', '[]', '[]', 1, '2025-05-24 06:20:44', '2025-05-24 06:20:44'),
(16, 'App\\Models\\Project', 8, '4438d47c-4549-4776-a2df-bdf1b23b1bab', 'projects', '2', '2.jpg', 'image/jpeg', 'public', 'public', 134446, '[]', '[]', '[]', '[]', 1, '2025-05-24 06:22:20', '2025-05-24 06:22:20'),
(17, 'App\\Models\\Client', 1, 'a26e8fe0-2028-43b7-af8c-eb352fe3ce17', 'company_documents', 'Gala Global  Proposal', 'Gala-Global--Proposal.pdf', 'application/pdf', 'public', 'public', 2047674, '[]', '{\"display_name\": \"sss\"}', '[]', '[]', 4, '2025-05-25 08:31:42', '2025-05-25 08:31:42'),
(19, 'App\\Models\\Client', 1, '09f7a804-b919-4b1d-bf10-f24beab78987', 'profile', '150-60', '150-60.jpg', 'image/jpeg', 'public', 'public', 518780, '[]', '[]', '[]', '[]', 6, '2025-05-26 06:19:26', '2025-05-26 06:19:26'),
(20, 'App\\Models\\Client', 1, '3162bea5-a7af-4ea0-9cbd-9a119344427f', 'cover', '6', '6.jpg', 'image/jpeg', 'public', 'public', 159539, '[]', '[]', '[]', '[]', 7, '2025-05-26 11:42:35', '2025-05-26 11:42:35'),
(21, 'App\\Models\\Section', 1, '7477a6a0-af4a-42a3-bed2-74ebb9bdd7a8', 'icons', 'profile', 'profile.png', 'image/png', 'public', 'public', 3201, '[]', '[]', '[]', '[]', 1, '2025-06-27 00:52:03', '2025-06-27 00:52:03'),
(22, 'App\\Models\\Section', 2, 'd83c9f4d-b44a-4ae8-8f2d-3fa6aa71cf72', 'icons', 'payment-service', 'payment-service.png', 'image/png', 'public', 'public', 5039, '[]', '[]', '[]', '[]', 1, '2025-06-27 00:55:40', '2025-06-27 00:55:40'),
(23, 'App\\Models\\Section', 3, '743e0fe3-5ae1-4f60-9e82-7b74ed2a1a41', 'icons', 'manual', 'manual.png', 'image/png', 'public', 'public', 3622, '[]', '[]', '[]', '[]', 1, '2025-06-27 02:41:19', '2025-06-27 02:41:19'),
(25, 'App\\Models\\Demand', 3, 'bc811e42-df8a-4c23-837f-65253a867dd0', 'proposal', 'Amr Ahmed ', 'Amr-Ahmed-.pdf', 'application/pdf', 'public', 'public', 619834, '[]', '[]', '[]', '[]', 1, '2025-07-04 05:22:50', '2025-07-04 05:22:50');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000001_create_cache_table', 1),
(2, '0001_01_01_000002_create_jobs_table', 1),
(3, '2014_10_12_000000_create_users_table', 1),
(4, '2024_06_01_172030_create_media_table', 1),
(5, '2024_09_19_155524_create_notifications_table', 1),
(6, '2024_11_03_095709_create_industries_table', 1),
(7, '2024_11_03_193607_create_companies_table', 1),
(8, '2024_11_03_193719_create_contacts_table', 1),
(9, '2024_12_04_141352_create_pipelines_table', 1),
(10, '2024_12_04_141353_create_stages_table', 1),
(11, '2024_12_05_201707_create_deals_table', 1),
(12, '2024_12_05_201708_create_leads_table', 1),
(13, '2024_12_07_233638_create_notes_table', 1),
(14, '2024_12_07_233825_create_logs_table', 1),
(15, '2024_12_17_120224_create_contact_deal_table', 1),
(16, '2024_12_18_130720_create_company_deal_table', 1),
(17, '2024_12_27_191648_create_permission_tables', 1),
(18, '2025_00_18_074319_create_sections_table', 1),
(19, '2025_01_11_011214_create_categories_table', 1),
(20, '2025_01_11_011214_create_subcategories_table', 1),
(21, '2025_01_12_022730_create_tags_table', 1),
(22, '2025_01_12_023021_create_taggables_table', 1),
(23, '2025_01_12_023044_create_clients_table', 1),
(24, '2025_01_18_030717_create_services_table', 1),
(25, '2025_01_18_030722_create_company_section_table', 1),
(26, '2025_01_19_054858_create_client_subcategory_table', 1),
(27, '2025_01_19_054858_create_lead_section_table', 1),
(28, '2025_01_19_054858_create_service_subcategory_table', 1),
(29, '2025_03_18_075112_create_topics_table', 1),
(30, '2025_03_18_075127_create_blogs_table', 1),
(31, '2025_05_19_160336_create_projects_table', 1),
(32, '2025_05_19_160340_create_project_service_table', 1),
(33, '2025_05_19_172354_create_batches_table', 1),
(34, '2025_05_20_003018_create_batch_clients_table', 1),
(35, '2025_05_20_024045_create_portfolios_table', 1),
(36, '2025_05_20_024046_create_portfolio_service_table', 1),
(37, '2025_05_20_030516_create_reviews_table', 1),
(38, '2025_05_20_032104_create_complains_table', 1),
(39, '2025_05_20_043506_create_materials_table', 1),
(40, '2025_05_20_085339_create_demands_table', 1),
(41, '2025_05_20_091630_create_subscriptions_table', 1),
(42, '2025_05_20_003018_create_seats_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `notable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notable_id` bigint UNSIGNED NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pipelines`
--

CREATE TABLE `pipelines` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `portfolios`
--

CREATE TABLE `portfolios` (
  `id` bigint UNSIGNED NOT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci,
  `challenge` text COLLATE utf8mb4_unicode_ci,
  `solution` text COLLATE utf8mb4_unicode_ci,
  `date` date DEFAULT NULL,
  `project_url` text COLLATE utf8mb4_unicode_ci,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expertise` text COLLATE utf8mb4_unicode_ci,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `portfolios`
--

INSERT INTO `portfolios` (`id`, `client_id`, `name`, `slug`, `client_name`, `details`, `challenge`, `solution`, `date`, `project_url`, `location`, `expertise`, `type`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Vernon Rhodes', 'vernon-rhodes-682f57892540f', 'Arthur Sanford', 'Iusto pariatur Elig', 'Nihil voluptas volup', 'Labore repudiandae a', '1989-06-18', 'https://www.rubibiqa.cm', 'Qui rem id deserunt', '[\"Dolorem cupidatat al\"]', 'Eiusmod optio ducim', NULL, '2025-05-22 16:57:45', '2025-05-22 16:57:45'),
(2, 1, 'Lana Morton', 'lana-morton-683128f0e8005', 'Gay Joseph', 'Enim commodi est ad', 'Eu voluptas et repud', 'Ad nemo provident t', '2009-02-18', 'https://www.bizuqosamazow.me.uk', 'Ex dolore et consect', '[\"Vero nobis nobis dol\",\"s\",\"sd\",\"sde\"]', 'Molestiae earum dese', NULL, '2025-05-24 02:03:28', '2025-06-23 22:48:52');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio_service`
--

CREATE TABLE `portfolio_service` (
  `id` bigint UNSIGNED NOT NULL,
  `portfolio_id` bigint UNSIGNED NOT NULL,
  `service_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `portfolio_service`
--

INSERT INTO `portfolio_service` (`id`, `portfolio_id`, `service_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 2, 1, NULL, NULL),
(3, 2, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint UNSIGNED NOT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `winner_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci,
  `skills` text COLLATE utf8mb4_unicode_ci,
  `more_details` text COLLATE utf8mb4_unicode_ci,
  `budget_min` double DEFAULT NULL,
  `budget_max` double DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `client_id`, `winner_id`, `name`, `slug`, `details`, `skills`, `more_details`, `budget_min`, `budget_max`, `location`, `status`, `is_active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'name name', 'iliana-griffith', 'DETAILS AWI AWI', '[\"vfvffv\",\"hossam\"]', 'MORE DETails', 35, 50, 'EGYPT', 'active', 0, NULL, '2025-05-24 04:55:19', '2025-05-26 01:17:42'),
(6, 1, NULL, 'dddddddس', 'ddddddd', 'ddddd', NULL, 'Exercitationem nisidddeddddd', 22, 91, 'Nulla voluptas labor', 'awarded', 1, NULL, '2025-05-24 05:00:35', '2025-05-26 03:52:45'),
(7, 2, NULL, 'ddd', 'ddd', 'dddd', NULL, 'dddd', 1100, 23200, 'dcsds', 'active', 1, NULL, '2025-05-24 06:20:44', '2025-05-24 06:20:44'),
(8, 1, NULL, 'the porject', 'the-porject', 'Amet quia recusanda', '[\"vfvffv\",\"hossam\"]', 'Exercitationem qui e', 87, 100, 'Porro excepturi et a', 'active', 1, NULL, '2025-05-24 06:21:52', '2025-05-24 18:13:42'),
(9, 1, NULL, 'Nelle Dale', 'nelle-dale', 'Natus corporis labor', NULL, 'Anim voluptate sit', 88, 100, 'Culpa possimus com', 'active', 1, NULL, '2025-05-25 19:53:58', '2025-05-26 04:47:23');

-- --------------------------------------------------------

--
-- Table structure for table `project_service`
--

CREATE TABLE `project_service` (
  `id` bigint UNSIGNED NOT NULL,
  `project_id` bigint UNSIGNED NOT NULL,
  `service_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_service`
--

INSERT INTO `project_service` (`id`, `project_id`, `service_id`, `created_at`, `updated_at`) VALUES
(1, 8, 1, NULL, NULL),
(2, 8, 2, NULL, NULL),
(3, 8, 3, NULL, NULL),
(4, 1, 1, NULL, NULL),
(5, 1, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint UNSIGNED NOT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `reviewable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reviewable_id` bigint UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` int NOT NULL,
  `is_approved` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `client_id`, `reviewable_type`, `reviewable_id`, `content`, `rating`, `is_approved`, `created_at`, `updated_at`) VALUES
(1, 1, 'App\\Models\\Demand', 3, 'fdn\'ofd jdpnfpa\'af j\'afan\\ip\'a', 5, 1, '2025-07-04 05:41:02', '2025-07-04 05:44:42');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `seats`
--

CREATE TABLE `seats` (
  `id` bigint UNSIGNED NOT NULL,
  `batch_id` bigint UNSIGNED NOT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `budget_min` double DEFAULT NULL,
  `budget_max` double DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `is_applied` tinyint(1) NOT NULL DEFAULT '0',
  `is_contacted` tinyint(1) NOT NULL DEFAULT '0',
  `is_proposal` tinyint(1) NOT NULL DEFAULT '0',
  `is_accepted` tinyint(1) NOT NULL DEFAULT '0',
  `is_rejected` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seats`
--

INSERT INTO `seats` (`id`, `batch_id`, `client_id`, `budget_min`, `budget_max`, `status`, `is_applied`, `is_contacted`, `is_proposal`, `is_accepted`, `is_rejected`, `created_at`, `updated_at`) VALUES
(4, 17, 2, 100, 200, 'contacted', 1, 1, 0, 0, 0, '2025-05-26 01:32:13', '2025-05-26 02:39:57'),
(5, 21, 1, 100, 200, 'pending', 1, 0, 0, 0, 0, '2025-05-26 01:32:13', '2025-05-26 02:39:57'),
(6, 21, 1, 100, 200, 'pending', 1, 1, 1, 1, 0, '2025-05-26 01:32:13', '2025-05-26 02:39:57'),
(7, 21, 1, 100, 200, 'pending', 1, 1, 1, 0, 1, '2025-05-26 01:32:13', '2025-05-26 02:39:57'),
(8, 21, 1, 100, 200, 'pending', 1, 1, 0, 0, 0, '2025-05-26 01:32:13', '2025-05-26 02:39:57');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `name`, `details`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Free registration', 'Make your profile and let team members access and follow your company profile.\r\nMake offers and campaigns with one click.', NULL, '2025-06-27 00:52:03', '2025-06-27 00:52:03'),
(2, 'Paid services', 'Unleash your employees more than 3 to follow your company/ enterprise  profile 24/7 monitoring.', NULL, '2025-06-27 00:55:40', '2025-06-27 00:55:40'),
(3, 'Trade knowledge and help', 'Use our experience in global trade to know more data and learn your beginner or professional  employees how to make a legal and guaranteed deal with suitable countries and companies your country has a trade agreements with AI help.', NULL, '2025-06-27 02:41:19', '2025-06-27 02:41:19');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint UNSIGNED NOT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci,
  `price` double DEFAULT NULL,
  `skills` text COLLATE utf8mb4_unicode_ci,
  `level` int DEFAULT NULL,
  `years_experience` int DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `client_id`, `name`, `slug`, `details`, `price`, `skills`, `level`, `years_experience`, `is_active`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'ss', 'ss', 'vdcvsdvfsv fsvfsdvfdcvsdvfsv fsvfsdvfdcvsdvfsv fsvfsdvfdcvsdvfsv fsvfsdvfdcvsdvfsv fsvfsdvfdcvsdvfsv fsvfsdvfdcvsdvfsv fsvfsdvfdcvsdvfsv fsvfsdvfdcvsdvfsv fsvfsdvfdcvsdvfsv fsvfsdvf', 123, '[\"d\",\"f\",\"g\",\"scsa\",\"ccasca\",\"cascas\",\"fssffsfs\"]', 9, 10, 1, NULL, '2025-05-16 02:00:41', '2025-06-24 08:32:39'),
(2, 1, 'Service 2dd', 'service-2', 'Service 2sdddd', 700, NULL, 10, 5, 1, NULL, '2025-05-24 02:02:20', '2025-06-23 19:57:24'),
(3, 1, 'cdsds', 'cdsds', 'cdscds', 123, NULL, 6, 324, 1, NULL, '2025-05-24 02:15:45', '2025-06-23 22:41:11'),
(4, 2, 's', 's', 'يييdd', 700, '[\"d\",\"f\",\"g\"]', 5, 1, 1, NULL, '2025-06-23 19:42:29', '2025-06-23 19:50:37');

-- --------------------------------------------------------

--
-- Table structure for table `service_subcategory`
--

CREATE TABLE `service_subcategory` (
  `id` bigint UNSIGNED NOT NULL,
  `service_id` bigint UNSIGNED NOT NULL,
  `subcategory_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_subcategory`
--

INSERT INTO `service_subcategory` (`id`, `service_id`, `subcategory_id`, `created_at`, `updated_at`) VALUES
(3, 3, 1, NULL, NULL),
(4, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('XbiYxLyhsiE5axJKM16gMcwnsDgFrkZn32LnC2Iw', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUXZMaXh5VWFPSW1yOW93eFZ1dnRLQWNSeVViTTJWWkNrcFBIRVdnMSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHBzOi8vYnpucy50ZXN0L2NsaWVudC8xIjt9czo1MzoibG9naW5fY2xpZW50XzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mjt9', 1751609586);

-- --------------------------------------------------------

--
-- Table structure for table `stages`
--

CREATE TABLE `stages` (
  `id` bigint UNSIGNED NOT NULL,
  `pipeline_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `percentage` double DEFAULT NULL,
  `place` int DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `category_id`, `name`, `slug`, `details`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Crop Farming', 'crop-farming', 'Crop Farming', NULL, '2025-05-24 01:40:33', '2025-07-01 10:22:10'),
(2, 1, 'Field crops', 'field-crops', 'Field crops', NULL, '2025-07-01 10:22:22', '2025-07-01 10:22:22'),
(3, 1, 'Vegetables and fruits', 'vegetables-and-fruits', 'Vegetables and fruits', NULL, '2025-07-01 10:22:33', '2025-07-01 10:22:33'),
(4, 1, 'Organic farming', 'organic-farming', 'Organic farming', NULL, '2025-07-01 10:23:17', '2025-07-01 10:23:17'),
(5, 1, 'Nurseries and seeds', 'nurseries-and-seeds', 'Nurseries and seeds', NULL, '2025-07-01 10:23:39', '2025-07-01 10:23:39'),
(6, 1, 'Hydroponics & Aeroponics', 'hydroponics-aeroponics', 'Hydroponics & Aeroponics', NULL, '2025-07-01 10:24:55', '2025-07-01 10:24:55'),
(7, 1, 'Animal Production', 'animal-production', 'Animal Production', NULL, '2025-07-01 10:25:23', '2025-07-01 10:25:23'),
(8, 1, 'Livestock', 'livestock', 'Livestock', NULL, '2025-07-01 10:25:38', '2025-07-01 10:25:38'),
(9, 1, 'Poultry', 'poultry', 'Poultry', NULL, '2025-07-01 10:25:47', '2025-07-01 10:25:47'),
(10, 1, 'Aquaculture', 'aquaculture', 'Aquaculture', NULL, '2025-07-01 10:25:52', '2025-07-01 10:25:52'),
(11, 1, 'Beekeeping', 'beekeeping', 'Beekeeping', NULL, '2025-07-01 10:25:58', '2025-07-01 10:25:58'),
(12, 1, 'Agricultural Equipment', 'agricultural-equipment', 'Agricultural Equipment', NULL, '2025-07-01 10:26:32', '2025-07-01 10:26:32'),
(13, 1, 'Agricultural Services', 'agricultural-services', 'Agricultural Services', NULL, '2025-07-01 10:26:45', '2025-07-01 10:26:45'),
(14, 2, 'Food Industries', 'food-industries', 'Food Industries', NULL, '2025-07-01 11:03:24', '2025-07-01 11:03:24'),
(15, 2, 'Chemical Industries', 'chemical-industries', 'Chemical Industries', NULL, '2025-07-01 11:04:47', '2025-07-01 11:04:47'),
(16, 2, 'Engineering Industries', 'engineering-industries', 'Engineering Industries', NULL, '2025-07-01 11:04:55', '2025-07-01 11:04:55'),
(17, 2, 'Processing & Recycling', 'processing-recycling', 'Processing & Recycling', NULL, '2025-07-01 11:05:34', '2025-07-01 11:05:34'),
(18, 2, 'Heavy Industries', 'heavy-industries', 'Heavy Industries', NULL, '2025-07-01 11:05:43', '2025-07-01 11:05:43'),
(19, 2, 'Textile Industries', 'textile-industries', 'Textile Industries', NULL, '2025-07-01 11:05:51', '2025-07-01 11:05:51'),
(20, 2, 'Industrial Services', 'industrial-services', 'Industrial Services', NULL, '2025-07-01 11:06:01', '2025-07-01 11:06:01'),
(21, 3, 'Retail & Wholesale', 'retail-wholesale', 'Retail & Wholesale', NULL, '2025-07-01 11:06:15', '2025-07-01 11:06:15'),
(22, 3, 'Import & Export', 'import-export', 'Import & Export', NULL, '2025-07-01 11:06:25', '2025-07-01 11:06:25'),
(23, 3, 'E-commerce', 'e-commerce', 'E-commerce', NULL, '2025-07-01 11:06:31', '2025-07-01 11:06:31'),
(24, 3, 'Shopping Centers', 'shopping-centers', 'Shopping Centers', NULL, '2025-07-01 11:06:38', '2025-07-01 11:06:38'),
(25, 3, 'Warehousing & Storage', 'warehousing-storage', 'Warehousing & Storage', NULL, '2025-07-01 11:06:44', '2025-07-01 11:06:44'),
(26, 3, 'Logistics Services', 'logistics-services', 'Logistics Services', NULL, '2025-07-01 11:07:08', '2025-07-01 11:07:08'),
(27, 4, 'Education & Training', 'education-training', 'Education & Training', NULL, '2025-07-01 11:07:32', '2025-07-01 11:07:32'),
(28, 4, 'Medical Services', 'medical-services', 'Medical Services', NULL, '2025-07-01 11:07:40', '2025-07-01 11:07:40'),
(29, 4, 'Information Technology', 'information-technology', 'Information Technology', NULL, '2025-07-01 11:07:54', '2025-07-01 11:07:54'),
(30, 4, 'Financial Services', 'financial-services', 'Financial Services', NULL, '2025-07-01 11:08:02', '2025-07-01 11:08:02'),
(31, 4, 'Consulting Services', 'consulting-services', 'Consulting Services', NULL, '2025-07-01 11:08:15', '2025-07-01 11:08:15'),
(32, 4, 'Tourism & Hospitality', 'tourism-hospitality', 'Tourism & Hospitality', NULL, '2025-07-01 11:08:31', '2025-07-01 11:08:31'),
(33, 4, 'Cleaning & Security Services', 'cleaning-security-services', 'Cleaning & Security Services', NULL, '2025-07-01 11:08:43', '2025-07-01 11:08:43'),
(34, 4, 'Delivery & Courier Services', 'delivery-courier-services', 'Delivery & Courier Services', NULL, '2025-07-01 11:09:47', '2025-07-01 11:09:47'),
(35, 4, 'Other Service', 'other-service', 'Others', NULL, '2025-07-01 11:10:15', '2025-07-01 11:11:21'),
(36, 3, 'Other Commercial', 'other-commercial', 'Others Commercial', NULL, '2025-07-01 11:10:58', '2025-07-01 11:10:58'),
(37, 2, 'Other Industrial', 'other-industrial', 'Other Industrial', NULL, '2025-07-01 11:11:39', '2025-07-01 11:11:39'),
(38, 1, 'Other Agricultural', 'other-agricultural', 'Other Agricultural', NULL, '2025-07-01 11:11:52', '2025-07-01 11:11:52');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint UNSIGNED NOT NULL,
  `client_id` bigint UNSIGNED NOT NULL,
  `starts_at` date NOT NULL,
  `ends_at` date NOT NULL,
  `price` float DEFAULT NULL,
  `billing_cycle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `is_paid` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `client_id`, `starts_at`, `ends_at`, `price`, `billing_cycle`, `is_active`, `is_paid`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, '2025-06-29', '2025-07-29', 65, 'monthly', 0, 1, NULL, '2025-06-29 19:55:52', NULL),
(7, 1, '2025-06-30', '2026-06-30', 45, 'annual', 0, 1, NULL, '2025-06-30 20:31:38', '2025-06-30 20:31:38'),
(8, 1, '2025-07-03', '2026-01-03', 55, 'semi-annual', 1, 1, NULL, '2025-07-03 19:37:19', '2025-07-03 19:37:19');

-- --------------------------------------------------------

--
-- Table structure for table `taggables`
--

CREATE TABLE `taggables` (
  `id` bigint UNSIGNED NOT NULL,
  `tag_id` bigint UNSIGNED NOT NULL,
  `taggable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `taggable_id` bigint UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `name`, `slug`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Topic1', 'topic1', NULL, '2025-05-24 01:40:47', '2025-05-24 01:40:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
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
(1, 'hossam farid', 'hossamfarid71@gmail.com', NULL, '$2y$12$hhaKRljTsBH8y0igiBQcj.LjiXDtDF.24PM3lzypQTK9EQcSwPAVW', NULL, '2025-05-21 23:04:57', '2025-05-21 23:04:57'),
(2, 'ddd', 'dd@gmail.com', NULL, '$2y$12$5flu1CA0VYInDeJXD9wFQu1J4n9q4NG/U8x6VgdNEN/xhGNglglVK', NULL, '2025-05-26 12:16:38', '2025-05-26 12:16:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `batches`
--
ALTER TABLE `batches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `batches_client_id_foreign` (`client_id`),
  ADD KEY `batches_project_id_foreign` (`project_id`);

--
-- Indexes for table `batch_clients`
--
ALTER TABLE `batch_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `batch_clients_batch_id_foreign` (`batch_id`),
  ADD KEY `batch_clients_client_id_foreign` (`client_id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blogs_topic_id_foreign` (`topic_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clients_email_unique` (`email`);

--
-- Indexes for table `client_subcategory`
--
ALTER TABLE `client_subcategory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_subcategory_client_id_foreign` (`client_id`),
  ADD KEY `client_subcategory_subcategory_id_foreign` (`subcategory_id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `companies_industry_id_foreign` (`industry_id`);

--
-- Indexes for table `company_deal`
--
ALTER TABLE `company_deal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_deal_company_id_foreign` (`company_id`),
  ADD KEY `company_deal_deal_id_foreign` (`deal_id`);

--
-- Indexes for table `company_section`
--
ALTER TABLE `company_section`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_section_company_id_foreign` (`company_id`),
  ADD KEY `company_section_section_id_foreign` (`section_id`);

--
-- Indexes for table `complains`
--
ALTER TABLE `complains`
  ADD PRIMARY KEY (`id`),
  ADD KEY `complains_from_client_id_foreign` (`from_client_id`),
  ADD KEY `complains_to_client_id_foreign` (`to_client_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contacts_company_id_foreign` (`company_id`);

--
-- Indexes for table `contact_deal`
--
ALTER TABLE `contact_deal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contact_deal_contact_id_foreign` (`contact_id`),
  ADD KEY `contact_deal_deal_id_foreign` (`deal_id`);

--
-- Indexes for table `deals`
--
ALTER TABLE `deals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `deals_pipeline_id_foreign` (`pipeline_id`),
  ADD KEY `deals_stage_id_foreign` (`stage_id`),
  ADD KEY `deals_company_id_foreign` (`company_id`);

--
-- Indexes for table `demands`
--
ALTER TABLE `demands`
  ADD PRIMARY KEY (`id`),
  ADD KEY `demands_from_client_id_foreign` (`from_client_id`),
  ADD KEY `demands_to_client_id_foreign` (`to_client_id`),
  ADD KEY `demands_service_id_foreign` (`service_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `industries`
--
ALTER TABLE `industries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leads`
--
ALTER TABLE `leads`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `leads_email_unique` (`email`),
  ADD KEY `leads_pipeline_id_foreign` (`pipeline_id`),
  ADD KEY `leads_stage_id_foreign` (`stage_id`),
  ADD KEY `leads_industry_id_foreign` (`industry_id`),
  ADD KEY `leads_company_id_foreign` (`company_id`),
  ADD KEY `leads_contact_id_foreign` (`contact_id`),
  ADD KEY `leads_deal_id_foreign` (`deal_id`);

--
-- Indexes for table `lead_section`
--
ALTER TABLE `lead_section`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lead_section_lead_id_foreign` (`lead_id`),
  ADD KEY `lead_section_section_id_foreign` (`section_id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `logs_user_id_foreign` (`user_id`),
  ADD KEY `logs_loggable_type_loggable_id_index` (`loggable_type`,`loggable_id`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `materials_subcategory_id_foreign` (`subcategory_id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `media_uuid_unique` (`uuid`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`),
  ADD KEY `media_order_column_index` (`order_column`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
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
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notes_user_id_foreign` (`user_id`),
  ADD KEY `notes_notable_type_notable_id_index` (`notable_type`,`notable_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `pipelines`
--
ALTER TABLE `pipelines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolios`
--
ALTER TABLE `portfolios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `portfolios_client_id_foreign` (`client_id`);

--
-- Indexes for table `portfolio_service`
--
ALTER TABLE `portfolio_service`
  ADD PRIMARY KEY (`id`),
  ADD KEY `portfolio_service_portfolio_id_foreign` (`portfolio_id`),
  ADD KEY `portfolio_service_service_id_foreign` (`service_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projects_client_id_foreign` (`client_id`),
  ADD KEY `projects_winner_foreign` (`winner_id`);

--
-- Indexes for table `project_service`
--
ALTER TABLE `project_service`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_service_project_id_foreign` (`project_id`),
  ADD KEY `project_service_service_id_foreign` (`service_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_client_id_foreign` (`client_id`),
  ADD KEY `reviews_reviewable_type_reviewable_id_index` (`reviewable_type`,`reviewable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seats_batch_id_foreign` (`batch_id`),
  ADD KEY `seats_client_id_foreign` (`client_id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `services_client_id_foreign` (`client_id`);

--
-- Indexes for table `service_subcategory`
--
ALTER TABLE `service_subcategory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_subcategory_service_id_foreign` (`service_id`),
  ADD KEY `service_subcategory_subcategory_id_foreign` (`subcategory_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `stages`
--
ALTER TABLE `stages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stages_pipeline_id_foreign` (`pipeline_id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subcategories_category_id_foreign` (`category_id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subscriptions_client_id_foreign` (`client_id`);

--
-- Indexes for table `taggables`
--
ALTER TABLE `taggables`
  ADD PRIMARY KEY (`id`),
  ADD KEY `taggables_tag_id_foreign` (`tag_id`),
  ADD KEY `taggables_taggable_type_taggable_id_index` (`taggable_type`,`taggable_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
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
-- AUTO_INCREMENT for table `batches`
--
ALTER TABLE `batches`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `batch_clients`
--
ALTER TABLE `batch_clients`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `client_subcategory`
--
ALTER TABLE `client_subcategory`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company_deal`
--
ALTER TABLE `company_deal`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company_section`
--
ALTER TABLE `company_section`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `complains`
--
ALTER TABLE `complains`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_deal`
--
ALTER TABLE `contact_deal`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deals`
--
ALTER TABLE `deals`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `demands`
--
ALTER TABLE `demands`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `industries`
--
ALTER TABLE `industries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leads`
--
ALTER TABLE `leads`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lead_section`
--
ALTER TABLE `lead_section`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pipelines`
--
ALTER TABLE `pipelines`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `portfolios`
--
ALTER TABLE `portfolios`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `portfolio_service`
--
ALTER TABLE `portfolio_service`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `project_service`
--
ALTER TABLE `project_service`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seats`
--
ALTER TABLE `seats`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `service_subcategory`
--
ALTER TABLE `service_subcategory`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `stages`
--
ALTER TABLE `stages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `taggables`
--
ALTER TABLE `taggables`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `batches`
--
ALTER TABLE `batches`
  ADD CONSTRAINT `batches_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `batches_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `batch_clients`
--
ALTER TABLE `batch_clients`
  ADD CONSTRAINT `batch_clients_batch_id_foreign` FOREIGN KEY (`batch_id`) REFERENCES `batches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `batch_clients_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_topic_id_foreign` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `client_subcategory`
--
ALTER TABLE `client_subcategory`
  ADD CONSTRAINT `client_subcategory_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `client_subcategory_subcategory_id_foreign` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `companies`
--
ALTER TABLE `companies`
  ADD CONSTRAINT `companies_industry_id_foreign` FOREIGN KEY (`industry_id`) REFERENCES `industries` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `company_deal`
--
ALTER TABLE `company_deal`
  ADD CONSTRAINT `company_deal_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `company_deal_deal_id_foreign` FOREIGN KEY (`deal_id`) REFERENCES `deals` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `company_section`
--
ALTER TABLE `company_section`
  ADD CONSTRAINT `company_section_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `company_section_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `complains`
--
ALTER TABLE `complains`
  ADD CONSTRAINT `complains_from_client_id_foreign` FOREIGN KEY (`from_client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `complains_to_client_id_foreign` FOREIGN KEY (`to_client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `contact_deal`
--
ALTER TABLE `contact_deal`
  ADD CONSTRAINT `contact_deal_contact_id_foreign` FOREIGN KEY (`contact_id`) REFERENCES `contacts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `contact_deal_deal_id_foreign` FOREIGN KEY (`deal_id`) REFERENCES `deals` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `deals`
--
ALTER TABLE `deals`
  ADD CONSTRAINT `deals_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `deals_pipeline_id_foreign` FOREIGN KEY (`pipeline_id`) REFERENCES `pipelines` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `deals_stage_id_foreign` FOREIGN KEY (`stage_id`) REFERENCES `stages` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `demands`
--
ALTER TABLE `demands`
  ADD CONSTRAINT `demands_from_client_id_foreign` FOREIGN KEY (`from_client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `demands_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `demands_to_client_id_foreign` FOREIGN KEY (`to_client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `leads`
--
ALTER TABLE `leads`
  ADD CONSTRAINT `leads_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `leads_contact_id_foreign` FOREIGN KEY (`contact_id`) REFERENCES `contacts` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `leads_deal_id_foreign` FOREIGN KEY (`deal_id`) REFERENCES `deals` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `leads_industry_id_foreign` FOREIGN KEY (`industry_id`) REFERENCES `industries` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `leads_pipeline_id_foreign` FOREIGN KEY (`pipeline_id`) REFERENCES `pipelines` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `leads_stage_id_foreign` FOREIGN KEY (`stage_id`) REFERENCES `stages` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `lead_section`
--
ALTER TABLE `lead_section`
  ADD CONSTRAINT `lead_section_lead_id_foreign` FOREIGN KEY (`lead_id`) REFERENCES `leads` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `lead_section_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `materials`
--
ALTER TABLE `materials`
  ADD CONSTRAINT `materials_subcategory_id_foreign` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `notes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `portfolios`
--
ALTER TABLE `portfolios`
  ADD CONSTRAINT `portfolios_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `portfolio_service`
--
ALTER TABLE `portfolio_service`
  ADD CONSTRAINT `portfolio_service_portfolio_id_foreign` FOREIGN KEY (`portfolio_id`) REFERENCES `portfolios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `portfolio_service_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `projects_winner_foreign` FOREIGN KEY (`winner_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `project_service`
--
ALTER TABLE `project_service`
  ADD CONSTRAINT `project_service_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `project_service_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `seats`
--
ALTER TABLE `seats`
  ADD CONSTRAINT `seats_batch_id_foreign` FOREIGN KEY (`batch_id`) REFERENCES `batches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `seats_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `service_subcategory`
--
ALTER TABLE `service_subcategory`
  ADD CONSTRAINT `service_subcategory_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `service_subcategory_subcategory_id_foreign` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `stages`
--
ALTER TABLE `stages`
  ADD CONSTRAINT `stages_pipeline_id_foreign` FOREIGN KEY (`pipeline_id`) REFERENCES `pipelines` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `subcategories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD CONSTRAINT `subscriptions_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `taggables`
--
ALTER TABLE `taggables`
  ADD CONSTRAINT `taggables_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
