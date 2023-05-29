CREATE DATABASE restaurante;
USE restaurante;

CREATE TABLE personas
(
	idpersona 	INT AUTO_INCREMENT PRIMARY KEY,
	nombres		VARCHAR(40)	NOT NULL,
	apellidos	VARCHAR(50)	NOT NULL,
	fechanac	DATE 		NOT NULL,
	direccion	VARCHAR(50)	NULL,
	telefono	CHAR(9)		NOT NULL,
	dni		CHAR(8)		NULL,
	CONSTRAINT ck_telefono CHECK(telefono REGEXP '[9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]'),
	CONSTRAINT ck_dni CHECK(dni REGEXP '[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]')
);

CREATE TABLE administrador
(
	idadmi		INT AUTO_INCREMENT PRIMARY KEY,
	idpersona	INT 		NOT NULL,
	email		VARCHAR(30) 	NOT NULL,
	claveacceso	VARCHAR(100)	NOT NULL,
	CONSTRAINT fk_idpersona FOREIGN KEY (idpersona) REFERENCES personas (idpersona)
);

CREATE TABLE tipopagos
(
	idtipopago	INT AUTO_INCREMENT PRIMARY KEY,
	Tipopago		VARCHAR(30)
);

CREATE TABLE turnos
(
	idturno 	INT AUTO_INCREMENT PRIMARY KEY,
	turno 		CHAR(1)		NOT NULL,
	CONSTRAINT ck_turno CHECK (turno IN ('T','N'))
);

CREATE TABLE tipoComidas
(
	idtipoComida	INT AUTO_INCREMENT PRIMARY KEY,
	tipo		VARCHAR(50)	NOT NULL,
	estado		CHAR(1)		NOT NULL DEFAULT '1'
);

CREATE TABLE comidas
(
	idcomida	INT AUTO_INCREMENT PRIMARY KEY,
	idtipoComida	INT		NOT NULL,
	comidas		VARCHAR(50)	NOT NULL,
	estado		BIT		NOT NULL DEFAULT 1,
	CONSTRAINT fk_idticomida FOREIGN KEY (idtipoComida) REFERENCES tipoComidas(idtipoComida)
);

CREATE TABLE ventas
(
	idventa		INT AUTO_INCREMENT PRIMARY KEY,
	idturno		INT 		NOT NULL,
	idcomida 	INT 		NOT NULL,
	PrecioUni	DECIMAL(5,2)	NOT NULL,
	NumMesa		SMALLINT	NOT NULL,
	cantidad	SMALLINT 	NOT NULL,
	totalPagar	DECIMAL(6,2)	NOT NULL,
	CONSTRAINT fk_idturno FOREIGN KEY (idturno) REFERENCES turnos (idturno),
	CONSTRAINT fk_idcomida FOREIGN KEY (idcomida) REFERENCES comidas(idcomida)
);

CREATE TABLE comprobante
(
	idcomprobante	INT AUTO_INCREMENT PRIMARY KEY,
	idventa			INT 			NOT NULL,
	idcliente		INT 			NOT NULL,
	idtipopago		INT 			NOT NULL,
	fechahora		DATETIME		NOT NULL DEFAULT NOW(),
	RUC			CHAR(11)		NOT NULL,
	CONSTRAINT fk_idventa FOREIGN KEY (idventa) REFERENCES ventas (idventa),
	CONSTRAINT fk_idcliente FOREIGN KEY (idcliente)	REFERENCES personas (idpersona),
	CONSTRAINT fk_idtipo FOREIGN KEY (idtipopago) REFERENCES tipopagos (idtipopago),
	CONSTRAINT ck_RUC CHECK(RUC REGEXP '[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]')
);
