-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Servidor: db
-- Tiempo de generación: 22-04-2026 a las 21:04:38
-- Versión del servidor: 8.0.44
-- Versión de PHP: 8.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `botiga_laravel`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `color`) VALUES
(1, 'Carretera', 'carretera', 'Lorem ipsum dolor sit amet', '#e51f82'),
(2, 'Muntanya', 'mtb', 'Lorem ipsum dolor sit amet', '#445500'),
(4, 'tandems', 'tandems', 'Bicicleta per a dos persones', '#460606');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
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
-- Estructura de tabla para la tabla `jobs`
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
-- Estructura de tabla para la tabla `job_batches`
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
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_01_21_162552_create_categories_table', 1),
(5, '2026_01_21_162622_create_products_table', 1),
(6, '2026_02_05_160329_create_orders_table', 1),
(7, '2026_02_05_160347_create_order_items_table', 1),
(8, '2026_04_12_161757_add_status_to_orders_table', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `subtotal` decimal(8,2) NOT NULL,
  `shipping` decimal(8,2) NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'cart'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `orders`
--

INSERT INTO `orders` (`id`, `subtotal`, `shipping`, `user_id`, `created_at`, `updated_at`, `status`) VALUES
(15, 0.00, 0.00, 4, '2026-04-14 21:21:00', '2026-04-14 21:21:00', 'cart'),
(17, 0.00, 0.00, 3, '2026-04-19 15:02:01', '2026-04-19 15:02:01', 'cart'),
(22, 0.00, 0.00, 2, '2026-04-21 15:09:20', '2026-04-21 15:09:20', 'cart'),
(24, 0.00, 0.00, 5, '2026-04-21 15:31:09', '2026-04-21 15:31:09', 'cart'),
(25, 0.00, 0.00, 7, '2026-04-21 17:23:10', '2026-04-21 17:23:10', 'cart');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `order_items`
--

CREATE TABLE `order_items` (
  `id` int UNSIGNED NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `quantity` int UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `order_items`
--

INSERT INTO `order_items` (`id`, `price`, `quantity`, `product_id`, `order_id`, `created_at`, `updated_at`) VALUES
(25, 1999.00, 1, 3, 25, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `extract` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `image` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visible` tinyint(1) NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `description`, `extract`, `price`, `image`, `visible`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'Bici Carretera 1', 'bici-carretera-1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus repellendus doloribus molestias odio nisi! Aspernatur eos saepe veniam quibusdam totam.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 1372.00, 'http://chainreactioncycles.scene7.com/is/image/ChainReactionCycles/prod141418_IMGSET?wid=500&hei=505', 1, 1, '2026-02-15 19:38:38', '2026-04-21 15:44:11'),
(2, 'Bici Carretera 2', 'carretera-2', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus repellendus doloribus molestias odio nisi! Aspernatur eos saepe veniam quibusdam totam.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 3154.00, 'http://chainreactioncycles.scene7.com/is/image/ChainReactionCycles/prod148153_IMGSET?wid=500&hei=505', 1, 1, '2026-02-15 19:38:38', '2026-02-15 19:38:38'),
(3, 'Bici Carretera 3', 'bici-carretera-3', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus repellendus doloribus molestias odio nisi! Aspernatur eos saepe veniam quibusdam totam.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 1999.00, 'http://chainreactioncycles.scene7.com/is/image/ChainReactionCycles/prod141430_IMGSET?wid=500&hei=505', 1, 1, '2026-02-15 19:38:38', '2026-04-21 15:44:24'),
(4, 'Bici Muntanya 1', 'mtb-1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus repellendus doloribus molestias odio nisi! Aspernatur eos saepe veniam quibusdam totam.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 1249.00, 'http://chainreactioncycles.scene7.com/is/image/ChainReactionCycles/prod146561_IMGSET?wid=500&hei=505', 1, 2, '2026-02-15 19:38:38', '2026-02-15 19:38:38'),
(5, 'Bici Muntanya 2', 'mtb-2', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus repellendus doloribus molestias odio nisi! Aspernatur eos saepe veniam quibusdam totam.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 590.00, 'http://chainreactioncycles.scene7.com/is/image/ChainReactionCycles/prod154507_IMGSET?wid=500&hei=505', 1, 2, '2026-02-15 19:38:38', '2026-02-15 19:38:38'),
(6, 'Bici Muntanya 3', 'mtb-3', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus repellendus doloribus molestias odio nisi! Aspernatur eos saepe veniam quibusdam totam.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 772.00, 'http://chainreactioncycles.scene7.com/is/image/ChainReactionCycles/prod141169_IMGSET?wid=500&hei=505', 1, 2, '2026-02-15 19:38:38', '2026-02-15 19:38:38'),
(7, 'Bici Carretera 4', 'carretera-4', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus repellendus doloribus molestias odio nisi! Aspernatur eos saepe veniam quibusdam totam.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 999.00, 'http://chainreactioncycles.scene7.com/is/image/ChainReactionCycles/prod141493_IMGSET?wid=500&hei=505', 1, 1, '2026-02-15 19:38:38', '2026-02-15 19:38:38'),
(8, 'Bici Muntanya 4', 'bici-muntanya-4', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus repellendus doloribus molestias odio nisi! Aspernatur eos saepe veniam quibusdam totam.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 1790.00, 'http://chainreactioncycles.scene7.com/is/image/ChainReactionCycles/prod135669_IMGSET?wid=500&hei=505', 1, 2, '2026-02-15 19:38:38', '2026-04-21 15:44:34'),
(9, 'Bici Tandem 1', 'bici-tandem-1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'Proves del formulari', 2500.00, 'https://moustachebikes.com/wp-content/uploads/2019/07/sa27ctalg240-samedi-27x2-side-drivetrain-view-studio-1500x1125.jpg', 1, 4, '2026-04-15 15:04:53', '2026-04-21 15:50:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
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
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('9wNuCPc5fw0LeIF6sHruRKYtJqRVHvR3JN3U533u', NULL, '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTndQeHd6NVpUVTA2bUZmcW5WQ1ZvaExEZ2QxczFCemtCb2RjeTdPUSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NTM6Imh0dHA6Ly9sb2NhbGhvc3Q6ODA4MC9ib3RpZ2EtbGFyYXZlbC9wdWJsaWMvaW5kZXgucGhwIjtzOjU6InJvdXRlIjtzOjQ6ImhvbWUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1776792190),
('orxe7LSmCVCtFFsjKuqFRuB3ZuhtwpVSaeisAEUe', 2, '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'YTo3OntzOjQ6ImNhcnQiO2E6NDp7czoxNjoiYmljaS1jYXJyZXRlcmEtMSI7TzoxODoiQXBwXE1vZGVsc1xQcm9kdWN0IjozMzp7czoxMzoiACoAY29ubmVjdGlvbiI7czo1OiJteXNxbCI7czo4OiIAKgB0YWJsZSI7czo4OiJwcm9kdWN0cyI7czoxMzoiACoAcHJpbWFyeUtleSI7czoyOiJpZCI7czoxMDoiACoAa2V5VHlwZSI7czozOiJpbnQiO3M6MTI6ImluY3JlbWVudGluZyI7YjoxO3M6NzoiACoAd2l0aCI7YTowOnt9czoxMjoiACoAd2l0aENvdW50IjthOjA6e31zOjE5OiJwcmV2ZW50c0xhenlMb2FkaW5nIjtiOjA7czoxMDoiACoAcGVyUGFnZSI7aToxNTtzOjY6ImV4aXN0cyI7YjoxO3M6MTg6Indhc1JlY2VudGx5Q3JlYXRlZCI7YjowO3M6Mjg6IgAqAGVzY2FwZVdoZW5DYXN0aW5nVG9TdHJpbmciO2I6MDtzOjEzOiIAKgBhdHRyaWJ1dGVzIjthOjEyOntzOjI6ImlkIjtpOjE7czo0OiJuYW1lIjtzOjE2OiJCaWNpIENhcnJldGVyYSAxIjtzOjQ6InNsdWciO3M6MTY6ImJpY2ktY2FycmV0ZXJhLTEiO3M6MTE6ImRlc2NyaXB0aW9uIjtzOjE1NDoiTG9yZW0gaXBzdW0gZG9sb3Igc2l0IGFtZXQsIGNvbnNlY3RldHVyIGFkaXBpc2ljaW5nIGVsaXQuIERlbGVjdHVzIHJlcGVsbGVuZHVzIGRvbG9yaWJ1cyBtb2xlc3RpYXMgb2RpbyBuaXNpISBBc3Blcm5hdHVyIGVvcyBzYWVwZSB2ZW5pYW0gcXVpYnVzZGFtIHRvdGFtLiI7czo3OiJleHRyYWN0IjtzOjU3OiJMb3JlbSBpcHN1bSBkb2xvciBzaXQgYW1ldCwgY29uc2VjdGV0dXIgYWRpcGlzaWNpbmcgZWxpdC4iO3M6NToicHJpY2UiO3M6NzoiMTM3Mi4wMCI7czo1OiJpbWFnZSI7czoxMDA6Imh0dHA6Ly9jaGFpbnJlYWN0aW9uY3ljbGVzLnNjZW5lNy5jb20vaXMvaW1hZ2UvQ2hhaW5SZWFjdGlvbkN5Y2xlcy9wcm9kMTQxNDE4X0lNR1NFVD93aWQ9NTAwJmhlaT01MDUiO3M6NzoidmlzaWJsZSI7aToxO3M6MTE6ImNhdGVnb3J5X2lkIjtpOjE7czoxMDoiY3JlYXRlZF9hdCI7czoxOToiMjAyNi0wMi0xNSAxOTozODozOCI7czoxMDoidXBkYXRlZF9hdCI7czoxOToiMjAyNi0wNC0yMSAxNTo0NDoxMSI7czo4OiJxdWFudGl0eSI7aToxO31zOjExOiIAKgBvcmlnaW5hbCI7YToxMTp7czoyOiJpZCI7aToxO3M6NDoibmFtZSI7czoxNjoiQmljaSBDYXJyZXRlcmEgMSI7czo0OiJzbHVnIjtzOjE2OiJiaWNpLWNhcnJldGVyYS0xIjtzOjExOiJkZXNjcmlwdGlvbiI7czoxNTQ6IkxvcmVtIGlwc3VtIGRvbG9yIHNpdCBhbWV0LCBjb25zZWN0ZXR1ciBhZGlwaXNpY2luZyBlbGl0LiBEZWxlY3R1cyByZXBlbGxlbmR1cyBkb2xvcmlidXMgbW9sZXN0aWFzIG9kaW8gbmlzaSEgQXNwZXJuYXR1ciBlb3Mgc2FlcGUgdmVuaWFtIHF1aWJ1c2RhbSB0b3RhbS4iO3M6NzoiZXh0cmFjdCI7czo1NzoiTG9yZW0gaXBzdW0gZG9sb3Igc2l0IGFtZXQsIGNvbnNlY3RldHVyIGFkaXBpc2ljaW5nIGVsaXQuIjtzOjU6InByaWNlIjtzOjc6IjEzNzIuMDAiO3M6NToiaW1hZ2UiO3M6MTAwOiJodHRwOi8vY2hhaW5yZWFjdGlvbmN5Y2xlcy5zY2VuZTcuY29tL2lzL2ltYWdlL0NoYWluUmVhY3Rpb25DeWNsZXMvcHJvZDE0MTQxOF9JTUdTRVQ/d2lkPTUwMCZoZWk9NTA1IjtzOjc6InZpc2libGUiO2k6MTtzOjExOiJjYXRlZ29yeV9pZCI7aToxO3M6MTA6ImNyZWF0ZWRfYXQiO3M6MTk6IjIwMjYtMDItMTUgMTk6Mzg6MzgiO3M6MTA6InVwZGF0ZWRfYXQiO3M6MTk6IjIwMjYtMDQtMjEgMTU6NDQ6MTEiO31zOjEwOiIAKgBjaGFuZ2VzIjthOjA6e31zOjExOiIAKgBwcmV2aW91cyI7YTowOnt9czo4OiIAKgBjYXN0cyI7YTowOnt9czoxNzoiACoAY2xhc3NDYXN0Q2FjaGUiO2E6MDp7fXM6MjE6IgAqAGF0dHJpYnV0ZUNhc3RDYWNoZSI7YTowOnt9czoxMzoiACoAZGF0ZUZvcm1hdCI7TjtzOjEwOiIAKgBhcHBlbmRzIjthOjA6e31zOjE5OiIAKgBkaXNwYXRjaGVzRXZlbnRzIjthOjA6e31zOjE0OiIAKgBvYnNlcnZhYmxlcyI7YTowOnt9czoxMjoiACoAcmVsYXRpb25zIjthOjA6e31zOjEwOiIAKgB0b3VjaGVzIjthOjA6e31zOjI3OiIAKgByZWxhdGlvbkF1dG9sb2FkQ2FsbGJhY2siO047czoyNjoiACoAcmVsYXRpb25BdXRvbG9hZENvbnRleHQiO047czoxMDoidGltZXN0YW1wcyI7YjoxO3M6MTM6InVzZXNVbmlxdWVJZHMiO2I6MDtzOjk6IgAqAGhpZGRlbiI7YTowOnt9czoxMDoiACoAdmlzaWJsZSI7YTowOnt9czoxMToiACoAZmlsbGFibGUiO2E6ODp7aTowO3M6NDoibmFtZSI7aToxO3M6NDoic2x1ZyI7aToyO3M6MTE6ImRlc2NyaXB0aW9uIjtpOjM7czo3OiJleHRyYWN0IjtpOjQ7czo1OiJpbWFnZSI7aTo1O3M6NzoidmlzaWJsZSI7aTo2O3M6NToicHJpY2UiO2k6NztzOjExOiJjYXRlZ29yeV9pZCI7fXM6MTA6IgAqAGd1YXJkZWQiO2E6MTp7aTowO3M6MToiKiI7fX1zOjExOiJjYXJyZXRlcmEtMiI7TzoxODoiQXBwXE1vZGVsc1xQcm9kdWN0IjozMzp7czoxMzoiACoAY29ubmVjdGlvbiI7czo1OiJteXNxbCI7czo4OiIAKgB0YWJsZSI7czo4OiJwcm9kdWN0cyI7czoxMzoiACoAcHJpbWFyeUtleSI7czoyOiJpZCI7czoxMDoiACoAa2V5VHlwZSI7czozOiJpbnQiO3M6MTI6ImluY3JlbWVudGluZyI7YjoxO3M6NzoiACoAd2l0aCI7YTowOnt9czoxMjoiACoAd2l0aENvdW50IjthOjA6e31zOjE5OiJwcmV2ZW50c0xhenlMb2FkaW5nIjtiOjA7czoxMDoiACoAcGVyUGFnZSI7aToxNTtzOjY6ImV4aXN0cyI7YjoxO3M6MTg6Indhc1JlY2VudGx5Q3JlYXRlZCI7YjowO3M6Mjg6IgAqAGVzY2FwZVdoZW5DYXN0aW5nVG9TdHJpbmciO2I6MDtzOjEzOiIAKgBhdHRyaWJ1dGVzIjthOjEyOntzOjI6ImlkIjtpOjI7czo0OiJuYW1lIjtzOjE2OiJCaWNpIENhcnJldGVyYSAyIjtzOjQ6InNsdWciO3M6MTE6ImNhcnJldGVyYS0yIjtzOjExOiJkZXNjcmlwdGlvbiI7czoxNTQ6IkxvcmVtIGlwc3VtIGRvbG9yIHNpdCBhbWV0LCBjb25zZWN0ZXR1ciBhZGlwaXNpY2luZyBlbGl0LiBEZWxlY3R1cyByZXBlbGxlbmR1cyBkb2xvcmlidXMgbW9sZXN0aWFzIG9kaW8gbmlzaSEgQXNwZXJuYXR1ciBlb3Mgc2FlcGUgdmVuaWFtIHF1aWJ1c2RhbSB0b3RhbS4iO3M6NzoiZXh0cmFjdCI7czo1NzoiTG9yZW0gaXBzdW0gZG9sb3Igc2l0IGFtZXQsIGNvbnNlY3RldHVyIGFkaXBpc2ljaW5nIGVsaXQuIjtzOjU6InByaWNlIjtzOjc6IjMxNTQuMDAiO3M6NToiaW1hZ2UiO3M6MTAwOiJodHRwOi8vY2hhaW5yZWFjdGlvbmN5Y2xlcy5zY2VuZTcuY29tL2lzL2ltYWdlL0NoYWluUmVhY3Rpb25DeWNsZXMvcHJvZDE0ODE1M19JTUdTRVQ/d2lkPTUwMCZoZWk9NTA1IjtzOjc6InZpc2libGUiO2k6MTtzOjExOiJjYXRlZ29yeV9pZCI7aToxO3M6MTA6ImNyZWF0ZWRfYXQiO3M6MTk6IjIwMjYtMDItMTUgMTk6Mzg6MzgiO3M6MTA6InVwZGF0ZWRfYXQiO3M6MTk6IjIwMjYtMDItMTUgMTk6Mzg6MzgiO3M6ODoicXVhbnRpdHkiO2k6MTt9czoxMToiACoAb3JpZ2luYWwiO2E6MTE6e3M6MjoiaWQiO2k6MjtzOjQ6Im5hbWUiO3M6MTY6IkJpY2kgQ2FycmV0ZXJhIDIiO3M6NDoic2x1ZyI7czoxMToiY2FycmV0ZXJhLTIiO3M6MTE6ImRlc2NyaXB0aW9uIjtzOjE1NDoiTG9yZW0gaXBzdW0gZG9sb3Igc2l0IGFtZXQsIGNvbnNlY3RldHVyIGFkaXBpc2ljaW5nIGVsaXQuIERlbGVjdHVzIHJlcGVsbGVuZHVzIGRvbG9yaWJ1cyBtb2xlc3RpYXMgb2RpbyBuaXNpISBBc3Blcm5hdHVyIGVvcyBzYWVwZSB2ZW5pYW0gcXVpYnVzZGFtIHRvdGFtLiI7czo3OiJleHRyYWN0IjtzOjU3OiJMb3JlbSBpcHN1bSBkb2xvciBzaXQgYW1ldCwgY29uc2VjdGV0dXIgYWRpcGlzaWNpbmcgZWxpdC4iO3M6NToicHJpY2UiO3M6NzoiMzE1NC4wMCI7czo1OiJpbWFnZSI7czoxMDA6Imh0dHA6Ly9jaGFpbnJlYWN0aW9uY3ljbGVzLnNjZW5lNy5jb20vaXMvaW1hZ2UvQ2hhaW5SZWFjdGlvbkN5Y2xlcy9wcm9kMTQ4MTUzX0lNR1NFVD93aWQ9NTAwJmhlaT01MDUiO3M6NzoidmlzaWJsZSI7aToxO3M6MTE6ImNhdGVnb3J5X2lkIjtpOjE7czoxMDoiY3JlYXRlZF9hdCI7czoxOToiMjAyNi0wMi0xNSAxOTozODozOCI7czoxMDoidXBkYXRlZF9hdCI7czoxOToiMjAyNi0wMi0xNSAxOTozODozOCI7fXM6MTA6IgAqAGNoYW5nZXMiO2E6MDp7fXM6MTE6IgAqAHByZXZpb3VzIjthOjA6e31zOjg6IgAqAGNhc3RzIjthOjA6e31zOjE3OiIAKgBjbGFzc0Nhc3RDYWNoZSI7YTowOnt9czoyMToiACoAYXR0cmlidXRlQ2FzdENhY2hlIjthOjA6e31zOjEzOiIAKgBkYXRlRm9ybWF0IjtOO3M6MTA6IgAqAGFwcGVuZHMiO2E6MDp7fXM6MTk6IgAqAGRpc3BhdGNoZXNFdmVudHMiO2E6MDp7fXM6MTQ6IgAqAG9ic2VydmFibGVzIjthOjA6e31zOjEyOiIAKgByZWxhdGlvbnMiO2E6MDp7fXM6MTA6IgAqAHRvdWNoZXMiO2E6MDp7fXM6Mjc6IgAqAHJlbGF0aW9uQXV0b2xvYWRDYWxsYmFjayI7TjtzOjI2OiIAKgByZWxhdGlvbkF1dG9sb2FkQ29udGV4dCI7TjtzOjEwOiJ0aW1lc3RhbXBzIjtiOjE7czoxMzoidXNlc1VuaXF1ZUlkcyI7YjowO3M6OToiACoAaGlkZGVuIjthOjA6e31zOjEwOiIAKgB2aXNpYmxlIjthOjA6e31zOjExOiIAKgBmaWxsYWJsZSI7YTo4OntpOjA7czo0OiJuYW1lIjtpOjE7czo0OiJzbHVnIjtpOjI7czoxMToiZGVzY3JpcHRpb24iO2k6MztzOjc6ImV4dHJhY3QiO2k6NDtzOjU6ImltYWdlIjtpOjU7czo3OiJ2aXNpYmxlIjtpOjY7czo1OiJwcmljZSI7aTo3O3M6MTE6ImNhdGVnb3J5X2lkIjt9czoxMDoiACoAZ3VhcmRlZCI7YToxOntpOjA7czoxOiIqIjt9fXM6NToibXRiLTEiO086MTg6IkFwcFxNb2RlbHNcUHJvZHVjdCI6MzM6e3M6MTM6IgAqAGNvbm5lY3Rpb24iO3M6NToibXlzcWwiO3M6ODoiACoAdGFibGUiO3M6ODoicHJvZHVjdHMiO3M6MTM6IgAqAHByaW1hcnlLZXkiO3M6MjoiaWQiO3M6MTA6IgAqAGtleVR5cGUiO3M6MzoiaW50IjtzOjEyOiJpbmNyZW1lbnRpbmciO2I6MTtzOjc6IgAqAHdpdGgiO2E6MDp7fXM6MTI6IgAqAHdpdGhDb3VudCI7YTowOnt9czoxOToicHJldmVudHNMYXp5TG9hZGluZyI7YjowO3M6MTA6IgAqAHBlclBhZ2UiO2k6MTU7czo2OiJleGlzdHMiO2I6MTtzOjE4OiJ3YXNSZWNlbnRseUNyZWF0ZWQiO2I6MDtzOjI4OiIAKgBlc2NhcGVXaGVuQ2FzdGluZ1RvU3RyaW5nIjtiOjA7czoxMzoiACoAYXR0cmlidXRlcyI7YToxMjp7czoyOiJpZCI7aTo0O3M6NDoibmFtZSI7czoxNToiQmljaSBNdW50YW55YSAxIjtzOjQ6InNsdWciO3M6NToibXRiLTEiO3M6MTE6ImRlc2NyaXB0aW9uIjtzOjE1NDoiTG9yZW0gaXBzdW0gZG9sb3Igc2l0IGFtZXQsIGNvbnNlY3RldHVyIGFkaXBpc2ljaW5nIGVsaXQuIERlbGVjdHVzIHJlcGVsbGVuZHVzIGRvbG9yaWJ1cyBtb2xlc3RpYXMgb2RpbyBuaXNpISBBc3Blcm5hdHVyIGVvcyBzYWVwZSB2ZW5pYW0gcXVpYnVzZGFtIHRvdGFtLiI7czo3OiJleHRyYWN0IjtzOjU3OiJMb3JlbSBpcHN1bSBkb2xvciBzaXQgYW1ldCwgY29uc2VjdGV0dXIgYWRpcGlzaWNpbmcgZWxpdC4iO3M6NToicHJpY2UiO3M6NzoiMTI0OS4wMCI7czo1OiJpbWFnZSI7czoxMDA6Imh0dHA6Ly9jaGFpbnJlYWN0aW9uY3ljbGVzLnNjZW5lNy5jb20vaXMvaW1hZ2UvQ2hhaW5SZWFjdGlvbkN5Y2xlcy9wcm9kMTQ2NTYxX0lNR1NFVD93aWQ9NTAwJmhlaT01MDUiO3M6NzoidmlzaWJsZSI7aToxO3M6MTE6ImNhdGVnb3J5X2lkIjtpOjI7czoxMDoiY3JlYXRlZF9hdCI7czoxOToiMjAyNi0wMi0xNSAxOTozODozOCI7czoxMDoidXBkYXRlZF9hdCI7czoxOToiMjAyNi0wMi0xNSAxOTozODozOCI7czo4OiJxdWFudGl0eSI7aToxO31zOjExOiIAKgBvcmlnaW5hbCI7YToxMTp7czoyOiJpZCI7aTo0O3M6NDoibmFtZSI7czoxNToiQmljaSBNdW50YW55YSAxIjtzOjQ6InNsdWciO3M6NToibXRiLTEiO3M6MTE6ImRlc2NyaXB0aW9uIjtzOjE1NDoiTG9yZW0gaXBzdW0gZG9sb3Igc2l0IGFtZXQsIGNvbnNlY3RldHVyIGFkaXBpc2ljaW5nIGVsaXQuIERlbGVjdHVzIHJlcGVsbGVuZHVzIGRvbG9yaWJ1cyBtb2xlc3RpYXMgb2RpbyBuaXNpISBBc3Blcm5hdHVyIGVvcyBzYWVwZSB2ZW5pYW0gcXVpYnVzZGFtIHRvdGFtLiI7czo3OiJleHRyYWN0IjtzOjU3OiJMb3JlbSBpcHN1bSBkb2xvciBzaXQgYW1ldCwgY29uc2VjdGV0dXIgYWRpcGlzaWNpbmcgZWxpdC4iO3M6NToicHJpY2UiO3M6NzoiMTI0OS4wMCI7czo1OiJpbWFnZSI7czoxMDA6Imh0dHA6Ly9jaGFpbnJlYWN0aW9uY3ljbGVzLnNjZW5lNy5jb20vaXMvaW1hZ2UvQ2hhaW5SZWFjdGlvbkN5Y2xlcy9wcm9kMTQ2NTYxX0lNR1NFVD93aWQ9NTAwJmhlaT01MDUiO3M6NzoidmlzaWJsZSI7aToxO3M6MTE6ImNhdGVnb3J5X2lkIjtpOjI7czoxMDoiY3JlYXRlZF9hdCI7czoxOToiMjAyNi0wMi0xNSAxOTozODozOCI7czoxMDoidXBkYXRlZF9hdCI7czoxOToiMjAyNi0wMi0xNSAxOTozODozOCI7fXM6MTA6IgAqAGNoYW5nZXMiO2E6MDp7fXM6MTE6IgAqAHByZXZpb3VzIjthOjA6e31zOjg6IgAqAGNhc3RzIjthOjA6e31zOjE3OiIAKgBjbGFzc0Nhc3RDYWNoZSI7YTowOnt9czoyMToiACoAYXR0cmlidXRlQ2FzdENhY2hlIjthOjA6e31zOjEzOiIAKgBkYXRlRm9ybWF0IjtOO3M6MTA6IgAqAGFwcGVuZHMiO2E6MDp7fXM6MTk6IgAqAGRpc3BhdGNoZXNFdmVudHMiO2E6MDp7fXM6MTQ6IgAqAG9ic2VydmFibGVzIjthOjA6e31zOjEyOiIAKgByZWxhdGlvbnMiO2E6MDp7fXM6MTA6IgAqAHRvdWNoZXMiO2E6MDp7fXM6Mjc6IgAqAHJlbGF0aW9uQXV0b2xvYWRDYWxsYmFjayI7TjtzOjI2OiIAKgByZWxhdGlvbkF1dG9sb2FkQ29udGV4dCI7TjtzOjEwOiJ0aW1lc3RhbXBzIjtiOjE7czoxMzoidXNlc1VuaXF1ZUlkcyI7YjowO3M6OToiACoAaGlkZGVuIjthOjA6e31zOjEwOiIAKgB2aXNpYmxlIjthOjA6e31zOjExOiIAKgBmaWxsYWJsZSI7YTo4OntpOjA7czo0OiJuYW1lIjtpOjE7czo0OiJzbHVnIjtpOjI7czoxMToiZGVzY3JpcHRpb24iO2k6MztzOjc6ImV4dHJhY3QiO2k6NDtzOjU6ImltYWdlIjtpOjU7czo3OiJ2aXNpYmxlIjtpOjY7czo1OiJwcmljZSI7aTo3O3M6MTE6ImNhdGVnb3J5X2lkIjt9czoxMDoiACoAZ3VhcmRlZCI7YToxOntpOjA7czoxOiIqIjt9fXM6NToibXRiLTIiO086MTg6IkFwcFxNb2RlbHNcUHJvZHVjdCI6MzM6e3M6MTM6IgAqAGNvbm5lY3Rpb24iO3M6NToibXlzcWwiO3M6ODoiACoAdGFibGUiO3M6ODoicHJvZHVjdHMiO3M6MTM6IgAqAHByaW1hcnlLZXkiO3M6MjoiaWQiO3M6MTA6IgAqAGtleVR5cGUiO3M6MzoiaW50IjtzOjEyOiJpbmNyZW1lbnRpbmciO2I6MTtzOjc6IgAqAHdpdGgiO2E6MDp7fXM6MTI6IgAqAHdpdGhDb3VudCI7YTowOnt9czoxOToicHJldmVudHNMYXp5TG9hZGluZyI7YjowO3M6MTA6IgAqAHBlclBhZ2UiO2k6MTU7czo2OiJleGlzdHMiO2I6MTtzOjE4OiJ3YXNSZWNlbnRseUNyZWF0ZWQiO2I6MDtzOjI4OiIAKgBlc2NhcGVXaGVuQ2FzdGluZ1RvU3RyaW5nIjtiOjA7czoxMzoiACoAYXR0cmlidXRlcyI7YToxMjp7czoyOiJpZCI7aTo1O3M6NDoibmFtZSI7czoxNToiQmljaSBNdW50YW55YSAyIjtzOjQ6InNsdWciO3M6NToibXRiLTIiO3M6MTE6ImRlc2NyaXB0aW9uIjtzOjE1NDoiTG9yZW0gaXBzdW0gZG9sb3Igc2l0IGFtZXQsIGNvbnNlY3RldHVyIGFkaXBpc2ljaW5nIGVsaXQuIERlbGVjdHVzIHJlcGVsbGVuZHVzIGRvbG9yaWJ1cyBtb2xlc3RpYXMgb2RpbyBuaXNpISBBc3Blcm5hdHVyIGVvcyBzYWVwZSB2ZW5pYW0gcXVpYnVzZGFtIHRvdGFtLiI7czo3OiJleHRyYWN0IjtzOjU3OiJMb3JlbSBpcHN1bSBkb2xvciBzaXQgYW1ldCwgY29uc2VjdGV0dXIgYWRpcGlzaWNpbmcgZWxpdC4iO3M6NToicHJpY2UiO3M6NjoiNTkwLjAwIjtzOjU6ImltYWdlIjtzOjEwMDoiaHR0cDovL2NoYWlucmVhY3Rpb25jeWNsZXMuc2NlbmU3LmNvbS9pcy9pbWFnZS9DaGFpblJlYWN0aW9uQ3ljbGVzL3Byb2QxNTQ1MDdfSU1HU0VUP3dpZD01MDAmaGVpPTUwNSI7czo3OiJ2aXNpYmxlIjtpOjE7czoxMToiY2F0ZWdvcnlfaWQiO2k6MjtzOjEwOiJjcmVhdGVkX2F0IjtzOjE5OiIyMDI2LTAyLTE1IDE5OjM4OjM4IjtzOjEwOiJ1cGRhdGVkX2F0IjtzOjE5OiIyMDI2LTAyLTE1IDE5OjM4OjM4IjtzOjg6InF1YW50aXR5IjtpOjE7fXM6MTE6IgAqAG9yaWdpbmFsIjthOjExOntzOjI6ImlkIjtpOjU7czo0OiJuYW1lIjtzOjE1OiJCaWNpIE11bnRhbnlhIDIiO3M6NDoic2x1ZyI7czo1OiJtdGItMiI7czoxMToiZGVzY3JpcHRpb24iO3M6MTU0OiJMb3JlbSBpcHN1bSBkb2xvciBzaXQgYW1ldCwgY29uc2VjdGV0dXIgYWRpcGlzaWNpbmcgZWxpdC4gRGVsZWN0dXMgcmVwZWxsZW5kdXMgZG9sb3JpYnVzIG1vbGVzdGlhcyBvZGlvIG5pc2khIEFzcGVybmF0dXIgZW9zIHNhZXBlIHZlbmlhbSBxdWlidXNkYW0gdG90YW0uIjtzOjc6ImV4dHJhY3QiO3M6NTc6IkxvcmVtIGlwc3VtIGRvbG9yIHNpdCBhbWV0LCBjb25zZWN0ZXR1ciBhZGlwaXNpY2luZyBlbGl0LiI7czo1OiJwcmljZSI7czo2OiI1OTAuMDAiO3M6NToiaW1hZ2UiO3M6MTAwOiJodHRwOi8vY2hhaW5yZWFjdGlvbmN5Y2xlcy5zY2VuZTcuY29tL2lzL2ltYWdlL0NoYWluUmVhY3Rpb25DeWNsZXMvcHJvZDE1NDUwN19JTUdTRVQ/d2lkPTUwMCZoZWk9NTA1IjtzOjc6InZpc2libGUiO2k6MTtzOjExOiJjYXRlZ29yeV9pZCI7aToyO3M6MTA6ImNyZWF0ZWRfYXQiO3M6MTk6IjIwMjYtMDItMTUgMTk6Mzg6MzgiO3M6MTA6InVwZGF0ZWRfYXQiO3M6MTk6IjIwMjYtMDItMTUgMTk6Mzg6MzgiO31zOjEwOiIAKgBjaGFuZ2VzIjthOjA6e31zOjExOiIAKgBwcmV2aW91cyI7YTowOnt9czo4OiIAKgBjYXN0cyI7YTowOnt9czoxNzoiACoAY2xhc3NDYXN0Q2FjaGUiO2E6MDp7fXM6MjE6IgAqAGF0dHJpYnV0ZUNhc3RDYWNoZSI7YTowOnt9czoxMzoiACoAZGF0ZUZvcm1hdCI7TjtzOjEwOiIAKgBhcHBlbmRzIjthOjA6e31zOjE5OiIAKgBkaXNwYXRjaGVzRXZlbnRzIjthOjA6e31zOjE0OiIAKgBvYnNlcnZhYmxlcyI7YTowOnt9czoxMjoiACoAcmVsYXRpb25zIjthOjA6e31zOjEwOiIAKgB0b3VjaGVzIjthOjA6e31zOjI3OiIAKgByZWxhdGlvbkF1dG9sb2FkQ2FsbGJhY2siO047czoyNjoiACoAcmVsYXRpb25BdXRvbG9hZENvbnRleHQiO047czoxMDoidGltZXN0YW1wcyI7YjoxO3M6MTM6InVzZXNVbmlxdWVJZHMiO2I6MDtzOjk6IgAqAGhpZGRlbiI7YTowOnt9czoxMDoiACoAdmlzaWJsZSI7YTowOnt9czoxMToiACoAZmlsbGFibGUiO2E6ODp7aTowO3M6NDoibmFtZSI7aToxO3M6NDoic2x1ZyI7aToyO3M6MTE6ImRlc2NyaXB0aW9uIjtpOjM7czo3OiJleHRyYWN0IjtpOjQ7czo1OiJpbWFnZSI7aTo1O3M6NzoidmlzaWJsZSI7aTo2O3M6NToicHJpY2UiO2k6NztzOjExOiJjYXRlZ29yeV9pZCI7fXM6MTA6IgAqAGd1YXJkZWQiO2E6MTp7aTowO3M6MToiKiI7fX19czo2OiJfdG9rZW4iO3M6NDA6ImJiOFZpaUwxTnIxRDFmVlFpbmNCU3BSdzBxN3lsT09BcXhQeFI2dnAiO3M6OToiX3ByZXZpb3VzIjthOjI6e3M6MzoidXJsIjtzOjUzOiJodHRwOi8vbG9jYWxob3N0OjgwODAvYm90aWdhLWxhcmF2ZWwvcHVibGljL2luZGV4LnBocCI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MDp7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7czo0OiJhdXRoIjthOjE6e3M6MjE6InBhc3N3b3JkX2NvbmZpcm1lZF9hdCI7aToxNzc2ODcxNjQ0O319', 1776873260),
('qWj2zQXCsvoN4vVTADjB612676mtYNvPf61VuLte', NULL, '172.18.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWXlUUllhUk81aGxac1NHalhtTjJUV2xtOTRkOG93cno3bFhIMjZYOSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NTM6Imh0dHA6Ly9sb2NhbGhvc3Q6ODA4MC9ib3RpZ2EtbGFyYXZlbC9wdWJsaWMvaW5kZXgucGhwIjtzOjU6InJvdXRlIjtzOjQ6ImhvbWUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1776891813);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('user','admin') COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `email`, `user`, `password`, `type`, `active`, `address`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Jesus', 'Gutierrez', 'chusgutierrez80@gmail.com', 'jesgut', '$2y$12$E7MAtvSNcwjVSePO.KdqOe3.lJNTc39FaQnN/bg20ognn6fQbmlV.', 'admin', 1, 'Carrer dr. Fleming 8, Sueca', NULL, '2026-02-15 19:38:38', '2026-02-15 19:38:38'),
(3, 'Carmen', 'Matoses Oller', 'carmen@example.com', 'carmat', '$2y$12$1Lrepwj56pMd5QpRYODmH.Hl.AotNR9GrTwT2g6XUSK9dmShHvKU.', 'admin', 1, 'Doctor Fleming 8, P 2, Pta 6', NULL, '2026-04-01 17:23:44', '2026-04-19 17:10:51'),
(4, 'Paula', 'Gutiérrez', 'paula@gmail.com', 'paula', '$2y$12$ZyQezrx5cTdtQORWnZL7OO31FCIiUC3/cLKneDGITMbu8HKV1XBH6', 'admin', 1, 'fleming 8', NULL, '2026-04-14 20:47:09', '2026-04-19 15:04:07'),
(5, 'Dani', 'Gutiérrez Sánchez', 'dani@example.com', 'dani', '$2y$12$f72SDLiPk1zgAbRfRp2L0.s1bOewGzjsuQGJYUnCjqyZua2qM/kvG', 'user', 1, 'carrer de l\'arros', NULL, '2026-04-19 18:01:07', '2026-04-19 18:01:07'),
(7, 'Leyre', 'Gutierrez', 'leyre@example.com', 'Leyre', '$2y$12$YOG8KEXWNb75ReMp9xMuROZ9CxsRLj9WIOl66GXsVNz54OVEx5ix6', 'user', 1, 'Dr. Fleming 8', NULL, '2026-04-21 17:22:39', '2026-04-21 17:22:39');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indices de la tabla `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indices de la tabla `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_user_unique` (`user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
