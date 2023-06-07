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

CREATE TABLE platos
(
	idplato		INT AUTO_INCREMENT PRIMARY KEY,
	idTplato	INT		NOT NULL,
	platos 		VARCHAR(40)	NOT NULL,
);

CREATE TABLE turnos
(
	idturno 	INT AUTO_INCREMENT PRIMARY KEY,
	turno 		VARCHAR(19)	NOT NULL,
	horainicio	TIME 		NOT NULL,
	horasalida  	TIME  		NOT NULL
);

CREATE TABLE tipoPlatos
(
	idTplato	INT AUTO_INCREMENT PRIMARY KEY,
	idplato		INT		NOT NULL,
	tipo		VARCHAR(50)	NOT NULL,
	estado		CHAR(1)	NOT NULL DEFAULT '1'
	CONSTRAINT fk_idplato FOREIGN KEY (idplato) REFERENCES platos (idplato)
);


CREATE TABLE ventas
(
	idventa		INT AUTO_INCREMENT PRIMARY KEY,
	idturno		INT 		NOT NULL,
	idadmi		INT 		NOT NULL,
	idTplato	INT 		NOT NULL,
	idcliente	INT		NOT NULL,
	idTplato	INT		NOT NULL,
	precioUni	DECIMAL(5,2)	
	numMesa		SMALLINT	NOT NULL,
	CONSTRAINT fk_idturno FOREIGN KEY (idturno) REFERENCES turnos (idturno),
	CONSTRAINT fk_idcomida FOREIGN KEY (idTplato) REFERENCES tipoPlatos(idTplato),
	CONSTRAINT fk_idadmi FOREIGN KEY (idadmi) REFERENCES administrador (idadmi)
);

CREATE TABLE detalleVenta
(
	iddeventa 	INT AUTO_INCREMENT PRIMARY KEY,
	idventa		INT 			NOT NULL,
	cantidad 	SMALLINT 		NOT NULL,
	precioTotal 	DECIMAL(6,2)		NOT NULL,
	comprobante	VARCHAR(10)		NOT NULL,
	CONSTRAINT fk_idventa FOREIGN KEY (idventa) REFERENCES ventas(idventa),
);




