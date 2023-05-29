USE restaurante;

SELECT * FROM administrador	

INSERT INTO personas (nombres,apellidos, fechanac,telefono,dni) VALUES
	('Saidi Ariela','Fajardo Anampa','2003-11-28','965412410','89361200'),
	('Adriana','Duran Buenamarca','2003-08-28','947512308','83647102'),
	('Ariel','Carbajal Perez','1999-12-12','957481364','72140657'),
	('Luis','Salazar Urbano','1988-10-04','987451203','37412905');

INSERT INTO administrador (idpersona,email,claveacceso) VALUES
	(1,'SaidiA@gmail.com','2812');
	


INSERT INTO tipopagos (Tipopago)VALUES
	('Yape'),
	('Plin'),
	('Tarjeta Credito'),
	('efectivo');

INSERT INTO turnos (turno) VALUES
	('T'),
	('N');
	
SELECT * FROM turnos
SELECT * FROM tipopagos
SELECT * FROM tipoComidas

INSERT INTO tipoComidas (tipo) VALUES
	('plato entrada'),
	('plato salida'),
	('plato principal'),
	('bebidas');
	
INSERT INTO comidas (idtipoComida,comidas) VALUES
(1,'Causa Rellena'),
(1,'Papa la Huancaina'),
(1,'Tamales'),
(1,'Leche de tigre'),
(2,'Lomito Saltado'),
(2,'Mariscos'),
(2,'Chilcano'),
(3,'Arroz con pollo'),
(3,'Ceviche de pescado'),
(3,'Carapulcra'),
(4,'Agua Cielo'),
(4,'Chicha'),
(4,'Agua de maracuya');

SELECT * FROM comidas

INSERT INTO ventas (idturno,idcomida,PrecioUni,NumMesa,cantidad,totalPagar)VALUES
	(1,1,'8','2','2','16');
	
SELECT * FROM ventas
SELECT * FROM comprobante

INSERT INTO comprobante (idventa,idcliente,idtipopago,RUC) VALUES
	(1,2,1,'54120795641');
	
	
	
	
	
	