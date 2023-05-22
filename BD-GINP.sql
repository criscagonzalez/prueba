-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-05-2023 a las 00:21:43
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
-- Base de datos: `ginp`
--
CREATE DATABASE IF NOT EXISTS `ginp` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci;
USE `ginp`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actores`
--

CREATE TABLE `actores` (
  `id` int(11) NOT NULL,
  `estado` varchar(1) NOT NULL,
  `nombres` varchar(200) NOT NULL,
  `usuario_crea` int(11) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usuario_modifica` int(11) DEFAULT NULL,
  `fecha_modificacion` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `actores`
--

INSERT INTO `actores` (`id`, `estado`, `nombres`, `usuario_crea`, `fecha_creacion`, `usuario_modifica`, `fecha_modificacion`) VALUES
(1, 'S', 'TOM CRUISE', 1, '2023-05-20 17:03:00', 1, '2023-05-20 17:03:00'),
(2, 'S', 'ANGELINA JOLIE', 1, '2023-05-22 16:24:31', 1, '2023-05-22 16:24:31'),
(3, 'S', 'BRAD PITT', 1, '2023-05-20 16:57:20', NULL, NULL),
(4, 'S', 'JOHNNY DEPP', 1, '2023-05-22 15:17:56', 1, '2023-05-22 15:17:56'),
(5, 'S', 'LEONARDO DICAPRIO', 1, '2023-05-22 21:17:16', 1, '2023-05-22 21:17:16'),
(6, 'S', 'WILL SMITH', 1, '2023-05-22 21:30:51', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `elenco`
--

CREATE TABLE `elenco` (
  `id` int(11) NOT NULL,
  `id_pelicula` int(11) NOT NULL,
  `id_actor` int(11) NOT NULL,
  `usuario_crea` int(11) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usuario_modifica` int(11) DEFAULT NULL,
  `fecha_modificacion` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `elenco`
--

INSERT INTO `elenco` (`id`, `id_pelicula`, `id_actor`, `usuario_crea`, `fecha_creacion`, `usuario_modifica`, `fecha_modificacion`) VALUES
(2, 1, 3, 1, '2023-05-22 17:13:09', NULL, NULL),
(5, 1, 1, 1, '2023-05-22 19:22:14', NULL, NULL),
(14, 1, 4, 1, '2023-05-22 19:36:51', NULL, NULL),
(35, 6, 6, 1, '2023-05-22 22:02:24', NULL, NULL),
(37, 2, 4, 1, '2023-05-22 22:05:30', NULL, NULL),
(39, 2, 3, 1, '2023-05-22 22:14:03', NULL, NULL),
(40, 5, 5, 1, '2023-05-22 22:14:36', NULL, NULL),
(43, 1, 2, 1, '2023-05-22 22:15:07', NULL, NULL),
(44, 2, 2, 1, '2023-05-22 22:15:09', NULL, NULL),
(45, 3, 2, 1, '2023-05-22 22:15:11', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

CREATE TABLE `peliculas` (
  `id` int(11) NOT NULL,
  `estado` varchar(1) NOT NULL,
  `nombres` varchar(200) NOT NULL,
  `usuario_crea` int(11) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usuario_modifica` int(11) DEFAULT NULL,
  `fecha_modificacion` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`id`, `estado`, `nombres`, `usuario_crea`, `fecha_creacion`, `usuario_modifica`, `fecha_modificacion`) VALUES
(1, 'S', 'SR Y SRA SMITH', 1, '2023-05-22 15:24:05', 1, '2023-05-22 15:24:05'),
(2, 'S', 'EL TURISTA', 1, '2023-05-22 20:28:13', 1, '2023-05-22 20:28:13'),
(3, 'S', 'MALEFICA', 1, '2023-05-22 20:35:54', NULL, NULL),
(4, 'S', 'TOP GUN', 1, '2023-05-22 21:11:10', NULL, NULL),
(5, 'S', 'TITANIC', 1, '2023-05-22 21:18:15', 1, '2023-05-22 21:18:15'),
(6, 'S', 'SOY LEYENDA', 1, '2023-05-22 21:35:40', 1, '2023-05-22 21:35:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `estado` varchar(1) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `usuario_crea` int(11) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `usuario_modifica` int(11) DEFAULT NULL,
  `fecha_modificacion` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `estado`, `usuario`, `password`, `tipo`, `usuario_crea`, `fecha_creacion`, `usuario_modifica`, `fecha_modificacion`) VALUES
(1, 'S', 'admin', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'admin', 1, '2023-05-22 15:02:56', NULL, '2023-05-22 15:02:56'),
(2, 'S', 'usuario', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'user', 0, '2023-05-22 15:02:48', NULL, '2023-05-22 15:02:48'),
(21, 'S', 'pruebas', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'user', 0, '2023-05-22 21:29:55', NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actores`
--
ALTER TABLE `actores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_crea` (`usuario_crea`,`usuario_modifica`),
  ADD KEY `usuario_modifica` (`usuario_modifica`);

--
-- Indices de la tabla `elenco`
--
ALTER TABLE `elenco`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pelicula` (`id_pelicula`,`id_actor`,`usuario_crea`,`usuario_modifica`),
  ADD KEY `id_actor` (`id_actor`),
  ADD KEY `usuario_crea` (`usuario_crea`),
  ADD KEY `usuario_modifica` (`usuario_modifica`);

--
-- Indices de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombres` (`nombres`),
  ADD KEY `usuario_crea` (`usuario_crea`,`usuario_modifica`),
  ADD KEY `usuario_modifica` (`usuario_modifica`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD KEY `usuario_crea` (`usuario_crea`,`usuario_modifica`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actores`
--
ALTER TABLE `actores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `elenco`
--
ALTER TABLE `elenco`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actores`
--
ALTER TABLE `actores`
  ADD CONSTRAINT `actores_ibfk_1` FOREIGN KEY (`usuario_crea`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `actores_ibfk_2` FOREIGN KEY (`usuario_modifica`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `elenco`
--
ALTER TABLE `elenco`
  ADD CONSTRAINT `elenco_ibfk_1` FOREIGN KEY (`id_pelicula`) REFERENCES `peliculas` (`id`),
  ADD CONSTRAINT `elenco_ibfk_2` FOREIGN KEY (`id_actor`) REFERENCES `actores` (`id`),
  ADD CONSTRAINT `elenco_ibfk_3` FOREIGN KEY (`usuario_crea`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `elenco_ibfk_4` FOREIGN KEY (`usuario_modifica`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD CONSTRAINT `peliculas_ibfk_1` FOREIGN KEY (`usuario_crea`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `peliculas_ibfk_2` FOREIGN KEY (`usuario_modifica`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
