-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 12-04-2022 a las 20:34:58
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
  `alm_codcil` int(11) NOT NULL,
  `alm_carnet` varchar(12) DEFAULT NULL,
  `alm_nombres` varchar(250) DEFAULT NULL,
  `alm_apellidos` varchar(250) DEFAULT NULL,
  `alm_anio` tinyint(4) DEFAULT NULL,
  `alm_telefono` varchar(9) NOT NULL,
  `alm_email` varchar(50) NOT NULL,
  `alm_direccion` varchar(255) NOT NULL,
  `alm_fecha_ing` datetime NOT NULL,
  `alm_fecha_mod` datetime NOT NULL,
  `alm_codusr` int(11) NOT NULL,
  PRIMARY KEY (`alm_codigo`),
  KEY `alm_codcar` (`alm_codcar`),
  KEY `alm_codcil` (`alm_codcil`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `ase_anio` int(11) NOT NULL,
  `ase_carnet` varchar(50) NOT NULL,
  `ase_email` varchar(100) NOT NULL,
  `ase_telefono` varchar(9) NOT NULL,
  `ase_direccion` varchar(255) NOT NULL,
  `ase_fecha_ing` datetime NOT NULL,
  `ase_fecha_mod` datetime NOT NULL,
  `ase_codusr` int(11) NOT NULL,
  PRIMARY KEY (`ase_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
('/carrera/*', 2, NULL, NULL, NULL, 1647828611, 1647828611),
('/debug/*', 2, NULL, NULL, NULL, 1647828833, 1647828833),
('/facultad/*', 2, NULL, NULL, NULL, 1647828779, 1647828779),
('/gii/*', 2, NULL, NULL, NULL, 1647828858, 1647828858),
('/rbac/*', 2, NULL, NULL, NULL, 1647828820, 1647828820),
('/site/*', 2, NULL, NULL, NULL, 1647828620, 1647828620),
('/usuarios/*', 2, NULL, NULL, NULL, 1647828801, 1647828801),
('/usuarios/update', 2, NULL, NULL, NULL, 1647830107, 1647830107),
('/usuarios/view', 2, NULL, NULL, NULL, 1647830102, 1647830102),
('MasterAccess', 2, 'Permiso para acceder a todas las rutas del sistema como superAdmin', NULL, NULL, 1647828967, 1647828967),
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
('MasterAccess', '/carrera/*'),
('UsuarioAcces', '/carrera/*'),
('MasterAccess', '/debug/*'),
('MasterAccess', '/facultad/*'),
('UsuarioAcces', '/facultad/*'),
('MasterAccess', '/gii/*'),
('MasterAccess', '/rbac/*'),
('MasterAccess', '/site/*'),
('UsuarioAcces', '/site/*'),
('MasterAccess', '/usuarios/*'),
('UsuarioAcces', '/usuarios/update'),
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
(23456, 10001, 'Ingeniería en Desarrollo de Software', '2022-03-04 18:11:27', '2022-03-04 18:11:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cil_ciclo`
--

DROP TABLE IF EXISTS `cil_ciclo`;
CREATE TABLE IF NOT EXISTS `cil_ciclo` (
  `cil_codigo` int(11) NOT NULL,
  `cil_nombre` varchar(100) DEFAULT NULL,
  `cil_anio` int(11) DEFAULT NULL,
  `cil_fecha_ing` datetime NOT NULL,
  `cil_fecha_mod` datetime NOT NULL,
  `cil_codusr` int(11) NOT NULL,
  PRIMARY KEY (`cil_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(10001, 'Ingeniería y Arquitectura Editada', '2022-03-03 00:00:00', '2022-03-04 18:08:46'),
(10003, 'Facultad de Ciencias Juridicas', '2022-03-04 17:44:25', '2022-03-04 17:44:25'),
(10008, 'Facultad de Ciencias Agronómicas', '2022-03-04 18:09:33', '2022-03-04 18:09:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gru_grupos`
--

DROP TABLE IF EXISTS `gru_grupos`;
CREATE TABLE IF NOT EXISTS `gru_grupos` (
  `gru_codigo` int(11) NOT NULL,
  `gru_codalm` int(11) NOT NULL,
  `gru_codtes` int(11) NOT NULL,
  `gru_codase` int(11) NOT NULL,
  `gru_codjur` int(11) NOT NULL,
  `gru_fecha_ing` datetime NOT NULL,
  `gru_fecha_mod` datetime NOT NULL,
  PRIMARY KEY (`gru_codigo`),
  KEY `gru_codtes` (`gru_codtes`),
  KEY `gru_codalm` (`gru_codalm`),
  KEY `gru_codase` (`gru_codase`),
  KEY `gru_codjur` (`gru_codjur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_error_log`
--

INSERT INTO `tbl_error_log` (`id_error_log`, `controller`, `mensaje`, `us_id`, `fecha`) VALUES
(1, 'carrera/create', 'Exception: Codigo &quot;23456&quot; has already been taken. in C:\\wamp64\\www\\basico\\controllers\\CarreraController.php:82<br />\nStack trace:<br />\n#0 [internal function]: app\\controllers\\CarreraController-&gt;actionCreate()<br />\n#1 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\InlineAction.php(57): call_user_func_array(Array, Array)<br />\n#2 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\Controller.php(178): yii\\base\\InlineAction-&gt;runWithParams(Array)<br />\n#3 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\Module.php(552): yii\\base\\Controller-&gt;runAction(&#039;create&#039;, Array)<br />\n#4 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\web\\Application.php(103): yii\\base\\Module-&gt;runAction(&#039;carrera/create&#039;, Array)<br />\n#5 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\Application.php(384): yii\\web\\Application-&gt;handleRequest(Object(yii\\web\\Request))<br />\n#6 C:\\wamp64\\www\\basico\\web\\index.php(12): yii\\base\\Application-&gt;run()<br />\n#7 {main}', 1, '2022-03-20 20:30:45'),
(2, 'carrera/create', 'PDOException: SQLSTATE[22007]: Invalid datetime format: 1292 Incorrect datetime value: &#039;202022Sundaypm 030000003202022&#039; for column &#039;car_fecha_mod&#039; at row 1 in C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\db\\Command.php:1302<br />\r\nStack trace:<br />\r\n#0 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\db\\Command.php(1302): PDOStatement-&gt;execute()<br />\r\n#1 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\db\\Command.php(1102): yii\\db\\Command-&gt;internalExecute(&#039;INSERT INTO `ca...&#039;)<br />\r\n#2 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\db\\Schema.php(431): yii\\db\\Command-&gt;execute()<br />\r\n#3 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\db\\ActiveRecord.php(604): yii\\db\\Schema-&gt;insert(&#039;car_carrera&#039;, Array)<br />\r\n#4 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\db\\ActiveRecord.php(570): yii\\db\\ActiveRecord-&gt;insertInternal(NULL)<br />\r\n#5 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\db\\BaseActiveRecord.php(676): yii\\db\\ActiveRecord-&gt;insert(true, NULL)<br />\r\n#6 C:\\wamp64\\www\\basico\\controllers\\CarreraController.php(81): yii\\db\\BaseActiveRecord-&gt;save()<br />\r\n#7 [internal function]: app\\controllers\\CarreraController-&gt;actionCreate()<br />\r\n#8 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\InlineAction.php(57): call_user_func_array(Array, Array)<br />\r\n#9 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\Controller.php(178): yii\\base\\InlineAction-&gt;runWithParams(Array)<br />\r\n#10 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\Module.php(552): yii\\base\\Controller-&gt;runAction(&#039;create&#039;, Array)<br />\r\n#11 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\web\\Application.php(103): yii\\base\\Module-&gt;runAction(&#039;carrera/create&#039;, Array)<br />\r\n#12 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\Application.php(384): yii\\web\\Application-&gt;handleRequest(Object(yii\\web\\Request))<br />\r\n#13 C:\\wamp64\\www\\basico\\web\\index.php(12): yii\\base\\Application-&gt;run()<br />\r\n#14 {main}<br />\r\n<br />\r\nNext yii\\db\\Exception: SQLSTATE[22007]: Invalid datetime format: 1292 Incorrect datetime value: &#039;202022Sundaypm 030000003202022&#039; for column &#039;car_fecha_mod&#039; at row 1<br />\r\nThe SQL being executed was: INSERT INTO `car_carrera` (`car_codigo`, `car_codfac`, `car_nombre`, `car_fecha_ing`, `car_fecha_mod`) VALUES (5534443, 10003, &#039;zzzzz&#039;, &#039;2022-03-20 20:45:41&#039;, &#039;202022Sundaypm 030000003202022&#039;) in C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\db\\Schema.php:676<br />\r\nStack trace:<br />\r\n#0 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\db\\Command.php(1307): yii\\db\\Schema-&gt;convertException(Object(PDOException), &#039;INSERT INTO `ca...&#039;)<br />\r\n#1 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\db\\Command.php(1102): yii\\db\\Command-&gt;internalExecute(&#039;INSERT INTO `ca...&#039;)<br />\r\n#2 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\db\\Schema.php(431): yii\\db\\Command-&gt;execute()<br />\r\n#3 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\db\\ActiveRecord.php(604): yii\\db\\Schema-&gt;insert(&#039;car_carrera&#039;, Array)<br />\r\n#4 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\db\\ActiveRecord.php(570): yii\\db\\ActiveRecord-&gt;insertInternal(NULL)<br />\r\n#5 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\db\\BaseActiveRecord.php(676): yii\\db\\ActiveRecord-&gt;insert(true, NULL)<br />\r\n#6 C:\\wamp64\\www\\basico\\controllers\\CarreraController.php(81): yii\\db\\BaseActiveRecord-&gt;save()<br />\r\n#7 [internal function]: app\\controllers\\CarreraController-&gt;actionCreate()<br />\r\n#8 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\InlineAction.php(57): call_user_func_array(Array, Array)<br />\r\n#9 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\Controller.php(178): yii\\base\\InlineAction-&gt;runWithParams(Array)<br />\r\n#10 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\Module.php(552): yii\\base\\Controller-&gt;runAction(&#039;create&#039;, Array)<br />\r\n#11 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\web\\Application.php(103): yii\\base\\Module-&gt;runAction(&#039;carrera/create&#039;, Array)<br />\r\n#12 C:\\wamp64\\www\\basico\\vendor\\yiisoft\\yii2\\base\\Application.php(384): yii\\web\\Application-&gt;handleRequest(Object(yii\\web\\Request))<br />\r\n#13 C:\\wamp64\\www\\basico\\web\\index.php(12): yii\\base\\Application-&gt;run()<br />\r\n#14 {main}<br />\r\nAdditional Information:<br />\r\nArray<br />\r\n(<br />\r\n    [0] =&gt; 22007<br />\r\n    [1] =&gt; 1292<br />\r\n    [2] =&gt; Incorrect datetime value: &#039;202022Sundaypm 030000003202022&#039; for column &#039;car_fecha_mod&#039; at row 1<br />\r\n)<br />\r\n', 1, '2022-03-20 20:45:41');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_usuarios`
--

INSERT INTO `tbl_usuarios` (`id_usuario`, `username`, `nombre`, `apellido`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `imagen`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(1, 'Admin', 'Admin', 'Admin', '_1PYpqjAzVUCtN1a5EqQURckx5zzhhre', '$2y$13$zcjj/B1yOR7bVkxGEz4J7eu5NqZ3PJqCDMXpmSd2MVSAmLibH2pbq', NULL, 'Admin@admi.com', '/basico/web/avatars/default.png', 1, 1647823031, 1647823031, NULL),
(2, 'test', 'Test', 'Test', 'T8C4W6ypkrWTOK6n07zKgcv1_uhEcsUv', '$2y$13$3naIglxZZ.tAYb/PcsBEWuxxw.V.qGJAGC1/eb9/x/SPHFFhXe6rq', NULL, 'test@test.com', '/basico/web/avatars/default.png', 1, 1647823226, 1647823226, NULL);

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tin_tipo_investigacion`
--

DROP TABLE IF EXISTS `tin_tipo_investigacion`;
CREATE TABLE IF NOT EXISTS `tin_tipo_investigacion` (
  `tin_codigo` int(11) NOT NULL,
  `tin_nombre` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`tin_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alm_alumnos`
--
ALTER TABLE `alm_alumnos`
  ADD CONSTRAINT `alm_alumnos_ibfk_1` FOREIGN KEY (`alm_codcar`) REFERENCES `car_carrera` (`car_codigo`),
  ADD CONSTRAINT `alm_alumnos_ibfk_2` FOREIGN KEY (`alm_codcil`) REFERENCES `cil_ciclo` (`cil_codigo`);

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
-- Filtros para la tabla `gru_grupos`
--
ALTER TABLE `gru_grupos`
  ADD CONSTRAINT `gru_grupos_ibfk_1` FOREIGN KEY (`gru_codtes`) REFERENCES `tes_tesis` (`tes_codigo`),
  ADD CONSTRAINT `gru_grupos_ibfk_2` FOREIGN KEY (`gru_codalm`) REFERENCES `alm_alumnos` (`alm_codigo`),
  ADD CONSTRAINT `gru_grupos_ibfk_3` FOREIGN KEY (`gru_codase`) REFERENCES `ase_asesores` (`ase_codigo`),
  ADD CONSTRAINT `gru_grupos_ibfk_4` FOREIGN KEY (`gru_codjur`) REFERENCES `jur_jurados` (`jur_codigo`);

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
