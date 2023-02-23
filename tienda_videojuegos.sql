-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-02-2023 a las 21:41:49
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda_videojuegos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_categoria`
--

CREATE TABLE `tbl_categoria` (
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_categoria`
--

INSERT INTO `tbl_categoria` (`id_categoria`, `nombre`, `estado`) VALUES
(1, 'Consolas', 1),
(2, 'Videojuegos', 1),
(3, 'Accesorios', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_estado_pedido`
--

CREATE TABLE `tbl_estado_pedido` (
  `id_estado_pedido` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_estado_pedido`
--

INSERT INTO `tbl_estado_pedido` (`id_estado_pedido`, `nombre`, `estado`) VALUES
(1, 'Pendiente', 1),
(3, 'En proceso', 1),
(4, 'Finalizado', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_pedido`
--

CREATE TABLE `tbl_pedido` (
  `id_pedido` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `provincia` varchar(100) DEFAULT NULL,
  `ciudad` varchar(100) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `coste` float(200,2) NOT NULL,
  `id_estado_pedido` int(11) DEFAULT NULL,
  `fecha` date NOT NULL,
  `hora` time DEFAULT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_pedido`
--

INSERT INTO `tbl_pedido` (`id_pedido`, `id_usuario`, `provincia`, `ciudad`, `direccion`, `coste`, `id_estado_pedido`, `fecha`, `hora`, `estado`) VALUES
(8, 8, 'Antioquia', 'Medellin', 'Carrera 24 #45-56', 1050.00, 1, '2022-10-20', '22:38:06', 1),
(9, 8, 'Antioquia', 'Rionegro', 'Calle 20 #12-14', 2450.00, 3, '2022-10-20', '22:40:55', 1),
(10, 8, 'Valle del Cauca', 'Cali', 'Cra 12 #45=56', 10.00, 1, '2022-10-21', '16:12:30', 1),
(12, 8, 'Antioquia', 'El Retiro', 'Cra 10 #23-24', 500.00, 1, '2022-10-21', '17:33:40', 1),
(13, 8, 'Cundinamarca', 'Bogota', 'Calle 30', 1220.00, 4, '2022-10-21', '17:36:10', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_pedido_producto`
--

CREATE TABLE `tbl_pedido_producto` (
  `id_pedido_producto` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `unidades` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_pedido_producto`
--

INSERT INTO `tbl_pedido_producto` (`id_pedido_producto`, `id_pedido`, `id_producto`, `unidades`) VALUES
(13, 8, 5, 5),
(14, 8, 3, 2),
(15, 9, 5, 5),
(16, 9, 3, 2),
(17, 9, 4, 2),
(18, 10, 5, 1),
(20, 12, 3, 1),
(21, 13, 5, 2),
(22, 13, 4, 1),
(23, 13, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_plataforma`
--

CREATE TABLE `tbl_plataforma` (
  `id_plataforma` int(11) NOT NULL,
  `id_tipo_plataforma` int(11) NOT NULL,
  `nombre` varchar(70) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_plataforma`
--

INSERT INTO `tbl_plataforma` (`id_plataforma`, `id_tipo_plataforma`, `nombre`, `estado`) VALUES
(1, 1, 'PlayStation 5', 1),
(2, 3, 'Xbox 360', 1),
(3, 1, 'PlayStation 4', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_producto`
--

CREATE TABLE `tbl_producto` (
  `id_producto` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_plataforma` int(11) NOT NULL,
  `tipo` varchar(100) DEFAULT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` float(100,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `oferta` varchar(10) DEFAULT NULL,
  `fecha` date NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_producto`
--

INSERT INTO `tbl_producto` (`id_producto`, `id_categoria`, `id_plataforma`, `tipo`, `nombre`, `descripcion`, `precio`, `stock`, `oferta`, `fecha`, `imagen`, `estado`) VALUES
(3, 1, 3, '', 'Consola PS4', 'Consola de color de negro con dos juegos y un control', 500.00, 18, '', '2022-10-18', '', 1),
(4, 1, 1, '', 'Consola PS5', '', 700.00, 29, '', '2022-10-18', 'pexels-pixabay-159393 (1).jpg', 1),
(5, 2, 3, 'terror', 'Resident Evil 4', 'Es un videojuego de acción y terror', 10.00, 48, '', '2022-10-18', 'pexels-yurii-hlei-1365795 (1).jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_rol`
--

CREATE TABLE `tbl_rol` (
  `id_rol` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_rol`
--

INSERT INTO `tbl_rol` (`id_rol`, `nombre`, `estado`) VALUES
(1, 'User', 1),
(2, 'Admin', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipo_plataforma`
--

CREATE TABLE `tbl_tipo_plataforma` (
  `id_tipo_plataforma` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_tipo_plataforma`
--

INSERT INTO `tbl_tipo_plataforma` (`id_tipo_plataforma`, `nombre`, `estado`) VALUES
(1, 'PlayStation', 1),
(2, 'Xbox', 1),
(3, 'Nintendo', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuario`
--

CREATE TABLE `tbl_usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(70) NOT NULL,
  `apellido` varchar(70) NOT NULL,
  `telefono` varchar(40) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `id_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_usuario`
--

INSERT INTO `tbl_usuario` (`id_usuario`, `nombre`, `apellido`, `telefono`, `email`, `password`, `id_rol`) VALUES
(3, 'pedro', 'pedro', '1315216', 'pedro@pedro.com', '$2y$04$oXJ4s2yBkFi7z8gid3k.9eZA7k8zZTDqtiDuVknavkUrkhkCeV7zy', 1),
(8, 'admin', 'admin', '23135112', 'admin@admin.com', '$2y$04$3C4gEh4jBJZXENiNnE7ln.usPkY1H5Smju/Jy1JEppG6Y01ZEUykO', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_categoria`
--
ALTER TABLE `tbl_categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `tbl_estado_pedido`
--
ALTER TABLE `tbl_estado_pedido`
  ADD PRIMARY KEY (`id_estado_pedido`);

--
-- Indices de la tabla `tbl_pedido`
--
ALTER TABLE `tbl_pedido`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `fk_pedido_usuario` (`id_usuario`),
  ADD KEY `fk_pedido_estado_pedido` (`id_estado_pedido`);

--
-- Indices de la tabla `tbl_pedido_producto`
--
ALTER TABLE `tbl_pedido_producto`
  ADD PRIMARY KEY (`id_pedido_producto`),
  ADD KEY `fk_pedido_producto_pedido` (`id_pedido`),
  ADD KEY `fk_pedido_producto_producto` (`id_producto`);

--
-- Indices de la tabla `tbl_plataforma`
--
ALTER TABLE `tbl_plataforma`
  ADD PRIMARY KEY (`id_plataforma`),
  ADD KEY `fk_plataforma_tipo_plataforma` (`id_tipo_plataforma`);

--
-- Indices de la tabla `tbl_producto`
--
ALTER TABLE `tbl_producto`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `fk_producto_categoria` (`id_categoria`),
  ADD KEY `fk_producto_plataforma` (`id_plataforma`);

--
-- Indices de la tabla `tbl_rol`
--
ALTER TABLE `tbl_rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `tbl_tipo_plataforma`
--
ALTER TABLE `tbl_tipo_plataforma`
  ADD PRIMARY KEY (`id_tipo_plataforma`);

--
-- Indices de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `uq_email` (`email`),
  ADD KEY `fk_usuario_rol` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_categoria`
--
ALTER TABLE `tbl_categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `tbl_estado_pedido`
--
ALTER TABLE `tbl_estado_pedido`
  MODIFY `id_estado_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tbl_pedido`
--
ALTER TABLE `tbl_pedido`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `tbl_pedido_producto`
--
ALTER TABLE `tbl_pedido_producto`
  MODIFY `id_pedido_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `tbl_plataforma`
--
ALTER TABLE `tbl_plataforma`
  MODIFY `id_plataforma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tbl_producto`
--
ALTER TABLE `tbl_producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tbl_rol`
--
ALTER TABLE `tbl_rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_tipo_plataforma`
--
ALTER TABLE `tbl_tipo_plataforma`
  MODIFY `id_tipo_plataforma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_pedido`
--
ALTER TABLE `tbl_pedido`
  ADD CONSTRAINT `fk_pedido_estado_pedido` FOREIGN KEY (`id_estado_pedido`) REFERENCES `tbl_estado_pedido` (`id_estado_pedido`),
  ADD CONSTRAINT `fk_pedido_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `tbl_usuario` (`id_usuario`);

--
-- Filtros para la tabla `tbl_pedido_producto`
--
ALTER TABLE `tbl_pedido_producto`
  ADD CONSTRAINT `fk_pedido_producto_pedido` FOREIGN KEY (`id_pedido`) REFERENCES `tbl_pedido` (`id_pedido`),
  ADD CONSTRAINT `fk_pedido_producto_producto` FOREIGN KEY (`id_producto`) REFERENCES `tbl_producto` (`id_producto`);

--
-- Filtros para la tabla `tbl_plataforma`
--
ALTER TABLE `tbl_plataforma`
  ADD CONSTRAINT `fk_plataforma_tipo_plataforma` FOREIGN KEY (`id_tipo_plataforma`) REFERENCES `tbl_tipo_plataforma` (`id_tipo_plataforma`);

--
-- Filtros para la tabla `tbl_producto`
--
ALTER TABLE `tbl_producto`
  ADD CONSTRAINT `fk_producto_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `tbl_categoria` (`id_categoria`),
  ADD CONSTRAINT `fk_producto_plataforma` FOREIGN KEY (`id_plataforma`) REFERENCES `tbl_plataforma` (`id_plataforma`);

--
-- Filtros para la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  ADD CONSTRAINT `fk_usuario_rol` FOREIGN KEY (`id_rol`) REFERENCES `tbl_rol` (`id_rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
