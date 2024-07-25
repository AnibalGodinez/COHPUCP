-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 25-07-2024 a las 14:31:49
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
) ENGINE=InnoDB AUTO_INCREMENT=153 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(96, '2024_07_24_184006_add_layout_to_welcome_contents_table', 1),
(108, '2024_07_24_205613_add_layout_to_welcome_contents_table', 2),
(142, '2014_10_12_100000_create_password_resets_table', 3),
(143, '2019_08_19_000000_create_failed_jobs_table', 3),
(144, '2019_12_14_000001_create_personal_access_tokens_table', 3),
(145, '2024_05_29_020000_create_pais_table', 3),
(146, '2024_05_29_030000_create_users_table', 3),
(147, '2024_06_03_143702_create_cursos_table', 3),
(148, '2024_06_04_163925_create_capacitaciones_table', 3),
(149, '2024_06_06_172142_create_permission_tables', 3),
(150, '2024_07_01_152617_create_security_questions_table', 3),
(151, '2024_07_01_152804_create_user_security_questions_table', 3),
(152, '2024_07_22_205244_create_welcome_contents_table', 3);

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
(1, 'App\\Models\\User', 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=228 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`id`, `nombre`, `codigo`, `created_at`, `updated_at`) VALUES
(1, 'Afganistán', '+93', NULL, NULL),
(2, 'Albania', '+355', NULL, NULL),
(3, 'Alemania', '+49', NULL, NULL),
(4, 'Andorra', '+376', NULL, NULL),
(5, 'Angola', '+244', NULL, NULL),
(6, 'Anguila', '+1-264', NULL, NULL),
(7, 'Antártida', '+672', NULL, NULL),
(8, 'Antigua y Barbuda', '+1-268', NULL, NULL),
(9, 'Arabia Saudita', '+966', NULL, NULL),
(10, 'Argelia', '+213', NULL, NULL),
(11, 'Argentina', '+54', NULL, NULL),
(12, 'Armenia', '+374', NULL, NULL),
(13, 'Aruba', '+297', NULL, NULL),
(14, 'Australia', '+61', NULL, NULL),
(15, 'Austria', '+43', NULL, NULL),
(16, 'Azerbaiyán', '+994', NULL, NULL),
(17, 'Bahamas', '+1-242', NULL, NULL),
(18, 'Bangladés', '+880', NULL, NULL),
(19, 'Baréin', '+973', NULL, NULL),
(20, 'Barbados', '+1-246', NULL, NULL),
(21, 'Bélgica', '+32', NULL, NULL),
(22, 'Belice', '+501', NULL, NULL),
(23, 'Benín', '+229', NULL, NULL),
(24, 'Bermudas', '+1-441', NULL, NULL),
(25, 'Bielorrusia', '+375', NULL, NULL),
(26, 'Birmania', '+95', NULL, NULL),
(27, 'Bolivia', '+591', NULL, NULL),
(28, 'Bosnia y Herzegovina', '+387', NULL, NULL),
(29, 'Botsuana', '+267', NULL, NULL),
(30, 'Brasil', '+55', NULL, NULL),
(31, 'Brunéi', '+673', NULL, NULL),
(32, 'Bulgaria', '+359', NULL, NULL),
(33, 'Burkina Faso', '+226', NULL, NULL),
(34, 'Burundi', '+257', NULL, NULL),
(35, 'Bután', '+975', NULL, NULL),
(36, 'Cabo Verde', '+238', NULL, NULL),
(37, 'Camboya', '+855', NULL, NULL),
(38, 'Camerún', '+237', NULL, NULL),
(39, 'Canadá', '+1', NULL, NULL),
(40, 'Chad', '+235', NULL, NULL),
(41, 'Chile', '+56', NULL, NULL),
(42, 'China', '+86', NULL, NULL),
(43, 'Chipre', '+357', NULL, NULL),
(44, 'Ciudad del Vaticano', '+379', NULL, NULL),
(45, 'Colombia', '+57', NULL, NULL),
(46, 'Comoras', '+269', NULL, NULL),
(47, 'Congo', '+242', NULL, NULL),
(48, 'Corea del Norte', '+850', NULL, NULL),
(49, 'Corea del Sur', '+82', NULL, NULL),
(50, 'Costa de Marfil', '+225', NULL, NULL),
(51, 'Costa Rica', '+506', NULL, NULL),
(52, 'Croacia', '+385', NULL, NULL),
(53, 'Cuba', '+53', NULL, NULL),
(54, 'Dinamarca', '+45', NULL, NULL),
(55, 'Dominica', '+1-767', NULL, NULL),
(56, 'Ecuador', '+593', NULL, NULL),
(57, 'Egipto', '+20', NULL, NULL),
(58, 'El Salvador', '+503', NULL, NULL),
(59, 'Emiratos Árabes Unidos', '+971', NULL, NULL),
(60, 'Eritrea', '+291', NULL, NULL),
(61, 'Eslovaquia', '+421', NULL, NULL),
(62, 'Eslovenia', '+386', NULL, NULL),
(63, 'España', '+34', NULL, NULL),
(64, 'Estados Federados de Micronesia', '+691', NULL, NULL),
(65, 'Estados Unidos de América', '+1', NULL, NULL),
(66, 'Estonia', '+372', NULL, NULL),
(67, 'Etiopía', '+251', NULL, NULL),
(68, 'Filipinas', '+63', NULL, NULL),
(69, 'Finlandia', '+358', NULL, NULL),
(70, 'Fiyi', '+679', NULL, NULL),
(71, 'Francia', '+33', NULL, NULL),
(72, 'Gabón', '+241', NULL, NULL),
(73, 'Gambia', '+220', NULL, NULL),
(74, 'Georgia', '+995', NULL, NULL),
(75, 'Ghana', '+233', NULL, NULL),
(76, 'Gibraltar', '+350', NULL, NULL),
(77, 'Grecia', '+30', NULL, NULL),
(78, 'Groenlandia', '+299', NULL, NULL),
(79, 'Guadalupe', '+590', NULL, NULL),
(80, 'Guam', '+1-671', NULL, NULL),
(81, 'Guatemala', '+502', NULL, NULL),
(82, 'Guayana Francesa', '+594', NULL, NULL),
(83, 'Guernsey', '+44-1481', NULL, NULL),
(84, 'Guinea', '+224', NULL, NULL),
(85, 'Guinea Ecuatorial', '+240', NULL, NULL),
(86, 'Guinea-Bisáu', '+245', NULL, NULL),
(87, 'Guyana', '+592', NULL, NULL),
(88, 'Haití', '+509', NULL, NULL),
(89, 'Honduras', '+504', NULL, NULL),
(90, 'Hong Kong', '+852', NULL, NULL),
(91, 'Hungría', '+36', NULL, NULL),
(92, 'India', '+91', NULL, NULL),
(93, 'Indonesia', '+62', NULL, NULL),
(94, 'Irak', '+964', NULL, NULL),
(95, 'Irán', '+98', NULL, NULL),
(96, 'Irlanda', '+353', NULL, NULL),
(97, 'Isla de Man', '+44-1624', NULL, NULL),
(98, 'Isla Pitcairn', '+64', NULL, NULL),
(99, 'Islas Caimán', '+1-345', NULL, NULL),
(100, 'Islas Cook', '+682', NULL, NULL),
(101, 'Islas Feroe', '+298', NULL, NULL),
(102, 'Islas Malvinas', '+500', NULL, NULL),
(103, 'Islas Marianas del Norte', '+1-670', NULL, NULL),
(104, 'Islas Marshall', '+692', NULL, NULL),
(105, 'Islas Salomón', '+677', NULL, NULL),
(106, 'Islas Turcas y Caicos', '+1-649', NULL, NULL),
(107, 'Islas Vírgenes Británicas', '+1-284', NULL, NULL),
(108, 'Islas Vírgenes de los Estados Unidos', '+1-340', NULL, NULL),
(109, 'Israel', '+972', NULL, NULL),
(110, 'Italia', '+39', NULL, NULL),
(111, 'Jamaica', '+1-876', NULL, NULL),
(112, 'Japón', '+81', NULL, NULL),
(113, 'Jersey', '+44-1534', NULL, NULL),
(114, 'Jordania', '+962', NULL, NULL),
(115, 'Kazajistán', '+7', NULL, NULL),
(116, 'Kenia', '+254', NULL, NULL),
(117, 'Kirguistán', '+996', NULL, NULL),
(118, 'Kiribati', '+686', NULL, NULL),
(119, 'Kuwait', '+965', NULL, NULL),
(120, 'Laos', '+856', NULL, NULL),
(121, 'Lesoto', '+266', NULL, NULL),
(122, 'Letonia', '+371', NULL, NULL),
(123, 'Líbano', '+961', NULL, NULL),
(124, 'Liberia', '+231', NULL, NULL),
(125, 'Libia', '+218', NULL, NULL),
(126, 'Liechtenstein', '+423', NULL, NULL),
(127, 'Lituania', '+370', NULL, NULL),
(128, 'Luxemburgo', '+352', NULL, NULL),
(129, 'Macao', '+853', NULL, NULL),
(130, 'Macedonia del Norte', '+389', NULL, NULL),
(131, 'Madagascar', '+261', NULL, NULL),
(132, 'Malasia', '+60', NULL, NULL),
(133, 'Malaui', '+265', NULL, NULL),
(134, 'Maldivas', '+960', NULL, NULL),
(135, 'Malí', '+223', NULL, NULL),
(136, 'Malta', '+356', NULL, NULL),
(137, 'Marruecos', '+212', NULL, NULL),
(138, 'Martinica', '+596', NULL, NULL),
(139, 'Mauricio', '+230', NULL, NULL),
(140, 'Mauritania', '+222', NULL, NULL),
(141, 'Mayotte', '+262', NULL, NULL),
(142, 'México', '+52', NULL, NULL),
(143, 'Moldavia', '+373', NULL, NULL),
(144, 'Mónaco', '+377', NULL, NULL),
(145, 'Mongolia', '+976', NULL, NULL),
(146, 'Montenegro', '+382', NULL, NULL),
(147, 'Montserrat', '+1-664', NULL, NULL),
(148, 'Mozambique', '+258', NULL, NULL),
(149, 'Namibia', '+264', NULL, NULL),
(150, 'Nauru', '+674', NULL, NULL),
(151, 'Nepal', '+977', NULL, NULL),
(152, 'Nicaragua', '+505', NULL, NULL),
(153, 'Níger', '+227', NULL, NULL),
(154, 'Nigeria', '+234', NULL, NULL),
(155, 'Niue', '+683', NULL, NULL),
(156, 'Noruega', '+47', NULL, NULL),
(157, 'Nueva Caledonia', '+687', NULL, NULL),
(158, 'Nueva Zelanda', '+64', NULL, NULL),
(159, 'Omán', '+968', NULL, NULL),
(160, 'Países Bajos', '+31', NULL, NULL),
(161, 'Pakistán', '+92', NULL, NULL),
(162, 'Palaos', '+680', NULL, NULL),
(163, 'Palestina', '+970', NULL, NULL),
(164, 'Panamá', '+507', NULL, NULL),
(165, 'Papúa Nueva Guinea', '+675', NULL, NULL),
(166, 'Paraguay', '+595', NULL, NULL),
(167, 'Perú', '+51', NULL, NULL),
(168, 'Polinesia Francesa', '+689', NULL, NULL),
(169, 'Polonia', '+48', NULL, NULL),
(170, 'Portugal', '+351', NULL, NULL),
(171, 'Puerto Rico', '+1-787', NULL, NULL),
(172, 'Reino Unido', '+44', NULL, NULL),
(173, 'República Centroafricana', '+236', NULL, NULL),
(174, 'República Checa', '+420', NULL, NULL),
(175, 'República Democrática del Congo', '+243', NULL, NULL),
(176, 'República Dominicana', '+1-809', NULL, NULL),
(177, 'Ruanda', '+250', NULL, NULL),
(178, 'Rumania', '+40', NULL, NULL),
(179, 'Rusia', '+7', NULL, NULL),
(180, 'Sáhara Occidental', '+212', NULL, NULL),
(181, 'Samoa', '+685', NULL, NULL),
(182, 'Samoa Americana', '+1-684', NULL, NULL),
(183, 'San Cristóbal y Nieves', '+1-869', NULL, NULL),
(184, 'San Marino', '+378', NULL, NULL),
(185, 'San Vicente y las Granadinas', '+1-784', NULL, NULL),
(186, 'Santa Lucía', '+1-758', NULL, NULL),
(187, 'Santo Tomé y Príncipe', '+239', NULL, NULL),
(188, 'Senegal', '+221', NULL, NULL),
(189, 'Serbia', '+381', NULL, NULL),
(190, 'Seychelles', '+248', NULL, NULL),
(191, 'Sierra Leona', '+232', NULL, NULL),
(192, 'Singapur', '+65', NULL, NULL),
(193, 'Siria', '+963', NULL, NULL),
(194, 'Somalia', '+252', NULL, NULL),
(195, 'Sri Lanka', '+94', NULL, NULL),
(196, 'Suazilandia', '+268', NULL, NULL),
(197, 'Sudáfrica', '+27', NULL, NULL),
(198, 'Sudán', '+249', NULL, NULL),
(199, 'Sudán del Sur', '+211', NULL, NULL),
(200, 'Suecia', '+46', NULL, NULL),
(201, 'Suiza', '+41', NULL, NULL),
(202, 'Surinam', '+597', NULL, NULL),
(203, 'Tailandia', '+66', NULL, NULL),
(204, 'Taiwán', '+886', NULL, NULL),
(205, 'Tanzania', '+255', NULL, NULL),
(206, 'Tayikistán', '+992', NULL, NULL),
(207, 'Timor Oriental', '+670', NULL, NULL),
(208, 'Togo', '+228', NULL, NULL),
(209, 'Tokelau', '+690', NULL, NULL),
(210, 'Tonga', '+676', NULL, NULL),
(211, 'Trinidad y Tobago', '+1-868', NULL, NULL),
(212, 'Túnez', '+216', NULL, NULL),
(213, 'Turkmenistán', '+993', NULL, NULL),
(214, 'Turquía', '+90', NULL, NULL),
(215, 'Tuvalu', '+688', NULL, NULL),
(216, 'Ucrania', '+380', NULL, NULL),
(217, 'Uganda', '+256', NULL, NULL),
(218, 'Uruguay', '+598', NULL, NULL),
(219, 'Uzbekistán', '+998', NULL, NULL),
(220, 'Vanuatu', '+678', NULL, NULL),
(221, 'Venezuela', '+58', NULL, NULL),
(222, 'Vietnam', '+84', NULL, NULL),
(223, 'Wallis y Futuna', '+681', NULL, NULL),
(224, 'Yemen', '+967', NULL, NULL),
(225, 'Yibuti', '+253', NULL, NULL),
(226, 'Zambia', '+260', NULL, NULL),
(227, 'Zimbabue', '+263', NULL, NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'ver usuarios', 'web', NULL, '2024-07-25 04:04:22', '2024-07-25 04:04:22'),
(2, 'indice usuarios', 'web', NULL, '2024-07-25 04:04:22', '2024-07-25 04:04:22'),
(3, 'actualizar usuario', 'web', NULL, '2024-07-25 04:04:22', '2024-07-25 04:04:22'),
(4, 'crear usuario', 'web', NULL, '2024-07-25 04:04:22', '2024-07-25 04:04:22'),
(5, 'borrar usuario', 'web', NULL, '2024-07-25 04:04:22', '2024-07-25 04:04:22'),
(6, 'ver roles', 'web', NULL, '2024-07-25 04:04:22', '2024-07-25 04:04:22'),
(7, 'indice roles', 'web', NULL, '2024-07-25 04:04:22', '2024-07-25 04:04:22'),
(8, 'actualizar rol', 'web', NULL, '2024-07-25 04:04:22', '2024-07-25 04:04:22'),
(9, 'crear rol', 'web', NULL, '2024-07-25 04:04:22', '2024-07-25 04:04:22'),
(10, 'eliminar rol', 'web', NULL, '2024-07-25 04:04:22', '2024-07-25 04:04:22'),
(11, 'agregar permisos al rol', 'web', NULL, '2024-07-25 04:04:22', '2024-07-25 04:04:22'),
(12, 'ver perfil', 'web', NULL, '2024-07-25 04:04:22', '2024-07-25 04:04:22'),
(13, 'actualizar perfil', 'web', NULL, '2024-07-25 04:04:23', '2024-07-25 04:04:23'),
(14, 'actualizar contraseña perfil', 'web', NULL, '2024-07-25 04:04:23', '2024-07-25 04:04:23'),
(15, 'ver permisos', 'web', NULL, '2024-07-25 04:04:23', '2024-07-25 04:04:23'),
(16, 'indice permisos', 'web', NULL, '2024-07-25 04:04:23', '2024-07-25 04:04:23'),
(17, 'actualizar permiso', 'web', NULL, '2024-07-25 04:04:23', '2024-07-25 04:04:23'),
(18, 'crear permiso', 'web', NULL, '2024-07-25 04:04:23', '2024-07-25 04:04:23'),
(19, 'borrar permiso', 'web', NULL, '2024-07-25 04:04:23', '2024-07-25 04:04:23'),
(20, 'ver boton personas', 'web', NULL, '2024-07-25 04:04:23', '2024-07-25 04:04:23'),
(21, 'ver boton roles y permisos', 'web', NULL, '2024-07-25 04:04:23', '2024-07-25 04:04:23'),
(22, 'ver boton de invitado', 'web', NULL, '2024-07-25 04:04:23', '2024-07-25 04:04:23'),
(23, 'ver boton de agremiado', 'web', NULL, '2024-07-25 04:04:23', '2024-07-25 04:04:23'),
(24, 'ver boton mantenimientos', 'web', NULL, '2024-07-25 04:04:23', '2024-07-25 04:04:23'),
(25, 'ver boton notificaciones', 'web', NULL, '2024-07-25 04:04:23', '2024-07-25 04:04:23'),
(26, 'Agremiado', 'web', NULL, '2024-07-25 04:36:31', '2024-07-25 04:36:31');

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
(1, 'Administrador', 'web', NULL, '2024-07-25 04:04:22', '2024-07-25 04:04:22'),
(2, 'Invitado', 'web', NULL, '2024-07-25 04:36:24', '2024-07-25 04:36:24');

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

INSERT INTO `users` (`id`, `name`, `name2`, `apellido`, `apellido2`, `numero_identidad`, `numero_colegiacion`, `rtn`, `sexo`, `fecha_nacimiento`, `pais_id`, `telefono`, `telefono_celular`, `email`, `estado`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', 'Anibal', 'Cohpucp', 'Godinez', '0801-1984-15578', '2010-01-2220', '0801-1984-155781', 'masculino', '1984-06-25', NULL, '2255-1123', '3356-0773', 'anibalgodinez64@gmail.com', 'activo', NULL, '$2y$10$8g3qa3/KjzlpwYyAsnl57.ATg23.8S.1ETGZGjt3.4F7WgE/E6QW6', NULL, '2024-07-25 04:04:22', '2024-07-25 04:04:22');

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
  ADD CONSTRAINT `cursos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
