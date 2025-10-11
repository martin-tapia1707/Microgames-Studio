-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-10-2025 a las 02:28:10
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
  `PuntajeMax` int(11) NOT NULL,
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
  `Nombre` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `juegos`
--

INSERT INTO `juegos` (`IDjuego`, `Nombre`) VALUES
(1, 'SpaceShip'),
(2, 'Minecraft vs Roblox'),
(3, 'Dodge'),
(4, 'Solitario');

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
(3, 'Miembro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `IDusuario` int(11) NOT NULL,
  `Nombre` varchar(40) NOT NULL,
  `Correo` varchar(255) NOT NULL,
  `Foto` varchar(255) NOT NULL,
  `Contraseña` varchar(40) NOT NULL,
  `IDrol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`IDusuario`, `Nombre`, `Correo`, `Foto`, `Contraseña`, `IDrol`) VALUES
(1, 'PuerroXeneize', 'davidquin@gmail.com', ' https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSvsyStKbhDTNBCCnjxseHhlMeC5oRFI4DAZg&s', 'LASD9', 3),
(2, 'Vegetta777', 'vegetta777@gmail.com', ' https://static.wikia.nocookie.net/karmaland/images/9/94/VEGETTA777.jpg/revision/latest?cb=20220912024105&path-prefix=es', '26062011', 3),
(3, 'quericacola', 'quericacola@gmail.com', 'https://i.ytimg.com/vi/DnSZ2qZIREU/maxres2.jpg?sqp=-oaymwEoCIAKENAF8quKqQMcGADwAQH4Ab4EgALMB4oCDAgAEAEYZSBaKE0wDw==&rs=AOn4CLDAWUanoMkDK32xZSj_xmOEDA5AtA', 'Coca-cola', 3),
(4, 'Lacobra', 'Lautaro@gmail.com', 'https://enagenda.com.ar/uploads/ckeditor/2024/12/20241229201349_img-6307.jpg', 'Colepalmercomecarne', 3),
(5, 'Elpadre', 'Elpadrecito666@gmail.com', 'https://i1.sndcdn.com/artworks-l2eLwat7RPLoz3WK-5JntIQ-t500x500.jpg', 'Cidaparati', 3);

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
  MODIFY `IDjuego` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `IDrol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `IDusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
