-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-11-2025 a las 09:08:10
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mvc_blog`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `id_articulo` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `contenido` text NOT NULL,
  `fecha_publicacion` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `categoria` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `categoria`) VALUES
(1, 'Front End'),
(2, 'Back End');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `token` text NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contrasenia` varchar(255) NOT NULL,
  `intentos_fallidos` int(11) NOT NULL DEFAULT 0,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `token`, `usuario`, `email`, `contrasenia`, `intentos_fallidos`, `fecha_registro`) VALUES
(1, '', 'xavier', 'xavier@gmail.com', '123456', 0, '2025-11-06 06:33:04'),
(2, '', 'Diego', 'diego@gmail.com', '123456', 0, '2025-11-06 08:14:36'),
(3, '', 'xavier12', 'xavier12@gmail.com', '1234', 0, '2025-11-06 09:39:20'),
(4, '', 'xavier2', 'xavier2@gmail.com', '123', 0, '2025-11-06 17:37:25'),
(5, '', 'Paul', 'paul@gmail.com', '123456', 0, '2025-11-07 06:19:36'),
(6, 'Diegoo', 'xavier123@gmail.com', '123456', '1f3f805b5b1c59ae524b2cbee06a5204+xavier123@gmail.com', 0, '2025-11-07 07:47:54'),
(7, '719ef271d38a388fd7b2bc967f4bd885+king@gmail.com', 'King', 'king@gmail.com', '123', 0, '2025-11-07 07:59:48'),
(8, '5ac562a87bfdcb86a345629bfa121efd', 'sool', 'sool@gmail.com', '123', 0, '2025-11-07 08:04:04'),
(9, '12c509a37f87fa4b4c579491e8408d8c', 'xavierdiego', 'xavierdiego@gmail.com', '$6$rounds=xavier$h8G4tSVj7MEaRNUO4Yt1xqFsW.wR2CNrytJFXb/.d7l8/WW4a7d5foa7ZOD22VVMd6jJgHGhPRmi.IW3f2xL4/', 0, '2025-11-07 20:28:26'),
(10, '9a8fdd5efe165ddd1c0c6fede0078194', 'lucas', 'lucas@gmail.com', '*0', 0, '2025-11-07 20:34:26'),
(11, '58435c9000af7c25dbc72c877e84527c', 'xavierking', 'xavier23@gmail.com', '*0', 0, '2025-11-07 20:52:19'),
(12, 'ce7bef94d16c60271902cd7a241f90e1', 'holaa', 'holaa@gmail.com', '$6$rounds=xavier$ZphvHNh519SuIP.hyKfkVJw/tyBN2Nalh/YPoElQQQXXUy0uXyYzvqiWCGBsM2R/oAoFB1LKCRbCgGQdOsC8b/', 0, '2025-11-07 20:56:36'),
(13, '01f554427f53e29f90327a1f00f8baf3', 'Dianaa', 'diana1@gmail.com', '$6$rounds=xavier$ycvMgSrNEvD6My4Aq0hiHLgOsNJNOLd2bLJQiHkLoAk276gv1c9/u0LuxyNGWgBRjEjxYz.vRRkYetsiCGzvT0', 0, '2025-11-11 22:43:27'),
(14, '6b97b37e07243c60b8769f5c8ee0b232', 'Diegooo', 'diegooo@gmail.com', '$6$rounds=xavier$WZeOe0YvP9hywFRVAivzPS7mCwC31NSNd6pzpK2mjkEnte6BAlqoteTRXR9ihAOoRXWXAoQxoZ8DU/9cNRzKy0', 0, '2025-11-15 06:32:55');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`id_articulo`),
  ADD KEY `fk_articulos_usuario` (`id_usuario`),
  ADD KEY `fk_articulos_categoria` (`id_categoria`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`),
  ADD UNIQUE KEY `categoria` (`categoria`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `id_articulo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
