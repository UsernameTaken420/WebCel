-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.5.16-log - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para webcel
CREATE DATABASE IF NOT EXISTS `webcel` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `webcel`;

-- Volcando estructura para tabla webcel.categorias
CREATE TABLE IF NOT EXISTS `categorias` (
  `idCAT` int(5) NOT NULL AUTO_INCREMENT,
  `nomCAT` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idCAT`),
  UNIQUE KEY `nomCAT` (`nomCAT`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla webcel.categorias: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` (`idCAT`, `nomCAT`) VALUES
	(12, 'Auriculares'),
	(1, 'Cargadores'),
	(3, 'Fundas'),
	(9, 'Parlantes'),
	(13, 'Pop Socket'),
	(2, 'Protectores de pantalla');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;

-- Volcando estructura para tabla webcel.productos
CREATE TABLE IF NOT EXISTS `productos` (
  `idPRO` int(5) NOT NULL AUTO_INCREMENT,
  `precioPRO` int(5) NOT NULL,
  `marcaPRO` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `modeloPRO` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `descripcionPRO` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `paisPRO` enum('USA','Alemania','China') COLLATE utf8_spanish_ci NOT NULL,
  `catPRO` int(5) NOT NULL,
  PRIMARY KEY (`idPRO`),
  KEY `FK__categorias` (`catPRO`),
  CONSTRAINT `FK__categorias` FOREIGN KEY (`catPRO`) REFERENCES `categorias` (`idCAT`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla webcel.productos: ~17 rows (aproximadamente)
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` (`idPRO`, `precioPRO`, `marcaPRO`, `modeloPRO`, `descripcionPRO`, `paisPRO`, `catPRO`) VALUES
	(3, 9005, 'Apple', 'iCharger', 'Cargador', 'USA', 1),
	(5, 1000, 'Shezhen Inc.', 'XLR8', 'Funda', 'China', 3),
	(6, 13000, 'Beats', 'BassBoost 8', 'Parlantes', 'USA', 9),
	(7, 40000, 'Deustch Automatic', 'Die Pantprotektor', 'Protector', 'Alemania', 2),
	(8, 3220, 'Deustch Automatic', 'Die Poppensockett', 'Pop Socket', 'Alemania', 13),
	(9, 7500, 'Deustch Automatic', 'Der Aurikularen', 'Auriculares', 'Alemania', 12),
	(11, 9500, 'Beats', 'FeelSound 2', 'Auriculares', 'USA', 12),
	(12, 4500, 'Apple', 'iFund', 'Funda', 'USA', 3),
	(13, 75000, 'Apple', 'iProtect', 'Protector', 'USA', 2),
	(14, 6640, 'Apple', 'iPop', 'Pop Socket', 'USA', 13),
	(15, 11000, 'Deustch Automatic', 'Der Audiosurrounden', 'Parlantes', 'Alemania', 9),
	(16, 4500, 'Deustch Automatic', 'Der Phonenchargen', 'Cargador', 'Alemania', 1),
	(17, 2500, 'Deustch Automatic', 'Der Funden', 'Funda', 'Alemania', 3),
	(18, 6666, 'Shenzhen Inc.', 'Aud10 DX', 'Auriculares', 'China', 12),
	(19, 8500, 'Zaibatsu Heavy Ind.', 'Machine Sound XJ3', 'Parlantes', 'China', 9),
	(20, 2000, 'Shenzhen Inc.', 'P0p #42124', 'Pop Socket', 'China', 13),
	(21, 30000, 'Zaibatsu Heavy Ind.', 'Screen Protecc 1337', 'Protector', 'China', 2);
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
