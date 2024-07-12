-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 12-07-2024 a las 22:55:50
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2024_05_29_020000_create_pais_table', 1),
(5, '2024_05_29_030000_create_users_table', 1),
(6, '2024_06_03_143702_create_cursos_table', 1),
(7, '2024_06_04_163925_create_capacitaciones_table', 1),
(8, '2024_06_06_172142_create_permission_tables', 1),
(9, '2024_07_01_152617_create_security_questions_table', 1),
(10, '2024_07_01_152804_create_user_security_questions_table', 1);

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
(2, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 3),
(2, 'App\\Models\\User', 4),
(2, 'App\\Models\\User', 5),
(3, 'App\\Models\\User', 6),
(1, 'App\\Models\\User', 7);

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
) ENGINE=InnoDB AUTO_INCREMENT=371 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`id`, `nombre`, `codigo`, `created_at`, `updated_at`) VALUES
(144, 'Afganistánn', '+93', NULL, NULL),
(145, 'Albania', '+355', NULL, NULL),
(146, 'Alemania', '+49', NULL, NULL),
(147, 'Andorra', '+376', NULL, NULL),
(148, 'Angola', '+244', NULL, NULL),
(149, 'Anguila', '+1-264', NULL, NULL),
(150, 'Antártida', '+672', NULL, NULL),
(151, 'Antigua y Barbuda', '+1-268', NULL, NULL),
(152, 'Arabia Saudita', '+966', NULL, NULL),
(153, 'Argelia', '+213', NULL, NULL),
(154, 'Argentina', '+54', NULL, NULL),
(155, 'Armenia', '+374', NULL, NULL),
(156, 'Aruba', '+297', NULL, NULL),
(157, 'Australia', '+61', NULL, NULL),
(158, 'Austria', '+43', NULL, NULL),
(159, 'Azerbaiyán', '+994', NULL, NULL),
(160, 'Bahamas', '+1-242', NULL, NULL),
(161, 'Bangladés', '+880', NULL, NULL),
(162, 'Baréin', '+973', NULL, NULL),
(163, 'Barbados', '+1-246', NULL, NULL),
(164, 'Bélgica', '+32', NULL, NULL),
(165, 'Belice', '+501', NULL, NULL),
(166, 'Benín', '+229', NULL, NULL),
(167, 'Bermudas', '+1-441', NULL, NULL),
(168, 'Bielorrusia', '+375', NULL, NULL),
(169, 'Birmania', '+95', NULL, NULL),
(170, 'Bolivia', '+591', NULL, NULL),
(171, 'Bosnia y Herzegovina', '+387', NULL, NULL),
(172, 'Botsuana', '+267', NULL, NULL),
(173, 'Brasil', '+55', NULL, NULL),
(174, 'Brunéi', '+673', NULL, NULL),
(175, 'Bulgaria', '+359', NULL, NULL),
(176, 'Burkina Faso', '+226', NULL, NULL),
(177, 'Burundi', '+257', NULL, NULL),
(178, 'Bután', '+975', NULL, NULL),
(179, 'Cabo Verde', '+238', NULL, NULL),
(180, 'Camboya', '+855', NULL, NULL),
(181, 'Camerún', '+237', NULL, NULL),
(182, 'Canadá', '+1', NULL, NULL),
(183, 'Chad', '+235', NULL, NULL),
(184, 'Chile', '+56', NULL, NULL),
(185, 'China', '+86', NULL, NULL),
(186, 'Chipre', '+357', NULL, NULL),
(187, 'Ciudad del Vaticano', '+379', NULL, NULL),
(188, 'Colombia', '+57', NULL, NULL),
(189, 'Comoras', '+269', NULL, NULL),
(190, 'Congo', '+242', NULL, NULL),
(191, 'Corea del Norte', '+850', NULL, NULL),
(192, 'Corea del Sur', '+82', NULL, NULL),
(193, 'Costa de Marfil', '+225', NULL, NULL),
(194, 'Costa Rica', '+506', NULL, NULL),
(195, 'Croacia', '+385', NULL, NULL),
(196, 'Cuba', '+53', NULL, NULL),
(197, 'Dinamarca', '+45', NULL, NULL),
(198, 'Dominica', '+1-767', NULL, NULL),
(199, 'Ecuador', '+593', NULL, NULL),
(200, 'Egipto', '+20', NULL, NULL),
(201, 'El Salvador', '+503', NULL, NULL),
(202, 'Emiratos Árabes Unidos', '+971', NULL, NULL),
(203, 'Eritrea', '+291', NULL, NULL),
(204, 'Eslovaquia', '+421', NULL, NULL),
(205, 'Eslovenia', '+386', NULL, NULL),
(206, 'España', '+34', NULL, NULL),
(207, 'Estados Federados de Micronesia', '+691', NULL, NULL),
(208, 'Estados Unidos de América', '+1', NULL, NULL),
(209, 'Estonia', '+372', NULL, NULL),
(210, 'Etiopía', '+251', NULL, NULL),
(211, 'Filipinas', '+63', NULL, NULL),
(212, 'Finlandia', '+358', NULL, NULL),
(213, 'Fiyi', '+679', NULL, NULL),
(214, 'Francia', '+33', NULL, NULL),
(215, 'Gabón', '+241', NULL, NULL),
(216, 'Gambia', '+220', NULL, NULL),
(217, 'Georgia', '+995', NULL, NULL),
(218, 'Ghana', '+233', NULL, NULL),
(219, 'Gibraltar', '+350', NULL, NULL),
(220, 'Grecia', '+30', NULL, NULL),
(221, 'Groenlandia', '+299', NULL, NULL),
(222, 'Guadalupe', '+590', NULL, NULL),
(223, 'Guam', '+1-671', NULL, NULL),
(224, 'Guatemala', '+502', NULL, NULL),
(225, 'Guayana Francesa', '+594', NULL, NULL),
(226, 'Guernsey', '+44-1481', NULL, NULL),
(227, 'Guinea', '+224', NULL, NULL),
(228, 'Guinea Ecuatorial', '+240', NULL, NULL),
(229, 'Guinea-Bisáu', '+245', NULL, NULL),
(230, 'Guyana', '+592', NULL, NULL),
(231, 'Haití', '+509', NULL, NULL),
(232, 'Honduras', '+504', NULL, NULL),
(233, 'Hong Kong', '+852', NULL, NULL),
(234, 'Hungría', '+36', NULL, NULL),
(235, 'India', '+91', NULL, NULL),
(236, 'Indonesia', '+62', NULL, NULL),
(237, 'Irak', '+964', NULL, NULL),
(238, 'Irán', '+98', NULL, NULL),
(239, 'Irlanda', '+353', NULL, NULL),
(240, 'Isla de Man', '+44-1624', NULL, NULL),
(241, 'Isla Pitcairn', '+64', NULL, NULL),
(242, 'Islas Caimán', '+1-345', NULL, NULL),
(243, 'Islas Cook', '+682', NULL, NULL),
(244, 'Islas Feroe', '+298', NULL, NULL),
(245, 'Islas Malvinas', '+500', NULL, NULL),
(246, 'Islas Marianas del Norte', '+1-670', NULL, NULL),
(247, 'Islas Marshall', '+692', NULL, NULL),
(248, 'Islas Salomón', '+677', NULL, NULL),
(249, 'Islas Turcas y Caicos', '+1-649', NULL, NULL),
(250, 'Islas Vírgenes Británicas', '+1-284', NULL, NULL),
(251, 'Islas Vírgenes de los Estados Unidos', '+1-340', NULL, NULL),
(252, 'Israel', '+972', NULL, NULL),
(253, 'Italia', '+39', NULL, NULL),
(254, 'Jamaica', '+1-876', NULL, NULL),
(255, 'Japón', '+81', NULL, NULL),
(256, 'Jersey', '+44-1534', NULL, NULL),
(257, 'Jordania', '+962', NULL, NULL),
(258, 'Kazajistán', '+7', NULL, NULL),
(259, 'Kenia', '+254', NULL, NULL),
(260, 'Kirguistán', '+996', NULL, NULL),
(261, 'Kiribati', '+686', NULL, NULL),
(262, 'Kuwait', '+965', NULL, NULL),
(263, 'Laos', '+856', NULL, NULL),
(264, 'Lesoto', '+266', NULL, NULL),
(265, 'Letonia', '+371', NULL, NULL),
(266, 'Líbano', '+961', NULL, NULL),
(267, 'Liberia', '+231', NULL, NULL),
(268, 'Libia', '+218', NULL, NULL),
(269, 'Liechtenstein', '+423', NULL, NULL),
(270, 'Lituania', '+370', NULL, NULL),
(271, 'Luxemburgo', '+352', NULL, NULL),
(272, 'Macao', '+853', NULL, NULL),
(273, 'Macedonia del Norte', '+389', NULL, NULL),
(274, 'Madagascar', '+261', NULL, NULL),
(275, 'Malasia', '+60', NULL, NULL),
(276, 'Malaui', '+265', NULL, NULL),
(277, 'Maldivas', '+960', NULL, NULL),
(278, 'Malí', '+223', NULL, NULL),
(279, 'Malta', '+356', NULL, NULL),
(280, 'Marruecos', '+212', NULL, NULL),
(281, 'Martinica', '+596', NULL, NULL),
(282, 'Mauricio', '+230', NULL, NULL),
(283, 'Mauritania', '+222', NULL, NULL),
(284, 'Mayotte', '+262', NULL, NULL),
(285, 'México', '+52', NULL, NULL),
(286, 'Moldavia', '+373', NULL, NULL),
(287, 'Mónaco', '+377', NULL, NULL),
(288, 'Mongolia', '+976', NULL, NULL),
(289, 'Montenegro', '+382', NULL, NULL),
(290, 'Montserrat', '+1-664', NULL, NULL),
(291, 'Mozambique', '+258', NULL, NULL),
(292, 'Namibia', '+264', NULL, NULL),
(293, 'Nauru', '+674', NULL, NULL),
(294, 'Nepal', '+977', NULL, NULL),
(295, 'Nicaragua', '+505', NULL, NULL),
(296, 'Níger', '+227', NULL, NULL),
(297, 'Nigeria', '+234', NULL, NULL),
(298, 'Niue', '+683', NULL, NULL),
(299, 'Noruega', '+47', NULL, NULL),
(300, 'Nueva Caledonia', '+687', NULL, NULL),
(301, 'Nueva Zelanda', '+64', NULL, NULL),
(302, 'Omán', '+968', NULL, NULL),
(303, 'Países Bajos', '+31', NULL, NULL),
(304, 'Pakistán', '+92', NULL, NULL),
(305, 'Palaos', '+680', NULL, NULL),
(306, 'Palestina', '+970', NULL, NULL),
(307, 'Panamá', '+507', NULL, NULL),
(308, 'Papúa Nueva Guinea', '+675', NULL, NULL),
(309, 'Paraguay', '+595', NULL, NULL),
(310, 'Perú', '+51', NULL, NULL),
(311, 'Polinesia Francesa', '+689', NULL, NULL),
(312, 'Polonia', '+48', NULL, NULL),
(313, 'Portugal', '+351', NULL, NULL),
(314, 'Puerto Rico', '+1-787', NULL, NULL),
(315, 'Reino Unido', '+44', NULL, NULL),
(316, 'República Centroafricana', '+236', NULL, NULL),
(317, 'República Checa', '+420', NULL, NULL),
(318, 'República Democrática del Congo', '+243', NULL, NULL),
(319, 'República Dominicana', '+1-809', NULL, NULL),
(320, 'Ruanda', '+250', NULL, NULL),
(321, 'Rumania', '+40', NULL, NULL),
(322, 'Rusia', '+7', NULL, NULL),
(323, 'Sáhara Occidental', '+212', NULL, NULL),
(324, 'Samoa', '+685', NULL, NULL),
(325, 'Samoa Americana', '+1-684', NULL, NULL),
(326, 'San Cristóbal y Nieves', '+1-869', NULL, NULL),
(327, 'San Marino', '+378', NULL, NULL),
(328, 'San Vicente y las Granadinas', '+1-784', NULL, NULL),
(329, 'Santa Lucía', '+1-758', NULL, NULL),
(330, 'Santo Tomé y Príncipe', '+239', NULL, NULL),
(331, 'Senegal', '+221', NULL, NULL),
(332, 'Serbia', '+381', NULL, NULL),
(333, 'Seychelles', '+248', NULL, NULL),
(334, 'Sierra Leona', '+232', NULL, NULL),
(335, 'Singapur', '+65', NULL, NULL),
(336, 'Siria', '+963', NULL, NULL),
(337, 'Somalia', '+252', NULL, NULL),
(338, 'Sri Lanka', '+94', NULL, NULL),
(339, 'Suazilandia', '+268', NULL, NULL),
(340, 'Sudáfrica', '+27', NULL, NULL),
(341, 'Sudán', '+249', NULL, NULL),
(342, 'Sudán del Sur', '+211', NULL, NULL),
(343, 'Suecia', '+46', NULL, NULL),
(344, 'Suiza', '+41', NULL, NULL),
(345, 'Surinam', '+597', NULL, NULL),
(346, 'Tailandia', '+66', NULL, NULL),
(347, 'Taiwán', '+886', NULL, NULL),
(348, 'Tanzania', '+255', NULL, NULL),
(349, 'Tayikistán', '+992', NULL, NULL),
(350, 'Timor Oriental', '+670', NULL, NULL),
(351, 'Togo', '+228', NULL, NULL),
(352, 'Tokelau', '+690', NULL, NULL),
(353, 'Tonga', '+676', NULL, NULL),
(354, 'Trinidad y Tobago', '+1-868', NULL, NULL),
(355, 'Túnez', '+216', NULL, NULL),
(356, 'Turkmenistán', '+993', NULL, NULL),
(357, 'Turquía', '+90', NULL, NULL),
(358, 'Tuvalu', '+688', NULL, NULL),
(359, 'Ucrania', '+380', NULL, NULL),
(360, 'Uganda', '+256', NULL, NULL),
(361, 'Uruguay', '+598', NULL, NULL),
(362, 'Uzbekistán', '+998', NULL, NULL),
(363, 'Vanuatu', '+678', NULL, NULL),
(364, 'Venezuela', '+58', NULL, NULL),
(365, 'Vietnam', '+84', NULL, NULL),
(366, 'Wallis y Futuna', '+681', NULL, NULL),
(367, 'Yemen', '+967', NULL, NULL),
(368, 'Yibuti', '+253', NULL, NULL),
(369, 'Zambia', '+260', NULL, NULL),
(370, 'Zimbabue', '+263', NULL, NULL);

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
(1, 'ver usuarios', 'web', NULL, '2024-07-12 21:55:07', '2024-07-12 21:55:07'),
(2, 'indice usuarios', 'web', NULL, '2024-07-12 21:55:13', '2024-07-12 21:55:13'),
(3, 'actualizar usuario', 'web', NULL, '2024-07-12 21:55:19', '2024-07-12 21:55:19'),
(4, 'crear usuario', 'web', NULL, '2024-07-12 21:55:23', '2024-07-12 21:55:23'),
(5, 'borrar usuario', 'web', NULL, '2024-07-12 21:55:29', '2024-07-12 21:55:29'),
(6, 'ver roles', 'web', NULL, '2024-07-12 21:55:39', '2024-07-12 21:55:39'),
(7, 'indice roles', 'web', NULL, '2024-07-12 21:55:45', '2024-07-12 21:55:45'),
(8, 'actualizar rol', 'web', NULL, '2024-07-12 21:55:50', '2024-07-12 21:55:50'),
(9, 'crear rol', 'web', NULL, '2024-07-12 21:55:56', '2024-07-12 21:55:56'),
(10, 'eliminar rol', 'web', NULL, '2024-07-12 21:56:02', '2024-07-12 21:56:02'),
(11, 'agregar permisos al rol', 'web', NULL, '2024-07-12 21:56:09', '2024-07-12 21:56:09'),
(12, 'ver perfil', 'web', NULL, '2024-07-12 21:56:22', '2024-07-12 21:56:22'),
(13, 'actualizar perfil', 'web', NULL, '2024-07-12 21:56:27', '2024-07-12 21:56:27'),
(14, 'actualizar contraseña perfil', 'web', NULL, '2024-07-12 21:56:34', '2024-07-12 21:56:34'),
(15, 'ver permisos', 'web', NULL, '2024-07-12 21:56:42', '2024-07-12 21:56:42'),
(16, 'indice permisos', 'web', NULL, '2024-07-12 21:56:46', '2024-07-12 21:56:46'),
(17, 'actualizar permiso', 'web', NULL, '2024-07-12 21:57:01', '2024-07-12 21:57:01'),
(18, 'crear permiso', 'web', NULL, '2024-07-12 21:57:06', '2024-07-12 21:57:06'),
(19, 'borrar permiso', 'web', NULL, '2024-07-12 21:57:11', '2024-07-12 21:57:11'),
(20, 'ver boton personas', 'web', NULL, '2024-07-12 21:58:59', '2024-07-12 21:58:59'),
(21, 'ver boton roles y permisos', 'web', NULL, '2024-07-12 21:59:22', '2024-07-12 21:59:22'),
(22, 'ver boton de invitado', 'web', NULL, '2024-07-12 21:59:37', '2024-07-12 21:59:37'),
(23, 'ver boton de agremiado', 'web', NULL, '2024-07-12 21:59:42', '2024-07-12 21:59:42'),
(24, 'ver boton mantenimientos', 'web', NULL, '2024-07-12 21:59:49', '2024-07-12 21:59:49'),
(25, 'ver boton notificaciones', 'web', NULL, '2024-07-12 21:59:56', '2024-07-12 21:59:56');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', 'web', 'El rol de Administrador en una página web suele tener los privilegios más elevados y responsabilidades clave en la gestión del sitio. Los administradores tienen acceso completo a todas las funciones y datos del sistema.', '2024-07-12 15:41:29', '2024-07-12 15:41:29'),
(2, 'Agremiado', 'web', 'El rol de Agremiado en la plataforma de un colegio de contadores públicos proporciona acceso privilegiado a recursos educativos, documentos profesionales y herramientas especializadas. ', '2024-07-12 15:46:29', '2024-07-12 15:46:35'),
(3, 'Invitado', 'web', '\r\nEl rol de Invitado en una página web generalmente es el nivel de acceso más básico y limitado. Los invitados suelen tener acceso solo a funciones y contenido públicos del sitio.', '2024-07-12 15:46:38', '2024-07-12 15:46:43'),
(5, 'Marketing', 'web', NULL, '2024-07-13 04:42:23', '2024-07-13 04:42:23');

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
(12, 2),
(13, 2),
(14, 2),
(23, 2),
(12, 3),
(13, 3),
(14, 3),
(22, 3);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Volcado de datos para la tabla `security_questions`
--

INSERT INTO `security_questions` (`id`, `question`, `created_at`, `updated_at`) VALUES
(1, '¿Cuál es tu deporte favorito?', '2024-07-12 22:19:18', '2024-07-12 22:19:18'),
(2, '¿Cuál es tu comida favorita?', '2024-07-13 04:32:02', '2024-07-13 04:32:02');

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
  `telefono` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `telefono_celular` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `estado` enum('activo','inactivo') COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT 'activo',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `pais_id` bigint UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_numero_identidad_unique` (`numero_identidad`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_numero_colegiacion_unique` (`numero_colegiacion`),
  UNIQUE KEY `users_rtn_unique` (`rtn`),
  KEY `users_pais_id_foreign` (`pais_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `name2`, `apellido`, `apellido2`, `numero_identidad`, `numero_colegiacion`, `rtn`, `sexo`, `fecha_nacimiento`, `telefono`, `telefono_celular`, `email`, `estado`, `email_verified_at`, `password`, `pais_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', NULL, 'Cohpucp', NULL, '1707-2000-00138', '2024-06-0001', '1707-2000-001381', 'masculino', '2000-02-26', '2231-1076', '9640-4788', 'administrador_cohpucp@gmail.com', 'activo', NULL, '$2y$10$cp6HyqqEtPFxPGkn1IoJo.DVtOAeBtObu3muIMZeQ6gxppx1//Fq.', 200, NULL, '2024-07-12 21:48:36', '2024-07-12 21:48:36'),
(2, 'Agremiado', NULL, 'Cohpucp', NULL, '1707-2000-12315', '2024-06-0002', '1707-2000-123151', 'masculino', '2000-04-24', '2247-5478', '9921-5446', 'agremiado@cohpucpgmail.com', 'activo', NULL, '$2y$10$ofNBTFCeIx2sMqKuh0oX5OIrQQ2EYv/gHCyT7LyZZUGLLFnpZ9MkW', 222, NULL, '2024-07-12 21:53:53', '2024-07-12 21:53:53'),
(3, 'Invitado', NULL, 'Cohpucp', NULL, '1707-1987-12415', '2024-06-0003', '1707-1987-124151', 'masculino', '1987-11-25', '2213-1598', '9945-7711', 'invitado_cohpucp@gmail.com', 'activo', NULL, '$2y$10$0ZBT84c9IvU3JDFDxUcHPeAUY7do3mRoyB1r7YJCdgwxz4LBFlLw.', 224, NULL, '2024-07-12 22:03:04', '2024-07-12 22:03:04'),
(4, 'Marisa', 'Elizabeth', 'Pineda', 'Pavón', '1707-1987-11111', '2024-06-4245', '1707-1987-111115', 'femenino', '1987-04-21', '2231-2245', '9924-5777', 'marisapineda@gmail.com', 'activo', NULL, '$2y$10$H6Pwo.lV3cmRAh4G1yfRD.5lCSa.dKio1KV87jbLivgpDD6xHJj/u', 223, NULL, '2024-07-13 03:21:57', '2024-07-13 03:21:57'),
(5, 'Carlos', 'Alberto', 'Pavón', 'Plummer', '1707-1999-12545', '2024-06-3365', '1707-1999-125451', 'masculino', '1999-04-21', '2256-4578', '9910-4564', 'carlospavon@gmail.com', 'activo', NULL, '$2y$10$T1SDEhzSae.KRVqCl32ToOnDAj35Gb1.zGvUylsc3z7lgnoNiP14y', 225, NULL, '2024-07-13 03:40:08', '2024-07-13 03:40:08'),
(6, 'Karla', 'Camila', 'Hernández', 'Díaz', '1707-1987-11245', '2024-06-7891', '1707-1987-112451', 'femenino', '1987-04-17', '2201-5487', '9988-7777', 'mariahernandez@gmail.com', 'activo', NULL, '$2y$10$4T1Kg5fbPANyHjUmDfzkbeCaLgwIiUjgzOIw1hrJLpvHDwyinAsxK', NULL, NULL, '2024-07-13 03:49:20', '2024-07-13 04:31:00'),
(7, 'Manuel', 'Alejandro', 'Almendarez', 'Matamoros', '0801-1989-20794', '2014-01-2220', NULL, 'masculino', '1989-08-25', NULL, '3356-0773', 'administraciongerencial@cohpucphn.org', 'activo', NULL, '$2y$10$w6UdfCkvPbeujV6DwcJ9yOpLelLbRYHLEW098EboSCezDz3Xq25yi', NULL, NULL, '2024-07-13 04:37:00', '2024-07-13 04:39:15');

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
  ADD CONSTRAINT `cursos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_pais_id_foreign` FOREIGN KEY (`pais_id`) REFERENCES `pais` (`id`) ON DELETE SET NULL;

--
-- Filtros para la tabla `user_security_questions`
--
ALTER TABLE `user_security_questions`
  ADD CONSTRAINT `user_security_questions_security_question_id_foreign` FOREIGN KEY (`security_question_id`) REFERENCES `security_questions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_security_questions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
