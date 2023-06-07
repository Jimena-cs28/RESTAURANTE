/*
SQLyog Community v13.2.0 (64 bit)
MySQL - 10.4.27-MariaDB : Database - res_chinchano
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`res_chinchano` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `res_chinchano`;

/*Table structure for table `categorias` */

DROP TABLE IF EXISTS `categorias`;

CREATE TABLE `categorias` (
  `idcategoria` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(30) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idcategoria`),
  UNIQUE KEY `uk_cate_c` (`categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `categorias` */

insert  into `categorias`(`idcategoria`,`categoria`,`estado`) values 
(1,'Plato Entrada','1'),
(2,'Plato Principal','1'),
(3,'Plato Salida','1'),
(4,'Bebidas','1');

/*Table structure for table `detalleventas` */

DROP TABLE IF EXISTS `detalleventas`;

CREATE TABLE `detalleventas` (
  `iddetalleventa` int(11) NOT NULL AUTO_INCREMENT,
  `idventa` int(11) NOT NULL,
  `idmenu` int(11) NOT NULL,
  `cantidad` smallint(6) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT '1',
  `total` decimal(5,2) NOT NULL,
  PRIMARY KEY (`iddetalleventa`),
  KEY `fk_idmenu_d` (`idmenu`),
  KEY `fk_venta_d` (`idventa`),
  CONSTRAINT `fk_idmenu_d` FOREIGN KEY (`idmenu`) REFERENCES `menus` (`idmenu`),
  CONSTRAINT `fk_venta_d` FOREIGN KEY (`idventa`) REFERENCES `ventas` (`idventa`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `detalleventas` */

insert  into `detalleventas`(`iddetalleventa`,`idventa`,`idmenu`,`cantidad`,`estado`,`total`) values 
(1,1,1,4,'1',32.00),
(2,1,11,1,'1',10.00),
(3,1,6,2,'1',30.00),
(4,2,2,1,'1',10.00),
(5,2,7,1,'1',20.00),
(6,2,12,1,'1',15.00);

/*Table structure for table `menus` */

DROP TABLE IF EXISTS `menus`;

CREATE TABLE `menus` (
  `idmenu` int(11) NOT NULL AUTO_INCREMENT,
  `idcategoria` int(11) NOT NULL,
  `menu` varchar(50) NOT NULL,
  `precio` decimal(5,2) NOT NULL,
  `cantidad` smallint(6) NOT NULL,
  PRIMARY KEY (`idmenu`),
  UNIQUE KEY `uk_menu_m` (`menu`),
  KEY `fk_idcate` (`idcategoria`),
  CONSTRAINT `fk_idcate` FOREIGN KEY (`idcategoria`) REFERENCES `categorias` (`idcategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `menus` */

insert  into `menus`(`idmenu`,`idcategoria`,`menu`,`precio`,`cantidad`) values 
(1,1,'Causa',8.00,100),
(2,1,'leche de tigre',10.00,100),
(3,1,'Ensalada de Lentejas',20.00,100),
(4,1,'Ensalada de Beterraga',20.00,100),
(5,2,'Carapulcra',15.00,100),
(6,2,'Ceviche',15.00,100),
(7,2,'Arroz con Pollo',20.00,100),
(8,2,'Chaufa de chancho',17.00,100),
(9,2,'Chaufa de pollo',26.00,100),
(10,3,'Pollo a la canasta',30.00,100),
(11,3,'Anticucho',10.00,100),
(12,3,'Caldo de gallina',15.00,100),
(13,3,'Pollo a la parrilla',25.00,100),
(14,4,'Agua cielo',2.00,100),
(15,4,'Gaseosa',3.00,100),
(16,4,'Inca Kola',4.00,100),
(17,4,'Fanta',5.00,100),
(18,4,'Kr',2.00,100),
(19,4,'Agua Mateo',3.00,100);

/*Table structure for table `personas` */

DROP TABLE IF EXISTS `personas`;

CREATE TABLE `personas` (
  `idpersona` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(40) NOT NULL,
  `apellidos` varchar(40) NOT NULL,
  `dni` char(8) NOT NULL,
  `correo` varchar(80) DEFAULT NULL,
  `fechaNac` date NOT NULL,
  `telefono` char(9) DEFAULT NULL,
  `estado` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idpersona`),
  UNIQUE KEY `uk_dni_p` (`dni`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `personas` */

insert  into `personas`(`idpersona`,`nombres`,`apellidos`,`dni`,`correo`,`fechaNac`,`telefono`,`estado`) values 
(1,'Jimena','Cabrera Suarez','73194180',NULL,'2004-05-22',NULL,'1'),
(2,'Perla','Montenegro Alba','73194181',NULL,'2004-05-23',NULL,'1'),
(3,'Carla','Peralta Salazar','73194182',NULL,'2001-11-29',NULL,'1'),
(4,'kiara','Belleza tasayco','73194183',NULL,'1994-09-22',NULL,'1'),
(5,'Felix','Napa Pachas','73194184',NULL,'2002-11-11',NULL,'1'),
(6,'Karen','Herrera Ortiz','73194185',NULL,'1995-12-30',NULL,'1'),
(7,'Janeth','Cage Florez','73194186',NULL,'2001-09-11',NULL,'1');

/*Table structure for table `turnos` */

DROP TABLE IF EXISTS `turnos`;

CREATE TABLE `turnos` (
  `idturno` int(11) NOT NULL AUTO_INCREMENT,
  `turno` char(10) NOT NULL,
  `horaInicio` time NOT NULL,
  `horaFin` time NOT NULL,
  `estado` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idturno`),
  UNIQUE KEY `uk_idturno_t` (`idturno`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `turnos` */

insert  into `turnos`(`idturno`,`turno`,`horaInicio`,`horaFin`,`estado`) values 
(1,'Tarde','11:00:00','17:30:00','1'),
(2,'Noche','17:30:00','22:00:00','1');

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `idpersona` int(11) NOT NULL,
  `idturno` int(11) NOT NULL,
  `nombreusuario` varchar(50) NOT NULL,
  `claveacceso` varchar(200) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idusuario`),
  UNIQUE KEY `uk_usuario_u` (`nombreusuario`),
  KEY `fk_idpersona_u` (`idpersona`),
  KEY `fk_turno_u` (`idturno`),
  CONSTRAINT `fk_idpersona_u` FOREIGN KEY (`idpersona`) REFERENCES `personas` (`idpersona`),
  CONSTRAINT `fk_turno_u` FOREIGN KEY (`idturno`) REFERENCES `turnos` (`idturno`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `usuarios` */

insert  into `usuarios`(`idusuario`,`idpersona`,`idturno`,`nombreusuario`,`claveacceso`,`estado`) values 
(1,1,1,'jimena28','$2y$10$yG1Mk28HxCgS1BywcuBfYuvc3STMlR3f771kclJBfyh.CcWGJl/Xa','1'),
(2,2,1,'perla23','$2y$10$yG1Mk28HxCgS1BywcuBfYuvc3STMlR3f771kclJBfyh.CcWGJl/Xa','1');

/*Table structure for table `ventas` */

DROP TABLE IF EXISTS `ventas`;

CREATE TABLE `ventas` (
  `idventa` int(11) NOT NULL AUTO_INCREMENT,
  `idusuario` int(11) NOT NULL,
  `numMesa` char(1) NOT NULL,
  `idcliente` int(11) DEFAULT NULL,
  `tipopago` varchar(30) DEFAULT NULL,
  `comprobante` varchar(20) DEFAULT NULL,
  `fechaventa` date NOT NULL DEFAULT current_timestamp(),
  `totalpagar` decimal(6,2) DEFAULT NULL,
  `estadomesa` char(1) NOT NULL DEFAULT 'O',
  PRIMARY KEY (`idventa`),
  KEY `fk_idcliente` (`idcliente`),
  KEY `fk_idusu_v` (`idusuario`),
  CONSTRAINT `fk_idcliente` FOREIGN KEY (`idcliente`) REFERENCES `personas` (`idpersona`),
  CONSTRAINT `fk_idusu_v` FOREIGN KEY (`idusuario`) REFERENCES `usuarios` (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `ventas` */

insert  into `ventas`(`idventa`,`idusuario`,`numMesa`,`idcliente`,`tipopago`,`comprobante`,`fechaventa`,`totalpagar`,`estadomesa`) values 
(1,1,'1',NULL,NULL,NULL,'2023-06-05',NULL,'O'),
(2,1,'2',6,'Efectivo','Boleta','2023-06-05',45.00,'D');

/* Procedure structure for procedure `reporte_deusuario` */

/*!50003 DROP PROCEDURE IF EXISTS  `reporte_deusuario` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `reporte_deusuario`(
	IN  _usu INT
)
BEGIN 
	SELECT idventa, usuarios.nombreusuario, tipopago,comprobante,totalpagar,
	numMesa, fechaventa
	FROM ventas
	INNER JOIN usuarios ON usuarios.idusuario = ventas.idusuario
	WHERE ventas.idusuario = _usu
	ORDER BY idventa DESC;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_editar_venta` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_editar_venta` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_editar_venta`(
	IN _idventa INT,
	IN _idcliente INT,
	IN _tipopago VARCHAR(30),
	IN _comprobante VARCHAR(30),
	IN _totalpagar DECIMAL(7,2)
)
BEGIN
	if _idcliente = '' then set _idcliente = 'Cliente generico'; end if;
	UPDATE ventas SET
	idcliente = _idcliente,
	tipopago = _tipopago,
	comprobante = _comprobante,
	totalpagar = _totalpagar,
	estadomesa = 'D'
	WHERE idventa = _idventa;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_listarGrafico` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_listarGrafico` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_listarGrafico`()
BEGIN
	SELECT categorias.categoria,
	COUNT(detalleventas.iddetalleventa) 'Total'
	FROM detalleventas
	INNER JOIN menus ON menus.idmenu = detalleventas.idmenu
	INNER JOIN categorias ON categorias.idcategoria = menus.idcategoria
	GROUP BY categorias.idcategoria;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_listar_deventa` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_listar_deventa` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_listar_deventa`(in _idventa int)
BEGIN
	SELECT detalleventas.iddetalleventa,detalleventas.cantidad,
		 menus.menu,detalleventas.total
	FROM detalleventas
	INNER JOIN ventas  ON ventas.idventa = detalleventas.idventa
	INNER JOIN menus ON menus.idmenu = detalleventas.idmenu
	where ventas.idventa = _idventa;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_listar_venta` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_listar_venta` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_listar_venta`()
begin
	SELECT idventa, 
	usuarios.nombreusuario, 
	turnos.turno,
	numMesa, tipopago, comprobante,
	fechaventa, totalpagar, estadomesa
	FROM ventas
	INNER JOIN usuarios ON usuarios.idusuario = ventas.idusuario
	inner join turnos on turnos.idturno = usuarios.idturno
	order by idventa desc;
end */$$
DELIMITER ;

/* Procedure structure for procedure `spu_login` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_login` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_login`( 
	in _usuario varchar(30)
)
begin
	SELECT usuarios.idusuario, usuarios.nombreusuario, claveacceso,
		personas.nombres, personas.apellidos	
	FROM usuarios
	INNER JOIN personas ON personas.idpersona = usuarios.idpersona
	where nombreusuario = _usuario;
end */$$
DELIMITER ;

/* Procedure structure for procedure `spu_obtener_venta` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_obtener_venta` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_obtener_venta`(
	IN _idventa INT
)
BEGIN 
	SELECT * FROM ventas WHERE idventa = _idventa;
END */$$
DELIMITER ;

/* Procedure structure for procedure `spu_registrar_detalleventa` */

/*!50003 DROP PROCEDURE IF EXISTS  `spu_registrar_detalleventa` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `spu_registrar_detalleventa`(
	IN _idventa 	INT,
	IN _cantidad 	SMALLINT,
	IN _idmenu	int,
	IN _total	decimal(5,2)	
)
BEGIN
	INSERT INTO detalleventas(idventa,cantidad,idmenu,total) VALUES
				(_idventa, _cantidad,_idmenu,_total);
END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
