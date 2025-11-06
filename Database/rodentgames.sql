-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-11-2025 a las 07:31:25
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
-- Base de datos: `rodentgames`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `IDcomentario` int(11) NOT NULL,
  `texto` varchar(255) NOT NULL,
  `fecha` date NOT NULL,
  `IDusuario` int(11) NOT NULL,
  `valorLike` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informacion`
--

CREATE TABLE `informacion` (
  `IDusuario` int(11) NOT NULL,
  `IDjuego` int(11) NOT NULL,
  `PuntajeMax` int(11) NOT NULL DEFAULT 0,
  `Pulgar` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `informacion`
--

INSERT INTO `informacion` (`IDusuario`, `IDjuego`, `PuntajeMax`, `Pulgar`) VALUES
(1, 1, 500, 1),
(1, 2, 700, 0),
(2, 1, 200, 1),
(3, 2, 100, NULL),
(4, 2, 800, NULL),
(4, 3, 200, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juegos`
--

CREATE TABLE `juegos` (
  `IDjuego` int(11) NOT NULL,
  `Nombre` varchar(40) NOT NULL,
  `ComoJugar` varchar(255) DEFAULT NULL,
  `QueHacer` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `siLike` int(11) DEFAULT 0,
  `noLike` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `juegos`
--

INSERT INTO `juegos` (`IDjuego`, `Nombre`, `ComoJugar`, `QueHacer`, `direccion`, `siLike`, `noLike`) VALUES
(1, 'SpaceShip', NULL, NULL, NULL, 0, 0),
(2, 'Minecraft vs Roblox', NULL, NULL, NULL, 0, 0),
(3, 'Dodge', NULL, NULL, NULL, 0, 0),
(4, 'Solitario', NULL, NULL, NULL, 0, 0),
(5, 'Station Defenders', 'Elimina a la naves enemigas clickeando en dirección a las mismas para eliminarlas, cada vez el enemigo cobrara mas fuerza, resiste el mayor tiempo posible a sus ataques', 'Defenderte de naves enemigas que tratarán de atacarte, intentando irrumpir en tu estación espacial', '../Godot/Space/StationDefenders.html', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opiniones`
--

CREATE TABLE `opiniones` (
  `IDcomentario` int(11) NOT NULL,
  `IDjuego` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `IDrol` int(11) NOT NULL,
  `rol` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`IDrol`, `rol`) VALUES
(1, 'Moderador'),
(2, 'Product Owner'),
(3, 'Miembro'),
(4, 'Editor'),
(5, 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `IDusuario` int(11) NOT NULL,
  `Nombre` varchar(40) NOT NULL,
  `Correo` varchar(255) NOT NULL,
  `Foto` text NOT NULL DEFAULT '../IMGU/defaulPerfil.jpg',
  `Contraseña` varchar(40) NOT NULL,
  `Descripcion` varchar(255) DEFAULT 'Descrpcion aqui',
  `IDrol` int(11) NOT NULL DEFAULT 3
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`IDusuario`, `Nombre`, `Correo`, `Foto`, `Contraseña`, `Descripcion`, `IDrol`) VALUES
(1, 'PuerroXeneize', 'davidquin@gmail.com', '../IMGU/channels4_profile.jpg', 'LASD9', 'El manchester united no perdio, aprendio - PuerroXeneize\r\n', 3),
(2, 'Vegetta777', 'vegetta777@gmail.com', '../IMGU/VEGETTA777.webp', '26062011', 'Hey, muy buenas a todos, guapísimos, aquí vegetta 777', 3),
(3, 'quericacola', 'quericacola@gmail.com', '../IMGU/maxres2.jpg', 'Coca-cola', 'Que ricacola ah Putaquericacola eh', 3),
(4, 'Lacobra', 'Lautaro@gmail.com', '../IMGU/20241229201349_img-6307.jpg', 'Colepalmercomecarne', 'bueeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee', 3),
(5, 'Elpadre', 'Elpadrecito666@gmail.com', '../IMGU/artworks-l2eLwat7RPLoz3WK-5JntIQ-t500x500.jpg', 'Cidaparati', 'Cida parati hijo del diablo\r\n\r\n', 3),
(15, 'Baggen', 'tapiamartin590@gmail.com', '../IMGU/Tapia.jpg', 'Marcelo>>Tapia', 'Descrpcion aqui', 5),
(16, 'Xblom', 'agustinescobar978@gmail.com', '../IMGU/escobar.webp', 'BosteroSoy', 'Pierde Boca, Pierde Proyecto \r\n', 5),
(22, 'editor', 'editor@gmail.com', '../IMGU/DefaulPerfil.jpg', '12345', 'Como me hacen trabajar la ptm', 4),
(23, 'admin', 'admin@gmail.com', '../IMGU/defaulPerfil.jpg', '12345', 'O ponen la linea 4-5-1 o ponemos una bomba en la casa de riquelme\r\n', 5),
(24, 'moderador', 'moderador@gmail.com', '../IMGU/defaulPerfil.jpg', '12345', 'Camiseta blanca >> Camiseta amarilla', 1),
(25, 'owner', 'owner@gmail.com', '../IMGU/defaulPerfil.jpg', '12345', '', 2),
(29, 'Prueba', 'Prueba@gmail.com', '../IMGU/DefaulPerfil.jpg', '12345', '', 3),
(34, 'vepe', 'vepeyo3644@keevle.com', '../IMGU/defaulPerfil.jpg', '12345', 'Descrpcion aqui', 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`IDcomentario`),
  ADD KEY `FK_comentario_usuario` (`IDusuario`);

--
-- Indices de la tabla `informacion`
--
ALTER TABLE `informacion`
  ADD PRIMARY KEY (`IDusuario`,`IDjuego`),
  ADD KEY `fk_TenerPuntos_juegos` (`IDjuego`);

--
-- Indices de la tabla `juegos`
--
ALTER TABLE `juegos`
  ADD PRIMARY KEY (`IDjuego`);

--
-- Indices de la tabla `opiniones`
--
ALTER TABLE `opiniones`
  ADD PRIMARY KEY (`IDcomentario`,`IDjuego`),
  ADD KEY `FK_opiniones_juegos` (`IDjuego`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`IDrol`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`IDusuario`),
  ADD UNIQUE KEY `Nombre` (`Nombre`),
  ADD UNIQUE KEY `Correo` (`Correo`),
  ADD KEY `FK_usuario_roles` (`IDrol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `IDcomentario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `juegos`
--
ALTER TABLE `juegos`
  MODIFY `IDjuego` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `IDrol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `IDusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `FK_comentario_usuario` FOREIGN KEY (`IDusuario`) REFERENCES `usuario` (`IDusuario`);

--
-- Filtros para la tabla `informacion`
--
ALTER TABLE `informacion`
  ADD CONSTRAINT `fk_TenerPuntos_juegos` FOREIGN KEY (`IDjuego`) REFERENCES `juegos` (`IDjuego`),
  ADD CONSTRAINT `fk_TenerPuntos_usuario` FOREIGN KEY (`IDusuario`) REFERENCES `usuario` (`IDusuario`);

--
-- Filtros para la tabla `opiniones`
--
ALTER TABLE `opiniones`
  ADD CONSTRAINT `FK_opiniones_comentarios` FOREIGN KEY (`IDcomentario`) REFERENCES `comentario` (`IDcomentario`),
  ADD CONSTRAINT `FK_opiniones_juegos` FOREIGN KEY (`IDjuego`) REFERENCES `juegos` (`IDjuego`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `FK_usuario_roles` FOREIGN KEY (`IDrol`) REFERENCES `roles` (`IDrol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
