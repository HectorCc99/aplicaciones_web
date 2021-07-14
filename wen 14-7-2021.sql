-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-07-2021 a las 01:29:10
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `wen`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad_recreativa`
--

CREATE TABLE `actividad_recreativa` (
  `id_actividad` int(11) NOT NULL,
  `id_administrador` int(11) DEFAULT NULL,
  `nombre_actividad` varchar(100) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `tipo_actividad` int(11) DEFAULT NULL,
  `estatus_actividad` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `actividad_recreativa`
--

INSERT INTO `actividad_recreativa` (`id_actividad`, `id_administrador`, `nombre_actividad`, `descripcion`, `fecha_creacion`, `tipo_actividad`, `estatus_actividad`) VALUES
(1, NULL, 'Futbol Americano', 'Esta es la descripcion de un deporte', '2021-07-12 23:03:54', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad_recursos`
--

CREATE TABLE `actividad_recursos` (
  `id_actividad_recurso` int(11) NOT NULL,
  `id_actividad` int(11) DEFAULT NULL,
  `id_recurso` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `notas` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id_admin` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `fecha_alta` datetime DEFAULT NULL,
  `estatus_admin` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivos`
--

CREATE TABLE `archivos` (
  `id_archivo` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_administrador` int(11) DEFAULT NULL,
  `nombre_archivo` varchar(500) DEFAULT NULL,
  `path_archivo` text DEFAULT NULL,
  `fecha_aprobacion` datetime DEFAULT NULL,
  `notas` text DEFAULT NULL,
  `semestre` varchar(50) DEFAULT NULL,
  `estatus_aprobado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

CREATE TABLE `carreras` (
  `id_carrera` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `carreras`
--

INSERT INTO `carreras` (`id_carrera`, `nombre`) VALUES
(1001, 'Administración'),
(1002, 'Contaduría'),
(1003, 'Informática'),
(1004, 'Ingeniería Agrícola'),
(1005, 'Ingeniería Industrial'),
(1006, 'Ingeniería en Telecomunicaciones, Sistemas y Electrónica'),
(1007, 'Ingeniería Mecánica Eléctrica'),
(1008, 'Medicina Veterinaria y Zootecnia'),
(1009, 'Tecnología');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `espacio_recreativo`
--

CREATE TABLE `espacio_recreativo` (
  `id_espacio` int(11) NOT NULL,
  `nombre_espacio` varchar(100) DEFAULT NULL,
  `ubicacion` text DEFAULT NULL,
  `tipo_area` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `espacio_recreativo`
--

INSERT INTO `espacio_recreativo` (`id_espacio`, `nombre_espacio`, `ubicacion`, `tipo_area`) VALUES
(1, 'Los corrales', 'los corrales', 'verde'),
(2, 'Canchas de vóleibol\r\n\r\n', 'Area 3 junto al gym', 'abierta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id_evento` int(11) NOT NULL,
  `id_administrador` int(11) DEFAULT NULL,
  `id_espacio_r` int(11) DEFAULT NULL,
  `id_recurso` int(11) DEFAULT NULL,
  `nombre_actividad` varchar(50) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `encargado` text DEFAULT NULL,
  `telefono_encargado` varchar(12) DEFAULT NULL,
  `imagen` text DEFAULT NULL,
  `cantidad_recurso` int(11) DEFAULT NULL,
  `estatus_evento` tinyint(1) DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `hora_inicio` time DEFAULT NULL,
  `hora_fin` time DEFAULT NULL,
  `semestre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE `grupo` (
  `id_grupo` int(11) NOT NULL,
  `id_actividad` int(11) DEFAULT NULL,
  `grupo` varchar(60) DEFAULT NULL,
  `cupo` int(11) DEFAULT NULL,
  `profesor` varchar(100) DEFAULT NULL,
  `id_espacio` int(11) DEFAULT NULL,
  `semestre` varchar(50) DEFAULT NULL,
  `estatus_grupo` tinyint(1) DEFAULT NULL,
  `telefono_prof` varchar(20) DEFAULT NULL,
  `id_horario` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`id_grupo`, `id_actividad`, `grupo`, `cupo`, `profesor`, `id_espacio`, `semestre`, `estatus_grupo`, `telefono_prof`, `id_horario`) VALUES
(1, 1, '1500', 50, 'Bianca Sánchez', 1, '2022-1', 0, '4444444444', '2021-07-15 00:52:31'),
(5, 1, '1502', 45, 'Carlos Barrientos López', 1, '2022-1', 0, '455555555', '2021-07-15 00:52:31'),
(6, 1, '1503', 30, 'Leonel Salazar', 2, '2021-2', 1, '66666666', '2021-07-15 00:57:25'),
(7, 1, '1504', 50, 'Carlos Alcantara', 2, '2021-2', 1, '1234567890', '2021-07-15 00:58:54'),
(8, 1, '1505', 1, 'lolo', 2, '2021-2', 1, '1234456', '2021-07-15 01:03:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

CREATE TABLE `horarios` (
  `id_horario` varchar(100) NOT NULL,
  `lunes` varchar(50) DEFAULT NULL,
  `martes` varchar(50) DEFAULT NULL,
  `miercoles` varchar(50) DEFAULT NULL,
  `jueves` varchar(50) DEFAULT NULL,
  `viernes` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `horarios`
--

INSERT INTO `horarios` (`id_horario`, `lunes`, `martes`, `miercoles`, `jueves`, `viernes`) VALUES
('2021-07-15 00:52:31', '-', '11:30-00:25', '-', '10:26-11:26', '-'),
('2021-07-15 00:53:24', '-', '11:30-00:25', '-', '10:26-11:26', '-'),
('2021-07-15 00:54:06', '-', '11:30-00:25', '-', '10:26-11:26', '-'),
('2021-07-15 00:55:52', '-', '11:30-00:25', '-', '10:26-11:26', '-'),
('2021-07-15 00:57:25', '17:57-18:57', '-', '-', '-', '17:57-18:57'),
('2021-07-15 00:58:54', '-', '13:00-14:00', '-', '18:00-19:00', '-'),
('2021-07-15 01:03:21', '21:00-22:00', '-', '-', '-', '-');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamo`
--

CREATE TABLE `prestamo` (
  `id_prestamo` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_administrador` int(11) DEFAULT NULL,
  `fecha_prestamo` date DEFAULT NULL,
  `hora_inicio` time DEFAULT NULL,
  `hora_fin` time DEFAULT NULL,
  `notas` text DEFAULT NULL,
  `estatus_prestamo` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pres_espacio`
--

CREATE TABLE `pres_espacio` (
  `id_prestamo` int(11) NOT NULL,
  `id_espacio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pres_recurso`
--

CREATE TABLE `pres_recurso` (
  `id_prestamo_ma` int(11) NOT NULL,
  `id_recurso` int(11) DEFAULT NULL,
  `id_prestamo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recurso_evento`
--

CREATE TABLE `recurso_evento` (
  `id_recurso` int(11) NOT NULL,
  `id_evento` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `notas` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recurso_recreativo`
--

CREATE TABLE `recurso_recreativo` (
  `id_recurso` int(11) NOT NULL,
  `nombre_recurso` varchar(70) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_actividad`
--

CREATE TABLE `tipo_actividad` (
  `id_tipo` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `estatus` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_actividad`
--

INSERT INTO `tipo_actividad` (`id_tipo`, `nombre`, `estatus`) VALUES
(1, 'Cooperativo', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `primer_ap` varchar(100) DEFAULT NULL,
  `segundo_ap` varchar(100) DEFAULT NULL,
  `cuenta` varchar(20) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `contrasenia` text DEFAULT NULL,
  `id_carrera` int(11) DEFAULT NULL,
  `estatus_usuario` tinyint(1) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `primer_ap`, `segundo_ap`, `cuenta`, `correo`, `contrasenia`, `id_carrera`, `estatus_usuario`, `telefono`) VALUES
(1, 'Hector Fernando', 'Cortes', 'Añorve', '123455677', 'hector-cortes@gmail.com', '12345678', 1003, 1, '5567831987');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_actividad`
--

CREATE TABLE `usuario_actividad` (
  `id_usuario` int(11) NOT NULL,
  `id_grupo` int(11) NOT NULL,
  `asistencia` tinyint(1) DEFAULT NULL,
  `fecha_inscripcion` datetime DEFAULT NULL,
  `año` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario_actividad`
--

INSERT INTO `usuario_actividad` (`id_usuario`, `id_grupo`, `asistencia`, `fecha_inscripcion`, `año`) VALUES
(1, 1, 0, '2021-07-12 23:17:00', '2022-1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividad_recreativa`
--
ALTER TABLE `actividad_recreativa`
  ADD PRIMARY KEY (`id_actividad`),
  ADD KEY `id_administrador` (`id_administrador`);

--
-- Indices de la tabla `actividad_recursos`
--
ALTER TABLE `actividad_recursos`
  ADD PRIMARY KEY (`id_actividad_recurso`),
  ADD KEY `id_actividad` (`id_actividad`),
  ADD KEY `id_recurso` (`id_recurso`);

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `archivos`
--
ALTER TABLE `archivos`
  ADD PRIMARY KEY (`id_archivo`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_administrador` (`id_administrador`);

--
-- Indices de la tabla `carreras`
--
ALTER TABLE `carreras`
  ADD PRIMARY KEY (`id_carrera`);

--
-- Indices de la tabla `espacio_recreativo`
--
ALTER TABLE `espacio_recreativo`
  ADD PRIMARY KEY (`id_espacio`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id_evento`),
  ADD KEY `id_administrador` (`id_administrador`),
  ADD KEY `id_espacio_r` (`id_espacio_r`),
  ADD KEY `id_recurso` (`id_recurso`);

--
-- Indices de la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`id_grupo`),
  ADD KEY `id_actividad` (`id_actividad`),
  ADD KEY `id_espacio` (`id_espacio`),
  ADD KEY `id_horario` (`id_horario`);

--
-- Indices de la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`id_horario`);

--
-- Indices de la tabla `prestamo`
--
ALTER TABLE `prestamo`
  ADD PRIMARY KEY (`id_prestamo`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_administrador` (`id_administrador`);

--
-- Indices de la tabla `pres_espacio`
--
ALTER TABLE `pres_espacio`
  ADD PRIMARY KEY (`id_prestamo`,`id_espacio`),
  ADD KEY `id_espacio` (`id_espacio`);

--
-- Indices de la tabla `pres_recurso`
--
ALTER TABLE `pres_recurso`
  ADD PRIMARY KEY (`id_prestamo_ma`),
  ADD KEY `id_recurso` (`id_recurso`),
  ADD KEY `id_prestamo` (`id_prestamo`);

--
-- Indices de la tabla `recurso_evento`
--
ALTER TABLE `recurso_evento`
  ADD PRIMARY KEY (`id_recurso`,`id_evento`),
  ADD KEY `id_evento` (`id_evento`);

--
-- Indices de la tabla `recurso_recreativo`
--
ALTER TABLE `recurso_recreativo`
  ADD PRIMARY KEY (`id_recurso`);

--
-- Indices de la tabla `tipo_actividad`
--
ALTER TABLE `tipo_actividad`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_carrera` (`id_carrera`);

--
-- Indices de la tabla `usuario_actividad`
--
ALTER TABLE `usuario_actividad`
  ADD PRIMARY KEY (`id_usuario`,`id_grupo`) USING BTREE,
  ADD KEY `id_grupo` (`id_grupo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividad_recreativa`
--
ALTER TABLE `actividad_recreativa`
  MODIFY `id_actividad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `actividad_recursos`
--
ALTER TABLE `actividad_recursos`
  MODIFY `id_actividad_recurso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `archivos`
--
ALTER TABLE `archivos`
  MODIFY `id_archivo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `carreras`
--
ALTER TABLE `carreras`
  MODIFY `id_carrera` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1010;

--
-- AUTO_INCREMENT de la tabla `espacio_recreativo`
--
ALTER TABLE `espacio_recreativo`
  MODIFY `id_espacio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id_evento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `grupo`
--
ALTER TABLE `grupo`
  MODIFY `id_grupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `prestamo`
--
ALTER TABLE `prestamo`
  MODIFY `id_prestamo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pres_recurso`
--
ALTER TABLE `pres_recurso`
  MODIFY `id_prestamo_ma` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `recurso_recreativo`
--
ALTER TABLE `recurso_recreativo`
  MODIFY `id_recurso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_actividad`
--
ALTER TABLE `tipo_actividad`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actividad_recreativa`
--
ALTER TABLE `actividad_recreativa`
  ADD CONSTRAINT `actividad_recreativa_ibfk_1` FOREIGN KEY (`id_administrador`) REFERENCES `administrador` (`id_admin`);

--
-- Filtros para la tabla `actividad_recursos`
--
ALTER TABLE `actividad_recursos`
  ADD CONSTRAINT `actividad_recursos_ibfk_1` FOREIGN KEY (`id_actividad`) REFERENCES `actividad_recreativa` (`id_actividad`),
  ADD CONSTRAINT `actividad_recursos_ibfk_2` FOREIGN KEY (`id_recurso`) REFERENCES `recurso_recreativo` (`id_recurso`);

--
-- Filtros para la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD CONSTRAINT `administrador_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `archivos`
--
ALTER TABLE `archivos`
  ADD CONSTRAINT `archivos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `archivos_ibfk_2` FOREIGN KEY (`id_administrador`) REFERENCES `administrador` (`id_admin`);

--
-- Filtros para la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `eventos_ibfk_1` FOREIGN KEY (`id_administrador`) REFERENCES `administrador` (`id_admin`),
  ADD CONSTRAINT `eventos_ibfk_2` FOREIGN KEY (`id_espacio_r`) REFERENCES `espacio_recreativo` (`id_espacio`),
  ADD CONSTRAINT `eventos_ibfk_3` FOREIGN KEY (`id_recurso`) REFERENCES `recurso_recreativo` (`id_recurso`);

--
-- Filtros para la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD CONSTRAINT `grupo_ibfk_1` FOREIGN KEY (`id_actividad`) REFERENCES `actividad_recreativa` (`id_actividad`),
  ADD CONSTRAINT `grupo_ibfk_2` FOREIGN KEY (`id_espacio`) REFERENCES `espacio_recreativo` (`id_espacio`),
  ADD CONSTRAINT `grupo_ibfk_3` FOREIGN KEY (`id_horario`) REFERENCES `horarios` (`id_horario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `prestamo`
--
ALTER TABLE `prestamo`
  ADD CONSTRAINT `prestamo_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `prestamo_ibfk_2` FOREIGN KEY (`id_administrador`) REFERENCES `administrador` (`id_admin`);

--
-- Filtros para la tabla `pres_espacio`
--
ALTER TABLE `pres_espacio`
  ADD CONSTRAINT `pres_espacio_ibfk_1` FOREIGN KEY (`id_prestamo`) REFERENCES `prestamo` (`id_prestamo`),
  ADD CONSTRAINT `pres_espacio_ibfk_2` FOREIGN KEY (`id_espacio`) REFERENCES `espacio_recreativo` (`id_espacio`);

--
-- Filtros para la tabla `pres_recurso`
--
ALTER TABLE `pres_recurso`
  ADD CONSTRAINT `pres_recurso_ibfk_1` FOREIGN KEY (`id_recurso`) REFERENCES `recurso_recreativo` (`id_recurso`),
  ADD CONSTRAINT `pres_recurso_ibfk_2` FOREIGN KEY (`id_prestamo`) REFERENCES `prestamo` (`id_prestamo`);

--
-- Filtros para la tabla `recurso_evento`
--
ALTER TABLE `recurso_evento`
  ADD CONSTRAINT `recurso_evento_ibfk_1` FOREIGN KEY (`id_recurso`) REFERENCES `recurso_recreativo` (`id_recurso`),
  ADD CONSTRAINT `recurso_evento_ibfk_2` FOREIGN KEY (`id_evento`) REFERENCES `eventos` (`id_evento`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_carrera`) REFERENCES `carreras` (`id_carrera`);

--
-- Filtros para la tabla `usuario_actividad`
--
ALTER TABLE `usuario_actividad`
  ADD CONSTRAINT `usuario_actividad_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `usuario_actividad_ibfk_2` FOREIGN KEY (`id_grupo`) REFERENCES `actividad_recreativa` (`id_actividad`),
  ADD CONSTRAINT `usuario_actividad_ibfk_3` FOREIGN KEY (`id_grupo`) REFERENCES `grupo` (`id_grupo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
