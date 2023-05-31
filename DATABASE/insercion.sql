USE restaurante;

SELECT * FROM administrador	

INSERT INTO personas (nombres,apellidos, fechanac,telefono,dni) VALUES
	('Saidi Ariela','Fajardo Anampa','2003-11-28','965412410','89361200'),
	('Adriana','Duran Buenamarca','2003-08-28','947512308','83647102'),
	('Ariel','Carbajal Perez','1999-12-12','957481364','72140657'),
	('Luis','Salazar Urbano','1988-10-04','987451203','37412905');

INSERT INTO administrador (nombreusu,email,claveacceso) VALUES
	('Ariel12','AriP@gmail.com','2812');
	


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
	('4','disponible'),
	('5','disponible'),
	('6','disponible'),
	('7','disponible');
	('1','disponible'),
	('2','disponible'),
	('3','disponible');
	
SELECT * FROM mesas;

INSERT INTO tipoPlatos (tipo) VALUES
	('plato entrada'),
	('plato salida'),
	('plato principal'),
	('bebidas');
	
INSERT INTO comprobante(comprobante) VALUES
('Boleta'),
('Factura');

SELECT * FROM tipoPlatos

INSERT INTO ventas (idturno,idadmi,idmesa,idTplato,plato)VALUES
	(1,1,3,1,'Carapulcra');
	
SELECT * FROM ventas
SELECT * FROM detalleVenta

INSERT INTO detalleVenta (idventa,idcliente,PrecioUni,cantidad,precioTotal,idtipopago,idcomprobante) VALUES
	(1,1,'15','2','30',1,1);
	
	
	
	
	
	