-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 31-07-2024 a las 21:45:18
-- Versión del servidor: 8.3.0
-- Versión de PHP: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cohpucp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `capacitaciones`
--

DROP TABLE IF EXISTS `capacitaciones`;
CREATE TABLE IF NOT EXISTS `capacitaciones` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `imagen` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `capacitaciones_user_id_foreign` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

DROP TABLE IF EXISTS `cursos`;
CREATE TABLE IF NOT EXISTS `cursos` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `imagen` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cursos_user_id_foreign` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dashboard_contents`
--

DROP TABLE IF EXISTS `dashboard_contents`;
CREATE TABLE IF NOT EXISTS `dashboard_contents` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `layout` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `subtitle` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb3_unicode_ci,
  `bar_charts` json DEFAULT NULL,
  `pie_charts` json DEFAULT NULL,
  `data_tables` json DEFAULT NULL,
  `task_lists` json DEFAULT NULL,
  `pdf_files` json DEFAULT NULL,
  `documents` json DEFAULT NULL,
  `internal_links` json DEFAULT NULL,
  `external_links` json DEFAULT NULL,
  `images` json DEFAULT NULL,
  `videos` json DEFAULT NULL,
  `calendars` json DEFAULT NULL,
  `maps` json DEFAULT NULL,
  `facebook_link` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `twitter_link` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `youtube_link` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `whatsapp_link` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `instagram_link` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `dashboard_contents_user_id_foreign` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb3_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb3_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=462 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(450, '2014_10_12_100000_create_password_resets_table', 1),
(451, '2019_08_19_000000_create_failed_jobs_table', 1),
(452, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(453, '2024_05_29_020000_create_pais_table', 1),
(454, '2024_05_29_030000_create_users_table', 1),
(455, '2024_06_03_143702_create_cursos_table', 1),
(456, '2024_06_04_163925_create_capacitaciones_table', 1),
(457, '2024_06_06_172142_create_permission_tables', 1),
(458, '2024_07_01_152617_create_security_questions_table', 1),
(459, '2024_07_01_152804_create_user_security_questions_table', 1),
(460, '2024_07_22_205244_create_welcome_contents_table', 1),
(461, '2024_07_31_202421_create_dashboard_contents_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Volcado de datos para la tabla `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 3),
(2, 'App\\Models\\User', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

DROP TABLE IF EXISTS `pais`;
CREATE TABLE IF NOT EXISTS `pais` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `codigo` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=233 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`id`, `nombre`, `codigo`, `created_at`, `updated_at`) VALUES
(1, 'Afganistán', '+93', '2024-08-01 02:53:45', '2024-08-01 02:53:45'),
(2, 'Albania', '+355', '2024-08-01 02:53:45', '2024-08-01 02:53:45'),
(3, 'Alemania', '+49', '2024-08-01 02:53:45', '2024-08-01 02:53:45'),
(4, 'Andorra', '+376', '2024-08-01 02:53:45', '2024-08-01 02:53:45'),
(5, 'Angola', '+244', '2024-08-01 02:53:45', '2024-08-01 02:53:45'),
(6, 'Anguila', '+1-264', '2024-08-01 02:53:45', '2024-08-01 02:53:45'),
(7, 'Antártida', '+672', '2024-08-01 02:53:45', '2024-08-01 02:53:45'),
(8, 'Antigua y Barbuda', '+1-268', '2024-08-01 02:53:45', '2024-08-01 02:53:45'),
(9, 'Arabia Saudita', '+966', '2024-08-01 02:53:45', '2024-08-01 02:53:45'),
(10, 'Argelia', '+213', '2024-08-01 02:53:45', '2024-08-01 02:53:45'),
(11, 'Argentina', '+54', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(12, 'Armenia', '+374', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(13, 'Aruba', '+297', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(14, 'Australia', '+61', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(15, 'Austria', '+43', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(16, 'Azerbaiyán', '+994', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(17, 'Bahamas', '+1-242', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(18, 'Bangladés', '+880', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(19, 'Baréin', '+973', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(20, 'Barbados', '+1-246', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(21, 'Bélgica', '+32', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(22, 'Belice', '+501', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(23, 'Benín', '+229', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(24, 'Bermudas', '+1-441', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(25, 'Bielorrusia', '+375', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(26, 'Birmania', '+95', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(27, 'Bolivia', '+591', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(28, 'Bosnia y Herzegovina', '+387', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(29, 'Bosnia y Herzegovina', '+387', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(30, 'Bosnia y Herzegovina', '+387', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(31, 'Bosnia y Herzegovina', '+387', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(32, 'Bosnia y Herzegovina', '+387', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(33, 'Bosnia y Herzegovina', '+387', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(34, 'Botsuana', '+267', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(35, 'Brasil', '+55', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(36, 'Brunéi', '+673', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(37, 'Bulgaria', '+359', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(38, 'Burkina Faso', '+226', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(39, 'Burundi', '+257', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(40, 'Bután', '+975', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(41, 'Cabo Verde', '+238', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(42, 'Camboya', '+855', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(43, 'Camerún', '+237', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(44, 'Canadá', '+1', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(45, 'Chad', '+235', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(46, 'Chile', '+56', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(47, 'China', '+86', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(48, 'Chipre', '+357', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(49, 'Ciudad del Vaticano', '+379', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(50, 'Colombia', '+57', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(51, 'Comoras', '+269', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(52, 'Congo', '+242', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(53, 'Corea del Norte', '+850', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(54, 'Corea del Sur', '+82', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(55, 'Costa de Marfil', '+225', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(56, 'Costa Rica', '+506', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(57, 'Croacia', '+385', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(58, 'Cuba', '+53', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(59, 'Dinamarca', '+45', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(60, 'Dominica', '+1-767', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(61, 'Ecuador', '+593', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(62, 'Egipto', '+20', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(63, 'El Salvador', '+503', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(64, 'Emiratos Árabes Unidos', '+971', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(65, 'Eritrea', '+291', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(66, 'Eslovaquia', '+421', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(67, 'Eslovenia', '+386', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(68, 'España', '+34', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(69, 'Estados Federados de Micronesia', '+691', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(70, 'Estados Unidos de América', '+1', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(71, 'Estonia', '+372', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(72, 'Etiopía', '+251', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(73, 'Filipinas', '+63', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(74, 'Finlandia', '+358', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(75, 'Fiyi', '+679', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(76, 'Francia', '+33', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(77, 'Gabón', '+241', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(78, 'Gambia', '+220', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(79, 'Georgia', '+995', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(80, 'Ghana', '+233', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(81, 'Gibraltar', '+350', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(82, 'Grecia', '+30', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(83, 'Groenlandia', '+299', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(84, 'Guadalupe', '+590', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(85, 'Guam', '+1-671', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(86, 'Guatemala', '+502', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(87, 'Guayana Francesa', '+594', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(88, 'Guernsey', '+44-1481', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(89, 'Guinea', '+224', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(90, 'Guinea Ecuatorial', '+240', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(91, 'Guinea-Bisáu', '+245', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(92, 'Guyana', '+592', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(93, 'Haití', '+509', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(94, 'Honduras', '+504', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(95, 'Hong Kong', '+852', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(96, 'Hungría', '+36', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(97, 'India', '+91', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(98, 'Indonesia', '+62', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(99, 'Irak', '+964', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(100, 'Irán', '+98', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(101, 'Irlanda', '+353', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(102, 'Isla de Man', '+44-1624', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(103, 'Isla Pitcairn', '+64', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(104, 'Islas Caimán', '+1-345', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(105, 'Islas Cook', '+682', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(106, 'Islas Feroe', '+298', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(107, 'Islas Malvinas', '+500', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(108, 'Islas Marianas del Norte', '+1-670', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(109, 'Islas Marshall', '+692', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(110, 'Islas Salomón', '+677', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(111, 'Islas Turcas y Caicos', '+1-649', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(112, 'Islas Vírgenes Británicas', '+1-284', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(113, 'Islas Vírgenes de los Estados Unidos', '+1-340', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(114, 'Israel', '+972', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(115, 'Italia', '+39', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(116, 'Jamaica', '+1-876', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(117, 'Japón', '+81', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(118, 'Jersey', '+44-1534', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(119, 'Jordania', '+962', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(120, 'Kazajistán', '+7', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(121, 'Kenia', '+254', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(122, 'Kirguistán', '+996', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(123, 'Kiribati', '+686', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(124, 'Kuwait', '+965', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(125, 'Laos', '+856', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(126, 'Lesoto', '+266', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(127, 'Letonia', '+371', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(128, 'Líbano', '+961', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(129, 'Liberia', '+231', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(130, 'Libia', '+218', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(131, 'Liechtenstein', '+423', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(132, 'Lituania', '+370', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(133, 'Luxemburgo', '+352', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(134, 'Macao', '+853', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(135, 'Macedonia del Norte', '+389', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(136, 'Madagascar', '+261', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(137, 'Malasia', '+60', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(138, 'Malaui', '+265', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(139, 'Maldivas', '+960', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(140, 'Malí', '+223', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(141, 'Malta', '+356', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(142, 'Marruecos', '+212', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(143, 'Martinica', '+596', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(144, 'Mauricio', '+230', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(145, 'Mauritania', '+222', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(146, 'Mayotte', '+262', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(147, 'México', '+52', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(148, 'Moldavia', '+373', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(149, 'Mónaco', '+377', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(150, 'Mongolia', '+976', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(151, 'Montenegro', '+382', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(152, 'Montserrat', '+1-664', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(153, 'Mozambique', '+258', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(154, 'Namibia', '+264', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(155, 'Nauru', '+674', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(156, 'Nepal', '+977', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(157, 'Nicaragua', '+505', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(158, 'Níger', '+227', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(159, 'Nigeria', '+234', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(160, 'Niue', '+683', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(161, 'Noruega', '+47', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(162, 'Nueva Caledonia', '+687', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(163, 'Nueva Zelanda', '+64', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(164, 'Omán', '+968', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(165, 'Países Bajos', '+31', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(166, 'Pakistán', '+92', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(167, 'Palaos', '+680', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(168, 'Palestina', '+970', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(169, 'Panamá', '+507', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(170, 'Papúa Nueva Guinea', '+675', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(171, 'Paraguay', '+595', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(172, 'Perú', '+51', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(173, 'Polinesia Francesa', '+689', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(174, 'Polonia', '+48', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(175, 'Portugal', '+351', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(176, 'Puerto Rico', '+1-787', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(177, 'Reino Unido', '+44', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(178, 'República Centroafricana', '+236', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(179, 'República Checa', '+420', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(180, 'República Democrática del Congo', '+243', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(181, 'República Dominicana', '+1-809', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(182, 'Ruanda', '+250', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(183, 'Rumania', '+40', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(184, 'Rusia', '+7', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(185, 'Sáhara Occidental', '+212', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(186, 'Samoa', '+685', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(187, 'Samoa Americana', '+1-684', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(188, 'San Cristóbal y Nieves', '+1-869', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(189, 'San Marino', '+378', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(190, 'San Vicente y las Granadinas', '+1-784', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(191, 'Santa Lucía', '+1-758', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(192, 'Santo Tomé y Príncipe', '+239', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(193, 'Senegal', '+221', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(194, 'Serbia', '+381', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(195, 'Seychelles', '+248', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(196, 'Sierra Leona', '+232', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(197, 'Singapur', '+65', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(198, 'Siria', '+963', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(199, 'Somalia', '+252', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(200, 'Sri Lanka', '+94', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(201, 'Suazilandia', '+268', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(202, 'Sudáfrica', '+27', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(203, 'Sudán', '+249', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(204, 'Sudán del Sur', '+211', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(205, 'Suecia', '+46', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(206, 'Suiza', '+41', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(207, 'Surinam', '+597', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(208, 'Tailandia', '+66', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(209, 'Taiwán', '+886', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(210, 'Tanzania', '+255', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(211, 'Tayikistán', '+992', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(212, 'Timor Oriental', '+670', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(213, 'Togo', '+228', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(214, 'Tokelau', '+690', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(215, 'Tonga', '+676', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(216, 'Trinidad y Tobago', '+1-868', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(217, 'Túnez', '+216', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(218, 'Turkmenistán', '+993', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(219, 'Turquía', '+90', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(220, 'Tuvalu', '+688', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(221, 'Ucrania', '+380', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(222, 'Uganda', '+256', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(223, 'Uruguay', '+598', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(224, 'Uzbekistán', '+998', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(225, 'Vanuatu', '+678', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(226, 'Venezuela', '+58', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(227, 'Vietnam', '+84', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(228, 'Wallis y Futuna', '+681', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(229, 'Yemen', '+967', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(230, 'Yibuti', '+253', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(231, 'Zambia', '+260', '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(232, 'Zimbabue', '+263', '2024-08-01 02:53:46', '2024-08-01 02:53:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'ver usuarios', 'web', NULL, '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(2, 'indice usuarios', 'web', NULL, '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(3, 'actualizar usuario', 'web', NULL, '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(4, 'crear usuario', 'web', NULL, '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(5, 'borrar usuario', 'web', NULL, '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(6, 'ver roles', 'web', NULL, '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(7, 'indice roles', 'web', NULL, '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(8, 'actualizar rol', 'web', NULL, '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(9, 'crear rol', 'web', NULL, '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(10, 'eliminar rol', 'web', NULL, '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(11, 'agregar permisos al rol', 'web', NULL, '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(12, 'ver perfil', 'web', NULL, '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(13, 'actualizar perfil', 'web', NULL, '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(14, 'actualizar contraseña perfil', 'web', NULL, '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(15, 'ver permisos', 'web', NULL, '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(16, 'indice permisos', 'web', NULL, '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(17, 'actualizar permiso', 'web', NULL, '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(18, 'crear permiso', 'web', NULL, '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(19, 'borrar permiso', 'web', NULL, '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(20, 'ver boton personas', 'web', NULL, '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(21, 'ver boton roles y permisos', 'web', NULL, '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(22, 'ver boton de invitado', 'web', NULL, '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(23, 'ver boton de agremiado', 'web', NULL, '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(24, 'ver boton mantenimientos', 'web', NULL, '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(25, 'ver boton notificaciones', 'web', NULL, '2024-08-01 02:53:46', '2024-08-01 02:53:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb3_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb3_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', 'web', NULL, '2024-08-01 02:53:46', '2024-08-01 02:53:46'),
(2, 'Invitado', 'web', NULL, '2024-07-31 21:19:47', '2024-07-31 21:19:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Volcado de datos para la tabla `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `security_questions`
--

DROP TABLE IF EXISTS `security_questions`;
CREATE TABLE IF NOT EXISTS `security_questions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `question` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `name2` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `apellido` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `apellido2` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `numero_identidad` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `numero_colegiacion` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `rtn` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `sexo` enum('masculino','femenino') COLLATE utf8mb3_unicode_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `pais_id` bigint UNSIGNED DEFAULT NULL,
  `telefono` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `telefono_celular` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `estado` enum('activo','inactivo') COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT 'activo',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `profile_image` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `facebook_link` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `twitter_link` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8mb3_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_numero_identidad_unique` (`numero_identidad`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_numero_colegiacion_unique` (`numero_colegiacion`),
  UNIQUE KEY `users_rtn_unique` (`rtn`),
  KEY `users_pais_id_foreign` (`pais_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `name2`, `apellido`, `apellido2`, `numero_identidad`, `numero_colegiacion`, `rtn`, `sexo`, `fecha_nacimiento`, `pais_id`, `telefono`, `telefono_celular`, `email`, `estado`, `email_verified_at`, `password`, `profile_image`, `facebook_link`, `twitter_link`, `bio`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', 'Anibal', 'Cohpucp', 'Godinez', '0801-1984-15578', '2010-01-2220', '0801-1984-155781', 'masculino', '1984-06-25', 7, '2255-1123', '3356-0773', 'anibalgodinez64@gmail.com', 'activo', NULL, '$2y$10$B/y0T17WcRM8Tcl3arhfDuXk7l1JQD86jo4IsuGTb21rjHgxsSGIW', 'profile_images/8vClMvcVzK3eGXRfDQls1H5HsfifVBGLQczMQsqY.png', 'https://www.facebook.com/people/Cohpucp-Sps/100063917986775/', 'https://www.instagram.com/cohpucphn/', 'safk.nsa.fhnlkashnfcmas as,k.lzcnafszvcaszcas', NULL, '2024-08-01 02:53:46', '2024-08-01 03:40:31'),
(3, 'Javier', NULL, 'Mejia', NULL, '1707-1999-12456', NULL, NULL, 'masculino', '1999-05-23', 94, NULL, '9654-8213', 'javiermejia3112@gmail.com', 'activo', NULL, '$2y$10$XTLHAQ9V152iabxvlLIw3OwECty3Umz0JC1vTwxUoMyfKZA8ic4c2', NULL, NULL, NULL, NULL, NULL, '2024-08-01 03:21:04', '2024-08-01 03:21:04'),
(4, 'Johan', 'Anibal', 'Godinez', 'Cortez', '1707-2005-45745', NULL, NULL, 'masculino', '2005-05-04', 94, NULL, '3356-7487', 'johan_godinez@yahoo.com', 'activo', '2024-08-01 03:32:16', '$2y$10$IMWv0kTpXtHZ6.Gqco040.HoAG/kpfv0Lo.xRiguVD7JgS1DwWYK2', NULL, NULL, NULL, NULL, NULL, '2024-08-01 03:25:05', '2024-08-01 03:32:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_security_questions`
--

DROP TABLE IF EXISTS `user_security_questions`;
CREATE TABLE IF NOT EXISTS `user_security_questions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `security_question_id` bigint UNSIGNED NOT NULL,
  `answer` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_security_questions_user_id_foreign` (`user_id`),
  KEY `user_security_questions_security_question_id_foreign` (`security_question_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `welcome_contents`
--

DROP TABLE IF EXISTS `welcome_contents`;
CREATE TABLE IF NOT EXISTS `welcome_contents` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `layout` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb3_unicode_ci,
  `image_path` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `welcome_contents_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Volcado de datos para la tabla `welcome_contents`
--

INSERT INTO `welcome_contents` (`id`, `layout`, `title`, `description`, `image_path`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Por defecto', 'COHPCUP', 'ASDKAHSDKAJSHDAKJK,MNSADC', 'welcome_images/13u6aEyKnqKL0UwtBCABJ0yLUpBswmEAtXQOe0WX.jpg', 1, '2024-08-01 03:08:37', '2024-08-01 03:08:37'),
(2, 'Imagen a la derecha', 'VISIÓN', 'asjhfkajshakfdlnc sadhzkjlhzHNDa.,ms', NULL, 1, '2024-08-01 03:09:34', '2024-08-01 03:41:31'),
(4, 'Imagen', NULL, NULL, 'welcome_images/rhMHHNBVPeeQO3ARc7vTgvSIlJ9jZxpJ7cZsBbjb.png', 1, '2024-08-01 03:11:00', '2024-08-01 03:11:00'),
(7, 'Imagen de fondo claro', 'TITULO', 'lksahjclkzmsnaszl lkasdhhhhzdcazscasZ', 'welcome_images/tQBBsUOd9iAKE5Du4VJV7yqHh0e8bmSINCEoSq0W.png', 1, '2024-08-01 03:17:06', '2024-08-01 03:17:06');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `capacitaciones`
--
ALTER TABLE `capacitaciones`
  ADD CONSTRAINT `capacitaciones_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD CONSTRAINT `cursos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `dashboard_contents`
--
ALTER TABLE `dashboard_contents`
  ADD CONSTRAINT `dashboard_contents_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_pais_id_foreign` FOREIGN KEY (`pais_id`) REFERENCES `pais` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `user_security_questions`
--
ALTER TABLE `user_security_questions`
  ADD CONSTRAINT `user_security_questions_security_question_id_foreign` FOREIGN KEY (`security_question_id`) REFERENCES `security_questions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_security_questions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `welcome_contents`
--
ALTER TABLE `welcome_contents`
  ADD CONSTRAINT `welcome_contents_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
