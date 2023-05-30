USE restaurante;

DELIMITER $$
CREATE PROCEDURE spu_login
(
   IN _email VARCHAR(70)
)
BEGIN
	SELECT email, claveacceso
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

SELECT * FROM detalleVenta

DELIMITER $$
CREATE PROCEDURE spu_listar_deventa()
BEGIN
	SELECT detalleVenta.iddeventa,
	turnos.turno,
	mesas.Mesa,
	tipoPlatos.tipo,
	personas.nombres,
	personas.apellidos,
	ventas.PrecioUni, 
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
	IN _idturno	INT,
	IN _idcomida    INT,
	IN _PrecioUni 	 DECIMAL(5,2),
	IN _numMesa 	 SMALLINT,
	IN _cantidad		SMALLINT,
	IN _totalPagar DECIMAL(5,2)
)
BEGIN
	INSERT INTO ventas (idturno, idcomida, PrecioUni, NumMesa, cantidad, totalPagar) VALUES
	(_idturno,_idcomida,_PrecioUni,_numMesa,_cantidad, _totalPagar);
END$$ 

SELECT nombres,apellidos
FROM personas

SELECT * FROM ventas;
CALL spu_listar_venta;

SELECT * FROM turnos;