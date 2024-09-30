-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 30-09-2024 a las 22:42:18
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
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `capacitaciones_user_id_foreign` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categorias_nombre_unique` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Contabilidad Finaciera', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(2, 'Contabilidad de Costos', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(3, 'Contabilidad Gerencial', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(4, 'Contabilidad Tributaria', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(5, 'Contabilidad Gubernamental', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(6, 'Normas Internacionales de Información Financiera (NIIF)', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(7, 'Contabilidad Forense', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(8, 'Auditoría', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(9, 'Sistemas Contables', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(10, 'Ética y Responsabilidad Social', '2024-09-21 03:54:03', '2024-09-21 03:54:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

DROP TABLE IF EXISTS `cursos`;
CREATE TABLE IF NOT EXISTS `cursos` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `layout` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titulo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci,
  `precio` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `enlace` text COLLATE utf8mb4_unicode_ci,
  `icono` text COLLATE utf8mb4_unicode_ci,
  `calificacion` decimal(3,1) DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `idioma_id` bigint UNSIGNED DEFAULT NULL,
  `categoria_id` bigint UNSIGNED DEFAULT NULL,
  `imagen` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cursos_user_id_foreign` (`user_id`),
  KEY `cursos_idioma_id_foreign` (`idioma_id`),
  KEY `cursos_categoria_id_foreign` (`categoria_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id`, `layout`, `titulo`, `nombre`, `descripcion`, `precio`, `enlace`, `icono`, `calificacion`, `user_id`, `idioma_id`, `categoria_id`, `imagen`, `created_at`, `updated_at`) VALUES
(2, 'Imagen de fondo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 'ZX5wxsoBgN3ZOGoIWG7c1OckCEWIuStAb4f8bNat.png', '2024-09-23 23:27:01', '2024-09-23 23:27:01'),
(3, 'Tarjetas de cursos', NULL, 'EXCEL AVANZADO', 'AZdcaszfcasdgvdsgvdsgfdsgfdgfdgfdgfdhbfdhg', '150.45 Lps', 'https://www.coursera.org/professional-certificates/google-data-analytics', 'https://www.flaticon.es/', NULL, 1, 3, 2, '88JIBVeT2YecBvCIsNWAZmjlGGUH4kPycSDgVWSf.jpg', '2024-09-26 02:23:39', '2024-09-26 22:04:51'),
(4, 'Tarjetas de cursos', NULL, 'INGLÉS AVANZADO', 'sazfdsxgfdhtrujghtytygujtygutygjtyg', '120.65 Lps', 'https://edutin.com/curso-de-java', 'https://www.flaticon.es/', NULL, 1, 3, 4, '6OrSzSYuAheFSdx1kmPob7pMVQSKimmncWFjE2zi.jpg', '2024-09-26 02:24:25', '2024-09-26 22:04:59'),
(5, 'Tarjetas de cursos', NULL, 'INTELIGENCIA ARTIFICIAL', 'dsxgrdstuyuytrfdg ewkjsrkdahfiluewajshkfdlasolfdk edskjfhdskjfkdsjfkjadsflkjAS', 'Gratis', 'https://www.udemy.com/?utm_source=adwords&utm_medium=udemyads&utm_campaign=Search_Keyword_Gamma_NonP_la.ES_cc.ROW-Spanish&campaigntype=Search&portfolio=ROW-Spanish&language=ES&product=Course&test=&audience=Keyword&topic=&priority=Gamma&utm_content=deal4584&utm_term=_._ag_167955707751_._ad_706532012812_._kw_cursos%20online_._de_c_._dm__._pl__._ti_kwd-21193271_._li_9069972_._pd__._&matchtype=b&gad_source=1&gclid=Cj0KCQjw8MG1BhCoARIsAHxSiQl-cr_-p7m73OFpOKvqdYFxvU_Y1aC425FcbDqCayFy40nuWSoUfmoaAnngEALw_wcB#gad_source=1', 'https://www.flaticon.es/', NULL, 1, 6, 2, 'uZmdA6hsUH7RZDIWfO9H7iTAvGAlS0wEc9VgOBsR.png', '2024-09-26 02:25:10', '2024-09-26 02:25:10'),
(6, 'Tarjetas de cursos', NULL, 'AUDITORÍA FINACIERA', 'hrftruf 65mjfj,edskfoijsedf dksjfhlkjdshflkds fdwsk.hflkjdsahfalkjdshlkfas fdskfhdskj,hfalkdshflkdszxf cdslkfhdslkfdws tyutyuty um65tyutrytre', '70.45 Lps', 'https://support.microsoft.com/es-es/topic/conceptos-b%C3%A1sicos-sobre-bases-de-datos-a849ac16-07c7-4a31-9948-3c8c94a7c204', 'https://www.flaticon.es/', NULL, 1, 2, 6, 'cofKFFaqC9RS5Mt50XMcEuQ9QJfMLw9NDIqRAC3y.jpg', '2024-09-26 02:26:13', '2024-09-26 22:05:20'),
(7, 'Tarjetas de cursos', NULL, 'PYTHON', 'hghfdgrfddfgd', 'Gratis', 'https://edutin.com/curso-de-java', 'https://www.flaticon.es/', NULL, 1, 2, 4, 'fMQER4vyFTQpbgwzPquPuIwsGKBJPij7yQfrSHcj.png', '2024-09-26 21:07:28', '2024-09-26 21:07:28'),
(8, 'Tarjetas de cursos', NULL, 'BASE DE DATOS', 'Una base de datos es una herramienta para recopilar y organizar información. Las bases de datos pueden almacenar información sobre personas, productos, pedidos u otras cosas. Muchas bases de datos comienzan como una lista en una hoja de cálculo o en un programa de procesamiento de texto.', '50.45 Lps', 'https://infopvirtual.com/curso/ms-excel-avanzado/', 'https://www.flaticon.es/', NULL, 1, 5, 2, 'hCYQ0XZYqQvkMKAWZviUZNDtl35e1gxWe3e3mFjK.jpg', '2024-09-26 21:31:40', '2024-09-26 22:05:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dashboard_contents`
--

DROP TABLE IF EXISTS `dashboard_contents`;
CREATE TABLE IF NOT EXISTS `dashboard_contents` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `layout` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `pdf` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `images` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `videos` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `links` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `dashboard_contents_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `dashboard_contents`
--

INSERT INTO `dashboard_contents` (`id`, `layout`, `title`, `subtitle`, `description`, `pdf`, `images`, `videos`, `links`, `facebook_link`, `twitter_link`, `youtube_link`, `whatsapp_link`, `instagram_link`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 'Archivos', NULL, NULL, NULL, NULL, 'dashboard_images/kubITpmqMpYS4wmnZTZoZ4Vzg2haDEUuHVowgOxT.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-09-26 00:44:10', '2024-09-26 00:44:10'),
(3, 'Por defecto', NULL, NULL, NULL, NULL, 'dashboard_images/h0ddlTJ0OqTJZEIG70hEBErdkWW0bcxJAsc8gHC7.jpg', NULL, 'https://support.microsoft.com/es-es/topic/conceptos-b%C3%A1sicos-sobre-bases-de-datos-a849ac16-07c7-4a31-9948-3c8c94a7c204', NULL, NULL, NULL, NULL, NULL, 1, '2024-09-26 02:42:38', '2024-09-26 02:58:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `footer_contents`
--

DROP TABLE IF EXISTS `footer_contents`;
CREATE TABLE IF NOT EXISTS `footer_contents` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `links` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telegram_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkendin_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `boton` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `footer_contents_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `footer_contents`
--

INSERT INTO `footer_contents` (`id`, `title`, `description`, `links`, `facebook_link`, `twitter_link`, `youtube_link`, `whatsapp_link`, `instagram_link`, `telegram_link`, `linkendin_link`, `boton`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'CONTENIDO', 'Copyright © 2010-2024 Freepik Company S.L. Todos los derechos reservados.', NULL, 'https://www.facebook.com', 'https://x.com/?lang=es', 'https://www.youtube.com/channel/UCXh_r9GGeC3ezJqohIkPEAg', 'https://web.whatsapp.com/', 'https://www.instagram.com/', 'https://web.telegram.org/', 'https://es.linkedin.com', 'https://www.flaticon.es/', NULL, '2024-09-23 23:40:15', '2024-09-24 00:13:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `idiomas`
--

DROP TABLE IF EXISTS `idiomas`;
CREATE TABLE IF NOT EXISTS `idiomas` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idiomas_nombre_unique` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `idiomas`
--

INSERT INTO `idiomas` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Español', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(2, 'Inglés', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(3, 'Fránces', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(4, 'Alemán', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(5, 'Italiano', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(6, 'Portugués', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(7, 'Árabe', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(8, 'Ruso', '2024-09-21 03:54:03', '2024-09-21 03:54:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripciones`
--

DROP TABLE IF EXISTS `inscripciones`;
CREATE TABLE IF NOT EXISTS `inscripciones` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `fecha_inscripcion` date NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apellido` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero_identidad` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `lugar_nacimiento` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion_residencia` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono_celular` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `municipio_realiza_solicitud` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_graduacion` date NOT NULL,
  `universidad` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre_empresa_trabajo_actual` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cargo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion_empresa` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `correo_empresa` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono_empresa` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extension_telefono_empresa` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `especialidad_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lugar_especialidad_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_especialidad_1` date DEFAULT NULL,
  `especialidad_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lugar_especialidad_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_especialidad_2` date DEFAULT NULL,
  `nombre_curso_especializacion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lugar_curso` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_curso` date DEFAULT NULL,
  `nombre_empresa1` text COLLATE utf8mb4_unicode_ci,
  `cargo_empresa1` text COLLATE utf8mb4_unicode_ci,
  `duración_empresa1` text COLLATE utf8mb4_unicode_ci,
  `nombre_empresa2` text COLLATE utf8mb4_unicode_ci,
  `cargo_empresa2` text COLLATE utf8mb4_unicode_ci,
  `duración_empresa2` text COLLATE utf8mb4_unicode_ci,
  `comisiones` text COLLATE utf8mb4_unicode_ci,
  `representaciones` text COLLATE utf8mb4_unicode_ci,
  `delegaciones` text COLLATE utf8mb4_unicode_ci,
  `publicacion_documentos` text COLLATE utf8mb4_unicode_ci,
  `publicaciones` text COLLATE utf8mb4_unicode_ci,
  `publicacion_libro` text COLLATE utf8mb4_unicode_ci,
  `imagen_titulo` json NOT NULL,
  `imagen_dni` json NOT NULL,
  `imagen_tamano_carnet` json NOT NULL,
  `cv` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen_dni_beneficiario1` json NOT NULL,
  `imagen_dni_beneficiario2` json DEFAULT NULL,
  `imagen_dni_beneficiario3` json DEFAULT NULL,
  `imagen_rtn` json DEFAULT NULL,
  `imagen_firma_solicitante` json DEFAULT NULL,
  `estado` enum('pendiente','aprobado','rechazado') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pendiente',
  `descripcion_estado_solicitud` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `inscripciones_numero_identidad_unique` (`numero_identidad`),
  UNIQUE KEY `inscripciones_email_unique` (`email`),
  UNIQUE KEY `inscripciones_correo_empresa_unique` (`correo_empresa`),
  KEY `inscripciones_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `inscripciones`
--

INSERT INTO `inscripciones` (`id`, `fecha_inscripcion`, `user_id`, `name`, `name2`, `apellido`, `apellido2`, `numero_identidad`, `fecha_nacimiento`, `lugar_nacimiento`, `direccion_residencia`, `telefono`, `telefono_celular`, `email`, `municipio_realiza_solicitud`, `fecha_graduacion`, `universidad`, `nombre_empresa_trabajo_actual`, `cargo`, `direccion_empresa`, `correo_empresa`, `telefono_empresa`, `extension_telefono_empresa`, `especialidad_1`, `lugar_especialidad_1`, `fecha_especialidad_1`, `especialidad_2`, `lugar_especialidad_2`, `fecha_especialidad_2`, `nombre_curso_especializacion`, `lugar_curso`, `fecha_curso`, `nombre_empresa1`, `cargo_empresa1`, `duración_empresa1`, `nombre_empresa2`, `cargo_empresa2`, `duración_empresa2`, `comisiones`, `representaciones`, `delegaciones`, `publicacion_documentos`, `publicaciones`, `publicacion_libro`, `imagen_titulo`, `imagen_dni`, `imagen_tamano_carnet`, `cv`, `imagen_dni_beneficiario1`, `imagen_dni_beneficiario2`, `imagen_dni_beneficiario3`, `imagen_rtn`, `imagen_firma_solicitante`, `estado`, `descripcion_estado_solicitud`, `created_at`, `updated_at`) VALUES
(1, '2024-09-25', 1, 'Anibal', 'Johan', 'Godinez', 'Cortez', '0801-1984-15578', '1984-06-25', 'Colón', 'Isla Santa Elena, bloque #45', '2255-1123', '3356-0773', 'anibalgodinez64@gmail.com', NULL, '2010-01-02', 'Universidad Nacional Autónoma de Honduras (UNAH)', 'Tesla Corporations inc', 'Ingeniero de Integración Electrónica', 'Área industrial Este de Fremont, California, entre las autovías interestatales Interstate 880 y la California 680.', 'teslacorporation@org.com', '+1 2255-6598', '1254', 'Maestría en Finanzas', 'CEUTEC', '2010-01-02', 'Doctorado en Auditoría', 'UNAH', '2015-01-02', 'Phyton avanzado', 'UDEMY', '2000-04-02', 'Claro Honduras', 'Técnico en Redes', '3 años', 'Ficohsa', 'Analista de Datos', '2 años', 'aawshfdakjlshfdalkjshd lwawasoihfdaslkfdalkshfasdfasfas', 'adsfdsxfsdzfdszx fdsfheadskzjfhzlkdxñfcdsf', 'sdfxdsa,fkaoidsfe eaodsifjlkdsajfoñiaSJfñoiasd', 'dsfds feoidshflkjewdshflkj', 'fdsfleaudsoiewudsfjokledslfASHd dslkjhfalkjdshf szd', 'dsfsdfkewjadshfoiahsfdoiuahsifjhds', '\"[\\\"imgs_titulo_inscripcion\\\\/1727295743_T\\\\u00edtulo 1.jpg\\\",\\\"imgs_titulo_inscripcion\\\\/1727295743_T\\\\u00edtulo 2.jpg\\\"]\"', '\"[\\\"imgs_dni_inscripcion\\\\/1727295743_DNI Propio.png\\\",\\\"imgs_dni_inscripcion\\\\/1727295743_DNI rev\\\\u00e9s Propio.jpg\\\"]\"', '\"[\\\"imgs_tamano_carnet_inscripcion\\\\/1727295743_console267412a24457e8336ecaea2d8811457317.png\\\"]\"', 'cvs_inscripcion/1727295743_Curriculum Vitae - Beige MUJER.pdf', '\"[\\\"imgs_dni_beneficiario1_inscripcion\\\\/1727295743_DNI-1.png\\\",\\\"imgs_dni_beneficiario1_inscripcion\\\\/1727295743_DNI-1-.jpg\\\"]\"', '\"[\\\"imgs_dni_beneficiario2_inscripcion\\\\/1727295743_DNI-2.jpg\\\",\\\"imgs_dni_beneficiario2_inscripcion\\\\/1727295743_DNI2-.jpg\\\"]\"', '\"[\\\"imgs_dni_beneficiario3_inscripcion\\\\/1727295743_DNI 3.png\\\",\\\"imgs_dni_beneficiario3_inscripcion\\\\/1727295743_DNI 3 Reves.png\\\"]\"', '\"[\\\"imgs_rtn_inscripcion\\\\/1727295743_RTN-PERSONAL_1.jpg\\\"]\"', '[\"imgs_firma_socicitante_inscripcion/1727295743_imagen 2.png\"]', 'pendiente', NULL, '2024-09-26 02:22:23', '2024-09-26 02:22:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcion_firmas`
--

DROP TABLE IF EXISTS `inscripcion_firmas`;
CREATE TABLE IF NOT EXISTS `inscripcion_firmas` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `fecha_inscripcion` date NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `nombre_sociedad` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `num_inscripcion_registro_publico_comercio` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_constitucion` date NOT NULL,
  `registro_tributario_nacional` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `num_inscripcion_camara_comercio` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `municipio_realiza_solicitud` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `celular` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `primer_nombre_socio1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `segundo_nombre_socio1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `primer_apellido_socio1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `segundo_apellido_socio1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `num_colegiacion_socio1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cv_socio1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagen_firma_socio1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `constancia_solvencia_socio1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `primer_nombre_socio2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `segundo_nombre_socio2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `primer_apellido_socio2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `segundo_apellido_socio2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `num_colegiacion_socio2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cv_socio2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagen_firma_socio2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `constancia_solvencia_socio2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `primer_nombre_socio3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `segundo_nombre_socio3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `primer_apellido_socio3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `segundo_apellido_socio3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `num_colegiacion_socio3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cv_socio3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagen_firma_socio3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `constancia_solvencia_socio3` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `primer_nombre_socio4` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `segundo_nombre_socio4` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `primer_apellido_socio4` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `segundo_apellido_socio4` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `num_colegiacion_socio4` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cv_socio4` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagen_firma_socio4` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `constancia_solvencia_socio4` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagen_escritura_constitucion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagen_registro_mercantil` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagen_rtn_firma_auditora` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomina_pago_firma` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagen_firma_social` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagen_firma_representante_legal` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` enum('pendiente','aprobado','rechazado') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pendiente',
  `descripcion_estado_solicitud` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `inscripcion_firmas_email_unique` (`email`),
  KEY `inscripcion_firmas_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `inscripcion_firmas`
--

INSERT INTO `inscripcion_firmas` (`id`, `fecha_inscripcion`, `user_id`, `nombre_sociedad`, `num_inscripcion_registro_publico_comercio`, `fecha_constitucion`, `registro_tributario_nacional`, `num_inscripcion_camara_comercio`, `municipio_realiza_solicitud`, `direccion`, `telefono`, `celular`, `email`, `primer_nombre_socio1`, `segundo_nombre_socio1`, `primer_apellido_socio1`, `segundo_apellido_socio1`, `num_colegiacion_socio1`, `cv_socio1`, `imagen_firma_socio1`, `constancia_solvencia_socio1`, `primer_nombre_socio2`, `segundo_nombre_socio2`, `primer_apellido_socio2`, `segundo_apellido_socio2`, `num_colegiacion_socio2`, `cv_socio2`, `imagen_firma_socio2`, `constancia_solvencia_socio2`, `primer_nombre_socio3`, `segundo_nombre_socio3`, `primer_apellido_socio3`, `segundo_apellido_socio3`, `num_colegiacion_socio3`, `cv_socio3`, `imagen_firma_socio3`, `constancia_solvencia_socio3`, `primer_nombre_socio4`, `segundo_nombre_socio4`, `primer_apellido_socio4`, `segundo_apellido_socio4`, `num_colegiacion_socio4`, `cv_socio4`, `imagen_firma_socio4`, `constancia_solvencia_socio4`, `imagen_escritura_constitucion`, `imagen_registro_mercantil`, `imagen_rtn_firma_auditora`, `nomina_pago_firma`, `imagen_firma_social`, `imagen_firma_representante_legal`, `estado`, `descripcion_estado_solicitud`, `created_at`, `updated_at`) VALUES
(1, '2024-09-23', 1, 'Precision Auditing', '56456448', '2024-09-23', '61574564', '23654124', 'Choloma, Cortes', 'Colonia Maya, avenida los Próceres', '2231-1076', '9687-4154', 'anibalgodinez64@gmail.com', 'Lester', 'Armando', 'Vallecillo', 'Montoya', '2011-06-5647', 'cv_socio1_inscripcion_firma/E0E5yBVzqwW1a4bRaIvo2Tztx72ccpBPnCWu9RQn.pdf', 'img_firma_socio1_inscripcion_firma/1727131766_que-es-la-revisoria-fiscal-y-la-auditoria-financiera-y-cuales-son-sus-diferencias-y-similitudes.jpg', 'img_constancia_socio1_inscripcion_firma/1727131766_que-es-la-revisoria-fiscal-y-la-auditoria-financiera-y-cuales-son-sus-diferencias-y-similitudes.jpg', 'Cinthia', 'Gissel', 'Durón', 'Castro', '1999-03-2454', 'cv_socio2_inscripcion_firma/vdG9xK6YhtzJt89WLBx2uMwsWcbPqXJ5GTe1gtfz.pdf', 'img_firma_socio2_inscripcion_firma/1727131766_im-storie-los-cursos-online-gratuitos-de-educacion-financiera-que-tienes-que-hacer-en-2021-desktop.jpg', 'img_constancia_socio2_inscripcion_firma/1727131766_FNDMLSB6CJOS5E55EHOSZA4MBU.jpg', 'Scarleth', 'Yuberlin', 'Quiróz', 'Castro', '2005-06-3244', NULL, 'img_firma_socio3_inscripcion_firma/1727131766_WhatsApp Image 2024-09-20 at 12.15.05 PM.jpeg', 'img_constancia_socio3_inscripcion_firma/1727131766_adolescente-usando-laptop-escuela-linea_23-2148827432.jpg', 'Kelin', 'Vanessa', 'Gómez', 'Escalante', '2002-11-2367', 'cv_socio4_inscripcion_firma/YvnaiSevZ1gHDOcKXaWohGsedwGB30jaeKkV1BBW.pdf', NULL, 'img_constancia_socio4_inscripcion_firma/1727131766_WhatsApp Image 2024-09-20 at 12.15.05 PM.jpeg', 'img_firma_escritura_constitucion/1727131766_adolescente-usando-laptop-escuela-linea_23-2148827432.jpg', 'img_firma_registro_mercantil/1727131766_que-es-la-revisoria-fiscal-y-la-auditoria-financiera-y-cuales-son-sus-diferencias-y-similitudes.jpg', 'img_firma_rtn/1727131766_que-es-la-revisoria-fiscal-y-la-auditoria-financiera-y-cuales-son-sus-diferencias-y-similitudes.jpg', 'nomina_pago_firma_inscripcion_firma/QmYcqXopvAcF6955GgQqQMlxb7ZYjbUEYUHKUQkv.pdf', 'img_firma_social_inscripcion_firma/1727131766_fotografia-profesional-1.jpg', 'img_firma_representante_inscripcion_firma/1727131766_desarollo-software-1024x678.jpeg', 'pendiente', NULL, '2024-09-24 04:49:26', '2024-09-24 04:49:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2019_12_14_000002_create_universidades_table', 1),
(5, '2024_05_27_020000_create_pais_table', 1),
(6, '2024_05_28_0212547_create_sexos_table', 1),
(7, '2024_05_29_030000_create_users_table', 1),
(8, '2024_06_03_143665_create_idiomas_table', 1),
(9, '2024_06_03_143674_create_categorias_table', 1),
(10, '2024_06_03_143702_create_cursos_table', 1),
(11, '2024_06_04_163925_create_capacitaciones_table', 1),
(12, '2024_06_06_172142_create_permission_tables', 1),
(13, '2024_07_01_152617_create_security_questions_table', 1),
(14, '2024_07_01_152804_create_user_security_questions_table', 1),
(15, '2024_07_22_205244_create_welcome_contents_table', 1),
(16, '2024_07_31_202421_create_dashboard_contents_table', 1),
(17, '2024_08_01_210348_create_footer_contents_table', 1),
(18, '2024_08_12_165432_create_inscripciones_table', 1),
(19, '2024_08_14_151035_create_notifications_table', 1),
(20, '2024_08_23_175732_create_inscripcion_firmas_table', 1),
(21, '2024_08_27_160448_create_numero_colegiacion_table', 1),
(22, '2024_09_20_210808_create_solicitudes_vacantes_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `numero_colegiacion`
--

DROP TABLE IF EXISTS `numero_colegiacion`;
CREATE TABLE IF NOT EXISTS `numero_colegiacion` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `numero_colegiacion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `numero_colegiacion_numero_colegiacion_unique` (`numero_colegiacion`),
  KEY `numero_colegiacion_user_id_foreign` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

DROP TABLE IF EXISTS `pais`;
CREATE TABLE IF NOT EXISTS `pais` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codigo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pais_nombre_unique` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=210 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`id`, `nombre`, `codigo`, `created_at`, `updated_at`) VALUES
(1, 'Afganistán', '+93', '2024-09-21 03:54:02', '2024-09-21 03:54:02'),
(2, 'Albania', '+355', '2024-09-21 03:54:02', '2024-09-21 03:54:02'),
(3, 'Alemania', '+49', '2024-09-21 03:54:02', '2024-09-21 03:54:02'),
(4, 'Andorra', '+376', '2024-09-21 03:54:02', '2024-09-21 03:54:02'),
(5, 'Angola', '+244', '2024-09-21 03:54:02', '2024-09-21 03:54:02'),
(6, 'Anguila', '+1-264', '2024-09-21 03:54:02', '2024-09-21 03:54:02'),
(7, 'Antártida', '+672', '2024-09-21 03:54:02', '2024-09-21 03:54:02'),
(8, 'Antigua y Barbuda', '+1-268', '2024-09-21 03:54:02', '2024-09-21 03:54:02'),
(9, 'Arabia Saudita', '+966', '2024-09-21 03:54:02', '2024-09-21 03:54:02'),
(10, 'Argelia', '+213', '2024-09-21 03:54:02', '2024-09-21 03:54:02'),
(11, 'Argentina', '+54', '2024-09-21 03:54:02', '2024-09-21 03:54:02'),
(12, 'Armenia', '+374', '2024-09-21 03:54:02', '2024-09-21 03:54:02'),
(13, 'Aruba', '+297', '2024-09-21 03:54:02', '2024-09-21 03:54:02'),
(14, 'Australia', '+61', '2024-09-21 03:54:02', '2024-09-21 03:54:02'),
(15, 'Austria', '+43', '2024-09-21 03:54:02', '2024-09-21 03:54:02'),
(16, 'Azerbaiyán', '+994', '2024-09-21 03:54:02', '2024-09-21 03:54:02'),
(17, 'Bahamas', '+1-242', '2024-09-21 03:54:02', '2024-09-21 03:54:02'),
(18, 'Bangladés', '+880', '2024-09-21 03:54:02', '2024-09-21 03:54:02'),
(19, 'Baréin', '+973', '2024-09-21 03:54:02', '2024-09-21 03:54:02'),
(20, 'Barbados', '+1-246', '2024-09-21 03:54:02', '2024-09-21 03:54:02'),
(21, 'Bélgica', '+32', '2024-09-21 03:54:02', '2024-09-21 03:54:02'),
(22, 'Belice', '+501', '2024-09-21 03:54:02', '2024-09-21 03:54:02'),
(23, 'Benín', '+229', '2024-09-21 03:54:02', '2024-09-21 03:54:02'),
(24, 'Bermudas', '+1-441', '2024-09-21 03:54:02', '2024-09-21 03:54:02'),
(25, 'Bielorrusia', '+375', '2024-09-21 03:54:02', '2024-09-21 03:54:02'),
(26, 'Birmania', '+95', '2024-09-21 03:54:02', '2024-09-21 03:54:02'),
(27, 'Bolivia', '+591', '2024-09-21 03:54:02', '2024-09-21 03:54:02'),
(28, 'Bosnia y Herzegovina', '+387', '2024-09-21 03:54:02', '2024-09-21 03:54:02'),
(29, 'Botsuana', '+267', '2024-09-21 03:54:02', '2024-09-21 03:54:02'),
(30, 'Brasil', '+55', '2024-09-21 03:54:02', '2024-09-21 03:54:02'),
(31, 'Brunéi', '+673', '2024-09-21 03:54:02', '2024-09-21 03:54:02'),
(32, 'Bulgaria', '+359', '2024-09-21 03:54:02', '2024-09-21 03:54:02'),
(33, 'Burkina Faso', '+226', '2024-09-21 03:54:02', '2024-09-21 03:54:02'),
(34, 'Burundi', '+257', '2024-09-21 03:54:02', '2024-09-21 03:54:02'),
(35, 'Bután', '+975', '2024-09-21 03:54:02', '2024-09-21 03:54:02'),
(36, 'Cabo Verde', '+238', '2024-09-21 03:54:02', '2024-09-21 03:54:02'),
(37, 'Camboya', '+855', '2024-09-21 03:54:02', '2024-09-21 03:54:02'),
(38, 'Camerún', '+237', '2024-09-21 03:54:02', '2024-09-21 03:54:02'),
(39, 'Canadá', '+1', '2024-09-21 03:54:02', '2024-09-21 03:54:02'),
(40, 'Chad', '+235', '2024-09-21 03:54:02', '2024-09-21 03:54:02'),
(41, 'Chile', '+56', '2024-09-21 03:54:02', '2024-09-21 03:54:02'),
(42, 'China', '+86', '2024-09-21 03:54:02', '2024-09-21 03:54:02'),
(43, 'Chipre', '+357', '2024-09-21 03:54:02', '2024-09-21 03:54:02'),
(44, 'Ciudad del Vaticano', '+379', '2024-09-21 03:54:02', '2024-09-21 03:54:02'),
(45, 'Colombia', '+57', '2024-09-21 03:54:02', '2024-09-21 03:54:02'),
(46, 'Comoras', '+269', '2024-09-21 03:54:02', '2024-09-21 03:54:02'),
(47, 'Congo', '+242', '2024-09-21 03:54:02', '2024-09-21 03:54:02'),
(48, 'Corea del Norte', '+850', '2024-09-21 03:54:02', '2024-09-21 03:54:02'),
(49, 'Corea del Sur', '+82', '2024-09-21 03:54:02', '2024-09-21 03:54:02'),
(50, 'Costa de Marfil', '+225', '2024-09-21 03:54:02', '2024-09-21 03:54:02'),
(51, 'Costa Rica', '+506', '2024-09-21 03:54:02', '2024-09-21 03:54:02'),
(52, 'Croacia', '+385', '2024-09-21 03:54:02', '2024-09-21 03:54:02'),
(53, 'Cuba', '+53', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(54, 'Dinamarca', '+45', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(55, 'Dominica', '+1-767', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(56, 'Ecuador', '+593', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(57, 'Egipto', '+20', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(58, 'El Salvador', '+503', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(59, 'Emiratos Árabes Unidos', '+971', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(60, 'Eritrea', '+291', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(61, 'Eslovaquia', '+421', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(62, 'Eslovenia', '+386', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(63, 'España', '+34', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(64, 'Estados Federados de Micronesia', '+691', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(65, 'Estados Unidos de América', '+1', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(66, 'Estonia', '+372', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(67, 'Etiopía', '+251', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(68, 'Filipinas', '+63', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(69, 'Finlandia', '+358', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(70, 'Fiyi', '+679', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(71, 'Francia', '+33', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(72, 'Gabón', '+241', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(73, 'Gambia', '+220', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(74, 'Georgia', '+995', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(75, 'Ghana', '+233', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(76, 'Gibraltar', '+350', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(77, 'Grecia', '+30', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(78, 'Groenlandia', '+299', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(79, 'Guadalupe', '+590', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(80, 'Guam', '+1-671', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(81, 'Guatemala', '+502', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(82, 'Guayana Francesa', '+594', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(83, 'Guernsey', '+44-1481', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(84, 'Guinea', '+224', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(85, 'Guinea Ecuatorial', '+240', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(86, 'Guinea-Bisáu', '+245', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(87, 'Guyana', '+592', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(88, 'Haití', '+509', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(89, 'Honduras', '+504', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(90, 'Hong Kong', '+852', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(91, 'Hungría', '+36', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(92, 'India', '+91', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(93, 'Indonesia', '+62', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(94, 'Irak', '+964', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(95, 'Irán', '+98', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(96, 'Irlanda', '+353', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(97, 'Isla de Man', '+44-1624', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(98, 'Isla Pitcairn', '+64', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(99, 'Islas Caimán', '+1-345', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(100, 'Islas Cook', '+682', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(101, 'Islas Feroe', '+298', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(102, 'Islas Malvinas', '+500', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(103, 'Islas Marianas del Norte', '+1-670', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(104, 'Islas Marshall', '+692', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(105, 'Islas Salomón', '+677', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(106, 'Islas Turcas y Caicos', '+1-649', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(107, 'Islas Vírgenes Británicas', '+1-284', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(108, 'Islas Vírgenes de los Estados Unidos', '+1-340', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(109, 'Israel', '+972', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(110, 'Italia', '+39', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(111, 'Jamaica', '+1-876', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(112, 'Japón', '+81', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(113, 'Jersey', '+44-1534', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(114, 'Jordania', '+962', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(115, 'Kazajistán', '+7', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(116, 'Kenia', '+254', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(117, 'Kirguistán', '+996', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(118, 'Kiribati', '+686', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(119, 'Kuwait', '+965', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(120, 'Laos', '+856', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(121, 'Letonia', '+371', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(122, 'Líbano', '+961', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(123, 'Liberia', '+231', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(124, 'Libia', '+218', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(125, 'Liechtenstein', '+423', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(126, 'Lituania', '+370', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(127, 'Luxemburgo', '+352', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(128, 'Madagascar', '+261', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(129, 'Malasia', '+60', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(130, 'Malawi', '+265', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(131, 'Maldivas', '+960', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(132, 'Malí', '+223', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(133, 'Malta', '+356', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(134, 'Marruecos', '+212', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(135, 'Mauricio', '+230', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(136, 'Mauritania', '+222', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(137, 'México', '+52', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(138, 'Mónaco', '+377', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(139, 'Mongolia', '+976', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(140, 'Montenegro', '+382', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(141, 'Moravia', '+420', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(142, 'Mozambique', '+258', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(143, 'Namibia', '+264', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(144, 'Nauru', '+674', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(145, 'Nepal', '+977', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(146, 'Nicaragua', '+505', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(147, 'Níger', '+227', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(148, 'Nigeria', '+234', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(149, 'Niue', '+683', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(150, 'Norfolk', '+672', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(151, 'Noruega', '+47', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(152, 'Nueva Caledonia', '+687', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(153, 'Nueva Zelanda', '+64', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(154, 'Omán', '+968', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(155, 'Países Bajos', '+31', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(156, 'Pakistán', '+92', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(157, 'Palau', '+680', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(158, 'Panamá', '+507', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(159, 'Papúa Nueva Guinea', '+675', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(160, 'Paraguay', '+595', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(161, 'Perú', '+51', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(162, 'Polonia', '+48', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(163, 'Portugal', '+351', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(164, 'Puerto Rico', '+1-787', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(165, 'Qatar', '+974', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(166, 'Rumanía', '+40', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(167, 'Rusia', '+7', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(168, 'Rwanda', '+250', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(169, 'San Cristóbal y Nieves', '+1-869', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(170, 'San Marino', '+378', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(171, 'San Pedro y Miquelón', '+508', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(172, 'Santa Helena', '+290', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(173, 'Santa Lucía', '+1-758', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(174, 'Santa Sede', '+379', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(175, 'Senegal', '+221', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(176, 'Serbia', '+381', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(177, 'Seychelles', '+248', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(178, 'Sierra Leona', '+232', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(179, 'Singapur', '+65', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(180, 'Siria', '+963', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(181, 'Somalia', '+252', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(182, 'Sri Lanka', '+94', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(183, 'Sudán', '+249', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(184, 'Suecia', '+46', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(185, 'Suiza', '+41', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(186, 'Surinam', '+597', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(187, 'Svalbard y Jan Mayen', '+47', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(188, 'Tailandia', '+66', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(189, 'Taiwán', '+886', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(190, 'Tanzania', '+255', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(191, 'Timor Oriental', '+670', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(192, 'Togo', '+228', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(193, 'Tokelau', '+690', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(194, 'Tonga', '+676', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(195, 'Trinidad y Tobago', '+1-868', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(196, 'Túnez', '+216', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(197, 'Turkmenistán', '+993', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(198, 'Turquía', '+90', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(199, 'Tuvalu', '+688', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(200, 'Ucrania', '+380', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(201, 'Uganda', '+256', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(202, 'Uruguay', '+598', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(203, 'Uzbekistán', '+998', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(204, 'Vanuatu', '+678', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(205, 'Venezuela', '+58', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(206, 'Vietnam', '+84', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(207, 'Yemen', '+967', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(208, 'Zambia', '+260', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(209, 'Zimbabue', '+263', '2024-09-21 03:54:03', '2024-09-21 03:54:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'ver usuarios', 'web', NULL, '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(2, 'indice usuarios', 'web', NULL, '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(3, 'actualizar usuario', 'web', NULL, '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(4, 'crear usuario', 'web', NULL, '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(5, 'borrar usuario', 'web', NULL, '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(6, 'ver roles', 'web', NULL, '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(7, 'indice roles', 'web', NULL, '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(8, 'actualizar rol', 'web', NULL, '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(9, 'crear rol', 'web', NULL, '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(10, 'eliminar rol', 'web', NULL, '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(11, 'agregar permisos al rol', 'web', NULL, '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(12, 'ver permisos', 'web', NULL, '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(13, 'indice permisos', 'web', NULL, '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(14, 'actualizar permiso', 'web', NULL, '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(15, 'crear permiso', 'web', NULL, '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(16, 'borrar permiso', 'web', NULL, '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(17, 'ver boton personas', 'web', NULL, '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(18, 'ver boton roles y permisos', 'web', NULL, '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(19, 'ver boton de invitado', 'web', NULL, '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(20, 'ver boton de agremiado', 'web', NULL, '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(21, 'ver boton mantenimientos', 'web', NULL, '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(22, 'ver boton notificaciones', 'web', NULL, '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(23, 'indice contenido inicio', 'web', NULL, '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(24, 'actualizar contenido inicio', 'web', NULL, '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(25, 'crear contenido inicio', 'web', NULL, '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(26, 'borrar contenido inicio', 'web', NULL, '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(27, 'indice preguntas de seguridad', 'web', NULL, '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(28, 'actualizar preguntas de seguridad', 'web', NULL, '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(29, 'crear preguntas de seguridad', 'web', NULL, '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(30, 'borrar preguntas de seguridad', 'web', NULL, '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(31, 'ver opciones de recuperacion contaseña', 'web', NULL, '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(32, 'ver preguntas de seguridad', 'web', NULL, '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(33, 'ver perfil', 'web', NULL, '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(34, 'actualizar perfil', 'web', NULL, '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(35, 'cambiar contraseña', 'web', NULL, '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(36, 'ver paises', 'web', NULL, '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(37, 'indice paises', 'web', NULL, '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(38, 'actualizar pais', 'web', NULL, '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(39, 'crear pais', 'web', NULL, '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(40, 'borrar pais', 'web', NULL, '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(41, 'indice idiomas', 'web', NULL, '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(42, 'actualizar idioma', 'web', NULL, '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(43, 'crear idioma', 'web', NULL, '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(44, 'borrar idioma', 'web', NULL, '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(45, 'indice contenido dasboard', 'web', NULL, '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(46, 'actualizar contenido dasboard', 'web', NULL, '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(47, 'crear contenido dasboard', 'web', NULL, '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(48, 'borrar contenido dasboard', 'web', NULL, '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(49, 'ver cursos', 'web', NULL, '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(50, 'indice cursos', 'web', NULL, '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(51, 'actualizar cursos', 'web', NULL, '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(52, 'crear cursos', 'web', 'El permiso “crear cursos” permite a un usuario acceder a la interfaz de creación de cursos, definir detalles como nombre y descripción, agregar contenido educativo, configurar la estructura del curso.', '2024-09-21 03:54:03', '2024-09-26 04:09:49'),
(53, 'borrar cursos', 'web', NULL, '2024-09-21 03:54:03', '2024-09-30 21:10:10'),
(54, 'indice categorias', 'web', NULL, '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(55, 'actualizar categorias', 'web', NULL, '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(56, 'crear categorias', 'web', NULL, '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(57, 'borrar categorias', 'web', NULL, '2024-09-21 03:54:03', '2024-09-21 03:54:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', 'web', 'El rol Administrador en la plataforma del Colegio Hondureño de Profesionales Universitarios en Contaduría Pública (COHPUCP), tiene el acceso completo a todas las funciones y datos del sistema. Los administradores pueden gestionar usuarios, configurar el sitio y realizar cualquier acción necesaria para mantener optimizada la plataforma.', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(2, 'Invitado', 'web', 'El rol Invitado en la plataforma del Colegio Hondureño de Profesionales Universitarios en Contaduría Pública (COHPUCP), generalmente tienen el nivel de acceso más básico y limitado. Los invitados suelen tener acceso solo a funciones y contenido públicos del sitio.', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(3, 'Agremiado', 'web', 'El rol Agremiado en la plataforma del Colegio Hondureño de Profesionales Universitarios en Contaduría Pública (COHPUCP), tiene acceso privilegiado a recursos educativos, documentos profesionales y herramientas especializadas. Los miembros pueden realizar gestiones, participar en eventos, actualizar su perfil profesional, entre otras.', '2024-09-21 03:54:03', '2024-09-21 03:54:03');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(57, 1),
(33, 2),
(34, 2),
(35, 2),
(33, 3),
(34, 3),
(35, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `security_questions`
--

DROP TABLE IF EXISTS `security_questions`;
CREATE TABLE IF NOT EXISTS `security_questions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `question` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `security_questions`
--

INSERT INTO `security_questions` (`id`, `question`, `created_at`, `updated_at`) VALUES
(1, '¿Cuál es tu deporte favorito?', '2024-09-26 02:27:04', '2024-09-26 02:27:04'),
(2, '¿Cuál es el nombre de tu primer mascota?', '2024-09-26 02:27:38', '2024-09-26 02:27:38'),
(3, '¿Cuál es tu comida favorita?', '2024-09-26 02:27:43', '2024-09-26 02:27:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sexos`
--

DROP TABLE IF EXISTS `sexos`;
CREATE TABLE IF NOT EXISTS `sexos` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sexos_nombre_unique` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sexos`
--

INSERT INTO `sexos` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Masculino', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(2, 'Femenino', '2024-09-21 03:54:03', '2024-09-21 03:54:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes_vacantes`
--

DROP TABLE IF EXISTS `solicitudes_vacantes`;
CREATE TABLE IF NOT EXISTS `solicitudes_vacantes` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `nombre_empresa` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre_vacante` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `responsabilidades` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `requisitos` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `experiencia` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tiempo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ubicacion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `correo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `celular` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `enlace` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` enum('pendiente','aprobado','rechazado') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pendiente',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `solicitudes_vacantes_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `solicitudes_vacantes`
--

INSERT INTO `solicitudes_vacantes` (`id`, `user_id`, `nombre_empresa`, `nombre_vacante`, `descripcion`, `responsabilidades`, `requisitos`, `experiencia`, `tiempo`, `ubicacion`, `correo`, `telefono`, `celular`, `enlace`, `estado`, `created_at`, `updated_at`) VALUES
(11, 1, 'Universidad Metropolitana de Honduras', 'Profesor de informática', 'Desarrollar una página web profesional y funcional para el Colegio Hondureño de Profesionales Universitarios en Contaduría Pública (COHPUCP). Esta plataforma estará diseñada para ofrecer una experiencia de navegación amigable e intuitiva, optimizando la accesibilidad y presentando de manera efectiva los servicios para afiliados y usuarios.', '➣ Se permite a los usuarios ingresar sus datos personales y profesionales necesarios para la inscripción.\r\n➣ Los usuarios deben subir imágenes y archivos PDF que son vitales para la aprobación de la solicitud.\r\n➣ Se implementaron controles para asegurar que toda la información proporcionada sea correcta y completa antes de enviar la solicitud.', '➣ Se diseñó una interfaz intuitiva para facilitar el ingreso de datos y la carga de documentos.\r\n➣ Se permite el ingreso de datos relevantes sobre la empresa que desea inscribirse.\r\n➣ Los usuarios ingresan datos de los socios de la empresa, asegurando una visión completa de la entidad.\r\n➣ Similar al submódulo de agremiados, se requiere la subida de imágenes y archivos PDF esenciales para la evaluación de la solicitud.', '➣ Experiencia de 2 años', 'Medio tiempo', 'Colonia Miraflores, frente a Banco Atlántida. Tegucigalpa M.D.C.', 'johan_godinez@yahoo.com', '2231-1076', '9965-0211', 'https://infopvirtual.com/curso/ms-excel-avanzado/', 'aprobado', '2024-09-25 03:11:00', '2024-09-25 21:56:47'),
(12, 1, 'Carnicería El Puerco', 'Carnicero', 'Buscamos un Carnicero experimentado para unirse a nuestro equipo. El candidato ideal tendrá un fuerte conocimiento de los diferentes tipos de carne y cortes, y será capaz de trabajar de forma independiente y como parte de un equipo.', '➢ Producción de diferentes tipos de cortes de carnes (res, cerdo, aves y mariscos) de acuerdo con las indicaciones dadas (empacado, rebanado, asistido, molido y sierra).\r\n➢ Mantener el rendimiento establecido en el deshuese de la res y cerdo.\r\n➢ Mantener los niveles de inventario del producto terminado disponible a la venta.', '➢ Experiencia previa como carnicero.\r\n➢ Conocimiento de los diferentes tipos de carne y cortes.\r\n➢ Conocimiento en utilización de Sierra.\r\n➢ Excelentes habilidades en destace de res y cerdo.\r\n➢ Capacidad para trabajar de forma independiente y como parte de un equipo.', 'Experiencia de 1 año mínimo', 'Tiempo completo', 'Colonia La Providencia, El progreso, Yoro, Honduras.', 'johan_godinez@yahoo.com', '2456-7890', '3354-6698', 'https://infopvirtual.com/curso/ms-excel-avanzado/', 'aprobado', '2024-09-25 03:50:53', '2024-09-26 23:16:14'),
(13, 1, 'Reasa', 'Auxiliar de Bodega', 'Este especialista es responsable de mantener la bodega en orden, garantizar que los productos estén almacenados correctamente y colaborar con el flujo del inventario dentro de la bodega.', 'Responsable de Organizar y garantizar que los productos estén almacenados correctamente.', '➣ Servicio al cliente y afines.\r\n➣ Disponibilidad para viajar\r\n➣ Licencia vehicular vigente\r\n➣ Experiencia en manejo de vehículo mecánico', '➣ Experiencia de  2 años\r\n➣ Experiencia en carga, descarga y traslado de producto', 'Medio tiempo', 'Residencial Loma Linda, San Pedro Sula, Cortes.', 'johan_godinez@yahoo.com', '2211-7545', '3122-1289', 'https://www.ugntype=SearFxv', 'aprobado', '2024-09-25 04:23:47', '2024-09-26 23:19:32'),
(14, 1, 'Industria de alimentos S. DE R.L.', 'Mesero/a', 'Los Meseros preparan las mesas en un restaurante antes de que lleguen los clientes, toman pedidos, sirven la comida y la bebida, y limpian las mesas. También preparan la factura de la comida y realizan el cobro.', '➣ Recibir a los clientes y guiarlos a sus mesas.\r\n➣ Presentar el menú y ofrecer recomendaciones.\r\n➣ Tomar órdenes de alimentos y bebidas con precisión.\r\n➣ Servir los platos y bebidas de manera eficiente.', '➣ Diploma de escuela secundaria/GED requerido.\r\n➣ Debe ser capaz de trabajar de pie todo el día.\r\n➣ Se requieren fuertes habilidades de servicio al cliente.\r\n➣ Debe tener letra legible.', 'Experiencia de 2 años', 'Tiempo completo', 'Vega alta, avenida Los Próceres. La Ceiba, Honduras.', 'johan_godinez@yahoo.com', '6648-2485', '3325-9947', 'https://edutin.com/curso-de-java', 'aprobado', '2024-09-25 04:31:54', '2024-09-25 04:38:03'),
(15, 1, 'Motomundo', 'Vendedor Jr.', 'Generar posicionamiento de los productos en cada una de las sucursales de la zona, verificar los inventarios y la rotación, brindar pequeñas charlas al personal de las tiendas de Motomundo.', '➣ Manejo de Inventario e Indicadores de ventas', '➣ Educación mínima: Educación Básica Secundaria\r\n➣ Altamente orientado a indicadores de venta\r\n➣ Facilidad para trabajar en equipo\r\n➣ Proactivo, excelente comunicación\r\n➣ Habilidades de negociación.', '➣ 1 año de experiencia\r\n➣ Experiencia mínima de un año en ventas de piso en tiendas', 'Tiempo completo', 'Motomundo los Próceres, 1ra. Calle, 19 Avenida, 21102 San Pedro Sula, Cortés', 'motomundohonduras@hn.com', '5521-9987', '3358-9974', 'https://support.microsoft.com/es-es/topic/conceptos-b%C3%A1sicos-sobre-bases-de-datos-a849ac16-07c7-4a31-9948-3c8c94a7c204', 'aprobado', '2024-09-25 20:48:19', '2024-09-25 20:48:52'),
(16, 1, 'Agroindustrias del Corral', 'Médico de Planta', 'El Médico de Planta es responsable de brindar atención médica integral a los pacientes en un entorno hospitalario.', 'Encargado del resguardo, promoción de la salud y prevención de enfermedades de los colaboradores de Agroindustrias del Corral', '-Doctor en Medicina y Cirugía\r\n-Certificación del Sistema Médico Empresa (Indispensable)\r\n-Diplomado en Salud y Seguridad en el Trabajo\r\n-Diplomado en Ergonomía\r\n-Disponibilidad para residir en Siguatepeque\r\n-Maestría en Salud y Seguridad Industrial (Deseable)', '-Experiencia mínima de 2 años', 'Medio tiempo', 'Km. 121 CA-5, 12111 Siguatepeque, Comayagua', 'johan_godinez@yahoo.com', '5523-9878', '9952-3398', 'https://edutin.com/curso-de-java', 'aprobado', '2024-09-30 22:16:16', '2024-09-30 22:57:00'),
(17, 1, 'JC', 'Ingeniero en Sistemas', 'Buscamos un analista de Datos en el cual será el responsable de analizar grandes conjuntos de datos para identificar tendencias y patrones.', '⤿ Recopilar y limpiar grandes conjuntos de datos para garantizar su exactitud y análisis. \r\n⤿ Utilizar herramientas y técnicas estadísticas para identificar patrones y tendencias entre los datos. \r\n⤿ Presentar los resultados del análisis de manera clara y concisa a la empresa para que puedan tomar mejores decisiones con relación al negocio. \r\n⤿ Crear gráficos de datos atractivos y comprensibles para presentar los resultados del análisis.', '⤿ Amplio conocimiento de bases de datos.\r\n⤿ Extracción de datos\r\n⤿ elaboración de modelos predictivos y programación en Python o R', '⤿ Experiencia de 2 años', 'Tiempo completo', 'Colonia Villa Florencia, San Pedro Sula, Honduras.', 'johan_godinez@yahoo.com', '2255-1123', '9687-4154', 'https://infopvirtual.com/curso/ms-excel-avanzado/', 'pendiente', '2024-09-30 23:13:16', '2024-09-30 23:20:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `universidades`
--

DROP TABLE IF EXISTS `universidades`;
CREATE TABLE IF NOT EXISTS `universidades` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre_universidad` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `universidades_nombre_universidad_unique` (`nombre_universidad`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `universidades`
--

INSERT INTO `universidades` (`id`, `nombre_universidad`, `created_at`, `updated_at`) VALUES
(1, 'Universidad Nacional Autónoma de Honduras (UNAH)', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(2, 'Universidad Tecnológica de Honduras (UTH)', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(3, 'Centro Universitario Tecnológico (CEUTEC)', '2024-09-21 03:54:03', '2024-09-21 03:54:03'),
(4, 'Universidad Tecnológica Centroamericana (UNITEC)', '2024-09-21 03:54:03', '2024-09-21 03:54:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apellido` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero_identidad` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero_colegiacion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rtn` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sexo_id` bigint UNSIGNED DEFAULT NULL,
  `fecha_nacimiento` date NOT NULL,
  `pais_id` bigint UNSIGNED DEFAULT NULL,
  `universidad_id` bigint UNSIGNED DEFAULT NULL,
  `telefono` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono_celular` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` enum('activo','inactivo') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'activo',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_numero_identidad_unique` (`numero_identidad`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_numero_colegiacion_unique` (`numero_colegiacion`),
  UNIQUE KEY `users_rtn_unique` (`rtn`),
  KEY `users_sexo_id_foreign` (`sexo_id`),
  KEY `users_pais_id_foreign` (`pais_id`),
  KEY `users_universidad_id_foreign` (`universidad_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `name2`, `apellido`, `apellido2`, `numero_identidad`, `numero_colegiacion`, `rtn`, `sexo_id`, `fecha_nacimiento`, `pais_id`, `universidad_id`, `telefono`, `telefono_celular`, `email`, `estado`, `email_verified_at`, `password`, `profile_image`, `facebook_link`, `instagram_link`, `linkedin_link`, `twitter_link`, `bio`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Anibal', 'Johan', 'Godinez', 'Cortez', '0801-1984-15578', '2010-01-2220', '0801-1984-155781', 1, '1984-06-25', 89, NULL, '2255-1123', '3356-0773', 'anibalgodinez64@gmail.com', 'activo', '2024-09-21 03:55:12', '$2y$10$qHEQDQggZH9w5N0mmryK2OZ6DwEgHRF1sypMYimQKkHNcQTxYXmH6', 'profile_images/uazqQ1ZxoSrXoJ8PMbTYop1RgaNjqAmy4Omfgxz7.png', NULL, NULL, NULL, NULL, NULL, NULL, '2024-09-21 03:54:03', '2024-10-01 02:29:13'),
(2, 'Johan', 'Anibal', 'Cortez', 'Godinez', '0901-1985-12345', '2015-11-0546', '0901-1985-123451', 1, '1985-07-10', 89, NULL, '2456-7890', '3456-7890', 'johan_godinez@yahoo.com', 'inactivo', '2024-09-25 00:24:26', '$2y$10$QdWqRqK0jTSAkZm06Honzuq4rIQtUivj0AcAouJoBEWCKKjJwFuFG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-09-21 03:54:03', '2024-10-01 04:29:17'),
(3, 'Marisa', 'Elizabeth', 'Pineda', 'Pavón', '0801-1998-55148', NULL, '0801-1998-551489', 2, '1998-04-02', 89, NULL, '2277-7840', '9931-7530', 'ligasuperchampions@gmail.com', 'activo', NULL, '$2y$10$OjiG3/nGVU5Op6FXFMiLPuJisCLZrsRtGxOOl47rOAWk/qqchM/zK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-09-21 03:54:03', '2024-09-21 03:54:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_security_questions`
--

DROP TABLE IF EXISTS `user_security_questions`;
CREATE TABLE IF NOT EXISTS `user_security_questions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `security_question_id` bigint UNSIGNED NOT NULL,
  `answer` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_security_questions_user_id_foreign` (`user_id`),
  KEY `user_security_questions_security_question_id_foreign` (`security_question_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `welcome_contents`
--

DROP TABLE IF EXISTS `welcome_contents`;
CREATE TABLE IF NOT EXISTS `welcome_contents` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `layout` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image_path` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `welcome_contents_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `welcome_contents`
--

INSERT INTO `welcome_contents` (`id`, `layout`, `title`, `description`, `image_path`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 'Imagen', NULL, NULL, 'welcome_images/h6dQ2elNYig5WyHkhGdeIoZ3qt6JkYYEyKKNliyR.png', 1, '2024-09-28 03:45:09', '2024-09-28 03:45:09'),
(3, 'Imagen a la derecha', 'Misión', 'Impulsar y promover la superación de nuestros agremiados; velando por la protección de los derechos inherentes como profesionales de la Contaduría Pública; así como, garantizar que el ejercicio de la profesión se desarrolle de acuerdo a los estándares éticos reconocidos a nivel mundial.', 'welcome_images/rmOM10ObxRKtNQJ8ZycJk5xkuWx6NVRbkYZ4R2DE.png', 1, '2024-09-28 03:48:03', '2024-09-28 03:48:03'),
(4, 'Imagen a la izquierda', 'Visión', 'Ser un colegio de alto nivel, que de manera permanente busque enaltecer, fortalecer y proteger el ejercicio de la profesión contable en Honduras.', 'welcome_images/B9wjRQmW1a2geE0IbZKo3SERUlNZeBxjTgW3C8JX.png', 1, '2024-09-28 03:49:27', '2024-09-28 03:49:27');

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
  ADD CONSTRAINT `inscripciones_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `inscripcion_firmas`
--
ALTER TABLE `inscripcion_firmas`
  ADD CONSTRAINT `inscripcion_firmas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Filtros para la tabla `numero_colegiacion`
--
ALTER TABLE `numero_colegiacion`
  ADD CONSTRAINT `numero_colegiacion_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `solicitudes_vacantes`
--
ALTER TABLE `solicitudes_vacantes`
  ADD CONSTRAINT `solicitudes_vacantes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_pais_id_foreign` FOREIGN KEY (`pais_id`) REFERENCES `pais` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_sexo_id_foreign` FOREIGN KEY (`sexo_id`) REFERENCES `sexos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_universidad_id_foreign` FOREIGN KEY (`universidad_id`) REFERENCES `universidades` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
