USE restaurante;

DELIMITER $$
CREATE PROCEDURE spu_login
(
   IN _email VARCHAR(70)
)
BEGIN
	SELECT idadmi,
	personas.nombres,
	personas.apellidos,
	email,
	claveacceso
	FROM administrador
	INNER JOIN personas ON personas.idpersona = administrador.idpersona
	WHERE email = _email;
END$$

CALL spu_login('SaidiA@gmail.com');

DELIMITER $$
CREATE PROCEDURE spu_listarturno()
BEGIN
	SELECT * FROM turnos;
END $$

CALL spu_listarturno()

DELIMITER $$
CREATE PROCEDURE spu_listar_venta()
BEGIN
	SELECT ventas.`idventa`,  
			turnos.`turno`,
			tipoComidas.`tipo`,
			comidas.`comidas`,
			PrecioUni,
			NumMesa,
			cantidad, 
			totalPagar
	FROM ventas
	INNER JOIN turnos ON turnos.idturno = ventas.`idturno`
	INNER JOIN comidas ON comidas.idcomida = ventas.`idcomida`
	INNER JOIN tipoComidas ON tipoComidas.`idtipoComida` = comidas.`idtipoComida`;
END $$

DELIMITER $$
CREATE PROCEDURE  spu_registrar_venta
(
	IN _idturno		 INT,
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