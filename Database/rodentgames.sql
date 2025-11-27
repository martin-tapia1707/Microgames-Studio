-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-11-2025 a las 01:54:53
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
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `IDcategoria` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`IDcategoria`, `nombre`) VALUES
(1, 'acción'),
(2, 'puzzle'),
(3, 'ritmo'),
(4, 'agilidad'),
(5, 'populares'),
(6, 'casual'),
(7, '2 jugadores'),
(8, 'plataformeros');

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

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`IDcomentario`, `texto`, `fecha`, `IDusuario`, `valorLike`) VALUES
(1, 'hola', '2025-11-15', 15, NULL),
(2, 'SADASDAS', '2025-11-18', 1, NULL),
(3, 'Baggen es el hijo de escobar', '2025-11-23', 1, NULL),
(4, 'Hijito ponga la descripcion', '2025-11-23', 16, NULL),
(5, 'Nigga', '2025-11-23', 16, NULL),
(6, 'Fuerza Scrum master', '2025-11-23', 16, NULL);

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
(15, 5, 0, 1);

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
  `noLike` int(11) DEFAULT 0,
  `Controles` text NOT NULL,
  `Creador` varchar(255) DEFAULT NULL,
  `Pagina` text DEFAULT NULL,
  `imagen` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `juegos`
--

INSERT INTO `juegos` (`IDjuego`, `Nombre`, `ComoJugar`, `QueHacer`, `direccion`, `siLike`, `noLike`, `Controles`, `Creador`, `Pagina`, `imagen`) VALUES
(0, 'Cairn', 'Bear lore >>> fishmierda', 'Wolf lore >>> Better caul saul', '../Godot/Cairn/cairn.html', 0, 0, 'controles NIGGA(tapia)', 'rubic, torcado, Camelot, Kavol', 'https://rubic.itch.io/cairn', '../Godot/Cairn/Cairn.icon.png'),
(5, 'Station Defenders', 'Elimina a la naves enemigas clickeando en dirección a las mismas para eliminarlas, cada vez el enemigo cobrara mas fuerza, resiste el mayor tiempo posible a sus ataques', 'Defenderte de naves enemigas que tratarán de atacarte, intentando irrumpir en tu estación espacial', '../Godot/Space/StationDefenders.html', 1, 0, 'Click = Disparar\r\nCursor = Mover cañon ', 'Otra vez el duo pe', 'Marcelo vs Nilton ', '../IMG/IconoJuego.jpg'),
(7, 'Silhouette Showdown', 'Para controlar la Silueta utiliza WASD para moverte y Espacio para atacar, tendrás dos modos, el Singleplayer donde superaras los dos niveles disponibles y el multijugador, donde combatiras con un jugador a parte en una batalla al mas estilo clasico de Mo', 'Sos una Silueta que lucha contra enemigos durante tu travesía, tenes que superar los niveles que se presentarán y en tu camino venceras a tus enemigos y abriras puertas', '../Godot/StickFight/StickFight.html', 0, 0, 'W = Saltar\r\nA = Izquierda\r\nS = Agacharse\r\nD = Derecha\r\nEspacio = Atacar', 'Weenter', 'https://weentermakesgames.itch.io/silhouette-showdown', '../Godot/StickFight/StickFight.icon.png'),
(8, 'Nokia Bird 3310', 'Es una recreación de el  mítico juego FlappyBird solo que en la perspectiva de un Nokia antiguo\r\nLa cosa es facil, deberás sumar el mayor puntaje posible evitando chocar con las tuberías!', 'Apretando espacio el pájaro irá avanzando por lo que deberás sobrevivir evitando chocar con las tuberías', '../Godot/NokiaBird/NokiaBird.html', 0, 0, 'Espacio = Saltar', 'Skinner Space', 'https://skinner-space.itch.io/nokia-bird-3310', '../Godot/NokiaBird/NokiaBird.icon.png'),
(9, 'FishBall', 'Esto es simple, es por asi decirlo un Futbol Acuático en el cual deberás meter gol a el pez rival empujando la pelota hacia su area', 'Deberás apretar las teclas W y S para moverte arriba y abajo, en caso de ser jugador 2 apretaras las respectivas flechas', '../Godot/FishBall/FishBall.html', 0, 0, 'W = Arriba\r\nS = Abajo\r\nArrowUp = Arriba\r\nArrowDown = Abajo', 'PossiblyAxolotl', 'https://possiblyaxolotl.itch.io/fishball', '../Godot/FishBall/FishBall.icon.png'),
(10, 'SpacePong', 'La temática es un Pong ambientado en el espacio y tu personaje es una nave espacial, esta mezclado con el Futbol ya que tendrás arcos pero la pelota tendrá las físicas del Pong.', 'Te enfrentarás a 3 naves que intentaran meter la pelota en tu arco, deberás evitarlas y de paso intentar meter gol', '../Godot/SpacePong/SpacePong.html', 0, 0, 'W = Arriba\r\nA = Izquierda\r\nS = Abajo\r\nD = Derecha', 'Kiwi', 'https://kiwigamedev.itch.io/space-pong', '../Godot/SpacePong/SpacePong.icon.png'),
(11, 'Cat in a Wagon!', 'Deberas avanzar lo mas que puedas sin que se caiga el Gato!', 'Tenés que avanzar cuidadosamente evitando los obstáculos que se irán presentando a medida que logres avanzar y sumar el mayor puntaje posible', '../Godot/CarCat/CarCat.html', 0, 0, 'D = Avanzar\r\nArrowRight = Avanzar', 'Lazy Toad Studios', 'https://lazy-toad-studios.itch.io/cat-in-a-wagon', '../Godot/CarCat/CarCat.icon.png'),
(12, 'We hate this Cube!', 'Deberas hacer desaparecer el cubo antes de que se termine el contador que aparecerá en pantalla', 'Es una prueba de agilidad, tenés que clickeas el cubo rapido para ir eliminando sus fragmentos y eliminarlo por completo antes de que el contador llegue a 0', '../Godot/HateCube/HateCube.html', 0, 0, 'Click = Eliminar cuadrado', 'Sol, FmladGames, Crosp', 'https://solroo.itch.io/we-hate-this-cube', '../Godot/HateCube/HateCube.icon.png'),
(13, 'KeySpace', 'Poner la descripcion', 'poner descripcion nigga', '../Godot/KeySpace/KeySpace.html', 0, 0, 'Wolf lore', 'Jon Topielski', 'https://jontopielski.itch.io/keyspace', '../Godot/KeySpace/KeySpace.icon.png'),
(14, 'TooFast', 'Descripcion NIGGA', 'Otra descripcion Nigga', '../Godot/TooFast/TooFast.html', 0, 0, 'controles NIGGA', 'Play Don\'t Tell', 'https://playdonttell.itch.io/too-fast', '../Godot/TooFast/TooFast.icon.png'),
(15, 'Rubblar', 'Descripcion NIGGA', 'Otra descripcion Nigga', '../Godot/Rubblar/Rubblar.html', 0, 0, 'controles NIGGA', 'Sander Vanhove, Tibo', 'https://sandervanhove.itch.io/rubblar', '../Godot/Rubblar/Rubblar.icon.png'),
(16, 'Cursor Drifter', 'Como me hace laburar mi hijo', 'Wolf Lore >>> Breaking Bad', '../Godot/CursorDrifter/CursorDrifter.html', 0, 0, 'controles NIGGA', 'Semyon Kotelnikov', 'https://soffu.itch.io/cursor-drifter', '../Godot/CursorDrifter/CursorDrifter.icon.png'),
(17, 'SokoStriker', 'Como me hace laburar este hdp', 'Lo peor que los demas son todos seca nucas', '../Godot/SokoStriker/SokoStriker.html', 0, 0, 'controles NIGGA', 'Axylaric', 'https://axylaric.itch.io/soko-striker', '../Godot/SokoStriker/SokoStriker.icon.png'),
(19, 'starcatcher', 'Descripcion NIGGA', 'Otra descripcion Nigga', '../Godot/starcatcher/starcatcher.html', 0, 0, 'controles NIGGA', 'Escada Games', 'https://escada-games.itch.io/starcatcher', '../Godot/starcatcher/starcatcher.icon.png'),
(20, 'Sunset Shaped', 'Descripcion NIGGA', 'Otra descripcion Nigga', '../Godot/../Godot/SunsetShaped/SunsetShaped.html', 0, 0, 'controles NIGGA', 'bucketfish', 'https://bucketfish.itch.io/sunset-shaped', '../Godot/SunsetShaped/SunsetShaped.icon.png'),
(21, 'SuperTux', 'Descripcion NIGGA', 'Otra descripcion Nigga', '../Godot/SuperTux/index.html', 0, 0, 'controles NIGGA', 'Alzter', 'https://alzter-s.itch.io/supertux-classic', '../Godot/SuperTux/index.icon.png'),
(22, 'Reincarnage', 'Descripcion NIGGA', 'Otra descripcion Nigga', '../Godot/Reincarnage/Reincarnage.html', 0, 0, 'controles NIGGA', 'Paper Hat Projects', 'https://paperhatprojects.itch.io/reincarnage', '../Godot/Reincarnage/Reincarnage.icon.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juego_categoria`
--

CREATE TABLE `juego_categoria` (
  `IDjuego` int(11) NOT NULL,
  `IDcategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `juego_categoria`
--

INSERT INTO `juego_categoria` (`IDjuego`, `IDcategoria`) VALUES
(5, 4),
(7, 4),
(8, 4),
(9, 6),
(10, 4),
(11, 6),
(12, 4),
(13, 6),
(15, 6),
(21, 8);

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
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`IDcategoria`);

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
-- Indices de la tabla `juego_categoria`
--
ALTER TABLE `juego_categoria`
  ADD PRIMARY KEY (`IDjuego`,`IDcategoria`),
  ADD KEY `IDcategoria` (`IDcategoria`);

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
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `IDcategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `IDcomentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `juegos`
--
ALTER TABLE `juegos`
  MODIFY `IDjuego` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
-- Filtros para la tabla `juego_categoria`
--
ALTER TABLE `juego_categoria`
  ADD CONSTRAINT `juego_categoria_ibfk_1` FOREIGN KEY (`IDjuego`) REFERENCES `juegos` (`IDjuego`) ON DELETE CASCADE,
  ADD CONSTRAINT `juego_categoria_ibfk_2` FOREIGN KEY (`IDcategoria`) REFERENCES `categorias` (`IDcategoria`) ON DELETE CASCADE;

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
