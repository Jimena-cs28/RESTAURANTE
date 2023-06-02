CREATE DATABASE restaurante
USE restaurante;

CREATE TABLE clientes
(
	idclientes 	INT AUTO_INCREMENT PRIMARY KEY,
	nombres		VARCHAR(40)	NOT NULL,
	apellidos	VARCHAR(50)	NOT NULL,
	fechanac	DATE 		NULL,
	direccion	VARCHAR(50)	NULL,
	telefono	CHAR(9)		NOT NULL,
	dni		CHAR(8)		NULL,
	CONSTRAINT ck_telefono CHECK(telefono REGEXP '[9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]'),
	CONSTRAINT ck_dni CHECK(dni REGEXP '[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]')
);

CREATE TABLE administrador
(
	idadmi		INT AUTO_INCREMENT PRIMARY KEY,
	nombres		VARCHAR(30)	NOT NULL,
	apellidos	VARCHAR(30)	NOT NULL,
	nombreusu	VARCHAR(30)	NOT NULL,
	claveacceso	VARCHAR(100)	NOT NULL
);

CREATE TABLE tipopagos
(
	idtipopago	INT AUTO_INCREMENT PRIMARY KEY,
	Tipopago		VARCHAR(30)
);

CREATE TABLE turnos
(
	idturno 	INT AUTO_INCREMENT PRIMARY KEY,
	turno 		VARCHAR(19)		NOT NULL,
	horallegada	TIME 		NOT NULL,
	horasalida  	TIME  		NOT NULL
);

CREATE TABLE tipoPlatos
(
	idTplato	INT AUTO_INCREMENT PRIMARY KEY,
	tipo		VARCHAR(50)	NOT NULL,
	estado	CHAR(1)	NOT NULL DEFAULT '1'
);

CREATE TABLE mesas
(
	idmesa	INT AUTO_INCREMENT PRIMARY KEY,
	Mesa		SMALLINT	NOT NULL,
	estado		VARCHAR(20)	NOT NULL DEFAULT 'Disponible'
);

SELECT * FROM mesas

CREATE TABLE ventas
(
	idventa		INT AUTO_INCREMENT PRIMARY KEY,
	idturno		INT 			NOT NULL,
	idadmi		INT 			NOT NULL,
	idmesa		INT 			NOT NULL,
	idTplato	INT 				NOT NULL,
	plato		VARCHAR(50) 		NOT NULL,
	PrecioUni	DECIMAL(5,2)		NOT NULL,
	CONSTRAINT fk_idturno FOREIGN KEY (idturno) REFERENCES turnos (idturno),
	CONSTRAINT fk_idcomida FOREIGN KEY (idTplato) REFERENCES tipoPlatos(idTplato),
	CONSTRAINT fk_idmesa FOREIGN KEY (idmesa) REFERENCES mesas (idmesa),
	CONSTRAINT fk_idadmi FOREIGN KEY (idadmi) REFERENCES administrador (idadmi)
);

CREATE TABLE detalleVenta
(
	iddeventa 	INT AUTO_INCREMENT PRIMARY KEY,
	idventa		INT 			NOT NULL,
	idclientes	INT 			NOT NULL,
	cantidad 	SMALLINT 		NOT NULL,
	precioTotal 	DECIMAL(6,2)		NOT NULL,
	idtipopago 	INT			NOT NULL,
	idcomprobante	INT			NOT NULL,
	CONSTRAINT fk_idtipopago FOREIGN KEY (idtipopago) REFERENCES tipopagos (idtipopago),
	CONSTRAINT fk_idventa FOREIGN KEY (idventa) REFERENCES ventas(idventa),
	CONSTRAINT fk_idcliente FOREIGN KEY (idclientes) REFERENCES clientes (idclientes),
	CONSTRAINT fk_idcompro FOREIGN KEY (idcomprobante) REFERENCES comprobante(idcomprobante)
);

CREATE TABLE comprobante
(
	idcomprobante INT AUTO_INCREMENT PRIMARY KEY,
	comprobante		VARCHAR(20)	NOT NULL
);



