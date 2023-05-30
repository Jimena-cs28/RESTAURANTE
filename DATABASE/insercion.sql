USE restaurante;

SELECT * FROM administrador	

INSERT INTO personas (nombres,apellidos, fechanac,telefono,dni) VALUES
	('Saidi Ariela','Fajardo Anampa','2003-11-28','965412410','89361200'),
	('Adriana','Duran Buenamarca','2003-08-28','947512308','83647102'),
	('Ariel','Carbajal Perez','1999-12-12','957481364','72140657'),
	('Luis','Salazar Urbano','1988-10-04','987451203','37412905');

INSERT INTO administrador (idpersona,nombreusu,email,claveacceso) VALUES
	(1,'SaiAri12','SaidiA@gmail.com','2812');
	


INSERT INTO tipopagos (Tipopago)VALUES
	('Yape'),
	('Plin'),
	('Tarjeta Credito'),
	('efectivo');

INSERT INTO turnos (turno,horallegada,horasalida) VALUES
	('T','11:00:00','17:30:00'),
	('N','17:30:00','22:00:00');
	
SELECT * FROM turnos
SELECT * FROM tipopagos

INSERT INTO mesas(Mesa,estado) VALUES
	('1','disponible'),
	('2','ocupado'),
	('3','disponible');
	
SELECT * FROM mesas;

INSERT INTO tipoPlatos (tipo) VALUES
	('plato entrada'),
	('plato salida'),
	('plato principal'),
	('bebidas');
	
SELECT * FROM tipoPlatos

INSERT INTO ventas (idturno,idadmi,idmesa,idTplato,idcliente,plato,comprobante)VALUES
	(1,1,3,1,2,'Carapulcra','Boleta');
	
SELECT * FROM ventas
SELECT * FROM detalleVenta

INSERT INTO detalleVenta (idventa,PrecioUni,cantidad,precioTotal,idtipopago) VALUES
	(1,'15','2','30',4);
	
	
	
	
	
	