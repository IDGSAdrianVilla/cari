-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 27-06-2022 a las 11:02:51
-- Versión del servidor: 5.7.23-23
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `villasof_cari`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catpoblaciones`
--

CREATE TABLE `catpoblaciones` (
  `PKCatPoblaciones` int(10) UNSIGNED NOT NULL,
  `nombrePoblacion` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codigoPostal` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fechaAlta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Activo` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `catpoblaciones`
--

INSERT INTO `catpoblaciones` (`PKCatPoblaciones`, `nombrePoblacion`, `codigoPostal`, `fechaAlta`, `Activo`) VALUES
(1, 'Acazulco', '', '2022-06-25 04:57:41', 1),
(2, 'Agua Blanca', '', '2022-06-25 04:57:41', 1),
(3, 'Ahuatenco', '', '2022-06-25 04:57:41', 1),
(4, 'Almaya', '', '2022-06-25 04:57:41', 1),
(5, 'Almoloya del Rio', '', '2022-06-25 04:57:41', 1),
(6, 'Amate cuernavaca', '', '2022-06-25 04:57:41', 1),
(7, 'Arcos', '', '2022-06-25 04:57:41', 1),
(8, 'Atlantlacpac', '', '2022-06-25 04:57:41', 1),
(9, 'Atlantalpac', '', '2022-06-25 04:57:41', 1),
(10, 'Atlapulco', '', '2022-06-25 04:57:41', 1),
(11, 'Calimaya', '', '2022-06-25 04:57:41', 1),
(12, 'Capulhuac', '', '2022-06-25 04:57:41', 1),
(13, 'Civac los robles cue', '', '2022-06-25 04:57:41', 1),
(14, 'Cuamilpa', '', '2022-06-25 04:57:41', 1),
(15, 'Coatepec centro', '', '2022-06-25 04:57:41', 1),
(16, 'Coyoltepec', '', '2022-06-25 04:57:41', 1),
(17, 'Cuernavaca', '', '2022-06-25 04:57:41', 1),
(18, 'El Mirasol', '', '2022-06-25 04:57:41', 1),
(19, 'El pedregal', '', '2022-06-25 04:57:41', 1),
(20, 'El potrero', '', '2022-06-25 04:57:41', 1),
(21, 'Fracc buen suceso', '', '2022-06-25 04:57:41', 1),
(22, 'Gualupita', '', '2022-06-25 04:57:41', 1),
(23, 'La Esperanza ', '', '2022-06-25 04:57:41', 1),
(24, 'La Florida', '', '2022-06-25 04:57:41', 1),
(25, 'La Marquesa', '', '2022-06-25 04:57:41', 1),
(26, 'La Pastoria', '', '2022-06-25 04:57:41', NULL),
(27, 'Lagunilla Chalma', '', '2022-06-25 04:57:41', NULL),
(28, 'Lagunilla Tlazala', '', '2022-06-25 04:57:41', NULL),
(29, 'Llano del Compromiso', '', '2022-06-25 04:57:41', NULL),
(30, 'Lomas de Teocaltzing', '', '2022-06-25 04:57:41', NULL),
(31, 'Meztitla', '', '2022-06-25 04:57:41', NULL),
(32, 'Morelos', '', '2022-06-25 04:57:41', NULL),
(33, 'Ocotenco', '', '2022-06-25 04:57:41', NULL),
(34, 'Ocoyoacac', '', '2022-06-25 04:57:41', NULL),
(35, 'Paseos del Rio', '', '2022-06-25 04:57:41', NULL),
(36, 'San Bartolo', '', '2022-06-25 04:57:41', NULL),
(37, 'San Jose Mezpa', '', '2022-06-25 04:57:41', NULL),
(38, 'San Juan Atzingo', '', '2022-06-25 04:57:41', NULL),
(39, 'San Lorenzo', '', '2022-06-25 04:57:41', NULL),
(40, 'San Lorenzo HUehueti', '', '2022-06-25 04:57:41', NULL),
(41, 'San Nicolas Coatepec', '', '2022-06-25 04:57:41', NULL),
(42, 'San Pedro Cholula', '', '2022-06-25 04:57:41', NULL),
(43, 'San Pedro Tlazizapán', '', '2022-06-25 04:57:41', NULL),
(44, 'Santa Ana', '', '2022-06-25 04:57:41', NULL),
(45, 'Santa Cruz Atizapan', '', '2022-06-25 04:57:41', NULL),
(46, 'Santa fe Mezapa', '', '2022-06-25 04:57:41', NULL),
(47, 'Santa Lucia', '', '2022-06-25 04:57:41', NULL),
(48, 'Santa Martha', '', '2022-06-25 04:57:41', NULL),
(49, 'Santiago Tianguisten', '', '2022-06-25 04:57:41', NULL),
(50, 'Sauces 2', '', '2022-06-25 04:57:41', NULL),
(51, 'Sauces Cuernavaca', '', '2022-06-25 04:57:41', NULL),
(52, 'Techmalinalli', '', '2022-06-25 04:57:41', NULL),
(53, 'Tenango Del valle', '', '2022-06-25 04:57:41', NULL),
(54, 'Tepetzingo', '', '2022-06-25 04:57:41', NULL),
(55, 'Texcalcavac', '', '2022-06-25 04:57:41', NULL),
(56, 'Tilapa', '', '2022-06-25 04:57:41', NULL),
(57, 'Tlacomulco', '', '2022-06-25 04:57:41', NULL),
(58, 'Tlacuitlapa', '', '2022-06-25 04:57:41', NULL),
(59, 'Tlaminca', '', '2022-06-25 04:57:41', NULL),
(60, 'Tlazala', '', '2022-06-25 04:57:41', NULL),
(61, 'Tultepec', '', '2022-06-25 04:57:41', NULL),
(62, 'Xalatlaco', '', '2022-06-25 04:57:41', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catproblemas`
--

CREATE TABLE `catproblemas` (
  `PKCatProblemas` int(10) UNSIGNED NOT NULL,
  `nombreProblema` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcionProblema` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fechaAlta` date NOT NULL,
  `Activo` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `catproblemas`
--

INSERT INTO `catproblemas` (`PKCatProblemas`, `nombreProblema`, `descripcionProblema`, `fechaAlta`, `Activo`) VALUES
(1, 'Antena movida', '\"\"', '2022-06-25', 1),
(2, 'Baja de servicio', '\"\"', '2022-06-25', 1),
(3, 'Cable dañado', '\"\"', '2022-06-25', 1),
(4, 'Cambio de domicilio', '\"\"', '2022-06-25', 1),
(5, 'El equipo no se enla', '\"\"', '2022-06-25', 1),
(6, 'Equipos dañados', '\"\"', '2022-06-25', 1),
(7, 'Instalacion de cámar', '\"\"', '2022-06-25', 1),
(8, 'Parametros bajos', '\"\"', '2022-06-25', 1),
(9, 'Prueba', '\"\"', '2022-06-25', 1),
(10, 'Reubicacion de equip', '\"\"', '2022-06-25', 1),
(11, 'Reubicacion de route', '\"\"', '2022-06-25', 1),
(12, 'Revisión de camaras', '\"\"', '2022-06-25', 1),
(13, 'Revisión de equipos', '\"\"', '2022-06-25', 1),
(14, 'Servicio intermitent', '\"\"', '2022-06-25', 1),
(15, 'Servicio lento', '\"\"', '2022-06-25', 1),
(16, 'Sin servicio', '\"\"', '2022-06-25', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catroles`
--

CREATE TABLE `catroles` (
  `PKCatRoles` int(10) UNSIGNED NOT NULL,
  `nombreRol` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcionRol` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fechaAlta` date NOT NULL,
  `Activo` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `catroles`
--

INSERT INTO `catroles` (`PKCatRoles`, `nombreRol`, `descripcionRol`, `fechaAlta`, `Activo`) VALUES
(1, 'Administrador', 'Administrador del sistema con todos los premisos sobre el mismo', '2022-03-01', 1),
(2, 'Técnico', 'Técnico instalador del servicio de fibra óptica o inalámbrico', '2022-04-04', 1),
(3, 'Servicio al cliente', 'Empleado en cargado de la atención al cliente', '2022-06-18', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catstatus`
--

CREATE TABLE `catstatus` (
  `PKCatStatus` int(10) UNSIGNED NOT NULL,
  `nombreStatus` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcionStatus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fechaAlta` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `catstatus`
--

INSERT INTO `catstatus` (`PKCatStatus`, `nombreStatus`, `descripcionStatus`, `fechaAlta`) VALUES
(1, 'Pendiente', 'asdasd', '2022-03-01'),
(2, 'Atendido', 'asdwed', '2022-05-03');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `generalclientes`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `generalclientes` (
`PKTblClientes` int(10) unsigned
,`nombreCliente` varchar(255)
,`apellidoPaterno` varchar(255)
,`apellidoMaterno` varchar(255)
,`telefono` varchar(10)
,`telefonoOpcional` varchar(255)
,`Activo` int(255)
,`PKTblDirecciones` int(10) unsigned
,`direccion` text
,`referencias` text
,`coordenadas` text
,`PKCatPoblaciones` int(10) unsigned
,`nombrePoblacion` varchar(20)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `generalreportes`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `generalreportes` (
`folio` int(10) unsigned
,`nombreCliente` varchar(255)
,`apellidoPaterno` varchar(255)
,`apellidoMaterno` varchar(255)
,`telefono` varchar(10)
,`telefonoOpcional` varchar(255)
,`PKCatPoblaciones` int(10) unsigned
,`nombrePoblacion` varchar(20)
,`coordenadas` text
,`direccion` text
,`referencias` text
,`PKCatProblemas` int(10) unsigned
,`nombreProblema` varchar(20)
,`descripcionProblema` varchar(255)
,`observaciones` varchar(255)
,`diagnostico` varchar(255)
,`solucion` varchar(255)
,`empleadoRecibio` varchar(511)
,`fechaAlta` varchar(10)
,`horaAlta` varchar(13)
,`empleadoActualizo` varchar(511)
,`fechaActualizacion` varchar(10)
,`horaActualizacion` varchar(13)
,`empleadoRealizo` varchar(511)
,`fechaAtencion` varchar(10)
,`horaAtencion` varchar(13)
,`PKTblEmpleadosAtediendo` int(10) unsigned
,`empleadoAtendiendo` varchar(511)
,`fechaAtendiendo` varchar(10)
,`horaAtendiendo` varchar(13)
,`status` varchar(20)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblclientes`
--

CREATE TABLE `tblclientes` (
  `PKTblClientes` int(10) UNSIGNED NOT NULL,
  `FKTblDirecciones` int(10) UNSIGNED NOT NULL,
  `nombreCliente` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidoPaterno` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apellidoMaterno` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefonoOpcional` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fechaAlta` date NOT NULL,
  `Activo` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tblclientes`
--

INSERT INTO `tblclientes` (`PKTblClientes`, `FKTblDirecciones`, `nombreCliente`, `apellidoPaterno`, `apellidoMaterno`, `telefono`, `telefonoOpcional`, `fechaAlta`, `Activo`) VALUES
(1, 1, 'Josue', 'Hernandez', 'Cayetano', '1234567891', NULL, '2022-06-25', 1),
(2, 2, 'Veronica', 'Montiel', 'Flores', '1234567891', NULL, '2022-06-25', 1),
(3, 3, 'Juliana', 'Ordoñez', 'Segura', '7228706543', NULL, '2022-06-25', 1),
(4, 4, 'Ximena', 'Gomez', 'Martinez', '7224559122', NULL, '2022-06-25', 1),
(5, 5, 'Yadira', 'Hernandez', 'Montiel', '7226698592', NULL, '2022-06-25', 1),
(6, 6, 'Alfredo', 'Gonzalez', 'Montiel', '7296358745', NULL, '2022-06-25', 1),
(7, 7, 'Luis Manuel', 'Perez', 'Montiel', '7226896321', NULL, '2022-06-25', 1),
(8, 8, 'Carlos Emanuel', 'Villa', 'Reyes', '7224564645', '5563453453', '2022-06-25', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbldetallereporte`
--

CREATE TABLE `tbldetallereporte` (
  `PKTblDetalleReporte` int(10) UNSIGNED NOT NULL,
  `diagnostico` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `solucion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `FKTblEmpleadosActualizo` int(10) UNSIGNED DEFAULT NULL,
  `fechaActualizacion` timestamp NULL DEFAULT NULL,
  `FKTblEmpleadosAtencion` int(10) UNSIGNED DEFAULT NULL,
  `fechaAtencion` timestamp NULL DEFAULT NULL,
  `FKTblEmpleadosAtediendo` int(10) UNSIGNED DEFAULT NULL,
  `fechaAtendiendo` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tbldetallereporte`
--

INSERT INTO `tbldetallereporte` (`PKTblDetalleReporte`, `diagnostico`, `solucion`, `FKTblEmpleadosActualizo`, `fechaActualizacion`, `FKTblEmpleadosAtencion`, `fechaAtencion`, `FKTblEmpleadosAtediendo`, `fechaAtendiendo`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbldirecciones`
--

CREATE TABLE `tbldirecciones` (
  `PKTblDirecciones` int(10) UNSIGNED NOT NULL,
  `FKCatPoblaciones` int(10) UNSIGNED NOT NULL,
  `coordenadas` text COLLATE utf8mb4_unicode_ci,
  `referencias` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tbldirecciones`
--

INSERT INTO `tbldirecciones` (`PKTblDirecciones`, `FKCatPoblaciones`, `coordenadas`, `referencias`, `direccion`) VALUES
(1, 18, '19°24\'34.8\"N 99°31\'38.6\"W', 'nbjjbh', 'jshhuygsdygdikddkdjnkc'),
(2, 4, '19°24\'34.8\"N 99°31\'38.6\"W', 'jioiu09', 'klkjoi90'),
(3, 25, '19°24\'34.8\"N 99°31\'38.6\"W', 'jhuhiu', 'kljopi'),
(4, 17, '19°24\'34.8\"N 99°31\'38.6\"W', 'mklmlk', 'kjoij'),
(5, 14, '19°24\'34.8\"N 99°31\'38.6\"W', 'jbhuyguy', 'jbh'),
(6, 10, '19°24\'34.8\"N 99°31\'38.6\"W', 'hbjhg', 'jhhiuhu'),
(7, 11, '19°24\'34.8\"N 99°31\'38.6\"W', 'lop0o0', 'jnjpok'),
(8, 19, NULL, 'asd asd asd', 'asd asda');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblempleados`
--

CREATE TABLE `tblempleados` (
  `PKTblEmpleados` int(10) UNSIGNED NOT NULL,
  `FKCatRoles` int(10) UNSIGNED NOT NULL,
  `nombreEmpleado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidoPaterno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidoMaterno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fechaAlta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `correo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contrasenia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Activo` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tblempleados`
--

INSERT INTO `tblempleados` (`PKTblEmpleados`, `FKCatRoles`, `nombreEmpleado`, `apellidoPaterno`, `apellidoMaterno`, `fechaAlta`, `correo`, `contrasenia`, `Activo`) VALUES
(1, 1, 'Adrián', 'Villa', 'Reyes', '2022-06-25 01:04:36', 'villa.isc.tec@gmail.com', 'oracle:1234', 1),
(2, 1, 'Fabiola', 'Hernandez', 'Montiel', '2022-06-25 13:20:24', 'fabi@gmail.com', 'lafabi.jpg', 1),
(3, 3, 'Isaac', 'Diaz', 'Asd', '2022-06-25 13:06:45', 'isaac@gmail.com', 'isaac:1234', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblreportes`
--

CREATE TABLE `tblreportes` (
  `PKTblReportes` int(10) UNSIGNED NOT NULL,
  `FKCatProblemas` int(10) UNSIGNED NOT NULL,
  `FKTblEmpleadosRecibio` int(10) UNSIGNED NOT NULL,
  `FKCatStatus` int(10) UNSIGNED NOT NULL,
  `FKTblDetalleReporte` int(10) UNSIGNED NOT NULL,
  `FKTblClientes` int(10) UNSIGNED NOT NULL,
  `descripcionProblema` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `observaciones` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fechaAlta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tblreportes`
--

INSERT INTO `tblreportes` (`PKTblReportes`, `FKCatProblemas`, `FKTblEmpleadosRecibio`, `FKCatStatus`, `FKTblDetalleReporte`, `FKTblClientes`, `descripcionProblema`, `observaciones`, `fechaAlta`) VALUES
(1, 12, 1, 1, 1, 5, 'No enciende una cámara', NULL, '2022-06-25 12:00:02'),
(2, 3, 1, 1, 2, 6, 'Lo mordió el perro', 'Se va tener que remplazar desde la antena al router', '2022-06-25 17:33:36'),
(3, 2, 3, 1, 3, 1, 'El cliente ya no requiere del servicio', 'Se va cambiar de domicilio', '2022-06-25 17:36:31'),
(4, 10, 2, 1, 4, 7, 'Intentaron mover los equipos y ahora ya no reciben el servicio', NULL, '2022-06-25 17:40:09'),
(5, 5, 3, 1, 5, 8, 'Al parecer movieron la antena y ya no tenemos acceso al equipo', NULL, '2022-06-25 17:40:53'),
(7, 15, 2, 1, 7, 4, 'La antena está un poco movida, se tiene que ajustar en el domicilio', NULL, '2022-06-25 18:22:41'),
(8, 7, 2, 1, 8, 2, 'Requiere paquete de 12 cámaras', NULL, '2022-06-25 18:24:14'),
(9, 9, 2, 1, 9, 3, 'Se agenda para prueba en el domicilio por la distancia qué hay', NULL, '2022-06-25 18:24:56');

-- --------------------------------------------------------

--
-- Estructura para la vista `generalclientes`
--
DROP TABLE IF EXISTS `generalclientes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `generalclientes`  AS SELECT `tblclientes`.`PKTblClientes` AS `PKTblClientes`, `tblclientes`.`nombreCliente` AS `nombreCliente`, `tblclientes`.`apellidoPaterno` AS `apellidoPaterno`, `tblclientes`.`apellidoMaterno` AS `apellidoMaterno`, `tblclientes`.`telefono` AS `telefono`, `tblclientes`.`telefonoOpcional` AS `telefonoOpcional`, `tblclientes`.`Activo` AS `Activo`, `tbldirecciones`.`PKTblDirecciones` AS `PKTblDirecciones`, `tbldirecciones`.`direccion` AS `direccion`, `tbldirecciones`.`referencias` AS `referencias`, `tbldirecciones`.`coordenadas` AS `coordenadas`, `catpoblaciones`.`PKCatPoblaciones` AS `PKCatPoblaciones`, `catpoblaciones`.`nombrePoblacion` AS `nombrePoblacion` FROM ((`tblclientes` join `tbldirecciones` on((`tbldirecciones`.`PKTblDirecciones` = `tblclientes`.`FKTblDirecciones`))) join `catpoblaciones` on((`catpoblaciones`.`PKCatPoblaciones` = `tbldirecciones`.`FKCatPoblaciones`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `generalreportes`
--
DROP TABLE IF EXISTS `generalreportes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `generalreportes`  AS SELECT `reporte`.`PKTblReportes` AS `folio`, `cliente`.`nombreCliente` AS `nombreCliente`, `cliente`.`apellidoPaterno` AS `apellidoPaterno`, `cliente`.`apellidoMaterno` AS `apellidoMaterno`, `cliente`.`telefono` AS `telefono`, `cliente`.`telefonoOpcional` AS `telefonoOpcional`, `poblacion`.`PKCatPoblaciones` AS `PKCatPoblaciones`, `poblacion`.`nombrePoblacion` AS `nombrePoblacion`, `direccion`.`coordenadas` AS `coordenadas`, `direccion`.`direccion` AS `direccion`, `direccion`.`referencias` AS `referencias`, `problema`.`PKCatProblemas` AS `PKCatProblemas`, `problema`.`nombreProblema` AS `nombreProblema`, `reporte`.`descripcionProblema` AS `descripcionProblema`, `reporte`.`observaciones` AS `observaciones`, `detallereporte`.`diagnostico` AS `diagnostico`, `detallereporte`.`solucion` AS `solucion`, concat(`empleadorecibio`.`nombreEmpleado`,' ',`empleadorecibio`.`apellidoPaterno`) AS `empleadoRecibio`, date_format(`reporte`.`fechaAlta`,'%d-%m-%Y') AS `fechaAlta`, date_format(`reporte`.`fechaAlta`,'%H:%i:%S') AS `horaAlta`, concat(`empleadoactualizo`.`nombreEmpleado`,' ',`empleadoactualizo`.`apellidoPaterno`) AS `empleadoActualizo`, date_format(`detallereporte`.`fechaActualizacion`,'%d-%m-%Y') AS `fechaActualizacion`, date_format(`detallereporte`.`fechaActualizacion`,'%H:%i:%S') AS `horaActualizacion`, concat(`empleadorealizo`.`nombreEmpleado`,' ',`empleadorealizo`.`apellidoPaterno`) AS `empleadoRealizo`, date_format(`detallereporte`.`fechaAtencion`,'%d-%m-%Y') AS `fechaAtencion`, date_format(`detallereporte`.`fechaAtencion`,'%H:%i:%S') AS `horaAtencion`, `empleadoatendiendo`.`PKTblEmpleados` AS `PKTblEmpleadosAtediendo`, concat(`empleadoatendiendo`.`nombreEmpleado`,' ',`empleadoatendiendo`.`apellidoPaterno`) AS `empleadoAtendiendo`, date_format(`detallereporte`.`fechaAtendiendo`,'%d-%m-%Y') AS `fechaAtendiendo`, date_format(`detallereporte`.`fechaAtendiendo`,'%H:%i:%S') AS `horaAtendiendo`, `status`.`nombreStatus` AS `status` FROM ((((((((((`tblreportes` `reporte` join `tblclientes` `cliente` on((`cliente`.`PKTblClientes` = `reporte`.`FKTblClientes`))) join `tbldirecciones` `direccion` on((`direccion`.`PKTblDirecciones` = `cliente`.`FKTblDirecciones`))) join `catpoblaciones` `poblacion` on((`poblacion`.`PKCatPoblaciones` = `direccion`.`FKCatPoblaciones`))) join `catproblemas` `problema` on((`problema`.`PKCatProblemas` = `reporte`.`FKCatProblemas`))) join `tbldetallereporte` `detallereporte` on((`detallereporte`.`PKTblDetalleReporte` = `reporte`.`FKTblDetalleReporte`))) left join `tblempleados` `empleadorecibio` on((`empleadorecibio`.`PKTblEmpleados` = `reporte`.`FKTblEmpleadosRecibio`))) left join `tblempleados` `empleadoactualizo` on((`empleadoactualizo`.`PKTblEmpleados` = `detallereporte`.`FKTblEmpleadosActualizo`))) left join `tblempleados` `empleadorealizo` on((`empleadorealizo`.`PKTblEmpleados` = `detallereporte`.`FKTblEmpleadosAtencion`))) left join `tblempleados` `empleadoatendiendo` on((`empleadoatendiendo`.`PKTblEmpleados` = `detallereporte`.`FKTblEmpleadosAtediendo`))) join `catstatus` `status` on((`status`.`PKCatStatus` = `reporte`.`FKCatStatus`))) ORDER BY `reporte`.`PKTblReportes` DESC ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `catpoblaciones`
--
ALTER TABLE `catpoblaciones`
  ADD PRIMARY KEY (`PKCatPoblaciones`);

--
-- Indices de la tabla `catproblemas`
--
ALTER TABLE `catproblemas`
  ADD PRIMARY KEY (`PKCatProblemas`);

--
-- Indices de la tabla `catroles`
--
ALTER TABLE `catroles`
  ADD PRIMARY KEY (`PKCatRoles`);

--
-- Indices de la tabla `catstatus`
--
ALTER TABLE `catstatus`
  ADD PRIMARY KEY (`PKCatStatus`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `tblclientes`
--
ALTER TABLE `tblclientes`
  ADD PRIMARY KEY (`PKTblClientes`),
  ADD KEY `tblclientes_fktbldirecciones_foreign` (`FKTblDirecciones`);

--
-- Indices de la tabla `tbldetallereporte`
--
ALTER TABLE `tbldetallereporte`
  ADD PRIMARY KEY (`PKTblDetalleReporte`),
  ADD KEY `tbldetallereporte_fktblempleadosactualizo_foreign` (`FKTblEmpleadosActualizo`),
  ADD KEY `tbldetallereporte_fktblempleadosatencion_foreign` (`FKTblEmpleadosAtencion`),
  ADD KEY `tbldetallereporte_fktblempleadosatediendo_foreign` (`FKTblEmpleadosAtediendo`);

--
-- Indices de la tabla `tbldirecciones`
--
ALTER TABLE `tbldirecciones`
  ADD PRIMARY KEY (`PKTblDirecciones`),
  ADD KEY `tbldirecciones_fkcatpoblaciones_foreign` (`FKCatPoblaciones`);

--
-- Indices de la tabla `tblempleados`
--
ALTER TABLE `tblempleados`
  ADD PRIMARY KEY (`PKTblEmpleados`),
  ADD KEY `tblempleados_fkcatroles_foreign` (`FKCatRoles`);

--
-- Indices de la tabla `tblreportes`
--
ALTER TABLE `tblreportes`
  ADD PRIMARY KEY (`PKTblReportes`),
  ADD KEY `tblreportes_fkcatproblemas_foreign` (`FKCatProblemas`),
  ADD KEY `tblreportes_fktblempleadosrecibio_foreign` (`FKTblEmpleadosRecibio`),
  ADD KEY `tblreportes_fkcatstatus_foreign` (`FKCatStatus`),
  ADD KEY `tblreportes_fktbldetallereporte_foreign` (`FKTblDetalleReporte`),
  ADD KEY `tblreportes_fktblclientes_foreign` (`FKTblClientes`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `catpoblaciones`
--
ALTER TABLE `catpoblaciones`
  MODIFY `PKCatPoblaciones` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT de la tabla `catproblemas`
--
ALTER TABLE `catproblemas`
  MODIFY `PKCatProblemas` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `catroles`
--
ALTER TABLE `catroles`
  MODIFY `PKCatRoles` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `catstatus`
--
ALTER TABLE `catstatus`
  MODIFY `PKCatStatus` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblclientes`
--
ALTER TABLE `tblclientes`
  MODIFY `PKTblClientes` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tbldetallereporte`
--
ALTER TABLE `tbldetallereporte`
  MODIFY `PKTblDetalleReporte` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `tbldirecciones`
--
ALTER TABLE `tbldirecciones`
  MODIFY `PKTblDirecciones` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tblempleados`
--
ALTER TABLE `tblempleados`
  MODIFY `PKTblEmpleados` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tblreportes`
--
ALTER TABLE `tblreportes`
  MODIFY `PKTblReportes` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
