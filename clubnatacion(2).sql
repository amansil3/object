-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-08-2018 a las 15:18:17
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `clubnatacion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades`
--

CREATE TABLE `actividades` (
  `id_actividad` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `nivel` varchar(15) DEFAULT NULL,
  `personal_id` int(11) DEFAULT NULL,
  `cupos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `actividades`
--

INSERT INTO `actividades` (`id_actividad`, `nombre`, `nivel`, `personal_id`, `cupos`) VALUES
(1, 'Natación', 'Inicial', 1, 30),
(2, 'Natación', 'Intermedio', 1, 30),
(3, 'Natación', 'Avanzado', 2, 30),
(4, 'Aquagym', 'Inicial', 3, 15),
(5, 'Aquagym', 'Intermedio', 3, 15),
(6, 'Aquagym', 'Intermedio', 3, 15),
(7, 'Nado Libre', NULL, NULL, 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personales`
--

CREATE TABLE `personales` (
  `id_personal` int(11) NOT NULL,
  `labor` varchar(30) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `DNI` int(11) NOT NULL,
  `fecha_ingreso_laboral` date NOT NULL,
  `telefono` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `personales`
--

INSERT INTO `personales` (`id_personal`, `labor`, `nombre`, `apellido`, `DNI`, `fecha_ingreso_laboral`, `telefono`) VALUES
(1, 'Profesor', 'Juan', 'Perez', 39369741, '2018-07-06', 4493473),
(2, 'Profesor', 'Pamela', 'Suárez', 33011224, '0005-07-11', 4493473),
(3, 'Profesor', 'Matias', 'Solano', 31900054, '2018-07-06', 4302989),
(4, 'Seguridad', 'James', 'Rodriguez', 20156741, '2018-07-06', 4805452),
(5, 'Seguridad', 'Jefferson', 'Da Silva', 9154789, '2018-07-06', 4105479),
(6, 'Administrativo/a', 'Carolina', 'Jerez', 33756731, '2018-07-06', 4632525),
(7, 'Administrativo/a', 'Maximiliano', 'Sanchez', 39412589, '2018-07-06', 4915230),
(8, 'Administrativo/a', 'German', 'Novelli', 36584195, '2018-07-06', 4301319),
(9, 'Limpieza', 'Lorena', 'Chazarreta', 38485795, '2018-07-06', 4258762),
(10, 'Limpieza', 'Gustavo', 'Fernandez', 39472795, '2018-07-06', 4408320),
(11, 'Guardavidas', 'Fernando', 'Pajaro', 12457842, '2018-07-06', 4805420),
(12, 'Guardavidas', 'Ludmila', 'Soria', 30257842, '2018-07-06', 4217489);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `socios`
--

CREATE TABLE `socios` (
  `id_socio` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `telefono` int(11) NOT NULL,
  `DNI` int(11) NOT NULL,
  `direccion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `socios`
--

INSERT INTO `socios` (`id_socio`, `nombre`, `apellido`, `telefono`, `DNI`, `direccion`) VALUES
(1, 'Barbara', 'Gimenez', 4156264, 39354712, 'San Lorenzo 3309'),
(2, 'Carmen', 'Gomez', 4116274, 28354477, 'Santa Fe 599'),
(3, 'Luis', 'Gomez', 4116274, 37124567, 'Santa Fe 599'),
(4, 'Juan', 'Soria', 4805333, 30241785, 'Laprida 4178'),
(5, 'Jorge', 'Marini', 4403437, 17201459, 'Maipu 1641'),
(6, 'María', 'Farías', 4971412, 11245178, 'Sánchez de Bustamante 3120'),
(7, 'Rodrigo', 'Kiffmeyer', 4512935, 37154206, 'Córdoba 1151 PB'),
(8, 'Nicolás', 'Parissiene', 4871346, 39054208, 'Zeballos 315 10° D'),
(9, 'Guido', 'Bustamante', 4301977, 38112293, 'Pje. Noruega 3150'),
(10, 'Franco', 'Legarreta', 4314869, 39152634, 'Montevideo 3328'),
(11, 'Ignacio', 'Guzman', 4659502, 38142209, 'La República 3402'),
(12, 'Azul', 'Napolitano', 4409730, 39540975, 'Dorrego 1670 7° A'),
(13, 'Maria Fernanda', 'de Virgiliis', 4305469, 39645033, 'San Lorenzo 5587 1° C'),
(14, 'Angélica', 'Aquino', 4305801, 34478902, 'Vera Mújica 601 1°C'),
(15, 'Agustin', 'Marini', 4115252, 37852309, '9 de Julio 106 1° C'),
(17, 'Alf', 'Melman', 123, 123, 'Calle Falsa 123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `socio_actividad`
--

CREATE TABLE `socio_actividad` (
  `socio_id` int(11) NOT NULL,
  `actividad_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `socio_actividad`
--

INSERT INTO `socio_actividad` (`socio_id`, `actividad_id`) VALUES
(1, 1),
(2, 1),
(3, 2),
(4, 2),
(5, 1),
(6, 2),
(7, 3),
(8, 5),
(9, 5),
(9, 6),
(10, 6),
(11, 7),
(12, 7),
(13, 1),
(14, 4),
(15, 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD PRIMARY KEY (`id_actividad`),
  ADD KEY `profesor_id` (`personal_id`);

--
-- Indices de la tabla `personales`
--
ALTER TABLE `personales`
  ADD PRIMARY KEY (`id_personal`);

--
-- Indices de la tabla `socios`
--
ALTER TABLE `socios`
  ADD PRIMARY KEY (`id_socio`);

--
-- Indices de la tabla `socio_actividad`
--
ALTER TABLE `socio_actividad`
  ADD PRIMARY KEY (`socio_id`,`actividad_id`),
  ADD KEY `actividad_id` (`actividad_id`),
  ADD KEY `socio_id` (`socio_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `socios`
--
ALTER TABLE `socios`
  MODIFY `id_socio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD CONSTRAINT `actividades_ibfk_1` FOREIGN KEY (`personal_id`) REFERENCES `personales` (`id_personal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `socio_actividad`
--
ALTER TABLE `socio_actividad`
  ADD CONSTRAINT `socio_actividad_ibfk_1` FOREIGN KEY (`socio_id`) REFERENCES `socios` (`id_socio`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `socio_actividad_ibfk_2` FOREIGN KEY (`actividad_id`) REFERENCES `actividades` (`id_actividad`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
