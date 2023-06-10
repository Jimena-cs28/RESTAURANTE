DROP DATABASE IF EXISTS res_chinchano;
CREATE DATABASE res_chinchano;
USE res_chinchano;

CREATE TABLE PERSONAS
(
	idpersona	INT AUTO_INCREMENT PRIMARY KEY,
	nombres		VARCHAR(40)	NOT NULL,
	apellidos	VARCHAR(40)	NOT NULL,
	dni 		CHAR(8)		NOT NULL,
	correo		VARCHAR(80)	NULL,
	fechaNac	DATE 		NOT NULL,
	telefono	CHAR(9)		NULL,
	estado		CHAR(1)		NOT NULL DEFAULT '1',
	CONSTRAINT uk_dni_p UNIQUE (dni)
)ENGINE=INNODB;

INSERT INTO personas (nombres,apellidos,dni,fechaNac)VALUES
	('Jimena','Cabrera Suarez', '73194180','2004/05/22'),
	('Perla','Montenegro Alba', '73194181','2004/05/23'),
	('Carla','Peralta Salazar', '73194182','2001/11/29'),
	('kiara','Belleza tasayco', '73194183','1994/09/22'),
	('Felix','Napa Pachas', '73194184','2002/11/11'),
	('Karen','Herrera Ortiz', '73194185','1995/12/30'),
	('Janeth','Cage Florez', '73194186','2001/09/11');

SELECT * FROM personas;

CREATE TABLE TURNOS
(
	idturno		INT AUTO_INCREMENT PRIMARY KEY,
	turno		CHAR(10) 	NOT NULL,
	horaInicio	TIME 		NOT NULL,
	horaFin		TIME		NOT NULL,
	estado		CHAR(1)		NOT NULL DEFAULT '1',
	CONSTRAINT uk_idturno_t UNIQUE (idturno)
)ENGINE=INNODB;

INSERT INTO turnos (turno, horaInicio, horaFin) VALUES 
('Tarde','11:00:00','17:30:00'),
('Noche','17:30:00','22:00:00');


CREATE TABLE USUARIOS
(
	idusuario	INT AUTO_INCREMENT PRIMARY KEY,
	idpersona	INT 		NOT NULL,
	idturno		INT 		NOT NULL,
	nombreusuario	VARCHAR(50)	NOT NULL,
	claveacceso 	VARCHAR(200)	NOT NULL, -- encriptado
	estado		CHAR(1)		NOT NULL DEFAULT '1',
	CONSTRAINT fk_idpersona_u FOREIGN KEY (idpersona) REFERENCES PERSONAS(idpersona),
	CONSTRAINT fk_turno_u FOREIGN KEY (idturno) REFERENCES TURNOS(idturno),
	CONSTRAINT uk_usuario_u UNIQUE(nombreusuario)
)ENGINE=INNODB;

INSERT INTO usuarios (idpersona, idturno,nombreusuario, claveacceso) VALUES 
(1,1,'jimena28','123456'),
(2,1,'perla23','123456');

DELIMITER $$
CREATE PROCEDURE spu_login
( 
	IN _usuario VARCHAR(30)
)
BEGIN
	SELECT usuarios.idusuario, usuarios.nombreusuario, claveacceso,
		personas.nombres, personas.apellidos	
	FROM usuarios
	INNER JOIN personas ON personas.idpersona = usuarios.idpersona
	WHERE nombreusuario = _usuario;
END $$

CALL spu_login('perla23')

-- 1234
UPDATE usuarios SET claveacceso = '$2y$10$yG1Mk28HxCgS1BywcuBfYuvc3STMlR3f771kclJBfyh.CcWGJl/Xa'
WHERE idusuario =  2;


CREATE TABLE CATEGORIAS
(
	idcategoria 	INT	AUTO_INCREMENT PRIMARY KEY,
	categoria   	VARCHAR(30)	NOT NULL,
	estado		CHAR(1)		NOT NULL DEFAULT '1',
	CONSTRAINT uk_cate_c UNIQUE(categoria)
)ENGINE=INNODB;

INSERT INTO CATEGORIAS (categoria) VALUES
		('Plato Entrada'),
		('Plato Principal'),
		('Plato Salida'),
		('Bebidas');
	
		
CREATE TABLE MENUS
(
	idmenu		INT AUTO_INCREMENT PRIMARY KEY,
	idcategoria	INT		NOT NULL,
	menu		VARCHAR(50)	NOT NULL,
	precio		DECIMAL(5,2)	NOT NULL,
	cantidad	SMALLINT 	NOT NULL,
	CONSTRAINT fk_idcate FOREIGN KEY (idcategoria) REFERENCES CATEGORIAS (idcategoria),
	CONSTRAINT uk_menu_m UNIQUE(menu)
)ENGINE=INNODB;
SELECT * FROM menus

INSERT INTO MENUS (idcategoria,menu,precio,cantidad) VALUES
(1,'Causa','8','100'), -- 1 
(1,'leche de tigre','10','100'),-- 2
(1,'Ensalada de Lentejas','20','100'),
(1,'Ensalada de Beterraga','20','100'),
(2,'Carapulcra','15','100'),
(2,'Ceviche','15','100'), -- 6
(2,'Arroz con Pollo','20','100'), -- 7
(2,'Chaufa de chancho','17','100'),
(2,'Chaufa de pollo','26','100'),
(3,'Pollo a la canasta','30','100'),
(3,'Anticucho','10','100'), -- 11
(3,'Caldo de gallina','15','100'), -- 12
(3,'Pollo a la parrilla','25','100'),
(4,'Agua cielo','2','100'),
(4,'Gaseosa','3','100'),
(4,'Inca Kola','4','100'),
(4,'Fanta','5','100'),
(4,'Kr','2','100'),
(4,'Agua Mateo','3','100');



CREATE TABLE VENTAS
(
	idventa		INT AUTO_INCREMENT PRIMARY KEY,
	idusuario	INT		NOT NULL,
	numMesa 	CHAR(1)		NOT NULL,
	idcliente	INT	 	NULL,
	tipopago	VARCHAR(30) 	NULL,
	comprobante 	VARCHAR(20)	NULL,
	fechaventa	DATE 		NOT NULL DEFAULT NOW(),
	totalpagar 	DECIMAL(6,2)	NULL,
	estadomesa	CHAR(1)		NOT NULL DEFAULT 'O',
	CONSTRAINT fk_idcliente FOREIGN KEY (idcliente) REFERENCES PERSONAS(idpersona),
	CONSTRAINT fk_idusu_v FOREIGN KEY (idusuario) REFERENCES usuarios(idusuario)

)ENGINE=INNODB;


INSERT INTO ventas (idusuario,numMesa)VALUES
(1,'1'),
(1,'2');

SELECT * FROM detalleventas

CREATE TABLE DETALLEVENTAS
(
	iddetalleventa	INT AUTO_INCREMENT PRIMARY KEY,
	idventa		INT		NOT NULL,
	idmenu		INT		NOT NULL,
	cantidad	SMALLINT	NOT NULL,
	estado		CHAR(1)		NOT NULL DEFAULT '1',
	total 		DECIMAL(5,2)	NOT NULL,
	CONSTRAINT fk_idmenu_d FOREIGN KEY (idmenu) REFERENCES MENUS(idmenu),
	CONSTRAINT fk_venta_d FOREIGN KEY(idventa) REFERENCES VENTAS(idventa)
)ENGINE=INNODB;

INSERT INTO detalleventas(idventa,idmenu,cantidad,total)VALUES
			(1,1,4,'32'),
			(1,11,1,'10'),
			(1,6,2,'30'),			
			(2,2,1,'10'),
			(2,7,1,'20'),
			(2,12,1,'15');

-- PROCEDIMIENTOS
-- VENTAS
-- listar venta
DELIMITER $$
CREATE PROCEDURE spu_listar_venta()
BEGIN
	SELECT idventa, 
	usuarios.nombreusuario, 
	turnos.turno,
	numMesa, tipopago, comprobante,
	fechaventa, totalpagar, estadomesa
	FROM ventas
	INNER JOIN usuarios ON usuarios.idusuario = ventas.idusuario
	INNER JOIN turnos ON turnos.idturno = usuarios.idturno
	ORDER BY idventa DESC;
END $$

DELIMITER $$
CREATE PROCEDURE spu_editar_venta
(
	IN _idventa INT,
	IN _idcliente INT,
	IN _tipopago VARCHAR(30),
	IN _comprobante VARCHAR(30),
	IN _totalpagar DECIMAL(7,2)
)
BEGIN
	IF _idcliente = '' THEN SET _idcliente = 'Cliente generico'; END IF;
	UPDATE ventas SET
	idcliente = _idcliente,
	tipopago = _tipopago,
	comprobante = _comprobante,
	totalpagar = _totalpagar,
	estadomesa = 'D'
	WHERE idventa = _idventa;
END $$

DELIMITER $$
CREATE PROCEDURE spu_obtener_venta
(
	IN _idventa INT
)
BEGIN 
	SELECT * FROM ventas WHERE idventa = _idventa;
END$$

CALL spu_obtener_venta(2);

SELECT * FROM ventas

DELIMITER $$
CREATE PROCEDURE spu_listar_menu
(
	IN _idcate INT
)
BEGIN
	SELECT menus.idmenu,categorias.categoria, menus.menu, menus.precio
	FROM menus
	INNER JOIN categorias ON categorias.idcategoria = menus.idcategoria
	WHERE menus.idcategoria = 1;
	
END$$

DELIMITER $$
CREATE PROCEDURE spu_listar_me
(
	IN _idmenu INT
)
BEGIN
	SELECT menus.idmenu,categorias.categoria, menus.menu, menus.precio
	FROM menus
	INNER JOIN categorias ON categorias.idcategoria = menus.idcategoria
	WHERE menus.idmenu = _idmenu;

END$$

CALL spu_listar_me(4);
-- listar Detalle 
DELIMITER $$
CREATE PROCEDURE spu_listar_deventa(IN _idventa INT)
BEGIN
	SELECT detalleventas.iddetalleventa,detalleventas.cantidad,
		 menus.menu,detalleventas.total
	FROM detalleventas
	INNER JOIN ventas  ON ventas.idventa = detalleventas.idventa
	INNER JOIN menus ON menus.idmenu = detalleventas.idmenu
	WHERE ventas.idventa = _idventa;
END $$

SELECT * FROM detalleventas

CALL spu_listar_deventa(1);


SELECT * FROM detalleventas

-- registrar detalle venta
DELIMITER $$
CREATE PROCEDURE spu_registrar_detalleventa
(
	IN _idventa 	INT,
	IN _cantidad 	SMALLINT,
	IN _idmenu	INT,
	IN _total	DECIMAL(5,2)	
)
BEGIN
	INSERT INTO detalleventas(idventa,cantidad,idmenu,total) VALUES
				(_idventa, _cantidad,_idmenu,_total);
END$$ 


-- registrar venta
DELIMITER $$
CREATE PROCEDURE spu_registrar_venta
(
	IN _idusu 	INT,
	IN _mesa 	SMALLINT
)
BEGIN	
	INSERT INTO ventas(idusuario,numMesa) VALUES
			(_idusu, _mesa);
END$$

CALL spu_registrar_venta(1,3);

SELECT * FROM ventas
SELECT * FROM detalleventas
SELECT * FROM personas
-- reporte
SELECT * FROM ventas

DELIMITER $$
CREATE PROCEDURE reporte_deusuario
(
	IN  _usu INT
)
BEGIN 
	SELECT idventa, usuarios.nombreusuario, tipopago,comprobante,totalpagar,
	numMesa, fechaventa
	FROM ventas
	INNER JOIN usuarios ON usuarios.idusuario = ventas.idusuario
	WHERE ventas.idusuario = _usu
	ORDER BY idventa DESC;
END $$

CALL reporte_deusuario(1);

-- reporte 2


-- grafico
DELIMITER $$
CREATE PROCEDURE spu_listarGrafico()
BEGIN
	SELECT categorias.categoria,
	COUNT(detalleventas.iddetalleventa) 'Total'
	FROM detalleventas
	INNER JOIN menus ON menus.idmenu = detalleventas.idmenu
	INNER JOIN categorias ON categorias.idcategoria = menus.idcategoria
	GROUP BY categorias.idcategoria;
END$$

SELECT * FROM categorias
CALL spu_listarGrafico()


DELIMITER $$
CREATE PROCEDURE spu_listarGrafico2()
BEGIN
	SELECT usuarios.nombreusuario,
	COUNT(ventas.idventa) 'Total'
	FROM ventas
	INNER JOIN usuarios ON usuarios.idusuario = ventas.idusuario
	GROUP BY usuarios.idusuario;
END$$

CALL spu_listarGrafico2()
