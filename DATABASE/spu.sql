USE restaurante;

DELIMITER $$
CREATE PROCEDURE spu_login
(
   IN _email VARCHAR(70)
)
BEGIN
	SELECT email, claveacceso,nombreusu
	FROM administrador
	WHERE email = _email;
END$$

CALL spu_login('SaidiA@gmail.com');

DELIMITER $$
CREATE PROCEDURE spu_listarturno()
BEGIN
	SELECT * FROM turnos;
END $$

CALL spu_listarturno()

SELECT * FROM mesas	

DELIMITER $$
CREATE PROCEDURE spu_listar_deventa()
BEGIN
	SELECT detalleVenta.iddeventa,
	turnos.turno,
	mesas.Mesa,
	tipoPlatos.tipo,
	personas.nombres,
	personas.apellidos,
	PrecioUni, 
	ventas.plato,
	cantidad, precioTotal,
	tipopagos.Tipopago
	FROM detalleVenta
	INNER JOIN ventas ON ventas.idventa = detalleVenta.idventa
	INNER JOIN tipopagos ON tipopagos.idtipopago = detalleVenta.idtipopago
	INNER JOIN turnos ON turnos.idturno = ventas.`idturno`
	INNER JOIN mesas ON mesas.idmesa = ventas.idmesa
	INNER JOIN personas ON personas.idpersona = ventas.idcliente
	INNER JOIN tipoPlatos ON tipoPlatos.idTplato = ventas.idTplato;
END $$

CALL spu_listar_deventa();

DELIMITER $$
CREATE PROCEDURE  spu_registrar_venta
(
	IN _idturno		INT,
	IN _idadmi    	INT,
	IN _idmesa 	 	INT,
	IN _idTplato 	INT,
	IN _idcliente	INT,
	IN _plato 		VARCHAR(30),
	IN _comprobante VARCHAR(50)
)
BEGIN
	INSERT INTO ventas (idturno, idadmi, idmesa, idTplato, idcliente, plato, comprobante) VALUES
							(_idturno,_idadmi,_idmesa,_idTplato,_idcliente, _plato,_comprobante);
END$$ 

CALL spu_registrar_venta(1,1,3,4,3,'Arroz Chaufa','boleta');

SELECT nombres,apellidos
FROM personas

SELECT * FROM ventas;
CALL spu_listar_venta;

DELIMITER $$
CREATE PROCEDURE spu_listar_turno()
BEGIN
	SELECT idturno,turno
	FROM turnos;
END$$

DELIMITER $$
CREATE PROCEDURE spu_listar_mesa()
BEGIN
	SELECT Mesa
	FROM mesas;
END$$

CALL spu_listar_mesa();

DELIMITER $$
CREATE PROCEDURE spu_listar_cliente()
BEGIN
	SELECT idpersona, nombres, apellidos
	FROM personas;
END$$

SELECT * FROM personas;
SELECT * FROM administrador;
SELECT * FROM mesas;

DELIMITER $$
CREATE PROCEDURE spu_listar_Tpago()
BEGIN
	SELECT idtipopago,Tipopago
	FROM tipopagos;
END$$

DELIMITER $$
CREATE PROCEDURE spu_listar_admi()
BEGIN
	SELECT idadmi, nombreusu
	FROM administrador;
END$$

DELIMITER $$
CREATE PROCEDURE spu_listar_tplato()
BEGIN
	SELECT idTplato, tipo
	FROM tipoPlatos;
END$$


