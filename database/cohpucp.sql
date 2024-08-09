-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 09-08-2024 a las 22:54:42
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Contabilidad Finaciera', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(2, 'Contabilidad de Costos', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(3, 'Contabilidad Gerencial', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(4, 'Contabilidad Tributaria', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(5, 'Contabilidad Gubernamental', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(6, 'Normas Internacionales de Información Financiera (NIIF)', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(7, 'Contabilidad Forense', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(8, 'Auditoría', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(9, 'Sistemas Contables', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(10, 'Ética y Responsabilidad Social', '2024-08-07 02:59:58', '2024-08-07 02:59:58');

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
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id`, `layout`, `titulo`, `nombre`, `descripcion`, `precio`, `enlace`, `icono`, `calificacion`, `user_id`, `idioma_id`, `categoria_id`, `imagen`, `created_at`, `updated_at`) VALUES
(35, 'Imagen de fondo', '¡Para este 2025 desarrolla tus habilidades 100% Online!', NULL, 'Potencia tu conocimiento con cursos interactivos y actualizados, accede desde cualquier lugar y a tu ritmo. ¡Inscríbete ahora y comienza a construir tu futuro!', NULL, NULL, NULL, NULL, 1, NULL, NULL, 'Td9BCAhTcl9xoBniLyqq75VRDXptVy8LMEFH0wUi.jpg', '2024-08-07 23:33:06', '2024-08-08 04:32:23'),
(36, 'Imagen a la derecha', 'Calidad académica con El Colegio Hondureño de Profesionales Universitarios en Contaduría Pública', NULL, 'Encuentra miles de cursos gratis sobre diferentes temáticas diseñados por expertos en pedagogía, a partir de contenidos académicos con licencia abierta provenientes de YouTube e instituciones prestigiosas como Harvard University o MIT.', NULL, NULL, NULL, NULL, 1, NULL, NULL, 'k6X9KbW0om9QrS2InrRFZ7Mm8Vk7c6gW4eOd3vJ2.png', '2024-08-07 23:33:46', '2024-08-08 02:18:50'),
(38, 'Imagen de fondo', 'AQUÍ ENCONTRARÁS TODOS LOS CURSOS QUE EL COLEGIO TE BRINDA', NULL, 'Potencia tu conocimiento con cursos interactivos y actualizados, accede desde cualquier lugar y a tu ritmo. ¡Inscríbete ahora y comienza a construir tu futuro!', NULL, NULL, NULL, NULL, 1, NULL, NULL, 'b53Omp855E3BTbviSswp5qrky6oxwwm2wGWHZtTu.jpg', '2024-08-08 02:42:19', '2024-08-08 02:42:19'),
(40, 'Tarjetas de cursos', NULL, 'FINANZAS', 'DSGDSHBFD FGHJNGFJNGFJNGF', '120.65', 'https://www.coursera.org/professional-certificates/google-data-analytics', NULL, NULL, 1, NULL, NULL, 'CeuFe53qkw83xOxYMWhYJdb81vJO6QCTW13G7bme.png', '2024-08-08 03:35:55', '2024-08-08 03:35:55');

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Volcado de datos para la tabla `dashboard_contents`
--

INSERT INTO `dashboard_contents` (`id`, `layout`, `title`, `subtitle`, `description`, `pdf`, `images`, `videos`, `links`, `facebook_link`, `twitter_link`, `youtube_link`, `whatsapp_link`, `instagram_link`, `user_id`, `created_at`, `updated_at`) VALUES
(7, 'Archivos', NULL, NULL, NULL, NULL, NULL, 'dashboard_videos/vlEVOZWuCSaDgaEBKTIj9vkVTy3oc2u6WNZc318d.mp4', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-08-10 02:26:49', '2024-08-10 02:26:49');

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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Volcado de datos para la tabla `idiomas`
--

INSERT INTO `idiomas` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Español', '2024-08-07 02:59:58', '2024-08-09 03:30:36'),
(2, 'Inglés', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(3, 'Fránces', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(4, 'Alemán', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(5, 'Italiano', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(6, 'Portugués', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(7, 'Árabe', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(8, 'Ruso', '2024-08-07 02:59:58', '2024-08-07 02:59:58');

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
) ENGINE=InnoDB AUTO_INCREMENT=121 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(106, '2014_10_12_100000_create_password_resets_table', 1),
(107, '2019_08_19_000000_create_failed_jobs_table', 1),
(108, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(109, '2024_05_29_020000_create_pais_table', 1),
(110, '2024_05_29_030000_create_users_table', 1),
(111, '2024_06_03_143665_create_idiomas_table', 1),
(112, '2024_06_03_143674_create_categorias_table', 1),
(113, '2024_06_03_143702_create_cursos_table', 1),
(114, '2024_06_04_163925_create_capacitaciones_table', 1),
(115, '2024_06_06_172142_create_permission_tables', 1),
(116, '2024_07_01_152617_create_security_questions_table', 1),
(117, '2024_07_01_152804_create_user_security_questions_table', 1),
(118, '2024_07_22_205244_create_welcome_contents_table', 1),
(119, '2024_07_31_202421_create_dashboard_contents_table', 1),
(120, '2024_08_01_210348_create_footer_contents_table', 1);

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
(3, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 3),
(3, 'App\\Models\\User', 4),
(3, 'App\\Models\\User', 5),
(3, 'App\\Models\\User', 6);

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
) ENGINE=InnoDB AUTO_INCREMENT=241 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`id`, `nombre`, `codigo`, `created_at`, `updated_at`) VALUES
(1, 'Afganistán ok', '+93', '2024-08-07 02:59:58', '2024-08-10 02:07:44'),
(2, 'Albania', '+355', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(3, 'Alemania', '+49', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(4, 'Andorra', '+376', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(5, 'Angola', '+244', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(6, 'Anguila', '+1-264', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(7, 'Antártida', '+672', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(8, 'Antigua y Barbuda', '+1-268', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(9, 'Arabia Saudita', '+966', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(10, 'Argelia', '+213', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(11, 'Argentina', '+54', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(12, 'Armenia', '+374', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(13, 'Aruba', '+297', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(14, 'Australia', '+61', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(15, 'Austria', '+43', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(16, 'Azerbaiyán', '+994', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(17, 'Bahamas', '+1-242', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(18, 'Bangladés', '+880', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(19, 'Baréin', '+973', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(20, 'Barbados', '+1-246', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(21, 'Bélgica', '+32', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(22, 'Belice', '+501', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(23, 'Benín', '+229', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(24, 'Bermudas', '+1-441', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(25, 'Bielorrusia', '+375', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(26, 'Birmania', '+95', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(27, 'Bolivia', '+591', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(28, 'Bosnia y Herzegovina', '+387', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(29, 'Bosnia y Herzegovina', '+387', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(30, 'Bosnia y Herzegovina', '+387', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(31, 'Bosnia y Herzegovina', '+387', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(32, 'Bosnia y Herzegovina', '+387', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(33, 'Bosnia y Herzegovina', '+387', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(34, 'Botsuana', '+267', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(35, 'Brasil', '+55', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(36, 'Brunéi', '+673', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(37, 'Bulgaria', '+359', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(38, 'Burkina Faso', '+226', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(39, 'Burundi', '+257', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(40, 'Bután', '+975', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(41, 'Cabo Verde', '+238', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(42, 'Camboya', '+855', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(43, 'Camerún', '+237', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(44, 'Canadá', '+1', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(45, 'Chad', '+235', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(46, 'Chile', '+56', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(47, 'China', '+86', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(48, 'Chipre', '+357', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(49, 'Ciudad del Vaticano', '+379', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(50, 'Colombia', '+57', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(51, 'Comoras', '+269', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(52, 'Congo', '+242', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(53, 'Corea del Norte', '+850', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(54, 'Corea del Sur', '+82', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(55, 'Costa de Marfil', '+225', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(56, 'Costa Rica', '+506', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(57, 'Croacia', '+385', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(58, 'Cuba', '+53', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(59, 'Dinamarca', '+45', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(60, 'Dominica', '+1-767', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(61, 'Ecuador', '+593', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(62, 'Egipto', '+20', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(63, 'El Salvador', '+503', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(64, 'Emiratos Árabes Unidos', '+971', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(65, 'Eritrea', '+291', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(66, 'Eslovaquia', '+421', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(67, 'Eslovenia', '+386', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(68, 'España', '+34', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(69, 'Estados Federados de Micronesia', '+691', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(70, 'Estados Unidos de América', '+1', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(71, 'Estonia', '+372', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(72, 'Etiopía', '+251', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(73, 'Filipinas', '+63', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(74, 'Finlandia', '+358', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(75, 'Fiyi', '+679', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(76, 'Francia', '+33', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(77, 'Gabón', '+241', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(78, 'Gambia', '+220', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(79, 'Georgia', '+995', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(80, 'Ghana', '+233', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(81, 'Gibraltar', '+350', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(82, 'Grecia', '+30', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(83, 'Groenlandia', '+299', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(84, 'Guadalupe', '+590', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(85, 'Guam', '+1-671', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(86, 'Guatemala', '+502', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(87, 'Guayana Francesa', '+594', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(88, 'Guernsey', '+44-1481', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(89, 'Guinea', '+224', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(90, 'Guinea Ecuatorial', '+240', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(91, 'Guinea-Bisáu', '+245', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(92, 'Guyana', '+592', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(93, 'Haití', '+509', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(94, 'Honduras', '+504', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(95, 'Hong Kong', '+852', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(96, 'Hungría', '+36', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(97, 'India', '+91', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(98, 'Indonesia', '+62', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(99, 'Irak', '+964', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(100, 'Irán', '+98', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(101, 'Irlanda', '+353', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(102, 'Isla de Man', '+44-1624', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(103, 'Isla Pitcairn', '+64', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(104, 'Islas Caimán', '+1-345', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(105, 'Islas Cook', '+682', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(106, 'Islas Feroe', '+298', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(107, 'Islas Malvinas', '+500', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(108, 'Islas Marianas del Norte', '+1-670', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(109, 'Islas Marshall', '+692', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(110, 'Islas Salomón', '+677', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(111, 'Islas Turcas y Caicos', '+1-649', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(112, 'Islas Vírgenes Británicas', '+1-284', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(113, 'Islas Vírgenes de los Estados Unidos', '+1-340', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(114, 'Israel', '+972', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(115, 'Italia', '+39', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(116, 'Jamaica', '+1-876', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(117, 'Japón', '+81', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(118, 'Jersey', '+44-1534', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(119, 'Jordania', '+962', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(120, 'Kazajistán', '+7', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(121, 'Kenia', '+254', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(122, 'Kirguistán', '+996', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(123, 'Kiribati', '+686', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(124, 'Kuwait', '+965', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(125, 'Laos', '+856', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(126, 'Lesoto', '+266', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(127, 'Letonia', '+371', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(128, 'Líbano', '+961', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(129, 'Liberia', '+231', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(130, 'Libia', '+218', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(131, 'Liechtenstein', '+423', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(132, 'Lituania', '+370', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(133, 'Luxemburgo', '+352', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(134, 'Macao', '+853', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(135, 'Macedonia del Norte', '+389', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(136, 'Madagascar', '+261', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(137, 'Malasia', '+60', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(138, 'Malaui', '+265', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(139, 'Maldivas', '+960', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(140, 'Malí', '+223', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(141, 'Malta', '+356', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(142, 'Marruecos', '+212', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(143, 'Martinica', '+596', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(144, 'Mauricio', '+230', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(145, 'Mauritania', '+222', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(146, 'Mayotte', '+262', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(147, 'México', '+52', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(148, 'Moldavia', '+373', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(149, 'Mónaco', '+377', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(150, 'Mongolia', '+976', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(151, 'Montenegro', '+382', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(152, 'Montserrat', '+1-664', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(153, 'Mozambique', '+258', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(154, 'Namibia', '+264', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(155, 'Nauru', '+674', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(156, 'Nepal', '+977', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(157, 'Nicaragua', '+505', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(158, 'Níger', '+227', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(159, 'Nigeria', '+234', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(160, 'Niue', '+683', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(161, 'Noruega', '+47', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(162, 'Nueva Caledonia', '+687', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(163, 'Nueva Zelanda', '+64', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(164, 'Omán', '+968', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(165, 'Países Bajos', '+31', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(166, 'Pakistán', '+92', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(167, 'Palaos', '+680', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(168, 'Palestina', '+970', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(169, 'Panamá', '+507', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(170, 'Papúa Nueva Guinea', '+675', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(171, 'Paraguay', '+595', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(172, 'Perú', '+51', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(173, 'Polinesia Francesa', '+689', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(174, 'Polonia', '+48', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(175, 'Portugal', '+351', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(176, 'Puerto Rico', '+1-787', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(177, 'Reino Unido', '+44', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(178, 'República Centroafricana', '+236', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(179, 'República Checa', '+420', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(180, 'República Democrática del Congo', '+243', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(181, 'República Dominicana', '+1-809', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(182, 'Ruanda', '+250', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(183, 'Rumania', '+40', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(184, 'Rusia', '+7', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(185, 'Sáhara Occidental', '+212', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(186, 'Samoa', '+685', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(187, 'Samoa Americana', '+1-684', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(188, 'San Cristóbal y Nieves', '+1-869', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(189, 'San Marino', '+378', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(190, 'San Vicente y las Granadinas', '+1-784', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(191, 'Santa Lucía', '+1-758', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(192, 'Santo Tomé y Príncipe', '+239', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(193, 'Senegal', '+221', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(194, 'Serbia', '+381', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(195, 'Seychelles', '+248', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(196, 'Sierra Leona', '+232', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(197, 'Singapur', '+65', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(198, 'Siria', '+963', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(199, 'Somalia', '+252', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(200, 'Sri Lanka', '+94', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(201, 'Suazilandia', '+268', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(202, 'Sudáfrica', '+27', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(203, 'Sudán', '+249', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(204, 'Sudán del Sur', '+211', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(205, 'Suecia', '+46', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(206, 'Suiza', '+41', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(207, 'Surinam', '+597', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(208, 'Tailandia', '+66', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(209, 'Taiwán', '+886', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(210, 'Tanzania', '+255', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(211, 'Tayikistán', '+992', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(212, 'Timor Oriental', '+670', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(213, 'Togo', '+228', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(214, 'Tokelau', '+690', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(215, 'Tonga', '+676', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(216, 'Trinidad y Tobago', '+1-868', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(217, 'Túnez', '+216', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(218, 'Turkmenistán', '+993', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(219, 'Turquía', '+90', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(220, 'Tuvalu', '+688', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(221, 'Ucrania', '+380', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(222, 'Uganda', '+256', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(223, 'Uruguay', '+598', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(224, 'Uzbekistán', '+998', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(225, 'Vanuatu', '+678', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(226, 'Venezuela', '+58', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(227, 'Vietnam', '+84', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(228, 'Wallis y Futuna', '+681', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(229, 'Yemen', '+967', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(230, 'Yibuti', '+253', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(231, 'Zambia', '+260', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(232, 'Zimbabue', '+263', '2024-08-07 02:59:58', '2024-08-07 02:59:58');

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

--
-- Volcado de datos para la tabla `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('anibalgodinez64@gmail.com', '$2y$10$wdZ8KYf5x3JmbWTEyj17qOAX.CVSnK5vVVqGSGh5pD9GejSPp3cqC', '2024-08-10 04:37:03');

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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'ver usuarios', 'web', NULL, '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(2, 'indice usuarios', 'web', NULL, '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(3, 'actualizar usuario', 'web', NULL, '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(4, 'crear usuario', 'web', NULL, '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(5, 'borrar usuario', 'web', NULL, '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(6, 'ver roles', 'web', NULL, '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(7, 'indice roles', 'web', NULL, '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(8, 'actualizar rol', 'web', NULL, '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(9, 'crear rol', 'web', NULL, '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(10, 'eliminar rol', 'web', NULL, '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(11, 'agregar permisos al rol', 'web', NULL, '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(12, 'ver perfil', 'web', NULL, '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(13, 'actualizar perfil', 'web', NULL, '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(14, 'actualizar contraseña perfil', 'web', NULL, '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(15, 'ver permisos', 'web', NULL, '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(16, 'indice permisos', 'web', NULL, '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(17, 'actualizar permiso', 'web', NULL, '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(18, 'crear permiso', 'web', NULL, '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(19, 'borrar permiso', 'web', NULL, '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(20, 'ver boton personas', 'web', NULL, '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(21, 'ver boton roles y permisos', 'web', NULL, '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(22, 'ver boton de invitado', 'web', NULL, '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(23, 'ver boton de agremiado', 'web', NULL, '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(24, 'ver boton mantenimientos', 'web', NULL, '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(25, 'ver boton notificaciones', 'web', NULL, '2024-08-07 02:59:58', '2024-08-08 23:15:44');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', 'web', 'El rol Administrador en la plataforma del Colegio Hondureño de Profesionales Universitarios en Contaduría Pública (COHPUCP), tiene el acceso completo a todas las funciones y datos del sistema. Los administradores pueden gestionar usuarios, configurar el sitio y realizar cualquier acción necesaria para mantener optimizada la plataforma.', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(2, 'Agremiado', 'web', 'El rol Agremiado en la plataforma del Colegio Hondureño de Profesionales Universitarios en Contaduría Pública (COHPUCP), tiene acceso privilegiado a recursos educativos, documentos profesionales y herramientas especializadas. Los miembros pueden realizar gestiones, participar en eventos, actualizar su perfil profesional, entre otras.', '2024-08-07 02:59:58', '2024-08-07 02:59:58'),
(3, 'Invitado', 'web', 'El rol Invitado en la plataforma del Colegio Hondureño de Profesionales Universitarios en Contaduría Pública (COHPUCP), generalmente tienen el nivel de acceso más básico y limitado. Los invitados suelen tener acceso solo a funciones y contenido públicos del sitio. Sus accesos a la plataforma incluyen navegar por el contenido visible para todos los usuarios, como páginas de inicio, información general, entre otras.', '2024-08-07 02:59:58', '2024-08-07 02:59:58');

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Volcado de datos para la tabla `security_questions`
--

INSERT INTO `security_questions` (`id`, `question`, `created_at`, `updated_at`) VALUES
(6, '¿Cuál es tu deporte favorito?', '2024-08-09 00:33:50', '2024-08-09 00:33:50'),
(10, '¿Cuál es el nombre de tu primer mascota?', '2024-08-09 23:04:02', '2024-08-09 23:04:02');

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `name2`, `apellido`, `apellido2`, `numero_identidad`, `numero_colegiacion`, `rtn`, `sexo`, `fecha_nacimiento`, `pais_id`, `telefono`, `telefono_celular`, `email`, `estado`, `email_verified_at`, `password`, `profile_image`, `facebook_link`, `twitter_link`, `bio`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Johan', 'Anibal', 'Cohpucp', 'Godinez', '0801-1984-15578', '2010-01-2220', '0801-1984-155781', 'masculino', '1984-06-25', 11, '2255-1123', '3356-0773', 'anibalgodinez64@gmail.com', 'activo', NULL, '$2y$10$gsDbcBxv3s668tOU/iKSzOF59Qh4jXphgRxvzBAjhQyadf0zHplrm', 'profile_images/l9TwWu791ANVt6BG11wVKxud2IJo3FPqMrcN0T8L.png', NULL, NULL, 'En vista de mi pasión por la tecnología y como ingeniero comprometido con la honestidad, la calidad y la prestación de un excelente servicio en el área del desarrollo, me gustaría formar parte de una empresa en la cual puedo crecer profesionalmente.', NULL, '2024-08-07 02:59:58', '2024-08-09 04:21:48');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

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
