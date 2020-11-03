-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2020 at 03:15 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dhorunapi`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `user_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `session_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon_class` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `trending` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `image`, `icon_class`, `description`, `parent_id`, `trending`, `created_at`, `updated_at`) VALUES
(1, 'Baby Care', 'baby-care', NULL, NULL, NULL, 0, 0, '2020-10-25 11:38:34', '2020-10-25 11:38:34'),
(2, 'Newborn Essentials', 'newborn-essentials', NULL, NULL, NULL, 1, 0, '2020-10-25 12:00:20', '2020-10-25 12:00:20'),
(3, 'Diapers & Wipes', 'diapers-wipes', NULL, NULL, NULL, 1, 0, '2020-10-25 12:05:15', '2020-10-25 12:05:15'),
(4, 'Food', 'food', NULL, NULL, NULL, 0, 0, '2020-10-25 12:13:37', '2020-10-25 12:13:37'),
(5, 'Fruits & Vegetables', 'fruits-vegetables', NULL, NULL, NULL, 4, 0, '2020-10-25 12:14:05', '2020-10-25 12:14:05'),
(6, 'Breakfast', 'breakfast', NULL, NULL, NULL, 4, 0, '2020-10-25 12:14:25', '2020-10-25 12:14:25'),
(7, 'Beverages', 'beverages', NULL, NULL, NULL, 0, 0, '2020-10-25 12:14:44', '2020-10-25 12:14:44'),
(8, 'Soft Drinks', 'soft-drinks', NULL, NULL, NULL, 7, 0, '2020-10-25 12:15:01', '2020-10-25 12:15:01'),
(9, 'Coffee', 'coffee', NULL, NULL, NULL, 7, 0, '2020-10-25 12:15:18', '2020-10-27 09:04:30'),
(10, 'Meat & Fish', 'meat-fish', NULL, NULL, NULL, 0, 0, '2020-10-25 12:15:33', '2020-10-25 12:15:33'),
(11, 'Meat', 'meat', NULL, NULL, NULL, 10, 0, '2020-10-25 12:15:47', '2020-10-25 12:15:47'),
(12, 'Fresh Fish', 'fresh-fish', NULL, NULL, NULL, 10, 0, '2020-10-25 12:16:04', '2020-10-25 12:16:04'),
(13, 'Cooking', 'cooking', NULL, NULL, NULL, 0, 0, '2020-10-25 12:54:38', '2020-10-25 12:54:38'),
(14, 'Rice', 'rice', NULL, NULL, NULL, 13, 0, '2020-10-25 12:54:53', '2020-10-25 12:54:53'),
(15, 'Dal or Lentil', 'dal-or-lentil', NULL, NULL, NULL, 13, 0, '2020-10-25 12:55:24', '2020-10-25 12:55:24'),
(17, 'Home & Cleaning', 'home-cleaning', NULL, NULL, NULL, 0, 0, '2020-10-27 08:35:21', '2020-10-27 08:35:21'),
(18, 'Napkins & Paper Products', 'napkins-paper-products', NULL, NULL, NULL, 17, 0, '2020-10-27 09:24:33', '2020-10-27 09:24:33');

-- --------------------------------------------------------

--
-- Table structure for table `category_product`
--

CREATE TABLE `category_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_product`
--

INSERT INTO `category_product` (`id`, `category_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, NULL, NULL),
(2, 3, 2, NULL, NULL),
(3, 5, 3, NULL, NULL),
(4, 5, 4, NULL, NULL),
(5, 6, 5, NULL, NULL),
(6, 9, 6, NULL, NULL),
(7, 8, 7, NULL, NULL),
(8, 11, 8, NULL, NULL),
(9, 12, 9, NULL, NULL),
(10, 15, 10, NULL, NULL),
(11, 14, 11, NULL, NULL),
(13, 18, 13, NULL, NULL);

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
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(3, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(4, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(5, '2016_06_01_000004_create_oauth_clients_table', 1),
(6, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(7, '2019_08_19_000000_create_failed_jobs_table', 1),
(8, '2020_08_31_170536_create_products_table', 1),
(9, '2020_08_31_173546_create_reviews_table', 1),
(10, '2020_09_01_142702_create_categories_table', 1),
(11, '2020_09_01_164705_create_roles_table', 1),
(12, '2020_09_01_164706_create_users_table', 1),
(13, '2020_09_02_181417_create_category_product_table', 1),
(14, '2020_09_30_160204_add_unity_to_products_table', 1),
(15, '2020_10_07_175021_create_carts_table', 1),
(16, '2020_10_24_133457_create_sliders_table', 1),
(17, '2020_10_30_165502_create_order_areas_table', 2),
(18, '2020_11_01_165523_create_shipping_addresses_table', 3),
(19, '2020_11_02_100723_add_flat_rate_column_to_shipping_addresses_table', 4),
(20, '2020_11_02_164554_create_orders_table', 5),
(21, '2020_11_02_181633_create_order_product_table', 5),
(22, '2020_11_02_183844_add_order_total_to_orders_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('30de70da2772116a38380b03baba23328d3b3892026a2cf8fb17db6889d1459843518ff4155e1174', 1, 3, NULL, '[\"view-category\",\"create-categories\",\"update-categories\",\"delete-categories\",\"view-products\",\"create-products\",\"update-products\",\"delete-products\"]', 0, '2020-10-25 09:55:25', '2020-10-25 09:55:25', '2020-11-09 15:55:25'),
('e5ff1e46629e611731b08e28908c79ddb81bf0253b5dfe678cb6aefb2dbacf6dd39b0ffcf9db14dc', 2, 1, NULL, '[]', 0, '2020-10-26 02:21:16', '2020-10-26 02:21:16', '2021-10-26 08:21:16');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_auth_codes`
--

INSERT INTO `oauth_auth_codes` (`id`, `user_id`, `client_id`, `scopes`, `revoked`, `expires_at`) VALUES
('9f71a760d5475437af1f3dbcea58da807c40361e382eb330227f0ea299df66b4975844df886e5dfa', 1, 3, '[\"view-category\",\"create-categories\",\"update-categories\",\"delete-categories\",\"view-products\",\"create-products\",\"update-products\",\"delete-products\"]', 1, '2020-10-25 16:05:23');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'NX0DeO4frpiQiVn82SBIXjZgyfrJlRJxmta3EQFU', NULL, 'http://localhost', 1, 0, 0, '2020-10-25 09:43:52', '2020-10-25 09:43:52'),
(2, NULL, 'Laravel Password Grant Client', 'fFjZm0IDHAZtCDoFrjeQ8NY8OHPZ5l2LLdViDH83', 'users', 'http://localhost', 0, 1, 0, '2020-10-25 09:43:52', '2020-10-25 09:43:52'),
(3, 1, 'Dhorun', 'gIVDTafwrufQ0CS5fsmhE0kBiIJoKhKwfuxzyv0y', NULL, 'http://dhorunecommerce.test/oauth/callback', 0, 0, 0, '2020-10-25 09:54:34', '2020-10-25 09:54:34');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-10-25 09:43:52', '2020-10-25 09:43:52');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_refresh_tokens`
--

INSERT INTO `oauth_refresh_tokens` (`id`, `access_token_id`, `revoked`, `expires_at`) VALUES
('f8fd2f94c2de6756cdf6a380362bb2b680ef1fba8780ed05d13bdc07902ca169f65e1ed1bca900e2', '30de70da2772116a38380b03baba23328d3b3892026a2cf8fb17db6889d1459843518ff4155e1174', 0, '2021-10-25 15:55:25');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` int(11) NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_area` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_charge` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_amount` int(11) DEFAULT NULL,
  `order_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'processing',
  `payment_method` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `order_total` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `user_name`, `phone_number`, `address`, `customer_area`, `shipping_charge`, `coupon_code`, `coupon_amount`, `order_status`, `payment_method`, `created_at`, `updated_at`, `order_total`) VALUES
(1, 3, 'Emdadul Rayhan', 1813883707, '13/3 Ka, Level 8, Bashundhara City, Panthapath, Dhaka 1205', 'Feni', '30', NULL, NULL, 'processing', 'cash_on_delivery', '2020-11-02 14:05:17', '2020-11-02 14:05:17', '723'),
(2, 3, 'Emdadul Rayhan', 1813883707, '13/3 Ka, Level 8, Bashundhara City, Panthapath, Dhaka 1205', 'Feni', '30', NULL, NULL, 'processing', 'cash_on_delivery', '2020-11-02 14:14:47', '2020-11-02 14:14:47', '410'),
(3, 4, 'Fazle Rabbi', 1840241892, 'Tower (6th Floor), House, Shonim, 55 Shah Makhdum Ave, Dhaka 1230', 'Dhaka', '50', NULL, NULL, 'processing', 'cash_on_delivery', '2020-11-02 15:31:17', '2020-11-02 15:31:17', '225');

-- --------------------------------------------------------

--
-- Table structure for table `order_areas`
--

CREATE TABLE `order_areas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_area` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flat_rate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_areas`
--

INSERT INTO `order_areas` (`id`, `order_area`, `flat_rate`, `created_at`, `updated_at`) VALUES
(4, 'Feni', '30', '2020-10-30 12:54:52', '2020-10-30 12:54:52'),
(5, 'Dhaka', '50', '2020-10-30 13:08:56', '2020-10-30 13:08:56'),
(6, 'Chittagong', '40', '2020-10-30 13:09:06', '2020-10-30 13:09:06'),
(7, 'Chouddogram', '60', '2020-10-30 13:09:20', '2020-10-30 13:09:20');

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_qty` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`id`, `order_id`, `user_id`, `product_slug`, `product_code`, `product_name`, `product_size`, `product_color`, `product_price`, `product_qty`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 'molfix-baby-diaper-belt-1-new-born-2-5-kg', 'DD1', 'Molfix Baby Diaper Belt 1 New Born 2-5 kg', NULL, NULL, '693', '1', '2020-11-02 14:05:17', '2020-11-02 14:05:17'),
(2, 2, 3, 'johnson-s-extra-sensitive-baby-wipes', 'DBW1', 'Johnson\'s Extra Sensitive Baby Wipes', NULL, NULL, '325', '1', '2020-11-02 14:14:47', '2020-11-02 14:14:47'),
(3, 2, 3, 'red-tomato-net-weight-±-10-gm', 'DT10GM', 'Red Tomato (Net Weight ± 10 gm)', NULL, NULL, '55', '1', '2020-11-02 14:14:47', '2020-11-02 14:14:47'),
(4, 3, 4, 'special-brown-bread', 'DBB1', 'Special Brown Bread', NULL, NULL, '105', '1', '2020-11-02 15:31:17', '2020-11-02 15:31:17'),
(5, 3, 4, 'coca-cola', 'DCC1', 'Coca-Cola', NULL, NULL, '70', '1', '2020-11-02 15:31:17', '2020-11-02 15:31:17');

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `discount` int(11) DEFAULT NULL,
  `sku` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_desc` text COLLATE utf8mb4_unicode_ci,
  `long_desc` text COLLATE utf8mb4_unicode_ci,
  `specs` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gallery_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_desc` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trending` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `unity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `type`, `name`, `slug`, `price`, `stock`, `discount`, `sku`, `size`, `color`, `short_desc`, `long_desc`, `specs`, `featured_image`, `gallery_image`, `status`, `meta_title`, `meta_desc`, `trending`, `created_at`, `updated_at`, `unity`) VALUES
(1, 'simple', 'Molfix Baby Diaper Belt 1 New Born 2-5 kg', 'molfix-baby-diaper-belt-1-new-born-2-5-kg', 1100, 50, 37, 'DD1', NULL, NULL, 'Origin: Turkey\r\n\r\nMolfix baby diapers are produced with utmost care, they are extremely gentle on your baby\'s sensitive skin, and their green absorbent layer provides perfect dryness while the outer surface of the diaper protects the skin. Thanks to water-resistant barriers that prevent leaks, Molfix gives babies full protection and keeps their skin dry and healthy around the clock.', NULL, NULL, 'http://dhorunapi.test/public/storage/products/molfix-baby-diaper-belt-1-new-born-2-5-kg-2020-10-255f95c4a5d2610.png', NULL, 'on', NULL, NULL, 0, '2020-10-25 12:32:08', '2020-10-25 12:32:08', '44 pcs'),
(2, 'simple', 'Johnson\'s Extra Sensitive Baby Wipes', 'johnson-s-extra-sensitive-baby-wipes', 325, 30, NULL, 'DBW1', NULL, NULL, NULL, NULL, NULL, 'http://dhorunapi.test/public/storage/products/johnson-s-extra-sensitive-baby-wipes-2020-10-255f95c592115f6.png', NULL, 'on', NULL, NULL, 0, '2020-10-25 12:36:02', '2020-10-25 12:36:02', '22 pcs'),
(3, 'simple', 'Red Tomato (Net Weight ± 10 gm)', 'red-tomato-net-weight-±-10-gm', 55, 60, NULL, 'DT10GM', NULL, NULL, NULL, NULL, NULL, 'http://dhorunapi.test/public/storage/products/red-tomato-net-weight-±-10-gm-2020-10-255f95c6176b591.png', NULL, 'on', NULL, NULL, 0, '2020-10-25 12:38:16', '2020-10-25 12:38:16', '500 gm'),
(4, 'simple', 'Malta (Net Weight ± 50 gm)', 'malta-net-weight-±-50-gm', 400, 500, 25, 'DM50GM', NULL, NULL, NULL, NULL, NULL, 'http://dhorunapi.test/public/storage/products/malta-net-weight-±-50-gm-2020-10-255f95c693ad7a5.png', NULL, 'on', NULL, NULL, 0, '2020-10-25 12:40:20', '2020-10-25 12:40:20', '2 kg'),
(5, 'simple', 'Special Brown Bread', 'special-brown-bread', 105, 20, NULL, 'DBB1', NULL, NULL, NULL, NULL, NULL, 'http://dhorunapi.test/public/storage/products/special-brown-bread-2020-10-255f95c702593a7.png', NULL, 'on', NULL, NULL, 0, '2020-10-25 12:42:11', '2020-10-25 12:42:11', '300 gm'),
(6, 'simple', 'Nestlé NESCAFE Creamy Latte (Buy10 get 2Free)', 'nestlé-nescafe-creamy-latte-buy10-get-2free', 120, 80, NULL, 'DNCL1', NULL, NULL, NULL, NULL, NULL, 'http://dhorunapi.test/public/storage/products/nestlé-nescafe-creamy-latte-buy10-get-2free-2020-10-255f95c779d805b.png', NULL, 'on', NULL, NULL, 0, '2020-10-25 12:44:10', '2020-10-25 12:44:10', '10 pcs + 2 pcs Free'),
(7, 'simple', 'Coca-Cola', 'coca-cola', 70, 100, NULL, 'DCC1', NULL, NULL, NULL, NULL, NULL, 'http://dhorunapi.test/public/storage/products/coca-cola-2020-10-255f95c7dd34762.png', NULL, 'on', NULL, NULL, 0, '2020-10-25 12:45:49', '2020-10-25 12:45:49', '1.25 ltr'),
(8, 'simple', 'Bengal Meat Beef Bone In (Net Weight ± 50 gm)', 'bengal-meat-beef-bone-in-net-weight-±-50-gm', 635, 40, 6, 'DMBB50', NULL, NULL, NULL, NULL, NULL, 'http://dhorunapi.test/public/storage/products/bengal-meat-beef-bone-in-net-weight-±-50-gm-2020-10-255f95c97998eb7.png', NULL, 'on', NULL, NULL, 0, '2020-10-25 12:52:42', '2020-10-25 12:52:42', '1 kg'),
(9, 'simple', 'Shrimp Golda Medium (7-12 pcs)', 'shrimp-golda-medium-7-12-pcs', 370, 200, NULL, 'DGM1', NULL, NULL, NULL, NULL, NULL, 'http://dhorunapi.test/public/storage/products/shrimp-golda-medium-7-12-pcs-2020-10-255f95c9cb0613b.png', NULL, 'on', NULL, NULL, 0, '2020-10-25 12:54:03', '2020-10-25 12:54:03', '500 gm'),
(10, 'simple', 'Mug Dal', 'mug-dal', 69, 60, NULL, 'DMD1', NULL, NULL, NULL, NULL, NULL, 'http://dhorunapi.test/public/storage/products/mug-dal-2020-10-255f95ca6f0c37a.png', NULL, 'on', NULL, NULL, 0, '2020-10-25 12:56:48', '2020-10-25 12:56:48', '500 gm'),
(11, 'simple', 'Chinigura Rice', 'chinigura-rice', 99, 88, 10, 'DCR1', NULL, NULL, NULL, NULL, NULL, 'http://dhorunapi.test/public/storage/products/chinigura-rice-2020-10-255f95cac426ad8.png', NULL, 'on', NULL, NULL, 0, '2020-10-25 12:58:12', '2020-10-25 12:58:12', '1 kg'),
(13, 'simple', 'Bashundhara Kitchen Towel 2 Rolls', 'bashundhara-kitchen-towel-2-rolls', 114, 60, NULL, 'DBKT2', NULL, NULL, NULL, NULL, NULL, 'http://dhorunapi.test/public/storage/products/bashundhara-kitchen-towel-2-rolls-2020-10-275f98415b10378.png', NULL, 'on', NULL, NULL, 0, '2020-10-27 09:48:44', '2020-10-27 09:48:44', '2 pcs');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `customer` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `review` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `star` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shipping_addresses`
--

CREATE TABLE `shipping_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_area` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `flat_rate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping_addresses`
--

INSERT INTO `shipping_addresses` (`id`, `user_id`, `user_name`, `phone_number`, `address`, `customer_area`, `created_at`, `updated_at`, `flat_rate`) VALUES
(1, '3', 'Emdadul Rayhan', '01813883707', '13/3 Ka, Level 8, Bashundhara City, Panthapath, Dhaka 1205', 'Feni', '2020-11-02 04:30:38', '2020-11-02 14:12:42', '30'),
(2, '4', 'Fazle Rabbi', '01840241892', 'Tower (6th Floor), House, Shonim, 55 Shah Makhdum Ave, Dhaka 1230', 'Dhaka', '2020-11-02 12:03:27', '2020-11-02 15:30:58', '50');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` enum('admin','customer') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'customer',
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'avatar.png',
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `address`, `name`, `avatar`, `phone_number`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, 'Mahbubar Rahman', 'avatar.png', '01629733236', '$2y$10$jO1h1dbaKqzYWj7sTjUShuRDDtVQbS4/QN17s4OzeFGDPJWho7Iyi', NULL, '2020-10-25 09:44:17', '2020-10-25 09:44:17'),
(3, 'customer', '13/3 Ka, Level 8, Bashundhara City, Panthapath, Dhaka 1205', 'Emdadul Rayhan', 'avatar.png', '01813883707', '$2y$10$o5RBj/KRZlWx6tbJDNFBs.eaOdtFoLPp/s5lEvIkWqg8z1TaJj62u', NULL, '2020-10-28 12:23:17', '2020-11-02 14:12:42'),
(4, 'customer', 'Tower (6th Floor), House, Shonim, 55 Shah Makhdum Ave, Dhaka 1230', 'Fazle Rabbi', 'avatar.png', '01840241892', '$2y$10$cOWXUbI2OG1wixS1kAKgDeDVO2OY4AkhYK4MH1ROsI9JXIDe343iu', NULL, '2020-10-28 12:28:02', '2020-11-02 15:30:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_product`
--
ALTER TABLE `category_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_product_category_id_foreign` (`category_id`),
  ADD KEY `category_product_product_id_foreign` (`product_id`);

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
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_areas`
--
ALTER TABLE `order_areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
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
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_product_id_index` (`product_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_addresses`
--
ALTER TABLE `shipping_addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
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
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `category_product`
--
ALTER TABLE `category_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `order_areas`
--
ALTER TABLE `order_areas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shipping_addresses`
--
ALTER TABLE `shipping_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category_product`
--
ALTER TABLE `category_product`
  ADD CONSTRAINT `category_product_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `category_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
