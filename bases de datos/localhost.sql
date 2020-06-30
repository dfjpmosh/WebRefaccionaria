-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 02-10-2015 a las 14:42:06
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `bdrefaccionaria`
--
CREATE DATABASE `bdrefaccionaria` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `bdrefaccionaria`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `idcliente` int(100) NOT NULL AUTO_INCREMENT,
  `user` varchar(100) DEFAULT NULL,
  `pass` varchar(100) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `apellidos` varchar(100) DEFAULT NULL,
  `telefono` varchar(100) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `dircalle` varchar(100) DEFAULT NULL,
  `dirnum` varchar(100) DEFAULT NULL,
  `dircol` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idcliente`),
  UNIQUE KEY `user` (`user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`idcliente`, `user`, `pass`, `nombre`, `apellidos`, `telefono`, `correo`, `dircalle`, `dirnum`, `dircol`) VALUES
(1, 'admin', 'admin', 'Administrador', 'Refaccionaria', '8119718', 'elpiston@gmail.com', 'prol. nereo rodriguez barragan', '1932', 'b. de santiago'),
(2, 'dfjp', 'mosh', 'dfjp', 'mosh', '2147483', 'dfjp_mosh@hotmail.com', 'villanueva', '43', 'santiago'),
(3, 'king', 'kong', 'Humerto', 'Castillo', '2147483647', 'humcas@gmail.com', 'Anahuac', '10', 'Huerta Real');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallepedido`
--

CREATE TABLE IF NOT EXISTS `detallepedido` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `idpedido` int(100) DEFAULT NULL,
  `idproducto` int(100) DEFAULT NULL,
  `cantidad` int(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idpedido` (`idpedido`,`idproducto`),
  KEY `idpedido_2` (`idpedido`,`idproducto`),
  KEY `idproducto` (`idproducto`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Volcado de datos para la tabla `detallepedido`
--

INSERT INTO `detallepedido` (`id`, `idpedido`, `idproducto`, `cantidad`) VALUES
(1, 4, 1, 1),
(2, 4, 2, 1),
(3, 4, 3, 1),
(4, 5, 1, 1),
(5, 6, 3, 1),
(6, 7, 1, 1),
(7, 8, 1, 1),
(8, 8, 1, 1),
(9, 9, 1, 1),
(10, 9, 1, 1),
(11, 10, 1, 1),
(12, 11, 1, 1),
(13, 11, 1, 1),
(14, 12, 1, 1),
(15, 12, 2, 1),
(16, 12, 3, 1),
(17, 13, 3, 1),
(18, 13, 1, 1),
(19, 13, 2, 1),
(20, 14, 1, 1),
(21, 14, 2, 1),
(22, 14, 3, 1),
(23, 15, 1, 1),
(24, 15, 2, 1),
(25, 15, 3, 1),
(26, 15, 5, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenesproductos`
--

CREATE TABLE IF NOT EXISTS `imagenesproductos` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `idproducto` int(100) DEFAULT NULL,
  `imagen` varchar(100) DEFAULT NULL,
  `titulo` varchar(100) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idproducto` (`idproducto`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `imagenesproductos`
--

INSERT INTO `imagenesproductos` (`id`, `idproducto`, `imagen`, `titulo`, `descripcion`) VALUES
(1, 1, 'radiador_spirit_1.png', 'Radiador Spirit', 'imagen 1 de radiador'),
(2, 2, 'filtro_bomba_gasolina_cavalier_1.png', 'Filtro para bomba de gasolina Cavalier', 'imagen 1 filtro'),
(3, 3, 'kit_metales_anillos_empaques_1.png', 'kit_metales_anillos_empaques_1', 'kit_metales_anillos_empaques_1'),
(4, 3, 'kit_metales_anillos_empaques_2.png', 'kit_metales_anillos_empaques_2', 'kit_metales_anillos_empaques_2'),
(5, 3, 'kit_metales_anillos_empaques_3.png', 'kit_metales_anillos_empaques_3', 'kit_metales_anillos_empaques_3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE IF NOT EXISTS `pedidos` (
  `idpedido` int(100) NOT NULL AUTO_INCREMENT,
  `idcliente` int(100) DEFAULT NULL,
  `fecha` varchar(100) DEFAULT NULL,
  `estado` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idpedido`),
  KEY `idcliente` (`idcliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`idpedido`, `idcliente`, `fecha`, `estado`) VALUES
(2, 2, '1442845327', '1'),
(3, 2, '1442845372', '1'),
(4, 2, '1442845858', '2'),
(5, 2, '1442846609', '1'),
(6, 2, '1442846719', '2'),
(7, 2, '1442847083', '2'),
(8, 2, '1442848533', '2'),
(9, 2, '1442848614', '1'),
(10, 2, '1442848738', '2'),
(11, 2, '1442848953', '1'),
(12, 2, '1442959408', '2'),
(13, 2, '1443025023', '2'),
(14, 2, '1443112489', '2'),
(15, 3, '1443695006', '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `idproducto` int(100) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `precio` float(10,2) DEFAULT NULL,
  `existencias` int(100) DEFAULT NULL,
  `promocion` int(1) DEFAULT NULL,
  `preciopromo` float(10,2) DEFAULT NULL,
  `activado` int(1) DEFAULT NULL,
  PRIMARY KEY (`idproducto`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idproducto`, `nombre`, `descripcion`, `precio`, `existencias`, `promocion`, `preciopromo`, `activado`) VALUES
(1, 'Radiador Spirit', '4 CIL 2.2 89-90 SIN AIRE', 586.00, 7, 0, 500.00, 1),
(2, 'Filtro para Bomba de Gasolina Cavalier', '6v 2.8 90-94', 147.00, 1, 0, 120.00, 1),
(3, 'Metales De Biela Anillos De Piston Kit De Empaques De Motor', 'Kit para Motor', 8900.00, 10, 0, 8500.00, 1),
(5, 'Bobina AUDI', 'A4 2001-2006', 234.00, 8, 0, 0.00, 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detallepedido`
--
ALTER TABLE `detallepedido`
  ADD CONSTRAINT `detallepedido_ibfk_1` FOREIGN KEY (`idpedido`) REFERENCES `pedidos` (`idpedido`),
  ADD CONSTRAINT `detallepedido_ibfk_2` FOREIGN KEY (`idproducto`) REFERENCES `productos` (`idproducto`);

--
-- Filtros para la tabla `imagenesproductos`
--
ALTER TABLE `imagenesproductos`
  ADD CONSTRAINT `imagenesproductos_ibfk_1` FOREIGN KEY (`idproducto`) REFERENCES `productos` (`idproducto`);

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`idcliente`) REFERENCES `clientes` (`idcliente`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
