-- phpMyAdmin SQL Dump
-- version 4.0.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 07-11-2013 a las 11:27:42
-- Versión del servidor: 5.5.33
-- Versión de PHP: 5.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `clasesphp`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `determinarEdad`(IN fecha_nac DATE, OUT edad INT )
BEGIN
    SELECT (YEAR( CURRENT_DATE ) - YEAR( fecha_nac )) - ( DATE_FORMAT(CURDATE(),'%m-%d') < DATE_FORMAT(fecha_nac,'%m-%d') ) INTO edad;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sector`
--

CREATE TABLE IF NOT EXISTS `sector` (
  `idsector` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idsector`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `sector`
--

INSERT INTO `sector` (`idsector`, `nombre`) VALUES
(1, 'Recursos Humanos'),
(2, 'Comunicacion'),
(3, 'Gerencia'),
(4, 'Campo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `apellido` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `clave` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dni` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idsector` int(11) NOT NULL,
  `sexo` int(11) NOT NULL,
  `ruta_imagen` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_alta` datetime NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `fecha_nac` date NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idusuario`),
  UNIQUE KEY `usuario` (`usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=103 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `usuario`, `nombre`, `apellido`, `clave`, `dni`, `idsector`, `sexo`, `ruta_imagen`, `fecha_alta`, `activo`, `fecha_nac`, `email`) VALUES
(1, 'pepeloco', 'Pepe', 'Loco', 'pepeloco', '12098089', 1, 1, 'pandolfo.jpg', '2013-10-17 14:10:04', 1, '1985-05-05', 'pepeloco@gmail.com'),
(2, 'admin', 'Administrador', 'Dami', 'admin', '238988888', 1, 1, '', '2013-10-24 00:00:00', 1, '1993-01-02', 'admin@gmail.com'),
(3, 'ggutierrez0', 'Graciela', 'Gutierrez', 'ggutierrez0', '31957980', 4, 2, '', '2013-10-31 10:59:40', 1, '1955-08-01', 'ggutierrez0@gmail.com'),
(4, 'mcasares1', 'Mauro', 'Casares', 'mcasares1', '40864205', 2, 1, '', '2013-10-31 10:59:40', 1, '2004-05-10', 'mcasares1@gmail.com'),
(5, 'sartl2', 'Silvia', 'Artl', 'sartl2', '23287708', 2, 2, '', '2013-10-31 10:59:40', 1, '1984-10-21', 'sartl2@gmail.com'),
(6, 'rcasares3', 'Rosana', 'Casares', 'rcasares3', '21841846', 1, 2, '', '2013-10-31 10:59:40', 1, '2012-09-21', 'rcasares3@gmail.com'),
(7, 'mcasares4', 'María Teresa', 'Casares', 'mcasares4', '22387601', 3, 2, '', '2013-10-31 10:59:40', 1, '1977-03-20', 'mcasares4@gmail.com'),
(8, 'mgutierrez5', 'María Teresa', 'Gutierrez', 'mgutierrez5', '24126524', 2, 2, '', '2013-10-31 10:59:40', 1, '2000-11-11', 'mgutierrez5@gmail.com'),
(9, 'galvarez6', 'Graciela', 'Alvarez', 'galvarez6', '15880998', 1, 2, '', '2013-10-31 10:59:41', 1, '1946-01-08', 'galvarez6@gmail.com'),
(10, 'aborges7', 'Alejandro', 'Borges', 'aborges7', '36276636', 1, 1, '', '2013-10-31 10:59:41', 1, '1954-11-10', 'aborges7@gmail.com'),
(11, 'sartl8', 'Silvia', 'Artl', 'sartl8', '37663977', 4, 2, '', '2013-10-31 10:59:41', 1, '2000-01-22', 'sartl8@gmail.com'),
(12, 'esoldan9', 'Emilio', 'Soldan', 'esoldan9', '29442412', 3, 1, '', '2013-10-31 10:59:41', 1, '2002-10-17', 'esoldan9@gmail.com'),
(13, 'malvarez10', 'Martin', 'Alvarez', 'malvarez10', '19838260', 1, 1, '', '2013-10-31 10:59:41', 1, '1982-01-09', 'malvarez10@gmail.com'),
(14, 'ealvarez11', 'Emilio', 'Alvarez', 'ealvarez11', '34886522', 3, 1, '', '2013-10-31 10:59:41', 1, '1979-08-22', 'ealvarez11@gmail.com'),
(15, 'mborges12', 'María Teresa', 'Borges', 'mborges12', '35507124', 3, 2, '', '2013-10-31 10:59:41', 1, '2007-03-16', 'mborges12@gmail.com'),
(16, 'sperez13', 'Silvio', 'Perez', 'sperez13', '25913456', 3, 1, '', '2013-10-31 10:59:41', 1, '1944-05-27', 'sperez13@gmail.com'),
(17, 'aalvarez14', 'Alejandro', 'Alvarez', 'aalvarez14', '16418830', 4, 1, '', '2013-10-31 10:59:41', 1, '1993-07-27', 'aalvarez14@gmail.com'),
(18, 'sartl15', 'Silvio', 'Artl', 'sartl15', '30947179', 1, 1, '', '2013-10-31 10:59:41', 1, '1947-04-14', 'sartl15@gmail.com'),
(19, 'mcortazar16', 'María Teresa', 'Cortazar', 'mcortazar16', '36885850', 1, 2, '', '2013-10-31 10:59:41', 1, '1973-08-04', 'mcortazar16@gmail.com'),
(20, 'rperez17', 'Rosana', 'Perez', 'rperez17', '35934352', 2, 2, '', '2013-10-31 10:59:41', 1, '1990-11-17', 'rperez17@gmail.com'),
(21, 'mgarcia18', 'Martin', 'Garcia', 'mgarcia18', '31614809', 3, 1, '', '2013-10-31 10:59:41', 1, '1964-08-17', 'mgarcia18@gmail.com'),
(22, 'eborges19', 'Emilio', 'Borges', 'eborges19', '21158779', 3, 1, '', '2013-10-31 10:59:41', 1, '2008-10-11', 'eborges19@gmail.com'),
(23, 'mgarcia20', 'Martin', 'Garcia', 'mgarcia20', '32292446', 3, 1, '', '2013-10-31 10:59:41', 1, '1970-10-27', 'mgarcia20@gmail.com'),
(24, 'gartl21', 'Graciela', 'Artl', 'gartl21', '16644669', 3, 2, '', '2013-10-31 10:59:41', 1, '1971-02-08', 'gartl21@gmail.com'),
(25, 'eperez22', 'Emilio', 'Perez', 'eperez22', '16162985', 2, 1, '', '2013-10-31 10:59:41', 1, '1945-05-24', 'eperez22@gmail.com'),
(26, 'gperez23', 'Graciela', 'Perez', 'gperez23', '36485645', 4, 2, '', '2013-10-31 10:59:41', 1, '1951-01-21', 'gperez23@gmail.com'),
(27, 'rperez24', 'Rosana', 'Perez', 'rperez24', '15410589', 1, 2, '', '2013-10-31 10:59:41', 1, '1989-02-15', 'rperez24@gmail.com'),
(28, 'ralvarez25', 'Rosana', 'Alvarez', 'ralvarez25', '30493220', 3, 2, '', '2013-10-31 10:59:41', 1, '1966-02-14', 'ralvarez25@gmail.com'),
(29, 'rartl26', 'Rosana', 'Artl', 'rartl26', '31705498', 4, 2, '', '2013-10-31 10:59:41', 1, '1958-07-09', 'rartl26@gmail.com'),
(30, 'salvarez27', 'Silvio', 'Alvarez', 'salvarez27', '12164333', 1, 1, '', '2013-10-31 10:59:41', 1, '1996-11-07', 'salvarez27@gmail.com'),
(31, 'mcasares28', 'María Teresa', 'Casares', 'mcasares28', '40830831', 4, 2, '', '2013-10-31 10:59:41', 1, '1980-10-23', 'mcasares28@gmail.com'),
(32, 'aperez29', 'Alejandro', 'Perez', 'aperez29', '20998767', 3, 1, '', '2013-10-31 10:59:41', 1, '1981-03-16', 'aperez29@gmail.com'),
(33, 'mperez30', 'Mauro', 'Perez', 'mperez30', '25226734', 3, 1, '', '2013-10-31 10:59:41', 1, '1949-09-15', 'mperez30@gmail.com'),
(34, 'rartl31', 'Raquel', 'Artl', 'rartl31', '37537739', 1, 2, '', '2013-10-31 10:59:41', 1, '1973-07-12', 'rartl31@gmail.com'),
(35, 'ssoldan32', 'Silvia', 'Soldan', 'ssoldan32', '31832736', 2, 2, '', '2013-10-31 10:59:41', 1, '1979-04-26', 'ssoldan32@gmail.com'),
(36, 'mgutierrez33', 'María Teresa', 'Gutierrez', 'mgutierrez33', '39801825', 2, 2, '', '2013-10-31 10:59:41', 1, '2002-05-09', 'mgutierrez33@gmail.com'),
(37, 'sperez34', 'Silvio', 'Perez', 'sperez34', '28399231', 3, 1, '', '2013-10-31 10:59:41', 1, '1976-06-24', 'sperez34@gmail.com'),
(38, 'scasares35', 'Silvio', 'Casares', 'scasares35', '25831685', 2, 1, '', '2013-10-31 10:59:41', 1, '1944-06-08', 'scasares35@gmail.com'),
(39, 'sperez36', 'Silvia', 'Perez', 'sperez36', '34752366', 1, 2, '', '2013-10-31 10:59:41', 1, '2008-10-16', 'sperez36@gmail.com'),
(40, 'sperez37', 'Silvio', 'Perez', 'sperez37', '32688382', 3, 1, '', '2013-10-31 10:59:41', 1, '1962-08-11', 'sperez37@gmail.com'),
(41, 'asoldan38', 'Alejandro', 'Soldan', 'asoldan38', '22850472', 1, 1, '', '2013-10-31 10:59:41', 1, '1945-01-27', 'asoldan38@gmail.com'),
(42, 'adobleapellido39', 'Alejandro', 'Doble Apellido', 'adobleapellido39', '31610546', 1, 1, '', '2013-10-31 10:59:41', 1, '2004-05-14', 'adobleapellido39@gmail.com'),
(43, 'sdobleapellido40', 'Silvio', 'Doble Apellido', 'sdobleapellido40', '17717242', 3, 1, '', '2013-10-31 10:59:41', 1, '1960-08-23', 'sdobleapellido40@gmail.com'),
(44, 'agarcia41', 'Alejandro', 'Garcia', 'agarcia41', '10496286', 2, 1, '', '2013-10-31 10:59:42', 1, '1944-07-01', 'agarcia41@gmail.com'),
(45, 'asoldan42', 'Alejandro', 'Soldan', 'asoldan42', '39662405', 2, 1, '', '2013-10-31 10:59:42', 1, '1959-02-25', 'asoldan42@gmail.com'),
(46, 'eartl43', 'Emilio', 'Artl', 'eartl43', '36510393', 4, 1, '', '2013-10-31 10:59:42', 1, '1959-05-10', 'eartl43@gmail.com'),
(47, 'salvarez44', 'Silvio', 'Alvarez', 'salvarez44', '11573122', 4, 1, '', '2013-10-31 10:59:42', 1, '1982-08-26', 'salvarez44@gmail.com'),
(48, 'mdobleapellido45', 'Martin', 'Doble Apellido', 'mdobleapellido45', '27464177', 3, 1, '', '2013-10-31 10:59:42', 1, '1980-10-19', 'mdobleapellido45@gmail.com'),
(49, 'martl46', 'Mauro', 'Artl', 'martl46', '17457748', 2, 1, '', '2013-10-31 10:59:42', 1, '2000-01-25', 'martl46@gmail.com'),
(50, 'mcasares47', 'María Teresa', 'Casares', 'mcasares47', '33621764', 4, 2, '', '2013-10-31 10:59:42', 1, '1960-07-03', 'mcasares47@gmail.com'),
(51, 'eperez48', 'Emilio', 'Perez', 'eperez48', '32762241', 3, 1, '', '2013-10-31 10:59:42', 1, '1992-04-13', 'eperez48@gmail.com'),
(52, 'ggutierrez49', 'Graciela', 'Gutierrez', 'ggutierrez49', '19508556', 2, 2, '', '2013-10-31 10:59:42', 1, '1964-03-01', 'ggutierrez49@gmail.com'),
(53, 'sgarcia50', 'Silvia', 'Garcia', 'sgarcia50', '15771585', 3, 2, '', '2013-10-31 10:59:42', 1, '1980-07-11', 'sgarcia50@gmail.com'),
(54, 'martl51', 'Martin', 'Artl', 'martl51', '24382661', 4, 1, '', '2013-10-31 10:59:42', 1, '1958-10-22', 'martl51@gmail.com'),
(55, 'rcortazar52', 'Rosana', 'Cortazar', 'rcortazar52', '28476358', 4, 2, '', '2013-10-31 10:59:42', 1, '1964-02-23', 'rcortazar52@gmail.com'),
(56, 'rperez53', 'Raquel', 'Perez', 'rperez53', '26560701', 4, 2, '', '2013-10-31 10:59:42', 1, '1998-05-16', 'rperez53@gmail.com'),
(57, 'rsoldan54', 'Rosana', 'Soldan', 'rsoldan54', '34999584', 3, 2, '', '2013-10-31 10:59:42', 1, '1994-11-16', 'rsoldan54@gmail.com'),
(58, 'mgarcia55', 'Martin', 'Garcia', 'mgarcia55', '23466712', 3, 1, '', '2013-10-31 10:59:42', 1, '1944-04-20', 'mgarcia55@gmail.com'),
(59, 'sgarcia56', 'Silvio', 'Garcia', 'sgarcia56', '23458800', 3, 1, '', '2013-10-31 10:59:42', 1, '1982-07-13', 'sgarcia56@gmail.com'),
(60, 'asoldan57', 'Alejandro', 'Soldan', 'asoldan57', '22476301', 1, 1, '', '2013-10-31 10:59:42', 1, '1968-06-09', 'asoldan57@gmail.com'),
(61, 'mborges58', 'Martin', 'Borges', 'mborges58', '15201289', 1, 1, '', '2013-10-31 10:59:42', 1, '1954-10-22', 'mborges58@gmail.com'),
(62, 'mgutierrez59', 'María Teresa', 'Gutierrez', 'mgutierrez59', '20876178', 3, 2, '', '2013-10-31 10:59:42', 1, '1965-04-14', 'mgutierrez59@gmail.com'),
(63, 'sperez60', 'Silvia', 'Perez', 'sperez60', '22880764', 4, 2, '', '2013-10-31 10:59:42', 1, '1990-10-07', 'sperez60@gmail.com'),
(64, 'rdobleapellido61', 'Rosana', 'Doble Apellido', 'rdobleapellido61', '32579869', 1, 2, '', '2013-10-31 10:59:42', 1, '1983-03-10', 'rdobleapellido61@gmail.com'),
(65, 'ealvarez62', 'Emilio', 'Alvarez', 'ealvarez62', '20303519', 4, 1, '', '2013-10-31 10:59:42', 1, '1950-06-01', 'ealvarez62@gmail.com'),
(66, 'rdobleapellido63', 'Rosana', 'Doble Apellido', 'rdobleapellido63', '32583232', 3, 2, '', '2013-10-31 10:59:42', 1, '1986-01-16', 'rdobleapellido63@gmail.com'),
(67, 'mdobleapellido64', 'María Teresa', 'Doble Apellido', 'mdobleapellido64', '11647881', 4, 2, '', '2013-10-31 10:59:42', 1, '1988-06-12', 'mdobleapellido64@gmail.com'),
(68, 'mcortazar65', 'Martin', 'Cortazar', 'mcortazar65', '40888859', 4, 1, '', '2013-10-31 10:59:42', 1, '1998-07-21', 'mcortazar65@gmail.com'),
(69, 'ralvarez66', 'Rosana', 'Alvarez', 'ralvarez66', '23488191', 2, 2, '', '2013-10-31 10:59:42', 1, '2009-05-09', 'ralvarez66@gmail.com'),
(70, 'aborges67', 'Alejandro', 'Borges', 'aborges67', '14189399', 4, 1, '', '2013-10-31 10:59:42', 1, '1966-08-13', 'aborges67@gmail.com'),
(71, 'mborges68', 'Martin', 'Borges', 'mborges68', '39239732', 1, 1, '', '2013-10-31 10:59:42', 1, '1961-10-19', 'mborges68@gmail.com'),
(72, 'acortazar69', 'Alejandro', 'Cortazar', 'acortazar69', '30514599', 2, 1, '', '2013-10-31 10:59:42', 1, '1998-10-25', 'acortazar69@gmail.com'),
(73, 'adobleapellido70', 'Alejandro', 'Doble Apellido', 'adobleapellido70', '22684316', 4, 1, '', '2013-10-31 10:59:42', 1, '2008-11-01', 'adobleapellido70@gmail.com'),
(74, 'gartl71', 'Graciela', 'Artl', 'gartl71', '33682447', 3, 2, '', '2013-10-31 10:59:42', 1, '1954-09-11', 'gartl71@gmail.com'),
(75, 'rdobleapellido72', 'Rosana', 'Doble Apellido', 'rdobleapellido72', '24692265', 2, 2, '', '2013-10-31 10:59:42', 1, '1985-10-17', 'rdobleapellido72@gmail.com'),
(76, 'mcortazar73', 'Martin', 'Cortazar', 'mcortazar73', '31291737', 3, 1, '', '2013-10-31 10:59:42', 1, '1969-01-05', 'mcortazar73@gmail.com'),
(77, 'martl74', 'Mauro', 'Artl', 'martl74', '17155770', 4, 1, '', '2013-10-31 10:59:42', 1, '1987-08-16', 'martl74@gmail.com'),
(78, 'sgutierrez75', 'Silvio', 'Gutierrez', 'sgutierrez75', '15480799', 3, 1, '', '2013-10-31 10:59:42', 1, '1999-04-04', 'sgutierrez75@gmail.com'),
(79, 'ggarcia76', 'Graciela', 'Garcia', 'ggarcia76', '36272981', 3, 2, '', '2013-10-31 10:59:42', 1, '1994-04-07', 'ggarcia76@gmail.com'),
(80, 'mgarcia77', 'María Teresa', 'Garcia', 'mgarcia77', '18578151', 1, 2, '', '2013-10-31 10:59:42', 1, '1962-08-19', 'mgarcia77@gmail.com'),
(81, 'mgarcia78', 'Martin', 'Garcia', 'mgarcia78', '28833985', 1, 1, '', '2013-10-31 10:59:42', 1, '1970-10-02', 'mgarcia78@gmail.com'),
(82, 'mgutierrez79', 'María Teresa', 'Gutierrez', 'mgutierrez79', '37328730', 1, 2, '', '2013-10-31 10:59:42', 1, '1992-05-21', 'mgutierrez79@gmail.com'),
(83, 'gcortazar80', 'Graciela', 'Cortazar', 'gcortazar80', '25900894', 4, 2, '', '2013-10-31 10:59:42', 1, '1989-01-09', 'gcortazar80@gmail.com'),
(84, 'mperez81', 'María Teresa', 'Perez', 'mperez81', '27677741', 1, 2, '', '2013-10-31 10:59:42', 1, '1965-09-18', 'mperez81@gmail.com'),
(85, 'mgutierrez82', 'Mauro', 'Gutierrez', 'mgutierrez82', '27768430', 1, 1, '', '2013-10-31 10:59:42', 1, '1952-08-26', 'mgutierrez82@gmail.com'),
(86, 'galvarez83', 'Graciela', 'Alvarez', 'galvarez83', '26522783', 1, 2, '', '2013-10-31 10:59:43', 1, '1988-06-11', 'galvarez83@gmail.com'),
(87, 'rartl84', 'Raquel', 'Artl', 'rartl84', '21225105', 2, 2, '', '2013-10-31 10:59:43', 1, '1975-03-19', 'rartl84@gmail.com'),
(88, 'aborges85', 'Alejandro', 'Borges', 'aborges85', '12307402', 3, 1, '', '2013-10-31 10:59:43', 1, '1996-09-18', 'aborges85@gmail.com'),
(89, 'aartl86', 'Alejandro', 'Artl', 'aartl86', '36691385', 4, 1, '', '2013-10-31 10:59:43', 1, '2001-04-24', 'aartl86@gmail.com'),
(90, 'acasares87', 'Alejandro', 'Casares', 'acasares87', '16390199', 1, 1, '', '2013-10-31 10:59:43', 1, '1984-04-19', 'acasares87@gmail.com'),
(91, 'eartl88', 'Emilio', 'Artl', 'eartl88', '35519597', 4, 1, '', '2013-10-31 10:59:43', 1, '1979-07-08', 'eartl88@gmail.com'),
(92, 'msoldan89', 'María Teresa', 'Soldan', 'msoldan89', '13242455', 3, 2, '', '2013-10-31 10:59:43', 1, '1991-08-03', 'msoldan89@gmail.com'),
(93, 'mgutierrez90', 'Mauro', 'Gutierrez', 'mgutierrez90', '36551592', 1, 1, '', '2013-10-31 10:59:43', 1, '1982-07-04', 'mgutierrez90@gmail.com'),
(94, 'mborges91', 'Martin', 'Borges', 'mborges91', '14975336', 4, 1, '', '2013-10-31 10:59:43', 1, '2006-02-04', 'mborges91@gmail.com'),
(95, 'ecasares92', 'Emilio', 'Casares', 'ecasares92', '33177998', 2, 1, '', '2013-10-31 10:59:43', 1, '1957-07-14', 'ecasares92@gmail.com'),
(96, 'rborges93', 'Rosana', 'Borges', 'rborges93', '33677798', 4, 2, '', '2013-10-31 10:59:43', 1, '1984-06-20', 'rborges93@gmail.com'),
(97, 'rborges94', 'Rosana', 'Borges', 'rborges94', '17838837', 2, 2, '', '2013-10-31 10:59:43', 1, '1952-06-02', 'rborges94@gmail.com'),
(98, 'ssoldan95', 'Silvia', 'Soldan', 'ssoldan95', '36594159', 2, 2, '', '2013-10-31 10:59:43', 1, '1996-08-27', 'ssoldan95@gmail.com'),
(99, 'eborges96', 'Emilio', 'Borges', 'eborges96', '22802642', 2, 1, '', '2013-10-31 10:59:43', 1, '2008-09-25', 'eborges96@gmail.com'),
(100, 'gdobleapellido97', 'Graciela', 'Doble Apellido', 'gdobleapellido97', '19421230', 3, 2, '', '2013-10-31 10:59:43', 1, '1967-11-23', 'gdobleapellido97@gmail.com'),
(101, 'egarcia98', 'Emilio', 'Garcia', 'egarcia98', '34643852', 3, 1, '', '2013-10-31 10:59:43', 1, '1963-11-23', 'egarcia98@gmail.com'),
(102, 'mdobleapellido99', 'Martin', 'Doble Apellido', 'mdobleapellido99', '21220456', 3, 1, '', '2013-10-31 10:59:43', 1, '1962-11-25', 'mdobleapellido99@gmail.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
