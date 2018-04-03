-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 03-04-2018 a las 11:51:58
-- Versión del servidor: 5.7.17-log
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `restaurante`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidoplato`
--

CREATE TABLE `pedidoplato` (
  `id_plato` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plato`
--

CREATE TABLE `plato` (
  `id` int(11) NOT NULL,
  `nombre` varchar(128) NOT NULL,
  `foto` varchar(256) DEFAULT NULL,
  `precio` double NOT NULL,
  `id_seccion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `plato`
--

INSERT INTO `plato` (`id`, `nombre`, `foto`, `precio`, `id_seccion`) VALUES
(1, 'Ensalada Mixta', NULL, 7, 1),
(2, 'Ensalada César', NULL, 8.5, 1),
(3, 'Surtido Ibérico', NULL, 14, 1),
(4, 'Tortillitas de Camarones', NULL, 10, 1),
(5, 'Solomillo al Roquefort', NULL, 16, 2),
(6, 'Calamar a la Romana', NULL, 15, 2),
(7, 'Atún Encebollado', NULL, 15, 2),
(8, 'Steak Tartar', NULL, 18, 2),
(9, 'Chuletas de Cordero con Costra de Hierbas y Salsa de Yogurt', NULL, 17, 2),
(10, 'Tarta de Queso con Arándanos', NULL, 6, 3),
(11, 'Mousse de Chocolate con Fresas Cristalizadas ', NULL, 6, 3),
(12, 'Tarta de Dulce de Leche, Chocolate y Cerezas', NULL, 7, 3),
(13, 'Helado de Albaricoque', NULL, 5, 3),
(14, 'Agua San Peregrino', NULL, 2.5, 4),
(15, 'Refrescos', NULL, 2.5, 4),
(16, 'Viña Real Oro Reserva', NULL, 35, 4),
(17, 'Marba Afrutado', NULL, 17.5, 4),
(18, 'Bermejo Rosado', NULL, 22, 4),
(19, 'Cerveza Sink the Bismarck', NULL, 7, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `numPersonas` int(11) NOT NULL,
  `hora` varchar(32) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seccion`
--

CREATE TABLE `seccion` (
  `id` int(11) NOT NULL,
  `nombre` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `seccion`
--

INSERT INTO `seccion` (`id`, `nombre`) VALUES
(1, 'Entrantes'),
(2, 'Principales'),
(3, 'Postres'),
(4, 'Bebidas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(32) NOT NULL,
  `apellidos` varchar(64) NOT NULL,
  `direccion` varchar(128) NOT NULL,
  `correo` varchar(64) NOT NULL,
  `usuario` varchar(32) NOT NULL,
  `contraseña` varchar(32) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellidos`, `direccion`, `correo`, `usuario`, `contraseña`, `estado`, `admin`) VALUES
(1, 'Andrés', 'Redondo Pérez', 'afadfasdfasfd', 'asdfadfa@gadfa.com', 'ANDRES', '1234', 0, 1),
(2, 'usuario', 'dfasdaf', 'dfadsfaf', 'usuario3@usuario.com', 'usuario', '1234', 0, 0),
(3, 'usuario2', 'dsfadfsafsda', 'adsfadsfdf', 'usuario3@usuario.com', 'usuario2', '1234', 0, 0),
(4, 'usuario3', 'dfadfadfad', 'adfafdsfdsa', 'usuario3@usuario.com', 'usuario3', '1234', 0, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `pedidoplato`
--
ALTER TABLE `pedidoplato`
  ADD PRIMARY KEY (`id_plato`,`id_pedido`),
  ADD KEY `id_pedido` (`id_pedido`);

--
-- Indices de la tabla `plato`
--
ALTER TABLE `plato`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_seccion` (`id_seccion`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `seccion`
--
ALTER TABLE `seccion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `plato`
--
ALTER TABLE `plato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `seccion`
--
ALTER TABLE `seccion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedidoplato`
--
ALTER TABLE `pedidoplato`
  ADD CONSTRAINT `pedidoplato_ibfk_1` FOREIGN KEY (`id_plato`) REFERENCES `plato` (`id`),
  ADD CONSTRAINT `pedidoplato_ibfk_2` FOREIGN KEY (`id_pedido`) REFERENCES `pedido` (`id`);

--
-- Filtros para la tabla `plato`
--
ALTER TABLE `plato`
  ADD CONSTRAINT `plato_ibfk_1` FOREIGN KEY (`id_seccion`) REFERENCES `seccion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
