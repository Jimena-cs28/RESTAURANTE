USE restaurante;

DELIMITER $$
CREATE PROCEDURE spu_login
(
   IN _nombreusu VARCHAR(70)
)
BEGIN
	SELECT idadmi, 
	nombres, 
	apellidos,
	nombreusu,
	claveacceso
	FROM administrador
	WHERE nombreusu = _nombreusu;
END$$

-- 1234
UPDATE administrador SET claveacceso = '$2y$10$yG1Mk28HxCgS1BywcuBfYuvc3STMlR3f771kclJBfyh.CcWGJl/Xa'
WHERE idadmi =  1;

SELECT * FROM administrador

CALL spu_login('AdriM8');

-- listo
SELECT * FROM tipopagos	
SELECT * FROM ventas;
SELECT * FROM personas;
SELECT * FROM administrador;
SELECT * FROM comprobante;

-- CRUD DE VENTAS


DELIMITER $$
CREATE PROCEDURE spu_listar_venta()
BEGIN
	SELECT idventa,turnos.turno,
	administrador.nombreusu,
	numMesa,
	tipoPlatos.tipo,
	plato
	FROM ventas
	INNER JOIN turnos ON turnos.idturno = ventas.idturno
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
	IN _idTplato 	INT,
	IN _mesa 	 INT,
	IN _plato 	VARCHAR(30)
)
BEGIN
	INSERT INTO ventas (idturno, idadmi, idTplato,numMesa,  plato) VALUES
				(_idturno,_idadmi,_idTplato,_mesa,_plato);
END$$ 

SELECT * FROM ventas

CALL spu_registrar_venta(2,1,1,3,'Causa');

DELIMITER $$
CREATE PROCEDURE spueliminarventa
(
	IN _idventa INT
)
BEGIN
	DELETE FROM ventas WHERE idventa =_idventa;
END$$

CALL spueliminarventa();


SELECT * FROM tipoplatos

DELIMITER $$
CREATE PROCEDURE spu_venta_editar
(
	IN _idventa INT,
	IN _idturno INT,
	IN _mesa INT,
	IN _idTplato INT,
	IN _plato  VARCHAR(17)
)
BEGIN
	UPDATE ventas SET
	idturno = _idturno,
	numMesa = _mesa,
	idTplato = _idTplato,
	plato = _plato
	WHERE idventa = _idventa;
END $$

CALL spu_venta_editar(3,2,2,3,'Cebi');

DELIMITER $$
CREATE PROCEDURE spu_obtener_venta
(
	IN _idventa INT
)
BEGIN 
	SELECT * FROM ventas WHERE idventa = _idventa;
END$$

CALL spu_obtener_venta(1);

SELECT * FROM ventas

-- CRUD DE  DETALLES VENTAS
DELIMITER $$
CREATE PROCEDURE spu_listar_deventa()
BEGIN
	SELECT iddeventa,
	turnos.turno,
	numMesa,
	tipoPlatos.tipo,
	clientes.nombres,
	clientes.apellidos,
	PrecioUni, 
	ventas.plato,
	cantidad, precioTotal,
	tipopagos.Tipopago,
	comprobante.`comprobante`
	FROM detalleVenta
	INNER JOIN ventas ON ventas.idventa = detalleVenta.idventa
	INNER JOIN comprobante ON comprobante.`idcomprobante` = detalleVenta.`idcomprobante`
	INNER JOIN tipopagos ON tipopagos.idtipopago = detalleVenta.idtipopago
	INNER JOIN turnos ON turnos.idturno = ventas.`idturno`
	INNER JOIN clientes ON clientes.idclientes = detalleVenta.idclientes
	INNER JOIN tipoPlatos ON tipoPlatos.idTplato = ventas.idTplato
	ORDER BY iddeventa DESC;
END $$

CALL spu_listar_deventa;

DELIMITER $$
CREATE PROCEDURE spu_registrar_deventa
(
	IN _idventa 	INT,
	IN _idclientes 	INT,
	IN _precioUni	SMALLINT,
	IN _cantidad 	SMALLINT,
	IN _precioTotal DECIMAL(6,2),
	IN _idtpago 	INT,
	IN _idcomprobante INT 	
)
BEGIN
	INSERT INTO detalleVenta(idventa,idclientes,PrecioUni,cantidad,precioTotal,idtipopago,idcomprobante) VALUES
				(_idventa,_idclientes,_precioUni, _cantidad, _precioTotal, _idtpago, _idcomprobante);
END$$

CALL spu_registrar_deventa(2,2,'15','2','30',2,1);
SELECT * FROM ventas
SELECT * FROM detalleVenta;
-- REPORTES.1 falta eje

DELIMITER $$
CREATE PROCEDURE reporte_turno
(
	IN  _turno INT
)
BEGIN 
	SELECT idventa,turnos.turno,
	administrador.nombreusu,
	numMesa,
	tipoPlatos.tipo,
	plato
	FROM ventas
	INNER JOIN turnos ON turnos.idturno = ventas.idturno
	INNER JOIN administrador ON administrador.idadmi = ventas.idadmi
	INNER JOIN tipoPlatos ON tipoPlatos.idTplato = ventas.idTplato
	WHERE ventas.idturno = _turno
	ORDER BY idventa DESC;
END $$

SELECT * FROM turnos
CALL reporte_turno('1');


-- REPORTES.2 falta eje

DELIMITER $$
CREATE PROCEDURE reporte_tPlato
(
	IN  _TipoP INT
)
BEGIN 
	SELECT idventa,
	tipoPlatos.tipo,
	turnos.turno,
	administrador.nombreusu,
	numMesa,
	plato
	FROM ventas
	INNER JOIN turnos ON turnos.idturno = ventas.idturno
	INNER JOIN administrador ON administrador.idadmi = ventas.idadmi
	INNER JOIN tipoPlatos ON tipoPlatos.idTplato = ventas.idTplato
	WHERE ventas.idTplato = _TipoP
	ORDER BY idventa DESC;
END $$

SELECT * FROM ventas

CALL reporte_tPlato('3');

-- GRAFICO.1

DELIMITER $$
CREATE PROCEDURE spu_listarGrafico()
BEGIN
	SELECT tipoPlatos.tipo,
	COUNT(ventas.idventa) 'Total'
	FROM ventas
	INNER JOIN tipoPlatos ON tipoPlatos.idTplato = ventas.idTplato
	GROUP BY tipoPlatos.idTplato;
END$$
CALL spu_listarGrafico()

-- GRAFICO.2

DELIMITER $$
CREATE PROCEDURE spu_listarTurno()
BEGIN
	SELECT turnos.turno,
	COUNT(ventas.idventa) 'Total'
	FROM ventas
	INNER JOIN turnos ON turnos.idturno = ventas.idturno
	GROUP BY turnos.turno;
END$$

CALL spu_listarTurno();
SELECT * FROM detalleVenta;
SELECT idventa FROM detalleVenta
