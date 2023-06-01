USE restaurante;

SELECT * FROM administrador	

INSERT INTO clientes (nombres,apellidos, telefono,dni) VALUES
	('Saidi Ariela','Fajardo Anampa','965412410','89361200'),
	('Adriana','Duran Buenamarca','947512308','83647102'),
	('Ariel','Carbajal Perez','957481364','72140657'),
	('Luis','Salazar Urbano','987451203','37412905');

INSERT INTO administrador (nombres,apellidos,nombreusu,claveacceso) VALUES
	('Adriana','Montero Alba','AdriM8','123456');
	


INSERT INTO tipopagos (Tipopago)VALUES
	('Yape'),
	('Plin'),
	('Tarjeta Credito'),
	('efectivo');

INSERT INTO turnos (turno,horallegada,horasalida) VALUES
	('Tarde','11:00:00','17:30:00'),
	('Noche','17:30:00','22:00:00');
	
	
SELECT * FROM turnos
SELECT * FROM tipopagos

INSERT INTO mesas(Mesa) VALUES
	('1'),
	('2'),
	('3'),
	('4'),
	('5'),
	('6'),
	('7');
	
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

INSERT INTO ventas (idturno,idadmi,idmesa,idTplato,plato,PrecioUni)VALUES
	(1,1,3,1,'Carapulcra','15');
	
SELECT * FROM ventas
SELECT * FROM detalleVenta

INSERT INTO detalleVenta (idventa,idclientes,cantidad,precioTotal,idtipopago,idcomprobante) VALUES
	(1,1,'2','30',1,1);
	
	
	
	
	
	