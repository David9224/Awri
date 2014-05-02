-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-04-2014 a las 04:27:57
-- Versión del servidor: 5.5.36
-- Versión de PHP: 5.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `Cedula` int(20) NOT NULL DEFAULT '0',
  `Nombre` varchar(10) DEFAULT NULL,
  `Apellido` varchar(20) DEFAULT NULL,
  `Telefono` int(20) DEFAULT NULL,
  `Nit_Empresa` int(20) DEFAULT NULL,
  PRIMARY KEY (`Cedula`),
  KEY `Nit_Empresa` (`Nit_Empresa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallepedido`
--

CREATE TABLE IF NOT EXISTS `detallepedido` (
  `Cantidad` int(10) DEFAULT NULL,
  `Id_Platos` int(10) NOT NULL DEFAULT '0',
  `Codigo_Pedido` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Id_Platos`,`Codigo_Pedido`),
  KEY `IDPedidoDetallePK` (`Codigo_Pedido`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE IF NOT EXISTS `empleados` (
  `Cedula` int(20) NOT NULL DEFAULT '0',
  `Nombre_usuario` varchar(20) DEFAULT NULL,
  `Password` varchar(10) DEFAULT NULL,
  `Nit_Empresa` int(10) DEFAULT NULL,
  `ID_Tipo` int(10) DEFAULT NULL,
  PRIMARY KEY (`Cedula`),
  KEY `Nit_Empresa` (`Nit_Empresa`),
  KEY `ID_Tipo` (`ID_Tipo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE IF NOT EXISTS `empresas` (
  `NIT` int(15) NOT NULL DEFAULT '0',
  `Nombre` varchar(30) DEFAULT NULL,
  `URL` varchar(30) DEFAULT NULL,
  `Direccion` varchar(30) DEFAULT NULL,
  `Telefono` int(20) DEFAULT NULL,
  PRIMARY KEY (`NIT`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE IF NOT EXISTS `pedidos` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  ` Fecha` date DEFAULT NULL,
  `Cedula_Cliente` int(20) DEFAULT NULL,
  `Cedula_Empleado` int(20) DEFAULT NULL,
  `Nit_Empresa` int(20) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `Cedula_Cliente` (`Cedula_Cliente`,`Cedula_Empleado`),
  KEY `Nit_Empresa` (`Nit_Empresa`),
  KEY `Cedula_Empleado` (`Cedula_Empleado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `platos`
--

CREATE TABLE IF NOT EXISTS `platos` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(30) DEFAULT NULL,
  `Ingredientes` varchar(100) DEFAULT NULL,
  `Fecha` date DEFAULT NULL,
  `Estado` varchar(30) DEFAULT 'Disponible',
  `Adicional` varchar(100) DEFAULT NULL,
  `NIT_Empresa` int(11) DEFAULT NULL,
  PRIMARY KEY (`Id`),
  KEY `NIT_Empresa` (`NIT_Empresa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_empleado`
--

CREATE TABLE IF NOT EXISTS `tipo_empleado` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `DESCRIPCION` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `ClienteEmpresaFK` FOREIGN KEY (`Nit_Empresa`) REFERENCES `empresas` (`NIT`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detallepedido`
--
ALTER TABLE `detallepedido`
  ADD CONSTRAINT `IDPedidoDetallePK` FOREIGN KEY (`Codigo_Pedido`) REFERENCES `pedidos` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `IDPlatosDetallePK` FOREIGN KEY (`Id_Platos`) REFERENCES `platos` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `EmpleadosTipoFK` FOREIGN KEY (`ID_Tipo`) REFERENCES `tipo_empleado` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `EmpleadosFK` FOREIGN KEY (`Nit_Empresa`) REFERENCES `empresas` (`NIT`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `EmpresaPedidoFK` FOREIGN KEY (`Nit_Empresa`) REFERENCES `empresas` (`NIT`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ClientePedidoFK` FOREIGN KEY (`Cedula_Cliente`) REFERENCES `clientes` (`Cedula`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `EmpleadoPedidoFK` FOREIGN KEY (`Cedula_Empleado`) REFERENCES `empleados` (`Cedula`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `platos`
--
ALTER TABLE `platos`
  ADD CONSTRAINT `platos_ibfk_1` FOREIGN KEY (`NIT_Empresa`) REFERENCES `empresas` (`NIT`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
