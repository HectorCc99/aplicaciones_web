-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-07-2021 a las 19:34:57
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
  `estatus_actividad` tinyint(1) DEFAULT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `actividad_recreativa`
--

INSERT INTO `actividad_recreativa` (`id_actividad`, `id_administrador`, `nombre_actividad`, `descripcion`, `fecha_creacion`, `tipo_actividad`, `estatus_actividad`, `img`) VALUES
(1, NULL, 'Futbol Americano', 'Esta es la descripcion de un deporte', '2021-07-12 23:03:54', 1, 1, 'img/full-contact.jpg'),
(2, NULL, 'Futbol', 'Este es el futbol normal neta que si', '2021-07-15 21:24:38', 1, 1, 'img/full-contact.jpg');

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
  `fecha_alta` date DEFAULT NULL,
  `estatus_admin` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id_admin`, `id_usuario`, `fecha_alta`, `estatus_admin`) VALUES
(1, 2, '2021-07-20', 1);

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
  `estatus_aprobado` tinyint(1) DEFAULT NULL,
  `tipo_archivo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `archivos`
--

INSERT INTO `archivos` (`id_archivo`, `id_usuario`, `id_administrador`, `nombre_archivo`, `path_archivo`, `fecha_aprobacion`, `notas`, `semestre`, `estatus_aprobado`, `tipo_archivo`) VALUES
(35, 1, 1, 'Certificado.png', './archivos_subidos/1/Certificado.png', '2021-07-24 22:00:48', '', '2021-1', 1, 'Tira de Materias'),
(36, 1, 1, 'Certificado.png', './archivos_subidos/1/Certificado.png', '2021-07-24 22:00:48', '', '2021-1', 1, 'Seguro de estudiante'),
(37, 1, 1, 'Certificado.png', './archivos_subidos/1/Certificado.png', '2021-07-24 22:00:48', '', '2021-1', 1, 'Seguro Axa'),
(38, 1, 1, 'Certificado.png', './archivos_subidos/1/Certificado.png', '2021-07-24 22:00:48', '', '2021-1', 1, 'Credencial_escolar');

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

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id_evento`, `id_administrador`, `id_espacio_r`, `id_recurso`, `nombre_actividad`, `descripcion`, `encargado`, `telefono_encargado`, `imagen`, `cantidad_recurso`, `estatus_evento`, `fecha_inicio`, `fecha_fin`, `hora_inicio`, `hora_fin`, `semestre`) VALUES
(4, 1, 2, 1, 'Prueba evento', 'lolo', 'Bianca Sánchez Miguel', '4562834502', '../archivos_subidos//Certificado.png', 1, 1, '2021-07-20', '2021-07-20', '19:26:00', '19:26:00', '2021-2'),
(5, 1, 2, 1, 'Prueba evento', 'lolo', 'Bianca Sánchez Miguel', '4562834502', '../archivos_subidos//Certificado.png', 1, 1, '2021-07-20', '2021-07-20', '19:26:00', '19:26:00', '2021-2'),
(7, 1, 2, 1, 'Prueba evento', 'lolo', 'Bianca Sánchez Miguel', '4562834502', '../archivos_subidos//Certificado.png', 1, 1, '2021-07-20', '2021-07-20', '19:26:00', '19:26:00', '2021-2'),
(8, 1, 2, 1, 'Prueba evento', 'knini', 'Bianca Sánchez Miguel', '4562834502', '../archivos_subidos//Certificado.png', 2, 1, '2021-07-21', '2021-07-23', '12:43:00', '23:43:00', '2021-2'),
(2118, 1, 2, 1, 'Prueba evento 2', 'lololo', 'Bianca Sánchez Miguel', '4562834502', '../archivos_subidos//Certificado.png', 10, 1, '2021-07-23', '2021-07-24', '11:43:00', '01:43:00', '2021-2');

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
(1, 1, '1500', 50, 'Bianca Sánchez Miguel', 2, '2021-2', 0, '5673214519', '2021-07-15 00:52:31'),
(5, 1, '1502', 45, 'Carlos Barrientos López', 1, '2021-1', 0, '455555555', '2021-07-15 00:52:31'),
(6, 1, '1503', 30, 'Leonel Salazar', 2, '2021-2', 1, '66666666', '2021-07-15 00:57:25'),
(7, 1, '1504', 50, 'Carlos Alcantara', 2, '2021-2', 1, '1234567890', '2021-07-15 00:58:54'),
(8, 2, '1505', 10, 'Hector Cortes', 1, '2021-2', 1, '1234456', '2021-07-15 01:03:21');

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
('2021-07-15 00:52:31', '-', '-', '-', '-', '-'),
('2021-07-15 00:53:24', '-', '11:30-00:25', '-', '10:26-11:26', '-'),
('2021-07-15 00:54:06', '-', '11:30-00:25', '-', '10:26-11:26', '-'),
('2021-07-15 00:55:52', '-', '11:30-00:25', '-', '10:26-11:26', '-'),
('2021-07-15 00:57:25', '17:57-18:57', '-', '-', '-', '17:57-18:57'),
('2021-07-15 00:58:54', '-', '13:00-14:00', '-', '18:00-19:00', '-'),
('2021-07-15 01:03:21', '-', '-', '-', '15:33-16:33', '-');

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

--
-- Volcado de datos para la tabla `prestamo`
--

INSERT INTO `prestamo` (`id_prestamo`, `id_usuario`, `id_administrador`, `fecha_prestamo`, `hora_inicio`, `hora_fin`, `notas`, `estatus_prestamo`) VALUES
(1, 1, NULL, '2021-07-16', '13:48:17', '14:48:17', NULL, 0),
(3, 1, NULL, '2021-07-23', '13:51:00', '15:51:00', '', 0),
(4, 1, NULL, '2021-07-23', '13:53:00', '15:53:00', '', 0),
(5, 1, NULL, '2021-07-24', '13:53:00', '15:53:00', '', 0),
(6, 1, NULL, '2021-07-24', '13:53:00', '15:53:00', '', 0),
(7, 1, NULL, '2021-07-24', '13:53:00', '15:53:00', '', 0),
(8, 1, NULL, '2021-07-24', '13:53:00', '15:53:00', '', 0),
(9, 1, NULL, '2021-07-23', '13:56:00', '15:56:00', '', 0),
(10, 1, NULL, '2021-07-25', '13:57:00', '15:57:00', '', 0),
(11, 1, NULL, '2021-07-25', '13:57:00', '15:57:00', '', 0),
(12, 1, NULL, '2021-07-25', '13:57:00', '15:57:00', '', 0),
(13, 1, NULL, '2021-07-25', '13:57:00', '15:57:00', '', 0),
(14, 1, NULL, '2021-07-25', '13:57:00', '15:57:00', '', 0),
(15, 1, NULL, '2021-07-25', '13:57:00', '15:57:00', '', 0),
(16, 1, NULL, '2021-07-25', '13:57:00', '15:57:00', '', 0),
(17, 1, NULL, '2021-07-25', '13:57:00', '15:57:00', '', 0),
(18, 1, NULL, '2021-07-25', '13:57:00', '15:57:00', '', 0),
(19, 1, NULL, '2021-07-25', '13:57:00', '15:57:00', '', 0),
(20, 1, NULL, '2021-07-27', '14:06:00', '16:06:00', '', 0),
(21, 1, NULL, '2021-07-27', '14:06:00', '16:06:00', '', 0),
(22, 1, NULL, '2021-07-27', '14:06:00', '16:06:00', '', 0),
(23, 1, NULL, '2021-07-27', '14:06:00', '16:06:00', '', 0),
(24, 1, NULL, '2021-07-27', '14:06:00', '16:06:00', '', 0),
(25, 1, NULL, '2021-07-27', '14:06:00', '16:06:00', '', 0),
(26, 1, NULL, '2021-07-30', '14:09:00', '16:09:00', '', 0),
(27, 1, NULL, '2021-07-28', '14:12:00', '16:12:00', '', 0),
(28, 1, NULL, '2021-07-28', '14:12:00', '16:12:00', '', 0),
(29, 1, NULL, '2021-07-28', '14:12:00', '16:12:00', '', 0),
(30, 1, NULL, '2021-07-28', '14:12:00', '16:12:00', '', 0),
(31, 1, NULL, '2021-07-29', '14:18:00', '16:18:00', '', 0),
(32, 1, NULL, '2021-07-29', '14:18:00', '16:18:00', '', 0),
(33, 1, NULL, '2021-07-29', '14:18:00', '16:18:00', '', 0),
(34, 1, NULL, '2021-07-29', '14:18:00', '16:18:00', '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pres_espacio`
--

CREATE TABLE `pres_espacio` (
  `id_prestamo` int(11) NOT NULL,
  `id_espacio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pres_espacio`
--

INSERT INTO `pres_espacio` (`id_prestamo`, `id_espacio`) VALUES
(1, 2),
(32, 2),
(33, 2),
(34, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pres_recurso`
--

CREATE TABLE `pres_recurso` (
  `id_prestamo_ma` int(11) NOT NULL,
  `id_recurso` int(11) DEFAULT NULL,
  `id_prestamo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pres_recurso`
--

INSERT INTO `pres_recurso` (`id_prestamo_ma`, `id_recurso`, `id_prestamo`) VALUES
(3, 1, 19),
(4, 1, 20),
(5, 1, 21),
(6, 1, 22),
(7, 1, 23),
(8, 1, 24),
(9, 1, 25),
(11, 1, 27),
(12, 1, 28);

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

--
-- Volcado de datos para la tabla `recurso_evento`
--

INSERT INTO `recurso_evento` (`id_recurso`, `id_evento`, `cantidad`, `notas`) VALUES
(1, 2118, 10, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recurso_recreativo`
--

CREATE TABLE `recurso_recreativo` (
  `id_recurso` int(11) NOT NULL,
  `nombre_recurso` varchar(70) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `recurso_recreativo`
--

INSERT INTO `recurso_recreativo` (`id_recurso`, `nombre_recurso`, `cantidad`) VALUES
(1, 'Balón de futbol', 20);

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
(1, 'Cooperativo', 1),
(2, 'Combate cuerpo a cuerpo', 1),
(3, 'Fitness', 1),
(4, 'Individual', 1),
(5, 'Para Mejorar la Salud', 1);

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
(1, 'Hector Fernando', 'Cortes', 'Añorve', '123455677', 'hector-cortes@gmail.com', '12345678', 1003, 1, '5567831987'),
(2, 'Hector Fernando', 'Cortes', 'Añorve', '418075315', 'hectorccore@gmail.com', 'ca2e1571ca9a02f983a55fd751fe00fb', 1003, 1, '5582452721');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_actividad`
--

CREATE TABLE `usuario_actividad` (
  `id_inscripcion` varchar(100) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_grupo` int(11) NOT NULL,
  `asistencia` tinyint(1) DEFAULT NULL,
  `fecha_inscripcion` datetime DEFAULT NULL,
  `año` varchar(30) DEFAULT NULL,
  `estatus_inscripcion` tinyint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario_actividad`
--

INSERT INTO `usuario_actividad` (`id_inscripcion`, `id_usuario`, `id_grupo`, `asistencia`, `fecha_inscripcion`, `año`, `estatus_inscripcion`) VALUES
('112022-1', 1, 1, 0, '2021-07-12 23:17:00', '2022-1', 1),
('162021-2', 1, 6, 0, '2021-07-23 04:28:32', '2021-2', 0),
('17', 1, 7, 0, '2021-07-23 04:20:59', '', 0),
('18', 1, 8, 0, '2021-07-23 04:29:00', '', 1),
('282021-2', 2, 8, 0, '2021-07-25 00:32:05', '2021-2', 0);

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
  ADD PRIMARY KEY (`id_inscripcion`),
  ADD KEY `id_grupo` (`id_grupo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividad_recreativa`
--
ALTER TABLE `actividad_recreativa`
  MODIFY `id_actividad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `actividad_recursos`
--
ALTER TABLE `actividad_recursos`
  MODIFY `id_actividad_recurso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `archivos`
--
ALTER TABLE `archivos`
  MODIFY `id_archivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

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
  MODIFY `id_evento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2119;

--
-- AUTO_INCREMENT de la tabla `grupo`
--
ALTER TABLE `grupo`
  MODIFY `id_grupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `prestamo`
--
ALTER TABLE `prestamo`
  MODIFY `id_prestamo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `pres_recurso`
--
ALTER TABLE `pres_recurso`
  MODIFY `id_prestamo_ma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `recurso_recreativo`
--
ALTER TABLE `recurso_recreativo`
  MODIFY `id_recurso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipo_actividad`
--
ALTER TABLE `tipo_actividad`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  ADD CONSTRAINT `usuario_actividad_ibfk_3` FOREIGN KEY (`id_grupo`) REFERENCES `grupo` (`id_grupo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
