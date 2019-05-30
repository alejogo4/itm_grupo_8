-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-05-2019 a las 06:30:43
-- Versión del servidor: 10.1.35-MariaDB
-- Versión de PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `website201901`
--
CREATE DATABASE IF NOT EXISTS `website201901` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `website201901`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `contacto_Id` int(11) NOT NULL,
  `email` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `nombre1` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `nombre2` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `apellido1` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `apellido2` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `ciudad` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `asunto` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `mensaje` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` datetime NOT NULL,
  `estado_respuesta` int(1) NOT NULL,
  `fecha_respuesta` date NOT NULL,
  `email_responde` varchar(60) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`contacto_Id`, `email`, `nombre1`, `nombre2`, `apellido1`, `apellido2`, `ciudad`, `asunto`, `mensaje`, `fecha`, `estado_respuesta`, `fecha_respuesta`, `email_responde`) VALUES
(1, 'interno1@serval.com', 'miguel', 'angel', 'ochoa', 'morales', 'medellin', 'prueba', 'prueba para verificar mensajes', '2019-04-06 18:09:09', 0, '0000-00-00', ''),
(2, 'interno1@serval.com', 'nombre', 'angel', 'visitapp', 'apellido 2', 'medellin', 'prueba', 'prueba mensajes', '2019-04-06 18:11:12', 0, '0000-00-00', ''),
(3, 'alejogo49@gmail.com', 'alejandro', '', 'giraldo', 'duque', 'medellin', 'saludo', 'test 1', '2019-04-24 11:56:06', 0, '0000-00-00', ''),
(5, 'd@gmail.com', 'd', '', '', '', '', '', '', '2019-04-24 15:19:09', 0, '0000-00-00', ''),
(6, 'b@gmail.com', 'alejandro', 'g', 'g', 'd', 'medellin', 'no', 'nonono', '2019-04-24 15:47:48', 0, '0000-00-00', ''),
(7, '1', 'alejandro', 'b', 'c', 'duque', 'medelln', 'no', '548484', '2019-04-24 15:49:11', 0, '0000-00-00', ''),
(8, '1', 'alejandro', 'b', 'c', 'duque', 'medelln', 'no', '548484', '2019-04-24 15:50:39', 0, '0000-00-00', ''),
(9, 'b@gmail.com', 'alejandro', 'giraldo', 'c', 'duque', 'medelln', 'saludo', '+69', '2019-04-24 15:51:29', 0, '0000-00-00', ''),
(10, 'b@gmail.com', 'a', 'b', '', 'duque', 'medelln', 'no', 'asdsada', '2019-04-24 16:08:55', 0, '0000-00-00', ''),
(11, 'alejo.go4@hotmail.com', 'alejandro', 'giraldo', 'giraldo', '', 'medelln', 'saludo', 'prueba 1', '0000-00-00 00:00:00', 0, '0000-00-00', ''),
(12, 'alejo.go4@hotmail.com', 'alejandro', '', 'giraldo', 'duque', 'medelln', 'saludo 2', 'saludos 2', '0000-00-00 00:00:00', 0, '0000-00-00', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE `perfil` (
  `idn` int(11) NOT NULL,
  `nombres` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `apellidos` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `telefono` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `perfil` varchar(500) COLLATE utf8_spanish2_ci NOT NULL,
  `habilidad01` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `habilidad02` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `habilidad03` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `habilidad04` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `habilidad05` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `foto` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `idequipo` varchar(10) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`idn`, `nombres`, `apellidos`, `email`, `telefono`, `perfil`, `habilidad01`, `habilidad02`, `habilidad03`, `habilidad04`, `habilidad05`, `foto`, `idequipo`) VALUES
(1017229297, 'David Alejandro', 'Alzate Cano', 'Davidalzate201212@correo.itm.edu.co', '3156210528', 'Me caracterizo por laborar con mis compañeros aportando un entorno positivo y cooperativo, en la creación de proyectos tomo iniciativa asociando ideas para la eficacia y elaboración de este, apoyándome en los conocimientos y habilidades adquiridos a lo largo de mi formación profesional. Soy apasionado por las novedades tecnológicas y sistemáticas con disposición para el aprendizaje de las mismas, asociando los conocimientos aprendidos y así logrando obtener un excelente rendimiento en mi área de', 'JAVA 70%', 'SQL 40%', 'Idioma Ingles 50%', 'JSP 60%', 'Soporte Técnico PC 80%', '1017229297_perfil', 'PPI620308'),
(1035418599, 'Juan Carlos', 'Ruiz Monsalve', 'Juanruiz223452@correo.itm.edu.co', '3127352673', 'Soy un diseñador web, gráfico y editorial; maquetador web y desarrollador de software en constante formación. Me considero soñador, artista, artesano y músico aficionado; además en constante búsqueda de oportunidades que me permitan aprender y mejorar mis habilidades sociales, comunicativas y profesionales.', 'Diseño web, gráfico y editorial 90%', 'Frontend 80%', 'Backend 40%', 'Empresarismo 70%', 'Inglés 80%', '1035418599_perfil', 'PPI620308'),
(1035833246, 'Miguel Ángel', 'Ochoa Morales', 'miguelochoa223489@correo.itm.edu.co', '3013668074', 'Soy alguien con capacidad de trabajar en equipo, se me facilita llevar buenas relaciones con las demás personas, soy alguien proactivo y que siempre está en busca de una posible solución ante cualquier problema', 'Java 80%', 'Mantenimiento y reparación de computadores 80%', 'Bases de datos SQL 50%', 'C# 50%', 'Ingles 80%', '1035833246_perfil', 'PPI620308'),
(1152207681, 'Alejandro', 'Giraldo Duque', 'Alejogo49@gmail.com', '3217219988', 'Diseño y construyo productos digitales que son intuitivos, accesibles, hermosos y divertidos. Lo he hecho profesionalmente desde 2015, y he estado diseñando para la web desde 2014. Aunque el enfoque está en la programación he estudiado otras tecnologías que me han ayudado a mejorar mis diseños y los proceso detrás de él. Investigo del por qué las cosas son como son y escucho a los expertos para basarme en ellas', 'Desarrollo Web 90%', 'Desarrollo Móvil 80%', 'UI 90%', 'UX 80%', 'Bases de datos 70%', '1152207681_perfil', 'PPI620308');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfilequipo`
--

CREATE TABLE `perfilequipo` (
  `idequipo` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `telefono` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `perfil` varchar(500) COLLATE utf8_spanish2_ci NOT NULL,
  `habilidad01` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `habilidad02` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `habilidad03` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `habilidad04` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `habilidad05` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `foto` varchar(50) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `perfilequipo`
--

INSERT INTO `perfilequipo` (`idequipo`, `nombre`, `email`, `telefono`, `perfil`, `habilidad01`, `habilidad02`, `habilidad03`, `habilidad04`, `habilidad05`, `foto`) VALUES
('PPI620308', 'Challenge Overcome', '', '', 'Nos caracterizamos por un buen trabajo en equipo, adaptándonos a las necesidades que se encuentre en el proceso. Mediante la experiencia  y el conocimiento superamos retos para mejorar nuestras habilidades grupales.', 'Diseño 90%', 'Desarrollo 90%', 'SQL 40%', 'Ingles 70%', 'Trabajo en equipo 100%', 'PPI620308_perfil');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `email` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(120) COLLATE utf8_spanish_ci NOT NULL,
  `nombre1` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `nombre2` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `apellido1` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `apellido2` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `rol` int(11) NOT NULL DEFAULT '1',
  `fecha_registro` datetime NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `acceso` int(11) NOT NULL DEFAULT '0',
  `fecha_acceso` datetime NOT NULL,
  `edad` int(11) NOT NULL,
  `sexo` varchar(1) COLLATE utf8_spanish_ci NOT NULL,
  `profesion` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`email`, `password`, `nombre1`, `nombre2`, `apellido1`, `apellido2`, `rol`, `fecha_registro`, `estado`, `acceso`, `fecha_acceso`, `edad`, `sexo`, `profesion`) VALUES
('a@gmail.com', '123456', 'alejandro', 'giraldo', 'duque', 'duque', 1, '2019-04-24 11:59:30', 1, 0, '0000-00-00 00:00:00', 0, '', ''),
('admin@prueba.com', 'qwer.1234', 'admin', 'admin 2 ', 'visitapp', 'visitapp 2', 1, '2019-04-06 17:39:38', 1, 0, '0000-00-00 00:00:00', 0, '', ''),
('admin@visitapp.com', 'qwer.1234', 'admin', 'admin 2 ', 'visitapp', 'visitapp 2', 1, '2019-04-06 17:38:35', 1, 0, '0000-00-00 00:00:00', 0, '', ''),
('alejo.go4@hotmail.com', 'admin123', 'alejandro', '', 'giraldo', 'duque', 1, '2019-05-27 20:58:53', 1, 1, '2019-05-27 23:27:02', 25, 'M', 'Programador'),
('alejogo49@gmail.com', 'admin123', 'alvaro', '', 'perez', 'perez', 1, '2019-05-28 03:51:03', 1, 0, '0000-00-00 00:00:00', 0, '', ''),
('b@gmail.com', '456', 'a', 'b', 'c', 'd', 1, '2019-04-24 13:55:35', 1, 1, '0000-00-00 00:00:00', 80, 'M', 'Programador'),
('interno1@serval.com', 'qwer.1234', 'nombre 1', 'nombre 2', 'apellido 1', 'apellido 2', 1, '2019-04-06 17:30:25', 1, 0, '0000-00-00 00:00:00', 0, '', ''),
('Mochoa0406@hotmail.com', 'Qwer.1234', 'Miguel', '', 'Ochoa', '', 1, '2019-04-06 17:09:35', 1, 0, '0000-00-00 00:00:00', 0, '', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`contacto_Id`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`idn`);

--
-- Indices de la tabla `perfilequipo`
--
ALTER TABLE `perfilequipo`
  ADD PRIMARY KEY (`idequipo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `contacto_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
