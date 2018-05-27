-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-05-2018 a las 18:55:52
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `taw_practica8`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `matricula` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `carrera` int(11) NOT NULL,
  `tutor` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`matricula`, `nombre`, `carrera`, `tutor`) VALUES
(1330302, 'Angela Judith', 4, '1301A'),
(1430088, 'Mario Martinez', 2, '1510M'),
(1430184, 'Manuel Rdz', 3, '2410O'),
(1530029, 'Maleny Abrego', 1, '2511G'),
(1530031, 'Dania Avila', 4, '1301A'),
(1530089, 'Angel Dayan', 2, '1510M'),
(1530302, 'Dyan Maldonado', 1, '2410O');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carraras`
--

CREATE TABLE `carraras` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `carraras`
--

INSERT INTO `carraras` (`id`, `nombre`) VALUES
(3, 'ISA'),
(1, 'ITI'),
(7, 'manofactura'),
(2, 'Mecatronica'),
(4, 'PYMES');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE `profesor` (
  `n_empleado` varchar(30) NOT NULL,
  `carrera` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `tipo_admin` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `profesor`
--

INSERT INTO `profesor` (`n_empleado`, `carrera`, `nombre`, `email`, `password`, `tipo_admin`) VALUES
('1301A', 4, 'Ana Mercedes', 'ana@correo.com', '12345', 0),
('1510M', 2, 'Mariela Reyes', 'mariela@correo.com', '123456', 0),
('2410O', 3, 'Alan Reta', 'alan@correo.com', 'RETA', 0),
('2506', 3, 'Brandon Resendiz', 'brandon@correo.com', '0987', 0),
('2511G', 1, 'admin', 'admin@gmail.com', 'admin', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tutorias`
--

CREATE TABLE `tutorias` (
  `id` int(11) NOT NULL,
  `alumno` int(11) NOT NULL,
  `tutor` varchar(30) NOT NULL,
  `fecha` varchar(30) NOT NULL,
  `hora` varchar(30) NOT NULL,
  `tipo_tutoria` int(11) NOT NULL,
  `info` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tutorias`
--

INSERT INTO `tutorias` (`id`, `alumno`, `tutor`, `fecha`, `hora`, `tipo_tutoria`, `info`) VALUES
(1, 1430088, '1510M', '2018-05-26', '09:01:04', 1, 'Hola'),
(2, 1530029, '2410O', '2018-05-27', '10:49:01 AM', 1, 'Junta'),
(3, 1530029, '2511G', '2018-05-27', '12:25:57 PM', 1, 'Justificante'),
(6, 1430088, '1510M', '2018-05-27', '02:29:19 PM', 1, 'Justificante'),
(8, 1530029, '2511G', '2018-05-27', '05:59:42 PM', 1, 'solicitar beca');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tutorias_grupales`
--

CREATE TABLE `tutorias_grupales` (
  `id` int(11) NOT NULL,
  `id_alumnos` int(11) NOT NULL,
  `id_tutoria` int(11) NOT NULL,
  `tutor` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`matricula`),
  ADD KEY `tutor` (`tutor`),
  ADD KEY `carrera` (`carrera`);

--
-- Indices de la tabla `carraras`
--
ALTER TABLE `carraras`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD PRIMARY KEY (`n_empleado`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `tutorias`
--
ALTER TABLE `tutorias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alumno` (`alumno`),
  ADD KEY `tutor` (`tutor`);

--
-- Indices de la tabla `tutorias_grupales`
--
ALTER TABLE `tutorias_grupales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_alumnos` (`id_alumnos`),
  ADD KEY `id_tutoria` (`id_tutoria`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carraras`
--
ALTER TABLE `carraras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tutorias`
--
ALTER TABLE `tutorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tutorias_grupales`
--
ALTER TABLE `tutorias_grupales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD CONSTRAINT `alumnos_ibfk_1` FOREIGN KEY (`tutor`) REFERENCES `profesor` (`n_empleado`) ON UPDATE CASCADE,
  ADD CONSTRAINT `alumnos_ibfk_2` FOREIGN KEY (`carrera`) REFERENCES `carraras` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tutorias`
--
ALTER TABLE `tutorias`
  ADD CONSTRAINT `tutorias_ibfk_1` FOREIGN KEY (`alumno`) REFERENCES `alumnos` (`matricula`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tutorias_ibfk_2` FOREIGN KEY (`tutor`) REFERENCES `profesor` (`n_empleado`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tutorias_grupales`
--
ALTER TABLE `tutorias_grupales`
  ADD CONSTRAINT `tutorias_grupales_ibfk_1` FOREIGN KEY (`id_tutoria`) REFERENCES `tutorias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tutorias_grupales_ibfk_2` FOREIGN KEY (`id_alumnos`) REFERENCES `alumnos` (`matricula`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tutorias_grupales_ibfk_3` FOREIGN KEY (`id_tutoria`) REFERENCES `tutorias` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
