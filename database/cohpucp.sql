-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 28-08-2024 a las 21:09:35
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
(1, 'Contabilidad Finaciera', '2024-08-29 02:26:23', '2024-08-29 02:26:23'),
(2, 'Contabilidad de Costos', '2024-08-29 02:26:23', '2024-08-29 02:26:23'),
(3, 'Contabilidad Gerencial', '2024-08-29 02:26:23', '2024-08-29 02:26:23'),
(4, 'Contabilidad Tributaria', '2024-08-29 02:26:23', '2024-08-29 02:26:23'),
(5, 'Contabilidad Gubernamental', '2024-08-29 02:26:23', '2024-08-29 02:26:23'),
(6, 'Normas Internacionales de Información Financiera (NIIF)', '2024-08-29 02:26:23', '2024-08-29 02:26:23'),
(7, 'Contabilidad Forense', '2024-08-29 02:26:23', '2024-08-29 02:26:23'),
(8, 'Auditoría', '2024-08-29 02:26:23', '2024-08-29 02:26:23'),
(9, 'Sistemas Contables', '2024-08-29 02:26:23', '2024-08-29 02:26:23'),
(10, 'Ética y Responsabilidad Social', '2024-08-29 02:26:23', '2024-08-29 02:26:23');

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
(1, 'Español', '2024-08-29 02:26:23', '2024-08-29 02:26:23'),
(2, 'Inglés', '2024-08-29 02:26:23', '2024-08-29 02:26:23'),
(3, 'Fránces', '2024-08-29 02:26:23', '2024-08-29 02:26:23'),
(4, 'Alemán', '2024-08-29 02:26:23', '2024-08-29 02:26:23'),
(5, 'Italiano', '2024-08-29 02:26:23', '2024-08-29 02:26:23'),
(6, 'Portugués', '2024-08-29 02:26:23', '2024-08-29 02:26:23'),
(7, 'Árabe', '2024-08-29 02:26:23', '2024-08-29 02:26:23'),
(8, 'Ruso', '2024-08-29 02:26:23', '2024-08-29 02:26:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripciones`
--

DROP TABLE IF EXISTS `inscripciones`;
CREATE TABLE IF NOT EXISTS `inscripciones` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `fecha_inscripcion` date NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `name2` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `apellido` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `apellido2` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `numero_identidad` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `lugar_nacimiento` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `direccion_residencia` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `telefono` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `telefono_celular` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `fecha_graduacion` date NOT NULL,
  `universidad` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `nombre_empresa_trabajo_actual` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `cargo` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `direccion_empresa` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `correo_empresa` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `telefono_empresa` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `extension_telefono_empresa` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `especialidad_1` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `lugar_especialidad_1` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `fecha_especialidad_1` date DEFAULT NULL,
  `especialidad_2` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `lugar_especialidad_2` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `fecha_especialidad_2` date DEFAULT NULL,
  `nombre_curso_especializacion` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `lugar_curso` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `fecha_curso` date DEFAULT NULL,
  `nombre_empresa1` text COLLATE utf8mb3_unicode_ci,
  `cargo_empresa1` text COLLATE utf8mb3_unicode_ci,
  `duración_empresa1` text COLLATE utf8mb3_unicode_ci,
  `nombre_empresa2` text COLLATE utf8mb3_unicode_ci,
  `cargo_empresa2` text COLLATE utf8mb3_unicode_ci,
  `duración_empresa2` text COLLATE utf8mb3_unicode_ci,
  `comisiones` text COLLATE utf8mb3_unicode_ci,
  `representaciones` text COLLATE utf8mb3_unicode_ci,
  `delegaciones` text COLLATE utf8mb3_unicode_ci,
  `publicacion_documentos` text COLLATE utf8mb3_unicode_ci,
  `publicaciones` text COLLATE utf8mb3_unicode_ci,
  `publicacion_libro` text COLLATE utf8mb3_unicode_ci,
  `imagen_titulo` json NOT NULL,
  `imagen_dni` json NOT NULL,
  `imagen_tamano_carnet` json NOT NULL,
  `cv` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `imagen_dni_beneficiario1` json NOT NULL,
  `imagen_dni_beneficiario2` json DEFAULT NULL,
  `imagen_dni_beneficiario3` json DEFAULT NULL,
  `imagen_rtn` json NOT NULL,
  `estado` enum('pendiente','aprobado','rechazado') COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT 'pendiente',
  `descripcion_estado_solicitud` text COLLATE utf8mb3_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `inscripciones_numero_identidad_unique` (`numero_identidad`),
  UNIQUE KEY `inscripciones_email_unique` (`email`),
  KEY `inscripciones_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Volcado de datos para la tabla `inscripciones`
--

INSERT INTO `inscripciones` (`id`, `fecha_inscripcion`, `user_id`, `name`, `name2`, `apellido`, `apellido2`, `numero_identidad`, `fecha_nacimiento`, `lugar_nacimiento`, `direccion_residencia`, `telefono`, `telefono_celular`, `email`, `fecha_graduacion`, `universidad`, `nombre_empresa_trabajo_actual`, `cargo`, `direccion_empresa`, `correo_empresa`, `telefono_empresa`, `extension_telefono_empresa`, `especialidad_1`, `lugar_especialidad_1`, `fecha_especialidad_1`, `especialidad_2`, `lugar_especialidad_2`, `fecha_especialidad_2`, `nombre_curso_especializacion`, `lugar_curso`, `fecha_curso`, `nombre_empresa1`, `cargo_empresa1`, `duración_empresa1`, `nombre_empresa2`, `cargo_empresa2`, `duración_empresa2`, `comisiones`, `representaciones`, `delegaciones`, `publicacion_documentos`, `publicaciones`, `publicacion_libro`, `imagen_titulo`, `imagen_dni`, `imagen_tamano_carnet`, `cv`, `imagen_dni_beneficiario1`, `imagen_dni_beneficiario2`, `imagen_dni_beneficiario3`, `imagen_rtn`, `estado`, `descripcion_estado_solicitud`, `created_at`, `updated_at`) VALUES
(1, '2024-08-28', 4, 'Marisa', 'Elizabeth', 'Pineda', 'Pavón', '0801-1998-55148', '1998-04-02', 'Tegucigalpa, M.D.C.', 'Colonia La Victoria, sector #7', '2277-7840', '9931-7530', 'marisapineda@gmail.com', '2023-05-01', 'Universidad Nacional Autónoma de Honduras (UNAH)', 'Tigo', 'Ciberseguridad', 'Colonia Miraflores, edificio corporativo', 'tigohonduras@gmail.com', '5597-3365', '212', 'Maestría en Finanzas', 'CEUTEC', '2015-08-28', 'Doctorado en Auditoría', 'UNAM', '2017-01-05', 'Inglés', 'UDEMY', '2021-01-02', 'Claro Honduras', 'Técnico en Redes', '1 año', 'Ficohsa', 'Analista de Datos', '2 años', 'ds.xlkszjgfl-ds eds.,jgflkgjfdslkgfds', 'gdsgglkdslkgf gdskghdlksgjldsk.jgfdsg', 'dsgvds vdscgoihds dskjghdskujhgfakjds', 'dfsglkdasgalkds dslkgfjdslkgjoidslg', 'fdgds ghkjdshgfdsk dskghdskujhgflkjdsg', 'fdsgkdsmhykjgfdshgfakds dslkgfjdslkf', '\"[\\\"imgs_titulo_inscripcion\\\\/1724877628_T\\\\u00edtulo 1.jpg\\\",\\\"imgs_titulo_inscripcion\\\\/1724877628_T\\\\u00edtulo 2.jpg\\\"]\"', '\"[\\\"imgs_dni_inscripcion\\\\/1724877628_DNI Propio.png\\\",\\\"imgs_dni_inscripcion\\\\/1724877628_DNI rev\\\\u00e9s Propio.jpg\\\"]\"', '\"[\\\"imgs_tamano_carnet_inscripcion\\\\/1724877628_foto-carnet-34166-2.jpg\\\"]\"', 'cvs_inscripcion/1724877628_Curriculum Vitae - Beige MUJER.pdf', '\"[\\\"imgs_dni_beneficiario1_inscripcion\\\\/1724877628_DNI-1.png\\\",\\\"imgs_dni_beneficiario1_inscripcion\\\\/1724877628_DNI-1-.jpg\\\"]\"', '\"[\\\"imgs_dni_beneficiario2_inscripcion\\\\/1724877628_DNI-2.jpg\\\",\\\"imgs_dni_beneficiario2_inscripcion\\\\/1724877628_DNI2-.jpg\\\"]\"', '\"[\\\"imgs_dni_beneficiario3_inscripcion\\\\/1724877628_DNI 3.png\\\",\\\"imgs_dni_beneficiario3_inscripcion\\\\/1724877628_DNI 3 Reves.png\\\"]\"', '\"[\\\"imgs_rtn_inscripcion\\\\/1724877628_RTN-PERSONAL_1.jpg\\\"]\"', 'pendiente', NULL, '2024-08-29 02:40:28', '2024-08-29 02:40:28'),
(2, '2024-08-28', 3, 'Carlos', 'Alberto', 'Pavón', 'Plummer', '0901-1978-32114', '1978-02-07', 'San Pedro Sula, Honduras.', 'Isla Santa Elena, bloque #45', '2456-1122', '9955-7890', 'carlospavon@gmail.com', '2021-05-01', 'Universidad Tecnológica Centroamericana (UNITEC)', 'Home Depot', 'Asistente de ventas', 'Boulevard Morazán, 3 cuadras antes del Estadio Morazán', 'homedepot@yahoo.com', '5597-3365', '52', 'Maestría en Marketing Digital', 'KEISER UNIVERSITY', '2011-05-06', 'Doctorado en Reconstrucción facial', 'UNAH', '2013-02-05', 'Phyton avanzado', 'UDEMY', '2017-02-01', 'Google', 'Director de Operaciones', '1 año', 'Microsoft', 'Analista de Datos', '2 años', 'zxaszlidfhcadslk edskfcalkdsfoiewcs', 'dsfdsjkflkadsf elkdsflkjdsfds', 'sdfhadsolkfhads fdskh oidsufoaidsuf', 'dsflkdsjfoiadwshf dsfhakjdslhfalidshfds', 'dskjfhdsliuafyadsif iudsyfhalkjds hflkas ihfdsoihasdf', 'dsfkjadshyfikajydsfkjzdsfoidshyfds dsikyfdszkjfadshlk f dsfkhlahfalsd', '\"[\\\"imgs_titulo_inscripcion\\\\/1724877843_Titulo derecho.jpg\\\",\\\"imgs_titulo_inscripcion\\\\/1724877843_Titulo reves.jpg\\\"]\"', '\"[\\\"imgs_dni_inscripcion\\\\/1724877843_DNI.jpg\\\",\\\"imgs_dni_inscripcion\\\\/1724877843_DNI-Reves.png\\\"]\"', '\"[\\\"imgs_tamano_carnet_inscripcion\\\\/1724877843_Foto 2.jpg\\\"]\"', 'cvs_inscripcion/1724877843_Currículum Vitae - Moderno.pdf', '\"[\\\"imgs_dni_beneficiario1_inscripcion\\\\/1724877843_Beneficiario 1.jpg\\\",\\\"imgs_dni_beneficiario1_inscripcion\\\\/1724877843_Beneficiario 1 - reves.jpg\\\"]\"', '\"[\\\"imgs_dni_beneficiario2_inscripcion\\\\/1724877843_Beneficiario 2.jpg\\\",\\\"imgs_dni_beneficiario2_inscripcion\\\\/1724877843_Beneficiario 2 - reves.png\\\"]\"', '\"[\\\"imgs_dni_beneficiario3_inscripcion\\\\/1724877843_Beneficiario 3.jpg\\\",\\\"imgs_dni_beneficiario3_inscripcion\\\\/1724877843_Beneficiario 3 - reves.jpg\\\"]\"', '\"[\\\"imgs_rtn_inscripcion\\\\/1724877843_RTN-696x522.jpg\\\"]\"', 'pendiente', NULL, '2024-08-29 02:44:03', '2024-08-29 02:44:03'),
(3, '2024-08-28', 2, 'Johan', 'Anibal', 'Cortez', 'Godinez', '0901-1985-12345', '1985-07-10', 'Nacaome, Valle', 'Colonia miramontes, bloque #253', '2456-7890', '3456-7890', 'johan_godinez@yahoo.com', '2022-04-02', 'Centro Universitario Tecnológico (CEUTEC)', 'Tesla Corporations inc', 'Ingeniero de Integración Electrónica', 'Área industrial Este de Fremont, California, entre las autovías interestatales Interstate 880 y la California 680.', 'teslacorporation@org.com', '+1 2255-6598', '1254', 'Maestría en Administración', 'KEISER UNIVERSITY', '2016-01-20', 'Doctorado en Dirección Empresarial', 'UNAM', '2018-04-02', 'Inglés avanzado', 'UDEMY', '2019-05-01', 'Google', 'Director de Operaciones', '1 año', 'Microsoft', 'Ingeniero de Sotfware', '2 años', 'Realizó comisiones para una empresa, gestionando la auditoría de sus estados financieros y asesorando en la optimización fiscal, asegurando el cumplimiento normativo y mejorando la rentabilidad.', 'Llevó a cabo representaciones para clientes, actuando en su nombre ante autoridades fiscales y regulatorias. Defendió sus intereses en auditorías y litigios.', 'Asumo delegaciones en una empresa, encargándome de la supervisión de equipos contables y delegando tareas clave como la elaboración de reportes financieros y la reconciliación de cuentas.', 'Me encargo de la publicación de documentos financieros para una empresa, preparando y divulgando informes como estados financieros anuales y declaraciones fiscales.', 'Realizo publicaciones especializadas, compartiendo mis conocimiento a través de artículos en revistas contables y financieras. Estos textos abordaron temas como nuevas normativas fiscales y mejores práctica', 'Publiqué un libro en el que se recopiló su amplia experiencia en gestión financiera y auditoría. La obra está dirigida a contadores y empresarios.', '\"[\\\"imgs_titulo_inscripcion\\\\/1724878129_T\\\\u00edtulo reves.png\\\",\\\"imgs_titulo_inscripcion\\\\/1724878129_T\\\\u00edtulo.jpg\\\"]\"', '\"[\\\"imgs_dni_inscripcion\\\\/1724878129_Beneficiario 1.jpg\\\",\\\"imgs_dni_inscripcion\\\\/1724878129_Beneficiario 2 reves.jpg\\\"]\"', '\"[\\\"imgs_tamano_carnet_inscripcion\\\\/1724878129_Captura de pantalla (33).png\\\"]\"', 'cvs_inscripcion/1724878129_Currículum.pdf', '\"[\\\"imgs_dni_beneficiario1_inscripcion\\\\/1724878129_DNI Propia a.jpg\\\",\\\"imgs_dni_beneficiario1_inscripcion\\\\/1724878129_Beneficiario 3.jpg\\\"]\"', '\"[\\\"imgs_dni_beneficiario2_inscripcion\\\\/1724878129_Beneficiario 2.jpg\\\",\\\"imgs_dni_beneficiario2_inscripcion\\\\/1724878129_Beneficiario 1 reves.jpg\\\"]\"', '\"[\\\"imgs_dni_beneficiario3_inscripcion\\\\/1724878129_Beneficiario 2 reves.jpg\\\",\\\"imgs_dni_beneficiario3_inscripcion\\\\/1724878129_DNI Propia.jpg\\\"]\"', '\"[\\\"imgs_rtn_inscripcion\\\\/1724878129_RTN.jpg\\\"]\"', 'pendiente', NULL, '2024-08-29 02:48:49', '2024-08-29 02:48:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcion_firmas`
--

DROP TABLE IF EXISTS `inscripcion_firmas`;
CREATE TABLE IF NOT EXISTS `inscripcion_firmas` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `num_membresia` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `nombre_sociedad` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `num_inscripcion_registro_publico_comercio` text COLLATE utf8mb3_unicode_ci,
  `fecha_constitucion` date NOT NULL,
  `registro_tributario_nacional` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `num_inscripcion_camara_comercio` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `direccion` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `celular` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `primer_nombre_socio1` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `segundo_nombre_socio1` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `primer_apellido_socio1` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `segundo_apellido_socio1` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `num_colegiacion_socio1` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `imagen_firma_socio1` json DEFAULT NULL,
  `primer_nombre_socio2` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `segundo_nombre_socio2` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `primer_apellido_socio2` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `segundo_apellido_socio2` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `num_colegiacion_socio2` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `imagen_firma_socio2` json DEFAULT NULL,
  `primer_nombre_socio3` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `segundo_nombre_socio3` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `primer_apellido_socio3` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `segundo_apellido_socio3` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `num_colegiacion_socio3` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `imagen_firma_socio3` json DEFAULT NULL,
  `imagen_firma_social` json DEFAULT NULL,
  `imagen_firma_representante_legal` json DEFAULT NULL,
  `lugar_inscripcion` date NOT NULL,
  `fecha_inscripcion` date NOT NULL,
  `estado` enum('pendiente','aprobado','rechazado') COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT 'pendiente',
  `descripcion_estado_solicitud` text COLLATE utf8mb3_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `inscripcion_firmas_email_unique` (`email`),
  KEY `inscripcion_firmas_user_id_foreign` (`user_id`)
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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2024_05_27_020000_create_pais_table', 1),
(5, '2024_05_28_0212547_create_sexos_table', 1),
(6, '2024_05_29_030000_create_users_table', 1),
(7, '2024_06_03_143665_create_idiomas_table', 1),
(8, '2024_06_03_143674_create_categorias_table', 1),
(9, '2024_06_03_143702_create_cursos_table', 1),
(10, '2024_06_04_163925_create_capacitaciones_table', 1),
(11, '2024_06_06_172142_create_permission_tables', 1),
(12, '2024_07_01_152617_create_security_questions_table', 1),
(13, '2024_07_01_152804_create_user_security_questions_table', 1),
(14, '2024_07_22_205244_create_welcome_contents_table', 1),
(15, '2024_07_31_202421_create_dashboard_contents_table', 1),
(16, '2024_08_01_210348_create_footer_contents_table', 1),
(17, '2024_08_12_165432_create_inscripciones_table', 1),
(18, '2024_08_14_151035_create_notifications_table', 1),
(19, '2024_08_15_204642_create_universidades_table', 1),
(20, '2024_08_15_205251_create_universidad_user_table', 1),
(21, '2024_08_23_175732_create_inscripcion_firmas_table', 1),
(22, '2024_08_27_160448_create_numero_colegiacion_table', 1);

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
-- Estructura de tabla para la tabla `numero_colegiacion`
--

DROP TABLE IF EXISTS `numero_colegiacion`;
CREATE TABLE IF NOT EXISTS `numero_colegiacion` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `numero_colegiacion` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `numero_colegiacion_numero_colegiacion_unique` (`numero_colegiacion`),
  KEY `numero_colegiacion_user_id_foreign` (`user_id`)
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
(1, 'Afganistán', '+93', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(2, 'Albania', '+355', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(3, 'Alemania', '+49', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(4, 'Andorra', '+376', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(5, 'Angola', '+244', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(6, 'Anguila', '+1-264', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(7, 'Antártida', '+672', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(8, 'Antigua y Barbuda', '+1-268', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(9, 'Arabia Saudita', '+966', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(10, 'Argelia', '+213', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(11, 'Argentina', '+54', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(12, 'Armenia', '+374', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(13, 'Aruba', '+297', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(14, 'Australia', '+61', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(15, 'Austria', '+43', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(16, 'Azerbaiyán', '+994', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(17, 'Bahamas', '+1-242', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(18, 'Bangladés', '+880', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(19, 'Baréin', '+973', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(20, 'Barbados', '+1-246', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(21, 'Bélgica', '+32', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(22, 'Belice', '+501', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(23, 'Benín', '+229', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(24, 'Bermudas', '+1-441', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(25, 'Bielorrusia', '+375', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(26, 'Birmania', '+95', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(27, 'Bolivia', '+591', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(28, 'Bosnia y Herzegovina', '+387', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(29, 'Bosnia y Herzegovina', '+387', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(30, 'Bosnia y Herzegovina', '+387', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(31, 'Bosnia y Herzegovina', '+387', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(32, 'Bosnia y Herzegovina', '+387', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(33, 'Bosnia y Herzegovina', '+387', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(34, 'Botsuana', '+267', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(35, 'Brasil', '+55', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(36, 'Brunéi', '+673', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(37, 'Bulgaria', '+359', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(38, 'Burkina Faso', '+226', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(39, 'Burundi', '+257', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(40, 'Bután', '+975', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(41, 'Cabo Verde', '+238', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(42, 'Camboya', '+855', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(43, 'Camerún', '+237', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(44, 'Canadá', '+1', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(45, 'Chad', '+235', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(46, 'Chile', '+56', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(47, 'China', '+86', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(48, 'Chipre', '+357', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(49, 'Ciudad del Vaticano', '+379', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(50, 'Colombia', '+57', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(51, 'Comoras', '+269', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(52, 'Congo', '+242', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(53, 'Corea del Norte', '+850', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(54, 'Corea del Sur', '+82', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(55, 'Costa de Marfil', '+225', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(56, 'Costa Rica', '+506', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(57, 'Croacia', '+385', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(58, 'Cuba', '+53', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(59, 'Dinamarca', '+45', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(60, 'Dominica', '+1-767', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(61, 'Ecuador', '+593', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(62, 'Egipto', '+20', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(63, 'El Salvador', '+503', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(64, 'Emiratos Árabes Unidos', '+971', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(65, 'Eritrea', '+291', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(66, 'Eslovaquia', '+421', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(67, 'Eslovenia', '+386', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(68, 'España', '+34', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(69, 'Estados Federados de Micronesia', '+691', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(70, 'Estados Unidos de América', '+1', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(71, 'Estonia', '+372', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(72, 'Etiopía', '+251', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(73, 'Filipinas', '+63', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(74, 'Finlandia', '+358', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(75, 'Fiyi', '+679', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(76, 'Francia', '+33', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(77, 'Gabón', '+241', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(78, 'Gambia', '+220', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(79, 'Georgia', '+995', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(80, 'Ghana', '+233', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(81, 'Gibraltar', '+350', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(82, 'Grecia', '+30', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(83, 'Groenlandia', '+299', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(84, 'Guadalupe', '+590', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(85, 'Guam', '+1-671', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(86, 'Guatemala', '+502', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(87, 'Guayana Francesa', '+594', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(88, 'Guernsey', '+44-1481', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(89, 'Guinea', '+224', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(90, 'Guinea Ecuatorial', '+240', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(91, 'Guinea-Bisáu', '+245', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(92, 'Guyana', '+592', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(93, 'Haití', '+509', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(94, 'Honduras', '+504', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(95, 'Hong Kong', '+852', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(96, 'Hungría', '+36', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(97, 'India', '+91', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(98, 'Indonesia', '+62', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(99, 'Irak', '+964', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(100, 'Irán', '+98', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(101, 'Irlanda', '+353', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(102, 'Isla de Man', '+44-1624', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(103, 'Isla Pitcairn', '+64', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(104, 'Islas Caimán', '+1-345', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(105, 'Islas Cook', '+682', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(106, 'Islas Feroe', '+298', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(107, 'Islas Malvinas', '+500', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(108, 'Islas Marianas del Norte', '+1-670', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(109, 'Islas Marshall', '+692', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(110, 'Islas Salomón', '+677', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(111, 'Islas Turcas y Caicos', '+1-649', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(112, 'Islas Vírgenes Británicas', '+1-284', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(113, 'Islas Vírgenes de los Estados Unidos', '+1-340', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(114, 'Israel', '+972', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(115, 'Italia', '+39', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(116, 'Jamaica', '+1-876', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(117, 'Japón', '+81', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(118, 'Jersey', '+44-1534', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(119, 'Jordania', '+962', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(120, 'Kazajistán', '+7', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(121, 'Kenia', '+254', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(122, 'Kirguistán', '+996', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(123, 'Kiribati', '+686', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(124, 'Kuwait', '+965', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(125, 'Laos', '+856', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(126, 'Lesoto', '+266', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(127, 'Letonia', '+371', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(128, 'Líbano', '+961', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(129, 'Liberia', '+231', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(130, 'Libia', '+218', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(131, 'Liechtenstein', '+423', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(132, 'Lituania', '+370', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(133, 'Luxemburgo', '+352', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(134, 'Macao', '+853', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(135, 'Macedonia del Norte', '+389', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(136, 'Madagascar', '+261', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(137, 'Malasia', '+60', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(138, 'Malaui', '+265', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(139, 'Maldivas', '+960', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(140, 'Malí', '+223', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(141, 'Malta', '+356', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(142, 'Marruecos', '+212', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(143, 'Martinica', '+596', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(144, 'Mauricio', '+230', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(145, 'Mauritania', '+222', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(146, 'Mayotte', '+262', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(147, 'México', '+52', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(148, 'Moldavia', '+373', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(149, 'Mónaco', '+377', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(150, 'Mongolia', '+976', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(151, 'Montenegro', '+382', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(152, 'Montserrat', '+1-664', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(153, 'Mozambique', '+258', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(154, 'Namibia', '+264', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(155, 'Nauru', '+674', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(156, 'Nepal', '+977', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(157, 'Nicaragua', '+505', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(158, 'Níger', '+227', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(159, 'Nigeria', '+234', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(160, 'Niue', '+683', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(161, 'Noruega', '+47', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(162, 'Nueva Caledonia', '+687', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(163, 'Nueva Zelanda', '+64', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(164, 'Omán', '+968', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(165, 'Países Bajos', '+31', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(166, 'Pakistán', '+92', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(167, 'Palaos', '+680', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(168, 'Palestina', '+970', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(169, 'Panamá', '+507', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(170, 'Papúa Nueva Guinea', '+675', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(171, 'Paraguay', '+595', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(172, 'Perú', '+51', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(173, 'Polinesia Francesa', '+689', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(174, 'Polonia', '+48', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(175, 'Portugal', '+351', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(176, 'Puerto Rico', '+1-787', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(177, 'Reino Unido', '+44', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(178, 'República Centroafricana', '+236', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(179, 'República Checa', '+420', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(180, 'República Democrática del Congo', '+243', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(181, 'República Dominicana', '+1-809', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(182, 'Ruanda', '+250', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(183, 'Rumania', '+40', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(184, 'Rusia', '+7', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(185, 'Sáhara Occidental', '+212', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(186, 'Samoa', '+685', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(187, 'Samoa Americana', '+1-684', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(188, 'San Cristóbal y Nieves', '+1-869', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(189, 'San Marino', '+378', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(190, 'San Vicente y las Granadinas', '+1-784', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(191, 'Santa Lucía', '+1-758', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(192, 'Santo Tomé y Príncipe', '+239', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(193, 'Senegal', '+221', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(194, 'Serbia', '+381', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(195, 'Seychelles', '+248', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(196, 'Sierra Leona', '+232', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(197, 'Singapur', '+65', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(198, 'Siria', '+963', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(199, 'Somalia', '+252', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(200, 'Sri Lanka', '+94', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(201, 'Suazilandia', '+268', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(202, 'Sudáfrica', '+27', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(203, 'Sudán', '+249', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(204, 'Sudán del Sur', '+211', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(205, 'Suecia', '+46', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(206, 'Suiza', '+41', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(207, 'Surinam', '+597', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(208, 'Tailandia', '+66', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(209, 'Taiwán', '+886', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(210, 'Tanzania', '+255', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(211, 'Tayikistán', '+992', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(212, 'Timor Oriental', '+670', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(213, 'Togo', '+228', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(214, 'Tokelau', '+690', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(215, 'Tonga', '+676', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(216, 'Trinidad y Tobago', '+1-868', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(217, 'Túnez', '+216', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(218, 'Turkmenistán', '+993', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(219, 'Turquía', '+90', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(220, 'Tuvalu', '+688', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(221, 'Ucrania', '+380', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(222, 'Uganda', '+256', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(223, 'Uruguay', '+598', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(224, 'Uzbekistán', '+998', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(225, 'Vanuatu', '+678', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(226, 'Venezuela', '+58', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(227, 'Vietnam', '+84', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(228, 'Wallis y Futuna', '+681', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(229, 'Yemen', '+967', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(230, 'Yibuti', '+253', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(231, 'Zambia', '+260', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(232, 'Zimbabue', '+263', '2024-08-29 02:26:22', '2024-08-29 02:26:22');

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
(1, 'ver usuarios', 'web', NULL, '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(2, 'indice usuarios', 'web', NULL, '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(3, 'actualizar usuario', 'web', NULL, '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(4, 'crear usuario', 'web', NULL, '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(5, 'borrar usuario', 'web', NULL, '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(6, 'ver roles', 'web', NULL, '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(7, 'indice roles', 'web', NULL, '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(8, 'actualizar rol', 'web', NULL, '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(9, 'crear rol', 'web', NULL, '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(10, 'eliminar rol', 'web', NULL, '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(11, 'agregar permisos al rol', 'web', NULL, '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(12, 'ver permisos', 'web', NULL, '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(13, 'indice permisos', 'web', NULL, '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(14, 'actualizar permiso', 'web', NULL, '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(15, 'crear permiso', 'web', NULL, '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(16, 'borrar permiso', 'web', NULL, '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(17, 'ver boton personas', 'web', NULL, '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(18, 'ver boton roles y permisos', 'web', NULL, '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(19, 'ver boton de invitado', 'web', NULL, '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(20, 'ver boton de agremiado', 'web', NULL, '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(21, 'ver boton mantenimientos', 'web', NULL, '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(22, 'ver boton notificaciones', 'web', NULL, '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(23, 'indice contenido inicio', 'web', NULL, '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(24, 'actualizar contenido inicio', 'web', NULL, '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(25, 'crear contenido inicio', 'web', NULL, '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(26, 'borrar contenido inicio', 'web', NULL, '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(27, 'indice preguntas de seguridad', 'web', NULL, '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(28, 'actualizar preguntas de seguridad', 'web', NULL, '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(29, 'crear preguntas de seguridad', 'web', NULL, '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(30, 'borrar preguntas de seguridad', 'web', NULL, '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(31, 'ver opciones de recuperacion contaseña', 'web', NULL, '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(32, 'ver preguntas de seguridad', 'web', NULL, '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(33, 'ver perfil', 'web', NULL, '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(34, 'actualizar perfil', 'web', NULL, '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(35, 'cambiar contraseña', 'web', NULL, '2024-08-29 02:26:23', '2024-08-29 02:26:23'),
(36, 'ver paises', 'web', NULL, '2024-08-29 02:26:23', '2024-08-29 02:26:23'),
(37, 'indice paises', 'web', NULL, '2024-08-29 02:26:23', '2024-08-29 02:26:23'),
(38, 'actualizar pais', 'web', NULL, '2024-08-29 02:26:23', '2024-08-29 02:26:23'),
(39, 'crear pais', 'web', NULL, '2024-08-29 02:26:23', '2024-08-29 02:26:23'),
(40, 'borrar pais', 'web', NULL, '2024-08-29 02:26:23', '2024-08-29 02:26:23'),
(41, 'indice idiomas', 'web', NULL, '2024-08-29 02:26:23', '2024-08-29 02:26:23'),
(42, 'actualizar idioma', 'web', NULL, '2024-08-29 02:26:23', '2024-08-29 02:26:23'),
(43, 'crear idioma', 'web', NULL, '2024-08-29 02:26:23', '2024-08-29 02:26:23'),
(44, 'borrar idioma', 'web', NULL, '2024-08-29 02:26:23', '2024-08-29 02:26:23'),
(45, 'indice contenido dasboard', 'web', NULL, '2024-08-29 02:26:23', '2024-08-29 02:26:23'),
(46, 'actualizar contenido dasboard', 'web', NULL, '2024-08-29 02:26:23', '2024-08-29 02:26:23'),
(47, 'crear contenido dasboard', 'web', NULL, '2024-08-29 02:26:23', '2024-08-29 02:26:23'),
(48, 'borrar contenido dasboard', 'web', NULL, '2024-08-29 02:26:23', '2024-08-29 02:26:23'),
(49, 'ver cursos', 'web', NULL, '2024-08-29 02:26:23', '2024-08-29 02:26:23'),
(50, 'indice cursos', 'web', NULL, '2024-08-29 02:26:23', '2024-08-29 02:26:23'),
(51, 'actualizar cursos', 'web', NULL, '2024-08-29 02:26:23', '2024-08-29 02:26:23'),
(52, 'crear cursos', 'web', NULL, '2024-08-29 02:26:23', '2024-08-29 02:26:23'),
(53, 'borrar cursos', 'web', NULL, '2024-08-29 02:26:23', '2024-08-29 02:26:23'),
(54, 'indice categorias', 'web', NULL, '2024-08-29 02:26:23', '2024-08-29 02:26:23'),
(55, 'actualizar categorias', 'web', NULL, '2024-08-29 02:26:23', '2024-08-29 02:26:23'),
(56, 'crear categorias', 'web', NULL, '2024-08-29 02:26:23', '2024-08-29 02:26:23'),
(57, 'borrar categorias', 'web', NULL, '2024-08-29 02:26:23', '2024-08-29 02:26:23');

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
(1, 'Administrador', 'web', 'El rol Administrador en la plataforma del Colegio Hondureño de Profesionales Universitarios en Contaduría Pública (COHPUCP), tiene el acceso completo a todas las funciones y datos del sistema. Los administradores pueden gestionar usuarios, configurar el sitio y realizar cualquier acción necesaria para mantener optimizada la plataforma.', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(2, 'Agremiado', 'web', 'El rol Agremiado en la plataforma del Colegio Hondureño de Profesionales Universitarios en Contaduría Pública (COHPUCP), tiene acceso privilegiado a recursos educativos, documentos profesionales y herramientas especializadas. Los miembros pueden realizar gestiones, participar en eventos, actualizar su perfil profesional, entre otras.', '2024-08-29 02:26:23', '2024-08-29 02:26:23'),
(3, 'Invitado', 'web', 'El rol Invitado en la plataforma del Colegio Hondureño de Profesionales Universitarios en Contaduría Pública (COHPUCP), generalmente tienen el nivel de acceso más básico y limitado. Los invitados suelen tener acceso solo a funciones y contenido públicos del sitio. Sus accesos a la plataforma incluyen navegar por el contenido visible para todos los usuarios, como páginas de inicio, información general, entre otras.', '2024-08-29 02:26:23', '2024-08-29 02:26:23');

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
-- Estructura de tabla para la tabla `sexos`
--

DROP TABLE IF EXISTS `sexos`;
CREATE TABLE IF NOT EXISTS `sexos` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sexos_nombre_unique` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Volcado de datos para la tabla `sexos`
--

INSERT INTO `sexos` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Masculino', '2024-08-29 02:26:22', '2024-08-29 02:26:22'),
(2, 'Femenino', '2024-08-29 02:26:22', '2024-08-29 02:26:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `universidades`
--

DROP TABLE IF EXISTS `universidades`;
CREATE TABLE IF NOT EXISTS `universidades` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre_universidad` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Volcado de datos para la tabla `universidades`
--

INSERT INTO `universidades` (`id`, `nombre_universidad`, `created_at`, `updated_at`) VALUES
(1, 'Universidad Nacional Autónoma de Honduras (UNAH)', '2024-08-29 02:26:23', '2024-08-29 02:26:23'),
(2, 'Universidad Tecnológica de Honduras (UTH)', '2024-08-29 02:26:23', '2024-08-29 02:26:23'),
(3, 'Centro Universitario Tecnológico (CEUTEC)', '2024-08-29 02:26:23', '2024-08-29 02:26:23'),
(4, 'Universidad Tecnológica Centroamericana (UNITEC)', '2024-08-29 02:26:23', '2024-08-29 02:26:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `universidad_user`
--

DROP TABLE IF EXISTS `universidad_user`;
CREATE TABLE IF NOT EXISTS `universidad_user` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `universidad_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `universidad_user_user_id_foreign` (`user_id`),
  KEY `universidad_user_universidad_id_foreign` (`universidad_id`)
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
  `sexo_id` bigint UNSIGNED DEFAULT NULL,
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
  `instagram_link` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `linkedin_link` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
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
  KEY `users_sexo_id_foreign` (`sexo_id`),
  KEY `users_pais_id_foreign` (`pais_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `name2`, `apellido`, `apellido2`, `numero_identidad`, `numero_colegiacion`, `rtn`, `sexo_id`, `fecha_nacimiento`, `pais_id`, `telefono`, `telefono_celular`, `email`, `estado`, `email_verified_at`, `password`, `profile_image`, `facebook_link`, `instagram_link`, `linkedin_link`, `twitter_link`, `bio`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Anibal', 'Johan', 'Godinez', 'Cortez', '0801-1984-15578', '2010-01-2220', '0801-1984-155781', 1, '1984-06-25', NULL, '2255-1123', '3356-0773', 'anibalgodinez64@gmail.com', 'activo', NULL, '$2y$10$bfLC3O29UBsPVaAOI4J4kO2VhxaqDogngzem6JSZKamWFIpdMG6Ka', 'profile_images/a1tdbIBNAtlO6xdbGEK8Ipvca6vC8yZc4WyC4GlR.png', NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-29 02:26:22', '2024-08-29 03:02:40'),
(2, 'Johan', 'Anibal', 'Cortez', 'Godinez', '0901-1985-12345', NULL, '0901-1985-123451', 1, '1985-07-10', NULL, '2456-7890', '3456-7890', 'johan_godinez@yahoo.com', 'activo', NULL, '$2y$10$53BX9lT3a/yGAqLD3f81F.F9.WbSAWX3CnIwFRXsrrtWKCcekKOAe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-29 02:26:23', '2024-08-29 02:26:23'),
(3, 'Carlos', 'Alberto', 'Pavón', 'Plummer', '0901-1978-32114', NULL, '0901-1978-321145', 1, '1978-02-07', NULL, '2456-1122', '9955-7890', 'carlospavon@gmail.com', 'activo', NULL, '$2y$10$db9pctCrUAp2unvwPwmqtODmsFCiDQq06LP/D6/tBczZr4oRD4a4S', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-29 02:26:23', '2024-08-29 02:26:23'),
(4, 'Marisa', 'Elizabeth', 'Pineda', 'Pavón', '0801-1998-55148', NULL, '0801-1998-551489', 2, '1998-04-02', NULL, '2277-7840', '9931-7530', 'marisapineda@gmail.com', 'activo', NULL, '$2y$10$hsiBtkG20RdnbRL1WdCvte5xzBSvt3ooMJ6uda3usMjX/REtdwG0q', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-08-29 02:26:23', '2024-08-29 02:26:23');

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
-- Filtros para la tabla `universidad_user`
--
ALTER TABLE `universidad_user`
  ADD CONSTRAINT `universidad_user_universidad_id_foreign` FOREIGN KEY (`universidad_id`) REFERENCES `universidades` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `universidad_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_pais_id_foreign` FOREIGN KEY (`pais_id`) REFERENCES `pais` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_sexo_id_foreign` FOREIGN KEY (`sexo_id`) REFERENCES `sexos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
