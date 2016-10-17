-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 01-10-2016 a las 18:24:03
-- Versión del servidor: 5.5.16
-- Versión de PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Base de datos: `grupo24`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Caracteristicas`
--

CREATE TABLE IF NOT EXISTS `Caracteristicas` (
  `idCaracteristica` int(11) NOT NULL AUTO_INCREMENT,
  `Caracteristica` varchar(60) NOT NULL,
  PRIMARY KEY (`idCaracteristica`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 PACK_KEYS=0 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `Caracteristicas`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Marcas`
--

CREATE TABLE IF NOT EXISTS `Marcas` (
  `idMarca` int(11) NOT NULL AUTO_INCREMENT,
  `Marca` varchar(20) NOT NULL,
  PRIMARY KEY (`idMarca`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 PACK_KEYS=0 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `Marcas`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Modelos`
--

CREATE TABLE IF NOT EXISTS `Modelos` (
  `idModelo` int(11) NOT NULL AUTO_INCREMENT,
  `idMarca` int(11) NOT NULL,
  `Modelo` varchar(20) NOT NULL,
  PRIMARY KEY (`idModelo`),
  KEY `Modelos_FKIndex1` (`idMarca`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 PACK_KEYS=0 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `Modelos`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Tipos`
--

CREATE TABLE IF NOT EXISTS `Tipos` (
  `idTipo` int(11) NOT NULL AUTO_INCREMENT,
  `Tipo` varchar(20) NOT NULL,
  PRIMARY KEY (`idTipo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 PACK_KEYS=0 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `Tipos`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `clave` varchar(20) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idUsuario`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `usuarios`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Vehiculos`
--

CREATE TABLE IF NOT EXISTS `Vehiculos` (
  `idVehiculo` int(11) NOT NULL AUTO_INCREMENT,
  `idModelo` int(11) NOT NULL,
  `idTipo` int(11) NOT NULL,
  `Dominio` varchar(6) NOT NULL,
  `Anio` varchar(4) NOT NULL,
  `Precio` float(10,2) NOT NULL,
  `contenidoimagen` blob NOT NULL,
  `tipoimagen` varchar(6) NOT NULL,
  PRIMARY KEY (`idVehiculo`),
  KEY `Autos_FKIndex1` (`idTipo`),
  KEY `Autos_FKIndex2` (`idModelo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 PACK_KEYS=0 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `Vehiculos`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Vehiculos_Caracteristicas`
--

CREATE TABLE IF NOT EXISTS `Vehiculos_Caracteristicas` (
  `idVehiculoCaractesristica` int(11) NOT NULL AUTO_INCREMENT,
  `idVehiculo` int(11) NOT NULL,
  `idCaracteristica` int(11) NOT NULL,
  PRIMARY KEY (`idVehiculoCaractesristica`),
  KEY `Autos_Caracteristicas_FKIndex1` (`idCaracteristica`),
  KEY `fk_{GNMBTXCJQbWrA1PMCiZVg}` (`idVehiculo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 PACK_KEYS=0 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `Vehiculos_Caracteristicas`
--


--
-- Filtros para las tablas descargadas (dump)
--

--
-- Filtros para la tabla `Modelos`
--
ALTER TABLE `Modelos`
  ADD CONSTRAINT `fk_{8oSx4nWkSj+l9G8F8V+09}` FOREIGN KEY (`idMarca`) REFERENCES `Marcas` (`idMarca`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `Vehiculos`
--
ALTER TABLE `Vehiculos`
  ADD CONSTRAINT `fk_{ciY2to=wRS+TVyPesxfZI}` FOREIGN KEY (`idModelo`) REFERENCES `Modelos` (`idModelo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_{iuBdN4a0ReqAD=H5+xZ4V}` FOREIGN KEY (`idTipo`) REFERENCES `Tipos` (`idTipo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `Vehiculos_Caracteristicas`
--
ALTER TABLE `Vehiculos_Caracteristicas`
  ADD CONSTRAINT `fk_{1O9dsF+6T82rZC7yZGxcb}` FOREIGN KEY (`idCaracteristica`) REFERENCES `Caracteristicas` (`idCaracteristica`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_{GNMBTXCJQbWrA1PMCiZVg}` FOREIGN KEY (`idVehiculo`) REFERENCES `Vehiculos` (`idVehiculo`) ON DELETE NO ACTION ON UPDATE NO ACTION;
