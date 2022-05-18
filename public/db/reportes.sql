-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-04-2022 a las 19:55:58
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `reportes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catpoblaciones`
--

CREATE TABLE `catpoblaciones` (
  `PKCatPoblaciones` int(10) UNSIGNED NOT NULL,
  `nombrePoblacion` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codigoPostal` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fechaAlta` date NOT NULL,
  `Activo` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `catpoblaciones`
--

INSERT INTO `catpoblaciones` (`PKCatPoblaciones`, `nombrePoblacion`, `codigoPostal`, `fechaAlta`, `Activo`) VALUES
(1, 'San Pedro Cholula', '52753', '2021-06-08', 0),
(2, 'Santiago', '50987', '2022-03-01', 0),
(3, 'Acazulco', '52753', '2022-04-04', 1);

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
(1, 'Antena movida', 'asdasd', '2022-03-01', 1),
(2, 'Router dañado', 'asd', '2022-03-01', 1),
(3, 'Cable roto', 'asderg', '2022-04-04', 1);

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
(1, 'Administrador', 'asdasdasd', '2022-03-01', 1),
(2, 'Técnico', 'asdfasd', '2022-04-04', 1);

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

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2022_02_26_133155_cat_problemas', 1),
(3, '2022_02_26_133231_cat_roles', 1),
(4, '2022_02_26_133256_cat_poblaciones', 1),
(5, '2022_02_26_133310_cat_status', 1),
(6, '2022_02_26_133402_tbl_empleados', 1),
(7, '2022_02_26_133507_tbl_detalle_reporte', 1),
(8, '2022_02_26_133555_tbl_direcciones', 1),
(9, '2022_02_26_133625_tbl_clientes', 1),
(10, '2022_02_27_133541_tbl_reportes', 1);

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
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
(3, 6, 'Diego', 'Contreras', 'Dimas', '0123456789', '1234567890', '2022-03-01', 1),
(4, 7, 'Adrián', 'Villa', 'Reyes', '7292271384', '', '2022-03-18', 1),
(5, 9, 'José', 'Farfan', 'Ostio', '0987654321', NULL, '2022-04-04', 1);

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
(4, 'asdwedwe', 'asd', 1, '2022-04-04 06:28:16', 1, '2022-04-05 01:30:52', NULL, NULL),
(5, NULL, NULL, 1, '2022-04-04 07:10:05', NULL, NULL, NULL, NULL),
(7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'Mordio el perro', 'Se cambio el cable', 1, '2022-04-06 02:50:36', 1, '2022-04-06 02:51:07', NULL, NULL),
(9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbldirecciones`
--

CREATE TABLE `tbldirecciones` (
  `PKTblDirecciones` int(10) UNSIGNED NOT NULL,
  `FKCatPoblaciones` int(10) UNSIGNED NOT NULL,
  `coordenadas` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `referencias` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tbldirecciones`
--

INSERT INTO `tbldirecciones` (`PKTblDirecciones`, `FKCatPoblaciones`, `coordenadas`, `referencias`, `direccion`) VALUES
(6, 1, '34234', 'asdasd', 'ewrwer'),
(7, 1, '19.268649, -99.491644', 'A 50 metros del comedor comunitario', 'Calzada Guadalupe Victoria 54'),
(9, 3, '1234234', 'rwerwer', '234234');

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
  `fechaAlta` date NOT NULL,
  `usuario` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contrasenia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Activo` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tblempleados`
--

INSERT INTO `tblempleados` (`PKTblEmpleados`, `FKCatRoles`, `nombreEmpleado`, `apellidoPaterno`, `apellidoMaterno`, `fechaAlta`, `usuario`, `contrasenia`, `Activo`) VALUES
(1, 2, 'Carlos', 'Millan', 'Hinojosa', '2022-03-01', 'carlos', '1234', 1),
(2, 1, 'asd', 'asdasd', 'asdasd', '2022-04-04', 'asd', 'asd', 0),
(3, 1, 'Fabiola', 'Hernandez', 'Montiel', '2022-04-04', 'Fabi', '1234', 1),
(4, 2, 'sdf wef wefw', 'sdfsdf', 'sdfsdf', '2022-04-04', 'sdf', 'sdf', 0),
(5, 2, 'Carlos', 'Millan', 'Hinojosa', '2022-04-05', 'carlos', '12345', 1);

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
  `observaciones` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fechaAlta` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tblreportes`
--

INSERT INTO `tblreportes` (`PKTblReportes`, `FKCatProblemas`, `FKTblEmpleadosRecibio`, `FKCatStatus`, `FKTblDetalleReporte`, `FKTblClientes`, `descripcionProblema`, `observaciones`, `fechaAlta`) VALUES
(3, 1, 1, 2, 4, 3, 'asdasd', 'asdasd', '2022-04-04 20:30:52'),
(4, 1, 1, 1, 5, 4, 'No tiene internet hace dos días', 'Ningunaasdasdasd', '2022-04-04 02:09:45'),
(5, 3, 1, 2, 8, 4, 'kljnjkn', 'jknjknjkn', '2022-04-05 21:51:07'),
(6, 2, 1, 1, 9, 3, 'Por una descarga electrica', 'dadad asda', '2022-04-06 02:47:56');

-- --------------------------------------------------------

--
-- Estructura para la vista `generalreportes`
--
DROP TABLE IF EXISTS `generalreportes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `generalreportes`  AS SELECT `reporte`.`PKTblReportes` AS `folio`, `cliente`.`nombreCliente` AS `nombreCliente`, `cliente`.`apellidoPaterno` AS `apellidoPaterno`, `cliente`.`apellidoMaterno` AS `apellidoMaterno`, `cliente`.`telefono` AS `telefono`, `cliente`.`telefonoOpcional` AS `telefonoOpcional`, `poblacion`.`PKCatPoblaciones` AS `PKCatPoblaciones`, `poblacion`.`nombrePoblacion` AS `nombrePoblacion`, `direccion`.`coordenadas` AS `coordenadas`, `direccion`.`direccion` AS `direccion`, `direccion`.`referencias` AS `referencias`, `problema`.`PKCatProblemas` AS `PKCatProblemas`, `problema`.`nombreProblema` AS `nombreProblema`, `reporte`.`descripcionProblema` AS `descripcionProblema`, `reporte`.`observaciones` AS `observaciones`, `detallereporte`.`diagnostico` AS `diagnostico`, `detallereporte`.`solucion` AS `solucion`, concat(`empleadorecibio`.`nombreEmpleado`,' ',`empleadorecibio`.`apellidoPaterno`) AS `empleadoRecibio`, date_format(`reporte`.`fechaAlta`,'%d-%m-%Y') AS `fechaAlta`, date_format(`reporte`.`fechaAlta`,'%H:%i:%S') AS `horaAlta`, concat(`empleadoactualizo`.`nombreEmpleado`,' ',`empleadoactualizo`.`apellidoPaterno`) AS `empleadoActualizo`, date_format(`detallereporte`.`fechaActualizacion`,'%d-%m-%Y') AS `fechaActualizacion`, date_format(`detallereporte`.`fechaActualizacion`,'%H:%i:%S') AS `horaActualizacion`, concat(`empleadorealizo`.`nombreEmpleado`,' ',`empleadorealizo`.`apellidoPaterno`) AS `empleadoRealizo`, date_format(`detallereporte`.`fechaAtencion`,'%d-%m-%Y') AS `fechaAtencion`, date_format(`detallereporte`.`fechaAtencion`,'%H:%i:%S') AS `horaAtencion`, `empleadoatendiendo`.`PKTblEmpleados` AS `PKTblEmpleadosAtediendo`, concat(`empleadoatendiendo`.`nombreEmpleado`,' ',`empleadoatendiendo`.`apellidoPaterno`) AS `empleadoAtendiendo`, date_format(`detallereporte`.`fechaAtendiendo`,'%d-%m-%Y') AS `fechaAtendiendo`, date_format(`detallereporte`.`fechaAtendiendo`,'%H:%i:%S') AS `horaAtendiendo`, `status`.`nombreStatus` AS `status` FROM ((((((((((`tblreportes` `reporte` join `tblclientes` `cliente` on(`cliente`.`PKTblClientes` = `reporte`.`FKTblClientes`)) join `tbldirecciones` `direccion` on(`direccion`.`PKTblDirecciones` = `cliente`.`FKTblDirecciones`)) join `catpoblaciones` `poblacion` on(`poblacion`.`PKCatPoblaciones` = `direccion`.`FKCatPoblaciones`)) join `catproblemas` `problema` on(`problema`.`PKCatProblemas` = `reporte`.`FKCatProblemas`)) join `tbldetallereporte` `detallereporte` on(`detallereporte`.`PKTblDetalleReporte` = `reporte`.`FKTblDetalleReporte`)) left join `tblempleados` `empleadorecibio` on(`empleadorecibio`.`PKTblEmpleados` = `reporte`.`FKTblEmpleadosRecibio`)) left join `tblempleados` `empleadoactualizo` on(`empleadoactualizo`.`PKTblEmpleados` = `detallereporte`.`FKTblEmpleadosActualizo`)) left join `tblempleados` `empleadorealizo` on(`empleadorealizo`.`PKTblEmpleados` = `detallereporte`.`FKTblEmpleadosAtencion`)) left join `tblempleados` `empleadoatendiendo` on(`empleadoatendiendo`.`PKTblEmpleados` = `detallereporte`.`FKTblEmpleadosAtediendo`)) join `catstatus` `status` on(`status`.`PKCatStatus` = `reporte`.`FKCatStatus`)) ORDER BY `reporte`.`PKTblReportes` DESC ;

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
  MODIFY `PKCatPoblaciones` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `catproblemas`
--
ALTER TABLE `catproblemas`
  MODIFY `PKCatProblemas` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `catroles`
--
ALTER TABLE `catroles`
  MODIFY `PKCatRoles` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `catstatus`
--
ALTER TABLE `catstatus`
  MODIFY `PKCatStatus` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblclientes`
--
ALTER TABLE `tblclientes`
  MODIFY `PKTblClientes` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tbldetallereporte`
--
ALTER TABLE `tbldetallereporte`
  MODIFY `PKTblDetalleReporte` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `tbldirecciones`
--
ALTER TABLE `tbldirecciones`
  MODIFY `PKTblDirecciones` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `tblempleados`
--
ALTER TABLE `tblempleados`
  MODIFY `PKTblEmpleados` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tblreportes`
--
ALTER TABLE `tblreportes`
  MODIFY `PKTblReportes` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tblclientes`
--
ALTER TABLE `tblclientes`
  ADD CONSTRAINT `tblclientes_fktbldirecciones_foreign` FOREIGN KEY (`FKTblDirecciones`) REFERENCES `tbldirecciones` (`PKTblDirecciones`);

--
-- Filtros para la tabla `tbldetallereporte`
--
ALTER TABLE `tbldetallereporte`
  ADD CONSTRAINT `tbldetallereporte_fktblempleadosactualizo_foreign` FOREIGN KEY (`FKTblEmpleadosActualizo`) REFERENCES `tblempleados` (`PKTblEmpleados`),
  ADD CONSTRAINT `tbldetallereporte_fktblempleadosatediendo_foreign` FOREIGN KEY (`FKTblEmpleadosAtediendo`) REFERENCES `tblempleados` (`PKTblEmpleados`),
  ADD CONSTRAINT `tbldetallereporte_fktblempleadosatencion_foreign` FOREIGN KEY (`FKTblEmpleadosAtencion`) REFERENCES `tblempleados` (`PKTblEmpleados`);

--
-- Filtros para la tabla `tbldirecciones`
--
ALTER TABLE `tbldirecciones`
  ADD CONSTRAINT `tbldirecciones_fkcatpoblaciones_foreign` FOREIGN KEY (`FKCatPoblaciones`) REFERENCES `catpoblaciones` (`PKCatPoblaciones`);

--
-- Filtros para la tabla `tblempleados`
--
ALTER TABLE `tblempleados`
  ADD CONSTRAINT `tblempleados_fkcatroles_foreign` FOREIGN KEY (`FKCatRoles`) REFERENCES `catroles` (`PKCatRoles`);

--
-- Filtros para la tabla `tblreportes`
--
ALTER TABLE `tblreportes`
  ADD CONSTRAINT `tblreportes_fkcatproblemas_foreign` FOREIGN KEY (`FKCatProblemas`) REFERENCES `catproblemas` (`PKCatProblemas`),
  ADD CONSTRAINT `tblreportes_fkcatstatus_foreign` FOREIGN KEY (`FKCatStatus`) REFERENCES `catstatus` (`PKCatStatus`),
  ADD CONSTRAINT `tblreportes_fktblclientes_foreign` FOREIGN KEY (`FKTblClientes`) REFERENCES `tblclientes` (`PKTblClientes`),
  ADD CONSTRAINT `tblreportes_fktbldetallereporte_foreign` FOREIGN KEY (`FKTblDetalleReporte`) REFERENCES `tbldetallereporte` (`PKTblDetalleReporte`),
  ADD CONSTRAINT `tblreportes_fktblempleadosrecibio_foreign` FOREIGN KEY (`FKTblEmpleadosRecibio`) REFERENCES `tblempleados` (`PKTblEmpleados`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
