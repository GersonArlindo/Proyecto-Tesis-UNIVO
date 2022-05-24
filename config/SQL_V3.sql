-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 24-05-2022 a las 01:54:17
-- Versión del servidor: 5.7.31
-- Versión de PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_tesis`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alm_alumnos`
--

DROP TABLE IF EXISTS `alm_alumnos`;
CREATE TABLE IF NOT EXISTS `alm_alumnos` (
  `alm_codigo` int(11) NOT NULL,
  `alm_codcar` int(11) NOT NULL,
  `alm_codgrp` int(11) NOT NULL,
  `alm_carnet` varchar(12) DEFAULT NULL,
  `alm_nombres` varchar(250) DEFAULT NULL,
  `alm_apellidos` varchar(250) DEFAULT NULL,
  `alm_anio` int(11) DEFAULT NULL,
  `alm_telefono` varchar(9) NOT NULL,
  `alm_email` varchar(50) NOT NULL,
  `alm_direccion` varchar(255) NOT NULL,
  `alm_fecha_ing` datetime NOT NULL,
  `alm_fecha_mod` datetime NOT NULL,
  `alm_codusr` int(11) NOT NULL,
  PRIMARY KEY (`alm_codigo`),
  KEY `alm_codcar` (`alm_codcar`),
  KEY `alm_codgrp` (`alm_codgrp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `alm_alumnos`
--

INSERT INTO `alm_alumnos` (`alm_codigo`, `alm_codcar`, `alm_codgrp`, `alm_carnet`, `alm_nombres`, `alm_apellidos`, `alm_anio`, `alm_telefono`, `alm_email`, `alm_direccion`, `alm_fecha_ing`, `alm_fecha_mod`, `alm_codusr`) VALUES
(1, 1, 2, 'U20181261', 'Gerson Arlindo', 'Calis', 2022, '66731965', 'gerson50039@gmail.com', 'Av. Nueva España, Barrio Nueva España Chinameca San Miguel', '2022-05-19 15:08:18', '2022-05-19 15:08:18', 1),
(2, 1, 2, 'U20181261', 'Abigail', 'Gonzalez', 2022, '76731965', 'abigaildina01@gmail.com', 'Av. Nueva España, Barrio Nueva España Chinameca Sa', '2022-05-19 16:58:04', '2022-05-19 16:58:04', 1),
(3, 1, 2, 'U20181261', 'Helen Nicole', 'Calis', 2022, '76731965', 'gerson50039@gmail.com', 'Av. Nueva España, Barrio Nueva España Chinameca San Miguel', '2022-05-19 17:19:24', '2022-05-19 17:19:24', 1),
(4, 1, 3, 'U20201234', 'Fatima', 'Cruz', 2022, '76731965', 'fat@gmail.com', 'Colonia Santa Julia, San miguel', '2022-05-19 17:27:33', '2022-05-19 17:28:37', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ase_asesores`
--

DROP TABLE IF EXISTS `ase_asesores`;
CREATE TABLE IF NOT EXISTS `ase_asesores` (
  `ase_codigo` int(11) NOT NULL,
  `ase_nombres` varchar(250) DEFAULT NULL,
  `ase_apellido` varchar(100) NOT NULL,
  `ase_especialidad` varchar(250) DEFAULT NULL,
  `ase_email` varchar(100) NOT NULL,
  `ase_telefono` varchar(9) NOT NULL,
  `ase_direccion` varchar(255) NOT NULL,
  `ase_fecha_ing` datetime NOT NULL,
  `ase_fecha_mod` datetime NOT NULL,
  `ase_codusr` int(11) NOT NULL,
  PRIMARY KEY (`ase_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ase_asesores`
--

INSERT INTO `ase_asesores` (`ase_codigo`, `ase_nombres`, `ase_apellido`, `ase_especialidad`, `ase_email`, `ase_telefono`, `ase_direccion`, `ase_fecha_ing`, `ase_fecha_mod`, `ase_codusr`) VALUES
(1, 'Gerson Arlindo', 'Calis', 'Desarrollador Web', 'gerson50039@gmail.com', '76731965', 'Av. Nueva España, Barrio Nueva España Chinameca San Miguel', '2022-05-19 13:10:38', '2022-05-19 13:10:38', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_assignment`
--

DROP TABLE IF EXISTS `auth_assignment`;
CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  KEY `idx-auth_assignment-user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('MasterRol', '1', 1647829356),
('UsuarioRol', '2', 1647829371);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_item`
--

DROP TABLE IF EXISTS `auth_item`;
CREATE TABLE IF NOT EXISTS `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('/alumnos/*', 2, NULL, NULL, NULL, 1650645378, 1650645378),
('/asesores/*', 2, NULL, NULL, NULL, 1651255186, 1651255186),
('/carrera/*', 2, NULL, NULL, NULL, 1647828611, 1647828611),
('/debug/*', 2, NULL, NULL, NULL, 1647828833, 1647828833),
('/facultad/*', 2, NULL, NULL, NULL, 1647828779, 1647828779),
('/gii/*', 2, NULL, NULL, NULL, 1647828858, 1647828858),
('/grupo/*', 2, NULL, NULL, NULL, 1652932124, 1652932124),
('/jurado/*', 2, NULL, NULL, NULL, 1651259787, 1651259787),
('/rbac/*', 2, NULL, NULL, NULL, 1647828820, 1647828820),
('/site/*', 2, NULL, NULL, NULL, 1647828620, 1647828620),
('/tes-tesis/*', 2, NULL, NULL, NULL, 1651252662, 1651252662),
('/tin-tipo-investigacion/*', 2, NULL, NULL, NULL, 1651252670, 1651252670),
('/usuarios/*', 2, NULL, NULL, NULL, 1647828801, 1647828801),
('/usuarios/update', 2, NULL, NULL, NULL, 1647830107, 1647830107),
('/usuarios/view', 2, NULL, NULL, NULL, 1647830102, 1647830102),
('MasterAccess', 2, 'Permiso para acceder a todas las rutas del sistema como superAdmin', NULL, NULL, 1647828967, 1651259802),
('MasterRol', 1, 'Rol maestro', NULL, NULL, 1647829107, 1647829304),
('UsuarioAcces', 2, 'Acceso limitado de usuario a algunos crud', NULL, NULL, 1647829011, 1647829229),
('UsuarioRol', 1, 'Rol de usuario', NULL, NULL, 1647829169, 1647829281);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_item_child`
--

DROP TABLE IF EXISTS `auth_item_child`;
CREATE TABLE IF NOT EXISTS `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('MasterAccess', '/alumnos/*'),
('MasterAccess', '/asesores/*'),
('MasterAccess', '/carrera/*'),
('UsuarioAcces', '/carrera/*'),
('MasterAccess', '/debug/*'),
('MasterAccess', '/facultad/*'),
('UsuarioAcces', '/facultad/*'),
('MasterAccess', '/gii/*'),
('MasterAccess', '/grupo/*'),
('MasterAccess', '/jurado/*'),
('MasterAccess', '/rbac/*'),
('MasterAccess', '/site/*'),
('UsuarioAcces', '/site/*'),
('MasterAccess', '/tes-tesis/*'),
('MasterRol', '/tes-tesis/*'),
('MasterAccess', '/tin-tipo-investigacion/*'),
('MasterRol', '/tin-tipo-investigacion/*'),
('MasterAccess', '/usuarios/*'),
('MasterAccess', '/usuarios/update'),
('UsuarioAcces', '/usuarios/update'),
('MasterAccess', '/usuarios/view'),
('UsuarioAcces', '/usuarios/view'),
('MasterRol', 'MasterAccess'),
('UsuarioRol', 'UsuarioAcces');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_rule`
--

DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE IF NOT EXISTS `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `car_carrera`
--

DROP TABLE IF EXISTS `car_carrera`;
CREATE TABLE IF NOT EXISTS `car_carrera` (
  `car_codigo` int(11) NOT NULL,
  `car_codfac` int(11) NOT NULL,
  `car_nombre` varchar(500) DEFAULT NULL,
  `car_fecha_ing` datetime NOT NULL,
  `car_fecha_mod` datetime NOT NULL,
  PRIMARY KEY (`car_codigo`),
  KEY `car_codfac` (`car_codfac`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `car_carrera`
--

INSERT INTO `car_carrera` (`car_codigo`, `car_codfac`, `car_nombre`, `car_fecha_ing`, `car_fecha_mod`) VALUES
(1, 1, 'Ingeniería en Desarrollo de Software', '2022-04-29 16:15:39', '2022-04-29 16:15:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fac_facultad`
--

DROP TABLE IF EXISTS `fac_facultad`;
CREATE TABLE IF NOT EXISTS `fac_facultad` (
  `fac_codigo` int(11) NOT NULL,
  `fac_nombre` varchar(250) DEFAULT NULL,
  `fac_fecha_ing` datetime NOT NULL,
  `fac_fecha_mod` datetime NOT NULL,
  PRIMARY KEY (`fac_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `fac_facultad`
--

INSERT INTO `fac_facultad` (`fac_codigo`, `fac_nombre`, `fac_fecha_ing`, `fac_fecha_mod`) VALUES
(1, 'Ingeniería y arquitectura', '2022-04-29 16:06:59', '2022-04-29 16:06:59'),
(2, 'Facultad de medicina', '2022-04-29 16:07:15', '2022-04-29 16:07:15'),
(3, 'Facultad de Ciencias Economicas', '2022-04-29 16:07:44', '2022-04-29 16:07:44'),
(4, 'Facultad de CIencias Comerciales', '2022-04-29 16:08:10', '2022-04-29 16:08:10'),
(5, 'Facultad de Ciencias y Humanidades', '2022-04-29 16:08:50', '2022-04-29 16:08:50'),
(6, 'Facultas de CIencias Tecnologicas', '2022-04-29 16:09:12', '2022-04-29 16:09:12'),
(7, 'Facultas de CIencias Tecnologicas', '2022-04-29 16:09:14', '2022-04-29 16:09:14'),
(8, 'Facultad CIencias Sociales', '2022-04-29 16:09:47', '2022-04-29 16:09:47'),
(9, 'Facultad de Ciencias Juridicas', '2022-04-29 16:10:14', '2022-04-29 16:10:14'),
(10, 'Facultad de CIencias de la Salud', '2022-04-29 16:10:48', '2022-04-29 16:10:48'),
(11, 'Facultad de CIencias de la Salud', '2022-04-29 16:10:51', '2022-04-29 16:10:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grp_grupo`
--

DROP TABLE IF EXISTS `grp_grupo`;
CREATE TABLE IF NOT EXISTS `grp_grupo` (
  `grp_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `grp_codcar` int(11) NOT NULL,
  `grp_tema` varchar(1000) NOT NULL,
  `grp_tipo` int(11) NOT NULL,
  `grp_estado` int(1) NOT NULL,
  `grp_fecha_ing` datetime DEFAULT CURRENT_TIMESTAMP,
  `grp_fecha_mod` datetime DEFAULT NULL,
  PRIMARY KEY (`grp_codigo`),
  KEY `grp_codcar` (`grp_codcar`),
  KEY `grp_tipo` (`grp_tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `grp_grupo`
--

INSERT INTO `grp_grupo` (`grp_codigo`, `grp_codcar`, `grp_tema`, `grp_tipo`, `grp_estado`, `grp_fecha_ing`, `grp_fecha_mod`) VALUES
(2, 1, 'Tema prueba', 101, 1, '2022-05-19 13:30:43', NULL),
(3, 1, 'Investigación sobre los lenguajes de programación mas relevantes a lo largo de la historia', 101, 1, '2022-05-19 17:26:17', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jur_jurados`
--

DROP TABLE IF EXISTS `jur_jurados`;
CREATE TABLE IF NOT EXISTS `jur_jurados` (
  `jur_codigo` int(11) NOT NULL,
  `jur_nombres` varchar(250) DEFAULT NULL,
  `jur_apellidos` varchar(250) DEFAULT NULL,
  `jur_especialidad` varchar(250) DEFAULT NULL,
  `jur_rol` int(11) DEFAULT NULL,
  `jur_carnet` varchar(50) NOT NULL,
  `jur_telefono` varchar(9) NOT NULL,
  `jur_direccion` varchar(255) NOT NULL,
  `jur_email` varchar(50) NOT NULL,
  `jur_fecha_ing` datetime NOT NULL,
  `jur_fecha_mod` datetime NOT NULL,
  `jur_codusr` int(11) NOT NULL,
  PRIMARY KEY (`jur_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `jur_jurados`
--

INSERT INTO `jur_jurados` (`jur_codigo`, `jur_nombres`, `jur_apellidos`, `jur_especialidad`, `jur_rol`, `jur_carnet`, `jur_telefono`, `jur_direccion`, `jur_email`, `jur_fecha_ing`, `jur_fecha_mod`, `jur_codusr`) VALUES
(1, 'Fatima', 'Cruz', 'Diseñador Frontend', 1, 'U20154789', '74589636', 'San Miguel', 'facruz@gmail.com', '2022-05-06 19:45:28', '2022-05-06 19:45:28', 1),
(2, 'Rocio', 'Gonzalez', 'Desarrollador FullStack', 2, 'U20154784', '74962584', 'San Alejo', 'rogonza@gmail.com', '2022-05-06 19:47:00', '2022-05-06 19:47:00', 1),
(3, 'Nicole', 'Castro', 'Desarrollador FullStack', 3, 'U20184796', '71759845', 'La Unión', 'nicast@gmail.com', '2022-05-06 19:48:09', '2022-05-06 19:48:09', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migration`
--

DROP TABLE IF EXISTS `migration`;
CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1646326739),
('m130524_201442_init', 1646326743),
('m190124_110200_add_verification_token_column_to_user_table', 1646326744),
('m140506_102106_rbac_init', 1647828094),
('m170907_052038_rbac_add_index_on_auth_assignment_user_id', 1647828094),
('m180523_151638_rbac_updates_indexes_without_prefix', 1647828095),
('m200409_110543_rbac_update_mssql_trigger', 1647828095);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_error_log`
--

DROP TABLE IF EXISTS `tbl_error_log`;
CREATE TABLE IF NOT EXISTS `tbl_error_log` (
  `id_error_log` int(11) NOT NULL AUTO_INCREMENT,
  `controller` varchar(50) NOT NULL,
  `mensaje` text NOT NULL,
  `us_id` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  PRIMARY KEY (`id_error_log`),
  KEY `us_id` (`us_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_error_log`
--

INSERT INTO `tbl_error_log` (`id_error_log`, `controller`, `mensaje`, `us_id`, `fecha`) VALUES
(1, 'carrera/create', 'Exception: Codigo &quot;23456&quot; has already been taken. in C:\\wamp64\\www\\basico\\controllers\\CarreraController.php:82<br />\nStack trace:<br />\n#0 [internal function]: app\\controllers\\CarreraController-&gt;actionCreate()<br />\n#1 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\InlineAction.php(57): call_user_func_array(Array, Array)<br />\n#2 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\Controller.php(178): yii\\base\\InlineAction-&gt;runWithParams(Array)<br />\n#3 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\Module.php(552): yii\\base\\Controller-&gt;runAction(&#039;create&#039;, Array)<br />\n#4 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\web\\Application.php(103): yii\\base\\Module-&gt;runAction(&#039;carrera/create&#039;, Array)<br />\n#5 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\Application.php(384): yii\\web\\Application-&gt;handleRequest(Object(yii\\web\\Request))<br />\n#6 C:\\wamp64\\www\\basico\\web\\index.php(12): yii\\base\\Application-&gt;run()<br />\n#7 {main}', 1, '2022-03-20 20:30:45'),
(2, 'carrera/create', 'PDOException: SQLSTATE[22007]: Invalid datetime format: 1292 Incorrect datetime value: &#039;202022Sundaypm 030000003202022&#039; for column &#039;car_fecha_mod&#039; at row 1 in C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\db\\Command.php:1302<br />\r\nStack trace:<br />\r\n#0 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\db\\Command.php(1302): PDOStatement-&gt;execute()<br />\r\n#1 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\db\\Command.php(1102): yii\\db\\Command-&gt;internalExecute(&#039;INSERT INTO `ca...&#039;)<br />\r\n#2 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\db\\Schema.php(431): yii\\db\\Command-&gt;execute()<br />\r\n#3 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\db\\ActiveRecord.php(604): yii\\db\\Schema-&gt;insert(&#039;car_carrera&#039;, Array)<br />\r\n#4 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\db\\ActiveRecord.php(570): yii\\db\\ActiveRecord-&gt;insertInternal(NULL)<br />\r\n#5 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\db\\BaseActiveRecord.php(676): yii\\db\\ActiveRecord-&gt;insert(true, NULL)<br />\r\n#6 C:\\wamp64\\www\\basico\\controllers\\CarreraController.php(81): yii\\db\\BaseActiveRecord-&gt;save()<br />\r\n#7 [internal function]: app\\controllers\\CarreraController-&gt;actionCreate()<br />\r\n#8 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\InlineAction.php(57): call_user_func_array(Array, Array)<br />\r\n#9 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\Controller.php(178): yii\\base\\InlineAction-&gt;runWithParams(Array)<br />\r\n#10 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\Module.php(552): yii\\base\\Controller-&gt;runAction(&#039;create&#039;, Array)<br />\r\n#11 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\web\\Application.php(103): yii\\base\\Module-&gt;runAction(&#039;carrera/create&#039;, Array)<br />\r\n#12 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\Application.php(384): yii\\web\\Application-&gt;handleRequest(Object(yii\\web\\Request))<br />\r\n#13 C:\\wamp64\\www\\basico\\web\\index.php(12): yii\\base\\Application-&gt;run()<br />\r\n#14 {main}<br />\r\n<br />\r\nNext yii\\db\\Exception: SQLSTATE[22007]: Invalid datetime format: 1292 Incorrect datetime value: &#039;202022Sundaypm 030000003202022&#039; for column &#039;car_fecha_mod&#039; at row 1<br />\r\nThe SQL being executed was: INSERT INTO `car_carrera` (`car_codigo`, `car_codfac`, `car_nombre`, `car_fecha_ing`, `car_fecha_mod`) VALUES (5534443, 10003, &#039;zzzzz&#039;, &#039;2022-03-20 20:45:41&#039;, &#039;202022Sundaypm 030000003202022&#039;) in C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\db\\Schema.php:676<br />\r\nStack trace:<br />\r\n#0 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\db\\Command.php(1307): yii\\db\\Schema-&gt;convertException(Object(PDOException), &#039;INSERT INTO `ca...&#039;)<br />\r\n#1 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\db\\Command.php(1102): yii\\db\\Command-&gt;internalExecute(&#039;INSERT INTO `ca...&#039;)<br />\r\n#2 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\db\\Schema.php(431): yii\\db\\Command-&gt;execute()<br />\r\n#3 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\db\\ActiveRecord.php(604): yii\\db\\Schema-&gt;insert(&#039;car_carrera&#039;, Array)<br />\r\n#4 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\db\\ActiveRecord.php(570): yii\\db\\ActiveRecord-&gt;insertInternal(NULL)<br />\r\n#5 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\db\\BaseActiveRecord.php(676): yii\\db\\ActiveRecord-&gt;insert(true, NULL)<br />\r\n#6 C:\\wamp64\\www\\basico\\controllers\\CarreraController.php(81): yii\\db\\BaseActiveRecord-&gt;save()<br />\r\n#7 [internal function]: app\\controllers\\CarreraController-&gt;actionCreate()<br />\r\n#8 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\InlineAction.php(57): call_user_func_array(Array, Array)<br />\r\n#9 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\Controller.php(178): yii\\base\\InlineAction-&gt;runWithParams(Array)<br />\r\n#10 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\Module.php(552): yii\\base\\Controller-&gt;runAction(&#039;create&#039;, Array)<br />\r\n#11 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\web\\Application.php(103): yii\\base\\Module-&gt;runAction(&#039;carrera/create&#039;, Array)<br />\r\n#12 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\Application.php(384): yii\\web\\Application-&gt;handleRequest(Object(yii\\web\\Request))<br />\r\n#13 C:\\wamp64\\www\\basico\\web\\index.php(12): yii\\base\\Application-&gt;run()<br />\r\n#14 {main}<br />\r\nAdditional Information:<br />\r\nArray<br />\r\n(<br />\r\n    [0] =&gt; 22007<br />\r\n    [1] =&gt; 1292<br />\r\n    [2] =&gt; Incorrect datetime value: &#039;202022Sundaypm 030000003202022&#039; for column &#039;car_fecha_mod&#039; at row 1<br />\r\n)<br />\r\n', 1, '2022-03-20 20:45:41'),
(3, 'alumnos/create', 'PDOException: SQLSTATE[22003]: Numeric value out of range: 1264 Out of range value for column &#039;alm_anio&#039; at row 1 in C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\db\\Command.php:1302<br />\r\nStack trace:<br />\r\n#0 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\db\\Command.php(1302): PDOStatement-&gt;execute()<br />\r\n#1 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\db\\Command.php(1102): yii\\db\\Command-&gt;internalExecute(&#039;INSERT INTO `al...&#039;)<br />\r\n#2 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\db\\Schema.php(431): yii\\db\\Command-&gt;execute()<br />\r\n#3 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\db\\ActiveRecord.php(604): yii\\db\\Schema-&gt;insert(&#039;alm_alumnos&#039;, Array)<br />\r\n#4 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\db\\ActiveRecord.php(570): yii\\db\\ActiveRecord-&gt;insertInternal(NULL)<br />\r\n#5 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\db\\BaseActiveRecord.php(676): yii\\db\\ActiveRecord-&gt;insert(true, NULL)<br />\r\n#6 C:\\wamp64\\www\\basico\\controllers\\AlumnosController.php(80): yii\\db\\BaseActiveRecord-&gt;save()<br />\r\n#7 [internal function]: app\\controllers\\AlumnosController-&gt;actionCreate()<br />\r\n#8 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\InlineAction.php(57): call_user_func_array(Array, Array)<br />\r\n#9 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\Controller.php(178): yii\\base\\InlineAction-&gt;runWithParams(Array)<br />\r\n#10 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\Module.php(552): yii\\base\\Controller-&gt;runAction(&#039;create&#039;, Array)<br />\r\n#11 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\web\\Application.php(103): yii\\base\\Module-&gt;runAction(&#039;alumnos/create&#039;, Array)<br />\r\n#12 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\Application.php(384): yii\\web\\Application-&gt;handleRequest(Object(yii\\web\\Request))<br />\r\n#13 C:\\wamp64\\www\\basico\\web\\index.php(12): yii\\base\\Application-&gt;run()<br />\r\n#14 {main}<br />\r\n<br />\r\nNext yii\\db\\Exception: SQLSTATE[22003]: Numeric value out of range: 1264 Out of range value for column &#039;alm_anio&#039; at row 1<br />\r\nThe SQL being executed was: INSERT INTO `alm_alumnos` (`alm_codigo`, `alm_codcar`, `alm_codcil`, `alm_carnet`, `alm_nombres`, `alm_apellidos`, `alm_anio`, `alm_telefono`, `alm_email`, `alm_direccion`, `alm_fecha_ing`, `alm_fecha_mod`, `alm_codusr`) VALUES (124, 23456, 12021, &#039;U20181261&#039;, &#039;Jhojaira Abigail&#039;, &#039;Cruz Marquez&#039;, 2022, &#039;75757364&#039;, &#039;jhojaira99@gmail.com&#039;, &#039;Colonia Santa Julia, pasaje Garzilazo, San Miguel&#039;, &#039;22-Apr-2022 12:09:49&#039;, &#039;22-Apr-2022 12:09:49&#039;, 1) in C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\db\\Schema.php:676<br />\r\nStack trace:<br />\r\n#0 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\db\\Command.php(1307): yii\\db\\Schema-&gt;convertException(Object(PDOException), &#039;INSERT INTO `al...&#039;)<br />\r\n#1 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\db\\Command.php(1102): yii\\db\\Command-&gt;internalExecute(&#039;INSERT INTO `al...&#039;)<br />\r\n#2 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\db\\Schema.php(431): yii\\db\\Command-&gt;execute()<br />\r\n#3 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\db\\ActiveRecord.php(604): yii\\db\\Schema-&gt;insert(&#039;alm_alumnos&#039;, Array)<br />\r\n#4 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\db\\ActiveRecord.php(570): yii\\db\\ActiveRecord-&gt;insertInternal(NULL)<br />\r\n#5 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\db\\BaseActiveRecord.php(676): yii\\db\\ActiveRecord-&gt;insert(true, NULL)<br />\r\n#6 C:\\wamp64\\www\\basico\\controllers\\AlumnosController.php(80): yii\\db\\BaseActiveRecord-&gt;save()<br />\r\n#7 [internal function]: app\\controllers\\AlumnosController-&gt;actionCreate()<br />\r\n#8 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\InlineAction.php(57): call_user_func_array(Array, Array)<br />\r\n#9 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\Controller.php(178): yii\\base\\InlineAction-&gt;runWithParams(Array)<br />\r\n#10 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\Module.php(552): yii\\base\\Controller-&gt;runAction(&#039;create&#039;, Array)<br />\r\n#11 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\web\\Application.php(103): yii\\base\\Module-&gt;runAction(&#039;alumnos/create&#039;, Array)<br />\r\n#12 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\Application.php(384): yii\\web\\Application-&gt;handleRequest(Object(yii\\web\\Request))<br />\r\n#13 C:\\wamp64\\www\\basico\\web\\index.php(12): yii\\base\\Application-&gt;run()<br />\r\n#14 {main}<br />\r\nAdditional Information:<br />\r\nArray<br />\r\n(<br />\r\n    [0] =&gt; 22003<br />\r\n    [1] =&gt; 1264<br />\r\n    [2] =&gt; Out of range value for column &#039;alm_anio&#039; at row 1<br />\r\n)<br />\r\n', 1, '2022-04-22 12:09:49'),
(4, 'alumnos/create', 'PDOException: SQLSTATE[22007]: Invalid datetime format: 1292 Incorrect datetime value: &#039;22-Apr-2022 12:18:44&#039; for column &#039;alm_fecha_ing&#039; at row 1 in C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\db\\Command.php:1302<br />\r\nStack trace:<br />\r\n#0 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\db\\Command.php(1302): PDOStatement-&gt;execute()<br />\r\n#1 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\db\\Command.php(1102): yii\\db\\Command-&gt;internalExecute(&#039;INSERT INTO `al...&#039;)<br />\r\n#2 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\db\\Schema.php(431): yii\\db\\Command-&gt;execute()<br />\r\n#3 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\db\\ActiveRecord.php(604): yii\\db\\Schema-&gt;insert(&#039;alm_alumnos&#039;, Array)<br />\r\n#4 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\db\\ActiveRecord.php(570): yii\\db\\ActiveRecord-&gt;insertInternal(NULL)<br />\r\n#5 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\db\\BaseActiveRecord.php(676): yii\\db\\ActiveRecord-&gt;insert(true, NULL)<br />\r\n#6 C:\\wamp64\\www\\basico\\controllers\\AlumnosController.php(80): yii\\db\\BaseActiveRecord-&gt;save()<br />\r\n#7 [internal function]: app\\controllers\\AlumnosController-&gt;actionCreate()<br />\r\n#8 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\InlineAction.php(57): call_user_func_array(Array, Array)<br />\r\n#9 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\Controller.php(178): yii\\base\\InlineAction-&gt;runWithParams(Array)<br />\r\n#10 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\Module.php(552): yii\\base\\Controller-&gt;runAction(&#039;create&#039;, Array)<br />\r\n#11 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\web\\Application.php(103): yii\\base\\Module-&gt;runAction(&#039;alumnos/create&#039;, Array)<br />\r\n#12 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\Application.php(384): yii\\web\\Application-&gt;handleRequest(Object(yii\\web\\Request))<br />\r\n#13 C:\\wamp64\\www\\basico\\web\\index.php(12): yii\\base\\Application-&gt;run()<br />\r\n#14 {main}<br />\r\n<br />\r\nNext yii\\db\\Exception: SQLSTATE[22007]: Invalid datetime format: 1292 Incorrect datetime value: &#039;22-Apr-2022 12:18:44&#039; for column &#039;alm_fecha_ing&#039; at row 1<br />\r\nThe SQL being executed was: INSERT INTO `alm_alumnos` (`alm_codigo`, `alm_codcar`, `alm_codcil`, `alm_carnet`, `alm_nombres`, `alm_apellidos`, `alm_anio`, `alm_telefono`, `alm_email`, `alm_direccion`, `alm_fecha_ing`, `alm_fecha_mod`, `alm_codusr`) VALUES (124, 23456, 12021, &#039;U20181261&#039;, &#039;Jhojaira Abigail&#039;, &#039;Cruz Marquez&#039;, 2022, &#039;75757364&#039;, &#039;abigail01@gmail.com&#039;, &#039;Colonia Santa Julia, pasaje garcilazo San Miguel&#039;, &#039;22-Apr-2022 12:18:44&#039;, &#039;22-Apr-2022 12:18:44&#039;, 1) in C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\db\\Schema.php:676<br />\r\nStack trace:<br />\r\n#0 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\db\\Command.php(1307): yii\\db\\Schema-&gt;convertException(Object(PDOException), &#039;INSERT INTO `al...&#039;)<br />\r\n#1 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\db\\Command.php(1102): yii\\db\\Command-&gt;internalExecute(&#039;INSERT INTO `al...&#039;)<br />\r\n#2 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\db\\Schema.php(431): yii\\db\\Command-&gt;execute()<br />\r\n#3 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\db\\ActiveRecord.php(604): yii\\db\\Schema-&gt;insert(&#039;alm_alumnos&#039;, Array)<br />\r\n#4 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\db\\ActiveRecord.php(570): yii\\db\\ActiveRecord-&gt;insertInternal(NULL)<br />\r\n#5 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\db\\BaseActiveRecord.php(676): yii\\db\\ActiveRecord-&gt;insert(true, NULL)<br />\r\n#6 C:\\wamp64\\www\\basico\\controllers\\AlumnosController.php(80): yii\\db\\BaseActiveRecord-&gt;save()<br />\r\n#7 [internal function]: app\\controllers\\AlumnosController-&gt;actionCreate()<br />\r\n#8 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\InlineAction.php(57): call_user_func_array(Array, Array)<br />\r\n#9 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\Controller.php(178): yii\\base\\InlineAction-&gt;runWithParams(Array)<br />\r\n#10 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\Module.php(552): yii\\base\\Controller-&gt;runAction(&#039;create&#039;, Array)<br />\r\n#11 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\web\\Application.php(103): yii\\base\\Module-&gt;runAction(&#039;alumnos/create&#039;, Array)<br />\r\n#12 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\Application.php(384): yii\\web\\Application-&gt;handleRequest(Object(yii\\web\\Request))<br />\r\n#13 C:\\wamp64\\www\\basico\\web\\index.php(12): yii\\base\\Application-&gt;run()<br />\r\n#14 {main}<br />\r\nAdditional Information:<br />\r\nArray<br />\r\n(<br />\r\n    [0] =&gt; 22007<br />\r\n    [1] =&gt; 1292<br />\r\n    [2] =&gt; Incorrect datetime value: &#039;22-Apr-2022 12:18:44&#039; for column &#039;alm_fecha_ing&#039; at row 1<br />\r\n)<br />\r\n', 1, '2022-04-22 12:18:44'),
(5, 'alumnos/create', 'Exception: Codigo &quot;124&quot; has already been taken. in C:\\wamp64\\www\\basico\\controllers\\AlumnosController.php:81<br />\nStack trace:<br />\n#0 [internal function]: app\\controllers\\AlumnosController-&gt;actionCreate()<br />\n#1 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\InlineAction.php(57): call_user_func_array(Array, Array)<br />\n#2 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\Controller.php(178): yii\\base\\InlineAction-&gt;runWithParams(Array)<br />\n#3 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\Module.php(552): yii\\base\\Controller-&gt;runAction(&#039;create&#039;, Array)<br />\n#4 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\web\\Application.php(103): yii\\base\\Module-&gt;runAction(&#039;alumnos/create&#039;, Array)<br />\n#5 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\Application.php(384): yii\\web\\Application-&gt;handleRequest(Object(yii\\web\\Request))<br />\n#6 C:\\wamp64\\www\\basico\\web\\index.php(12): yii\\base\\Application-&gt;run()<br />\n#7 {main}', 1, '2022-04-22 12:22:57'),
(6, 'tin-tipo-investigacion/create', 'yii\\base\\UnknownPropertyException: Setting unknown property: app\\models\\TinTipoInvestigacion::tin_codusr in C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\Component.php:209<br />\nStack trace:<br />\n#0 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\db\\BaseActiveRecord.php(322): yii\\base\\Component-&gt;__set(&#039;tin_codusr&#039;, 1)<br />\n#1 C:\\wamp64\\www\\basico\\controllers\\TinTipoInvestigacionController.php(79): yii\\db\\BaseActiveRecord-&gt;__set(&#039;tin_codusr&#039;, 1)<br />\n#2 [internal function]: app\\controllers\\TinTipoInvestigacionController-&gt;actionCreate()<br />\n#3 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\InlineAction.php(57): call_user_func_array(Array, Array)<br />\n#4 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\Controller.php(178): yii\\base\\InlineAction-&gt;runWithParams(Array)<br />\n#5 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\Module.php(552): yii\\base\\Controller-&gt;runAction(&#039;create&#039;, Array)<br />\n#6 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\web\\Application.php(103): yii\\base\\Module-&gt;runAction(&#039;tin-tipo-invest...&#039;, Array)<br />\n#7 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\Application.php(384): yii\\web\\Application-&gt;handleRequest(Object(yii\\web\\Request))<br />\n#8 C:\\wamp64\\www\\basico\\web\\index.php(12): yii\\base\\Application-&gt;run()<br />\n#9 {main}', 1, '2022-04-29 11:32:26'),
(7, 'tin-tipo-investigacion/create', 'yii\\base\\UnknownPropertyException: Setting unknown property: app\\models\\TinTipoInvestigacion::tin_codusr in C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\Component.php:209<br />\nStack trace:<br />\n#0 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\db\\BaseActiveRecord.php(322): yii\\base\\Component-&gt;__set(&#039;tin_codusr&#039;, 1)<br />\n#1 C:\\wamp64\\www\\basico\\controllers\\TinTipoInvestigacionController.php(79): yii\\db\\BaseActiveRecord-&gt;__set(&#039;tin_codusr&#039;, 1)<br />\n#2 [internal function]: app\\controllers\\TinTipoInvestigacionController-&gt;actionCreate()<br />\n#3 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\InlineAction.php(57): call_user_func_array(Array, Array)<br />\n#4 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\Controller.php(178): yii\\base\\InlineAction-&gt;runWithParams(Array)<br />\n#5 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\Module.php(552): yii\\base\\Controller-&gt;runAction(&#039;create&#039;, Array)<br />\n#6 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\web\\Application.php(103): yii\\base\\Module-&gt;runAction(&#039;tin-tipo-invest...&#039;, Array)<br />\n#7 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\Application.php(384): yii\\web\\Application-&gt;handleRequest(Object(yii\\web\\Request))<br />\n#8 C:\\wamp64\\www\\basico\\web\\index.php(12): yii\\base\\Application-&gt;run()<br />\n#9 {main}', 1, '2022-04-29 11:33:47'),
(8, 'tin-tipo-investigacion/create', 'yii\\base\\UnknownPropertyException: Setting unknown property: app\\models\\TinTipoInvestigacion::tin_codusr in C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\Component.php:209<br />\nStack trace:<br />\n#0 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\db\\BaseActiveRecord.php(322): yii\\base\\Component-&gt;__set(&#039;tin_codusr&#039;, 1)<br />\n#1 C:\\wamp64\\www\\basico\\controllers\\TinTipoInvestigacionController.php(79): yii\\db\\BaseActiveRecord-&gt;__set(&#039;tin_codusr&#039;, 1)<br />\n#2 [internal function]: app\\controllers\\TinTipoInvestigacionController-&gt;actionCreate()<br />\n#3 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\InlineAction.php(57): call_user_func_array(Array, Array)<br />\n#4 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\Controller.php(178): yii\\base\\InlineAction-&gt;runWithParams(Array)<br />\n#5 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\Module.php(552): yii\\base\\Controller-&gt;runAction(&#039;create&#039;, Array)<br />\n#6 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\web\\Application.php(103): yii\\base\\Module-&gt;runAction(&#039;tin-tipo-invest...&#039;, Array)<br />\n#7 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\Application.php(384): yii\\web\\Application-&gt;handleRequest(Object(yii\\web\\Request))<br />\n#8 C:\\wamp64\\www\\basico\\web\\index.php(12): yii\\base\\Application-&gt;run()<br />\n#9 {main}', 1, '2022-04-29 11:36:10'),
(9, 'tin-tipo-investigacion/create', 'yii\\base\\UnknownPropertyException: Setting unknown property: app\\models\\TinTipoInvestigacion::tin_codusr in C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\Component.php:209<br />\nStack trace:<br />\n#0 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\db\\BaseActiveRecord.php(322): yii\\base\\Component-&gt;__set(&#039;tin_codusr&#039;, 1)<br />\n#1 C:\\wamp64\\www\\basico\\controllers\\TinTipoInvestigacionController.php(79): yii\\db\\BaseActiveRecord-&gt;__set(&#039;tin_codusr&#039;, 1)<br />\n#2 [internal function]: app\\controllers\\TinTipoInvestigacionController-&gt;actionCreate()<br />\n#3 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\InlineAction.php(57): call_user_func_array(Array, Array)<br />\n#4 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\Controller.php(178): yii\\base\\InlineAction-&gt;runWithParams(Array)<br />\n#5 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\Module.php(552): yii\\base\\Controller-&gt;runAction(&#039;create&#039;, Array)<br />\n#6 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\web\\Application.php(103): yii\\base\\Module-&gt;runAction(&#039;tin-tipo-invest...&#039;, Array)<br />\n#7 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\Application.php(384): yii\\web\\Application-&gt;handleRequest(Object(yii\\web\\Request))<br />\n#8 C:\\wamp64\\www\\basico\\web\\index.php(12): yii\\base\\Application-&gt;run()<br />\n#9 {main}', 1, '2022-04-29 11:42:39'),
(10, 'alumnos/create', 'Exception: Codigo must be an integer. in C:\\wamp64\\www\\basico\\controllers\\AlumnosController.php:82<br />\nStack trace:<br />\n#0 [internal function]: app\\controllers\\AlumnosController-&gt;actionCreate()<br />\n#1 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\InlineAction.php(57): call_user_func_array(Array, Array)<br />\n#2 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\Controller.php(178): yii\\base\\InlineAction-&gt;runWithParams(Array)<br />\n#3 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\Module.php(552): yii\\base\\Controller-&gt;runAction(&#039;create&#039;, Array)<br />\n#4 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\web\\Application.php(103): yii\\base\\Module-&gt;runAction(&#039;alumnos/create&#039;, Array)<br />\n#5 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\Application.php(384): yii\\web\\Application-&gt;handleRequest(Object(yii\\web\\Request))<br />\n#6 C:\\wamp64\\www\\basico\\web\\index.php(12): yii\\base\\Application-&gt;run()<br />\n#7 {main}', 1, '2022-04-29 13:50:11'),
(11, 'alumnos/create', 'Exception: Codigo must be an integer. in C:\\wamp64\\www\\basico\\controllers\\AlumnosController.php:82<br />\nStack trace:<br />\n#0 [internal function]: app\\controllers\\AlumnosController-&gt;actionCreate()<br />\n#1 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\InlineAction.php(57): call_user_func_array(Array, Array)<br />\n#2 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\Controller.php(178): yii\\base\\InlineAction-&gt;runWithParams(Array)<br />\n#3 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\Module.php(552): yii\\base\\Controller-&gt;runAction(&#039;create&#039;, Array)<br />\n#4 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\web\\Application.php(103): yii\\base\\Module-&gt;runAction(&#039;alumnos/create&#039;, Array)<br />\n#5 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\Application.php(384): yii\\web\\Application-&gt;handleRequest(Object(yii\\web\\Request))<br />\n#6 C:\\wamp64\\www\\basico\\web\\index.php(12): yii\\base\\Application-&gt;run()<br />\n#7 {main}', 1, '2022-04-29 13:55:44'),
(12, 'jurado/create', 'Exception: The format of Fecha Ingreso is invalid.&lt;br /&gt;The format of Fecha Modificación is invalid. in C:\\wamp64\\www\\basico\\controllers\\JuradoController.php:82<br />\nStack trace:<br />\n#0 [internal function]: app\\controllers\\JuradoController-&gt;actionCreate()<br />\n#1 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\InlineAction.php(57): call_user_func_array(Array, Array)<br />\n#2 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\Controller.php(178): yii\\base\\InlineAction-&gt;runWithParams(Array)<br />\n#3 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\Module.php(552): yii\\base\\Controller-&gt;runAction(&#039;create&#039;, Array)<br />\n#4 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\web\\Application.php(103): yii\\base\\Module-&gt;runAction(&#039;jurado/create&#039;, Array)<br />\n#5 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\Application.php(384): yii\\web\\Application-&gt;handleRequest(Object(yii\\web\\Request))<br />\n#6 C:\\wamp64\\www\\basico\\web\\index.php(12): yii\\base\\Application-&gt;run()<br />\n#7 {main}', 1, '2022-04-29 14:07:54'),
(13, 'jurado/create', 'Exception: The format of Fecha Ingreso is invalid.&lt;br /&gt;The format of Fecha Modificación is invalid. in C:\\wamp64\\www\\basico\\controllers\\JuradoController.php:82<br />\nStack trace:<br />\n#0 [internal function]: app\\controllers\\JuradoController-&gt;actionCreate()<br />\n#1 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\InlineAction.php(57): call_user_func_array(Array, Array)<br />\n#2 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\Controller.php(178): yii\\base\\InlineAction-&gt;runWithParams(Array)<br />\n#3 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\Module.php(552): yii\\base\\Controller-&gt;runAction(&#039;create&#039;, Array)<br />\n#4 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\web\\Application.php(103): yii\\base\\Module-&gt;runAction(&#039;jurado/create&#039;, Array)<br />\n#5 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\Application.php(384): yii\\web\\Application-&gt;handleRequest(Object(yii\\web\\Request))<br />\n#6 C:\\wamp64\\www\\basico\\web\\index.php(12): yii\\base\\Application-&gt;run()<br />\n#7 {main}', 1, '2022-04-29 14:10:12'),
(14, 'jurado/create', 'Exception: The format of Fecha Ingreso is invalid.&lt;br /&gt;The format of Fecha Modificación is invalid. in C:\\wamp64\\www\\basico\\controllers\\JuradoController.php:82<br />\nStack trace:<br />\n#0 [internal function]: app\\controllers\\JuradoController-&gt;actionCreate()<br />\n#1 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\InlineAction.php(57): call_user_func_array(Array, Array)<br />\n#2 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\Controller.php(178): yii\\base\\InlineAction-&gt;runWithParams(Array)<br />\n#3 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\Module.php(552): yii\\base\\Controller-&gt;runAction(&#039;create&#039;, Array)<br />\n#4 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\web\\Application.php(103): yii\\base\\Module-&gt;runAction(&#039;jurado/create&#039;, Array)<br />\n#5 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\Application.php(384): yii\\web\\Application-&gt;handleRequest(Object(yii\\web\\Request))<br />\n#6 C:\\wamp64\\www\\basico\\web\\index.php(12): yii\\base\\Application-&gt;run()<br />\n#7 {main}', 1, '2022-04-29 14:12:40'),
(15, 'tin-tipo-investigacion/create', 'Exception: Codigo cannot be blank. in C:\\wamp64\\www\\basico\\controllers\\TinTipoInvestigacionController.php:81<br />\nStack trace:<br />\n#0 [internal function]: app\\controllers\\TinTipoInvestigacionController-&gt;actionCreate()<br />\n#1 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\InlineAction.php(57): call_user_func_array(Array, Array)<br />\n#2 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\Controller.php(178): yii\\base\\InlineAction-&gt;runWithParams(Array)<br />\n#3 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\Module.php(552): yii\\base\\Controller-&gt;runAction(&#039;create&#039;, Array)<br />\n#4 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\web\\Application.php(103): yii\\base\\Module-&gt;runAction(&#039;tin-tipo-invest...&#039;, Array)<br />\n#5 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\Application.php(384): yii\\web\\Application-&gt;handleRequest(Object(yii\\web\\Request))<br />\n#6 C:\\wamp64\\www\\basico\\web\\index.php(12): yii\\base\\Application-&gt;run()<br />\n#7 {main}', 1, '2022-04-29 15:07:03'),
(16, 'alumnos/create', 'yii\\base\\UnknownPropertyException: Getting unknown property: app\\models\\AlmAlumnos::alm_codcil in C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\Component.php:154<br />\nStack trace:<br />\n#0 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\db\\BaseActiveRecord.php(296): yii\\base\\Component-&gt;__get(&#039;alm_codcil&#039;)<br />\n#1 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\validators\\Validator.php(307): yii\\db\\BaseActiveRecord-&gt;__get(&#039;alm_codcil&#039;)<br />\n#2 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\validators\\Validator.php(261): yii\\validators\\Validator-&gt;validateAttribute(Object(app\\models\\AlmAlumnos), &#039;alm_codcil&#039;)<br />\n#3 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\Model.php(367): yii\\validators\\Validator-&gt;validateAttributes(Object(app\\models\\AlmAlumnos), Array)<br />\n#4 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\db\\ActiveRecord.php(564): yii\\base\\Model-&gt;validate(Array)<br />\n#5 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\db\\BaseActiveRecord.php(676): yii\\db\\ActiveRecord-&gt;insert(true, NULL)<br />\n#6 C:\\wamp64\\www\\basico\\controllers\\AlumnosController.php(81): yii\\db\\BaseActiveRecord-&gt;save()<br />\n#7 [internal function]: app\\controllers\\AlumnosController-&gt;actionCreate()<br />\n#8 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\InlineAction.php(57): call_user_func_array(Array, Array)<br />\n#9 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\Controller.php(178): yii\\base\\InlineAction-&gt;runWithParams(Array)<br />\n#10 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\Module.php(552): yii\\base\\Controller-&gt;runAction(&#039;create&#039;, Array)<br />\n#11 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\web\\Application.php(103): yii\\base\\Module-&gt;runAction(&#039;alumnos/create&#039;, Array)<br />\n#12 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\Application.php(384): yii\\web\\Application-&gt;handleRequest(Object(yii\\web\\Request))<br />\n#13 C:\\wamp64\\www\\basico\\web\\index.php(12): yii\\base\\Application-&gt;run()<br />\n#14 {main}', 1, '2022-05-19 12:35:49'),
(17, 'alumnos/create', 'PDOException: SQLSTATE[HY000]: General error: 1364 Field &#039;alm_codgrp&#039; doesn&#039;t have a default value in C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\db\\Command.php:1302<br />\r\nStack trace:<br />\r\n#0 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\db\\Command.php(1302): PDOStatement-&gt;execute()<br />\r\n#1 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\db\\Command.php(1102): yii\\db\\Command-&gt;internalExecute(&#039;INSERT INTO `al...&#039;)<br />\r\n#2 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\db\\Schema.php(431): yii\\db\\Command-&gt;execute()<br />\r\n#3 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\db\\ActiveRecord.php(604): yii\\db\\Schema-&gt;insert(&#039;alm_alumnos&#039;, Array)<br />\r\n#4 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\db\\ActiveRecord.php(570): yii\\db\\ActiveRecord-&gt;insertInternal(NULL)<br />\r\n#5 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\db\\BaseActiveRecord.php(676): yii\\db\\ActiveRecord-&gt;insert(true, NULL)<br />\r\n#6 C:\\wamp64\\www\\basico\\controllers\\AlumnosController.php(81): yii\\db\\BaseActiveRecord-&gt;save()<br />\r\n#7 [internal function]: app\\controllers\\AlumnosController-&gt;actionCreate()<br />\r\n#8 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\InlineAction.php(57): call_user_func_array(Array, Array)<br />\r\n#9 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\Controller.php(178): yii\\base\\InlineAction-&gt;runWithParams(Array)<br />\r\n#10 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\Module.php(552): yii\\base\\Controller-&gt;runAction(&#039;create&#039;, Array)<br />\r\n#11 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\web\\Application.php(103): yii\\base\\Module-&gt;runAction(&#039;alumnos/create&#039;, Array)<br />\r\n#12 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\Application.php(384): yii\\web\\Application-&gt;handleRequest(Object(yii\\web\\Request))<br />\r\n#13 C:\\wamp64\\www\\basico\\web\\index.php(12): yii\\base\\Application-&gt;run()<br />\r\n#14 {main}<br />\r\n<br />\r\nNext yii\\db\\Exception: SQLSTATE[HY000]: General error: 1364 Field &#039;alm_codgrp&#039; doesn&#039;t have a default value<br />\r\nThe SQL being executed was: INSERT INTO `alm_alumnos` (`alm_carnet`, `alm_codcar`, `alm_nombres`, `alm_apellidos`, `alm_anio`, `alm_telefono`, `alm_email`, `alm_direccion`, `alm_codigo`, `alm_fecha_ing`, `alm_fecha_mod`, `alm_codusr`) VALUES (&#039;U20181261&#039;, 1, &#039;Gerson Arlindo&#039;, &#039;Calis&#039;, 2022, &#039;76731965&#039;, &#039;gerson50039@gmail.com&#039;, &#039;Av. Nueva España, Barrio Nueva España Chinameca San Miguel&#039;, 1, &#039;2022-05-19 14:49:08&#039;, &#039;2022-05-19 14:49:08&#039;, 1) in C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\db\\Schema.php:676<br />\r\nStack trace:<br />\r\n#0 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\db\\Command.php(1307): yii\\db\\Schema-&gt;convertException(Object(PDOException), &#039;INSERT INTO `al...&#039;)<br />\r\n#1 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\db\\Command.php(1102): yii\\db\\Command-&gt;internalExecute(&#039;INSERT INTO `al...&#039;)<br />\r\n#2 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\db\\Schema.php(431): yii\\db\\Command-&gt;execute()<br />\r\n#3 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\db\\ActiveRecord.php(604): yii\\db\\Schema-&gt;insert(&#039;alm_alumnos&#039;, Array)<br />\r\n#4 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\db\\ActiveRecord.php(570): yii\\db\\ActiveRecord-&gt;insertInternal(NULL)<br />\r\n#5 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\db\\BaseActiveRecord.php(676): yii\\db\\ActiveRecord-&gt;insert(true, NULL)<br />\r\n#6 C:\\wamp64\\www\\basico\\controllers\\AlumnosController.php(81): yii\\db\\BaseActiveRecord-&gt;save()<br />\r\n#7 [internal function]: app\\controllers\\AlumnosController-&gt;actionCreate()<br />\r\n#8 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\InlineAction.php(57): call_user_func_array(Array, Array)<br />\r\n#9 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\Controller.php(178): yii\\base\\InlineAction-&gt;runWithParams(Array)<br />\r\n#10 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\Module.php(552): yii\\base\\Controller-&gt;runAction(&#039;create&#039;, Array)<br />\r\n#11 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\web\\Application.php(103): yii\\base\\Module-&gt;runAction(&#039;alumnos/create&#039;, Array)<br />\r\n#12 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\Application.php(384): yii\\web\\Application-&gt;handleRequest(Object(yii\\web\\Request))<br />\r\n#13 C:\\wamp64\\www\\basico\\web\\index.php(12): yii\\base\\Application-&gt;run()<br />\r\n#14 {main}<br />\r\nAdditional Information:<br />\r\nArray<br />\r\n(<br />\r\n    [0] =&gt; HY000<br />\r\n    [1] =&gt; 1364<br />\r\n    [2] =&gt; Field &#039;alm_codgrp&#039; doesn&#039;t have a default value<br />\r\n)<br />\r\n', 1, '2022-05-19 14:49:08'),
(18, 'alumnos/create', 'PDOException: SQLSTATE[HY000]: General error: 1364 Field &#039;alm_codgrp&#039; doesn&#039;t have a default value in C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\db\\Command.php:1302<br />\r\nStack trace:<br />\r\n#0 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\db\\Command.php(1302): PDOStatement-&gt;execute()<br />\r\n#1 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\db\\Command.php(1102): yii\\db\\Command-&gt;internalExecute(&#039;INSERT INTO `al...&#039;)<br />\r\n#2 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\db\\Schema.php(431): yii\\db\\Command-&gt;execute()<br />\r\n#3 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\db\\ActiveRecord.php(604): yii\\db\\Schema-&gt;insert(&#039;alm_alumnos&#039;, Array)<br />\r\n#4 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\db\\ActiveRecord.php(570): yii\\db\\ActiveRecord-&gt;insertInternal(NULL)<br />\r\n#5 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\db\\BaseActiveRecord.php(676): yii\\db\\ActiveRecord-&gt;insert(true, NULL)<br />\r\n#6 C:\\wamp64\\www\\basico\\controllers\\AlumnosController.php(81): yii\\db\\BaseActiveRecord-&gt;save()<br />\r\n#7 [internal function]: app\\controllers\\AlumnosController-&gt;actionCreate()<br />\r\n#8 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\InlineAction.php(57): call_user_func_array(Array, Array)<br />\r\n#9 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\Controller.php(178): yii\\base\\InlineAction-&gt;runWithParams(Array)<br />\r\n#10 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\Module.php(552): yii\\base\\Controller-&gt;runAction(&#039;create&#039;, Array)<br />\r\n#11 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\web\\Application.php(103): yii\\base\\Module-&gt;runAction(&#039;alumnos/create&#039;, Array)<br />\r\n#12 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\Application.php(384): yii\\web\\Application-&gt;handleRequest(Object(yii\\web\\Request))<br />\r\n#13 C:\\wamp64\\www\\basico\\web\\index.php(12): yii\\base\\Application-&gt;run()<br />\r\n#14 {main}<br />\r\n<br />\r\nNext yii\\db\\Exception: SQLSTATE[HY000]: General error: 1364 Field &#039;alm_codgrp&#039; doesn&#039;t have a default value<br />\r\nThe SQL being executed was: INSERT INTO `alm_alumnos` (`alm_carnet`, `alm_codcar`, `alm_nombres`, `alm_apellidos`, `alm_anio`, `alm_telefono`, `alm_email`, `alm_direccion`, `alm_codigo`, `alm_fecha_ing`, `alm_fecha_mod`, `alm_codusr`) VALUES (&#039;U20181261&#039;, 1, &#039;Gerson Arlindo&#039;, &#039;Calis&#039;, 2022, &#039;76731965&#039;, &#039;gerson50039@gmail.com&#039;, &#039;Av. Nueva España, Barrio Nueva España Chinameca San Miguel&#039;, 1, &#039;2022-05-19 14:56:10&#039;, &#039;2022-05-19 14:56:10&#039;, 1) in C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\db\\Schema.php:676<br />\r\nStack trace:<br />\r\n#0 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\db\\Command.php(1307): yii\\db\\Schema-&gt;convertException(Object(PDOException), &#039;INSERT INTO `al...&#039;)<br />\r\n#1 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\db\\Command.php(1102): yii\\db\\Command-&gt;internalExecute(&#039;INSERT INTO `al...&#039;)<br />\r\n#2 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\db\\Schema.php(431): yii\\db\\Command-&gt;execute()<br />\r\n#3 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\db\\ActiveRecord.php(604): yii\\db\\Schema-&gt;insert(&#039;alm_alumnos&#039;, Array)<br />\r\n#4 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\db\\ActiveRecord.php(570): yii\\db\\ActiveRecord-&gt;insertInternal(NULL)<br />\r\n#5 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\db\\BaseActiveRecord.php(676): yii\\db\\ActiveRecord-&gt;insert(true, NULL)<br />\r\n#6 C:\\wamp64\\www\\basico\\controllers\\AlumnosController.php(81): yii\\db\\BaseActiveRecord-&gt;save()<br />\r\n#7 [internal function]: app\\controllers\\AlumnosController-&gt;actionCreate()<br />\r\n#8 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\InlineAction.php(57): call_user_func_array(Array, Array)<br />\r\n#9 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\Controller.php(178): yii\\base\\InlineAction-&gt;runWithParams(Array)<br />\r\n#10 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\Module.php(552): yii\\base\\Controller-&gt;runAction(&#039;create&#039;, Array)<br />\r\n#11 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\web\\Application.php(103): yii\\base\\Module-&gt;runAction(&#039;alumnos/create&#039;, Array)<br />\r\n#12 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\Application.php(384): yii\\web\\Application-&gt;handleRequest(Object(yii\\web\\Request))<br />\r\n#13 C:\\wamp64\\www\\basico\\web\\index.php(12): yii\\base\\Application-&gt;run()<br />\r\n#14 {main}<br />\r\nAdditional Information:<br />\r\nArray<br />\r\n(<br />\r\n    [0] =&gt; HY000<br />\r\n    [1] =&gt; 1364<br />\r\n    [2] =&gt; Field &#039;alm_codgrp&#039; doesn&#039;t have a default value<br />\r\n)<br />\r\n', 1, '2022-05-19 14:56:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuarios`
--

DROP TABLE IF EXISTS `tbl_usuarios`;
CREATE TABLE IF NOT EXISTS `tbl_usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `imagen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_usuarios`
--

INSERT INTO `tbl_usuarios` (`id_usuario`, `username`, `nombre`, `apellido`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `imagen`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(1, 'Admin', 'Admin', 'Admin', '_1PYpqjAzVUCtN1a5EqQURckx5zzhhre', '$2y$13$zcjj/B1yOR7bVkxGEz4J7eu5NqZ3PJqCDMXpmSd2MVSAmLibH2pbq', NULL, 'Admin@admi.com', '/basico/web/avatars/default.png', 1, 1647823031, 1647823031, NULL),
(2, 'test', 'Test', 'Test', 'T8C4W6ypkrWTOK6n07zKgcv1_uhEcsUv', '$2y$13$3naIglxZZ.tAYb/PcsBEWuxxw.V.qGJAGC1/eb9/x/SPHFFhXe6rq', NULL, 'test@test.com', '/basico/web/avatars/default.png', 1, 1647823226, 1647823226, NULL),
(3, 'arlindo', 'Gerson', 'Gonzalez', 'XLfx3VeHAhP8LVQ9L5l3d--yQ13HyDXm', '$2y$13$qFkCZRmcTI25c8fqzIkJperYSBUSehRB/NI8icTOR9M1hpz17W4AC', NULL, 'arlindo123@gmail.com', '/veterinaria-main/web/avatars/default.png', 1, 1652150773, 1652150773, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tes_tesis`
--

DROP TABLE IF EXISTS `tes_tesis`;
CREATE TABLE IF NOT EXISTS `tes_tesis` (
  `tes_codigo` int(11) NOT NULL,
  `test_tema` varchar(500) DEFAULT NULL,
  `tes_codtin` int(11) NOT NULL,
  `tes_fecha_ing` datetime NOT NULL,
  `tes_fecha_mod` datetime NOT NULL,
  `tes_codusr` int(11) NOT NULL,
  PRIMARY KEY (`tes_codigo`),
  KEY `tes_codtin` (`tes_codtin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tes_tesis`
--

INSERT INTO `tes_tesis` (`tes_codigo`, `test_tema`, `tes_codtin`, `tes_fecha_ing`, `tes_fecha_mod`, `tes_codusr`) VALUES
(1, 'Tema 1', 102, '2022-04-29 16:28:22', '2022-04-29 16:28:22', 1),
(2, 'Tema 2 Prueba', 101, '2022-05-06 19:40:14', '2022-05-06 19:40:14', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tin_tipo_investigacion`
--

DROP TABLE IF EXISTS `tin_tipo_investigacion`;
CREATE TABLE IF NOT EXISTS `tin_tipo_investigacion` (
  `tin_codigo` int(11) NOT NULL,
  `tin_nombre` varchar(250) DEFAULT NULL,
  `tin_coduser` int(11) NOT NULL,
  `tin_fecha_ing` datetime NOT NULL,
  `tin_fecha_mod` datetime NOT NULL,
  PRIMARY KEY (`tin_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tin_tipo_investigacion`
--

INSERT INTO `tin_tipo_investigacion` (`tin_codigo`, `tin_nombre`, `tin_coduser`, `tin_fecha_ing`, `tin_fecha_mod`) VALUES
(101, 'Guía de Investigación Aplicada', 1, '2022-04-29 11:45:41', '2022-04-29 15:09:15'),
(102, 'Estudio de Factivilidad', 1, '2022-04-29 15:08:55', '2022-04-29 15:08:55');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alm_alumnos`
--
ALTER TABLE `alm_alumnos`
  ADD CONSTRAINT `alm_alumnos_ibfk_1` FOREIGN KEY (`alm_codcar`) REFERENCES `car_carrera` (`car_codigo`),
  ADD CONSTRAINT `alm_alumnos_ibfk_2` FOREIGN KEY (`alm_codgrp`) REFERENCES `grp_grupo` (`grp_codigo`);

--
-- Filtros para la tabla `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `car_carrera`
--
ALTER TABLE `car_carrera`
  ADD CONSTRAINT `car_carrera_ibfk_1` FOREIGN KEY (`car_codfac`) REFERENCES `fac_facultad` (`fac_codigo`);

--
-- Filtros para la tabla `grp_grupo`
--
ALTER TABLE `grp_grupo`
  ADD CONSTRAINT `grp_grupo_ibfk_1` FOREIGN KEY (`grp_codcar`) REFERENCES `car_carrera` (`car_codigo`),
  ADD CONSTRAINT `grp_grupo_ibfk_2` FOREIGN KEY (`grp_tipo`) REFERENCES `tin_tipo_investigacion` (`tin_codigo`);

--
-- Filtros para la tabla `tbl_error_log`
--
ALTER TABLE `tbl_error_log`
  ADD CONSTRAINT `tbl_error_log_ibfk_1` FOREIGN KEY (`us_id`) REFERENCES `tbl_usuarios` (`id_usuario`);

--
-- Filtros para la tabla `tes_tesis`
--
ALTER TABLE `tes_tesis`
  ADD CONSTRAINT `tes_tesis_ibfk_1` FOREIGN KEY (`tes_codtin`) REFERENCES `tin_tipo_investigacion` (`tin_codigo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
