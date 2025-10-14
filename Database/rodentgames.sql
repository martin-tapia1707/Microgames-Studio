-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2025 at 02:29 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rodentgames`
--

-- --------------------------------------------------------

--
-- Table structure for table `comentario`
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
-- Table structure for table `informacion`
--

CREATE TABLE `informacion` (
  `IDusuario` int(11) NOT NULL,
  `IDjuego` int(11) NOT NULL,
  `PuntajeMax` int(11) NOT NULL,
  `Pulgar` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `informacion`
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
-- Table structure for table `juegos`
--

CREATE TABLE `juegos` (
  `IDjuego` int(11) NOT NULL,
  `Nombre` varchar(40) NOT NULL,
  `ComoJugar` varchar(255) DEFAULT NULL,
  `QueHacer` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `juegos`
--

INSERT INTO `juegos` (`IDjuego`, `Nombre`, `ComoJugar`, `QueHacer`) VALUES
(1, 'SpaceShip', NULL, NULL),
(2, 'Minecraft vs Roblox', NULL, NULL),
(3, 'Dodge', NULL, NULL),
(4, 'Solitario', NULL, NULL),
(5, 'Station Defenders', 'Elimina a la naves enemigas clickeando en dirección a las mismas para eliminarlas, cada vez el enemigo cobrara mas fuerza, resiste el mayor tiempo posible a sus ataques', 'Defenderte de naves enemigas que tratarán de atacarte, intentando irrumpir en tu estación espacial');

-- --------------------------------------------------------

--
-- Table structure for table `opiniones`
--

CREATE TABLE `opiniones` (
  `IDcomentario` int(11) NOT NULL,
  `IDjuego` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `IDrol` int(11) NOT NULL,
  `rol` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`IDrol`, `rol`) VALUES
(1, 'Moderador'),
(2, 'Product Owner'),
(3, 'Miembro');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `IDusuario` int(11) NOT NULL,
  `Nombre` varchar(40) NOT NULL,
  `Correo` varchar(255) NOT NULL,
  `Foto` varchar(255) NOT NULL DEFAULT '../IMGU/defaulPerfil.css',
  `Contraseña` varchar(40) NOT NULL,
  `Descripcion` varchar(255) DEFAULT 'Descrpcion aqui',
  `IDrol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`IDusuario`, `Nombre`, `Correo`, `Foto`, `Contraseña`, `Descripcion`, `IDrol`) VALUES
(1, 'PuerroXeneize', 'davidquin@gmail.com', '../IMGU/channels4_profile.jpg', 'LASD9', 'El manchester united no perdio, aprendio - PuerroXeneize\r\n', 3),
(2, 'Vegetta777', 'vegetta777@gmail.com', '../IMGU/VEGETTA777.webp', '26062011', 'Descrpcion aqui', 3),
(3, 'quericacola', 'quericacola@gmail.com', '../IMGU/maxres2.jpg', 'Coca-cola', 'Descrpcion aqui', 3),
(4, 'Lacobra', 'Lautaro@gmail.com', '../IMGU/20241229201349_img-6307.jpg', 'Colepalmercomecarne', 'Descrpcion aqui', 3),
(5, 'Elpadre', 'Elpadrecito666@gmail.com', '../IMGU/artworks-l2eLwat7RPLoz3WK-5JntIQ-t500x500.jpg', 'Cidaparati', 'Descrpcion aqui', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`IDcomentario`),
  ADD KEY `FK_comentario_usuario` (`IDusuario`);

--
-- Indexes for table `informacion`
--
ALTER TABLE `informacion`
  ADD PRIMARY KEY (`IDusuario`,`IDjuego`),
  ADD KEY `fk_TenerPuntos_juegos` (`IDjuego`);

--
-- Indexes for table `juegos`
--
ALTER TABLE `juegos`
  ADD PRIMARY KEY (`IDjuego`);

--
-- Indexes for table `opiniones`
--
ALTER TABLE `opiniones`
  ADD PRIMARY KEY (`IDcomentario`,`IDjuego`),
  ADD KEY `FK_opiniones_juegos` (`IDjuego`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`IDrol`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`IDusuario`),
  ADD KEY `FK_usuario_roles` (`IDrol`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comentario`
--
ALTER TABLE `comentario`
  MODIFY `IDcomentario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `juegos`
--
ALTER TABLE `juegos`
  MODIFY `IDjuego` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `IDrol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `IDusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `FK_comentario_usuario` FOREIGN KEY (`IDusuario`) REFERENCES `usuario` (`IDusuario`);

--
-- Constraints for table `informacion`
--
ALTER TABLE `informacion`
  ADD CONSTRAINT `fk_TenerPuntos_juegos` FOREIGN KEY (`IDjuego`) REFERENCES `juegos` (`IDjuego`),
  ADD CONSTRAINT `fk_TenerPuntos_usuario` FOREIGN KEY (`IDusuario`) REFERENCES `usuario` (`IDusuario`);

--
-- Constraints for table `opiniones`
--
ALTER TABLE `opiniones`
  ADD CONSTRAINT `FK_opiniones_comentarios` FOREIGN KEY (`IDcomentario`) REFERENCES `comentario` (`IDcomentario`),
  ADD CONSTRAINT `FK_opiniones_juegos` FOREIGN KEY (`IDjuego`) REFERENCES `juegos` (`IDjuego`);

--
-- Constraints for table `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `FK_usuario_roles` FOREIGN KEY (`IDrol`) REFERENCES `roles` (`IDrol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
