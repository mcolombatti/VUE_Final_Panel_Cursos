-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-07-2021 a las 04:10:04
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cursos_davinci`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `idcursos` int(10) UNSIGNED NOT NULL,
  `precio` int(11) DEFAULT NULL,
  `nombre` varchar(150) DEFAULT NULL,
  `imagen` varchar(100) DEFAULT NULL,
  `profesor` varchar(100) DEFAULT NULL,
  `imagen_descripcion` varchar(150) DEFAULT NULL,
  `descripcion` tinytext DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`idcursos`, `precio`, `nombre`, `imagen`, `profesor`, `imagen_descripcion`, `descripcion`, `fecha_inicio`) VALUES
(1, 3500, 'Html 5 y CSS3', 'html5-css3.jpg', 'Jonatan Jorge', 'Logo de Html5 y CSS3', '\"Conocer el entorno de desarrollo de sitios web. Conocer los elementos y estructura básicos para realizar páginas web. Creación de contenido optimizado para la web.', '2021-06-01'),
(2, 6000, 'Javascript', 'js.jpg', 'Federico Noto', 'Logo de lenguaje Javascript', 'Aprender a ejecutar scripts en JavaScript con una sintaxis correcta, además de conocer los elementos básicos del lenguaje. Aprender sobre el manejo de funciones y objetos tanto los propios del lenguaje como los definidos por el usuario. Aprender sobre e', '2021-07-01'),
(3, 6000, 'PHP', 'php.png', 'Santiago Gallino', 'Logo de lenguaje PHP', 'Comprender el funcionamiento de la arquitectura de un Servidor Web. Programar desde cero en PHP. Estructuras de memoria, archivos de texto, funciones, manejo de errores. Desarrollar diferentes módulos ABM con conexión a Bases de Datos MySQL', '2021-07-20'),
(4, 4500, 'NodeJS', 'nodejs.png', 'Luciano Ramirez', 'Logo de Nodejs', 'Entender y utilizar Node JS en sus proyectos. Entender la programación asíncrona y orientada a eventos. Entender que son Módulos o Paquetes en Node JS. Crear nuevos Módulos en Node JS', '2021-09-01'),
(5, 5500, 'Vue', 'vue.png', 'Mabel Garcia', 'Logo de VUE', 'Cómo funciona Vue.js. Crear proyectos con Vue.js. Extender las capacidades de Vue.js con su CLI. Aplicar los conocimientos en un proyecto.', '2021-06-01'),
(6, 7500, 'React JS', 'reactJS.png', 'Omar Toyos', 'Logo de React', 'Crear primeras Mobile Apps con React Native. Diseñar aplicaciones para distintos tipos de necesidades implementando la gran variedad de componentes de React. Programar con Javascript Avanzado usando objetos y lo último de EMCMA6', '2021-10-01');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`idcursos`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `idcursos` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
