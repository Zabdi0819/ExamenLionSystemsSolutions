-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-02-2023 a las 18:37:37
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `examen`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `appointment`
--

CREATE TABLE `appointment` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) NOT NULL,
  `mr_id` bigint(20) NOT NULL,
  `folio` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `hr_start` time NOT NULL,
  `hr_end` time NOT NULL,
  `total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `appointment`
--

INSERT INTO `appointment` (`id`, `customer_id`, `mr_id`, `folio`, `date`, `hr_start`, `hr_end`, `total`, `created_at`, `updated_at`) VALUES
(2, 3, 2, 'LION1826', '2023-02-02', '03:00:00', '04:00:00', 200, '2023-02-02 15:28:54', '2023-02-02 15:28:54'),
(5, 3, 2, 'LION8810', '2023-02-02', '03:00:00', '04:00:00', 200, '2023-02-02 15:44:20', '2023-02-02 15:44:20'),
(6, 4, 1, 'LION2344', '2023-03-02', '16:00:00', '18:00:00', 300, '2023-02-02 15:47:50', '2023-02-02 15:47:50'),
(7, 4, 1, 'LION2716', '2023-02-27', '13:00:00', '14:00:00', 150, '2023-02-02 15:48:01', '2023-02-02 15:48:01'),
(8, 4, 1, 'LION8171', '2023-02-24', '14:00:00', '16:00:00', 300, '2023-02-02 15:48:12', '2023-02-02 15:48:12'),
(9, 1, 1, 'LION2009', '2023-03-11', '14:00:00', '16:00:00', 300, '2023-02-02 15:48:22', '2023-02-02 15:48:22'),
(10, 7, 1, 'LION6106', '2023-02-20', '10:00:00', '12:00:00', 300, '2023-02-02 16:42:27', '2023-02-02 16:42:27'),
(11, 5, 1, 'LION1937', '2023-02-23', '09:00:00', '10:00:00', 150, '2023-02-02 16:42:37', '2023-02-02 16:42:37'),
(12, 6, 2, 'LION4275', '2023-05-31', '11:00:00', '13:00:00', 400, '2023-02-02 16:42:55', '2023-02-02 16:42:55'),
(13, 5, 2, 'LION9161', '2023-03-20', '12:00:00', '14:00:00', 400, '2023-02-02 16:43:38', '2023-02-02 16:43:38'),
(14, 7, 1, 'LION6725', '2023-02-02', '11:00:00', '13:00:00', 300, '2023-02-02 23:17:42', '2023-02-02 23:17:42'),
(15, 6, 2, 'LION3091', '2023-02-02', '11:00:00', '12:00:00', 200, '2023-02-02 23:17:59', '2023-02-02 23:17:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `customers`
--

INSERT INTO `customers` (`id`, `name`, `last_name`, `phone`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Juan', 'Lopez', '9879879870', 'juan@gmail.com', '2023-01-30 16:15:53', '2023-02-02 15:34:36'),
(3, 'Miguel', 'Perez', '4440004440', 'miguel@gmail.com', '2023-01-31 09:18:57', '2023-01-31 10:30:59'),
(4, 'Tae', 'Kim', '1234567890', 'tae@gmail.com', '2023-01-31 10:32:57', '2023-01-31 10:32:57'),
(5, 'Luis', 'De Luna', '1231233211', 'luis1234@gmail.com', '2023-02-02 16:41:04', '2023-02-02 16:41:04'),
(6, 'Pedro', 'Quintero', '4492213232', 'pedro00@hotmail.com', '2023-02-02 16:41:36', '2023-02-02 16:41:36'),
(7, 'Alejandra', 'Ibarra', '4491231213', 'ale12@hotmail.com', '2023-02-02 16:42:01', '2023-02-02 16:42:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `meeting_rooms`
--

CREATE TABLE `meeting_rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `capacity` int(11) NOT NULL,
  `price_hour` int(11) NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `meeting_rooms`
--

INSERT INTO `meeting_rooms` (`id`, `name`, `description`, `capacity`, `price_hour`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Sala pequeña económica', 'La sala más pequeña con la que contamos', 4, 150, '1675131745.jpg', '2023-01-31 08:22:25', '2023-01-31 21:22:51'),
(2, 'Sala 2', 'Sala 2', 6, 200, '1675332203.jpeg', '2023-01-31 21:38:11', '2023-02-02 16:03:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(5, '2014_10_12_000000_create_users_table', 1),
(6, '2014_10_12_100000_create_password_resets_table', 1),
(7, '2019_08_19_000000_create_failed_jobs_table', 1),
(8, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(9, '2023_01_30_091516_create_customers_table', 2),
(10, '2023_01_30_102740_create_meeting_rooms_table', 3),
(11, '2023_01_31_154846_create_appointments_table', 4),
(12, '2023_02_01_065006_create_m_r_uses_table', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `m_r_uses`
--

CREATE TABLE `m_r_uses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mr_id` bigint(20) NOT NULL,
  `app_id` bigint(20) NOT NULL,
  `date` date NOT NULL,
  `hr_start` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `m_r_uses`
--

INSERT INTO `m_r_uses` (`id`, `mr_id`, `app_id`, `date`, `hr_start`, `created_at`, `updated_at`) VALUES
(8, 2, 5, '2023-02-02', '03:00:00', '2023-02-02 15:44:20', '2023-02-02 15:44:20'),
(9, 1, 6, '2023-03-02', '16:00:00', '2023-02-02 15:47:50', '2023-02-02 15:47:50'),
(10, 1, 6, '2023-03-02', '17:00:00', '2023-02-02 15:47:50', '2023-02-02 15:47:50'),
(11, 1, 7, '2023-02-27', '13:00:00', '2023-02-02 15:48:01', '2023-02-02 15:48:01'),
(12, 1, 8, '2023-02-24', '14:00:00', '2023-02-02 15:48:12', '2023-02-02 15:48:12'),
(13, 1, 8, '2023-02-24', '15:00:00', '2023-02-02 15:48:12', '2023-02-02 15:48:12'),
(14, 1, 9, '2023-03-11', '14:00:00', '2023-02-02 15:48:22', '2023-02-02 15:48:22'),
(15, 1, 9, '2023-03-11', '15:00:00', '2023-02-02 15:48:22', '2023-02-02 15:48:22'),
(16, 1, 10, '2023-02-20', '10:00:00', '2023-02-02 16:42:27', '2023-02-02 16:42:27'),
(17, 1, 10, '2023-02-20', '11:00:00', '2023-02-02 16:42:27', '2023-02-02 16:42:27'),
(18, 1, 11, '2023-02-23', '09:00:00', '2023-02-02 16:42:37', '2023-02-02 16:42:37'),
(19, 2, 12, '2023-05-31', '11:00:00', '2023-02-02 16:42:55', '2023-02-02 16:42:55'),
(20, 2, 12, '2023-05-31', '12:00:00', '2023-02-02 16:42:55', '2023-02-02 16:42:55'),
(21, 2, 13, '2023-03-20', '12:00:00', '2023-02-02 16:43:38', '2023-02-02 16:43:38'),
(22, 2, 13, '2023-03-20', '13:00:00', '2023-02-02 16:43:38', '2023-02-02 16:43:38'),
(23, 1, 14, '2023-02-02', '11:00:00', '2023-02-02 23:17:42', '2023-02-02 23:17:42'),
(24, 1, 14, '2023-02-02', '12:00:00', '2023-02-02 23:17:42', '2023-02-02 23:17:42'),
(25, 2, 15, '2023-02-02', '11:00:00', '2023-02-02 23:17:59', '2023-02-02 23:17:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `phone`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Zab', 'Garcia', '9879879879', 'zab@gmail.com', NULL, '$2y$10$2eEkKJBWkrTuNaKjVDsMy.S2QddBFuk7eDc9AayNUCgBFJeqSLuf2', NULL, '2023-01-30 10:12:56', '2023-02-02 16:01:59');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `meeting_rooms`
--
ALTER TABLE `meeting_rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `m_r_uses`
--
ALTER TABLE `m_r_uses`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `meeting_rooms`
--
ALTER TABLE `meeting_rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `m_r_uses`
--
ALTER TABLE `m_r_uses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
