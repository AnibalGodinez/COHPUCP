-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 14-08-2024 a las 20:35:03
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
-- Estructura de tabla para la tabla `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categorias_nombre_unique` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Contabilidad Finaciera', '2024-08-15 00:46:44', '2024-08-15 00:46:44'),
(2, 'Contabilidad de Costos', '2024-08-15 00:46:44', '2024-08-15 00:46:44'),
(3, 'Contabilidad Gerencial', '2024-08-15 00:46:44', '2024-08-15 00:46:44'),
(4, 'Contabilidad Tributaria', '2024-08-15 00:46:44', '2024-08-15 00:46:44'),
(5, 'Contabilidad Gubernamental', '2024-08-15 00:46:44', '2024-08-15 00:46:44'),
(6, 'Normas Internacionales de Información Financiera (NIIF)', '2024-08-15 00:46:44', '2024-08-15 00:46:44'),
(7, 'Contabilidad Forense', '2024-08-15 00:46:44', '2024-08-15 00:46:44'),
(8, 'Auditoría', '2024-08-15 00:46:44', '2024-08-15 00:46:44'),
(9, 'Sistemas Contables', '2024-08-15 00:46:44', '2024-08-15 00:46:44'),
(10, 'Ética y Responsabilidad Social', '2024-08-15 00:46:44', '2024-08-15 00:46:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

DROP TABLE IF EXISTS `cursos`;
CREATE TABLE IF NOT EXISTS `cursos` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `layout` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `titulo` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `nombre` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `descripcion` text COLLATE utf8mb3_unicode_ci,
  `precio` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `enlace` text COLLATE utf8mb3_unicode_ci,
  `icono` text COLLATE utf8mb3_unicode_ci,
  `calificacion` decimal(3,1) DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `idioma_id` bigint UNSIGNED DEFAULT NULL,
  `categoria_id` bigint UNSIGNED DEFAULT NULL,
  `imagen` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cursos_user_id_foreign` (`user_id`),
  KEY `cursos_idioma_id_foreign` (`idioma_id`),
  KEY `cursos_categoria_id_foreign` (`categoria_id`)
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
  `pdf` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `images` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `videos` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `links` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
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
-- Estructura de tabla para la tabla `footer_contents`
--

DROP TABLE IF EXISTS `footer_contents`;
CREATE TABLE IF NOT EXISTS `footer_contents` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb3_unicode_ci,
  `links` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `facebook_link` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `twitter_link` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `youtube_link` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `whatsapp_link` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `instagram_link` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `telegram_link` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `linkendin_link` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `boton` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `footer_contents_user_id_foreign` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `idiomas`
--

DROP TABLE IF EXISTS `idiomas`;
CREATE TABLE IF NOT EXISTS `idiomas` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idiomas_nombre_unique` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Volcado de datos para la tabla `idiomas`
--

INSERT INTO `idiomas` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Español', '2024-08-15 00:46:44', '2024-08-15 00:46:44'),
(2, 'Inglés', '2024-08-15 00:46:44', '2024-08-15 00:46:44'),
(3, 'Fránces', '2024-08-15 00:46:44', '2024-08-15 00:46:44'),
(4, 'Alemán', '2024-08-15 00:46:44', '2024-08-15 00:46:44'),
(5, 'Italiano', '2024-08-15 00:46:44', '2024-08-15 00:46:44'),
(6, 'Portugués', '2024-08-15 00:46:44', '2024-08-15 00:46:44'),
(7, 'Árabe', '2024-08-15 00:46:44', '2024-08-15 00:46:44'),
(8, 'Ruso', '2024-08-15 00:46:44', '2024-08-15 00:46:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripciones`
--

DROP TABLE IF EXISTS `inscripciones`;
CREATE TABLE IF NOT EXISTS `inscripciones` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `dni` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `correo` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `universidad` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `fecha_inscripcion` date NOT NULL,
  `imagen_titulo` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `cv` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `estado` enum('pendiente','aprobado','rechazado') COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT 'pendiente',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `inscripciones_dni_unique` (`dni`),
  UNIQUE KEY `inscripciones_correo_unique` (`correo`),
  KEY `inscripciones_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Volcado de datos para la tabla `inscripciones`
--

INSERT INTO `inscripciones` (`id`, `user_id`, `nombre`, `dni`, `correo`, `universidad`, `fecha_inscripcion`, `imagen_titulo`, `cv`, `estado`, `created_at`, `updated_at`) VALUES
(5, 2, 'Johan Leandro Godinez Alvarado', '0801-2000-15622', 'johan_godinez@yahoo.com', 'Universidad Nacional Autónoma de Honduras', '2024-08-14', '\"[\\\"imgsTitulos_inscripcion\\\\\\/1723667266_Relaci\\\\u00f3n de uno a muchos.png\\\",\\\"imgsTitulos_inscripcion\\\\\\/1723667266_Relaci\\\\u00f3n de uno a uno.png\\\"]\"', 'cvs_inscripcion/1723667266_Actividades 1.3.pdf', 'pendiente', '2024-08-15 02:27:46', '2024-08-15 02:27:46');

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
) ENGINE=InnoDB AUTO_INCREMENT=216 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(199, '2014_10_12_100000_create_password_resets_table', 1),
(200, '2019_08_19_000000_create_failed_jobs_table', 1),
(201, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(202, '2024_05_29_020000_create_pais_table', 1),
(203, '2024_05_29_030000_create_users_table', 1),
(204, '2024_06_03_143665_create_idiomas_table', 1),
(205, '2024_06_03_143674_create_categorias_table', 1),
(206, '2024_06_03_143702_create_cursos_table', 1),
(207, '2024_06_04_163925_create_capacitaciones_table', 1),
(208, '2024_06_06_172142_create_permission_tables', 1),
(209, '2024_07_01_152617_create_security_questions_table', 1),
(210, '2024_07_01_152804_create_user_security_questions_table', 1),
(211, '2024_07_22_205244_create_welcome_contents_table', 1),
(212, '2024_07_31_202421_create_dashboard_contents_table', 1),
(213, '2024_08_01_210348_create_footer_contents_table', 1),
(214, '2024_08_12_165432_create_inscripciones_table', 1),
(215, '2024_08_14_151035_create_notifications_table', 1);

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
(3, 'App\\Models\\User', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` char(36) COLLATE utf8mb3_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `notifiable_id` bigint UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

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
(1, 'Afganistán', '+93', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(2, 'Albania', '+355', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(3, 'Alemania', '+49', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(4, 'Andorra', '+376', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(5, 'Angola', '+244', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(6, 'Anguila', '+1-264', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(7, 'Antártida', '+672', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(8, 'Antigua y Barbuda', '+1-268', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(9, 'Arabia Saudita', '+966', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(10, 'Argelia', '+213', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(11, 'Argentina', '+54', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(12, 'Armenia', '+374', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(13, 'Aruba', '+297', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(14, 'Australia', '+61', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(15, 'Austria', '+43', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(16, 'Azerbaiyán', '+994', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(17, 'Bahamas', '+1-242', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(18, 'Bangladés', '+880', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(19, 'Baréin', '+973', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(20, 'Barbados', '+1-246', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(21, 'Bélgica', '+32', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(22, 'Belice', '+501', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(23, 'Benín', '+229', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(24, 'Bermudas', '+1-441', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(25, 'Bielorrusia', '+375', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(26, 'Birmania', '+95', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(27, 'Bolivia', '+591', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(28, 'Bosnia y Herzegovina', '+387', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(29, 'Bosnia y Herzegovina', '+387', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(30, 'Bosnia y Herzegovina', '+387', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(31, 'Bosnia y Herzegovina', '+387', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(32, 'Bosnia y Herzegovina', '+387', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(33, 'Bosnia y Herzegovina', '+387', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(34, 'Botsuana', '+267', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(35, 'Brasil', '+55', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(36, 'Brunéi', '+673', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(37, 'Bulgaria', '+359', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(38, 'Burkina Faso', '+226', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(39, 'Burundi', '+257', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(40, 'Bután', '+975', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(41, 'Cabo Verde', '+238', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(42, 'Camboya', '+855', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(43, 'Camerún', '+237', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(44, 'Canadá', '+1', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(45, 'Chad', '+235', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(46, 'Chile', '+56', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(47, 'China', '+86', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(48, 'Chipre', '+357', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(49, 'Ciudad del Vaticano', '+379', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(50, 'Colombia', '+57', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(51, 'Comoras', '+269', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(52, 'Congo', '+242', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(53, 'Corea del Norte', '+850', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(54, 'Corea del Sur', '+82', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(55, 'Costa de Marfil', '+225', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(56, 'Costa Rica', '+506', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(57, 'Croacia', '+385', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(58, 'Cuba', '+53', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(59, 'Dinamarca', '+45', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(60, 'Dominica', '+1-767', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(61, 'Ecuador', '+593', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(62, 'Egipto', '+20', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(63, 'El Salvador', '+503', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(64, 'Emiratos Árabes Unidos', '+971', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(65, 'Eritrea', '+291', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(66, 'Eslovaquia', '+421', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(67, 'Eslovenia', '+386', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(68, 'España', '+34', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(69, 'Estados Federados de Micronesia', '+691', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(70, 'Estados Unidos de América', '+1', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(71, 'Estonia', '+372', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(72, 'Etiopía', '+251', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(73, 'Filipinas', '+63', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(74, 'Finlandia', '+358', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(75, 'Fiyi', '+679', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(76, 'Francia', '+33', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(77, 'Gabón', '+241', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(78, 'Gambia', '+220', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(79, 'Georgia', '+995', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(80, 'Ghana', '+233', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(81, 'Gibraltar', '+350', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(82, 'Grecia', '+30', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(83, 'Groenlandia', '+299', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(84, 'Guadalupe', '+590', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(85, 'Guam', '+1-671', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(86, 'Guatemala', '+502', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(87, 'Guayana Francesa', '+594', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(88, 'Guernsey', '+44-1481', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(89, 'Guinea', '+224', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(90, 'Guinea Ecuatorial', '+240', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(91, 'Guinea-Bisáu', '+245', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(92, 'Guyana', '+592', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(93, 'Haití', '+509', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(94, 'Honduras', '+504', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(95, 'Hong Kong', '+852', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(96, 'Hungría', '+36', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(97, 'India', '+91', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(98, 'Indonesia', '+62', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(99, 'Irak', '+964', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(100, 'Irán', '+98', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(101, 'Irlanda', '+353', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(102, 'Isla de Man', '+44-1624', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(103, 'Isla Pitcairn', '+64', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(104, 'Islas Caimán', '+1-345', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(105, 'Islas Cook', '+682', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(106, 'Islas Feroe', '+298', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(107, 'Islas Malvinas', '+500', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(108, 'Islas Marianas del Norte', '+1-670', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(109, 'Islas Marshall', '+692', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(110, 'Islas Salomón', '+677', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(111, 'Islas Turcas y Caicos', '+1-649', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(112, 'Islas Vírgenes Británicas', '+1-284', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(113, 'Islas Vírgenes de los Estados Unidos', '+1-340', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(114, 'Israel', '+972', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(115, 'Italia', '+39', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(116, 'Jamaica', '+1-876', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(117, 'Japón', '+81', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(118, 'Jersey', '+44-1534', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(119, 'Jordania', '+962', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(120, 'Kazajistán', '+7', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(121, 'Kenia', '+254', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(122, 'Kirguistán', '+996', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(123, 'Kiribati', '+686', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(124, 'Kuwait', '+965', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(125, 'Laos', '+856', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(126, 'Lesoto', '+266', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(127, 'Letonia', '+371', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(128, 'Líbano', '+961', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(129, 'Liberia', '+231', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(130, 'Libia', '+218', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(131, 'Liechtenstein', '+423', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(132, 'Lituania', '+370', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(133, 'Luxemburgo', '+352', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(134, 'Macao', '+853', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(135, 'Macedonia del Norte', '+389', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(136, 'Madagascar', '+261', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(137, 'Malasia', '+60', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(138, 'Malaui', '+265', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(139, 'Maldivas', '+960', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(140, 'Malí', '+223', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(141, 'Malta', '+356', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(142, 'Marruecos', '+212', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(143, 'Martinica', '+596', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(144, 'Mauricio', '+230', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(145, 'Mauritania', '+222', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(146, 'Mayotte', '+262', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(147, 'México', '+52', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(148, 'Moldavia', '+373', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(149, 'Mónaco', '+377', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(150, 'Mongolia', '+976', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(151, 'Montenegro', '+382', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(152, 'Montserrat', '+1-664', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(153, 'Mozambique', '+258', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(154, 'Namibia', '+264', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(155, 'Nauru', '+674', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(156, 'Nepal', '+977', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(157, 'Nicaragua', '+505', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(158, 'Níger', '+227', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(159, 'Nigeria', '+234', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(160, 'Niue', '+683', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(161, 'Noruega', '+47', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(162, 'Nueva Caledonia', '+687', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(163, 'Nueva Zelanda', '+64', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(164, 'Omán', '+968', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(165, 'Países Bajos', '+31', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(166, 'Pakistán', '+92', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(167, 'Palaos', '+680', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(168, 'Palestina', '+970', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(169, 'Panamá', '+507', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(170, 'Papúa Nueva Guinea', '+675', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(171, 'Paraguay', '+595', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(172, 'Perú', '+51', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(173, 'Polinesia Francesa', '+689', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(174, 'Polonia', '+48', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(175, 'Portugal', '+351', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(176, 'Puerto Rico', '+1-787', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(177, 'Reino Unido', '+44', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(178, 'República Centroafricana', '+236', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(179, 'República Checa', '+420', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(180, 'República Democrática del Congo', '+243', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(181, 'República Dominicana', '+1-809', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(182, 'Ruanda', '+250', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(183, 'Rumania', '+40', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(184, 'Rusia', '+7', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(185, 'Sáhara Occidental', '+212', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(186, 'Samoa', '+685', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(187, 'Samoa Americana', '+1-684', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(188, 'San Cristóbal y Nieves', '+1-869', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(189, 'San Marino', '+378', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(190, 'San Vicente y las Granadinas', '+1-784', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(191, 'Santa Lucía', '+1-758', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(192, 'Santo Tomé y Príncipe', '+239', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(193, 'Senegal', '+221', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(194, 'Serbia', '+381', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(195, 'Seychelles', '+248', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(196, 'Sierra Leona', '+232', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(197, 'Singapur', '+65', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(198, 'Siria', '+963', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(199, 'Somalia', '+252', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(200, 'Sri Lanka', '+94', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(201, 'Suazilandia', '+268', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(202, 'Sudáfrica', '+27', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(203, 'Sudán', '+249', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(204, 'Sudán del Sur', '+211', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(205, 'Suecia', '+46', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(206, 'Suiza', '+41', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(207, 'Surinam', '+597', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(208, 'Tailandia', '+66', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(209, 'Taiwán', '+886', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(210, 'Tanzania', '+255', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(211, 'Tayikistán', '+992', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(212, 'Timor Oriental', '+670', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(213, 'Togo', '+228', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(214, 'Tokelau', '+690', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(215, 'Tonga', '+676', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(216, 'Trinidad y Tobago', '+1-868', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(217, 'Túnez', '+216', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(218, 'Turkmenistán', '+993', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(219, 'Turquía', '+90', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(220, 'Tuvalu', '+688', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(221, 'Ucrania', '+380', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(222, 'Uganda', '+256', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(223, 'Uruguay', '+598', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(224, 'Uzbekistán', '+998', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(225, 'Vanuatu', '+678', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(226, 'Venezuela', '+58', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(227, 'Vietnam', '+84', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(228, 'Wallis y Futuna', '+681', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(229, 'Yemen', '+967', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(230, 'Yibuti', '+253', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(231, 'Zambia', '+260', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(232, 'Zimbabue', '+263', '2024-08-15 00:46:43', '2024-08-15 00:46:43');

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
  `description` text COLLATE utf8mb3_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'ver usuarios', 'web', NULL, '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(2, 'indice usuarios', 'web', NULL, '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(3, 'actualizar usuario', 'web', NULL, '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(4, 'crear usuario', 'web', NULL, '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(5, 'borrar usuario', 'web', NULL, '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(6, 'ver roles', 'web', NULL, '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(7, 'indice roles', 'web', NULL, '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(8, 'actualizar rol', 'web', NULL, '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(9, 'crear rol', 'web', NULL, '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(10, 'eliminar rol', 'web', NULL, '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(11, 'agregar permisos al rol', 'web', NULL, '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(12, 'ver permisos', 'web', NULL, '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(13, 'indice permisos', 'web', NULL, '2024-08-15 00:46:44', '2024-08-15 00:46:44'),
(14, 'actualizar permiso', 'web', NULL, '2024-08-15 00:46:44', '2024-08-15 00:46:44'),
(15, 'crear permiso', 'web', NULL, '2024-08-15 00:46:44', '2024-08-15 00:46:44'),
(16, 'borrar permiso', 'web', NULL, '2024-08-15 00:46:44', '2024-08-15 00:46:44'),
(17, 'ver boton personas', 'web', NULL, '2024-08-15 00:46:44', '2024-08-15 00:46:44'),
(18, 'ver boton roles y permisos', 'web', NULL, '2024-08-15 00:46:44', '2024-08-15 00:46:44'),
(19, 'ver boton de invitado', 'web', NULL, '2024-08-15 00:46:44', '2024-08-15 00:46:44'),
(20, 'ver boton de agremiado', 'web', NULL, '2024-08-15 00:46:44', '2024-08-15 00:46:44'),
(21, 'ver boton mantenimientos', 'web', NULL, '2024-08-15 00:46:44', '2024-08-15 00:46:44'),
(22, 'ver boton notificaciones', 'web', NULL, '2024-08-15 00:46:44', '2024-08-15 00:46:44'),
(23, 'indice contenido inicio', 'web', NULL, '2024-08-15 00:46:44', '2024-08-15 00:46:44'),
(24, 'actualizar contenido inicio', 'web', NULL, '2024-08-15 00:46:44', '2024-08-15 00:46:44'),
(25, 'crear contenido inicio', 'web', NULL, '2024-08-15 00:46:44', '2024-08-15 00:46:44'),
(26, 'borrar contenido inicio', 'web', NULL, '2024-08-15 00:46:44', '2024-08-15 00:46:44'),
(27, 'indice preguntas de seguridad', 'web', NULL, '2024-08-15 00:46:44', '2024-08-15 00:46:44'),
(28, 'actualizar preguntas de seguridad', 'web', NULL, '2024-08-15 00:46:44', '2024-08-15 00:46:44'),
(29, 'crear preguntas de seguridad', 'web', NULL, '2024-08-15 00:46:44', '2024-08-15 00:46:44'),
(30, 'borrar preguntas de seguridad', 'web', NULL, '2024-08-15 00:46:44', '2024-08-15 00:46:44'),
(31, 'ver opciones de recuperacion contaseña', 'web', NULL, '2024-08-15 00:46:44', '2024-08-15 00:46:44'),
(32, 'ver preguntas de seguridad', 'web', NULL, '2024-08-15 00:46:44', '2024-08-15 00:46:44'),
(33, 'ver perfil', 'web', NULL, '2024-08-15 00:46:44', '2024-08-15 00:46:44'),
(34, 'actualizar perfil', 'web', NULL, '2024-08-15 00:46:44', '2024-08-15 00:46:44'),
(35, 'cambiar contraseña', 'web', NULL, '2024-08-15 00:46:44', '2024-08-15 00:46:44'),
(36, 'ver paises', 'web', NULL, '2024-08-15 00:46:44', '2024-08-15 00:46:44'),
(37, 'indice paises', 'web', NULL, '2024-08-15 00:46:44', '2024-08-15 00:46:44'),
(38, 'actualizar pais', 'web', NULL, '2024-08-15 00:46:44', '2024-08-15 00:46:44'),
(39, 'crear pais', 'web', NULL, '2024-08-15 00:46:44', '2024-08-15 00:46:44'),
(40, 'borrar pais', 'web', NULL, '2024-08-15 00:46:44', '2024-08-15 00:46:44'),
(41, 'indice idiomas', 'web', NULL, '2024-08-15 00:46:44', '2024-08-15 00:46:44'),
(42, 'actualizar idioma', 'web', NULL, '2024-08-15 00:46:44', '2024-08-15 00:46:44'),
(43, 'crear idioma', 'web', NULL, '2024-08-15 00:46:44', '2024-08-15 00:46:44'),
(44, 'borrar idioma', 'web', NULL, '2024-08-15 00:46:44', '2024-08-15 00:46:44'),
(45, 'indice contenido dasboard', 'web', NULL, '2024-08-15 00:46:44', '2024-08-15 00:46:44'),
(46, 'actualizar contenido dasboard', 'web', NULL, '2024-08-15 00:46:44', '2024-08-15 00:46:44'),
(47, 'crear contenido dasboard', 'web', NULL, '2024-08-15 00:46:44', '2024-08-15 00:46:44'),
(48, 'borrar contenido dasboard', 'web', NULL, '2024-08-15 00:46:44', '2024-08-15 00:46:44'),
(49, 'ver cursos', 'web', NULL, '2024-08-15 00:46:44', '2024-08-15 00:46:44'),
(50, 'indice cursos', 'web', NULL, '2024-08-15 00:46:44', '2024-08-15 00:46:44'),
(51, 'actualizar cursos', 'web', NULL, '2024-08-15 00:46:44', '2024-08-15 00:46:44'),
(52, 'crear cursos', 'web', NULL, '2024-08-15 00:46:44', '2024-08-15 00:46:44'),
(53, 'borrar cursos', 'web', NULL, '2024-08-15 00:46:44', '2024-08-15 00:46:44'),
(54, 'indice categorias', 'web', NULL, '2024-08-15 00:46:44', '2024-08-15 00:46:44'),
(55, 'actualizar categorias', 'web', NULL, '2024-08-15 00:46:44', '2024-08-15 00:46:44'),
(56, 'crear categorias', 'web', NULL, '2024-08-15 00:46:44', '2024-08-15 00:46:44'),
(57, 'borrar categorias', 'web', NULL, '2024-08-15 00:46:44', '2024-08-15 00:46:44');

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
  `description` text COLLATE utf8mb3_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', 'web', 'El rol Administrador en la plataforma del Colegio Hondureño de Profesionales Universitarios en Contaduría Pública (COHPUCP), tiene el acceso completo a todas las funciones y datos del sistema. Los administradores pueden gestionar usuarios, configurar el sitio y realizar cualquier acción necesaria para mantener optimizada la plataforma.', '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(2, 'Agremiado', 'web', 'El rol Agremiado en la plataforma del Colegio Hondureño de Profesionales Universitarios en Contaduría Pública (COHPUCP), tiene acceso privilegiado a recursos educativos, documentos profesionales y herramientas especializadas. Los miembros pueden realizar gestiones, participar en eventos, actualizar su perfil profesional, entre otras.', '2024-08-15 00:46:44', '2024-08-15 00:46:44'),
(3, 'Invitado', 'web', 'El rol Invitado en la plataforma del Colegio Hondureño de Profesionales Universitarios en Contaduría Pública (COHPUCP), generalmente tienen el nivel de acceso más básico y limitado. Los invitados suelen tener acceso solo a funciones y contenido públicos del sitio. Sus accesos a la plataforma incluyen navegar por el contenido visible para todos los usuarios, como páginas de inicio, información general, entre otras.', '2024-08-15 00:46:44', '2024-08-15 00:46:44');

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
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(57, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `name2`, `apellido`, `apellido2`, `numero_identidad`, `numero_colegiacion`, `rtn`, `sexo`, `fecha_nacimiento`, `pais_id`, `telefono`, `telefono_celular`, `email`, `estado`, `email_verified_at`, `password`, `profile_image`, `facebook_link`, `twitter_link`, `bio`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', 'Anibal', 'Cohpucp', 'Godinez', '0801-1984-15578', '2010-01-2220', '0801-1984-155781', 'masculino', '1984-06-25', NULL, '2255-1123', '3356-0773', 'anibalgodinez64@gmail.com', 'activo', NULL, '$2y$10$9G1DaOWarmNhSOBKdO8rW.GzkPbLoDYgXOwt/VyhRsIAq8jXXwIxC', NULL, NULL, NULL, NULL, NULL, '2024-08-15 00:46:43', '2024-08-15 00:46:43'),
(2, 'Johan', NULL, 'Godinez', NULL, '1707-1987-00138', NULL, NULL, 'masculino', '1987-04-07', 16, NULL, '9933-4788', 'johan_godinez@yahoo.com', 'activo', NULL, '$2y$10$F4HRBVzR5Vhp2mDn5X/GV.RXvudJ8GQBgq.huWT5//BjDsyAQdsTy', NULL, NULL, NULL, NULL, NULL, '2024-08-15 00:47:48', '2024-08-15 00:47:48');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

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
  ADD CONSTRAINT `cursos_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cursos_idioma_id_foreign` FOREIGN KEY (`idioma_id`) REFERENCES `idiomas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cursos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `dashboard_contents`
--
ALTER TABLE `dashboard_contents`
  ADD CONSTRAINT `dashboard_contents_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `footer_contents`
--
ALTER TABLE `footer_contents`
  ADD CONSTRAINT `footer_contents_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  ADD CONSTRAINT `inscripciones_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

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
