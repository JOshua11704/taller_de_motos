-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-08-2023 a las 13:44:54
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `motostaller`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cilindraje`
--

CREATE TABLE `cilindraje` (
  `id_cilindraje` int(11) NOT NULL,
  `cilindraje` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cilindraje`
--

INSERT INTO `cilindraje` (`id_cilindraje`, `cilindraje`) VALUES
(1, '150'),
(2, '250'),
(3, '150'),
(4, '250'),
(5, '100'),
(6, '200');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `color`
--

CREATE TABLE `color` (
  `id_color` int(11) NOT NULL,
  `color` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `color`
--

INSERT INTO `color` (`id_color`, `color`) VALUES
(1, 'Blanco'),
(2, 'Negro'),
(3, 'Azul'),
(4, 'Plateado'),
(5, 'Amarrillo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `combustible`
--

CREATE TABLE `combustible` (
  `id_combustible` int(11) NOT NULL,
  `combustible` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `combustible`
--

INSERT INTO `combustible` (`id_combustible`, `combustible`) VALUES
(1, 'Diesel'),
(2, 'Gasolina');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id_compra` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `documento` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_compra`
--

CREATE TABLE `detalle_compra` (
  `id_comprac` int(11) NOT NULL,
  `cantidad_producto` int(11) NOT NULL,
  `id_repuestos` int(11) NOT NULL,
  `id_compra` int(11) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_vdocu`
--

CREATE TABLE `detalle_vdocu` (
  `id_detadocu` int(11) NOT NULL,
  `id_documentos` int(11) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `id_venta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

CREATE TABLE `detalle_venta` (
  `id_detallerv` int(11) NOT NULL,
  `id_repuestos` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_vservi`
--

CREATE TABLE `detalle_vservi` (
  `id_dataservi` int(11) NOT NULL,
  `id_servicio` int(11) NOT NULL,
  `cantidad` tinyint(2) NOT NULL,
  `subtotal` decimal(9,2) NOT NULL,
  `id_venta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos`
--

CREATE TABLE `documentos` (
  `id_documentos` int(11) NOT NULL,
  `documentos` varchar(20) NOT NULL,
  `precio` decimal(9,2) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `id_estado` int(11) NOT NULL,
  `estado` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id_estado`, `estado`) VALUES
(1, 'Activo'),
(2, 'Inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura_venta`
--

CREATE TABLE `factura_venta` (
  `id_venta` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `documento` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `placa` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fecha`
--

CREATE TABLE `fecha` (
  `id_fecha` int(3) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `document` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `fecha`
--

INSERT INTO `fecha` (`id_fecha`, `fecha`, `hora`, `document`) VALUES
(21, '2023-04-25', '22:55:59', 1110451633),
(22, '2023-04-26', '18:04:11', 1110451633),
(23, '2023-04-26', '18:08:21', 1110451633),
(24, '2023-04-26', '19:40:42', 123456),
(25, '2023-04-26', '19:58:18', 1110451633),
(26, '2023-04-27', '01:55:10', 1110451633),
(27, '2023-04-27', '17:45:57', 1110451633),
(28, '2023-04-29', '14:16:02', 1110451633),
(29, '2023-05-01', '18:30:13', 1110451633),
(30, '2023-05-02', '00:02:07', 1110451633),
(31, '2023-07-31', '16:16:04', 1110451633),
(32, '2023-08-01', '16:30:21', 1110451633),
(33, '2023-08-01', '16:30:23', 1110451633),
(34, '2023-08-02', '11:28:14', 1110451633),
(35, '2023-08-02', '17:59:16', 1110451633),
(36, '2023-08-02', '20:31:09', 1110451633),
(37, '2023-08-03', '06:32:28', 1110451633);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `linea`
--

CREATE TABLE `linea` (
  `id_linea` int(11) NOT NULL,
  `linea` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `linea`
--

INSERT INTO `linea` (`id_linea`, `linea`) VALUES
(1, '125NKD EIII'),
(2, '513NGA EII');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `id_marca` int(11) NOT NULL,
  `marca` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`id_marca`, `marca`) VALUES
(1, 'AKT'),
(2, 'BMW');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelo`
--

CREATE TABLE `modelo` (
  `id_modelo` int(11) NOT NULL,
  `modelo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `modelo`
--

INSERT INTO `modelo` (`id_modelo`, `modelo`) VALUES
(1, '2010'),
(2, '2022'),
(3, '2021'),
(4, '2023'),
(5, '2011'),
(6, '2012'),
(7, '2012'),
(8, '2013'),
(9, '2014'),
(10, '2015');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `moto`
--

CREATE TABLE `moto` (
  `placa` varchar(8) NOT NULL,
  `id_marca` int(11) NOT NULL,
  `descripcion` varchar(90) NOT NULL,
  `documento` int(11) NOT NULL,
  `km` int(11) NOT NULL,
  `id_linea` int(11) NOT NULL,
  `id_modelo` int(11) NOT NULL,
  `id_cilindraje` int(11) NOT NULL,
  `id_color` int(11) NOT NULL,
  `id_clase` int(11) NOT NULL,
  `id_carroseria` int(11) NOT NULL,
  `capacidad` tinyint(2) NOT NULL,
  `id_combustible` int(11) NOT NULL,
  `numero_motor` varchar(20) NOT NULL,
  `vin` varchar(20) NOT NULL,
  `numero_chasis` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `moto`
--

INSERT INTO `moto` (`placa`, `id_marca`, `descripcion`, `documento`, `km`, `id_linea`, `id_modelo`, `id_cilindraje`, `id_color`, `id_clase`, `id_carroseria`, `capacidad`, `id_combustible`, `numero_motor`, `vin`, `numero_chasis`) VALUES
('23r223', 1, 'efbfeefs wfwf w ', 1110451633, 2343, 2, 6, 1, 3, 1, 2, 2, 2, 'rywy732', '1241hegr', '63434g33g'),
('4QWRQ', 1, 'QDWQDQ DQQ', 123345, 23, 1, 1, 1, 1, 1, 1, 2, 1, 'werwew2134', '35423fw2e', '3242d'),
('hwr6234', 2, 'fg nfgjtjrtj', 31231414, 2362, 1, 5, 4, 1, 1, 1, 1, 2, 'rywy734', '1241hegrwg', 'g3er42'),
('Mf45KD', 2, 'hyrmgbrvftg', 1110451633, 234, 2, 2, 3, 1, 2, 2, 2, 1, '362gwgw13', '2412wetrw', '63434g3g3gdfg'),
('msd462', 2, 'hetehthetr', 123345, 234, 2, 5, 6, 1, 1, 1, 2, 1, 'rywy734', '24f3f2g24', 'g3er42'),
('y3yy33', 1, 'r230rj23rj2 r2 r2r0 ', 1110451633, 124, 1, 7, 3, 3, 2, 2, 3, 1, 'rj2r2r0 ', '23rt32fd', '13r123rt');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `repuestos`
--

CREATE TABLE `repuestos` (
  `nom_repuestos` varchar(40) NOT NULL,
  `precio` decimal(9,2) NOT NULL,
  `descripcion` varchar(70) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `id_estado` int(11) NOT NULL,
  `id_repuestos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `repuestos`
--

INSERT INTO `repuestos` (`nom_repuestos`, `precio`, `descripcion`, `cantidad`, `id_estado`, `id_repuestos`) VALUES
('Par de Llantas xs', 130000.00, 'Llantas para motos pequeñas ', 200, 1, 1),
('frenos', 130000.00, 'kwefoiwei werhfwiehrwe ', 312, 1, 2),
('Cables de conecciones', 400.00, 'Conecciones con las partes electricas', 100, 1, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL,
  `nombre_rol` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `nombre_rol`) VALUES
(1, 'Administrador'),
(2, 'cliente'),
(3, 'trabajador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `id_servicio` int(11) NOT NULL,
  `servicio` varchar(20) NOT NULL,
  `precio` decimal(9,2) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`id_servicio`, `servicio`, `precio`, `descripcion`) VALUES
(2, 'Venta', 100.00, 'Venta hecha de un trabajador a un clietne'),
(3, 'Pago de Aire', 1000.00, 'Aire a presión para llantas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_carroceria`
--

CREATE TABLE `tipo_carroceria` (
  `id_carroseria` int(11) NOT NULL,
  `carroseria` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_carroceria`
--

INSERT INTO `tipo_carroceria` (`id_carroseria`, `carroseria`) VALUES
(1, 'Sin carroceria'),
(2, 'Con carroceria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_servicio`
--

CREATE TABLE `tipo_servicio` (
  `id_tip_servicio` int(11) NOT NULL,
  `tip_servicio` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_vehiculo`
--

CREATE TABLE `tipo_vehiculo` (
  `id_clase` int(11) NOT NULL,
  `tip_vehiculo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_vehiculo`
--

INSERT INTO `tipo_vehiculo` (`id_clase`, `tip_vehiculo`) VALUES
(1, 'Motocicleta'),
(2, 'Bicicleta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `documento` int(10) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `telefono` int(10) NOT NULL,
  `gmail` varchar(40) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `clave` varchar(80) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `id_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`documento`, `nombre`, `telefono`, `gmail`, `usuario`, `clave`, `id_rol`, `id_estado`) VALUES
(123345, 'juan david', 312038123, 'juansra@misenas.co', 'juand', '$2y$15$C8wr0nO4CYw52fnLSoP6Uel8gezkfdncqmSq7Qq8xD79Sj/xAj94C', 2, 2),
(31231414, 'wqe qwe reeww eewrw', 34232352, 'wdfw efwefw', 'werwer3252', '$2y$15$Zg8GtFGP4cnUAzHbbimSSeY7.3Hzn53F53B3Edb2sGiCwGFCRgLkm', 1, 1),
(1110451633, 'joshua ortiz gaitan', 32342352, 'jfoefwoefwe fwe', 'josh', '$2y$15$de7fUuu3E3fhRSA868aPpOj1jHaqcZHTCECnsKeIsrueBAc3JXzye', 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cilindraje`
--
ALTER TABLE `cilindraje`
  ADD PRIMARY KEY (`id_cilindraje`);

--
-- Indices de la tabla `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id_color`);

--
-- Indices de la tabla `combustible`
--
ALTER TABLE `combustible`
  ADD PRIMARY KEY (`id_combustible`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id_compra`);

--
-- Indices de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  ADD PRIMARY KEY (`id_comprac`),
  ADD KEY `id_compra` (`id_compra`),
  ADD KEY `id_producto` (`id_repuestos`);

--
-- Indices de la tabla `detalle_vdocu`
--
ALTER TABLE `detalle_vdocu`
  ADD PRIMARY KEY (`id_detadocu`),
  ADD KEY `id_venta` (`id_venta`),
  ADD KEY `id_documentos` (`id_documentos`);

--
-- Indices de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD PRIMARY KEY (`id_detallerv`),
  ADD KEY `id_producto` (`id_repuestos`),
  ADD KEY `id_venta` (`id_venta`);

--
-- Indices de la tabla `detalle_vservi`
--
ALTER TABLE `detalle_vservi`
  ADD PRIMARY KEY (`id_dataservi`),
  ADD KEY `id_servicio` (`id_servicio`),
  ADD KEY `id_venta` (`id_venta`);

--
-- Indices de la tabla `documentos`
--
ALTER TABLE `documentos`
  ADD PRIMARY KEY (`id_documentos`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `factura_venta`
--
ALTER TABLE `factura_venta`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `documento` (`documento`),
  ADD KEY `placa` (`placa`);

--
-- Indices de la tabla `fecha`
--
ALTER TABLE `fecha`
  ADD PRIMARY KEY (`id_fecha`),
  ADD KEY `document` (`document`);

--
-- Indices de la tabla `linea`
--
ALTER TABLE `linea`
  ADD PRIMARY KEY (`id_linea`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`id_marca`);

--
-- Indices de la tabla `modelo`
--
ALTER TABLE `modelo`
  ADD PRIMARY KEY (`id_modelo`);

--
-- Indices de la tabla `moto`
--
ALTER TABLE `moto`
  ADD PRIMARY KEY (`placa`),
  ADD KEY `id_marca` (`id_marca`),
  ADD KEY `documento` (`documento`),
  ADD KEY `id_linea` (`id_linea`),
  ADD KEY `id_modelo` (`id_modelo`),
  ADD KEY `id_cilindraje` (`id_cilindraje`),
  ADD KEY `id_color` (`id_color`),
  ADD KEY `moto_ibfk_7` (`id_clase`),
  ADD KEY `moto_ibfk_8` (`id_carroseria`),
  ADD KEY `id_combustible` (`id_combustible`);

--
-- Indices de la tabla `repuestos`
--
ALTER TABLE `repuestos`
  ADD PRIMARY KEY (`id_repuestos`),
  ADD KEY `id_estado` (`id_estado`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`id_servicio`);

--
-- Indices de la tabla `tipo_carroceria`
--
ALTER TABLE `tipo_carroceria`
  ADD PRIMARY KEY (`id_carroseria`);

--
-- Indices de la tabla `tipo_servicio`
--
ALTER TABLE `tipo_servicio`
  ADD PRIMARY KEY (`id_tip_servicio`);

--
-- Indices de la tabla `tipo_vehiculo`
--
ALTER TABLE `tipo_vehiculo`
  ADD PRIMARY KEY (`id_clase`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`documento`),
  ADD KEY `id_rol` (`id_rol`),
  ADD KEY `id_estado` (`id_estado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cilindraje`
--
ALTER TABLE `cilindraje`
  MODIFY `id_cilindraje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `color`
--
ALTER TABLE `color`
  MODIFY `id_color` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `combustible`
--
ALTER TABLE `combustible`
  MODIFY `id_combustible` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `fecha`
--
ALTER TABLE `fecha`
  MODIFY `id_fecha` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `linea`
--
ALTER TABLE `linea`
  MODIFY `id_linea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `modelo`
--
ALTER TABLE `modelo`
  MODIFY `id_modelo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `repuestos`
--
ALTER TABLE `repuestos`
  MODIFY `id_repuestos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `id_servicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_carroceria`
--
ALTER TABLE `tipo_carroceria`
  MODIFY `id_carroseria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_servicio`
--
ALTER TABLE `tipo_servicio`
  MODIFY `id_tip_servicio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_vehiculo`
--
ALTER TABLE `tipo_vehiculo`
  MODIFY `id_clase` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  ADD CONSTRAINT `detalle_compra_ibfk_1` FOREIGN KEY (`id_repuestos`) REFERENCES `repuestos` (`id_repuestos`) ON UPDATE CASCADE,
  ADD CONSTRAINT `detalle_compra_ibfk_2` FOREIGN KEY (`id_compra`) REFERENCES `compras` (`id_compra`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalle_vdocu`
--
ALTER TABLE `detalle_vdocu`
  ADD CONSTRAINT `detalle_vdocu_ibfk_1` FOREIGN KEY (`id_documentos`) REFERENCES `documentos` (`id_documentos`) ON UPDATE CASCADE,
  ADD CONSTRAINT `detalle_vdocu_ibfk_2` FOREIGN KEY (`id_venta`) REFERENCES `factura_venta` (`id_venta`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD CONSTRAINT `detalle_venta_ibfk_1` FOREIGN KEY (`id_repuestos`) REFERENCES `repuestos` (`id_repuestos`) ON UPDATE CASCADE,
  ADD CONSTRAINT `detalle_venta_ibfk_2` FOREIGN KEY (`id_venta`) REFERENCES `factura_venta` (`id_venta`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalle_vservi`
--
ALTER TABLE `detalle_vservi`
  ADD CONSTRAINT `detalle_vservi_ibfk_2` FOREIGN KEY (`id_venta`) REFERENCES `factura_venta` (`id_venta`) ON UPDATE CASCADE,
  ADD CONSTRAINT `detalle_vservi_ibfk_3` FOREIGN KEY (`id_servicio`) REFERENCES `servicio` (`id_servicio`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `factura_venta`
--
ALTER TABLE `factura_venta`
  ADD CONSTRAINT `factura_venta_ibfk_1` FOREIGN KEY (`documento`) REFERENCES `usuario` (`documento`) ON UPDATE CASCADE,
  ADD CONSTRAINT `factura_venta_ibfk_2` FOREIGN KEY (`placa`) REFERENCES `moto` (`placa`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `moto`
--
ALTER TABLE `moto`
  ADD CONSTRAINT `moto_ibfk_1` FOREIGN KEY (`id_marca`) REFERENCES `marca` (`id_marca`) ON UPDATE CASCADE,
  ADD CONSTRAINT `moto_ibfk_2` FOREIGN KEY (`documento`) REFERENCES `usuario` (`documento`) ON UPDATE CASCADE,
  ADD CONSTRAINT `moto_ibfk_3` FOREIGN KEY (`id_linea`) REFERENCES `linea` (`id_linea`) ON UPDATE CASCADE,
  ADD CONSTRAINT `moto_ibfk_4` FOREIGN KEY (`id_modelo`) REFERENCES `modelo` (`id_modelo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `moto_ibfk_5` FOREIGN KEY (`id_cilindraje`) REFERENCES `cilindraje` (`id_cilindraje`) ON UPDATE CASCADE,
  ADD CONSTRAINT `moto_ibfk_6` FOREIGN KEY (`id_color`) REFERENCES `color` (`id_color`) ON UPDATE CASCADE,
  ADD CONSTRAINT `moto_ibfk_7` FOREIGN KEY (`id_clase`) REFERENCES `tipo_vehiculo` (`id_clase`) ON UPDATE CASCADE,
  ADD CONSTRAINT `moto_ibfk_8` FOREIGN KEY (`id_carroseria`) REFERENCES `tipo_carroceria` (`id_carroseria`) ON UPDATE CASCADE,
  ADD CONSTRAINT `moto_ibfk_9` FOREIGN KEY (`id_combustible`) REFERENCES `combustible` (`id_combustible`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `repuestos`
--
ALTER TABLE `repuestos`
  ADD CONSTRAINT `repuestos_ibfk_1` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`) ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
