-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 22, 2022 at 11:04 PM
-- Server version: 5.7.23-23
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `villasof_cari`
--

-- --------------------------------------------------------

--
-- Table structure for table `catpoblaciones`
--

CREATE TABLE `catpoblaciones` (
  `PKCatPoblaciones` int(10) UNSIGNED NOT NULL,
  `nombrePoblacion` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codigoPostal` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fechaAlta` date NOT NULL,
  `Activo` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `catproblemas`
--

CREATE TABLE `catproblemas` (
  `PKCatProblemas` int(10) UNSIGNED NOT NULL,
  `nombreProblema` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcionProblema` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fechaAlta` date NOT NULL,
  `Activo` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `catroles`
--

CREATE TABLE `catroles` (
  `PKCatRoles` int(10) UNSIGNED NOT NULL,
  `nombreRol` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcionRol` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fechaAlta` date NOT NULL,
  `Activo` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `catroles`
--

INSERT INTO `catroles` (`PKCatRoles`, `nombreRol`, `descripcionRol`, `fechaAlta`, `Activo`) VALUES
(1, 'Administrador', 'asdasdasd', '2022-03-01', 1),
(2, 'Técnico', 'asdfasd', '2022-04-04', 1),
(3, 'Servicio al cliente', 'Empleado en cargado de la atención al cliente', '2022-06-18', 1);

-- --------------------------------------------------------

--
-- Table structure for table `catstatus`
--

CREATE TABLE `catstatus` (
  `PKCatStatus` int(10) UNSIGNED NOT NULL,
  `nombreStatus` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcionStatus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fechaAlta` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `catstatus`
--

INSERT INTO `catstatus` (`PKCatStatus`, `nombreStatus`, `descripcionStatus`, `fechaAlta`) VALUES
(1, 'Pendiente', 'asdasd', '2022-03-01'),
(2, 'Atendido', 'asdwed', '2022-05-03');

-- --------------------------------------------------------

--
-- Stand-in structure for view `generalreportes`
-- (See below for the actual view)
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
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
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
-- Table structure for table `tblclientes`
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

-- --------------------------------------------------------

--
-- Table structure for table `tbldetallereporte`
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

-- --------------------------------------------------------

--
-- Table structure for table `tbldirecciones`
--

CREATE TABLE `tbldirecciones` (
  `PKTblDirecciones` int(10) UNSIGNED NOT NULL,
  `FKCatPoblaciones` int(10) UNSIGNED NOT NULL,
  `coordenadas` text COLLATE utf8mb4_unicode_ci,
  `referencias` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblempleados`
--

CREATE TABLE `tblempleados` (
  `PKTblEmpleados` int(10) UNSIGNED NOT NULL,
  `FKCatRoles` int(10) UNSIGNED NOT NULL,
  `nombreEmpleado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidoPaterno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidoMaterno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fechaAlta` date NOT NULL,
  `correo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usuario` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contrasenia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Activo` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblreportes`
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
  `fechaAlta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure for view `generalreportes`
--
DROP TABLE IF EXISTS `generalreportes`;

CREATE VIEW `generalreportes` AS SELECT `reporte`.`PKTblReportes` AS `folio`, `cliente`.`nombreCliente` AS `nombreCliente`, `cliente`.`apellidoPaterno` AS `apellidoPaterno`, `cliente`.`apellidoMaterno` AS `apellidoMaterno`, `cliente`.`telefono` AS `telefono`, `cliente`.`telefonoOpcional` AS `telefonoOpcional`, `poblacion`.`PKCatPoblaciones` AS `PKCatPoblaciones`, `poblacion`.`nombrePoblacion` AS `nombrePoblacion`, `direccion`.`coordenadas` AS `coordenadas`, `direccion`.`direccion` AS `direccion`, `direccion`.`referencias` AS `referencias`, `problema`.`PKCatProblemas` AS `PKCatProblemas`, `problema`.`nombreProblema` AS `nombreProblema`, `reporte`.`descripcionProblema` AS `descripcionProblema`, `reporte`.`observaciones` AS `observaciones`, `detallereporte`.`diagnostico` AS `diagnostico`, `detallereporte`.`solucion` AS `solucion`, concat(`empleadorecibio`.`nombreEmpleado`,' ',`empleadorecibio`.`apellidoPaterno`) AS `empleadoRecibio`, date_format(`reporte`.`fechaAlta`,'%d-%m-%Y') AS `fechaAlta`, date_format(`reporte`.`fechaAlta`,'%H:%i:%S') AS `horaAlta`, concat(`empleadoactualizo`.`nombreEmpleado`,' ',`empleadoactualizo`.`apellidoPaterno`) AS `empleadoActualizo`, date_format(`detallereporte`.`fechaActualizacion`,'%d-%m-%Y') AS `fechaActualizacion`, date_format(`detallereporte`.`fechaActualizacion`,'%H:%i:%S') AS `horaActualizacion`, concat(`empleadorealizo`.`nombreEmpleado`,' ',`empleadorealizo`.`apellidoPaterno`) AS `empleadoRealizo`, date_format(`detallereporte`.`fechaAtencion`,'%d-%m-%Y') AS `fechaAtencion`, date_format(`detallereporte`.`fechaAtencion`,'%H:%i:%S') AS `horaAtencion`, `empleadoatendiendo`.`PKTblEmpleados` AS `PKTblEmpleadosAtediendo`, concat(`empleadoatendiendo`.`nombreEmpleado`,' ',`empleadoatendiendo`.`apellidoPaterno`) AS `empleadoAtendiendo`, date_format(`detallereporte`.`fechaAtendiendo`,'%d-%m-%Y') AS `fechaAtendiendo`, date_format(`detallereporte`.`fechaAtendiendo`,'%H:%i:%S') AS `horaAtendiendo`, `status`.`nombreStatus` AS `status` FROM ((((((((((`tblreportes` `reporte` join `tblclientes` `cliente` on((`cliente`.`PKTblClientes` = `reporte`.`FKTblClientes`))) join `tbldirecciones` `direccion` on((`direccion`.`PKTblDirecciones` = `cliente`.`FKTblDirecciones`))) join `catpoblaciones` `poblacion` on((`poblacion`.`PKCatPoblaciones` = `direccion`.`FKCatPoblaciones`))) join `catproblemas` `problema` on((`problema`.`PKCatProblemas` = `reporte`.`FKCatProblemas`))) join `tbldetallereporte` `detallereporte` on((`detallereporte`.`PKTblDetalleReporte` = `reporte`.`FKTblDetalleReporte`))) left join `tblempleados` `empleadorecibio` on((`empleadorecibio`.`PKTblEmpleados` = `reporte`.`FKTblEmpleadosRecibio`))) left join `tblempleados` `empleadoactualizo` on((`empleadoactualizo`.`PKTblEmpleados` = `detallereporte`.`FKTblEmpleadosActualizo`))) left join `tblempleados` `empleadorealizo` on((`empleadorealizo`.`PKTblEmpleados` = `detallereporte`.`FKTblEmpleadosAtencion`))) left join `tblempleados` `empleadoatendiendo` on((`empleadoatendiendo`.`PKTblEmpleados` = `detallereporte`.`FKTblEmpleadosAtediendo`))) join `catstatus` `status` on((`status`.`PKCatStatus` = `reporte`.`FKCatStatus`))) ORDER BY `reporte`.`PKTblReportes` DESC ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catpoblaciones`
--
ALTER TABLE `catpoblaciones`
  ADD PRIMARY KEY (`PKCatPoblaciones`);

--
-- Indexes for table `catproblemas`
--
ALTER TABLE `catproblemas`
  ADD PRIMARY KEY (`PKCatProblemas`);

--
-- Indexes for table `catroles`
--
ALTER TABLE `catroles`
  ADD PRIMARY KEY (`PKCatRoles`);

--
-- Indexes for table `catstatus`
--
ALTER TABLE `catstatus`
  ADD PRIMARY KEY (`PKCatStatus`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `tblclientes`
--
ALTER TABLE `tblclientes`
  ADD PRIMARY KEY (`PKTblClientes`),
  ADD KEY `tblclientes_fktbldirecciones_foreign` (`FKTblDirecciones`);

--
-- Indexes for table `tbldetallereporte`
--
ALTER TABLE `tbldetallereporte`
  ADD PRIMARY KEY (`PKTblDetalleReporte`),
  ADD KEY `tbldetallereporte_fktblempleadosactualizo_foreign` (`FKTblEmpleadosActualizo`),
  ADD KEY `tbldetallereporte_fktblempleadosatencion_foreign` (`FKTblEmpleadosAtencion`),
  ADD KEY `tbldetallereporte_fktblempleadosatediendo_foreign` (`FKTblEmpleadosAtediendo`);

--
-- Indexes for table `tbldirecciones`
--
ALTER TABLE `tbldirecciones`
  ADD PRIMARY KEY (`PKTblDirecciones`),
  ADD KEY `tbldirecciones_fkcatpoblaciones_foreign` (`FKCatPoblaciones`);

--
-- Indexes for table `tblempleados`
--
ALTER TABLE `tblempleados`
  ADD PRIMARY KEY (`PKTblEmpleados`),
  ADD KEY `tblempleados_fkcatroles_foreign` (`FKCatRoles`);

--
-- Indexes for table `tblreportes`
--
ALTER TABLE `tblreportes`
  ADD PRIMARY KEY (`PKTblReportes`),
  ADD KEY `tblreportes_fkcatproblemas_foreign` (`FKCatProblemas`),
  ADD KEY `tblreportes_fktblempleadosrecibio_foreign` (`FKTblEmpleadosRecibio`),
  ADD KEY `tblreportes_fkcatstatus_foreign` (`FKCatStatus`),
  ADD KEY `tblreportes_fktbldetallereporte_foreign` (`FKTblDetalleReporte`),
  ADD KEY `tblreportes_fktblclientes_foreign` (`FKTblClientes`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catpoblaciones`
--
ALTER TABLE `catpoblaciones`
  MODIFY `PKCatPoblaciones` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `catproblemas`
--
ALTER TABLE `catproblemas`
  MODIFY `PKCatProblemas` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `catroles`
--
ALTER TABLE `catroles`
  MODIFY `PKCatRoles` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `catstatus`
--
ALTER TABLE `catstatus`
  MODIFY `PKCatStatus` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblclientes`
--
ALTER TABLE `tblclientes`
  MODIFY `PKTblClientes` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbldetallereporte`
--
ALTER TABLE `tbldetallereporte`
  MODIFY `PKTblDetalleReporte` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbldirecciones`
--
ALTER TABLE `tbldirecciones`
  MODIFY `PKTblDirecciones` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
