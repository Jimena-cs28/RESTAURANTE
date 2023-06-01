USE restaurante;

DELIMITER $$
CREATE PROCEDURE spu_login
(
   IN _email VARCHAR(70)
)
BEGIN
	SELECT email, claveacceso, nombreusu
	FROM administrador
	WHERE email = _email;
END$$

SELECT * FROM administrador

CALL spu_login('AriP@gmail.com');



SELECT * FROM tipopagos	


CALL spu_listar_deventa();


SELECT nombres,apellidos 
FROM personas

SELECT * FROM ventas;

SELECT * FROM personas;
SELECT * FROM administrador;
SELECT * FROM comprobante;

DELIMITER $$
CREATE PROCEDURE spu_listar_admi()
BEGIN
	SELECT idadmi, nombreusu
	FROM administrador;
END$$


-- CRUD DE VENTAS


DELIMITER $$
CREATE PROCEDURE spu_listar_venta()
BEGIN
	SELECT idventa,turnos.turno,
	administrador.nombreusu,
	mesas.Mesa,
	tipoPlatos.tipo,
	plato, PrecioUni
	FROM ventas
	INNER JOIN turnos ON turnos.idturno = ventas.idturno
	INNER JOIN mesas ON mesas.idmesa = ventas.idmesa
	INNER JOIN administrador ON administrador.idadmi = ventas.idadmi
	INNER JOIN tipoPlatos ON tipoPlatos.idTplato = ventas.idTplato
	ORDER BY idventa DESC;
END $$

CALL spu_listar_venta;

DELIMITER $$
CREATE PROCEDURE  spu_registrar_venta
(
	IN _idturno	INT,
	IN _idadmi    	INT,
	IN _idmesa 	 INT,
	IN _idTplato 	INT,
	IN _plato 	VARCHAR(30),
	IN _Preciouni	DECIMAL(5,2)
)
BEGIN
	INSERT INTO ventas (idturno, idadmi, idmesa, idTplato, plato, PrecioUni) VALUES
			(_idturno,_idadmi,_idmesa,_idTplato, _plato, _Preciouni);
END$$ 
SELECT * FROM ventas

CALL spu_registrar_venta(1,1,2,1,'Causa','8');


-- CRUD DE  DETALLES VENTAS
DELIMITER $$
CREATE PROCEDURE spu_listar_deventa()
BEGIN
	SELECT iddeventa,
	turnos.turno,
	mesas.Mesa,
	tipoPlatos.tipo,
	clientes.nombres,
	clientes.apellidos,
	ventas.PrecioUni, 
	ventas.plato,
	cantidad, precioTotal,
	tipopagos.Tipopago,
	comprobante.`comprobante`
	FROM detalleVenta
	INNER JOIN ventas ON ventas.idventa = detalleVenta.idventa
	INNER JOIN comprobante ON comprobante.`idcomprobante` = detalleVenta.`idcomprobante`
	INNER JOIN tipopagos ON tipopagos.idtipopago = detalleVenta.idtipopago
	INNER JOIN turnos ON turnos.idturno = ventas.`idturno`
	INNER JOIN mesas ON mesas.idmesa = ventas.idmesa
	INNER JOIN clientes ON clientes.idclientes = detalleVenta.idclientes
	INNER JOIN tipoPlatos ON tipoPlatos.idTplato = ventas.idTplato
	ORDER BY iddeventa DESC;
END $$

CALL spu_listar_deventa;



