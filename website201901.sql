-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-04-2019 a las 06:26:55
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.3.1

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `contacto_id` int(11) NOT NULL,
  `email` varchar(60) NOT NULL,
  `nombre1` varchar(30) NOT NULL,
  `nombre2` varchar(30) DEFAULT NULL,
  `apellido1` varchar(30) NOT NULL,
  `apeliido2` varchar(30) DEFAULT NULL,
  `ciudad` varchar(30) DEFAULT NULL,
  `asunto` varchar(60) NOT NULL,
  `mensaje` varchar(500) NOT NULL,
  `fecha` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`contacto_id`, `email`, `nombre1`, `nombre2`, `apellido1`, `apeliido2`, `ciudad`, `asunto`, `mensaje`, `fecha`) VALUES
(1, 'interno1@serval.com', 'miguel', 'angel', 'ochoa', 'morales', 'medellin', 'prueba', 'prueba para verificar mensajes', '2019-04-06 18:09:09'),
(2, 'interno1@serval.com', 'nombre', 'angel', 'visitapp', 'apellido 2', 'medellin', 'prueba', 'prueba mensajes', '2019-04-06 18:11:12'),
(3, 'mochoa0406@hotmail.com', 'miguel', 'angel', 'ochoa', 'morales', 'medellin', 'prueba', 'prueba mensaje', '2019-04-24 20:27:39'),
(4, 'mochoa0406@hotmail.com', 'jaun', 'jas', 'ruiz', 'monsalve', 'medellin', 'prueba', 'farewas', '2019-04-24 20:53:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE `perfil` (
  `idn` int(11) NOT NULL,
  `nombres` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `perfil` varchar(500) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `habilidad01` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `habilidad02` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `habilidad03` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `habilidad04` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `habilidad05` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `foto` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `idequipo` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
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
  `idequipo` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `nombre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `telefono` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `perfil` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `habilidad01` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `habilidad02` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `habilidad03` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `habilidad04` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `habilidad05` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `foto` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `perfilequipo`
--

INSERT INTO `perfilequipo` (`idequipo`, `nombre`, `email`, `telefono`, `perfil`, `habilidad01`, `habilidad02`, `habilidad03`, `habilidad04`, `habilidad05`, `foto`) VALUES
('PPI620308', 'Challenge Overcome', '', '', 'Nos caracterizamos por un buen trabajo en equipo, adaptándonos a las necesidades que se encuentre en el proceso. Mediante la experiencia  y el conocimiento superamos retos para mejorar nuestras habilidades grupales.', 'Diseño 90%', 'Desarrollo 90%', 'SQL 40%', 'Ingles 70%', 'Trabajo en equipo 100%', 'PPI620308_perfil');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE `registro` (
  `nombre1` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `password` varchar(120) COLLATE utf8_spanish2_ci NOT NULL,
  `email` varchar(60) COLLATE utf8_spanish2_ci NOT NULL,
  `apellido1` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre2` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `apellido2` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `rol` int(11) NOT NULL DEFAULT '1',
  `fecha_registro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `estado` int(11) NOT NULL DEFAULT '1',
  `acceso` int(11) NOT NULL DEFAULT '0',
  `fecha_acceso` datetime NOT NULL,
  `Edad` int(11) NOT NULL,
  `Sexo` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `Profesion` varchar(30) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `registro`
--

INSERT INTO `registro` (`nombre1`, `password`, `email`, `apellido1`, `nombre2`, `apellido2`, `rol`, `fecha_registro`, `estado`, `acceso`, `fecha_acceso`, `Edad`, `Sexo`, `Profesion`) VALUES
('admin', 'qwer.1234', 'admin@prueba.com', 'visitapp', 'admin 2 ', 'visitapp 2', 1, '2019-04-06 17:39:38', 1, 0, '0000-00-00 00:00:00', 0, '', ''),
('admin', 'qwer.1234', 'admin@visitapp.com', 'visitapp', 'admin 2 ', 'visitapp 2', 1, '2019-04-06 17:38:35', 1, 0, '0000-00-00 00:00:00', 0, '', ''),
('nombre 1', 'qwer.1234', 'interno1@serval.com', 'apellido 1', 'nombre 2', 'apellido 2', 1, '2019-04-06 17:30:25', 1, 0, '0000-00-00 00:00:00', 0, '', ''),
('Miguel', 'Asdf.1234', 'Mochoa0406@hotmail.com', 'Ochoa', '', '', 1, '2019-04-06 17:09:35', 1, 1, '0000-00-00 00:00:00', 22, 'M', 'Practicante');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`contacto_id`);

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
-- Indices de la tabla `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `contacto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
