-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-07-2020 a las 00:18:36
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `base_utiles`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `hh` ()  BEGIN 
    
      SELECT p.cod_prod,e.nom_emp,p.descripcion,SUM(u.salida) as 'Salida',u.Fecha_de_carga 
      from utiles u INNER JOIN productos p 
      on (p.cod_prod=u.id_Producto) 
      INNER JOIN empleados e on(e.id_emp=u.id_emp)
      where p.cod_prod=u.id_Producto 
      GROUP by p.cod_prod,e.nom_emp;
  
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `hjg` ()  BEGIN 
    
     
    IF ((SELECT p.cant_inicial-SUM(u.salida) from productos p INNER JOIN utiles2 u ON(u.id_Producto=p.cod_prod) WHERE p.cod_prod=u.id_Producto GROUP BY u.salida,p.cant_inicial)>0) THEN
      SELECT u.id_Producto,p.descripcion,e.nom_emp as 'Nombre',u.Fecha_de_carga as 'Fecha de salida',p.cant_inicial,SUM(u.salida) as 'Salida',p.cant_inicial-SUM(u.salida) as 'Stock Total'
      from productos p 
      INNER JOIN utiles2 u 
      ON(u.id_Producto=p.cod_prod) 
      INNER JOIN empleados e
      ON(e.id_emp=u.id_emp)
      WHERE p.cod_prod=u.id_Producto
      GROUP BY p.cod_prod,e.nom_emp; 
    END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_listar_salida` ()  BEGIN 
    
      SELECT p.cod_prod,e.nom_emp,p.descripcion,SUM(u.salida) as 'Salida',u.Fecha_de_carga 
      from utiles u INNER JOIN productos p 
      on (p.cod_prod=u.id_Producto) 
      INNER JOIN empleados e on(e.id_emp=u.id_emp)
      where p.cod_prod=u.id_Producto 
      GROUP by p.cod_prod,e.nom_emp;
  
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_update_stock` ()  BEGIN 
    
     
    IF ((SELECT p.cant_inicial-SUM(u.salida) from productos p INNER JOIN utiles2 u ON(u.id_Producto=p.cod_prod) WHERE p.cod_prod=u.id_Producto GROUP BY u.salida,p.cant_inicial)>0) THEN
      SELECT u.id_Producto,p.descripcion,e.nom_emp as 'Nombre',u.Fecha_de_carga as 'Fecha de salida',p.cant_inicial,SUM(u.salida) as 'Salida',p.cant_inicial-SUM(u.salida) as 'Stock Total'
      from productos p 
      INNER JOIN utiles2 u 
      ON(u.id_Producto=p.cod_prod) 
      INNER JOIN empleados e
      ON(e.id_emp=u.id_emp)
      WHERE p.cod_prod=u.id_Producto
      GROUP BY p.cod_prod,e.nom_emp; 
    END IF;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `codigo` int(11) NOT NULL,
  `descripcion` int(11) NOT NULL,
  `categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id_emp` int(6) NOT NULL,
  `nom_emp` varchar(30) NOT NULL,
  `ape_emp` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id_emp`, `nom_emp`, `ape_emp`) VALUES
(1, 'Abelio', 'Salvador'),
(2, 'Adriana', 'Zapata'),
(3, 'Areli', 'Atanacio'),
(4, 'Amparo', 'Aranda'),
(5, 'Brillit', ''),
(6, 'Christian ', 'Vargas'),
(7, 'Jose ', 'Huasupoma'),
(8, 'Jose ', 'Aguila'),
(9, 'Edith ', 'Rodriguez Palacios'),
(10, 'Joel ', 'Baldeon'),
(11, 'Karen ', 'Rojas'),
(12, 'Karina ', 'Anccota Palacios'),
(13, 'Karim ', 'Ramirez'),
(14, 'Kelly ', 'Peñalosa'),
(15, 'Kevin ', 'Vargas'),
(16, 'Mishel ', 'de la Cruz'),
(17, 'Marvin ', 'Sanchez'),
(19, 'Magaly ', 'Tamariz'),
(20, 'Miriam', 'Mamani'),
(21, 'Geraldine ', 'Jasinto'),
(22, 'Percy ', 'Rodriguez'),
(23, 'Ricardo ', 'Salvador'),
(24, 'Silvia ', 'Villa'),
(25, 'Veronica ', 'Guerrero'),
(26, 'Yulisa ', 'Sarmiento'),
(27, 'Yoshelin ', 'Asencio'),
(28, 'Lourdes ', 'Tomasto'),
(29, 'Orlando ', 'Santamaria'),
(31, 'Paz ', 'Santos'),
(32, 'Milsa ', 'Salvador'),
(33, 'Lisseth ', 'Bohorquez'),
(34, 'Carlos ', 'Meza'),
(35, 'Renato', 'Rocha'),
(36, 'Local Comas', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrada`
--

CREATE TABLE `entrada` (
  `id_entrada` int(11) NOT NULL,
  `id_producto` varchar(6) NOT NULL,
  `Nom_prov` varchar(25) NOT NULL,
  `fecha_entrada` varchar(250) NOT NULL,
  `cantidad_inicial` int(11) NOT NULL,
  `entrada` int(11) NOT NULL,
  `stock_final` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `entrada`
--

INSERT INTO `entrada` (`id_entrada`, `id_producto`, `Nom_prov`, `fecha_entrada`, `cantidad_inicial`, `entrada`, `stock_final`) VALUES
(1, 'MC001', 'Tay loi', '03-06-2020', 9, 180, 189),
(2, 'LI001', 'Tay loi', '03-06-2020', 0, 9, 9),
(4, 'MA001', 'Tay loi', '03-06-2020', 0, 1, 1),
(5, 'PL001', 'Tay loi', '04-06-2020', 222, 3, 225),
(6, 'FA001', 'Comas', '15-06-2020', 0, 134, 134),
(7, 'CA001', 'Tay loi', '15-06-2020', 49, 102, 151),
(8, 'CA001', 'Comas', '10-07-2020', 0, 233, 233),
(9, 'FA401', 'Tay loi', '16-07-2020', 1, 250, 251),
(10, 'PF001', 'Tay loi', '16-07-2020', 0, 4, 4),
(11, 'FA001', 'Tay loi', '16-07-2020', 106, 500, 606),
(15, 'PL001', 'Tai loy', '16-07-2020', 202, 3, 205),
(16, 'TA001', 'Tai loy', '16-07-2020', 5, 4, 9),
(17, 'RE001', 'Tai loy', '16-07-2020', 1, 20, 21),
(18, 'PD001', 'Tai loy', '16-07-2020', 1, 50, 51),
(19, 'CU002', 'Tai loy', '16-07-2020', 2, 7, 9),
(20, 'PG001', 'Tai loy', '16-07-2020', 19, 12, 31),
(21, 'PG001', 'Tai loy', '16-07-2020', 31, 2, 33),
(22, 'CN001', 'Tai loy', '16-07-2020', 0, 36, 36),
(23, 'TAB01', 'Tai loy', '16-07-2020', 0, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_prod` int(6) NOT NULL,
  `cod_prod` varchar(6) NOT NULL,
  `descripcion` varchar(60) NOT NULL,
  `cant_inicial` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_prod`, `cod_prod`, `descripcion`, `cant_inicial`) VALUES
(1, 'AR001', 'Archivador carton oficio', 53),
(2, 'AR002', 'Archivador carton 1/2 oficio', 24),
(3, 'BO002', 'Bolsa politileno 21x41x5', 1),
(4, 'BO001', 'bolsa blanco 21x24', 310),
(5, 'CN001', 'Cinta de embalaje', 26),
(6, 'CN002', 'Cinta  scotch pegafan', 7),
(7, 'CL001', 'Clips', 11585),
(8, 'CL002', 'Clips mariposa 65 mm', 8),
(9, 'CL003', 'Clips mariposa 45 mm', 99),
(10, 'CL004', 'Clips binder 1 pulg', 84),
(11, 'CL005', 'clips binder 1  1/4 pulg', 146),
(12, 'CL006', 'clip binder 1  5/8 pulg', 73),
(13, 'CL007', 'Clips binder 2 pulg', 123),
(14, 'CO001', 'Corrector', 7),
(15, 'CU401', 'Cuaderno A4', 2),
(16, 'CU001', 'Cuaderno chico', 4),
(17, 'CA001', 'Cartulina duplex', 51),
(18, 'EN001', 'Engrapadora', 8),
(19, 'FA001', 'Fastener', 551),
(20, 'FO001', 'Folder manila oficio', 121),
(21, 'FA401', 'Folder manila A4', 251),
(22, 'GR001', 'Grapas 23/10 oficio (barras)', 35),
(23, 'GR002', 'Grapas 26/6 A4 (barras)', 217),
(24, 'GO001', 'Goma liquida', 0),
(25, 'H001', 'Huellero', 4),
(26, 'LA001', 'Lapiz', 35),
(27, 'LP001', 'Lapicero azul', 54),
(28, 'LP002', 'Lapicero negro', 54),
(29, 'LP003', 'Lapicero rojo', 50),
(30, 'LI001', 'Limpiatipos artesco', 9),
(31, 'MA001', 'Masking pegafan', 1),
(32, 'MC001', 'micas A4', 104),
(33, 'PD001', 'Plumon delgado rojo', 49),
(34, 'PG001', 'Plumon grueso negro indeleble', 32),
(35, 'PG002', 'Plumon grueso rojo', 0),
(36, 'PG003', 'Plumon grueso azul', 0),
(37, 'PG004', 'Plumon grueso indeleble', 0),
(38, 'PA002', 'Papel bound A4', 80770),
(39, 'PA003', 'Papel contact ', 0),
(40, 'PA004', 'Papel bound arco iris', 0),
(41, 'PE001', 'Perforador', 5),
(42, 'PL001', 'Papel lustre (pliegos)', 194),
(43, 'PO001', 'Porta clip artesco', 19),
(44, 'PO002', 'Porta CD', 57),
(45, 'PO003', 'Porta Papel A4', 0),
(46, 'RE001', 'Resaltador', 21),
(47, 'RE002', 'Regla', 9),
(48, 'TA001', 'Tajador', 8),
(49, 'TI001', 'Tijera', 6),
(50, 'SO001', 'Sobre extra oficio', 69),
(51, 'SO002', 'Sobre oficio', 541),
(52, 'SO003', 'Sobre 1/2 oficio', 612),
(53, 'SO004', 'Sobre A4', 281),
(54, 'SO005', 'Sobre de pago', 144),
(55, 'SA001', 'Saca grapas', 0),
(56, 'BA001', 'Banderitas (post-it)', 5),
(57, 'BO002', 'Borrador chico', 10),
(58, 'NO002', 'notas adhesivas 3x3 (paquetes)', 16),
(59, 'NO003', 'notas adhesivas 1 3/8 X 1 7/8 (paquetes)', 8),
(60, 'CU002', 'cuchilla 18mm', 9),
(61, 'CAL001', 'calculadora casio ', 6),
(62, 'BO003', 'Bolsas Transparentes', 104),
(63, 'PF001', 'Papel Film ', 4),
(64, 'TAB01', 'Tablero Plastico Oficio', 1),
(65, 'FAD01', 'Forro Autoadhesivo', 0),
(66, 'PP001', 'Plumon de pizarra', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salidas`
--

CREATE TABLE `salidas` (
  `id_salida` int(10) NOT NULL,
  `id_emp` int(6) NOT NULL,
  `cod_prod` varchar(6) NOT NULL,
  `fecha_salida` varchar(250) NOT NULL,
  `cantidad_inicial` int(11) NOT NULL,
  `salida` int(6) NOT NULL,
  `stock_final` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `salidas`
--

INSERT INTO `salidas` (`id_salida`, `id_emp`, `cod_prod`, `fecha_salida`, `cantidad_inicial`, `salida`, `stock_final`) VALUES
(4, 29, 'PA002', '02-06-2020', 93800, 200, 93600),
(6, 29, 'BO001', '02-06-2020', 1095, 6, 1089),
(7, 29, 'GR002', '02-06-2020', 282, 1, 281),
(8, 29, 'LA001', '02-06-2020', 43, 1, 42),
(9, 27, 'PA002', '02-06-2020', 93600, 200, 93400),
(10, 27, 'LP003', '02-06-2020', 53, 1, 52),
(11, 27, 'LP002', '02-06-2020', 55, 1, 54),
(13, 27, 'BO001', '02-06-2020', 1089, 10, 1079),
(14, 27, 'GR002', '02-06-2020', 281, 1, 280),
(15, 14, 'PA002', '02-06-2020', 93400, 200, 93200),
(17, 14, 'BO001', '02-06-2020', 1079, 10, 1069),
(18, 20, 'PA002', '02-06-2020', 93200, 200, 93000),
(19, 20, 'PD001', '02-06-2020', 3, 1, 2),
(20, 20, 'LA001', '02-06-2020', 42, 1, 41),
(22, 20, 'BO001', '02-06-2020', 1069, 6, 1063),
(23, 25, 'PA002', '02-06-2020', 93000, 200, 92800),
(25, 25, 'BO001', '02-06-2020', 1063, 6, 1057),
(27, 15, 'PA002', '02-06-2020', 92800, 200, 92600),
(29, 12, 'PA002', '02-06-2020', 92600, 200, 92400),
(32, 16, 'PA002', '02-06-2020', 92400, 200, 92200),
(33, 16, 'BO001', '02-06-2020', 1057, 10, 1047),
(42, 17, 'PA002', '02-06-2020', 92200, 200, 92000),
(44, 17, 'BO001', '02-06-2020', 1047, 10, 1037),
(46, 2, 'LA001', '02-06-2020', 41, 1, 40),
(47, 2, 'LP003', '02-06-2020', 52, 1, 51),
(48, 2, 'RE001', '02-06-2020', 2, 1, 1),
(50, 2, 'BO001', '02-06-2020', 1037, 13, 1024),
(53, 34, 'LP001', '02-06-2020', 57, 1, 56),
(54, 34, 'PA002', '02-06-2020', 92000, 200, 91800),
(56, 5, 'LA001', '02-06-2020', 40, 1, 39),
(57, 5, 'TA001', '02-06-2020', 8, 1, 7),
(58, 5, 'BO001', '02-06-2020', 1024, 4, 1020),
(60, 10, 'LA001', '02-06-2020', 39, 1, 38),
(61, 10, 'LP001', '02-06-2020', 56, 1, 55),
(62, 10, 'RE002', '02-06-2020', 11, 1, 10),
(64, 13, 'LP003', '02-06-2020', 51, 1, 50),
(65, 13, 'BO001', '02-06-2020', 1020, 5, 1015),
(66, 4, 'PA002', '02-06-2020', 91800, 2000, 89800),
(67, 4, 'LP001', '02-06-2020', 55, 1, 54),
(69, 29, 'FA001', '02-06-2020', 256, 12, 244),
(71, 27, 'FA001', '02-06-2020', 244, 12, 232),
(72, 14, 'FA001', '02-06-2020', 232, 10, 222),
(75, 20, 'FA001', '02-06-2020', 222, 10, 212),
(77, 25, 'FA001', '02-06-2020', 212, 12, 200),
(79, 25, 'FA001', '02-06-2020', 200, 10, 190),
(82, 16, 'FA001', '02-06-2020', 190, 10, 180),
(85, 2, 'FA001', '02-06-2020', 180, 13, 167),
(87, 5, 'FA001', '02-06-2020', 167, 4, 163),
(89, 13, 'FA001', '02-06-2020', 163, 5, 158),
(90, 25, 'GR002', '02-06-2020', 280, 1, 279),
(91, 2, 'CA001', '02-06-2020', 395, 12, 383),
(92, 5, 'CA001', '02-06-2020', 383, 8, 375),
(93, 13, 'CA001', '02-06-2020', 375, 10, 365),
(94, 12, 'CA001', '02-06-2020', 365, 10, 355),
(95, 16, 'CA001', '02-06-2020', 355, 20, 335),
(96, 17, 'CA001', '02-06-2020', 335, 16, 319),
(97, 29, 'CA001', '02-06-2020', 319, 10, 309),
(98, 27, 'CA001', '02-06-2020', 309, 12, 297),
(99, 14, 'CA001', '02-06-2020', 297, 10, 287),
(100, 20, 'CA001', '02-06-2020', 287, 12, 275),
(101, 25, 'CA001', '02-06-2020', 275, 12, 263),
(102, 15, 'CA001', '02-06-2020', 263, 10, 253),
(103, 12, 'CA001', '08-06-2020', 253, 20, 233),
(104, 31, 'CA001', '08-06-2020', 233, 20, 213),
(105, 17, 'CA001', '08-06-2020', 213, 10, 203),
(106, 12, 'PD001', '08-06-2020', 2, 1, 1),
(107, 16, 'PA002', '08-06-2020', 89800, 100, 89700),
(108, 31, 'PA002', '08-06-2020', 89700, 200, 89500),
(109, 31, 'FA001', '08-06-2020', 158, 20, 138),
(110, 31, 'BO001', '08-06-2020', 1015, 15, 1000),
(111, 17, 'PA002', '08-06-2020', 89500, 200, 89300),
(112, 11, 'BO001', '09-06-2020', 1000, 7, 993),
(113, 20, 'BO001', '09-06-2020', 993, 12, 981),
(114, 11, 'FA001', '09-06-2020', 138, 12, 126),
(115, 14, 'FA001', '09-06-2020', 126, 10, 116),
(116, 11, 'PA002', '09-06-2020', 89300, 200, 89100),
(117, 27, 'GR002', '09-06-2020', 279, 1, 278),
(118, 14, 'PG001', '09-06-2020', 21, 2, 19),
(119, 20, 'TA001', '09-06-2020', 7, 1, 6),
(120, 20, 'GR002', '09-06-2020', 278, 1, 277),
(121, 20, 'TI001', '09-06-2020', 9, 1, 8),
(122, 29, 'TI001', '09-06-2020', 8, 1, 7),
(123, 15, 'GR002', '09-06-2020', 277, 1, 276),
(124, 11, 'CA001', '09-06-2020', 203, 14, 189),
(125, 20, 'CA001', '09-06-2020', 189, 4, 185),
(126, 2, 'FA001', '10-06-2020', 116, 15, 101),
(127, 2, 'GR002', '10-06-2020', 276, 4, 272),
(128, 2, 'BO001', '10-06-2020', 981, 10, 971),
(129, 2, 'FA401', '10-06-2020', 17, 3, 14),
(130, 2, 'SO004', '10-06-2020', 289, 3, 286),
(131, 5, 'FA001', '10-06-2020', 101, 14, 87),
(132, 5, 'GR002', '10-06-2020', 272, 2, 270),
(133, 5, 'BO001', '10-06-2020', 971, 4, 967),
(134, 5, 'FA401', '10-06-2020', 14, 2, 12),
(135, 5, 'SO004', '10-06-2020', 286, 3, 283),
(136, 13, 'FA001', '10-06-2020', 87, 12, 75),
(137, 13, 'GR002', '10-06-2020', 270, 3, 267),
(138, 13, 'BO001', '10-06-2020', 967, 10, 957),
(139, 13, 'SO004', '10-06-2020', 283, 2, 281),
(140, 4, 'AR001', '10-06-2020', 59, 1, 58),
(141, 4, 'CU001', '10-06-2020', 8, 1, 7),
(142, 10, 'GR002', '10-06-2020', 267, 24, 243),
(143, 2, 'CA001', '10-06-2020', 185, 16, 169),
(144, 5, 'CA001', '10-06-2020', 169, 8, 161),
(145, 13, 'CA001', '10-06-2020', 161, 16, 145),
(146, 4, 'CA001', '10-06-2020', 145, 14, 131),
(147, 3, 'MC001', '10-06-2020', 189, 50, 139),
(148, 12, 'PA002', '11-06-2020', 89100, 200, 88900),
(149, 12, 'BO001', '11-06-2020', 957, 10, 947),
(150, 12, 'FA001', '11-06-2020', 75, 15, 60),
(151, 17, 'PA002', '11-06-2020', 88900, 200, 88700),
(152, 17, 'BO001', '11-06-2020', 947, 28, 919),
(153, 17, 'FA001', '11-06-2020', 60, 30, 30),
(154, 16, 'CA001', '11-06-2020', 131, 10, 121),
(155, 17, 'CA001', '11-06-2020', 121, 32, 89),
(156, 3, 'PA002', '12-06-2020', 88700, 500, 88200),
(157, 12, 'BO001', '12-06-2020', 919, 10, 909),
(158, 12, 'PA002', '12-06-2020', 88200, 200, 88000),
(159, 17, 'BO001', '12-06-2020', 909, 40, 869),
(160, 17, 'PA002', '12-06-2020', 88000, 200, 87800),
(161, 3, 'MC001', '12-06-2020', 139, 29, 110),
(162, 12, 'PA002', '15-06-2020', 87800, 200, 87600),
(163, 12, 'BO001', '15-06-2020', 869, 10, 859),
(164, 17, 'PA002', '15-06-2020', 87600, 200, 87400),
(165, 17, 'BO001', '15-06-2020', 859, 40, 819),
(166, 17, 'FA001', '15-06-2020', 30, 30, 0),
(167, 17, 'CA001', '15-06-2020', 89, 40, 49),
(168, 29, 'AR001', '16-06-2020', 58, 2, 56),
(169, 27, 'GR002', '16-06-2020', 243, 2, 241),
(170, 27, 'PA002', '16-06-2020', 87400, 200, 87200),
(171, 11, 'PA002', '16-06-2020', 87200, 200, 87000),
(172, 20, 'GR002', '16-06-2020', 241, 2, 239),
(173, 20, 'PA002', '16-06-2020', 87000, 200, 86800),
(174, 25, 'PA002', '16-06-2020', 86800, 100, 86700),
(175, 15, 'PA002', '16-06-2020', 86700, 100, 86600),
(176, 29, 'CA001', '16-06-2020', 151, 10, 141),
(177, 27, 'CA001', '16-06-2020', 141, 12, 129),
(178, 20, 'CA001', '16-06-2020', 129, 12, 117),
(179, 25, 'CA001', '16-06-2020', 117, 8, 109),
(180, 15, 'CA001', '16-06-2020', 109, 8, 101),
(181, 3, 'CA001', '16-06-2020', 101, 8, 93),
(182, 29, 'MC001', '16-06-2020', 110, 2, 108),
(183, 29, 'PA002', '16-06-2020', 86600, 200, 86400),
(184, 29, 'AR001', '16-06-2020', 58, 2, 56),
(185, 3, 'MC001', '16-06-2020', 108, 3, 105),
(187, 3, 'CU001', '18-06-2020', 7, 1, 6),
(188, 17, 'FA401', '19-06-2020', 12, 1, 11),
(189, 17, 'FA001', '19-06-2020', 134, 1, 133),
(190, 19, 'PA002', '19-06-2020', 86400, 500, 85900),
(191, 35, 'GR002', '22-06-2020', 239, 2, 237),
(192, 17, 'BO003', '24-06-2020', 50, 2, 48),
(193, 35, 'PA002', '24-06-2020', 85900, 10, 85890),
(194, 35, 'CA001', '24-06-2020', 93, 10, 83),
(195, 17, 'FA401', '24-06-2020', 11, 2, 9),
(196, 17, 'BO003', '25-06-2020', 48, 1, 47),
(197, 35, 'CA001', '25-06-2020', 83, 10, 73),
(198, 35, 'PA002', '25-06-2020', 85890, 20, 85870),
(199, 35, 'CL001', '25-06-2020', 11598, 1, 11597),
(200, 4, 'CU001', '30-06-2020', 6, 1, 5),
(201, 32, 'GR002', '30-06-2020', 237, 2, 235),
(202, 3, 'CN002', '01-07-2020', 8, 1, 7),
(203, 3, 'PL001', '01-07-2020', 222, 3, 219),
(204, 29, 'FA401', '02-07-2020', 9, 1, 8),
(205, 29, 'CA001', '02-07-2020', 73, 5, 68),
(206, 27, 'PA002', '02-07-2020', 85870, 200, 85670),
(207, 27, 'CA001', '02-07-2020', 68, 8, 60),
(208, 11, 'PA002', '02-07-2020', 85670, 200, 85470),
(209, 11, 'CA001', '02-07-2020', 60, 16, 44),
(210, 20, 'BO001', '02-07-2020', 819, 5, 814),
(211, 25, 'PA002', '02-07-2020', 85470, 100, 85370),
(212, 25, 'BO001', '02-07-2020', 814, 5, 809),
(213, 25, 'FA001', '02-07-2020', 133, 4, 129),
(214, 25, 'PL001', '02-07-2020', 219, 2, 217),
(215, 15, 'PA002', '02-07-2020', 85370, 200, 85170),
(216, 15, 'PA002', '02-07-2020', 85170, 200, 84970),
(217, 2, 'PL001', '02-07-2020', 217, 5, 212),
(218, 2, 'BO001', '02-07-2020', 809, 10, 799),
(219, 5, 'PL001', '02-07-2020', 212, 2, 210),
(220, 5, 'GR002', '02-07-2020', 235, 3, 232),
(221, 31, 'PL001', '02-07-2020', 210, 2, 208),
(222, 20, 'CA001', '02-07-2020', 44, 12, 32),
(223, 10, 'BO003', '02-07-2020', 47, 1, 46),
(224, 19, 'FA401', '02-07-2020', 8, 1, 7),
(225, 35, 'PA002', '03-07-2020', 84970, 100, 84870),
(226, 35, 'CL001', '03-07-2020', 11597, 12, 11585),
(228, 35, 'BO001', '03-07-2020', 799, 1, 798),
(229, 35, 'TA001', '06-07-2020', 6, 1, 5),
(230, 19, 'SO003', '07-07-2020', 613, 1, 612),
(231, 35, 'RE002', '07-07-2020', 10, 1, 9),
(232, 19, 'LA001', '07-07-2020', 38, 1, 37),
(233, 35, 'CA001', '07-07-2020', 32, 10, 22),
(234, 35, 'CA001', '08-07-2020', 22, 8, 14),
(235, 32, 'PA002', '08-07-2020', 84870, 500, 84370),
(237, 3, 'AR001', '09-07-2020', 56, 2, 54),
(238, 3, 'PL001', '09-07-2020', 208, 1, 207),
(239, 3, 'BO001', '09-07-2020', 798, 1, 797),
(240, 12, 'PA002', '09-07-2020', 84370, 200, 84170),
(241, 12, 'PL001', '09-07-2020', 207, 1, 206),
(242, 12, 'GR002', '09-07-2020', 230, 3, 227),
(243, 16, 'PA002', '09-07-2020', 84170, 200, 83970),
(244, 16, 'FA401', '09-07-2020', 7, 2, 5),
(245, 17, 'PA002', '09-07-2020', 83970, 200, 83770),
(246, 17, 'GR002', '09-07-2020', 227, 5, 222),
(247, 17, 'FA401', '09-07-2020', 5, 4, 1),
(248, 35, 'GR002', '10-07-2020', 232, 2, 230),
(249, 35, 'FA001', '10-07-2020', 129, 17, 112),
(250, 35, 'CA001', '10-07-2020', 14, 14, 0),
(252, 29, 'PA002', '10-07-2020', 83770, 200, 83570),
(253, 29, 'CA001', '10-07-2020', 233, 10, 223),
(254, 29, 'BO001', '10-07-2020', 797, 5, 792),
(255, 27, 'PA002', '10-07-2020', 83570, 100, 83470),
(256, 27, 'CA001', '10-07-2020', 223, 12, 211),
(257, 27, 'BO001', '10-07-2020', 792, 10, 782),
(258, 11, 'CA001', '10-07-2020', 211, 15, 196),
(259, 20, 'PA002', '10-07-2020', 83470, 200, 83270),
(260, 20, 'CA001', '10-07-2020', 196, 5, 191),
(261, 20, 'BO001', '10-07-2020', 782, 5, 777),
(262, 25, 'PA002', '10-07-2020', 83270, 100, 83170),
(263, 25, 'BO001', '10-07-2020', 777, 4, 773),
(264, 25, 'CA001', '10-07-2020', 191, 8, 183),
(265, 25, 'PL001', '10-07-2020', 206, 2, 204),
(266, 15, 'PA002', '10-07-2020', 83170, 100, 83070),
(267, 15, 'CA001', '10-07-2020', 183, 10, 173),
(268, 2, 'CA001', '10-07-2020', 173, 12, 161),
(269, 2, 'BO001', '10-07-2020', 773, 6, 767),
(270, 5, 'CA001', '10-07-2020', 161, 12, 149),
(271, 5, 'BO001', '10-07-2020', 767, 6, 761),
(272, 5, 'FA001', '10-07-2020', 112, 6, 106),
(273, 31, 'PL001', '10-07-2020', 204, 1, 203),
(274, 31, 'PL001', '10-07-2020', 203, 1, 202),
(275, 31, 'CA001', '10-07-2020', 149, 15, 134),
(276, 31, 'BO001', '10-07-2020', 761, 5, 756),
(277, 14, 'PA002', '13-07-2020', 83070, 200, 82870),
(278, 14, 'CA001', '13-07-2020', 134, 20, 114),
(279, 35, 'CA001', '14-07-2020', 114, 15, 99),
(280, 3, 'PA002', '15-07-2020', 82870, 500, 82370),
(281, 19, 'PA002', '17-07-2020', 82870, 500, 82370),
(282, 27, 'PA002', '17-07-2020', 82370, 200, 82170),
(283, 27, 'FA001', '17-07-2020', 606, 12, 594),
(284, 27, 'CA001', '17-07-2020', 99, 10, 89),
(285, 27, 'BO001', '17-07-2020', 756, 10, 746),
(286, 27, 'CN001', '17-07-2020', 36, 1, 35),
(287, 27, 'PL001', '17-07-2020', 205, 2, 203),
(288, 11, 'PA002', '17-07-2020', 82170, 200, 81970),
(289, 11, 'FA001', '17-07-2020', 594, 16, 578),
(290, 11, 'PL001', '17-07-2020', 203, 4, 199),
(291, 11, 'TI001', '17-07-2020', 7, 1, 6),
(292, 11, 'TA001', '17-07-2020', 9, 1, 8),
(293, 29, 'PA002', '17-07-2020', 81970, 100, 81870),
(294, 29, 'CA001', '17-07-2020', 89, 12, 77),
(295, 29, 'BO001', '17-07-2020', 746, 6, 740),
(296, 29, 'FA001', '17-07-2020', 578, 6, 572),
(297, 29, 'CN001', '17-07-2020', 35, 1, 34),
(298, 29, 'PL001', '17-07-2020', 199, 1, 198),
(299, 25, 'PA002', '17-07-2020', 81870, 100, 81770),
(300, 25, 'CA001', '17-07-2020', 77, 6, 71),
(301, 25, 'BO001', '17-07-2020', 740, 3, 737),
(302, 25, 'FA001', '17-07-2020', 572, 6, 566),
(303, 25, 'LA001', '17-07-2020', 37, 1, 36),
(304, 25, 'PL001', '17-07-2020', 198, 3, 195),
(305, 11, 'PD001', '17-07-20', 51, 1, 50),
(306, 11, 'PG001', '17-07-20', 33, 1, 32),
(307, 19, 'BO001', '20-07-2020', 737, 2, 735),
(308, 12, 'PA002', '20-07-2020', 81770, 100, 81670),
(309, 12, 'PL001', '20-07-2020', 195, 1, 194),
(310, 12, 'CN001', '20-07-2020', 34, 1, 33),
(311, 17, 'PA002', '20-07-2020', 81670, 200, 81470),
(312, 17, 'GR002', '20-07-2020', 222, 5, 217),
(313, 20, 'CN001', '21-07-2020', 33, 1, 32),
(314, 20, 'FA001', '21-07-2020', 566, 10, 556),
(315, 20, 'PA002', '21-07-2020', 81470, 200, 81270),
(316, 15, 'PA002', '21-07-2020', 81270, 200, 81070),
(317, 15, 'FA001', '21-07-2020', 556, 5, 551),
(318, 14, 'PA002', '21-07-2020', 81070, 200, 80870),
(319, 14, 'CN001', '21-07-2020', 32, 1, 31),
(320, 3, 'MC001', '21-07-2020', 105, 1, 104),
(321, 12, 'BO001', '24-07-2020', 735, 10, 725),
(322, 16, 'PA002', '24-07-2020', 80870, 100, 80770),
(323, 12, 'CU001', '24-07-2020', 5, 1, 4),
(324, 2, 'CA001', '24-07-2020', 71, 10, 61),
(325, 2, 'BO001', '24-07-2020', 725, 10, 715),
(326, 2, 'CN001', '24-07-2020', 31, 1, 30),
(327, 5, 'CN001', '24-07-2020', 30, 1, 29),
(328, 31, 'CN001', '24-07-2020', 29, 1, 28),
(329, 31, 'CA001', '24-07-2020', 61, 10, 51),
(330, 31, 'BO001', '24-07-2020', 715, 5, 710),
(331, 31, 'AR001', '24-07-2020', 54, 1, 53),
(332, 31, 'PD001', '24-07-2020', 50, 1, 49),
(333, 2, 'LA001', '24-07-2020', 36, 1, 35),
(334, 2, 'CN001', '24-07-2020', 28, 1, 27),
(335, 10, 'CN001', '24-07-2020', 27, 1, 26),
(336, 36, 'BO001', '25-07-2020', 710, 400, 310);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usu` int(11) NOT NULL,
  `nombre_usu` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido_usu` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correo_usu` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `celular_usu` int(11) NOT NULL,
  `contrasena_usu` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_plan_usu` int(11) NOT NULL DEFAULT 1,
  `canal_usu` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usu`, `nombre_usu`, `apellido_usu`, `correo_usu`, `celular_usu`, `contrasena_usu`, `tipo_plan_usu`, `canal_usu`) VALUES
(1, 'frank', 'meza', 'frank.139@hotmail.com', 999999, '123', 1, 'inzidetech');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `utiles2`
--

CREATE TABLE `utiles2` (
  `id_tabla` int(11) NOT NULL,
  `id_Producto` varchar(250) NOT NULL,
  `id_emp` int(10) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `Tipo_Producto` varchar(250) NOT NULL,
  `Variante_Producto` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `utiles2`
--

INSERT INTO `utiles2` (`id_tabla`, `id_Producto`, `id_emp`, `descripcion`, `Tipo_Producto`, `Variante_Producto`) VALUES
(1, 'CL005', 1, 'Clips', 'Binder 1 1/4 pulg', '-'),
(2, 'CL007', 1, 'Clips', 'Binder 2 pulg', '-'),
(3, 'CL006', 1, 'Clips', 'Binder 1 5/8 pulg', '-'),
(34244, 'MC001', 2, 'Utiles de escritorio', 'Mica A4', '-'),
(34245, 'FA001', 2, 'Faster', 'Faster', '-'),
(34246, 'CL001', 2, 'Clips', 'Clips', '-'),
(34247, 'CL001', 2, 'Clips', 'Clips', '-'),
(34248, 'CL001', 2, 'Clips', 'Clips', '-'),
(34249, 'CL001', 4, 'Clips', 'Clips', '-'),
(34250, 'CL001', 4, 'Clips', 'Clips', '-'),
(34251, 'CL001', 11, 'Clips', 'Clips', '-'),
(34252, 'CL001', 8, 'Clips', 'Clips', '-'),
(34253, 'CL001', 12, 'Clips', 'Clips', '-'),
(34254, 'CL001', 12, 'Clips', 'Clips', '-'),
(34255, 'CL001', 12, 'Clips', 'Clips', '-'),
(34256, 'CL001', 2, 'Clips', 'Clips', '-'),
(34257, 'CL001', 1, 'Clips', 'Clips', '-'),
(34258, 'CL001', 1, 'Clips', 'Clips', '-'),
(34259, 'AR001', 3, 'Utiles de escritorio', 'Archivador', 'Archivador cartón oficio'),
(34260, 'AR002', 3, 'Utiles de escritorio', 'Archivador', 'Archivador cartón 1/2 oficio'),
(34261, 'AR001', 3, 'Utiles de escritorio', 'Archivador', 'Archivador cartón oficio'),
(34262, 'AR002', 12, 'Utiles de escritorio', 'Archivador', 'Archivador cartón 1/2 oficio'),
(34263, 'AR002', 12, 'Utiles de escritorio', 'Archivador', 'Archivador cartón 1/2 oficio'),
(34264, 'AR002', 14, 'Utiles de escritorio', 'Archivador', 'Archivador cartón 1/2 oficio'),
(34265, 'AR002', 14, 'Utiles de escritorio', 'Archivador', 'Archivador cartón 1/2 oficio'),
(34266, 'CL001', 1, 'Clips', 'Clips', '-'),
(34267, 'RE002', 10, 'Utiles de escritorio', 'Regla', '-'),
(34268, 'RE002', 10, 'Utiles de escritorio', 'Regla', '-'),
(34269, 'FA001', 14, 'Faster', 'Faster', '-');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id_emp`);

--
-- Indices de la tabla `entrada`
--
ALTER TABLE `entrada`
  ADD PRIMARY KEY (`id_entrada`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_prod`);

--
-- Indices de la tabla `salidas`
--
ALTER TABLE `salidas`
  ADD PRIMARY KEY (`id_salida`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usu`);

--
-- Indices de la tabla `utiles2`
--
ALTER TABLE `utiles2`
  ADD PRIMARY KEY (`id_tabla`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id_emp` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `entrada`
--
ALTER TABLE `entrada`
  MODIFY `id_entrada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_prod` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT de la tabla `salidas`
--
ALTER TABLE `salidas`
  MODIFY `id_salida` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=340;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `utiles2`
--
ALTER TABLE `utiles2`
  MODIFY `id_tabla` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34270;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
